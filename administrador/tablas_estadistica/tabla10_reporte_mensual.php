<?php
////////////////////////////////////////////////////////////////////////////////
$perpropmenor = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.estatus = 'PERSONA PROPUESTA' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND datospersonales.calidadpersona = '$namecalidad'
AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '2023-05-01' AND '2023-05-31'";
$rperpropmenor = $mysqli->query($perpropmenor);
$fperpropmenor = $rperpropmenor->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$perpropmayor = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.estatus = 'PERSONA PROPUESTA' AND datospersonales.grupoedad = 'MAYOR DE EDAD' AND datospersonales.calidadpersona = '$namecalidad'
AND datospersonales.relacional ='NO' AND autoridad.fechasolicitud BETWEEN '2023-05-01' AND '2023-05-31'";
$rperpropmayor = $mysqli->query($perpropmayor);
$fperpropmayor = $rperpropmayor->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalperprop = $fperpropmenor['t'] + $fperpropmayor['t'];
////////////////////////////////////////////////////////////////////////////////
$totalsujprotmenor = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' AND datospersonales.grupoedad = 'MENOR DE EDAD'
AND datospersonales.relacional ='NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
AND determinacionincorporacion.fecha_inicio BETWEEN '2023-05-01' AND '2023-05-31'";
$rtotalsujprotmenor = $mysqli->query($totalsujprotmenor);
$ftotalsujprotmenor = $rtotalsujprotmenor->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalsujpromayor = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' AND datospersonales.grupoedad = 'MAYOR DE EDAD'
AND datospersonales.relacional ='NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
AND determinacionincorporacion.fecha_inicio BETWEEN '2023-05-01' AND '2023-05-31'";
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
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "TOTAL"; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalperprop; echo "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $totalsujprot; echo "</td>";
echo "</tr>";
?>
