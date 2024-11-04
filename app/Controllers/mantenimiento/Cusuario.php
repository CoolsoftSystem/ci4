<?php

namespace App\Controllers;

use App\Models\Musuario;
use App\Models\Mroles;
use App\Models\Mcombo;
use CodeIgniter\Controller;

class Cusuario extends Controller
{
    protected $musuario;
    protected $mroles;

    public function __construct()
    {
        $this->musuario = new Musuario();
        $this->mroles = new Mroles();
        
        if (!session()->get('login')) {
            return redirect()->to(base_url());
        }
    }

    public function index()
    {
        $idrol = session()->get("idRol");
        $data = [
            'usuarioindex' => $this->musuario->mselectusuario(),
            'roles' => $this->mroles->obtener($idrol),
        ];
        
        return view('layouts/header')
            . view('layouts/aside', $data)
            . view('admin/usuario/vlist', $data)
            . view('layouts/footer');
    }

    public function cadd()
    {
        $idrol = session()->get("idRol");
        $data = [
            'roles' => $this->mroles->obtener($idrol),
            'usuario_select' => $this->mroles->mselectrolessolo(),
        ];

        return view('layouts/header')
            . view('layouts/aside', $data)
            . view('admin/usuario/vadd', $data)
            . view('layouts/footer');
    }

    public function cinsert()
    {
        $nombre = $this->request->getPost('txtnombre');
        $email = $this->request->getPost('txtemail');
        $idRol = $this->request->getPost('usuario_select');
        $contraseña = $this->request->getPost('txtContraseña');

        $usu = $this->musuario->obtenerusuario($nombre);

        if ($usu == null) {
            $data = [
                'nombre' => $nombre,
                'email' => $email,
                'pass' => $contraseña,
                'idRol' => $idRol,
                'Anulado' => '0',
            ];
            $res = $this->musuario->minsertusuario($data);

            if ($res) {
                session()->setFlashdata('correcto', 'Se guardo Correctamente');
                return redirect()->to(base_url('mantenimiento/cusuario'));
            } else {
                session()->setFlashdata('error', 'No se Guardo registro');
                return redirect()->to(base_url('mantenimiento/cusuario/cadd'));
            }
        } else {
            session()->setFlashdata('error', "El Usuario '$nombre' ya esta registrado ");
            return redirect()->to(base_url('mantenimiento/cusuario/cadd'));
        }
    }

    public function cedit($id)
    {
        $idrol = session()->get("idRol");
        $data = [
            'usuarioedit' => $this->musuario->midupdateusuario($id),
            'roles' => $this->mroles->obtener($idrol),
            'usuario_select' => $this->musuario->usuario_listar_select(),
            'model' => $this->musuario->obtener($data['usuarioedit']->idRol),
        ];

        return view('layouts/header')
            . view('layouts/aside', $data)
            . view('admin/usuario/vedit', $data)
            . view('layouts/footer');
    }

    public function cupdate()
    {
        $idusuario = $this->request->getPost('txtidusuario');
        $nombre = $this->request->getPost('txtnombre');
        $email = $this->request->getPost('txtemail');
        $txtnombreviejo = $this->request->getPost('txtnombreviejo');
        $idRol = mb_strtoupper($this->request->getPost('usuario'));
        $contraseña = $this->request->getPost('txtContraseña');

        $usu = $this->musuario->obtenerusuario($usuario);

        if (($usu == null) or ($txtnombreviejo == $usu)) {
            $data = [
                'nombre' => $nombre,
                'email' => $email,
                'pass' => $contraseña,
            ];

            $res = $this->musuario->mupdateusuario($idusuario, $data);
            if ($res) {
                session()->setFlashdata('correcto', 'Se Guardo Correctamente');
                return redirect()->to(base_url('mantenimiento/cusuario'));
            } else {
                session()->setFlashdata('error', 'No se pudo actualizar la usuario');
                return redirect()->to(base_url('mantenimiento/cusuario/cedit/' . $idusuario));
            }
        } else {
            session()->setFlashdata('error', "El Usuario '$usuario' ya esta registrado ");
            return redirect()->to(base_url('mantenimiento/cusuario/cedit/' . $idusuario));
        }
    }

    public function cdelete($id)
    {
        $data = [
            'Anulado' => '1',
        ];
        $this->musuario->mupdateusuario($id, $data);
        echo "mantenimiento/cusuario";
    }
}

