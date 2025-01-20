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

$consulta7 = "SELECT* FROM seguimiento_asistencia WHERE seguimiento_asistencia.id_asistencia = '$id_asistencia_medica' ORDER BY seguimiento_asistencia.hora_registro DESC LIMIT 1";
$resultado7 = $mysqli->query($consulta7);
$respuesta7=$resultado7->fetch_assoc();



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
        <li><a href="#" class="active" onclick="location.href='./detalle_asistencia_completada.php?id_asistencia=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-address-card"></span><span class="tab-text">DETALLE ASISTENCIA MÉDICA</span></a></li>
      </ul>

    		<div class="secciones">
    			<article id="tab2">
            <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="./admin.php">MENÚ ASISTENCIAS MÉDICAS</a>
              <a href="./panel_asistencias_completadas.php">ASISTENCIAS MÉDICAS REGISTRADAS</a>
              <a href="./detalle_asistencia_completada.php?id_asistencia=<?php echo $id_asistencia_medica; ?>" class="actived">DETALLE ASISTENCIA MÉDICA</a>
            </div>

            
            <div class="container">
        			<div class="well form-horizontal">
              <form id="form" class="container well form-horizontal" action="save_instrumento.php?folio=<?php echo $fol_exp; ?>" method="POST" enctype="multipart/form-data">

              <div class="">
                <img style="float: left;" src="../image/FGJEM.png" width="50" height="50">
                <img style="float: right;" src="../image/ESCUDO.png" width="60" height="50">
                <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
              </div>

        				<div class="row">
                  <br>
                  <div id="cabecera">
                    <h2 style="text-align:center">ASISTENCIA MÉDICA: <?php echo $id_asistencia_medica; ?></h2>
                    <input style="display:none" id="etapa" value="<?php echo $respuesta1['etapa']; ?>"/>
                    <input style="display:none" id="servicio" value="<?php echo $respuesta1['servicio_medico']; ?>"/>
                  </div>

                <div id="solicitud" style="display:none">

                  <div id="cabecera">
                    <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                      <h3 style="text-align:center; color: #ddd;">INFORMACIÓN DE LA SOLICITUD</h3>
                    </div>
                  </div>

                  <div>
                    <table class="table table-bordered" width="100%" border="1" cellpadding="0" cellspacing="0" >

                      <tbody>
                        <tr>
                          <th style="text-align:left;">FOLIO DEL EXPEDIENTE DE PROTECCIÓN:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['folio_expediente']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">ID SUJETO:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['id_sujeto']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">ID ASISTENCIA MÉDICA:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['id_asistencia']; ?></td>
                        </tr>


                        <tr>
                          <th style="text-align:left;">FECHA DE SOLICITUD:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['fecha_solicitud']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">ID SERVIDOR PÚBLICO SOLICITANTE:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['id_servidor']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">NÚMERO DE OFICIO DE LA SOLICITUD:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['num_oficio']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">TIPO DE REQUERIMIENTO:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['tipo_requerimiento']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">SERVICIO MÉDICO:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['servicio_medico']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">OBSERVACIONES DE LA SOLICITUD</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['observaciones']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">ETAPA DE LA ASISTENCIA MÉDICA:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['etapa']; ?></td>
                        </tr>
                      </tbody>

                    </table>
                  </div>

                </div>

                <div id="solicitud_cancelada" style="display:none">

                  <div id="cabecera">
                    <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                      <h3 style="text-align:center; color: #ddd;">INFORMACIÓN DE LA SOLICITUD</h3>
                    </div>
                  </div>

                  <div>
                    <table class="table table-bordered" width="100%" border="1" cellpadding="0" cellspacing="0" >

                      <tbody>
                        <tr>
                          <th style="text-align:left;">FOLIO DEL EXPEDIENTE DE PROTECCIÓN:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['folio_expediente']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">ID SUJETO:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['id_sujeto']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">ID ASISTENCIA MÉDICA:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['id_asistencia']; ?></td>
                        </tr>


                        <tr>
                          <th style="text-align:left;">FECHA DE SOLICITUD:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['fecha_solicitud']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">ID SERVIDOR PÚBLICO SOLICITANTE:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['id_servidor']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">NÚMERO DE OFICIO DE LA SOLICITUD:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['num_oficio']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">TIPO DE REQUERIMIENTO:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['tipo_requerimiento']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">SERVICIO MÉDICO:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['servicio_medico']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">OBSERVACIONES DE LA SOLICITUD</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['observaciones']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">ETAPA DE LA ASISTENCIA MÉDICA:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['etapa']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">MOTIVO DE LA CANCELACIÓN:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta1['motivo_incidencia']; ?></td>
                        </tr>
                      </tbody>

                    </table>
                  </div>

                </div>

                <div id="unidad" style="display:none">

                  <div id="cabecera">
                    <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                      <h3 style="text-align:center; color: #ddd;">UNIDAD MÉDICA</h3>
                    </div>
                  </div>


                  <div>
                    <table class="table table-bordered" width="100%" border="1" cellpadding="0" cellspacing="0" >

                      <tbody>
                        <tr>
                          <th style="text-align:left;">TIPO DE INSTITUCIÓN:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta2['tipo_institucion']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">NOMBRE DE LA INSTITUCIÓN:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta2['nombre_institucion']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">MUNICIPIO DE LA INSTITUCIÓN:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta2['municipio_institucion']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">DOMICILIO DE LA UNSTITUCIÓN:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta2['domicilio_institucion']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">OBSERVACIONES DE LA ASISTENCIA MÉDICA:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta2['observaciones']; ?></td>
                        </tr>
                      </tbody>

                    </table>
                  </div>

                </div>

                <div id="fecha" style="display:none">

                  <div id="cabecera">
                    <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                      <h3 style="text-align:center; color: #ddd;">FECHA Y HORA DE LA ASISTENCIA MÉDICA</h3>
                    </div>
                  </div>

                  <div>
                    <table class="table table-bordered" width="100%" border="1" cellpadding="0" cellspacing="0" >

                      <tbody>
                        <tr>
                          <th style="text-align:left;">FECHA:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta5['fecha_asistencia']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">HORA:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta5['hora_asistencia']; ?></td>
                        </tr>
                      </tbody>

                    </table>
                  </div>
                  
                </div>

                <div id="reprogramacion" style="display:none">

                  <?php

                          $cl = "SELECT COUNT(*) as t FROM cita_asistencia WHERE id_asistencia = '$id_asistencia_medica'";
                          $rcl = $mysqli->query($cl);
                          $fcl = $rcl->fetch_assoc();

                          // echo $fcl['t'];

                          if ($fcl['t'] > 1){
                                
                                echo '
                                <div id="cabecera">
                                  <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                                    <h3 style="text-align:center; color: #ddd;">FECHA Y HORA DE REPROGRAMACIÓN</h3>
                                  </div>
                                </div>
                                ';

                                echo '
                                <div>
                                  <table class="table table-bordered" width="100%" border="1" cellpadding="0" cellspacing="0" >

                                    <tbody>
                                      <tr>
                                        <th style="text-align:left;">FECHA:</th>
                                        <td style="text-align:left; background-color: #fff;">'; echo $respuesta6['fecha_asistencia']; echo '</td>
                                      </tr>

                                      <tr>
                                        <th style="text-align:left;">HORA:</th>
                                        <td style="text-align:left; background-color: #fff;">'; echo $respuesta6['hora_asistencia']; echo '</td>
                                      </tr>
                                    </tbody>

                                  </table>
                                </div>
                                ';

                          } 

                  ?>

                </div>

                <div id="turnada" style="display:none">

                  <div id="cabecera">
                    <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                      <h3 style="text-align:center; color: #ddd;">ASISTENCIA MÉDICA TURNADA</h3>
                    </div>
                  </div>




                  <div>
                    <table class="table table-bordered" width="100%" border="1" cellpadding="0" cellspacing="0" >

                      <tbody>
                        <tr>

                          <?php

                          if ($respuesta1['servicio_medico'] == 'PSICOLÓGICO'){
                            echo '<th style="text-align:left;">TURNADA A LA SUBDIRECCIÓN DE ANÁLISIS DE RIESGO:</th>';
                          }
                          else{
                            echo '<th style="text-align:left;">TURNADA A LA SUBDIRECCIÓN DE EJECUCIÓN DE MEDIDAS:</th>';
                          }
                          ?>
                          

                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta3['turnar_asistencia']; ?></td>
                        </tr>

                        <?php

                              $turnada = $respuesta3['turnar_asistencia'];

                              if ($turnada == "SI"){

                                echo '
                                    <tr>
                                      <th style="text-align:left;">NÚMERO DE OFICIO MEDIANTE EL CUAL SE TURNA:</th>
                                      <td style="text-align:left; background-color: #fff;">'; echo $respuesta3['oficio']; echo '</td>
                                    </tr>

                                    <tr>
                                      <th style="text-align:left;">FECHA DE RECEPCIÓN DEL OFICIO:</th>
                                      <td style="text-align:left; background-color: #fff;">'; echo $respuesta3['fecha_oficio']; echo '</td>
                                    </tr>
                                ';

                              } 
                        ?>
                      </tbody>

                    </table>
                  </div>
                
                </div>

                <div id="notificada" style="display:none">

                  <div id="cabecera">
                    <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                      <h3 style="text-align:center; color: #ddd;">ASISTENCIA MÉDICA NOTIFICADA</h3>
                    </div>
                  </div>

                  <div>
                    <table class="table table-bordered" width="100%" border="1" cellpadding="0" cellspacing="0" >

                      <tbody>
                        <tr>
                          
                          <?php

                            if ($respuesta1['servicio_medico'] == 'PSICOLÓGICO'){
                              echo '<th style="text-align:left;">NOTIFICADA A LA SUBDIRECCIÓN DE EJECUCIÓN DE MEDIDAS:</th>';
                            }
                            else{
                              echo '<th style="text-align:left;">NOTIFICADA A LA SUBDIRECCIÓN DE ANÁLISIS DE RIESGO:</th>';
                            }

                          ?>
                          
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta4['notificar_subdireccion']; ?></td>

                        </tr>


                        <?php 
                        if ($respuesta1['servicio_medico'] == 'PSICOLÓGICO'){
                          echo '<tr>
                          <th style="text-align:left;">REQUIERE TRASLADO:</th>
                          <td style="text-align:left; background-color: #fff;">'; echo $respuesta4['requiere_traslado']; echo '</td>
                        </tr>';
                        }
                        ?>

                        <?php
                              $notificada = $respuesta4['notificar_subdireccion'];

                              if ($notificada == "SI"){

                                echo '
                                    <tr>
                                      <th style="text-align:left;">NÚMERO DE OFICIO MEDIANTE EL CUAL SE NOTIFICA:</th>
                                      <td style="text-align:left; background-color: #fff;">'; echo $respuesta4['numero_oficio_notificacion']; echo '</td>
                                    </tr>

                                    <tr>
                                      <th style="text-align:left;">FECHA DE RECEPCIÓN DEL OFICIO:</th>
                                      <td style="text-align:left; background-color: #fff;">'; echo $respuesta4['fecha_oficio_notificacion']; echo '</td>
                                    </tr>
                                ';

                              } 
                        ?>
                      </tbody>

                    </table>
                  </div>

                </div>

                <div id="seguimiento" style="display:none">

                  <div id="cabecera">
                    <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                      <h3 style="text-align:center; color: #ddd;">INFORMACIÓN DEL SEGUIMIENTO DE LA ASISTENCIA MÉDICA</h3>
                    </div>
                  </div>

                  <div>
                    <table class="table table-bordered" width="100%" border="1" cellpadding="0" cellspacing="0" >

                      <tbody>
                        <tr>
                          <th style="text-align:left;">TRASLADO REALIZADO:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta7['traslado_realizado']; ?></td>
                        </tr>

                        <?php
                              $traslado = $respuesta7['traslado_realizado'];
                              $se_presento = $respuesta7['se_presento'];
                              $reprogramar = $respuesta7['reprogramar'];

                              if ($traslado == "SI" && $se_presento == "SI"){

                                echo '
                                    <tr>
                                      <th style="text-align:left;">SE PRESENTÓ A LA ASISTENCIA MÉDICA:</th>
                                      <td style="text-align:left; background-color: #fff;">'; echo $respuesta7['se_presento']; echo '</td>
                                    </tr>

                                    <tr>
                                      <th style="text-align:left;">HOSPITALIZACIÓN:</th>
                                      <td style="text-align:left; background-color: #fff;">'; echo $respuesta7['hospitalizacion']; echo '</td>
                                    </tr>

                                    <tr>
                                      <th style="text-align:left;">DIAGNÓSTICO:</th>
                                      <td style="text-align:left; background-color: #fff;">'; echo $respuesta7['diagnostico']; echo '</td>
                                    </tr>

                                    <tr>
                                      <th style="text-align:left;">REQUIERE CITA DE SEGUIMIENTO:</th>
                                      <td style="text-align:left; background-color: #fff;">'; echo $respuesta7['cita_seguimiento']; echo '</td>
                                    </tr>

                                    <tr>
                                      <th style="text-align:left;">INFORME MÉDICO:</th>
                                      <td style="text-align:left; background-color: #fff;">'; echo $respuesta7['informe_medico']; echo '</td>
                                    </tr>
                                    
                                    <tr>
                                      <th style="text-align:left;">COMENTARIOS:</th>
                                      <td style="text-align:left; background-color: #fff;">'; echo $respuesta7['observaciones_seguimiento']; echo '</td>
                                    </tr>
                                ';

                              } else if ($traslado == "NO"){

                                echo '
                                    <tr>
                                      <th style="text-align:left;">ASISTENCIA MÉDICA REPROGRAMADA:</th>
                                      <td style="text-align:left; background-color: #fff;">'; echo $respuesta7['reprogramar']; echo '</td>
                                    </tr>

                                    <tr>
                                      <th style="text-align:left;">MOTIVO:</th>
                                      <td style="text-align:left; background-color: #fff;">'; echo $respuesta7['motivo']; echo '</td>
                                    </tr>

                                    <tr>
                                      <th style="text-align:left;">COMENTARIOS:</th>
                                      <td style="text-align:left; background-color: #fff;">'; echo $respuesta7['observaciones_seguimiento']; echo '</td>
                                    </tr>
                                ';


                              } else if ($traslado == "SI" && $se_presento == "NO"){

                                echo '
                                <tr>
                                  <th style="text-align:left;">SE PRESENTÓ A LA ASISTENCIA MÉDICA:</th>
                                  <td style="text-align:left; background-color: #fff;">'; echo $respuesta7['se_presento']; echo '</td>
                                </tr>

                                <tr>
                                  <th style="text-align:left;">ASISTENCIA MÉDICA REPROGRAMADA:</th>
                                  <td style="text-align:left; background-color: #fff;">'; echo $respuesta7['reprogramar']; echo '</td>
                                </tr>

                                <tr>
                                  <th style="text-align:left;">MOTIVO:</th>
                                  <td style="text-align:left; background-color: #fff;">'; echo $respuesta7['motivo']; echo '</td>
                                </tr>

                                <tr>
                                  <th style="text-align:left;">COMENTARIOS:</th>
                                  <td style="text-align:left; background-color: #fff;">'; echo $respuesta7['observaciones_seguimiento']; echo '</td>
                                </tr>
                            ';

                              }
                        ?>
                      </tbody>

                    </table>
                  </div>
                
                </div>
















                <div id="seguimiento_contencion" style="display:none">

                  <div id="cabecera">
                    <div style="background: #63696D repeat-x fixed; color: #000; font-weight: 900;">
                      <h3 style="text-align:center; color: #ddd;">INFORMACIÓN DEL SEGUIMIENTO DE LA ASISTENCIA MÉDICA</h3>
                    </div>
                  </div>

                  <div>
                    <table class="table table-bordered" width="100%" border="1" cellpadding="0" cellspacing="0" >

                      <tbody>
                        <tr>
                          <th style="text-align:left;">TRASLADO REALIZADO:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta7['traslado_realizado']; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">INFORME MÉDICO:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta7['informe_medico']; ?></td>
                        </tr>
                                    
                        <tr>
                          <th style="text-align:left;">COMENTARIOS:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $respuesta7['observaciones_seguimiento']; ?></td>
                        </tr>

                      </tbody>

                    </table>
                  </div>
                
                </div>







                <div id="tratamiento" style="display:none">
                        <?php
                          $cl = "SELECT COUNT(*) 
                          as t FROM tratamiento_medico 
                          WHERE id_asistencia = '$id_asistencia_medica'";
                          
                          $rcl = $mysqli->query($cl);
                          $fcl = $rcl->fetch_assoc();
                          // echo $fcl['t'];
                          if ($fcl['t'] == 0){

                                echo "
                                      <div id='cabecera'>
                                        <div style='background: #63696D repeat-x fixed; color: #000; font-weight: 900;'>
                                          <h3 style='text-align:center; color: #ddd;'>TRATAMIENTO MÉDICO</h3>
                                        </div>
                                      </div>
            

                                      <div>
                                        <table class='table table-bordered' width='100%'' border='1' cellpadding='0' cellspacing='0'>

                                          <tbody>
                                            <tr>
                                              <th style='text-align:center; color: #ddd; font-size: 14px'>NO HAY MEDICAMENTOS REGISTRADOS PARA LA ASISTENCIA MÉDICA: $id_asistencia_medica</th>
                                            </tr>
                                          </tbody>

                                        </table>
                                      </div>
                                      ";
                          } else{
                                echo "
                                      <div id='cabecera'>
                                        <div style='background: #63696D repeat-x fixed; color: #000; font-weight: 900;'>
                                          <h3 style='text-align:center; color: #ddd;'>TRATAMIENTO MÉDICO Y MEDICAMENTOS REGISTRADOS</h3>
                                        </div>
                                      </div>

                                      <br>

                              <div class=''>
                                  <div class='row'>
                                      <div class='col-lg-12'>
                                            <div class='table-responsive'>

                                                <table class='table table-bordered' width='100%' border='1' cellpadding='0' cellspacing='0' id='table-instrumento'>
                                                  <thead>
                                                      <tr>
                                                          <th style='text-align:center; font-size: 14px;'>NO.</th>
                                                          <th style='text-align:center; font-size: 14px;'>ADQUISICIÓN</th>
                                                          <th style='text-align:center; font-size: 14px;'>NOMBRE</th>
                                                          <th style='text-align:center; font-size: 14px;'>CANTIDAD</th>
                                                          <th style='text-align:center; font-size: 14px;'>PRESENTACIÓN</th>
                                                          <th style='text-align:center; font-size: 14px;'>CONTENIDO</th>
                                                          <th style='text-align:center; font-size: 14px;'>INDICACIONES</th>
                                                          <th style='text-align:center; font-size: 14px;'>NÚMERO OFICIO</th>
                                                          <th style='text-align:center; font-size: 14px;'>SERVIDOR PÚBLICO</th>
                                                      </tr>
                                                  </thead>
                                
                                ";
                              }

                        ?>

                                                  <tbody>
                                                    <?php
                                                    $contador = 0;
                                                    $sentencia1 = "SELECT*
                                                    FROM tratamiento_medico
                                                    WHERE tratamiento_medico.id_asistencia = '$id_asistencia_medica'
                                                    ORDER BY nombre_medicamento ASC";


                                                    $var_resultado = $mysqli->query($sentencia1);

                                                    while ($var_fila=$var_resultado->fetch_array())
                                                    {
                                                      $contador = $contador + 1;
                                                      
                        
                                                          echo "<tr>";
                                                          echo "<td style='background-color: #fff; text-align:center'>"; echo $contador; echo "</td>";
                                                          echo "<td style='background-color: #fff; text-align:center'>"; echo $var_fila['adquisicion']; echo "</td>";
                                                          echo "<td style='background-color: #fff; text-align:center'>"; echo $var_fila['nombre_medicamento']; echo "</td>";
                                                          echo "<td style='background-color: #fff; text-align:center'>"; echo $var_fila['cantidad']; echo "</td>";
                                                          echo "<td style='background-color: #fff; text-align:center'>"; echo $var_fila['presentacion']; echo "</td>";
                                                          echo "<td style='background-color: #fff; text-align:center'>"; echo $var_fila['contenido']; echo "</td>";
                                                          echo "<td style='background-color: #fff; text-align:center'>"; echo $var_fila['indicaciones']; echo "</td>";
                                                          echo "<td style='background-color: #fff; text-align:center'>"; echo $var_fila['numero_oficio']; echo "</td>";
                                                          echo "<td style='background-color: #fff; text-align:center'>"; echo $var_fila['nombre_recibe']; echo "</td>";
                                                          echo "</tr>";
                                                      }
                                                  ?>
                                                  </tbody>
                                                </table>

                                                <!-- <div id="mensaje" style="display:none">
                                                  <h6 style="text-align:center; color: #5F6D6B;" class="modal-title text-center">Sistema Informático del Programa de Protección a Sujetos que Intervienen en el Procedimiento Penal o de Extinción de Dominio (SIPPSIPPED)</h6>
                                                </div> -->

                                            </div>
                                      </div>
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
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
        <div class="contenedor">
          <a href="./panel_asistencias_completadas.php" class="btn-flotante-regresar color-btn-success-gray">REGRESAR</a>
        </div>

        <div class="contenedor">
          <a class="btn-flotante-imprimir-asistencia" style="text-align:center;" href="javascript:imprimirSeleccion('form')"><img src='../image/asistencias_medicas/print.png' width='60' height='60'></a>
		    </div>
	</div>
