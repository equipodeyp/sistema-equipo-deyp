<?php
$exp = "SELECT COUNT(*) as t FROM expediente";
$rexp = $mysqli->query($exp);
$fexp = $rexp->fetch_assoc();
//
$sujtts = "SELECT COUNT(*) as t from datospersonales WHERE relacional = 'NO'";
$rsujtts = $mysqli->query($sujtts);
$fsujtts = $rsujtts->fetch_assoc();
//
$suj = "SELECT COUNT(*) as t from determinacionincorporacion
INNER JOIN datospersonales ON datospersonales.id = determinacionincorporacion.id_persona
WHERE  convenio = 'formalizado' AND datospersonales.relacional = 'NO'";
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
echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'EXPEDIENTES INICIADOS'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fexp['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fsujtts['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'SUJETOS INCORPORADOS'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fsuj['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'SUJETOS PROTEGIDOS ACTIVOS'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fsujact['t']; echo "</td>";
echo "</tr>";
//
// echo "<tr bgcolor=''>";
// echo "<td style='text-align:left'>"; echo 'SUJETOS EN RESGUARDO'; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fsujresg['t']; echo "</td>";
// echo "</tr>";
//
echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'MEDIDAS DE APOYO DICTAMINADAS'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fmeds['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor=''>";
echo "<td style='text-align:left'>"; echo 'MEDIDAS DE APOYO EJECUTADAS'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fmedidastts['t']; echo "</td>";
echo "</tr>";
?>
