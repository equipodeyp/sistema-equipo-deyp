<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">VALIDAR MEDIDA</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="EditarRegistro.php?id=<?php echo $row['id']; ?>">
        <?php
        $fol_exp = $row['folioexpediente'];
        $id_medida = $row['id'];
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
        ?>
				<!-- <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">nombre:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombres" value="<?php echo $row['folioexpediente']; ?>">
					</div>
				</div> -->
				<!-- <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Apellidos:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="apellidos" value="<?php echo $row['categoria']; ?>">
					</div>
				</div> -->
				<!-- <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Telefono:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="telefono" value="<?php echo $row['tipo']; ?>">
					</div>
				</div> -->
				<!-- <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Carrera:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="carrera" value="<?php echo $row['clasificacion']; ?>">
					</div>
				</div> -->
				<!-- <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Pais:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="pais" value="<?php echo $row['medida']; ?>">
					</div>
				</div> -->
        <div class="row">
          <div class="alert alert-info">
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
          <div class="alert alert-info">
            <h3 style="text-align:center">MEDIDA OTORGADA</h3>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="CATEAGORIA_MEDIDA">CATEGORÍA DE LA MEDIDA<span class="required"></span></label>
            <br>
            <select class="form-control" id="CATEAGORIA_MEDIDA" name="CATEAGORIA_MEDIDA">
              <option style="visibility: hidden" value="<?php echo $row['categoria']; ?>"><?php echo $row['categoria']; ?></option>
              <option value="INICIAL">INICIAL</option>
              <option value="AMPLIACION">AMPLIACIÓN</option>
            </select>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="TIPO_MEDIDA">TIPO DE MEDIDA<span class="required"></span></label>
            <br>
            <select class="form-control" id="TIPO_MEDIDA" name="TIPO_MEDIDA">
              <option style="visibility: hidden" value="<?php echo $row['tipo']; ?>"><?php echo $row['tipo']; ?></option>
              <option value="PROVISIONAL">PROVISIONAL</option>
              <option value="DEFINITIVA">DEFINITIVA</option>
            </select>
          </div>
        </div>
      </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar</a>
			</form>
            </div>

        </div>
    </div>
</div>
