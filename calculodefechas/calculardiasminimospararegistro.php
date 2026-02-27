<?php
////////////////////////////////////////////////////////////////////////////////
$dias_mes_actual = date('t');
// Obtenemos la fecha actual del sistema
// Fecha actual del servidor
$fecha_actual = date('Y-m-d');
$fecha_limite = '2026-03-03';

// Si hoy es mayor al 3 de marzo de 2026
if ($fecha_actual > $fecha_limite) {
    // Bloqueamos meses atrás: el mínimo ahora es 1 de Marzo de 2026
    $min = "2026-03-01";
    $max = "2026-03-31"; // Sin límite superior (o el que tú decidas)
} else {
    // Si aún es 3 de marzo o antes, febrero sigue abierto
    // Ponemos el mínimo en 1 de febrero de 2026
    $min = "2026-02-01";
    if ($fecha_actual > '2026-02-28') {
      $max = $fecha_actual; // Límite máximo hasta la fecha de control
    }else {
      $max = '2026-02-28'; // Límite máximo hasta la fecha de control
    }
}
?>
