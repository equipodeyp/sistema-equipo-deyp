<?php
$auxsum = 0;
$getrondin = "SELECT * FROM react_actividad
WHERE react_actividad.id_subdireccion = 4 AND react_actividad.id_actividad = 6";
$rgetrondin = $mysqli->query($getrondin);
while ($fgetrondin = $rgetrondin->fetch_assoc()) {
  $auxsum = $auxsum + 1;
  $idunico = $fgetrondin['id_sujeto'];
  $ultimosCinco = substr($fgetrondin['folio_expediente'], -8);
  $getinfosujeto = "SELECT * FROM datospersonales WHERE id = '$idunico'";
  $rgetinfosujeto = $mysqli->query($getinfosujeto);
  $fgetinfosujeto  = $rgetinfosujeto ->fetch_assoc();
  $cadena = $fgetinfosujeto['identificador'];
  // echo "<br>";
  $caracter = "-";
  // Encuentra la posición del carácter
  $posicion = strpos($cadena, $caracter);
  // Si el carácter existe en la cadena
  if ($posicion !== false) {
    // Extrae la parte de la cadena hasta el carácter
    $parte = substr($cadena, 0, $posicion);
    // Imprime la parte de la cadena
    $parte; // Imprimirá "Hola"
  }
  $texto = $parte;
  // Convertir el texto en un array de caracteres
  $arrayCaracteres = str_split($texto);
  // Unir los caracteres con un punto
  $textoConPuntos = implode(".", $arrayCaracteres);
  $concatenar_rondin ='Ruta_Exp_'.$ultimosCinco.'_'.$textoConPuntos.'.';
  echo "<tr>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $auxsum; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo date("d/m/Y", strtotime($fgetrondin['fecha'])); echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fgetrondin['entidad_municipio']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fgetrondin['folio_expediente']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fgetinfosujeto['identificador']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $fgetrondin['kilometraje']; echo "</td>";
  echo "<td style='text-align:center; border: 1px solid black;'>"; echo $concatenar_rondin; echo "</td>";
  echo "</tr>";
}

?>