</div>

</body>
</html>



<script language="Javascript">
function imprimirSeleccion(nombre) {
var ficha = document.getElementById(nombre);
var ventimp = window.open(' ', 'popimpr');
ventimp.document.write( ficha.innerHTML );
ventimp.document.close();
ventimp.print( );
ventimp.close();
}
</script>



<script type="text/javascript">

  var etapa = document.getElementById('etapa').value;
  var servicio = document.getElementById('servicio').value;
  // console.log (servicio);

      // if (servicio === "PSICOLÓGICO"){      
      //     document.getElementById("seguimiento").style.display = "none";
      //     document.getElementById("tratamiento").style.display = "none";
      // } 


  
      if (etapa === "SOLICITADA"){      
          document.getElementById("solicitud").style.display = "";
          // document.getElementById("mensaje").style.display = "";
      } 

      if (etapa === "CANCELADA"){      
          document.getElementById("solicitud_cancelada").style.display = "";
          // document.getElementById("mensaje").style.display = "";
      } 

      if (etapa === "AGENDADA"){
          document.getElementById("solicitud").style.display = "";
          document.getElementById("unidad").style.display = "";
          document.getElementById("fecha").style.display = "";
      }

      if (etapa === "TURNADA"){
          document.getElementById("solicitud").style.display = "";
          document.getElementById("unidad").style.display = "";
          document.getElementById("fecha").style.display = "";
          document.getElementById("turnada").style.display = "";
      }

      if (etapa === "NOTIFICADA"){
          document.getElementById("solicitud").style.display = "";
          document.getElementById("unidad").style.display = "";
          document.getElementById("fecha").style.display = "";
          document.getElementById("turnada").style.display = "";
          document.getElementById("notificada").style.display = "";
      }

      if (etapa === "ASISTENCIA MÉDICA COMPLETADA"){
          document.getElementById("solicitud").style.display = "";
          document.getElementById("unidad").style.display = "";
          document.getElementById("fecha").style.display = "";
          document.getElementById("turnada").style.display = "";
          document.getElementById("notificada").style.display = "";
      }


      if (servicio != "PSICOLÓGICO" && etapa === "ASISTENCIA MÉDICA COMPLETADA"){
          document.getElementById("seguimiento").style.display = "";
          document.getElementById("tratamiento").style.display = "";
      } 
      
      if (servicio === "PSICOLÓGICO" && etapa === "ASISTENCIA MÉDICA COMPLETADA"){
          document.getElementById("seguimiento_contencion").style.display = "";
      }


      if (etapa === "ASISTENCIA MÉDICA REPROGRAMADA"){
          document.getElementById("solicitud").style.display = "";
          document.getElementById("unidad").style.display = "";
      }

      if (etapa === "REPROGRAMADA AGENDADA"){
          document.getElementById("solicitud").style.display = "";
          document.getElementById("unidad").style.display = "";
          document.getElementById("fecha").style.display = "";
          document.getElementById("reprogramacion").style.display = "";
      }

      if (etapa === "REPROGRAMADA TURNADA"){
          document.getElementById("solicitud").style.display = "";
          document.getElementById("unidad").style.display = "";
          document.getElementById("fecha").style.display = "";
          document.getElementById("reprogramacion").style.display = "";
          document.getElementById("turnada").style.display = "";
      }

      if (etapa === "REPROGRAMADA NOTIFICADA"){
          document.getElementById("solicitud").style.display = "";
          document.getElementById("unidad").style.display = "";
          document.getElementById("fecha").style.display = "";
          document.getElementById("reprogramacion").style.display = "";
          document.getElementById("turnada").style.display = "";
          document.getElementById("notificada").style.display = "";
      }


      // console.log (etapa);


</script>
