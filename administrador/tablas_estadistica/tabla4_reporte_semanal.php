<?php
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
// echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
$fecha_actual = date("Y-m-d");
$day = date("l");
switch ($day) {
    case "Sunday":
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 6 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_actual);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Monday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 5 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Tuesday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 4 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Wednesday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 3 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Thursday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 2 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Friday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 6 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 1 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Saturday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 6 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 7 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 0 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
}
// echo $fecha_fin;
////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
$medejecucionasistencia = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EN EJECUCION' AND clasificacion = 'ASISTENCIA'";
$rmedejecucionasistencia = $mysqli->query($medejecucionasistencia);
$fmedejecucionasistencia = $rmedejecucionasistencia->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$medejecucionresguardo = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EN EJECUCION' AND clasificacion = 'RESGUARDO'";
$rmedejecucionresguardo = $mysqli->query($medejecucionresguardo);
$fmedejecucionresguardo = $rmedejecucionresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalejecucion = $fmedejecucionasistencia['t'] + $fmedejecucionresguardo['t'];
////////////////////////////////////////////////////////////////////////////////
$medejecutadasasistencia = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA' AND clasificacion = 'ASISTENCIA'
AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin'";
$rmedejecutadasasistencia = $mysqli->query($medejecutadasasistencia);
$fmedejecutadasasistencia = $rmedejecutadasasistencia->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$medejecutadasresguardo = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA' AND clasificacion = 'RESGUARDO'
AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin'";
$rmedejecutadasresguardo = $mysqli->query($medejecutadasresguardo);
$fmedejecutadasresguardo = $rmedejecutadasresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalejecutadas = $fmedejecutadasasistencia['t'] + $fmedejecutadasresguardo['t'];
////////////////////////////////////////////////////////////////////////////////
$medcanceladasasistencia = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'CANCELADA' AND clasificacion = 'ASISTENCIA'
AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin'";
$rmedcanceladasasistencia = $mysqli->query($medcanceladasasistencia);
$fmedcanceladasasistencia = $rmedcanceladasasistencia->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$medicanceladasresguardo = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'CANCELADA' AND clasificacion = 'RESGUARDO'
AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin'";
$rmedicanceladasresguardo = $mysqli->query($medicanceladasresguardo);
$fmedicanceladasresguardo = $rmedicanceladasresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalcanceladas = $fmedcanceladasasistencia['t'] + $fmedicanceladasresguardo['t'];
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo 'MEDIDAS DE ASISTENCIA'; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fmedejecucionasistencia['t']; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fmedejecutadasasistencia['t']; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fmedcanceladasasistencia['t']; "</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='text-align:left'>"; echo "MEDIDAS DE RESGUARDO "; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fmedejecucionresguardo['t']; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fmedejecutadasresguardo['t']; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fmedicanceladasresguardo['t']; "</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='text-align:left'>"; echo "TOTAL DE MEDIDAS"; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $totalejecucion; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $totalejecutadas; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $totalcanceladas; "</td>";
echo "</tr>";
?>
