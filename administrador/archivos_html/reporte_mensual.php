<div class="modal fade" id="add_data_Modal_reporte_mensual" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg"  style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:70%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 style="text-align:center" class="modal-title" id="myModalLabel">REPORTE MENSUAL</h2>
      </div>
      <div class="modal-body">
        <?php
        $anioActual = date("Y");
        $mesActual = date("n");
        $cantidadDias = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);
        $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
        // echo " ".date('d')." DE ".$meses[date('n')]. " DEL ".date('Y') ;
        $mesant = $meses[date('n')];
        $mesanterior = date('n')-1;
        $cantidaddiasanterior = cal_days_in_month(CAL_GREGORIAN, $mesanterior, $anioActual);
        $fecha_inicio = $anioActual."-01-01";
        $fecha_anterior = $anioActual."-".$mesanterior."-".$cantidaddiasanterior;
        $diamesinicio = $anioActual."-".$mesActual."-01";
        $diamesfin = $anioActual."-".$mesActual."-".$cantidadDias;
        ?>
        <form class="" action="index.html" method="post">
          <button class="btn-flotante-nuevo-exp" type="submit">GENERAR PDF</button><br><br>
          <!-- PRIMER HOJA -->
          <div class="well form-horizontal" style="border: 5px solid #63696D;">
            <img style="float: left;" src="../image/ESCUDO.png" width="60" height="50">
            <img style="float: right;" src="../image/FGJEM.png" width="50" height="50">
            <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
            <h1 style="text-align:center"><b>REPORTE MENSUAL DEL</b></h1>
            <h1 style="text-align:center"><b>DEL 1 AL  <?php echo $cantidadDias." DE ".$meses[date('n')-1]. " DEL ".date('Y'); ?> </b></h1>
            <!-- contenido -->



            <br><br><br>
            <div class="contenedor-flex">
              <label class="izquierda">*NOTA: Cifras sujetas a cambios por actualización</label>
              <label class="derecha" style="font-size: 23px; color: white; background-color: #63696D; border-radius: 40% 40% 5% 5%;">&nbsp;&nbsp;1/6&nbsp;&nbsp;</label>
            </div>
            <div class="">
              <table width="100%">
                <thead>
                  <tr>
                    <th width="80%" align="left" bgcolor="#63696D">
                      <h5 class="">
                      <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio
                      </font></span></h5>
                    </th>
                    <th width="20%" align="left" bgcolor="#63696D">
                      <h5 class="">
                      <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                      Subdirección de Estadística y Pre-Registro
                      </font></span></h5>
                    </th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <!-- SEGUNDA HOJA -->
          <div class="well form-horizontal" style="border: 5px solid #63696D;">
            <img style="float: left;" src="../image/ESCUDO.png" width="60" height="50">
            <img style="float: right;" src="../image/FGJEM.png" width="50" height="50">
            <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
            <h1 style="text-align:center"><b>MEDIDAS DE APOYO EJECUTADAS</b></h1>
            <!-- <h1 style="text-align:center"><b>DEL 1 AL  <?php echo $cantidadDias." DE ".$meses[date('n')-1]. " DEL ".date('Y'); ?> </b></h1> -->
            <!-- contenido -->


            <br><br><br>
            <div class="contenedor-flex">
              <label class="izquierda">*NOTA: Cifras sujetas a cambios por actualización</label>
              <label class="derecha" style="font-size: 23px; color: white; background-color: #63696D; border-radius: 40% 40% 5% 5%;">&nbsp;&nbsp;2/6&nbsp;&nbsp;</label>
            </div>
            <div class="">
              <table width="100%">
                <thead>
                  <tr>
                    <th width="80%" align="left" bgcolor="#63696D">
                      <h5 class="">
                      <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio
                      </font></span></h5>
                    </th>
                    <th width="20%" align="left" bgcolor="#63696D">
                      <h5 class="">
                      <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                      Subdirección de Estadística y Pre-Registro
                      </font></span></h5>
                    </th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <!-- TERCER HOJA -->
          <div class="well form-horizontal" style="border: 5px solid #63696D;">
            <img style="float: left;" src="../image/ESCUDO.png" width="60" height="50">
            <img style="float: right;" src="../image/FGJEM.png" width="50" height="50">
            <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
            <h1 style="text-align:center"><b>REPORTE CIFRAS ACUMULADAS <?php echo date("Y"); ?></b></h1>
            <h1 style="text-align:center"><b>DEL 1 DE ENERO AL  <?php echo $cantidadDias." DE ".$meses[date('n')-1]. " DEL ".date('Y'); ?> </b></h1>
            <h2 style="text-align:center"><b>SOLICITUDES DE INCORPORACIÓN</b></h2>
            <h1>____________________________________________________________________</h1>
            <!-- contenido -->
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <h1 style="text-align:center">SOLICITUDES RECIBIDAS SEGÚN SU PROCEDENCIA JURÍDICA</h1>
                  <table id="tabla1" border="3px" cellspacing="0" width="100%" style="border: 5px solid #97897D;">
                    <thead class="thead-dark">
                      <tr>
                        <th style="border: 5px solid #97897D; text-align:center">PROCEDENCIA JURÍDICA</th>
                        <th style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center"><?php echo 'DEL'; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center">ACUMULADO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla1_reporte_mensual.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <h1 style="text-align:center">SOLICITUDES RECIBIDAS POR AUTORIDAD SOLICITANTE</h1>
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                    <thead class="thead-dark">
                      <tr>
                        <th style="border: 5px solid #97897D; text-align:center">AUTORIDAD SOLICITANTE</th>
                        <th style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center">ACUMULADO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla3_reporte_mensual.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <br><br><br>
            <div class="contenedor-flex">
              <label class="izquierda">*NOTA: Cifras sujetas a cambios por actualización</label>
              <label class="derecha" style="font-size: 23px; color: white; background-color: #63696D; border-radius: 40% 40% 5% 5%;">&nbsp;&nbsp;3/6&nbsp;&nbsp;</label>
            </div>
            <div class="">
              <table width="100%">
                <thead>
                  <tr>
                    <th width="80%" align="left" bgcolor="#63696D">
                      <h5 class="">
                      <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio
                      </font></span></h5>
                    </th>
                    <th width="20%" align="left" bgcolor="#63696D">
                      <h5 class="">
                      <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                      Subdirección de Estadística y Pre-Registro
                      </font></span></h5>
                    </th>
                  </tr>
                </thead>
              </table>
            </div>

          </div>
          <!-- CUARTA HOJA -->
          <div class="well form-horizontal" style="border: 5px solid #63696D;">
            <img style="float: left;" src="../image/ESCUDO.png" width="60" height="50">
            <img style="float: right;" src="../image/FGJEM.png" width="50" height="50">
            <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
            <h1 style="text-align:center"><b>REPORTE CIFRAS ACUMULADAS <?php echo date("Y"); ?></b></h1>
            <h1 style="text-align:center"><b>DEL 1 DE ENERO AL  <?php echo $cantidadDias." DE ".$meses[date('n')-1]. " DEL ".date('Y'); ?> </b></h1>
            <h2 style="text-align:center"><b>SOLICITUDES DE INCORPORACIÓN</b></h2>
            <h1>____________________________________________________________________</h1>
            <!-- contenido -->
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <h1 style="text-align:center">SOLICITUDES DE INCORPORACIÓN RECIBIDAS DE ACUERDO AL DELITO VINCULADO</h1>
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                    <thead class="thead-dark">
                      <tr>
                        <th style="border: 5px solid #97897D; text-align:center">DELITO PRINCIPAL</th>
                        <th style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center">ACUMULADO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla4_reporte_mensual.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <h2 style="text-align:center"><b>EXPEDIENTES DE PROTECCIÓN INICIADOS</b></h2>
            <h1>____________________________________________________________________</h1>
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <h1 style="text-align:center">EXPEDIENTES INICIADOS SEGÚN SU PROCEDENCIA DE INCORPORACIÓN</h1>
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                    <thead class="thead-dark">
                      <tr>
                        <th style="border: 5px solid #97897D; text-align:center">DETERMINACION</th>
                        <th style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center">ACUMULADO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla2_reporte_mensual.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <h2 style="text-align:center"><b>PERSONAS PROPUESTAS</b></h2>
            <h1>____________________________________________________________________</h1>
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <h1 style="text-align:center">PERSONAS PROPUESTAS PARA SU INCORPORACIÓN SEGÚN SU CALIDAD DENTRO DEL PROGRAMA</h1>
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                    <thead class="thead-dark">
                      <tr>
                        <th style="border: 5px solid #97897D; text-align:center" rowspan="2">PERSONAS PROPUESTAS</th>
                      </tr>
                      <tr>
                        <th style="border: 5px solid #97897D; text-align:center" rowspan="2"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center" rowspan="2"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center" rowspan="2">ACUMULADO</th>
                      </tr>
                      <tr>
                        <th style="border: 5px solid #97897D; text-align:center">CALIDAD EN EL PROGRAMA</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla7_reporte_mensual.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <br><br><br>
            <div class="contenedor-flex">
              <label class="izquierda">*NOTA: Cifras sujetas a cambios por actualización</label>
              <label class="derecha" style="font-size: 23px; color: white; background-color: #63696D; border-radius: 40% 40% 5% 5%;">&nbsp;&nbsp;4/6&nbsp;&nbsp;</label>
            </div>
            <div class="">
              <table width="100%">
                <thead>
                  <tr>
                    <th width="80%" align="left" bgcolor="#63696D">
                      <h5 class="">
                      <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio
                      </font></span></h5>
                    </th>
                    <th width="20%" align="left" bgcolor="#63696D">
                      <h5 class="">
                      <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                      Subdirección de Estadística y Pre-Registro
                      </font></span></h5>
                    </th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <!-- QUINTA HOJA -->
          <div class="well form-horizontal" style="border: 5px solid #63696D;">
            <img style="float: left;" src="../image/ESCUDO.png" width="60" height="50">
            <img style="float: right;" src="../image/FGJEM.png" width="50" height="50">
            <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
            <h2 style="text-align:center"><b>SUJETOS PROTEGIDOS</b></h2>
            <h1>____________________________________________________________________</h1>
            <!-- contenido -->
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <h1 style="text-align:center">SUJETOS INCORPORADOS AL PROGRAMA SEGÚN SU CALIDAD</h1>
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                    <thead class="thead-dark">
                      <tr>
                        <th style="border: 5px solid #97897D; text-align:center" rowspan="2">SUJETOS PROTEGIDOS</th>
                      </tr>
                      <tr>
                        <th style="border: 5px solid #97897D; text-align:center" rowspan="2"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center" rowspan="2"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center" rowspan="2">ACUMULADO</th>
                      </tr>
                      <tr>
                        <th style="border: 5px solid #97897D; text-align:center">CALIDAD EN EL PROGRAMA</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla8_reporte_mensual.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <h2 style="text-align:center"><b>SUJETOS DESINCORPORADOS</b></h2>
            <h1>____________________________________________________________________</h1>
            <!-- contenido -->
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <h1 style="text-align:center">SUJETOS DESINCORPORADOS AL PROGRAMA SEGÚN SU CALIDAD</h1>
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                    <thead class="thead-dark">
                      <tr>
                        <th style="border: 5px solid #97897D; text-align:center" rowspan="2">SUJETOS DESINCORPORADOS</th>
                      </tr>
                      <tr>
                        <th style="border: 5px solid #97897D; text-align:center" rowspan="2"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center" rowspan="2"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                        <th style="border: 5px solid #97897D; text-align:center" rowspan="2">ACUMULADO</th>
                      </tr>
                      <tr>
                        <th style="border: 5px solid #97897D; text-align:center">CALIDAD EN EL PROGRAMA</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tablasujdesincor_reporte_mensual.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <br><br>
            <!-- <div class="row"> -->
              <?php
              // session_start();

              $host = "localhost";    /* Host  */
              $user = "root";         /* Usuario */
              $password = "";         /* Password */
              $dbname = "sistemafgjem";   /* Database nombre */

              // Creamos la conexion mysql
              $con = mysqli_connect($host, $user, $password,$dbname);

              // Comprobamos la cnexion
              if (!$con) {
                  die("Connection failed: " . mysqli_connect_error());
              }
            	// Consulta sql para contar la cantidad por ciudad
            	$sql = "SELECT ejecucion,count(id) as totalusers FROM medidas
            	WHERE date_ejecucion BETWEEN '2025-01-01' AND '2025-12-31' AND medidas.estatus = 'EJECUTADA'
            	GROUP BY ejecucion ORDER BY totalusers DESC";
            	$records = mysqli_query($con, $sql);
            	$data = array();
            	while($row = mysqli_fetch_assoc($records)){
            		$data[] = $row;
            	}

            	$jsonData = json_encode($data);
            	?>
            	<!-- Almacenamos JSON data -->
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            	<script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {

                var chartData_json = document.getElementById('chartinfo').value;

                let obj = JSON.parse(chartData_json) ;
                let jsonData = obj;
                var chartData = [];

                // Add Chart data
                  var chartData = [
                  ['MUNICIPIO','TOTAL MEDIDAS',{ role: 'annotation'}],
                ];

                  for (var key in obj) {
                    if (obj.hasOwnProperty(key)) {
                      var val = obj[key];

                      var city = val.ejecucion;
                      var totalusers = Number(val.totalusers);

                      // Add to Array
                      chartData.push([city,totalusers,totalusers]);
                      // chartData.push(['city']);

                    }
                }

                var data = google.visualization.arrayToDataTable(chartData);

                // Options
                // var options = {
                // 	title:'Reporte por municipio',
                // 	colors: ['#4473c5'],
                // 	indexAxis: 'y',
                // 	width: 1900, // Ancho en píxeles
                //   height: 700, // Alto en píxeles
                // };
                var options = {
                  isStacked: true,
                  indexAxis: 'y',
                  width: 1230, // Ancho en píxeles
                  height: 300, // Alto en píxeles
                title: {
                  title:'Reporte por municipio',
                  colors: ['#4473c5'],
                  fontSize: 14 // Tamaño de fuente para el título
                },
                hAxis: {
                  textStyle: {
                    fontSize: 12 // Tamaño de fuente para el eje horizontal
                  }
                },
                vAxis: {
                  textStyle: {
                    fontSize: 12 // Tamaño de fuente para el eje vertical
                  }
                },
                legend: {
                  textStyle: {
                    fontSize: 12 // Tamaño de fuente para la leyenda
                  }
                },
                vAxis: {
        scaleType: 'log'
  }
              };

                // Initialize
                var chart = new google.visualization.ColumnChart(document.getElementById('ciudadChart'));
                chart.draw(data, options);

              }
              </script>
              <!-- <div class="row"> -->
                <!-- <div class="col-lg-12"> -->
                  <textarea style="display:none" id="chartinfo"><?= $jsonData ?></textarea>
                  <div id="ciudadChart"></div>
                  <canvas id="ciudadChart" ></canvas>
                <!-- </div> -->
              <!-- </div> -->
              </div>

            <!-- </div> -->

            <br><br><br>
            <div class="contenedor-flex">
              <label class="izquierda">*NOTA: Cifras sujetas a cambios por actualización</label>
              <label class="derecha" style="font-size: 23px; color: white; background-color: #63696D; border-radius: 40% 40% 5% 5%;">&nbsp;&nbsp;5/6&nbsp;&nbsp;</label>
            </div>
            <div class="">
              <table width="100%">
                <thead>
                  <tr>
                    <th width="80%" align="left" bgcolor="#63696D">
                      <h5 class="">
                      <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio
                      </font></span></h5>
                    </th>
                    <th width="20%" align="left" bgcolor="#63696D">
                      <h5 class="">
                      <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                      Subdirección de Estadística y Pre-Registro
                      </font></span></h5>
                    </th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <!-- SEXTA HOJA -->
          <div class="well form-horizontal" style="border: 5px solid #63696D;">
            <img style="float: left;" src="../image/ESCUDO.png" width="60" height="50">
            <img style="float: right;" src="../image/FGJEM.png" width="50" height="50">
            <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
            <!-- contenido -->
            <h1 style="text-align:center">Reporte Global</h1>
            <h1 style="text-align:center">Del 01 de Junio del 2021 al <?php echo date("d").' de '.$meses[date("n")-1].' del '. date("Y");?> </h1>
            <h1>____________________________________________________________________</h1>
            <div class="row">
              <div class="col-lg-6">
                <div class="table-responsive">
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                    <thead class="thead-dark">
                      <tr>
                        <th style="text-align:center">CONCEPTO</th>
                        <th style="text-align:center">TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla1_reporte_diario.php");
                      ?>
                    </tbody>
                  </table>
                  <div class="col-lg-12">
                    <strong><sup>*</sup> Activos al <?php echo date("d").' de '.$meses[date("n")-1].' del '. date("Y");?></strong>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="table-responsive">
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                    <thead class="thead-dark">
                      <tr>
                        <th style="text-align:center">ESTATUS DE LOS EXPEDIENTES DE PROTECCIÓN</th>
                        <th style="text-align:center">TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla2_reporte_diario.php");
                      ?>
                    </tbody>
                  </table>
                  <div class="col-lg-12">
                    <strong><sup>*</sup> Activos al <?php echo date("d").' de '.$meses[date("n")-1].' del '. date("Y");?></strong>
                  </div>
                </div>
              </div>
            </div>

            <br><br><br>

            <div class="row">
              <div class="col-lg-6">
                <div class="table-responsive">
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                    <thead class="thead-dark">
                      <tr>
                        <th style="text-align:center">ESTATUS DE LAS PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA</th>
                        <th style="text-align:center">TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla3_reporte_diario.php");
                      ?>
                    </tbody>
                  </table>
                  <div class="col-lg-12">
                    <strong><sup>*</sup> Activos al <?php echo date("d").' de '.$meses[date("n")-1].' del '. date("Y");?></strong><br>
                    <strong><sup>1</sup> Corresponde a los siguientes casos:<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) La solicitud no cumple con los requisitos de Ley<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) La persona manifiesta negativa de voluntariedad para incorporarse<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c) Se determina la no procedencia de incorporación<br>
                      <sup>2</sup> Se refiere a las personas que se encuentran en los siguientes supuestos:<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) Concluyó su participación dentro del Proceso Penal<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) Renuncia voluntaria<br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c) Determinación de disminución o cese del riesgo</strong>
                    </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="table-responsive">
                  <table id="tabla1" border="1px" cellspacing="0" width="90%" bordered>
                    <thead class="thead-dark">
                      <tr>
                        <th style="text-align:center">PERIODO</th>
                        <th style="text-align:center width:40%">EXPEDIENTE DE PROTECCIÓN INICIADOS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla4_reporte_diario.php");
                      ?>
                    </tbody>
                  </table>
                </div>
                <br><br>
                <div class="table-responsive">
                  <table id="tabla1" border="1px" cellspacing="0" width="90%" bordered>
                    <thead class="thead-dark">
                      <tr>
                        <th style="text-align:center" colspan="2">SUJETOS EN RESGUARDO ACTIVOS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla5_reporte_diario.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <br><br>
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                    <thead class="thead-dark">
                      <tr>
                        <th style="text-align:center">ESTATUS DE LAS MEDIDAS DE APOYO DICTAMINADAS</th>
                        <th style="text-align:center">EN EJECUCIÓN</th>
                        <th style="text-align:center">EJECUTADA</th>
                        <th style="text-align:center">CANCELADA</th>
                        <th style="text-align:center">TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla6_reporte_diario.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <br><br><br>
            <div class="contenedor-flex">
              <label class="izquierda">*NOTA: Cifras sujetas a cambios por actualización</label>
              <label class="derecha" style="font-size: 23px; color: white; background-color: #63696D; border-radius: 40% 40% 5% 5%;">&nbsp;&nbsp;6/6&nbsp;&nbsp;</label>
            </div>
            <div class="">
              <table width="100%">
                <thead>
                  <tr>
                    <th width="80%" align="left" bgcolor="#63696D">
                      <h5 class="">
                      <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio
                      </font></span></h5>
                    </th>
                    <th width="20%" align="left" bgcolor="#63696D">
                      <h5 class="">
                      <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                      Subdirección de Estadística y Pre-Registro
                      </font></span></h5>
                    </th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
