<?php
include("../conexion.php");
session_start ();
$id_traslado = $_GET['id_traslado'];
$usuario = $_SESSION['usuario'];
$fecha_alta = date("Y/m/d");
// Obtener los arrays de nombres y idpersona enviados por POST
$folexp = $_POST['nombre'];
$idpersona = $_POST['id_sujeto'];
$resguardo = $_POST['resguardo'];
// Recorrer los arrays y mostrar cada persona
for($i = 0; $i <= count($folexp); $i++) {
    if(!empty($folexp[$i])) {
        $folioexpediente = $folexp[$i];
        $nombresujeto = $idpersona[$i];
        $resguardado = $resguardo[$i];
        $addsujetosentraslado = "INSERT INTO react_sujetos_traslado(id_traslado, folio_expediente, id_sujeto, resguardado, usuario, fecha_alta)
        VALUES ('$id_traslado', '$folioexpediente', '$nombresujeto', '$resguardado', '$usuario', '$fecha_alta')";
        $raddsujetosentraslado = $mysqli->query($addsujetosentraslado);
    }
}

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
if($raddsujetosentraslado){
  echo ("<script type='text/javaScript'>
   window.location.href='../admin.php';
   window.alert('!!!!!Registro exitoso¡¡¡¡¡')
 </script>");
}
?>
