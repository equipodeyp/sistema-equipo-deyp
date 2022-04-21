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

  // datos de la autoridad
  $multidisciplinario =$_POST['ANALISIS_MULTIDISCIPLINARIO'];
  $incorporacion=$_POST['INCORPORACION'];
  $autorizacion =$_POST['FECHA_AUTORIZACION_ANALISIS'];
  $convenio =$_POST['CONVENIO_DE_ENTENDIMIENTO'];
  $vigencia =$_POST['VIGENCIA_CONVENIO'];
  $date_convenio =$_POST['FECHA_CONVENIO_ENTENDIMIENTO'];
  $acuerdo=$_POST['CONCLUSION_CANCELACION'];
  if ($acuerdo == 'CONCLUSION') {
    $conclusionart35 = $_POST['CONCLUSION_ART35'];
    if ($conclusionart35 == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO'){
      $otherart35=$_POST['OTHER_ART35'];
      if ($otherart35 == '') {
        $otherart35=$_POST['OTHER_ART351'];
      }
    }
  }

  // $conclusionart35=$_POST['CONCLUSION_ART35'];
  // $otherart35 =$_POST['OTHER_ART35'];
  $date_conclusion =$_POST['FECHA_DESINCORPORACION'];
  $estatus=$_POST['ESTATUS_EXPEDIENTE'];



  $folio_exp=" SELECT * FROM datospersonales WHERE id='$id_persona'";
  $resultfolio_exp = $mysqli->query($folio_exp);
  $rowfolio_exp=$resultfolio_exp->fetch_assoc();
  $folio_expediente=$rowfolio_exp['folioexpediente'];
  // datos del comentario
  $comment = $_POST['COMENTARIO'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  $com_folio=" SELECT * FROM datospersonales WHERE id='$id_persona'";
  $res_fol = $mysqli->query($com_folio);
  $row_fol=$res_fol->fetch_assoc();
  $fol_exp = $row_fol['folioexpediente'];
  $comment_mascara = '3';
  $id_medida = "N/A";
  // $datos_estatus = "INSERT INTO statusseguimiento (status, conclusion, articulo35, fechaestatus, folioexpediente, id_persona)
  //                   VALUES('$name_estatus', '$name_conclusion', '$name_art35', '$datestatus', '$folio_expediente', '$id_persona')";
  // $res_dat_status = $mysqli->query($datos_estatus);
  $datos_estatus = "UPDATE statusseguimiento SET conclu_cancel='$acuerdo', conclusionart35='$conclusionart35', otherart35='$otherart35', date_desincorporacion='$date_conclusion', status='$estatus' WHERE id_persona = '$id_persona'";
  $res_dat_status = $mysqli->query($datos_estatus);
  // insertar comentarios de cambios
  if ($comment != '') {
    $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_persona, id_medida)
                  VALUES ('$comment', '$fol_exp', '$comment_mascara', '$name', '$id_persona', '$id_medida')";
    $res_comment = $mysqli->query($comment);
  }
  // validacion del update correcto
  if($res_comment ){
    echo ("<script type='text/javaScript'>
     window.location.href='../administrador/mod_persona.php?folio=$id_persona';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
