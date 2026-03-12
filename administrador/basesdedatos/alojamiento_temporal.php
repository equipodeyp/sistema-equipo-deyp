<?php
date_default_timezone_set("America/Mexico_City");
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
include("../conexion.php");
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
  <script src="../../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="../../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../../css/main2.css">
  <!--font awesome local-->
  <link rel="stylesheet" href="../../css/fontawesome/css/all.css">
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../../css/breadcrumb.css">
  <link rel="stylesheet" href="../../css/bootstrap5-3-8.min.css">
  <script src="../../js/bootstrap5-3-8.bundle.min.js"></script>
  <script src="../../js/popper5-3-8.min.js"></script>
  <script src="../../js/bootstrap5-3-8.min.js"></script>
  <!--  -->
  <link rel="stylesheet" type="text/css" href="../../css/toast.css"/>
  <link rel="stylesheet" href="../../css/button_notification.css" type="text/css">
  <link href="../../datatables/datatablesv2026.min.css" rel="stylesheet">
  <script src="../../datatables/datatablesv2026.min.js"></script>
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
          echo "<img src='../../image/hombreup.jpg' width='100' height='100'>";
        }
         ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">

      </nav>
    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../../image/ups2.png" alt="" width="1400" height="70">
          <img style="display: block; margin: 0 auto;" src="../../image/ups3.png" alt="" width="1400" height="70">
      </div>
      <div class="container"><br>
        <div class="row">
          <h1 style="text-align:center"><b>
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
          </b></h1>
          <h4 style="text-align:center">
            <b><?php echo utf8_decode(strtoupper($row['area'])); ?></b>
          </h4>
        </div>
        <!--Ejemplo tabla con DataTables-->
        <b>
          <br><br>
          <div class="">
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <table id="bd_alojamiento_temporal" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">NO.</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">EXPEDIENTE</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA DE RECEPCION</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">IDENTIFICADOR</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">CALIDAD PERSONA</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">ESTATUS PERSONA</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">SEXO</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">EDAD</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">GRUPO EDAD</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">CONVENIO</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA DE INICIO DEL CONVENIO</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">2021</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">2022</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">2023</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">INICIO DEL RESGUARDO</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FIN DEL RESGUARDO</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">TIEMPO EN RESGUARDO</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">ESTATUS MEDIDA</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">RELACIONADO</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">RE-INGRESO</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">ACTIVO</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">AUTORIDAD SOLICITANTE</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">DELITO PRINCIPAL</th>
                          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA DE VENCIMIENTO</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../../administrador/tablas_estadistica/tabla_alojamiento_temporal_totales.php");
                      ?>
                    </tbody>
                 </table>
                </div>
              </div>
            </div>
          </div>
        </b>
        <div class="contenedor">
          <a href="../admin.php" class="btn-flotante">REGRESAR</a>
        </div>
      </div>
    </div>
  </div>
</body>
<link rel="stylesheet" href="../../css/menuactualizado.css">
<script src="../../js/menu.js"></script>
</html>
