<?php
$conexion=mysqli_connect('localhost','root','','sistemafgjem');
$id_sujeto=$_POST['idsujeto'];
$id = $id_sujeto;

$getidsujeto = "SELECT identificador FROM datospersonales
                     WHERE id = '$id_sujeto'";
$fgetidsujeto = mysqli_query($conexion, $getidsujeto);
$rgetidsujeto = $fgetidsujeto->fetch_assoc();
$identificador = $rgetidsujeto['identificador'];

$select2 = "SELECT * FROM solicitud_asistencia WHERE id_sujeto = '$identificador' AND etapa ='ASISTENCIA MÉDICA COMPLETADA'";

echo "<option disabled selected value=''>SELECCIONE LA ASISTENCIA MEDICA</option>";

$answer2 = mysqli_query($conexion, $select2);
while($valores2 = $answer2->fetch_assoc()){
        $resultado = $valores2['id_asistencia'];
        $id_asistenciamedica = $valores2['id'];
        echo "<option value='$id_asistenciamedica'>$resultado</option>";
}
?>
