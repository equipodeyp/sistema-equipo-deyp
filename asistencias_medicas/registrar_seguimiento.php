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

$sentencia2=" SELECT nombre FROM usuarios_servidorespublicos WHERE usuario ='$user' AND estatus = 'activo'";
$rnombre = $mysqli->query($sentencia2);
$fnombre=$rnombre->fetch_assoc();
$name_serv = $fnombre['nombre'];

// echo $name_serv;

$name_user = $name_serv;
$name_user = strtoupper($name_user);

// echo $name_user;

// echo "Agendar Asistencia Médica";



$id_asistencia_medica = $_GET["id_asistencia_medica"];


// echo $id_asistencia_medica;






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
            <a href="./asistencia_turnada.php">ASISTENCIAS MÉDICAS TURNADAS</a>
            <a class="actived" href="./registrar_seguimiento.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>">REGISTRAR SEGUIMIENTO</a>
          </div>

          <!-- <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="">INICIO</a>
            <a href="">SOLICITUDES DE ASISTENCIAS MÉDICAS</a>
            <a class="actived" href="">AGENDAR TURNAR Y NOTIFICAR</a>
          </div> -->
          

            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a class="active" href="#" onclick="location.href='./agendar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-address-card"></span><span class="tab-text">REGISTRAR SEGUIMIENTO</span></a></li>
                <!-- <li><a href="#" onclick="location.href='./agendar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-flag"></span><span class="tab-text">2. TURNAR</span></a></li>
                <li><a href="#" onclick="location.href='./agendar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-bell"></span><span class="tab-text">3. NOTIFICAR</span></a></li>
                <li><a href="#" onclick="location.href='./agendar_asistencia.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-address-card"></span><span class="tab-text">REGISTRO COMPLETADO</span></a></li> -->
              </ul>
                <form method="POST" action="./guardar_seguimiento.php">

                  
                  <div class="alert div-title">
                    <h3 style="text-align:center">REGISTRO DE SEGUIMIENTO DE LA ASISTENCIA MÉDICA</h3>
                  </div>

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
                        <input type="text" class="form-control"  id="id_asistencia" name="id_asistencia" readonly value="<?php echo $id_asistencia_medica;?>">
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="servicio_medico" class="col-md-4 control-label">SERVICIO MÉDICO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-briefcase-medical"></i></span>
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
                        <!-- <input type="text" class="form-control"  id="servicio_medico" name="servicio_medico" readonly value="<?php echo $id_asistencia_medica;?>"> -->
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="traslado" class="col-md-4 control-label" style="font-size: 16px">TRASLADO REALIZADO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-car"></i></span>
                        <select value class="form-control" id="traslado" name="traslado" required>
                          <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                          <option value="SI">SI</option>
                          <option value="NO">NO</option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="form-group" id="sepresento">
                    <label for="se_presento" class="col-md-4 control-label" style="font-size: 16px">SE PRESENTÓ A LA ASISTENCIA MÉDICA</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-stethoscope"></i></span>
                        <select value class="form-control" id="se_presento" name="se_presento">
                          <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                          <option value="SI">SI</option>
                          <option value="NO">NO</option>
                        </select>
                      </div>
                    </div>
                  </div>





                  <div class="form-group" id="reprogramar_div" style="display: none;">
                    <label for="reprogramar" class="col-md-4 control-label" style="font-size: 16px">REPROGRAMAR ASISTENCIA MÉDICA</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-car"></i></span>
                        <select value class="form-control" id="reprogramar" name="reprogramar">
                          <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                          <option value="SI">SI</option>
                          <option value="NO">NO</option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="form-group" id="motivo_div" style="display: none;">
                    <label for="motivo" class="col-md-4 control-label" style="font-size: 16px">MOTIVO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-car"></i></span>
                        <select value class="form-control" id="motivo" name="motivo">
                          <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                          <option value="CANCELACIÓN">CANCELACIÓN</option>
                          <option value="DESICIÓN DEL SUJETO">DECISIÓN DEL SUJETO</option>
                          <option value="DESINCORPORACIÓN">DESINCORPORACIÓN</option>
                          <option value="OTRO">OTRO</option>
                          <option value="RECURSOS">RECURSOS</option>
                        </select>
                      </div>
                    </div>
                  </div>



        



        <div id=division_1>

                  <!-- <div class="form-group">
                    <label for="policia_investigacion" class="col-md-4 control-label" style="font-size: 16px">POLICIA DE INVESTIGACIÓN A CARGO DEL TRASLADO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-user-secret"></i></span>
                        <input value autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="policia_investigacion" name="policia_investigacion" placeholder="NOMBRE DEL P.D.I.">
                      </div>
                    </div>
                  </div> -->



                  <div class="form-group">
                    <label for="hospitalizacion" class="col-md-4 control-label" style="font-size: 16px">HOSPITALIZACIÓN</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-hospital"></i></span> 
                        <select value class="form-control" id="hospitalizacion" name="hospitalizacion">
                          <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                          <option value="URGENCIA">URGENCIA</option>
                          <option value="INTERVENCIÓN QUIRÚRGICA">INTERVENCIÓN QUIRÚRGICA</option>
                          <option value="NO">NO</option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="diagnostico" class="col-md-4 control-label" style="font-size: 16px">DIAGNÓSTICO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-briefcase-medical"></i></span>
                        <input value autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="diagnostico" name="diagnostico" placeholder="DESCRIBE EL DIAGNÓSTICO">
                      </div>
                    </div>
                  </div>




                  <div class="form-group">
                    <label for="cita_seguimiento" class="col-md-4 control-label">REQUIERE CITA DE SEGUIMIENTO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
                        <select value class="form-control" id="cita_seguimiento" name="cita_seguimiento">
                          <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                          <option value="SI">SI</option>
                          <option value="NO">NO</option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="informe_medico" class="col-md-4 control-label" style="font-size: 16px">INFORME MÉDICO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <textarea onkeypress="cancelar()" value name="informe_medico" id="informe_medico" rows="6" cols="33" maxlength="1000" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
                      </div>
                    </div>
                  </div>

        </div>



                  <div class="form-group">
                    <label for="observaciones_seguimiento" class="col-md-4 control-label" style="font-size: 16px">COMENTARIOS </label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <textarea onkeypress="cancelar()" value name="observaciones_seguimiento" id="observaciones_seguimiento" rows="3" cols="33" maxlength="1000" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
                      </div>
                    </div>
                  </div>



                  <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                      <br>
                      <button style="display: block; margin: 0 auto;" type="submit" class="btn color-btn-success">REGISTRAR SEGUIMIENTO</button>
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
    <a href="./asistencia_turnada.php" class="btn-flotante">REGRESAR</a>
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

  var trasladoRealizado = document.getElementById('traslado');

  var respuestaSeleccionada;
  var respuestaObtenida;




  trasladoRealizado.addEventListener('change', obtenerRespuesta);
  
  function obtenerRespuesta(e){

    respuestaSeleccionada = e.target.value;
    respuestaObtenida = respuestaSeleccionada;




    var sePresento = document.getElementById('se_presento');

    var respuestaSeleccionada2;
    var respuestaObtenida2;




    sePresento.addEventListener('change', obtenerRespuesta2);

    function obtenerRespuesta2(e){

      respuestaSeleccionada2 = e.target.value;
      respuestaObtenida2 = respuestaSeleccionada2;

        if (respuestaObtenida == "SI" && respuestaObtenida2 == "NO"){

          document.getElementById("division_1").style.display = "none";
          document.getElementById("reprogramar_div").style.display = "";
          document.getElementById("motivo_div").style.display = "";
          // document.getElementById("guardar").style.display = "";
          // document.getElementById("registrar_seguimiento").style.display = "none";


          document.getElementById("policia_investigacion").value = "";
          document.getElementById("hospitalizacion").value = "";
          document.getElementById("diagnostico").value = "";
          document.getElementById("cita_seguimiento").value = "";
          document.getElementById("informe_medico").value = "";
          document.getElementById("observaciones_seguimiento").value = "";

          document.getElementById("reprogramar").value = "";
          document.getElementById("motivo").value = "";

          // console.log (respuestaObtenida);
          // console.log (respuestaObtenida2);

        } 
        
        else if(respuestaObtenida == "SI" && respuestaObtenida2 == "SI"){

          document.getElementById("division_1").style.display = "";
          document.getElementById("reprogramar_div").style.display = "";
          document.getElementById("motivo_div").style.display = "none";
          // document.getElementById("guardar").style.display = "none";
          // document.getElementById("registrar_seguimiento").style.display = "";

          document.getElementById("policia_investigacion").value = "";
          document.getElementById("hospitalizacion").value = "";
          document.getElementById("diagnostico").value = "";
          document.getElementById("cita_seguimiento").value = "";
          document.getElementById("informe_medico").value = "";
          document.getElementById("observaciones_seguimiento").value = "";

          // console.log (respuestaObtenida);
          // console.log (respuestaObtenida2);
        }


    }


}




