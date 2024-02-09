<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="add_ampliacion_medida_<?php echo $rowmedida['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">AMPLIAR MEDIDA</h4></center>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
            </div>
            <div class="modal-body">
            <?php
            $fol_exp = $rowmedida['folioexpediente'];
            // $id_medida = $rowmedida['id_medida'];
            $id_p = $rowmedida['id_persona'];
            ?>
			<div class="container-fluid">
			<form method="POST" action="ampliar_alojamiento.php?folio=<?php echo $rowmedida['id']; ?>">
        <?php
        $fol=" SELECT * FROM datospersonales WHERE id='$id_p'";
        $resultfol = $mysqli->query($fol);
        $rowfol=$resultfol->fetch_assoc();
        $name_folio=$rowfol['folioexpediente'];
        $id_person=$rowfol['id'];
        $idunico= $rowfol['identificador'];
        $valid = "SELECT * FROM validar_persona WHERE id_persona = '$id_person'";
        $res_val=$mysqli->query($valid);
        $fil_val = $res_val->fetch_assoc();
        $validacion = $fil_val['validacion'];
        ?>
        <div class="row">
          <div class="alert div-title">
            <h3 style="text-align:center">FOLIO DEL EXPEDIENTE</h3>
          </div>
          <?php
          $fol=" SELECT * FROM validar_medida WHERE id_medida='$id_medida'";
          $resultfol = $mysqli->query($fol);
          $rowfol1=$resultfol->fetch_assoc();
          $name_folio=$rowfol1['folioexpediente'];
          // $id_person=$rowfol['id'];
          // $idunico= $rowfol['identificador'];
          // $valid = "SELECT * FROM validar_persona WHERE id_persona = '$id_person'";
          // $res_val=$mysqli->query($valid);
          // $fil_val = $res_val->fetch_assoc();
          $validacion = $rowfol1['validar_datos'];
          ?>
          <div class="col-md-6 mb-3 validar">
            <label for="SIGLAS DE LA UNIDAD">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
            <input class="form-control" id="NUM_EXPEDIENTE" name="NUM_EXPEDIENTE" placeholder="" type="text" readonly value="<?php echo $rowfol['folioexpediente'];?>" maxlength="50">
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="SIGLAS DE LA UNIDAD">ID PERSONA<span ></span></label>
            <input class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" readonly value="<?php echo $rowfol['identificador']; ?>" maxlength="50">
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_CAPTURA">FECHA DE CAPTURA DE LA MEDIDA<span class="required"></span></label>
            <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" readonly value="<?php echo date("d/m/Y h:i:sa", strtotime($rowmedida['fecha_captura'])); ?>" type="text">
            </select>
          </div>

        </div>
        <br>
        <div class="row">
          <div class="alert div-title">
            <h3 style="text-align:center">MEDIDA OTORGADA</h3>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="CATEAGORIA_MEDIDA">CATEGORÍA DE LA MEDIDA<span class="required"></span></label>
            <br>
            <select class="form-control" id="CATEAGORIA_MEDIDA" name="CATEAGORIA_MEDIDA" disabled>
              <option value="AMPLIACION">AMPLIACIÓN</option>
            </select>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="TIPO_MEDIDA">TIPO DE MEDIDA<span class="required"></span></label>
            <br>
            <select class="form-control" id="TIPO_MEDIDA" name="TIPO_MEDIDA" disabled>
              <option value="DEFINITIVA">DEFINITIVA</option>
            </select>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="CLASIFICACION_MEDIDA">CLASIFICACIÓN DE LA MEDIDA<span class="required"></span></label>
            <br>
            <select class="form-control" id="CLASIFICACION_MEDIDA" name="CLASIFICACION_MEDIDA" disabled>
              <option style="visibility: hidden" value="<?php echo $rowmedida['clasificacion']; ?>"><?php echo $rowmedida['clasificacion']; ?></option>
              <option value="ASISTENCIA">ASISTENCIA</option>
              <option value="RESGUARDO">RESGUARDO</option>
            </select>
          </div>
          <?php
          $clas = $rowmedida['clasificacion'];
          if ($clas === 'ASISTENCIA') {
            echo '<div class="col-md-6 mb-3 validar" id="asistencia">
              <label for="MEDIDAS_ASISTENCIA">INCISO DE LA MEDIDA DE ASISTENCIA<span class="required"></span></label>
              <select class="form-control" id="MEDIDAS_ASISTENCIA" name="MEDIDAS_ASISTENCIA" onChange="selectother(this)" disabled>
                <option style="visibility: hidden" value="'.$rowmedida['medida'].'">'.$rowmedida['medida'].'</option>';
                $asistencia = "SELECT * FROM medidaasistencia";
                $answerasis = $mysqli->query($asistencia);
                while($asistencias = $answerasis->fetch_assoc()){
                 echo "<option value='".$asistencias['nombre']."'>".$asistencias['nombre']."</option>";
                }
              echo '</select>
            </div>';
            if ($rowmedida['medida'] === 'VI. OTRAS') {
              echo '<div class="col-md-6 mb-3 validar" id="otherasistencia">
                <label for="OTRA_MEDIDA_ASISTENCIA">OTRA MEDIDA ASISTENCIA<span class="required"></span></label>
                <input class="form-control" id="OTRA_MEDIDA_ASISTENCIA" name="OTRA_MEDIDA_ASISTENCIA" value="'.$row['descripcion'].'" type="text" readonly>
              </div>';
            }
          }elseif ($clas === 'RESGUARDO') {
            echo '<div class="col-md-6 mb-3 validar" id="resguardo">
              <label for="MEDIDAS_RESGUARDO">INCISO DE LA MEDIDA DE RESGUARDO<span class="required"></span></label>
              <select class="form-control" id="MEDIDAS_RESGUARDO" name="MEDIDAS_RESGUARDO" onChange="selectmedidares(this)" disabled>
                <option style="visibility: hidden" value=" '.$rowmedida['medida'].'">'.$rowmedida['medida'].'</option>';

                $resguardo = "SELECT * FROM medidaresguardo";
                $answerres = $mysqli->query($resguardo);
                while($resguardos = $answerres->fetch_assoc()){
                 echo "<option value='".$resguardos['nombre']."'>".$resguardos['nombre']."</option>";
                }
                echo '</select>
            </div>';
            if ($rowmedida['medida'] === 'XI. EJECUCION DE MEDIDAS PROCESALES') {
              echo '<div class="col-md-6 mb-3 validar" id="resguardoxi">
                <label for="RESGUARDO_XI">EJECUCIÓN DE LA MEDIDA PROCESAL<span class="required"></span></label>
                <select class="form-control" id="RESGUARDO_XI" name="RESGUARDO_XI" disabled>
                  <option style="visibility: hidden" value="'.$rowmedida['descripcion'].'">'.$rowmedida['descripcion'].'</option>';
                  $resguardoxi = "SELECT * FROM medidaresguardoxi";
                  $answerresxi = $mysqli->query($resguardoxi);
                  while($resguardosxi = $answerresxi->fetch_assoc()){
                   echo "<option value='".$resguardosxi['nombre']."'>".$resguardosxi['nombre']."</option>";
                  }
                  echo '</select>
              </div>';
            }elseif ($rowmedida['medida'] === 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
              echo '<div class="col-md-6 mb-3 validar" id="resguardoxii">
                <label for="RESGUARDO_XII">MEDIDA OTORGADA A SUJETOS RECLUIDOS<span class="required"></span></label>
                <select class="form-control" id="RESGUARDO_XII" name="RESGUARDO_XII" disabled>
                  <option style="visibility: hidden" value="'.$rowmedida['descripcion'].'">'.$rowmedida['descripcion'].'</option>';
                  $resguardoxii = "SELECT * FROM medidaresguardoxii";
                  $answerresxii = $mysqli->query($resguardoxii);
                  while($resguardosxii = $answerresxii->fetch_assoc()){
                   echo "<option value='".$resguardosxii['nombre']."'>".$resguardosxii['nombre']."</option>";
                  }
                  echo '</select>
              </div>';
            }elseif ($rowmedida['medida'] === 'XIII. OTRAS MEDIDAS') {
              echo '<div class="col-md-6 mb-3 validar" id="otherresguardo">
                <label for="OTRA_MEDIDA_RESGUARDO">OTRA MEDIDA RESGUARDO<span class="required"></span></label>
                <input autocomplete="off" class="form-control" id="OTRA_MEDIDA_RESGUARDO" name="OTRA_MEDIDA_RESGUARDO" value="'.$rowmedida['descripcion'].'" type="text" readonly>
              </div>';
            }
          }
          ?>
        </div>
        <br>
        <div class="row">
          <div class="alert div-title">
            <h3 style="text-align:center">AMPLIACIÓN DE LA MEDIDA</h3>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="convenio_adhesion">ID CONVENIO ADHESIÓN<span class="required"></span></label>
            <input class="form-control" id="conv_adh" name="conv_adh" placeholder=""  type="text" value="" required>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="MUNIPIO_EJECUCION_MEDIDA">FECHA DE INICIO DE LA AMPLIACIÓN<span class="required"></span></label>
            <input class="form-control" id="FECHA_INICIO_AMPLIACION" name="FECHA_INICIO_AMPLIACION" placeholder=""  type="date" value="" required>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_INICIO">DÍAS DE VIGENCIA<span class="required"></span></label>
            <input class="form-control" id="DIAS_VIGENCIA" name="DIAS_VIGENCIA" placeholder="DÍAS"  type="text" value="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="3" required>
          </div>
        </div>
        <br>
      </div>
			</div>
            <div class="modal-footer">
                <button type="submit" name="editar" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  AMPLIAR</a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CERRAR</button>
                <!-- <a style="display: block; margin: 0 auto;" href="validar_medida_pendiente.php?folio=<?php echo $row['id_medida']; ?>" class="btn color-btn-success" ><i class=""></i>VALIDAR</a> -->
			</form>
            </div>
        </div>
    </div>
</div>
