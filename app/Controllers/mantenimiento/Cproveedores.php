<?php

namespace App\Controllers;

use App\Models\Mproveedores;
use App\Models\Mroles;
use App\Models\Mcombo;
use CodeIgniter\Controller;

class Cproveedores extends Controller
{
    protected $session;
    protected $mproveedores;
    protected $mroles;

    public function __construct()
    {
        helper('url');
        $this->session = session();
        
        // Verifica la sesión
        if (!$this->session->get('login')) {
            return redirect()->to(base_url());
        }
        
        $this->mproveedores = new Mproveedores();
        $this->mroles = new Mroles();
    }

    public function index()
    {
        $idrol = $this->session->get('idRol');
        $data = [
            'proveedoresindex' => $this->mproveedores->mselectproveedores(),
            'roles' => $this->mroles->obtener($idrol)
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/proveedores/vlist', $data);
        echo view('layouts/footer');
    }

    public function cadd()
    {
        $idrol = $this->session->get('idRol');
        $data = [
            'roles' => $this->mroles->obtener($idrol)
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/proveedores/vadd');
        echo view('layouts/footer');
    }

    public function cinsert()
    {
        $data = [
            'Nombre' => $this->request->getPost('txtnombre'),
            'Domicilio' => $this->request->getPost('txtdomicilio'),
            'Producto' => $this->request->getPost('txtproducto'),
            'Telefono' => $this->request->getPost('txttelefono'),
            'Email' => $this->request->getPost('txtemail'),
            'Contacto' => $this->request->getPost('txtcontacto'),
            'Descripcion' => $this->request->getPost('txtdescripcion')
        ];

        if ($this->mproveedores->minsertproveedores($data)) {
            $this->session->setFlashdata('correcto', 'Se guardó correctamente');
            return redirect()->to(base_url('mantenimiento/cproveedores'));
        } else {
            $this->session->setFlashdata('error', 'No se guardó el registro');
            return redirect()->to(base_url('mantenimiento/cproveedores/cadd'));
        }
    }

    public function cedit($id)
    {
        $idrol = $this->session->get('idRol');
        $data = [
            'proveedoresedit' => $this->mproveedores->midupdateproveedores($id),
            'roles' => $this->mroles->obtener($idrol)
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/proveedores/vedit', $data);
        echo view('layouts/footer');
    }

    public function cupdate()
    {
        $IdProveedores = $this->request->getPost('txtIdProveedores');
        $data = [
            'Nombre' => $this->request->getPost('txtnombre'),
            'Domicilio' => $this->request->getPost('txtdomicilio'),
            'Producto' => $this->request->getPost('txtproducto'),
            'Telefono' => $this->request->getPost('txttelefono'),
            'Email' => $this->request->getPost('txtemail'),
            'Contacto' => $this->request->getPost('txtcontacto'),
            'Descripcion' => $this->request->getPost('txtdescripcion')
        ];

        if ($this->mproveedores->mupdateproveedores($IdProveedores, $data)) {
            $this->session->setFlashdata('correcto', 'Se guardó correctamente');
            return redirect()->to(base_url('mantenimiento/cproveedores'));
        } else {
            $this->session->setFlashdata('error', 'No se pudo actualizar el proveedor');
            return redirect()->to(base_url("mantenimiento/cproveedores/cedit/{$IdProveedores}"));
        }
    }

    public function cdelete($id)
    {
        $data = [
            'Anulado' => '1'
        ];
        $this->mproveedores->mupdateproveedores($id, $data);
        echo "mantenimiento/cproveedores";
    }
}
?>

