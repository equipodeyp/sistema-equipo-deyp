<?php
// error_reporting(0);
require 'conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datsos
  $id_convenio_ind = $_GET['id'];  //variable del id de la medida
  $tipo_convenio = $_POST['tipo_convenio'];
  //echo $tipo_convenio;
  $fecha_firma = $_POST['fecha_firma'];
  //echo $fecha_firma;
  $fecha_inicio = $_POST['fecha_inicio'];
  // echo $fecha_inicio;
  $vigencia = $_POST['vigencia'];
  // echo $vigencia;
  // obtener fecha de la vigencia en automatico
  if ($fecha_inicio != '') {
    $fecha_mas = date("Y/m/d",strtotime($fecha_inicio."+ $vigencia days"));
    $fecha_vigencia = date("Y/m/d",strtotime($fecha_mas."- 1 days"));
  }
  // echo $fecha_vigencia;
  $id_convenio = $_POST['id_convenio'];
  // echo $id_convenio;
  $observaciones = $_POST['observaciones'];
  // echo $observaciones;
  $usuario =$name;
  // echo $usuario;
  date_default_timezone_set("America/Mexico_City");
  $fecha_modificacion = date('Y/m/d');
  $act_eva_ind = "UPDATE evaluacion_persona SET  tipo_convenio= '$tipo_convenio', fecha_firma = '$fecha_firma', fecha_inicio = '$fecha_inicio', vigencia = '$vigencia', fecha_vigencia = '$fecha_vigencia',
                                                 id_convenio = '$id_convenio', observaciones = '$observaciones', fecha_modificacion = '$fecha_modificacion', usuario_mod = '$usuario' WHERE id = '$id_convenio_ind'";
  $res_act_eva_ind = $mysqli->query($act_eva_ind);
  // validacion de update correcto
  if($res_act_eva_ind){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_estadistica_y_preregistro/detalles_convenio_pers.php?id=$id_convenio_ind';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
