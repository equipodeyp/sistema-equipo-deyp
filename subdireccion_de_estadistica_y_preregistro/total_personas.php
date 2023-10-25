<?php
/*require 'conexion.php';*/
error_reporting(0);
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
  <title>SUJETOS</title>
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
          className: 'btn color-btn-export-xls'
        }
      ]
      });
  });
  </script>
  <style media="screen">
  .submenu {
    display: none;
  }
  .opacity {
    /* opacity: 100%; */
  }

  /*  */
  .submenu2 {
    display: none;
  }
  .opacity2 {
    /* opacity: 100%; */
  }
  /*  */

  .pagination {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border-radius: 4px;
}
.pagination > li {
  display: inline;
}
.pagination > li > a,
.pagination > li > span {
  position: relative;
  float: left;
  padding: 6px 12px;
  margin-left: -1px;
  line-height: 1.42857143;
  color: #63696D;
  text-decoration: none;
  background-color: #fff;
  border: 1px solid #ddd;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
  margin-left: 0;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
  z-index: 2;
  color: #63696D;
  background-color: #eee;
  border-color: #ddd;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  z-index: 3;
  color: #fff;
  cursor: default;
  background-color: #63696D;
  border-color: #5F6D6B;
}
.pagination > .disabled > span,
.pagination > .disabled > span:hover,
.pagination > .disabled > span:focus,
.pagination > .disabled > a,
.pagination > .disabled > a:hover,
.pagination > .disabled > a:focus {
  color: #777;
  cursor: not-allowed;
  background-color: #fff;
  border-color: #ddd;
}
.pagination-lg > li > a,
.pagination-lg > li > span {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
}
.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px;
}
.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
}
.pagination-sm > li > a,
.pagination-sm > li > span {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
}
.pagination-sm > li:first-child > a,
.pagination-sm > li:first-child > span {
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
.pagination-sm > li:last-child > a,
.pagination-sm > li:last-child > span {
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px;
}

a:hover,
a:focus {
  color: #FFFFFF;
  text-decoration: underline;
}
  </style>
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
      <nav class="menu-nav">
        <ul>
          <!-- <li><a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio"><i class='fas fa-file-pdf  menu-nav--icon fa-fw'></i><span class="menu-items"style="color: white; font-weight:bold;" >GLOSARIO</span></a></li> -->
          <li id="liestadistica" class="subtitle">
      			<a href="#" class="action"><i class='color-icon fa-solid fa-chart-line menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white; font-weight:bold;"> ESTADISTICA</span></a>
      			<ul class="submenu">
              <li id="liexpediente" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/total_expedientes.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-folder-open  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white; font-weight:bold;"> EXPEDIENTES</span></a></li>
              <li id="lipersonas" class="menu-items"><a >&nbsp;&nbsp;&nbsp;<i class="color-icon fa-solid fa-users menu-nav--icon fa-fw"></i><span class="menu-items" style="color: white; font-weight:bold;"> SUJETOS</span></a></li>
              <li id="limedidas" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/total_medidas.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-person-circle-plus menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white; font-weight:bold;"> MEDIDAS</span></a></li>
              <li id="limedidas" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/alojamiento_temporal.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-house-lock menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white; font-weight:bold;"> ALOJAMIENTO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TEMPORAL</span></a></li>
              <li id="liestadistica2" class="subtitle2">
                <a href="#" class="action2">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-sharp fa-solid fa-circle-right menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white; font-weight:bold;"> SEGUIMIENTO</span></a>
                <ul class="submenu2">
                  <!-- <li id="liexpediente" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/total_expedientes.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-folder-open  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> EXPEDIENTES</span></a></li> -->
                  <li id="limedidas" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/evaluacion_expediente.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='color-icon fa-sharp fa-solid fa-file-export menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> EVALUACIÓN <br />  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; EXPEDIENTES</span></a></li>
                  <!-- <li id="lipersonas" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/total_personas.php">&nbsp;&nbsp;&nbsp;<i class="color-icon fa-solid fa-users menu-nav--icon fa-fw"></i><span class="menu-items" style="color: white;"> SUJETOS</span></a></li> -->
                  <li id="limedidas" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/evaluacion_personas.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-person-walking-dashed-line-arrow-right menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> EVALUACIÓN <br />  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SUJETOS</span></a></li>
                  <!-- <li id="limedidas" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/total_medidas.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-person-circle-plus  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> MEDIDAS</span></a></li> -->
                </ul>
              </li>
      			</ul>
      		</li>
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
        <!--Ejemplo tabla con DataTables-->
      </div>
      <div class="container">
        <article class="">
          <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="../subdireccion_de_estadistica_y_preregistro/menu.php">REGISTROS</a>
            <a class="actived">SUJETOS</a>
          </div>
          <div class="container">
            <h2 style="text-align:center">PERSONAS</h2>
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
                                        <th style="text-align:center">NOMBRE SERVIDOR</th>
                                        <th style="text-align:center">PATERNO SERVIDOR</th>
                                        <th style="text-align:center">MATERNO SERVIDOR</th>
                                        <th style="text-align:center">CARGO SERVIDOR</th>
                                        <th style="text-align:center">NOMBRE PERSONA</th>
                                        <th style="text-align:center">PATERNO PERSONA</th>
                                        <th style="text-align:center">MATERNO PERSONA</th>
                                        <th style="text-align:center">FECHA NACIEMIENTO PERSONA</th>
                                        <th style="text-align:center">EDAD PERSONA</th>
                                        <th style="text-align:center">GRUPO EDAD</th>
                                        <th style="text-align:center">CALIDAD PERSONA</th>
                                        <th style="text-align:center">SEXO PERSONA</th>
                                        <th style="text-align:center">ENTIDAD NACIMIENTO PERSONA</th>
                                        <th style="text-align:center">MUNICIPIO NACIMIENTO PERSONA</th>
                                        <th style="text-align:center">NACIONALIDAD PERSONA</th>
                                        <th style="text-align:center">CURP</th>
                                        <th style="text-align:center">RFC PERSONA</th>
                                        <th style="text-align:center">ALIAS PERSONA</th>
                                        <th style="text-align:center">OCUPACION PERSONA</th>
                                        <th style="text-align:center">TELEFONO FIJO</th>
                                        <th style="text-align:center">TELEFONO CELULAR</th>
                                        <th style="text-align:center">CALLE DOMICILIO PERSONA</th>
                                        <th style="text-align:center">COLONIA DOMICILIO PERSONA</th>
                                        <th style="text-align:center">LOCALIDAD DOMICILIO PERSONA</th>
                                        <th style="text-align:center">MUNICIPIO DOMICILIO PERSONA</th>
                                        <th style="text-align:center">CP DOMICILIO PERSONA</th>
                                        <th style="text-align:center">MENOR DE EDAD O PERSONA EN SITUACION DE DISCAPACIDAD</th>
                                        <th style="text-align:center">TUTOR NOMBRE</th>
                                        <th style="text-align:center">TUTOR PATERNO</th>
                                        <th style="text-align:center">TUTOR MATERNO</th>
                                        <th style="text-align:center">DELITO PRINCIPAL</th>
                                        <th style="text-align:center">OTRO DELITO PRINCIPAL</th>
                                        <th style="text-align:center">DELITO SECUNDARIO</th>
                                        <th style="text-align:center">OTRO DELITO SECUNDARIO</th>
                                        <th style="text-align:center">ETAPA PRCEDIMIENTO</th>
                                        <th style="text-align:center">NUC</th>
                                        <th style="text-align:center">MUNICIPIO RADICACION</th>
                                        <!-- <th style="text-align:center">IMAGEN PERSONA</th> -->
                                        <th style="text-align:center">IDENTIFICADOR EXPEDIENTE</th>
                                        <th style="text-align:center">RESULTADO VALORACION JURIDICA</th>
                                        <th style="text-align:center">MOTIVO NO PROCEDENCUA JURIDICA</th>
                                        <th style="text-align:center">ANALISIS MULTIDISCIPLINARIO</th>
                                        <th style="text-align:center">PROCEDENCIA DE LA INCORPORACION</th>
                                        <!-- <th style="text-align:center">ID PERSONA SUJETO</th> -->
                                        <th style="text-align:center">FECHA AUTORIZACION ANALISIS</th>
                                        <th style="text-align:center">ID AUTORIZACION ANALISIS</th>
                                        <th style="text-align:center">CONVENIO DE ENTENDIMIENTO</th>
                                        <th style="text-align:center">FECHA FIRMA DEL CONVENIO</th>
                                        <th style="text-align:center">FECHA INICIO</th>
                                        <th style="text-align:center">VIGENCIA</th>
                                        <th style="text-align:center">FECHA TERMINO</th>
                                        <th style="text-align:center">ID CONVENIO ENTENDIMIENTO</th>
                                        <!-- INICIO DE ESTUDIOS TECNICOS -->
                                        <?php
                                        // $est = "SELECT id_unico, COUNT(id_unico) AS t
                                        //   FROM  evaluacion_persona
                                        //   GROUP BY id_unico
                                        //   ORDER BY t DESC
                                        //   LIMIT 1";
                                        // $rest = $mysqli->query($est);
                                        // $fest = $rest->fetch_assoc();
                                        // $iterac = $fest['t'].'<br />';
                                        // for ($i=2; $i < $fest['t']+2; $i++) {
                                        //   echo '<th style="text-align:center">'; echo "ANALISIS MULTIDISCIPLINARIO ". $i; echo '</th>';
                                        //   echo '<th style="text-align:center">'; echo "FECHA AUTORIZACION ANALISIS"; echo '</th>';
                                        //   echo '<th style="text-align:center">'; echo "ID ANALISIS"; echo '</th>';
                                        //   echo '<th style="text-align:center">'; echo "TIPO DE CONVENIO"; echo '</th>';
                                        //   echo '<th style="text-align:center">'; echo "FECHA FIRMA"; echo '</th>';
                                        //   echo '<th style="text-align:center">'; echo "FECHA INICIO"; echo '</th>';
                                        //   echo '<th style="text-align:center">'; echo "VIGENCIA"; echo '</th>';
                                        //   echo '<th style="text-align:center">'; echo "FECHA TERMINO"; echo '</th>';
                                        //   echo '<th style="text-align:center">'; echo "ID CONVENIO"; echo '</th>';
                                        // }
                                        ?>
                                        <th style="text-align:center">TERMINACION</th>
                                        <th style="text-align:center">CONCLUSION ARTICULO 35</th>
                                        <th style="text-align:center">ESPECIFICAR ARTICULO 35</th>
                                        <th style="text-align:center">FECHA DESINCORPORACION</th>
                                        <th style="text-align:center">ESTATUS SUJETO PROGRAMA</th>
                                        <th style="text-align:center">RELACIONADO</th>
                                        <th style="text-align:center">ESTATUS DENTRO DEL PROGRAMA</th>
                                        <th style="text-align:center">RE-INGRESO</th>
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
                                    echo "<td style='text-align:center'>"; echo $faut['nombreservidor']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $faut['apellidopaterno']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $faut['apellidomaterno']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $faut['cargoservidor']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['nombrepersona']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['paternopersona']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['maternopersona']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($fsuj['fechanacimientopersona'])); echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['edadpersona']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['grupoedad']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['calidadpersona']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['sexopersona']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fnac['lugardenacimiento']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fnac['municipiodenacimiento']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fnac['nacionalidadpersona']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['curppersona']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['rfcpersona']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['aliaspersona']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['ocupacion']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['telefonofijo']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['telefonocelular']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fdom['calle']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fdom['seleccionelocalidad']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fdom['seleccionelocalidad']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fdom['seleccionemunicipio']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fdom['cp']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['incapaz']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $finc['nombre']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $finc['apellidopaterno']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $finc['apellidomaterno']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fprocc['delitoprincipal']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fprocc['otrodelitoprincipal']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fprocc['delitosecundario']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fprocc['otrodelitosecundario']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fprocc['etapaprocedimiento']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fprocc['nuc']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fprocc['numeroradicacion']; echo "</td>";
                                    // echo "<td style='text-align:center'>";  echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fsuj['identificador']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fvalj['resultadovaloracion']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fvalj['motivoprocedencia']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fdeti['multidisciplinario']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $fdeti['incorporacion']; echo "</td>";
                                    // echo "<td style='text-align:center'>";  echo "</td>";
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
                                        // echo "<td style='text-align:center' bgcolor='yellow'>"; echo $ft['analisis'];  echo "</td>";
                                        // echo "<td style='text-align:center'>";
                                        // if ($ft['fecha_aut'] != '0000-00-00') {
                                        //   echo date("d/m/Y", strtotime($ft['fecha_aut']));
                                        // } echo "</td>";
                                        // echo "<td style='text-align:center'>"; echo $ft['id_analisis']; echo "</td>";
                                        // echo "<td style='text-align:center'>"; echo $ft['tipo_convenio']; echo "</td>";
                                        // echo "<td style='text-align:center'>";
                                        // if ($ft['fecha_firma'] != '0000-00-00') {
                                        //   echo date("d/m/Y", strtotime($ft['fecha_firma']));
                                        // } echo "</td>";
                                        // echo "<td style='text-align:center'>";
                                        // if ($ft['fecha_inicio'] != '0000-00-00') {
                                        //   echo date("d/m/Y", strtotime($ft['fecha_inicio']));
                                        // } echo "</td>";
                                        // echo "<td style='text-align:center'>"; echo $ft['vigencia']; echo "</td>";
                                        // echo "<td style='text-align:center'>";
                                        // if ($ft['fecha_vigencia'] != '0000-00-00') {
                                        //   echo date("d/m/Y", strtotime($ft['fecha_vigencia']));
                                        // } echo "</td>";
                                        // echo "<td style='text-align:center'>"; echo $ft['id_convenio']; echo "</td>";
                                      }
                                      // for ($i=$fv['t']+1; $i < $iterac; $i++) {
                                      //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                                      //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                                      //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                                      //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                                      //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                                      //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                                      //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                                      //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                                      //   echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                                      // }
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
                                    echo "</tr>";
                                    // echo "<td style='text-align:center'>";  echo "</td>";
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
    <!-- <a href="../docs/GLOSARIO-SIPPSIPPED.pdf" class="btn-flotante-glosario" download="GLOSARIO-SIPPSIPPED.pdf"><i class="fa fa-download"></i>GLOSARIO</a> -->
    <!-- <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a> -->
  </div>
  <script type="text/javascript">
  // CODIGO DE MENU CON submenu
  $(".subtitle .action").click(function(event){
   var subtitle = $(this).parents(".subtitle");
   var submenu = $(subtitle).find(".submenu");

   $(".submenu").not($(submenu)).slideUp("slow").removeClass("opacity");
   $(".open").not($(subtitle)).removeClass("open");

   $(subtitle).toggleClass("open");
   $(submenu).slideToggle("slow").toggleClass("opacity");

   return false;
  });
  //
  // CODIGO DE MENU CON submenu2
  $(".subtitle2 .action2").click(function(event){
   var subtitle2 = $(this).parents(".subtitle2");
   var submenu2 = $(subtitle2).find(".submenu2");

   $(".submenu2").not($(submenu2)).slideUp("slow").removeClass("opacity");
   $(".open").not($(subtitle2)).removeClass("open");

   $(subtitle2).toggleClass("open");
   $(submenu2).slideToggle("slow").toggleClass("opacity");

   return false;
  });
  //
  </script>
</body>
</html>
