<?php
/////////////////////////////////////////////////////////////////////////////////////
$numconsec = 0;
$selecpersnorel = "SELECT * FROM datospersonales";
$rselecpersnorel = $mysqli->query($selecpersnorel);
$idpersonsunico = array();
$cont = 0;
while ($row = @mysqli_fetch_array($rselecpersnorel)) {
  $identificador = $row['identificador'];
  $identificadorcorto = substr($identificador, 0, -4);
   $idpersonsunico[$cont] = $identificadorcorto;
   $cont++;
}

foreach ($idpersonsunico as $valor) {
    // echo $valor;
}
// var_dump($idpersonsunico);

echo "<br>";
// if(count($idpersonsunico) > count(array_unique($idpersonsunico))){
//   echo "¡Hay repetidos!";
// }else{
//   echo "No hay repetidos";
// }

$nombre = implode(', ',$idpersonsunico);    // Creamos cadena a partir del array
$nom_sim_repet = array_unique($idpersonsunico);    // Eliminamos los elementos repetidos
$nombre_sin_repetir = implode(', ',$nom_sim_repet);    // Creamos cadena a partir del array

$nombre2 = array_unique($idpersonsunico);

$v_comunes1 = array_diff_assoc($idpersonsunico, $nombre2);
$v_comunes2 = array_unique($v_comunes1);    // Eliminamos los elementos repetidos
    sort($v_comunes2);    // Orden ascendente en array
$repetidos = implode(', ',$v_comunes2);     // Creamos cadena a partir del array

$v_unicos1 = array_diff($idpersonsunico, $v_comunes2);
    sort($v_unicos1);    // Orden ascendente en array
$unicos = implode(', ',$v_unicos1);     // Creamos cadena a partir del array

echo "
Todos los elementos: <b>$nombre</b> <br />

Eliminamos las repeticiones: <b>$nombre_sin_repetir</b> <br />

Elementos repetidos: <b>$repetidos</b> <br />

Elementos unicos: <b>$unicos</b>";

echo "<br>";
$longitud = count($idpersonsunico);
echo $longitud;
echo "<br>";
$longitud2 = count($nom_sim_repet);
echo $longitud2;
echo "<br>";
$longitud3 = count($v_comunes2);
echo $longitud3;
echo "<br>";
$longitud4 = count($v_unicos1);
echo $longitud4;
echo "<br>";

?>
