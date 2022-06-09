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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>
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
          <li><a href="#" onclick="location.href='repo.php'"><span class="fas fa-address-card"></span><span class="tab-text">APOYO TÉCNICO</span></a></li>
          <li><a href="#" class="active" onclick="location.href='repo_analisis.php'"><span class="fa-solid fa-magnifying-glass-chart"></span><span class="tab-text">ANÁLISIS DE RIESGO</span></a></li>
          <li><a href="#" onclick="location.href='repo_estadistica.php'"><span class="fa-solid fa-square-poll-horizontal"></span><span class="tab-text">ESTADISTICA</span></a></li>
    			<!--<li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO</span></a></li> -->
    		</ul>

    		<div class="secciones">
    			<article id="tab1">

          <div class="secciones form-horizontal sticky breadcrumb flat">
                <a  href="../administrador/admin.php">REGISTROS</a>
                <a class="actived" href="#">REPOSITORIO</a>
                <!-- <a class="actived">INCIDENCIAS</a> -->
          </div>
    				<div class="container">
              <form class="container well form-horizontal" method="POST" action="cargar_archivo.php" enctype="multipart/form-data">
                <div class="row">

                  <!-- <div class="alert alert-info">
                    <h3 style="text-align:center">AÑADIR ARCHIVOS</h3>
                  </div> -->

                  <!-- <div class="col-md-10 mb-3" style="display: flex; align-items: center; flex-wrap: wrap;  justify-content: center;">
                        <label for="my-file-selector"><span ></span>
                        <input required="" type="file" name="file" id="exampleInputFile"></label>
                        <button class="btn btn-success" type="submit">Agregar archivo</button>
                  </div> -->
                  

                  <div class="alert alert-info">
                    <h3 style="text-align:center">TABLA DE ARCHIVOS DISPONIBLES</h3>
                  </div>


                  <div>

                    <table class="table table-bordered" id="table-tickets">
                        <thead>
                            <tr>
                                <th style="text-align:center" width="10%">No.</th>
                                <th style="text-align:center" width="50%">Nombre del archivo</th>
                                <th style="text-align:center" width="20%">Descargar</th>
                                <th style="text-align:center" width="20%">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $documetos = '../subdireccion_de_analisis_de_riesgo/archivos_subidos_analisis';
                        $archivos = scandir($documetos);
                        $num=0;
                        for ($i=2; $i<count($archivos); $i++)
                        {$num++;
                        ?>
                        <p>  
                        </p>
                                
                            <tr>
                              <th style="text-align:center" scope="row"><?php echo $num;?></th>
                              <td><?php echo $archivos[$i]; ?></td>
                              <td style="text-align:center"><a title="Descargar Archivo" href="../subdireccion_de_analisis_de_riesgo/archivos_subidos_analisis/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a></td>
                              <td style="text-align:center"><a title="Eliminar Archivo" href="eliminar_archivo.php?name=../subdireccion_de_analisis_de_riesgo/archivos_subidos_analisis/<?php echo $archivos[$i]; ?>" style="color: red; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a></td>
                            </tr>
                        <?php }?> 
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
















<?php
                                $user = $row_user['usuario'];
                                  if ($user==='a-azael') {
                                  echo "<th style='text-align:center' width='20%'>Eliminar</th>
                                  ";}
                                ?>
