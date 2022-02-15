<?php include("./db.php")?>
<?php include("./includes/header.php")?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php if (isset ($_SESSION ['message'])){?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    <? = $_SESSION['verifica_update_ticket']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_ticket.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Tipo de error" autofocus>
                    </div>

                    <div class="form-group">
                        <textarea name="descripcion" row="5" class="form-control" placeholder="Descripción breve del error"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_ticket" value="Guardar ticket">
                </form>
            </div>
        </div>

        <div class="col-md-10">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                        $query = "SELECT * FROM tickets";
                        $result_tickets = mysqli_query($mysqli, $query);
                        while($row = mysqli_fetch_array($result_tickets)) {?>
                            <tr>
                                <td><?php echo $row['fecha_solicitud']?></td>
                                <td><?php echo $row['tipo']?></td>
                                <td><?php echo $row['descripcion']?></td>
                            </tr>

                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include("./includes/footer.php")?>

