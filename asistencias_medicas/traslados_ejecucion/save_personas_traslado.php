<?php
include("../conexion.php");
session_start ();
$id_traslado = $_GET['id_traslado'];
$usuario = $_SESSION['usuario'];
$fecha_alta = date("Y/m/d");
// Obtener los arrays de nombres y idpersona enviados por POST
$pdis = $_POST['pdis'];
// Recorrer los arrays y mostrar cada persona
for($k = 0; $k < count($pdis); $k++) {
    if(!empty($pdis[$k])) {
        $pditraslado = $pdis[$k];
        $addpdistraslado = "INSERT INTO react_pdi_traslado(id_traslado, nombrepdi, usuario, fecha_alta)
        VALUES ('$id_traslado', '$pditraslado', '$usuario', '$fecha_alta')";
        $raddpdistraslado = $mysqli->query($addpdistraslado);
    }
}
// redireccionar a la pagina de registro de traslado
if($raddpdistraslado){
  echo ("<script type='text/javaScript'>
   window.location.href='add_traslado.php';
   window.alert('!!!!!Registro exitoso¡¡¡¡¡')
 </script>");
}
?>
