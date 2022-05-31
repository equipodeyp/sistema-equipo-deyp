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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/main2.css">
  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
  <!--font awesome con CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- datatables JS -->
  <script type="text/javascript" src="../datatables/datatables.min.js"></script>
  <!-- para usar botones en datatables JS -->
  <script src="../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>
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
      <nav class="menu-nav">
           <ul>

              <li class="menu-items"><a href="#"><i class="fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span>reportar incidencia</span></a></li>
              <li class="menu-items"><a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio"><i class='fas fa-file-pdf  menu-nav--icon fa-fw'></i><span class="menu-items">ver glosario</span></a></li>
              <li class="menu-items"><a href="../administrador/busqueda_avanzada.php"><i class='fa-solid fa-magnifying-glass  menu-nav--icon fa-fw'></i><span class="menu-items">Busqueda avanzada</span></a></li>
              <li class="menu-items"><a href="../administrador/estadistica.php"><i class="fa-solid fa-chart-line menu-nav--icon fa-fw"></i><span class="menu-items">ESTADISTICA</span></a></li>
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
        <!--Ejemplo tabla con DataTables-->
        <div class="">
          <div class="row">
              <div class="col-lg-5">
                <div class="table-responsive">
                  <table  border="1px" cellspacing="0" width="100%" bordered>
                    <thead>
                      <h3 style="text-align:center">SOLICITUDES RECIBIDAS Y EXPEDIENTES DETERMINADOS</h3>
                      <tr >
                        <th style="text-align:center" rowspan="2">concepto</th>
                        <th style="text-align:center" rowspan="2">2021</th>
                        <th style="text-align:center" colspan="5">2022</th>
                        <th style="text-align:center" rowspan="2">acumulado</th>
                      </tr>
                      <tr>
                        <th style="text-align:center">enero</th>
                        <th style="text-align:center">febrero</th>
                        <th style="text-align:center">marzo</th>
                        <th style="text-align:center">abril</th>
                        <th style="text-align:center">mayo</th>
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
          <!-- tabla 2 -->
          <div class="row">
              <div class="col-lg-5">
                <div class="table-responsive">
                  <table  border="1px" cellspacing="0" width="100%" bordered>
                    <thead>
                      <!-- <h3 style="text-align:center">SOLICITUDES RECIBIDAS Y EXPEDIENTES DETERMINADOS</h3> -->
                      <tr >
                        <th style="text-align:center" rowspan="2">concepto</th>
                        <th style="text-align:center" rowspan="2">2021</th>
                        <th style="text-align:center" colspan="5">2022</th>
                        <th style="text-align:center" rowspan="2">acumulado</th>
                      </tr>
                      <tr>
                        <th style="text-align:center">enero</th>
                        <th style="text-align:center">febrero</th>
                        <th style="text-align:center">marzo</th>
                        <th style="text-align:center">abril</th>
                        <th style="text-align:center">mayo</th>
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
          <div class="row">
            <div class="col-lg-5">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
                  <thead>
                    <h3 style="text-align:center">CALIDAD DE LAS PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA</h3>
                    <tr >
                      <th style="text-align:center" rowspan="3">CALIDAD EN EL PROGRAMA</th>
                      <th style="text-align:center" colspan="7"> MES DE SOLICITUD DE INCORPORACIÓN</th>
                    </tr>
                    <tr>
                      <th style="text-align:center" rowspan="2">2021</th>
                      <th style="text-align:center" style="text-align:center" colspan="5">2022</th>
                      <th style="text-align:center" style="text-align:center" rowspan="2">total</th>
                    </tr>
                    <tr>
                      <th style="text-align:center">enero</th>
                      <th style="text-align:center">febrero</th>
                      <th style="text-align:center">marzo</th>
                      <th style="text-align:center">abril</th>
                      <th style="text-align:center">mayo</th>
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
          <!--  -->

          <div class="row">
            <div class="col-lg-4">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
                  <thead>
                    <h3 style="text-align:center">ESTATUS DE LAS PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA</h3>
                    <tr>
                      <th rowspan="2" style="text-align:center">estatus en el programa</th>
                      <th colspan="3" style="text-align:center">periodo de solicitud de INCORPORACIÓN</th>
                    </tr>
                    <tr>
                      <th style="text-align:center">2021</th>
                      <th style="text-align:center">2022</th>
                      <th style="text-align:center">total</th>
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
            <div class="col-lg-4">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
                  <thead>
                    <h3 style="text-align:center">SUJETOS PROTEGIDOS ACTIVOS EN EL PROGRAMA</h3>
                    <tr >
                      <th style="text-align:center" rowspan="3">CALIDAD EN EL PROGRAMA</th>
                      <th style="text-align:center" colspan="7"> MES DE INCORPORACIÓN</th>
                    </tr>
                    <tr>
                      <th style="text-align:center" rowspan="2">2021</th>
                      <th style="text-align:center" style="text-align:center" colspan="5">2022</th>
                      <th style="text-align:center" style="text-align:center" rowspan="2">total</th>
                    </tr>
                    <tr>
                      <th style="text-align:center">enero</th>
                      <th style="text-align:center">febrero</th>
                      <th style="text-align:center">marzo</th>
                      <th style="text-align:center">abril</th>
                      <th style="text-align:center">mayo</th>
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
          <div class="row">
            <div class="col-lg-2">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
                  <thead>
                    <h3 style="text-align:center">SUJETOS PROTEGIDOS ACTIVOS EN EL PROGRAMA</h3>
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
          <!-- </div>
          <div class=""> -->
            <div class="col-lg-2">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
                  <thead>
                    <h3 style="text-align:center">SUJETOS PROTEGIDOS ACTIVOS EN EL PROGRAMA</h3>
                    <tr>
                      <th colspan="2">SUJETOS PROTEGIDOS POR edad</th>
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
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
                  <thead>
                    <h3 style="text-align:center">ESTATUS DE LAS MEDIDAS DE APOYO OTORGADAS</h3>
                    <tr>
                      <th>CLASIFICACION DE LA MEDIDA</th>
                      <th >EN EJECUCION</th>
                      <th>EJECUTADA</th>
                      <th>CANCELADA</th>
                      <th>TOTAL</th>
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
            <div class="col-lg-4">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
                  <thead>
                    <h3 style="text-align:center">MEDIDAS DE APOYO EJECUTADAS</h3>
                    <tr>
                      <th  style="text-align:center"rowspan="2">concepto</th>
                      <th  style="text-align:center"colspan="6">2022</th>
                    </tr>
                    <tr>
                      <th style="text-align:center">enero</th>
                      <th style="text-align:center">febrero</th>
                      <th style="text-align:center">marzo</th>
                      <th style="text-align:center">abril</th>
                      <th style="text-align:center">mayo</th>
                      <th style="text-align:center">acumulado</th>
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
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
                  <thead>
                    <h3 style="text-align:center">MEDIDAS DE APOYO EJECUTADAS POR MUNICIPIO</h3>
                    <tr>
                      <th style="text-align:center">MUNICIPIO</th>
                      <th style="text-align:center">asistencia</th>
                      <th style="text-align:center">resguardo</th>
                      <th style="text-align:center">total</th>
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
            <div class="col-lg-4">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
                  <thead>
                    <h3 style="text-align:center">ESTATUS DE LAS MEDIDAS DE APOYO DE ASISTENCIA</h3>
                    <tr>
                      <th style="text-align:center">CLASIFICACION de la MEDIDA</th>
                      <th style="text-align:center">en EJECUCION</th>
                      <th style="text-align:center">EJECUTADA</th>
                      <th style="text-align:center">CANCELADA</th>
                      <th style="text-align:center">total</th>
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
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
                  <thead>
                    <h3 style="text-align:center">ESTATUS DE LAS MEDIDAS DE APOYO DE resguardo</h3>
                    <tr>
                      <th style="text-align:center">CLASIFICACION de la MEDIDA</th>
                      <th style="text-align:center">en EJECUCION</th>
                      <th style="text-align:center">EJECUTADA</th>
                      <th style="text-align:center">CANCELADA</th>
                      <th style="text-align:center">total</th>
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
          <div class="row">
            <div class="col-lg-4">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
                  <thead>
                    <h3 style="text-align:center">DESCRIPCIÓN DE LOS EXPEDIENTES INICIADOS</h3>
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
            <div class="col-lg-4">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
                  <thead>
                    <h3 style="text-align:center">DESCRIPCIÓN DE LOS EXPEDIENTES INICIADOS</h3>
                    <tr>
                      <th style="text-align:center">sede</th>
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
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
                  <thead>
                    <h3 style="text-align:center">DESCRIPCIÓN DE LOS EXPEDIENTES INICIADOS</h3>
                    <tr>
                      <th style="text-align:center">delito principal</th>
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
            <div class="col-lg-4">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
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
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
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
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="">
                <table border="1px" cellspacing="0" width="100%" bordered>
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
          <!-- fin de estadoistica resumen de expedientes -->
          <div class="row">
            <div class="col-lg-4">
              <div class="table-responsive">
                <table  border="1px" cellspacing="0" width="100%" bordered>
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

        </div>



    </div>
  </div>
  <div class="contenedor">

    <!-- <a href="../docs/GLOSARIO-SIPPSIPPED.pdf" class="btn-flotante-glosario" download="GLOSARIO-SIPPSIPPED.pdf"><i class="fa fa-download"></i>GLOSARIO</a> -->

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
  <script src="../js/estadistica_tablas.js" charset="utf-8"></script>
</body>
</html>
