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
  $idestado = $_POST['cbx_estado'];

  // update datos de lugar de origen
  if ($idestado == '33') {
    $nombre_estado = 'OTRO';
    $nombre_municipio = $_POST['OTHER_PAIS'];
    $uptlugarnacimientopersona = "UPDATE datosorigen SET lugardenacimiento ='$nombre_estado', municipiodenacimiento='$nombre_municipio'
                                  WHERE id_persona = '$id_persona'";
    $ruptlugarnacimientopersona = $mysqli->query($uptlugarnacimientopersona);
  }else {
    $idmunicipio = $_POST['cbx_municipio'];
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

    $uptlugarnacimientopersona = "UPDATE datosorigen SET lugardenacimiento ='$nombre_estado', municipiodenacimiento='$nombre_municipio'
                                  WHERE id_persona = '$id_persona'";
    $ruptlugarnacimientopersona = $mysqli->query($uptlugarnacimientopersona);
  }
  if ($ruptlugarnacimientopersona) {
    echo ("<script type='text/javaScript'>
     window.location.href='../detalles_persona.php?folio=$id_persona';
     window.alert('!!!!!ACTUALIZACIÓN EXITOSA¡¡¡¡¡')
   </script>");
  }
}
?>
