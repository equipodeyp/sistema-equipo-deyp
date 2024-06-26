<?php
/*require 'conexion.php';*/
error_reporting(0);
include("../conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../../logout.php");
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
  <title>MEDIDAS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../../css/main2.css">
  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="../../datatables/datatables.min.css"/>
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet"  type="text/css" href="../../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
  <!--font awesome con CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- datatables JS -->
  <script type="text/javascript" src="../../datatables/datatables.min.js"></script>
  <!-- para usar botones en datatables JS -->
  <script src="../../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="../../datatables/JSZip-2.5.0/jszip.min.js"></script>
  <script src="../../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="../../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="../../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../../css/breadcrumb.css">
  <link rel="stylesheet" href="../../css/expediente.css">
<!-- SCRIPT PARA EL MANEJO DE LA TABLA -->
  <script type="text/javascript">
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
          responsive: "true",
          dom: 'Bfrtilp',
          buttons:[
        {
          extend:    'excelHtml5',
          text:      '<i class="fas fa-file-excel"></i> ',
          titleAttr: 'Exportar a Excel',
          className: 'btn btn-success'
        },
        {
          extend:    'pdfHtml5',
          text:      '<i class="fas fa-file-pdf"></i> ',
          titleAttr: 'Exportar a PDF',
          className: 'btn btn-danger'
        },
        {
          extend:    'print',
          text:      '<i class="fa fa-print"></i> ',
          titleAttr: 'Imprimir',
          className: 'btn btn-info'
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
          echo "<img src='../../image/mujerup.png' width='100' height='100'>";
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

              <!-- <li class="menu-items"><a  href="#" onclick="location.href='resumen_tickets_enproceso.php'"><i class="fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span> Incidencia</span></a></li>
              <li class="menu-items"><a  href="#" onclick="location.href='repo.php'"><i class="fa-solid fa-folder-plus menu-nav--icon fa-fw  "></i><span> Repositorio </span></a></li>
              <a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio"><i class='fas fa-file-pdf  menu-nav--icon fa-fw'></i><span class="menu-items"> Glosario</span></a>
              <a href="#"><i class='fa-solid fa-magnifying-glass  menu-nav--icon fa-fw'></i><span class="menu-items"> Busqueda</span></a>
              <li class="menu-items"><a href="../administrador/estadistica.php"><i class="fa-solid fa-chart-line menu-nav--icon fa-fw"></i><span class="menu-items"> ESTADISTICA</span></a></li> -->
          </ul>
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
            <a href="../../administrador/admin.php">REGISTROS</a>
            <a href="../../administrador/estadistica.php">ESTADISTICA</a>
            <a class="actived">MEDIDAS</a>
          </div>
          <div class="container">
            <h2 style="text-align:center">MEDIDAS</h2>
            <div class="">
                <div class="row">
                  <div class="">
                      <div class="row">
                              <div class="col-lg-12">
                                  <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No.</th>
                                            <th style="text-align:center">ID EXPEDIENTE</th>
                                            <th style="text-align:center">NOMBRE SUJETO PROTEGIDO</th>
                                            <th style="text-align:center">PATERNO SUJETO PROTEGIDO</th>
                                            <th style="text-align:center">MATERNO SUJETO PROTEGIDO</th>
                                            <th style="text-align:center">CALIDAD DE LA PERSONA</th>
                                            <th style="text-align:center">ID PERSONA/SUJETO</th>
                                            <!-- <th style="text-align:center">CONSECUTIVO MEDIDA</th> -->
                                            <th style="text-align:center">CATEGORIA MEDIDA</th>
                                            <th style="text-align:center">TIPO DE MEDIDA</th>
                                            <th style="text-align:center">CLASIFICACION DE LA MEDIDA</th>
                                            <th style="text-align:center">FRACCION DE LA MEDIDA</th>
                                            <th style="text-align:center">INCISO DE LA MEDIDA</th>
                                            <th style="text-align:center">ESPECIFICAR OTRAS MEDIDAS</th>
                                            <th style="text-align:center">FECHA DE INICIO DE LA MEDIDA</th>
                                            <th style="text-align:center">FECHA MEDIDA PROVISIONAL</th>
                                            <th style="text-align:center">FECHA MEDIDA DEFINITIVA</th>
                                            <th style="text-align:center">CONCLUSION CANCELACION MEDIDA</th>
                                            <th style="text-align:center">ART. 35 CONCLUSION DESINCORPORACION</th>
                                            <th style="text-align:center">ESPECIFICAR ART. 35</th>
                                            <th style="text-align:center">FECHA CONCLUSION DESINCORPORACION</th>
                                            <th style="text-align:center">ESTATUS DE LA MEDIDA</th>
                                            <th style="text-align:center">MUNICIPIO DE EJECUCION</th>
                                            <th style="text-align:center">FECHA DE EJECUCION</th>
                                            <th style="text-align:center">EDAD DEL SUJETO PROTEGIDO</th>
                                            <th style="text-align:center">SEXO DEL SUJETO PROTEGIDO</th>
                                            <th style="text-align:center">GRUPO DE EDAD DEL SUJETO PROTEGIDO</th>
                                            <th style="text-align:center">ESTATUS ACTUAL DEL SUJETO PROTEGIDO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $cont = 0;
                                      $tabla="SELECT * FROM medidas";
                                      $var_resultado = $mysqli->query($tabla);

                                      while ($var_fila=$var_resultado->fetch_array())
                                      {
                                        $cont = $cont + 1;
                                        $id_persona = $var_fila['id_persona'];
                                        $id_medida = $var_fila['id'];
                                        $p = "SELECT * FROM datospersonales WHERE id= '$id_persona'";
                                        $rp = $mysqli->query($p);
                                        $fp = $rp->fetch_assoc();
                                        $mm = "SELECT * FROM multidisciplinario_medidas WHERE id_medida = '$id_medida'";
                                        $rmm = $mysqli->query($mm);
                                        $fmm = $rmm->fetch_assoc();

                                        // multidisciplinario de la medida
                                            echo "<tr>";
                                            echo "<td style='text-align:center'>"; echo $cont; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila['folioexpediente']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $fp['nombrepersona']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $fp['paternopersona']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $fp['maternopersona']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $fp['calidadpersona']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $fp['identificador']; echo "</td>";
                                            // echo "<td style='text-align:center'>"; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila['categoria']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila['tipo']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila['clasificacion']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila['medida']; echo "</td>";
                                            echo "<td style='text-align:center'>"; if ($var_fila['medida'] === 'XIII. OTRAS MEDIDAS' || $var_fila['medida'] === 'VI. OTRAS') {
                                              echo ''; echo "</td>";
                                            }else {
                                              echo $var_fila['descripcion']; echo "</td>";
                                            }
                                            echo "<td style='text-align:center'>"; if ($var_fila['medida'] === 'XIII. OTRAS MEDIDAS' || $var_fila['medida'] === 'VI. OTRAS') {
                                              echo $var_fila['descripcion']; echo "</td>";
                                            }else {
                                              echo ''; echo "</td>";
                                            }
                                            echo "<td style='text-align:center'>";
                                            if ($var_fila['date_provisional'] == '0000-00-00') {
                                              echo date("d/m/Y", strtotime($var_fila['date_definitva']));
                                            }else {
                                              echo date("d/m/Y", strtotime($var_fila['date_provisional']));
                                            }
                                            echo "</td>";
                                            echo "<td style='text-align:center'>";
                                            if ($var_fila['date_provisional'] != '0000-00-00') {
                                              echo date("d/m/Y", strtotime($var_fila['date_provisional']));
                                            } echo "</td>";
                                            echo "<td style='text-align:center'>";
                                            if ($var_fila['date_definitva'] != '') {
                                              echo date("d/m/Y", strtotime($var_fila['date_definitva']));
                                            } echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $fmm['acuerdo']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $fmm['conclusionart35']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $fmm['otherart35']; echo "</td>";
                                            echo "<td style='text-align:center'>";
                                            if ($fmm['date_close'] !== '0000-00-00') {
                                              echo date("d/m/Y", strtotime($fmm['date_close']));
                                            }
                                             echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila['estatus']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila['ejecucion']; echo "</td>";
                                            echo "<td style='text-align:center'>";
                                            if ($var_fila['date_ejecucion'] != '0000-00-00') {
                                              echo date("d/m/Y", strtotime($var_fila['date_ejecucion']));
                                            } echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $fp['edadpersona']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $fp['sexopersona']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $fp['grupoedad']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $fp['estatus']; echo "</td>";
                                            echo "</tr>";
                                      }
                                    ?>
                                    </tbody>
                                   </table>
                                  </div>
                              </div>
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
    <!-- <a href="../docs/GLOSARIO-SIPPSIPPED.pdf" class="btn-flotante-glosario" download="GLOSARIO-SIPPSIPPED.pdf"><i class="fa fa-download"></i>GLOSARIO</a> -->
    <!-- <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a> -->
  </div>
</body>
</html>
