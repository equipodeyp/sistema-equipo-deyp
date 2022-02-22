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
$fol=" SELECT * FROM datospersonales WHERE folioexpediente='$fol_exp'";
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
$aut = "SELECT * FROM autoridad WHERE folioexpediente = '$fol_exp'";
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
$process = "SELECT * FROM procesopenal WHERE folioexpediente = '$fol_exp'";
$resultadoprocess = $mysqli->query($process);
$rowprocess = $resultadoprocess->fetch_array(MYSQLI_ASSOC);
// datos de la valoracion juridica
$valjur = "SELECT * FROM valoracionjuridica WHERE folioexpediente = '$fol_exp'";
$resultadovaljur = $mysqli->query($valjur);
$rowvaljur = $resultadovaljur->fetch_array(MYSQLI_ASSOC);
// datos de la determinacion de la incorporacion
$detinc = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_person'";
$resultadodetinc = $mysqli->query($detinc);
$rowdetinc = $resultadodetinc->fetch_array(MYSQLI_ASSOC);
// datos de la radicacion de la informacion
$radmas = "SELECT * FROM radicacion_mascara1 WHERE id_persona = '$id_person'";
$resultadoradmas = $mysqli->query($radmas);
// $rowradmas = $resultadoradmas->fetch_array(MYSQLI_ASSOC);
//consulta de los datos de origen de la persona
$domicilio = "SELECT * FROM domiciliopersona WHERE id_persona = '$id_person'";
$resultadodomicilio = $mysqli->query($domicilio);
$rowdomicilio = $resultadodomicilio->fetch_array(MYSQLI_ASSOC);
// consulta del seguimiento del EXPEDIENTE
$seguimexp = "SELECT * FROM seguimientoexp WHERE id_persona = '$id_person'";
$resultadoseguimexp = $mysqli->query($seguimexp);
$rowseguimexp = $resultadoseguimexp->fetch_array(MYSQLI_ASSOC);
// consulta de la fuente de la mascara 3
// $fuente3 = "SELECT * FROM radicacion_mascara3 WHERE id_persona = '$id_person'";
// $resultadofuente3 = $mysqli->query($fuente3);
// $rowfuente3 = $resultadofuente3->fetch_array(MYSQLI_ASSOC);

$expediente = "SELECT * FROM expediente WHERE fol_exp = '$fol_exp'";
$res_expediente = $mysqli->query($expediente);
$fila_expediente = $res_expediente->fetch_array(MYSQLI_ASSOC);

$analisis_exp = "SELECT * FROM analisis_expediente WHERE folioexpediente = '$fol_exp'";
$res_analsis_expediente = $mysqli->query($analisis_exp);
$fila_analisis_expediente = $res_analsis_expediente->fetch_assoc();

$convadh1 = "SELECT * FROM convenio_adh_expediente WHERE folioexpediente = '$fol_exp'";
$res_convadh1 = $mysqli->query($convadh1);
$fila_convadh1 = $res_convadh1->fetch_assoc();

$convmod1 = "SELECT * FROM convenio_mod_expediente WHERE folioexpediente = '$fol_exp'";
$res_convmod1 = $mysqli->query($convmod1);
$fila_convmod1 = $res_convmod1->fetch_assoc();

$seguimiento_exped = "SELECT * FROM statusseguimiento WHERE folioexpediente = '$fol_exp'";
$res_seguimiento_exped = $mysqli->query($seguimiento_exped);
$fila_seguiimiento_exped = $res_seguimiento_exped->fetch_assoc();

