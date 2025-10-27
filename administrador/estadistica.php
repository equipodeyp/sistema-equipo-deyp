<?php
/*require 'conexion.php';*/
date_default_timezone_set("America/Mexico_City");
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
<!-- barra de navegacion -->
<link rel="stylesheet" href="../css/breadcrumb.css">
<link rel="stylesheet" href="../css/expediente.css">
<!-- SCRIPT PARA EL MANEJO DE LA TABLA -->
<style media="screen">
.contenedor-flex {
  display: flex; /* Coloca los elementos hijos uno al lado del otro */
  justify-content: space-between; /* Distribuye el espacio: una al inicio y otra al final */
  width: 100%; /* Asegúrate de que el contenedor ocupe el ancho necesario */
}

/* Opcional: Estilos para las etiquetas */
.izquierda {
  margin-right: 10px; /* Espacio entre las etiquetas */
}
.derecha {
  /* Ya está al final por justify-content */
}
</style>
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
      <nav class="menu-nav">
            <ul>
              <li class="menu-items"><a href="../administrador/archivos_html/total_expedientes.php"><span class="menu-items" style="color: white; font-weight:bold;"><i class='fa-solid fa-folder-open  menu-nav--icon fa-fw'></i> EXPEDIENTES</span></a></li>
              <li class="menu-items"><a href="../administrador/archivos_html/total_personas.php"><span class="menu-items" style="color: white; font-weight:bold;"><i class="fa-solid fa-users menu-nav--icon fa-fw"></i> SUJETOS</span></a></li>
              <li class="menu-items"><a href="../administrador/archivos_html/total_medidas.php"><span class="menu-items" style="color: white; font-weight:bold;"><i class='fa-solid fa-person-circle-plus  menu-nav--icon fa-fw'></i> MEDIDAS</span></a></li>
              <li class="menu-items"><a href="../administrador/archivos_html/total_personas_nuevo_ingreso.php"><span class="menu-items" style="color: white; font-weight:bold;"><i class="fa-solid fa-users menu-nav--icon fa-fw"></i> NUEVO INGRESO PERSONAS</span></a></li>
              <li class="menu-items"><a href="../administrador/dentro_y_fuera_del_cr.php"><span class="menu-items" style="color: white; font-weight:bold;"><i class="fa-solid fa-users menu-nav--icon fa-fw"></i> DENTRO Y FUERA DE CENTRO DE RESGUARDO</span></a></li>
              <li class="menu-items"><a href="../administrador/informe_sujetos.php"><span class="menu-items" style="color: white; font-weight:bold;"><i class='fa-solid fa-clipboard-user menu-nav--icon fa-fw'></i> INFORME SUJETOS</span></a></li>
              <li class="menu-items"><a href="../administrador/bd_traslados.php"><span class="menu-items" style="color: white; font-weight:bold;"><i class='fa-solid fa-database menu-nav--icon fa-fw'></i> BD TRASLADOS</span></a></li>
              <li class="menu-items"><a href="../administrador/bd_metas.php"><span class="menu-items" style="color: white; font-weight:bold;"><i class='fa-solid fa-database menu-nav--icon fa-fw'></i> BD METAS</span></a></li>
            </ul>
      </nav>
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
          <article class="">
            <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="../administrador/admin.php">REGISTROS</a>
              <a class="actived">ESTADISTICA</a>
            </div>
          </article>
        </div>
        <div class="container">
          <?php
          include("../administrador/obtener_fechas_reportes.php");
          ?>
          <ul class="ca-menu">

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
              <li >
                <a href="#" data-toggle="modal" data-target="#add_data_Modal_alojamiento_temporal">
                  <span class="ca-icon"><img alt="" src="../image/ESTADISTICA/ALTEM.png" style="width:100px;height:70px;"></span>
                  <div class="ca-content">
                    <h2 class="ca-main">ALOJAMIENTO TEMPORAL</h2>
                    <h3 class="ca-sub"></h3></div>
                  </a>
              </li>
              <li >
                <a href="#" data-toggle="modal" data-target="#add_data_Modal_total_sujetos_alojamiento">
                  <span class="ca-icon"><img alt="" src="../image/ESTADISTICA/refugio.png" style="width:100px;height:60px;"></span>
                  <div class="ca-content">
                    <h2 class="ca-main">TOTAL DE SUJETOS EN ALOJAMIENTO</h2>
                    <h3 class="ca-sub"></h3></div>
                  </a>
              </li>
          </ul>
        </div>
        <div class="contenedor" style="display: flex; justify-content: center;">
          <ul class="ca-menu" >
            <li >
              <a href="#" data-toggle="modal" data-target="#add_data_Modal_reporte_diario">
                <span class="ca-icon"><img alt="" src="../image/ESTADISTICA/dia.png" style="width:150px;height:100px;"></span>
                <div class="ca-content">
                  <h1></h1>
                  <h2 class="ca-main">REPORTE DIARIO</h2>
                </div>
                </a>
              </li>
              <li >
                <a href="#" data-toggle="modal" data-target="#add_data_Modal_reporte_semanal">
                  <span class="ca-icon"><img alt="" src="../image/ESTADISTICA/semana.png" style="width:150px;height:100px;"></span>
                  <div class="ca-content">
                    <h1></h1>
                    <h2 class="ca-main">REPORTE SEMANAL</h2>
                  </div>
                  </a>
              </li>
              <li >
                <a href="#" data-toggle="modal" data-target="#add_data_Modal_reporte_mensual">
                  <span class="ca-icon"><img alt="" src="../image/ESTADISTICA/mes.png" style="width:150px;height:100px;"></span>
                  <div class="ca-content">
                    <h1></h1>
                    <h2 class="ca-main">REPORTE MENSUAL</h2>
                  </div>
                  </a>
              </li>
          </ul>
        </div>

        <!-- <br><br><br><br><br><br><br> -->
        <!-- <br><br><br><br><br><br> -->

        <!-- <div class="contenedor" style="display: flex; justify-content: center;">
          <ul class="ca-menu">

            <li >
              <a href="../administrador/report_day.php">
                <span class="ca-icon"><img alt="" src="" style="width:50px;height:50px;"></span>
                <div class="ca-content">
                  <h2 class="ca-main">RESUMEN DIARIO</h2>
                  <h3 class="ca-sub">TOTAL - EXPEDIENTES - SUJETOS - MEDIDAS</h3></div>
                </a>
            </li>

            <li >
              <a href="../administrador/report_week.php">
                <span class="ca-icon"><img alt="" src="" style="width:70px;height:70px;"></span>
                <div class="ca-content">
                  <h2 class="ca-main">RESUMEN SEMANAL</h2>
                   <h3 class="ca-sub">TOTAL - EXPEDIENTES - SUJETOS - MEDIDAS</h3></div>
                </a>
            </li>

            <li >
              <a href="../administrador/report_month.php">
                <span class="ca-icon"><img alt="" src="" style="width:70px;height:70px;"></span>
                <div class="ca-content">
                  <h2 class="ca-main">RESUMEN MENSUAL</h2>
                  <h3 class="ca-sub">TOTAL - EXPEDIENTES - SUJETOS - MEDIDAS</h3></div>
                </a>
            </li>

          </ul>
        </div> -->

        <?php
        date_default_timezone_set("America/Mexico_City");
        $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        echo '<h4 align="right">'; echo $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ; echo '</h4>';
        ?>

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
        // include("../administrador/archivos_html/resumen.html");
        ?>
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
                        <br>
                        <div class="">
                          <?php
                          $t = "SELECT id, folioexpediente, espedienterelacional, COUNT(*) as t from  relacion_suj_exp
                          GROUP BY relacion_suj_exp.folioexpediente
                          HAVING COUNT(*)>0
                          ORDER BY 'id'  ASC";
                          $rt = $mysqli->query($t);
                          while ($ft= $rt->fetch_assoc()) {
                            $expediente = $ft['folioexpediente'];
                            $v="SELECT * FROM datospersonales WHERE folioexpediente='$expediente'";
                            $rv=$mysqli->query($v);
                            $fv = $rv->fetch_assoc();
                            $n = $fv['nombrepersona'];
                            $p = $fv['paternopersona'];
                            $m = $fv['maternopersona'];

                            $v2="SELECT COUNT(*) as t  FROM datospersonales
                            WHERE nombrepersona = '$n' and paternopersona = '$p' and maternopersona = '$m' and relacional = 'SI'";
                            $rv2=$mysqli->query($v2);
                            $fv2 = $rv2->fetch_assoc();
                            // echo $fv2['t'];
                            for ($i=0; $i < $fv2['t']; $i++) {
                              echo "*";
                            }
                            echo "  ";
                            echo 'El sujeto del expediente   '.$expediente = $ft['folioexpediente'] .' se relaciona con el expediente ' .$ft['espedienterelacional'].'<br />';
                          }
                          ?>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
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
                <?php

                ?>
                <br>
                <em>DEL 01 DE JUNIO DEL 2021 AL <?php
                  $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                  $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");

                  echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
                ?></em>
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
        <?php
        include("../administrador/archivos_html/resumendiario.html");//RESUMEN DIARO DEL SISTEMA
        include("../administrador/archivos_html/medidas_alojamiento_temporal.html");//SUJETOS CON ALOJAMIENTO TEMPORAL
        include("../administrador/archivos_html/total_sujetos_alojamiento.html");//TOTAL DE SUJETOS POR AÑO EN ALOJAMIENTO TEMPORAL
        include("../administrador/archivos_html/reporte_diario.php");
        include("../administrador/archivos_html/reporte_semanal.php");
        include("../administrador/archivos_html/reporte_mensual.php");
        ?>
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
