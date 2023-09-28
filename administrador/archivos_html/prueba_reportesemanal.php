<?php
require_once __DIR__ . '/vendor/autoload.php';
include("../conexion.php");
// css
$css = file_get_contents('css/main2.css');
// Grab variables
$mpdf = new \Mpdf\Mpdf([
          'mode' => '',
          'format' => 'A4',
          'default_font_size' => 0,
          'default_font' => '',
          'margin_left' => 5,
          'margin_right' => 5,
          'margin_top' => 6,
          'margin_bottom' => 6,
          'margin_header' => 2,
          'margin_footer' => 2,
          'orientation' => 'L',
    ]);

// $mpdf->setAutoTopMargin = 'false';
// $mpdf->setAutoBottomMargin = 'stretch';
// $mpdf->autoScriptToLang = true;
// $mpdf->autoLangToFont = true;

$mpdf->SetHTMLHeader('<table width="100%">
<tr>
<td width="10%"><img  src="../../image/gobierno2.jpg" width="120" height="130"></td>
<td width="80%" style="font-family: gothambook" align="center"><span align="center">Programa de Protección a Sujetos que Intervienen en el Procedimiento <BR>
Penal o de Extinción de Dominio del Estado de México. </span><br>
</td>
<td width="10%" style="text-align: right;"><img  src="../../image/FGJEM.jpg" width="60" height="60"></td>
</tr>
</table>');
$mpdf->SetHTMLFooter('
<div>
<table width="3%" align="right">
<tr>
<td width="3%" align="center" bgcolor="#97897D" style="height:30vh;"><h3 class=""></font></span>
<span style="font-size: .55em; align:left;width:6px; color:white;"><font style="font-family: gothambook">
<p align="center">
<span style="font-size: 2em;">{PAGENO}</span>
</p>
</font></span></h3>
</td>
</tr>
</table>
<table width="100%">
<tr>
<td width="100%" align="left" bgcolor="#63696D" style="height:38vh;"><h3 class=""></font></span>
<span style="font-size: .55em; align:left;width:6px; color:white;"><font style="font-family: gothambook">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Subdirección de Estadística y Pre-Registro
</font></span></h3>
</td>
</tr>
</table>
</p>
</p>
</div>
');
date_default_timezone_set("America/Mexico_City");
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
// echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
$fecha_actual = date("Y-m-d");
$day = date("l");
switch ($day) {
    case "Sunday":
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 6 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_actual);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           echo "<br>";
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           echo "<br>";
           echo '<h1 style="text-align:center">' ; echo "<b>"; echo "REPORTE SEMANAL <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo "</b>"; echo '</h1>';
    break;
    case "Monday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 5 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "<b>"; echo "REPORTE SEMANAL <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo "</b>"; echo '</h1>';
           $data = '<br><br><br><br><h4 style="text-align:center; font-family: gothambook;"><b>Reporte Semanal <br> DEL '.$diaini.' AL '.$diafin.' DE '.$meses[date('n')-1].' DEL '.date('Y').' </b> </h4>';
    break;
    case "Tuesday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 4 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "<b>"; echo "REPORTE SEMANAL <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo "</b>"; echo '</h1>';
           $data = '<br><br><br><br><h4 style="text-align:center; font-family: gothambook;"><b>Reporte Semanal <br> DEL '.$diaini.' AL '.$diafin.' DE '.$meses[date('n')-1].' DEL '.date('Y').' </b> </h4>';
    break;
    case "Wednesday":
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 3 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "<b>"; echo "REPORTE SEMANAL <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo "</b>"; echo '</h1>';
           $data = '<br><br><br><br><h4 style="text-align:center; font-family: gothambook;"><b>Reporte Semanal <br> DEL '.$diaini.' AL '.$diafin.' DE '.$meses[date('n')-1].' DEL '.date('Y').' </b> </h4>';
    break;
    case "Thursday":  //Jueves
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 2 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL <br> DEL".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
           $data = '<br><br><br><br><h4 style="text-align:center; font-family: gothambook;"><b>Reporte Semanal <br> DEL '.$diaini.' AL '.$diafin.' DE '.$meses[date('n')-1].' DEL '.date('Y').' </b> </h4>';
    break;
    case "Friday": //Viernes
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 6 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 1 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "<b>"; echo "REPORTE SEMANAL <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo "</b>"; echo '</h1>';
           $data = '<br><br><br><br><h4 style="text-align:center; font-family: gothambook;"><b>Reporte Semanal <br> DEL '.$diaini.' AL '.$diafin.' DE '.$meses[date('n')-1].' DEL '.date('Y').' </b> </h4>';
    break;
    case "Saturday": //sabado
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 6 day"));
           $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 7 day"));
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 0 day"));
           ////////////////////fechas de reporte semanal
           $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
           $diafinsemant = date( "j", $diafinsemanaanterior);
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
           // echo '<h1 style="text-align:center">' ; echo "<b>"; echo "REPORTE SEMANAL <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo "</b>"; echo '</h1>';
           $data = '<br><br><br><br><h5 style="text-align:center; font-family: gothambook;"><b>Reporte Semanal <br> DEL '.$diaini.' AL '.$diafin.' DE '.$meses[date('n')-1].' DEL '.date('Y').' </b> </h5>';
    break;
}
////////////////////////////////////////////////////////////////////////////////
$data .= '<br><br><div style="float: left; width: 50%;">
<!-- PRIMER TABLA -->
      <table id="tabla1" border="1px" cellspacing="0" width="90%" bgcolor="#97897D">
        <thead class="thead-dark">
          <tr>
            <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="4"><font size=1><b style="text-align:center; color:white;">SOLICITUDES RECIBIDAS Y EXPEDIENTES INICIADOS </b></font></th>
          </tr>
          <tr>
            <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" rowspan="2"><font size=1><b style="text-align:center; color:white;">CONCEPTO </b></font></th>
            <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="2"><font size=1><b style="text-align:center; color:white;">2023 </b></font></th>
            <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;" rowspan="2"><font size=1><p style="text-align:center; color:white;">TOTAL ACUMULADO </p></font></th>
          </tr>
          <tr>
            <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><p style="text-align:center; color:white;"><font size=1> DEL 1 DE ENERO AL '.$diafinsemant.' DE '.$meses[date('n')-1].'</p></font></th>
            <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><p style="text-align:center; color:white;"><font size=1> DEL '.$diaini.' AL '.$diafin.' DE '.$meses[date('n')-1].'</p></font></th>
          </tr>
        </thead>
        <tbody>';
        ////////////////////////////////////////////////////////////////////////
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
        $fecha_inicio = $anioActual."-01-01";
        $fecha_anterior = $anioActual."-".$mesanterior."-".$cantidaddiasanterior;
        $diamesinicio = $anioActual."-".$mesActual."-01";
        $diamesfin = $anioActual."-".$mesActual."-".$cantidadDias;
        ////////////////////////////////////////////////////////////////////////////////
        $siprocede = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
        INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
        WHERE valoracionjuridica.resultadovaloracion = 'SI PROCEDE' and expediente.fecha_nueva BETWEEN '$fecha_inicio' and '$fecha_anterior'";
        $rsiprocede = $mysqli->query($siprocede);
        $fsiprocede = $rsiprocede->fetch_assoc();
        ////////////////////////////////////////////////////////////////////////////////
        $noprocede = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
        INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
        WHERE valoracionjuridica.resultadovaloracion = 'NO PROCEDE' and expediente.fecha_nueva BETWEEN '$fecha_inicio' and '$fecha_anterior'";
        $rnoprocede = $mysqli->query($noprocede);
        $fnoprocede = $rnoprocede->fetch_assoc();
        ////////////////////////////////////////////////////////////////////////////////
        $parcialproc = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
        INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
        WHERE valoracionjuridica.resultadovaloracion = 'PARCIALMENTE PROCEDENTE' and expediente.fecha_nueva BETWEEN '$fecha_inicio' and '$fecha_anterior'";
        $rparcialproc = $mysqli->query($parcialproc);
        $fparcialproc = $rparcialproc->fetch_assoc();
        ////////////////////////////////////////////////////////////////////////////////
        $totalanterior = $fsiprocede['t'] + $fnoprocede['t'] + $fparcialproc['t'];
        ////////////////////////conteo  de datos  de la semana para entregar reporte//////////////////////////////////////
        $siprocedereporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
        INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
        WHERE valoracionjuridica.resultadovaloracion = 'SI PROCEDE' and expediente.fecha_nueva BETWEEN '$diamesinicio' and '$diamesfin'";
        $rsiprocedereporte = $mysqli->query($siprocedereporte);
        $fsiprocedereporte = $rsiprocedereporte->fetch_assoc();
        ////////////////////////////////////////////////////////////////////////////////
        $noprocedereporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
        INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
        WHERE valoracionjuridica.resultadovaloracion = 'NO PROCEDE' and expediente.fecha_nueva BETWEEN '$diamesinicio' and '$diamesfin'";
        $rnoprocedereporte = $mysqli->query($noprocedereporte);
        $fnoprocedereporte = $rnoprocedereporte->fetch_assoc();
        ////////////////////////////////////////////////////////////////////////////////
        $parcialprocreporte = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
        INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
        WHERE valoracionjuridica.resultadovaloracion = 'PARCIALMENTE PROCEDE' and expediente.fecha_nueva BETWEEN '$diamesinicio' and '$diamesfin'";
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
          <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>JURÍDICAMENTE PROCEDENTE </font></p></td>
          <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fsiprocede['t'].' </p></font></td>
          <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fsiprocedereporte['t'].' </p></font></td>
          <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1><p> '.$totalsiprocede.' </p></font></td>
          </tr>';
        }
        ////////////////////////////////////////////////////////////////////////
        if ($fnoprocede['t'] > 0 || $fnoprocedereporte['t'] > 0 || $totalnoprocede > 0) {
          // code...
        $data .= '<tr bgcolor="white">
        <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>JURÍDICAMENTE NO PROCEDENTE </font></p></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fnoprocede['t'].' </p></font></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fnoprocedereporte['t'].' </p></font></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1><p> '.$totalnoprocede.' </p></font></td>
        </tr>';
        }
        ////////////////////////////////////////////////////////////////////////
        if ($fparcialproc['t'] > 0 || $fparcialprocreporte['t'] > 0 || $totalparcialproc > 0) {
          $data .= '<tr bgcolor="white">
          <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>PARCIALMENTE PROCEDENTE </font></p></td>
          <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fparcialproc['t'].' </p></font></td>
          <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fparcialprocreporte['t'].' </p></font></td>
          <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1><p> '.$totalparcialproc.' </p></font></td>
          </tr>';
        }
        ////////////////////////////////////////////////////////////////////////
        $data .= '<tr bgcolor="#e6e1dc">
        <td style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;"><font size=1 color="#97897D"><b>TOTAL DE SOLICITUDES RECIBIDAS &nbsp;</b></font></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1 color="#97897D"><b> '.$totalanterior.' </b></font></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1 color="#97897D"><b> '.$totalreporte.' </b></font></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1 color="#97897D"><b> '.$totalacumulado.' </b></font></td>
        </tr>';
        ////////////////////////////////////////////////////////////////////////
        $data .= '</tbody>
      </table>
