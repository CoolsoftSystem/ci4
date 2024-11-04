<?php

namespace App\Controllers;

use App\Models\Mtecnico;
use App\Models\Mroles;
use App\Models\Mcombo;
use CodeIgniter\Controller;

class Ctecnico extends BaseController
{
    protected $mtecnico;
    protected $mroles;
    protected $mcombo;
    protected $session;

    public function __construct()
    {
        // Iniciar modelos y sesión
        $this->mtecnico = new Mtecnico();
        $this->mroles = new Mroles();
        $this->mcombo = new Mcombo();
        $this->session = session();

        // Verificar si el usuario ha iniciado sesión
        if (!$this->session->get('login')) {
            return redirect()->to(base_url());
        }
    }

    public function index()
    {
        $idrol = $this->session->get("idRol");
        $data = [
            'tecnicoindex' => $this->mtecnico->mselecttecnico(),
            'roles' => $this->mroles->obtener($idrol),
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

        $res = $this->mtecnico->midupdatetecnico($dni);

        if ($res == null) {
            $data = [
                'Nombre' => $nombre,
                'Dni' => $dni,
                'Telefono' => $telefono,
                'Activo' => '1'
            ];
            $res = $this->mtecnico->minserttecnico($data);

            if ($res) {
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
            'tecnicoedit' => $this->mtecnico->midupdatetecnico($id),
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

        $res = $this->mtecnico->midupdatetecnico($dni);

        if (($res == null) || ($dni == $id)) {
            $data = [
                'Nombre' => $nombre,
                'Dni' => $dni,
                'Telefono' => $telefono
            ];

            $res = $this->mtecnico->mupdatetecnico($id, $data);

            if ($res) {
                $this->session->setFlashdata('correcto', 'Se guardó correctamente');
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
        $data = [
            'Activo' => '0'
        ];
        $this->mtecnico->mupdatetecnico($id, $data);

        return "mantenimiento/ctecnico";
    }
}
