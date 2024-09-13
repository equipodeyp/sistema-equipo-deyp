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

    $nombre_servidor=$_POST['nombre_servidor'];
    $id_asistencia_medica = $_GET["id_asistencia_medica"];
    
    $fecha_asistencia = $_POST['fecha_asistencia'];
    $hora_asistencia = $_POST['hora_asistencia'];


    $sentencia_am = "SELECT * FROM solicitud_asistencia WHERE id_asistencia='$id_asistencia_medica'";
    $result_am = mysqli_query($mysqli, $sentencia_am);
    $r_am = mysqli_fetch_array($result_am);
    $folio_expediente = $r_am['folio_expediente'];
    $id_sujeto = $r_am['id_sujeto'];

    // echo $nombre_servidor;
    // echo '<br>';
    // echo $id_asistencia_medica;
    // echo '<br>';
    // echo $folio_expediente;
    // echo '<br>';
    // echo $id_sujeto;
    // echo '<br>';
    // echo $fecha_asistencia;
    // echo '<br>';
    // echo $hora_asistencia;
    // echo '<br>';


    $query = "INSERT INTO cita_asistencia (folio_expediente, id_sujeto, id_asistencia, fecha_asistencia, hora_asistencia, servidor_registra) 
    VALUES ('$folio_expediente', '$id_sujeto', '$id_asistencia_medica', '$fecha_asistencia', '$hora_asistencia', '$nombre_servidor')";
    $result = $mysqli->query($query);

    $query3 = "UPDATE solicitud_asistencia SET agendar = 'SI' WHERE id_asistencia = '$id_asistencia_medica'";
    $result3 = $mysqli->query($query3);

    $query2 = "UPDATE solicitud_asistencia SET etapa = 'REPROGRAMADA AGENDADA' WHERE id_asistencia = '$id_asistencia_medica'";
    $result2 = $mysqli->query($query2);
    
    
    
    if($result) {
        echo $verifica;
        echo ("<script type='text/javaScript'>
        window.location.href='./reprogramar_asistencia.php?id_asistencia_medica=$id_asistencia_medica';
        window.alert('!!!!!Registro exitoso¡¡¡¡¡')
    </script>");
        } else {  }


    } 
    
    else {
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
    }
    ?>
    

