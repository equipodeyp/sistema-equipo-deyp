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

$row_nombre = $row['nombre'];
$apellido_p = $row['apellido_p'];
$apellido_m = $row['apellido_m'];
$name_user = $row_nombre." ".$apellido_p." " .$apellido_m;
$full_name = mb_strtoupper (html_entity_decode($name_user, ENT_QUOTES | ENT_HTML401, "UTF-8"));

$m_user = $user;
$m_user = strtoupper($m_user);

// echo $m_user; 
// echo $user;
// $f_exped = 'UPSIPPED/TOL/113/015/2022';
// echo $f_exped;



// $sql = "SELECT * FROM tickets WHERE usuario = '$full_name'";
// $result = mysqli_query($mysqli, $sql);
// $rowcount = mysqli_num_rows( $result );
// $suma = $rowcount + 1;
// $num_incidencia = 0 . $suma;
// echo $num_incidencia;

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
                    <label for="id_servidor" class="col-md-4 control-label">ID SERVIDOR PÚBLICO</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-user"></i></span>
                        <input type="text" class="form-control"  id="id_servidor" name="id_servidor" placeholder="" value="<?php echo $m_user;?>" readonly>
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


                  <!-- <div class="form-group">
                    <label for="folio_expediente" class="col-md-4 control-label" style="font-size: 16px">FOLIO DEL EXPEDIENTE</label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-folder"></i></span>
                        <select class="form-control" id="folio_expediente" name="folio_expediente" required>
                            <option disabled selected value="">SELECCIONE EL EXPEDIENTE</option>
                              <?php
                                  $select1 = "SELECT DISTINCT datospersonales.folioexpediente
                                  FROM datospersonales
                                  WHERE datospersonales.estatusprograma = 'ACTIVO' AND datospersonales.reingreso = 'NO'";
                                  $answer1 = $mysqli->query($select1);
                                  while($valores1 = $answer1->fetch_assoc()){
                                    $result_folio = $valores1['folioexpediente'];
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
                  </div> -->


                  <div class="form-group" >
                    <label for="id_asistencia" class="col-md-4 control-label">ID ASISTENCIA MÉDICA</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-briefcase-medical"></i></span>
                        <select class="form-control" id="id_asistencia" name="id_asistencia" required>
                            <option disabled selected value="">SELECCIONE EL ID ASISTENCIA</option>
                              <?php
                                  $select1 = "SELECT solicitud_asistencia.id_asistencia
                                  FROM solicitud_asistencia
                                  WHERE solicitud_asistencia.id_servidor = '$m_user'";
                                  $answer1 = $mysqli->query($select1);
                                  while($valores1 = $answer1->fetch_assoc()){
                                    $result_folio = $valores1['id_asistencia'];
                                    echo "<option value='$result_folio'>$result_folio</option>";
                                  }
                              ?>
                        </select>
                        <!-- <input required onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off" type="text" class="form-control"  id="id_asistencia" name="id_asistencia" placeholder="Ejemplo: LGP-001-2024-AM01"> -->
                        
                      </div>
                      <!-- <h6>Nota: Digite el Id de la asistencia, si cuenta con él. En caso contrario deje el campo vacio.</h6> -->
                    </div>
                  </div>




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


                  <!-- <div class="form-group" style="display: none">
                    <label for="folio_incidencia" class="col-md-4 control-label">FOLIO INCIDENCIA</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-briefcase-medical"></i></span>
                        <input  readonly autocomplete="off" type="text" class="form-control"  id="folio_incidencia" name="folio_incidencia">
                      </div>

                    </div>
                  </div> -->


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
                        
                        <textarea required name="descripcion" id="descripcion" rows="5" cols="33" maxlength="1000" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
                        <h6>Ejemplo: En el apartado calendario no se visualizan las fechas del mes de Junio.</h6>
                      </div>
                    </div>
                  </div>

                  <br>

                  <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                      <button style="display: block; margin: 0 auto;" type="submit" class="btn color-btn-success">GUARDAR REGISTRO</button>
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
    <a href="menu_asistencias_medicas.php" class="btn-flotante color-btn-success-gray">REGRESAR</a>
  </div>



  



<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('#folio_expediente').val(1);
		recargarLista();

		$('#folio_expediente').change(function(){
			recargarLista();
		});


	})
</script>

<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"./get_id_sujeto.php",
			data:"folio=" + $('#folio_expediente').val(),
			success:function(r){
				$('#id_sujeto').html(r);
			}
		});
	}
</script> -->



<!-- <script type="text/javascript">


var folioExpediente = document.getElementById('id_asistencia');

var respuestaSeleccionada3;
var respuestaObtenida3;




folioExpediente.addEventListener('change', obtenerRespuesta3);

function obtenerRespuesta3(e){

  respuestaSeleccionada3 = e.target.value;
  respuestaObtenida3 = respuestaSeleccionada3;


  console.log(respuestaObtenida3);


  const  generateRandomString = (num) => {

  var separarFolio = [];
  var folio = document.getElementById('folio_expediente').value;
  separarFolio = folio.split("/");
  var numExp = separarFolio[3];
  var añoExp = separarFolio[4]
  var unidad = separarFolio[0]
  var incidencia = "INC"

  const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  let result1= Math.random().toString(36).substring(2,num);

  var n1 = result1.toUpperCase();

  var folioIncidencia = incidencia + '<?=$num_incidencia?>' + "-" + respuestaObtenida3;
  document.getElementById("folio_incidencia").value = folioIncidencia;
  
  // console.log(folioIncidencia);

  }

  generateRandomString(7);

  

}



  </script> -->







<script type="text/javascript">

function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}
let alea = getRandomInt(23);

// console.log(alea);


if (alea === 13 || alea === 16 || alea === 19 || alea === 22 || alea === 2 || alea === 5 || alea === 8 || alea === 11 || alea === 14 || alea === 17 || alea === 20 || alea === 23){
  const jon = "JONATHAN EDUARDO SANTIAGO JIMÉNEZ";
  document.getElementById("atencion").value = jon;
  // console.log(jon);
}
else if(alea === 1 || alea === 4 || alea === 7 || alea === 10 || alea === 3 || alea === 6 || alea === 9 || alea === 12 || alea === 15 || alea === 18 || alea === 21 || alea === 0){
  const gab = "GABRIELA PICHARDO GARCÍA";
  document.getElementById("atencion").value = gab;
  // console.log(gab);
}

</script>


</body>
</html>
