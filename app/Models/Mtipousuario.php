<?php

namespace App\Models;

use CodeIgniter\Model;

class Mtipousuario extends Model
{
    protected $table = 'tipousuario';
    protected $primaryKey = 'idRol';
    protected $allowedFields = ['nombre_tipo']; // Ajusta esto si tienes más campos que puedes insertar/actualizar

    // Mostrar tipos de usuario
    public function mselecttipo()
    {
        return $this->findAll();
    }

    // Obtener datos de un tipo específico
    public function midupdatetipo($id)
    {
        return $this->find($id);
    }

    // Traer información de un tipo específico
    public function mselectinfotipo($id)
    {
        return $this->where('idRol', $id)->first();
    }

    /*
    // Listar tipo de usuario
    public function usuario_listar_select()
    {
        return $this->distinct()
                    ->select('tipousuario.nombre_tipo as NOMBRE')
                    ->join('usuarios', 'usuarios.anulado = 0')
                    ->orderBy('tipousuario.Nombre', 'ASC')
                    ->findAll();
    }

    public function usuario_listar_select2()
    {
        return $this->distinct()
                    ->select('tipousuario.idRol as IdTecnico, Nombre as NOMBRE')
                    ->join('tecnico', 'tecnico.Activo = 1')
                    ->orderBy('tecnico.Nombre', 'ASC')
                    ->findAll();
    }

    // Listar uno de tipo de usuario
    public function usuario_listar_select_uno($id)
    {
        return $this->distinct()
                    ->select('tipousuario.nombre_tipo as NOMBRE')
                    ->join('usuarios', 'idusuario = ' . $id)
                    ->findAll();
    }

    // Verificar si existe usuario
    public function obtenerusuario($usuario)
    {
        return $this->where('usuarios', $usuario)->first();
    }
    */
}

