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
  echo "<br>";
  echo $idconvenioadhesion = $_POST['conv_adh'];
  echo "<br>";
  echo $fechainicioampliacion = $_POST['FECHA_INICIO_AMPLIACION'];
  echo "<br>";
  echo $diasvigencia = $_POST['DIAS_VIGENCIA'];
  echo "<br>";

  if ($fechainicioampliacion != '') {
    $fecha_mas = date("Y/m/d",strtotime($fechainicioampliacion."+ $diasvigencia days"));
    $fechaterminoampliacion = date("Y/m/d",strtotime($fecha_mas."- 1 days"));
  }
  echo $fechaterminoampliacion;

  $com_folio=" SELECT * FROM medidas WHERE id='$id_medida'";
  $res_fol = $mysqli->query($com_folio);
  $row_fol=$res_fol->fetch_assoc();

  $add_ampliacion_alojamiento = "INSERT INTO ampliacion_alojamiento_temporal(id_medida_alojamiento, id_convenio, fecha_inicio, dias_vigencia, fecha_termino_ampliacion)
                 VALUES('$id_medida', '$idconvenioadhesion', '$fechainicioampliacion', '$diasvigencia', '$fechaterminoampliacion')";
  $res_add_ampliacion_alojamiento = $mysqli->query($add_ampliacion_alojamiento);

  if($res_add_ampliacion_alojamiento){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_estadistica_y_preregistro/detalles_medida.php?id=$id_medida';
     window.alert('!!!!!AMPLIACIÓN EXITOSA¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}
?>
