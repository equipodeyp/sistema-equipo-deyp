<?php


$fichero = $_FILES["file"];


move_uploaded_file($fichero["tmp_name"], "archivos_subidos/".$fichero["name"]);

header("Location: " . $_SERVER["HTTP_REFERER"]);



// $currentLocation = 'archivos_subidos/'.$fichero["name"];
// $newLocation = 'sub/'.$fichero["name"];
// if(is_file($currentLocation))
// {
//   $moved = rename($currentLocation, $newLocation);
// }
// if($moved)
// {
//   echo "File moved successfully";
// }
?>