<?php
$contadorfr = 0;
$fueraresguardo = "SELECT * FROM datospersonales WHERE estatus = 'SUJETO PROTEGIDO' || estatus = 'PERSONA PROPUESTA' AND relacional = 'NO'";
$rfueraresguardo = $mysqli->query($fueraresguardo);
while ($ffueraresguardo = $rfueraresguardo->fetch_array(MYSQLI_ASSOC)) {
  $id_sujetofr = $ffueraresguardo['id'];
  $identificador_sujetofr = $ffueraresguardo['identificador'];
  $checkfuera = "SELECT DISTINCT id_persona FROM medidas
  WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$id_sujetofr' AND estatus = 'EN EJECUCION'";
  $rcheckfuera = $mysqli->query($checkfuera);
  $fcheckfuera = $rcheckfuera->fetch_assoc();
  if(isset($fcheckfuera['id_persona'])){
    //sujuetos dentro del resguardo
  }else {
    $sujetofueradelresguardo = $id_sujetofr;
    if ($ffueraresguardo['estatus'] === 'SUJETO PROTEGIDO') {
      $convenioentfr = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$sujetofueradelresguardo'";
      $fconvenioentfr = $mysqli->query($convenioentfr);
      $rconvenioentfr = $fconvenioentfr->fetch_assoc();
      //////////////////////////////////////////////////////////////////////////
      $fechafirmafr = date("d-m-Y", strtotime($rconvenioentfr['date_convenio']));
      $contevaluacionfr = "SELECT COUNT(*) AS total FROM evaluacion_persona WHERE id_unico = '$identificador_sujetofr'";
      $rcontevaluacionfr = $mysqli->query($contevaluacionfr);
      $fcontevaluacionfr = $rcontevaluacionfr->fetch_assoc();
      if ($fcontevaluacionfr['total'] > 0) {
        $evalsujultimo = "SELECT * FROM evaluacion_persona WHERE id_unico = '$identificador_sujetofr' ORDER BY id DESC LIMIT 1";
        $revalsujultimo = $mysqli->query($evalsujultimo);
        $fevalsujultimo = $revalsujultimo->fetch_assoc();
        $fechavigencia = date("d-m-Y", strtotime($fevalsujultimo['fecha_vigencia']));
      }else {
        $fechavigencia = date("d-m-Y", strtotime($rconvenioentfr['fecha_vigencia']));
      }
    }elseif ($ffueraresguardo['estatus'] === 'PERSONA PROPUESTA') {
      $fechafirmafr = "EN ANALISIS";
      $fechavigencia = "EN ANALISIS";
    }
    $autoridadsujetofr = "SELECT * FROM autoridad WHERE id_persona = '$sujetofueradelresguardo'";
    $rautoridadsujetofr = $mysqli->query($autoridadsujetofr);
    $fautoridadsujetofr = $rautoridadsujetofr->fetch_assoc();
    $delitosujetofr = "SELECT * FROM procesopenal WHERE id_persona = '$sujetofueradelresguardo'";
    $rdelitosujetofr = $mysqli->query($delitosujetofr);
    $fdelitosujetofr = $rdelitosujetofr->fetch_assoc();
    if ($fdelitosujetofr['delitoprincipal'] === 'OTRO') {
      $delitopersonfr = $fdelitosujetofr['otrodelitoprincipal'];
    }else {
      $delitopersonfr = $fdelitosujetofr['delitoprincipal'];
    }
    $contadorfr = $contadorfr + 1;
    ?>
    <tr style="border: 3px solid black;">
      <td style="text-align:left; border: 3px solid black;"><b><?php echo $contadorfr; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $ffueraresguardo['identificador']; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo date("d-m-Y", strtotime($fautoridadsujetofr['fechasolicitud_persona'])); ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $fechafirmafr; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $ffueraresguardo['sexopersona']; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $ffueraresguardo['edadpersona']; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $ffueraresguardo['calidadpersona']; ?></b></td>
      <td style="text-align:center; border: 3px solid black;"><b><?php echo $delitopersonfr; ?></b></td>
    </tr>
    <?php
  }
}
?>
