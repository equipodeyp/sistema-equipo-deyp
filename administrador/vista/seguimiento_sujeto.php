<br>
<section id="seguimiento_sujeto" style="display:; padding:0px; border:solid 5px;">
  <div class="container well form-horizontal secciones"><br>
    <?php
    $fol2=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
    $resultfol2 = $mysqli->query($fol2);
    $rowfol2=$resultfol2->fetch_assoc();
    $name_folio=$rowfol2['folioexpediente'];
    $id_person=$rowfol2['id'];
    $idunico= $rowfol2['identificador'];
    $valid = "SELECT * FROM validar_persona WHERE id_persona = '$id_person'";
    $res_val=$mysqli->query($valid);
    $fil_val = $res_val->fetch_assoc();
    $validacion = $fil_val['validacion'];

      if ($validacion == 'true') {
        echo "<div class='columns download'>
                <p>
                <img src='../image/true4.jpg' width='50' height='50' style='display: block; margin: 0 auto;'>
                <h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>PERSONA VALIDADA</FONT></h3>

                </p>
        </div>";
      }else {
        echo "<div class='columns download'>
                <p>
                <h3 style='text-align:center'><FONT COLOR='red' size=6 align='center'>PERSONA NO VALIDADA</FONT></h3>
                </p>
        </div>";
      }
    ?>
    <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
      <strong style="text-align:center; color: #f8fdfc;">RELACION CON OTRO(S) EXPEDIENTE(S) DE LA PERSONA PROPUESTA</strong>
    </div>
    <div class="col-md-12 mb-3 validar">
      <?php
      $rowfol2['relacional'];
      $nombrep = $rowfol2['nombrepersona'];
      $apaterno = $rowfol2['paternopersona'];
      $amaterno =  $rowfol2['maternopersona'];
      $nombrecompleto = $nombrep .' '. $apaterno .' '. $amaterno;
      $cl = "SELECT COUNT(*) as t FROM datospersonales WHERE nombrepersona = '$nombrep' AND paternopersona = '$apaterno'
                                                 AND maternopersona = '$amaterno' AND relacional = 'SI'";
      $rcl = $mysqli->query($cl);
      $fcl = $rcl->fetch_assoc();
      echo '  <div class="col-md-6 mb-3 validar" style="display:none">
              <label for="ifrelacionalsuj">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
              <input class="form-control" id="ifrelacionalsuj" type="text" value="'.$fcl['t'].'" maxlength="50" readonly>
        </div>';
      if ($fcl['t'] > 0) {
        // echo "si";
        echo "<h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>PERSONA RELACIONADA CON OTRO(S) EXPEDIENTE(S)</FONT></h3>";
        $ifrelacion1 = "SELECT * FROM relacion_suj_exp WHERE folioexpediente = '$name_folio' OR espedienterelacional = '$name_folio'";
        $rifrelacion1 = $mysqli->query($ifrelacion1);
        while ($fifrelacion1 = $rifrelacion1->fetch_assoc()) {
          // code...
          if ($fifrelacion1['espedienterelacional'] === $name_folio) {
            // echo $fifrelacion1['folioexpediente'].'++++';
            echo '<button style="width:250px" class="btn btn-danger" style="" disabled><b>'.$fifrelacion1['folioexpediente'].'</b></button> &nbsp &nbsp';
          }else {
            // echo $fifrelacion1['espedienterelacional'].'++++';
            echo '<button style="width:250px" class="btn btn-danger" style="" disabled><b>'.$fifrelacion1['espedienterelacional'].'</b></button> &nbsp &nbsp';
          }
        }
      }else {
        echo "<h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>PERSONA NO RELACIONADA CON OTRO(S) EXPEDIENTE(S)</FONT></h3>";
      }
      ?>
    </div>
    <form class="" action="./controllers/update_convenioentendimiento.php?idpersona=<?php echo $id_person; ?>" method="post">
      <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
        <strong style="color: #f8fdfc;">DETERMINACIÓN DE LA INCORPORACIÓN</strong>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="ANALISIS_MULTIDISCIPLINARIO">ANÁLISIS MULTIDISCIPLINARIO</label>
          <select id="ANALISIS_MULTIDISCIPLINARIO" class="form-select" name="ANALISIS_MULTIDISCIPLINARIO">
            <option style="visibility: hidden" id="opt-analisis-multidisiplinario" value="<?php echo $rowdetinc['multidisciplinario']; ?>"><?php echo $rowdetinc['multidisciplinario']; ?></option>
            <?php
            $multidisciplinario = "SELECT * FROM multidisciplinario";
            $answermultidisciplinario = $mysqli->query($multidisciplinario);
            while($multidisciplinarios = $answermultidisciplinario->fetch_assoc()){
              echo "<option value='".$multidisciplinarios['nombre']."'>".$multidisciplinarios['nombre']."</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-md-6 mb-3" id="div_incorporacion">
          <label for="INPUT_INCORPORACION">PROCEDENCIA DE LA INCORPORACIÓN</label>
          <select id="INPUT_INCORPORACION" class="form-select"  name="INCORPORACION" >
            <option style="visibility: hidden" value="<?php echo $rowdetinc['incorporacion']; ?>"><?php echo $rowdetinc['incorporacion']; ?></option>
            <option value="INCORPORACION PROCEDENTE">INCORPORACION PROCEDENTE</option>
            <option value="INCORPORACION NO PROCEDENTE">INCORPORACION NO PROCEDENTE</option>
          </select>
        </div>
        <div class="col-md-6 mb-3" id="div_dateautorizacion">
          <label for="FECHA_AUTORIZACION">FECHA DE AUTORIZACIÓN DEL ANÁLISIS MULTIDISCIPLINARIO</label>
          <input id="FECHA_AUTORIZACION" class="form-control" name="FECHA_AUTORIZACION" type="date" value="<?php if ($rowdetinc['date_autorizacion'] != '0000-00-00') {
            echo $rowdetinc['date_autorizacion'];
          } ?>">
        </div>
        <div class="col-md-6 mb-3" id="div_idanalisis">
          <label for="id_analisis">ID DE AUTORIZACION DEL ANALISIS MULTIDISCIPLINARIO</label>
          <input id="id_analisis" class="form-control" type="text" name="id_analisis" value="<?php echo $rowdetinc['id_analisis']; ?>">
        </div>
        <div class="col-md-6 mb-3" id="div_convenio">
          <label for="CONVENIO_ENTENDIMIENTO">CONVENIO DE ENTENDIMIENTO</label>
          <select id="CONVENIO_ENTENDIMIENTO" class="form-select" name="CONVENIO_ENTENDIMIENTO" >
            <option style="visibility: hidden" id="opt-convenio-de-entendimiento" value="<?php echo $rowdetinc['convenio']; ?>"><?php echo $rowdetinc['convenio']; ?></option>
            <?php
            $convenioo = "SELECT * FROM convenio";
            $answerconvenioo = $mysqli->query($convenioo);
            while($convenioos = $answerconvenioo->fetch_assoc()){
              echo "<option value='".$convenioos['nombre']."'>".$convenioos['nombre']."</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar" id="div_dateconvenio">
          <label for="datefirmaconvenio">FECHA DE LA FIRMA DEL CONVENIO DE ENTENDIMIENTO</label>
          <input id="datefirmaconvenio" class="form-control" name="FECHA_CONVENIO_ENTENDIMIENTO" value="<?php if ($rowdetinc['date_convenio'] != '0000-00-00') {
            echo $rowdetinc['date_convenio'];
          }  ?>" type="date" value="" >
        </div>
        <div class="col-md-6 mb-3 validar" id="div_dateinicioconvenio">
          <label for="fecha_inicio">FECHA DE INICIO DEL CONVENIO DE ENTENDIMIENTO</label>
          <input id="fecha_inicio" class="form-control" type="date" name="fecha_inicio" value="<?php if ($rowdetinc['fecha_inicio'] != '0000-00-00') {
            echo $rowdetinc['fecha_inicio'];
          }  ?>">
        </div>
        <div class="col-md-6 mb-3" id="div_vigenciaconvenio">
          <label for="VIGENCIA_CONVENIO">VIGENCIA DEL CONVENIO</label>
          <input type="text" name="ipt_vigenciaconv" id="VIGENCIA_CONVENIO" placeholder="Cantidad en días" class="form-control" value="<?php echo $rowdetinc['vigencia']; ?>" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
        </div>
        <div class="col-md-6 mb-3 validar" id="div_dateterminoconvenio">
          <label for="datecloseconvenio">FECHA TÉRMINO DEL CONVENIO DE ENTENDIMIENTO</label>
          <input type="text" name="ipt_datecloseconvenio" id="datecloseconvenio" class="form-control"  value="<?php echo $rowdetinc['fecha_termino']; ?>" disabled>
        </div>
        <div class="col-md-6 mb-3 validar" id="div_idconvenio">
          <label for="id_convenio">ID DEL CONVENIO DE ENTENDIMIENTO</label>
          <input type="text" name="id_convenio" id="id_convenio" class="form-control" value="<?php echo $rowdetinc['id_convenio'];?>">
        </div>
      </div>
      <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
        <strong style="color: #f8fdfc;">ESTATUS DE LA PERSONA DENTRO DEL PROGRAMA</strong>
      </div>
      <div class="row">
        <div class="col-md-4 mb-3 validar">
          <label for="ESTATUS_PERSONA">ESTATUS DE LA PERSONA</label>
          <select class="form-select" id="ESTATUS_PERSONA" name="ESTATUS_PERSONA" >
            <option style="visibility: hidden" id="opt-estatus-persona" value="<?php echo $rowfol['estatus']; ?>"><?php echo $rowfol['estatus']; ?></option>
            <?php
            $estatus = "SELECT * FROM estatuspersona";
            $answerestatus = $mysqli->query($estatus);
            while($estatusperson = $answerestatus->fetch_assoc()){
              echo "<option value='".$estatusperson['nombre']."'>".$estatusperson['nombre']."</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-md-4 mb-3 validar" style="display:none;">
          <label for="statusprogramrelacional"></label>
          <input type="text" class="form-control" value="<?php echo $rowfol['relacional']; ?>" id="statusprogramrelacional">
        </div>
        <div class="col-md-4 mb-3 validar" style="display:none;">
          <label for="statusprogram"></label>
          <input type="text" id="statusprogram" class="form-control" value="<?php echo $rowfol['estatusprograma']; ?>" id="statusprogram">
        </div>
        <div class="col-md-4 mb-3 validar" >
          <h6 for=for="switch">SUJETO RELACIONADO</h6>
          <div class="d-flex align-items-center">
            <span class="me-2"><strong id="sujrelacionado_no" style="color:red">NO&nbsp&nbsp&nbsp&nbsp</strong></span>
            <div class="form-check form-switch mb-0">
              <input style="transform: scale(2.0);" class="form-check-input" type="checkbox" id="flexSwitchsujetorelacionado" disabled>
              <label class="form-check-label" for="flexSwitchsujetorelacionado"><strong id="sujrelacionado_si" style="color:blue">&nbsp&nbsp&nbsp&nbspSI</strong></label>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3 validar" >
          <h6 for=for="switch">ACTIVO</h6>
          <div class="d-flex align-items-center">
            <span class="me-2"><strong id="sujestatus_no" style="color:red">NO&nbsp&nbsp&nbsp&nbsp</strong></span>
            <div class="form-check form-switch mb-0">
              <input style="transform: scale(2.0);" class="form-check-input" type="checkbox" id="flexSwitchsujetoestatus" name="activoprograma">
              <label class="form-check-label" for="flexSwitchsujetoestatus"><strong id="sujestatus_si" style="color:blue">&nbsp&nbsp&nbsp&nbspSI</strong></label>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3 validar" id="div_selectconclusion">
          <label for="conclusioncancelacion_sujeto">CONCLUSIÓN / CANCELACIÓN</label>
          <select id="conclusioncancelacion_sujeto" class="form-select" name="CONCLUSION_CANCELACION_EXP" >
            <option style="visibility: hidden" id="opt-conclusion-cancelacion" value="<?php echo $rowdetinc['conclu_cancel']; ?>"><?php echo $rowdetinc['conclu_cancel']; ?></option>
            <option value="CANCELACION">CANCELACION</option>
            <option value="CONCLUSION">CONCLUSION</option>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar" id="div_dateconclusion">
          <label for="FECHA_DESINCORPORACION_UNO" >FECHA DE CONCLUSIÓN</label>
          <input id="FECHA_DESINCORPORACION_UNO" class="form-control"  name="FECHA_DESINCORPORACION" type="date" value="<?php if ($rowdetinc['date_desincorporacion'] != '0000-00-00') {
            echo $rowdetinc['date_desincorporacion'];
          }  ?>">
        </div>
        <div class="col-md-6 mb-3 validar" id="div_datecancelacion">
          <label for="datecancelacionsuj">FECHA DE CANCELACIÓN</label>
          <input id="datecancelacionsuj" class="form-control" name="date_cancelacion" type="date" value="<?php if ($rowdetinc['date_desincorporacion'] != '0000-00-00') {
            echo $rowdetinc['date_desincorporacion'];
          }  ?>">
        </div>
        <div class="col-md-6 mb-3 validar" id="div_conclusionart35" >
          <label for="slt_conclusionart35">CONCLUSIÓN ARTÍCULO 35</label>
          <select class="form-select" id="slt_conclusionart35" name="CONCLUSION_ART351">
            <option  value="<?php echo $rowdetinc['conclusionart35']; ?>"><?php echo $rowdetinc['conclusionart35']; ?></option>
            <?php
            $art35 = "SELECT * FROM conclusionart35";
            $answerart35 = $mysqli->query($art35);
            while($art35s = $answerart35->fetch_assoc()){
              echo "<option value='".$art35s['nombre']."'>".$art35s['nombre']."</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-md-6 mb-3 validar" id="div_otroart35">
          <label for="OTHER_ART351">ESPECIFIQUE</label>
          <input id="OTHER_ART351" class="form-control" name="OTHER_ART351" placeholder="" value="<?php echo $rowdetinc['otroart35']; ?>" type="text">
        </div>
      </div>
      <div class="row">
        <div>
          <button id="btnupdatedeterminacion" style="display: block; margin: 0 auto;" class="btn color-btn-success btn-sm" type="submit">ACTUALIZAR</button>
        </div>
      </div>
    </form>
    <br>

    <?php
    $ifconveio = "SELECT COUNT(*) AS total FROM `determinacionincorporacion` WHERE id_persona = '$id_person' AND convenio = 'FORMALIZADO'";
    $rifconveio = $mysqli->query($ifconveio);
    $fifconveio = $rifconveio->fetch_assoc();
    $mostraraddconvenio = $fifconveio['total'];
    if ($mostraraddconvenio > 0) {
    ?>
    <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
      <strong style="color: #f8fdfc;">EVALUACIONES DE SEGUIMIENTO</strong>
    </div>
    <?php
    // echo $rowfol['estatus'];
    if ($rowfol['estatus'] != 'DESINCORPORADO' && $rowfol['estatus'] != 'NO INCORPORADO') {
      ?>
      <button id="addestudioconveniosujeto" style="display: block; margin: 0 auto;" type="button" class="btn color-btn-success btn-sm" data-bs-toggle="modal"
        data-bs-id="<?php echo $name_folio; ?>"
        data-bs-nombre="<?php echo $identificador; ?>"
        data-bs-target="#staticBackdrop">
        REGISTRAR ESTUDIO
      </button>
      <?php
    }
    ?>
    <?php
    include('add_evaluacionsujeto.php');
    ?>
    <br>
    <table class="table table-hover table-striped table-bordered">
      <thead class="thead-light">
        <th style="text-align:center; color: white; border: 1px solid black;">No.</th>
        <th style="text-align:center; color: white; border: 1px solid black;">ID</th>
        <th style="text-align:center; color: white; border: 1px solid black;">ANALISIS MULTIDISCIPLINARIO</th>
        <th style="text-align:center; color: white; border: 1px solid black;">DETALLES DEL CONVENIO</th>

      </thead>
      <?php
      $cont_med = 0;
      $tabla="SELECT * FROM evaluacion_persona WHERE id_unico ='$identificador'";
       $var_resultado = $mysqli->query($tabla);
      while ($var_fila=$var_resultado->fetch_array())
      {
        $cont_med = $cont_med + 1;
        $idevaluacionpersona = $var_fila['id'];
        echo "<tr>";
          echo "<td style='text-align:center; border: 1px solid black;'>"; echo $cont_med; echo "</td>";
          echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['id_analisis']; echo "</td>";
          echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['analisis']; echo "</td>";
          echo "<td style='text-align:center; border: 1px solid black;'>";
          // echo $idevaluacionpersona;
          if ($var_fila['tipo_convenio'] != '' || $var_fila['analisis'] == 'ESTUDIO TECNICO DE CONCLUSION' || $var_fila['analisis'] == 'ESTUDIO TECNICO DE CANCELACION') {
            ?>
            <!-- <h1>detalles</h1> -->
            <button type="button" class="btn color-btn-success btn-sm" data-bs-toggle="modal"
              data-id="<?php echo $idevaluacionpersona; ?>"
              data-nombre="<?php echo $idevaluacionpersona; ?>"
              data-bs-target="#detalleevaluacionind_suj<?php echo $idevaluacionpersona;?>">
              DETALLES
            </button>
            <?php
            include('detallesevaluacionpersona.php');
          }elseif ($var_fila['analisis'] == 'ESTUDIO TECNICO DE EVALUACION DE RIESGO' && $var_fila['tipo_convenio'] == '') {
            ?>
            <!-- <h1>actualizar</h1> -->
            <button type="button" class="btn color-btn-success btn-sm" data-bs-toggle="modal"
              data-id="<?php echo $idevaluacionpersona; ?>"
              data-nombre="<?php echo $idevaluacionpersona; ?>"
              data-bs-target="#updateevaluacionind_suj<?php echo $idevaluacionpersona;?>">
              ACTUALIZAR
            </button>
            <?php
            include('update_evaluacionpersona.php');
          } echo "</td>";
        echo "</tr>";
      }
      ?>
    </table>
    <?php } ?>
    <form class="" action="./controllers/add_comentario_convenio.php?idpersona=<?php echo $id_person; ?>" method="post">
      <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
        <strong style="color: #f8fdfc;">COMENTARIOS</strong>
      </div>
      <div class="">
        <table class="table table-striped table-bordered">
          <?php
          $tabla="SELECT * FROM comentario WHERE folioexpediente ='$name_folio'  AND comentario_mascara = '3' && id_persona = '$id_person'";
          $var_resultado = $mysqli->query($tabla);
          while ($var_fila=$var_resultado->fetch_array())
          {
          echo "<tr>";
          echo "<td>";
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
                ".date("d/m/Y h:i A", strtotime($var_fila['fecha']))."
                </span>
                </div>
                </li>
          </ul>";echo "</td>";
          echo "</tr>";

          }
        ?>
        </table>
      </div>
      <div class="contenedor-margen" id="div_comentarios">
        <textarea name="COMENTARIO" id="COMENTARIO" rows="5" placeholder="Escribe tus comentario" maxlength="10000" style="resize: none;"></textarea>
        <button class="btn btn-success" id="btn_comentariodeterminacion">
          <i class="fa-solid fa-paper-plane"></i>
        </button>
      </div>
    </form>
    <br><br>
  </div>
</section>
