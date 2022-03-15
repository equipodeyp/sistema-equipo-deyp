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
  // datos de la autoridad
  $id_solicitud =$_POST['ID_SOLICITUD'];
  $fecha_solicitud=$_POST['FECHA_SOLICITUD'];
  $nombre_autoridad=$_POST['NOMBRE_AUTORIDAD'];
  // echo $nombre_autoridad;
  if ($nombre_autoridad =='OTRO') {

    $other_autoridad= $_POST['OTHER_AUTORIDAD'];
    if ($other_autoridad == '') {
      $other_autoridad= $_POST['OTHER_AUTORIDAD1'];
    }
  }else {
    $other_autoridad='';
  }
  // echo $other_autoridad;
  $nombre_servidor =$_POST['NOMBRE_SERVIDOR'];
  $paterno_servidor=$_POST['PATERNO_SERVIDOR'];
  $materno_servidor=$_POST['MATERNO_SERVIDOR'];
  $cargo_servidor= $_POST['CARGO_SERVIDOR'];
  // datos de la persona PROPUESTA
  // datos perssonales
  $n_persona =$_POST['NOMBRE_PERSONA'];
  $p_persona=$_POST['PATERNO_PERSONA'];
  $m_persona=$_POST['MATERNO_PERSONA'];
  $f_persona= $_POST['FECHA_NACIMIENTO_PERSONA'];
  $e_persona =$_POST['EDAD_PERSONA'];
  $g_persona=$_POST['GRUPO_EDAD'];
  $c_persona=$_POST['CALIDAD_PERSONA'];
  $s_persona= $_POST['SEXO_PERSONA'];
  $cu_persona= $_POST['CURP_PERSONA'];
  $rfc_persona =$_POST['RFC_PERSONA'];
  $al_persona=$_POST['ALIAS_PERSONA'];
  $o_persona=$_POST['OCUPACION_PERSONA'];
  $t_fijo= $_POST['TELEFONO_FIJO'];
  $t_celular=$_POST['TELEFONO_CELULAR'];
  $incapaz= $_POST['INCAPAZ'];
  // echo $incapaz;
  $archivo = $_FILES['foto1']['name'];
  $estatus= $_POST['ESTATUS_PERSONA'];
  // datos origen
  $e_nacimiento =$_POST['cbx_estado'];
  $m_nacimiento=$_POST['cbx_municipio'];
  $na_persona=$_POST['NACIONALIDAD_PERSONA'];
  // datos de domicilio
  $es_persona=$_POST['cbx_estado1'];
  $mu_persona= $_POST['cbx_municipio11'];
  $lo_persona =$_POST['cbx_localidad11'];
  $ca_persona=$_POST['CALLE'];
  $cp_persona=$_POST['CP'];
  // datos del tutor
  $t_nombre =$_POST['TUTOR_NOMBRE'];
  if ($t_nombre == '') {
    $t_nombre =$_POST['TUTOR_NOMBRE1'];
  }
  $t_paterno=$_POST['TUTOR_PATERNO'];
  if ($t_paterno == '') {
    $t_paterno=$_POST['TUTOR_PATERNO1'];
  }
  $t_materno=$_POST['TUTOR_MATERNO'];
  if ($t_materno == '') {
    $t_materno=$_POST['TUTOR_MATERNO1'];
  }
  // datos del proceso penal o investigacion
  $del_primario=$_POST['DELITO_PRINCIPAL'];
  $otro_del_p=$_POST['OTRO_DELITO_PRINCIPAL'];
  if ($otro_del_p == '') {
    $otro_del_p=$_POST['OTRO_DELITO_PRINCIPAL1'];
  }
  // echo $otro_del_p;
  $del_secundario= $_POST['DELITO_SECUNDARIO'];
  $otro_del_s =$_POST['OTRO_DELITO_SECUNDARIO'];
  if ($otro_del_s == '') {
    $otro_del_s =$_POST['OTRO_DELITO_SECUNDARIO1'];
  }
  // echo $otro_del_s;
  $etapa_p=$_POST['ETAPA_PROCEDIMIENTO'];
  $nuc=$_POST['NUC'];
  $municipio_r= $_POST['MUNICIPIO_RADICACION'];
  // datos de valoracion juridica
  $res_val_jur=$_POST['RESULTADO_VALORACION_JURIDICA'];
  $mot_no_proc=$_POST['MOTIVO_NO_PROCEDENCIA'];
  // datos de la determinacion de la INCORPORACION
  $multidisciplinario=$_POST['ANALISIS_MULTIDISCIPLINARIO'];
  $incorporacion=$_POST['INCORPORACION'];
  $date_aut =$_POST['FECHA_AUTORIZACION'];
  $id_analisis =$_POST['id_analisis'];
  $convenio= $_POST['CONVENIO_ENTENDIMIENTO'];
  $fecha_conv_ent =$_POST['FECHA_CONVENIO_ENTENDIMIENTO'];
  $fecha_inicio = $_POST['fecha_inicio'];
  $vigencia=$_POST['VIGENCIA_CONVENIO'];
  if ($fecha_inicio != '') {    
    $fecha_vigencia = date("Y/m/d",strtotime($fecha_inicio."+ $vigencia days"));
    $fecha_termino = date("d/m/Y",strtotime($fecha_vigencia."- 1 days"));
  }
  $fecha_termino = '';
  $id_convenio=$_POST['id_convenio'];
  $acuerdo =$_POST['CONCLUSION_CANCELACION'];
  if ($acuerdo=='CONCLUSION') {
    $conclusionart35=$_POST['CONCLUSION_ART35z'];
    if ($conclusionart35 == '') {
      $conclusionart35=$_POST['CONCLUSION_ART351'];
    }
    if ($conclusionart35 == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
      $otherart35=$_POST['OTHER_ART35'];
      if ($otherart35 == '') {
        $otherart35=$_POST['OTHER_ART351'];
      }
    }else {
      $otherart35 ='';
    }
  }else {
    $conclusionart35='';
  }
  // echo $otherart35;
  $date_des =$_POST['FECHA_DESINCORPORACION'];
  $mot_inc=$_POST['MOTIVO_NO_INCORPORACION'];
  //
  $radicacion=$_POST['FUENTE'];
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
  // consulta del la autoridad
  // $sentencia=" SELECT id, nombre FROM nombreautoridad WHERE id='$nombre_autoridad'";
  // $result = $mysqli->query($sentencia);
  // $row=$result->fetch_assoc();
  // $name_mun=$row['nombre'];
  //consulta de la calidad de la persona
  $calidad_p= "SELECT id, nombre FROM calidadpersona WHERE id='$c_persona'";
  $r_cal = $mysqli->query($calidad_p);
  $ro=$r_cal->fetch_assoc();

  // consulta del nombre del estado
  $name_estado = "SELECT id_estado, estado FROM t_estado WHERE id_estado='$e_nacimiento' or estado ='$e_nacimiento'";
  $r_estado = $mysqli->query($name_estado);
  $ro_est=$r_estado->fetch_assoc();
  $name_est=$ro_est['estado'];
  if ($name_est == 'OTRO') {
    $name_muni = $_POST['OTHER_PAIS'];
  } else {
    $name_municipio= "SELECT id_municipio, municipio FROM t_municipio WHERE id_municipio='$m_nacimiento'";
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
  // consulta del delito primario
  // $name_delito= "SELECT id, nombre FROM delito WHERE id= '$del_primario'";
  // $r_delito = $mysqli->query($name_delito);
  // $ro_delito=$r_delito->fetch_assoc();
  // $name_del=$ro_delito['nombre'];
  // consulta del delito secundario
  // $name_delito2 = "SELECT id, nombre FROM delito WHERE id = '$del_secundario'";
  // $r_delito2 = $mysqli->query($name_delito2);
  // $ro_delito2=$r_delito2->fetch_assoc();
  // $name_del2=$ro_delito2['nombre'];
  // consulta del municipio de radicacion del delito
  $mun_del= "SELECT id, nombre, clave FROM municipios WHERE clave = '$municipio_r'";
  $r_mu = $mysqli->query($mun_del);
  $ro_muni=$r_mu->fetch_assoc();
  $name_muni_del=$ro_muni['nombre'];
  // consulta del convenio del entendimiento
  // $convenio= "SELECT id, nombre FROM convenio WHERE id = '$etapa_proc'";
  // $r_convenio = $mysqli->query($convenio);
  // $ro_convenio=$r_convenio->fetch_assoc();
  // $name_convenio=$ro_convenio['nombre'];
  // consulta del estatus de la persona
  $est_per= "SELECT id, nombre, descripcion FROM estatuspersona WHERE id = '$estatus'";
  $r_estatus = $mysqli->query($est_per);
  $ro_est_per=$r_estatus->fetch_assoc();
  $name_estatus=$ro_est_per['nombre'];
  // consulta de  la fuente de radicacion
  $radcon= "SELECT id, nombre FROM radicacion WHERE id = '$radicacion'";
  $r_rad = $mysqli->query($radcon);
  $ro_rad=$r_rad->fetch_assoc();
  $name_radicacion=$ro_rad['nombre'];
  // sql para insercion de los datos de la autoridad
  // $sql = "INSERT INTO autoridad (idsolicitud, nombreautoridad, otraautoridad, nombreservidor, apellidopaterno, apellidomaterno, cargoservidor, folioexpediente, fechasolicitud, id_persona)
  //                        VALUES ('$id_solicitud', '$name_mun', '$other_autoridad', '$nombre_servidor', '$paterno_servidor', '$materno_servidor', '$cargo_servidor', '$fol_exp', '$fecha_solicitud', '$id_persona')";
  // $resultado = $mysqli->query($sql);
  // $sql = "UPDATE autoridad SET idsolicitud='$id_solicitud', nombreautoridad='$nombre_autoridad', otraautoridad='$other_autoridad', nombreservidor='$nombre_servidor', apellidopaterno='$paterno_servidor', apellidomaterno='$materno_servidor', cargoservidor='$cargo_servidor', fechasolicitud='$fecha_solicitud' WHERE id_persona = '$id_persona'";
  // $resultado = $mysqli->query($sql);

  // sql de la inserccion de los datos de la persona
  // if(is_uploaded_file($_FILES['foto1']['tmp_name'])){
  //     $archivo = $_FILES['foto1']['name'];
  //     move_uploaded_file($_FILES['foto1']['tmp_name'], '../imagenesbdd/'.$archivo);
  // }

  // $nom_archivo=$_FILES['foto1']['name']; // Para conocer el nombre del archivo
  // $ruta = "../imagenesbdd/" . $nom_archivo;  // La ruta del archivo contiene el nuevo nombre y el tipo de extension
  // $archivo = $_FILES['foto1']['tmp_name']; //el arhivo a subir
  // $subir=move_uploaded_file($archivo, $ruta); //se sube el archivo


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
  // $datos_persona = "INSERT INTO datospersonales (nombrepersona, paternopersona, maternopersona, fechanacimientopersona, edadpersona, grupoedad, calidadpersona, sexopersona, curppersona, rfcpersona,  aliaspersona, ocupacion, telefonofijo, telefonocelular, incapaz, folioexpediente, foto, estatus)
  //                                          VALUES('$n_persona', '$p_persona', '$m_persona', '$f_persona', '$e_persona',              '$g_persona', '$name_cal', '$s_persona', '$cu_persona', '$rfc_persona',  '$al_persona', '$o_persona', '$t_fijo', '$t_celular', '$incapaz', '$fol_exp', '$archivo', '$name_estatus')";
  // $res_dat_per = $mysqli->query($datos_persona);
  $datos_persona = "UPDATE datospersonales SET  foto='$userpic', estatus='$estatus'  WHERE id = '$id_persona'";
  $res_dat_per = $mysqli->query($datos_persona);
  // sql para la inserccion de datos del sujeto de su origen
  // $origen = "INSERT INTO datosorigen(lugardenacimiento, municipiodenacimiento, nacionalidadpersona, folioexpediente, id_persona)
  //             VALUES ('$name_est', '$name_muni', '$na_persona', '$fol_exp', '$id_persona')";
  // $res_origen = $mysqli->query($origen);
  // $origen = "UPDATE datosorigen SET lugardenacimiento='$name_est', municipiodenacimiento='$name_muni', nacionalidadpersona='$na_persona' WHERE id_persona = '$id_persona'";
  // $res_origen = $mysqli->query($origen);
  // // sql para la inserccion de datos del lugar donde radica el Sujeto
  // $dom_actual ="INSERT INTO domiciliopersona(seleccioneestado, seleccionemunicipio, seleccionelocalidad, calle, cp, folioexpediente, id_persona)
  //               VALUES ('$name_estac', '$name_muniac', '$name_locaac', '$ca_persona', '$cp_persona', '$fol_exp', '$id_persona')";
  // $res_domicilio = $mysqli->query($dom_actual);
  // $dom_actual = "UPDATE domiciliopersona SET seleccioneestado='$name_estac', seleccionemunicipio='$name_muniac', seleccionelocalidad='$name_locaac', calle='$ca_persona', cp='$cp_persona' WHERE id_persona = '$id_persona'";
  // $res_domicilio = $mysqli->query($dom_actual);
  // // sql para la inserccion de datos del TUTOR
  // if ($incapaz == 'SI') {
  //   $tutor = "INSERT INTO tutor (nombre, apellidopaterno, apellidomaterno, folioexpediente, id_persona)
  //             VALUES ('$t_nombre', '$t_paterno', '$t_materno', '$fol_exp', '$id_persona')";
  //   $res_tutor = $mysqli->query($tutor);
  // }
  // if ($incapaz == 'SI') {
  //   $tutor = "UPDATE tutor SET nombre='$t_nombre', apellidopaterno='$t_paterno', apellidomaterno='$t_materno' WHERE id_persona = '$id_persona'";
  //   $res_tutor = $mysqli->query($tutor);
  // }
  // sql para inserccion de los datos de la investigacion o proceso penal
  // $proceso_penal= "INSERT INTO procesopenal (delitoprincipal, otrodelitoprincipal, delitosecundario, otrodelitosecundario, etapaprocedimiento, nuc, numeroradicacion, folioexpediente, id_persona)
  //                   VALUES ('$name_del', '$otro_del_p', '$name_del2', '$otro_del_s', '$etapa_p', '$nuc', '$name_muni_del', '$fol_exp', '$id_persona')";
  // $res_proceso = $mysqli->query($proceso_penal);
  // $proceso_penal ="UPDATE procesopenal SET delitoprincipal='$del_primario', otrodelitoprincipal='$otro_del_p', delitosecundario='$del_secundario', otrodelitosecundario='$otro_del_s', etapaprocedimiento='$etapa_p', nuc='$nuc', numeroradicacion='$municipio_r' WHERE id_persona = '$id_persona'";
  // $res_proceso = $mysqli->query($proceso_penal);
  // // sql para inserccion de valoracion juridica
  // $val_juridica = "INSERT INTO valoracionjuridica (resultadovaloracion, motivoprocedencia, folioexpediente, id_persona)
  //                   VALUES ('$res_val_jur', '$mot_no_proc', '$fol_exp', '$id_persona')";
  // $res_val_juridica = $mysqli->query($val_juridica);
  // $val_juridica = "UPDATE valoracionjuridica SET resultadovaloracion='$res_val_jur', motivoprocedencia='$mot_no_proc' WHERE id_persona = '$id_persona'";
  // $res_val_juridica = $mysqli->query($val_juridica);
  // sql para la inserccion de la determinacion de la incorporacion
  // $det_inc = "INSERT INTO determinacionincorporacion (incorporacion, motivoincorporacion, convenioentendimiento, fechaconvenioentendimiento, folioexpediente, id_persona)
  //               VALUES('$incorporacion', '$mot_inc', '$name_convenio', '$fecha_conv_ent', '$fol_exp', '$id_persona')";
  // $res_det_inc = $mysqli->query($det_inc);
  $det_inc = "UPDATE determinacionincorporacion SET multidisciplinario='$multidisciplinario', incorporacion='$incorporacion', date_autorizacion='$date_aut', id_analisis='$id_analisis', convenio='$convenio', vigencia='$vigencia', date_convenio='$fecha_conv_ent', fecha_inicio='$fecha_inicio', fecha_termino = '$fecha_termino', id_convenio='$id_convenio', conclu_cancel='$acuerdo', conclusionart35='$conclusionart35', otroart35='$otherart35', date_desincorporacion='$date_des' WHERE id_persona = '$id_persona' ";
  $res_det_inc = $mysqli->query($det_inc);
  if ($radicacion == 'OFICIO') {
    $des_rad = $_POST['OFICIO'];
    if ($des_rad == '') {
      $des_rad = $_POST['OFICIO1'];
    }
  }elseif ($radicacion == 'CORREO') {
    $des_rad = $_POST['CORREO'];
    if ($des_rad == '') {
      $des_rad = $_POST['CORREO1'];
    }
  }elseif ($radicacion == 'EXPEDIENTE') {
    $des_rad = $_POST['EXPEDIENTE'];
    if ($des_rad == '') {
      $des_rad = $_POST['EXPEDIENTE1'];
    }
  }elseif ($radicacion == 'OTRO') {
    $des_rad = $_POST['OTRO'];
    if ($des_rad == '') {
      $des_rad = $_POST['OTRO1'];
    }
  }

  // $fuente_rad = "INSERT INTO radicacion_mascara1(fuente, descripcion, id_persona, folioexpediente)
  //               VALUES ('$name_radicacion', '$des_rad', '$id_persona', '$fol_exp')";
  // $res_radicacion = $mysqli->query($fuente_rad);
  $fuente_rad = "UPDATE radicacion_mascara1 SET fuente='$radicacion', descripcion='$des_rad' WHERE id_persona = '$id_persona'";
  $res_radicacion = $mysqli->query($fuente_rad);
  // insertar comentarios de cambios
  $fechacomentario = date('y/m/d');
  if ($comment != '') {
    $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_persona, id_medida, fecha)
                  VALUES ('$comment', '$fol_exp', '$comment_mascara', '$name', '$id_persona', '$id_medida', '$fechacomentario')";
    $res_comment = $mysqli->query($comment);
  }

  // validacion de update correcto
  if($res_det_inc && $res_radicacion){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_estadistica_y_preregistro/detalles_persona.php?folio=$id_persona';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
