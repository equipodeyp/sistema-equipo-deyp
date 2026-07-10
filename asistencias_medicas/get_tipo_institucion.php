<?php 

$conexion=mysqli_connect('localhost','root','','sistemafgjem');

$tipo_institucion=$_POST['tipo'];
$tipo = $tipo_institucion;

// $folio = 'UPSIPPED/TOL/113/015/2022';
// echo "<input value='$folio_expediente'/>";


$select_institucion = "SELECT nombre
FROM instituciones_medicas
INNER JOIN tipo_institucion
ON  instituciones_medicas.id_tipo = tipo_institucion.id
AND tipo_institucion.tipo = '$tipo'
ORDER BY instituciones_medicas.nombre ASC";


// echo "<span class='input-group-addon'><i class='fas fa-solid fa-id-card'></i></span>
//         <select class='form-control' id='id_sujeto' name='id_sujeto' required>
//         <option disabled selected value=''>SELECCIONE EL ID DEL SUJETO</option>";

echo "
<option disabled selected value=''>SELECCIONE UNA INSTITUCIÓN</option>
";
$answer_institucion = mysqli_query($conexion, $select_institucion);
while($valores_institucion = $answer_institucion->fetch_assoc()){
        $resultado_institucion = $valores_institucion['nombre'];
        echo "<option value='$resultado_institucion'>$resultado_institucion</option>";

}



// echo "</select>";

?>