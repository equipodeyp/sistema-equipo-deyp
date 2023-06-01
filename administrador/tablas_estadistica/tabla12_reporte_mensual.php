<?php
$anioActual = date("Y");
$mesActual = date("n");
$cantidadDias = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
// echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
$mesant = $meses[date('n')-2];
$mesanterior = date('n')-1;
$cantidaddiasanterior = cal_days_in_month(CAL_GREGORIAN, $mesanterior, $anioActual);
////////////////////////////////////////////////////////////////////////////////
$p = "SELECT ejecucion, COUNT(*) as t FROM medidas
WHERE estatus='ejecutada' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31'
GROUP BY ejecucion
HAVING COUNT(*)>0
ORDER BY `t`  DESC";
$rp = $mysqli->query($p);
while ($fp = $rp->fetch_assoc()) {
  $clasif = $fp['ejecucion'];
  $pa = "SELECT COUNT(*) as t FROM medidas
  WHERE ejecucion = '$clasif' AND estatus='ejecutada' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-04-30'";
  $rpa = $mysqli->query($pa);
  $fpa = $rpa->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $reportemensual = "SELECT COUNT(*) as t FROM medidas
  WHERE ejecucion = '$clasif' AND estatus='ejecutada' AND date_ejecucion BETWEEN '2023-05-01' AND '2023-05-31'";
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
  WHERE estatus='ejecutada' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-04-30'";
  $ranterior = $mysqli->query($anterior);
  $fanterior = $ranterior->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $mesreporte = "SELECT COUNT(*) as t FROM medidas
  WHERE estatus='ejecutada' AND date_ejecucion BETWEEN '2023-05-01' AND '2023-05-31'";
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
