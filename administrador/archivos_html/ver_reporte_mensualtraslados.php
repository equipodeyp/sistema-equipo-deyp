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
        

        /* Estilo del Marco de Hoja */
        .hoja-marco {
            background-color: white;
            border: 1px solid #ced4da;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
            margin: 0 auto 50px auto;
            max-width: 900px;
            min-height: 1000px;
            padding: 0;
        }

        /* Cabecera idéntica a la imagen */
        .header-container-custom {
            display: flex;
            align-items: stretch;
            height: 70px;
            font-weight: bold;
            color: white;
            margin-bottom: 30px;
        }

        .header-main-title {
            flex-grow: 1;
            background: linear-gradient(to bottom, #7a7a7a 0%, #5a5a5a 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            letter-spacing: 1px;
            border-right: 3px solid white;
        }

        .header-date-box {
            width: 220px;
            background-color: #000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            line-height: 1.3;
            text-transform: uppercase;
        }

        /* Estilo de Tablas */
        .tabla-estilo-imagen { border: 2px solid #333 !important; }
        .tabla-estilo-imagen th, .tabla-estilo-imagen td {
            border: 1px solid #333 !important;
            vertical-align: middle;
            padding: 10px;
        }

        /* Visibilidad y Animación */
        .oculto { display: none; opacity: 0; }
        .visible {
            display: block !important;
            animation: slideUp 0.6s ease-out forwards;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
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





          <div class="container text-center">
      <!-- Selector Superior -->
      <div class="card shadow-sm mx-auto mb-5" style="max-width: 450px; border-radius: 15px;">
          <div class="card-body">
              <label class="form-label fw-bold h5 mb-3 text-secondary">Periodo de Consulta 2026</label>
              <select class="form-select form-select-lg" id="selectMeses" onchange="generarReporte()">
                  <option value="" selected disabled>— Seleccione el Mes —</option>
              </select>
          </div>
      </div>

      <!-- Spinner -->
      <div id="loader" class="d-none my-5">
          <div class="spinner-grow text-dark" role="status"></div>
          <p class="mt-2 fw-bold text-muted">Procesando datos...</p>
      </div>

      <!-- Contenedor Hoja -->
      <div id="hojaReporte" class="hoja-marco oculto text-start">
          <div class="header-container-custom">
              <div class="header-main-title">REPORTE MENSUAL DE TRASLADOS</div>
              <div class="header-date-box">
                  <span id="mesCabecera">MES</span><br>2026
              </div>
          </div>

          <div class="px-5 pb-5">
              <!-- TABLA 1: MOTIVOS -->
              <div class="table-responsive mb-5">
                  <table class="table table-bordered tabla-estilo-imagen">
                      <thead>
                          <tr class="bg-dark text-white text-center">
                              <th colspan="3">MOTIVO DEL TRASLADO</th>
                          </tr>
                          <tr class="bg-secondary text-white text-center">
                              <th style="width: 10%;">No.</th>
                              <th style="width: 70%;">MOTIVO</th>
                              <th style="width: 20%;">TOTAL</th>
                          </tr>
                      </thead>
                      <tbody id="cuerpoMotivos"></tbody>
                      <tfoot id="pieMotivos"></tfoot>
                  </table>
              </div>

              <!-- TABLA 2: DESTINOS (NUEVA) -->
              <div class="table-responsive">
                  <table class="table table-bordered tabla-estilo-imagen">
                      <thead>
                          <tr class="bg-dark text-white text-center">
                              <th colspan="3">DESTINO DEL TRASLADO (MUNICIPIO)</th>
                          </tr>
                          <tr class="bg-secondary text-white text-center">
                              <th style="width: 10%;">No.</th>
                              <th style="width: 70%;">DESTINO</th>
                              <th style="width: 20%;">TOTAL</th>
                          </tr>
                      </thead>
                      <tbody id="cuerpoDestinos"></tbody>
                      <tfoot id="pieDestinos"></tfoot>
                  </table>
              </div>

              <!-- <p class="text-end mt-4 text-muted small">* Información generada dinámicamente según filtros aplicados.</p> -->
          </div>
      </div>
  </div>

  <script>
      const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
      const select = document.getElementById('selectMeses');

      // Llenar select hasta mes actual
      const mesActual = new Date().getMonth();
      for (let i = 0; i <= mesActual; i++) {
          let opt = document.createElement('option');
          opt.value = i + 1;
          opt.innerHTML = meses[i];
          select.appendChild(opt);
      }

      async function generarReporte() {
          const hoja = document.getElementById('hojaReporte');
          const loader = document.getElementById('loader');

          loader.classList.remove('d-none');
          hoja.classList.add('oculto');
          hoja.classList.remove('visible');

          try {
              const response = await fetch(`obtener_reporte.php?mes=${select.value}`);
              const data = await response.json();

              // Llenar ambas tablas usando una función genérica
              llenarTabla('cuerpoMotivos', 'pieMotivos', data.motivos, 'motivo');
              llenarTabla('cuerpoDestinos', 'pieDestinos', data.destinos, 'municipio');

              document.getElementById('mesCabecera').innerText = select.options[select.selectedIndex].text;

              setTimeout(() => {
                  loader.classList.add('d-none');
                  hoja.classList.replace('oculto', 'visible');
              }, 600);

          } catch (error) {
              loader.classList.add('d-none');
              alert("Error al obtener datos.");
          }
      }

      function llenarTabla(tbodyId, tfootId, lista, propiedadNombre) {
          const tbody = document.getElementById(tbodyId);
          const tfoot = document.getElementById(tfootId);
          tbody.innerHTML = "";
          let sumaTotal = 0;

          if (lista.length === 0) {
              tbody.innerHTML = `<tr><td colspan="3" class="text-center">No hay registros</td></tr>`;
          } else {
              lista.forEach((item, index) => {
                  sumaTotal += parseInt(item.total);
                  tbody.innerHTML += `
                      <tr>
                          <td class="text-center">${index + 1}</td>
                          <td class="ps-3">${item[propiedadNombre]}</td>
                          <td class="text-center fw-bold">${item.total}</td>
                      </tr>`;
              });
          }

          tfoot.innerHTML = `
              <tr class="bg-light fw-bold">
                  <td colspan="2" class="text-center">TOTAL</td>
                  <td class="text-center">${sumaTotal}</td>
              </tr>`;
      }
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
