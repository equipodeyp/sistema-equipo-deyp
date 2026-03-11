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
  if ($ftotst['t'] > 0) {
    echo "<tr >";
    echo "<td style='text-align:left; border: 3px solid black;'>"; echo $fstexp['nombre']; echo "</td>";
    echo "<td style='text-align:center; border: 3px solid black;'>"; echo $ftotst['t']; echo "</td>";
    echo "</tr>";
  }
}
echo "<tr bgcolor=''>";
echo "<td style='text-align:right; border: 3px solid black;'>"; echo 'TOTAL DE EXPEDIENTES'; echo "</td>";
echo "<td style='text-align:center; border: 3px solid black;'>"; echo $ftotexp['t']; echo "</td>";
echo "</tr>";
?>
