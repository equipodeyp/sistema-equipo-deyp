<?php
error_reporting(0);
date_default_timezone_set("America/Mexico_City");
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
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/main2.css">
  <!--font awesome local-->
  <link rel="stylesheet" href="../css/fontawesome/css/all.css">
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/bootstrap5-3-8.min.css">
  <script src="../js/bootstrap5-3-8.bundle.min.js"></script>
  <script src="../js/popper5-3-8.min.js"></script>
  <script src="../js/bootstrap5-3-8.min.js"></script>
  <!--  -->
  <link rel="stylesheet" type="text/css" href="../css/toast.css"/>
  <link rel="stylesheet" href="../css/button_notification.css" type="text/css">
  <link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.3.7/b-3.2.6/b-html5-3.2.6/datatables.min.css" rel="stylesheet" integrity="sha384-zxBc2Gq4cHjveiM/HCfF2K+hESBu0cevO1quMBKTTb7JSFezPn/Rsn11iV1AKbPU" crossorigin="anonymous">

<script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.3.7/b-3.2.6/b-html5-3.2.6/datatables.min.js" integrity="sha384-su0ggAjemkLelaikLBKhyUmOAGA8UTqF6eP0mJ0do5m5PGwSA0xCdMRiANIDWQCO" crossorigin="anonymous"></script>
  <link href="../datatables/datatables.min.css" rel="stylesheet">
  <script src="../datatables/datatables.min.js"></script>
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
          echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
        }
         ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">

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
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
          </b></h1>
          <h5 style="text-align:center">
            <b><?php echo utf8_decode(strtoupper($row['area'])); ?></b>
          </h5>
        </div>
        <!--Ejemplo tabla con DataTables-->
        <br><br>
        <div class="container" style="display: flex; justify-content: center;">
          <div class="row mt-8">
            <form class="d-flex" style="width: 800px;">
              <form action="" method="GET">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="" class="form-label"><b> Del dia</b></label>
                    <input type="date" name="star" id="starfech" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-1">
                  <!-- div para dejar espacio entre inputs -->
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="" class="form-label"><b>Hasta el dia</b> </label>
                    <input type="date" name="fin" id="finfech" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-1">
                  <!-- div para dejar espacio entre inputs -->
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="" class="form-label"><b>BUSCAR</b></label><br>
                    <button type="submit" id="ocultar-mostrar" class="btn btn-primary" name="enviar"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </div>
                </div>
                <br>
              </form>
            </form>
          </div>
        </div>
        <?php
        $conexion=mysqli_connect("localhost","root","","sistemafgjem");
        $where="";
        if(isset($_GET['enviar'])){
          $fechainicial = date("Y-m-d", strtotime($_GET['star']));
          $fechafin  = date("Y-m-d", strtotime($_GET['fin']));
          if (isset($_GET['star'])) {
            $where="WHERE medidas.date_ejecucion BETWEEN '$fechainicial' AND '$fechafin' AND react_actividad.id_subdireccion = 4 AND react_actividad.id_actividad = 6";
            $mostrar = 1;
          }
        }
        if ($mostrar == 1) {
          $auxsum = 0;
          $getrondin = "SELECT COUNT(*) AS total FROM medidas
          WHERE medidas.date_ejecucion BETWEEN '$fechainicial' AND '$fechafin'
          ORDER BY medidas.date_ejecucion ASC";
          $rgetrondin = $mysqli->query($getrondin);
          while ($fgetrondin = $rgetrondin->fetch_assoc()) {
            $auxsum = $auxsum +1;
            echo $totalres = $fgetrondin['total'];
            if ($totalres > 0) {
              echo "con datos";
              echo "<br>";
              function transformarmesaletra($pasardia, $pasarmes, $pasaranio){
                switch ($pasarmes) {
                  case 1:
                  echo $fecha_formateada = $pasardia." DE ENERO DE ".$pasaranio;
                  break;
                  case 2:
                  echo $fecha_formateada = $pasardia." DE FEBRERO DE ".$pasaranio;
                  break;
                  case 3:
                  echo $fecha_formateada = $pasardia." DE MARZO DE ".$pasaranio;
                  break;
                  case 4:
                  echo $fecha_formateada = $pasardia." DE ABRIL DE ".$pasaranio;
                  break;
                  case 5:
                  echo $fecha_formateada = $pasardia." DE MAYO DE ".$pasaranio;
                  break;
                  case 6:
                  echo $fecha_formateada = $pasardia." DE JUNIO DE ".$pasaranio;
                  break;
                  case 7:
                  echo $fecha_formateada = $pasardia." DE JULIO DE ".$pasaranio;
                  break;
                  case 8:
                  echo $fecha_formateada = $pasardia." DE AGOSTO DE ".$pasaranio;
                  break;
                  case 9:
                  echo $fecha_formateada = $pasardia." DE SEPTIEMBRE DE ".$pasaranio;
                  break;
                  case 10:
                  echo $fecha_formateada = $pasardia." DE OCTUBRE DE ".$pasaranio;
                  break;
                  case 11:
                  echo $fecha_formateada = $pasardia." DE NOVIEMBRE DE ".$pasaranio;
                  break;
                  case 12:
                  echo $fecha_formateada = $pasardia." DE DICIEMBRE DE ".$pasaranio;
                  break;
                }
              }
              // $fechainicial;
              $diainicial = date('d', strtotime($fechainicial));
              $mesnumeroinicial = date('m', strtotime($fechainicial));
              $anioinicial = date('Y', strtotime($fechainicial));
              // transformarmesaletra($diainicial, $mesnumeroinicial, $anioinicial);
              // $fechafin;
              $diafinal = date('d', strtotime($fechafin));
              $mesnumerofinal = date('m', strtotime($fechafin));
              $aniofinal = date('Y', strtotime($fechafin));
              include("contardatemedidas.php");
              ?>
              <b>
                <div class="" id="showafterconsul">
                  <div id="contenedorBoton" class="mb-3"></div>
                  <div class="container well form-horizontal" style="text-align:center;padding:10px;border:solid 3px; width:98%;border-radius:20px;shadow; float:left;width: 100%;outline: white solid thin">
                    <div class="table-responsive">
                      <table id="tabla1" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                          <h1> <b>PERIODO DE CONSULTA DE LA INFORMACIÓN</b> </h1><br>
                          <h3> <b>DEL <?php transformarmesaletra($diainicial, $mesnumeroinicial, $anioinicial); ?> AL <?php transformarmesaletra($diafinal, $mesnumerofinal, $aniofinal); ?></b> </h3>
                          <tr>
                            <th class="table-header" style="text-align:center; color: white; border: 1px solid black;">MEDIDAS</th>
                            <th class="table-header" style="text-align:center; color: white; border: 1px solid black;">EJECUTADAS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="text-align:center;">ASISTENCIA</td>
                            <td><?php echo $fmed_asistencia['total']; ?></td>
                          </tr>
                          <tr>
                            <td style="text-align:center;">RESGUARDO</td>
                            <td><?php echo $fmed_resguardo['total']; ?></td>
                          </tr>
                          <tr>
                            <td style="text-align:right;">TOTAL</td>
                            <td><?php echo $fmed_total['total']; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="row g-4">
                      <!-- Primer Div (Columna) -->
                      <div class="col-md-6">
                        <div class="p-3 border rounded bg-light">
                          <h5 class="mb-3"> <b>MEDIDAS DE ASISTENCIA</b> </h5>
                          <div class="table-responsive">
                            <table id="tabla2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                  <th style="text-align:center; color: white; border: 1px solid black;">#</th>
                                  <th style="text-align:center; color: white; border: 1px solid black;">ID</th>
                                  <th style="text-align:center; color: white; border: 1px solid black;">FECHA</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php include("medidasasisgmetas.php"); ?>
                            </tbody>
                           </table>
                          </div>
                        </div>
                      </div>
                      <!-- Segundo Div (Columna) -->
                      <div class="col-md-6">
                        <div class="p-3 border rounded bg-light">
                          <h5 class="mb-3"> <b>MEDIDAS DE RESGUARDO</b> </h5>
                          <div class="table-responsive">
                            <table id="tabla3" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th style="text-align:center; color: white; border: 1px solid black;">#</th>
                                <th style="text-align:center; color: white; border: 1px solid black;">ID</th>
                                <th style="text-align:center; color: white; border: 1px solid black;">FECHA</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php include("medidasresgmetas.php"); ?>
                            </tbody>
                           </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </b>
              <?php
            }else {
              echo "sin datos";
              ?>
              <div class="alert alert-success d-flex align-items-center justify-content-center m-0 w-100" role="alert">
                <i style="color:red; font-size: 24px;" class="fas fa-exclamation-triangle me-2"></i>
                <div>
                  <strong style="color:#000000; font-size: 24px;">¡NO SE ENCOTRARON REGISTROS CON LAS FECHAS MENCIONADAS!</strong>
                </div>
              </div>
              <?php
            }
          }
        }
        ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="contenedor">
          <a href="menu.php" class="btn-flotante">INICIO</a>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
