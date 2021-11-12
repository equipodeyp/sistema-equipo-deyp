<?php
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$verifica_seguimiento = 1;
$_SESSION["verifica_seguimiento"] = $verifica_seguimiento;
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$fol_exp = $_GET['folio'];
$dato_persona = "SELECT * FROM valoracionjuridica WHERE id_persona = '$fol_exp'";
$r_d_persona = $mysqli->query($dato_persona);
$ro_persona=$r_d_persona->fetch_assoc();

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link href="../css/bootstrap.min.css" rel="stylesheet">
      <script src="../js/jquery-3.1.1.min.js"></script>
  		<link href="../css/bootstrap-theme.css" rel="stylesheet">
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
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

        <script src="../js/validarmascara3.js"></script>
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
      <form class=" container well form-horizontal" action="save_mascara3.php?folio=<?php echo $fol_exp; ?>" method="post">
        <div class="row">
          <div class="alert alert-info">
            <p style="text-align:center">DATOS GENERALES DEL EXPEDIENTE</p>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="RESULTADO_VALORACION_JURIDICA">RESULTADO_VALORACION_JURIDICA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="SEDE" name="RESULTADO_VALORACION_JURIDICA" disabled>
              <option value=""><?php echo $ro_persona['resultadovaloracion']; ?></option>
              <option value="SI_PROCEDE">SI_PROCEDE </option>
              <option value="NO_PROCEDE">NO_PROCEDE</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="MOTIVO_NO_PROCEDENCIA_JURIDICA">MOTIVO_NO_PROCEDENCIA_JURIDICA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="SEDE" name="MOTIVO_NO_PROCEDENCIA_JURIDICA" disabled>
              <option value=""><?php echo $ro_persona['motivoprocedencia']; ?></option>
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
            <p style="text-align:center">ANALISIS</p>
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
            <select class="form-select form-select-lg" id="INCORPORACION" name="INCORPORACION" required>
              <option disabled selected value>SELECCIONE UNA OPCION</option>
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
            <input class="form-control" id="FECHA_AUTORIZACION_ANALISIS" name="FECHA_AUTORIZACION_ANALISIS" placeholder=""  type="date" value="" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CONVENIO_DE_ENTENDIMIENTO">CONVENIO_DE_ENTENDIMIENTO<span class="required"></span></label>
            <select class="form-select form-select-lg" id="CONVENIO_DE_ENTENDIMIENTO" name="CONVENIO_DE_ENTENDIMIENTO">
              <option disabled selected value>SELECCIONE UNA OPCION</option>
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
            <input class="form-control" id="VIGENCIA_CONVENIO" type="text" name="VIGENCIA_CONVENIO" value="">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_CONVENIO_ENTENDIMIENTO">FECHA_CONVENIO_ENTENDIMIENTO<span class="required"></span></label>
            <input class="form-control" id="FECHA_CONVENIO_ENTENDIMIENTO" name="FECHA_CONVENIO_ENTENDIMIENTO" placeholder=""  type="date" value="">
          </div>

        </div>

        <div class="row">
          <div class="row">
            <hr class="mb-4">
          </div>
          <div class="alert alert-info">
            <p style="text-align:center">ESTATUS</p>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CONCLUSION_CANCELACION">CONCLUSION_CANCELACION</label>
            <select class="form-select form-select-lg" name="CONCLUSION_CANCELACION" onChange="open3art35(this)">
              <option disabled selected value="">SELECCIONE UNA OPCION</option>
              <option value="CANCELACION">CANCELACION</option>
              <option value="CONCLUSION">CONCLUSION</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35s" style="display:none;" >
            <label for="CONCLUSION">CONCLUSION ARTICULO 35</label>
            <select class="form-select form-select-lg" id="CONCLUSION_ART35" name="CONCLUSION_ART35" onChange="other3art35(this)">
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
            <label for="OTHER_ART35">ESPECIFIQUE</label>
            <input class="form-control" id="OTHER_ART35" name="OTHER_ART35" placeholder="" value="" type="text">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_DESINCORPORACION">FECHA_DESINCORPORACION<span class="required"></span></label>
            <input class="form-control" id="FECHA_DESINCORPORACION" name="FECHA_DESINCORPORACION" placeholder=""  type="date" value="">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="ESTATUS_EXPEDIENTE">ESTATUS_EXPEDIENTE<span class="required"></span></label>
            <select class="form-select form-select-lg" id="ESTATUS_EXPEDIENTE" name="ESTATUS_EXPEDIENTE" required>
              <option disabled selected value>SELECCIONE UNA OPCION</option>
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
            <p>FUENTE</p>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="FUENTE_S">FUENTE<span class="required"></span></label>
            <select class="form-select form-select-lg" id="FUENTE_S" name="FUENTE_S" onChange="radicacionfuenteS(this)" required>
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

          <div class="col-md-6 mb-3 validar" id="OFICIO_S" style="display:none;">
            <label for="OFICIO_S">OFICIO<span class="required"></span></label>
            <input class="form-control" id="OFICIO_S" name="OFICIO_S" placeholder="" value=""  type="text" >
          </div>

          <div class="col-md-6 mb-3 validar" id="CORREO_S" style="display:none;">
            <label for="CORREO_S">CORREO<span class="required"></span></label>
            <input class="form-control" id="CORREO_S" name="CORREO_S" placeholder=""  value="" type="text" >
          </div>

          <div class="col-md-6 mb-3 validar"  id="EXPEDIENTE_S" style="display:none;">
            <label for="EXPEDIENTE_S">EXPEDIENTE<span class="required"></span></label>
            <input class="form-control" id="EXPEDIENTE_S" name="EXPEDIENTE_S" placeholder=""  value="" type="text" >
          </div>

          <div class="col-md-6 mb-3 validar" id="OTRO_S" style="display:none;">
            <label for="OTRO_S">OTRO<span class="required"></span></label>
            <input class="form-control" id="OTRO_S" name="OTRO_S" placeholder=""  value="" type="text" >
          </div>

        </div>

        <div class="row">
          <div>
              <br>
              <br>
              <button style="display: block; margin: 0 auto;" class="btn btn-success" id="enter" type="submit">SIGUIENTE</button>
          </div>
        </div>
      </form>
    </article>
  </div>
</div>


  </div>
</div>
<div class="contenedor">
<a href="admin.php" class="btn-flotante">CANCELAR</a>
</div>
</body>
</html>
