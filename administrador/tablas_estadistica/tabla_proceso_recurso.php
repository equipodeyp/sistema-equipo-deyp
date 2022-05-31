<?php
$epr = "SELECT * FROM etapa_proc";
$repr = $mysqli->query($epr);
while ($ferp = $repr->fetch_assoc()) {
  $proceso = $ferp['nombre'];
  //
  $p2022 = "SELECT COUNT(DISTINCT folioexpediente) as t from procesopenal
  INNER JOIN expediente on procesopenal.folioexpediente = expediente.fol_exp
  WHERE procesopenal.etapaprocedimiento = '$proceso'  AND expediente.año = '2022'";
  $rp2022 = $mysqli->query($p2022);
  $fp2022 = $rp2022->fetch_assoc();
  //
  $ptotal = "SELECT COUNT(DISTINCT folioexpediente) as t from procesopenal
  INNER JOIN expediente on procesopenal.folioexpediente = expediente.fol_exp
  WHERE procesopenal.etapaprocedimiento = '$proceso'";
  $rptotal = $mysqli->query($ptotal);
  $fptotal = $rptotal->fetch_assoc();
  //
  $p2021 = "SELECT COUNT(DISTINCT folioexpediente) as t from procesopenal
  INNER JOIN expediente on procesopenal.folioexpediente = expediente.fol_exp
  WHERE procesopenal.etapaprocedimiento = '$proceso'  AND expediente.año = '2021'";
  $rp2021 = $mysqli->query($p2021);
  if ($p2021) {
    while ($fp2021 = mysqli_fetch_assoc($rp2021)) {
      echo "<tr >";
      echo "<td style='text-align:center'>"; echo $ferp['nombre']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fp2021['t']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fp2022['t']; echo "</td>";
      echo "<td style='text-align:center'>"; echo $fptotal['t']; echo "</td>";
      echo "</tr>";
    }
  }
}
$ptotal2021 = "SELECT COUNT(DISTINCT folioexpediente) as t from procesopenal
INNER JOIN expediente on procesopenal.folioexpediente = expediente.fol_exp
WHERE expediente.año = '2021'";
$rptotal2021 = $mysqli->query($ptotal2021);
$fptotal2021 = $rptotal2021->fetch_assoc();
//
$ptotal2022 = "SELECT COUNT(DISTINCT folioexpediente) as t from procesopenal
INNER JOIN expediente on procesopenal.folioexpediente = expediente.fol_exp
WHERE expediente.año = '2022'";
$rptotal2022 = $mysqli->query($ptotal2022);
$fptotal2022 = $rptotal2022->fetch_assoc();
//
$ptotalp = "SELECT COUNT(DISTINCT folioexpediente) as t from procesopenal
INNER JOIN expediente on procesopenal.folioexpediente = expediente.fol_exp";
$rptotalp = $mysqli->query($ptotalp);
$fptotalp = $rptotalp->fetch_assoc();
//
echo "<tr bgcolor = 'yellow'>";
echo "<td style='text-align:center'>"; echo 'TOTAL'; echo "</td>";
echo "<td style='text-align:center'>"; echo $fptotal2021['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fptotal2022['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fptotalp['t']; echo "</td>";
echo "</tr>";
?>
