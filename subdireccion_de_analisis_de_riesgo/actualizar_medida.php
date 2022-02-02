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
  $id_persona = $_GET['folio'];   //variable del folio al que se relaciona

  $medida = "SELECT * FROM medidas WHERE id = '$id_persona'";
  $resultadomedida = $mysqli->query($medida);
  $rowmedida = $resultadomedida->fetch_array(MYSQLI_ASSOC);
  $id_p = $rowmedida['id_persona'];

  // datos de la autoridad
  $tipo_medida =$_POST['TIPO_DE_MEDIDA'];
  $clasificacion_medida=$_POST['CLASIFICACION_MEDIDA'];
  if ($clasificacion_medida == 'ASISTENCIA') {
    $medida=$_POST['MEDIDAS_ASISTENCIA'];
    if ($medida == 'VIII. OTRAS') {
      $med_res = $_POST['OTRA_MEDIDA_ASISTENCIA'];
      if ($med_res == '') {
        $med_res = $_POST['OTRA_MEDIDA_ASISTENCIA1'];
      }
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
      if ($med_res == '') {
        $med_res = $_POST['OTRA_MEDIDA_RESGUARDO1'];
      }
    }
  }
  $inicio_medida=$_POST['INICIO_EJECUCION_MEDIDA'];
  $act_medida= $_POST['FECHA_ACTUALIZACION_MEDIDA'];
  $medida_mod=$_POST['MOTIVO_CANCEL'];
  $fecha_mod= $_POST['FECHA_MODIFICACION'];
  $tipo_mod= $_POST['TIPO_MODIFICACION'];
  $acuerdo =$_POST['CONCLUSION_CANCELACION'];
  if ($acuerdo == 'CONCLUSION') {
    $conclusionart35=$_POST['CONCLUSION_ART35'];
    if ($conclusionart35 == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
      $otherart35=$_POST['OTHER_ART35'];
      if ($otherart35 == '') {
        $otherart35=$_POST['OTHER_ART351'];
      }
    }else {
      $otherart35 ='';
    }
  }else {
    $conclusionart35='';
  }
  $date_conclusion=$_POST['FECHA_DESINCORPORACION'];
  $estatus =$_POST['ESTATUS_MEDIDA'];
  $municipio_medida=$_POST['MUNIPIO_EJECUCION_MEDIDA'];
  // $name_municipioact= "SELECT id, nombre FROM municipios WHERE id='$municipio_medida'";
  // $r_muniac = $mysqli->query($name_municipioact);
  // $ro_muniac=$r_muniac->fetch_assoc();
  // $name_muniac=$ro_muniac['nombre'];
  $date_ejec = $_POST['FECHA_DE_EJECUCION'];
  // analisis multidisciplinario

  // fuente
  $radicacion_m=$_POST['FUENTE_M'];
  if ($radicacion_m == 'OFICIO') {
    $des_rad = $_POST['OFICIO_M'];
    if ($des_rad == '') {
      $des_rad = $_POST['OFICIO_M1'];
    }
  }elseif ($radicacion_m == 'CORREO') {
    $des_rad = $_POST['CORREO_M'];
    if ($des_rad == '') {
      $des_rad = $_POST['CORREO_M1'];
    }
  }elseif ($radicacion_m == 'EXPEDIENTE') {
    $des_rad = $_POST['EXPEDIENTE_M'];
    if ($des_rad == '') {
      $des_rad = $_POST['EXPEDIENTE_M1'];
    }
  }elseif ($radicacion_m == 'OTRO') {
    $des_rad = $_POST['OTRO_M'];
    if ($des_rad == '') {
      $des_rad = $_POST['OTRO_M1'];
    }
  }
  // datos del comentario
  $comment = $_POST['COMENTARIO'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  $com_folio=" SELECT * FROM datospersonales WHERE id='$id_persona'";
  $res_fol = $mysqli->query($com_folio);
  $row_fol=$res_fol->fetch_assoc();
  $fol_exp = $row_fol['folioexpediente'];
  $comment_mascara = '2';
  // consulta de  la fuente de radicacion
  // $radcon= "SELECT id, nombre FROM radicacion WHERE id = '$radicacion_m'";
  // $r_rad = $mysqli->query($radcon);
  // $ro_rad=$r_rad->fetch_assoc();
  // $name_radicacion_m=$ro_rad['nombre'];
  $folio_exp=" SELECT * FROM datospersonales WHERE id='$id_persona'";
  $resultfolio_exp = $mysqli->query($folio_exp);
  $rowfolio_exp=$resultfolio_exp->fetch_assoc();
  $folio_expediente=$rowfolio_exp['folioexpediente'];
  $persona = $rowfolio_exp['id_persona'];

  // $addmedidas = "INSERT INTO medidas (tipo, clasificacion, medida, descripcion, date_provisional, date_definitva, modificacion, date_modificada, tipo_modificacion, estatus, ejecucion, date_ejecucion, folioexpediente, id_persona)
  //                VALUES('$tipo_medida', '$clasificacion_medida', '$medida', '$med_res', '$inicio_medida', '$act_medida', '$medida_mod', '$fecha_mod', '$tipo_mod', '$estatus', '$municipio_medida', '$date_ejec', '$folio_expediente', '$id_persona')";
  // $res_addmedidas = $mysqli->query($addmedidas);
  $addmedidas = "UPDATE medidas SET tipo='$tipo_medida', date_definitva='$act_medida', estatus='$estatus', modificacion='$medida_mod', date_ejecucion='$date_conclusion' WHERE id = '$id_persona'";
  $res_addmedidas = $mysqli->query($addmedidas);
  //
  // $mult_meds = "INSERT INTO multidisciplinario_medidas(acuerdo, conclusionart35, otherart35, date_close, folioexpediente, id_persona)
  //               VALUES ('$acuerdo', '$conclusionart35', '$otherart35', '$date_conclusion', '$folio_expediente', '$id_persona')";
  // $res_mult_meds = $mysqli->query($mult_meds);
  $mult_meds = "UPDATE multidisciplinario_medidas SET acuerdo='$acuerdo', conclusionart35='$conclusionart35', otherart35='$otherart35', date_close='$date_conclusion' WHERE  id_medida = '$id_persona'";
  $res_mult_meds = $mysqli->query($mult_meds);
  //
  // $fuente_rad = "INSERT INTO radicacion_mascara2(fuente, descripcion, id_persona, folioexpediente)
  // VALUES ('$radicacion_m', '$des_rad', '$id_persona', '$folio_expediente')";
  // $res_radicacion = $mysqli->query($fuente_rad);
  $fuente_rad = "UPDATE radicacion_mascara2 SET fuente='$radicacion_m', descripcion='$des_rad' WHERE id_medida = '$id_persona'";
  $res_radicacion = $mysqli->query($fuente_rad);
  // insertar comentarios de cambios
  if ($comment != '') {
    $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_persona, id_medida)
                  VALUES ('$comment', '$fol_exp', '$comment_mascara', '$name', '$id_p', '$id_persona')";
    $res_comment = $mysqli->query($comment);
  }
  // validacion de update correcto
  if($res_radicacion){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_analisis_de_riesgo/detalles_persona.php?folio=$id_p';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
