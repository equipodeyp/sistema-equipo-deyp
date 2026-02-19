<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
$totalmedidasejecutadas_col1 = 0;
$totalmedidasejecutadas_col2 = 0;
$sumatotalmedidasejecutadas = 0;
$medidasejecutadas = "SELECT medidas.ejecucion, COUNT(*) AS total FROM medidas
WHERE medidas.estatus = 'EJECUTADA'
AND medidas.date_ejecucion BETWEEN '$dateinicio' AND '$datetermino'
GROUP BY medidas.ejecucion ORDER BY total DESC, medidas.ejecucion ASC";
$rmedidasejecutadas = $mysqli->query($medidasejecutadas);
while ($fmedidasejecutadas = $rmedidasejecutadas->fetch_assoc()) {
  $municipio = $fmedidasejecutadas['ejecucion'];
  //////////////////////////////////////////////////////////////////////////////
  $medidasejecutadas_col1 = "SELECT COUNT(*) AS total FROM medidas
  WHERE medidas.estatus = 'EJECUTADA' AND medidas.ejecucion = '$municipio'
  AND medidas.date_ejecucion BETWEEN '$dateinicio_col1' AND '$datefin_col1'";
  $rmedidasejecutadas_col1 = $mysqli->query($medidasejecutadas_col1);
  $fmedidasejecutadas_col1 = $rmedidasejecutadas_col1->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $medidasejecutadas_col2 = "SELECT COUNT(*) AS total FROM medidas
  WHERE medidas.estatus = 'EJECUTADA' AND medidas.ejecucion = '$municipio'
  AND medidas.date_ejecucion BETWEEN '$dateinicio_col2' AND '$datefin_col2'";
  $rmedidasejecutadas_col2 = $mysqli->query($medidasejecutadas_col2);
  $fmedidasejecutadas_col2 = $rmedidasejecutadas_col2->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalmedidasejecutadas_col1 = $totalmedidasejecutadas_col1 + $fmedidasejecutadas_col1['total'];
  $totalmedidasejecutadas_col2 = $totalmedidasejecutadas_col2 + $fmedidasejecutadas_col2['total'];
  $totalmedidasejecutadas_fila = $fmedidasejecutadas_col1['total'] +$fmedidasejecutadas_col2['total'];
  $sumatotalmedidasejecutadas = $sumatotalmedidasejecutadas + $totalmedidasejecutadas_fila;
  ?>
  <tr style="border: 3px solid black;">
    <td style="text-align:left; border: 3px solid black;"><b><?php echo $municipio; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fmedidasejecutadas_col1['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fmedidasejecutadas_col2['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalmedidasejecutadas_fila; ?></b></td>
  </tr>
  <?php
}
////////////////////////////////////////////////////////////////////////////////
?>
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "TOTAL"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalmedidasejecutadas_col1; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalmedidasejecutadas_col2; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $sumatotalmedidasejecutadas; ?></b></td>
</tr>
