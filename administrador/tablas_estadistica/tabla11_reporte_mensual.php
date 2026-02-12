<?php
$contador = 0;
$sql = "SELECT * FROM datospersonales WHERE (estatus = 'SUJETO PROTEGIDO' || estatus = 'PERSONA PROPUESTA') AND relacional = 'NO'";
$resultado = $mysqli->query($sql);
while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
  $id_sujeto = $row['id'];
  $identificador_sujeto = $row['identificador'];
  $checkdentro = "SELECT DISTINCT id_persona FROM medidas
  WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$id_sujeto' AND estatus = 'EN EJECUCION'";
  $rcheckdentro = $mysqli->query($checkdentro);
  $fcheckdentro = $rcheckdentro->fetch_assoc();
  if(isset($fcheckdentro['id_persona'])){
    $sujetodentrodelresguardo = $fcheckdentro['id_persona'];
    if ($row['estatus'] === 'SUJETO PROTEGIDO') {
      $convenioent = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$sujetodentrodelresguardo'";
      $fconvenioent = $mysqli->query($convenioent);
      $rconvenioent = $fconvenioent->fetch_assoc();
      $fechafirma = date("d-m-Y", strtotime($rconvenioent['date_convenio']));
      //////////////////////////////////////////////////////////////////////////
      $getinicioresguardo = "SELECT * FROM medidas
      WHERE id_persona = '$id_sujeto'  AND medida = 'VIII. ALOJAMIENTO TEMPORAL'
      LIMIT 1";
      $rgetinicioresguardo = $mysqli->query($getinicioresguardo);
      $fgetinicioresguardo = $rgetinicioresguardo ->fetch_assoc();

    }elseif ($row['estatus'] === 'PERSONA PROPUESTA') {
      $fechafirma = "EN ANALISIS";
      $fechavigencia = "EN ANALISIS";
    }
    $delitosujeto = "SELECT * FROM procesopenal WHERE id_persona = '$id_sujeto'";
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
          <td style="text-align:center; border: 3px solid black;"><b><?php echo date("d-m-Y", strtotime($fgetinicioresguardo['date_provisional'])); ?></b></td>
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
