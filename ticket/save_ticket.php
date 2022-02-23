<?php

include ('./db.php');
    if (isset($_POST['save_ticket'])){

        $folio_reporte = $_POST['folio_reporte'];
        $folio_expediente = $_POST['folio_expediente'];
        $usuario = $_POST['usuario'];
        $subdireccion_usuario = $_POST['subdireccion'];
        $tipo_error = $_POST['tipo'];
        $apartado_error = $_POST['apartado'];
        $descripcion_error = $_POST['descripcion'];
        $status = $_POST['estatus'];
        
        $query = "INSERT INTO tickets (folio_reporte, folio_expediente, usuario, subdireccion, tipo, apartado, descripcion, estatus) 
        VALUES ('$folio_reporte', '$folio_expediente', '$usuario', '$subdireccion_usuario', '$tipo_error', '$apartado_error', '$descripcion_error', '$status')";
        $result = mysqli_query($mysqli, $query);

        if(!$result){

            die("Failed");

            // echo ("<script type='text/javaScript'>
            // window.location.href='../ticket/create_ticket.php';
            // window.alert('¡ Failed !')
            // </script>");
        }

        $_SESSION['message'] = ' ¡ Muchas gracias ! Tu Reporte fue creado correctamente... ';
        $_SESSION['message_type'] = 'primary';
        

        header ("location: create_ticket.php");
        // echo ("<script type='text/javaScript'>
        //     window.location.href='../ticket/create_ticket.php';
        //     window.alert('¡ Ticket guardado correctamente !')
        //     </script>");
        
    }
?>
                                <td><?php echo $row['fecha_solicitud']?></td>
                                <td><?php echo $row['folio_reporte']?></td>
                                <td><?php echo $row['folio_expediente']?></td>
                                <td><?php echo $row['usuario']?></td>
                                <td><?php echo $row['subdireccion']?></td>
                                <td><?php echo $row['tipo']?></td>
                                <td><?php echo $row['apartado']?></td>
                                <td><?php echo $row['descripcion']?></td>
                                <td><?php echo $row['estatus']?></td>