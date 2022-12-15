<?php
//
$alotem = "SELECT DISTINCT id_persona FROM medidas
WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL'";
$ralotem = $mysqli->query($alotem);
while ($falotem = $ralotem->fetch_assoc()) {
  $idsujeto = $falotem['id_persona'];

  $suj2021 = "SELECT COUNT(*) as t FROM `medidas`
  WHERE id_persona = '$idsujeto' AND estatus != 'CANCELADA' AND medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (date_provisional BETWEEN '2021-06-01' AND '2021-12-31' OR date_definitva BETWEEN '2021-01-01' AND '2021-12-31')";
  $rsuj2021 = $mysqli->query($suj2021);
  $fsuj2021 = $rsuj2021->fetch_assoc();

  $suj2022 = "SELECT COUNT(*) as t FROM `medidas`
  WHERE id_persona = '$idsujeto' AND estatus != 'CANCELADA' AND medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (date_provisional BETWEEN '2022-01-01' AND '2022-12-31' OR date_definitva BETWEEN '2022-01-01' AND '2022-12-31')";
  $rsuj2022 = $mysqli->query($suj2022);
  $fsuj2022 = $rsuj2022->fetch_assoc();

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

      echo "<tr bgcolor="; if($falotem4['estatus'] === 'CANCELADA'){
        echo 'yellow';
      } else{
        echo 'white';
      } echo ">";
        echo "<td style='text-align:center'>"; echo $falotem2['folioexpediente']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $falotem2['identificador']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fsuj2021['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fsuj2022['t']; echo "</td>";
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
          $date22 = '2022-12-14';
        }else {
          $date22 = $falotem4['date_ejecucion'];
        }
         // $date11;
         $date1 = '2022-06-01'; // pick up date
         $date2 = '2022-12-01'; // return date
         $datetime1 = new DateTime($date11);
         $datetime2 = new DateTime($date22);
         $interval = $datetime1->diff($datetime2);
         echo $interval->y . " año, " . $interval->m." mes y ".$interval->d." dia";
         echo "<br />";
         // Total amount of days
         echo $interval->days . " dias";
        echo "</td>";
        echo "</tr>";

  }
}
?>
