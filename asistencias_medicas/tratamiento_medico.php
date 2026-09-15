<?php
/*require 'conexion.php';*/
error_reporting(0);
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



// $id_asistencia_medica = 'YHA-001-2026-AM033';


// echo $id_asistencia_medica;

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
  <title>TRATAMIENTO MÉDICO</title>

  <link rel="stylesheet" href="../css/instrumento_adaptabilidad.css">
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href='css/bootstrap.min.css' rel='stylesheet'>
  <link href='css/fullcalendar.min.css' rel='stylesheet' />
  <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
  <link href='css/personalizado.css' rel='stylesheet' />

  <!-- <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/expediente.css">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/expediente.js"></script>
  <script src="../js/solicitud.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="../css/registrosolicitud1.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>-->
  <link rel="stylesheet" href="../css/main2.css">
  <link rel="stylesheet" href="../css/tarjeta_medicamento.css"> 
  







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
            <a href="../consultores/admin.php">INICIO</a>
            <a href="../asistencias_medicas/admin.php">MENÚ ASISTENCIAS MÉDICAS</a>
            <a class="actived" href="./tratamiento_medico.php">TRATAMIENTO MÉDICO</a>
          </div>
          

            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a href="./tratamiento_medico.php" class="active"><span class="far fa-regular fa-bell"></span><span class="tab-text">TRATAMIENTO MÉDICO</span></a></li>
              </ul>

              <?php
              $consulta_am = "SELECT COUNT(*) as total
                  FROM solicitud_asistencia

                  JOIN agendar_asistencia 
                  ON solicitud_asistencia.id_asistencia = agendar_asistencia.id_asistencia 

                  JOIN cita_asistencia
                  ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia

                  JOIN seguimiento_asistencia
                  ON solicitud_asistencia.id_asistencia = seguimiento_asistencia.id_asistencia 

                  AND seguimiento_asistencia.traslado_realizado = 'SI'
                  AND seguimiento_asistencia.se_otorgo = 'SI'
                  AND solicitud_asistencia.servicio_medico != 'MÉDICO' 
                  AND solicitud_asistencia.servicio_medico != 'SANITARIO' 
                  AND solicitud_asistencia.servicio_medico != 'PSICOLÓGICO'
                  AND solicitud_asistencia.etapa = 'ASISTENCIA MÉDICA COMPLETADA'
                  WHERE cita_asistencia.fecha_asistencia BETWEEN DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) 
                  AND DATE_ADD(CURDATE(), INTERVAL (7 - WEEKDAY(CURDATE())) DAY)
              ";
              $consulta_count = $mysqli->query($consulta_am);
              $row_count=$consulta_count->fetch_assoc();
              $resultado_count = $row_count['total'];
              if ($resultado_count <= 0){
              ?>

                      <div class="row">
                        <div id="cabecera">
                          <div class="row alert div-title">
                            <?php
                            $fecha = new DateTime(); // Fecha y hora actual
                            $dia_semana = $fecha->format('N'); 
                            $fecha->modify('-' . ($dia_semana - 1) . ' days');
                            // echo $fecha->format('d-m-Y');
                            $ultimoDiaSemana = date('d-m-Y', strtotime('next Monday'));
                            // echo $ultimoDiaSemana;
                            ?>

                            <h3 style='text-align:center'>¡NO HAY ASISTENCIAS MÉDICAS COMPLETADAS! </h3>
                            <h3 style='text-align:center'>DENTRO DEL PERIODO: <?php echo $fecha->format('d-m-Y'); ?> AL  <?php echo $ultimoDiaSemana; ?> </h3>
                          </div>
                        </div>
                      </div>



              <?php
              }
              ?>
              <?php
              if ($resultado_count > 0){
              ?>
              


              <form class="container well form-horizontal" enctype="multipart/form-data">
              
                      <div class="row">
                        <div id="cabecera">
                          <div class="row alert div-title">
                            <?php
                            $fecha = new DateTime(); // Fecha y hora actual
                            $dia_semana = $fecha->format('N'); 
                            $fecha->modify('-' . ($dia_semana - 1) . ' days');
                            // echo $fecha->format('d-m-Y');
                            $ultimoDiaSemana = date('d-m-Y', strtotime('next Monday'));
                            // echo $ultimoDiaSemana;
                            ?>

                            <h3 style='text-align:center'>ASISTENCIAS MÉDICAS COMPLETADAS </h3>
                            <h3 style='text-align:center'>DEL <?php echo $fecha->format('d-m-Y'); ?> AL  <?php echo $ultimoDiaSemana; ?> </h3>
                          </div>
                        </div>
                      <div>

                      <table class="table table-bordered" id="table-instrumento">
                        <thead>
                            <tr>

                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">ID ASISTENCIA MÉDICA</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">ID SUJETO</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">SERVICIO MÉDICO</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">FECHA ASISTENCIA</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">MEDICAMENTOS REGISTRADOS</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">TRATAMIENTO MÉDICO</th>
                            </tr>
                        </thead>


<tbody>
                                                <?php

                                                    $count = 0;

                                                    $query = "SELECT solicitud_asistencia.id_asistencia, solicitud_asistencia.id_sujeto, solicitud_asistencia.servicio_medico,
                                                              cita_asistencia.fecha_asistencia, solicitud_asistencia.folio_expediente, cita_asistencia.hora_asistencia,
                                                              agendar_asistencia.nombre_institucion, solicitud_asistencia.etapa
                                                              FROM solicitud_asistencia

                                                              JOIN agendar_asistencia 
                                                              ON solicitud_asistencia.id_asistencia = agendar_asistencia.id_asistencia 

                                                              JOIN cita_asistencia
                                                              ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia

                                                              JOIN seguimiento_asistencia
                                                              ON solicitud_asistencia.id_asistencia = seguimiento_asistencia.id_asistencia 

                                                              AND seguimiento_asistencia.traslado_realizado = 'SI'
                                                              AND seguimiento_asistencia.se_otorgo = 'SI'
                                                              AND solicitud_asistencia.servicio_medico != 'MÉDICO' 
                                                              AND solicitud_asistencia.servicio_medico != 'SANITARIO' 
                                                              AND solicitud_asistencia.servicio_medico != 'PSICOLÓGICO'
                                                              AND solicitud_asistencia.etapa = 'ASISTENCIA MÉDICA COMPLETADA'
                                                              WHERE cita_asistencia.fecha_asistencia BETWEEN DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) 
                                                              AND DATE_ADD(CURDATE(), INTERVAL (7 - WEEKDAY(CURDATE())) DAY)
                            

                                                              ORDER BY cita_asistencia.fecha_asistencia  DESC
                                                    ";
                                                    
                                                    
                                                    $result_solicitud = mysqli_query($mysqli, $query);
                                                    global $id_asistencia_m;

                                                    while($row = mysqli_fetch_array($result_solicitud)) {

                                                    $originalDate = $row['fecha_asistencia'];
                                                    $date = date("d/m/Y", strtotime($originalDate));

                                                    $id_asistencia_m = $row['id_asistencia'];

                                                    $consulta4 = "SELECT COUNT(*) as total
                                                                FROM tratamiento_medico
                                                                WHERE tratamiento_medico.id_asistencia = '$id_asistencia_m'
                                                                ORDER BY tratamiento_medico.id ASC";

                                                                $var_resultado4 = $mysqli->query($consulta4);
                

                                                    
                                                        
                                                ?>
                                                    <?php $count = $count + 1 ?>
                                                        <tr>

                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">
                                                              <a style="text-align:center; text-decoration: none; color: #5F6D6B; text-decoration: underline;" href="" data-toggle="modal" data-target="#detalleModal<?php echo $id_asistencia_m;?>"><span style="text-align:center;"><?php echo $row['id_asistencia']; ?></span></a>
                                                            </td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['id_sujeto']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['servicio_medico']?></td>
                                                            
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $date; ?></td>

                                                            <?php 
                                                            
                                                            while ($var_fila4=$var_resultado4->fetch_array())

                                                                {
                                                                  
                                                                echo "<td style='text-align:center; font-size: 15px; font-weight: bold; border: 2px solid #97897D;'>"; echo $var_fila4['total']; echo "</td>";
                                                                

                                                                }

                                                            ?>


                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">

                                                                <?php
                                                                // Notas 
                                                                $nota_agregar = "Agregar medicamento";
                                                                $nota_archivo = "Medicamentos registrados";
                                                                ?>

                                                                <?php
                                                                $consulta_total_m = "SELECT COUNT(*) as total
                                                                FROM tratamiento_medico
                                                                WHERE tratamiento_medico.id_asistencia = '$id_asistencia_m'";

                                                                $r_consulta_total_m = $mysqli->query($consulta_total_m);
                                                                $row_consulta_total_m=$r_consulta_total_m->fetch_assoc();
                                                                $total_m = $row_consulta_total_m['total'];
                                                                ?>

                                                                <!-- Primer Enlace -->
                                                                <a type="button" data-toggle="modal" data-target="#registrarModal<?php echo $id_asistencia_m;?>" class="btn btn-outline-secondary enlace-nota btn-agregar" data-nota="<?php echo $nota_agregar; ?>">
                                                                    <i class="fas fa-plus"></i>
                                                                </a>
                                                                <?php 
                                                                if ($total_m > 0){
                                                                ?>                    
                                                                <!-- Segundo Enlace -->
                                                                <a type="button" data-toggle="modal" data-target="#medicamentoModal<?php echo $id_asistencia_m;?>" class="btn btn-outline-secondary enlace-nota btn-historial" data-nota="<?php echo $nota_archivo; ?>">
                                                                    <i class="fas fa-file-medical"></i>
                                                                </a>
                                                                <?php 
                                                                }
                                                                ?> 
                                                                <!-- Contenedor para la -->
                                                                <div id="tooltip-flotante" style="display:none; position:absolute; background:#222; color:#fff; padding:6px 12px; border-radius:4px; pointer-events:none; font-family:sans-serif; font-size:13px; z-index:9999;"></div>

                                                            </td>



                                                        </tr>






                                                        










                                                        <!-- INICIO Modal -->
                                                        <div class="modal" id="detalleModal<?php echo $id_asistencia_m;?>" role="dialog">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                  
                                                                  <div id="">

                                                                    <div class="modal-header">
                                                                      <div class="">
                                                                          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                                          <img style="float: left;" src="../image/FGJEM.png" width="50" height="50">
                                                                          <img style="float: right;" src="../image/ESCUDO.png" width="60" height="50">
                                                                          <h4 style="text-align:center; color: #030303;"><br>Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento Penal o de Extinción de Dominio</h4>
                                                                      </div>
                                                                      
                                                                    </div>
                                                                    <!-- INICIO MODAL BODY -->
                                                                    <div class="modal-body">
                                                                      <p style="text-align:center; font-size: 18px; color:#5F6D6B;">ASISTENCIA MÉDICA</p>
                                                    
                                                                      <br>

                                                                      <form>


                                                                        <div style="display: flex; justify-content: center; align-items: center; border-radius: 10px; background: #5F6D6B; height: 40px; width: 100%; box-shadow: 5px 5px 10px 2px rgba(0, 0, 0, 0.3);">
                                                                            <h3 style="text-align:center; color: #ede7e7ff; font-size: 18px;">DATOS DEL SUJETO PROTEGIDO</h3>
                                                                        </div>
                                                                        <br>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>ID SUJETO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['id_sujeto']?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>FOLIO DEL EXPEDIENTE DE PROTECCIÓN:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['folio_expediente']?>">
                                                                        </div>
                                                                        <div style="display: flex; justify-content: center; align-items: center; border-radius: 10px; background: #5F6D6B; height: 40px; width: 100%; box-shadow: 5px 5px 10px 2px rgba(0, 0, 0, 0.3);">
                                                                            <h3 style="text-align:center; color: #ede7e7ff; font-size: 18px;">INFORMACIÓN DE LA ASISTENCIA MÉDICA</h3>
                                                                        </div>
                                                                        <br>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>ID ASISTENCIA MÉDICA:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['id_asistencia']?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>FECHA ASISTENCIA:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $date?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>HORA ASISTENCIA:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['hora_asistencia']?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>SERVICIO MÉDICO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['servicio_medico']?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>UNIDAD MÉDICA:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['nombre_institucion']?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>ETAPA ASISTENCIA MÉDICA</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['etapa']?>">
                                                                        </div>
                                                                        <div style="display: flex; justify-content: center; align-items: center; border-radius: 10px; background: #5F6D6B; height: 40px; width: 100%; box-shadow: 5px 5px 10px 2px rgba(0, 0, 0, 0.3);">
                                                                            <h3 style="text-align:center; color: #ede7e7ff; font-size: 18px;">SEGUIMIENTO DE LA ASISTENCIA MÉDICA</h3>
                                                                        </div>
                                                                        <br>
                                                                        <?php 
                                                                            $consulta_seguimiento = "SELECT*
                                                                            FROM seguimiento_asistencia
                                                                            WHERE id_asistencia = '$id_asistencia_m'";

                                                                            $resultado_seguimiento = $mysqli->query($consulta_seguimiento);
                                                                            $r_seguimiento = $resultado_seguimiento->fetch_assoc();
                                                                            $seguimiento = $r_seguimiento['traslado_realizado'];
                                                                        ?>

                                                                        <div class="col-md-6 mb-3">
                                                                          <label>HOSPITALIZACIÓN</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $r_seguimiento['hospitalizacion']; ?>">
                                                                        </div> 
                                                                        <div class="col-md-6 mb-3">
                                                                          <label> REQUIERE CITA DE SEGUIMIENTO</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $r_seguimiento['cita_seguimiento']; ?>">
                                                                        </div>
                                                                        <?php
                                                                        if ( $r_seguimiento['diagnostico'] != ""){
                                                                        ?> 
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>DIAGNÓSTICO</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $r_seguimiento['diagnostico']; ?>">
                                                                        </div>
                                                                        <?php
                                                                        }
                                                                        ?>                                                                              

                                                                        <div class="col-md-6 mb-3">
                                                                          <label>INFORME MÉDICO</label>
                                                                          <textarea style="font-size: 14px;" readonly class="form-control" type="text" rows="5" cols="33" placeholder="<?php echo $r_seguimiento['informe_medico']; ?>"></textarea>
                                                                        </div>                                                       



                                                                        
                                                                      </form>

                                                                    </div>
                                                                    <!-- FIN MODAL BODY -->


                                                                  </div>

                                                                  <div class="modal-footer">
                                                                        <button type="button" class="btn-danger btn-lg" data-dismiss="modal">
                                                                          Cerrar
                                                                        </button>
                                                                        <!-- <button type="submit" class="btn-success btn-lg" >
                                                                          Guardar
                                                                        </button> -->

                                                                  </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FIN Modal -->













                                                        <!-- INICIO Modal -->
                                                        <div class="modal" id="registrarModal<?php echo $id_asistencia_m;?>" role="dialog">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                  
                                                                  <div id="">

                                                                    <div class="modal-header">

                                                                      <div class="">
                                                                          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                                          <img style="float: left;" src="../image/FGJEM.png" width="50" height="50">
                                                                          <img style="float: right;" src="../image/ESCUDO.png" width="60" height="50">
                                                                          <h4 style="text-align:center; color: #030303;"><br>Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento Penal o de Extinción de Dominio</h4>
                                                                      </div>
                                                                      
                                                                    </div>
                                                                    
                                                                    <!-- INICIO MODAL BODY -->
                                                                    <div class="modal-body">
                                                                      <p style="text-align:center; font-size: 18px; color:#5F6D6B;">TRATAMIENTO MÉDICO</p>
                                                    
                                                                      <br>



                                                                    <form method="POST" action="./guardar_tratamiento_medico.php">

                                                                        <div style="display: flex; justify-content: center; align-items: center; border-radius: 10px; background: #5F6D6B; height: 40px; width: 100%; box-shadow: 5px 5px 10px 2px rgba(0, 0, 0, 0.3);">
                                                                          <h3 style="text-align:center; color: #ede7e7ff; font-size: 18px;">INFORMACIÓN DE LA ASISTENCIA MÉDICA</h3>
                                                                        </div>
                                                                        <br>

                                                                        <div class="col-md-6 mb-3">
                                                                          <label>ID ASISTENCIA MÉDICA:</label>
                                                                          <input type="text" style="font-size: 14px;" readonly class="form-control" id="id_asistencia" name="id_asistencia" value="<?php echo $row['id_asistencia']?>">
                                                                        </div>

                                                                        <div class="col-md-6 mb-3">
                                                                          <label>ID SUJETO:</label>
                                                                          <input type="text" style="font-size: 14px;" readonly class="form-control" id="id_sujeto" name="id_sujeto" value="<?php echo $row['id_sujeto']?>">
                                                                        </div>

                                                                        <div style="display: flex; justify-content: center; align-items: center; border-radius: 10px; background: #5F6D6B; height: 40px; width: 100%; box-shadow: 5px 5px 10px 2px rgba(0, 0, 0, 0.3);">
                                                                          <h3 style="text-align:center; color: #ede7e7ff; font-size: 18px;">REGISTRAR MEDICAMENTO</h3>
                                                                        </div>
                                                                        <br>

                                                                        <div class="col-md-6 mb-3" style="display: none;">
                                                                          <label>ID SERVIDOR PÚBLICO:</label>
                                                                          <input type="text" class="form-control"  id="id_servidor" name="id_servidor" readonly value="<?php echo $id_servidor_ini;?>">
                                                                        </div>                                                                        
                                                                        

                                                                        
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>NOMBRE DEL MEDICAMENTO:</label>
                                                                          <input placeholder="NOMBRE" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="nombre_medicamento" name="nombre_medicamento" required value="">
                                                                        </div>

                                                                        <div class="col-md-6 mb-3">
                                                                          <label>GRAMAJE:</label>
                                                                          <input placeholder="EJEMPLO: 500MG" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="gramaje" name="gramaje" required value="">
                                                                        </div>

                                                                         <div class="col-md-6 mb-3">
                                                                          <label>CANTIDAD DE LA DOSIS:</label>
                                                                          <select autocomplete="off" class="form-control" id="cantidad_dosis" name="cantidad_dosis" required>
                                                                              <option disabled selected value="">EJEMPLO: 1 TABLETA</option>
                                                                              <option value="1">1</option>
                                                                              <option value="2">2</option>
                                                                              <option value="3">3</option>
                                                                              <option value="4">4</option>
                                                                              <option value="5">5</option>
                                                                              <option value="10">10</option>
                                                                              <option value="15">15</option>
                                                                              <option value="20">20</option>
                                                                              <option value="25">25</option>
                                                                              <option value="30">30</option>
                                                                          </select>
                                                                        </div>


                                                                        <div class="col-md-6 mb-3">
                                                                          <label>DESCRIPCIÓN:</label>
                                                                          <select autocomplete="off" class="form-control" id="descripcion_dosis" name="descripcion_dosis" required>
                                                                              <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                                                                              <option value="TABLETA">TABLETA</option>
                                                                              <option value="CAPSULA">CAPSULA</option>
                                                                              <option value="GOTAS">GOTAS</option>
                                                                              <option value="CUCHARADA">CUCHARADA</option>
                                                                              <option value="MILILITROS">MILILITROS</option>
                                                                              <option value="PARCHE">PARCHE</option>
                                                                              <option value="AMPOLLETA">AMPOLLETA</option>
                                                                              <option value="JERINGA">JERINGA</option>
                                                                              <option value="DISPAROS">DISPAROS</option>
                                                                              <option value="SOBRE">SOBRE</option>
                                                                              <option value="SUERO">SUERO</option>
                                                                              <option value="APLICACIÓN">APLICACIÓN</option>
                                                                              <option value="TAPA">TAPA</option>
                                                                          </select>
                                                                        </div>

                                                                       <div class="col-md-6 mb-3">
                                                                          <label>PERIODO DE LA DOSIS:</label>
                                                                          <select autocomplete="off" class="form-control" id="periodo_dosis" name="periodo_dosis" required>
                                                                              <option disabled selected value="">EJEMPLO: CADA 8 HORAS</option>
                                                                              <option value="1">1</option>
                                                                              <option value="2">2</option>
                                                                              <option value="3">3</option>
                                                                              <option value="4">4</option>
                                                                              <option value="5">5</option>
                                                                              <option value="6">6</option>
                                                                              <option value="8">8</option>
                                                                              <option value="10">10</option>
                                                                              <option value="12">12</option>
                                                                              <option value="24">24</option>
                                                                          </select>
                                                                        </div>



                                                                        <div class="col-md-6 mb-3">
                                                                          <label>TIEMPO:</label>
                                                                          <select autocomplete="off" class="form-control" id="tiempo_periodo" name="tiempo_periodo" required>
                                                                              <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                                                                              <option value="HORAS">HORAS</option>
                                                                              <option value="DIAS">DIAS</option>
                                                                              <option value="MESES">MESES</option>
                                                                          </select>
                                                                        </div>


                                                                        
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>TEMPORALIDAD DE LA DOSIS:</label>
                                                                          <select autocomplete="off" class="form-control" id="duracion_dosis" name="duracion_dosis" required>
                                                                              <option disabled selected value="">EJEMPLO: POR 5 DIAS</option>
                                                                              <option value="1">1</option>
                                                                              <option value="2">2</option>
                                                                              <option value="3">3</option>
                                                                              <option value="4">4</option>
                                                                              <option value="5">5</option>
                                                                              <option value="6">6</option>
                                                                              <option value="7">7</option>
                                                                              <option value="8">8</option>
                                                                              <option value="9">9</option>
                                                                              <option value="10">10</option>
                                                                              <option value="10">11</option>
                                                                              <option value="15">15</option>
                                                                              <option value="15">18</option>
                                                                              <option value="20">20</option>                                                                              
                                                                          </select>
                                                                        </div>



                                                                        <div class="col-md-6 mb-3">
                                                                          <label>TIEMPO:</label>
                                                                          <select autocomplete="off" class="form-control" id="tiempo_duracion" name="tiempo_duracion" required>
                                                                              <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                                                                              <option value="DIAS">DIAS</option>
                                                                              <option value="MESES">MESES</option>
                                                                              <option value="AÑOS">AÑOS</option>
                                                                          </select>
                                                                        </div>



                                                                        <div class="col-md-6 mb-3">
                                                                          <label>VÍA DE ADMINISTRACIÓN:</label>
                                                                          <select autocomplete="off" class="form-control" id="via_administracion" name="via_administracion" required>
                                                                              <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                                                                              <option value="ORAL">ORAL</option>
                                                                              <option value="SUBLINGUAL">SUBLINGUAL</option>
                                                                              <option value="RECTAL">RECTAL</option>
                                                                              <option value="INTRAVENOSA">INTRAVENOSA</option>
                                                                              <option value="INTRAMUSCULAR">INTRAMUSCULAR</option>
                                                                              <option value="CUTÁNEA">CUTÁNEA</option>
                                                                              <option value="OFTÁLMICA">OFTÁLMICA</option>
                                                                              <option value="NASAL">NASAL</option>
                                                                              <option value="VAGINAL">VAGINAL</option>
                                                                          </select>
                                                                        </div>

                                                                        <div class="col-md-6 mb-3">
                                                                          <label>HORA DE INICIO DEL TRATAMIENTO:</label>
                                                                          <input type="time" id="hora_inicio" name="hora_inicio" step="3600" required class="form-control">
                                                                          <!-- <input placeholder="" autocomplete="off" type="time" class="form-control" id="hora_inicio_tratamiento" name="hora_inicio_tratamiento" required value> -->
                                                                        </div>

                                                                        <div class="col-md-6 mb-3">
                                                                          <label>FECHA DE INICIO DEL TRATAMIENTO:</label>
                                                                          <input placeholder="" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="date" class="form-control"  id="fecha_inicio_tratamiento" name="fecha_inicio_tratamiento" required value>
                                                                        </div>




                                                                        <?php 
                                                                        $consulta_total_recomendaciones = "SELECT COUNT(*) as total
                                                                        FROM tratamiento_medico
                                                                        WHERE tratamiento_medico.id_asistencia = '$id_asistencia_m'";

                                                                        $r_consulta_total_r = $mysqli->query($consulta_total_recomendaciones);
                                                                        $row_consulta_total_r=$r_consulta_total_r->fetch_assoc();
                                                                        $total_r = $row_consulta_total_r['total'];

                                                                        if ($total_r <= 0) { 
                                                                        ?>

                                                                        <div class="col-md-6 mb-3">
                                                                          <label>RECOMENDACIONES DE LA ASISTENCIA MÉDICA</label>
                                                                          
                                                                          <textarea placeholder="EJEMPLO: NO CONSUMIR LÁCTEOS NI EMBUTIDOS" autocomplete="off" style="text-transform:uppercase;" rows="5" cols="33" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="recomendaciones" name="recomendaciones" required value></textarea>
                                                                        </div>
                                                                        <?php 
                                                                        }
                                                                        ?>

                                                                        <div class="col-md-6 mb-3" style="display: none;">
                                                                          <label>ESTATUS DEL MEDICAMENTO:</label>
                                                                          <input id="estatus_medicamento" name="estatus_medicamento" value="VIGENTE">
                                                                        </div>
                                                                         



                                      

                                                                    </div>
                                                                    <!-- FIN MODAL BODY -->

                                                                  </div>

                                                                  <div class="modal-footer">
                                                                        <button type="button" class="btn-danger btn-lg" data-dismiss="modal" href="javascript:imprimirSeleccion('body')">
                                                                          Cerrar
                                                                        </button>
                                                                        
                                                                        <button type="submit" class="btn-success btn-lg" >
                                                                          Guardar
                                                                        </button>
                                                                  </div>



                                                                  </form>  

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FIN Modal -->












                                                        <!-- INICIO Modal -->
                                                        <div class="modal" id="medicamentoModal<?php echo $id_asistencia_m;?>" role="dialog">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                  
                                                                  <div id="body">

                                                                    <div class="modal-header">
                                                                      <div class="">
                                                                          <img style="float: left;" src="../image/FGJEM.png" width="50" height="50">
                                                                          <img style="float: right;" src="../image/ESCUDO.png" width="60" height="50">
                                                                          <p style="text-align:center; color: #030303; font-size: 18px">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento Penal o de Extinción de Dominio</p>
                                                                          <!-- <p style="text-align:center; color: #030303; font-size: 18px"></p> -->
                                                                      </div>
                                                                      
                                                                    </div>
                                                                    <!-- INICIO MODAL BODY -->
                                                                    <div class="modal-body">
                                                                      <!-- <p style="text-align:center; font-size: 14px; color:#5F6D6B;">TRATAMIENTO MÉDICO</p> -->
                                                    
                                                                      <!-- <br> -->

                                                                      <form>

                                                                        <?php
                                                                        $consulta_total_m = "SELECT COUNT(*) as total
                                                                        FROM tratamiento_medico
                                                                        WHERE tratamiento_medico.id_asistencia = '$id_asistencia_m'";

                                                                        $r_consulta_total_m = $mysqli->query($consulta_total_m);
                                                                        $row_consulta_total_m=$r_consulta_total_m->fetch_assoc();
                                                                        $total_m = $row_consulta_total_m['total'];
                                                                        ?>

                                                                        <?php
 
                                                                        
                                                                        $resultado = $mysqli->query("SELECT*
                                                                                  FROM tratamiento_medico
                                                                                  WHERE id_asistencia = '$id_asistencia_m'
                                                                                  ORDER BY fecha_registro ASC");

                                                                       
                                                                        $medicamentos = $resultado->fetch_all(MYSQLI_ASSOC);

                                                                        // Obtenemos la fecha actual para la validación
                                                                        $fecha_actual = new DateTime();
                                                                        ?>



                                                                        <div class="medical-card">
                                                                          <div class="card-header">
                                                                            <p style="text-align:center; color: #fffff; font-size: 18px; font-weight: bold;" >TRATAMIENTO MÉDICO</p>
                                                                            <p class="specialty" style="text-align:center;"><?php echo $row['servicio_medico']?>
                                                                            <?php 
                                                                            if ($r_seguimiento['diagnostico'] != "") {
                                                                            
                                                                            ?>

                                                                            <?php echo " - ". $r_seguimiento['diagnostico']; ?> </p> 
                                                                            
                                                                            <?php    
                                                                                }
                                                                            ?> 

                                                                            
                                                                          </div>
                                                                          
                                                                          <div class="card-body">
                                                                            <div class="patient-info">
                                                                              <p style="text-align:lefth;"><strong>Sujeto Protegido:</strong> <?php echo $row['id_sujeto'];?> <br> <strong>Fecha Asistencia:</strong> <?php echo $date;?> <br> <strong>Id Asistencia:</strong> <?php echo $id_asistencia_m; ?></p>
                                                                            </div>
                                                                            
                                                                            <div class="prescription-container">
                                                                              <h3 class="rx-title" style="text-align:lefth; font-size: 18px;" >Medicamentos Registrados:</h3>
                                                                              
                                                                              <div id="medication-list">
                                                                                <?php





                                                                                $contador = 1;
                                                                                foreach ($medicamentos as $med): 
                                                                                    
                                                                                    $fecha_fin = new DateTime($med['fin_tratamiento']);
                                                                                    $es_vigente = $fecha_actual <= $fecha_fin;
                                                                                    
                                                                                    
                                                                                    $clase_estado = $es_vigente ? 'status-active' : 'status-expired';
                                                                                    $texto_estado = $es_vigente ? 'Vigente' : 'Finalizado';
                                                                                    
                                                                                    
                                                                                    $f_inicio_formato = date("d/m/Y", strtotime($med['inicio_tratamiento']));
                                                                                    $f_fin_formato = date("d/m/Y", strtotime($med['fin_tratamiento']));

                                                                                    
                                                                                    $hora_inicio = date('H:i:s', strtotime($med['hora_inicio']));
                                                                                

                                                                                ?>
                                                                                <?php 
                                                                                    if ($contador === 7){
                                                                                ?> 


                                                                                <div style="page-break-before: always;">
                                                                                  <p></p>
                                                                                </div>

                                                                                <?php    
                                                                                    }
                                                                                ?> 
                                                                                
                                                                                  <div class="medication-item">
                                                                                    <div class="med-header">
                                                                                      <p class="med-name"><?php echo $contador . ". " . htmlspecialchars($med['nombre_medicamento']); ?></p>
                                                                                     
                                                                                    </div>
                                                                                    <ul class="circulo" style="list-style-type: circle;">

                                                                                    <li>INDICACIÓN:<?php echo htmlspecialchars($med['indicaciones']); ?></li>
                                                                                    <?php 
                                                                                    if ( $med['via_administracion'] != ""){ 
                                                                                    ?> 
                                                                                    <li>VÍA DE ADMINISTRACIÓN: <?php echo $med['via_administracion']; ?> </li>
                                                                                    <?php
                                                                                    }
                                                                                    ?>                                       
                                                                                    <?php 
                                                                                    if ( $hora_inicio != '00:00:00'){ 
                                                                                    ?> 
                                                                                    <li>HORA DE INICIO DEL TRATAMIENTO: <?php echo $hora_inicio; ?> </li>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                    <?php 
                                                                                    if ( $f_inicio_formato != "01/01/1970"){ 
                                                                                    ?> 
                                                                                    <li>FECHA DE INICIO DEL TRATAMIENTO: <?php echo $f_inicio_formato; ?></li>
                                                                                    <?php
                                                                                    }
                                                                                    ?> 
                                                                                    
                                                                                    
                                                                                    </ul>

                                                                                    <!-- <p class="med-instruction">Indicación:<?php echo htmlspecialchars($med['indicaciones']); ?></p>
                                                                                    <p class="med-dates">Vía de Administración: <?php echo $med['via_administracion']."     |     "; ?> Inicio del tratamiento: <?php echo $f_inicio_formato; ?></p> -->

                                                                                    
                                                                                  </div>
                                                                                  
                                                                                <?php
                                                                                 
                                                                                  $contador++;
                                                                                endforeach; 
                                                                                ?>
                                                                              </div>
                                                                            </div>

                                                                              <?php
                                                                              $consulta_recomendaciones = "SELECT nombre_medicamento, indicaciones, recomendaciones,fecha_registro
                                                                              FROM tratamiento_medico
                                                                              WHERE tratamiento_medico.id_asistencia = '$id_asistencia_m'
                                                                              ORDER BY fecha_registro ASC 
                                                                              LIMIT 1
                                                                              ";

                                                                              $consulta_re = $mysqli->query($consulta_recomendaciones);
                                                                              $row_recomendaciones=$consulta_re->fetch_assoc();
                                                                              $resultado_re = $row_recomendaciones['recomendaciones'];

                                                                              if ($resultado_re != ""){
                                                                              ?>

                                                                            <div class="recommendations-container">
                                                                              <span class="rec-title">RECOMENDACIONES GENERALES:</span>
                                                                              <p><?php echo $resultado_re; ?></p>
                                                                            </div>
                                                                            <?php
                                                                            } else { ?>

                                                                            <div class="recommendations-container">
                                                                              <span class="rec-title">RECOMENDACIONES GENERALES:</span>
                                                                              <p><?php echo "SIN RECOMENDACIONES"; ?></p>
                                                                            </div>

                                                                            <?php
                                                                            }
                                                                            ?> 


                                                                          </div>
                                                                          
                                                                          <!-- <div class="card-footer">
                                                                            Función nativa de JS para activar la ventana de impresión/guardado PDF
                                                                            <button class="btn-print" onclick="window.print()">Imprimir / Guardar PDF</button>
                                                                          </div> -->
                                                                          
                                                                        </div>


                                                                        
                                                                      </form>

                                                                    </div>
                                                                    <!-- FIN MODAL BODY -->


                                                                  </div>

                                                                  <div class="modal-footer">
                                                                        <!-- <button id="nombre" class="btn-primary btn-lg" href="javascript:imprimirSeleccion('body_med')">
                                                                          Imprimir
                                                                        </button> -->
                                                                        <a class="btn btn-primary btn-lg" href="javascript:imprimirSeleccion('body')">
                                                                          Imprimir
                                                                        </a>
                                                                        <button class="btn-danger btn-lg" data-dismiss="modal">
                                                                          Cerrar
                                                                        </button>
                                                                  </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FIN Modal -->


                                                        


                                                        









                                                    <?php } ?>
                                            </tbody>
                                        <!-- </table>  -->





                                      </table>
                    </div>
                                  
                                    
                  </div>
              </form>



              <?php
              }
              ?>

















              








<div class="contenedor">
<a href="../asistencias_medicas/admin.php" class="btn-flotante">REGRESAR</a>
</div>



</body>
</html>
<script language="Javascript">

// js notas
const enlaces = document.querySelectorAll('.enlace-nota');
const tooltip = document.getElementById('tooltip-flotante');

enlaces.forEach(enlace => {
    enlace.addEventListener('mouseenter', (e) => {
        // Obtenemos el texto guardado en el atributo data-nota
        tooltip.textContent = e.currentTarget.getAttribute('data-nota');
        tooltip.style.display = 'block';
    });

    enlace.addEventListener('mousemove', (e) => {
        // Posiciona la nota 12 píxeles abajo y a la derecha del cursor
        tooltip.style.top = (e.pageY + 12) + 'px';
        tooltip.style.left = (e.pageX + 12) + 'px';
    });

    enlace.addEventListener('mouseleave', () => {
        tooltip.style.display = 'none';
    });
});

</script>



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

<script>
  const inputTime = document.getElementById('hora_inicio');

  inputTime.addEventListener('input', (e) => {
    const valor = e.target.value; // Formato HH:MM o HH:MM:SS
    
    if (valor) {
      // Dividimos el tiempo en componentes [HH, MM, SS]
      const partes = valor.split(':');
      
      // Forzamos que los minutos y segundos sean siempre '00'
      partes[1] = '00'; 
      if (partes[2]) partes[2] = '00'; 
      
      // Reasignamos el valor corregido al input
      e.target.value = partes.join(':');
    }
  });
</script>

















