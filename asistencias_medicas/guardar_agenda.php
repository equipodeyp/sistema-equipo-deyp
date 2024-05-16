<?php
// error_reporting(0);
require 'conexion.php';
session_start ();
$verifica = $_SESSION["verifica"];
if ($verifica == 1) {
    unset($_SESSION['verifica']);
    $name = $_SESSION['usuario'];

    $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
    $resultado = $mysqli->query($sentencia);
    $row=$resultado->fetch_assoc();



$id_asistencia=$_POST['id_asistencia'];
$tipo_institucion=$_POST['tipo_institucion'];
$nombre_institucion=$_POST['nombre_institucion'];
$domicilio_institucion=$_POST['domicilio_institucion'];
$municipio_institucion=$_POST['municipio_institucion'];
$fecha_asistencia=$_POST['fecha_asistencia'];
$hora_asistencia=$_POST['hora_asistencia'];
$observaciones_asistencia=$_POST['observaciones_asistencia'];
$etapa = "EN AGENDA";

// $hora_i = '01:00:00';
// $hora_f = '23:00:00';


// $fecha_inicio = $fecha_asistencia.' '.$hora_i;

// $fecha_fin = $fecha_asistencia.' '.$hora_f;


$folio = "SELECT folio_expediente, id_sujeto FROM solicitud_asistencia WHERE id_asistencia = '$id_asistencia'";
$result_f = mysqli_query($mysqli, $folio);
$r_f = mysqli_fetch_array($result_f);
$folio = $r_f['folio_expediente'];
$id_sujeto = $r_f['id_sujeto'];

$tipo_i = "SELECT id, tipo FROM tipo_institucion WHERE id = '$tipo_institucion'";
$result_t = mysqli_query($mysqli, $tipo_i);
$r_t = mysqli_fetch_array($result_t);
$t = $r_t['tipo'];

$nombre_i = "SELECT * FROM instituciones_medicas WHERE id_tipo = '$tipo_institucion' AND id = '$nombre_institucion' ";
$result_n = mysqli_query($mysqli, $nombre_i);
$r_n = mysqli_fetch_array($result_n);
$n = $r_n['nombre'];

$domicilio_i = "SELECT * FROM instituciones_medicas WHERE id_tipo = '$tipo_institucion' AND id = '$domicilio_institucion' ";
$result_d = mysqli_query($mysqli, $domicilio_i);
$r_d = mysqli_fetch_array($result_d);
$d = $r_d['domicilio'];

$municipio_i = "SELECT * FROM instituciones_medicas WHERE id_tipo = '$tipo_institucion' AND id = '$municipio_institucion' ";
$result_m = mysqli_query($mysqli, $municipio_i);
$r_m = mysqli_fetch_array($result_m);
$m = $r_m['municipio'];


// echo $folio;
// echo "<br> ";
// echo $id_sujeto;
// echo "<br> ";
// echo $id_asistencia;
// echo "<br>";
// echo $t;
// echo "<br>";
// echo $n;
// echo "<br>";
// echo $d;
// echo "<br>";
// echo $m;
// echo "<br>";
// echo $fecha_asistencia;
// echo "<br>";
// echo $hora_asistencia;
// echo "<br>";
// echo $observaciones_asistencia;
// echo "<br>";
// echo $etapa;
// echo "<br>";

// echo $fecha_inicio;
// echo '<br>';

// echo $fecha_fin;
// echo '<br>';



$query = "INSERT INTO agendar_asistencia (id_asistencia, tipo_institucion, nombre_institucion, domicilio_institucion, municipio_institucion, observaciones) 
VALUES ('$id_asistencia', '$t', '$n', '$d', '$m', '$observaciones_asistencia')";
$result = $mysqli->query($query);

$query2 = "INSERT INTO cita_asistencia (folio_expediente, id_sujeto, id_asistencia, fecha_asistencia, hora_asistencia) 
VALUES ('$folio', '$id_sujeto', '$id_asistencia', '$fecha_asistencia', '$hora_asistencia')";
$result2 = $mysqli->query($query2);



if($result) {
    echo $verifica;
    echo ("<script type='text/javaScript'>
    window.location.href='./turnar_asistencia.php?id_asistencia_medica=$id_asistencia';
    window.alert('!!!!!Registro exitoso¡¡¡¡¡')
</script>");
    } else {  }
} else {
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
}
?>
