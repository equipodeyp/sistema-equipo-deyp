<?php
require_once '../conexion.php';
$instancia = $_POST['instancia_seleccionada'] ?? '';
echo '<div class="form-group seccion-entrada-suave" style="width: 100%; text-align: left; margin: 0; display:flex; flex-direction:column; gap:10px;">';
echo '    <label style="font-size: 11px; font-weight: bold; color: #555;">Sujetos Dentro del Centro de Resguardo</label>';
echo '    <div id="contenedor-checkboxes-folios" style="display: flex; flex-direction: column; gap: 8px; padding: 10px; background: #fafafa; border: 10px solid #d3d3d3; border-radius: 4px; max-height: 140px; overflow-y: auto; box-sizing: border-box;">';
$r_tags = $mysqli->query("SELECT dp.id, dp.identificador FROM datospersonales dp WHERE dp.estatus IN ('SUJETO PROTEGIDO', 'persona propuesta') AND EXISTS ( SELECT 1 FROM medidas m WHERE m.id_persona = dp.id AND m.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND m.estatus = 'EN EJECUCION' )");
while ($f = $r_tags->fetch_assoc()) {
    echo '        <label class="label-chk-folio" style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-size: 12px; margin: 0;">';
    echo '            <input type="checkbox" name="tecnologias[]" value="'.htmlspecialchars($f['id']).'" class="chk-folio-vinculado chk-dentro" style="width: 16px; height: 16px;">';
    echo '            <span>'.htmlspecialchars($f['identificador']).'</span>';
    echo '        </label>';
}
echo '    </div>';

if ($instancia !== 'VISITA FAMILIAR') {
    echo '    <div id="wrapper-chk-fuera" style="margin-top: 4px; opacity: 0.5;">';
    echo '        <label style="display: flex; align-items: center; gap: 8px; font-size: 11px; font-weight: bold; color: #444; margin: 0; cursor:not-allowed;">';
    echo '            <input type="checkbox" id="chk-habilitar-fuera" style="width: 16px; height: 16px;" disabled>';
    echo '            <span>Agregar sujeto fuera del centro de resguardo</span>';
    echo '        </label>';
    echo '    </div>';
    echo '    <div id="bloque-sujetos-fuera" class="extra-section">';
    echo '        <label style="margin-bottom: 6px; display: block; font-size: 11px; font-weight: bold; color:#555;">Sujetos Fuera del Centro de Resguardo</label>';
    echo '        <div id="contenedor-checkboxes-fuera" style="display: flex; flex-direction: column; gap: 8px; padding: 10px; background: #ffffff; border: 10px solid #d3d3d3; border-radius: 4px; max-height: 140px; overflow-y: auto; box-sizing: border-box;">';
    $r_fuera = $mysqli->query("SELECT dp.id, dp.identificador
FROM datospersonales dp
WHERE dp.estatus IN ('SUJETO PROTEGIDO', 'PERSONA PROPUESTA')
  AND NOT EXISTS (
    SELECT 1
    FROM medidas m
    WHERE m.id_persona = dp.id
      AND m.medida = 'VIII. ALOJAMIENTO TEMPORAL'
      AND m.estatus = 'EN EJECUCION'
)");
    while ($f = $r_fuera->fetch_assoc()) {
        echo '        <label class="label-chk-folio" style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-size: 12px; margin: 0;">';
        echo '            <input type="checkbox" name="tecnologias[]" value="'.htmlspecialchars($f['id']).'" class="chk-folio-vinculado chk-fuera" style="width: 16px; height: 16px;">';
        echo '            <span>'.htmlspecialchars($f['identificador']).'</span>';
        echo '        </label>';
    }
    echo '        </div>';
    echo '    </div>';
}
echo '    <div id="mensaje-limite-folios" style="font-size: 11px; font-weight: bold; min-height: 15px;"></div>';
echo '</div>';
exit;
