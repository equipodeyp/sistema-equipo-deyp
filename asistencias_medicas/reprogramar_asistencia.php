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

$sentencia2=" SELECT nombre FROM usuarios_servidorespublicos WHERE usuario ='$user'";
$rnombre = $mysqli->query($sentencia2);
$fnombre=$rnombre->fetch_assoc();
$name_serv = $fnombre['nombre'];

$name_user = $name_serv;
$name_user = strtoupper($name_user);

// echo $name_user;
// echo $name_serv;




// $sentencia_am = "SELECT * FROM solicitud_asistencia WHERE id_asistencia='$id_asistencia_medica'";
// $result_am = mysqli_query($mysqli, $sentencia_am);
// $r_am = mysqli_fetch_array($result_am);
// $folio_expediente = $r_am['folio_expediente'];
// $id_sujeto = $r_am['id_sujeto'];

// echo $folio_expediente;
// echo $id_sujeto;





?>

<!DOCTYPE html>
<html lang="es">
<head>

  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UPSIPPED</title>
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../css/breadcrumb.css">

  <link rel="stylesheet" href="../css/expediente.css">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/expediente.js"></script>
  <script src="../js/solicitud.js"></script>
  <script src="../js/Javascript.js"></script>
  <!-- <script src="../js/validar_campos.js"></script> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/cli.css">



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
            <a href="./admin.php">INICIO</a>
            <!-- <a href="./solicitudes_registradas.php">SOLICITUDES DE ASISTENCIAS MÉDICAS</a> -->
            <a href="./asistencias_reprogramadas.php">ASISTENCIAS MÉDICAS REPROGRAMADAS</a>
            <a class="actived" href="./reprogramar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>">1. AGENDAR</a>
          </div>

          <!-- <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="">INICIO</a>
            <a href="">SOLICITUDES DE ASISTENCIAS MÉDICAS</a>
            <a class="actived" href="">AGENDAR TURNAR Y NOTIFICAR</a>
          </div> -->
          



            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a class="active" href="#" onclick="location.href='./reprogramar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-calendar"></span><span class="tab-text">1. AGENDAR</span></a></li>
                <!-- <li><a href="#" onclick="location.href='./reprogramar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-flag"></span><span class="tab-text">2. TURNAR</span></a></li>
                <li><a href="#" onclick="location.href='./reprogramar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-bell"></span><span class="tab-text">3. NOTIFICAR</span></a></li>
                <li><a href="#" onclick="location.href='./reprogramar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-address-card"></span><span class="tab-text">REGISTRO COMPLETADO</span></a></li> -->
              </ul>

              
                

                  <h3> Este apartado se conforma de 3 pasos (Reprogramar, Turnar y Notificar), para realizar el registro completo de la asistencia médica es necesario hacer el llenado de los mismos.
                       <!-- Una vez que ha sido registrada la información de cada uno de los pasos no sera posible retroceder o cancelar el proceso, asegurarte de tener toda la informacíon a la mano. -->
                  </h3>

                  
                  <!-- <div class="alert div-title">
                    <h3 style="text-align:center">1. REPROGRAMAR ASISTENCIA MÉDICA</h3>
                  </div> -->


                  <?php

                  $queryag = "SELECT * FROM solicitud_asistencia WHERE id_asistencia='$id_asistencia_medica'";
                  $result_solicitud = $mysqli->query($queryag);
                  $fresult_solicitud = $result_solicitud->fetch_assoc();
                  $checkagendar = $fresult_solicitud['agendar'];
                  // echo $checkagendar;

                  if ($checkagendar === 'SI') {
                    echo '<div class="alert div-title">
                      <h3 style="text-align:center">1. ASISTENCIA MÉDICA REPROGRAMADA</h3>
                    </div>';
                  }else {
                    echo '<div class="alert div-title">
                      <h3 style="text-align:center">1. REPROGRAMAR ASISTENCIA MÉDICA</h3>
                    </div>';
                  }
                  ?>






                  <div class="form-group">
                    <label for="id_asistencia" class="col-md-4 control-label">ID ASISTENCIA MÉDICA</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-briefcase-medical"></i></span>
                        <input type="text" class="form-control"  id="id_asistencia" name="id_asistencia" placeholder="" readonly value="<?php echo $id_asistencia_medica;?>">
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="servicio_medico" class="col-md-4 control-label" style="font-size: 16px">SERVICIO MÉDICO </label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-stethoscope"></i></span>
                        <?php

                        $count = 0;
                        
                        $query = "SELECT * FROM solicitud_asistencia WHERE id_asistencia='$id_asistencia_medica'";
                        $result_solicitud = mysqli_query($mysqli, $query);
            
                        while($row = mysqli_fetch_array($result_solicitud)) {
                            // echo "hola";
                            $servicio_medico = $row['servicio_medico'];
                            ?>
                            
                            <input readonly class="form-control" id="servicio_medico" name="servicio_medico" value="<?php echo $servicio_medico; ?>">
                        <?php
                        }
                        ?>


                        
                      </div>
                    </div>
                  </div>



                  <div class="form-group">
                    <label for="tipo_institucion" class="col-md-4 control-label" style="font-size: 16px">TIPO DE INSTITUCIÓN </label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-layer-group"></i></span>
                        <?php

                        $count = 0;
                        
                        $query = "SELECT * FROM agendar_asistencia WHERE id_asistencia='$id_asistencia_medica'";
                        $result_solicitud = mysqli_query($mysqli, $query);
            
                        while($row = mysqli_fetch_array($result_solicitud)) {
                            // echo "hola";
                            $tipo_institucion = $row['tipo_institucion'];
                            ?>
                            
                            <input readonly class="form-control" id="tipo_institucion" name="tipo_institucion" value="<?php echo $tipo_institucion; ?>">
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="nombre_institucion" class="col-md-4 control-label" style="font-size: 16px">NOMBRE DE LA INSTITUCIÓN </label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-place-of-worship"></i></span>
                        <?php

                        $count = 0;

                        $query = "SELECT * FROM agendar_asistencia WHERE id_asistencia='$id_asistencia_medica'";
                        $result_solicitud = mysqli_query($mysqli, $query);

                        while($row = mysqli_fetch_array($result_solicitud)) {
                            // echo "hola";
                            $nombre_institucion = $row['nombre_institucion'];
                            ?>
                            
                            <input readonly class="form-control" id="nombre_institucion" name="nombre_institucion" value="<?php echo $nombre_institucion; ?>">
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>



                  <div class="form-group">
                    <label for="domicilio_institucion" class="col-md-4 control-label" style="font-size: 16px">DOMICILIO DE LA INSTITUCIÓN </label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-globe"></i></span> 
                        <?php

                        $count = 0;

                        $query = "SELECT * FROM agendar_asistencia WHERE id_asistencia='$id_asistencia_medica'";
                        $result_solicitud = mysqli_query($mysqli, $query);

                        while($row = mysqli_fetch_array($result_solicitud)) {
                            // echo "hola";
                            $domicilio_institucion = $row['domicilio_institucion'];
                            ?>
                            
                            <input readonly class="form-control" id="domicilio_institucion" name="domicilio_institucion" value="<?php echo $domicilio_institucion; ?>">
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="municipio_institucion" class="col-md-4 control-label" style="font-size: 16px">MUNICIPIO  DE LA INSTITUCIÓN</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-flag"></i></span>
                        <?php

                        $count = 0;

                        $query = "SELECT * FROM agendar_asistencia WHERE id_asistencia='$id_asistencia_medica'";
                        $result_solicitud = mysqli_query($mysqli, $query);

                        while($row = mysqli_fetch_array($result_solicitud)) {
                            // echo "hola";
                            $municipio_institucion = $row['municipio_institucion'];
                            ?>
                            
                            <input readonly class="form-control" id="municipio_institucion" name="municipio_institucion" value="<?php echo $municipio_institucion; ?>">
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>



                <form method="POST" action="./guardar_reprogramar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica;?>">

                <div class="form-group" style="display: none;">
                    <label for="nombre_servidor" class="col-md-4 control-label">NOMBRE SERVIDOR PÚBLICO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-user"></i></span>
                        <input type="text" class="form-control"  id="nombre_servidor" name="nombre_servidor" placeholder="" readonly value="<?php echo $name_user;?>">
                      </div>
                    </div>
                  </div>

                <?php
                  $citaasistencia = "SELECT * 
                                      FROM cita_asistencia 
                                      WHERE id_asistencia ='$id_asistencia_medica'
                                      ORDER BY cita_asistencia.id DESC
                                      LIMIT 1";

                  $rcitaasistencia = $mysqli->query($citaasistencia);
                  $fcitaasistencia = $rcitaasistencia->fetch_assoc();
                  // echo $checkagendar;
                  // echo '<br>';
                  // echo $fcitaasistencia['fecha_asistencia'];
                  // echo '<br>';
                  // echo $fcitaasistencia['hora_asistencia'];
                ?>

                <!-- <br> -->
                <h5 style="text-align:center"> Registra fecha y hora de reprogramación.</h5>
                <!-- <br> -->

                  <div class="form-group">
                    <label for="fecha_asistencia" class="col-md-4 control-label">FECHA ASISTENCIA MÉDICA</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>

                        <!-- <input required name="fecha_asistencia" type="date" class="form-control input-group-addon"  id="fecha_asistencia" placeholder="FECHA" value="" > -->

                        <?php
                        if ($checkagendar === 'SI') {
                          // echo "<option value='"; echo $fagendar['municipio_institucion']; echo "'>"; echo $fagendar['municipio_institucion']; echo"</option>";
                          echo '<input disabled name="" type="date" class="form-control input-group-addon"  id="" value="'; echo $fcitaasistencia['fecha_asistencia']; echo '">';
                        }else {
                        ?>
                        <input required name="fecha_asistencia" type="date" class="form-control"  id="fecha_asistencia" value="">
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="hora_asistencia" class="col-md-4 control-label">HORA ASISTENCIA MÉDICA</label>
                    <div class="col-md-4">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fas fa-solid fa-clock"></i></span>

                          <!-- <input required name="hora_asistencia" type="time" class="form-control input-group-addon"  id="hora_asistencia"  placeholder="HORA" value=""> -->

                          <?php
                          if ($checkagendar === 'SI') {
                            // echo "<option value='"; echo $fagendar['municipio_institucion']; echo "'>"; echo $fagendar['municipio_institucion']; echo"</option>";
                            echo '<input disabled name="" type="time" class="form-control input-group-addon"  id="" value="'; echo $fcitaasistencia['hora_asistencia']; echo '">';
                          }else {
                          ?>
                          <input required name="hora_asistencia" type="time" class="form-control"  id="hora_asistencia"  value="">
                          <?php
                          }
                          ?>


                      </div>
                    </div>
                  </div>


                  <!-- <div class="form-group">
                    <label for="observaciones_asistencia" class="col-md-4 control-label" style="font-size: 16px">OBSERVACIONES ASITENCIA </label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <?php

                        $count = 0;

                        $query = "SELECT * FROM agendar_asistencia WHERE id_asistencia='$id_asistencia_medica'";
                        $result_solicitud = mysqli_query($mysqli, $query);

                        while($row = mysqli_fetch_array($result_solicitud)) {
                            // echo "hola";
                            $observaciones_asistencia = $row['observaciones'];
                            ?>
                            <textarea onkeypress="cancelar()" disabled name="observaciones_asistencia" id="observaciones_asistencia" rows="5" cols="33" maxlength="1000" placeholder="<?php echo $observaciones_asistencia; ?>"></textarea>
                        <?php
                        }
                        ?>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">

                      <!-- <button style="display: block; margin: 0 auto;" type="submit" class="btn color-btn-success">GUARDAR</button> -->
                      <?php
                      $checkcita = "SELECT * FROM solicitud_asistencia WHERE id_asistencia = '$id_asistencia_medica'";
                      $rcheckcita = $mysqli->query($checkcita);
                      $fcheckcita = $rcheckcita->fetch_assoc();
                      $standby = $fcheckcita['agendar'];
                      if ($standby === 'SI') {
                        ?>
                        <button onclick="window.location='./turnar_asistencia_reprogramada.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'" style="display: block; margin: 0 auto;" type="button" class="btn color-btn-success">CONTINUAR</button>
                        <?php
                      }else{
                        echo '<button style="display: block; margin: 0 auto;" type="submit" class="btn color-btn-success">GUARDAR</button>';
                      }
                      ?>

                    </div>
                  </div>


                </form>
              </div>
            </div><!-- /.container -->
          </article>
        </div>
      </div>
    </div>
  </div>

<div class="contenedor">
    <a href="./asistencias_reprogramadas.php" class="btn-flotante">REGRESAR</a>
</div>

<script type="text/javascript">
function cancelar() {
    var key = event.keyCode;

    if (key === 13) {
        event.preventDefault();
    }
}
</script>

<script type="text/javascript">
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
if(dd<10){
      dd='0'+dd
  }
  if(mm<10){
      mm='0'+mm
  }
today = yyyy+'-'+mm+'-'+dd;
document.getElementById("fecha_asistencia").setAttribute("min", today);
</script>

</body>
</html>