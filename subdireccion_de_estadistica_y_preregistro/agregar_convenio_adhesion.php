<?php
// error_reporting(0);
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
  $datos_personales=" SELECT * FROM datospersonales WHERE id='$id_persona'";
  $result_datos_personales = $mysqli->query($datos_personales);
  $fila_datos_personales=$result_datos_personales->fetch_assoc();
  $folio_expediente=$fila_datos_personales['folioexpediente'];
  $identificador = $fila_datos_personales['identificador'];
  // datos de la autoridad
  date_default_timezone_set("America/Mexico_City");
  $fecha_firma = $_POST['fecha_firma_mod'];
  $vigencia = $_POST['vigencia_con_adh'];
  $fecha = date('y/m/d H:i:sa');
  $validar = 'false';
  $validar_datos = 'false';
  $fecha_captura = date('y/m/d H:i:sa');
  // echo $folio_expediente.'-'.$id_persona.'-'.$identificador.'-'.$fecha_firma.'-'.$vigencia.'-'.$name.'-'.$fecha_captura;
// obtener fecha de la vigencia en automatico
$fecha_vigencia = date("y/m/d",strtotime($fecha_firma."+ $vigencia days"));

  $add_convenio_mod = "INSERT INTO convenio_adhesion(folioexpediente, id_persona, id_unico, fecha_firma, vigencia, fecha_vigencia, usuario, fecha_alta)
                 VALUES('$folio_expediente', '$id_persona', '$identificador', '$fecha_firma', '$vigencia', '$fecha_vigencia', '$name', '$fecha_captura')";
  $res_add_convenio_mod = $mysqli->query($add_convenio_mod);

// validacion del registro correcto
  if($res_add_convenio_mod){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_estadistica_y_preregistro/detalles_persona.php?folio=$id_persona';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}
?>
