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

$sentencia2=" SELECT nombre FROM usuarios_servidorespublicos WHERE usuario ='$user'";
$rnombre = $mysqli->query($sentencia2);
$fnombre=$rnombre->fetch_assoc();
$name_serv = $fnombre['nombre'];

$name_user = $name_serv;
$name_user = strtoupper($name_user);

// echo $name_user;
// echo $name_serv;



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
          <a href="./menu_asistencias_medicas.php">MENÚ ASISTENCIAS MÉDICAS</a>
            <a href="./solicitudes_registradas_agendar.php">SOLICITUDES DE ASISTENCIA MÉDICA MEDIDAS PROVISIONALES</a>
            <a class="actived" href="./notificar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>">1. AGENDAR - 2. TURNAR - 3. NOTIFICAR</a>
          </div>

          <!-- <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="">INICIO</a>
            <a href="">SOLICITUDES DE ASISTENCIAS MÉDICAS</a>
            <a class="actived" href="">AGENDAR TURNAR Y NOTIFICAR</a>
          </div> -->
          

            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a href="#"  onclick="location.href='./agendar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-calendar"></span><span class="tab-text">1. AGENDAR</span></a></li>
                <li><a href="#"  onclick="location.href='./turnar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-flag"></span><span class="tab-text">2. TURNAR</span></a></li>
                <li><a class="active" href="#"  onclick="location.href='./notificar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-bell"></span><span class="tab-text">3. NOTIFICAR</span></a></li>
                <!-- <li><a href="#" onclick="location.href='./notificar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-address-card"></span><span class="tab-text">REGISTRO COMPLETADO</span></a></li> -->
              </ul>
                <form method="POST" action="guardar_notificar.php">



                <?php
                  $querynot = "SELECT * FROM solicitud_asistencia WHERE id_asistencia='$id_asistencia_medica'";
                  $result_solicitud = $mysqli->query($querynot);
                  $fresult_solicitud = $result_solicitud->fetch_assoc();
                  $checknotificar = $fresult_solicitud['notificar'];
                  if ($checknotificar === 'SI') {
                    echo '<div class="alert div-title">
                      <h3 style="text-align:center">3. ASISTENCIA MÉDICA NOTIFICADA</h3>
                    </div>';
                  }else {
                    echo '<div class="alert div-title">
                      <h3 style="text-align:center">3. NOTIFICAR ASISTENCIA MÉDICA</h3>
                    </div>';
                  }
                  ?>



                  <div class="form-group" style="display: none;">
                    <label for="nombre_servidor" class="col-md-4 control-label">NOMBRE SERVIDOR PÚBLICO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-user"></i></span>
                        <input type="text" class="form-control"  id="nombre_servidor" name="nombre_servidor" placeholder="" readonly value="<?php echo $name_user;?>">
                      </div>
                    </div>
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


              <?php

              $notificar = "SELECT * FROM notificar_asistencia WHERE id_asistencia ='$id_asistencia_medica'";
              $rnotificar = $mysqli->query($notificar);
              $fnotificar = $rnotificar->fetch_assoc();

              if ($checknotificar === 'SI') {
                echo '
                    <div class="form-group">

                    <label for="turnar_asistencia" class="col-md-4 control-label" style="font-size: 16px">TURNADA LA SUBDIRECCIÓN DE EJECUCIÓN DE MEDIDAS</label>
                      <div class="col-md-4">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fas fa-solid fa-flag"></i></span>

                          <input disabled class="form-control" id="" name="" value="'; echo $fnotificar['notificar_subdireccion']; echo '">

                        </div>
                      </div>
                    </div>


                ';

                      if ($checknotificar === 'SI' && $fnotificar['notificar_subdireccion'] === "SI" ) {
                        echo '
                                <div class="form-group">
                                  <label for="numero_oficio_notificacion" class="col-md-4 control-label" style="font-size: 16px">NÚMERO DE OFICIO REGISTRADO</label>
                                  <div class="col-md-4">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="fas fa-solid fa-paperclip"></i></span>

                                          <input disabled class="form-control" id="" name="" value="'; echo $fnotificar['numero_oficio_notificacion']; echo '">

                                    </div>
                                  </div>
                                </div>


                                <div class="form-group">
                                  <label for="fecha_oficio_notificacion" class="col-md-4 control-label" style="font-size: 16px">FECHA DE RECEPCIÓN DEL OFICIO REGISTRADA</label>
                                  <div class="col-md-4">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="fas fa-solid fa-calendar"></i></span>

                                      <input disabled class="form-control" id="" name="" value="'; echo $fnotificar['fecha_oficio_notificacion']; echo '">

                                    </div>
                                  </div>
                                </div>

                            

                            ';
                      }
                      ?>
                      
                    <div class="form-group" id="guardar">
                      <label class="col-md-4 control-label"></label>
                      <div class="col-md-4">
                          <button onclick="window.location='./registro_completado.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'" style="display: block; margin: 0 auto;" type="button" class="btn color-btn-success">CONTINUAR</button>
                      </div>
                    </div>
              
              <?php         

              } else {

                echo'<div class="form-group" id="notificar">
                    <label for="notificar_subdireccion" class="col-md-4 control-label" style="font-size: 16px">NOTIFICAR A LA SUBDIRECCIÓN DE ANÁLISIS DE RIESGO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-bell"></i></span>

                          <select class="form-control" id="notificar_subdireccion" name="notificar_subdireccion" required>
                            <option disabled selected value="">SELECCIONA LA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO APLICA"> NO APLICA</option>
                          </select>

                      </div>
                    </div>
                  </div>


                  <div class="form-group" id="oficio" style="display: none;">
                    <label for="numero_oficio_notificacion" class="col-md-4 control-label" style="font-size: 16px">NÚMERO DE OFICIO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-paperclip"></i></span>

                          <input value autocomplete="off" type="text" class="form-control"  id="numero_oficio_notificacion" name="numero_oficio_notificacion">
                          
                      </div>
                    </div>
                  </div>



                  <div class="form-group" id="fecha" style="display: none;">
                    <label for="fecha_oficio_notificacion" class="col-md-4 control-label" style="font-size: 16px">FECHA DE RECEPCIÓN DEL OFICIO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-calendar"></i></span>

                        <input value type="date" class="form-control"  id="fecha_oficio_notificacion" name="fecha_oficio_notificacion">

                      </div>
                    </div>
                  </div>


                  <div class="form-group" id="guardar" style="display: none;">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">

                      <button style="display: block; margin: 0 auto;" type="submit" class="btn color-btn-success">GUARDAR</button>

                    </div>
                  </div>
                ';
              }?>







                </form>
              </div>
            </div><!-- /.container -->
          </article>
        </div>
      </div>
    </div>
  </div>


