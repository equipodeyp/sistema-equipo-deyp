<?php
/*require 'conexion.php';*/
error_reporting(0);
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
// echo $name;
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();

$query = "SELECT id_estado, estado FROM t_estado ORDER BY id_estado";
$resultado23=$mysqli->query($query);

$query1 = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
$resultado1=$mysqli->query($query1);

$fol_exp = $_GET['folio'];

// $fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
// $resultfol = $mysqli->query($fol);
// $rowfol=$resultfol->fetch_assoc();
// $name_folio=$rowfol['folioexpediente'];


$fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();

$name_folio=$rowfol['folioexpediente'];
$_SESSION['folio_expediente'] = $name_folio;

$id_pers=$rowfol['identificador'];
$_SESSION['idpersona'] = $id_pers;

// echo $fol_exp;
// echo $id_pers;
// echo $name_folio;

$name_carpeta = $name_folio;
$resultado = str_replace("/", "-", $name_carpeta);
// echo $resultado;

date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");
$hoy = date("d-m-Y H:i:s a");  
// echo $hoy;

// echo $name_folio;
$id_person=$rowfol['id'];
// echo $id_person;
$foto=$rowfol['foto'];
$valid1 = "SELECT * FROM validar_persona WHERE folioexpediente = '$name_folio'";
$res_val1=$mysqli->query($valid1);
$fil_val1 = $res_val1->fetch_assoc();
$validacion1 = $fil_val1['id_persona'];


