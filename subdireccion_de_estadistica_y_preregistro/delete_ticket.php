<?php 
    include("conexion.php");

    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        // echo $id;

        $delete = "SELECT* FROM tickets WHERE id = '$id'";
        $result_uno = $mysqli->query($delete);
        $fila_uno = $result_uno->fetch_assoc();
        $resul_folio = $fila_uno['folio_expediente'];
        // echo $resul_folio;

        $query = "DELETE FROM tickets WHERE id = '$id'";
        $result = mysqli_query($mysqli, $query);
        

        if (!$result) {
            die("¡ Reporte no eliminado !");
        } else{
                echo ("<script type='text/javaScript'>
                window.location.href='../subdireccion_de_estadistica_y_preregistro/tickets.php?folio=$resul_folio';
                window.alert('!!!!!Registro exitoso¡¡¡¡¡')
                </script>");
                
                
        }

    
        
        // header('window.location.href='tickets.php?folio=$fol_exp');
    }
?>