<?php

namespace App\Controllers;

use App\Libraries\SelectItems;

use App\Models\Mremito;
use App\Models\Mroles;
use App\Models\Mcombo;
use App\Models\Mfactura;
use App\Models\Morden;
use App\Models\Mcliente;

class Cremitos extends BaseController
{
    protected $mremito;
    protected $mroles;
    protected $mcombo;
    protected $mfactura;
    protected $morden;
    protected $mcliente;
    protected $session;

    public function __construct()
    {
        $this->mremito = new Mremito();
        $this->mroles = new Mroles();
        $this->mcombo = new Mcombo();
        $this->mfactura = new Mfactura();
        $this->morden = new Morden();
        $this->mcliente = new Mcliente();
        $this->session = session();

        if (!$this->session->get('login')) {
            return redirect()->to(base_url());
        }
    }

    public function index()
    {
        $idrol = $this->session->get('idRol');
        $remitos = $this->mremito->mselectremito();

        $data = [
            'remitoindex' => $remitos,
            'roles' => $this->mroles->obtener($idrol),
            'session' => $this->session // Pasa la sesión a la vista
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/remito/vlist', $data);
        echo view('layouts/footer');
    }

    public function cadd()
    {
        $selectItems = new SelectItems();
        $idrol = $this->session->get('idRol');
        $data['tipo_cliente_select'] = $this->mremito->cliente_listar_select();

        $datos = [
            'roles' => $this->mroles->obtener($idrol),
            'select_items' => $selectItems,
            'session' => $this->session
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $datos);
        echo view('admin/remito/vadd', $data);
        echo view('layouts/footer');
    }

    public function addProducto()
    {
        $producto = $this->request->getPost("producto");
        $idRemito = $this->request->getPost("idRemito");
        $cant = $this->request->getPost("cant");
        $numSerie = $this->request->getPost("numSerie");

        $productos = $this->mremito->obtenerProducto($idRemito);
        $cant2 = count($productos);

        if ($cant2 < 12) {
            $data = [
                'cantidad' => $cant,
                'producto' => $producto,
                'numSerie' => $numSerie,
                'IdRemito' => $idRemito
            ];

            $res = $this->mremito->cargarProd($data);
            echo json_encode(1);
        } else {
            echo json_encode(0);
        }
    }

    public function cinsert()
    {
        $fecha = $this->request->getPost('txtfecha');
        $observaciones = $this->request->getPost('txtobservaciones');
        $id_cliente = $this->request->getPost("tipo_cliente");

        $data = [
            'fecha' => $fecha,
            'observaciones' => $observaciones,
            'IdCliente' => $id_cliente
        ];

        $res = $this->mremito->minsertremito($data);
        if ($res) {
            $this->session->setFlashdata('correcto', 'Se guardó correctamente');
            return redirect()->to(base_url('mantenimiento/cremitos'));
        } else {
            $this->session->setFlashdata('error', 'No se guardó el registro');
            return redirect()->to(base_url('mantenimiento/cremitos/cadd'));
        }
    }

   /* public function cedit($id)
    {
        $selectItems = new SelectItems();
        $idrol = $this->session->get('idRol');
        $data = [
            'remitoedit' => $this->mremito->midupdateremito($id),
            'roles' => $this->mroles->obtener($idrol),
            'cliente_select' => $this->mremito->cliente_listar_select2(),
            'model' => $this->mremito->obtener($remitoedit->IdCliente),
            'select_items' => $selectItems,
            'session' => $this->session
        ];

        $data['producto'] = $this->mremito->obtenerProducto($data['remitoedit']->IdRemito);

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/remito/vedit', $data);
        echo view('layouts/footer');
    }*/
    public function cedit($id)
{
    // Instanciar objetos necesarios
    $selectItems = new SelectItems();
    $idrol = $this->session->get('idRol');
    
    // Obtener los datos necesarios
    $remitoedit = $this->mremito->midupdateremito($id);
    $roles = $this->mroles->obtener($idrol);
    $model = $this->mremito->obtener($remitoedit->IdCliente); // Asegúrate de que accedes correctamente a IdCliente
    $producto = $this->mremito->obtenerProducto($remitoedit->IdRemito);
    
    // Definir los datos que se pasarán a la vista
    $data = [
        'remitoedit' => $remitoedit,
        'roles' => $roles,
        'cliente_select' => $this->mremito->cliente_listar_select2(),
        'model' => $model,
        'select_items' => $selectItems,
        'session' => $this->session,
        'producto' => $producto
    ];
    
    // Cargar las vistas y pasar los datos
    echo view('layouts/header');
    echo view('layouts/aside', $data);
    echo view('admin/remito/vedit', $data);
    echo view('layouts/footer');
}


    public function cupdate()
    {
        $id = $this->request->getPost('txtIdRemito');
        $fecha = $this->request->getPost('txtfecha');
        $observaciones = $this->request->getPost('txtobservaciones');
        $id_cliente = $this->request->getPost("cliente");

        $fecha = $fecha ? date("Y/m/d", strtotime($fecha)) : null;

        $data = [
            'fecha' => $fecha,
            'observaciones' => $observaciones,
            'IdCliente' => $id_cliente
        ];

        $res = $this->mremito->mupdateremito($id, $data);
        if ($res) {
            $this->session->setFlashdata('correcto', 'Se guardó correctamente');
            return redirect()->to(base_url('mantenimiento/cremitos'));
        } else {
            $this->session->setFlashdata('error', 'No se pudo actualizar el remito');
            return redirect()->to(base_url('mantenimiento/cremitos/cedit/' . $id));
        }
    }

    public function cdelete($id)
    {
        $data = ['Anulado' => '1'];
        $this->mremito->mupdateremito($id, $data);
        echo "mantenimiento/cremitos";
    }

    public function ceditProd($id)
    {
        $idrol = $this->session->get('idRol');
        $data = [
            'productoedit' => $this->mremito->midupdateproducto($id),
            'roles' => $this->mroles->obtener($idrol),
            'session' => $this->session
        ];

        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/producto/vedit', $data);
        echo view('layouts/footer');
    }

    public function cdeleteProd($id)
    {
        $prod = $this->mremito->obtenerProdconIdProd($id);
        $IdRemito = $prod->IdRemito;
        $this->mremito->mdeleteproducto($id);
        echo "mantenimiento/cremitos/cedit/$IdRemito";
    }

    public function cupdateProd()
    {
        $descripcion = $this->request->getPost('txtproducto');
        $cantidad = $this->request->getPost('txtcantidad');
        $numSerie = $this->request->getPost('txtnumSerie');
        $id = $this->request->getPost('txtid');
        $prod = $this->mremito->obtenerProdconIdProd($id);

        $IdRemito = $prod->IdRemito;
        $data = [
            'producto' => $descripcion,
            'cantidad' => $cantidad,
            'numSerie' => $numSerie
        ];

        $res = $this->mremito->mupdateproducto($id, $data);
        if ($res) {
            $this->session->setFlashdata('correcto', 'Se guardó correctamente');
            return redirect()->to(base_url('mantenimiento/cremitos/cedit/' . $IdRemito));
        } else {
            $this->session->setFlashdata('error', 'No se pudo actualizar el producto');
            return redirect()->to(base_url('mantenimiento/cremitos/cedit' . $id));
        }
    }

    public function cprint($id)
{
 
    $idrol = $this->session->get('idRol');
    
    // Obtener los datos necesarios
    $remito = $this->mremito->midupdateremito($id);
    $roles = $this->mroles->obtener($idrol);
    $cliente = $this->mcliente->midupdatecliente($remito->IdCliente);
    $producto = $this->mremito->obtenerProducto($id);
    
    // Definir los datos que se pasarán a la vista
    $data = [
        'remito' => $remito,
        'roles' => $roles,
        'cliente' => $cliente,
        'producto' => $producto,
        'session' => $this->session
    ];
    
    // Cargar las vistas y pasar los datos
    echo view('layouts/header');
    echo view('layouts/aside', $data);
    echo view('admin/remito/vprint', $data);
    echo view('layouts/footer');
}


    public function cError($idRemito)
    {
        $this->session->setFlashdata('error', 'Faltan datos del producto');
        return redirect()->to(base_url('mantenimiento/cremitos/cedit/' . $idRemito));
    }
}

