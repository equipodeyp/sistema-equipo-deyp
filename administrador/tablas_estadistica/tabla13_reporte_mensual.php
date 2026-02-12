<?php
$consecutivo = 0;
$totalexpedientes = 0;
$statusexpediente = "SELECT * FROM statusexpediente";
$rstatusexpediente = $mysqli->query($statusexpediente);
while ($fstatusexpediente = $rstatusexpediente->fetch_assoc()) {
  $consecutivo = $consecutivo +1;
  $estatus_exp = $fstatusexpediente['nombre'];
  $contarstatusexp = "SELECT COUNT(*) AS total FROM statusseguimiento
  WHERE status = '$estatus_exp'";
  $rcontarstatusexp = $mysqli->query($contarstatusexp);
  $fcontarstatusexp = $rcontarstatusexp ->fetch_assoc();
  $totalexpedientes = $totalexpedientes + $fcontarstatusexp['total'];
  if ($estatus_exp == 'ANALISIS' AND $fcontarstatusexp['total'] == 0) {
    ?>
    <tr style="border: 3px solid black;">
      <td style="text-align:left; border: 3px solid black;"><b><?php echo 'EN ANALISIS'; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $fcontarstatusexp['total']; ?></b></td>
    </tr>
    <?php
  }elseif ($fcontarstatusexp['total'] > 0 ) {
    ?>
    <tr style="border: 3px solid black;">
      <td style="text-align:left; border: 3px solid black;"><b><?php echo $estatus_exp; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $fcontarstatusexp['total']; ?></b></td>
    </tr>
    <?php
  }
}
?>
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "TOTAL"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalexpedientes; ?></b></td>
</tr>
