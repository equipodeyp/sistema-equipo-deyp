<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="add_sujetotraslado<?php echo $id_traslado; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">SUJETO DEL TRASLADO</h4></center>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <form method="POST" action="guardarsujetocondestino.php?id_traslado=<?php echo $id_traslado; ?>" enctype= "multipart/form-data">
                  <div id="contenedor-personas">
                    <div class="persona-form">
                      <div class="row">
                      <span>______________________________________________________________________________________________</span>
                        <div class="col-md-4">
                          <label>EXPEDIENTE</label>
                          <?php echo numvecesbr($count); ?>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-folder"></i></span>
                            <select class="form-control expediente" name="nombre" required>
                              <option disabled selected value="">SELECCIONE EL EXPEDIENTE</option>
                              <?php
                                $select1 = "SELECT DISTINCT datospersonales.folioexpediente
                                FROM datospersonales
                                WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' OR datospersonales.estatus = 'PERSONA PROPUESTA'
                                ORDER BY datospersonales.id ASC";
                                $answer1 = $mysqli->query($select1);
                                while($valores1 = $answer1->fetch_assoc()){
                                  $result_folio = $valores1['folioexpediente'];
                                  echo "<option value='$result_folio'>$result_folio</option>";
                                }
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label>ID DE LA PP O SP</label>
                          <?php echo numvecesbr($count); ?>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                            <select class="form-control id-sujeto" name="id_sujeto" required>
                              <option disabled selected value="">SELECCIONE EL ID DEL SUJETO</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2">
                          <label>RESGUARDADO</label>
                          <?php echo numvecesbr($count); ?>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                            <select class="form-control en-resguardo" name="resguardo">
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <!-- <br> -->
                          <label>DESTINO(S)</label>
                          <div class="input-group">
                            <div class="form-check">
                            <?php
                            $auxcheckdest = 0;
                            $traerdestinos2 = "SELECT * FROM react_destinos_traslados WHERE id_traslado = '$id_traslado'";
                            $rtraerdestinos2 = $mysqli->query($traerdestinos2);
                            while ($ftraerdestinos2 = $rtraerdestinos2->fetch_assoc()) {
                              $auxcheckdest = $auxcheckdest + 1;
                              $iddestinocheck = $ftraerdestinos2['id']
                              ?>
                              <div>
                                <input type="checkbox" id="coding" name="checkdestino[]" value="<?php echo $iddestinocheck; ?>" style="height: 25px; width: 25px;">
                                <label for="coding">DESTINO <?php echo $auxcheckdest; ?></label>
                              </div>
                              <?php
                            }
                            ?>
                          </div>


                          </div>
                        </div>
                        <div class="row col-md-12" style="display: flex; justify-content: center;">
                          <button type="submit" class="btn btn-success">GUARDAR SUJETO <span class="glyphicon glyphicon-ok"></span></button>
                        </div>
                        <div class="form-group">
                          <label class="col-md-7 control-label"></label>
                          <div class="col-md-12">
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
			       </div>
            <div class="modal-footer">
                <!-- <button type="submit" name="editar" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  </a> -->
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CERRAR</button>
            </div>
        </div>
    </div>
</div>
