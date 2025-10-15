<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $id_traslado; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:90%;  margin-top: 50px; margin-bottom:50px; width:65%">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

                <?php
                $idtrasladover = $id_traslado;
                // traer datos del traslado
                $trasunico = "SELECT * FROM react_traslados WHERE id = '$idtrasladover'";
                $rtrasunico = $mysqli->query($trasunico);
                $ftrasunico = $rtrasunico->fetch_assoc();
                // traer observaciones del traslado
                $obstras = "SELECT * FROM react_observaciones_traslado WHERE id_traslado = '$idtrasladover'";
                $robstras = $mysqli->query($obstras);
                $fobstras = $robstras->fetch_assoc();
                ?>
            </div>

              <div class="modal-body">
                <div class="container">
                  <div class="well form-horizontal">
                    <div class="">
                      <img style="float: left;" src="../../image/FGJEM.png" width="50" height="50">
                      <img style="float: right;" src="../../image/ESCUDO.png" width="60" height="50">
                      <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
                    </div>
                    <div class="row">
                      <div id="cabecera">
                        <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                          <h3 style="text-align:center; color: #ddd;">TRASLADO: <?php echo $ftrasunico['idtrasladounico']; ?></h3>
                        </div>
                      </div>
                      <!-- <br> -->
                      <!-- <div id="cabecera">
                        <h2 style="text-align:center">TRASLADO: <?php echo $ftrasunico['idtrasladounico']; ?></h2>
                      </div> -->
                      <!--  -->
                      <div class="form-group">
                        <label class="col-md-3 control-label">FECHA TRASLADO</label>
                        <div class="col-md-7 inputGroupContainer">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
                            <input name="fechatraslado" class="form-control" type="text" value="<?php echo $ftrasunico['fecha']; ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- lugar_salida -->
                      <div class="form-group">
                        <label class="col-md-3 control-label">LUGAR DE SALIDA</label>
                        <div class="col-md-7 inputGroupContainer">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
                            <input name="fechatraslado" class="form-control" type="text" value="<?php echo $ftrasunico['lugar_salida']; ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- domiciliosalida -->
                      <div class="form-group">
                        <label class="col-md-3 control-label">DOMICILIO DE SALIDA</label>
                        <div class="col-md-7 inputGroupContainer">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
                            <input name="fechatraslado" class="form-control" type="text" value="<?php echo $ftrasunico['domicilio_salida']; ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- municipiosalida -->
                      <div class="form-group">
                        <label class="col-md-3 control-label">MUNICIPIO DE SALIDA</label>
                        <div class="col-md-7 inputGroupContainer">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
                            <input name="fechatraslado" class="form-control" type="text" value="<?php echo $ftrasunico['municipio_salida']; ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- horasalida -->
                      <div class="form-group">
                        <label class="col-md-3 control-label">INICIO DEL TRASLADO</label>
                        <div class="col-md-7 inputGroupContainer">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
                            <input name="fechatraslado" class="form-control" type="text" value="<?php echo $ftrasunico['hora_salida']; ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- horallegada -->
                      <div class="form-group">
                        <label class="col-md-3 control-label">FIN DEL TRASLADO</label>
                        <div class="col-md-7 inputGroupContainer">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
                            <input name="fechatraslado" class="form-control" type="text" value="<?php echo $ftrasunico['hora_llegada']; ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- kilometrosrecorridos -->
                      <div class="form-group">
                        <label class="col-md-3 control-label">KILOMETROS RECORRIDOS</label>
                        <div class="col-md-7 inputGroupContainer">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
                            <input name="fechatraslado" class="form-control" type="text" value="<?php echo $ftrasunico['kilometros']; ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!-- observaciones -->
                      <div class="form-group">
                        <label class="col-md-3 control-label">OBSERVACIONES</label>
                        <div class="col-md-7 inputGroupContainer">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
                            <input name="fechatraslado" class="form-control" type="text" value="<?php echo $fobstras['observacion']; ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <!--  -->
                      <div id="cabecera">
                        <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                          <h3 style="text-align:center; color: #ddd;">DESTINOS</h3>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <h3 style="text-align:center">NO.</h3>
                      </div>
                      <div class="col-md-2">
                        <h3 style="text-align:center">LUGAR</h3>
                      </div>
                      <div class="col-md-3">
                        <h3 style="text-align:center">DOMICILIO</h3>
                      </div>
                      <div class="col-md-3">
                        <h3 style="text-align:center">MUNICIPIO</h3>
                      </div>
                      <div class="col-md-3">
                        <h3 style="text-align:center">MOTIVO</h3>
                      </div>
                      <?php
                      // for ($auxdest1=0; $auxdest1 < $totaldest; $auxdest1++) {
                        $contardes = 0;
                        $datlugar = "SELECT * FROM react_destinos_traslados WHERE id_traslado ='$idtrasladover'";
                        $rdatlugar = $mysqli->query($datlugar);
                        while ($fdatlugar = $rdatlugar->fetch_assoc()) {
                          $contardes = $contardes + 1;
                      ?>
                      <span>_____________________________________________________________________________________________________________________________</span>
                      <div class="col-md-1">
                        <h4 style="text-align:center"><?php echo $contardes; ?></h4>
                        <!-- <input type="text" class="form-control" id="inputPassword4" value="<?php echo $fdatlugar['lugar']; ?>" readonly> -->
                      </div>
                      <div class="col-md-2">
                        <h4 style="text-align:center"><?php echo $fdatlugar['lugar']; ?></h4>
                        <!-- <input type="text" class="form-control" id="inputPassword4" value="<?php echo $fdatlugar['lugar']; ?>" readonly> -->
                      </div>
                      <div class="col-md-3">
                        <h4 style="text-align:center"><?php echo $fdatlugar['domicilio']; ?></h4>
                        <!-- <input type="text" class="form-control" id="inputPassword4" value="<?php echo $fdatlugar['domicilio']; ?>" readonly> -->
                      </div>
                      <div class="col-md-3">
                        <h4 style="text-align:center"><?php echo $fdatlugar['municipio']; ?></h4>
                        <!-- <input type="text" class="form-control" id="inputPassword4" value="<?php echo $fdatlugar['municipio']; ?>" readonly> -->
                      </div>
                      <div class="col-md-3">
                        <h4 style="text-align:center"><?php echo $fdatlugar['motivo']; ?></h4>
                        <!-- <input type="text" class="form-control" id="inputPassword4" value="<?php echo $fdatlugar['motivo']; ?>" readonly> -->
                      </div>
                      <?php
                        // }
                      }
                      ?>
                      <br><br><br><br>
                      <div id="cabecera">
                        <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                          <h3 style="text-align:center; color: #ddd;">SUJETOS TRASLADADOS</h3>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <h3 style="text-align:center">NO.</h3>
                      </div>
                      <div class="col-md-3">
                        <h3 style="text-align:center">EXPEDIENTE</h3>
                      </div>
                      <div class="col-md-2">
                        <h3 style="text-align:center">ID DE LA PP O SP</h3>
                      </div>
                      <div class="col-md-2">
                        <h3 style="text-align:center">EN RESGUARDO</h3>
                      </div>
                      <div class="col-md-2">
                        <h3 style="text-align:center">DESTINOS</h3>
                      </div>
                      <div class="col-md-2">
                        <h3 style="text-align:center">ASISTENCIA MÉDICA</h3>
                      </div>
                      <?php
                        $contarpers = 0;
                        $auxcontarsuj2 = 0;
                        $datpers = "SELECT DISTINCT id, id_sujeto, folio_expediente, id_sujeto, resguardado, id_destino, id_asistenciamedica FROM react_sujetos_traslado WHERE id_traslado = '$idtrasladover'";
                        $rdatpers = $mysqli->query($datpers);
                        while ($fdatpers = $rdatpers->fetch_assoc()) {
                          $contarpers = $contarpers + 1;
                          $idunicdestino = $fdatpers['id_destino'];;
                          $idsujetouni = $fdatpers['id_sujeto'];
                          $idasismedica = $fdatpers['id_asistenciamedica'];
                          // traer el identificador del sujeto
                          $identificador = "SELECT * FROM datospersonales WHERE id = '$idsujetouni'";
                          $ridentificador = $mysqli ->query($identificador);
                          $fidentificador = $ridentificador ->fetch_assoc();
                          // get info destino
                          $fetinfodestino = "SELECT * FROM react_destinos_traslados WHERE id = '$idunicdestino'";
                          $rfetinfodestino = $mysqli->query($fetinfodestino);
                          $ffetinfodestino = $rfetinfodestino ->fetch_assoc();
                          // get info asistencia medica
                          $getinfasimed = "SELECT * FROM solicitud_asistencia WHERE id_asistencia = '$idasismedica'";
                          $rgetinfasimed = $mysqli->query($getinfasimed);
                          $fgetinfasimed = $rgetinfasimed ->fetch_assoc();
                      ?>
                      <span>_____________________________________________________________________________________________________________________________</span>
                      <div class="col-md-1">
                        <h4 style="text-align:center"><?php echo $contarpers; ?></h4>
                      </div>
                      <div class="col-md-3">
                        <h4 style="text-align:center"><?php echo $fdatpers['folio_expediente']; ?></h4>
                      </div>
                      <div class="col-md-2">
                        <h4 style="text-align:center"><?php echo $fidentificador['identificador']; ?></h4>
                      </div>
                      <div class="col-md-2">
                        <h4 style="text-align:center"><?php echo $fdatpers['resguardado']; ?></h4>
                      </div>
                      <div class="col-md-2">
                        <h4 style="text-align:center"><?php echo $ffetinfodestino['municipio']; ?></h4>
                      </div>
                      <div class="col-md-2">
                        <h4 style="text-align:center"><?php
                        if ($fdatpers['id_asistenciamedica'] == '' || $fdatpers['id_asistenciamedica'] == '0') {
                          echo "N/A";
                        }else {
                          echo $fdatpers['id_asistenciamedica'].'/<br>'.$fgetinfasimed['servicio_medico'];;
                        }
                        ?></h4>
                      </div>
                      <?php
                      }
                      ?>
                      <br><br><br><br>
                      <div id="cabecera">
                        <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                          <h3 style="text-align:center; color: #ddd;">PDIS</h3>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <h3 style="text-align:center">NO.</h3>
                      </div>
                      <div class="col-md-11">
                        <h3 style="text-align:center">PDI</h3>
                      </div>

                      <?php
                        $contarpdis = 0;
                        $datpdi = "SELECT * FROM react_pdi_traslado WHERE id_traslado ='$idtrasladover'";
                        $rdatpdi = $mysqli->query($datpdi);
                        while ($fdatpdi = $rdatpdi->fetch_assoc()) {
                          $contarpdis = $contarpdis + 1;
                      ?>
                      <span>_____________________________________________________________________________________________________________________________</span>
                      <div class="col-md-1">
                        <h4 style="text-align:center"><?php echo $contarpdis; ?></h4>
                      </div>
                      <div class="col-md-11">
                        <h4 style=""><?php echo $fdatpdi['nombrepdi']; ?></h4>
                      </div>
                      <?php
                      }
                      ?>
                      <br><br>

                    </div>
                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <center>
                <!-- <button type="submit" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  GUARDAR</a> -->
                <?php
                // echo "<a onclick="location.href='./add_traslado.php'"' data-toggle='modal' class='float-right'><button style='' type='button' id='AGREGAR_CONVENIO' class='btn btn-success text-right'>CONCLUIR TRASLADO</button></a>";
                ?>
                <button onclick="location.href='./add_traslado.php'" class="btn btn-success " data-dismiss="modal"><span class="fa-solid fa-file-lines"></span> CONCLUIR TRASLADO</button>
                </center>
              </div>
        </div>
    </div>
</div>
