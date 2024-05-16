<?php


require 'conexion.php';

$id = $mysqli->real_escape_string($_POST['id']);


$sql = "SELECT* FROM instituciones_medicas WHERE id = $id";
$resultado = $mysqli->query($sql);

$respuesta = "<option disabled selected value=''>SELECCIONA EL MUNICIPIO</option>";

while($row = $resultado->fetch_assoc()){
    $respuesta .= "<option value='".$row['id']."'>".$row['municipio']."</option>";
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);


?>