<div class="modal fade" id="addasistenciamedsuj_<?php echo $idsujforasismed; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:90%;  margin-top: 50px; margin-bottom:50px; width:60%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h1 class="modal-title" id="myModalLabel">ASISTENCIA MEDICA</h1></center>
      </div>
      <?php
      // echo "id de sujeto del traslado con destino---";
      $iddestraslado = $idsujforasismed;
      // echo "<br>";
      // obtener datos para generar id de asistencia medica
      $getdes = "SELECT * FROM react_sujetos_traslado WHERE id = '$iddestraslado'";
      $rgetdes = $mysqli -> query($getdes);
      $fgetdes = $rgetdes ->fetch_assoc();
      // echo "id del sujeto de datos personales---";
      $idunicsuj = $fgetdes['id_sujeto'];
      // echo "<br>";
      // echo "id del traslado unico---";
      $idunictrs = $fgetdes['id_traslado'];
      // echo "<br>";
      $getident = "SELECT * FROM datospersonales WHERE id = '$idunicsuj'";
      $rgetident = $mysqli->query($getident);
      $fgetident = $rgetident ->fetch_assoc();
      // echo "folio del expediente---";
      $folexpunisuj = $fgetident['folioexpediente'];
      // echo "<br>";
      // echo "indetificador del sujeto---";
      $identificadorsuj = $fgetident['identificador'];
      // echo "<br>";
      $getinfotrs ="SELECT * FROM react_traslados WHERE id = '$idunictrs'";
      $rgetinfotrs = $mysqli->query($getinfotrs);
      $fgetinfotrs = $rgetinfotrs->fetch_assoc();
      // echo "fecha del traslado---";
      $fechatrs = $fgetinfotrs['fecha'];
      // echo "<br>";
      // echo "para traer el dia de la cita se ocupa folexp, identificador, id_asistencia, fecha_Asistencia";
      // echo "<br>";
      $getdeatllesasismed = "SELECT * FROM cita_asistencia
                                 INNER JOIN solicitud_asistencia ON cita_asistencia.id_asistencia = solicitud_asistencia.id_asistencia
                                 WHERE cita_asistencia.fecha_asistencia = '$fechatrs' AND solicitud_asistencia.folio_expediente='$folexpunisuj'
                                 AND solicitud_asistencia.id_sujeto = '$identificadorsuj' AND solicitud_asistencia.etapa != 'CANCELADA'
                                 AND (solicitud_asistencia.tipo_requerimiento = 'SEGUIMIENTO' OR solicitud_asistencia.tipo_requerimiento = 'POR INGRESO' OR solicitud_asistencia.tipo_requerimiento = 'PRIMERA VEZ')";
      $rgetdeatllesasismed = $mysqli->query($getdeatllesasismed);
      while ($fgetdeatllesasismed = $rgetdeatllesasismed -> fetch_assoc()) {
        // echo "asistencia medica----";
        $idasismedunic = $fgetdeatllesasismed['id_asistencia'];
        // echo "<br>";
        // code...
      }
      ?>

      <div class="modal-body">
        <div class="container-fluid">
          <form action="saveasismedicasuj.php?id_traslado=<?php echo $iddestraslado;?>" method="post">
            <div id="contenedor-personas">
              <div class="persona-form">
                <div class="modal-footer">
                  <div class=" well form-horizontal">
                    <div class="row">
                      <!-- select de expediente -->
                      <div class="col-md-2" style="text-align: center; width: 400px; border: 1px solid #ECECEC;">
                        <label class="col-md-2 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">ASISTENCIA MEDICA</label>
                        <!-- <input name="lugarsalida" placeholder="INGRESE LUGAR" class="form-control" type="text" required> -->
                        <select class="form-control" name="idasismed" required>
                          <option disabled selected value="">SELECCIONE LA ASISTENCIA MEDICA</option>
                          <option value="URGENCIA">URGENCIA</option>
                          <?php
                          $select1 = "SELECT * FROM cita_asistencia
                                                     INNER JOIN solicitud_asistencia ON cita_asistencia.id_asistencia = solicitud_asistencia.id_asistencia
                                                     WHERE cita_asistencia.fecha_asistencia = '$fechatrs' AND solicitud_asistencia.folio_expediente='$folexpunisuj'
                                                     AND solicitud_asistencia.id_sujeto = '$identificadorsuj' AND solicitud_asistencia.etapa != 'CANCELADA'
                                                     AND (solicitud_asistencia.tipo_requerimiento = 'SEGUIMIENTO' OR solicitud_asistencia.tipo_requerimiento = 'POR INGRESO' OR solicitud_asistencia.tipo_requerimiento = 'PRIMERA VEZ')";
                          $answer1 = $mysqli->query($select1);
                          while($valores1 = $answer1->fetch_assoc()){
                            $rresidasismed = $valores1['id_asistencia'];
                            $resservmed = $valores1['servicio_medico'];
                            echo "<option value='$rresidasismed'>$rresidasismed/$resservmed</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div style="text-align: center;">
                <button type="submit" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  GUARDAR</a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
