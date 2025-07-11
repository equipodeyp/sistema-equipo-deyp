<?php
// error_reporting(0);

require_once '../mpdf/vendor/autoload.php';
include("./conexion.php");
date_default_timezone_set("America/Mexico_City");
$tipo_consulta = strtoupper($_POST['tipo_consulta']);
$usuario = $_POST['usuario'];
$actividad = $_POST['nombre_actividad'];
$fecha_inicio = date("Y-m-d", strtotime($_POST['fecha_inicio']));
$fecha_fin  = date("Y-m-d", strtotime($_POST['fecha_fin']));

$fecha1 = date("d-m-Y", strtotime($_POST['fecha_inicio']));
$fecha2  = date("d-m-Y", strtotime($_POST['fecha_fin']));

$today = date("d-m-Y H:i:sa");
// $today = date("Y-m-d H:i:s"); 


// echo $tipo_consulta;
// echo $usuario;
// echo $actividad;
// echo $fecha_inicio;
// echo $fecha_fin;
// echo $name_actividad;

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
    
    <table width="100%">
        <tr>
            <td width="100%" style="font-family: gothambook;" align="center"><span align="center">Subdirección de Análisis de Riesgo<br>REPORTE DE ACTIVIDADES</span>
            </td>
        </tr>
    </table>


    <table width="100%">
        <tr>
            <td width="50%" style="font-family: gothambook" align="center"><span align="center"></span>
            </td>
            <td width="50%" style="font-size: .55em; font-family: gothambook" align="right"><span align="center">Fecha y Hora: '.$today.'</span>
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
    <span style="font-size: 1.5em;">1/1</span>
    </p>
    </font></span></h3>
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
                    <td width="5%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 10px; text-align: center;">
                    <b>#</b>
                    </td>

                    <td width="50%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 10px; text-align: center;">
                    <b>Actividad</b>
                    </td>

                    <td width="25%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 15px; text-align: center;">
                    <b>Unidad de medida</b>
                    </td>

                    <td width="20%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding:  15Px; text-align: center;">
                    <b>Cantidad</b>
                    </td>
                </tr>
            </thead>
    ';


    $sql = "SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_subdireccion.subdireccion

    FROM react_actividad 

    JOIN react_actividad_analisis 
    ON react_actividad.id_actividad = react_actividad_analisis.id
    AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'

    JOIN react_subdireccion 
    ON react_actividad.id_subdireccion = react_subdireccion.id
    AND react_subdireccion.subdireccion = 'SUBDIRECCIÓN DE ANÁLISIS DE RIESGO' 

    GROUP BY idactividad

    ORDER BY react_actividad_analisis.nombre ASC";

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

                        <td width="20%" style="text-decoration: underline; font-weight: bold; border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql['total'].
                        '</td>';



                if ($row_sql['nombre'] === 'Realizar diligencias administrativas'){

                    $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_subdireccion.subdireccion

                    FROM react_actividad 

                    JOIN react_actividad_analisis 
                    ON react_actividad.id_actividad = react_actividad_analisis.id 
                    AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                    AND react_actividad_analisis.nombre = 'Realizar diligencias administrativas'


                    JOIN react_subdireccion 
                    ON react_actividad.id_subdireccion = react_subdireccion.id
                    AND react_subdireccion.subdireccion = 'SUBDIRECCIÓN DE ANÁLISIS DE RIESGO'
                    GROUP BY react_actividad.clasificacion

                    ORDER BY react_actividad.clasificacion ASC");

                    $res_sql2 = $mysqli -> query ($sql2);
                    $j=1;
                        while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                        $html .='<tr>
                                <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                .$i.'.'.$j.
                                '</td>

                                    <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                    .$row_sql2['clasificacion'].
                                '</td>

                                    <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                    .$row_sql2['unidad_medida'].
                                '</td>

                                    <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                    .$row_sql2['total'].
                                '</td></tr>';
                                
                        $j++;
                        }

                }


                if ($row_sql['nombre'] === 'Integrar evaluaciones periódicas para determinar el estatus de los sujetos protegidos'){

                    $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_subdireccion.subdireccion

                    FROM react_actividad 

                    JOIN react_actividad_analisis 
                    ON react_actividad.id_actividad = react_actividad_analisis.id 
                    AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                    AND react_actividad_analisis.nombre = 'Integrar evaluaciones periódicas para determinar el estatus de los sujetos protegidos'


                    JOIN react_subdireccion 
                    ON react_actividad.id_subdireccion = react_subdireccion.id
                    AND react_subdireccion.subdireccion = 'SUBDIRECCIÓN DE ANÁLISIS DE RIESGO'
                    GROUP BY react_actividad.clasificacion

                    ORDER BY react_actividad.clasificacion ASC");

                    $res_sql2 = $mysqli -> query ($sql2);
                    $j=1;
                        while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                        $html .='<tr>
                                <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                .$i.'.'.$j.
                                '</td>

                                    <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                    .$row_sql2['clasificacion'].
                                '</td>

                                    <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                    .$row_sql2['unidad_medida'].
                                '</td>

                                    <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                    .$row_sql2['total'].
                                '</td></tr>';
                                
                        $j++;
                        }

                }



                if ($row_sql['nombre'] === 'Otorgar asesoría jurídica a las PP y SJ acerca del Programa'){

                    $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_subdireccion.subdireccion

                    FROM react_actividad 

                    JOIN react_actividad_analisis 
                    ON react_actividad.id_actividad = react_actividad_analisis.id 
                    AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                    AND react_actividad_analisis.nombre = 'Otorgar asesoría jurídica a las PP y SJ acerca del Programa'


                    JOIN react_subdireccion 
                    ON react_actividad.id_subdireccion = react_subdireccion.id
                    AND react_subdireccion.subdireccion = 'SUBDIRECCIÓN DE ANÁLISIS DE RIESGO'
                    GROUP BY react_actividad.clasificacion

                    ORDER BY react_actividad.clasificacion ASC");

                    $res_sql2 = $mysqli -> query ($sql2);
                    $j=1;
                        while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                        $html .='<tr>
                                <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                .$i.'.'.$j.
                                '</td>

                                    <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                    .$row_sql2['clasificacion'].
                                '</td>

                                    <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                    .$row_sql2['unidad_medida'].
                                '</td>

                                    <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                    .$row_sql2['total'].
                                '</td></tr>';
                                
                        $j++;
                        }

                }




                if ($row_sql['nombre'] === 'Ofrecer ayuda a las PP y SP para recibir servicios de educación, salud, capacitación laboral y trabajo'){

                    $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_subdireccion.subdireccion

                    FROM react_actividad 

                    JOIN react_actividad_analisis 
                    ON react_actividad.id_actividad = react_actividad_analisis.id 
                    AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                    AND react_actividad_analisis.nombre = 'Ofrecer ayuda a las PP y SP para recibir servicios de educación, salud, capacitación laboral y trabajo'


                    JOIN react_subdireccion 
                    ON react_actividad.id_subdireccion = react_subdireccion.id
                    AND react_subdireccion.subdireccion = 'SUBDIRECCIÓN DE ANÁLISIS DE RIESGO'
                    GROUP BY react_actividad.clasificacion

                    ORDER BY react_actividad.clasificacion ASC");

                    $res_sql2 = $mysqli -> query ($sql2);
                    $j=1;
                        while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                        $html .='<tr>
                                <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                .$i.'.'.$j.
                                '</td>

                                    <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                    .$row_sql2['clasificacion'].
                                '</td>

                                    <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                    .$row_sql2['unidad_medida'].
                                '</td>

                                    <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                    .$row_sql2['total'].
                                '</td></tr>';
                                
                        $j++;
                        }

                }




                if ($row_sql['nombre'] === 'Otorgar cualquier otra medida de asistencia'){

                    $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_subdireccion.subdireccion

                    FROM react_actividad 

                    JOIN react_actividad_analisis 
                    ON react_actividad.id_actividad = react_actividad_analisis.id 
                    AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                    AND react_actividad_analisis.nombre = 'Otorgar cualquier otra medida de asistencia'


                    JOIN react_subdireccion 
                    ON react_actividad.id_subdireccion = react_subdireccion.id
                    AND react_subdireccion.subdireccion = 'SUBDIRECCIÓN DE ANÁLISIS DE RIESGO'
                    GROUP BY react_actividad.clasificacion

                    ORDER BY react_actividad.clasificacion ASC");

                    $res_sql2 = $mysqli -> query ($sql2);
                    $j=1;
                        while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                        $html .='<tr>
                                <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                .$i.'.'.$j.
                                '</td>

                                    <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                    .$row_sql2['clasificacion'].
                                '</td>

                                    <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                    .$row_sql2['unidad_medida'].
                                '</td>

                                    <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                    .$row_sql2['total'].
                                '</td></tr>';
                                
                        $j++;
                        }

                }



                $html .='</tr>';
                $i++;
            }

            $sql_total = "SELECT SUM(cantidad) as total 
            FROM react_actividad 
            WHERE react_actividad.fecha >= '$fecha_inicio' 
            AND react_actividad.fecha <= '$fecha_fin' AND react_actividad.id_subdireccion = '1'";
            
            $result_total = $mysqli->query($sql_total);
            $row_total=$result_total->fetch_assoc();
            $t_activ = $row_total['total'];


            $html .=' 
                        <tfoot>
                            <tr>
                                <th scope="row" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 2px; text-align: right;" colspan="3">Total de actividades realizadas</th>
                                <td bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 2px; text-align: center;">'.$t_activ.'</td>
                            </tr>
                        </tfoot>

    </table>
