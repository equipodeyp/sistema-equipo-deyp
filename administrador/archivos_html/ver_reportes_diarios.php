<?php
// Configurar la zona horaria (ajusta a tu localidad)
date_default_timezone_set('America/Mexico_City');
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
// Obtener la hora actual en formato 24h
$horaActual = (int)date('H');
$minutosActual = (int)date('i');

// Definir los formatos de fecha
$formato = 'd-m-Y'; // Ejemplo: 25-03-2026
// Lógica de comparación
// Si la hora es 9 (9:00 - 9:59) se muestra ayer
if ($horaActual == 9) {
    $varbtnmsjrd = date($formato, strtotime('yesterday'));
}
// Si son las 10:00 exactamente o más, muestra hoy
elseif ($horaActual >= 10) {
    $varbtnmsjrd = date($formato);
}
// Antes de las 9am, mostramos ayer también (o podrías ajustar esta lógica)
else {
    $varbtnmsjrd =  date($formato, strtotime('yesterday'));
}
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
  <link href="../../datatables/datatables.min.css" rel="stylesheet">
  <script src="../../datatables/datatables.min.js"></script>
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
          <div class="container">
            <div class="archivador">
              <!-- Decoración Superior -->
              <div class="decoracion-superior">
                <div class="punto"></div>
                <div class="punto"></div>
                <div class="punto"></div>
                <div class="punto"></div>
                <div class="punto"></div>
                <div class="punto"></div>
              </div>
              <div class="mes-display" id="txtMes">MES</div>
              <div class="tabla-blanca" id="gridDias"></div>
            </div>
          </div>
          <!-- Modal para mostrar pdf-->
          <div class="modal fade" id="pdfModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header bg-dark text-white p-2">
                  <h6 class="modal-title ms-2">SIPPSIPPED - ESTADO DEL REPORTE</h6>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0">
                  <div class="p-2 bg-light border-bottom d-flex justify-content-between align-items-center">
                    <span class="ms-2 small">ID: <span id="idFull" class="id-badge"></span></span>
                    <span id="txtEstado" class="badge bg-primary">ESTADO</span>
                  </div>
                  <div id="visorDinamico" class="contenedor-principal">
                    <div id="timeWrapper" class="time-progress-wrapper d-none">
                      <div class="progress-label-lg" id="labelPorcentaje">0%</div>
                      <div class="progress" style="height: 45px; border-radius: 25px;">
                        <div id="timeBar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%"></div>
                      </div>
                      <p class="mt-3 text-muted">El reporte se visualizara mañana.</p>
                    </div>
                    <iframe src="" id="pdfFrame" class="pdf-frame d-none"></iframe>
                  </div>
                </div>
                <div class="modal-footer bg-light p-1">
                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- <button class="btn-interactivo">Explorar Ahora</button> -->
          <a class="btn-interactivo" href="../generar_reportes/reporte_diario.php">
            <span class="texto">REPORTE DIARIO <br> <?php echo $varbtnmsjrd;?></span>
            <span class="icono">→</span>
          </a>
        </b>
        <div class="contenedor">
          <a href="../admin.php" class="btn-flotante">REGRESAR</a>
        </div>
      </div>
    </div>
  </div>
</body>
<link rel="stylesheet" href="../../css/menuactualizado.css">
<link rel="stylesheet" type="text/css" href="../../css/calendario_diario.css"/>
<script src="../../js/menu.js"></script>
<script src="../../js/carga_dias_reporte_diario.js"></script>
<link rel="stylesheet" href="../../css/menu_creacionreportes.css">
<script src="../../js/descargarpdfreportes.js"></script>
</html>
