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
echo $user;
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
            <a href="../subdireccion_de_apoyo_tecnico_juridico/menu.php">REGISTROS</a>
            <a class="actived">NUEVA ASISTENCIA MÉDICA</a>
          </div>

            <div class=" well form-horizontal">
              <div class="row">
                <form class="" method="POST" action="guardar_expediente.php">
                  <div class="alert div-title">
                    <h3 style="text-align:center">SOLICITAR ASISTENCIA MÉDICA</h3>
                  </div>

                  <div class="form-group">
                    <label for="municipio" class="col-md-4 control-label" style="font-size: 16px">FOLIO DEL EXPEDIENTE</label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-folder"></i></span>
                        <input list="datalistOptions" class="form-control" id="municipio" name="municipio" placeholder="SELECCIONE EL EXPEDIENTE" required>
                        <datalist id="datalistOptions">
                            <?php
                            $select = "SELECT * FROM municipios";
                            $answer = $mysqli->query($select);
                            while($valores = $answer->fetch_assoc()){
                              echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
                            }
                          ?>
                        </datalist>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="municipio" class="col-md-4 control-label" style="font-size: 16px">ID SUJETO</label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-id-card"></i></span>
                        <input list="datalistOptions" class="form-control" id="municipio" name="municipio" placeholder="SELECCIONE EL ID DEL SUJETO" required>
                        <datalist id="datalistOptions">
                            <?php
                            $select = "SELECT * FROM municipios";
                            $answer = $mysqli->query($select);
                            while($valores = $answer->fetch_assoc()){
                              echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
                            }
                          ?>
                        </datalist>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="unidad" class="col-md-4 control-label">ID ASISTENCIA MÉDICA</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-briefcase-medical"></i></span>
                        <input name="unidad" type="text" class="form-control"  id="unidad" name="unidad" placeholder="" value="" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
					<label for="fecha" class="col-md-4 control-label">FECHA DE SOLICITUD</label>
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
                            <input name="fecha" type="text" class="form-control"  id="fecha"  placeholder="fecha" value="" disabled>
			            </div>
					</div>
				</div>

                <div class="form-group">
					<label for="fecha" class="col-md-4 control-label">HORA DE SOLICITUD</label>
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-solid fa-clock"></i></span>
                            <input name="fecha" type="text" class="form-control"  id="fecha"  placeholder="fecha" value="HORA" disabled>
			            </div>
					</div>
				</div>


                <div class="form-group">
                    <label for="unidad" class="col-md-4 control-label">ID SERVIDOR PÚBLICO</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-user"></i></span>
                        <input name="unidad" type="text" class="form-control"  id="unidad" name="unidad" placeholder="" value="" readonly>
                      </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="unidad" class="col-md-4 control-label">NÚMERO DE OFICIO DE LA SOLICITUD</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas a-solid fa-file"></i></span>
                        <input name="unidad" type="text" class="form-control"  id="unidad" name="unidad" placeholder="" value="" >
                      </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="municipio" class="col-md-4 control-label" style="font-size: 16px">TIPO DE REQUERIMIENTO </label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-thumbtack"></i></span>
                        <input list="datalistOptions" class="form-control" id="municipio" name="municipio" placeholder="SELECCIONE LA OPCIÓN" required>
                        <datalist id="datalistOptions">
                            <?php
                            $select = "SELECT * FROM municipios";
                            $answer = $mysqli->query($select);
                            while($valores = $answer->fetch_assoc()){
                              echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
                            }
                          ?>
                        </datalist>
                      </div>
                    </div>
                  </div>



                  <div class="form-group">
                    <label for="municipio" class="col-md-4 control-label" style="font-size: 16px">SERVICIO MÉDICO </label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-stethoscope"></i></span>
                        <input list="datalistOptions" class="form-control" id="municipio" name="municipio" placeholder="SELECCIONE LA OPCIÓN" required>
                        <datalist id="datalistOptions">
                            <?php
                            $select = "SELECT * FROM municipios";
                            $answer = $mysqli->query($select);
                            while($valores = $answer->fetch_assoc()){
                              echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
                            }
                          ?>
                        </datalist>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="municipio" class="col-md-4 control-label" style="font-size: 16px">OBSERVACIONES </label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-eye"></i></span>
                        <input list="datalistOptions" class="form-control" id="municipio" name="municipio" placeholder="SELECCIONE LA OPCIÓN" required>
                        <datalist id="datalistOptions">
                            <?php
                            $select = "SELECT * FROM municipios";
                            $answer = $mysqli->query($select);
                            while($valores = $answer->fetch_assoc()){
                              echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
                            }
                          ?>
                        </datalist>
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
    <a href="menu.php" class="btn-flotante color-btn-success-gray">CANCELAR</a>
  </div>
  <div class="contenedor">
    <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a>
  </div>
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
// document.getElementById("FECHA_RECEPCION").max = new Date().toISOString().split("T")[0];
document.getElementById("FECHA_RECEPCION").setAttribute("max", today);
// document.getElementById("FECHA_ACUERDO").max = new Date().toISOString().split("T")[0];
document.getElementById("FECHA_ACUERDO").setAttribute("max", today);

</script>
<script type="text/javascript">
window.onload = function(){
  var fecha = new Date();
  var mes = fecha.getMonth()+1;
  var dia = fecha.getDate();
  var ano = fecha.getFullYear();
  if(dia<10)
    dia='0'+dia;
  if(mes<10)
    mes='0'+mes
  document.getElementById('fecha').value=dia+"/"+mes+"/"+ano;
}
</script>
</body>
</html>
