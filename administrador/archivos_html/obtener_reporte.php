<?php
header('Content-Type: application/json');

// --- CONEXIÓN ---
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sistemafgjem";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Fallo de conexión']));
}

// --- PARÁMETROS ---
$mes = isset($_GET['mes']) ? intval($_GET['mes']) : 1;
$anio = 2026;
$fechaInicio = "$anio-" . str_pad($mes, 2, "0", STR_PAD_LEFT) . "-01";
$fechaFin = date("Y-m-t", strtotime($fechaInicio));

// --- CONSULTA 1: MOTIVOS ---
$sqlMotivos = "SELECT react_destinos_traslados.motivo, COUNT(*) AS total
               FROM react_destinos_traslados
               INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
               INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
               WHERE react_traslados.fecha BETWEEN ? AND ?
               GROUP BY react_destinos_traslados.motivo
               ORDER BY total DESC";

// --- CONSULTA 2: DESTINOS (MUNICIPIOS) ---
$sqlDestinos = "SELECT react_destinos_traslados.municipio, COUNT(*) AS total
                FROM react_destinos_traslados
                INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
                INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
                WHERE react_traslados.fecha BETWEEN ? AND ?
                GROUP BY react_destinos_traslados.municipio
                ORDER BY total DESC";

function fetchDatos($conexion, $query, $f1, $f2) {
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ss", $f1, $f2);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

$data = [
    'motivos' => fetchDatos($conn, $sqlMotivos, $fechaInicio, $fechaFin),
    'destinos' => fetchDatos($conn, $sqlDestinos, $fechaInicio, $fechaFin)
];

echo json_encode($data);

$conn->close();

?>
