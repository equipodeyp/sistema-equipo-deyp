<?php
/*require 'conexion.php';*/
error_reporting(0);
include("conexion.php");
session_start ();
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();

$query = "SELECT id_estado, estado FROM t_estado ORDER BY id_estado";
$resultado23=$mysqli->query($query);

$query1 = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
$resultado1=$mysqli->query($query1);

$fol_exp = $_GET['folio'];
// echo $fol_exp;
$fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();
$name_folio=$rowfol['folioexpediente'];
$identificador = $rowfol['identificador'];
// echo $identificador;
$id_person=$rowfol['id'];
$foto=$rowfol['foto'];
$valid1 = "SELECT * FROM validar_persona WHERE folioexpediente = '$name_folio'";
$res_val1=$mysqli->query($valid1);
$fil_val1 = $res_val1->fetch_assoc();
$validacion1 = $fil_val1['id_persona'];


// consulta de los datos de la autoridad
$aut = "SELECT * FROM autoridad WHERE id_persona = '$id_person'";
$resultadoaut = $mysqli->query($aut);
$rowaut = $resultadoaut->fetch_array(MYSQLI_ASSOC);
// consulta de los datos de origen del SUJETO
$origen = "SELECT * FROM datosorigen WHERE id = '$id_person'";
$resultadoorigen = $mysqli->query($origen);
$roworigen = $resultadoorigen->fetch_array(MYSQLI_ASSOC);
$nameestadonac=$roworigen['lugardenacimiento'];

// datos del TUTOR
$tutor = "SELECT * FROM tutor WHERE id_persona = '$id_person'";
$resultadotutor = $mysqli->query($tutor);
$rowtutor = $resultadotutor->fetch_array(MYSQLI_ASSOC);
// datos del proceso penal
$process = "SELECT * FROM procesopenal WHERE id_persona = '$id_person'";
$resultadoprocess = $mysqli->query($process);
$rowprocess = $resultadoprocess->fetch_array(MYSQLI_ASSOC);
// datos de la valoracion juridica
$valjur = "SELECT * FROM valoracionjuridica WHERE id_persona = '$id_person'";
$resultadovaljur = $mysqli->query($valjur);
$rowvaljur = $resultadovaljur->fetch_array(MYSQLI_ASSOC);
// datos de la determinacion de la incorporacion
$detinc = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_person'";
$resultadodetinc = $mysqli->query($detinc);
$rowdetinc = $resultadodetinc->fetch_array(MYSQLI_ASSOC);
// datos de la radicacion de la informacion
$radmas = "SELECT * FROM radicacion_mascara1 WHERE id_persona = '$id_person'";
$resultadoradmas = $mysqli->query($radmas);
$rowradmas = $resultadoradmas->fetch_array(MYSQLI_ASSOC);
//consulta de los datos de origen de la persona
$domicilio = "SELECT * FROM domiciliopersona WHERE id_persona = '$id_person'";
$resultadodomicilio = $mysqli->query($domicilio);
$rowdomicilio = $resultadodomicilio->fetch_array(MYSQLI_ASSOC);
// consulta del seguimiento del EXPEDIENTE
$seguimexp = "SELECT * FROM seguimientoexp WHERE id_persona = '$id_person'";
$resultadoseguimexp = $mysqli->query($seguimexp);
$rowseguimexp = $resultadoseguimexp->fetch_array(MYSQLI_ASSOC);
// consulta del estatus del expediente
$statusexp = "SELECT * FROM statusseguimiento WHERE id_persona = '$id_person'";
$resultadostatusexp = $mysqli->query($statusexp);
$rowstatusexp = $resultadostatusexp->fetch_array(MYSQLI_ASSOC);
// consulta de la fuente de la mascara 3
$fuente3 = "SELECT * FROM radicacion_mascara3 WHERE id_persona = '$id_person'";
$resultadofuente3 = $mysqli->query($fuente3);
$rowfuente3 = $resultadofuente3->fetch_array(MYSQLI_ASSOC);


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/expediente.css">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/expediente.js"></script>
  <script src="../js/solicitud.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="../css/registrosolicitud1.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- <script src="JQuery.js"></script> -->
  <script src="../js/Javascript.js"></script>
  <script src="../js/validar_campos.js"></script>
  <script src="../js/verificar_camposm1.js"></script>
  <script src="../js/mascara2campos.js"></script>
  <script src="../js/mod_medida.js"></script>
  <!-- <link rel="stylesheet" href="../css/estilos.css">
  <script src="../js/main.js"></script> -->
  <script src="../js/Javascript.js"></script>
  <script src="../js/validar_campos.js"></script>
  <script src="../js/validarmascara3.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
