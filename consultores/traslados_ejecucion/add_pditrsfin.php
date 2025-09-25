<div class="modal fade" id="add_pditrs_<?php echo $id_traslado; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:90%;  margin-top: 50px; margin-bottom:50px; width:60%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h1 class="modal-title" id="myModalLabel">ASISTENCIA MEDICA</h1></center>
      </div>
      <?php
      echo "id del traslado---";
      echo $iddestraslado = $id_traslado;
      echo "<br>";
      ?>
      <div class="modal-body">
        <div class="container-fluid">
          <form action="savepdiunictrs.php?id_traslado=<?php echo $iddestraslado;?>" method="post">
            <div id="contenedor-personas">
              <div class="persona-form">
                <div class="modal-footer">
                  <div class=" well form-horizontal">
                    <div class="row" style="text-align: center;">
                      <div class="col-md-2" style="text-align: center; width: 400px; border: 1px solid #ECECEC;">
                        <label class="col-md-2 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">PDI</label>
                        <!-- <input name="lugarsalida" placeholder="INGRESE LUGAR" class="form-control" type="text" required> -->
                        <select class="form-control" name="namepdi" required>
                          <option value="" disabled selected>SELECCIONE EL PDI</option>
                          <?php
                            $pdistrasaladaron = "SELECT * FROM react_grupo_translados
                            WHERE estatus = 'activo'";
                            $rpdistrasaladaron = $mysqli->query($pdistrasaladaron);
                            while($fpdistrasaladaron = $rpdistrasaladaron->fetch_assoc()){
                              $nombrepdi = $fpdistrasaladaron['nombre'];
                              echo "<option value='$nombrepdi'>$nombrepdi</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div style="text-align: center;">
                <button type="submit" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  GUARDAR</a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
