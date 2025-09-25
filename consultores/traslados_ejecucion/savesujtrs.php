<?php
error_reporting(0);
require '../conexion.php';
session_start ();
$check_traslado2 = $_SESSION["check_traslado2"];
if ($check_traslado2 === 1) {
  unset($_SESSION['check_traslado2']);
  echo "id destino traslado---";
  echo $id_traslado_destino = $_GET['id_traslado'];
  echo "<br>";
  $usuario = $_SESSION['usuario'];
  $fecha_alta = date("Y/m/d");
  // Obtener los arrays de nombres y idpersona enviados por POST
  echo $folexp = $_POST['nombre'];
  echo "<br>";
  echo $idpersona = $_POST['id_sujeto'];
  echo "<br>";
  echo $resguardo = $_POST['resguardo'];
  echo "<br>";

  $getinfotrs = "SELECT * FROM react_destinos_traslados WHERE id = '$id_traslado_destino'";
  $rgetinfotrs = $mysqli->query($getinfotrs);
  $fgetinfotrs = $rgetinfotrs ->fetch_assoc();
  echo "id traslado unico---";
  echo $idtrsunic = $fgetinfotrs['id_traslado'];
  echo "<br>";
  // agregando sujetos al traslado y destino correspondiente
  $addsujetosentraslado = "INSERT INTO react_sujetos_traslado(id_traslado, folio_expediente, id_sujeto, resguardado, usuario, fecha_alta, id_destino)
  VALUES ('$idtrsunic', '$folexp', '$idpersona', '$resguardo', '$usuario', '$fecha_alta', '$id_traslado_destino')";
  $raddsujetosentraslado = $mysqli->query($addsujetosentraslado);

  // redireccionar a la pagina de registro de traslado
  if($raddsujetosentraslado){
    echo ("<script type='text/javaScript'>
     window.location.href='../traslados_ejecucion/add_trasladonext2.php?id_traslado=$idtrsunic';
   </script>");
  }
}else {
   "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../traslados_ejecucion/add_trasladonext2.php?id_traslado=$idtrsunic'>";
}
?>
