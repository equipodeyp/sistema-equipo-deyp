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

$nombre_servidor=$_POST['nombre_servidor'];
// echo $nombre_servidor;
$id_asistencia_medica = $_GET["id_asistencia_medica"];
// echo $id_asistencia_medica;

$id_asistencia = $_POST["id_asistencia"];
$turnar_asistencia=$_POST['turnar_asistencia'];
$numero_oficio=$_POST['numero_oficio'];
$fecha_oficio=$_POST['fecha_oficio'];


// echo $id_asistencia;
// echo $turnar_asistencia;
// echo $numero_oficio;
// echo $fecha_oficio;

$query = "INSERT INTO turnar_asistencia (id_asistencia, turnar_asistencia, oficio, fecha_oficio, servidor_registra) 
VALUES ('$id_asistencia', '$turnar_asistencia', '$numero_oficio', '$fecha_oficio', '$nombre_servidor')";
$result = $mysqli->query($query);


$query3 = "UPDATE solicitud_asistencia SET turnar = 'SI' WHERE id_asistencia = '$id_asistencia'";
$result3 = $mysqli->query($query3);

$query2 = "UPDATE solicitud_asistencia SET etapa = 'REPROGRAMADA TURNADA' WHERE id_asistencia = '$id_asistencia'";
$result2 = $mysqli->query($query2);


if($result) {
    echo $verifica;
    echo ("<script type='text/javaScript'>
    window.location.href='./turnar_asistencia_reprogramada.php?id_asistencia_medica=$id_asistencia';
    window.alert('!!!!!Registro exitoso¡¡¡¡¡')
</script>");
    } else {  }


} else {
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
}
?>