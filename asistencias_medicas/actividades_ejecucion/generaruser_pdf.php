<?php
error_reporting(0);
require_once '../../mpdf/vendor/autoload.php';
include("../conexion.php");
session_start ();
$name = $_SESSION['usuario'];
date_default_timezone_set("America/Mexico_City");
$actividad = $_POST['actividadpdf'];
$fecha_inicio = date("Y-m-d", strtotime($_POST['fechainicialpdf']));
$fecha_fin  = date("Y-m-d", strtotime($_POST['fechafinalpdf']));

$fecha1 = date("d-m-Y", strtotime($_POST['fechainicialpdf']));
$fecha2  = date("d-m-Y", strtotime($_POST['fechafinalpdf']));
$today = date("d-m-Y H:i:sa");
// $today = date("Y-m-d H:i:s");
// consulta del nombre del usuario de la actividad
$nameuser = "SELECT * FROM usuarios WHERE usuario = '$name'";
$rnameuser = $mysqli ->query($nameuser);
$fnameuser = $rnameuser ->fetch_assoc();
$namecomplete = mb_strtoupper (html_entity_decode($fnameuser['nombre'].' '.$fnameuser['apellido_p'].' '.$fnameuser['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8"));

$mpdf = new \Mpdf\Mpdf([
                  'mode' => '',
                  'format' => 'A4-P',
                  'default_font_size' => 0,
                  'default_font' => '',
                  'margin_left' => 10,
                  'margin_right' => 8,
                  'margin_top' => 10,
                  'margin_bottom' => 20,
                  'margin_header' => 1,
                  'margin_footer' => 1,
                  'orientation' => 'P',
    ]);

    $mpdf->SetHTMLHeader('
    <table width="100%">
        <tr>
            <td width="10%"><img  src="../../image/gobierno2.jpg" width="120" height="130"></td>
            <td  width="80%" style="font-family: gothambook;" align="center"><span align="center">UNIDAD DE PROTECCIÓN DE SUJETOS QUE INTERVIENEN EN EL PROCEDIMIENTO PENAL O DE EXTINCIÓN DE DOMINIO</span>
            </td>
            <td width="10%" style="text-align: right;"><img  src="../../image/FGJEM.jpg" width="60" height="60"></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook;" align="center"><span align="center">SUBDIRECCIÓN DE EJECUCIÓN DE MEDIDAS<br>REPORTE DE ACTIVIDADES</span>
            </td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td width="50%" style="font-family: gothambook" align="center"><span align="center"></span>
            </td>
            <td width="50%" style="font-size: .55em; font-family: gothambook" align="right"><span align="center">FECHA Y HORA: '.strtoupper($today).'</span>
            </td>
        </tr>
    </table>
    ');

$mpdf->SetHTMLFooter('
    <div>
      <table width="4%" align="right">
        <tr>
          <td width="3%" align="center" style="height:30vh;"><h3 class=""></font></span>
            <span style="font-size: .55em; align:left;width:6px; color:black;"><font style="font-family: gothambook">
            <p align="center">
            <span style="font-size: 1.5em;">{PAGENO}/{nbpg}</span>
            </p>
            </font></span></h3>
          </td>
        </tr>
      </table>
    </div>');

$html .='<br><br><br><br>';
// BUSQUEDA GLOBAL Y TODAS LAS ACTIVIDADES
if ($actividad === 'TODAS') {
  include("search_global_user.php");
}else{
  include("search_actividad_user.php");
}
// FIN DE BUSQUEDAS
$mpdf->WriteHtml($html);
$mpdf->Output('REACT_REPORTE_'.$tipo_consulta.'_'.$usuario.'_'.$fecha1.'_al_'.$fecha2.'.pdf', 'I');
?>
