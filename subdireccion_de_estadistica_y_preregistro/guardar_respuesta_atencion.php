<?php
error_reporting(0);
require 'conexion.php';





  $folio_incidencia = $_POST['folio_incidencia'];
  $fecha_hora_atencion = $_POST['fecha_hora_atencion'];
  $estatus = $_POST['estatus'];
  $respuesta = $_POST['respuesta'];


  echo $folio_incidencia;
  echo '<br>';
  echo $fecha_hora_atencion;
  echo '<br>';
  echo $estatus;
  echo '<br>';
  echo $respuesta;
  




  $query = "UPDATE incidencias set fecha_hora_atencion = '$fecha_hora_atencion', estatus = '$estatus', respuesta = '$respuesta' WHERE folio_incidencia='$folio_incidencia'";
  mysqli_query($mysqli, $query);

    if($query) {
      

        echo $verifica;
        echo ("<script type='text/javaScript'>
                  window.location.href='./atender_incidencia.php';
                  window.alert('!!!!!Registro exitoso¡¡¡¡¡')
                  </script>");
  

    }

?> 