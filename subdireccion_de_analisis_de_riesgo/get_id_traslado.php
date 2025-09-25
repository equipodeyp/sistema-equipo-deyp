<?php


require 'conexion.php';

$id_sujeto = $mysqli->real_escape_string($_POST['id_sujeto_tras']);


$sql = "SELECT idtrasladounico
                                                    
FROM react_sujetos_traslado

JOIN react_traslados
ON react_sujetos_traslado.id_traslado = react_traslados.id

JOIN datospersonales
ON react_sujetos_traslado.id_sujeto = datospersonales.id
AND datospersonales.identificador = '$id_sujeto'

ORDER BY react_traslados.fecha DESC";
$resultado = $mysqli->query($sql);

$respuesta = "<option disabled selected value=''>ID TRASLADO</option>";

while($row = $resultado->fetch_assoc()){
    $respuesta .= "<option value='".$row['idtrasladounico']."'>".$row['idtrasladounico']."</option>";
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);


?>