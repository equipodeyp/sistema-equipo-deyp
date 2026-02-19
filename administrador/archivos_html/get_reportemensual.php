<?php
////////////////////////////
require_once '../../mpdf/vendor/autoload.php';
include("../conexion.php");
include("../calculardatesreportemensual.php");
// css
$css = file_get_contents('../../css/main2.css');
$css1 = file_get_contents('../../css/bootstrap5-3-8.min.css');
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

    /* Estilo para la tabla contenedora (invisible) */
   .tabla-layout {
       width: 100%;
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
// ACTIVAR soporte de gráficas en mPDF
// $mpdf->useGraphs = true;
// Grab variables
$mpdf = new \Mpdf\Mpdf([
  'mode' => 'utf-8',
  'format' => [216, 279],
  'default_font_size' => 0,
  'default_font' => '',
  'margin_left' => 5,
  'margin_right' => 5,
  'margin_top' => 40,
  'margin_bottom' => 5,
  'margin_header' => 5,
  'margin_footer' => 2,
  'orientation' => 'P',
    ]);

$mpdf->SetHTMLHeader('<div style="float: left; width: 100%;">
<table border="1px" cellspacing="0" width="100%" bgcolor="#97897E">
  <thead>
    <tr>
      <th style="background-color: #97897E; border: 1px solid #97897E; text-align:center; font-family: gothambook; width:70%;"><b><h1 style="font-family: gothambook; font-size:28px; color:white;">REPORTE MENSUAL</h1></b></th>
      <th style="background-color: #97897E; border: 1px solid #97897E; text-align:center; font-family: gothambook;"><h1 style="font-size:28px; color:white;">'.$meses[date('n')-1].'</h1></th>
    </tr>
    <tr>
      <th style="background-color: #97897E; border: 1px solid #97897E; text-align:center; font-weight: 100;"><h1 style="font-size:21px; color:white; font-weight: 100;">
        PROGRAMA DE PROTECCIÓN DE SUJETOS QUE INTERVIENEN EN EL PROCEDIMIENTO PENAL Y DE EXTINCIÓN DE DOMINIO</h1>
      </th>
      <th style="background-color: #97897E; border: 1px solid #97897E; text-align:center; font-family: gothambook;"><h1 style="font-size:28px; color:white;">'.date('Y').'</h1></th>
    </tr>
  </thead>
</table>
</div>');
$mpdf->SetHTMLFooter('<div style="float: left; width: 100%;">
<table border="1px" cellspacing="0" width="100%" bgcolor="white">
  <thead>
    <tr>
      <th style="background-color: white; border: 1px solid white; text-align:center; width:100%;"><h1 style="font-size:14px; color:black;"><b>{PAGENO}/{nbpg}</b></h1></th>
    </tr>
  </thead>
</table>
</div>');
//////////////////////////////////////////////////////
$data .= '<div style="float: left; width: 100%;">
<table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
  <thead>
    <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
      <th colspan="4" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">SOLICITUDES DE INCORPORACIÓN RECIBIDAS</th>
    </tr>
    <tr style="background-color: white; border: 1.5px solid black;">
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">Autoridad Solicitante</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">'.$mesesminusculas[date('n')-2].'</th>
      <th style="background-color: #D5D0CB; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">'.$mesesminusculas[date('n')-1].'</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">Total</th>
    </tr>
  </thead>
  <tbody>';

$totalcol1 = 0;
$totalcol2 = 0;
$sumatotal = 0;
$solicitudesrecibidas = "SELECT nombreautoridad, COUNT(DISTINCT folioexpediente) AS total FROM autoridad
WHERE fechasolicitud BETWEEN '$dateinicio' AND '$datetermino'
GROUP BY nombreautoridad ORDER BY total DESC, nombreautoridad ASC";
$rsolicitudesrecibidas = $mysqli->query($solicitudesrecibidas);
while ($fsolicitudesrecibidas = $rsolicitudesrecibidas->fetch_assoc()) {
  $nameautoridad = $fsolicitudesrecibidas['nombreautoridad'];
  $solicitudes_col1 = "SELECT COUNT(*) AS total FROM autoridad
  WHERE nombreautoridad = '$nameautoridad' AND fechasolicitud BETWEEN '$dateinicio_col1' AND '$datefin_col1'";
  $rsolicitudes_col1 = $mysqli->query($solicitudes_col1);
  $fsolicitudes_col1 = $rsolicitudes_col1->fetch_assoc();
  $totalcol1 = $totalcol1 + $fsolicitudes_col1['total'];

  $solicitudes_col2 = "SELECT COUNT(*) AS total FROM autoridad
  WHERE nombreautoridad = '$nameautoridad' AND fechasolicitud BETWEEN '$dateinicio_col2' AND '$datefin_col2'";
  $rsolicitudes_col2 = $mysqli->query($solicitudes_col2);
  $fsolicitudes_col2 = $rsolicitudes_col2->fetch_assoc();
  $totalfila = $fsolicitudes_col1['total'] + $fsolicitudes_col2['total'];
  $totalcol2 = $totalcol2 + $fsolicitudes_col2['total'];
  $sumatotal = $sumatotal + $totalfila;
  $data .= '<tr style="background-color: white; border: 1px solid black;">
  <td style="background-color: white; border: 1px solid black; text-align:left; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">'.$nameautoridad.'</td>
  <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">'.$fsolicitudes_col1['total'].'</td>
  <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">'.$fsolicitudes_col2['total'].'</td>
  <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;" font-size:13.33px;>'.$totalfila.'</td>
  </tr>';

}

$data .= '<tr style="background-color: white; border: 1px solid black;">
  <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">TOTAL</td>
  <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">'.$totalcol1.'</td>
  <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">'.$totalcol2.'</td>
  <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">'.$sumatotal.'</td>
</tr>';
$data .= '</tbody>
</table>
</div><br>';
////////////////////////////////////////////////////////////////////////////////
$data .='<div style="float: left; width: 49%;">
<table border="1.5px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
  <thead>
    <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
      <th colspan="4" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">PERSONAS PROPUESTAS PARA SU INCORPORACIÓN</th>
    </tr>
    <tr style="background-color: white; border: 1.5px solid black;">
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">Calidad del Sujeto dentro del Programa</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">'.$mesesminusculas[date('n')-2].'</th>
      <th style="background-color: #D5D0CB; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">'.$mesesminusculas[date('n')-1].'</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">Total</th>
    </tr>
  </thead>
  <tbody>';
  ////////////////////////////////////////////////////////////////////////////////
  $totalpp_col1 = 0;
  $totalpp_col2 = 0;
  $sumatotalpp = 0;
  $personaspropuestas = "SELECT calidadpersona, COUNT(*) AS total FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE autoridad.fechasolicitud_persona BETWEEN '$dateinicio' AND '$datetermino' AND datospersonales.relacional = 'NO'
  GROUP BY datospersonales.calidadpersona ORDER BY total DESC, datospersonales.calidadpersona ASC";
  $rpersonaspropuestas = $mysqli->query($personaspropuestas);
  while ($fpersonaspropuestas = $rpersonaspropuestas->fetch_assoc()) {
    $namecalidad = $fpersonaspropuestas['calidadpersona'];
    if ($namecalidad === 'I. VICTIMA') {
      $namecortocalidad = 'VICTIMA';
    }
    if ($namecalidad === 'II. OFENDIDO') {
      $namecortocalidad = 'OFENDIDO';
    }
    if ($namecalidad === 'III. TESTIGO') {
      $namecortocalidad = 'TESTIGO';
    }
    if ($namecalidad === 'IV. COLABORADOR O INFORMANTE') {
      $namecortocalidad = 'COLABORADOR O INFORMANTE';
    }
    if ($namecalidad === 'V. AGENTE DEL MINISTERIO PUBLICO') {
      $namecortocalidad = 'AGENTE DEL MINISTERIO PUBLICO';
    }
    if ($namecalidad === 'VI. DEFENSOR') {
      $namecortocalidad = 'DEFENSOR';
    }
    if ($namecalidad === 'VII. POLICIA') {
      $namecortocalidad = 'POLICIA';
    }
    if ($namecalidad === 'VIII. PERITO') {
      $namecortocalidad = 'PERITO';
    }
    if ($namecalidad === 'IX. JUEZ O MAGISTRADO DEL PODER JUDICIAL') {
      $namecortocalidad = 'JUEZ O MAGISTRADO DEL PODER JUDICIAL';
    }
    if ($namecalidad === 'X. PERSONA CON PARENTESCO O CERCANIA') {
      $namecortocalidad = 'PERSONA CON PARENTESCO O CERCANIA';
    }
    //////////////////////////////////////////////////////////////////////////////
    $personaspropuestas_col1 = "SELECT COUNT(*) AS total FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.calidadpersona = '$namecalidad' AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio_col1' AND '$datefin_col1'
    AND datospersonales.relacional = 'NO'";
    $rpersonaspropuestas_col1 = $mysqli->query($personaspropuestas_col1);
    $fpersonaspropuestas_col1 = $rpersonaspropuestas_col1->fetch_assoc();
    //////////////////////////////////////////////////////////////////////////////
    $personaspropuestas_col2 = "SELECT COUNT(*) AS total FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.calidadpersona = '$namecalidad' AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio_col2' AND '$datefin_col2'
    AND datospersonales.relacional = 'NO'";
    $rpersonaspropuestas_col2 = $mysqli->query($personaspropuestas_col2);
    $fpersonaspropuestas_col2 = $rpersonaspropuestas_col2->fetch_assoc();
    //////////////////////////////////////////////////////////////////////////////
    $totalpp_col1 = $totalpp_col1 + $fpersonaspropuestas_col1['total'];
    $totalpp_col2 = $totalpp_col2 + $fpersonaspropuestas_col2['total'];
    $totalpp_fila = $fpersonaspropuestas_col1['total'] +$fpersonaspropuestas_col2['total'];
    $sumatotalpp = $sumatotalpp + $totalpp_fila;
    $data .= '<tr style="background-color: white; border: 1px solid black;">
    <td style="background-color: white; border: 1px solid black; text-align:left; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">'.$namecortocalidad.'</td>
    <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">'.$fpersonaspropuestas_col1['total'].'</td>
    <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">'.$fpersonaspropuestas_col2['total'].'</td>
    <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">'.$totalpp_fila.'</td>
    </tr>';

  }
  $data .= '<tr style="background-color: white; border: 1px solid black;">
    <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;"><h4>TOTAL</h4></td>
    <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;"><h4>'.$totalpp_col1.'</h4></td>
    <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;"><h4>'.$totalpp_col2.'</h4></td>
    <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;"><h4>'.$sumatotalpp.'</h4></td>
  </tr>';

  $data .= '<tbody>
  </table>
  <br>

</div>';
$data .='<div style="float: center; width: 2%;">
</div>';
$data .='<div style="float: right; width: 49%;">
<table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
  <thead>
    <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
      <th colspan="4" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">PERSONAS PROPUESTAS NO INCORPORADAS<sup>1</sup></th>
    </tr>
    <tr style="background-color: white; border: 1.5px solid black;">
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">Calidad del Sujeto dentro del Programa</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">'.$mesesminusculas[date('n')-2].'</th>
      <th style="background-color: #D5D0CB; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">'.$mesesminusculas[date('n')-1].'</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;">Total</th>
    </tr>
  </thead>
  <tbody>';
  ////////////////////////////////////////////////////////////////////////////////
  $totalppnoincorporadas_col1 = 0;
  $totalppnoincorporadas_col2 = 0;
  $sumatotalppnoincorporadas = 0;
  $ppnoincorporadas = "SELECT calidadpersona, COUNT(*) AS total FROM datospersonales
  INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
  WHERE datospersonales.estatus = 'NO INCORPORADO' AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio' AND '$datetermino' AND datospersonales.relacional = 'NO'
  GROUP BY datospersonales.calidadpersona ORDER BY total DESC, datospersonales.calidadpersona ASC";
  $rppnoincorporadas = $mysqli->query($ppnoincorporadas);
  while ($fppnoincorporadas = $rppnoincorporadas->fetch_assoc()) {
    $namecalidad = $fppnoincorporadas['calidadpersona'];
    if ($namecalidad === 'I. VICTIMA') {
      $namecortocalidad = 'VICTIMA';
    }
    if ($namecalidad === 'II. OFENDIDO') {
      $namecortocalidad = 'OFENDIDO';
    }
    if ($namecalidad === 'III. TESTIGO') {
      $namecortocalidad = 'TESTIGO';
    }
    if ($namecalidad === 'IV. COLABORADOR O INFORMANTE') {
      $namecortocalidad = 'COLABORADOR O INFORMANTE';
    }
    if ($namecalidad === 'V. AGENTE DEL MINISTERIO PUBLICO') {
      $namecortocalidad = 'AGENTE DEL MINISTERIO PUBLICO';
    }
    if ($namecalidad === 'VI. DEFENSOR') {
      $namecortocalidad = 'DEFENSOR';
    }
    if ($namecalidad === 'VII. POLICIA') {
      $namecortocalidad = 'POLICIA';
    }
    if ($namecalidad === 'VIII. PERITO') {
      $namecortocalidad = 'PERITO';
    }
    if ($namecalidad === 'IX. JUEZ O MAGISTRADO DEL PODER JUDICIAL') {
      $namecortocalidad = 'JUEZ O MAGISTRADO DEL PODER JUDICIAL';
    }
    if ($namecalidad === 'X. PERSONA CON PARENTESCO O CERCANIA') {
      $namecortocalidad = 'PERSONA CON PARENTESCO O CERCANIA';
    }
    //////////////////////////////////////////////////////////////////////////////
    $ppnoincorporadas_col2 = "SELECT COUNT(*) AS total FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.estatus = 'NO INCORPORADO' AND datospersonales.calidadpersona = '$namecalidad'
    AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio_col1' AND '$datefin_col1'
    AND datospersonales.relacional = 'NO'";
    $rppnoincorporadas_col2 = $mysqli->query($ppnoincorporadas_col2);
    $fppnoincorporadas_col2 = $rppnoincorporadas_col2->fetch_assoc();
    //////////////////////////////////////////////////////////////////////////////
    $ppnoincorporadas_col2 = "SELECT COUNT(*) AS total FROM datospersonales
    INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
    WHERE datospersonales.estatus = 'NO INCORPORADO' AND datospersonales.calidadpersona = '$namecalidad'
    AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio_col2' AND '$datefin_col2'
    AND datospersonales.relacional = 'NO'";
    $rppnoincorporadas_col2 = $mysqli->query($ppnoincorporadas_col2);
    $fppnoincorporadas_col2 = $rppnoincorporadas_col2->fetch_assoc();
    //////////////////////////////////////////////////////////////////////////////
    $totalppnoincorporadas_col1 = $totalppnoincorporadas_col1 + $fppnoincorporadas_col1['total'];
    $totalppnoincorporadas_col2 = $totalppnoincorporadas_col2 + $fppnoincorporadas_col2['total'];
    $totalppni_fila = $fppnoincorporadas_col1['total'] +$fppnoincorporadas_col2['total'];
    $sumatotalppnoincorporadas = $sumatotalppnoincorporadas + $totalppni_fila;

    $data .= '<tr style="background-color: white; border: 1px solid black;">
    <td style="background-color: white; border: 1px solid black; text-align:left; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">'.$namecortocalidad.'</td>
    <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">'.$fppnoincorporadas_col1['total'].'</td>
    <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">'.$fppnoincorporadas_col2['total'].'</td>
    <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:13.33px;">'.$totalppni_fila.'</td>
    </tr>';
  }
  $data .= '<tr style="background-color: white; border: 1px solid black;">
    <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;"><h4>TOTAL</h4></td>
    <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;"><h4>'.$totalppnoincorporadas_col1.'</h4></td>
    <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;"><h4>'.$totalppnoincorporadas_col2.'</h4></td>
    <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:13.33px;"><h4>'.$sumatotalppnoincorporadas.'</h4></td>
  </tr>';

  $data .='</tbody>
  </table>
  <table id="tabla1" border="1px" cellspacing="0" width="85%" bgcolor="white">
    <thead class="thead-dark">
      <tr>
        <th style="background-color: white; border: 6px solid white; text-align:justify; font-weight: bold;" colspan="4"><h1 style="font-size:8px; text-align: justify; color:black; font-weight: bold;">
        &nbsp;&nbsp;<sup>1</sup>Corresponde a los siguientes casos:<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a) La solicitud no cumple con los requisitos de Ley.<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b) La persona manifiesta negativa de voluntariedad para incorporarse.<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c) Se determina la no procedencia de incorporación.<br>
      </h1></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>';
