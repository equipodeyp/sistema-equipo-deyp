<?php
$stexp = "SELECT * FROM estatuspersona";
$rstexp = $mysqli->query($stexp);
while ($fstexp = $rstexp->fetch_assoc()) {
  $status = $fstexp['nombre'];
  $per = "SELECT COUNT(*) AS t FROM datospersonales
  WHERE estatus = '$status' AND relacional = 'NO'";
  $rper = $mysqli->query($per);
  $fper = $rper->fetch_assoc();
  echo "<tr >";
  echo "<td style='text-align:center'>"; echo $fstexp['nombre']; echo "</td>";
  echo "<td style='text-align:center'>"; echo $fper['t']; echo "</td>";
  echo "</tr>";
}
//
$totexp = "SELECT COUNT(*) AS t from datospersonales
WHERE relacional = 'NO'";
$rtotexp = $mysqli->query($totexp);
$ftotexp = $rtotexp->fetch_assoc();
//
echo "<tr bgcolor='yellow'>";
echo "<td style='text-align:center'>"; echo 'TOTALDE PERSONAS'; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotexp['t']; echo "</td>";
echo "</tr>";
?>
