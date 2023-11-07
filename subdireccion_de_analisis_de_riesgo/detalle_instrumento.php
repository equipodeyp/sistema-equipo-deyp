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


$fol_exp = $_GET['folio'];
// echo $fol_exp;
// echo "<br>";

$fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();
$name_folio=$rowfol['folioexpediente'];
// echo $name_folio;
// echo "<br>";
$identificador = $rowfol['identificador'];
// echo $identificador;
// echo "<br>";
// echo "<br>";

$id_person=$rowfol['id'];
// echo $id_person;
$foto=$rowfol['foto'];




$query = "SELECT * FROM instrumento WHERE id_persona = '$identificador'";
$result_instrumento = $mysqli->query($query);
$row = $result_instrumento->fetch_assoc();
// echo "<br>";
$idins=$row['id_instrumento'];
// echo $idins;
// echo "<br>";
$folio_expediente=$row['folio_expediente'];
// echo $folio_expediente;
// echo "<br>";
$id_persona=$row['id_persona'];
// echo $id_persona;
// echo "<br>";
$fecha_instrumento=$row['fecha_registro'];
// echo $fecha_instrumento;
// echo "<br>";
$nombre_servidor=$row['nombre_servidor'];
// echo $nombre_servidor;
// echo "<br>";




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
              <a href="../subdireccion_de_analisis_de_riesgo/instrumento_adaptabilidad.php?folio=<?=$fol_exp?>">REGISTRAR INSTRUMENTO</a>
              <a href="../subdireccion_de_analisis_de_riesgo/detalle_instrumento.php?folio=<?=$fol_exp?>" class="actived">INSTRUMENTOS REGISTRADOS</a>
            </div>

            
            <div class="container">
        	<div class="well form-horizontal">
              <form class="container well form-horizontal" enctype="multipart/form-data">
              <?php
              $cl = "SELECT COUNT(*) as t FROM instrumento WHERE id_persona = '$identificador'";
              $rcl = $mysqli->query($cl);
              $fcl = $rcl->fetch_assoc();
              // echo $fcl['t'];
              if ($fcl['t'] == 0){
                    echo "<div id='cabecera'>
                      <div class='row alert div-title' role='alert'>
                        <h3 style='text-align:center'>¡ NO HAY INSTRUMENTOS REGISTRADOS !</h3>
                      </div>
                    </div>";
              } else{
                    echo "
                      <div class='row'>
                        <div id='cabecera'>
                          <div class='row alert div-title'>
                            <h3 style='text-align:center'>INSTRUMENTOS REGISTRADOS</h3>
                          </div>
                        </div>
                      <div>

                      <table class='table table-bordered' id='table-instrumento'>
                        <thead>
                            <tr>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>No.</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>Fecha y Hora de Registro</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>Folio Expediente</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>Id Persona</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>Usuario que Registra el Instrumento</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>Detalle / Gráfico </th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>Adaptabilidad</th>
                            </tr>
                        </thead>
                    
                    ";
                  }

              ?>




                                          <tbody>
                                              <?php

                                                  $count = 0;
                                                  $query = "SELECT * FROM instrumento WHERE id_persona = '$identificador'";
                                                  $result_instrumento = mysqli_query($mysqli, $query);
                                                  while($row = mysqli_fetch_array($result_instrumento)) {
                                                    $id_instrumento=$row['id_instrumento'];
                                                    // echo $id_instrumento;
                                                    
                                              ?>
                                                  <?php $count = $count + 1 ?>
                                                      <tr>
                                                          <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $count?></td>
                                                          <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['fecha_registro']?></td>
                                                          <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['folio_expediente']?></td>
                                                          <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['id_persona']?></td>
                                                          <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['nombre_servidor']?></td>
                                                          <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">
                                                              <a href="resultado_instrumento.php?folio=<?php echo $fol_exp; ?>" class="btn btn-outline-secondary">
                                                                  <i class="fa fa-pen" ></i>
                                                              </a>
                                                              <a href="grafico_instrumento.php?folio=<?php echo $fol_exp; ?>" class="btn btn-outline-secondary">
                                                                  <i class="fas fa-chart-line" ></i>
                                                              </a>

                                                          </td>

                                                          <td style="text-align:center; font-size: 10px; font-weight: bold !important; border: 2px solid #97897D;">
                                                          <?php 
                                                            if ($row['adaptabilidad'] === "INADAPTABLE"){
                                                              // echo "hola1";
                                                              echo "<a class='btn btn-danger btn-lg disabled' tabindex='-1' role='button' aria-disabled='true'>"; echo $row['adaptabilidad']; echo "</a>";
                                                            }elseif ($row['adaptabilidad'] === "BAJA"){
                                                              echo "<a class='btn btn-primary btn-lg disabled' tabindex='-1' role='button' aria-disabled='true'>"; echo $row['adaptabilidad']; echo "</a>";
                                                              // echo "hola2";
                                                            }elseif ($row['adaptabilidad'] === "MEDIA"){
                                                              echo "<a class='btn btn-secondary btn-lg disabled' tabindex='-1' role='button' aria-disabled='true'>"; echo $row['adaptabilidad']; echo "</a>";
                                                              // echo "hola3";
                                                            }elseif ($row['adaptabilidad'] === "ALTA"){
                                                              echo "<a class='btn btn-success btn-lg disabled' tabindex='-1' role='button' aria-disabled='true'>"; echo $row['adaptabilidad']; echo "</a>";
                                                              // echo "hola4";
                                                            }

                                                          ?>
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
<a href="../subdireccion_de_analisis_de_riesgo/instrumento_adaptabilidad.php?folio=<?=$fol_exp?>" class="btn-flotante">REGRESAR</a>
</div>



</body>
</html>