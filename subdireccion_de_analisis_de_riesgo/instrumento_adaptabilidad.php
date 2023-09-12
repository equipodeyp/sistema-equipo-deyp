<?php
error_reporting(0);
include("conexion.php");
session_start ();
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();

date_default_timezone_set('America/Mexico_City');
$myDate = date("d-m-y h:i:s a");

$query = "SELECT id_estado, estado FROM t_estado ORDER BY id_estado";
$resultado23=$mysqli->query($query);

$query1 = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
$resultado1=$mysqli->query($query1);

$fol_exp = $_GET['folio'];
// echo $fol_exp;
$fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();
$name_folio=$rowfol['folioexpediente'];
// echo $name_folio;
$identificador = $rowfol['identificador'];
// echo $identificador;
$id_person=$rowfol['id'];
echo $id_person;
$foto=$rowfol['foto'];
$valid1 = "SELECT * FROM validar_persona WHERE folioexpediente = '$name_folio'";
$res_val1=$mysqli->query($valid1);
$fil_val1 = $res_val1->fetch_assoc();
$validacion1 = $fil_val1['id_persona'];
// consulta de los datos de la autoridad
$aut = "SELECT * FROM autoridad WHERE id_persona = '$id_person'";
$resultadoaut = $mysqli->query($aut);
$rowaut = $resultadoaut->fetch_array(MYSQLI_ASSOC);
// consulta de los datos de origen del SUJETO
$origen = "SELECT * FROM datosorigen WHERE id = '$id_person'";
$resultadoorigen = $mysqli->query($origen);
$roworigen = $resultadoorigen->fetch_array(MYSQLI_ASSOC);
$nameestadonac=$roworigen['lugardenacimiento'];
// datos del TUTOR
$tutor = "SELECT * FROM tutor WHERE id_persona = '$id_person'";
$resultadotutor = $mysqli->query($tutor);
$rowtutor = $resultadotutor->fetch_array(MYSQLI_ASSOC);
// datos del proceso penal
$process = "SELECT * FROM procesopenal WHERE id_persona = '$id_person'";
$resultadoprocess = $mysqli->query($process);
$rowprocess = $resultadoprocess->fetch_array(MYSQLI_ASSOC);
// datos de la valoracion juridica
$valjur = "SELECT * FROM valoracionjuridica WHERE id_persona = '$id_person'";
$resultadovaljur = $mysqli->query($valjur);
$rowvaljur = $resultadovaljur->fetch_array(MYSQLI_ASSOC);
// datos de la determinacion de la incorporacion
$detinc = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_person'";
$resultadodetinc = $mysqli->query($detinc);
$rowdetinc = $resultadodetinc->fetch_array(MYSQLI_ASSOC);
//consulta de los datos de origen de la persona
$domicilio = "SELECT * FROM domiciliopersona WHERE id_persona = '$id_person'";
$resultadodomicilio = $mysqli->query($domicilio);
$rowdomicilio = $resultadodomicilio->fetch_array(MYSQLI_ASSOC);
// consulta del estatus del expediente
$statusexp = "SELECT * FROM statusseguimiento WHERE id_persona = '$id_person'";
$resultadostatusexp = $mysqli->query($statusexp);
$rowstatusexp = $resultadostatusexp->fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/instrumento_adaptabilidad.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
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
      $user = $row_user['usuario'];
      $nombre_ser = $row['nombre'];
      $apellido_p = $row['apellido_p'];
      $apellido_m = $row['apellido_m'];
      $name_user = $nombre_ser." " .$apellido_p." " .$apellido_m;
      $full_name = mb_strtoupper (html_entity_decode($name_user, ENT_QUOTES | ENT_HTML401, "UTF-8"));



			if ($genero=='mujer') {
				echo "<img src='../image/mujerup.png' width='100' height='100'>";
			}
			if ($genero=='hombre') {
				echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
			}
			?>
    <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
    </div>
    <nav class="menu-nav">
           		<ul>
                <?php
                    if ($user=='guillermogv') {
                    echo "<a style='text-align:center' class='user-nombre' href='create_ticket.php?folio=$id_person'><button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
                  ";}
                ?>
            	</ul>
    </nav>
  </div>
  <div class="main bg-light">
    <div class="barra">
      <img src="../image/fiscalia.png" alt="" width="150" height="150">
      <img src="../image/ups2.png" alt="" width="1400" height="70">
      <img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
    </div>
      <!-- menu de navegacion de la parte de arriba -->
      <div class="wrap">
      <ul class="tabs">
    			<li><a href="#" class="active" onclick="location.href='detalles_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="far fa-address-card"></span><span class="tab-text">INSTRUMENTO DE ADAPTABILIDAD</span></a></li>
    			<!-- <li><a href="#" class="active" onclick="location.href='detalles_medidas.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">MEDIDAS</span></a></li> -->
          <!-- <li><a href="#" onclick="location.href='seguimiento_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">SEGUIMIENTO PERSONA</span></a></li> -->
    	</ul>

    		<div class="secciones">
    			<article id="tab2">
            <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="../subdireccion_de_analisis_de_riesgo/menu.php">REGISTROS</a>
              <a href="../subdireccion_de_analisis_de_riesgo/detalles_expediente.php?folio=<?=$name_folio?>">EXPEDIENTE</a>
              <a href="../subdireccion_de_analisis_de_riesgo/detalles_persona.php?folio=<?=$fol_exp?>">PERSONA</a>
              <a class="actived">INSTRUMENTO DE ADAPTABILIDAD</a>
            </div>
            <div class="container">

        			<div class="well form-horizontal">
              <form class="container well form-horizontal" action="save_instrumento.php?folio=<?php echo $fol_exp; ?>" method="POST" enctype="multipart/form-data">

        				<div class="row">
                  <div id="cabecera">
                    <div class="row alert div-title">
                      <h3 style="text-align:center">INFORMACIÓN GENERAL DEL EXPEDIENTE DE PROTECCIÓN</h3>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3 ">
                    <label for="">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span></span></label>
                    <input class="form-control" id="fol_exp" name="input_folio" placeholder="" required="" type="text" value="<?php echo $rowfol['folioexpediente']; ?>" disabled>
                  </div>

                <div class="col-md-6 mb-3">
                  <label for="">ID PERSONA<span></span></label>
                  <input class="form-control" id="id_persona" name="input_id" placeholder="" required="" type="text" value="<?php echo $rowfol['identificador']; ?>" disabled>
                </div>

                <!-- <div class="col-md-6 mb-3 validar">
                  <label for="CALIDAD_DEL_SUJETO">CALIDAD PERSONA DENTRO DEL PROGRAMA<span class="required"></span></label>
                  <select class="form-control" id="CALIDAD_DEL_SUJETO" name="CALIDAD_DEL_SUJETO" disabled>
                    <option value=""><?php echo $rowfol['calidadpersona']; ?></option>
                    <?php
                    $select = "SELECT * FROM calidadpersona";
                    $answer = $mysqli->query($select);
                    while($valores = $answer->fetch_assoc()){
                     echo "<option value='".$valores['id']."'>".$valores['nombre']."</option>";
                   }
                   ?>
                  </select>
                </div> -->
        			</div>
              </form>
              </div>
        		</div>

              <div class="container">
              <form class="container well form-horizontal" action="save_instrumento.php?folio=<?php echo $fol_exp; ?>" method="POST" enctype="multipart/form-data">
                <div class="well form-horizontal">

                <div id="cabecera">
                  <div class="row alert div-title">
                    <h3 style="text-align:center">INSTRUMENTO DE ADAPTABILIDAD</h3>
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="" class="">FECHA Y HORA REGISTRO<span class="required"></span></label>
                  <input readonly class="form-control" id="fecha_hora" name="input_fecha" placeholder="" type="text" value="<?php echo $myDate; ?>">
                </div>

                <div class="col-md-6 mb-3">
                  <label for="" class="">NOMBRE DEL SERVIDOR PÚBLICO QUE REALIZA EL LLENADO DEL INSTRUMENTO<span class="required"></span></label>
                  <input readonly class="form-control" id="nombre_servidor" name="input_nombre" placeholder="" type="text" value="<?php echo $full_name;?>">
                </div>
            
                <div id="cabecera">
                  <div class="row alert div-title">
                    <h3 style="text-align:center">INSTRUCCIONES Y RECOMENDACIONES</h3>
                  </div>
                </div>

                <div>
                  <br></br>
                  <h5 style='text-align:justify'>
                    Lea y comprenda cada una de las cuestiones. Responda de manera clara y concreta. 
                    Todas las preguntas deberan ser llenadas correctamente. Para iniciar el llenado del instrumento de adaptabilidad debera presionar el botón iniciar.
                    Devera utilizar los botones de anterior y siguiente para continuar o retroceder durante el llenado del instrumento. 
                    Durante la prueba mantengase tranquilo y relajado. Concentre toda su atención en el contenido del instrumento. 
                    Evite distracciones para un mejor desempeño.
                  </h5>
                  <br></br>
                  <div class="vertical_center_button">
                    <button class="button_iniciar" id="iniciar_instrumento" style="text-align:center; display:'';" type='button' onclick="iniciarInstrumento()">Iniciar</button>
                  </div>
                  <br></br>
                </div>
                
                <div id="div_1">
              
                      <div id="cabecera">
                        <div class="row alert div-title">
                          <h3 style="text-align:center">1. ADICCIONES</h3>
                        </div>
                      </div>

                      <div class="col-md-6 mb-3" id="q1">
                        <label for="" class="">¿CONSUME DROGAS LEGALES E ILEGALES?<span class="required"></span></label>
                        <select class="form-select form-select-lg" id="question_1" name="r_question_1" required>
                          <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                          <option value="Si">Si</option>
                          <option value="No">No</option>
                        </select>
                      </div>

                    <div class="col-md-6 mb-3" id="q2">
                      <label for="" class="">¿COMENZÓ EL CONSUMO DE DROGAS LEGALES E ILEGALES, O SU CONSUMO ES MÍNIMO?<span class="required"></span></label>
                      <select class="form-select form-select-lg" id="question_2" name="r_question_2" required>
                        <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>


                    <div class="col-md-6 mb-3" id="q3">
                      <label for="" class="">¿PRESENTA UN ABUSO EN EL CONSUMO DE DROGAS LEGALES E ILEGALES?<span class="required"></span></label>
                      <select class="form-select form-select-lg" id="question_3" name="r_question_3" required>
                        <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>


                    <div class="col-md-6 mb-3" id="q4">
                      <label for="" class="">¿PRESENTA SÍNDROME DE ABSTINENCIA O TIENE INCAPACIDAD DE CONTROLAR EL CONSUMO DE DROGAS LEGALES O ILEGALES?<span class="required"></span></label>
                      <select class="form-select form-select-lg" id="question_4" name="r_question_4" required>
                        <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>

                </div>

                <div id="div_2">

                    <div id="cabecera">
                        <div class="row alert div-title">
                          <h3 style="text-align:center">2. DISCAPACIDAD</h3>
                        </div>
                    </div>
              
                    <div class="col-md-6 mb-3" id="q5">
                      <label for="" class="">¿TIENE DISCAPACIDAD O SUS SECUELAS NO LE IMPIDEN REALIZAR LAS ACTIVIDADES DE SU VIDA COTIDIANA?<span class="required"></span></label>
                      <select class="form-select form-select-lg" id="question_5" name="r_question_5" required>
                        <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>


                    <div class="col-md-6 mb-3" id="q6">
                      <label for="" class="">¿PRESENTA ALGUNA DISCAPACIDAD O SUS SECUELAS, LE MOLESTAN PARA REALIZAR ALGUNA ACTIVIDAD, PERO NO LIMITAN NI SU MOVILIDAD NI SU DESPLAZAMIENTO?<span class="required"></span></label>
                      <select class="form-select form-select-lg" id="question_6" name="r_question_6" required>
                        <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>


                    <div class="col-md-6 mb-3" id="q7">
                      <label for="" class="">¿PRESENTA ALGUNA DISCAPACIDAD Y SE ENCUENTRA LIMITADO PARA ACTIVIDADES DE MAYOR ESFUERZO Y DESPLAZAMIENTO, POR LO QUE REQUIERE ATENCIÓN MÉDICA Y/O DE SEGUNDO NIVEL?<span class="required"></span></label>
                      <select class="form-select form-select-lg" id="question_7" name="r_question_7" required>
                        <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>


                    <div class="col-md-6 mb-3" id="q8">
                      <label for="" class="">¿PRESENTA ALGUNA DISCAPACIDAD, LA CUAL LE IMPIDE SU MOVILIDAD Y DESPLAZAMIENTO, POR LO QUE REQUIERE ATENCIÓN MÉDICA Y/O TRATAMIENTO ESPECIALIZADO DE MANERA CONSTANTE?<span class="required"></span></label>
                      <select class="form-select form-select-lg" id="question_8" name="r_question_8" required>
                        <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>

                </div>
<!--
                 <div class="col-md-6 mb-3">
                  <label for="" class="">¿PRESENTA ALGUNA ENFERMEDAD CRÓNICA O DEGENERATIVA Y/O SUS SECUELAS NO LE IMPIDEN REALIZAR LAS ACTIVIDADES DE SU VIDA COTIDIANA?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_9" name="r_question_9" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿PRESENTA SÍNTOMAS O SECUELAS DE UNA ENFERMEDAD CRÓNICO O DEGENERATIVA, CONTROLADA BAJO TRATAMIENTO MÉDICO, EL CUAL NO LIMITA NI SU MOVILIDAD NI SU DESPLAZAMIENTO?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_10" name="r_question_10" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿PRESENTA ALGUNA ENFERMEDAD CRÓNICO DEGENERATIVA QUE REQUIERE ATENCIÓN INMEDIATA PARA SU CONTROL MEDIANTE TRATAMIENTO MÉDICO?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_11" name="r_question_11" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿PRESENTA ALGUNA ENFERMEDAD CARDIOVASCULAR, RESPIRATORIA, CÁNCER U OTRA QUE REQUIERE ATENCIÓN MÉDICA Y/O HOSPITALARIA DE MANERA URGENTE?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_12" name="r_question_12" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES UNA PERSONA MAYOR DE 18, PERO MENOR DE 60 AÑOS?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_13" name="r_question_13" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES UNA PERSONA MAYOR DE 60 (ADULTO MAYOR), PERO MENOR DE 80 AÑOS?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_14" name="r_question_14" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES UNA PERSONA MAYOR DE 10, PERO MENOR DE 18 AÑOS (ADOLESCENTE) QUE REQUIERE O SE ENCUENTRA ASISTIDO DE PADRE O TUTOR?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_15" name="r_question_15" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES UNA PERSONA MENOR DE 10 AÑOS, QUE REQUIERE O SE ENCUENTRA ASISTIDO DE PADRE O TUTOR?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_16" name="r_question_16" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿PRESENTA INDICADORES DE PSICOPATOLOGÍA?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_17" name="r_question_18" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿PRESENTA ALTERACIÓN EN SU CAPACIDAD DE ATENCIÓN, CONCENTRACIÓN, MEMORIA Y/O HÁBITOS DE SUEÑO Y ALIMENTACIÓN?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_18" name="r_question_18" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿PRESENTA INDICADORES REFERENTES A TRASTORNOS DE ANSIEDAD, DEPRESIÓN Y/O DEL ESTADO DE ÁNIMO?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_19" name="r_question_19" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿PRESENTA ALTERACIONES ANORMALES DEL FUNCIONAMIENTO MENTAL COMO ALUCINACIONES, IDEAS DELIRANTES, DEMENCIA, AFASIA O RETARDO MENTAL?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_20" name="r_question_20" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿PRESENTA CARACTERÍSTICAS QUE CONCUERDEN CON ALGÚN TRASTORNO DE LA PERSONALIDAD?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_21" name="r_question_21" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿PRESENTA O SEÑALÓ TENER PENSAMIENTOS O COMPORTAMIENTOS DE ANSIEDAD O TEMOR, CON PRESENCIA DE CONFLICTOS INTERPERSONALES E INTRAPSÍQUICOS (TRASTORNO DE LA PERSONALIDAD POR EVITACIÓN, DEPENDIENTE, OBSESIVO-COMPULSIVO)?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_22" name="r_question_22" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿PRESENTA O SEÑALÓ TENER PENSAMIENTOS O COMPORTAMIENTOS IMPULSIVOS, EMOCIONALES, LLAMATIVOS, EXTROVERTIDOS Y SOCIALES, DRAMÁTICOS, IMPREDECIBLES, EMOCIONALMENTE INESTABLE (TRASTORNO ANTISOCIAL, LÍMITE DE PERSONALIDAD, HISTRIÓNICO DE LA PERSONALIDAD, DE PERSONALIDAD NARCISISTA)?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_23" name="r_question_23" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿PRESENTA O SEÑALÓ TENER PENSAMIENTOS O COMPORTAMIENTOS EXCÉNTRICOS, EXTRAÑOS O AJENOS A LOS CÓDIGOS DE SOCIALIZACIÓN Y A LAS CONVENCIONES SOCIALES, INTROVERTIDOS, CON AUSENCIA DE RELACIONES PRÓXIMAS, DESCONEXIÓN DE LA REALIDAD O ALTERACIONES PSICOLÓGICAS DE TIPO PSICÓTICO (TRASTORNO PARANOIDE, ESQUIZOIDE, ESQUIZOTÍPICO)?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_24" name="r_question_24" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES CONSCIENTE DE SUS PROPIAS CAPACIDADES, PUEDE AFRONTAR LAS TENSIONES Y/O DIFICULTADES NORMALES DE LA VIDA, PUEDE TRABAJAR DE FORMA PRODUCTIVA Y FRUCTÍFERA, CAPAZ DE CONTRIBUIR A SU COMUNIDAD?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_25" name="r_question_25" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES CONSCIENTE DE LAS LIMITACIONES DE SUS CAPACIDADES, PERO CUENTA CON APOYO PARA AFRONTAR LAS TENSIONES Y/O DIFICULTADES NORMALES DE LA VIDA Y TRABAJAR DE FORMA PRODUCTIVA Y FRUCTÍFERA, CAPAZ DE CONTRIBUIR A SU COMUNIDAD?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_26" name="r_question_26" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES CONSCIENTE DE LAS LIMITACIONES DE SUS CAPACIDADES, PERO NO CUENTA CON APOYO PARA AFRONTAR LAS TENSIONES Y/O DIFICULTADES NORMALES DE LA VIDA Y TRABAJAR DE FORMA PRODUCTIVA Y FRUCTÍFERA, POR LO QUE NO ES CAPAZ DE CONTRIBUIR A SU COMUNIDAD?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_27" name="r_question_27" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿NO ES CONSCIENTE DE SUS CAPACIDADES, POR LO QUE NO PUEDE AFRONTAR LAS TENSIONES Y/O DIFICULTADES NORMALES DE LA VIDA, NI TRABAJAR DE FORMA PRODUCTIVA Y FRUCTÍFERA, POR LO QUE NO ES CAPAZ DE CONTRIBUIR CON SU COMUNIDAD?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_28" name="r_question_28" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ACTUALMENTE SE ENCUENTRA ESTUDIANDO O LABORANDO?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_29" name="r_question_29" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿CONCLUYÓ O SE ENCUENTRA SUSPENDIDA SU FASE EDUCATIVA O LABORAL, SE ENCUENTRA CURSANDO UN AÑO EDUCATIVO O LABORAL, PERO SU INCORPORACIÓN NO AFECTA AL DESARROLLO DE SUS ACTIVIDADES YA QUE PUEDE REALIZARLAS DE MANERA REMOTA, POR CONDUCTO DE TERCERAS PERSONAS O PUEDE GOZAR DE UN PERMISO O LICENCIA?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_30" name="r_question_30" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿SE ENCUENTRA CURSANDO UN AÑO EDUCATIVO DE MANERA PRESENCIAL?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_31" name="r_question_31" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿CUENTA CON UN EMPLEO FORMAL O INFORMAL, QUE ATIENDE DE MANERA DIRECTA?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_32" name="r_question_32" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES UNA PERSONA INDEPENDIENTE O CONFORMA UNA FAMILIA, UNIDA POR VÍNCULOS DE AFECTIVIDAD MUTUA, MEDIADA POR REGLAS, ROLES, NORMAS Y PRÁCTICAS DE COMPORTAMIENTO, CON COMUNICACIÓN DIRECTA, ABIERTA Y CONSTANTE, SIN PRESENCIA DE VIOLENCIA (DINÁMICA FAMILIAR FUNCIONAL)?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_33" name="r_question_33" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES UNA PERSONA INDEPENDIENTE O CONFORMA UNA FAMILIA, UNIDA POR VÍNCULOS DE AFECTIVIDAD MUTUA, MEDIADA POR REGLAS, ROLES, NORMAS Y PRÁCTICAS DE COMPORTAMIENTO INTERMITENTES, CON COMUNICACIÓN DESPLAZADA, SIN PRESENCIA DE VIOLENCIA (DINÁMICA FAMILIAR INTERMEDIA)?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_34" name="r_question_34" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES UNA PERSONA INDEPENDIENTE O CONFORMA UNA FAMILIA, SIN VÍNCULOS DE AFECTIVIDAD MUTUA, CON REGLAS, ROLES, NORMAS Y PRÁCTICAS DE COMPORTAMIENTO INTERMITENTES, CON COMUNICACIÓN BLOQUEADA, CON O SIN PRESENCIA DE VIOLENCIA (DINÁMICA FAMILIAR DISFUNCIONAL)?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_35" name="r_question_35" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES UNA PERSONA INDEPENDIENTE O CONFORMA UNA FAMILIA, SIN VÍNCULOS DE AFECTIVIDAD MUTUA, NO SE ENCUENTRA MEDIADA POR REGLAS, ROLES, NORMAS Y PRÁCTICAS DE COMPORTAMIENTO, CON COMUNICACIÓN DAÑADA Y CON PRESENCIA DE VIOLENCIA (DINÁMICA FAMILIAR DISFUNCIONAL SEVERA)?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_36" name="r_question_36" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿CUENTA CON UN INGRESO SUPERIOR AL PROMEDIO NACIONAL, CON UNA O MÁS FUENTES DE INGRESOS Y/O REDES DE APOYO PARA EL SOSTENIMIENTO PERSONAL, DEL HOGAR E HIJOS, POR LO QUE SU INCORPORACIÓN AL PROGRAMA NO AFECTARÍA SUS INGRESOS?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_37" name="r_question_37" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿CUENTA CON UN INGRESO IGUAL AL PROMEDIO NACIONAL, CUENTA CON UNA O MÁS REDES DE APOYO PARA EL SOSTENIMIENTO PERSONAL, DEL HOGAR E HIJOS?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_38" name="r_question_38" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿CUENTA CON UN INGRESO IGUAL AL SALARIO MÍNIMO, ES LA ÚNICA FUENTE DE INGRESOS PARA EL SOSTENIMIENTO PERSONAL, DEL HOGAR E HIJOS?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_39" name="r_question_39" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿NO CUENTA CON UN INGRESO O ESTE NO ES FIJO O ES INFERIOR AL SALARIO MÍNIMO, SIENDO SU ÚNICA FUENTE DE INGRESOS?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_40" name="r_question_40" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES TOLERANTE, RESPETUOSO, CON OPINIÓN OBJETIVA Y ACEPTACIÓN DE DIFERENCIAS, ENTIENDE Y CONFORMA LAS REGLAS DE LA SOCIEDAD, MIDE LAS CONSECUENCIAS DE SUS ACCIONES, NO TIENDE A TRANSGREDIR LAS LEYES O NORMAS, NO CUENTA CON REDES O VÍNCULOS PERTENECIENTES A UNA ESTRUCTURA DELICTIVA?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_41" name="r_question_41" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES TOLERANTE, RESPETUOSO, CON OPINIÓN OBJETIVA Y ACEPTACIÓN DE DIFERENCIAS, ENTIENDE Y CONFORMA LAS REGLAS DE LA SOCIEDAD, NO MIDE LAS CONSECUENCIAS DE SUS ACCIONES, PUEDE LLEGAR A TRANSGREDIR DE MANERA ESPORÁDICA LAS LEYES O NORMAS, NO CUENTA CON REDES O VÍNCULOS PERTENECIENTES A UNA ESTRUCTURA DELICTIVA?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_42" name="r_question_42" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES INTOLERANTE, TIENDE A SER AGRESIVO, CON OPINIÓN CERRADA, POCA ACEPTACIÓN DE DIFERENCIAS, ENTIENDE Y CONFORMA LAS REGLAS DE LA SOCIEDAD, NO MIDE LAS CONSECUENCIAS DE SUS ACCIONES, TIENDE A TRANSGREDIR DE MANERA ESPORÁDICA LAS LEYES O NORMAS, NO CUENTA CON REDES O VÍNCULOS PERTENECIENTES A UNA ESTRUCTURA DELICTIVA?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_43" name="r_question_43" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES INTOLERANTE, IRRESPETUOSO, AGRESIVO, CON OPINIÓN CERRADA, NO ACEPTA DIFERENCIAS, ENTIENDE Y CONFORMA LAS REGLAS DE LA SOCIEDAD, PERO NO MIDE LAS CONSECUENCIAS DE SUS ACCIONES, TIENDE A TRANSGREDIR LAS LEYES O NORMAS, CUENTA CON REDES O VÍNCULOS PERTENECIENTES A UNA ESTRUCTURA DELICTIVA?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_44" name="r_question_44" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿CUENTA CON ANTECEDENTES PENALES?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_45" name="r_question_45" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES CATALOGADO DENTRO DE LOS SUJETOS ACTIVOS COMUNES, INADAPTADOS, CARACTERIALES, PRIMO DELINCUENTE U OCASIONAL. CUENTA CON FACTORES DE PROTECCIÓN POCO DEFINIDOS, CON MAYOR PRESENCIA DE FACTORES DE RIESGO, ESTÁTICOS, DINÁMICOS, MOTIVADORES, DESESTABILIZADORES Y DESINHIBIDORES?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_46" name="r_question_46" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ES CATALOGADO COMO REINCIDENTE ESPECÍFICO O HABITUAL, CON POTENCIAL DELICTIVO ALTO, SU INADAPTACIÓN LOS HACE EVIDENTES. CON AUSENCIA DE FACTORES DE PROTECCIÓN, SOBRESALIENDO LOS FACTORES DE RIESGO, MOTIVADORES Y DESESTABILIZADORES?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_47" name="r_question_47" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿TIENDE A TRANSGREDIR DE MANERA CONSTANTE LAS LEYES O NORMAS, ES REINCIDENTE GENÉRICO O PROFESIONAL, CUENTA CON REDES O VÍNCULOS PERTENECIENTES A UNA ESTRUCTURA DELICTIVA, CON ACTITUD PERMANENTE OPOSICIÓN Y AUTOAFIRMACIÓN AGRESIVA.  SE PRESENTAN MANIFESTACIONES GRAVES DE CONDUCTAS ANTISOCIALES.  CUENTA CON FACTORES DE RIESGO, ESTÁTICOS, DINÁMICOS, MOTIVADORES, DESESTABILIZADORES Y DESINHIBIDORES?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_48" name="r_question_48" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ATENDIENDO LA DINÁMICA DE LOS HECHOS SE PUEDE CONSIDERAR COMO UNA VÍCTIMA INOCENTE O IDEAL, VÍCTIMA DE CULPABILIDAD MENOR O POR IGNORANCIA?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_49" name="r_question_49" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ATENDIENDO LA DINÁMICA DE LOS HECHOS SE PUEDE CONSIDERAR COMO VÍCTIMA VOLUNTARIA?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_50" name="r_question_50" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ATENDIENDO LA DINÁMICA DE LOS HECHOS SE PUEDE CONSIDERAR COMO UNA VÍCTIMA PROVOCADORA/ VÍCTIMA POR IMPRUDENCIA?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_51" name="r_question_51" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div>


                <div class="col-md-6 mb-3">
                  <label for="" class="">¿ATENDIENDO LA DINÁMICA DE LOS HECHOS SE PUEDE CONSIDERAR COMO UNA VÍCTIMA INFRACTORA, SIMULADORA O IMAGINARIA?<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="question_52" name="r_question_52" required>
                    <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                  </select>
                </div> -->





            

                <div id="contenido">
                  <table class="table table-striped table-bordered ">
                    <?php
                      
                    ?>
                  </table>
                </div>

                <div id="footer">

                </div>
              </form>


              <div class="row" id="div-b&n1">
                  <div class="vertical_center_button">
                    <!-- <button onclick="backApartadoUno()" class="button_back" id="btn-back1" style="text-align:center; margin: 10px; display: none;" type="button">Anterior</button> -->
                    <button onclick="nextApartadoDos()" class="button_next" id="btn-next1" style="text-align:center; margin: 10px; display: none;" type="button">Siguiente</button>
                  </div>
              </div>

              <div class="row" id="div-b&n2">
                  <div class="vertical_center_button">
                    <button onclick="backApartadoUno()" class="button_back" id="btn-back2" style="text-align:center; margin: 10px;" type="button">Anterior</button>
                    <button class="button_next" id="btn-next2" style="text-align:center; margin: 10px;" type="button">Siguiente</button>
                  </div>
              </div>


        		</div>
        		</div>
    			</article>
    		</div>
    	</div>
  </div>
</div>
<div class="contenedor">
<a href="../subdireccion_de_analisis_de_riesgo/detalles_persona.php?folio=<?=$fol_exp?>" class="btn-flotante">REGRESAR</a>
</div>


<script type="text/javascript">

  function iniciandoDisplay() {

  document.getElementById("div_1").style.display = "none"; // apartado adicciones 1
  document.getElementById("div_2").style.display = "none"; // apartado discapacidad 2
  document.getElementById("q1").style.display = ""; // pregunta 1
  document.getElementById("div-b&n1").style.display = "none"; // botones anterior y siguiente 1
  document.getElementById("div-b&n2").style.display = "none"; // botones anterior y siguiente 1

  document.getElementById("q2").style.display = "none"; // pregunta 2
  document.getElementById("q3").style.display = "none"; // pregunta 3
  document.getElementById("q4").style.display = "none"; // pregunta 4

  document.getElementById("q6").style.display = "none"; // pregunta 6
  document.getElementById("q7").style.display = "none"; // pregunta 7
  document.getElementById("q8").style.display = "none"; // pregunta 8

}
iniciandoDisplay();

</script>



<script type="text/javascript">

  function iniciarInstrumento() { // boton iniciar instrumento
  document.getElementById("div_1").style.display = ""; // apartado adicciones 1
  document.getElementById("iniciar_instrumento").style.display = "none"; // boton iniciar instrumento
}

</script>

<script type="text/javascript">

  function nextApartadoDos() { // boton iniciar instrumento
    document.getElementById("div_1").style.display = "none"; // apartado adicciones 1
    document.getElementById("div_2").style.display = ""; // apartado discapacidad 2
    document.getElementById("div-b&n1").style.display = "none"; // apartado discapacidad 2
    document.getElementById("div-b&n2").style.display = ""; // apartado discapacidad 2
  
}

</script>


<script type="text/javascript">

  function backApartadoUno() { // boton iniciar instrumento
    document.getElementById("div_1").style.display = ""; // apartado adicciones 1
    document.getElementById("div_2").style.display = "none"; // apartado discapacidad 2
    document.getElementById('q2').style.display = "none";  // pregunta 2
    document.getElementById('q3').style.display = "none";  // pregunta 3
    document.getElementById('q4').style.display = "none";  // pregunta 4
    document.getElementById('question_1').value = ""; //limpia select pregunta 
    document.getElementById('question_2').value = ""; //limpia select pregunta 
    document.getElementById('question_3').value = ""; //limpia select pregunta 
    document.getElementById('question_4').value = ""; //limpia select pregunta
    document.getElementById('question_5').value = ""; //limpia select pregunta 
    document.getElementById('question_6').value = ""; //limpia select pregunta 
    document.getElementById('question_7').value = ""; //limpia select pregunta 
    document.getElementById('question_8').value = ""; //limpia select pregunta
    document.getElementById("div-b&n1").style.display = ""; // apartado discapacidad 2
    document.getElementById("btn-next1").style.display = "none"; // apartado discapacidad 2
    document.getElementById("div-b&n2").style.display = "none"; // apartado discapacidad 2
  
}

</script>



<script type="text/javascript">

var question1 = document.getElementById('question_1'); //select pregunta 1
var respuesta_q1 = '';

question1.addEventListener('change', obtenerInfo1);

    function obtenerInfo1(e) {
      respuesta_q1 = e.target.value;

      if (respuesta_q1 === "Si") {

        document.getElementById('q2').style.display = ""; // pregunta 2
        document.getElementById("div-b&n1").style.display = "none"; // botones anterior y siguiente 1
        document.getElementById('q3').style.display = "none"; // pregunta 3
        
      }
      else if (respuesta_q1 === "No"){

        document.getElementById('q2').style.display = "none";  // pregunta 2
        document.getElementById('q3').style.display = "none";  // pregunta 3
        document.getElementById('q4').style.display = "none";  // pregunta 4
        document.getElementById('question_2').value = ""; //limpia select pregunta 2
        document.getElementById("div-b&n1").style.display = ""; // botones anterior y siguiente 1
        document.getElementById("btn-next1").style.display = ""; // botones anterior y siguiente 1
        document.getElementById('question_3').value = ""; //limpia select pregunta 3
        document.getElementById('question_4').value = ""; //limpia select pregunta 3

      }
    }

</script>


<script type="text/javascript">

var question2 = document.getElementById('question_2'); //select pregunta 2
var respuesta_q2 = '';

question2.addEventListener('change', obtenerInfo2);

    function obtenerInfo2(e) {
      respuesta_q2 = e.target.value;

      if (respuesta_q2 === "Si") {

        document.getElementById("div-b&n1").style.display = ""; // botones anterior y siguiente 1
        document.getElementById("btn-next1").style.display = ""; // botones anterior y siguiente 1
        document.getElementById('q3').style.display = "none"; // pregunta 3
        document.getElementById('question_3').value = ""; //limpia select pregunta 3
        document.getElementById('question_4').value = ""; //limpia select pregunta 3
        document.getElementById('q4').style.display = "none"; // pregunta 3

      }
      else if (respuesta_q2 === "No"){

        document.getElementById("div-b&n1").style.display = "none"; // botones anterior y siguiente 1
        document.getElementById('q3').style.display = "";  // pregunta 3

      }
    }

</script>



<script type="text/javascript">

var question3 = document.getElementById('question_3'); //select pregunta 2
var respuesta_q3 = '';

question3.addEventListener('change', obtenerInfo3);

    function obtenerInfo3(e) {
      respuesta_q3 = e.target.value;

      if (respuesta_q3 === "Si") {

        document.getElementById("div-b&n1").style.display = ""; // botones anterior y siguiente 1
        document.getElementById('q4').style.display = "none"; // pregunta 3
        document.getElementById('question_4').value = ""; //limpia select pregunta 3
        console.log(document.getElementById('question_4').value);

      }
      else if (respuesta_q3 === "No"){

        document.getElementById("div-b&n1").style.display = ""; // botones anterior y siguiente 1
        document.getElementById("btn-next1").style.display = ""; // botones anterior y siguiente 1
        document.getElementById('q4').style.display = ""; // pregunta 3
        document.getElementById('question_4').disabled = true; // deshabilitar select pregunta 
        document.getElementById('question_4').value = "Si"; //limpia select pregunta 3

      }
    }

</script>







<!-- 
  
    document.getElementById("next3").disabled = false; 
    document.getElementById('id_convenio').readOnly = true;
    document.getElementById('ANALISIS_MULTIDISCIPLINARIO').disabled = true;

https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_next_prev
https://www.youtube.com/watch?v=KJbLiV6Y9sY

https://lenguajecss.com/css/




-->


































<script type="text/javascript">
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1;
var yyyy = today.getFullYear();
if(dd<10){
      dd='0'+dd
  }
  if(mm<10){
      mm='0'+mm
  }
today = yyyy+'-'+mm+'-'+dd;
document.getElementById("FECHA_SOLICITUD").setAttribute("max", today);
document.getElementById("FECHA_NACIMIENTO_PERSONA").setAttribute("max", today);
document.getElementById("FECHA_AUTORIZACION").setAttribute("max", today);
document.getElementById("FECHA_CONVENIO_ENTENDIMIENTO_UNO").setAttribute("max", today);
document.getElementById("FECHA_DESINCORPORACION_UNO").setAttribute("max", today);

document.getElementById("FECHA_AUTORIZACION_ANALISIS").setAttribute("max", today);
document.getElementById("FECHA_CONVENIO_ENTENDIMIENTO_DOS").setAttribute("max", today);
document.getElementById("FECHA_DESINCORPORACION_DOS").setAttribute("max", today);
document.getElementById("FECHA_DESINCORPORACION_UNO").setAttribute("max", today);

</script>


<script type="text/javascript">
var fechaConvenio = document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS');
var vigencia = document.getElementById('VIGENCIA_CONVENIO');
var fechaTermino = document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO');
var fechaInicio;
var diasVigencia;



    fechaConvenio.addEventListener('change', obtenerFecha);
    vigencia.addEventListener('change',obtenerVigencia);

    function obtenerFecha(e) {
      fechaInicio = e.target.value;
    }

    function obtenerVigencia(e) {
      diasVigencia = e.target.value;

      var fecha = new Date(fechaInicio);
      var dias = parseInt(diasVigencia);

      fecha.setDate(fecha.getDate() + dias);
      const anio = parseInt(fecha.getFullYear());
      const mes = parseInt(fecha.getMonth());
      const dia = parseInt(fecha.getDate());


      var nuevaFecha = dia + '/' + (mes + 1) + '/' + anio;

      document.getElementById("FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO").value = nuevaFecha;

    }

</script>

<script type="text/javascript">
var selectAnalisisMulti = document.getElementById('ANALISIS_MULTIDISCIPLINARIO').value;
function ocultarCampos() {
  if (selectAnalisisMulti === "" || selectAnalisisMulti === null ){

        document.getElementById('LABEL_INCORPORACION').style.display = "none";
        document.getElementById('INPUT_INCORPORACION').style.display = "none";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "none";
        document.getElementById('FECHA_AUTORIZACION').style.display = "none";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "none";
        document.getElementById('id_analisis').style.display = "none";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
        document.getElementById('id_convenio').style.display = "none";
      }
}
ocultarCampos();
</script>


<script type="text/javascript">
var analisisMultidisiplinario = document.getElementById('ANALISIS_MULTIDISCIPLINARIO');
var respuestaAlalisisMultidisiplinario = '';

analisisMultidisiplinario.addEventListener('change', obtenerInfo);


    function obtenerInfo(e) {
      respuestaAlalisisMultidisiplinario = e.target.value;
      if (respuestaAlalisisMultidisiplinario === "ESTUDIO TECNICO") {

        document.getElementById('LABEL_INCORPORACION').style.display = "";


}
      else if (respuestaAlalisisMultidisiplinario === "ACUERDO DE CONCLUSION" || respuestaAlalisisMultidisiplinario === "ACUERDO DE CANCELACION" ){

        document.getElementById('LABEL_INCORPORACION').style.display = "";

        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";

      }

      else if ( respuestaAlalisisMultidisiplinario === "EN ELABORACION"){
        
        document.getElementById('LABEL_INCORPORACION').style.display = "none";

      }
    }
</script>




<script type="text/javascript">
var analisisM = document.getElementById('ANALISIS_MULTIDISCIPLINARIO').value;

function ocultarAnalisisM() {

      if (analisisM === "ESTUDIO TECNICO") {

        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INPUT_INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "";
        document.getElementById('fecha_inicio').style.display = "";
        document.getElementById('LABEL_VIGENCIA').style.display = "";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "";
        document.getElementById('id_convenio').style.display = "";

      }
      else if (analisisM === "ACUERDO DE CONCLUSION" || analisisM === "ACUERDO DE CANCELACION" ){

        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INPUT_INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";

        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
        document.getElementById('id_convenio').style.display = "none";

      }

      else if ( analisisM === "EN ELABORACION" ) {
        document.getElementById('LABEL_INCORPORACION').style.display = "none";
        document.getElementById('INPUT_INCORPORACION').style.display = "none";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "none";
        document.getElementById('FECHA_AUTORIZACION').style.display = "none";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "none";
        document.getElementById('id_analisis').style.display = "none";

        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
        document.getElementById('id_convenio').style.display = "none";
      }

    }
ocultarAnalisisM();
</script>
<script type="text/javascript">

var noFormalizado = document.getElementById('CONVENIO_ENTENDIMIENTO');
var respuestaInputNoFormalizado = '';

noFormalizado.addEventListener('change', obtenerInfoNoFormalizado);

    function obtenerInfoNoFormalizado(e) {
      respuestaInputNoFormalizado = e.target.value;

      if (respuestaInputNoFormalizado === "NO FORMALIZADO" || respuestaInputNoFormalizado === "PENDIENTE DE EJECUCION") {
        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INPUT_INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "";

        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
        document.getElementById('id_convenio').style.display = "none";

      }
      else {
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "";
        document.getElementById('fecha_inicio').style.display = "";
        document.getElementById('LABEL_VIGENCIA').style.display = "";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "";
        document.getElementById('id_convenio').style.display = "";
      }
  }
</script>
<script type="text/javascript">
var noFormalizadoInput = document.getElementById('CONVENIO_ENTENDIMIENTO').value;
function ocultarCamposNoFormalizado() {
  if (noFormalizadoInput === "NO FORMALIZADO" || noFormalizadoInput === "PENDIENTE DE EJECUCION"){

    document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INPUT_INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "";

        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
        document.getElementById('id_convenio').style.display = "none";

      }

}
ocultarCamposNoFormalizado();
</script>
<script type="text/javascript">
var concluNone = document.getElementById('ESTATUS_PERSONA').value;


function ConclusionCancelacion(){
if(concluNone === "" || concluNone === null || concluNone === "PERSONA PROPUESTA" || concluNone === "SUJETO PROTEGIDO"){

      document.getElementById('LABEL_CONCLUSION_CANCELACION_EXP').style.display = "none";
      document.getElementById('CONCLUSION_CANCELACION_EXP').style.display = "none";

      document.getElementById('LABEL_CONCLUSION_ART351').style.display = "none";
      document.getElementById('CONCLUSION_ART351').style.display = "none";

      document.getElementById('LABEL_OTHER_ART351').style.display = "none";
      document.getElementById('OTHER_ART351').style.display = "none";

      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
      document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "none";
      }
else if (concluNone === "DESINCORPORADO" || concluNone === "NO INCORPORADO"){
      document.getElementById('LABEL_CONCLUSION_CANCELACION_EXP').style.display = "";
      document.getElementById('CONCLUSION_CANCELACION_EXP').style.display = "";
}
}
ConclusionCancelacion();

</script>
<script type="text/javascript">
var conCa = document.getElementById('ESTATUS_PERSONA');
var estatusPersona = '';

conCa.addEventListener('change', obtenerEstatus);

    function obtenerEstatus(e) {
      estatusPersona = e.target.value;

      if ( estatusPersona === "DESINCORPORADO" || estatusPersona === "NO INCORPORADO" ) {
        document.getElementById('LABEL_CONCLUSION_CANCELACION_EXP').style.display = "";
        document.getElementById('CONCLUSION_CANCELACION_EXP').style.display = "";

      }
      else if ( estatusPersona === "PERSONA PROPUESTA" || estatusPersona === "SUJETO PROTEGIDO" ){
        document.getElementById('LABEL_CONCLUSION_CANCELACION_EXP').style.display = "none";
        document.getElementById('CONCLUSION_CANCELACION_EXP').style.display = "none";

        document.getElementById('LABEL_CONCLUSION_ART351').style.display = "none";
        document.getElementById('CONCLUSION_ART351').style.display = "none";

        document.getElementById('LABEL_OTHER_ART351').style.display = "none";
        document.getElementById('OTHER_ART351').style.display = "none";

        document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
        document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
        document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "none";

        document.getElementById('CONCLUSION_CANCELACION_EXP').value='';
        document.getElementById('CONCLUSION_ART351').value='';
        document.getElementById('OTHER_ART351').value='';
        document.getElementById('FECHA_DESINCORPORACION_UNO').value='';

      }
}

</script>
<script type="text/javascript">
var concluCanceExp = document.getElementById('CONCLUSION_CANCELACION_EXP').value;

function ConclusionCancelacionExp(){

  if (concluCanceExp === "" || concluCanceExp === null){

        document.getElementById('LABEL_CONCLUSION_ART351').style.display = "none";
        document.getElementById('CONCLUSION_ART351').style.display = "none";

        document.getElementById('LABEL_OTHER_ART351').style.display = "none";
        document.getElementById('OTHER_ART351').style.display = "none";

        document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
        document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
        document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "none";

      }
else if (concluCanceExp === "CONCLUSION"){

      document.getElementById('LABEL_CONCLUSION_ART351').style.display = "";
      document.getElementById('CONCLUSION_ART351').style.display = "";

      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
      document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "";
}
else if (concluCanceExp === "CANCELACION"){

      document.getElementById('LABEL_CONCLUSION_ART351').style.display = "none";
      document.getElementById('CONCLUSION_ART351').style.display = "none";

      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "";
      document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "";
}
}
ConclusionCancelacionExp();
</script>
<script type="text/javascript">
var estatusPer = document.getElementById('CONCLUSION_CANCELACION_EXP');
var estatusPersonaSeg;

estatusPer.addEventListener('change', obtenerEstatusSeg);

    function obtenerEstatusSeg(e) {
      estatusPersonaSeg = e.target.value;

      if (estatusPersonaSeg === "CONCLUSION"){
      document.getElementById('LABEL_CONCLUSION_ART351').style.display = "";
      document.getElementById('CONCLUSION_ART351').style.display = "";


      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
      document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "";
      }

      else if (estatusPersonaSeg === "CANCELACION"){
      document.getElementById('LABEL_CONCLUSION_ART351').style.display = "none";
      document.getElementById('CONCLUSION_ART351').style.display = "none";

      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "";
      document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "";

      document.getElementById('LABEL_OTHER_ART351').style.display = "none";
      document.getElementById('OTHER_ART351').style.display = "none";
      }
}
</script>
<script type="text/javascript">

var concluCanceArt = document.getElementById('CONCLUSION_ART351').value;

function ConclusionCancelacionArt(){

if (concluCanceArt === "" || concluCanceArt === null){

      document.getElementById('LABEL_OTHER_ART351').style.display = "none";
      document.getElementById('OTHER_ART351').style.display = "none";

}

else if (concluCanceArt === "IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO" || concluCanceArt === "OTRO" || concluCanceArt === "VIII. INCUMPLIMIENTO DE LAS OBLIGACIONES"){

      document.getElementById('LABEL_OTHER_ART351').style.display = "";
      document.getElementById('OTHER_ART351').style.display = "";
}

else {
      document.getElementById('LABEL_OTHER_ART351').style.display = "none";
      document.getElementById('OTHER_ART351').style.display = "none";
}

}
ConclusionCancelacionArt();

</script>
<script type="text/javascript">

var conCaArt = document.getElementById('CONCLUSION_ART351');
var conCaArt35 = '';

conCaArt.addEventListener('change', obtenerConCaArt35);

    function obtenerConCaArt35(e) {
      conCaArt35 = e.target.value;

      if (conCaArt35 === "IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO" || conCaArt35 === "OTRO" || conCaArt35 === "VIII. INCUMPLIMIENTO DE LAS OBLIGACIONES"){

        document.getElementById('LABEL_OTHER_ART351').style.display = "";
        document.getElementById('OTHER_ART351').style.display = "";

      }

      else {

        document.getElementById('LABEL_OTHER_ART351').style.display = "none";
        document.getElementById('OTHER_ART351').style.display = "none";

      }
}
</script>

<script type="text/javascript">

var idAnalisis = document.getElementById('id_analisis').value;

function ReadOnlyIdAnalisis() {
  if( !idAnalisis == null || !idAnalisis == "" ){
    document.getElementById('id_analisis').readOnly = true;
  }
}
ReadOnlyIdAnalisis();

</script>

<script type="text/javascript">

var fechaVigenciaConvenio = document.getElementById('VIGENCIA_CONVENIO').value;

function ReadOnlyVigenciaconvenio() {
  if( !fechaVigenciaConvenio == null || !fechaVigenciaConvenio == "" ){
    document.getElementById('VIGENCIA_CONVENIO').readOnly = true;
  }
}
ReadOnlyVigenciaconvenio();

</script>

<script type="text/javascript">

var numDeConvenios = document.getElementById('id_convenio').value;

function ReadOnlyNumConvenios() {
  if( !numDeConvenios == null || !numDeConvenios == "" ){
    document.getElementById('id_convenio').readOnly = true;
    document.getElementById('ANALISIS_MULTIDISCIPLINARIO').disabled = true;
    document.getElementById('INPUT_INCORPORACION').disabled = true;
    document.getElementById('FECHA_AUTORIZACION').readOnly = true;
    document.getElementById('CONVENIO_ENTENDIMIENTO').disabled = true;
    document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').readOnly = true;
    document.getElementById('fecha_inicio').readOnly = true;
  }
}
ReadOnlyNumConvenios();

</script>

<script type="text/javascript">

var readOnlyEstatus = document.getElementById('ESTATUS_PERSONA').value;

function ReadOnlyConClu() {
  if( readOnlyEstatus == "DESINCORPORADO" || readOnlyEstatus == "NO INCORPORADO" ){

    document.getElementById('FECHA_DESINCORPORACION_UNO').readOnly = true;
    document.getElementById('CONCLUSION_ART351').disabled = true;
    document.getElementById('OTHER_ART351').readOnly = true;
    document.getElementById('ESTATUS_PERSONA').disabled = true;
    document.getElementById('CONCLUSION_CANCELACION_EXP').disabled = true;
    document.getElementById('FUENTE').disabled = true;
    document.getElementById('ESPECIFIQUE_FUENTE').readOnly = true;
    document.getElementById('COMENTARIO').disabled = true;
    document.getElementById('UPDATE_FILE').style.display = "none";
    document.getElementById('enter').style.display = "none";
    document.getElementById('AGREGAR_CONVENIO').style.display = "none";
  }
}
ReadOnlyConClu();

</script>

<script type="text/javascript">

function Acuerdo(){
  var AcuerdoAnalisis = document.getElementById('ANALISIS_MULTIDISCIPLINARIO').value;
  var AcuerdoEstatus = document.getElementById('ESTATUS_PERSONA').value;

  if (AcuerdoAnalisis == 'ACUERDO DE CONCLUSION' || AcuerdoAnalisis == 'ACUERDO DE CANCELACION'){
    if (AcuerdoEstatus == "DESINCORPORADO" || AcuerdoEstatus == "NO INCORPORADO" ){
    document.getElementById('ANALISIS_MULTIDISCIPLINARIO').disabled = true;
    document.getElementById('INPUT_INCORPORACION').disabled = true;
    document.getElementById('FECHA_AUTORIZACION').readOnly = true;
    document.getElementById('id_analisis').readOnly = true;

    }
  }
}
Acuerdo();

</script>

<script type="text/javascript">

var analisisM = document.getElementById('ANALISIS_MULTIDISCIPLINARIO').value;

function ReadOnlyEstudio(){
  if (analisisM == "ESTUDIO TECNICO"){
    if (convenioDeEntendimiento == "NO FORMALIZADO" ){
      document.getElementById('ANALISIS_MULTIDISCIPLINARIO').disabled = true;
      document.getElementById('INPUT_INCORPORACION').disabled = true;
      document.getElementById('FECHA_AUTORIZACION').readOnly = true;
      document.getElementById('CONVENIO_ENTENDIMIENTO').disabled = true;
    }
  }
}
ReadOnlyConClu();
</script>
</body>
</html>