<!-- SEGUNDA TABLA -->
</div>
<div style="float: left; width: 50%;">
<table id="tabla1" border="1px" cellspacing="0" width="100%" bgcolor="#97897D">
  <thead class="thead-dark">
    <tr>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="4"><font size=1><b style="text-align:center; color:white;">EXPEDIENTES DETERMINADOS PARA SU INCORPORACIÓN </b></font></th>
    </tr>
    <tr>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" rowspan="2"><font size=1><b style="text-align:center; color:white;">CONCEPTO </b></font></th>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="2"><font size=1><b style="text-align:center; color:white;">2023 </b></font></th>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;" rowspan="2"><font size=1><p style="text-align:center; color:white;">TOTAL ACUMULADO </p></font></th>
    </tr>
    <tr>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><p style="text-align:center; color:white;"><font size=1> DEL 1 DE ENERO AL '.$diafinsemant.' DE '.$meses[date('n')-1].'</p></font></th>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><p style="text-align:center; color:white;"><font size=1> DEL '.$diaini.' AL '.$diafin.' DE '.$meses[date('n')-1].'</p></font></th>
    </tr>
  </thead>
  <tbody>';
////////////////////////////////////////////////////////////////////////////////
////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
$incorporc = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' and fecha_analisis BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$rincorporc = $mysqli->query($incorporc);
$fincorporc = $rincorporc->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$incornoproc = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' and fecha_analisis BETWEEN '$fecha_inicio' AND '$fecha_anterior'";
$rincornoproc = $mysqli->query($incornoproc);
$fincornoproc = $rincornoproc->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$enelaboracion = "SELECT COUNT(*) as t FROM analisis_expediente
INNER JOIN expediente on analisis_expediente.folioexpediente = expediente.fol_exp
WHERE analisis_expediente.analisis = 'EN ELABORACION' and expediente.fecha_nueva BETWEEN '$fecha_inicio' and '$fecha_anterior'";
$renelaboracion = $mysqli->query($enelaboracion);
$fenelaboracion = $renelaboracion->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalanterior = $fincorporc['t'] + $fincornoproc['t'] + $fenelaboracion['t'];
////////////////////////conteo  de datos  de la semana para entregar reporte//////////////////////////////////////
$incorprocreporte = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION PROCEDENTE' and fecha_analisis BETWEEN '$diamesinicio' and '$diamesfin'";
$rincorprocreporte = $mysqli->query($incorprocreporte);
$fincorprocreporte = $rincorprocreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$incornoprocreporte = "SELECT COUNT(*) as t FROM analisis_expediente
WHERE incorporacion = 'INCORPORACION NO PROCEDENTE' and fecha_analisis BETWEEN '$diamesinicio' and '$diamesfin'";
$rincornoprocreporte = $mysqli->query($incornoprocreporte);
$fincornoprocreporte = $rincornoprocreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$enelaboracionreporte = "SELECT COUNT(*) as t FROM analisis_expediente
INNER JOIN expediente on analisis_expediente.folioexpediente = expediente.fol_exp
WHERE analisis_expediente.analisis = 'EN ELABORACION' and expediente.fecha_nueva BETWEEN '$diamesinicio' and '$diamesfin'";
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
  <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>INCORPORACION PROCEDENTE </font></p></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fincorporc['t'].' </p></font></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fincorprocreporte['t'].' </p></font></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1><p> '.$totalincorproc.' </p></font></td>
  </tr>';
}
////////////////////////////////////////////////////////////////////////////////
if ($fincornoproc['t'] > 0 || $fincornoprocreporte['t'] > 0 || $totalincornoproc > 0) {
  $data .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>INCORPORACION NO PROCEDENTE </font></p></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fincornoproc['t'].' </p></font></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fincornoprocreporte['t'].' </p></font></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1><p> '.$totalincornoproc.' </p></font></td>
  </tr>';
}
////////////////////////////////////////////////////////////////////////////////
if ($fenelaboracion['t'] > 0 || $fenelaboracionreporte['t'] > 0 || $totalenelaboracion > 0) {
  $data .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>EN ANÁLISIS PARA DETERMINAR SU INCORPORACIÓN </font></p></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fenelaboracion['t'].' </p></font></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fenelaboracionreporte['t'].' </p></font></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1><p> '.$totalenelaboracion.' </p></font></td>
  </tr>';
}
////////////////////////////////////////////////////////////////////////////////
$data .= '<tr bgcolor="#e6e1dc">
<td style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;"><font size=1 color="#97897D"><b>TOTAL DE EXPEDIENTES DETERMINADOS &nbsp;</b></font></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1 color="#97897D"><b> '.$totalanterior.' </b></font></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1 color="#97897D"><b> '.$totalreporte.' </b></font></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1 color="#97897D"><b> '.$totalacumulado.' </b></font></td>
</tr>';
////////////////////////////////////////////////////////////////////////////////
  $data .= '</tbody>
