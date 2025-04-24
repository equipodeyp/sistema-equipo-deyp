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

$id_servidor=$_POST['id_servidor'];
$id_asistencia_medica=$_POST['id_asistencia'];
$surtido = $_POST['surtido'];
$entregado = $_POST['entregado'];
$adquisicion = $_POST['adquisicion'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$presentacion = $_POST['presentacion'];
$contenido = $_POST['contenido'];
// $oficio = $_POST['oficio'];
// $nombre_recibe = $_POST['nombre_recibe'];
$indicaciones = $_POST['indicaciones'];

// echo $id_asistencia_medica;
// echo "<br>";
// echo $surtido;
// echo "<br>";
// echo $entregado;
// echo "<br>";
// echo $adquisicion;
// echo "<br>";
// echo $nombre;
// echo "<br>";
// echo $cantidad;
// echo "<br>";
// echo $contenido;
// echo "<br>";
// echo $oficio;
// echo "<br>";
// echo $nombre_recibe;
// echo "<br>";
// echo $indicaciones;
// echo "<br>";

// $query = "INSERT INTO tratamiento_medico (id_asistencia, surtido, entregado, adquisicion, nombre_medicamento, cantidad, presentacion, contenido, indicaciones, numero_oficio, nombre_recibe, servidor_registra) 
// VALUES ('$id_asistencia_medica', '$surtido', '$entregado', '$adquisicion', '$nombre', '$cantidad', '$presentacion', '$contenido', '$indicaciones', '$oficio', '$nombre_recibe', '$id_servidor')";
// $result = $mysqli->query($query);

$query = "INSERT INTO tratamiento_medico (id_asistencia, surtido, entregado, adquisicion, nombre_medicamento, cantidad, presentacion, contenido, indicaciones, servidor_registra) 
VALUES ('$id_asistencia_medica', '$surtido', '$entregado', '$adquisicion', '$nombre', '$cantidad', '$presentacion', '$contenido', '$indicaciones', '$id_servidor')";
$result = $mysqli->query($query);


if($result) {
    echo $verifica;
    echo ("<script type='text/javaScript'>
    window.location.href='./seguimiento_completado.php?id_asistencia_medica=$id_asistencia_medica';
    window.alert('!!!!!Registro exitoso¡¡¡¡¡')
</script>");
    } else {  }
} else {
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";


}

?>




