<?php

namespace App\Models;

use CodeIgniter\Model;

class Mparteorden extends Model
{
    protected $table = 'parteorden';
    protected $primaryKey = 'IdParte';
    protected $allowedFields = [
        'IdOrden',
        'Descripcion',
        'Cantidad',
        'Precio',
        'Anulado'
    ];

    // MOSTRAR parteorden
    public function mselectparteorden($id)
    {
        return $this->where('Anulado', '0')
            ->where('IdOrden', $id)
            ->findAll();
    }

    // INSERTAR parteorden
    public function minsertparteorden($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    // INSERTAR TecnicoOrden
    public function insertTecnicoOrden($data)
    {
        return $this->db->table('tecnicoorden')->insert($data);
    }

    // OBTENER DATOS parteorden
    public function midupdateparteorden($id)
    {
        return $this->find($id);
    }

    // OBTENER DATOS Material
    public function midupdatematerial($id)
    {
        return $this->db->table('material')->where('IdMat', $id)->get()->getRow();
    }

    // MODIFICAR parteorden
    public function mupdateparteorden($idparte, $idorden, $data)
    {
        return $this->where('IdParte', $idparte)
            ->where('IdOrden', $idorden)
            ->set($data)
            ->update();
    }

    // INFORMACION parteorden
    public function mselectinfoparteorden($id)
    {
        $query = $this->db->query(
            "SELECT o.IdOrden, o.FechaRecepcion, o.TareaDesarrollar, o.Precio, o.IdCliente, o.Completada, o.Eliminada, c.Nombre
             FROM orden o
             INNER JOIN cliente c ON o.IdCliente = c.IdCliente
             WHERE o.IdOrden = ?",
            [$id]
        );
        return $query->getRow();
    }

    // LISTAR tecnicos
    public function tecnico_listar_select()
    {
        $query = $this->db->query(
            "SELECT DISTINCT tecnico.Dni AS ID, tecnico.Nombre AS NOMBRE
             FROM tecnico
             WHERE tecnico.Activo = 1
             ORDER BY tecnico.Nombre ASC"
        );
        return $query->getResult();
    }

    public function tecnico_listar_select2()
    {
        return $this->tecnico_listar_select();
    }

    // OBTENER Materiales de Parte Orden
    public function obtenerMaterial($idOrden, $idParte)
    {
        return $this->db->table('material')
            ->where('IdOrden', $idOrden)
            ->where('IdParte', $idParte)
            ->get()
            ->getResult();
    }

    public function obtenerMaterialconIdMat($IdMat)
    {
        return $this->db->table('material')->where('IdMat', $IdMat)->get()->getRow();
    }

    // ELIMINAR Material
    public function mdeletematerial($IdMat)
    {
        return $this->db->table('material')->where('IdMat', $IdMat)->delete();
    }

    // OBTENER Tecnicos por IdParte
    public function mselectTecnicoIdParte($id)
    {
        $query = $this->db->query(
            "SELECT t.IdParte, t.Dni, tc.Nombre
             FROM tecnicoorden t
             INNER JOIN tecnico tc ON t.Dni = tc.Dni
             WHERE t.IdParte = ?",
            [$id]
        );
        return $query->getResult();
    }

    public function mselectTecnicoId($id)
    {
        $query = $this->db->query(
            "SELECT tc.Nombre
             FROM tecnicoorden t
             INNER JOIN tecnico tc ON t.Dni = tc.Dni
             WHERE tc.Activo = 1 AND t.IdParte = ?",
            [$id]
        );
        return $query->getResult();
    }

    // MODIFICAR Material
    public function mupdatematerial($id, $data)
    {
        return $this->db->table('material')->where('IdMat', $id)->update($data);
    }

    // CARGAR Material
    public function cargarMat($data)
    {
        $this->db->table('material')->insert($data);
        $IdMat = $this->db->insertID();

        return sprintf(
            '<tr>
                <td>%d</td>
                <td>%s</td>
                <td>%d</td>
                <td>%s</td>
                <td>
                    <div class="btn-group">
                        <a title="Modificar" href="@%d" class="btn btn-info">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <a title="Eliminar" href="_%d" class="btn btn-danger btn-remove">
                            <span class="fa fa-remove"></span>
                        </a>
                    </div>
                </td>
            </tr>',
            $IdMat,
            $data['Descripcion'],
            $data['Cantidad'],
            $data['Precio'],
            $IdMat,
            $IdMat
        );
    }

    // FUNCIONES DE HORAS
    public function suma_horas($hora1, $hora2)
    {
        $hora1 = explode(':', $hora1);
        $hora2 = explode(':', $hora2);
        $segundos = (int) $hora1[2] + (int) $hora2[2];
        $minutos = (int) $hora1[1] + (int) $hora2[1] + intdiv($segundos, 60);
        $horas = (int) $hora1[0] + (int) $hora2[0] + intdiv($minutos, 60);

        return sprintf('%02d:%02d:%02d', $horas % 24, $minutos % 60, $segundos % 60);
    }

    public function explode_tiempo($tiempo)
    {
        $arr_tiempo = explode(':', $tiempo);
        return $arr_tiempo[0] * 3600 + $arr_tiempo[1] * 60 + $arr_tiempo[2];
    }

    public function segundos_hhmm($seg)
    {
        $horas = floor($seg / 3600);
        $minutos = floor($seg / 60 % 60);
        $segundos = $seg % 60;

        return sprintf('%02d:%02d:%02d', $horas, $minutos, $segundos);
    }
}
