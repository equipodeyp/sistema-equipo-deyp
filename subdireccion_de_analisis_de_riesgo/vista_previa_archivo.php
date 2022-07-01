<!-- <?php 
// $name_archivo = $_GET["name"];
// header("Location: " . $_SERVER["HTTP_REFERER"]);
// $fol = $_SESSION['folio_repo'];
// $a_doc = $_SESSION['array_archivos'];
// $_SESSION['folio_repo']
// echo "hola";
// echo $a_doc;
// echo $name_archivo;

?> -->

<?php
/*require 'conexion.php';*/
// error_reporting(0);
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
$folio_del_expediente = $fol_exp;
$_SESSION['folio_expediente'] = $folio_del_expediente;


// echo $fol_exp;

// $fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
// $resultfol = $mysqli->query($fol);
// $rowfol=$resultfol->fetch_assoc();
// $name_folio=$rowfol['folioexpediente'];


$fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();

// $name_folio=$rowfol['folioexpediente'];


// $id_pers=$rowfol['identificador'];
// $_SESSION['idpersona'] = $id_pers;

// echo $fol_exp;
// echo $id_pers;
// echo $name_folio;

$name_carpeta = $fol_exp;
$resultado_folio = str_replace("/", "-", $name_carpeta);
echo $resultado_folio;


$array_documents = $_SESSION ['array_archivos'];
echo $array_documents;

date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");
$hoy = date("d-m-Y H:i:s a");  
// echo $hoy;

// echo $name_folio;
// $id_person=$rowfol['id'];
// echo $id_person;
// $foto=$rowfol['foto'];
// $valid1 = "SELECT * FROM validar_persona WHERE folioexpediente = '$name_folio'";
// $res_val1=$mysqli->query($valid1);
// $fil_val1 = $res_val1->fetch_assoc();
// $validacion1 = $fil_val1['id_persona'];


// echo $id_person;

// consulta de los datos de la autoridad

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
                    echo "<a style='text-align:center' class='user-nombre' href='create_ticket.php?folio=$fol_exp'><button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
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
          <li><a href="#" class="active" onclick="location.href='repo_exp.php?folio=<?=$fol_exp?>'"><span class="fa-solid fa-folder-plus menu-nav--icon fa-fw"></span><span class="tab-text">REPOSITORIO EXPEDIENTE</span></a></li>
          <!-- <li><a href="#" onclick="location.href='resumen_tickets_atendidas.php'"><span class="far fa-address-card"></span><span class="tab-text">ATENDIDAS</span></a></li>
          <li><a href="#" onclick="location.href='resumen_tickets_canceladas.php'"><span class="far fa-address-card"></span><span class="tab-text">CANCELADAS</span></a></li> -->
    			<!--<li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO</span></a></li> -->
    	</ul>

    		<div class="secciones">
    			<article id="tab1">

              <!-- menu de navegacion de la parte de arriba -->
              <div class="secciones form-horizontal sticky breadcrumb flat">
                        <a href="../subdireccion_de_analisis_de_riesgo/menu.php">REGISTROS</a>
                        <a href="../subdireccion_de_analisis_de_riesgo/detalles_expediente.php?folio=<?=$fol_exp?>">EXPEDIENTE</a>
                        <a class="actived">REPOSITORIO EXPEDIENTE</a>
              </div>

              <form class="container well form-horizontal" action="../subdireccion_de_analisis_de_riesgo/cargar_archivo_exp.php?folio=<?php echo $fol_exp; ?>" method="post" enctype="multipart/form-data">
              <!-- <form class="container well form-horizontal" method="POST" action="cargar_archivo.php?folio=<?php echo $id_person; ?>" enctype="multipart/form-data""> -->
                <div class="row">

                  <div class="alert alert-info">
                    <h3 style="text-align:center">INFORMACIÓN GENERAL DEL EXPEDIENTE DE PROTECCIÓN</h3>
                  </div>
                    
                  <div class="col-md-6 mb-3 ">
                        <label>FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
                        <input readonly class="form-control" type="text" value="<?php echo $fol_exp;?>">
                  </div>

                    <?php 
                    ?>

                    <!-- modal del glosario -->
                        <!-- <div class="modal fade" id="add_data_Modal_convenio" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true"> -->
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 style="text-align:center" class="modal-title" id="myModalLabel">Documento: <?php echo $array_documents;?></h4>
                                </div>
                                <div class="modal-body">
                                <div className="modal">
                                    <div className="modalContent">
                                    <iframe src="./repo/<?php echo $resultado_folio;?>/<?php echo $resultado_folio;?>/<?php echo $array_documents;?>" style="width:650px; height:600px;" ></iframe>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                <button style="display: block; margin: 0 auto;" type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                                </div>
                            </div>
                            </div>
                        <!-- </div> -->
                    <!-- fin modal  -->





                    






</body>
</html>








