<?php
$consecutivo = 0;
$sql = "SELECT * FROM expediente";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);
$fol_exp =$row['fol_exp'];

$tabla="SELECT * FROM expediente";
$var_resultado = $mysqli->query($tabla);

while ($var_fila=$var_resultado->fetch_array()){
  $fol_exp2=$var_fila['fol_exp'];
  $consecutivo = $consecutivo + 1;
  $aut = "SELECT * from autoridad WHERE folioexpediente = '$fol_exp2'";
  $res = $mysqli->query($aut);
  $fila_aut = $res->fetch_assoc();
  $p_prpuestas = "SELECT * FROM analisis_expediente WHERE folioexpediente = '$fol_exp2'";
  $res_p = $mysqli->query($p_prpuestas);
  $fila_p_p = $res_p->fetch_assoc();
  $cant_med1="SELECT COUNT(*) AS sujetos_protegidos FROM determinacionincorporacion WHERE folioexpediente = '$fol_exp2' AND convenio = 'FORMALIZADO'";
  $res_cant_med1=$mysqli->query($cant_med1);
  $row_med1 = $res_cant_med1->fetch_array(MYSQLI_ASSOC);
  $cant="SELECT COUNT(*) AS cant FROM medidas WHERE folioexpediente = '$fol_exp2'";
  $r=$mysqli->query($cant);
  $row2 = $r->fetch_array(MYSQLI_ASSOC);
  $med_ejec = "SELECT COUNT(*) AS medidas_ejecutadas FROM medidas WHERE folioexpediente = '$fol_exp2' and estatus ='EJECUTADA'";
  $res_med_ejec = $mysqli->query($med_ejec);
  $fila_med_ejec = $res_med_ejec->fetch_assoc();
  $med_enejecucion = "SELECT COUNT(*) AS medidas_en_ejecucion FROM medidas WHERE folioexpediente = '$fol_exp2' and estatus ='EN EJECUCION'";
  $res_med_enejecucion = $mysqli->query($med_enejecucion);
  $fila_med_enejecucion = $res_med_enejecucion->fetch_assoc();
  $med_canceladas = "SELECT COUNT(*) AS medidas_canceladas FROM medidas WHERE folioexpediente = '$fol_exp2' and estatus ='CANCELADA'";
  $res_med_canceladas = $mysqli->query($med_canceladas);
  $fila_med_canceladas = $res_med_canceladas->fetch_assoc();
  $est_expediente = "SELECT * FROM statusseguimiento WHERE folioexpediente = '$fol_exp2'";
  $res_est_expediente = $mysqli->query($est_expediente);
  $fila_est_exoediente = $res_est_expediente->fetch_assoc();
  $delp = "SELECT DISTINCT delitoprincipal FROM procesopenal WHERE folioexpediente = '$fol_exp2'";
  $rdelp = $mysqli->query($delp);
  $fdelp = $rdelp->fetch_assoc();
  //
  $convformal = "SELECT * FROM analisis_expediente
  INNER JOIN statusseguimiento on analisis_expediente.folioexpediente = statusseguimiento.folioexpediente
  WHERE analisis_expediente.analisis= 'estudio tecnico' and analisis_expediente.incorporacion= 'incorporacion procedente'
  and analisis_expediente.convenio = '' AND statusseguimiento.conclu_cancel != 'conclusion'";
  $rconvformal = $mysqli->query($convformal);
  $fconvformal = $rconvformal->fetch_assoc();
  //
  $v1="SELECT nombrepersona,  COUNT(DISTINCT folioexpediente) as t FROM datospersonales
  WHERE relacional = 'si'
  GROUP BY nombrepersona
  HAVING COUNT(*)>0
  ORDER BY 't'  DESC";
  $rv1=$mysqli->query($v1);
  $fv1 = $rv1->fetch_assoc();
  // echo $fv1['t'];
  //
  $abc="SELECT count(*) as c FROM datospersonales WHERE folioexpediente='$fol_exp2'";
  $result=$mysqli->query($abc);
  if($result)
  {
    while($row=mysqli_fetch_assoc($result))
    {
      $v="SELECT * FROM datospersonales WHERE folioexpediente='$fol_exp2'";
      $rv=$mysqli->query($v);
      $fv = $rv->fetch_assoc();
      $n = $fv['nombrepersona'];
      $p = $fv['paternopersona'];
      $m = $fv['maternopersona'];

      echo "<tr>";
        echo "<td style='text-align:center' width='50'>"; echo $consecutivo; if ($fv['relacional'] === 'SI') {
          // echo "*SI";
          $v2="SELECT COUNT(*) as t  FROM datospersonales
          WHERE nombrepersona = '$n' and paternopersona = '$p' and maternopersona = '$m' and relacional = 'SI'";
          $rv2=$mysqli->query($v2);
          $fv2 = $rv2->fetch_assoc();
          // echo $fv2['t'];
          for ($i=0; $i < $fv2['t']; $i++) {
            echo "*";
          }
        }
        if ($fconvformal) {
          echo "/";
        } echo "</td>";
        echo "<td style='text-align:center' width='50'>"; echo $var_fila['fol_exp']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fila_aut['nombreautoridad']; echo "</td>";
        echo "<td style='text-align:center' width='50'>"; echo $var_fila['fecharecep']; echo "</td>";
        echo "<td style='text-align:center' >"; echo $fdelp['delitoprincipal']; echo "</td>";
        echo "<td style='text-align:center' width='50'>"; echo $fila_p_p['personas_propuestas']; echo "</td>";
        echo "<td style='text-align:center' width='50'>"; echo $row_med1['sujetos_protegidos']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fila_med_ejec['medidas_ejecutadas']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fila_med_enejecucion['medidas_en_ejecucion']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fila_med_canceladas['medidas_canceladas']; echo "</td>";
        echo "<td style='text-align:center' >"; echo $fila_est_exoediente['status']; echo "</td>";
        echo "</tr>";

      }

    }
  }
?>
