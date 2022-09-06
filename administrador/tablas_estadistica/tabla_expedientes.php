<?php
$ct2021 = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM expediente
INNER JOIN statusseguimiento ON expediente.fol_exp = statusseguimiento.folioexpediente
WHERE expediente.año = '2021'";
$rct2021 = $mysqli->query($ct2021);
$fct2021 = $rct2021->fetch_assoc();
//
$ct2022 = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM expediente
INNER JOIN statusseguimiento ON expediente.fol_exp = statusseguimiento.folioexpediente
WHERE expediente.año = '2022'";
$rct2022 = $mysqli->query($ct2022);
$fct2022 = $rct2022->fetch_assoc();
//
$cttotal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM expediente
INNER JOIN statusseguimiento ON expediente.fol_exp = statusseguimiento.folioexpediente";
$rcttotal = $mysqli->query($cttotal);
$fcttotal = $rcttotal->fetch_assoc();
//

//
$exp = "SELECT * FROM statusexpediente";
$rexp = $mysqli->query($exp);
while ($fexp = $rexp->fetch_assoc()) {
  $nexp = $fexp['nombre'];
  //
  $c2022 = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM expediente
  INNER JOIN statusseguimiento ON expediente.fol_exp = statusseguimiento.folioexpediente
  WHERE statusseguimiento.status = '$nexp' AND expediente.año = '2022'";
  $rc2022 = $mysqli->query($c2022);
  $fc2022 = $rc2022->fetch_assoc();
  //
  $ctotal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM expediente
  INNER JOIN statusseguimiento ON expediente.fol_exp = statusseguimiento.folioexpediente
  WHERE statusseguimiento.status = '$nexp'";
  $rctotal = $mysqli->query($ctotal);
  $fctotal = $rctotal->fetch_assoc();
  //
  $c2021 = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM expediente
  INNER JOIN statusseguimiento ON expediente.fol_exp = statusseguimiento.folioexpediente
  WHERE statusseguimiento.status = '$nexp' AND expediente.año = '2021'";
  $rc2021 = $mysqli->query($c2021);
  if ($c2021) {
    while ($fc2021 = mysqli_fetch_assoc($rc2021)) {
      echo "<tr>";
      echo "<td style='text-align:left'>"; echo $fexp['nombre']; if ($fexp['nombre'] === 'ANALISIS') {
        echo "*";
      }elseif ($fexp['nombre'] === 'EN EJECUCION') {
        echo "";
      } echo "</td>";
      echo "<td style='text-align:center'>"; echo $fc2021['t']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fc2022['t']; echo "</td>";
      echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fctotal['t']; echo "</td>";
      echo "</tr>";
    }
  }
}
echo "<tr bgcolor='yellow'>";
echo "<td style='text-align:right'>"; echo 'TOTAL DE EXPEDIENTES'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fct2021['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fct2022['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fcttotal['t']; echo "</td>";
echo "</tr>";
?>
