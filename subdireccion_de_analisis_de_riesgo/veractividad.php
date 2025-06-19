<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:60%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <!-- <center><h4 class="modal-title" id="myModalLabel">DETALLES DE LA ACTIVIDAD</h4></center> -->
      </div>

      
      <div class="modal-body">
        <div class="container-fluid">
          <form class="" action="" method="post">

<div id="boton_print">

            <div class="">
              <img style="float: left;" src="../image/FGJEM.png" width="50" height="50">
              <img style="float: right;" src="../image/ESCUDO.png" width="60" height="50">
              <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
             
              <!-- <h5 style="text-align:center; color: #030303;">Sistema Informatico del Programa de Proteccón de Sujetos que Intervienen en el Procedimiento Penal o de Extinción de Dominio (SIPPSIPPED).</h5> -->

              <!-- <h3 style="text-align:center; color: #030303;">REGISTRO DE ACTIVIDADES</h3> -->
            </div>

            <div id="cabecera">
              <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                <h3 style="text-align:center; color: #ddd;">DETALLE DEL REGISTRO DE ACTIVIDADES</h3>
              </div>
            </div>



            <div class="well form-horizontal">
              <?php
              $idactividad = $row['id'];
              // echo $idactividad;
              $traeractividad = "SELECT * FROM react_actividad WHERE id = '$idactividad' AND id_subdireccion = 1";
              $rtraeractividad = $mysqli->query($traeractividad);
              $ftraeractividad = $rtraeractividad->fetch_assoc();
              // variables para traer datos de tablas
              // echo "<br>";
              $idsub_em = $ftraeractividad['id_subdireccion'];
              // echo "<br>";
              $idactivity = $ftraeractividad['id_actividad'];
              // echo "<br>";
              // traer nombre de la subdireccion
              $subdir = "SELECT * FROM react_subdireccion WHERE id = 1";
              $rsubdir = $mysqli->query($subdir);
              $fsubdir = $rsubdir->fetch_assoc();
              // traer nombre de la actividad
              $acttraer = "SELECT * FROM react_actividad_analisis WHERE id = '$idactivity'";
              $racttraer = $mysqli->query($acttraer);
              $facttraer = $racttraer->fetch_assoc();
              // echo $facttraer['nombre'];

              ?>
              <div class="row">
                <!-- SUBDIRECCIÓN -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">SUBDIRECCIÓN:</label>
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $fsubdir['subdireccion'];; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- ID ACTIVIDAD -->
                <!-- <div class="form-group">
                  <label for="" class="col-md-4 control-label">ID ACTIVIDAD:</label>
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['idactividad'];; ?>" readonly>
                    </div>
                  </div>
                </div> -->
                <!-- NOMBRE ACTIVIDAD -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">NOMBRE ACTIVIDAD:</label>
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <!-- <span class="input-group-addon"><i class=""></i></span> -->
                      <input style="width: 700px; height: 30px;" type="text" class="form-control"  id="" name="actividad" placeholder="" value="<?php echo $facttraer['nombre']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- FUNCIÓN -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">FUNCIÓN:</label>
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <!-- <span class="input-group-addon"><i class=""></i></span> -->
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['funcion']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- CLASIFICACIÓN -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">CLASIFICACIÓN:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <!-- <span class="input-group-addon"><i class=""></i></span> -->
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['clasificacion']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- FECHA ACTIVIDAD -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">FECHA ACTIVIDAD:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                    <?php
                      $originalDate = $ftraeractividad['fecha'];
                      $f = date("d/m/Y", strtotime($originalDate));
                    ?>
                      <!-- <span class="input-group-addon"><i class=""></i></span> -->
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $f; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- CANTIDAD -->
                <div class="form-group">
                  <label for=""class="col-md-4 control-label">CANTIDAD:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <!-- <span class="input-group-addon"><i class=""></i></span> -->
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['cantidad']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- UNIDAD DE MEDIDA -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">UNIDAD DE MEDIDA:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <!-- <span class="input-group-addon"><i class=""></i></span> -->
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['unidad_medida']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- EVIDENCIA INTERNA -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">EVIDENCIA INTERNA:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <!-- <span class="input-group-addon"><i class=""></i></span> -->
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['evidencia_interna']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- NUMERO EVIDENCIA -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">NÚMERO DE EVIDENCIA:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <!-- <span class="input-group-addon"><i class=""></i></span> -->
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['id_evidencia']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- FOLIO EXPEDIENTE -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">FOLIO EXPEDIENTE:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <!-- <span class="input-group-addon"><i class=""></i></span> -->
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['folio_expediente']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- ID SUJETO -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">ID SUJETO:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <!-- <span class="input-group-addon"><i class=""></i></span> -->
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['id_sujeto']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- REPORTE DE METAS -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">REPORTE DE METAS:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <!-- <span class="input-group-addon"><i class=""></i></span> -->
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['reporte_metas']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- INFORME ANUAL -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">INFORME ANUAL:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <!-- <span class="input-group-addon"><i class=""></i></span> -->
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['informe_anual']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- OBSERVACIONES -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">OBSERVACIONES:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <!-- <span class="input-group-addon"><i class=""></i></span> -->
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['observaciones']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- HORA REGISTRO -->
                <!-- <div class="form-group">
                  <label for="" class="col-md-4 control-label">HORA REGISTRO:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['hora_alta']; ?>" readonly>
                    </div>
                  </div>
                </div> -->
                <!-- USUARIO REGISTRO -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">SERVIDOR PÚBLICO:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $ftraeractividad['usuario']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <!-- FECHA REGISTRO -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">FECHA Y HORA DE REGISTRO:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                    <?php
                      $originalDate = $ftraeractividad['fecha_alta'];
                      $fech = date("d/m/Y", strtotime($originalDate));
                    ?>
                      
                      <input style="width: 700px; height: 30px;" name="" type="text" class="form-control"  id="" name="" placeholder="" value="<?php echo $fech; ?>" readonly>
                    </div>
                  </div>
                </div>


              </div>
            </div>

</div>

            <div class="modal-footer">
              <center>
                <button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>  CERRAR</button>
                <!-- <a type="button" class="btn btn-primary" href="javascript:imprimirSeleccion('boton_print')"><span class="glyphicon glyphicon-print"></span>  IMPRIMIR</a> -->
                <a type="button" class="btn btn-primary" href="generarpdfdetalleactividad.php?idactividad=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-print"></span>  IMPRIMIR</a>
              </center>
            </div>
          </form>
        </div>
      </div>


    </div>
  </div>
</div>





<script language="Javascript">
function imprimirSeleccion(nombre) {
var ficha = document.getElementById(nombre);
var ventimp = window.open(' ', 'popimpr');
ventimp.document.write( ficha.innerHTML );
ventimp.document.close();
ventimp.print( );
ventimp.close();
}
</script>