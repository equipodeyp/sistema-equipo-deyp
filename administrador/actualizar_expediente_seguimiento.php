<?php
// error_reporting(0);
require 'conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  $conexion=mysqli_connect("localhost","root","","sistemafgjem");
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datsos
  $folio_expediente = $_GET['folio'];   //variable del folio al que se relaciona
  echo $folio_expediente;
  // analisis del expediente
  $personas_propuestas = $_POST['personas_propuestas'];
  $analisis = $_POST['ANALISIS_MULTIDISCIPLINARIO'];
  $incorporacion = $_POST['INCORPORACION'];
  $fecha_analisis = $_POST['FECHA_AUTORIZACION_ANALISIS'];
  $id_analisis = $_POST['id_analisis'];
  $convenio = $_POST['CONVENIO_DE_ENTENDIMIENTO'];
  $fecha_convenio = $_POST['FECHA_CONVENIO_ENTENDIMIENTO'];
  $fecha_inicio = $_POST['fecha_inicio'];
  // echo $fecha_inicio;
  $vigencia = $_POST['VIGENCIA_CONVENIO'];
  if ($fecha_inicio != '' && $vigencia !== '') {
    $fecha_vigencia = date("Y/m/d",strtotime($fecha_inicio."+ $vigencia days"));
    $fecha_termino = date("Y/m/d",strtotime($fecha_vigencia."- 1 days"));
    // code...
  }else {
    $fecha_termino = '';
  }

  // $id_convenio= $_POST['id_convenio'];
  $personas_incorporadas = $_POST['personas_incorporadas'];
  $total_convenios = $_POST['num_convenio'];
  if ($analisis==='EN ELABORACION') {
    $incorporacion = '';
  }


  $actualizar_medida = "UPDATE analisis_expediente SET analisis = '$analisis', incorporacion='$incorporacion',fecha_analisis ='$fecha_analisis',id_analisis = '$id_analisis',
  convenio = '$convenio',fecha_convenio ='$fecha_convenio',fecha_inicio ='$fecha_inicio',vigencia = '$vigencia',num_convenios = '$total_convenios'
  WHERE folioexpediente = '$folio_expediente'";
  $res_actualizar_medida = $mysqli->query($actualizar_medida);
  // convenio de adhesion del expediente

  //convenio modificatorio del EXPEDIENTE
  // seguimiento del expediente
  $concl_canc = $_POST['CONCLUSION_CANCELACION'];
  $conclu_art = $_POST['CONCLUSION_ART35'];
  $otro_art = $_POST['OTHER_ART351'];
  if ($otro_art == '') {
    $otro_art = $_POST['OTHER_ART3512'];
  }
  $fecha_desincorporacion = $_POST['FECHA_DESINCORPORACION'];
  $estatus_exp = $_POST['ESTATUS_EXPEDIENTE'];



  $actualizar_med = "UPDATE statusseguimiento SET conclu_cancel = '$concl_canc',conclusionart35 = '$conclu_art', otherart35 = '$otro_art',
  date_desincorporacion = '  $fecha_desincorporacion',  status ='$estatus_exp'
  WHERE folioexpediente = '$folio_expediente'";
  $res_actualizar_med = $mysqli->query($actualizar_med);

//,
  // fuente del seguimiento del expediente



  // variables de los comentarios
  $comment = $_POST['COMENTARIO'];
  $comment_mascara = '3';
  date_default_timezone_set("America/Mexico_City");
  $fecha_captura = date('y/m/d H:i:sa');

  // insertar comentarios de cambios
  if ($comment != '') {
    $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, fecha)
                  VALUES ('$comment', '$folio_expediente', '$comment_mascara', '$name', '$fecha_captura')";
    $res_comment = $mysqli->query($comment);
  }

    // validacion del update correcto
  if($res_actualizar_med){
    echo ("<script type='text/javaScript'>
     window.location.href='../administrador/detalles_seguimiento.php?folio=$folio_expediente';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
