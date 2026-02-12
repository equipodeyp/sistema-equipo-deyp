<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
$totalppnoincorporadas_col1 = 0;
$totalppnoincorporadas_col2 = 0;
$sumatotalppnoincorporadas = 0;
$asistenciasmedicas = "SELECT react_destinos_traslados.motivo, COUNT(*) AS total FROM react_destinos_traslados
INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
WHERE react_traslados.fecha BETWEEN '$dateinicio' AND '$datetermino'
GROUP BY react_destinos_traslados.motivo ORDER BY total DESC, react_destinos_traslados.motivo ASC";
$rasistenciasmedicas = $mysqli->query($asistenciasmedicas);
while ($fasistenciasmedicas = $rasistenciasmedicas->fetch_assoc()) {
  $serviciomedico = $fasistenciasmedicas['motivo'];
  //////////////////////////////////////////////////////////////////////////////
  $ppnoincorporadas_col1 = "SELECT COUNT(*) AS total FROM react_destinos_traslados
  INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
  INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
  WHERE react_destinos_traslados.motivo = '$serviciomedico' AND react_traslados.fecha BETWEEN '$dateinicio_col1' AND '$datefin_col1'";
  $rppnoincorporadas_col1 = $mysqli->query($ppnoincorporadas_col1);
  $fppnoincorporadas_col1 = $rppnoincorporadas_col1->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $ppnoincorporadas_col2 = "SELECT COUNT(*) AS total FROM react_destinos_traslados
  INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
  INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
  WHERE react_destinos_traslados.motivo = '$serviciomedico' AND react_traslados.fecha BETWEEN '$dateinicio_col2' AND '$datefin_col2'";
  $rppnoincorporadas_col2 = $mysqli->query($ppnoincorporadas_col2);
  $fppnoincorporadas_col2 = $rppnoincorporadas_col2->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalppnoincorporadas_col1 = $totalppnoincorporadas_col1 + $fppnoincorporadas_col1['total'];
  $totalppnoincorporadas_col2 = $totalppnoincorporadas_col2 + $fppnoincorporadas_col2['total'];
  $totalpp_fila = $fppnoincorporadas_col1['total'] +$fppnoincorporadas_col2['total'];
  $sumatotalppnoincorporadas = $sumatotalppnoincorporadas + $totalpp_fila;
  ?>
  <tr style="border: 3px solid black;">
    <td style="text-align:left; border: 3px solid black;"><b><?php echo $serviciomedico; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fppnoincorporadas_col1['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fppnoincorporadas_col2['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalpp_fila; ?></b></td>
  </tr>
  <?php
}
////////////////////////////////////////////////////////////////////////////////
?>
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "TOTAL"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalppnoincorporadas_col1; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalppnoincorporadas_col2; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $sumatotalppnoincorporadas; ?></b></td>
</tr>
