<?php
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set("America/Mexico_City");
/*require 'conexion.php';*/
include("../conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../../logout.php");
}
$check_actividad = 1;
$_SESSION["check_actividad"] = $check_actividad;

// echo $name;

$sentencia="SELECT usuarios.cargo, usuarios.usuario

FROM usuarios

JOIN usuarios_servidorespublicos
ON usuarios.id = usuarios_servidorespublicos.id_usuarioprincipal
AND usuarios.usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$cargo = $row['cargo'];

// echo $cargo;
// $today = date("Y-m-d H:i:s");
// echo $today;


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>REGISTRO TRASLADO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <script src="../../js/funciones_react.js"></script>
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../../css/main2.css">
  <link rel="stylesheet" href="../../css/expediente.css">
  <!-- font-awesome -->
  <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css" rel="stylesheet">
  <!-- estilos de diseño add traslados -->
  <link rel="stylesheet" href="../../css/react_add_traslados.css">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="assets/css/material.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/home.css">
  <link rel="stylesheet" href="./assets/css/loader.css">
  <script src="../../js/check_busqueda.js" charset="utf-8"></script>

</head>
<body>
  <div class="contenedor">
    <div class="sidebar ancho">
      <div class="logo text-warning">
      </div>
      <div class="user">
        <?php
        $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
        $result = $mysqli->query($sentencia);
        $row=$result->fetch_assoc();
        $genero = $row['sexo'];

        if ($genero=='mujer') {
          echo "<img style='text-align:center;' src='../../image/mujerup.png' width='100' height='100'>";
        }

        if ($genero=='hombre') {
          // $foto = ../image/user.png;
          echo "<img src='../../image/hombreup.jpg' width='100' height='100'>";
        }
        // echo $genero;
         ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">
        <ul>
            <li>
                <a href="#" onclick="toggleSubmenu(this)">
                    <i class="color-icon fa-solid fa-book menu-nav--icon"></i>
                    <span class="menu-items" style="color: white; font-weight:bold;">REACT</span>
                    <i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i>
                </a>
                <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                  <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='add_actividad.php'">
                    <i class="fas fa-file-medical"></i> REGISTRAR ACTIVIDAD</a>
                  </li>
                  <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='consulta_actividad.php'">
                    <i class="fas fa-laptop-file"></i> BUSCAR ACTIVIDAD</a>
                  </li>
                  <!-- <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='search_actividad.php'">
                    <i class="fas fa-search"></i> CONSULTAR ACTIVIDAD</a>
                  </li> -->
                </ul>
            </li>
        </ul>>
      </nav>
    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../../image/ups2.png" alt="" width="1400" height="70">
          <img style="display: block; margin: 0 auto;" src="../../image/ups3.png" alt="" width="1400" height="70">
      </div>
      <div class="container">
        <div class="row">
          <!-- <h1 style="text-align:center">
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
          </h1> -->
          <!-- <h4 style="text-align:center">
            <?php echo utf8_decode(strtoupper($row['area'])); ?> </span>
          </h4> -->
        </div>
      </div>
      <div class="">
        <br>
        <br>
        <br>
        <h1 style="text-align:center">CONSULTAR CIFRAS</h1>
