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
$fecha_inicio = $anioActual."-01-01";
$fecha_anterior = $anioActual."-".$mesanterior."-".$cantidaddiasanterior;
$diamesinicio = $anioActual."-".$mesActual."-01";
$diamesfin = $anioActual."-".$mesActual."-".$cantidadDias;
////////////////////////////////////////////////////////////////////////////////
$anterirordefinitiva = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'DEFINITIVA' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$ranterirordefinitiva = $mysqli->query($anterirordefinitiva);
$fanterirordefinitiva = $ranterirordefinitiva->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$anterirorprovisionales = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'PROVISIONAL' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$ranterirorprovisionales = $mysqli->query($anterirorprovisionales);
$fanterirorprovisionales = $ranterirorprovisionales->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$reportedefinitiva = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'DEFINITIVA' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$diamesinicio' AND '$diamesfin'";
$rreportedefinitiva = $mysqli->query($reportedefinitiva);
$freportedefinitiva = $rreportedefinitiva->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$reporteprovisionales = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'PROVISIONAL' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$diamesinicio' AND '$diamesfin'";
$rreporteprovisionales = $mysqli->query($reporteprovisionales);
$freporteprovisionales = $rreporteprovisionales->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$antdefasistencia = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'DEFINITIVA' AND clasificacion= 'ASISTENCIA' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$rantdefasistencia = $mysqli->query($antdefasistencia);
$fantdefasistencia = $rantdefasistencia->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$antprovasistencia = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'PROVISIONAL' AND clasificacion= 'ASISTENCIA' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$rantprovasistencia = $mysqli->query($antprovasistencia);
$fantprovasistencia = $rantprovasistencia->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$repdefasistencia = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'DEFINITIVA' AND clasificacion= 'ASISTENCIA' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$diamesinicio' AND '$diamesfin'";
$rrepdefasistencia = $mysqli->query($repdefasistencia);
$frepdefasistencia = $rrepdefasistencia->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$repprovasistencia = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'PROVISIONAL' AND clasificacion= 'ASISTENCIA' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$diamesinicio' AND '$diamesfin'";
$rrepprovasistencia = $mysqli->query($repprovasistencia);
$frepprovasistencia = $rrepprovasistencia->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$antdefresguardo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'DEFINITIVA' AND clasificacion= 'RESGUARDO' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$rantdefresguardo = $mysqli->query($antdefresguardo);
$fantdefresguardo = $rantdefresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$antprovresguardo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'PROVISIONAL' AND clasificacion= 'RESGUARDO' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$rantprovresguardo = $mysqli->query($antprovresguardo);
$fantprovresguardo = $rantprovresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$repdefresguardo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'DEFINITIVA' AND clasificacion= 'RESGUARDO' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$diamesinicio' AND '$diamesfin'";
$rrepdefresguardo = $mysqli->query($repdefresguardo);
$frepdefresguardo = $rrepdefresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$repprovresguardo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'PROVISIONAL' AND clasificacion= 'RESGUARDO' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$diamesinicio' AND '$diamesfin'";
$rrepprovresguardo = $mysqli->query($repprovresguardo);
$frepprovresguardo = $rrepprovresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totaldefinitiva = $fanterirordefinitiva['t'] + $freportedefinitiva['t'];
////////////////////////////////////////////////////////////////////////////////
$totaldefasistencia = $fantdefasistencia['t'] + $frepdefasistencia['t'];
////////////////////////////////////////////////////////////////////////////////
$totaldefresguardo = $fantdefresguardo['t'] + $frepdefresguardo['t'];
////////////////////////////////////////////////////////////////////////////////
$totalprovisional = $fanterirorprovisionales['t'] + $freporteprovisionales['t'];
////////////////////////////////////////////////////////////////////////////////
$totalprovasistencia = $fantprovasistencia['t'] + $frepprovasistencia['t'];
////////////////////////////////////////////////////////////////////////////////
$totalprovresguardo = $fantprovresguardo['t'] + $frepprovresguardo['t'];
////////////////////////////////////////////////////////////////////////////////
$totalanterior = $fanterirordefinitiva['t'] + $fanterirorprovisionales['t'];
////////////////////////////////////////////////////////////////////////////////
$totalreporte = $freportedefinitiva['t'] + $freporteprovisionales['t'];
////////////////////////////////////////////////////////////////////////////////
$totalacumulado = $totalanterior + $totalreporte;
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='width: 430px; text-align:left'>"; echo "<b>DEFINITIVAS (SUJETOS INCORPORADOS)</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fanterirordefinitiva['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $freportedefinitiva['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totaldefinitiva; echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<em>MEDIDAS DE ASISTENCIA</em>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fantdefasistencia['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $frepdefasistencia['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totaldefasistencia; echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<em>MEDIDAS DE RESGUARDO</em>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fantdefresguardo['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $frepdefresguardo['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totaldefresguardo; echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='text-align:left'>"; echo "<b>PROVISIONALES (PERSONAS PROPUESTAS)</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fanterirorprovisionales['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $freporteprovisionales['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalprovisional; echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<em>MEDIDAS DE ASISTENCIA</em>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fantprovasistencia['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $frepprovasistencia['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalprovasistencia; echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<em>MEDIDAS DE RESGUARDO</em>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fantprovresguardo['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $frepprovresguardo['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalprovresguardo; echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='text-align:right'>"; echo "<b>TOTAL DE MEDIDAS</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalanterior; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalreporte; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalacumulado; echo "</b>"; echo "</td>";
echo "</tr>";
?>