$(document).ready(function() {
  // 1. Inicializamos las tablas por separado
  var t1 = $('#tabla1').DataTable();
  var t2 = $('#tabla2').DataTable();
  var t3 = $('#tabla3').DataTable();

  // 2. Creamos el botón de exportación vinculado a la primera tabla
  new $.fn.dataTable.Buttons(t1, {
      buttons: [
          {
              extend: 'excelHtml5',
              text: 'Descargar Excel (3 Hojas)',
              className: 'btn btn-success',
              title: 'Reporte Consolidado',
              action: function ( e, dt, button, config ) {
                  var self = this;

                  // Definimos el contenido de cada hoja (Sheet)
                  // .exportData() extrae solo lo que está visible o filtrado
                  var data = [
                      { data: t1.buttons.exportData(), name: 'Inventario' },
                      { data: t2.buttons.exportData(), name: 'Ventas' },
                      { data: t3.buttons.exportData(), name: 'Clientes' }
                  ];

                  // Ejecutamos la acción nativa pero inyectando nuestro array de datos
                  $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config, data);
              }
          }
      ]
  });

  // 3. Colocamos el botón en nuestro contenedor personalizado
  t1.buttons().container().appendTo('#contenedorBoton');
});
</script>
<link rel="stylesheet" href="../css/menuactualizado.css">
<script src="../js/menu.js"></script>
</html>
