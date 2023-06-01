<?php
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
  WHERE procesopenal.numeroradicacion = '$namemunicipio' AND expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-04-30'";
  $ranteriormun = $mysqli->query($anteriormun);
  $fanteriormun = $ranteriormun ->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $reportemunicipio = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  expediente
  INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
  WHERE procesopenal.numeroradicacion = '$namemunicipio' AND expediente.fecha_nueva BETWEEN '2023-05-01' AND '2023-05-31'";
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
WHERE expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-04-30'";
$rtotalmunanterior = $mysqli->query($totalmunanterior);
$ftotalmunanterior = $rtotalmunanterior ->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$totalreporte = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  expediente
INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
WHERE expediente.fecha_nueva BETWEEN '2023-05-01' AND '2023-05-31'";
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
