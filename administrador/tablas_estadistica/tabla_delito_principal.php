<?php
$del = "SELECT * FROM delito";
$rdel = $mysqli->query($del);
while ($fdel = $rdel ->fetch_assoc()) {
  $delito = $fdel['nombre'];
  //
  $del2022 = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM expediente
  INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
  WHERE procesopenal.delitoprincipal= '$delito' AND expediente.año = '2022'";
  $rdel2022 = $mysqli->query($del2022);
  $fdel2022 = $rdel2022->fetch_assoc();
  //
  $deltotal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM expediente
  INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
  WHERE procesopenal.delitoprincipal= '$delito'";
  $rdeltotal = $mysqli->query($deltotal);
  $fdeltotal = $rdeltotal->fetch_assoc();
  //
  $del2021 = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM expediente
  INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
  WHERE procesopenal.delitoprincipal= '$delito' AND expediente.año = '2021'";
  $rdel2021 = $mysqli->query($del2021);
  if ($del2021) {
    while ($fdel2021 = mysqli_fetch_assoc($rdel2021)) {
      echo "<tr >";
      echo "<td style='text-align:center'>"; echo $fdel['nombre']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fdel2021['t']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fdel2022['t']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fdeltotal['t']; echo "</td>";
      echo "</tr>";
    }
  }
}
$delt2021 = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM expediente
INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
WHERE expediente.año = '2021'";
$rdelt2021 = $mysqli->query($delt2021);
$fdelt2021 = $rdelt2021->fetch_assoc();
//
$delt2022 = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM expediente
INNER JOIN procesopenal ON expediente.fol_exp = procesopenal.folioexpediente
WHERE expediente.año = '2022'";
$rdelt2022 = $mysqli->query($delt2022);
$fdelt2022 = $rdelt2022->fetch_assoc();
//
echo "<tr bgcolor='yellow'>";
echo "<td style='text-align:center'>"; echo 'TOTAL'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdelt2021['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdelt2022['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $dtotales = $fdelt2021['t'] + $fdelt2022['t']; echo "</td>";
echo "</tr>";
?>