</table>
</div><br><br><br><br>';
////////////////////////////////////////////////////////////////////////////////
$data .= '<div style="float: left; width: 55%;">
  <table id="tabla1" border="1px" cellspacing="0" width="90%" bgcolor="#97897D">
    <thead class="thead-dark">
      <tr>
        <th style="border: 1>px solid #A19E9F; text-align:center; font-family: gothambook; width:300px;" rowspan="4" class="bg-success"><font size=3><b style="text-align:center; color:white;">CALIDAD DENTRO DEL PROGRAMA </b></font></th>
      </tr>
      <tr>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="3"><font size=3><b style="text-align:center; color:white;">PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA</b></font></th>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="3"><font size=3><b style="text-align:center; color:white;">SUJETOS INCORPORADOS AL PROGRAMA</b></font></th>
      </tr>
      <tr>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="2"><font size=3><b style="text-align:center; color:white;">2023</b></font></th>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;" rowspan="2"><font size=3><p style="text-align:center; color:white;">TOTAL  <br> ACUMULADO</p></font></th>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="2"><font size=3><b style="text-align:center; color:white;">2023</b></font></th>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;" rowspan="2"><font size=3><p style="text-align:center; color:white;">TOTAL  <br> ACUMULADO</p></font></th>
      </tr>
      <tr>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><p style="text-align:center; color:white;"><font size=3> DEL 1 DE ENERO AL '.$diafinsemant.' DE '.$meses[date('n')-1].'</p></font></th>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><p style="text-align:center; color:white;"><font size=3> DEL '.$diaini.' AL '.$diafin.' DE '.$meses[date('n')-1].'</p></font></th>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><p style="text-align:center; color:white;"><font size=3> DEL 1 DE ENERO AL '.$diafinsemant.' DE '.$meses[date('n')-1].'</p></font></th>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><p style="text-align:center; color:white;"><font size=3> DEL '.$diaini.' AL '.$diafin.' DE '.$meses[date('n')-1].'</p></font></th>
      </tr>
    </thead>
    <tbody>';
    ////////////////////////////////////////////////////////////////////////////////
    $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
    // echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
    $fecha_actual = date("Y-m-d");
    $day = date("l");
    switch ($day) {
        case "Sunday":
               $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
               $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 6 day"));
               ////////////////////fechas de reporte semanal
               $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
               $diafinsemant = date( "j", $diafinsemanaanterior);
               $diainicio = strtotime($fecha_actual);
               $diaini = date( "j", $diainicio);
               $diafinal = strtotime($fecha_fin);
               $diafin = date( "j", $diafinal);
               // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
               // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
        break;
        case "Monday":
               $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
               $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
               $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 5 day"));
               ////////////////////fechas de reporte semanal
               $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
               $diafinsemant = date( "j", $diafinsemanaanterior);
               $diainicio = strtotime($fecha_inicio);
               $diaini = date( "j", $diainicio);
               $diafinal = strtotime($fecha_fin);
               $diafin = date( "j", $diafinal);
               // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
               // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
        break;
        case "Tuesday":
               $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
               $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
               $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 4 day"));
               ////////////////////fechas de reporte semanal
               $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
               $diafinsemant = date( "j", $diafinsemanaanterior);
               $diainicio = strtotime($fecha_inicio);
               $diaini = date( "j", $diainicio);
               $diafinal = strtotime($fecha_fin);
               $diafin = date( "j", $diafinal);
               // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
               // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
        break;
        case "Wednesday":
               $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
               $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
               $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 3 day"));
               ////////////////////fechas de reporte semanal
               $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
               $diafinsemant = date( "j", $diafinsemanaanterior);
               $diainicio = strtotime($fecha_inicio);
               $diaini = date( "j", $diainicio);
               $diafinal = strtotime($fecha_fin);
               $diafin = date( "j", $diafinal);
               // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
               // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
        break;
        case "Thursday":
               $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
               $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
               $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 2 day"));
               ////////////////////fechas de reporte semanal
               $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
               $diafinsemant = date( "j", $diafinsemanaanterior);
               $diainicio = strtotime($fecha_inicio);
               $diaini = date( "j", $diainicio);
               $diafinal = strtotime($fecha_fin);
               $diafin = date( "j", $diafinal);
               // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
               // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
        break;
        case "Friday":
               $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
               $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 6 day"));
               $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 1 day"));
               ////////////////////fechas de reporte semanal
               $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
               $diafinsemant = date( "j", $diafinsemanaanterior);
               $diainicio = strtotime($fecha_inicio);
               $diaini = date( "j", $diainicio);
               $diafinal = strtotime($fecha_fin);
               $diafin = date( "j", $diafinal);
               // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
               // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
        break;
        case "Saturday":
               $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 6 day"));
               $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 7 day"));
               $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 0 day"));
               ////////////////////fechas de reporte semanal
               $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
               $diafinsemant = date( "j", $diafinsemanaanterior);
               $diainicio = strtotime($fecha_inicio);
               $diaini = date( "j", $diainicio);
               $diafinal = strtotime($fecha_fin);
               $diafin = date( "j", $diafinal);
               // echo '<h1 style="text-align:center">' ; echo "DEL 1 DE ENERO AL ".$diafinsemant. " DE ".$meses[date('n')-1]; echo '</h1>';
               // echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
        break;
    }
    // echo $fecha_fin;
    ////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
    $calidad = "SELECT * FROM calidadpersona";
    $rcalidad = $mysqli->query($calidad);
    while ($fcalidad = $rcalidad->fetch_assoc()) {
      $namecalidad = $fcalidad['nombre'];
      if ($fcalidad['nombre'] === 'I. VICTIMA') {
        $namecortocalidad = 'VICTIMA';
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
        $namecortocalidad = 'POLICIA';
      }
      if ($fcalidad['nombre'] === 'VIII. PERITO') {
        $namecortocalidad = 'PERITO';
      }
      if ($fcalidad['nombre'] === 'IX. JUEZ O MAGISTRADO DEL PODER JUDICIAL') {
        $namecortocalidad = 'JUEZ O MAGISTRADO DEL PODER JUDICIAL';
      }
      if ($fcalidad['nombre'] === 'X. PERSONA CON PARENTESCO O CERCANIA') {
        $namecortocalidad = 'PERSONA CON PARENTESCO O CERCANIA';
      }
      //////////////////////////////////////////////////////////////////////////////
      $personaspropuestas = "SELECT COUNT(*) as t FROM datospersonales
      INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
      WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$namecalidad' AND autoridad.fechasolicitud_persona BETWEEN '2023-01-01' AND '$fecha_finsemanaanterior'";
      $rpersonaspropuestas = $mysqli->query($personaspropuestas);
      $fpersonaspropuestas = $rpersonaspropuestas->fetch_assoc();
      //////////////////////////////////////////////////////////////////////////////
      $personaspropuestasreporte = "SELECT COUNT(*) as t FROM datospersonales
      INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
      WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$namecalidad' AND autoridad.fechasolicitud_persona BETWEEN '$fecha_inicio' AND '$fecha_fin'";
      $rpersonaspropuestasreporte = $mysqli->query($personaspropuestasreporte);
      $fpersonaspropuestasreporte = $rpersonaspropuestasreporte->fetch_assoc();
      //////////////////////////////////////////////////////////////////////////////
      $totalperpropuestas = $fpersonaspropuestas['t'] + $fpersonaspropuestasreporte['t'];
      //////////////////////////////////////////////////////////////////////////////
      $perincorporadas = "SELECT COUNT(*) as t  FROM datospersonales
      INNER JOIN determinacionincorporacion on datospersonales.id = determinacionincorporacion.id_persona
      WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$namecalidad' AND determinacionincorporacion.convenio = 'FORMALIZADO'
      AND determinacionincorporacion.fecha_inicio BETWEEN '2023-01-01' AND '$fecha_finsemanaanterior'";
      $rperincorporadas = $mysqli->query($perincorporadas);
      $fperincorporadas = $rperincorporadas->fetch_assoc();
      //////////////////////////////////////////////////////////////////////////////
      $perincorporadasreporte = "SELECT COUNT(*) as t  FROM datospersonales
      INNER JOIN determinacionincorporacion on datospersonales.id = determinacionincorporacion.id_persona
      WHERE datospersonales.relacional = 'NO' AND datospersonales.calidadpersona = '$namecalidad' AND determinacionincorporacion.convenio = 'FORMALIZADO'
      AND determinacionincorporacion.fecha_inicio BETWEEN '$fecha_inicio' AND '$fecha_fin'";
      $rperincorporadasreporte = $mysqli->query($perincorporadasreporte);
      $fperincorporadasreporte = $rperincorporadasreporte->fetch_assoc();
      //////////////////////////////////////////////////////////////////////////////
      $totalperincorporadas = $fperincorporadas['t'] + $fperincorporadasreporte['t'];
      //////////////////////////////////////////////////////////////////////////////
      $totalacumuladoperprop = $fpersonaspropuestas['t'] + $fpersonaspropuestas['t'];

      if ($fpersonaspropuestas['t'] > 0 ) {
        $data .= '<tr bgcolor="white">
        <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=3><p>'.$namecortocalidad.'</font></p></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=3><p> '.$fpersonaspropuestas['t'].' </p></font></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=3><p> '.$fpersonaspropuestasreporte['t'].' </p></font></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=3><p> '.$totalperpropuestas.' </p></font></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=3><p> '.$fperincorporadas['t'].' </p></font></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=3><p> '.$fperincorporadasreporte['t'].' </p></font></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=3><p> '.$totalperincorporadas.' </p></font></td>
        </tr>';
      }
    }
    ////////////////////////////////////////////////////////////////////////////////
    $personaspropuestastotal = "SELECT COUNT(*) as t FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud_persona BETWEEN '2023-01-01' AND '$fecha_finsemanaanterior'";
    $rpersonaspropuestastotal = $mysqli->query($personaspropuestastotal);
    $fpersonaspropuestastotal = $rpersonaspropuestastotal->fetch_assoc();
    ////////////////////////////////////////////////////////////////////////////////
    $personaspropuestasreportetotal = "SELECT COUNT(*) as t FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.relacional = 'NO' AND autoridad.fechasolicitud_persona BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    $rpersonaspropuestasreportetotal = $mysqli->query($personaspropuestasreportetotal);
    $fpersonaspropuestasreportetotal = $rpersonaspropuestasreportetotal->fetch_assoc();
    ////////////////////////////////////////////////////////////////////////////////
    $totalperpropacumulado = $fpersonaspropuestastotal['t'] + $fpersonaspropuestasreportetotal['t'];
    ////////////////////////////////////////////////////////////////////////////////
    $perincorporadastotal = "SELECT COUNT(*) as t  FROM datospersonales
    INNER JOIN determinacionincorporacion on datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
    AND determinacionincorporacion.fecha_inicio BETWEEN '2023-01-01' AND '$fecha_finsemanaanterior'";
    $rperincorporadastotal = $mysqli->query($perincorporadastotal);
    $fperincorporadastotal = $rperincorporadastotal->fetch_assoc();
    ////////////////////////////////////////////////////////////////////////////////
    $perincorporadasreportetotal = "SELECT COUNT(*) as t  FROM datospersonales
    INNER JOIN determinacionincorporacion on datospersonales.id = determinacionincorporacion.id_persona
    WHERE datospersonales.relacional = 'NO' AND determinacionincorporacion.convenio = 'FORMALIZADO'
    AND determinacionincorporacion.fecha_inicio BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    $rperincorporadasreportetotal = $mysqli->query($perincorporadasreportetotal);
    $fperincorporadasreportetotal = $rperincorporadasreportetotal->fetch_assoc();
    ////////////////////////////////////////////////////////////////////////////////
    $totalperincorporadasacumulado = $fperincorporadastotal['t'] + $fperincorporadasreportetotal['t'];
    ////////////////////////////////////////////////////////////////////////////////
    $data .= '<tr bgcolor="#e6e1dc">
    <td style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;"><font size=4 color="#97897D"><b>TOTAL DE PERSONAS&nbsp;&nbsp;</b></font></td>
    <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=4 color="#97897D"><b> '.$fpersonaspropuestastotal['t'].' </b></font></td>
    <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=4 color="#97897D"><b> '.$fpersonaspropuestasreportetotal['t'].' </b></font></td>
    <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=4 color="#97897D"><b> '.$totalperpropacumulado.' </b></font></td>
    <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=4 color="#97897D"><b> '.$fperincorporadastotal['t'].' </b></font></td>
    <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=4 color="#97897D"><b> '.$fperincorporadasreportetotal['t'].' </b></font></td>
    <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=4 color="#97897D"><b> '.$totalperincorporadasacumulado.' </b></font></td>
    </tr>';

    $data .='</tbody>
  </table>
