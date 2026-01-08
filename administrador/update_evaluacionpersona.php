<?php
// get info evaluacion persona
$getestudiopersona = "SELECT * FROM evaluacion_persona WHERE id = '$idevaluacionpersona'";
$rgetestudiopersona = $mysqli->query($getestudiopersona);
$fgetestudiopersona = $rgetestudiopersona ->fetch_assoc();
?>
<div class="modal fade" id="updateevaluacionind_suj<?php echo $idevaluacionpersona;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h2 style="display: block; margin: 0 auto;" class="modal-title" id="miModalLabel">DETALLES ESPECIFICOS DE LA MEDIDA OTORGADA</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="mi-formulario" action="./controllers/update_estudiopersona.php?idestudio=<?php echo $idevaluacionpersona; ?>" method="post">
          <div style="padding:0px; border:solid 4px;">
            <section class="container well form-horizontal secciones"><br>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">DATOS DEL SUJETO</strong>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3 validar">
                  <label for="folexp">FOLIO EXPEDIENTE</label>
                  <input id="folexp" class="form-control" type="text" value="<?php echo $fgetestudiopersona['folioexpediente']; ?>" disabled>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="idsujeto">ID SUJETO</label>
                  <input id="idsujeto" class="form-control" type="text" value="<?php echo $fgetestudiopersona['id_unico']; ?>" disabled>
                </div>
              </div>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">EVALUACION DE SEGUIMIENTO</strong>
              </div>
              <div class="row contenedor-principal">
                <div class="col-md-6 mb-3 validar">
                  <label for="ipt_estudio">ANALISIS MULTIDISCIPLINARIO</label>
                  <input id="ipt_estudio" class="form-control" type="text" value="<?php echo $fgetestudiopersona['analisis']; ?>" disabled>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="dateautorizacion">FECHA DE AUTORIZACIÓN</label>
                  <input id="dateautorizacion" class="form-control" type="text" value="<?php echo $fgetestudiopersona['fecha_aut']; ?>" disabled>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="idanalisis">ID DE ANÁLISIS MULTIDISCIPLINARIO</label>
                  <input id="idanalisis" class="form-control" type="text" value="<?php echo $fgetestudiopersona['id_analisis']; ?>" disabled>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="upt_slt_tipoconvenio">TIPO DE CONVENIO</label>
                  <select id="upt_slt_tipoconvenio" class="form-select slt-tipoconvenio" name="upt_tipo_convenio" required>
                    <option >SELECCIONE UNA OPCION</option>
                    <option value="CONVENIO-ENTENDIMIENTO">1.- CONVENIO DE ENTENDIMIENTO PARA CONTINUAR INCORPORADO AL PROGRAMA</option>
                    <option value="CONVENIO-MODIFICATORIO">2.- CONVENIO MODIFICATORIO</option>
                    <option value="NO-APLICA">3.- NO APLICA</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 div-controlado CONVENIO-ENTENDIMIENTO" style="display:none;">
                  <label for="upt_ipt_datefirmaconvenio_ent">FECHA DE LA FIRMA DEL CONVENIO</label>
                  <input id="upt_ipt_datefirmaconvenio_ent" class="form-control input-validar input-fecha" type="date" name="fecha_firma_ent">
                </div>
                <div class="col-md-6 mb-3 div-controlado CONVENIO-ENTENDIMIENTO" style="display:none;">
                  <label for="upt_ipt_dateinicioconvenio_ent">FECHA DE INICIO DEL CONVENIO</label>
                  <input id="upt_ipt_dateinicioconvenio_ent" class="form-control input-validar input-fecha" type="date" name="fecha_inicio_ent">
                </div>
                <div class="col-md-6 mb-3 div-controlado CONVENIO-ENTENDIMIENTO" style="display:none;">
                  <label for="upt_ipt_vigenciaconvenio_ent">VIGENCIA DEL CONVENIO</label>
                  <input id="upt_ipt_vigenciaconvenio_ent" class="form-control input-validar" type="text" name="vigencia_ent" placeholder="dias" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
                </div>
                <div class="col-md-6 mb-3 div-controlado CONVENIO-ENTENDIMIENTO" style="display:none;">
                  <label for="upt_ipt_idconvenio_ent">ID DEL CONVENIO</label>
                  <input id="upt_ipt_idconvenio_ent" class="form-control input-validar" type="text" name="id_convenio_ent">
                </div>
                <!--  -->
                <div class="col-md-6 mb-3 div-controlado CONVENIO-MODIFICATORIO" style="display:none;">
                  <label for="upt_ipt_datefirmaconvenio_mod">FECHA DE LA FIRMA DEL CONVENIO</label>
                  <input id="upt_ipt_datefirmaconvenio_mod" class="form-control input-validar input-fecha" type="date" name="fecha_firma_mod">
                </div>
                <div class="col-md-6 mb-3 div-controlado CONVENIO-MODIFICATORIO" style="display:none;">
                  <label for="upt_ipt_dateinicioconvenio_mod">FECHA DE INICIO DEL CONVENIO</label>
                  <input id="upt_ipt_dateinicioconvenio_mod" class="form-control input-validar input-fecha" type="date" name="fecha_inicio_mod">
                </div>
                <div class="col-md-6 mb-3 div-controlado CONVENIO-MODIFICATORIO" style="display:none;">
                  <label for="upt_ipt_idconvenio_mod">ID DEL CONVENIO</label>
                  <input id="upt_ipt_idconvenio_mod" class="form-control input-validar" type="text" name="id_convenio_mod">
                </div>
                <div class="col-md-12 mb-3">
                  <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                    <strong style="color: #f8fdfc;">OBSERVACIONES</strong>
                  </div>
                  <label for="observasionesconvenio">OBSERVACIONES</label>
                  <textarea id="upt_observasionesconvenio" autocomplete="off" name="upt_observaciones" rows="6" cols="165" placeholder="OBSERVACIONES" style="resize: none;"></textarea>
                </div>
              </div>
            </section>
            <div class="modal-footer d-flex justify-content-center">
              <div class="row">
                <div>
                  <button style="display: block; margin: 0 auto;" class="btn color-btn-success btn-sm btn-enviar" type="submit" disabled>ACTUALIZAR</button>
                </div>
              </div>
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CANCELAR</button>
            </div>
            <br>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
