<?php
//
$numconsec = 0;
$selecpersnorel = "SELECT * FROM datospersonales WHERE relacional = 'NO'";
$rselecpersnorel = $mysqli->query($selecpersnorel);
while ($fselecpersnorel = $rselecpersnorel->fetch_assoc()) {


  $id_sujp = $fselecpersnorel['id'];
  $name = $fselecpersnorel['nombrepersona'];
  $primerapell = $fselecpersnorel['paternopersona'];
  $segundoapell = $fselecpersnorel['maternopersona'];
  // echo $id_sujp;
  // echo '<br>';
  $alotem = "SELECT DISTINCT id_persona FROM medidas
  WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND estatus != 'CANCELADA' AND id_persona = '$id_sujp'";
  $ralotem = $mysqli->query($alotem);
  while ($falotem = $ralotem->fetch_assoc()) {
    // $folsujeto = $falotem['folioexpediente'];
    $idsujeto = $falotem['id_persona'];
    // echo '<br>';
    $alotem2 = "SELECT * FROM datospersonales
    WHERE id = '$idsujeto'";
    $ralotem2 = $mysqli->query($alotem2);
    while ($falotem2 = $ralotem2->fetch_assoc()) {
        $folsujeto = $falotem2['folioexpediente'];
        // echo $idsujeto.'*****'.$name.'*****'.$primerapell.'*****'.$segundoapell.'*****'.$folsujeto.'<br>';
        $selecpersnorel2 = "SELECT * FROM datospersonales WHERE relacional = 'SI'";
        $rselecpersnorel2 = $mysqli->query($selecpersnorel2);
        while ($fselecpersnorel2 = $rselecpersnorel2->fetch_assoc()) {
          $id_sujp2 = $fselecpersnorel2['id'];
          $name2 = $fselecpersnorel2['nombrepersona'];
          $primerapell2 = $fselecpersnorel2['paternopersona'];
          $segundoapell2 = $fselecpersnorel2['maternopersona'];
          $folsujeto2 = $fselecpersnorel2['folioexpediente'];
          // echo $id_sujp2;
          // echo '<br>';
          $alotem2 = "SELECT DISTINCT id_persona FROM medidas
          WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND estatus != 'CANCELADA' AND id_persona = '$id_sujp2'";
          $ralotem2 = $mysqli->query($alotem2);
          while ($falotem2 = $ralotem2->fetch_assoc()) {
            $numconsec = $numconsec +1;
            // $folsujeto = $falotem2['folioexpediente'];
            $idsujeto2 = $falotem2['id_persona'];
            echo $numconsec.'----->';
            if ($name === $name2 && $primerapell === $primerapell2 && $segundoapell === $segundoapell2) {
              echo $idsujeto2.'*****'.$name2.'*****'.$primerapell2.'*****'.$segundoapell2.'*****'.$folsujeto2.'<br>';
            }else {
              echo $idsujeto.'*****'.$name.'*****'.$primerapell.'*****'.$segundoapell.'*****'.$folsujeto.'<br>';
            }
          }
        }
    }
  }
}

// $selecpersnorel2 = "SELECT * FROM datospersonales WHERE relacional = 'SI'";
// $rselecpersnorel2 = $mysqli->query($selecpersnorel2);
// while ($fselecpersnorel2 = $rselecpersnorel2->fetch_assoc()) {
//   $id_sujp2 = $fselecpersnorel2['id'];
//   $name2 = $fselecpersnorel2['nombrepersona'];
//   $primerapell2 = $fselecpersnorel2['paternopersona'];
//   $segundoapell3 = $fselecpersnorel2['maternopersona'];
//   $folsujeto2 = $fselecpersnorel2['folioexpediente'];
//   // echo $id_sujp2;
//   // echo '<br>';
//   $alotem2 = "SELECT DISTINCT id_persona FROM medidas
//   WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$id_sujp2'";
//   $ralotem2 = $mysqli->query($alotem2);
//   while ($falotem2 = $ralotem2->fetch_assoc()) {
//     // $folsujeto = $falotem2['folioexpediente'];
//     $idsujeto2 = $falotem2['id_persona'];
//     echo $idsujeto2.'*****'.$name2.'*****'.$primerapell2.'*****'.$segundoapell3.'*****'.$folsujeto2.'<br>';
//   }
// }

