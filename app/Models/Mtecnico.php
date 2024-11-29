<?php

namespace App\Models;

use CodeIgniter\Model;

class Mtecnico extends Model
{

    //MOSTRAR tecnico
    public function mselecttecnico(){
       $this->db->where('Activo =','1');
        $this->db->order_by("Dni", "asc");
        $resultado =$this->db->get('tecnico');

        return $resultado->result();
    }
    //INSERTAR tecnico
    public function minserttecnico($data){
        return  $this->db->insert('tecnico',$data);
    }

    //OBTENER DATOS
    public function midupdatetecnico($id){
       $this->db->where('Dni', $id);
       $resultado = $this->db->get('tecnico');
       return $resultado->row();
    }

    //MODIFICAR tecnico
    public function mupdatetecnico($id, $data){

        $this->db->where('Dni', $id);
        return $this->db->update('tecnico', $data);
     }
     //Traer tecnico
    public function mselectinfotecnico($id){
        $this->db->where('Dni =',"$id");
        $resultado =$this->db->get('tecnico');
        return $resultado->row();
    }
}
?>
