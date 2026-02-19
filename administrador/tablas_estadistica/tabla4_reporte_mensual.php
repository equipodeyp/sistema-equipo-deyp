<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
$totalpincorporadas_col1 = 0;
$totalpincorporadas_col2 = 0;
$sumatotalpincorporadas = 0;
$sujetosincorporados = "SELECT calidadpersona, COUNT(*) AS total FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE determinacionincorporacion.convenio = 'FORMALIZADO'
AND determinacionincorporacion.fecha_inicio BETWEEN '$dateinicio' AND '$datetermino' AND datospersonales.relacional = 'NO'
GROUP BY datospersonales.calidadpersona ORDER BY total DESC, datospersonales.calidadpersona ASC";
$rsujetosincorporados = $mysqli->query($sujetosincorporados);
while ($fsujetosincorporados = $rsujetosincorporados->fetch_assoc()) {
  $namecalidad = $fsujetosincorporados['calidadpersona'];
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
  $sujetosincorporados_col1 = "SELECT COUNT(*) AS total FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND determinacionincorporacion.convenio = 'FORMALIZADO'
  AND determinacionincorporacion.fecha_inicio BETWEEN '$dateinicio_col1' AND '$datefin_col1'
  AND datospersonales.relacional = 'NO'";
  $rsujetosincorporados_col1 = $mysqli->query($sujetosincorporados_col1);
  $fsujetosincorporados_col1 = $rsujetosincorporados_col1->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $sujetosincorporados_col2 = "SELECT COUNT(*) AS total FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND determinacionincorporacion.convenio = 'FORMALIZADO'
  AND determinacionincorporacion.fecha_inicio BETWEEN '$dateinicio_col2' AND '$datefin_col2'
  AND datospersonales.relacional = 'NO'";
  $rsujetosincorporados_col2 = $mysqli->query($sujetosincorporados_col2);
  $fsujetosincorporados_col2 = $rsujetosincorporados_col2->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalpincorporadas_col1 = $totalpincorporadas_col1 + $fsujetosincorporados_col1['total'];
  $totalpincorporadas_col2 = $totalpincorporadas_col2 + $fsujetosincorporados_col2['total'];
  $totalsujetosincorporados_fila = $fsujetosincorporados_col1['total'] +$fsujetosincorporados_col2['total'];
  $sumatotalpincorporadas = $sumatotalpincorporadas + $totalsujetosincorporados_fila;
  ?>
  <tr style="border: 3px solid black;">
    <td style="text-align:left; border: 3px solid black;"><b><?php echo $namecortocalidad; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fsujetosincorporados_col1['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fsujetosincorporados_col2['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalsujetosincorporados_fila; ?></b></td>
  </tr>
  <?php
}
////////////////////////////////////////////////////////////////////////////////
?>
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "TOTAL"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalpincorporadas_col1; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalpincorporadas_col2; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $sumatotalpincorporadas; ?></b></td>
</tr>
