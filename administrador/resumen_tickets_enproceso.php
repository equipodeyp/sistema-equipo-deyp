<?php
/*require 'conexion.php';*/
// error_reporting(0);
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../../../logout.php");
}
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
// echo $name;
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();


// $fol_exp = $_GET['folio'];
// echo $fol_exp;
// $sql = "SELECT * FROM expediente WHERE fol_exp = '$fol_exp'";
// $resultado = $mysqli->query($sql);
// $row = $resultado->fetch_array(MYSQLI_ASSOC);



?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/expediente.css">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/expediente.js"></script>
  <script src="../js/solicitud.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="../css/registrosolicitud1.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- <script src="JQuery.js"></script> -->
  <script src="../js/Javascript.js"></script>
  <script src="../js/validar_campos.js"></script>
  <script src="../js/verificar_camposm1.js"></script>
  <script src="../js/mascara2campos.js"></script>
  <script src="../js/mod_medida.js"></script>
  <!-- <link rel="stylesheet" href="../css/estilos.css">
  <script src="../js/main.js"></script> -->
  <script src="../js/Javascript.js"></script>
  <script src="../js/validar_campos.js"></script>
  <script src="../js/validarmascara3.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->

</head>
<body >
<div class="contenedor">
  <div class="sidebar ancho">
    <div class="logo text-warning">
    </div>
    <div class="user">
      <?php
			$sentencia_user=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
			$result_user = $mysqli->query($sentencia_user);
			$row_user=$result_user->fetch_assoc();
			$genero = $row_user['sexo'];

			if ($genero=='mujer') {
				echo "<img src='../image/mujerup.png' width='100' height='100'>";
			}

			if ($genero=='hombre') {
				// $foto = ../image/user.png;
				echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
			}
			// echo $genero;
			?>
    <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
    </div>
    <nav class="menu-nav">
    </nav>
  </div>
  <div class="main bg-light">
    <div class="barra">
        <img src="../image/fiscalia.png" alt="" width="150" height="150">
        <img src="../image/ups2.png" alt="" width="1400" height="70">
        <img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
    </div>
    <?php if (isset ($_SESSION ['message'])){?>

      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
      <?= $_SESSION['message']?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>

      <?php session_unset(); } ?>

      <div class="wrap">

        <ul class="tabs">
    			<!-- <li><a href="#" onclick="location.href='create_ticket.php?folio=<?php echo $fol_exp; ?>'"><span class="far fa-address-card"></span><span class="tab-text">REGISTRAR INCIDENCIA</span></a></li> -->
          <li><a href="#" class="active" onclick="location.href='resumen_tickets_enproceso.php'"><span class="fas fa-book-open"></span><span class="tab-text">INCIDENCIAS EN PROCESO</span></a></li>
          <li><a href="#" onclick="location.href='resumen_tickets_atendidas.php'"><span class="far fa-address-card"></span><span class="tab-text">INCIDENCIAS ATENDIDAS</span></a></li>
          <li><a href="#" onclick="location.href='resumen_tickets_canceladas.php'"><span class="far fa-address-card"></span><span class="tab-text">INCIDENCIAS CANCELADAS</span></a></li>
    			<!--<li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO</span></a></li> -->
    		</ul>

    		<div class="secciones">
    			<article id="tab1">

          <!-- menu de navegacion de la parte de arriba -->
          <div class="secciones form-horizontal sticky breadcrumb flat">
                <a class="actived" href="../administrador/admin.php">REGISTROS</a>
                <!-- <a href="../administrador/detalles_expediente.php?folio=<?php echo $fol_exp; ?>">EXPEDIENTE</a>
                <a class="actived">INCIDENCIAS</a> -->
          </div>
    				<div class="container">
              <form class="container well form-horizontal" action="save_ticket.php" method="POST" enctype="multipart/form-data">
                <div class="row">

                  <div class="alert alert-info">
                    <h3 style="text-align:center">TABLA DE INCIDENCIAS EN PROCESO</h3>
                  </div>


                  <div>

                    <table class="table table-bordered" id="table-tickets">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Fecha</th>
                                <th>Folio Incidencia</th>
                                <th>Folio Expediente</th>
                                <th>Usuario</th> 
                                <!-- <th>Subdirección</th> -->
                                <!-- <th>Tipo</th> -->
                                <th>Estatus</th>
                                <th>Detalle  /  Responder </th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $count = 0;
                                $query = "SELECT * FROM tickets WHERE estatus = 'EN PROCESO'";
                                $result_tickets = mysqli_query($mysqli, $query);
                                while($row = mysqli_fetch_array($result_tickets)) {?>
                                <?php $count = $count + 1 ?>
                                    <tr>
                                        <td><?php echo $count?></td>
                                        <td><?php echo $row['fecha_solicitud']?></td>
                                        <td> <?php echo $row['folio_reporte']?></td>
                                        <td><?php echo $row['folio_expediente']?></td>
                                        <td><?php echo $row['usuario']?></td>
                                        <!-- <td><?php echo $row['subdireccion']?></td> -->
                                        <!-- <td><?php echo $row['tipo']?></td> -->
                                        <td><?php echo $row['estatus']?></td>
                                        <td style="text-align:center">

                                            <a href="detalle_respuesta.php?id=<?php echo $row['id']?>" class="btn btn-success">
                                                <i  class="fas fa-marker" ></i>
                                            </a>
                                            <a href="edit_ticket.php?id=<?php echo $row['id']?>" class="btn btn-info">
                                                <i  class="fas fa-send"></i>
                                            </a>
                                            <!-- <a href="delete_ticket.php?id=<?php echo $row['id']?>"  class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a> -->
                                        </td>
                                    </tr>

                                <?php } ?>
                        </tbody>
                    </table>
                </div>


              </form>
            </div>
    			</article>
    		</div>
    	</div>
      <!--  -->
  </div>
</div>
<div class="contenedor">

<a href="../administrador/admin.php" class="btn-flotante">REGRESAR</a>

</div>

</body>
</html>
