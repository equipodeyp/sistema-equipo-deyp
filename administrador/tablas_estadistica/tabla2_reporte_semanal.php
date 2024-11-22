<?php
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
// echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
$fecha_actual = date("Y-m-d");
$dateinicial = date("Y-01-01");
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
$incorporc = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' and fecha_analisis BETWEEN '$dateinicial' AND '$fecha_finsemanaanterior'";
$rincorporc = $mysqli->query($incorporc);
$fincorporc = $rincorporc->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$incornoproc = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' and fecha_analisis BETWEEN '$dateinicial' AND '$fecha_finsemanaanterior'";
$rincornoproc = $mysqli->query($incornoproc);
$fincornoproc = $rincornoproc->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$enelaboracion = "SELECT COUNT(*) as t FROM analisis_expediente
INNER JOIN expediente on analisis_expediente.folioexpediente = expediente.fol_exp
WHERE analisis_expediente.analisis = 'EN ELABORACION' and expediente.fecha_nueva BETWEEN '$dateinicial' and '$fecha_finsemanaanterior'";
$renelaboracion = $mysqli->query($enelaboracion);
$fenelaboracion = $renelaboracion->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalanterior = $fincorporc['t'] + $fincornoproc['t'] + $fenelaboracion['t'];
////////////////////////conteo  de datos  de la semana para entregar reporte//////////////////////////////////////
$incorprocreporte = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' and fecha_analisis BETWEEN '$fecha_inicio' and '$fecha_fin'";
$rincorprocreporte = $mysqli->query($incorprocreporte);
$fincorprocreporte = $rincorprocreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$incornoprocreporte = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' and fecha_analisis BETWEEN '$fecha_inicio' and '$fecha_fin'";
$rincornoprocreporte = $mysqli->query($incornoprocreporte);
$fincornoprocreporte = $rincornoprocreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$enelaboracionreporte = "SELECT COUNT(*) as t FROM analisis_expediente
INNER JOIN expediente on analisis_expediente.folioexpediente = expediente.fol_exp
WHERE analisis_expediente.analisis = 'EN ELABORACION' and expediente.fecha_nueva BETWEEN '$fecha_inicio' and '$fecha_fin'";
$renelaboracionreporte = $mysqli->query($enelaboracionreporte);
$fenelaboracionreporte = $renelaboracionreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalreporte = $fincorprocreporte['t'] + $fincornoprocreporte['t'] + $fenelaboracionreporte['t'];
////////////////totales por fila //////////////////////////////////////////////////////////////////////
$totalincorproc = $fincorporc['t'] + $fincorprocreporte['t'];
////////////////////////////////////////////////////////////////////////////////
$totalincornoproc = $fincornoproc['t'] + $fincornoprocreporte['t'];
////////////////////////////////////////////////////////////////////////////////
$totalenelaboracion = $fenelaboracion['t'] + $fenelaboracionreporte['t'];
////////////////////////////////////////////////////////////////////////////////
$totalacumulado = $totalanterior + $totalreporte;
//inicio de filas para la tabla
if ($fincorporc['t'] > 0 || $fincorprocreporte['t'] > 0) {
  echo "<tr>";
  echo "<td style='text-align:left'>"; echo "INCORPORACION PROCEDENTE "; "</td>";
  echo "<td style='text-align:center'>"; echo $fincorporc['t']; "</td>";
  echo "<td style='text-align:center'>"; echo $fincorprocreporte['t']; "</td>";
  echo "<td style='text-align:center'>"; echo $totalincorproc; "</td>";
  echo "</tr>";
}
////////////////////////////////////////////////////////////////////////////////
echo $fenelaboracion['t'];
if ($fincornoproc['t'] > 0 || $fincornoprocreporte['t'] > 0) {
  echo "<tr>";
  echo "<td style='text-align:left'>"; echo "INCORPORACION NO PROCEDENTE"; "</td>";
  echo "<td style='text-align:center'>"; echo $fincornoproc['t']; "</td>";
  echo "<td style='text-align:center'>"; echo $fincornoprocreporte['t']; "</td>";
  echo "<td style='text-align:center'>"; echo $totalincornoproc; "</td>";
  echo "</tr>";
}
////////////////////////////////////////////////////////////////////////////////
if ($fenelaboracion['t'] > 0 || $fenelaboracionreporte['t'] > 0) {
  echo "<tr>";
  echo "<td style='text-align:left'>"; echo "EN ANÁLISIS PARA DETERMINAR SU INCORPORACIÓN"; "</td>";
  echo "<td style='text-align:center'>"; echo $fenelaboracion['t']; "</td>";
  echo "<td style='text-align:center'>"; echo $fenelaboracionreporte['t']; "</td>";
  echo "<td style='text-align:center'>"; echo $totalenelaboracion; "</td>";
  echo "</tr>";
}
////////////////////////////////////////////////////////////////////////////////echo "<tr>";
echo "<td style='text-align:right'>"; echo "<b>"; echo "TOTAL DE EXPEDIENTES"; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $totalanterior; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $totalreporte; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $totalacumulado; echo "</b>"; "</td>";
echo "</tr>";
?>
