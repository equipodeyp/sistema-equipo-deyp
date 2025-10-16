<div class="modal fade" id="add_data_Modal_reporte_semanal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg"  style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:90%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 style="text-align:center" class="modal-title" id="myModalLabel">REPORTE SEMANAL</h2>
      </div>
      <div class="modal-body">
        <!-- <div class="container"> -->
          <div class="well form-horizontal">
            <!-- <div class=""> -->
              <img style="float: left;" src="../image/FGJEM.png" width="50" height="50">
              <img style="float: right;" src="../image/ESCUDO.png" width="60" height="50">
              <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
              <form action="../administrador/archivos_html/prueba_reportesemanal.php" method="POST">
                <?php
                $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
                // echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
                $fecha_actual = date("Y-m-d");
                $year = date("Y");
                $day = date("l");
                switch ($day) {
                    case "Sunday"://DOMINGO
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
                           if ($diaini > $diafin) {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                           } else {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                           }
                    break;
                    case "Monday"://LUNES
                           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual));
                           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
                           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 6 day"));
                           ////////////////////fechas de reporte semanal
                           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
                           $diafinsemant = date( "j", $diafinsemanaanterior);
                           $diainicio = strtotime($fecha_inicio);
                           $diaini = date( "j", $diainicio);
                           $diafinal = strtotime($fecha_fin);
                           $diafin = date( "j", $diafinal);
                           if ($diaini > $diafin) {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                           } else {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                           }
                    break;
                    case "Tuesday"://MARTES
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
                           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
                           if ($diaini > $diafin) {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                           } else {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                           }
                    break;
                    case "Wednesday"://MIERCOLES
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
                           if ($diaini > $diafin) {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                           } else {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                           }
                    break;
                    case "Thursday":  //Jueves
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
                           if ($diaini > $diafin) {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                           } else {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                           }
                    break;
                    case "Friday": //Viernes
                    // echo "reporte semanal fechas";
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
                           if ($diaini > $diafin) {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                           } else {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                           }
                    break;
                    case "Saturday": //sabado
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
                           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
                           if ($diaini > $diafin) {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                           } else {
                            echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                           }
                    break;
                }
                ?>
                <button class="btn btn-success" type="submit">GENERAR PDF</button><br><br><br>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="table-responsive">
                      <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                        <thead class="thead-dark">
                          <tr>
                            <th style="text-align:center" colspan="5">SOLICITUDES RECIBIDAS Y EXPEDIENTES INICIADOS</th>
                          </tr>
                          <tr>
                            <th style="text-align:center" rowspan="2">CONCEPTO</th>
                            <th style="text-align:center" colspan="2"><?php echo $year; ?></th>
                            <th style="text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                          </tr>
                          <tr>
                            <th style="text-align:center"><?php echo "DEL 1 DE ENERO<br> AL ".$diafinsemant. " DE ".$meses[date('n')-1]; ?></th>
                            <th style="text-align:center"><?php
                              if ($diaini > $diafin) {
                                echo "DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                              } else {
                                  echo "DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                                }
                             ?></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include("../administrador/tablas_estadistica/tabla1_reporte_semanal.php");
                          ?>
                        </tbody>
                      </table>
                      <br>
                      <textarea name="name" rows="5" cols="87" placeholder="En caso de alguna  nota agregar aqui" style="resize: none;"></textarea>
                    </div>
                  </div>

                </div>
              </form>
            <!-- </div> -->

          </div>

        <!-- </div> -->

        <!--  -->
      </div>
    </div>
  </div>
</div>
