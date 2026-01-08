<form class="" action="./controllers/upt_sujeto.php?idpersona=<?php echo $id_person; ?>" method="post">
  <section id="personapropuesta_div" style="display:none; padding:0px; border:solid 5px;"><br>
    <div class="container well form-horizontal secciones">
      <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
        <strong style="color: #f8fdfc;">DATOS DE LA PERSONA PROPUESTA</strong>
      </div>
      <div class="row">
        <div>
          <h6 for="GENERAR_ID">En este apartado deberás generar un identificador clave, este será asignado a la persona propuesta. Pulsa en el botón "GENERAR ID" para crear el identificador clave automáticamente. Es importante que antes de generar el identificador clave te cersiores de que la información se encuentre introducida correctamente. Una vez generado el identificador clave no podrás modificar los campos de Nombre y Apellidos de la persona propuesta.<br><br> <span class="required"></span><h6>
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="NOMBRE_PERSONA">NOMBRE (S) <span class="required"></span></label>
          <input class="form-control" id="NOMBRE_PERSONA" name="NOMBRE_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['nombrepersona']; ?>" required>
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="PATERNO_PERSONA">APELLIDO PATERNO <span class="required"></span></label>
          <input class="form-control" id="PATERNO_PERSONA" name="PATERNO_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['paternopersona']; ?>" required>
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="MATERNO_PERSONA"> APELLIDO MATERNO <span class="required"></span></label>
          <input class="form-control" id="MATERNO_PERSONA" name="MATERNO_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['maternopersona']; ?>" required>
        </div>
        <?php
        if ($rowfol['estatus'] != 'DESINCORPORADO' && $rowfol['estatus'] != 'NO INCORPORADO') {
          ?>
          <div class="col-md-3 mb-3 validar">
            <br>
            <button class="btn color-btn-success" onclick="enviarId()" disabled="true" style="display: block; margin: 0 auto; justify-content: center;" id="GENERAR_ID" type="button"> GENERAR ID </button>
          </div>
          <?php
        }
        ?>
        <div class="col-md-3 mb-3 validar">
          <label for="ID_UNICO">ID PERSONA<span ></span></label>
          <input class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" value="<?php echo $rowfol['identificador']; ?>" maxlength="50" readonly>
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="FECHA_NACIMIENTO_PERSONA">FECHA DE NACIMIENTO <span class="required"></span></label>
          <input class="form-control" id="FECHA_NACIMIENTO_PERSONA" name="FECHA_NACIMIENTO_PERSONA" placeholder=""  type="date" value="<?php echo $rowfol['fechanacimientopersona']; ?>">
        </div>
        <div class="col-md-3 mb-3 validar">
          <label for="EDAD_PERSONA">EDAD INICIAL<span class="required"></span></label>
          <input readonly class="form-control" id="EDAD_PERSONA" type="text" value="<?php echo $rowfol['edadpersona']; ?>">
        </div>
        <div class="col-md-3 mb-3 validar">
          <label for="EDAD_ACTUAL">EDAD ACTUAL<span class="required"></span></label>
          <input readonly class="form-control" id="EDAD_ACTUAL" type="text" value="<?php echo $edad->y.' años'; ?>">
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="GRUPO_EDAD">GRUPO EDAD<span class="required">(*)</span></label>
          <input readonly class="form-control" id="GRUPO_EDAD" name="GRUPO_EDAD" placeholder="" type="text" required value="<?php echo $rowfol['grupoedad']; ?>">
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="SEXO_PERSONA">SEXO<span class="required"></span></label>
          <select class="form-select" id="SEXO_PERSONA" name="SEXO_PERSONA">
            <option style="visibility: hidden" id="opt-sexo-persona" value="<?php echo $rowfol['sexopersona']; ?>"><?php echo $rowfol['sexopersona']; ?></option>
            <option value="MUJER">MUJER</option>
            <option value="HOMBRE">HOMBRE</option>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="NACIONALIDAD_PERSONA">NACIONALIDAD<span class="required"></span></label>
          <input class="form-control" id="NACIONALIDAD_PERSONA" name="NACIONALIDAD_PERSONA" placeholder="" value="<?php echo $roworigen['nacionalidadpersona']; ?>" type="text" >
        </div>

        <div class="col-md-6 mb-3 validar">
          <label for="CURP_PERSONA">CURP<span class="required"></span></label>
          <input class="form-control" id="CURP_PERSONA" name="CURP_PERSONA" placeholder="" value="<?php echo $rowfol['curppersona']; ?>" type="text">
        </div>

        <div class="col-md-6 mb-3 validar">
          <label for="RFC_PERSONA">R.F.C.<span class="required"></span></label>
          <input class="form-control" id="RFC_PERSONA" name="RFC_PERSONA" placeholder=""  type="text" value="<?php echo $rowfol['rfcpersona']; ?>" maxlength="13">
        </div>

        <div class="col-md-6 mb-3 validar">
          <label for="ALIAS_PERSONA">ALIAS <span class="required"></span></label>
          <input class="form-control" id="ALIAS_PERSONA" name="ALIAS_PERSONA" placeholder="" value="<?php echo $rowfol['aliaspersona']; ?>" type="text" >
        </div>

        <div class="col-md-6 mb-3 validar">
          <label for="OCUPACION_PERSONA">OCUPACIÓN<span class="required"></span></label>
          <input class="form-control" id="OCUPACION_PERSONA" name="OCUPACION_PERSONA" placeholder="" value="<?php echo $rowfol['ocupacion']; ?>" type="text" >
        </div>

        <div class="col-md-6 mb-3 validar">
          <label for="TELEFONO_FIJO">TELÉFONO FIJO <span class="required"></span></label>
          <input class="form-control" id="TELEFONO_FIJO" name="TELEFONO_FIJO" placeholder="" value="<?php echo $rowfol['telefonofijo']; ?>" type="text" maxlength="10" >
        </div>

        <div class="col-md-6 mb-3 validar">
          <label for="TELEFONO_CELULAR">TELÉFONO CELULAR<span class="required"></span></label>
          <input class="form-control" id="TELEFONO_CELULAR" name="TELEFONO_CELULAR" placeholder="" value="<?php echo $rowfol['telefonocelular']; ?>" type="text" maxlength="10" >
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="CALIDAD_PERSONA_PROCEDIMIENTO">CALIDAD DE LA PERSONA PROPUESTA DENTRO DEL PROCESO PENAL<span class="required"></span></label>
          <select class="form-select" id="CALIDAD_PERSONA_PROCEDIMIENTO" name="CALIDAD_PERSONA_PROCEDIMIENTO">
            <option style="visibility: hidden" id="opt-calidad-persona" value="<?php echo $rowfol['calidadprocedimiento']; ?>"><?php echo $rowfol['calidadprocedimiento']; ?></option>
            <?php
            $calidad = "SELECT * FROM calidadpersonaprocesopenal";
            $answer = $mysqli->query($calidad);
            while($calidades = $answer->fetch_assoc()){
              echo "<option value='".$calidades['nombre']."'>".$calidades['nombre']."</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar" id="otracalidadproceso" style="display: none;">
          <label for="OTRACALIDADPROCESO">ESPECIFIQUE</label>
          <input class="form-control" type="text" id="OTRACALIDADPROCESO" name="calprocesoother" value="<?php echo $rowfol['especifique']; ?>">
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="CALIDAD_PERSONA">CALIDAD EN EL PROGRAMA DE LA PERSONA PROPUESTA<span class="required"></span></label>
          <select class="form-select" id="CALIDAD_PERSONA" name="CALIDAD_PERSONA">
            <option style="visibility: hidden" id="opt-calidad-persona" value="<?php echo $rowfol['calidadpersona']; ?>"><?php echo $rowfol['calidadpersona']; ?></option>
            <?php
            $calidad = "SELECT * FROM calidadpersona";
            $answer = $mysqli->query($calidad);
            while($calidades = $answer->fetch_assoc()){
              echo "<option value='".$calidades['nombre']."'>".$calidades['nombre']."</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar">
          <label for="INCAPAZ">INCAPAZ O MENOR DE EDAD<span class="required"></span></label>
          <select class="form-select" id="INCAPAZ" name="INCAPAZ"  onChange="pagoOnChange(this)">
            <option style="visibility: hidden" id="opt-incapaz" value="<?php echo $rowfol['incapaz']; ?>"><?php echo $rowfol['incapaz']; ?></option>
            <option value="SI">SI</option>
            <option value="NO">NO</option>
          </select>
        </div>
      </div>
      <div id="tutor" class="" style="display:none;">
        <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
          <strong style="color: #f8fdfc;">DATOS DEL PADRE/MADRE Y/O TUTOR</strong>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3 validar">
            <label for="TUTOR_NOMBRE1">NOMBRE(S) <span class="required"></span></label>
            <input class="form-control" id="TUTOR_NOMBRE1" name="TUTOR_NOMBRE1" placeholder="" value="<?php echo $rowtutor['nombre']; ?>" type="text" >
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="TUTOR_PATERNO1">APELLIDO PATERNO <span class="required"></span></label>
            <input class="form-control" id="TUTOR_PATERNO1" name="TUTOR_PATERNO1" placeholder="" value="<?php echo $rowtutor['apellidopaterno']; ?>" type="text" >
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="TUTOR_MATERNO1">APELLIDO MATERNO <span class="required"></span></label>
            <input class="form-control" id="TUTOR_MATERNO1" name="TUTOR_MATERNO1" placeholder="" value="<?php echo $rowtutor['apellidomaterno']; ?>" type="text" >
          </div>
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
