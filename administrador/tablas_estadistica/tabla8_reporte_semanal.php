<?php
////////////////////////////////////////////////////////////////////////////////
$sujencentrosresguardo = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN medidas ON datospersonales.id = medidas.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus = 'EN EJECUCION'";
$rsujencentrosresguardo = $mysqli->query($sujencentrosresguardo);
$fsujencentrosresguardo = $rsujencentrosresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$perpropresguardo = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN medidas ON datospersonales.id = medidas.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'PERSONA PROPUESTA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus = 'EN EJECUCION'";
$rperpropresguardo = $mysqli->query($perpropresguardo);
$fperpropresguardo = $rperpropresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo "SUJETOS INCORPORADOS"; "</td>";
echo "<td style='text-align:center'>"; echo $fsujencentrosresguardo['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
if ($fperpropresguardo['t'] > 0) {
  echo "<tr>";
  echo "<td style='text-align:left'>"; echo "PERSONAS PROPUESTAS"; "</td>";
  echo "<td style='text-align:center'>"; echo $fperpropresguardo['t']; "</td>";
  echo "</tr>";
}
////////////////////////////////////////////////////////////////////////////////
$totalsujetos = $fsujencentrosresguardo['t'] + $fperpropresguardo['t'];
echo "<tr>";
echo "<td style='text-align:right'>"; echo "<b>"; echo "TOTAL DE SUJETOS"; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $totalsujetos; echo "</b>"; "</td>";
echo "</tr>";
?>
