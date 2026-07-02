<?php
// 1. Incluye aquí tu archivo de conexión habitual
include("../conexion.php");

if (isset($_POST['actividad'])) {
    $actividad = $_POST['actividad'];

    // Cambia 'OPCION_UNO' por el valor real (<option value="X">) de tu primer select
    if ($actividad === '6') {
        // Primera Consulta (Excluye Alojamiento Temporal)
        $select1 = "SELECT m.folioexpediente
FROM medidas m
INNER JOIN statusseguimiento s ON m.folioexpediente = s.folioexpediente
WHERE (s.status = 'EN EJECUCION' || s.status = 'ANALISIS')
  AND m.estatus = 'EN EJECUCION'
GROUP BY m.folioexpediente
HAVING COUNT(DISTINCT m.id_persona) > SUM(m.medida = 'VIII. ALOJAMIENTO TEMPORAL')
   OR SUM(m.medida = 'VIII. ALOJAMIENTO TEMPORAL') = 0
ORDER BY m.folioexpediente ASC;";
}elseif ($actividad === '8') {
  $select1 = "SELECT DISTINCT datospersonales.folioexpediente
  FROM datospersonales
  WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' OR datospersonales.estatus = 'PERSONA PROPUESTA'
  ORDER BY datospersonales.id ASC";
} else {
        // Segunda Consulta (Solo Alojamiento Temporal)
        $select1 = "SELECT DISTINCT medidas.folioexpediente
                    FROM medidas
                    INNER JOIN statusseguimiento ON medidas.folioexpediente = statusseguimiento.folioexpediente
                    WHERE (medidas.medida ='VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus='EN EJECUCION')
                      AND (statusseguimiento.status ='EN EJECUCION' || statusseguimiento.status ='ANALISIS')
                    ORDER BY medidas.id ASC";
    }

    // Ejecución de la consulta seleccionada
    $answer1 = $mysqli->query($select1);

    // Renderizado de las opciones de respuesta
    if ($answer1 && $answer1->num_rows > 0) {
        while($valores1 = $answer1->fetch_assoc()){
            $result_folio = $valores1['folioexpediente'];
            echo "<option value='$result_folio'>$result_folio</option>";
        }
    } else {
        echo "<option disabled>No se encontraron expedientes activos</option>";
    }
}
?>
