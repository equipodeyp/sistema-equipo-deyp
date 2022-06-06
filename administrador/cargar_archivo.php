<?php


$fichero = $_FILES["file"];


move_uploaded_file($fichero["tmp_name"], "../subdireccion_de_apoyo_tecnico_juridico/archivos_subidos_apoyo".$fichero["name"]);

header("Location: " . $_SERVER["HTTP_REFERER"]);


?>