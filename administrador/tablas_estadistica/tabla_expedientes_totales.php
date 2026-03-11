<?php
// error_reporting(0);
$contador = 0;
$expedientes = "SELECT * FROM  expediente";
$rexpedientes = $mysqli->query($expedientes);
while ($fexpedientes = $rexpedientes->fetch_assoc()) {
///////////////////////variables
  $contador = $contador + 1;
  $folioexpediente = $fexpedientes['fol_exp'];
////////////////////////////////////////////////consultas
$autoridad = "SELECT * FROM autoridad WHERE folioexpediente = '$folioexpediente' limit 1";
$rautoridad = $mysqli->query($autoridad);
$fautoridad = $rautoridad->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$procesopenal = "SELECT * FROM procesopenal WHERE folioexpediente = '$folioexpediente' limit 1";
$rprocesopenal = $mysqli->query($procesopenal);
$fprocesopenal = $rprocesopenal->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$valorjuridica = "SELECT * FROM valoracionjuridica WHERE folioexpediente = '$folioexpediente' limit 1";
$rvalorjuridica = $mysqli->query($valorjuridica);
$fvalorjuridica = $rvalorjuridica->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$countpersonas = "SELECT count(*) as t FROM datospersonales WHERE folioexpediente = '$folioexpediente'";
$rcountpersonas = $mysqli->query ($countpersonas);
$fcountpersonas = $rcountpersonas->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$analisisexp = "SELECT * FROM analisis_expediente WHERE folioexpediente = '$folioexpediente'";
$ranalisisexp = $mysqli->query($analisisexp);
$fanalisisexp = $ranalisisexp->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$estatusseguimiento = "SELECT * FROM statusseguimiento WHERE folioexpediente = '$folioexpediente'";
$restatusseguimiento = $mysqli->query($estatusseguimiento);
$festatusseguimiento = $restatusseguimiento->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
////////////////CONTAR CUANTAS PERSONAS FIRMARON CONVENIO FORMALIZADO SE ENCUENTRAN DENTRO DEL EXPEDIENTE////////////////////////////////////////////////////////////////////////
$cant_med1="SELECT COUNT(*) AS cant FROM determinacionincorporacion WHERE folioexpediente = '$folioexpediente' AND convenio = 'FORMALIZADO'";
$res_cant_med1=$mysqli->query($cant_med1);
$row_med1 = $res_cant_med1->fetch_array(MYSQLI_ASSOC);
////////////////CONTAR CUANTAS PERSONAS VIGENTES SE ENCUENTRAN DENTRO DEL EXPEDIENTE////////////////////////////////////////////////////////////////////////
$cant_med2="SELECT COUNT(*) AS cant FROM datospersonales WHERE folioexpediente = '$folioexpediente' AND estatus = 'SUJETO PROTEGIDO'";
$res_cant_med2=$mysqli->query($cant_med2);
$row_med2 = $res_cant_med2->fetch_array(MYSQLI_ASSOC);
////////////////////////////////////////////////////////////////////////////////
  echo "<tr>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $contador; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fexpedientes['fol_exp']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fexpedientes['fecha_nueva']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fexpedientes['sede']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fautoridad['nombreautoridad']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fprocesopenal['delitoprincipal']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fprocesopenal['otrodelitoprincipal']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fprocesopenal['etapaprocedimiento']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fprocesopenal['nuc']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fprocesopenal['numeroradicacion']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fvalorjuridica['resultadovaloracion']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fvalorjuridica['motivoprocedencia']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fcountpersonas['t']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fanalisisexp['analisis']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fanalisisexp['incorporacion']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; if ($fanalisisexp['fecha_analisis'] != '0000-00-00') {
     echo date("d/m/Y", strtotime($fanalisisexp['fecha_analisis']));
   } echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fanalisisexp['id_analisis']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fanalisisexp['convenio']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>";
   if ($fanalisisexp['fecha_convenio'] != '0000-00-00') {
     echo date("d/m/Y", strtotime($fanalisisexp['fecha_convenio']));
   } echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>";
   if ($fanalisisexp['fecha_inicio'] != '0000-00-00') {
     echo date("d/m/Y", strtotime($fanalisisexp['fecha_inicio']));
   } echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fanalisisexp['vigencia']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>";
   if ($fanalisisexp['fecha_termino_convenio'] != '0000-00-00') {
     echo date("d/m/Y", strtotime($fanalisisexp['fecha_termino_convenio']));
   } echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $festatusseguimiento['conclu_cancel']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $festatusseguimiento['conclusionart35']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $festatusseguimiento['otherart35']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>";
   if ($festatusseguimiento['date_desincorporacion'] != '0000-00-00') {
     echo date("d/m/Y", strtotime($festatusseguimiento['date_desincorporacion']));
   }echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $festatusseguimiento['status']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $row_med1['cant']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $row_med2['cant']; echo "</td>";
   echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fexpedientes['relacion']; echo "</td>";
  echo "</tr>";
}
?>
