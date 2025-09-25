<?php
error_reporting(0);
require '../conexion.php';
session_start ();
$check_traslado2 = $_SESSION["check_traslado2"];
if ($check_traslado2 === 1) {
  unset($_SESSION['check_traslado2']);
  $name = $_SESSION['usuario'];
  // variables de recuperacion del form de registrar servidor
  $iddestr =$_GET['id'];
  //GET DATOS DEL TRASLADO
  $getinfotr = "SELECT * FROM react_destinos_traslados WHERE id='$iddestr'";
  $rgetinfotr = $mysqli -> query($getinfotr);
  $fgetinfotr = $rgetinfotr -> fetch_assoc();
  $idtrunico = $fgetinfotr['id_traslado'];
  // ELIMINAR DESTINO DEL TRASLADO
  $deleteservidor = "DELETE FROM react_destinos_traslados WHERE id='$iddestr'";
  $res_deleteservidor = $mysqli->query($deleteservidor);

  if($res_deleteservidor){
    echo ("<script type='text/javaScript'>
     window.location.href='../traslados_ejecucion/add_trasladonext2.php?id_traslado=$idtrunico';     
   </script>");
  }
}else {
   "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../traslados_ejecucion/add_trasladonext2.php?id_traslado=$idtrunico'>";
}
?>
