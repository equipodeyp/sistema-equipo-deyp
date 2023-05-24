<div class="modal fade" id="add_data_Modal_reporte_mensual" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg"  style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:90%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 style="text-align:center" class="modal-title" id="myModalLabel">REPORTE MENSUAL</h2>
      </div>
      <div class="modal-body">
        <?php
        // echo $anioActual;
        // echo "<br>";
        // echo $mesActual;
        // echo "<br>";
        // echo $cantidadDias;
        // echo "<br>";
        $anioActual = date("Y");
        $mesActual = date("n");
        $cantidadDias = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);
        $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
        // echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
        echo $mesant = $meses[date('n')-2];
        $mesanterior = date('n')-1;
        $cantidaddiasanterior = cal_days_in_month(CAL_GREGORIAN, $mesanterior, $anioActual);
        echo $cantidaddiasanterior;
        ?>
        <h1 style="text-align:center"><b>PROGRAMA DE PROTECCIÓN A SUJETOS QUE <br> INTERVIENEN EN EL PROCEDIMIENTO PENAL O DE <br> EXTINCIÓN DE DOMINIO DEL ESTADO DE MÉXICO</b></h1>
        <h1 style="text-align:center">__________________________________________________________________________</h1>
        <h1 style="text-align:center"><b>DEL 1 AL  <?php echo $cantidadDias." DE ".$meses[date('n')-1]. " DEL ".date('Y'); ?> </b></h1>
        <br><br><br><br><br><br>
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
          <h1 style="text-align:center"><b>SOLICITUDES RECIBIDAS Y EXPEDIENTES DETERMINADOS</b></h1>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align:center" colspan="5">SOLICITUDES RECIBIDAS Y EXPEDIENTES INICIADOS</th>
                  </tr>
                  <tr>
                    <th style="text-align:center" rowspan="2">VALORACIÓN JURÍDICA</th>
                    <th style="text-align:center" colspan="2">2023</th>
                    <th style="text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                  </tr>
                  <tr>
                    <th style="text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../administrador/tablas_estadistica/tabla1_reporte_semanal.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <br><br><br><br><br><br><br><br><br><br>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align:center" colspan="5"> EXPEDIENTES DETERMINADOS</th>
                  </tr>
                  <tr>
                    <th style="text-align:center" rowspan="2">DETERMINACIÓN DE LA INCORPORACIÓN</th>
                    <th style="text-align:center" colspan="2">2023</th>
                    <th style="text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                  </tr>
                  <tr>
                    <th style="text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../administrador/tablas_estadistica/tabla2_reporte_semanal.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <!--  -->
        </div>
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
          <h1 style="text-align:center"><b>AUTORIDAD QUE SOLICITA LA INCORPORACIÓN</b></h1>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align:center" rowspan="2">AUTORIDAD SOLICITANTE</th>
                    <th style="text-align:center" colspan="2">2023</th>
                    <th style="text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                  </tr>
                  <tr>
                    <th style="text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // include("../administrador/tablas_estadistica/tabla1_reporte_semanal.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
          <h1 style="text-align:center"><b>TIPO PENAL EN EL QUE SE ENCUENTRA RELACIONADA LA PERSONA PROPUESTA</b></h1>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align:center" rowspan="2">DELITO PRINCIPAL</th>
                    <th style="text-align:center" colspan="2">2023</th>
                    <th style="text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                  </tr>
                  <tr>
                    <th style="text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // include("../administrador/tablas_estadistica/tabla1_reporte_semanal.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--  -->
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
          <h1 style="text-align:center"><b>TIPO DE INTERVENCIÓN EN EL PROCEDIMIENTO PENAL</b></h1>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align:center" rowspan="2">ETAPA DEL PROCEDIMIENTO  PENAL O  RECURSO</th>
                    <th style="text-align:center" colspan="2">2023</th>
                    <th style="text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                  </tr>
                  <tr>
                    <th style="text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // include("../administrador/tablas_estadistica/tabla1_reporte_semanal.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <br><br><br><br><br><br><br>
          <h1 style="text-align:center"><b>MUNICIPIO DE RADICACIÓN DE LA CARPETA DE INVESTIGACIÓN</b></h1>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align:center" rowspan="2">MUNICIPIO</th>
                    <th style="text-align:center" colspan="2">2023</th>
                    <th style="text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                  </tr>
                  <tr>
                    <th style="text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // include("../administrador/tablas_estadistica/tabla1_reporte_semanal.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
        <!--  -->
      </div>
    </div>
  </div>
</div>
