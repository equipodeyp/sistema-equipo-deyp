<?php
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();

$query = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
$resultado=$mysqli->query($query);
$rowmedresxii=$resultado->fetch_assoc();

$query1 = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
$resultado1=$mysqli->query($query1);

$fol_exp = $_GET['folio'];
echo $fol_exp;
$fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();
$name_folio=$rowfol['folioexpediente'];
$id_person=$rowfol['id'];
// consulta de los datos de la autoridad
$aut = "SELECT * FROM autoridad WHERE id_persona = '$id_person'";
$resultadoaut = $mysqli->query($aut);
$rowaut = $resultadoaut->fetch_array(MYSQLI_ASSOC);
// consulta de los datos de origen del SUJETO
$origen = "SELECT * FROM datosorigen WHERE id = '$id_person'";
$resultadoorigen = $mysqli->query($origen);
$roworigen = $resultadoorigen->fetch_array(MYSQLI_ASSOC);
$nameestadonac=$roworigen['lugardenacimiento'];
echo $nameestadonac;
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
// datos de la radicaion de la informacion
$radmas = "SELECT * FROM radicacion_mascara1 WHERE id_persona = '$id_person'";
$resultadoradmas = $mysqli->query($radmas);
$rowradmas = $resultadoradmas->fetch_array(MYSQLI_ASSOC);
//consulta de los datos de origen de la persona
$domicilio = "SELECT * FROM domiciliopersona WHERE folioexpediente = '$name_folio'";
$resultadodomicilio = $mysqli->query($domicilio);
$rowdomicilio = $resultadodomicilio->fetch_array(MYSQLI_ASSOC);


