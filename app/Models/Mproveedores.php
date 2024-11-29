<?php

namespace App\Models;

use CodeIgniter\Model;

class Mproveedores extends Model
{

    //MOSTRAR proveedores
    public function mselectproveedores(){
        $this->db->where('Anulado =','0');
        $this->db->order_by("IdProveedores", "asc");
        $resultado =$this->db->get('proveedores');

        return $resultado->result();
    }
    //INSERTAR proveedores
    public function minsertproveedores($data){
        return  $this->db->insert('proveedores',$data);
    }

    //OBTENER DATOS
    public function midupdateproveedores($id){
       $this->db->where('IdProveedores', $id);
       $resultado = $this->db->get('proveedores');
       return $resultado->row();
    }

   

    //MODIFICAR proveedores
    public function mupdateproveedores($id, $data){
        $this->db->where('IdProveedores', $id);
        return $this->db->update('proveedores', $data);
     }
     //Traer proveedores
    public function mselectinfoproveedores($id){
        $this->db->where('IdProveedores =',"$id");
        $resultado =$this->db->get('proveedores');
        return $resultado->row();
    }
}
?>
