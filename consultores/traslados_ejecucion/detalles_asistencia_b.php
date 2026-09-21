<?php
require_once '../conexion.php';
if (isset($_POST['obtener_detalles_cita'])) {
    $id_asistencia = $mysqli->real_escape_string($_POST['id_asistencia']);
    $r = $mysqli->query("SELECT * FROM cita_asistencia WHERE id_asistencia = '$id_asistencia' LIMIT 1");
    if ($r && $f = $r->fetch_assoc()) {
        echo '<div class="bloque-tres-inputs seccion-entrada-suave" style="margin: 8px 0 8px 15px; padding-left: 10px; border-left: 2px solid #007bff; display: flex; flex-direction: column; gap: 6px;">';
        echo '    <div class="form-group"><label style="font-size:9px;">Folio Expediente</label><input type="text" class="form-control" style="height:30px; font-size:12px;" value="'.htmlspecialchars($f['folio_expediente'] ?? '').'" readonly></div>';
        echo '    <div class="form-group"><label style="font-size:9px;">ID Sujeto</label><input type="text" class="form-control" style="height:30px; font-size:12px;" value="'.htmlspecialchars($f['id_sujeto'] ?? '').'" readonly></div>';
        echo '</div>';
    }
    exit;
}
