<?php
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
// echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
$fecha_actual = date("Y-m-d");
$day = date("l");
switch ($day) {
    case "Sunday":
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 6 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_actual);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Monday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 5 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Tuesday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 4 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Wednesday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 3 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Thursday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 2 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Friday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 6 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 1 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Saturday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 6 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 7 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 0 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    break;
}
// echo $fecha_fin;
////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
$siprocede = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
WHERE valoracionjuridica.resultadovaloracion = 'SI PROCEDE' and expediente.fecha_nueva BETWEEN '2023-01-01' and '$fecha_finsemanaanterior'";
$rsiprocede = $mysqli->query($siprocede);
$fsiprocede = $rsiprocede->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$noprocede = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
WHERE valoracionjuridica.resultadovaloracion = 'NO PROCEDE' and expediente.fecha_nueva BETWEEN '2023-01-01' and '$fecha_finsemanaanterior'";
$rnoprocede = $mysqli->query($noprocede);
$fnoprocede = $rnoprocede->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$parcialproc = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
WHERE valoracionjuridica.resultadovaloracion = 'PARCIALMENTE PROCEDENTE' and expediente.fecha_nueva BETWEEN '2023-01-01' and '$fecha_finsemanaanterior'";
$rparcialproc = $mysqli->query($parcialproc);
$fparcialproc = $rparcialproc->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalanterior = $fsiprocede['t'] + $fnoprocede['t'] + $fparcialproc['t'];
////////////////////////conteo  de datos  de la semana para entregar reporte//////////////////////////////////////
$siprocedereporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
WHERE valoracionjuridica.resultadovaloracion = 'SI PROCEDE' and expediente.fecha_nueva BETWEEN '$fecha_inicio' and '$fecha_fin'";
$rsiprocedereporte = $mysqli->query($siprocedereporte);
$fsiprocedereporte = $rsiprocedereporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$noprocedereporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
WHERE valoracionjuridica.resultadovaloracion = 'NO PROCEDE' and expediente.fecha_nueva BETWEEN '$fecha_inicio' and '$fecha_fin'";
$rnoprocedereporte = $mysqli->query($noprocedereporte);
$fnoprocedereporte = $rnoprocedereporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$parcialprocreporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
WHERE valoracionjuridica.resultadovaloracion = 'PARCIALMENTE PROCEDE' and expediente.fecha_nueva BETWEEN '$fecha_inicio' and '$fecha_fin'";
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
echo "<td style='text-align:left'>"; echo "JURÍDICAMENTE PROCEDENTE "; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fsiprocede['t']; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fsiprocedereporte['t']; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $totalsiprocede; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo "JURÍDICAMENTE NO PROCEDENTE"; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fnoprocede['t']; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fnoprocedereporte['t']; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $totalnoprocede; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:left'>"; echo "PARCIALMENTE PROCEDENTE"; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fparcialproc['t']; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fparcialprocreporte['t']; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $totalparcialproc; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////echo "<tr>";
echo "<td style='text-align:left'>"; echo "TOTAL DE SOLICITUDES"; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $totalanterior; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $totalreporte; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $totalacumulado; "</td>";
echo "</tr>";
?>