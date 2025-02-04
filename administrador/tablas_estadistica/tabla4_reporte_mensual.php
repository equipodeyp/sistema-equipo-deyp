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
$delitoprinicipal = "SELECT procesopenal.delitoprincipal, COUNT(DISTINCT procesopenal.folioexpediente) AS t FROM procesopenal
INNER JOIN expediente ON procesopenal.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '$date_principio' AND '$date_termino'
GROUP BY procesopenal.delitoprincipal
ORDER BY COUNT(DISTINCT procesopenal.folioexpediente) DESC, procesopenal.delitoprincipal ASC";
$rdelitoprinicipal = $mysqli->query($delitoprinicipal);
while ($fdelitoprinicipal = $rdelitoprinicipal->fetch_assoc()) {
  $namedelitoprincipal = $fdelitoprinicipal['delitoprincipal'];
  //////////////////////////////////////////////////////////////////////////////
  $antdelito = "SELECT COUNT(DISTINCT procesopenal.folioexpediente) AS t FROM procesopenal
  INNER JOIN expediente ON procesopenal.folioexpediente = expediente.fol_exp
  WHERE procesopenal.delitoprincipal = '$namedelitoprincipal' AND expediente.fecha_nueva BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
  $rantdelito = $mysqli->query($antdelito);
  $fantdelito = $rantdelito->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $reportedelito = "SELECT COUNT(DISTINCT procesopenal.folioexpediente) AS t FROM procesopenal
  INNER JOIN expediente ON procesopenal.folioexpediente = expediente.fol_exp
  WHERE procesopenal.delitoprincipal = '$namedelitoprincipal' AND expediente.fecha_nueva BETWEEN '$diamesinicio' AND '$diamesfin'";
  $rreportedelito = $mysqli->query($reportedelito);
  $freportedelito = $rreportedelito->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totaldelito = $fantdelito['t'] + $freportedelito['t'];
  //////////////////////////////////////////////////////////////////////////////
  echo "<tr>";
  echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo $fdelitoprinicipal['delitoprincipal']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fantdelito['t']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $freportedelito['t']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totaldelito; echo "</td>";
  echo "</tr>";
}
////////////////////////////////////////////////////////////////////////////////
$totalantdelito = "SELECT COUNT(DISTINCT procesopenal.folioexpediente) AS t FROM procesopenal
INNER JOIN expediente ON procesopenal.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$rtotalantdelito = $mysqli->query($totalantdelito);
$ftotalantdelito = $rtotalantdelito->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalreportedelito = "SELECT COUNT(DISTINCT procesopenal.folioexpediente) AS t FROM procesopenal
INNER JOIN expediente ON procesopenal.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '$diamesinicio' AND '$diamesfin'";
$rtotalreportedelito = $mysqli->query($totalreportedelito);
$ftotalreportedelito = $rtotalreportedelito->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalacumulado = $ftotalantdelito['t'] + $ftotalreportedelito['t'];
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<b>TOTAL DE EXPEDIENTES</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>";echo "<b>"; echo $ftotalantdelito['t']; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>";echo "<b>"; echo $ftotalreportedelito['t']; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>";echo "<b>"; echo $totalacumulado; echo "</b>"; echo "</td>";
echo "</tr>";
?>
