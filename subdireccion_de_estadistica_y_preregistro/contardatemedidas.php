<?php
//medidas de asistencia
$med_asistencia = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '$fechainicial' AND '$fechafin' AND clasificacion = 'ASISTENCIA'";
$rmed_asistencia = $mysqli->query($med_asistencia);
$fmed_asistencia = $rmed_asistencia->fetch_assoc();
//medidas de resguardo
$med_resguardo = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '$fechainicial' AND '$fechafin' AND clasificacion = 'RESGUARDO'";
$rmed_resguardo = $mysqli->query($med_resguardo);
$fmed_resguardo = $rmed_resguardo->fetch_assoc();
//medidas en total
$med_total = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '$fechainicial' AND '$fechafin'";
$rmed_total = $mysqli->query($med_total);
$fmed_total = $rmed_total->fetch_assoc();
?>
