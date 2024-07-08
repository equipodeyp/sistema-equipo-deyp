<?php 
require('./con1.php');

$query = 'SELECT COUNT(*) FROM seguimiento_asistencia WHERE seen = 0';

$stm = $pdo->prepare($query);

$stm->execute();

if($stm->rowCount()>0){
    $result = $stm->fetch();

    echo json_encode($result[0]);
}
?>