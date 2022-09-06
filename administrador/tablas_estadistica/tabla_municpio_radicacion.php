<?php
// $rtotal2021 = "SELECT COUNT(*) as t FROM expediente
// WHERE año = '2021'";
// $rrtotal2021 = $mysqli->query($rtotal2021);
// $frtotal2021 = $rrtotal2021->fetch_assoc();
// //
// $rtotal2022 = "SELECT COUNT(*) as t FROM expediente
// WHERE año = '2022'";
// $rrtotal2022 = $mysqli->query($rtotal2022);
// $frtotal2022 = $rrtotal2022->fetch_assoc();
// //
// echo "<tr bgcolor = 'yellow'>";
// echo "<td style='text-align:center'>"; echo 'TOTAL'; echo "</td>";
// echo "<td style='text-align:center'>"; echo $frtotal2021['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $frtotal2022['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $total = $frtotal2021['t'] + $frtotal2022['t']; echo "</td>";
// echo "</tr>";
// //
// $municipio = "SELECT * FROM municipios";
// $rmunicipio = $mysqli->query($municipio);
// while ($fmunicipio = $rmunicipio->fetch_assoc()) {
//       $nm = $fmunicipio['nombre'];
//       //
//       $rm2022 = "SELECT COUNT(*) as t FROM expediente
//       WHERE municipio = '$nm' AND año = '2022'";
//       $rrm2022 = $mysqli->query($rm2022);
//       $frm2022 = $rrm2022->fetch_assoc();
//       //
//       $rmtotal = "SELECT COUNT(*) as t FROM expediente
//       WHERE municipio = '$nm'";
//       $rrmtotal = $mysqli->query($rmtotal);
//       $frmtotal = $rrmtotal->fetch_assoc();
//       //
//       $rm2021 = "SELECT COUNT(*) as t FROM expediente
//       WHERE municipio = '$nm' AND año = '2021'";
//       $rrm2021 = $mysqli->query($rm2021);
//       if ($rm2021) {
//         while ($frm2021 = mysqli_fetch_assoc($rrm2021)) {
//           echo "<tr>";
//           echo "<td style='text-align:left'>"; echo $fmunicipio['nombre']; echo "</td>";
//           echo "<td style='text-align:center'>"; echo $frm2021['t']; echo "</td>";
//           echo "<td style='text-align:center'>"; echo $frm2022['t']; echo "</td>";
//           echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $frmtotal['t']; echo "</td>";
//           echo "</tr>";
//         }
//       }
// }
$rtotal2021 = "SELECT COUNT(*) as t FROM expediente
WHERE año = '2021'";
$rrtotal2021 = $mysqli->query($rtotal2021);
$frtotal2021 = $rrtotal2021->fetch_assoc();
//
$rtotal2022 = "SELECT COUNT(*) as t FROM expediente
WHERE año = '2022'";
$rrtotal2022 = $mysqli->query($rtotal2022);
$frtotal2022 = $rrtotal2022->fetch_assoc();
//

$r = "SELECT numeroradicacion, COUNT(DISTINCT fol_exp) as t FROM procesopenal
INNER JOIN expediente ON procesopenal.folioexpediente = expediente.fol_exp
GROUP BY numeroradicacion
HAVING COUNT(*)>0
ORDER BY `t`  DESC";
$rr = $mysqli->query($r);
while ($fr = $rr->fetch_assoc()) {
  $municipio = $fr['numeroradicacion'];
  $conmun2021 = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  procesopenal
  INNER JOIN expediente on procesopenal.folioexpediente = expediente.fol_exp
  WHERE procesopenal.numeroradicacion = '$municipio' AND expediente.año= 2021";
  $rconmun2021 = $mysqli->query($conmun2021);
  $fconmun2021 = $rconmun2021->fetch_assoc();
  //
  $conmun2022 = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  procesopenal
  INNER JOIN expediente on procesopenal.folioexpediente = expediente.fol_exp
  WHERE procesopenal.numeroradicacion = '$municipio' AND expediente.año= 2022";
  $rconmun2022 = $mysqli->query($conmun2022);
  $fconmun2022 = $rconmun2022->fetch_assoc();
  //
  $conmuntotal = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  procesopenal
  INNER JOIN expediente on procesopenal.folioexpediente = expediente.fol_exp
  WHERE procesopenal.numeroradicacion = '$municipio'";
  $rconmuntotal = $mysqli->query($conmuntotal);
  $fconmuntotal = $rconmuntotal->fetch_assoc();
  //
  echo "<tr>";
    echo "<td style='text-align:left'>"; echo $fr['numeroradicacion']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fconmun2021['t']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fconmun2022['t']; echo "</td>";
    echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fconmuntotal['t']; echo "</td>";
  echo "</tr>";
}
echo "<tr bgcolor = 'yellow'>";
echo "<td style='text-align:right'>"; echo 'TOTAL DE EXPEDIENTES'; echo "</td>";
echo "<td style='text-align:center'>"; echo $frtotal2021['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $frtotal2022['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $total = $frtotal2021['t'] + $frtotal2022['t']; echo "</td>";
echo "</tr>";
?>
