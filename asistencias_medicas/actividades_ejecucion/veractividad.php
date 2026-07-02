<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px; width:70%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form class="" action="" method="post">
            <div id="boton_print">
            <div class="">
              <img style="float: left;" src="../../image/FGJEM.png" width="50" height="50">
              <img style="float: right;" src="../../image/ESCUDO.png" width="60" height="50">
              <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
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
              $traeractividad = "SELECT * FROM react_actividad WHERE id = '$idactividad' AND id_subdireccion = 4";
              $rtraeractividad = $mysqli->query($traeractividad);
              $ftraeractividad = $rtraeractividad->fetch_assoc();
              // variables para traer datos de tablas
              $idsub_em = $ftraeractividad['id_subdireccion'];
              $idactivity = $ftraeractividad['id_actividad'];
              $idsujprot = $ftraeractividad['id_sujeto'];
              $getidunicosuj = "SELECT * FROM datospersonales WHERE id = '$idsujprot'";
              $rgetidunicosuj = $mysqli->query($getidunicosuj);
              $fgetidunicosuj = $rgetidunicosuj ->fetch_assoc();
              $fgetidunicosuj['identificador'];
              $mystring = $fgetidunicosuj['identificador'];
              $findme   = '-';
              $pos = strpos($mystring, $findme);
              if ($pos !== false){
                $identunico = substr($mystring, 0, $pos);
              }
              // traer nombre de la subdireccion
              $subdir = "SELECT * FROM react_subdireccion WHERE id = 4";
              $rsubdir = $mysqli->query($subdir);
              $fsubdir = $rsubdir->fetch_assoc();
              // traer nombre de la actividad
              $acttraer = "SELECT * FROM react_actividad_ejecucion WHERE id = '$idactivity'";
              $racttraer = $mysqli->query($acttraer);
              $facttraer = $racttraer->fetch_assoc();
              // echo $facttraer['nombre'];
              $getimage = "SELECT * FROM react_image_actividad WHERE id_actividad = '$idactividad'";
              $rgetimage = $mysqli->query($getimage);
              $fgetimage = $rgetimage -> fetch_assoc();
              ?>
              <div class="row">
                <!-- SUBDIRECCIÓN -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">SUBDIRECCIÓN:</label>
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" name="" rows="8" cols="80" disabled><?php echo $fsubdir['subdireccion']; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- FUNCIÓN -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">FUNCIÓN:</label>
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" name="" rows="8" cols="80" disabled><?php echo $ftraeractividad['funcion']; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- nombre de actividad -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">ACTIVIDAD:</label>
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 55px; resize: none" name="" rows="3" cols="80" disabled><?php echo $facttraer['nombre']; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- CLASIFICACIÓN -->
                <?php
                include('getnameclasificacion.php');
                if ($idactivity === '3') {
                ?>
                <div class="form-group" id="showclasif">
                  <label for="" class="col-md-4 control-label">CLASIFICACIÓN:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $nombre_clasificacion; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php } ?>
                <!-- UNIDAD DE MEDIDA -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">UNIDAD DE MEDIDA:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['unidad_medida']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                if ($idactivity !== '7' && $idactivity !== '8') {
                ?>
                <!-- CANTIDAD -->
                <div class="form-group">
                  <label for=""class="col-md-4 control-label">CANTIDAD:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['cantidad']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                }
                if (in_array($idactivity, ['3', '6', '8'], true)) {
                ?>
                <!-- INFORME ANUAL -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">INFORME ANUAL:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['informe_anual']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                }
                if (in_array($idactivity, ['6'], true)) {
                ?>
                <!-- REPORTE DE METAS -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">REPORTE DE METAS:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['reporte_metas']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                }
                ?>
                <!-- FECHA ACTIVIDAD -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">FECHA ACTIVIDAD:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <?php
                        $originalDate = $ftraeractividad['fecha'];
                        $f = date("d/m/Y", strtotime($originalDate));
                      ?>
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $f; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- ENTIDAD/MUNICIPIO -->
                <?php
                if (in_array($idactivity, ['6'], true)) {
                ?>
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">ENTIDAD/MUNICIPIO:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['entidad_municipio']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                }
                if (in_array($idactivity, ['2', '3'], true)) {
                ?>
                <!-- EVIDENCIA INTERNA -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">EVIDENCIA INTERNA:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['evidencia_interna']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                }
                if (in_array($idactivity, ['2', '7', '8'], true)) {
                ?>
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">MEDIO DE NOTIFICACION:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['id_evidencia']; ?></textarea>
                    </div>
                  </div>
                </div>
                <?php
                }

                ?>
                <!-- FOLIO EXPEDIENTE -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">FOLIO EXPEDIENTE:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['folio_expediente']; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- ID SUJETO -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">ID SUJETO:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $identunico; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- OBSERVACIONES -->
                <div class="form-group">
                  <label for="" class="col-md-4 control-label">OBSERVACIONES:</label>
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <textarea style="width: 800px; height: 28px; resize: none" disabled name="" rows="8" cols="80"><?php echo $ftraeractividad['observaciones']; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- image -->
                <?php
                if (in_array($idactivity, ['6', '7'], true)) {
                ?>
                <h1 style="text-align:center;">EVIDENCIA:</h1>
                <!-- Agregamos justify-content: center para centrar los elementos hijos -->

                <div class="input-group" style="display: flex; flex-direction: row; justify-content: center; gap: 10px; flex-wrap: wrap; width: 100%;">

    <!-- Estilos CSS para el carrusel y efectos hover -->
    <style>
      .carrusel-evidencias {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 15px;
        flex-wrap: nowrap;
        overflow-x: auto;
        width: 100%;
        padding: 20px 0; /* Espacio para que el efecto de agrandar no se corte */
        scroll-snap-type: x mandatory; /* Efecto carrusel magnético */
        scroll-behavior: smooth;
      }

      /* Oculta la barra de scroll en navegadores modernos */
      .carrusel-evidencias::-webkit-scrollbar {
        height: 6px;
      }
      .carrusel-evidencias::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 4px;
      }

      .img-evidencia {
        width: 380px;
        height: 350px;
        object-fit: cover;
        flex-shrink: 0;
        scroll-snap-align: center; /* Alinea la foto al centro al hacer scroll */
        border-radius: 8px; /* Bordes redondeados estéticos */
        box-shadow: 0 4px 10px rgba(0,0,0,0.1); /* Sombra suave inicial */
        transition: transform 0.3s ease, box-shadow 0.3s ease, filter 0.3s ease;
        cursor: pointer;
        opacity: 0.85; /* Un poco opaca por defecto para resaltar el hover */
      }

      /* Efecto cuando pasas el mouse por encima */
      .img-evidencia:hover {
        transform: scale(1.45); /* Agranda la imagen un 5% */
        box-shadow: 0 10px 20px rgba(0,0,0,0.25); /* Sombra más profunda */
        opacity: 1; /* Brillo completo */
        z-index: 10; /* Asegura que se superponga correctamente */
      }
    </style>

    <!-- Contenedor del carrusel -->
    <div class="carrusel-evidencias input-group">

      <?php
      $getimage = "SELECT * FROM react_image_actividad WHERE id_actividad = '$idactividad'";
      $rgetimage = $mysqli->query($getimage);
      $contadorimage = 1;

      while ($fgetimage = $rgetimage->fetch_assoc()) {
        if ($fgetimage['tipo'] === 'image/png' || $fgetimage['tipo'] === 'image/jpeg') {
          ?>
          <img id="evidencia_<?php echo $contadorimage; ?>"
               class="img-evidencia"
               src="<?php echo $fgetimage['ruta']; ?>"
               alt="Evidencia <?php echo $contadorimage; ?>">
          <?php
          $contadorimage++;
        }
      }
      ?>

    </div>

                <?php
                }
                ?>
              </div>
            </div>
          </div>
            <div class="modal-footer">
              <center>
                <button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>  CERRAR</button>
                <!-- <form class="" action="generarpdfdetalleactividad.php" method="post">
                  <input type="text" name="" value="<?php echo $row['id']; ?>" style="display:none">
                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>  IMPRIMIR</button> -->
                  <a type="button" class="btn btn-primary" href="generarpdfdetalleactividad.php?idactividad=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-print"></span>  IMPRIMIR</a>
                <!-- </form> -->
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
