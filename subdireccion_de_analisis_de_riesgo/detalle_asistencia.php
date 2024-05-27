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



$id_asistencia_medica = $_GET["id_asistencia"];
// echo $id_asistencia_medica;

$consulta1 = "SELECT* FROM solicitud_asistencia WHERE solicitud_asistencia.id_asistencia = '$id_asistencia_medica'";
$resultado1 = $mysqli->query($consulta1);
$respuesta1=$resultado1->fetch_assoc();


$consulta2 = "SELECT* FROM agendar_asistencia WHERE agendar_asistencia.id_asistencia = '$id_asistencia_medica'";
$resultado2 = $mysqli->query($consulta2);
$respuesta2=$resultado2->fetch_assoc();


$consulta3 = "SELECT* FROM turnar_asistencia WHERE turnar_asistencia.id_asistencia = '$id_asistencia_medica' ORDER BY turnar_asistencia.fecha_turno DESC LIMIT 1";
$resultado3 = $mysqli->query($consulta3);
$respuesta3=$resultado3->fetch_assoc();


$consulta4 = "SELECT* FROM notificar_asistencia WHERE notificar_asistencia.id_asistencia = '$id_asistencia_medica' ORDER BY notificar_asistencia.fecha_notificacion DESC LIMIT 1";
$resultado4 = $mysqli->query($consulta4);
$respuesta4=$resultado4->fetch_assoc();


$consulta5 = "SELECT* FROM cita_asistencia WHERE cita_asistencia.id_asistencia = '$id_asistencia_medica' ORDER BY cita_asistencia.fecha_asistencia ASC LIMIT 1";
$resultado5 = $mysqli->query($consulta5);
$respuesta5=$resultado5->fetch_assoc();

