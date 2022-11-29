<?php
error_reporting(0);
require 'conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  $conexion=mysqli_connect("localhost","root","","sistemafgjem");
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datsos
  $folio_expediente = $_GET['folio'];   //variable del folio al que se relaciona
  // echo $folio_expediente;
  // analisis del expediente
  $personas_propuestas = $_POST['personas_propuestas'];
  $analisis = $_POST['ANALISIS_MULTIDISCIPLINARIO'];
  $incorporacion = $_POST['INCORPORACION'];
  $fecha_analisis = $_POST['FECHA_AUTORIZACION_ANALISIS'];
  $id_analisis = $_POST['id_analisis'];
  $convenio = $_POST['CONVENIO_DE_ENTENDIMIENTO'];
  $fecha_convenio = $_POST['FECHA_CONVENIO_ENTENDIMIENTO'];
  $fecha_inicio = $_POST['fecha_inicio'];
  // echo $fecha_inicio;
  $vigencia = $_POST['VIGENCIA_CONVENIO'];
  if ($fecha_inicio != '' && $vigencia !== '') {
    $fecha_vigencia = date("Y/m/d",strtotime($fecha_inicio."+ $vigencia days"));
    $fecha_termino = date("Y/m/d",strtotime($fecha_vigencia."- 1 days"));
    // code...
  }else {
    $fecha_inicio = '';
    $vigencia = '';
    $fecha_termino = '';
  }

  // $id_convenio= $_POST['id_convenio'];
  $personas_incorporadas = $_POST['personas_incorporadas'];
  $total_convenios = $_POST['num_convenio'];

  $analisis_expediente = "SELECT * FROM analisis_expediente WHERE folioexpediente = '$folio_expediente'";
  $res_analsis_exp = $conexion -> query($analisis_expediente);
  $fila_analisis_exp = mysqli_fetch_array($res_analsis_exp);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////descomentar una vez que se haiga actualizado todo
  // if ($fila_analisis_exp > 0) {
  //   $upd_analisis = $fila_analisis_exp['analisis'];
  //   $upd_incorporacion = $fila_analisis_exp['incorporacion'];
  //   $upd_convenio = $fila_analisis_exp['convenio'];
  //   if ($upd_analisis === 'EN ELABORACION' || $upd_analisis === '') {
  //     $update_analisis = "UPDATE analisis_expediente SET personas_propuestas = '$personas_propuestas', analisis = '$analisis', fecha_analisis = '$fecha_analisis', id_analisis='$id_analisis', convenio = '$convenio',
  //     fecha_convenio = '$fecha_convenio', fecha_inicio='$fecha_inicio', vigencia = '$vigencia' , fecha_termino_convenio = '$fecha_termino',  personasincorporadas = '$personas_incorporadas',
  //     num_convenios = '$total_convenios' WHERE folioexpediente = '$folio_expediente'";
  //     $res_analsis = $mysqli->query($update_analisis);
  //   }
  //   if ($upd_incorporacion === '') {
  //     $update_analisis = "UPDATE analisis_expediente SET personas_propuestas = '$personas_propuestas', incorporacion = '$incorporacion', fecha_analisis = '$fecha_analisis', id_analisis='$id_analisis', convenio = '$convenio',
  //     fecha_convenio = '$fecha_convenio', fecha_inicio='$fecha_inicio', vigencia = '$vigencia' , fecha_termino_convenio = '$fecha_termino',  personasincorporadas = '$personas_incorporadas',
  //     num_convenios = '$total_convenios' WHERE folioexpediente = '$folio_expediente'";
  //     $res_analsis = $mysqli->query($update_analisis);
  //   }
  //   if ($upd_convenio === '' || $upd_convenio === 'PENDIENTE DE EJECUCION') {
  //     $update_analisis = "UPDATE analisis_expediente SET personas_propuestas = '$personas_propuestas', fecha_analisis = '$fecha_analisis', id_analisis='$id_analisis', convenio = '$convenio',
  //     fecha_convenio = '$fecha_convenio', fecha_inicio='$fecha_inicio', vigencia = '$vigencia' , fecha_termino_convenio = '$fecha_termino',  personasincorporadas = '$personas_incorporadas',
  //     num_convenios = '$total_convenios' WHERE folioexpediente = '$folio_expediente'";
  //     $res_analsis = $mysqli->query($update_analisis);
  //   }
  //
  // }else {
  //   $new_analisis = "INSERT INTO analisis_expediente (folioexpediente, personas_propuestas, analisis, incorporacion, fecha_analisis, id_analisis, convenio, fecha_convenio, fecha_inicio, vigencia, fecha_termino_convenio, id_convenio, personasincorporadas, num_convenios)
  //                    VALUES('$folio_expediente', '$personas_propuestas', '$analisis', '$incorporacion', '$fecha_analisis', '$id_analisis', '$convenio', '$fecha_convenio', '$fecha_inicio', '$vigencia', '$fecha_termino', '$id_convenio', '$personas_incorporadas', '$total_convenios')";
  //   $res_analsis = $mysqli->query($new_analisis);
  // }
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // convenio de adhesion del expediente

  //convenio modificatorio del EXPEDIENTE
  // seguimiento del expediente
  $concl_canc = $_POST['CONCLUSION_CANCELACION'];
  $conclu_art = $_POST['CONCLUSION_ART35'];
  $otro_art = $_POST['OTHER_ART351'];
  if ($otro_art == '') {
    $otro_art = $_POST['OTHER_ART3512'];
  }
  $fecha_desincorporacion = $_POST['FECHA_DESINCORPORACION'];
  $estatus_exp = $_POST['ESTATUS_EXPEDIENTE'];
