<?php
$conexion=mysqli_connect('localhost','root','','sistemafgjem');

$id_sujeto=$_POST['idsujeto'];
$id = $id_sujeto;

$select2 = "SELECT COUNT(*) as t FROM  medidas
                                          WHERE id_persona = '$id' AND medida= 'VIII. ALOJAMIENTO TEMPORAL' AND estatus != 'CANCELADA'";

$answer2 = mysqli_query($conexion, $select2);
while($valores2 = $answer2->fetch_assoc()){
        // $resultado = $valores2['identificador'];
        if ($valores2['t'] > 0) {
          $resguardo = 'SI';
        }else {
          $resguardo = 'NO';
        }
        echo "<option value='$resguardo'>$resguardo</option>";
      }
?>
