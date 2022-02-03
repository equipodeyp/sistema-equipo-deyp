<?php

include ('./db.php');
    if (isset($_POST['save_ticket'])){
        
        $tipo_error = $_POST['title'];
        $descripcion_error = $_POST['descripcion'];
        // echo $tipo_error;
        // echo $descripcion_error;
        // echo "¡ Ticket guardado correctamente !";

        $query = "INSERT INTO tickets(tipo, descripcion) VALUES ('$tipo_error', '$descripcion_error')";
        $result = mysqli_query($mysqli, $query);

        if(!$result){
            die("¡ Failed !");
        }
        echo "¡ Ticket guardado correctamente !";
        
    }
?>