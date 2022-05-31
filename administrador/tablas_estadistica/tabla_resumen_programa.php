<?php
$exp = "SELECT COUNT(*) as t FROM expediente";
$rexp = $mysqli->query($exp);
$fexp = $rexp->fetch_assoc();
//
$suj = "SELECT COUNT(*) as t from determinacionincorporacion WHERE  convenio = 'formalizado'";
$rsuj = $mysqli->query($suj);
$fsuj = $rsuj->fetch_assoc();
//
$sujact = "SELECT COUNT(*) as t from datospersonales WHERE estatus = 'sujeto protegido' AND relacional = 'NO'";
$rsujact = $mysqli->query($sujact);
$fsujact = $rsujact->fetch_assoc();
//
$sujresg  = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN medidas on datospersonales.id = medidas.id_persona
where medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus = 'en ejecucion'";
$rsujresg = $mysqli->query($sujresg);
$fsujresg = $rsujresg->fetch_assoc();
//
$meds = "SELECT COUNT(*) as t FROM medidas";
$rmeds = $mysqli->query($meds);
$fmeds = $rmeds->fetch_assoc();
//
echo "<tr bgcolor='cyan'>";
echo "<td style='text-align:center'>"; echo 'EXPEDIENTES INICIADOS'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fexp['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor='chartreuse'>";
echo "<td style='text-align:center'>"; echo 'SUJETOS INCORPORADOS'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fsuj['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor='cyan'>";
echo "<td style='text-align:center'>"; echo 'SUJETOS PROTEGIDOS ACTIVOS'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fsujact['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor='greenyellow'>";
echo "<td style='text-align:center'>"; echo 'SUJETOS EN RESGUARDO'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fsujresg['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor='cyan'>";
echo "<td style='text-align:center'>"; echo 'MEDIDAS DICTAMINADAS'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fmeds['t']; echo "</td>";
echo "</tr>";
?>
