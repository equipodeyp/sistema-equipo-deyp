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
$id_servidor=$_POST['id_servidor'];
$numero_oficio=$_POST['numero_oficio'];
$tipo_requerimiento=$_POST['tipo_requerimiento'];
$servicio_medico=$_POST['servicio_medico'];
$etapa = "ASISTENCIA MÉDICA COMPLETADA";

$fecha_asistencia = $_POST['fecha_asistencia'];
$hora_asistencia = $_POST['hora_asistencia'];

$informe_medico = $_POST['informe_medico'];
$observaciones = $_POST['observaciones'];

$user=$_POST['user'];
// echo $folio_expediente;
// echo '<br>';
// echo $id_sujeto;
// echo '<br>';
// echo $id_asistencia;
// echo '<br>';
// echo $id_servidor;
// echo '<br>';
// echo $numero_oficio;
// echo '<br>';
// echo $tipo_requerimiento;
// echo '<br>';
// echo $servicio_medico;
// echo '<br>';
// echo $observaciones;
// echo '<br>';
// echo $etapa;
// echo '<br>';

$cant="SELECT COUNT(*) total FROM solicitud_asistencia WHERE solicitud_asistencia.id_sujeto = '$id_sujeto'";
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
$id_asistencia_medica = $id_sujeto.'-'.$año.'-AP0'.$c;
// echo $id_asistencia_medica;

$consecutivosub = 13;
$idactividad = 'SAR-13';
$id_subdireccion = '1';
$id_actividad = '13';
$funcion = 'Asistencia psicológica';
$unidad_medida = 'Asistencia';
$reporte_metas = 'No';
$clasificacion = 'Medida provisional de primera vez';
$fechaactividad = date('Y-m-d');
$cantidad = 1;
$municipio = 'NA';
$evidencia_interna = 'Soporte Documental';
$kilometraje = 'NA';
$informe_anual = 'REPORTADO';
$usuario = $id_servidor;
$year = date('Y');

$query = "INSERT INTO solicitud_asistencia (folio_expediente, id_sujeto, id_asistencia, id_servidor, num_oficio, tipo_requerimiento, servicio_medico, observaciones, etapa, agendar, turnar, notificar)
VALUES ('$folio_expediente', '$id_sujeto', '$id_asistencia_medica', '$id_servidor', '$numero_oficio', '$tipo_requerimiento', '$servicio_medico', '$observaciones', '$etapa', 'NO', 'NO', 'NO')";
$result = $mysqli->query($query);

$query1 = "INSERT INTO agendar_asistencia (id_asistencia, tipo_institucion, nombre_institucion, domicilio_institucion, municipio_institucion, servidor_asistencia, observaciones, servidor_registra)
VALUES ('$id_asistencia_medica', 'PÚBLICA', 'UPSIPPED', 'TOLUCA', 'TOLUCA', 'LIC. PSIC. MARIELA VALDEZ MONRROY', 'NO APLICA', '$id_servidor')";
$result1 = $mysqli->query($query1);

$query2 = "INSERT INTO cita_asistencia(folio_expediente, id_sujeto, id_asistencia, fecha_asistencia, hora_asistencia, servidor_registra)
VALUES ('$folio_expediente', '$id_sujeto', '$id_asistencia_medica', '$fecha_asistencia', '$hora_asistencia', '$id_servidor')";
$result2= $mysqli->query($query2);

$query3 = "INSERT INTO seguimiento_asistencia(id_asistencia, traslado_realizado, se_presento, reprogramar, motivo, nombre_pdi, hospitalizacion, diagnostico, cita_seguimiento, informe_medico, observaciones_seguimiento, servidor_registra)
VALUES ('$id_asistencia_medica', 'NO APLICA', 'NO APLICA', 'NO APLICA', 'NO APLICA', ' NO APLICA', 'NO APLICA', 'NO APLICA', 'NO APLICA', '$informe_medico', '$observaciones', '$id_servidor')";
$result3 = $mysqli->query($query3);

$query_react = "INSERT INTO react_actividad (consecutivosub, idactividad, 
id_subdireccion, id_actividad, funcion, unidad_medida, 
reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, 
folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, 
observaciones, informe_anual, usuario, year) 
VALUES ('$consecutivosub', '$idactividad', 
'$id_subdireccion', '$id_actividad', '$funcion', '$unidad_medida', 
'$reporte_metas', '$clasificacion', '$fechaactividad', '$cantidad', '$municipio', 
'$folio_expediente', '$id_sujeto', '$evidencia_interna', '$numero_oficio', '$kilometraje', 
'$observaciones', '$informe_anual', '$user', '$year')";
$resultado = $mysqli->query($query_react);


    if($result) {
            echo $verifica;
            echo ("<script type='text/javaScript'>
            window.location.href='./registrar_asistencia.php';
            window.alert('!!!!!Registro exitoso¡¡¡¡¡')
        </script>");
            } else {  }
    } else {
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
}
?>
