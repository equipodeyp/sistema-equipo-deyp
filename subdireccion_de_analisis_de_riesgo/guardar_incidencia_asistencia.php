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
  $folio_expediente = $_POST['folio_expediente'];
  $id_sujeto = $_POST['id_sujeto'];
  $id_asistencia = $_POST['id_asistencia'];
  $tipo_falla = $_POST['tipo_falla'];
  $descripcion = $_POST['descripcion'];

  $folio_incidencia = $_POST['folio_incidencia'];
  $status = $_POST['estatus'];
  $atencion_usuario = $_POST['atencion'];

//   echo $id_servidor;
//   echo '<br>';
//   echo $subdireccion;
//   echo '<br>';
//   echo $folio_expediente;
//   echo '<br>';
//   echo $id_sujeto;
//   echo '<br>';
//   echo $id_asistencia;
//   echo '<br>';
//   echo $tipo_falla;
//   echo '<br>';
//   echo $descripcion;
//   echo '<br>';
//   echo $folio_incidencia;
//   echo '<br>';
//   echo $status;
//   echo '<br>';
//   echo $atencion_usuario;
//   echo '<br>';





        
  $query = "INSERT INTO incidencias_asistencias (id_servidor, subdireccion, folio_expediente, id_sujeto, id_asistencia, tipo_falla, descripcion_falla, estatus, folio_incidencia, usuario_atencion) 
  VALUES ('$id_servidor', '$subdireccion', '$folio_expediente', '$id_sujeto', '$id_asistencia', '$tipo_falla', '$descripcion', '$status', '$folio_incidencia', '$atencion_usuario')";
  $result = $mysqli->query($query);




    if($result) {
      

        echo $verifica;
        echo ("<script type='text/javaScript'>
                  window.location.href='./incidencias_registradas_asistencia.php';
                  window.alert('!!!!!Registro exitoso¡¡¡¡¡')
                  </script>");
  

    }

}
?>