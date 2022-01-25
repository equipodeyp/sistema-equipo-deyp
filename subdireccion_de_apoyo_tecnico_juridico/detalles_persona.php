<?php
/*require 'conexion.php';*/
// error_reporting(0);
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
// echo $name;
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
// echo $name_folio;
$id_person=$rowfol['id'];
$foto=$rowfol['foto'];
$valid1 = "SELECT * FROM validar_persona WHERE folioexpediente = '$name_folio'";
$res_val1=$mysqli->query($valid1);
$fil_val1 = $res_val1->fetch_assoc();
$validacion1 = $fil_val1['id_persona'];


// echo $id_person;

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
    <span class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </span>
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
    			<li><a href="#tab1"><span class="far fa-address-card"></span><span class="tab-text">DATOS PERSONALES</span></a></li>
    			<!-- <li><a href="#tab2"><span class="fas fa-book-open"></span><span class="tab-text">MEDIDAS</span></a></li>
    			<li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO</span></a></li> -->
    		</ul>

    		<div class="secciones">
    			<article id="tab1">
    				<div class="container">
              <form class="container well form-horizontal" action="actualizar_persona.php?folio=<?php echo $id_person; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <?php
                  $fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
                  $resultfol = $mysqli->query($fol);
                  $rowfol=$resultfol->fetch_assoc();
                  $name_folio=$rowfol['folioexpediente'];
                  $id_person=$rowfol['id'];
                  $idunico= $rowfol['identificador'];
                  $valid = "SELECT * FROM validar_persona WHERE id_persona = '$id_person'";
                  $res_val=$mysqli->query($valid);
                  $fil_val = $res_val->fetch_assoc();
                  $validacion = $fil_val['validacion'];

                    if ($validacion == 'true') {
                      echo "<div class='columns download'>
                              <p>
                              <img src='../image/true4.jpg' width='50' height='50' class='center'>
                              <h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>PERSONA VALIDADA</FONT></h3>

                              </p>
                      </div>";
                    }
                    ?>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">FOLIO DEL EXPEDIENTE</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                        <label for="SIGLAS DE LA UNIDAD">FOLIO DEL EXPEDIENTE<span ></span></label>
                        <input class="form-control" id="NUM_EXPEDIENTE" name="NUM_EXPEDIENTE" placeholder="" type="text" value="<?php echo $rowfol['folioexpediente'];?>" maxlength="50" readonly>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="SIGLAS DE LA UNIDAD">ID UNICO DE LA PERSONA PROPUESTA<span ></span></label>
                    <input class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" value="<?php echo $rowfol['identificador']; ?>" maxlength="50" readonly>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="FECHA_CAPTURA" >FECHA DE CAPTURA DE LA INFORMACIÓN DE LA PERSONA PROPUESTA<span class="required"></span></label>
                    <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" type="text" value="<?php echo $rowfol['fecha_captura'];?>" readonly>
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">DATOS DE LA AUTORIDAD</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="SIGLAS DE LA UNIDAD">ID_SOLICITUD<span class="required"></span></label>
                    <input class="form-control" id="ID_SOLICITUD" name="ID_SOLICITUD" placeholder="" type="text" value="<?php echo $rowaut['idsolicitud']; ?>" maxlength="20" readonly>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="FECHA_SOLICITUD">FECHA_SOLICITUD<span ></span></label>
                    <input class="form-control" id="FECHA_SOLICITUD" name="FECHA_SOLICITUD" placeholder="" type="date" value="<?php echo $rowaut['fechasolicitud']; ?>" readonly>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="NOMBRE_AUTORIDAD">NOMBRE_AUTORIDAD<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="NOMBRE_AUTORIDAD" name="NOMBRE_AUTORIDAD" onChange="openOther(this)" disabled>
                      <option style="visibility: hidden" id="opt-nombre-autoridad" value="<?php echo $rowaut['nombreautoridad']; ?>"><?php echo $rowaut['nombreautoridad']; ?></option>
                      <?php
                      $autoridad = "SELECT * FROM nombreautoridad";
                      $answer = $mysqli->query($autoridad);
                      while($autoridades = $answer->fetch_assoc()){
                       echo "<option value='".$autoridades['nombre']."'>".$autoridades['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <?php
                  $aut = "SELECT * FROM autoridad WHERE id_persona = '$id_person'";
                  $resultadoaut = $mysqli->query($aut);
                  $rowaut = $resultadoaut->fetch_array(MYSQLI_ASSOC);
                  if ($rowaut['nombreautoridad'] == 'OTRO') {
                    echo '<div class="col-md-6 mb-3 validar" id="other">
                      <label for="OTHER_AUTORIDAD">ESPECIFIQUE</label>
                      <input class="form-control" id="OTHER_AUTORIDAD" name="OTHER_AUTORIDAD" placeholder="" value="'.$rowaut['otraautoridad'].'" type="text" readonly>
                    </div>';
                  }
                   ?>

                  <div class="col-md-6 mb-3 validar" id="other" style="display:none;">
                    <label for="OTHER_AUTORIDAD">ESPECIFIQUE</label>
                    <input class="form-control" id="OTHER_AUTORIDAD1" name="OTHER_AUTORIDAD1" placeholder="" value="<?php echo $rowaut['otraautoridad']; ?>" type="text" readonly>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="NOMBRE_SERVIDOR">NOMBRE_SERVIDOR<span class="required"></span></label>
                    <input class="form-control" id="NOMBRE_SERVIDOR" name="NOMBRE_SERVIDOR" placeholder="" value="<?php echo $rowaut['nombreservidor']; ?>" type="text" readonly>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="AÑO">PATERNO_SERVIDOR<span class="required"></span></label>
                    <input class="form-control" id="PATERNO_SERVIDOR" name="PATERNO_SERVIDOR" placeholder="" value="<?php echo $rowaut['apellidopaterno']; ?>" type="text" readonly>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="MATERNO_SERVIDOR">MATERNO_SERVIDOR<span class="required"></span></label>
                    <input class="form-control" id="MATERNO_SERVIDOR" name="MATERNO_SERVIDOR" placeholder="" value="<?php echo $rowaut['apellidomaterno']; ?>" type="text" readonly>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="CARGO_SERVIDOR">CARGO_SERVIDOR<span class="required"></span></label>
                    <input class="form-control" id="CARGO_SERVIDOR" name="CARGO_SERVIDOR" placeholder="" value="<?php echo $rowaut['cargoservidor']; ?>" type="text" readonly>
                  </div>

                </div>
                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">DATOS DE LA PERSONA PROPUESTA</h3>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="SIGLAS DE LA UNIDAD">NOMBRE (S) <span class="required"></span></label>
                    <input disabled="disabled" class="form-control" id="NOMBRE_PERSONA" name="NOMBRE_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['nombrepersona']; ?>" required>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="PATERNO_PERSONA">APELLIDO PATERNO <span class="required"></span></label>
                    <input disabled="disabled" class="form-control" id="PATERNO_PERSONA" name="PATERNO_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['paternopersona']; ?>" required>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="MATERNO_PERSONA"> APELLIDO MATERNO <span class="required"></span></label>
                    <input disabled="disabled" class="form-control" id="MATERNO_PERSONA" name="MATERNO_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['maternopersona']; ?>" required>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="FECHA_NACIMIENTO_PERSONA">FECHA_NACIMIENTO_PERSONA <span class="required"></span></label>
                    <input class="form-control" id="FECHA_NACIMIENTO_PERSONA" name="FECHA_NACIMIENTO_PERSONA" placeholder=""  type="date" value="<?php echo $rowfol['fechanacimientopersona']; ?>" readonly>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="EDAD_PERSONA">EDAD_PERSONA <span class="required"></span></label>
                    <input readonly class="form-control" id="EDAD_PERSONA" name="EDAD_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['edadpersona']; ?>" maxlength="2" readonly>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="GRUPO_EDAD">GRUPO_EDAD<span class="required">(*)</span></label>
                    <input readonly class="form-control" id="GRUPO_EDAD" name="GRUPO_EDAD" placeholder="" type="text" required value="<?php echo $rowfol['grupoedad']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar"><label for="CALIDAD_PERSONA">CALIDAD PERSONA EN EL PROCESO PENAL<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="CALIDAD_PERSONA" name="CALIDAD_PERSONA" disabled>
                      <option style="visibility: hidden" id="opt-calidad-persona" value="<?php echo $rowfol['calidadprocedimiento']; ?>"><?php echo $rowfol['calidadprocedimiento']; ?></option>
                      <?php
                      $calidad = "SELECT * FROM calidadpersonaprocesopenal";
                      $answer = $mysqli->query($calidad);
                      while($calidades = $answer->fetch_assoc()){
                        echo "<option value='".$calidades['nombre']."'>".$calidades['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <!-- calidad persona en el procedimiento -->
                  <div class="col-md-6 mb-3 validar"><label for="CALIDAD_PERSONA_PROCEDIMIENTO">CALIDAD PERSONA DENTRO DEL PROGRAMA<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="CALIDAD_PERSONA_PROCEDIMIENTO" name="CALIDAD_PERSONA_PROCEDIMIENTO" disabled>
                      <option style="visibility: hidden" id="opt-calidad-persona" value="<?php echo $rowfol['calidadpersona']; ?>"><?php echo $rowfol['calidadpersona']; ?></option>
                      <?php
                      $calidad = "SELECT * FROM calidadpersona";
                      $answer = $mysqli->query($calidad);
                      while($calidades = $answer->fetch_assoc()){
                        echo "<option value='".$calidades['nombre']."'>".$calidades['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="GRUPO_EDAD">SEXO_PERSONA<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="SEXO_PERSONA" name="SEXO_PERSONA" disabled>
                      <option style="visibility: hidden" id="opt-sexo-persona" value="<?php echo $rowfol['sexopersona']; ?>"><?php echo $rowfol['sexopersona']; ?></option>
                      <option value="MUJER">MUJER</option>
                      <option value="HOMBRE">HOMBRE</option>
                    </select>
                  </div>

                  <div class="alert alert-info">
                    <h3 style="text-align:center">LUGAR DE NACIMIENTO DE LA PERSONA PROPUESTA</h3>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="NOMBRE_ESTADO">LUGAR DE NACIMIENTO<span class="required"></span></label>
                    <select class="form-select form-select-lg" name="cbx_estado" id="cbx_estado" onChange="OTHERPAIS(this)" >
                      <option style="visibility: hidden" id="opt-lugar-nacimiento" value="<?php echo $roworigen['lugardenacimiento']; ?>"><?php echo $roworigen['lugardenacimiento']; ?></option>
                      <?php while($row = $resultado23->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar" id="other_pais" style="display:none;">
                    <label for="OTHER_PAIS">ESPECIFIQUE</label>
                    <input class="form-control" id="OTHER_PAIS" name="OTHER_PAIS" placeholder="" value="" type="text">
                  </div>

                  <div class="col-md-6 mb-3 validar" id="municipio">
                    <label for="NOMBRE_MUNICIPIO">MUNICIPIO DE NACIMIENTO<span class="required"></span></label>
                    <select class="form-select form-select-lg" name="cbx_municipio" id="cbx_municipio"  >
                      <option value="<?php echo $roworigen['municipiodenacimiento']; ?>"><?php echo $roworigen['municipiodenacimiento']; ?></option>
                    </select>
                  </div>



                  <div class="col-md-6 mb-3 validar">
                    <label for="NACIONALIDAD_PERSONA">NACIONALIDAD_PERSONA<span class="required"></span></label>
                    <input class="form-control" id="NACIONALIDAD_PERSONA" name="NACIONALIDAD_PERSONA" placeholder="" value="<?php echo $roworigen['nacionalidadpersona']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="CURP_PERSONA">CURP_PERSONA <span class="required"></span></label>
                    <input class="form-control" id="CURP_PERSONA" name="CURP_PERSONA" placeholder="" value="<?php echo $rowfol['curppersona']; ?>" type="text" readonly>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="RFC_PERSONA">RFC_PERSONA<span class="required"></span></label>
                    <input class="form-control" id="RFC_PERSONA" name="RFC_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['rfcpersona']; ?>" maxlength="13" readonly>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="ALIAS_PERSONA">ALIAS_PERSONA <span class="required"></span></label>
                    <input class="form-control" id="ALIAS_PERSONA" name="ALIAS_PERSONA" placeholder="" value="<?php echo $rowfol['aliaspersona']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="OCUPACION_PERSONA">OCUPACION_PERSONA<span class="required"></span></label>
                    <input class="form-control" id="OCUPACION_PERSONA" name="OCUPACION_PERSONA" placeholder="" value="<?php echo $rowfol['ocupacion']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="TELEFONO_FIJO">TELEFONO_FIJO <span class="required"></span></label>
                    <input class="form-control" id="TELEFONO_FIJO" name="TELEFONO_FIJO" placeholder="" value="<?php echo $rowfol['telefonofijo']; ?>" type="text" maxlength="10" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="TELEFONO_CELULAR">TELEFONO_CELULAR<span class="required"></span></label>
                    <input class="form-control" id="TELEFONO_CELULAR" name="TELEFONO_CELULAR" placeholder="" value="<?php echo $rowfol['telefonocelular']; ?>" type="text" maxlength="10" >
                  </div>

                  <div class="alert alert-info">
                    <h3 style="text-align:center">DOMICILIO ACTUAL DE LA PERSONA PROPUESTA</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="MOD_DOMICILIO" >DOMICILIO<span class="required"></span></label>
                    <select  class="form-select form-select-lg" id="MOD_DOMICILIO" name="MOD_DOMICILIO"  onclick="mod_domicilioactual(this)">
                      <option style="visibility: hidden" value="<?php echo $rowdomicilio['lugar']; ?>"><?php echo $rowdomicilio['lugar']; ?></option>
                      <option value="SI">SI</option>
                      <option value="NO">NO</option>
                    </select>
                  </div>

                  <?php
                  $domicilio = "SELECT * FROM domiciliopersona WHERE id_persona = '$id_person'";
                  $resultadodomicilio = $mysqli->query($domicilio);
                  $rowdomicilio = $resultadodomicilio->fetch_array(MYSQLI_ASSOC);
                  if ($rowdomicilio['lugar'] == 'SI'){
                      echo '<div class="col-md-6 mb-3 validar" id="mod_reclusorio_s">
                        <label for="RECLUSORIO"  >CENTROS PENITENCIARIOS<span class="required"></span></label>
                        <select  class="form-select form-select-lg" id="RECLUSORIO" name="RECLUSORIO">
                          <option style="visibility: hidden" value="'.$rowdomicilio['seleccioneestado'].'">'.$rowdomicilio['seleccioneestado'].'</option>';
                          $reclusorio = "SELECT * FROM reclusorios";
                          $answer_reclusorio = $mysqli->query($reclusorio);
                          while($reclusorios = $answer_reclusorio->fetch_assoc()){
                            echo "<option value='".$reclusorios['denominacion']."'>".$reclusorios['denominacion']."</option>";
                          }
                        echo '</select>
                      </div>
                      <div class="col-md-6 mb-3 validar" id="dir_reclusorio">
                        <label for="direccion_penal">DIRECCION DEL CENTRO PENITENCIARIO<span class="required"></span></label>
                        <input class="form-control" name="dir_penal" id="dir_penal" type="text" value="'.$rowdomicilio['seleccionemunicipio'].'" readonly>
                      </div>';
                  }elseif ($rowdomicilio['lugar'] == 'NO') {
                    echo '<div class="col-md-6 mb-3 validar" id="estado_s" >
                      <label for="ESTADO"  >ESTADO<span class="required"></span></label>
                      <select  class="form-select form-select-lg" id="estado_suj" name="estado_suj">
                        <option style="visibility: hidden" value="'.$rowdomicilio['seleccioneestado'].'">'.$rowdomicilio['seleccioneestado'].'</option>';
                        $query1 = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
                        $resultado1=$mysqli->query($query1);
                        while($row_estado = $resultado1->fetch_assoc()){
                          echo "<option value='".$row_estado['id_estado']."'>".$row_estado['estado']."</option>";
                        }
                        echo '
                      </select>
                    </div>
                    <div class="col-md-6 mb-3 validar" id="municipio_s">
                      <label for="NOMBRE_MUNICIPIO">MUNICIPIO<span class="required"></span></label>
                      <select class="form-select form-select-lg" name="municipio_suj" id="municipio_suj">
                        <option value="'.$rowdomicilio['seleccionemunicipio'].'">'.$rowdomicilio['seleccionemunicipio'].'</option>
                      </select>
                    </div>
                    <div class="col-md-6 mb-3 validar" id="localidad_s">
                      <label for="NOMBRE_LOCALIDAD">LOCALIDAD<span class="required"></span></label>
                      <input class="form-control" name="localidad_suj" id="localidad_suj" placeholder="" value="'.$rowdomicilio['seleccionelocalidad'].'" type="text">
                    </div>
                    <div class="col-md-6 mb-3 validar" id="calle_s">
                      <label for="CALLE">CALLE<span class="required"></span></label>
                      <input class="form-control" id="calle_suj" name="calle_suj" placeholder="" value="'.$rowdomicilio['calle'].'" type="text">
                    </div>

                    <div class="col-md-6 mb-3 validar" id="cp_s">
                      <label for="CP">CODIGO POSTAL<span class="required"></span></label>
                      <input class="form-control" id="codigo_postal_s" name="codigo_postal_s" placeholder="" value="'.$rowdomicilio['cp'].'" type="text" maxlength="5">
                    </div>';

                  }


                  ?>
                  <!-- centros de reclusorios -->
                  <div class="col-md-6 mb-3 validar" id="mod_reclusorio" style="display:none;">
                    <label for="RECLUSORIO"  >CENTROS PENITENCIARIOS<span class="required"></span></label>
                    <select  class="form-select form-select-lg" id="RECLUSORIO1" name="RECLUSORIO1">
                      <option style="visibility: hidden" value>SELECCIONE UNA OPCION</option>
                      <?php
                      $reclusorio = "SELECT * FROM reclusorios";
                      $answer_reclusorio = $mysqli->query($reclusorio);
                      while($reclusorios = $answer_reclusorio->fetch_assoc()){
                        echo "<option value='".$reclusorios['denominacion']."'>".$reclusorios['denominacion']."</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <!--  -->

                  <div class="col-md-6 mb-3 validar" id="act_estado" style="display:none;">
                    <label for="NOMBRE_ESTADO">SELECCIONE UN ESTADO<span class="required"></span></label>
                    <select class="form-select form-select-lg" name="cbx_estado1" id="cbx_estado1" onChange="updatedom(this)" >
                      <option style="visibility: hidden" id="opt-seleccion-estado" value=""></option>
                      <?php while($row = $resultado1->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar" id="act_municipio" style="display:none;">
                    <label for="NOMBRE_MUNICIPIO">SELECCIONE UN MUNICIPIO<span class="required"></span></label>
                    <select class="form-select form-select-lg" name="cbx_municipio11" id="cbx_municipio11" >
                      <option value=""></option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar" id="act_localidad" style="display:none;">
                    <label for="NOMBRE_LOCALIDAD">ESPECIFIQUE LA LOCALIDAD<span class="required"></span></label>
                    <input class="form-control" name="localidadrad" id="localidadrad" placeholder="" value="" type="text">
                  </div>


                  <!-- XDFHSDFGHDFGHDFGHDFGHDFGH -->
                  <div class="col-md-6 mb-3 validar" id="act_calle" style="display:none;">
                    <label for="CALLE">CALLE<span class="required"></span></label>
                    <input class="form-control" id="CALLE" name="CALLE" placeholder="" value="" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar" id="act_cp" style="display:none;">
                    <label for="CP">CP<span class="required"></span></label>
                    <input class="form-control" id="CP" name="CP" placeholder="" value="" type="text" maxlength="5" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="INCAPAZ">INCAPAZ<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="INCAPAZ" name="INCAPAZ"  onChange="pagoOnChangemod(this)" disabled>
                      <option style="visibility: hidden" id="opt-incapaz" value="<?php echo $rowfol['incapaz']; ?>"><?php echo $rowfol['incapaz']; ?></option>
                      <option value="SI">SI</option>
                      <option value="NO">NO</option>
                    </select>
                  </div>

                </div>
                <?php
                $tutor = "SELECT * FROM tutor WHERE id_persona = '$id_person'";
                $resultadotutor = $mysqli->query($tutor);
                $rowtutor = $resultadotutor->fetch_array(MYSQLI_ASSOC);
                if ($rowfol['incapaz']=='SI') {
                  echo '<div id="tutor" class="row">
                    <div class="row">
                      <hr class="mb-4">
                    </div>
                    <div class="alert alert-info">
                      <h3 style="text-align:center">DATOS DEL PADRE/MADRE Y/O TUTOR</h3>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                      <label for="TUTOR_NOMBRE">TUTOR_NOMBRE <span class="required"></span></label>
                      <input class="form-control" id="TUTOR_NOMBRE" name="TUTOR_NOMBRE" placeholder="" value="' .$rowtutor['nombre'].'" type="text" readonly>
                    </div>

                    <div class="col-md-6 mb-3 validar">
                      <label for="COLONIA">TUTOR_PATERNO <span class="required"></span></label>
                      <input class="form-control" id="TUTOR_PATERNO" name="TUTOR_PATERNO" placeholder="" value="'. $rowtutor['apellidopaterno'].'" type="text" readonly>
                    </div>

                    <div class="col-md-6 mb-3 validar">
                      <label for="COLONIA">TUTOR_MATERNO <span class="required"></span></label>
                      <input class="form-control" id="TUTOR_MATERNO" name="TUTOR_MATERNO" placeholder="" value="'.$rowtutor['apellidomaterno'].'" type="text" readonly>
                    </div>

                  </div>';
                }
                ?>

                <div id="tutor" class="row" style="display:none;">
                  <div class="row">
                    <hr class="mb-4">
                  </div>

                  <div class="alert alert-info">
                    <h3 style="text-align:center">DATOS DEL TUTOR</h3>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="TUTOR_NOMBRE">TUTOR_NOMBRE <span class="required"></span></label>
                    <input class="form-control" id="TUTOR_NOMBRE1" name="TUTOR_NOMBRE1" placeholder="" value="<?php echo $rowtutor['nombre']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="COLONIA">TUTOR_PATERNO <span class="required"></span></label>
                    <input class="form-control" id="TUTOR_PATERNO1" name="TUTOR_PATERNO1" placeholder="" value="<?php echo $rowtutor['apellidopaterno']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="COLONIA">TUTOR_MATERNO <span class="required"></span></label>
                    <input class="form-control" id="TUTOR_MATERNO1" name="TUTOR_MATERNO1" placeholder="" value="<?php echo $rowtutor['apellidomaterno']; ?>" type="text" >
                  </div>

                </div>


                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">DATOS DE LA INVESTIGACION O PROCESO PENAL</h3>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="DELITO_PRINCIPAL">DELITO PRINCIPAL<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="DELITO_PRINCIPAL" name="DELITO_PRINCIPAL" onChange="otherdelito(this)" disabled>
                      <option style="visibility: hidden" id="opt-delito-principal" value="<?php echo $rowprocess['delitoprincipal']; ?>"><?php echo $rowprocess['delitoprincipal']; ?></option>
                      <?php
                      $delito = "SELECT * FROM delito";
                      $answer = $mysqli->query($delito);
                      while($delitos = $answer->fetch_assoc()){
                        echo "<option value='".$delitos['nombre']."'>".$delitos['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <?php
                  $process = "SELECT * FROM procesopenal WHERE id_persona = '$id_person'";
                  $resultadoprocess = $mysqli->query($process);
                  $rowprocess = $resultadoprocess->fetch_array(MYSQLI_ASSOC);
                  if ($rowprocess['delitoprincipal'] == 'OTRO') {
                    echo '<div id="otherdel" class="col-md-6 mb-3 validar">
                      <label for="OTRO_DELITO_PRINCIPAL">OTRO_DELITO_PRINCIPAL <span class="required"></span></label>
                      <input class="form-control" id="OTRO_DELITO_PRINCIPAL" name="OTRO_DELITO_PRINCIPAL" placeholder="" value="'.$rowprocess['otrodelitoprincipal'].'" type="text" value="" readonly>
                    </div>';
                  }
                   ?>

                   <div id="otherdel" class="col-md-6 mb-3 validar"  style="display:none;">
                     <label for="OTRO_DELITO_PRINCIPAL">OTRO_DELITO_PRINCIPAL <span class="required"></span></label>
                     <input class="form-control" id="OTRO_DELITO_PRINCIPAL1" name="OTRO_DELITO_PRINCIPAL1" placeholder="" value="<?php echo $rowprocess['otrodelitoprincipal']; ?>" type="text" value="" disabled>
                   </div>


                  <div class="col-md-6 mb-3 validar">
                    <label for="DELITO_SECUNDARIO">DELITO SECUNDARIO<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="DELITO_SECUNDARIO" name="DELITO_SECUNDARIO" onChange="delito_secundario(this)" disabled>
                      <option style="visibility: hidden" id="opt-delito-secundario" value="<?php echo $rowprocess['delitosecundario']; ?>"><?php echo $rowprocess['delitosecundario']; ?></option>
                      <?php
                      $delito = "SELECT * FROM delito";
                      $answer = $mysqli->query($delito);
                      while($delitos = $answer->fetch_assoc()){
                        echo "<option value='".$delitos['nombre']."'>".$delitos['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <?php
                  $process = "SELECT * FROM procesopenal WHERE id_persona = '$id_person'";
                  $resultadoprocess = $mysqli->query($process);
                  $rowprocess = $resultadoprocess->fetch_array(MYSQLI_ASSOC);
                  if ($rowprocess['delitosecundario'] == 'OTRO') {
                    echo '<div id="delitosec" class="col-md-6 mb-3 validar">
                      <label for="OTRO_DELITO_SECUNDARIO">OTRO_DELITO_SECUNDARIO <span class="required"></span></label>
                      <input class="form-control" id="OTRO_DELITO_SECUNDARIO" name="OTRO_DELITO_SECUNDARIO" placeholder="" value="'.$rowprocess['otrodelitosecundario'].'" type="text" value="" readonly>
                    </div>';
                  }
                   ?>

                  <div id="delitosec" class="col-md-6 mb-3 validar" style="display:none;">
                    <label for="OTRO_DELITO_SECUNDARIO1">OTRO_DELITO_SECUNDARIO <span class="required"></span></label>
                    <input class="form-control" id="OTRO_DELITO_SECUNDARIO1" name="OTRO_DELITO_SECUNDARIO1" placeholder="" value="<?php echo $rowprocess['otrodelitosecundario']; ?>" type="text" value="" readonly>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="ETAPA_PROCEDIMIENTO">ETAPA PROCEDIMIENTO<span class="required">(*)</span></label>
                    <select class="form-select form-select-lg" id="ETAPA_PROCEDIMIENTO" name="ETAPA_PROCEDIMIENTO" disabled>
                      <option style="visibility: hidden" id="opt-etapa-procedimiento" value="<?php echo $rowprocess['etapaprocedimiento']; ?>"><?php echo $rowprocess['etapaprocedimiento']; ?></option>
                      <?php
                      $etapaproc = "SELECT * FROM etapa_proc";
                      $answeretapa = $mysqli->query($etapaproc);
                      while($etapas = $answeretapa->fetch_assoc()){
                        echo "<option value='".$etapas['nombre']."'>".$etapas['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="NUC">NUC <span class="required"></span></label>
                    <input class="form-control" id="NUC" name="NUC" placeholder="" value="<?php echo $rowprocess['nuc']; ?>" type="text" readonly>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="MUNICIPIO_PERSONA">MUNICIPIO DE RADICACIÓN DE LA CARPETA DE INVESTIGACIÓN<span class="required">(*)</span></label>
                    <select class="form-select form-select-lg" id="MUNICIPIO_RADICACION" name="MUNICIPIO_RADICACION" disabled>
                      <option style="visibility: hidden" id="opt-municipio-radicacion" value="<?php echo $rowprocess['numeroradicacion']; ?>"><?php echo $rowprocess['numeroradicacion']; ?></option>
                      <?php
                      $select = "SELECT * FROM municipios";
                      $answer = $mysqli->query($select);
                      while($valores = $answer->fetch_assoc()){
                        echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
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
                    <h3 style="text-align:center">FOTOGRAFIA DEL SUJETO</h3>
                  </div>
                  <section class="text-center" >

                    <div id="visorArchivo">
                  <!--Aqui se desplegará el fichero-->
                    </div>
                    <?php
                    if ($rowfol['foto']=='') {
                      echo "NO SE CUENTA CON FOTOGRAFIA";
                    }else {
                      echo "";
                      echo '<img src ="../imagenesbdd/'.$rowfol['foto'].'" style="width:400px">';
                    }
                    ?>
                    <input class="col-md-offset-3 col-md-7" type="file" name="user_image" accept="image/*" />
                  </section>
                </div>

                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">COMENTARIOS</h3>
                  </div>
                  <div id="contenido" class="">
  									<div class="">
  		  							<table class="table table-striped table-bordered " >
  		  								<thead >

  		  								</thead>
  		  								<?php
  		      						$tabla="SELECT * FROM comentario WHERE folioexpediente ='$name_folio' AND id_persona = '$id_person'";
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
                              ".$var_fila['fecha']."
                              </span>
                              </div>
                              </li>
                        </ul>";echo "</td>";
  		          				echo "</tr>";

  		      						}
  		      					?>
  		  							</table>
  									</div>
  		  					</div>
  								<div id="footer">
  		  					</div>
                    <textarea name="COMENTARIO" id="COMENTARIO" rows="8" cols="80" placeholder="Escribe tu comentario" maxlength="200"></textarea>
                  <!-- </div> -->
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
  <?php
  $fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
  $resultfol = $mysqli->query($fol);
  $rowfol=$resultfol->fetch_assoc();
  $name_folio=$rowfol['folioexpediente'];
  $id_person=$rowfol['id'];
  $valid = "SELECT * FROM validar_persona WHERE id_persona = '$id_person'";
  $res_val=$mysqli->query($valid);
  $fil_val = $res_val->fetch_assoc();
  $validacion = $fil_val['validacion'];
    if ($name == 'diana' && $validacion != 'true') {
      echo "<div class='columns download'>
              <p>
                <a href='validar_persona.php?folio= $id_person' class='btn-flotante-glosario' ><i class=''></i>VALIDAR</a>
              </p>
      </div>";
    }
   ?>
<a href="../subdireccion_de_apoyo_tecnico_juridico/modificar.php?id=<?=$name_folio?>" class="btn-flotante">REGRESAR</a>
<p>
  <a href="https://mail.fiscaliaedomex.gob.mx" target="_blank" class="btn-flotante-notificacion" download="GLOSARIO-SIPPSIPPED.pdf"><i class="fas fa-file-signature"></i></a>
</p>
</div>
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

            document.getElementById("EDAD_PERSONA").value = `${calcularEdad(this.value)} años`;
            var mayor = "MAYOR DE EDAD";
            var menor = "MENOR DE EDAD";

            if (calcularEdad(this.value) >= 18) {

              //console.log("MAYOR DE EDAD");
              document.getElementById("GRUPO_EDAD").value = mayor;

            } else if (calcularEdad(this.value) < 18){

              //console.log("MENOR DE EDAD");
              document.getElementById("GRUPO_EDAD").value = menor;
            }

        }
    });
});
</script>
<script type="text/javascript">
var separarFolio = [];
var folio = document.getElementById('NUM_EXPEDIENTE').value;
separarFolio = folio.split("/");

var idFolio = separarFolio[3];
console.log(idFolio);
</script>
</body>
</html>
