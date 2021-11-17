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

$query = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
$resultado23=$mysqli->query($query);


$query1 = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
$resultado1=$mysqli->query($query1);

$fol_exp = $_GET['folio'];

$fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();
$name_folio=$rowfol['folioexpediente'];
$id_person=$rowfol['id'];
$foto=$rowfol['foto'];


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
  <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body >
<div class="contenedor">
  <div class="sidebar ancho">
    <div class="logo text-warning">
    </div>
    <div class="user">
      <img src="../image/USER.jpg" alt="" width="100" height="100">
    <span class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </span>
    </div>
    <nav class="menu-nav">
    </nav>
  </div>
  <div class="main bg-light">
    <div class="barra">
        <img src="../image/ups.png" alt="" width="1400" height="150">
    </div>
      <!--  -->
      <div class="wrap">
    		<ul class="tabs">
    			<li><a href="#tab1"><span class="far fa-address-card"></span><span class="tab-text">DATOS PERSONALES</span></a></li>
    			<li><a href="#tab2"><span class="fas fa-book-open"></span><span class="tab-text">MEDIDAS</span></a></li>
    			<li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO</span></a></li>
    		</ul>

    		<div class="secciones">
    			<article id="tab1">
    				<div class="container">
              <form class="container well form-horizontal" action="update_persona.php?folio=<?php echo $id_person; ?>" method="post">
                <div class="row">
                  <div class="alert alert-info">
                    <h3 style="text-align:center">DATOS DE LA AUTORIDAD</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="SIGLAS DE LA UNIDAD">ID_SOLICITUD<span class="required"></span></label>
                    <input class="form-control" id="ID_SOLICITUD" name="ID_SOLICITUD" placeholder="" type="text" value="<?php echo $rowaut['idsolicitud']; ?>" maxlength="20" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="FECHA_SOLICITUD">FECHA_SOLICITUD<span ></span></label>
                    <input class="form-control" id="FECHA_SOLICITUD" name="FECHA_SOLICITUD" placeholder="" type="date" value="<?php echo $rowaut['fechasolicitud']; ?>" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="NOMBRE_AUTORIDAD">NOMBRE_AUTORIDAD<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="NOMBRE_AUTORIDAD" name="NOMBRE_AUTORIDAD" onChange="openOther(this)">
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
                      <input class="form-control" id="OTHER_AUTORIDAD" name="OTHER_AUTORIDAD" placeholder="" value="'.$rowaut['otraautoridad'].'" type="text">
                    </div>';
                  }
                   ?>

                  <div class="col-md-6 mb-3 validar" id="other" style="display:none;">
                    <label for="OTHER_AUTORIDAD">ESPECIFIQUE</label>
                    <input class="form-control" id="OTHER_AUTORIDAD1" name="OTHER_AUTORIDAD1" placeholder="" value="<?php echo $rowaut['otraautoridad']; ?>" type="text">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="NOMBRE_SERVIDOR">NOMBRE_SERVIDOR<span class="required"></span></label>
                    <input class="form-control" id="NOMBRE_SERVIDOR" name="NOMBRE_SERVIDOR" placeholder="" value="<?php echo $rowaut['nombreservidor']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="AÑO">PATERNO_SERVIDOR<span class="required"></span></label>
                    <input class="form-control" id="PATERNO_SERVIDOR" name="PATERNO_SERVIDOR" placeholder="" value="<?php echo $rowaut['apellidopaterno']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="MATERNO_SERVIDOR">MATERNO_SERVIDOR<span class="required"></span></label>
                    <input class="form-control" id="MATERNO_SERVIDOR" name="MATERNO_SERVIDOR" placeholder="" value="<?php echo $rowaut['apellidomaterno']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="CARGO_SERVIDOR">CARGO_SERVIDOR<span class="required"></span></label>
                    <input class="form-control" id="CARGO_SERVIDOR" name="CARGO_SERVIDOR" placeholder="" value="<?php echo $rowaut['cargoservidor']; ?>" type="text" >
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
                    <label for="SIGLAS DE LA UNIDAD">NOMBRE_PERSONA <span class="required"></span></label>
                    <input class="form-control" id="NOMBRE_PERSONA" name="NOMBRE_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['nombrepersona']; ?>" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="PATERNO_PERSONA">PATERNO_PERSONA <span class="required"></span></label>
                    <input class="form-control" id="PATERNO_PERSONA" name="PATERNO_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['paternopersona']; ?>" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="MATERNO_PERSONA">MATERNO_PERSONA <span class="required"></span></label>
                    <input class="form-control" id="MATERNO_PERSONA" name="MATERNO_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['maternopersona']; ?>" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="FECHA_NACIMIENTO_PERSONA">FECHA_NACIMIENTO_PERSONA <span class="required"></span></label>
                    <input class="form-control" id="FECHA_NACIMIENTO_PERSONA" name="FECHA_NACIMIENTO_PERSONA" placeholder=""  type="date" value="<?php echo $rowfol['fechanacimientopersona']; ?>" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="EDAD_PERSONA">EDAD_PERSONA <span class="required"></span></label>
                    <input class="form-control" id="EDAD_PERSONA" name="EDAD_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['edadpersona']; ?>" maxlength="2" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="GRUPO_EDAD">GRUPO_EDAD<span class="required">(*)</span></label>
                    <select class="form-select form-select-lg" id="GRUPO_EDAD" name="GRUPO_EDAD" >
                      <option style="visibility: hidden" id="opt-edad-persona" value="<?php echo $rowfol['grupoedad']; ?>"><?php echo $rowfol['grupoedad']; ?></option>
                      <option value="MENOR">MENOR</option>
                      <option value="MAYOR">MAYOR</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar"><label for="CALIDAD_PERSONA">CALIDAD_PERSONA<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="CALIDAD_PERSONA" name="CALIDAD_PERSONA" >
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
                    <select class="form-select form-select-lg" id="SEXO_PERSONA" name="SEXO_PERSONA" >
                      <option style="visibility: hidden" id="opt-sexo-persona" value="<?php echo $rowfol['sexopersona']; ?>"><?php echo $rowfol['sexopersona']; ?></option>
                      <option value="MUJER">MUJER</option>
                      <option value="HOMBRE">HOMBRE</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="NOMBRE_ESTADO">LUGAR DE NACIMIENTO<span class="required"></span></label>
                    <select class="form-select form-select-lg" name="cbx_estado" id="cbx_estado" onChange="updatenac(this)" >
                      <option style="visibility: hidden" id="opt-lugar-nacimiento" value="<?php echo $roworigen['lugardenacimiento']; ?>"><?php echo $roworigen['lugardenacimiento']; ?></option>
                      <?php while($row = $resultado23->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar" id="realdate2">
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
                    <input class="form-control" id="CURP_PERSONA" name="CURP_PERSONA" placeholder="" value="<?php echo $rowfol['curppersona']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="RFC_PERSONA">RFC_PERSONA<span class="required"></span></label>
                    <input class="form-control" id="RFC_PERSONA" name="RFC_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['rfcpersona']; ?>" maxlength="13" >
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

                  <div class="col-md-6 mb-3 validar">
                    <label for="NOMBRE_ESTADO">SELECCIONE UN ESTADO<span class="required"></span></label>
                    <select class="form-select form-select-lg" name="cbx_estado1" id="cbx_estado1" onChange="updatedom(this)" >
                      <option style="visibility: hidden" id="opt-seleccion-estado" value="<?php echo $rowdomicilio['seleccioneestado']; ?>"><?php echo $rowdomicilio['seleccioneestado']; ?></option>
                      <?php while($row = $resultado1->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar" id="realm">
                    <label for="NOMBRE_MUNICIPIO">SELECCIONE UN MUNICIPIO<span class="required"></span></label>
                    <select class="form-select form-select-lg" name="cbx_municipio11" id="cbx_municipio11" >
                      <option value="<?php echo $rowdomicilio['seleccionemunicipio']; ?>"><?php echo $rowdomicilio['seleccionemunicipio']; ?></option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar" id="realc">
                    <label for="NOMBRE_LOCALIDAD">SELECCIONE UNA LOCALIDAD<span class="required"></span></label>
                    <select class="form-select form-select-lg" name="cbx_localidad11" id="cbx_localidad11" >
                      <option value="<?php echo $rowdomicilio['seleccionelocalidad']; ?>"><?php echo $rowdomicilio['seleccionelocalidad']; ?></option>
                    </select>
                  </div>


                  <!-- XDFHSDFGHDFGHDFGHDFGHDFGH -->
                  <div class="col-md-6 mb-3 validar">
                    <label for="CALLE">CALLE<span class="required"></span></label>
                    <input class="form-control" id="CALLE" name="CALLE" placeholder="" value="<?php echo $rowdomicilio['calle']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="CP">CP<span class="required"></span></label>
                    <input class="form-control" id="CP" name="CP" placeholder="" value="<?php echo $rowdomicilio['cp']; ?>" type="text" maxlength="5" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="INCAPAZ">INCAPAZ<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="INCAPAZ" name="INCAPAZ"  onChange="pagoOnChangemod(this)" >
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
                      <p style="text-align:center">DATOS DEL TUTOR</p>
                    </div>
                    <div class="col-md-6 mb-3 validar">
                      <label for="TUTOR_NOMBRE">TUTOR_NOMBRE <span class="required"></span></label>
                      <input class="form-control" id="TUTOR_NOMBRE" name="TUTOR_NOMBRE" placeholder="" value="' .$rowtutor['nombre'].'" type="text" >
                    </div>

                    <div class="col-md-6 mb-3 validar">
                      <label for="COLONIA">TUTOR_PATERNO <span class="required"></span></label>
                      <input class="form-control" id="TUTOR_PATERNO" name="TUTOR_PATERNO" placeholder="" value="'. $rowtutor['apellidopaterno'].'" type="text" >
                    </div>

                    <div class="col-md-6 mb-3 validar">
                      <label for="COLONIA">TUTOR_MATERNO <span class="required"></span></label>
                      <input class="form-control" id="TUTOR_MATERNO" name="TUTOR_MATERNO" placeholder="" value="'.$rowtutor['apellidomaterno'].'" type="text" >
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
                    <select class="form-select form-select-lg" id="DELITO_PRINCIPAL" name="DELITO_PRINCIPAL" onChange="otherdelito(this)" >
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
                      <input class="form-control" id="OTRO_DELITO_PRINCIPAL" name="OTRO_DELITO_PRINCIPAL" placeholder="" value="'.$rowprocess['otrodelitoprincipal'].'" type="text" value="">
                    </div>';
                  }
                   ?>

                   <div id="otherdel" class="col-md-6 mb-3 validar"  style="display:none;">
                     <label for="OTRO_DELITO_PRINCIPAL">OTRO_DELITO_PRINCIPAL <span class="required"></span></label>
                     <input class="form-control" id="OTRO_DELITO_PRINCIPAL1" name="OTRO_DELITO_PRINCIPAL1" placeholder="" value="<?php echo $rowprocess['otrodelitoprincipal']; ?>" type="text" value="">
                   </div>


                  <div class="col-md-6 mb-3 validar">
                    <label for="DELITO_SECUNDARIO">DELITO SECUNDARIO<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="DELITO_SECUNDARIO" name="DELITO_SECUNDARIO" onChange="delito_secundario(this)" >
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
                      <input class="form-control" id="OTRO_DELITO_SECUNDARIO" name="OTRO_DELITO_SECUNDARIO" placeholder="" value="'.$rowprocess['otrodelitosecundario'].'" type="text" value="">
                    </div>';
                  }
                   ?>

                  <div id="delitosec" class="col-md-6 mb-3 validar" style="display:none;">
                    <label for="OTRO_DELITO_SECUNDARIO1">OTRO_DELITO_SECUNDARIO <span class="required"></span></label>
                    <input class="form-control" id="OTRO_DELITO_SECUNDARIO1" name="OTRO_DELITO_SECUNDARIO1" placeholder="" value="<?php echo $rowprocess['otrodelitosecundario']; ?>" type="text" value="">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="ETAPA_PROCEDIMIENTO">ETAPA PROCEDIMIENTO<span class="required">(*)</span></label>
                    <select class="form-select form-select-lg" id="ETAPA_PROCEDIMIENTO" name="ETAPA_PROCEDIMIENTO" >
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
                    <input class="form-control" id="NUC" name="NUC" placeholder="" value="<?php echo $rowprocess['nuc']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="MUNICIPIO_PERSONA">MUNICIPIO_RADICACION<span class="required">(*)</span></label>
                    <select class="form-select form-select-lg" id="MUNICIPIO_RADICACION" name="MUNICIPIO_RADICACION" >
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
                    <h3 style="text-align:center">VALORACION JURIDICA</h3>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="RESULTADO_VALORACION_JURIDICA">RESULTADO VALORACION JURIDICA<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="RESULTADO_VALORACION_JURIDICA" name="RESULTADO_VALORACION_JURIDICA" >
                      <option style="visibility: hidden" id="opt-resultado-valoracio-juridica" value="<?php echo $rowvaljur['resultadovaloracion']; ?>"><?php echo $rowvaljur['resultadovaloracion']; ?></option>
                      <option value="SI PROCEDE">SI PROCEDE</option>
                      <option value="NO PROCEDE">NO PROCEDE</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="MOTIVO_NO_PROCEDENCIA">MOTIVO NO PROCEDENCIA<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="MOTIVO_NO_PROCEDENCIA" name="MOTIVO_NO_PROCEDENCIA" >
                      <option style="visibility: hidden" id="opt-motivo-no-procedencia" value="<?php echo $rowvaljur['motivoprocedencia']; ?>"><?php echo $rowvaljur['motivoprocedencia']; ?></option>
                      <option value="NO CORRESPONDE EL TIPO PENAL">NO CORRESPONDE EL TIPO PENAL</option>
                      <option value="NO CUMPLE CON LOS REQUISITOS">NO CUMPLE CON LOS REQUISITOS</option>
                      <option value="AMBAS">AMBAS</option>
                      <option value="NO APLICA">NO APLICA</option>
                    </select>
                  </div>

                </div>

                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">DETERMINACION DE LA INCORPORACION</h3>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="ANALISIS_MULTIDISCIPLINARIO">ANALISIS_MULTIDISCIPLINARIO</label>
                    <select class="form-select form-select-lg" name="ANALISIS_MULTIDISCIPLINARIO">
                      <option style="visibility: hidden" id="opt-analisis-multidisiplinario" value="<?php echo $rowdetinc['multidisciplinario']; ?>"><?php echo $rowdetinc['multidisciplinario']; ?></option>
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
                    <label for="INCORPORACION">INCORPORACION<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="INCORPORACION" name="INCORPORACION" >
                      <option style="visibility: hidden" id="opt-incorporacion" value="<?php echo $rowdetinc['incorporacion']; ?>"><?php echo $rowdetinc['incorporacion']; ?></option>
                      <option value="SUJETO INCORPORADO">SUJETO INCORPORADO</option>
                      <option value="SUJETO NO INCORPORADO">SUJETO NO INCORPORADO</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="FECHA_AUTORIZACION">FECHA AUTORIZACION ANALISIS MULTIDISCIPLINARIO<span class="required"></span></label>
                    <input class="form-control" id="FECHA_AUTORIZACION" name="FECHA_AUTORIZACION" placeholder=""  type="date" value="<?php echo $rowdetinc['date_autorizacion']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="CONVENIO_ENTENDIMIENTO">CONVENIO_ENTENDIMIENTO<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="CONVENIO_ENTENDIMIENTO" name="CONVENIO_ENTENDIMIENTO" >
                      <option style="visibility: hidden" id="opt-convenio-de-entendimiento" value="<?php echo $rowdetinc['convenio']; ?>"><?php echo $rowdetinc['convenio']; ?></option>
                      <?php
                      $convenioo = "SELECT * FROM convenio";
                      $answerconvenioo = $mysqli->query($convenioo);
                      while($convenioos = $answerconvenioo->fetch_assoc()){
                        echo "<option value='".$convenioos['nombre']."'>".$convenioos['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="VIGENCIA_CONVENIO">VIGENCIA CONVENIO</label>
                    <input class="form-control" id="VIGENCIA_CONVENIO" type="text" name="VIGENCIA_CONVENIO" value="<?php echo $rowdetinc['vigencia']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="FECHA_CONVENIO_ENTENDIMIENTO">FECHA_CONVENIO_ENTENDIMIENTO<span class="required"></span></label>
                    <input class="form-control" id="FECHA_CONVENIO_ENTENDIMIENTO_DOS" name="FECHA_CONVENIO_ENTENDIMIENTO" placeholder="" value="<?php echo $rowdetinc['date_convenio']; ?>" type="date" value="" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="CONCLUSION_CANCELACION">CONCLUSION_CANCELACION</label>
                    <select class="form-select form-select-lg" name="CONCLUSION_CANCELACION" onChange="openart35(this)">
                      <option style="visibility: hidden" id="opt-conclusion-cancelacion" value="<?php echo $rowdetinc['conclu_cancel']; ?>"><?php echo $rowdetinc['conclu_cancel']; ?></option>
                      <option value="CANCELACION">CANCELACION</option>
                      <option value="CONCLUSION">CONCLUSION</option>
                    </select>
                  </div>

                  <?php
                  $detinc = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_person'";
                  $resultadodetinc = $mysqli->query($detinc);
                  $rowdetinc = $resultadodetinc->fetch_array(MYSQLI_ASSOC);
                  if ($rowdetinc['conclu_cancel'] == 'CONCLUSION') {
                    echo '<div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35">
                      <label for="CONCLUSION">CONCLUSION ARTICULO 35</label>
                      <select class="form-select form-select-lg" id="CONCLUSION_ART35z" name="CONCLUSION_ART35z" onChange="otherart35(this)">
                        <option style="visibility: hidden" id="opt-conclusion-art35" value="'.$rowdetinc['conclusionart35'].'">'.$rowdetinc['conclusionart35'].'</option>';
                        $art35 = "SELECT * FROM conclusionart35";
                        $answerart35 = $mysqli->query($art35);
                        while($art35s = $answerart35->fetch_assoc()){
                          echo "<option value='".$art35s['nombre']."'>".$art35s['nombre']."</option>";
                        }
                        echo '</select>
                      </div>';

                  }
                   ?>
                   <div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35" style="display:none;">
                     <label for="CONCLUSION">CONCLUSION ARTICULO 35</label>
                     <select class="form-select form-select-lg" id="CONCLUSION_ART351" name="CONCLUSION_ART351" onChange="otherart35(this)">
                       <option  value="<?php echo $rowdetinc['conclusionart35']; ?>"><?php echo $rowdetinc['conclusionart35']; ?></option>
                       <?php
                       $art35 = "SELECT * FROM conclusionart35";
                       $answerart35 = $mysqli->query($art35);
                       while($art35s = $answerart35->fetch_assoc()){
                         echo "<option value='".$art35s['nombre']."'>".$art35s['nombre']."</option>";
                       }
                       ?>
                     </select>
                   </div>

                   <?php
                   $detinc = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_person'";
                   $resultadodetinc = $mysqli->query($detinc);
                   $rowdetinc = $resultadodetinc->fetch_array(MYSQLI_ASSOC);
                   if ($rowdetinc['conclusionart35'] == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
                     echo '<div class="col-md-6 mb-3 validar" id="OTHERART35">
                       <label for="OTHER_ART35">ESPECIFIQUE</label>
                       <input class="form-control" id="OTHER_ART35" name="OTHER_ART35" placeholder="" value="'.$rowdetinc['otroart35'].'" type="text">
                     </div>';
                   }
                    ?>

                    <div class="col-md-6 mb-3 validar" id="OTHERART35" style="display:none;">
                      <label for="OTHER_ART35">ESPECIFIQUE</label>
                      <input class="form-control" id="OTHER_ART351" name="OTHER_ART351" placeholder="" value="<?php $rowdetinc['otroart35']; ?>" type="text">
                    </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="FECHA_DESINCORPORACION">FECHA_DESINCORPORACION<span class="required"></span></label>
                    <input class="form-control" id="FECHA_DESINCORPORACION_UNO" name="FECHA_DESINCORPORACION" placeholder=""  type="date" value="<?php echo $rowdetinc['date_desincorporacion']; ?>">
                  </div>

                </div>

                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">ESTATUS DEL SUJETO EN EL PROGRAMA</h3>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="ESTATUS_PERSONA">ESTATUS DE LA PERSONA<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="ESTATUS_PERSONA" name="ESTATUS_PERSONA" >
                      <option style="visibility: hidden" id="opt-estatus-persona" value="<?php echo $rowfol['estatus']; ?>"><?php echo $rowfol['estatus']; ?></option>
                      <?php
                      $estatus = "SELECT * FROM estatuspersona";
                      $answerestatus = $mysqli->query($estatus);
                      while($estatusperson = $answerestatus->fetch_assoc()){
                        echo "<option value='".$estatusperson['nombre']."'>".$estatusperson['nombre']."</option>";
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
                    <label for="FUENTE">FUENTE<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="FUENTE" name="FUENTE" onChange="showInp()" >
                      <option style="visibility: hidden" id="opt-fuente" value="<?php echo $rowradmas['fuente']; ?>"><?php echo $rowradmas['fuente']; ?></option>
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
                  $radmas = "SELECT * FROM radicacion_mascara1 WHERE id_persona = '$id_person'";
                  $resultadoradmas = $mysqli->query($radmas);
                  $rowradmas = $resultadoradmas->fetch_array(MYSQLI_ASSOC);
                  if ($rowradmas['fuente']=='OFICIO') {
                    echo '<div class="col-md-6 mb-3 validar" id="OFICIO">
                      <label for="OFICIO">OFICIO<span class="required"></span></label>
                      <input class="form-control" id="OFICIO" name="OFICIO" placeholder="" value="'.$rowradmas['descripcion'].'" value=""  type="text" >
                    </div>';
                  } else if ($rowradmas['fuente']=='CORREO') {
                    echo '<div class="col-md-6 mb-3 validar" id="CORREO">
                      <label for="CORREO">CORREO<span class="required"></span></label>
                      <input class="form-control" id="CORREO" name="CORREO" placeholder=""  value="'.$rowradmas['descripcion'].'" type="text" >
                    </div>';
                  } elseif ($rowradmas['fuente']=='EXPEDIENTE') {
                    echo '<div class="col-md-6 mb-3 validar"  id="EXPEDIENTE">
                      <label for="EXPEDIENTE">EXPEDIENTE<span class="required"></span></label>
                      <input class="form-control" id="EXPEDIENTE" name="EXPEDIENTE" placeholder="" value="'.$rowradmas['descripcion'].'" type="text" >
                    </div>';
                  }elseif ($rowradmas['fuente']=='OTRO') {
                    echo '<div class="col-md-6 mb-3 validar" id="OTRO">
                      <label for="OTRO">OTRO<span class="required"></span></label>
                      <input class="form-control" id="OTRO" name="OTRO" placeholder=""  value="'.$rowradmas['descripcion'].'" type="text" >
                    </div>';
                  }
                   ?>

                  <div class="col-md-6 mb-3 validar" id="OFICIO" style="display:none;">
                    <label for="OFICIO">OFICIO<span class="required"></span></label>
                    <input class="form-control" id="OFICIO1" name="OFICIO1" placeholder="" value="<?php echo $rowradmas['descripcion']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar" id="CORREO" style="display:none;">
                    <label for="CORREO">CORREO<span class="required"></span></label>
                    <input class="form-control" id="CORREO1" name="CORREO1" placeholder=""  value="<?php echo $rowradmas['descripcion']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar"  id="EXPEDIENTE" style="display:none;">
                    <label for="EXPEDIENTE">EXPEDIENTE<span class="required"></span></label>
                    <input class="form-control" id="EXPEDIENTE1" name="EXPEDIENTE1" placeholder="" value="<?php echo $rowradmas['descripcion']; ?>" type="text" >
                  </div>

                  <div class="col-md-6 mb-3 validar" id="OTRO" style="display:none;">
                    <label for="OTRO">OTRO<span class="required"></span></label>
                    <input class="form-control" id="OTRO1" name="OTRO1" placeholder=""  value="<?php echo $rowradmas['descripcion']; ?>" type="text" >
                  </div>

                </div>

                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert alert-info">
                    <h3 style="text-align:center">Fotografia del Sujeto</h3>
                  </div>
                  <section class="text-center" >
                    <input type="file" name="foto1" id="archivoInput" class="col-md-offset-3 col-md-7" onchange="return validarExt()" / >
                    <br><br>
                    <div id="visorArchivo">
                  <!--Aqui se desplegará el fichero-->
                    </div>
                    <?php
                    if ($rowfol['foto']=='') {
                      echo "no hay foto";
                    }else {
                      echo "si hay foto";
                      echo '<img src ="../imagenesbdd/'.$rowfol['foto'].'" style="width:400px">';
                    }
                    ?>
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
    			<article id="tab2">
            <div class="container">

        			<div class="well form-horizontal" >
        				<div class="row">
                  <div class="row alert alert-info">
                    <h3 style="text-align:center">DETALLES DEL EXPEDIENTE</h3>
          				</div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="ID_EXPEDIENTE">ID EXPEDIENTE<span class="required"></span></label>
                    <input class="form-control" id="ID_EXPEDIENTE" name="ID_EXPEDIENTE" placeholder="" required="" type="text" value="<?php echo $rowaut['folioexpediente']; ?>" disabled>
                  </div>

                <div class="col-md-6 mb-3 validar">
                  <label for="NOMRE_SUJETO">NOMBRE SUJETO PROTEGIDO<span class="required"></span></label>
                  <input class="form-control" id="NOMRE_SUJETO" name="NOMRE_SUJETO" placeholder="" required="" type="text" value="<?php echo $rowfol['nombrepersona']; ?>" disabled>
                </div>

                <div class="col-md-6 mb-3 validar">
                  <label for="APELLIDO_PATERNO">APELLIDO PATERNO<span class="required"></span></label>
                  <input class="form-control" id="APELLIDO_PATERNO" name="APELLIDO_PATERNO" placeholder="" required="" type="text" value="<?php echo $rowfol['paternopersona']; ?>" disabled>
                </div>

                <div class="col-md-6 mb-3 validar">
                  <label for="APELLIDO_MATERNO">APELLIDO MATERNO<span class="required"></span></label>
                  <input class="form-control" id="APELLIDO_MATERNO" name="APELLIDO_MATERNO" placeholder="" required="" type="text" value="<?php echo $rowfol['maternopersona']; ?>" disabled>
                </div>

                <div class="col-md-6 mb-3 validar">
                  <label for="CALIDAD_DEL_SUJETO">CALIDAD DEL SUJETO<span class="required"></span></label>
                  <select class="form-control" id="CALIDAD_DEL_SUJETO" name="CALIDAD_DEL_SUJETO" disabled>
                    <option value=""><?php echo $rowfol['calidadpersona']; ?></option>
                    <?php
                    $select = "SELECT * FROM calidadpersona";
                    $answer = $mysqli->query($select);
                    while($valores = $answer->fetch_assoc()){
                     echo "<option value='".$valores['id']."'>".$valores['nombre']."</option>";
                   }
                   ?>
                  </select>
                </div>
        			</div>
              </div>
        		</div>
            <div class="container ">
        			<div class="well form-horizontal">
        		  <div id="cabecera">
        				<div class="row alert alert-info">
        					<h3 style="text-align:center">MEDIDAS</h3>
        				</div>
        		  </div>

        		  <div id="contenido">
        		  	<table class="table table-striped table-bordered ">
        		  		<thead >
        		  			<th>ID</th>
                    <th>Tipo de medida</th>
                    <th>Clasificacion medida</th>
                    <th>Estatus</th>
                    <th>Municipio</th>
                    <th>Fecha ejecucion</th>
        		  			<th> <a href="registro_medida.php?folio=<?php echo $fol_exp; ?>"> <button type="button" class="btn btn-info">Nueva Medida</button> </a> </th>
        		  		</thead>
        		  		<?php
        		      $tabla="SELECT * FROM medidas WHERE id_persona ='$fol_exp'";
        		       $var_resultado = $mysqli->query($tabla);
        		      while ($var_fila=$var_resultado->fetch_array())
        		      {
        		        echo "<tr>";
        		          echo "<td>"; echo $var_fila['id']; echo "</td>";
        		          echo "<td>"; echo $var_fila['tipo']; echo "</td>";
        		          echo "<td>"; echo $var_fila['clasificacion']; echo "</td>";
        		          echo "<td>"; echo $var_fila['estatus']; echo "</td>";
        		          echo "<td>"; echo $var_fila['ejecucion']; echo "</td>";
        		          echo "<td>"; echo $var_fila['date_ejecucion']; echo "</td>";
        		          echo "<td>  <a href='mod_medida.php?id=".$var_fila['id']."'> <button type='button' class='btn btn-success'>Modificar</button> </a> </td>";
        		        echo "</tr>";
        		      }
        		      ?>
        		  	</table>
        		  </div>
        			<div id="footer">
        		  </div>

        		</div>
        		</div>
    			</article>
    			<article id="tab3">
            <div class="container">
              <form class=" container well form-horizontal" action="update_seguim.php?folio=<?php echo $id_person; ?>" method="post">
                <div class="row">
                  <div class="alert alert-info">
                    <h3 style="text-align:center">DATOS GENERALES DEL EXPEDIENTE</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="RESULTADO_VALORACION_JURIDICA">RESULTADO_VALORACION_JURIDICA<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="SEDE" name="RESULTADO_VALORACION_JURIDICA" disabled>
                      <option value=""><?php echo $rowvaljur['resultadovaloracion']; ?></option>
                      <option value="SI_PROCEDE">SI_PROCEDE </option>
                      <option value="NO_PROCEDE">NO_PROCEDE</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="MOTIVO_NO_PROCEDENCIA_JURIDICA">MOTIVO_NO_PROCEDENCIA_JURIDICA<span class="required"></span></label>
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
                    <label for="ANALISIS_MULTIDISCIPLINARIO">ANALISIS_MULTIDISCIPLINARIO</label>
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
                    <label for="INCORPORACION">INCORPORACION<span class="required"></span></label>
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
                    <label for="FECHA_AUTORIZACION_ANALISIS">FECHA AUTORIZACION DE ANALISIS MULTIDISCIPLINARIO<span class="required"></span></label>
                    <input class="form-control" id="FECHA_AUTORIZACION_ANALISIS" name="FECHA_AUTORIZACION_ANALISIS" placeholder=""  type="date" value="<?php echo $rowseguimexp['date_autorizacion']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="CONVENIO_DE_ENTENDIMIENTO">CONVENIO_DE_ENTENDIMIENTO<span class="required"></span></label>
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
                    <label for="FECHA_CONVENIO_ENTENDIMIENTO">FECHA_CONVENIO_ENTENDIMIENTO<span class="required"></span></label>
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
                    <label for="CONCLUSION_CANCELACION">CONCLUSION_CANCELACION</label>
                    <select class="form-select form-select-lg" name="CONCLUSION_CANCELACION" onChange="open3art35zz(this)">
                      <option style="visibility: hidden" id="tab3-conclusion-cancelaciom" value="<?php echo $rowstatusexp['conclu_cancel']; ?>"><?php echo $rowstatusexp['conclu_cancel']; ?></option>
                      <option value="CANCELACION">CANCELACION</option>
                      <option value="CONCLUSION">CONCLUSION</option>
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
                     <label for="CONCLUSION_ART35">CONCLUSION ARTICULO 35</label>
                     <select class="form-select form-select-lg" name="CONCLUSION_ART35" onChange="modotherart35s(this)">
                       <option disabled selected value="">SELECCIONE UNA OPCION</option>
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
                     <label for="FECHA_DESINCORPORACION">FECHA_DESINCORPORACION<span class="required"></span></label>
                     <input class="form-control" id="FECHA_DESINCORPORACION_DOS" name="FECHA_DESINCORPORACION" placeholder=""  type="date" value="<?php echo $rowstatusexp['date_desincorporacion']; ?>">
                   </div>

                   <div class="col-md-6 mb-3 validar">
                     <label for="ESTATUS_EXPEDIENTE">ESTATUS_EXPEDIENTE<span class="required"></span></label>
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
<a href="admin.php" class="btn-flotante">CANCELAR</a>
</div>
<!-- SCRIPT DE FECHAS  -->
<script type="text/javascript">
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
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
</body>
</html>
