<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
$totalcol1 = 0;
$totalcol2 = 0;
$sumatotal = 0;
$solicitudesrecibidas = "SELECT nombreautoridad, COUNT(DISTINCT folioexpediente) AS total FROM autoridad
WHERE fechasolicitud BETWEEN '$dateinicio' AND '$datetermino'
GROUP BY nombreautoridad ORDER BY total DESC, nombreautoridad ASC";
$rsolicitudesrecibidas = $mysqli->query($solicitudesrecibidas);
while ($fsolicitudesrecibidas = $rsolicitudesrecibidas->fetch_assoc()) {
  $nameautoridad = $fsolicitudesrecibidas['nombreautoridad'];
  $solicitudes_col1 = "SELECT COUNT(*) AS total FROM autoridad
  WHERE nombreautoridad = '$nameautoridad' AND fechasolicitud BETWEEN '$dateinicio_col1' AND '$datefin_col1'";
  $rsolicitudes_col1 = $mysqli->query($solicitudes_col1);
  $fsolicitudes_col1 = $rsolicitudes_col1->fetch_assoc();
  $totalcol1 = $totalcol1 + $fsolicitudes_col1['total'];
  $solicitudes_col2 = "SELECT COUNT(*) AS total FROM autoridad
  WHERE nombreautoridad = '$nameautoridad' AND fechasolicitud BETWEEN '$dateinicio_col2' AND '$datefin_col2'";
  $rsolicitudes_col2 = $mysqli->query($solicitudes_col2);
  $fsolicitudes_col2 = $rsolicitudes_col2->fetch_assoc();
  $totalfila = $fsolicitudes_col1['total'] + $fsolicitudes_col2['total'];
  $totalcol2 = $totalcol2 + $fsolicitudes_col2['total'];
  $sumatotal = $sumatotal + $totalfila;
  echo "<tr style='border: 3px solid black;'>";
  echo "<td style='text-align:left; border: 3px solid black;'>"; echo $nameautoridad; echo "</b>"; echo"</td>";
  echo "<td style='text-align:center; border: 3px solid black;'>"; echo "<b>"; echo $fsolicitudes_col1['total']; echo "</b>"; echo"</td>";
  echo "<td style='text-align:center; border: 3px solid black;'>"; echo "<b>"; echo $fsolicitudes_col2['total']; echo "</b>"; echo"</td>";
  echo "<td style='text-align:center; border: 3px solid black;'>"; echo "<b>"; echo $totalfila; echo "</b>"; echo"</td>";
  echo "</tr>";
}
////////////////////////////////////////////////////////////////////////////////
echo "<tr style='border: 3px solid black;'>";
echo "<td style='text-align:right; border: 3px solid black;'>"; echo "<b>"; echo "TOTAL"; echo "</b>"; echo "</td>";
echo "<td style='text-align:center; border: 3px solid black;'>"; echo "<b>"; echo $totalcol1; echo "</b>"; echo "</td>";
echo "<td style='text-align:center; border: 3px solid black;'>"; echo "<b>"; echo $totalcol2; echo "</b>"; echo "</td>";
echo "<td style='text-align:center; border: 3px solid black;'>"; echo "<b>"; echo $sumatotal; echo "</b>"; echo "</td>";
echo "</tr>";
?>
