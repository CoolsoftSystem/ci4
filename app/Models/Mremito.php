<?php

namespace App\Models;

use CodeIgniter\Model;

class Mremito extends Model
{

    //MOSTRAR remito activas

  public function mselectremito(){

    $resultado =	$query = $this->db->query("SELECT o.IdRemito , c.Nombre , o.observaciones ,o.IdCliente, o.fecha 
       FROM remitos o
       INNER JOIN cliente c ON o.IdCliente = c.IdCliente 
       where o.Anulado=0 
       ORDER BY o.IdRemito DESC;");
    return $resultado->result();

}

 

    public function mselectremitofecha($ini,$fin){
     

      $ini = date("Y-m-d", strtotime($ini));
      $fin = date("Y-m-d", strtotime($fin));
     
      $resultado =	$query = $this->db->query("SELECT o.IdRemito , c.Nombre ,o.observaciones ,o.IdCliente, o.FechaRecepcion ,
         o.TareaDesarrollar, o.Completada, o.Eliminada FROM remito o
         INNER JOIN cliente c ON o.IdCliente = c.IdCliente 
         where o.Eliminada=0 and o.Completada=0 and o.FechaRecepcion >= '$ini' and o.FechaRecepcion <= '$fin' 
         ORDER BY o.IdRemito DESC;");
    
      return $resultado->result();
      

  }

    public function consultaTareas($id){
        $this->db->where('IdRemito', $id);
        $resultado=$this->db->get('remitos');
        return  $resultado->result();
     }
/*
     //CALCULA TOTAL ACUMULADO A COBRAR EN REMITO
     public function consultaTotalRemito($id){
       $resultado =$query = $this->db->query("SELECT SUM(precio)as totalPrecio FROM producto where IdRemito=$id");
      
        $resultado=$resultado->row();
       $totalPrecio=$resultado->totalPrecio;

       $x=intval($totalPrecio);
     
         return  $totalPrecio;
      }*/


     
    //MOSTRAR remito completas
   
    //INSERTAR remito
    public function minsertremito($data){
        return  $this->db->insert('remitos',$data);
    }

    //OBTENER DATOS con IdRemito
    public function midupdateremito($id){
       $this->db->where('IdRemito', $id);
       $resultado = $this->db->get('remitos');
       return $resultado->row();
    }
     //OBTENER DATOS con IdRemito
     public function midupdateremito2($id){
      $this->db->where('IdRemito', $id);
      $resultado = $this->db->get('remitos');
      return $resultado->result();
   }

    
  
    //MODIFICAR remito
    public function mupdateremito($id, $data){
        $this->db->where('IdRemito', $id);
        return $this->db->update('remitos', $data);
     }
     //Traer remito
    public function mselectinforemito($id){
        $this->db->where('IdRemito =',"$id");
        $resultado =$this->db->get('remitos');
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
   
    //Trear PRUDCTOS DE REMITOS
    public function obtenerProducto($IdRemito){
      $this->db->where('IdRemito =',"$IdRemito");
      $resultado =$this->db->get('producto');
      return $resultado->result();
  }

  public function cargarProd($data){

    $IdRemito=$data['IdRemito'];
    $cantidad=$data['cantidad'];
    $producto=$data['producto'];
   
    $this->db->where('IdRemito =',"$IdRemito");
    $this->db->insert('producto',$data);
    $resultado=$this->db->insert_id();

    return $linka= $data;
}

//Trear Producto con IdProducto
public function obtenerProdconIdProd($IdProducto){

  $this->db->where('IdProducto =',"$IdProducto");
  $resultado =$this->db->get('producto');
  return $resultado->row();
}

//Eliminar Producto
public function mdeleteproducto($IdProducto){

  $this->db->where('IdProducto =',"$IdProducto");
  $resultado =$this->db->delete('producto');

}

//OBTENER DATOS Producto
public function midupdateproducto($id){
  $this->db->where('IdProducto', $id);
  $resultado = $this->db->get('producto');
  return $resultado->row();
}

//MODIFICAR producto
public function mupdateproducto($id, $data){
  $this->db->where('IdProducto', $id);
  return $this->db->update('producto', $data);
}
    

}


?>
