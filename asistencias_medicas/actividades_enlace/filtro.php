<?php
sleep(1);
include('config.php');



$tipo_consulta = $_POST['tipo_consulta'];
$usuario = $_POST['usuario'];
$actividad = $_POST['actividad'];

$fechaInit = date("Y-m-d", strtotime($_POST['f_inicio']));
$fecha_fin  = date("Y-m-d", strtotime($_POST['f_fin']));

if ($tipo_consulta === 'GLOBAL'){

$sqlReact = ("SELECT react_actividad_enlace.nombre, react_actividad.clasificacion, react_actividad.unidad_medida, 
            react_actividad.cantidad, react_actividad.fecha, react_subdireccion.subdireccion, react_actividad.usuario

            FROM react_actividad

            JOIN react_actividad_enlace 
            ON react_actividad.id_actividad = react_actividad_enlace.id 
            AND react_actividad.fecha BETWEEN '$fechaInit' AND '$fecha_fin'

            JOIN react_subdireccion 
            ON react_actividad.id_subdireccion = react_subdireccion.id
            AND react_subdireccion.subdireccion = 'SUBDIRECCIÓN DE ENLACE INTERINSTITUCIONAL' 

            ORDER BY react_actividad_enlace.nombre ASC");

}

else if ($tipo_consulta === 'POR USUARIO' && $actividad === 'Todas'){
$sqlReact = ("SELECT react_actividad_enlace.nombre, react_actividad.clasificacion, react_actividad.unidad_medida, 
            react_actividad.cantidad, react_actividad.fecha, react_subdireccion.subdireccion, react_actividad.usuario

            FROM react_actividad

            JOIN react_actividad_enlace 
            ON react_actividad.id_actividad = react_actividad_enlace.id 
            AND react_actividad.usuario = '$usuario'
            AND react_actividad.fecha BETWEEN '$fechaInit' AND '$fecha_fin'

            JOIN react_subdireccion 
            ON react_actividad.id_subdireccion = react_subdireccion.id
            AND react_subdireccion.subdireccion = 'SUBDIRECCIÓN DE ENLACE INTERINSTITUCIONAL'

            ORDER BY react_actividad_enlace.nombre ASC");

}

else {
$sqlReact = ("SELECT react_actividad_enlace.nombre, react_actividad.clasificacion, react_actividad.unidad_medida, 
            react_actividad.cantidad, react_actividad.fecha, react_subdireccion.subdireccion, react_actividad.usuario

            FROM react_actividad

            JOIN react_actividad_enlace 
            ON react_actividad.id_actividad = react_actividad_enlace.id 
            AND react_actividad.usuario = '$usuario'
            AND react_actividad.id_actividad = '$actividad'
            AND react_actividad.fecha BETWEEN '$fechaInit' AND '$fecha_fin'

            JOIN react_subdireccion 
            ON react_actividad.id_subdireccion = react_subdireccion.id
            AND react_subdireccion.subdireccion = 'SUBDIRECCIÓN DE ENLACE INTERINSTITUCIONAL'

            ORDER BY react_actividad_enlace.nombre ASC");

}

$query = mysqli_query($con, $sqlReact);
//print_r($sqlReact);
$total   = mysqli_num_rows($query);
echo '<strong>Total: </strong> ('. $total .')';


?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ACTIVIDAD</th>
            <th scope="col">CLASIFICACIÓN</th>
            <th scope="col">UNIDAD DE MEDIDA</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col">FECHA</th>
        </tr>
    </thead>
    <?php
    $i = 1;
    while ($dataRow = mysqli_fetch_array($query)) { ?>
        <tbody>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $dataRow['nombre'] ; ?></td>
                <td><?php echo $dataRow['clasificacion'] ; ?></td>
                <td><?php echo $dataRow['unidad_medida'] ; ?></td>
                <td><?php echo $dataRow['cantidad'] ; ?></td>
                <td><?php echo $dataRow['fecha'] ; ?></td>
            </tr>
        </tbody>
    <?php } ?>
</table>