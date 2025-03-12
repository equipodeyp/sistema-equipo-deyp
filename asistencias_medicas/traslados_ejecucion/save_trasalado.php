<?php
// error_reporting(0);
date_default_timezone_set("America/Mexico_City");
session_start ();
require '../conexion.php';
$check_traslado = $_SESSION["check_traslado"];
if ($check_traslado == 1) {
  unset($_SESSION['check_traslado']);
  echo $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datsos
  echo "<br>";
  echo $id_traslado_unico = $_POST['idtraslado'];
  echo "<br>";
  echo $fecha_traslado = $_POST['fechatraslado'];
  echo "<br>";
  echo $lugar_salida = $_POST['lugarsalida'];
  echo "<br>";
  echo $domicilio_salida = $_POST['domiciliosalida'];
  echo "<br>";
  echo $municipio_salida = $_POST['municipiosalida'];
  echo "<br>";
  echo $hora_salida = $_POST['horasalida'];
  echo "<br>";
  echo $lugar_destino = $_POST['lugardestino'];
  echo "<br>";
  echo $domicilio_destino = $_POST['domiciliodestino'];
  echo "<br>";
  echo $municipio_destino = $_POST['municipiodestino'];
  echo "<br>";
  echo $hora_llegada = $_POST['horallegada'];
  echo "<br>";
  echo $motivo_traslado = $_POST['motivotraslado'];
  echo "<br>";
  echo $kilometros_recorridos = $_POST['kilometrosrecorridos'];
  echo "<br>";
  $fecha_alta = date('y/m/d');
  $year_alta = date('Y');

  $addtraslado = "INSERT INTO react_traslados(idtrasladounico,fecha, lugar_salida, domicilio_salida, municipio_salida, hora_salida, lugar_destino, domicilio_destino, municipio_destino, hora_llegada, motivo, kilometros, usuario, fecha_alta, year)
          VALUES ('$id_traslado_unico', '$fecha_traslado', '$lugar_salida', '$domicilio_salida', '$municipio_salida', '$hora_salida', '$lugar_destino', '$domicilio_destino', '$municipio_destino','$hora_llegada', '$motivo_traslado', '$kilometros_recorridos', '$name', '$fecha_alta', '$year_alta')";
  $raddtraslado = $mysqli->query($addtraslado);

  // traer el id del traslado capturado
  $qry = "select max(ID) As id from react_traslados";
  $result = $mysqli->query($qry);
  $row = $result->fetch_assoc();
  echo $id_traslado =$row["id"];

  // validacion de update correcto
  if($raddtraslado){
    echo ("<script type='text/javaScript'>
     window.location.href='../traslados_ejecucion/ver_traslado.php?id_traslado=$id_traslado';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../asistencias_medicas/admin.php'>";
}

?>
