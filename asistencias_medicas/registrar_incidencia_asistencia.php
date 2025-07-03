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
// echo $user;

$row_nombre = $row['nombre'];
$apellido_p = $row['apellido_p'];
$apellido_m = $row['apellido_m'];
$name_user = $row_nombre." ".$apellido_p." " .$apellido_m;
$full_name = mb_strtoupper (html_entity_decode($name_user, ENT_QUOTES | ENT_HTML401, "UTF-8"));

$m_user = $user;
$m_user = strtoupper($m_user);
// echo "$full_name";

$sentencia2=" SELECT nombre FROM usuarios_servidorespublicos WHERE usuario ='$user'";
$rnombre = $mysqli->query($sentencia2);
$fnombre=$rnombre->fetch_assoc();
$name_serv = $fnombre['nombre'];

$name_user = $name_serv;
$name_user = strtoupper($name_user);







$sentencia2=" SELECT * FROM usuarios_servidorespublicos WHERE usuario ='$user'";
$rnombre = $mysqli->query($sentencia2);
$fnombre=$rnombre->fetch_assoc();
$name_serv = $fnombre['nombre'];
$ap_serv = $fnombre['apaterno'];
$am_serv = $fnombre['amaterno'];
$usuario = $fnombre['usuario'];
// echo $usuario;

$m_usuario = strtoupper($usuario);
// echo $m_usuario;

$name_user = $name_serv;
$name_user = strtoupper($name_user);
$names = $name_user;
$one_name = explode(" ", $names); 
$primer_nombre = $one_name[0];

// echo $primer_nombre;

$a_paterno = $ap_serv;
$a_paterno = strtoupper($a_paterno);
$ap_string = $a_paterno;
$inicial_ap = $ap_string[0];
// echo $inicial_ap;

$a_materno = $am_serv;
$a_materno = strtoupper($a_materno);
$am_string = $a_materno;
$inicial_am = $am_string[0];
// echo $inicial_am;



$id_servidor_ini = $primer_nombre.$inicial_ap.$inicial_am;
// echo $id_servidor_ini;

?>

