<?php

namespace App\Models;

use CodeIgniter\Model;

class Mcliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'IdCliente';
    protected $allowedFields = [
        'DniCuit',
        'Nombre',
        'Domicilio',
        'Provincia',
        'tel_mantenimiento',
        'tel_venta',
        'tel_comercial',
        'mail_mant',
        'mail_vta',
        'mail_comercial',
        'nya_mant',
        'nya_vta',
        'nya_cial',
        'Anulado',
    ];
    protected $returnType = 'object'; // Puedes cambiar a 'array' si prefieres

    //MOSTRAR Cliente
    public function mselectcliente()
    {
        return $this->where('Anulado', '0')
            ->orderBy('IdCliente', 'asc')
            ->findAll();
    }

    //INSERTAR Cliente
    public function minsertcliente(array $data)
    {
        return $this->insert($data);
    }

    //OBTENER DATOS
    public function midupdatecliente($id)
    {
        return $this->find($id);
    }

    //OBTENER DATOS CON DNI
    public function obtenerclientedni($dni)
    {
        return $this->where('DniCuit', $dni)->first();
    }

    //MODIFICAR Cliente
    public function mupdatecliente($id, array $data)
    {
        return $this->update($id, $data);
    }

    //Traer Cliente
    public function mselectinfocliente($id)
    {
        return $this->find($id);
    }
}

