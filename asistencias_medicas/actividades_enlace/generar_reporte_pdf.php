<?php
// error_reporting(0);
$tipo_consulta = strtoupper($_POST['tipo_consulta']);
$usuario = strtoupper($_POST['usuario']);
$actividad = $_POST['nombre_actividad'];
$fecha_inicio = date("Y-m-d", strtotime($_POST['fecha_inicio']));
$fecha_fin  = date("Y-m-d", strtotime($_POST['fecha_fin']));

$fecha1 = date("d-m-Y", strtotime($_POST['fecha_inicio']));
$fecha2  = date("d-m-Y", strtotime($_POST['fecha_fin']));

// echo $tipo_consulta;
// echo $usuario;
// echo $actividad;
// echo $fecha_inicio;
// echo $fecha_fin;

require_once '../../mpdf/vendor/autoload.php';
include("../conexion.php");

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
            <td width="10%"><img  src="../../image/gobierno2.jpg" width="120" height="130"></td>
            <td  width="80%" style="font-family: gothambook;" align="center"><span align="center">Unidad de Protección de Sujetos Que Intervienen en el Procedimiento Penal o de Extinción de Dominio </span>
            </td>
            <td width="10%" style="text-align: right;"><img  src="../../image/FGJEM.jpg" width="60" height="60"></td>
        </tr>
    </table>
    
    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook;" align="center"><span align="center">Subdirección de Enlace Interinstitucional</span>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook" align="center"><span align="center">REPORTE DE ACTIVIDADES</span>
            </td>
        </tr>
    </table>
    ');






if ($tipo_consulta === 'GLOBAL'){


$html .='
<br><br><br><br>

<div>
    <table width="100%" style="border-spacing: 0;">
        </thead>
            <tr>
                <td width="5%" bgcolor="#A19E9F" style="border: 1px solid black; padding: 10px; text-align: center;">
                <b>#</b>
                </td>

                <td width="50%" bgcolor="#A19E9F" style="border: 1px solid black; padding: 10px; text-align: center;">
                <b>Actividad</b>
                </td>

                <td width="25%" bgcolor="#A19E9F" style="border: 1px solid black; padding: 15px; text-align: center;">
                <b>Unidad de medida</b>
                </td>

                <td width="20%" bgcolor="#A19E9F" style="border: 1px solid black; padding:  15Px; text-align: center;">
                <b>Cantidad</b>
                </td>
            </tr>
        </thead>
';


$sql = "SELECT SUM(cantidad) AS total, react_actividad_enlace.nombre, react_actividad.unidad_medida

FROM react_actividad 

JOIN react_actividad_enlace 
ON react_actividad.id_actividad = react_actividad_enlace.id
AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'

JOIN react_subdireccion 
ON react_actividad.id_subdireccion = react_subdireccion.id

GROUP BY idactividad

ORDER BY react_actividad_enlace.nombre ASC";

$res_sql = $mysqli -> query ($sql);


                $i=1;
                while ($row_sql = $res_sql ->fetch_assoc()){
                $html .='
                <tr>
                        <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                        .$i.
                        '</td>

                            <td width="50%" style="border: 1px solid black; padding: 2px; text-align: left;">'
                            .$row_sql['nombre'].
                        '</td>';


                $html .='<td width="25%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql['unidad_medida'].
                        '</td>

                            <td width="20%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql['total'].
                        '</td>';



if ($row_sql['nombre'] === 'Realizar diligencias administrativas'){

                $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_enlace.nombre, react_actividad.unidad_medida, react_actividad.clasificacion

                FROM react_actividad 

                JOIN react_actividad_enlace 
                ON react_actividad.id_actividad = react_actividad_enlace.id 
                AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                AND react_actividad_enlace.nombre = 'Realizar diligencias administrativas'


                JOIN react_subdireccion 
                ON react_actividad.id_subdireccion = react_subdireccion.id

                GROUP BY react_actividad.clasificacion

                ORDER BY react_actividad.clasificacion ASC");

                $res_sql2 = $mysqli -> query ($sql2);
                $j=1;
                while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                $html .='<tr>
                        <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                        .$i.'.'.$j.
                        '</td>

                            <td width="50%" style="border: 1px solid black; padding: 2px; text-align: right;">'
                            .$row_sql2['clasificacion'].
                        '</td>

                            <td width="25%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql2['unidad_medida'].
                        '</td>

                            <td width="20%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql2['total'].
                        '</td></tr>';
                        
                $j++;
                }

            }



                $html .='</tr>';
                $i++;
                }

            $html .='   
    </table>
