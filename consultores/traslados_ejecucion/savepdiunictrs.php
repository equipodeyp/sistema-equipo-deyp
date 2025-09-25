<?php
error_reporting(0);
require '../conexion.php';
session_start ();
$check_traslado2 = $_SESSION["check_traslado2"];
if ($check_traslado2 === 1) {
  unset($_SESSION['check_traslado2']);
  echo "id del sujeto destino traslado---";
  echo $id_trasladotrs = $_GET['id_traslado'];
  echo "<br>";
  $usuario = $_SESSION['usuario'];
  $fecha_alta = date("Y/m/d");
  // Obtener los arrays de nombres y idpersona enviados por POST
  echo "pdi---";
  echo $namepditrs = $_POST['namepdi'];
  echo "<br>";
  // get info traslado
  // $getinfitrs = "select"
  // agregar pdis del traslado
  $addpdistraslado = "INSERT INTO react_pdi_traslado(id_traslado, nombrepdi, usuario, fecha_alta)
  VALUES ('$id_trasladotrs', '$namepditrs', '$usuario', '$fecha_alta')";
  $raddpdistraslado = $mysqli->query($addpdistraslado);

  if($raddpdistraslado){
    echo ("<script type='text/javaScript'>
     window.location.href='../traslados_ejecucion/add_trasladonext2.php?id_traslado=$id_trasladotrs';
   </script>");
  }
}else {
   "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../traslados_ejecucion/add_trasladonext2.php?id_traslado=$id_trasladotrs'>";
}
?>
