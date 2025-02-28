<?php

namespace App\Models;

use CodeIgniter\Model;

class Mfactura extends Model
{
    protected $table = 'factura';
    
    protected $allowedFields = [
     'N_factura',
     'fecha_factura', 
     'fecha_pago',
     'estado_pago',
     'id_orden' ];

   // MOSTRAR Factura
   public function mselectfactura()
   {
       return $this->findAll(); // Devuelve todas las filas de la tabla factura
   }

   // INSERTAR Factura
   public function minsertfactura($data)
   {
       return $this->insert($data);
   }

    //Modificar
    public function miupdatefactura($id)
{
    return $this->where('id_orden', $id)->get()->getRow();
}

     //OBTENER DATOS
     public function midupdatefact($id, $orden)
     {
         return $this->where('N_factura', $id)
                     ->where('id_orden', $orden)
                     ->get()
                     ->getRow();
     }
     
 
     //MODIFICAR factura
     public function mupdatefact($N_factura, $id_orden, $data)
     {
         return $this->where('N_factura', $N_factura)
                     ->where('id_orden', $id_orden)
                     ->set($data)
                     ->update();
     }
     

      //busca si para esa orden hay factura
  public function mbuscaordenfactura($id)
    {
        return $this->select('N_factura')
                    ->where('id_orden', $id)
                    ->get()
                    ->getResult();
    }
}
?>
