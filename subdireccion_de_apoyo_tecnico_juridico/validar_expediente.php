<?php
// error_reporting(0);
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
  $fol_exp1 = $_GET['folio'];  //variable del folio al que se relaciona
// echo $fol_exp1;
  $validacion = 'true';
  date_default_timezone_set("America/Mexico_City");
  $fecha = date('y/m/d H:i:sa');

  $datos_validacion_exp = "UPDATE expediente SET validacion='$validacion', fecha_validacion = '$fecha' WHERE fol_exp = '$fol_exp1'";
  $res_validacion_exp = $mysqli->query($datos_validacion_exp);

  // insertar comentarios de cambios
  // validacion de update correcto
  if($res_validacion_exp){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_apoyo_tecnico_juridico/menu.php';
     window.alert('!!!!!VALIDACION EXITOSA¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}


?>
