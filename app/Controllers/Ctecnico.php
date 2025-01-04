<?php

namespace App\Controllers;

use App\Models\Mtecnico;
use App\Models\Mroles;
use App\Models\Mcombo;

class Ctecnico extends BaseController
{
    protected $mtecnico;
    protected $mroles;
    protected $mcombo;
    protected $session;

    public function __construct()
    {
        // Iniciar sesión
        $this->session = session();

        // Verificar si el usuario ha iniciado sesión
        if (!$this->session->get('login')) {
            return redirect()->to(base_url());
        }

        // Iniciar modelos
        $this->mtecnico = new Mtecnico();
        $this->mroles = new Mroles();
        $this->mcombo = new Mcombo();
    }

    public function index()
    {
        $idrol = $this->session->get("idRol");

        $data = [
            'tecnicoindex' => $this->mtecnico->selectTecnicosActivos(),
            'roles' => $this->mroles->obtener($idrol),
            'session' => $this->session // Pasa la sesión a la vista
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/tecnico/vlist', $data);
        echo view('layouts/footer');
    }

    public function cadd()
    {
        $idrol = $this->session->get("idRol");

        $data = [
            'roles' => $this->mroles->obtener($idrol),
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/tecnico/vadd');
        echo view('layouts/footer');
    }

    public function cinsert()
    {
        $nombre = $this->request->getPost('txtnombre');
        $dni = $this->request->getPost('txtdni');
        $telefono = $this->request->getPost('txttelefono');

        // Verificar si el técnico ya existe
        $res = $this->mtecnico->getTecnicoById($dni);

        if (!$res) {
            $data = [
                'Nombre' => $nombre,
                'Dni' => $dni,
                'Telefono' => $telefono,
                'Activo' => '1'
            ];

            if ($this->mtecnico->insertTecnico($data)) {
                $this->session->setFlashdata('correcto', 'Se guardó correctamente');
                return redirect()->to(base_url('mantenimiento/ctecnico'));
            } else {
                $this->session->setFlashdata('error', 'No se guardó el registro');
                return redirect()->to(base_url('mantenimiento/ctecnico/cadd'));
            }
        } else {
            $this->session->setFlashdata('error', 'Este DNI ya está registrado');
            return redirect()->to(base_url('mantenimiento/ctecnico/cadd'));
        }
    }

    public function cedit($id)
    {
        $idrol = $this->session->get("idRol");

        $data = [
            'tecnicoedit' => $this->mtecnico->getTecnicoById($id),
            'roles' => $this->mroles->obtener($idrol),
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/tecnico/vedit', $data);
        echo view('layouts/footer');
    }

    public function cupdate()
    {
        $nombre = $this->request->getPost('txtnombre');
        $dni = $this->request->getPost('txtdni');
        $id = $this->request->getPost('txtid');
        $telefono = $this->request->getPost('txttelefono');

        $res = $this->mtecnico->getTecnicoById($dni);

        if (!$res || $dni === $id) {
            $data = [
                'Nombre' => $nombre,
                'Dni' => $dni,
                'Telefono' => $telefono,
            ];

            if ($this->mtecnico->updateTecnico($id, $data)) {
                $this->session->setFlashdata('correcto', 'Se actualizó correctamente');
                return redirect()->to(base_url('mantenimiento/ctecnico'));
            } else {
                $this->session->setFlashdata('error', 'No se pudo actualizar el técnico');
                return redirect()->to(base_url('mantenimiento/ctecnico/cedit/' . $id));
            }
        } else {
            $this->session->setFlashdata('error', 'Este DNI ya está registrado');
            return redirect()->to(base_url('mantenimiento/ctecnico/cadd'));
        }
    }

    public function cdelete($id)
    {
        $data = ['Activo' => '0'];

        if ($this->mtecnico->updateTecnico($id, $data)) {
            $this->session->setFlashdata('correcto', 'El técnico fue desactivado');
        } else {
            $this->session->setFlashdata('error', 'No se pudo desactivar el técnico');
        }

        return redirect()->to(base_url('mantenimiento/ctecnico'));
    }
}
