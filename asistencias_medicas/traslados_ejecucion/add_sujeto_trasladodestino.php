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
          <form method="POST" action="guardarsujetocondestino.php?id_traslado=<?php echo $id_traslado; ?>" enctype= "multipart/form-data">
            <div id="contenedor-personas">
              <div class="persona-form">
                <div class="row">
                  <!-- <span>______________________________________________________________________________________________</span> -->
                  <div class=" well form-horizontal">
                    <div class="row">
                      <!-- select de expediente -->
                      <div class="form-group">
                        <label class="col-md-4 control-label">EXPEDIENTE</label>
                        <div class="col-md-4 selectContainer">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                            <select class="form-control expediente" name="nombre" required>
                              <option disabled selected value="">SELECCIONE EL EXPEDIENTE</option>
                              <?php
                              $select1 = "SELECT DISTINCT datospersonales.folioexpediente
                              FROM datospersonales";
                              $answer1 = $mysqli->query($select1);
                              while($valores1 = $answer1->fetch_assoc()){
                                $result_folio = $valores1['folioexpediente'];
                                echo "<option value='$result_folio'>$result_folio</option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- select de id de sujeto -->
                      <div class="form-group">
                        <label class="col-md-4 control-label">ID DE LA PP O SP</label>
                        <div class="col-md-4 selectContainer">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                            <select class="form-control id-sujeto" name="id_sujeto" required>
                              <option disabled selected value="">SELECCIONE EL ID DEL SUJETO</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- input de si esta en estadia -->
                      <div class="form-group">
                        <label class="col-md-4 control-label">EN ESTADÍA</label>
                        <div class="col-md-4 selectContainer">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                            <select class="form-control en-resguardo" name="resguardo">
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- checkbox de destinos -->
                      <div class="form-group">
                        <label class="col-md-4 control-label">DESTINO(S)</label>
                        <div class="col-md-8 selectContainer">
                          <div class="input-group">
                            <!-- <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span> -->
                            <div class="form-check">
                            <?php
                            $auxcheckdest = 0;
                            $traerdestinos2 = "SELECT * FROM react_destinos_traslados WHERE id_traslado = '$id_traslado'";
                            $rtraerdestinos2 = $mysqli->query($traerdestinos2);
                            while ($ftraerdestinos2 = $rtraerdestinos2->fetch_assoc()) {
                              $mot = $ftraerdestinos2['motivo'];
                              $auxcheckdest = $auxcheckdest + 1;
                              $iddestinocheck = $ftraerdestinos2['id']
                              ?>
                              <div>
                                <input type="checkbox" id="<?php echo $mot; ?>" name="checkdestino[]" value="<?php echo $iddestinocheck; ?>" style="height: 25px; width: 25px;" onclick="return OptionsSelected(this)">
                                <label for="coding"><?php echo $auxcheckdest.'.'.$ftraerdestinos2['motivo']; ?></label>
                              </div>
                              <?php
                            }
                            ?>
                          </div>
                          </div>
                        </div>
                      </div>
                      <!-- select de asistencia medica en caso de que sea traslado de asistencia medica -->
                      <div class="form-group" id="showasismed2" style="display:none;">
                        <label class="col-md-4 control-label">ASISTENCIA MEDICA</label>
                        <div class="col-md-4 selectContainer">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                            <select class="form-control asistencia-medica" name="asistencia_medica">
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- fin de formulario -->
                    </div>
                  </div>
                  <div class="row col-md-12" style="display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-success">GUARDAR SUJETO <span class="glyphicon glyphicon-ok"></span></button>
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


/////////////////////////
function OptionsSelected(me)
{
  // alert(me.id);
  // console.log(me.id);
    if (me.id === 'ASISTENCIA MÉDICA') {
      // console.log('si');
      $('input[type="checkbox"]').on('change', function(e){
          if (this.checked) {
              // console.log('Checkbox ' + $(e.currentTarget).val() + ' checked');
              document.getElementById('showasismed2').style.display= '';
          } else {
              // console.log('Checkbox ' + $(e.currentTarget).val() + ' unchecked');
              document.getElementById('showasismed2').style.display= 'none';
              // document.getElementById("asistencia_medica").value = '';
          }
      });
      // document.getElementById('showasismed2').style.display= '';
    }else if (me.id !== 'ASISTENCIA MÉDICA') {
      // console.log('no');
      $('input[type="checkbox"]').on('change', function(e){
          if (this.checked) {
              // console.log('Checkbox ' + $(e.currentTarget).val() + ' checked');
              document.getElementById('showasismed2').style.display= 'none';
              // document.getElementById("asistencia_medica").value = '';
          } else {
              // console.log('Checkbox ' + $(e.currentTarget).val() + ' unchecked');
              document.getElementById('showasismed2').style.display= 'none';
              // document.getElementById("asistencia_medica").value = '';
          }
      });

    }

}
////////////

</script>
