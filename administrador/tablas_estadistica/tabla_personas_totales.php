<?php
$contador = 0;
$suj = "SELECT * FROM datospersonales";
$rsuj = $mysqli->query($suj);
while ($fsuj = $rsuj->fetch_assoc()) {
  $expediente = $fsuj['folioexpediente'];
  $id_persona = $fsuj['id'];
  $ident_per = $fsuj['identificador'];
  // datos del EXPEDIENTE
  $proc = "SELECT * FROM expediente
           WHERE fol_exp = '$expediente'";
  $rproc = $mysqli->query($proc);
  $fproc = $rproc->fetch_assoc();
  // datos de la autoridad correspondiente
  $aut = "SELECT * FROM autoridad
          WHERE id_persona = '$id_persona'";
  $raut = $mysqli->query($aut);
  $faut = $raut->fetch_assoc();
  // datos del lugar de nacimiento
  $nac = "SELECT * FROM datosorigen
          WHERE id_persona = '$id_persona'";
  $rnac = $mysqli->query($nac);
  $fnac = $rnac->fetch_assoc();
  // domicilio actual
  $dom = "SELECT * FROM domiciliopersona
          WHERE id_persona = '$id_persona'";
  $rdom = $mysqli->query($dom);
  $fdom = $rdom->fetch_assoc();
  //si es incapaz mostrar informacion del tutor
  $inc = "SELECT * FROM tutor
          WHERE id_persona = '$id_persona'";
  $rinc = $mysqli->query($inc);
  $finc = $rinc->fetch_assoc();
  // proceso penal
  $procc = "SELECT * FROM procesopenal
          WHERE id_persona = '$id_persona'";
  $rprocc = $mysqli->query($procc);
  $fprocc = $rprocc->fetch_assoc();
  //valoracion juridica
  $valj = "SELECT * FROM valoracionjuridica
          WHERE id_persona = '$id_persona'";
  $rvalj = $mysqli->query($valj);
  $fvalj = $rvalj->fetch_assoc();
  //determinacion de la incorporacion
  $deti = "SELECT * FROM determinacionincorporacion
          WHERE id_persona = '$id_persona'";
  $rdeti = $mysqli->query($deti);
  $fdeti = $rdeti->fetch_assoc();
  //conteo de evaluacion individual
  $v = "SELECT COUNT(*) as t
  FROM  evaluacion_persona
  WHERE id_unico = '$ident_per'";
  $rv = $mysqli->query($v);
  $fv = $rv->fetch_assoc();
  // echo $fv['t'];
  // datos del EXPEDIENTE
  $status_seguimiento = "SELECT * FROM statusseguimiento
           WHERE folioexpediente = '$expediente'";
  $rstatus_seguimiento = $mysqli->query($status_seguimiento);
  $fstatus_seguimiento = $rstatus_seguimiento->fetch_assoc();
  //
  $estatusperant = $fsuj['estatus'];
  if ($estatusperant === 'NO INCORPORADO') {
    if ($fproc['fecha_nueva'] !== '0000-00-00' && $fdeti['date_desincorporacion']!== '0000-00-00') {
      // 2. Instanciar los objetos de fecha
    $fecha_inicial = new DateTime($fproc['fecha_nueva']);
    $fecha_final = new DateTime($fdeti['date_desincorporacion']);

    // 3. Calcular la diferencia
    $diferencia = $fecha_inicial->diff($fecha_final);

    $partes = [];

    // 4. Evaluar y omitir ceros
    if ($diferencia->y > 0) {
        $partes[] = $diferencia->y . ($diferencia->y == 1 ? ' año' : ' años');
    }
    if ($diferencia->m > 0) {
        $partes[] = $diferencia->m . ($diferencia->m == 1 ? ' mes' : ' meses');
    }
    if ($diferencia->d > 0) {
        $partes[] = $diferencia->d . ($diferencia->d == 1 ? ' día' : ' días');
    }

    // 5. Control para el mismo día
    if (empty($partes)) {
        $resultado = "1 día";
    } else {
        $ultimo = array_pop($partes);
        $resultado = $partes ? implode(', ', $partes) . ' y ' . $ultimo : $ultimo;
    }

    // echo "Hay " . $resultado . ".";
    }else {
      echo "--------------falta una fecha del sujeto  ".$id_persona;
    }
  }elseif ($estatusperant === 'DESINCORPORADO') {
    // 2. Instanciar objetos DateTime
    $fecha_inicial = new DateTime($fproc['fecha_nueva']);
    $fecha_final = new DateTime($fstatus_seguimiento['date_desincorporacion']);

    // 3. Calcular la diferencia
    $diferencia = $fecha_inicial->diff($fecha_final);

    $partes = [];

    // 4. Filtrar componentes mayores a cero
    if ($diferencia->y > 0) {
        $partes[] = $diferencia->y . ($diferencia->y == 1 ? ' año' : ' años');
    }
    if ($diferencia->m > 0) {
        $partes[] = $diferencia->m . ($diferencia->m == 1 ? ' mes' : ' meses');
    }
    if ($diferencia->d > 0) {
        $partes[] = $diferencia->d . ($diferencia->d == 1 ? ' día' : ' días');
    }

    // 5. Control para el mismo día u output formateado
    if (empty($partes)) {
        $resultado = "1 día";
    } else {
        $ultimo = array_pop($partes);
        $resultado = $partes ? implode(', ', $partes) . ' y ' . $ultimo : $ultimo;
    }

    // echo "Hay " . $resultado . ".";
  }else {
    // 2. Instanciar la fecha origen y el día de hoy (ignora la hora actual para comparar días puros)
  $fecha_inicial = new DateTime($fproc['fecha_nueva']);
  $fecha_final = new DateTime('today');

  // 3. Calcular la diferencia
  $diferencia = $fecha_inicial->diff($fecha_final);

  $partes = [];

  // 4. Filtrar componentes mayores a cero
  if ($diferencia->y > 0) {
      $partes[] = $diferencia->y . ($diferencia->y == 1 ? ' año' : ' años');
  }
  if ($diferencia->m > 0) {
      $partes[] = $diferencia->m . ($diferencia->m == 1 ? ' mes' : ' meses');
  }
  if ($diferencia->d > 0) {
      $partes[] = $diferencia->d . ($diferencia->d == 1 ? ' día' : ' días');
  }

  // 5. Control para el mismo día u output estructurado
  if (empty($partes)) {
      $resultado = "1 día";
  } else {
      $ultimo = array_pop($partes);
      $resultado = $partes ? implode(', ', $partes) . ' y ' . $ultimo : $ultimo;
  }

  // echo "Hay " . $resultado . ".";
  }
  // echo "<BR>";
  $contador = $contador + 1;
  echo "<tr>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $contador; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fsuj['folioexpediente']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fproc['sede']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo date("d/m/Y", strtotime($fproc['fecha_nueva'])); echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo date("d/m/Y", strtotime($faut['fechasolicitud_persona'])); echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $faut['idsolicitud']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo date("d/m/Y", strtotime($faut['fechasolicitud'])); echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $faut['nombreautoridad']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fsuj['nombrepersona']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fsuj['paternopersona']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fsuj['maternopersona']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fsuj['grupoedad']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fsuj['calidadpersona']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fsuj['sexopersona']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fprocc['delitoprincipal']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fprocc['otrodelitoprincipal']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fprocc['delitosecundario']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fprocc['otrodelitosecundario']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fprocc['etapaprocedimiento']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fprocc['numeroradicacion']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fsuj['identificador']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fvalj['resultadovaloracion']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fvalj['motivoprocedencia']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fdeti['multidisciplinario']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fdeti['incorporacion']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>";
  if ($fdeti['date_autorizacion'] != '0000-00-00') {
    echo date("d/m/Y", strtotime($fdeti['date_autorizacion']));
  } echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fdeti['id_analisis']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fdeti['convenio']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>";
  if ($fdeti['date_convenio'] != '0000-00-00') {
    echo date("d/m/Y", strtotime($fdeti['date_convenio']));
  } echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>";
  if ($fdeti['fecha_inicio'] != '0000-00-00') {
    echo date("d/m/Y", strtotime($fdeti['fecha_inicio']));
  } echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fdeti['vigencia']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fdeti['fecha_termino']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fdeti['id_convenio']; echo "</td>";
  if ($fv) {
    $t = "SELECT * FROM evaluacion_persona
    WHERE id_unico = '$ident_per'";
    $rt = $mysqli->query($t);
    while ($ft = $rt->fetch_assoc()) {

    }

  }
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fdeti['conclu_cancel']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fdeti['conclusionart35']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fdeti['otroart35']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; if ($fdeti['date_desincorporacion'] != '0000-00-00') {
    echo date("d/m/Y", strtotime($fdeti['date_desincorporacion']));
  } echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fsuj['estatus']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fsuj['relacional']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fsuj['estatusprograma']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fsuj['reingreso']; echo "</td>";
  $checkalojamiento = "SELECT COUNT(*) as t FROM  medidas
                                            WHERE id_persona = '$id_persona' AND medida= 'VIII. ALOJAMIENTO TEMPORAL' AND estatus != 'CANCELADA'";
  $rcheckalojamiento = $mysqli->query($checkalojamiento);
  $fcheckalojamiento = $rcheckalojamiento->fetch_assoc();
  if ($fcheckalojamiento['t'] > 0) {
    $alojamiento_suj = 'SI';
  }else {
    $alojamiento_suj = 'NO';
  }
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $alojamiento_suj; echo "</td>";
  $fecha_nacimiento = new DateTime($fsuj['fechanacimientopersona']);
  $hoy = new DateTime();
  $edad = $hoy->diff($fecha_nacimiento);
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $edad->y.' años'; echo "</td>";
  if ($edad->y >= 0 && $edad->y <= 11) {
    $edadgruposujeto =  'NIÑAS Y NIÑOS';
  }elseif ($edad->y >= 12 && $edad->y < 18) {
    $edadgruposujeto =  'ADOLESCENTES';
  }elseif ($edad->y >= 18 && $edad->y <= 59) {
    $edadgruposujeto =  'ADULTOS JÓVENES';
  }elseif ($edad->y >= 60) {
    $edadgruposujeto =  'ADULTOS MAYORES';
  }
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $edadgruposujeto; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $resultado; echo "</td>";
  echo "</tr>";
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Supongamos que este es tu array cargado desde la base de datos
// (Simulamos un caso con dos registros para el ejemplo)
// 0. Obtener la fecha de hoy limpia (sin horas)
$hoy = new DateTime('today');

$total_dias_acumulados = 0;
$tiene_registros_validos = false;
$fecha_expediente_string = null;

// ==========================================================================
// PASO 1: Obtener la fecha origen del Expediente
// ==========================================================================
$v_exp = "SELECT fecha_nueva FROM `expediente` WHERE fol_exp ='UPSIPPED/TOL/108/034/2022'";
$rv_exp = $mysqli->query($v_exp);

if ($fv_exp = $rv_exp->fetch_assoc()) {
    if (!empty($fv_exp['fecha_nueva']) && $fv_exp['fecha_nueva'] !== '0000-00-00') {
        $fecha_expediente_string = $fv_exp['fecha_nueva'];
    }
}

// ==========================================================================
// PASO 2: Procesar determinacionincorporacion y calcular brecha con Expediente
// ==========================================================================
$v2 = "SELECT fecha_inicio, fecha_vigencia
       FROM determinacionincorporacion
       WHERE id_persona = 94
       ORDER BY fecha_inicio ASC"; // Ordenamos para identificar el primer registro

$rv2 = $mysqli->query($v2);
$es_primer_registro_incorporacion = true;

while ($fv2 = $rv2->fetch_assoc()) {
    if (!empty($fv2['fecha_inicio']) && $fv2['fecha_inicio'] !== '0000-00-00') {

        $f_ini = new DateTime($fv2['fecha_inicio']);

        // SI ES EL PRIMER REGISTRO: Calculamos los días transcurridos desde el expediente
        if ($es_primer_registro_incorporacion && $fecha_expediente_string !== null) {
            $f_exp = new DateTime($fecha_expediente_string);
            if ($f_exp < $f_ini) {
                $diff_exp = $f_exp->diff($f_ini);
                // Sumamos estos días intermedios iniciales
                $total_dias_acumulados += $diff_exp->days;
            }
            $es_primer_registro_incorporacion = false; // Desactivar para las siguientes filas
        }

        // Evaluar la vigencia del registro actual de incorporación
        if (empty($fv2['fecha_vigencia']) || $fv2['fecha_vigencia'] === '0000-00-00') {
            $f_vig = clone $hoy;
        } else {
            $f_vig = new DateTime($fv2['fecha_vigencia']);
            if ($f_vig > $hoy) { $f_vig = clone $hoy; }
        }

        if ($f_ini > $f_vig) { continue; }

        $diff = $f_ini->diff($f_vig);
        $total_dias_acumulados += $diff->days + 1;
        $tiene_registros_validos = true;
    }
}

// ==========================================================================
// PASO 3: Procesar evaluacion_persona
// ==========================================================================
$v1 = "SELECT fecha_inicio, fecha_vigencia
       FROM evaluacion_persona
       WHERE id_unico = 'EMAV-034'";

$rv1 = $mysqli->query($v1);

while ($fv1 = $rv1->fetch_assoc()) {
    if (!empty($fv1['fecha_inicio']) && $fv1['fecha_inicio'] !== '0000-00-00') {
        $f_ini = new DateTime($fv1['fecha_inicio']);

        if (empty($fv1['fecha_vigencia']) || $fv1['fecha_vigencia'] === '0000-00-00') {
            $f_vig = clone $hoy;
        } else {
            $f_vig = new DateTime($fv1['fecha_vigencia']);
            if ($f_vig > $hoy) { $f_vig = clone $hoy; }
        }

        if ($f_ini > $f_vig) { continue; }

        $diff = $f_ini->diff($f_vig);
        $total_dias_acumulados += $diff->days + 1;
        $tiene_registros_validos = true;
    }
}

// ==========================================================================
// PROCESAMIENTO Y SALIDA FINAL UNIFICADA
// ==========================================================================
if (($tiene_registros_validos || $fecha_expediente_string !== null) && $total_dias_acumulados > 0) {

    // Proyectamos los días totales sobre una fecha base estática para la conversión
    $fecha_base = new DateTime('2026-01-01');
    $fecha_proyectada = clone $fecha_base;
    $fecha_proyectada->modify("+$total_dias_acumulados days");

    $diferencia_final = $fecha_base->diff($fecha_proyectada);

    $partes = [];

    if ($diferencia_final->y > 0) {
        $partes[] = $diferencia_final->y . ($diferencia_final->y == 1 ? ' año' : ' años');
    }
    if ($diferencia_final->m > 0) {
        $partes[] = $diferencia_final->m . ($diferencia_final->m == 1 ? ' mes' : ' meses');
    }
    if ($diferencia_final->d > 0) {
        $partes[] = $diferencia_final->d . ($diferencia_final->d == 1 ? ' día' : ' días');
    }

    if (empty($partes)) {
        $resultado = "1 día";
    } else {
        $ultimo = array_pop($partes);
        $resultado = $partes ? implode(', ', $partes) . ' y ' . $ultimo : $ultimo;
    }

    // echo "Hay " . $resultado . ".";

} else {
    // echo "No se pudieron calcular periodos válidos con los datos proporcionados.";
}





/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
