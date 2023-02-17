<?php
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
$row_nombre = $row['nombre'];
$apellido_p = $row['apellido_p'];
$apellido_m = $row['apellido_m'];
$name_user = $row_nombre." " .$apellido_p." " .$apellido_m;
$full_name = mb_strtoupper (html_entity_decode($name_user, ENT_QUOTES | ENT_HTML401, "UTF-8"));

// echo $full_name;
$fol_exp = $_GET['folio'];
// echo $fol_exp;
// $sql = "SELECT * FROM expediente WHERE fol_exp = '$fol_exp'";
// $resultado = $mysqli->query($sql);
// $row = $resultado->fetch_array(MYSQLI_ASSOC); 

$sql = "SELECT * FROM tickets WHERE usuario = '$full_name'";
$result = mysqli_query($mysqli, $sql);
$rowcount = mysqli_num_rows( $result );
$suma = $rowcount + 1;
$num_incidencia = 0 . $suma;
// echo $num_incidencia;

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- barra de navegacion -->
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
  <!-- <script src="JQuery.js"></script> -->
  <script src="../js/Javascript.js"></script>
  <script src="../js/validar_campos.js"></script>
  <script src="../js/verificar_camposm1.js"></script>
  <script src="../js/mascara2campos.js"></script>
  <script src="../js/mod_medida.js"></script>
  <!-- <link rel="stylesheet" href="../css/estilos.css">
  <script src="../js/main.js"></script> -->
  <script src="../js/Javascript.js"></script>
  <script src="../js/validar_campos.js"></script>
  <script src="../js/validarmascara3.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
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

      $result_area = $mysqli->query($sentencia_user);
      $row_area=$result_area->fetch_assoc();
			$area = $row_area['area'];

      $result_nombre = $mysqli->query($sentencia_user);
      $row_nombre=$result_nombre->fetch_assoc();
			$nombre = $row_nombre['nombre'];

      $result_apellido_p = $mysqli->query($sentencia_user);
      $row_apellido_p=$result_apellido_p->fetch_assoc();
			$apellido_p = $row_apellido_p['apellido_p'];

      $result_apellido_m = $mysqli->query($sentencia_user);
      $row_apellido_m=$result_apellido_m->fetch_assoc();
			$apellido_m = $row_apellido_m['apellido_m'];

			if ($genero=='mujer') {
				echo "<img src='../image/mujerup.png' width='100' height='100'>";
			}

			if ($genero=='hombre') {
				// $foto = ../image/user.png;
				echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
			}
			// echo $genero;
			?>
    <h6 style="text-align:center" class='user-nombre'> <?php echo "" . $_SESSION['usuario']; ?> </h6>
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
      <div class="wrap">

    		<ul class="tabs">
          <li><a href="#" class="active" onclick="location.href='create_ticket.php?folio=<?php echo $fol_exp; ?>'"><span class="far fa-address-card"></span><span class="tab-text">REGISTRAR INCIDENCIA</span></a></li>
          <li><a href="#" onclick="location.href='tickets.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">INCIDENCIAS GENERADAS</span></a></li>
    			<!--<li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO</span></a></li> -->
    		</ul>

    		<div class="secciones">
    			<article id="tab1">

          <!-- menu de navegacion de la parte de arriba -->
          <div class="secciones form-horizontal sticky breadcrumb flat">
                <a href="../subdireccion_de_analisis_de_riesgo/menu.php">REGISTROS</a>
                <a href="../subdireccion_de_analisis_de_riesgo/detalles_expediente.php?folio=<?php echo $fol_exp; ?>">EXPEDIENTE</a>
                <a class="actived">REGISTRAR INCIDENCIA</a>
          </div>
    				<div class="container">
              <form class="container well form-horizontal" action="save_ticket.php?folio=<?php echo $fol_exp; ?>" method="POST" enctype="multipart/form-data">
                <div class="row">

                  <div class="alert alert-info">
                    <h3 style="text-align:center">DATOS GENERALES</h3>
                  </div>

                  <div class="col-md-6 mb-3">
                        <label>FOLIO DEL EXPEDIENTE<span ></span></label>
                        <input readonly class="form-control" id="folio_expediente" name="folio_expediente" type="text" maxlength="50" value="<?php echo $fol_exp; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label>NOMBRE DEL USUARIO<span ></span></label>
                    <input readonly class="form-control" id="" name="usuario" type="text" maxlength="50" value="<?php echo $full_name;?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label>SUBDIRECCIÓN ADSCRITA<span></span></label>
                    <input readonly class="form-control" id="" name="subdireccion" type="text" value="<?php echo mb_strtoupper (html_entity_decode($row_area['area'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>">
                  </div>

                  <div class="alert alert-info">
                    <h3 style="text-align:center">DATOS DE LA INCIDENCIA</h3>
                  </div>

                  <div class="col-md-6 mb-3" style="display: none">
                    <label>USUARIO EN ATENCION<span ></span></label>
                    <input readonly class="form-control" id="atencion" name="atencion" type="text" value="">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label>FOLIO DE LA INCIDENCIA<span></span></label>
                    <input readonly class="form-control" id="folio_reporte" name="folio_reporte" type="text" value="">
                  </div>

                <div class="col-md-6 mb-3">
                  <label>TIPO DE FALLA O ERROR<span></span></label>
                  <select class="form-select form-select-lg" id="" name="tipo" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="ACCESO">ACCESO</option>
                    <option value="CAPTURA">CAPTURA DE LOS DATOS</option>
                    <option value="FUNCIONALIDAD">FUNCIONALIDAD</option>
                    <option value="OTRO">OTRO</option>
                  </select>
                </div>

                <div class="col-md-6 mb-3" style="display: none">
                    <label>ESTATUS DE LA INCIDENCIA<span ></span></label>
                    <input readonly class="form-control" id="" name="estatus" type="text" value="EN PROCESO">
                </div>

                <div class="row">
  								<div id="footer">
  		  					</div>
                  <label>DESCRIPCIÓN BREVE DE LA FALLA O ERROR<span></span></label>
                  <textarea id="" name="descripcion" rows="8" cols="80" placeholder="" maxlength="400" required></textarea>
  							</div>
                </div>
                <div class="row">
                  <div>
                      <br>
                      <br>
                  		<button style="display: block; margin: 0 auto;" class="btn btn-success" id="" name="save_ticket" type="submit">Registrar incidencia</button>
                  </div>
                </div>
              </form>
            </div>
    			</article>
    		</div>
    	</div>
      <!--  -->
  </div>
