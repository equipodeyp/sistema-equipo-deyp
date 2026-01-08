<div class="modal fade" id="add_other_medida_pro_or_def_suj" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h2 style="display: block; margin: 0 auto;" class="modal-title" id="miModalLabel">REGISTRO DE MEDIDA</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- <?php echo $name_folio; ?> -->
      <!-- <?php echo $id_person; ?> -->
      <div class="modal-body">
        <form class="" action="./controllers/addothermedida.php?idpersona=<?php echo $id_person; ?>" method="post">
          <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
            <strong style="color: #f8fdfc;">MEDIDA OTORGADA</strong>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3 validar">
              <label for="category_of_medida">CATEGORÍA DE LA MEDIDA</label>
              <select class="form-select" name="form_category_of_medida" id="category_of_medida" required>
                <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <option value="INICIAL">INICIAL</option>
                <option value="AMPLIACION">AMPLIACIÓN</option>
                <option value="MODIFICATORIA">MODIFICATORIA</option>
              </select>
            </div>
            <div class="col-md-6 mb-3 validar">
              <label for="type_of_medida">TIPO DE MEDIDA</label>
              <select class="form-select" name="form_type_of_medida" id="type_of_medida" required onchange="addothermedtipo(this)">
                <option disabled selected value>SELECCIONE EL TIPO DE MEDIDA</option>
                <option value="PROVISIONAL">PROVISIONAL</option>
                <option value="DEFINITIVA">DEFINITIVA</option>
              </select>
            </div>
            <div class="col-md-6 mb-3 validar">
              <label for="classification_of_medida">CLASIFICACIÓN DE LA MEDIDA</label>
              <select class="form-select" name="form_classification_of_medida" id="classification_of_medida" required onchange="addothermedclasificacion(this)">
                <option disabled selected value>SELECCIONE LA CLASIFICACIÓN DE LA MEDIDA</option>
                <option value="ASISTENCIA">ASISTENCIA</option>
                <option value="RESGUARDO">RESGUARDO</option>
              </select>
            </div>
            <div class="col-md-6 mb-3 validar" id="medida_of_asistencia" style="display:none;">
              <label for="extent_of_attendance">INCISO DE LA MEDIDA DE ASISTENCIA</label>
              <select class="form-select" name="form_extent_of_attendance" id="extent_of_attendance" onchange="addmedasistencia(this)">
                <option disabled selected value>SELECCIONE LA MEDIDA</option>
                <?php
                $asistencia = "SELECT * FROM medidaasistencia";
                $answerasis = $mysqli->query($asistencia);
                while($asistencias = $answerasis->fetch_assoc()){
                 echo "<option value='".$asistencias['nombre']."'>".$asistencias['nombre']."</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-md-6 mb-3 validar" id="othermedida_asistencia" style="display:none;">
              <label for="otherextent_of_attendance">OTRA MEDIDA DE ASISTENCIA</label>
              <input class="form-control" type="text" name="form_otherextent_of_attendance" id="otherextent_of_attendance">
            </div>
            <div class="col-md-6 mb-3 validar" id="medida_of_resguardo" style="display:none;">
              <label for="guard_of_attendance">INCISO DE LA MEDIDA DE RESGUARDO</label>
              <select class="form-select" name="form_guard_of_attendance" id="guard_of_attendance" onchange="addmedresguardo(this)">
                <option disabled selected value>SELECCIONE LA MEDIDA</option>
                <?php
                $resguardo = "SELECT * FROM medidaresguardo";
                $answerres = $mysqli->query($resguardo);
                while($resguardos = $answerres->fetch_assoc()){
                 echo "<option value='".$resguardos['nombre']."'>".$resguardos['nombre']."</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-md-6 mb-3 validar" id="medidaxi_of_resguardo" style="display:none;">
              <label for="medida_procesal">EJECUCIÓN DE LA MEDIDA PROCESAL</label>
              <select class="form-select" name="form_medida_procesal" id="medida_procesal">
                <option disabled selected value>SELECCIONE LA MEDIDA</option>
                <?php
                $resguardoxi = "SELECT * FROM medidaresguardoxi";
                $answerresxi = $mysqli->query($resguardoxi);
                while($resguardosxi = $answerresxi->fetch_assoc()){
                 echo "<option value='".$resguardosxi['nombre']."'>".$resguardosxi['nombre']."</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-md-6 mb-3 validar" id="medidaxii_of_resguardo" style="display:none;">
              <label for="medida_sujetosrecluidos">MEDIDA OTORGADA A SUJETOS RECLUIDOS</label>
              <select class="form-select" name="form_medida_sujetosrecluidos" id="medida_sujetosrecluidos">
                <option disabled selected value>SELECCIONE LA MEDIDA</option>
                <?php
                $resguardoxii = "SELECT * FROM medidaresguardoxii";
                $answerresxii = $mysqli->query($resguardoxii);
                while($resguardosxii = $answerresxii->fetch_assoc()){
                 echo "<option value='".$resguardosxii['nombre']."'>".$resguardosxii['nombre']."</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-md-6 mb-3 validar" id="other_of_resguardo" style="display:none;">
              <label for="other_medida_guard">OTRA MEDIDA DE RESGUARDO</label>
              <input class="form-control" type="text" name="form_other_medida_guard" id="other_medida_guard">
            </div>
            <div class="col-md-6 mb-3 validar" id="date_of_medida_provisional" style="display:none;">
              <label for="date_extent_of_provisional">FECHA DE INICIO DE LA MEDIDA PROVISIONAL</label>
              <input class="form-control" type="date" name="form_date_extent_of_provisional" id="date_extent_of_provisional">
            </div>
            <div class="col-md-6 mb-3 validar" id="date_of_medida_definitiva" style="display:none;">
              <label for="date_extent_of_definitiva">FECHA DE INICIO DE LA MEDIDA DEFINITIVA</label>
              <input class="form-control" type="date" name="form_date_extent_of_definitiva" id="date_extent_of_definitiva">
            </div>
          </div>
          <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
            <strong style="color: #f8fdfc;">COMENTARIOS</strong>
          </div>
          <textarea name="commentmediprovsuj" id="commentmediprovsuj" rows="5" cols="167" placeholder="Escribe tus comentarios" maxlength="2000" style="resize: none;"></textarea>
          <br><br>
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
