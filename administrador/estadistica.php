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
        <div class="">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                              <h3 style="text-align:center">Registros</h3>
                                <tr>
                                    <th style="text-align:center">No.</th>
                                    <th style="text-align:center">ID EXPEDIENTE</th>
                                    <th style="text-align:center">FECHA RECEPCION</th>
                                    <th style="text-align:center">SEDE</th>
                                    <th style="text-align:center">NOMBRE AUTORIDAD</th>
                                    <th style="text-align:center">DELITO PRINCIPAL</th>
                                    <th style="text-align:center">OTRO DELITO PRINCIPAL</th>
                                    <th style="text-align:center">ETAPA PROCEDIMIENTO/RECURSO</th>
                                    <th style="text-align:center">NUC</th>
                                    <th style="text-align:center">MUNICIPIO RADICACION</th>
                                    <th style="text-align:center">RESULTADO VALORACION JURIDICA</th>
                                    <th style="text-align:center">MOTIVO NO PROCEDENCIA JURIDICA</th>
                                    <th style="text-align:center">PERSONAS PROPUESTAS</th>
                                    <th style="text-align:center">ANALISIS MULTIDISCIPLINARIO</th>
                                    <th style="text-align:center">INCORPORACIÓN</th>
                                    <th style="text-align:center">FECHA ANALISIS</th>
                                    <th style="text-align:center">ID ANALISIS</th>
                                    <th style="text-align:center">CONVENIO</th>
                                    <th style="text-align:center">FECHA CONVENIO</th>
                                    <th style="text-align:center">VIGENCIA</th>
                                    <th style="text-align:center">FECHA TERMINO</th>
                                    <th style="text-align:center">CONCLUSIÓN / CANCELACIÓN</th>
                                    <th style="text-align:center">CONCLUSIÓN ART. 35</th>
                                    <th style="text-align:center">OTRO ART. 35</th>
                                    <th style="text-align:center">FECHA DESINCORPORACIÓN</th>
                                    <th style="text-align:center">ESTATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $cont = 0;
                              $exps = "SELECT DISTINCT a.fol_exp, a.fecharecep, a.sede,
                              b.nombreautoridad,
                              c.delitoprincipal, c.otrodelitoprincipal, c.etapaprocedimiento, c.nuc, c.numeroradicacion,
                              e.resultadovaloracion, e.motivoprocedencia,
                              d.personas_propuestas, d.analisis, d.incorporacion, d.fecha_analisis, d.id_analisis, d.convenio, d.fecha_convenio, d.vigencia , d.fecha_termino_convenio,
                              f.conclu_cancel, f.conclusionart35, f.otherart35, f.date_desincorporacion, f.status
                              FROM expediente a
                              INNER JOIN autoridad b on a.fol_exp = b.folioexpediente
                              INNER JOIN procesopenal c on b.folioexpediente = c.folioexpediente
                              INNER JOIN analisis_expediente d on c.folioexpediente = d.folioexpediente
                              INNER JOIN valoracionjuridica e on d.folioexpediente = e.folioexpediente
                              INNER JOIN statusseguimiento f on e.folioexpediente = f.folioexpediente
                              ORDER by a.id ASC";
                              $rexps = $mysqli->query($exps);
                              while ($fexps = $rexps->fetch_assoc()) {
                                $cont = $cont + 1;
                                echo "<tr>";
                                echo "<td style='text-align:center'>"; echo $cont; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['fol_exp']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['fecharecep']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['sede']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['nombreautoridad']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['delitoprincipal']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['otrodelitoprincipal']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['etapaprocedimiento']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['nuc']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['numeroradicacion']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['resultadovaloracion']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['motivoprocedencia']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['personas_propuestas']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['analisis']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['incorporacion']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['fecha_analisis']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['id_analisis']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['convenio']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['fecha_convenio']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['vigencia']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['fecha_termino_convenio']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['conclu_cancel']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['conclusionart35']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['otherart35']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['date_desincorporacion']; echo "</td>";
                                echo "<td style='text-align:center'>"; echo $fexps['status']; echo "</td>";
                                echo "</tr>";
                              }
                              ?>
                            </tbody>
                           </table>
                        </div>
                    </div>
            </div>
        </div>
        <div class="contenedor">

        <a href="../administrador/admin.php" class="btn-flotante">REGRESAR</a>

        </div>
        <!--Ejemplo tabla con DataTables-->
        <!-- MEDIDAS -->
        <div class="modal fade" id="add_data_Modal_medidas1" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 style="text-align:center" class="modal-title" id="myModalLabel1">MEDIDAS</h2>
              </div>
              <div class="modal-body">
                <div className="modal">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="">
                        <table id="medidasapoyo" border="1px" cellspacing="0" width="100%" bordered>
                          <thead>
                            <h3 style="text-align:center">ESTATUS DE LAS MEDIDAS DE APOYO OTORGADAS</h3>
                            <tr>
                              <th style="text-align:center">CLASIFICACION DE LA MEDIDA</th>
                              <th style="text-align:center">EN EJECUCION</th>
                              <th style="text-align:center">EJECUTADA</th>
                              <th style="text-align:center">CANCELADA</th>
                              <th style="text-align:center">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../administrador/tablas_estadistica/tabla_medidas_otorgadas.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="">
                        <table id="medidasejecutadas" border="1px" cellspacing="0" width="100%" bordered>
                          <thead>
                            <h3 style="text-align:center">MEDIDAS DE APOYO EJECUTADAS</h3>
                            <tr>
                              <th  style="text-align:center"rowspan="2">CONCEPTO</th>
                              <th  style="text-align:center"colspan="6">2022</th>
                            </tr>
                            <tr>
                              <th style="text-align:center">ENERO</th>
                              <th style="text-align:center">FEBRERO</th>
                              <th style="text-align:center">MARZO</th>
                              <th style="text-align:center">ABRIL</th>
                              <th style="text-align:center">MAYO</th>
                              <th style="text-align:center">ACUMULADO</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../administrador/tablas_estadistica/tabla_medidas_ejecutadas.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="">
                        <table id="ejecutadasmunicipio" border="1px" cellspacing="0" width="100%" bordered>
                          <thead>
                            <h3 style="text-align:center">MEDIDAS DE APOYO EJECUTADAS POR MUNICIPIO</h3>
                            <tr>
                              <th style="text-align:center">MUNICIPIO</th>
                              <th style="text-align:center">ASISTENCIA</th>
                              <th style="text-align:center">RESGUARDO</th>
                              <th style="text-align:center">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../administrador/tablas_estadistica/tabla_medidas_ejecutadaspormunicipio.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="">
                        <table id="medidasasistencia" border="1px" cellspacing="0" width="100%" bordered>
                          <thead>
                            <h3 style="text-align:center">ESTATUS DE LAS MEDIDAS DE APOYO DE ASISTENCIA</h3>
                            <tr>
                              <th style="text-align:center">CLASIFICACION DE LA MEDIDA</th>
                              <th style="text-align:center">EN EJECUCION</th>
                              <th style="text-align:center">EJECUTADA</th>
                              <th style="text-align:center">CANCELADA</th>
                              <th style="text-align:center">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../administrador/tablas_estadistica/tabla_medidas_asistencia.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="">
                        <table id="medidasresguardo" border="1px" cellspacing="0" width="100%" bordered>
                          <thead>
                            <h3 style="text-align:center">ESTATUS DE LAS MEDIDAS DE APOYO DE RESGUARDO</h3>
                            <tr>
                              <th style="text-align:center">CLASIFICACION DE LA MEDIDA</th>
                              <th style="text-align:center">EN EJECUCION</th>
                              <th style="text-align:center">EJECUTADA</th>
                              <th style="text-align:center">CANCELADA</th>
                              <th style="text-align:center">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../administrador/tablas_estadistica/tabla_medidas_resguardo.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button  type="button" class="btn btn-success" id="exportarExcelN" onclick="exportarmedidas();">EXPORTAR</button>
                <button  type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
              </div>
            </div>
          </div>
        </div>
        <!-- fin medidas -->
        <!-- inicio expedientes -->
        <div class="modal fade" id="add_data_Modal_expedientes" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 style="text-align:center" class="modal-title" id="myModalLabel">EXPEDIENTES</h2>
              </div>
              <div class="modal-body">
                <div className="modal">
                  <div class="row">
                    <h3 style="text-align:center">DESCRIPCIÓN DE LOS EXPEDIENTES INICIADOS</h3>
                    <div class="col-lg-12">
                      <div class="">
                        <table id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
                          <thead>
                            <tr>
                              <th style="text-align:center">ESTATUS</th>
                              <th style="text-align:center">2021</th>
                              <th style="text-align:center">2022</th>
                              <th style="text-align:center">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../administrador/tablas_estadistica/tabla_expedientes.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="">
                        <br>
                        <table id="sedeexpediente" border="1px" cellspacing="0" width="100%" bordered>
                          <thead>
                            <!-- <h3 style="text-align:center">DESCRIPCIÓN DE LOS EXPEDIENTES INICIADOS</h3> -->
                            <tr>
                              <th style="text-align:center">SEDE</th>
                              <th style="text-align:center">2021</th>
                              <th style="text-align:center">2022</th>
                              <th style="text-align:center">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../administrador/tablas_estadistica/tabla_expedientes_sede.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="">
                        <br>
                        <table id="delitoprincipalexpediente" border="1px" cellspacing="0" width="100%" bordered>
                          <thead>
                            <!-- <h3 style="text-align:center">DESCRIPCIÓN DE LOS EXPEDIENTES INICIADOS</h3> -->
                            <tr>
                              <th style="text-align:center">DELITO PRINCIPAL</th>
                              <th style="text-align:center">2021</th>
                              <th style="text-align:center">2022</th>
                              <th style="text-align:center">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../administrador/tablas_estadistica/tabla_delito_principal.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="">
                        <table id="radicacionexpediente" border="1px" cellspacing="0" width="100%" bordered>
                          <thead>
                            <h3 style="text-align:center">DESCRIPCIÓN DE LOS EXPEDIENTES INICIADOS</h3>
                            <tr>
                              <th style="text-align:center">MUNICIPIO DE RADICACION DE LA CARPETA DE INVESTIGACIÓN</th>
                              <th style="text-align:center">2021</th>
                              <th style="text-align:center">2022</th>
                              <th style="text-align:center">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../administrador/tablas_estadistica/tabla_municpio_radicacion.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="">
                        <table id="autoridadsolicitante" border="1px" cellspacing="0" width="100%" bordered>
                          <thead>
                            <h3 style="text-align:center">DESCRIPCIÓN DE LOS EXPEDIENTES INICIADOS</h3>
                            <tr>
                              <th style="text-align:center">AUTORIDAD SOLICITANTE</th>
                              <th style="text-align:center">2021</th>
                              <th style="text-align:center">2022</th>
                              <th style="text-align:center">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../administrador/tablas_estadistica/tabla_autoridad_solicitante.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-lg-12">
                        <div class="">
                          <table id="procedemientorecurso" border="1px" cellspacing="0" width="100%" bordered>
                            <thead>
                              <h3 style="text-align:center">DESCRIPCIÓN DE LOS EXPEDIENTES INICIADOS</h3>
                              <tr>
                                <th style="text-align:center">ETAPA DEL PROCEDIMIENTO / RECURSO</th>
                                <th style="text-align:center">2021</th>
                                <th style="text-align:center">2022</th>
                                <th style="text-align:center">TOTAL</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              include("../administrador/tablas_estadistica/tabla_proceso_recurso.php");
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button  type="button" class="btn btn-success" id="exportarExcelN" onclick="exportarexpedientes();">EXPORTAR</button>
                <button  type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
              </div>
            </div>
          </div>
        </div>
        <!-- fin expedientes -->
        <!-- inicio resumen -->
        <div class="modal fade" id="add_data_Modal_resumen" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-lg"  style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:80%">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 style="text-align:center" class="modal-title" id="myModalLabel">RESUMEN</h2>
              </div>
              <div class="modal-body">
                <div className="modal">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="table-responsive">
                        <table id="resumenexpedientes" border="1px" cellspacing="0" width="100%" bordered>
                          <thead>
                            <h3 style="text-align:center">RESUMEN DE LOS EXPEDIENTES</h3>
                            <tr>
                              <th style="text-align:center" rowspan="2">NO.</th>
                              <th style="text-align:center" rowspan="2">NUMERO DE EXPEDIENTE</th>
                              <th style="text-align:center" rowspan="2">AUTORIDAD SOLICITANTE</th>
                              <th style="text-align:center" rowspan="2">FECHA DE RECEPCION</th>
                              <th style="text-align:center" rowspan="2">DELITO PRINCIPAL</th>
                              <th style="text-align:center" rowspan="2">PERSONAS PROPUESTAS</th>
                              <th style="text-align:center" rowspan="2">SUJETOS INCORPORADOS</th>
                              <th style="text-align:center" colspan="3">MEDIDAS DE APOYO</th>
                              <th style="text-align:center" rowspan="2">ESTATUS DEL EXPEDIENTE</th>
                            </tr>
                            <tr>
                              <th style="text-align:center">EJECUTADAS</th>
                              <th style="text-align:center">EN EJECUCION</th>
                              <th style="text-align:center">CANCELADAS</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../administrador/tablas_estadistica/tabla_resumen_expedientes.php");
                            ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <h3 style="text-align:center">RESUMEN DEL PROGRAMA</h3>
                      <div class="">
                        <table id="resumenprograma" border="1px" cellspacing="0" width="100%" bordered>
                          <thead>
                            <tr>
                              <th style="text-align:center">CONCEPTO</th>
                              <th style="text-align:center">TOTAL</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("../administrador/tablas_estadistica/tabla_resumen_programa.php");
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button  type="button" class="btn btn-success" id="exportarExcelN" onclick="exportarresumen();">EXPORTAR</button>
                <button  type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
              </div>
            </div>
          </div>
        </div>
        <!-- fin resumen -->
        <!-- inicio resumen diario -->
        <div class="modal fade" id="add_data_Modal_resumendiario" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-lg"  style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:80%">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 style="text-align:center" class="modal-title" id="myModalLabel">RESUMEN DIARIO</h2>
              </div>
              <div class="modal-body">
                <div className="modal">
                  <div class="row">
                    <div class="col-lg-12">
                      <table border="1px" cellspacing="0" width="100%" bordered>
                        <thead>
                          <h3 style="text-align:center">RESUMEN DE LOS EXPEDIENTES</h3>
                          <tr>
                            <th style="text-align:center" rowspan="2">NO.</th>
                            <th style="text-align:center" rowspan="2">NUMERO DE EXPEDIENTE</th>
                            <th style="text-align:center" rowspan="2">AUTORIDAD SOLICITANTE</th>
                            <th style="text-align:center" rowspan="2">FECHA DE RECEPCION</th>
                            <th style="text-align:center" rowspan="2">DELITO PRINCIPAL</th>
                            <th style="text-align:center" rowspan="2">PERSONAS PROPUESTAS</th>
                            <th style="text-align:center" rowspan="2">SUJETOS INCORPORADOS</th>
                            <th style="text-align:center" colspan="3">MEDIDAS DE APOYO</th>
                            <th style="text-align:center" rowspan="2">ESTATUS DEL EXPEDIENTE</th>
                          </tr>
                          <tr>
                            <th style="text-align:center">EJECUTADAS</th>
                            <th style="text-align:center">EN EJECUCION</th>
                            <th style="text-align:center">CANCELADAS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../administrador/tablas_estadistica/tabla_resumen_expedientes.php");
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <table border="1px" cellspacing="0" width="100%" bordered>
                        <thead>
                          <h3></h3>
                          <tr>
                            <th style="text-align:center">CONCEPTO</th>
                            <th style="text-align:center">TOTAL</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../administrador/tablas_estadistica/tabla_resumendiario_programa.php");
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-4">
                      <table border="1px" cellspacing="0" width="100%" bordered>
                        <thead>
                          <h3></h3>
                          <tr>
                            <th style="text-align:center">ESTATUS DE LOS EXPEDIENTES DE PROTECCIÓN</th>
                            <th style="text-align:center">TOTAL</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../administrador/tablas_estadistica/tabla_estatus_expedientes.php");
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-4">
                      <table border="1px" cellspacing="0" width="100%" bordered>
                        <thead>
                          <h3></h3>
                          <tr>
                            <th style="text-align:center">ESTATUS DE LAS PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA</th>
                            <th style="text-align:center">TOTAL</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../administrador/tablas_estadistica/tabla_estatus_sujetos.php");
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row" style="display: flex; justify-content: center;">
                    <div class="col-lg-10" >
                      <table border="1px" cellspacing="0" width="100%" bordered>
                        <thead>
                          <h3></h3>
                          <tr>
                            <th style="text-align:center">ESTATUS DE LAS MEDIDAS DE APOYO DICTAMINADAS</th>
                            <th style="text-align:center">EN EJECUCION</th>
                            <th style="text-align:center">EJECUTADA</th>
                            <th style="text-align:center">CANCELADA</th>
                            <th style="text-align:center">TOTAL</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../administrador/tablas_estadistica/tabla_estatus_medidas.php");
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <button  type="button" class="btn btn-success" id="exportarExcelN" onclick="exportarresumen();">EXPORTAR</button>
                <button  type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
              </div>
            </div>
          </div>
        </div>
        <!-- fin resumen diario -->
        <!-- fin Ejemplo tabla con DataTables-->
    </div>
  </div>
  <div class="contenedor">
    <!-- <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a> -->
  </div>
  <!-- modal del glosario -->
  <div class="modal fade" id="add_data_Modal_convenio" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center" class="modal-title" id="myModalLabel">GLOSARIO SIPPSIPPED</h4>
        </div>
        <div class="modal-body">
          <div className="modal">
            <div className="modalContent">
              <iframe src="../docs/GLOSARIO-SIPPSIPPED.pdf" style="width:870px; height:600px;" ></iframe>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button style="display: block; margin: 0 auto;" type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
        </div>
      </div>
    </div>
  </div>
  <!-- fin modal  -->
  <!-- MODAL SOLICITUDES -->
  <div class="modal fade" id="add_data_Modal_solicitudes" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h2 style="text-align:center" class="modal-title" id="myModalLabel">SOLICITUDES</h2>
        </div>
        <div class="modal-body">
          <div className="modal">
            <h3 style="text-align:center">SOLICITUDES RECIBIDAS Y EXPEDIENTES DETERMINADOS</h3>
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                    <thead>
                      <tr >
                        <th style="text-align:center" rowspan="2">CONCEPTO</th>
                        <th style="text-align:center" rowspan="2">2021</th>
                        <th style="text-align:center" colspan="5">2022</th>
                        <th style="text-align:center" rowspan="2">ACUMULADO</th>
                      </tr>
                      <tr>
                        <th style="text-align:center">ENERO</th>
                        <th style="text-align:center">FEBRERO</th>
                        <th style="text-align:center">MARZO</th>
                        <th style="text-align:center">ABRIL</th>
                        <th style="text-align:center">MAYO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla1.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <table id="tabla2" border="1px" cellspacing="0" width="100%" bordered>
                    <thead>
                      <!-- <h3 style="text-align:center">SOLICITUDES RECIBIDAS Y EXPEDIENTES DETERMINADOS</h3> -->
                      <tr >
                        <th style="text-align:center" rowspan="2">CONCEPTO</th>
                        <th style="text-align:center" rowspan="2">2021</th>
                        <th style="text-align:center" colspan="5">2022</th>
                        <th style="text-align:center" rowspan="2">ACUMULADO</th>
                      </tr>
                      <tr>
                        <th style="text-align:center">ENERO</th>
                        <th style="text-align:center">FEBRERO</th>
                        <th style="text-align:center">MARZO</th>
                        <th style="text-align:center">ABRIL</th>
                        <th style="text-align:center">MAYO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla2.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button  type="button" class="btn btn-success" id="exportarExcelN" onclick="exportarExcelv2();">EXPORTAR</button>
          <button  type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
        </div>
      </div>
    </div>
  </div>
  <!-- FIN SOLICITUDES -->
  <!-- PERSONAS -->
  <div class="modal fade" id="add_data_Modal_personas" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h2 style="text-align:center" class="modal-title" id="myModalLabel">PERSONAS</h2>
        </div>
        <div class="modal-body">
          <div className="modal">
            <div class="row">
              <div class="col-lg-12">
                <div class="">
                  <table id="calidadp" border="1px" cellspacing="0" width="100%" bordered>
                    <thead>
                      <h3 style="text-align:center">CALIDAD DE LAS PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA</h3>
                      <tr >
                        <th style="text-align:center" rowspan="3">CALIDAD EN EL PROGRAMA</th>
                        <th style="text-align:center" colspan="7"> MES DE SOLICITUD DE INCORPORACIÓN</th>
                      </tr>
                      <tr>
                        <th style="text-align:center" rowspan="2">2021</th>
                        <th style="text-align:center" style="text-align:center" colspan="5">2022</th>
                        <th style="text-align:center" style="text-align:center" rowspan="2">TOTAL</th>
                      </tr>
                      <tr>
                        <th style="text-align:center">ENERO</th>
                        <th style="text-align:center">FEBRERO</th>
                        <th style="text-align:center">MARZO</th>
                        <th style="text-align:center">ABRIL</th>
                        <th style="text-align:center">MAYO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        include("../administrador/tablas_estadistica/tabla_calidad.php");
                       ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="">
                  <table id="estatusp" border="1px" cellspacing="0" width="100%" bordered>
                    <thead>
                      <h3 style="text-align:center">ESTATUS DE LAS PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA</h3>
                      <tr>
                        <th rowspan="2" style="text-align:center">ESTATUS EN EL PROGRAMA</th>
                        <th colspan="3" style="text-align:center">PERIODO DE SOLICITUD DE INCORPORACIÓN</th>
                      </tr>
                      <tr>
                        <th style="text-align:center">2021</th>
                        <th style="text-align:center">2022</th>
                        <th style="text-align:center">TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        include("../administrador/tablas_estadistica/tabla_estatus_personas.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <h3 style="text-align:center">SUJETOS PROTEGIDOS ACTIVOS EN EL PROGRAMA</h3>
              <div class="col-lg-12">
                <div class="">
                  <table id="protegidosactivosp" border="1px" cellspacing="0" width="100%" bordered>
                    <thead>
                      <tr >
                        <th style="text-align:center" rowspan="3">CALIDAD EN EL PROGRAMA</th>
                        <th style="text-align:center" colspan="7"> MES DE INCORPORACIÓN</th>
                      </tr>
                      <tr>
                        <th style="text-align:center" rowspan="2">2021</th>
                        <th style="text-align:center" style="text-align:center" colspan="5">2022</th>
                        <th style="text-align:center" style="text-align:center" rowspan="2">TOTAL</th>
                      </tr>
                      <tr>
                        <th style="text-align:center">ENERO</th>
                        <th style="text-align:center">FEBRERO</th>
                        <th style="text-align:center">MARZO</th>
                        <th style="text-align:center">ABRIL</th>
                        <th style="text-align:center">MAYO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla_calidad_activos.php");
                      ?>
                    </tbody>
                  </div>
                </table>
              </div>
            </div>
            <div class="secciones">
              <div class="col-lg-4">
                <div class="">
                  <br>
                  <br>
                  <table id="protegidoseedadp" border="1px" cellspacing="0" width="100%" bordered>
                    <thead>
                      <!-- <h3 style="text-align:center">SUJETOS PROTEGIDOS ACTIVOS EN EL PROGRAMA</h3> -->
                      <tr>
                        <th colspan="2">SUJETOS PROTEGIDOS POR EDAD</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla_sujetos_protegidos_edad.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="">
                  <br>
                  <br>
                  <table id="protegidossexop" border="1px" cellspacing="0" width="100%" bordered>
                    <thead>
                      <!-- <h3 style="text-align:center">SUJETOS PROTEGIDOS ACTIVOS EN EL PROGRAMA</h3> -->
                      <tr>
                        <th colspan="2" style="text-align:center">SUJETOS PROTEGIDOS POR SEXO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla_sujetos_protegidos_sexo.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button  type="button" class="btn btn-success" id="exportarExcelN" onclick="exportarpersonas();">EXPORTAR</button>
          <button  type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
        </div>
      </div>
    </div>
  </div>
  <!-- fin personas -->
  <script src="../js/estadistica_tablas.js" charset="utf-8"></script>
  <script src="../js/exportar_tablas_estadistica.js" charset="utf-8"></script>
</body>
</html>
