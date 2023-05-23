<?php
////////////////////////////////////////////////////////////////////////////////
$noincorporado = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'NO INCORPORADO' AND relacional = 'NO'";
$rnoincorporado = $mysqli->query($noincorporado);
$fnoincorporado = $rnoincorporado->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalsujincor = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'";
$rtotalsujincor = $mysqli->query($totalsujincor);
$ftotalsujincor = $rtotalsujincor->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalsujetosactivos = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND determinacionincorporacion.convenio = 'FORMALIZADO' AND estatus = 'SUJETO PROTEGIDO'";
$rtotalsujetosactivos = $mysqli->query($totalsujetosactivos);
$ftotalsujetosactivos = $rtotalsujetosactivos->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$sujencentrosresguardo = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN medidas ON datospersonales.id = medidas.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus = 'EN EJECUCION'";
$rsujencentrosresguardo = $mysqli->query($sujencentrosresguardo);
$fsujencentrosresguardo = $rsujencentrosresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$desincorporado = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'DESINCORPORADO' AND relacional = 'NO'";
$rdesincorporado = $mysqli->query($desincorporado);
$fdesincorporado = $rdesincorporado->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$perpropuesta = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'PERSONA PROPUESTA' AND relacional = 'NO'";
$rperpropuesta = $mysqli->query($perpropuesta);
$fperpropuesta = $rperpropuesta->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalpersonas = $fnoincorporado['t'] + $ftotalsujetosactivos['t'] + $fdesincorporado['t'];
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo "NO INCORPORADOS AL PROGRAMA¹"; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fnoincorporado['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo "TOTAL DE SUJETOS INCORPORADOS"; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $ftotalsujincor['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo "Sujeto incorporado activo"; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $ftotalsujetosactivos['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo "Sujeto incorporado activo en resguardo"; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fsujencentrosresguardo['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo "Desincorporado del Programa²"; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fdesincorporado['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo "PERSONAS PROPUESTAS A INCORPORARSE"; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fperpropuesta['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo "TOTAL DE EXPEDIENTES"; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $totalpersonas; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

?>
