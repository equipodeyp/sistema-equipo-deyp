<?php
// error_reporting(0);
$v1 = "SELECT folioexpediente, COUNT( folioexpediente ) AS total
FROM  evaluacion_expediente
GROUP BY folioexpediente
ORDER BY total DESC
LIMIT 1";
$rv1 = $mysqli->query($v1);
$fv1 = $rv1->fetch_assoc();
$iterac = $fv1['total'];
$cont = 0;
$get_expediente = "SELECT id, fol_exp FROM expediente
ORDER BY id";
$rget_expediente = $mysqli->query($get_expediente);
while ($fget_expediente = $rget_expediente->fetch_assoc()) {
  $cont = $cont + 1;
  $folioexpediente = $fget_expediente ['fol_exp'];
  /////////////////////////////////////////////////////////////////////////////obtener informacion para llenar toda la tabla
  // obtener datos de la uatoridad
  $get_autoridad = "SELECT * FROM autoridad WHERE folioexpediente = '$folioexpediente'";
  $rget_autoridad = $mysqli->query($get_autoridad);
  $fget_autoridad = $rget_autoridad ->fetch_assoc();
  // obtener datos del proceso penal
  $get_procesopenal = "SELECT * FROM procesopenal WHERE folioexpediente = '$folioexpediente'";
  $rget_procesopenal = $mysqli->query($get_procesopenal);
  $fget_procesopenal = $rget_procesopenal ->fetch_assoc();
  // obtener datos de valoracion juridica
  $get_valoracionjuridica = "SELECT * FROM valoracionjuridica WHERE folioexpediente = '$folioexpediente'";
  $rget_valoracionjuridica = $mysqli->query($get_valoracionjuridica);
  $fget_valoracionjuridica = $rget_valoracionjuridica ->fetch_assoc();
  // obtener datos del convenio de ENTENDIMIENTO
  $get_analisisexpediente = "SELECT * FROM analisis_expediente WHERE folioexpediente = '$folioexpediente'";
  $rget_analisisexpediente = $mysqli->query($get_analisisexpediente);
  $fget_analisisexpediente = $rget_analisisexpediente ->fetch_assoc();
  // obtener datos de SEGUIMIENTO del expediente
  $get_statusseguimiento = "SELECT * FROM statusseguimiento WHERE folioexpediente = '$folioexpediente'";
  $rget_statusseguimiento = $mysqli->query($get_statusseguimiento);
  $fget_statusseguimiento = $rget_statusseguimiento ->fetch_assoc();
  //
  $v = "SELECT COUNT(*) as t
     FROM  evaluacion_expediente
     WHERE folioexpediente = '$folioexpediente'";
    $rv = $mysqli->query($v);
    $fv = $rv->fetch_assoc();

  echo "<tr>";
    echo "<td style='text-align:center'>"; echo $cont; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_expediente['fol_exp']; echo "</td>";
    echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($fget_autoridad['fechasolicitud'])); echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_autoridad['nombreautoridad']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_procesopenal['delitoprincipal']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_procesopenal['otrodelitoprincipal']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_procesopenal['etapaprocedimiento']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_procesopenal['numeroradicacion']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_valoracionjuridica['resultadovaloracion']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_valoracionjuridica['motivoprocedencia']; echo "</td>";
    echo "<td style='text-align:center' bgcolor='yellow'>"; echo $fget_analisisexpediente['analisis']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_analisisexpediente['incorporacion']; echo "</td>";
    echo "<td style='text-align:center'>"; if ($fget_analisisexpediente['fecha_analisis'] != '0000-00-00') {
      echo date("d/m/Y", strtotime($fget_analisisexpediente['fecha_analisis']));
    }else {
      echo "00/00/0000";
    } echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_analisisexpediente['convenio']; echo "</td>";
    echo "<td style='text-align:center'>"; if ($fget_analisisexpediente['fecha_inicio'] !== '0000-00-00') {
      echo date("d/m/Y", strtotime($fget_analisisexpediente['fecha_inicio']));
    } echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_analisisexpediente['vigencia']; echo "</td>";
    echo "<td style='text-align:center'>"; if ($fget_analisisexpediente['fecha_termino_convenio'] !== '0000-00-00') {
      echo date("d/m/Y", strtotime($fget_analisisexpediente['fecha_termino_convenio']));
    }  echo "</td>";
    if ($fv) {
      $t = "SELECT * FROM evaluacion_expediente
            WHERE folioexpediente = '$folioexpediente'";
            $rt = $mysqli->query($t);
            while ($ft = $rt->fetch_assoc()) {
              echo "<td style='text-align:center' bgcolor='aqua'>"; echo $ft['analisis']; echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; if ($ft['fecha_aut'] !== '0000-00-00') {
                echo date("d/m/Y", strtotime($ft['fecha_aut']));
              }  echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; echo $ft['id_analisis'];  echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; echo $ft['tipo_convenio'];  echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; if ($ft['fecha_firma'] != '0000-00-00') {
                echo date("d/m/Y", strtotime($ft['fecha_firma']));
              }  echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; if ($ft['fecha_inicio'] != '0000-00-00') {
                echo date("d/m/Y", strtotime($ft['fecha_inicio']));
              }  echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; echo $ft['vigencia'];  echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; if ($ft['fecha_vigencia'] != '0000-00-00') {
                echo date("d/m/Y", strtotime($ft['fecha_vigencia']));
              }  echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; echo $ft['total_convenios']; echo "</td>";
            }
            if ($fv['t'] !== $iterac) {
              $i = $fv['t'];
              do {
                echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                echo "<td style='text-align:center' bgcolor='silver'>";  echo "</td>";
                $i++;
              } while ($i < $iterac);
            }
    }
    echo "<td style='text-align:center'>"; echo $fget_statusseguimiento['conclu_cancel']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_statusseguimiento['conclusionart35']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_statusseguimiento['otherart35']; echo "</td>";
    echo "<td style='text-align:center'>"; if ($fget_statusseguimiento['date_desincorporacion'] !== '0000-00-00') {
      echo date("d/m/Y", strtotime($fget_statusseguimiento['date_desincorporacion']));
    } echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_statusseguimiento['status']; echo "</td>";
  echo "</tr>";
}
?>
