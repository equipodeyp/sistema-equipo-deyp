<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
$totalrondines_col1 = 0;
$totalrondines_col2 = 0;
$sumatotalrondines = 0;
$rondines = "SELECT react_actividad.entidad_municipio, COUNT(*) AS total FROM react_actividad
WHERE react_actividad.id_subdireccion = '4' AND react_actividad.unidad_medida = 'RONDÍN POLICIAL'
AND react_actividad.fecha BETWEEN '$dateinicio' AND '$datetermino'
GROUP BY react_actividad.entidad_municipio ORDER BY total DESC, react_actividad.entidad_municipio ASC";
$rrondines = $mysqli->query($rondines);
while ($frondines = $rrondines->fetch_assoc()) {
  $serviciomedico = $frondines['entidad_municipio'];
  //////////////////////////////////////////////////////////////////////////////
  $rondines_col1 = "SELECT react_actividad.entidad_municipio, COUNT(*) AS total FROM react_actividad
  WHERE react_actividad.entidad_municipio = '$serviciomedico' AND react_actividad.id_subdireccion = '4' AND react_actividad.unidad_medida = 'RONDÍN POLICIAL'
  AND react_actividad.fecha BETWEEN '$dateinicio_col1' AND '$datefin_col1'";
  $rrondines_col1 = $mysqli->query($rondines_col1);
  $frondines_col1 = $rrondines_col1->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $rondines_col2 = "SELECT react_actividad.entidad_municipio, COUNT(*) AS total FROM react_actividad
  WHERE react_actividad.entidad_municipio = '$serviciomedico' AND react_actividad.id_subdireccion = '4' AND react_actividad.unidad_medida = 'RONDÍN POLICIAL'
  AND react_actividad.fecha BETWEEN '$dateinicio_col2' AND '$datefin_col2'";
  $rrondines_col2 = $mysqli->query($rondines_col2);
  $frondines_col2 = $rrondines_col2->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalrondines_col1 = $totalrondines_col1 + $frondines_col1['total'];
  $totalrondines_col2 = $totalrondines_col2 + $frondines_col2['total'];
  $totalrondines_fila = $frondines_col1['total'] +$frondines_col2['total'];
  $sumatotalrondines = $sumatotalrondines + $totalrondines_fila;
  ?>
  <tr style="border: 3px solid black;">
    <td style="text-align:left; border: 3px solid black;"><b><?php echo $serviciomedico; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $frondines_col1['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $frondines_col2['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalrondines_fila; ?></b></td>
  </tr>
  <?php
}
////////////////////////////////////////////////////////////////////////////////
?>
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "TOTAL"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalrondines_col1; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalrondines_col2; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $sumatotalrondines; ?></b></td>
</tr>
