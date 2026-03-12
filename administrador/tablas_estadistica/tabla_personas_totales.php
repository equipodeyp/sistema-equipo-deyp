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
  //
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
  echo "</tr>";
}
?>
