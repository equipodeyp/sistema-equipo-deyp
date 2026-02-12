<?php
$contador = 0;
$sql = "SELECT * FROM datospersonales WHERE estatus = 'SUJETO PROTEGIDO' || estatus = 'PERSONA PROPUESTA' AND relacional = 'NO'";
$resultado = $mysqli->query($sql);
while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
  $id_sujeto = $row['id'];
  $identificador_sujeto = $row['identificador'];
  $checkdentro = "SELECT DISTINCT id_persona FROM medidas
  WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$id_sujeto' AND estatus = 'EN EJECUCION'";
  $rcheckdentro = $mysqli->query($checkdentro);
  $fcheckdentro = $rcheckdentro->fetch_assoc();
  if(isset($fcheckdentro['id_persona'])){
    //sujuetos dentro del resguardo
  }else {
    $sujetofueradelresguardo = $id_sujeto;
    if ($row['estatus'] === 'SUJETO PROTEGIDO') {
      $convenioent = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$sujetofueradelresguardo'";
      $fconvenioent = $mysqli->query($convenioent);
      $rconvenioent = $fconvenioent->fetch_assoc();
      //////////////////////////////////////////////////////////////////////////
      $fechafirma = date("d-m-Y", strtotime($rconvenioent['date_convenio']));
      $contadorevaluacion = "SELECT COUNT(*) AS total FROM evaluacion_persona WHERE id_unico = '$identificador_sujeto'";
      $rcontadorevaluacion = $mysqli->query($contadorevaluacion);
      $fcontadorevaluacion = $rcontadorevaluacion->fetch_assoc();
      if ($fcontadorevaluacion['total'] > 0) {
        $evalsujultimo = "SELECT * FROM evaluacion_persona WHERE id_unico = '$identificador_sujeto' ORDER BY id DESC LIMIT 1";
        $revalsujultimo = $mysqli->query($evalsujultimo);
        $fevalsujultimo = $revalsujultimo->fetch_assoc();
        $fechavigencia = date("d-m-Y", strtotime($fevalsujultimo['fecha_vigencia']));
      }else {
        $fechavigencia = date("d-m-Y", strtotime($rconvenioent['fecha_vigencia']));
      }
    }elseif ($row['estatus'] === 'PERSONA PROPUESTA') {
      $fechafirma = "EN ANALISIS";
      $fechavigencia = "EN ANALISIS";
    }
    $autoridadsujeto = "SELECT * FROM autoridad WHERE id_persona = '$sujetofueradelresguardo'";
    $rautoridadsujeto = $mysqli->query($autoridadsujeto);
    $fautoridadsujeto = $rautoridadsujeto->fetch_assoc();
    $delitosujeto = "SELECT * FROM procesopenal WHERE id_persona = '$sujetofueradelresguardo'";
    $rdelitosujeto = $mysqli->query($delitosujeto);
    $fdelitosujeto = $rdelitosujeto->fetch_assoc();
    if ($fdelitosujeto['delitoprincipal'] === 'OTRO') {
      $delitoperson = $fdelitosujeto['otrodelitoprincipal'];
    }else {
      $delitoperson = $fdelitosujeto['delitoprincipal'];
    }
    $contador = $contador + 1;
    ?>
    <tr style="border: 3px solid black;">
      <td style="text-align:left; border: 3px solid black;"><b><?php echo $contador; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $row['identificador']; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo date("d-m-Y", strtotime($fautoridadsujeto['fechasolicitud_persona'])); ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $fechafirma; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $row['sexopersona']; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $row['edadpersona']; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $row['calidadpersona']; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $delitoperson; ?></b></td>
    </tr>
    <?php
  }
}
?>
