<form class="" action="./controllers/upt_domicilio.php?idpersona=<?php echo $id_person; ?>" method="post">
  <section id="domicilioactual_div" style="display:none; padding:0px; border:solid 5px;"><br>
    <div class="container well form-horizontal secciones">
      <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
        <strong style="color: #f8fdfc;">DOMICILIO ACTUAL DE LA PERSONA</strong>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3 validar">
          <label for="MOD_DOMICILIO" >P.P.L.<span class="required"></span></label>
          <select  class="form-select" id="MOD_DOMICILIO" name="MOD_DOMICILIO"  onclick="mod_domicilioactual(this)">
            <option style="visibility: hidden" value="<?php echo $rowdomicilio['lugar']; ?>"><?php echo $rowdomicilio['lugar']; ?></option>
            <option value="SI">SI</option>
            <option value="NO">NO</option>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar" id="mod_reclusorio" style="display:none;">
          <label for="RECLUSORIO1"  >CENTROS PENITENCIARIOS<span class="required"></span></label>
          <select  class="form-select" id="RECLUSORIO1" name="RECLUSORIO1">
            <option style="visibility: hidden" value="<?php echo $rowdomicilio['seleccioneestado']; ?>"><?php echo $rowdomicilio['seleccioneestado']; ?></option>
            <option style="visibility: hidden" value>SELECCIONE UNA OPCION</option>
            <?php
            $reclusorio = "SELECT * FROM reclusorios";
            $answer_reclusorio = $mysqli->query($reclusorio);
            while($reclusorios = $answer_reclusorio->fetch_assoc()){
              echo "<option value='".$reclusorios['id']."'>".$reclusorios['denominacion']."</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar" id="act_estado" style="display:none;">
          <label for="cbx_estado1">ESTADO<span class="required"></span></label>
          <select class="form-select" name="cbx_estado1" id="cbx_estado1">
            <option style="visibility: hidden" value="<?php echo $rowdomicilio['seleccioneestado']; ?>"><?php echo $rowdomicilio['seleccioneestado']; ?></option>
            <option style="visibility: hidden" id="opt-seleccion-estado" value="">SELECCIONE UNA OPCION</option>
            <?php while($row = $resultado1->fetch_assoc()) { ?>
              <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar" id="act_municipio" style="display:none;">
          <label for="cbx_municipio11">MUNICIPIO<span class="required"></span></label>
          <select class="form-select" name="cbx_municipio11" id="cbx_municipio11" >
            <option style="visibility: hidden" value="<?php echo $rowdomicilio['seleccionemunicipio']; ?>"><?php echo $rowdomicilio['seleccionemunicipio']; ?></option>
            <option style="visibility: hidden" id="opt-seleccion-estado" value="">SELECCIONE UNA OPCION</option>
          </select>
        </div>

        <div class="col-md-6 mb-3 validar" id="act_localidad" style="display:none;">
          <label for="localidadrad">LOCALIDAD<span class="required"></span></label>
          <input autocomplete="off" class="form-control" name="localidadrad" id="localidadrad" value="<?php echo $rowdomicilio['seleccionelocalidad']; ?>" type="text">
        </div>
        <div class="col-md-6 mb-3 validar" id="act_calle" style="display:none;">
          <label for="CALLE">CALLE Y NÚMERO<span class="required"></span></label>
          <input autocomplete="off" class="form-control" id="CALLE" name="CALLE" value="<?php echo $rowdomicilio['calle']; ?>" type="text" >
        </div>
        <div class="col-md-6 mb-3 validar" id="act_cp" style="display:none;">
          <label for="CP">C.P.<span class="required"></span></label>
          <input autocomplete="off" class="form-control" id="CP" name="CP" value="<?php echo $rowdomicilio['cp']; ?>" type="text" maxlength="5" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
        </div>

        <div class="col-md-6 mb-3 validar" id="criterio_oport" style="display:none;">
          <label for="CRITERIO_OPORTUNIDAD" id="LABEL_CRITERIO_OPORTUNIDAD">CRITERIO DE OPORTUNIDAD</label>
          <select class="form-select" name="criterio_oportunidad" id="CRITERIO_OPORTUNIDAD" onclick="fecha_criterio(this)">
            <option style="visibility: hidden" value>SELECCIONE UNA OPCION</option>
            <option selected value="<?php echo $rowdomicilio['criterio']; ?>"><?php echo $rowdomicilio['criterio']; ?></option>
            <option value="NO APLICA">NO APLICA</option>
            <option value="EN ESPERA">EN ESPERA</option>
            <option value="OTORGADO">OTORGADO</option>
          </select>
        </div>

        <div class="col-md-6 mb-3 validar" id="fecha_crit" style="display:none;">
          <label id="" for="fecha_cr_opor">FECHA DEL CRITERIO DE OPORTUNIDAD</label>
          <input class="form-control" type="date" name="fecha_cr_opor" id="fecha_cr_opor" value="<?php if ($rowdomicilio['fecha_criterio'] != '0000-00-00') {
            echo $rowdomicilio['fecha_criterio'];
          } ?>">
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
