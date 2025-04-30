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
          className: 'btn btn-success',
          title:     'INFORME SUJETOS'
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
            <a class="actived">INFORME SUJETOS</a>
          </div>
          <div class="container">
            <h2 style="text-align:center">INFORME SUJETOS</h2>
            <div class="">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">

                              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                    <th style="text-align:center">NO.</th>
                                    <th style="text-align:center">EXPEDIENTE</th>
                                    <th style="text-align:center">FECHA DE RECEPCION EXPEDIENTE</th>
                                    <th style="text-align:center">NOMBRE AUTORIDAD</th>
                                    <th style="text-align:center">CALIDAD PERSONA</th>
                                    <th style="text-align:center">SEXO PERSONA</th>
                                    <th style="text-align:center">IDENTIFICADOR SUJETO</th>
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
                                $infsuj = "SELECT * FROM datospersonales
                                                    WHERE estatus = 'SUJETO PROTEGIDO' OR estatus = 'PERSONA PROPUESTA'";
                                $finfsuj = $mysqli->query($infsuj);
                                while ($rinfsuj = $finfsuj-> fetch_assoc()) {
                                  $contador = $contador + 1;
                                  // varialbes de consulta
                                  $folexp = $rinfsuj['folioexpediente'];
                                  $idsuj = $rinfsuj['id'];
                                  // consulta a tabla de expedientes
                                  $datexp = "SELECT * FROM expediente WHERE fol_exp = '$folexp'";
                                  $fdatexp = $mysqli->query($datexp);
                                  $rdatexp = $fdatexp->fetch_assoc();
                                  // consulta a tabla de autoridad
                                  $dataut = "SELECT * FROM autoridad WHERE id_persona = '$idsuj'";
                                  $fdataut = $mysqli -> query ($dataut);
                                  $rdataut = $fdataut ->fetch_assoc();
                                  // consulta para verificar si esta alojado en un centro de proteccion
                                  $checkalojamiento = "SELECT COUNT(*) as t FROM  medidas
                                                                            WHERE id_persona = '$idsuj' AND medida= 'VIII. ALOJAMIENTO TEMPORAL' AND estatus != 'CANCELADA'";
                                  $rcheckalojamiento = $mysqli->query($checkalojamiento);
                                  $fcheckalojamiento = $rcheckalojamiento->fetch_assoc();
                                  if ($fcheckalojamiento['t'] > 0) {
                                    $alojamiento_suj = 'SI';
                                  }else {
                                    $alojamiento_suj = 'NO';
                                  }
                                  //
                                  echo "<tr>";
                                  echo "<td style='text-align:center'>"; echo $contador; echo "</td>";
                                  echo "<td style='text-align:center'>"; echo $rinfsuj['folioexpediente']; echo "</td>";
                                  echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($rdatexp['fecha_nueva'])); echo "</td>";
                                  echo "<td style='text-align:center'>"; echo $rdataut['nombreautoridad']; echo "</td>";
                                  echo "<td style='text-align:center'>"; echo $rinfsuj['calidadpersona']; echo "</td>";
                                  echo "<td style='text-align:center'>"; echo $rinfsuj['sexopersona']; echo "</td>";
                                  echo "<td style='text-align:center'>"; echo $rinfsuj['identificador']; echo "</td>";
                                  echo "<td style='text-align:center'>"; echo $rinfsuj['estatus']; echo "</td>";
                                  echo "<td style='text-align:center'>"; echo $rinfsuj['relacional']; echo "</td>";
                                  echo "<td style='text-align:center'>"; echo $rinfsuj['estatus']; echo "</td>";
                                  echo "<td style='text-align:center'>"; echo $rinfsuj['reingreso']; echo "</td>";
                                  echo "<td style='text-align:center'>"; echo $alojamiento_suj; echo "</td>";
                                  echo "<td style='text-align:center'>"; echo $rinfsuj['edadpersona']; echo "</td>";
                                  echo "<td style='text-align:center'>";
                                  $fecha_nacimiento = new DateTime($rinfsuj['fechanacimientopersona']);
                                  $hoy = new DateTime();
                                  $edad = $hoy->diff($fecha_nacimiento);
                                  if ($edad->y >= 0 && $edad->y <= 11) {
                                    $edadgruposujeto =  'NIÑAS Y NIÑOS';
                                  }elseif ($edad->y >= 12 && $edad->y < 18) {
                                    $edadgruposujeto =  'ADOLESCENTES';
                                  }elseif ($edad->y >= 18 && $edad->y <= 59) {
                                    $edadgruposujeto =  'ADULTOS JÓVENES';
                                  }elseif ($edad->y >= 60) {
                                    $edadgruposujeto =  'ADULTOS MAYORES';
                                  }
                                  echo $edadgruposujeto;
                                  echo "</td>";
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
