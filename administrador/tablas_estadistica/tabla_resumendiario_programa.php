<?php
$exp = "SELECT COUNT(*) as t FROM expediente";
$rexp = $mysqli->query($exp);
$fexp = $rexp->fetch_assoc();
//
$sujtts = "SELECT COUNT(*) as t from datospersonales WHERE relacional = 'NO'";
$rsujtts = $mysqli->query($sujtts);
$fsujtts = $rsujtts->fetch_assoc();
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
$medidastts = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA'";
$rmedidastts = $mysqli->query($medidastts);
$fmedidastts = $rmedidastts->fetch_assoc();
//
echo "<tr bgcolor='cyan'>";
echo "<td style='text-align:center'>"; echo 'expedientes iniciados'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fexp['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor='chartreuse'>";
echo "<td style='text-align:center'>"; echo 'Personas que solicitaron incorporarse al Programa'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fsujtts['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor='yellow'>";
echo "<td style='text-align:center'>"; echo 'sujetos incorporados'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fsuj['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor='cyan'>";
echo "<td style='text-align:center'>"; echo 'sujetos protegidos activos'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fsujact['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor='greenyellow'>";
echo "<td style='text-align:center'>"; echo 'sujetos en resguardo'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fsujresg['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor='yellow'>";
echo "<td style='text-align:center'>"; echo 'Medidas de apoyo dictaminadas'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fmeds['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor='cyan'>";
echo "<td style='text-align:center'>"; echo 'Medidas de apoyo ejecutadas'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fmedidastts['t']; echo "</td>";
echo "</tr>";
?>
