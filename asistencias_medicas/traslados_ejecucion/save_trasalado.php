<?php
error_reporting(0);
date_default_timezone_set("America/Mexico_City");
session_start ();
require '../conexion.php';
$check_traslado = $_SESSION["check_traslado"];
if ($check_traslado == 1) {
  unset($_SESSION['check_traslado']);
  $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datsos
  $id_traslado_unico = $_POST['idtraslado'];
  $fecha_traslado = $_POST['fechatraslado'];
  $lugar_salida = $_POST['lugarsalida'];
  $domicilio_salida = $_POST['domiciliosalida'];
  $municipio_salida = $_POST['municipiosalida'];
  $hora_salida = $_POST['horasalida'];
  $hora_llegada = $_POST['horallegada'];
  $kilometros_recorridos = $_POST['kilometrosrecorridos'];
  $fecha_alta = date('y/m/d');
  $year_alta = date('Y');
  // inserccion a la tabla de traslados de la bd
  $addtraslado = "INSERT INTO react_traslados(idtrasladounico,fecha, lugar_salida, domicilio_salida, municipio_salida, hora_salida, hora_llegada, kilometros, usuario, fecha_alta, year)
          VALUES ('$id_traslado_unico', '$fecha_traslado', '$lugar_salida', '$domicilio_salida', '$municipio_salida', '$hora_salida', '$hora_llegada', '$kilometros_recorridos', '$name', '$fecha_alta', '$year_alta')";
  $raddtraslado = $mysqli->query($addtraslado);
  // traer el id del traslado capturado
  $qry = "select max(ID) As id from react_traslados";
  $result = $mysqli->query($qry);
  $row = $result->fetch_assoc();
  $id_traslado =$row["id"];
  // observaciones del traslado
  $observaciones = $_POST['observaciones'];
  // insercciona  la tabla de destinos de4 la bd
  $addobservacionestraslado = "INSERT INTO react_observaciones_traslado(id_traslado, observacion, fecha_alta, usuario)
                                      VALUES ('$id_traslado', '$observaciones', '$fecha_alta', '$name')";
  $raddobservacionestraslado = $mysqli->query($addobservacionestraslado);
  // datos de los destinos del traslado
  $lugar_destino = $_POST['lugardestino'];
  $domicilio_destino = $_POST['domiciliodestino'];
  $municipio_destino = $_POST['municipiodestino'];
  $motivo_traslado = $_POST['motivotraslado'];
  // Recorrer los arrays y mostrar cada destino
  for($k = 0; $k < count($lugar_destino); $k++) {
      if(!empty($lugar_destino[$k])) {
          $lugardes = $lugar_destino[$k];
          $domdes = $domicilio_destino[$k];
          $mundes = $municipio_destino[$k];
          $motdes = $motivo_traslado[$k];
          // insercciona  la tabla de destinos de4 la bd
          $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                     VALUES ('$id_traslado', '$lugardes', '$domdes', '$mundes', '$motdes', '$fecha_alta', '$name')";
          $radddestinotraslado = $mysqli->query($adddestinotraslado);
      }
  }
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