$consulta6 = "SELECT* FROM cita_asistencia WHERE cita_asistencia.id_asistencia = '$id_asistencia_medica' ORDER BY cita_asistencia.fecha_asistencia DESC LIMIT 1";
$resultado6 = $mysqli->query($consulta6);
$respuesta6=$resultado6->fetch_assoc();



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
    			<li><a href="#" class="active" onclick="location.href='./detalle_asistencia.php?id_asistencia=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-address-card"></span><span class="tab-text">DETALLE DE LA ASISTENCIA MÉDICA</span></a></li>
    			<!-- <li><a href="#" onclick="location.href='detalle_instrumento.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">INSTRUMENTOS REGISTRADOS</span></a></li> -->
          <!-- <li><a href="#" onclick="location.href='seguimiento_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">SEGUIMIENTO PERSONA</span></a></li> -->
    	</ul>

    		<div class="secciones">
    			<article id="tab2">
            <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="./menu_asistencias_medicas.php">MENÚ ASISTENCIAS MÉDICAS</a>
              <a href="./panel_asistencias_por_completar.php">SEGUIMIENTO ASISTENCIA MÉDICA</a>
              <a href="./detalle_asistencia.php?id_asistencia=<?php echo $id_asistencia_medica; ?>" class="actived">DETALLE SEGUIMIENTO ASISTENCIA MÉDICA </a>
            </div>

            
            <div class="container">
        			<div class="well form-horizontal">
              <form class="container well form-horizontal" action="save_instrumento.php?folio=<?php echo $fol_exp; ?>" method="POST" enctype="multipart/form-data">

        				<div class="row">

                  <div id="cabecera">
                    <h1 style="text-align:center">DETALLE DE LA ASISTENCIA MÉDICA: <?php echo $id_asistencia_medica; ?></h1>
                    <br>
                    <div class="row alert div-title">
                      <h3 style="text-align:center">INFORMACIÓN DE LA SOLICITUD</h3>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">FOLIO DEL EXPEDIENTE DE PROTECCIÓN</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta1['folio_expediente']; ?>">
                  </div>


                  <div class="col-md-6 mb-3">
                    <label for="" class="">ID SUJETO</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta1['id_sujeto']; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">ID ASISTENCIA MÉDICA</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta1['id_asistencia']; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">FECHA DE SOLICITUD</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta1['fecha_solicitud']; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">ID SERVIDOR PÚBLICO</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta1['id_servidor']; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">NÚMERO DE OFICIO DE LA SOLICITUD</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta1['num_oficio']; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">TIPO DE REQUERIMIENTO</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta1['tipo_requerimiento']; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">SERVICIO MÉDICO</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta1['servicio_medico']; ?>">
                  </div>

                  <div class="col-md-12 mb-6">
                    <label for="" class="">OBSERVACIONES DE LA SOLICITUD</label>
                    <textarea readonly class="form-control" name="" id="" rows="5" cols="33" maxlength="1000" placeholder="<?php echo $respuesta1['observaciones']; ?>"></textarea>
                  <br>
                  </div>

                  <div id="cabecera">
                    <div class="row alert div-title">
                      <h3 style="text-align:center">UNIDAD MÉDICA</h3>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">TIPO DE INSTITUCIÓN</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta2['tipo_institucion']; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">NOMBRE DE LA INSTITUCIÓN</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta2['nombre_institucion']; ?>">
                  </div>

                  <!-- <div class="col-md-6 mb-3">
                    <label for="" class="">DOMICILIO DE LA UNSTITUCIÓN</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta2['domicilio_institucion']; ?>">
                  </div> -->


                  <div class="col-md-6 mb-3">
                    <label for="" class="">MUNICIPIO DE LA INSTITUCIÓN</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta2['municipio_institucion']; ?>">
                  </div>

                  <div class="col-md-12 mb-6">
                    <label for="" class="">DOMICILIO DE LA UNSTITUCIÓN</label>
                    <textarea readonly placeholder="<?php echo $respuesta2['domicilio_institucion']; ?>" class="form-control" name="" id="" rows="5" cols="33" maxlength="1000"></textarea>
                    <br>
                  </div>


                  <!-- <div class="col-md-6 mb-3">
                    <label for="" class="">FECHA DE LA ASISTENCIA MÉDICA</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta2['fecha_asistencia']; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">HORA DE LA ASISTENCIA MÉDICA</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta2['hora_asistencia']; ?>">
                  </div> -->
                  
                  <div class="col-md-12 mb-6">
                    <label for="" class="">OBSERVACIONES DE LA ASISTENCIA MÉDICA</label>
                    <textarea readonly placeholder="<?php echo $respuesta2['observaciones']; ?>" class="form-control" name="" id="" rows="5" cols="33" maxlength="1000"></textarea>
                    <br>
                  </div>


                  <div id="cabecera">
                    <div class="row alert div-title">
                      <h3 style="text-align:center">FECHA Y HORA DE ASISTENCIA</h3>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">FECHA DE LA ASISTENCIA MÉDICA</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta5['fecha_asistencia']; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">HORA DE LA ASISTENCIA MÉDICA</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta5['hora_asistencia']; ?>">
                  </div>


                  <div id="cabecera">
                    <div class="row alert div-title">
                      <h3 style="text-align:center">FECHA Y HORA DE REPROGRAMACIÓN</h3>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">FECHA DE LA ASISTENCIA MÉDICA</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta6['fecha_asistencia']; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">HORA DE LA ASISTENCIA MÉDICA</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta6['hora_asistencia']; ?>">
                  </div>

              
                  <div id="cabecera">
                    <div class="row alert div-title">
                      <h3 style="text-align:center">ASISTENCIA MÉDICA TURNADA</h3>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">TURNADA A LA SUBDIRECCIÓN DE EJECUCIÓN DE MEDIDAS</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta3['turnar_asistencia']; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">NÚMERO DE OFICIO MEDIANTE EL CUAL SE TURNA</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta3['oficio']; ?>">
                  </div>
                  

                  <div class="col-md-6 mb-3">
                    <label for="" class="">FECHA DE RECEPCIÓN DEL OFICIO</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta3['fecha_oficio']; ?>">
                  </div>


                   <div id="cabecera">
                    <div class="row alert div-title">
                      <h3 style="text-align:center">ASISTENCIA MÉDICA NOTIFICADA</h3>
                    </div>
                  </div>

                  
                  <div class="col-md-6 mb-3">
                    <label for="" class="">NOTIFICADA A LA SUBDIRECCIÓN DE ANÁLISIS DE RIESGO</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta4['notificar_subdireccion']; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">NÚMERO DE OFICIO MEDIANTE EL CUAL SE NOTIFICA</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta4['numero_oficio_notificacion']; ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class="">FECHA DE RECEPCIÓN DEL OFICIO</label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="<?php echo $respuesta4['fecha_oficio_notificacion']; ?>">
                  </div>


          
                
                  <!-- <div id="cabecera">
                    <div class="row alert div-title">
                      <h3 style="text-align:center">4.- REPROGRAMACIÓN DE LA ASISTENCIA MEDICA</h3>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class=""></label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="" class=""></label>
                    <input readonly class="form-control" id="" name="" placeholder="" type="text" value="">
                  </div> -->
            


              </form>
              </div>
        		</div>
    			</article>
    		</div>
    	</div>
  </div>
</div>
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
        <div class="contenedor">
          <a href="./panel_asistencias_por_completar.php" class="btn-flotante-regresar color-btn-success-gray">REGRESAR</a>
		    </div>


	</div>
</div>

</body>
</html>