<?php

namespace App\Models;

use CodeIgniter\Model;

class Mequipos extends Model
{

    //MOSTRAR orden equipos
    public function mselectequipos(){
        $resultado =	$query = $this->db->query("SELECT r.num_orden , r.fecha ,r.marca, r.modelo,
        r.num_serie, r.sector, r.descripcion, r.accesorios, r.id_cliente, r.anulado, c.Nombre FROM recepcionequipos r
        JOIN cliente c ON r.id_cliente = c.IdCliente  
        where r.anulado=0 
        ORDER BY r.num_orden DESC;");
     return $resultado->result();
    }
    //INSERTAR orden equipos
    public function minsertequipos($data){
        return  $this->db->insert('recepcionequipos',$data);
    }

    //OBTENER DATOS
    public function midupdateequipos($id){
       $this->db->where('num_orden', $id);
       $resultado = $this->db->get('recepcionequipos');
       return $resultado->row();
    }

    
    //MODIFICAR orden equipos
    public function mupdateequipos($id, $data){
        $this->db->where('num_orden', $id);
        return $this->db->update('recepcionequipos', $data);
     }

     //Traer Cliente
    public function mselectinfocliente($id){
        $this->db->where('IdCliente =',"$id");
        $resultado =$this->db->get('cliente');
        return $resultado->row();
    }

    public function cliente_listar_select(){//
        $query=$this->db->query("SELECT DISTINCT cliente.IdCliente  ID ,cliente.Nombre as NOMBRE
                                FROM cliente WHERE cliente.Anulado = 0
                                ORDER BY cliente.Nombre ASC " );
      return $query->result();
      }

      public function cliente_listar_select2(){//
        $query=$this->db->query("SELECT DISTINCT cliente.IdCliente  IdCliente ,cliente.Nombre as NOMBRE
                                FROM cliente WHERE cliente.Anulado = 0
                                ORDER BY cliente.Nombre ASC " );
      return $query->result();
      }

      function obtener($id){//
        $this->db->where("IdCliente",$id);
        $query = $this->db->get('cliente');
        return $query->row();
        $error = $this->db->error();
    }
}
?>