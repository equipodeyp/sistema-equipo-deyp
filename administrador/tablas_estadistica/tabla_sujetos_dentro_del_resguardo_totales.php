<?php
$contador = 0;
$sql = "SELECT * FROM datospersonales WHERE (estatus = 'SUJETO PROTEGIDO' || estatus = 'PERSONA PROPUESTA') AND relacional = 'NO'";
$resultado = $mysqli->query($sql);
while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {

  $id_sujeto = $row['id'];
  $identificador_sujeto = $row['identificador'];
  // echo 'id sujuto->'.$id_sujeto.'*****';

  $checkdentro = "SELECT DISTINCT id_persona FROM medidas
  WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$id_sujeto' AND estatus = 'EN EJECUCION'";
  $rcheckdentro = $mysqli->query($checkdentro);
  $fcheckdentro = $rcheckdentro->fetch_assoc();
  if(isset($fcheckdentro['id_persona'])){
    // echo $contador.".-esta en reguardo *****";
    $sujetodentrodelresguardo = $fcheckdentro['id_persona'];
    if ($row['estatus'] === 'SUJETO PROTEGIDO') {
      $convenioent = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$sujetodentrodelresguardo'";
      $fconvenioent = $mysqli->query($convenioent);
      $rconvenioent = $fconvenioent->fetch_assoc();

      $fechafirma = date("d/m/Y", strtotime($rconvenioent['date_convenio']));

      $contadorevaluacion = "SELECT COUNT(*) AS total FROM evaluacion_persona WHERE id_unico = '$identificador_sujeto'";
      $rcontadorevaluacion = $mysqli->query($contadorevaluacion);
      $fcontadorevaluacion = $rcontadorevaluacion->fetch_assoc();
      if ($fcontadorevaluacion['total'] > 0) {
        // echo $contador.".-si tiene";
        // echo "<br>";
        $evalsujultimo = "SELECT * FROM evaluacion_persona WHERE id_unico = '$identificador_sujeto' ORDER BY id DESC LIMIT 1";
        $revalsujultimo = $mysqli->query($evalsujultimo);
        $fevalsujultimo = $revalsujultimo->fetch_assoc();
        // if(isset($fevalsujultimo['fecha_vigencia'])){
          $fechavigencia = date("d/m/Y", strtotime($fevalsujultimo['fecha_vigencia']));
        // }else {
          // $fechavigencia = 'n/a';
        // }
      }else {
        // echo $contador.".-n/a";
        // echo "<br>";
        $fechavigencia = date("d/m/Y", strtotime($rconvenioent['fecha_vigencia']));
      }
    }elseif ($row['estatus'] === 'PERSONA PROPUESTA') {
      $fechafirma = "EN ANALISIS";
      $fechavigencia = "EN ANALISIS";
    }

    $autoridadsujeto = "SELECT * FROM autoridad WHERE id_persona = '$id_sujeto'";
    $rautoridadsujeto = $mysqli->query($autoridadsujeto);
    $fautoridadsujeto = $rautoridadsujeto->fetch_assoc();

    $delitosujeto = "SELECT * FROM procesopenal WHERE id_persona = '$id_sujeto'";
    $rdelitosujeto = $mysqli->query($delitosujeto);
    $fdelitosujeto = $rdelitosujeto->fetch_assoc();
    if ($fdelitosujeto['delitoprincipal'] === 'OTRO') {
      $delitoperson = $fdelitosujeto['otrodelitoprincipal'];
    }else {
      $delitoperson = $fdelitosujeto['delitoprincipal'];
    }
    $contador = $contador + 1;
        echo "<tr>";
        echo "<td style='text-align:center; border: 1px solid black;'>"; echo $contador; echo "</td>";
        echo "<td style='text-align:center; border: 1px solid black;'>"; echo $row['identificador']; echo "</td>";
        echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fechafirma; echo "</td>";
        echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fechavigencia; echo "</td>";
        echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fautoridadsujeto['nombreautoridad']; echo "</td>";
        echo "<td style='text-align:center; border: 1px solid black;'>"; echo $delitoperson; echo "</td>";
        echo "</tr>";
    //
  }else {
    // echo $contador.".-no tiene alojamiento *****";
    // echo $sujetofueradelresguardo = $id_sujeto;
  }
  // echo "<br>";
  }
?>
