<?php
require_once '../conexion.php';
$ocultar_inputs = isset($_POST['ocultar_inputs_destino']) && $_POST['ocultar_inputs_destino'] === '1';
$answermun = $mysqli->query("SELECT * FROM municipios");
?>
<div class="seccion-entrada-suave" style="width: 100%; display: flex; flex-direction: column; gap: 10px; margin-top: 5px;">
    <?php if (!$ocultar_inputs): ?>
        <div style="width: 100%; display: flex; flex-direction: column; gap: 6px; background: #ffffff; padding: 10px; border: 1px dashed #cccccc; border-radius: 4px; box-sizing: border-box;">
            <div class="form-group"><label style="font-size: 9px;">Lugar de Destino</label><input type="text" id="lugar_destino_admin" name="lugar_destino_admin" class="form-control" style="height:32px; font-size:12px;" placeholder="Lugar" required></div>
            <div class="form-group"><label style="font-size: 9px;">Domicilio de Destino</label><input type="text" id="domicilio_destino_admin" name="domicilio_destino_admin" class="form-control" style="height:32px; font-size:12px;" placeholder="Domicilio" required></div>
            <div class="form-group"><label style="font-size: 9px;">Municipio de Destino</label>
                <select id="municipio_destino_admin" name="municipio_destino_admin" class="form-control" style="height:32px; font-size:12px; padding:4px 8px;" required>
                    <option value="">SELECCIONE</option>
                    <?php while($m = $answermun->fetch_assoc()) { echo "<option value='".htmlspecialchars($m['nombre'])."'>".htmlspecialchars($m['nombre'])."</option>"; } ?>
                </select>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-group" style="width: 100%; margin: 0;">
        <label style="font-size: 10px; font-weight: bold; color: #555; margin-bottom: 4px; display: block;">Sujetos Protegidos</label>
        <div id="contenedor-checkboxes-administrativas" style="display: flex; flex-direction: column; gap: 8px; padding: 10px; background: #ffffff; border: 10px solid #d3d3d3; border-radius: 4px; max-height: 140px; overflow-y: auto; box-sizing: border-box;">
        <?php
        $r_admin = $mysqli->query("SELECT * FROM datospersonales WHERE estatus = 'PERSONA PROPUESTA' OR estatus ='SUJETO PROTEGIDO' ORDER BY id ASC");
        while ($f = $r_admin->fetch_assoc()) {
            echo '        <label class="label-chk-folio" style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-size: 12px; margin:0;">';
            echo '            <input type="checkbox" name="sujetos_administrativos[]" value="'.htmlspecialchars($f['id']).'" class="chk-sujeto-admin" style="width: 16px; height: 16px;">';
            echo '            <span>'.htmlspecialchars($f['identificador'] ?? $f['nombre']).'</span>';
            echo '        </label>';
        }
        ?>
        </div>
    </div>
</div>