$data .='';
$data .='';
$data .='';
$data .='';
$data .='';

////////////////////////////////////////////////////////////////////////////////
$data .= '<!-- TABLA PRINCIPAL DE MAQUETACIÓN -->
<table class="tabla-layout">
    <tr>
        <!-- COLUMNA IZQUIERDA -->
        <td style="vertical-align: top; width: 49%; padding-right: 1%;">
        <table border="1.5px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
          <thead>
            <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
              <th colspan="4" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:18.33px;">PERSONAS PROPUESTAS PARA SU INCORPORACIÓN</th>
            </tr>
            <tr style="background-color: white; border: 1.5px solid black;">
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Calidad del Sujeto dentro del Programa</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-2].'</th>
              <th style="background-color: #D5D0CB; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-1].'</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Total</th>
            </tr>
          </thead>
          <tbody>';
          ////////////////////////////////////////////////////////////////////////////////
          $totalpp_col1 = 0;
          $totalpp_col2 = 0;
          $sumatotalpp = 0;
          $personaspropuestas = "SELECT calidadpersona, COUNT(*) AS total FROM datospersonales
          INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
          WHERE autoridad.fechasolicitud_persona BETWEEN '$dateinicio' AND '$datetermino' AND datospersonales.relacional = 'NO'
          GROUP BY datospersonales.calidadpersona ORDER BY total DESC, datospersonales.calidadpersona ASC";
          $rpersonaspropuestas = $mysqli->query($personaspropuestas);
          while ($fpersonaspropuestas = $rpersonaspropuestas->fetch_assoc()) {
            $namecalidad = $fpersonaspropuestas['calidadpersona'];
            if ($namecalidad === 'I. VICTIMA') {
              $namecortocalidad = 'VICTIMA';
            }
            if ($namecalidad === 'II. OFENDIDO') {
              $namecortocalidad = 'OFENDIDO';
            }
            if ($namecalidad === 'III. TESTIGO') {
              $namecortocalidad = 'TESTIGO';
            }
            if ($namecalidad === 'IV. COLABORADOR O INFORMANTE') {
              $namecortocalidad = 'COLABORADOR O INFORMANTE';
            }
            if ($namecalidad === 'V. AGENTE DEL MINISTERIO PUBLICO') {
              $namecortocalidad = 'AGENTE DEL MINISTERIO PUBLICO';
            }
            if ($namecalidad === 'VI. DEFENSOR') {
              $namecortocalidad = 'DEFENSOR';
            }
            if ($namecalidad === 'VII. POLICIA') {
              $namecortocalidad = 'POLICIA';
            }
            if ($namecalidad === 'VIII. PERITO') {
              $namecortocalidad = 'PERITO';
            }
            if ($namecalidad === 'IX. JUEZ O MAGISTRADO DEL PODER JUDICIAL') {
              $namecortocalidad = 'JUEZ O MAGISTRADO DEL PODER JUDICIAL';
            }
            if ($namecalidad === 'X. PERSONA CON PARENTESCO O CERCANIA') {
              $namecortocalidad = 'PERSONA CON PARENTESCO O CERCANIA';
            }
            //////////////////////////////////////////////////////////////////////////////
            $personaspropuestas_col1 = "SELECT COUNT(*) AS total FROM datospersonales
            INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
            WHERE datospersonales.calidadpersona = '$namecalidad' AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio_col1' AND '$datefin_col1'
            AND datospersonales.relacional = 'NO'";
            $rpersonaspropuestas_col1 = $mysqli->query($personaspropuestas_col1);
            $fpersonaspropuestas_col1 = $rpersonaspropuestas_col1->fetch_assoc();
            //////////////////////////////////////////////////////////////////////////////
            $personaspropuestas_col2 = "SELECT COUNT(*) AS total FROM datospersonales
            INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
            WHERE datospersonales.calidadpersona = '$namecalidad' AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio_col2' AND '$datefin_col2'
            AND datospersonales.relacional = 'NO'";
            $rpersonaspropuestas_col2 = $mysqli->query($personaspropuestas_col2);
            $fpersonaspropuestas_col2 = $rpersonaspropuestas_col2->fetch_assoc();
            //////////////////////////////////////////////////////////////////////////////
            $totalpp_col1 = $totalpp_col1 + $fpersonaspropuestas_col1['total'];
            $totalpp_col2 = $totalpp_col2 + $fpersonaspropuestas_col2['total'];
            $totalpp_fila = $fpersonaspropuestas_col1['total'] +$fpersonaspropuestas_col2['total'];
            $sumatotalpp = $sumatotalpp + $totalpp_fila;
            $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:left; font-family: gothambook; color:black; font-weight: 100;">'.$namecortocalidad.'</td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$fpersonaspropuestas_col1['total'].'</td>
            <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$fpersonaspropuestas_col2['total'].'</td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$totalpp_fila.'</td>
            </tr>';

          }
          $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>TOTAL</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalpp_col1.'</h4></td>
            <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalpp_col2.'</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$sumatotalpp.'</h4></td>
          </tr>';

          $data .= '<tbody>
          </table>
          <br>
          <!-- siguiente tabla izquierda -->
          <table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
            <thead>
              <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
                <th colspan="4" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">SUJETOS INCORPORADOS<sup>2</sup></th>
              </tr>
              <tr style="background-color: white; border: 1.5px solid black;">
                <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Calidad del Sujeto dentro del Programa</th>
                <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-2].'</th>
                <th style="background-color: #D5D0CB; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-1].'</th>
                <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Total</th>
              </tr>
            </thead>
            <tbody>';
            ////////////////////////////////////////////////////////////////////////////////
            $totalpincorporadas_col1 = 0;
            $totalpincorporadas_col2 = 0;
            $sumatotalpincorporadas = 0;
            $sujetosincorporados = "SELECT calidadpersona, COUNT(*) AS total FROM datospersonales
            INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
            WHERE determinacionincorporacion.convenio = 'FORMALIZADO'
            AND determinacionincorporacion.fecha_inicio BETWEEN '$dateinicio' AND '$datetermino' AND datospersonales.relacional = 'NO'
            GROUP BY datospersonales.calidadpersona ORDER BY total DESC, datospersonales.calidadpersona ASC";
            $rsujetosincorporados = $mysqli->query($sujetosincorporados);
            while ($fsujetosincorporados = $rsujetosincorporados->fetch_assoc()) {
              $namecalidad = $fsujetosincorporados['calidadpersona'];
              if ($namecalidad === 'I. VICTIMA') {
                $namecortocalidad = 'VICTIMA';
              }
              if ($namecalidad === 'II. OFENDIDO') {
                $namecortocalidad = 'OFENDIDO';
              }
              if ($namecalidad === 'III. TESTIGO') {
                $namecortocalidad = 'TESTIGO';
              }
              if ($namecalidad === 'IV. COLABORADOR O INFORMANTE') {
                $namecortocalidad = 'COLABORADOR O INFORMANTE';
              }
              if ($namecalidad === 'V. AGENTE DEL MINISTERIO PUBLICO') {
                $namecortocalidad = 'AGENTE DEL MINISTERIO PUBLICO';
              }
              if ($namecalidad === 'VI. DEFENSOR') {
                $namecortocalidad = 'DEFENSOR';
              }
              if ($namecalidad === 'VII. POLICIA') {
                $namecortocalidad = 'POLICIA';
              }
              if ($namecalidad === 'VIII. PERITO') {
                $namecortocalidad = 'PERITO';
              }
              if ($namecalidad === 'IX. JUEZ O MAGISTRADO DEL PODER JUDICIAL') {
                $namecortocalidad = 'JUEZ O MAGISTRADO DEL PODER JUDICIAL';
              }
              if ($namecalidad === 'X. PERSONA CON PARENTESCO O CERCANIA') {
                $namecortocalidad = 'PERSONA CON PARENTESCO O CERCANIA';
              }
              //////////////////////////////////////////////////////////////////////////////
              $sujetosincorporados_col1 = "SELECT COUNT(*) AS total FROM datospersonales
              INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
              WHERE datospersonales.calidadpersona = '$namecalidad' AND determinacionincorporacion.convenio = 'FORMALIZADO'
              AND determinacionincorporacion.fecha_inicio BETWEEN '$dateinicio_col1' AND '$datefin_col1'
              AND datospersonales.relacional = 'NO'";
              $rsujetosincorporados_col1 = $mysqli->query($sujetosincorporados_col1);
              $fsujetosincorporados_col1 = $rsujetosincorporados_col1->fetch_assoc();
              //////////////////////////////////////////////////////////////////////////////
              $sujetosincorporados_col2 = "SELECT COUNT(*) AS total FROM datospersonales
              INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
              WHERE datospersonales.calidadpersona = '$namecalidad' AND determinacionincorporacion.convenio = 'FORMALIZADO'
              AND determinacionincorporacion.fecha_inicio BETWEEN '$dateinicio_col2' AND '$datefin_col2'
              AND datospersonales.relacional = 'NO'";
              $rsujetosincorporados_col2 = $mysqli->query($sujetosincorporados_col2);
              $fsujetosincorporados_col2 = $rsujetosincorporados_col2->fetch_assoc();
              //////////////////////////////////////////////////////////////////////////////
              $totalpincorporadas_col1 = $totalpincorporadas_col1 + $fsujetosincorporados_col1['total'];
              $totalpincorporadas_col2 = $totalpincorporadas_col2 + $fsujetosincorporados_col2['total'];
              $totalsujetosincorporados_fila = $fsujetosincorporados_col1['total'] +$fsujetosincorporados_col2['total'];
              $sumatotalpincorporadas = $sumatotalpincorporadas + $totalsujetosincorporados_fila;

              $data .= '<tr style="background-color: white; border: 1px solid black;">
              <td style="background-color: white; border: 1px solid black; text-align:left; font-family: gothambook; color:black; font-weight: 100;">'.$namecortocalidad.'</td>
              <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$fsujetosincorporados_col1['total'].'</td>
              <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$fsujetosincorporados_col2['total'].'</td>
              <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$totalsujetosincorporados_fila.'</td>
              </tr>';

            }
            $data .= '<tr style="background-color: white; border: 1px solid black;">
              <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>TOTAL</h4></td>
              <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalpincorporadas_col1.'</h4></td>
              <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalpincorporadas_col2.'</h4></td>
              <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$sumatotalpincorporadas.'</h4></td>
            </tr>';

            $data .='</tbody>
            </table>
            <table id="tabla1" border="1px" cellspacing="0" width="85%" bgcolor="white">
              <thead class="thead-dark">
                <tr>
                  <th style="background-color: white; border: 6px solid white; text-align:justify; font-weight: bold;" colspan="4"><h1 style="font-size:8px; text-align: justify; color:black; font-weight: bold;">
                  &nbsp;&nbsp;<sup>2</sup>La incorporación se da mediante la formalización del Convenio de Entendimiento.
                </h1></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            <br>
            <!-- siguiente tabla izquierda -->
            <table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
              <thead>
                <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
                  <th colspan="4" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">SUJETOS QUE FINALIZARON SU ESTANCIA EN EL CENTRO DE RESGUARDO</th>
                </tr>
                <tr style="background-color: white; border: 1.5px solid black;">
                  <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Calidad del Sujeto dentro del Programa</th>
                  <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-2].'</th>
                  <th style="background-color: #D5D0CB; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-1].'</th>
                  <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Total</th>
                </tr>
              </thead>
              <tbody>';
              ////////////////////////////////////////////////////////////////////////////////
              $totalsujfinresguardo_col1 = 0;
              $totalsujfinresguardo_col2 = 0;
              $sumatotalsujetosfinresguardo = 0;
              $sujfinalderesguardo = "SELECT datospersonales.calidadpersona FROM datospersonales
              INNER JOIN medidas ON datospersonales.id = medidas.id_persona
              INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
              WHERE medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.estatus = 'DESINCORPORADO'
              AND determinacionincorporacion.date_desincorporacion BETWEEN '$dateinicio' AND '$datetermino'
              AND datospersonales.relacional = 'NO' GROUP BY datospersonales.calidadpersona ORDER BY datospersonales.calidadpersona ASC";
              $rsujfinalderesguardo = $mysqli->query($sujfinalderesguardo);
              while ($fsujfinalderesguardo = $rsujfinalderesguardo->fetch_assoc()) {
                $namecalidad = $fsujfinalderesguardo['calidadpersona'];
                if ($namecalidad === 'I. VICTIMA') {
                  $namecortocalidad = 'VICTIMA';
                }
                if ($namecalidad === 'II. OFENDIDO') {
                  $namecortocalidad = 'OFENDIDO';
                }
                if ($namecalidad === 'III. TESTIGO') {
                  $namecortocalidad = 'TESTIGO';
                }
                if ($namecalidad === 'IV. COLABORADOR O INFORMANTE') {
                  $namecortocalidad = 'COLABORADOR O INFORMANTE';
                }
                if ($namecalidad === 'V. AGENTE DEL MINISTERIO PUBLICO') {
                  $namecortocalidad = 'AGENTE DEL MINISTERIO PUBLICO';
                }
                if ($namecalidad === 'VI. DEFENSOR') {
                  $namecortocalidad = 'DEFENSOR';
                }
                if ($namecalidad === 'VII. POLICIA') {
                  $namecortocalidad = 'POLICIA';
                }
                if ($namecalidad === 'VIII. PERITO') {
                  $namecortocalidad = 'PERITO';
                }
                if ($namecalidad === 'IX. JUEZ O MAGISTRADO DEL PODER JUDICIAL') {
                  $namecortocalidad = 'JUEZ O MAGISTRADO DEL PODER JUDICIAL';
                }
                if ($namecalidad === 'X. PERSONA CON PARENTESCO O CERCANIA') {
                  $namecortocalidad = 'PERSONA CON PARENTESCO O CERCANIA';
                }
                //////////////////////////////////////////////////////////////////////////////
                $sujfinalderesguardo_col1 = "SELECT COUNT(DISTINCT medidas.id_persona) AS total FROM datospersonales
                INNER JOIN medidas ON datospersonales.id = medidas.id_persona
                INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
                WHERE medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.calidadpersona = '$namecalidad' AND datospersonales.estatus = 'DESINCORPORADO'
                AND determinacionincorporacion.date_desincorporacion BETWEEN '$dateinicio_col1' AND '$datefin_col1'
                AND datospersonales.relacional = 'NO'";
                $rsujfinalderesguardo_col1 = $mysqli->query($sujfinalderesguardo_col1);
                $fsujfinalderesguardo_col1 = $rsujfinalderesguardo_col1->fetch_assoc();
                //////////////////////////////////////////////////////////////////////////////
                $sujfinalderesguardo_col2 = "SELECT COUNT(DISTINCT medidas.id_persona) AS total FROM datospersonales
                INNER JOIN medidas ON datospersonales.id = medidas.id_persona
                INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
                WHERE medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND datospersonales.calidadpersona = '$namecalidad' AND datospersonales.estatus = 'DESINCORPORADO'
                AND determinacionincorporacion.date_desincorporacion BETWEEN '$dateinicio_col2' AND '$datefin_col2'
                AND datospersonales.relacional = 'NO'";
                $rsujfinalderesguardo_col2 = $mysqli->query($sujfinalderesguardo_col2);
                $fsujfinalderesguardo_col2 = $rsujfinalderesguardo_col2->fetch_assoc();
                //////////////////////////////////////////////////////////////////////////////
                $totalsujfinresguardo_col1 = $totalsujfinresguardo_col1 + $fsujfinalderesguardo_col1['total'];
                $totalsujfinresguardo_col2 = $totalsujfinresguardo_col2 + $fsujfinalderesguardo_col2['total'];
                $totalsujfinresguardo_fila = $fsujfinalderesguardo_col1['total'] +$fsujfinalderesguardo_col2['total'];
                $sumatotalsujetosfinresguardo = $sumatotalsujetosfinresguardo + $totalsujfinresguardo_fila;

                $data .= '<tr style="background-color: white; border: 1px solid black;">
                <td style="background-color: white; border: 1px solid black; text-align:left; font-family: gothambook; color:black; font-weight: 100;">'.$namecortocalidad.'</td>
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$fsujfinalderesguardo_col1['total'].'</td>
                <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$fsujfinalderesguardo_col2['total'].'</td>
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$totalsujfinresguardo_fila.'</td>
                </tr>';

              }
              $data .= '<tr style="background-color: white; border: 1px solid black;">
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>TOTAL</h4></td>
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalsujfinresguardo_col1.'</h4></td>
                <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalsujfinresguardo_col2.'</h4></td>
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$sumatotalsujetosfinresguardo.'</h4></td>
              </tr>';

              $data .='</tbody>
              </table>
              <br>
            <!-- siguiente tabla izquierda -->
            <table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
              <thead>
                <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
                  <th colspan="4" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">ASISTENCIAS MÉDICAS OTORGADAS</th>
                </tr>
                <tr style="background-color: white; border: 1.5px solid black;">
                  <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Servicio</th>
                  <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-2].'</th>
                  <th style="background-color: #D5D0CB; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-1].'</th>
                  <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Total</th>
                </tr>
              </thead>
              <tbody>';
              ////////////////////////////////////////////////////////////////////////////////
              $totalamotorgadas_col1 = 0;
              $totalamotorgadas_col2 = 0;
              $sumatotalamotorgadas = 0;
              $asistenciasmedicas = "SELECT solicitud_asistencia.servicio_medico, COUNT(*) AS total FROM solicitud_asistencia
              INNER JOIN cita_asistencia ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia
              WHERE solicitud_asistencia.etapa = 'ASISTENCIA MÉDICA COMPLETADA'
              AND cita_asistencia.fecha_asistencia BETWEEN '$dateinicio' AND '$datetermino'
              GROUP BY solicitud_asistencia.servicio_medico ORDER BY total DESC, solicitud_asistencia.servicio_medico ASC";
              $rasistenciasmedicas = $mysqli->query($asistenciasmedicas);
              while ($fasistenciasmedicas = $rasistenciasmedicas->fetch_assoc()) {
                $serviciomedico = $fasistenciasmedicas['servicio_medico'];
                //////////////////////////////////////////////////////////////////////////////
                $amotorgadas_col1 = "SELECT COUNT(*) AS total FROM solicitud_asistencia
                INNER JOIN cita_asistencia ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia
                WHERE solicitud_asistencia.servicio_medico = '$serviciomedico' AND solicitud_asistencia.etapa = 'ASISTENCIA MÉDICA COMPLETADA'
                AND cita_asistencia.fecha_asistencia BETWEEN '$dateinicio_col1' AND '$datefin_col1'";
                $ramotorgadas_col1 = $mysqli->query($amotorgadas_col1);
                $famotorgadas_col1 = $ramotorgadas_col1->fetch_assoc();
                //////////////////////////////////////////////////////////////////////////////
                $amotorgadas_col2 = "SELECT COUNT(*) AS total FROM solicitud_asistencia
                INNER JOIN cita_asistencia ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia
                WHERE solicitud_asistencia.servicio_medico = '$serviciomedico' AND solicitud_asistencia.etapa = 'ASISTENCIA MÉDICA COMPLETADA'
                AND cita_asistencia.fecha_asistencia BETWEEN '$dateinicio_col2' AND '$datefin_col2'";
                $ramotorgadas_col2 = $mysqli->query($amotorgadas_col2);
                $famotorgadas_col2 = $ramotorgadas_col2->fetch_assoc();
                //////////////////////////////////////////////////////////////////////////////
                $totalamotorgadas_col1 = $totalamotorgadas_col1 + $famotorgadas_col1['total'];
                $totalamotorgadas_col2 = $totalamotorgadas_col2 + $famotorgadas_col2['total'];
                $totalamotorgadas_fila = $famotorgadas_col1['total'] +$famotorgadas_col2['total'];
                $sumatotalamotorgadas = $sumatotalamotorgadas + $totalamotorgadas_fila;

                $data .= '<tr style="background-color: white; border: 1px solid black;">
                <td style="background-color: white; border: 1px solid black; text-align:left; font-family: gothambook; color:black; font-weight: 100;">'.$serviciomedico.'</td>
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$famotorgadas_col1['total'].'</td>
                <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$famotorgadas_col2['total'].'</td>
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$totalamotorgadas_fila.'</td>
                </tr>';

              }
              $data .= '<tr style="background-color: white; border: 1px solid black;">
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>TOTAL</h4></td>
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalamotorgadas_col1.'</h4></td>
                <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalamotorgadas_col2.'</h4></td>
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$sumatotalamotorgadas.'</h4></td>
              </tr>';

              $data .='</tbody>
              </table>
        </td>

        <!-- COLUMNA DERECHA -->
        <td style="vertical-align: top; width: 49%; padding-left: 1%;">
        <table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
          <thead>
            <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
              <th colspan="4" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">PERSONAS PROPUESTAS NO INCORPORADAS<sup>1</sup></th>
            </tr>
            <tr style="background-color: white; border: 1.5px solid black;">
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Calidad del Sujeto dentro del Programa</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-2].'</th>
              <th style="background-color: #D5D0CB; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-1].'</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Total</th>
            </tr>
          </thead>
          <tbody>';
          ////////////////////////////////////////////////////////////////////////////////
          $totalppnoincorporadas_col1 = 0;
          $totalppnoincorporadas_col2 = 0;
          $sumatotalppnoincorporadas = 0;
          $ppnoincorporadas = "SELECT calidadpersona, COUNT(*) AS total FROM datospersonales
          INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
          WHERE datospersonales.estatus = 'NO INCORPORADO' AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio' AND '$datetermino' AND datospersonales.relacional = 'NO'
          GROUP BY datospersonales.calidadpersona ORDER BY total DESC, datospersonales.calidadpersona ASC";
          $rppnoincorporadas = $mysqli->query($ppnoincorporadas);
          while ($fppnoincorporadas = $rppnoincorporadas->fetch_assoc()) {
            $namecalidad = $fppnoincorporadas['calidadpersona'];
            if ($namecalidad === 'I. VICTIMA') {
              $namecortocalidad = 'VICTIMA';
            }
            if ($namecalidad === 'II. OFENDIDO') {
              $namecortocalidad = 'OFENDIDO';
            }
            if ($namecalidad === 'III. TESTIGO') {
              $namecortocalidad = 'TESTIGO';
            }
            if ($namecalidad === 'IV. COLABORADOR O INFORMANTE') {
              $namecortocalidad = 'COLABORADOR O INFORMANTE';
            }
            if ($namecalidad === 'V. AGENTE DEL MINISTERIO PUBLICO') {
              $namecortocalidad = 'AGENTE DEL MINISTERIO PUBLICO';
            }
            if ($namecalidad === 'VI. DEFENSOR') {
              $namecortocalidad = 'DEFENSOR';
            }
            if ($namecalidad === 'VII. POLICIA') {
              $namecortocalidad = 'POLICIA';
            }
            if ($namecalidad === 'VIII. PERITO') {
              $namecortocalidad = 'PERITO';
            }
            if ($namecalidad === 'IX. JUEZ O MAGISTRADO DEL PODER JUDICIAL') {
              $namecortocalidad = 'JUEZ O MAGISTRADO DEL PODER JUDICIAL';
            }
            if ($namecalidad === 'X. PERSONA CON PARENTESCO O CERCANIA') {
              $namecortocalidad = 'PERSONA CON PARENTESCO O CERCANIA';
            }
            //////////////////////////////////////////////////////////////////////////////
            $ppnoincorporadas_col2 = "SELECT COUNT(*) AS total FROM datospersonales
            INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
            WHERE datospersonales.estatus = 'NO INCORPORADO' AND datospersonales.calidadpersona = '$namecalidad'
            AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio_col1' AND '$datefin_col1'
            AND datospersonales.relacional = 'NO'";
            $rppnoincorporadas_col2 = $mysqli->query($ppnoincorporadas_col2);
            $fppnoincorporadas_col2 = $rppnoincorporadas_col2->fetch_assoc();
            //////////////////////////////////////////////////////////////////////////////
            $ppnoincorporadas_col2 = "SELECT COUNT(*) AS total FROM datospersonales
            INNER JOIN autoridad ON datospersonales.id = autoridad.id_persona
            WHERE datospersonales.estatus = 'NO INCORPORADO' AND datospersonales.calidadpersona = '$namecalidad'
            AND autoridad.fechasolicitud_persona BETWEEN '$dateinicio_col2' AND '$datefin_col2'
            AND datospersonales.relacional = 'NO'";
            $rppnoincorporadas_col2 = $mysqli->query($ppnoincorporadas_col2);
            $fppnoincorporadas_col2 = $rppnoincorporadas_col2->fetch_assoc();
            //////////////////////////////////////////////////////////////////////////////
            $totalppnoincorporadas_col1 = $totalppnoincorporadas_col1 + $fppnoincorporadas_col1['total'];
            $totalppnoincorporadas_col2 = $totalppnoincorporadas_col2 + $fppnoincorporadas_col2['total'];
            $totalppni_fila = $fppnoincorporadas_col1['total'] +$fppnoincorporadas_col2['total'];
            $sumatotalppnoincorporadas = $sumatotalppnoincorporadas + $totalppni_fila;

            $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:left; font-family: gothambook; color:black; font-weight: 100;">'.$namecortocalidad.'</td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$fppnoincorporadas_col1['total'].'</td>
            <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$fppnoincorporadas_col2['total'].'</td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$totalppni_fila.'</td>
            </tr>';
          }
          $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>TOTAL</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalppnoincorporadas_col1.'</h4></td>
            <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalppnoincorporadas_col2.'</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$sumatotalppnoincorporadas.'</h4></td>
          </tr>';

          $data .='</tbody>
          </table>
          <table id="tabla1" border="1px" cellspacing="0" width="85%" bgcolor="white">
            <thead class="thead-dark">
              <tr>
                <th style="background-color: white; border: 6px solid white; text-align:justify; font-weight: bold;" colspan="4"><h1 style="font-size:8px; text-align: justify; color:black; font-weight: bold;">
                &nbsp;&nbsp;<sup>1</sup>Corresponde a los siguientes casos:<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a) La solicitud no cumple con los requisitos de Ley.<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b) La persona manifiesta negativa de voluntariedad para incorporarse.<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c) Se determina la no procedencia de incorporación.<br>
              </h1></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
          <br>
        <!-- siguiente tabla izquierda -->
        <table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
          <thead>
            <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
              <th colspan="4" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">SUJETOS DESINCORPORADOS<sup>3</sup></th>
            </tr>
            <tr style="background-color: white; border: 1.5px solid black;">
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Calidad del Sujeto dentro del Programa</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-2].'</th>
              <th style="background-color: #D5D0CB; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-1].'</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Total</th>
            </tr>
          </thead>
          <tbody>';
          ////////////////////////////////////////////////////////////////////////////////
          $totalpdesincorporadas_col1 = 0;
          $totalpdesincorporadas_col2 = 0;
          $sumatotalpdesincorporadas = 0;
          $sujetosdesincorporadas = "SELECT calidadpersona, COUNT(*) AS total FROM datospersonales
          INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
          WHERE datospersonales.estatus = 'DESINCORPORADO'
          AND determinacionincorporacion.date_desincorporacion BETWEEN '$dateinicio' AND '$datetermino' AND datospersonales.relacional = 'NO'
          GROUP BY datospersonales.calidadpersona ORDER BY total DESC, datospersonales.calidadpersona ASC";
          $rsujetosdesincorporadas = $mysqli->query($sujetosdesincorporadas);
          while ($fsujetosdesincorporadas = $rsujetosdesincorporadas->fetch_assoc()) {
            $namecalidad = $fsujetosdesincorporadas['calidadpersona'];
            if ($namecalidad === 'I. VICTIMA') {
              $namecortocalidad = 'VICTIMA';
            }
            if ($namecalidad === 'II. OFENDIDO') {
              $namecortocalidad = 'OFENDIDO';
            }
            if ($namecalidad === 'III. TESTIGO') {
              $namecortocalidad = 'TESTIGO';
            }
            if ($namecalidad === 'IV. COLABORADOR O INFORMANTE') {
              $namecortocalidad = 'COLABORADOR O INFORMANTE';
            }
            if ($namecalidad === 'V. AGENTE DEL MINISTERIO PUBLICO') {
              $namecortocalidad = 'AGENTE DEL MINISTERIO PUBLICO';
            }
            if ($namecalidad === 'VI. DEFENSOR') {
              $namecortocalidad = 'DEFENSOR';
            }
            if ($namecalidad === 'VII. POLICIA') {
              $namecortocalidad = 'POLICIA';
            }
            if ($namecalidad === 'VIII. PERITO') {
              $namecortocalidad = 'PERITO';
            }
            if ($namecalidad === 'IX. JUEZ O MAGISTRADO DEL PODER JUDICIAL') {
              $namecortocalidad = 'JUEZ O MAGISTRADO DEL PODER JUDICIAL';
            }
            if ($namecalidad === 'X. PERSONA CON PARENTESCO O CERCANIA') {
              $namecortocalidad = 'PERSONA CON PARENTESCO O CERCANIA';
            }
            //////////////////////////////////////////////////////////////////////////////
            $sujetosdesincorporadas_col1 = "SELECT COUNT(*) AS total FROM datospersonales
            INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
            WHERE datospersonales.calidadpersona = '$namecalidad' AND datospersonales.estatus = 'DESINCORPORADO'
            AND determinacionincorporacion.date_desincorporacion BETWEEN '$dateinicio_col1' AND '$datefin_col1'
            AND datospersonales.relacional = 'NO'";
            $rsujetosdesincorporadas_col1 = $mysqli->query($sujetosdesincorporadas_col1);
            $fsujetosdesincorporadas_col1 = $rsujetosdesincorporadas_col1->fetch_assoc();
            //////////////////////////////////////////////////////////////////////////////
            $sujetosdesincorporadas_col2 = "SELECT COUNT(*) AS total FROM datospersonales
            INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
            WHERE datospersonales.calidadpersona = '$namecalidad' AND datospersonales.estatus = 'DESINCORPORADO'
            AND determinacionincorporacion.date_desincorporacion BETWEEN '$dateinicio_col2' AND '$datefin_col2'
            AND datospersonales.relacional = 'NO'";
            $rsujetosdesincorporadas_col2 = $mysqli->query($sujetosdesincorporadas_col2);
            $fsujetosdesincorporadas_col2 = $rsujetosdesincorporadas_col2->fetch_assoc();
            //////////////////////////////////////////////////////////////////////////////
            $totalpdesincorporadas_col1 = $totalpdesincorporadas_col1 + $fsujetosdesincorporadas_col1['total'];
            $totalpdesincorporadas_col2 = $totalpdesincorporadas_col2 + $fsujetosdesincorporadas_col2['total'];
            $totalsujetosdesincorporados_fila = $fsujetosdesincorporadas_col1['total'] +$fsujetosdesincorporadas_col2['total'];
            $sumatotalpdesincorporadas = $sumatotalpdesincorporadas + $totalsujetosdesincorporados_fila;

            $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:left; font-family: gothambook; color:black; font-weight: 100;">'.$namecortocalidad.'</td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$fsujetosdesincorporadas_col1['total'].'</td>
            <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$fsujetosdesincorporadas_col2['total'].'</td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$totalsujetosdesincorporados_fila.'</td>
            </tr>';
          }
          $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>TOTAL</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalpdesincorporadas_col1.'</h4></td>
            <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalpdesincorporadas_col2.'</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$sumatotalpdesincorporadas.'</h4></td>
          </tr>';

          $data .='</tbody>
          </table>
          <table id="tabla1" border="1px" cellspacing="0" width="85%" bgcolor="white">
            <thead class="thead-dark">
              <tr>
                <th style="background-color: white; border: 6px solid white; text-align:justify; font-weight: bold;" colspan="4"><h1 style="font-size:8px; text-align: justify; color:black; font-weight: bold;">
                &nbsp;&nbsp;<sup>3</sup>Se refiere a los Sujetos Protegidos que se encuentran en los siguientes supuestos: <br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a) Concluyó su participación dentro del Proceso Penal.<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b) Renuncia voluntaria.<br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c) Determinación de disminución o cese del riesgo.<br>
              </h1></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
          <br>
        <!-- siguiente tabla izquierda -->
        <table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
          <thead>
            <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
              <th colspan="4" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">MEDIDAS DE APOYO EJECUTADAS</th>
            </tr>
            <tr style="background-color: white; border: 1.5px solid black;">
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Calidad del Sujeto dentro del Programa</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-2].'</th>
              <th style="background-color: #D5D0CB; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-1].'</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Total</th>
            </tr>
          </thead>
          <tbody>';
          ////////////////////////////////////////////////////////////////////////////////
          $totalmedidasejecutadas_col1 = 0;
          $totalmedidasejecutadas_col2 = 0;
          $sumatotalmedidasejecutadas = 0;
          $medidasejecutadas = "SELECT medidas.ejecucion, COUNT(*) AS total FROM medidas
          WHERE medidas.estatus = 'EJECUTADA'
          AND medidas.date_ejecucion BETWEEN '$dateinicio' AND '$datetermino'
          GROUP BY medidas.ejecucion ORDER BY total DESC, medidas.ejecucion ASC";
          $rmedidasejecutadas = $mysqli->query($medidasejecutadas);
          while ($fmedidasejecutadas = $rmedidasejecutadas->fetch_assoc()) {
            $municipio = $fmedidasejecutadas['ejecucion'];
            //////////////////////////////////////////////////////////////////////////////
            $medidasejecutadas_col1 = "SELECT COUNT(*) AS total FROM medidas
            WHERE medidas.estatus = 'EJECUTADA' AND medidas.ejecucion = '$municipio'
            AND medidas.date_ejecucion BETWEEN '$dateinicio_col1' AND '$datefin_col1'";
            $rmedidasejecutadas_col1 = $mysqli->query($medidasejecutadas_col1);
            $fmedidasejecutadas_col1 = $rmedidasejecutadas_col1->fetch_assoc();
            //////////////////////////////////////////////////////////////////////////////
            $medidasejecutadas_col2 = "SELECT COUNT(*) AS total FROM medidas
            WHERE medidas.estatus = 'EJECUTADA' AND medidas.ejecucion = '$municipio'
            AND medidas.date_ejecucion BETWEEN '$dateinicio_col2' AND '$datefin_col2'";
            $rmedidasejecutadas_col2 = $mysqli->query($medidasejecutadas_col2);
            $fmedidasejecutadas_col2 = $rmedidasejecutadas_col2->fetch_assoc();
            //////////////////////////////////////////////////////////////////////////////
            $totalmedidasejecutadas_col1 = $totalmedidasejecutadas_col1 + $fmedidasejecutadas_col1['total'];
            $totalmedidasejecutadas_col2 = $totalmedidasejecutadas_col2 + $fmedidasejecutadas_col2['total'];
            $totalmedidasejecutadas_fila = $fmedidasejecutadas_col1['total'] +$fmedidasejecutadas_col2['total'];
            $sumatotalmedidasejecutadas = $sumatotalmedidasejecutadas + $totalmedidasejecutadas_fila;

            $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:left; font-family: gothambook; color:black; font-weight: 100;">'.$municipio.'</td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$fmedidasejecutadas_col1['total'].'</td>
            <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$fmedidasejecutadas_col2['total'].'</td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$totalmedidasejecutadas_fila.'</td>
            </tr>';

          }
          $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>TOTAL</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalmedidasejecutadas_col1.'</h4></td>
            <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalmedidasejecutadas_col2.'</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$sumatotalmedidasejecutadas.'</h4></td>
          </tr>';

          $data .='</tbody>
          </table>
          <br>
        <!-- siguiente tabla izquierda -->
        <table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
          <thead>
            <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
              <th colspan="4" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">TRASLADOS REALIZADOS POR LA PDI</th>
            </tr>
            <tr style="background-color: white; border: 1.5px solid black;">
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Calidad del Sujeto dentro del Programa</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-2].'</th>
              <th style="background-color: #D5D0CB; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-1].'</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Total</th>
            </tr>
          </thead>
          <tbody>';
          ////////////////////////////////////////////////////////////////////////////////
          $totaltraslados_col1 = 0;
          $totaltraslados_col2 = 0;
          $sumatotaltraslados = 0;
          $traslados = "SELECT react_destinos_traslados.motivo, COUNT(*) AS total FROM react_destinos_traslados
          INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
          INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
          WHERE react_traslados.fecha BETWEEN '$dateinicio' AND '$datetermino'
          GROUP BY react_destinos_traslados.motivo ORDER BY total DESC, react_destinos_traslados.motivo ASC";
          $rtraslados = $mysqli->query($traslados);
          while ($ftraslados = $rtraslados->fetch_assoc()) {
            $trasladomunicipio = $ftraslados['motivo'];
            //////////////////////////////////////////////////////////////////////////////
            $traslados_col1 = "SELECT COUNT(*) AS total FROM react_destinos_traslados
            INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
            INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
            WHERE react_destinos_traslados.motivo = '$serviciomedico' AND react_traslados.fecha BETWEEN '$dateinicio_col1' AND '$datefin_col1'";
            $rtraslados_col1 = $mysqli->query($traslados_col1);
            $ftraslados_col1 = $rtraslados_col1->fetch_assoc();
            //////////////////////////////////////////////////////////////////////////////
            $traslados_col2 = "SELECT COUNT(*) AS total FROM react_destinos_traslados
            INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
            INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
            WHERE react_destinos_traslados.motivo = '$serviciomedico' AND react_traslados.fecha BETWEEN '$dateinicio_col2' AND '$datefin_col2'";
            $rtraslados_col2 = $mysqli->query($traslados_col2);
            $ftraslados_col2 = $rtraslados_col2->fetch_assoc();
            //////////////////////////////////////////////////////////////////////////////
            $totaltraslados_col1 = $totaltraslados_col1 + $ftraslados_col1['total'];
            $totaltraslados_col2 = $totaltraslados_col2 + $ftraslados_col2['total'];
            $totaltraslados_fila = $ftraslados_col1['total'] +$ftraslados_col2['total'];
            $sumatotaltraslados = $sumatotaltraslados + $totaltraslados_fila;

            $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:left; font-family: gothambook; color:black; font-weight: 100;">'.$trasladomunicipio.'</td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$ftraslados_col1['total'].'</td>
            <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$ftraslados_col2['total'].'</td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$totaltraslados_fila.'</td>
            </tr>';

          }
          $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>TOTAL</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totaltraslados_col1.'</h4></td>
            <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totaltraslados_col2.'</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$sumatotaltraslados.'</h4></td>
          </tr>';

          $data .='</tbody>
          </table>
          <br>
        <!-- siguiente tabla izquierda -->
        <table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
          <thead>
            <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
              <th colspan="4" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">RONDINES REALIZADOS POR LA PDI</th>
            </tr>
            <tr style="background-color: white; border: 1.5px solid black;">
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Calidad del Sujeto dentro del Programa</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-2].'</th>
              <th style="background-color: #D5D0CB; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">'.$mesesminusculas[date('n')-1].'</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Total</th>
            </tr>
          </thead>
          <tbody>';
          ////////////////////////////////////////////////////////////////////////////////
          $totalrondines_col1 = 0;
          $totalrondines_col2 = 0;
          $sumatotalrondines = 0;
          $rondines = "SELECT react_actividad.entidad_municipio, COUNT(*) AS total FROM react_actividad
          WHERE react_actividad.id_subdireccion = '4' AND react_actividad.unidad_medida = 'RONDÍN POLICIAL'
          AND react_actividad.fecha BETWEEN '$dateinicio' AND '$datetermino'
          GROUP BY react_actividad.entidad_municipio ORDER BY total DESC, react_actividad.entidad_municipio ASC";
          $rrondines = $mysqli->query($rondines);
          while ($frondines = $rrondines->fetch_assoc()) {
            $serviciomedico = $frondines['entidad_municipio'];
            //////////////////////////////////////////////////////////////////////////////
            $rondines_col1 = "SELECT react_actividad.entidad_municipio, COUNT(*) AS total FROM react_actividad
            WHERE react_actividad.entidad_municipio = '$serviciomedico' AND react_actividad.id_subdireccion = '4' AND react_actividad.unidad_medida = 'RONDÍN POLICIAL'
            AND react_actividad.fecha BETWEEN '$dateinicio_col1' AND '$datefin_col1'";
            $rrondines_col1 = $mysqli->query($rondines_col1);
            $frondines_col1 = $rrondines_col1->fetch_assoc();
            //////////////////////////////////////////////////////////////////////////////
            $rondines_col2 = "SELECT react_actividad.entidad_municipio, COUNT(*) AS total FROM react_actividad
            WHERE react_actividad.entidad_municipio = '$serviciomedico' AND react_actividad.id_subdireccion = '4' AND react_actividad.unidad_medida = 'RONDÍN POLICIAL'
            AND react_actividad.fecha BETWEEN '$dateinicio_col2' AND '$datefin_col2'";
            $rrondines_col2 = $mysqli->query($rondines_col2);
            $frondines_col2 = $rrondines_col2->fetch_assoc();
            //////////////////////////////////////////////////////////////////////////////
            $totalrondines_col1 = $totalrondines_col1 + $frondines_col1['total'];
            $totalrondines_col2 = $totalrondines_col2 + $frondines_col2['total'];
            $totalrondines_fila = $frondines_col1['total'] +$frondines_col2['total'];
            $sumatotalrondines = $sumatotalrondines + $totalrondines_fila;

            $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:left; font-family: gothambook; color:black; font-weight: 100;">'.$serviciomedico.'</td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$frondines_col1['total'].'</td>
            <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$frondines_col2['total'].'</td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">'.$totalrondines_fila.'</td>
            </tr>';

          }
          $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>TOTAL</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalrondines_col1.'</h4></td>
            <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalrondines_col2.'</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$sumatotalrondines.'</h4></td>
          </tr>';

          $data .='</tbody>
          </table>
        <!-- siguiente tabla izquierda -->
        </td>
    </tr>
