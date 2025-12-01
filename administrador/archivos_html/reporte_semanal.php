<div class="modal fade" id="add_data_Modal_reporte_semanal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg"  style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:90%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 style="text-align:center" class="modal-title" id="myModalLabel">REPORTE SEMANAL</h2>
      </div>
      <div class="modal-body">
        <form action="../administrador/archivos_html/prueba_reportesemanal.php" method="POST">
          <button class="btn-flotante-nuevo-exp" type="submit">GENERAR PDF</button><br><br>
          <div class="well form-horizontal" style="border: 5px solid #63696D;">
            <img style="float: left;" src="../image/ESCUDO.png" width="60" height="50">
            <img style="float: right;" src="../image/FGJEM.png" width="50" height="50">
            <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
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
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                       } else {
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                       }
                       /////////////////////////////////////////////////////////
                       if ($diaini < 10) {
                         $diaini = '0'.$diaini;
                       }else {
                         $diaini = $diaini;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diafin < 10) {
                         $diafin = '0'.$diafin;
                       }else {
                         $diafin = $diafin;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diaini > $diafin) {
                         // echo $mostrar = "inicio es mayor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n', strtotime('-1 month')).'-'.$diaini-1;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n', strtotime('-1 month')).'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y-m-d', strtotime('+0 day'));

                       } else {
                         // echo $mostrar = "inicio es menor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n').'-'.$diaini-1;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini+6;
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
                       /////////////////////////////////////////////////////////
                       if ($diaini < 10) {
                         $diaini = '0'.$diaini;
                       }else {
                         $diaini = $diaini;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diafin < 10) {
                         $diafin = '0'.$diafin;
                       }else {
                         $diafin = $diafin;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diaini > $diafin) {
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                       } else {
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                       }
                       if ($diaini > $diafin) {
                         // echo $mostrar = "inicio es mayor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n', strtotime('-0 month')).'-'.$fecha_finsemanaanterior;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n', strtotime('-0 month')).'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y-m-d', strtotime('+6 day'));

                       } else {
                         // echo $mostrar = "inicio es menor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n').'-'.$diafinsemant;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y').'-'.date('n').'-'.$diafin;
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
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                       } else {
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                       }
                       /////////////////////////////////////////////////////////
                       if ($diaini < 10) {
                         $diaini = '0'.$diaini;
                       }else {
                         $diaini = $diaini;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diafin < 10) {
                         $diafin = '0'.$diafin;
                       }else {
                         $diafin = $diafin;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diaini > $diafin) {
                         // echo $mostrar = "inicio es mayor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n', strtotime('-0 month')).'-'.$diaini-1;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n', strtotime('-0 month')).'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y-m-d', strtotime('+5 day'));

                       } else {
                         // echo $mostrar = "inicio es menor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n').'-'.$diaini-1;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini+6;
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
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                       } else {
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                       }
                       /////////////////////////////////////////////////////////
                       if ($diaini < 10) {
                         $diaini = '0'.$diaini;
                       }else {
                         $diaini = $diaini;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diafin < 10) {
                         $diafin = '0'.$diafin;
                       }else {
                         $diafin = $diafin;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diaini > $diafin) {
                         // echo $mostrar = "inicio es mayor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n', strtotime('-0 month')).'-'.$diaini-1;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n', strtotime('-0 month')).'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y-m-d', strtotime('+4 day'));

                       } else {
                         // echo $mostrar = "inicio es menor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n').'-'.$diaini-1;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini+6;
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
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                       } else {
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                       }
                       /////////////////////////////////////////////////////////
                       if ($diaini < 10) {
                         $diaini = '0'.$diaini;
                       }else {
                         $diaini = $diaini;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diafin < 10) {
                         $diafin = '0'.$diafin;
                       }else {
                         $diafin = $diafin;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diaini > $diafin) {
                         // echo $mostrar = "inicio es mayor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n', strtotime('-0 month')).'-'.$diaini-1;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n', strtotime('-0 month')).'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y-m-d', strtotime('+3 day'));

                       } else {
                         // echo $mostrar = "inicio es menor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n').'-'.$diaini-1;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini+6;
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
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                       } else {
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                       }
                       /////////////////////////////////////////////////////////
                       if ($diaini < 10) {
                         $diaini = '0'.$diaini;
                       }else {
                         $diaini = $diaini;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diafin < 10) {
                         $diafin = '0'.$diafin;
                       }else {
                         $diafin = $diafin;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diaini > $diafin) {
                         // echo $mostrar = "inicio es mayor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n', strtotime('-0 month')).'-'.$diaini-1;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n', strtotime('-0 month')).'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y-m-d', strtotime('+2 day'));

                       } else {
                         // echo $mostrar = "inicio es menor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n').'-'.$diaini-1;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini+6;
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
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                       } else {
                        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                       }
                       /////////////////////////////////////////////////////////
                       if ($diaini < 10) {
                         $diaini = '0'.$diaini;
                       }else {
                         $diaini = $diaini;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diafin < 10) {
                         $diafin = '0'.$diafin;
                       }else {
                         $diafin = $diafin;
                       }
                       /////////////////////////////////////////////////////////
                       if ($diaini > $diafin) {
                         // echo $mostrar = "inicio es mayor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n', strtotime('-1 month')).'-'.$diaini-1;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n', strtotime('-1 month')).'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y-m-d', strtotime('+1 day'));

                       } else {
                         // echo $mostrar = "inicio es menor";
                         // echo "<br>";
                         $fechainicio_pdf =date('Y').'-01-01';
                         // echo "<br>";
                         $fechafin_pdf =date('Y').'-'.date('n').'-'.$diaini-1;
                         // echo "<br>";
                         $fechainicial_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini;
                         // echo "<br>";
                         $fechafinal_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini+6;
                       }
                break;
            }
            ?>
            <div class="row" style="display:none;">
              <div class="col-md-3 mb-3 validar">
                    <label for="SIGLAS DE LA UNIDAD">FECHA INICIO<span ></span></label>
                    <input class="form-control" name="dateprinc" placeholder="" type="date" value="<?php echo $fechainicio_pdf; ?>" maxlength="50" readonly>
              </div>
              <div class="col-md-3 mb-3 validar">
                    <label for="SIGLAS DE LA UNIDAD">FECHA FIN<span ></span></label>
                    <input class="form-control" name="datefinprinc" placeholder="" type="date" value="<?php echo $fechafin_pdf; ?>" maxlength="50" readonly>
              </div>
              <div class="col-md-3 mb-3 validar">
                    <label for="SIGLAS DE LA UNIDAD">FECHA INICIO REPORTE<span ></span></label>
                    <input class="form-control" name="daterepini" placeholder="" type="date" value="<?php echo $fechainicial_reporte_pdf; ?>" maxlength="50" readonly>
              </div>
              <div class="col-md-3 mb-3 validar">
                    <label for="SIGLAS DE LA UNIDAD">FECHA FIN REPORTE<span ></span></label>
                    <input class="form-control" name="daterepfin" placeholder="" type="date" value="<?php echo $fechafinal_reporte_pdf; ?>" maxlength="50" readonly>
              </div>
            </div>
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
                  <textarea style="resize: none;" name="name" rows="3" cols="87" placeholder="En caso de nota agregar aqui"></textarea>
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
                        <th style="text-align:center" colspan="2"><?php echo $year; ?></th>
                        <th style="text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                      </tr>
                      <tr>
                        <th style="text-align:center"><?php echo '<H4 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</H4>'; ?></th>
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
                      include("../administrador/tablas_estadistica/tabla2_reporte_semanal.php");
                      ?>
                    </tbody>
                  </table>
                  <br>
                  <textarea style="resize: none;" name="name" rows="3" cols="87" placeholder="En caso de nota agregar aqui"></textarea>
                </div>
              </div>
              <br>
            </div>
            <div class="row">
              <!-- TERCER TABLA -->
              <div class="col-lg-7">
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
                        <th style="text-align:center" colspan="2"><?php echo $year; ?></th>
                        <th style="text-align:center" rowspan="2">TOTAL  <br> ACUMULADO</th>
                        <th style="text-align:center" colspan="2"><?php echo $year; ?></th>
                        <th style="text-align:center" rowspan="2">TOTAL  <br> ACUMULADO</th>
                      </tr>
                      <tr>
                        <th style="text-align:center"><?php echo '<H4 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</H4>'; ?> </th>
                        <th style="text-align:center"><?php
                        if ($diaini > $diafin) {
                            echo "DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                          } else {
                              echo "DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                            }
                        ?> </th>
                        <th style="text-align:center"><?php echo '<H4 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</H4>'; ?> </th>
                        <th style="text-align:center"><?php
                        if ($diaini > $diafin) {
                            echo "DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                          } else {
                              echo "DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                            }
                        ?> </th>
                        <!-- <th style="text-align:center">MAR.</th> -->
                      </tr>

                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla3_reporte_semanal.php");
                      ?>
                    </tbody>
                  </table>
                  <br>
                  <textarea style="resize: none;" name="name" rows="3" cols="87" placeholder="En caso de nota agregar aqui"></textarea>
                </div>
              </div>
              <!-- CUARTA TABLA -->
              <div class="col-lg-5">
                <div class="table-responsive">
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                    <thead class="thead-dark">
                      <tr>
                        <th style="text-align:center" colspan="5">SEGUIMIENTO A LAS MEDIDAS DE APOYO <?php
                        if ($diaini > $diafin) {
                            echo "DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
                          } else {
                              echo "DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
                            }
                        ?></th>
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
                      include("../administrador/tablas_estadistica/tabla4_reporte_semanal.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              <br>
              <!-- QUINTA TABLA -->
              <?php
              $validarmedejecutadas = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin'";
              $rvalidarmedejecutadas = $mysqli->query($validarmedejecutadas);
              $fvalidarmedejecutadas = $rvalidarmedejecutadas->fetch_assoc();
              if ($fvalidarmedejecutadas['t'] > 0) {
              ?>
                <div class="table-responsive">
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                    <thead class="thead-dark">
                      <tr>
                        <th style="text-align:center" colspan="5">MUNICIPIO DE EJECUCIÓN DE LAS MEDIDAS DE APOYO CONCLUÍDAS</th>
                      </tr>
                      <tr>
                        <th style="text-align:center" rowspan="2">MUNICIPIO</th>
                        <th style="text-align:center" colspan="2">CLASIFICACIÓN DE LAS MEDIDAS</th>
                        <th style="text-align:center" rowspan="2">TOTAL</th>
                      </tr>
                      <tr>
                        <th style="text-align:center">ASISTENCIA</th>
                        <th style="text-align:center">RESGUARDO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla5_reporte_semanal.php");
                      ?>
                    </tbody>
                  </table>
                </div>
                <?php
                }
                ?>
              </div>
            </div>
            <br>
            <div class="contenedor-flex">
              <label class="izquierda">*NOTA: Cifras sujetas a cambios por actualización</label>
              <label class="derecha" style="font-size: 23px; color: white; background-color: #63696D; border-radius: 40% 40% 5% 5%;">&nbsp;&nbsp;1/2&nbsp;&nbsp;</label>
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
          <!-- segunda pagina -->
          <div class="well form-horizontal" style="border: 5px solid #63696D;">
            <img style="float: left;" src="../image/FGJEM.png" width="50" height="50">
            <img style="float: right;" src="../image/ESCUDO.png" width="60" height="50">
            <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
            <h1 style="text-align:center; color: #030303;">Reporte Global Semanal <br> DEL 01 DE JUNIO DEL 2021 AL <?php echo $diafin.' DE '.$meses[date('n')].' DEL '.date('Y'); ?></h1>
            <!--  -->
            <div class="row">
              <div class="col-lg-4">
                <div class="table-responsive">
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                    <thead class="thead-dark">
                      <tr>
                        <th style="text-align:center" colspan="2">EXPEDIENTES DE PROTECCIÓN</th>
                      </tr>
                      <tr>
                        <th style="text-align:center">ETAPA DENTRO DEL PROGRAMA</th>
                        <th style="text-align:center">TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla6_reporte_semanal.php");
                      ?>
                    </tbody>
                  </table>
                  <br>
                  <textarea style="resize: none;" name="name" rows="3" cols="47" placeholder="En caso de nota agregar aqui"></textarea>
                </div>
              </div>
              <!--  -->
              <div class="col-lg-2">

              </div>
              <div class="col-lg-6">
                <div class="col-lg-11">
                  <div class="table-responsive">
                    <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                      <thead class="thead-dark">
                        <tr>
                          <th style="text-align:center" colspan="2">PERSONAS QUE SOLICITARON INCORPORARSE</th>
                        </tr>
                        <tr>
                          <th style="text-align:center">ETAPA DENTRO DEL PROGRAMA</th>
                          <th style="text-align:center">TOTAL</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include("../administrador/tablas_estadistica/tabla7_reporte_semanal.php");
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-lg-12"><br>
                  <strong><sup>1</sup> Corresponde a los siguientes casos:<br>
                    a) La solicitud no cumple con los requisitos de Ley<br>
                    b) La persona manifiesta negativa de voluntariedad para incorporarse<br>
                    c) Se determina la no procedencia de incorporación<br>
                    <sup>2</sup> Se refiere a las personas que se encuentran en los siguientes supuestos:<br>
                    a) Concluyó su participación dentro del Proceso Penal<br>
                    b) Renuncia voluntaria<br>
                    c) Determinación de disminución o cese del riesgo</strong>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="table-responsive">
                  <table id="rdestatusmedidas" border="1px" cellspacing="0" width="100%" bordered class="col-lg-12">
                    <thead>
                      <h3></h3>
                      <tr>
                        <th style="text-align:center">ESTATUS DE LAS MEDIDAS DE APOYO DICTAMINADAS</th>
                        <th style="text-align:center">EN EJECUCION</th>
                        <th style="text-align:center">EJECUTADA</th>
                        <th style="text-align:center">CANCELADA</th>
                        <th style="text-align:center">TOTAL<br /> ACUMULADO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla_estatus_medidas.php");
                      ?>
                    </tbody>
                  </table>

                </div>
              </div>
              <!--  -->
              <div class="col-lg-6">
                <br>
                <div class="table-responsive">
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered>
                    <thead class="thead-dark">
                      <tr>
                        <th style="text-align:center" >DESCRIPCIÓN</th>
                        <th style="text-align:center" >SUJETOS INCORPORADOS*</th>
                        <th style="text-align:center" >SUJETOS EN CENTROS DE RESGUARDO**</th>
                      </tr>
                      <!-- <tr>
                        <th style="text-align:center">ETAPA DENTRO DEL PROGRAMA</th>
                        <th style="text-align:center">TOTAL</th>
                      </tr> -->
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla9_reporte_semanal.php");
                      ?>
                    </tbody>
                  </table>
                  <span>* Comprende todos los sujetos incorporados independientemente de su estatus actual dentro del Programa <br>
                        ** Se refiere a los sujetos incorporados que les ha sido asignada la medida de resguardo "Alojamiento Temporal" ya sea que se encuentren activos o no dentro del Programa</span>
                </div>
              </div>
              <!--  -->
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="table-responsive">
                  <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered class="col-lg-7">
                    <thead class="thead-dark">
                      <tr>
                        <th style="text-align:center" colspan="3">SUJETO EN RESGUARDO ACTIVOS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../administrador/tablas_estadistica/tabla8_reporte_semanal.php");
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="contenedor-flex">
              <label class="izquierda">*NOTA: Cifras sujetas a cambios por actualización</label>
              <label class="derecha" style="font-size: 23px; color: white; background-color: #63696D; border-radius: 40% 40% 5% 5%;">&nbsp;&nbsp;2/2&nbsp;&nbsp;</label>
              </div>
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
                  <th width="80%" align="left" bgcolor="#63696D">
                    <h5 class=""></font></span>
                    <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio
                    </font></span></h5>
                  </th>
                  <th width="20%" align="left" bgcolor="#63696D">
                    <h5 class=""></font></span>
                    <span style="font-size: .95em; align:left; color:white;"><font style="font-family: gothambook">
                    Subdirección de Estadística y Pre-Registro
                    </font></span></h5>
                  </th>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- fin de páginas -->
        </form>
      </div>
    </div>
  </div>
</div>
