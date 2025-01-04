<?php

namespace App\Models;

use CodeIgniter\Model;

class Mproveedores extends Model
{
    protected $table = 'proveedores'; // Tabla asociada
    protected $primaryKey = 'IdProveedores'; // Llave primaria
    protected $allowedFields = ['Nombre', 'Direccion', 'Telefono', 'Anulado']; // Campos permitidos para insertar/actualizar

    /**
     * Obtener todos los proveedores activos.
     *
     * @return array
     */
    public function selectProveedoresActivos()
    {
        return $this->where('Anulado', '0')
                    ->orderBy('IdProveedores', 'asc')
                    ->findAll();
    }

    /**
     * Insertar un nuevo proveedor.
     *
     * @param array $data
     * @return bool
     */
    public function insertProveedor(array $data)
    {
        return $this->insert($data);
    }

    /**
     * Obtener información de un proveedor por ID.
     *
     * @param int $id
     * @return array|null
     */
    public function getProveedorById($id)
    {
        return $this->find($id);
    }

    /**
     * Actualizar la información de un proveedor por ID.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateProveedor($id, array $data)
    {
        return $this->update($id, $data);
    }

    /**
     * Traer información detallada de un proveedor por ID.
     *
     * @param int $id
     * @return array|null
     */
    public function selectInfoProveedor($id)
    {
        return $this->find($id);
    }
}
