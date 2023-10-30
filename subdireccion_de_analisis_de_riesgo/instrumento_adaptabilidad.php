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

$fol_exp = $_GET['folio'];
//echo $fol_exp;

$fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();
$name_folio=$rowfol['folioexpediente'];
// echo $name_folio;
$identificador = $rowfol['identificador'];
// echo $identificador;
$id_person=$rowfol['id'];
// echo $id_person;


$r_input = "Si";
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
                    echo "<a style='text-align:center' class='user-nombre' href='create_ticket.php?folio=$name_folio'><button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
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
    			<li><a href="#" class="active" onclick="location.href='instrumento_adaptabilidad.php?folio=<?php echo $fol_exp; ?>'"><span class="far fa-address-card"></span><span class="tab-text">REGISTRAR UN NUEVO INSTRUMENTO</span></a></li>
    			<li><a href="#" onclick="location.href='detalle_instrumento.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">INSTRUMENTOS REGISTRADOS</span></a></li>
          <!-- <li><a href="#" onclick="location.href='seguimiento_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">SEGUIMIENTO PERSONA</span></a></li> -->
    	</ul>

    		<div class="secciones">
    			<article id="tab2">
            <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="../subdireccion_de_analisis_de_riesgo/menu.php">REGISTROS</a>
              <a href="../subdireccion_de_analisis_de_riesgo/detalles_expediente.php?folio=<?=$name_folio?>">EXPEDIENTE</a>
              <a href="../subdireccion_de_analisis_de_riesgo/detalles_persona.php?folio=<?=$fol_exp?>">PERSONA</a>
              <a href="../subdireccion_de_analisis_de_riesgo/instrumento_adaptabilidad.php?folio=<?=$fol_exp?>" class="actived">REGISTRAR INSTRUMENTO</a>
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
                    <input class="form-control" id="fol_exp" name="folio" placeholder="" type="text" value="<?php echo $rowfol['folioexpediente']; ?>" readonly>
                  </div>

                <div class="col-md-6 mb-3">
                  <label for="">ID PERSONA<span></span></label>
                  <input class="form-control" id="id_persona" name="id_persona" placeholder="" type="text" value="<?php echo $rowfol['identificador']; ?>" readonly>
                </div>

                <div id="cabecera">
                  <div class="row alert div-title">
                    <h3 style="text-align:center">INSTRUMENTO DE ADAPTABILIDAD</h3>
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="" class="">FECHA Y HORA REGISTRO</label>
                  <input readonly class="form-control" id="fecha_hora" name="fecha_hora_instrumento" placeholder="" type="text" value="<?php echo $myDate; ?>">
                </div>

                <div class="col-md-6 mb-3">
                  <label for="" class="">NOMBRE DEL SERVIDOR PÚBLICO QUE REALIZA EL LLENADO DEL INSTRUMENTO</label>
                  <input readonly class="form-control" id="nombre_servidor" name="nombre_servidor" placeholder="" type="text" value="<?php echo $full_name;?>">
                </div>
        
        <div id="instrucciones">
            
                <div id="cabecera">
                  <div class="row alert div-title">
                    <h3 style="text-align:center">INSTRUCCIONES Y RECOMENDACIONES</h3>
                  </div>
                </div>

                <div>
                  <br></br>
                  <h5 style='text-align:justify'>
                    Lea y comprenda cada una de las cuestiones. Responda de manera clara y concreta. 
                    Todas las preguntas deberan ser contestadas correctamente. Para comenzar el registro presione el botón iniciar.
                    Utilice los botones de anterior y siguiente para continuar o retroceder entre los diferentes apartados. 
                    Durante la prueba mantengase tranquilo y relajado, concentre toda su atención en el contenido y evite distracciones para un mejor desempeño.
                  </h5>
                  <br></br>
                  <div class="vertical_center_button">
                    <button class="button_iniciar" id="iniciar_instrumento" style="text-align:center; display:'';" type='button' onclick="iniciarInstrumento()">Iniciar</button>
                  </div>
                  <br></br>
                </div>
        
                
        </div>


              
        <div id="div_1">
              
              <div id="cabecera">
                <div class="row alert div-title">
                  <h3 style="text-align:center">1. ADICCIONES</h3>
                </div>
              </div>

              <div class="col-md-6 mb-3" id="q1">
                <label for="" class="">¿CONSUME DROGAS LEGALES E ILEGALES?<span></span></label>
                <select class="form-select form-select-lg" id="question_1" name="r_question_1">
                  <option selected value>SELECCIONE UNA OPCIÓN</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select>
              </div>

            <div class="col-md-6 mb-3" id="q2">
              <label for="" class="">¿COMENZÓ EL CONSUMO DE DROGAS LEGALES E ILEGALES, O SU CONSUMO ES MÍNIMO?</label>
              <select class="form-select form-select-lg" id="question_2" name="r_question_2">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q3">
              <br>
              <label for="" class="">¿PRESENTA UN ABUSO EN EL CONSUMO DE DROGAS LEGALES E ILEGALES?</label>
              <select class="form-select form-select-lg" id="question_3" name="r_question_3">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q4">
              <label for="" class="">¿PRESENTA SÍNDROME DE ABSTINENCIA O TIENE INCAPACIDAD DE CONTROLAR EL CONSUMO DE DROGAS LEGALES O ILEGALES?</label>
              <input readonly class="form-control" id="question_4" name="r_question_4" type="text" value="<?php echo $r_input; ?>"  style="font-size: 14px;">
            </div>

        </div>

        <div id="div_2">

            <div id="cabecera">
                <div class="row alert div-title">
                  <h3 style="text-align:center">2. DISCAPACIDAD</h3>
                </div>
            </div>
      
            <div class="col-md-6 mb-3" id="q5">
              <label for="" class="">¿TIENE DISCAPACIDAD O SUS SECUELAS NO LE IMPIDEN REALIZAR LAS ACTIVIDADES DE SU VIDA COTIDIANA?</label>
              <select class="form-select form-select-lg" id="question_5" name="r_question_5">
                <option selected value>SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q6">
              <label for="" class="">¿PRESENTA ALGUNA DISCAPACIDAD O SUS SECUELAS, LE MOLESTAN PARA REALIZAR ALGUNA ACTIVIDAD, PERO NO LIMITAN NI SU MOVILIDAD NI SU DESPLAZAMIENTO?</label>
              <select class="form-select form-select-lg" id="question_6" name="r_question_6">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q7">
              <label for="" class="">¿PRESENTA ALGUNA DISCAPACIDAD Y SE ENCUENTRA LIMITADO PARA ACTIVIDADES DE MAYOR ESFUERZO Y DESPLAZAMIENTO, POR LO QUE REQUIERE ATENCIÓN MÉDICA Y/O DE SEGUNDO NIVEL?</label>
              <select class="form-select form-select-lg" id="question_7" name="r_question_7">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q8">
              <label for="" class="">¿PRESENTA ALGUNA DISCAPACIDAD, LA CUAL LE IMPIDE SU MOVILIDAD Y DESPLAZAMIENTO, POR LO QUE REQUIERE ATENCIÓN MÉDICA Y/O TRATAMIENTO ESPECIALIZADO DE MANERA varANTE?</label>
              <input readonly class="form-control" id="question_8" name="r_question_8" type="text" value="<?php echo $r_input; ?>"  style="font-size: 14px;">
            </div>

        </div>




        <div id="div_3">

            <div id="cabecera">
                <div class="row alert div-title">
                  <h3 style="text-align:center">3. ENFERMEDAD</h3>
                </div>
            </div>

            <div class="col-md-6 mb-3" id="q9">
              <br>
              <label for="" class="">¿PRESENTA ALGUNA ENFERMEDAD CRÓNICA O DEGENERATIVA Y/O SUS SECUELAS NO LE IMPIDEN REALIZAR LAS ACTIVIDADES DE SU VIDA COTIDIANA?</label>
              <select class="form-select form-select-lg" id="question_9" name="r_question_9">
                <option selected value>SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>
            

            <div class="col-md-6 mb-3" id="q10">
              <label for="" class="">¿PRESENTA SÍNTOMAS O SECUELAS DE UNA ENFERMEDAD CRÓNICO O DEGENERATIVA, CONTROLADA BAJO TRATAMIENTO MÉDICO, EL CUAL NO LIMITA NI SU MOVILIDAD NI SU DESPLAZAMIENTO?</label>
              <select class="form-select form-select-lg" id="question_10" name="r_question_10">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q11">
              <label for="" class="">¿PRESENTA ALGUNA ENFERMEDAD CRÓNICO DEGENERATIVA QUE REQUIERE ATENCIÓN INMEDIATA PARA SU CONTROL MEDIANTE TRATAMIENTO MÉDICO?</label>
              <select class="form-select form-select-lg" id="question_11" name="r_question_11">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q12">
              <label for="" class="">¿PRESENTA ALGUNA ENFERMEDAD CARDIOVASCULAR, RESPIRATORIA, CÁNCER U OTRA QUE REQUIERE ATENCIÓN MÉDICA Y/O HOSPITALARIA DE MANERA URGENTE?</label>
              <input readonly class="form-control" id="question_12" name="r_question_12" type="text" value="<?php echo $r_input; ?>"  style="font-size: 14px;">
            </div>

        </div>

        <div id="div_4">


            <div id="cabecera">
                <div class="row alert div-title">
                  <h3 style="text-align:center">4. EDAD</h3>
                </div>
            </div>

            <div class="col-md-6 mb-3" id="q13">
              <label for="" class="">¿ES UNA PERSONA MAYOR DE 18, PERO MENOR DE 60 AÑOS?</label>
              <select class="form-select form-select-lg" id="question_13" name="r_question_13">
                <option selected value>SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q14">
              <label for="" class="">¿ES UNA PERSONA MAYOR DE 60 (ADULTO MAYOR), PERO MENOR DE 80 AÑOS?</label>
              <select class="form-select form-select-lg" id="question_14" name="r_question_14">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q15">
              <label for="" class="">¿ES UNA PERSONA MAYOR DE 10, PERO MENOR DE 18 AÑOS (ADOLESCENTE) QUE REQUIERE O SE ENCUENTRA ASISTIDO DE PADRE O TUTOR?</label>
              <select class="form-select form-select-lg" id="question_15" name="r_question_15">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q16">
              <label for="" class="">¿ES UNA PERSONA MENOR DE 10 AÑOS, QUE REQUIERE O SE ENCUENTRA ASISTIDO DE PADRE O TUTOR?</label>
              <input readonly class="form-control" id="question_16" name="r_question_16" type="text" value="<?php echo $r_input; ?>"  style="font-size: 14px;">
            </div>
        
        </div>



        <div id="div_5">

            
            <div id="cabecera">
                <div class="row alert div-title">
                  <h3 style="text-align:center">5. PSICOPATOLOGÍA</h3>
                </div>
            </div>
    
            <div class="col-md-6 mb-3" id="q17"><br>
              <label for="" class="">¿PRESENTA INDICADORES DE PSICOPATOLOGÍA?</label>
              <select class="form-select form-select-lg" id="question_17" name="r_question_17">
                <option selected value>SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q18">
              <label for="" class="">¿PRESENTA ALTERACIÓN EN SU CAPACIDAD DE ATENCIÓN, CONCENTRACIÓN, MEMORIA Y/O HÁBITOS DE SUEÑO Y ALIMENTACIÓN?</label>
              <select class="form-select form-select-lg" id="question_18" name="r_question_18">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q19">
              <label for="" class="">¿PRESENTA INDICADORES REFERENTES A TRASTORNOS DE ANSIEDAD, DEPRESIÓN Y/O DEL ESTADO DE ÁNIMO?</label>
              <select class="form-select form-select-lg" id="question_19" name="r_question_19">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q20">
              <label for="" class="">¿PRESENTA ALTERACIONES ANORMALES DEL FUNCIONAMIENTO MENTAL COMO ALUCINACIONES, IDEAS DELIRANTES, DEMENCIA, AFASIA O RETARDO MENTAL?</label>
              <input readonly class="form-control" id="question_20" name="r_question_20" type="text" value="<?php echo $r_input; ?>"  style="font-size: 14px;">
            </div>

        </div>

       
        <div id="div_6">

            <div id="cabecera">
                <div class="row alert div-title">
                  <h3 style="text-align:center">6. PERSONALIDAD</h3>
                </div>
            </div>


            <div class="col-md-6 mb-3" id="q21"> 
              <br><br>
              <label for="" class="">¿PRESENTA CARACTERÍSTICAS QUE CONCUERDEN CON ALGÚN TRASTORNO DE LA PERSONALIDAD?</label>
              <select class="form-select form-select-lg" id="question_21" name="r_question_21">
                <option selected value>SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q22">
              <label for="" class="">¿PRESENTA O SEÑALÓ TENER PENSAMIENTOS O COMPORTAMIENTOS DE ANSIEDAD O TEMOR, CON PRESENCIA DE CONFLICTOS INTERPERSONALES E INTRAPSÍQUICOS (TRASTORNO DE LA PERSONALIDAD POR EVITACIÓN, DEPENDIENTE, OBSESIVO-COMPULSIVO)?</label>
              <select class="form-select form-select-lg" id="question_22" name="r_question_22">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q23">
              <label for="" class="">¿PRESENTA O SEÑALÓ TENER PENSAMIENTOS O COMPORTAMIENTOS IMPULSIVOS, EMOCIONALES, LLAMATIVOS, EXTROVERTIDOS Y SOCIALES, DRAMÁTICOS, IMPREDECIBLES, EMOCIONALMENTE INESTABLE (TRASTORNO ANTISOCIAL, LÍMITE DE PERSONALIDAD, HISTRIÓNICO DE LA PERSONALIDAD, DE PERSONALIDAD NARCISISTA)?</label>
              <br><br>
              <select class="form-select form-select-lg" id="question_23" name="r_question_23">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q24">
              <label for="" class="">¿PRESENTA O SEÑALÓ TENER PENSAMIENTOS O COMPORTAMIENTOS EXCÉNTRICOS, EXTRAÑOS O AJENOS A LOS CÓDIGOS DE SOCIALIZACIÓN Y A LAS CONVENCIONES SOCIALES, INTROVERTIDOS, CON AUSENCIA DE RELACIONES PRÓXIMAS, DESCONEXIÓN DE LA REALIDAD O ALTERACIONES PSICOLÓGICAS DE TIPO PSICÓTICO (TRASTORNO PARANOIDE, ESQUIZOIDE, ESQUIZOTÍPICO)?</label>
              <input readonly class="form-control" id="question_24" name="r_question_24" type="text" value="<?php echo $r_input; ?>"  style="font-size: 14px;">
            </div>


        </div>


        <div id="div_7">

            <div id="cabecera">
                <div class="row alert div-title">
                  <h3 style="text-align:center">7. SALUD MENTAL</h3>
                </div>
            </div>


            <div class="col-md-6 mb-3" id="q25">
              <label for="" class="">¿ES CONSCIENTE DE SUS PROPIAS CAPACIDADES, PUEDE AFRONTAR LAS TENSIONES Y/O DIFICULTADES NORMALES DE LA VIDA, PUEDE TRABAJAR DE FORMA PRODUCTIVA Y FRUCTÍFERA, CAPAZ DE CONTRIBUIR A SU COMUNIDAD?</label>
              <select class="form-select form-select-lg" id="question_25" name="r_question_25">
                <option selected value>SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q26">
              <label for="" class="">¿ES CONSCIENTE DE LAS LIMITACIONES DE SUS CAPACIDADES, PERO CUENTA CON APOYO PARA AFRONTAR LAS TENSIONES Y/O DIFICULTADES NORMALES DE LA VIDA Y TRABAJAR DE FORMA PRODUCTIVA Y FRUCTÍFERA, CAPAZ DE CONTRIBUIR A SU COMUNIDAD?</label>
              <select class="form-select form-select-lg" id="question_26" name="r_question_26">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q27">
              <label for="" class="">¿ES CONSCIENTE DE LAS LIMITACIONES DE SUS CAPACIDADES, PERO NO CUENTA CON APOYO PARA AFRONTAR LAS TENSIONES Y/O DIFICULTADES NORMALES DE LA VIDA Y TRABAJAR DE FORMA PRODUCTIVA Y FRUCTÍFERA, POR LO QUE NO ES CAPAZ DE CONTRIBUIR A SU COMUNIDAD?</label>
              <select class="form-select form-select-lg" id="question_27" name="r_question_27">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q28">
              <label for="" class="">¿NO ES CONSCIENTE DE SUS CAPACIDADES, POR LO QUE NO PUEDE AFRONTAR LAS TENSIONES Y/O DIFICULTADES NORMALES DE LA VIDA, NI TRABAJAR DE FORMA PRODUCTIVA Y FRUCTÍFERA, POR LO QUE NO ES CAPAZ DE CONTRIBUIR CON SU COMUNIDAD?</label>
              <input readonly class="form-control" id="question_28" name="r_question_28" type="text" value="<?php echo $r_input; ?>"  style="font-size: 14px;">
            </div>

        </div>


        <div id="div_8">


            <div id="cabecera">
                <div class="row alert div-title">
                  <h3 style="text-align:center">8. EDUCATIVO Y LABORAL</h3>
                </div>
            </div>

            <div class="col-md-6 mb-3" id="q29">
              <br><br><br><br>
              <label for="" class="">¿ACTUALMENTE SE ENCUENTRA ESTUDIANDO O LABORANDO?</label>
              <select class="form-select form-select-lg" id="question_29" name="r_question_29">
                <option selected>SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q30">
              <label for="" class="">¿CONCLUYÓ O SE ENCUENTRA SUSPENDIDA SU FASE EDUCATIVA O LABORAL, SE ENCUENTRA CURSANDO UN AÑO EDUCATIVO O LABORAL, PERO SU INCORPORACIÓN NO AFECTA AL DESARROLLO DE SUS ACTIVIDADES YA QUE PUEDE REALIZARLAS DE MANERA REMOTA, POR CONDUCTO DE TERCERAS PERSONAS O PUEDE GOZAR DE UN PERMISO O LICENCIA?</label>
              <select class="form-select form-select-lg" id="question_30" name="r_question_30">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q31">
              <label for="" class="">¿SE ENCUENTRA CURSANDO UN AÑO EDUCATIVO DE MANERA PRESENCIAL?</label>
              <select class="form-select form-select-lg" id="question_31" name="r_question_31">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q32">
              <label for="" class="">¿CUENTA CON UN EMPLEO FORMAL O INFORMAL, QUE ATIENDE DE MANERA DIRECTA?</label>
              <input readonly class="form-control" id="question_32" name="r_question_32" type="text" value="<?php echo $r_input; ?>"  style="font-size: 14px;">
            </div>


        </div>


        <div id="div_9">


            <div id="cabecera">
                <div class="row alert div-title">
                  <h3 style="text-align:center">9. FAMILIA</h3>
                </div>
            </div>


            <div class="col-md-6 mb-3" id="q33">
              <label for="" class="">¿ES UNA PERSONA INDEPENDIENTE O CONFORMA UNA FAMILIA, UNIDA POR VÍNCULOS DE AFECTIVIDAD MUTUA, MEDIADA POR REGLAS, ROLES, NORMAS Y PRÁCTICAS DE COMPORTAMIENTO, CON COMUNICACIÓN DIRECTA, ABIERTA Y varANTE, SIN PRESENCIA DE VIOLENCIA (DINÁMICA FAMILIAR FUNCIONAL)?</label>
              <select class="form-select form-select-lg" id="question_33" name="r_question_33">
                <option selected value>SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q34">
              <label for="" class="">¿ES UNA PERSONA INDEPENDIENTE O CONFORMA UNA FAMILIA, UNIDA POR VÍNCULOS DE AFECTIVIDAD MUTUA, MEDIADA POR REGLAS, ROLES, NORMAS Y PRÁCTICAS DE COMPORTAMIENTO INTERMITENTES, CON COMUNICACIÓN DESPLAZADA, SIN PRESENCIA DE VIOLENCIA (DINÁMICA FAMILIAR INTERMEDIA)?</label>
              <select class="form-select form-select-lg" id="question_34" name="r_question_34">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q35">
              <label for="" class="">¿ES UNA PERSONA INDEPENDIENTE O CONFORMA UNA FAMILIA, SIN VÍNCULOS DE AFECTIVIDAD MUTUA, CON REGLAS, ROLES, NORMAS Y PRÁCTICAS DE COMPORTAMIENTO INTERMITENTES, CON COMUNICACIÓN BLOQUEADA, CON O SIN PRESENCIA DE VIOLENCIA (DINÁMICA FAMILIAR DISFUNCIONAL)?</label>
              <select class="form-select form-select-lg" id="question_35" name="r_question_35">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q36">
              <label for="" class="">¿ES UNA PERSONA INDEPENDIENTE O CONFORMA UNA FAMILIA, SIN VÍNCULOS DE AFECTIVIDAD MUTUA, NO SE ENCUENTRA MEDIADA POR REGLAS, ROLES, NORMAS Y PRÁCTICAS DE COMPORTAMIENTO, CON COMUNICACIÓN DAÑADA Y CON PRESENCIA DE VIOLENCIA (DINÁMICA FAMILIAR DISFUNCIONAL SEVERA)?</label>
              <input readonly class="form-control" id="question_36" name="r_question_36" type="text" value="<?php echo $r_input; ?>"  style="font-size: 14px;">
            </div>


        </div>


        <div id="div_10">


            <div id="cabecera">
                <div class="row alert div-title">
                  <h3 style="text-align:center">10. ECONÓMICO</h3>
                </div>
            </div>


            <div class="col-md-6 mb-3" id="q37">
              <label for="" class="">¿CUENTA CON UN INGRESO SUPERIOR AL PROMEDIO NACIONAL, CON UNA O MÁS FUENTES DE INGRESOS Y/O REDES DE APOYO PARA EL SOSTENIMIENTO PERSONAL, DEL HOGAR E HIJOS, POR LO QUE SU INCORPORACIÓN AL PROGRAMA NO AFECTARÍA SUS INGRESOS?</label>
              <select class="form-select form-select-lg" id="question_37" name="r_question_37">
                <option selected value>SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q38">
              <br><br>
              <label for="" class="">¿CUENTA CON UN INGRESO IGUAL AL PROMEDIO NACIONAL, CUENTA CON UNA O MÁS REDES DE APOYO PARA EL SOSTENIMIENTO PERSONAL, DEL HOGAR E HIJOS?</label>
              <select class="form-select form-select-lg" id="question_38" name="r_question_38">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q39">
              <label for="" class="">¿CUENTA CON UN INGRESO IGUAL AL SALARIO MÍNIMO, ES LA ÚNICA FUENTE DE INGRESOS PARA EL SOSTENIMIENTO PERSONAL, DEL HOGAR E HIJOS?</label>
              <select class="form-select form-select-lg" id="question_39" name="r_question_39">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q40">
              <label for="" class="">¿NO CUENTA CON UN INGRESO O ESTE NO ES FIJO O ES INFERIOR AL SALARIO MÍNIMO, SIENDO SU ÚNICA FUENTE DE INGRESOS?</label>
              <input readonly class="form-control" id="question_40" name="r_question_40" type="text" value="<?php echo $r_input; ?>"  style="font-size: 14px;">
            </div>

        </div>


        <div id="div_11">


            <div id="cabecera">
                <div class="row alert div-title">
                  <h3 style="text-align:center">11. JUICIO SOCIAL</h3>
                </div>
            </div>

            <div class="col-md-6 mb-3" id="q41">
              <label for="" class="">¿ES TOLERANTE, RESPETUOSO, CON OPINIÓN OBJETIVA Y ACEPTACIÓN DE DIFERENCIAS, ENTIENDE Y CONFORMA LAS REGLAS DE LA SOCIEDAD, MIDE LAS CONSECUENCIAS DE SUS ACCIONES, NO TIENDE A TRANSGREDIR LAS LEYES O NORMAS, NO CUENTA CON REDES O VÍNCULOS PERTENECIENTES A UNA ESTRUCTURA DELICTIVA?</label>
              <br><br>
              <select class="form-select form-select-lg" id="question_41" name="r_question_41">
                <option selected value>SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q42">
              <label for="" class="">¿ES TOLERANTE, RESPETUOSO, CON OPINIÓN OBJETIVA Y ACEPTACIÓN DE DIFERENCIAS, ENTIENDE Y CONFORMA LAS REGLAS DE LA SOCIEDAD, NO MIDE LAS CONSECUENCIAS DE SUS ACCIONES, PUEDE LLEGAR A TRANSGREDIR DE MANERA ESPORÁDICA LAS LEYES O NORMAS, NO CUENTA CON REDES O VÍNCULOS PERTENECIENTES A UNA ESTRUCTURA DELICTIVA?</label>
              <select class="form-select form-select-lg" id="question_42" name="r_question_42">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q43">
              <label for="" class="">¿ES INTOLERANTE, TIENDE A SER AGRESIVO, CON OPINIÓN CERRADA, POCA ACEPTACIÓN DE DIFERENCIAS, ENTIENDE Y CONFORMA LAS REGLAS DE LA SOCIEDAD, NO MIDE LAS CONSECUENCIAS DE SUS ACCIONES, TIENDE A TRANSGREDIR DE MANERA ESPORÁDICA LAS LEYES O NORMAS, NO CUENTA CON REDES O VÍNCULOS PERTENECIENTES A UNA ESTRUCTURA DELICTIVA?</label>
              <select class="form-select form-select-lg" id="question_43" name="r_question_43">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q44">
              <br>
              <label for="" class="">¿ES INTOLERANTE, IRRESPETUOSO, AGRESIVO, CON OPINIÓN CERRADA, NO ACEPTA DIFERENCIAS, ENTIENDE Y CONFORMA LAS REGLAS DE LA SOCIEDAD, PERO NO MIDE LAS CONSECUENCIAS DE SUS ACCIONES, TIENDE A TRANSGREDIR LAS LEYES O NORMAS, CUENTA CON REDES O VÍNCULOS PERTENECIENTES A UNA ESTRUCTURA DELICTIVA?</label>
              <input readonly class="form-control" id="question_44" name="r_question_44" type="text" value="<?php echo $r_input; ?>"  style="font-size: 14px;">
            </div>


        </div>


        <div id="div_12">


            <div id="cabecera">
                <div class="row alert div-title">
                  <h3 style="text-align:center">12. FACTORES CRIMINOLÓGICOS</h3>
                </div>
            </div>



            <div class="col-md-6 mb-3" id="q45">
            <br><br><br>
              <label for="" class="">¿CUENTA CON ANTECEDENTES PENALES?</label>
              <select class="form-select form-select-lg" id="question_45" name="r_question_45">
                <option selected value>SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>
            
            <div class="col-md-6 mb-3" id="q46">
              <label for="" class="">¿ES CATALOGADO DENTRO DE LOS SUJETOS ACTIVOS COMUNES, INADAPTADOS, CARACTERIALES, PRIMO DELINCUENTE U OCASIONAL. CUENTA CON FACTORES DE PROTECCIÓN POCO DEFINIDOS, CON MAYOR PRESENCIA DE FACTORES DE RIESGO, ESTÁTICOS, DINÁMICOS, MOTIVADORES, DESESTABILIZADORES Y DESINHIBIDORES?</label>
              <select class="form-select form-select-lg" id="question_46" name="r_question_46">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q47"><br><br>
              <label for="" class="">¿ES CATALOGADO COMO REINCIDENTE ESPECÍFICO O HABITUAL, CON POTENCIAL DELICTIVO ALTO, SU INADAPTACIÓN LOS HACE EVIDENTES. CON AUSENCIA DE FACTORES DE PROTECCIÓN, SOBRESALIENDO LOS FACTORES DE RIESGO, MOTIVADORES Y DESESTABILIZADORES?</label>
              <select class="form-select form-select-lg" id="question_47" name="r_question_47">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q48">
              <label for="" class="">¿TIENDE A TRANSGREDIR DE MANERA varANTE LAS LEYES O NORMAS, ES REINCIDENTE GENÉRICO O PROFESIONAL, CUENTA CON REDES O VÍNCULOS PERTENECIENTES A UNA ESTRUCTURA DELICTIVA, CON ACTITUD PERMANENTE OPOSICIÓN Y AUTOAFIRMACIÓN AGRESIVA.  SE PRESENTAN MANIFESTACIONES GRAVES DE CONDUCTAS ANTISOCIALES.  CUENTA CON FACTORES DE RIESGO, ESTÁTICOS, DINÁMICOS, MOTIVADORES, DESESTABILIZADORES Y DESINHIBIDORES?</label>
              <input readonly class="form-control" id="question_48" name="r_question_48" type="text" value="<?php echo $r_input; ?>"  style="font-size: 14px;">
            </div>


        </div>


        <div id="div_13">


            <div id="cabecera">
                <div class="row alert div-title">
                  <h3 style="text-align:center">13. CLASIFICACIÓN VICTIMOLÓGICA</h3>
                </div>
            </div>


            <div class="col-md-6 mb-3" id="q49">
              <label for="" class="">¿ATENDIENDO LA DINÁMICA DE LOS HECHOS SE PUEDE CONSIDERAR COMO UNA VÍCTIMA INOCENTE O IDEAL, VÍCTIMA DE CULPABILIDAD MENOR O POR IGNORANCIA?</label>
              <select class="form-select form-select-lg" id="question_49" name="r_question_49">
                <option selected value=>SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q50">
              <label for="" class="">¿ATENDIENDO LA DINÁMICA DE LOS HECHOS SE PUEDE CONSIDERAR COMO VÍCTIMA VOLUNTARIA?</label>
              <select class="form-select form-select-lg" id="question_50" name="r_question_50">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q51">
              <label for="" class="">¿ATENDIENDO LA DINÁMICA DE LOS HECHOS SE PUEDE CONSIDERAR COMO UNA VÍCTIMA PROVOCADORA Ó VÍCTIMA POR IMPRUDENCIA?</label>
              <select class="form-select form-select-lg" id="question_51" name="r_question_51">
                <option selected value="N/A">SELECCIONE UNA OPCIÓN</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>


            <div class="col-md-6 mb-3" id="q52">
              <label for="" class="">¿ATENDIENDO LA DINÁMICA DE LOS HECHOS SE PUEDE CONSIDERAR COMO UNA VÍCTIMA INFRACTORA, SIMULADORA O IMAGINARIA?</label>
              <input readonly class="form-control" id="question_52" name="r_question_52" type="text" value="<?php echo $r_input; ?>"  style="font-size: 14px;">
            </div>


        </div>


        <div>
            <div class="col-md-6 mb-3">
                  <input readonly class="form-control" id="total_instrumento" name="total_i" type="text" value  style="font-size: 14px; display: none;">
                  <input readonly class="form-control" id="adaptabilidad" name="adaptabilidad_i" type="text" value  style="font-size: 14px; display: none;">
                </div>
        </div>
                


                  <div class="row" id="div-b&n1">
                      <div class="vertical_center_button">
                        <button onclick="nextApartado2()" class="button_next" id="btn-next1" style="text-align:center; margin: 10px; display: none;" type="button">Siguiente</button>
                      </div>
                  </div>

                  <div class="row" id="div-b&n2">
                      <div class="vertical_center_button">
                        <button onclick="backApartado1()" class="button_back" id="btn-back2" style="text-align:center; margin: 10px; display: none;" type="button">Anterior</button>
                        <button onclick="nextApartado3()" class="button_next" id="btn-next2" style="text-align:center; margin: 10px; display: none;" type="button">Siguiente</button>
                      </div>
                  </div>

                  <div class="row" id="div-b&n3">
                      <div class="vertical_center_button">
                        <button onclick="backApartado2()" class="button_back" id="btn-back3" style="text-align:center; margin: 10px; display: none;" type="button">Anterior</button>
                        <button onclick="nextApartado4()" class="button_next" id="btn-next3" style="text-align:center; margin: 10px; display: none;" type="button">Siguiente</button>
                      </div>
                  </div>

                  <div class="row" id="div-b&n4">
                      <div class="vertical_center_button">
                        <button onclick="backApartado3()" class="button_back" id="btn-back4" style="text-align:center; margin: 10px; display: none;" type="button">Anterior</button>
                        <button onclick="nextApartado5()" class="button_next" id="btn-next4" style="text-align:center; margin: 10px; display: none;" type="button">Siguiente</button>
                      </div>
                  </div>

                  <div class="row" id="div-b&n5">
                      <div class="vertical_center_button">
                        <button onclick="backApartado4()" class="button_back" id="btn-back5" style="text-align:center; margin: 10px; display: none;" type="button">Anterior</button>
                        <button onclick="nextApartado6()" class="button_next" id="btn-next5" style="text-align:center; margin: 10px; display: none;" type="button">Siguiente</button>
                      </div>
                  </div>


                  <div class="row" id="div-b&n6">
                      <div class="vertical_center_button">
                        <button onclick="backApartado5()" class="button_back" id="btn-back6" style="text-align:center; margin: 10px; display: none;" type="button">Anterior</button>
                        <button onclick="nextApartado7()" class="button_next" id="btn-next6" style="text-align:center; margin: 10px; display: none;" type="button">Siguiente</button>
                      </div>
                  </div>

                  <div class="row" id="div-b&n7">
                      <div class="vertical_center_button">
                        <button onclick="backApartado6()" class="button_back" id="btn-back7" style="text-align:center; margin: 10px; display: none;" type="button">Anterior</button>
                        <button onclick="nextApartado8()" class="button_next" id="btn-next7" style="text-align:center; margin: 10px; display: none;" type="button">Siguiente</button>
                      </div>
                  </div>

                  <div class="row" id="div-b&n8">
                      <div class="vertical_center_button">
                        <button onclick="backApartado7()" class="button_back" id="btn-back8" style="text-align:center; margin: 10px; display: none;" type="button">Anterior</button>
                        <button onclick="nextApartado9()" class="button_next" id="btn-next8" style="text-align:center; margin: 10px; display: none;" type="button">Siguiente</button>
                      </div>
                  </div>

                  <div class="row" id="div-b&n9">
                      <div class="vertical_center_button">
                        <button onclick="backApartado8()" class="button_back" id="btn-back9" style="text-align:center; margin: 10px; display: none;" type="button">Anterior</button>
                        <button onclick="nextApartado10()" class="button_next" id="btn-next9" style="text-align:center; margin: 10px; display: none;" type="button">Siguiente</button>
                      </div>
                  </div>

                  <div class="row" id="div-b&n10">
                      <div class="vertical_center_button">
                        <button onclick="backApartado9()" class="button_back" id="btn-back10" style="text-align:center; margin: 10px; display: none;" type="button">Anterior</button>
                        <button onclick="nextApartado11()" class="button_next" id="btn-next10" style="text-align:center; margin: 10px; display: none;" type="button">Siguiente</button>
                      </div>
                  </div>

                  <div class="row" id="div-b&n11">
                      <div class="vertical_center_button">
                        <button onclick="backApartado10()" class="button_back" id="btn-back11" style="text-align:center; margin: 10px; display: none;" type="button">Anterior</button>
                        <button onclick="nextApartado12()" class="button_next" id="btn-next11" style="text-align:center; margin: 10px; display: none;" type="button">Siguiente</button>
                      </div>
                  </div>

                  <div class="row" id="div-b&n12">
                      <div class="vertical_center_button">
                        <button onclick="backApartado11()" class="button_back" id="btn-back12" style="text-align:center; margin: 10px; display: none;" type="button">Anterior</button>
                        <button onclick="nextApartado13()" class="button_next" id="btn-next12" style="text-align:center; margin: 10px; display: none;" type="button">Siguiente</button>
                      </div>
                  </div>

                  <div class="row" id="div-b&n13">
                      <div class="vertical_center_button">
                        <button onclick="backApartado12()" class="button_back" id="btn-back13" style="text-align:center; margin: 10px; display: none;" type="button">Anterior</button>
                        <button onclick="guardarInstrumento()"name="" class="button_next" id="btn-next13" style="text-align:center; margin: 10px; display: none;" type="submit">Guardar</button>
                      </div>
                  </div>
            

              </div>
              </form>
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

