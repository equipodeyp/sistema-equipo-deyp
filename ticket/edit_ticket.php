<?php
include("db.php");
$tipo = '';
$descripcion= '';

if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tickets WHERE id=$id";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $tipo = $row['tipo'];
    $descripcion = $row['descripcion'];
}
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $tipo= $_POST['tipo'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE tickets set tipo = '$tipo', descripcion = '$descripcion' WHERE id=$id";
    mysqli_query($mysqli, $query);
    $_SESSION['message'] = '¡ Reporte actualizado correctamernte !';
    $_SESSION['message_type'] = 'warning';
    header('Location: create_ticket.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_ticket.php?id=<?php echo $_GET['id']; ?>" method="POST">

                    <div class="form-group">
                        <input name="tipo" type="text" class="form-control" value="<?php echo $tipo; ?>" placeholder="Tipo">
                    </div>

                    <div class="form-group">
                    <textarea name="descripcion" class="form-control" rows="5" placeholder="Descripción"><?php echo $descripcion;?></textarea>
                    </div>
                    
                    <button class="btn btn-success" name="update">
                    Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>