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
$perpropmenor = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.estatus = 'PERSONA PROPUESTA' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND datospersonales.calidadpersona = '$namecalidad'
AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '$diamesinicio' AND '$diamesfin'";
$rperpropmenor = $mysqli->query($perpropmenor);
$fperpropmenor = $rperpropmenor->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$perpropmayor = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.estatus = 'PERSONA PROPUESTA' AND datospersonales.grupoedad = 'MAYOR DE EDAD' AND datospersonales.calidadpersona = '$namecalidad'
AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '$diamesinicio' AND '$diamesfin'";
$rperpropmayor = $mysqli->query($perpropmayor);
$fperpropmayor = $rperpropmayor->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalperprop = $fperpropmenor['t'] + $fperpropmayor['t'];
////////////////////////////////////////////////////////////////////////////////
$totalsujprotmenor = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' AND datospersonales.grupoedad = 'MENOR DE EDAD'
AND datospersonales.relacional ='NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
AND determinacionincorporacion.fecha_inicio BETWEEN '$diamesinicio' AND '$diamesfin'";
$rtotalsujprotmenor = $mysqli->query($totalsujprotmenor);
$ftotalsujprotmenor = $rtotalsujprotmenor->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalsujpromayor = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' AND datospersonales.grupoedad = 'MAYOR DE EDAD'
AND datospersonales.relacional ='NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
AND determinacionincorporacion.fecha_inicio BETWEEN '$diamesinicio' AND '$diamesfin'";
$rtotalsujpromayor = $mysqli->query($totalsujpromayor);
$ftotalsujpromayor = $rtotalsujpromayor->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalsujprot = $ftotalsujprotmenor['t'] + $ftotalsujpromayor['t'];
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "MENOR DE EDAD"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fperpropmenor['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $ftotalsujprotmenor['t']; echo "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "MAYOR DE EDAD"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fperpropmayor['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $ftotalsujpromayor['t']; echo "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<b>TOTAL</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalperprop; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalsujprot; echo "</b>"; echo "</td>";
echo "</tr>";
?>
