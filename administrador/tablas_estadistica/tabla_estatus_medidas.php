<?php
//
$enejeca = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EN EJECUCION' AND clasificacion = 'ASISTENCIA'";
$renejeca = $mysqli->query($enejeca);
$fenejeca = $renejeca->fetch_assoc();
//
$enejecr = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EN EJECUCION' AND clasificacion = 'RESGUARDO'";
$renejecr = $mysqli->query($enejecr);
$fenejecr = $renejecr->fetch_assoc();
//
$eneject = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EN EJECUCION'";
$reneject = $mysqli->query($eneject);
$feneject = $reneject->fetch_assoc();
//
$ejeca = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA' AND clasificacion = 'ASISTENCIA'";
$rejeca = $mysqli->query($ejeca);
$fejeca = $rejeca->fetch_assoc();
//
$ejecr = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA' AND clasificacion = 'RESGUARDO'";
$rejecr = $mysqli->query($ejecr);
$fejecr = $rejecr->fetch_assoc();
//
$eject = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA'";
$reject = $mysqli->query($eject);
$feject = $reject->fetch_assoc();
//
$cancela = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'CANCELADA' AND clasificacion = 'ASISTENCIA'";
$rcancela = $mysqli->query($cancela);
$fcancela = $rcancela->fetch_assoc();
//
$cancelr = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'CANCELADA' AND clasificacion = 'RESGUARDO'";
$rcancelr = $mysqli->query($cancelr);
$fcancelr = $rcancelr->fetch_assoc();
//
$canceltot = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'CANCELADA'";
$rcanceltot = $mysqli->query($canceltot);
$fcanceltot = $rcanceltot->fetch_assoc();
//
$asist = "SELECT COUNT(*) as t FROM medidas WHERE  clasificacion = 'ASISTENCIA'";
$rasist = $mysqli->query($asist);
$fasist = $rasist->fetch_assoc();
//
$resg = "SELECT COUNT(*) as t FROM medidas WHERE clasificacion = 'RESGUARDO'";
$rresg = $mysqli->query($resg);
$fresg = $rresg->fetch_assoc();
//
$medidast = "SELECT COUNT(*) as t FROM medidas";
$rmedidast = $mysqli->query($medidast);
$fmedidast = $rmedidast->fetch_assoc();
//
echo "<tr >";
echo "<td style='text-align:center'>"; echo 'ASISTENCIA'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fenejeca['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fejeca['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fcancela['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fasist['t']; echo "</td>";
echo "</tr>";
//
echo "<tr >";
echo "<td style='text-align:center'>"; echo 'RESGUARDO'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fenejecr['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fejecr['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fcancelr['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fresg['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor='yellow'>";
echo "<td style='text-align:center'>"; echo 'TOTAL DE MEDIDAS DE APOYO'; echo "</td>";
echo "<td style='text-align:center'>"; echo $feneject['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $feject['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fcanceltot['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fmedidast['t']; echo "</td>";
echo "</tr>";
?>
