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
echo "<td style='text-align:left; border: 3px solid black; padding-left: 7px; padding-right: 4px;'>"; echo "SUJETOS INCORPORADOS"; "</td>";
echo "<td style='text-align:center; border: 3px solid black;'>"; echo $fsujencentrosresguardo['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
if ($fperpropresguardo['t'] > 0) {
  echo "<tr>";
  echo "<td style='text-align:left; border: 3px solid black; padding-left: 7px; padding-right: 4px;'>"; echo "PERSONAS PROPUESTAS"; "</td>";
  echo "<td style='text-align:center; border: 3px solid black;'>"; echo $fperpropresguardo['t']; "</td>";
  echo "</tr>";
}
////////////////////////////////////////////////////////////////////////////////
$totalsujetos = $fsujencentrosresguardo['t'] + $fperpropresguardo['t'];
echo "<tr>";
echo "<td style='text-align:right; border: 3px solid black; padding-right: 4px;'>"; echo "<b>"; echo "TOTAL DE SUJETOS"; echo "</b>"; "</td>";
echo "<td style='text-align:center; border: 3px solid black;'>"; echo "<b>"; echo $totalsujetos; echo "</b>"; "</td>";
echo "</tr>";
?>
