<?php
$fol_exp = $row['folioexpediente'];
$id_medida = $row['id_medida'];
$id_p = $row['id_persona'];
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
$clas = $row['clasificacion'];
$tipmed = $row['tipo'];
if ($tipmed == 'PROVISIONAL') {
  if ($row['date_provisional'] !== '0000-00-00') {
    $datemedida = $row['date_provisional'];
  }
}elseif ($tipmed == 'DEFINITIVA') {
  $datemedida = $row['date_definitva'];
}
$multidisciplinario = "SELECT * FROM multidisciplinario_medidas WHERE id_medida = '$id_medida'";
$resultadomultidisciplinario = $mysqli->query($multidisciplinario);
$rowmultidisciplinario = $resultadomultidisciplinario->fetch_array();
?>
<div class="modal fade" id="detalle_medida_<?php echo $row['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h2 style="display: block; margin: 0 auto;" class="modal-title" id="miModalLabel">DETALLES ESPECIFICOS DE LA MEDIDA OTORGADA</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div style="padding:0px; border:solid 4px;">
          <section class="container well form-horizontal secciones"><br>
            <div class="columns download">
              <p>
                <h3 style='text-align:center'><FONT COLOR='red' size=6 align='center'>PENDIENTE POR VALIDAR</FONT></h3>
              </p>
            </div>
            <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
              <strong style="color: #f8fdfc;">FOLIO DEL EXPEDIENTE</strong>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3 validar">
                <label for="SIGLAS DE LA UNIDAD">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
                <input class="form-control" id="NUM_EXPEDIENTE" name="NUM_EXPEDIENTE" placeholder="" type="text" disabled value="<?php echo $rowfol['folioexpediente'];?>" maxlength="50">
              </div>
              <div class="col-md-6 mb-3 validar">
                <label for="SIGLAS DE LA UNIDAD">ID PERSONA<span ></span></label>
                <input class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" disabled value="<?php echo $rowfol['identificador']; ?>" maxlength="50">
              </div>
              <div class="col-md-6 mb-3 validar">
                <label for="FECHA_CAPTURA">FECHA DE CAPTURA DE LA MEDIDA<span class="required"></span></label>
                <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" disabled value="<?php echo date("d/m/Y h:i:sa", strtotime($row['fecha_captura'])); ?>" type="datetime">
              </div>
            </div>
            <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
              <strong style="color: #f8fdfc;">MEDIDA OTORGADA</strong>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3 validar">
                <label for="CATEAGORIA_MEDIDA">CATEGORÍA DE LA MEDIDA<span class="required"></span></label>
                <br>
                <select class="form-control" id="CATEAGORIA_MEDIDA" name="CATEAGORIA_MEDIDA" disabled>
                  <option style="visibility: hidden" value="<?php echo $row['categoria']; ?>"><?php echo $row['categoria']; ?></option>
                </select>
              </div>
              <div class="col-md-6 mb-3 validar">
                <label for="TIPO_MEDIDA">TIPO DE MEDIDA<span class="required"></span></label>
                <br>
                <select class="form-control" id="TIPO_MEDIDA" name="TIPO_MEDIDA" disabled>
                  <option style="visibility: hidden" value="<?php echo $row['tipo']; ?>"><?php echo $row['tipo']; ?></option>
                </select>
              </div>
              <div class="col-md-6 mb-3 validar">
                <label for="CLASIFICACION_MEDIDA">CLASIFICACIÓN DE LA MEDIDA<span class="required"></span></label>
                <select class="form-control" id="CLASIFICACION_MEDIDA" name="CLASIFICACION_MEDIDA" disabled>
                  <option style="visibility: hidden" value="<?php echo $row['clasificacion']; ?>"><?php echo $row['clasificacion']; ?></option>
                </select>
              </div>
              <div class="col-md-6 mb-3 validar">
                <label for="insiso_medida">INCISO DE LA MEDIDA DE <?php echo $clas; ?><span class="required"></span></label>
                <select class="form-control" id="insiso_medida" name="insiso_medida" disabled>
                  <option style="visibility: hidden" value="<?php echo $row['medida']; ?>"><?php echo $row['medida']; ?></option>
                </select>
              </div>
              <?php
              if ($row['medida'] == 'XIII. OTRAS MEDIDAS' || $row['medida'] == 'VI. OTRAS' ||
                  $row['medida'] == 'XI. EJECUCION DE MEDIDAS PROCESALES' || $row['medida'] == 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
              ?>
              <div class="col-md-6 mb-3 validar">
                <label for="insiso_medida2"><?php echo $row['medida']; ?><span class="required"></span></label>
                <select class="form-control" id="insiso_medida2" name="insiso_medida2" disabled>
                  <option style="visibility: hidden" value="<?php echo $row['descripcion']; ?>"><?php echo $row['descripcion']; ?></option>
                </select>
              </div>
              <?php
              }
              ?>
              <div class="col-md-6 mb-3 validar">
                <label for="FECHA_CAPTURA">FECHA DE LA MEDIDA <?php echo $tipmed; ?></label>
                <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" disabled value="<?php echo $datemedida; ?>" type="date">
              </div>
            </div>
            <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
              <strong style="color: #f8fdfc;">ESTATUS DE LA MEDIDA</strong>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3 validar">
                <label for="ESTATUS_MEDIDA">ESTATUS DE LA MEDIDA<span class="required"></span></label>
                <select class="form-control" id="ESTATUS_MEDIDA" required="" name="ESTATUS_MEDIDA" onchange="fecha_ejecutada(this)" disabled>
                  <option disabled selected value="<?php echo $row['estatus']; ?>"><?php echo $row['estatus']; ?></option>
                  </select>
              </div>
              <div class="col-md-6 mb-3 validar">
                <label for="FECHA_INICIO">FECHA DE INICIO<span class="required"></span></label>
                <input class="form-control" id="FECHA_INICIO" name="FECHA_INICIO" placeholder=""  type="date" value="<?php if ($row['date_provisional'] == '0000-00-00') {
                  echo $row['date_definitva'];
                }else {
                  echo $row['date_provisional'];
                } ?>" disabled>
              </div>
              <?php if ($row['estatus'] == 'CANCELADA') {
                ?>
                <div class="col-md-6 mb-3 validar">
                  <label for="FECHA_CAPTURA">FECHA DE CANCELACIÓN</label>
                  <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" disabled value="<?php echo $rowmultidisciplinario['date_close']; ?>" type="date">
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="FECHA_CAPTURA">MOTIVO DE CANCELACIÓN</label>
                  <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" disabled value="<?php echo $row['modificacion']; ?>" type="text">
                </div>
                <?php
                } elseif ($row['estatus'] == 'EJECUTADA') {
                ?>
                <div class="col-md-6 mb-3 validar">
                  <label for="MUNIPIO_EJECUCION_MEDIDA">MUNICIPIO DE EJECUCIÓN DE LA MEDIDA<span class="required"></span></label>
                  <select class="form-control" id="MUNIPIO_EJECUCION_MEDIDA" name="MUNIPIO_EJECUCION_MEDIDA" disabled>
                    <option style="visibility: hidden" id="opt-municipio-ejecucion-medida" value="<?php echo $row['ejecucion']; ?>"><?php echo $row['ejecucion']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="FECHA_CAPTURA">FECHA DE EJECUCIÓN</label>
                  <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" disabled value="<?php echo $rowmultidisciplinario['date_close']; ?>" type="date">
                </div>
                <?php
                }
                ?>
            </div>
            <?php
            if ($row['estatus'] == 'EJECUTADA') {
              ?>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">MOTIVO DE CONCLUSIÓN DE LA MEDIDA</strong>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3 validar">
                  <label for="FECHA_CAPTURA">CONCLUSION ARTICULO 35</label>
                  <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" disabled value="<?php echo $rowmultidisciplinario['acuerdo']; ?>" type="text">
                </div>
                <?php
                if ($rowmultidisciplinario['acuerdo'] == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO' || $rowmultidisciplinario['acuerdo'] == 'OTRO') {
                  ?>
                  <div class="col-md-6 mb-3 validar">
                    <label for="FECHA_CAPTURA">ESPECIFIQUE</label>
                    <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" disabled value="<?php echo $rowmultidisciplinario['conclusionart35']; ?>" type="text">
                  </div>
                  <?php
                }
                ?>
              </div>
              <?php
            }
            ?>
            <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
              <strong style="color: #f8fdfc;">COMENTARIOS</strong>
            </div>
            <div class="row">
              <?php
              $tabla="SELECT * FROM comentario WHERE folioexpediente ='$fol_exp' AND id_persona = '$id_p' AND id_medida = '$id_medida' AND comentario_mascara = '2'";
              $var_resultado = $mysqli->query($tabla);
              while ($var_fila=$var_resultado->fetch_array()){
                echo "<ul>
                <li>
                <div>
                <span> usuario:".$var_fila['usuario']."</span>
                </div>
                <div>
                <span>".$var_fila['comentario']."</span>
                </div>
                <div>
                <span>".date("d/m/Y", strtotime($var_fila['fecha']))."</span>
                </div>
                </li>
                </ul>";
              }
              ?>
            </div>
            <br><br><br>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CERRAR</button>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</div>