</table><br><br>';
$data .= '<div style="float: left; width: 100%;">
<table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
  <thead>
    <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
      <th colspan="8" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">SUJETOS PROTEGIDOS ACTIVOS CON ESTANCIA EN EL CENTRO DE RESGUARDO</h2></th>
    </tr>
    <tr style="background-color: white; border: 1.5px solid black;">
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">No.</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">ID Sujeto</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">Fecha de ingreso al <br>Resguardo</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">Fecha de <br>Incorporación</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">Sexo</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">Edad</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">Calidad del sujeto <br>dentro del Programa</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">Delito</h2></th>
    </tr>
  </thead>
  <tbody>';
  $contadorsujresguardados = 0;
  $sujetores = "SELECT * FROM datospersonales WHERE (estatus = 'SUJETO PROTEGIDO' || estatus = 'PERSONA PROPUESTA') AND relacional = 'NO'";
  $rsujetores = $mysqli->query($sujetores);
  while ($fsujetores = $rsujetores->fetch_array(MYSQLI_ASSOC)) {
    $id_sujetodr = $fsujetores['id'];
    $checkdentro = "SELECT DISTINCT id_persona FROM medidas
    WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$id_sujetodr' AND estatus = 'EN EJECUCION'";
    $rcheckdentro = $mysqli->query($checkdentro);
    $fcheckdentro = $rcheckdentro->fetch_assoc();
    if(isset($fcheckdentro['id_persona'])){
      $sujetodentrodelresguardo = $fcheckdentro['id_persona'];
      if ($fsujetores['estatus'] === 'SUJETO PROTEGIDO') {
        $convenioent = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$sujetodentrodelresguardo'";
        $fconvenioent = $mysqli->query($convenioent);
        $rconvenioent = $fconvenioent->fetch_assoc();
        $fechafirma = date("d/m/Y", strtotime($rconvenioent['date_convenio']));
        //////////////////////////////////////////////////////////////////////////
        $getinicioresguardo = "SELECT * FROM medidas
        WHERE id_persona = '$id_sujetodr'  AND medida = 'VIII. ALOJAMIENTO TEMPORAL'
        LIMIT 1";
        $rgetinicioresguardo = $mysqli->query($getinicioresguardo);
        $fgetinicioresguardo = $rgetinicioresguardo ->fetch_assoc();
      }elseif ($fsujetores['estatus'] === 'PERSONA PROPUESTA') {
        $fechafirma = "EN ANALISIS";
        $fechavigencia = "EN ANALISIS";
      }
      $delitosujetodr = "SELECT * FROM procesopenal WHERE id_persona = '$id_sujetodr'";
      $rdelitosujetodr = $mysqli->query($delitosujetodr);
      $fdelitosujetodr = $rdelitosujetodr->fetch_assoc();
      if ($fdelitosujetodr['delitoprincipal'] === 'OTRO') {
        $delitopersondr = $fdelitosujetodr['otrodelitoprincipal'];
      }else {
        $delitopersondr = $fdelitosujetodr['delitoprincipal'];
      }
      $contadorsujresguardados = $contadorsujresguardados + 1;
      $data .= '<tr style="background-color: white; border: 1px solid black;">
        <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$contadorsujresguardados.'</h4></td>
        <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$fsujetores['identificador'].'</h4></td>
        <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.date("d/m/Y", strtotime($fgetinicioresguardo['date_provisional'])).'</h4></td>
        <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$fechafirma.'</h4></td>
        <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$fsujetores['sexopersona'].'</h4></td>
        <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$fsujetores['edadpersona'].'</h4></td>
        <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$fsujetores['calidadpersona'].'</h4></td>
        <td style="background-color: #D5D0CB; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$delitopersondr.'</h4></td>
      </tr>';
    }
  }


