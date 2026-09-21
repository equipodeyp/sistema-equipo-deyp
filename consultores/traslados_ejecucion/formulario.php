<!-- Contenedor principal con el formulario de traslado unificado -->
<div class="card-container">
    <div class="title">REGISTRAR TRASLADO</div>

    <form id="form-traslado" method="POST" action="guardar_traslado.php">
        <!-- PRIMERA FILA (Siempre visible) -->
        <div class="form-row">
            <div class="form-group" style="flex: 1.2;">
                <label for="fecha_traslado">Fecha de Traslado</label>
                <input type="text" id="fecha_traslado" name="fecha_traslado" class="form-control campo-validar" placeholder="dd/mm/aaaa" required min="<?php echo $min; ?>" max="<?php echo $max; ?>">
            </div>

            <div class="form-group" style="flex: 1.8;">
                <label for="lugar_salida">Lugar de Salida</label>
                <select id="lugar_salida" name="lugar_salida" class="form-control campo-validar">
                  <option disabled selected value>SELECCIONE LUGAR</option>
                  <?php
                  $trasladomotivo = "SELECT * FROM react_traslados_lugar";
                  $rtrasladomotivo = $mysqli->query($trasladomotivo);
                  while($ftrasladomotivo = $rtrasladomotivo->fetch_assoc()){
                    echo "<option value='".$ftrasladomotivo['lugar']."'>".$ftrasladomotivo['lugar']."</option>";
                  }
                  ?>
                </select>
            </div>

            <div class="form-group" style="flex: 1.5;">
                <label>Inicio del Traslado</label>
                <div class="time-group">
                    <select name="ini_hh" id="ini_hh" class="form-control campo-validar campo-validar-final" aria-label="Hora de inicio">
                        <option value="">HH</option>
                        <?php for($i=0; $i<24; $i++): $h = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                            <option value="<?=$h?>"><?=$h?></option>
                        <?php endfor; ?>
                    </select>
                    <span class="time-separator">:</span>
                    <select name="ini_mm" id="ini_mm" class="form-control campo-validar campo-validar-final" aria-label="Minuto de inicio">
                        <option value="">MM</option>
                        <?php for($i=0; $i<60; $i+=5): $m = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                            <option value="<?=$m?>"><?=$m?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>

            <div class="form-group" style="flex: 1.5;">
                <label>Fin del Traslado</label>
                <div class="time-group">
                    <select name="fin_hh" id="fin_hh" class="form-control campo-validar campo-validar-final" aria-label="Hora de fin">
                        <option value="">HH</option>
                        <?php for($i=0; $i<24; $i++): $h = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                            <option value="<?=$h?>"><?=$h?></option>
                        <?php endfor; ?>
                    </select>
                    <span class="time-separator">:</span>
                    <select name="fin_mm" id="fin_mm" class="form-control campo-validar campo-validar-final" aria-label="Minuto de fin">
                        <option value="">MM</option>
                        <?php for($i=0; $i<60; $i+=5): $m = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                            <option value="<?=$m?>"><?=$m?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>

            <div class="form-group" style="flex: 1.2;">
                <label for="kilometros">Kilómetros Recorridos</label>
                <input type="text" id="kilometros" name="kilometros" class="form-control campo-validar" placeholder="Ej: 6.5" oninput="jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));">
            </div>
        </div>

        <!-- SEGUNDA FILA (Campos Extras dependientes de Lugar de Salida: OTRO) -->
        <div id="seccion_extra" class="extra-section">
            <hr class="divider">
            <div class="form-row">
                <div class="form-group">
                    <label for="dato_extra_1">LUGAR</label>
                    <input type="text" id="dato_extra_1" name="dato_extra_1" class="form-control campo-extra" placeholder="Ingrese Lugar">
                </div>
                <div class="form-group">
                    <label for="dato_extra_2">DOMICILIO</label>
                    <input type="text" id="dato_extra_2" name="dato_extra_2" class="form-control campo-extra" placeholder="Ingrese Domicilio">
                </div>
                <div class="form-group">
                    <label for="dato_extra_3">MUNICIPIO</label>
                    <!-- <input type="text" id="dato_extra_3" name="dato_extra_3" class="form-control campo-extra" placeholder="Detalle origen 3"> -->
                    <select id="dato_extra_3" name="dato_extra_3" class="form-control campo-extra">
                        <option value="">SELECCIONE</option>
                        <?php
                        $answermun = $mysqli->query("SELECT * FROM municipios");
                        while($m = $answermun->fetch_assoc()) { echo "<option value='".htmlspecialchars($m['nombre'])."'>".htmlspecialchars($m['nombre'])."</option>"; } ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- CONTENEDOR MAESTRO DONDE SE RENDERIZAN LOS DOS MÓDULOS CON BORDES (Submenu) -->
        <div id="contenedor-submenu"></div>

        <!-- CONTENEDOR EXCLUSIVO PARA LA LISTA DE DPIS ACUMULATIVOS AL FINAL -->
        <div id="contenedor-pdi-final" style="width: 100%;"></div>

        <!-- NUEVO CONTENEDOR MAESTRO PARA OBSERVACIONES INTERNAS -->
        <div id="contenedor-observaciones-final" style="width: 100%;"></div>

        <!-- Bloque de Acciones Centrales -->
        <div class="actions-row">
            <button type="button" id="btn-siguiente" class="btn-siguiente" disabled>Siguiente</button>
            <button type="button" id="btn-pre-finalizar" class="btn-siguiente" style="display: none;">Finalizar Registro</button>
        </div>

        <!-- VENTANA MODAL NATIVA ESTILO TABLA CORPORATIVA -->
        <div id="modal-confirmacion-traslado" class="modal-overlay">
            <div class="modal-content">
                <button type="button" id="btn-modal-close-x" class="modal-close-x" aria-label="Cerrar ventana">&times;</button>
                <div class="modal-header">CONFIRMAR REGISTRO DE TRASLADO</div>
                <div id="modal-resumen-datos" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" id="btn-modal-cancelar" class="btn-modal btn-cancelar">Cancelar</button>
                    <button type="submit" id="btn-modal-registrar" class="btn-modal btn-registrar">Registrar</button>
                </div>
            </div>
        </div>
    </form>
</div>
