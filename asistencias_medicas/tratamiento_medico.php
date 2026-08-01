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
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/instrumento_adaptabilidad.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
  <link rel="stylesheet" href="../css/tratamiento_medico_botones.css">
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
                <li><a href="./tratamiento_medico.php" class="active"><span class="far fa-regular fa-bell"></span><span class="tab-text">TRATAMIENTO MEDICO</span></a></li>
              </ul>


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

                                                    $query = "SELECT*

                                                            FROM solicitud_asistencia
                                                            JOIN agendar_asistencia 
                                                            ON solicitud_asistencia.id_asistencia = agendar_asistencia.id_asistencia 
                                                            JOIN cita_asistencia 
                                                            ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia                                                            
                                                            AND cita_asistencia.fecha_asistencia BETWEEN DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY) 
                                                            AND DATE_ADD(CURDATE(), INTERVAL (7 - WEEKDAY(CURDATE())) DAY)
                                                            AND solicitud_asistencia.servicio_medico != 'MÉDICO' 
                                                            AND solicitud_asistencia.servicio_medico != 'SANITARIO' 
                                                            AND solicitud_asistencia.servicio_medico != 'PSICOLÓGICO' 
                                                            WHERE solicitud_asistencia.etapa = 'ASISTENCIA MÉDICA COMPLETADA' 
                            

                                                            ORDER BY cita_asistencia.fecha_asistencia  DESC
                                                    ";
                                                    
                                                    
                                                    $result_solicitud = mysqli_query($mysqli, $query);

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

                                                                <!-- Primer Enlace -->
                                                                <a type="button" data-toggle="modal" data-target="#registrarModal<?php echo $id_asistencia_m;?>" class="btn btn-outline-secondary enlace-nota btn-agregar" data-nota="<?php echo $nota_agregar; ?>">
                                                                    <i class="fas fa-plus"></i>
                                                                </a>

                                                                <!-- Segundo Enlace -->
                                                                <a type="button" class="btn btn-outline-secondary enlace-nota btn-historial" data-nota="<?php echo $nota_archivo; ?>">
                                                                    <i class="fas fa-file-medical"></i>
                                                                </a>

                                                                <!-- Contenedor para la -->
                                                                <div id="tooltip-flotante" style="display:none; position:absolute; background:#222; color:#fff; padding:6px 12px; border-radius:4px; pointer-events:none; font-family:sans-serif; font-size:13px; z-index:9999;"></div>

                                                            </td>



                                                        </tr>






                                                        






                                                        <!-- INICIO Modal -->
                                                        <div class="modal" id="detalleModal<?php echo $id_asistencia_m;?>" role="dialog">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                  
                                                                  <div id="body">

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
                                                                  
                                                                  <div id="body">

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
                                                                          <input type="text" class="form-control"  id="id_asistencia" name="id_asistencia" readonly value="<?php echo $row['id_asistencia']?>">
                                                                        </div>

                                                                        <div class="col-md-6 mb-3">
                                                                          <label>ID SUJETO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['id_sujeto']?>">
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
                                                                            <label>ADQUISICIÓN DEL MEDICAMENTO:</label>
                                                                            <select autocomplete="off" class="form-control" id="adquisicion" name="adquisicion" required>
                                                                              <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                                                                              <option value="COMPRADO">COMPRADO</option>
                                                                              <option value="DONACIÓN">DONACIÓN</option>
                                                                                <option value="OTORGADO POR LA INSTITUCIÓN">OTORGADO POR LA INSTITUCIÓN</option>
                                                                            </select>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>NOMBRE DEL MEDICAMENTO:</label>
                                                                          <input placeholder="NOMBRE DEL MEDICAMENTO" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="nombre" name="nombre" required value="">
                                                                        </div>

                                                                        <div class="col-md-6 mb-3">
                                                                          <label>CANTIDAD:</label>
                                                                          <select autocomplete="off" class="form-control" id="cantidad" name="cantidad" required>
                                                                              <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
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
                                                                          </select>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>PRESENTACIÓN:</label>
                                                                          <select autocomplete="off" class="form-control" id="presentacion" name="presentacion" required>
                                                                            <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                                                                            <option value="CAJA">CAJA</option>
                                                                            <option value="BOTELLA">BOTELLA</option>
                                                                            <option value="BOLSA">BOLSA</option>
                                                                            <option value="FRASCO">FRASCO</option>
                                                                            <option value="LATA">LATA</option>
                                                                            <option value="LATA">TUBO</option>
                                                                          </select>
                                                                        </div>

                                                                        <div class="col-md-6 mb-3">
                                                                          <label>CONTENIDO</label>
                                                                          <input placeholder="EJEMPLO: 20 TABLETAS" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="contenido" name="contenido" required value="">
                                                                        </div>
                                                                                  
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>INDICACIONES DEL TRATAMIENTO MÉDICO</label>
                                                                          <textarea placeholder="EJEMPLO: TOMAR 1 TABLETA CADA 8 HRS DURANTE 5 DIAS" autocomplete="off" style="text-transform:uppercase;" rows="5" cols="33" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="indicaciones" name="indicaciones" required value=""></textarea>
                                                                        </div>

                                                                        <!-- <div class="col-md-6 mb-3">

                                                                        </div>
                                                                        
                                                                        <div class="col-md-6 mb-3">

                                                                        </div>

                                                                        <div class="col-md-6 mb-3">

                                                                        </div> -->

                                      

                                                                    </div>
                                                                    <!-- FIN MODAL BODY -->


                                                                  </div>
                                                                  <div class="modal-footer">
                                                                        <button type="button" class="btn-danger btn-lg" data-dismiss="modal">
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












                                                        <div class="modal" id="myModal">
                                                          <div class="modal-dialog">
                                                            <div class="modal-content">

                                                            
                                                              <div class="modal-header">
                                                                <h2 class="modal-title">REGISTRAR MEDICAMENTO</h2>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                              </div>


                                                              <div class="modal-body">
                                                                <form method="POST" action="./guardar_medicamento.php">




                                                                                <div style="display: none;">
                                                                                  <label class="control-label">ID SERVIDOR PÚBLICO</label>
                                                                                  <input type="text" class="form-control"  id="id_servidor" name="id_servidor" readonly value="<?php echo $id_servidor_ini;?>">
                                                                                </div>

                                                                                <br>

                                                                                <div>
                                                                                  <label class="control-label">ID ASISTENCIA MÉDICA</label>
                                                                                  <input type="text" class="form-control"  id="id_asistencia" name="id_asistencia" readonly value="<?php echo $id_asistencia_medica;?>">
                                                                                </div>
                                                                                
                                                                                <br>

                                                                                <!-- <div>
                                                                                  <label class="control-label">MEDICAMENTO SURTIDO POR LA INSTITUCIÓN MÉDICA</label>
                                                                                  <select autocomplete="off" class="form-control" id="surtido" name="surtido" required>
                                                                                    <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                                                                                    <option value="SI">SI</option>
                                                                                    <option value="NO">NO</option>
                                                                                  </select>
                                                                                </div> -->

                                                                                <!-- <br> -->

                                                                                <!-- <div>
                                                                                  <label class="control-label">MEDICAMENTO ENTREGADO</label>
                                                                                  <select autocomplete="off" class="form-control" id="entregado" name="entregado" required>
                                                                                    <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                                                                                    <option value="EN GESTÓN">EN GESTÓN</option>
                                                                                    <option value="PARCIALMENTE ENTREGADO">PARCIALMENTE ENTREGADO</option>
                                                                                    <option value="COMPLETO">COMPLETO</option>
                                                                                    <option value="NO APLICA">NO APLICA</option>
                                                                                  </select>
                                                                                </div> -->

                                                                                <!-- <br> -->

                                                                                <div>
                                                                                  <label class="control-label">ADQUISICIÓN DEL MEDICAMENTO</label>
                                                                                  <select autocomplete="off" class="form-control" id="adquisicion" name="adquisicion" required>
                                                                                    <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                                                                                    <option value="COMPRADO">COMPRADO</option>
                                                                                    <option value="DONACIÓN">DONACIÓN</option>
                                                                                    <option value="OTORGADO POR LA INSTITUCIÓN">OTORGADO POR LA INSTITUCIÓN</option>
                                                                                  </select>
                                                                                </div>

                                                                                <br>

                                                                                <div>
                                                                                  <label class="control-label">NOMBRE DEL MEDICAMENTO</label>
                                                                                  <input placeholder="NOMBRE DEL MEDICAMENTO" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="nombre" name="nombre" required value="">
                                                                                </div>

                                                                                <br>

                                                                                <div>
                                                                                  <label class="control-label">CANTIDAD</label>
                                                                                  <select autocomplete="off" class="form-control" id="cantidad" name="cantidad" required>
                                                                                    <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
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
                                                                                  </select>
                                                                                </div>

                                                                                <br>

                                                                                  <div>
                                                                                    <label class="control-label">PRESENTACIÓN</label>
                                                                                    <select autocomplete="off" class="form-control" id="presentacion" name="presentacion" required>
                                                                                      <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                                                                                      <option value="CAJA">CAJA</option>
                                                                                      <option value="BOTELLA">BOTELLA</option>
                                                                                      <option value="BOLSA">BOLSA</option>
                                                                                      <option value="FRASCO">FRASCO</option>
                                                                                      <option value="LATA">LATA</option>
                                                                                      <option value="LATA">TUBO</option>
                                                                                    </select>
                                                                                  </div>

                                                                                  <br>

                                                                                  <div>
                                                                                    <label class="control-label">CONTENIDO</label>
                                                                                    <input placeholder="EJEMPLO: 20 TABLETAS" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="contenido" name="contenido" required value="">
                                                                                  </div>

                                                                                  <br>
                                                                                  
                                                                                  <div>
                                                                                    <label class="control-label">INDICACIONES DEL TRATAMIENTO MÉDICO</label>
                                                                                    <input placeholder="EJEMPLO: TOMAR 1 TABLETA CADA 8 HRS DURANTE 5 DIAS" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="indicaciones" name="indicaciones" required value="">
                                                                                  </div>

                                                                                  <br>

                                                                                  <!-- <div>
                                                                                    <label class="control-label">NÚMERO DE OFICIO MEDIANTE EL CUAL SE RECIBE EL MEDICAMENTO</label>
                                                                                    <input placeholder="NÚMERO DE OFICIO" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="oficio" name="oficio" required value="">
                                                                                  </div>

                                                                                  <br>

                                                                                  <div>
                                                                                    <label class="control-label">NOMBRE DEL SERVIDOR PÚBLICO QUE RECIBE EL MEDICAMENTO</label>
                                                                                    <input placeholder="NOMBRE DEL SERVIDOR PÚBLICO" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="nombre_recibe" name="nombre_recibe" required value="">
                                                                                  </div> -->





                                                              </div>

                                                                      <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
                                                                        <button type="submit" class="btn color-btn-success">GUARDAR</button>
                                                                      </div>
                                                                </form>
                                                            </div>
                                                          </div>
                                                        </div>









                                                    <?php } ?>
                                            </tbody>
                                        </table> 





                                      </table>
                    </div>
                                  
                                    
                  </div>
              </form>










              








<div class="contenedor">
<a href="../asistencias_medicas/admin.php" class="btn-flotante">REGRESAR</a>
</div>

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



</body>
</html>