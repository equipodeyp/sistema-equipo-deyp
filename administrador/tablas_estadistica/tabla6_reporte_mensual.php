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
////////////////////////////////////////////////////////////////////////////////
$municipio = "SELECT procesopenal.numeroradicacion, COUNT(DISTINCT expediente.fol_exp) AS t FROM  expediente
INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
WHERE  expediente.año= 2023
GROUP BY procesopenal.numeroradicacion
ORDER BY  COUNT(DISTINCT expediente.fol_exp) DESC, procesopenal.numeroradicacion ASC";
$rmunicipio = $mysqli->query($municipio);
while ($fmunicipio = $rmunicipio->fetch_assoc()) {
  $namemunicipio = $fmunicipio['numeroradicacion'];
  //////////////////////////////////////////////////////////////////////////////
  $anteriormun = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  expediente
  INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
  WHERE procesopenal.numeroradicacion = '$namemunicipio' AND expediente.fecha_nueva BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
  $ranteriormun = $mysqli->query($anteriormun);
  $fanteriormun = $ranteriormun ->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $reportemunicipio = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  expediente
  INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
  WHERE procesopenal.numeroradicacion = '$namemunicipio' AND expediente.fecha_nueva BETWEEN '$diamesinicio' AND '$diamesfin'";
  $rreportemunicipio = $mysqli->query($reportemunicipio);
  $freportemunicipio = $rreportemunicipio ->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalmunicipio = $fanteriormun['t'] + $freportemunicipio['t'];
  //////////////////////////////////////////////////////////////////////////////
  echo "<tr>";
  echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo $fmunicipio['numeroradicacion']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fanteriormun['t']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $freportemunicipio['t']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalmunicipio; echo "</td>";
  echo "</tr>";
}
////////////////////////////////////////////////////////////////////////////////
$totalmunanterior = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  expediente
INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
WHERE expediente.fecha_nueva BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$rtotalmunanterior = $mysqli->query($totalmunanterior);
$ftotalmunanterior = $rtotalmunanterior ->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$totalreporte = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  expediente
INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
WHERE expediente.fecha_nueva BETWEEN '$diamesinicio' AND '$diamesfin'";
$rtotalreporte = $mysqli->query($totalreporte);
$ftotalreporte = $rtotalreporte ->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$totalacumulado = $ftotalmunanterior['t'] + $ftotalreporte['t'];
//////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<b>TOTAL DE EXPEDIENTES</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>";echo "<b>"; echo $ftotalmunanterior['t']; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>";echo "<b>"; echo $ftotalreporte['t']; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>";echo "<b>"; echo $totalacumulado; echo "</b>"; echo "</td>";
echo "</tr>";
?>
