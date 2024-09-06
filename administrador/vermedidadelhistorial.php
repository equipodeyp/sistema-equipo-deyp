<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:60%">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">
                  <?php
                  if ($row['clasificacion'] === 'ASISTENCIA') {
                    echo "<h1>".$row['medida']."</h1>";
                    // echo $row['medida'];
                  }elseif ($row['clasificacion'] === 'RESGUARDO') {
                    echo "<h1>".$row['medida']."</h1>";
                    // echo $row['medida'];
                  }

                  ?>
                </h4></center>
            </div>
            <div class="modal-body">
            <?php
            $fol_exp = $row['folioexpediente'];
            $id_medida = $row['id_medida'];
            $id_p = $row['id_persona'];
            ?>
			<div class="container-fluid">
			<form method="POST" action="validar_medida_pendiente.php?folio=<?php echo $row['id_medida']; ?>">
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
          if ($validacion == 'true') {
            echo "<div class='columns download'>
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
            <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" readonly value="<?php echo date("d/m/Y h:i:sa", strtotime($row['fecha_captura'])); ?>" type="text">
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
              <option style="visibility: hidden" value="<?php echo $row['categoria']; ?>"><?php echo $row['categoria']; ?></option>
              <option value="INICIAL">INICIAL</option>
              <option value="AMPLIACION">AMPLIACIÓN</option>
            </select>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="TIPO_MEDIDA">TIPO DE MEDIDA<span class="required"></span></label>
            <br>
            <select class="form-control" id="TIPO_MEDIDA" name="TIPO_MEDIDA" disabled>
              <option style="visibility: hidden" value="<?php echo $row['tipo']; ?>"><?php echo $row['tipo']; ?></option>
              <option value="PROVISIONAL">PROVISIONAL</option>
              <option value="DEFINITIVA">DEFINITIVA</option>
            </select>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="CLASIFICACION_MEDIDA">CLASIFICACIÓN DE LA MEDIDA<span class="required"></span></label>
            <br>
            <select class="form-control" id="CLASIFICACION_MEDIDA" name="CLASIFICACION_MEDIDA" disabled>
              <option style="visibility: hidden" value="<?php echo $row['clasificacion']; ?>"><?php echo $row['clasificacion']; ?></option>
              <option value="ASISTENCIA">ASISTENCIA</option>
              <option value="RESGUARDO">RESGUARDO</option>
            </select>
          </div>
          <?php
          $clas = $row['clasificacion'];
          if ($clas === 'ASISTENCIA') {
            echo '<div class="col-md-6 mb-3 validar" id="asistencia">
              <label for="MEDIDAS_ASISTENCIA">INCISO DE LA MEDIDA DE ASISTENCIA<span class="required"></span></label>
              <select class="form-control" id="MEDIDAS_ASISTENCIA" name="MEDIDAS_ASISTENCIA" onChange="selectother(this)" disabled>
                <option style="visibility: hidden" value="'.$row['medida'].'">'.$row['medida'].'</option>';
                $asistencia = "SELECT * FROM medidaasistencia";
                $answerasis = $mysqli->query($asistencia);
                while($asistencias = $answerasis->fetch_assoc()){
                 echo "<option value='".$asistencias['nombre']."'>".$asistencias['nombre']."</option>";
                }
              echo '</select>
            </div>';
            if ($row['medida'] === 'VI. OTRAS') {
              echo '<div class="col-md-6 mb-3 validar" id="otherasistencia">
                <label for="OTRA_MEDIDA_ASISTENCIA">OTRA MEDIDA ASISTENCIA<span class="required"></span></label>
                <input class="form-control" id="OTRA_MEDIDA_ASISTENCIA" name="OTRA_MEDIDA_ASISTENCIA" value="'.$row['descripcion'].'" type="text" readonly>
              </div>';
            }
          }elseif ($clas === 'RESGUARDO') {
            echo '<div class="col-md-6 mb-3 validar" id="resguardo">
              <label for="MEDIDAS_RESGUARDO">INCISO DE LA MEDIDA DE RESGUARDO<span class="required"></span></label>
              <select class="form-control" id="MEDIDAS_RESGUARDO" name="MEDIDAS_RESGUARDO" onChange="selectmedidares(this)" disabled>
                <option style="visibility: hidden" value=" '.$row['medida'].'">'.$row['medida'].'</option>';

                $resguardo = "SELECT * FROM medidaresguardo";
                $answerres = $mysqli->query($resguardo);
                while($resguardos = $answerres->fetch_assoc()){
                 echo "<option value='".$resguardos['nombre']."'>".$resguardos['nombre']."</option>";
                }
                echo '</select>
            </div>';
            if ($row['medida'] === 'XI. EJECUCION DE MEDIDAS PROCESALES') {
              echo '<div class="col-md-6 mb-3 validar" id="resguardoxi">
                <label for="RESGUARDO_XI">EJECUCIÓN DE LA MEDIDA PROCESAL<span class="required"></span></label>
                <select class="form-control" id="RESGUARDO_XI" name="RESGUARDO_XI" disabled>
                  <option style="visibility: hidden" value="'.$row['descripcion'].'">'.$row['descripcion'].'</option>';
                  $resguardoxi = "SELECT * FROM medidaresguardoxi";
                  $answerresxi = $mysqli->query($resguardoxi);
                  while($resguardosxi = $answerresxi->fetch_assoc()){
                   echo "<option value='".$resguardosxi['nombre']."'>".$resguardosxi['nombre']."</option>";
                  }
                  echo '</select>
              </div>';
            }elseif ($row['medida'] === 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
              echo '<div class="col-md-6 mb-3 validar" id="resguardoxii">
                <label for="RESGUARDO_XII">MEDIDA OTORGADA A SUJETOS RECLUIDOS<span class="required"></span></label>
                <select class="form-control" id="RESGUARDO_XII" name="RESGUARDO_XII" disabled>
                  <option style="visibility: hidden" value="'.$row['descripcion'].'">'.$row['descripcion'].'</option>';
                  $resguardoxii = "SELECT * FROM medidaresguardoxii";
                  $answerresxii = $mysqli->query($resguardoxii);
                  while($resguardosxii = $answerresxii->fetch_assoc()){
                   echo "<option value='".$resguardosxii['nombre']."'>".$resguardosxii['nombre']."</option>";
                  }
                  echo '</select>
              </div>';
            }elseif ($row['medida'] === 'XIII. OTRAS MEDIDAS') {
              echo '<div class="col-md-6 mb-3 validar" id="otherresguardo">
                <label for="OTRA_MEDIDA_RESGUARDO">OTRA MEDIDA RESGUARDO<span class="required"></span></label>
                <input autocomplete="off" class="form-control" id="OTRA_MEDIDA_RESGUARDO" name="OTRA_MEDIDA_RESGUARDO" value="'.$row['descripcion'].'" type="text" readonly>
              </div>';
            }
          }  // fin de tipo de medida
          if ($row['date_provisional'] !== '0000-00-00'){
            echo '<div class="col-md-6 mb-3 validar" id="act_date_definitiva_def">
               <label for="FECHA_ACTUALIZACION_MEDIDA_PROV">FECHA DE LA MEDIDA PROVISIONAL<span class="required"></span></label>
               <input class="form-control" id="FECHA_ACTUALIZACION_MEDIDA_PROV" name="FECHA_ACTUALIZACION_MEDIDA_PROV" placeholder="" value="'.$row['date_provisional'].'" type="date" readonly>
            </div>';
          }
          if ($row['date_definitva'] !== ''){
            echo '<div class="col-md-6 mb-3 validar" id="act_date_definitiva_def">
               <label for="FECHA_ACTUALIZACION_MEDIDA_DEF">FECHA DE LA MEDIDA DEFINITIVA<span class="required"></span></label>
               <input class="form-control" id="FECHA_ACTUALIZACION_MEDIDA_DEF" name="FECHA_ACTUALIZACION_MEDIDA_DEF" placeholder="" value="'.$row['date_definitva'].'" type="date" readonly>
            </div>';
          }
          ?>
        </div>
        <br>
        <div class="row">
          <div class="alert div-title">
            <h3 style="text-align:center">ESTATUS DE LA MEDIDA</h3>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="ESTATUS_MEDIDA">ESTATUS DE LA MEDIDA<span class="required"></span></label>
            <select class="form-control" id="ESTATUS_MEDIDA" required="" name="ESTATUS_MEDIDA" onchange="fecha_ejecutada(this)" disabled>
              <option disabled selected value="<?php echo $row['estatus']; ?>"><?php echo $row['estatus']; ?></option>
              <option value="EN EJECUCION">EN EJECUCIÓN</option>
              <option value="EJECUTADA">EJECUTADA</option>
              <option value="CANCELADA">CANCELADA</option>
              </select>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="MUNIPIO_EJECUCION_MEDIDA">MUNICIPIO DE EJECUCIÓN DE LA MEDIDA<span class="required"></span></label>
            <select class="form-control" id="MUNIPIO_EJECUCION_MEDIDA" name="MUNIPIO_EJECUCION_MEDIDA" disabled>
              <option style="visibility: hidden" id="opt-municipio-ejecucion-medida" value="<?php echo $row['ejecucion']; ?>"><?php echo $row['ejecucion']; ?></option>
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
            <label for="FECHA_INICIO">FECHA DE INICIO<span class="required"></span></label>
            <input class="form-control" id="FECHA_INICIO" name="FECHA_INICIO" placeholder=""  type="date" value="<?php if ($row['date_provisional'] == '0000-00-00') {
              echo $row['date_definitva'];
            }else {
              echo $row['date_provisional'];
            } ?>" readonly>
          </div>
          <?php
          $multidisciplinario = "SELECT * FROM multidisciplinario_medidas WHERE id_medida = '$id_medida'";
          $resultadomultidisciplinario = $mysqli->query($multidisciplinario);
          $rowmultidisciplinario = $resultadomultidisciplinario->fetch_array();
          if ($row['estatus'] == 'EJECUTADA') {
            echo '<div class="col-md-6 mb-3 validar">
              <label for="FECHA_DE_EJECUCION">FECHA DE EJECUCIÓN<span class="required"></span></label>
              <input class="form-control" id="FECHA_DESINCORPORACION1" name="FECHA_DESINCORPORACION1" placeholder=""  type="date" value="'.$rowmultidisciplinario['date_close'].'" readonly>
            </div>';
          }elseif ($row['estatus'] == 'CANCELADA') {
            echo '<div class="col-md-6 mb-3 validar">
              <label for="FECHA_DE_EJECUCION">FECHA DE CANCELACIÓN<span class="required"></span></label>
              <input class="form-control" id="FECHA_DESINCORPORACION1" name="FECHA_DESINCORPORACION1" placeholder=""  type="date" value="'.$rowmultidisciplinario['date_close'].'" readonly>
            </div>
            <div class="col-md-6 mb-3 validar" id="MOTIVO">
              <label for="MOTIVO_CANCEL">MOTIVO DE CANCELACIÓN<span class="required"></span></label>
              <input class="form-control" id="MOTIVO_CANCEL" name="MOTIVO_CANCEL" value="'.$row['modificacion'].'" placeholder="" type="text" readonly>
            </div>';
          }
          ?>
        </div>

        <?php
        if ($row['estatus'] == 'EJECUTADA') {
          echo '<div class="row">
            <div class="row">
              <hr class="mb-4">
            </div>
            <div class="alert div-title">
              <h3 style="text-align:center">MOTIVO DE CONCLUSIÓN DE LA MEDIDA</h3>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="CONCLUSION_ART35">CONCLUSION ARTICULO 35</label>
              <input class="form-control" id="CONCLUSION_ART35" name="CONCLUSION_ART35" placeholder="" value="'.$rowmultidisciplinario['acuerdo'].'" type="text" readonly>
            </div>';
            if ($rowmultidisciplinario['acuerdo'] == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO' || $rowmultidisciplinario['acuerdo'] == 'OTRO') {
              echo '<div class="col-md-6 mb-3 validar" id="OTHERART35">
              <label for="OTHER_ART35">ESPECIFIQUE</label>
              <input class="form-control" id="OTHER_ART35" name="OTHER_ART35" placeholder="" value="'.$rowmultidisciplinario['conclusionart35'].'" type="text" readonly>
              </div>';
            }

          echo '</div>';
        }
        ?>
        <br>
        <div class="row">
          <div class="alert div-title">
            <h3 style="text-align:center">COMENTARIOS</h3>
          </div>
        </div>
        <div  class="">
            <?php
            $tabla="SELECT * FROM comentario WHERE folioexpediente ='$fol_exp' AND id_persona = '$id_p' AND id_medida = '$id_medida' AND comentario_mascara = '2'";
            $var_resultado = $mysqli->query($tabla);
            while ($var_fila=$var_resultado->fetch_array()){
              echo "<ul>
                    <li>

                    <div>
                    <span>
                    usuario:".$var_fila['usuario']."
                    </span>
                    </div>
                    <div>
                    <span>
                      ".$var_fila['comentario']."
                    </span>
                    </div>
                    <div>
                    <span>
                    ".date("d/m/Y", strtotime($var_fila['fecha']))."
                    </span>
                    </div>
                    </li>
              </ul>";
            }
            ?>
        </div>

      </div>
			</div>
            <div class="modal-footer">
                <!-- <button type="submit" name="editar" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  VALIDAR</a> -->
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CERRAR</button>
                <!-- <a style="display: block; margin: 0 auto;" href="validar_medida_pendiente.php?folio=<?php echo $row['id_medida']; ?>" class="btn color-btn-success" ><i class=""></i>VALIDAR</a> -->
			</form>
            </div>
        </div>
    </div>
</div>
