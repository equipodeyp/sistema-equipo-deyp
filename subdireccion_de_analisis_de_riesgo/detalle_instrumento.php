<?php
error_reporting(0);
include("conexion.php");
session_start ();
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();

date_default_timezone_set('America/Mexico_City');
$myDate = date("d-m-y h:i:s a");

$query = "SELECT id_estado, estado FROM t_estado ORDER BY id_estado";
$resultado23=$mysqli->query($query);

$query1 = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
$resultado1=$mysqli->query($query1);

$fol_exp = $_GET['folio'];
// echo $fol_exp;

$fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();
$name_folio=$rowfol['folioexpediente'];
echo $name_folio;
$identificador = $rowfol['identificador'];
// echo $identificador;
$id_person=$rowfol['id'];
// echo $id_person;
$foto=$rowfol['foto'];
$valid1 = "SELECT * FROM validar_persona WHERE folioexpediente = '$name_folio'";
$res_val1=$mysqli->query($valid1);
$fil_val1 = $res_val1->fetch_assoc();
$validacion1 = $fil_val1['id_persona'];
// consulta de los datos de la autoridad
$aut = "SELECT * FROM autoridad WHERE id_persona = '$id_person'";
$resultadoaut = $mysqli->query($aut);
$rowaut = $resultadoaut->fetch_array(MYSQLI_ASSOC);
// consulta de los datos de origen del SUJETO
$origen = "SELECT * FROM datosorigen WHERE id = '$id_person'";
$resultadoorigen = $mysqli->query($origen);
$roworigen = $resultadoorigen->fetch_array(MYSQLI_ASSOC);
$nameestadonac=$roworigen['lugardenacimiento'];
// datos del TUTOR
$tutor = "SELECT * FROM tutor WHERE id_persona = '$id_person'";
$resultadotutor = $mysqli->query($tutor);
$rowtutor = $resultadotutor->fetch_array(MYSQLI_ASSOC);
// datos del proceso penal
$process = "SELECT * FROM procesopenal WHERE id_persona = '$id_person'";
$resultadoprocess = $mysqli->query($process);
$rowprocess = $resultadoprocess->fetch_array(MYSQLI_ASSOC);
// datos de la valoracion juridica
$valjur = "SELECT * FROM valoracionjuridica WHERE id_persona = '$id_person'";
$resultadovaljur = $mysqli->query($valjur);
$rowvaljur = $resultadovaljur->fetch_array(MYSQLI_ASSOC);
// datos de la determinacion de la incorporacion
$detinc = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_person'";
$resultadodetinc = $mysqli->query($detinc);
$rowdetinc = $resultadodetinc->fetch_array(MYSQLI_ASSOC);
//consulta de los datos de origen de la persona
$domicilio = "SELECT * FROM domiciliopersona WHERE id_persona = '$id_person'";
$resultadodomicilio = $mysqli->query($domicilio);
$rowdomicilio = $resultadodomicilio->fetch_array(MYSQLI_ASSOC);
// consulta del estatus del expediente
$statusexp = "SELECT * FROM statusseguimiento WHERE id_persona = '$id_person'";
$resultadostatusexp = $mysqli->query($statusexp);
$rowstatusexp = $resultadostatusexp->fetch_array(MYSQLI_ASSOC);

