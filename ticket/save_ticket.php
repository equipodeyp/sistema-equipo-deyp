<?php

include ('./db.php');
    if (isset($_POST['save_ticket'])){
        
        $tipo_error = $_POST['title'];
        $descripcion_error = $_POST['descripcion'];


        $query = "INSERT INTO tickets(tipo, descripcion) VALUES ('$tipo_error', '$descripcion_error')";
        $result = mysqli_query($mysqli, $query);

        if(!$result){

            die("Failed");

            // echo ("<script type='text/javaScript'>
            // window.location.href='../ticket/create_ticket.php';
            // window.alert('¡ Failed !')
            // </script>");
        }

        $_SESSION['message'] = ' ¡ Reporte creado correctamente ! ';
        

        header ("location: create_ticket.php");
        // echo ("<script type='text/javaScript'>
        //     window.location.href='../ticket/create_ticket.php';
        //     window.alert('¡ Ticket guardado correctamente !')
        //     </script>");
        
    }
?>