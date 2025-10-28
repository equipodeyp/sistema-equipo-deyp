<?php
sleep(1);
include('config.php');



$tipo_consulta = $_POST['tipo_consulta'];
$usuario = $_POST['usuario'];
$actividad = $_POST['actividad'];

$fechaInit = date("Y-m-d", strtotime($_POST['f_inicio']));
$fecha_fin  = date("Y-m-d", strtotime($_POST['f_fin']));

// echo $tipo_consulta;
// echo $usuario; 
// echo $actividad;
// echo $fechaInit;
// echo $fecha_fin;

if ($tipo_consulta === 'CONVENIO'){

$sqlReact = ("SELECT * FROM evaluacion_persona WHERE tipo_convenio != '' AND fecha_firma <= '2025-10-31' AND fecha_firma >= '2025-10-01'");

}

else if ($tipo_consulta === 'ESTUDIO TECNICO' ){
$sqlReact = ("SELECT * FROM evaluacion_persona WHERE tipo_convenio != '' AND fecha_firma <= '2025-10-31' AND fecha_firma >= '2025-10-01'");


}

else {
$sqlReact = ("SELECT * FROM evaluacion_persona WHERE tipo_convenio != '' AND fecha_firma <= '2025-10-31' AND fecha_firma >= '2025-10-01'");

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
            <th scope="col">ID</th>
             <th scope="col">FECHA DE FIRMA</th>
        </tr>
    </thead>
    <?php
    $i = 1;
    while ($dataRow = mysqli_fetch_array($query)) { ?>
        <tbody>
            <tr>
                <td><?php echo $i++; ?></td>
                <td style="text-align: left;"><?php echo $dataRow['nombre'] ; ?></td>
                 <td><?php echo $dataRow['fecha'] ; ?></td>
            </tr>
        </tbody>
    <?php } ?>
</table>