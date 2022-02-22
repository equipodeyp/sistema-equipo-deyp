<?php 
    include("./db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM tickets WHERE id = '$id'";
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            die("¡ Reporte no eliminado !");
        }

    
        $_SESSION['message'] = '¡ Reporte eliminado correctamente !';
        $_SESSION['message_type'] = 'danger';
        header('Location: create_ticket.php');
    }
?>