<!-- El Modal (estructura básica de Bootstrap 5) -->
<div class="modal fade" id="add_medidassuj" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h2 style="display: block; margin: 0 auto;" class="modal-title" id="miModalLabel">REGISTRO DE ESTUDIO</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- <?php echo $name_folio; ?> -->
      <!-- <?php echo $id_person; ?> -->
      <div class="modal-body">
        <form class="" action="./controllers/add_medidasprovisionales.php?idpersona=<?php echo $id_person; ?>" method="post">
          <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
            <strong style="color: #f8fdfc;">¿CUANTAS MEDIDAS DESEA AGREGAR?</strong>
          </div>
          <div class="col-md-12 mb-3 validar" style="justify-content: center; align-items: center;">
            <label for="NUM_MEDIDAS_PROVISIONALES">NUMERO DE MEDIDAS<span class="required"></span></label>
            <input class="form-control" id="NUM_MEDIDAS_PROVISIONALES" name="NUM_MEDIDAS_PROVISIONALES" placeholder="INGRESE UN NUMERO" type="text" style="text-align:center" required>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <div class="row">
              <div>
                <button style="display: block; margin: 0 auto;" class="btn color-btn-success btn-sm" id="enter" type="submit">REGISTRAR</button>
              </div>
            </div>
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CANCELAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
