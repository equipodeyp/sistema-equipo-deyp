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
  $id_medida = $_GET['folio'];  //variable del folio al que se relaciona
  echo $id_medida ;

  $com_folio=" SELECT * FROM medidas WHERE id='$id_medida'";
  $res_fol = $mysqli->query($com_folio);
  $row_fol=$res_fol->fetch_assoc();
  // $fol_exp = $row_fol['folioexpediente'];
  // $id_unico = $row_fol['identificador'];
  // $folio = $rowfol['folioexpediente'];
  // echo $fol_exp;
  $validacion = 'true';
  date_default_timezone_set("America/Mexico_City");
  $fecha_validacion = date('y/m/d H:i:sa');

  $datos_validacion = "UPDATE validar_medida SET validacion='$validacion', fecha_validacion = '$fecha', usuario = '$name' WHERE id_medida = '$id_medida'";
  $res_validacion = $mysqli->query($datos_validacion);

  // insertar comentarios de cambios
  // validacion de update correcto
  if($res_validacion){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_estadistica_y_preregistro/detalles_medida.php?id=$id_medida';
     window.alert('!!!!!VALIDACION EXITOSA¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}


?>
