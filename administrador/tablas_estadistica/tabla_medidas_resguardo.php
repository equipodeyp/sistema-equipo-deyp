<?php
$mas = "SELECT * FROM medidaresguardo";
$rmas = $mysqli->query($mas);
while ($fmas = $rmas->fetch_assoc()) {
  $ma = $fmas['nombre'];
  //
  $eje = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE clasificacion = 'resguardo' AND estatus = 'ejecutada'  AND medida = '$ma' and date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'
  ORDER BY `medidas`.`folioexpediente` ASC";
  $reje = $mysqli->query($eje);
  $feje = $reje->fetch_assoc();
  //
  $cancel = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE clasificacion = 'resguardo' AND estatus = 'cancelada' AND medida = '$ma' and date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'
  ORDER BY `medidas`.`folioexpediente` ASC";
  $rcancel = $mysqli->query($cancel);
  $fcancel = $rcancel->fetch_assoc();
  //
  $totalma = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE clasificacion = 'resguardo' AND medida = '$ma' and date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'
  ORDER BY `medidas`.`folioexpediente` ASC";
  $rtotalma = $mysqli->query($totalma);
  $ftotalma = $rtotalma->fetch_assoc();
  //
  $totalex = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE clasificacion = 'resguardo' AND estatus = 'en ejecucion'
  ORDER BY `medidas`.`folioexpediente` ASC";
  $rtotalex = $mysqli->query($totalex);
  $ftotalex = $rtotalex->fetch_assoc();
  //
  $totaleje = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE clasificacion = 'resguardo' AND estatus = 'ejecutada' and date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'
  ORDER BY `medidas`.`folioexpediente` ASC";
  $rtotaleje = $mysqli->query($totaleje);
  $ftotaleje = $rtotaleje->fetch_assoc();
  //
  $totalcancel = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE clasificacion = 'resguardo' AND estatus = 'cancelada' and date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31'
  ORDER BY `medidas`.`folioexpediente` ASC";
  $rtotalcancel = $mysqli->query($totalcancel);
  $ftotalcancel = $rtotalcancel->fetch_assoc();
  //
  $ex = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE medida = '$ma' AND clasificacion = 'resguardo' AND estatus = 'en ejecucion'
  ORDER BY `medidas`.`folioexpediente` ASC";
  $rex = $mysqli->query($ex);
  if ($ex) {
    while ($fex = mysqli_fetch_assoc($rex)) {
      echo "<tr>";
      echo "<td style='text-align:center'>"; echo $fmas['nombre']; "</td>";
      echo "<td style='text-align:center'>"; echo $fex['t']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $feje['t']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fcancel['t']; echo "</td>";
      echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $totalm = $fex['t'] + $feje['t'] + $fcancel['t']; echo "</td>";
      echo "</tr>";
    }
  }
}
echo "<tr bgcolor= 'yellow'>";
echo "<td style='text-align:center'>"; echo 'total'; "</td>";
echo "<td style='text-align:center'>"; echo $ftotalex['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotaleje['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotalcancel['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $tmeda = $ftotalex['t'] + $ftotaleje['t'] + $ftotalcancel['t']; echo "</td>";
echo "</tr>";
?>
