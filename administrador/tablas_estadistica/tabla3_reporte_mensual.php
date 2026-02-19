<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
$totalppnoincorporadas_col1 = 0;
$totalppnoincorporadas_col2 = 0;
$sumatotalppnoincorporadas = 0;
$ppnoincorporadas = "SELECT calidadpersona, COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.estatus = 'NO INCORPORADO' AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio' AND '$datetermino' AND datospersonales.relacional = 'NO'
GROUP BY datospersonales.calidadpersona ORDER BY total DESC, datospersonales.calidadpersona ASC";
$rppnoincorporadas = $mysqli->query($ppnoincorporadas);
while ($fppnoincorporadas = $rppnoincorporadas->fetch_assoc()) {
  $namecalidad = $fppnoincorporadas['calidadpersona'];
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
  $ppnoincorporadas_col2 = "SELECT COUNT(*) AS total FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE datospersonales.estatus = 'NO INCORPORADO' AND datospersonales.calidadpersona = '$namecalidad'
  AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio_col1' AND '$datefin_col1'
  AND datospersonales.relacional = 'NO'";
  $rppnoincorporadas_col2 = $mysqli->query($ppnoincorporadas_col2);
  $fppnoincorporadas_col2 = $rppnoincorporadas_col2->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $ppnoincorporadas_col2 = "SELECT COUNT(*) AS total FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE datospersonales.estatus = 'NO INCORPORADO' AND datospersonales.calidadpersona = '$namecalidad'
  AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio_col2' AND '$datefin_col2'
  AND datospersonales.relacional = 'NO'";
  $rppnoincorporadas_col2 = $mysqli->query($ppnoincorporadas_col2);
  $fppnoincorporadas_col2 = $rppnoincorporadas_col2->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalppnoincorporadas_col1 = $totalppnoincorporadas_col1 + $fppnoincorporadas_col1['total'];
  $totalppnoincorporadas_col2 = $totalppnoincorporadas_col2 + $fppnoincorporadas_col2['total'];
  $totalppni_fila = $fppnoincorporadas_col1['total'] +$fppnoincorporadas_col2['total'];
  $sumatotalppnoincorporadas = $sumatotalppnoincorporadas + $totalppni_fila;
  ?>
  <tr style="border: 3px solid black;">
    <td style="text-align:left; border: 3px solid black;"><b><?php echo $namecortocalidad; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fppnoincorporadas_col1['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fppnoincorporadas_col2['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalppni_fila; ?></b></td>
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
