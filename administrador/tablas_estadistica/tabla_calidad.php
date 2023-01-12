<?php
// total 2021
$total_wenero = "SELECT COUNT(*) AS total2021 FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE autoridad.fechasolicitud BETWEEN '2021-01-01' AND '2021-12-31' ORDER BY `calidadpersona`";
$rtotal_wenero = $mysqli->query($total_wenero);
$ftotal_wenero = $rtotal_wenero->fetch_assoc();
//total 2022
$total_calper2022 = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud BETWEEN '2022-01-01' AND '2022-12-31'";
$rtotal_calper2022 = $mysqli->query($total_calper2022);
$ftotal_calper2022 = $rtotal_calper2022->fetch_assoc();
//
$total_wenero1 = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE autoridad.fechasolicitud BETWEEN '2022-01-01' AND '2022-01-31' ORDER BY `calidadpersona`";
$rtotal_wenero1 = $mysqli->query($total_wenero1);
$ftotal_wenero1 = $rtotal_wenero1->fetch_assoc();
//
$total_wfebrero = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE autoridad.fechasolicitud BETWEEN '2022-02-01' AND '2022-02-28' ORDER BY `calidadpersona`";
$rtotal_wfebrero = $mysqli->query($total_wfebrero);
$ftotal_wfebrero = $rtotal_wfebrero->fetch_assoc();
//
$total_wmarzo = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE autoridad.fechasolicitud BETWEEN '2022-03-01' AND '2022-03-31' ORDER BY `calidadpersona`";
$rtotal_wmarzo = $mysqli->query($total_wmarzo);
$ftotal_wmarzo = $rtotal_wmarzo->fetch_assoc();
//
$total_wabril = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE autoridad.fechasolicitud BETWEEN '2022-04-01' AND '2022-04-30' ORDER BY `calidadpersona`";
$rtotal_wabril = $mysqli->query($total_wabril);
$ftotal_wabril = $rtotal_wabril->fetch_assoc();
//
$total_wmayo = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud BETWEEN '2022-05-01' AND '2022-05-31' ORDER BY `calidadpersona`";
$rtotal_wmayo = $mysqli->query($total_wmayo);
$ftotal_wmayo = $rtotal_wmayo->fetch_assoc();
//
$total_wjunio = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud BETWEEN '2022-06-01' AND '2022-06-30' ORDER BY `calidadpersona`";
$rtotal_wjunio = $mysqli->query($total_wjunio);
$ftotal_wjunio = $rtotal_wjunio->fetch_assoc();
//
$total_wjulio = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud BETWEEN '2022-07-01' AND '2022-07-31' ORDER BY `calidadpersona`";
$rtotal_wjulio = $mysqli->query($total_wjulio);
$ftotal_wjulio = $rtotal_wjulio->fetch_assoc();
//
$total_wagosto = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud BETWEEN '2022-08-01' AND '2022-08-31' ORDER BY `calidadpersona`";
$rtotal_wagosto = $mysqli->query($total_wagosto);
$ftotal_wagosto = $rtotal_wagosto->fetch_assoc();
//
$total_wseptiembre = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud BETWEEN '2022-09-01' AND '2022-09-30' ORDER BY `calidadpersona`";
$rtotal_wseptiembre = $mysqli->query($total_wseptiembre);
$ftotal_wseptiembre = $rtotal_wseptiembre->fetch_assoc();
//
$total_woctubre = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud BETWEEN '2022-10-01' AND '2022-10-31' ORDER BY `calidadpersona`";
$rtotal_woctubre = $mysqli->query($total_woctubre);
$ftotal_woctubre = $rtotal_woctubre->fetch_assoc();
//
$total_wnoviembre = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud BETWEEN '2022-11-01' AND '2022-11-30' ORDER BY `calidadpersona`";
$rtotal_wnoviembre = $mysqli->query($total_wnoviembre);
$ftotal_wnoviembre = $rtotal_wnoviembre->fetch_assoc();
//
$total_wdiciembre = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud BETWEEN '2022-12-01' AND '2022-12-31' ORDER BY `calidadpersona`";
$rtotal_wdiciembre = $mysqli->query($total_wdiciembre);
$ftotal_wdiciembre = $rtotal_wdiciembre->fetch_assoc();
//
$wtotalcompleto2023 = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud BETWEEN '2023-01-01' AND '2023-12-31'";
$rwtotalcompleto2023 = $mysqli->query($wtotalcompleto2023);
$fwtotalcompleto2023 = $rwtotalcompleto2023->fetch_assoc();
//
$wtotalcompleto = "SELECT COUNT(*) AS total FROM datospersonales
INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
WHERE datospersonales.relacional = 'NO'";
$rwtotalcompleto = $mysqli->query($wtotalcompleto);
$fwtotalcompleto = $rwtotalcompleto->fetch_assoc();
//
$calidadpersona = "SELECT * FROM calidadpersona";
$res = $mysqli->query($calidadpersona);
while ($fila = $res->fetch_assoc()) {
    $r = $fila['nombre'];
    // echo $r;
    $w = "SELECT COUNT(*) AS calidad FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2021-01-01' AND '2021-12-31' ORDER BY `calidadpersona`  ASC;";
    //
    $wenero = "SELECT COUNT(*) AS calidad FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2023-01-01' AND '2023-01-31' ORDER BY `calidadpersona`";
    $rwenero = $mysqli->query($wenero);
    $fwenero = $rwenero->fetch_assoc();
    //
    $wfebrero = "SELECT COUNT(*) AS calidad FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2022-02-01' AND '2022-02-28' ORDER BY `calidadpersona`";
    $rwfebrero = $mysqli->query($wfebrero);
    $fwfebrero = $rwfebrero->fetch_assoc();
    //
    $wmarzo = "SELECT COUNT(*) AS calidad FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2022-03-01' AND '2022-03-31' ORDER BY `calidadpersona`";
    $rwmarzo = $mysqli->query($wmarzo);
    $fwmarzo = $rwmarzo->fetch_assoc();
    //
    $wabril = "SELECT COUNT(*) AS calidad FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2022-04-01' AND '2022-04-30' ORDER BY `calidadpersona`";
    $rwabril = $mysqli->query($wabril);
    $fwabril = $rwabril->fetch_assoc();
    //
    $wmayo = "SELECT COUNT(*) AS calidad FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2022-05-01' AND '2022-05-31' ORDER BY `calidadpersona`";
    $rwmayo = $mysqli->query($wmayo);
    $fwmayo = $rwmayo->fetch_assoc();
    //
    $wjunio = "SELECT COUNT(*) AS calidad FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2022-06-01' AND '2022-06-30' ORDER BY `calidadpersona`";
    $rwjunio = $mysqli->query($wjunio);
    $fwjunio = $rwjunio->fetch_assoc();
    //
    $wjulio = "SELECT COUNT(*) AS calidad FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2022-07-01' AND '2022-07-31' ORDER BY `calidadpersona`";
    $rwjulio = $mysqli->query($wjulio);
    $fwjulio = $rwjulio->fetch_assoc();
    //
    $wagosto = "SELECT COUNT(*) AS calidad FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2022-08-01' AND '2022-08-31' ORDER BY `calidadpersona`";
    $rwagosto = $mysqli->query($wagosto);
    $fwagosto = $rwagosto->fetch_assoc();
    //
    $wseptiembre = "SELECT COUNT(*) AS calidad FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2022-09-01' AND '2022-09-30' ORDER BY `calidadpersona`";
    $rwseptiembre = $mysqli->query($wseptiembre);
    $fwseptiembre = $rwseptiembre->fetch_assoc();
    //
    $woctubre = "SELECT COUNT(*) AS calidad FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2022-10-01' AND '2022-10-31' ORDER BY `calidadpersona`";
    $rwoctubre = $mysqli->query($woctubre);
    $fwoctubre = $rwoctubre->fetch_assoc();
    //
    $wnoviembre = "SELECT COUNT(*) AS calidad FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2022-11-01' AND '2022-11-30' ORDER BY `calidadpersona`";
    $rwnoviembre = $mysqli->query($wnoviembre);
    $fwnoviembre = $rwnoviembre->fetch_assoc();
    //
    $wdiciembre = "SELECT COUNT(*) AS calidad FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2022-12-01' AND '2022-12-31' ORDER BY `calidadpersona`";
    $rwdiciembre = $mysqli->query($wdiciembre);
    $fwdiciembre = $rwdiciembre->fetch_assoc();
    //
    $wtotal2022 = "SELECT COUNT(*) AS total FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2022-01-01' AND '2022-12-31'";
    $rwtotal2022 = $mysqli->query($wtotal2022);
    $fwtotal2022 = $rwtotal2022->fetch_assoc();
    //
    $wtotal2023 = "SELECT COUNT(*) AS total FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND autoridad.fechasolicitud BETWEEN '2023-01-01' AND '2023-12-31'";
    $rwtotal2023 = $mysqli->query($wtotal2023);
    $fwtotal2023 = $rwtotal2023->fetch_assoc();
    //
    $wtotal = "SELECT COUNT(*) AS total FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r'";
    $rwtotal = $mysqli->query($wtotal);
    $fwtotal = $rwtotal->fetch_assoc();
    //
    $ww = $mysqli->query($w);
    if ($ww) {
      while ($www=mysqli_fetch_assoc($ww)) {
        echo "<tr>";
        echo "<td style='text-align:left'>"; echo $fila['nombre']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $www['calidad']; "</td>";
        echo "<td style='text-align:center'>"; echo $fwtotal2022['total']; "</td>";
        echo "<td style='text-align:center'>"; echo $fwenero['calidad']; "</td>";
        // echo "<td style='text-align:center'>"; echo $fwfebrero['calidad']; echo "</td>";
        // echo "<td style='text-align:center'>"; echo $fwmarzo['calidad']; echo "</td>";
        // echo "<td style='text-align:center'>"; echo $fwabril['calidad']; echo "</td>";
        // echo "<td style='text-align:center'>"; echo $fwmayo['calidad']; echo "</td>";
        // echo "<td style='text-align:center'>"; echo $fwjunio['calidad']; echo "</td>";
        // echo "<td style='text-align:center'>"; echo $fwjulio['calidad']; echo "</td>";
        // echo "<td style='text-align:center'>"; echo $fwagosto['calidad']; echo "</td>";
        // echo "<td style='text-align:center'>"; echo $fwseptiembre['calidad']; echo "</td>";
        // echo "<td style='text-align:center'>"; echo $fwoctubre['calidad']; echo "</td>";
        // echo "<td style='text-align:center'>"; echo $fwnoviembre['calidad']; echo "</td>";
        // echo "<td style='text-align:center'>"; echo $fwdiciembre['calidad']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fwtotal2023['total']; "</td>";
        echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fwtotal['total']; "</td>";
        echo "</tr>";
      }
    }
}

echo "<tr bgcolor = 'yellow'>";
echo "<td style='text-align:right'>"; echo " TOTAL DE PERSONAS"; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotal_wenero['total2021']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotal_calper2022['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotal_wenero1['total']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotal_wfebrero['total']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotal_wmarzo['total']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotal_wabril['total']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotal_wmayo['total']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotal_wjunio['total']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotal_wjulio['total']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotal_wagosto['total']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotal_wseptiembre['total']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotal_woctubre['total']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotal_wnoviembre['total']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotal_wdiciembre['total']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fwtotalcompleto2023['total']; "</td>";
echo "<td style='text-align:center'>"; echo $fwtotalcompleto['total']; "</td>";
echo "</tr>";

 ?>
