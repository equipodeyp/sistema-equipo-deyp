<?php
error_reporting(0);
require 'conexion.php';
session_start ();
$verifica = $_SESSION["verifica"];
if ($verifica == 1) {
  unset($_SESSION['verifica']);
  $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datsos
  $fol_exp = $_GET['folio'];   //variable del folio al que se relaciona
  $exp_rel =$_POST['sel_relacional'];
  // datos de la autoridad
  $checkautoridad = "SELECT * FROM autoridad WHERE folioexpediente = '$fol_exp'";
  $rescheckautoridad = $mysqli->query($checkautoridad);
  $filacheckautoridad = $rescheckautoridad->fetch_assoc();
  if ($filacheckautoridad > 0) {
    // echo "existe un registro";

    // echo $exp_rel;
    $id_solicitud = $filacheckautoridad['idsolicitud'];
    $fecha_solicitud = $filacheckautoridad['fechasolicitud'];
    $nombre_autoridad = $filacheckautoridad['nombreautoridad'];
    if ($nombre_autoridad === 'OTRO') {
      $other_autoridad = $filacheckautoridad['otraautoridad'];
    }else {
      $other_autoridad = '';
    }
    $nombre_servidor = $filacheckautoridad['nombreservidor'];
    $paterno_servidor = $filacheckautoridad['apellidopaterno'];
    $materno_servidor = $filacheckautoridad['apellidomaterno'];
    $cargo_servidor = $filacheckautoridad['cargoservidor'];
  }else {
    // echo "no existe registro aun";
    $id_solicitud =$_POST['ID_SOLICITUD'];
    $fecha_solicitud=$_POST['FECHA_SOLICITUD'];
    $nombre_autoridad=$_POST['NOMBRE_AUTORIDAD'];
    if ($nombre_autoridad =='OTRO') {
      // code...
      $other_autoridad= $_POST['OTHER_AUTORIDAD'];
    }else {
      $other_autoridad='';
    }
    $nombre_servidor =$_POST['NOMBRE_SERVIDOR'];
    $paterno_servidor=$_POST['PATERNO_SERVIDOR'];
    $materno_servidor=$_POST['MATERNO_SERVIDOR'];
    $cargo_servidor= $_POST['CARGO_SERVIDOR'];
  }
  // datos de la persona PROPUESTA
  // datos perssonales
  $n_persona =$_POST['NOMBRE_PERSONA'];
  $p_persona=$_POST['PATERNO_PERSONA'];
  $m_persona=$_POST['MATERNO_PERSONA'];
  $f_persona= $_POST['FECHA_NACIMIENTO_PERSONA'];
  $e_persona =$_POST['EDAD_PERSONA'];
  $g_persona=$_POST['GRUPO_EDAD'];
  $c_persona=$_POST['CALIDAD_PERSONA'];
  $p_procedimiento = $_POST['CALIDAD_PERSONA_PROCEDIMIENTO'];
  $otroacalp = $_POST['otracalidad'];
  $s_persona= $_POST['SEXO_PERSONA'];
  $cu_persona= $_POST['CURP_PERSONA'];
  $rfc_persona =$_POST['RFC_PERSONA'];
  $al_persona=$_POST['ALIAS_PERSONA'];
  $o_persona=$_POST['OCUPACION_PERSONA'];
  $t_fijo= $_POST['TELEFONO_FIJO'];
  $t_celular=$_POST['TELEFONO_CELULAR'];
  $incapaz= $_POST['INCAPAZ'];
  $archivo = $_FILES['foto']['name'];
  $estatus= $_POST['ESTATUS_PERSONA'];
  if ($estatus == '') {
    $estatus = 'PERSONA PROPUESTA';
  }

  // datos origen
  $e_nacimiento =$_POST['cbx_estado'];
  $m_nacimiento=$_POST['cbx_municipio'];
  $na_persona=$_POST['NACIONALIDAD_PERSONA'];
  // datos de domicilio
  $es_persona=$_POST['cbx_estado1'];
  $mu_persona= $_POST['cbx_municipio1'];
  $lo_persona =$_POST['localidadrad'];
  $ca_persona=$_POST['CALLE'];
  $cp_persona=$_POST['CP'];
  // datos del tutor
  $t_nombre =$_POST['TUTOR_NOMBRE'];
  $t_paterno=$_POST['TUTOR_PATERNO'];
  $t_materno=$_POST['TUTOR_MATERNO'];
  // datos del proceso penal o investigacion
  // <!-- proceso penal -->
  $checkproceso = "SELECT * FROM procesopenal WHERE folioexpediente = '$fol_exp'";
  $rescheckproceso = $mysqli->query($checkproceso);
  $filacheckproceso = $rescheckproceso->fetch_assoc();
  if ($filacheckproceso > 0) {
    // echo "existe registro previo";
    $del_primario = $filacheckproceso['delitoprincipal'];
    $otro_del_p  = $filacheckproceso['otrodelitoprincipal'];
    $del_secundario = $filacheckproceso['delitosecundario'];
    $otro_del_s = $filacheckproceso['otrodelitosecundario'];
    $etapa_p = $filacheckproceso['etapaprocedimiento'];
    $nuc = $filacheckproceso['nuc'];
    $municipio_r = $filacheckproceso['numeroradicacion'];
  }else {
    // echo "no existe ningun dato";
    $del_primario=$_POST['DELITO_PRINCIPAL'];
    $otro_del_p=$_POST['OTRO_DELITO_PRINCIPAL'];
    $del_secundario= $_POST['DELITO_SECUNDARIO'];
    $otro_del_s =$_POST['OTRO_DELITO_SECUNDARIO'];
    $etapa_p=$_POST['ETAPA_PROCEDIMIENTO'];
    $nuc=$_POST['NUC'];
    $municipio_r= $_POST['MUNICIPIO_RADICACION'];
  }
  // datos de valoracion juridica
  // <!-- valoracion juridica -->
  $checkvalorjuridica = "SELECT * FROM valoracionjuridica WHERE folioexpediente = '$fol_exp'";
  $rescheckvalorjuridica = $mysqli->query($checkvalorjuridica);
  $filavalorjuridica = $rescheckvalorjuridica->fetch_assoc();
  if ($filavalorjuridica > 0) {
    // echo "existe registro previo";
    $res_val_jur = $filavalorjuridica['resultadovaloracion'];
    $mot_no_proc = $filavalorjuridica['motivoprocedencia'];
  }else {
    // echo "no existe ningun dato";
    $res_val_jur=$_POST['RESULTADO_VALORACION_JURIDICA'];
    $mot_no_proc=$_POST['MOTIVO_NO_PROCEDENCIA'];
  }
  // datos de la determinacion de la INCORPORACION
  $multidisciplinario=$_POST['ANALISIS_MULTIDISCIPLINARIO'];
  $incorporacion=$_POST['INCORPORACION'];
  $date_aut =$_POST['FECHA_AUTORIZACION'];
  $convenio= $_POST['CONVENIO_ENTENDIMIENTO'];
  $vigencia=$_POST['VIGENCIA_CONVENIO'];
  $fecha_conv_ent =$_POST['FECHA_CONVENIO_ENTENDIMIENTO'];
  $acuerdo =$_POST['CONCLUSION_CANCELACION'];
  if ($acuerdo=='CONCLUSION') {
    $conclusionart35=$_POST['CONCLUSION_ART35'];
    if ($conclusionart35 == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
      $otherart35=$_POST['OTHER_ART35'];
    }else {
      $otherart35 ='';
    }
  }else {
    $conclusionart35='';
  }
  $date_des =$_POST['FECHA_DESINCORPORACION'];
  $mot_inc=$_POST['MOTIVO_NO_INCORPORACION'];
  // consulta del nombre del estado
  $name_estado = "SELECT id_estado, estado FROM t_estado WHERE id_estado='$e_nacimiento'";
  $r_estado = $mysqli->query($name_estado);
  $ro_est=$r_estado->fetch_assoc();
  $name_est=$ro_est['estado'];
  // consulta del municipio
  if ($name_est == 'OTRO') {
    $name_muni = $_POST['OTHER_PAIS'];
  } else {
    $name_municipio= "SELECT id_municipio, municipio FROM t_municipio WHERE id_municipio='$m_nacimiento'";
    $r_muni = $mysqli->query($name_municipio);
    $ro_muni=$r_muni->fetch_assoc();
    $name_muni=$ro_muni['municipio'];
  }

  // consulta del estado actual del Sujeto
  $name_estadoact = "SELECT id_estado, estado FROM t_estado WHERE id_estado='$e_nacimiento'";
  $r_estadoact = $mysqli->query($name_estadoact);
  $ro_estac=$r_estadoact->fetch_assoc();
  $name_estac=$ro_estac['estado'];
  // consulta del municipio actual del sujeto
  $name_municipioact= "SELECT id_municipio, municipio FROM t_municipio WHERE id_municipio='$m_nacimiento'";
  $r_muniac = $mysqli->query($name_municipioact);
  $ro_muniac=$r_muniac->fetch_assoc();
  $name_muniac=$ro_muniac['municipio'];
  // consulta de la localidad actual del sujeto
  $name_estaadoac="SELECT id_localidad, localidad FROM t_localidad WHERE id_localidad='$lo_persona'";
  $r_locaact = $mysqli->query($name_estaadoac);
  $ro_locaac=$r_locaact->fetch_assoc();
  $name_locaac=$ro_locaac['localidad'];
  // datos del comentario
  $comment = $_POST['COMENTARIO'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // $com_folio=" SELECT * FROM datospersonales WHERE id='$id_persona'";
  // $res_fol = $mysqli->query($com_folio);
  // $row_fol=$res_fol->fetch_assoc();
  // $fol_exp = $row_fol['folioexpediente'];
  $comment_mascara = '1';
  $id_medida = "N/A";
  // sql de la inserccion de los datos de la persona
  $imgFile = $_FILES['user_image']['name'];
  $tmp_dir = $_FILES['user_image']['tmp_name'];
  $imgSize = $_FILES['user_image']['size'];
  $upload_dir = '../imagenesbdd/'; // upload directory

  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

  // valid image extensions
  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

  // rename uploading image
  $userpic = rand(1000,1000000).".".$imgExt;

  // allow valid image file formats
  if(in_array($imgExt, $valid_extensions)){
    // Check file size '1MB'
    if($imgSize < 1000000)				{
      move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    }
    else{
      $errMSG = "Su archivo es muy grande.";
    }
  }
  else{
    $errMSG = "Solo archivos JPG, JPEG, PNG & GIF son permitidos.";
  }
  $identificador = $_POST['ID_UNICO'];
  $fecha_captura = $_POST['FECHA_CAPTURA'];
  $datos_persona = "INSERT INTO datospersonales (nombrepersona, paternopersona, maternopersona, fechanacimientopersona, edadpersona, grupoedad, calidadpersona, calidadprocedimiento, especifique, sexopersona, curppersona, rfcpersona, aliaspersona, ocupacion, telefonofijo, telefonocelular,
                                incapaz, folioexpediente, foto, estatus, identificador, fecha_captura, relacional, usuario)
                    VALUES('$n_persona', '$p_persona', '$m_persona', '$f_persona', '$e_persona', '$g_persona', '$c_persona', '$p_procedimiento', '$otroacalp', '$s_persona', '$cu_persona', '$rfc_persona', '$al_persona', '$o_persona', '$t_fijo', '$t_celular',
                           '$incapaz', '$fol_exp', '$userpic', '$estatus', '$identificador', '$fecha_captura', 'NO', '$name')";
  $res_dat_per = $mysqli->query($datos_persona);
  $qry = "select max(ID) As id from datospersonales";
  $result = $mysqli->query($qry);
  $row = $result->fetch_assoc();
  $id_persona =$row["id"];

  // sql para insercion de los datos de la autoridad
  $sql = "INSERT INTO autoridad (idsolicitud, nombreautoridad, otraautoridad, nombreservidor, apellidopaterno, apellidomaterno, cargoservidor, folioexpediente, fechasolicitud, id_persona)
          VALUES ('$id_solicitud', '$nombre_autoridad', '$other_autoridad', '$nombre_servidor', '$paterno_servidor', '$materno_servidor', '$cargo_servidor', '$fol_exp', '$fecha_solicitud', '$id_persona')";
  $resultado = $mysqli->query($sql);


  // sql para la inserccion de datos del sujeto de su origen
  $origen = "INSERT INTO datosorigen(lugardenacimiento, municipiodenacimiento, nacionalidadpersona, folioexpediente, id_persona)
              VALUES ('$name_est', '$name_muni', '$na_persona', '$fol_exp', '$id_persona')";
  $res_origen = $mysqli->query($origen);
  // // sql para la inserccion de datos del lugar donde radica el Sujeto
  $domicilio = $_POST["DOMICILIO"];
  if ($domicilio == '') {
    $dom_actual ="INSERT INTO domiciliopersona(seleccioneestado, seleccionemunicipio, seleccionelocalidad, calle, cp, folioexpediente, id_persona, lugar, criterio, fecha_criterio)
                  VALUES ('$name_estac', '$name_muniac', '$lo_persona', '$ca_persona', '$cp_persona', '$fol_exp', '$id_persona', '$domicilio', '$criterio', '$fecha_criterio')";
    $res_domicilio = $mysqli->query($dom_actual);
  }else if ($domicilio == 'SI'){
    $reclusorio = $_POST['RECLUSORIO'];
    $criterio = $_POST['criterio_oportunidad'];
    echo $criterio;
    $fecha_criterio = $_POST['fecha_cr_opor'];
    echo $fecha_criterio;
    $name_recluso ="SELECT * FROM reclusorios WHERE denominacion='$reclusorio'";
    $r_recluso = $mysqli->query($name_recluso);
    $ro_recluso=$r_recluso->fetch_assoc();
    $name_reclusorio=$ro_recluso['denominacion'];
    $direccion = $ro_recluso['direccion'];
    $localidad = '';
    $calle = '';
    $cp = '';
    $dom_actual ="INSERT INTO domiciliopersona(seleccioneestado, seleccionemunicipio, seleccionelocalidad, calle, cp, folioexpediente, id_persona, lugar, criterio, fecha_criterio)
                  VALUES ('$name_reclusorio', '$direccion', '$localidad', '$calle', '$cp', '$fol_exp', '$id_persona', '$domicilio', '$criterio', '$fecha_criterio')";
    $res_domicilio = $mysqli->query($dom_actual);
  } elseif ($domicilio == 'NO'){
    $dom_actual ="INSERT INTO domiciliopersona(seleccioneestado, seleccionemunicipio, seleccionelocalidad, calle, cp, folioexpediente, id_persona, lugar)
                  VALUES ('$name_estac', '$name_muniac', '$lo_persona', '$ca_persona', '$cp_persona', '$fol_exp', '$id_persona', '$domicilio')";
    $res_domicilio = $mysqli->query($dom_actual);
  }

  // // sql para lña inserccion de datos del TUTOR
  if ($incapaz == 'SI') {
    $tutor = "INSERT INTO tutor (nombre, apellidopaterno, apellidomaterno, folioexpediente, id_persona)
              VALUES ('$t_nombre', '$t_paterno', '$t_materno', '$fol_exp', '$id_persona')";
    $res_tutor = $mysqli->query($tutor);
  }

  // sql para inserccion de los datos de la investigacion o proceso penal
  $proceso_penal= "INSERT INTO procesopenal (delitoprincipal, otrodelitoprincipal, delitosecundario, otrodelitosecundario, etapaprocedimiento, nuc, numeroradicacion, folioexpediente, id_persona)
                    VALUES ('$del_primario', '$otro_del_p', '$del_secundario', '$otro_del_s', '$etapa_p', '$nuc', '$municipio_r', '$fol_exp', '$id_persona')";
  $res_proceso = $mysqli->query($proceso_penal);
  // // sql para inserccion de valoracion juridica
  $val_juridica = "INSERT INTO valoracionjuridica (resultadovaloracion, motivoprocedencia, folioexpediente, id_persona)
                    VALUES ('$res_val_jur', '$mot_no_proc', '$fol_exp', '$id_persona')";
  $res_val_juridica = $mysqli->query($val_juridica);
  // // sql para la inserccion de la determinacion de la incorporacion
  $det_inc = "INSERT INTO determinacionincorporacion (multidisciplinario, incorporacion, date_autorizacion, convenio, vigencia, date_convenio, conclu_cancel, conclusionart35, otroart35, date_desincorporacion, folioexpediente, id_persona)
                VALUES('EN ELABORACION', '$incorporacion', '$date_aut', '$convenio', '$vigencia', '$fecha_conv_ent', '$acuerdo', '$conclusionart35', '$otherart35', '$date_des', '$fol_exp', '$id_persona')";
  $res_det_inc = $mysqli->query($det_inc);
  // insertar comentarios de cambios
  $fechacomentario = date('y/m/d H:i:sa');

  if ($comment != '') {
    $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_persona, id_medida, fecha)
                  VALUES ('$comment', '$fol_exp', '$comment_mascara', '$name', '$id_persona', '$id_medida', '$fechacomentario')";
    $res_comment = $mysqli->query($comment);
  }

  $com_folio=" SELECT * FROM datospersonales WHERE id='$id_persona'";
  $res_fol = $mysqli->query($com_folio);
  $row_fol=$res_fol->fetch_assoc();
  $fol_exp = $row_fol['folioexpediente'];
  $id_unico = $row_fol['identificador'];
  $validacion = 'false';
  date_default_timezone_set("America/Mexico_City");
  $fecha = date('y/m/d H:i:sa');
  $fechacap = date('Y/m/d');

  if ($exp_rel != '') {
    echo "expediente relacional";
    $dato_relacional = "UPDATE datospersonales SET relacional='SI' WHERE id = '$id_persona'";
    $re_relacional = $mysqli->query($dato_relacional);
    for ($i=0;$i<count($exp_rel);$i++){
      $frel = $exp_rel[$i];
      $rel = "INSERT INTO relacion_suj_exp(id_usuario, id_unico, folioexpediente, espedienterelacional, fecha_captura, usuario)
      VALUES ('$id_persona', '$id_unico', '$fol_exp', '$frel', '$fechacap', '$name')";
      $rrel = $mysqli->query($rel);
    }
  }

  $datos_validacion = "INSERT INTO validar_persona (folioexpediente, validacion, id_persona, fecha, id_unico)
                                           VALUES('$fol_exp', '$validacion', '$id_persona', '$fecha', '$id_unico')";
  $res_validacion = $mysqli->query($datos_validacion);

  // validar el expediente es estado false
  $validacion = 'false';
  date_default_timezone_set("America/Mexico_City");
  $fecha = date('y/m/d H:i:sa');

  $datos_validacion_exp = "UPDATE expediente SET validacion='$validacion', fecha_validacion = '$fecha' WHERE fol_exp = '$fol_exp'";
  $res_validacion_exp = $mysqli->query($datos_validacion_exp);

  // validacion de registro GUARDADO
  if($res_val_juridica){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_apoyo_tecnico_juridico/modificar.php?id=$fol_exp';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
