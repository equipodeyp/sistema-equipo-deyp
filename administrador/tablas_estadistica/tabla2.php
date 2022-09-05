<?php
// total del año 2021
$exp_det = "SELECT COUNT(*) AS total FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.fecha_analisis BETWEEN '2021-01-01' AND '2021-12-31'";
$res_exp_det = $mysqli->query($exp_det);
$fila_exp_det = $res_exp_det->fetch_assoc();
// total del mes de enero 2022
$exp_det_enero = "SELECT COUNT(*) AS total FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.fecha_analisis BETWEEN '2022-01-01' AND '2022-01-31'";
$res_exp_det_enero = $mysqli->query($exp_det_enero);
$fila_exp_det_enero = $res_exp_det_enero->fetch_assoc();
//total febrero 2022
$exp_det_febrero = "SELECT COUNT(*) AS total FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.fecha_analisis BETWEEN '2022-02-01' AND '2022-02-28'";
$res_exp_det_febrero = $mysqli->query($exp_det_febrero);
$fila_exp_det_febrero = $res_exp_det_febrero->fetch_assoc();
//total marzo 2022
$exp_det_marzo = "SELECT COUNT(*) AS total FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.fecha_analisis BETWEEN '2022-03-01' AND '2022-03-31'";
$res_exp_det_marzo = $mysqli->query($exp_det_marzo);
$fila_exp_det_marzo = $res_exp_det_marzo->fetch_assoc();
//total abril 2022
$exp_det_abril = "SELECT COUNT(*) AS total FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.fecha_analisis BETWEEN '2022-04-01' AND '2022-04-30'";
$res_exp_det_abril = $mysqli->query($exp_det_abril);
$fila_exp_det_abril = $res_exp_det_abril->fetch_assoc();
//total mayo 2022
$exp_det_mayo = "SELECT COUNT(*) AS total FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.fecha_analisis BETWEEN '2022-05-01' AND '2022-05-31' OR (analisis_expediente.analisis = 'EN ELABORACION' AND analisis_expediente.fecha_inicio BETWEEN '2022-05-01' AND '2022-05-31')";
$res_exp_det_mayo = $mysqli->query($exp_det_mayo);
$fila_exp_det_mayo = $res_exp_det_mayo->fetch_assoc();
//
$exp_det_junio = "SELECT COUNT(*) AS t FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.fecha_analisis BETWEEN '2022-06-01' AND '2022-06-30' OR (analisis_expediente.analisis = 'EN ELABORACION' AND analisis_expediente.fecha_inicio BETWEEN '2022-06-01' AND '2022-06-30')";
$res_exp_det_junio = $mysqli->query($exp_det_junio);
$fila_exp_det_junio = $res_exp_det_junio->fetch_assoc();
//
$exp_det_julio = "SELECT COUNT(*) AS t FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.fecha_analisis BETWEEN '2022-07-01' AND '2022-07-31' OR (analisis_expediente.analisis = 'EN ELABORACION' AND analisis_expediente.fecha_inicio BETWEEN '2022-07-01' AND '2022-07-31')";
$res_exp_det_julio = $mysqli->query($exp_det_julio);
$fila_exp_det_julio = $res_exp_det_julio->fetch_assoc();
//
$exp_det_agosto = "SELECT COUNT(*) AS t FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.fecha_analisis BETWEEN '2022-08-01' AND '2022-08-31' OR (analisis_expediente.analisis = 'EN ELABORACION')";
$res_exp_det_agosto = $mysqli->query($exp_det_agosto);
$fila_exp_det_agosto = $res_exp_det_agosto->fetch_assoc();
//
$exp_det_septiembre = "SELECT COUNT(*) AS t FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.fecha_analisis BETWEEN '2022-09-01' AND '2022-09-30'";
$res_exp_det_septiembre = $mysqli->query($exp_det_septiembre);
$fila_exp_det_septiembre = $res_exp_det_septiembre->fetch_assoc();
//
$exp_det_total2022 = "SELECT COUNT(*) AS t FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
AND analisis_expediente.fecha_analisis BETWEEN '2022-01-01' AND '2022-12-31'";
$res_exp_det_total2022 = $mysqli->query($exp_det_total2022);
$fila_exp_det_total2022 = $res_exp_det_total2022->fetch_assoc();
//
$exp_det_total = "SELECT COUNT(*) AS t FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente";
$res_exp_det_total = $mysqli->query($exp_det_total);
$fila_exp_det_total = $res_exp_det_total->fetch_assoc();
//total incorporacion procedente 2021
$exp_det1 = "SELECT COUNT(*) AS t_procedentes FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' AND  fecha_analisis BETWEEN '2021-01-01' AND '2021-12-31'";
$res_exp_det1 = $mysqli->query($exp_det1);
$fila_exp_det1 = $res_exp_det1->fetch_assoc();
//
$exp_det1_enero = "SELECT COUNT(*) AS t_procedentes FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' AND  fecha_analisis BETWEEN '2022-01-01' AND '2022-01-31'";
$res_exp_det1_enero = $mysqli->query($exp_det1_enero);
$fila_exp_det1_enero = $res_exp_det1_enero->fetch_assoc();
//
$exp_det1_febrero = "SELECT COUNT(*) AS t_procedentes FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' AND  fecha_analisis BETWEEN '2022-02-01' AND '2022-02-28'";
$res_exp_det1_febrero = $mysqli->query($exp_det1_febrero);
$fila_exp_det1_febrero = $res_exp_det1_febrero->fetch_assoc();
//
$exp_det1_marzo = "SELECT COUNT(*) AS t_procedentes FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' AND  fecha_analisis BETWEEN '2022-03-01' AND '2022-03-31'";
$res_exp_det1_marzo = $mysqli->query($exp_det1_marzo);
$fila_exp_det1_marzo = $res_exp_det1_marzo->fetch_assoc();
//
$exp_det1_abril = "SELECT COUNT(*) AS t_procedentes FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' AND  fecha_analisis BETWEEN '2022-04-01' AND '2022-04-30'";
$res_exp_det1_abril = $mysqli->query($exp_det1_abril);
$fila_exp_det1_abril = $res_exp_det1_abril->fetch_assoc();
//
$exp_det1_mayo = "SELECT COUNT(*) AS t_procedentes FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' AND  fecha_analisis BETWEEN '2022-05-01' AND '2022-05-31'";
$res_exp_det1_mayo = $mysqli->query($exp_det1_mayo);
$fila_exp_det1_mayo = $res_exp_det1_mayo->fetch_assoc();
//
$exp_det1_junio = "SELECT COUNT(*) AS t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' AND  fecha_analisis BETWEEN '2022-06-01' AND '2022-06-30'";
$res_exp_det1_junio = $mysqli->query($exp_det1_junio);
$fila_exp_det1_junio = $res_exp_det1_junio->fetch_assoc();
//
$exp_det1_julio = "SELECT COUNT(*) AS t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' AND  fecha_analisis BETWEEN '2022-07-01' AND '2022-07-31'";
$res_exp_det1_julio = $mysqli->query($exp_det1_julio);
$fila_exp_det1_julio = $res_exp_det1_julio->fetch_assoc();
//
$exp_det1_agosto = "SELECT COUNT(*) AS t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' AND  fecha_analisis BETWEEN '2022-08-01' AND '2022-08-31'";
$res_exp_det1_agosto = $mysqli->query($exp_det1_agosto);
$fila_exp_det1_agosto = $res_exp_det1_agosto->fetch_assoc();
//
$exp_det1_septiembre = "SELECT COUNT(*) AS t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' AND  fecha_analisis BETWEEN '2022-09-01' AND '2022-09-30'";
$res_exp_det1_septiembre = $mysqli->query($exp_det1_septiembre);
$fila_exp_det1_septiembre = $res_exp_det1_septiembre->fetch_assoc();
//
$exp_det1_total2022 = "SELECT COUNT(*) AS t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' AND  fecha_analisis BETWEEN '2022-01-01' AND '2022-12-31'";
$res_exp_det1_total2022 = $mysqli->query($exp_det1_total2022);
$fila_exp_det1_total2022 = $res_exp_det1_total2022->fetch_assoc();
//
$exp_det1_total = "SELECT COUNT(*) AS t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE'";
$res_exp_det1_total = $mysqli->query($exp_det1_total);
$fila_exp_det1_total = $res_exp_det1_total->fetch_assoc();
//
$exp_det2 = "SELECT COUNT(*) AS t_no_procedentes FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' AND  fecha_analisis BETWEEN '2021-01-01' AND '2021-12-31'";
$res_exp_det2 = $mysqli->query($exp_det2);
$fila_exp_det2 = $res_exp_det2->fetch_assoc();
//
$exp_det2_enero = "SELECT COUNT(*) AS t_no_procedentes FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' AND  fecha_analisis BETWEEN '2022-01-01' AND '2022-01-31'";
$res_exp_det2_enero = $mysqli->query($exp_det2_enero);
$fila_exp_det2_enero = $res_exp_det2_enero->fetch_assoc();
//
$exp_det2_febrero = "SELECT COUNT(*) AS t_no_procedentes FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' AND  fecha_analisis BETWEEN '2022-02-01' AND '2022-02-28'";
$res_exp_det2_febrero = $mysqli->query($exp_det2_febrero);
$fila_exp_det2_febrero = $res_exp_det2_febrero->fetch_assoc();
//
$exp_det2_marzo = "SELECT COUNT(*) AS t_no_procedentes FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' AND  fecha_analisis BETWEEN '2022-03-01' AND '2022-03-31'";
$res_exp_det2_marzo = $mysqli->query($exp_det2_marzo);
$fila_exp_det2_marzo = $res_exp_det2_marzo->fetch_assoc();
//
$exp_det2_abril = "SELECT COUNT(*) AS t_no_procedentes FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' AND  fecha_analisis BETWEEN '2022-04-01' AND '2022-04-30'";
$res_exp_det2_abril = $mysqli->query($exp_det2_abril);
$fila_exp_det2_abril = $res_exp_det2_abril->fetch_assoc();
//
$exp_det2_mayo = "SELECT COUNT(*) AS t_no_procedentes FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' AND  fecha_analisis BETWEEN '2022-05-01' AND '2022-05-31'";
$res_exp_det2_mayo = $mysqli->query($exp_det2_mayo);
$fila_exp_det2_mayo = $res_exp_det2_mayo->fetch_assoc();
//
$exp_det2_junio = "SELECT COUNT(*) AS t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' AND  fecha_analisis BETWEEN '2022-06-01' AND '2022-06-30'";
$res_exp_det2_junio = $mysqli->query($exp_det2_junio);
$fila_exp_det2_junio = $res_exp_det2_junio->fetch_assoc();
//
$exp_det2_julio = "SELECT COUNT(*) AS t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' AND  fecha_analisis BETWEEN '2022-07-01' AND '2022-07-31'";
$res_exp_det2_julio = $mysqli->query($exp_det2_julio);
$fila_exp_det2_julio = $res_exp_det2_julio->fetch_assoc();
//
$exp_det2_agosto = "SELECT COUNT(*) AS t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' AND  fecha_analisis BETWEEN '2022-08-01' AND '2022-08-31'";
$res_exp_det2_agosto = $mysqli->query($exp_det2_agosto);
$fila_exp_det2_agosto = $res_exp_det2_agosto->fetch_assoc();
//
$exp_det2_septiembre = "SELECT COUNT(*) AS t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' AND  fecha_analisis BETWEEN '2022-09-01' AND '2022-09-30'";
$res_exp_det2_septiembre = $mysqli->query($exp_det2_septiembre);
$fila_exp_det2_septiembre = $res_exp_det2_septiembre->fetch_assoc();
//
$exp_det2_total = "SELECT COUNT(*) AS t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE'";
$res_exp_det2_total = $mysqli->query($exp_det2_total);
$fila_exp_det2_total = $res_exp_det2_total->fetch_assoc();
//
$exp_det2_total2022 = "SELECT COUNT(*) AS t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' AND fecha_analisis BETWEEN '2022-01-01' AND '2022-12-31'";
$res_exp_det2_total2022 = $mysqli->query($exp_det2_total2022);
$fila_exp_det2_total2022 = $res_exp_det2_total2022->fetch_assoc();
//
$exp_det3 = "SELECT COUNT(*) AS en_analisis FROM analisis_expediente
WHERE incorporacion = '' AND  fecha_analisis BETWEEN '2021-01-01' AND '2021-12-31'";
$res_exp_det3 = $mysqli->query($exp_det3);
$fila_exp_det3 = $res_exp_det3->fetch_assoc();
//
$exp_det3_enero = "SELECT COUNT(*) AS en_analisis FROM analisis_expediente
WHERE incorporacion = '' AND  fecha_analisis BETWEEN '2022-01-01' AND '2022-01-31'";
$res_exp_det3_enero = $mysqli->query($exp_det3_enero);
$fila_exp_det3_enero = $res_exp_det3_enero->fetch_assoc();
//
$exp_det3_febrero = "SELECT COUNT(*) AS en_analisis FROM analisis_expediente
WHERE incorporacion = '' AND  fecha_analisis BETWEEN '2022-02-01' AND '2022-12-28'";
$res_exp_det3_febrero = $mysqli->query($exp_det3_febrero);
$fila_exp_det3_febrero = $res_exp_det3_febrero->fetch_assoc();
//
$exp_det3_marzo = "SELECT COUNT(*) AS en_analisis FROM analisis_expediente
WHERE incorporacion = '' AND  fecha_analisis BETWEEN '2022-03-01' AND '2022-13-31'";
$res_exp_det3_marzo = $mysqli->query($exp_det3_marzo);
$fila_exp_det3_marzo = $res_exp_det3_marzo->fetch_assoc();
//
$exp_det3_abril = "SELECT COUNT(*) AS en_analisis FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.incorporacion = '' AND  expediente.fecha_nueva BETWEEN '2022-04-01' AND '2022-04-30'";
$res_exp_det3_abril = $mysqli->query($exp_det3_abril);
$fila_exp_det3_abril = $res_exp_det3_abril->fetch_assoc();
//
$exp_det3_mayo = "SELECT COUNT(*) AS en_analisis FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.incorporacion = '' AND  expediente.fecha_nueva BETWEEN '2022-05-01' AND '2022-05-31'";
$res_exp_det3_mayo = $mysqli->query($exp_det3_mayo);
$fila_exp_det3_mayo = $res_exp_det3_mayo->fetch_assoc();
//
$exp_det3_junio = "SELECT COUNT(*) AS t FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.incorporacion = '' AND  expediente.fecha_nueva BETWEEN '2022-06-01' AND '2022-06-30'";
$res_exp_det3_junio = $mysqli->query($exp_det3_junio);
$fila_exp_det3_junio = $res_exp_det3_junio->fetch_assoc();
//
$exp_det3_julio = "SELECT COUNT(*) AS t FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.incorporacion = '' AND  expediente.fecha_nueva BETWEEN '2022-07-01' AND '2022-07-31'";
$res_exp_det3_julio = $mysqli->query($exp_det3_julio);
$fila_exp_det3_julio = $res_exp_det3_julio->fetch_assoc();
//
$exp_det3_agosto = "SELECT COUNT(*) AS t FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.incorporacion = '' AND  expediente.fecha_nueva BETWEEN '2022-08-01' AND '2022-08-31'";
$res_exp_det3_agosto = $mysqli->query($exp_det3_agosto);
$fila_exp_det3_agosto = $res_exp_det3_agosto->fetch_assoc();
//
$exp_det3_septiembre = "SELECT COUNT(*) AS t FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.incorporacion = '' AND  expediente.fecha_nueva BETWEEN '2022-09-01' AND '2022-09-30'";
$res_exp_det3_septiembre = $mysqli->query($exp_det3_septiembre);
$fila_exp_det3_septiembre = $res_exp_det3_septiembre->fetch_assoc();
//
$exp_det3_total2022 = "SELECT COUNT(*) AS t FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.incorporacion = '' AND  expediente.fecha_nueva BETWEEN '2022-01-01' AND '2022-12-31'";
$res_exp_det3_total2022 = $mysqli->query($exp_det3_total2022);
$fila_exp_det3_total2022 = $res_exp_det3_total2022->fetch_assoc();
//
$exp_det3_total = "SELECT COUNT(*) AS t FROM analisis_expediente
INNER JOIN expediente ON expediente.fol_exp = analisis_expediente.folioexpediente
WHERE analisis_expediente.incorporacion = ''";
$res_exp_det3_total = $mysqli->query($exp_det3_total);
$fila_exp_det3_total = $res_exp_det3_total->fetch_assoc();

  echo "<tr>";
  echo "<td style='text-align:right'>"; echo "INCORPORACION PROCEDENTE"; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det1['t_procedentes']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det1_enero['t_procedentes']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det1_febrero['t_procedentes']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det1_marzo['t_procedentes']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det1_abril['t_procedentes']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det1_mayo['t_procedentes']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det1_junio['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det1_julio['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det1_agosto['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det1_septiembre['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det1_total2022['t']; echo "</td>";
  echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fila_exp_det1_total['t']; echo "</td>";
  echo "</tr>";

  echo "<tr>";
  echo "<td style='text-align:right'>"; echo "INCORPORACION NO PROCEDENTE"; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det2['t_no_procedentes']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det2_enero['t_no_procedentes']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det2_febrero['t_no_procedentes']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det2_marzo['t_no_procedentes']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det2_abril['t_no_procedentes']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det2_mayo['t_no_procedentes']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det2_junio['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det2_julio['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det2_agosto['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det2_septiembre['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det2_total2022['t']; "</td>";
  echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fila_exp_det2_total['t']; "</td>";
  echo "</tr>";

  echo "<tr>";
  echo "<td style='text-align:right'>"; echo "EN ANALISIS *"; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det3['en_analisis']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det3_enero['en_analisis']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det3_febrero['en_analisis']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det3_marzo['en_analisis']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det3_abril['en_analisis']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det3_mayo['en_analisis']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det3_junio['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det3_julio['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det3_agosto['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det3_septiembre['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det3_total2022['t']; echo "</td>";
  echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fila_exp_det3_total['t']; echo "</td>";
  echo "</tr>";
  echo "";

  echo "<tr bgcolor = 'yellow'>";
  echo "<td style='text-align:left'>"; echo "TOTAL DE EXPEDIENTES DETERMINADOS"; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det['total']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det_enero['total']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det_febrero['total']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det_marzo['total']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det_abril['total']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det_mayo['total']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det_junio['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det_julio['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det_agosto['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det_septiembre['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det_total2022['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_exp_det_total['t']; echo "</td>";
  echo "</tr>";
 ?>
