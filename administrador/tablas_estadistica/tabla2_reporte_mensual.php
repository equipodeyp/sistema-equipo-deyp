<?php
// calculo de fechas automaticas
$anioActual = date("Y");
$mesActual = date("n");
$cantidadDias = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
// echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
$mesant = $meses[date('n')-2];
$mesanterior = date('n')-1;
$cantidaddiasanterior = cal_days_in_month(CAL_GREGORIAN, $mesanterior, $anioActual);
echo "fecha inicio";
echo "<br>";
echo $fecha_inicio = $anioActual."-01-01";
echo "<br>";
echo "fecha anterior";
echo "<br>";
echo $fecha_anterior = $anioActual."-".$mesanterior."-".$cantidaddiasanterior;
echo "<br>";
echo "dia del mes inicial";
echo "<br>";
echo $diamesinicio = $anioActual."-".$mesActual."-01";
echo "<br>";
echo "dia del mes final";
echo "<br>";
echo $diamesfin = $anioActual."-".$mesActual."-".$cantidadDias;
////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
$incorporc = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' and fecha_analisis BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$rincorporc = $mysqli->query($incorporc);
$fincorporc = $rincorporc->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$incornoproc = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' and fecha_analisis BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$rincornoproc = $mysqli->query($incornoproc);
$fincornoproc = $rincornoproc->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$enelaboracion = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE analisis = 'EN ELABORACION' and fecha_analisis BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$renelaboracion = $mysqli->query($enelaboracion);
$fenelaboracion = $renelaboracion->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalanterior = $fincorporc['t'] + $fincornoproc['t'] + $fenelaboracion['t'];
////////////////////////conteo  de datos  de la semana para entregar reporte//////////////////////////////////////
$incorprocreporte = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' and fecha_analisis BETWEEN '$diamesinicio' and '$diamesfin'";
$rincorprocreporte = $mysqli->query($incorprocreporte);
$fincorprocreporte = $rincorprocreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$incornoprocreporte = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' and fecha_analisis BETWEEN '$diamesinicio' and '$diamesfin'";
$rincornoprocreporte = $mysqli->query($incornoprocreporte);
$fincornoprocreporte = $rincornoprocreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$enelaboracionreporte = "SELECT COUNT(*) as t FROM analisis_expediente
INNER JOIN expediente on analisis_expediente.folioexpediente = expediente.fol_exp
WHERE analisis_expediente.analisis = 'EN ELABORACION' and expediente.fecha_nueva BETWEEN '$diamesinicio' and '$diamesfin'";
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
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "INCORPORACION PROCEDENTE "; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fincorporc['t']; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fincorprocreporte['t']; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalincorproc; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "INCORPORACION NO PROCEDENTE"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fincornoproc['t']; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fincornoprocreporte['t']; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalincornoproc; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "EN ANÁLISIS PARA DETERMINAR SU INCORPORACIÓN"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fenelaboracion['t']; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fenelaboracionreporte['t']; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalenelaboracion; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<b>"; echo "TOTAL DE EXPEDIENTES DETERMINADOS"; echo "</b>"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalanterior; echo "</b>"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalreporte; echo "</b>"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalacumulado; echo "</b>"; "</td>";
echo "</tr>";
?>