$r_input = "Si";
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
      $user = $row_user['usuario'];
      $nombre_ser = $row['nombre'];
      $apellido_p = $row['apellido_p'];
      $apellido_m = $row['apellido_m'];
      $name_user = $nombre_ser." " .$apellido_p." " .$apellido_m;
      $full_name = mb_strtoupper (html_entity_decode($name_user, ENT_QUOTES | ENT_HTML401, "UTF-8"));



			if ($genero=='mujer') {
				echo "<img src='../image/mujerup.png' width='100' height='100'>";
			}
			if ($genero=='hombre') {
				echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
			}
			?>
    <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
    </div>
    <nav class="menu-nav">
           		<ul>
                <?php
                    if ($user=='guillermogv') {
                    echo "<a style='text-align:center' class='user-nombre' href='create_ticket.php?folio=$id_person'><button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
                  ";}
                ?>
            	</ul>
    </nav>
  </div>
  <div class="main bg-light">
    <div class="barra">
      <img src="../image/fiscalia.png" alt="" width="150" height="150">
      <img src="../image/ups2.png" alt="" width="1400" height="70">
      <img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
    </div>
      <!-- menu de navegacion de la parte de arriba -->
      <div class="wrap">
      <ul class="tabs">
    			<li><a href="#" onclick="location.href='instrumento_adaptabilidad.php?folio=<?php echo $fol_exp; ?>'"><span class="far fa-address-card"></span><span class="tab-text">REGISTRAR INSTRUMENTO DE ADAPTABILIDAD</span></a></li>
    			<li><a href="#" class="active" onclick="location.href='detalle_instrumento.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">INSTRUMENTOS REGISTRADOS</span></a></li>
          <!-- <li><a href="#" onclick="location.href='seguimiento_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">SEGUIMIENTO PERSONA</span></a></li> -->
    	</ul>

    		<div class="secciones">
    			<article id="tab2">
            <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="../subdireccion_de_analisis_de_riesgo/menu.php">REGISTROS</a>
              <a href="../subdireccion_de_analisis_de_riesgo/detalles_expediente.php?folio=<?=$name_folio?>">EXPEDIENTE</a>
              <a href="../subdireccion_de_analisis_de_riesgo/detalles_persona.php?folio=<?=$fol_exp?>">PERSONA</a>
              <a class="actived">INSTRUMENTO DE ADAPTABILIDAD</a>
            </div>

            
            <div class="container">
        	<div class="well form-horizontal">
              <form class="container well form-horizontal" action="save_instrumento.php?folio=<?php echo $fol_exp; ?>" method="POST" enctype="multipart/form-data">

        				<div class="row">

                  <div id="cabecera">
                    <div class="row alert div-title">
                      <h3 style="text-align:center">TABLA DE LOS INSTRUMENTOS REGISTRADOS</h3>
                    </div>
                  </div>


                  <div>

                <table class="table table-bordered" id="table-tickets">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Fecha y Hora de Registro</th>
                            <th>Folio Expediente</th>
                            <th>Id Persona</th>
                            <th>Usuario que Registra el Instrumento</th> 
                            <th>Detalle</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $count = 0;
                            $query = "SELECT * FROM instrumento WHERE folio_expediente = '$name_folio'";
                            $result_tickets = mysqli_query($mysqli, $query);
                            while($row = mysqli_fetch_array($result_tickets)) {?>
                            <?php $count = $count + 1 ?>
                                <tr>
                                    <td><?php echo $count?></td>
                                    <td><?php echo $row['fecha_registro']?></td>
                                    <td><?php echo $row['folio_expediente']?></td>
                                    <td> <?php echo $row['id_persona']?></td>
                                    <td><?php echo $row['nombre_servidor']?></td>
                                    <td style="text-align:center">

                                        <a href="resultado_instrumento.php?folio=<?php echo $fol_exp; ?>" class="btn color-btn-success">
                                            <i  class="fas fa-marker" ></i>
                                        </a>
                                        <!-- <a href="edit_ticket.php?id=<?php echo $row['id']?>" class="btn color-btn-gray">
                                            <i  class="fas fa-send"></i>
                                        </a> -->
                                        <!-- <a href="delete_ticket.php?id=<?php echo $row['id']?>"  class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a> -->
                                    </td>
                                </tr>

                            <?php } ?>
                    </tbody>
                </table>
                </div>


            



            
              
              </div>
              </form>
              </div>
        		</div>
    			</article>
    		</div>
    	</div>
  </div>
</div>
<div class="contenedor">
<a href="../subdireccion_de_analisis_de_riesgo/detalles_persona.php?folio=<?=$fol_exp?>" class="btn-flotante">REGRESAR</a>
</div>



</body>
</html>