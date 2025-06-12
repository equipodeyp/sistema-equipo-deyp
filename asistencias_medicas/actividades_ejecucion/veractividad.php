<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:70%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form class="" action="" method="post">
            <div id="boton_print">
            <div class="">
              <img style="float: left;" src="../../image/FGJEM.png" width="50" height="50">
              <img style="float: right;" src="../../image/ESCUDO.png" width="60" height="50">
              <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
            </div>

            <div id="cabecera">
              <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                <h3 style="text-align:center; color: #ddd;">DETALLE DEL REGISTRO DE ACTIVIDADES</h3>
              </div>
            </div>

            <div class="well form-horizontal">
              <?php
              $idactividad = $row['id'];
              // echo $idactividad;
              $traeractividad = "SELECT * FROM react_actividad WHERE id = '$idactividad' AND id_subdireccion = 4";
              $rtraeractividad = $mysqli->query($traeractividad);
              $ftraeractividad = $rtraeractividad->fetch_assoc();
              // variables para traer datos de tablas
              $idsub_em = $ftraeractividad['id_subdireccion'];
              $idactivity = $ftraeractividad['id_actividad'];
              $idsujprot = $ftraeractividad['id_sujeto'];
              $getidunicosuj = "SELECT * FROM datospersonales WHERE id = '$idsujprot'";
              $rgetidunicosuj = $mysqli->query($getidunicosuj);
              $fgetidunicosuj = $rgetidunicosuj ->fetch_assoc();
              $fgetidunicosuj['identificador'];
              $mystring = $fgetidunicosuj['identificador'];
              $findme   = '-';
              $pos = strpos($mystring, $findme);
              if ($pos !== false){
                $identunico = substr($mystring, 0, $pos);
              }
              // traer nombre de la subdireccion
              $subdir = "SELECT * FROM react_subdireccion WHERE id = 4";
              $rsubdir = $mysqli->query($subdir);
              $fsubdir = $rsubdir->fetch_assoc();
              // traer nombre de la actividad
              $acttraer = "SELECT * FROM react_actividad_ejecucion WHERE id = '$idactivity'";
              $racttraer = $mysqli->query($acttraer);
              $facttraer = $racttraer->fetch_assoc();
              // echo $facttraer['nombre'];
              $getimage = "SELECT * FROM react_image_actividad WHERE id_actividad = '$idactividad'";
              $rgetimage = $mysqli->query($getimage);
              $fgetimage = $rgetimage -> fetch_assoc();
              ?>
              <div class="row">
                <!-- SUBDIRECCIÓN -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">SUBDIRECCIÓN:</label>
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <!-- <input style="width: 800px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $fsubdir['subdireccion'];; ?>" readonly> -->
                      <textarea style="width: 800px; height: 28px; resize: none" name="" rows="8" cols="80" disabled><?php echo $fsubdir['subdireccion']; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- FUNCIÓN -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">FUNCIÓN:</label>
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" name="" rows="8" cols="80" disabled><?php echo $ftraeractividad['funcion']; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- nombre de actividad -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">ACTIVIDAD:</label>
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 55px; resize: none" name="" rows="3" cols="80" disabled><?php echo $facttraer['nombre']; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- CLASIFICACIÓN -->
                <?php
                include('getnameclasificacion.php');
                if ($idactivity === '3' || $idactivity === '4' || $idactivity === '5') {
                ?>
                <div class="form-group" id="showclasif">
                  <label for="" class="col-md-4 control-label">CLASIFICACIÓN:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $nombre_clasificacion; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php } ?>
                <!-- UNIDAD DE MEDIDA -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">UNIDAD DE MEDIDA:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['unidad_medida']; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- CANTIDAD -->
                <div class="form-group">
                  <label for=""class="col-md-4 control-label">CANTIDAD:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['cantidad']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                if ($idactivity === '3' || $idactivity === '6') {
                ?>
                <!-- INFORME ANUAL -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">INFORME ANUAL:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['informe_anual']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                }
                if ($idactivity === '6') {
                ?>
                <!-- REPORTE DE METAS -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">REPORTE DE METAS:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['reporte_metas']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                }
                ?>
                <!-- FECHA ACTIVIDAD -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">FECHA ACTIVIDAD:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                    <?php
                      $originalDate = $ftraeractividad['fecha'];
                      $f = date("d/m/Y", strtotime($originalDate));
                    ?>
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $f; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- ENTIDAD/MUNICIPIO -->
                <?php
                if ($idactivity === '6') {
                ?>
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">ENTIDAD/MUNICIPIO:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['entidad_municipio']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                }
                if ($idactivity === '2' || $idactivity === '3') {
                ?>
                <!-- EVIDENCIA INTERNA -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">EVIDENCIA INTERNA:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['evidencia_interna']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                }
                if ($idactivity === '2') {
                ?>
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">MEDIO DE NOTIFICACION:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['id_evidencia']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                }
                if ($idactivity === '4') {
                ?>
                <!-- NUMERO EVIDENCIA -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">NÚMERO DE EVIDENCIA:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['id_evidencia']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                }
                if ($idactivity === '2' || $idactivity === '3' || $idactivity === '5' || $idactivity === '6') {
                ?>
                <!-- FOLIO EXPEDIENTE -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">FOLIO EXPEDIENTE:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['folio_expediente']; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- ID SUJETO -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">ID SUJETO:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $identunico; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                }
                ?>
                <!-- OBSERVACIONES -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">OBSERVACIONES:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['observaciones']; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- image -->
                <?php
                if ($idactivity === '4' || $idactivity === '5' || $idactivity === '6') {
                ?>
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">EVIDENCIA:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <?php
                      if($fgetimage['tipo'] === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'  ||
                          $fgetimage['tipo'] === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                        ?>
                        <div class="mbr-section-btn align-left"><a class="btn btn-md btn-primary display-4" href="<?php echo $fgetimage['ruta'] ?>" download>Descargar</a></div>
                        <?php
                      }elseif ($fgetimage['tipo'] === 'image/png' || $fgetimage['tipo'] === 'image/jpeg' || $fgetimage['tipo'] === 'video/mp4' || $fgetimage['tipo'] === 'application/pdf') {
                        ?>
                        <iframe src="<?php echo $fgetimage['ruta'] ?>" style="width:500px; height:300px;"></iframe>
                        <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
            <div class="modal-footer">
              <center>
                <button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>  CERRAR</button>
                <!-- <form class="" action="generarpdfdetalleactividad.php" method="post">
                  <input type="text" name="" value="<?php echo $row['id']; ?>" style="display:none">
                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>  IMPRIMIR</button> -->
                  <a type="button" class="btn btn-primary" href="generarpdfdetalleactividad.php?idactividad=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-print"></span>  IMPRIMIR</a>
                <!-- </form> -->
              </center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script language="Javascript">
function imprimirSeleccion(nombre) {
var ficha = document.getElementById(nombre);
var ventimp = window.open(' ', 'popimpr');
ventimp.document.write( ficha.innerHTML );
ventimp.document.close();
ventimp.print( );
ventimp.close();
}
</script>
