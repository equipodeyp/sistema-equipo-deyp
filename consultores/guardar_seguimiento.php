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



$id_asistencia=$_POST['id_asistencia'];
$traslado = $_POST['traslado'];
$se_presento = $_POST['se_presento'];
$policia_investigacion = $_POST['policia_investigacion'];
$hospitalizacion = $_POST['hospitalizacion'];
$diagnostico = $_POST['diagnostico'];
$cita_seguimiento = $_POST['cita_seguimiento'];
$informe_medico = $_POST['informe_medico'];
$observaciones_seguimiento = $_POST['observaciones_seguimiento'];
$etapa = "ASISTENCIA MÉDICA COMPLETADA";

// echo $id_asistencia;
// echo "<br>";
// echo $traslado;
// echo "<br>";
// echo $se_presento;
// echo "<br>";
// echo $policia_investigacion;
// echo "<br>";
// echo $hospitalizacion;
// echo "<br>";
// echo $diagnostico;
// echo "<br>";
// echo $cita_seguimiento;
// echo "<br>";
// echo $informe_medico;
// echo "<br>";
// echo $observaciones_seguimiento;
// echo "<br>";
// echo $etapa;
// echo "<br>";



$query = "INSERT INTO seguimiento_asistencia (id_asistencia, traslado_realizado, se_presento, nombre_pdi, hospitalizacion, diagnostico, cita_seguimiento, informe_medico, observaciones_seguimiento) 
VALUES ('$id_asistencia', '$traslado', '$se_presento', '$policia_investigacion', '$hospitalizacion', '$diagnostico', '$cita_seguimiento', '$informe_medico', '$observaciones_seguimiento')";
$result = $mysqli->query($query);

$actualizar_etapa = "UPDATE solicitud_asistencia SET etapa = '$etapa' WHERE id_asistencia = '$id_asistencia'";
$res_etapa = $mysqli->query($actualizar_etapa);



if($result) {
    echo $verifica;
    echo ("<script type='text/javaScript'>
    window.location.href='./seguimiento_completado.php?id_asistencia_medica=$id_asistencia';
    window.alert('!!!!!Registro exitoso¡¡¡¡¡')
</script>");
    } else {  }
} else {
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
}
?>