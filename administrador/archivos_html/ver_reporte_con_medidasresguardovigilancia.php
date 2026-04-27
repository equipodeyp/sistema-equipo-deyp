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
          <div class="slide-container">
  <div class="powerpoint-slide">
    <header class="slide-header">
      <h1>Título de la Diapositiva</h1>
    </header>

    <div class="slide-content">
      <ul>
        <li>Punto clave de la presentación.</li>
        <li>Subpunto con información relevante.</li>
        <li>Gráficos o imágenes irían en este espacio.</li>
      </ul>
    </div>

    <footer class="slide-footer">
      <span class="slide-number">1</span>
    </footer>
  </div>
</div>

<style>
  /* Contenedor para centrar la hoja en pantalla */
  .slide-container {
    display: flex;
    justify-content: center;
    padding: 40px;
    background-color: #e0e0e0; /* Color de fondo estilo escritorio */
  }

  /* La "Hoja" de PowerPoint */
  .powerpoint-slide {
    width: 1200px;
    aspect-ratio: 16 / 9; /* Relación estándar moderna */
    background-color: white;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    padding: 40px;
    display: flex;
    flex-direction: column;
    position: relative;
    font-family: 'Segoe UI', Calibri, sans-serif;
    box-sizing: border-box;
  }

  /* Título */
  .slide-header h1 {
    color: #444;
    font-size: 36px;
    margin: 0;
    border-bottom: 2px solid #d04423; /* Detalle de color PowerPoint */
    padding-bottom: 10px;
  }

  /* Contenido */
  .slide-content {
    flex-grow: 1;
    margin-top: 30px;
    font-size: 24px;
    color: #666;
  }

  .slide-content ul {
    line-height: 1.6;
  }

  /* Pie de página */
  .slide-footer {
    text-align: right;
    font-size: 14px;
    color: #999;
  }
</style>


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
