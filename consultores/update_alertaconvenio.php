<div class="modal fade" id="update_alerta_<?php echo $fget3dyas['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <?php
        if ($fget3dyas['semaforo'] == 'ROJO') {
          ?>
          <div class="alert alert-danger d-flex align-items-center justify-content-center m-0 w-100" role="alert">
            <i style="color:red; font-size: 40px;" class="fas fa-exclamation-triangle me-2"></i>
            <div>
              <strong style="color:#000000; font-size: 40px;">¡ATENCIÓN!</strong>
            </div>
          </div>
          <?php
        }elseif ($fget3dyas['semaforo'] == 'AMARILLO') {
          ?>
          <div class="alert alert-warning d-flex align-items-center justify-content-center m-0 w-100" role="alert">
            <i style="color:red; font-size: 40px;" class="fas fa-exclamation-triangle me-2"></i>
            <div>
              <strong style="color:#000000; font-size: 40px;">¡ATENCIÓN!</strong>
            </div>
          </div>
          <?php
        }elseif ($fget3dyas['semaforo'] == 'VERDE') {
          ?>
          <div class="alert alert-success d-flex align-items-center justify-content-center m-0 w-100" role="alert">
            <i style="color:red; font-size: 40px;" class="fas fa-exclamation-triangle me-2"></i>
            <div>
              <strong style="color:#000000; font-size: 40px;">¡ATENCIÓN!</strong>
            </div>
          </div>
          <?php
        }elseif ($fget3dyas['semaforo'] == 'MORADO') {
          ?>
          <div class="alert alert-info d-flex align-items-center justify-content-center m-0 w-100" role="alert">
            <i style="color:red; font-size: 40px;" class="fas fa-exclamation-triangle me-2"></i>
            <div>
              <strong style="color:#000000; font-size: 40px;">¡ATENCIÓN!</strong>
            </div>
          </div>
          <?php
        }
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

          <div style="padding:0px; border:solid 4px;">
            <section class="container well form-horizontal secciones"><br>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">DATOS GENERALES</strong>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3 validar">
                  <label for="FOLIOEXPEDIENTE">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
                  <input class="form-control" id="FOLIO_EXPEDIENTE" name="FOLIO_EXPEDIENTE" placeholder="" type="text" disabled value="<?php echo $fget3dyas['expediente'];?>" maxlength="50">
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="IDUNICO">ID PERSONA<span ></span></label>
                  <input class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" disabled value="<?php echo $fget3dyas['id_unico']; ?>" maxlength="50">
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="TIPOCONVENIO">TIPO DE CONVENIO<span ></span></label>
                  <input class="form-control" id="TIPO_CONVENIO" name="TIPO_CONVENIO" placeholder="" type="text" disabled value="<?php echo $fget3dyas['tipo_convenio']; ?>" maxlength="50">
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="FECHAINICIO">FECHA DE INICIO DEL <?php echo $fget3dyas['tipo_convenio']; ?><span ></span></label>
                  <input class="form-control" id="FECHA_INICIO" name="FECHA_INICIO" placeholder="" type="date" disabled value="<?php echo $fget3dyas['fecha_inicio']; ?>" maxlength="50">
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="FECHATERMINO">FECHA DE TERMINO DEL <?php echo $fget3dyas['tipo_convenio']; ?><span ></span></label>
                  <input class="form-control" id="FECHA_TERMINO" name="FECHA_TERMINO" placeholder="" type="date" disabled value="<?php echo $fget3dyas['fecha_termino']; ?>" maxlength="50">
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="DIASRESTANTES">DÍAS RESTANTES<span ></span></label>
                  <input class="form-control" id="DIAS_RESTANTES" name="DIAS_RESTANTES" placeholder="" type="text" disabled value="<?php echo $fget3dyas['dias_restantes']; ?>" maxlength="50">
                </div>
              </div>              
            </section>
            <div class="modal-footer d-flex justify-content-center">
              <div class="row">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CERRAR</button>
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>
