<?php
$year2021 = "SELECT COUNT(DISTINCT folioexpediente) AS cant FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2021-01-01' AND '2021-12-31'";
$resyear2021 = $mysqli->query($year2021);
$fila_yaer2021 = $resyear2021->fetch_assoc();
//
$year2021NOPROC = "SELECT COUNT(DISTINCT folioexpediente) AS cant1 FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'no procede' AND expediente.fecha_nueva BETWEEN '2021-01-01' AND '2021-12-31'";
$resyear2021NOPROC = $mysqli->query($year2021NOPROC);
$fila_year2021NOPROC = $resyear2021NOPROC->fetch_assoc();
//
$total_enero = "SELECT COUNT(DISTINCT folioexpediente) AS total_enero FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2022-01-01' AND '2022-01-31'";
$res_total_enero = $mysqli->query($total_enero);
$fila_total_enero = $res_total_enero->fetch_assoc();
//
$total_febrero ="SELECT COUNT(DISTINCT folioexpediente) AS total_febrero FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2022-02-01' AND '2022-02-28'";
$res_total_febrero = $mysqli->query($total_febrero);
$fila_total_febrero = $res_total_febrero->fetch_assoc();
//
$total_marzo = "SELECT COUNT(DISTINCT folioexpediente) AS total_marzo FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2022-03-01' AND '2022-03-31'";
$res_total_marzo = $mysqli->query($total_marzo);
$fila_total_marzo = $res_total_marzo->fetch_assoc();
//
$total_abril = "SELECT COUNT(DISTINCT folioexpediente) AS total_abril FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2022-04-01' AND '2022-04-30'";
$res_total_abril = $mysqli->query($total_abril);
$fila_total_abril = $res_total_abril->fetch_assoc();
//
$total_mayo = "SELECT COUNT(DISTINCT folioexpediente) AS total_mayo FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2022-05-01' AND '2022-05-31'";
$res_total_mayo = $mysqli->query($total_mayo);
$fila_total_mayo = $res_total_mayo->fetch_assoc();
//
$totalenero = "SELECT COUNT(DISTINCT folioexpediente) AS enerototal FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2022-05-01' AND '2022-05-31'";
$restotalenero = $mysqli->query($totalenero);
$fila_totalenero = $restotalenero->fetch_assoc();
$totalfebrero = "SELECT COUNT(DISTINCT folioexpediente) AS febrerototal FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2021-01-01' AND '2021-12-31'";
$restotalfebrero = $mysqli->query($totalfebrero);
$fila_totalfebrero = $restotalfebrero->fetch_assoc();
$totalmarzo = "SELECT COUNT(DISTINCT folioexpediente) AS marzototal FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2021-01-01' AND '2021-12-31'";
$restotalmarzo = $mysqli->query($totalmarzo);
$fila_totalmarzo = $restotalmarzo->fetch_assoc();
$totalabril = "SELECT COUNT(DISTINCT folioexpediente) AS abriltotal FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2021-01-01' AND '2021-12-31'";
$restotalabril = $mysqli->query($totalabril);
$fila_totalabril = $restotalabril->fetch_assoc();
$totalmayo = "SELECT COUNT(DISTINCT folioexpediente) AS mayototal FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2021-01-01' AND '2021-12-31'";
$restotalmayo = $mysqli->query($totalmayo);
$fila_totalmayo = $restotalmayo->fetch_assoc();

  echo "<tr>";
  echo "<td style='text-align:center'>"; echo "JURIDICAMENTE PROCEDENTES"; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_yaer2021['cant']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total_enero['total_enero']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total_febrero['total_febrero']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total_marzo['total_marzo']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total_abril['total_abril']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total_mayo['total_mayo']; echo "</td>";
  echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $totalacum =$fila_yaer2021['cant'] + $fila_total_enero['total_enero'] + $fila_total_febrero['total_febrero'] + $fila_total_marzo['total_marzo'] + $fila_total_abril['total_abril'] + $fila_total_mayo['total_mayo']; echo "</td>";
  echo "</tr>";

  echo "<tr>";
  echo "<td style='text-align:center'>"; echo "JURIDICAMENTE NO PROCEDENTES"; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_year2021NOPROC['cant1']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_totalenero['enerototal']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_totalfebrero['febrerototal']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_totalmarzo['marzototal']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_totalabril['abriltotal']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_totalmayo['mayototal']; echo "</td>";
  echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $restnojur = $fila_year2021NOPROC['cant1'] + $fila_totalenero['enerototal']+ $fila_totalfebrero['febrerototal'] + $fila_totalmarzo['marzototal'] +$fila_totalabril['abriltotal'] + $fila_totalmayo['mayototal']; echo "</td>";
  echo "</tr>";

  echo "<tr bgcolor = 'yellow'>";
  echo "<td style='text-align:center'>"; echo "TOTAL SOLICITUDES RECIBIDAS"; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_yaer2021['cant']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total_enero['total_enero']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total_febrero['total_febrero']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total_marzo['total_marzo']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total_abril['total_abril']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total_mayo['total_mayo']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $totalacum =$fila_yaer2021['cant'] + $fila_total_enero['total_enero'] + $fila_total_febrero['total_febrero'] + $fila_total_marzo['total_marzo'] + $fila_total_abril['total_abril'] + $fila_total_mayo['total_mayo']; echo "</td>";
  echo "</tr>";

 ?>
