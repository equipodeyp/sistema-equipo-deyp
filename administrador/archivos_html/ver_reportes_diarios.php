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
  .btn-interactivo {
            /* Posicionamiento fijo a la derecha y centrado vertical */
            position: fixed;
            right: 25px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1000;

            /* Diseño base compacto */
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 50px;
            height: 54px;
            padding: 0 20px;

            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);

            /* Transición fluida para la expansión */
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            white-space: nowrap;

            /* Animación de entrada inicial */
            animation: entradaRebote 1s ease-out forwards;
        }

        /* Contenedores internos */
        .texto {
            font-size: 15px;
            font-weight: 500;
            margin-right: 0;
            transition: margin 0.3s;
        }

        .icono {
            font-size: 20px;
            opacity: 0;
            transform: translateX(20px);
            transition: all 0.3s ease;
            display: inline-block;
        }

        /* EFECTO HOVER: Expansión y revelación */
        .btn-interactivo:hover {
            padding: 0 30px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            background: #2563eb; /* Cambia a un color más vibrante al interactuar */
        }

        .btn-interactivo:hover .texto {
            margin-right: 12px;
        }

        .btn-interactivo:hover .icono {
            opacity: 1;
            transform: translateX(0);
        }

        /* Animación de entrada desde la derecha */
        @keyframes entradaRebote {
            0% {
                opacity: 0;
                right: -100px;
            }
            100% {
                opacity: 1;
                right: 25px;
            }
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
                      <p class="mt-3 text-muted">El reporte se visualizara al finalizar el día.</p>
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
          <button class="btn-interactivo">
        <span class="texto">PRELIMINAR <br> <?php echo date("d/m/Y"); ?></span>
        <span class="icono">→</span>
    </button>
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
</html>