<center>

  <div style="text-align:center;padding:15px;border:solid 5px; width:80%;border-radius:35px;shadow" class="well form-horizontal">

    <form action="" method="GET">

      <?php
      if ($cargo === 'subdirector') {
      ?>
    <div class="form-group">
        <h4 class="col-md-3 control-label">TIPO DE CONSULTA:</h4>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <select class="form-control" name="tipo_consulta" id="tipo_consulta" onchange="ckecktipoconsulta(this)" required>
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
              <option value="GLOBAL">GLOBAL</option>
              <option value="POR USUARIO">POR USUARIO</option>
            </select>
          </div>
        </div>
        <p id="demo"></p>
      </div>

      <div class="form-group" id="div_usuario" style="display:none;">
        <h4 class="col-md-3 control-label">USUARIO:</h4>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <!-- <span class="input-group-addon"><i class="fa-solid fa-user"></i></span> -->
            <select class="form-control" name="usuario" id="usuario">
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <?php
                    $selectuser = "SELECT usuarios.nombre, usuarios.apellido_p, usuarios.apellido_m, usuarios.usuario
                    FROM usuarios
                    WHERE usuarios.area = 'subdireccion de ejecucion de medidas'
                    ORDER BY usuarios.nombre ASC";
                    $answeruser = $mysqli->query($selectuser);
                    while($valoresuser = $answeruser->fetch_assoc()){
                    // $id_actividad = $valoresuser['idactividad'];
                    // echo $id_actividad;
                    echo "<option value='".$valoresuser['usuario']."'>".strtoupper($valoresuser['nombre'].' '.$valoresuser['apellido_p'].' '.$valoresuser['apellido_m'])."</option>";
                    }
                ?>

            </select>
          </div>
        </div>
      </div>
      <?php
      }
      ?>

      <div class="form-group" id="div_actividad">
        <h4 class="col-md-3 control-label">ACTIVIDAD:</h4>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <!-- <span class="input-group-addon"><i class="fa-solid fa-list-check"></i></span> -->
            <select class="form-control" name="nombre_actividad" id="nombre_actividad" required>
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
              <option value="TODAS">TODAS</option>
                <?php
                    $select = "SELECT * FROM react_actividad_ejecucion ORDER BY react_actividad_ejecucion.nombre ASC";
                    $answer = $mysqli->query($select);
                    while($valores = $answer->fetch_assoc()){
                    // $id_actividad = $valores['idactividad'];
                    // echo $id_actividad;
                    echo "<option value='".$valores['id']."'>".$valores['nombre']."</option>";
                    }
                ?>
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <h4 class="col-md-3 control-label">FECHA INICIO:</h4>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <!-- <span class="input-group-addon"><i class="fa-regular fa-calendar"></i></span> -->
            <input name="fecha_inicio" id="fecha_inicio" class="form-control" type="date" required max="<?= date('Y-m-d'); ?>">
          </div>
        </div>
      </div>


      <div class="form-group">
        <h4 class="col-md-3 control-label">FECHA TERMINO:</h4>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <!-- <span class="input-group-addon"><i class="fa-regular fa-calendar"></i></span> -->
            <input name="fecha_fin" id="fecha_fin" class="form-control" type="date" required max="<?= date('Y-m-d'); ?>">
          </div>
        </div>
      </div>

      <input name="input_tipo_consulta" id="input_tipo_consulta" class="form-control" type="text" value style="display:none;">
      <input name="input_usuario" id="input_usuario" class="form-control" type="text" value style="display:none;">
      <input name="input_nombre_actividad" id="input_nombre_actividad" class="form-control" type="text" value style="display:none;">

      <?php
      if ($cargo === 'subdirector') {
      ?>
      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-5">
          <label for="" class="form-label"><b>BUSCAR</b></label><br>
          <button type="submit" id="ocultar-mostrar" class="btn btn-info" name="enviar"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
      </div>
      <?php
      include("consultaadmin.php");
      }else {
      ?>
      <div class="form-group" id="userbotonpdf">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-5">
          <label for="" class="form-label"><b>BUSCAR</b></label><br>
          <button type="submit" id="consultauser" class="btn btn-info" name="enviar" onclick=""><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
      </div>
      <?php
      include("consultauser.php");
      }
      ?>


          </div>
        </center>
      </div>
    </div>
  </div>
  <div class="contenedor">
    <a href="../../consultores/admin.php" class="btn-flotante">INICIO</a>
  </div>
<script type="text/javascript">
function ckecktipoconsulta(sel) {
  if (sel.value == "GLOBAL") {
    document.getElementById("div_usuario").style.display = "none";
    document.getElementById("usuario").selectedIndex = 0;
    document.getElementById("nombre_actividad").selectedIndex = 0;
    document.getElementById("usuario").required = false;
  }else if (sel.value == "POR USUARIO") {
    document.getElementById("div_usuario").style.display = "";
    document.getElementById("nombre_actividad").selectedIndex = 0;
    document.getElementById("usuario").required = true;
  }
}
//
// function mostraruserconsulta(){
//
// }
//
function ocultartablauser() {
  console.log("prueba ocultar");
  document.getElementById("tablauserconsulta").style.display = "none";
  document.getElementById("showbotonpdfuser").style.display = "none";
}

</body>
</html>
