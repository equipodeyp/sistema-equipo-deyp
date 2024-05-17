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
            <a href="./solicitudes_registradas.php">SOLICITUDES DE ASISTENCIAS MÉDICAS</a>
            <a class="actived" href="./agendar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>">AGENDAR TURNAR Y NOTIFICAR</a>
          </div>

          <!-- <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="">INICIO</a>
            <a href="">SOLICITUDES DE ASISTENCIAS MÉDICAS</a>
            <a class="actived" href="">AGENDAR TURNAR Y NOTIFICAR</a>
          </div> -->
          

            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a class="active" href="#" onclick="location.href='./agendar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-calendar"></span><span class="tab-text">1. AGENDAR</span></a></li>
                <li><a href="#" onclick="location.href='./agendar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-flag"></span><span class="tab-text">2. TURNAR</span></a></li>
                <li><a href="#" onclick="location.href='./agendar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-bell"></span><span class="tab-text">3. NOTIFICAR</span></a></li>
                <li><a href="#" onclick="location.href='./agendar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-address-card"></span><span class="tab-text">REGISTRO COMPLETADO</span></a></li>
              </ul>
                <form method="POST" action="./guardar_agenda.php">

                  <h3> Este apartado se conforma de 3 pasos (Agendar, Turnar y Notificar), para realizar el registro completo de la asistencia médica es necesario hacer el llenado de los mismos.
                       <!-- Una vez que ha sido registrada la información de cada uno de los pasos no sera posible retroceder o cancelar el proceso, asegurarte de tener toda la informacíon a la mano. -->
                  </h3>

                  
                  <div class="alert div-title">
                    <h3 style="text-align:center">1. AGENDAR ASISTENCIA MÉDICA</h3>
                  </div>



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
                        <select class="form-control" id="tipo_institucion" name="tipo_institucion" required>
                          <option disabled selected value="">SELECCIONA EL TIPO</option>
                            <?php while($row1 = $tipo_institucion->fetch_assoc()) {
                              echo "<option value='"; echo $row1['id']; echo "'>"; echo $row1['tipo']; echo"</option>";
                            }?>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="nombre_institucion" class="col-md-4 control-label" style="font-size: 16px">NOMBRE DE LA INSTITUCIÓN </label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-place-of-worship"></i></span>
                        <select class="form-control" id="nombre_institucion" name="nombre_institucion" required>
                          <option disabled selected value="">SELECCIONA UNA INSTITUCIÓN</option>

                        </select>
                      </div>
                    </div>
                  </div>



                  <div class="form-group">
                    <label for="domicilio_institucion" class="col-md-4 control-label" style="font-size: 16px">DOMICILIO DE LA INSTITUCIÓN </label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-globe"></i></span> 
                        <select class="form-control" id="domicilio_institucion" name="domicilio_institucion" required>
                          <option disabled selected value="">SELECCIONA EL DOMICILIO</option>

                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="municipio_institucion" class="col-md-4 control-label" style="font-size: 16px">MUNICIPIO  DE LA INSTITUCIÓN</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-flag"></i></span>
                        <select class="form-control" id="municipio_institucion" name="municipio_institucion" required>
                          <option disabled selected value="">SELECCIONA EL MUNICIPIO</option>

                        </select>
                      </div>
                    </div>
                  </div>




                  <div class="form-group">
                    <label for="fecha_asistencia" class="col-md-4 control-label">FECHA ASISTENCIA MÉDICA</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
                        <input required name="fecha_asistencia" type="date" class="form-control"  id="fecha_asistencia" placeholder="FECHA" value="" >
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="hora_asistencia" class="col-md-4 control-label">HORA ASITENCIA MÉDICA</label>
                    <div class="col-md-4">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fas fa-solid fa-clock"></i></span>
                          <input required name="hora_asistencia" type="time" class="form-control"  id="hora_asistencia"  placeholder="HORA" value="">
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="observaciones_asistencia" class="col-md-4 control-label" style="font-size: 16px">OBSERVACIONES ASITENCIA </label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <textarea name="observaciones_asistencia" id="observaciones_asistencia" rows="5" cols="33" maxlength="1000" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                      <button style="display: block; margin: 0 auto;" type="submit" class="btn color-btn-success">GUARDAR</button>
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
    <a href="./solicitudes_registradas.php" class="btn-flotante">REGRESAR</a>
</div>
<script src="../js/peticion_institucion_medica.js"></script>


</body>
</html>