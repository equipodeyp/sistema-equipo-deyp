<?php
$array = array('VALLE DE TOLUCA', 'VALLE DE MÉXICO ZONA ORIENTE', 'VALLE DE MÉXICO ZON NORORIENTE');
$nsede = array('TOLUCA', 'ORIENTE', 'NORORIENTE');
// $tol = "SELECT COUNT(*) as t FROM expediente
// WHERE sede = 'toluca' AND año = '2021'"
// foreach ($codes as $code and $names as $name) {
//   echo $sed;
// }
foreach (array_combine($array, $nsede) as $code => $name) {
    $s2022 = "SELECT COUNT(*) as t FROM expediente
    WHERE sede = '$name' AND año = '2022'";
    $rs2022 = $mysqli->query($s2022);
    $fs2022 = $rs2022->fetch_assoc();
    //
    $stotal = "SELECT COUNT(*) as t FROM expediente
    WHERE sede = '$name'";
    $rstotal = $mysqli->query($stotal);
    $fstotal = $rstotal->fetch_assoc();
    //
    $s2021 = "SELECT COUNT(*) as t FROM expediente
    WHERE sede = '$name' AND año = '2021'";
    $rs2021 = $mysqli->query($s2021);
    if ($s2021) {
      while ($fs2021 = mysqli_fetch_assoc($rs2021)) {
        echo "<tr >";
        echo "<td style='text-align:center'>"; echo $code; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fs2021['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fs2022['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fstotal['t']; echo "</td>";
        echo "</tr>";
      }
    }
}
$ct2021 = "SELECT COUNT(*) AS t FROM expediente
WHERE año = '2021'";
$rct2021 = $mysqli->query($ct2021);
$fct2021 = $rct2021->fetch_assoc();
//
$ct2022 = "SELECT COUNT(*) AS t FROM expediente
WHERE año = '2022'";
$rct2022 = $mysqli->query($ct2022);
$fct2022 = $rct2022->fetch_assoc();
//
$cttotal = "SELECT COUNT(*) AS t FROM expediente";
$rcttotal = $mysqli->query($cttotal);
$fcttotal = $rcttotal->fetch_assoc();
//
echo "<tr bgcolor='yellow'>";
echo "<td style='text-align:center'>"; echo 'TOTAL'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fct2021['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fct2022['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fcttotal['t']; echo "</td>";
echo "</tr>";
?>
