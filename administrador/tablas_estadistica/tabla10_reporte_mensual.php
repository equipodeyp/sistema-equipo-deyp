<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
$totalppnoincorporadas_col1 = 0;
$totalppnoincorporadas_col2 = 0;
$sumatotalppnoincorporadas = 0;
$asistenciasmedicas = "SELECT react_actividad.entidad_municipio, COUNT(*) AS total FROM react_actividad
WHERE react_actividad.id_subdireccion = '4' AND react_actividad.unidad_medida = 'RONDÍN POLICIAL'
AND react_actividad.fecha BETWEEN '$dateinicio' AND '$datetermino'
GROUP BY react_actividad.entidad_municipio ORDER BY total DESC, react_actividad.entidad_municipio ASC";
$rasistenciasmedicas = $mysqli->query($asistenciasmedicas);
while ($fasistenciasmedicas = $rasistenciasmedicas->fetch_assoc()) {
  $serviciomedico = $fasistenciasmedicas['entidad_municipio'];
  //////////////////////////////////////////////////////////////////////////////
  $ppnoincorporadas_col1 = "SELECT react_actividad.entidad_municipio, COUNT(*) AS total FROM react_actividad
  WHERE react_actividad.entidad_municipio = '$serviciomedico' AND react_actividad.id_subdireccion = '4' AND react_actividad.unidad_medida = 'RONDÍN POLICIAL'
  AND react_actividad.fecha BETWEEN '$dateinicio_col1' AND '$datefin_col1'";
  $rppnoincorporadas_col1 = $mysqli->query($ppnoincorporadas_col1);
  $fppnoincorporadas_col1 = $rppnoincorporadas_col1->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $ppnoincorporadas_col2 = "SELECT react_actividad.entidad_municipio, COUNT(*) AS total FROM react_actividad
  WHERE react_actividad.entidad_municipio = '$serviciomedico' AND react_actividad.id_subdireccion = '4' AND react_actividad.unidad_medida = 'RONDÍN POLICIAL'
  AND react_actividad.fecha BETWEEN '$dateinicio_col2' AND '$datefin_col2'";
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
