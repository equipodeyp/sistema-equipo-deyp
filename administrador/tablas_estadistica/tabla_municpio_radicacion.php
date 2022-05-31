<?php
$municipio = "SELECT * FROM municipios";
$rmunicipio = $mysqli->query($municipio);
while ($fmunicipio = $rmunicipio->fetch_assoc()) {
      $nm = $fmunicipio['nombre'];
      //
      $rm2022 = "SELECT COUNT(*) as t FROM expediente
      WHERE municipio = '$nm' AND año = '2022'";
      $rrm2022 = $mysqli->query($rm2022);
      $frm2022 = $rrm2022->fetch_assoc();
      //
      $rmtotal = "SELECT COUNT(*) as t FROM expediente
      WHERE municipio = '$nm'";
      $rrmtotal = $mysqli->query($rmtotal);
      $frmtotal = $rrmtotal->fetch_assoc();
      //
      $rm2021 = "SELECT COUNT(*) as t FROM expediente
      WHERE municipio = '$nm' AND año = '2021'";
      $rrm2021 = $mysqli->query($rm2021);
      if ($rm2021) {
        while ($frm2021 = mysqli_fetch_assoc($rrm2021)) {
          echo "<tr>";
          echo "<td style='text-align:center'>"; echo $fmunicipio['nombre']; echo "</td>";
          echo "<td style='text-align:center'>"; echo $frm2021['t']; echo "</td>";
          echo "<td style='text-align:center'>"; echo $frm2022['t']; echo "</td>";
          echo "<td style='text-align:center'>"; echo $frmtotal['t']; echo "</td>";
          echo "</tr>";
        }
      }
}
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
echo "<tr bgcolor = 'yellow'>";
echo "<td style='text-align:center'>"; echo 'total'; echo "</td>";
echo "<td style='text-align:center'>"; echo $frtotal2021['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $frtotal2022['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $total = $frtotal2021['t'] + $frtotal2022['t']; echo "</td>";
echo "</tr>";
?>
