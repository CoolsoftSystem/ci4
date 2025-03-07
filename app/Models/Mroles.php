<?php

namespace App\Models;

use CodeIgniter\Model;

class Mroles extends Model
{
    protected $table = 'tipousuario';
    protected $primaryKey = 'idRol';
    protected $allowedFields = ['nombre_tipo', 'cliente', 'tecnico', 'ordenes', 'usuarios', 'roles', 'estados_trabajo'];

    // Mostrar roles sin usuarios anulados
    public function mselectrolessolo()
    {
        return $this->where('anulado', 0)
                    ->findAll();
    }

    // Seleccionar roles junto con usuarios
    public function mselectroles()
    {
        return $this->select('nombre_tipo, idRol, u.idUsuario, u.nombre, u.email')
                    ->join('usuarios u', 't.idRol = u.idRol')
                    ->where('u.anulado', 0)
                    ->findAll();
    }

    // Obtener todos los roles
    public function mtroles()
    {
        return $this->select('nombre_tipo')->findAll();
    }

    // Insertar nuevo rol
    public function minsertroles($data)
    {
        return $this->insert($data);
    }

    // Obtener datos de un rol específico
    public function midupdateroles($id)
    {
        return $this->find($id);
    }

    // Modificar rol
    public function mupdateroles($id, $data)
    {
        return $this->update($id, $data);
    }

    // Traer información de un rol
    public function mselectinforoles($id)
    {
        return $this->find($id);
    }

    // Listar tipo de usuario
    public function roles_listar_select()
    {
        return $this->distinct()
                    ->select('tipousuario.nombre_tipo as NOMBRE')
                    ->join('usuarios', 'usuarios.anulado = 0')
                    ->findAll();
    }

    public function roles_listar_select2()
    {
        return $this->distinct()
                    ->select('u.idUsuario, tipousuario.nombre_tipo')
                    ->join('usuarios u', 'tipousuario.idRol = u.idRol')
                    ->where('u.anulado', 0)
                    ->findAll();
    }

    // Listar uno de tipo de usuario
    public function roles_listar_select_uno($id)
    {
        return $this->distinct()
                    ->select('tipousuario.nombre_tipo as NOMBRE')
                    ->join('usuarios', 'idusuario = ' . $id)
                    ->findAll();
    }

    // Verificar si existe un rol
    public function obtenerrol($rol)
    {
        return $this->where('nombre_tipo', $rol)
            ->where('anulado', 0)
            ->first();
    }

    public function obtenerroles($roles)
    {
        return $this->where('tipousuario', $roles)->first();
    }

    public function obtener($id)
    {
        return $this->find($id);
    }
}
