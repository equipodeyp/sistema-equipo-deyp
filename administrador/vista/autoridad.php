<form class="" action="./controllers/upt_autoridad.php?idpersona=<?php echo $id_person; ?>" method="post">
  <section id="autoridad_div" style="display:none; padding:0px; border:solid 5px;"><br>
    <div class="container well form-horizontal secciones">
      <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
        <strong style="color: #f8fdfc;">AUTORIDAD QUE INGRESA LA SOLICITUD DE INCORPORACIÓN AL PROGRAMA</strong>
      </div>
      <?php echo $rowfol['estatus']; ?>
      <div class="row">
        <div class="col-md-6 mb-3 validar">
          <label for="ID_SOLICITUD">ID SOLICITUD<span class="required"></span></label>
          <input class="form-control" id="ID_SOLICITUD" name="ID_SOLICITUD" placeholder="" type="text" value="<?php echo $rowaut['idsolicitud']; ?>" maxlength="30">
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="FECHA_SOLICITUD_AUTORIDAD">FECHA DE SOLICITUD<span ></span></label>
          <input class="form-control" id="FECHA_SOLICITUD_AUTORIDAD" name="FECHA_SOLICITUD" type="date" value="<?php echo $rowaut['fechasolicitud']; ?>" >
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="NOMBRE_AUTORIDAD">NOMBRE DE LA AUTORIDAD<span class="required"></span></label>
          <select class="form-select" id="NOMBRE_AUTORIDAD" name="NOMBRE_AUTORIDAD" onChange="openOther(this)">
            <option style="visibility: hidden" id="opt-nombre-autoridad" value="<?php echo $rowaut['nombreautoridad']; ?>"><?php echo $rowaut['nombreautoridad']; ?></option>
            <option value="OTRO">OTRO</option>
            <?php
            $autoridad = "SELECT * FROM nombreautoridad";
            $answer = $mysqli->query($autoridad);
            while($autoridades = $answer->fetch_assoc()){
             echo "<option value='".$autoridades['nombre']."'>".$autoridades['nombre']."</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar" id="other" style="display:none;">
          <label for="OTHER_AUTORIDAD1">ESPECIFIQUE</label>
          <input class="form-control" id="OTHER_AUTORIDAD1" name="OTHER_AUTORIDAD1" placeholder="" value="<?php echo $rowaut['otraautoridad']; ?>" type="text" >
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="NOMBRE_SERVIDOR">NOMBRE DEL SERVIDOR<span class="required"></span></label>
          <input class="form-control" id="NOMBRE_SERVIDOR" name="NOMBRE_SERVIDOR" placeholder="" value="<?php echo $rowaut['nombreservidor']; ?>" type="text" >
        </div>

        <div class="col-md-6 mb-3 validar">
          <label for="PATERNO_SERVIDOR">APELLIDO PATERNO DEL SERVIDOR<span class="required"></span></label>
          <input class="form-control" id="PATERNO_SERVIDOR" name="PATERNO_SERVIDOR" placeholder="" value="<?php echo $rowaut['apellidopaterno']; ?>" type="text">
        </div>

        <div class="col-md-6 mb-3 validar">
          <label for="MATERNO_SERVIDOR">APELLIDO MATERNO DEL SERVIDOR<span class="required"></span></label>
          <input class="form-control" id="MATERNO_SERVIDOR" name="MATERNO_SERVIDOR" placeholder="" value="<?php echo $rowaut['apellidomaterno']; ?>" type="text" >
        </div>
        <div class="col-md-12 mb-3 validar">
          <label for="CARGO_SERVIDOR">CARGO DEL SERVIDOR<span class="required"></span></label>
          <input class="form-control" id="CARGO_SERVIDOR" name="CARGO_SERVIDOR" placeholder="" value="<?php echo $rowaut['cargoservidor']; ?>" type="text" >
        </div>
        <?php
        if ($rowfol['estatus'] != 'DESINCORPORADO' && $rowfol['estatus'] != 'NO INCORPORADO') {
          ?>
          <div class="row">
            <div>
              <br>
              <button style="display: block; margin: 0 auto;" class="btn color-btn-success btn-sm" id="enter" type="submit">ACTUALIZAR</button>
              <br>
            </div>
          </div>
          <?php
        }
        ?>        
      </div>
    </div>
  </section>
</form>
