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
// $f_exped = 'UPSIPPED/TOL/113/015/2022';
// echo $f_exped;


$sentencia2=" SELECT nombre, amaterno, apaterno FROM usuarios_servidorespublicos WHERE usuario ='$user'";
$rnombre = $mysqli->query($sentencia2);
$fnombre=$rnombre->fetch_assoc();
$name_serv = $fnombre['nombre'];
$ap_serv = $fnombre['apaterno'];
$am_serv = $fnombre['amaterno'];



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
            <a href="../asistencias_medicas/admin.php">INICIO</a>
            <a class="actived" href="../asistencias_medicas/solicitar_asistencia.php">SOLICITAR ASISTENCIA MÉDICA</a>
          </div>


            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a href="#" class="active" onclick="location.href='solicitar_asistencia.php'"><span class="far fa-regular fa-bell"></span><span class="tab-text">SOLICITAR ASISTENCIA MÉDICA</span></a></li>
                <li><a href="#" onclick="location.href='solicitud_registrada.php'"><span class="fas fa-regular fa-clipboard"></span><span class="tab-text">SOLICITUDES REGISTRADAS</span></a></li>
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
                        <select class="form-control" id="folio_expediente" name="folio_expediente" required>
                            <option disabled selected value="">SELECCIONE EL EXPEDIENTE</option>
                              <?php
                                  $select1 = "SELECT DISTINCT datospersonales.folioexpediente
                                  FROM datospersonales
                                  WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' OR datospersonales.estatus = 'PERSONA PROPUESTA'
                                  ORDER BY datospersonales.id ASC";
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


<!-- <div id="mostrar_campos" style="display: none;"> -->

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




<!-- </div> -->


                  <!-- <div class="form-group">
                    <label for="id_sujeto" class="col-md-4 control-label" style="font-size: 16px">ID SUJETO</label>
                    <div class="col-md-4 selectContainer">
                      <div id="select_id_sujeto" class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-id-card"></i></span>
                        <select class="form-control" id="id_sujeto" name="id_sujeto" required>
                            <option disabled selected value="">SELECCIONE EL ID DEL SUJETO</option>
                        </select>
                      </div>
                    </div>
                  </div> -->


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
                        <input type="text" class="form-control"  id="id_servidor" name="id_servidor" placeholder="" value="<?php echo $id_servidor_ini;?>" readonly>
                      </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="numero_oficio" class="col-md-4 control-label">NÚMERO DE OFICIO DE LA SOLICITUD</label>
                    <div class="col-md-4 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas a-solid fa-file"></i></span>
                        <input autocomplete="off" type="text" class="form-control" id="numero_oficio" name="numero_oficio" placeholder="INGRESE EL NÚMERO DE OFICIO" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                      </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="tipo_requerimiento" class="col-md-4 control-label" style="font-size: 16px">TIPO DE REQUERIMIENTO </label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-solid fa-thumbtack"></i></span>
                        <select class="form-control selectpicker" id="tipo_requerimiento" name="tipo_requerimiento" required>
                            <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
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
                        <select class="form-control" id="servicio_medico" maxlength="50" name="servicio_medico" required>
                        <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                            <?php
                            $select = "SELECT * FROM servicios_medicos";
                            $answer = $mysqli->query($select);
                            while($valores = $answer->fetch_assoc()){
                              echo "<option value='".$valores['servicio_medico']."'>".$valores['servicio_medico']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="observaciones" class="col-md-4 control-label" style="font-size: 16px">OBSERVACIONES</label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <!-- <span class="input-group-addon"><i class="fas fa-solid fa-eye"></i></span> -->
                        <textarea onkeypress="cancelar()" name="observaciones" id="observaciones" rows="5" cols="33" maxlength="1000" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
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
    <!-- <?php echo "cambios"; ?> -->
    <a href="admin.php" class="btn-flotante color-btn-success-gray">REGRESAR</a>
  </div>
  <div class="contenedor">
    <!-- <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a> -->
  </div>




<!-- <script type="text/javascript">
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


</script> -->


<script type="text/javascript">
	$(document).ready(function(){
		$('#folio_expediente').val(1);
		recargarLista();

		$('#folio_expediente').change(function(){
			recargarLista();
		});


	})
</script>

<script type="text/javascript">
function cancelar() {
    var key = event.keyCode;

    if (key === 13) {
        event.preventDefault();
    }
}
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
</script>

<!-- <script type="text/javascript">

  var id_sujeto = document.getElementById('folio_expediente');

  var id;
  var idobtenido;

  id_sujeto.addEventListener('change', obtenerfolio);

  function obtenerfolio(e){

    id = e.target.value;
    idobtenido = id;

    if (idobtenido != "" ){

      document.getElementById("mostrar_campos").style.display = "";

    }

    console.log(idobtenido);




  }
</script> -->
</body>
</html>
