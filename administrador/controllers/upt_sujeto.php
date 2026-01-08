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
  $curp = strtoupper($_POST['CURP_PERSONA']);
  $rfc = strtoupper($_POST['RFC_PERSONA']);
  $alias = strtoupper($_POST['ALIAS_PERSONA']);
  $ocupacion = strtoupper($_POST['OCUPACION_PERSONA']);
  $tel_fijo = $_POST['TELEFONO_FIJO'];
  $tel_celular = $_POST['TELEFONO_CELULAR'];
  $calidad_procedimiento = strtoupper($_POST['CALIDAD_PERSONA_PROCEDIMIENTO']);
  if ($calidad_procedimiento == 'OTROS') {
    $othercal_proc = strtoupper($_POST['calprocesoother']);
  }
  $calidad_programa = strtoupper($_POST['CALIDAD_PERSONA']);
  $incapaz = strtoupper($_POST['INCAPAZ']);
  if ($incapaz == 'SI') {
    $nombretutor = strtoupper($_POST['TUTOR_NOMBRE1']);
    $a_paternotutor = strtoupper($_POST['TUTOR_PATERNO1']);
    $a_maternotutor = strtoupper($_POST['TUTOR_MATERNO1']);
  }
  // get info sujeto datospersonales
  $getinfosuj = "SELECT * FROM datospersonales WHERE id = '$id_persona'";
  $rgetinfosuj = $mysqli->query($getinfosuj);
  $fgetinfosuj = $rgetinfosuj ->fetch_assoc();
  $folioexpediente = $fgetinfosuj['folioexpediente'];
  // get info exist date of person
  $getinfotutor = "SELECT * FROM tutor WHERE id_persona = '$id_persona'";
  $rgetinfotutor = $mysqli->query($getinfotutor);
  if ($rgetinfotutor && $rgetinfotutor->num_rows > 0) {
    echo "si tiene";
    $upttutor = "UPDATE tutor SET nombre ='$nombretutor', apellidopaterno='$a_paternotutor', apellidomaterno='$a_maternotutor'
                  WHERE id_persona = '$id_persona'";
    $rupttutor = $mysqli->query($upttutor);
  } else {
    echo "no tiene";
    $addtutor = "INSERT INTO tutor (nombre, apellidopaterno, apellidomaterno, folioexpediente, id_persona)
              VALUES ('$nombretutor', '$a_paternotutor', '$a_maternotutor', '$folioexpediente', '$id_persona')";
    $raddtutor = $mysqli->query($addtutor);
  }
  $uptdatospersonales = "UPDATE datospersonales SET calidadpersona ='$calidad_programa', calidadprocedimiento='$calidad_procedimiento', especifique='$othercal_proc',
                                                    curppersona ='$curp', rfcpersona ='$rfc', aliaspersona ='$alias', ocupacion ='$ocupacion', telefonofijo ='$tel_fijo',
                                                    telefonocelular ='$tel_celular', incapaz ='$incapaz'
                WHERE id = '$id_persona'";
  $ruptdatospersonales = $mysqli->query($uptdatospersonales);
  if ($ruptdatospersonales) {
    echo ("<script type='text/javaScript'>
     window.location.href='../detalles_persona.php?folio=$id_persona';
     window.alert('!!!!!ACTUALIZACIÓN EXITOSA¡¡¡¡¡')
   </script>");
  }
}
?>