// echo $id_person;

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
// CONSULTA DE LOS EXPEDIENTES relacionados
$exprel1 = "SELECT * FROM relacion_suj_exp WHERE id_usuario = '$id_person'";
$rexprel1 = $mysqli->query($exprel1);
$fexprel1 = $rexprel1->fetch_assoc();
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
      $user = $row_user['usuario'];

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
           		<ul>
                <?php
                    if ($user=='guillermogv') {
                    echo "<a style='text-align:center' class='user-nombre' href='create_ticket.php?folio=$name_folio'><button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
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
      <!--  -->

      <!--  -->
      <div class="wrap">

      <ul class="tabs">
    			<!-- <li><a href="#" onclick="location.href='create_ticket.php?folio=<?php echo $fol_exp; ?>'"><span class="far fa-address-card"></span><span class="tab-text">REGISTRAR INCIDENCIA</span></a></li> -->
          <li><a href="#" class="active" onclick="location.href='repo.php?folio=<?php echo $fol_exp; ?>'"><span class="fa-solid fa-folder-plus menu-nav--icon fa-fw"></span><span class="tab-text">REPOSITORIO PERSONA</span></a></li>
          <!-- <li><a href="#" onclick="location.href='resumen_tickets_atendidas.php'"><span class="far fa-address-card"></span><span class="tab-text">ATENDIDAS</span></a></li>
          <li><a href="#" onclick="location.href='resumen_tickets_canceladas.php'"><span class="far fa-address-card"></span><span class="tab-text">CANCELADAS</span></a></li> -->
    			<!--<li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO</span></a></li> -->
    	</ul>

    		<div class="secciones">
    			<article id="tab1">

              <!-- menu de navegacion de la parte de arriba -->
              <div class="secciones form-horizontal sticky breadcrumb flat">
                        <a href="../subdireccion_de_analisis_de_riesgo/menu.php">REGISTROS</a>
                        <a href="../subdireccion_de_analisis_de_riesgo/detalles_expediente.php?folio=<?=$name_folio?>">EXPEDIENTE</a>
                        <a href="../subdireccion_de_analisis_de_riesgo/detalles_persona.php?folio=<?=$id_person?>">PERSONA</a>
                        <a class="actived">REPOSITORIO PERSONA</a>
              </div>

              <div class="container">
              <form class="container well form-horizontal" action="../subdireccion_de_analisis_de_riesgo/cargar_archivo.php?id=<?php echo $id_person; ?>" method="post" enctype="multipart/form-data">
              <!-- <form class="container well form-horizontal" method="POST" action="cargar_archivo.php?folio=<?php echo $id_person; ?>" enctype="multipart/form-data""> -->
                <div class="row">

                <div class="alert alert-info">
                    <h3 style="text-align:center">INFORMACIÓN GENERAL DEL EXPEDIENTE DE PROTECCIÓN</h3>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                        <label for="SIGLAS DE LA UNIDAD">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
                        <input readonly class="form-control" id="NUM_EXPEDIENTE" name="NUM_EXPEDIENTE" placeholder="" type="text" value="<?php echo $rowfol['folioexpediente'];?>" maxlength="50">
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="SIGLAS DE LA UNIDAD">ID PERSONA<span ></span></label>
                    <input readonly class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" value="<?php echo $rowfol['identificador']; ?>" maxlength="50">
                  </div>

                  <div class="alert alert-info">
                    <h3 style="text-align:center">INFORMACIÓN A CONSIDERAR</h3>
                </div>

                  <h5 style='text-align:justify'>
                  En este apartado deberás agregar los archivos cuya información sea única y exclusivamente de la(s) persona(s) propuesta(s) y/o sujeto(s) incorporado(s) perteneciente(s) al expediente de protección, esto con la finalidad 
                  de mantener una buena organización entre los diferentes archivos añadidos.  El SIPPSIPPED solo permite adjuntar archivos en formato PDF. Te recomendamos nombrar tus archivos antes de ser subidos puesto 
                  que mantendrán este nombre, es buena práctica colocar un nombre en específico, irrepetible y fácil de comprender.
                  </h5>

                  <!-- <div class="alert alert-info">
                    <h3 style="text-align:center">AÑADIR ARCHIVOS</h3>
                  </div> -->

                  <!-- <div class="col-md-10 mb-3" style="display: flex; align-items: center; flex-wrap: wrap;  justify-content: center;">
                        <label for="my-file-selector"><span ></span>
                        <input required="" type="file" name="file" id="exampleInputFile"></label>
                        <button class="btn btn-success" type="submit">Agregar archivo</button>
                  </div> -->
                  <?php
                    if ($user=='guillermogv') {
                    echo "
                    <div class='alert alert-info'>
                      <h3 style='text-align:center'>AÑADIR ARCHIVOS</h3>
                    </div>
                    ";
                    echo "
                    <div class='col-md-10 mb-3' style='display: flex; align-items: center; flex-wrap: wrap;  justify-content: center;'>
                        <label for='my-file-selector'><span ></span>
                        <input required='' accept='application/pdf' type='file' name='file' id='exampleInputFile'></label>
                        <button class='btn btn-success' type='submit'>Agregar archivo</button>
                    </div>
                    ";
                  }
                  
                  ?>

                  <div class="alert alert-info">
                    <h3 style="text-align:center">TABLA DE ARCHIVOS DISPONIBLES</h3>
                  </div>


                  <div>

                    <table class="table table-bordered" id="table-tickets">
                        <thead>
                            <tr>
                                <th style="text-align:center" width="5%">No.</th>
                                <th style="text-align:center" width="15%">Fecha</th>
                                <th style="text-align:center" width="60%">Nombre del archivo</th>
                                <th style="text-align:center" width="10%">Descargar</th>
                                <?php
                                  if ($user=='guillermogv') {
                                  echo "<th style='text-align:center' width='10%'>Eliminar</th>";}
                                ?>
                                <!-- <th style="text-align:center" width="20%">Eliminar</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $archivos = scandir("../subdireccion_de_analisis_de_riesgo/repo/$resultado/$id_pers/");
                        $num=0;
                        for ($i=2; $i<count($archivos); $i++)
                        {$num++;
                        ?>
                        <p>  
                        </p>
                                
                            <tr>
                              <th style="text-align:center" scope="row"><?php echo $num;?></th>
                              <th style="text-align:center;" scope="row"><?php echo $hoy;?></th>
                              <td style="font-weight: bold;" scope="row"><?php echo $archivos[$i]; ?></td>
                              <td style="text-align:center"><a title="Descargar Archivo" href="../subdireccion_de_analisis_de_riesgo/repo/<?php echo $resultado ?>/<?php echo $id_pers ?>/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a></td>
                              <?php
                                  if ($user=='guillermogv') {
                                  echo "<td style='text-align:center'><a title='Eliminar Archivo' href='../subdireccion_de_analisis_de_riesgo/eliminar_archivo.php?name=repo/$resultado/$id_pers/$archivos[$i]' style='color: red; font-size:18px;' onclick='return confirm('Esta seguro de eliminar el archivo?');'> <span class='glyphicon glyphicon-trash' aria-hidden='true'></span> </a></td>";}
                              ?>
                              <!-- <td style="text-align:center"><a title="Eliminar Archivo" href="eliminar_archivo.php?name=archivos_subidos_analisis/<?php echo $archivos[$i]; ?>" style="color: red; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a></td> -->
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


<a href="../subdireccion_de_analisis_de_riesgo/detalles_persona.php?folio=<?=$id_person?>" class="btn-flotante">REGRESAR</a>

  <!-- <a href="https://10.51.0.215/?loginOp=logout" target="_blank" class="btn-flotante-notificacion" download="GLOSARIO-SIPPSIPPED.pdf"><i class="fas fa-file-signature"></i></a> -->

</div>

</body>
</html>
