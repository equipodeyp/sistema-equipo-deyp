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

$nombre_servidor=$_POST['nombre_servidor'];
$id_asistencia = $_POST["id_asistencia"];
$notificar_subdireccion=$_POST['notificar_subdireccion'];
$numero_oficio_notificacion=$_POST['numero_oficio_notificacion'];
$fecha_oficio_notificacion=$_POST['fecha_oficio_notificacion'];
$etapa = "NOTIFICADA";


$folio = "SELECT * FROM solicitud_asistencia WHERE id_asistencia = '$id_asistencia'";
$result_f = mysqli_query($mysqli, $folio);
$r_f = mysqli_fetch_array($result_f);
$id_asist = $r_f['id_asistencia'];
$serv_medico = $r_f['servicio_medico'];
// echo $id_asist;
// echo $serv_medico;



// echo $id_asistencia;
// echo $notificar_subdireccion;
// echo $numero_oficio_notificacion;
// echo $fecha_oficio_notificacion;

$query = "INSERT INTO notificar_asistencia (id_asistencia, notificar_subdireccion, numero_oficio_notificacion, fecha_oficio_notificacion, servidor_registra) 
VALUES ('$id_asistencia', '$notificar_subdireccion', '$numero_oficio_notificacion', '$fecha_oficio_notificacion', '$nombre_servidor')";
$result = $mysqli->query($query);

$query3 = "UPDATE solicitud_asistencia SET notificar = 'SI' WHERE id_asistencia = '$id_asistencia'";
$result3 = $mysqli->query($query3);

if($serv_medico === 'MÉDICO' || $serv_medico === 'SANITARIO'){
    $actualizar_etapa = "UPDATE solicitud_asistencia SET etapa = 'ASISTENCIA MÉDICA COMPLETADA' WHERE id_asistencia = '$id_asistencia'";
    $res_etapa = $mysqli->query($actualizar_etapa);

} else{
    $actualizar_etapa = "UPDATE solicitud_asistencia SET etapa = '$etapa' WHERE id_asistencia = '$id_asistencia'";
    $res_etapa = $mysqli->query($actualizar_etapa);

}


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
