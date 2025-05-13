<?php
$fechainicial = $_POST['diainicio'];
$fechafin  = $_POST['diafin'];
$dateprin = date("d-m-Y", strtotime($fechainicial));
$dateconclu = date("d-m-Y", strtotime($fechafin));
require_once '../../mpdf/vendor/autoload.php';
include("../conexion.php");
$css = file_get_contents('css/main2.css');

$mpdf = new \Mpdf\Mpdf([
          'mode' => '',
          'format' => 'A4',
          'default_font_size' => 0,
          'default_font' => '',
          'margin_left' => 10,
          'margin_right' => 7,
          'margin_top' => 6,
          'margin_bottom' => 6,
          'margin_header' => 2,
          'margin_footer' => 2,
          'orientation' => 'P',
    ]);
    $mpdf->SetHTMLHeader('<table width="100%">
    <tr>
    <td width="10%"><img  src="../../image/gobierno2.jpg" width="120" height="130"></td>
    <td width="80%" style="font-family: gothambook" align="center"><span align="center">SUBDIRECCIÓN DE EJECUCIÓN DE MEDIDAS </span><br>
    </td>
    <td width="10%" style="text-align: right;"><img  src="../../image/FGJEM.jpg" width="60" height="60"></td>
    </tr>
    </table>');
    $mpdf->SetHTMLFooter('
    <div>
    <table width="4%" align="right">
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
    Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio<br>
    Subdirección de Ejecución de Medidas
    </font></span></h3>
    </td>
    </tr>
    </table>
    </p>
    </p>
    </div>
    ');

$data .= '<br><br><br><br><br><br>';
// $data .= ''.$fechainicial.'';
// $data .= '<br>';
// $data .= ''.$fechafin.'';



$diainicial = date('d', strtotime($fechainicial));
$mesnumeroinicial = date('m', strtotime($fechainicial));
$anioinicial = date('Y', strtotime($fechainicial));

$diafinal = date('d', strtotime($fechafin));
$mesnumerofinal = date('m', strtotime($fechafin));
$aniofinal = date('Y', strtotime($fechafin));
  switch ($mesnumeroinicial) {
    case 1:
    echo $fecha_formateada_inicial = $diainicial." DE ENERO DE ".$anioinicial;
    break;
    case 2:
    echo $fecha_formateada_inicial = $diainicial." DE FEBRERO DE ".$anioinicial;
    break;
    case 3:
    echo $fecha_formateada_inicial = $diainicial." DE MARZO DE ".$anioinicial;
    break;
    case 4:
    echo $fecha_formateada_inicial = $diainicial." DE ABRIL DE ".$anioinicial;
    break;
    case 5:
    echo $fecha_formateada_inicial = $diainicial." DE MAYO DE ".$anioinicial;
    break;
    case 6:
    echo $fecha_formateada_inicial = $diainicial." DE JUNIO DE ".$anioinicial;
    break;
    case 7:
    echo $fecha_formateada_inicial = $diainicial." DE JULIO DE ".$anioinicial;
    break;
    case 8:
    echo $fecha_formateada_inicial = $diainicial." DE AGOSTO DE ".$anioinicial;
    break;
    case 9:
    echo $fecha_formateada_inicial = $diainicial." DE SEPTIEMBRE DE ".$anioinicial;
    break;
    case 10:
    echo $fecha_formateada_inicial = $diainicial." DE OCTUBRE DE ".$anioinicial;
    break;
    case 11:
    echo $fecha_formateada_inicial = $diainicial." DE NOVIEMBRE DE ".$anioinicial;
    break;
    case 12:
    echo $fecha_formateada_inicial = $diainicial." DE DICIEMBRE DE ".$anioinicial;
    break;
  }

  switch ($mesnumerofinal) {
    case 1:
    echo $fecha_formateada_final = $diafinal." DE ENERO DE ".$aniofinal;
    break;
    case 2:
    echo $fecha_formateada_final = $diafinal." DE FEBRERO DE ".$aniofinal;
    break;
    case 3:
    echo $fecha_formateada_final = $diafinal." DE MARZO DE ".$aniofinal;
    break;
    case 4:
    echo $fecha_formateada_final = $diafinal." DE ABRIL DE ".$aniofinal;
    break;
    case 5:
    echo $fecha_formateada_final = $diafinal." DE MAYO DE ".$aniofinal;
    break;
    case 6:
    echo $fecha_formateada_final = $diafinal." DE JUNIO DE ".$aniofinal;
    break;
    case 7:
    echo $fecha_formateada_final = $diafinal." DE JULIO DE ".$aniofinal;
    break;
    case 8:
    echo $fecha_formateada_final = $diafinal." DE AGOSTO DE ".$aniofinal;
    break;
    case 9:
    echo $fecha_formateada_final = $diafinal." DE SEPTIEMBRE DE ".$aniofinal;
    break;
    case 10:
    echo $fecha_formateada_final = $diafinal." DE OCTUBRE DE ".$aniofinal;
    break;
    case 11:
    echo $fecha_formateada_final = $diafinal." DE NOVIEMBRE DE ".$aniofinal;
    break;
    case 12:
    echo $fecha_formateada_final = $diafinal." DE DICIEMBRE DE ".$aniofinal;
    break;
  }





$data .='<div style=""><div style=""><div >
  <table style="width: 50%; margin: 0 auto;" class="table table-striped table-bordered" cellspacing="0" bgcolor="#97897D">
      <thead class="thead-dark">
          <tr>
              <th colspan="4" style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">PERIODO DE CONSULTA DE LA INFORMACIÓN</b></font></th>
          </tr>
          <tr>
              <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" ><font size=1><b style="text-align:center; color:white;">DEL </b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=1>'.$fecha_formateada_inicial.'</p></font></th>
              <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" ><font size=1><b style="text-align:center; color:white;">AL </b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=1>'.$fecha_formateada_final.'</p></font></th>
          </tr>
      </thead>
  </table>
</div>';

$data .='<br><br><br>
<div style="float:left;width: 65%;outline: white solid thin">
  <table  style="width: 100%; margin: 0 auto;" class="table table-striped table-bordered" cellspacing="0" bgcolor="#97897D">
    <!-- <h1>TRASLADOS</h1> -->
    <thead class="thead-dark">
      <tr>
        <th colspan="6" style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">TRASLADOS</b></font></th>
      </tr>
      <tr>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" rowspan="2"><font size=1><b style="text-align:center; color:white;">CONCEPTO</b></font></th>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="2"><font size=1><b style="text-align:center; color:white;">SUJETOS PROTEGIDOS</b></font></th>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="2"><font size=1><b style="text-align:center; color:white;">PERSONAS PROPUESTAS</b></font></th>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" rowspan="2"><font size=1><b style="text-align:center; color:white;">TOTAL</b></font></th>
      </tr>
      <tr>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">SIN ESTADIA</b></font></th>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">CON ESTADIA</b></font></th>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">SIN ESTADIA</b></font></th>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">CON ESTADIA</b></font></th>
      </tr>
    </thead>';

    $totalcol1 = "SELECT COUNT(*) AS tcol1sin FROM react_sujetos_traslado
    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
    WHERE react_sujetos_traslado.resguardado = 'NO'
    AND datospersonales.estatus = 'SUJETO PROTEGIDO'
    AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
    $rtotalcol1 = $mysqli->query($totalcol1);
    $ftotalcol1 = $rtotalcol1->fetch_assoc();
    //
    $totalcol2 = "SELECT COUNT(*) AS tcol1con FROM react_sujetos_traslado
    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
    WHERE react_sujetos_traslado.resguardado = 'SI'
    AND datospersonales.estatus = 'SUJETO PROTEGIDO'
    AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
    $rtotalcol2 = $mysqli->query($totalcol2);
    $ftotalcol2 = $rtotalcol2->fetch_assoc();
    //
    $totalcol3 = "SELECT COUNT(*) AS tcol1sinpp FROM react_sujetos_traslado
    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
    WHERE react_sujetos_traslado.resguardado = 'NO'
    AND datospersonales.estatus = 'PERSONA PROPUESTA'
    AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
    $rtotalcol3 = $mysqli->query($totalcol3);
    $ftotalcol3 = $rtotalcol3->fetch_assoc();
    //
    $totalcol4 = "SELECT COUNT(*) AS tcol1conpp FROM react_sujetos_traslado
    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
    WHERE react_sujetos_traslado.resguardado = 'SI'
    AND datospersonales.estatus = 'PERSONA PROPUESTA'
    AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
    $rtotalcol4 = $mysqli->query($totalcol4);
    $ftotalcol4 = $rtotalcol4->fetch_assoc();
    //
    $totalcol5 = "SELECT COUNT(*) AS totalfinal FROM react_sujetos_traslado
    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
    WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
    $rtotalcol5 = $mysqli->query($totalcol5);
    $ftotalcol5 = $rtotalcol5->fetch_assoc();
    //
$data .='
    <tbody>
      <tr bgcolor="white">
        <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>TRASLADAR A LAS PP  Y SP <br> A DIFERENTES INSTANCIAS</font></p></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$ftotalcol1['tcol1sin'].'</font></p></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$ftotalcol2['tcol1con'].'</font></p></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$ftotalcol3['tcol1sinpp'].'</font></p></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$ftotalcol4['tcol1conpp'].'</font></p></td>
        <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$ftotalcol5['totalfinal'].'</font></p></td>
      <tr>';

  // traer lista de motivos de traslados
  $motivotras = "SELECT * FROM react_traslados_instancias";
  $rmotivotras = $mysqli->query($motivotras);
  while ($fmotivotras = $rmotivotras ->fetch_assoc()) {
    $namemotivo = $fmotivotras['nombre'];

    // contar total de motivo dada las fechas
    // $motivoname = "SELECT COUNT(*) AS totalmotivo FROM react_destinos_traslados
    // INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
    // WHERE react_destinos_traslados.motivo = '$namemotivo' AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
    // con estadia
    $conestadia = "SELECT COUNT(*) AS totalconestadia FROM react_sujetos_traslado
    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
    WHERE react_destinos_traslados.motivo = '$namemotivo' AND react_sujetos_traslado.resguardado = 'SI'
    AND datospersonales.estatus = 'SUJETO PROTEGIDO'
    AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
    $rconestadia = $mysqli->query($conestadia);
    $fconestadia = $rconestadia->fetch_assoc();
    // sin estadia
    $sinestadia = "SELECT COUNT(*) AS totalsinestadia FROM react_sujetos_traslado
    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
    WHERE react_destinos_traslados.motivo = '$namemotivo' AND react_sujetos_traslado.resguardado = 'NO'
    AND datospersonales.estatus = 'SUJETO PROTEGIDO'
    AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
    $rsinestadia = $mysqli->query($sinestadia);
    $fsinestadia = $rsinestadia->fetch_assoc();
    // PERSONAS PROPUESTAS
    $conestadiaprop = "SELECT COUNT(*) AS totalconestadiaprop FROM react_sujetos_traslado
    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
    WHERE react_destinos_traslados.motivo = '$namemotivo' AND react_sujetos_traslado.resguardado = 'SI'
    AND datospersonales.estatus = 'PERSONA PROPUESTA'
    AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
    $rconestadiaprop = $mysqli->query($conestadiaprop);
    $fconestadiaprop = $rconestadiaprop->fetch_assoc();
    //
    $sinestadiaprop = "SELECT COUNT(*) AS totalsinestadiaprop FROM react_sujetos_traslado
    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
    WHERE react_destinos_traslados.motivo = '$namemotivo' AND react_sujetos_traslado.resguardado = 'NO'
    AND datospersonales.estatus = 'PERSONA PROPUESTA'
    AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
    $rsinestadiaprop = $mysqli->query($sinestadiaprop);
    $fsinestadiaprop = $rsinestadiaprop->fetch_assoc();
    // TOTALES POR MOTIVO
    $totalmotivo_des = "SELECT COUNT(*) AS totalmotivo_des FROM react_sujetos_traslado
    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
    WHERE react_destinos_traslados.motivo = '$namemotivo'
    AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
    $rtotalmotivo_des = $mysqli->query($totalmotivo_des);
    $ftotalmotivo_des = $rtotalmotivo_des->fetch_assoc();

$data .='<tr bgcolor="white">
  <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>'.$fmotivotras['nombre'].'</font></p></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$fsinestadia['totalsinestadia'].'</font></p></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$fconestadia['totalconestadia'].'</font></p></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$fsinestadiaprop['totalsinestadiaprop'].'</font></p></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$fconestadiaprop['totalconestadiaprop'].'</font></p></td>
  <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$ftotalmotivo_des['totalmotivo_des'].'</font></p></td>
</tr>';
}

$data .='</tbody>
</table>';

$tottras = "SELECT COUNT(*) AS totaltraslados  FROM react_traslados
            WHERE fecha BETWEEN '$fechainicial' AND '$fechafin'";
$rtottras = $mysqli -> query ($tottras);
$ftottras = $rtottras -> fetch_assoc();

$data .='<br><br>
<table style="width: 100%; margin: 0 auto;" class="table table-striped table-bordered" cellspacing="0" bgcolor="#97897D">
    <thead>
        <tr>
            <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">CONCEPTO</b></font></th>
            <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">TOTAL</b></font></th>
        </tr>
    </thead>
    <tbody>
    <tr bgcolor="white">
    <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>TOTAL DE REGISTROS</font></p></td>
    <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$ftottras['totaltraslados'].'</font></p></td>
    </tr>
    </tbody>';


$data .='</table>
</div>';

$data .='<div style="float:left;width: 1%;outline: white solid thin">
  <h6 style="display:none;">hola</h6>&nbsp;
</div>';

$summunictras = "SELECT COUNT(*) AS totalmunicipios FROM react_destinos_traslados
INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
$rsummunictras = $mysqli ->query ($summunictras);
$fsummunictras = $rsummunictras ->fetch_assoc();

$data .='<div style="float:left;width: 32%;outline: white solid thin">
  <table style="width: 100%; margin: 0 auto;" class="table table-striped table-bordered" cellspacing="0" bgcolor="#97897D">
    <thead>
      <tr>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="2"><font size=1><b style="text-align:center; color:white;">TRASLADOS</b></font></th>
      </tr>
      <tr>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">MUNICIPIO</b></font></th>
        <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">'.$fsummunictras['totalmunicipios'].'</b></font></th>
      </tr>
    </thead>
    <tbody>';
    // traer lista de motivos de traslados
    $municipiotras = "SELECT DISTINCT react_destinos_traslados.municipio FROM react_destinos_traslados
    INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
    INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
    WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
    $rmunicipiotras = $mysqli->query($municipiotras);
    while ($fmunicipiotras = $rmunicipiotras ->fetch_assoc()) {
      $namemunicipio = $fmunicipiotras['municipio'];
      // contar cuantos traslados hay por municipio
      $trasmunicipio = "SELECT COUNT(*) AS tmun FROM react_destinos_traslados
      INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
      INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
      WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin' AND municipio = '$namemunicipio'";
      $rtrasmunicipio = $mysqli ->query($trasmunicipio);
      $ftrasmunicipio = $rtrasmunicipio ->fetch_assoc();

      // suma de KILOMETROS RECORRIDOS en un lapdo de tiempo de busqueda
      $totalkil = "SELECT SUM(kilometros) AS total_kil FROM react_traslados
                   WHERE fecha BETWEEN '$fechainicial' AND '$fechafin'";
      $rtotalkil = $mysqli -> query ($totalkil);
      $ftotalkil = $rtotalkil ->fetch_assoc();


      $totalcol1vsuj = "SELECT COUNT(DISTINCT react_sujetos_traslado.id_sujeto) AS tcol1sin FROM react_sujetos_traslado
      INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
      INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
      INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
      WHERE react_sujetos_traslado.resguardado = 'NO'
      AND datospersonales.estatus = 'SUJETO PROTEGIDO'
      AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
      $rtotalcol1vsuj = $mysqli->query($totalcol1vsuj);
      $ftotalcol1vsuj = $rtotalcol1vsuj->fetch_assoc();
      //
      $totalcol2vsuj = "SELECT COUNT(DISTINCT react_sujetos_traslado.id_sujeto) AS tcol1con FROM react_sujetos_traslado
      INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
      INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
      INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
      WHERE react_sujetos_traslado.resguardado = 'SI'
      AND datospersonales.estatus = 'SUJETO PROTEGIDO'
      AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
      $rtotalcol2vsuj = $mysqli->query($totalcol2vsuj);
      $ftotalcol2vsuj = $rtotalcol2vsuj->fetch_assoc();
      //
      $totalcol3vsuj = "SELECT COUNT(DISTINCT react_sujetos_traslado.id_sujeto) AS tcol1sinpp FROM react_sujetos_traslado
      INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
      INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
      INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
      WHERE react_sujetos_traslado.resguardado = 'NO'
      AND datospersonales.estatus = 'PERSONA PROPUESTA'
      AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
      $rtotalcol3vsuj = $mysqli->query($totalcol3vsuj);
      $ftotalcol3vsuj = $rtotalcol3vsuj->fetch_assoc();
      //
      $totalcol4vsuj = "SELECT COUNT(DISTINCT react_sujetos_traslado.id_sujeto) AS tcol1conpp FROM react_sujetos_traslado
      INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
      INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
      INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
      WHERE react_sujetos_traslado.resguardado = 'SI'
      AND datospersonales.estatus = 'PERSONA PROPUESTA'
      AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
      $rtotalcol4vsuj = $mysqli->query($totalcol4vsuj);
      $ftotalcol4vsuj = $rtotalcol4vsuj->fetch_assoc();
      //
      $totalcol5vsuj = "SELECT COUNT(DISTINCT react_sujetos_traslado.id_sujeto) AS totalfinal FROM react_sujetos_traslado
      INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
      INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
      INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
      WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
      $rtotalcol5vsuj = $mysqli->query($totalcol5vsuj);
      $ftotalcol5vsuj = $rtotalcol5vsuj->fetch_assoc();


$data .='<tr bgcolor="white">>
<td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>'.$fmunicipiotras['municipio'].'</font></p></td>
<td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$ftrasmunicipio['tmun'].'</font></p></td>
</tr>';
}
$data .='</tbody>
    </table>
    <br>
    <table style="width: 100%; margin: 0 auto;" class="table table-striped table-bordered" cellspacing="0" bgcolor="#97897D">
        <thead>
            <tr>
                <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">KILOMETROS RECORRIDOS</b></font></th>
                <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">'.$ftotalkil['total_kil'].'</b></font></th>
            </tr>
        </thead>
    </table>
    <br>
    <table style="width: 100%; margin: 0 auto;" class="table table-striped table-bordered" cellspacing="0" bgcolor="#97897D">
        <thead>
          <tr>
            <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="6"><font size=1><b style="text-align:center; color:white;">PERSONAS</b></font></th>
          </tr>
          <tr>
              <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" rowspan="2"><font size=1><b style="text-align:center; color:white;">TOTAL DE PP Y SP QUE FUERON TRASLADADOS</b></font></th>
              <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="2"><font size=1><b style="text-align:center; color:white;">SUJETOS PROTEGIDOS</b></font></th>
              <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" colspan="2"><font size=1><b style="text-align:center; color:white;">PERSONAS PROPUESTAS</b></font></th>
              <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;" rowspan="2"><font size=1><b style="text-align:center; color:white;">TOTAL</b></font></th>
          </tr>
          <tr>
          <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">SIN ESTADIA</b></font></th>
          <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">CON ESTADIA</b></font></th>
          <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">SIN ESTADIA</b></font></th>
          <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><b style="text-align:center; color:white;">CON ESTADIA</b></font></th>
          </tr>
        </thead>
        <tbody>
          <tbody>
            <tr bgcolor="white">
              <td style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><font size=1><p>TOTAL DE PERSONAS</font></p></td>
              <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$ftotalcol1vsuj['tcol1sin'].'</font></p></td>
              <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$ftotalcol2vsuj['tcol1con'].'</font></p></td>
              <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$ftotalcol3vsuj['tcol1sinpp'].'</font></p></td>
              <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$ftotalcol4vsuj['tcol1conpp'].'</font></p></td>
              <td style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><font size=1><p>'.$ftotalcol5vsuj['totalfinal'].'</font></p></td>
            </tr>
          </tbody>
        </tbody>
    </table>
    </div></div></div>';

$mpdf ->WriteHtml($css, \Mpdf\HTMLParsermode::HEADER_CSS);
$mpdf->WriteHtml($data);
$mpdf->output("REPORTE DEL $dateprin AL $dateconclu.pdf",'D');
// $mpdf->output();



?>
