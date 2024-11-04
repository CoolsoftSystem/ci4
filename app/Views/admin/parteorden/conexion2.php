<?php


      $conexion = mysql_connect("localhost", "root", "");

      if(!$conexion){
        echo "No se pudo conectar. " . mysql_error();
        log_message('error', "No se pudo conectar ." . mysql_error());
        exit();
      }
      else{
        log_message('error', "se pudo conectar ." );
      }
      $seleccionar_bd = mysql_select_db("colsoftflorketo");

      if(!$seleccionar_bd){
        echo "No se ha podido seleccionar la base de datos. " . mysql_error();
        log_message('error', "No se pudo conectar a la base ." . mysql_error());
        exit();
      }else{
        log_message('error', "se pudo conectar ." );
      }


 ?>
