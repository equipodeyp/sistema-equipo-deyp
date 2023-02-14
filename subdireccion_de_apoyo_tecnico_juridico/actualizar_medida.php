<?php
error_reporting(0);
require 'conexion.php';
session_start ();
$verifica_medida = $_SESSION["verifica_medida"];
if ($verifica_medida == 1) {
  unset($_SESSION['verifica_medida']);
  $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datsos
  $id_persona = $_GET['folio'];   //variable del id de la medida
// echo 'id medida = ' .$id_persona;
  $medida = "SELECT * FROM medidas WHERE id = '$id_persona'";
  $resultadomedida = $mysqli->query($medida);
  $rowmedida = $resultadomedida->fetch_array(MYSQLI_ASSOC);
  $id_p = $rowmedida['id_persona'];
  $tipomedi = $rowmedida['tipo'];

  $clasificacion_medida=$_POST['CLASIFICACION_MEDIDA'];

  if ($clasificacion_medida == 'ASISTENCIA') {
    $medida=$_POST['MEDIDAS_ASISTENCIA'];
    if ($medida == 'VI. OTRAS') {
      $med_res = $_POST['OTRA_MEDIDA_ASISTENCIA'];
    }else {
      $med_res = '';
    }
  } elseif ($clasificacion_medida == 'RESGUARDO') {
    $medida=$_POST['MEDIDAS_RESGUARDO'];
    if ($medida == '') {
      $medida=$_POST['MEDIDAS_RESGUARDO1'];
    }
    if ($medida == 'XI. EJECUCION DE MEDIDAS PROCESALES') {
      $med_res = $_POST['RESGUARDO_XI'];
      if ($med_res == '') {
        $med_res = $_POST['RESGUARDO_XI1'];
      }
    } elseif ($medida == 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
      $med_res = $_POST['RESGUARDO_XII'];
      if ($med_res == '') {
        $med_res = $_POST['RESGUARDO_XII1'];
      }
    }elseif ($medida == 'XIII. OTRAS MEDIDAS') {
      $med_res = $_POST['OTRA_MEDIDA_RESGUARDO'];
    }else {
      $med_res = '';
    }
  }
  echo $inicio_medida=$_POST['INICIO_EJECUCION_MEDIDA'];
  echo '<br>';
  // echo $inicio_medida2 = date("Y-d-m", strtotime($inicio_medida));
  $date = str_replace('/', '-', $inicio_medida);
echo $inicio_medida2 = date('Y-m-d', strtotime($date));
  // datos del comentario
  $comment = $_POST['COMENTARIO'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  $com_folio=" SELECT * FROM datospersonales WHERE id='$id_p'";
  $res_fol = $mysqli->query($com_folio);
  $row_fol=$res_fol->fetch_assoc();
  $fol_exp = $row_fol['folioexpediente'];
  // echo $fol_exp;
  $comment_mascara = '2';

  $folio_exp=" SELECT * FROM datospersonales WHERE id='$id_p'";
  $resultfolio_exp = $mysqli->query($folio_exp);
  $rowfolio_exp=$resultfolio_exp->fetch_assoc();
  $folio_expediente=$rowfolio_exp['folioexpediente'];
  $persona = $rowfolio_exp['id'];
  // echo $folio_expediente.'<br>'. $persona;

    $addmedidas2 = "UPDATE medidas SET clasificacion = '$clasificacion_medida', medida = '$medida', descripcion = '$med_res', date_provisional = ' $inicio_medida2'   WHERE id = '$id_persona'";
    $res_addmedidas2 = $mysqli->query($addmedidas2);

 // regresa la validacion a false para validar nuevamente la informacion
 $validacion = 'true';
 date_default_timezone_set("America/Mexico_City");
 $fecha_validacion = date('y/m/d H:i:sa');
 $fecha_captura = date('y/m/d H:i:sa');

  // insertar comentarios de cambios
  if ($comment != '') {
    $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_persona, id_medida, fecha)
                  VALUES ('$comment', '$folio_expediente', '$comment_mascara', '$name', '$id_p', '$id_persona', '$fecha_captura')";
    $res_comment = $mysqli->query($comment);
  }

  $datos_validacion = "UPDATE validar_medida SET fecha_validacion = '$fecha', validar_datos = 'false', usuario3= '$name', 1ervalidacion='$validacion'  WHERE id_medida = '$id_persona'";
  $res_validacion = $mysqli->query($datos_validacion);

  // validacion de update correcto
  if($res_addmedidas2 && $res_validacion){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_apoyo_tecnico_juridico/detalles_medidas.php?folio=$persona';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
