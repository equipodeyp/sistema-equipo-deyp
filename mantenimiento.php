<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header('Content-Type: application/json');

date_default_timezone_set('America/Mexico_City');

$fecha_actual = date('Y-m-d');
$hora_actual = date('H:i');

// Rango horario del mantenimiento programado para el día de hoy
if ($fecha_actual == '2026-10-09' && $hora_actual >= '12:00' && $hora_actual <= '12:59') {
    echo json_encode(["mantenimiento" => true]);
} else {
    echo json_encode(["mantenimiento" => false]);
}
exit;
?>
