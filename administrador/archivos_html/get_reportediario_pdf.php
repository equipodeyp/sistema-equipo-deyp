<?php
date_default_timezone_set("America/Mexico_City");
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
// echo " ".date('d')." DE ".$mesone. " DEL ".date('Y') ;
$fecha_actual = date("Y-m-d");

$diaactual = date("d");
$mesactual = $meses[date("n")-1];
////////////////////////////
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
  'margin_right' => 7,
  'margin_top' => 35,
  'margin_bottom' => 20,
  'margin_header' => 7,
  'margin_footer' => 6,
  'orientation' => 'P',
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
$mpdf->SetHTMLFooter('<div style="float: left; width: 85%;">
<table width="100%" align="right">
  <tr>
    <td  align="left" bgcolor="" style="height:30vh;">
      <h1 style="font-size: 13.33px; color:#63696D;">
      <strong>*NOTA: Cifras sujetas a cambios por actualización</strong>
      </h1>
    </td>
  </tr>
</table>
</div>
<div style="float: right; width: 5%;">
  <table width="5%" align="right">
    <tr>
      <td  align="center" bgcolor="#63696D" style="height:30vh;">
        <h1 style="color:white;">
        <span style="font-size: 16px; color:white;">{PAGENO}/{nbpg}</span>
        </h1>
      </td>
    </tr>
  </table>
</div><br><br>
<table width="100%" cellspacing="0">
  <tr>
    <td width="65%" align="center" bgcolor="#63696D" style="height:30vh;">
      <h1 style="font-size:13px color:white;">
      <span style="font-size: 8px; align:left; width:10px; color:white;">Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio</span>
      </h1>
    </td>
    <td width="35%" align="center" bgcolor="#63696D" style="height:30vh;">
      <h1 style="font-size:13px color:white;">
      <span style="font-size: 8px; align:left; width:10px; color:white;">Subdirección de Estadística y Pre-Registro</span>
      </h1>
    </td>
  </tr>
</table>
');
//////////////////////////////////////////////////////
$data .= '<div style="display: grid; background-color: white; justify-content: center; align-items: center; max-height: 200px; min-height: 200px; min-width: 100%; max-width: 100%;">
          <h2 style="text-align: center; font-size: 16px;"><strong>Reporte Global <br> Del 01 de Junio del 2021 al '.$diaactual.' de '.$mesactual.' de '.date("Y").'</strong></h2></div><br>';

$data .= '<div style="float: left; width: 50%;">
            <table border="1px" cellspacing="0" width="90%" bgcolor="#97897D">
              <thead>
                <tr>
                  <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; width:70px;"><h1 style="font-size:13.33px; color:white;">CONCEPTO</h1></th>
                  <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:30px;"><h1 style="font-size:13.33px; color:white;">TOTAL</h1></th>
                </tr>
              </thead>
            <tbody>';
            $exp = "SELECT COUNT(*) as t FROM expediente";
            $rexp = $mysqli->query($exp);
            $fexp = $rexp->fetch_assoc();
            //
            $sujtts = "SELECT COUNT(*) as t from datospersonales WHERE relacional = 'NO'";
            $rsujtts = $mysqli->query($sujtts);
            $fsujtts = $rsujtts->fetch_assoc();
            //
            $suj = "SELECT COUNT(*) as t from determinacionincorporacion
            INNER JOIN datospersonales ON datospersonales.id = determinacionincorporacion.id_persona
            WHERE  convenio = 'formalizado' AND datospersonales.relacional = 'NO'";
            $rsuj = $mysqli->query($suj);
            $fsuj = $rsuj->fetch_assoc();
            //
            $sujact = "SELECT COUNT(*) as t from datospersonales WHERE estatus = 'sujeto protegido' AND relacional = 'NO'";
            $rsujact = $mysqli->query($sujact);
            $fsujact = $rsujact->fetch_assoc();
            //
            $sujresg  = "SELECT COUNT(*) as t FROM datospersonales
            INNER JOIN medidas on datospersonales.id = medidas.id_persona
            where medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus = 'en ejecucion'";
            $rsujresg = $mysqli->query($sujresg);
            $fsujresg = $rsujresg->fetch_assoc();
            //
            $meds = "SELECT COUNT(*) as t FROM medidas";
            $rmeds = $mysqli->query($meds);
            $fmeds = $rmeds->fetch_assoc();
            //
            $medidastts = "SELECT COUNT(*) as t FROM medidas
            WHERE estatus = 'EJECUTADA'";
            $rmedidastts = $mysqli->query($medidastts);
            $fmedidastts = $rmedidastts->fetch_assoc();
            //
            $data .= '<tr bgcolor="white">
            <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;EXPEDIENTES INICIADOS</h1></td>
            <td style="background-color: #e6e3e1; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fexp['t'].'</h1></td>
            </tr>';
            //
            $data .= '<tr bgcolor="white">
            <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA</h1></td>
            <td style="background-color: #e6e3e1; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fsujtts['t'].'</h1></td>
            </tr>';
            //
            $data .= '<tr bgcolor="white">
            <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;SUJETOS INCORPORADOS</h1></td>
            <td style="background-color: #e6e3e1; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fsuj['t'].'</h1></td>
            </tr>';
            //
            $data .= '<tr bgcolor="white">
            <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;SUJETOS PROTEGIDOS ACTIVOS</h1></td>
            <td style="background-color: #e6e3e1; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fsujact['t'].'</h1></td>
            </tr>';
            //
            $data .= '<tr bgcolor="white">
            <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;MEDIDAS DE APOYO DICTAMINADAS</h1></td>
            <td style="background-color: #e6e3e1; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fmeds['t'].'</h1></td>
            </tr>';
            //
            $data .= '<tr bgcolor="white">
            <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;MEDIDAS DE APOYO EJECUTADAS</h1></td>
            <td style="background-color: #e6e3e1; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fmedidastts['t'].'</h1></td>
            </tr>';

$data .='</tbody>
        </table>
        <table id="tabla1" border="1px" cellspacing="0" width="85%" bgcolor="white">
          <thead class="thead-dark">
            <tr>
              <th style="background-color: white; border: 6px solid white; text-align:justify;" colspan="4"><h1 style="font-size:8px; text-align: justify; color:#665649;">
              *Activos al '.$diaactual.' de '.$mesactual.' de '.date("Y").'<br>
            </h1></th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>';
/////segunda tabla
// $data .= '<h1>ghjf</h1>';
$data .= '<div style="float: right; width: 50%;">
            <table border="1px" cellspacing="0" width="95%" bgcolor="#97897D">
              <thead>
                <tr>
                  <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; width:70px;"><h1 style="font-size:13.33px; color:white;">ESTATUS DE LOS EXPEDIENTES DE PROTECCIÓN</h1></th>
                  <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:30px;"><h1 style="font-size:13.33px; color:white;">TOTAL</h1></th>
                </tr>
              </thead>
            <tbody>';
            //
            $totexp = "SELECT COUNT(*) AS t from expediente";
            $rtotexp = $mysqli->query($totexp);
            $ftotexp = $rtotexp->fetch_assoc();
            //

            //
            $stexp = "SELECT * FROM statusexpediente";
            $rstexp = $mysqli->query($stexp);
            while ($fstexp = $rstexp->fetch_assoc()) {
              $status = $fstexp['nombre'];
              $totst = "SELECT COUNT(*) AS t from expediente
              INNER JOIN statusseguimiento ON expediente.fol_exp = statusseguimiento.folioexpediente
              WHERE statusseguimiento.status = '$status'";
              $rtotst = $mysqli->query($totst);
              $ftotst = $rtotst->fetch_assoc();
              if ($ftotst['t'] > 0) {
                $data .= '<tr bgcolor="white">
                <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;'.$fstexp['nombre'].'</h1></td>
                <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$ftotst['t'].'</h1></td>
                </tr>';
                }
              }
              $data .= '<tr bgcolor="#e6e3e1">
              <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:13.33px; color:#97897D;">TOTAL DE EXPEDIENTES&nbsp;</h1></td>
              <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$ftotexp['t'].'</h1></td>
              </tr>';
$data .='</tbody>
      </table>
      <table id="tabla1" border="1px" cellspacing="0" width="85%" bgcolor="white">
        <thead class="thead-dark">
          <tr>
            <th style="background-color: white; border: 6px solid white; text-align:justify;" colspan="4"><h1 style="font-size:8px; text-align: justify; color:#665649;">
            *Estatus al '.$diaactual.' de '.$mesactual.' de '.date("Y").'<br>
          </h1></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div><br><br><br><br><br>';
    $data .= '<div style="float: left; width: 50%;">
                <table border="1px" cellspacing="0" width="90%" bgcolor="#97897D">
                  <thead>
                    <tr>
                      <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; width:70px;"><h1 style="font-size:13.33px; color:white;">ESTATUS DE LAS PERSONAS QUE SOLICITARON INCORPORARSE AL PROGRAMA</h1></th>
                      <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:30px;"><h1 style="font-size:13.33px; color:white;">TOTAL</h1></th>
                    </tr>
                  </thead>
                <tbody>';
                ////////////////////////////////////////////////////////////////////////////////
                $totalsujetosactivos = "SELECT COUNT(*) as t FROM datospersonales
                INNER JOIN determinacionincorporacion ON datospersonales.id = determinacionincorporacion.id_persona
                WHERE datospersonales.relacional = 'NO' AND determinacionincorporacion.convenio = 'FORMALIZADO' AND estatus = 'SUJETO PROTEGIDO'";
                $rtotalsujetosactivos = $mysqli->query($totalsujetosactivos);
                $ftotalsujetosactivos = $rtotalsujetosactivos->fetch_assoc();
                ////////////////////////////////////////////////////////////////////////////////
                $noincorporado = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'NO INCORPORADO' AND relacional = 'NO'";
                $rnoincorporado = $mysqli->query($noincorporado);
                $fnoincorporado = $rnoincorporado->fetch_assoc();
                ////////////////////////////////////////////////////////////////////////////////
                $desincorporado = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'DESINCORPORADO' AND relacional = 'NO'";
                $rdesincorporado = $mysqli->query($desincorporado);
                $fdesincorporado = $rdesincorporado->fetch_assoc();
                ////////////////////////////////////////////////////////////////////////////////
                $perpropuesta = "SELECT COUNT(*) as t FROM datospersonales WHERE estatus = 'PERSONA PROPUESTA' AND relacional = 'NO'";
                $rperpropuesta = $mysqli->query($perpropuesta);
                $fperpropuesta = $rperpropuesta->fetch_assoc();
                ////////////////////////////////////////////////////////////////////////////////
                $totalpersonas = $fnoincorporado['t'] + $ftotalsujetosactivos['t'] + $fdesincorporado['t'] + $fperpropuesta['t'];
                //////
                $data .= '<tr bgcolor="white">
                <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;SUJETOS INCORPORADOS ACTIVOS</h1></td>
                <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$ftotalsujetosactivos['t'].'</h1></td>
                </tr>';
                //////////
                $data .= '<tr bgcolor="white">
                <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;NO INCORPORADO AL PROGRAMA<sup>1</sup></h1></td>
                <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fnoincorporado['t'].'</h1></td>
                </tr>';
                //////////
                $data .= '<tr bgcolor="white">
                <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;DESINCORPORADO DEL PROGRAMA<sup>2</sup></h1></td>
                <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fdesincorporado['t'].'</h1></td>
                </tr>';
                //////////
                if ($fperpropuesta['t'] > 0) {
                  $data .= '<tr bgcolor="white">
                  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;PERSONA PROPUESTA A INCORPORARSE</h1></td>
                  <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fperpropuesta['t'].'</h1></td>
                  </tr>';
                }
                ////////////
                $data .= '<tr bgcolor="#e6e3e1">
                <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:13.33px; color:#97897D;">TOTAL DE PERSONAS&nbsp;</h1></td>
                <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalpersonas.'</h1></td>
                </tr>';
    $data .='</tbody>
            </table>
            <table id="tabla1" border="1px" cellspacing="0" width="85%" bgcolor="white">
              <thead class="thead-dark">
                <tr>
                  <th style="background-color: white; border: 6px solid white; text-align:justify;" colspan="4"><h1 style="font-size:8px; text-align: justify; color:#665649;">
                  *Estatus al '.$diaactual.' de '.$mesactual.' de '.date("Y").'<br>
                  &nbsp;&nbsp;<sup>1</sup>Corresponde a los siguientes casos:<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a) La solicitud no cumple con los requisitos de Ley<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b) La persona manifiesta negativa de voluntariedad para incorporarse<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c) Se determina la no procedencia de incorporación<br>
                  &nbsp;<sup>2</sup>Se refiere a las personas que se encuentran en los siguientes supuestos:<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a) Concluyó su participación dentro del Proceso Penal<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b) Renuncia voluntaria<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c) Determinación de disminución o cese del riesgo<br>
                </h1></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>';
          $data .= '<div style="float: right; width: 50%;">
                      <table border="1px" cellspacing="0" width="88%" bgcolor="#97897D">
                        <thead>
                          <tr>
                            <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; width:70px;"><h1 style="font-size:13.33px; color:white;">PERIODO</h1></th>
                            <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:30px;"><h1 style="font-size:13px; color:white;">EXPEDIENTE DE PROTECCIÓN INICIADOS</h1></th>
                          </tr>
                        </thead>
                      <tbody>';
                      //////////////////////////////////////////////////////////////////////
                      $exp2021 = "SELECT COUNT(*) AS t FROM expediente WHERE año = 2021";
                      $rexp2021 = $mysqli->query($exp2021);
                      $fexp2021 = $rexp2021->fetch_assoc();
                      //////////////////////////////////////////////////////////////////////
                      $exp2022 = "SELECT COUNT(*) AS t FROM expediente WHERE año = 2022";
                      $rexp2022 = $mysqli->query($exp2022);
                      $fexp2022 = $rexp2022->fetch_assoc();
                      //////////////////////////////////////////////////////////////////////
                      $exp2023 = "SELECT COUNT(*) AS t FROM expediente WHERE año = 2023";
                      $rexp2023 = $mysqli->query($exp2023);
                      $fexp2023 = $rexp2023->fetch_assoc();
                      //////////////////////////////////////////////////////////////////////
                      $exp2024 = "SELECT COUNT(*) AS t FROM expediente WHERE año = 2024";
                      $rexp2024 = $mysqli->query($exp2024);
                      $fexp2024 = $rexp2024->fetch_assoc();
                      //////////////////////////////////////////////////////////////////////
                      $exp2025 = "SELECT COUNT(*) AS t FROM expediente WHERE año = 2025";
                      $rexp2025 = $mysqli->query($exp2025);
                      $fexp2025 = $rexp2025->fetch_assoc();
                      //////
                      $data .= '<tr bgcolor="white">
                      <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;DEL 01 DE JUNIO AL 31 DE DICIEMBRE DE 2021</h1></td>
                      <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fexp2021['t'].'</h1></td>
                      </tr>';
                      //////////
                      $data .= '<tr bgcolor="white">
                      <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;DEL 01 DE ENERO AL 31 DE DICIEMBRE DE 2022</h1></td>
                      <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fexp2022['t'].'</h1></td>
                      </tr>';
                      //////////
                      $data .= '<tr bgcolor="white">
                      <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;DEL 01 DE ENERO AL 31 DE DICIEMBRE DE 2023</h1></td>
                      <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fexp2023['t'].'</h1></td>
                      </tr>';
                      //////////
                      $data .= '<tr bgcolor="white">
                      <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;DEL 01 DE ENERO AL 31 DE DICIEMBRE DE 2024</h1></td>
                      <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fexp2024['t'].'</h1></td>
                      </tr>';
                      //////////
                      $data .= '<tr bgcolor="white">
                      <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;DEL 01 DE ENERO AL '.$diaactual.' DE '.strtoupper($mesactual).' DE '.date("Y").'</h1></td>
                      <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fexp2025['t'].'</h1></td>
                      </tr>';
                      //////////
          $data .='</tbody>
                  </table>
                  <br><br>
                  <table border="1px" cellspacing="0" width="88%" bgcolor="#97897D">
                    <thead>
                      <tr>
                        <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; width:70px;" colspan="2"><h1 style="font-size:13.33px; color:white;">SUJETOS EN RESGUARDO ACTIVOS</h1></th>
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
                  ////////////////////////////
                  $totalsujetos = $fsujencentrosresguardo['t'] + $fperpropresguardo['t'];
                  //////////////////////////////
                  $data .= '<tr bgcolor="white">
                  <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;SUJETOS INCORPORADOS</h1></td>
                  <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fsujencentrosresguardo['t'].'</h1></td>
                  </tr>';
                  //////////
                  if ($fperpropresguardo['t'] > 0) {
                    $data .= '<tr bgcolor="white">
                    <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;PERSONAS PROPUESTAS</h1></td>
                    <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fperpropresguardo['t'].'</h1></td>
                    </tr>';
                  }
                  //////////
                  $data .= '<tr bgcolor="#e6e3e1">
                  <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:13.33px; color:#97897D;">TOTAL DE SUJETOS&nbsp;</h1></td>
                  <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$totalsujetos.'</h1></td>
                  </tr>';
                  //////////
      $data .='</tbody>
              </table>
                </div><br><br><br><br><br>';
                $data .= '<div style="float: left; width: 100%;">
                            <table border="1px" cellspacing="0" width="100%" bgcolor="#97897D">
                              <thead>
                                <tr>
                                  <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; width:70px;"><h1 style="font-size:13.33px; color:white;">ESTATUS DE LAS MEDIDAS DE APOYO DICTAMINADAS</h1></th>
                                  <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:30px;"><h1 style="font-size:13.33px; color:white;">EN EJECUCIÓN</h1></th>
                                  <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:30px;"><h1 style="font-size:13.33px; color:white;">EJECUTADA</h1></th>
                                  <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:30px;"><h1 style="font-size:13.33px; color:white;">CANCELADA</h1></th>
                                  <th style="background-color: #9c9a98; border: 1px solid #A19E9F; text-align:center; font-family: gothambook; width:30px;"><h1 style="font-size:13.33px; color:white;">TOTAL</h1></th>
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
                            //
                            $data .= '<tr bgcolor="white">
                            <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;ASISTENCIA</h1></td>
                            <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fenejeca['t'].'</h1></td>
                            <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fejeca['t'].'</h1></td>
                            <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fcancela['t'].'</h1></td>
                            <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fasist['t'].'</h1></td>
                            </tr>';
                            //////////
                            $data .= '<tr bgcolor="white">
                            <td style="border: 1px solid #A19E9F; text-align:left;"><h1 style="font-weight: normal; font-size:11px; color:black;">&nbsp;RESGUARDO</h1></td>
                            <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fenejecr['t'].'</h1></td>
                            <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fejecr['t'].'</h1></td>
                            <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fcancelr['t'].'</h1></td>
                            <td style="background-color: white; border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fresg['t'].'</h1></td>
                            </tr>';
                            ////////////
                            $data .= '<tr bgcolor="#e6e3e1">
                            <td style="border: 1px solid #A19E9F; text-align:right;"><h1 style="font-size:13.33px; color:#97897D;">TOTAL DE MEDIDAS DE APOYO&nbsp;</h1></td>
                            <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$feneject['t'].'</h1></td>
                            <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$feject['t'].'</h1></td>
                            <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fcanceltot['t'].'</h1></td>
                            <td style="border: 1px solid #A19E9F; text-align:center;"><h1 style="font-size:13.33px; color:#97897D;">'.$fmedidast['t'].'</h1></td>
                            </tr>';
                $data .='</tbody>
                        </table>
                      </div>';



    $mpdf ->WriteHtml($css, \Mpdf\HTMLParsermode::HEADER_CSS);
    $mpdf ->WriteHtml($css2, \Mpdf\HTMLParsermode::HEADER_CSS);
    $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
    // $mpdf->WriteHTML($data, \Mpdf\HTMLParserMode::BODY_HTML);
    $mpdf->WriteHtml($data);
////////////////////////////////////////////////////////////////////////////////
$mpdf->output();
// $mpdf->output("REPORTE SEMANAL.pdf",'D');
?>
