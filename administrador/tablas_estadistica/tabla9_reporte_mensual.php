<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
$totaltraslados_col1 = 0;
$totaltraslados_col2 = 0;
$sumatotaltraslados = 0;
$traslados = "SELECT react_destinos_traslados.motivo, COUNT(*) AS total FROM react_destinos_traslados
INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
WHERE react_traslados.fecha BETWEEN '$dateinicio' AND '$datetermino'
GROUP BY react_destinos_traslados.motivo ORDER BY total DESC, react_destinos_traslados.motivo ASC";
$rtraslados = $mysqli->query($traslados);
while ($ftraslados = $rtraslados->fetch_assoc()) {
  $trasladomunicipio = $ftraslados['motivo'];
  //////////////////////////////////////////////////////////////////////////////
  $traslados_col1 = "SELECT COUNT(*) AS total FROM react_destinos_traslados
  INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
  INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
  WHERE react_destinos_traslados.motivo = '$trasladomunicipio' AND react_traslados.fecha BETWEEN '$dateinicio_col1' AND '$datefin_col1'";
  $rtraslados_col1 = $mysqli->query($traslados_col1);
  $ftraslados_col1 = $rtraslados_col1->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $traslados_col2 = "SELECT COUNT(*) AS total FROM react_destinos_traslados
  INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
  INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
  WHERE react_destinos_traslados.motivo = '$trasladomunicipio' AND react_traslados.fecha BETWEEN '$dateinicio_col2' AND '$datefin_col2'";
  $rtraslados_col2 = $mysqli->query($traslados_col2);
  $ftraslados_col2 = $rtraslados_col2->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totaltraslados_col1 = $totaltraslados_col1 + $ftraslados_col1['total'];
  $totaltraslados_col2 = $totaltraslados_col2 + $ftraslados_col2['total'];
  $totaltraslados_fila = $ftraslados_col1['total'] +$ftraslados_col2['total'];
  $sumatotaltraslados = $sumatotaltraslados + $totaltraslados_fila;
  ?>
  <tr style="border: 3px solid black;">
    <td style="text-align:left; border: 3px solid black;"><b><?php echo $trasladomunicipio; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $ftraslados_col1['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $ftraslados_col2['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $totaltraslados_fila; ?></b></td>
  </tr>
  <?php
}
////////////////////////////////////////////////////////////////////////////////
?>
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "TOTAL"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totaltraslados_col1; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totaltraslados_col2; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $sumatotaltraslados; ?></b></td>
</tr>
