<?php
// 1. INCLUYE TU ARCHIVO DE CONEXIÓN AQUÍ
require_once '../conexion.php';
if (!isset($mysqli) || $mysqli->connect_error) { die(""); }

if (isset($_POST['evaluar_instancia'])) {
    $instancia = $_POST['instancia_seleccionada'] ?? '';
    $fecha_traslado = $_POST['fecha_traslado'] ?? '';

    if ($instancia === 'ASISTENCIA MEDICA') {
        $fechatrs = $mysqli->real_escape_string($fecha_traslado);

        // CORRECCIÓN: Se usa SELECT * para que MySQL extraiga dinámicamente los campos acoplados del triple JOIN sin importar en qué tabla residan
        $consulta_asistencia = "SELECT * FROM cita_asistencia
                                INNER JOIN solicitud_asistencia ON cita_asistencia.id_asistencia = solicitud_asistencia.id_asistencia
                                INNER JOIN agendar_asistencia ON cita_asistencia.id_asistencia = agendar_asistencia.id_asistencia
                                WHERE cita_asistencia.fecha_asistencia = '$fechatrs'
                                AND solicitud_asistencia.etapa != 'CANCELADA'";

        $r_asistencia = $mysqli->query($consulta_asistencia);

        echo '<div style="display: flex; flex-direction: column; gap: 15px; width: 100%;">';
        if ($r_asistencia && $r_asistencia->num_rows > 0) {
            $contador = 1;
            while ($f_asistencia = $r_asistencia->fetch_assoc()) {
                $id_as = htmlspecialchars($f_asistencia['id_asistencia']);
                // Recuperar de forma segura del arreglo asociativo mapeado por el servidor
                $folio_exp = htmlspecialchars($f_asistencia['folio_expediente'] ?? '');
                $id_suj = htmlspecialchars($f_asistencia['id_sujeto'] ?? '');

                echo '<div class="contenedor-registro-asistencia" style="width: 100%; border-bottom: 10px solid #eee; padding-bottom: 12px; margin-bottom: 5px; box-sizing: border-box;">';
                echo '  <label style="font-size:10px; font-weight:bold; color:#444;">Resultado Asistencia ' . $contador . '</label>';
                echo '  <div style="display: flex; align-items: center; gap: 10px; margin-top: 4px;">';
                echo '      <input type="text" class="form-control" value="ID: '.$id_as.' - '.htmlspecialchars($f_asistencia['tipo_requerimiento']).'" readonly style="flex:1;">';
                echo '      <input type="checkbox" name="asistencia_seleccionada[]" value="'.$id_as.'" class="chk-asistencia" style="width:18px; height:18px; cursor:pointer; margin:0;">';
                echo '  </div>';

                // Los inputs de datos viajan ya nacidos aquí abajo de forma fija en el mismo bloque HTML
                echo '  <div class="bloque-tres-inputs" style="display: flex; flex-direction: column; gap: 6px; width: 100%; margin-top: 8px; padding-left: 12px; border-left: 2px solid #007bff; box-sizing: border-box;">';
                echo '      <div class="form-group" style="margin:0;"><label style="font-size:9px; color:#666; margin-bottom:2px;">Folio Expediente</label><input type="text" class="form-control" name="folio_expediente['.$id_as.']" value="'.$folio_exp.'" readonly style="height:30px; font-size:12px;"></div>';
                echo '      <div class="form-group" style="margin:0;"><label style="font-size:9px; color:#666; margin-bottom:2px;">ID Sujeto</label><input type="text" class="form-control" name="id_sujeto['.$id_as.']" value="'.$id_suj.'" readonly style="height:30px; font-size:12px;"></div>';
                echo '  </div>';
                echo '</div>';

                $contador++;
            }
        } else {
            echo '<input type="text" class="form-control" value="No se encontraron citas para esta fecha" readonly required>';
        }
        echo '</div>';
        exit;
    } else {
        // Flujo tradicional de otras instancias operativas (Visita Familiar, Custodia, etc.)
        $relaciones = ["VISITA FAMILIAR" => "react_traslados_mot_visfam", "DILIGENCIA MINISTERIAL" => "react_traslados_mot_dilmin", "DILIGENCIA JUDICIAL" => "react_traslados_mot_diljud", "CUSTODIA POLICIAL" => "react_traslados_mot_cuspol"];
        $tabla = $relaciones[$instancia] ?? '';
        echo '<div style="width: 100%;">';
        echo '    <label for="select_dependiente_detalle">Seleccione Destino</label>';
        echo '    <select id="select_dependiente_detalle" name="select_dependiente_detalle" class="form-control" required>';
        echo '        <option disabled selected value>SELECCIONE LUGAR</option>';
        if (!empty($tabla)) {
            $r_otra = $mysqli->query("SELECT * FROM " . $tabla);
            while ($f_otra = $r_otra->fetch_assoc()) {
                echo "<option value='".htmlspecialchars($f_otra['lugar'])."'>".htmlspecialchars($f_otra['lugar'])."</option>";
            }
        }
        // echo '        <option value="OTRO">OTRO</option>';
        echo '    </select>';
        echo '    <div id="contenedor-destino-otro-ajax" style="width: 100%;"></div>';
        echo '</div>';
        exit;
    }
}
