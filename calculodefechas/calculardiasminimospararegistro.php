<?php
date_default_timezone_set('America/Mexico_City');
$ahora = date('Y-m-d H:i:s');
$hoy = date('Y-m-d');
$hora_corte = '12:00:00';
$paso_mediodia = (date('H:i:s') >= $hora_corte);

// 1. DEFINIR EL LÍMITE DEL MES (Piso absoluto)
$primer_dia_mes_actual = date('Y-m-01');
$primer_dia_mes_pasado = date('Y-m-01', strtotime('first day of last month'));

if (date('j') == 1 && !$paso_mediodia) {
    // Único caso donde se permite el mes pasado: día 1 antes de las 12:00
    $piso_mensual = $primer_dia_mes_pasado;
} else {
    // En cualquier otro momento, no se puede elegir nada anterior al día 1 de este mes
    $piso_mensual = $primer_dia_mes_actual;
}

// 2. LÓGICA SEMANAL
if (date('N') == 1) { // Es Lunes
    if ($paso_mediodia) {
        $min_semanal = $hoy;
    } else {
        // Lunes antes de las 12:00 permite la semana pasada
        $min_semanal = date('Y-m-d', strtotime('monday last week'));
    }
} else {
    // Martes a Domingo, el mínimo es el lunes de esta semana
    $min_semanal = date('Y-m-d', strtotime('monday this week'));
}

// 3. CRUCE DE REGLAS (El "Candado")
// Comparamos la regla semanal con el piso mensual.
// Si la semana pasada cae en el mes anterior, prevalece el $piso_mensual.
$min = ($min_semanal > $piso_mensual) ? $min_semanal : $piso_mensual;

$max = date('Y-m-t'); // Fin del mes actual

// --- Datos para la vista ---
$meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
$mes_actual_txt = $meses[(int)date('m')];
?>
