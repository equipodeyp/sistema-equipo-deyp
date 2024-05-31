<?php
error_reporting(0);
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica = 1;
$_SESSION["verifica"] = $verifica;
$name = $_SESSION['usuario'];

$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$user = $row['usuario'];

$m_user = $user;
$m_user = strtoupper($m_user);

// echo $m_user; 
// echo $user;

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
        <h6 style="text-align:center" class='user-nombre' >  <?php echo "" . $_SESSION['usuario']; ?> </h6>
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


      <!-- menu del expediente -->
      <div class="wrap">



        <div class="secciones">
          <article id="tab1">

            <!-- menu de navegacion de la parte de arriba -->

            <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="./menu_asistencias_medicas.php">MENÚ ASISTENCIAS MÉDICAS</a>
            <!-- <a href="./registrar_incidencia_asistencia.php">REGISTRAR UNA INCIDENCIA</a> -->
            <a class="actived" href="./incidencias_registradas_asistencia.php">INCIDENCIAS REGISTRADAS</a>
            </div>
          

            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
              <li><a href="#" onclick="location.href='./registrar_incidencia_asistencia.php'"><span class="fas fa-regular fa-clipboard"></span><span class="tab-text">REGISTRAR UNA INCIDENCIA</span></a></li>
                <li><a href="#" class="active" onclick="location.href='./incidencias_registradas_asistencia.php'"><span class="far fa-regular fa-address-card"></span><span class="tab-text">INCIDENCIAS REGISTRADAS</span></a></li>
                <li><a href="#" onclick="location.href='./incidencias_atendidas.php'"><span class="far fa-regular fa-thumbs-up"></span><span class="tab-text">INCIDENCIAS <BR> ATENDIDAS</span></a></li>
              </ul>


              <form class="container well form-horizontal" enctype="multipart/form-data">
              <?php
              $cl = "SELECT COUNT(*) as t FROM incidencias_asistencias WHERE id_servidor = '$m_user'";
              $rcl = $mysqli->query($cl);
              $fcl = $rcl->fetch_assoc();
              // echo $fcl['t'];
              if ($fcl['t'] == 0){
                    echo "<div id='cabecera'>
                      <div class='row alert div-title' role='alert'>
                        <h3 style='text-align:center'>¡ NO HAY INCIDENCIAS DE ASISTENCIAS MÉDICAS REGISTRADAS !</h3>
                      </div>
                    </div>";
              } else{
                    echo "
                      <div class='row'>
                        <div id='cabecera'>
                          <div class='row alert div-title'>
                            <h3 style='text-align:center'>INCIDENCIAS REGISTRADAS POR EL USUARIO: $m_user</h3>
                          </div>
                        </div>
                      <div>

                      <table class='table table-bordered' id='table-instrumento'>
                        <thead>
                            <tr>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>NO.</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>FOLIO INCIDENCIA</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>FECHA DE SOLICITUD</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>TIPO DE FALLA</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>DESCRIPCIÓN</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>EN ATENCIÓN</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>ESTATUS</th>
                            </tr>
                        </thead>
                    
                    ";
                  }

            ?>


<tbody>
                                                <?php

                                                    $count = 0;

                                                    $query = "SELECT * FROM incidencias_asistencias WHERE id_servidor = '$m_user' AND estatus = 'EN PROCESO' ORDER BY fecha_hora_solicitud ASC";
                                                    $result_solicitud = mysqli_query($mysqli, $query);

                                                    while($row = mysqli_fetch_array($result_solicitud)) {
                                                    
                                                        
                                                ?>
                                                    <?php $count = $count + 1 ?>
                                                        <tr>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $count; ?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['folio_incidencia']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['fecha_hora_solicitud']?></td>
                                                            <!-- <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['id_asistencia']?></td> -->
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['tipo_falla']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['descripcion_falla']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['usuario_atencion']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">
                                                                <!-- <a style="text-decoration: underline;" href="./agendar_asistencia.php?id_asistencia_medica=<?php echo $row['id_asistencia']?>" class="btn btn-outline-secondary">
                                                                   Agendar
                                                                </a> -->
                                                                <!-- <a href="grafico_instrumento.php?folio=<?php echo $fol_exp; ?>" class="btn btn-outline-secondary">
                                                                    <i class="fas fa-chart-line" ></i>
                                                                </a> -->
                                                                <button style="display: block; margin: 0 auto;" disabled class="btn btn-warning"><?php echo $row['estatus']?></button>
                                                            </td>

                                                            
                                                            
                                                        </tr>

                                                    <?php } ?>
                                            </tbody>
                                        </table> 





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
    <a href="./menu_asistencias_medicas.php" class="btn-flotante color-btn-success-gray">REGRESAR</a>
  </div>
  <div class="contenedor">
    <!-- <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a> -->
  </div>




</body>
</html>

