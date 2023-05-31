<?php
////////////////////////////////////////////////////////////////////////////////
$perpropmujer = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.estatus = 'PERSONA PROPUESTA' AND datospersonales.sexopersona = 'MUJER'
AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '2023-05-01' AND '2023-05-31'";
$rperpropmujer = $mysqli->query($perpropmujer);
$fperpropmujer = $rperpropmujer->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$perprophombre = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.estatus = 'PERSONA PROPUESTA' AND datospersonales.sexopersona = 'MUJER'
AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '2023-05-01' AND '2023-05-31'";
$rperprophombre = $mysqli->query($perprophombre);
$fperprophombre = $rperprophombre->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalperprop = $fperpropmujer['t'] + $fperprophombre['t'];
////////////////////////////////////////////////////////////////////////////////
$totalsujprotmujer = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' AND datospersonales.sexopersona = 'MUJER'
AND datospersonales.relacional ='NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
AND determinacionincorporacion.fecha_inicio BETWEEN '2023-05-01' AND '2023-05-31'";
$rtotalsujprotmujer = $mysqli->query($totalsujprotmujer);
$ftotalsujprotmujer = $rtotalsujprotmujer->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalsujprohombre = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' AND datospersonales.sexopersona = 'HOMBRE'
AND datospersonales.relacional ='NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
AND determinacionincorporacion.fecha_inicio BETWEEN '2023-05-01' AND '2023-05-31'";
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
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "TOTAL"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalperprop; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalsujprot; echo "</td>";
echo "</tr>";
?>
