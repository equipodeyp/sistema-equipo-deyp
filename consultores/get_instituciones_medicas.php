<?php

require 'conexion.php';

$id_tipo = $mysqli->real_escape_string($_POST['id_tipo']);

$sql = "SELECT* FROM instituciones_medicas WHERE id_tipo = $id_tipo ORDER BY nombre ASC";
$resultado = $mysqli->query($sql);

$respuesta = "<option disabled selected value=''>SELECCIONA UNA INSTITUCIÓN</option>";

while($row = $resultado->fetch_assoc()){
    $respuesta .= "<option value='".$row['id']."'>".$row['nombre']."</option>";
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);

?>