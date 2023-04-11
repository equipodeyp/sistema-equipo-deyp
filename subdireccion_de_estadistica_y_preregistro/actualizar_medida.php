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
  $id_persona = $_GET['folio'];   //variable del id de la medida
// echo 'id medida = ' .$id_persona;
  $medida = "SELECT * FROM medidas WHERE id = '$id_persona'";
  $resultadomedida = $mysqli->query($medida);
  $rowmedida = $resultadomedida->fetch_array(MYSQLI_ASSOC);
  $id_p = $rowmedida['id_persona'];
  $tipomedi = $rowmedida['tipo'];
  // echo $id_persona;
  // echo $tipomedi;
// echo 'id persona ='. $id_p;
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
  if ($act_medida == '') {
    $act_medida= $_POST['FECHA_ACTUALIZACION_MEDIDA1'];
  }
  $medida_mod=$_POST['MOTIVO_CANCEL2'];
  $fecha_mod= $_POST['FECHA_MODIFICACION'];
  $tipo_mod= $_POST['TIPO_MODIFICACION'];
  $acuerdo =$_POST['CONCLUSION_ART35'];
  if ($acuerdo === 'OTRO' || $acuerdo === 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
    $conclusionart35 = $_POST['OTHER_ART351'];
  }else {
    $conclusionart35 = '';
  }

  $date_conclusion=$_POST['FECHA_DESINCORPORACION'];
  if ($date_conclusion == '') {
    $date_conclusion=$_POST['FECHA_DESINCORPORACION1'];
  }
  $estatus =$_POST['ESTATUS_MEDIDA'];
  $municipio_medida=$_POST['MUNIPIO_EJECUCION_MEDIDA'];
  // $name_municipioact= "SELECT id, nombre FROM municipios WHERE id='$municipio_medida'";
  // $r_muniac = $mysqli->query($name_municipioact);
  // $ro_muniac=$r_muniac->fetch_assoc();
  // $name_muniac=$ro_muniac['nombre'];
  $date_ejec = $_POST['FECHA_DE_EJECUCION'];
  // analisis multidisciplinario

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
  $persona = $rowfolio_exp['id_persona'];
  // echo $folio_expediente. $persona;

  // $addmedidas = "INSERT INTO medidas (tipo, clasificacion, medida, descripcion, date_provisional, date_definitva, modificacion, date_modificada, tipo_modificacion, estatus, ejecucion, date_ejecucion, folioexpediente, id_persona)
  //                VALUES('$tipo_medida', '$clasificacion_medida', '$medida', '$med_res', '$inicio_medida', '$act_medida', '$medida_mod', '$fecha_mod', '$tipo_mod', '$estatus', '$municipio_medida', '$date_ejec', '$folio_expediente', '$id_persona')";
  // $res_addmedidas = $mysqli->query($addmedidas);
  if ($tipomedi === 'PROVISIONAL') {
    // code...
    $addmedidas2 = "UPDATE medidas SET tipo='$tipo_medida', date_definitva='$act_medida'  WHERE id = '$id_persona'";
    $res_addmedidas2 = $mysqli->query($addmedidas2);
  }
  $addmedidas = "UPDATE medidas SET estatus='$estatus', modificacion='$medida_mod', date_ejecucion='$date_conclusion' WHERE id = '$id_persona'";
  $res_addmedidas = $mysqli->query($addmedidas);
  //
  // $mult_meds = "INSERT INTO multidisciplinario_medidas(acuerdo, conclusionart35, otherart35, date_close, folioexpediente, id_persona)
  //               VALUES ('$acuerdo', '$conclusionart35', '$otherart35', '$date_conclusion', '$folio_expediente', '$id_persona')";
  // $res_mult_meds = $mysqli->query($mult_meds);
  $mult_meds = "UPDATE multidisciplinario_medidas SET acuerdo='$acuerdo', conclusionart35='$conclusionart35', date_close='$date_conclusion' WHERE  id_medida = '$id_persona'";
  $res_mult_meds = $mysqli->query($mult_meds);
 // regresa la validacion a false para validar nuevamente la informacion
 $validacion = 'false';
 date_default_timezone_set("America/Mexico_City");
 $fecha_validacion = date('y/m/d H:i:sa');
 $fecha_captura = date('y/m/d H:i:sa');

  // insertar comentarios de cambios
  if ($comment != '') {
    $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_persona, id_medida, fecha)
                  VALUES ('$comment', '$folio_expediente', '$comment_mascara', '$name', '$id_p', '$id_persona', '$fecha_captura')";
    $res_comment = $mysqli->query($comment);
  }



  $datos_validacion = "UPDATE validar_medida SET validacion='$validacion', fecha_validacion = '$fecha', validar_datos = '$validacion' WHERE id_medida = '$id_persona'";
  $res_validacion = $mysqli->query($datos_validacion);
  $municipio_ejecucio_med = $_POST['MUNIPIO_EJECUCION_MEDIDA'];
  if ($municipio_ejecucio_med != '') {
    $mun_med = "UPDATE medidas SET ejecucion = '$municipio_ejecucio_med' WHERE id = '$id_persona'";
    $res_mun_med = $mysqli->query($mun_med);
  }

  /////////////////////////////////////////////////////////////////////////
  $relacionmed = $_POST['statusprogrampersonarelacional'];
  if ($relacionmed === '1') {
    echo "SI";
    $relac_med = "UPDATE medidas SET relacion = 'SI' WHERE id = '$id_persona'";
    $res_relac_med = $mysqli->query($relac_med);
  }else {
    $relac_med = "UPDATE medidas SET relacion = 'NO' WHERE id = '$id_persona'";
    $res_relac_med = $mysqli->query($relac_med);
  }
  //////////////////////////////////////////////////////////////////////////
  $statumed = $_POST['statusprogrampersona'];
  if ($statumed === '1') {
    $statusprogram = 'ACTIVO';
  }else {
    $statusprogram = 'INACTIVO';
  }
  $statu_med = "UPDATE medidas SET estatusprograma = '$statusprogram' WHERE id = '$id_persona'";
  $res_statu_med = $mysqli->query($statu_med);
/////////////////////////////////////////////////////////////////////////////////

  // validacion de update correcto
  if($res_addmedidas){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_estadistica_y_preregistro/detalles_medida.php?id=$id_persona';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
