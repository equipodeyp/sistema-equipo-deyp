<?php
error_reporting(0);
require 'conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datsos
  $id_medida = $_GET['folio'];   //variable del id de la medida
  // echo $id_medida;
  // datos de la medida que se actualizaran
  $categoria = $_POST['CATEAGORIA_MEDIDA']; //echo $categoria;
  $tipo = $_POST['TIPO_DE_MEDIDA']; //echo $tipo;
  $clasificacion = $_POST['CLASIFICACION_MEDIDA']; //echo $clasificacion;
  if ($clasificacion === 'ASISTENCIA') {
    $medida = $_POST['MEDIDAS_ASISTENCIA'];
    if ($medida === 'VI. OTRAS') {
      $descripcion = $_POST['OTRA_MEDIDA_ASISTENCIA'];
    }else {
      $descripcion = '';
    }
  }elseif ($clasificacion === 'RESGUARDO') {
    $medida = $_POST['MEDIDAS_RESGUARDO'];
    if ($medida === 'XI. EJECUCION DE MEDIDAS PROCESALES') {
      $descripcion = $_POST['RESGUARDO_XI'];
    }elseif ($medida === 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
      $descripcion = $_POST['RESGUARDO_XII'];
    }elseif ($medida === 'XIII. OTRAS MEDIDAS') {
      $descripcion = $_POST['OTRA_MEDIDA_RESGUARDO'];
    }else {
      $descripcion = '';
    }
  } //echo $medida.$descripcion;
  $fecha_definitiva = $_POST['FECHA_ACTUALIZACION_MEDIDA']; //echo $fecha_definitiva;
  $estatus = $_POST['ESTATUS_MEDIDA']; echo $estatus;
  $municipio = $_POST['MUNIPIO_EJECUCION_MEDIDA']; echo $municipio;
  $fecha_inicio = $_POST['FECHA_INICIO']; echo $fecha_inicio;
  if ($estatus === 'EJECUTADA') {
    $fecha_ejecucion = $_POST['FECHA_DESINCORPORACION'];
    $conclusion_cancel = $_POST['CONCLUSION_CANCELACION'];
    if ($conclusion_cancel === 'CONCLUSION') {
      $articulo35 = $_POST['CONCLUSION_ART35'];
      if ($articulo35 === 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
        $otherart35 = $_POST['OTHER_ART351'];
      }else {
        $otherart35 = '';
      }
    }else {
      $articulo35 = '';
      $otherart35 = '';
    }
  }elseif ($estatus === 'CANCELADA') {
    $fecha_ejecucion = $_POST['FECHA_DESINCORPORACION'];
    $motivo_cancelacion = $_POST['MOTIVO_CANCEL'];
    $conclusion_cancel = '';
    $articulo35 = '';
    $otherart35 = '';
  }else {
    $fecha_ejecucion = '';
    $conclusion_cancel = '';
    $articulo35 = '';
    $otherart35 = '';
  }
  // echo $fecha_ejecucion.'*'.$conclusion_cancel.'*'.$articulo35.'*'.$otherart35;
  $actualizar_medida = "UPDATE medidas SET categoria = '$categoria', tipo = '$tipo', clasificacion = '$clasificacion', medida ='$medida', descripcion = '$descripcion', date_provisional= '$fecha_definitiva', date_definitva = '$fecha_definitiva',
                                           tipo_modificacion = '$motivo_cancelacion', estatus = '$estatus', ejecucion = '$municipio', date_ejecucion = '$fecha_ejecucion' WHERE id = '$id_medida'";
  $res_actualizar_medida = $mysqli->query($actualizar_medida);
  // tabla multidisciplinario de la medida
  $actualizar_conclu_cancel = "UPDATE multidisciplinario_medidas SET acuerdo = '$conclusion_cancel', conclusionart35 = '$articulo35', otherart35 = '$otherart35', date_close = '$fecha_ejecucion'
                               WHERE id_medida = '$id_medida'";
  $res_actualizar_conclu_cancel = $mysqli->query($actualizar_conclu_cancel);
  // datos del comentario
  $comment = $_POST['COMENTARIO'];
  $comment_mascara = '2';
  $validacion = 'false';  // regresa la validacion a false para validar nuevamente la informacion
  date_default_timezone_set("America/Mexico_City");
  $fecha_validacion = date('y/m/d H:i:sa');
  $fecha_captura = date('y/m/d H:i:sa');
  // insertar comentarios de cambios
  if ($comment != '') {
    $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_medida, id_medida, fecha)
                  VALUES ('$comment', '$folio_expediente', '$comment_mascara', '$name', '$id_p', '$id_medida', '$fecha_captura')";
    $res_comment = $mysqli->query($comment);
  }
  // tabla para validar medida
  $datos_validacion = "UPDATE validar_medida SET validar_datos='$validacion', fecha_validacion = '$fecha' WHERE id_medida = '$id_medida'";
  $res_validacion = $mysqli->query($datos_validacion);

  if($res_actualizar_medida){
    echo ("<script type='text/javaScript'>
     window.location.href='../administrador/detalle_medida.php?id=$id_medida';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
