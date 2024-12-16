<?php
/*require 'conexion.php';*/
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

// echo "Agendar Asistencia Médica";



$id_asistencia_medica = $_GET["id_asistencia_medica"];


// echo $id_asistencia_medica;




$sentencia_am = "SELECT * FROM solicitud_asistencia WHERE id_asistencia='$id_asistencia_medica'";
$result_am = mysqli_query($mysqli, $sentencia_am);
$r_am = mysqli_fetch_array($result_am);
$id_a_m = $r_am['id_asistencia'];
// echo $id_a_m;


$tipo_institucion = $mysqli->query("SELECT id, tipo FROM tipo_institucion");


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


      <!-- menu del expediente -->
      <div class="wrap">



        <div class="secciones">
          <article id="tab1">

            <!-- menu de navegacion de la parte de arriba -->
            <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="./menu_asistencias_medicas.php">MENÚ ASISTENCIAS MÉDICAS</a>
            <a href="./solicitudes_registradas_agendar.php">SOLICITUDES DE ASISTENCIA MÉDICA MEDIDAS PROVISIONALES</a>
            <a class="actived" href="./registro_completado.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>">1. AGENDAR - 2. TURNAR - 3. NOTIFICAR - 4. REGISTRO COMPLETADO</a>
          </div>
          

            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a href="#"  onclick="location.href='./agendar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-calendar"></span><span class="tab-text">1. AGENDAR</span></a></li>
                <li><a href="#"  onclick="location.href='./turnar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-flag"></span><span class="tab-text">2. TURNAR</span></a></li>
                <li><a href="#" onclick="location.href='./notificar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-bell"></span><span class="tab-text">3. NOTIFICAR</span></a></li>
                <li><a class="active" href="#" onclick="location.href='./registro_completado.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-address-card"></span><span class="tab-text">4. REGISTRO COMPLETADO</span></a></li>
              </ul>


              <form class="container well form-horizontal" enctype="multipart/form-data">
              
                      <div class="row">
                        <div id="cabecera">
                          <div class="row alert div-title">
                            <h3 style="text-align:center">4. REGISTRO COMPLETADO</h3>
                          </div>
                        </div>
                      <div>

                      <table class="table table-bordered" id="table-instrumento">
                        <thead>
                            <tr>

                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">ID ASISTENCIA MÉDICA</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">REQUERIMIENTO</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">SERVICIO MÉDICO</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">SERVIDOR PÚBLICO QUE REALIZA LA ASISTENCIA</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">NOMBRE DE LA UNIDAD MÉDICA</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">FECHA ASISTENCIA</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">HORA ASISTENCIA</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">ETAPA</th>
                                
                            </tr>
                        </thead>


<tbody>
                                                <?php

                                                    $count = 0;

                                                    $query = "SELECT solicitud_asistencia.id_asistencia, solicitud_asistencia.tipo_requerimiento, solicitud_asistencia.servicio_medico, agendar_asistencia.nombre_institucion, cita_asistencia.fecha_asistencia, cita_asistencia.hora_asistencia, solicitud_asistencia.etapa, agendar_asistencia.servidor_asistencia

                                                              FROM solicitud_asistencia
                                                                                                                  
                                                              JOIN agendar_asistencia 
                                                              ON solicitud_asistencia.id_asistencia = agendar_asistencia.id_asistencia

                                                              JOIN cita_asistencia
                                                              ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia 
                                                              AND solicitud_asistencia.id_asistencia = '$id_asistencia_medica'";
                                                    
                                                    
                                                    $result_solicitud = mysqli_query($mysqli, $query);

                                                    while($row = mysqli_fetch_array($result_solicitud)) {
                                                    
                                                        
                                                ?>
                                                    <?php $count = $count + 1 ?>
                                                        <tr>

                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['id_asistencia']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['tipo_requerimiento']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['servicio_medico']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['servidor_asistencia']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['nombre_institucion']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['fecha_asistencia']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['hora_asistencia']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['etapa']?></td>
                                                            


                                                            <!-- <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">
                                                                <a style="text-decoration: underline;" href="./agendar_asistencia.php?id_asistencia_medica=<?php echo $row['id_asistencia']?>" class="btn btn-outline-success">
                                                                   AGENDAR
                                                                </a>
                                                                <button style="display: block; margin: 0 auto;" disabled class="btn btn-primary"><?php echo $row['etapa']?></button>
                                                                <a href="grafico_instrumento.php?folio=<?php echo $fol_exp; ?>" class="btn btn-outline-secondary">
                                                                    <i class="fas fa-chart-line" ></i>
                                                                </a>
                                                            </td> -->
                                                            
                                                        </tr>

                                                        

                                                    <?php } ?>
                                            </tbody>

                                              

                                        </table> 


                                              <div class="contenedor">
                                                <!-- <a href="./solicitudes_registradas.php" class="">IR A SOLICITUDES REGISTRADAS</a> -->
                                                <button onclick="window.location='./solicitudes_registradas_agendar.php'" style="display: block; margin: 0 auto;" type="button" class="btn color-btn-success">SOLICITUDES <br> REGISTRADAS</button>
                                              </div>


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
    <a href="./notificar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>" class="btn-flotante">REGRESAR</a>
</div>

</body>
</html>