</div>
<div style="float: right; width: 40%;">
<table id="tabla1" border="1px" cellspacing="0" width="100%" bgcolor="#97897D">
  <thead class="thead-dark">
    <tr>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="4"><font size=1><b style="text-align:center; color:white;">SEGUIMIENTO A LAS MEDIDAS DE APOYO DEL '.$diaini.' AL '.$diafin.' DE '.$meses[date('n')-1].' </b></font></th>
    </tr>
    <tr>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:130px;" rowspan="2"><font size=1><b style="text-align:center; color:white;">CLASIFICACIÓN DE LAS MEDIDAS </b></font></th>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="3"><font size=1><b style="text-align:center; color:white;">ETAPA DENTRO DEL PROGRAMA </b></font></th>
    </tr>
    <tr>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><p style="text-align:center; color:white;"><font size=1> EN EJECUCIÓN</p></font></th>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><p style="text-align:center; color:white;"><font size=1> EJECUTADAS</p></font></th>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><p style="text-align:center; color:white;"><font size=1> CANCELADAS</p></font></th>
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
AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin'";
$rmedejecutadasasistencia = $mysqli->query($medejecutadasasistencia);
$fmedejecutadasasistencia = $rmedejecutadasasistencia->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$medejecutadasresguardo = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA' AND clasificacion = 'RESGUARDO'
AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin'";
$rmedejecutadasresguardo = $mysqli->query($medejecutadasresguardo);
$fmedejecutadasresguardo = $rmedejecutadasresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalejecutadas = $fmedejecutadasasistencia['t'] + $fmedejecutadasresguardo['t'];
////////////////////////////////////////////////////////////////////////////////
$medcanceladasasistencia = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'CANCELADA' AND clasificacion = 'ASISTENCIA'
AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin'";
$rmedcanceladasasistencia = $mysqli->query($medcanceladasasistencia);
$fmedcanceladasasistencia = $rmedcanceladasasistencia->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$medicanceladasresguardo = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'CANCELADA' AND clasificacion = 'RESGUARDO'
AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin'";
$rmedicanceladasresguardo = $mysqli->query($medicanceladasresguardo);
$fmedicanceladasresguardo = $rmedicanceladasresguardo->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalcanceladas = $fmedcanceladasasistencia['t'] + $fmedicanceladasresguardo['t'];
////////////////////////////////////////////////////////////////////////////////
$data .= '<tr bgcolor="white">
<td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>MEDIDAS DE ASISTENCIA </font></p></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fmedejecucionasistencia['t'].' </p></font></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fmedejecutadasasistencia['t'].' </p></font></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1><p> '.$fmedcanceladasasistencia['t'].' </p></font></td>
</tr>';
////////////////////////////////////////////////////////////////////////////////
$data .= '<tr bgcolor="white">
<td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>MEDIDAS DE RESGUARDO </font></p></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fmedejecucionresguardo['t'].' </p></font></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fmedejecutadasresguardo['t'].' </p></font></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1><p> '.$fmedicanceladasresguardo['t'].' </p></font></td>
</tr>';
////////////////////////////////////////////////////////////////////////////////
$data .= '<tr bgcolor="#e6e1dc">
<td style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;"><font size=1 color="#97897D"><b>TOTAL DE MEDIDAS &nbsp;</b></font></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1 color="#97897D"><b> '.$totalejecucion.' </b></font></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1 color="#97897D"><b> '.$totalejecutadas.' </b></font></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1 color="#97897D"><b> '.$totalcanceladas.' </b></font></td>
</tr>';
////////////////////////////////////////////////////////////////////////////////
  $data .= '</tbody>
