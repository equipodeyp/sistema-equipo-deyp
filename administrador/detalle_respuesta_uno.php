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

$result_area = $mysqli->query($sentencia);
$row_area=$result_area->fetch_assoc();
$area = $row_area['area'];

$result_nombre = $mysqli->query($sentencia);
$row_nombre=$result_nombre->fetch_assoc();
$nombre = $row_nombre['nombre'];

$result_apellido_p = $mysqli->query($sentencia);
$row_apellido_p=$result_apellido_p->fetch_assoc();
$apellido_p = $row_apellido_p['apellido_p'];

$result_apellido_m = $mysqli->query($sentencia);
$row_apellido_m=$result_apellido_m->fetch_assoc();
$apellido_m = $row_apellido_m['apellido_m'];

 ?>

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
    $folio_expediente = $row['folio_expediente'];
    $folio_reporte = $row['folio_reporte'];
    $fecha_atencion = $row['fecha_atencion'];
    $usuario_atencion = $row['usuario_atencion'];
    $respuesta = $row['respuesta'];
    $en_atencion = $row['usuario_atencion'];
    $estatus = $row['estatus'];
    $user = $row['usuario'];
    $subdirec = $row['subdireccion'];
    
    
}
}





?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/instrumento_adaptabilidad.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="../css/main2.css">
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
    			<li><a href="#" class="active" onclick="location.href='detalle_respuesta_uno.php?id=<?php echo $id; ?>'"><span class="far fa-address-card"></span><span class="tab-text">DETALLE DE LA INCIDENCIA</span></a></li>
    			<!-- <li><a href="#" onclick="location.href='detalles_respuesta.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">INCIDENCIAS GENERADAS</span></a></li> -->
    			<!--<li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO</span></a></li> -->
    		</ul>

    		<div class="secciones">
    			<article id="tab1">

          <!-- menu de navegacion de la parte de arriba -->
          <div class="secciones form-horizontal sticky breadcrumb flat">
                <a href="../administrador/admin.php">REGISTROS</a>
                <a href="../administrador/resumen_tickets_enproceso.php">INCIDENCIAS REGISTRADAS</a>
                <a class="actived" href="#">DETALLE DE LA INCIDENCIA</a>
                <!-- <a href="../administrador/tickets.php?folio=<?php echo $folio_expediente; ?>">INCIDENCIAS</a>
                <a >DETALLE DE LA INCIDENCIA</a> -->
          </div>

    	    <div class="container">
              <form class="container well form-horizontal" action="detalle_respuesta.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="row">

                  <!-- <div class="alert alert-info">
                    <h3 style="text-align:center">DATOS GENERALES</h3>
                  </div> -->


                        <div id='cabecera'>
                          <div class='row alert div-title'>
                            <h3 style='text-align:center'>DATOS GENERALES</h3>
                          </div>
                        </div>


                  <div class="col-md-6 mb-3">
                        <label>FOLIO DEL EXPEDIENTE<span ></span></label>
                        <input readonly class="form-control" id="" name="folio_expediente" type="text" value="<?php echo $folio_expediente; ?>" maxlength="50">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label>NOMBRE DEL USUARIO<span ></span></label>
                    <input readonly class="form-control" id="" name="usuario" type="text" value="<?php echo $user;?>" maxlength="50">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label>SUBDIRECCIÓN ADSCRITA<span></span></label>
                    <input readonly class="form-control" id="" name="subdireccion" type="text" value="<?php echo $subdirec; ?>">
                  </div>


                  <!-- <div class="alert alert-info">
                    <h3 style="text-align:center">DATOS DE LA INCIDENCIA</h3>
                  </div> -->


                        <div id='cabecera'>
                          <div class='row alert div-title'>
                            <h3 style='text-align:center'>DATOS DE LA INCIDENCIA</h3>
                          </div>
                        </div>


                  <div class="col-md-6 mb-3">
                    <label>FOLIO DE LA INCIDENCIA<span></span></label>
                    <input readonly class="form-control" id="" name="folio_reporte" type="text" value="<?php echo $folio_reporte; ?>">
                  </div>


                <div class="col-md-6 mb-3">
                    <label>TIPO DE FALLA O ERROR<span></span></label>
                    <input readonly class="form-control" id="" name="tipo" type="text" value="<?php echo $tipo; ?>">
                </div>

                <div class="row">
  			        <div id="">
  		  			</div>
                        <label>DESCRIPCIÓN BREVE DE LA FALLA O ERROR<span></span></label>
                        <textarea disabled id="" name="descripcion" rows="8" cols="80" maxlength="400"><?php echo $descripcion; ?></textarea>
                        <br>
  				</div>

                  
<br>

                  <!-- <div class="alert alert-info">
                    <h3 style="text-align:center">ATENCIÓN DE LA INCIDENCIA</h3>
                  </div> -->

                  
                        <div id='cabecera'>
                          <div class='row alert div-title'>
                            <h3 style='text-align:center'>ATENCIÓN DE LA INCIDENCIA</h3>
                          </div>
                        </div>


                  <!-- <div class="col-md-6 mb-3">
                    <label>USUARIO EN ATENCIÓN<span ></span></label>
                    <input class="form-control" id="USUARIO_ATENCION" name="atencion" type="text" value="<?php echo $en_atencion; ?>" readonly>
                  </div> -->

                  <div class="col-md-6 mb-3">
                    <label>ESTATUS DE LA INCIDENCIA<span ></span></label>
                    <input class="form-control" id="ESTATUS_INCIDENCIA" name="estatus" type="text" value="<?php echo $estatus; ?>" readonly>
                  </div>

                  <div id="FECHA_ATENCION" class="col-md-6 mb-3">
                    <label>FECHA Y HORA DE ATENCIÓN<span></span></label>
                    <input readonly required class="form-control" id="" name="fecha_atencion" type="text" value="<?php echo $fecha_atencion;?>">
                  </div>

                <div id="ATENCION" class="col-md-6 mb-3">
                  <label>USUARIO EN ATENCIÓN<span></span></label>
                  <input class="form-control" id="" name="atendido_por" required value="<?php echo $usuario_atencion; ?>" readonly>
                </div>

                <div id="RESPUESTA" class="row">
                  <div id="footer">
                  </div>
                        <label>RESPUESTA A LA INCIDENCIA<span></span></label>
                        <textarea disabled id="" name="respuesta" rows="8" cols="80" placeholder="" maxlength="400" required><?php echo $respuesta; ?></textarea>
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

<a href="../administrador/resumen_tickets_enproceso.php" class="btn-flotante">REGRESAR</a>

</div>
<script type="text/javascript">


var respuesta = document.getElementById('ESTATUS_INCIDENCIA').value;

    function ocultarInfo() {

      if (respuesta === "EN PROCESO" || respuesta === "" || respuesta === null) {

        document.getElementById('FECHA_ATENCION').style.display = "none";
        document.getElementById('ATENCION').style.display = "";
        document.getElementById('RESPUESTA').style.display = "none";

      }
      else {
        document.getElementById('FECHA_ATENCION').style.display = "";
        document.getElementById('ATENCION').style.display = "";
        document.getElementById('RESPUESTA').style.display = "";

      }

    }
ocultarInfo();
</script>
</body>
</html>