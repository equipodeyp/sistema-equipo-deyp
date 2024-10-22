<?php
/////////////////////////////////////////////////////////////////////////////////////
$numconsec = 0;
$selecpersnorel = "SELECT * FROM datospersonales";
$rselecpersnorel = $mysqli->query($selecpersnorel);
$idpersonsunico = array();
$cont = 0;
while ($row = @mysqli_fetch_array($rselecpersnorel)) {
  $identificadorcorto = strtoupper(rtrim($row['nombrepersona'])).' '.strtoupper(rtrim($row['paternopersona'])).' '.strtoupper(rtrim($row['maternopersona']));
  $unwanted_array = array(    'Á'=>'A', 'É'=>'E', 'Í'=>'I', 'Ó'=>'O', 'Ú'=>'U',
                              'á'=>'A', 'é'=>'E', 'í'=>'I', 'ó'=>'O', 'ú'=>'U', 'Ñ'=>'N', 'ñ'=>'N' );
  // $identificadorcorto = substr($identificador, 0, -4);
  $identificadorcorto2 = strtr( $identificadorcorto, $unwanted_array );
   $idpersonsunico[$cont] = $identificadorcorto2;
   $cont++;
}

foreach ($idpersonsunico as $valor) {
    // echo $valor;
}
// var_dump($idpersonsunico);

// echo "<br>";
// if(count($idpersonsunico) > count(array_unique($idpersonsunico))){
//   echo "¡Hay repetidos!";
// }else{
//   echo "No hay repetidos";
// }

$nombre = implode(', ',$idpersonsunico);    // Creamos cadena a partir del array
$nom_sim_repet = array_unique($idpersonsunico);    // Eliminamos los elementos repetidos
$nombre_sin_repetir = implode(', ',$nom_sim_repet);    // Creamos cadena a partir del array

$nombre2 = array_unique($idpersonsunico);

$v_comunes1 = array_diff_assoc($idpersonsunico, $nombre2);
$v_comunes2 = array_unique($v_comunes1);    // Eliminamos los elementos repetidos
    sort($v_comunes2);    // Orden ascendente en array
$repetidos = implode(', ',$v_comunes2);     // Creamos cadena a partir del array

$v_unicos1 = array_diff($idpersonsunico, $v_comunes2);
    sort($v_unicos1);    // Orden ascendente en array
$unicos = implode(', ',$v_unicos1);     // Creamos cadena a partir del array