<script src="../js/obtener_datos_instrumento.js"></script>
<script src="../js/boton_back_instrumento.js"></script>
<script src="../js/boton_next_instrumento.js"></script>
<script src="../js/iniciar_instrumento.js"></script>

<script>
function guardarInstrumento() { // Guardar instrumento

      var t = [];

      var resultado1 = 0;
      var resultado2 = 0;
      var resultado3 = 0;
      var resultado4 = 0;
      var resultado5 = 0;
      var resultado6 = 0;
      var resultado7 = 0;
      var resultado8 = 0;
      var resultado9 = 0;
      var resultado10 = 0;
      var resultado11 = 0;
      var resultado12 = 0;
      var resultado13 = 0;

      var suma1;
      var suma2;
      var suma3;
      var suma4;
      var suma5;
      var suma6;
      var suma7;
      var suma8;
      var suma8;
      var suma10;
      var suma11;
      var suma12;
      var suma13;

      var q1 = document.getElementById('question_1').value; // Obtener valor Pregunta 1
      var q2 = document.getElementById('question_2').value; // Obtener valor Pregunta 2
      var q3 = document.getElementById('question_3').value; // Obtener valor Pregunta 2
      var q4 = document.getElementById('question_3').value; // Obtener valor Pregunta 4
      var q5 = document.getElementById('question_5').value; // Obtener valor Pregunta 5 
      var q6 = document.getElementById('question_6').value; // Obtener valor Pregunta 6
      var q7 = document.getElementById('question_7').value; // Obtener valor Pregunta 7
      var q8 = document.getElementById('question_8').value; // Obtener valor Pregunta 8
      var q9 = document.getElementById('question_9').value; // Obtener valor Pregunta 9
      var q10 = document.getElementById('question_10').value; // Obtener valor Pregunta 10
      var q11 = document.getElementById('question_11').value; // Obtener valor Pregunta 11
      var q12 = document.getElementById('question_12').value; // Obtener valor Pregunta 12
      var q13 = document.getElementById('question_13').value; // Obtener valor Pregunta 13
      var q14 = document.getElementById('question_14').value; // Obtener valor Pregunta 14
      var q15 = document.getElementById('question_15').value; // Obtener valor Pregunta 15
      var q16 = document.getElementById('question_16').value; // Obtener valor Pregunta 16
      var q17 = document.getElementById('question_17').value; // Obtener valor Pregunta 17
      var q18 = document.getElementById('question_18').value; // Obtener valor Pregunta 18
      var q19 = document.getElementById('question_19').value; // Obtener valor Pregunta 19
      var q20 = document.getElementById('question_20').value; // Obtener valor Pregunta 20
      var q21 = document.getElementById('question_21').value; // Obtener valor Pregunta 21
      var q22 = document.getElementById('question_22').value; // Obtener valor Pregunta 22
      var q23 = document.getElementById('question_23').value; // Obtener valor Pregunta 23
      var q24 = document.getElementById('question_24').value; // Obtener valor Pregunta 24
      var q25 = document.getElementById('question_25').value; // Obtener valor Pregunta 25
      var q26 = document.getElementById('question_26').value; // Obtener valor Pregunta 26
      var q27 = document.getElementById('question_27').value; // Obtener valor Pregunta 27
      var q28 = document.getElementById('question_28').value; // Obtener valor Pregunta 28
      var q29 = document.getElementById('question_29').value; // Obtener valor Pregunta 29
      var q30 = document.getElementById('question_30').value; // Obtener valor Pregunta 30
      var q31 = document.getElementById('question_31').value; // Obtener valor Pregunta 31
      var q32 = document.getElementById('question_32').value; // Obtener valor Pregunta 32
      var q33 = document.getElementById('question_33').value; // Obtener valor Pregunta 33
      var q34 = document.getElementById('question_34').value; // Obtener valor Pregunta 34
      var q35 = document.getElementById('question_35').value; // Obtener valor Pregunta 35
      var q36 = document.getElementById('question_36').value; // Obtener valor Pregunta 36
      var q37 = document.getElementById('question_37').value; // Obtener valor Pregunta 37
      var q38 = document.getElementById('question_38').value; // Obtener valor Pregunta 38
      var q39 = document.getElementById('question_39').value; // Obtener valor Pregunta 39
      var q40 = document.getElementById('question_40').value; // Obtener valor Pregunta 40
      var q41 = document.getElementById('question_41').value; // Obtener valor Pregunta 41
      var q42 = document.getElementById('question_42').value; // Obtener valor Pregunta 42
      var q43 = document.getElementById('question_43').value; // Obtener valor Pregunta 43
      var q44 = document.getElementById('question_44').value; // Obtener valor Pregunta 44
      var q45 = document.getElementById('question_45').value; // Obtener valor Pregunta 45
      var q46 = document.getElementById('question_46').value; // Obtener valor Pregunta 46
      var q47 = document.getElementById('question_47').value; // Obtener valor Pregunta 47
      var q48 = document.getElementById('question_48').value; // Obtener valor Pregunta 48
      var q49 = document.getElementById('question_49').value; // Obtener valor Pregunta 49
      var q50 = document.getElementById('question_50').value; // Obtener valor Pregunta 50
      var q51 = document.getElementById('question_51').value; // Obtener valor Pregunta 51
      var q52 = document.getElementById('question_52').value; // Obtener valor Pregunta 52


      if(q1==="No"){
        suma1 = 3;
        resultado1 = resultado1 + suma1;
        t.push(resultado1);
      }else if(q1==="Si" && q2==="Si"){
        suma1 = 2;
        resultado1 = resultado1 + suma1;
        t.push(resultado1);
      }else if(q1==="Si" && q2==="No" && q3==="Si"){
        suma1 = 1;
        resultado1 = resultado1 + suma1;
        t.push(resultado1);
      }else if(q1==="Si" && q2==="No" && q3==="No" && q4==="Si"){
        suma1 = 0;
        resultado1 = resultado1 + suma1;
        t.push(resultado1);
      }

      if(q5==="No"){
        suma2 = 3;
        resultado2 = resultado2 + suma2;
        t.push(resultado2);
      }else if(q5==="Si" && q6==="Si"){
        suma2 = 2;
        resultado2 = resultado2 + suma2;
        t.push(resultado2);
      }else if(q5==="Si" && q6==="No" && q7==="Si"){
        suma2 = 1;
        resultado2 = resultado2 + suma2;
        t.push(resultado2);
      }else if(q5==="Si" && q6==="No" && q7==="No" && q8==="Si"){
        suma2 = 0;
        resultado2 = resultado2 + suma2;
        t.push(resultado2);
      }

      if(q9==="No"){
        suma3 = 3;
        resultado3 = resultado3 + suma3;
        t.push(resultado3);
      }else if(q9==="Si" && q10==="Si"){
        suma3 = 2;
        resultado3 = resultado3 + suma3;
        t.push(resultado3);
      }else if(q9==="Si" && q10==="No" && q11==="Si"){
        suma3 = 1;
        resultado3 = resultado3 + suma3;
        t.push(resultado3);
      }else if(q9==="Si" && q10==="No" && q11==="No" && q12==="Si"){
        suma3 = 0;
        resultado3 = resultado3 + suma3;
        t.push(resultado3);
      }

      if(q13==="No"){
        suma4 = 3;
        resultado4 = resultado4 + suma4;
        t.push(resultado4);
      }else if(q13==="Si" && q14==="Si"){
        suma4 = 2;
        resultado4 = resultado4 + suma4;
        t.push(resultado4);
      }else if(q13==="Si" && q14==="No" && q15==="Si"){
        suma4 = 1;
        resultado4 = resultado4 + suma4;
        t.push(resultado4);
      }else if(q13==="Si" && q14==="No" && q15==="No" && q16==="Si"){
        suma4 = 0;
        resultado4 = resultado4 + suma4;
        t.push(resultado4);
      }

      if(q17==="No"){
        suma5 = 3;
        resultado5 = resultado5 + suma5;
        t.push(resultado5);
      }else if(q17==="Si" && q18==="Si"){
        suma5 = 2;
        resultado5 = resultado5 + suma5;
        t.push(resultado5);
      }else if(q17==="Si" && q18==="No" && q19==="Si"){
        suma5 = 1;
        resultado5 = resultado5 + suma5;
        t.push(resultado5);
      }else if(q17==="Si" && q18==="No" && q19==="No" && q20==="Si"){
        suma5 = 0;
        resultado5 = resultado5 + suma5;
        t.push(resultado5);
      }

      if(q21==="No"){
        suma6 = 3;
        resultado6 = resultado6 + suma6;
        t.push(resultado6);
      }else if(q21==="Si" && q22==="Si"){
        suma6 = 2;
        resultado6 = resultado6 + suma6;
        t.push(resultado6);
      }else if(q21==="Si" && q22==="No" && q23==="Si"){
        suma6 = 1;
        resultado6 = resultado6 + suma6;
        t.push(resultado6);
      }else if(q21==="Si" && q22==="No" && q23==="No" && q24==="Si"){
        suma6 = 0;
        resultado6 = resultado6 + suma6;
        t.push(resultado6);
      }

      if(q25==="No"){
        suma7 = 3;
        resultado7 = resultado7 + suma7;
        t.push(resultado7);
      }else if(q25==="Si" && q26==="Si"){
        suma7 = 2;
        resultado7 = resultado7 + suma7;
        t.push(resultado7);
      }else if(q25==="Si" && q26==="No" && q27==="Si"){
        suma7 = 1;
        resultado7 = resultado7 + suma7;
        t.push(resultado7);
      }else if(q25==="Si" && q26==="No" && q27==="No" && q28==="Si"){
        suma7 = 0;
        resultado7 = resultado7 + suma7;
        t.push(resultado7);
      }


      if(q29==="No"){
        suma8 = 3;
        resultado8 = resultado8 + suma8;
        t.push(resultado8);
      }else if(q29==="Si" && q30==="Si"){
        suma8 = 2;
        resultado8 = resultado8 + suma8;
        t.push(resultado8);
      }else if(q29==="Si" && q30==="No" && q31==="Si"){
        suma8 = 1;
        resultado8 = resultado8 + suma8;
        t.push(resultado8);
      }else if(q29==="Si" && q30==="No" && q31==="No" && q32==="Si"){
        suma8 = 0;
        resultado8 = resultado8 + suma8;
        t.push(resultado8);
      }


      if(q33==="No"){
        suma9 = 3;
        resultado9 = resultado9 + suma9;
        t.push(resultado9);
      }else if(q33==="Si" && q34==="Si"){
        suma9 = 2;
        resultado9 = resultado9 + suma9;
        t.push(resultado9);
      }else if(q33==="Si" && q34==="No" && q35==="Si"){
        suma9 = 1;
        resultado9 = resultado9 + suma9;
        t.push(resultado9);
      }else if(q33==="Si" && q34==="No" && q35==="No" && q36==="Si"){
        suma9 = 0;
        resultado9 = resultado9 + suma9;
        t.push(resultado9);
      }


      if(q37==="No"){
        suma10 = 3;
        resultado10 = resultado10 + suma10;
        t.push(resultado10);
      }else if(q37==="Si" && q38==="Si"){
        suma10 = 2;
        resultado10 = resultado10 + suma10;
        t.push(resultado10);
      }else if(q37==="Si" && q38==="No" && q39==="Si"){
        suma10 = 1;
        resultado10 = resultado10 + suma10;
        t.push(resultado10);
      }else if(q37==="Si" && q38==="No" && q39==="No" && q40==="Si"){
        suma10 = 0;
        resultado10 = resultado10 + suma10;
        t.push(resultado10);
      }


      if(q41==="No"){
        suma11 = 3;
        resultado11 = resultado11 + suma11;
        t.push(resultado11);
      }else if(q41==="Si" && q42==="Si"){
        suma11 = 2;
        resultado11 = resultado11 + suma11;
        t.push(resultado11);
      }else if(q41==="Si" && q42==="No" && q43==="Si"){
        suma11 = 1;
        resultado11 = resultado11 + suma11;
        t.push(resultado11);
      }else if(q41==="Si" && q42==="No" && q43==="No" && q44==="Si"){
        suma11 = 0;
        resultado11 = resultado11 + suma11;
        t.push(resultado11);
      }

      if(q45==="No"){
        suma12 = 3;
        resultado12 = resultado12 + suma12;
        t.push(resultado12);
      }else if(q45==="Si" && q46==="Si"){
        suma12 = 2;
        resultado12 = resultado12 + suma12;
        t.push(resultado12);
      }else if(q45==="Si" && q46==="No" && q47==="Si"){
        suma12 = 1;
        resultado12 = resultado12 + suma12;
        t.push(resultado12);
      }else if(q45==="Si" && q46==="No" && q47==="No" && q48==="Si"){
        suma12 = 0;
        resultado12 = resultado12 + suma12;
        t.push(resultado12);
      }

      if(q49==="No"){
        suma13 = 3;
        resultado13 = resultado13 + suma13;
        t.push(resultado13);
      }else if(q49==="Si" && q50==="Si"){
        suma13 = 2;
        resultado13 = resultado13 + suma13;
        t.push(resultado13);
      }else if(q49==="Si" && q50==="No" && q51==="Si"){
        suma13 = 1;
        resultado13 = resultado13 + suma13;
        t.push(resultado13);
      }else if(q49==="Si" && q50==="No" && q51==="No" && q52==="Si"){
        suma13 = 0;
        resultado13 = resultado13 + suma13;
        t.push(resultado13);
      }

      var total = 0;
      t.forEach(function(a){total += a;});
      // console.log(total);

      document.getElementById('total_instrumento').value = total;


      if (total >= 0 & total <=9){
        document.getElementById('adaptabilidad').value="INADAPTABLE";
      // console.log(document.getElementById('adaptabilidad').value);
      }else if(total >= 10 & total <=19){
        document.getElementById('adaptabilidad').value="BAJA";
      // console.log(document.getElementById('adaptabilidad').value);
      }else if(total >= 20 & total <=29){
        document.getElementById('adaptabilidad').value="MEDIA";
        // console.log(document.getElementById('adaptabilidad').value);
      }else if(total >= 30 & total <=39){
        document.getElementById('adaptabilidad').value="ALTA";
        // console.log(document.getElementById('adaptabilidad').value);
      }
      

      // console.log("hola");

}

</script>


</body>
</html>
