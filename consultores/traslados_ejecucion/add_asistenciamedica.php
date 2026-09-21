<?php
if (!empty($asistencias_vinc)) {
  // Acceder al primer elemento (índice 0)
$idasismed = $asistencias_vinc[0];
// get datos de lugar, domicilio y municpio de la asistencia medica
$getdatosasismed = "SELECT * FROM agendar_asistencia WHERE id_asistencia ='$idasismed'";
$rgetdatosasismed =$mysqli->query($getdatosasismed);
$fgetdatosasismed = $rgetdatosasismed ->fetch_assoc();
$lugarasismed = $fgetdatosasismed['nombre_institucion'];
$domicilioasismed = $fgetdatosasismed['domicilio_institucion'];
$municipioasismed = $fgetdatosasismed['municipio_institucion'];
// ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO
$adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                           VALUES ('$id_traslado', '$lugarasismed', '$domicilioasismed', '$municipioasismed', '$instancia_traslado', '$fecha_alta', '$name')";
$radddestinotraslado = $mysqli->query($adddestinotraslado);
/////////////////////////////////
$longitud = count($asistencias_vinc);
$longitudder2 = count($bloque_derecho_data['sujetos_ids']);
$contarizq = 0;
if ($radddestinotraslado) {
$getiddesult = "select max(ID) As id from react_destinos_traslados";
$rgetiddesult = $mysqli->query($getiddesult);
$fgetiddesult = $rgetiddesult->fetch_assoc();
$id_destrasladoult = $fgetiddesult["id"];
  for ($i = 0; $i < count($asistencias_vinc); $i++) {
    if ($longitud === 1 && $longitudder2 === 0) {
      $varcompartido = 'UNICO';
    }else {
      $contarizq = $contarizq + 1;
      $varcompartido = 'COMPARTIDO-'.$idtrasladounico.'-'.$contarizq;
    }

      $id_asistencia_actual = $mysqli->real_escape_string($asistencias_vinc[$i]);
      $folio_exp_actual = $mysqli->real_escape_string($_POST['folio_expediente'][$id_asistencia_actual] ?? '');
      $id_sujeto_actual = $mysqli->real_escape_string($_POST['id_sujeto'][$id_asistencia_actual] ?? '');
      // get id sujeto
      $getid = "SELECT * FROM datospersonales WHERE identificador = '$id_sujeto_actual'";
      $rgetid = $mysqli->query($getid);
      $fgetid = $rgetid ->fetch_assoc();
      $idsujasismed = $fgetid['id'];
      $indice_secuencial = $i + 1;
      $nombre_variable_dinamica = "compartido" . $indice_secuencial;
      $GLOBALS[$nombre_variable_dinamica] = [
          'id_asistencia'    => $id_asistencia_actual,
          'folio_expediente' => $folio_exp_actual,
          'id_sujeto'        => $id_sujeto_actual,
          'tipo'             => $es_compartido . $indice_secuencial
      ];
      $addsujetosentraslado = "INSERT INTO react_sujetos_traslado(id_traslado, folio_expediente, id_sujeto, resguardado, usuario, fecha_alta, id_destino, id_asistenciamedica, compartido)
      VALUES ('$id_traslado', '$folio_exp_actual', '$idsujasismed', 'SI', '$name', '$fecha_alta', '$id_destrasladoult', '$id_asistencia_actual', '$varcompartido')";
      $raddsujetosentraslado = $mysqli->query($addsujetosentraslado);
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
                               VALUES ('$id_traslado', '$lugarasismed', '$domicilioasismed', '$municipioasismed', '$newmotivotraslado', '$fecha_alta', '$name')";
    $radddestinotraslado = $mysqli->query($adddestinotraslado);
    if ($radddestinotraslado) {
      $getiddesult2 = "select max(ID) As id from react_destinos_traslados";
      $rgetiddesult2 = $mysqli->query($getiddesult2);
      $fgetiddesult2 = $rgetiddesult2->fetch_assoc();
      $id_destrasladoult2 = $fgetiddesult2["id"];
      if (!empty($bloque_derecho_data['sujetos_ids'])) {
        $longitudizq = count($asistencias_vinc);
        $longitudder = count($bloque_derecho_data['sujetos_ids']);        
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