// echo "
// Todos los elementos: <b>$nombre</b> <br />
//
// Eliminamos las repeticiones: <b>$nombre_sin_repetir</b> <br />
//
// Elementos repetidos: <b>$repetidos</b> <br />
//
// Elementos unicos: <b>$unicos</b>";
//
// echo "<br>";
// $longitud = count($idpersonsunico);
// echo $longitud;
// echo "<br>";
// $longitud2 = count($nom_sim_repet);
// echo $longitud2;
// echo "<br>";
// $longitud3 = count($v_comunes2);
// echo $longitud3;
// echo "<br>";
// $longitud4 = count($v_unicos1);
// echo $longitud4;
// echo "<br>";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$cont2 = 0;
$selecpersnorel2 = "SELECT * FROM datospersonales";
$rselecpersnorel2 = $mysqli->query($selecpersnorel2);
while ($fselecpersnorel2 = $rselecpersnorel2->fetch_assoc()){
  $id_sujp = $fselecpersnorel2['id'];
  $folexpper = $fselecpersnorel2['folioexpediente'];
  $id_unico = $fselecpersnorel2['identificador'];
  //////////////////////////////////////////////////////////////////////////////
  $suj2021 = "SELECT COUNT(*) as t FROM `medidas`
  WHERE id_persona = '$id_sujp' AND medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (date_provisional BETWEEN '2021-06-01' AND '2021-12-31' OR date_definitva BETWEEN '2021-01-01' AND '2021-12-31')";
  $rsuj2021 = $mysqli->query($suj2021);
  $fsuj2021 = $rsuj2021->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $suj2022 = "SELECT COUNT(*) as t FROM `medidas`
  WHERE id_persona = '$id_sujp' AND medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (date_provisional BETWEEN '2022-01-01' AND '2022-12-31' OR date_definitva BETWEEN '2022-01-01' AND '2022-12-31' OR date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31')";
  $rsuj2022 = $mysqli->query($suj2022);
  $fsuj2022 = $rsuj2022->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $suj2023 = "SELECT COUNT(*) as t FROM `medidas`
  WHERE id_persona = '$id_sujp' AND medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (date_provisional BETWEEN '2023-01-01' AND '2023-12-31' OR date_definitva BETWEEN '2023-01-01' AND '2023-12-31' OR date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31')";
  $rsuj2023 = $mysqli->query($suj2023);
  $fsuj2023 = $rsuj2023->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $exped = "SELECT * FROM expediente WHERE fol_exp = '$folexpper'";
  $rexped = $mysqli->query($exped);
  $fexped = $rexped->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $detinc = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_sujp'";
  $rdetinc = $mysqli->query($detinc);
  $fdetinc = $rdetinc->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $autoridadsol = "SELECT * FROM autoridad WHERE id_persona = '$id_sujp'";
  $rautoridadsol = $mysqli->query($autoridadsol);
  $fautoridadsol = $rautoridadsol->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $evaluacionsuj = "SELECT COUNT(*) AS total FROM evaluacion_persona WHERE id_unico = '$id_unico'";
  $revaluacionsuj = $mysqli->query($evaluacionsuj);
  $fevaluacionsuj = $revaluacionsuj->fetch_assoc();
  //////////////////////////////////////////////////////////////////////////////
  $detincsujinc = "SELECT * FROM procesopenal WHERE id_persona = '$id_sujp'";
  $rdetincsujinc = $mysqli->query($detincsujinc);
  $fdetincsujinc = $rdetincsujinc->fetch_assoc();
  // echo $fevaluacionsuj['total'];
  //////////////////////////////////////////////////////////////////////////////
  $id_permed = "SELECT DISTINCT id_persona FROM medidas
  WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$id_sujp'";
  $rid_permed = $mysqli->query($id_permed);
  while ($fid_permed = $rid_permed->fetch_assoc()) {
    $cont2 = $cont2 + 1;
    $id_sujp2 = $fid_permed['id_persona'];
    //////////////////////////////////////////////////////////////////////////////
    $tmedinicial = "SELECT * FROM medidas WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND  id_persona = '$id_sujp2'
                                    ORDER by id ASC limit 1";
    $rtmedinicial = $mysqli->query($tmedinicial);
    $ftmedinicial = $rtmedinicial->fetch_assoc();
    //////////////////////////////////////////////////////////////////////////////
    $tmedinfinal = "SELECT * FROM medidas WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND  id_persona = '$id_sujp2'
                                    ORDER by id DESC limit 1";
    $rtmedinfinal = $mysqli->query($tmedinfinal);
    $ftmedinfinal = $rtmedinfinal->fetch_assoc();
    //////////////////////////////////////////////////////////////////////////////
    echo "<tr>";
    echo "<td style='text-align:center'>"; echo $cont2; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fselecpersnorel2['folioexpediente']; echo "</td>";
    echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($fexped['fecha_nueva'])); echo "</td>";
    echo "<td style='text-align:center'>"; echo $fselecpersnorel2['identificador']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fselecpersnorel2['calidadpersona']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fselecpersnorel2['estatus']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fselecpersnorel2['sexopersona']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fselecpersnorel2['edadpersona']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fselecpersnorel2['grupoedad']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fdetinc['convenio']; echo "</td>";
    echo "<td style='text-align:center'>"; if ($fdetinc['fecha_inicio'] !== '0000-00-00') {
      echo date("d/m/Y", strtotime($fdetinc['fecha_inicio']));
    }  echo "</td>";
    echo "<td style='text-align:center'>"; echo $fsuj2021['t']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fsuj2022['t']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fsuj2023['t']; echo "</td>";
    ////////////////////////////////////////////////////////////////////////////////////////////
    echo "<td style='text-align:center'>"; if ($ftmedinicial['date_provisional'] === '0000-00-00') {
      echo date("d/m/Y", strtotime($ftmedinicial['date_definitva']));
    }else {
      echo date("d/m/Y", strtotime($ftmedinicial['date_provisional']));
    } echo "</td>";
    ///////////////////////////////////////////////////////////////////////////////////////////////
    echo "<td style='text-align:center'>"; if ($ftmedinfinal['date_ejecucion'] === '0000-00-00') {
      echo 'EN EJECUCION';
    }else {
      echo date("d/m/Y", strtotime($ftmedinfinal['date_ejecucion']));
    } echo "</td>";
    //////////////////////////////////////////////////////////////////////////////////////////////
    echo "<td style='text-align:center'>"; if ($ftmedinicial['date_provisional'] === '0000-00-00') {
      $date11 = $ftmedinicial['date_definitva'];
    }else {
      $date11 = $ftmedinicial['date_provisional'];
    }
    if ($ftmedinfinal['date_ejecucion'] === '0000-00-00') {
      $date22 = date('Y/m/d');
    }else {
      $date22 = $ftmedinfinal['date_ejecucion'];
    }
     $datetime1 = new DateTime($date11);
     $datetime2 = new DateTime($date22);
     $interval = $datetime1->diff($datetime2);
     // echo  $interval->days . " días<br>";
     // echo "<br>";
     echo $interval->y . " año, " . $interval->m." mes y ".$interval->d." dia";
     echo "</td>";
     ////////////////////////////////////////////////////////////////////////////////////////////
    echo "<td style='text-align:center'>"; echo $ftmedinfinal['estatus']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fselecpersnorel2['relacional']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fselecpersnorel2['reingreso']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fselecpersnorel2['estatusprograma']; echo "</td>";
    echo "<td style='text-align:center'>"; echo $fautoridadsol['nombreautoridad']; echo "</td>";
    echo "<td style='text-align:center'>"; if ($fdetincsujinc['delitoprincipal'] === 'OTRO') {
      echo $fdetincsujinc['otrodelitoprincipal'];
    }else {
      echo $fdetincsujinc['delitoprincipal'];
    } echo "</td>";
    echo "<td style='text-align:center'>"; if ($fselecpersnorel2['estatus'] === 'PERSONA PROPUESTA') {
      echo "EN ELABORACION";
    }elseif ($fselecpersnorel2['estatus'] === 'SUJETO PROTEGIDO') {
      // echo "PROTEGIDO";
      if ($fevaluacionsuj['total'] > 0) {
        $evalsujultimo = "SELECT * FROM evaluacion_persona WHERE id_unico = '$id_unico' ORDER BY id DESC LIMIT 1";
        $revalsujultimo = $mysqli->query($evalsujultimo);
        $fevalsujultimo = $revalsujultimo->fetch_assoc();
        echo date("d/m/Y", strtotime($fevalsujultimo['fecha_vigencia']));
      }else {
        $detincsujprot = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_sujp'";
        $rdetincsujprot = $mysqli->query($detincsujprot);
        $fdetincsujprot = $rdetincsujprot->fetch_assoc();
        echo date("d/m/Y", strtotime($fdetincsujprot['fecha_vigencia']));
      }
    }elseif ($fselecpersnorel2['estatus'] === 'DESINCORPORADO') {
      if ($fevaluacionsuj['total'] > 0) {
        $evalsujultimo = "SELECT * FROM evaluacion_persona WHERE id_unico = '$id_unico' ORDER BY id DESC LIMIT 1";
        $revalsujultimo = $mysqli->query($evalsujultimo);
        $fevalsujultimo = $revalsujultimo->fetch_assoc();
        echo date("d/m/Y", strtotime($fevalsujultimo['fecha_aut']));
      }else {
        $detincsujprot = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_sujp'";
        $rdetincsujprot = $mysqli->query($detincsujprot);
        $fdetincsujprot = $rdetincsujprot->fetch_assoc();
        echo date("d/m/Y", strtotime($fdetincsujprot['date_autorizacion']));
      }
    }elseif ($fselecpersnorel2['estatus'] === 'NO INCORPORADO') {
      $detincsujprot = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_sujp'";
      $rdetincsujprot = $mysqli->query($detincsujprot);
      $fdetincsujprot = $rdetincsujprot->fetch_assoc();
      echo date("d/m/Y", strtotime($fdetincsujprot['date_autorizacion']));
    } echo "</td>";
    echo "</tr>";
  }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
