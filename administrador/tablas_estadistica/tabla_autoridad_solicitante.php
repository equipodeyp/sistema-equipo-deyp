<?php
// $aut = "SELECT * FROM nombreautoridad";
// $raut = $mysqli->query($aut);
// while ($faut = $raut->fetch_assoc()) {
//   $na = $faut['nombre'];
//   //
//   $aut2022 = "SELECT COUNT(DISTINCT folioexpediente) as t from autoridad
//   INNER JOIN expediente on autoridad.folioexpediente = expediente.fol_exp
//   WHERE autoridad.nombreautoridad = '$na' and expediente.año = '2022'";
//   $raut2022 = $mysqli->query($aut2022);
//   $faut2022 = $raut2022->fetch_assoc();
//   //
//   $auttotal = "SELECT COUNT(DISTINCT folioexpediente) as t from autoridad
//   INNER JOIN expediente on autoridad.folioexpediente = expediente.fol_exp
//   WHERE autoridad.nombreautoridad = '$na'";
//   $rauttotal = $mysqli->query($auttotal);
//   $fauttotal = $rauttotal->fetch_assoc();
//   //
//   $aut2021 = "SELECT COUNT(DISTINCT folioexpediente) as t from autoridad
//   INNER JOIN expediente on autoridad.folioexpediente = expediente.fol_exp
//   WHERE autoridad.nombreautoridad = '$na' and expediente.año = '2021'";
//   $raut2021 = $mysqli->query($aut2021);
//   //
//   if ($aut2021) {
//     while ($faut2021 = mysqli_fetch_assoc($raut2021)) {
      // echo "<tr>";
      // echo "<td style='text-align:center'>"; echo $faut['nombre']; echo "</td>";
      // echo "<td style='text-align:center'>"; echo $faut2021['t']; echo "</td>";
      // echo "<td style='text-align:center'>"; echo $faut2022['t']; echo "</td>";
      // echo "<td style='text-align:center'>"; echo $fauttotal['t']; echo "</td>";
      // echo "</tr>";
//     }
//   }
// }
$autt2021 = "SELECT COUNT(DISTINCT folioexpediente) as t from autoridad
INNER JOIN expediente on autoridad.folioexpediente = expediente.fol_exp
WHERE expediente.año = '2021'";
$rautt2021 = $mysqli->query($autt2021);
$fautt2021 = $rautt2021->fetch_assoc();
//
$autt2022 = "SELECT COUNT(DISTINCT folioexpediente) as t from autoridad
INNER JOIN expediente on autoridad.folioexpediente = expediente.fol_exp
WHERE expediente.año = '2022'";
$rautt2022 = $mysqli->query($autt2022);
$fautt2022 = $rautt2022->fetch_assoc();
//
$autt2023 = "SELECT COUNT(DISTINCT folioexpediente) as t from autoridad
INNER JOIN expediente on autoridad.folioexpediente = expediente.fol_exp
WHERE expediente.año = '2023'";
$rautt2023 = $mysqli->query($autt2023);
$fautt2023 = $rautt2023->fetch_assoc();
//


$au = "SELECT nombreautoridad, COUNT(DISTINCT folioexpediente) as t FROM autoridad
INNER JOIN expediente ON autoridad.folioexpediente = expediente.fol_exp
GROUP BY nombreautoridad
HAVING COUNT(*)>0
ORDER BY `autoridad`.`nombreautoridad` ASC";
$rau = $mysqli->query($au);
while ($fau = $rau->fetch_assoc()) {
  $autoridad = $fau['nombreautoridad'];
  $aut2021 = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  autoridad
  INNER JOIN expediente on autoridad.folioexpediente = expediente.fol_exp
  WHERE autoridad.nombreautoridad = '$autoridad' AND expediente.año= 2021";
  $raut2021 = $mysqli->query($aut2021);
  $faut2021 = $raut2021->fetch_assoc();
  //
  $aut2022 = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  autoridad
  INNER JOIN expediente on autoridad.folioexpediente = expediente.fol_exp
  WHERE autoridad.nombreautoridad = '$autoridad' AND expediente.año= 2022";
  $raut2022 = $mysqli->query($aut2022);
  $faut2022 = $raut2022->fetch_assoc();
  //
  $aut2023 = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  autoridad
  INNER JOIN expediente on autoridad.folioexpediente = expediente.fol_exp
  WHERE autoridad.nombreautoridad = '$autoridad' AND expediente.año= 2023";
  $raut2023 = $mysqli->query($aut2023);
  $faut2023 = $raut2023->fetch_assoc();
  //
  $auttotal = "SELECT COUNT(DISTINCT expediente.fol_exp) AS t FROM  autoridad
  INNER JOIN expediente on autoridad.folioexpediente = expediente.fol_exp
  WHERE autoridad.nombreautoridad = '$autoridad'";
  $rauttotal = $mysqli->query($auttotal);
  $fauttotal = $rauttotal->fetch_assoc();
  //
  echo "<tr>";
  echo "<td style='text-align:left'>"; echo $fau['nombreautoridad']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $faut2021['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $faut2022['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $faut2023['t']; echo "</td>";
  echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fauttotal ['t']; echo "</td>";
  echo "</tr>";
}
echo "<tr bgcolor = 'yellow'>";
echo "<td style='text-align:center'>"; echo 'TOTAL DE EXPEDIENTES'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fautt2021['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fautt2022['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fautt2023['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $total = $fautt2021['t'] + $fautt2022['t'] + $fautt2023['t']; echo "</td>";
echo "</tr>";
?>
