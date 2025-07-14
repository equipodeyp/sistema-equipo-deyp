<?php
$count = 0;
 $año_actual = date('Y');
//  "<br>";
 $mes_actual = date('m');
//  "<br>";
 $dias_mes_actual = date('t');
//  "<br>";
 $fechainicial = $año_actual.'-'.$mes_actual.'-01';
//  "<br>";
 $fechafinal = $año_actual.'-'.$mes_actual.'-'.$dias_mes_actual;
// echo "<br>";
$resgmetas = "SELECT * FROM medidas
WHERE date_ejecucion BETWEEN '$fechainicial' AND '$fechafinal' AND clasificacion = 'RESGUARDO'
ORDER BY date_ejecucion ASC";
$rresgmetas = $mysqli->query($resgmetas);
while ($fresgmetas = $rresgmetas->fetch_assoc()) {
  $count++;
  // echo $muestra = 'Informe_Exp_01/2025-EGG-Custodia Policial o Domiciliaria';
  // echo "<br>";
  // echo $fresgmetas['medida'];
  // echo "<br>";
  $folioexpediente = $fresgmetas['folioexpediente'];
  $idsujeto = $fresgmetas['id_persona'];
  $cadena = $fresgmetas['medida'];
$resultado = strrchr($cadena, ".");
if ($resultado !== false) {
    $resultado = substr($resultado, 1); // Eliminar el punto inicial
    // echo $resultado; // Salida: txt
}
  // echo "<br>";
  $cadena = $resultado;
   $str = mb_strtolower($cadena);
// $cadena_mayuscula = ucwords($cadena);
// echo 'altay baja'.$cadena_mayuscula; // Output: Hola Mundo
// echo "<br>";
// function convertirAMinusculasExceptoPrimeraLetra($cadena) {
//   $primeraLetra = strtoupper(substr($cadena, 0, 1));
//   $restoCadena = strtolower(substr($cadena, 1));
//   return $primeraLetra . $restoCadena;
// }
//
// $texto = $cadena;
// $resultado2 = convertirAMinusculasExceptoPrimeraLetra($texto);
// echo $resultado2; // Output: Ejemplo
// echo "<br>";
$cadena_mayuscula2 = ucwords($str);
// echo '+++++++'.$cadena_mayuscula2.'+++++++'; // Output: Hola Mundo
// echo "<br>";
// echo "Informe_Exp_11/2022-MAMF-Salvaguarda De La Integridad Personal";
// echo "<br>";
  $getexpinfo = "SELECT * FROM expediente WHERE fol_exp = '$folioexpediente'";
  $rgetexpinfo = $mysqli->query($getexpinfo);
  $fgetexpinfo = $rgetexpinfo->fetch_assoc();
  $numexpediente = $fgetexpinfo['num_consecutivo'];
  $añoexpediente = $fgetexpinfo['año'];
   // $numero_de_tres_digitos = "123";
$dos_primeros_digitos = substr($numexpediente, 1, 2);
// echo $dos_primeros_digitos; // Output: 12

   $fgetexpinfo['año'];

  $getsujinfo = "SELECT * FROM datospersonales WHERE id = '$idsujeto'";
  $rgetsujinfo = $mysqli->query($getsujinfo);
  $fgetsujinfo = $rgetsujinfo->fetch_assoc();
   $fgetsujinfo['identificador'];

  $cadena = $fgetsujinfo['identificador'];
  //
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



  $miTexto = $str;
  $resultados = contarLetrasPorPalabra($miTexto);
  $arraytextmedida =array();
  foreach ($resultados as $palabra => $cantidadLetras) {
    // echo "La palabra '$palabra' tiene $cantidadLetras letras.\n";
    if ($cantidadLetras > 3) {
      // echo "------>hay que convertir a mayuscula la primera letra=======>";
       $getpalabramayuscula = ucwords($palabra);
      array_push($arraytextmedida, $getpalabramayuscula);
    }else{
      //  "------>se deja en minuscula=======>";
       $getpalabramayuscula = $palabra;
      array_push($arraytextmedida, $getpalabramayuscula);
    }
    // echo "<br>";
  }
  // print_r($arraytextmedida);
  // echo "<br>";
  // var_dump($arraytextmedida);
  // echo "<br>";
 //  echo 'Informe_Exp_'.$dos_primeros_digitos.'/'.$añoexpediente.'-'.$texto.'-';
 //  foreach($arraytextmedida as $numero) {
 //    echo $numero.' ';
 // }



?>
<tr>
  <td><?php echo $count; ?></td>
  <td><?php   echo 'Informe_Exp_'.$dos_primeros_digitos.'/'.$añoexpediente.'-'.$texto.'-';
    foreach($arraytextmedida as $numero) {
      echo $numero.' ';
   } ?></td>
   <td><?php echo date("d/m/Y", strtotime($fresgmetas['date_ejecucion'])); ?></td>
</tr>
<?php
}

function contarLetrasPorPalabra($texto) {
  $palabras = str_word_count($texto, 1); // Obtiene un array de palabras
  $resultados = [];

  foreach ($palabras as $palabra) {
    $resultados[$palabra] = strlen($palabra);
  }

  return $resultados;
}
?>
