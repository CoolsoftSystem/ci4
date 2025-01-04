<?php

namespace App\Models;

use CodeIgniter\Model;

class Mremito extends Model
{
    // Obtener remitos activos
    public function mselectremito()
    {
        $query = $this->db->query("
            SELECT 
                o.IdRemito, 
                c.Nombre, 
                o.observaciones,
                o.IdCliente, 
                o.fecha 
            FROM 
                remitos o
            INNER JOIN 
                cliente c ON o.IdCliente = c.IdCliente 
            WHERE 
                o.Anulado = 0 
            ORDER BY 
                o.IdRemito DESC
        ");
        return $query->getResult();
    }

    // Obtener remitos por rango de fechas
    public function mselectremitofecha($ini, $fin)
    {
        $ini = date("Y-m-d", strtotime($ini));
        $fin = date("Y-m-d", strtotime($fin));

        $query = $this->db->query("
            SELECT 
                o.IdRemito, 
                c.Nombre, 
                o.observaciones, 
                o.IdCliente, 
                o.FechaRecepcion,
                o.TareaDesarrollar, 
                o.Completada, 
                o.Eliminada 
            FROM 
                remito o
            INNER JOIN 
                cliente c ON o.IdCliente = c.IdCliente 
            WHERE 
                o.Eliminada = 0 
                AND o.Completada = 0 
                AND o.FechaRecepcion BETWEEN '$ini' AND '$fin'
            ORDER BY 
                o.IdRemito DESC
        ");
        return $query->getResult();
    }

    // Consultar tareas de un remito
    public function consultaTareas($id)
    {
        return $this->db->table('remitos')->where('IdRemito', $id)->get()->getResult();
    }

    // Insertar nuevo remito
    public function minsertremito($data)
    {
        return $this->db->table('remitos')->insert($data);
    }

    // Obtener detalles de un remito por ID
    public function midupdateremito($id)
    {
        return $this->db->table('remitos')->where('IdRemito', $id)->get()->getRow();
    }

    // Modificar remito
    public function mupdateremito($id, $data)
    {
        return $this->db->table('remitos')->where('IdRemito', $id)->update($data);
    }

    // Obtener productos asociados a un remito
    public function obtenerProducto($IdRemito)
    {
        return $this->db->table('producto')->where('IdRemito', $IdRemito)->get()->getResult();
    }

    // Insertar producto en un remito
    public function cargarProd($data)
    {
        $this->db->table('producto')->insert($data);
        return $data; // Puedes cambiar esto si necesitas devolver algo específico
    }

    // Obtener producto por ID
    public function obtenerProdconIdProd($IdProducto)
    {
        return $this->db->table('producto')->where('IdProducto', $IdProducto)->get()->getRow();
    }

    // Eliminar producto
    public function mdeleteproducto($IdProducto)
    {
        $this->db->table('producto')->where('IdProducto', $IdProducto)->delete();
    }

    // Modificar producto
    public function mupdateproducto($id, $data)
    {
        return $this->db->table('producto')->where('IdProducto', $id)->update($data);
    }

    // Listar clientes activos
    public function cliente_listar_select()
    {
        $query = $this->db->query("
            SELECT 
                DISTINCT c.IdCliente AS ID, 
                c.Nombre AS NOMBRE 
            FROM 
                cliente c 
            WHERE 
                c.Anulado = 0 
            ORDER BY 
                c.Nombre ASC
        ");
        return $query->getResult();
    }

    // Obtener cliente por ID
    public function obtener($id)
    {
        return $this->db->table('cliente')->where('IdCliente', $id)->get()->getRow();
    }
}
