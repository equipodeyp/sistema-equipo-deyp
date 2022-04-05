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
  $id_persona = $_GET['folio'];   //variable del folio al que se relaciona
  // datos de la autoridad
  $categoria = $_POST['CATEAGORIA_MEDIDA'];
  $tipo_medida =$_POST['TIPO_DE_MEDIDA'];
  $clasificacion_medida=$_POST['CLASIFICACION_MEDIDA'];
  if ($clasificacion_medida == 'ASISTENCIA') {
    $medida=$_POST['MEDIDAS_ASISTENCIA'];
    if ($medida == 'VI. OTRAS') {
      $med_res = $_POST['OTRA_MEDIDA_ASISTENCIA'];
    }
  } elseif ($clasificacion_medida == 'RESGUARDO') {
    $medida=$_POST['MEDIDAS_RESGUARDO'];
    if ($medida == 'XI. EJECUCION DE MEDIDAS PROCESALES') {
      $med_res = $_POST['RESGUARDO_XI'];
    } elseif ($medida == 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
      $med_res = $_POST['RESGUARDO_XII'];
    }elseif ($medida == 'XIII. OTRAS MEDIDAS') {
      $med_res = $_POST['OTRA_MEDIDA_RESGUARDO'];
    }
  }
  $inicio_medida=$_POST['INICIO_EJECUCION_MEDIDA'];
  $act_medida= $_POST['FECHA_ACTUALIZACION_MEDIDA'];
  $medida_mod=$_POST['MOTIVO_CANCEL'];
  $fecha_mod= $_POST['FECHA_MODIFICACION'];
  $tipo_mod= $_POST['TIPO_MODIFICACION'];
  $acuerdo =$_POST['CONCLUSION_CANCELACION'];
  $acuerdo =$_POST['CONCLUSION_ART35'];
  if ($acuerdo == 'OTRO' || $acuerdo == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
    $conclusionart35=$_POST['OTHER_ART35'];
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
  }elseif ($radicacion_m == 'CORREO') {
    $des_rad = $_POST['CORREO_M'];
  }elseif ($radicacion_m == 'EXPEDIENTE') {
    $des_rad = $_POST['EXPEDIENTE_M'];
  }elseif ($radicacion_m == 'OTRO') {
    $des_rad = $_POST['OTRO_M'];
  }
  // consulta de  la fuente de radicacion
  // $radcon= "SELECT id, nombre FROM radicacion WHERE id = '$radicacion_m'";
  // $r_rad = $mysqli->query($radcon);
  // $ro_rad=$r_rad->fetch_assoc();
  // $name_radicacion_m=$ro_rad['nombre'];
  $folio_exp=" SELECT * FROM datospersonales WHERE id='$id_persona'";
  $resultfolio_exp = $mysqli->query($folio_exp);
  $rowfolio_exp=$resultfolio_exp->fetch_assoc();
  $folio_expediente=$rowfolio_exp['folioexpediente'];
  date_default_timezone_set("America/Mexico_City");
  $fecha = date('y/m/d H:i:sa');

  $addmedidas = "INSERT INTO medidas (categoria, tipo, clasificacion, medida, descripcion, date_provisional, date_definitva, modificacion, date_modificada, tipo_modificacion, estatus, ejecucion, date_ejecucion, folioexpediente, id_persona, fecha_captura)
                 VALUES('$categoria', '$tipo_medida', '$clasificacion_medida', '$medida', '$med_res', '$inicio_medida', '$act_medida', '$medida_mod', '$fecha_mod', '$tipo_mod', '$estatus', '$municipio_medida', '$date_ejec', '$folio_expediente', '$id_persona', '$fecha')";
  $res_addmedidas = $mysqli->query($addmedidas);

  $qry = "select max(ID) As id from medidas";
  $result = $mysqli->query($qry);
  $row = $result->fetch_assoc();
  $id_med =$row["id"];

  $mult_meds = "INSERT INTO multidisciplinario_medidas(acuerdo, conclusionart35, date_close, folioexpediente, id_persona, id_medida)
                VALUES ('$acuerdo', '$conclusionart35',  '$date_ejec', '$folio_expediente', '$id_persona', '$id_med')";
  $res_mult_meds = $mysqli->query($mult_meds);

  $fuente_rad = "INSERT INTO radicacion_mascara2(fuente, descripcion, id_persona, folioexpediente, id_medida)
  VALUES ('$radicacion_m', '$des_rad', '$id_persona', '$folio_expediente', '$id_med')";
  $res_radicacion = $mysqli->query($fuente_rad);
  // datos del comentario
    $comment = $_POST['COMENTARIO'];
    $comment_mascara = '2';
    $id_medida = "N/A";
    $fechacomentario = date('y/m/d H:i:sa');
    if ($comment != '') {
      $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_persona, id_medida, fecha)
                    VALUES ('$comment', '$folio_expediente', '$comment_mascara', '$name', '$id_persona', '$id_med', '$fechacomentario')";
      $res_comment = $mysqli->query($comment);
    }
    // creacion de la medida para validacion posterior
    $validar = 'false';
    $validar_datos = 'false';
    $fecha_captura = date('y/m/d H:i:sa');
    $val_medida = "INSERT INTO validar_medida(folioexpediente, id_persona, id_medida, validacion, fecha_captura, validar_datos)
                    VALUES ('$folio_expediente', '$id_persona', '$id_med', '$validar', '$fecha_captura', '$validar_datos')";
    $res_validar_medida = $mysqli->query($val_medida);
// validacion del registro correcto
  if($res_addmedidas && $res_mult_meds && $res_radicacion){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_estadistica_y_preregistro/detalles_medidas.php?folio=$id_persona';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}
?>
