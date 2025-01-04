<?php

namespace App\Controllers;

use App\Models\Mcliente;
use App\Models\Mequipos;
use App\Models\Mroles;
use App\Models\Mcombo;

class Cequipos extends BaseController
{
    protected $mcliente;
    protected $mequipos;
    protected $mroles;
    protected $mcombo;
    protected $session;

    public function __construct()
    {
        $this->session = session();

        if (!$this->session->get('login')) {
            return redirect()->to(base_url());
        }

        $this->mcliente = new Mcliente();
        $this->mequipos = new Mequipos();
        $this->mroles = new Mroles();
        $this->mcombo = new Mcombo();
    }

    public function index()
    {
        $idrol = $this->session->get('idRol');
        $data = [
            'equipoindex' => $this->mequipos->mselectequipos(),
            'roles' => $this->mroles->obtener($idrol),
            'session' => $this->session // Pasa la sesión a la vista
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/recepcion_equipos/vlist', $data);
        echo view('layouts/footer');
    }

    public function cadd()
    {
        $idrol = $this->session->get('idRol');
        $data['tipo_cliente_select'] = $this->mequipos->cliente_listar_select();
        $datos = [
            'roles' => $this->mroles->obtener($idrol)
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $datos);
        echo view('admin/recepcion_equipos/vadd', $data);
        echo view('layouts/footer');
    }

    public function cinsert()
    {
        $fecha = $this->request->getPost('txtfecha');
        $id_cliente = $this->request->getPost('tipo_cliente');
        $marca = $this->request->getPost('txtmarca');
        $modelo = $this->request->getPost('txtmodelo');
        $num_serie = $this->request->getPost('txtserie');
        $sector = $this->request->getPost('txtsector');
        $acc = $this->request->getPost('txtaccesorios');
        $descripcion = $this->request->getPost('txtdescripcion');

        $data = [
            'fecha' => $fecha,
            'marca' => $marca,
            'modelo' => $modelo,
            'num_serie' => $num_serie,
            'sector' => $sector,
            'descripcion' => $descripcion,
            'accesorios' => $acc,
            'id_cliente' => $id_cliente,
            'anulado' => '0'
        ];

        $res = $this->mequipos->minsertequipos($data);

        if ($res) {
            $this->session->setFlashdata('correcto', 'Se guardó correctamente');
            return redirect()->to(base_url('mantenimiento/cequipos'));
        } else {
            $this->session->setFlashdata('error', 'No se guardó el registro');
            return redirect()->to(base_url('mantenimiento/cequipos/cadd'));
        }
    }

    public function cedit($id)
    {
        $idrol = $this->session->get('idRol');
        $data = [
            'equiposedit' => $this->mequipos->midupdateequipos($id),
            'roles' => $this->mroles->obtener($idrol),
            'cliente_select' => $this->mequipos->cliente_listar_select2(),
            'model' => $this->mequipos->obtener($data['equiposedit']->id_cliente)
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/recepcion_equipos/vedit', $data);
        echo view('layouts/footer');
    }

    public function cupdate()
    {
        $id = $this->request->getPost('txtnumorden');
        $fecha = date("Y/m/d", strtotime($this->request->getPost('txtfecha')));
        $cliente = mb_strtoupper($this->request->getPost("cliente"));
        $marca = $this->request->getPost('txtmarca');
        $modelo = $this->request->getPost('txtmodelo');
        $num_serie = $this->request->getPost('txtserie');
        $sector = $this->request->getPost('txtsector');
        $acc = $this->request->getPost('txtaccesorios');
        $descripcion = $this->request->getPost('txtdescripcion');

        $data = [
            'fecha' => $fecha,
            'marca' => $marca,
            'modelo' => $modelo,
            'num_serie' => $num_serie,
            'sector' => $sector,
            'descripcion' => $descripcion,
            'accesorios' => $acc,
            'id_cliente' => $cliente,
            'anulado' => '0'
        ];

        $res = $this->mequipos->mupdateequipos($id, $data);

        if ($res) {
            $this->session->setFlashdata('correcto', 'Se guardó correctamente');
            return redirect()->to(base_url('mantenimiento/cequipos'));
        } else {
            $this->session->setFlashdata('error', 'No se pudo actualizar la orden');
            return redirect()->to(base_url('mantenimiento/cequipos/cedit/' . $id));
        }
    }

    public function print($id)
    {
        $idrol = $this->session->get('idRol');
        $data = [
            'equiposindex' => $this->mequipos->midupdateequipos($id),
            'roles' => $this->mroles->obtener($idrol),
            'model' => $this->mequipos->obtener($data['equiposindex']->id_cliente)
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/recepcion_equipos/vprint', $data);
        echo view('layouts/footer');
    }

    public function cdelete($id)
    {
        $data = [
            'anulado' => '1'
        ];
        $this->mequipos->mupdateequipos($id, $data);
        echo "mantenimiento/cequipos";
    }
}