$data .='</tbody>
</table><br>';

$data .= '<div style="float: left; width: 100%;">
<table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
  <thead>
    <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
      <th colspan="8" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">SUJETOS PROTEGIDOS ACTIVOS CON ESTANCIA EN EL CENTRO DE RESGUARDO</h2></th>
    </tr>
    <tr style="background-color: white; border: 1.5px solid black;">
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">No.</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">ID Sujeto</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">Fecha de ingreso al <br>Resguardo</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">Fecha de <br>Incorporación</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">Sexo</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">Edad</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">Calidad del sujeto <br>dentro del Programa</th>
      <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold; font-size:10px;">Delito</h2></th>
    </tr>
  </thead>
  <tbody>';
  $contadorfr = 0;
  $fueraresguardo = "SELECT * FROM datospersonales WHERE estatus = 'SUJETO PROTEGIDO' || estatus = 'PERSONA PROPUESTA' AND relacional = 'NO'";
  $rfueraresguardo = $mysqli->query($fueraresguardo);
  while ($ffueraresguardo = $rfueraresguardo->fetch_array(MYSQLI_ASSOC)) {
    $id_sujetofr = $ffueraresguardo['id'];
    $identificador_sujetofr = $ffueraresguardo['identificador'];
    $checkfuera = "SELECT DISTINCT id_persona FROM medidas
    WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$id_sujetofr' AND estatus = 'EN EJECUCION'";
    $rcheckfuera = $mysqli->query($checkfuera);
    $fcheckfuera = $rcheckfuera->fetch_assoc();
    if(isset($fcheckfuera['id_persona'])){
      //sujuetos dentro del resguardo
    }else {
      $sujetofueradelresguardo = $id_sujetofr;
      if ($ffueraresguardo['estatus'] === 'SUJETO PROTEGIDO') {
        $convenioentfr = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$sujetofueradelresguardo'";
        $fconvenioentfr = $mysqli->query($convenioentfr);
        $rconvenioentfr = $fconvenioentfr->fetch_assoc();
        //////////////////////////////////////////////////////////////////////////
        $fechafirmafr = date("d-m-Y", strtotime($rconvenioentfr['date_convenio']));
        $contevaluacionfr = "SELECT COUNT(*) AS total FROM evaluacion_persona WHERE id_unico = '$identificador_sujetofr'";
        $rcontevaluacionfr = $mysqli->query($contevaluacionfr);
        $fcontevaluacionfr = $rcontevaluacionfr->fetch_assoc();
        if ($fcontevaluacionfr['total'] > 0) {
          $evalsujultimo = "SELECT * FROM evaluacion_persona WHERE id_unico = '$identificador_sujetofr' ORDER BY id DESC LIMIT 1";
          $revalsujultimo = $mysqli->query($evalsujultimo);
          $fevalsujultimo = $revalsujultimo->fetch_assoc();
          $fechavigencia = date("d/m/Y", strtotime($fevalsujultimo['fecha_vigencia']));
        }else {
          $fechavigencia = date("d/m/Y", strtotime($rconvenioentfr['fecha_vigencia']));
        }
      }elseif ($ffueraresguardo['estatus'] === 'PERSONA PROPUESTA') {
        $fechafirmafr = "EN ANALISIS";
        $fechavigencia = "EN ANALISIS";
      }
      $autoridadsujetofr = "SELECT * FROM autoridad WHERE id_persona = '$sujetofueradelresguardo'";
      $rautoridadsujetofr = $mysqli->query($autoridadsujetofr);
      $fautoridadsujetofr = $rautoridadsujetofr->fetch_assoc();
      $delitosujetofr = "SELECT * FROM procesopenal WHERE id_persona = '$sujetofueradelresguardo'";
      $rdelitosujetofr = $mysqli->query($delitosujetofr);
      $fdelitosujetofr = $rdelitosujetofr->fetch_assoc();
      if ($fdelitosujetofr['delitoprincipal'] === 'OTRO') {
        $delitopersonfr = $fdelitosujetofr['otrodelitoprincipal'];
      }else {
        $delitopersonfr = $fdelitosujetofr['delitoprincipal'];
      }
      $contadorfr = $contadorfr + 1;
      $data .= '<tr style="background-color: white; border: 1px solid black;">
        <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$contadorfr.'</h4></td>
        <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$ffueraresguardo['identificador'].'</h4></td>
        <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.date("d/m/Y", strtotime($fautoridadsujetofr['fechasolicitud_persona'])).'</h4></td>
        <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$fechafirmafr.'</h4></td>
        <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$ffueraresguardo['sexopersona'].'</h4></td>
        <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$ffueraresguardo['edadpersona'].'</h4></td>
        <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$ffueraresguardo['calidadpersona'].'</h4></td>
        <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100; font-size:10px;"><h4>'.$delitopersonfr.'</h4></td>
      </tr>';
    }
  }


