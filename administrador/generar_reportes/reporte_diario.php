<?php
date_default_timezone_set("America/Mexico_City");
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
include("../conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <script src="../../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="../../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../../css/main2.css">
  <!--font awesome local-->
  <link rel="stylesheet" href="../../css/fontawesome/css/all.css">
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../../css/breadcrumb.css">
  <link rel="stylesheet" href="../../css/bootstrap5-3-8.min.css">
  <script src="../../js/bootstrap5-3-8.bundle.min.js"></script>
  <script src="../../js/popper5-3-8.min.js"></script>
  <script src="../../js/bootstrap5-3-8.min.js"></script>
  <!--  -->
  <link rel="stylesheet" type="text/css" href="../../css/toast.css"/>
  <link rel="stylesheet" href="../../css/button_notification.css" type="text/css">
  <link href="../../datatables/datatables.min.css" rel="stylesheet">
  <script src="../../datatables/datatables.min.js"></script>
</head>
<body>
  <div class="contenedor">
    <div class="sidebar ancho">
      <div class="logo text-warning">
      </div>
      <div style="text-align:center" class="user">
        <?php
        $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
        $result = $mysqli->query($sentencia);
        $row=$result->fetch_assoc();
        $genero = $row['sexo'];
        if ($genero=='mujer') {
          echo "<img src='../../image/mujerup.png' width='100' height='100'>";
        }
        if ($genero=='hombre') {
          echo "<img src='../../image/hombreup.jpg' width='100' height='100'>";
        }
         ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">

      </nav>
    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../../image/ups2.png" alt="" width="1400" height="70">
          <img style="display: block; margin: 0 auto;" src="../../image/ups3.png" alt="" width="1400" height="70">
      </div>
      <div class="container"><br>
        <div class="row">
          <h1 style="text-align:center"><b>
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
          </b></h1>
          <h4 style="text-align:center">
            <b><?php echo utf8_decode(strtoupper($row['area'])); ?></b>
          </h4>
        </div>
        <!--Ejemplo tabla con DataTables-->
        <b>
          <br><br>
          <!-- Contenedor Fijo -->
          <div class="sticky-wrapper">
            <div class="container-fluid">
              <nav class="wizard-steps">
                <a href="../admin.php" class="step"><span class="step-num">1</span> REGISTROS</a>
                <a href="../archivos_html/ver_reportes_diarios.php" class="step"><span class="step-num">2</span> REPORTE DIARIO</a>
                <a href="#" class="step active"><span class="step-num">3</span> PDF</a>
              </nav>
            </div>
          </div>
          <form action="get_reportediario_pdf.php" method="POST">
            <div class="container-fluid" id="showafterconsul">
              <div class="row">
                <div class="well form-horizontal" style="border: 5px solid #63696D;"><br>
                  <img style="float: left;" src="../../image/ESCUDO.png" width="60" height="50">
                  <img style="float: right;" src="../../image/FGJEM.png" width="50" height="50">
                  <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
                  <h1 style="text-align:center">Reporte Global</h1>
                  <h1 style="text-align:center">Del 01 de Junio del 2021 al <?php echo date("d").' de '.$meses[date("n")-1].' del '. date("Y");?> </h1>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="table-responsive">
                        <table id="tabla1" border="3px" cellspacing="0" width="100%" bordered>
                          <thead class="thead-dark">
                            <tr>
                              <th style="text-align:center; border: 3px solid black;">CONCEPTO</th>
                              <th style="text-align:center; border: 3px solid black;">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../../administrador/tablas_estadistica/tabla1_reporte_diario.php");
                            ?>
                          </tbody>
                        </table>
                        <div class="col-lg-12">
                          <strong><sup>*</sup> Activos al <?php echo date("d").' de '.$meses[date("n")-1].' del '. date("Y");?></strong>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="table-responsive">
                        <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                          <thead class="thead-dark">
                            <tr>
                              <th style="text-align:center; border: 3px solid black;">ESTATUS DE LOS EXPEDIENTES DE PROTECCIÓN</th>
                              <th style="text-align:center; border: 3px solid black;">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../../administrador/tablas_estadistica/tabla2_reporte_diario.php");
                            ?>
                          </tbody>
                        </table>
                        <div class="col-lg-12">
                          <strong><sup>*</sup> Activos al <?php echo date("d").' de '.$meses[date("n")-1].' del '. date("Y");?></strong>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="table-responsive">
                        <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                          <thead class="thead-dark">
                            <tr>
                              <th style="text-align:center; border: 3px solid black;">ESTATUS DE LAS PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA</th>
                              <th style="text-align:center; border: 3px solid black;">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../../administrador/tablas_estadistica/tabla3_reporte_diario.php");
                            ?>
                          </tbody>
                        </table>
                        <div class="col-lg-12">
                          <strong><sup>*</sup> Activos al <?php echo date("d").' de '.$meses[date("n")-1].' del '. date("Y");?></strong><br>
                          <strong><sup>1</sup> Corresponde a los siguientes casos:<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) La solicitud no cumple con los requisitos de Ley<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) La persona manifiesta negativa de voluntariedad para incorporarse<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c) Se determina la no procedencia de incorporación<br>
                            <sup>2</sup> Se refiere a las personas que se encuentran en los siguientes supuestos:<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) Concluyó su participación dentro del Proceso Penal<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) Renuncia voluntaria<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c) Determinación de disminución o cese del riesgo</strong>
                          </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="table-responsive">
                        <table id="tabla1" border="1px" cellspacing="0" width="95%" bordered>
                          <thead class="thead-dark">
                            <tr>
                              <th style="text-align:center; border: 3px solid black; width: 70%">PERIODO</th>
                              <th style="text-align:center; border: 3px solid black; width: 30%">EXPEDIENTE DE PROTECCIÓN INICIADOS</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../../administrador/tablas_estadistica/tabla4_reporte_diario.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                      <br><br>
                      <div class="table-responsive">
                        <table id="tabla1" border="1px" cellspacing="0" width="95%" bordered>
                          <thead class="thead-dark">
                            <tr>
                              <th style="text-align:center; border: 3px solid black;" colspan="2">SUJETOS EN RESGUARDO ACTIVOS</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../../administrador/tablas_estadistica/tabla5_reporte_diario.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <br><br>
                  <div class="col-lg-12">
                    <div class="table-responsive">
                      <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                        <thead class="thead-dark">
                          <tr>
                            <th style="text-align:center; border: 3px solid black;">ESTATUS DE LAS MEDIDAS DE APOYO DICTAMINADAS</th>
                            <th style="text-align:center; border: 3px solid black;">EN EJECUCIÓN</th>
                            <th style="text-align:center; border: 3px solid black;">EJECUTADA</th>
                            <th style="text-align:center; border: 3px solid black;">CANCELADA</th>
                            <th style="text-align:center; border: 3px solid black;">TOTAL</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../../administrador/tablas_estadistica/tabla6_reporte_diario.php");
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <br><br><br><br>
                  <div class="contenedor-flex">
                    <label class="izquierda">*NOTA: Cifras sujetas a cambios por actualización</label>
                    <label class="derecha" style="font-size: 23px; color: white; background-color: #63696D; border-radius: 40% 40% 5% 5%;">&nbsp;&nbsp;1/1&nbsp;&nbsp;</label>
                  </div>
                  <div class="">
                    <table width="100%">
                      <thead>
                        <tr>
                          <th width="80%" align="left" bgcolor="#63696D">
                            <h5 class="">
                            <span style="font-size: 14px; align:left; color:white;"><font style="font-family: gothambook">
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio
                            </font></span></h5>
                          </th>
                          <th width="20%" align="left" bgcolor="#63696D">
                            <h5 class="">
                            <span style="font-size: 14px; align:left; color:white;"><font style="font-family: gothambook">
                            Subdirección de Estadística y Pre-Registro
                            </font></span></h5>
                          </th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <br>
                </div>
              </div>
            </div>
            <div id="miAlerta" class="modern-toast">
              <div class="toast-content">
                <div class="toast-icon">
                  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="3" fill="none">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </div>
                <div class="toast-message">
                  <span class="toast-title">Para descargar el reporte diario de hoy tienes que hacerlo el dia de mañana, solo tienes de 9 a 10 de la mañana para descargarlo</span>
                  <span class="toast-desc"></span>
                </div>
                <button class="toast-close" onclick="cerrarAlerta()">×</button>
              </div>
              <!-- Barra de progreso de tiempo -->
              <div class="toast-progress"></div>
            </div>
            <div id="contenedor-pdf">
              <div id="reloj">Cargando...</div>
              <button class="btn-pdf-round" type="submit" id="btn-descarga" title="Descargar ahora"> <svg viewBox="0 0 24 24">
                <path d="M19,9h-4V3H9v6H5l7,7L19,9z M5,18v2h14v-2H5z"/>
              </svg></button>
            </div>
          </form>
        </b>
      </div>
    </div>
  </div>
</body>
<link rel="stylesheet" href="../../css/menuactualizado.css">
<link rel="stylesheet" href="../../css/menu_creacionreportes.css">
<script src="../../js/menu.js"></script>
<script src="../../js/descargarpdfreportes.js"></script>
</html>
