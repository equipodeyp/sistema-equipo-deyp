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
        $mesesminusculas = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        // echo " ".date('d')." DE ".$meses[date('n')]. " DEL ".date('Y') ;
        $mesant = $meses[date('n')];
        $mesanterior = date('n')-1;
        $cantidaddiasanterior = cal_days_in_month(CAL_GREGORIAN, $mesanterior, $anioActual);
        $fecha_inicio = $anioActual."-01-01";
        $fecha_anterior = $anioActual."-".$mesanterior."-".$cantidaddiasanterior;
        $diamesinicio = $anioActual."-".$mesActual."-01";
        $diamesfin = $anioActual."-".$mesActual."-".$cantidadDias;
        ?>
        <form action="../administrador/archivos_html/get_reportemensual.php" method="POST">
          <button class="btn-flotante-nuevo-exp" type="submit">GENERAR PDF</button><br><br>
          <!-- PRIMER HOJA -->
          <div class="well form-horizontal" style="border: 5px solid #63696D;">
            <?php include('header_reporte_mensual.php'); ?>
            <!-- contenido -->

            <br>
            <!-- <div class="col-md-12"> -->
              <table width="100%" border="3px" cellspacing="0" bordered>
                <thead>
                  <tr style="border: 3px solid black;">
                    <th style="border: 3px solid black;" width="100%" colspan="4">
                      <b>
                        <h2 style="text-align:center;">SOLICITUDES DE INCORPORACIÓN RECIBIDAS</h2>
                      </b>
                    </th>
                  </tr>
                  <tr style="border: 3px solid black;">
                    <th style="border: 3px solid black;" width="64%">
                      <b>
                        <h2 style="text-align:center;">Autoridad Solicitante</h2>
                      </b>
                    </th>
                    <th style="border: 3px solid black;" width="12%">
                      <b>
                        <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-2]; ?></h2>
                      </b>
                    </th>
                    <th style="border: 3px solid black;" width="12%">
                      <b>
                        <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-1]; ?></h2>
                      </b>
                    </th>
                    <th style="border: 3px solid black;" width="12%">
                      <b>
                        <h2 style="text-align:center;">Total</h2>
                      </b>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../administrador/tablas_estadistica/tabla1_reporte_mensual.php");
                  ?>
                </tbody>
              </table>
            <!-- </div> -->
            <br>
            <div style="display: flex; justify-content: space-between; gap: 40px; align-items: flex-start;">
              <!-- COLUMNA IZQUIERDA (2 tablas una debajo de otra) -->
              <div style="display: flex; flex-direction: column; gap: 20px; flex: 1;">
                <table width="100%" border="3px" cellspacing="0" bordered>
                  <thead>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="100%" colspan="4">
                        <b>
                          <h2 style="text-align:center;">PERSONAS PROPUESTAS PARA SU INCORPORACIÓN</h2>
                        </b>
                      </th>
                    </tr>
                    <tr style="border: 3px solid black;">
                      <th width="64%">
                        <b>
                          <h2 style="text-align:center;">Calidad del Sujeto dentro del Programa</h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-2]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-1]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;">Total</h2>
                        </b>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../administrador/tablas_estadistica/tabla2_reporte_mensual.php");
                    ?>
                  </tbody>
                </table>
                <table width="100%" border="3px" cellspacing="0" bordered>
                  <thead>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="100%" colspan="4">
                        <b>
                          <h2 style="text-align:center;">SUJETOS INCORPORADOS<sup>2</sup></h2>
                        </b>
                      </th>
                    </tr>
                    <tr>
                      <th style="border: 3px solid black;" width="64%">
                        <b>
                          <h2 style="text-align:center;">Calidad del Sujeto dentro del Programa</h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-2]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-1]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;">Total</h2>
                        </b>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../administrador/tablas_estadistica/tabla4_reporte_mensual.php");
                    ?>
                  </tbody>
                  <tfoot style="border: 3px solid white; background-color: #f1f1f1; font-weight: bold;">
                    <tr>
                      <td colspan="100%">
                        <sup>2</sup>La incorporación se da mediante la formalización del Convenio de Entendimiento
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- COLUMNA DERECHA (3 tablas una debajo de otra) -->
              <div style="display: flex; flex-direction: column; gap: 20px; flex: 1;">
                <table width="100%" border="3px" cellspacing="0" bordered>
                  <thead>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="100%" colspan="4">
                        <b>
                          <h2 style="text-align:center;">PERSONAS PROPUESTAS NO INCORPORADAS<sup>1</sup></h2>
                        </b>
                      </th>
                    </tr>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="64%">
                        <b>
                          <h2 style="text-align:center;">Calidad del Sujeto dentro del Programa</h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-2]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-1]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;">Total</h2>
                        </b>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../administrador/tablas_estadistica/tabla3_reporte_mensual.php");
                    ?>
                  </tbody>
                  <tfoot style="border: 3px solid white; background-color: #f1f1f1; font-weight: bold;">
                    <tr>
                      <td colspan="100%">
                        <sup>1</sup> Corresponde a los siguientes casos: <br>
                        &nbsp;&nbsp;&nbsp; a) La solicitud no cumple con los requisitos de Ley.<br>
                        &nbsp;&nbsp;&nbsp; b) La persona manifiesta negativa de voluntariedad para incorporarse.<br>
                        &nbsp;&nbsp;&nbsp; c) Se determina la no procedencia de incorporación.
                      </td>
                    </tr>
                  </tfoot>
                </table>
                <table width="100%" border="3px" cellspacing="0" bordered>
                  <thead>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="100%" colspan="4">
                        <b>
                          <h2 style="text-align:center;">SUJETOS DESINCORPORADOS<sup>3</sup></h2>
                        </b>
                      </th>
                    </tr>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="64%">
                        <b>
                          <h2 style="text-align:center;">Calidad del Sujeto dentro del Programa</h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-2]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-1]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;">Total</h2>
                        </b>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../administrador/tablas_estadistica/tabla5_reporte_mensual.php");
                    ?>
                  </tbody>
                  <tfoot style="border: 3px solid white; background-color: #f1f1f1; font-weight: bold;">
                    <tr>
                      <td colspan="100%">
                        <sup>3</sup> Se refiere a los Sujetos Protegidos que se encuentran en los siguientes supuestos: <br>
                        &nbsp;&nbsp;&nbsp; a) Concluyó su participación dentro del Proceso Penal;<br>
                        &nbsp;&nbsp;&nbsp; b) Renuncia voluntaria<br>
                        &nbsp;&nbsp;&nbsp; c) Determinación de disminución o cese del riesgo.
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <!-- SEGUNDA HOJA -->
          <div class="well form-horizontal" style="border: 5px solid #63696D;">
            <?php include('header_reporte_mensual.php'); ?>
            <!-- contenido -->
            <br>
            <div style="display: flex; justify-content: space-between; gap: 40px; align-items: flex-start;">
              <!-- COLUMNA IZQUIERDA (2 tablas una debajo de otra) -->
              <div style="display: flex; flex-direction: column; gap: 20px; flex: 1;">
                <table width="100%" border="3px" cellspacing="0" bordered>
                  <thead>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="100%" colspan="4">
                        <b>
                          <h2 style="text-align:center;">SUJETOS QUE FINALIZARON SU ESTANCIA EN EL CENTRO DE RESGUARDO </h2>
                        </b>
                      </th>
                    </tr>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="64%">
                        <b>
                          <h2 style="text-align:center;">Calidad del Sujeto dentro del Programa</h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-2]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-1]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;">Total</h2>
                        </b>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../administrador/tablas_estadistica/tabla6_reporte_mensual.php");
                    ?>
                  </tbody>
                </table>

                <table width="100%" border="3px" cellspacing="0" bordered>
                  <thead>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="100%" colspan="4">
                        <b>
                          <h2 style="text-align:center;">ASISTENCIAS MÉDICAS OTORGADAS</h2>
                        </b>
                      </th>
                    </tr>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="64%">
                        <b>
                          <h2 style="text-align:center;">Servicio</h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-2]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-1]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;">Total</h2>
                        </b>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../administrador/tablas_estadistica/tabla8_reporte_mensual.php");
                    ?>
                  </tbody>
                </table>
              </div>

              <!-- COLUMNA DERECHA (3 tablas una debajo de otra) -->
              <div style="display: flex; flex-direction: column; gap: 20px; flex: 1;">
                <table width="100%" border="3px" cellspacing="0" bordered>
                  <thead>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="100%" colspan="4">
                        <b>
                          <h2 style="text-align:center;">MEDIDAS DE APOYO EJECUTADAS</h2>
                        </b>
                      </th>
                    </tr>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;"width="64%">
                        <b>
                          <h2 style="text-align:center;">Municipio</h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-2]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-1]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;">Total</h2>
                        </b>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../administrador/tablas_estadistica/tabla7_reporte_mensual.php");
                    ?>
                  </tbody>
                </table>

                <table width="100%" border="3px" cellspacing="0" bordered>
                  <thead>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="100%" colspan="4">
                        <b>
                          <h2 style="text-align:center;">TRASLADOS REALIZADOS POR LA PDI</h2>
                        </b>
                      </th>
                    </tr>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="64%">
                        <b>
                          <h2 style="text-align:center;">Servicio</h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-2]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-1]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;">Total</h2>
                        </b>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../administrador/tablas_estadistica/tabla9_reporte_mensual.php");
                    ?>
                  </tbody>
                </table>

                <table width="100%" border="3px" cellspacing="0" bordered>
                  <thead>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="100%" colspan="4">
                        <b>
                          <h2 style="text-align:center;">RONDINES REALIZADOS POR LA PDI</h2>
                        </b>
                      </th>
                    </tr>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="64%">
                        <b>
                          <h2 style="text-align:center;">Lugar</h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-2]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;"><?php echo $mesesminusculas[date('n')-1]; ?></h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;" width="12%">
                        <b>
                          <h2 style="text-align:center;">Total</h2>
                        </b>
                      </th>
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
          </div>
          <!-- TERCER HOJA -->
          <div class="well form-horizontal" style="border: 5px solid #63696D;">
            <?php include('header_reporte_mensual.php'); ?>
            <!-- contenido -->
            <br>
            <table width="100%" border="3px" cellspacing="0" bordered>
              <thead>
                <tr style="border: 3px solid black;">
                  <th style="border: 3px solid black;" width="100%" colspan="8">
                    <b>
                      <h2 style="text-align:center;">SUJETOS PROTEGIDOS ACTIVOS CON ESTANCIA EN EL CENTRO DE RESGUARDO</h2>
                    </b>
                  </th>
                </tr>
                <tr style="border: 3px solid black;">
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">No.</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">ID Sujeto</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">Fecha de ingreso al Resguardo</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">Fecha de Incorporación</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">Sexo</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">Edad</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">Calidad del sujeto dentro del Programa</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">Delito</h2>
                    </b>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                include("../administrador/tablas_estadistica/tabla11_reporte_mensual.php");
                ?>
              </tbody>
            </table>
            <br>
            <table width="100%" border="3px" cellspacing="0" bordered>
              <thead>
                <tr style="border: 3px solid black;">
                  <th style="border: 3px solid black;" width="100%" colspan="8">
                    <b>
                      <h2 style="text-align:center;">SUJETOS PROTEGIDOS ACTIVOS CON ESTANCIA EN EL CENTRO DE RESGUARDO</h2>
                    </b>
                  </th>
                </tr>
                <tr style="border: 3px solid black;">
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">No.</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">ID Sujeto</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">Fecha de ingreso al Programa</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">Fecha de Incorporación</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">Sexo</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">Edad</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">Calidad del sujeto dentro del Programa</h2>
                    </b>
                  </th>
                  <th style="border: 3px solid black;">
                    <b>
                      <h2 style="text-align:center;">Delito</h2>
                    </b>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                include("../administrador/tablas_estadistica/tabla12_reporte_mensual.php");
                ?>
              </tbody>
            </table>
          </div>
          <!-- CUARTA HOJA -->
          <div class="well form-horizontal" style="border: 5px solid #63696D;">
            <?php include('header_reporte_mensual.php'); ?>
            <!-- contenido -->
            <br>
            <h2 style="text-align:center;">RESUMEN DEL PROGRAMA</h2>
            <br>
            <div style="display: flex; justify-content: space-between; gap: 40px; align-items: flex-start;">
              <!-- COLUMNA IZQUIERDA (2 tablas una debajo de otra) -->
              <div style="display: flex; flex-direction: column; gap: 20px; flex: 1;">
                <table width="100%" border="3px" cellspacing="0" bordered>
                  <thead>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="100%" colspan="2">
                        <b>
                          <h2 style="text-align:center;">EXPEDIENTES DE PROTECCIÓN INICIADOS</h2>
                        </b>
                      </th>
                    </tr>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;">
                        <b>
                          <h2 style="text-align:center;">Etapa</h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;">
                        <b>
                          <h2 style="text-align:center;">Total</h2>
                        </b>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../administrador/tablas_estadistica/tabla13_reporte_mensual.php");
                    ?>
                  </tbody>
                </table>

                <table width="100%" border="3px" cellspacing="0" bordered>
                  <thead>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="100%" colspan="2">
                        <b>
                          <h2 style="text-align:center;">MEDIDAS DE APOYO EJECUTADAS</h2>
                        </b>
                      </th>
                    </tr>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;">
                        <b>
                          <h2 style="text-align:center;">Clasificación</h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;">
                        <b>
                          <h2 style="text-align:center;">Total</h2>
                        </b>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../administrador/tablas_estadistica/tabla15_reporte_mensual.php");
                    ?>
                  </tbody>
                </table>
              </div>

              <!-- COLUMNA DERECHA (3 tablas una debajo de otra) -->
              <div style="display: flex; flex-direction: column; gap: 20px; flex: 1;">
                <table width="100%" border="3px" cellspacing="0" bordered>
                  <thead>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;" width="100%" colspan="2">
                        <b>
                          <h2 style="text-align:center;">PERSONAS QUE SOLICITARON INCORPORARSE</h2>
                        </b>
                      </th>
                    </tr>
                    <tr style="border: 3px solid black;">
                      <th style="border: 3px solid black;">
                        <b>
                          <h2 style="text-align:center;">Etapa dentro del Programa</h2>
                        </b>
                      </th>
                      <th style="border: 3px solid black;">
                        <b>
                          <h2 style="text-align:center;">Total</h2>
                        </b>
                      </th>
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
            <!-- EXPEDIENTES -->
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
            $sql = "SELECT año,count(id) as totalexp FROM expediente
            WHERE fecha_nueva BETWEEN '2021-01-01' AND '2026-12-31'
            GROUP BY año  ORDER BY año ASC";
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
              let obj = JSON.parse(chartData_json);
              var chartData = [['AÑO', 'TOTAL EXPEDIENTES', { role: 'annotation' }],];
              let existe2026 = false;
              // 1. Recorrer datos de la DB
              for (var key in obj) {
                if (obj.hasOwnProperty(key)) {
                  var val = obj[key];
                  var anio = String(val.año);
                  var total = Number(val.totalexp);
                  if (anio === "2026") existe2026 = true;
                  chartData.push([anio, total, total]);
                }
              }
              // 2. Si la DB no trajo el 2026, lo agregamos manualmente con 0
              if (!existe2026) {
                chartData.push(["2026", 0, "0"]);
              }
              var data = google.visualization.arrayToDataTable(chartData);
              var options = {
                // title: 'PERSONAS PROPUESTAS PARA SU INCORPORACIÓN',
                titleTextStyle: {
                  color: '#333',
                  fontSize: 18,
                  bold: true
                },
                // --- GROSOR DE LA LÍNEA ---
                lineWidth: 5,
                // --------------------------
                pointSize: 6, // Aumenté un poco el punto para que combine con la línea gruesa
                chartArea: {
                  left: 25,
                  top: 30,
                  width: '97%',
                  height: '70%'
                },
                width: 1240,
                height: 400,
                colors: ['#000'],
                pointSize: 7,
                legend: { position: 'none' },
                hAxis: {
                  title: 'AÑO',
                  titleTextStyle: {
                    bold: true,
                    fontSize: 20,
                    color: '#333'
                  },
                  // --- ETIQUETAS DE LOS AÑOS EN NEGRITA ---
                  textStyle: {
                    fontSize: 20,
                    bold: true,
                    color: '#000' // Opcional: un color más oscuro para resaltar
                  }
                },
                vAxis: {
                  title: 'Personas',
                  titleTextStyle: {
                    bold: true,
                    fontSize: 20,
                    color: '#000'
                  },
                  textStyle: {
                    bold: true // También puse los números del eje Y en negrita para consistencia
                  },
                  minValue: 0,
                  viewWindow: { min: 0 },
                  format: '0'
                }
              };
              var chart = new google.visualization.LineChart(document.getElementById('ciudadChart'));
              chart.draw(data, options);
            }
            </script>
            <br>
            <textarea style="display:none" id="chartinfo"><?= $jsonData ?></textarea>
            <div class="">
              <h3 style="text-align: center;"><b>EXPEDIENTES DE PROTECCIÓN INICIADOS</b></h3>
              <div id="ciudadChart" style="border: 3px solid black;"></div>
            </div>
            <!-- <canvas id="ciudadChart"></canvas> -->
            <!-- SUJETOS -->
            <?php
            // Consulta sql para contar la cantidad
            $sql = "SELECT expediente.año,count(datospersonales.id) as totalepersonas FROM expediente
            INNER JOIN datospersonales ON expediente.fol_exp = datospersonales.folioexpediente
            WHERE expediente.fecha_nueva BETWEEN '2021-01-01' AND '2026-12-31' AND datospersonales.relacional ='NO'
            GROUP BY año  ORDER BY año ASC";
            $records = mysqli_query($con, $sql);
            $data = array();
            while($row = mysqli_fetch_assoc($records)){
              $data[] = $row;
            }
            $jsonData = json_encode($data);
            ?>
            <!-- Almacenamos JSON data -->
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var chartData_json = document.getElementById('chartinfo2').value;
              let obj = JSON.parse(chartData_json);
              var chartData = [['AÑO', 'TOTAL PERSONAS', { role: 'annotation' }],];
              let existe2026 = false;
              // 1. Recorrer datos de la DB
              for (var key in obj) {
                if (obj.hasOwnProperty(key)) {
                  var val = obj[key];
                  var anio = String(val.año);
                  var total = Number(val.totalepersonas);
                  if (anio === "2026") existe2026 = true;
                  chartData.push([anio, total, total]);
                }
              }
              // 2. Si la DB no trajo el 2026, lo agregamos manualmente con 0
              if (!existe2026) {
                chartData.push(["2026", 0, "0"]);
              }
              var data = google.visualization.arrayToDataTable(chartData);
              var options = {
                // title: 'PERSONAS PROPUESTAS PARA SU INCORPORACIÓN',
                titleTextStyle: {
                  color: '#333',
                  fontSize: 18,
                  bold: true
                },
                // --- GROSOR DE LA LÍNEA ---
                lineWidth: 5,
                // --------------------------
                pointSize: 6, // Aumenté un poco el punto para que combine con la línea gruesa
                chartArea: {
                  left: 25,
                  top: 30,
                  width: '97%',
                  height: '70%'
                },
                width: 1240,
                height: 400,
                colors: ['#000'],
                pointSize: 7,
                legend: { position: 'none' },
                hAxis: {
                  title: 'AÑO',
                  titleTextStyle: {
                    bold: true,
                    fontSize: 20,
                    color: '#333'
                  },
                  // --- ETIQUETAS DE LOS AÑOS EN NEGRITA ---
                  textStyle: {
                    fontSize: 20,
                    bold: true,
                    color: '#000' // Opcional: un color más oscuro para resaltar
                  }
                },
                vAxis: {
                  title: 'Personas',
                  titleTextStyle: {
                    bold: true,
                    fontSize: 20,
                    color: '#000'
                  },
                  textStyle: {
                    bold: true // También puse los números del eje Y en negrita para consistencia
                  },
                  minValue: 0,
                  viewWindow: { min: 0 },
                  format: '0'
                }
              };
              var chart = new google.visualization.LineChart(document.getElementById('ciudadChart2'));
              chart.draw(data, options);
            }
            </script>
            <br>
            <textarea style="display:none" id="chartinfo2"><?= $jsonData ?></textarea>
            <!-- <div id="ciudadChart2" style="border: 3px solid black; width: 100%; display: block;"></div> -->
            <div class="">
              <h3 style="text-align: center;"><b>PERSONAS PROPUESTAS PARA SU INCORPORACIÓN</b></h3>
              <div id="ciudadChart2" style="border: 3px solid black; width: 100%; display: block;"></div>
            </div>
            <!-- <canvas id="ciudadChart2"></canvas> -->
            <!-- SUJETOS EN RESGUARDO-->
            <?php
            // Consulta sql para contar la cantidad
            $sql = "SELECT YEAR(autoridad.fechasolicitud_persona) as año, COUNT(DISTINCT medidas.id_persona) as totalsujcr FROM medidas
            INNER JOIN datospersonales ON medidas.id_persona = datospersonales.id
            INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
            WHERE (medidas.date_provisional BETWEEN '2021-01-01' AND '2026-12-31' OR medidas.date_definitva BETWEEN '2021-01-01' AND '2026-12-31')
            AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.relacional = 'NO'
            AND autoridad.fechasolicitud_persona BETWEEN '2021-01-01' AND '2026-12-31' AND medidas.estatus != 'CANCELADA'
            GROUP BY año
            ORDER BY año ASC";
            $records = mysqli_query($con, $sql);
            $data = array();
            while($row = mysqli_fetch_assoc($records)){
              $data[] = $row;
            }
            $jsonData = json_encode($data);
            ?>
            <!-- Almacenamos JSON data -->
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var chartData_json = document.getElementById('chartinfo3').value;
              let obj = JSON.parse(chartData_json);
              var chartData = [['AÑO', 'TOTAL PERSONAS', { role: 'annotation' }],];
              let existe2026 = false;
              // 1. Recorrer datos de la DB
              for (var key in obj) {
                if (obj.hasOwnProperty(key)) {
                  var val = obj[key];
                  var anio = String(val.año);
                  var total = Number(val.totalsujcr);
                  if (anio === "2026") existe2026 = true;
                  chartData.push([anio, total, total]);
                }
              }
              // 2. Si la DB no trajo el 2026, lo agregamos manualmente con 0
              if (!existe2026) {
                chartData.push(["2026", 0, "0"]);
              }
              var data = google.visualization.arrayToDataTable(chartData);
              var options = {
                // title: 'SUJETOS QUE INGRESARON A ESTANCIA EN EL CENTRO DE RESGUARDO',
                titleTextStyle: {
                  color: '#333',
                  fontSize: 18,
                  bold: true
                },
                // --- GROSOR DE LA LÍNEA ---
                lineWidth: 5,
                // --------------------------
                pointSize: 6, // Aumenté un poco el punto para que combine con la línea gruesa
                chartArea: {
                  left: 25,
                  top: 30,
                  width: '97%',
                  height: '70%'
                },
                width: 1240,
                height: 400,
                colors: ['#000'],
                pointSize: 7,
                legend: { position: 'none' },
                hAxis: {
                  title: 'AÑO',
                  titleTextStyle: {
                    bold: true,
                    fontSize: 20,
                    color: '#333'
                  },
                  // --- ETIQUETAS DE LOS AÑOS EN NEGRITA ---
                  textStyle: {
                    fontSize: 20,
                    bold: true,
                    color: '#000' // Opcional: un color más oscuro para resaltar
                  }
                },
                vAxis: {
                  title: 'Sujetos',
                  titleTextStyle: {
                    bold: true,
                    fontSize: 20,
                    color: '#000'
                  },
                  textStyle: {
                    bold: true // También puse los números del eje Y en negrita para consistencia
                  },
                  minValue: 0,
                  viewWindow: { min: 0 },
                  format: '0'
                }
              };
              var chart = new google.visualization.LineChart(document.getElementById('ciudadChart3'));
              chart.draw(data, options);
              // 1. Obtener la imagen en Base64
var imgUri = chart.getImageURI();

// 2. Enviar al servidor mediante una petición (fetch)
fetch('guardar_grafica.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'imagen=' + encodeURIComponent(imgUri)
})
.then(response => response.text())
.then(data => console.log('Imagen guardada:', data));
            }
            </script>
            <br>
            <textarea style="display:none" id="chartinfo3"><?= $jsonData ?></textarea>
            <div class="">
              <h3 style="text-align: center;"><b>SUJETOS QUE INGRESARON A ESTANCIA EN EL CENTRO DE RESGUARDO</b></h3>
              <div id="ciudadChart3" style="border: 3px solid black;"></div>
            </div>
            <!-- <canvas id="ciudadChart3"></canvas> -->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
