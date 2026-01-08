<br>
<section id="medidas" style="display:; padding:0px; border:solid 5px;">
  <div class="container well form-horizontal"><br>
    <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
      <strong style="color: #f8fdfc;">MEDIDAS</strong>
    </div>
    <div class="">
      <!-- <?php echo $tipo_status;
      echo "<br>";
      echo $counttotalmedidaspp;
      ?> -->
      <!-- <div class="" style="text-align: left;"> -->
      <?php if ($resultmediejecutadas > 0) {
        ?>
        <button style="float: left;" type="button" class="btn color-btn-success-gray btn-sm" data-bs-toggle="modal"
          data-bs-id="<?php echo $name_folio; ?>"
          data-bs-nombre="<?php echo $id_person; ?>"
          data-bs-target="#historialofmedidas">
          HISTORIAL DE MEDIDAS
        </button>&nbsp;
        <?php
        include('show_historialofmedidas.php');
        }
      ?>
        <?php
        if ($tipo_status == 'PERSONA PROPUESTA' AND $counttotalmedidaspp == 0) {
        ?>
        <button style="float: right;" type="button" class="btn color-btn-success btn-sm" data-bs-toggle="modal"
          data-bs-id="<?php echo $name_folio; ?>"
          data-bs-nombre="<?php echo $id_person; ?>"
          data-bs-target="#add_medidassuj">
          REGISTRAR MEDIDAS PROVISIONALLES
        </button>
        <?php
        include('add_medidasujeto.php');
      }elseif ($tipo_status == 'SUJETO PROTEGIDO') {
      ?>
      <button style="float: right;" type="button" class="btn color-btn-success btn-sm" data-bs-toggle="modal"
        data-bs-id="<?php echo $name_folio; ?>"
        data-bs-nombre="<?php echo $id_person; ?>"
        data-bs-target="#add_medidasdef_suj">
        REGISTRAR MEDIDAS DEFINITIVAS
      </button>
      <?php
      include('add_medidasdefinitivassujeto.php');
      }
      if ($counttotalmedidaspp != 0) {
        if ($tipo_status == 'PERSONA PROPUESTA') {
          ?>
          <button type="button" class="btn color-btn-success btn-sm" data-bs-toggle="modal"
            data-bs-id="<?php echo $name_folio; ?>"
            data-bs-nombre="<?php echo $id_person; ?>"
            data-bs-target="#add_other_medida_pro_or_def_suj">
            REGISTRAR CUALQUIER OTRA MEDIDA
          </button>
          <?php
          include('add_othermedida_prov_or_defin.php');
        }
      ?>
      <?php
      if ($showbuttonampliaralojamiento == 1) {
        // echo $idmedidaalojtemp;
        $getidmedialoj = "SELECT * FROM medidas
        WHERE medidas.id_persona = '$id_person' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus = 'EN EJECUCION' AND medidas.tipo = 'DEFINITIVA'";
        $rgetidmedialoj = $mysqli->query($getidmedialoj);
        $fgetidmedialoj = $rgetidmedialoj ->fetch_assoc();
        $id_medidaaloj = $fgetidmedialoj['id'];
        ?>
        <button type="button" class="btn color-btn-success btn-sm" data-bs-toggle="modal"
          data-bs-id="<?php echo $name_folio; ?>"
          data-bs-nombre="<?php echo $identificador; ?>"
          data-bs-target="#ampliarmedidaalojamientotemporal<?php echo $id_medidaaloj;?>">
          AMPLIAR ALOJAMIENTO TEMPORAL
        </button>
        <?php
        include('add_ampliacionalojamiento.php');
      }
      }
      ?>
        <!-- </div> -->
      <!-- </div> -->
    </div>
    <!-- <div class="" style="text-align: right;">
      <a href="../subdireccion_de_estadistica_y_preregistro/historialmedidas.php?id=<?=$rowfol['id']?>" class="btn btn-secondary btn-sm">HISTORIAL DE MEDIDAS</a>
    </div> -->
    <br><br>
    <!-- <?php echo $idmedidaalojtemp;?> -->
    <table class="table table-hover table-striped table-bordered">
      <thead class="thead-light">
        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">#</th>
        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">CATEGORIA</th>
        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">TIPO</th>
        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">CLASIFICACIÓN</th>
        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">MEDIDA</th>
        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA PROVISIONAL</th>
        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA DEFINITIVA</th>
        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">ESTATUS</th>
        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA DE EJECUCIÓN</th>
        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">MUNICIPIO</th>
        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">MOTIVO</th>
        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">DETALLES</th>
        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">ELIMINAR</th>
        <?php if ($name == 'estadistica_admin') {
          if ($showfilacolvalidar != 0) {
          ?>
          <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">VALIDAR</th>
          <?php
          }
        } ?>
      </thead>
      <?php
      $existvalidar = "SELECT COUNT(*) AS total FROM validar_medida
                        WHERE id_persona = '$id_person' AND validar_datos = 'false'";
      $rexistvalidar = $mysqli->query($existvalidar);
      $fexistvalidar = $rexistvalidar->fetch_assoc();
      // echo $fexistvalidar['total'];
      $cont_med = 0;
      $folioExp=" SELECT * FROM datospersonales WHERE id='$id_person'";
      $resultfol = $mysqli->query($fol);
      $rowfol=$resultfol->fetch_assoc();
      $idUnicoPersona = $rowfol['identificador'];

      $tabla="SELECT * FROM medidas
      INNER JOIN validar_medida ON medidas.id = validar_medida.id_medida
      WHERE medidas.id_persona = '$id_person' AND (medidas.estatus = 'EN EJECUCION' OR validar_medida.validar_datos = 'false')";
      $var_resultado = $mysqli->query($tabla);
      while ($var_fila=$var_resultado->fetch_array())
      {
        $id_medida = $var_fila['id'];
        $val_meds = "SELECT * FROM validar_medida WHERE folioexpediente = '$name_folio' AND id_persona = '$id_person' AND id_medida = '$id_medida'";
        $res_valmeds = $mysqli->query($val_meds);
        while ($fila_valmeds = $res_valmeds->fetch_array()){
          $cont_med = $cont_med + 1;

          $idmedida=" SELECT * FROM multidisciplinario_medidas WHERE id_medida='$id_medida'";
          $ridmedida = $mysqli->query($idmedida);
          $fidmedida=$ridmedida->fetch_assoc();

          echo "<tr>";
            echo "<td style='text-align:center; border: 1px solid black;'>"; echo $cont_med; echo "</td>";
            echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['categoria']; echo "</td>";
            echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['tipo']; echo "</td>";
            echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['clasificacion']; echo "</td>";
            echo "<td style='text-align:center; border: 1px solid black;'>";
            if ($var_fila['medida'] == 'VI. OTRAS' || $var_fila['medida'] == 'XIII. OTRAS MEDIDAS'
                || $var_fila['medida'] == 'XI. EJECUCION DE MEDIDAS PROCESALES' || $var_fila['medida'] == 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
                  echo $var_fila['medida'];
                  echo "<br>";
                  echo "<strong>";echo $var_fila['descripcion']; echo "</strong>";
            }else {
              echo $var_fila['medida'];
            } echo "</td>";

              echo "<td style='text-align:center; border: 1px solid black;'>"; if ($var_fila['date_provisional'] != '0000-00-00') {
                echo date("d/m/Y", strtotime($var_fila['date_provisional']));
              } echo "</td>";

            echo "<td style='text-align:center; border: 1px solid black;'>";
            if ($var_fila['date_definitva'] === '') {
              echo "";
            }else {
              echo date("d/m/Y", strtotime($var_fila['date_definitva']));
            } echo "</td>";
            echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['estatus']; echo "</td>";
            echo "<td style='text-align:center; border: 1px solid black;'>"; if ($var_fila['date_ejecucion'] != '0000-00-00') {
              echo date("d/m/Y", strtotime($var_fila['date_ejecucion']));
            } echo "</td>";
            echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila['ejecucion']; echo "</td>";
            echo "<td style='text-align:center; border: 1px solid black;'>"; if ($fidmedida['acuerdo'] === 'OTRO' || $fidmedida['acuerdo'] === 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
              echo $fidmedida['conclusionart35'];
            }else {
              echo $fidmedida['acuerdo'];
            }
            echo "</td>";
            echo "<td style='text-align:center; border: 1px solid black;'>";if ($var_fila['estatus'] == 'EN EJECUCION' AND $var_fila['clasificacion'] != '') {
              // echo "<a href='detalle_medida.php?id=".$var_fila['id']."'> <button type='button' class='btn color-btn-success btn-sm'>ACTUALIZAR</button> </a>";

              ?>
              <button type="button" class="btn color-btn-success btn-sm" data-bs-toggle="modal"
                data-id="<?php echo $id_medida; ?>"
                data-nombre="<?php echo $id_medida; ?>"
                data-bs-target="#update_medida_<?php echo $id_medida;?>">
                ACTUALIZAR
              </button>
              <?php
              include('update_medidas_suj.php');
            }elseif ($var_fila['estatus'] == 'EN EJECUCION' AND $var_fila['clasificacion'] == '') {
            ?>
            <button type="button" class="btn color-btn-success btn-sm" data-bs-toggle="modal"
              data-id="<?php echo $id_medida; ?>"
              data-nombre="<?php echo $id_medida; ?>"
              data-bs-target="#verdetalle_medida_<?php echo $id_medida;?>">
              COMPLETAR
            </button>
            <?php
            include('verespecificaciones_medida.php');
          }

          if ($var_fila['estatus'] == 'EJECUTADA' AND $name != 'estadistica_admin') {
            // echo "boton solo para ver detalles";
            ?>
            <button type="button" class="btn color-btn-success btn-sm" data-bs-toggle="modal"
              data-id="<?php echo $id_medida; ?>"
              data-nombre="<?php echo $id_medida; ?>"
              data-bs-target="#detallegeneral_medida_<?php echo $id_medida;?>">
              VER
            </button>
            <?php
            include('verdetallegeneral_medida.php');
            }
              echo "</td>";

              echo "<td style='text-align:center; border: 1px solid black;'>"; ?>
                <button type="button" class="btn color-btn-success btn-sm" data-bs-toggle="modal"
                  data-id="<?php echo $id_medida; ?>"
                  data-nombre="<?php echo $id_medida; ?>"
                  data-bs-target="#eliminar_medida_<?php echo $id_medida;?>">
                  ELIMINAR
                </button>
                <?php
                include('eliminar_medida.php');
                echo "</td>";
                if ($name == 'estadistica_admin') {
                  if ($showfilacolvalidar != 0) {
                echo "<td style='text-align:center; border: 1px solid black;'>";
                if ($fila_valmeds['validar_datos'] == 'false' AND $name == 'estadistica_admin' AND $var_fila['clasificacion'] != '') {
                ?>
                <button type="button" class="btn color-btn-success btn-sm" data-bs-toggle="modal"
                  data-id="<?php echo $id_medida; ?>"
                  data-nombre="<?php echo $id_medida; ?>"
                  data-bs-target="#validar_medida_<?php echo $id_medida;?>">
                  VALIDAR
                </button>
                <?php
                include('validardatos_medida.php');
                }
                echo "</td>";
                }
                }
              echo "</tr>";
              }

            }
           ?>
          </form>
    </table>
  </div>
</section>
