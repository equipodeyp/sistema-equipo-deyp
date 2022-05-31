<?php
$municipio = "SELECT * FROM municipios";
$rmunicipio = $mysqli->query($municipio);
while ($fmunicipio = $rmunicipio->fetch_assoc()) {
  $m = $fmunicipio['nombre'];
  //
  $mresg = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE ejecucion = '$m' AND estatus = 'ejecutada' AND clasificacion = 'resguardo' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
  $rmresg = $mysqli->query($mresg);
  $fmresg = $rmresg->fetch_assoc();
  //
  $mtotal = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE ejecucion = '$m' AND estatus = 'ejecutada' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
  $rmtotal = $mysqli->query($mtotal);
  $fmtotal = $rmtotal->fetch_assoc();
  //
  $masistotal = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE estatus = 'ejecutada' AND clasificacion = 'asistencia' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
  $rmasistotal = $mysqli->query($masistotal);
  $fmasistotal = $rmasistotal->fetch_assoc();
  //
  $mresgtotal = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE estatus = 'ejecutada' AND clasificacion = 'resguardo' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
  $rmresgtotal = $mysqli->query($mresgtotal);
  $fmresgtotal = $rmresgtotal->fetch_assoc();
  //
  $mtotal2022 = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE estatus = 'ejecutada' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
  $rmtotal2022 = $mysqli->query($mtotal2022);
  $fmtotal2022 = $rmtotal2022->fetch_assoc();
  //
  $masis = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE ejecucion = '$m' AND estatus = 'ejecutada' AND clasificacion = 'asistencia' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
  $rmasis = $mysqli->query($masis);
  if ($masis) {
    while ($fmasis = mysqli_fetch_assoc($rmasis)) {
      echo "<tr>";
      echo "<td style='text-align:center'>"; echo $fmunicipio['nombre']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fmasis['t']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fmresg['t']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fmtotal['t']; echo "</td>";
      echo "</tr>";
    }
  }
}
echo "<tr bgcolor = 'yellow'>";
echo "<td style='text-align:center'>"; echo 'TOTAL'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fmasistotal['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fmresgtotal['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fmtotal2022['t']; echo "</td>";
echo "</tr>";

//
// $p = "SELECT ejecucion, COUNT(*) as t FROM medidas
// WHERE clasificacion = 'resguardo' AND estatus='ejecutada' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'
// GROUP BY ejecucion
// HAVING COUNT(*)>0
// ORDER BY `t`  DESC";
// $rp = $mysqli->query($p);
// while ($fp = $rp->fetch_assoc()) {
//   $clasif = $fp['ejecucion'];
//   $pa = "SELECT COUNT(*) as t FROM medidas
//   WHERE ejecucion = '$clasif' AND clasificacion = 'asistencia' AND estatus='ejecutada' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'";
//   $rpa = $mysqli->query($pa);
//   while ($fpa = $rpa->fetch_assoc()) {
//     echo "<tr>";
//     echo "<td style='text-align:center'>"; echo $fp['ejecucion']; echo "</td>";
//     echo "<td style='text-align:center'>"; echo $fpa['t']; echo "</td>";
//     echo "<td style='text-align:center'>"; echo $fp['t']; echo "</td>";
//     echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $totmun = $fpa['t'] + $fp['t']; echo "</td>";
//     echo "</tr>";
//     // code...
//   }
// }
// echo "<tr bgcolor = 'yellow'>";
// echo "<td style='text-align:center'>"; echo 'total'; echo "</td>";
// echo "<td style='text-align:center'>";  echo "</td>";
// echo "<td style='text-align:center'>";  echo "</td>";
// echo "<td style='text-align:center'>";  echo "</td>";
// echo "</tr>";
?>
<!-- SELECT ejecucion, COUNT(*) as t FROM medidas
WHERE clasificacion = 'asistencia' estatus='ejecutada' AND date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'
GROUP BY ejecucion
HAVING COUNT(*)>0; -->
