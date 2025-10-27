<div class="modal fade" id="add_data_Modal_reporte_diario" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg"  style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:70%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 style="text-align:center" class="modal-title" id="myModalLabel">REPORTE DIARIO</h2>
      </div>
      <div class="modal-body">
        <?php
        $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        ?>
        <form action="../administrador/archivos_html/get_reportediario_pdf.php" method="POST">
          <button class="btn-flotante-nuevo-exp" type="submit">GENERAR PDF</button><br><br>
          <div class="well form-horizontal" style="border: 5px solid #63696D;">
            <img style="float: left;" src="../image/ESCUDO.png" width="60" height="50">
            <img style="float: right;" src="../image/FGJEM.png" width="50" height="50">
            <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
            <h1 style="text-align:center">Reporte Global</h1>
            <h1 style="text-align:center">Del 01 de Junio del 2021 al <?php echo date("d").' de '.$meses[date("n")-1].' del '. date("Y");?> </h1>
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
            <br><br><br><br>
            <div class="contenedor-flex">
              <label class="izquierda"></label>
              <label class="derecha" style="font-size: 23px; color: white; background-color: #63696D; border-radius: 40% 40% 5% 5%;">&nbsp;&nbsp;1/1&nbsp;&nbsp;</label>
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
