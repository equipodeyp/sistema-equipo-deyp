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
$id_asistencia = $_POST['id_asistencia'];
$traslado = $_POST['traslado'];
$se_otorgo = $_POST['se_otorgo'];
$reprogramar = $_POST['reprogramar'];
$motivo = $_POST['motivo'];
$hospitalizacion = $_POST['hospitalizacion'];
$diagnostico = $_POST['diagnostico'];
$cita_seguimiento = $_POST['cita_seguimiento'];
$informe_medico = $_POST['informe_medico'];
$observaciones_seguimiento = $_POST['observaciones_seguimiento'];


// echo $id_asistencia;
// echo "<br>";
// echo $traslado;
// echo "<br>";
// echo $se_otorgo;
// echo "<br>";
// echo $reprogramar;
// echo "<br>";
// echo $motivo;
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
// echo "<br>";


    if($traslado == 'SI' &&  $se_otorgo == 'SI'){

    $etapa = "ASISTENCIA MÉDICA COMPLETADA";
    // echo $etapa;

    $query = "INSERT INTO seguimiento_asistencia (id_asistencia, traslado_realizado, se_otorgo, hospitalizacion, diagnostico, cita_seguimiento, informe_medico, observaciones_seguimiento, servidor_registra) 
    VALUES ('$id_asistencia', '$traslado', '$se_otorgo', '$hospitalizacion', '$diagnostico', '$cita_seguimiento', '$informe_medico', '$observaciones_seguimiento', '$nombre_servidor')";
    $result = $mysqli->query($query);

    $actualizar_etapa = "UPDATE solicitud_asistencia SET etapa = '$etapa' WHERE id_asistencia = '$id_asistencia'";
    $res_etapa = $mysqli->query($actualizar_etapa);
    

        if($result) {
            echo $verifica;
            echo ("<script type='text/javaScript'>
            window.location.href='./seguimiento_completado.php?id_asistencia_medica=$id_asistencia';
            window.alert('!!!!!Registro exitoso¡¡¡¡¡')
        </script>");
            } else { }




    } 


    else if($traslado == 'SI' &&  $se_otorgo == 'NO'){


    $etapa = "ASISTENCIA MÉDICA COMPLETADA";
    // echo $etapa;

    $query = "INSERT INTO seguimiento_asistencia (id_asistencia, traslado_realizado, se_otorgo, motivo, observaciones_seguimiento, servidor_registra) 
    VALUES ('$id_asistencia', '$traslado', '$se_otorgo', '$motivo', '$observaciones_seguimiento', '$nombre_servidor')";
    $result = $mysqli->query($query);

    $actualizar_etapa = "UPDATE solicitud_asistencia SET etapa = '$etapa' WHERE id_asistencia = '$id_asistencia'";
    $res_etapa = $mysqli->query($actualizar_etapa);
    

        if($result) {
            echo $verifica;
            echo ("<script type='text/javaScript'>
            window.location.href='./asistencia_turnada.php';
            window.alert('!!!!!Registro exitoso¡¡¡¡¡')
        </script>");
            } else { }




    } 





    else if ($traslado == 'NO' && $reprogramar == 'SI'){


        $etapa = "ASISTENCIA MÉDICA REPROGRAMADA";
        // echo $etapa;

        $query = "INSERT INTO seguimiento_asistencia (id_asistencia, traslado_realizado, reprogramar, motivo, observaciones_seguimiento, servidor_registra) 
        VALUES ('$id_asistencia', '$traslado', '$reprogramar', '$motivo', '$observaciones_seguimiento', '$nombre_servidor')";
        $result = $mysqli->query($query);
    
        $actualizar_etapa = "UPDATE solicitud_asistencia SET etapa = '$etapa' WHERE id_asistencia = '$id_asistencia'";
        $res_etapa = $mysqli->query($actualizar_etapa);

        $actualizar_agendar = "UPDATE solicitud_asistencia SET agendar = 'NO' WHERE id_asistencia = '$id_asistencia'";
        $res_agendar = $mysqli->query($actualizar_agendar);
    
        $actualizar_turnar = "UPDATE solicitud_asistencia SET turnar = 'NO' WHERE id_asistencia = '$id_asistencia'";
        $res_turnar = $mysqli->query($actualizar_turnar);
    
        $actualizar_notificar = "UPDATE solicitud_asistencia SET notificar = 'NO' WHERE id_asistencia = '$id_asistencia'";
        $res_notificar = $mysqli->query($actualizar_notificar);
    
            if($result) {
                echo $verifica;
                echo ("<script type='text/javaScript'>
                window.location.href='./asistencia_turnada.php';
                window.alert('!!!!!Registro exitoso¡¡¡¡¡')
            </script>");
                } else {  }


    } 




    else if ($traslado == 'NO' && $reprogramar == 'NO'){

        $etapa = "CANCELADA";
        // echo $etapa;

        $query = "INSERT INTO seguimiento_asistencia (id_asistencia, traslado_realizado, reprogramar, motivo, observaciones_seguimiento, servidor_registra) 
        VALUES ('$id_asistencia', '$traslado', '$reprogramar', '$motivo', '$observaciones_seguimiento', '$nombre_servidor')";
        $result = $mysqli->query($query);
    
        $actualizar_etapa = "UPDATE solicitud_asistencia SET etapa = '$etapa' WHERE id_asistencia = '$id_asistencia'";
        $res_etapa = $mysqli->query($actualizar_etapa);
    
            if($result) {
                echo $verifica;
                echo ("<script type='text/javaScript'>
                window.location.href='./asistencia_turnada.php';
                window.alert('!!!!!Registro exitoso¡¡¡¡¡')
            </script>");
                } else {  }


    }


            


} 


else {
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
}


?>