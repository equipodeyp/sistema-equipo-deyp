<?php
$tcalidadtotal = "SELECT COUNT(*) AS tcalidadtotal FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO'";
$restcalidadtotal = $mysqli->query($tcalidadtotal);
$filatcalidadtotal = $restcalidadtotal->fetch_assoc();
//
$tcalidadmujer = "SELECT COUNT(*) AS tcalidadmujer FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND datospersonales.grupoedad = 'MENOR DE EDAD'";
$restcalidadmujer = $mysqli->query($tcalidadmujer);
$filatcalidadmujer = $restcalidadmujer->fetch_assoc();
//
$tcalidadhombre = "SELECT COUNT(*) AS tcalidadhombre FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND datospersonales.grupoedad = 'MAYOR DE EDAD'";
$restcalidadhombre = $mysqli->query($tcalidadhombre);
$filatcalidadhombre = $restcalidadhombre->fetch_assoc();
//
echo "<tr>";
echo "<td style='text-align:center'>"; echo "menor"; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $filatcalidadmujer['tcalidadmujer']; "</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='text-align:center'>"; echo "mayor"; "</td>";
echo "<td style='text-align:center' bgcolor='yellow'>"; echo $filatcalidadhombre['tcalidadhombre']; "</td>";
echo "</tr>";

echo "<tr bgcolor='yellow'>";
echo "<td style='text-align:center'>"; echo "TOTAL"; "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadtotal['tcalidadtotal']; "</td>";
echo "</tr>";
?>
