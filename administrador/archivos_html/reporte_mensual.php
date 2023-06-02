<div class="modal fade" id="add_data_Modal_reporte_mensual" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg"  style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:90%">
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
        // echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
        $mesant = $meses[date('n')-2];
        $mesanterior = date('n')-1;
        $cantidaddiasanterior = cal_days_in_month(CAL_GREGORIAN, $mesanterior, $anioActual);
        echo "fecha inicio";
        echo "<br>";
        echo $fecha_inicio = $anioActual."-01-01";
        echo "<br>";
        echo "fecha anterior";
        echo "<br>";
        echo $fecha_anterior = $anioActual."-".$mesanterior."-".$cantidaddiasanterior;
        echo "<br>";
        echo "dia del mes inicial";
        echo "<br>";
        echo $diamesinicio = $anioActual."-".$mesActual."-01";
        echo "<br>";
        echo "dia del mes final";
        echo "<br>";
        echo $diamesfin = $anioActual."-".$mesActual."-".$cantidadDias;
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
              <table id="tabla1" border="3px" cellspacing="0" width="100%" style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="5">SOLICITUDES RECIBIDAS Y EXPEDIENTES INICIADOS</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">VALORACIÓN JURÍDICA</th>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">2023</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">TOTAL ACUMULADO</th>
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
          <br><br><br><br><br><br><br><br><br><br>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="5"> EXPEDIENTES DETERMINADOS</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">DETERMINACIÓN DE LA INCORPORACIÓN</th>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">2023</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">TOTAL ACUMULADO</th>
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
          <!--  -->
        </div>
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
          <h1 style="text-align:center"><b>AUTORIDAD QUE SOLICITA LA INCORPORACIÓN</b></h1>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">AUTORIDAD SOLICITANTE</th>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">2023</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">TOTAL ACUMULADO</th>
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
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
          <h1 style="text-align:center"><b>TIPO PENAL EN EL QUE SE ENCUENTRA RELACIONADA LA PERSONA PROPUESTA</b></h1>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">DELITO PRINCIPAL</th>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">2023</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">TOTAL ACUMULADO</th>
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
        <!--  -->
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
          <h1 style="text-align:center"><b>TIPO DE INTERVENCIÓN EN EL PROCEDIMIENTO PENAL</b></h1>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">ETAPA DEL PROCEDIMIENTO  PENAL O  RECURSO</th>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">2023</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../administrador/tablas_estadistica/tabla5_reporte_mensual.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <h1 style="text-align:center"><b>MUNICIPIO DE RADICACIÓN DE LA CARPETA DE INVESTIGACIÓN</b></h1>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">MUNICIPIO</th>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">2023</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../administrador/tablas_estadistica/tabla6_reporte_mensual.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
        <!--  -->
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
          <h1 style="text-align:center"><b>PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA Y SUJETOS INCORPORADOS</b></h1>
          <div class="col-lg-6">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <th WIDTH="400" HEIGHT="50" style="border: 5px solid #97897D; text-align:center" rowspan="5" class="bg-success">CALIDAD DENTRO DEL PROGRAMA</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">PERSONAS PROPUESTAS</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">2023</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="3">TOTAL  <br> ACUMULADO</th>
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
          <!--  -->
          <div class="col-lg-6">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <!-- <th style="text-align:center" rowspan="5" class="bg-success">CALIDAD DENTRO DEL PROGRAMA</th> -->
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">SUJETOS INCORPORADOS</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">2023</th>
                  </tr>
                  <tr>
                    <th HEIGHT="82" style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="3">TOTAL  <br> ACUMULADO</th>
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
          <!--  -->
        </div>
        <br><br><br><br>
        <!--  -->
        <div class="row">
          <div class="col-lg-6">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <!-- <th style="text-align:center" rowspan="5" class="bg-success">CALIDAD DENTRO DEL PROGRAMA</th> -->
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">CLASIFICACIÓN POR SEXO</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center">CONCEPTO</th>
                    <th style="border: 5px solid #97897D; text-align:center">PERSONAS PROPUESTAS</th>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="3">SUJETOS INCORPORADOS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../administrador/tablas_estadistica/tabla9_reporte_mensual.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <!--  -->
          <div class="col-lg-6">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <!-- <th style="text-align:center" rowspan="5" class="bg-success">CALIDAD DENTRO DEL PROGRAMA</th> -->
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">CLASIFICACIÓN POR GRUPO DE EDAD</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center">CONCEPTO</th>
                    <th style="border: 5px solid #97897D; text-align:center">PERSONAS PROPUESTAS</th>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="3">SUJETOS INCORPORADOS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../administrador/tablas_estadistica/tabla10_reporte_mensual.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <!--  -->
        </div>
        <!--  -->
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
          <h1 style="text-align:center"><b>MEDIDAS DE APOYO CONCLUIDAS</b></h1>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">CLASIFICACIÓN DE LAS MEDIDAS DE APOYO</th>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">2023</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../administrador/tablas_estadistica/tabla11_reporte_mensual.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--  -->
        <div class="row">
          <h1 style="text-align:center"><b>MEDIDAS DE APOYO CONCLUIDAS POR MUNICIPIO</b></h1>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">MUNICIPIO DE CONCLUSIÓN</th>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="3">2023</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo "DEL 01 DE ENERO<br> AL ".$cantidaddiasanterior. " DE ".$meses[date('n')-2]; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center"><?php echo ''; echo " 01 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></th>
                    <th style="border: 5px solid #97897D; text-align:center" rowspan="2">TOTAL ACUMULADO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../administrador/tablas_estadistica/tabla12_reporte_mensual.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--  -->
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
          <h1 style="text-align:center"><b>RESUMEN DE LOS EXPEDIENTES DE PROTECCIÓN INICIADOS</b></h1>
          <h2 style="text-align:center"><b>DEL 01 DE JUNIO AL 31 DE DICIEMBRE DE 2021</b></h2>
          <div class="col-lg-12">
              <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="border: 5px solid #97897D;">
                  <thead>
                      <tr>
                          <th style="border: 5px solid #97897D; text-align:center; writing-mode: vertical-rl;">CONSECUTIVO</th>
                          <th style="border: 5px solid #97897D; text-align:center">NÚMERO DE EXPEDIENTE</th>
                          <th style="border: 5px solid #97897D; text-align:center">AUTORIDAD SOLICITANTE</th>
                          <th style="border: 5px solid #97897D; text-align:center">FECHA DE RECEPCIÓN</th>
                          <th style="border: 5px solid #97897D; text-align:center">DELITO PRINCIPAL</th>
                          <th style="border: 5px solid #97897D; text-align:center">PERSONAS PROPUESTAS</th>
                          <th style="border: 5px solid #97897D; text-align:center">SUJETOS INCORPORADOS</th>
                          <th style="border: 5px solid #97897D; text-align:center">TOTAL DE MEDIDAS OTORGADAS</th>
                          <th style="border: 5px solid #97897D; text-align:center">ESTATUS DEL EXPEDIENTE</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../administrador/tablas_estadistica/tabla13_reporte_mensual.php");
                    ?>
                  </tbody>
                 </table>
              </div>
          </div>
        </div>
        <!--  -->
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
          <h1 style="text-align:center"><b>RESUMEN DE LOS EXPEDIENTES DE PROTECCIÓN INICIADOS</b></h1>
          <h2 style="text-align:center"><b>DEL 01 DE JUNIO AL 31 DE DICIEMBRE DE 2022</b></h2>
          <div class="col-lg-12">
              <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="border: 5px solid #97897D;">
                  <thead>
                      <tr>
                          <th style="border: 5px solid #97897D; text-align:center; writing-mode: vertical-rl;">CONSECUTIVO</th>
                          <th style="border: 5px solid #97897D; text-align:center">NÚMERO DE EXPEDIENTE</th>
                          <th style="border: 5px solid #97897D; text-align:center">AUTORIDAD SOLICITANTE</th>
                          <th style="border: 5px solid #97897D; text-align:center">FECHA DE RECEPCIÓN</th>
                          <th style="border: 5px solid #97897D; text-align:center">DELITO PRINCIPAL</th>
                          <th style="border: 5px solid #97897D; text-align:center">PERSONAS PROPUESTAS</th>
                          <th style="border: 5px solid #97897D; text-align:center">SUJETOS INCORPORADOS</th>
                          <th style="border: 5px solid #97897D; text-align:center">TOTAL DE MEDIDAS OTORGADAS</th>
                          <th style="border: 5px solid #97897D; text-align:center">ESTATUS DEL EXPEDIENTE</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../administrador/tablas_estadistica/tabla14_reporte_mensual.php");
                    ?>
                  </tbody>
                 </table>
              </div>
          </div>
        </div>
        <!--  -->
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
          <h1 style="text-align:center"><b>RESUMEN DE LOS EXPEDIENTES DE PROTECCIÓN INICIADOS</b></h1>
          <h2 style="text-align:center"><b><?php echo ''; echo "DEL 01 DE ENERO AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></b></h2>
          <div class="col-lg-12">
              <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="border: 5px solid #97897D;">
                  <thead>
                      <tr>
                          <th style="border: 5px solid #97897D; text-align:center; writing-mode: vertical-rl;">CONSECUTIVO</th>
                          <th style="border: 5px solid #97897D; text-align:center">NÚMERO DE EXPEDIENTE</th>
                          <th style="border: 5px solid #97897D; text-align:center">AUTORIDAD SOLICITANTE</th>
                          <th style="border: 5px solid #97897D; text-align:center">FECHA DE RECEPCIÓN</th>
                          <th style="border: 5px solid #97897D; text-align:center">DELITO PRINCIPAL</th>
                          <th style="border: 5px solid #97897D; text-align:center">PERSONAS PROPUESTAS</th>
                          <th style="border: 5px solid #97897D; text-align:center">SUJETOS INCORPORADOS</th>
                          <th style="border: 5px solid #97897D; text-align:center">TOTAL DE MEDIDAS OTORGADAS</th>
                          <th style="border: 5px solid #97897D; text-align:center">ESTATUS DEL EXPEDIENTE</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../administrador/tablas_estadistica/tabla15_reporte_mensual.php");
                    ?>
                  </tbody>
                 </table>
              </div>
          </div>
        </div>
        <!--  -->
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
          <h1 style="text-align:center"><b>RESUMEN GLOBAL DEL PROGRAMA</b></h1>
          <h2 style="text-align:center"><b><?php echo ''; echo "DEL 01 DE JUNIO DEL 2021 AL ".$cantidadDias. " DE ".$meses[date('n')-1]; echo ''; ?></b></h2>
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="2">EXPEDIENTES DE PROTECCIÓN INICIADOS</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center">ETAPA DENTRO DEL PROGRAMA</th>
                    <th style="border: 5px solid #97897D; text-align:center">TOTAL ACUMULADO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../administrador/tablas_estadistica/tabla16_reporte_mensual.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <!--  -->
        </div>
        <br><br>
        <div class="row">
          <div class="col-lg-8">
            <div class="table-responsive">
              <table id="tabla1" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead class="thead-dark">
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center" colspan="2">PERSONAS QUE SOLICITARON INCORPORARSE</th>
                  </tr>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center">ETAPA DENTRO DEL PROGRAMA</th>
                    <th style="border: 5px solid #97897D; text-align:center">TOTAL ACUMULADO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../administrador/tablas_estadistica/tabla17_reporte_mensual.php");
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
        <br><br>
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="rdestatusmedidas" border="1px" cellspacing="0" width="100%" bordered style="border: 5px solid #97897D;">
                <thead>
                  <h3></h3>
                  <tr>
                    <th style="border: 5px solid #97897D; text-align:center">ESTATUS DE LAS MEDIDAS DE APOYO DICTAMINADAS</th>
                    <th style="border: 5px solid #97897D; text-align:center">EN EJECUCION</th>
                    <th style="border: 5px solid #97897D; text-align:center">EJECUTADA</th>
                    <th style="border: 5px solid #97897D; text-align:center">CANCELADA</th>
                    <th style="border: 5px solid #97897D; text-align:center">TOTAL<br /> ACUMULADO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../administrador/tablas_estadistica/tabla18_reporte_mensual.php");
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--  -->
        <div class="row">
          <h1>---------------------------------------------------------------------------------------------------------------------------------------------</h1>
        </div>
        <!--  -->
      </div>
    </div>
  </div>
</div>
