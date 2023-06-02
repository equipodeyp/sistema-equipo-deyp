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
$perpropmujer = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.estatus = 'PERSONA PROPUESTA' AND datospersonales.sexopersona = 'MUJER'
AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '$diamesinicio' AND '$diamesfin'";
$rperpropmujer = $mysqli->query($perpropmujer);
$fperpropmujer = $rperpropmujer->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$perprophombre = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.estatus = 'PERSONA PROPUESTA' AND datospersonales.sexopersona = 'MUJER'
AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '$diamesinicio' AND '$diamesfin'";
$rperprophombre = $mysqli->query($perprophombre);
$fperprophombre = $rperprophombre->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalperprop = $fperpropmujer['t'] + $fperprophombre['t'];
////////////////////////////////////////////////////////////////////////////////
$totalsujprotmujer = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' AND datospersonales.sexopersona = 'MUJER'
AND datospersonales.relacional ='NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
AND determinacionincorporacion.fecha_inicio BETWEEN '$diamesinicio' AND '$diamesfin'";
$rtotalsujprotmujer = $mysqli->query($totalsujprotmujer);
$ftotalsujprotmujer = $rtotalsujprotmujer->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalsujprohombre = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' AND datospersonales.sexopersona = 'HOMBRE'
AND datospersonales.relacional ='NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
AND determinacionincorporacion.fecha_inicio BETWEEN '$diamesinicio' AND '$diamesfin'";
$rtotalsujprohombre = $mysqli->query($totalsujprohombre);
$ftotalsujprohombre = $rtotalsujprohombre->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalsujprot = $ftotalsujprotmujer['t'] + $ftotalsujprohombre['t'];
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "MUJER"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fperpropmujer['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $ftotalsujprotmujer['t']; echo "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "HOMBRE"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fperprophombre['t']; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $ftotalsujprohombre['t']; echo "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<b>TOTAL</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalperprop; echo "</b>"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalsujprot; echo "</b>"; echo "</td>";
echo "</tr>";
?>
