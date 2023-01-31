<?php



error_reporting(0);
require 'conexion.php';
session_start ();
$verifica = $_SESSION["verifica"];
if ($verifica == 1) {
  unset($_SESSION['verifica']);
  $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();

  $fol_exp = $_GET['folio'];
  // echo $fol_exp;
  $sql = "SELECT * FROM expediente WHERE fol_exp = '$fol_exp'";
  $resultado = $mysqli->query($sql);
  $row = $resultado->fetch_array(MYSQLI_ASSOC);

  $folio_reporte = $_POST['folio_reporte'];
  // $folio_expediente = $_POST['folio_expediente'];
  $usuario = $_POST['usuario'];
  $subdireccion_usuario = $_POST['subdireccion'];
  $tipo_error = $_POST['tipo'];
  $descripcion_error = $_POST['descripcion'];
  $status = $_POST['estatus'];
  $atencion_usuario =$_POST['atencion'];

  date_default_timezone_set('UTC');
  date_default_timezone_set("America/Mexico_City");
  $hoy = date("d-m-Y H:i:s a");  
  // echo $hoy; 

  $query = "INSERT INTO tickets (folio_reporte, folio_expediente, usuario, subdireccion, usuario_atencion, tipo, descripcion, estatus)
  VALUES ('$folio_reporte', '$fol_exp', '$usuario', '$subdireccion_usuario', '$atencion_usuario', '$tipo_error', '$descripcion_error', '$status')";
  $result = $mysqli->query($query);

  $folio_incidencia = $_POST["folio_reporte"];
  $folio_expediente = $_POST["folio_expediente"];
  $nombre_usuario = $_POST["usuario"];
  $subdireccion = $_POST["subdireccion"];
  $descripcion = $_POST["descripcion"];


 

  $sent=" SELECT id, folio_expediente FROM tickets WHERE folio_expediente='$folio_expediente'";
  $resu = $mysqli->query($sent);
  $ro=$resu->fetch_assoc();
  $folio=$ro["fol_exp"];

  if($result) {

    echo $verifica;
    echo ("<script type='text/javaScript'>
              window.location.href='../subdireccion_de_estadistica_y_preregistro/tickets.php?folio=$fol_exp';
              window.alert('!!!!!Registro exitoso¡¡¡¡¡')
              </script>");
      
    }
}
?>
