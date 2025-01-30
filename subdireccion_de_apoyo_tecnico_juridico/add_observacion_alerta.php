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
                  </div>
			        </div>
              <div class="modal-footer">                
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CERRAR</button>
              </div>
            </form>
        </div>
    </div>
</div>