</div>
';

$html .='<br><br>';

$html .='<table width="60%" style="border-spacing: 0;" bgcolor="#5F6D6B" align="left">
          <thead class="thead-dark">
            <tr>
              <th colspan="2" style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; margin-top: 40px;"><font size=4><b style="text-align:center; color:white;">INFORMACIÓN DE LA CONSULTA</b></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">TIPO DE CONSULTA: </b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$tipo_consulta.'</p></font></th>
            </tr>

            <tr>
              <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">FECHA DE INICIO: </b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$fecha1.'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">FECHA DE TÉRMINO: </b></font></th>
              <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$fecha2.'</p></font></th>
            </tr>
          </thead>
        </table>';

$mpdf->WriteHtml($html);
$mpdf->Output('REACT_REPORTE_'.$tipo_consulta.'_'.$usuario.'_'.$fecha1.'_al_'.$fecha2.'.pdf', 'I'); 

}


















else if ($tipo_consulta === 'POR USUARIO' && $actividad === 'Todas'){

    $sentencia="SELECT DISTINCT react_actividad.usuario, usuarios_servidorespublicos.nombre,  
    usuarios_servidorespublicos.apaterno,  usuarios_servidorespublicos.amaterno  

    FROM react_actividad 

    JOIN usuarios_servidorespublicos
    ON react_actividad.usuario = usuarios_servidorespublicos.usuario
    AND usuarios_servidorespublicos.usuario = '$usuario'


    ORDER BY usuarios_servidorespublicos.nombre ASC";

    $result = $mysqli->query($sentencia);
    $row=$result->fetch_assoc();
    $name_user = strtoupper($row['nombre'].' '.$row['apaterno'].' '.$row['amaterno']);




    $html .='
    <br><br><br><br>

    <div>
        <table width="100%" style="border-spacing: 0;">
            </thead>
                <tr>
                    <td width="5%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 10px; text-align: center;">
                    <b>#</b>
                    </td>

                    <td width="50%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 10px; text-align: center;">
                    <b>Actividad</b>
                    </td>

                    <td width="25%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 15px; text-align: center;">
                    <b>Unidad de medida</b>
                    </td>

                    <td width="20%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding:  15Px; text-align: center;">
                    <b>Cantidad</b>
                    </td>
                </tr>
            </thead>
    ';



    $sql = "SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, 
    react_actividad.usuario, react_subdireccion.subdireccion

    FROM react_actividad 

    JOIN react_actividad_analisis 
    ON react_actividad.id_actividad = react_actividad_analisis.id
    AND react_actividad.usuario = '$usuario'
    AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'

    JOIN react_subdireccion 
    ON react_actividad.id_subdireccion = react_subdireccion.id


    GROUP BY idactividad

    ORDER BY react_actividad_analisis.nombre ASC";

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

                            <td width="20%" style="text-decoration: underline; font-weight: bold; border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql['total'].
                        '</td>';




                if ($row_sql['nombre'] === 'Realizar diligencias administrativas'){

                                $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_actividad.usuario

                                FROM react_actividad 

                                JOIN react_actividad_analisis 
                                ON react_actividad.id_actividad = react_actividad_analisis.id 
                                AND react_actividad.usuario = '$usuario'
                                AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                                AND react_actividad_analisis.nombre = 'Realizar diligencias administrativas'


                                JOIN react_subdireccion 
                                ON react_actividad.id_subdireccion = react_subdireccion.id
                                

                                GROUP BY react_actividad.clasificacion

                                ORDER BY react_actividad.clasificacion ASC");

                                $res_sql2 = $mysqli -> query ($sql2);
                                $j=1;
                                while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                                $html .='<tr>
                                        <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                        .$i.'.'.$j.
                                        '</td>

                                            <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                            .$row_sql2['clasificacion'].
                                        '</td>

                                            <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['unidad_medida'].
                                        '</td>

                                            <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['total'].
                                        '</td></tr>';
                                        
                                $j++;
                                }

                }



                if ($row_sql['nombre'] === 'Integrar evaluaciones periódicas para determinar el estatus de los sujetos protegidos'){

                                $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_actividad.usuario

                                FROM react_actividad 

                                JOIN react_actividad_analisis 
                                ON react_actividad.id_actividad = react_actividad_analisis.id 
                                AND react_actividad.usuario = '$usuario'
                                AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                                AND react_actividad_analisis.nombre = 'Integrar evaluaciones periódicas para determinar el estatus de los sujetos protegidos'


                                JOIN react_subdireccion 
                                ON react_actividad.id_subdireccion = react_subdireccion.id
                                

                                GROUP BY react_actividad.clasificacion

                                ORDER BY react_actividad.clasificacion ASC");

                                $res_sql2 = $mysqli -> query ($sql2);
                                $j=1;
                                while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                                $html .='<tr>
                                        <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                        .$i.'.'.$j.
                                        '</td>

                                            <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                            .$row_sql2['clasificacion'].
                                        '</td>

                                            <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['unidad_medida'].
                                        '</td>

                                            <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['total'].
                                        '</td></tr>';
                                        
                                $j++;
                                }

                }



                if ($row_sql['nombre'] === 'Otorgar asesoría jurídica a las PP y SJ acerca del Programa'){

                                $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_actividad.usuario

                                FROM react_actividad 

                                JOIN react_actividad_analisis 
                                ON react_actividad.id_actividad = react_actividad_analisis.id 
                                AND react_actividad.usuario = '$usuario'
                                AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                                AND react_actividad_analisis.nombre = 'Otorgar asesoría jurídica a las PP y SJ acerca del Programa'


                                JOIN react_subdireccion 
                                ON react_actividad.id_subdireccion = react_subdireccion.id
                                

                                GROUP BY react_actividad.clasificacion

                                ORDER BY react_actividad.clasificacion ASC");

                                $res_sql2 = $mysqli -> query ($sql2);
                                $j=1;
                                while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                                $html .='<tr>
                                        <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                        .$i.'.'.$j.
                                        '</td>

                                            <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                            .$row_sql2['clasificacion'].
                                        '</td>

                                            <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['unidad_medida'].
                                        '</td>

                                            <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['total'].
                                        '</td></tr>';
                                        
                                $j++;
                                }

                }




                if ($row_sql['nombre'] === 'Ofrecer ayuda a las PP y SP para recibir servicios de educación, salud, capacitación laboral y trabajo'){

                                $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_actividad.usuario

                                FROM react_actividad 

                                JOIN react_actividad_analisis 
                                ON react_actividad.id_actividad = react_actividad_analisis.id 
                                AND react_actividad.usuario = '$usuario'
                                AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                                AND react_actividad_analisis.nombre = 'Ofrecer ayuda a las PP y SP para recibir servicios de educación, salud, capacitación laboral y trabajo'


                                JOIN react_subdireccion 
                                ON react_actividad.id_subdireccion = react_subdireccion.id
                                

                                GROUP BY react_actividad.clasificacion

                                ORDER BY react_actividad.clasificacion ASC");

                                $res_sql2 = $mysqli -> query ($sql2);
                                $j=1;
                                while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                                $html .='<tr>
                                        <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                        .$i.'.'.$j.
                                        '</td>

                                            <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                            .$row_sql2['clasificacion'].
                                        '</td>

                                            <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['unidad_medida'].
                                        '</td>

                                            <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['total'].
                                        '</td></tr>';
                                        
                                $j++;
                                }

                }



                if ($row_sql['nombre'] === 'Otorgar cualquier otra medida de asistencia'){

                                $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_actividad.usuario

                                FROM react_actividad 

                                JOIN react_actividad_analisis 
                                ON react_actividad.id_actividad = react_actividad_analisis.id 
                                AND react_actividad.usuario = '$usuario'
                                AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                                AND react_actividad_analisis.nombre = 'Otorgar cualquier otra medida de asistencia'


                                JOIN react_subdireccion 
                                ON react_actividad.id_subdireccion = react_subdireccion.id
                                

                                GROUP BY react_actividad.clasificacion

                                ORDER BY react_actividad.clasificacion ASC");

                                $res_sql2 = $mysqli -> query ($sql2);
                                $j=1;
                                while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                                $html .='<tr>
                                        <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                        .$i.'.'.$j.
                                        '</td>

                                            <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                            .$row_sql2['clasificacion'].
                                        '</td>

                                            <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['unidad_medida'].
                                        '</td>

                                            <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['total'].
                                        '</td></tr>';
                                        
                                $j++;
                                }

                }



                $html .='</tr>';
                $i++;
            }

            $sql_total = "SELECT SUM(cantidad) as total 
            FROM react_actividad 
            WHERE react_actividad.fecha >= '$fecha_inicio' 
            AND react_actividad.fecha <= '$fecha_fin'
            AND react_actividad.id_subdireccion = '1'
            AND react_actividad.usuario = '$usuario'";
            $result_total = $mysqli->query($sql_total);
            $row_total=$result_total->fetch_assoc();
            $t_activ = $row_total['total'];


            $html .=' 
                        <tfoot>
                            <tr>
                                <th scope="row" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 2px; text-align: right;" colspan="3">Total de actividades realizadas</th>
                                <td bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 2px; text-align: center;">'.$t_activ.'</td>
                            </tr>
                        </tfoot>   
    </table>
