<?php
/*require 'conexion.php';*/
// error_reporting(0);
include("./conexion.php");
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
  <title>EXPEDIENTES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/main2.css">
  <!-- dataTables 1.12 -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/expediente.css">
<!-- SCRIPT PARA EL MANEJO DE LA TABLA -->
  <script type="text/javascript">
  $(document).ready(function() {
  $('#example').DataTable( {
      dom: 'Bfrtip',
      buttons: [
           'excel', 'pdf', 'print'
      ]
    } );
  } );
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
          <article>
            <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="../administrador/admin.php">REGISTROS</a>
              <a href="../administrador/estadistica.php">ESTADISTICA</a>
              <a class="actived">EXPEDIENTES</a>
            </div>
            <div class="container">
              <h2 style="text-align:center">EXPEDIENTES</h2>
              <div class="col-lg-12">
                  <div class="table-responsive">
                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <!-- <h3 style="text-align:center">Registros</h3> -->
                            <tr>
                                <th style="text-align:center">No.</th>
                                <th style="text-align:center">SUBDIRECCION</th>
                                <th style="text-align:center">ID ACTIVIDAD</th>
                                <th style="text-align:center">FUNCION</th>
                                <th style="text-align:center">UNIDAD DE MEDIDA</th>
                                <th style="text-align:center">ACTIVIDAD</th>
                                <th style="text-align:center">CLASIFICACION</th>
                                <th style="text-align:center">FECHA</th>
                                <th style="text-align:center">CANTIDAD</th>
                                <th style="text-align:center">ENTIDAD MUNICIPIO</th>
                                <th style="text-align:center">FOLIO EXPEDIENTE</th>
                                <th style="text-align:center">ID SUJETO</th>
                                <th style="text-align:center">KILOMETRAJE</th>
                                <th style="text-align:center">OBSERVACIONES</th>
                                <th style="text-align:center">EN CENTRO DE RESGUARDO</th>
                            </tr>
                        </thead>
                      <tbody>
                        <?php
                        $id = 0;
                        $reactbd = "SELECT * FROM react_actividad";
                        $rreactbd = $mysqli ->query ($reactbd);
                        while ($freactbd = $rreactbd->fetch_assoc()) {
                          $id = $id +1;
                          $idsub = $freactbd['id_subdireccion'];
                          // get name Subdirección
                          $getsub  ="SELECT * FROM react_subdireccion WHERE id = '$idsub'";
                          $rgetsub = $mysqli->query($getsub);
                          $fgetsub = $rgetsub ->fetch_assoc();
                          // get name actividad por subdireccion
                          ?>
                          <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $fgetsub['subdireccion']; ?></td>
                            <td><?php echo $freactbd['idactividad']; ?></td>
                            <td><?php echo mb_strtoupper (html_entity_decode($freactbd['funcion'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?></td>
                            <td><?php echo mb_strtoupper (html_entity_decode($freactbd['unidad_medida'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?></td>
                            <td>
                            <?php if ($idsub == 1) {
                              $idact_analisis = $freactbd['id_actividad'];
                              $actanalisis = "SELECT * FROM react_actividad_analisis WHERE id = '$idact_analisis'";
                              $ractanalisis = $mysqli ->query($actanalisis);
                              $factanalisis = $ractanalisis ->fetch_assoc();
                              echo mb_strtoupper (html_entity_decode($factanalisis['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8"));

                            }elseif ($idsub == 2) {
                              $idact_apoyo = $freactbd['id_actividad'];
                              $actapoyo = "SELECT * FROM react_actividad_apoyo WHERE id = '$idact_apoyo'";
                              $ractapoyo = $mysqli ->query($actapoyo);
                              $factapoyo = $ractapoyo ->fetch_assoc();
                              echo mb_strtoupper (html_entity_decode($factapoyo['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8"));
                            }
                            elseif ($idsub == 3) {
                              $idact_enlace = $freactbd['id_actividad'];
                              $actenlace = "SELECT * FROM react_actividad_enlace WHERE id = '$idact_enlace'";
                              $ractenlace = $mysqli ->query($actenlace);
                              $factenlace = $ractenlace ->fetch_assoc();
                              echo mb_strtoupper (html_entity_decode($factenlace['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8"));
                            }
                            elseif ($idsub == 4) {
                              $idact_ejecucion = $freactbd['id_actividad'];
                              $actejecucion = "SELECT * FROM react_actividad_ejecucion WHERE id = '$idact_ejecucion'";
                              $ractejecucion = $mysqli ->query($actejecucion);
                              $factejecucion = $ractejecucion ->fetch_assoc();
                              echo mb_strtoupper (html_entity_decode($factejecucion['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8"));
                            }
                            ?></td>
                            <td><?php echo mb_strtoupper (html_entity_decode($freactbd['clasificacion'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?></td>
                            <td><?php echo date("d/m/Y", strtotime($freactbd['fecha'])); ?></td>
                            <td><?php echo $freactbd['cantidad']; ?></td>
                            <td><?php echo $freactbd['entidad_municipio']; ?></td>
                            <td><?php echo $freactbd['folio_expediente']; ?></td>
                            <td><?php echo $freactbd['id_sujeto']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <?php
                        }
                        ?>
                      </tbody>
                     </table>
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
