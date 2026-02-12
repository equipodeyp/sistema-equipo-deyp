<?php
$consecutivo = 0;
$totalsujetos = 0;
$estatussujeto = "SELECT * FROM estatuspersona";
$restatussujeto = $mysqli->query($estatussujeto);
while ($festatussujeto = $restatussujeto->fetch_assoc()) {
  $consecutivo = $consecutivo + 1;
  $status_sujeto = $festatussujeto['nombre'];
  //////////////////////////////////////////////////////////////////////////////
  $contarstatuspersonas = "SELECT COUNT(*) AS total FROM datospersonales
  WHERE estatus = '$status_sujeto' AND relacional = 'NO'";
  $rcontarstatuspersonas = $mysqli->query($contarstatuspersonas);
  $fcontarstatuspersonas = $rcontarstatuspersonas ->fetch_assoc();
  $totalsujetos = $totalsujetos + $fcontarstatuspersonas['total'];
  if ($fcontarstatuspersonas['total'] > 0) {
    ?>
    <tr style="border: 3px solid black;">
      <td style="text-align:left; border: 3px solid black;"><b><?php echo $status_sujeto; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $fcontarstatuspersonas['total']; ?></b></td>
    </tr>
    <?php
  }
}
?>
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "TOTAL"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalsujetos; ?></b></td>
</tr>
