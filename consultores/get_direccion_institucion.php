<?php


require 'conexion.php';

$id_institucion = $mysqli->real_escape_string($_POST['id']);


$sql = "SELECT* FROM instituciones_medicas WHERE id = $id_institucion";
$resultado = $mysqli->query($sql);

$respuesta = "<option disabled selected value=''>SELECCIONA EL DOMICILIO</option>";

while($row = $resultado->fetch_assoc()){
    $respuesta .= "<option value='".$row['id']."'>".$row['domicilio']."</option>";
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);


?>