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

$etapa = "AGENDADA";

$id_asistencia=$_POST['id_asistencia'];
$nombre_servidor=$_POST['nombre_servidor'];
$nombre_servidor_asistencia=$_POST['nombre_servidor_asistencia'];
$servicio_medico=$_POST['servicio_medico'];

$tipo_institucion=$_POST['tipo_institucion'];
$nombre_institucion=$_POST['nombre_institucion'];
$domicilio_institucion=$_POST['domicilio_institucion'];

$municipio_institucion=$_POST['municipio_institucion'];
$fecha_asistencia=$_POST['fecha_asistencia'];
$hora_asistencia=$_POST['hora_asistencia'];
$observaciones_asistencia=$_POST['observaciones_asistencia'];


$folio = "SELECT folio_expediente, id_sujeto FROM solicitud_asistencia WHERE id_asistencia = '$id_asistencia'";
$result_f = mysqli_query($mysqli, $folio);
$r_f = mysqli_fetch_array($result_f);
$folio = $r_f['folio_expediente'];
$id_sujeto = $r_f['id_sujeto'];

// echo $id_asistencia;
// echo "<br>";
// echo $nombre_servidor;
// echo "<br>";
// echo $nombre_servidor_asistencia;
// echo "<br>";
// echo $servicio_medico;
// echo "<br>";
// echo $tipo_institucion;
// echo "<br>";
// echo $nombre_institucion;
// echo "<br>";
// echo $domicilio_institucion;
// echo "<br>";
// echo $municipio_institucion;
// echo "<br>";
// echo $fecha_asistencia;
// echo "<br>";
// echo $hora_asistencia;
// echo "<br>";
// echo $observaciones_asistencia;
// echo "<br>";
// echo $etapa;
// echo "<br>";
// echo $folio;
// echo "<br> ";
// echo $id_sujeto;





// $folio = "SELECT folio_expediente, id_sujeto FROM solicitud_asistencia WHERE id_asistencia = '$id_asistencia'";
// $result_f = mysqli_query($mysqli, $folio);
// $r_f = mysqli_fetch_array($result_f);
// $folio = $r_f['folio_expediente'];
// $id_sujeto = $r_f['id_sujeto'];

// $tipo_i = "SELECT id, tipo FROM tipo_institucion WHERE id = '$tipo_institucion'";
// $result_t = mysqli_query($mysqli, $tipo_i);
// $r_t = mysqli_fetch_array($result_t);
// $t = $r_t['tipo'];

// $nombre_i = "SELECT * FROM instituciones_medicas WHERE id_tipo = '$tipo_institucion' AND id = '$nombre_institucion' ";
// $result_n = mysqli_query($mysqli, $nombre_i);
// $r_n = mysqli_fetch_array($result_n);
// $n = $r_n['nombre'];

// $domicilio_i = "SELECT * FROM instituciones_medicas WHERE id_tipo = '$tipo_institucion' AND id = '$domicilio_institucion' ";
// $result_d = mysqli_query($mysqli, $domicilio_i);
// $r_d = mysqli_fetch_array($result_d);
// $d = $r_d['domicilio'];

// $municipio_i = "SELECT * FROM instituciones_medicas WHERE id_tipo = '$tipo_institucion' AND id = '$municipio_institucion' ";
// $result_m = mysqli_query($mysqli, $municipio_i);
// $r_m = mysqli_fetch_array($result_m);
// $m = $r_m['municipio'];

// echo "<br>";
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




$query = "INSERT INTO agendar_asistencia (id_asistencia, tipo_institucion, nombre_institucion, domicilio_institucion, municipio_institucion, servidor_asistencia, observaciones, servidor_registra)
VALUES ('$id_asistencia', '$tipo_institucion', '$nombre_institucion', '$domicilio_institucion', '$municipio_institucion', '$nombre_servidor_asistencia', '$observaciones_asistencia', '$nombre_servidor')";
$result = $mysqli->query($query);

$query2 = "INSERT INTO cita_asistencia (folio_expediente, id_sujeto, id_asistencia, fecha_asistencia, hora_asistencia, servidor_registra)
VALUES ('$folio', '$id_sujeto', '$id_asistencia', '$fecha_asistencia', '$hora_asistencia', '$nombre_servidor')";
$result2 = $mysqli->query($query2);

$query3 = "UPDATE solicitud_asistencia SET agendar = 'SI' WHERE id_asistencia = '$id_asistencia'";
$result3 = $mysqli->query($query3);

$query4 = "UPDATE solicitud_asistencia SET etapa = 'AGENDADA' WHERE id_asistencia = '$id_asistencia'";
$result4 = $mysqli->query($query4);


if($result) {
    echo $verifica;
    echo ("<script type='text/javaScript'>
    window.location.href='./agendar_asistencia.php?id_asistencia_medica=$id_asistencia';
    window.alert('!!!!!Registro exitoso¡¡¡¡¡')
</script>");
    } else {  }


} else {
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
}
?>
