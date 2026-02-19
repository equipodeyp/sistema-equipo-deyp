<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
$totalamotorgadas_col1 = 0;
$totalamotorgadas_col2 = 0;
$sumatotalamotorgadas = 0;
$asistenciasmedicas = "SELECT solicitud_asistencia.servicio_medico, COUNT(*) AS total FROM solicitud_asistencia
INNER JOIN cita_asistencia ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia
WHERE solicitud_asistencia.etapa = 'ASISTENCIA MÉDICA COMPLETADA'
AND cita_asistencia.fecha_asistencia BETWEEN '$dateinicio' AND '$datetermino'
GROUP BY solicitud_asistencia.servicio_medico ORDER BY total DESC, solicitud_asistencia.servicio_medico ASC";
$rasistenciasmedicas = $mysqli->query($asistenciasmedicas);
while ($fasistenciasmedicas = $rasistenciasmedicas->fetch_assoc()) {
  $serviciomedico = $fasistenciasmedicas['servicio_medico'];
  //////////////////////////////////////////////////////////////////////////////
  $amotorgadas_col1 = "SELECT COUNT(*) AS total FROM solicitud_asistencia
  INNER JOIN cita_asistencia ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia
  WHERE solicitud_asistencia.servicio_medico = '$serviciomedico' AND solicitud_asistencia.etapa = 'ASISTENCIA MÉDICA COMPLETADA'
  AND cita_asistencia.fecha_asistencia BETWEEN '$dateinicio_col1' AND '$datefin_col1'";
  $ramotorgadas_col1 = $mysqli->query($amotorgadas_col1);
  $famotorgadas_col1 = $ramotorgadas_col1->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $amotorgadas_col2 = "SELECT COUNT(*) AS total FROM solicitud_asistencia
  INNER JOIN cita_asistencia ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia
  WHERE solicitud_asistencia.servicio_medico = '$serviciomedico' AND solicitud_asistencia.etapa = 'ASISTENCIA MÉDICA COMPLETADA'
  AND cita_asistencia.fecha_asistencia BETWEEN '$dateinicio_col2' AND '$datefin_col2'";
  $ramotorgadas_col2 = $mysqli->query($amotorgadas_col2);
  $famotorgadas_col2 = $ramotorgadas_col2->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalamotorgadas_col1 = $totalamotorgadas_col1 + $famotorgadas_col1['total'];
  $totalamotorgadas_col2 = $totalamotorgadas_col2 + $famotorgadas_col2['total'];
  $totalamotorgadas_fila = $famotorgadas_col1['total'] +$famotorgadas_col2['total'];
  $sumatotalamotorgadas = $sumatotalamotorgadas + $totalamotorgadas_fila;
  ?>
  <tr style="border: 3px solid black;">
    <td style="text-align:left; border: 3px solid black;"><b><?php echo $serviciomedico; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $famotorgadas_col1['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $famotorgadas_col2['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalamotorgadas_fila; ?></b></td>
  </tr>
  <?php
}
////////////////////////////////////////////////////////////////////////////////
?>
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "TOTAL"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalamotorgadas_col1; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalamotorgadas_col2; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $sumatotalamotorgadas; ?></b></td>
</tr>
