<?php
error_reporting(0);

require_once '../mpdf/vendor/autoload.php';
include("./conexion.php");
date_default_timezone_set("America/Mexico_City");
// $tipo_consulta = strtoupper($_POST['tipo_consulta']);
$idactividad = $_GET['idactividad'];
echo $idactividad;
$today = date("d-m-Y H:i:sa");


$mpdf = new \Mpdf\Mpdf([
          'mode' => '',
          'format' => 'A4',
          'default_font_size' => 0,
          'default_font' => '',
          'margin_left' => 10,
          'margin_right' => 7,
          'margin_top' => 32,
          'margin_bottom' => 20,
          'margin_header' => 2,
          'margin_footer' => 2,
          'orientation' => 'P',
    ]);

    $mpdf->SetHTMLHeader('
    <table width="100%">
        <tr>
            <td width="10%"><img  src="../image/gobierno2.jpg" width="120" height="130"></td>
            <td  width="80%" style="font-family: gothambook;" align="center"><span align="center">Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio </span>
            </td>
            <td width="10%" style="text-align: right;"><img  src="../image/FGJEM.jpg" width="60" height="60"></td>
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
    ');
    // contenido de la actividad
    // codigo php para mostrar toda la informacion
    // $idactividad = $row['id'];
    // echo $idactividad;
    $traeractividad = "SELECT * FROM react_actividad WHERE id = '$idactividad' AND id_subdireccion = 1";
    $rtraeractividad = $mysqli->query($traeractividad);
    $ftraeractividad = $rtraeractividad->fetch_assoc();
    $originalDate = $ftraeractividad['fecha'];
    $date = date("d/m/Y", strtotime($originalDate));
    // variables para traer datos de tablas
    $idsub_em = $ftraeractividad['id_subdireccion'];
    $idactivity = $ftraeractividad['id_actividad'];
    $idsujprot = $ftraeractividad['id_sujeto'];
    $getidunicosuj = "SELECT * FROM datospersonales WHERE id = '$idsujprot'";
    $rgetidunicosuj = $mysqli->query($getidunicosuj);
    $fgetidunicosuj = $rgetidunicosuj ->fetch_assoc();
    $fgetidunicosuj['identificador'];
    $mystring = $fgetidunicosuj['identificador'];
    $findme   = '-';
    $pos = strpos($mystring, $findme);
    if ($pos !== false){
      $identunico = substr($mystring, 0, $pos);

    }
    // traer nombre de la subdireccion
    $subdir = "SELECT * FROM react_subdireccion WHERE id = 1";
    $rsubdir = $mysqli->query($subdir);
    $fsubdir = $rsubdir->fetch_assoc();
    // traer nombre de la actividad
    $acttraer = "SELECT * FROM react_actividad_analisis WHERE id = '$idactivity'";
    $racttraer = $mysqli->query($acttraer);
    $facttraer = $racttraer->fetch_assoc();
    // echo $facttraer['nombre'];
    $getimage = "SELECT * FROM react_image_actividad WHERE id_actividad = '$idactividad'";
    $rgetimage = $mysqli->query($getimage);
    $fgetimage = $rgetimage -> fetch_assoc();
    $user_registra = $ftraeractividad['usuario'];
    
    $sentencia="SELECT DISTINCT react_actividad.usuario, usuarios_servidorespublicos.nombre,  
    usuarios_servidorespublicos.apaterno,  usuarios_servidorespublicos.amaterno  

    FROM react_actividad 

    JOIN usuarios_servidorespublicos
    ON react_actividad.usuario = usuarios_servidorespublicos.usuario
    AND usuarios_servidorespublicos.usuario = '$user_registra'


    ORDER BY usuarios_servidorespublicos.nombre ASC";

    $result = $mysqli->query($sentencia);
    $row=$result->fetch_assoc();
    $name_user = strtoupper($row['nombre'].' '.$row['apaterno'].' '.$row['amaterno']);

    $html .='
    <table style="width: 100%; margin: 0 auto;" class="table table-striped table-bordered" cellspacing="0" bgcolor="#5F6D6B">
      <thead class="thead-dark">
          <tr>
            <th style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; margin-top: 40px;"><font size=5><b style="text-align:center; color:white;">DETALLE DEL REGISTRO DE LA ACTIVIDAD</b></font></th>
          </tr>
        </thead>
      </table>
      <br>
    ';

    $html .='
    <table style="width: 100%; margin: 0 auto;" class="table table-striped table-bordered" cellspacing="0" bgcolor="#5F6D6B">
        <thead class="thead-dark">
            <tr>
              <th style="width: 30%; border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">SUBDIRECCIÓN: </b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:left; color:black;"><font size=3>'.$fsubdir['subdireccion'].'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">ACTIVIDAD:</b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=3>'.$facttraer['nombre'].'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">FUNCIÓN:</b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:left; color:black;"><font size=3>'.$ftraeractividad['funcion'].'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">CLASIFICACIÓN:</b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:left; color:black;"><font size=3>'.$ftraeractividad['clasificacion'].'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">FECHA:</b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:left; color:black;"><font size=3>'.$date.'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">CANTIDAD:</b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:left; color:black;"><font size=3>'.$ftraeractividad['cantidad'].'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">UNIDAD DE MEDIDA:</b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:left; color:black;"><font size=3>'.$ftraeractividad['unidad_medida'].'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">EVIDENCIA:</b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:left; color:black;"><font size=3>'.$ftraeractividad['evidencia_interna'].'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">NÚMERO DE EVIDENCIA:</b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:left; color:black;"><font size=3>'.$ftraeractividad['id_evidencia'].'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">FOLIO EXPEDIENTE:</b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:left; color:black;"><font size=3>'.$ftraeractividad['folio_expediente'].'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">ID SUJETO:</b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:left; color:black;"><font size=3>'.$ftraeractividad['id_sujeto'].'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">REPORTE EN METAS:</b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:left; color:black;"><font size=3>'.$ftraeractividad['reporte_metas'].'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">INFORME ANUAL:</b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:left; color:black;"><font size=3>'.$ftraeractividad['informe_anual'].'</p></font></th>
            </tr>';
            
            $html .='<tr>
              <th style="border: 1px solid #A19E9F; text-align:right; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">OBSERVACIONES:</b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:left; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=3>'.$ftraeractividad['observaciones'].'</p></font></th>
            </tr>
            </thead>
        </table>';
            
            $html .='<table width="100%">
            <tr>
            <td width="50%" style="font-family: gothambook" align="right"><span align="center"></span>
            </td>
            <td width="50%" style="font-size: .85em; font-family: gothambook" align="right"><span align="center">Fecha y Hora: '.$today.'</span>
            </td>
            </tr>
            </table>';
            $html .='<table width="100%">
            <tr>
            <td width="50%" style="font-family: gothambook" align="right"><span align="center"></span>
            </td>
            <td width="50%" style="font-size: .85em; font-family: gothambook" align="right"><span align="center">Servidor Público: '.$name_user.'</span>
            </td>
            </tr>
            </table>';
$mpdf->WriteHtml($html);
$mpdf->Output('REACT_reporte_actividad.pdf', 'I');





?>
