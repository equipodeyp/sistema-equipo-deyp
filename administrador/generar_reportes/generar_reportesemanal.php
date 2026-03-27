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
          <!-- Contenedor Fijo -->
          <div class="sticky-wrapper">
            <div class="container-fluid">
              <nav class="wizard-steps">
                <a href="../admin.php" class="step"><span class="step-num">1</span> REGISTROS</a>
                <a href="../archivos_html/ver_reporte_semanal.php" class="step"><span class="step-num">2</span> REPORTE SEMANAL</a>
                <a href="#" class="step active"><span class="step-num">3</span> PDF</a>
              </nav>
            </div>
          </div>
          <form action="get_reportediario_pdf.php" method="POST">
            <div class="well form-horizontal" style="border: 5px solid #63696D; width: 1390px;">
              <div class="well form-horizontal">
                <img style="float: left;" src="../../image/ESCUDO.png" width="60" height="50">
                <img style="float: right;" src="../../image/FGJEM.png" width="50" height="50">
                <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
                <?php
                include('../get_fechas_rerpotesemanal.php');
                ?>
                <div class="row" style="display:none;">
                  <div class="col-md-3 mb-3 validar">
                    <label for="SIGLAS DE LA UNIDAD">FECHA INICIO<span ></span></label>
                    <input class="form-control" name="dateprinc" placeholder="" type="date" value="<?php echo $fechainicio_pdf; ?>" maxlength="50" readonly>
                  </div>
                  <div class="col-md-3 mb-3 validar">
                    <label for="SIGLAS DE LA UNIDAD">FECHA FIN<span ></span></label>
                    <input class="form-control" name="datefinprinc" placeholder="" type="date" value="<?php echo $fechafin_pdf; ?>" maxlength="50" readonly>
                  </div>
                  <div class="col-md-3 mb-3 validar">
                    <label for="SIGLAS DE LA UNIDAD">FECHA INICIO REPORTE<span ></span></label>
                    <input class="form-control" name="daterepini" placeholder="" type="date" value="<?php echo $fechainicial_reporte_pdf; ?>" maxlength="50" readonly>
                  </div>
                  <div class="col-md-3 mb-3 validar">
                    <label for="SIGLAS DE LA UNIDAD">FECHA FIN REPORTE<span ></span></label>
                    <input class="form-control" name="daterepfin" placeholder="" type="date" value="<?php echo $fechafinal_reporte_pdf; ?>" maxlength="50" readonly>
                  </div>
                </div>
                <div class="row">
                  <!-- PRIMER TABLA -->
                  <div class="col-lg-6" style="padding-left: 25px;">
                    <div class="table-responsive">
                      <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                        <thead class="thead-dark">
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" colspan="5">SOLICITUDES RECIBIDAS Y EXPEDIENTES INICIADOS</th>
                          </tr>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" rowspan="2">AUTORIDAD</th>
                            <th style="text-align:center; border: 3px solid black;" colspan="2"><?php echo $year; ?></th>
                            <th style="text-align:center; border: 3px solid black;" rowspan="2">TOTAL ACUMULADO</th>
                          </tr>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;"><?php
                            if ($diaini == 1) {
                              echo "DEL 01 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-2];
                            }else {
                              echo "DEL 01 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1];
                            }
                            ?></th>
                            <th style="text-align:center; border: 3px solid black;"><?php
                              if ($diaini > $diafin) {
                                echo "DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                              } else {
                                echo "DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                              }
                             ?></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../../administrador/tablas_estadistica/tabla1_reporte_semanal.php");
                          ?>
                        </tbody>
                      </table>
                      <br>
                    </div>
                  </div>
                  <!-- SEGUNDA TABLA -->
                  <div class="col-lg-6" style="padding-right: 25px;">
                    <div class="table-responsive">
                      <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                        <thead class="thead-dark">
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" colspan="5">EXPEDIENTES DETERMINADOS PARA SU INCORPORACIÓN</th>
                          </tr>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" rowspan="2">CONCEPTO</th>
                            <th style="text-align:center; border: 3px solid black;" colspan="2"><?php echo $year; ?></th>
                            <th style="text-align:center; border: 3px solid black;" rowspan="2">TOTAL ACUMULADO</th>
                          </tr>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;"><?php
                            if ($diaini == 1) {
                              echo "DEL 1 DE ENERO <br> AL ".$diafinsemant. " DE ".$meses[date('n')-2];
                            }else {
                              echo "DEL 1 DE ENERO <br> AL ".$diafinsemant. " DE ".$meses[date('n')-1];
                            }
                            ?></th>
                            <th style="text-align:center; border: 3px solid black;"><?php
                            if ($diaini > $diafin) {
                                echo "DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE <br>".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                              } else {
                                  echo "DEL ".$diaini." AL ".$diafin. " DE <br>".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                                }
                            ?></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../../administrador/tablas_estadistica/tabla2_reporte_semanal.php");
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- TERCER TABLA -->
                  <div class="col-lg-7" style="padding-left: 25px;">
                    <div class="table-responsive">
                      <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                        <thead class="thead-dark">
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" rowspan="4">CALIDAD DENTRO DEL PROGRAMA</th>
                          </tr>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" colspan="3">PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA</th>
                            <th style="text-align:center; border: 3px solid black;" colspan="4">SUJETOS INCORPORADOS AL PROGRAMA</th>
                          </tr>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" colspan="2"><?php echo $year; ?></th>
                            <th style="text-align:center; border: 3px solid black;" rowspan="2">TOTAL  <br> ACUMULADO</th>
                            <th style="text-align:center; border: 3px solid black;" colspan="2"><?php echo $year; ?></th>
                            <th style="text-align:center; border: 3px solid black;" rowspan="2">TOTAL  <br> ACUMULADO</th>
                          </tr>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;"><?php
                            if ($diaini == 1) {
                              echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-2];
                            }else {
                              echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1];
                            }
                            ?></th>
                            <th style="text-align:center; border: 3px solid black;"><?php
                            if ($diaini > $diafin) {
                                echo "DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                              } else {
                                  echo "DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                                }
                            ?> </th>
                            <th style="text-align:center; border: 3px solid black;"><?php
                            if ($diaini == 1) {
                              echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-2];
                            }else {
                              echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1];
                            }
                            ?></th>
                            <th style="text-align:center; border: 3px solid black;"><?php
                            if ($diaini > $diafin) {
                                echo "DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                              } else {
                                  echo "DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                                }
                            ?> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../../administrador/tablas_estadistica/tabla3_reporte_semanal.php");
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <br>
                  </div>
                  <!-- CUARTA TABLA -->
                  <div class="col-lg-5" style="padding-right: 25px;">
                    <div class="table-responsive">
                      <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                        <thead class="thead-dark">
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" colspan="5">SEGUIMIENTO A LAS MEDIDAS DE APOYO <?php
                            if ($diaini > $diafin) {
                                echo "DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                              } else {
                                  echo "DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                                }
                            ?></th>
                          </tr>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" rowspan="2">CLASIFICACIÓN DE LAS MEDIDAS</th>
                            <th style="text-align:center; border: 3px solid black;" colspan="3">ETAPA DENTRO DEL PROGRAMA</th>
                          </tr>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;">EN EJECUCION</th>
                            <th style="text-align:center; border: 3px solid black;">EJECUTADAS</th>
                            <th style="text-align:center; border: 3px solid black;">CANCELADAS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../../administrador/tablas_estadistica/tabla4_reporte_semanal.php");
                          ?>
                        </tbody>
                      </table>
                    </div>
                  <br>
                  <!-- QUINTA TABLA -->
                  <?php
                  $validarmedejecutadas = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin'";
                  $rvalidarmedejecutadas = $mysqli->query($validarmedejecutadas);
                  $fvalidarmedejecutadas = $rvalidarmedejecutadas->fetch_assoc();
                  if ($fvalidarmedejecutadas['t'] > 0) {
                  ?>
                  <div class="table-responsive">
                    <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                      <thead class="thead-dark">
                        <tr>
                          <th style="text-align:center; border: 3px solid black;" colspan="5">MUNICIPIO DE EJECUCIÓN DE LAS MEDIDAS DE APOYO CONCLUÍDAS</th>
                        </tr>
                        <tr>
                          <th style="text-align:center; border: 3px solid black;" rowspan="2">MUNICIPIO</th>
                          <th style="text-align:center; border: 3px solid black;" colspan="2">CLASIFICACIÓN DE LAS MEDIDAS</th>
                          <th style="text-align:center; border: 3px solid black;" rowspan="2">TOTAL</th>
                        </tr>
                        <tr>
                          <th style="text-align:center; border: 3px solid black;">ASISTENCIA</th>
                          <th style="text-align:center; border: 3px solid black;">RESGUARDO</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include("../../administrador/tablas_estadistica/tabla5_reporte_semanal.php");
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <?php
                  }
                  ?>
                  </div>
                  <div class="col-lg-6" style="padding-left: 25px;">
                    <div class="table-responsive">
                      <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                        <thead class="thead-dark">
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" rowspan="4">CALIDAD DENTRO DEL PROGRAMA</th>
                          </tr>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" colspan="3">SUJETOS DESINCORPORADOS DEL PROGRAMA</th>
                          </tr>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" colspan="2"><?php echo $year; ?></th>
                            <th style="text-align:center; border: 3px solid black;" rowspan="2">TOTAL  <br> ACUMULADO</th>
                          </tr>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;"><?php
                            if ($diaini == 1) {
                              echo "DEL 1 DE ENERO <br> AL  ".$diafinsemant. " DE ".$meses[date('n')-2];
                            }else {
                              echo "DEL 1 DE ENERO <br> AL ".$diafinsemant. " DE ".$meses[date('n')-1];
                            }
                            ?></th>
                            <th style="text-align:center; border: 3px solid black;"><?php
                            if ($diaini > $diafin) {
                                echo "DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE <br> ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                              } else {
                                  echo "DEL ".$diaini." AL ".$diafin. " DE <br> ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                                }
                            ?> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../../administrador/tablas_estadistica/tabla3.1_reporte_semanal.php");
                          ?>
                        </tbody>
                      </table>
                      <br>
                    </div>
                  </div>
                </div>
                <div class="contenedor-flex" style="padding-left: 20px; padding-right: 10px; padding-bottom: 5px;">
                  <label class="izquierda">*NOTA: Cifras sujetas a cambios por actualización</label>
                  <label class="derecha" style="font-size: 23px; color: white; background-color: #63696D; border-radius: 40% 40% 5% 5%;">&nbsp;&nbsp;1/2&nbsp;&nbsp;</label>
                </div>
                <div class="" style="padding-left: 10px; padding-right: 10px;">
                  <table width="100%">
                    <thead>
                      <tr>
                        <th width="80%" align="left" bgcolor="#63696D">
                          <h5 class="">
                            <span style="font-size: 14px; align:left; color:white;">
                              <font style="font-family: gothambook">
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio
                              </font>
                            </span>
                          </h5>
                        </th>
                        <th width="20%" align="left" bgcolor="#63696D">
                          <h5 class="">
                            <span style="font-size: 14px; align:left; color:white;">
                              <font style="font-family: gothambook">
                                Subdirección de Estadística y Pre-Registro
                              </font>
                            </span>
                          </h5>
                        </th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <br>
              </div>
            </div>
            <br>
            <div class="well form-horizontal" style="border: 5px solid #63696D; width: 1390px;">
              <div class="well form-horizontal">
                <img style="float: left;" src="../../image/ESCUDO.png" width="60" height="50">
                <img style="float: right;" src="../../image/FGJEM.png" width="50" height="50">
                <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
                <h1 style="text-align:center">Reporte Global</h1>
                <h1 style="text-align:center">Del 01 de Junio del 2021 al <?php echo date("d").' de '.$meses[date("n")-1].' del '. date("Y");?> </h1>
                <div class="row">
                  <div class="col-lg-5" style="padding-left: 25px;">
                    <div class="table-responsive">
                      <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                        <thead class="thead-dark">
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" colspan="2">EXPEDIENTES DE PROTECCIÓN</th>
                          </tr>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;">ETAPA DENTRO DEL PROGRAMA</th>
                            <th style="text-align:center; border: 3px solid black;">TOTAL</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../../administrador/tablas_estadistica/tabla6_reporte_semanal.php");
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-12" style="padding-top: 8px;">
                      <strong style="display: block; text-align: justify; font-weight: bold;">
                        *Comprende los Expedientes de Protección sobre los cuales se determinará la incorporación del sujeto propuesto al Programa,
                        así como los que se encuentran en proceso de formalizar su ingreso al mismo.
                      </strong>
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <!-- espacio entre dos tablas -->
                  </div>
                  <div class="col-lg-6">
                    <div class="col-lg-11">
                      <div class="table-responsive">
                        <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                          <thead class="thead-dark">
                            <tr>
                              <th style="text-align:center; border: 3px solid black;" colspan="2">PERSONAS QUE SOLICITARON INCORPORARSE</th>
                            </tr>
                            <tr>
                              <th style="text-align:center; border: 3px solid black;">ETAPA DENTRO DEL PROGRAMA</th>
                              <th style="text-align:center; border: 3px solid black;">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../../administrador/tablas_estadistica/tabla7_reporte_semanal.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-lg-12" style="padding-top: 8px;">
                      <strong style="display: block; text-align: justify; font-weight: bold;">
                        <sup>1</sup> Corresponde a los siguientes casos:<br>
                        a) La solicitud no cumple con los requisitos de Ley<br>
                        b) La persona manifiesta negativa de voluntariedad para incorporarse<br>
                        c) Se determina la no procedencia de incorporación<br>
                        <sup>2</sup> Se refiere a las personas que se encuentran en los siguientes supuestos:<br>
                        a) Concluyó su participación dentro del Proceso Penal<br>
                        b) Renuncia voluntaria<br>
                        c) Determinación de disminución o cese del riesgo
                      </strong>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6" style="padding-left: 25px;">
                    <div class="table-responsive">
                      <table id="rdestatusmedidas" border="1px" cellspacing="0" width="100%" bordered class="col-lg-12">
                        <thead>
                          <tr>
                            <th style="text-align:center; border: 3px solid black;">ESTATUS DE LAS MEDIDAS DE APOYO DICTAMINADAS</th>
                            <th style="text-align:center; border: 3px solid black;">EN EJECUCION</th>
                            <th style="text-align:center; border: 3px solid black;">EJECUTADA</th>
                            <th style="text-align:center; border: 3px solid black;">CANCELADA</th>
                            <th style="text-align:center; border: 3px solid black;">TOTAL<br /> ACUMULADO</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../../administrador/tablas_estadistica/tabla_estatus_medidas.php");
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-12" style="padding-top: 8px;">
                      <strong style="display: block; text-align: justify; font-weight: bold;">
                        *  I. Tratamiento psicológico, médico o sanitario; II. Asesoramiento jurídico gratuito; III. Gestión de trámites; IV.
                        Ayuda de servicios; V. Apoyo económico; VI. Cualquier otra medida de asistencia (apoyo en especie).<br>
                        ** I. Salvagurarda de la integridad personal; II. Vigilancia; III. Modo y mecanismo para el traslado del sujeto;
                        IV. Custodia policial o dimiciliaria; V. facilitar la reubicacion; VI. Mecanismos de comunicacion inmediata;
                        VII. Cambio de número telefónico; VIII. Alojamiento temporal; IX. Capacitación de medidas; X. Nueva identidad del sujeto;
                        XI. Ejecucion de medidas procesales; XII. Medidas otorgadas a sujetos recluidos;
                        XIII. Cualquier otra medida de apoyo (autocuidados, otras medidas que a su juicio sea procedente, evitar salir de noche,
                        evitar acercarse a la zona donde se encuentras los agentes generadores de riesgo, cambiar de rutina escolar, laboral y recreativa)
                      </strong>
                    </div>
                  </div>
                  <div class="col-lg-6" style="padding-right: 65px;">
                    <br>
                    <div class="table-responsive">
                      <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                        <thead class="thead-dark">
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" >DESCRIPCIÓN</th>
                            <th style="text-align:center; border: 3px solid black;" >SUJETOS INCORPORADOS*</th>
                            <th style="text-align:center; border: 3px solid black;" >SUJETOS EN CENTROS DE RESGUARDO**</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../../administrador/tablas_estadistica/tabla9_reporte_semanal.php");
                          ?>
                        </tbody>
                      </table>
                      <span>
                        * Comprende todos los sujetos incorporados independientemente de su estatus actual dentro del Programa <br>
                        ** Se refiere a los sujetos incorporados que les ha sido asignada la medida de resguardo "Alojamiento Temporal" ya sea que se encuentren activos o no dentro del Programa
                      </span>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6" style="padding-left: 25px;">
                    <div class="table-responsive">
                      <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered class="col-lg-7">
                        <thead class="thead-dark">
                          <tr>
                            <th style="text-align:center; border: 3px solid black;" colspan="3">SUJETO EN RESGUARDO ACTIVOS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../../administrador/tablas_estadistica/tabla8_reporte_semanal.php");
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <br>
                <div class="contenedor-flex" style="padding-left: 20px; padding-right: 10px; padding-bottom: 5px;">
                  <label class="izquierda">*NOTA: Cifras sujetas a cambios por actualización</label>
                  <label class="derecha" style="font-size: 23px; color: white; background-color: #63696D; border-radius: 40% 40% 5% 5%;">&nbsp;&nbsp;2/2&nbsp;&nbsp;</label>
                </div>
                <div class="" style="padding-left: 10px; padding-right: 10px;">
                  <table width="100%">
                    <thead>
                      <tr>
                        <th width="80%" align="left" bgcolor="#63696D">
                          <h5 class="">
                            <span style="font-size: 14px; align:left; color:white;">
                              <font style="font-family: gothambook">
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio
                              </font>
                            </span>
                          </h5>
                        </th>
                        <th width="20%" align="left" bgcolor="#63696D">
                          <h5 class="">
                            <span style="font-size: 14px; align:left; color:white;">
                              <font style="font-family: gothambook">
                                Subdirección de Estadística y Pre-Registro
                              </font>
                            </span>
                          </h5>
                        </th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <br>
              </div>
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
