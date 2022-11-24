<?php

require_once __DIR__ . '/vendor/autoload.php';
// Grab variables

setlocale(LC_TIME, "spanish");
$newDate = date("d-m-Y", strtotime('2022/10/3'));
$miFecha = $newDate;
function fechaEs($fecha) {
  $fecha = substr($fecha, 0, 10);
  $numeroDia = date('d', strtotime($fecha));
  $dia = date('l', strtotime($fecha));
  $mes = date('F', strtotime($fecha));
  $anio = date('Y', strtotime($fecha));
  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
  $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  return $nombreMes."  ".$numeroDia." del ".$anio;
}



$mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => [210, 297],
        'orientation' => 'P',
        'setAutoTopMargin' => 'stretch',
        'autoMarginPadding' => 0,
        'bleedMargin' => 0,
        'crossMarkMargin' => 0,
        'cropMarkMargin' => 0,
        'nonPrintMargin' => 0,
        'margBuffer' => 0,
        'collapseBlockMargins' => false,
    ]);

$mpdf->setAutoTopMargin = 'stretch';
$mpdf->setAutoBottomMargin = 'stretch';
$mpdf->autoScriptToLang = true;
$mpdf->autoLangToFont = true;

$mpdf->SetHTMLHeader('<table width="100%">
<tr>
<td width="10%"><img  src="../image/ESCUDO.jpg" width="70" height="70"></td>
<td width="80%" style="font-family: gothambook" align="center"><br /><br /><br /><BR /><h5 align="center">“2022. AÑO DEL QUINCENTENARIO DE TOLUCA, CAPITAL DEL ESTADO DE MÉXICO” </h5></td>
<td width="10%" style="text-align: right;"><img  src="../image/FGJEM.jpg" width="70" height="70"></td>
</tr>
</table>');
$mpdf->SetHTMLFooter('
<div>
<p align="right">
<span style="font-size: .55em; align:center;width:10px"><font style="font-family: gothambook">
FISCALÍA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO
</font></span><br />
<span style="font-size: .55em; align:center;width:10px"><font style="font-family: gothambook">
UNIDAD DE PROTECCIÓN DE SUJETOS QUE INTERVIENEN EN UN PROCEDMIENTO PENAL O DE EXTINCIÓN DE DOMINIO
</font></span><br />
<span style="font-size: .55em; align:center;width:10px"><font style="font-family: gothambook">
SUBDIRECCIÓN DE APOYO TÉCNICO Y JURÍDICO
</font></span>
<table width="100%">
<tr>
<td width="33%" align="center" bgcolor="#A19E9F" style="height:8vh;"><h3 class=""></h3></td>
</tr>
</table>
<p align="center">
<span style="font-size: .55em; align:center;width:10px">MANUEL MA. CONTRERAS N° 201 COL. VÉRTICE, TOLUCA, ESTADO DE MÉXICO, C.P. 50090,
TELS. 722 226 16 00, EXT. 3215
</span>
</p>
<p align="center">
<span style="font-size: .55em;">Pagina {PAGENO} de {nb}</span>
</p>
</p>
</div>
');
$data = "";

$data .= '<table width="100%">
<tr>
<td width="33%" align="center" bgcolor="#A19E9F" style="height:30vh;"><h3 class=""><font color ="#FFFFFF" style="font-family: gothambook">VALORACIÓN JURÍDICA DE LA SOLICITUD DE INGRESO AL PROGRAMA</font></h3></td>
</tr>
</table>';
$data .= '<table width="100%" >
<tr >
<td width="25%"></td>
<td width="25%" align="center" ></td>
<td width="50%" style="text-align: center; height:35vh;" bgcolor="#A19E9F"><font color ="#FFFFFF" style="font-family: gothambook"><h4>UPSIPPED/SAR/TOL-TOL/001/2021</h4></font></td>
</tr>
</table>';
$data .='<p align="right">
<span style="align:center;width:200px"><font style="font-family: gothambook">
Toluca de Lerdo, Estado de México,
</font></span><br />
<span style="align:center;width:200px"><font style="font-family: gothambook">
'.fechaEs($miFecha).'.</font></span>
</p>';

$data .='<h3 style="font-family: gothambook" align="center">DATOS GENERALES DEL EXPEDIENTE</h3>';

$data .='<table class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
  <thead>
    <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">OFICIO DE SOLICITUD</font></th>
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">FECHA DE SOLICITUD</font></th>
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">ZONA GEOGRÁFICA</font></th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
    </tr>
  </tbody>
</table><BR />';

$data .='<table class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
  <thead>
    <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
      <th width="33%" style="border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">DELITO</font></th>
      <th width="33%" style="border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">CARPETA DE INVESTIGACION Y/O CAUSA PENAL</font></th>
      <th width="33%" style="border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">ETAPA DE PROCEDMIENTO PENAL</font></th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
    </tr>
  </tbody>
</table><br><br />';

$data .='<h3 style="font-family: gothambook" align="center">DATOS DE LA PERSONA PROPUESTA</h3>';
$data .='<table class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
  <thead>
    <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">INICIALES</font></th>
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">TIPO DE INTERVENCION</font></th>
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">¿PRIVADO DE LA LIBERTAD?</font></th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
    </tr>
  </tbody>
</table>';

$data .='<table class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
  <thead>
    <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">UBICACION DE LA PERSONA</font></th>
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">¿ASISTENCIA LEGAL?</font></th>
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">NOMBRE DE LA PERSONA QUE LO ASISTE</font></th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
    </tr>
  </tbody>
</table><br />';

$data .='<table class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
  <thead>
    <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
      <th width="50%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">SITUACION DE RIESGO</font></th>
      <th width="50%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">CAUSA DE VULNERABILIDAD</font></th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td width="50%" style="word-break: break-all; height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td width="50%" style="word-break: break-all; height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
    </tr>
  </tbody>
</table><br />';
// word-break: break-all; --- estilo para que la fila de la tabla mantenga su pocision sin importar el tamaño del texto
// for ($i=0; $i < 4 ; $i++) {
//   $data .='<table class="table table-dark" id="estatusexpediente" border="0.2px" cellspacing="0" width="100%" bordered>
//     <thead>
//       <tr style="border: 0.5px solid black;" bgcolor = "#A19E9F">
//         <th width="50%" style="border: 0.2px solid black; text-align:center">SITUACION DE RIESGO</th>
//         <th width="50%" style="border: 0.2px solid black; text-align:center">CAUSA DE VULNERABILIDAD</th>
//       </tr>
//     </thead>
//     <tbody>
//       <tr >
//         <td style="border: 0.2px solid black; text-align:center">
//         df
//         </td>
//         <td style="border: 0.2px solid black; text-align:center">
//         sdf
//         </td>
//       </tr>
//     </tbody>
//   </table><BR />';
// }

$data .='<table class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
  <thead>
    <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
      <th width="50%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">¿PRESENTA ALGUNA ENFERMEDAD?</font></th>
      <th width="50%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">¿PRESENTA ALGUNA DISCAPACIDAD?</font></th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
    </tr>
  </tbody>
</table>';
$data .='<table class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
  <thead>
    <tr style="border: 1px solid black;" >
      <th width="2%" style="height:40vh; border: 1px solid black; text-align:center" bgcolor = "#A19E9F"><font color ="#FFFFFF" style="font-family: gothambook">TIPO:</font></th>
      <th width="48%" style="height:40vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </th>
      <th width="2%" style="height:40vh; border: 1px solid black; text-align:center" bgcolor = "#A19E9F"><font color ="#FFFFFF" style="font-family: gothambook">TIPO:</font></th>
      <th width="48%" style="height:40vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </th>
    </tr>
  </thead>
</table><br>';

$data .='<table class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
  <thead>
    <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
      <th style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">NECESIDAD DEL PORQUE LLEVAR SU TESTIMONIO A JUICIO</font></th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
    </tr>
  </tbody>
</table>';

$data .='<table class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="105%" bordered>
  <thead>
    <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
      <th style="height:40vh; border: 1px solid black;"><font color ="#FFFFFF" style="font-family: gothambook">MEDIDAS SOLICITADAS POR EL AGENTE DEL MINISTERIO PUBLICO DE LA INVESTIGACION</font></th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
    </tr>
  </tbody>
</table>';

$data .='<br><br><h3 style="font-family: gothambook" align="center">DATOS DEL SOLICITANTE</h3>';

$data .='<table class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
  <thead>
    <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
      <th width="50%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">AGENTE DEL MINISTERIO PUBLICO</font></th>
      <th width="50%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">ORGANO JURISDICCIONAL</font></th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
    </tr>
  </tbody>
</table><br>';

$data .='<table class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
  <thead>
    <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">NOMBRE</font></th>
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">CARGO</font></th>
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">ADSCRIPCION</font></th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
    </tr>
  </tbody>
</table>';

$data .='<table class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
  <thead>
    <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">TEL. OFICINA</font></th>
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">CELULAR</font></th>
      <th width="33%" style="height:40vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">CORREO ELECTRONICO</font></th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
      <td style="height:50vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </td>
    </tr>
  </tbody>
</table>';

$data .='<br><br><br><h3 style="font-family: gothambook" align="center">VALORACION JURIDICA</h3>';

$data .='<table class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
  <thead>
    <tr style="border: 1px solid black;" >
      <th width="25%" style="height:40vh; border: 1px solid black; text-align:center" bgcolor = "#A19E9F"><font color ="#FFFFFF" style="font-family: gothambook">PROCEDENTE</font></th>
      <th width="25%" style="height:40vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </th>
      <th width="25%" style="height:40vh; border: 1px solid black; text-align:center" bgcolor = "#A19E9F"><font color ="#FFFFFF" style="font-family: gothambook">NO PROCEDENTE</font></th>
      <th width="25%" style="height:40vh; border: 1px solid black; text-align:center">
      <font style="font-family: gothambook">
      // aqui va la variable que se trae desde el front-end
      </font>
      </th>
    </tr>
  </thead>
</table><br>';

$data .='<h3 style="font-family: gothambook" align="center">ACUERDO</h3>';

$data .='<p align="justify">
<span style="font-size: 1em;"><font style="font-family: gothambook">
Una vez que se realizó el análisis de la solicitud de incorporación al Programa de Protección a Sujetos que Intervienen en el Procedimiento Penal o de Extinción de Dominio, de las Personas Propuestas de identidad reservada de iniciales XXX y XXX, se determinó que cumple con los requisitos de ley, por lo que se dio inicio al Expediente de Protección registrado bajo el número UPSSIPPED/XXX/XXX/XXX/20XX; y al no existir impedimento legal alguno, se remite solicitud de la incorporación y el inicio del expediente de protección correspondiente, así como, la valoración jurídica a la Subdirección de Análisis de Riesgo, para que gire las instrucciones respectivas, a efecto, de que se realicen los Estudios multidisciplinarios correspondientes; lo anterior, con fundamento en los artículos XXX Constitución Política de los Estados Unidos Mexicanos; XXX del Código Nacional de Procedimientos Penales; XXXX de la Ley para la Protección de Sujetos que Intervienen en el Procedimiento Penal o de Extinción de Dominio del Estado de México y demás relativos aplicables.
</font></span>
</p>';
$data .='<div>

    <div style="float: left; width: 60%;">
    <p align="center">
    <span style="align:center;width:200px">____________________________________________________</span><br />
    <span style="align:center;width:200px"><font style="font-family: gothambook">
    LIC. XXXXXXXX
    </font></span><br />
    <span style="align:center;width:200px"><font style="font-family: gothambook">
    AGENTE DEL MINISTERIO PUBLICO
    </font></span><br />
    </p>
    <p align="center">
    <span style="align:center;width:200px">____________________________________________________</span><br />
    <span style="align:center;width:200px"><font style="font-family: gothambook">
    V.°B.°
    </font></span><br />
    <span style="align:center;width:200px"><font style="font-family: gothambook">
    LIC. XXXXXXXX
    </font></span><br />
    <span style="align:center;width:200px"><font style="font-family: gothambook">
    ADSCRITO A LA SUBDIRECCION DE APOYO TECNICO Y JURIDICO
    </font></span><br />
    </p>
    </div>

    <div style="float: right; width: 40%;"><BR /><BR /><BR />

    <table align="right" class="table table-dark" id="estatusexpediente" border="1px" cellspacing="0" width="70%" bordered>
      <thead>
        <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
          <th style="height:20vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">SEDE</font></th>
        </tr>
      </thead>
      <tbody>
        <tr >
          <td style="height:30vh; border: 1px solid black; text-align:center">
          <font style="font-family: gothambook">
          TOLUCA
          </font>
          </td>
        </tr>
      </tbody>
    </table>

    </div>
</div>';

$mpdf->WriteHtml($data);
$mpdf->output("myfile.pdf",'D');


?>
