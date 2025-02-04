<?php
// calculo de fechas automaticas
$anioActual = date("Y");
$mesActual = date("n");
$cantidadDias = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
// echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
$mesant = $meses[date('n')];
$mesanterior = date('n');
$cantidaddiasanterior = cal_days_in_month(CAL_GREGORIAN, $mesanterior, $anioActual);
$fecha_inicio = $anioActual."-01-01";
$fecha_anterior = $anioActual."-".$mesanterior."-".$cantidaddiasanterior;
$diamesinicio = $anioActual."-".$mesActual."-01";
$diamesfin = $anioActual."-".$mesActual."-".$cantidadDias;
$date_principio = $anioActual."-01-01";
$date_termino = $anioActual."-12-31";
////////////////////////////////////////////////////////////////////////////////
$p = "SELECT ejecucion, COUNT(*) as t FROM medidas
WHERE estatus='ejecutada' AND date_ejecucion BETWEEN '$date_principio' AND '$date_termino'
GROUP BY ejecucion
HAVING COUNT(*)>0
ORDER BY `t`  DESC";
$rp = $mysqli->query($p);
while ($fp = $rp->fetch_assoc()) {
  $clasif = $fp['ejecucion'];
  $pa = "SELECT COUNT(*) as t FROM medidas
  WHERE ejecucion = '$clasif' AND estatus='ejecutada' AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
  $rpa = $mysqli->query($pa);
  $fpa = $rpa->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $reportemensual = "SELECT COUNT(*) as t FROM medidas
  WHERE ejecucion = '$clasif' AND estatus='ejecutada' AND date_ejecucion BETWEEN '$diamesinicio' AND '$diamesfin'";
  $rreportemensual = $mysqli->query($reportemensual);
  $freportemensual = $rreportemensual->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalmunicipio = $fpa['t'] + $freportemensual['t'];
  //////////////////////////////////////////////////////////////////////////////
    echo "<tr>";
    echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo $fp['ejecucion']; echo "</td>";
    echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fpa['t']; echo "</td>";
    echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $freportemensual['t']; echo "</td>";
    echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalmunicipio; echo "</td>";
    echo "</tr>";
  }
  //////////////////////////////////////////////////////////////////////////////
  $anterior = "SELECT COUNT(*) as t FROM medidas
  WHERE estatus='ejecutada' AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
  $ranterior = $mysqli->query($anterior);
  $fanterior = $ranterior->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $mesreporte = "SELECT COUNT(*) as t FROM medidas
  WHERE estatus='ejecutada' AND date_ejecucion BETWEEN '$diamesinicio' AND '$diamesfin'";
  $rmesreporte = $mysqli->query($mesreporte);
  $fmesreporte = $rmesreporte->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalacumulado = $fanterior['t'] + $fmesreporte['t'];
  echo "<tr>";
  echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<b>TOTAL</b>"; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $fanterior['t']; echo "</b>"; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $fmesreporte['t']; echo "</b>"; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalacumulado; echo "</b>"; echo "</td>";
  echo "</tr>";
?>
