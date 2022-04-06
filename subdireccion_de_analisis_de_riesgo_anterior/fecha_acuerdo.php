<?php
error_reporting(0);
require 'conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  // echo $verifica_update_person;
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
//   $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
//   $result = $mysqli->query($sentencia);
//   $row=$result->fetch_assoc();
  // carga de datos
  $folio_expediente = $_GET['folio'];  //variable del folio al que se relaciona
  echo $folio_expediente ;

//   $com_folio=" SELECT * FROM datospersonales WHERE id='$id_persona'";
//   $res_fol = $mysqli->query($com_folio);
//   $row_fol=$res_fol->fetch_assoc();
//   $fol_exp = $row_fol['folioexpediente'];
//   $id_unico = $row_fol['identificador'];
  // $folio = $rowfol['folioexpediente'];
//   echo $fol_exp;
//   $validacion = 'true';
  date_default_timezone_set("America/Mexico_City");
  $fecha = date('y/m/d H:i:sa');
//   $updvalidar = "SELECT * FROM validar_persona WHERE id_persona = '$id_persona'";
//   $res_updvalidar = $mysqli->query($updvalidar);
//   $row_updvalidar=$res_updvalidar->fetch_assoc();
$fecha_acu=$_POST['FECHA_ACUERDO']; echo $fecha_acu;

  $fecha_acuerdo = "UPDATE expediente SET fechaacuerdo='$fecha_acu' WHERE fol_exp = '$folio_expediente'";
  $res_fecha_acuerdo = $mysqli->query($fecha_acuerdo);

//   insertar comentarios de cambios
//   validacion de update correcto
  if($res_fecha_acuerdo){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_analisis_de_riesgo/modificar.php?id=$folio_expediente';
     window.alert('!!!!! FECHA GUARDADA CORRECTAMENTE ¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}


?>
