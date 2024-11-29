<?php

namespace App\Models;

use CodeIgniter\Model;



class Morden extends Model
{

    //MOSTRAR orden actvas
    public function mselectorden(){

        $resultado =	$query = $this->db->query("SELECT o.IdOrden , c.Nombre ,o.IdCliente, o.FechaRecepcion ,
           o.TareaDesarrollar, o.Precio, o.Completada, o.Eliminada, f.N_factura, f.fecha_factura, f.fecha_pago, f.estado_pago FROM orden o
           INNER JOIN cliente c ON o.IdCliente = c.IdCliente  
           LEFT JOIN factura f ON f.id_orden = o.IdOrden
           where o.Eliminada=0 and o.Completada=0 
           ORDER BY o.IdOrden DESC;");
        return $resultado->getResult();

    }

    public function mselectestadostrabajo(){

      $resultado =	$query = $this->db->query("SELECT o.IdOrden , c.Nombre ,o.IdCliente, o.FechaRecepcion ,
         o.TareaDesarrollar, o.Precio, o.Completada, o.Eliminada, f.N_factura, f.fecha_factura, f.fecha_pago, f.estado_pago FROM orden o
         INNER JOIN cliente c ON o.IdCliente = c.IdCliente  
         LEFT JOIN factura f ON f.id_orden = o.IdOrden
         where o.Eliminada=0 ORDER BY o.IdOrden DESC;");
      return $resultado->result();

  }

    public function mselectordenfecha($ini,$fin){
     

      $ini = date("Y-m-d", strtotime($ini));
      $fin = date("Y-m-d", strtotime($fin));
     
      $resultado =	$query = $this->db->query("SELECT o.IdOrden , c.Nombre ,o.IdCliente, o.FechaRecepcion ,
         o.TareaDesarrollar, o.Precio, o.Completada, o.Eliminada FROM orden o
         INNER JOIN cliente c ON o.IdCliente = c.IdCliente 
         where o.Eliminada=0 and o.Completada=0 and o.FechaRecepcion >= '$ini' and o.FechaRecepcion <= '$fin' 
         ORDER BY o.IdOrden DESC;");
    
      return $resultado->result();
      

  }

    public function consultaTareas($id){
        $this->db->where('IdOrden', $id);
        $resultado=$this->db->get('parteorden');
        return  $resultado->result();
     }

     //CONSULTA LOS GASTOS DE TODOS OS MATERIALES DE UNA TAREA
     public function consultaGatosTotales($id){
       $resultado =$query = $this->db->query("SELECT SUM(Precio)as Gastos FROM material where IdParte=$id");
        //log_message('error',sprintf("id orden $ $resultado"));
        $resultado=$resultado->row();
       $gastos=$resultado->Gastos;

       $x=intval($gastos);
       //var_dump($gastos->Gastos);
       //log_message('error',sprintf("gastosssss $x "));
         return  $gastos;
      }


      public function consultaGatosOrden($id){
        $resultado =$query = $this->db->query("SELECT ifnull(SUM(Precio),0) as Gastos FROM material where IdOrden=$id");
         //log_message('error',sprintf("id orden $ $resultado"));
         $resultado=$resultado->getRow();
        $gastos=$resultado->Gastos;

        $x=intval($gastos);
        //var_dump($gastos->Gastos);
        //log_message('error',sprintf("gastos de orden $x "));
          return  $gastos;
       }
    //MOSTRAR orden completas
    public function mselectordencompletas(){

        $resultado =$query = $this->db->query("SELECT o.IdOrden , c.Nombre ,o.IdCliente, o.FechaRecepcion ,
           o.TareaDesarrollar, o.Precio, o.Completada, o.Eliminada FROM orden o
           INNER JOIN cliente c ON o.IdCliente = c.IdCliente where o.Eliminada=0 and o.Completada=1  ORDER BY o.IdOrden ASC ");
        return $resultado->getResult();
    }
    //INSERTAR orden
    public function minsertorden($data){
        return  $this->db->insert('orden',$data);
    }

    //OBTENER DATOS con idOrden
    public function midupdateorden($id){
       $this->db->where('IdOrden', $id);
       $resultado = $this->db->get('orden');
       return $resultado->row();
    }

    //OBTENER DATOS con idOrden
    public function midupdateordenyfacturas($id){
      $query=$this->db->query("SELECT o.IdOrden ,o.observaciones ,o.IdCliente, o.FechaRecepcion , o.TareaDesarrollar, 
      o.Precio, o.Completada, o.Eliminada, f.N_factura, f.fecha_factura, f.fecha_pago, f.estado_pago 
      FROM orden o LEFT JOIN factura f ON f.id_orden = o.IdOrden where o.IdOrden=$id;" );
      return $query->row();
   }

  
    //MODIFICAR orden
    public function mupdateorden($id, $data){
        $this->db->where('IdOrden', $id);
        return $this->db->update('orden', $data);
     }
     //Traer orden
    public function mselectinfoorden($id){
        $this->db->where('IdOrden =',"$id");
        $resultado =$this->db->get('orden');
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
    function consultarEstado($id){//
      $query=$this->db->query("SELECT * FROM parteorden WHERE IdOrden=$id and 
      IdParte  = (SELECT MAX(IdParte) FROM parteorden WHERE IdOrden=$id and anulado=0)" ) ;
    return $query->getRow();
  	}

     function consultarPrimerTarea($id){//
      $query=$this->db->query("SELECT * FROM parteorden WHERE IdOrden=$id and 
      IdParte  = (SELECT MIN(IdParte) FROM parteorden WHERE IdOrden=$id)" ) ;
    return $query->row();
  	}
}
?>
