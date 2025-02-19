<?php

namespace App\Controllers;

use App\Models\Mcliente;
use App\Models\Mroles;
use App\Models\Mcombo;
use CodeIgniter\Controller;

class Ccliente extends BaseController
{
    protected $mcliente;
    protected $mroles;
    protected $mcombo;
    protected $session;

    public function __construct()
    {
        // Cargar modelos
        $this->mcliente = new Mcliente();
        $this->mroles = new Mroles();
        $this->mcombo = new Mcombo();

        $this->session = session();

        // Verificar sesión
        if (!session()->get('login')) {
            return redirect()->to(base_url());
        }
    }

    public function index()
    {
        $idrol = session()->get('idRol');
        $data = [
            'clienteindex' => $this->mcliente->mselectcliente(),
            'roles' => $this->mroles->obtener($idrol),
            'session' => $this->session
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/cliente/vlist', $data);
        echo view('layouts/footer');
    }

    public function cadd()
    {
        $idrol = session()->get('idRol');
        $data = [
            'roles' => $this->mroles->obtener($idrol),
            'session' => $this->session
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/cliente/vadd');
        echo view('layouts/footer');
    }

    public function cinsert()
    {
        $nombre = $this->request->getPost('txtnombre');
        $cuit = $this->request->getPost('txtcuit');
        $prov = $this->request->getPost('txtprovincia');
        $domicilio = $this->request->getPost('txtdomicilio');
        $iva = $this->request->getPost('txtiva');
        $localidad = $this->request->getPost('txtlocalidad');
        $mant = $this->request->getPost('txtmant');
        $venta = $this->request->getPost('txtventas');
        $comer = $this->request->getPost('txtcomercial');
        $mmant = $this->request->getPost('txtmmant');
        $mvta = $this->request->getPost('txtmvta');
        $mcial = $this->request->getPost('txtmcial');
        $nmant = $this->request->getPost('txtnmant');
        $nvta = $this->request->getPost('txtnvta');
        $ncial = $this->request->getPost('txtncial');

        $cli = $this->mcliente->obtenerclientedni($cuit);

        if ($cli == null) {
            $data = [
                'Nombre' => $nombre,
                'DniCuit' => $cuit,
                'Provincia' => $prov,
                'Domicilio' => $domicilio,
                'IVA' => $iva,
                'Localidad' => $localidad,
                'tel_mantenimiento' => $mant,
                'tel_venta' => $venta,
                'tel_comercial' => $comer,
                'mail_mant' => $mmant,
                'mail_vta' => $mvta,
                'mail_comercial' => $mcial,
                'nya_mant' => $nmant,
                'nya_vta' => $nvta,
                'nya_cial' => $ncial,
                'Anulado' => '0'
            ];

            if ($this->mcliente->minsertcliente($data)) {
                session()->setFlashdata('correcto', 'Se guardó correctamente');
                return redirect()->to(base_url('mantenimiento/ccliente'));
            } else {
                session()->setFlashdata('error', 'No se guardó el registro');
                return redirect()->to(base_url('mantenimiento/ccliente/cadd'));
            }
        } else {
            session()->setFlashdata('error', 'Este Dni/Cuit ya está registrado');
            return redirect()->to(base_url('mantenimiento/ccliente/cadd'));
        }
    }

    public function cedit($id)
    {
        $idrol = session()->get('idRol');
        $data = [
            'clienteedit' => $this->mcliente->midupdatecliente($id),
            'roles' => $this->mroles->obtener($idrol),
            'session' => $this->session
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/cliente/vedit', $data);
        echo view('layouts/footer');
    }

    public function cupdate()
    {
        
        // Recibir datos del formulario
        $idcliente = $this->request->getPost('txtidcliente');
        $nombre = $this->request->getPost('txtnombre');
        $cuitold = $this->request->getPost('txtcuitold');
        $cuit = $this->request->getPost('txtcuitnew');
        $prov = $this->request->getPost('txtprovincia');
        $domicilio = $this->request->getPost('txtdomicilio');
        $iva = $this->request->getPost('txtiva');
        $localidad = $this->request->getPost('txtlocalidad');
        $mant = $this->request->getPost('txtmant');
        $venta = $this->request->getPost('txtventas');
        $comer = $this->request->getPost('txtcomercial');
        $mmant = $this->request->getPost('txtmmant');
        $mvta = $this->request->getPost('txtmvta');
        $mcial = $this->request->getPost('txtmcial');
        $nmant = $this->request->getPost('txtnmant');
        $nvta = $this->request->getPost('txtnvta');
        $ncial = $this->request->getPost('txtncial');

        log_message('debug', "Valor de localidad: " .$localidad);

        // Verificar si el cliente ya existe
        $cli = $this->mcliente->obtenerclientedni($cuit);

        if (($cli === null) || ($cuitold === $cuit)) {
            // Datos a actualizar
            $data = [
                'Nombre' => $nombre,
                'DniCuit' => $cuit,
                'Provincia' => $prov,
                'IVA' => $iva,
                'Localidad' => $localidad,
                'tel_mantenimiento' => $mant,
                'tel_venta' => $venta,
                'tel_comercial' => $comer,
                'mail_mant' => $mmant,
                'mail_vta' => $mvta,
                'mail_comercial' => $mcial,
                'nya_mant' => $nmant,
                'nya_vta' => $nvta,
                'nya_cial' => $ncial,
                'Domicilio' => $domicilio
            ];

            if ($this->mcliente->mupdatecliente($idcliente, $data)) {
                // Mensaje de éxito
                session()->setFlashdata('correcto', 'Se guardó correctamente');
                return redirect()->to(base_url('mantenimiento/ccliente'));
            } else {
                // Error al guardar
                session()->setFlashdata('error', 'No se pudo actualizar el cliente');
                return redirect()->back()->withInput(); // Devuelve los datos ingresados
            }
        } else {
            // Error de duplicidad
            session()->setFlashdata('error', 'Este Dni/Cuit ya está registrado');
            return redirect()->back()->withInput(); // Devuelve los datos ingresados
        }
    }


    public function cdelete($id)
    {
        $data = ['Anulado' => '1'];
        $this->mcliente->mupdatecliente($id, $data);

        // Devuelve una cadena para redireccionar con AJAX
        echo "mantenimiento/ccliente";
    }
}

