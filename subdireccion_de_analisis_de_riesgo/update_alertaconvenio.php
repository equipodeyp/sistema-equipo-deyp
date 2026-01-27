<?php
// // get info medidas
// $getinfomedida = "SELECT * FROM medidas WHERE id = '$id_medida'";
// $rgetinfomedida = $mysqli->query($getinfomedida);
// $fgetinfomedida = $rgetinfomedida->fetch_assoc();
// $idpersona = $fgetinfomedida['id_persona'];
// // get info sujeto con idpersona
// $getdatospersona = "SELECT * FROM datospersonales WHERE id = '$idpersona'";
// $rgetdatospersona = $mysqli ->query($getdatospersona);
// $fgetdatospersona = $rgetdatospersona -> fetch_assoc();
// // get datos de validacion de medida
// $fol=" SELECT * FROM validar_medida WHERE id_medida='$id_medida'";
// $resultfol = $mysqli->query($fol);
// $rowfol1=$resultfol->fetch_assoc();
// $name_folio=$rowfol1['folioexpediente'];
// $validacion = $rowfol1['validar_datos'];
?>
<div class="modal fade" id="update_alerta_<?php echo $fget3dyas['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <?php
        if ($fget3dyas['semaforo'] == 'ROJO') {
          ?>
          <div class="alert alert-danger d-flex align-items-center justify-content-center m-0 w-100" role="alert">
            <i style="color:red; font-size: 40px;" class="fas fa-exclamation-triangle me-2"></i>
            <div>
              <strong style="color:#000000; font-size: 40px;">¡ATENCIÓN!</strong>
            </div>
          </div>
          <?php
        }elseif ($fget3dyas['semaforo'] == 'AMARILLO') {
          ?>
          <div class="alert alert-warning d-flex align-items-center justify-content-center m-0 w-100" role="alert">
            <i style="color:red; font-size: 40px;" class="fas fa-exclamation-triangle me-2"></i>
            <div>
              <strong style="color:#000000; font-size: 40px;">¡ATENCIÓN!</strong>
            </div>
          </div>
          <?php
        }elseif ($fget3dyas['semaforo'] == 'VERDE') {
          ?>
          <div class="alert alert-success d-flex align-items-center justify-content-center m-0 w-100" role="alert">
            <i style="color:red; font-size: 40px;" class="fas fa-exclamation-triangle me-2"></i>
            <div>
              <strong style="color:#000000; font-size: 40px;">¡ATENCIÓN!</strong>
            </div>
          </div>
          <?php
        }elseif ($fget3dyas['semaforo'] == 'MORADO') {
          ?>
          <div class="alert alert-info d-flex align-items-center justify-content-center m-0 w-100" role="alert">
            <i style="color:red; font-size: 40px;" class="fas fa-exclamation-triangle me-2"></i>
            <div>
              <strong style="color:#000000; font-size: 40px;">¡ATENCIÓN!</strong>
            </div>
          </div>
          <?php
        }
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="guardar_observacion_alerta.php?folio=<?php echo $fget3dyas['id']; ?>">
          <div style="padding:0px; border:solid 4px;">
            <section class="container well form-horizontal secciones"><br>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">DATOS GENERALES</strong>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3 validar">
                  <label for="FOLIOEXPEDIENTE">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
                  <input class="form-control" id="FOLIO_EXPEDIENTE" name="FOLIO_EXPEDIENTE" placeholder="" type="text" disabled value="<?php echo $fget3dyas['expediente'];?>" maxlength="50">
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="IDUNICO">ID PERSONA<span ></span></label>
                  <input class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" disabled value="<?php echo $fget3dyas['id_unico']; ?>" maxlength="50">
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="TIPOCONVENIO">TIPO DE CONVENIO<span ></span></label>
                  <input class="form-control" id="TIPO_CONVENIO" name="TIPO_CONVENIO" placeholder="" type="text" disabled value="<?php echo $fget3dyas['tipo_convenio']; ?>" maxlength="50">
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="FECHAINICIO">FECHA DE INICIO DEL <?php echo $fget3dyas['tipo_convenio']; ?><span ></span></label>
                  <input class="form-control" id="FECHA_INICIO" name="FECHA_INICIO" placeholder="" type="date" disabled value="<?php echo $fget3dyas['fecha_inicio']; ?>" maxlength="50">
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="FECHATERMINO">FECHA DE TERMINO DEL <?php echo $fget3dyas['tipo_convenio']; ?><span ></span></label>
                  <input class="form-control" id="FECHA_TERMINO" name="FECHA_TERMINO" placeholder="" type="date" disabled value="<?php echo $fget3dyas['fecha_termino']; ?>" maxlength="50">
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="DIASRESTANTES">DÍAS RESTANTES<span ></span></label>
                  <input class="form-control" id="DIAS_RESTANTES" name="DIAS_RESTANTES" placeholder="" type="text" disabled value="<?php echo $fget3dyas['dias_restantes']; ?>" maxlength="50">
                </div>
              </div>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">SEGUIMIENTO</strong>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3 validar">
                  <label for="RESUELTO">¿HA SIDO RESUELTO?<span ></span></label>
                  <select class="form-control" id="SIDO_RESUELTO" name="SIDO_RESUELTO" required>
                    <option style="visibility: hidden" value="">SELECCIONE UNA OPCIÓN</option>
                    <option value="HECHO">SI</option>
                    <option value="PENDIENTE">NO</option>
                  </select>
                </div>
              </div>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">OBSERVACIONES</strong>
              </div>
              <div class="row">
                <?php
                $id_alerta = $fget3dyas['id'];
                $observ_alert = "SELECT * FROM observaciones_alertas WHERE id_alerta = '$id_alerta'";
                $robserv_alert = $mysqli -> query($observ_alert);
                while ($fobserv_alert = $robserv_alert -> fetch_assoc()) {
                  $usersippsiped = $fobserv_alert['usuario'];
                  $datos_user = "SELECT * FROM usuarios WHERE usuario = '$usersippsiped'";
                  $rdatos_user = $mysqli -> query($datos_user);
                  $fdatos_user = $rdatos_user -> fetch_assoc();
                ?>
                <div class="col-md-12 mb-3 validar">
                  <!-- <label for="SIGLAS DE LA UNIDAD"><h4><b><?php echo $fobserv_alert['usuario']; echo "     ";?></b><span ><i class="fa-solid fa-user-plus"></i></span></h4></label> -->
                  <h5><b><?php echo mb_strtoupper (html_entity_decode($fdatos_user['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8"));   echo "     ";
                               echo mb_strtoupper (html_entity_decode($fdatos_user['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8"));   echo "     ";
                               echo mb_strtoupper (html_entity_decode($fdatos_user['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8"));   echo "     ";?></b><span ><i class="fa-solid fa-user-plus"></i></span></h5>
                  <!-- <h6><?php echo $diasfaltantes; ?></h6> -->
                  <h6><?php
                  date_default_timezone_set('America/Mexico_City');
                  $obtenfechaactual = date('Y-m-d H:i:s');
                  $fechaInicio = new DateTime($obtenfechaactual);
                  $obtenfecharegistro = $fobserv_alert['fecha'];
                  $fechaFin = new DateTime($obtenfecharegistro);
                  $intervalo = $fechaInicio->diff($fechaFin);
                   if ($intervalo->s > 0 && $intervalo->i === 0 && $intervalo->h === 0 && $intervalo->d === 0) {
                     if ($intervalo->s < 10) {
                       echo "Hace un momento";
                     }else {
                       echo 'Hace '.$intervalo->s . ' segundos';
                     }
                   }elseif ($intervalo->i > 0 && $intervalo->h === 0 && $intervalo->d === 0) {
                     if ($intervalo->i < 2) {
                       echo "Hace un minuto";
                     }else {
                       echo 'Hace '.$intervalo->i . ' minutos';
                     }
                   }elseif ($intervalo->h > 0 && $intervalo->d === 0) {
                     if ($intervalo->h < 2) {
                       echo "Hace una hora";
                     }else {
                       echo 'Hace '.$intervalo->h . ' horas';
                     }
                   }elseif ($intervalo->d > 0 && $intervalo->m === 0) {
                     if ($intervalo->d < 2) {
                       echo "Hace un día";
                     }else {
                       echo 'Hace '.$intervalo->d . ' días';
                     }
                   }
                   ?></h6>
                   <h5><?php echo $fobserv_alert['observacion']; ?></h5>
                  <!-- </br> -->
                </div>
                <?php
                }
                ?>
                <div class="col-md-6 mb-3 validar">
                  <!-- <label for="OBSERVACIONESALERTA">OBSERVACIONES<span ></span></label> -->
                  <textarea id="observacion_alert" name="observacion_alert" rows="3" cols="164" placeholder="" style="resize: none;"></textarea>
                </div>
              </div>
            </section>
            <div class="modal-footer d-flex justify-content-center">
              <div class="row">
                <div>
                  <button style="display: block; margin: 0 auto;" class="btn color-btn-success btn-sm" id="btnGuardar" type="submit">ACTUALIZAR</button>
                </div>
              </div>
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CANCELAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
