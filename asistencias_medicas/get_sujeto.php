

<?php

require 'conexion.php';

$id_tipo = $mysqli->real_escape_string($_POST['folio_expediente']);

$sql = "SELECT DISTINCT id_sujeto FROM solicitud_asistencia WHERE folio_expediente = '$id_tipo' ORDER BY id_sujeto ASC";
$resultado = $mysqli->query($sql);

$respuesta = "<option disabled selected value=''>ID SUJETO</option>";

while($row = $resultado->fetch_assoc()){
    $respuesta .= "<option value='".$row['id_sujeto']."'>".$row['id_sujeto']."</option>";
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);

?>