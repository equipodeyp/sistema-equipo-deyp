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

    $id_asistencia_medica = $_GET["id_asistencia_medica"];
    // echo $id_asistencia_medica;


$id_asistencia = $_POST["id_asistencia"];
$notificar_subdireccion=$_POST['notificar_subdireccion'];
$numero_oficio_notificacion=$_POST['numero_oficio_notificacion'];
$fecha_oficio_notificacion=$_POST['fecha_oficio_notificacion'];
$etapa = "AGENDADA, TURNADA Y NOTIFICADA";


// echo $id_asistencia;
// echo $notificar_subdireccion;
// echo $numero_oficio_notificacion;
// echo $fecha_oficio_notificacion;

$query = "INSERT INTO notificar_asistencia (id_asistencia, notificar_subdireccion, numero_oficio_notificacion, fecha_oficio_notificacion) 
VALUES ('$id_asistencia', '$notificar_subdireccion', '$numero_oficio_notificacion', '$fecha_oficio_notificacion')";
$result = $mysqli->query($query);

$actualizar_etapa = "UPDATE solicitud_asistencia SET etapa = '$etapa' WHERE id_asistencia = '$id_asistencia'";
$res_etapa = $mysqli->query($actualizar_etapa);

$query3 = "UPDATE solicitud_asistencia SET NOTIFICAR = 'SI' WHERE id_asistencia = '$id_asistencia'";
$result3 = $mysqli->query($query3);



if($result) {
    echo $verifica;
    echo ("<script type='text/javaScript'>
    window.location.href='./notificar_asistencia.php?id_asistencia_medica=$id_asistencia';
    window.alert('!!!!!Registro exitoso¡¡¡¡¡')
</script>");
    } else {  }
} else {
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
}
?>