<!DOCTYPE html>
<html lang="es">
<head>

  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UPSIPPED</title>
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../css/breadcrumb.css">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <a class="actived" href="./registrar_incidencia_asistencia.php">REGISTRAR UNA INCIDENCIA</a>
          </div>


            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a href="#" class="active" onclick="location.href='./registrar_incidencia_asistencia.php'"><span class="fas fa-regular fa-clipboard"></span><span class="tab-text">REGISTRAR UNA INCIDENCIA</span></a></li>
                <li><a href="#" onclick="location.href='./incidencias_registradas_asistencia.php'"><span class="far fa-regular fa-address-card"></span><span class="tab-text">INCIDENCIAS REGISTRADAS</span></a></li>
                <li><a href="#" onclick="location.href='./incidencias_atendidas.php'"><span class="far fa-regular fa-thumbs-up"></span><span class="tab-text">INCIDENCIAS <BR> ATENDIDAS</span></a></li>
              </ul>

                <form method="POST" action="./guardar_incidencia_asistencia.php">
                  <div class="alert div-title">
                    <h3 style="text-align:center">REGISTRAR INCIDENCIA</h3>
                  </div>


                <div class="form-group">
                    <label for="id_servidor" class="col-md-4 control-label">NOMDRE DE USUARIO</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-user"></i></span>
                        <input type="text" class="form-control"  id="id_servidor" name="id_servidor" placeholder="" value="<?php echo $m_usuario;?>" readonly>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombre_servidor" class="col-md-4 control-label">NOMBRE SERVIDOR PÚBLICO</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-user"></i></span>
                        <input type="text" class="form-control"  id="nombre_servidor" name="nombre_servidor" placeholder="" readonly value="<?php echo $full_name;?>">
                      </div>
                    </div>
                  </div>


                <div class="form-group" >
                    <label for="subdireccion" class="col-md-4 control-label">SUBDIRECCIÓN</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-solid fa-building"></i></span>
                         <input readonly class="form-control" id="subdireccion" name="subdireccion" type="text" value="<?php echo mb_strtoupper (html_entity_decode($row_user['area'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>">
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="folio_expediente" class="col-md-4 control-label" style="font-size: 16px">FOLIO DEL EXPEDIENTE</label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-folder"></i></span>
                        <select class="form-control" id="folio_expediente" name="folio_expediente" required>
                            <option disabled selected value="">SELECCIONE EL EXPEDIENTE</option>
                              <?php
                                  $select1 = "SELECT DISTINCT solicitud_asistencia.folio_expediente
                                  FROM solicitud_asistencia
                                  WHERE solicitud_asistencia.etapa != 'CANCELADA'";
                                  $answer1 = $mysqli->query($select1);
                                  while($valores1 = $answer1->fetch_assoc()){
                                    $result_folio = $valores1['folio_expediente'];
                                    echo "<option value='$result_folio'>$result_folio</option>";
                                  }
                              ?>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id_sujeto" class="col-md-4 control-label" style="font-size: 16px">ID SUJETO</label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-id-card"></i></span>
                        <select class="form-control" id="id_sujeto" name="id_sujeto" required>



                        </select>
                      </div>
                    </div>
                  </div>



                  <div class="form-group" >
                    <label for="id_asistencia" class="col-md-4 control-label">ID ASISTENCIA MÉDICA</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-briefcase-medical"></i></span>
                        <select class="form-control" id="id_asistencia" name="id_asistencia" required>



                        
                        </select>
                      </div>
                    </div>
                  </div>


                  <?php
                                  // if ($m_user == 'NANOTZIN') {

                                  //   $select1 = "SELECT solicitud_asistencia.id_asistencia
                                  //   FROM solicitud_asistencia";

                                  //   $answer1 = $mysqli->query($select1);
                                  //     while($valores1 = $answer1->fetch_assoc()){
                                  //     $result_folio = $valores1['id_asistencia'];
                                  //     echo "
                                  //       <option value='$result_folio'>$result_folio</option>";
                                  //   }


                                  // }

                                  // else {

                                  //   $select1 = "SELECT solicitud_asistencia.id_asistencia
                                  //   FROM solicitud_asistencia
                                  //   WHERE solicitud_asistencia.id_servidor = '$id_servidor_ini'";

                                  //     $answer1 = $mysqli->query($select1);
                                  //     while($valores1 = $answer1->fetch_assoc()){
                                  //     $result_folio = $valores1['id_asistencia'];
                                  //     echo "
                                  //       <option value='$result_folio'>$result_folio</option>
                                  //     ";
                                  //   }

                                  // }
                              ?>

                <div class="form-group">
                    <label for="tipo_falla" class="col-md-4 control-label" style="font-size: 16px">TIPO DE FALLA O ERROR </label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-exclamation"></i></span>
                        <select class="form-control selectpicker" id="tipo_falla" name="tipo_falla" required>
                        <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                            <option value="ACCESO">ACCESO</option>
                            <option value="CAPTURA">CAPTURA DE LOS DATOS</option>
                            <option value="FUNCIONALIDAD">FUNCIONALIDAD</option>
                            <option value="OTRO">OTRO</option>
                        </select>
                      </div>
                    </div>
                  </div>





                  <div class="form-group" style="display: none">
                    <label for="estatus" class="col-md-4 control-label">ESTATUS DE LA INCIDENCIA</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-hourglass-start"></i></span>
                        <input readonly type="text" class="form-control"  id="estatus" name="estatus" placeholder="" value="EN PROCESO">
                      </div>
                    </div>
                  </div>



                  <div class="form-group" style="display: none">
                    <label for="atencion" class="col-md-4 control-label">USUARIO EN ATENCIÓN</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-user"></i></span>
                        <input readonly type="text" class="form-control"  id="atencion" name="atencion" placeholder="" value="">
                      </div>
                    </div>
                  </div>




                  <div class="form-group">
                    <label for="descripcion" class="col-md-4 control-label" style="font-size: 16px">DESCRIPCIÓN BREVE DE LA FALLA</label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">

                        <textarea onkeypress="cancelar()" required name="descripcion" id="descripcion" rows="5" cols="33" maxlength="1000" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
                        <h6>Ejemplo: En el apartado calendario no se visualizan las fechas del mes de Junio.</h6>
                      </div>
                    </div>
                  </div>

                  <br>

                  <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                      <button style="display: block; margin: 0 auto;" id="guardar_asistencia" class="btn color-btn-success" type="submit">GUARDAR REGISTRO</button>
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
    <a href="admin.php" class="btn-flotante color-btn-success-gray">REGRESAR</a>
  </div>


<script src="../js/peticion_folio_expediente.js"></script>
<script src="../js/alert.js"></script>



<script type="text/javascript">
function cancelar() {
    var key = event.keyCode;

    if (key === 13) {
        event.preventDefault();
    }
}
</script>

<script type="text/javascript">


var folioExpediente = document.getElementById('id_asistencia');

var respuestaSeleccionada3;
var respuestaObtenida3;




folioExpediente.addEventListener('change', obtenerRespuesta3);

function obtenerRespuesta3(e){

  respuestaSeleccionada3 = e.target.value;
  respuestaObtenida3 = respuestaSeleccionada3;


  // console.log(respuestaObtenida3);
}

  </script>



















<script type="text/javascript">

function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}
let alea = getRandomInt(23);

// console.log(alea);


if (alea === 13 || alea === 16 || alea === 19 || alea === 22 || alea === 2 || alea === 5 || alea === 8 || alea === 11 || alea === 14 || alea === 17 || alea === 20 || alea === 23){
  const jon = "JONATHAN EDUARDO SANTIAGO JIMENEZ";
  document.getElementById("atencion").value = jon;
  // console.log(jon);
}
else if(alea === 1 || alea === 4 || alea === 7 || alea === 10 || alea === 3 || alea === 6 || alea === 9 || alea === 12 || alea === 15 || alea === 18 || alea === 21 || alea === 0){
  const gab = "GABRIELA PICHARDO GARCIA";
  document.getElementById("atencion").value = gab;
  // console.log(gab);
}

</script>


</body>
</html>
