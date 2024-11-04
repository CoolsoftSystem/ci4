<?php

namespace App\Controllers;

use App\Models\Musuario;
use App\Models\Mroles;

class Clogin extends BaseController
{
    protected $musuario;
    protected $mroles;

    public function __construct()
    {
        // Cargar modelos
        $this->musuario = new Musuario();
        $this->mroles = new Mroles();
    }

    public function index()
    {
        return view('admin/login');
    }

    public function clogeo()
    {
        $txtnombre = $this->request->getPost('txtnombre');
        $txtpass = $this->request->getPost('txtpass');
        $res = $this->musuario->logeo($txtnombre, $txtpass);

        if (!$res) {
            session()->setFlashdata('error', 'El Usuario y/o Contraseña son Incorrectas');
            return redirect()->to(base_url());
        } else {
            $data = [
                'idUsuario' => $res->idUsuario,
                'nombre' => $res->nombre,
                'idRol' => $res->idRol,
                'login' => true,
                'roles' => $this->mroles->obtener($res->idRol)
            ];
            session()->set($data);

            // Cargar vistas con los datos
            echo view('layouts/header');
            echo view('layouts/aside', $data);
            echo view('admin/dashboard');
            echo view('layouts/footer');
        }
    }

    public function clogout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
