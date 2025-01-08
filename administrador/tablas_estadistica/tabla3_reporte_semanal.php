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
    case "Monday"://lunes
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
$calidad = "SELECT * FROM calidadpersona";
$rcalidad = $mysqli->query($calidad);
while ($fcalidad = $rcalidad->fetch_assoc()) {
  $namecalidad = $fcalidad['nombre'];
  if ($fcalidad['nombre'] === 'I. VICTIMA') {
    $namecortocalidad = 'VICTIMA';
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
    $namecortocalidad = 'POLICIA';
  }
  if ($fcalidad['nombre'] === 'VIII. PERITO') {
    $namecortocalidad = 'PERITO';
  }
  if ($fcalidad['nombre'] === 'IX. JUEZ O MAGISTRADO DEL PODER JUDICIAL') {
    $namecortocalidad = 'JUEZ O MAGISTRADO DEL PODER JUDICIAL';
  }
  if ($fcalidad['nombre'] === 'X. PERSONA CON PARENTESCO O CERCANIA') {
    $namecortocalidad = 'PERSONA CON PARENTESCO O CERCANIA';
  }

  //////////////////////////////////////////////////////////////////////////////
  $personaspropuestas = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$namecalidad' AND autoridad.fechasolicitud_persona BETWEEN '$dateinicial' AND '$fecha_finsemanaanterior'";
  $rpersonaspropuestas = $mysqli->query($personaspropuestas);
  $fpersonaspropuestas = $rpersonaspropuestas->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $personaspropuestasreporte = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$namecalidad' AND autoridad.fechasolicitud_persona BETWEEN '$fecha_inicio' AND '$fecha_fin'";
  $rpersonaspropuestasreporte = $mysqli->query($personaspropuestasreporte);
  $fpersonaspropuestasreporte = $rpersonaspropuestasreporte->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalperpropuestas = $fpersonaspropuestas['t'] + $fpersonaspropuestasreporte['t'];
  //////////////////////////////////////////////////////////////////////////////
  $perincorporadas = "SELECT COUNT(*) as t  FROM datospersonales
  INNER JOIN determinacionincorporacion on datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$namecalidad' AND determinacionincorporacion.convenio = 'FORMALIZADO'
  AND determinacionincorporacion.fecha_inicio BETWEEN '$dateinicial' AND '$fecha_finsemanaanterior'";
  $rperincorporadas = $mysqli->query($perincorporadas);
  $fperincorporadas = $rperincorporadas->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $perincorporadasreporte = "SELECT COUNT(*) as t  FROM datospersonales
  INNER JOIN determinacionincorporacion on datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$namecalidad' AND determinacionincorporacion.convenio = 'FORMALIZADO'
  AND determinacionincorporacion.fecha_inicio BETWEEN '$fecha_inicio' AND '$fecha_fin'";
  $rperincorporadasreporte = $mysqli->query($perincorporadasreporte);
  $fperincorporadasreporte = $rperincorporadasreporte->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalperincorporadas = $fperincorporadas['t'] + $fperincorporadasreporte['t'];
  //////////////////////////////////////////////////////////////////////////////
  $totalacumuladoperprop = $fpersonaspropuestas['t'] + $fpersonaspropuestas['t'];

  if ($fpersonaspropuestas['t'] > 0 || $fpersonaspropuestasreporte['t'] > 0) {
    echo "<tr>";
    echo "<td style='text-align:left'>"; echo $namecortocalidad; "</td>";
    echo "<td style='text-align:center'>"; echo $fpersonaspropuestas['t']; "</td>";
    echo "<td style='text-align:center'>"; echo $fpersonaspropuestasreporte['t']; "</td>";
    echo "<td style='text-align:center'>"; echo $totalperpropuestas; "</td>";
    echo "<td style='text-align:center'>"; echo $fperincorporadas['t']; "</td>";
    echo "<td style='text-align:center'>"; echo $fperincorporadasreporte['t']; "</td>";
    echo "<td style='text-align:center'>"; echo $totalperincorporadas; "</td>";
    echo "</tr>";
  }
}
////////////////////////////////////////////////////////////////////////////////
$personaspropuestastotal = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud_persona BETWEEN '$dateinicial' AND '$fecha_finsemanaanterior'";
$rpersonaspropuestastotal = $mysqli->query($personaspropuestastotal);
$fpersonaspropuestastotal = $rpersonaspropuestastotal->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$personaspropuestasreportetotal = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud_persona BETWEEN '$fecha_inicio' AND '$fecha_fin'";
$rpersonaspropuestasreportetotal = $mysqli->query($personaspropuestasreportetotal);
$fpersonaspropuestasreportetotal = $rpersonaspropuestasreportetotal->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalperpropacumulado = $fpersonaspropuestastotal['t'] + $fpersonaspropuestasreportetotal['t'];
////////////////////////////////////////////////////////////////////////////////
$perincorporadastotal = "SELECT COUNT(*) as t  FROM datospersonales
INNER JOIN determinacionincorporacion on datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
AND determinacionincorporacion.fecha_inicio BETWEEN '$dateinicial' AND '$fecha_finsemanaanterior'";
$rperincorporadastotal = $mysqli->query($perincorporadastotal);
$fperincorporadastotal = $rperincorporadastotal->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$perincorporadasreportetotal = "SELECT COUNT(*) as t  FROM datospersonales
INNER JOIN determinacionincorporacion on datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
AND determinacionincorporacion.fecha_inicio BETWEEN '$fecha_inicio' AND '$fecha_fin'";
$rperincorporadasreportetotal = $mysqli->query($perincorporadasreportetotal);
$fperincorporadasreportetotal = $rperincorporadasreportetotal->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalperincorporadasacumulado = $fperincorporadastotal['t'] + $fperincorporadasreportetotal['t'];
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='text-align:right'>"; echo "<b>"; echo 'TOTAL DE PERSONAS'; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $fpersonaspropuestastotal['t']; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $fpersonaspropuestasreportetotal['t']; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $totalperpropacumulado; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $fperincorporadastotal['t']; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $fperincorporadasreportetotal['t']; echo "</b>"; "</td>";
echo "<td style='text-align:center'>"; echo "<b>"; echo $totalperincorporadasacumulado; echo "</b>"; "</td>";
echo "</tr>";
?>
