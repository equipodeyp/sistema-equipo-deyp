<?php
// error_reporting(0);
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
  $id_persona = $_GET['folio'];  //variable del folio al que se relaciona
  // echo $id_persona;
  $estatus= $_POST['ESTATUS_PERSONA'];
  // echo $estatus;
  // datos de la determinacion de la INCORPORACION
  $multidisciplinario=$_POST['ANALISIS_MULTIDISCIPLINARIO'];
  // echo $multidisciplinario;
  $incorporacion=$_POST['INCORPORACION'];
  $date_aut =$_POST['FECHA_AUTORIZACION'];
  $id_analisis =$_POST['id_analisis'];
  $convenio= $_POST['CONVENIO_ENTENDIMIENTO'];
  $fecha_conv_ent =$_POST['FECHA_CONVENIO_ENTENDIMIENTO'];
  $fecha_inicio = $_POST['fecha_inicio'];
  // echo $fecha_inicio;
  $vigencia=$_POST['VIGENCIA_CONVENIO'];
  if ($fecha_inicio != '' && $vigencia != '') {
    $fecha_vigencia = date("Y/m/d",strtotime($fecha_inicio."+ $vigencia days"));
    $fecha_termino = date("d/m/Y",strtotime($fecha_vigencia."- 1 days"));
    $fecha_finalconvenio = date("Y/m/d",strtotime($fecha_vigencia."- 1 days"));
  }else {
    $fecha_inicio = '';
    $vigencia = '';
    $fecha_termino = '';
    $fecha_finalconvenio = '';
  }
  $id_convenio=$_POST['id_convenio'];
  $acuerdo =$_POST['CONCLUSION_CANCELACION_EXP'];
  if ($acuerdo=='CONCLUSION') {
    $conclusionart35=$_POST['CONCLUSION_ART35z'];
    if ($conclusionart35 == '') {
      $conclusionart35=$_POST['CONCLUSION_ART351'];
    }
    if ($conclusionart35 == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
      $otherart35=$_POST['OTHER_ART351'];
      if ($otherart35 === '') {
        $otherart35=$_POST['OTHER_ART351'];
      }
    }else {
      $otherart35 ='';
    }
  }else {
    $conclusionart35='';
  }
  // echo $otherart35;
  $otherart35=$_POST['OTHER_ART351'];
  $date_des =$_POST['FECHA_DESINCORPORACION'];
  $mot_inc=$_POST['MOTIVO_NO_INCORPORACION'];

  // datos del comentario
  $comment = $_POST['COMENTARIO'];

  $mun_del= "SELECT id, nombre, clave FROM municipios WHERE clave = '$municipio_r'";
  $r_mu = $mysqli->query($mun_del);
  $ro_muni=$r_mu->fetch_assoc();
  $name_muni_del=$ro_muni['nombre'];

  $est_per= "SELECT id, nombre, descripcion FROM estatuspersona WHERE id = '$estatus'";
  $r_estatus = $mysqli->query($est_per);
  $ro_est_per=$r_estatus->fetch_assoc();
  $name_estatus=$ro_est_per['nombre'];

  $img=" SELECT * FROM datospersonales WHERE id='$id_persona'";
  $res_img = $mysqli->query($img);
  $edit_row=$res_img->fetch_assoc();

  $imgFile = $_FILES['user_image']['name'];
	$tmp_dir = $_FILES['user_image']['tmp_name'];
	$imgSize = $_FILES['user_image']['size'];
  if($imgFile)
	{
		$upload_dir = '../imagenesbdd/'; // upload directory
		$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		$userpic = rand(1000,1000000).".".$imgExt;
		if(in_array($imgExt, $valid_extensions))
		{
			if($imgSize < 1000000)
			{
				unlink($upload_dir.$edit_row['Imagen_Img']);
				move_uploaded_file($tmp_dir,$upload_dir.$userpic);
			}
			else
			{
				$errMSG = "Su archivo es demasiado grande mayor a 1MB";
			}
		}
		else
		{
			$errMSG = "Solo archivos JPG, JPEG, PNG & GIF .";
		}
	}
	else
	{
		// if no image selected the old image remain as it is.
		$userpic = $edit_row['foto']; // old image from database
	}
  ////////////////////////////////////////////////////////////////////////////////////////////////////////
  // consultar primero la informacion de los selects para poder actualizar
  $check_det_incor = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_persona'";
  $res_check_det_incor = $mysqli->query($check_det_incor);
  $filachk = $res_check_det_incor->fetch_assoc();
  // echo $filachk['multidisciplinario'];
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if ($filachk['multidisciplinario'] === 'EN ELABORACION' || $filachk['multidisciplinario'] === '') {
      $det_inc = "UPDATE determinacionincorporacion SET multidisciplinario='$multidisciplinario', date_autorizacion = '$date_aut', id_analisis = '$id_analisis'
      WHERE id_persona = '$id_persona'";
      $res_det_inc = $mysqli->query($det_inc);
  }
  if ($filachk['incorporacion'] === '') {
    $det_inc = "UPDATE determinacionincorporacion SET incorporacion = '$incorporacion' WHERE id_persona = '$id_persona' ";
    $res_det_inc = $mysqli->query($det_inc);
  }
  if ($filachk['convenio'] === '' || $filachk['convenio'] === 'PENDIENTE DE EJECUCION') {
    $det_inc = "UPDATE determinacionincorporacion SET convenio='$convenio', vigencia = '$vigencia', date_convenio = '$fecha_conv_ent', fecha_inicio = '$fecha_inicio',
                                                      fecha_termino = '$fecha_termino', id_convenio = '$id_convenio', fecha_vigencia = '$fecha_finalconvenio'
                                                  WHERE id_persona = '$id_persona' ";
    $res_det_inc = $mysqli->query($det_inc);
    // agregar a la tabla aletras de convenio los datos del sujeto incorporado
    $check_detos_suj_alerta = "SELECT * FROM datospersonales WHERE id = '$id_persona'";
    $res_check_detos_suj_alerta = $mysqli->query($check_detos_suj_alerta);
    $fcheck_detos_suj_alerta = $res_check_detos_suj_alerta->fetch_assoc();
    // obteniendo datos del sujeto
    $fol_expediente = $fcheck_detos_suj_alerta['folioexpediente'];
    $id_unico = $fcheck_detos_suj_alerta['identificador'];
    $estatus_suj_alert = 'PENDIENTE';
    $tipo_convenio_alert = 'CONVENIO DE ENTENDIMIENTO';
    // sql para agregar registro en la tabla de alerta de convenios
    $alert_conv = "INSERT INTO alerta_convenios(expediente, id_persona, id_unico, fecha_inicio, fecha_termino, estatus, tipo_convenio)
                          VALUES('$fol_expediente', '$id_persona', '$id_unico', '$fecha_inicio', '$fecha_finalconvenio', '$estatus_suj_alert', '$tipo_convenio_alert')";
    $ralert_conv = $mysqli ->query($alert_conv);
  }
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  $estatus_per = "SELECT * FROM datospersonales WHERE id='$id_persona'";
  $res_estatus_pe = $mysqli->query($estatus_per);
  $fila_estatus_per = $res_estatus_pe->fetch_assoc();
  $folioexpediente_persona = $fila_estatus_per['folioexpediente'];
  // echo $fila_estatus_per['estatus'];
  if ($fila_estatus_per['estatus'] === 'PERSONA PROPUESTA' || $fila_estatus_per['estatus'] === 'SUJETO PROTEGIDO' || $fila_estatus_per['estatus'] === '') {
    $datos_persona = "UPDATE datospersonales SET estatus='$estatus'  WHERE id = '$id_persona'";
    $res_dat_per = $mysqli->query($datos_persona);
  }
  $det_inc = "UPDATE determinacionincorporacion SET conclu_cancel='$acuerdo', conclusionart35='$conclusionart35', otroart35='$otherart35', date_desincorporacion='$date_des' WHERE id_persona = '$id_persona' ";
  $res_det_inc = $mysqli->query($det_inc);
  // insertar comentarios de cambios
  $comment_mascara = '3';
  $fechacomentario = date('y/m/d');
  if ($comment != '') {
    $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_persona, id_medida, fecha)
                  VALUES ('$comment', '$folioexpediente_persona', '$comment_mascara', '$name', '$id_persona', '$id_medida', '$fechacomentario')";
    $res_comment = $mysqli->query($comment);
  }

  $statuspersonaprogram = $_POST['statusprogrampersona'];
  echo $statuspersonaprogram;
  echo "<br>";
  if ($statuspersonaprogram != '') {
    echo 'ACTIVO';
    $datos_personastatusprog = "UPDATE datospersonales SET estatusprograma='ACTIVO'  WHERE id = '$id_persona'";
    $res_dat_per_statusprog = $mysqli->query($datos_personastatusprog);
  }else {
    echo 'INACTIVO';
    $datos_personastatusprog = "UPDATE datospersonales SET estatusprograma='INACTIVO'  WHERE id = '$id_persona'";
    $res_dat_per_statusprog = $mysqli->query($datos_personastatusprog);
  }

  if (isset($_POST["statusprogrampersona"])) {
   echo $_POST["statusprogrampersona"];
} else {
   echo "error";
}
  // echo $estatus;
  // echo $id_persona;
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // $det_inc = "UPDATE determinacionincorporacion SET multidisciplinario='$multidisciplinario' WHERE id_persona = '$id_persona'";
  // $res_det_inc = $mysqli->query($det_inc);
  // validacion de update correcto
  if($res_det_inc){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_estadistica_y_preregistro/detalles_persona.php?folio=$id_persona';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
