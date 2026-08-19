<?php
date_default_timezone_set("America/Mexico_City");
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

include("conexion.php");
session_start();
$name = $_SESSION['usuario'] ?? null;
if (!isset($name)) {
  header("location: ../logout.php");
  exit;
}

// Datos del usuario logueado
$sentencia = "SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row = $result->fetch_assoc();
$genero = $row['sexo'] ?? '';
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
  <link rel="stylesheet" href="../css/main2.css">
  <link rel="stylesheet" href="../css/fontawesome/css/all.css">
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/bootstrap5-3-8.min.css">
  <script src="../js/bootstrap5-3-8.bundle.min.js"></script>
  <script src="../js/popper5-3-8.min.js"></script>
  <script src="../js/bootstrap5-3-8.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/toast.css"/>
  <link rel="stylesheet" href="../css/button_notification.css" type="text/css">
  <link href="../datatables/datatablesv2026.min.css" rel="stylesheet">
  <script src="../datatables/datatablesv2026.min.js"></script>
  <style>
    .galeria { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; margin-top: 20px; }
    .tarjeta-imagen { background: white; padding: 12px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; }
    .tarjeta-imagen img { width: 100%; height: 160px; object-fit: cover; border-radius: 4px; margin-bottom: 8px; }
    .tarjeta-imagen p { font-size: 12px; color: #555; margin: 6px 0; }
    .btn-descargar { display: inline-block; background: #28a745; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 13px; }
    .btn-descargar:hover { background: #218838; color: white; }
    .btn-zip-all { background: #6f42c1; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; display: inline-block; margin-bottom: 20px; font-weight: bold; }
    .btn-zip-all:hover { background: #5a32a3; color: white; }
    #loader_carga { display: none; text-align: center; margin: 20px 0; }
  </style>
</head>
<body>
  <div class="contenedor">
    <div class="sidebar ancho">
      <div class="logo text-warning"></div>
      <div style="text-align:center" class="user">
        <?php
        if ($genero == 'mujer') {
          echo "<img src='../image/mujerup.png' width='100' height='100'>";
        } elseif ($genero == 'hombre') {
          echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
        }
        ?>
        <h6 style="text-align:center" class='user-nombre'><?php echo "" . $_SESSION['usuario']; ?></h6>
      </div>
      <nav class="menu-nav"></nav>
    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../image/ups2.png" alt="" width="1400" height="70">
          <img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
      </div>
      <div class="container"><br>
        <div class="row">
          <h1 style="text-align:center"><b>



          </b></h1>
          <h4 style="text-align:center">
            <b><?php echo utf8_decode(strtoupper($row['area'] ?? '')); ?></b>
          </h4>
        </div>

        <div class="container" style="display: flex; justify-content: center;">
          <div class="row mt-4">
            <form id="searchplaneacion_rutas" class="d-flex align-items-end" style="width: 800px;">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="starfech" class="form-label"><b>Del día</b></label>
                    <input type="date" name="fecha_inicio" id="starfech" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="finfech" class="form-label"><b>Hasta el día</b></label>
                    <input type="date" name="fecha_fin" id="finfech" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary w-100"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                  </div>
                </div>
            </form>
          </div>
        </div>

        <!-- Overlay del Spinner -->
        <div id="loader_carga">
          <h3>Buscando datos... Espere</h3>
        </div>

        <hr><br>

        <!-- Contenedor dinámico de resultados -->
        <div id="resultados_rutas"></div>

        <div class="contenedor">
          <a href="admin.php" class="btn-flotante">REGRESAR</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#searchplaneacion_rutas').on('submit', function(e) {
        e.preventDefault();

        let fecha_inicio = $('#starfech').val();
        let fecha_fin = $('#finfech').val();

        $('#loader_carga').show();
        $('#resultados_rutas').html('');

        $.ajax({
          url: 'obtener_resultados.php',
          type: 'GET',
          data: { fecha_inicio: fecha_inicio, fecha_fin: fecha_fin },
          success: function(response) {
            $('#loader_carga').hide();
            $('#resultados_rutas').html(response);
          },
          error: function() {
            $('#loader_carga').hide();
            $('#resultados_rutas').html('<p class="text-danger text-center">Error al realizar la búsqueda.</p>');
          }
        });
      });
    });
  </script>
</body>
<link rel="stylesheet" href="../css/menuactualizado.css">
<script src="../js/menu.js"></script>
<script src="../js/bd_planeacion.js" charset="utf-8"></script>
</html>
