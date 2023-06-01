<?php
$delitoprinicipal = "SELECT procesopenal.delitoprincipal, COUNT(DISTINCT procesopenal.folioexpediente) AS t FROM procesopenal
INNER JOIN expediente ON procesopenal.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-12-31'
GROUP BY procesopenal.delitoprincipal
ORDER BY COUNT(DISTINCT procesopenal.folioexpediente) DESC, procesopenal.delitoprincipal ASC";
$rdelitoprinicipal = $mysqli->query($delitoprinicipal);
while ($fdelitoprinicipal = $rdelitoprinicipal->fetch_assoc()) {
  $namedelitoprincipal = $fdelitoprinicipal['delitoprincipal'];
  //////////////////////////////////////////////////////////////////////////////
  $antdelito = "SELECT COUNT(DISTINCT procesopenal.folioexpediente) AS t FROM procesopenal
  INNER JOIN expediente ON procesopenal.folioexpediente = expediente.fol_exp
  WHERE procesopenal.delitoprincipal = '$namedelitoprincipal' AND expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-04-30'";
  $rantdelito = $mysqli->query($antdelito);
  $fantdelito = $rantdelito->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $reportedelito = "SELECT COUNT(DISTINCT procesopenal.folioexpediente) AS t FROM procesopenal
  INNER JOIN expediente ON procesopenal.folioexpediente = expediente.fol_exp
  WHERE procesopenal.delitoprincipal = '$namedelitoprincipal' AND expediente.fecha_nueva BETWEEN '2023-05-01' AND '2023-05-31'";
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
WHERE expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-04-30'";
$rtotalantdelito = $mysqli->query($totalantdelito);
$ftotalantdelito = $rtotalantdelito->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalreportedelito = "SELECT COUNT(DISTINCT procesopenal.folioexpediente) AS t FROM procesopenal
INNER JOIN expediente ON procesopenal.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2023-05-01' AND '2023-05-31'";
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
