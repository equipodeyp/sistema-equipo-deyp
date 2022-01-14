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
  echo $id_persona ;

  $com_folio=" SELECT * FROM datospersonales WHERE id='$id_persona'";
  $res_fol = $mysqli->query($com_folio);
  $row_fol=$res_fol->fetch_assoc();
  $fol_exp = $row_fol['folioexpediente'];
  $id_unico = $row_fol['identificador'];
  // $folio = $rowfol['folioexpediente'];
  echo $fol_exp;
  $validacion = 'true';
  date_default_timezone_set("America/Mexico_City");
  $fecha = date('y/m/d H:i:sa');

  $datos_validacion = "INSERT INTO validar_persona (folioexpediente, validacion, id_persona, fecha, id_unico)
                                           VALUES('$fol_exp', '$validacion', '$id_persona', '$fecha', '$id_unico')";
  $res_validacion = $mysqli->query($datos_validacion);

  // insertar comentarios de cambios
  // validacion de update correcto
  if($res_validacion){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_apoyo_tecnico_juridico/detalles_persona.php?folio=$id_persona';
     window.alert('!!!!!VALIDACION EXITOSA¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}


?>
