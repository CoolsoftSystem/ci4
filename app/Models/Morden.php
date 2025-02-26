<?php

namespace App\Models;

use CodeIgniter\Model;

class Morden extends Model
{
    protected $table = 'orden'; // Tabla principal
    protected $primaryKey = 'IdOrden'; // Clave primaria
    protected $allowedFields = [
        'IdCliente',
        'FechaRecepcion',
        'TareaDesarrollar',
        'Precio',
        'Completada',
        'Eliminada',
        'observaciones'
    ];

    // MOSTRAR órdenes activas
    public function mselectorden()
    {
        $sql = "
            SELECT 
                o.IdOrden, c.Nombre, o.IdCliente, o.FechaRecepcion,
                o.TareaDesarrollar, o.Precio, o.Completada, o.Eliminada,
                f.N_factura, f.fecha_factura, f.fecha_pago, f.estado_pago
            FROM orden o
            INNER JOIN cliente c ON o.IdCliente = c.IdCliente
            LEFT JOIN factura f ON f.id_orden = o.IdOrden
            WHERE o.Eliminada = 0 AND o.Completada = 0
            ORDER BY o.IdOrden DESC
        ";

        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function mselectestadostrabajo()
    {
        $sql = "
            SELECT 
                o.IdOrden, c.Nombre, o.IdCliente, o.FechaRecepcion,
                o.TareaDesarrollar, o.Precio, o.Completada, o.Eliminada,
                f.N_factura, f.fecha_factura, f.fecha_pago, f.estado_pago
            FROM orden o
            INNER JOIN cliente c ON o.IdCliente = c.IdCliente
            LEFT JOIN factura f ON f.id_orden = o.IdOrden
            WHERE o.Eliminada = 0
            ORDER BY o.IdOrden DESC
        ";

        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function mselectordenfecha($ini, $fin)
    {
        $sql = "
            SELECT 
                o.IdOrden, c.Nombre, o.IdCliente, o.FechaRecepcion,
                o.TareaDesarrollar, o.Precio, o.Completada, o.Eliminada
            FROM orden o
            INNER JOIN cliente c ON o.IdCliente = c.IdCliente
            WHERE o.Eliminada = 0 
                AND o.Completada = 0 
                AND o.FechaRecepcion >= ? 
                AND o.FechaRecepcion <= ?
            ORDER BY o.IdOrden DESC
        ";

        $query = $this->db->query($sql, [date("Y-m-d", strtotime($ini)), date("Y-m-d", strtotime($fin))]);
        return $query->getResult();
    }

    public function consultaTareas($id)
    {
        return $this->db->table('parteorden')
            ->where('IdOrden', $id)
            ->get()
            ->getResult();
    }

    public function consultaGatosTotales($id)
    {
        $sql = "SELECT SUM(Precio) AS Gastos FROM material WHERE IdParte = ?";
        $query = $this->db->query($sql, [$id]);
        return $query->getRow()->Gastos ?? 0;
    }

    public function consultaGatosOrden($id)
    {
        $sql = "SELECT IFNULL(SUM(Precio), 0) AS Gastos FROM material WHERE IdOrden = ?";
        $query = $this->db->query($sql, [$id]);
        return $query->getRow()->Gastos ?? 0;
    }

    public function mselectordencompletas()
    {
        $sql = "
            SELECT 
                o.IdOrden, c.Nombre, o.IdCliente, o.FechaRecepcion,
                o.TareaDesarrollar, o.Precio, o.Completada, o.Eliminada
            FROM orden o
            INNER JOIN cliente c ON o.IdCliente = c.IdCliente
            WHERE o.Eliminada = 0 AND o.Completada = 1
            ORDER BY o.IdOrden ASC
        ";

        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function minsertorden($data)
    {
        return $this->insert($data);
    }

    public function midupdateorden($id)
    {
        return $this->where('IdOrden', $id)->first();
    }

    public function midupdateordenyfacturas($id)
    {
        $sql = "
            SELECT 
                o.IdOrden, o.observaciones, o.IdCliente, o.FechaRecepcion,
                o.TareaDesarrollar, o.Precio, o.Completada, o.Eliminada,
                f.N_factura, f.fecha_factura, f.fecha_pago, f.estado_pago
            FROM orden o
            LEFT JOIN factura f ON f.id_orden = o.IdOrden
            WHERE o.IdOrden = ?
        ";

        $query = $this->db->query($sql, [$id]);
        return $query->getRow();
    }

    public function mupdateorden($id, $data)
    {
        return $this->update($id, $data);
    }

    public function mselectinfoorden($id)
    {
        return $this->where('IdOrden', $id)->first();
    }

    public function cliente_listar_select()
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

    public function cliente_listar_select2()
    {
        return $this->cliente_listar_select();
    }

    public function obtener($id)
    {
        return $this->db->table('cliente')
            ->where('IdCliente', $id)
            ->get()
            ->getRow();
    }

    public function consultarEstado($id)
    {
        $sql = "
            SELECT * 
            FROM parteorden
            WHERE IdOrden = ?
              AND IdParte = (
                  SELECT MAX(IdParte) 
                  FROM parteorden 
                  WHERE IdOrden = ? AND anulado = 0
              )
        ";

        $query = $this->db->query($sql, [$id, $id]);
        return $query->getRow();
    }

    public function consultarPrimerTarea($id)
    {
        $sql = "
            SELECT * 
            FROM parteorden
            WHERE IdOrden = ?
              AND IdParte = (
                  SELECT MIN(IdParte) 
                  FROM parteorden 
                  WHERE IdOrden = ?
              )
        ";

        $query = $this->db->query($sql, [$id, $id]);
        return $query->getRow();
    }
}