$data .='</tbody>
</table>
</div><br><br><br><br><br>';
$data .= '<!-- TABLA PRINCIPAL DE MAQUETACIÓN -->
<table class="tabla-layout">
    <tr>
        <!-- COLUMNA IZQUIERDA -->
        <td style="vertical-align: top; width: 49%; padding-right: 1%;">
        <table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
          <thead>
            <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
              <th colspan="2" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">EXPEDIENTES DE PROTECCIÓN INICIADOS</h2></th>
            </tr>
            <tr style="background-color: white; border: 1.5px solid black;">
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Etapa</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Total</th>
            </tr>
          </thead>
          <tbody>';
          $consecutivo = 0;
          $totalexpedientes = 0;
          $statusexpediente = "SELECT * FROM statusexpediente";
          $rstatusexpediente = $mysqli->query($statusexpediente);
          while ($fstatusexpediente = $rstatusexpediente->fetch_assoc()) {
            $consecutivo = $consecutivo +1;
            $estatus_exp = $fstatusexpediente['nombre'];
            $contarstatusexp = "SELECT COUNT(*) AS total FROM statusseguimiento
            WHERE status = '$estatus_exp'";
            $rcontarstatusexp = $mysqli->query($contarstatusexp);
            $fcontarstatusexp = $rcontarstatusexp ->fetch_assoc();
            $totalexpedientes = $totalexpedientes + $fcontarstatusexp['total'];
            if ($estatus_exp == 'ANALISIS' AND $fcontarstatusexp['total'] == 0) {
              $data .= '<tr style="background-color: white; border: 1px solid black;">
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;"><h4>EN ANALISIS</h4></td>
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;"><h4>'.$fcontarstatusexp['total'].'</h4></td>
              </tr>';
            }elseif ($fcontarstatusexp['total'] > 0 ) {
              $data .= '<tr style="background-color: white; border: 1px solid black;">
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;"><h4>'.$estatus_exp.'</h4></td>
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;"><h4>'.$fcontarstatusexp['total'].'</h4></td>
              </tr>';
            }
          }
          $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>TOTAL</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalexpedientes.'</h4></td>
          </tr>';

        $data .='</tbody>
        </table>
        <br>
        <table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
          <thead>
            <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
              <th colspan="2" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">MEDIDAS DE APOYO EJECUTADAS</h2></th>
            </tr>
            <tr style="background-color: white; border: 1.5px solid black;">
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Clasificación</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Total</th>
            </tr>
          </thead>
          <tbody>';
          $med_asistencia = "SELECT COUNT(*) As total FROM medidas
          WHERE clasificacion = 'ASISTENCIA' AND estatus = 'EJECUTADA'";
          $rmed_asistencia = $mysqli->query ($med_asistencia);
          $fmed_asistencia = $rmed_asistencia ->fetch_assoc();
          ////////////////////////////////////////////////////////////////////////////////
          $med_resguardo = "SELECT COUNT(*) As total FROM medidas
          WHERE clasificacion = 'RESGUARDO' AND estatus = 'EJECUTADA'";
          $rmed_resguardo = $mysqli->query ($med_resguardo);
          $fmed_resguardo = $rmed_resguardo ->fetch_assoc();
          $totalmed_ejecutadas = $fmed_asistencia['total'] + $fmed_resguardo['total'];

          $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;"><h4>ASISTENCIA</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;"><h4>'.$fmed_asistencia['total'].'</h4></td>
          </tr>';

          $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;"><h4>RESGUARDO</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;"><h4>'.$fmed_resguardo['total'].'</h4></td>
          </tr>';

          $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>TOTAL</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalmed_ejecutadas.'</h4></td>
          </tr>';

        $data .='</tbody>
        </table>
        </td>

        <!-- COLUMNA DERECHA -->
        <td style="vertical-align: top; width: 49%; padding-left: 1%;">
        <table border="1px" cellspacing="0" width="100%" bgcolor="black" style="border: 1.5px solid black;">
          <thead>
            <tr style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black;">
              <th colspan="2" style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;">PERSONAS QUE SOLICITARON INCORPORARSE</h2></th>
            </tr>
            <tr style="background-color: white; border: 1.5px solid black;">
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Etapa dentro del Programa</th>
              <th style="background-color: white; border: 1.5px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;">Total</th>
            </tr>
          </thead>
          <tbody>';
          $consecutivo = 0;
          $totalsujetos = 0;
          $estatussujeto = "SELECT * FROM estatuspersona";
          $restatussujeto = $mysqli->query($estatussujeto);
          while ($festatussujeto = $restatussujeto->fetch_assoc()) {
            $consecutivo = $consecutivo + 1;
            $status_sujeto = $festatussujeto['nombre'];
            //////////////////////////////////////////////////////////////////////////////
            $contarstatuspersonas = "SELECT COUNT(*) AS total FROM datospersonales
            WHERE estatus = '$status_sujeto' AND relacional = 'NO'";
            $rcontarstatuspersonas = $mysqli->query($contarstatuspersonas);
            $fcontarstatuspersonas = $rcontarstatuspersonas ->fetch_assoc();
            $totalsujetos = $totalsujetos + $fcontarstatuspersonas['total'];
            if ($fcontarstatuspersonas['total'] > 0) {
              $data .= '<tr style="background-color: white; border: 1px solid black;">
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;"><h4>'.$status_sujeto.'</h4></td>
                <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: 100;"><h4>'.$fcontarstatuspersonas['total'].'</h4></td>
              </tr>';
            }
          }
          $data .= '<tr style="background-color: white; border: 1px solid black;">
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>TOTAL</h4></td>
            <td style="background-color: white; border: 1px solid black; text-align:center; font-family: gothambook; color:black; font-weight: bold;"><h4>'.$totalsujetos.'</h4></td>
          </tr>';

        $data .='</tbody>
        </table>
        </td>
    </tr>
