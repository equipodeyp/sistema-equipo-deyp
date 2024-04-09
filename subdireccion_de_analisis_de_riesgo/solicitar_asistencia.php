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
            <a href="../subdireccion_de_analisis_de_riesgo/menu.php">REGISTROS</a>
            <a class="actived" href="../subdireccion_de_analisis_de_riesgo/solicitar_asistencia.php">SOLICITAR ASISTENCIA MÉDICA</a>
          </div>
          

            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a href="#" class="active" onclick="location.href='solicitar_asistencia.php'"><span class="far fa-regular fa-bell"></span><span class="tab-text">SOLICITAR ASISTENCIA MÉDICA</span></a></li>
                <li><a href="#" onclick="location.href='solicitudes_registradas.php'"><span class="fas fa-regular fa-clipboard"></span><span class="tab-text">SOLICITUDES REGISTRADAS</span></a></li>
                <!-- <li><a href="#" onclick="location.href='seguimiento_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">SEGUIMIENTO PERSONA</span></a></li> -->
              </ul>
                <form method="POST" action="guardar_solicitud_asistencia.php">
                  <div class="alert div-title">
                    <h3 style="text-align:center">REGISTRAR SOLICITUD</h3>
                  </div>


                  <div class="form-group">
                    <label for="folio_expediente" class="col-md-4 control-label" style="font-size: 16px">FOLIO DEL EXPEDIENTE</label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-folder"></i></span>
                        <!-- <input value="UPSIPPED/SAR/TOL-TOL/001/2021" class="form-control" id="folio_expediente" name="folio_expediente" placeholder="SELECCIONE EL EXPEDIENTE" required> -->
                        <input list="datalistOptions1" class="form-control" id="folio_expediente" name="folio_expediente" placeholder="SELECCIONE EL EXPEDIENTE" required>
                         <datalist id="datalistOptions1">
                            <?php
                                $select1 = "SELECT DISTINCT datospersonales.folioexpediente, datospersonales.identificador, datospersonales.nombrepersona, datospersonales.paternopersona, datospersonales.maternopersona, medidas.medida, medidas.estatus
                                FROM medidas JOIN datospersonales
                                ON medidas.id_persona = datospersonales.id AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
                                ORDER BY datospersonales.folioexpediente";

                                $answer1 = $mysqli->query($select1);
                                while($valores1 = $answer1->fetch_assoc()){
                                  echo "<option value='".$valores1['folioexpediente']."'>".$valores1['folioexpediente']."</option>";
                                }


                            // $select = "SELECT * FROM municipios";
                            // $answer = $mysqli->query($select);
                            // while($valores = $answer->fetch_assoc()){
                            //   echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
                            // }


                            // SELECT * FROM `solicitud_asistencia`;
                          ?>
                        </datalist>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="id_sujeto" class="col-md-4 control-label" style="font-size: 16px">ID SUJETO</label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-id-card"></i></span>
                        <input list="datalistOptions2" class="form-control" id="id_sujeto" name="id_sujeto" placeholder="SELECCIONE EL ID DEL SUJETO" required>
                        <datalist id="datalistOptions2">
                            <?php
                                $select2 = "SELECT DISTINCT datospersonales.folioexpediente, datospersonales.identificador, datospersonales.nombrepersona, datospersonales.paternopersona, datospersonales.maternopersona, medidas.medida, medidas.estatus
                                FROM medidas JOIN datospersonales
                                ON medidas.id_persona = datospersonales.id AND medidas.estatus = 'EN EJECUCION'AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
                                ORDER BY datospersonales.identificador";

                                $answer2 = $mysqli->query($select2);
                                while($valores2 = $answer2->fetch_assoc()){
                                  echo "<option value='".$valores2['identificador']."'>".$valores2['identificador']."</option>";
                                }
                            ?>
                        </datalist>
                      </div>
                    </div>
                  </div>


                  <div class="form-group" style="display: none;">
                    <label for="id_asistencia" class="col-md-4 control-label">ID ASISTENCIA MÉDICA</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-briefcase-medical"></i></span>
                        <input type="text" class="form-control"  id="id_asistencia" name="id_asistencia" placeholder="" readonly>
                        <?php
                                $count = "SELECT COUNT(*) TOTAL FROM solicitud_asistencia";
                                $answer_c = $mysqli->query($count);
                                $valores_c = $answer_c->fetch_assoc();
                                $c = implode(' ', $valores_c);
                                // echo $c+1;
                        ?>
                        <!-- <?php echo $c+1; ?> -->
                      </div>
                    </div>
                  </div>

        <!-- <div class="form-group" style="display: none;">
					<label for="fecha_solicitud" class="col-md-4 control-label">FECHA DE SOLICITUD</label>
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
                            <input name="fecha_solicitud" class="form-control"  id="fecha_solicitud"  placeholder="Fecha" value="" readonly>
			            </div>
					</div>
				</div>

        <div class="form-group" style="display: none;">
					<label for="hora_solicitud" class="col-md-4 control-label">HORA DE SOLICITUD</label>
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-solid fa-clock"></i></span>
                            <input name="hora_solicitud" class="form-control"  id="hora_solicitud"  placeholder="Hora" value="" readonly>
			            </div>
					</div>
				</div> -->


                <div class="form-group" style="display: none;">
                    <label for="id_servidor" class="col-md-4 control-label">ID SERVIDOR PÚBLICO</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-user"></i></span>
                        <input type="text" class="form-control"  id="id_servidor" name="id_servidor" placeholder="" value="<?php echo $m_user;?>" readonly>
                      </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="numero_oficio" class="col-md-4 control-label">NÚMERO DE OFICIO DE LA SOLICITUD</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas a-solid fa-file"></i></span>
                        <input type="text" class="form-control" id="numero_oficio" name="numero_oficio" placeholder="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                      </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="tipo_requerimiento" class="col-md-4 control-label" style="font-size: 16px">TIPO DE REQUERIMIENTO </label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-thumbtack"></i></span>
                        <select class="form-control selectpicker" id="tipo_requerimiento" name="tipo_requerimiento" required>
                            <option disabled selected value>SELECCIONE LA OPCIÓN</option>
                            <option value="MINISTERIO PÚBLICO" >MINISTERIO PÚBLICO</option>
                            <option value="POR INGRESO">POR INGRESO</option>
                            <option value="PRIMERA VEZ">PRIMERA VEZ</option>
                            <option value="SEGUIMIENTO" >SEGUIMIENTO</option>
                            <option value="URGENCIA">URGENCIA</option>
                        </select>
                      </div>
                    </div>
                  </div>



                  <div class="form-group">
                    <label for="servicio_medico" class="col-md-4 control-label" style="font-size: 16px">SERVICIO MÉDICO </label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-stethoscope"></i></span>
                        <input list="datalistOptions" class="form-control" id="servicio_medico" maxlength="50" name="servicio_medico" placeholder="SELECCIONE LA OPCIÓN" required>
                        <datalist id="datalistOptions">
                            <?php
                            $select = "SELECT * FROM servicios_medicos";
                            $answer = $mysqli->query($select);
                            while($valores = $answer->fetch_assoc()){
                              echo "<option value='".$valores['servicio_medico']."'>".$valores['servicio_medico']."</option>";
                            }
                          ?>
                        </datalist>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="observaciones" class="col-md-4 control-label" style="font-size: 16px">OBSERVACIONES</label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <!-- <span class="input-group-addon"><i class="fas fa-solid fa-eye"></i></span> -->
                        <textarea name="observaciones" id="observaciones" rows="5" cols="33" maxlength="1000" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
                      </div>
                    </div>
                  </div>

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
  window.onload = function(){
    var fecha = new Date();
    var mes = fecha.getMonth()+1;
    var dia = fecha.getDate();
    var ano = fecha.getFullYear();

    var horas = fecha.getHours();
    var minutos = fecha.getMinutes();
    var segundos = fecha. getSeconds();

    document.getElementById('hora_solicitud').value=horas+":"+minutos+":"+segundos;

    if(dia<10)
        dia='0'+dia;
    if(mes<10)
        mes='0'+mes
    document.getElementById('fecha_solicitud').value=dia+"/"+mes+"/"+ano;
    
}
</script>


<script type="text/javascript">

  var idsuj = document.getElementById('id_sujeto');
  var idsujeto;
  var idasistencia;

  var folioexpediente = document.getElementById('folio_expediente');
  var folio;
  var folioobtenido;

  var separaranio = [];
  var anioSeparado;


  folioexpediente.addEventListener('change', obtenerfolio);
  function obtenerfolio(e){

    folio = e.target.value;
    folioobtenido = folio;

    // console.log(folioobtenido);

    separaranio = folioobtenido.split("/");
    anioSeparado = separaranio[4];
    
    // console.log(anioSeparado);


  }


  idsuj.addEventListener('change', obtenerid);
  function obtenerid(e){

    idsujeto = e.target.value;
    idasistencia = idsujeto+"-"+anioSeparado+"-AM0"

    // console.log(idasistencia);
    document.getElementById('id_asistencia').value = idasistencia+"<?php echo $c+1; ?>";

  }


</script>



<script type="text/javascript">
</script>

</body>
</html>