$fuentemedida = "SELECT * FROM radicacion_mascara3 WHERE folioexpediente = '$fol_exp'";
$resultadofuentemedida = $mysqli->query($fuentemedida);
$rowfuentemedida = $resultadofuentemedida->fetch_assoc();

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
              <form class=" container well form-horizontal" action="actualizar_expediente_seguimiento.php?folio=<?php echo $fol_exp; ?>" method="post">
                <div class="row">
                  <div class="alert alert-info">
                    <h3 style="text-align:center">DATOS GENERALES DEL EXPEDIENTE</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="expediente">ID DEL EXPEDIENTE</label>
                    <input class="form-control" type="text" name="idexpediente" value="<?php echo $fila_expediente['fol_exp']; ?>" readonly>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="fecha_recepcion">FECHA DE RECEPCIÓN</label>
                    <input class="form-control" type="text" name="fecha_recepcion" value="<?php echo $fila_expediente['fecharecep']; ?>" readonly>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="sede">SEDE</label>
                    <input class="form-control" type="text" name="sede" value="<?php echo $fila_expediente['sede']; ?>" readonly>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="autoridad">NOMBRE DE LA AUTORIDAD</label>
                    <input class="form-control" type="text" name="autoridad" value="<?php echo $rowaut['nombreautoridad']; ?>" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">DATOS DE LA INVESTIGACIÓN O PROCESO PENAL</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="delito_principal">DELITO PRINCIPAL</label>
                    <input class="form-control" type="text" name="delito_principal" value="<?php echo $rowprocess['delitoprincipal']; ?>" readonly>
                  </div>
                  <?php
                    if ($rowprocess['delitoprincipal'] == 'OTRO') {
                      echo
                      '<div class="col-md-6 mb-3 validar">
                        <label for="delito_principal">OTRO DELITO PRINCIPAL</label>
                        <input class="form-control" type="text" name="delito_principal" value="'.$rowprocess['otrodelitoprincipal'].'" readonly>
                        </div>';
                      }
                  ?>
                  <div class="col-md-6 mb-3 validar">
                    <label for="etapa_procedimiento">ETAPA DEL PROCEDIMIENTO</label>
                    <input class="form-control" type="text" name="atapa_procedimiento" value="<?php echo $rowprocess['etapaprocedimiento']; ?>" readonly>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="nuc">NUC</label>
                    <input class="form-control" type="text" name="nuc" value="<?php echo $rowprocess['nuc']; ?>" readonly>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="municipio_radicacion">MUNICIPIO DE RADICACIÓN</label>
                    <input class="form-control" type="text" name="municipio_radicacion" value="<?php echo $rowprocess['numeroradicacion']; ?>" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">VALORACIÓN JURÍDICA</h3>
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
                    <h3 style="text-align:center">CONVENIOS DE ADHESIÓN</h3>
                  </div>
                  <div id="contenido">
            		  	<table class="table table-striped table-dark table-bordered">
            		  		<thead class="table-success">
            		  			<th style="text-align:center">No.</th>
                        <th style="text-align:center">ID PERSONA</th>
                        <th style="text-align:center">CONVENIO</th>
                        <th style="text-align:center">CONVENIO DE ADHESIÓN</th>
                        <th style="text-align:center">CONVENIO MODIFICATORIO</th>
            		  		</thead>
                      <?php
                      $conexion=mysqli_connect("localhost","root","","sistemafgjem");
                      $cont_med = 0;
            		      $tabla="SELECT * FROM datospersonales WHERE folioexpediente ='$fol_exp'";
            		       $var_resultado = $mysqli->query($tabla);
            		      while ($var_fila=$var_resultado->fetch_array())
            		      {
                        $id_persona_convenio = $var_fila['id'];
                        $cont_med = $cont_med + 1;
                        $convenio = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_persona_convenio'";
                        $res_convenio = $mysqli->query($convenio);
                        while ($fila_convenio = $res_convenio->fetch_array()) {
                          echo "<tr>";
              		          echo "<td style='text-align:center'>"; echo $cont_med; echo "</td>";
              		          echo "<td style='text-align:center'>"; echo $var_fila['identificador']; "</td>";
              		          echo "<td style='text-align:center'>";
                              if ($fila_convenio['convenio'] == 'FORMALIZADO') {
                                echo "<i class='fas fa-check'></i>";
                              }else {
                                echo "<i class='fas fa-times'></i>";
                              }
                            "</td>";
                            echo "<td style='text-align:center'>";
                              $convenio_adhesion = "SELECT * FROM convenio_adhesion WHERE id_persona = '$id_persona_convenio'";
                              $res_convenio_adhesion = $conexion->query($convenio_adhesion);
                              $fila_convenio_adhesion = mysqli_fetch_array($res_convenio_adhesion);
                              if ($fila_convenio_adhesion > 0) {
                                echo "<i class='fas fa-check'></i>";
                              }else {
                                echo "<i class='fas fa-times'></i>";
                              }
                            echo "</td>";
                            echo "<td style='text-align:center'>";
                              $convenio_modificatorio = "SELECT * FROM convenio_modificatorio WHERE id_persona = '$id_persona_convenio'";
                              $res_convenio_modificatorio = $conexion->query($convenio_modificatorio);
                              $fila_convenio_modificatorio = mysqli_fetch_array($res_convenio_modificatorio);
                              if ($fila_convenio_modificatorio > 0) {
                                echo "<i class='fas fa-check'></i>";
                              }else {
                                echo "<i class='fas fa-times'></i>";
                              }
                            echo "</td>";
              		        echo "</tr>";
                        }
            		      }
            		      ?>
            		  	</table>
            		  </div>
            			<div id="footer">
            		  </div>
                </div>


                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">ANÁLISIS</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="personas_propuestas">PERSONAS PROPUESTAS</label>
                    <input class="form-control" type="text" name="personas_propuestas" value="<?php echo $fila_analisis_expediente['personas_propuestas'];?>">
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="ANALISIS_MULTIDISCIPLINARIO">ANÁLISIS MULTIDISCIPLINARIO</label>
                    <select class="form-select form-select-lg" name="ANALISIS_MULTIDISCIPLINARIO">
                      <option style="visibility: hidden" id="tab3-analisis-multidisciplinario" value="<?php echo $fila_analisis_expediente['analisis'];?>"><?php echo $fila_analisis_expediente['analisis'];?></option>
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
                      <option style="visibility: hidden" id="tab3-incorporacion" value="<?php echo $fila_analisis_expediente['incorporacion'];?>"><?php echo $fila_analisis_expediente['incorporacion'];?></option>
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
                    <label for="FECHA_AUTORIZACION_ANALISIS">FECHA DE AUTORIZACIÓN DE ANÁLISIS MULTIDISCIPLINARIO<span class="required"></span></label>
                    <input class="form-control" id="FECHA_AUTORIZACION_ANALISIS" name="FECHA_AUTORIZACION_ANALISIS" placeholder=""  type="date" value="<?php echo $rowseguimexp['date_autorizacion']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="CONVENIO_DE_ENTENDIMIENTO">CONVENIO DE ENTENDIMIENTO<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="CONVENIO_DE_ENTENDIMIENTO" name="CONVENIO_DE_ENTENDIMIENTO">
                      <option style="visibility: hidden" id="tab3-convenio-entendimiento" value="<?php echo $fila_analisis_expediente['convenio'];?>"><?php echo $fila_analisis_expediente['convenio'];?></option>
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
                    <label for="FECHA_CONVENIO_ENTENDIMIENTO">FECHA DEL CONVENIO ENTENDIMIENTO<span class="required"></span></label>
                    <input class="form-control" id="FECHA_CONVENIO_ENTENDIMIENTO" name="FECHA_CONVENIO_ENTENDIMIENTO" placeholder="" type="date" value="<?php echo $fila_analisis_expediente['fecha_convenio'];?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="VIGENCIA_CONVENIO">VIGENCIA CONVENIO</label>
                    <input class="form-control" id="VIGENCIA_CONVENIO" type="text" name="VIGENCIA_CONVENIO" value="<?php echo $fila_analisis_expediente['vigencia'];?>">
                  </div>


                  <div class="col-md-6 mb-3 validar">
                    <label for="personas_incorporadas">PERSONAS INCORPORADAS</label>
                    <input class="form-control" type="text" name="personas_incorporadas" value="<?php echo $fila_analisis_expediente['personasincorporadas'];?>">
                  </div>

                </div>

                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">CONVENIO ADHESIÓN</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="convenio_adhesion">CONVENIO DE ADHESION</label>
                    <input class="form-control" type="text" name="convenio_adhesion" value="<?php echo $fila_convadh1['convenio']; ?>">
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="fecha_convenio_adhesion">FECHA DEL CONVENIO DE ADHESION</label>
                    <input class="form-control" type="date" name="fecha_convenio_adhesion" value="<?php echo $fila_convadh1['fecha']; ?>">
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="vigencia_adhesion">VIGENCIA</label>
                    <input class="form-control" type="text" name="vigencia_adhesion" value="<?php echo $fila_convadh1['vigencia']; ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">CONVENIO MODIFICATORIO</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="convenio_modificatorio">CONVENIO MODIFICATORIO</label>
                    <input class="form-control" type="text" name="convenio_modificatorio" value="<?php echo $fila_convmod1['convenio']; ?>">
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="fecha_modificatorio">FECHA DEL CONVENIO MODIFICATORIO</label>
                    <input class="form-control" type="date" name="fecha_modificatorio" value="<?php echo $fila_convmod1['fecha']; ?>">
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
                      <option style="visibility: hidden" id="tab3-conclusion-cancelaciom" value="<?php echo $fila_seguiimiento_exped['conclu_cancel']; ?>"><?php echo $fila_seguiimiento_exped['conclu_cancel']; ?></option>
                      <option value="CANCELACION">CANCELACIÓN</option>
                      <option value="CONCLUSION">CONCLUSIÓN</option>
                    </select>
                  </div>

                  <?php
                  if ($fila_seguiimiento_exped['conclu_cancel']== 'CONCLUSION') {
                    echo '<div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35m">
                      <label for="CONCLUSION">CONCLUSION ARTICULO 35</label>
                      <select onclick="myFunctionHidden" class="form-select form-select-lg" name="CONCLUSION_ART35" onChange="modotherart35s(this)">
                        <option id="tab3-art35" value="'.$fila_seguiimiento_exped['conclusionart35'].'">'.$fila_seguiimiento_exped['conclusionart35'].'</option>';
                        $art35 = "SELECT * FROM conclusionart35";
                        $answerart35 = $mysqli->query($art35);
                        while($art35s = $answerart35->fetch_assoc()){
                          echo "<option value='".$art35s['nombre']."'>".$art35s['nombre']."</option>";
                        }
                        echo '
                      </select>
                    </div>';
                    if ($fila_seguiimiento_exped['conclusionart35'] == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
                      echo '<div class="col-md-6 mb-3 validar" id="OTHER3ART35">
                        <label for="OTHER_ART35">ESPECIFIQUE</label>
                        <input class="form-control" id="OTHER_ART351" name="OTHER_ART3512" placeholder="" value="'.$fila_seguiimiento_exped['otherart35'].'" type="text">
                      </div>';
                    }
                  }
                   ?>

                   <div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35m" style="display:none;">
                     <label for="CONCLUSION_ART35">CONCLUSIÓN ARTÍCULO 35</label>
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
                     <label for="FECHA_DESINCORPORACION">FECHA DE DESINCORPORACIÓN<span class="required"></span></label>
                     <input class="form-control" id="FECHA_DESINCORPORACION_DOS" name="FECHA_DESINCORPORACION" placeholder=""  type="date" value="<?php echo $rowstatusexp['date_desincorporacion']; ?>">
                   </div>

                   <div class="col-md-6 mb-3 validar">
                     <label for="ESTATUS_EXPEDIENTE">ESTATUS DEL EXPEDIENTE<span class="required"></span></label>
                     <select class="form-select form-select-lg" id="ESTATUS_EXPEDIENTE" name="ESTATUS_EXPEDIENTE" >
                       <option style="visibility: hidden" id="tab3-estatus-expediente" value="<?php echo $fila_seguiimiento_exped['status']; ?>"><?php echo $fila_seguiimiento_exped['status']; ?></option>
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
                      <option style="visibility: hidden" id="tab3-fuente-seguimiento" value"<?php echo $rowfuentemedida['fuente']; ?>"><?php echo $rowfuentemedida['fuente']; ?></option>
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
                   <div class="col-md-6 mb-3 validar"  id="CORREO_S" style="display:none;">
                     <label for="EXPEDIENTE_S">CORREO<span class="required"></span></label>
                     <input class="form-control" id="CORREO_S1" name="CORREO_S1" placeholder=""  value="" type="text" >
                   </div>

                   <div class="col-md-6 mb-3 validar"  id="EXPEDIENTE_S" style="display:none;">
                     <label for="EXPEDIENTE_S">EXPEDIENTE<span class="required"></span></label>
                     <input class="form-control" id="EXPEDIENTE_S1" name="EXPEDIENTE_S1" placeholder=""  value="" type="text" >
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

                  <textarea name="COMENTARIO" id="COMENTARIO" rows="8" cols="80" placeholder="Escribe tus comentarios" maxlength="100"></textarea>

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
<a href="../subdireccion_de_estadistica_y_preregistro/detalles_expediente.php?id=<?=$fol_exp?>" class="btn-flotante">REGRESAR</a>
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
     <label>ID ÚNICO DE LA PERSONA</label>
     <input type="text" name="nombres" id="name" class="form-control" value="<?php echo $rowfol['identificador']; ?>" readonly>
     <br />
     <label>FECHA DE LA FIRMA DEL CONVENIO MODIFICATORIO</label>
     <input type="date" name="fecha_firma_mod" id="fecha_firma_mod" class="form-control" required>
     <br />
     <label>DESCRIPCIÓN</label>
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
    <h4 class="modal-title">AGREGAR CONVENIO DE ADHESIÓN</h4>
    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form" action="agregar_convenio_adhesion.php?folio=<?php echo $id_person; ?>">
     <label>FOLIO DEL EXPEDIENTE</label>
     <input type="text" name="nombres" id="name" class="form-control" value="<?php echo $rowfol['folioexpediente']; ?>" readonly>
     <br />
     <label>ID ÚNICO DE LA PERSONA</label>
     <input type="text" name="nombres" id="name" class="form-control" value="<?php echo $rowfol['identificador']; ?>" readonly>
     <br />
     <label>FECHA DE LA FIRMA DEL CONVENIO DE ADHESIÓN</label>
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
