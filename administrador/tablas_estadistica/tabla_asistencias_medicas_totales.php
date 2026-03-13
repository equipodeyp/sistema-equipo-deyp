<?php
$contador = 0;
$consulta1 = "SELECT *
FROM solicitud_asistencia
ORDER BY solicitud_asistencia.id ASC";
$var_resultado1 = $mysqli->query($consulta1);
while ($var_fila1=$var_resultado1->fetch_array())
{
  $contador = $contador + 1;
  $id_asistencia_m = $var_fila1['id_asistencia'];

  $consulta2 = "SELECT agendar_asistencia.tipo_institucion, agendar_asistencia.nombre_institucion,
  agendar_asistencia.municipio_institucion
  FROM agendar_asistencia
  WHERE agendar_asistencia.id_asistencia = '$id_asistencia_m'
  ORDER BY agendar_asistencia.id ASC";

  $var_resultado2 = $mysqli->query($consulta2);
  $var_fila2=$var_resultado2->fetch_array();

  $consulta3 = "SELECT cita_asistencia.fecha_asistencia, cita_asistencia.hora_asistencia
  FROM cita_asistencia
  WHERE cita_asistencia.id_asistencia = '$id_asistencia_m'
  ORDER BY cita_asistencia.id DESC
  LIMIT 1";

  $var_resultado3 = $mysqli->query($consulta3);
  $var_fila3=$var_resultado3->fetch_array();

  $consulta4 = "SELECT seguimiento_asistencia.traslado_realizado, seguimiento_asistencia.se_presento,
  seguimiento_asistencia.hospitalizacion, seguimiento_asistencia.cita_seguimiento,
  seguimiento_asistencia.diagnostico
  FROM seguimiento_asistencia
  WHERE seguimiento_asistencia.id_asistencia = '$id_asistencia_m'
  ORDER BY seguimiento_asistencia.id DESC
  LIMIT 1";

  $var_resultado4 = $mysqli->query($consulta4);
  $var_fila4=$var_resultado4->fetch_array();

  $consulta5 = "SELECT COUNT(*) as total
  FROM tratamiento_medico
  WHERE tratamiento_medico.id_asistencia = '$id_asistencia_m'";

  $var_resultado5 = $mysqli->query($consulta5);
  $var_fila5=$var_resultado5->fetch_array();

    echo "<tr>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $contador; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila1['folio_expediente']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila1['id_sujeto']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila1['id_asistencia']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila1['fecha_solicitud']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila1['tipo_requerimiento']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila1['servicio_medico']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila1['etapa']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila1['id_servidor']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila2['tipo_institucion']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila2['nombre_institucion']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila2['municipio_institucion']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila3['fecha_asistencia']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila3['hora_asistencia']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila4['traslado_realizado']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila4['se_presento']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila4['hospitalizacion']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila4['cita_seguimiento']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila4['diagnostico']; echo "</td>";
    echo "<td style='text-align:center; border: 1px solid black;'>"; echo $var_fila5['total']; echo "</td>";
    echo "</tr>";
  }
?>
