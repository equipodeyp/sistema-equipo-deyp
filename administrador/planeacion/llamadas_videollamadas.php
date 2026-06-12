<?php
// 2. Tu consulta SQL corregida
$sql = "SELECT react_actividad.folio_expediente, datospersonales.identificador, react_actividad.fecha, react_contacto_familiar.nombre

FROM react_actividad

JOIN react_actividad_ejecucion
ON react_actividad.id_actividad = react_actividad_ejecucion.id
AND react_actividad.id_subdireccion = '4'
AND react_actividad.id_actividad = '3'
AND react_actividad.fecha

JOIN datospersonales
ON react_actividad.id_sujeto = datospersonales.id

JOIN react_contacto_familiar
ON react_actividad.clasificacion = react_contacto_familiar.contactoid
WHERE react_actividad.fecha BETWEEN '2026-01-01' AND '2026-12-31'
ORDER BY react_actividad.fecha ASC";

$result = $mysqli->query($sql);

// Guardamos los datos en un array para usarlos en HTML y JS
$datos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $datos[] = $row;
    }
}
$consecutivo = 0;
foreach ($datos as $fila):
  $consecutivo = $consecutivo +1;
?>
<tr>
    <td style="text-align:center; border: 1px solid black;"><?php echo $consecutivo; ?></td>
    <td style="text-align:center; border: 1px solid black;"><?php echo htmlspecialchars($fila['folio_expediente']); ?></td>
    <td style="text-align:center; border: 1px solid black;"><?php echo htmlspecialchars($fila['identificador']); ?></td>
    <td style="text-align:center; border: 1px solid black;"><?php echo htmlspecialchars($fila['fecha']); ?></td>
    <td style="text-align:center; border: 1px solid black;"><?php echo htmlspecialchars($fila['nombre']); ?></td>
</tr>
<?php endforeach; ?>
