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
  <style>
      /* Estilos del Spinner */
      #loader {
          display: none;
          position: fixed;
          top: 0; left: 0; width: 100%; height: 100%;
          background: rgba(255, 255, 255, 0.8);
          z-index: 1000;
          text-align: center;
          padding-top: 200px;
      }
      .spinner {
          border: 16px solid #f3f3f3;
          border-top: 16px solid #3498db;
          border-radius: 50%;
          width: 120px; height: 120px;
          animation: spin 2s linear infinite;
          margin: auto;
      }
      @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
      }
      table { border-collapse: collapse; width: 50%; margin-top: 20px; }
      th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
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
          <div class="container" style="display: flex; justify-content: center;">
            <div class="row mt-8">
          
          <form id="searchForm" class="d-flex" style="width: 800px;">
              <!-- <label>Desde:</label>
              <input type="date" name="fecha_inicio" required>
              <label>Hasta:</label>
              <input type="date" name="fecha_fin" required> -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="starfech" class="form-label"><b> Del dia</b></label>
                  <input type="date" name="fecha_inicio" id="starfech" class="form-control" required>
                </div>
              </div>
              <div class="col-md-1">
                <!-- div para dejar espacio entre inputs -->
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="finfech" class="form-label"><b>Hasta el dia</b> </label>
                  <input type="date" name="fecha_fin" id="finfech" class="form-control" required>
                </div>
              </div>
              <div class="col-md-1">
                <!-- div para dejar espacio entre inputs -->
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="ocultar-mostrar" class="form-label"><b>BUSCAR</b></label><br>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
              </div>
              <!-- <button type="submit">Buscar</button> -->
          </form>
          </div>
          </div>
          <!-- Overlay del Spinner -->
          <div id="loader">
              <div class="spinner"></div>
              <h3>Buscando datos... </h3>
          </div>

          <!-- Contenedor de resultados -->
          <div id="resultTable"></div>

          <script>
          $(document).ready(function() {
              $('#searchForm').on('submit', function(e) {
                  e.preventDefault(); // Evitar recarga

                  // 1. Mostrar Spinner
                  $('#loader').show();

                  // 2. Esperar 5 segundos
                  setTimeout(function() {
                      // 3. Ejecutar consulta Ajax
                      $.ajax({
                          url: 'buscar.php',
                          type: 'POST',
                          data: $('#searchForm').serialize(),
                          success: function(response) {
                              $('#resultTable').html(response);
                              $('#loader').hide(); // Ocultar spinner
                          }
                      });
                  }, 5000); // 5000 milisegundos
              });
          });
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
<script src="../../js/menu.js"></script>
</html>
