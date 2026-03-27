<?php
$totalsujdesincorporadoscol_a = 0;
$totalsujdesincorporadoscol_b = 0;
$totalsujdesincorporados = 0;
$calidad = "SELECT * FROM calidadpersona";
$rcalidad = $mysqli->query($calidad);
while ($fcalidad = $rcalidad->fetch_assoc()) {
  $namecalidad = $fcalidad['nombre'];
  if ($fcalidad['nombre'] === 'I. VICTIMA') {
    $namecortocalidad = 'VÍCTIMA';
  }
  if ($fcalidad['nombre'] === 'II. OFENDIDO') {
    $namecortocalidad = 'OFENDIDO';
  }
  if ($fcalidad['nombre'] === 'III. TESTIGO') {
    $namecortocalidad = 'TESTIGO';
  }
  if ($fcalidad['nombre'] === 'IV. COLABORADOR O INFORMANTE') {
    $namecortocalidad = 'COLABORADOR O INFORMANTE';
  }
  if ($fcalidad['nombre'] === 'V. AGENTE DEL MINISTERIO PUBLICO') {
    $namecortocalidad = 'AGENTE DEL MINISTERIO PUBLICO';
  }
  if ($fcalidad['nombre'] === 'VI. DEFENSOR') {
    $namecortocalidad = 'DEFENSOR';
  }
  if ($fcalidad['nombre'] === 'VII. POLICIA') {
    $namecortocalidad = 'POLICÍA';
  }
  if ($fcalidad['nombre'] === 'VIII. PERITO') {
    $namecortocalidad = 'PERITO';
  }
  if ($fcalidad['nombre'] === 'IX. JUEZ O MAGISTRADO DEL PODER JUDICIAL') {
    $namecortocalidad = 'JUEZ O MAGISTRADO DEL PODER JUDICIAL';
  }
  if ($fcalidad['nombre'] === 'X. PERSONA CON PARENTESCO O CERCANIA') {
    $namecortocalidad = 'PERSONA CON PARENTESCO O CERCANÍA';
  }
  //////////////////////////////////////////////////////////////////////////////
  $personaspropuestas = "SELECT COUNT(*) AS t FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND datospersonales.estatus = 'DESINCORPORADO'
  AND determinacionincorporacion.date_desincorporacion BETWEEN '$dateinicial' AND '$fecha_finsemanaanterior'
  AND datospersonales.relacional = 'NO'";
  $rpersonaspropuestas = $mysqli->query($personaspropuestas);
  $fpersonaspropuestas = $rpersonaspropuestas->fetch_assoc();
  $totalsujdesincorporadoscol_a = $totalsujdesincorporadoscol_a + $fpersonaspropuestas['t'];
  //////////////////////////////////////////////////////////////////////////////
  $personaspropuestasreporte = "SELECT COUNT(*) AS t FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND datospersonales.estatus = 'DESINCORPORADO'
  AND determinacionincorporacion.date_desincorporacion BETWEEN '$fecha_inicio' AND '$fecha_fin'
  AND datospersonales.relacional = 'NO'";
  $rpersonaspropuestasreporte = $mysqli->query($personaspropuestasreporte);
  $fpersonaspropuestasreporte = $rpersonaspropuestasreporte->fetch_assoc();
  $totalsujdesincorporadoscol_b = $totalsujdesincorporadoscol_b + $fpersonaspropuestasreporte['t'];
  //////////////////////////////////////////////////////////////////////////////
  $totalsujdesincorporados = $totalsujdesincorporadoscol_a + $totalsujdesincorporadoscol_b;
  //////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////
  $totalacumuladoperprop = $fpersonaspropuestas['t'] + $fpersonaspropuestasreporte['t'];
  if ($fpersonaspropuestas['t'] > 0 || $fpersonaspropuestasreporte['t'] > 0) {
  echo "<tr>";
  echo "<td style='text-align:left; border: 3px solid black; padding-left: 7px; padding-right: 4px;'>"; echo $namecortocalidad; "</td>";
  echo "<td style='text-align:center; border: 3px solid black;'>"; echo $fpersonaspropuestas['t']; "</td>";
  echo "<td style='text-align:center; border: 3px solid black;'>"; echo $fpersonaspropuestasreporte['t']; "</td>";
  echo "<td style='text-align:center; border: 3px solid black;'>"; echo $totalacumuladoperprop; "</td>";
  echo "</tr>";
}
}
echo "<tr>";
echo "<td style='text-align:right; border: 3px solid black; padding-right: 4px;'>"; echo "<b>"; echo 'TOTAL DE PERSONAS'; echo "</b>"; "</td>";
echo "<td style='text-align:center; border: 3px solid black;'>"; echo "<b>"; echo $totalsujdesincorporadoscol_a; echo "</b>"; "</td>";
echo "<td style='text-align:center; border: 3px solid black;'>"; echo "<b>"; echo $totalsujdesincorporadoscol_b; echo "</b>"; "</td>";
echo "<td style='text-align:center; border: 3px solid black;'>"; echo "<b>"; echo $totalsujdesincorporados; echo "</b>"; "</td>";
echo "</tr>";
?>
