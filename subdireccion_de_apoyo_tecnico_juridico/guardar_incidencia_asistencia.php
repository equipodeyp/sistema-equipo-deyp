<?php

error_reporting(0);
require 'conexion.php';
session_start ();
$verifica = $_SESSION["verifica"];
if ($verifica == 1) {
    unset($_SESSION['verifica']);
    $name = $_SESSION['usuario'];

$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$resultado = $mysqli->query($sentencia);
$row=$resultado->fetch_assoc();


  $id_servidor = $_POST['id_servidor'];
  $subdireccion = $_POST['subdireccion'];
  $id_asistencia = $_POST['id_asistencia'];
  $tipo_falla = $_POST['tipo_falla'];
  $descripcion = $_POST['descripcion'];
  $status = $_POST['estatus'];
  $atencion_usuario = $_POST['atencion'];


  // echo $id_servidor;
  // echo '<br>';
  // echo $subdireccion;
  // echo '<br>';
  // echo $id_asistencia;
  // echo '<br>';
  // echo $tipo_falla;
  // echo '<br>';
  // echo $descripcion;
  // echo '<br>';
  // echo $status;
  // echo '<br>';
  // echo $atencion_usuario;
  // echo '<br>';


  $sentencia2=" SELECT* FROM solicitud_asistencia WHERE solicitud_asistencia.id_asistencia = '$id_asistencia'";
  $result2 = $mysqli->query($sentencia2);
  $row2=$result2->fetch_assoc();

  $folio_expediente = $row2['folio_expediente'];
  $id_sujeto = $row2['id_sujeto'];
  
  // echo $folio_expediente;
  // echo '<br>';
  // echo $id_sujeto;
  // echo '<br>';  



  $sentencia3=" SELECT COUNT(*) AS total FROM incidencias_asistencias WHERE incidencias_asistencias.id_servidor = '$id_servidor'";
  $result3 = $mysqli->query($sentencia3);
  $row3=$result3->fetch_assoc();
  $total_1 = $row3['total'];
  $total = $total_1 + 1;

  // echo $total;
  // echo '<br>';

  $folio_incidencia = 'INC0'.$total.'-'.$id_asistencia;

  // echo $folio_incidencia;
  // echo '<br>';





        
  $query = "INSERT INTO incidencias_asistencias (id_servidor, subdireccion, folio_expediente, id_sujeto, id_asistencia, tipo_falla, descripcion_falla, estatus, folio_incidencia, usuario_atencion) 
  VALUES ('$id_servidor', '$subdireccion', '$folio_expediente', '$id_sujeto', '$id_asistencia', '$tipo_falla', '$descripcion', '$status', '$folio_incidencia', '$atencion_usuario')";
  $result = $mysqli->query($query);

  $query2 = "INSERT INTO message_tbl (message, usuario_atencion) 
  VALUES ('$folio_incidencia', '$atencion_usuario')";
  $result2 = $mysqli->query($query2);




    if($result) {
      

        echo $verifica;
        echo ("<script type='text/javaScript'>
                  window.location.href='./incidencias_registradas_asistencia.php';
                  window.alert('!!!!!Registro exitoso¡¡¡¡¡')
                  </script>");
  

    }

}
?>
