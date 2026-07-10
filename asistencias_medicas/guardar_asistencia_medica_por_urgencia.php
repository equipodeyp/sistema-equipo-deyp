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

$id_servidor=$_POST['id_servidor'];
$user=$_POST['user'];

$folio_expediente=$_POST['folio_expediente'];
$id_sujeto=$_POST['id_sujeto'];

$numero_oficio=$_POST['numero_oficio'];
$tipo_requerimiento=$_POST['tipo_requerimiento'];
$servicio_medico=$_POST['servicio_medico'];
$tipo_institucion=$_POST['tipo_institucion'];
$nombre_institucion=$_POST['nombre_institucion'];


$fecha_asistencia=$_POST['fecha_asistencia'];
$hora_asistencia = $_POST['hora_asistencia'];

$traslado = $_POST['traslado'];
$se_otorgo = $_POST['se_otorgo'];
$diagnostico = $_POST['diagnostico'];
$hospitalizacion = $_POST['hospitalizacion'];
$cita_seguimiento = $_POST['cita_seguimiento'];
$informe_medico = $_POST['informe_medico'];
$observaciones = $_POST['observaciones'];


$etapa = "ASISTENCIA MÉDICA COMPLETADA";


// echo $id_servidor;
// echo '<br>';
// echo $user;
// echo '<br>';

// echo $folio_expediente;
// echo '<br>';
// echo $id_sujeto;
// echo '<br>';
// echo $numero_oficio;
// echo '<br>';
// echo $tipo_requerimiento;
// echo '<br>';
// echo $servicio_medico;
// echo '<br>';
// echo $tipo_institucion;
// echo '<br>';
// echo $nombre_institucion;
// echo '<br>';


$nombre_institucion="SELECT municipio, domicilio
FROM instituciones_medicas
WHERE nombre = '$nombre_institucion'";

$result_nombre = $mysqli->query($nombre_institucion);
$resultado_institucion = $result_nombre->fetch_assoc();
$municipio_institucion = $resultado_institucion["municipio"];
$domicilio_institucion = $resultado_institucion["domicilio"];

// echo $municipio_institucion;
// echo '<br>';
// echo $domicilio_institucion;
// echo '<br>';

// echo $fecha_asistencia;
// echo '<br>';
// echo $hora_asistencia;
// echo '<br>';

// echo $traslado ;
// echo '<br>';
// echo $se_otorgo;
// echo '<br>';
// echo $diagnostico;
// echo '<br>';
// echo $hospitalizacion;
// echo '<br>';
// echo $cita_seguimiento;
// echo '<br>';
// echo $informe_medico;
// echo '<br>';
// echo $observaciones;
// echo '<br>';


// echo $etapa;
// echo '<br>';

$cant="SELECT COUNT(*) total 
FROM solicitud_asistencia 
WHERE solicitud_asistencia.id_sujeto = '$id_sujeto'
AND solicitud_asistencia.servicio_medico !='PSICOLÓGICO'";
$result = $mysqli->query($cant);
$r=$result->fetch_assoc();
// echo $r["total"];
// echo '<br>';

$cadena = $folio_expediente;
$separador = "/";
$folio_separado = explode($separador, $cadena);
$año = $folio_separado[4];

// echo $año;
// echo '<br>';
// echo '<br>';
// echo '<br>';
// echo '<br>';

$c = $r["total"] + 1;
$id_asistencia_medica = $id_sujeto.'-'.$año.'-AM0'.$c;

// echo $id_asistencia_medica;
// echo '<br>';


// $query_agendar = "INSERT INTO agendar_asistencia (id_asistencia, tipo_institucion, nombre_institucion, domicilio_institucion, municipio_institucion, oficio_gestion, servidor_asistencia, observaciones, servidor_registra)
// VALUES ('$id_asistencia_medica', '$tipo_institucion', '$nombre_institucion', '$domicilio_institucion', '$municipio_institucion', 'NO APLICA', 'NO APLICA', 'NO APLICA', '$id_servidor')";
// $result1 = $mysqli->query($query_agendar);

// $query_solicitud = "INSERT INTO solicitud_asistencia (folio_expediente, id_sujeto, id_asistencia, id_servidor, num_oficio, tipo_requerimiento, servicio_medico, observaciones, etapa, agendar, turnar, notificar)
// VALUES ('$folio_expediente', '$id_sujeto', '$id_asistencia_medica', '$id_servidor', '$numero_oficio', '$tipo_requerimiento', '$servicio_medico', '$observaciones', '$etapa', 'NO', 'NO', 'NO')";
// $result = $mysqli->query($query_solicitud);

// $query_cita = "INSERT INTO cita_asistencia(folio_expediente, id_sujeto, id_asistencia, fecha_asistencia, hora_asistencia, servidor_registra)
// VALUES ('$folio_expediente', '$id_sujeto', '$id_asistencia_medica', '$fecha_asistencia', '$hora_asistencia', '$id_servidor')";
// $result2= $mysqli->query($query_cita);

// $query_seguimiento = "INSERT INTO seguimiento_asistencia(id_asistencia, traslado_realizado, se_otorgo, reprogramar, motivo, nombre_pdi, hospitalizacion, diagnostico, cita_seguimiento, informe_medico, observaciones_seguimiento, servidor_registra)
// VALUES ('$id_asistencia_medica', 'SI', 'NO APLICA', 'NO APLICA', 'NO APLICA', ' NO APLICA', '$hospitalizacion', '$diagnostico', '$cita_seguimiento', '$informe_medico', '$observaciones', '$id_servidor')";
// $result3 = $mysqli->query($query_seguimiento);

$query_agendar = "INSERT INTO agendar_asistencia (id_asistencia, tipo_institucion, nombre_institucion, domicilio_institucion, municipio_institucion; oficio_gestion, servidor_asistencia, observaciones, servidor_registra)
VALUES ('$id_asistencia_medica', '$tipo_institucion', '$nombre_institucion', '$domicilio_institucion', '$municipio_institucion', 'NO APLICA', 'NO APLICA', 'NO APLICA', '$id_servidor')";



    if($result) {
            echo $verifica;
            echo ("<script type='text/javaScript'>
            window.location.href='./asistencias_medicas_registradas_por_urgencia.php';
            window.alert('!!!!!Registro exitoso¡¡¡¡¡')
        </script>");
            } else {  }
    } else {
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}
?>
