<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
$totalppnoincorporadas_col1 = 0;
$totalppnoincorporadas_col2 = 0;
$sumatotalppnoincorporadas = 0;
$asistenciasmedicas = "SELECT solicitud_asistencia.servicio_medico, COUNT(*) AS total FROM solicitud_asistencia
INNER JOIN cita_asistencia ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia
WHERE solicitud_asistencia.etapa = 'ASISTENCIA MÉDICA COMPLETADA'
AND cita_asistencia.fecha_asistencia BETWEEN '$dateinicio' AND '$datetermino'
GROUP BY solicitud_asistencia.servicio_medico ORDER BY total DESC, solicitud_asistencia.servicio_medico ASC";
$rasistenciasmedicas = $mysqli->query($asistenciasmedicas);
while ($fasistenciasmedicas = $rasistenciasmedicas->fetch_assoc()) {
  $serviciomedico = $fasistenciasmedicas['servicio_medico'];
  //////////////////////////////////////////////////////////////////////////////
  $ppnoincorporadas_col1 = "SELECT COUNT(*) AS total FROM solicitud_asistencia
  INNER JOIN cita_asistencia ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia
  WHERE solicitud_asistencia.servicio_medico = '$serviciomedico' AND solicitud_asistencia.etapa = 'ASISTENCIA MÉDICA COMPLETADA'
  AND cita_asistencia.fecha_asistencia BETWEEN '$dateinicio_col1' AND '$datefin_col1'";
  $rppnoincorporadas_col1 = $mysqli->query($ppnoincorporadas_col1);
  $fppnoincorporadas_col1 = $rppnoincorporadas_col1->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $ppnoincorporadas_col2 = "SELECT COUNT(*) AS total FROM solicitud_asistencia
  INNER JOIN cita_asistencia ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia
  WHERE solicitud_asistencia.servicio_medico = '$serviciomedico' AND solicitud_asistencia.etapa = 'ASISTENCIA MÉDICA COMPLETADA'
  AND cita_asistencia.fecha_asistencia BETWEEN '$dateinicio_col2' AND '$datefin_col2'";
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
