<form class="" action="./controllers/upt_procesopenal.php?idpersona=<?php echo $id_person; ?>" method="post">
  <section id="invprocpenal_div" style="display:none; padding:0px; border:solid 5px;"><br>
    <div class="container well form-horizontal secciones">
      <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
        <strong style="color: #f8fdfc;">DATOS DE LA INVESTIGACIÓN O PROCESO PENAL</strong>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3 validar">
          <label for="DELITO_PRINCIPAL">DELITO PRINCIPAL<span class="required"></span></label>
          <select class="form-select" id="DELITO_PRINCIPAL" name="DELITO_PRINCIPAL" onChange="otherdelito(this)" >
            <option style="visibility: hidden" id="opt-delito-principal" value="<?php echo $rowprocess['delitoprincipal']; ?>"><?php echo $rowprocess['delitoprincipal']; ?></option>
            <?php
            $delito = "SELECT * FROM delito";
            $answer = $mysqli->query($delito);
            while($delitos = $answer->fetch_assoc()){
              echo "<option value='".$delitos['nombre']."'>".$delitos['nombre']."</option>";
            }
            ?>
          </select>
        </div>
        <div id="otherdel" class="col-md-6 mb-3 validar"  style="display:none;">
          <label for="OTRO_DELITO_PRINCIPAL1">OTRO DELITO PRINCIPAL <span class="required"></span></label>
          <input autocomplete="off" class="form-control" id="OTRO_DELITO_PRINCIPAL1" name="OTRO_DELITO_PRINCIPAL1" placeholder="" value="<?php echo $rowprocess['otrodelitoprincipal']; ?>" type="text" value="">
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="DELITO_SECUNDARIO">DELITO SECUNDARIO<span class="required"></span></label>
          <select class="form-select" id="DELITO_SECUNDARIO" name="DELITO_SECUNDARIO" onChange="delito_secundario(this)">
            <option style="visibility: hidden" id="opt-delito-secundario" value="<?php echo $rowprocess['delitosecundario']; ?>"><?php echo $rowprocess['delitosecundario']; ?></option>
            <?php
            $delito = "SELECT * FROM delito";
            $answer = $mysqli->query($delito);
            while($delitos = $answer->fetch_assoc()){
              echo "<option value='".$delitos['nombre']."'>".$delitos['nombre']."</option>";
            }
            ?>
          </select>
        </div>
        <div id="delitosec" class="col-md-6 mb-3 validar" style="display:none;">
          <label for="OTRO_DELITO_SECUNDARIO1">OTRO DELITO SECUNDARIO <span class="required"></span></label>
          <input autocomplete="off" class="form-control" id="OTRO_DELITO_SECUNDARIO1" name="OTRO_DELITO_SECUNDARIO1" placeholder="" value="<?php echo $rowprocess['otrodelitosecundario']; ?>" type="text" value="">
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="ETAPA_PROCEDIMIENTO">ETAPA DEL PROCEDIMIENTO / RECURSOS<span class="required"></span></label>
          <select class="form-select" id="ETAPA_PROCEDIMIENTO" name="ETAPA_PROCEDIMIENTO">
            <option style="visibility: hidden" id="opt-etapa-procedimiento" value="<?php echo $rowprocess['etapaprocedimiento']; ?>"><?php echo $rowprocess['etapaprocedimiento']; ?></option>
            <?php
            $etapaproc = "SELECT * FROM etapa_proc";
            $answeretapa = $mysqli->query($etapaproc);
            while($etapas = $answeretapa->fetch_assoc()){
              echo "<option value='".$etapas['nombre']."'>".$etapas['nombre']."</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="NUC">NUC <span class="required"></span></label>
          <input autocomplete="off" class="form-control" id="NUC" name="NUC" value="<?php echo $rowprocess['nuc']; ?>" type="text">
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="MUNICIPIO_RADICACION">MUNICIPIO DE RADICACIÓN DE LA CARPETA DE INVESTIGACIÓN<span class="required"></span></label>
          <select class="form-select" id="MUNICIPIO_RADICACION" name="MUNICIPIO_RADICACION">
            <option style="visibility: hidden" id="opt-municipio-radicacion" value="<?php echo $rowprocess['numeroradicacion']; ?>"><?php echo $rowprocess['numeroradicacion']; ?></option>
            <?php
            $select = "SELECT * FROM municipios";
            $answer = $mysqli->query($select);
            while($valores = $answer->fetch_assoc()){
              echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
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
