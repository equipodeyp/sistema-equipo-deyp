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
$idasismedica = $_POST['asistencia_medica'];
//
$destinosuj = $_POST['checkdestino'];
// Recorrer los arrays y mostrar cada persona
for($k = 0; $k < count($destinosuj); $k++) {
    if(!empty($destinosuj[$k])) {
        $destinosujtras = $destinosuj[$k];
        $folexp.'-----'.$idpersona.'-----'.$resguardo.'-----'.$destinosujtras;
        $addsujetosentraslado = "INSERT INTO react_sujetos_traslado(id_traslado, folio_expediente, id_sujeto, resguardado, usuario, fecha_alta, id_destino, id_asistenciamedica)
        VALUES ('$id_traslado', '$folexp', '$idpersona', '$resguardo', '$usuario', '$fecha_alta', '$destinosujtras', '$idasismedica')";
        $raddsujetosentraslado = $mysqli->query($addsujetosentraslado);
    }

}
// redireccionar a la pagina de registro de traslado
if($raddsujetosentraslado){
  echo ("<script type='text/javaScript'>
   window.location.href='../traslados_ejecucion/ver_traslado.php?id_traslado=$id_traslado';
   window.alert('!!!!!Registro exitoso¡¡¡¡¡')
 </script>");
}
?>
