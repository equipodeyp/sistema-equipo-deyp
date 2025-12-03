<?php
error_reporting(0);
require '../conexion.php';
session_start ();
$verifica = $_SESSION["verifica"];
if ($verifica == 1) {
    unset($_SESSION['verifica']);
    $name = $_SESSION['usuario'];

$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$resultado = $mysqli->query($sentencia);
$row=$resultado->fetch_assoc();




$folio_expediente=$_POST['folio_expediente'];


$query = "INSERT INTO solicitud_asistencia (folio_expediente)
VALUES ('$folio_expediente')";
$result = $mysqli->query($query);



    if($result) {
            echo $verifica;
            echo ("<script type='text/javaScript'>
            window.location.href='./add_traslado.php';
            window.alert('!!!!!Registro exitoso¡¡¡¡¡')
        </script>");
            } else {  }
    } else {
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
}
?>