</head>
<body >
<div class="contenedor">
  <div class="sidebar ancho">
    <div class="logo text-warning">
    </div>
    <div class="user">
      <?php
			$sentencia_user=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
			$result_user = $mysqli->query($sentencia_user);
			$row_user=$result_user->fetch_assoc();
			$genero = $row_user['sexo'];

			if ($genero=='mujer') {
				echo "<img src='../image/mujerup.png' width='100' height='100'>";
			}

			if ($genero=='hombre') {
				// $foto = ../image/user.png;
				echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
			}
			// echo $genero;
			 ?>
    <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
    </div>
    <nav class="menu-nav">
    </nav>
  </div>
  <div class="main bg-light">
    <div class="barra">
      <img src="../image/fiscalia.png" alt="" width="150" height="150">
      <img src="../image/ups2.png" alt="" width="1400" height="70">
      <img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
    </div>
      <!--  -->
      <div class="wrap">
    		<ul class="tabs">
    			<li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO DEL EXPEDIENTE</span></a></li>
    		</ul>

    		<div class="secciones">
    			<article id="tab3">
            <div class="container">
              <form class=" container well form-horizontal" action="update_seguim.php?folio=<?php echo $id_person; ?>" method="post">
                <div class="row">
                  <div class="alert alert-info">
                    <h3 style="text-align:center">DATOS GENERALES DEL EXPEDIENTE</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="RESULTADO_VALORACION_JURIDICA">RESULTADO VALORACIÓN JURÍDICA<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="SEDE" name="RESULTADO_VALORACION_JURIDICA" disabled>
                      <option value=""><?php echo $rowvaljur['resultadovaloracion']; ?></option>
                      <option value="SI_PROCEDE">SI_PROCEDE </option>
                      <option value="NO_PROCEDE">NO_PROCEDE</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="MOTIVO_NO_PROCEDENCIA_JURIDICA">MOTIVO NO PROCEDENCIA JURÍDICA<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="SEDE" name="MOTIVO_NO_PROCEDENCIA_JURIDICA" disabled>
                      <option value=""><?php echo $rowvaljur['motivoprocedencia']; ?></option>
                      <option value="NO CORRESPONDE EL TIPO PENAL">NO CORRESPONDE EL TIPO PENAL </option>
                      <option value="NO CUMPLE CON LOS REQUISITOS">NO CUMPLE CON LOS REQUISITOS</option>
                      <option value="AMBAS">AMBAS </option>
                      <option value="NO APLICA">NO APLICA</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">ANALISIS</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="ANALISIS_MULTIDISCIPLINARIO">ANALISIS MULTIDISCIPLINARIO</label>
                    <select class="form-select form-select-lg" name="ANALISIS_MULTIDISCIPLINARIO">
                      <option style="visibility: hidden" id="tab3-analisis-multidisiplñinario" value="<?php echo $rowseguimexp['multidisciplinario']; ?>"><?php echo $rowseguimexp['multidisciplinario']; ?></option>
                      <?php
                      $multidisciplinario = "SELECT * FROM multidisciplinario";
                      $answermultidisciplinario = $mysqli->query($multidisciplinario);
                      while($multidisciplinarios = $answermultidisciplinario->fetch_assoc()){
                        echo "<option value='".$multidisciplinarios['nombre']."'>".$multidisciplinarios['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>


                  <div class="col-md-6 mb-3 validar">
                    <label for="INCORPORACION">INCORPORACIÓN<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="INCORPORACION" name="INCORPORACION" >
                      <option style="visibility: hidden" id="tab3-incorporacion" value="<?php echo $rowseguimexp['incorporacion']; ?>"><?php echo $rowseguimexp['incorporacion']; ?></option>
                      <?php
                      $inc = "SELECT * FROM incorporacion";
                      $answerinc = $mysqli->query($inc);
                      while($incs = $answerinc->fetch_assoc()){
                        echo "<option value='".$incs['nombre']."'>".$incs['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="FECHA_AUTORIZACION_ANALISIS">FECHA DE AUTORIZACIÓN DE ANALISIS MULTIDISCIPLINARIO<span class="required"></span></label>
                    <input class="form-control" id="FECHA_AUTORIZACION_ANALISIS" name="FECHA_AUTORIZACION_ANALISIS" placeholder=""  type="date" value="<?php echo $rowseguimexp['date_autorizacion']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="CONVENIO_DE_ENTENDIMIENTO">CONVENIO DE ENTENDIMIENTO<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="CONVENIO_DE_ENTENDIMIENTO" name="CONVENIO_DE_ENTENDIMIENTO">
                      <option style="visibility: hidden" id="tab3-convenio-entendimiento" value="<?php echo $rowseguimexp['convenio']; ?>"><?php echo $rowseguimexp['convenio']; ?></option>
                      <?php
                      $convenio = "SELECT * FROM convenio";
                      $answerconvenio = $mysqli->query($convenio);
                      while($convenios = $answerconvenio->fetch_assoc()){
                        echo "<option value='".$convenios['nombre']."'>".$convenios['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="VIGENCIA_CONVENIO">VIGENCIA CONVENIO</label>
                    <input class="form-control" id="VIGENCIA_CONVENIO" type="text" name="VIGENCIA_CONVENIO" value="<?php echo $rowseguimexp['vigencia']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="FECHA_CONVENIO_ENTENDIMIENTO">FECHA DEL CONVENIO ENTENDIMIENTO<span class="required"></span></label>
                    <input class="form-control" id="FECHA_CONVENIO_ENTENDIMIENTO_UNO" name="FECHA_CONVENIO_ENTENDIMIENTO" placeholder="" type="date" value="<?php echo $rowseguimexp['date_convenio']; ?>">
                  </div>

                </div>

                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">ESTATUS</h3>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="CONCLUSION_CANCELACION">CONCLUSIÓN / CANCELACIÓN</label>
                    <select class="form-select form-select-lg" name="CONCLUSION_CANCELACION" onChange="open3art35zz(this)">
                      <option style="visibility: hidden" id="tab3-conclusion-cancelaciom" value="<?php echo $rowstatusexp['conclu_cancel']; ?>"><?php echo $rowstatusexp['conclu_cancel']; ?></option>
                      <option value="CANCELACION">CANCELACIÓN</option>
                      <option value="CONCLUSION">CONCLUSIÓN</option>
                    </select>
                  </div>

                  <?php
                  $statusseg = "SELECT * FROM statusseguimiento WHERE id_persona = '$id_person'";
                  $resultadostatusseg = $mysqli->query($statusseg);
                  $rowastatusseg = $resultadostatusseg->fetch_array(MYSQLI_ASSOC);
                  if ($rowastatusseg['conclu_cancel']== 'CONCLUSION') {
                    echo '<div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35m">
                      <label for="CONCLUSION">CONCLUSION ARTICULO 35</label>
                      <select onclick="myFunctionHidden" class="form-select form-select-lg" name="CONCLUSION_ART35" onChange="modotherart35s(this)">
                        <option id="tab3-art35" value="'.$rowastatusseg['conclusionart35'].'">'.$rowastatusseg['conclusionart35'].'</option>';
                        $art35 = "SELECT * FROM conclusionart35";
                        $answerart35 = $mysqli->query($art35);
                        while($art35s = $answerart35->fetch_assoc()){
                          echo "<option value='".$art35s['nombre']."'>".$art35s['nombre']."</option>";
                        }
                        echo '
                      </select>
                    </div>';
                    if ($rowastatusseg['conclusionart35'] == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
                      echo '<div class="col-md-6 mb-3 validar" id="OTHER3ART35">
                        <label for="OTHER_ART35">ESPECIFIQUE</label>
                        <input class="form-control" id="OTHER_ART35" name="OTHER_ART35" placeholder="" value="'.$rowastatusseg['otherart35'].'" type="text">
                      </div>';
                    }
                  }
                   ?>

                   <div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35m" style="display:none;">
                     <label for="CONCLUSION_ART35">CONCLUSIÓN ARTICULO 35</label>
                     <select class="form-select form-select-lg" name="CONCLUSION_ART35" onChange="modotherart35s(this)">
                       <option disabled selected value="">SELECCIONE UNA OPCIÓN</option>
                       <?php
                       $art35 = "SELECT * FROM conclusionart35";
                       $answerart35 = $mysqli->query($art35);
                       while($art35s = $answerart35->fetch_assoc()){
                         echo "<option value='".$art35s['nombre']."'>".$art35s['nombre']."</option>";
                       }
                       ?>
                     </select>
                   </div>

                   <div class="col-md-6 mb-3 validar" id="OTHER3ART35" style="display:none;">
                     <label for="OTHER_ART351">ESPECIFIQUE</label>
                     <input class="form-control" id="OTHER_ART351" name="OTHER_ART351" placeholder="" value="" type="text">
                   </div>

                   <div class="col-md-6 mb-3 validar">
                     <label for="FECHA_DESINCORPORACION">FECHA DE DESINCORPORACION<span class="required"></span></label>
                     <input class="form-control" id="FECHA_DESINCORPORACION_DOS" name="FECHA_DESINCORPORACION" placeholder=""  type="date" value="<?php echo $rowstatusexp['date_desincorporacion']; ?>">
                   </div>

                   <div class="col-md-6 mb-3 validar">
                     <label for="ESTATUS_EXPEDIENTE">ESTATUS DEL EXPEDIENTE<span class="required"></span></label>
                     <select class="form-select form-select-lg" id="ESTATUS_EXPEDIENTE" name="ESTATUS_EXPEDIENTE" >
                       <option style="visibility: hidden" id="tab3-estatus-expediente" value="<?php echo $rowstatusexp['status'] ?>"><?php echo $rowstatusexp['status']; ?></option>
                       <?php
                       $statusexp = "SELECT * FROM statusexpediente";
                       $answerstatusexp = $mysqli->query($statusexp);
                       while($statusexps = $answerstatusexp->fetch_assoc()){
                         echo "<option value='".$statusexps['nombre']."'>".$statusexps['nombre']."</option>";
                       }
                       ?>
                     </select>
                   </div>

                </div>

                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">FUENTE</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="FUENTE_S">FUENTE<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="FUENTE_S" name="FUENTE_S" onChange="radicacionfuenteS(this)" >
                      <option style="visibility: hidden" id="tab3-fuente-seguimiento" value"<?php echo $rowfuente3['fuente']; ?>"><?php echo $rowfuente3['fuente']; ?></option>
                      <?php
                      $rad = "SELECT * FROM radicacion";
                      $answerrad = $mysqli->query($rad);
                      while($rads = $answerrad->fetch_assoc()){
                        echo "<option value='".$rads['nombre']."'>".$rads['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <?php
                  $fuentemedida = "SELECT * FROM radicacion_mascara3 WHERE id_persona = '$id_person'";
                  $resultadofuentemedida = $mysqli->query($fuentemedida);
                  $rowfuentemedida = $resultadofuentemedida->fetch_array(MYSQLI_ASSOC);
                  if ($rowfuentemedida['fuente']=='OFICIO') {
                    echo '<div class="col-md-6 mb-3 validar" id="OFICIO_S" >
                      <label for="OFICIO_S">OFICIO<span class="required"></span></label>
                      <input class="form-control" id="OFICIO_S" name="OFICIO_S" placeholder="" value="'.$rowfuentemedida['descripcion'].'"  type="text" >
                    </div>';
                  }elseif ($rowfuentemedida['fuente']=='CORREO') {
                    echo '<div class="col-md-6 mb-3 validar" id="CORREO_S">
                      <label for="CORREO_S">CORREO<span class="required"></span></label>
                      <input class="form-control" id="CORREO_S" name="CORREO_S" placeholder=""  value="'.$rowfuentemedida['descripcion'].'" type="text" >
                    </div>';
                  }elseif ($rowfuentemedida['fuente']=='EXPEDIENTE') {
                    echo '<div class="col-md-6 mb-3 validar"  id="EXPEDIENTE_S">
                      <label for="EXPEDIENTE_S">EXPEDIENTE<span class="required"></span></label>
                      <input class="form-control" id="EXPEDIENTE_S" name="EXPEDIENTE_S" placeholder=""  value="'.$rowfuentemedida['descripcion'].'" type="text" >
                    </div>';
                  }elseif ($rowfuentemedida['fuente']=='OTRO') {
                    echo '<div class="col-md-6 mb-3 validar" id="OTRO_S">
                      <label for="OTRO_S">OTRO<span class="required"></span></label>
                      <input class="form-control" id="OTRO_S" name="OTRO_S" placeholder=""  value="'.$rowfuentemedida['descripcion'].'" type="text" >
                    </div>';
                  }
                   ?>

                   <div class="col-md-6 mb-3 validar" id="OFICIO_S" style="display:none;">
                     <label for="OFICIO_S">OFICIO<span class="required"></span></label>
                     <input class="form-control" id="OFICIO_S1" name="OFICIO_S1" placeholder="" value=""  type="text" >
                   </div>

                   <div class="col-md-6 mb-3 validar"  id="EXPEDIENTE_S" style="display:none;">
                     <label for="EXPEDIENTE_S">EXPEDIENTE<span class="required"></span></label>
                     <input class="form-control" id="EXPEDIENTE_S1" name="EXPEDIENTE_S1" placeholder=""  value="" type="text" >
                   </div>

                   <div class="col-md-6 mb-3 validar"  id="CORREO_S" style="display:none;">
                     <label for="EXPEDIENTE_S">CORREO<span class="required"></span></label>
                     <input class="form-control" id="CORREO_S1" name="CORREO_S1" placeholder=""  value="" type="text" >
                   </div>

                   <div class="col-md-6 mb-3 validar" id="OTRO_S" style="display:none;">
                     <label for="OTRO_S">OTRO<span class="required"></span></label>
                     <input class="form-control" id="OTRO_S1" name="OTRO_S1" placeholder=""  value="" type="text" >
                   </div>

                </div>
                <div class="row">
                  <div class="row">

                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">COMENTARIOS</h3>
                  </div>
                  <section class="text-center" >
                  <textarea name="COMENTARIO" id="COMENTARIO" rows="8" cols="80" placeholder="Escribe tus comentarios" maxlength="100"></textarea>
                </section>
                </div>

                <div class="row">
                  <div>
                      <br>
                      <br>
                      <button style="display: block; margin: 0 auto;" class="btn btn-success" id="enter" type="submit">ACTUALIZAR</button>
                  </div>
                </div>
              </form>
            </div>
          </article>

    		</div>
    	</div>
      <!--  -->
  </div>
</div>
<div class="contenedor">
<a href="../subdireccion_de_estadistica_y_preregistro/detalles_expediente.php?id=<?=$name_folio?>" class="btn-flotante">REGRESAR</a>
</div>

<!-- modal del convenio MODIFICATORIO -->
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">AGREGAR CONVENIO MODIFICATORIO</h4>
    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form" action="agregar_convenio_modificatorio.php?folio=<?php echo $id_person; ?>">
     <label>FOLIO DEL EXPEDIENTE</label>
     <input type="text" name="nombres" id="name" class="form-control" value="<?php echo $rowfol['folioexpediente']; ?>" readonly>
     <br />
     <label>ID UNICO DE LA PERSONA PROPUESTA</label>
     <input type="text" name="nombres" id="name" class="form-control" value="<?php echo $rowfol['identificador']; ?>" readonly>
     <br />
     <label>FECHA DE LA FIRMA DEL CONVENIO MODIFICATORIO</label>
     <input type="date" name="fecha_firma_mod" id="fecha_firma_mod" class="form-control" required>
     <br />
     <label>DESCRIPCION</label>
     <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
     <br />
     <!-- <input type="submit" name="agregar" id="agregar"  class="btn btn-success" > -->
     <button style="display: block; margin: 0 auto;" class="btn btn-success" type="submit" name="button">agregar</button>
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
   </div>
  </div>
 </div>
</div>
<!-- fin modal  -->

<!-- modal del convenio adhesion -->
<div id="add_data_Modal_convenio" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">AGREGAR CONVENIO DE ADHESION</h4>
    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form" action="agregar_convenio_adhesion.php?folio=<?php echo $id_person; ?>">
     <label>FOLIO DEL EXPEDIENTE</label>
     <input type="text" name="nombres" id="name" class="form-control" value="<?php echo $rowfol['folioexpediente']; ?>" readonly>
     <br />
     <label>ID UNICO DE LA PERSONA PROPUESTA</label>
     <input type="text" name="nombres" id="name" class="form-control" value="<?php echo $rowfol['identificador']; ?>" readonly>
     <br />
     <label>FECHA DE LA FIRMA DEL CONVENIO DE ADHESION</label>
     <input type="date" name="fecha_firma_mod" id="fecha_firma_mod" class="form-control" required>
     <br />
     <label>VIGENCIA</label>
     <input type="text" name="vigencia_con_adh" id="vigencia_con_adh" class="form-control" required>
     <br />
     <!-- <input type="submit" name="agregar" id="agregar"  class="btn btn-success" > -->
     <button style="display: block; margin: 0 auto;" class="btn btn-success" type="submit" name="button">agregar</button>
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
   </div>
  </div>
 </div>
</div>
<!-- fin modal  -->

<!-- SCRIPT DE FECHAS  -->
<script type="text/javascript">
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1;
var yyyy = today.getFullYear();
if(dd<10){
      dd='0'+dd
  }
  if(mm<10){
      mm='0'+mm
  }
today = yyyy+'-'+mm+'-'+dd;
document.getElementById("FECHA_SOLICITUD").setAttribute("max", today);
document.getElementById("FECHA_NACIMIENTO_PERSONA").setAttribute("max", today);
document.getElementById("FECHA_AUTORIZACION").setAttribute("max", today);
document.getElementById("FECHA_CONVENIO_ENTENDIMIENTO_UNO").setAttribute("max", today);
document.getElementById("FECHA_DESINCORPORACION_UNO").setAttribute("max", today);

document.getElementById("FECHA_AUTORIZACION_ANALISIS").setAttribute("max", today);
document.getElementById("FECHA_CONVENIO_ENTENDIMIENTO_DOS").setAttribute("max", today);
document.getElementById("FECHA_DESINCORPORACION_DOS").setAttribute("max", today);

</script>


<script>
const fechaNacimiento = document.getElementById("FECHA_NACIMIENTO_PERSONA");
const edad = document.getElementById("EDAD_PERSONA");

const calcularEdad = (fechaNacimiento) => {
    const fechaActual = new Date();
    const anoActual = parseInt(fechaActual.getFullYear());
    const mesActual = parseInt(fechaActual.getMonth()) + 1;
    const diaActual = parseInt(fechaActual.getDate());


    const anoNacimiento = parseInt(String(fechaNacimiento).substring(0, 4));
    const mesNacimiento = parseInt(String(fechaNacimiento).substring(5, 7));
    const diaNacimiento = parseInt(String(fechaNacimiento).substring(8, 10));

    let edad = anoActual - anoNacimiento;
    if (mesActual < mesNacimiento) {
        edad--;
    } else if (mesActual === mesNacimiento) {
        if (diaActual < diaNacimiento) {
            edad--;
        }
    }
    return edad;
};


window.addEventListener('load', function () {

    fechaNacimiento.addEventListener('change', function () {
        if (this.value) {
            function enviarEdad() {
              calcularEdad = document.getElementById("EDAD_PERSONA").value;
            }
            // console.log(`La edad es: ${calcularEdad(this.value)} años`);

            document.getElementById("EDAD_PERSONA").value = `${calcularEdad(this.value)} años`;
            var mayor = "MAYOR DE EDAD";
            var menor = "MENOR DE EDAD";

            if (calcularEdad(this.value) >= 18) {

              //console.log("MAYOR DE EDAD");
              document.getElementById("GRUPO_EDAD").value = mayor;

            } else if (calcularEdad(this.value) <= 18){

              //console.log("MENOR DE EDAD");
              document.getElementById("GRUPO_EDAD").value = menor;

            }
        }
    });

});

</script>

<script>

// var numero = document.getElementById('VIGENCIA_CONVENIO').value;
// var fechaInicio = document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').value;


// function calcularFecha() {

//   var fecha = new Date(fechaInicio);
//   var dias = parseInt(numero)+ 1;

//   fecha.setDate(fecha.getDate() + dias);
//   const anio = parseInt(fecha.getFullYear());
//   const mes = parseInt(fecha.getMonth());
//   const dia = parseInt(fecha.getDate());

//   // nueva fecha sumada
//   var nuevaFecha = dia + '/' + (mes + 1) + '/' + anio;
//   formato de salida para la fecha
//   // 2021/11/29
//   // 2021-12-1
//   console.log(nuevaFecha);
//   document.getElementById("FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO").value = nuevaFecha;
// }



</script>

<script type="text/javascript">
var fechaConvenio = document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS');
var vigencia = document.getElementById('VIGENCIA_CONVENIO');
var fechaTermino = document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO');
var fechaInicio;
var diasVigencia;



    fechaConvenio.addEventListener('change', obtenerFecha);
    vigencia.addEventListener('change',obtenerVigencia);

    function obtenerFecha(e) {
      fechaInicio = e.target.value;
    }

    function obtenerVigencia(e) {
      diasVigencia = e.target.value;

      var fecha = new Date(fechaInicio);
      var dias = parseInt(diasVigencia);

      fecha.setDate(fecha.getDate() + dias);
      const anio = parseInt(fecha.getFullYear());
      const mes = parseInt(fecha.getMonth());
      const dia = parseInt(fecha.getDate());


      var nuevaFecha = dia + '/' + (mes + 1) + '/' + anio;

      document.getElementById("FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO").value = nuevaFecha;

    }

</script>

</script>

</body>
</html>
