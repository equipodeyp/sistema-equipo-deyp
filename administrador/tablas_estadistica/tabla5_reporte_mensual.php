<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
$totalpdesincorporadas_col1 = 0;
$totalpdesincorporadas_col2 = 0;
$sumatotalpdesincorporadas = 0;
$sujetosdesincorporadas = "SELECT calidadpersona, COUNT(*) AS total FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'DESINCORPORADO'
AND determinacionincorporacion.date_desincorporacion BETWEEN '$dateinicio' AND '$datetermino' AND datospersonales.relacional = 'NO'
GROUP BY datospersonales.calidadpersona ORDER BY total DESC, datospersonales.calidadpersona ASC";
$rsujetosdesincorporadas = $mysqli->query($sujetosdesincorporadas);
while ($fsujetosdesincorporadas = $rsujetosdesincorporadas->fetch_assoc()) {
  $namecalidad = $fsujetosdesincorporadas['calidadpersona'];
  if ($namecalidad === 'I. VICTIMA') {
    $namecortocalidad = 'VICTIMA';
  }
  if ($namecalidad === 'II. OFENDIDO') {
    $namecortocalidad = 'OFENDIDO';
  }
  if ($namecalidad === 'III. TESTIGO') {
    $namecortocalidad = 'TESTIGO';
  }
  if ($namecalidad === 'IV. COLABORADOR O INFORMANTE') {
    $namecortocalidad = 'COLABORADOR O INFORMANTE';
  }
  if ($namecalidad === 'V. AGENTE DEL MINISTERIO PUBLICO') {
    $namecortocalidad = 'AGENTE DEL MINISTERIO PUBLICO';
  }
  if ($namecalidad === 'VI. DEFENSOR') {
    $namecortocalidad = 'DEFENSOR';
  }
  if ($namecalidad === 'VII. POLICIA') {
    $namecortocalidad = 'POLICIA';
  }
  if ($namecalidad === 'VIII. PERITO') {
    $namecortocalidad = 'PERITO';
  }
  if ($namecalidad === 'IX. JUEZ O MAGISTRADO DEL PODER JUDICIAL') {
    $namecortocalidad = 'JUEZ O MAGISTRADO DEL PODER JUDICIAL';
  }
  if ($namecalidad === 'X. PERSONA CON PARENTESCO O CERCANIA') {
    $namecortocalidad = 'PERSONA CON PARENTESCO O CERCANIA';
  }
  //////////////////////////////////////////////////////////////////////////////
  $sujetosdesincorporadas_col1 = "SELECT COUNT(*) AS total FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND datospersonales.estatus = 'DESINCORPORADO'
  AND determinacionincorporacion.date_desincorporacion BETWEEN '$dateinicio_col1' AND '$datefin_col1'
  AND datospersonales.relacional = 'NO'";
  $rsujetosdesincorporadas_col1 = $mysqli->query($sujetosdesincorporadas_col1);
  $fsujetosdesincorporadas_col1 = $rsujetosdesincorporadas_col1->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $sujetosdesincorporadas_col2 = "SELECT COUNT(*) AS total FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND datospersonales.estatus = 'DESINCORPORADO'
  AND determinacionincorporacion.date_desincorporacion BETWEEN '$dateinicio_col2' AND '$datefin_col2'
  AND datospersonales.relacional = 'NO'";
  $rsujetosdesincorporadas_col2 = $mysqli->query($sujetosdesincorporadas_col2);
  $fsujetosdesincorporadas_col2 = $rsujetosdesincorporadas_col2->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalpdesincorporadas_col1 = $totalpdesincorporadas_col1 + $fsujetosdesincorporadas_col1['total'];
  $totalpdesincorporadas_col2 = $totalpdesincorporadas_col2 + $fsujetosdesincorporadas_col2['total'];
  $totalsujetosdesincorporados_fila = $fsujetosdesincorporadas_col1['total'] +$fsujetosdesincorporadas_col2['total'];
  $sumatotalpdesincorporadas = $sumatotalpdesincorporadas + $totalsujetosdesincorporados_fila;
  ?>
  <tr style="border: 3px solid black;">
    <td style="text-align:left; border: 3px solid black;"><b><?php echo $namecortocalidad; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fsujetosdesincorporadas_col1['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fsujetosdesincorporadas_col2['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalsujetosdesincorporados_fila; ?></b></td>
  </tr>
  <?php
}
////////////////////////////////////////////////////////////////////////////////
?>
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "TOTAL"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalpdesincorporadas_col1; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalpdesincorporadas_col2; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $sumatotalpdesincorporadas; ?></b></td>
</tr>
