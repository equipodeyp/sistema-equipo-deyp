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
//consulta de los datos de origen de la persona
$domicilio = "SELECT * FROM domiciliopersona WHERE id_persona = '$id_person'";
$resultadodomicilio = $mysqli->query($domicilio);
$rowdomicilio = $resultadodomicilio->fetch_array(MYSQLI_ASSOC);

$expediente = "SELECT * FROM expediente WHERE fol_exp = '$fol_exp'";
$res_expediente = $mysqli->query($expediente);
$fila_expediente = $res_expediente->fetch_array(MYSQLI_ASSOC);

$analisis_exp = "SELECT * FROM analisis_expediente WHERE folioexpediente = '$fol_exp'";
$res_analsis_expediente = $mysqli->query($analisis_exp);
$fila_analisis_expediente = $res_analsis_expediente->fetch_assoc();

$seguimiento_exped = "SELECT * FROM statusseguimiento WHERE folioexpediente = '$fol_exp'";
$res_seguimiento_exped = $mysqli->query($seguimiento_exped);
$fila_seguiimiento_exped = $res_seguimiento_exped->fetch_assoc();
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
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/expediente.css">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="../css/main2.css">
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
  <!-- <script src="../js/Javascript.js"></script>
  <script src="../js/validar_campos.js"></script>
  <script src="../js/verificar_camposm1.js"></script>
  <script src="../js/mascara2campos.js"></script>
  <script src="../js/mod_medida.js"></script> -->
  <!-- <link rel="stylesheet" href="../css/estilos.css">
  <script src="../js/main.js"></script> -->
  <!-- <script src="../js/Javascript.js"></script>
  <script src="../js/validar_campos.js"></script>
  <script src="../js/validarmascara3.js"></script> -->

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
      $user = $row_user['usuario'];

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
           		<ul>
				   	    <a style="text-align:center" class='user-nombre' href='create_ticket.php?folio=<?php echo $fila_expediente['fol_exp']; ?>'><button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
            	</ul>
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
    		<!-- <ul class="tabs">
    			<li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO DEL EXPEDIENTE</span></a></li>
    		</ul> -->

    		<div class="secciones">
    			<article id="tab3">
            <div class="container">
              <form class=" container well form-horizontal" action="actualizar_expediente_seguimiento.php?folio=<?php echo $fol_exp; ?>" method="post">
                <div class="secciones form-horizontal sticky breadcrumb flat">
                  <a href="../subdireccion_de_estadistica_y_preregistro/menu.php">REGISTROS</a>
                  <a href="../subdireccion_de_estadistica_y_preregistro/detalles_expediente.php?id=<?=$fol_exp?>">EXPEDIENTE</a>
                  <a class="actived">SEGUIMIENTO</a>
                </div>
                <div class="row">
                  <div class="alert div-title">
                    <h3 style="text-align:center">DATOS GENERALES DEL EXPEDIENTE</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="expediente">FOLIO DEL EXPEDIENTE DE PROTECCIÓN</label>
                    <input class="form-control" type="text" name="idexpediente" value="<?php echo $fila_expediente['fol_exp']; ?>" disabled>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="fecha_recepcion">FECHA DE RECEPCIÓN</label>
                    <input class="form-control" type="text" name="fecha_recepcion" value="<?php echo $fila_expediente['fecharecep']; ?>" disabled>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="sede">SEDE</label>
                    <input class="form-control" type="text" name="sede" value="<?php echo $fila_expediente['sede']; ?>" disabled>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="autoridad">NOMBRE DE LA AUTORIDAD</label>
                    <input class="form-control" type="text" name="autoridad" value="<?php echo $rowaut['nombreautoridad']; ?>" disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert div-title">
                    <h3 style="text-align:center">DATOS DE LA INVESTIGACIÓN O PROCESO PENAL</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="delito_principal">DELITO PRINCIPAL</label>
                    <input class="form-control" type="text" name="delito_principal" value="<?php echo $rowprocess['delitoprincipal']; ?>" disabled>
                  </div>
                  <?php
                    if ($rowprocess['delitoprincipal'] == 'OTRO') {
                      echo
                      '<div class="col-md-6 mb-3 validar">
                        <label for="delito_principal">OTRO DELITO PRINCIPAL</label>
                        <input class="form-control" type="text" name="delito_principal" value="'.$rowprocess['otrodelitoprincipal'].'" disabled>
                        </div>';
                      }
                  ?>
                  <div class="col-md-6 mb-3 validar">
                    <label for="etapa_procedimiento">ETAPA DEL PROCEDIMIENTO</label>
                    <input class="form-control" type="text" name="atapa_procedimiento" value="<?php echo $rowprocess['etapaprocedimiento']; ?>" disabled>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="nuc">NUC</label>
                    <input class="form-control" type="text" name="nuc" value="<?php echo $rowprocess['nuc']; ?>" disabled>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="municipio_radicacion">MUNICIPIO DE RADICACIÓN</label>
                    <input class="form-control" type="text" name="municipio_radicacion" value="<?php echo $rowprocess['numeroradicacion']; ?>" disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert div-title">
                    <h3 style="text-align:center">VALORACIÓN JURÍDICA</h3>
                  </div>
                    <div class="col-md-6 mb-3 validar">
                      <label for="RESULTADO_VALORACION_JURIDICA">RESULTADO VALORACIÓN JURÍDICA<span class="required"></span></label>
                      <select class="form-select form-select-lg" id="resul_val_jur" name="RESULTADO_VALORACION_JURIDICA" disabled>
                        <option value="<?php echo $rowvaljur['resultadovaloracion']; ?>"><?php echo $rowvaljur['resultadovaloracion']; ?></option>
                        <option value="SI_PROCEDE">SI_PROCEDE </option>
                        <option value="NO_PROCEDE">NO_PROCEDE</option>
                      </select>
                    </div>

                    <div class="col-md-6 mb-3 validar" id="motnoprocedencia">
                      <label for="MOTIVO_NO_PROCEDENCIA_JURIDICA">MOTIVO NO PROCEDENCIA JURÍDICA<span class="required"></span></label>
                      <select class="form-select form-select-lg" id="mot_no_procede" name="MOTIVO_NO_PROCEDENCIA_JURIDICA" disabled>
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
                  <div class="alert div-title">
                    <h3 style="text-align:center">CONVENIOS</h3>
                  </div>
                  <div id="contenido">
            		  	<table class="table table-striped table-dark table-bordered">
            		  		<thead class="table-success">
            		  			<th style="text-align:center">No.</th>
                        <th style="text-align:center">ID PERSONA</th>
                        <th style="text-align:center">CONVENIO DE ENTENDIMIENTO</th>
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
                        $id_in_p = $var_fila['identificador'];
                        // $cant_med11="SELECT COUNT(*) AS cant FROM evaluacion_persona WHERE id_unico = '$id_in_p' && tipo_convenio = 'CONVENIO MODIFICATORIO'";
                        // $res_cant_med11=$mysqli->query($cant_med11);
                        // $row_med11 = $res_cant_med11->fetch_array(MYSQLI_ASSOC);
                        // echo $row_med11['cant'];
                        // echo $id_persona_convenio;
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
                            $cant_med11="SELECT COUNT(*) AS cant FROM evaluacion_persona WHERE id_unico = '$id_in_p' && tipo_convenio = 'CONVENIO DE ADHESION'";
                            $res_cant_med11=$mysqli->query($cant_med11);
                            $row_med11 = $res_cant_med11->fetch_array(MYSQLI_ASSOC);
                            // echo $row_med11['cant'];
                              if ($row_med11['cant'] > 0) {
                                for ($i=0; $i < $row_med11['cant']; $i++) {
                                  echo "<i class='fas fa-check'></i>";
                                }
                              }else {
                                echo "<i class='fas fa-times'></i>";
                              }
                            echo "</td>";
                            echo "<td style='text-align:center'>";
                            $cant_med12="SELECT COUNT(*) AS cant FROM evaluacion_persona WHERE id_unico = '$id_in_p' && tipo_convenio = 'CONVENIO MODIFICATORIO'";
                            $res_cant_med12=$mysqli->query($cant_med12);
                            $row_med12 = $res_cant_med12->fetch_array(MYSQLI_ASSOC);
                              if ($row_med12['cant'] > 0) {
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
                  <div class="alert div-title">
                    <h3 style="text-align:center">DETERMINACIÓN DE LA INCORPORACIÓN</h3>
                  </div>
                  <?php
                  $cant_med="SELECT COUNT(*) AS cant FROM determinacionincorporacion
                  INNER JOIN datospersonales ON determinacionincorporacion.id_persona = datospersonales.id
                  WHERE determinacionincorporacion.folioexpediente = '$fol_exp' AND datospersonales.relacional = 'NO'";
                  $res_cant_med=$mysqli->query($cant_med);
                  $row_med = $res_cant_med->fetch_array(MYSQLI_ASSOC);
                  $cant_med1="SELECT COUNT(*) AS cant FROM determinacionincorporacion WHERE folioexpediente = '$fol_exp' AND convenio = 'FORMALIZADO'";
                  $res_cant_med1=$mysqli->query($cant_med1);
                  $row_med1 = $res_cant_med1->fetch_array(MYSQLI_ASSOC);
                  $cant_med2="SELECT COUNT(*) AS cant FROM datospersonales WHERE folioexpediente = '$fol_exp' AND estatus = 'SUJETO PROTEGIDO'";
                  $res_cant_med2=$mysqli->query($cant_med2);
                  $row_med2 = $res_cant_med2->fetch_array(MYSQLI_ASSOC);
                   ?>
                  <div class="col-md-4 mb-3 validar">
                    <label for="personas_propuestas">PERSONAS PROPUESTAS</label>
                    <input class="form-control" type="text" name="personas_propuestas" value="<?php echo $row_med['cant'];?>" disabled>
                  </div>
                  <div class="col-md-4 mb-3 validar">
                    <label for="personas_incorporadas">PERSONAS INCORPORADAS</label>
                    <input class="form-control" type="text" name="personas_incorporadas" value="<?php echo $row_med1['cant'];?>" disabled>
                  </div>
                  <div class="col-md-4 mb-3 validar">
                    <label for="personas_vigentes">PERSONAS VIGENTES</label>
                    <input class="form-control" type="text" name="personas_vigentes" value="<?php echo $row_med2['cant'];?>" disabled>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="ANALISIS_MULTIDISCIPLINARIO">ANÁLISIS MULTIDISCIPLINARIO</label>
                    <select id="ANALISIS" class="form-select form-select-lg" name="ANALISIS_MULTIDISCIPLINARIO">
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
                    <label id="LABEL_INCORPORACION" for="INCORPORACION">PROCEDENCIA DE LA INCORPORACIÓN<span class="required"></span></label>
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
                    <label id="LABEL_FECHA_AUTORIZACION" for="FECHA_AUTORIZACION_ANALISIS">FECHA DE AUTORIZACIÓN DE ANÁLISIS MULTIDISCIPLINARIO<span class="required"></span></label>
                    <input class="form-control" id="FECHA_AUTORIZACION_ANALISIS" name="FECHA_AUTORIZACION_ANALISIS" placeholder=""  type="date" value="<?php echo $fila_analisis_expediente['fecha_analisis']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_ID_ANALISIS" for="id_analisis">ID DE AUTORIZACIÓN DEL ANÁLISIS MULTIDISCIPLINARIO</label>
                    <input autocomplete="off" class="form-control" type="text" id="id_analisis" name="id_analisis" value="<?php echo $fila_analisis_expediente['id_analisis']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_CONVENIO_ENTENDIMIENTO" for="CONVENIO_DE_ENTENDIMIENTO">CONVENIO DE ENTENDIMIENTO<span class="required"></span></label>
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
                    <label id="LABEL_FECHA_FIRMA" for="FECHA_CONVENIO_ENTENDIMIENTO">FECHA DE LA FIRMA DEL CONVENIO ENTENDIMIENTO<span class="required"></span></label>
                    <input class="form-control" id="FECHA_CONVENIO_ENTENDIMIENTO" name="FECHA_CONVENIO_ENTENDIMIENTO" placeholder="" type="date" value="<?php echo $fila_analisis_expediente['fecha_convenio'];?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_FECHA_INICIO" for="fecha_inicio">FECHA DE INICIO DEL CONVENIO DE ENTENDIMIENTO</label>
                    <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" value="<?php echo $fila_analisis_expediente['fecha_inicio']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_VIGENCIA" for="VIGENCIA_CONVENIO">VIGENCIA CONVENIO</label>
                    <input autocomplete="off" class="form-control" id="VIGENCIA_CONVENIO" type="text" name="VIGENCIA_CONVENIO" value="<?php if ($fila_analisis_expediente['vigencia'] != '0') {
                      echo $fila_analisis_expediente['vigencia'];
                    }?>" placeholder="dias" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_FECHA_TERMINO" for="TERMINO_CONVENIO">FECHA DE TÉRMINO DE CONVENIO DE ENTENDIMIENTO</label>
                    <input disabled class="form-control" id="TERMINO_CONVENIO" type="text" name="TERMINO_CONVENIO" value="<?php if ($fila_analisis_expediente['fecha_termino_convenio'] != '0000-00-00') {
                      echo date("d/m/Y", strtotime($fila_analisis_expediente['fecha_termino_convenio']));
                    } ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_NUMERO_CONVENIOS" for="num_convenio">NÚMERO DE CONVENIOS FIRMADOS</label>
                    <input autocomplete="off" class="form-control" type="text" id="num_convenio" name="num_convenio" value="<?php echo $fila_analisis_expediente['num_convenios']; ?>" maxlength="2" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                  </div>
                </div>

                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert div-title">
                    <h3 style="text-align:center">EVALUACIONES DE SEGUIMIENTO</h3>
                  </div>
                  <div id="contenido">
                    <a href="registrar_evaluacion_seg.php?folio=<?php echo $fol_exp; ?>"><button style="display: block; margin: 0 auto;" type="button" id="btn_agregar" class="btn color-btn-success">AGREGAR</button></a>
            		  	<table class="table table-striped table-dark table-bordered">
                      <thead class="table-success">
            		  			<th style="text-align:center">No.</th>
                        <th style="text-align:center">ID</th>
                        <th style="text-align:center">ANALISIS MULTIDISCIPLINARIO</th>
                        <th style="text-align:center">DETALLE DEL CONVENIO</th>
                        <!-- <th style="text-align:center">FECHA DE AUTORIZACION</th>
                        <th style="text-align:center">TIPO DE CONVENIO</th>
                        <th style="text-align:center">FECHA FIRMA</th>
                        <th style="text-align:center">FECHA INICIO</th>
                        <th style="text-align:center">VIGENCIA</th> -->
                        <!-- <th style="text-align:center"><a href="registrar_evaluacion_seg.php?folio=<?php echo $identificador; ?>"> <button type="button" id="" class="btn btn-info">AGREGAR</button> </a> </th> -->
            		  		</thead>
                      <?php
                      $cont_med = '0';
            		      $tabla="SELECT * FROM evaluacion_expediente WHERE folioexpediente ='$fol_exp'";
            		       $var_resultado = $mysqli->query($tabla);
            		      while ($var_fila=$var_resultado->fetch_array())
            		      {
                        $cont_med = $cont_med + 1;
                        echo "<tr>";
            		          echo "<td style='text-align:center'>"; echo $cont_med; echo "</td>";
                          echo "<td style='text-align:center'>"; echo $var_fila['id_analisis']; echo "</td>";
                          echo "<td style='text-align:center'>"; echo $var_fila['analisis']; echo "</td>";
                          echo "<td style='text-align:center'>  <a href='detalles_convenio_exp.php?id=".$var_fila['id']."'> <button type='button' class='btn color-btn-success-white'>Detalles</button> </a> </td>";
                        //   echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($var_fila['fecha_aut'])); echo "</td>";
                        //   echo "<td style='text-align:center'>"; echo $var_fila['tipo_convenio']; echo "</td>";
            		        //   echo "<td style='text-align:center'>"; if ($var_fila['fecha_firma'] != '0000-00-00') {
                        //     echo date("d/m/Y",strtotime($var_fila['fecha_firma']));
                        //   } echo "</td>";
                        //   echo "<td style='text-align:center'>"; if ($var_fila['fecha_inicio'] != '0000-00-00') {
                        //     echo date("d/m/Y", strtotime($var_fila['fecha_inicio']));
                        //   } echo "</td>";
            		        //   echo "<td style='text-align:center'>"; if ($var_fila['vigencia'] != '0') {
                        //     echo $var_fila['vigencia'];
                        //   } echo "</td>";
                        //   // echo "<td style='text-align:center'>"; echo date("d/m/Y",strtotime($var_fila['fecha_vigencia'])); echo "</td>";
            		        // echo "</tr>";
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
                  <div class="alert div-title">
                    <h3 style="text-align:center">ESTATUS</h3>
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


                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_CONCLUSION_CANCELACION" for="CONCLUSION_CANCELACION">CONCLUSIÓN / CANCELACIÓN</label>
                    <select class="form-select form-select-lg" name="CONCLUSION_CANCELACION" id="CONCLUSION_CANCELACION">
                      <option style="visibility: hidden" id="tab3-conclusion-cancelaciom" value="<?php echo $fila_seguiimiento_exped['conclu_cancel']; ?>"><?php echo $fila_seguiimiento_exped['conclu_cancel']; ?></option>
                      <option value="CANCELACION">CANCELACION</option>
                      <option value="CONCLUSION">CONCLUSION</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                     <label for="FECHA_DESINCORPORACION" id="LABEL_FECHA_CANCELACION">FECHA DE CANCELACIÓN<span class="required"></span></label>
                     <label for="FECHA_DESINCORPORACION" id="LABEL_FECHA_CONCLUSION">FECHA DE CONCLUSIÓN<span class="required"></span></label>
                     <input class="form-control" id="FECHA_DESINCORPORACION_DOS" name="FECHA_DESINCORPORACION" placeholder=""  type="date" value="<?php echo $fila_seguiimiento_exped['date_desincorporacion']; ?>">
                   </div>

                  <!-- <?php
                  if ($fila_seguiimiento_exped['conclu_cancel']== 'CONCLUSION') {
                    echo '<div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35m">
                      <label for="CONCLUSION">CONCLUSION ARTICULO 35</label>
                      <select onclick="myFunctionHidden" class="form-select form-select-lg" name="CONCLUSION_ART35" id="ARTICULO_35_ESTATUS">
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
                   ?> -->

                   <div class="col-md-6 mb-3 validar">
                     <label id="LABEL_CONCLUSION_ART35" for="CONCLUSION_ART35">CONCLUSIÓN ARTÍCULO 35</label>
                     <select class="form-select form-select-lg" name="CONCLUSION_ART35" id="CONCLUSION_ART35">
                       <option style="visibility: hidden" disabled selected value="<?php echo $fila_seguiimiento_exped['conclusionart35']; ?>"><?php echo $fila_seguiimiento_exped['conclusionart35']; ?></option>
                       <?php
                       $art35 = "SELECT * FROM conclusionart35";
                       $answerart35 = $mysqli->query($art35);
                       while($art35s = $answerart35->fetch_assoc()){
                         echo "<option value='".$art35s['nombre']."'>".$art35s['nombre']."</option>";
                       }
                       ?>
                     </select>
                   </div>

                   <div class="col-md-6 mb-3 validar" >
                     <label id="LABEL_OTHER_ART351" for="OTHER_ART351">ESPECIFIQUE</label>
                     <input class="form-control" id="OTHER_ART351" name="OTHER_ART351" placeholder="" type="text" value="<?php echo $fila_seguiimiento_exped['otherart35']; ?>">
                   </div>



                </div>

                <div class="row">
                  <div class="row">

                    <hr class="mb-4">
                  </div>
                  <div class="alert div-title">
                    <h3 style="text-align:center">COMENTARIOS</h3>
                  </div>
                  <div class="">
                    <table class="table table-striped table-bordered " >
                      <thead >

                      </thead>
                      <?php
                      $tabla="SELECT * FROM comentario WHERE folioexpediente ='$name_folio'  AND comentario_mascara = '4'";
                      $var_resultado = $mysqli->query($tabla);
                      while ($var_fila=$var_resultado->fetch_array())
                      {
                      echo "<tr>";
                      echo "<td>";
                      echo "<ul>
                            <li>

                            <div>
                            <span>
                            usuario:".$var_fila['usuario']."
                            </span>
                            </div>
                            <div>
                            <span>
                              ".$var_fila['comentario']."
                            </span>
                            </div>
                            <div>
                            <span>
                            ".date("d/m/Y", strtotime($var_fila['fecha']))."
                            </span>
                            </div>
                            </li>
                      </ul>";echo "</td>";
                      echo "</tr>";

                      }
                    ?>
                    </table>
                  </div>

                  <textarea name="COMENTARIO" id="COMENTARIO" rows="8" cols="80" placeholder="Escribe tus comentarios" maxlength="10000"></textarea>

                </div>

                <div class="row">
                  <div>
                      <br>
                      <br>
                      <button style="display: block; margin: 0 auto;" class="btn color-btn-success" id="enter" type="submit">ACTUALIZAR</button>
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
<script type="text/javascript">
//////////////////////////////////////////////////////inicio para los cambios de los selects en estatus inicial sin nada de informacion
///////////////////////////////////funcion para detectar el cambio del analisis multidisiplinario
var analisisMultidisiplinario = document.getElementById('ANALISIS');
var respuestaAlalisisMultidisiplinario = '';
analisisMultidisiplinario.addEventListener('change', obtenerInfo);
    function obtenerInfo(e) {
      respuestaAlalisisMultidisiplinario = e.target.value;
      // console.log(respuestaAlalisisMultidisiplinario);
      if (respuestaAlalisisMultidisiplinario === "ESTUDIO TECNICO DE ANALISIS DE RIESGO") {
        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION_ANALISIS').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_DE_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('TERMINO_CONVENIO').style.display = "none";
        document.getElementById('LABEL_NUMERO_CONVENIOS').style.display = "none";
        document.getElementById('num_convenio').style.display = "none";
      }
      else if (respuestaAlalisisMultidisiplinario === "ESTUDIO TECNICO DE CONCLUSION" || respuestaAlalisisMultidisiplinario === "ESTUDIO TECNICO DE CANCELACION" || respuestaAlalisisMultidisiplinario === "ACUERDO DE ACUMULACION"){
        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION_ANALISIS').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_DE_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('TERMINO_CONVENIO').style.display = "none";
        document.getElementById('LABEL_NUMERO_CONVENIOS').style.display = "none";
        document.getElementById('num_convenio').style.display = "none";
        document.getElementById('INCORPORACION').value = "";
        document.getElementById('FECHA_AUTORIZACION_ANALISIS').value = "";
        document.getElementById('id_analisis').value = "";
        document.getElementById('CONVENIO_DE_ENTENDIMIENTO').value = "";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').value = "";
        document.getElementById('fecha_inicio').value = "";
        document.getElementById('VIGENCIA_CONVENIO').value = "";
        document.getElementById('TERMINO_CONVENIO').value = "";
        document.getElementById('num_convenio').value = "";
      }
      else if (respuestaAlalisisMultidisiplinario === "EN ELABORACION"){
        document.getElementById('LABEL_INCORPORACION').style.display = "none";
        document.getElementById('INCORPORACION').style.display = "none";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "none";
        document.getElementById('FECHA_AUTORIZACION_ANALISIS').style.display = "none";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "none";
        document.getElementById('id_analisis').style.display = "none";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_DE_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('TERMINO_CONVENIO').style.display = "none";
        document.getElementById('LABEL_NUMERO_CONVENIOS').style.display = "none";
        document.getElementById('num_convenio').style.display = "none";
        document.getElementById('INCORPORACION').value = "";
        document.getElementById('FECHA_AUTORIZACION_ANALISIS').value = "";
        document.getElementById('id_analisis').value = "";
        document.getElementById('CONVENIO_DE_ENTENDIMIENTO').value = "";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').value = "";
        document.getElementById('fecha_inicio').value = "";
        document.getElementById('VIGENCIA_CONVENIO').value = "";
        document.getElementById('TERMINO_CONVENIO').value = "";
        document.getElementById('num_convenio').value = "";
      }
    }
///////////////////////////////////funcion para detectar el cambio de la procedencia de la incorporacion
var incorporacionproc = document.getElementById('INCORPORACION');
var resincorporacionproc = '';
incorporacionproc.addEventListener('change', obtenerInfoincorporacion);
    function obtenerInfoincorporacion(e) {
      resincorporacionproc = e.target.value;
      // console.log(resincorporacionproc);
      if (resincorporacionproc === "INCORPORACION PROCEDENTE") {
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('CONVENIO_DE_ENTENDIMIENTO').style.display = "";
      }else {
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_DE_ENTENDIMIENTO').style.display = "none";
      }
  }
///////////////////////////////////funcion para detectar el cambio del convenio de entendimiento
var noFormalizado = document.getElementById('CONVENIO_DE_ENTENDIMIENTO');
var respuestaInputNoFormalizado = '';
noFormalizado.addEventListener('change', obtenerInfoNoFormalizado);
    function obtenerInfoNoFormalizado(e) {
      respuestaInputNoFormalizado = e.target.value;
      // console.log(respuestaInputNoFormalizado);
      if (respuestaInputNoFormalizado === "NO FORMALIZADO" || respuestaInputNoFormalizado === "PENDIENTE DE EJECUCION") {
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('TERMINO_CONVENIO').style.display = "none";
        document.getElementById('LABEL_NUMERO_CONVENIOS').style.display = "none";
        document.getElementById('num_convenio').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').value = "";
        document.getElementById('fecha_inicio').value = "";
        document.getElementById('VIGENCIA_CONVENIO').value = "";
        document.getElementById('TERMINO_CONVENIO').value = "";
        document.getElementById('num_convenio').value = "";
      }else {
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "";
        document.getElementById('fecha_inicio').style.display = "";
        document.getElementById('LABEL_VIGENCIA').style.display = "";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "";
        document.getElementById('TERMINO_CONVENIO').style.display = "";
        document.getElementById('LABEL_NUMERO_CONVENIOS').style.display = "";
        document.getElementById('num_convenio').style.display = "";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').value = "";
        document.getElementById('fecha_inicio').value = "";
        document.getElementById('VIGENCIA_CONVENIO').value = "";
        document.getElementById('TERMINO_CONVENIO').value = "";
        document.getElementById('num_convenio').value = "";
      }
  }
//////////////////////////////////////////////////////fin para los cambios de los selects en estatus inicial sin nada de informacion
//////////////////////////////////////////////////////////////////////////////////////////////////////////////descomentar una vez que se haiga actualizado todo
//////////////////////////////////////////////////////inicio para evaluar los select segun su informacion ya guardada y mostrar y ocultar segun sea el caso
///////////////////////////////////funcion para evaluar el contenido guardado y mostrar y ocultar segun sea el caso del analisis multidisiplinario
var analisisM = document.getElementById('ANALISIS').value;
// console.log(analisisM);
function ocultarAnalisisM() {
  if (analisisM === "EN ELABORACION"){
    document.getElementById('LABEL_INCORPORACION').style.display = "none";
    document.getElementById('INCORPORACION').style.display = "none";
    document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "none";
    document.getElementById('FECHA_AUTORIZACION_ANALISIS').style.display = "none";
    document.getElementById('LABEL_ID_ANALISIS').style.display = "none";
    document.getElementById('id_analisis').style.display = "none";
    document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
    document.getElementById('CONVENIO_DE_ENTENDIMIENTO').style.display = "none";
    document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
    document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').style.display = "none";
    document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
    document.getElementById('fecha_inicio').style.display = "none";
    document.getElementById('LABEL_VIGENCIA').style.display = "none";
    document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
    document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
    document.getElementById('TERMINO_CONVENIO').style.display = "none";
    document.getElementById('LABEL_NUMERO_CONVENIOS').style.display = "none";
    document.getElementById('num_convenio').style.display = "none";
  }
      else if (analisisM === "ESTUDIO TECNICO DE ANALISIS DE RIESGO") {
        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION_ANALISIS').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_DE_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('TERMINO_CONVENIO').style.display = "none";
        document.getElementById('LABEL_NUMERO_CONVENIOS').style.display = "none";
        document.getElementById('num_convenio').style.display = "none";
      }
      else if (analisisM === "ACUERDO DE CONCLUSION" || analisisM === "ACUERDO DE CANCELACION" || analisisM === "ACUERDO DE ACUMULACIÓN" || analisisM === "ESTUDIO TECNICO DE CONCLUSION" || analisisM === "ESTUDIO TECNICO DE CANCELACION"){
        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION_ANALISIS').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_DE_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('TERMINO_CONVENIO').style.display = "none";
        document.getElementById('LABEL_NUMERO_CONVENIOS').style.display = "none";
        document.getElementById('num_convenio').style.display = "none";
      }
    }
ocultarAnalisisM();
///////////////////////////////////funcion para evaluar el contenido guardado y mostrar y ocultar segun sea el caso de la determinacion de la  incorporacion
var incorporacion = document.getElementById('INCORPORACION').value;
// console.log(incorporacion);
function ocultarCamposincorporacion() {
  if (incorporacion === "INCORPORACION PROCEDENTE"){
    document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "";
    document.getElementById('CONVENIO_DE_ENTENDIMIENTO').style.display = "";
  }else if(incorporacion === "INCORPORACION NO PROCEDENTE"){
    document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "non";
    document.getElementById('CONVENIO_DE_ENTENDIMIENTO').style.display = "none";
      }
}
ocultarCamposincorporacion();
///////////////////////////////////funcion para evaluar el contenido guardado y mostrar y ocultar segun sea el caso del convenio de entendimiento
var noFormalizadoInput = document.getElementById('CONVENIO_DE_ENTENDIMIENTO').value;
// console.log(noFormalizadoInput);
function ocultarCamposNoFormalizado() {
  if (noFormalizadoInput === "NO FORMALIZADO" || noFormalizadoInput === "PENDIENTE DE EJECUCION"){
    document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
    document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').style.display = "none";
    document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
    document.getElementById('fecha_inicio').style.display = "none";
    document.getElementById('LABEL_VIGENCIA').style.display = "none";
    document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
    document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
    document.getElementById('TERMINO_CONVENIO').style.display = "none";
    document.getElementById('LABEL_NUMERO_CONVENIOS').style.display = "none";
    document.getElementById('num_convenio').style.display = "none";
    document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').value = "none";
    document.getElementById('fecha_inicio').value = "none";
    document.getElementById('VIGENCIA_CONVENIO').value = "none";
    document.getElementById('TERMINO_CONVENIO').value = "none";
    document.getElementById('num_convenio').value = "none";
  }else if(noFormalizadoInput === "FORMALIZADO"){
    document.getElementById('LABEL_FECHA_FIRMA').style.display = "";
    document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').style.display = "";
    document.getElementById('LABEL_FECHA_INICIO').style.display = "";
    document.getElementById('fecha_inicio').style.display = "";
    document.getElementById('LABEL_VIGENCIA').style.display = "";
    document.getElementById('VIGENCIA_CONVENIO').style.display = "";
    document.getElementById('LABEL_FECHA_TERMINO').style.display = "";
    document.getElementById('TERMINO_CONVENIO').style.display = "";
    document.getElementById('LABEL_NUMERO_CONVENIOS').style.display = "";
    document.getElementById('num_convenio').style.display = "";
  }
}
ocultarCamposNoFormalizado();
//////////////////////////////////////////////////////fin para evaluar los select segun su informacion ya guardada y mostrar y ocultar segun sea el caso
///////////////////////////////////funcion para hacer disabled contenido de la parte de la determinacion de la incorporacion una vez que esten llenos todos los campos y segun sea el caso de cada uno
var analisismulti = document.getElementById('ANALISIS').value;
var conveniofirmado = document.getElementById('CONVENIO_DE_ENTENDIMIENTO').value;
console.log(analisismulti);
console.log(conveniofirmado);
function disabledcamposdetinc() {
  if (analisismulti !== "EN ELABORACION"){
    document.getElementById('ANALISIS').disabled = true;
    document.getElementById('INCORPORACION').disabled = true;
    document.getElementById('FECHA_AUTORIZACION_ANALISIS').disabled = true;
    document.getElementById('id_analisis').disabled = true;
  }else {
    document.getElementById('ANALISIS').disabled = false;
    document.getElementById('INCORPORACION').disabled = false;
    document.getElementById('FECHA_AUTORIZACION_ANALISIS').disabled = false;
    document.getElementById('id_analisis').disabled = false;
      }
  if (conveniofirmado !== '') {
    document.getElementById('CONVENIO_DE_ENTENDIMIENTO').disabled = true;
    document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO').disabled = true;
    document.getElementById('fecha_inicio').disabled = true;
    document.getElementById('VIGENCIA_CONVENIO').disabled = true;
    document.getElementById('num_convenio').disabled = true;
  }
}
disabledcamposdetinc();
</script>
<!-- /////////////////////////////////////////////////////////////////////////////////// -->
<script type="text/javascript">
var concluNone = document.getElementById('ESTATUS_EXPEDIENTE').value;
function ConclusionCancelacion(){
if(concluNone === "" || concluNone === null || concluNone === "n/a" || concluNone === "SOLICITUD NO PROCEDENTE" || concluNone === "ANALISIS" || concluNone === "EN EJECUCION"){
        document.getElementById('LABEL_CONCLUSION_CANCELACION').style.display = "none";
        document.getElementById('CONCLUSION_CANCELACION').style.display = "none";
        document.getElementById('LABEL_CONCLUSION_ART35').style.display = "none";
        document.getElementById('CONCLUSION_ART35').style.display = "none";
        document.getElementById('LABEL_OTHER_ART351').style.display = "none";
        document.getElementById('OTHER_ART351').style.display = "none";
        document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
        document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
        document.getElementById('FECHA_DESINCORPORACION_DOS').style.display = "none";
      }else if (concluNone === "CONCLUIDO" || concluNone === "CANCELADO"){
        document.getElementById('LABEL_CONCLUSION_CANCELACION').style.display = "";
        document.getElementById('CONCLUSION_CANCELACION').style.display = "";
      }
}
ConclusionCancelacion();

var conCa = document.getElementById('ESTATUS_EXPEDIENTE');
var estatusPersona = '';
conCa.addEventListener('change', obtenerEstatus);
    function obtenerEstatus(e) {
      estatusPersona = e.target.value;
      if ( estatusPersona === "CONCLUIDO" || estatusPersona === "CANCELADO" ) {
        document.getElementById('LABEL_CONCLUSION_CANCELACION').style.display = "";
        document.getElementById('CONCLUSION_CANCELACION').style.display = "";
      }else if ( estatusPersona === "SOLICITUD NO PROCEDENTE" || estatusPersona === "ANALISIS" || estatusPersona === "EN EJECUCION"){
        document.getElementById('LABEL_CONCLUSION_CANCELACION').style.display = "none";
        document.getElementById('CONCLUSION_CANCELACION').style.display = "none";
        document.getElementById('LABEL_CONCLUSION_ART35').style.display = "none";
        document.getElementById('CONCLUSION_ART35').style.display = "none";
        document.getElementById('LABEL_OTHER_ART351').style.display = "none";
        document.getElementById('OTHER_ART351').style.display = "none";
        document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
        document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
        document.getElementById('FECHA_DESINCORPORACION_DOS').style.display = "none";
        document.getElementById('CONCLUSION_CANCELACION').value='';
        document.getElementById('CONCLUSION_ART35').value='';
        document.getElementById('OTHER_ART351').value='';
        document.getElementById('FECHA_DESINCORPORACION_DOS').value='';
      }
}

var concluCanceExp = document.getElementById('CONCLUSION_CANCELACION').value;
function ConclusionCancelacionExp(){
  if (concluCanceExp === "" || concluCanceExp === null){
        document.getElementById('LABEL_CONCLUSION_ART35').style.display = "none";
        document.getElementById('CONCLUSION_ART35').style.display = "none";
        document.getElementById('LABEL_OTHER_ART351').style.display = "none";
        document.getElementById('OTHER_ART351').style.display = "none";
        document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
        document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
        document.getElementById('FECHA_DESINCORPORACION_DOS').style.display = "none";
      }
else if (concluCanceExp === "CONCLUSION"){
      document.getElementById('LABEL_CONCLUSION_ART35').style.display = "";
      document.getElementById('CONCLUSION_ART35').style.display = "";
      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
      document.getElementById('FECHA_DESINCORPORACION_DOS').style.display = "";
}
else if (concluCanceExp === "CANCELACION"){
      document.getElementById('LABEL_CONCLUSION_ART35').style.display = "none";
      document.getElementById('CONCLUSION_ART35').style.display = "none";
      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "";
      document.getElementById('FECHA_DESINCORPORACION_DOS').style.display = "";
}
}
ConclusionCancelacionExp();

var estatusPer = document.getElementById('CONCLUSION_CANCELACION');
var estatusPersonaSeg;
estatusPer.addEventListener('change', obtenerEstatusSeg);
    function obtenerEstatusSeg(e) {
      estatusPersonaSeg = e.target.value;
      if (estatusPersonaSeg === "CONCLUSION"){
      document.getElementById('LABEL_CONCLUSION_ART35').style.display = "";
      document.getElementById('CONCLUSION_ART35').style.display = "";
      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
      document.getElementById('FECHA_DESINCORPORACION_DOS').style.display = "";
      }else if (estatusPersonaSeg === "CANCELACION"){
      document.getElementById('LABEL_CONCLUSION_ART35').style.display = "none";
      document.getElementById('CONCLUSION_ART35').style.display = "none";
      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "";
      document.getElementById('FECHA_DESINCORPORACION_DOS').style.display = "";
      document.getElementById('LABEL_OTHER_ART351').style.display = "none";
      document.getElementById('OTHER_ART351').style.display = "none";
      }
}

var concluCanceArt = document.getElementById('CONCLUSION_ART35').value;
function ConclusionCancelacionArt(){
  if (concluCanceArt === "" || concluCanceArt === null){
        document.getElementById('LABEL_OTHER_ART351').style.display = "none";
        document.getElementById('OTHER_ART351').style.display = "none";
      }
else if (concluCanceArt === "IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO" || concluCanceArt === "OTRO" || concluCanceArt === "VIII. INCUMPLIMIENTO DE LAS OBLIGACIONES"){
      document.getElementById('LABEL_OTHER_ART351').style.display = "";
      document.getElementById('OTHER_ART351').style.display = "";
}else {
      document.getElementById('LABEL_OTHER_ART351').style.display = "none";
      document.getElementById('OTHER_ART351').style.display = "none";
}
}
ConclusionCancelacionArt();

var conCaArt = document.getElementById('CONCLUSION_ART35');
var conCaArt35 = '';
conCaArt.addEventListener('change', obtenerConCaArt35);
    function obtenerConCaArt35(e) {
      conCaArt35 = e.target.value;
      if (conCaArt35 === "IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO" || conCaArt35 === "OTRO" || conCaArt35 === "VIII. INCUMPLIMIENTO DE LAS OBLIGACIONES"){
        document.getElementById('LABEL_OTHER_ART351').style.display = "";
        document.getElementById('OTHER_ART351').style.display = "";
      }else {
        document.getElementById('LABEL_OTHER_ART351').style.display = "none";
        document.getElementById('OTHER_ART351').style.display = "none";
      }
}
</script>

<script type="text/javascript">
var readOnlyEstatus = document.getElementById('ESTATUS_EXPEDIENTE').value;
function ReadOnlyConClu() {
  if( readOnlyEstatus === "CONCLUIDO" || readOnlyEstatus === "CANCELADO" || readOnlyEstatus === "SOLICITUD NO PROCEDENTE"){
    document.getElementById('FECHA_DESINCORPORACION_DOS').disabled = true;
    document.getElementById('CONCLUSION_ART35').disabled = true;
    document.getElementById('OTHER_ART351').disabled = true;
    document.getElementById('ESTATUS_EXPEDIENTE').disabled = true;
    document.getElementById('CONCLUSION_CANCELACION').disabled = true;
    document.getElementById('COMENTARIO').disabled = true;
    document.getElementById('enter').style.display = "none";
    document.getElementById('btn_agregar').style.display = "none";
  }

  if (analisisM.value == "ACUERDO DE CONCLUSION" || analisisM.value == "ACUERDO DE CANCELACION" || analisisM.value == "ACUERDO DE ACUMULACIÓN"){
    if (readOnlyEstatus == "CONCLUIDO" || readOnlyEstatus == "CANCELADO" || readOnlyEstatus === "SOLICITUD NO PROCEDENTE"){
      analisisM.disabled = true;
      incorporacion.disabled = true;
      fechaAutoAnalisis.disabled = true;
    }
  }

  if ( analisisM.value == "ESTUDIO TECNICO" ){
    if ( convenioDeEntendimiento.value == "NO FORMALIZADO" ){
      analisisM.disabled = true;
      incorporacion.disabled = true;
      fechaAutoAnalisis.disabled = true;
      convenioDeEntendimiento.disabled = true;
    }
  }
}
ReadOnlyConClu();

var motivonoproc =document.getElementById('resul_val_jur').value;
function showmotnoproc (){
  console.log(motivonoproc);
  if (motivonoproc === 'SI PROCEDE') {
    document.getElementById('motnoprocedencia').style.display= 'none';
  }else{
    document.getElementById('motnoprocedencia').style.display= '';
  }
}
showmotnoproc ();
</script>
</body>
</html>
