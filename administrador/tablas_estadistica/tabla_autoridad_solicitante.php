<?php
$aut = "SELECT * FROM nombreautoridad";
$raut = $mysqli->query($aut);
while ($faut = $raut->fetch_assoc()) {
  $na = $faut['nombre'];
  //
  $aut2022 = "SELECT COUNT(DISTINCT folioexpediente) as t from autoridad
  INNER JOIN expediente on autoridad.folioexpediente = expediente.fol_exp
  WHERE autoridad.nombreautoridad = '$na' and expediente.año = '2022'";
  $raut2022 = $mysqli->query($aut2022);
  $faut2022 = $raut2022->fetch_assoc();
  //
  $auttotal = "SELECT COUNT(DISTINCT folioexpediente) as t from autoridad
  INNER JOIN expediente on autoridad.folioexpediente = expediente.fol_exp
  WHERE autoridad.nombreautoridad = '$na'";
  $rauttotal = $mysqli->query($auttotal);
  $fauttotal = $rauttotal->fetch_assoc();
  //
  $aut2021 = "SELECT COUNT(DISTINCT folioexpediente) as t from autoridad
  INNER JOIN expediente on autoridad.folioexpediente = expediente.fol_exp
  WHERE autoridad.nombreautoridad = '$na' and expediente.año = '2021'";
  $raut2021 = $mysqli->query($aut2021);
  //
  if ($aut2021) {
    while ($faut2021 = mysqli_fetch_assoc($raut2021)) {
      echo "<tr>";
      echo "<td style='text-align:center'>"; echo $faut['nombre']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $faut2021['t']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $faut2022['t']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fauttotal['t']; echo "</td>";
      echo "</tr>";
    }
  }
}
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
echo "<tr bgcolor = 'yellow'>";
echo "<td style='text-align:center'>"; echo 'total'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fautt2021['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fautt2022['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $total = $fautt2021['t'] + $fautt2022['t']; echo "</td>";
echo "</tr>";
?>
