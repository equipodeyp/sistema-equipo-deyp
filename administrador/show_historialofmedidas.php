<div class="modal fade" id="historialofmedidas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="display: block; margin: 0 auto;" class="modal-title" id="miModalLabel">HISTORIAL COMPLETO DE LAS MEDIDAS EJECUTADAS</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <?php echo $name_folio; ?> -->
        <!-- <?php echo $id_person; ?> -->
        <!-- <div style="padding:0px; border:solid 4px;"> -->
          <!-- <section class="container well form-horizontal secciones"><br> -->
            <table class="table table-hover table-striped table-bordered">
              <thead class="thead-light">
                <!-- <h3>MEDIDAS</h3> -->
                <tr>
                  <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">#</th>
                  <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">CATEGORÍA</th>
                  <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">TIPO</th>
                  <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">CLASIFICACIÓN</th>
                  <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">MEDIDA</th>
                  <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">INCISO</th>
                  <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA PROVISIONAL</th>
                  <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA DEFINITIVA</th>
                  <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">ESTATUS</th>
                  <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA EJECUCION</th>
                  <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">MUNICIPIO</th>
                  <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">MOTIVO</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // GET ALL MEDIDAS EJECUTADAS
                $contmedall = 0;
                $getallmedejec = "SELECT * FROM medidas WHERE id_persona = '$id_person' AND (estatus = 'EJECUTADA' OR estatus = 'CANCELADA') ORDER BY id DESC";
                $rgetallmedejec = $mysqli->query($getallmedejec);
                if ($rgetallmedejec) {
                  if ($rgetallmedejec->num_rows > 0) {
                    while ($fgetallmedejec = $rgetallmedejec ->fetch_assoc()) {
                      $contmedall = $contmedall +1;
                      $idmedida = $fgetallmedejec['id'];
                      // get motivo conclusion
                      if ($fgetallmedejec['estatus'] == 'EJECUTADA') {
                        $getconclision = "SELECT * FROM multidisciplinario_medidas WHERE id_medida = '$idmedida'";
                        $rgetconclision = $mysqli->query($getconclision);
                        $fgetconclision = $rgetconclision->fetch_assoc();
                        if ($fgetconclision['acuerdo'] == 'OTRO') {
                          $motivo = $fgetconclision['conclusionart35'];
                        }else {
                          $motivo = $fgetconclision['acuerdo'];
                        }
                      }elseif ($fgetallmedejec['estatus'] == 'CANCELADA') {
                        $motivo = $fgetallmedejec['modificacion'];
                      }
                      ?>
                      <tr>
                        <td style="text-align:center; border: 1px solid black;"><?php echo $contmedall; ?></td>
                        <td style="text-align:center; border: 1px solid black;"><?php echo $fgetallmedejec['categoria']; ?></td>
                        <td style="text-align:center; border: 1px solid black;"><?php echo $fgetallmedejec['tipo']; ?></td>
                        <td style="text-align:center; border: 1px solid black;"><?php echo $fgetallmedejec['clasificacion']; ?></td>
                        <td style="text-align:center; border: 1px solid black;"><?php echo $fgetallmedejec['medida']; ?></td>
                        <td style="text-align:center; border: 1px solid black;"><?php echo $fgetallmedejec['descripcion']; ?></td>
                        <td style="text-align:center; border: 1px solid black;"><?php echo $fgetallmedejec['date_provisional']; ?></td>
                        <td style="text-align:center; border: 1px solid black;"><?php echo $fgetallmedejec['date_definitva']; ?></td>
                        <td style="text-align:center; border: 1px solid black;"><?php echo $fgetallmedejec['estatus']; ?></td>
                        <td style="text-align:center; border: 1px solid black;"><?php echo $fgetallmedejec['date_ejecucion']; ?></td>
                        <td style="text-align:center; border: 1px solid black;"><?php echo $fgetallmedejec['ejecucion']; ?></td>
                        <td style="text-align:center; border: 1px solid black;"><?php echo $motivo; ?></td>
                      </tr>
                      <?php
                    }
                  }
                }
                ?>
              </tbody>
            </table>
          <!-- </section> -->
        <!-- </div> -->
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CERRAR</button>
        </div>
        <br>
      </div>
    </div>
  </div>
</div>