echo $name_folio;
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link href="../css/bootstrap.min.css" rel="stylesheet">
  		<link href="../css/bootstrap-theme.css" rel="stylesheet">
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
      <script src="../js/jquery-3.1.1.min.js"></script>
  		<script src="../js/jquery.dataTables.min.js"></script>
  		<script src="../js/bootstrap.min.js"></script>
  		<script src="../js/jquery.dataTables.min.js"></script>
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

    <div class="container">
      <form class="container well form-horizontal" id="myform" method="POST" action="save_persona.php?folio=<?php echo $fol_exp; ?>" enctype= "multipart/form-data">
        <div class="row">
          <p>DATOS DE LA AUTORIDAD</p>
          <div class="col-md-6 mb-3 validar">
            <label for="SIGLAS DE LA UNIDAD">ID_SOLICITUD<span class="required"></span></label>
            <input class="form-control" id="ID_SOLICITUD" name="ID_SOLICITUD" placeholder="" type="text" value="<?php echo $rowaut['idsolicitud']; ?>" maxlength="20" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_SOLICITUD">FECHA_SOLICITUD<span class="required"></span></label>
            <input class="form-control" id="FECHA_SOLICITUD" name="FECHA_SOLICITUD" placeholder="" type="date" value="<?php echo $rowaut['fechasolicitud']; ?>" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="NOMBRE_AUTORIDAD">NOMBRE_AUTORIDAD<span class="required"></span></label>
            <select class="form-select form-select-lg" id="NOMBRE_AUTORIDAD" name="NOMBRE_AUTORIDAD" onChange="openOther(this)" required>
              <option disabled selected value><?php echo $rowaut['nombreautoridad']; ?></option>
              <?php
              $autoridad = "SELECT * FROM nombreautoridad";
              $answer = $mysqli->query($autoridad);
              while($autoridades = $answer->fetch_assoc()){
               echo "<option value='".$autoridades['id']."'>".$autoridades['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="other" style="display:none;">
            <label for="OTHER_AUTORIDAD">ESPECIFIQUE</label>
            <input class="form-control" id="OTHER_AUTORIDAD" name="OTHER_AUTORIDAD" placeholder="" value="<?php echo $rowaut['otraautoridad']; ?>" type="text">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="NOMBRE_SERVIDOR">NOMBRE_SERVIDOR<span class="required"></span></label>
            <input class="form-control" id="NOMBRE_SERVIDOR" name="NOMBRE_SERVIDOR" placeholder="" value="<?php echo $rowaut['nombreservidor']; ?>" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="AÑO">PATERNO_SERVIDOR<span class="required"></span></label>
            <input class="form-control" id="PATERNO_SERVIDOR" name="PATERNO_SERVIDOR" placeholder="" value="<?php echo $rowaut['apellidopaterno']; ?>" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="MATERNO_SERVIDOR">MATERNO_SERVIDOR<span class="required"></span></label>
            <input class="form-control" id="MATERNO_SERVIDOR" name="MATERNO_SERVIDOR" placeholder="" value="<?php echo $rowaut['apellidomaterno']; ?>" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CARGO_SERVIDOR">CARGO_SERVIDOR<span class="required"></span></label>
            <input class="form-control" id="CARGO_SERVIDOR" name="CARGO_SERVIDOR" placeholder="" value="<?php echo $rowaut['cargoservidor']; ?>" type="text" required>
          </div>
        </div>
      <div class="row">
        <div class="row">
          <hr class="mb-4">
        </div>
        <p>DATOS DE LA PERSONA PROPUESTA</p>
          <div class="col-md-6 mb-3 validar">
            <label for="SIGLAS DE LA UNIDAD">NOMBRE_PERSONA <span class="required"></span></label>
            <input class="form-control" id="NOMBRE_PERSONA" name="NOMBRE_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['nombrepersona']; ?>" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="PATERNO_PERSONA">PATERNO_PERSONA <span class="required"></span></label>
            <input class="form-control" id="PATERNO_PERSONA" name="PATERNO_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['paternopersona']; ?>" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="MATERNO_PERSONA">MATERNO_PERSONA <span class="required"></span></label>
            <input class="form-control" id="MATERNO_PERSONA" name="MATERNO_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['maternopersona']; ?>" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_NACIMIENTO_PERSONA">FECHA_NACIMIENTO_PERSONA <span class="required"></span></label>
            <input class="form-control" id="FECHA_NACIMIENTO_PERSONA" name="FECHA_NACIMIENTO_PERSONA" placeholder=""  type="date" value="<?php echo $rowfol['fechanacimientopersona']; ?>" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="EDAD_PERSONA">EDAD_PERSONA <span class="required"></span></label>
            <input class="form-control" id="EDAD_PERSONA" name="EDAD_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['edadpersona']; ?>" maxlength="2" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="GRUPO_EDAD">GRUPO_EDAD<span class="required">(*)</span></label>
            <select class="form-select form-select-lg" id="GRUPO_EDAD" name="GRUPO_EDAD" required>
              <option disabled selected value><?php echo $rowfol['grupoedad']; ?></option>
              <option value="MENOR">MENOR</option>
              <option value="MAYOR">MAYOR</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar"><label for="CALIDAD_PERSONA">CALIDAD_PERSONA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="CALIDAD_PERSONA" name="CALIDAD_PERSONA" required>
              <option disabled selected value><?php echo $rowfol['calidadpersona']; ?></option>
              <?php
              $calidad = "SELECT * FROM calidadpersona";
              $answer = $mysqli->query($calidad);
              while($calidades = $answer->fetch_assoc()){
                echo "<option value='".$calidades['id']."'>".$calidades['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="GRUPO_EDAD">SEXO_PERSONA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="SEXO_PERSONA" name="SEXO_PERSONA" required>
              <option disabled selected value><?php echo $rowfol['sexopersona']; ?></option>
              <option value="MUJER">MUJER</option>
              <option value="HOMBRE">HOMBRE</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="NOMBRE_ESTADO">LUGAR DE NACIMIENTO<span class="required"></span></label>
            <select class="form-select form-select-lg" name="cbx_estado" id="cbx_estado" required>
              <option value="0">Seleccionar Estado</option>
              <?php while($row = $resultado->fetch_assoc()) { ?>
                <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="NOMBRE_MUNICIPIO">MUNICIPIO DE NACIMIENTO<span class="required"></span></label>
            <select class="form-select form-select-lg" name="cbx_municipio" id="cbx_municipio" required></select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="NACIONALIDAD_PERSONA">NACIONALIDAD_PERSONA<span class="required"></span></label>
            <input class="form-control" id="NACIONALIDAD_PERSONA" name="NACIONALIDAD_PERSONA" placeholder=""  type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CURP_PERSONA">CURP_PERSONA <span class="required"></span></label>
            <input class="form-control" id="CURP_PERSONA" name="CURP_PERSONA" placeholder="" value="<?php echo $rowfol['curppersona']; ?>" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="RFC_PERSONA">RFC_PERSONA<span class="required"></span></label>
            <input class="form-control" id="RFC_PERSONA" name="RFC_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['rfcpersona']; ?>" maxlength="13" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="ALIAS_PERSONA">ALIAS_PERSONA <span class="required"></span></label>
            <input class="form-control" id="ALIAS_PERSONA" name="ALIAS_PERSONA" placeholder="" value="<?php echo $rowfol['aliaspersona']; ?>" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="OCUPACION_PERSONA">OCUPACION_PERSONA<span class="required"></span></label>
            <input class="form-control" id="OCUPACION_PERSONA" name="OCUPACION_PERSONA" placeholder="" value="<?php echo $rowfol['ocupacion']; ?>" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="TELEFONO_FIJO">TELEFONO_FIJO <span class="required"></span></label>
            <input class="form-control" id="TELEFONO_FIJO" name="TELEFONO_FIJO" placeholder="" value="<?php echo $rowfol['telefonofijo']; ?>" type="text" maxlength="10" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="TELEFONO_CELULAR">TELEFONO_CELULAR<span class="required"></span></label>
            <input class="form-control" id="TELEFONO_CELULAR" name="TELEFONO_CELULAR" placeholder="" value="<?php echo $rowfol['telefonocelular']; ?>" type="text" maxlength="10" required>
          </div>
          <!-- XFBXFDVNBXFCNBXCVNCVB -->
          <div class="col-md-6 mb-3 validar">
            <label for="NOMBRE_ESTADO">SELECCIONE UN ESTADO<span class="required"></span></label>
            <select class="form-select form-select-lg" name="cbx_estado1" id="cbx_estado1" required>
              <option value="0">Seleccionar Estado</option>
              <?php while($row = $resultado1->fetch_assoc()) { ?>
                <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="NOMBRE_MUNICIPIO">SELECCIONE UN MUNICIPIO<span class="required"></span></label>
            <select class="form-select form-select-lg" name="cbx_municipio1" id="cbx_municipio1"></select required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="NOMBRE_LOCALIDAD">SELECCIONE UNA LOCALIDAD<span class="required"></span></label>
            <select class="form-select form-select-lg" name="cbx_localidad1" id="cbx_localidad1" required></select>
          </div>
          <!-- XDFHSDFGHDFGHDFGHDFGHDFGH -->
          <div class="col-md-6 mb-3 validar">
            <label for="CALLE">CALLE<span class="required"></span></label>
            <input class="form-control" id="CALLE" name="CALLE" placeholder=""  type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CP">CP<span class="required"></span></label>
            <input class="form-control" id="CP" name="CP" placeholder=""  type="text" maxlength="5" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="INCAPAZ">INCAPAZ<span class="required"></span></label>
            <select class="form-select form-select-lg" id="INCAPAZ" name="INCAPAZ"  onChange="pagoOnChange(this)" required>
              <option disabled selected value><?php echo $rowfol['incapaz']; ?></option>
              <option value="SI">SI</option>
              <option value="NO">NO</option>
            </select>
          </div>
      </div>

        <div class="row">
          <div id="tutor" class="row" style="display:none;">
            <div class="row">
              <hr class="mb-4">
            </div>
            <p>DATOS DEL TUTOR</p>
            <div class="col-md-6 mb-3 validar">
              <label for="TUTOR_NOMBRE">TUTOR_NOMBRE <span class="required"></span></label>
              <input class="form-control" id="TUTOR_NOMBRE" name="TUTOR_NOMBRE" placeholder="" value="<?php echo $rowtutor['nombre']; ?>" type="text" >
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="COLONIA">TUTOR_PATERNO <span class="required"></span></label>
              <input class="form-control" id="TUTOR_PATERNO" name="TUTOR_PATERNO" placeholder="" value="<?php echo $rowtutor['apellidopaterno']; ?>" type="text" >
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="COLONIA">TUTOR_MATERNO <span class="required"></span></label>
              <input class="form-control" id="TUTOR_MATERNO" name="TUTOR_MATERNO" placeholder="" value="<?php echo $rowtutor['apellidomaterno']; ?>" type="text" >
            </div>
          </div>
        </div>

        <div class="row">
          <div class="row">
            <hr class="mb-4">
          </div>
          <p>DATOS DE LA INVESTIGACION O PROCESO PENAL</p>
          <div class="col-md-6 mb-3 validar">
            <label for="DELITO_PRINCIPAL">DELITO PRINCIPAL<span class="required"></span></label>
            <select class="form-select form-select-lg" id="DELITO_PRINCIPAL" name="DELITO_PRINCIPAL" onChange="otherdelito(this)" required>
              <option disabled selected value><?php echo $rowprocess['delitoprincipal']; ?></option>
              <?php
              $delito = "SELECT * FROM delito";
              $answer = $mysqli->query($delito);
              while($delitos = $answer->fetch_assoc()){
                echo "<option value='".$delitos['id']."'>".$delitos['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div id="otherdel" class="col-md-6 mb-3 validar"  style="display:none;">
            <label for="OTRO_DELITO_PRINCIPAL">OTRO_DELITO_PRINCIPAL <span class="required"></span></label>
            <input class="form-control" id="OTRO_DELITO_PRINCIPAL" name="OTRO_DELITO_PRINCIPAL" placeholder="" value="<?php echo $rowprocess['otrodelitoprincipal']; ?>" type="text" value="">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="DELITO_SECUNDARIO">DELITO SECUNDARIO<span class="required"></span></label>
            <select class="form-select form-select-lg" id="DELITO_SECUNDARIO" name="DELITO_SECUNDARIO" onChange="delito_secundario(this)" required>
              <option disabled selected value><?php echo $rowprocess['delitosecundario']; ?></option>
              <?php
              $delito = "SELECT * FROM delito";
              $answer = $mysqli->query($delito);
              while($delitos = $answer->fetch_assoc()){
                echo "<option value='".$delitos['id']."'>".$delitos['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div id="delitosec" class="col-md-6 mb-3 validar" style="display:none;">
            <label for="OTRO_DELITO_SECUNDARIO">OTRO_DELITO_SECUNDARIO <span class="required"></span></label>
            <input class="form-control" id="OTRO_DELITO_SECUNDARIO" name="OTRO_DELITO_SECUNDARIO" placeholder="" value="<?php echo $rowprocess['otrodelitosecundario']; ?>" type="text" value="">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="ETAPA_PROCEDIMIENTO">ETAPA PROCEDIMIENTO<span class="required">(*)</span></label>
            <select class="form-select form-select-lg" id="ETAPA_PROCEDIMIENTO" name="ETAPA_PROCEDIMIENTO" required>
              <option disabled selected value><?php echo $rowprocess['etapaprocedimiento']; ?></option>
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
            <input class="form-control" id="NUC" name="NUC" placeholder="" value="<?php echo $rowprocess['nuc']; ?>" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="MUNICIPIO_PERSONA">MUNICIPIO_RADICACION<span class="required">(*)</span></label>
            <select class="form-select form-select-lg" id="MUNICIPIO_RADICACION" name="MUNICIPIO_RADICACION" required>
              <option disabled selected value><?php echo $rowprocess['numeroradicacion']; ?></option>
              <?php
              $select = "SELECT * FROM municipios";
              $answer = $mysqli->query($select);
              while($valores = $answer->fetch_assoc()){
                echo "<option value='".$valores['clave']."'>".$valores['nombre']."</option>";
              }
              ?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="row">
            <hr class="mb-4">
          </div>
          <p>VALORACION JURIDICA</p>
          <div class="col-md-6 mb-3 validar">
            <label for="RESULTADO_VALORACION_JURIDICA">RESULTADO VALORACION JURIDICA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="RESULTADO_VALORACION_JURIDICA" name="RESULTADO_VALORACION_JURIDICA" required>
              <option disabled selected value><?php echo $rowvaljur['resultadovaloracion']; ?></option>
              <option value="SI PROCEDE">SI PROCEDE</option>
              <option value="NO PROCEDE">NO PROCEDE</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="MOTIVO_NO_PROCEDENCIA">MOTIVO NO PROCEDENCIA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="MOTIVO_NO_PROCEDENCIA" name="MOTIVO_NO_PROCEDENCIA" required>
              <option disabled selected value><?php echo $rowvaljur['motivoprocedencia']; ?></option>
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
          <p>DETERMINACION DE LA INCORPORACION</p>
          <div class="col-md-6 mb-3 validar">
            <label for="INCORPORACION">INCORPORACION<span class="required"></span></label>
            <select class="form-select form-select-lg" id="INCORPORACION" name="INCORPORACION" required>
              <option disabled selected value><?php echo $rowdetinc['incorporacion']; ?></option>
              <option value="PROCEDENTE">PROCEDENTE</option>
              <option value="NO PROCEDENTE">NO PROCEDENTE</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="MOTIVO_NO_INCORPORACION">MOTIVO_NO_INCORPORACION<span class="required"></span></label>
            <select class="form-select form-select-lg" id="MOTIVO_NO_INCORPORACION" name="MOTIVO_NO_INCORPORACION" required>
              <option disabled selected value><?php echo $rowdetinc['motivoincorporacion']; ?></option>
              <option value="NO HAY RIESGO">NO HAY RIESGO</option>
              <option value="INCUMPLIMIENTO">INCUMPLIMIENTO</option>
              <option value="VOLUNTARIEDAD">VOLUNTARIEDAD</option>
              <option value="NO APLICA">NO APLICA</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CONVENIO_ENTENDIMIENTO">CONVENIO_ENTENDIMIENTO<span class="required"></span></label>
            <input class="form-control" id="CONVENIO_ENTENDIMIENTO" name="CONVENIO_ENTENDIMIENTO" placeholder="" value="<?php echo $rowdetinc['convenioentendimiento']; ?>" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_CONVENIO_ENTENDIMIENTO">FECHA_CONVENIO_ENTENDIMIENTO<span class="required"></span></label>
            <input class="form-control" id="FECHA_CONVENIO_ENTENDIMIENTO" name="FECHA_CONVENIO_ENTENDIMIENTO" placeholder="" value="<?php echo $rowdetinc['fechaconvenioentendimiento']; ?>" type="date" value="" required>
          </div>

        </div>

        <div class="row">
          <div class="row">
            <hr class="mb-4">
          </div>
          <p>ESTATUS DEL SUJETO EN EL PROGRAMA</p>
          <div class="col-md-6 mb-3 validar">
            <label for="ESTATUS_PERSONA">ESTATUS DE LA PERSONA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="ESTATUS_PERSONA" name="ESTATUS_PERSONA" required>
              <option disabled selected value><?php echo $rowfol['estatus']; ?></option>
              <?php
              $estatus = "SELECT * FROM estatuspersona";
              $answerestatus = $mysqli->query($estatus);
              while($estatusperson = $answerestatus->fetch_assoc()){
                echo "<option value='".$estatusperson['id']."'>".$estatusperson['nombre']."</option>";
              }
              ?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="row">
            <hr class="mb-4">
          </div>
          <p>RADICACION</p>
          <div class="col-md-6 mb-3 validar">
            <label for="FUENTE">FUENTE<span class="required"></span></label>
            <select class="form-select form-select-lg" id="FUENTE" name="FUENTE" onChange="radicacionfuente(this)" required>
              <option disabled selected value><?php echo $rowradmas['fuente']; ?></option>
              <?php
              $rad = "SELECT * FROM radicacion";
              $answerrad = $mysqli->query($rad);
              while($rads = $answerrad->fetch_assoc()){
                echo "<option value='".$rads['id']."'>".$rads['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="OFICIO" style="display:none;">
            <label for="OFICIO">OFICIO<span class="required"></span></label>
            <input class="form-control" id="OFICIO" name="OFICIO" placeholder="" value="<?php echo $rowradmas['descripcion']; ?>" value=""  type="text" >
          </div>

          <div class="col-md-6 mb-3 validar" id="CORREO" style="display:none;">
            <label for="CORREO">CORREO<span class="required"></span></label>
            <input class="form-control" id="CORREO" name="CORREO" placeholder=""  value="<?php echo $rowradmas['descripcion']; ?>" type="text" >
          </div>

          <div class="col-md-6 mb-3 validar"  id="EXPEDIENTE" style="display:none;">
            <label for="EXPEDIENTE">EXPEDIENTE<span class="required"></span></label>
            <input class="form-control" id="EXPEDIENTE" name="EXPEDIENTE" placeholder="" value="<?php echo $rowradmas['descripcion']; ?>" type="text" >
          </div>

          <div class="col-md-6 mb-3 validar" id="OTRO" style="display:none;">
            <label for="OTRO">OTRO<span class="required"></span></label>
            <input class="form-control" id="OTRO" name="OTRO" placeholder=""  value="<?php echo $rowradmas['descripcion']; ?>" type="text" >
          </div>

        </div>

        <div class="row">
          <div class="row">
            <hr class="mb-4">
          </div>
          <div class="alert alert-info">
            <h4 >Fotografia del Sujeto</h4>
          </div>
          <section class="text-center" >
            <input type="file" name="foto" id="archivoInput" class="col-md-offset-3 col-md-7" onchange="return validarExt()" / required>
            <br><br>
            <div id="visorArchivo">
          <!--Aqui se desplegará el fichero-->
            </div>
          </section>
        </div>

        <div class="row">
          <div>
              <br>
              <br>
          		<button class="btn btn-success" id="enter" type="submit">SIGUIENTE</button>
          </div>
        </div>

        </div>



        </div>
        <!--  -->
      </form>
    </div>

  </div>
</div>
<div class="contenedor">
<a href="admin.php" class="btn-flotante">CANCELAR</a>
</div>
</body>
</html>
<script type="text/javascript">


// FIN DE ESTADO-MUNICIPIO-LOCALIDAD

</script>
