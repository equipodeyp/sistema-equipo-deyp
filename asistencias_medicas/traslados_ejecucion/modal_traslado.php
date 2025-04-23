<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $ftraslados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:90%;  margin-top: 50px; margin-bottom:50px; width:63%">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

                <?php
                echo $idtrasladover = $ftraslados['id'];
                // traer datos del traslado
                $trasunico = "SELECT * FROM react_traslados WHERE id = '$idtrasladover'";
                $rtrasunico = $mysqli->query($trasunico);
                $ftrasunico = $rtrasunico->fetch_assoc();
                ?>
            </div>
            <form >
              <div class="modal-body">
                <div class="container">
                  <div class="well form-horizontal">
                    <div class="">
                      <img style="float: left;" src="../../image/FGJEM.png" width="50" height="50">
                      <img style="float: right;" src="../../image/ESCUDO.png" width="60" height="50">
                      <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
                    </div>
                    <div class="row">
                      <br>
                      <div class="cabecera">
                        <div id="cabecera">
                          <h2 style="text-align:center">TRASLADO: <?php echo $ftrasunico['idtrasladounico']; ?></h2>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <!-- <button type="submit" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  GUARDAR</a> -->
                <button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CERRAR</button>
              </div>
            </form>
        </div>
    </div>
</div>
