<?php

namespace App\Controllers;

use App\Models\Morden;
use App\Models\Mparteorden;
use App\Models\Mroles;

class Ctrabajos extends BaseController
{
    protected $morden;
    protected $mparteorden;
    protected $mroles;
    protected $session;

    public function __construct()
    {
        $this->morden = new Morden();
        $this->mparteorden = new Mparteorden();
        $this->mroles = new Mroles();
        $this->session = session();

        // Redirigir si no está autenticado
        if (!$this->session->get('login')) {
            return redirect()->to(base_url());
        }
    }

    public function index()
    {
        $idrol = $this->session->get("idRol");
        $ordenes = $this->morden->mselectestadostrabajo();

        foreach ($ordenes as $orden) {
            $this->procesarOrden($orden);
        }

        $data = [
            'ordenindex' => $ordenes,
            'roles' => $this->mroles->obtener($idrol),
            'session' => $this->session
        ];

        return view('layouts/header')
            . view('layouts/aside', $data)
            . view('admin/estados_trabajo/vlist', $data)
            . view('layouts/footer');
    }

    public function indexFiltro()
    {
        $idrol = $this->session->get("idRol");
        $ini = $this->request->getPost('txtfechai');
        $fin = $this->request->getPost('txtfechaf');

        if ($ini && $fin) {
            $ordenes = $this->morden->mselectordenfecha($ini, $fin);

            foreach ($ordenes as $orden) {
                $this->procesarOrden($orden);
            }

            $data = [
                'ordenindex' => $ordenes,
                'roles' => $this->mroles->obtener($idrol)
            ];

            return view('layouts/header')
                . view('layouts/aside', $data)
                . view('admin/estados_trabajo/vlist', $data)
                . view('layouts/footer');
        }

        return redirect()->to(base_url('mantenimiento/ctrabajos/index'));
    }

    private function procesarOrden(&$orden)
    {
        $id = $orden->IdOrden;
        $parteorden = $this->mparteorden->mselectparteorden($id);
        $orden->tecnicos = "";
        $tec = "";
        $horasAcum = 0;

        if ($parteorden) {
            foreach ($parteorden as $parte) {
                $tecnicos = $this->mparteorden->mselectTecnicoId($parte->IdParte);

                foreach ($tecnicos as $tecnico) {
                    $nombre = $tecnico->Nombre;
                    if (!str_contains($tec, $nombre)) {
                        $tec .= "$nombre ";
                    }
                }

                $FechaInicio = $parte->FechaInicio;
                $FechaFin = $parte->FechaFin;
                if ($FechaInicio && $FechaFin && $FechaInicio !== '0000-00-00 00:00:00' && $FechaFin !== '0000-00-00 00:00:00') {
                    $date1 = strtotime($FechaInicio);
                    $date2 = strtotime($FechaFin);
                    $horasAcum += ($date2 - $date1) / 3600;
                }
            }
        } else {
            $tec = "No tiene técnicos";
        }

        $orden->TEC = $tec;
        $orden->HH = $horasAcum;

        $porden = $this->morden->consultarEstado($id);
        $orden->Completa = $porden->Completa ?? '0';
        $orden->Estado = $porden->Estado ?? '4';

        $tarea = $this->morden->consultarPrimerTarea($id);
        $orden->Fecha = $tarea->FechaInicio ?? "-";

        $orden->Gastos = $this->morden->consultaGatosOrden($id);
        $orden->Precio = (int)$orden->Precio;
        $orden->Gastos = (int)$orden->Gastos;
        $orden->Ganancia = $orden->Precio - $orden->Gastos;

        $orden->rentabilidad = $orden->Ganancia ? $orden->HH / $orden->Ganancia * 100 : 0;

        $this->procesarFechasFactura($orden);
    }

    private function procesarFechasFactura(&$orden)
    {
        $FechaFact = $orden->fecha_factura;
        $FechaPago = $orden->fecha_pago;

        if ($FechaFact && $FechaPago && $FechaFact !== '0000-00-00 00:00:00' && $FechaPago !== '0000-00-00 00:00:00') {
            $date1 = date_create($FechaFact);
            $date2 = date_create($FechaPago);
            $interval = date_diff($date1, $date2);
            $orden->demora = $interval->format('%a días');
        } else {
            $orden->fecha_factura = $FechaFact === '0000-00-00 00:00:00' ? "-" : $FechaFact;
            $orden->fecha_pago = $FechaPago === '0000-00-00 00:00:00' ? "-" : $FechaPago;
            $orden->demora = "-";
        }
    }
}
