<!-- El Modal (estructura básica de Bootstrap 5) -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h2 style="display: block; margin: 0 auto;" class="modal-title" id="miModalLabel">REGISTRO DE ESTUDIO</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form class="" action="./controllers/add_vonvenioparaseguirincorporado.php?idpersona=<?php echo $id_person; ?>" method="post">
            <div class="well form-horizontal">
              <div class="row">
                <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                  <strong style="color: #f8fdfc;">EVALUACION DEL SEGUIMIENTO</strong>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="folpersona">FOLIO DEL EXPEDIENTE DE PROTECCIÓN</label>
                  <input type="text" id="folpersona" class="form-control" value="<?php echo $name_folio; ?>" disabled>
                </div>
                <div class="col-md-6 mb-3 validar ">
                  <label for="idppofsp">ID PERSONA </label>
                  <input type="text" id="idppofsp" class="form-control" value="<?php echo $identificador; ?>" disabled>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="ANALISIS_MULT">ANÁLISIS MULTIDISCIPLINARIO</label>
                  <select class="form-select" name="analisis_m" id="ANALISIS_MULT" required>
                    <option  value="default">SELECCIONE UNA OPCION</option>
                    <option value="ESTUDIO TECNICO DE EVALUACION DE RIESGO">1.- ESTUDIO TECNICO DE EVALUACION DE RIESGO</option>
                    <option value="ESTUDIO TECNICO DE CANCELACION">2.- ESTUDIO TECNICO DE CANCELACION</option>
                    <option value="ESTUDIO TECNICO DE CONCLUSION">3.- ESTUDIO TECNICO DE CONCLUSION</option>
                    <option value="ESTUDIO TECNICO DE MODIFICACION">4.- ESTUDIO TECNICO DE MODIFICACION</option>
                    <option value="AUTORIZACION DEL TITULAR">5.- AUTORIZACION DEL TITULAR</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar" style="display:none;" id="div_dateautorizacioneval">
                  <label for="dateautorizada">FECHA DE AUTORIZACIÓN DEL ANÁLISIS MULTIDISCIPLINARIO</label>
                  <input id="dateautorizada" autocomplete="off" class="form-control" type="date" name="fecha_auto" value="">
                </div>
                <div class="col-md-6 mb-3 validar" style="display:none;" id="div_idanalisiseval">
                  <label for="idanalsisestudio">ID DEL ANÁLISIS MULTIDISCIPLINARIO</label>
                  <input id="idanalsisestudio" autocomplete="off" class="form-control" type="text" name="id_analisis" value="">
                </div>
                <div class="col-md-6 mb-3 validar" style="display:none;" id="div_tipoconvenioeval">
                  <label for="slt_tipoconvenio">TIPO DE CONVENIO</label>
                  <select id="slt_tipoconvenio" class="form-select" name="tipo_convenio">
                    <option style="visibility: hidden" value="">SELECCIONE UNA OPCION</option>
                    <option value="CONVENIO DE ENTENDIMIENTO PARA CONTINUAR INCORPORADO AL PROGRAMA">1.- CONVENIO DE ENTENDIMIENTO PARA CONTINUAR INCORPORADO AL PROGRAMA</option>
                    <option value="CONVENIO MODIFICATORIO">2.- CONVENIO MODIFICATORIO</option>
                    <option value="NO APLICA">3.- NO APLICA</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar" style="display:none;" id="div_datefirmaeval">
                  <label for="ipt_datefirmaconvenio">FECHA DE LA FIRMA DEL CONVENIO</label>
                  <input id="ipt_datefirmaconvenio" autocomplete="off" class="form-control" type="date" name="fecha_firma">
                </div>

                <div class="col-md-6 mb-3 validar" style="display:none;" id="div_dateinicioeval">
                  <label for="ipt_dateinicioconvenio">FECHA DE INICIO DEL CONVENIO</label>
                  <input id="ipt_dateinicioconvenio" autocomplete="off"class="form-control" type="date" name="fecha_inicio">
                </div>
                <div class="col-md-6 mb-3 validar" style="display:none;" id="div_vigenciaconveval">
                  <label for="ipt_vigenciaconvenio">VIGENCIA DEL CONVENIO</label>
                  <input id="ipt_vigenciaconvenio" autocomplete="off" class="form-control" type="text" name="vigencia" placeholder="dias" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
                </div>
                <div class="col-md-6 mb-3 validar" style="display:none;" id="div_idconveneval">
                  <label for="ipt_idconvenio">ID DEL CONVENIO</label>
                  <input id="ipt_idconvenio" autocomplete="off" class="form-control" type="text" name="id_convenio" value="">
                </div>
                <div class="col-md-12 mb-3 validar" id="div_commentevel" style="display:none;">
                  <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                    <strong style="color: #f8fdfc;">OBSERVACIONES</strong>
                  </div>
                  <label for="observasionesconvenio">OBSERVACIONES</label>
                  <textarea id="observasionesconvenio" autocomplete="off" name="observaciones" rows="6" cols="165" placeholder="OBSERVACIONES" style="resize: none;"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <div class="row">
                <div>
                  <!-- <br><br> -->
                  <button style="display: block; margin: 0 auto;" class="btn color-btn-success btn-sm" id="enter" type="submit">REGISTRAR</button>
                  <!-- <br><br> -->
                </div>
              </div>
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CANCELAR</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