</div>
';

$html .='
<br>
<br>
<table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook;" align="left"><span align="left">Tipo de consulta: '.$tipo_consulta.'</span>
        </tr>
    </table>
    
    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook" align="left"><span align="left">Fecha de iinicio: '.$fecha_inicio.'</span>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook" align="left"><span align="left">Fecha termino: '.$fecha_fin.'</span>
            </td>
        </tr>
    </table>
';


$mpdf->WriteHtml($html);
$mpdf->Output('REACT_REPORTE_'.$tipo_consulta.'_'.$usuario.'_'.$fecha1.'_al_'.$fecha2.'.pdf', 'I'); 

}








else if ($tipo_consulta === 'POR USUARIO' && $actividad === 'Todas'){


$html .='
<br><br><br><br>

<div>
    <table width="100%" style="border-spacing: 0;">
        </thead>
            <tr>
                <td width="5%" bgcolor="#A19E9F" style="border: 1px solid black; padding: 10px; text-align: center;">
                <b>#</b>
                </td>

                <td width="50%" bgcolor="#A19E9F" style="border: 1px solid black; padding: 10px; text-align: center;">
                <b>Actividad</b>
                </td>

                <td width="25%" bgcolor="#A19E9F" style="border: 1px solid black; padding: 15px; text-align: center;">
                <b>Unidad de medida</b>
                </td>

                <td width="20%" bgcolor="#A19E9F" style="border: 1px solid black; padding:  15Px; text-align: center;">
                <b>Cantidad</b>
                </td>
            </tr>
        </thead>
';



$sql = "SELECT SUM(cantidad) AS total, react_actividad_enlace.nombre, react_actividad.unidad_medida, react_actividad.usuario

FROM react_actividad 

JOIN react_actividad_enlace 
ON react_actividad.id_actividad = react_actividad_enlace.id
AND react_actividad.usuario = '$usuario'
AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'

JOIN react_subdireccion 
ON react_actividad.id_subdireccion = react_subdireccion.id

GROUP BY idactividad

ORDER BY react_actividad_enlace.nombre ASC";

$res_sql = $mysqli -> query ($sql);


                $i=1;
                while ($row_sql = $res_sql ->fetch_assoc()){
                $html .='
                <tr>
                        <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                        .$i.
                        '</td>

                            <td width="50%" style="border: 1px solid black; padding: 2px; text-align: left;">'
                            .$row_sql['nombre'].
                        '</td>';


                $html .='<td width="25%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql['unidad_medida'].
                        '</td>

                            <td width="20%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql['total'].
                        '</td>';




if ($row_sql['nombre'] === 'Realizar diligencias administrativas'){

                $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_enlace.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_actividad.usuario

                FROM react_actividad 

                JOIN react_actividad_enlace 
                ON react_actividad.id_actividad = react_actividad_enlace.id 
                AND react_actividad.usuario = '$usuario'
                AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                AND react_actividad_enlace.nombre = 'Realizar diligencias administrativas'


                JOIN react_subdireccion 
                ON react_actividad.id_subdireccion = react_subdireccion.id

                GROUP BY react_actividad.clasificacion

                ORDER BY react_actividad.clasificacion ASC");

                $res_sql2 = $mysqli -> query ($sql2);
                $j=1;
                while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                $html .='<tr>
                        <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                        .$i.'.'.$j.
                        '</td>

                            <td width="50%" style="border: 1px solid black; padding: 2px; text-align: right;">'
                            .$row_sql2['clasificacion'].
                        '</td>

                            <td width="25%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql2['unidad_medida'].
                        '</td>

                            <td width="20%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql2['total'].
                        '</td></tr>';
                        
                $j++;
                }

            }



                $html .='</tr>';
                $i++;
                }

            $html .='   
    </table>
</div>
';


$html .='
<br>
<br>
<table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook;" align="left"><span align="left">Tipo de consulta: '.$tipo_consulta.'</span>
        </tr>
    </table>
    
    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook;" align="left"><span align="left">Usuario: '.$usuario.'</span>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook" align="left"><span align="left">Actividad: '.$actividad.'</span>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook" align="left"><span align="left">Fecha de iinicio: '.$fecha_inicio.'</span>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook" align="left"><span align="left">Fecha termino: '.$fecha_fin.'</span>
            </td>
        </tr>
    </table>
