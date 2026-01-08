<?php
// get info evaluacion persona
$getestudiopersona = "SELECT * FROM evaluacion_persona WHERE id = '$idevaluacionpersona'";
$rgetestudiopersona = $mysqli->query($getestudiopersona);
$fgetestudiopersona = $rgetestudiopersona ->fetch_assoc();
?>
<div class="modal fade" id="detalleevaluacionind_suj<?php echo $idevaluacionpersona;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h2 style="display: block; margin: 0 auto;" class="modal-title" id="miModalLabel">DETALLES ESPECIFICOS DE LA MEDIDA OTORGADA</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div style="padding:0px; border:solid 4px;">
          <section class="container well form-horizontal secciones"><br>
            <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
              <strong style="color: #f8fdfc;">DATOS DEL SUJETO</strong>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3 validar">
                <label for="folpersona">FOLIO DEL EXPEDIENTE DE PROTECCIÓN</label>
                <input type="text" id="folpersona" class="form-control" value="<?php echo $name_folio; ?>" disabled>
              </div>
              <div class="col-md-6 mb-3 validar ">
                <label for="idppofsp">ID PERSONA </label>
                <input type="text" id="idppofsp" class="form-control" value="<?php echo $identificador; ?>" disabled>
              </div>
            </div>
            <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
              <strong style="color: #f8fdfc;">EVALUACION DEL SEGUIMIENTO</strong>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3 validar ">
                <label for="idppofsp">ANÁLISIS MULTIDISCIPLINARIO</label>
                <input type="text" id="idppofsp" class="form-control" value="<?php echo $fgetestudiopersona['analisis']; ?>" disabled>
              </div>
              <div class="col-md-6 mb-3 validar ">
                <label for="idppofsp">FECHA DE AUTORIZACIÓN</label>
                <input type="date" id="idppofsp" class="form-control" value="<?php echo $fgetestudiopersona['fecha_aut']; ?>" disabled>
              </div>
              <div class="col-md-6 mb-3 validar ">
                <label for="idppofsp">ID ANÁLISIS</label>
                <input type="text" id="idppofsp" class="form-control" value="<?php echo $fgetestudiopersona['id_analisis']; ?>" disabled>
              </div>
              <?php
              if ($fgetestudiopersona['analisis'] == 'ESTUDIO TECNICO DE ANALISIS DE RIESGO' || $fgetestudiopersona['analisis'] == 'ESTUDIO TECNICO DE MODIFICACION' || $fgetestudiopersona['analisis'] == 'AUTORIZACION DEL TITULAR') {
                ?>
                <div class="col-md-6 mb-3 validar ">
                  <label for="idppofsp">TIPO DE CONVENIO</label>
                  <input type="text" id="idppofsp" class="form-control" value="<?php echo $fgetestudiopersona['tipo_convenio']; ?>" disabled>
                </div>
                <?php
              }
              if ($fgetestudiopersona['tipo_convenio'] == 'CONVENIO DE ENTENDIMIENTO PARA CONTINUAR INCORPORADO AL PROGRAMA') {
                ?>
                <div class="col-md-6 mb-3 validar ">
                  <label for="idppofsp">FECHA DE LA FIRMA</label>
                  <input type="date" id="idppofsp" class="form-control" value="<?php echo $fgetestudiopersona['fecha_firma']; ?>" disabled>
                </div>
                <div class="col-md-6 mb-3 validar ">
                  <label for="idppofsp">FECHA DE INICIO</label>
                  <input type="date" id="idppofsp" class="form-control" value="<?php echo $fgetestudiopersona['fecha_inicio']; ?>" disabled>
                </div>
                <div class="col-md-6 mb-3 validar ">
                  <label for="idppofsp">VIGENCIA</label>
                  <input type="text" id="idppofsp" class="form-control" value="<?php echo $fgetestudiopersona['vigencia'].' días'; ?>" disabled>
                </div>
                <div class="col-md-6 mb-3 validar ">
                  <label for="idppofsp">FECHA DE TERMINO</label>
                  <input type="date" id="idppofsp" class="form-control" value="<?php echo $fgetestudiopersona['fecha_vigencia']; ?>" disabled>
                </div>
                <div class="col-md-6 mb-3 validar ">
                  <label for="idppofsp">ID DEL CONVENIO</label>
                  <input type="text" id="idppofsp" class="form-control" value="<?php echo $fgetestudiopersona['id_convenio']; ?>" disabled>
                </div>
                <?php
              }elseif ($fgetestudiopersona['tipo_convenio'] == 'CONVENIO MODIFICATORIO') {
                ?>
                <div class="col-md-6 mb-3 validar ">
                  <label for="idppofsp">FECHA DE LA FIRMA</label>
                  <input type="date" id="idppofsp" class="form-control" value="<?php echo $fgetestudiopersona['fecha_firma']; ?>" disabled>
                </div>
                <div class="col-md-6 mb-3 validar ">
                  <label for="idppofsp">FECHA DE INICIO</label>
                  <input type="date" id="idppofsp" class="form-control" value="<?php echo $fgetestudiopersona['fecha_inicio']; ?>" disabled>
                </div>
                <div class="col-md-6 mb-3 validar ">
                  <label for="idppofsp">FECHA DE TERMINO</label>
                  <input type="date" id="idppofsp" class="form-control" value="<?php echo $fgetestudiopersona['fecha_vigencia']; ?>" disabled>
                </div>
                <div class="col-md-6 mb-3 validar ">
                  <label for="idppofsp">ID DEL CONVENIO</label>
                  <input type="text" id="idppofsp" class="form-control" value="<?php echo $fgetestudiopersona['id_convenio']; ?>" disabled>
                </div>
                <?php
              }
              ?>
            </div>
            <div class="col-md-12 mb-3 validar" id="div_commentevel">
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">OBSERVACIONES</strong>
              </div>
              <!-- <label for="observasionesconvenio">OBSERVACIONES</label> -->
              <textarea id="observasionesconvenio" autocomplete="off" name="observaciones" rows="6" cols="165" placeholder="OBSERVACIONES" style="resize: none;" disabled><?php echo $fgetestudiopersona['observaciones']; ?></textarea>
            </div>
          </section>
          <div class="modal-footer d-flex justify-content-center">
            <div class="row">
              <div>
                <!-- <button style="display: block; margin: 0 auto;" class="btn color-btn-success btn-sm" id="btnGuardar" type="submit">ACTUALIZAR</button> -->
              </div>
            </div>
            <button type="button" class="btn color-btn-success btn-sm" data-bs-dismiss="modal">CERRAR</button>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>
