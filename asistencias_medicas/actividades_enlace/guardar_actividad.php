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

// $id_asistencia_medica = $_GET["actividad"];
// echo $id_asistencia_medica;


$id_actividad = $_POST["actividad"];
echo $id_actividad;



$folio = "SELECT * FROM  react_actividad_enlace WHERE nombre = '$id_actividad'";
$result_f = mysqli_query($mysqli, $folio);
$r_f = mysqli_fetch_array($result_f);
$nombre_actividad = $r_f['nombre'];
echo $nombre_actividad;









// if($result) {
//     echo $verifica;
//     echo ("<script type='text/javaScript'>
//     window.location.href='./registro_actividad_completada.php?id=$id_asistencia';
//     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
// </script>");
//     } else {  }


} 
// else {
// echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
// }
?>
