<?php
$med_asistencia = "SELECT COUNT(*) As total FROM medidas
WHERE clasificacion = 'ASISTENCIA' AND estatus = 'EJECUTADA'";
$rmed_asistencia = $mysqli->query ($med_asistencia);
$fmed_asistencia = $rmed_asistencia ->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$med_resguardo = "SELECT COUNT(*) As total FROM medidas
WHERE clasificacion = 'RESGUARDO' AND estatus = 'EJECUTADA'";
$rmed_resguardo = $mysqli->query ($med_resguardo);
$fmed_resguardo = $rmed_resguardo ->fetch_assoc();
$totalmed_ejecutadas = $fmed_asistencia['total'] + $fmed_resguardo['total'];
?>
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "ASISTENCIA"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $fmed_asistencia['total']; ?></b></td>
</tr>
<!-- /////////////////////////////////////////////////////////////////////// -->
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "RESGUARDO"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $fmed_resguardo['total']; ?></b></td>
</tr>
<!-- /////////////////////////////////////////////////////////////////////// -->
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "TOTAL"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalmed_ejecutadas; ?></b></td>
</tr>
<!-- /////////////////////////////////////////////////////////////////////// -->
