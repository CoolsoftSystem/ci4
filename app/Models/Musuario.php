<?php

namespace App\Models;

use CodeIgniter\Model;

class Musuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';
    protected $allowedFields = ['nombre', 'pass', 'email', 'anulado', 'idRol']; // Ajusta esto según los campos que tengas en tu tabla

    // Método de inicio de sesión
    public function logeo($user, $pass)
    {
        return $this->where('nombre', $user)
                    ->where('pass', $pass)
                    ->where('anulado', 0)
                    ->first();
    }

    // Mostrar usuarios
    public function mselectusuario()
    {
        return $this->select('t.nombre_tipo, t.idRol, u.idUsuario, u.nombre, u.email')
                    ->join('tipousuario t', 't.idRol = usuarios.idRol')
                    ->where('usuarios.anulado', 0)
                    ->findAll();
    }

    // Insertar usuario
    public function minsertusuario($data)
    {
        return $this->insert($data);
    }

    // Obtener datos de un usuario
    public function midupdateusuario($id)
    {
        return $this->find($id);
    }

    // Modificar usuario
    public function mupdateusuario($id, $data)
    {
        return $this->update($id, $data);
    }

    // Traer información de un usuario
    public function mselectinfousuario($id)
    {
        return $this->where('idUsuario', $id)->first();
    }

    // Listar tipos de usuario
    public function usuario_listar_select()
    {
        return $this->distinct()
                    ->select('t.idRol AS ID, t.nombre_tipo AS NOMBRE')
                    ->join('tipousuario t', 't.idRol = usuarios.idRol')
                    ->where('t.anulado', 0)
                    ->findAll();
    }

    public function usuario_listar_select2()
    {
        return $this->distinct()
                    ->select('t.idRol, t.nombre_tipo')
                    ->join('tipousuario t', 't.idRol = usuarios.idRol')
                    ->where('t.anulado', 0)
                    ->findAll();
    }

    // Listar un tipo de usuario
    public function usuario_listar_select_uno($id)
    {
        return $this->select('tipousuario.nombre_tipo AS NOMBRE')
                    ->join('tipousuario', 'tipousuario.idRol = usuarios.idRol')
                    ->where('idUsuario', $id)
                    ->distinct()
                    ->findAll();
    }

    // Verificar si existe un usuario
    public function obtenerusuario($usuario)
    {
        return $this->where('nombre', $usuario)->first();
    }

    // Obtener datos de un rol
    public function obtener($id)
    {
        return $this->where('idRol', $id)->first();
    }
}

