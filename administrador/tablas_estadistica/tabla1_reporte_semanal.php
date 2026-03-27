<?php
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
// echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
$fecha_actual = date("Y-m-d");
$dateinicial = date("Y-01-01");
$day = date("l");
switch ($day) {
    case "Sunday"://domingo
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
    case "Monday"://LUNES
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 6 day"));
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
    case "Tuesday"://martes
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
    case "Wednesday"://miercoles
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
    case "Thursday"://jueves
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
    case "Friday"://viernes
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
    case "Saturday"://sabado
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
}
// echo $fecha_fin;
////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
// $siprocede = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
// INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
// WHERE valoracionjuridica.resultadovaloracion = 'SI PROCEDE' and expediente.fecha_nueva BETWEEN '$dateinicial' and '$fecha_finsemanaanterior'";
// $rsiprocede = $mysqli->query($siprocede);
// $fsiprocede = $rsiprocede->fetch_assoc();
// ////////////////////////////////////////////////////////////////////////////////
// $noprocede = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
// INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
// WHERE valoracionjuridica.resultadovaloracion = 'NO PROCEDE' and expediente.fecha_nueva BETWEEN '$dateinicial' and '$fecha_finsemanaanterior'";
// $rnoprocede = $mysqli->query($noprocede);
// $fnoprocede = $rnoprocede->fetch_assoc();
// ////////////////////////////////////////////////////////////////////////////////
// $parcialproc = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
// INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
// WHERE valoracionjuridica.resultadovaloracion = 'PARCIALMENTE PROCEDE' and expediente.fecha_nueva BETWEEN '$dateinicial' and '$fecha_finsemanaanterior'";
// $rparcialproc = $mysqli->query($parcialproc);
// $fparcialproc = $rparcialproc->fetch_assoc();
// ////////////////////////////////////////////////////////////////////////////////
// $totalanterior = $fsiprocede['t'] + $fnoprocede['t'] + $fparcialproc['t'];
// ////////////////////////conteo  de datos  de la semana para entregar reporte//////////////////////////////////////
// $siprocedereporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
// INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
// WHERE valoracionjuridica.resultadovaloracion = 'SI PROCEDE' and expediente.fecha_nueva BETWEEN '$fecha_inicio' and '$fecha_fin'";
// $rsiprocedereporte = $mysqli->query($siprocedereporte);
// $fsiprocedereporte = $rsiprocedereporte->fetch_assoc();
// ////////////////////////////////////////////////////////////////////////////////
// $noprocedereporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
// INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
// WHERE valoracionjuridica.resultadovaloracion = 'NO PROCEDE' and expediente.fecha_nueva BETWEEN '$fecha_inicio' and '$fecha_fin'";
// $rnoprocedereporte = $mysqli->query($noprocedereporte);
// $fnoprocedereporte = $rnoprocedereporte->fetch_assoc();
// ////////////////////////////////////////////////////////////////////////////////
// $parcialprocreporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
// INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
// WHERE valoracionjuridica.resultadovaloracion = 'PARCIALMENTE PROCEDE' and expediente.fecha_nueva BETWEEN '$fecha_inicio' and '$fecha_fin'";
// $rparcialprocreporte = $mysqli->query($parcialprocreporte);
// $fparcialprocreporte = $rparcialprocreporte->fetch_assoc();
// ////////////////////////////////////////////////////////////////////////////////
// $totalreporte = $fsiprocedereporte['t'] + $fnoprocedereporte['t'] + $fparcialprocreporte['t'];
// ////////////////totales por fila //////////////////////////////////////////////////////////////////////
// $totalsiprocede = $fsiprocede['t'] + $fsiprocedereporte['t'];
// ////////////////////////////////////////////////////////////////////////////////
// $totalnoprocede = $fnoprocede['t'] + $fnoprocedereporte['t'];
// ////////////////////////////////////////////////////////////////////////////////
// $totalparcialproc = $fparcialproc['t'] + $fparcialprocreporte['t'];
// ////////////////////////////////////////////////////////////////////////////////
// $totalacumulado = $totalanterior + $totalreporte;
// //inicio de filas para la tabla
// if ($fsiprocede['t'] > 0 || $fsiprocedereporte['t'] > 0) {
//   echo "<tr>";
//   echo "<td style='text-align:left'>"; echo "JURÍDICAMENTE PROCEDENTE "; "</td>";
//   echo "<td style='text-align:center'>"; echo $fsiprocede['t']; "</td>";
//   echo "<td style='text-align:center'>"; echo $fsiprocedereporte['t']; "</td>";
//   echo "<td style='text-align:center'>"; echo $totalsiprocede; "</td>";
//   echo "</tr>";
// }
// ////////////////////////////////////////////////////////////////////////////////
// if ($fnoprocede['t'] > 0 || $fnoprocedereporte['t'] > 0) {
//   echo "<tr>";
//   echo "<td style='text-align:left'>"; echo "JURÍDICAMENTE NO PROCEDENTE"; "</td>";
//   echo "<td style='text-align:center'>"; echo $fnoprocede['t']; "</td>";
//   echo "<td style='text-align:center'>"; echo $fnoprocedereporte['t']; "</td>";
//   echo "<td style='text-align:center'>"; echo $totalnoprocede; "</td>";
//   echo "</tr>";
// }
// ////////////////////////////////////////////////////////////////////////////////
// if ($fparcialproc['t'] > 0 || $fparcialprocreporte['t'] > 0) {
//   echo "<tr>";
//   echo "<td style='text-align:left'>"; echo "PARCIALMENTE PROCEDENTE"; "</td>";
//   echo "<td style='text-align:center'>"; echo $fparcialproc['t']; "</td>";
//   echo "<td style='text-align:center'>"; echo $fparcialprocreporte['t']; "</td>";
//   echo "<td style='text-align:center'>"; echo $totalparcialproc; "</td>";
//   echo "</tr>";
// }
// ////////////////////////////////////////////////////////////////////////////////
// echo "<tr>";
// echo "<td style='text-align:right'>"; echo "<b>"; echo "TOTAL DE SOLICITUDES"; echo "</b>"; "</td>";
// echo "<td style='text-align:center'>"; echo "<b>"; echo $totalanterior; echo "</b>"; "</td>";
// echo "<td style='text-align:center'>"; echo "<b>"; echo $totalreporte; echo "</b>"; "</td>";
// echo "<td style='text-align:center'>"; echo "<b>"; echo $totalacumulado; echo "</b>"; "</td>";
// echo "</tr>";
$totalcol1 = 0;
$totalcol2 =0;
$sumatotal = 0;
$solicitudesrecibidas = "SELECT nombreautoridad, COUNT(DISTINCT folioexpediente) AS total FROM autoridad
WHERE fechasolicitud BETWEEN '2026-01-01' AND '2026-12-31'
GROUP BY nombreautoridad ORDER BY total DESC, nombreautoridad ASC";
$rsolicitudesrecibidas = $mysqli->query($solicitudesrecibidas);
while ($fsolicitudesrecibidas = $rsolicitudesrecibidas->fetch_assoc()) {
// Ejemplo de uso:
$nameautoridad = $fsolicitudesrecibidas['nombreautoridad'];

  $solicitudes_col1 = "SELECT COUNT(DISTINCT autoridad.folioexpediente) AS total FROM autoridad
  WHERE nombreautoridad = '$nameautoridad' AND fechasolicitud BETWEEN '$dateinicial' AND '$fecha_finsemanaanterior'";
  $rsolicitudes_col1 = $mysqli->query($solicitudes_col1);
  $fsolicitudes_col1 = $rsolicitudes_col1->fetch_assoc();

  $totalcol1 = $totalcol1 + $fsolicitudes_col1['total'];

  $solicitudes_col2 = "SELECT COUNT(DISTINCT autoridad.folioexpediente) AS total FROM autoridad
  WHERE nombreautoridad = '$nameautoridad' AND fechasolicitud BETWEEN '$fecha_inicio' AND '$fecha_fin'";
  $rsolicitudes_col2 = $mysqli->query($solicitudes_col2);
  $fsolicitudes_col2 = $rsolicitudes_col2->fetch_assoc();

  $totalfila = $fsolicitudes_col1['total'] + $fsolicitudes_col2['total'];
  $totalcol2 = $totalcol2 + $fsolicitudes_col2['total'];
  $sumatotal = $sumatotal + $totalfila;
  echo "<tr>";
    echo "<td style='text-align:left; border: 3px solid black; padding-left: 7px; padding-right: 4px;'>"; echo $nameautoridad; "</td>";
    echo "<td style='text-align:center; border: 3px solid black;'>"; echo $fsolicitudes_col1['total']; "</td>";
    echo "<td style='text-align:center; border: 3px solid black;'>"; echo $fsolicitudes_col2['total']; "</td>";
    echo "<td style='text-align:center; border: 3px solid black;'>"; echo $totalfila; "</td>";
    echo "</tr>";

}
// echo  '<tr bgcolor="#e6e1dc">
// <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:13.33px; color:#97897D;">TOTAL DE SOLICITUDES&nbsp;</h1></td>
// <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalcol1.'</h1></td>
// <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalcol2.'</h1></td>
// <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$sumatotal.'</h1></td>
// </tr>';
echo "<tr>";
  echo "<td style='text-align:right; border: 3px solid black; padding-right: 4px;'>TOTAL DE SOLICITUDES&nbsp;</td>";
  echo "<td style='text-align:center; border: 3px solid black;'>"; echo $totalcol1; "</td>";
  echo "<td style='text-align:center; border: 3px solid black;'>"; echo $totalcol2; "</td>";
  echo "<td style='text-align:center; border: 3px solid black;'>"; echo $sumatotal; "</td>";
  echo "</tr>";
?>