</table>
<br>';
$validarmedejecutadas = "SELECT COUNT(*) as t FROM medidas WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin'";
$rvalidarmedejecutadas = $mysqli->query($validarmedejecutadas);
$fvalidarmedejecutadas = $rvalidarmedejecutadas->fetch_assoc();
if ($fvalidarmedejecutadas['t'] > 0) {
$data .= '<table id="tabla1" border="1px" cellspacing="0" width="100%" bgcolor="#97897D">
  <thead class="thead-dark">
    <tr>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="4"><font size=1><b style="text-align:center; color:white;">MUNICIPIO DE EJECUCIÓN DE LAS MEDIDAS DE APOYO CONCLUÍDAS </b></font></th>
    </tr>
    <tr>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" rowspan="2"><font size=1><b style="text-align:center; color:white;">MUNICIPIO </b></font></th>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="2"><font size=1><b style="text-align:center; color:white;">CLASIFICACIÓN DE LAS MEDIDAS </b></font></th>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;" rowspan="2"><font size=1><p style="text-align:center; color:white;">TOTAL </p></font></th>
    </tr>
    <tr>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><p style="text-align:center; color:white;"><font size=1> ASISTENCIA</p></font></th>
      <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><p style="text-align:center; color:white;"><font size=1> RESGUARDO</p></font></th>
    </tr>
  </thead>
  <tbody>';
////////////////////////////////////////////////////////////////////////////////
////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
$municipios = "SELECT ejecucion, count(*) as t
FROM medidas
WHERE date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin' AND estatus = 'EJECUTADA'
GROUP BY ejecucion
ORDER BY COUNT(*) DESC";
$rmunicipios = $mysqli->query($municipios);
while ($fmunicipios = $rmunicipios -> fetch_assoc()) {
  $municipio = $fmunicipios['ejecucion'];
  //////////////////////////////////////////////////////////////////////////////
  $ejecutadasasistencia = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin' AND estatus = 'EJECUTADA'
  AND ejecucion = '$municipio' AND clasificacion = 'ASISTENCIA'";
  $rejecutadasasistencia = $mysqli -> query ($ejecutadasasistencia);
  $fejecutadasasistencia = $rejecutadasasistencia->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $ejecutadasresguardo = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin' AND estatus = 'EJECUTADA'
  AND ejecucion = '$municipio' AND clasificacion = 'RESGUARDO'";
  $rejecutadasresguardo = $mysqli -> query ($ejecutadasresguardo);
  $fejecutadasresguardo = $rejecutadasresguardo->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $data .= '<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>'.$fmunicipios['ejecucion'].' </font></p></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fejecutadasasistencia['t'].' </p></font></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fejecutadasresguardo['t'].' </p></font></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1><p> '.$fmunicipios['t'].' </p></font></td>
  </tr>';
}
//////////////////////////////////////////////////////////////////////////////
$totalejecutadasasistencia = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin' AND estatus = 'EJECUTADA'
AND clasificacion = 'ASISTENCIA'";
$rtotalejecutadasasistencia = $mysqli -> query ($totalejecutadasasistencia);
$ftotalejecutadasasistencia = $rtotalejecutadasasistencia->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$totalejecutadasresguardo = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin' AND estatus = 'EJECUTADA'
AND clasificacion = 'RESGUARDO'";
$rtotalejecutadasresguardo = $mysqli -> query ($totalejecutadasresguardo);
$ftotalejecutadasresguardo = $rtotalejecutadasresguardo->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$totalacumulado = "SELECT COUNT(*) as t FROM medidas WHERE date_ejecucion BETWEEN '$fecha_inicio' AND '$fecha_fin' AND estatus = 'EJECUTADA'";
$rtotalacumulado = $mysqli -> query ($totalacumulado);
$ftotalacumulado = $rtotalacumulado->fetch_assoc();
//////////////////////////////////////////////////////////////////////////////
$data .= '<tr bgcolor="#e6e1dc">
<td style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;"><font size=1 color="#97897D"><b>TOTAL &nbsp;</b></font></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1 color="#97897D"><b> '.$ftotalejecutadasasistencia['t'].' </b></font></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1 color="#97897D"><b> '.$ftotalejecutadasresguardo['t'].' </b></font></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1 color="#97897D"><b> '.$ftotalacumulado['t'].' </b></font></td>
</tr>';
////////////////////////////////////////////////////////////////////////////////
  $data .= '</tbody>
</table></div></div>';
}

