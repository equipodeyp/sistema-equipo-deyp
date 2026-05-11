<div class="modal fade" id="addsujtraslado_<?php echo $fgetdesoftras['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:90%;  margin-top: 50px; margin-bottom:50px; width:60%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h1 class="modal-title" id="myModalLabel">PERSONA PROPUESTA O SUJETO PROTEGIDO</h1></center>
      </div>
      <?php
      $iddestraslado = $fgetdesoftras['id'];
      // echo "<br>";
      // obtener datos del destino
      $getdes = "SELECT * FROM react_destinos_traslados WHERE id = '$iddestraslado'";
      $rgetdes = $mysqli -> query($getdes);
      $fgetdes = $rgetdes ->fetch_assoc();
      $valmotivo = $fgetdes['motivo'];
      $año_actual = date('Y');
      $mes_actual = date('m');
      $dias_mes_actual = date('t');
      // echo "<br>";
      $datemin = $año_actual.'-'.$mes_actual.'-01';
      // echo "<br>";
      $datemax = $año_actual.'-'.$mes_actual.'-'.$dias_mes_actual;
      // echo "<br>";
      ?>

      <div class="modal-body">
        <div class="container-fluid">
          <form action="savesujtrs.php?id_traslado=<?php echo $iddestraslado;?>" method="post">
            <div id="contenedor-personas">
              <div class="persona-form">
                <div class="modal-footer">
                  <div class=" well form-horizontal">
                    <div class="row">
                      <!-- select de expediente -->
                      <div class="col-md-2" style="text-align: center; width: 300px; border: 1px solid #ECECEC;">
                        <label class="col-md-2 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">EXPEDIENTE</label>
                        <!-- <input name="lugarsalida" placeholder="INGRESE LUGAR" class="form-control" type="text" required> -->
                        <select class="form-control expediente" name="nombre" required>
                          <option disabled selected value="">SELECCIONE EL EXPEDIENTE</option>
                          <?php
                          $select1 = "SELECT DISTINCT folioexpediente FROM statusseguimiento
                          WHERE (status = 'EN EJECUCION' OR status = 'ANALISIS')
                          OR (status = 'CONCLUIDO' AND (date_desincorporacion BETWEEN '$datemin' AND '$datemax'))";
                          $answer1 = $mysqli->query($select1);
                          while($valores1 = $answer1->fetch_assoc()){
                            $result_folio = $valores1['folioexpediente'];
                            echo "<option value='$result_folio'>$result_folio</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <!-- select de expediente -->
                      <div class="col-md-2" style="text-align: center; width: 300px; border: 1px solid #ECECEC;">
                        <label class="col-md-2 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">ID DE LA PP O SP</label>
                        <!-- <input name="lugarsalida" placeholder="INGRESE LUGAR" class="form-control" type="text" required> -->
                        <select class="form-control id-sujeto" name="id_sujeto" required id="getidusj" onchange="getper(this)">
                          <option disabled selected value="">SELECCIONE EL ID DEL SUJETO</option>
                        </select>
                      </div>
                      <!-- select de expediente -->
                      <div class="col-md-2" style="text-align: center; width: 280px; border: 1px solid #ECECEC;">
                        <label class="col-md-2 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">EN ESTADIA</label>
                        <!-- <input name="lugarsalida" placeholder="INGRESE LUGAR" class="form-control" type="text" required> -->
                        <select class="form-control en-resguardo" name="resguardo">
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div style="text-align: center;">
                <button type="submit" name="editar" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  GUARDAR</a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

  $(document).ready(function(){
    var maxPersonas = 3;
    var contadorPersonas = 1;

    // Manejar cambio en select de expediente
    $(document).on('change', '.expediente', function(){
      var $this = $(this);
      var expediente = $this.val();
      var $idSujetoSelect = $this.closest('.persona-form').find('.id-sujeto');

      $.ajax({
        url: 'get_id_sujeto.php',
        type: 'POST',
        data: {expediente: expediente},
        success: function(response){
          $idSujetoSelect.html(response);
        }
      });
    });

    //Manejar cambio en select de expediente
    $(document).on('change', '.id-sujeto', function(){
      var $this = $(this);
      var idsujeto = $this.val();
      var $idSujetoSelect = $this.closest('.persona-form').find('.en-resguardo');

      $.ajax({
        url: 'get_if_en_resguardo.php',
        type: 'POST',
        data: {idsujeto: idsujeto},
        success: function(response){
          $idSujetoSelect.html(response);
        }
      });
    });


  });
</script>
