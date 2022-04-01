<?php
error_reporting(0);
require 'conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  // echo $verifica_update_person;
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datos
  $id_persona = $_GET['folio'];  //variable del folio al que se relaciona
  echo $id_persona;
  $estatus= $_POST['ESTATUS_PERSONA'];
  // datos de la determinacion de la INCORPORACION
  $multidisciplinario=$_POST['ANALISIS_MULTIDISCIPLINARIO'];
  $incorporacion=$_POST['INCORPORACION'];
  $date_aut =$_POST['FECHA_AUTORIZACION'];
  $id_analisis =$_POST['id_analisis'];
  $convenio= $_POST['CONVENIO_ENTENDIMIENTO'];
  $fecha_conv_ent =$_POST['FECHA_CONVENIO_ENTENDIMIENTO'];
  $fecha_inicio = $_POST['fecha_inicio'];
  $vigencia=$_POST['VIGENCIA_CONVENIO'];
  if ($fecha_inicio != '' && $vigencia != '') {
    $fecha_vigencia = date("Y/m/d",strtotime($fecha_inicio."+ $vigencia days"));
    $fecha_termino = date("d/m/Y",strtotime($fecha_vigencia."- 1 days"));
  }
  $id_convenio=$_POST['id_convenio'];  // fin de determincaion de la incorporacion

  $acuerdo =$_POST['CONCLUSION_CANCELACION_EXP'];
  if ($acuerdo=='CONCLUSION') {
    $conclusionart35=$_POST['CONCLUSION_ART35z'];
    if ($conclusionart35 == '') {
      $conclusionart35=$_POST['CONCLUSION_ART351'];
    }
    if ($conclusionart35 == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
      $otherart35=$_POST['OTHER_ART351'];
      if ($otherart35 === '') {
        $otherart35=$_POST['OTHER_ART351'];
      }
    }else {
      $otherart35 ='';
    }
  }else {
    $conclusionart35='';
  }
  // echo $otherart35;
  $otherart35=$_POST['OTHER_ART351'];
  $date_des =$_POST['FECHA_DESINCORPORACION'];
  $mot_inc=$_POST['MOTIVO_NO_INCORPORACION'];


  // consultar primero la informacion de los selects para poder actualizar

  // ACTUALIZAR CAMPOS QUE NO SON DISABLED
  $det_inc = "UPDATE determinacionincorporacion SET multidisciplinario = '$multidisciplinario', incorporacion = '$incorporacion', date_autorizacion = '$date_aut', id_analisis = '$id_analisis', convenio = '$convenio',
                                                    vigencia = '$vigencia', date_convenio = '$fecha_conv_ent', fecha_inicio = '$fecha_inicio', fecha_termino = '$fecha_termino', id_convenio = '$id_convenio'
                                                WHERE id_persona = '$id_persona' ";
  $res_det_inc = $mysqli->query($det_inc);

  $estatus_per = "UPDATE datospersonales SET estatus = '$estatus' WHERE id = '$id_persona'";
  $res_estatus_per = $mysqli->query($estatus_per);

  $det_cancel_conclu = "UPDATE determinacionincorporacion SET conclu_cancel = '$acuerdo', conclusionart35 = '$conclusionart35', otroart35 = '$otherart35', date_desincorporacion = '$date_des'
                        WHERE id = '$id_persona'";
  $res_det_cancel_conclu = $mysqli->query($det_cancel_conclu);

  $estatus_per = "SELECT * FROM datospersonales WHERE id='$id_persona'";
  $res_estatus_pe = $mysqli->query($estatus_per);
  $fila_estatus_per = $res_estatus_pe->fetch_assoc();
  $folioexpediente_persona = $fila_estatus_per['folioexpediente'];
  // echo $fila_estatus_per['estatus'];
  // if ($fila_estatus_per['estatus'] === 'PERSONA PROPUESTA' || $fila_estatus_per['estatus'] === 'SUJETO PROTEGIDO' || $fila_estatus_per['estatus'] === '') {
  //   $datos_persona = "UPDATE datospersonales SET estatus='$estatus'  WHERE id = '$id_persona'";
  //   $res_dat_per = $mysqli->query($datos_persona);
  // }
  // insertar comentarios de cambios
  // datos del comentario
  $comment = $_POST['COMENTARIO'];
  $comment_mascara = '3';
  $fechacomentario = date('y/m/d');
  if ($comment !== '') {
    $commenta = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_persona, fecha)
                  VALUES ('$comment', '$folioexpediente_persona', '$comment_mascara', '$name', '$id_persona', '$fechacomentario')";
    $res_comment = $mysqli->query($commenta);
  }
  // validacion de update correcto
  if($res_det_inc){
    echo ("<script type='text/javaScript'>
     window.location.href='../administrador/seguimiento_persona.php?folio=$id_persona';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
