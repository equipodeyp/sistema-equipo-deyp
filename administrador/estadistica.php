<?php
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
  <!-- datatables JS -->
  <script type="text/javascript" src="../datatables/datatables.min.js"></script>
  <!-- para usar botones en datatables JS -->
  <script src="../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="../css/botones_estadistica.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/main2.css">
  <!--font awesome con CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>
<script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.8/shim.min.js" integrity="sha512-nPnkC29R0sikt0ieZaAkk28Ib7Y1Dz7IqePgELH30NnSi1DzG4x+envJAOHz8ZSAveLXAHTR3ai2E9DZUsT8pQ==" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.8/xlsx.full.min.js" integrity="sha512-NerWxp37F9TtBS1k1cr2TjyC9c8Qh6ghgqVBOYXaahgnBkVT6a8KVbO05Z8+LnIIom4CJSSQTZ3VbL396scK5w==" crossorigin="anonymous"></script>
<!-- SCRIPT PARA EL MANEJO DE LA TABLA -->
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
      <!-- <nav class="menu-nav">
           <ul>
              <li class="menu-items"><a href="#"><i class="fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span>reportar incidencia</span></a></li>
              <li class="menu-items"><a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio"><i class='fas fa-file-pdf  menu-nav--icon fa-fw'></i><span class="menu-items">ver glosario</span></a></li>
              <li class="menu-items"><a href="../administrador/busqueda_avanzada.php"><i class='fa-solid fa-magnifying-glass  menu-nav--icon fa-fw'></i><span class="menu-items">Busqueda avanzada</span></a></li>
              <li class="menu-items"><a href="../administrador/estadistica.php"><i class="fa-solid fa-chart-line menu-nav--icon fa-fw"></i><span class="menu-items">ESTADISTICA</span></a></li>
            </ul>
      </nav> -->
    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../image/ups2.png" alt="" width="1400" height="70">
          <img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
      </div>
      <div class="container">
        <div class="row">
          <h1 style="text-align:center">
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
          </h1>
          <h5 style="text-align:center">
            <?php echo utf8_decode(strtoupper($row['area'])); ?> </span>
          </h5>
        </div>
        <br>
        </div>
        <!-- <button   id="exportarExcelN" onclick="exportarExcelv2();">Exportar a Excel</button> -->

        <div class="container">
          <ul class="ca-menu">
            <li>
              <a href="#" data-toggle="modal" data-target="#add_data_Modal_solicitudes">
                <span class="ca-icon"><img alt="" src="../image/ESTADISTICA/SOLICITUDES.png" style="width:55px;height:55px;"></span>
                <div class="ca-content">
                  <h2 class="ca-main">SOLICITUDES</h2>
                  <h3 class="ca-sub">PROCEDENTES - NO PROCEDENTES</h3></div>
              </a>
            </li>
            <li>
              <a href="#" data-toggle="modal" data-target="#add_data_Modal_personas">
                <span class="ca-icon"><img alt="" src="../image/ESTADISTICA/PERSONAS.png" style="width:60px;height:60px;"></span>
                <div class="ca-content">
                  <h2 class="ca-main">PERSONAS</h2>
                  <h3 class="ca-sub">SUJETOS - ESTATUS - CALIDAD</h3></div>
              </a>
            </li>
            <li>
              <a href="#" data-toggle="modal" data-target="#add_data_Modal_medidas1">
                <span class="ca-icon"><img alt="" src="../image/ESTADISTICA/MEDIDAS.png" style="width:60px;height:60px;"></span>
                <div class="ca-content">
                  <h2 class="ca-main">MEDIDAS</h2>
                  <h3 class="ca-sub">PROVISIONALES - DEFINITIVAS - ASISTENCIA - RESGUARDO- EJECUTADAS </h3></div>
              </a>
            </li>
            <li>
              <a href="#" data-toggle="modal" data-target="#add_data_Modal_expedientes">
                <span class="ca-icon"><img alt="" src="../image/ESTADISTICA/EXPEDIENTES.png" style="width:60px;height:60px;"></span>
                <div class="ca-content">
                  <h2 class="ca-main">EXPEDIENTES</h2>
                  <h3 class="ca-sub">ESTATUS - SEDES - DELITOS - RADICACION- AUTORIDADES - ETAPAS </h3></div>
              </a>
            </li>
            <li>
              <a href="#" data-toggle="modal" data-target="#add_data_Modal_resumen">
                <span class="ca-icon"><img alt="" src="../image/ESTADISTICA/RESUMEN.png" style="width:60px;height:60px;"></span>
                <div class="ca-content">
                  <h2 class="ca-main">RESUMEN</h2>
                  <h3 class="ca-sub">TOTAL - EXPEDIENTES - SUJETOS - MEDIDAS</h3></div>
              </a>
            </li>
          </ul>
        </div>
        <div class="contenedor" style="display: flex; justify-content: center;">
          <ul class="ca-menu" >
            <li >
              <a href="#" data-toggle="modal" data-target="#add_data_Modal_resumendiario">
                <span class="ca-icon"><img alt="" src="../image/ESTADISTICA/resumen_diario.png" style="width:100px;height:80px;"></span>
                <div class="ca-content">
                  <h2 class="ca-main">RESUMEN DIARIO</h2>
                  <h3 class="ca-sub">TOTAL - EXPEDIENTES - SUJETOS - MEDIDAS</h3></div>
                </a>
              </li>
          </ul>
        </div>
        <div class="contenedor" style="display: flex; justify-content: center;">
          <ul class="ca-menu" >
            <li >
              <a href="#" data-toggle="modal" data-target="#add_data_Modal_resumenexpedientes">
                <span class="ca-icon"><img alt="" src="../image/ESTADISTICA/EXPT.png" style="width:90px;height:60px;"></span>
                <div class="ca-content">
                  <h2 class="ca-main">INFORMACIÓN DE EXPEDIENTES</h2>
                  <h3 class="ca-sub"></h3></div>
                </a>
              </li>
          </ul>
        </div>

        <div class="contenedor">

        <a href="../administrador/admin.php" class="btn-flotante">REGRESAR</a>

        </div>
        <!--Ejemplo tabla con DataTables-->
        <!-- MEDIDAS -->
        <?php
        include("../administrador/archivos_html/medidas.html");
        ?>
        <!-- fin medidas -->
        <!-- inicio expedientes -->
        <?php
        include("../administrador/archivos_html/expedientes.html");
        ?>
        <!-- fin expedientes -->
        <!-- inicio resumen -->
        <?php
        include("../administrador/archivos_html/resumen.html");
        ?>
        <!-- fin resumen -->
        <!-- inicio resumen diario -->
        <?php
        include("../administrador/archivos_html/resumendiario.html");
        ?>
        <!-- fin resumen diario -->
        <!-- resumen expedientes -->
        <?php
        include("../administrador/archivos_html/tabla_expedientes_totales.html");
        ?>
        <!-- fin resumen expedintes -->
        <!-- fin Ejemplo tabla con DataTables-->
    </div>
  </div>
  <div class="contenedor">
    <!-- <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a> -->
  </div>
  <!-- modal del glosario -->
  <?php
  include("../administrador/archivos_html/glosario.html");
  ?>
  <!-- fin modal  -->
  <!-- MODAL SOLICITUDES -->
  <?php
  include("../administrador/archivos_html/solicitudes.html");
  ?>
  <!-- FIN SOLICITUDES -->
  <!-- PERSONAS -->
  <?php
  include("../administrador/archivos_html/personas.html");
  ?>
  <!-- fin personas -->
  <script src="../js/estadistica_tablas.js" charset="utf-8"></script>
  <script src="../js/exportar_tablas_estadistica.js" charset="utf-8"></script>
</body>
</html>
