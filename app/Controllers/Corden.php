<?php

namespace App\Controllers;

use App\Libraries\SelectItems;

use App\Models\Morden;
use App\Models\Mroles;
use App\Models\Mcombo;
use App\Models\Mfactura;

class Corden extends BaseController
{
    protected $morden;
    protected $mroles;
    protected $mcombo;
    protected $mfactura;
    protected $session;

    public function __construct()
    {
        $this->session = session();
        
        // Verificar si el usuario está logueado
        if (!$this->session->get('login')) {
            return redirect()->to(base_url());
        }
        
        $this->morden = new Morden();
        $this->mroles = new Mroles();
        $this->mcombo = new Mcombo();
        $this->mfactura = new Mfactura();
    }

    public function index()
    {
        $idrol = $this->session->get("idRol");
        $ordenes = $this->morden->mselectorden();

        foreach ($ordenes as $orden) {
            $id = $orden->IdOrden;
            $porden = $this->morden->consultarEstado($id);

            if ($porden != null) {
                $orden->Completa = $porden->Completa;
                $orden->Estado = $porden->Estado;
            } else {
                $orden->Completa = '0';
                $orden->Estado = '4';
            }
        }

        $data = [
            'ordenindex' => $ordenes,
            'ordencompletas' => $this->morden->mselectordencompletas(),
            'roles' => $this->mroles->obtener($idrol),
            'session' => $this->session // Pasa la sesión a la vista
        ];

        foreach ($data['ordenindex'] as $orden) {
            $id = $orden->IdOrden;
            $orden->Gastos = $this->morden->consultaGatosOrden($id);
        }

        foreach ($data['ordencompletas'] as $orden) {
            $id = $orden->IdOrden;
            $orden->Gastos = $this->morden->consultaGatosOrden($id);
        }

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/orden/vlist', $data);
        echo view('layouts/footer');
    }

    public function cadd()
    {
        $idrol = $this->session->get("idRol");
        $data = [
            'tipo_cliente_select' => $this->morden->cliente_listar_select(),
            'roles' => $this->mroles->obtener($idrol),
            'session' => $this->session
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/orden/vadd', $data);
        echo view('layouts/footer');
    }

    public function cinsert()
    {
        $data = [
            'FechaRecepcion' => $this->request->getPost('txtfecha'),
            'TareaDesarrollar' => $this->request->getPost('txttarea'),
            'IdCliente' => $this->request->getPost("tipo_cliente"),
            'Completada' => '0',
            'Eliminada' => '0',
            'observaciones' => $this->request->getPost('txtobser')
        ];

        if ($this->morden->minsertorden($data)) {
            $this->session->setFlashdata('correcto', 'Se guardó correctamente');
            return redirect()->to(base_url().'mantenimiento/corden');
        } else {
            $this->session->setFlashdata('error', 'No se guardó el registro');
            return redirect()->to(base_url().'mantenimiento/corden/cadd');
        }
    }

    public function cedit($id)
    {
        $selectItems = new SelectItems();
        $idrol = $this->session->get("idRol");

        $ordenedit = $this->morden->midupdateordenyfacturas($id);
        $roles = $this->mroles->obtener($idrol);
        $cliente_select = $this->morden->cliente_listar_select2();
        $model = $this->morden->obtener($ordenedit->IdCliente);


        $data = [
            'ordenedit' => $ordenedit,
            'roles' => $roles,
            'cliente_select' => $cliente_select,
            'model' => $model,
            'select_items' => $selectItems,
            'session' => $this->session
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/orden/vedit', $data);
        echo view('layouts/footer');
    }

    public function cupdate()
    {
        $data = [
            'Precio' => $this->request->getPost('txtprecio'),
            'FechaRecepcion' => date("Y/m/d", strtotime($this->request->getPost('txtfecha'))),
            'TareaDesarrollar' => $this->request->getPost('txttarea'),
            'IdCliente' => mb_strtoupper($this->request->getPost("cliente")),
            'Completada' => $this->request->getPost('habilitado') === 'on' ? 1 : 0,
            'observaciones' => $this->request->getPost('txtobser')
        ];

        if ($this->morden->mupdateorden($this->request->getPost('txtidorden'), $data)) {
            $this->session->setFlashdata('correcto', 'Se guardó correctamente');
            return redirect()->to(base_url().'mantenimiento/corden');
        } else {
            $this->session->setFlashdata('error', 'No se pudo actualizar la orden');
            return redirect()->to(base_url().'mantenimiento/corden/cedit/'.$id);
        }
    }

    public function cupdatefact()
    {
        $fpago = $this->request->getPost('txtfechaPago');
        $ffact = $this->request->getPost('txtfechaFactura');
        $nfactura = $this->request->getPost('txtnumFactura');
        $estado = $this->request->getPost('txtpago');
        $idorden = $this->request->getPost('txtidorden');
        $idfact = $this->request->getPost('txtid');

        $data = [
            'N_factura' => $nfactura,
            'fecha_factura' => $ffact ? date("Y/m/d", strtotime($ffact)) : null,
            'fecha_pago' => $fpago ? date("Y/m/d", strtotime($fpago)) : null,
            'estado_pago' => $estado,
            'id_orden' => $idorden
        ];

        $res = $this->mfactura->midupdatefact($nfactura,$idorden);
        $fac = $this->mfactura->mbuscaordenfactura($idorden);

        if ($res == null && $fac == null) {
            $res = $this->mfactura->minsertfactura($data);
        } else {
            $res = $this->mfactura->mupdatefact($idfact, $idorden, $data);
        }

        if ($res) {
            $this->session->setFlashdata('correcto', 'Se guardó correctamente');
            return redirect()->to(base_url().'mantenimiento/corden');
        } else {
            $this->session->setFlashdata('error', 'No se pudo actualizar la factura');
            return redirect()->to(base_url().'mantenimiento/corden/cedit/'.$idorden);
        }
    }

    public function cdelete($id)
    {
        $data = ['Eliminada' => '1'];
        $this->morden->mupdateorden($id, $data);
        echo "mantenimiento/corden";
    }

    public function ccompleta($id)
    {
        $data = ['Completada' => '1'];
        $this->morden->mupdateorden($id, $data);
        echo "mantenimiento/corden";
    }

    public function cdescompleta($id)
    {
        $data = ['Completada' => '0'];
        $this->morden->mupdateorden($id, $data);
        echo "mantenimiento/corden";
    }
}
