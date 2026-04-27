<?php
$contador = 0;
$infsuj = "SELECT * FROM datospersonales
                    WHERE estatus = 'SUJETO PROTEGIDO' OR estatus = 'PERSONA PROPUESTA'";
$finfsuj = $mysqli->query($infsuj);
while ($rinfsuj = $finfsuj-> fetch_assoc()) {
  $contador = $contador + 1;
  // varialbes de consulta
  $folexp = $rinfsuj['folioexpediente'];
  $idsuj = $rinfsuj['id'];
  $nombre_completo = $rinfsuj['nombrepersona'].' '.$rinfsuj['paternopersona'].' '.$rinfsuj['maternopersona'];
  // Convertimos a mayúsculas con soporte para caracteres especiales (UTF-8)
  $nombre_completo_mayusculas = mb_strtoupper($nombre_completo, 'UTF-8');
  // consulta a tabla de expedientes
  $datexp = "SELECT * FROM expediente WHERE fol_exp = '$folexp'";
  $fdatexp = $mysqli->query($datexp);
  $rdatexp = $fdatexp->fetch_assoc();
  // consulta a tabla de autoridad
  $dataut = "SELECT * FROM autoridad WHERE id_persona = '$idsuj'";
  $fdataut = $mysqli -> query ($dataut);
  $rdataut = $fdataut ->fetch_assoc();
  $nombreauroridad = $rdataut['nombreautoridad'];
  $getareaautoridad = "SELECT * FROM nombreautoridad WHERE nombre = '$nombreauroridad'";
  $rgetareaautoridad = $mysqli->query($getareaautoridad);
  $fgetareaautoridad = $rgetareaautoridad->fetch_assoc();
  // consulta para verificar si esta alojado en un centro de proteccion
  $checkalojamiento = "SELECT COUNT(*) as t FROM  medidas
                                            WHERE id_persona = '$idsuj' AND medida= 'VIII. ALOJAMIENTO TEMPORAL' AND estatus != 'CANCELADA'";
  $rcheckalojamiento = $mysqli->query($checkalojamiento);
  $fcheckalojamiento = $rcheckalojamiento->fetch_assoc();
  if ($fcheckalojamiento['t'] > 0) {
    $alojamiento_suj = 'SI';
  }else {
    $alojamiento_suj = 'NO';
  }
  //
  $inicio = new DateTime($rdatexp['fecha_nueva']);
$hoy = new DateTime();
$diff = $inicio->diff($hoy);

$partes = [];
if ($diff->y > 0) $partes[] = $diff->y . ($diff->y == 1 ? ' año' : ' años');
if ($diff->m > 0) $partes[] = $diff->m . ($diff->m == 1 ? ' mes' : ' meses');
if ($diff->d > 0) $partes[] = $diff->d . ($diff->d == 1 ? ' día' : ' días');

$resultado = implode(', ', $partes);
$resultado = preg_replace('/, ([^,]+)$/', ' y $1', $resultado);
if (empty($resultado)) $resultado = "Hoy";

// NUEVA VARIABLE: Validación de si es mayor o menor a un año
// Comprobamos si tiene al menos 1 año, o si tiene 1 año exacto con meses/días extra
if ($diff->y >= 1) {
    $estado_periodo = "MAYOR";
} else {
    $estado_periodo = "MENOR";
}
$fecha_nacimiento = new DateTime($rinfsuj['fechanacimientopersona']);
$hoy = new DateTime();
$edad = $hoy->diff($fecha_nacimiento);
if ($edad->y >= 0 && $edad->y <= 11) {
  $edadgruposujeto =  'NIÑAS Y NIÑOS';
}elseif ($edad->y >= 12 && $edad->y < 18) {
  $edadgruposujeto =  'ADOLESCENTES';
}elseif ($edad->y >= 18 && $edad->y <= 59) {
  $edadgruposujeto =  'ADULTOS JÓVENES';
}elseif ($edad->y >= 60) {
  $edadgruposujeto =  'ADULTOS MAYORES';
}
// echo "Tiempo: " . $resultado . " (Es " . $estado_periodo . " a un año)";
  echo "<tr>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $contador; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $rinfsuj['folioexpediente']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo date("d/m/Y", strtotime($rdatexp['fecha_nueva'])); echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $rdataut['nombreautoridad']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $rinfsuj['calidadpersona']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $rinfsuj['sexopersona']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $rinfsuj['identificador']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $rinfsuj['estatus']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $rinfsuj['relacional']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $rinfsuj['estatus']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $rinfsuj['reingreso']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $alojamiento_suj; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $edad->y . " años";; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $edadgruposujeto; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $estado_periodo; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $nombre_completo_mayusculas; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $resultado; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fgetareaautoridad['area']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fgetareaautoridad['id_area']; echo "</td>";
  echo "</tr>";
}
?>
