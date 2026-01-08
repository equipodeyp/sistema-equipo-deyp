<form class="" action="./controllers/upt_lugarnacimiento.php?idpersona=<?php echo $id_person; ?>" method="post">
  <section id="lugarnacimiento_div" style="display:none; padding:0px; border:solid 5px;"><br>
    <div class="container well form-horizontal secciones">
      <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
        <strong style="color: #f8fdfc;">LUGAR DE NACIMIENTO DE LA PERSONA</strong>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3 validar">
          <label for="cbx_estado">ESTADO<span class="required"></span></label>
          <select class="form-select" name="cbx_estado" id="cbx_estado" onChange="OTHERPAIS(this)" >
            <option style="visibility: hidden" id="opt-lugar-nacimiento" value="<?php echo $roworigen['lugardenacimiento']; ?>"><?php echo $roworigen['lugardenacimiento']; ?></option>
            <?php while($row = $resultado23->fetch_assoc()) { ?>
              <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
            <?php } ?>
            <option value="33">Otro</option>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar" id="other_pais" style="display:none;">
          <label for="OTHER_PAIS">ESPECIFIQUE</label>
          <input autocomplete="off" class="form-control" id="OTHER_PAIS" name="OTHER_PAIS" placeholder="" value="" type="text">
        </div>
        <div class="col-md-6 mb-3 validar" id="municipio">
          <label for="cbx_municipio">MUNICIPIO<span class="required"></span></label>
          <select class="form-select" name="cbx_municipio" id="cbx_municipio"  >
            <option value="<?php echo $roworigen['municipiodenacimiento']; ?>"><?php echo $roworigen['municipiodenacimiento']; ?></option>
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
