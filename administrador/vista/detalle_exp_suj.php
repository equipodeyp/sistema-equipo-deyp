<div  style="padding:0px; border:solid 4px;">
  <section class="container well form-horizontal secciones"><br>
    <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
      <strong style="color: #f8fdfc;">INFORMACIÓN GENERAL DEL EXPEDIENTE DE PROTECCIÓN</strong>
    </div>
    <div class="row">
      <div class="col-md-4 mb-3">
        <label for="NUM_EXPEDIENTE">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
        <input disabled class="form-control" id="NUM_EXPEDIENTE" name="NUM_EXPEDIENTE" type="text" value="<?php echo $rowfol['folioexpediente'];?>">
      </div>
      <div class="col-md-4 mb-3">
        <label for="ID_UNICO_DETALLE">ID PERSONA<span ></span></label>
        <input disabled class="form-control" id="ID_UNICO_DETALLE" name="ID_UNICO_DETALLE" type="text" value="<?php echo $rowfol['identificador']; ?>">
      </div>
      <div class="col-md-4 mb-3">
        <label for="FECHA_CAPTURA" >FECHA DE REGISTRO DE LA PERSONA PROPUESTA<span class="required"></span></label>
        <input disabled class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" type="text" value="<?php echo $rowfol['fecha_captura'];?>">
      </div>
    </div>
  </section>
</div>
