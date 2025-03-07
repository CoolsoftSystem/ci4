<?php

namespace App\Controllers;

use App\Models\Mproveedores;
use App\Models\Mroles;
use CodeIgniter\Controller;

class Cproveedores extends BaseController
{
    protected $session;
    protected $mproveedores;
    protected $mroles;

    public function __construct()
    {
        helper(['url', 'form']); // Carga helpers necesarios
        $this->session = session();

        // Redirige si no hay sesión activa
        if (!$this->session->get('login')) {
            return redirect()->to(base_url());
        }

        $this->mproveedores = new Mproveedores();
        $this->mroles = new Mroles();
    }

    /**
     * Página principal: lista de proveedores.
     */
    public function index()
    {
        $idRol = $this->session->get('idRol');
        $data = [
            'proveedoresindex' => $this->mproveedores->selectProveedoresActivos(),
            'roles' => $this->mroles->obtener($idRol),
            'session' => $this->session
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/proveedores/vlist', $data);
        echo view('layouts/footer');
    }

    /**
     * Formulario para agregar un proveedor.
     */
    public function cadd()
    {
        $idRol = $this->session->get('idRol');
        $data = [
            'roles' => $this->mroles->obtener($idRol),
            'session' => $this->session
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/proveedores/vadd');
        echo view('layouts/footer');
    }

    /**
     * Inserta un nuevo proveedor en la base de datos.
     */
    public function cinsert()
    {
        $data = [
            'Nombre' => $this->request->getPost('txtnombre'),
            'Domicilio' => $this->request->getPost('txtdomicilio'),
            'Producto' => $this->request->getPost('txtproducto'),
            'Telefono' => $this->request->getPost('txttelefono'),
            'Email' => $this->request->getPost('txtemail'),
            'Contacto' => $this->request->getPost('txtcontacto'),
            'Descripcion' => $this->request->getPost('txtdescripcion'),
            'Anulado' => '0'
        ];

        if ($this->mproveedores->insertProveedor($data)) {
            $this->session->setFlashdata('correcto', 'Proveedor guardado correctamente.');
            return redirect()->to(base_url('mantenimiento/cproveedores'));
        } else {
            $this->session->setFlashdata('error', 'No se pudo guardar el proveedor.');
            return redirect()->to(base_url('mantenimiento/cproveedores/cadd'));
        }
    }

    /**
     * Formulario para editar un proveedor.
     */
    public function cedit($id)
    {
        $idRol = $this->session->get('idRol');
        $data = [
            'proveedoresedit' => $this->mproveedores->selectInfoProveedor($id),
            'roles' => $this->mroles->obtener($idRol),
            'session' => $this->session
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/proveedores/vedit', $data);
        echo view('layouts/footer');
    }

    /**
     * Actualiza la información de un proveedor.
     */
    public function cupdate()
    {
        $idProveedor = $this->request->getPost('txtIdProveedores');
        $data = [
            'Nombre' => $this->request->getPost('txtnombre'),
            'Domicilio' => $this->request->getPost('txtdomicilio'),
            'Producto' => $this->request->getPost('txtproducto'),
            'Telefono' => $this->request->getPost('txttelefono'),
            'Email' => $this->request->getPost('txtemail'),
            'Contacto' => $this->request->getPost('txtcontacto'),
            'Descripcion' => $this->request->getPost('txtdescripcion')
        ];

        if ($this->mproveedores->updateProveedor($idProveedor, $data)) {
            $this->session->setFlashdata('correcto', 'Proveedor actualizado correctamente.');
            return redirect()->to(base_url('mantenimiento/cproveedores'));
        } else {
            $this->session->setFlashdata('error', 'No se pudo actualizar el proveedor.');
            return redirect()->to(base_url("mantenimiento/cproveedores/cedit/{$idProveedor}"));
        }
    }

    /**
     * Marca un proveedor como anulado.
     */
    public function cdelete($id)
    {
        $data = ['Anulado' => '1'];

        if ($this->mproveedores->updateProveedor($id, $data)) {
            session()->setFlashdata('correcto', 'Proveedor eliminado correctamente.');
            return $this->response->setJSON(['status' => 'success', 'redirect' => base_url('mantenimiento/cproveedores')]);
        } else {
            session()->setFlashdata('error', 'No se pudo eliminar el proveedor.');
            return $this->response->setJSON(['status' => 'error']);
        }
    }
}
