<?php

namespace App\Controllers;

use App\Libraries\SelectItems;

use DateTime; 

use App\Models\Mparteorden;
use App\Models\Mroles;
use App\Models\Morden;
use App\Models\Mcombo;

class Cparteorden extends BaseController {
    
    protected $mparteorden;
    protected $mroles;
    protected $morden;
    protected $mcombo;
    protected $session;

    public function __construct(){
        $this->session = session();

        if (!$this->session->get('login')) {
            return redirect()->to(base_url());
        }

        $this->mparteorden = new Mparteorden();
        $this->mroles = new Mroles();
        $this->morden = new Morden();
        $this->mcombo = new Mcombo();
    }

    public function listar($id) {
        $idrol = $this->session->get("idRol");

        $data = [
            'parteordenindex' => $this->mparteorden->mselectparteorden($id),
            'ordenindex' => $this->mparteorden->mselectinfoparteorden($id),
            'roles' => $this->mroles->obtener($idrol),
            'Gastos' => $this->morden->consultaGatosOrden($id),
            'session' => $this->session
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/parteorden/vlist', $data);
        echo view('layouts/footer');
    }

    public function cinsert($idOrden) {
        $data = [
            'IdOrden' => $idOrden,
            'Estado' => 0,
        ];

        $id = $this->mparteorden->minsertparteorden($data);

        if ($id) {
            $this->session->setFlashdata('correcto', 'Se guardó correctamente');
            return redirect()->to(base_url('mantenimiento/cparteorden/listar/'.$idOrden));
        } else {
            $this->session->setFlashdata('error', 'No se guardó el registro');
            return redirect()->to(base_url('mantenimiento/cparteorden/listar/'.$idOrden));
        }
    }

    public function cedit($id)
{
    $selectItems = new SelectItems();
    $idrol = $this->session->get('idRol');
    $var = substr($id, 0, 1);
    $id = str_replace(['@', '_'], '', $id);

    if ($var == '@') {
        $data = [
            'materialedit' => $this->mparteorden->midupdatematerial($id),
            'roles' => $this->mroles->obtener($idrol),
            'session'=> $this->session
        ];
        return view('layouts/header')
            . view('layouts/aside', $data)
            . view('admin/material/vedit', $data)
            . view('layouts/footer');
    } elseif ($var == '_') {
        $mat = $this->mparteorden->obtenerMaterialconIdMat($id);
        $IdParte = $mat->IdParte;
        $this->mparteorden->mdeletematerial($id);
        return redirect()->to(base_url('mantenimiento/cparteorden/cedit/' . $IdParte));
    } elseif (strpos($id, 'ref') !== false) {
        $id = str_replace('ref', ';', $id);
        list($idParte, $dni) = explode(';', $id);
        $this->mparteorden->mdeletetecnicoOrden($idParte, $dni);
        return redirect()->to(base_url('mantenimiento/cparteorden/cedit/' . $idParte));
    } else {
        $parteordenedit = $this->mparteorden->midupdateparteorden($id);
        $idOrden = $parteordenedit->IdOrden;
        $idParte = $parteordenedit->IdParte;

        $data = [
            'parteordenedit' => $parteordenedit,
            'tipo_tecnico_select' => $this->mparteorden->tecnico_listar_select(),
            'tecnico_select' => $this->mparteorden->mselectTecnicoIdParte($id),
            'roles' => $this->mroles->obtener($idrol),
            'material' => $this->mparteorden->obtenerMaterial($idOrden, $idParte),
            'Gastos' => $this->morden->consultaGatosTotales($idParte),
            'select_items' => $selectItems,
            'session' => $this->session
        ];

        // Cálculo del tiempo entre FechaInicio y FechaFin
        $date1 = new DateTime($parteordenedit->FechaInicio);
        $date2 = new DateTime($parteordenedit->FechaFin);
        $interval = $date1->diff($date2);
        $data['hora'] = $interval->format('%H:%I:%S');

        return view('layouts/header')
            . view('layouts/aside', $data)
            . view('admin/parteorden/vedit', $data)
            . view('layouts/footer');
    }
}


    public function cupdate() {
        $idparte = $this->request->getPost('txtidParte');
        $idorden = $this->request->getPost('txtidorden');
        $tarea = $this->request->getPost('txttarea');
        $txtfechaInicio = $this->request->getPost('txtfechaInicio');
        $txtfechaFin = $this->request->getPost('txtfechaFin');

        $data = [
            'TareaDesarrollada' => $tarea,
            'FechaInicio' => $txtfechaInicio,
            'FechaFin' => $txtfechaFin,
        ];

        $res = $this->mparteorden->mupdateparteorden($idparte, $idorden, $data);

        if ($res) {
            $this->session->setFlashdata('correcto', 'Se guardó correctamente');
            return redirect()->to(base_url('mantenimiento/cparteorden/listar/'.$idorden));
        } else {
            $this->session->setFlashdata('error', 'No se pudo actualizar la parteorden');
            return redirect()->to(base_url('mantenimiento/cparteorden/cedit'.$idparte));
        }
    }

    public function addMaterial() {
        $material = $this->request->getPost("material");
        $idParte = $this->request->getPost("idParte");
        $idOrden = $this->request->getPost("idOrden");
        $cant = $this->request->getPost("cant");
        $precio = $this->request->getPost("precio");

        $data = [
            'Cantidad' => $cant,
            'Descripcion' => $material,
            'IdOrden' => $idOrden,
            'IdParte' => $idParte,
            'Precio' => $precio,
        ];

        $res = $this->mparteorden->cargarMat($data);

        echo json_encode(['linksa' => $res]);
    }

    public function cdeleteMat($id) {
        $mat = $this->mparteorden->obtenerMaterialconIdMat($id);
        $IdParte = $mat->IdParte;
        $this->mparteorden->mdeletematerial($id);
        echo "mantenimiento/cparteorden/cedit/$IdParte";
    }

    public function addTecnicoOrden() {
        $tecnico = $this->request->getPost("tecnico");
        $idParte = $this->request->getPost("idParte");

        $data = [
            'Dni' => $tecnico,
            'IdParte' => $idParte,
        ];

        $this->mparteorden->cargarTecnicoOrden($data);
        $tecnicoNombre = $this->mparteorden->nombreTecnico($tecnico);

        echo json_encode(['linksa' => $tecnicoNombre]);
    }
}
