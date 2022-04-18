<link rel="stylesheet" href="./css/style_ticket.css">
<?php include("./db.php")?>
<?php include("./includes/header.php")?>

<?php

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

<div> 
<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php if (isset ($_SESSION ['message'])){?>

                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

            <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_ticket.php" method="POST">

                    <div class="form-group">
                        <label>Folio:<span ></span></label>
                        <input type="text" name="folio_reporte" class="form-control" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label>Estatus:<span ></span></label>
                        <input type="text" name="estatus" class="form-control" placeholder="" value="Abierto" readonly required>
                    </div>

                    <div class="form-group">
                        <label>Expediente:<span ></span></label>
                        <input type="text" name="folio_expediente" class="form-control" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label>Usuario:<span ></span></label>
                        <input type="text" name="usuario" class="form-control" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label>Subdirección:<span ></span></label>
                        <input type="text" name="subdireccion" class="form-control" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <!-- <input type="text" name="tipo" class="form-control" placeholder="Tipo de error" autofocus> -->
                        <label >Tipo de error:<span ></span></label>
                        <select name="tipo" required class="form-control" autofocus>
                            <option disabled selected value>Seleccione una opción</option>
                            <option>Captura</option>
                            <option>Información incorrecta</option>
                            <option>No se muestra la información</option>
                            <option>Funcionalidad</option>
                            <option>Acceso</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Apartado:<span ></span></label>
                        <input type="text" name="apartado" class="form-control" placeholder="Sección donde se ubica el error" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label>Descripción:<span ></span></label>
                        <textarea name="descripcion" row="5" class="form-control" placeholder="Descripción breve del error" autocomplete="off" required></textarea>
                    </div>
                    
                    <input type="submit" class="btn btn-success btn-block" name="save_ticket" value="Reportar">
                </form>
            </div>
        </div>

        <div class="col-md-8">

            <table class="table table-bordered" id="table-tickets">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Fecha</th>
                        <th>Folio</th>
                        <th>Estatus</th>
                        <th>Expediente</th>
                        <th>Usuario</th> 
                        <th>Subdirección</th>
                        <th>Tipo</th>
                        <th>Apartado</th>
                        <th>Descripción</th>
                        <th>Funciones</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $count = 0;
                        $query = "SELECT * FROM tickets";
                        $result_tickets = mysqli_query($mysqli, $query);
                        while($row = mysqli_fetch_array($result_tickets)) {?>
                        <?php $count = $count + 1 ?>
                            <tr>
                                <td><?php echo $count?></td>
                                <td><?php echo $row['fecha_solicitud']?></td>
                                <td><?php echo $row['folio_reporte']?></td>
                                <td><?php echo $row['estatus']?></td>
                                <td><?php echo $row['folio_expediente']?></td>
                                <td><?php echo $row['usuario']?></td>
                                <td><?php echo $row['subdireccion']?></td>
                                <td><?php echo $row['tipo']?></td>
                                <td><?php echo $row['apartado']?></td>
                                <td><?php echo $row['descripcion']?></td>
                                <td>

                                    <a href="../ticket/edit_ticket.php?id=<?php echo $row['id']?>" class="fas fa-marker btn btn-primary">
                                        <!-- <i  class="fas fa-marker btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal"></i> -->
                                    </a>

                                    <a href="../ticket/delete_ticket.php?id=<?php echo $row['id']?>"  class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="edit_ticket.php?id=<?php echo $_GET['id']; ?>" method="POST">

                    <div class="form-group">
                        <label >Tipo de error:<span ></span></label>
                        <select name="tipo_modal" required class="form-control" autofocus value="<?php echo $tipo; ?>">
                            <option disabled selected value>Seleccione una opción</option>
                            <option>Captura</option>
                            <option>Información incorrecta</option>
                            <option>No se muestra la información</option>
                            <option>Funcionalidad</option>
                            <option>Acceso</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Apartado:<span ></span></label>
                        <input type="text" name="apartado_modal" class="form-control" placeholder="Sección donde se ubica el error" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label>Descripción:<span ></span></label>
                        <textarea name="descripcion_modal" row="5" class="form-control" placeholder="Descripción breve del error" autocomplete="off" required><?php echo $descripcion;?></textarea>
                    </div> 

                </form>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" name="update">Guardar cambios</button>
            </div>
        </div>
    </div>
</div> -->

<?php include("./includes/footer.php")?>

