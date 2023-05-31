<?php
$calidad = "SELECT calidadpersona, COUNT(*) AS t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE autoridad.fechasolicitud BETWEEN '2023-01-01' AND '2023-12-31' AND datospersonales.relacional = 'NO'
GROUP BY datospersonales.calidadpersona
HAVING COUNT(*)>0";
$rcalidad = $mysqli->query($calidad);
while ($fcalidad = $rcalidad->fetch_assoc()) {
  $namecalidad =$fcalidad['calidadpersona'];
  //////////////////////////////////////////////////////////////////////////////
  $calant = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '2023-01-01' AND '2023-04-30'";
  $rcalant = $mysqli->query($calant);
  $fcalant = $rcalant->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $calreporte = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '2023-05-01' AND '2023-05-31'";
  $rcalreporte = $mysqli->query($calreporte);
  $fcalreporte = $rcalreporte->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalcalidad = $fcalant['t'] + $fcalreporte['t'];
  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////
  echo "<tr>";
  echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo $fcalidad['calidadpersona']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fcalant['t']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fcalreporte['t']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalcalidad; echo "</td>";
  echo "</tr>";
}
////////////////////////////////////////////////////////////////////////////////
$totalanterior = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '2023-01-01' AND '2023-04-30'";
$rtotalanterior = $mysqli->query($totalanterior);
$ftotalanterior = $rtotalanterior->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalreporte = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '2023-05-01' AND '2023-05-31'";
$rtotalreporte = $mysqli->query($totalreporte);
$ftotalreporte = $rtotalreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalacumulado = $ftotalanterior['t'] + $ftotalreporte['t'];
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "TOTAL DE PERSONAS"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $ftotalanterior['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $ftotalreporte['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalacumulado; echo "</td>";
echo "</tr>";
?>
