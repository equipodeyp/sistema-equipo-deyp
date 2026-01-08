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
  $ppl = $_POST['MOD_DOMICILIO'];
  if ($ppl == 'NO') {
    $idestado = $_POST['cbx_estado1'];
    $idmunicipio = $_POST['cbx_municipio11'];
    $localidad = strtoupper($_POST['localidadrad']);
    $calle = strtoupper($_POST['CALLE']);
    $cp = $_POST['CP'];
    // get nombre de estado de t_estado
    $name_estado = "SELECT * FROM t_estado WHERE id_estado = '$idestado'";
    $rname_estado = $mysqli ->query($name_estado);
    $fname_estado = $rname_estado ->fetch_assoc();
    $nombre_estado = $fname_estado['estado'];
    // get nombre de municipio de t_municipio
    $name_municipio = "SELECT * FROM t_municipio WHERE id_municipio = '$idmunicipio' AND id_estado = '$idestado'";
    $rname_municipio = $mysqli ->query($name_municipio);
    $fname_municipio = $rname_municipio ->fetch_assoc();
    $nombre_municipio = $fname_municipio['municipio'];
    // upsate domicilio actual persona de tabla domiciliopersona
    $uptdomiciliopersona = "UPDATE domiciliopersona SET seleccioneestado ='$nombre_estado', seleccionemunicipio='$nombre_municipio', seleccionelocalidad ='$localidad',
                                                        calle ='$calle', cp ='$cp', lugar = '$ppl', criterio  =''
                            WHERE id_persona = '$id_persona'";
    $ruptdomiciliopersona = $mysqli->query($uptdomiciliopersona);
  }else {
    $idcentropenitenciario = $_POST['RECLUSORIO1'];
    // get info del centro PENITENCIARIO
    $getinfocentropenal = "SELECT * FROM reclusorios WHERE id = '$idcentropenitenciario'";
    $rgetinfocentropenal = $mysqli ->query($getinfocentropenal);
    $fgetinfocentropenal = $rgetinfocentropenal ->fetch_assoc();
    $cpen = $fgetinfocentropenal['denominacion'];
    $centropenitenciario = strtoupper($cpen);
    $municipiocentropenal =$fgetinfocentropenal['direccion'];
    $muncentrop =strtoupper($municipiocentropenal);
    $criterio = $_POST['criterio_oportunidad'];
    if ($criterio == 'OTORGADO') {
      $datecriterio = $_POST['fecha_cr_opor'];
      // upsate domicilio actual persona de tabla domiciliopersona
      $uptdomiciliopersona = "UPDATE domiciliopersona SET seleccioneestado ='$centropenitenciario', seleccionemunicipio='$muncentrop', lugar = '$ppl', criterio ='$criterio',
                                                          fecha_criterio ='$datecriterio'
                              WHERE id_persona = '$id_persona'";
      $ruptdomiciliopersona = $mysqli->query($uptdomiciliopersona);
    }else {
      // upsate domicilio actual persona de tabla domiciliopersona
      $uptdomiciliopersona = "UPDATE domiciliopersona SET seleccioneestado ='$centropenitenciario', seleccionemunicipio='$muncentrop', lugar = '$ppl', criterio ='$criterio'
                              WHERE id_persona = '$id_persona'";
      $ruptdomiciliopersona = $mysqli->query($uptdomiciliopersona);
    }
  }
  if ($ruptdomiciliopersona) {
    echo ("<script type='text/javaScript'>
     window.location.href='../detalles_persona.php?folio=$id_persona';
     window.alert('!!!!!ACTUALIZACIÓN EXITOSA¡¡¡¡¡')
   </script>");
  }
}
?>
