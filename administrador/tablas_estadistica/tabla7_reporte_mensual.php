<?php
// calculo de fechas automaticas
$anioActual = date("Y");
$mesActual = date("n");
$cantidadDias = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
// echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
$mesant = $meses[date('n')-2];
$mesanterior = date('n')-1;
$cantidaddiasanterior = cal_days_in_month(CAL_GREGORIAN, $mesanterior, $anioActual);
$fecha_inicio = $anioActual."-01-01";
$fecha_anterior = $anioActual."-".'0'.$mesanterior."-".$cantidaddiasanterior;
$diamesinicio = $anioActual."-".'0'.$mesActual."-01";
$diamesfin = $anioActual."-".'0'.$mesActual."-".$cantidadDias;
$date_principio = $anioActual."-01-01";
$date_termino = $anioActual."-12-31";
////////////////////////////////////////////////////////////////////////////////
// echo "dia inicial---";
// echo $fecha_inicio;
// echo "<br>";
// echo "fecha del mes anterior----";
// echo $fecha_anterior;
// echo "<br>";
// echo "dia del mes de inicio-----";
// echo $diamesinicio;
// echo "<br>";
// echo "dia final del mes actual-----";
// echo $diamesfin;
// echo "<br>";
$calidad = "SELECT calidadpersona, COUNT(*) AS t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE autoridad.fechasolicitud BETWEEN '$date_principio' AND '$date_termino' AND datospersonales.relacional = 'NO'
GROUP BY datospersonales.calidadpersona
HAVING COUNT(*)>0";
$rcalidad = $mysqli->query($calidad);
while ($fcalidad = $rcalidad->fetch_assoc()) {
  $namecalidad =$fcalidad['calidadpersona'];
  //////////////////////////////////////////////////////////////////////////////
  $calant = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud_persona BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
  $rcalant = $mysqli->query($calant);
  $fcalant = $rcalant->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $calreporte = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud_persona BETWEEN '$diamesinicio' AND '$diamesfin'";
  $rcalreporte = $mysqli->query($calreporte);
  $fcalreporte = $rcalreporte->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $totalcalidad = $fcalant['t'] + $fcalreporte['t'];
  //////////////////////////////////////////////////////////////////////////////
  echo "<tr>";
  echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo $fcalidad['calidadpersona']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fcalant['t']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fcalreporte['t']; echo "</td>";
  echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalcalidad; echo "</td>";
  echo "</tr>";
}
////////////////////////////////////////////////////////////////////////////////
$totalanterior = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional ='NO' AND autoridad.fechasolicitud_persona BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$rtotalanterior = $mysqli->query($totalanterior);
$ftotalanterior = $rtotalanterior->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalreporte = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional ='NO' AND autoridad.fechasolicitud_persona BETWEEN '$diamesinicio' AND '$diamesfin'";
$rtotalreporte = $mysqli->query($totalreporte);
$ftotalreporte = $rtotalreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalacumulado = $ftotalanterior['t'] + $ftotalreporte['t'];
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<b>TOTAL DE PERSONAS</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $ftotalanterior['t']; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $ftotalreporte['t']; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalacumulado; echo "</b>"; echo "</td>";
echo "</tr>";
?>