var trasladoRealizado2 = document.getElementById('traslado');

var respuestaSeleccionada3;
var respuestaObtenida3;




trasladoRealizado2.addEventListener('change', obtenerRespuesta3);

function obtenerRespuesta3(e){

  respuestaSeleccionada3 = e.target.value;
  respuestaObtenida3 = respuestaSeleccionada3;

  if (respuestaObtenida3 == "NO" ){

    document.getElementById("division_1").style.display = "none";
    document.getElementById("reprogramar_div").style.display = "";
    document.getElementById("motivo_div").style.display = "";
    // document.getElementById("guardar").style.display = "";
    // document.getElementById("registrar_seguimiento").style.display = "none";
    document.getElementById("sepresento").style.display = "none";

    document.getElementById("policia_investigacion").value = "";
    document.getElementById("hospitalizacion").value = "";
    document.getElementById("diagnostico").value = "";
    document.getElementById("cita_seguimiento").value = "";
    document.getElementById("informe_medico").value = "";
    document.getElementById("observaciones_seguimiento").value = "";
    document.getElementById("se_presento").value = "";

  } else {

    // document.getElementById("registrar_seguimiento").style.display = "";
    // document.getElementById("guardar").style.display = "none";
    document.getElementById("reprogramar_div").style.display = "none";
    document.getElementById("motivo_div").style.display = "none";
    document.getElementById("division_1").style.display = "";
    document.getElementById("sepresento").style.display = "";

    document.getElementById("reprogramar").value = "";
    document.getElementById("motivo").value = "";
    document.getElementById("observaciones_seguimiento").value = "";



  }






}






  </script>