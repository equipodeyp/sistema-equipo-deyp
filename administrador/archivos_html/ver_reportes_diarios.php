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
  <style>
         :root { --fgj-color: #545b64; --borde: #adb5bd; }


         /* Estética Archivador */
         .archivador {
             max-width: 1100px; margin: 0 auto; background: var(--fgj-color);
             border-radius: 50px 50px 15px 15px; padding: 40px 15px 25px 15px;
             box-shadow: 0 12px 35px rgba(0,0,0,0.3); position: relative;
         }
         .decoracion-superior {
             display: flex; justify-content: center; gap: 40px;
             position: absolute; top: 15px; width: 100%; left: 0;
         }
         .punto { width: 35px; height: 35px; background: #3a4148; border-radius: 50%; box-shadow: inset 0 2px 4px rgba(0,0,0,0.5); }

         /* Navegación */
         .nav-header { display: flex; justify-content: space-between; align-items: center; color: white; margin-bottom: 30px; padding: 0 10px; margin-top: 25px; margin-bottom: 15px;  }
         .mes-titulo { font-size: 32px; font-weight: 800; text-transform: uppercase; letter-spacing: 10px; margin: 0; }
         .btn-nav { background: rgba(255,255,255,0.2); border: none; color: white; border-radius: 50%; width: 50px; height: 50px; font-size: 1.5rem; transition: 0.3s; visibility: visible; }
         .btn-nav:hover { background: white; color: var(--fgj-color); }
         .btn-hidden { visibility: hidden; } /* Para ocultar flecha siguiente */

         /* Calendario Grid */
         .calendario-grid { display: grid; grid-template-columns: repeat(7, 1fr); background: white; border: 5px solid var(--borde); }
         .header-dia { background: #eee; font-weight: bold; padding: 10px; border: 1px solid var(--borde); text-align: center; font-size: 0.75rem; color: #555; }

         .dia-celda {
             background: white; border: 5px solid var(--borde); min-height: 100px;
             padding: 10px; cursor: pointer; transition: 0.2s; position: relative;
         }
         .dia-celda:hover { background: #888888; z-index: 5; }
         .dia-numero { font-weight: bold; font-size: 2rem; color: green; }

         .fuera-mes { background: #fafafa; color: red; cursor: default; }
         .es-hoy { background: #fff; border: 13px solid red !important; }
         .es-hoy .dia-numero { text-decoration: underline; color: #000; }

         /* Modal e Iframe */
         .modal-xl { max-width: 95% !important; }
         .pdf-visor { width: 100%; height: 80vh; border: none; background: #525659; }
         .badge-id { font-family: 'Courier New', monospace; background: #2c3e50; color: #00ff00; padding: 3px 10px; border-radius: 4px; font-size: 0.85rem; }
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


          <!-- <button class="btn-interactivo">Explorar Ahora</button> -->
          <a class="btn-interactivo" href="../generar_reportes/reporte_diario.php">
            <span class="texto">REPORTE DIARIO <br> <?php echo $varbtnmsjrd;?></span>
            <span class="icono">→</span>
          </a>
          <div class="container">
    <div class="archivador">
        <div class="decoracion-superior">
            <div class="punto"></div><div class="punto"></div><div class="punto"></div><div class="punto"></div>
        </div>

        <div class="nav-header">
            <button id="btnPrev" class="btn-nav" onclick="cambiarMes(-1)"><i class="bi bi-chevron-left"></i></button>
            <h1 class="mes-titulo" id="txtMes">>CARGANDO...</h1>
            <button id="btnNext" class="btn-nav" onclick="cambiarMes(1)"><i class="bi bi-chevron-right"></i></button>
        </div>

        <div class="calendario-grid" id="gridCalendario">
            <!-- Cabeceras fijas LUN-DOM -->
            <div class="header-dia">LUNES</div><div class="header-dia">MARTES</div><div class="header-dia">MIÉRCOLES</div>
            <div class="header-dia">JUEVES</div><div class="header-dia">VIERNES</div><div class="header-dia">SÁBADO</div>
            <div class="header-dia">DOMINGO</div>
        </div>
    </div>
</div>

<!-- Modal para Visor de PDF -->
<div class="modal fade" id="modalDiario" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white p-2">
        <h6 class="modal-title ms-2">REPORTE DIARIO: <span id="titFecha"></span></h6>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-0">
        <div class="p-2 bg-light border-bottom">
            <span class="ms-2 small fw-bold">ID: <span id="idFull" class="badge-id"></span></span>
        </div>
        <iframe src="" id="visorPDF" class="pdf-visor"></iframe>
      </div>
    </div>
  </div>
</div>



<script>

</script>




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
<!-- <script src="../../js/descargarpdfreportes.js"></script> -->
</html>
