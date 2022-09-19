<?php
error_reporting(0);
require 'conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  // carga de datos
  $folio_expediente = $_GET['folio'];  //variable del folio al que se relaciona
  echo $folio_expediente ;
  date_default_timezone_set("America/Mexico_City");
  $fecha = date('y/m/d H:i:sa');
$fecha_acu=$_POST['FECHA_ACUERDO']; echo $fecha_acu;
  $fecha_acuerdo = "UPDATE expediente SET fechaacuerdo='$fecha_acu' WHERE fol_exp = '$folio_expediente'";
  $res_fecha_acuerdo = $mysqli->query($fecha_acuerdo);
  if($res_fecha_acuerdo){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_apoyo_tecnico_juridico/modificar.php?id=$folio_expediente';
     window.alert('!!!!! FECHA GUARDADA CORRECTAMENTE ¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
}


?>
