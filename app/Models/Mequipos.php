<?php

namespace App\Models;

use CodeIgniter\Model;

class Mequipos extends Model
{
    protected $table = 'recepcionequipos'; // Tabla principal
    protected $primaryKey = 'num_orden';   // Clave primaria
    protected $allowedFields = [
        'fecha',
        'marca',
        'modelo',
        'num_serie',
        'sector',
        'descripcion',
        'accesorios',
        'id_cliente',
        'anulado'
    ];

    // MOSTRAR orden equipos
    public function mselectequipos()
    {
        $sql = "
            SELECT 
                r.num_orden, r.fecha, r.marca, r.modelo,
                r.num_serie, r.sector, r.descripcion, 
                r.accesorios, r.id_cliente, r.anulado, 
                c.Nombre 
            FROM recepcionequipos r
            JOIN cliente c ON r.id_cliente = c.IdCliente  
            WHERE r.anulado = 0 
            ORDER BY r.num_orden DESC
        ";

        $query = $this->db->query($sql);
        return $query->getResult();
    }

    // INSERTAR orden equipos
    public function minsertequipos($data)
    {
        return $this->insert($data);
    }

    // OBTENER DATOS
    public function midupdateequipos($id)
    {
        return $this->where('num_orden', $id)->first();
    }

    // MODIFICAR orden equipos
    public function mupdateequipos($id, $data)
    {
        return $this->update($id, $data);
    }

    // TRAER Cliente
    public function mselectinfocliente($id)
    {
        $query = $this->db->table('cliente')
            ->where('IdCliente', $id)
            ->get();

        return $query->getRow();
    }

    // Listar clientes para select (versión 1)
    public function cliente_listar_select()
    {
        $sql = "
            SELECT DISTINCT 
                cliente.IdCliente AS ID, 
                cliente.Nombre AS NOMBRE
            FROM cliente 
            WHERE cliente.Anulado = 0
            ORDER BY cliente.Nombre ASC
        ";

        $query = $this->db->query($sql);
        return $query->getResult();
    }

    // Listar clientes para select (versión 2)
    public function cliente_listar_select2()
    {
        $sql = "
            SELECT DISTINCT 
                cliente.IdCliente AS IdCliente, 
                cliente.Nombre AS NOMBRE
            FROM cliente 
            WHERE cliente.Anulado = 0
            ORDER BY cliente.Nombre ASC
        ";

        $query = $this->db->query($sql);
        return $query->getResult();
    }

    // Obtener cliente por ID
    public function obtener($id)
    {
        $query = $this->db->table('cliente')
            ->where('IdCliente', $id)
            ->get();

        return $query->getRow();
    }
}
