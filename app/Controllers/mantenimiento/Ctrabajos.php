<?php

namespace App\Controllers;

use App\Models\Morden;
use App\Models\Mparteorden;
use App\Models\Mroles;
use CodeIgniter\Controller;

class Ctrabajos extends Controller
{
    protected $morden;
    protected $mparteorden;
    protected $mroles;

    public function __construct()
    {
        $this->morden = new Morden();
        $this->mparteorden = new Mparteorden();
        $this->mroles = new Mroles();

        if (!session()->get('login')) {
            return redirect()->to(base_url());
        }
    }

    public function index()
    {
        $idrol = session()->get("idRol");
        $ordenes = $this->morden->mselectestadostrabajo(); 

        foreach ($ordenes as $orden) {
            $id = $orden->IdOrden;
            $parteorden = $this->mparteorden->mselectparteorden($id);
            $orden->tecnicos = "";
            $tec = "";
            $horasAcum = 0;

            if ($parteorden != null) {
                foreach ($parteorden as $parte) {
                    $tecnicos = $this->mparteorden->mselectTecnicoId($parte->IdParte);
                    
                    foreach ($tecnicos as $tecnico) {
                        $nombre = $tecnico->Nombre;
                        if (strlen(strstr($tec, $nombre)) === 0) {
                            $tec .= "$nombre ";
                        }
                    }

                    $FechaInicio = $parte->FechaInicio;
                    $FechaFin = $parte->FechaFin;
                    if ($FechaInicio === null || $FechaFin === null || $FechaInicio === '0000-00-00 00:00:00' || $FechaFin === '0000-00-00 00:00:00') {
                        if ($FechaInicio === '0000-00-00 00:00:00' || $FechaInicio === null) {
                            $orden->FechaInicio = "-";
                        }
                        if ($FechaFin === '0000-00-00 00:00:00' || $FechaFin === null) {
                            $orden->FechaFin = "-";
                        }
                        $orden->HH = "-";
                    } else {
                        $date1 = strtotime($FechaInicio);
                        $date2 = strtotime($FechaFin);
                        $horasAcum += ($date2 - $date1) / 3600; // Convert to hours
                    }
                }
            } else {
                $tec = "No tiene técnicos";
                $horasAcum = 0;
            }
        
            $orden->TEC = $tec;
            $orden->HH = $horasAcum;

            $porden = $this->morden->consultarEstado($id);
            if ($porden != null) {
                $orden->Completa = $porden->Completa;
                $orden->Estado = $porden->Estado;
            } else {
                $orden->Completa = '0';
                $orden->Estado = '4';
            }

            $tarea = $this->morden->consultarPrimerTarea($id);
            if ($tarea != null) {
                $orden->Fecha = $tarea->FechaInicio ?? "-";
            } else {
                $orden->Fecha = "-";
            }

            $orden->Gastos = $this->morden->consultaGatosOrden($id);
            $orden->tecnicos = $this->mparteorden->mselectTecnicoId($id);
            $orden->Precio = (int)$orden->Precio;
            $orden->Gastos = (int)$orden->Gastos;
            $orden->Ganancia = $orden->Precio - $orden->Gastos;

            if ($orden->Ganancia != null) {
                $orden->Ganancia = (float)$orden->Ganancia;
                $orden->rentabilidad = $orden->HH / $orden->Ganancia * 100;
            } else {
                $orden->rentabilidad = 0;
            }

            $FechaFact = $orden->fecha_factura;
            $FechaPago = $orden->fecha_pago;

            if ($FechaFact === null || $FechaPago === null || $FechaFact === '0000-00-00 00:00:00' || $FechaPago === '0000-00-00 00:00:00') {
                $orden->fecha_factura = $FechaFact === '0000-00-00 00:00:00' || $FechaFact === null ? "-" : $FechaFact;
                $orden->fecha_pago = $FechaPago === '0000-00-00 00:00:00' || $FechaPago === null ? "-" : $FechaPago;
                $orden->demora = "-";
            } else {
                $date1 = date_create($FechaFact);
                $date2 = date_create($FechaPago);
                $interval = date_diff($date1, $date2);
                $orden->demora = $interval->format('%a días');
            }
        }

        $data = [
            'ordenindex' => $ordenes,
            'roles' => $this->mroles->obtener($idrol)
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/estados_trabajo/vlist', $data);
        echo view('layouts/footer');
    }

    public function indexFiltro()
    {
        $idrol = session()->get("idRol");
        $ini = $this->request->getPost('txtfechai');
        $fin = $this->request->getPost('txtfechaf');

        if ($ini != null && $fin != null) {
            $ordenes = $this->morden->mselectordenfecha($ini, $fin); 

            foreach ($ordenes as $orden) {
                $id = $orden->IdOrden;
                $parteorden = $this->mparteorden->mselectparteorden($id);
                $orden->tecnicos = "";
                $tec = "";
                $horasAcum = 0;

                if ($parteorden != null) {
                    foreach ($parteorden as $parte) {
                        $tecnicos = $this->mparteorden->mselectTecnicoId($parte->IdParte);
                        
                        foreach ($tecnicos as $tecnico) {
                            $nombre = $tecnico->Nombre;
                            if (strlen(strstr($tec, $nombre)) === 0) {
                                $tec .= "$nombre ";
                            }
                        }

                        $FechaInicio = $parte->FechaInicio;
                        $FechaFin = $parte->FechaFin;
                        if ($FechaInicio !== null && $FechaFin !== null) {
                            $date1 = strtotime($FechaInicio);
                            $date2 = strtotime($FechaFin);
                            $horasAcum += ($date2 - $date1) / 3600; // Convert to hours
                        } else {
                            $horasAcum += 0;
                        }
                    }
                } else {
                    $tec = "No tiene técnicos";
                    $horasAcum = 0;
                }

                $orden->TEC = $tec;
                $orden->HH = $horasAcum;

                $porden = $this->morden->consultarEstado($id);
                if ($porden != null) {
                    $orden->Completa = $porden->Completa;
                    $orden->Estado = $porden->Estado;
                } else {
                    $orden->Completa = '0';
                    $orden->Estado = '4';
                }

                $orden->Gastos = $this->morden->consultaGatosOrden($id);
                $orden->tecnicos = $this->mparteorden->mselectTecnicoId($id);
                $orden->Precio = (int)$orden->Precio;
                $orden->Gastos = (int)$orden->Gastos;
                $orden->Ganancia = $orden->Precio - $orden->Gastos;

                if ($orden->Ganancia != null) {
                    $orden->Ganancia = (float)$orden->Ganancia;
                    $orden->rentabilidad = $orden->HH / $orden->Ganancia * 100;
                } else {
                    $orden->rentabilidad = 0;
                }
            }

            $data = [
                'ordenindex' => $ordenes,
                'roles' => $this->mroles->obtener($idrol)
            ];

            echo view('layouts/header');
            echo view('layouts/aside', $data);
            echo view('admin/estados_trabajo/vlist', $data);
            echo view('layouts/footer');
        } else {
            return redirect()->to(base_url() . 'mantenimiento/ctrabajos/index');
        }
    }
}
