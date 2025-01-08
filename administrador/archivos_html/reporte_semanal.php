<div class="modal fade" id="add_data_Modal_reporte_semanal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg"  style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:90%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 style="text-align:center" class="modal-title" id="myModalLabel">REPORTE SEMANAL</h2>
      </div>
      <div class="modal-body">
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
        <!-- cuerpo del contenido de la ventana emergente -->
        <button class="btn btn-success" type="submit">Create PDF</button>
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
            </div>
          </div>
          <!-- CUARTA TABLA -->
          <div class="col-lg-6">
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
        <!--  -->
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
        </div>
        <div class="row">
          <h1 style="text-align:center"><b> REPORTE GLOBAL SEMANAL
            <br> DEL 01 DE JUNIO DEL 2021 AL <?php  echo " ".$diafin." DE ".$meses[date('n')-1]. " DEL ".date('Y') ; ?> </b>
          </h1>
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
            </div>
          </div>
          <!--  -->
          <div class="col-lg-4">
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
          <div class="col-lg-4">
            <span>1.-Corresponde a los siguientes casos:<br>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp a) La solicitud no cumple con los requisitos de Ley<br>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp b) La persona manifiesta negativa de voluntariedad para incorporarse<br>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp c) Se determina la no procedencia de incorporación<br>
                  2.-Se refiere a las personas que se encuentran en los siguientes supuestos:<br>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp a) Concluyó su participación dentro del Proceso Penal<br>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp b) Renuncia voluntaria<br>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp c) Determinación de disminución o cese del riesgo</span>
          </div>
        </div>
        <br>
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
        <!-- button -->
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
        </div>

      </form>
        <!--  -->
      </div>
    </div>
  </div>
</div>
