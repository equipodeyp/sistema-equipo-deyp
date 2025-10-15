<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="add_sujetotraslado<?php echo $id_traslado; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:50%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h1 class="modal-title" id="myModalLabel">PERSONA PROPUESTA O SUJETO PROTEGIDO</h1></center>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form method="POST" action="save_part2_traslado.php?id_traslado=<?php echo $id_traslado; ?>" enctype= "multipart/form-data">
            <div id="contenedor-personas">
              <div class="persona-form">
                <div class="row">
                  <!-- <span>______________________________________________________________________________________________</span> -->
                  <div class=" well form-horizontal">
                    <div class="row">
                      <div id="contenedor-personas">
                        <div class="persona-form">
                          <div class="row">
                            <div class="col-md-6" style="text-align: center; border: 1px solid #ECECEC;">
                              <label class="col-md-6 control-label" style="text-align: center; border: 1px solid #ECECEC;">MOTIVO</label>
                                <select name="motivotraslado" class="form-control selectpicker" required onchange="motivotras(this)">
                                  <option disabled selected value>SELECCIONE UN MOTIVO</option>
                                  <?php
                                  $trasladomotivo = "SELECT * FROM react_traslados_instancias";
                                  $rtrasladomotivo = $mysqli->query($trasladomotivo);
                                  while($ftrasladomotivo = $rtrasladomotivo->fetch_assoc()){
                                   echo "<option value='".$ftrasladomotivo['nombre']."'>".$ftrasladomotivo['nombre']."</option>";
                                  }
                                  ?>
                                </select>
                            </div>

                            <div class="col-md-6" style="display:none; text-align: center; border: 1px solid #ECECEC;" id="motivo_inc">
                              <label class="col-md-6 control-label" style="text-align: center; border: 1px solid #ECECEC;">LUGAR</label>
                                <!-- <input name="lugardestino[]" placeholder="INGRESE LUGAR DE DESTINO" class="form-control" type="text" required> -->
                                <select id="selectmot_inc" name="lugardestino1" class="form-control selectpicker" onchange="motivotras_inc(this)">
                                  <option disabled selected value>SELECCIONE LUGAR</option>
                                  <?php
                                  $trasladomotivoinc = "SELECT * FROM react_traslados_mot_inc";
                                  $rtrasladomotivoinc = $mysqli->query($trasladomotivoinc);
                                  while($ftrasladomotivoinc = $rtrasladomotivoinc->fetch_assoc()){
                                   echo "<option value='".$ftrasladomotivoinc['lugar']."'>".$ftrasladomotivoinc['lugar']."</option>";
                                  }
                                  ?>
                                </select>
                            </div>

                            <div class="col-md-6" style="display:none; text-align: center; border: 1px solid #ECECEC;" id="motivo_desinc">
                              <label class="col-md-6 control-label" style="text-align: center; border: 1px solid #ECECEC;">LUGAR</label>
                                <select id="selectmot_desinc" name="lugardestino2" class="form-control selectpicker" onchange="motivotras_desinc(this)">
                                  <option disabled selected value>SELECCIONE LUGAR</option>
                                  <?php
                                  $trasladomotivodesinc = "SELECT * FROM react_traslados_mot_desinc";
                                  $rtrasladomotivodesinc = $mysqli->query($trasladomotivodesinc);
                                  while($ftrasladomotivodesinc = $rtrasladomotivodesinc->fetch_assoc()){
                                   echo "<option value='".$ftrasladomotivodesinc['lugar']."'>".$ftrasladomotivodesinc['lugar']."</option>";
                                  }
                                  ?>
                                </select>
                            </div>

                            <div class="col-md-6" style="display:none; text-align: center; border: 1px solid #ECECEC;" id="motivo_visfam">
                              <label class="col-md-6 control-label" style="text-align: center; border: 1px solid #ECECEC;">LUGAR</label>
                                <select id="selectmot_visfam" name="lugardestino3" class="form-control selectpicker" onchange="motivotras_visfam(this)">
                                  <option disabled selected value>SELECCIONE LUGAR</option>
                                  <?php
                                  $trasladomotivovisfam = "SELECT * FROM react_traslados_mot_visfam";
                                  $rtrasladomotivovisfam = $mysqli->query($trasladomotivovisfam);
                                  while($ftrasladomotivovisfam = $rtrasladomotivovisfam->fetch_assoc()){
                                   echo "<option value='".$ftrasladomotivovisfam['lugar']."'>".$ftrasladomotivovisfam['lugar']."</option>";
                                  }
                                  ?>
                                </select>
                            </div>

                            <div class="col-md-6" style="display:none; text-align: center; border: 1px solid #ECECEC;" id="motivo_dilmin">
                              <label class="col-md-6 control-label" style="text-align: center; border: 1px solid #ECECEC;">LUGAR</label>
                                <select id="selectmot_dilmin" name="lugardestino4" class="form-control selectpicker" onchange="motivotras_dilmin(this)">
                                  <option disabled selected value>SELECCIONE LUGAR</option>
                                  <?php
                                  $trasladomotivodilmin = "SELECT * FROM react_traslados_mot_dilmin";
                                  $rtrasladomotivodilmin = $mysqli->query($trasladomotivodilmin);
                                  while($ftrasladomotivodilmin = $rtrasladomotivodilmin->fetch_assoc()){
                                   echo "<option value='".$ftrasladomotivodilmin['lugar']."'>".$ftrasladomotivodilmin['lugar']."</option>";
                                  }
                                  ?>
                                </select>
                            </div>

                            <div class="col-md-6" style="display:none; text-align: center; border: 1px solid #ECECEC;" id="motivo_diljud">
                              <label class="col-md-6 control-label" style="text-align: center; border: 1px solid #ECECEC;">LUGAR</label>
                                <select id="selectmot_diljud" name="lugardestino5" class="form-control selectpicker" onchange="motivotras_diljud(this)">
                                  <option disabled selected value>SELECCIONE LUGAR</option>
                                  <?php
                                  $trasladomotivodiljud = "SELECT * FROM react_traslados_mot_diljud";
                                  $rtrasladomotivodiljud = $mysqli->query($trasladomotivodiljud);
                                  while($ftrasladomotivodiljud = $rtrasladomotivodiljud->fetch_assoc()){
                                   echo "<option value='".$ftrasladomotivodiljud['lugar']."'>".$ftrasladomotivodiljud['lugar']."</option>";
                                  }
                                  ?>
                                </select>
                            </div>

                            <div class="col-md-6" style="display:none; text-align: center; border: 1px solid #ECECEC;" id="motivo_asimed">
                              <label class="col-md-6 control-label" style="text-align: center; border: 1px solid #ECECEC;">LUGAR</label>
                                <select id="selectmot_asimed" name="lugardestino6" class="form-control selectpicker" onchange="motivotras_asimed(this)">
                                  <option disabled selected value>SELECCIONE LUGAR</option>
                                  <?php
                                  $trasladomotivoasimed = "SELECT * FROM react_traslados_mot_asimed";
                                  $rtrasladomotivoasimed = $mysqli->query($trasladomotivoasimed);
                                  while($ftrasladomotivoasimed = $rtrasladomotivoasimed->fetch_assoc()){
                                   echo "<option value='".$ftrasladomotivoasimed['lugar']."'>".$ftrasladomotivoasimed['lugar']."</option>";
                                  }
                                  ?>
                                </select>
                            </div>

                            <div class="col-md-6" style="display:none; text-align: center; border: 1px solid #ECECEC;" id="motivo_cuspol">
                              <label class="col-md-6 control-label" style="text-align: center; border: 1px solid #ECECEC;">LUGAR</label>
                                <select id="selectmot_cuspol" name="lugardestino7" class="form-control selectpicker" onchange="motivotras_cuspol(this)">
                                  <option disabled selected value>SELECCIONE LUGAR</option>
                                  <?php
                                  $trasladomotivocuspol = "SELECT * FROM react_traslados_mot_cuspol";
                                  $rtrasladomotivocuspol = $mysqli->query($trasladomotivocuspol);
                                  while($ftrasladomotivocuspol = $rtrasladomotivocuspol->fetch_assoc()){
                                   echo "<option value='".$ftrasladomotivocuspol['lugar']."'>".$ftrasladomotivocuspol['lugar']."</option>";
                                  }
                                  ?>
                                </select>
                            </div>
                          </div>
                          <div class="row">
                            <!-- cuando se seleccione otro se abren lugar domicilio y municipio -->
                            <!-- ESPECIFICAR MOTIVO -->
                            <!-- <div class="col-md-4" style="display:none;" id="especif_motivotrs_ds"> -->
                              <!-- <label class="col-md-4 control-label">ESPECIFIQUE</label> -->
                              <!-- <input id="especificar_motivo_trs" name="especificarmotivotrs" placeholder="INGRESE MOTIVO" class="form-control" type="text" autocomplete="off"> -->
                            <!-- </div> -->
                            <!-- <br> -->
                            <!-- <div class="row"> -->
                            <!-- <h1>prueba</h1> -->
                            <div class="col-md-4" style="display:none;" id="especif_lugar">
                              <label class="col-md-4 control-label">LUGAR</label>
                              <input id="esp_lugar_motivo" name="esp_lugar_motivosave" placeholder="INGRESE LUGAR DE DESTINO" class="form-control" type="text" autocomplete="off">
                            </div>

                            <div class="col-md-4" style="display:none;" id="especif_domicilio">
                              <label class="text-center col-md-4 control-label">DOMICILIO</label>
                              <input id="esp_domicilio_motivo" name="esp_domicilio_motivosave" placeholder="INGRESE DOMICILIO DE DESTINO" class="form-control" type="text" autocomplete="off">
                            </div>

                            <div class="col-md-4" style="display:none;" id="especif_municipio">
                              <label class="col-md-4 control-label">MUNICIPIO</label>
                              <select id="esp_municipio_motivo" name="esp_municipio_motivosave" class="form-control selectpicker" autocomplete="off">
                                <option disabled selected value>SELECCIONE UN MUNICIPIO</option>
                                <option value="CIUDAD DE MEXICO">CIUDAD DE MEXICO</option>
                                <?php
                                $municipio = "SELECT * FROM municipios";
                                $answermun = $mysqli->query($municipio);
                                while($municipios = $answermun->fetch_assoc()){
                                  echo "<option value='".$municipios['nombre']."'>".$municipios['nombre']."</option>";
                                }
                                ?>
                              </select>
                            </div>
                            <!-- </div> -->
                          </div>
                          <br>


                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row col-md-12" style="display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-success">GUARDAR DESTINO <span class="glyphicon glyphicon-ok"></span></button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CERRAR</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function ocultar_inputs_text(){
  document.getElementById("especif_lugar").style.display = "none";
  document.getElementById("especif_domicilio").style.display = "none";
  document.getElementById("especif_municipio").style.display = "none";
  //
  document.getElementById("esp_lugar_motivo").value = "";
  document.getElementById("esp_domicilio_motivo").value = "";
  document.getElementById("esp_municipio_motivo").value = "";
  // document.getElementById("especificar_motivo_trs").value = "";
  //
  document.getElementById("esp_lugar_motivo").required = false;
  document.getElementById("esp_domicilio_motivo").required = false;
  document.getElementById("esp_municipio_motivo").required = false;
  // document.getElementById("especificar_motivo_trs").required = false;
}
function mostrar_inputs_text(){
  document.getElementById("especif_lugar").style.display = "";
  document.getElementById("especif_domicilio").style.display = "";
  document.getElementById("especif_municipio").style.display = "";
  //
  document.getElementById("esp_lugar_motivo").value = "";
  document.getElementById("esp_domicilio_motivo").value = "";
  document.getElementById("esp_municipio_motivo").value = "";
  // document.getElementById("especificar_motivo_trs").value = "";
  //
  document.getElementById("esp_lugar_motivo").required = true;
  document.getElementById("esp_domicilio_motivo").required = true;
  document.getElementById("esp_municipio_motivo").required = true;
  // document.getElementById("especificar_motivo_trs").required = false;
}
function motivotras(sel) {
  console.log(sel.value);
  if (sel.value === 'POR INCORPORACION') {
    document.getElementById("motivo_inc").style.display = "";
    document.getElementById("motivo_desinc").style.display = "none";
    document.getElementById("motivo_visfam").style.display = "none";
    document.getElementById("motivo_dilmin").style.display = "none";
    document.getElementById("motivo_diljud").style.display = "none";
    document.getElementById("motivo_asimed").style.display = "none";
    document.getElementById("motivo_cuspol").style.display = "none";
    // document.getElementById("especif_motivotrs_ds").style.display = "none";
    //
    // document.getElementById("selectmot_inc").style.display = "";
    document.getElementById("selectmot_desinc").value = "";
    document.getElementById("selectmot_visfam").value = "";
    document.getElementById("selectmot_dilmin").value = "";
    document.getElementById("selectmot_diljud").value = "";
    document.getElementById("selectmot_asimed").value = "";
    document.getElementById("selectmot_cuspol").value = "";
    // document.getElementById("especificar_motivo_trs").value = "";
    //
    ocultar_inputs_text();
    //
    document.getElementById("selectmot_inc").required = true;
    document.getElementById("selectmot_desinc").required = false;
    document.getElementById("selectmot_visfam").required = false;
    document.getElementById("selectmot_dilmin").required = false;
    document.getElementById("selectmot_diljud").required = false;
    document.getElementById("selectmot_asimed").required = false;
    document.getElementById("selectmot_cuspol").required = false;
  }else if (sel.value === 'POR DESINCORPORACION') {
    document.getElementById("motivo_inc").style.display = "none";
    document.getElementById("motivo_desinc").style.display = "";
    document.getElementById("motivo_visfam").style.display = "none";
    document.getElementById("motivo_dilmin").style.display = "none";
    document.getElementById("motivo_diljud").style.display = "none";
    document.getElementById("motivo_asimed").style.display = "none";
    document.getElementById("motivo_cuspol").style.display = "none";
    // document.getElementById("especif_motivotrs_ds").style.display = "none";
    //
    document.getElementById("selectmot_inc").value = "";
    // document.getElementById("selectmot_desinc").value = "";
    document.getElementById("selectmot_visfam").value = "";
    document.getElementById("selectmot_dilmin").value = "";
    document.getElementById("selectmot_diljud").value = "";
    document.getElementById("selectmot_asimed").value = "";
    document.getElementById("selectmot_cuspol").value = "";
    // document.getElementById("especificar_motivo_trs").value = "";
    //
    ocultar_inputs_text();
    //
    document.getElementById("selectmot_inc").required = false;
    document.getElementById("selectmot_desinc").required = true;
    document.getElementById("selectmot_visfam").required = false;
    document.getElementById("selectmot_dilmin").required = false;
    document.getElementById("selectmot_diljud").required = false;
    document.getElementById("selectmot_asimed").required = false;
    document.getElementById("selectmot_cuspol").required = false;
  }else if (sel.value === 'VISITA FAMILIAR') {
    document.getElementById("motivo_inc").style.display = "none";
    document.getElementById("motivo_desinc").style.display = "none";
    document.getElementById("motivo_visfam").style.display = "";
    document.getElementById("motivo_dilmin").style.display = "none";
    document.getElementById("motivo_diljud").style.display = "none";
    document.getElementById("motivo_asimed").style.display = "none";
    document.getElementById("motivo_cuspol").style.display = "none";
    // document.getElementById("especif_motivotrs_ds").style.display = "none";
    //
    document.getElementById("selectmot_inc").value = "";
    document.getElementById("selectmot_desinc").value = "";
    // document.getElementById("selectmot_visfam").value = "";
    document.getElementById("selectmot_dilmin").value = "";
    document.getElementById("selectmot_diljud").value = "";
    document.getElementById("selectmot_asimed").value = "";
    document.getElementById("selectmot_cuspol").value = "";
    // document.getElementById("especificar_motivo_trs").value = "";
    //
    ocultar_inputs_text();
    //
    document.getElementById("selectmot_inc").required = false;
    document.getElementById("selectmot_desinc").required = false;
    document.getElementById("selectmot_visfam").required = true;
    document.getElementById("selectmot_dilmin").required = false;
    document.getElementById("selectmot_diljud").required = false;
    document.getElementById("selectmot_asimed").required = false;
    document.getElementById("selectmot_cuspol").required = false;
  }else if (sel.value === 'DILIGENCIA MINISTERIAL') {
    document.getElementById("motivo_inc").style.display = "none";
    document.getElementById("motivo_desinc").style.display = "none";
    document.getElementById("motivo_visfam").style.display = "none";
    document.getElementById("motivo_dilmin").style.display = "";
    document.getElementById("motivo_diljud").style.display = "none";
    document.getElementById("motivo_asimed").style.display = "none";
    document.getElementById("motivo_cuspol").style.display = "none";
    // document.getElementById("especif_motivotrs_ds").style.display = "none";
    //
    document.getElementById("selectmot_inc").value = "";
    document.getElementById("selectmot_desinc").value = "";
    document.getElementById("selectmot_visfam").value = "";
    // document.getElementById("selectmot_dilmin").value = "";
    document.getElementById("selectmot_diljud").value = "";
    document.getElementById("selectmot_asimed").value = "";
    document.getElementById("selectmot_cuspol").value = "";
    // document.getElementById("especificar_motivo_trs").value = "";
    //
    ocultar_inputs_text();
    //
    document.getElementById("selectmot_inc").required = false;
    document.getElementById("selectmot_desinc").required = false;
    document.getElementById("selectmot_visfam").required = false;
    document.getElementById("selectmot_dilmin").required = true;
    document.getElementById("selectmot_diljud").required = false;
    document.getElementById("selectmot_asimed").required = false;
    document.getElementById("selectmot_cuspol").required = false;
  }else if (sel.value === 'DILIGENCIA JUDICIAL') {
    document.getElementById("motivo_inc").style.display = "none";
    document.getElementById("motivo_desinc").style.display = "none";
    document.getElementById("motivo_visfam").style.display = "none";
    document.getElementById("motivo_dilmin").style.display = "none";
    document.getElementById("motivo_diljud").style.display = "";
    document.getElementById("motivo_asimed").style.display = "none";
    document.getElementById("motivo_cuspol").style.display = "none";
    // document.getElementById("especif_motivotrs_ds").style.display = "none";
    //
    document.getElementById("selectmot_inc").value = "";
    document.getElementById("selectmot_desinc").value = "";
    document.getElementById("selectmot_visfam").value = "";
    document.getElementById("selectmot_dilmin").value = "";
    // document.getElementById("selectmot_diljud").value = "";
    document.getElementById("selectmot_asimed").value = "";
    document.getElementById("selectmot_cuspol").value = "";
    // document.getElementById("especificar_motivo_trs").value = "";
    //
    ocultar_inputs_text();
    //
    document.getElementById("selectmot_inc").required = false;
    document.getElementById("selectmot_desinc").required = false;
    document.getElementById("selectmot_visfam").required = false;
    document.getElementById("selectmot_dilmin").required = false;
    document.getElementById("selectmot_diljud").required = true;
    document.getElementById("selectmot_asimed").required = false;
    document.getElementById("selectmot_cuspol").required = false;
  }else if (sel.value === 'ASISTENCIA MEDICA') {
    document.getElementById("motivo_inc").style.display = "none";
    document.getElementById("motivo_desinc").style.display = "none";
    document.getElementById("motivo_visfam").style.display = "none";
    document.getElementById("motivo_dilmin").style.display = "none";
    document.getElementById("motivo_diljud").style.display = "none";
    document.getElementById("motivo_asimed").style.display = "";
    document.getElementById("motivo_cuspol").style.display = "none";
    // document.getElementById("especif_motivotrs_ds").style.display = "none";
    //
    document.getElementById("selectmot_inc").value = "";
    document.getElementById("selectmot_desinc").value = "";
    document.getElementById("selectmot_visfam").value = "";
    document.getElementById("selectmot_dilmin").value = "";
    document.getElementById("selectmot_diljud").value = "";
    // document.getElementById("selectmot_asimed").value = "";
    document.getElementById("selectmot_cuspol").value = "";
    // document.getElementById("especificar_motivo_trs").value = "";
    //
    ocultar_inputs_text();
    //
    document.getElementById("selectmot_inc").required = false;
    document.getElementById("selectmot_desinc").required = false;
    document.getElementById("selectmot_visfam").required = false;
    document.getElementById("selectmot_dilmin").required = false;
    document.getElementById("selectmot_diljud").required = false;
    document.getElementById("selectmot_asimed").required = true;
    document.getElementById("selectmot_cuspol").required = false;
  }else if (sel.value === 'CUSTODIA POLICIAL') {
    document.getElementById("motivo_inc").style.display = "none";
    document.getElementById("motivo_desinc").style.display = "none";
    document.getElementById("motivo_visfam").style.display = "none";
    document.getElementById("motivo_dilmin").style.display = "none";
    document.getElementById("motivo_diljud").style.display = "none";
    document.getElementById("motivo_asimed").style.display = "none";
    document.getElementById("motivo_cuspol").style.display = "";
    // document.getElementById("especif_motivotrs_ds").style.display = "none";
    //
    document.getElementById("selectmot_inc").value = "";
    document.getElementById("selectmot_desinc").value = "";
    document.getElementById("selectmot_visfam").value = "";
    document.getElementById("selectmot_dilmin").value = "";
    document.getElementById("selectmot_diljud").value = "";
    document.getElementById("selectmot_asimed").value = "";
    // document.getElementById("especificar_motivo_trs").value = "";
    // document.getElementById("selectmot_cuspol").value = "";
    //
    ocultar_inputs_text();
    //
    document.getElementById("selectmot_inc").required = false;
    document.getElementById("selectmot_desinc").required = false;
    document.getElementById("selectmot_visfam").required = false;
    document.getElementById("selectmot_dilmin").required = false;
    document.getElementById("selectmot_diljud").required = false;
    document.getElementById("selectmot_asimed").required = false;
    document.getElementById("selectmot_cuspol").required = true;
  }else if (sel.value === 'DILIGENCIA ADMINISTRATIVA CON SUJETO') {
    document.getElementById("motivo_inc").style.display = "none";
    document.getElementById("motivo_desinc").style.display = "none";
    document.getElementById("motivo_visfam").style.display = "none";
    document.getElementById("motivo_dilmin").style.display = "none";
    document.getElementById("motivo_diljud").style.display = "none";
    document.getElementById("motivo_asimed").style.display = "none";
    document.getElementById("motivo_cuspol").style.display = "none";
    // document.getElementById("especif_motivotrs_ds").style.display = "";
    document.getElementById("selectmot_inc").value = "";
    document.getElementById("selectmot_desinc").value = "";
    document.getElementById("selectmot_visfam").value = "";
    document.getElementById("selectmot_dilmin").value = "";
    document.getElementById("selectmot_diljud").value = "";
    document.getElementById("selectmot_asimed").value = "";
    document.getElementById("selectmot_cuspol").value = "";
    //
    mostrar_inputs_text();
    document.getElementById("selectmot_inc").required = false;
    document.getElementById("selectmot_desinc").required = false;
    document.getElementById("selectmot_visfam").required = false;
    document.getElementById("selectmot_dilmin").required = false;
    document.getElementById("selectmot_diljud").required = false;
    document.getElementById("selectmot_asimed").required = false;
    document.getElementById("selectmot_cuspol").required = false;
  }else if (sel.value === 'DILIGENCIA ADMINISTRATIVA SIN SUJETO') {
    document.getElementById("motivo_inc").style.display = "none";
    document.getElementById("motivo_desinc").style.display = "none";
    document.getElementById("motivo_visfam").style.display = "none";
    document.getElementById("motivo_dilmin").style.display = "none";
    document.getElementById("motivo_diljud").style.display = "none";
    document.getElementById("motivo_asimed").style.display = "none";
    document.getElementById("motivo_cuspol").style.display = "none";
    // document.getElementById("especif_motivotrs_ds").style.display = "";
    document.getElementById("selectmot_inc").value = "";
    document.getElementById("selectmot_desinc").value = "";
    document.getElementById("selectmot_visfam").value = "";
    document.getElementById("selectmot_dilmin").value = "";
    document.getElementById("selectmot_diljud").value = "";
    document.getElementById("selectmot_asimed").value = "";
    document.getElementById("selectmot_cuspol").value = "";
    //
    mostrar_inputs_text();
    document.getElementById("selectmot_inc").required = false;
    document.getElementById("selectmot_desinc").required = false;
    document.getElementById("selectmot_visfam").required = false;
    document.getElementById("selectmot_dilmin").required = false;
    document.getElementById("selectmot_diljud").required = false;
    document.getElementById("selectmot_asimed").required = false;
    document.getElementById("selectmot_cuspol").required = false;
  }
}
// funciones de cada opcion de select de lugar dependiendo el motivo
// INCORPORACION
function motivotras_inc(sel1){
  console.log(sel1.value);
  if (sel1.value === 'OTRO') {
    mostrar_inputs_text()
  }else {
    ocultar_inputs_text();
  }
}
// DESINCORPORACION
function motivotras_desinc(sel2){
  console.log(sel2.value);
  if (sel2.value === 'OTRO') {
    mostrar_inputs_text()
  }else {
    ocultar_inputs_text();
  }
}
// VISITA FAMILIAR
function motivotras_visfam(sel3){
  console.log(sel3.value);
  if (sel3.value === 'OTRO') {
    mostrar_inputs_text()
  }else {
    ocultar_inputs_text();
  }
}
// DILIGENCIA MINISTERIAL
function motivotras_dilmin(sel4){
  console.log(sel4.value);
  if (sel4.value === 'OTRO') {
    mostrar_inputs_text()
  }else {
    ocultar_inputs_text();
  }
}
// DILIGENCIA JUDICIAL
function motivotras_diljud(sel5){
  console.log(sel5.value);
  if (sel5.value === 'OTRO') {
    mostrar_inputs_text()
  }else {
    ocultar_inputs_text();
  }
}
// ASISTENCIA MEDICA
function motivotras_asimed(sel6){
  console.log(sel6.value);
  if (sel6.value === 'OTRO') {
    mostrar_inputs_text()
  }else {
    ocultar_inputs_text();
  }
}
// CUSTODIA POLICIAL
function motivotras_cuspol(sel7){
  console.log(sel7.value);
  if (sel7.value === 'OTRO') {
    mostrar_inputs_text()
  }else {
    ocultar_inputs_text();
  }
}
</script>
