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
               WHERE id_subdireccion = 4 AND id_actividad = 2 AND usuario = '$usuario' AND (fecha BETWEEN '$fecha_inicio' AND '$fecha_fin')";
$ratender = $mysqli->query($atender);
$fatender = $ratender ->fetch_assoc();
$html .='<tr>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> 1 </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> ATENDER LAS PETICIONES DE LAS PP Y SP ALOJADOS EN EL CENTRO DE PROTECCIÓN </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> N/A </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> DOCUMENTO </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> '.$fatender['suma'].' </td>
         </tr>';
$aux = true;
$cont1 = 0;
$facilitarname = "SELECT * FROM react_contacto_familiar";
$rfacilitarname = $mysqli ->query($facilitarname);
while ($ffacilitarname = $rfacilitarname ->fetch_assoc()) {
  $cont1 = $cont1 +1;
  $varclasif = 'CONTACTO-'.$cont1;
  $faccontact = "SELECT COUNT(*) AS suma FROM react_actividad
                 WHERE id_subdireccion = 4 AND id_actividad = 3 AND usuario = '$usuario' AND clasificacion = '$varclasif' AND (fecha BETWEEN '$fecha_inicio' AND '$fecha_fin')";
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
  $html .='<td width="50%" style="border: 1px solid black; padding: 2px; text-align: center;">'.$ffacilitarname['nombre'].'</td>
           <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> ACCIÓN </td>
           <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> '.$ffaccontact['suma'].' </td>
          </tr>';
}
$aux2 = true;
$cont2 = 0;
$implementarname = "SELECT * FROM react_acciones_seguridad_cp";
$rimplementarname = $mysqli ->query($implementarname);
while ($fimplementarname = $rimplementarname ->fetch_assoc()){
  $cont2 = $cont2 +1;
  $varaccion = 'ACCION-'.$cont2;
  $accion = "SELECT COUNT(*) AS suma FROM react_actividad
                 WHERE id_subdireccion = 4 AND id_actividad = 4 AND usuario = '$usuario' AND clasificacion = '$varaccion' AND (fecha BETWEEN '$fecha_inicio' AND '$fecha_fin')";
  $raccion = $mysqli->query($accion);
  $faccion = $raccion ->fetch_assoc();
  if ($aux2){
  $html .='<tr>
            <td rowspan="2" width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> 3 </td>
            <td rowspan="2" width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> IMPLEMENTAR ACCIONES DE SEGURIDAD EN EL CENTRO DE PROTECCIÓN </td>';
            $aux2=false;
  }else{
  $html .='<tr>';
  }
$html .='<td width="50%" style="border: 1px solid black; padding: 2px; text-align: center;">'.$fimplementarname['nombre'].'</td>
         <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> ACCIÓN </td>
         <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> '.$faccion['suma'].' </td>
        </tr>';
}

$aux3 = true;
$cont3 = 0;
$salvaguardarname = "SELECT * FROM react_salvaguradar_integridad";
$rsalvaguardarname = $mysqli ->query($salvaguardarname);
while ($fsalvaguardarname = $rsalvaguardarname ->fetch_assoc()) {
  $cont3 = $cont3 +1;
  $varsalvaguardar = 'SALVAGUARDAR-'.$cont3;
  $salvaguardar = "SELECT COUNT(*) AS suma FROM react_actividad
                 WHERE id_subdireccion = 4 AND id_actividad = 5 AND usuario = '$usuario' AND clasificacion = '$varsalvaguardar' AND (fecha BETWEEN '$fecha_inicio' AND '$fecha_fin')";
  $rsalvaguardar = $mysqli->query($salvaguardar);
  $fsalvaguardar = $rsalvaguardar ->fetch_assoc();
  if ($aux3) {
    $html .='<tr>
              <td rowspan="3" width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> 4 </td>
              <td rowspan="3" width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> SALVAGUARDAR LA INTEGRIDAD FÍSICA DE LAS PP Y SP ALOJADOS EN EL CENTRO DE PROTECCIÓN; ASI COMO LA SEGURIDAD DEL PROGRAMA </td>';
              $aux3=false;
  }else {
    $html .='<tr>';
  }
$html .='<td width="50%" style="border: 1px solid black; padding: 2px; text-align: center;">'.$fsalvaguardarname['nombre'].'</td>
         <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> ACCIÓN </td>
         <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> '.$fsalvaguardar['suma'].' </td>
        </tr>';
}

$recorridos = "SELECT COUNT(*) AS suma FROM react_actividad
               WHERE id_subdireccion = 4 AND id_actividad = 6 AND usuario = '$usuario' AND (fecha BETWEEN '$fecha_inicio' AND '$fecha_fin')";
$rrecorridos = $mysqli->query($recorridos);
$frecorridos = $rrecorridos ->fetch_assoc();
$html .='<tr>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> 5 </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> REALIZAR RECORRIDOS DE SEGURIDAD EN LA PERIFERIA DE LOS DOMICILIOS Y LUGARES DE TRABAJO DE LAS PERSONAS PROPUESTAS Y/O SUJETOS PROTEGIDOS A EFECTO DE SALVAGUARDAR SU INTEGRIDAD FÍSICA </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> N/A </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> RONDÍN POLICIAL </td>
          <td width="5%" style="border: 1px solid black; padding: 2px; text-align: center;"> '.$frecorridos['suma'].' </td>
         </tr>';

         $totalactividades = "SELECT COUNT(*) AS suma FROM react_actividad
                        WHERE id_subdireccion = 4 AND usuario = '$usuario' AND (fecha BETWEEN '$fecha_inicio' AND '$fecha_fin')";
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
                      <th style="border: 1px solid #A19E9F; text-align:left; font-family: gothambook;" ><font size=4><b style="text-align:center; color:white;">USUARIO: </b></font></th>
                      <th style="background-color: #f0f0f0; border: 1px solid #A19E9F; text-align:center; font-family: gothambook;"><p style="text-align:center; color:black;"><font size=2>'.$namecomplete.'</p></font></th>
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
