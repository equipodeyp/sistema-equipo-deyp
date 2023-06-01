<?php
$autoridad = "SELECT autoridad.nombreautoridad, COUNT(DISTINCT autoridad.folioexpediente) AS t FROM autoridad
INNER JOIN expediente ON autoridad.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-12-31'
GROUP BY autoridad.nombreautoridad
ORDER BY COUNT(DISTINCT autoridad.folioexpediente) DESC, autoridad.nombreautoridad ASC";
$rautoridad = $mysqli->query($autoridad);
while ($fautoridad = $rautoridad->fetch_assoc()) {
  $nameautoridad = $fautoridad['nombreautoridad'];
  //////////////////////////////////////////////////////////////////////////////
  $anteriorautoridad = "SELECT COUNT(DISTINCT autoridad.folioexpediente) AS t FROM autoridad
  INNER JOIN expediente ON autoridad.folioexpediente = expediente.fol_exp
  WHERE autoridad.nombreautoridad = '$nameautoridad' AND expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-04-30'";
  $ranteriorautoridad = $mysqli->query($anteriorautoridad);
  $fanteriorautoridad = $ranteriorautoridad->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $reporteautoridad = "SELECT COUNT(DISTINCT autoridad.folioexpediente) AS t FROM autoridad
  INNER JOIN expediente ON autoridad.folioexpediente = expediente.fol_exp
  WHERE autoridad.nombreautoridad = '$nameautoridad' AND expediente.fecha_nueva BETWEEN '2023-05-01' AND '2023-05-31'";
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
WHERE expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-04-30'";
$rtotalanteriorautoridad = $mysqli->query($totalanteriorautoridad);
$ftotalanteriorautoridad = $rtotalanteriorautoridad->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalreporteautoridad = "SELECT COUNT(DISTINCT autoridad.folioexpediente) AS t FROM autoridad
INNER JOIN expediente ON autoridad.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2023-05-01' AND '2023-05-31'";
$rtotalreporteautoridad = $mysqli->query($totalreporteautoridad);
$ftotalreporteautoridad = $rtotalreporteautoridad->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalacumulado = $ftotalanteriorautoridad['t'] + $ftotalreporteautoridad['t'];
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<b>TOTAL DE EXPEDIENTES</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $ftotalanteriorautoridad['t']; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $ftotalreporteautoridad['t']; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalacumulado; echo "</b>"; echo "</td>";
echo "</tr>";
?>
