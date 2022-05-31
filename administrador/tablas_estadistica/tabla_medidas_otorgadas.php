<?php
$tex = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'en ejecucion' AND date_definitva BETWEEN '2022-01-01' AND '2022-12-31'";
$rtex = $mysqli->query($tex);
$ftex = $rtex->fetch_assoc();
//
$texasis = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'en ejecucion' AND date_definitva BETWEEN '2022-01-01' AND '2022-12-31'";
$rtexasis = $mysqli->query($texasis);
$ftexasis = $rtexasis->fetch_assoc();
//
$texresg = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'en ejecucion' AND date_definitva BETWEEN '2022-01-01' AND '2022-12-31'";
$rtexresg = $mysqli->query($texresg);
$ftexresg = $rtexresg->fetch_assoc();
//
$texprov = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'en ejecucion' AND date_provisional BETWEEN '2022-01-01' AND '2022-12-31'";
$rtexprov = $mysqli->query($texprov);
$ftexprov = $rtexprov->fetch_assoc();
//
$texprovasis = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'en ejecucion' AND date_provisional BETWEEN '2022-01-01' AND '2022-12-31'";
$rtexprovasis = $mysqli->query($texprovasis);
$ftexprovasis = $rtexprovasis->fetch_assoc();
//
$texprovresg = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'en ejecucion' AND date_provisional BETWEEN '2022-01-01' AND '2022-12-31'";
$rtexprovresg = $mysqli->query($texprovresg);
$ftexprovresg = $rtexprovresg->fetch_assoc();
//
$teje = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
$rteje = $mysqli->query($teje);
$fteje = $rteje->fetch_assoc();
//
$tejeasis = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
$rtejeasis = $mysqli->query($tejeasis);
$ftejeasis = $rtejeasis->fetch_assoc();
//
$tejeresg = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
$rtejeresg = $mysqli->query($tejeresg);
$ftejeresg = $rtejeresg->fetch_assoc();
//
$tejeasisdef = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
$rtejeasisdef = $mysqli->query($tejeasisdef);
$ftejeasisdef = $rtejeasisdef->fetch_assoc();
//
$tejeprovresg = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
$rtejeprovresg = $mysqli->query($tejeprovresg);
$ftejeprovresg = $rtejeprovresg->fetch_assoc();
//
$tejeprov = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
$rtejeprov = $mysqli->query($tejeprov);
$ftejeprov = $rtejeprov->fetch_assoc();
//
$tcancel = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'CANCELADA' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
$rtcancel = $mysqli->query($tcancel);
$ftcancel = $rtcancel->fetch_assoc();
//
$tcancelasis = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'CANCELADA' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
$rtcancelasis = $mysqli->query($tcancelasis);
$ftcancelasis = $rtcancelasis->fetch_assoc();
//
$tcancelresg = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'CANCELADA' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
$rtcancelresg = $mysqli->query($tcancelresg);
$ftcancelresg = $rtcancelresg->fetch_assoc();
//
$tcancelprov = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'CANCELADA' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
$rtcancelprov = $mysqli->query($tcancelprov);
$ftcancelprov = $rtcancelprov->fetch_assoc();
//
$tcancelprovasis = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'CANCELADA' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
$rtcancelprovasis = $mysqli->query($tcancelprovasis);
$ftcancelprovasis = $rtcancelprovasis->fetch_assoc();
//
$tcancelprovresg = "SELECT COUNT(*) as total FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'CANCELADA' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
$rtcancelprovresg = $mysqli->query($tcancelprovresg);
$ftcancelprovresg = $rtcancelprovresg->fetch_assoc();
//
echo "<tr bgcolor = 'Lime'>";
echo "<td style='text-align:center'>"; echo "definitvas"; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftex['total']; "</td>";
echo "<td style='text-align:center'>"; echo $fteje['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftcancel['total']; echo "</td>";
echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $tdef = $ftex['total'] + $fteje['total'] + $ftcancel['total'];  echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='text-align:center'>"; echo "medidas de asistencia"; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftexasis['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftejeasis['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftcancelasis['total']; echo "</td>";
echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $tdefasis = $ftexasis['total'] + $ftejeasis['total'] + $ftcancelasis['total']; echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='text-align:center'>"; echo "medidas de resguardo"; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftexresg['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftejeresg['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftcancelresg['total']; echo "</td>";
echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $tdefresg = $ftexresg['total'] + $ftejeresg['total'] + $ftcancelresg['total']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor = 'Lime'>";
echo "<td style='text-align:center'>"; echo "provisionales"; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftexprov['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftejeprov['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftcancelprov['total']; echo "</td>";
echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $tprov = $ftexprov['total'] + $ftejeprov['total'] + $ftcancelprov['total']; echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='text-align:center'>"; echo "medidas de asistencia"; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftexprovasis['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftejeasisdef['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftcancelprovasis ['total']; echo "</td>";
echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $tprovasis = $ftexprovasis['total'] + $ftejeasisdef['total'] + $ftcancelprovasis ['total']; echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='text-align:center'>"; echo "medidas de resguardo"; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftexprovresg['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftejeprovresg['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftcancelprovresg['total']; echo "</td>";
echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $tprovresg = $ftexprovresg['total'] + $ftejeprovresg['total'] + $ftcancelprovresg['total']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor = 'yellow'>";
echo "<td style='text-align:center'>"; echo "TOTAL DE medidas"; echo "</td>";
echo "<td style='text-align:center'>"; echo $tenejec = $ftex['total'] + $ftexprov['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $tejecs = $fteje['total'] + $ftejeprov['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $tcanc = $ftcancel['total'] + $ftcancelprov['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $tmedidas = $tdef + $tprov; echo "</td>";
echo "</tr>";
?>
