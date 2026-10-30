<?php
date_default_timezone_set('America/Mexico_City');
$ahora = date('Y-m-d H:i:s');
$hoy = date('Y-m-d');
$hora_corte = '12:00:00';
$paso_mediodia = (date('H:i:s') >= $hora_corte);

// 1. CONDICIONES DE DETECCIÓN
$primer_dia_mes_actual = date('Y-m-01');
$dia_semana_primero = (int)date('N', strtotime($primer_dia_mes_actual)); // 6 = Sábado, 7 = Domingo
$dia_semana_hoy = (int)date('N'); // 1 = Lunes, 2 = Martes...

$mes_inicio_en_fin_de_semana = ($dia_semana_primero == 6 || $dia_semana_primero == 7);

// Valores por defecto para días normales (Miércoles a Domingo)
// Por defecto se limita estrictamente a la semana en curso (Lunes a Domingo)
$min = date('Y-m-d', strtotime('monday this week'));
$max = date('Y-m-d', strtotime('sunday this week'));

// 2. APLICACIÓN DE REGLAS CON LUNES INHÁBIL
if ($mes_inicio_en_fin_de_semana) {

    if ($dia_semana_hoy == 1) {
        // TODO EL LUNES (Inhábil) -> SOLO disponible la semana pasada
        $min = date('Y-m-d', strtotime('monday last week'));
        $max = date('Y-m-d', strtotime('sunday last week'));
    }

    elseif ($dia_semana_hoy == 2) {
        // MARTES (Primer día hábil)
        if (!$paso_mediodia) {
            // Martes ANTES de las 12:00 PM -> Sigue disponible SOLO la semana pasada
            $min = date('Y-m-d', strtotime('monday last week'));
            $max = date('Y-m-d', strtotime('sunday last week'));
        } else {
            // Martes DESPUÉS de las 12:00 PM -> SOLO la semana en curso
            $min = date('Y-m-d', strtotime('monday this week'));
            $max = date('Y-m-d', strtotime('sunday this week')); // Candado para no ir más allá de esta semana
        }
    }

} else {
    // CASO NORMAL (Si el mes NO inició en fin de semana, el lunes se trabaja normal)
    if ($dia_semana_hoy == 1) {
        if (!$paso_mediodia) {
            $min = date('Y-m-d', strtotime('monday last week'));
            $max = date('Y-m-d', strtotime('sunday last week'));
        } else {
            $min = $hoy;
            $max = date('Y-m-d', strtotime('sunday this week')); // Candado para no ir más allá de esta semana
        }
    }
}

// --- Datos para la vista ---
$meses = ["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
$mes_actual_txt = $meses[(int)date('m')];






?>
