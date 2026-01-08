<?php
// error_reporting(0);
require '../conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  // echo $verifica_update_person;
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  echo $id_persona = $_GET['idpersona'];
  // get folioexpediente de persona
  $getfolexppersona ="SELECT * FROM datospersonales WHERE id = '$id_persona'";
  $rgetfolexppersona = $mysqli->query($getfolexppersona);
  $fgetfolexppersona = $rgetfolexppersona ->fetch_assoc();
  $folioexpediente = $fgetfolexppersona['folioexpediente'];
  $comment = strtoupper($_POST['COMENTARIO']);
  $fecha = date('y/m/d H:i:sa');
  // add comment de vista de persona
  $addcomment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_persona, fecha)
                VALUES ('$comment', '$folioexpediente', '3', '$name', '$id_persona', '$fecha')";
  $raddcomment = $mysqli->query($addcomment);
  if ($raddcomment) {
    echo ("<script type='text/javaScript'>
     window.location.href='../seguimiento_persona.php?folio=$id_persona';
   </script>");
  }
}
?>
