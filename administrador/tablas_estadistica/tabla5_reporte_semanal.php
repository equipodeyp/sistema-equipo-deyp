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
$municipios = "SELECT ejecucion, count(*) as t
FROM medidas
WHERE date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin' AND estatus = 'EJECUTADA'
GROUP BY ejecucion
ORDER BY COUNT(*) DESC";
$rmunicipios = $mysqli->query($municipios);
while ($fmunicipios = $rmunicipios -> fetch_assoc()) {
  $municipio = $fmunicipios['ejecucion'];
  //////////////////////////////////////////////////////////////////////////////
  $ejecutadasasistencia = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin' AND estatus = 'EJECUTADA'
  AND ejecucion = '$municipio' AND clasificacion = 'ASISTENCIA'";
  $rejecutadasasistencia = $mysqli -> query ($ejecutadasasistencia);
  $fejecutadasasistencia = $rejecutadasasistencia->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $ejecutadasresguardo = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin' AND estatus = 'EJECUTADA'
  AND ejecucion = '$municipio' AND clasificacion = 'RESGUARDO'";
  $rejecutadasresguardo = $mysqli -> query ($ejecutadasresguardo);
  $fejecutadasresguardo = $rejecutadasresguardo->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  echo "<tr>";
  echo "<td style='text-align:left'>"; echo $fmunicipios['ejecucion']; "</td>";
  echo "<td style='text-align:center'>"; echo $fejecutadasasistencia['t']; "</td>";
  echo "<td style='text-align:center'>"; echo $fejecutadasresguardo['t']; "</td>";
  echo "<td style='text-align:center'>"; echo $fmunicipios['t']; "</td>";
  echo "</tr>";
}
//////////////////////////////////////////////////////////////////////////////
$totalejecutadasasistencia = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin' AND estatus = 'EJECUTADA'
AND clasificacion = 'ASISTENCIA'";
$rtotalejecutadasasistencia = $mysqli -> query ($totalejecutadasasistencia);
$ftotalejecutadasasistencia = $rtotalejecutadasasistencia->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$totalejecutadasresguardo = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin' AND estatus = 'EJECUTADA'
AND clasificacion = 'RESGUARDO'";
$rtotalejecutadasresguardo = $mysqli -> query ($totalejecutadasresguardo);
$ftotalejecutadasresguardo = $rtotalejecutadasresguardo->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$totalacumulado = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin' AND estatus = 'EJECUTADA'";
$rtotalacumulado = $mysqli -> query ($totalacumulado);
$ftotalacumulado = $rtotalacumulado->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:right'>"; echo "<b>"; echo "TOTAL"; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $ftotalejecutadasasistencia['t']; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $ftotalejecutadasresguardo['t']; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $ftotalacumulado['t']; echo "</b>"; "</td>";
echo "</tr>";
?>
