<form class="" action="./controllers/upt_valoracionjuridica.php?idpersona=<?php echo $id_person; ?>" method="post">
  <section id="valjuridica_div" style="display:none; padding:0px; border:solid 5px;"><br>
    <div class="container well form-horizontal secciones">
      <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
        <strong style="color: #f8fdfc;">VALORACIÓN JURÍDICA</strong>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3 validar">
          <label for="RESULTADO_VALORACION_JURIDICA">RESULTADO DE LA VALORACIÓN JURÍDICA<span class="required"></span></label>
          <select class="form-select" id="RESULTADO_VALORACION_JURIDICA" name="RESULTADO_VALORACION_JURIDICA" onChange="valorjuridico(this)">
            <option style="visibility: hidden" id="opt-resultado-valoracio-juridica" value="<?php echo $rowvaljur['resultadovaloracion']; ?>"><?php echo $rowvaljur['resultadovaloracion']; ?></option>
            <option value="SI PROCEDE">SI PROCEDE</option>
            <option value="NO PROCEDE">NO PROCEDE</option>
            <option value="PARCIALMENTE PROCEDE">PARCIALMENTE PROCEDE</option>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar" id="motivo_no_procede" style="display:none;">
          <label for="MOTIVO_NO_PROCEDENCIA">MOTIVO NO PROCEDENCIA<span class="required"></span></label>
          <select class="form-select" id="MOTIVO_NO_PROCEDENCIA" name="MOTIVO_NO_PROCEDENCIA" >
            <option disabled selected value="<?php echo $rowvaljur['motivoprocedencia']; ?>"><?php echo $rowvaljur['motivoprocedencia']; ?></option>
            <option disabled value>SELECCIONE UNA OPCION</option>
            <option value="NO CORRESPONDE EL TIPO PENAL">NO CORRESPONDE EL TIPO PENAL</option>
            <option value="NO CUMPLE CON LOS REQUISITOS">NO CUMPLE CON LOS REQUISITOS</option>
            <option value="AMBAS">AMBAS</option>
            <option value="NO APLICA">NO APLICA</option>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar" style="display:none;" id="art23">
          <label for="articulo23proc" class="is-required">ARTICULO NO. 23<span class="required"></span></label>
          <select class="form-select" id="articulo23proc" name="articulo23proc">
            <option disabled selected value="<?php echo $rowvaljur['motivoprocedencia']; ?>"><?php echo $rowvaljur['motivoprocedencia']; ?></option>
            <option disabled value>SELECCIONE UNA OPCION</option>
            <?php
            $selectart23 = "SELECT * FROM articulo23";
            $answerart23 = $mysqli->query($selectart23);
            while($valoresart23 = $answerart23->fetch_assoc()){
              echo "<option value='".$valoresart23['nombre']."'>".$valoresart23['nombre']."</option>";
            }
            ?>
          </select>
        </div>
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
  </section>
</form>
