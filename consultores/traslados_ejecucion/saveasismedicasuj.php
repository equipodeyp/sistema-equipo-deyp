<?php
error_reporting(0);
require '../conexion.php';
session_start ();
$check_traslado2 = $_SESSION["check_traslado2"];
if ($check_traslado2 === 1) {
  unset($_SESSION['check_traslado2']);
  echo "id del sujeto destino traslado---";
  echo $id_sujeto_destino = $_GET['id_traslado'];
  echo "<br>";
  $usuario = $_SESSION['usuario'];
  $fecha_alta = date("Y/m/d");
  // Obtener los arrays de nombres y idpersona enviados por POST
  echo "id de la asistencia medica---";
  echo $idasismedica = $_POST['idasismed'];
  echo "<br>";
  // obtener info de react sujetos traslados
  $getinfosujtrs = "SELECT * FROM react_sujetos_traslado WHERE id = '$id_sujeto_destino'";
  $rgetinfosujtrs = $mysqli -> query ($getinfosujtrs);
  $fgetinfosujtrs = $rgetinfosujtrs -> fetch_assoc();
  echo "id del traslado principal---";
  echo $idtrsunic = $fgetinfosujtrs['id_traslado'];
  echo "<br>";

  // actualizar info del sujeto con destino
  $actsujds = "UPDATE react_sujetos_traslado SET id_asistenciamedica = '$idasismedica' WHERE id = '$id_sujeto_destino'";
  $ractsujds = $mysqli -> query($actsujds);
  // redireccionar a la pagina de registro de traslado
  if($ractsujds){
    echo ("<script type='text/javaScript'>
     window.location.href='../traslados_ejecucion/add_trasladonext2.php?id_traslado=$idtrsunic';
   </script>");
  }
}else {
   "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../traslados_ejecucion/add_trasladonext2.php?id_traslado=$idtrsunic'>";
}
?>
