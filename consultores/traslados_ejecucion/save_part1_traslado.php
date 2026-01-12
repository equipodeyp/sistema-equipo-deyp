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
  $especifiquelugarsalida =strtoupper($_POST['especifiquelugarsalida']);
  $especifiquedomiciliosalida =strtoupper($_POST['especifiquedomiciliosalida']);
  $especifiquemunicipiosalida =strtoupper($_POST['especifiquemunicipiosalida']);
  $hora_salida = $_POST['horasalida'];
  $hora_llegada = $_POST['horallegada'];
  $kilometros_recorridos = $_POST['kilometrosrecorridos'];
  $fecha_alta = date('y/m/d');
  $year_alta = date('Y');

  $getlugarsalida = "SELECT * FROM react_traslados_lugar WHERE lugar = '$lugar_salida'";
  $rgetlugarsalida = $mysqli->query($getlugarsalida);
  $fgetlugarsalida = $rgetlugarsalida->fetch_assoc();
  $fgetlugarsalida['lugar'];
  $idanterior = $fgetlugarsalida['id'];
  if ($lugar_salida === 'OTRO') {
        $updateid_otro = $fgetlugarsalida['id'] + 1;
        $updatelugarid_otro = "UPDATE react_traslados_lugar SET id = '$updateid_otro' WHERE lugar = 'OTRO'";
        $res_updatelugarid_otro = $mysqli->query($updatelugarid_otro);
        //
        $actualizartablelugarsalida = "INSERT INTO react_traslados_lugar(id, lugar, domicilio, municipio)
                VALUES ('$idanterior', '$especifiquelugarsalida', '$especifiquedomiciliosalida', '$especifiquemunicipiosalida')";
        $ractualizartablelugarsalida = $mysqli->query($actualizartablelugarsalida);
        // inserccion a la tabla de traslados de la bd
        $addtraslado = "INSERT INTO react_traslados(idtrasladounico,fecha, lugar_salida, domicilio_salida, municipio_salida, hora_salida, hora_llegada, kilometros, usuario, fecha_alta, year)
                VALUES ('$id_traslado_unico', '$fecha_traslado', '$especifiquelugarsalida', '$especifiquedomiciliosalida', '$especifiquemunicipiosalida', '$hora_salida', '$hora_llegada', '$kilometros_recorridos', '$name', '$fecha_alta', '$year_alta')";
        $raddtraslado = $mysqli->query($addtraslado);
  }else {
    $lugarsaltable = $fgetlugarsalida['lugar'];
    $domiciliosaltable = $fgetlugarsalida['domicilio'];
    $municipiosaltable = $fgetlugarsalida['municipio'];
    $addtraslado = "INSERT INTO react_traslados(idtrasladounico,fecha, lugar_salida, domicilio_salida, municipio_salida, hora_salida, hora_llegada, kilometros, usuario, fecha_alta, year, num_consecutivo)
            VALUES ('$id_traslado_unico', '$fecha_traslado', '$lugarsaltable', '$domiciliosaltable', '$municipiosaltable', '$hora_salida', '$hora_llegada', '$kilometros_recorridos', '$name', '$fecha_alta', '$year_alta', '$id_traslado_unico')";
    $raddtraslado = $mysqli->query($addtraslado);
  }
  // traer el id del traslado capturado
  $qry = "select max(ID) As id from react_traslados";
  $result = $mysqli->query($qry);
  $row = $result->fetch_assoc();
  $id_traslado =$row["id"];
  // observaciones del traslado
  $observaciones = strtoupper($_POST['observaciones']);
  // insercciona  la tabla de destinos de4 la bd
  $addobservacionestraslado = "INSERT INTO react_observaciones_traslado(id_traslado, observacion, fecha_alta, usuario)
                                      VALUES ('$id_traslado', '$observaciones', '$fecha_alta', '$name')";
  $raddobservacionestraslado = $mysqli->query($addobservacionestraslado);
  // validacion de update correcto
  if($raddtraslado){
    echo ("<script type='text/javaScript'>
     window.location.href='../traslados_ejecucion/add_trasladonext2.php?id_traslado=$id_traslado';
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../../consultores/admin.php'>";
}
?>
