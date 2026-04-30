<?php
date_default_timezone_set('America/Mexico_City'); // Asegura tu zona horaria

$ahora = date('Y-m-d H:i:s');
$hoy = date('Y-m-d');
$fecha_limite = date('Y-m-d') . ' 21:00:00'; // Límite de las 9 PM

// Nombres de meses en español
$meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
$mes_actual_txt = $meses[(int)date('m')];
$mes_siguiente_txt = $meses[(int)date('m', strtotime('first day of next month'))];

// Lógica de rangos para el calendario
if ($ahora > $fecha_limite) {
    $min = date('Y-m-01', strtotime('first day of next month'));
    $max = date('Y-m-01', strtotime('first day of next month'));
} else {
    $min = date('Y-m-01');
    $max = date('Y-m-d');
}

// Lógica de visibilidad para los recordatorios fijos
$mostrar_abril = ($ahora <= '2026-04-30 21:00:00'); // Se oculta el 30 de abril a las 9 PM
$mostrar_mayo = ($hoy <= '2026-05-03');             // Se oculta después del 3 de mayo
?>
