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
  $id_persona = $_GET['folio'];  //variable del folio al que se relaciona

  $id_solicitud =$_POST['ID_SOLICITUD'];
  $fecha_solicitud=$_POST['FECHA_SOLICITUD'];

  $nombre_servidor =$_POST['NOMBRE_SERVIDOR'];
  $paterno_servidor=$_POST['PATERNO_SERVIDOR'];
  $materno_servidor=$_POST['MATERNO_SERVIDOR'];
  $cargo_servidor= $_POST['CARGO_SERVIDOR'];

  $f_persona= $_POST['FECHA_NACIMIENTO_PERSONA'];
  $e_persona =$_POST['EDAD_PERSONA'];
  $g_persona=$_POST['GRUPO_EDAD'];

  $cu_persona= $_POST['CURP_PERSONA'];
  $rfc_persona =$_POST['RFC_PERSONA'];
  $al_persona=$_POST['ALIAS_PERSONA'];
  $o_persona=$_POST['OCUPACION_PERSONA'];
  $t_fijo= $_POST['TELEFONO_FIJO'];
  $t_celular=$_POST['TELEFONO_CELULAR'];
  $incapaz= $_POST['INCAPAZ'];

  $e_nacimiento =$_POST['cbx_estado'];
  $m_nacimiento=$_POST['cbx_municipio'];
  $na_persona=$_POST['NACIONALIDAD_PERSONA'];
  // datos de domicilio
  $es_persona=$_POST['estado_suj'];
  if ($es_persona == '') {
    $es_persona=$_POST['cbx_estado1'];
  }
  $mu_persona = $_POST['municipio_suj'];
  if ($mu_persona == '') {
    $mu_persona= $_POST['cbx_municipio11'];
  }
  $lo_persona = $_POST['localidad_suj'];
  if ($lo_persona == '') {
    $lo_persona =$_POST['localidadrad'];
  }
  $ca_persona = $_POST['calle_suj'];
  if ($ca_persona == '') {
    $ca_persona=$_POST['CALLE'];
  }
  $cp_persona = $_POST['codigo_postal_s'];
  if ($cp_persona == '') {
    $cp_persona=$_POST['CP'];
  }

  $nuc=$_POST['NUC'];
  // datos del comentario
  $comment = $_POST['COMENTARIO'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  $com_folio=" SELECT * FROM datospersonales WHERE id='$id_persona'";
  $res_fol = $mysqli->query($com_folio);
  $row_fol=$res_fol->fetch_assoc();
  $fol_exp = $row_fol['folioexpediente'];
  $comment_mascara = '1';
  $id_medida = "N/A";


  // consulta del nombre del estado
  $name_estado = "SELECT id_estado, estado FROM t_estado WHERE id_estado='$e_nacimiento' or estado ='$e_nacimiento'";
  $r_estado = $mysqli->query($name_estado);
  $ro_est=$r_estado->fetch_assoc();
  $name_est=$ro_est['estado'];
  if ($name_est == 'OTRO') {
    $name_muni = $_POST['OTHER_PAIS'];
  } else {
    $name_municipio= "SELECT id_municipio, municipio FROM t_municipio WHERE id_municipio='$m_nacimiento' or municipio = '$m_nacimiento'";
    $r_muni = $mysqli->query($name_municipio);
    $ro_muni=$r_muni->fetch_assoc();
    $name_muni=$ro_muni['municipio'];
  }

  // consulta del estado actual del Sujeto
  $name_estadoact = "SELECT id_estado, estado FROM t_estado WHERE id_estado='$es_persona' or estado='$es_persona'";
  $r_estadoact = $mysqli->query($name_estadoact);
  $ro_estac=$r_estadoact->fetch_assoc();
  $name_estac=$ro_estac['estado'];
  // consulta del municipio actual del sujeto
  $name_municipioact= "SELECT id_municipio, municipio FROM t_municipio WHERE id_municipio='$mu_persona' or municipio='$mu_persona'";
  $r_muniac = $mysqli->query($name_municipioact);
  $ro_muniac=$r_muniac->fetch_assoc();
  $name_muniac=$ro_muniac['municipio'];
  // consulta de la localidad actual del sujeto
  $name_estaadoac="SELECT id_localidad, localidad FROM t_localidad WHERE id_localidad='$lo_persona' or localidad='$lo_persona'";
  $r_locaact = $mysqli->query($name_estaadoac);
  $ro_locaac=$r_locaact->fetch_assoc();
  $name_locaac=$ro_locaac['localidad'];

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

  $datos_persona = "UPDATE datospersonales SET  aliaspersona='$al_persona', ocupacion='$o_persona', telefonofijo='$t_fijo', telefonocelular='$t_celular',  foto='$userpic'  WHERE id = '$id_persona'";
  $res_dat_per = $mysqli->query($datos_persona);

  $origen = "UPDATE datosorigen SET lugardenacimiento='$name_est', municipiodenacimiento='$name_muni', nacionalidadpersona='$na_persona' WHERE id_persona = '$id_persona'";
  $res_origen = $mysqli->query($origen);

  $domicilio = $_POST['MOD_DOMICILIO'];
  $criterio_oportunidad = $_POST['criterio_oportunidad'];
  $fecha_criterio = $_POST['fecha_cr_opor'];
  $reclusorio = $_POST['RECLUSORIO'];
  if ($reclusorio == '') {
      $reclusorio =$_POST['RECLUSORIO1'];
  }
  $name_recluso ="SELECT * FROM reclusorios WHERE denominacion='$reclusorio'";
  $r_recluso = $mysqli->query($name_recluso);
  $ro_recluso=$r_recluso->fetch_assoc();
  $name_reclusorio=$ro_recluso['denominacion'];
  $direccion = $ro_recluso['direccion'];
  $localidad = '';
  $calle = '';
  $cp = '';
  if ($domicilio == '') {
    $dom_actual = "UPDATE domiciliopersona SET seleccioneestado='$name_estac', seleccionemunicipio='$name_muniac', seleccionelocalidad='$lo_persona', calle='$ca_persona', cp='$cp_persona', lugar='$domicilio', criterio='$criterio_oportunidad', fecha_criterio='$fecha_criterio' WHERE id_persona = '$id_persona'";
    $res_domicilio = $mysqli->query($dom_actual);
  }else if ($domicilio == 'SI'){

    $dom_actual = "UPDATE domiciliopersona SET seleccioneestado='$name_reclusorio', seleccionemunicipio='$direccion', seleccionelocalidad='$localidad', calle='$calle', cp='$cp', lugar='$domicilio', criterio='$criterio_oportunidad', fecha_criterio='$fecha_criterio' WHERE id_persona = '$id_persona'";
    $res_domicilio = $mysqli->query($dom_actual);
  } elseif ($domicilio == 'NO'){
    $dom_actual = "UPDATE domiciliopersona SET seleccioneestado='$name_estac', seleccionemunicipio='$name_muniac', seleccionelocalidad='$lo_persona', calle='$ca_persona', cp='$cp_persona', lugar='$domicilio', criterio='$criterio_oportunidad', fecha_criterio='$fecha_criterio' WHERE id_persona = '$id_persona'";
    $res_domicilio = $mysqli->query($dom_actual);
  }
  $res_val_jur=$_POST['RESULTADO_VALORACION_JURIDICA'];
  $mot_no_proc=$_POST['MOTIVO_NO_PROCEDENCIA'];
  if ($res_val_jur === 'SI PROCEDE') {
    $val_juridica = "UPDATE valoracionjuridica SET resultadovaloracion='$res_val_jur', motivoprocedencia='' WHERE id_persona = '$id_persona'";
    $res_val_juridica = $mysqli->query($val_juridica);
  }elseif ($res_val_jur === 'NO PROCEDE') {
    $val_juridica = "UPDATE valoracionjuridica SET resultadovaloracion='$res_val_jur', motivoprocedencia='$mot_no_proc' WHERE id_persona = '$id_persona'";
    $res_val_juridica = $mysqli->query($val_juridica);
  }

  // insertar comentarios de cambios
  date_default_timezone_set("America/Mexico_City");
    $fecha = date('y/m/d H:i:sa');
  if ($comment != '') {
    $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_persona, id_medida, fecha)
                  VALUES ('$comment', '$fol_exp', '$comment_mascara', '$name', '$id_persona', '$id_medida', '$fecha')";
    $res_comment = $mysqli->query($comment);
  }

  $validacion = 'false';
  date_default_timezone_set("America/Mexico_City");
  $fecha = date('y/m/d H:i:sa');
  $updvalidar = "SELECT * FROM validar_persona WHERE id_persona = '$id_persona'";
  $res_updvalidar = $mysqli->query($updvalidar);
  $row_updvalidar=$res_updvalidar->fetch_assoc();

  $validacion = 'false';
  date_default_timezone_set("America/Mexico_City");
  $fecha = date('y/m/d H:i:sa');

  $datos_validacion_exp = "UPDATE expediente SET validacion='$validacion', fecha_validacion = '$fecha' WHERE fol_exp = '$fol_exp'";
  $res_validacion_exp = $mysqli->query($datos_validacion_exp);

  $datos_validacion = "UPDATE validar_persona SET validacion='$validacion', fecha_validacion = '$fecha' WHERE id_persona = '$id_persona'";
  $res_validacion = $mysqli->query($datos_validacion);
  // validacion de update correcto
  if($res_dat_per){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_apoyo_tecnico_juridico/detalles_persona.php?folio=$id_persona';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
