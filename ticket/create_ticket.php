<?php include("./db.php")?>
<?php include("./includes/header.php")?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

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

        </div>

    </div>

</div>

<?php include("./includes/footer.php")?>