</div>
<div class="contenedor">

<a href="../subdireccion_de_analisis_de_riesgo/detalles_expediente.php?folio=<?php echo $fol_exp; ?>" class="btn-flotante">REGRESAR</a>

</div>

<script type="text/javascript">

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
        // var folioIncidencia = unidad + "-" + numExp + "-" + añoExp + "-" + incidencia + n1; 
        var folioIncidencia = incidencia + '<?=$num_incidencia?>' + "-" + folio; 
        document.getElementById("folio_reporte").value = folioIncidencia;

    }

generateRandomString(7);
</script>


<script type="text/javascript">

function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}
let alea = getRandomInt(23);

console.log(alea);

if (alea === 1 || alea === 4 || alea === 7 || alea === 10 || alea === 13 || alea === 16 || alea === 19 || alea === 22){
  const azael = "AZAEL OLIVAR GARCIA";
  document.getElementById("atencion").value = azael;
  console.log(azael);
}
else if (alea === 2 || alea === 5 || alea === 8 || alea === 11 || alea === 14 || alea === 17 || alea === 20 || alea === 23){
  const jon = "JONATHAN EDUARDO SANTIAGO JIMENEZ";
  document.getElementById("atencion").value = jon;
  console.log(jon);
}
else if(alea === 3 || alea === 6 || alea === 9 || alea === 12 || alea === 15 || alea === 18 || alea === 21 || alea === 0){
  const gab = "GABRIELA PICHARDO GARCIA";
  document.getElementById("atencion").value = gab;
  console.log(gab);
}
</script>


</body>
</html>
