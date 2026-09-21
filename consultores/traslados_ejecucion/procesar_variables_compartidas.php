<?php
/**
 * Extensión modular encargada de calcular traslados compartidos,
 * estructurar arreglos por bloques (IZQ/DER) e inyectar variables $compartidoX.
 */
if (!isset($mysqli)) {
    die("Acceso directo denegado.");
}

$tecnologias_vinc   = $_POST['tecnologias'] ?? [];
$sujetos_admin      = $_POST['sujetos_administrativos'] ?? [];
$asistencias_vinc   = $_POST['asistencia_seleccionada'] ?? [];

$es_compartido    = "NO";
$nombres_sujetos  = [];
$nombres_admin_sujetos = [];
$variables_compartidas_reporte = [];

// 1. Evaluar la sumatoria global de personas (Límite máximo de 4 marcas)
if ($instancia_traslado === 'ASISTENCIA MEDICA') {
    $total_personas_pantalla = count($asistencias_vinc);
} else {
    $total_personas_pantalla = count($tecnologias_vinc) + count($sujetos_admin);
}

if ($total_personas_pantalla >= 2) {
    $es_compartido = "COMPARTIDO";
}

// =========================================================================
// 🚨 NUEVA SECCIÓN: ESTRUCTURACIÓN DE BLOQUES INDEPENDIENTES (IZQ / DER)
// =========================================================================

// --- A. VARIABLE MAESTRA PARA EL BLOQUE IZQUIERDO (CLÍNICO O CLÁSICO) ---
$bloque_izquierdo_data = [
    'instancia_nombre' => $instancia_traslado,
    'detalle_motivo'   => $detalle_instancia,
    'sujetos_ids'      => []
];

if ($instancia_traslado === 'ASISTENCIA MEDICA') {
    if (!empty($asistencias_vinc)) {
        $bloque_izquierdo_data['sujetos_ids'] = array_map('intval', $asistencias_vinc);
    }
} else {
    if (!empty($tecnologias_vinc)) {
        $bloque_izquierdo_data['sujetos_ids'] = array_map('intval', $tecnologias_vinc);
    }
}

// --- B. VARIABLE MAESTRA PARA EL BLOQUE DERECHO (ADMINISTRATIVO) ---
$diligencia_tipo   = $_POST['diligencia_tipo'] ?? [];
$tipo_admin_texto  = !empty($diligencia_tipo) ? implode(', ', $diligencia_tipo) : '';

$bloque_derecho_data = [
    'instancia_nombre' => $tipo_admin_texto,
    'sujetos_ids'      => []
];

if (!empty($sujetos_admin)) {
    $bloque_derecho_data['sujetos_ids'] = array_map('intval', $sujetos_admin);
}

// Registrar de forma explícita las variables en el contenedor $GLOBALS para compartirlas
$GLOBALS['bloque_izquierdo_data'] = $bloque_izquierdo_data;
$GLOBALS['bloque_derecho_data']   = $bloque_derecho_data;

// =========================================================================
// 🔍 IMPRESIÓN DE DEPURACIÓN EN TEXTO PLANO CON SALTO DE LÍNEA <BR>
// =========================================================================
// echo "--- DEPURACIÓN DE BLOQUES DE DATOS SEPARADOS ---<br>";
// echo "DATOS DEL BLOQUE IZQUIERDO:<br>";
// echo "Instancia Origen: " . $bloque_izquierdo_data['instancia_nombre'] . "<br>";
// echo "Detalle / Motivo: " . ($bloque_izquierdo_data['detalle_motivo'] ?: 'N/A') . "<br>";
// echo "IDs de Sujetos de la Izquierda: " . (!empty($bloque_izquierdo_data['sujetos_ids']) ? implode(', ', $bloque_izquierdo_data['sujetos_ids']) : 'Ninguno seleccionado') . "<br>";
// echo "<br>";
// echo "DATOS DEL BLOQUE DERECHO / ADMINISTRATIVO:<br>";
// echo "Diligencia Elegida: " . ($bloque_derecho_data['instancia_nombre'] ?: 'Ninguna seleccionada') . "<br>";
// echo "IDs de Sujetos de la Derecha: " . (!empty($bloque_derecho_data['sujetos_ids']) ? implode(', ', $bloque_derecho_data['sujetos_ids']) : 'Ninguno seleccionado') . "<br>";
// echo "------------------------------------------------<br>";

// =========================================================================
// 2. PROCESAMIENTO EXCLUSIVO PARA VARIABLES ENUMERADAS EN CADENA
// =========================================================================
if ($instancia_traslado === 'ASISTENCIA MEDICA') {
    if (!empty($asistencias_vinc)) {
        for ($i = 0; $i < count($asistencias_vinc); $i++) {
            $id_asistencia_actual = $mysqli->real_escape_string($asistencias_vinc[$i]);
            $folio_exp_actual = $mysqli->real_escape_string($_POST['folio_expediente'][$id_asistencia_actual] ?? '');
            $id_sujeto_actual = $mysqli->real_escape_string($_POST['id_sujeto'][$id_asistencia_actual] ?? '');

            $indice_secuencial = $i + 1;
            $nombre_variable_dinamica = "compartido" . $indice_secuencial;

            $GLOBALS[$nombre_variable_dinamica] = [
                'id_asistencia'    => $id_asistencia_actual,
                'folio_expediente' => $folio_exp_actual,
                'id_sujeto'        => $id_sujeto_actual,
                'tipo'             => $es_compartido . $indice_secuencial
            ];
        }
    }
} else {
    $lista_sujetos_unificada = [];
    foreach ($tecnologias_vinc as $id_izq) {
        $lista_sujetos_unificada[] = ['id' => intval($id_izq), 'bloque' => 'IZQUIERDO'];
    }
    foreach ($sujetos_admin as $id_der) {
        $lista_sujetos_unificada[] = ['id' => intval($id_der), 'bloque' => 'ADMINISTRATIVO'];
    }

    if (!empty($lista_sujetos_unificada)) {
        $GLOBALS['asistencias_vinc'] = [];

        for ($i = 0; $i < count($lista_sujetos_unificada); $i++) {
            $id_sujeto_db = $lista_sujetos_unificada[$i]['id'];
            $procedencia  = $lista_sujetos_unificada[$i]['bloque'];

            $indice_secuencial = $i + 1;
            $nombre_variable_dinamica = "compartido" . $indice_secuencial;

            $identificador_real = "Desconocido";
            $query_sujeto = $mysqli->query("SELECT identificador FROM datospersonales WHERE id = $id_sujeto_db LIMIT 1");
            if ($query_sujeto && $row = $query_sujeto->fetch_assoc()) {
                $identificador_real = $row['identificador'];
            }

            if ($procedencia === 'IZQUIERDO') {
                $GLOBALS['nombres_sujetos'][] = $identificador_real;
            } else {
                $GLOBALS['nombres_admin_sujetos'][] = $identificador_real;
            }

            $GLOBALS[$nombre_variable_dinamica] = [
                'id_asistencia'    => 'N/A',
                'folio_expediente' => ($procedencia === 'IZQUIERDO') ? 'Folio Izq ('.$instancia_traslado.')' : 'Diligencia Administrativa',
                'id_sujeto'        => $identificador_real,
                'tipo'             => $es_compartido . $indice_secuencial
            ];

            $GLOBALS['asistencias_vinc'][] = $id_sujeto_db;
        }
    }
}
?>
