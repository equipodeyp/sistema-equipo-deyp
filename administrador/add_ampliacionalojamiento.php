<div class="modal fade" id="ampliarmedidaalojamientotemporal<?php echo $id_medidaaloj;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="display: block; margin: 0 auto;" class="modal-title" id="miModalLabel">AMPLIAR ALOJAMIENTO TEMPORAL</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="" action="./controllers/ampliar_alojamientotemporal.php?idmedida=<?php echo $id_medidaaloj; ?>" method="post">
          <div style="padding:0px; border:solid 4px;">
            <section class="container well form-horizontal secciones"><br>
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="idconvenioalojextender"> ID DEL CONVENIO DE ENTENDIMIENTO PARA CONTINUAR INCORPORADO AL PROGRAMA</label>
                  <input class="form-control" type="text" name="idconvenioent" id="idconvenioalojextender" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="dateinicioalojextender">FECHA DE INICIO DE LA AMPLIACIÓN</label>
                  <input class="form-control input-fechamediact" type="date" name="dateinicioampliacion" id="dateinicioalojextender" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="daysalojextender">DÍAS DE <br>VIGENCIA</label>
                  <input class="form-control" type="text" name="daysvigenciaampliacion" id="daysalojextender" required>
                </div>
              </div>

              <div class="modal-footer d-flex justify-content-center">
                <div class="row">
                  <div>
                    <button style="display: block; margin: 0 auto;" class="btn color-btn-success btn-sm" id="enter" type="submit">AMPLIAR</button>
                  </div>
                </div>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CANCELAR</button>
              </div>
              <br>
            </section>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
