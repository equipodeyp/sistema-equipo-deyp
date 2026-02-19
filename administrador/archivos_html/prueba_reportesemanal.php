<?php
// date_default_timezone_set("America/Mexico_City");
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
// echo " ".date('d')." DE ".$mesone. " DEL ".date('Y') ;
$fecha_actual = date("Y-m-d");
$year = date("Y");
$day = date("l");
$dateprinc = $_POST['dateprinc'];
$datefinprinc  = $_POST['datefinprinc'];
$daterepini = $_POST['daterepini'];
$daterepfin  = $_POST['daterepfin'];
////////////////////////////
$diainicio = strtotime($daterepini);
$diaini = date( "j", $diainicio);
$diafinal = strtotime($daterepfin);
$diafin = date( "j", $diafinal);
///////dias
$diaone = '01';
$diaprevius = date("d", strtotime($datefinprinc));
$dia_inicio_reporte = date("d", strtotime($daterepini));
$dia_fin_reporte = date("d", strtotime($daterepfin));
if ($dia_inicio_reporte > $dia_fin_reporte) {
  $mostrar = "inicio es mayor";
}else {
  $mostrar = "inicio es menor";
}
///////////mes
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
$mesrep = date("m", strtotime($datefinprinc));
if ($dia_inicio_reporte == 1) {
  $mesone =$meses[$mesrep-1];
}else {
  $mesone =$meses[$mesrep-1];
}
$mesrep2 = date("m", strtotime($daterepfin));
if ($dia_inicio_reporte == 1) {
  $mestwo =$meses[$mesrep2];
}else {
  $mestwo =$meses[$mesrep2-1];
}
// $mestwo =$meses[$mesrep];
// fechas en formato dia-mes-año
$dateprin = date("d-m-Y", strtotime($dateprinc));
$dateconclu = date("d-m-Y", strtotime($datefinprinc));
$dateprinrep = date("d-m-Y", strtotime($daterepini));
$dateconclurep = date("d-m-Y", strtotime($daterepfin));
// get year
$fechaComoEntero = strtotime($dateprinrep);
$anio = date("Y", $fechaComoEntero);

require_once '../../mpdf/vendor/autoload.php';
include("../conexion.php");
// css
$css = file_get_contents('../../css/main2.css');
$css2 = file_get_contents('../../css/estiloscrearpdf.css');
$stylesheet = '
    body {
        font-family: "gotham", sans-serif;
    }
    h1 {
        font-family: "gotham";
        font-weight: bold;
    }
    h2 {
        font-family: "gotham";
        font-weight: book;
        font-style: normal;
    }
    h3 {
        font-family: "gotham";
        font-weight: book;
        font-style: italic;
    }

';
// Define las nuevas fuentes personalizadas
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        '../../mpdf/vendor/mpdf/mpdf/ttfonts', // Ruta a la carpeta de fuentes
    ]),
    'fontdata' => $fontData + [
        'gotham' => [
            'R' => 'gotham-book.ttf',
            'B' => 'gotham-bold.ttf',
            'I' => 'gotham-book-italic.ttf',
            // 'BI' => 'Gotham-Bold-Italic.ttf',
        ]
    ],
    'default_font' => 'gotham'
]);
// Grab variables
$mpdf = new \Mpdf\Mpdf([
  'mode' => 'utf-8',
  'format' => [216, 279],
  'default_font_size' => 0,
  'default_font' => '',
  'margin_left' => 10,
  'margin_right' => 8,
  'margin_top' => 35,
  'margin_bottom' => 20,
  'margin_header' => 7,
  'margin_footer' => 6,
  'orientation' => 'L',
    ]);

