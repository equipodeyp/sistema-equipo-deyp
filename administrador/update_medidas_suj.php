<?php
// get info medidas
$getinfomedida = "SELECT * FROM medidas WHERE id = '$id_medida'";
$rgetinfomedida = $mysqli->query($getinfomedida);
$fgetinfomedida = $rgetinfomedida->fetch_assoc();
$idpersona = $fgetinfomedida['id_persona'];
// get info sujeto con idpersona
$getdatospersona = "SELECT * FROM datospersonales WHERE id = '$idpersona'";
$rgetdatospersona = $mysqli ->query($getdatospersona);
$fgetdatospersona = $rgetdatospersona -> fetch_assoc();
// get datos de validacion de medida
$fol=" SELECT * FROM validar_medida WHERE id_medida='$id_medida'";
$resultfol = $mysqli->query($fol);
$rowfol1=$resultfol->fetch_assoc();
$name_folio=$rowfol1['folioexpediente'];
$validacion = $rowfol1['validar_datos'];
?>
<div class="modal fade" id="update_medida_<?php echo $id_medida;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h2 style="display: block; margin: 0 auto;" class="modal-title" id="miModalLabel">DETALLES ESPECIFICOS DE LA MEDIDA OTORGADA</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="mi-formulario" action="./controllers/update_medidadef.php?idmedida=<?php echo $id_medida; ?>" method="post">
          <div style="padding:0px; border:solid 4px;">
            <section class="container well form-horizontal secciones"><br>
              <?php
                if ($validacion == 'true') {
                  echo "<div class='columns download' style='text-align:center;'>
                          <p>
                          <img src='../image/true4.jpg' width='50' height='50' class='center'>
                          <h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>MEDIDA VALIDADA</FONT></h3>
                          </p>
                  </div>";
                }elseif ($validacion == 'false') {
                  echo "<div class='columns download'>
                          <p>
                          <h3 style='text-align:center'><FONT COLOR='red' size=6 align='center'>PENDIENTE POR VALIDAR</FONT></h3>
                          </p>
                  </div>";
                }
                ?>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">MEDIDA OTORGADA</strong>
              </div>
              <div class="row contenedor-principal">
                <div class="col-md-6 mb-3 validar">
                  <label for="categoriamedsujprov">CATEGORÍA DE LA MEDIDA<span class="required"></span></label>
                  <select class="form-select" id="categoriamedsujprov" name="CATEAGORIA_MEDIDA" disabled>
                    <option disabled selected><?php echo $fgetinfomedida['categoria']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="upt_tipo">TIPO DE MEDIDA<span class="required"></span></label>
                  <select class="form-select select-controldate" id="upt_tipo" data-target-modal="update_medida_<?php echo $id_medida;?>" name="act_tipo">
                    <option disabled selected><?php echo $fgetinfomedida['tipo']; ?></option>
                    <option value="PROVISIONAL">PROVISIONAL</option>
                    <option value="DEFINITIVA">DEFINITIVA</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="upt_clasificacion">CLASIFICACIÓN DE LA MEDIDA</label>
                  <select class="form-select select-control slt-clasificacion" id="upt_clasificacion" disabled>
                    <option value="<?php echo $fgetinfomedida['clasificacion']; ?>" selected><?php echo $fgetinfomedida['clasificacion']; ?></option>
                  </select>
                </div>
                <?php
                $varclasifmedasis =$fgetinfomedida['clasificacion'];
                $valasis = $fgetinfomedida['medida'];
                if ($varclasifmedasis == 'ASISTENCIA') {
                  $getsltnameasis = "SELECT * FROM medidaasistencia WHERE nombre = '$valasis'";
                  $rgetsltnameasis = $mysqli ->query($getsltnameasis);
                  $fgetsltnameasis = $rgetsltnameasis ->fetch_assoc();
                }else {
                  $fgetsltnameresg = '';
                }
                if ($varclasifmedasis == 'RESGUARDO') {
                  $getsltnameresg = "SELECT * FROM medidaresguardo WHERE nombre = '$valasis'";
                  $rgetsltnameresg = $mysqli ->query($getsltnameresg);
                  $fgetsltnameresg = $rgetsltnameresg ->fetch_assoc();
                }
                ?>
                <div class="col-md-6 mb-3 div-clasificacionupt clasificacion-ASISTENCIA" style="display:none;">
                  <label for="upt_medinciso_asistencia">INCISO DE LA MEDIDA DE ASISTENCIA</label>
                  <select class="form-select select-control slt-asistencia" id="upt_medinciso_asistencia" disabled>
                    <option value="<?php echo $fgetsltnameasis['idsltname']; ?>" selected><?php echo $fgetsltnameasis['nombre']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 div-asistenciaupt asistencia-OTRAS" style="display:none;">
                  <label for="upt_otherasistencia">OTRA MEDIDA DE ASISTENCIA</label>
                  <input class="form-control" type="text" name="" value="<?php echo $fgetinfomedida['descripcion']; ?>" id="upt_otherasistencia" disabled>
                </div>
                <div class="col-md-6 mb-3 div-clasificacionupt clasificacion-RESGUARDO" style="display:none;">
                  <label for="upt_medinciso_resguardo">INCISO DE LA MEDIDA DE RESGUARDO</label>
                  <select class="form-select select-control slt-resguardo" id="upt_medinciso_resguardo" disabled>
                    <option value="<?php echo $fgetsltnameresg['idsltname']; ?>" selected><?php echo $fgetsltnameresg['nombre']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 div-resguardoupt resguardo-PROCESALES" style="display:none;">
                  <label for="upt_ximedresguardo">EJECUCIÓN DE LA MEDIDA PROCESAL</label>
                  <select class="form-select" name="" id="upt_ximedresguardo" disabled>
                    <option disabled selected><?php echo $fgetinfomedida['descripcion']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 div-resguardoupt resguardo-RECLUIDOS" style="display:none;">
                  <label for="upt_xiimedresguardo">MEDIDA OTORGADA A SUJETOS RECLUIDOS</label>
                  <select class="form-select" name="" id="upt_xiimedresguardo" disabled>
                    <option disabled selected><?php echo $fgetinfomedida['descripcion']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 div-resguardoupt resguardo-OTRASR" style="display:none;">
                  <label for="upt_otherresguardo">OTRA MEDIDA DE RESGUARDO</label>
                  <input class="form-control" type="text" name="" value="<?php echo $fgetinfomedida['descripcion']; ?>" id="upt_otherresguardo" disabled>
                </div>
                <div class="col-md-6 mb-3 div-datedefinitiva PROVISIONAL" style="display:none;">
                  <label for="upt_dateprovisional">FECHA DE INICIO DE LA MEDIDA PROVISIONAL</label>
                  <input class="form-control" type="date" name="" value="<?php if ($fgetinfomedida['date_provisional'] != '0000-00-00') {
                    echo $fgetinfomedida['date_provisional'];
                  }  ?>" id="upt_dateprovisional" disabled>
                </div>
                <div class="col-md-6 mb-3 div-datedefinitiva DEFINITIVA" style="display:none;">
                  <label for="upt_datedefinitiva">FECHA DE INICIO DE LA MEDIDA DEFINITIVA</label>
                  <input id="upt_datedefinitiva" class="form-control input-controlado ipt-datedefinitiva input-fechamediact" type="date" name="act_datedefinitiva" value="<?php if ($fgetinfomedida['date_definitva'] != '0000-00-00') {
                    echo $fgetinfomedida['date_definitva'];
                  }  ?>" id="upt_datedefinitiva">
                </div>
              </div>
              <div class="col-md-12 mb-3 div-resguardoupt resguardo-ALOJAMIENTO" style="display:none;">
                <div class="row">
                  <!-- <div class="col-md-6 mb-3">
                    <center>
                      <label for="">MEDIDA RELACIONADA</label><br>
                      <input type="checkbox" class="checkbox" name="statusprogrampersonarelacional" id="switch" value="1">
                      <label for="switch" class="toggle">
                        <p>&nbspSI &nbsp&nbsp&nbsp&nbsp NO</p>
                      </label>
                    </center>
                  </div>
                  <div class="col-md-6 mb-3">
                    <center>
                      <label for="">ACTIVO</label><br>
                      <input type="checkbox" class="checkbox2" name="statusprogrampersona" id="switch2" value="1">
                      <label for="switch2" class="toggle2">
                        <p>&nbspSI &nbsp&nbsp&nbsp&nbsp NO</p>
                      </label>
                    </center>
                  </div> -->
                </div>
                <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                  <strong style="color: #f8fdfc;">AMPLIACIÓN DE LA MEDIDA</strong>
                </div>

                <div class="col-md-12 mb-3">
                  <table class="table table-hover table-striped table-bordered">
                    <thead class="thead-light">
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">No.</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">ID CONVENIO ADHESIÓN</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA INICIO AMPLIACIÓN</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">DÍAS DE VIGENCIA</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA DE TÉRMINO DE AMPLIACIÓN</th>
                    </thead>
                    <?php
                    // echo $id_medida;
                    $contarampliacion = 0;
                    $getampliaciones = "SELECT * FROM ampliacion_alojamiento_temporal WHERE id_medida_alojamiento = '$id_medida'";
                    $rgetampliaciones = $mysqli ->query($getampliaciones);
                    if ($rgetampliaciones) {
                      if ($rgetampliaciones->num_rows > 0) {
                        while ($fgetampliaciones = $rgetampliaciones ->fetch_assoc()) {
                          $contarampliacion = $contarampliacion +1;
                          ?>
                          <tr>
                            <td><?php echo $contarampliacion; ?></td>
                            <td><?php echo $fgetampliaciones['id_convenio']; ?></td>
                            <td><?php echo date("d/m/Y", strtotime($fgetampliaciones['fecha_inicio'])); ?></td>
                            <td><?php echo $fgetampliaciones['dias_vigencia']; ?></td>
                            <td><?php echo date("d/m/Y", strtotime($fgetampliaciones['fecha_termino_ampliacion'])); ?></td>
                          </tr>
                          <?php
                        }
                      }
                    }
                    ?>
                  </table>
                </div>
              </div>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">ESTATUS DE LA MEDIDA</strong>
              </div>
              <div class="contenedor-principal">
                <div class="row">
                  <div class="col-md-6 mb-3 validar">
                    <label for="upt_estatus">ESTATUS DE LA MEDIDA</label>
                    <select class="form-select select-controlestatus" id="upt_estatus" name="act_estatus" data-target-modal="update_medida_<?php echo $id_medida;?>">
                      <option disabled selected><?php echo $fgetinfomedida['estatus']; ?></option>
                      <option value="EJECUTADA">EJECUTADA</option>
                      <option value="CANCELADA">CANCELADA</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3 div-controlado EJECUTADA" style="display:none;">
                    <label for="upt_municipioejecucion">MUNICIPIO DE EJECUCIÓN DE LA MEDIDA</label>
                    <select class="form-select slt-municipio" name="act_municipio" id="upt_municipioejecucion">
                      <option disabled selected value>SELECCIONA UNA OPCIÓN</option>
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
                  <div class="col-md-6 mb-3 validar">
                    <label for="upt_dateiniciomed">FECHA DE INICIO DE LA MEDIDA</label>
                    <input class="form-control" type="date" name="" value="<?php if ($fgetinfomedida['date_provisional'] == '0000-00-00') {
                      echo $fgetinfomedida['date_definitva'];
                    }else {
                      echo $fgetinfomedida['date_provisional'];
                    } ?>" id="upt_dateiniciomed" disabled>
                  </div>
                  <div class="col-md-6 mb-3 div-controlado EJECUTADA" style="display:none;">
                    <label for="upt_datetermino">FECHA DE EJECUCIÓN</label>
                    <input class="form-control ipt-dateejecutada input-fechamediact" type="date" name="act_datetermino" id="upt_datetermino">
                  </div>
                  <div class="col-md-6 mb-3 div-controlado CANCELADA" style="display:none;">
                    <label for="upt_datecancelacion">FECHA DE CANCELACIÓN</label>
                    <input class="form-control ipt-datecancelada input-fechamediact" type="date" name="act_datecancelacion" id="upt_datecancelacion">
                  </div>
                  <div class="col-md-6 mb-3 div-controlado CANCELADA" style="display:none;">
                    <label for="upt_motivocancel">MOTIVO DE CANCELACIÓN</label>
                    <input class="form-control ipt-motivocancelacion" type="text" name="act_motivocancel" id="upt_motivocancel">
                  </div>
                </div>
                <div class="div-controlado EJECUTADA" style="display:none;">
                  <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                    <strong style="color: #f8fdfc;">MOTIVO DE CONCLUSIÓN DE LA MEDIDA</strong>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3 validar">
                      <label for="upt_conart35">CONCLUSIÓN DEL ARTICULO NO. 35</label>
                      <select class="form-select select-conclusion" id="upt_conart35" name="act_conart35" data-target-modal="update_medida_<?php echo $id_medida;?>">
                        <option disabled selected value="">SELECCIONE UNA OPCIÓN</option>
                        <?php
                        $art35 = "SELECT * FROM conclusionart35";
                        $answerart35 = $mysqli->query($art35);
                        while($art35s = $answerart35->fetch_assoc()){
                          echo "<option value='".$art35s['idsltname']."'>".$art35s['nombre']."</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-6 mb-3 div-conclusion CONVENIO" style="display:none;">
                      <label for="upt_otherart35">ESPECIFIQUE</label>
                      <input class="form-control ipt-otherart35" type="text" name="act_otherart35" id="upt_otherart35">
                    </div>
                    <div class="col-md-6 mb-3 div-conclusion OTRO" style="display:none;">
                      <label for="upt_otherconclusion">ESPECIFIQUE OTRO</label>
                      <input class="form-control ipt-otherconclusion" type="text" name="act_otherconclusion" id="upt_otherconclusion">
                    </div>
                  </div>
                </div>
              </div>

              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">COMENTARIOS</strong>
              </div>
              <div class="">
                <table class="">
                  <?php
                  $tabla_medidacomennt="SELECT * FROM comentario WHERE id_persona = '$id_person'
                                                                       AND comentario_mascara = '2' AND id_medida = '$id_medida'";
                  $rtabla_medidacomennt = $mysqli->query($tabla_medidacomennt);
                  while ($ftabla_medidacomennt = $rtabla_medidacomennt->fetch_array()) {
                  echo "<tr>";
                  echo "<td>";
                  echo "<ul>
                        <li>
                        <div>
                        <span>
                        usuario:".$ftabla_medidacomennt['usuario']."
                        </span>
                        </div>
                        <div>
                        <span>
                          ".$ftabla_medidacomennt['comentario']."
                        </span>
                        </div>
                        <div>
                        <span>
                        ".date("d/m/Y h:i A", strtotime($ftabla_medidacomennt['fecha']))."
                        </span>
                        </div>
                        </li>
                  </ul>";echo "</td>";
                  echo "</tr>";
                  }

                ?>
                </table>
              </div>
              <textarea name="commentmediprovsuj" id="texarearesize" placeholder="Escribe tus comentarios prueba resize" maxlength="2000" style="resize: none;"></textarea>
              <br><br>
            </section>
            <div class="modal-footer d-flex justify-content-center">
              <div class="row">
                <div>
                  <button style="display: block; margin: 0 auto;" class="btn color-btn-success btn-sm" id="btnGuardar" type="submit">ACTUALIZAR</button>
                </div>
              </div>
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CANCELAR</button>
            </div>
            <br>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
