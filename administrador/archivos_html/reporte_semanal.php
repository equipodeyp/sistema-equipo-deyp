<div class="modal fade" id="add_data_Modal_reporte_semanal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg"  style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:90%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 style="text-align:center" class="modal-title" id="myModalLabel">REPORTE SEMANAL</h2>
      </div>
      <div class="modal-body">
        <?php
        $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
        // echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
        $fecha_actual = date("Y-m-d");
        $day = date("l");
        switch ($day) {
            case "Sunday":
                   $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
                   $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 6 day"));
                   ////////////////////fechas de reporte semanal
                   $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
                   $diafinsemant = date( "j", $diafinsemanaanterior);
                   $diainicio = strtotime($fecha_actual);
                   $diaini = date( "j", $diainicio);
                   $diafinal = strtotime($fecha_fin);
                   $diafin = date( "j", $diafinal);
                   echo "<br>";
                   echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
                   echo "<br>";
                   echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
            break;
            case "Monday":
                   $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
                   $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
                   $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 5 day"));
                   ////////////////////fechas de reporte semanal
                   $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
                   $diafinsemant = date( "j", $diafinsemanaanterior);
                   $diainicio = strtotime($fecha_inicio);
                   $diaini = date( "j", $diainicio);
                   $diafinal = strtotime($fecha_fin);
                   $diafin = date( "j", $diafinal);
                   echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
                   echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
            break;
            case "Tuesday":
                   $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
                   $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
                   $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 4 day"));
                   ////////////////////fechas de reporte semanal
                   $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
                   $diafinsemant = date( "j", $diafinsemanaanterior);
                   $diainicio = strtotime($fecha_inicio);
                   $diaini = date( "j", $diainicio);
                   $diafinal = strtotime($fecha_fin);
                   $diafin = date( "j", $diafinal);
                   echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
                   echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
            break;
            case "Wednesday":
                   $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
                   $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
                   $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 3 day"));
                   ////////////////////fechas de reporte semanal
                   $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
                   $diafinsemant = date( "j", $diafinsemanaanterior);
                   $diainicio = strtotime($fecha_inicio);
                   $diaini = date( "j", $diainicio);
                   $diafinal = strtotime($fecha_fin);
                   $diafin = date( "j", $diafinal);
                   echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
                   echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
            break;
            case "Thursday":  //Jueves
                   $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
                   $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
                   $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 2 day"));
                   ////////////////////fechas de reporte semanal
                   $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
                   $diafinsemant = date( "j", $diafinsemanaanterior);
                   $diainicio = strtotime($fecha_inicio);
                   $diaini = date( "j", $diainicio);
                   $diafinal = strtotime($fecha_fin);
                   $diafin = date( "j", $diafinal);
                   // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
                   echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL  "."<br> DEL".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
            break;
            case "Friday": //Viernes
                   $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
                   $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 6 day"));
                   $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 1 day"));
                   ////////////////////fechas de reporte semanal
                   $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
                   $diafinsemant = date( "j", $diafinsemanaanterior);
                   $diainicio = strtotime($fecha_inicio);
                   $diaini = date( "j", $diainicio);
                   $diafinal = strtotime($fecha_fin);
                   $diafin = date( "j", $diafinal);
                   echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
                   echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
            break;
            case "Saturday": //sabado
                   $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 6 day"));
                   $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 7 day"));
                   $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 0 day"));
                   ////////////////////fechas de reporte semanal
                   $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
                   $diafinsemant = date( "j", $diafinsemanaanterior);
                   $diainicio = strtotime($fecha_inicio);
                   $diaini = date( "j", $diainicio);
                   $diafinal = strtotime($fecha_fin);
                   $diafin = date( "j", $diafinal);
                   echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
                   echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
            break;
        }
        ?>
        <!-- cuerpo del contenido de la ventana emergente -->
        <div class="row">
          <!-- PRIMER TABLA -->
          <div class="col-lg-6">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align:center" colspan="5">SOLICITUDES RECIBIDAS Y EXPEDIENTES INICIADOS</th>
                  </tr>
                  <tr>
                    <th style="text-align:center" rowspan="2">CONCEPTO</th>
                    <th style="text-align:center" colspan="2">2023</th>
                    <th style="text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                  </tr>
                  <tr>
                    <th style="text-align:center"><?php echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; ?></th>
                    <th style="text-align:center"><?php echo '<h4 style="text-align:center">'; echo "DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]; echo '</h4>'; ?></th>
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
        <!-- SEGUNDA TABLA -->
          <div class="col-lg-6">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align:center" colspan="5">EXPEDIENTES DETERMINADOS PARA SU INCORPORACIÓN</th>
                  </tr>
                  <tr>
                    <th style="text-align:center" rowspan="2">CONCEPTO</th>
                    <th style="text-align:center" colspan="2">2023</th>
                    <th style="text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                  </tr>
                  <tr>
                    <th style="text-align:center"><?php echo '<H4 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</H4>'; ?></th>
                    <th style="text-align:center"><?php echo '<h4 style="text-align:center">'; echo "DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]; echo '</h4>'; ?></th>
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
        </div>
        <br>
        <div class="row">
          <!-- TERCER TABLA -->
          <div class="col-lg-6">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align:center" rowspan="4" class="bg-success">CALIDAD DENTRO DEL PROGRAMA</th>
                  </tr>
                  <tr>
                    <th style="text-align:center" colspan="3">PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA</th>
                    <th style="text-align:center" colspan="4">SUJETOS INCORPORADOS AL PROGRAMA</th>
                  </tr>
                  <tr>
                    <!-- <th style="text-align:center" rowspan="2">TOTAL <br> 2021 *</th> -->
                    <!-- <th style="text-align:center" rowspan="2">TOTAL <br> 2022 *</th> -->
                    <th style="text-align:center" colspan="2">2023</th>
                    <th style="text-align:center" rowspan="2">TOTAL  <br> ACUMULADO</th>
                    <th style="text-align:center" colspan="2">2023</th>
                    <th style="text-align:center" rowspan="2">TOTAL  <br> ACUMULADO</th>
                  </tr>
                  <tr>
                    <th style="text-align:center"><?php echo '<H4 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</H4>'; ?> </th>
                    <th style="text-align:center"><?php echo '<h4 style="text-align:center">'; echo "DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]; echo '</h4>'; ?> </th>
                    <th style="text-align:center"><?php echo '<H4 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</H4>'; ?> </th>
                    <th style="text-align:center"><?php echo '<h4 style="text-align:center">'; echo "DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]; echo '</h4>'; ?> </th>
                    <!-- <th style="text-align:center">MAR.</th> -->
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
          <!-- CUARTA TABLA -->
          <div class="col-lg-6">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align:center" colspan="5">SEGUIMIENTO A LAS MEDIDAS DE APOYO <?php echo "DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]; ?></th>
                  </tr>
                  <tr>
                    <th style="text-align:center" rowspan="2">CLASIFICACIÓN DE LAS MEDIDAS</th>
                    <th style="text-align:center" colspan="3">ETAPA DENTRO DEL PROGRAMA</th>
                    <!-- <th style="text-align:center" rowspan="2">TOTAL ACUMULADO</th> -->
                  </tr>
                  <tr>
                    <th style="text-align:center">EN EJECUCION</th>
                    <th style="text-align:center">EJECUTADAS</th>
                    <th style="text-align:center">CANCELADAS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // include("../administrador/tablas_estadistica/tabla1_reporte_semanal.php");
                  ?>
                </tbody>
              </table>
            </div>
          <br>
          <!-- QUINTA TABLA -->
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                <thead class="thead-dark">
                  <tr>
                    <th style="text-align:center" colspan="5">MUNICIPIO DE EJECUCIÓN DE LAS MEDIDAS DE APOYO CONCLUÍDAS</th>
                  </tr>
                  <tr>
                    <th style="text-align:center" rowspan="2">MUNICIPIO</th>
                    <th style="text-align:center" colspan="3">CLASIFICACIÓN DE LAS MEDIDAS</th>
                    <th style="text-align:center" rowspan="2">TOTAL</th>
                  </tr>
                  <tr>
                    <th style="text-align:center">ASISTENCIA</th>
                    <th style="text-align:center">RESGUARDO</th>
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