';


$mpdf->WriteHtml($html);
$mpdf->Output('REACT_REPORTE_'.$tipo_consulta.'_'.$usuario.'_'.$fecha1.'_al_'.$fecha2.'.pdf', 'I'); 
}








else {



$html .='
<br><br><br><br>

<div>
    <table width="100%" style="border-spacing: 0;">
        </thead>
            <tr>
                <td width="5%" bgcolor="#A19E9F" style="border: 1px solid black; padding: 10px; text-align: center;">
                <b>#</b>
                </td>

                <td width="50%" bgcolor="#A19E9F" style="border: 1px solid black; padding: 10px; text-align: center;">
                <b>Actividad</b>
                </td>

                <td width="25%" bgcolor="#A19E9F" style="border: 1px solid black; padding: 15px; text-align: center;">
                <b>Unidad de medida</b>
                </td>

                <td width="20%" bgcolor="#A19E9F" style="border: 1px solid black; padding:  15Px; text-align: center;">
                <b>Cantidad</b>
                </td>
            </tr>
        </thead>
';


$sql = "SELECT SUM(cantidad) AS total, react_actividad_enlace.nombre, react_actividad.unidad_medida, react_actividad.usuario

FROM react_actividad 

JOIN react_actividad_enlace 
ON react_actividad.id_actividad = react_actividad_enlace.id
AND react_actividad.usuario = '$usuario'
AND react_actividad.id_actividad = '$actividad'
AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'

JOIN react_subdireccion 
ON react_actividad.id_subdireccion = react_subdireccion.id

GROUP BY idactividad

ORDER BY react_actividad_enlace.nombre ASC";

$res_sql = $mysqli -> query ($sql);


                $i=1;
                while ($row_sql = $res_sql ->fetch_assoc()){
                $html .='
                <tr>
                        <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                        .$i.
                        '</td>

                            <td width="50%" style="border: 1px solid black; padding: 2px; text-align: left;">'
                            .$row_sql['nombre'].
                        '</td>';


                $html .='<td width="25%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql['unidad_medida'].
                        '</td>

                            <td width="20%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql['total'].
                        '</td>';



if ($row_sql['nombre'] === 'Realizar diligencias administrativas'){

                $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_enlace.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_actividad.usuario

                FROM react_actividad 

                JOIN react_actividad_enlace 
                ON react_actividad.id_actividad = react_actividad_enlace.id
                AND react_actividad.usuario = '$usuario'
                AND react_actividad.id_actividad = '$actividad'
                AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                AND react_actividad_enlace.nombre = 'Realizar diligencias administrativas'


                JOIN react_subdireccion 
                ON react_actividad.id_subdireccion = react_subdireccion.id

                GROUP BY react_actividad.clasificacion

                ORDER BY react_actividad.clasificacion ASC");

                $res_sql2 = $mysqli -> query ($sql2);
                $j=1;
                while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                $html .='<tr>
                        <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                        .$i.'.'.$j.
                        '</td>

                            <td width="50%" style="border: 1px solid black; padding: 2px; text-align: right;">'
                            .$row_sql2['clasificacion'].
                        '</td>

                            <td width="25%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql2['unidad_medida'].
                        '</td>

                            <td width="20%" style="border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql2['total'].
                        '</td></tr>';
                        
                $j++;
                }

            }



                $html .='</tr>';
                $i++;
                }

            $html .='   
    </table>
</div>
';

$html .='
<br>
<br>
<table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook;" align="left"><span align="left">Tipo de consulta: '.$tipo_consulta.'</span>
        </tr>
    </table>
    
    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook;" align="left"><span align="left">Usuario: '.$usuario.'</span>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook" align="left"><span align="left">Actividad: '.$actividad.'</span>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook" align="left"><span align="left">Fecha de iinicio: '.$fecha_inicio.'</span>
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook" align="left"><span align="left">Fecha termino: '.$fecha_fin.'</span>
            </td>
        </tr>
    </table>
';


$mpdf->WriteHtml($html);
$mpdf->Output('REACT_REPORTE_'.$tipo_consulta.'_'.$usuario.'_'.$fecha1.'_al_'.$fecha2.'.pdf', 'I'); 

}



?>
