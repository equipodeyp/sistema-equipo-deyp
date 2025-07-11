

<?php

require 'conexion.php';

$id_tipo = $mysqli->real_escape_string($_POST['folio_expediente']);

$sql = "SELECT DISTINCT identificador FROM datospersonales WHERE folioexpediente = '$id_tipo' ORDER BY identificador ASC";
$resultado = $mysqli->query($sql);

$respuesta = "<option disabled selected value=''>ID SUJETO</option>
                <option value='NO APLICA'>NO APLICA</option>";

while($row = $resultado->fetch_assoc()){
    $respuesta .= "<option value='".$row['identificador']."'>".$row['identificador']."</option>";
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);

?>