$mpdf ->WriteHtml($css, \Mpdf\HTMLParsermode::HEADER_CSS);
$mpdf->WriteHtml($data);
///////////////////////////////////////////////////////////////////////////////pagina 2
$mpdf->AddPage();
$data1 .= '<br><br><br><br><h4 style="text-align:center; font-family: gothambook;"><b>Reporte Global Semanal <br> DEL 1 DE JUNIO DEL 2021 AL '.$diafin.' DE '.$meses[date('n')-1].' DEL '.date('Y').' </b> </h4>';


$data1 .= '<br><div style="float: left; width: 45%;">
<table id="tabla1" border="1px" cellspacing="0" width="90%" bgcolor="#97897D">
  <thead class="thead-dark">
    <tr>
      <th style="border: 1>px solid #A19E9F; text-align:center; font-family: gothambook; width:270px;" colspan="2" class="bg-success"><font size=3><b style="text-align:center; color:white;">EXPEDIENTES DE PROTECCIÓN</b></font></th>
    </tr>
    <tr>
      <th style="border: 1>px solid #A19E9F; text-align:center; font-family: gothambook; width:300px;" class="bg-success"><font size=3><b style="text-align:center; color:white;">ETAPA DENTRO DEL PROGRAMA</b></font></th>
      <th style="border: 1>px solid #A19E9F; text-align:center; font-family: gothambook; width:270px;" class="bg-success"><font size=3><b style="text-align:center; color:white;">TOTAL</b></font></th>
    </tr>
  </thead>
  <tbody>';
  ////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
  $noprocede = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
  INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
  WHERE valoracionjuridica.resultadovaloracion = 'NO PROCEDE' and expediente.fecha_nueva BETWEEN '2023-01-01' and '$fecha_fin'";
  $rnoprocede = $mysqli->query($noprocede);
  $fnoprocede = $rnoprocede->fetch_assoc();
  ////////////////////////////////////////////////////////////////////////////////
  $enelaboracionreporte = "SELECT COUNT(*) as t FROM analisis_expediente
  INNER JOIN expediente on analisis_expediente.folioexpediente = expediente.fol_exp
  WHERE analisis_expediente.analisis = 'EN ELABORACION' and expediente.fecha_nueva BETWEEN '2023-01-01' and '$fecha_fin'";
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
    <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>NO PROCEDE JURIDICAMENTE </font></p></td>
    <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fnoprocede['t'].' </p></font></td>
    </tr>';
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($fenelaboracionreporte['t'] > 0) {
    $data1 .= '<tr bgcolor="white">
    <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook; width:320px;"><font size=1><p>EN ANÁLISIS PARA DETERMINAR SU INCORPORACIÓN *</font></p></td>
    <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fenelaboracionreporte['t'].' </p></font></td>
    </tr>';
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($fbyejecucion['t'] > 0) {
    $data1 .= '<tr bgcolor="white">
    <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>EN EJECUCIÓN </font></p></td>
    <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fbyejecucion['t'].' </p></font></td>
    </tr>';
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($fconcluido['t'] > 0) {
    $data1 .= '<tr bgcolor="white">
    <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>CONCLUIDO </font></p></td>
    <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fconcluido['t'].' </p></font></td>
    </tr>';
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($fcancelado['t'] > 0) {
    $data1 .= '<tr bgcolor="white">
    <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>CANCELADO </font></p></td>
    <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:80px;"><font size=1><p> '.$fcancelado['t'].' </p></font></td>
    </tr>';
  }
  //////////////////////////////////////////////////////////////////////////////
  $data1 .= '<tr bgcolor="#e6e1dc">
  <td style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;"><font size=1 color="#97897D"><b>TOTAL DE EXPEDIENTES &nbsp;</b></font></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:5px;"><font size=1 color="#97897D"><b> '.$totalexpedientes.' </b></font></td>
  </tr>';
  //////////////////////////////////////////////////////////////////////////////
$data1 .='</tbody>
</table>';
if ($fenelaboracionreporte['t'] > 0) {
  $data1 .= '<span><font size=1 color="#97897D">&nbsp;&nbsp;&nbsp;&nbsp;*Comprende los Expedientes de Protección sobre los cuales se determinará la <br>
  &nbsp;&nbsp;&nbsp;&nbsp; incorporación del sujeto propuesto al Programa, así como los que se encuentran <br>
  &nbsp;&nbsp;&nbsp;&nbsp; en proceso de formalizar su ingreso al mismo.
  </font></span>';
}
$data1 .= '</div>';
////////////////////////////////////////////////////////////////////////////////
$data1 .= '<div style="float: right; width: 45%;">
<table id="tabla1" border="1px" cellspacing="0" width="90%" bgcolor="#97897D">
  <thead class="thead-dark">
    <tr>
      <th style="border: 1>px solid #A19E9F; text-align:center; font-family: gothambook; width:270px;" colspan="2" class="bg-success"><font size=3><b style="text-align:center; color:white;">PERSONAS QUE SOLICITARON INCORPORARSE</b></font></th>
    </tr>
    <tr>
      <th style="border: 1>px solid #A19E9F; text-align:center; font-family: gothambook; width:300px;" class="bg-success"><font size=3><b style="text-align:center; color:white;">ETAPA DENTRO DEL PROGRAMA</b></font></th>
      <th style="border: 1>px solid #A19E9F; text-align:center; font-family: gothambook; width:270px;" class="bg-success"><font size=3><b style="text-align:center; color:white;">TOTAL</b></font></th>
    </tr>
  </thead>
  <tbody>';
  ////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
  $data1 .='</tbody>
  </table>';
$data1 .= '</div>';
////////////////////////////////////////////////////////////////////////////////
$mpdf->WriteHtml($data1);
////////////////////////////////////////////////////////////////////////////////
$mpdf->output("REPORTE SEMANAL.pdf",'D');
?>
