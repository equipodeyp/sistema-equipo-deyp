<?php
error_reporting(0);
require 'conexion.php';
session_start ();
$verifica_seguimiento = $_SESSION["verifica_seguimiento"];
if ($verifica_seguimiento == 1) {
  unset($_SESSION['verifica_seguimiento']);
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
  $conclusionart35 = $_POST['CONCLUSION_ART35'];
  // $conclusionart35=$_POST['CONCLUSION_ART35'];
  $otherart35 =$_POST['OTHER_ART35'];
  $date_conclusion =$_POST['FECHA_DESINCORPORACION'];
  $estatus=$_POST['ESTATUS_EXPEDIENTE'];

  $radicacion_s=$_POST['FUENTE_S'];

  $folio_exp=" SELECT * FROM datospersonales WHERE id='$id_persona'";
  $resultfolio_exp = $mysqli->query($folio_exp);
  $rowfolio_exp=$resultfolio_exp->fetch_assoc();
  $folio_expediente=$rowfolio_exp['folioexpediente'];

  if ($radicacion_s == 'OFICIO') {
    $des_rads = $_POST['OFICIO_S'];
  }elseif ($radicacion_s == 'CORREO') {
    $des_rads = $_POST['CORREO_S'];
  }elseif ($radicacion_s == 'EXPEDIENTE') {
    $des_rads = $_POST['EXPEDIENTE_S'];
  }elseif ($radicacion_s == 'OTRO') {
    $des_rads = $_POST['OTRO_S'];
  }

  $segexp = "INSERT INTO seguimientoexp(multidisciplinario, incorporacion, date_autorizacion, convenio, vigencia, date_convenio, folioexpediente, id_persona)
                VALUES ('$multidisciplinario', '$incorporacion', '$autorizacion', '$convenio', '$vigencia', '$date_convenio', '$folio_expediente', '$id_persona')";
  $res_segexp = $mysqli->query($segexp);

  $datos_estatus = "INSERT INTO statusseguimiento (conclu_cancel, conclusionart35, otherart35, date_desincorporacion, status, folioexpediente, id_persona)
                    VALUES('$acuerdo', '$conclusionart35', '$otherart35', '$date_conclusion', '$estatus', '$folio_expediente', '$id_persona')";
  $res_dat_status = $mysqli->query($datos_estatus);
  $fuente_rads = "INSERT INTO radicacion_mascara3(fuente, descripcion, id_persona, folioexpediente)
                VALUES ('$radicacion_s', '$des_rads', '$id_persona', '$folio_expediente')";
  $res_radicacions = $mysqli->query($fuente_rads);
  // validacion del registro correcto
  if($res_segexp && $res_dat_status && $res_radicacions){
    echo ("<script type='text/javaScript'>
     window.location.href='../administrador/admin.php';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}
?>
