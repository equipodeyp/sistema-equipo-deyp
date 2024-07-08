<?php

require('./con1.php');



    $query = 'UPDATE seguimiento_asistencia SET seen = 1';

    $stm = $pdo->prepare($query);

    if($stm->execute()) {
        $query2 = "SELECT id_asistencia AS msg FROM seguimiento_asistencia WHERE seen = 1 ORDER BY id DESC LIMIT 10";


        $stm2 = $pdo->prepare($query2);
        $stm2->execute();


    
            $result = $stm2->fetchAll();

            echo json_encode($result);
    
        
    }


?>