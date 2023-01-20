<?php
$totalex = "SELECT  COUNT(*) as t FROM `medidas`
WHERE clasificacion = 'asistencia' AND estatus = 'en ejecucion'
ORDER BY `medidas`.`folioexpediente` ASC";
$rtotalex = $mysqli->query($totalex);
$ftotalex = $rtotalex->fetch_assoc();
//
$totaleje = "SELECT  COUNT(*) as t FROM `medidas`
WHERE clasificacion = 'asistencia' AND estatus = 'ejecutada' and date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31'
ORDER BY `medidas`.`folioexpediente` ASC";
$rtotaleje = $mysqli->query($totaleje);
$ftotaleje = $rtotaleje->fetch_assoc();
//
$totalcancel = "SELECT  COUNT(*) as t FROM `medidas`
WHERE clasificacion = 'asistencia' AND estatus = 'cancelada' and date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31'
ORDER BY `medidas`.`folioexpediente` ASC";
$rtotalcancel = $mysqli->query($totalcancel);
$ftotalcancel = $rtotalcancel->fetch_assoc();
//

//
$t1 = "SELECT COUNT(*) as t FROM `medidas`
WHERE (clasificacion = 'asistencia' AND estatus = 'en ejecucion' and medida = 'TRATAMIENTO PSICOLOGICO')
OR (clasificacion = 'asistencia' AND estatus = 'en ejecucion' and medida = 'TRATAMIENTO MEDICO')
OR (clasificacion = 'asistencia' AND estatus = 'en ejecucion' and medida = 'TRATAMIENTO SANITARIO')
ORDER BY `medidas`.`folioexpediente` ASC";
$rt1 = $mysqli->query($t1);
$ft1 = $rt1->fetch_assoc();
//
$t2 = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE (clasificacion = 'asistencia' AND estatus = 'ejecutada' and medida = 'TRATAMIENTO PSICOLOGICO' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31')
  OR (clasificacion = 'asistencia' AND estatus = 'ejecutada' and medida = 'TRATAMIENTO MEDICO' and date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31')
  OR (clasificacion = 'asistencia' AND estatus = 'ejecutada' and medida = 'TRATAMIENTO SANITARIO' and date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31')";
$rt2 = $mysqli->query($t2);
$ft2 = $rt2->fetch_assoc();
//
$t3 = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE (clasificacion = 'asistencia' AND estatus = 'cancelada' and medida = 'TRATAMIENTO PSICOLOGICO' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31')
  OR (clasificacion = 'asistencia' AND estatus = 'cancelada' and medida = 'TRATAMIENTO MEDICO' and date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31')
  OR (clasificacion = 'asistencia' AND estatus = 'cancelada' and medida = 'TRATAMIENTO SANITARIO' and date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31')";
$rt3 = $mysqli->query($t3);
$ft3 = $rt3->fetch_assoc();
//

//
echo "<tr>";
echo "<td style='text-align:left'>"; echo 'I. ASISTENCIA Y SALUD PUBLICA'; "</td>";
echo "<td style='text-align:center'>"; echo $ft1['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ft2['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ft3['t']; echo "</td>";
echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $ttotal = $ft1['t'] + $ft2['t'] + $ft3['t']; echo "</td>";
echo "</tr>";
$mas = "SELECT * FROM medidaasistencia";
$rmas = $mysqli->query($mas);
while ($fmas = $rmas->fetch_assoc()) {
  $ma = $fmas['nombre'];
  //
  $eje = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE clasificacion = 'asistencia' AND estatus = 'ejecutada'  AND medida = '$ma' and date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31'
  ORDER BY `medidas`.`folioexpediente` ASC";
  $reje = $mysqli->query($eje);
  $feje = $reje->fetch_assoc();
  //
  $cancel = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE clasificacion = 'asistencia' AND estatus = 'cancelada' AND medida = '$ma' and date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31'
  ORDER BY `medidas`.`folioexpediente` ASC";
  $rcancel = $mysqli->query($cancel);
  $fcancel = $rcancel->fetch_assoc();
  //
  $totalma = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE clasificacion = 'asistencia' AND medida = '$ma' and date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31'
  ORDER BY `medidas`.`folioexpediente` ASC";
  $rtotalma = $mysqli->query($totalma);
  $ftotalma = $rtotalma->fetch_assoc();
  //

  //

  //

  //
  $ex = "SELECT  COUNT(*) as t FROM `medidas`
  WHERE medida = '$ma' AND clasificacion = 'asistencia' AND estatus = 'en ejecucion'
  ORDER BY `medidas`.`folioexpediente` ASC";
  $rex = $mysqli->query($ex);
  if ($ex) {
    while ($fex = mysqli_fetch_assoc($rex)) {
      echo "<tr>";
      echo "<td style='text-align:left'>"; echo $fmas['nombre']; "</td>";
      echo "<td style='text-align:center'>"; echo $fex['t']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $feje['t']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fcancel['t']; echo "</td>";
      echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $totalm = $fex['t'] + $feje['t'] + $fcancel['t']; echo "</td>";
      echo "</tr>";
    }
  }
}
echo "<tr bgcolor= 'yellow'>";
echo "<td style='text-align:right'>"; echo 'TOTAL DE MEDIDAS DE ASISTENCIA'; "</td>";
echo "<td style='text-align:center'>"; echo $ftotalex['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotaleje['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotalcancel['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $tmeda = $ftotalex['t'] + $ftotaleje['t'] + $ftotalcancel['t']; echo "</td>";
echo "</tr>";
?>
