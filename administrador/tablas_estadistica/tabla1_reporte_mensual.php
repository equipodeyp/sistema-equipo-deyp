<?php
$siprocede = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
WHERE valoracionjuridica.resultadovaloracion = 'SI PROCEDE' and expediente.fecha_nueva BETWEEN '2023-01-01' and '2023-04-30'";
$rsiprocede = $mysqli->query($siprocede);
$fsiprocede = $rsiprocede->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$noprocede = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
WHERE valoracionjuridica.resultadovaloracion = 'NO PROCEDE' and expediente.fecha_nueva BETWEEN '2023-01-01' and '2023-04-30'";
$rnoprocede = $mysqli->query($noprocede);
$fnoprocede = $rnoprocede->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$parcialproc = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
WHERE valoracionjuridica.resultadovaloracion = 'PARCIALMENTE PROCEDENTE' and expediente.fecha_nueva BETWEEN '2023-01-01' and '2023-04-30'";
$rparcialproc = $mysqli->query($parcialproc);
$fparcialproc = $rparcialproc->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalanterior = $fsiprocede['t'] + $fnoprocede['t'] + $fparcialproc['t'];
////////////////////////conteo  de datos  de la semana para entregar reporte//////////////////////////////////////
$siprocedereporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
WHERE valoracionjuridica.resultadovaloracion = 'SI PROCEDE' and expediente.fecha_nueva BETWEEN '2023-05-01' and '2023-05-31'";
$rsiprocedereporte = $mysqli->query($siprocedereporte);
$fsiprocedereporte = $rsiprocedereporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$noprocedereporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
WHERE valoracionjuridica.resultadovaloracion = 'NO PROCEDE' and expediente.fecha_nueva BETWEEN '2023-05-01' and '2023-05-31'";
$rnoprocedereporte = $mysqli->query($noprocedereporte);
$fnoprocedereporte = $rnoprocedereporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$parcialprocreporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
WHERE valoracionjuridica.resultadovaloracion = 'PARCIALMENTE PROCEDE' and expediente.fecha_nueva BETWEEN '2023-05-01' and '2023-05-31'";
$rparcialprocreporte = $mysqli->query($parcialprocreporte);
$fparcialprocreporte = $rparcialprocreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalreporte = $fsiprocedereporte['t'] + $fnoprocedereporte['t'] + $fparcialprocreporte['t'];
////////////////totales por fila //////////////////////////////////////////////////////////////////////
$totalsiprocede = $fsiprocede['t'] + $fsiprocedereporte['t'];
////////////////////////////////////////////////////////////////////////////////
$totalnoprocede = $fnoprocede['t'] + $fnoprocedereporte['t'];
////////////////////////////////////////////////////////////////////////////////
$totalparcialproc = $fparcialproc['t'] + $fparcialprocreporte['t'];
////////////////////////////////////////////////////////////////////////////////
$totalacumulado = $totalanterior + $totalreporte;
//inicio de filas para la tabla
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "JURÍDICAMENTE PROCEDENTE "; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fsiprocede['t']; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fsiprocedereporte['t']; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalsiprocede; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "JURÍDICAMENTE NO PROCEDENTE"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fnoprocede['t']; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fnoprocedereporte['t']; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalnoprocede; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "PARCIALMENTE PROCEDENTE"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fparcialproc['t']; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fparcialprocreporte['t']; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalparcialproc; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<b>"; echo "TOTAL DE SOLICITUDES RECIBIDAS"; echo "</b>"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalanterior; echo "</b>"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalreporte; echo "</b>"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalacumulado; echo "</b>"; "</td>";
echo "</tr>";
?>
