<?php
//
$totexp = "SELECT COUNT(*) AS t from expediente";
$rtotexp = $mysqli->query($totexp);
$ftotexp = $rtotexp->fetch_assoc();
//

//
$stexp = "SELECT * FROM statusexpediente";
$rstexp = $mysqli->query($stexp);
while ($fstexp = $rstexp->fetch_assoc()) {
  $status = $fstexp['nombre'];
  $totst = "SELECT COUNT(*) AS t from expediente
  INNER JOIN statusseguimiento ON expediente.fol_exp = statusseguimiento.folioexpediente
  WHERE statusseguimiento.status = '$status'";
  $rtotst = $mysqli->query($totst);
  $ftotst = $rtotst->fetch_assoc();
  echo "<tr >";
  echo "<td style='text-align:left'>"; echo $fstexp['nombre']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $ftotst['t']; echo "</td>";
  echo "</tr>";
}
echo "<tr bgcolor='yellow'>";
echo "<td style='text-align:right'>"; echo 'TOTAL DE EXPEDIENTES'; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotexp['t']; echo "</td>";
echo "</tr>";
?>
