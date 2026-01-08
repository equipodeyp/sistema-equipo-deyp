<div class="modal fade" id="eliminar_medida_<?php echo $id_medida;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="display: block; margin: 0 auto;" class="modal-title" id="miModalLabel">¿DESEAS ELIMINAR LA MEDIDA?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="" action="./controllers/delete_allformedida.php?idmedida=<?php echo $id_medida; ?>" method="post">
          <div style="padding:0px; border:solid 4px;">
            <section class="container well form-horizontal secciones"><br>
              <div class="modal-footer d-flex justify-content-center">
                <div class="row">
                  <div>
                    <button style="display: block; margin: 0 auto;" class="btn color-btn-success btn-sm" id="enter" type="submit">ELIMINAR</button>
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
