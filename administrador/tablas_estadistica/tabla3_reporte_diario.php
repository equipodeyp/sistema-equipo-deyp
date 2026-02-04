<?php
////////////////////////////////////////////////////////////////////////////////
$totalsujetosactivos = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND determinacionincorporacion.convenio = 'FORMALIZADO' AND estatus = 'SUJETO PROTEGIDO'";
$rtotalsujetosactivos = $mysqli->query($totalsujetosactivos);
$ftotalsujetosactivos = $rtotalsujetosactivos->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$noincorporado = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'NO INCORPORADO' AND relacional = 'NO'";
$rnoincorporado = $mysqli->query($noincorporado);
$fnoincorporado = $rnoincorporado->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$desincorporado = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'DESINCORPORADO' AND relacional = 'NO'";
$rdesincorporado = $mysqli->query($desincorporado);
$fdesincorporado = $rdesincorporado->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$perpropuesta = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'PERSONA PROPUESTA' AND relacional = 'NO'";
$rperpropuesta = $mysqli->query($perpropuesta);
$fperpropuesta = $rperpropuesta->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$sujsuspendidotem = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'SUSPENDIDO TEMPORALMENTE' AND relacional = 'NO'";
$rsujsuspendidotem = $mysqli->query($sujsuspendidotem);
$fsujsuspendidotem = $rsujsuspendidotem->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalpersonas = $fnoincorporado['t'] + $ftotalsujetosactivos['t'] + $fdesincorporado['t'] + $fperpropuesta['t'] + $fsujsuspendidotem['t'];

echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'SUJETOS INCORPORADOS ACTIVOS'; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotalsujetosactivos['t']; echo "</td>";
echo "</tr>";


echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'NO INCORPORADO AL PROGRAMA ¹'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fnoincorporado['t']; echo "</td>";
echo "</tr>";


echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'DESINCORPORADO DEL PROGRAMA ²'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdesincorporado['t']; echo "</td>";
echo "</tr>";


echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'PERSONA PROPUESTA A INCORPORARSE'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fperpropuesta['t']; echo "</td>";
echo "</tr>";

echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'SUJETOS SUSPENDIDOS TEMPORALMENTE'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fperpropuesta['t']; echo "</td>";
echo "</tr>";

echo "<tr bgcolor=''>";
echo "<td style='text-align:right'>"; echo 'TOTAL DE PERSONAS'; echo "</td>";
echo "<td style='text-align:center'>"; echo $totalpersonas; echo "</td>";
echo "</tr>";
?>
