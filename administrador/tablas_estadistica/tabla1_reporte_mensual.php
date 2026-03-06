<?php
include("calculardatesreportemensual.php");
////////////////////////////////////////////////////////////////////////////////
function capitalizarPalabrasLargas($texto) {
  // 1. Convertimos todo a minúsculas primero para estandarizar
  $texto = mb_strtolower($texto, 'UTF-8');

  // 2. Buscamos cada palabra (\b indica límites de palabra)
  return preg_replace_callback('/\b\w+\b/u', function($coincidencias) {
      $palabra = $coincidencias[0];

      // Condición: si tiene 3 o más letras, capitalizar la primera
      if (mb_strlen($palabra, 'UTF-8') >= 4) {
          return mb_ucfirst($palabra);
      }

      // Si tiene menos de 3, devolverla en minúsculas
      return $palabra;
  }, $texto);
}

// Función auxiliar para manejar correctamente caracteres especiales (tildes, ñ)
function mb_ucfirst($string, $encoding = 'UTF-8') {
  $firstChar = mb_substr($string, 0, 1, $encoding);
  $then = mb_substr($string, 1, null, $encoding);
  return mb_strtoupper($firstChar, $encoding) . $then;
}
////////////////////////////////////////////////////////////////////////////////
$totalcol1 = 0;
$totalcol2 = 0;
$sumatotal = 0;
$solicitudesrecibidas = "SELECT nombreautoridad, COUNT(DISTINCT folioexpediente) AS total FROM autoridad
WHERE fechasolicitud BETWEEN '$dateinicio' AND '$datetermino'
GROUP BY nombreautoridad ORDER BY total DESC, nombreautoridad ASC";
$rsolicitudesrecibidas = $mysqli->query($solicitudesrecibidas);
while ($fsolicitudesrecibidas = $rsolicitudesrecibidas->fetch_assoc()) {


// Ejemplo de uso:
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
  echo "<td style='text-align:left; border: 3px solid black;'>"; echo capitalizarPalabrasLargas("$nameautoridad"); echo "</b>"; echo"</td>";
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
