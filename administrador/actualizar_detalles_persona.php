<?php
error_reporting(0);
require 'conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  // echo $verifica_update_person;
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datos
  $id_persona = $_GET['id'];  //variable del folio al que se relaciona
  // echo $id_persona ;
  // datos de la autoridad
  
  $MULTIDISCIPLINARIO = $_POST['analisis_m'];
  $FECHA_AUTORIZACION = $_POST['fecha_auto'];
  $ID_ANALSIIS = $_POST['id_analisis'];
  $TIPO_CONVENIO = $_POST['tipo_convenio'];
  $FECHA_FIRMA = $_POST['fecha_firma'];
  $FECHA_INICIO = $POST['fecha_inicio'];
  $VIGENCIA_CONVENIO = $_POST['vigencia'];
  $FECHA_TERMINO = $_POST['fecha_termino'];
  $ID_CONVENIO = $_POST['id_convenio'];
  $OBSERVACIONES = $_POST['observaciones'];

// UPDATE 
/////////////////////////////
  $datos_persona = "UPDATE evaluacion_persona SET analisis ='$MULTIDISCIPLINARIO', fecha_aut='$FECHA_AUTORIZACION', id_analisis='$ID_ANALSIIS', 
                    tipo_convenio='$TIPO_CONVENIO', fecha_firma='$FECHA_FIRMA', fecha_inicio='$FECHA_INICIO', vigencia='$VIGENCIA_CONVENIO', 
                    fecha_vigencia='$FECHA_TERMINO', id_convenio='$ID_CONVENIO', observaciones='$OBSERVACIONES' WHERE id = '$id_persona'";
                    $res_dat_per = $mysqli->query($datos_persona);



  // validacion de update correcto
  if($res_dat_per){
    echo ("<script type='text/javaScript'>
     window.location.href='../administrador/detalles_convenio_pers.php?id=$id_persona';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}
else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
