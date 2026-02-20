<?php
$contadorsujresguardados = 0;
$sujetores = "SELECT * FROM datospersonales WHERE (estatus = 'SUJETO PROTEGIDO' || estatus = 'PERSONA PROPUESTA') AND relacional = 'NO'";
$rsujetores = $mysqli->query($sujetores);
while ($fsujetores = $rsujetores->fetch_array(MYSQLI_ASSOC)) {
  $id_sujetodr = $fsujetores['id'];
  $checkdentro = "SELECT DISTINCT id_persona FROM medidas
  WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$id_sujetodr' AND estatus = 'EN EJECUCION'";
  $rcheckdentro = $mysqli->query($checkdentro);
  $fcheckdentro = $rcheckdentro->fetch_assoc();
  if(isset($fcheckdentro['id_persona'])){
    $sujetodentrodelresguardo = $fcheckdentro['id_persona'];
    if ($fsujetores['estatus'] === 'SUJETO PROTEGIDO') {
      $convenioent = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$sujetodentrodelresguardo'";
      $fconvenioent = $mysqli->query($convenioent);
      $rconvenioent = $fconvenioent->fetch_assoc();
      $fechafirma = date("d-m-Y", strtotime($rconvenioent['date_convenio']));
      ////////////////////////////////////////////////////////////////////////////
      $getinicioresguardo1 = "SELECT * FROM medidas
      WHERE id_persona = '$id_sujetodr'  AND medida = 'VIII. ALOJAMIENTO TEMPORAL'
      LIMIT 1";
      $rgetinicioresguardo1 = $mysqli->query($getinicioresguardo1);
      $fgetinicioresguardo1 = $rgetinicioresguardo1 ->fetch_assoc();
      $inicioresguardo = date("d-m-Y", strtotime($fgetinicioresguardo1['date_provisional']));
    }elseif ($fsujetores['estatus'] === 'PERSONA PROPUESTA') {
      $fechafirma = "EN ANALISIS";
      $fechavigencia = "EN ANALISIS";
      ////////////////////////////////////////////////////////////////////////////
      $getinicioresguardo2 = "SELECT * FROM medidas
      WHERE id_persona = '$id_sujetodr'  AND medida = 'VIII. ALOJAMIENTO TEMPORAL'
      LIMIT 1";
      $rgetinicioresguardo2 = $mysqli->query($getinicioresguardo2);
      $fgetinicioresguardo2 = $rgetinicioresguardo2 ->fetch_assoc();
      $inicioresguardo = date("d-m-Y", strtotime($fgetinicioresguardo2['date_provisional']));
    }
    ////////////////////////////////////////////////////////////////////////////
    $delitosujetodr = "SELECT * FROM procesopenal WHERE id_persona = '$id_sujetodr'";
    $rdelitosujetodr = $mysqli->query($delitosujetodr);
    $fdelitosujetodr = $rdelitosujetodr->fetch_assoc();
    if ($fdelitosujetodr['delitoprincipal'] === 'OTRO') {
      $delitopersondr = $fdelitosujetodr['otrodelitoprincipal'];
    }else {
      $delitopersondr = $fdelitosujetodr['delitoprincipal'];
    }
    $contadorsujresguardados = $contadorsujresguardados + 1;
        ?>
        <tr style="border: 3px solid black;">
          <td style="text-align:left; border: 3px solid black;"><b><?php echo $id_sujetodr; ?></b></td>
          <td style="text-align:center; border: 3px solid black;"><b><?php echo $fsujetores['identificador']; ?></b></td>
          <td style="text-align:center; border: 3px solid black;"><b><?php echo $inicioresguardo; ?></b></td>
          <td style="text-align:center; border: 3px solid black;"><b><?php echo $fechafirma; ?></b></td>
          <td style="text-align:center; border: 3px solid black;"><b><?php echo $fsujetores['sexopersona']; ?></b></td>
          <td style="text-align:center; border: 3px solid black;"><b><?php echo $fsujetores['edadpersona']; ?></b></td>
          <td style="text-align:center; border: 3px solid black;"><b><?php echo $fsujetores['calidadpersona']; ?></b></td>
          <td style="text-align:center; border: 3px solid black;"><b><?php echo $delitopersondr; ?></b></td>
        </tr>
        <?php
  }
}
?>
