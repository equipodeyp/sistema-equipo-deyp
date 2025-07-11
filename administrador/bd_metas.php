<?php
/*require 'conexion.php';*/
// error_reporting(0);
include("conexion.php");
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
  <script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>INFORME SUJETOS</title>
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
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/expediente.css">
<!-- SCRIPT PARA EL MANEJO DE LA TABLA -->
  <script type="text/javascript">
  // primer tabla de meses
  $(document).ready(function() {
      $('#example').DataTable({
          language: {
                  "lengthMenu": "Mostrar _MENU_ registros",
                  "zeroRecords": "No se encontraron resultados",
                  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sSearch": "Buscar:",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast":"Último",
                      "sNext":"Siguiente",
                      "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
              },
          // para usar los botones
          // searching: false,
          responsive: "true",
          dom: 'Bfrtilp',
          buttons:[
        {
          extend:    'excelHtml5',
          text:      '<i class="fas fa-file-excel"></i> ',
          titleAttr: 'Exportar a Excel',
          className: 'btn btn-success',
          title:     'METAS'
        },
      ]
      });
  });
  // segunda tabla de medidas de resguardo
  $(document).ready(function() {
      $('#resguardometas').DataTable({
          language: {
                  "lengthMenu": "Mostrar _MENU_ registros",
                  "zeroRecords": "No se encontraron resultados",
                  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sSearch": "Buscar:",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast":"Último",
                      "sNext":"Siguiente",
                      "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
              },
          // para usar los botones
          // searching: false,
          responsive: "true",
          dom: 'Bfrtilp',
          buttons:[
        {
          extend:    'excelHtml5',
          text:      '<i class="fas fa-file-excel"></i> ',
          titleAttr: 'Exportar a Excel',
          className: 'btn btn-success',
          title:     'METAS MEDIDAS RESGUARDO'
        },
      ]
      });
  });
  // segunda tabla de medidas de ASISTENCIA
  $(document).ready(function() {
      $('#asistenciametas').DataTable({
          language: {
                  "lengthMenu": "Mostrar _MENU_ registros",
                  "zeroRecords": "No se encontraron resultados",
                  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sSearch": "Buscar:",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast":"Último",
                      "sNext":"Siguiente",
                      "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
              },
          // para usar los botones
          // searching: false,
          responsive: "true",
          dom: 'Bfrtilp',
          buttons:[
        {
          extend:    'excelHtml5',
          text:      '<i class="fas fa-file-excel"></i> ',
          titleAttr: 'Exportar a Excel',
          className: 'btn btn-success',
          title:     'METAS MEDIDAS ASISTENCIA'
        },
      ]
      });
  });
  </script>
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
        <!--Ejemplo tabla con DataTables-->
      </div>
      <div class="container">
        <article class="">
          <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="../administrador/admin.php">REGISTROS</a>
            <a href="../administrador/estadistica.php">ESTADISTICA</a>
            <a class="actived">METAS</a>
          </div>
          <div class="container">
            <h2 style="text-align:center">METAS</h2>
            <div class="">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                    <th style="text-align:center">DESCRIPCION</th>
                                    <th style="text-align:center">ENERO</th>
                                    <th style="text-align:center">FEBRERO</th>
                                    <th style="text-align:center">MARZO</th>
                                    <th style="text-align:center">ABRIL</th>
                                    <th style="text-align:center">MAYO</th>
                                    <th style="text-align:center">JUNIO</th>
                                    <th style="text-align:center">JULIO</th>
                                    <th style="text-align:center">AGOSTO</th>
                                    <th style="text-align:center">SEPTIEMBRE</th>
                                    <th style="text-align:center">OCTUBRE</th>
                                    <th style="text-align:center">NOVIEMBRE</th>
                                    <th style="text-align:center">DICIEMBRE</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php include("contardatemedidas.php"); ?>
                                <tr>
                                  <td>RESGUARDO</td>
                                  <td><?php echo $feneroresg['total']; ?></td>
                                  <td><?php echo $ffebreroresg['total']; ?></td>
                                  <td><?php echo $fmarzoresg['total']; ?></td>
                                  <td><?php echo $fabrilresg['total']; ?></td>
                                  <td><?php echo $fmayoresg['total']; ?></td>
                                  <td><?php echo $fjunioresg['total']; ?></td>
                                  <td><?php echo $fjulioresg['total']; ?></td>
                                  <td><?php echo $fagostoresg['total']; ?></td>
                                  <td><?php echo $fseptiembreresg['total']; ?></td>
                                  <td><?php echo $foctubreresg['total']; ?></td>
                                  <td><?php echo $fnoviembreresg['total']; ?></td>
                                  <td><?php echo $fdiciembreresg['total']; ?></td>
                                </tr>
                                <tr>
                                  <td>ASISTENCIA</td>
                                  <td><?php echo $feneroasis['total']; ?></td>
                                  <td><?php echo $ffebreroasis['total']; ?></td>
                                  <td><?php echo $fmarzoasis['total']; ?></td>
                                  <td><?php echo $fabrilasis['total']; ?></td>
                                  <td><?php echo $fmayoasis['total']; ?></td>
                                  <td><?php echo $fjunioasis['total']; ?></td>
                                  <td><?php echo $fjulioasis['total']; ?></td>
                                  <td><?php echo $fagostoasis['total']; ?></td>
                                  <td><?php echo $fseptiembreasis['total']; ?></td>
                                  <td><?php echo $foctubreasis['total']; ?></td>
                                  <td><?php echo $fnoviembreasis['total']; ?></td>
                                  <td><?php echo $fdiciembreasis['total']; ?></td>
                                  <!-- <td><?php echo $feneroasis['total']; ?></td> -->
                                </tr>
                              </tbody>
                             </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <br><br>
                          <div class="alert alert-success" role="alert">
                            <!-- A simple success alert—check it out! -->
                            <h1 style="text-align:center">TABLAS DE MEDIDAS SEGUN EL MES ACTUAL</h1>
                          </div>
                            <div class="table-responsive">
                              <table id="resguardometas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                  <th style="text-align:center" colspan="3">MEDIDAS DE RESGUARDO</th>
                                </tr>
                                <tr>
                                  <th style="text-align:center">NO.</th>
                                  <th style="text-align:center">ID</th>
                                  <th style="text-align:center">FECHA</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php include("medidasresgmetas.php"); ?>
                              </tbody>
                             </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive">
                              <table id="asistenciametas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                    <th style="text-align:center" colspan="3">MEDIDAS DE ASISTENCIA</th>
                                  </tr>
                                  <tr>
                                    <th style="text-align:center">NO.</th>
                                    <th style="text-align:center">ID</th>
                                    <th style="text-align:center">FECHA</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php include("medidasasisgmetas.php"); ?>
                              </tbody>
                             </table>
                            </div>
                        </div>
                </div>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
  <div class="contenedor">
  </div>
</body>
</html>