</div>
';


$html .='<br><br>';

    $html .='<table width="60%" style="border-spacing: 0;" bgcolor="#5F6D6B" align="left">
            <thead class="thead-dark">
                <tr>
                <th colspan="2" style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; margin-top: 40px;"><font size=4><b style="text-align:center; color:white;">INFORMACIÓN DE LA CONSULTA</b></font></th>
                </tr>
                <tr>
                <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">TIPO DE CONSULTA: </b></font></th>
                <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$tipo_consulta.'</p></font></th>
                </tr>
                <tr>
                <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">USUARIO: </b></font></th>
                <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$name_user.'</p></font></th>
                </tr>
                <tr>
                <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">ACTIVIDAD: </b></font></th>
                <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$actividad.'</p></font></th>
                </tr>
                <tr>
                <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">FECHA DE INICIO: </b></font></th>
                <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$fecha1.'</p></font></th>
                </tr>
                <tr>
                <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">FECHA DE TÉRMINO: </b></font></th>
                <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$fecha2.'</p></font></th>
                </tr>
            </thead>
            </table>';

$mpdf->WriteHtml($html);
$mpdf->Output('REACT_REPORTE_'.$tipo_consulta.'_'.$usuario.'_'.$fecha1.'_al_'.$fecha2.'.pdf', 'I'); 
}














