<?php
// echo "total de sujetos";
// error_reporting(0);
$v1 = "SELECT id_unico, COUNT( id_unico ) AS total
FROM  evaluacion_persona
GROUP BY id_unico
ORDER BY total DESC
LIMIT 1";
$rv1 = $mysqli->query($v1);
$fv1 = $rv1->fetch_assoc();
$iterac = $fv1['total'];
$cont = 0;
$get_expediente_suj = "SELECT * FROM expediente";
$rget_expediente_suj = $mysqli->query($get_expediente_suj);
while ($fget_expediente_suj = $rget_expediente_suj->fetch_assoc()) {
  $fol_exp_sujeto = $fget_expediente_suj['fol_exp'];
  //////////////////////////////////////////////////////////////////////////////
  $get_expofsujeto =  "SELECT * FROM datospersonales WHERE folioexpediente = '$fol_exp_sujeto'";
  $rget_expofsujeto = $mysqli->query($get_expofsujeto);
  while ($fget_expofsujeto = $rget_expofsujeto->fetch_assoc()) {
    $id_sujeto = $fget_expofsujeto['id'];
    $id_unico = $fget_expofsujeto['identificador'];
    $cont = $cont + 1;
    ////////////////////////////////////////////////////////////////////////////
    $get_autoridad_ofsuj = "SELECT * FROM autoridad WHERE id_persona = '$id_sujeto'";
    $rget_autoridad_ofsuj = $mysqli->query($get_autoridad_ofsuj);
    $fget_autoridad_ofsuj = $rget_autoridad_ofsuj->fetch_assoc();
    ////////////////////////////////////////////////////////////////////////////
    $get_procesopenal_suj = "SELECT * FROM procesopenal WHERE id_persona = '$id_sujeto'";
    $rget_procesopenal_suj = $mysqli->query($get_procesopenal_suj);
    $fget_procesopenal_suj = $rget_procesopenal_suj->fetch_assoc();
    ////////////////////////////////////////////////////////////////////////////
    $get_valoracionjuridica_suj = "SELECT * FROM valoracionjuridica WHERE id_persona = '$id_sujeto'";
    $rget_valoracionjuridica_suj = $mysqli->query($get_valoracionjuridica_suj);
    $fget_valoracionjuridica_suj = $rget_valoracionjuridica_suj->fetch_assoc();
    ////////////////////////////////////////////////////////////////////////////
    $get_determinacionincorporacion_suj = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_sujeto'";
    $rget_determinacionincorporacion_suj = $mysqli->query($get_determinacionincorporacion_suj);
    $fget_determinacionincorporacion_suj = $rget_determinacionincorporacion_suj->fetch_assoc();
    $v = "SELECT COUNT(*) as t
       FROM  evaluacion_persona
       WHERE id_unico = '$id_unico'";
    $rv = $mysqli->query($v);
    $fv = $rv->fetch_assoc();

    echo "<tr>";
    echo "<td style='text-align:center'>"; echo $cont; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_expediente_suj['fol_exp']; echo "</td>";
    echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($fget_autoridad_ofsuj['fechasolicitud_persona'])); echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_autoridad_ofsuj['nombreautoridad']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_expofsujeto['nombrepersona']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_expofsujeto['paternopersona']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_expofsujeto['maternopersona']; echo "</td>";
    echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($fget_expofsujeto['fechanacimientopersona'])); echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_expofsujeto['edadpersona']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_expofsujeto['grupoedad']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_expofsujeto['calidadpersona']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_expofsujeto['sexopersona']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_expofsujeto['incapaz']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_procesopenal_suj['delitoprincipal']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_procesopenal_suj['otrodelitoprincipal']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_procesopenal_suj['delitosecundario']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_procesopenal_suj['otrodelitosecundario']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_procesopenal_suj['etapaprocedimiento']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_procesopenal_suj['numeroradicacion']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_expofsujeto['identificador']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_valoracionjuridica_suj['resultadovaloracion']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_valoracionjuridica_suj['motivoprocedencia']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_determinacionincorporacion_suj['multidisciplinario']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_determinacionincorporacion_suj['incorporacion']; echo "</td>";
    echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($fget_determinacionincorporacion_suj['date_autorizacion'])); echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_determinacionincorporacion_suj['id_analisis']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_determinacionincorporacion_suj['convenio']; echo "</td>";
    echo "<td style='text-align:center'>"; if ($fget_determinacionincorporacion_suj['fecha_inicio'] !== '0000-00-00') {
        echo date("d/m/Y", strtotime($fget_determinacionincorporacion_suj['fecha_inicio']));
    } echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_determinacionincorporacion_suj['vigencia']; echo "</td>";
    echo "<td style='text-align:center'>"; if ($fget_determinacionincorporacion_suj['fecha_vigencia'] !== '0000-00-00') {
      echo date("d/m/Y", strtotime($fget_determinacionincorporacion_suj['fecha_vigencia']));
    } echo "</td>";
    if ($fv) {
      $t = "SELECT * FROM evaluacion_persona
            WHERE id_unico = '$id_unico'";
            $rt = $mysqli->query($t);
            while ($ft = $rt->fetch_assoc()){
              echo "<td style='text-align:center' bgcolor='aqua'>"; echo $ft['analisis']; echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; echo date("d/m/Y", strtotime($ft['fecha_aut'])); echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; echo $ft['id_analisis']; echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; echo $ft['tipo_convenio']; echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; if ($ft['fecha_firma'] !== '0000-00-00') {
                echo date("d/m/Y", strtotime($ft['fecha_firma']));
              } echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; if ($ft['fecha_inicio'] !== '0000-00-00') {
                echo date("d/m/Y", strtotime($ft['fecha_inicio']));
              } echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; echo $ft['vigencia']; echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; if ($ft['fecha_vigencia'] !== '0000-00-00') {
                echo date("d/m/Y", strtotime($ft['fecha_vigencia']));
              } echo "</td>";
              echo "<td style='text-align:center' bgcolor='white'>"; echo $ft['id_convenio']; echo "</td>";
            }
            if ($fv['t'] < $iterac) {
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
    echo "<td style='text-align:center'>"; if ($fget_determinacionincorporacion_suj['date_desincorporacion'] !== '0000-00-00') {
      echo date("d/m/Y", strtotime($fget_determinacionincorporacion_suj['date_desincorporacion']));
    } echo "</td>";
    echo "<td style='text-align:center'>"; echo $fget_expofsujeto['estatus']; echo "</td>";
    echo "</tr>";
  }

}
?>
