<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
$totalpp_col1 = 0;
$totalpp_col2 = 0;
$sumatotalpp = 0;
$personaspropuestas = "SELECT calidadpersona, COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE autoridad.fechasolicitud_persona BETWEEN '$dateinicio' AND '$datetermino' AND datospersonales.relacional = 'NO'
GROUP BY datospersonales.calidadpersona ORDER BY total DESC, datospersonales.calidadpersona ASC";
$rpersonaspropuestas = $mysqli->query($personaspropuestas);
while ($fpersonaspropuestas = $rpersonaspropuestas->fetch_assoc()) {
  $namecalidad = $fpersonaspropuestas['calidadpersona'];
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
  $personaspropuestas_col1 = "SELECT COUNT(*) AS total FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio_col1' AND '$datefin_col1'
  AND datospersonales.relacional = 'NO'";
  $rpersonaspropuestas_col1 = $mysqli->query($personaspropuestas_col1);
  $fpersonaspropuestas_col1 = $rpersonaspropuestas_col1->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $personaspropuestas_col2 = "SELECT COUNT(*) AS total FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio_col2' AND '$datefin_col2'
  AND datospersonales.relacional = 'NO'";
  $rpersonaspropuestas_col2 = $mysqli->query($personaspropuestas_col2);
  $fpersonaspropuestas_col2 = $rpersonaspropuestas_col2->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalpp_col1 = $totalpp_col1 + $fpersonaspropuestas_col1['total'];
  $totalpp_col2 = $totalpp_col2 + $fpersonaspropuestas_col2['total'];
  $totalpp_fila = $fpersonaspropuestas_col1['total'] +$fpersonaspropuestas_col2['total'];
  $sumatotalpp = $sumatotalpp + $totalpp_fila;
  ?>
  <tr style="border: 3px solid black;">
    <td style="text-align:left; border: 3px solid black;"><b><?php echo $namecortocalidad; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fpersonaspropuestas_col1['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fpersonaspropuestas_col2['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalpp_fila; ?></b></td>
  </tr>
  <?php
}
////////////////////////////////////////////////////////////////////////////////
?>
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "TOTAL"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalpp_col1; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalpp_col2; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $sumatotalpp; ?></b></td>
</tr>