</table>';

                $img_externa = 'C:/Users/FGJJE/Downloads/grafica_expedientes.png';
                $img_externa = 'C:/Users/FGJEM/Downloads/grafica_expedientes.png';
        $data .='
        <br><br><br><br><div style="style="float: left; width: 100%; background-color: white; border: 1.8px solid black;"">
        <div style="display: grid; background-color: white; justify-content: center; align-items: center; max-height: 40px; min-height: 40px; min-width: 40%; max-width: 100%;">
                  <h2 style="text-align: center; font-size: 16px; font-weight: bold;"><b>SUJETOS QUE INGRESARON A ESTANCIA EN EL CENTRO DE RESGUARDO</b></h2></div>
            <!-- mPDF requiere la ruta física completa -->
            <img src="' . $img_externa . '" width="800">

        </div>';


        $data .= '
        ';

    $mpdf ->WriteHtml($css, \Mpdf\HTMLParsermode::HEADER_CSS);
    $mpdf ->WriteHtml($css1, \Mpdf\HTMLParsermode::HEADER_CSS);
    $mpdf ->WriteHtml($css2, \Mpdf\HTMLParsermode::HEADER_CSS);
    $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
    // $mpdf->WriteHTML($data, \Mpdf\HTMLParserMode::BODY_HTML);
    $mpdf->WriteHtml($data);
////////////////////////////////////////////////////////////////////////////////
$mpdf->output();
// $mpdf->output("REPORTE SEMANAL.pdf",'D');
?>
