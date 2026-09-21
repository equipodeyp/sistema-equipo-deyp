<?php
require_once '../conexion.php';
echo '<div class="seccion-entrada-suave" style="width: 100%; margin-top: 15px; box-sizing: border-box;">';
echo '    <hr class="divider" style="margin-bottom: 12px;">';
echo '    <div style="width: 100%; max-width: 1220px; margin: 0 auto; text-align: left;">';
// echo '        <label style="font-size: 12px; font-weight: bold; color: #111; margin-bottom: 8px; display: block;">PDIS</label>';
echo '        <h4 style="font-weight: bold; color: #111; margin-bottom: 8px; display: block;">PDIS</h4>';
echo '        <div id="contenedor-checkboxes-pdi" style="display: flex; flex-wrap: wrap; gap: 12px; padding: 12px; background: #ffffff; border: 10px solid #cccccc; border-radius: 6px; max-height: 140px; overflow-y: auto; box-sizing: border-box; width: 100%;">';
$r_pdi = $mysqli->query("SELECT * FROM react_grupo_translados WHERE estatus = 'activo'");
while ($f = $r_pdi->fetch_assoc()) {
    $id_p = htmlspecialchars($f['id']);
    echo '        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-size: 12px; min-width: 180px; margin: 0;">';
    echo '            <input type="checkbox" name="pdis_seleccionados[]" value="'.$id_p.'" class="chk-pdi-elemento" style="width: 16px; height: 16px;">';
    echo '            <span>'.htmlspecialchars($f['nombre'] ?? 'PDI '.$id_p).'</span>';
    echo '        </label>';
}
echo '        </div>';
echo '    </div>';
echo '</div>';
exit;
