<?php
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
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
  		<script src="../js/jquery.dataTables.min.js"></script>
  		<script src="../js/jquery-3.1.1.min.js"></script>
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
<!-- menu del expediente -->
<div class="container">
<div class="row">
  <h3 style="text-align:center">NUEVO EXPEDIENTE</h3>
</div>

<form class="form-horizontal" method="POST" action="guardar.php" autocomplete="off">
  <div class="form-group">
    <label for="nombre" class="col-sm-2 control-label">SIGLAS DE LA UNIDAD</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="UPSIPPED" required>
    </div>
  </div>

  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">SEDE</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>
  </div>

  <div class="form-group">
    <label for="estado_civil" class="col-sm-2 control-label">MUNICIPIO DE RADICACION DE LA CI</label>
    <div class="col-sm-10">
      <select class="form-control" id="estado_civil" name="estado_civil">
        <option value="SOLTERO">selecione</option>
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

  <div class="form-group">
    <label for="telefono" class="col-sm-2 control-label">AÑO</label>
    <div class="col-sm-10">
      <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
    </div>
  </div>











  <div class="form-group">
    <label for="hijos" class="col-sm-2 control-label">¿Tiene Hijos?</label>

    <div class="col-sm-10">
      <label class="radio-inline">
        <input type="radio" id="hijos" name="hijos" value="1" checked> SI
      </label>

      <label class="radio-inline">
        <input type="radio" id="hijos" name="hijos" value="0"> NO
      </label>
    </div>
  </div>

  <div class="form-group">
    <label for="intereses" class="col-sm-2 control-label">INTERESES</label>

    <div class="col-sm-10">
      <label class="checkbox-inline">
        <input type="checkbox" id="intereses[]" name="intereses[]" value="Libros"> Libros
      </label>

      <label class="checkbox-inline">
        <input type="checkbox" id="intereses[]" name="intereses[]" value="Musica"> Musica
      </label>

      <label class="checkbox-inline">
        <input type="checkbox" id="intereses[]" name="intereses[]" value="Deportes"> Deportes
      </label>

      <label class="checkbox-inline">
        <input type="checkbox" id="intereses[]" name="intereses[]" value="Otros"> Otros
      </label>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <a href="../administrador/admin.php" class="btn btn-default">Regresar</a>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</form>
</div>

<!-- fin del expediente -->
  </div>
</div>
<div class="contenedor">
<a href="admin.php" class="btn-flotante">CANCELAR</a>
</div>
</body>
</html>
