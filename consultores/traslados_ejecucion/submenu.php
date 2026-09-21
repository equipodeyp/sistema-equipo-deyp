<?php
require_once '../conexion.php';
if (!isset($mysqli) || $mysqli->connect_error) {
    die("<div style='color:red;'>Error de conexión.</div>");
}
$trasladomotivo = "SELECT * FROM react_traslados_instancias";
$rtrasladomotivo = $mysqli->query($trasladomotivo);
?>
<div class="submenu-desplegable">
    <hr class="divider">
    <div style="display: flex; flex-wrap: wrap; gap: 20px; align-items: stretch; width: 100%; max-width: 1220px; margin: 0 auto; box-sizing: border-box;">

        <!-- BLOQUE IZQUIERDO: SELECT -->
        <div id="modulo-izquierdo-select" style="flex: 1; min-width: 450px; padding: 15px; background: #ffffff; border: 10px solid #cccccc; border-radius: 6px; box-sizing: border-box; display: flex; flex-direction: column; gap: 10px;">
            <div class="form-group" style="margin: 0; width: 100%;">
                <label for="select_instancia" style="font-size: 11px; font-weight: bold; color: #444; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.3px;">Motivo del Traslado</label>
                <select id="select_instancia" name="select_instancia" class="form-control" style="width: 100%;">
                    <option disabled selected value="">-- SELECCIONE UNA OPCIÓN --</option>
                    <?php
                    if ($rtrasladomotivo) {
                        while($ftrasladomotivo = $rtrasladomotivo->fetch_assoc()){
                            echo "<option value='".htmlspecialchars($ftrasladomotivo['nombre'])."'>".htmlspecialchars($ftrasladomotivo['nombre'])."</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div id="contenedor-condicional-interno" style="width: 100%;"></div>
            <div id="contenedor-select-tags" class="seccion-tags-oculta" style="width: 100%;"></div>
        </div>

        <!-- BLOQUE DERECHO: CHECKBOXES ADMINISTRATIVOS -->
        <div id="contenedor-checkboxes-administrativos" style="flex: 1.2; min-width: 450px; padding: 15px; background: #fafafa; border: 10px solid #cccccc; border-radius: 6px; box-sizing: border-box; display: flex; flex-direction: column; gap: 10px; transition: opacity 0.2s ease;">
            <label style="font-size: 11px; font-weight: bold; color: #444; margin-bottom: 2px; text-transform: uppercase; letter-spacing: 0.3px;">Diligencias Administrativas</label>
            <div style="display: flex; gap: 15px; align-items: center; justify-content: space-between; width: 100%;">
                <label class="label-chk-admin-main" style="display: flex; align-items: center; gap: 6px; cursor: pointer; font-size: 10.5px; font-weight: bold; color: #444; margin: 0; white-space: nowrap;">
                    <input type="checkbox" name="diligencia_tipo[]" value="CON_SUJETO" class="chk-tipo-admin" style="width: 16px; height: 16px; margin: 0; cursor: pointer;">
                    <span>CON SUJETO</span>
                </label>
                <label class="label-chk-admin-main" style="display: flex; align-items: center; gap: 6px; cursor: pointer; font-size: 10.5px; font-weight: bold; color: #444; margin: 0; white-space: nowrap;">
                    <input type="checkbox" name="diligencia_tipo[]" value="SIN_SUJETO" class="chk-tipo-admin" style="width: 16px; height: 16px; margin: 0; cursor: pointer;">
                    <span>SIN SUJETO</span>
                </label>
            </div>
            <div id="contenedor-sujetos-admin-final" style="width: 100%;"></div>
        </div>
    </div>
</div>
