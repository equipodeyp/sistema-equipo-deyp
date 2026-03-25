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
  <link href="../../datatables/datatables.min.css" rel="stylesheet">
  <script src="../../datatables/datatables.min.js"></script>
  <style>
  /* Contenedor fijo a la derecha y centrado verticalmente */
     .area-botones {
         position: fixed;
         right: 25px;
         top: 50%;
         transform: translateY(-50%);
         z-index: 1000;
     }

     /* Estilo base elegante */
     .btn-premium {
         display: none; /* Se activa con JavaScript */
         align-items: center;
         padding: 16px 28px;
         color: white;
         border: none;
         border-radius: 14px;
         cursor: pointer;
         font-size: 15px;
         font-weight: 600;
         box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
         transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
         text-decoration: none;
         opacity: 0;
         right: -100px;
         position: relative;
         animation: entrar 0.7s ease-out forwards;
     }

     /* Estilo LUNES: Reporte (Verde Esmeralda) */
     .lunes-style {
         background: linear-gradient(135deg, #059669, #10b981);
     }

     /* Estilo RESTO DE SEMANA: Contacto (Azul Medianoche) */
     .semana-style {
         background: linear-gradient(135deg, #1e293b, #334155);
     }

     /* Animación al pasar el mouse */
     .btn-premium:hover {
         transform: scale(1.08) translateX(-5px);
         box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25);
         filter: brightness(1.1);
     }

     .icono { margin-left: 12px; font-size: 18px; }

     @keyframes entrar {
         to { opacity: 1; right: 0; }
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
            <div class="archivador-semanal">
              <div class="decoracion-superior">
                <div class="punto"></div>
                <div class="punto"></div>
                <div class="punto"></div>
                <div class="punto"></div>
                <div class="punto"></div>
                <div class="punto"></div>
              </div>
              <!-- Controles de navegación de semanas -->
              <div class="header-controles">
                <div class="año-header">
                  <h2 class="año-header" id="txtAño" style="text-align: center;">2026</h2>
                </div>
              </div>
              <div class="titulo-semanal">Semanal</div>
              <div class="cuerpo-reporte">
                <!-- Visor del PDF -->
                <div id="contenedorVisor">
                  <iframe src="../../docs/REPORTES/SEMANAL.pdf" id="visorPDF" class="pdf-visor"></iframe>
                </div>
              </div>
            </div>
          </div>
          <div class="area-botones">
        <!-- Botón para el Lunes -->
        <button id="btnLunes" class="btn-premium lunes-style">
            Generar <br> Reporte <br> Semanal <span class="icono">📊</span>
        </button>

        <!-- Botón para Martes a Domingo -->
        <button id="btnSemana" class="btn-premium semana-style">
            Preliminar <br> Reporte <br> Semanal <span class="icono">📊</span>
        </button>
    </div>

<script>
function gestionarBotones() {
        const hoy = new Date().getDay(); // 0=Dom, 1=Lun, 2=Mar...
        const btnLunes = document.getElementById('btnLunes');
        const btnSemana = document.getElementById('btnSemana');

        if (hoy === 1) {
            // Es Lunes: Mostrar reporte, asegurar que contacto esté oculto
            btnLunes.style.display = 'flex';
            btnSemana.style.display = 'none';
        } else {
            // No es lunes: Mostrar contacto, asegurar que reporte esté oculto
            btnLunes.style.display = 'none';
            btnSemana.style.display = 'flex';
        }
    }
    // Ejecutar al cargar
    window.onload = gestionarBotones;
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
<link rel="stylesheet" type="text/css" href="../../css/calendario_semanal.css"/>
<script src="../../js/menu.js"></script>
</html>
