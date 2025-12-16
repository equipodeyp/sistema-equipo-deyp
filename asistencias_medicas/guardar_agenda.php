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

$nombre_servidor=$_POST['nombre_servidor'];
$id_asistencia=$_POST['id_asistencia'];
$tipo_institucion=$_POST['tipo_institucion'];
$nombre_institucion=$_POST['nombre_institucion'];
$domicilio_institucion=$_POST['domicilio_institucion'];
$municipio_institucion=$_POST['municipio_institucion'];
$oficio_gestion=$_POST['oficio_gestion'];
$fecha_asistencia=$_POST['fecha_asistencia'];
$hora_asistencia=$_POST['hora_asistencia'];
$observaciones_asistencia=$_POST['observaciones_asistencia'];

// $etapa = "AGENDADA";

// $hora_i = '01:00:00';
// $hora_f = '23:00:00';


// $fecha_inicio = $fecha_asistencia.' '.$hora_i;

// $fecha_fin = $fecha_asistencia.' '.$hora_f;


$folio_e = "SELECT folio_expediente, id_sujeto FROM solicitud_asistencia WHERE id_asistencia = '$id_asistencia'";
$result_f = mysqli_query($mysqli, $folio_e);
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

$folio_exp = "SELECT * FROM solicitud_asistencia WHERE id_asistencia = '$id_asistencia'";
$result_f = mysqli_query($mysqli, $folio_exp);
$r_f = mysqli_fetch_array($result_f);
$id_asist = $r_f['id_asistencia'];
$serv_medico = $r_f['servicio_medico'];
// echo $id_asist;
// echo '<br>';
// echo $serv_medico;

if ($serv_medico === 'MÉDICO' || $serv_medico === 'SANITARIO' && $oficio_gestion != '' ){


        $query3 = "UPDATE solicitud_asistencia SET agendar = 'SI' WHERE id_asistencia = '$id_asistencia'";
        $result3 = $mysqli->query($query3);

        $query4 = "UPDATE solicitud_asistencia SET turnar = 'SI' WHERE id_asistencia = '$id_asistencia'";
        $result4 = $mysqli->query($query4);

        $query5 = "UPDATE solicitud_asistencia SET notificar = 'SI' WHERE id_asistencia = '$id_asistencia'";
        $result5 = $mysqli->query($query5);

        $query6 = "UPDATE solicitud_asistencia SET etapa = 'ASISTENCIA MÉDICA COMPLETADA' WHERE id_asistencia = '$id_asistencia'";
        $result6 = $mysqli->query($query6);

        $query1 = "INSERT INTO agendar_asistencia (id_asistencia, tipo_institucion, nombre_institucion, domicilio_institucion, municipio_institucion, oficio_gestion, servidor_asistencia, observaciones, servidor_registra)
        VALUES ('$id_asistencia', '$t', '$n', '$d', '$m', '$oficio_gestion', 'NO APLICA', '$observaciones_asistencia', '$nombre_servidor')";
        $result1 = $mysqli->query($query1);

        // $query2 = "INSERT INTO cita_asistencia (folio_expediente, id_sujeto, id_asistencia, fecha_asistencia, hora_asistencia, servidor_registra)
        // VALUES ('$folio', '$id_sujeto', '$id_asistencia', '$fecha_asistencia', '$hora_asistencia', '$nombre_servidor')";
        // $result2 = $mysqli->query($query2);

        // $consulta = "INSERT INTO cita_asistencia(folio_expediente, id_sujeto, id_asistencia, fecha_asistencia, hora_asitencia, servidor_registra)
        // VALUES ('$folio','$id_sujeto','$id_asistencia','$fecha_asistencia','$hora_asistencia','$nombre_servidor')";
        // $resultado_consulta = $mysqli->query($consulta);


        $query7 = "INSERT INTO turnar_asistencia (id_asistencia, turnar_asistencia, oficio, fecha_oficio, servidor_registra) 
        VALUES ('$id_asistencia', 'NO APLICA', 'NO APLICA', 'NO APLICA', '$nombre_servidor')";
        $result7 = $mysqli->query($query7);

        $fecha_oficio_notificacion = '';

        $query8 = "INSERT INTO notificar_asistencia (id_asistencia, notificar_subdireccion, requiere_traslado, numero_oficio_notificacion, fecha_oficio_notificacion, servidor_registra) 
        VALUES ('$id_asistencia', 'NO APLICA', 'NO APLICA', 'NO APLICA', '$fecha_oficio_notificacion', '$nombre_servidor')";
        $result8 = $mysqli->query($query8);

        echo ("<script type='text/javaScript'>
        window.location.href='./agendar_asistencia.php?id_asistencia_medica=$id_asistencia';
        window.alert('!!!!!Registro exitoso¡¡¡¡¡')
        </script>");




} else {        
        
        $query9 = "INSERT INTO agendar_asistencia (id_asistencia, tipo_institucion, nombre_institucion, domicilio_institucion, municipio_institucion, oficio_gestion, servidor_asistencia, observaciones, servidor_registra)
        VALUES ('$id_asistencia', '$t', '$n', '$d', '$m', 'NO APLICA', 'NO APLICA', '$observaciones_asistencia', '$nombre_servidor')";
        $result9 = $mysqli->query($query9);

        $query10 = "INSERT INTO cita_asistencia (folio_expediente, id_sujeto, id_asistencia, fecha_asistencia, hora_asistencia, servidor_registra)
        VALUES ('$folio', '$id_sujeto', '$id_asistencia', '$fecha_asistencia', '$hora_asistencia', '$nombre_servidor')";
        $result10 = $mysqli->query($query10);

        $query11 = "UPDATE solicitud_asistencia SET agendar = 'SI' WHERE id_asistencia = '$id_asistencia'";
        $result11 = $mysqli->query($query11);

        $query12 = "UPDATE solicitud_asistencia SET etapa = 'AGENDADA' WHERE id_asistencia = '$id_asistencia'";
        $result12 = $mysqli->query($query12);

        echo ("<script type='text/javaScript'>
        window.location.href='./agendar_asistencia.php?id_asistencia_medica=$id_asistencia';
        window.alert('!!!!!Registro exitoso¡¡¡¡¡')
        </script>");





        

}





} else {
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
}


?>