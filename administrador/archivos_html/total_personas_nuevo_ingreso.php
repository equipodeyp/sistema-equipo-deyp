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
  <title>SUJETOS</title>
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
            <a class="actived">SUJETOS</a>
          </div>
          <div class="container">
            <h2 style="text-align:center">BDD PERSONAS ESTADISTICA</h2>
            <div class="">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">

                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                  <thead>
                                      <tr>
                                          <th style="text-align:center">No.</th>
                                          <th style="text-align:center">EXPEDIENTE</th>
                                          <th style="text-align:center">SEDE</th>
                                          <th style="text-align:center">FECHA RECEPCION EXPEDIENTE</th>
                                          <th style="text-align:center">FECHA RECEPCION PERSONA</th>
                                          <th style="text-align:center">ID SOLICITUD</th>
                                          <th style="text-align:center">FECHA SOLICITUD</th>
                                          <th style="text-align:center">NOMBRE AUTORIDAD</th>
                                          <th style="text-align:center">NOMBRE PERSONA</th>
                                          <th style="text-align:center">PATERNO PERSONA</th>
                                          <th style="text-align:center">MATERNO PERSONA</th>
                                          <th style="text-align:center">GRUPO EDAD</th>
                                          <th style="text-align:center">CALIDAD PERSONA</th>
                                          <th style="text-align:center">SEXO PERSONA</th>
                                          <th style="text-align:center">DELITO PRINCIPAL</th>
                                          <th style="text-align:center">OTRO DELITO PRINCIPAL</th>
                                          <th style="text-align:center">DELITO SECUNDARIO</th>
                                          <th style="text-align:center">OTRO DELITO SECUNDARIO</th>
                                          <th style="text-align:center">ETAPA PRCEDIMIENTO</th>
                                          <th style="text-align:center">MUNICIPIO RADICACION</th>
                                          <th style="text-align:center">IDENTIFICADOR EXPEDIENTE</th>
                                          <th style="text-align:center">RESULTADO VALORACION JURIDICA</th>
                                          <th style="text-align:center">MOTIVO NO PROCEDENCUA JURIDICA</th>
                                          <th style="text-align:center">ANALISIS MULTIDISCIPLINARIO</th>
                                          <th style="text-align:center">PROCEDENCIA DE LA INCORPORACION</th>
                                          <th style="text-align:center">FECHA AUTORIZACION ANALISIS</th>
                                          <th style="text-align:center">ID AUTORIZACION ANALISIS</th>
                                          <th style="text-align:center">CONVENIO DE ENTENDIMIENTO</th>
                                          <th style="text-align:center">FECHA FIRMA DEL CONVENIO</th>
                                          <th style="text-align:center">FECHA INICIO</th>
                                          <th style="text-align:center">VIGENCIA</th>
                                          <th style="text-align:center">FECHA TERMINO</th>
                                          <th style="text-align:center">ID CONVENIO ENTENDIMIENTO</th>
                                          <th style="text-align:center">TERMINACION</th>
                                          <th style="text-align:center">CONCLUSION ARTICULO 35</th>
                                          <th style="text-align:center">ESPECIFICAR ARTICULO 35</th>
                                          <th style="text-align:center">FECHA DESINCORPORACION</th>
                                          <th style="text-align:center">ESTATUS SUJETO PROGRAMA</th>
                                          <th style="text-align:center">RELACIONADO</th>
                                          <th style="text-align:center">ESTATUS DENTRO DEL PROGRAMA</th>
                                          <th style="text-align:center">RE-INGRESO</th>
                                          <th style="text-align:center">EN CENTRO DE RESGUARDO</th>
                                          <th style="text-align:center">EDAD</th>
                                          <th style="text-align:center">GRUPO DE EDAD</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $contador = 0;
                                    $suj = "SELECT * FROM datospersonales";
                                    $rsuj = $mysqli->query($suj);
                                    while ($fsuj = $rsuj->fetch_assoc()) {
                                      $expediente = $fsuj['folioexpediente'];
                                      $id_persona = $fsuj['id'];
                                      $ident_per = $fsuj['identificador'];
                                      // datos del EXPEDIENTE
                                      $proc = "SELECT * FROM expediente
                                               WHERE fol_exp = '$expediente'";
                                      $rproc = $mysqli->query($proc);
                                      $fproc = $rproc->fetch_assoc();
                                      // datos de la autoridad correspondiente
                                      $aut = "SELECT * FROM autoridad
                                              WHERE id_persona = '$id_persona'";
                                      $raut = $mysqli->query($aut);
                                      $faut = $raut->fetch_assoc();
                                      // datos del lugar de nacimiento
                                      $nac = "SELECT * FROM datosorigen
                                              WHERE id_persona = '$id_persona'";
                                      $rnac = $mysqli->query($nac);
                                      $fnac = $rnac->fetch_assoc();
                                      // domicilio actual
                                      $dom = "SELECT * FROM domiciliopersona
                                              WHERE id_persona = '$id_persona'";
                                      $rdom = $mysqli->query($dom);
                                      $fdom = $rdom->fetch_assoc();
                                      //si es incapaz mostrar informacion del tutor
                                      $inc = "SELECT * FROM tutor
                                              WHERE id_persona = '$id_persona'";
                                      $rinc = $mysqli->query($inc);
                                      $finc = $rinc->fetch_assoc();
                                      // proceso penal
                                      $procc = "SELECT * FROM procesopenal
                                              WHERE id_persona = '$id_persona'";
                                      $rprocc = $mysqli->query($procc);
                                      $fprocc = $rprocc->fetch_assoc();
                                      //valoracion juridica
                                      $valj = "SELECT * FROM valoracionjuridica
                                              WHERE id_persona = '$id_persona'";
                                      $rvalj = $mysqli->query($valj);
                                      $fvalj = $rvalj->fetch_assoc();
                                      //determinacion de la incorporacion
                                      $deti = "SELECT * FROM determinacionincorporacion
                                              WHERE id_persona = '$id_persona'";
                                      $rdeti = $mysqli->query($deti);
                                      $fdeti = $rdeti->fetch_assoc();
                                      //conteo de evaluacion individual
                                      $v = "SELECT COUNT(*) as t
                                      FROM  evaluacion_persona
                                      WHERE id_unico = '$ident_per'";
                                      $rv = $mysqli->query($v);
                                      $fv = $rv->fetch_assoc();
                                      // echo $fv['t'];
                                      //
                                      $contador = $contador + 1;
                                      echo "<tr>";
                                      echo "<td style='text-align:center'>"; echo $contador; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fsuj['folioexpediente']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fproc['sede']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($fproc['fecha_nueva'])); echo "</td>";
                                      echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($faut['fechasolicitud_persona'])); echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $faut['idsolicitud']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($faut['fechasolicitud'])); echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $faut['nombreautoridad']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fsuj['nombrepersona']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fsuj['paternopersona']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fsuj['maternopersona']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fsuj['grupoedad']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fsuj['calidadpersona']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fsuj['sexopersona']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fprocc['delitoprincipal']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fprocc['otrodelitoprincipal']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fprocc['delitosecundario']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fprocc['otrodelitosecundario']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fprocc['etapaprocedimiento']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fprocc['numeroradicacion']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fsuj['identificador']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fvalj['resultadovaloracion']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fvalj['motivoprocedencia']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fdeti['multidisciplinario']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fdeti['incorporacion']; echo "</td>";
                                      echo "<td style='text-align:center'>";
                                      if ($fdeti['date_autorizacion'] != '0000-00-00') {
                                        echo date("d/m/Y", strtotime($fdeti['date_autorizacion']));
                                      } echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fdeti['id_analisis']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fdeti['convenio']; echo "</td>";
                                      echo "<td style='text-align:center'>";
                                      if ($fdeti['date_convenio'] != '0000-00-00') {
                                        echo date("d/m/Y", strtotime($fdeti['date_convenio']));
                                      } echo "</td>";
                                      echo "<td style='text-align:center'>";
                                      if ($fdeti['fecha_inicio'] != '0000-00-00') {
                                        echo date("d/m/Y", strtotime($fdeti['fecha_inicio']));
                                      } echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fdeti['vigencia']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fdeti['fecha_termino']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fdeti['id_convenio']; echo "</td>";
                                      if ($fv) {
                                        $t = "SELECT * FROM evaluacion_persona
                                        WHERE id_unico = '$ident_per'";
                                        $rt = $mysqli->query($t);
                                        while ($ft = $rt->fetch_assoc()) {

                                        }

                                      }
                                      echo "<td style='text-align:center'>"; echo $fdeti['conclu_cancel']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fdeti['conclusionart35']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fdeti['otroart35']; echo "</td>";
                                      echo "<td style='text-align:center'>"; if ($fdeti['date_desincorporacion'] != '0000-00-00') {
                                        echo date("d/m/Y", strtotime($fdeti['date_desincorporacion']));
                                      } echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fsuj['estatus']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fsuj['relacional']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fsuj['estatusprograma']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $fsuj['reingreso']; echo "</td>";
                                      $checkalojamiento = "SELECT COUNT(*) as t FROM  medidas
                                                                                WHERE id_persona = '$id_persona' AND medida= 'VIII. ALOJAMIENTO TEMPORAL' AND estatus != 'CANCELADA'";
                                      $rcheckalojamiento = $mysqli->query($checkalojamiento);
                                      $fcheckalojamiento = $rcheckalojamiento->fetch_assoc();
                                      if ($fcheckalojamiento['t'] > 0) {
                                        $alojamiento_suj = 'SI';
                                      }else {
                                        $alojamiento_suj = 'NO';
                                      }
                                      echo "<td style='text-align:center'>"; echo $alojamiento_suj; echo "</td>";
                                      $fecha_nacimiento = new DateTime($fsuj['fechanacimientopersona']);
                                      $hoy = new DateTime();
                                      $edad = $hoy->diff($fecha_nacimiento);
                                      echo "<td style='text-align:center'>"; echo $edad->y.' años'; echo "</td>";
                                      if ($edad->y >= 0 && $edad->y <= 11) {
                                        $edadgruposujeto =  'NIÑAS Y NIÑOS';
                                      }elseif ($edad->y >= 12 && $edad->y < 18) {
                                        $edadgruposujeto =  'ADOLESCENTES';
                                      }elseif ($edad->y >= 18 && $edad->y <= 59) {
                                        $edadgruposujeto =  'ADULTOS JÓVENES';
                                      }elseif ($edad->y >= 60) {
                                        $edadgruposujeto =  'ADULTOS MAYORES';
                                      }
                                      echo "<td style='text-align:center'>"; echo $edadgruposujeto; echo "</td>";
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

        </article>

      </div>

    </div>
  </div>
  <div class="contenedor">
  </div>
</body>
</html>
