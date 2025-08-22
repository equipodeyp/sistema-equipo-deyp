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
  



  <link href="../css/bootstrap-theme.css" rel="stylesheet">


 



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
                <a href="./admin.php">INICIO</a>
                <a class="actived" href="./solicitudes_registradas.php">SOLICITUDES DE ASISTENCIA MÉDICA</a>
            </div>
          

            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a href="#" class="active" onclick="location.href='./solicitudes_registradas.php'"><span class="fas fa-regular fa-clipboard"></span><span class="tab-text">SOLICITUDES DE ASISTENCIA MÉDICA REGISTRADAS</span></a></li>
                <li><a href="#" onclick="location.href='./asistencias_reprogramadas.php'"><span class="fas fa-regular fa-calendar-week"></span><span class="tab-text">ASISTENCIAS MÉDICAS PARA SU REPROGRAMACIÓN</span></a></li>
                <!-- <li><a href="#" onclick="location.href='seguimiento_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">SEGUIMIENTO PERSONA</span></a></li> -->
              </ul>


              <form class="container well form-horizontal" enctype="multipart/form-data">
              <?php
              $cl = "SELECT COUNT(*) as t
                    FROM solicitud_asistencia 
                    WHERE solicitud_asistencia.servicio_medico != 'PSICOLÓGICO'
                    AND (solicitud_asistencia.etapa = 'SOLICITADA' 
                    OR solicitud_asistencia.etapa = 'AGENDADA'
                    OR solicitud_asistencia.etapa = 'TURNADA')";

              $rcl = $mysqli->query($cl);
              $fcl = $rcl->fetch_assoc();
              // echo $fcl['t'];

              if ($fcl['t'] == 0){
                    echo "<div id='cabecera'>
                      <div class='row alert div-title' role='alert'>
                        <h3 style='text-align:center'>¡ NO HAY SOLICITUDES DE ASISTENCIA MÉDICA REGISTRADAS !</h3>
                      </div>
                    </div>";
              } else{
                    echo "
                      <div class='row'>
                        <div id='cabecera'>
                          <div class='row alert div-title'>
                            <h3 style='text-align:center'>TABLA DE LAS SOLICITUDES DE ASISTENCIA MÉDICA REGISTRADAS</h3>
                          </div>
                        </div>
                      <div>

                      <table class='table table-bordered' id='table-instrumento'>
                        <thead>
                            <tr>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>NO.</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>ID DE LA ASISTENCIA MÉDICA SOLICITADA</th>
                                
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>FECHA DE SOLICITUD</th>

                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>SERVICIO MÉDICO</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>TIPO DE REQUERIMIENTO</th>
                                
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>OBSERVACIONES</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>FECHA Y HORA ASISTENCIA</th>

                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>AGENDAR TURNAR NOTIFICAR</th>
                            </tr>
                        </thead>
                    
                    ";
                  }

            ?>


                                            <tbody>
                                                <?php

                                                    $count = 0;

                                                    $query = "SELECT *
                                                    FROM solicitud_asistencia
                                                    WHERE solicitud_asistencia.servicio_medico != 'PSICOLÓGICO'
                                                    AND (solicitud_asistencia.etapa = 'SOLICITADA' OR solicitud_asistencia.etapa = 'AGENDADA' 
                                                    OR solicitud_asistencia.etapa = 'TURNADA')
                                                    ORDER BY solicitud_asistencia.fecha_solicitud ASC";

                                                    $result_solicitud = mysqli_query($mysqli, $query);

                                                    while($row = mysqli_fetch_array($result_solicitud)) {
                                                    $fsolicitud=$row['fecha_solicitud'];
                                                    $fecha_solicitud = date("d/m/Y", strtotime($fsolicitud));
                                                    $id_asistencia = $row['id_asistencia'];
                                                        
                                                ?>
                                                    <?php $count = $count + 1 ?>
                                                        <tr>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $count?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">
                                                              <a style="text-align:center; text-decoration: none; color: #5F6D6B; text-decoration: underline;" href="" data-toggle="modal" data-target="#myModal<?php echo $id_asistencia;?>"><span style="text-align:center;"><?php echo $row['id_asistencia']; ?></span></a>
                                                            </td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $fecha_solicitud;?></td>

                                                            <!-- <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['id_servidor']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['num_oficio']?></td> -->
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['servicio_medico']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['tipo_requerimiento']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['observaciones']?></td>
                                                            
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">
                                                              <?php 
                                                              if ($row['etapa'] === 'SOLICITADA'){
                                                              
                                                                  echo '
                                                                      <a style="color: black; cursor: not-allowed;" class="btn btn-outline-warning">
                                                                      EN PROCESO...
                                                                      </a> 
                                                                  ';
                                                              } 
                                                              else {
                                                                $id_asistencia = $row['id_asistencia'];
                                                                
                                                                $query_cita = "SELECT solicitud_asistencia.id_asistencia, solicitud_asistencia.servicio_medico, 
                                                                                solicitud_asistencia.etapa, DATEDIFF (cita_asistencia.fecha_asistencia, NOW()) AS dias_restantes, 
                                                                                agendar_asistencia.tipo_institucion, agendar_asistencia.nombre_institucion, agendar_asistencia.domicilio_institucion, 
                                                                                agendar_asistencia.municipio_institucion, agendar_asistencia.oficio_gestion, agendar_asistencia.observaciones, 
                                                                                cita_asistencia.fecha_asistencia, cita_asistencia.hora_asistencia

                                                                                FROM solicitud_asistencia

                                                                                JOIN agendar_asistencia
                                                                                ON solicitud_asistencia.id_asistencia = agendar_asistencia.id_asistencia

                                                                                JOIN cita_asistencia 
                                                                                ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia
                                                                                AND solicitud_asistencia.id_asistencia = '$id_asistencia'
                                                                                ORDER BY cita_asistencia.id DESC
                                                                                LIMIT 1";
                                                                
                                                                    $result_cita = mysqli_query($mysqli, $query_cita);

                                                                    while($row2 = mysqli_fetch_array($result_cita)) {

                                                                          $cita=$row2['fecha_asistencia'];
                                                                          $date_cita = date("d/m/Y", strtotime($cita));
                                                                          $hora_asistencia = $row2['hora_asistencia'];
                                                                          
                                                                          
                                                                          
                                                                          $dias_restantes = $row2['dias_restantes'];
                                                                          if ($row2['etapa'] === 'AGENDADA' || $row2['etapa'] === 'TURNADA' || $row2['etapa'] === 'NOTIFICADA'){

                                                                              if ($dias_restantes >= 0){
                                                                                  echo "
                                                                                      <a style='color: black; cursor: not-allowed;'>
                                                                                        $date_cita $hora_asistencia <br> Dias restantes: $dias_restantes
                                                                                      </a> 
                                                                                  ";
                                                                              } else {
                                                                                  echo "
                                                                                      <a style='color: black; cursor: not-allowed;'>
                                                                                        $date_cita <br> Dias restantes: 0
                                                                                      </a> 
                                                                                  ";
                                                                              }
                                                                          }
                                                                          
                                                                    }
                                                              }
                                                              ?>


                                                            </td>
                                                            


                                                            <?php 
                                                              if ($row['agendar'] === 'SI' && $row['turnar'] === 'NO' && $row['notificar'] === 'NO'){
                                                              
                                                                  echo '
                                                                      <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">
                                                                          <a style="text-decoration: underline;" href="./turnar_asistencia.php?id_asistencia_medica='; echo $row['id_asistencia']; echo'" class="btn btn-outline-primary">
                                                                            TURNAR
                                                                          </a>
                                                                      </td>
                                                                  ';
                                                              }

                                                              else if ($row['agendar'] === 'SI' && $row['turnar'] === 'SI' && $row['notificar'] === 'NO'){
                                                              
                                                                echo '
                                                                    <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">
                                                                        <a style="text-decoration: underline;" href="./notificar_asistencia.php?id_asistencia_medica='; echo $row['id_asistencia']; echo'" class="btn btn-outline-danger">
                                                                          NOTIFICAR
                                                                        </a>
                                                                    </td>
                                                                ';
                                                            
                                                              }

                                                              else if ($row['agendar'] === 'NO' && $row['turnar'] === 'NO' && $row['notificar'] === 'NO'){
                                                              
                                                                echo '
                                                                    <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">
                                                                        <a style="text-decoration: underline;" href="./agendar_asistencia.php?id_asistencia_medica='; echo $row['id_asistencia']; echo'" class="btn btn-outline-success">
                                                                          AGENDAR
                                                                        </a>
                                                                    </td>
                                                                ';
                                                            
                                                              } 
                                                            ?>

                                                        



                                                        <!-- INICIO Modal -->
                                                        <div class="modal" id="myModal<?php echo $id_asistencia;?>" role="dialog">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                  
                                                                  <div id="body">

                                                                    <div class="modal-header">
                                                                      <div class="">
                                                                          <img style="float: left;" src="../image/FGJEM.png" width="50" height="50">
                                                                          <img style="float: right;" src="../image/ESCUDO.png" width="60" height="50">
                                                                          <h4 style="text-align:center; color: #030303;"><br>Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento Penal o de Extinción de Dominio</h4>
                                                                      </div>
                                                                      
                                                                    </div>
                                                                    <!-- INICIO MODAL BODY -->
                                                                    <div class="modal-body">
                                                                      <p style="text-align:center; font-size: 18px; color:#5F6D6B;">DETALLE DE LA ASISTECIA MÉDICA: <?php echo $row['id_asistencia'];?></p>
                                                    
                                                                      <br>

                                                                      <form>


                                                                        <div style="display: flex; justify-content: center; align-items: center; border-radius: 10px; background: #5F6D6B; height: 40px; width: 100%; box-shadow: 5px 5px 10px 2px rgba(0, 0, 0, 0.3);">
                                                                            <h3 style="text-align:center; color: #ede7e7ff; font-size: 18px;">INFORMACIÓN DE LA SOLICITUD</h3>
                                                                        </div>
                                                                        <br>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>ID ASISTENCIA MÉDICA:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['id_asistencia'];?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>FOLIO DEL EXPEDIENTE DE PROTECCIÓN:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['folio_expediente'];?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>ID SUJETO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['id_sujeto'];?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>FECHA Y HORA DE LA SOLICITUD:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $fecha_solicitud." ".$row['hora_solicitud']?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>ID SERVIDOR PÚBLICO SOLICITANTE:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['id_servidor'];?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>SERVICIO MÉDICO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['servicio_medico'];?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>TIPO DE REQUERIMIENTO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['tipo_requerimiento'];?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>NÚMERO DE OFICIO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['num_oficio'];?>">
                                                                        </div>
                                                                        <?php if ($row['observaciones'] != "") { ?>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>OBSERVACIONES:</label>
                                                                          <textarea style="font-size: 14px;" rows="5" cols="33" type="text" class="form-control" readonly placeholder="<?php echo $row['observaciones'];?>"></textarea>
                                                                        </div>
                                                                        <?php } ?>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>ETAPA ASISTENCIA MÉDICA</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['etapa'];?>">
                                                                        </div>
                                                                        <?php
                                                                        $sentencia_id="SELECT solicitud_asistencia.id_asistencia, solicitud_asistencia.servicio_medico, 
                                                                                solicitud_asistencia.etapa, DATEDIFF (cita_asistencia.fecha_asistencia, NOW()) AS dias_restantes, 
                                                                                agendar_asistencia.tipo_institucion, agendar_asistencia.nombre_institucion, agendar_asistencia.domicilio_institucion, 
                                                                                agendar_asistencia.municipio_institucion, agendar_asistencia.oficio_gestion, agendar_asistencia.observaciones, 
                                                                                cita_asistencia.fecha_asistencia, cita_asistencia.hora_asistencia

                                                                                FROM solicitud_asistencia

                                                                                JOIN agendar_asistencia
                                                                                ON solicitud_asistencia.id_asistencia = agendar_asistencia.id_asistencia

                                                                                JOIN cita_asistencia 
                                                                                ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia
                                                                                AND solicitud_asistencia.id_asistencia = '$id_asistencia'
                                                                                ORDER BY cita_asistencia.id DESC
                                                                                LIMIT 1";
                                                                        $result_id = $mysqli->query($sentencia_id);
                                                                        $row_id=$result_id->fetch_assoc();
                                                                        $id_a = $row_id['id_asistencia'];
                                                                        $estatus_asitencia = $row_id['etapa'];
                                                                        $tipo_institucion = $row_id['tipo_institucion'];
                                                                        $nombre_institucion = $row_id['nombre_institucion'];
                                                                        $domicilio_institucion = $row_id['domicilio_institucion'];
                                                                        $municipio_institucion = $row_id['municipio_institucion'];
                                                                        $oficio_gestion = $row_id['oficio_gestion'];
                                                                        $fecha_cita = $row_id['fecha_asistencia'];
                                                                        $d_cita = date("d/m/Y", strtotime($fecha_cita));
                                                                        $hora_cita = $row_id['hora_asistencia'];
                                                                        $obs = $row_id['observaciones'];
                                                                        ?>
                                                                        <br>
                                                                        <?php if ($row['etapa'] != "SOLICITADA") { ?>
                                                                        <div style="display: flex; justify-content: center; align-items: center; border-radius: 10px; background: #5F6D6B; height: 40px; width: 100%; box-shadow: 5px 5px 10px 2px rgba(0, 0, 0, 0.3);">
                                                                            <h3 style="text-align:center; color: #ede7e7ff; font-size: 18px;">GESTIÓN DE LA ASISTENCIA MEDICA</h3>
                                                                        </div>
                                                                        <br>

                                                                        <div class="col-md-6 mb-3">
                                                                          <label>TIPO DE INSTITUCIÓN:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $tipo_institucion;?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>NOMBRE DE LA INSTITUCIÓN:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $nombre_institucion;?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>DOMICILIO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $domicilio_institucion;?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>MUNICIPIO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $municipio_institucion;?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>FECHA PROGRAMADA:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $d_cita;?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>HORA PROGRAMADA:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $hora_cita;?>">
                                                                        </div>
                                                                        <?php if ($oficio_gestion != "") { ?>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>NÚMERO DE OFICIO DE LA GESTIÓN:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $oficio_gestion;?>">
                                                                        </div>
                                                                        <?php } ?>
                                                                        <?php if ($obs != "") { ?>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>OBSERVACIONES:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $obs;?>">
                                                                        </div>
                                                                        <?php } ?>

                                                                        <?php } ?>
                                                                      </form>

                                                                    </div>
                                                                    <!-- FIN MODAL BODY -->


                                                                  </div>

                                                                  <div class="modal-footer">
                                                                        <a class="btn btn-danger btn-lg" data-dismiss="modal">
                                                                          Cerrar
                                                                        </a>
                                                                  </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FIN Modal -->

                                                        </tr>







                                                    <?php } ?>
                                                        
                                            </tbody>
                      </table> 



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
<a href="./admin.php" class="btn-flotante">REGRESAR</a>
</div>



</body>
</html>

