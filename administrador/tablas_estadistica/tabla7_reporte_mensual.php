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
echo "fecha inicio";
echo "<br>";
echo $fecha_inicio = $anioActual."-01-01";
echo "<br>";
echo "fecha anterior";
echo "<br>";
echo $fecha_anterior = $anioActual."-".$mesanterior."-".$cantidaddiasanterior;
echo "<br>";
echo "dia del mes inicial";
echo "<br>";
echo $diamesinicio = $anioActual."-".$mesActual."-01";
echo "<br>";
echo "dia del mes final";
echo "<br>";
echo $diamesfin = $anioActual."-".$mesActual."-".$cantidadDias;
////////////////////////////////////////////////////////////////////////////////
$calidad = "SELECT calidadpersona, COUNT(*) AS t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE autoridad.fechasolicitud BETWEEN '2023-01-01' AND '2023-12-31' AND datospersonales.relacional = 'NO'
GROUP BY datospersonales.calidadpersona
HAVING COUNT(*)>0";
$rcalidad = $mysqli->query($calidad);
while ($fcalidad = $rcalidad->fetch_assoc()) {
  $namecalidad =$fcalidad['calidadpersona'];
  //////////////////////////////////////////////////////////////////////////////
  $calant = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
  $rcalant = $mysqli->query($calant);
  $fcalant = $rcalant->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $calreporte = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE datospersonales.calidadpersona = '$namecalidad' AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '$diamesinicio' AND '$diamesfin'";
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
WHERE datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$rtotalanterior = $mysqli->query($totalanterior);
$ftotalanterior = $rtotalanterior->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalreporte = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '$diamesinicio' AND '$diamesfin'";
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
