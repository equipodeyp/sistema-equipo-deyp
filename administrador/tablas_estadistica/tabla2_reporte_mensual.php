<?php
////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
$incorporc = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' and fecha_analisis BETWEEN '2023-01-01' AND '2023-04-30'";
$rincorporc = $mysqli->query($incorporc);
$fincorporc = $rincorporc->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$incornoproc = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' and fecha_analisis BETWEEN '2023-01-01' AND '2023-04-30'";
$rincornoproc = $mysqli->query($incornoproc);
$fincornoproc = $rincornoproc->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$enelaboracion = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE analisis = 'EN ELABORACION' and fecha_analisis BETWEEN '2023-01-01' AND '2023-04-30'";
$renelaboracion = $mysqli->query($enelaboracion);
$fenelaboracion = $renelaboracion->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalanterior = $fincorporc['t'] + $fincornoproc['t'] + $fenelaboracion['t'];
////////////////////////conteo  de datos  de la semana para entregar reporte//////////////////////////////////////
$incorprocreporte = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' and fecha_analisis BETWEEN '2023-05-01' and '2023-05-31'";
$rincorprocreporte = $mysqli->query($incorprocreporte);
$fincorprocreporte = $rincorprocreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$incornoprocreporte = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' and fecha_analisis BETWEEN '2023-05-01' and '2023-05-31'";
$rincornoprocreporte = $mysqli->query($incornoprocreporte);
$fincornoprocreporte = $rincornoprocreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$enelaboracionreporte = "SELECT COUNT(*) as t FROM analisis_expediente
INNER JOIN expediente on analisis_expediente.folioexpediente = expediente.fol_exp
WHERE analisis_expediente.analisis = 'EN ELABORACION' and expediente.fecha_nueva BETWEEN '2023-05-01' and '2023-05-31'";
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
