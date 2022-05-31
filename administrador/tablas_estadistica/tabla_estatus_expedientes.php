<?php
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
  echo "<td style='text-align:center'>"; echo $fstexp['nombre']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $ftotst['t']; echo "</td>";
  echo "</tr>";
}
//
$totexp = "SELECT COUNT(*) AS t from expediente";
$rtotexp = $mysqli->query($totexp);
$ftotexp = $rtotexp->fetch_assoc();
//
echo "<tr bgcolor='yellow'>";
echo "<td style='text-align:center'>"; echo 'total de expedientes'; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotexp['t']; echo "</td>";
echo "</tr>";
?>
