<?php

namespace App\Controllers;

use App\Models\Mroles;
use App\Models\Mtipousuario;
use App\Models\Mcombo;

class Croles extends BaseController
{
    protected $session;
    protected $mroles;
    protected $mtipousuario;
    protected $mcombo;

    public function __construct()
    {
        $this->session = session();
        
        if (!$this->session->get('login')) {
            return redirect()->to(base_url());
        }

        $this->mroles = new Mroles();
        $this->mtipousuario = new Mtipousuario();
        $this->mcombo = new Mcombo();
    }

    public function index()
    {
        $idrol = $this->session->get("idRol");
        $data = [
            'rolesindex' => $this->mroles->mselectrolessolo(),
            'roles' => $this->mroles->obtener($idrol),
            'session' => $this->session
        ];
        
        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/roles/vlist', $data);
        echo view('layouts/footer');
    }

    public function cadd()
    {
        $idrol = $this->session->get("idRol");
        $data['roles_select'] = $this->mroles->roles_listar_select2();

        $datos = [
            'roles' => $this->mroles->obtener($idrol),
            'session' => $this->session
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $datos);
        echo view('admin/roles/vadd', $data);
        echo view('layouts/footer');
    }

    public function cinsert()
    {
        $nombre_tipo = $this->request->getPost('txtnombre');
        $checks = [
            'cliente' => $this->request->getPost('cliente') == 'on' ? 1 : 0,
            'tecnico' => $this->request->getPost('tecnico') == 'on' ? 1 : 0,
            'ordenes' => $this->request->getPost('ordenes') == 'on' ? 1 : 0,
            'usuarios' => $this->request->getPost('usu') == 'on' ? 1 : 0,
            'roles' => $this->request->getPost('rol') == 'on' ? 1 : 0,
            'estados_trabajo' => $this->request->getPost('estado') == 'on' ? 1 : 0,
            'equipos' => $this->request->getPost('equipos') == 'on' ? 1 : 0,
            'remitos' => $this->request->getPost('remitos') == 'on' ? 1 : 0,
            'proveedores' => $this->request->getPost('proveedores') == 'on' ? 1 : 0,
            'anulado' => 0
        ];

        if ($this->mroles->obtenerrol($nombre_tipo) == null) {
            $data = array_merge(['nombre_tipo' => $nombre_tipo], $checks);

            if ($this->mroles->minsertroles($data)) {
                $this->session->setFlashdata('correcto', 'Se guardo Correctamente');
                return redirect()->to(base_url('mantenimiento/croles'));
            } else {
                $this->session->setFlashdata('error', 'No se Guardo registro');
                return redirect()->to(base_url('mantenimiento/croles/cadd'));
            }
        } else {
            $this->session->setFlashdata('error', 'Este Rol ya esta registrado');
            return redirect()->to(base_url('mantenimiento/croles/cadd'));
        }
    }

    public function cedit($id)
    {
        $idrol = $this->session->get("idRol");
        $rolesedit = $this->mroles->midupdateroles($id);

        $data = [
            'rolesedit' => $rolesedit,
            'roles' => $this->mroles->obtener($idrol),
            'model' => $this->mroles->obtener($rolesedit->idRol),
            'session' => $this->session
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/roles/vedit', $data);
        echo view('layouts/footer');
    }

    public function cupdate()
    {
        $idRol = $this->request->getPost('txtidrol');
        $nombre_tipo = $this->request->getPost('txtnombre');
        $nombre = $this->request->getPost('txtnombreviejo');
        
        $checks = [
            'cliente' => $this->request->getPost('cliente') == 'on' ? 1 : 0,
            'tecnico' => $this->request->getPost('tecnico') == 'on' ? 1 : 0,
            'ordenes' => $this->request->getPost('ordenes') == 'on' ? 1 : 0,
            'usuarios' => $this->request->getPost('usu') == 'on' ? 1 : 0,
            'roles' => $this->request->getPost('rol') == 'on' ? 1 : 0,
            'estados_trabajo' => $this->request->getPost('estado') == 'on' ? 1 : 0,
            'equipos' => $this->request->getPost('equipos') == 'on' ? 1 : 0,
            'remitos' => $this->request->getPost('remitos') == 'on' ? 1 : 0,
            'proveedores' => $this->request->getPost('proveedores') == 'on' ? 1 : 0,
            'anulado' => 0
        ];

        if (($this->mroles->obtenerrol($nombre_tipo) == null) || ($nombre == $nombre_tipo)) {
            $data = array_merge(['nombre_tipo' => $nombre_tipo], $checks);

            if ($this->mroles->mupdateroles($idRol, $data)) {
                $this->session->setFlashdata('correcto', 'Se Guardo Correctamente');
                return redirect()->to(base_url('mantenimiento/croles'));
            } else {
                $this->session->setFlashdata('error', 'No se pudo actualizar el rol');
                return redirect()->to(base_url('mantenimiento/croles/cedit/' . $idRol));
            }
        } else {
            $this->session->setFlashdata('error', "El Rol '$nombre_tipo' ya esta registrado");
            return redirect()->to(base_url('mantenimiento/croles/cedit/' . $idRol));
        }
    }

    public function cdelete($id)
    {
        $data = ['anulado' => '1'];
        $this->mroles->mupdateroles($id, $data);
        return $this->response->setJSON(['status' => 'success', 'redirect' => base_url('mantenimiento/croles')]);
    }
}

