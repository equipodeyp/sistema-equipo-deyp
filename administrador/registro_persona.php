<?php
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$verifica = 1;
$_SESSION["verifica"] = $verifica;
$name = $_SESSION['usuario'];

$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();

$query = "SELECT id_estado, estado FROM t_estado ORDER BY id_estado";
$resultado=$mysqli->query($query);

$query1 = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
$resultado1=$mysqli->query($query1);

$fol_exp = $_GET['folio'];

$qry = "select max(ID) As id from datospersonales";
$result = $mysqli->query($qry);
$row = $result->fetch_assoc();
$num_consecutivo =$row["id"];

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
<script src="../js/validar_campos.js"></script>
<script src="../js/Javascript.js"></script>

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
    <div class="wrap">

    <div class="secciones">

  <article id="tab1">
    <div class="container">
      <form class="container well form-horizontal" id="myform" method="POST" action="save_persona.php?folio=<?php echo $fol_exp; ?>" enctype= "multipart/form-data">
        <div class="row">
          <div class="alert alert-info">
            <h3 style="text-align:center">DATOS DE LA AUTORIDAD</h3>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="SIGLAS DE LA UNIDAD">ID_SOLICITUD<span ></span></label>
            <input class="form-control" id="ID_SOLICITUD" name="ID_SOLICITUD" placeholder="" type="text" value="" maxlength="20">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_SOLICITUD">FECHA_SOLICITUD<span class="required"></span></label>
            <input class="form-control" id="FECHA_SOLICITUD" name="FECHA_SOLICITUD" placeholder="" type="date" value="" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="NOMBRE_AUTORIDAD">NOMBRE_AUTORIDAD<span class="required"></span></label>
            <select class="form-select form-select-lg" id="NOMBRE_AUTORIDAD" name="NOMBRE_AUTORIDAD" onChange="openOther(this)" required>
              <option disabled selected value>SELECCIONE LA AUTORIDAD</option>
              <?php
              $autoridad = "SELECT * FROM nombreautoridad";
              $answer = $mysqli->query($autoridad);
              while($autoridades = $answer->fetch_assoc()){
               echo "<option value='".$autoridades['nombre']."'>".$autoridades['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="other" style="display:none;">
            <label for="OTHER_AUTORIDAD">ESPECIFIQUE</label>
            <input class="form-control" id="OTHER_AUTORIDAD" name="OTHER_AUTORIDAD" placeholder="" value="" type="text">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="NOMBRE_SERVIDOR">NOMBRE_SERVIDOR<span class="required"></span></label>
            <input class="form-control" id="NOMBRE_SERVIDOR" name="NOMBRE_SERVIDOR" placeholder="" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="AÑO">PATERNO_SERVIDOR<span class="required"></span></label>
            <input class="form-control" id="PATERNO_SERVIDOR" name="PATERNO_SERVIDOR" placeholder="" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="MATERNO_SERVIDOR">MATERNO_SERVIDOR<span class="required"></span></label>
            <input class="form-control" id="MATERNO_SERVIDOR" name="MATERNO_SERVIDOR" placeholder="" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CARGO_SERVIDOR">CARGO_SERVIDOR<span class="required"></span></label>
            <input class="form-control" id="CARGO_SERVIDOR" name="CARGO_SERVIDOR" placeholder="" type="text" required>
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
              <input class="form-control" id="NOMBRE_PERSONA" name="NOMBRE_PERSONA" placeholder=""  type="text" value="" required>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="PATERNO_PERSONA">PATERNO_PERSONA <span class="required"></span></label>
              <input class="form-control" id="PATERNO_PERSONA" name="PATERNO_PERSONA" placeholder=""  type="text" value="" required>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="MATERNO_PERSONA">MATERNO_PERSONA <span class="required"></span></label>
              <input class="form-control" id="MATERNO_PERSONA" name="MATERNO_PERSONA" placeholder=""  type="text" value="" required>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="FECHA_NACIMIENTO_PERSONA">FECHA_NACIMIENTO_PERSONA <span class="required"></span></label>
              <input class="form-control" id="FECHA_NACIMIENTO_PERSONA" name="FECHA_NACIMIENTO_PERSONA" placeholder=""  type="date" value="" required>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="EDAD_PERSONA">EDAD_PERSONA <span class="required"></span></label>
              <input readonly class="form-control" id="EDAD_PERSONA" name="EDAD_PERSONA" placeholder=""  type="text" value="" maxlength="2" required>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="GRUPO_EDAD">GRUPO_EDAD<span class="required">(*)</span></label>
              <select class="form-select form-select-lg" id="GRUPO_EDAD" name="GRUPO_EDAD" required>
                <option disabled selected value>SELECCIONE UNA OPCION</option>
                <option value="MENOR">MENOR</option>
                <option value="MAYOR">MAYOR</option>
              </select>
            </div>

            <div class="col-md-6 mb-3 validar"><label for="CALIDAD_PERSONA">CALIDAD_PERSONA<span class="required"></span></label>
              <select class="form-select form-select-lg" id="CALIDAD_PERSONA" name="CALIDAD_PERSONA" required>
                <option disabled selected value>SELECCIONE UNA OPCION</option>
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
              <select class="form-select form-select-lg" id="SEXO_PERSONA" name="SEXO_PERSONA" required>
                <option disabled selected value>SELECCIONE UNA OPCION</option>
                <option value="MUJER">MUJER</option>
                <option value="HOMBRE">HOMBRE</option>
              </select>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="NOMBRE_ESTADO">LUGAR DE NACIMIENTO<span class="required"></span></label>
              <select class="form-select form-select-lg" name="cbx_estado" id="cbx_estado" onChange="OTHERPAIS(this)">
                <option value="0">Seleccionar Estado</option>
                <?php while($row = $resultado->fetch_assoc()) { ?>
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
              <select class="form-select form-select-lg" name="cbx_municipio" id="cbx_municipio"></select>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="NACIONALIDAD_PERSONA">NACIONALIDAD_PERSONA<span class="required"></span></label>
              <input class="form-control" id="NACIONALIDAD_PERSONA" name="NACIONALIDAD_PERSONA" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="CURP_PERSONA">CURP_PERSONA <span class="required"></span></label>
              <input class="form-control" id="CURP_PERSONA" name="CURP_PERSONA" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="RFC_PERSONA">RFC_PERSONA<span class="required"></span></label>
              <input class="form-control" id="RFC_PERSONA" name="RFC_PERSONA" placeholder=""  type="text" maxlength="13">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="ALIAS_PERSONA">ALIAS_PERSONA <span class="required"></span></label>
              <input class="form-control" id="ALIAS_PERSONA" name="ALIAS_PERSONA" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="OCUPACION_PERSONA">OCUPACION_PERSONA<span class="required"></span></label>
              <input class="form-control" id="OCUPACION_PERSONA" name="OCUPACION_PERSONA" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="TELEFONO_FIJO">TELEFONO_FIJO <span class="required"></span></label>
              <input class="form-control" id="TELEFONO_FIJO" name="TELEFONO_FIJO" placeholder=""  type="text" maxlength="10">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="TELEFONO_CELULAR">TELEFONO_CELULAR<span class="required"></span></label>
              <input class="form-control" id="TELEFONO_CELULAR" name="TELEFONO_CELULAR" placeholder=""  type="text" maxlength="10">
            </div>
            <!-- XFBXFDVNBXFCNBXCVNCVB -->
            <div class="col-md-6 mb-3 validar">
              <label for="NOMBRE_ESTADO">SELECCIONE UN ESTADO<span class="required"></span></label>
              <select class="form-select form-select-lg" name="cbx_estado1" id="cbx_estado1">
                <option value="">Seleccionar Estado</option>
                <?php while($row = $resultado1->fetch_assoc()) { ?>
                  <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="NOMBRE_MUNICIPIO">SELECCIONE UN MUNICIPIO<span class="required"></span></label>
              <select class="form-select form-select-lg" name="cbx_municipio11" id="cbx_municipio11"></select>
              </div>

              <div class="col-md-6 mb-3 validar">
                <label for="NOMBRE_LOCALIDAD">SELECCIONE UNA LOCALIDAD<span class="required"></span></label>
                <select class="form-select form-select-lg" name="cbx_localidad11" id="cbx_localidad11"></select>
              </div>
              <!-- XDFHSDFGHDFGHDFGHDFGHDFGH -->
              <div class="col-md-6 mb-3 validar">
                <label for="CALLE">CALLE<span class="required"></span></label>
                <input class="form-control" id="CALLE" name="CALLE" placeholder="" value="" type="text">
              </div>

              <div class="col-md-6 mb-3 validar">
                <label for="CP">CP<span class="required"></span></label>
                <input class="form-control" id="CP" name="CP" placeholder="" value="" type="text" maxlength="5">
              </div>

              <div class="col-md-6 mb-3 validar">
                <label for="INCAPAZ">INCAPAZ<span class="required"></span></label>
                <select class="form-select form-select-lg" id="INCAPAZ" name="INCAPAZ"  onChange="pagoOnChange(this)" required>
                  <option disabled selected value>SELECCIONE UNA OPCION</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </select>
              </div>
        </div>

        <div id="tutor" class="row" style="display:none;">
            <div class="row">
              <hr class="mb-4">
            </div>
            <div class="alert alert-info">
              <h3 style="text-align:center">DATOS DEL TUTOR</h3>
            </div>
            <div class="col-md-6 mb-3 validar">
              <label for="TUTOR_NOMBRE">TUTOR_NOMBRE <span class="required"></span></label>
              <input class="form-control" id="TUTOR_NOMBRE" name="TUTOR_NOMBRE" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="COLONIA">TUTOR_PATERNO <span class="required"></span></label>
              <input class="form-control" id="TUTOR_PATERNO" name="TUTOR_PATERNO" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="COLONIA">TUTOR_MATERNO <span class="required"></span></label>
              <input class="form-control" id="TUTOR_MATERNO" name="TUTOR_MATERNO" placeholder=""  type="text">
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
            <select class="form-select form-select-lg" id="DELITO_PRINCIPAL" name="DELITO_PRINCIPAL" onChange="otherdelito(this)" required>
              <option disabled selected value>SELECCIONE UNA OPCION</option>
              <?php
              $delito = "SELECT * FROM delito";
              $answer = $mysqli->query($delito);
              while($delitos = $answer->fetch_assoc()){
                echo "<option value='".$delitos['nombre']."'>".$delitos['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div id="otherdel" class="col-md-6 mb-3 validar"  style="display:none;">
            <label for="OTRO_DELITO_PRINCIPAL">OTRO_DELITO_PRINCIPAL <span class="required"></span></label>
            <input class="form-control" id="OTRO_DELITO_PRINCIPAL" name="OTRO_DELITO_PRINCIPAL" placeholder="" type="text" value="">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="DELITO_SECUNDARIO">DELITO SECUNDARIO<span class="required"></span></label>
            <select class="form-select form-select-lg" id="DELITO_SECUNDARIO" name="DELITO_SECUNDARIO" onChange="delito_secundario(this)">
              <option disabled selected value>SELECCIONE UNA OPCION</option>
              <?php
              $delito = "SELECT * FROM delito";
              $answer = $mysqli->query($delito);
              while($delitos = $answer->fetch_assoc()){
                echo "<option value='".$delitos['nombre']."'>".$delitos['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div id="delitosec" class="col-md-6 mb-3 validar" style="display:none;">
            <label for="OTRO_DELITO_SECUNDARIO">OTRO_DELITO_SECUNDARIO <span class="required"></span></label>
            <input class="form-control" id="OTRO_DELITO_SECUNDARIO" name="OTRO_DELITO_SECUNDARIO" placeholder=""  type="text" value="">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="ETAPA_PROCEDIMIENTO">ETAPA PROCEDIMIENTO<span class="required">(*)</span></label>
            <select class="form-select form-select-lg" id="ETAPA_PROCEDIMIENTO" name="ETAPA_PROCEDIMIENTO" required>
              <option disabled selected value>SELECCIONE UNA ETAPA</option>
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
            <input class="form-control" id="NUC" name="NUC" placeholder=""  type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="MUNICIPIO_PERSONA">MUNICIPIO_RADICACION<span class="required">(*)</span></label>
            <select class="form-select form-select-lg" id="MUNICIPIO_RADICACION" name="MUNICIPIO_RADICACION" required>
              <option disabled selected value>SELECCIONE EL MUNICIPIO</option>
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
            <select class="form-select form-select-lg" id="RESULTADO_VALORACION_JURIDICA" name="RESULTADO_VALORACION_JURIDICA" required>
              <option disabled selected value>SELECCIONE UNA OPCION</option>
              <option value="SI PROCEDE">SI PROCEDE</option>
              <option value="NO PROCEDE">NO PROCEDE</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="MOTIVO_NO_PROCEDENCIA">MOTIVO NO PROCEDENCIA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="MOTIVO_NO_PROCEDENCIA" name="MOTIVO_NO_PROCEDENCIA" required>
              <option disabled selected value>SELECCIONE UNA OPCION</option>
              <option value="NO CORRESPONDE EL TIPO PENAL">NO CORRESPONDE EL TIPO PENAL</option>
              <option value="NO CUMPLE CON LOS REQUISITOS">NO CUMPLE CON LOS REQUISITOS</option>
              <option value="AMBAS">AMBAS</option>
              <option value="NO APLICA">NO APLICA</option>
            </select>
          </div>
        </div>

        <div class="row" >
          <div class="row">
            <hr class="mb-4">
          </div>
          <div class="alert alert-info">
            <h3 style="text-align:center">DETERMINACION DE LA INCORPORACION</h3>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="ANALISIS_MULTIDISCIPLINARIO">ANALISIS_MULTIDISCIPLINARIO</label>
            <select class="form-select form-select-lg" name="ANALISIS_MULTIDISCIPLINARIO">
              <option disabled selected value="">SELECCIONE UNA OPCION</option>
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
            <select class="form-select form-select-lg" id="INCORPORACION" name="INCORPORACION">
              <option disabled selected value>SELECCIONE UNA OPCION</option>
              <option value="SUJETO INCORPORADO">SUJETO INCORPORADO</option>
              <option value="SUJETO NO INCORPORADO">SUJETO NO INCORPORADO</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_AUTORIZACION">FECHA AUTORIZACION ANALISIS MULTIDISCIPLINARIO<span class="required"></span></label>
            <input class="form-control" id="FECHA_AUTORIZACION" name="FECHA_AUTORIZACION" placeholder=""  type="date" value="">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CONVENIO_ENTENDIMIENTO">CONVENIO_ENTENDIMIENTO<span class="required"></span></label>
            <select class="form-select form-select-lg" id="CONVENIO_ENTENDIMIENTO" name="CONVENIO_ENTENDIMIENTO">
              <option disabled selected value>SELECCIONE UNA OPCION</option>
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
            <input class="form-control" id="VIGENCIA_CONVENIO" type="text" name="VIGENCIA_CONVENIO" value="">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_CONVENIO_ENTENDIMIENTO">FECHA_CONVENIO_ENTENDIMIENTO<span class="required"></span></label>
            <input class="form-control" id="FECHA_CONVENIO_ENTENDIMIENTO" name="FECHA_CONVENIO_ENTENDIMIENTO" placeholder=""  type="date" value="">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CONCLUSION_CANCELACION">CONCLUSION_CANCELACION</label>
            <select class="form-select form-select-lg" name="CONCLUSION_CANCELACION" onChange="openart35(this)">
              <option disabled selected value="">SELECCIONE UNA OPCION</option>
              <option value="CANCELACION">CANCELACION</option>
              <option value="CONCLUSION">CONCLUSION</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35" style="display:none;">
            <label for="CONCLUSION">CONCLUSION ARTICULO 35</label>
            <select class="form-select form-select-lg" name="CONCLUSION_ART35" onChange="otherart35(this)">
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

          <div class="col-md-6 mb-3 validar" id="OTHERART35" style="display:none;">
            <label for="OTHER_ART35">ESPECIFIQUE</label>
            <input class="form-control" id="OTHER_ART35" name="OTHER_ART35" placeholder="" value="" type="text">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_DESINCORPORACION">FECHA_DESINCORPORACION<span class="required"></span></label>
            <input class="form-control" id="FECHA_DESINCORPORACION" name="FECHA_DESINCORPORACION" placeholder=""  type="date" value="">
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
            <label for="ESTATUS_PERSONA">ESTATUS DE LA PERSONA<span ></span></label>
            <select class="form-select form-select-lg" id="ESTATUS_PERSONA" name="ESTATUS_PERSONA" >
              <option disabled selected value="n/a">SELECCIONE UNA OPCION</option>
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

        <div class="row" >
          <div class="row">
            <hr class="mb-4">
          </div>
          <div class="alert alert-info">
            <h3 style="text-align:center">FUENTE</h3>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="FUENTE">FUENTE<span class="required"></span></label>
            <select class="form-select form-select-lg" id="FUENTE" name="FUENTE" onChange="radicacionfuente(this)">
              <option disabled selected value>SELECCIONE UNA OPCION</option>
              <?php
              $rad = "SELECT * FROM radicacion";
              $answerrad = $mysqli->query($rad);
              while($rads = $answerrad->fetch_assoc()){
                echo "<option value='".$rads['nombre']."'>".$rads['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="OFICIO" style="display:none;">
            <label for="OFICIO">OFICIO<span class="required"></span></label>
            <input class="form-control" id="OFICIO" name="OFICIO" placeholder="" value=""  type="text" >
          </div>

          <div class="col-md-6 mb-3 validar" id="CORREO" style="display:none;">
            <label for="CORREO">CORREO<span class="required"></span></label>
            <input class="form-control" id="CORREO" name="CORREO" placeholder=""  value="" type="email" >
          </div>

          <div class="col-md-6 mb-3 validar"  id="EXPEDIENTE" style="display:none;">
            <label for="EXPEDIENTE">EXPEDIENTE<span class="required"></span></label>
            <input class="form-control" id="EXPEDIENTE" name="EXPEDIENTE" placeholder=""  value="" type="text" >
          </div>

          <div class="col-md-6 mb-3 validar" id="OTRO" style="display:none;">
            <label for="OTRO">OTRO<span class="required"></span></label>
            <input class="form-control" id="OTRO" name="OTRO" placeholder=""  value="" type="text" >
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
            <input class="input-group" type="file" name="user_image" accept="image/*" />
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
          		<button style="display: block; margin: 0 auto;" class="btn btn-success" id="enter" type="submit">SIGUIENTE</button>
          </div>
        </div>
      </form>
    </div>
  </article>
  </div>
  </div>
</div>
</div>
<div class="contenedor">
<a href="admin.php" class="btn-flotante">CANCELAR</a>
</div>
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
document.getElementById("FECHA_CONVENIO_ENTENDIMIENTO").setAttribute("max", today);
document.getElementById("FECHA_DESINCORPORACION").setAttribute("max", today);
</script>

<script>
const fechaNacimiento = document.getElementById("FECHA_NACIMIENTO_PERSONA");
const edad = document.getElementById("EDAD_PERSONA");

const calcularEdad = (fechaNacimiento) => {
    const fechaActual = new Date();
    const anoActual = parseInt(fechaActual.getFullYear());
    const mesActual = parseInt(fechaActual.getMonth()) + 1;
    const diaActual = parseInt(fechaActual.getDate());

    // 2016-07-11
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
        }
    });

});


</script>

</body>
</html>
