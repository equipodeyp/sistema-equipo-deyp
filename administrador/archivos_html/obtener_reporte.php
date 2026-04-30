<?php
header('Content-Type: application/json');
try {
    $conn = new mysqli("localhost", "root", "", "sistemafgjem");
    $mes = intval($_GET['mes']);
    $f1 = "2026-" . str_pad($mes, 2, "0", STR_PAD_LEFT) . "-01";
    $f2 = date("Y-m-t", strtotime($f1));

    function q($conn, $sql, $f1, $f2) {
        $st = $conn->prepare($sql);
        $st->bind_param("ss", $f1, $f2);
        $st->execute();
        return $st->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    $s1 = "SELECT m.motivo, COUNT(*) as total FROM react_destinos_traslados m JOIN react_sujetos_traslado s ON m.id = s.id_destino JOIN react_traslados t ON m.id_traslado = t.id WHERE t.fecha BETWEEN ? AND ? GROUP BY m.motivo ORDER BY total DESC";
    $s2 = "SELECT m.municipio, COUNT(*) as total FROM react_destinos_traslados m JOIN react_sujetos_traslado s ON m.id = s.id_destino JOIN react_traslados t ON m.id_traslado = t.id WHERE t.fecha BETWEEN ? AND ? GROUP BY m.municipio ORDER BY total DESC";
    $s3 = "SELECT react_sujetos_traslado.resguardado, COUNT(*) AS total
                    FROM react_sujetos_traslado
                    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                    INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
                    WHERE react_traslados.fecha BETWEEN ? AND ?
                    GROUP BY react_sujetos_traslado.resguardado
                    ORDER BY total DESC";
    $s4 = "SELECT datospersonales.identificador, COUNT(*) AS total
    FROM react_sujetos_traslado
    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
    INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
    WHERE react_traslados.fecha BETWEEN ? AND ?
    GROUP BY datospersonales.identificador
    ORDER BY total DESC";

    echo json_encode([
        'motivos' => q($conn, $s1, $f1, $f2),
        'destinos' => q($conn, $s2, $f1, $f2),
        'estancia' => q($conn, $s3, $f1, $f2),
        'sujetos' => q($conn, $s4, $f1, $f2)
    ]);
} catch (Exception $e) { echo json_encode(['error' => $e->getMessage()]); }

?>
