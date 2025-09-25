<div class="modal fade" id="eliminar_<?php echo $fgetdesoftras['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:90%;  margin-top: 50px; margin-bottom:50px; width:30%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h1 class="modal-title" id="myModalLabel">ELIMINAR DESTINO</h1></center>
        <img src="../../image/delete3.png" alt="" width="150" height="150">
      </div>
      <?php
      $iddestraslado = $fgetdesoftras['id'];
      ?>
      <div class="modal-body">
        <div class="container-fluid">
          <form action="delete_destinotraslado.php?id=<?php echo $iddestraslado;?>" method="post">
            <center><h1 class="modal-title" id="myModalLabel">ESTA SEGURO DE ELIMINAR EL DESTINO</h1></center>
            <div class="modal-footer">
              <div style="text-align: center;">
                <button type="submit" name="editar" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  ELIMINAR</a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
