<?php
$auxsum = 0;
$auxsum2 = 0;
$sujetosidrecor = array();
$sujetosidrecor2 = array();
$conteotrasdestino001 = "SELECT * FROM react_sujetos_traslado
INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
ORDER BY react_traslados.fecha ASC";
$rconteotrasdestino001 = $mysqli->query($conteotrasdestino001);
while ($fconteotrasdestino001 = $rconteotrasdestino001->fetch_assoc()){
  $iddd = intVal($fconteotrasdestino001['id_sujeto']);
  array_push($sujetosidrecor, $iddd);
}
// Verificar si el array tiene al menos dos elementos
// if (count($sujetosidrecor) >= 3) {
//     // Iterar sobre el array
//     for ($i = 0; $i < count($sujetosidrecor); $i++) {
//         // Obtener el valor anterior
//         $anterior = ($i > 0) ? $sujetosidrecor[$i - 1] : null;
//         $anterior2 = ($i > 0) ? $sujetosidrecor[$i - 2] : null;
//         // Obtener el valor actual
//         $actual = $sujetosidrecor[$i];
//         $actual2 = $sujetosidrecor[$i+1];
//         // Comparar si el valor anterior es igual al valor actual
//         if ($i > 0 && $anterior2 == $actual) {
//              // echo "Valor igual: 3" . PHP_EOL;
//              array_push($sujetosidrecor2, 3);
//         }elseif ($i > 0 && $anterior == $actual) {
//            // "Valecho or igual: 2" . PHP_EOL;
//            array_push($sujetosidrecor2, 2);
//         } else {
//             //Si es diferente, imprimimos el valor actual.
//              // echo "Valor desigual: 1" . PHP_EOL;
//              array_push($sujetosidrecor2, 1);
//         }
//     }
// }
$conteotrasdestino = "SELECT * FROM react_sujetos_traslado
INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
ORDER BY react_traslados.fecha ASC";
$rconteotrasdestino = $mysqli->query($conteotrasdestino);
while ($fconteotrasdestino = $rconteotrasdestino->fetch_assoc()) {
  $auxsum = $auxsum +1;
  $valdestino = $fconteotrasdestino['id_destino'];

  //
  $idsujet = $fconteotrasdestino['id_sujeto'];
  $checkdentro = "SELECT COUNT(*) AS resguardo FROM medidas
  WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$idsujet'";
  $rcheckdentro = $mysqli->query($checkdentro);
  $fcheckdentro = $rcheckdentro->fetch_assoc();
  // echo $fcheckdentro['resguardo'];
  if ($fcheckdentro['resguardo'] > 0) {
    $resguardado = 'SI';
  }else {
    $resguardado = 'NO';
  }
  //
  // $conteotrasdestino2 = "SELECT COUNT(*) AS pt FROM react_sujetos_traslado
  //  INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
  //  WHERE react_sujetos_traslado.id_sujeto = '$idsujetorecor' AND react_sujetos_traslado.id_traslado ='$numtrasladorecor'";
  // $rconteotrasdestino2 = $mysqli->query($conteotrasdestino2);
  // $fconteotrasdestino2 = $rconteotrasdestino2->fetch_assoc();

  $resmotivodes = $fconteotrasdestino['motivo'];

  $restrasladounico = $fconteotrasdestino['idtrasladounico'];
  $resmunicipiodes = $fconteotrasdestino['municipio'];
  $cadena = $resmotivodes;
  $texto_minusculas = mb_strtolower($cadena, 'UTF-8');
  $texto_minusculas2 = mb_strtolower($resmunicipiodes, 'UTF-8');
  // $texto_minusculas; // Imprime "hola mundo, éste es un ejemplo."
  // echo "<br>";
  $foo = ucfirst($texto_minusculas);
  $foo2= ucfirst($texto_minusculas2);
  // echo "<br>";
   $ultimosCinco = substr($fconteotrasdestino['folio_expediente'], -7);
   $idtrascont = substr($fconteotrasdestino['idtrasladounico'], 0, 3);
   // $fconteotrasdestino['identificador'];
  $cadena = $fconteotrasdestino['identificador'];
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
  $concatenacion = 'Traslado_Exp_'.$ultimosCinco.'-'.$textoConPuntos.'.-'.$foo.'-'.$idtrascont;
?>
<tr>
  <td style="text-align:center; border: 1px solid black;"><?php  echo $auxsum; ?></td>
  <td style="text-align:center; border: 1px solid black;"><?php echo $fconteotrasdestino['idtrasladounico']; ?></td>
  <td style="text-align:center; border: 1px solid black;"><?php echo date("d/m/Y", strtotime($fconteotrasdestino['fecha'])); ?></td>
  <td style="text-align:center; border: 1px solid black;"><?php echo $concatenacion; ?></td>
  <td style="text-align:center; border: 1px solid black;"><?php echo $fconteotrasdestino['municipio']; ?></td>
  <td style="text-align:center; border: 1px solid black;"><?php echo $fconteotrasdestino['motivo']; ?></td>
  <td style="text-align:center; border: 1px solid black;"><?php echo $fconteotrasdestino['folio_expediente']; ?></td>
  <td style="text-align:center; border: 1px solid black;"><?php echo $fconteotrasdestino['identificador']; ?></td>
  <td style="text-align:center; border: 1px solid black;"><?php echo $resguardado; ?></td>
</tr>
<?php
$auxsum2 = $auxsum2 +1;
}
?>
