<?php


require 'conexion.php';

$id_sujeto = $mysqli->real_escape_string($_POST['id_sujeto']);


$sql = "SELECT id_asistencia FROM solicitud_asistencia WHERE id_sujeto = '$id_sujeto' ORDER BY fecha_solicitud DESC";
$resultado = $mysqli->query($sql);

$respuesta = "<option disabled selected value=''>ID ASISTENCIA</option>";

while($row = $resultado->fetch_assoc()){
    $respuesta .= "<option value='".$row['id_asistencia']."'>".$row['id_asistencia']."</option>";
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);


?>