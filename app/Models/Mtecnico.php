<?php

namespace App\Models;

use CodeIgniter\Model;

class Mtecnico extends Model
{
    protected $table = 'tecnico'; // Nombre de la tabla
    protected $primaryKey = 'Dni'; // Clave primaria
    protected $allowedFields = ['Dni', 'Nombre', 'Activo']; // Campos permitidos para inserción/actualización
    protected $useTimestamps = false; // Cambiar si usas campos 'created_at' y 'updated_at'

    // Mostrar técnico activo
    public function selectTecnicosActivos()
    {
        return $this->where('Activo', '1')
                    ->orderBy('Dni', 'asc')
                    ->findAll();
    }

    // Insertar técnico
    public function insertTecnico(array $data)
    {
        return $this->insert($data);
    }

    // Obtener datos de un técnico por DNI
    public function getTecnicoById($id)
    {
        return $this->where('Dni', $id)->first();
    }

    // Modificar técnico
    public function updateTecnico($id, array $data)
    {
        return $this->update($id, $data);
    }

    // Obtener información específica de un técnico por DNI
    public function selectInfoTecnico($id)
    {
        return $this->where('Dni', $id)->first();
    }
}

