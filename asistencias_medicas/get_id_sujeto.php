<?php 

$conexion=mysqli_connect('localhost','root','','sistemafgjem');

$folio_expediente=$_POST['folio'];
$folio = $folio_expediente;

// $folio = 'UPSIPPED/TOL/113/015/2022';
// echo "<input value='$folio_expediente'/>";


$select2 = "SELECT datospersonales.identificador, datospersonales.estatusprograma
FROM datospersonales
WHERE datospersonales.folioexpediente = '$folio'
ORDER BY datospersonales.identificador ASC";


// echo "<span class='input-group-addon'><i class='fas fa-solid fa-id-card'></i></span>
//         <select class='form-control' id='id_sujeto' name='id_sujeto' required>
//         <option disabled selected value=''>SELECCIONE EL ID DEL SUJETO</option>";

echo "
<option disabled selected value=''>SELECCIONE EL ID DEL SUJETO</option>
";
$answer2 = mysqli_query($conexion, $select2);
while($valores2 = $answer2->fetch_assoc()){
        $resultado = $valores2['identificador'];
        echo "<option value='$resultado'>$resultado</option>";

}



// echo "</select>";

?>

