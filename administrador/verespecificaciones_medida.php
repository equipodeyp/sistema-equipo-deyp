<?php
$medida = "SELECT * FROM medidas WHERE id = '$id_medida'";
$resultadomedida = $mysqli->query($medida);
$rowmedida = $resultadomedida->fetch_array();
$tipo_medidasuj = $rowmedida['tipo'];
?>
<div class="modal fade" id="verdetalle_medida_<?php echo $id_medida;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h2 style="display: block; margin: 0 auto;" class="modal-title" id="miModalLabel">DETALLES ESPECIFICOS DE LA MEDIDA OTORGADA</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo $id_medida; ?>
        <form class="" action="./controllers/complementar_medprov.php?idmedida=<?php echo $id_medida; ?>" method="post">
          <div style="padding:0px; border:solid 4px;">
            <section class="container well form-horizontal secciones"><br>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">MEDIDA OTORGADA</strong>
              </div>


              <!-- </div> -->
              <div class="row">
                <div class="col-md-6 mb-3 validar">
                  <label for="categoriamedsujprov">CATEGORÍA DE LA MEDIDA<span class="required"></span></label>
                  <select class="form-select" id="categoriamedsujprov" name="CATEAGORIA_MEDIDA" disabled>
                    <option disabled selected><?php echo $rowmedida['categoria']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="tipomedsujprov">TIPO DE MEDIDA<span class="required"></span></label>
                  <select class="form-select" id="tipomedsujprov" name="TIPO_DE_MEDIDA" disabled>
                    <option disabled selected><?php echo $rowmedida['tipo']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="sltclasif">CLASIFICACIÓN DE LA MEDIDA<span class="required"></span></label>
                  <select id="sltclasif" class="form-select select-clasificacion" data-target-modal="verdetalle_medida_<?php echo $id_medida;?>" name="CLASIFICACION_MEDIDA"  required>
                    <option disabled selected value>SELECCIONE LA CLASIFICACIÓN DE LA MEDIDA</option>
                    <option value="ASISTENCIA">ASISTENCIA</option>
                    <option value="RESGUARDO">RESGUARDO</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 div-clasificacion ASISTENCIA-div" style="display:none;">
                  <label for="MEDIDAS_ASISTENCIA">INCISO DE LA MEDIDA DE ASISTENCIA<span class="required"></span></label>
                  <select id="MEDIDAS_ASISTENCIA" class="form-select select-asistencia" data-target-modal="verdetalle_medida_<?php echo $id_medida;?>" name="MEDIDAS_ASISTENCIA">
                    <option disabled selected value>SELECCIONE LA MEDIDA</option>
                    <?php
                    $asistencia = "SELECT * FROM medidaasistencia";
                    $answerasis = $mysqli->query($asistencia);
                    while($asistencias = $answerasis->fetch_assoc()){
                      echo "<option value='".$asistencias['idsltname']."'>".$asistencias['nombre']."</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-6 mb-3 div-asistencia OTRAS-div" style="display:none;">
                  <label for="othermediasissujprov">OTRA MEDIDA ASISTENCIA<span class="required"></span></label>
                  <input class="form-control ipt-asistencia" id="othermediasissujprov" name="OTRA_MEDIDA_ASISTENCIA" type="text">
                </div>
                <div class="col-md-6 mb-3 div-clasificacion RESGUARDO-div" style="display:none;">
                  <label for="MEDIDAS_RESGUARDO">INCISO DE LA MEDIDA DE RESGUARDO<span class="required"></span></label>
                  <select class="form-select select-resguardo" id="MEDIDAS_RESGUARDO" data-target-modal="verdetalle_medida_<?php echo $id_medida;?>" name="MEDIDAS_RESGUARDO">
                    <option disabled selected value>SELECCIONE LA MEDIDA</option>
                    <?php
                    $resguardo = "SELECT * FROM medidaresguardo";
                    $answerres = $mysqli->query($resguardo);
                    while($resguardos = $answerres->fetch_assoc()){
                     echo "<option value='".$resguardos['idsltname']."'>".$resguardos['nombre']."</option>";
                    }
                    ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3 div-resguardo PROCESALES-div" style="display:none;">
                  <label for="RESGUARDO_XI">EJECUCIÓN DE LA MEDIDA PROCESAL<span class="required"></span></label>
                  <select class="form-select select-procesal" id="RESGUARDO_XI" name="RESGUARDO_XI" >
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
                <div class="col-md-6 mb-3 div-resguardo RECLUIDOS-div" style="display:none;">
                  <label for="RESGUARDO_XII">MEDIDA OTORGADA A SUJETOS RECLUIDOS<span class="required"></span></label>
                  <select class="form-select select-recluido" id="RESGUARDO_XII" name="RESGUARDO_XII">
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
                <div class="col-md-6 mb-3 div-resguardo OTRASR-div" style="display:none;">
                  <label for="OTRA_MEDIDA_RESGUARDO">OTRA MEDIDA RESGUARDO<span class="required"></span></label>
                  <input class="form-control ipt-resguardo" id="OTRA_MEDIDA_RESGUARDO" name="OTRA_MEDIDA_RESGUARDO" placeholder="" type="text">
                </div>
                <div class="col-md-6 mb-3 validar" id="date_provisional" style="display:;">
                  <label for="INICIO_EJECUCION_MEDIDA">FECHA DE INICIO DE LA MEDIDA <?php echo $tipo_medidasuj; ?><span class="required"></span></label>
                  <input class="form-control" id="INICIO_EJECUCION_MEDIDA" name="INICIO_EJECUCION_MEDIDA" value="<?php if ($tipo_medidasuj =='PROVISIONAL') {
                    echo $rowmedida['date_provisional'];
                  }else {
                    echo $rowmedida['date_definitva'];
                  } ?>" type="date" disabled>
                </div>
              </div>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">ESTATUS DE LA MEDIDA</strong>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3 validar">
                  <label for="ESTATUS_MEDIDA">ESTATUS DE LA MEDIDA<span class="required"></span></label>
                  <select class="form-select" id="ESTATUS_MEDIDA" required="" name="ESTATUS_MEDIDA" disabled>
                    <option disabled selected><?php echo $rowmedida['estatus']; ?></option>
                    </select>
                </div>
              </div>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">COMENTARIOS</strong>
              </div>
              <textarea name="commentmediprovsuj" id="commentmediprovsuj" rows="5" cols="162" placeholder="Escribe tus comentarios" maxlength="2000" style="resize: none;"></textarea>
              <br><br>
            </section>
          </div>
        <div class="modal-footer d-flex justify-content-center">
          <div class="row">
            <div>
              <button style="display: block; margin: 0 auto;" class="btn color-btn-success btn-sm" id="enter" type="submit">ACTUALIZAR</button>
            </div>
          </div>
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CANCELAR</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