else {

    $sentencia="SELECT DISTINCT react_actividad.usuario, usuarios_servidorespublicos.nombre,  
    usuarios_servidorespublicos.apaterno,  usuarios_servidorespublicos.amaterno  

    FROM react_actividad 

    JOIN usuarios_servidorespublicos
    ON react_actividad.usuario = usuarios_servidorespublicos.usuario
    AND usuarios_servidorespublicos.usuario = '$usuario'


    ORDER BY usuarios_servidorespublicos.nombre ASC";
    $result = $mysqli->query($sentencia);
    $row=$result->fetch_assoc();
    $name_user = strtoupper($row['nombre'].' '.$row['apaterno'].' '.$row['amaterno']);


    $sentencia2="SELECT DISTINCT react_actividad_analisis.nombre, react_actividad.id_actividad

    FROM react_actividad 

    JOIN react_actividad_analisis 
    ON react_actividad.id_actividad = react_actividad_analisis.id 
    AND react_actividad.id_actividad = '$actividad'


    ORDER BY react_actividad_analisis.nombre ASC";

    $result2 = $mysqli->query($sentencia2);
    $row2=$result2->fetch_assoc();
    $name_actividad = strtoupper($row2['nombre']);



    $html .='
    <br><br><br><br>

    <div>
        <table width="100%" style="border-spacing: 0;">
            </thead>
                <tr>
                    <td width="5%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 10px; text-align: center;">
                    <b>#</b>
                    </td>

                    <td width="50%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 10px; text-align: center;">
                    <b>Actividad</b>
                    </td>

                    <td width="25%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 15px; text-align: center;">
                    <b>Unidad de medida</b>
                    </td>

                    <td width="20%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding:  15Px; text-align: center;">
                    <b>Cantidad</b>
                    </td>
                </tr>
            </thead>
    ';


    $sql = "SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.usuario, react_subdireccion.subdireccion

    FROM react_actividad 

    JOIN react_actividad_analisis 
    ON react_actividad.id_actividad = react_actividad_analisis.id
    AND react_actividad.usuario = '$usuario'
    AND react_actividad.id_actividad = '$actividad'
    AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'

    JOIN react_subdireccion 
    ON react_actividad.id_subdireccion = react_subdireccion.id

    GROUP BY idactividad

    ORDER BY react_actividad_analisis.nombre ASC";

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

                            <td width="20%" style="text-decoration: underline; font-weight: bold; border: 1px solid black; padding: 2px; text-align: center;">'
                            .$row_sql['total'].
                        '</td>';



                            if ($row_sql['nombre'] === 'Realizar diligencias administrativas'){

                                $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_actividad.usuario, react_subdireccion.subdireccion

                                FROM react_actividad 

                                JOIN react_actividad_analisis 
                                ON react_actividad.id_actividad = react_actividad_analisis.id
                                AND react_actividad.usuario = '$usuario'
                                AND react_actividad.id_actividad = '$actividad'
                                AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                                AND react_actividad_analisis.nombre = 'Realizar diligencias administrativas'


                                JOIN react_subdireccion 
                                ON react_actividad.id_subdireccion = react_subdireccion.id

                                GROUP BY react_actividad.clasificacion

                                ORDER BY react_actividad.clasificacion ASC");

                                $res_sql2 = $mysqli -> query ($sql2);
                                $j=1;
                                while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                                $html .='<tr>
                                        <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                        .$i.'.'.$j.
                                        '</td>

                                            <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                            .$row_sql2['clasificacion'].
                                        '</td>

                                            <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['unidad_medida'].
                                        '</td>

                                            <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['total'].
                                        '</td></tr>';
                                        
                                $j++;
                                }

                            }



                            if ($row_sql['nombre'] === 'Integrar evaluaciones periódicas para determinar el estatus de los sujetos protegidos'){

                                $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_actividad.usuario, react_subdireccion.subdireccion

                                FROM react_actividad 

                                JOIN react_actividad_analisis 
                                ON react_actividad.id_actividad = react_actividad_analisis.id
                                AND react_actividad.usuario = '$usuario'
                                AND react_actividad.id_actividad = '$actividad'
                                AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                                AND react_actividad_analisis.nombre = 'Integrar evaluaciones periódicas para determinar el estatus de los sujetos protegidos'


                                JOIN react_subdireccion 
                                ON react_actividad.id_subdireccion = react_subdireccion.id

                                GROUP BY react_actividad.clasificacion

                                ORDER BY react_actividad.clasificacion ASC");

                                $res_sql2 = $mysqli -> query ($sql2);
                                $j=1;
                                while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                                $html .='<tr>
                                        <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                        .$i.'.'.$j.
                                        '</td>

                                            <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                            .$row_sql2['clasificacion'].
                                        '</td>

                                            <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['unidad_medida'].
                                        '</td>

                                            <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['total'].
                                        '</td></tr>';
                                        
                                $j++;
                                }

                            }



                            if ($row_sql['nombre'] === 'Otorgar asesoría jurídica a las PP y SJ acerca del Programa'){

                                $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_actividad.usuario, react_subdireccion.subdireccion

                                FROM react_actividad 

                                JOIN react_actividad_analisis 
                                ON react_actividad.id_actividad = react_actividad_analisis.id
                                AND react_actividad.usuario = '$usuario'
                                AND react_actividad.id_actividad = '$actividad'
                                AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                                AND react_actividad_analisis.nombre = 'Otorgar asesoría jurídica a las PP y SJ acerca del Programa'


                                JOIN react_subdireccion 
                                ON react_actividad.id_subdireccion = react_subdireccion.id

                                GROUP BY react_actividad.clasificacion

                                ORDER BY react_actividad.clasificacion ASC");

                                $res_sql2 = $mysqli -> query ($sql2);
                                $j=1;
                                while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                                $html .='<tr>
                                        <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                        .$i.'.'.$j.
                                        '</td>

                                            <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                            .$row_sql2['clasificacion'].
                                        '</td>

                                            <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['unidad_medida'].
                                        '</td>

                                            <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['total'].
                                        '</td></tr>';
                                        
                                $j++;
                                }

                            }




                            if ($row_sql['nombre'] === 'Ofrecer ayuda a las PP y SP para recibir servicios de educación, salud, capacitación laboral y trabajo'){

                                $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_actividad.usuario, react_subdireccion.subdireccion

                                FROM react_actividad 

                                JOIN react_actividad_analisis 
                                ON react_actividad.id_actividad = react_actividad_analisis.id
                                AND react_actividad.usuario = '$usuario'
                                AND react_actividad.id_actividad = '$actividad'
                                AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                                AND react_actividad_analisis.nombre = 'Ofrecer ayuda a las PP y SP para recibir servicios de educación, salud, capacitación laboral y trabajo'


                                JOIN react_subdireccion 
                                ON react_actividad.id_subdireccion = react_subdireccion.id

                                GROUP BY react_actividad.clasificacion

                                ORDER BY react_actividad.clasificacion ASC");

                                $res_sql2 = $mysqli -> query ($sql2);
                                $j=1;
                                while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                                $html .='<tr>
                                        <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                        .$i.'.'.$j.
                                        '</td>

                                            <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                            .$row_sql2['clasificacion'].
                                        '</td>

                                            <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['unidad_medida'].
                                        '</td>

                                            <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['total'].
                                        '</td></tr>';
                                        
                                $j++;
                                }

                            }



                            if ($row_sql['nombre'] === 'Otorgar cualquier otra medida de asistencia'){

                                $sql2 = ("SELECT SUM(cantidad) AS total, react_actividad_analisis.nombre, react_actividad.unidad_medida, react_actividad.clasificacion, react_actividad.usuario, react_subdireccion.subdireccion

                                FROM react_actividad 

                                JOIN react_actividad_analisis 
                                ON react_actividad.id_actividad = react_actividad_analisis.id
                                AND react_actividad.usuario = '$usuario'
                                AND react_actividad.id_actividad = '$actividad'
                                AND react_actividad.fecha >= '$fecha_inicio' AND react_actividad.fecha <='$fecha_fin'
                                AND react_actividad_analisis.nombre = 'Otorgar cualquier otra medida de asistencia'


                                JOIN react_subdireccion 
                                ON react_actividad.id_subdireccion = react_subdireccion.id

                                GROUP BY react_actividad.clasificacion

                                ORDER BY react_actividad.clasificacion ASC");

                                $res_sql2 = $mysqli -> query ($sql2);
                                $j=1;
                                while ($row_sql2 = $res_sql2 ->fetch_assoc()){

                                $html .='<tr>
                                        <td width="5%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                        .$i.'.'.$j.
                                        '</td>

                                            <td width="50%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: right;">'
                                            .$row_sql2['clasificacion'].
                                        '</td>

                                            <td width="25%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['unidad_medida'].
                                        '</td>

                                            <td width="20%" style="font-size: .85em; border: 1px solid black; padding: 2px; text-align: center;">'
                                            .$row_sql2['total'].
                                        '</td></tr>';
                                        
                                $j++;
                                }

                            }




                $html .='</tr>';
                $i++;
            }

            $sql_total = "SELECT SUM(cantidad) as total 
            FROM react_actividad 
            WHERE react_actividad.fecha >= '$fecha_inicio' 
            AND react_actividad.fecha <= '$fecha_fin'
            AND react_actividad.id_subdireccion = '1'
            AND react_actividad.usuario = '$usuario'
            AND react_actividad.id_actividad = '$actividad'";
            $result_total = $mysqli->query($sql_total);
            $row_total=$result_total->fetch_assoc();
            $t_activ = $row_total['total'];


            $html .=' 
                        <tfoot>
                            <tr>
                                <th scope="row" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 2px; text-align: right;" colspan="3">Total de actividades realizadas</th>
                                <td bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 2px; text-align: center;">'.$t_activ.'</td>
                            </tr>
                        </tfoot>   
    </table>
