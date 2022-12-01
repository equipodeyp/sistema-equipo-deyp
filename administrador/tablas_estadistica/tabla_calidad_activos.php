<?php
$tcalidad2021 = "SELECT COUNT(*) AS tcalidad2021 FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2021-01-01' AND '2021-12-31'";
$restcalidad2021 = $mysqli->query($tcalidad2021);
$filatcalidad2021 = $restcalidad2021->fetch_assoc();
//
$tcalidadenero = "SELECT COUNT(*) AS tcalidadenero FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-01-01' AND '2022-01-31'";
$restcalidadenero = $mysqli->query($tcalidadenero);
$filatcalidadenero = $restcalidadenero->fetch_assoc();
//
$tcalidadfebrero = "SELECT COUNT(*) AS tcalidadfebrero FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-02-01' AND '2022-02-28'";
$restcalidadfebrero = $mysqli->query($tcalidadfebrero);
$filatcalidadfebrero = $restcalidadfebrero->fetch_assoc();
//
$tcalidadmarzo = "SELECT COUNT(*) AS tcalidadmarzo FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-03-01' AND '2022-03-31'";
$restcalidadmarzo = $mysqli->query($tcalidadmarzo);
$filatcalidadmarzo = $restcalidadmarzo->fetch_assoc();
//
$tcalidadabril = "SELECT COUNT(*) AS tcalidadabril FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-04-01' AND '2022-04-30'";
$restcalidadabril = $mysqli->query($tcalidadabril);
$filatcalidadabril = $restcalidadabril->fetch_assoc();
//
$tcalidadmayo = "SELECT COUNT(*) AS tcalidadmayo FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-05-01' AND '2022-05-31'";
$restcalidadmayo = $mysqli->query($tcalidadmayo);
$filatcalidadmayo = $restcalidadmayo->fetch_assoc();
//
$tcalidadjunio = "SELECT COUNT(*) AS t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-06-01' AND '2022-06-30'";
$restcalidadjunio = $mysqli->query($tcalidadjunio);
$filatcalidadjunio = $restcalidadjunio->fetch_assoc();
//
$tcalidadjulio = "SELECT COUNT(*) AS t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-07-01' AND '2022-07-31'";
$restcalidadjulio = $mysqli->query($tcalidadjulio);
$filatcalidadjulio = $restcalidadjulio->fetch_assoc();
//
$tcalidadagosto = "SELECT COUNT(*) AS t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-08-01' AND '2022-08-31'";
$restcalidadagosto = $mysqli->query($tcalidadagosto);
$filatcalidadagosto = $restcalidadagosto->fetch_assoc();
//
$tcalidadseptiembre = "SELECT COUNT(*) AS t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-09-01' AND '2022-09-30'";
$restcalidadseptiembre = $mysqli->query($tcalidadseptiembre);
$filatcalidadseptiembre = $restcalidadseptiembre->fetch_assoc();
//
$tcalidadoctubre = "SELECT COUNT(*) AS t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-10-01' AND '2022-10-31'";
$restcalidadoctubre = $mysqli->query($tcalidadoctubre);
$filatcalidadoctubre = $restcalidadoctubre->fetch_assoc();
//
$tcalidadnoviembre = "SELECT COUNT(*) AS t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-11-01' AND '2022-11-30'";
$restcalidadnoviembre = $mysqli->query($tcalidadnoviembre);
$filatcalidadnoviembre = $restcalidadnoviembre->fetch_assoc();
//
$tcalidaddiciembre = "SELECT COUNT(*) AS t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-12-01' AND '2022-12-31'";
$restcalidaddiciembre = $mysqli->query($tcalidaddiciembre);
$filatcalidaddiciembre = $restcalidaddiciembre->fetch_assoc();
//
$tcalidadtotal2022 = "SELECT COUNT(*) AS t FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-01-01' AND '2022-12-31'";
$restcalidadtotal2022 = $mysqli->query($tcalidadtotal2022);
$filatcalidadtotal2022 = $restcalidadtotal2022->fetch_assoc();
//
$tcalidadtotal = "SELECT COUNT(*) AS tcalidadtotal FROM datospersonales
INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO'";
$restcalidadtotal = $mysqli->query($tcalidadtotal);
$filatcalidadtotal = $restcalidadtotal->fetch_assoc();
//
//
$calidadpersona = "SELECT * FROM calidadpersona";
$res = $mysqli->query($calidadpersona);
while ($fila = $res->fetch_assoc()) {
    $r = $fila['nombre'];
    //
    $t2021 = "SELECT COUNT(*) AS t2021 FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2021-01-01' AND '2021-12-31'";
    $rest2021 = $mysqli->query($t2021);
    //
    $tenero = "SELECT COUNT(*) AS tenero FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-01-01' AND '2022-01-31'";
    $restenero = $mysqli->query($tenero);
    $filatenero = $restenero->fetch_assoc();
    //
    $tfebrero = "SELECT COUNT(*) AS tfebrero FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-02-01' AND '2022-02-28'";
    $restfebrero = $mysqli->query($tfebrero);
    $filatfebrero = $restfebrero->fetch_assoc();
    //
    $tmarzo = "SELECT COUNT(*) AS tmarzo FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-03-01' AND '2022-03-31'";
    $restmarzo = $mysqli->query($tmarzo);
    $filatmarzo = $restmarzo->fetch_assoc();
    //
    $tabril = "SELECT COUNT(*) AS tabril FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-04-01' AND '2022-04-30'";
    $restabril = $mysqli->query($tabril);
    $filatabril = $restabril->fetch_assoc();
    //
    $tmayo = "SELECT COUNT(*) AS tmayo FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-05-01' AND '2022-05-31'";
    $restmayo = $mysqli->query($tmayo);
    $filatmayo = $restmayo->fetch_assoc();
    //
    $tjunio = "SELECT COUNT(*) AS t FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-06-01' AND '2022-06-30'";
    $restjunio = $mysqli->query($tjunio);
    $filatjunio = $restjunio->fetch_assoc();
    //
    $tjulio = "SELECT COUNT(*) AS t FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-07-01' AND '2022-07-31'";
    $restjulio = $mysqli->query($tjulio);
    $filatjulio = $restjulio->fetch_assoc();
    //
    $tagosto = "SELECT COUNT(*) AS t FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-08-01' AND '2022-08-31'";
    $restagosto = $mysqli->query($tagosto);
    $filatagosto = $restagosto->fetch_assoc();
    //
    $tseptiembre = "SELECT COUNT(*) AS t FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-09-01' AND '2022-09-30'";
    $restseptiembre = $mysqli->query($tseptiembre);
    $filatseptiembre = $restseptiembre->fetch_assoc();
    //
    $toctubre = "SELECT COUNT(*) AS t FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-10-01' AND '2022-10-31'";
    $restoctubre = $mysqli->query($toctubre);
    $filatoctubre = $restoctubre->fetch_assoc();
    //
    $tnoviembre = "SELECT COUNT(*) AS t FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-11-01' AND '2022-11-30'";
    $restnoviembre = $mysqli->query($tnoviembre);
    $filatnoviembre = $restnoviembre->fetch_assoc();
    //
    $tdiciembre = "SELECT COUNT(*) AS t FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-12-01' AND '2022-12-31'";
    $restdiciembre = $mysqli->query($tdiciembre);
    $filatdiciembre = $restdiciembre->fetch_assoc();
    //
    $ttotalcalidad2022 = "SELECT COUNT(*) AS t FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND determinacionincorporacion.date_convenio BETWEEN '2022-01-01' AND '2022-12-31'";
    $resttotalcalidad2022 = $mysqli->query($ttotalcalidad2022);
    $filattotalcalidad2022 = $resttotalcalidad2022->fetch_assoc();
    //
    $ttotalcalidad = "SELECT COUNT(*) AS ttotalcalidad FROM datospersonales
    INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$r' AND datospersonales.estatus = 'SUJETO PROTEGIDO'";
    $resttotalcalidad = $mysqli->query($ttotalcalidad);
    $filattotalcalidad = $resttotalcalidad->fetch_assoc();
    //
    if ($t2021) {
      while ($fila_t2021=mysqli_fetch_assoc($rest2021)) {
        echo "<tr>";
        echo "<td style='text-align:left'>"; echo $fila['nombre']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fila_t2021['t2021']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $filatenero['tenero']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $filatfebrero['tfebrero']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $filatmarzo['tmarzo']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $filatabril['tabril']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $filatmayo['tmayo']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $filatjunio['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $filatjulio['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $filatagosto['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $filatseptiembre['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $filatoctubre['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $filatnoviembre['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $filatdiciembre['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $filattotalcalidad2022['t']; echo "</td>";
        echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $filattotalcalidad['ttotalcalidad']; echo "</td>";
        echo "</tr>";
      }
    }
}

echo "<tr bgcolor='yellow'>";
echo "<td style='text-align:right'>"; echo " TOTAL DE SUJETOS PROTEGIDOS"; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidad2021['tcalidad2021']; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadenero['tcalidadenero']; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadfebrero['tcalidadfebrero']; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadmarzo['tcalidadmarzo']; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadabril['tcalidadabril'];echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadmayo['tcalidadmayo']; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadjunio['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadjulio['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadagosto['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadseptiembre['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadoctubre['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadnoviembre['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidaddiciembre['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadtotal2022['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $filatcalidadtotal['tcalidadtotal']; echo "</td>";
echo "</tr>";
?>