//////////////////////////////////////////////////////////////////////////////////////////////////////////////descomentar una vez que se haiga actualizado todo
  // $segexped = "SELECT * FROM statusseguimiento WHERE folioexpediente = '$folio_expediente'";
  // $res_segexped = $conexion->query($segexped);
  // $fila_segexped = mysqli_fetch_array($res_segexped);
  // if ($fila_segexped > 0) {
  //   $update_segexped = "UPDATE statusseguimiento SET conclu_cancel = '$concl_canc', conclusionart35 = '$conclu_art', otherart35 = '$otro_art', date_desincorporacion = '$fecha_desincorporacion',
  //                                                    status = '$estatus_exp' WHERE folioexpediente = '$folio_expediente'";
  //   $res_segexpediente = $mysqli->query($update_segexped);
  // }else {
  //   $new_segesped = "INSERT INTO statusseguimiento (conclu_cancel, conclusionart35, otherart35, date_desincorporacion, status, folioexpediente)
  //                   VALUES ('$concl_canc', '$conclu_art', '$otro_art', '$fecha_desincorporacion', '$estatus_exp', '$folio_expediente')";
  //   $res_segexpediente = $mysqli->query($new_segesped);
  // }

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // variables de los comentarios
  $comment = $_POST['COMENTARIO'];
  $comment_mascara = '4';
  date_default_timezone_set("America/Mexico_City");
  $fecha_captura = date('y/m/d H:i:sa');

  // insertar comentarios de cambios
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////descomentar una vez que se haiga actualizado todo
  // if ($comment != '') {
  //   $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, fecha)
  //                 VALUES ('$comment', '$folio_expediente', '$comment_mascara', '$name', '$fecha_captura')";
  //   $res_comment = $mysqli->query($comment);
  // }
  //
  // $update_analisis = "UPDATE analisis_expediente SET personas_propuestas = '$personas_propuestas' WHERE folioexpediente = '$folio_expediente'";
  // $res_analsis = $mysqli->query($update_analisis);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // validacion del update correcto
    /////////////////////////////////////////////////////////////////////////////
    $update_analisis = "UPDATE analisis_expediente SET analisis = '$analisis' WHERE folioexpediente = '$folio_expediente'";
         $res_segexpediente = $mysqli->query($update_analisis);
    ////////////////////////////////////////////////////////////////////////////////////////
  if($res_segexpediente){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_estadistica_y_preregistro/seguimiento_expediente.php?folio=$folio_expediente';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
