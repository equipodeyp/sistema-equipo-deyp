<?php
// calculo de fechas automaticas
$anioActual = date("Y");
$mesActual = date("n");
$cantidadDias = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
// echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
$mesant = $meses[date('n')];
$mesanterior = date('n')-1;
$cantidaddiasanterior = cal_days_in_month(CAL_GREGORIAN, $mesanterior, $anioActual);
$fecha_inicio = $anioActual."-01-01";
$fecha_anterior = $anioActual."-".$mesanterior."-".$cantidaddiasanterior;
$diamesinicio = $anioActual."-".$mesActual."-01";
$diamesfin = $anioActual."-".$mesActual."-".$cantidadDias;
$date_principio = $anioActual."-01-01";
$date_termino = $anioActual."-12-31";
////////////////////////////////////////////////////////////////////////////////
$autoridad = "SELECT autoridad.nombreautoridad, COUNT(DISTINCT autoridad.folioexpediente) AS t FROM autoridad
INNER JOIN expediente ON autoridad.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '$date_principio' AND '$date_termino'
GROUP BY autoridad.nombreautoridad
ORDER BY COUNT(DISTINCT autoridad.folioexpediente) DESC, autoridad.nombreautoridad ASC";
$rautoridad = $mysqli->query($autoridad);
while ($fautoridad = $rautoridad->fetch_assoc()) {
  $nameautoridad = $fautoridad['nombreautoridad'];
  //////////////////////////////////////////////////////////////////////////////
  $anteriorautoridad = "SELECT COUNT(DISTINCT autoridad.folioexpediente) AS t FROM autoridad
  INNER JOIN expediente ON autoridad.folioexpediente = expediente.fol_exp
  WHERE autoridad.nombreautoridad = '$nameautoridad' AND expediente.fecha_nueva BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
  $ranteriorautoridad = $mysqli->query($anteriorautoridad);
  $fanteriorautoridad = $ranteriorautoridad->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $reporteautoridad = "SELECT COUNT(DISTINCT autoridad.folioexpediente) AS t FROM autoridad
  INNER JOIN expediente ON autoridad.folioexpediente = expediente.fol_exp
  WHERE autoridad.nombreautoridad = '$nameautoridad' AND expediente.fecha_nueva BETWEEN '$diamesinicio' AND '$diamesfin'";
  $rreporteautoridad = $mysqli->query($reporteautoridad);
  $freporteautoridad = $rreporteautoridad->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalautoridad = $fanteriorautoridad['t'] + $freporteautoridad['t'];
  //////////////////////////////////////////////////////////////////////////////
  echo "<tr>";
  echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo $fautoridad['nombreautoridad']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fanteriorautoridad['t']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $freporteautoridad['t']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalautoridad; echo "</td>";
  echo "</tr>";
}
////////////////////////////////////////////////////////////////////////////////
$totalanteriorautoridad = "SELECT COUNT(DISTINCT autoridad.folioexpediente) AS t FROM autoridad
INNER JOIN expediente ON autoridad.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$rtotalanteriorautoridad = $mysqli->query($totalanteriorautoridad);
$ftotalanteriorautoridad = $rtotalanteriorautoridad->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalreporteautoridad = "SELECT COUNT(DISTINCT autoridad.folioexpediente) AS t FROM autoridad
INNER JOIN expediente ON autoridad.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '$diamesinicio' AND '$diamesfin'";
$rtotalreporteautoridad = $mysqli->query($totalreporteautoridad);
$ftotalreporteautoridad = $rtotalreporteautoridad->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalacumulado = $ftotalanteriorautoridad['t'] + $ftotalreporteautoridad['t'];
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<b>TOTAL DE EXPEDIENTES&nbsp;&nbsp;</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $ftotalanteriorautoridad['t']; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $ftotalreporteautoridad['t']; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalacumulado; echo "</b>"; echo "</td>";
echo "</tr>";
?>
