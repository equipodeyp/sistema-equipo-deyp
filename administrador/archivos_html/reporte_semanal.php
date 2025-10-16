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

                           echo "<br>";
                           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
                           echo "<br>";
                           echo '<h1 style="text-align:center">' ; echo "<b>"; echo "REPORTE SEMANAL <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo "</b>"; echo '</h1>';
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
              </form>
            <!-- </div> -->

          </div>

        <!-- </div> -->

        <!--  -->
      </div>
    </div>
  </div>
</div>
