<?php
////////////////////////////////////////////////////////////////////////////////
$menoredad = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND determinacionincorporacion.convenio = 'FORMALIZADO'";
$rmenoredad = $mysqli ->query($menoredad);
$fmenoredad = $rmenoredad->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$mayoredad = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.grupoedad = 'MAYOR DE EDAD' AND determinacionincorporacion.convenio = 'FORMALIZADO'";
$rmayoredad = $mysqli ->query($mayoredad);
$fmayoredad = $rmayoredad->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totaledad = $fmenoredad['t'] + $fmayoredad['t'];
////////////////////////////////////////////////////////////////////////////////
$mujeres = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.sexopersona = 'MUJER' AND determinacionincorporacion.convenio = 'FORMALIZADO'";
$rmujeres = $mysqli ->query($mujeres);
$fmujeres = $rmujeres->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$hombres = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.sexopersona = 'HOMBRE' AND determinacionincorporacion.convenio = 'FORMALIZADO'";
$rhombres = $mysqli ->query($hombres);
$fhombres = $rhombres->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalsexo = $fmujeres['t'] + $fhombres['t'];
////////////////////////////////////////////////////////////////////////////////
$menoredadenresguardo = "SELECT COUNT(DISTINCT medidas.id_persona) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
INNER JOIN medidas ON datospersonales.id = medidas.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.grupoedad = 'MENOR DE EDAD'
AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus != 'CANCELADA'";
$rmenoredadenresguardo = $mysqli->query($menoredadenresguardo);
$fmenoredadenresguardo = $rmenoredadenresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$mayoredadenresguardo = "SELECT COUNT(DISTINCT medidas.id_persona) AS t FROM `datospersonales`
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
INNER JOIN medidas ON datospersonales.id = medidas.id_persona
WHERE datospersonales.grupoedad = 'MAYOR DE EDAD' AND datospersonales.relacional = 'NO'
AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'";
$rmayoredadenresguardo = $mysqli->query($mayoredadenresguardo);
$fmayoredadenresguardo = $rmayoredadenresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totaledadenresguardo = $fmenoredadenresguardo['t'] + $fmayoredadenresguardo['t'];
////////////////////////////////////////////////////////////////////////////////
$mujeresenresguardo = "SELECT COUNT(DISTINCT medidas.id_persona) AS t FROM `datospersonales`
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
INNER JOIN medidas ON datospersonales.id = medidas.id_persona
WHERE datospersonales.relacional = 'NO'
AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.sexopersona = 'MUJER'";
$rmujeresenresguardo = $mysqli->query($mujeresenresguardo);
$fmujeresenresguardo = $rmujeresenresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$hombresenresguardo = "SELECT COUNT(DISTINCT medidas.id_persona) AS t FROM `datospersonales`
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
INNER JOIN medidas ON datospersonales.id = medidas.id_persona
WHERE datospersonales.sexopersona = 'HOMBRE' AND datospersonales.relacional = 'NO'
AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'";
$rhombresenresguardo = $mysqli->query($hombresenresguardo);
$fhombresenresguardo = $rhombresenresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalsexoenresguardo = $fmujeresenresguardo['t'] + $fhombresenresguardo['t'];
echo "<tr>";
echo "<td style='text-align:left'>"; echo "MENOR DE EDAD "; "</td>";
echo "<td style='text-align:center'>"; echo $fmenoredad['t']; "</td>";
echo "<td style='text-align:center'>"; echo $fmenoredadenresguardo['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo "MAYOR DE EDAD
"; "</td>";
echo "<td style='text-align:center'>"; echo $fmayoredad['t']; "</td>";
echo "<td style='text-align:center'>"; echo $fmayoredadenresguardo['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:right'>"; echo "<b>"; echo "TOTAL"; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $totaledad; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $totaledadenresguardo; echo "</b>"; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo "TOTAL MUJERES"; "</td>";
echo "<td style='text-align:center'>"; echo $fmujeres['t']; "</td>";
echo "<td style='text-align:center'>"; echo $fmujeresenresguardo['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo "TOTAL HOMBRES"; "</td>";
echo "<td style='text-align:center'>"; echo $fhombres['t']; "</td>";
echo "<td style='text-align:center'>"; echo $fhombresenresguardo['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:right'>"; echo "<b>"; echo "TOTAL"; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $totalsexo; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $totalsexoenresguardo; echo "</b>"; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
?>
