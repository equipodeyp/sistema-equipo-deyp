<?php
$html .='<div>
            <table width="100%" style="border-spacing: 0;">
              <thead>
                <tr>
                  <td width="5%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 10px; text-align: center;">
                    <b>#</b>
                  </td>
                  <td width="50%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 10px; text-align: center;">
                    <font size=5><b style="text-align:center; color:white;">ACTIVIDAD</b></font>
                  </td>
                  <td width="50%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 10px; text-align: center;">
                    <font size=5><b style="text-align:center; color:white;">CLASIFICACIÓN</b></font>
                  </td>
                  <td width="25%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 15px; text-align: center;">
                    <font size=5><b style="text-align:center; color:white;">UNIDAD DE MEDIDA</b></font>
                  </td>
                  <td width="20%" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding:  15Px; text-align: center;">
                    <font size=5><b style="text-align:center; color:white;">CANTIDAD</b></font>
                  </td>
                </tr>
              </thead>
            <tbody>';
$atender = "SELECT COUNT(*) AS suma FROM react_actividad
               WHERE id_subdireccion = 4 AND id_actividad = 2 AND (fecha BETWEEN '$fecha_inicio' AND '$fecha_fin')";
$ratender = $mysqli->query($atender);
$fatender = $ratender ->fetch_assoc();
$html .='<tr>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> 1 </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> ATENDER LAS PETICIONES DE LAS PP Y SP ALOJADOS EN EL CENTRO DE PROTECCIÓN </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> N/A </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> DOCUMENTO </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;">'.$fatender['suma'].'</td>
         </tr>';
$aux = true;
$cont1 = 0;
$facilitarname = "SELECT * FROM react_contacto_familiar";
$rfacilitarname = $mysqli ->query($facilitarname);
while ($ffacilitarname = $rfacilitarname ->fetch_assoc()) {
  $cont1 = $cont1 +1;
  $varclasif = 'CONTACTO-'.$cont1;
  $faccontact = "SELECT COUNT(*) AS suma FROM react_actividad
                 WHERE id_subdireccion = 4 AND id_actividad = 3 AND clasificacion = '$varclasif' AND (fecha BETWEEN '$fecha_inicio' AND '$fecha_fin')";
  $rfaccontact = $mysqli->query($faccontact);
  $ffaccontact = $rfaccontact ->fetch_assoc();
  if ($aux){
    $html .='<tr>
              <td rowspan="5" width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> 2 </td>
              <td rowspan="5" width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> FACILITAR EL CONTACTO DE LAS PP O SP ALOJADOS EN EL CENTRO DE PROTECCIÓN CON LOS FAMILIARES PARA CONTENCIÓN EMOCIONAL </td>';
              $aux=false;
  }else {
          $html .='<tr>';
  }
  $html .='<td width="50%" style="border: 1px solid black; padding: 2px; text-align: center;">'.$cont1.'-'.$ffacilitarname['nombre'].'</td>
           <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> ACCIÓN </td>
           <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;">'.$ffaccontact['suma'].'</td>
          </tr>';
}
$recorridos = "SELECT COUNT(*) AS suma FROM react_actividad
               WHERE id_subdireccion = 4 AND id_actividad = 6 AND (fecha BETWEEN '$fecha_inicio' AND '$fecha_fin')";
$rrecorridos = $mysqli->query($recorridos);
$frecorridos = $rrecorridos ->fetch_assoc();
$html .='<tr>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> 3 </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> REALIZAR RECORRIDOS DE SEGURIDAD EN LA PERIFERIA DE LOS DOMICILIOS Y LUGARES DE TRABAJO DE LAS PERSONAS PROPUESTAS Y/O SUJETOS PROTEGIDOS A EFECTO DE SALVAGUARDAR SU INTEGRIDAD FÍSICA </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> N/A </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> RONDÍN POLICIAL </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;">'.$frecorridos['suma'].'</td>
         </tr>';

//
$actsujetosprot = "SELECT COUNT(*) AS suma FROM react_actividad
               WHERE id_subdireccion = 4 AND id_actividad = 7 AND (fecha BETWEEN '$fecha_inicio' AND '$fecha_fin')";
$ractsujetosprot = $mysqli->query($actsujetosprot);
$factsujetosprot = $ractsujetosprot ->fetch_assoc();
$html .='<tr>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> 4 </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> ACTIVIDADES REALIZADAS POR LOS SUJETOS PROTEGIDOS</td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> N/A </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> ACTIVIDAD </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;">'.$factsujetosprot['suma'].'</td>
         </tr>';

//
$otrasact = "SELECT COUNT(*) AS suma FROM react_actividad
               WHERE id_subdireccion = 4 AND id_actividad = 8 AND (fecha BETWEEN '$fecha_inicio' AND '$fecha_fin')";
$rotrasact = $mysqli->query($otrasact);
$fotrasact = $rotrasact ->fetch_assoc();
$html .='<tr>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> 5 </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> OTRAS </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> N/A </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> NA </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;">'.$fotrasact['suma'].'</td>
         </tr>';
$totalactividades = "SELECT COUNT(*) AS suma FROM react_actividad
               WHERE id_subdireccion = 4 AND (fecha BETWEEN '$fecha_inicio' AND '$fecha_fin')";
$rtotalactividades = $mysqli->query($totalactividades);
$ftotalactividades = $rtotalactividades ->fetch_assoc();
$html .='<tfoot>
          <tr>
            <th scope="row" bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 2px; text-align: right;" colspan="4">
              <font size=5><b style="text-align:center; color:white;">TOTAL DE ACTIVIDADES</b></font>
            </th>
            <td bgcolor="#5F6D6B" style="color:#fdfdfc; border: 1px solid black; padding: 2px; text-align: center;">
              <font size=5><b style="text-align:center; color:white;">'.$ftotalactividades['suma'].'</b></font>
            </td>
          </tr>
         </tfoot>';

$html .='</table>
        </dvi><br><br>';

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
?>
