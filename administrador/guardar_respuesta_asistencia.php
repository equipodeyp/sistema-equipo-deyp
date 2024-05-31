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



$folio_incidencia = $_GET["folio_incidencia"];
// echo $folio_incidencia;
// echo '<br>';

  $fecha_hora_atencion = $_POST['fecha_hora_atencion']; 
  $estatus = $_POST['estatus'];
  $respuesta = $_POST['respuesta'];



  $query = "UPDATE incidencias_asistencias set fecha_hora_atencion = '$fecha_hora_atencion', estatus = '$estatus', respuesta = '$respuesta' WHERE folio_incidencia='$folio_incidencia'";
  mysqli_query($mysqli, $query);

    if($query) {
      

        echo $verifica;
        echo ("<script type='text/javaScript'>
                  window.location.href='./incidencia_asistencia_enproceso.php';
                  window.alert('!!!!!Registro exitoso¡¡¡¡¡')
                  </script>");
  

    }

}
?>
