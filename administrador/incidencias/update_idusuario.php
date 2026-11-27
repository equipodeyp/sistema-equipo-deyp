<?php
require '../conexion.php';
$actualizaciones = [
    'estadistica1' => '210016704',
    'estadistica3' => '210018126'
];
$mysqli->begin_transaction();
try {
    $stmt = $mysqli->prepare("UPDATE incidencias SET id_usuario = ? WHERE id_usuario = ?");
    if (!$stmt) {
        throw new Exception("Error al preparar la consulta: " . $mysqli->error);
    }
    foreach ($actualizaciones as $viejoId => $nuevoId) {
        $stmt->bind_param("ss", $nuevoId, $viejoId);

        if (!$stmt->execute()) {
            throw new Exception("Error al actualizar '$viejoId': " . $stmt->error);
        }
    }
    $mysqli->commit();
    $stmt->close();
} catch (Exception $e) {
    $mysqli->rollback();
    if (isset($stmt) && $stmt instanceof mysqli_stmt) {
        $stmt->close();
    }
    error_log($e->getMessage());
}
?>
