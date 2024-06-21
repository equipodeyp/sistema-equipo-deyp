<?php

require('./con1.php');



    $query = 'UPDATE message_tbl SET seen = 1';

    $stm = $pdo->prepare($query);

    if($stm->execute()) {
        $query2 = "SELECT message AS msg FROM message_tbl WHERE seen = 1 AND usuario_atencion = 'JONATHAN EDUARDO SANTIAGO JIMÉNEZ' ORDER BY id DESC LIMIT 10";


        $stm2 = $pdo->prepare($query2);
        $stm2->execute();


    
            $result = $stm2->fetchAll();

            echo json_encode($result);
    
        
    }


?>