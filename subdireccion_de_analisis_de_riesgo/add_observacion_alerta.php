<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:90%;  margin-top: 50px; margin-bottom:50px; width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                <center><h4 class="modal-title" id="myModalLabel">
                  <?php
                  if ($row['semaforo'] === 'ROJO') {
                    echo '	  <div class="alert alert-danger alert-dismissable fade in">
                                <strong style="color:#000000">¡ATENCIÓN!</strong>
                              </div> ';
                  }elseif ($row['semaforo'] === 'AMARILLO') {
                    echo '	  <div class="alert alert-warning alert-dismissable fade in">
                                <strong style="color:#000000">¡ALERTA!</strong>
                              </div> ';
                  }elseif ($row['semaforo'] === 'VERDE') {
                    echo '	  <div class="alert alert-success alert-dismissable fade in">
                                <strong style="color:#000000; text-align:center">PRECAUCIÓN!</strong>
                              </div> ';
                  }
                  ?>
                </h4></center>
                <?php
                $id_alerta = $row['id'];
                ?>
            </div>
            <form method="POST" action="guardar_observacion_alerta.php?folio=<?php echo $row['id']; ?>">
              <div class="modal-body">
			           <div class="container-fluid">
                   <div class="row">
                     <div class="alert div-title">
                       <h3 style="text-align:center">DATOS GENERALES</h3>
                     </div>
                     <div class="col-md-6 mb-3 validar">
                       <label for="FOLIOEXPEDIENTE">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
                       <input class="form-control" id="FOLIO_EXPEDIENTE" name="FOLIO_EXPEDIENTE" placeholder="" type="text" disabled value="<?php echo $row['expediente'];?>" maxlength="50">
                     </div>
                     <div class="col-md-6 mb-3 validar">
                       <label for="IDUNICO">ID PERSONA<span ></span></label>
                       <input class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" disabled value="<?php echo $row['id_unico']; ?>" maxlength="50">
                     </div>
                     <div class="col-md-6 mb-3 validar">
                       <label for="TIPOCONVENIO">TIPO DE CONVENIO<span ></span></label>
                       <input class="form-control" id="TIPO_CONVENIO" name="TIPO_CONVENIO" placeholder="" type="text" disabled value="<?php echo $row['tipo_convenio']; ?>" maxlength="50">
                     </div>
                     <div class="col-md-6 mb-3 validar">
                       <label for="FECHAINICIO">FECHA DE INICIO DEL <?php echo $row['tipo_convenio']; ?><span ></span></label>
                       <input class="form-control" id="FECHA_INICIO" name="FECHA_INICIO" placeholder="" type="date" disabled value="<?php echo $row['fecha_inicio']; ?>" maxlength="50">
                     </div>
                     <div class="col-md-6 mb-3 validar">
                       <label for="FECHATERMINO">FECHA DE TERMINO DEL <?php echo $row['tipo_convenio']; ?><span ></span></label>
                       <input class="form-control" id="FECHA_TERMINO" name="FECHA_TERMINO" placeholder="" type="date" disabled value="<?php echo $row['fecha_termino']; ?>" maxlength="50">
                     </div>
                     <div class="col-md-6 mb-3 validar">
                       <label for="DIASRESTANTES">DÍAS RESTANTES<span ></span></label>
                       <input class="form-control" id="DIAS_RESTANTES" name="DIAS_RESTANTES" placeholder="" type="text" disabled value="<?php echo $row['dias_restantes']; ?>" maxlength="50">
                     </div>
                   </div>
                   <br>
                   <div class="row">
                     <div class="alert div-title">
                       <h3 style="text-align:center">SEGUIMIENTO</h3>
                     </div>
                     <div class="col-md-6 mb-3 validar">
                       <label for="RESUELTO">¿HA SIDO RESUELTO?<span ></span></label>
                       <select class="form-control" id="SIDO_RESUELTO" name="SIDO_RESUELTO" required>
                         <option style="visibility: hidden" value="">SELECCIONE UNA OPCIÓN</option>
                         <option value="HECHO">SI</option>
                         <option value="PENDIENTE">NO</option>
                       </select>
                     </div>
                   </div>
                   <br>
                   <div class="row">
                     <div class="alert div-title">
                       <h3 style="text-align:center">OBSERVACIONES</h3>
                     </div>
                     <?php
                     $id_alerta = $row['id'];
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
                       <label for="OBSERVACIONESALERTA">OBSERVACIONES<span ></span></label>
                       <textarea id="observacion_alert" autocomplete="off" name="observacion_alert" rows="8" cols="148" placeholder=""></textarea>
                     </div>
                   </div>
                  </div>
			        </div>
              <div class="modal-footer">
                <button type="submit" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  GUARDAR</a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CERRAR</button>
              </div>
            </form>
        </div>
    </div>
</div>