<div class="contenedor">
    <a href="./turnar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>" class="btn-flotante">REGRESAR</a>
</div>




</body>
</html>
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
document.getElementById("fecha_oficio_notificacion").setAttribute("min", today);
</script>


<script type="text/javascript">

  var notificarSubdireccion = document.getElementById('notificar_subdireccion');

  var respuestaSeleccionada;
  var respuestaObtenida;




  notificarSubdireccion.addEventListener('change', obtenerRespuesta);
  
  function obtenerRespuesta(e){

    respuestaSeleccionada = e.target.value;
    respuestaObtenida = respuestaSeleccionada;

    if (respuestaObtenida == "NO APLICA" ){      
      
      document.getElementById("numero_oficio_notificacion").value = "";
      document.getElementById("fecha_oficio_notificacion").value = "";

      document.getElementById("oficio").style.display = "none";
      document.getElementById("fecha").style.display = "none";
      document.getElementById("guardar").style.display = "";


    } else {
      document.getElementById("oficio").style.display = "";
      document.getElementById("fecha").style.display = "";
      document.getElementById("guardar").style.display = "none";

    }

 
// console.log (respuestaObtenida);



  }

  </script>




<script type="text/javascript">

  var numOficio = document.getElementById('numero_oficio_notificacion');

  var respuestaSeleccionadaOficio;
  var respuestaObtenidaOficio;

  ////////////////////////////////////

  var fechaOficio = document.getElementById('fecha_oficio_notificacion');

  var respuestaSeleccionadaFecha;
  var respuestaObtenidaFecha;


  
  ////////////////////////////////////


  numOficio.addEventListener('change', obtenerRespuestaOficio);

  function obtenerRespuestaOficio(e){

    respuestaSeleccionadaOficio = e.target.value;
    respuestaObtenidaOficio = respuestaSeleccionadaOficio;



          fechaOficio.addEventListener('change', obtenerRespuestaFecha);

              function obtenerRespuestaFecha(e){

                respuestaSeleccionadaFecha = e.target.value;
                respuestaObtenidaFecha = respuestaSeleccionadaFecha;

                if (respuestaObtenidaOficio != "" && respuestaObtenidaFecha != ""){

                  document.getElementById("guardar").style.display = "";
                  // console.log (respuestaObtenidaOficio);
                  // console.log (respuestaObtenidaFecha);
                }


                // console.log (respuestaObtenidaFecha);


              }



    // console.log (respuestaObtenidaOficio);

  }








  </script>