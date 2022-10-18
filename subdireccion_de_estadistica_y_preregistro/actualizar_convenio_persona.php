<?php
error_reporting(0);
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
  
  // variables para la carga de la informacion
  $getvars = "SELECT * FROM evaluacion_persona WHERE id = '$id_convenio_ind' limit 1";
  $fgetvars = $mysqli->query($getvars);
  $rgetvars = $fgetvars->fetch_assoc();
   $folioexpediente = $rgetvars['folioexpediente'];

   $id_unico = $rgetvars['id_unico'];

  $getvars2 = "SELECT id FROM datospersonales WHERE identificador = '$id_unico' limit 1";
  $fgetvars2 = $mysqli->query($getvars2);
  while ($rgetvars2 = $fgetvars2->fetch_assoc()) {
     $id = $rgetvars2['id'];

    // code...
  }
  $tipo_convenio = $_POST['tipo_convenio'];
  //echo $tipo_convenio;
  $fecha_firma = $_POST['fecha_firma'];
  //echo $fecha_firma;
  $fecha_inicio = $_POST['fecha_inicio'];
  // echo $fecha_inicio;
  $vigencia = $_POST['vigencia'];
  // echo $vigencia;
  // echo $tipo_convenio.'<br />';

  if ($tipo_convenio === 'CONVENIO MODIFICATORIO') {

    $checkconvns = "SELECT COUNT(*) as t FROM evaluacion_persona WHERE folioexpediente = '$folioexpediente' AND id_unico = '$id_unico'";
    $fcheckconvns = $mysqli->query($checkconvns);
    $rcheckconvns = $fcheckconvns->fetch_assoc();

    if ($rcheckconvns['t'] > 0) {
      $checkconvns2 = "SELECT * from  evaluacion_persona WHERE folioexpediente = '$folioexpediente' AND id_unico = '$id_unico'
      AND tipo_convenio != '' ORDER BY evaluacion_persona.id DESC limit 1";
      $fcheckconvns2 = $mysqli->query($checkconvns2);
      while ($rcheckconvns2 = $fcheckconvns2->fetch_assoc()) {
          $vigencia = 0;
          $fecha_vigencia = $rcheckconvns2['fecha_vigencia'];
      }
    }else {
      $checkconvns3 = "SELECT * from  determinacionincorporacion WHERE folioexpediente = '$folioexpediente' AND id = '$id'";
      $fcheckconvns3 = $mysqli->query($checkconvns3);
      while ($rcheckconvns3 = $fcheckconvns3->fetch_assoc()) {
          $vigencia = 0;
          $orgDate = $rcheckconvns3['fecha_termino'];
         $datefin = str_replace('/', '-', $orgDate);
        $fecha_vigencia = date("Y-m-d",strtotime($datefin));
      }
    }
  }elseif ($tipo_convenio === 'CONVENIO DE ADHESIÓN') {
    if ($fecha_inicio != '') {
      $fecha_mas = date("Y/m/d",strtotime($fecha_inicio."+ $vigencia days"));
      $fecha_vigencia = date("Y/m/d",strtotime($fecha_mas."- 1 days"));
    }
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