$auxcontador = 0;
$alotem = "SELECT DISTINCT id_persona FROM medidas
WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL'";
$ralotem = $mysqli->query($alotem);
while ($falotem = $ralotem->fetch_assoc()) {
  // $folsujeto = $falotem['folioexpediente'];
  $idsujeto = $falotem['id_persona'];


  $suj2021 = "SELECT COUNT(*) as t FROM `medidas`
  WHERE id_persona = '$idsujeto' AND estatus != 'CANCELADA' AND medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (date_provisional BETWEEN '2021-06-01' AND '2021-12-31' OR date_definitva BETWEEN '2021-01-01' AND '2021-12-31')";
  $rsuj2021 = $mysqli->query($suj2021);
  $fsuj2021 = $rsuj2021->fetch_assoc();

  $suj2022 = "SELECT COUNT(*) as t FROM `medidas`
  WHERE id_persona = '$idsujeto' AND estatus != 'CANCELADA' AND medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (date_provisional BETWEEN '2022-01-01' AND '2022-12-31' OR date_definitva BETWEEN '2022-01-01' AND '2022-12-31' OR date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31')";
  $rsuj2022 = $mysqli->query($suj2022);
  $fsuj2022 = $rsuj2022->fetch_assoc();

  $suj2023 = "SELECT COUNT(*) as t FROM `medidas`
  WHERE id_persona = '$idsujeto' AND estatus != 'CANCELADA' AND medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (date_provisional BETWEEN '2023-01-01' AND '2023-12-31' OR date_definitva BETWEEN '2023-01-01' AND '2023-12-31' OR date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31')";
  $rsuj2023 = $mysqli->query($suj2023);
  $fsuj2023 = $rsuj2023->fetch_assoc();

  $alotem3 = "SELECT * FROM medidas
  WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$idsujeto'";
  $ralotem3 = $mysqli->query($alotem3);
  $falotem3 = $ralotem3->fetch_assoc();

  $alotem4 = "SELECT * FROM medidas
  WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$idsujeto'
  ORDER BY id DESC";
  $ralotem4 = $mysqli->query($alotem4);
  $falotem4 = $ralotem4->fetch_assoc();

  $alotem2 = "SELECT * FROM datospersonales
  WHERE id = '$idsujeto'";
  $ralotem2 = $mysqli->query($alotem2);
  while ($falotem2 = $ralotem2->fetch_assoc()) {
      $folsujeto = $falotem2['folioexpediente'];
      $auxcontador = $auxcontador + 1;

      $expedientesuj = "SELECT * FROM expediente
      WHERE fol_exp = '$folsujeto'";
      $rexpedientesuj = $mysqli->query($expedientesuj);
      $fexpedientesuj = $rexpedientesuj->fetch_assoc();

      $conveniosuj = "SELECT * FROM determinacionincorporacion
      WHERE id = '$idsujeto'";
      $rconveniosuj = $mysqli->query($conveniosuj);
      $fconveniosuj = $rconveniosuj->fetch_assoc();

      echo "<tr bgcolor="; if($falotem4['estatus'] === 'CANCELADA'){
        echo 'yellow';
      } else{
        echo 'white';
      } echo ">";
        echo "<td style='text-align:center'>"; echo $auxcontador; echo "</td>";
        echo "<td style='text-align:center'>"; echo $falotem2['folioexpediente']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fexpedientesuj['fecha_nueva']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $falotem2['identificador']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $falotem2['estatus']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $falotem2['sexopersona']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $falotem2['edadpersona']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $falotem2['grupoedad']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fconveniosuj['convenio']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fconveniosuj['fecha_inicio']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fsuj2021['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fsuj2022['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fsuj2023['t']; echo "</td>";
        echo "<td style='text-align:center'>"; if ($falotem3['date_provisional'] === '0000-00-00') {
          echo $falotem3['date_definitva'];
        }else {
          echo $falotem3['date_provisional'];
        }  echo "</td>";
        echo "<td style='text-align:center'>"; if ($falotem4['date_ejecucion'] === '0000-00-00') {
          echo "en ejecucion";
        }else {
          echo $falotem4['date_ejecucion'];
        } echo "</td>";
        echo "<td style='text-align:center'>";
        if ($falotem3['date_provisional'] === '0000-00-00') {
          $date11 = $falotem3['date_definitva'];
        }else {
          $date11 = $falotem3['date_provisional'];
        }
        if ($falotem4['date_ejecucion'] === '0000-00-00') {
          $date22 = date('Y/m/d');
        }else {
          $date22 = $falotem4['date_ejecucion'];
        }
         $datetime1 = new DateTime($date11);
         $datetime2 = new DateTime($date22);
         $interval = $datetime1->diff($datetime2);
         echo $interval->y . " año, " . $interval->m." mes y ".$interval->d." dia";
         echo "<br />";
         // Total amount of days
         echo $interval->days . " dias";
        echo "</td>";
        echo "<td style='text-align:center'>"; echo $falotem4['estatus']; echo "</td>";
        echo "</tr>";

  }
}
?>
