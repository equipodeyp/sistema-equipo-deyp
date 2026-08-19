<?php
date_default_timezone_set("America/Mexico_City");
include("conexion.php");
session_start();

if (!isset($_SESSION['usuario'])) {
    exit("No autorizado");
}

$url_base_web = 'http://localhost/pruebas/sistema-equipo-deypv1.2/';
$fecha_inicio = $_GET['fecha_inicio'] ?? '';
$fecha_fin = $_GET['fecha_fin'] ?? '';
$imagenes = [];

if (!empty($fecha_inicio) && !empty($fecha_fin)) {
    $sql = "SELECT react_image_actividad.ruta, react_image_actividad.image, react_actividad.fecha
            FROM `react_actividad`
            INNER JOIN react_image_actividad ON react_actividad.id = react_image_actividad.id_Actividad
            WHERE react_actividad.fecha BETWEEN ? AND ?
              AND react_actividad.id_subdireccion = 4
              AND react_actividad.id_actividad = 7
            ORDER BY react_actividad.fecha DESC";

    if ($stmt = $mysqli->prepare($sql)) {
        $ini_full = $fecha_inicio . ' 00:00:00';
        $fin_full = $fecha_fin . ' 23:59:59';
        $stmt->bind_param("ss", $ini_full, $fin_full);
        $stmt->execute();
        $res_query = $stmt->get_result();
        while ($r = $res_query->fetch_assoc()) {
            $imagenes[] = $r;
        }
        $stmt->close();
    }
}

include("resultados_rutas.php");
?>
