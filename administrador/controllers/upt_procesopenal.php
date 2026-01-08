<?php
// error_reporting(0);
require '../conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  // echo $verifica_update_person;
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  $id_persona = $_GET['idpersona'];
  $delprimary = $_POST['DELITO_PRINCIPAL'];
  if ($delprimary == 'OTRO') {
    $otherdelprimary = strtoupper($_POST['OTRO_DELITO_PRINCIPAL1']);
  }else {
    $otherdelprimary = '';
  }
  $delsecondary = $_POST['DELITO_SECUNDARIO'];
  if ($delsecondary == 'OTRO') {
    $otherdelsecondary = strtoupper($_POST['OTRO_DELITO_SECUNDARIO1']);
  }else {
    $otherdelsecondary = '';
  }
  $etapaproc = $_POST['ETAPA_PROCEDIMIENTO'];
  $nuc = strtoupper($_POST['NUC']);
  $mun_radicacioncarpeta = $_POST['MUNICIPIO_RADICACION'];
  // upsate proceso penal de la persona de tabla procesopenal
  $uptprocesopenalpersona = "UPDATE procesopenal SET delitoprincipal ='$delprimary', otrodelitoprincipal='$otherdelprimary', delitosecundario = '$delsecondary',
                                    otrodelitosecundario ='$otherdelsecondary', etapaprocedimiento ='$etapaproc', nuc ='$nuc', numeroradicacion ='$mun_radicacioncarpeta'
                             WHERE id_persona = '$id_persona'";
  $ruptprocesopenalpersona = $mysqli->query($uptprocesopenalpersona);
  if ($ruptprocesopenalpersona) {
    echo ("<script type='text/javaScript'>
     window.location.href='../detalles_persona.php?folio=$id_persona';
     window.alert('!!!!!PROCESO PENAL ACTUALIZADO¡¡¡¡¡')
   </script>");
  }
}
?>