$mpdf->SetHTMLHeader('<table width="100%">
<tr>
<td width="10%"><img  src="../../image/gobierno2.jpg" width="80" height="90"></td>
<td width="80%" align="center"><h2 align="center" style="font-size: 14px;">Programa de Protección a Sujetos que Intervienen en el Procedimiento <BR>
Penal o de Extinción de Dominio del Estado de México. </h2>
</td>
<td width="10%" style="text-align: right;"><img  src="../../image/FGJEM.jpg" width="52" height="52"></td>
</tr>
</table>');
$mpdf->SetHTMLFooter('<div style="float: left; width: 95%;"><h1 class="izquierda" style="font-size:13px">*NOTA: Cifras sujetas a cambios por actualización</h1></div>
<div style="float: left; width: 5%;">
  <table width="3%" align="right">
    <tr>
      <td  align="center" bgcolor="#63696D" style="height:30vh;">
        <h1 style="color:white;">
        <span style="font-size: 16px; color:white;">{PAGENO}/{nbpg}</span>
        </h1>
      </td>
    </tr>
  </table>
  </h1>
</div>
<table width="100%" cellspacing="0">
  <tr>
    <td width="65%" align="center" bgcolor="#63696D" style="height:30vh;">
      <h1 style="font-size:13px color:white;">
      <span style="font-size: 9px; align:left; width:10px; color:white;">Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio</span>
      </h1>
    </td>
    <td width="35%" align="center" bgcolor="#63696D" style="height:30vh;">
      <h1 style="font-size:13px color:white;">
      <span style="font-size: 9px; align:left; width:10px; color:white;">Subdirección de Estadística y Pre-Registro</span>
      </h1>
    </td>
  </tr>
</table>
');
///////inicio de primer hoja
if ($dia_inicio_reporte > $dia_fin_reporte) {
  $data .= '<div style="display: grid; background-color: white; justify-content: center; align-items: center; max-height: 200px; min-height: 200px; min-width: 100%; max-width: 100%;">
  <h2 style="text-align: center; font-size: 16px;"><strong>Reporte Semanal <br> DEL '.$dia_inicio_reporte.' DE '.$mesone.' AL '.$dia_fin_reporte.' DE '.$mestwo.' DEL '.date("Y").'</strong></h2></div><br>';
}else {
  $data .= '<div style="display: grid; background-color: white; justify-content: center; align-items: center; max-height: 200px; min-height: 200px; min-width: 100%; max-width: 100%;">
  <h2 style="text-align: center; font-size: 16px;"><strong>Reporte Semanal <br> DEL '.$dia_inicio_reporte.'  AL '.$dia_fin_reporte.' DE '.$mestwo.' DEL '.date("Y").'</strong></h2></div><br>';
}

// $data .= '<h1>inicio--->'.$mesone.'</h1><br>';
// $data .= '<h1>fin--->'.$mestwo.'</h1><br>';
// $data .= '<h1>mensaje--->'.$mesrep2.'</h1><br>';
// $data .= '<h1>inicio--->'.$dateprinc.'</h1><br>';
// $data .= '<h1>fin--->'.$datefinprinc.'</h1><br>';
// $data .= '<h1>inicio--->'.$daterepini.'</h1><br>';
// $data .= '<h1>fin--->'.$daterepfin.'</h1><br>';
if ($dia_inicio_reporte > $dia_fin_reporte) {
  $msjreposem = $dia_inicio_reporte.' DE '.$mesone.' AL '.$dia_fin_reporte.' DE '.$mestwo;
}else {
  $msjreposem = $dia_inicio_reporte.' AL '.$dia_fin_reporte.' DE '.$mestwo;
}
//////////////////////////////////////////////////////////////////////
$data .= '<div style="float: left; width: 55%;">
      <table id="tabla1" border="1px" cellspacing="0" width="89.2%" bgcolor="#97897D">
        <thead>
          <tr>
            <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" colspan="4"><h1 style="font-size:13.33px; color:white;">SOLICITUDES RECIBIDAS Y EXPEDIENTES INICIADOS</h1></th>
          </tr>
          <tr>
            <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" rowspan="2"><h1 style="font-size:13.33px; color:white;">CONCEPTO </h1></th>
            <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" colspan="2"><h1 style="font-size:13.33px; color:white;">'.$year.'</h1></th>
            <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:5px;" rowspan="2"><h1 style="font-weight: normal; font-size:11.33px;">TOTAL ACUMULADO </h1></th>
          </tr>
          <tr>
            <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:90px;"><h1 style="font-weight: normal; color:white; font-size:11.33px;">DEL 1 DE ENERO AL '.$diaprevius.' DE '.$mesone.'</h1></th>
            <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:90px;"><h1 style="font-weight: normal; color:white; font-size:11.33px;">DEL '.$msjreposem.'</h1></th>
          </tr>
        </thead>
        <tbody>';
        ////////////////////////////////////////////////////////////////////////////////
        $siprocede = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
        INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
        WHERE valoracionjuridica.resultadovaloracion = 'SI PROCEDE' and expediente.fecha_nueva BETWEEN '$dateprinc' and '$datefinprinc'";
        $rsiprocede = $mysqli->query($siprocede);
        $fsiprocede = $rsiprocede->fetch_assoc();
        ////////////////////////////////////////////////////////////////////////////////
        $noprocede = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
        INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
        WHERE valoracionjuridica.resultadovaloracion = 'NO PROCEDE' and expediente.fecha_nueva BETWEEN '$dateprinc' and '$datefinprinc'";
        $rnoprocede = $mysqli->query($noprocede);
        $fnoprocede = $rnoprocede->fetch_assoc();
        ////////////////////////////////////////////////////////////////////////////////
        $parcialproc = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
        INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
        WHERE valoracionjuridica.resultadovaloracion = 'PARCIALMENTE PROCEDENTE' and expediente.fecha_nueva BETWEEN '$dateprinc' and '$datefinprinc'";
        $rparcialproc = $mysqli->query($parcialproc);
        $fparcialproc = $rparcialproc->fetch_assoc();
        ////////////////////////////////////////////////////////////////////////////////
        $totalanterior = $fsiprocede['t'] + $fnoprocede['t'] + $fparcialproc['t'];
        ////////////////////////conteo  de datos  de la semana para entregar reporte//////////////////////////////////////
        $siprocedereporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
        INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
        WHERE valoracionjuridica.resultadovaloracion = 'SI PROCEDE' and expediente.fecha_nueva BETWEEN '$daterepini' and '$daterepfin'";
        $rsiprocedereporte = $mysqli->query($siprocedereporte);
        $fsiprocedereporte = $rsiprocedereporte->fetch_assoc();
        ////////////////////////////////////////////////////////////////////////////////
        $noprocedereporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
        INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
        WHERE valoracionjuridica.resultadovaloracion = 'NO PROCEDE' and expediente.fecha_nueva BETWEEN '$daterepini' and '$daterepfin'";
        $rnoprocedereporte = $mysqli->query($noprocedereporte);
        $fnoprocedereporte = $rnoprocedereporte->fetch_assoc();
        ////////////////////////////////////////////////////////////////////////////////
        $parcialprocreporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
        INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
        WHERE valoracionjuridica.resultadovaloracion = 'PARCIALMENTE PROCEDE' and expediente.fecha_nueva BETWEEN '$daterepini' and '$daterepfin'";
        $rparcialprocreporte = $mysqli->query($parcialprocreporte);
        $fparcialprocreporte = $rparcialprocreporte->fetch_assoc();
        ////////////////////////////////////////////////////////////////////////////////
        $totalreporte = $fsiprocedereporte['t'] + $fnoprocedereporte['t'] + $fparcialprocreporte['t'];
        ////////////////totales por fila //////////////////////////////////////////////////////////////////////
        $totalsiprocede = $fsiprocede['t'] + $fsiprocedereporte['t'];
        ////////////////////////////////////////////////////////////////////////////////
        $totalnoprocede = $fnoprocede['t'] + $fnoprocedereporte['t'];
        ////////////////////////////////////////////////////////////////////////////////
        $totalparcialproc = $fparcialproc['t'] + $fparcialprocreporte['t'];
        ////////////////////////////////////////////////////////////////////////////////
        $totalacumulado = $totalanterior + $totalreporte;
        ////////////////////////////////////////////////////////////////////////
        if ($fsiprocede['t'] > 0 || $fsiprocedereporte['t'] > 0 || $totalsiprocede > 0) {
          $data .= '<tr bgcolor="white">
          <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;JURÍDICAMENTE PROCEDENTE</h1></td>
          <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fsiprocede['t'].'</h1></td>
          <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fsiprocedereporte['t'].'</h1></td>
          <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$totalsiprocede.'</h1></td>
          </tr>';
        }
        ////////////////////////////////////////////////////////////////////////
        if ($fnoprocede['t'] > 0 || $fnoprocedereporte['t'] > 0 || $totalnoprocede > 0) {
          // code...
        $data .= '<tr bgcolor="white">
        <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;JURÍDICAMENTE NO PROCEDENTE</h1></td>
        <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fnoprocede['t'].'</h1></td>
        <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fnoprocedereporte['t'].'</h1></td>
        <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$totalnoprocede.'</h1></td>
        </tr>';
        }
        ////////////////////////////////////////////////////////////////////////
        if ($fparcialproc['t'] > 0 || $fparcialprocreporte['t'] > 0 || $totalparcialproc > 0) {
          $data .= '<tr bgcolor="white">
          <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;PARCIALMENTE PROCEDENTE</h1></td>
          <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fparcialproc['t'].'</h1></td>
          <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fparcialprocreporte['t'].'</h1></td>
          <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$totalparcialproc.'</h1></td>
          </tr>';
        }
        ////////////////////////////////////////////////////////////////////////
        $data .= '<tr bgcolor="#e6e1dc">
        <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:13.33px; color:#97897D;">TOTAL DE SOLICITUDES&nbsp;</h1></td>
        <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalanterior.'</h1></td>
        <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalreporte.'</h1></td>
        <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalacumulado.'</h1></td>
        </tr>';
        ////////////////////////////////////////////////////////////////////////
        $data .= '</tbody>
      </table>
      </div>';
/////////////segunda tabla
$data .= '<div style="float: right; width: 45%;">
<table id="tabla1" border="1px" cellspacing="0" width="100%" bgcolor="#97897D">
  <thead>
    <tr>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" colspan="4"><h1 style="font-size:13.33px; color:white;">EXPEDIENTES DETERMINADOS PARA SU INCORPORACIÓN</h1></th>
    </tr>
    <tr>
    <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" rowspan="2"><h1 style="font-size:13.33px; color:white;">CONCEPTO </h1></th>
    <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" colspan="2"><h1 style="font-size:13.33px; color:white;">'.$year.'</h1></th>
    <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:5px;" rowspan="2"><h1 style="font-weight: normal; font-size:11.33px;">TOTAL ACUMULADO </h1></th>
    </tr>
    <tr>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:90px;"><h1 style="font-weight: normal; color:white; font-size:11.33px;">DEL 1 DE ENERO AL '.$diaprevius.' DE '.$mesone.'</h1></th>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:90px;"><h1 style="font-weight: normal; color:white; font-size:11.33px;">DEL '.$msjreposem.'</h1></th>
    </tr>
  </thead>
  <tbody>';
////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
$incorporc = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' and fecha_analisis BETWEEN '$dateprinc' AND '$datefinprinc'";
$rincorporc = $mysqli->query($incorporc);
$fincorporc = $rincorporc->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$incornoproc = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' and fecha_analisis BETWEEN '$dateprinc' AND '$datefinprinc'";
$rincornoproc = $mysqli->query($incornoproc);
$fincornoproc = $rincornoproc->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$enelaboracion = "SELECT COUNT(*) as t FROM analisis_expediente
INNER JOIN expediente on analisis_expediente.folioexpediente = expediente.fol_exp
WHERE analisis_expediente.analisis = 'EN ELABORACION' and expediente.fecha_nueva BETWEEN '$dateprinc' and '$datefinprinc'";
$renelaboracion = $mysqli->query($enelaboracion);
$fenelaboracion = $renelaboracion->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalanterior = $fincorporc['t'] + $fincornoproc['t'] + $fenelaboracion['t'];
////////////////////////conteo  de datos  de la semana para entregar reporte//////////////////////////////////////
$incorprocreporte = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' and fecha_analisis BETWEEN '$daterepini' and '$daterepfin'";
$rincorprocreporte = $mysqli->query($incorprocreporte);
$fincorprocreporte = $rincorprocreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$incornoprocreporte = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' and fecha_analisis BETWEEN '$daterepini' and '$daterepfin'";
$rincornoprocreporte = $mysqli->query($incornoprocreporte);
$fincornoprocreporte = $rincornoprocreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$enelaboracionreporte = "SELECT COUNT(*) as t FROM analisis_expediente
INNER JOIN expediente on analisis_expediente.folioexpediente = expediente.fol_exp
WHERE analisis_expediente.analisis = 'EN ELABORACION' and expediente.fecha_nueva BETWEEN '$daterepini' and '$daterepfin'";
$renelaboracionreporte = $mysqli->query($enelaboracionreporte);
$fenelaboracionreporte = $renelaboracionreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalreporte = $fincorprocreporte['t'] + $fincornoprocreporte['t'] + $fenelaboracionreporte['t'];
////////////////totales por fila //////////////////////////////////////////////////////////////////////
$totalincorproc = $fincorporc['t'] + $fincorprocreporte['t'];
////////////////////////////////////////////////////////////////////////////////
$totalincornoproc = $fincornoproc['t'] + $fincornoprocreporte['t'];
////////////////////////////////////////////////////////////////////////////////
$totalenelaboracion = $fenelaboracion['t'] + $fenelaboracionreporte['t'];
////////////////////////////////////////////////////////////////////////////////
$totalacumulado = $totalanterior + $totalreporte;
////////////////////////////////////////////////////////////////////////////////
if ($fincorporc['t'] > 0 || $fincorprocreporte['t'] > 0 || $totalincorproc > 0) {
  $data .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;INCORPORACIÓN PROCEDENTE</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fincorporc['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fincorprocreporte['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$totalincorproc.'</h1></td>
  </tr>';
}
////////////////////////////////////////////////////////////////////////////////
if ($fincornoproc['t'] > 0 || $fincornoprocreporte['t'] > 0 || $totalincornoproc > 0) {
  $data .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;INCORPORACIÓN NO PROCEDENTE</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fincornoproc['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fincornoprocreporte['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$totalincornoproc.'</h1></td>
  </tr>';
}
////////////////////////////////////////////////////////////////////////////////
if ($fenelaboracion['t'] > 0 || $fenelaboracionreporte['t'] > 0 || $totalenelaboracion > 0) {
  $data .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;EN ANÁLISIS</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fenelaboracion['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fenelaboracionreporte['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$totalenelaboracion.'</h1></td>
  </tr>';
}
////////////////////////////////////////////////////////////////////////////////
$data .= '<tr bgcolor="#e6e1dc">
<td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:13.33px; color:#97897D;">TOTAL DE EXPEDIENTES&nbsp;</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalanterior.'</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalreporte.'</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalacumulado.'</h1></td>
</tr>';
////////////////////////////////////////////////////////////////////////////////
  $data .= '</tbody>
</table>
</div><br><br><br>';
////////////////////////////////////////////////////////////////////////////////
$data .= '<div style="float: left; width: 55%;">
  <table id="tabla1" border="1px" cellspacing="0" width="89.2%" bgcolor="#97897D">
    <thead>
      <tr>
        <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:220px;" rowspan="3"><h1 style="font-size:14px; color:white;">CALIDAD DENTRO DEL PROGRAMA</h1></th>
        <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" colspan="3"><h1 style="font-size:11px; color:white;">PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA</h1></th>
        <th style="background-color: #665649; border: 1px solid #A19E9F; text-align:center;" colspan="4"><h1 style="font-size:11px; color:white;">SUJETOS INCORPORADOS AL PROGRAMA</h1></th>
      </tr>
      <tr>
        <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" colspan="2"><h1 style="font-size:12px; color:white;">'.$year.'</h1></th>
        <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" rowspan="2"><h1 style="font-weight: normal; font-size:10px; color:white;">TOTAL  <br> ACUMULADO</h1></th>
        <th style="background-color: #665649; border: 1px solid #A19E9F; text-align:center;" colspan="2"><h1 style="font-size:12px; color:white;">'.$year.'</h1></th>
        <th style="background-color: #665649; border: 1px solid #A19E9F; text-align:center;" rowspan="2"><h1 style="font-weight: normal; font-size:10px; color:white;">TOTAL  <br> ACUMULADO</h1></th>
      </tr>
      <tr>
        <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:80px;"><h1 style="font-weight: normal; font-size:10px; color:white;">DEL 1 DE ENERO AL '.$diaprevius.' DE '.$mesone.'</h1></th>
        <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:80px;"><h1 style="font-weight: normal; font-size:10px; color:white;">DEL '.$msjreposem.'</h1></th>
        <th style="background-color: #665649; border: 1px solid #A19E9F; text-align:center; width:80px;"><h1 style="font-weight: normal; font-size:10px; color:white;">DEL 1 DE ENERO AL '.$diaprevius.' DE '.$mesone.'</h1></th>
        <th style="background-color: #665649; border: 1px solid #A19E9F; text-align:center; width:80px;"><h1 style="font-weight: normal; font-size:10px; color:white;">DEL '.$msjreposem.'</h1></th>

      </tr>
    </thead>
    <tbody>';
    ////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
    $calidad = "SELECT * FROM calidadpersona";
    $rcalidad = $mysqli->query($calidad);
    while ($fcalidad = $rcalidad->fetch_assoc()) {
      $namecalidad = $fcalidad['nombre'];
      if ($fcalidad['nombre'] === 'I. VICTIMA') {
        $namecortocalidad = 'VÍCTIMA';
      }
      if ($fcalidad['nombre'] === 'II. OFENDIDO') {
        $namecortocalidad = 'OFENDIDO';
      }
      if ($fcalidad['nombre'] === 'III. TESTIGO') {
        $namecortocalidad = 'TESTIGO';
      }
      if ($fcalidad['nombre'] === 'IV. COLABORADOR O INFORMANTE') {
        $namecortocalidad = 'COLABORADOR O INFORMANTE';
      }
      if ($fcalidad['nombre'] === 'V. AGENTE DEL MINISTERIO PUBLICO') {
        $namecortocalidad = 'AGENTE DEL MINISTERIO PUBLICO';
      }
      if ($fcalidad['nombre'] === 'VI. DEFENSOR') {
        $namecortocalidad = 'DEFENSOR';
      }
      if ($fcalidad['nombre'] === 'VII. POLICIA') {
        $namecortocalidad = 'POLICÍA';
      }
      if ($fcalidad['nombre'] === 'VIII. PERITO') {
        $namecortocalidad = 'PERITO';
      }
      if ($fcalidad['nombre'] === 'IX. JUEZ O MAGISTRADO DEL PODER JUDICIAL') {
        $namecortocalidad = 'JUEZ O MAGISTRADO DEL PODER JUDICIAL';
      }
      if ($fcalidad['nombre'] === 'X. PERSONA CON PARENTESCO O CERCANIA') {
        $namecortocalidad = 'PERSONA CON PARENTESCO O CERCANÍA';
      }
      //////////////////////////////////////////////////////////////////////////////
      $personaspropuestas = "SELECT COUNT(*) as t FROM datospersonales
      INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
      WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$namecalidad' AND autoridad.fechasolicitud_persona BETWEEN '$dateprinc' AND '$datefinprinc'";
      $rpersonaspropuestas = $mysqli->query($personaspropuestas);
      $fpersonaspropuestas = $rpersonaspropuestas->fetch_assoc();
      //////////////////////////////////////////////////////////////////////////////
      $personaspropuestasreporte = "SELECT COUNT(*) as t FROM datospersonales
      INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
      WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$namecalidad' AND autoridad.fechasolicitud_persona BETWEEN '$daterepini' AND '$daterepfin'";
      $rpersonaspropuestasreporte = $mysqli->query($personaspropuestasreporte);
      $fpersonaspropuestasreporte = $rpersonaspropuestasreporte->fetch_assoc();
      //////////////////////////////////////////////////////////////////////////////
      $totalperpropuestas = $fpersonaspropuestas['t'] + $fpersonaspropuestasreporte['t'];
      //////////////////////////////////////////////////////////////////////////////
      $perincorporadas = "SELECT COUNT(*) as t  FROM datospersonales
      INNER JOIN determinacionincorporacion on datospersonales.id = determinacionincorporacion.id_persona
      WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$namecalidad' AND determinacionincorporacion.convenio = 'FORMALIZADO'
      AND determinacionincorporacion.fecha_inicio BETWEEN '$dateprinc' AND '$datefinprinc'";
      $rperincorporadas = $mysqli->query($perincorporadas);
      $fperincorporadas = $rperincorporadas->fetch_assoc();
      //////////////////////////////////////////////////////////////////////////////
      $perincorporadasreporte = "SELECT COUNT(*) as t  FROM datospersonales
      INNER JOIN determinacionincorporacion on datospersonales.id = determinacionincorporacion.id_persona
      WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$namecalidad' AND determinacionincorporacion.convenio = 'FORMALIZADO'
      AND determinacionincorporacion.fecha_inicio BETWEEN '$daterepini' AND '$daterepfin'";
      $rperincorporadasreporte = $mysqli->query($perincorporadasreporte);
      $fperincorporadasreporte = $rperincorporadasreporte->fetch_assoc();
      //////////////////////////////////////////////////////////////////////////////
      $totalperincorporadas = $fperincorporadas['t'] + $fperincorporadasreporte['t'];
      //////////////////////////////////////////////////////////////////////////////
      $totalacumuladoperprop = $fpersonaspropuestas['t'] + $fpersonaspropuestas['t'];

      if ($fpersonaspropuestas['t'] > 0 || $fpersonaspropuestasreporte['t'] > 0) {
        $data .= '<tr bgcolor="white">
        <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;'.$namecortocalidad.'</h1></td>
        <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fpersonaspropuestas['t'].'</h1></td>
        <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fpersonaspropuestasreporte['t'].'</h1></td>
        <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$totalperpropuestas.'</h1></td>
        <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fperincorporadas['t'].'</h1></td>
        <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fperincorporadasreporte['t'].'</h1></td>
        <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$totalperincorporadas.'</h1></td>
        </tr>';
      }
    }
    ////////////////////////////////////////////////////////////////////////////////
    $personaspropuestastotal = "SELECT COUNT(*) as t FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud_persona BETWEEN '$dateprinc' AND '$datefinprinc'";
    $rpersonaspropuestastotal = $mysqli->query($personaspropuestastotal);
    $fpersonaspropuestastotal = $rpersonaspropuestastotal->fetch_assoc();
    ////////////////////////////////////////////////////////////////////////////////
    $personaspropuestasreportetotal = "SELECT COUNT(*) as t FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud_persona BETWEEN '$daterepini' AND '$daterepfin'";
    $rpersonaspropuestasreportetotal = $mysqli->query($personaspropuestasreportetotal);
    $fpersonaspropuestasreportetotal = $rpersonaspropuestasreportetotal->fetch_assoc();
    ////////////////////////////////////////////////////////////////////////////////
    $totalperpropacumulado = $fpersonaspropuestastotal['t'] + $fpersonaspropuestasreportetotal['t'];
    ////////////////////////////////////////////////////////////////////////////////
    $perincorporadastotal = "SELECT COUNT(*) as t  FROM datospersonales
    INNER JOIN determinacionincorporacion on datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
    AND determinacionincorporacion.fecha_inicio BETWEEN '$dateprinc' AND '$datefinprinc'";
    $rperincorporadastotal = $mysqli->query($perincorporadastotal);
    $fperincorporadastotal = $rperincorporadastotal->fetch_assoc();
    ////////////////////////////////////////////////////////////////////////////////
    $perincorporadasreportetotal = "SELECT COUNT(*) as t  FROM datospersonales
    INNER JOIN determinacionincorporacion on datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
    AND determinacionincorporacion.fecha_inicio BETWEEN '$daterepini' AND '$daterepfin'";
    $rperincorporadasreportetotal = $mysqli->query($perincorporadasreportetotal);
    $fperincorporadasreportetotal = $rperincorporadasreportetotal->fetch_assoc();
    ////////////////////////////////////////////////////////////////////////////////
    $totalperincorporadasacumulado = $fperincorporadastotal['t'] + $fperincorporadasreportetotal['t'];
    ////////////////////////////////////////////////////////////////////////////////
    $data .= '<tr bgcolor="#e6e1dc">
    <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:15px; color:#97897D;">TOTAL DE PERSONAS&nbsp;</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:14px; color:#97897D;">'.$fpersonaspropuestastotal['t'].'</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:14px; color:#97897D;">'.$fpersonaspropuestasreportetotal['t'].'</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:14px; color:#97897D;">'.$totalperpropacumulado.'</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:14px; color:#97897D;">'.$fperincorporadastotal['t'].'</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:14px; color:#97897D;">'.$fperincorporadasreportetotal['t'].'</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:14px; color:#97897D;">'.$totalperincorporadasacumulado.'</h1></td>
    </tr>
    </tbody>
  </table>

</div>';
// <table id="tabla1" border="1px" cellspacing="0" width="75%" bgcolor="white">
//   <thead class="thead-dark">
//     <tr>
//       <th style="background-color: white; border: 6px solid white; text-align:justify;" colspan="4"><h1 style="font-size:7px; text-align: justify; color:#665649;">*El sujeto protegido de iniciales S.S.A. relacionado al Expediente de Protección
//     UPSIPPED/TOL/108/005/2025 firmó el Convenio de Entendimiento para su incorporación al
//     Programa; sin embargo, ya se encuentra activo dentro del Expediente de Protección
//     UPSIPPED/TOL/113/015/2022, por lo que no se refleja su incorporación en este cuadro a fin de
//     evitar duplicidad .</h1></th>
//     </tr>
//   </thead>
//   <tbody>
//   </tbody>
// </table>
$data .='<div style="float: right; width: 43%;">
<table id="tabla1" border="1px" cellspacing="0" width="100%" bgcolor="#97897D">
<thead class="thead-dark">
<tr>
  <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" colspan="4"><h1 style="font-size:13.33px; color:white;">SEGUIMIENTO A LAS MEDIDAS DE APOYO<br> DEL '.$msjreposem.'</h1></th>
</tr>
<tr>
  <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:130px;" rowspan="2"><h1 style="font-size:13.33px; color:white;">CLASIFICACIÓN DE LAS MEDIDAS</h1></th>
  <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" colspan="3"><h1 style="font-size:13.33px; color:white;">ETAPA DENTRO DEL PROGRAMA</h1></th>
</tr>
<tr>
  <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:80px;"><h1 style="font-weight: normal; color:white; font-size:11.33px;">EN EJECUCIÓN</h1></th>
  <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:80px;"><h1 style="font-weight: normal; color:white; font-size:11.33px;">EJECUTADAS</h1></th>
  <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:80px;"><h1 style="font-weight: normal; color:white; font-size:11.33px;">CANCELADAS</h1></th>
</tr>
</thead>
<tbody>';
////////////////////////////////////////////////////////////////////////////////
////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
$medejecucionasistencia = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EN EJECUCION' AND clasificacion = 'ASISTENCIA'";
$rmedejecucionasistencia = $mysqli->query($medejecucionasistencia);
$fmedejecucionasistencia = $rmedejecucionasistencia->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$medejecucionresguardo = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EN EJECUCION' AND clasificacion = 'RESGUARDO'";
$rmedejecucionresguardo = $mysqli->query($medejecucionresguardo);
$fmedejecucionresguardo = $rmedejecucionresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalejecucion = $fmedejecucionasistencia['t'] + $fmedejecucionresguardo['t'];
////////////////////////////////////////////////////////////////////////////////
$medejecutadasasistencia = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA' AND clasificacion = 'ASISTENCIA'
AND date_ejecucion BETWEEN '$daterepini' AND '$daterepfin'";
$rmedejecutadasasistencia = $mysqli->query($medejecutadasasistencia);
$fmedejecutadasasistencia = $rmedejecutadasasistencia->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$medejecutadasresguardo = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA' AND clasificacion = 'RESGUARDO'
AND date_ejecucion BETWEEN '$daterepini' AND '$daterepfin'";
$rmedejecutadasresguardo = $mysqli->query($medejecutadasresguardo);
$fmedejecutadasresguardo = $rmedejecutadasresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalejecutadas = $fmedejecutadasasistencia['t'] + $fmedejecutadasresguardo['t'];
////////////////////////////////////////////////////////////////////////////////
$medcanceladasasistencia = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'CANCELADA' AND clasificacion = 'ASISTENCIA'
AND date_ejecucion BETWEEN '$daterepini' AND '$daterepfin'";
$rmedcanceladasasistencia = $mysqli->query($medcanceladasasistencia);
$fmedcanceladasasistencia = $rmedcanceladasasistencia->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$medicanceladasresguardo = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'CANCELADA' AND clasificacion = 'RESGUARDO'
AND date_ejecucion BETWEEN '$daterepini' AND '$daterepfin'";
$rmedicanceladasresguardo = $mysqli->query($medicanceladasresguardo);
$fmedicanceladasresguardo = $rmedicanceladasresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalcanceladas = $fmedcanceladasasistencia['t'] + $fmedicanceladasresguardo['t'];
////////////////////////////////////////////////////////////////////////////////
$data .= '<tr bgcolor="white">
<td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;MEDIDAS DE ASISTENCIA</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fmedejecucionasistencia['t'].'</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fmedejecutadasasistencia['t'].'</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fmedcanceladasasistencia['t'].'</h1></td>
</tr>';
////////////////////////////////////////////////////////////////////////////////
$data .= '<tr bgcolor="white">
<td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;MEDIDAS DE RESGUARDO</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fmedejecucionresguardo['t'].'</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fmedejecutadasresguardo['t'].'</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fmedicanceladasresguardo['t'].'</h1></td>
</tr>';
////////////////////////////////////////////////////////////////////////////////
$data .= '<tr bgcolor="#e6e1dc">
<td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:13.33px; color:#97897D;">TOTAL DE MEDIDAS&nbsp;</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalejecucion.'</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalejecutadas.'</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalcanceladas.'</h1></td>
</tr>
</tbody>
</table>
<br>';
$validarmedejecutadas = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$daterepini' AND '$daterepfin'";
$rvalidarmedejecutadas = $mysqli->query($validarmedejecutadas);
$fvalidarmedejecutadas = $rvalidarmedejecutadas->fetch_assoc();
if ($fvalidarmedejecutadas['t'] > 0) {
$data .= '<table id="tabla1" border="1px" cellspacing="0" width="100%" bgcolor="#97897D">
  <thead class="thead-dark">
    <tr>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" colspan="4"><h1 style="font-size:12px; color:white;">MUNICIPIO DE EJECUCIÓN DE LAS MEDIDAS DE APOYO CONCLUÍDAS</h1></th>
    </tr>
    <tr>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:30px;" rowspan="2"><h1 style="font-size:13.33px; color:white;">MUNICIPIO</h1></th>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:150px;" colspan="2"><h1 style="font-size:12px; color:white;">CLASIFICACIÓN DE LAS MEDIDAS</h1></th>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:5px;" rowspan="2"><h1 style="font-size:13.33px; color:white;">TOTAL</h1></th>
    </tr>
    <tr>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:30px;"><h1 style="font-weight: normal; color:white; font-size:11.33px;">ASISTENCIA</h1></th>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:30px;"><h1 style="font-weight: normal; color:white; font-size:11.33px;">RESGUARDO</h1></th>
    </tr>
  </thead>
  <tbody>';
////////////////////////////////////////////////////////////////////////////////
////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
$municipios = "SELECT ejecucion, count(*) as t
FROM medidas
WHERE date_ejecucion BETWEEN '$daterepini' AND '$daterepfin' AND estatus = 'EJECUTADA'
GROUP BY ejecucion
ORDER BY COUNT(*) DESC";
$rmunicipios = $mysqli->query($municipios);
while ($fmunicipios = $rmunicipios -> fetch_assoc()) {
  $municipio = $fmunicipios['ejecucion'];
  //////////////////////////////////////////////////////////////////////////////
  $ejecutadasasistencia = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$daterepini' AND '$daterepfin' AND estatus = 'EJECUTADA'
  AND ejecucion = '$municipio' AND clasificacion = 'ASISTENCIA'";
  $rejecutadasasistencia = $mysqli -> query ($ejecutadasasistencia);
  $fejecutadasasistencia = $rejecutadasasistencia->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $ejecutadasresguardo = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$daterepini' AND '$daterepfin' AND estatus = 'EJECUTADA'
  AND ejecucion = '$municipio' AND clasificacion = 'RESGUARDO'";
  $rejecutadasresguardo = $mysqli -> query ($ejecutadasresguardo);
  $fejecutadasresguardo = $rejecutadasresguardo->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $data .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;'.$fmunicipios['ejecucion'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fejecutadasasistencia['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fejecutadasresguardo['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fmunicipios['t'].'</h1></td>
  </tr>';
}
//////////////////////////////////////////////////////////////////////////////
$totalejecutadasasistencia = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$daterepini' AND '$daterepfin' AND estatus = 'EJECUTADA'
AND clasificacion = 'ASISTENCIA'";
$rtotalejecutadasasistencia = $mysqli -> query ($totalejecutadasasistencia);
$ftotalejecutadasasistencia = $rtotalejecutadasasistencia->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$totalejecutadasresguardo = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$daterepini' AND '$daterepfin' AND estatus = 'EJECUTADA'
AND clasificacion = 'RESGUARDO'";
$rtotalejecutadasresguardo = $mysqli -> query ($totalejecutadasresguardo);
$ftotalejecutadasresguardo = $rtotalejecutadasresguardo->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$totalacumulado = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$daterepini' AND '$daterepfin' AND estatus = 'EJECUTADA'";
$rtotalacumulado = $mysqli -> query ($totalacumulado);
$ftotalacumulado = $rtotalacumulado->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$data .= '<tr bgcolor="#e6e1dc">
<td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:13.33px; color:#97897D;">TOTAL&nbsp;</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$ftotalejecutadasasistencia['t'].'</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$ftotalejecutadasresguardo['t'].'</h1></td>
<td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$ftotalacumulado['t'].'</h1></td>
</tr>';
////////////////////////////////////////////////////////////////////////////////
  $data .= '</tbody>
</table></div></div>';
}
$mpdf ->WriteHtml($css, \Mpdf\HTMLParsermode::HEADER_CSS);
$mpdf ->WriteHtml($css2, \Mpdf\HTMLParsermode::HEADER_CSS);
$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
// $mpdf->WriteHTML($data, \Mpdf\HTMLParserMode::BODY_HTML);
$mpdf->WriteHtml($data);

////////////////////////////////////////////////////////////////////////////////
$mpdf->AddPage();
  $data1 .= '<div style="display: grid; background-color: white; justify-content: center; align-items: center; max-height: 200px; min-height: 200px; min-width: 100%; max-width: 100%;">
  <h2 style="text-align: center; font-size: 16px;"><strong>Reporte Global Semanal <br> DEL 1 DE JUNIO DEL 2021 AL '.$dia_fin_reporte.' DE '.$mestwo.' DEL '.date('Y').'</strong></h2></div><br>';

// $data1 .= '<div style="display: grid; background-color: white; justify-content: center; align-items: center; max-height: 200px; min-height: 200px; min-width: 100%; max-width: 100%;">
// <h2 style="text-align: center; font-size: 16px;"><strong>Reporte Global Semanal <br> DEL 1 DE JUNIO DEL 2021 AL '.$dia_fin_reporte.' DE '.$mesone.' DEL '.date('Y').'</strong></h2></div><br>';

$data1 .= '<div style="float: left; width: 42%;">
<table id="tabla1" border="1px" cellspacing="0" width="90%" bgcolor="#97897D">
  <thead>
    <tr>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" colspan="2"><h1 style="font-size:13.33px; color:white;">EXPEDIENTES DE PROTECCIÓN</h1></th>
    </tr>
    <tr>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:70px;"><h1 style="font-size:13.33px; color:white;">ETAPA DENTRO DEL PROGRAMA</h1></th>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:30px;"><h1 style="font-size:13.33px; color:white;">TOTAL</h1></th>
    </tr>
  </thead>
  <tbody>';
  ////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
  $noprocede = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
  INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
  WHERE valoracionjuridica.resultadovaloracion = 'NO PROCEDE' and expediente.fecha_nueva BETWEEN '2021-01-01' and '$daterepfin'";
  $rnoprocede = $mysqli->query($noprocede);
  $fnoprocede = $rnoprocede->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $enelaboracionreporte = "SELECT COUNT(*) as t FROM statusseguimiento
  INNER JOIN expediente on statusseguimiento.folioexpediente = expediente.fol_exp
  WHERE statusseguimiento.status = 'ANALISIS' and expediente.fecha_nueva BETWEEN '2021-01-01' and '$daterepfin'";
  $renelaboracionreporte = $mysqli->query($enelaboracionreporte);
  $fenelaboracionreporte = $renelaboracionreporte->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $byejecucion = "SELECT COUNT(*) as t  FROM statusseguimiento WHERE status = 'EN EJECUCION'";
  $rbyejecucion = $mysqli->query($byejecucion);
  $fbyejecucion = $rbyejecucion ->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $concluido = "SELECT COUNT(*) as t  FROM statusseguimiento WHERE status = 'CONCLUIDO'";
  $rconcluido = $mysqli->query($concluido);
  $fconcluido = $rconcluido ->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $cancelado = "SELECT COUNT(*) as t  FROM statusseguimiento WHERE status = 'CANCELADO'";
  $rcancelado = $mysqli->query($cancelado);
  $fcancelado = $rcancelado ->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $totalexpedientes = $fnoprocede['t'] + $fenelaboracionreporte['t'] + $fbyejecucion['t'] + $fconcluido['t'] + $fcancelado['t'];
  ////////////////////////////////////////////////////////////////////////////////
  if ($fnoprocede['t'] > 0) {
    $data1 .= '<tr bgcolor="white">
    <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;NO PROCEDE JURIDICAMENTE</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fnoprocede['t'].'</h1></td>
    </tr>';
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($fenelaboracionreporte['t'] > 0) {
    $data1 .= '<tr bgcolor="white">
    <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;EN ANÁLISIS PARA DETERMINAR SU INCORPORACIÓN *</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fenelaboracionreporte['t'].'</h1></td>
    </tr>';
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($fbyejecucion['t'] > 0) {
    $data1 .= '<tr bgcolor="white">
    <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;EN EJECUCIÓN</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fbyejecucion['t'].'</h1></td>
    </tr>';
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($fconcluido['t'] > 0) {
    $data1 .= '<tr bgcolor="white">
    <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;CONCLUIDO</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fconcluido['t'].'</h1></td>
    </tr>';
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($fcancelado['t'] > 0) {
    $data1 .= '<tr bgcolor="white">
    <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;CANCELADO</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fcancelado['t'].'</h1></td>
    </tr>';
  }
  //////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="#e6e1dc">
  <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:13.33px; color:#97897D;">TOTAL DE EXPEDIENTES&nbsp;</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalexpedientes.'</h1></td>
  </tr>';
  //////////////////////////////////////////////////////////////////////////////
$data1 .='</tbody>
</table>';
if ($fenelaboracionreporte['t'] > 0) {
  $data1 .= '<table id="tabla1" border="1px" cellspacing="0" width="75%" bgcolor="white">
    <thead class="thead-dark">
      <tr>
        <th style="background-color: white; border: 6px solid white; text-align:justify;" colspan="4"><h1 style="font-size:7px; text-align: justify; color:#665649;">
        *Comprende los Expedientes de Protección sobre los cuales se determinará la incorporación
         del sujeto propuesto al Programa, así como los que se encuentran en proceso de formalizar
         su ingreso al mismo.</h1></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>';
}
$data1 .= '</div>';
////////////////////////////////////////////////////////////////////////////////
$data1 .= '<div style="float: right; width: 45%;">
<table id="tabla1" border="1px" cellspacing="0" width="90%" bgcolor="#97897D">
  <thead>
    <tr>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" colspan="2"><h1 style="font-size:13.33px; color:white;">PERSONAS QUE SOLICITARON INCORPORARSE</h1></th>
    </tr>
    <tr>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; width:70px;"><h1 style="font-size:13.33px; color:white;">ETAPA DENTRO DEL PROGRAMA</h1></th>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:30px;"><h1 style="font-size:13.33px; color:white;">TOTAL</h1></th>
    </tr>
  </thead>
  <tbody>';
  ////////////////////////////////////////////////////////////////////////////////
  $noincorporado = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'NO INCORPORADO' AND relacional = 'NO'";
  $rnoincorporado = $mysqli->query($noincorporado);
  $fnoincorporado = $rnoincorporado->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $totalsujincor = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.relacional = 'NO' AND determinacionincorporacion.convenio = 'FORMALIZADO' AND (estatus = 'SUJETO PROTEGIDO' || estatus = 'DESINCORPORADO')";
  $rtotalsujincor = $mysqli->query($totalsujincor);
  $ftotalsujincor = $rtotalsujincor->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $totalsujetosactivos = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.relacional = 'NO' AND determinacionincorporacion.convenio = 'FORMALIZADO' AND estatus = 'SUJETO PROTEGIDO'";
  $rtotalsujetosactivos = $mysqli->query($totalsujetosactivos);
  $ftotalsujetosactivos = $rtotalsujetosactivos->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $sujencentrosresguardo = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN medidas ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus = 'EN EJECUCION'";
  $rsujencentrosresguardo = $mysqli->query($sujencentrosresguardo);
  $fsujencentrosresguardo = $rsujencentrosresguardo->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $desincorporado = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'DESINCORPORADO' AND relacional = 'NO'";
  $rdesincorporado = $mysqli->query($desincorporado);
  $fdesincorporado = $rdesincorporado->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $perpropuesta = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'PERSONA PROPUESTA' AND relacional = 'NO'";
  $rperpropuesta = $mysqli->query($perpropuesta);
  $fperpropuesta = $rperpropuesta->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $sujsuspendidotem = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'SUSPENDIDO TEMPORALMENTE' AND relacional = 'NO'";
  $rsujsuspendidotem = $mysqli->query($sujsuspendidotem);
  $fsujsuspendidotem = $rsujsuspendidotem->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $totalpersonas = $fnoincorporado['t'] + $ftotalsujetosactivos['t'] + $fdesincorporado['t'] + $fperpropuesta['t'] + $fsujsuspendidotem['t'];
  ////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;NO INCORPORADOS AL PROGRAMA<sup>1</sup></h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fnoincorporado['t'].'</h1></td>
  </tr>';
  ////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;TOTAL DE SUJETOS INCORPORADOS</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$ftotalsujincor['t'].'</h1></td>
  </tr>';
  ////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-weight: normal; font-size:11px; color:black;"><u>Sujeto incorporado activo</u>&nbsp;</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$ftotalsujetosactivos['t'].'</h1></td>
  </tr>';
  ////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-weight: normal; font-size:11px; color:black;"><u>Desincorporado del Program<sup>2</sup></u>&nbsp;</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fdesincorporado['t'].'</h1></td>
  </tr>';
  ////////////////////////////////////////////////////////////////////////////////
  if ($fperpropuesta['t'] > 0) {
    $data1 .= '<tr bgcolor="white">
    <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;PERSONAS PROPUESTAS A INCORPORARSE</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fperpropuesta['t'].'</h1></td>
    </tr>';
  }
  ////////////////////////////////////////////////////////////////////////////////
  if ($fsujsuspendidotem['t'] > 0) {
    $data1 .= '<tr bgcolor="white">
    <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;SUJETOS SUSPENDIDOS TEMPORALMENTE</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fsujsuspendidotem['t'].'</h1></td>
    </tr>';
  }
  ////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="#e6e1dc">
  <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:13.33px; color:#97897D;">TOTAL DE PERSONAS&nbsp;</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalpersonas.'</h1></td>
  </tr>';
  ////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
  $data1 .='</tbody>
  </table>
  <table id="tabla1" border="1px" cellspacing="0" width="75%" bgcolor="white">
    <thead class="thead-dark">
      <tr>
        <th style="background-color: white; border: 6px solid white; text-align:justify;" colspan="4"><h1 style="font-size:8px; text-align: justify; color:#665649;">
        1Corresponde a los siguientes casos:<br>
          &nbsp;&nbsp;&nbsp; a) La solicitud no cumple con los requisitos de Ley<br>
          &nbsp;&nbsp;&nbsp; b) La persona manifiesta negativa de voluntariedad para incorporarse<br>
          &nbsp;&nbsp;&nbsp; c) Se determina la no procedencia de incorporación<br>
        2Se refiere a las personas que se encuentran en los siguientes supuestos:<br>
          &nbsp;&nbsp;&nbsp; a) Concluyó su participación dentro del Proceso Penal<br>
          &nbsp;&nbsp;&nbsp; b) Renuncia voluntaria<br>
          &nbsp;&nbsp;&nbsp; c) Determinación de disminución o cese del riesgo<br>
      </h1></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>';
$data1 .= '</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
//////////////////////////////////////////////////////////////////////////////
$data1 .= '<div style="float: left; width: 55%;">
<table id="tabla1" border="1px" cellspacing="0" width="100%" bgcolor="#97897D">
  <thead>
    <tr>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" colspan="5"><h1 style="font-size:13.33px; color:white;">MEDIDAS DE APOYO OTORGADAS</h1></th>
    </tr>
    <tr>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; "><h1 style="font-size:13.33px; color:white;">CLASIFICACIÓN DE LAS MEDIDAS DE APOYO</h1></th>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; "><h1 style="font-weight: normal; font-size:13.33px; color:white;">EN EJECUCIÓN</h1></th>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; "><h1 style="font-weight: normal; font-size:13.33px; color:white;">EJECUTADA</h1></th>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; "><h1 style="font-weight: normal; font-size:13.33px; color:white;">CANCELADA</h1></th>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center; "><h1 style="font-weight: normal; font-size:13.33px; color:white;">TOTAL</h1></th>
    </tr>
  </thead>
  <tbody>';
  ////////////////////////////////////////////////////////////////////////////////
  $enejeca = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EN EJECUCION' AND clasificacion = 'ASISTENCIA'";
  $renejeca = $mysqli->query($enejeca);
  $fenejeca = $renejeca->fetch_assoc();
  //
  $enejecr = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EN EJECUCION' AND clasificacion = 'RESGUARDO'";
  $renejecr = $mysqli->query($enejecr);
  $fenejecr = $renejecr->fetch_assoc();
  //
  $eneject = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EN EJECUCION'";
  $reneject = $mysqli->query($eneject);
  $feneject = $reneject->fetch_assoc();
  //
  $ejeca = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA' AND clasificacion = 'ASISTENCIA'";
  $rejeca = $mysqli->query($ejeca);
  $fejeca = $rejeca->fetch_assoc();
  //
  $ejecr = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA' AND clasificacion = 'RESGUARDO'";
  $rejecr = $mysqli->query($ejecr);
  $fejecr = $rejecr->fetch_assoc();
  //
  $eject = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA'";
  $reject = $mysqli->query($eject);
  $feject = $reject->fetch_assoc();
  //
  $cancela = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'CANCELADA' AND clasificacion = 'ASISTENCIA'";
  $rcancela = $mysqli->query($cancela);
  $fcancela = $rcancela->fetch_assoc();
  //
  $cancelr = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'CANCELADA' AND clasificacion = 'RESGUARDO'";
  $rcancelr = $mysqli->query($cancelr);
  $fcancelr = $rcancelr->fetch_assoc();
  //
  $canceltot = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'CANCELADA'";
  $rcanceltot = $mysqli->query($canceltot);
  $fcanceltot = $rcanceltot->fetch_assoc();
  //
  $asist = "SELECT COUNT(*) as t FROM medidas WHERE  clasificacion = 'ASISTENCIA'";
  $rasist = $mysqli->query($asist);
  $fasist = $rasist->fetch_assoc();
  //
  $resg = "SELECT COUNT(*) as t FROM medidas WHERE clasificacion = 'RESGUARDO'";
  $rresg = $mysqli->query($resg);
  $fresg = $rresg->fetch_assoc();
  //
  $medidast = "SELECT COUNT(*) as t FROM medidas";
  $rmedidast = $mysqli->query($medidast);
  $fmedidast = $rmedidast->fetch_assoc();
  /////////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;ASISTENCIA</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fenejeca['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fejeca['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fcancela['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fasist['t'].'</h1></td>
  </tr>';
  /////////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;RESGUARDO</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fenejecr['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fejecr['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fcancelr['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fresg['t'].'</h1></td>
  </tr>';
  /////////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="#e6e1dc">
  <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:12.33px; color:#97897D;">TOTAL DE MEDIDAS DE APOYO&nbsp;</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$feneject['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$feject['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fcanceltot['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fmedidast['t'].'</h1></td>
  </tr>';
  ////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
  $data1 .='</tbody>
  </table>';
$data1 .= '</div>';
///////////////////////////////////////////////////////////////////////////////
$data1 .= '<div style="float: right; width: 40%;">
<table id="tabla1" border="1px" cellspacing="0" width="90%" bgcolor="#97897D">
  <thead class="thead-dark">
    <tr>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; text-align:center; color:white;">DESCRIPCIÓN</h1></font></th>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; text-align:center; color:white;">SUJETOS INCORPORADOS*</h1></font></th>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; text-align:center; color:white;">SUJETOS EN CENTROS DE RESGUARDO**</h1></font></th>
    </tr>
  </thead>
  <tbody>';
  ////////////////////////////////////////////////////////////////////////////////
  $menoredad = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.relacional = 'NO' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND determinacionincorporacion.convenio = 'FORMALIZADO'";
  $rmenoredad = $mysqli ->query($menoredad);
  $fmenoredad = $rmenoredad->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $mayoredad = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.relacional = 'NO' AND datospersonales.grupoedad = 'MAYOR DE EDAD' AND determinacionincorporacion.convenio = 'FORMALIZADO'";
  $rmayoredad = $mysqli ->query($mayoredad);
  $fmayoredad = $rmayoredad->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $totaledad = $fmenoredad['t'] + $fmayoredad['t'];
  ////////////////////////////////////////////////////////////////////////////////
  $mujeres = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.relacional = 'NO' AND datospersonales.sexopersona = 'MUJER' AND determinacionincorporacion.convenio = 'FORMALIZADO'";
  $rmujeres = $mysqli ->query($mujeres);
  $fmujeres = $rmujeres->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $hombres = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  WHERE datospersonales.relacional = 'NO' AND datospersonales.sexopersona = 'HOMBRE' AND determinacionincorporacion.convenio = 'FORMALIZADO'";
  $rhombres = $mysqli ->query($hombres);
  $fhombres = $rhombres->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $totalsexo = $fmujeres['t'] + $fhombres['t'];
  ////////////////////////////////////////////////////////////////////////////////
  $menoredadenresguardo = "SELECT COUNT(DISTINCT medidas.id_persona) as t FROM datospersonales
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  INNER JOIN medidas ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.relacional = 'NO' AND datospersonales.grupoedad = 'MENOR DE EDAD'
  AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus != 'CANCELADA'";
  $rmenoredadenresguardo = $mysqli->query($menoredadenresguardo);
  $fmenoredadenresguardo = $rmenoredadenresguardo->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $mayoredadenresguardo = "SELECT COUNT(DISTINCT medidas.id_persona) AS t FROM `datospersonales`
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  INNER JOIN medidas ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.grupoedad = 'MAYOR DE EDAD' AND datospersonales.relacional = 'NO'
  AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'";
  $rmayoredadenresguardo = $mysqli->query($mayoredadenresguardo);
  $fmayoredadenresguardo = $rmayoredadenresguardo->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $totaledadenresguardo = $fmenoredadenresguardo['t'] + $fmayoredadenresguardo['t'];
  ////////////////////////////////////////////////////////////////////////////////
  $mujeresenresguardo = "SELECT COUNT(DISTINCT medidas.id_persona) AS t FROM `datospersonales`
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  INNER JOIN medidas ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.relacional = 'NO'
  AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.sexopersona = 'MUJER'";
  $rmujeresenresguardo = $mysqli->query($mujeresenresguardo);
  $fmujeresenresguardo = $rmujeresenresguardo->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $hombresenresguardo = "SELECT COUNT(DISTINCT medidas.id_persona) AS t FROM `datospersonales`
  INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
  INNER JOIN medidas ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.sexopersona = 'HOMBRE' AND datospersonales.relacional = 'NO'
  AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'";
  $rhombresenresguardo = $mysqli->query($hombresenresguardo);
  $fhombresenresguardo = $rhombresenresguardo->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $totalsexoenresguardo = $fmujeresenresguardo['t'] + $fhombresenresguardo['t'];
  /////////////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;MENOR DE EDAD</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fmenoredad['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fmenoredadenresguardo['t'].'</h1></td>
  </tr>';
  /////////////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;MAYOR DE EDAD</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fmayoredad['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fmayoredadenresguardo['t'].'</h1></td>
  </tr>';
  /////////////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="#e6e1dc">
  <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:12.33px; color:#97897D;">TOTAL&nbsp;</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totaledad.'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totaledadenresguardo.'</h1></td>
  </tr>';
  ////////////////////////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;TOTAL MUJERES</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fmujeres['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fmujeresenresguardo['t'].'</h1></td>
  </tr>';
  /////////////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;TOTAL HOMBRES</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fhombres['t'].'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fhombresenresguardo['t'].'</h1></td>
  </tr>';
  /////////////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="#e6e1dc">
  <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:12.33px; color:#97897D;">TOTAL&nbsp;</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalsexo.'</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalsexoenresguardo.'</h1></td>
  </tr>';
  ////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
  $data1 .='</tbody>
  </table>
  <table id="tabla1" border="1px" cellspacing="0" width="75%" bgcolor="white">
    <thead class="thead-dark">
      <tr>
        <th style="background-color: white; border: 6px solid white; text-align:justify;" colspan="4"><h1 style="font-size:7px; text-align: justify; color:#665649;">
        * Comprende todos los sujetos incorporados independientemente de su estatus actual dentro del Programa<br>
        ** Se refiere a los sujetos incorporados que les ha sido asignada la medida de resguardo "Alojamiento Temporal" ya sea que se encuentren activos o no dentro del Programa
        </h1></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>';
$data1 .= '</div><br><br><br><br><br><br><br><br>';
//////////////////////////////////////////////////////////////////////////////////
$data1 .= '<div style="float: left; width: 30%;">
<table id="tabla1" border="1px" cellspacing="0" width="100%" bgcolor="#97897D">
  <thead class="thead-dark">
    <tr>
      <th style="background-color: #97897D; border: 1px solid #A19E9F; text-align:center;" colspan="2"><h1 style="font-size:13.33px; text-align:center; color:white;">SUJETOS EN RESGUARDO ACTIVOS</h1></font></th>
    </tr>
  </thead>
  <tbody>';
  ////////////////////////////////////////////////////////////////////////////////
  $sujencentrosresguardo = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN medidas ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'SUJETO PROTEGIDO' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus = 'EN EJECUCION'";
  $rsujencentrosresguardo = $mysqli->query($sujencentrosresguardo);
  $fsujencentrosresguardo = $rsujencentrosresguardo->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $perpropresguardo = "SELECT COUNT(*) as t FROM datospersonales
  INNER JOIN medidas ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.relacional = 'NO' AND datospersonales.estatus = 'PERSONA PROPUESTA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus = 'EN EJECUCION'";
  $rperpropresguardo = $mysqli->query($perpropresguardo);
  $fperpropresguardo = $rperpropresguardo->fetch_assoc();
  ///////////////////////////////////////////////////////////////////////////////////////
  $totalsujetos = $fsujencentrosresguardo['t'] + $fperpropresguardo['t'];
  //////////////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;SUJETOS INCORPORADOS</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fsujencentrosresguardo['t'].'</h1></td>
  </tr>';
  //////////////////////////////////////////////////////////////////////////////////////////
  if ($fperpropresguardo['t'] > 0) {
    $data1 .= '<tr bgcolor="white">
    <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;PERSONAS PROPUESTAS</h1></td>
    <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-weight: normal; font-size:13.33px; color:#97897D;">'.$fperpropresguardo['t'].'</h1></td>
    </tr>';
  }
  //////////////////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="#e6e1dc">
  <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:12.33px; color:#97897D;">TOTAL DE SUJETOS&nbsp;</h1></td>
  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalsujetos.'</h1></td>
  </tr>';
  ////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
  $data1 .='</tbody>
  </table>';
$data1 .= '</div>';
////////////////////////////////////////////////////////////////////////////////
$mpdf ->WriteHtml($css, \Mpdf\HTMLParsermode::HEADER_CSS);
$mpdf ->WriteHtml($css2, \Mpdf\HTMLParsermode::HEADER_CSS);
$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

$mpdf->WriteHtml($data1);
////////////////////////////////////////////////////////////////////////////////
$mpdf->output();
// $mpdf->output("REPORTE SEMANAL.pdf",'D');
?>
