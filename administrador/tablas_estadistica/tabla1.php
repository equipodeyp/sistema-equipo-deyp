<?php
// inicio de año  2021
$year2021 = "SELECT COUNT(DISTINCT folioexpediente) AS cant FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2021-01-01' AND '2021-12-31'";
$resyear2021 = $mysqli->query($year2021);
$fila_yaer2021 = $resyear2021->fetch_assoc();
// año total2022
$year2022 = "SELECT COUNT(DISTINCT folioexpediente) AS cant FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2022-01-01' AND '2022-12-31'";
$resyear2022 = $mysqli->query($year2022);
$fila_year2022 = $resyear2022->fetch_assoc();
//
$year2021NOPROC = "SELECT COUNT(DISTINCT folioexpediente) AS cant1 FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'no procede' AND expediente.fecha_nueva BETWEEN '2021-01-01' AND '2021-12-31'";
$resyear2021NOPROC = $mysqli->query($year2021NOPROC);
$fila_year2021NOPROC = $resyear2021NOPROC->fetch_assoc();
// fin  del año 2021
// inicio de no procedentes del año 2022
$year2022NOPROC = "SELECT COUNT(DISTINCT folioexpediente) AS cant1 FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'no procede' AND expediente.fecha_nueva BETWEEN '2022-01-01' AND '2022-12-31'";
$resyear2022NOPROC = $mysqli->query($year2022NOPROC);
$fila_year2022NOPROC = $resyear2022NOPROC->fetch_assoc();
// inicio de si procedentes del año 2022
$total_enero = "SELECT COUNT(DISTINCT folioexpediente) AS total_enero FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-01-31'";
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
$total_junio = "SELECT COUNT(DISTINCT folioexpediente) AS total_junio FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2022-06-01' AND '2022-06-30'";
$res_total_junio = $mysqli->query($total_junio);
$fila_total_junio = $res_total_junio->fetch_assoc();
//
$total_julio = "SELECT COUNT(DISTINCT folioexpediente) AS total_julio FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2022-07-01' AND '2022-07-31'";
$res_total_julio = $mysqli->query($total_julio);
$fila_total_julio = $res_total_julio->fetch_assoc();
//
$total_agosto = "SELECT COUNT(DISTINCT folioexpediente) AS total_agosto FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2022-08-01' AND '2022-08-31'";
$res_total_agosto = $mysqli->query($total_agosto);
$fila_total_agosto = $res_total_agosto->fetch_assoc();
//
$total_septiembre = "SELECT COUNT(DISTINCT folioexpediente) AS total_septiembre FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2022-09-01' AND '2022-09-30'";
$res_total_septiembre = $mysqli->query($total_septiembre);
$fila_total_septiembre = $res_total_septiembre->fetch_assoc();
//
$total_octubre = "SELECT COUNT(DISTINCT folioexpediente) AS total_octubre FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2022-10-01' AND '2022-10-31'";
$res_total_octubre = $mysqli->query($total_octubre);
$fila_total_octubre = $res_total_octubre->fetch_assoc();
//
$total_noviembre = "SELECT COUNT(DISTINCT folioexpediente) AS total_noviembre FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2022-11-01' AND '2022-11-30'";
$res_total_noviembre = $mysqli->query($total_noviembre);
$fila_total_noviembre = $res_total_noviembre->fetch_assoc();
//
$total_diciembre = "SELECT COUNT(DISTINCT folioexpediente) AS total_diciembre FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2022-12-01' AND '2022-12-31'";
$res_total_diciembre = $mysqli->query($total_diciembre);
$fila_total_diciembre = $res_total_diciembre->fetch_assoc();
//
$total2023si = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede' AND expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-12-31'";
$res_total2023si = $mysqli->query($total2023si);
$fila_total2023si = $res_total2023si->fetch_assoc();
//
$total2022si = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion = 'si procede'";
$res_total2022si = $mysqli->query($total2022si);
$fila_total2022sistema = $res_total2022si->fetch_assoc();
//fin de si procedentes del año 2022
// inicio de no procedentes del año 2022
$totalenero = "SELECT COUNT(DISTINCT folioexpediente) AS enerototal FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-01-31'";
$restotalenero = $mysqli->query($totalenero);
$fila_totalenero = $restotalenero->fetch_assoc();
//
$totalfebrero = "SELECT COUNT(DISTINCT folioexpediente) AS febrerototal FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2022-02-01' AND '2022-02-28'";
$restotalfebrero = $mysqli->query($totalfebrero);
$fila_totalfebrero = $restotalfebrero->fetch_assoc();
//
$totalmarzo = "SELECT COUNT(DISTINCT folioexpediente) AS marzototal FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2022-03-01' AND '2022-03-31'";
$restotalmarzo = $mysqli->query($totalmarzo);
$fila_totalmarzo = $restotalmarzo->fetch_assoc();
//
$totalabril = "SELECT COUNT(DISTINCT folioexpediente) AS abriltotal FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2022-04-01' AND '2022-04-30'";
$restotalabril = $mysqli->query($totalabril);
$fila_totalabril = $restotalabril->fetch_assoc();
//
$totalmayo = "SELECT COUNT(DISTINCT folioexpediente) AS mayototal FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2022-05-01' AND '2022-05-31'";
$restotalmayo = $mysqli->query($totalmayo);
$fila_totalmayo = $restotalmayo->fetch_assoc();
//
$totaljunio = "SELECT COUNT(DISTINCT folioexpediente) AS juniototal FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2022-06-01' AND '2022-06-30'";
$restotaljunio = $mysqli->query($totaljunio);
$fila_totaljunio = $restotaljunio->fetch_assoc();
//
$totaljulio = "SELECT COUNT(DISTINCT folioexpediente) AS juliototal FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2022-07-01' AND '2022-07-31'";
$restotaljulio = $mysqli->query($totaljulio);
$fila_totaljulio = $restotaljulio->fetch_assoc();
//
$totalagosto = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2022-08-01' AND '2022-08-31'";
$restotalagosto = $mysqli->query($totalagosto);
$fila_totalagosto = $restotalagosto->fetch_assoc();
//
$totalseptiembre = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2022-09-01' AND '2022-09-30'";
$restotalseptiembre = $mysqli->query($totalseptiembre);
$fila_totalseptiembre = $restotalseptiembre->fetch_assoc();
//
$totaloctubre = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2022-10-01' AND '2022-10-31'";
$restotaloctubre = $mysqli->query($totaloctubre);
$fila_totaloctubre = $restotaloctubre->fetch_assoc();
//
$totalnoviembre = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2022-11-01' AND '2022-11-30'";
$restotalnoviembre = $mysqli->query($totalnoviembre);
$fila_totalnoviembre = $restotalnoviembre->fetch_assoc();
//
$totaldiciembre = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2022-12-01' AND '2022-12-31'";
$restotaldiciembre = $mysqli->query($totaldiciembre);
$fila_totaldiciembre = $restotaldiciembre->fetch_assoc();
//
$total2023no = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede' AND expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-01-31'";
$restotal2023no = $mysqli->query($total2023no);
$fila_total2023no = $restotal2023no->fetch_assoc();
//
$total2022nosistema = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE valoracionjuridica.resultadovaloracion != 'si procede'";
$restotal2022nosistema = $mysqli->query($total2022nosistema);
$fila_total2022nosistema = $restotal2022nosistema->fetch_assoc();
// fin de no procedentes del año 2022
// inicio de totales por año y mes
$year2021total = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2021-01-01' AND '2021-12-31'";
$resyear2021total = $mysqli->query($year2021total);
$fila_year2021total = $resyear2021total->fetch_assoc();
//
$year2022total = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2022-01-01' AND '2022-12-31'";
$resyear2022total = $mysqli->query($year2022total);
$fila_year2022total = $resyear2022total->fetch_assoc();
//
$enerototal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-01-31'";
$resenerototal = $mysqli->query($enerototal);
$fila_enerototal = $resenerototal->fetch_assoc();
//
$febrerototal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2022-02-01' AND '2022-02-28'";
$resfebrerototal = $mysqli->query($febrerototal);
$fila_febrerototal = $resfebrerototal->fetch_assoc();
//
$marzototal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2022-03-01' AND '2022-03-31'";
$resmarzototal = $mysqli->query($marzototal);
$fila_marzototal = $resmarzototal->fetch_assoc();
//
$abriltotal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2022-04-01' AND '2022-04-30'";
$resabriltotal = $mysqli->query($abriltotal);
$fila_abriltotal = $resabriltotal->fetch_assoc();
//
$mayototal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2022-05-01' AND '2022-05-31'";
$resmayototal = $mysqli->query($mayototal);
$fila_mayototal = $resmayototal->fetch_assoc();
//
$juniototal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2022-06-01' AND '2022-06-30'";
$resjuniototal = $mysqli->query($juniototal);
$fila_juniototal = $resjuniototal->fetch_assoc();
//
$juliototal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2022-07-01' AND '2022-07-31'";
$resjuliototal = $mysqli->query($juliototal);
$fila_juliototal = $resjuliototal->fetch_assoc();
//
$agostototal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2022-08-01' AND '2022-08-31'";
$resagostototal = $mysqli->query($agostototal);
$fila_agostototal = $resagostototal->fetch_assoc();
//
$septiembretotal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2022-09-01' AND '2022-09-30'";
$resseptiembretotal = $mysqli->query($septiembretotal);
$fila_septiembretotal = $resseptiembretotal->fetch_assoc();
//
$octubretotal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2022-10-01' AND '2022-10-31'";
$resoctubretotal = $mysqli->query($octubretotal);
$fila_octubretotal = $resoctubretotal->fetch_assoc();
//
$noviembretotal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2022-11-01' AND '2022-11-30'";
$resnoviembretotal = $mysqli->query($noviembretotal);
$fila_noviembretotal = $resnoviembretotal->fetch_assoc();
//
$diciembretotal = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2022-12-01' AND '2022-12-31'";
$resdiciembretotal = $mysqli->query($diciembretotal);
$fila_diciembretotal = $resdiciembretotal->fetch_assoc();
//total 2022
$total2023 = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp
WHERE expediente.fecha_nueva BETWEEN '2023-01-01' AND '2023-12-31'";
$restotal2023 = $mysqli->query($total2023);
$fila_total2023 = $restotal2023->fetch_assoc();
// total del sistema
$totalsistema = "SELECT COUNT(DISTINCT folioexpediente) AS t FROM valoracionjuridica
INNER JOIN expediente ON valoracionjuridica.folioexpediente = expediente.fol_exp";
$restotalsistema = $mysqli->query($totalsistema);
$fila_totalsistema = $restotalsistema->fetch_assoc();


  echo "<tr>";
  echo "<td style='text-align:left'>"; echo "JURIDICAMENTE PROCEDENTES"; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_yaer2021['cant']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_year2022['cant']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total_enero['total_enero']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_total_febrero['total_febrero']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_total_marzo['total_marzo']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_total_abril['total_abril']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_total_mayo['total_mayo']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_total_junio['total_junio']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_total_julio['total_julio']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_total_agosto['total_agosto']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_total_septiembre['total_septiembre']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_total_octubre['total_octubre']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_total_noviembre['total_noviembre']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_total_diciembre['total_diciembre']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total2023si['t']; echo "</td>";
  echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fila_total2022sistema['t']; echo "</td>";
  echo "</tr>";

  echo "<tr>";
  echo "<td style='text-align:left'>"; echo "JURIDICAMENTE NO PROCEDENTES"; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_year2021NOPROC['cant1']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_year2022NOPROC['cant1']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_totalenero['enerototal']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_totalfebrero['febrerototal']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_totalmarzo['marzototal']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_totalabril['abriltotal']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_totalmayo['mayototal']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_totaljunio['juniototal']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_totaljulio['juliototal']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_totalagosto['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_totalseptiembre['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_totaloctubre['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_totalnoviembre['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_totaldiciembre['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total2023no['t']; echo "</td>";
  echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fila_total2022nosistema['t']; echo "</td>";
  echo "</tr>";

  echo "<tr bgcolor = 'yellow'>";
  echo "<td style='text-align:right'>"; echo "TOTAL SOLICITUDES RECIBIDAS"; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_year2021total['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_year2022total['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_enerototal['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_febrerototal['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_marzototal['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_abriltotal['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_mayototal['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_juniototal['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_juliototal['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_agostototal['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_septiembretotal['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_octubretotal['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_noviembretotal['t']; echo "</td>";
  // echo "<td style='text-align:center'>"; echo $fila_diciembretotal['t']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_total2023['t'];  echo "</td>";
  echo "<td style='text-align:center'>"; echo $fila_totalsistema['t'];  echo "</td>";
  echo "</tr>";

 ?>
