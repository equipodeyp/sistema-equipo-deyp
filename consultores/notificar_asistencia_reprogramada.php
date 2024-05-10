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
          <!-- <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="./admin.php">REGISTROS</a>
            <a href="./solicitudes _registradas.php">SOLICITUDES DE ASISTENCIAS MÉDICAS</a>
            <a class="actived" href="./notificar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>">AGENDAR TURNAR Y NOTIFICAR</a>
          </div> -->

          <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="">REGISTROS</a>
            <a href="">SOLICITUDES DE ASISTENCIAS MÉDICAS REPROGRAMADAS</a>
            <a class="actived" href="">REPROGRAMAR, TURNAR Y NOTIFICAR</a>
          </div>
          

            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a href="#"  onclick="location.href='./notificar_asistencia_reprogramada.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-calendar"></span><span class="tab-text">1. REPROGRAMAR</span></a></li>
                <li><a href="#"  onclick="location.href='./notificar_asistencia_reprogramada.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-flag"></span><span class="tab-text">2. TURNAR</span></a></li>
                <li><a class="active" href="#"  onclick="location.href='./notificar_asistencia_reprogramada.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-bell"></span><span class="tab-text">3. NOTIFICAR</span></a></li>
                <li><a href="#" onclick="location.href='./notificar_asistencia_reprogramada.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-address-card"></span><span class="tab-text">REGISTRO COMPLETADO</span></a></li>
              </ul>
                <form method="POST" action="guardar_notificar_reprogramada.php">


                  <div class="alert div-title">
                    <h3 style="text-align:center">3. NOTIFICAR ASISTENCIA MÉDICA</h3>
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


                  <div class="form-group" id="notificar">
                    <label for="notificar_subdireccion" class="col-md-4 control-label" style="font-size: 16px">NOTIFICAR A LA SUBDIRECCIÓN DE ANÁLISIS DE RIESGO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-bell"></i></span>
                        <!-- <input type="text" class="form-control"  id="notificar_subdireccion" name="notificar_subdireccion" value=""> -->
                        <select class="form-control" id="notificar_subdireccion" name="notificar_subdireccion" required>
                          <option disabled selected value="">SELECCIONA LA OPCIÓN</option>
                          <option value="SI">SI</option>
                          <option value="NO APLICA"> NO APLICA</option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="form-group" id="oficio">
                    <label for="numero_oficio_notificacion" class="col-md-4 control-label" style="font-size: 16px">NÚMERO DE OFICIO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-paperclip"></i></span>
                        <input autocomplete="off" type="text" class="form-control"  id="numero_oficio_notificacion" name="numero_oficio_notificacion">
                      </div>
                    </div>
                  </div>



                  <div class="form-group" id="fecha">
                    <label for="fecha_oficio_notificacion" class="col-md-4 control-label" style="font-size: 16px">FECHA DE RECEPCIÓN DEL OFICIO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-calendar"></i></span>
                        <input type="date" class="form-control"  id="fecha_oficio_notificacion" name="fecha_oficio_notificacion">
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                      <!-- <button id="siguiente" style="display: none; margin: 0 auto;" type="submit" class="btn color-btn-success">SIGUIENTE</button> -->
                      <button id="boton_notificar" style="display: block; margin: 0 auto;" type="submit" class="btn color-btn-success">GUARDAR</button>
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

<!-- <div class="contenedor">
    <a href="./solicitudes _registradas.php" class="btn-flotante">REGRESAR</a>
</div> -->





</body>
</html>

<script type="text/javascript">

  var notificarSubdireccion = document.getElementById('notificar_subdireccion');

  var respuestaSeleccionada;
  var respuestaObtenida;




  notificarSubdireccion.addEventListener('change', obtenerRespuesta);
  
  function obtenerRespuesta(e){

    respuestaSeleccionada = e.target.value;
    respuestaObtenida = respuestaSeleccionada;

    if (respuestaObtenida == "NO APLICA" ){

      document.getElementById("oficio").style.display = "none";
      document.getElementById("fecha").style.display = "none";
      document.getElementById("numero_oficio_notificacion").value = "";
      document.getElementById("fecha_oficio_notificacion").value = "";
      // document.getElementById("boton_notificar").style.display = "none";
      // document.getElementById("siguiente").style.display = "";

    } else {
      document.getElementById("oficio").style.display = "";
      document.getElementById("fecha").style.display = "";
      // document.getElementById("siguiente").style.display = "none";

    }

 
// console.log (respuestaObtenida);



  }

  </script>