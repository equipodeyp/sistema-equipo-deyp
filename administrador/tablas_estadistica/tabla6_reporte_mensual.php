<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
$totalsujfinresguardo_col1 = 0;
$totalsujfinresguardo_col2 = 0;
$sumatotalsujetosfinresguardo = 0;
$sujfinalderesguardo = "SELECT datospersonales.calidadpersona FROM datospersonales
INNER JOIN medidas ON datospersonales.id = medidas.id_persona
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.estatus = 'DESINCORPORADO'
AND determinacionincorporacion.date_desincorporacion BETWEEN '$dateinicio' AND '$datetermino'
AND datospersonales.relacional = 'NO' GROUP BY datospersonales.calidadpersona ORDER BY datospersonales.calidadpersona ASC";
$rsujfinalderesguardo = $mysqli->query($sujfinalderesguardo);
while ($fsujfinalderesguardo = $rsujfinalderesguardo->fetch_assoc()) {
  $namecalidad = $fsujfinalderesguardo['calidadpersona'];
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
  $sujfinalderesguardo_col1 = "SELECT COUNT(DISTINCT medidas.id_persona) AS total FROM datospersonales
  INNER JOIN medidas ON datospersonales.id = medidas.id_persona
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.calidadpersona = '$namecalidad' AND datospersonales.estatus = 'DESINCORPORADO'
  AND determinacionincorporacion.date_desincorporacion BETWEEN '$dateinicio_col1' AND '$datefin_col1'
  AND datospersonales.relacional = 'NO'";
  $rsujfinalderesguardo_col1 = $mysqli->query($sujfinalderesguardo_col1);
  $fsujfinalderesguardo_col1 = $rsujfinalderesguardo_col1->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $sujfinalderesguardo_col2 = "SELECT COUNT(DISTINCT medidas.id_persona) AS total FROM datospersonales
  INNER JOIN medidas ON datospersonales.id = medidas.id_persona
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.calidadpersona = '$namecalidad' AND datospersonales.estatus = 'DESINCORPORADO'
  AND determinacionincorporacion.date_desincorporacion BETWEEN '$dateinicio_col2' AND '$datefin_col2'
  AND datospersonales.relacional = 'NO'";
  $rsujfinalderesguardo_col2 = $mysqli->query($sujfinalderesguardo_col2);
  $fsujfinalderesguardo_col2 = $rsujfinalderesguardo_col2->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalsujfinresguardo_col1 = $totalsujfinresguardo_col1 + $fsujfinalderesguardo_col1['total'];
  $totalsujfinresguardo_col2 = $totalsujfinresguardo_col2 + $fsujfinalderesguardo_col2['total'];
  $totalsujfinresguardo_fila = $fsujfinalderesguardo_col1['total'] +$fsujfinalderesguardo_col2['total'];
  $sumatotalsujetosfinresguardo = $sumatotalsujetosfinresguardo + $totalsujfinresguardo_fila;
  ?>
  <tr style="border: 3px solid black;">
    <td style="text-align:left; border: 3px solid black;"><b><?php echo $namecortocalidad; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fsujfinalderesguardo_col1['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $fsujfinalderesguardo_col2['total']; ?></b></td>
    <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalsujfinresguardo_fila; ?></b></td>
  </tr>
  <?php
}
////////////////////////////////////////////////////////////////////////////////
?>
<tr style="border: 3px solid black;">
  <td style="text-align:right; border: 3px solid black;"><b><?php echo "TOTAL"; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalsujfinresguardo_col1; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $totalsujfinresguardo_col2; ?></b></td>
  <td style="text-align:center; border: 3px solid black;"><b><?php echo $sumatotalsujetosfinresguardo; ?></b></td>
</tr>
