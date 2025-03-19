<!-- CLASIFICACION TRASLADO-->
<div class="form-group" id="trasladoclasificacion" style="display: none;">
  <label class="col-md-3 control-label">CLASIFICACIÓN</label>
  <div class="col-md-7 selectContainer">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
      <select name="clasificaciontraslado" class="form-control selectpicker" required id="clasificacionejecucion">
        <option disabled selected value>SELECCIONE UNA ACTIVIDAD</option>
        <?php
        $municipio = "SELECT * FROM react_traslados_instancias";
        $answermun = $mysqli->query($municipio);
        while($municipios = $answermun->fetch_assoc()){
         echo "<option value='".$municipios['id']."'>".$municipios['nombre']."</option>";
        }
        ?>
      </select>
    </div>
  </div>
</div>
<!-- CLASIFICACION CONTACTO FAMILIAR-->
<div class="form-group" id="clasificacioncontactofamiliar" style="display: none;">
  <label class="col-md-3 control-label">CLASIFICACIÓN</label>
  <div class="col-md-7 selectContainer">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
      <select name="clasificacioncontacto" class="form-control selectpicker" required id="clasificacionejecucion">
        <option disabled selected value>SELECCIONE UNA ACTIVIDAD</option>
        <?php
        $municipio = "SELECT * FROM react_contacto_familiar";
        $answermun = $mysqli->query($municipio);
        while($municipios = $answermun->fetch_assoc()){
         echo "<option value='".$municipios['id']."'>".$municipios['nombre']."</option>";
        }
        ?>
      </select>
    </div>
  </div>
</div>
<!-- CLASIFICACION CONTACTO FAMILIAR-->
<div class="form-group" id="clasificacionaccionseguridad" style="display: none;">
  <label class="col-md-3 control-label">CLASIFICACIÓN</label>
  <div class="col-md-7 selectContainer">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
      <select name="clasificacionseguridad" class="form-control selectpicker" required id="clasificacionsegurityfamily">
        <option disabled selected value>SELECCIONE UNA ACTIVIDAD</option>
        <?php
        $municipio = "SELECT * FROM react_acciones_seguridad_cp";
        $answermun = $mysqli->query($municipio);
        while($municipios = $answermun->fetch_assoc()){
         echo "<option value='".$municipios['id']."'>".$municipios['nombre']."</option>";
        }
        ?>
      </select>
    </div>
  </div>
</div>
