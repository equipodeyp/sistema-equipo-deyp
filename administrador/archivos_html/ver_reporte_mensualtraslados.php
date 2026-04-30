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
  <!-- Librerías para Excel Profesional -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.4.0/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.4.0/exceljs.bare.js"></script>

    <!-- <link href="https://jsdelivr.net" rel="stylesheet"> -->
    <style>
        /* body { background-color: #f0f2f5; font-family: 'Segoe UI', sans-serif; padding: 40px 0; } */
        .hoja-marco {
            background-color: white; border: 1px solid #ccc;
            box-shadow: 0 0 25px rgba(0,0,0,0.2); margin: 0 auto;
            max-width: 900px; min-height: 1000px;
        }
        .header-container-custom { display: flex; height: 70px; font-weight: bold; color: white; }
        .header-main-title {
            flex-grow: 1; background: linear-gradient(to bottom, #7a7a7a 0%, #5a5a5a 100%);
            display: flex; align-items: center; justify-content: center; font-size: 20px;
        }
        .header-date-box {
            width: 200px; background-color: #000;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
        }
        .tabla-estilo-imagen { border: 2px solid #333 !important; margin-bottom: 40px; width: 100%; }
        .tabla-estilo-imagen th, .tabla-estilo-imagen td { border: 1px solid #333 !important; padding: 10px; }
        .oculto { display: none; }
        .visible { display: block !important; animation: slideUp 0.5s ease-out; }
        @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
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
    <div class="card shadow-sm mx-auto mb-4" style="max-width: 500px; border-radius: 12px;">
        <div class="card-body d-flex gap-2 justify-content-center">
            <select class="form-select w-50" id="selectMeses" onchange="generarReporte()">
                <option value="" selected disabled>Seleccione Mes</option>
            </select>
            <button id="btnExcel" class="btn btn-success d-none" onclick="descargarExcel()">Descargar Excel</button>
        </div>
    </div>

    <div id="loader" class="d-none my-5"><div class="spinner-border text-primary"></div></div>

    <div id="hojaReporte" class="hoja-marco oculto text-start">
        <div class="header-container-custom">
            <div class="header-main-title">REPORTE MENSUAL DE TRASLADOS</div>
            <div class="header-date-box"><span id="mesCabecera">MES</span><br>2026</div>
        </div>

        <div class="p-5">
            <table class="table tabla-estilo-imagen">
                <thead>
                  <tr class="bg-dark text-white text-center">
                    <th colspan="3">MOTIVO DEL TRASLADO</th>
                  </tr>
                  <tr class="bg-dark text-white text-center">
                    <th >NO.</th>
                    <th >MOTIVO</th>
                    <th >TOTAL</th>
                  </tr>
                </thead>
                <tbody id="cuerpoMotivos"></tbody><tfoot id="pieMotivos"></tfoot>
            </table>
            <table class="table tabla-estilo-imagen">
                <thead><tr class="bg-dark text-white text-center"><th colspan="3">DESTINO DEL TRASLADO (MUNICIPIO)</th></tr></thead>
                <tbody id="cuerpoDestinos"></tbody><tfoot id="pieDestinos"></tfoot>
            </table>
            <table class="table tabla-estilo-imagen">
                <thead><tr class="bg-dark text-white text-center"><th colspan="3">SEGÚN ESTANCIA EN EL CENTRO</th></tr></thead>
                <tbody id="cuerpoEstancia"></tbody><tfoot id="pieEstancia"></tfoot>
            </table>
            <table class="table tabla-estilo-imagen">
                <thead><tr class="bg-dark text-white text-center"><th colspan="3">SUJETO PROTEGIDO (ID)</th></tr></thead>
                <tbody id="cuerpoSujetos"></tbody><tfoot id="pieSujetos"></tfoot>
            </table>
        </div>
    </div>
</div>

<script>
    const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    const select = document.getElementById('selectMeses');
    let datosGlobales = null; // Guardará el JSON para el Excel

    // Llenar selector
    for (let i = 0; i <= new Date().getMonth(); i++) {
        let opt = document.createElement('option');
        opt.value = i + 1; opt.innerHTML = meses[i];
        select.appendChild(opt);
    }

    async function generarReporte() {
        document.getElementById('loader').classList.remove('d-none');
        document.getElementById('hojaReporte').classList.add('oculto');

        try {
            const res = await fetch(`obtener_reporte.php?mes=${select.value}`);
            datosGlobales = await res.json();

            llenarTabla('cuerpoMotivos', 'pieMotivos', datosGlobales.motivos, 'motivo');
            llenarTabla('cuerpoDestinos', 'pieDestinos', datosGlobales.destinos, 'municipio');
            llenarTabla('cuerpoEstancia', 'pieEstancia', datosGlobales.estancia, 'resguardado');
            llenarTabla('cuerpoSujetos', 'pieSujetos', datosGlobales.sujetos, 'identificador');

            document.getElementById('mesCabecera').innerText = meses[select.value-1];
            document.getElementById('loader').classList.add('d-none');
            document.getElementById('hojaReporte').classList.replace('oculto', 'visible');
            document.getElementById('btnExcel').classList.remove('d-none');
        } catch (e) {
            alert("Error al cargar datos");
            document.getElementById('loader').classList.add('d-none');
        }
    }

    function llenarTabla(tbodyId, tfootId, lista, campo) {
        const tbody = document.getElementById(tbodyId);
        const tfoot = document.getElementById(tfootId);
        tbody.innerHTML = ""; let sum = 0;
        lista.forEach((item, i) => {
            sum += parseInt(item.total);
            tbody.innerHTML += `<tr><td class="text-center">${i+1}</td><td>${item[campo]}</td><td class="text-center fw-bold">${item.total}</td></tr>`;
        });
        tfoot.innerHTML = `<tr class="bg-light fw-bold"><td colspan="2" class="text-end pe-4">TOTAL</td><td class="text-center">${sum}</td></tr>`;
    }

    async function descargarExcel() {
        if (!datosGlobales) return;
        const wb = new ExcelJS.Workbook();
        const ws = wb.addWorksheet('Reporte');

        ws.columns = [{ width: 10 }, { width: 50 }, { width: 15 }];

        const addSec = (title, rows, prop) => {
            const rT = ws.addRow([title.toUpperCase()]);
            ws.mergeCells(`A${rT.number}:C${rT.number}`);
            rT.font = { bold: true, color: { argb: 'FFFFFF' } };
            rT.fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: 'FF717C7D' } };
            rT.alignment = { horizontal: 'center' };

            ws.addRow(['No.', 'Descripción', 'Total']).font = { bold: true };
            let s = 0;
            rows.forEach((r, i) => {
                s += parseInt(r.total);
                ws.addRow([i + 1, r[prop], parseInt(r.total)]);
            });
            const rF = ws.addRow(['', 'TOTAL', s]);
            rF.font = { bold: true };
            ws.addRow([]);
        };

        addSec("Motivo del Traslado", datosGlobales.motivos, 'motivo');
        addSec("Destino (Municipio)", datosGlobales.destinos, 'municipio');
        addSec("Estancia en el Centro", datosGlobales.estancia, 'resguardado');
        addSec("Sujeto Protegido", datosGlobales.sujetos, 'identificador');

        const buffer = await wb.xlsx.writeBuffer();
        saveAs(new Blob([buffer]), `Reporte_${meses[select.value-1]}_2026.xlsx`);
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
<!-- En el <head> añadir: -->
<!-- <script src="https://cloudflare.com"></script> -->
<!-- 1. LIBRERÍA EXCEL (Carga prioritaria) -->
    <!-- <script src="https://jsdelivr.net"></script> -->
<link rel="stylesheet" href="../../css/menuactualizado.css">
<script src="../../js/menu.js"></script>
</html>
