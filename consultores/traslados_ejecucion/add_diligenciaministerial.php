<?php
$getdiligenciamin = "SELECT * FROM react_traslados_mot_dilmin WHERE lugar = '$detalle_instancia'";
$rgetdiligenciamin = $mysqli->query($getdiligenciamin);
$fgetdiligenciamin = $rgetdiligenciamin->fetch_assoc();
if ($detalle_instancia === 'OTRO') {
    $idanteiorinc = $fgetdiligenciamin['id'] ?? 0;
    $idnext = $idanteiorinc + 1;
    $lugardestraslado = mb_strtoupper($lugar_destino, 'UTF-8');
    $domiciliodestraslado = mb_strtoupper($domicilio_destino, 'UTF-8');
    $municipiodestraslado = mb_strtoupper($municipio_destino, 'UTF-8');
    // UPDATE DE OPCION OTRO SE ACTULIZA ID
    $updidvisfam = "UPDATE react_traslados_mot_dilmin SET id = '$idnext' WHERE lugar = 'OTRO'";
    $rupdidvisfam = $mysqli ->query($updidvisfam);
    // ADD LUGAR, DOMICILIO Y MUNICIPIO CUANDO SEA OTRO
    $addidvisfam = "INSERT INTO react_traslados_mot_dilmin(id, lugar, domicilio, municipio)
            VALUES ('$idanteiorinc', '$lugardestraslado', '$domiciliodestraslado', '$municipiodestraslado')";
    $raddidvisfam = $mysqli ->query($addidvisfam);
} else {
    $lugardestraslado = $fgetdiligenciamin['lugar'] ?? '';
    $domiciliodestraslado = $fgetdiligenciamin['domicilio'] ?? '';
    $municipiodestraslado = $fgetdiligenciamin['municipio'] ?? '';
}
// ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO
$adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                           VALUES ('$id_traslado', '$lugardestraslado', '$domiciliodestraslado', '$municipiodestraslado', '$instancia_traslado', '$fecha_alta', '$name')";
$radddestinotraslado = $mysqli->query($adddestinotraslado);
if ($radddestinotraslado) {
  $getiddesult = "select max(ID) As id from react_destinos_traslados";
  $rgetiddesult = $mysqli->query($getiddesult);
  $fgetiddesult = $rgetiddesult->fetch_assoc();
  $id_destrasladoult = $fgetiddesult["id"];
  if (!empty($bloque_izquierdo_data['sujetos_ids'])) {
    // Recorremos cada ID de sujeto utilizando un bucle foreach
    $longitud = count($lista_sujetos_unificada);
    echo "El número de sujetos es: " . $longitud;
    // $varcompartido = 'compartido-'.$idtrasladounico;
    $contarizq = 0;
    foreach ($bloque_izquierdo_data['sujetos_ids'] as $sujeto_id){
      if ($longitud > 1) {
        $contarizq = $contarizq + 1;
        $varcompartido = 'COMPARTIDO-'.$idtrasladounico.'-'.$contarizq;
      }else {
        $varcompartido = 'UNICO';
      }
      // Limpiamos el ID actual por seguridad, siguiendo tu estructura con $mysqli
      $id_seguro = $mysqli->real_escape_string($sujeto_id);
      // Definimos la consulta SQL utilizando la variable actual
      $qry_sujeto = "SELECT * FROM datospersonales WHERE id = '$id_seguro'";
      // Ejecutamos la consulta
      $result_sujeto = $mysqli->query($qry_sujeto);
      // Obtenemos los campos de la fila (igual que tu ejemplo con fetch_assoc)
      if ($row_sujeto = $result_sujeto->fetch_assoc()){
        $folexpsujizq = $row_sujeto['folioexpediente'];
        $idsujizq = $row_sujeto['id'];
        $checkalojamiento = "SELECT COUNT(*) as t FROM  medidas
                                                  WHERE id_persona = '$id_seguro' AND medida= 'VIII. ALOJAMIENTO TEMPORAL' AND estatus != 'CANCELADA'";
        $rcheckalojamiento = $mysqli->query($checkalojamiento);
        $fcheckalojamiento = $rcheckalojamiento->fetch_assoc();
        if ($fcheckalojamiento['t'] > 0) {
          $alojamiento_suj = 'SI';
        }else {
          $alojamiento_suj = 'NO';
        }
        $addsujetosentraslado = "INSERT INTO react_sujetos_traslado(id_traslado, folio_expediente, id_sujeto, resguardado, usuario, fecha_alta, id_destino, id_asistenciamedica, compartido)
        VALUES ('$id_traslado', '$folexpsujizq', '$idsujizq', '$alojamiento_suj', '$name', '$fecha_alta', '$id_destrasladoult', 'N/A', '$varcompartido')";
        $raddsujetosentraslado = $mysqli->query($addsujetosentraslado);

      }
    }
  }
}
// --- ENLACE ACUMULATIVO PARA DILIGENCIA ADMINISTRATIVA SIMULTÁNEA ---
if (!empty($tipo_admin_texto)) {
    if ($tipo_admin_texto ==='CON_SUJETO') {
      $newmotivotraslado = 'DILIGENCIA ADMINISTRATIVA CON SUJETO';
    }else {
      $newmotivotraslado = 'DILIGENCIA ADMINISTRATIVA SIN SUJETO';
    }
    // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO
    $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                               VALUES ('$id_traslado', '$lugardestraslado', '$domiciliodestraslado', '$municipiodestraslado', '$newmotivotraslado', '$fecha_alta', '$name')";
    $radddestinotraslado = $mysqli->query($adddestinotraslado);
    if ($radddestinotraslado) {
      $getiddesult2 = "select max(ID) As id from react_destinos_traslados";
      $rgetiddesult2 = $mysqli->query($getiddesult2);
      $fgetiddesult2 = $rgetiddesult2->fetch_assoc();
      $id_destrasladoult2 = $fgetiddesult2["id"];
      if (!empty($bloque_derecho_data['sujetos_ids'])) {
        $longitudizq = count($bloque_izquierdo_data['sujetos_ids']);
        echo "El número de sujetos es: " . $longitudizq;
        echo "<br>";
        $longitudder = count($bloque_derecho_data['sujetos_ids']);
        echo "El número de sujetos es: " . $longitudder;
        echo "<br>";
        $contarder = $longitudizq;
        // Recorremos cada ID de sujeto utilizando un bucle foreach
        foreach ($bloque_derecho_data['sujetos_ids'] as $sujeto_id){
          $contarder = $contarder + 1;
          $varcompartido = 'COMPARTIDO-'.$idtrasladounico.'-'.$contarder;
          // Limpiamos el ID actual por seguridad, siguiendo tu estructura con $mysqli
          $id_seguro = $mysqli->real_escape_string($sujeto_id);
          // Definimos la consulta SQL utilizando la variable actual
          $qry_sujeto = "SELECT * FROM datospersonales WHERE id = '$id_seguro'";
          // Ejecutamos la consulta
          $result_sujeto = $mysqli->query($qry_sujeto);
          // Obtenemos los campos de la fila (igual que tu ejemplo con fetch_assoc)
          if ($row_sujeto = $result_sujeto->fetch_assoc()){
            $folexpsujder = $row_sujeto['folioexpediente'];
            $idsujder = $row_sujeto['id'];
            $checkalojamiento = "SELECT COUNT(*) as t FROM  medidas
                                                      WHERE id_persona = '$id_seguro' AND medida= 'VIII. ALOJAMIENTO TEMPORAL' AND estatus != 'CANCELADA'";
            $rcheckalojamiento = $mysqli->query($checkalojamiento);
            $fcheckalojamiento = $rcheckalojamiento->fetch_assoc();
            if ($fcheckalojamiento['t'] > 0) {
              $alojamiento_suj = 'SI';
            }else {
              $alojamiento_suj = 'NO';
            }
            $addsujetosentraslado = "INSERT INTO react_sujetos_traslado(id_traslado, folio_expediente, id_sujeto, resguardado, usuario, fecha_alta, id_destino, id_asistenciamedica, compartido)
            VALUES ('$id_traslado', '$folexpsujder', '$idsujder', '$alojamiento_suj', '$name', '$fecha_alta', '$id_destrasladoult2', 'N/A', '$varcompartido')";
            $raddsujetosentraslado = $mysqli->query($addsujetosentraslado);
          }
        }
      }
    }
}
?>
