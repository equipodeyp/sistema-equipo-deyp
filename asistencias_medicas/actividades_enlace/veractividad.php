<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:60%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 class="modal-title" id="myModalLabel">DETALLES DE LA ACTIVIDAD</h4></center>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form class="" action="" method="post">
            <div class="row">
              <div class="alert div-title">
                <h3 style="text-align:center">ACTIVIDAD</h3>
              </div>
            </div>
            <div class="well form-horizontal">
              <?php
              $idactividad = $row['id'];
              $traeractividad = "SELECT * FROM react_actividad WHERE id = '$idactividad' AND id_subdireccion = 3";
              $rtraeractividad = $mysqli->query($traeractividad);
              $ftraeractividad = $rtraeractividad->fetch_assoc();
              // variables para traer datos de tablas
              // echo "<br>";
              $idsub_em = $ftraeractividad['id_subdireccion'];
              // echo "<br>";
              $idactivity = $ftraeractividad['id_actividad'];
              // echo "<br>";
              // traer nombre de la subdireccion
              $subdir = "SELECT * FROM react_subdireccion WHERE id = 3";
              $rsubdir = $mysqli->query($subdir);
              $fsubdir = $rsubdir->fetch_assoc();
              // traer nombre de la actividad
              $acttraer = "SELECT * FROM react_actividad_enlace WHERE id = '$idactivity'";
              $racttraer = $mysqli->query($acttraer);
              $facttraer = $racttraer->fetch_assoc();
              // echo $facttraer['nombre'];

              ?>
              <div class="row">
                <!-- SUBDIRECCIÓN -->
                <div class="form-group">
                  <label for="subdireccion_em" class="col-md-4 control-label">SUBDIRECCIÓN</label>
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $fsubdir['subdireccion'];; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- FUNCIÓN -->
                <div class="form-group">
                  <label for="funcion_em" class="col-md-4 control-label">FUNCIÓN</label>
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['funcion']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- ACTIVIDAD -->
                <div class="form-group">
                  <label for="actividad_em" class="col-md-4 control-label">ACTIVIDAD</label>
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input type="text" class="form-control"  id="idactividad_em" name="actividad" placeholder="" value="<?php echo $facttraer['nombre']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- UNIDAD DE MEDIDA -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">UNIDAD DE MEDIDA</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['unidad_medida']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- REPORTE DE METAS -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">REPORTE DE METAS</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['reporte_metas']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <br><br>
                <!-- CLASIFICACIÓN -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">CLASIFICACIÓN</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['clasificacion']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- FECHA -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">FECHA</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['fecha']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- CANTIDAD -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">CANTIDAD</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['cantidad']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- ENTIDAD/MUNICIPIO -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">ENTIDAD/MUNICIPIO</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['entidad_municipio']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- ID DEL EXPEDIENTE DE PROTECCIÓN -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">ID DEL EXPEDIENTE DE PROTECCIÓN</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['folio_expediente']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- ID DE PP O SP -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">ID DE PP O SP</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['id_sujeto']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- EVIDENCIA -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">EVIDENCIA</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['evidencia_interna']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- ID EVIDENCIA -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">ID EVIDENCIA</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['id_evidencia']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- KILOMETROS -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">KILOMETROS</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['kilometraje']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- OBSERVACIONES -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">OBSERVACIONES</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                      <input name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['observaciones']; ?>" readonly>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <center>
                <button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CERRAR</button>
              </center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
