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

$folio_expediente=$_POST['folio_expediente'];
$id_sujeto=$_POST['id_sujeto'];
$id_asistencia=$_POST['id_asistencia'];
// $fecha_solicitud=$_POST['fecha_solicitud'];
// $hora_solicitud=$_POST['hora_solicitud'];
$id_servidor=$_POST['id_servidor'];
$numero_oficio=$_POST['numero_oficio'];
$tipo_requerimiento=$_POST['tipo_requerimiento'];
$servicio_medico=$_POST['servicio_medico'];
$observaciones=$_POST['observaciones'];
$etapa = "SOLICITADA";

// echo $folio_expediente;
// echo $id_sujeto;
// echo $id_asistencia;
// echo $id_servidor;
// echo $numero_oficio;
// echo $tipo_requerimiento;
// echo $servicio_medico;
// echo $observaciones;
// echo $etapa;

$query = "INSERT INTO solicitud_asistencia (folio_expediente, id_sujeto, id_asistencia, id_servidor, num_oficio, tipo_requerimiento, servicio_medico, observaciones, etapa) 
VALUES ('$folio_expediente', '$id_sujeto', '$id_asistencia', '$id_servidor', '$numero_oficio', '$tipo_requerimiento', '$servicio_medico', '$observaciones', '$etapa')";
$result = $mysqli->query($query);



    if($result) {
            echo $verifica;
            echo ("<script type='text/javaScript'>
            window.location.href='./solicitudes_registradas.php';
            window.alert('!!!!!Registro exitoso¡¡¡¡¡')
        </script>");
            } else {  }
    } else {
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
}
?>