</div>
';

$html .='<br><br>';
$html .='<table width="60%" style="border-spacing: 0;" bgcolor="#5F6D6B" align="left">
          <thead class="thead-dark">
            <tr>
              <th colspan="2" style="border: 1px solid #A19E9F; text-align:center; font-family: gothambook; margin-top: 40px;"><font size=4><b style="text-align:center; color:white;">INFORMACIÓN DE LA CONSULTA</b></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">TIPO DE CONSULTA: </b></font></th>
              <th style="background-color: #fdfdfc; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$tipo_consulta.'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">USUARIO: </b></font></th>
              <th style="background-color: #fdfdfc; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$name_user.'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">ACTIVIDAD: </b></font></th>
              <th style="background-color: #fdfdfc; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$name_actividad.'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">FECHA DE INICIO: </b></font></th>
              <th style="background-color: #fdfdfc; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$fecha1.'</p></font></th>
            </tr>
            <tr>
              <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">FECHA DE TÉRMINO: </b></font></th>
              <th style="background-color: #fdfdfc; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$fecha2.'</p></font></th>
            </tr>
          </thead>
        </table>';


$mpdf->WriteHtml($html);
$mpdf->Output('REACT_REPORTE_'.$tipo_consulta.'_'.$usuario.'_'.$fecha1.'_al_'.$fecha2.'.pdf', 'I'); 

}



?>
