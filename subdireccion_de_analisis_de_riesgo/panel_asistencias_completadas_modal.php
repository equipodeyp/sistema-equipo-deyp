<?php
/*require 'conexion.php';*/
date_default_timezone_set("America/Mexico_City");
include("conexion.php");

session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}

$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$user = $row['usuario'];
// echo $user;



$fecha_actual = date("Y-m-d");
// echo $fecha_actual;



?>
<!DOCTYPE html>
<html lang="es">
<head>
  <script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/main2.css">
  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
  <!--font awesome con CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- datatables JS -->
  <script type="text/javascript" src="../datatables/datatables.min.js"></script>
  <!-- para usar botones en datatables JS -->
  <script src="../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>
  <!-- MATERIAL PARA USAR TOAST MENSAJES DE ALERTA  -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<!-- ////////////////////////////////////////// --

 SCRIPT PARA EL MANEJO DE LA TABLA -->
  <script type="text/javascript">
  $(document).ready(function() {
      $('#example').DataTable({
          language: {
                  "lengthMenu": "Mostrar _MENU_ registros",
                  "zeroRecords": "No se encontraron resultados",
                  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sSearch": "Buscar:",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast":"Último",
                      "sNext":"Siguiente",
                      "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
              },
      });
  });
  </script>

  <style>
    .pagination {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border-radius: 4px;
}
.pagination > li {
  display: inline;
}
.pagination > li > a,
.pagination > li > span {
  position: relative;
  float: left;
  padding: 6px 12px;
  margin-left: -1px;
  line-height: 1.42857143;
  color: #63696D;
  text-decoration: none;
  background-color: #fff;
  border: 1px solid #ddd;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
  margin-left: 0;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
  z-index: 2;
  color: #63696D;
  background-color: #eee;
  border-color: #ddd;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  z-index: 3;
  color: #fff;
  cursor: default;
  background-color: #63696D;
  border-color: #5F6D6B;
}
.pagination > .disabled > span,
.pagination > .disabled > span:hover,
.pagination > .disabled > span:focus,
.pagination > .disabled > a,
.pagination > .disabled > a:hover,
.pagination > .disabled > a:focus {
  color: #777;
  cursor: not-allowed;
  background-color: #fff;
  border-color: #ddd;
}
.pagination-lg > li > a,
.pagination-lg > li > span {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
}
.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px;
}
.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
}
.pagination-sm > li > a,
.pagination-sm > li > span {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
}
.pagination-sm > li:first-child > a,
.pagination-sm > li:first-child > span {
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
.pagination-sm > li:last-child > a,
.pagination-sm > li:last-child > span {
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px;
}

a:hover,
a:focus {
  color: #FFFFFF;
  text-decoration: underline;
}
  </style>
  <style media="screen">
  .demo-preview {
    padding-top: 20px;
    padding-bottom: 10px;
    width: 70%;
    margin: auto;
    text-align: center;
  }

  .alert {
    padding: .7143rem 1.071rem;
    margin-bottom: 1.429rem;
    border-radius: 2px;
    border: 1px solid transparent;
    color: #FFF
  }

  .alert.alert-square {
    border-radius: 0
  }

  .alert .close {
    position: relative
  }

  .alert.alert-dismissable,
  .alert.alert-dismissible {
    padding-right: 2.5rem
  }

  .alert.alert-dismissable .close,
  .alert.alert-dismissible .close {
    top: -2px;
    right: -20px;
    color: inherit
  }

  .alert.alert-primary {
    background-color: #2196F3;
    border-color: #2196F3
  }

  .alert.alert-secondary {
    background-color: #323a45;
    border-color: #323a45
  }

  .alert.alert-success {
    background-color: #64DD17;
    border-color: #64DD17
  }

  .alert.alert-info {
    background-color: #29B6F6;
    border-color: #29B6F6
  }

  .alert.alert-warning {
    background-color: #F89406;
    border-color: #F89406
  }

  .alert.alert-danger {
    background-color: #ef1c1c;
    border-color: #EF5350
  }
  </style>

</head>
<body>
  <div class="contenedor">
    <div class="sidebar ancho">
      <div class="logo text-warning">
      </div>
      <div class="user">
        <?php
        $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
        $result = $mysqli->query($sentencia);
        $row=$result->fetch_assoc();
        $genero = $row['sexo'];

        if ($genero=='mujer') {
          echo "<img src='../image/mujerup.png' width='100' height='100'>";
        }

        if ($genero=='hombre') {
          // $foto = ../image/user.png;
          echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
        }
        // echo $genero;
         ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">
          <ul>
              <!-- <li><a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio"><i class='color-icon fas fa-file-pdf menu-nav--icon'></i><span class="menu-items" style="color: white; font-weight:bold;" > GLOSARIO</span></a></li> -->
              <!-- <li class="menu-items"><a  href="#" onclick="location.href='resumen_tickets_enproceso.php'"><i class="fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span> Incidencia</span></a></li> -->
              <!-- <li class="menu-items"><a  href="#" onclick="location.href='repo.php'"><i class="fa-solid fa-folder-plus menu-nav--icon fa-fw"></i><span> Repositorio </span></a></li> -->
              <!-- <a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio"><i class='fas fa-file-pdf  menu-nav--icon fa-fw'></i><span class="menu-items"> Glosario</span></a> -->
              <!-- <a href="#"><i class='fa-solid fa-magnifying-glass  menu-nav--icon fa-fw'></i><span class="menu-items"> Busqueda</span></a> -->
              <!-- <li class="menu-items"><a href="../administrador/estadistica.php"><i class="fa-solid fa-chart-line menu-nav--icon fa-fw"></i><span class="menu-items"> ESTADISTICA</span></a></li> -->
          </ul>
          <br><br>
          <ul>
				   <?php
		   				if ($user=='subdirector') {
							echo "


							";
						  }
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
      <div class="container">

        <br>
        <br>




        <div class="">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>


                            <?php
                                    $cl = "SELECT COUNT(*) as t FROM solicitud_asistencia";
                                    $rcl = $mysqli->query($cl);
                                    $fcl = $rcl->fetch_assoc();
                                    //   echo $fcl['t'];
                                    if ($fcl['t'] == 0){
                                            echo "<h3 style='text-align:center'>NO HAY ASISTENCIAS MÉDICAS REGISTRADAS COMPLETADAS</h3>";
                                    } else{
                                            echo "<h3 style='text-align:center'>DETALLE ASISTENCIAS MÉDICAS </h3>";
                                        }
                            ?>


                                <tr>
                                    <th style="text-align:center">ID ASISTENCIA MÉDICA</th>
                                    <th style="text-align:center">IDSERVIDOR PÚBLICO</th>
                                    <th style="text-align:center">SERVICIO MÉDICO</th>
                                    <th style="text-align:center">REQUERIMIENTO</th>
                                    <th style="text-align:center">ETAPA</th>
                                    <th style="text-align:center">DETALLE</th>
                                </tr>
                            </thead>

                            <tbody>

                            <?php
                                $contador = 0;
                                    $sentencia1 = "SELECT solicitud_asistencia.id_asistencia, solicitud_asistencia.fecha_solicitud, solicitud_asistencia.id_servidor,
                                    solicitud_asistencia.servicio_medico, solicitud_asistencia.tipo_requerimiento, solicitud_asistencia.etapa

                                    FROM solicitud_asistencia
                                    ORDER BY solicitud_asistencia.fecha_solicitud DESC";





                              $var_resultado = $mysqli->query($sentencia1);

                              while ($var_fila=$var_resultado->fetch_array())
                              {
                                $contador = $contador + 1;
                                $id_asistencia = $var_fila['id_asistencia'];
                                // echo $id_asistencia;

                                    echo "<tr>";
                                        echo "<td style='text-align:center'>"; echo $var_fila['id_asistencia']; echo "</td>";
                                        echo "<td style='text-align:center'>"; echo $var_fila['id_servidor']; echo "</td>";
                                        echo "<td style='text-align:center'>"; echo $var_fila['servicio_medico']; echo "</td>";
                                        echo "<td style='text-align:center'>"; echo $var_fila['tipo_requerimiento']; echo "</td>";
                                        echo "<td style='text-align:center'>"; echo $var_fila['etapa']; echo "</td>";
                                        echo "<td style='text-align:center'>";
                                                echo "<a data-toggle='modal' data-target='#myModal$contador' style='text-align:center; text-decoration: none; color: #5F6D6B; text-decoration: underline;'><i class='fa-solid fa-address-card'></i></a>";
                                                
                                                // if ($var_fila['etapa'] === "SOLICITADA"){
                                                //   echo "<a data-toggle='modal' data-target='#myModal1' style='text-align:center; text-decoration: none; color: #5F6D6B; text-decoration: underline;'><i class='fa-solid fa-address-card'></i></a>";
                                                // }
                                                // if ($var_fila['etapa'] === "TURNADA"){
                                                //   echo "<a data-toggle='modal' data-target='#myModal1' style='text-align:center; text-decoration: none; color: #5F6D6B; text-decoration: underline;'><i class='fa-solid fa-address-card'></i></a>";
                                                // }
                                                // if ($var_fila['etapa'] === "NOTIFICADA"){
                                                //   echo "<a data-toggle='modal' data-target='#myModal1' style='text-align:center; text-decoration: none; color: #5F6D6B; text-decoration: underline;'><i class='fa-solid fa-address-card'></i></a>";
                                                // }
                                                // if ($var_fila['etapa'] === "ASISTENCIA MÉDICA COMPLETADA"){
                                                //   echo "<a data-toggle='modal' data-target='#myModal1' style='text-align:center; text-decoration: none; color: #5F6D6B; text-decoration: underline;'><i class='fa-solid fa-address-card'></i></a>";
                                                // }

                                            echo "</td>";
                                    echo "</tr>";
                            ?>

                            

                              <div class="container">


                                <!-- The Modal -->
                                <div class="modal fade" id="myModal<?php echo $contador;?>">

                                    <div class="modal-dialog modal-xl">
                                      <div class="modal-content">
                                        <div id="body<?php echo $contador;?>">
                                          <!-- Modal Header -->
                                        
                                          <div class="modal-header">
                                            <img style="float: left;" src="../image/FGJEM.png" width="50" height="50">
                                            <img style="float: right;" src="../image/ESCUDO.png" width="60" height="50">
                                            <h4 style="text-align:center">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
                                          </div>

                                          <!-- <div>
                                            <h6 style="text-align:center" class="modal-title text-center">Sistema Informático del Programa de Protección a Sujetos que Intervienen en el Procedimiento Penal o de Extinción de Dominio (SIPPSIPPED)</h6>
                                          </div> -->
                                          
                                          <!------------ Modal body ----------->
                                          <div class="modal-body">









                                        <?php 
                                              $consulta1 = "SELECT* FROM solicitud_asistencia WHERE solicitud_asistencia.id_asistencia = '$id_asistencia'";
                                              $resultado1 = $mysqli->query($consulta1);
                                              $respuesta1=$resultado1->fetch_assoc();

                                              $consulta2 = "SELECT* FROM agendar_asistencia WHERE agendar_asistencia.id_asistencia = '$id_asistencia'";
                                              $resultado2 = $mysqli->query($consulta2);
                                              $respuesta2=$resultado2->fetch_assoc();

                                              $consulta3 = "SELECT* FROM turnar_asistencia WHERE turnar_asistencia.id_asistencia = '$id_asistencia' ORDER BY turnar_asistencia.fecha_turno DESC LIMIT 1";
                                              $resultado3 = $mysqli->query($consulta3);
                                              $respuesta3=$resultado3->fetch_assoc();

                                              $consulta4 = "SELECT* FROM notificar_asistencia WHERE notificar_asistencia.id_asistencia = '$id_asistencia' ORDER BY notificar_asistencia.fecha_notificacion DESC LIMIT 1";
                                              $resultado4 = $mysqli->query($consulta4);
                                              $respuesta4=$resultado4->fetch_assoc();

                                              $consulta5 = "SELECT* FROM cita_asistencia WHERE cita_asistencia.id_asistencia = '$id_asistencia' ORDER BY cita_asistencia.fecha_asistencia ASC LIMIT 1";
                                              $resultado5 = $mysqli->query($consulta5);
                                              $respuesta5=$resultado5->fetch_assoc();

                                              $consulta6 = "SELECT* FROM cita_asistencia WHERE cita_asistencia.id_asistencia = '$id_asistencia' ORDER BY cita_asistencia.fecha_asistencia DESC LIMIT 1";
                                              $resultado6 = $mysqli->query($consulta6);
                                              $respuesta6=$resultado6->fetch_assoc();

                                              $consulta7 = "SELECT* FROM seguimiento_asistencia WHERE seguimiento_asistencia.id_asistencia = '$id_asistencia' ORDER BY seguimiento_asistencia.hora_registro DESC LIMIT 1";
                                              $resultado7 = $mysqli->query($consulta7);
                                              $respuesta7=$resultado7->fetch_assoc();
                                                                                    
                                        ?>




                                        <div id="cabecera">
                                          <br>
                                          <h4 style="text-align:center">Datos de la Asistencia Médica: <?php echo $id_asistencia; ?></h4>

                                          <div style="background: #5F6D6B repeat-x fixed; color: #000; font-weight: 900;">
                                            <h4 style="text-align:center; color: #ddd;">SOLICITUD</h4>
                                          </div>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">FOLIO DEL EXPEDIENTE DE PROTECCIÓN: </label>
                                          <label><?php echo $respuesta1['folio_expediente']; ?></label>
                                        </div>


                                        <div>
                                          <label style="color: #323a45;">ID SUJETO: </label>
                                          <label><?php echo $respuesta1['id_sujeto']; ?></label>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">ID ASISTENCIA MÉDICA: </label>
                                          <label><?php echo $respuesta1['id_asistencia']; ?></label>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">ETAPA DE LA ASISTENCIA MÉDICA: </label>
                                          <label><?php echo $respuesta1['etapa']; ?></label>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">FECHA DE SOLICITUD: </label>
                                          <label><?php echo $respuesta1['fecha_solicitud']; ?></label>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">ID SERVIDOR PÚBLICO SOLICITANTE: </label>
                                          <label><?php echo $respuesta1['id_servidor']; ?></label>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">NÚMERO DE OFICIO DE LA SOLICITUD: </label>
                                          <label><?php echo $respuesta1['num_oficio']; ?></label>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">TIPO DE REQUERIMIENTO: </label>
                                          <label><?php echo $respuesta1['tipo_requerimiento']; ?></label>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">SERVICIO MÉDICO: </label>
                                          <label><?php echo $respuesta1['servicio_medico']; ?></label>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">OBSERVACIONES DE LA SOLICITUD: </label>
                                          <label><?php echo $respuesta1['observaciones']; ?></label>
                                          <br>
                                        </div>

                                        <div id="cabecera">
                                          <div style="background: #5F6D6B repeat-x fixed; color: #000; font-weight: 900;">
                                            <h4 style="text-align:center; color: #ddd;">UNIDAD MÉDICA</h4>
                                          </div>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">TIPO DE INSTITUCIÓN: </label>
                                          <label><?php echo $respuesta2['tipo_institucion']; ?></label>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">NOMBRE DE LA INSTITUCIÓN: </label>
                                          <label><?php echo $respuesta2['nombre_institucion']; ?></label>
                                        </div>                  
                                        
                                        <div>
                                          <label style="color: #323a45;">MUNICIPIO DE LA INSTITUCIÓN: </label>
                                          <label><?php echo $respuesta2['municipio_institucion']; ?></label>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">DOMICILIO DE LA UNSTITUCIÓN: </label>
                                          <label><?php echo $respuesta2['domicilio_institucion']; ?> </label>
                                          <br>
                                        </div>                  
                                        
                                        <div>
                                          <label style="color: #323a45;">OBSERVACIONES DE LA ASISTENCIA MÉDICA: </label>
                                          <label><?php echo $respuesta2['observaciones']; ?></label>
                                        <br>
                                        </div>

                                        <div id="cabecera">
                                          <div style="background: #5F6D6B repeat-x fixed; color: #000; font-weight: 900;">
                                            <h4 style="text-align:center; color: #ddd;">FECHA Y HORA DE ASISTENCIA</h4>
                                          </div>
                                        </div>
                                        
                                        <div>
                                          <label style="color: #323a45;">FECHA DE LA ASISTENCIA MÉDICA: </label>
                                          <label><?php echo $respuesta5['fecha_asistencia']; ?></label>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">HORA DE LA ASISTENCIA MÉDICA: </label>
                                          <label><?php echo $respuesta5['hora_asistencia']; ?></label>
                                        </div>


                                        <?php

                                          $cl = "SELECT COUNT(*) as t FROM cita_asistencia WHERE id_asistencia = '$id_asistencia'";
                                          $rcl = $mysqli->query($cl);
                                          $fcl = $rcl->fetch_assoc();

                                          // echo $fcl['t'];

                                          if ($fcl['t'] > 1){
                                                echo '<div id="cabecera">
                                                  <div style="background: #5F6D6B repeat-x fixed; color: #000; font-weight: 900;">
                                                    <h4 style="text-align:center; color: #ddd;">FECHA Y HORA DE REPROGRAMACIÓN</h4>
                                                  </div>
                                                </div>';

                                                echo '<div>
                                                  <label style="color: #323a45;">FECHA DE LA ASISTENCIA MÉDICA: </label>
                                                  <label>'; echo $respuesta6['fecha_asistencia']; echo '</label>
                                                </div>';

                                                echo '<div>
                                                  <label style="color: #323a45;">HORA DE LA ASISTENCIA MÉDICA: </label>
                                                  <label>'; echo $respuesta6['hora_asistencia']; echo '</label>
                                                </div>';
                                          } 

                                        ?>
                                                    

                                        <div id="cabecera">
                                          <div style="background: #5F6D6B repeat-x fixed; color: #000; font-weight: 900;">
                                            <h4 style="text-align:center; color: #ddd;">ASISTENCIA MÉDICA TURNADA</h4>
                                          </div>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">TURNADA A LA SUBDIRECCIÓN DE EJECUCIÓN DE MEDIDAS: </label>
                                          <label><?php echo $respuesta3['turnar_asistencia']; ?></label>
                                        </div>

                                        <?php
                                            $turnada = $respuesta3['turnar_asistencia'];

                                            if ($turnada == "SI"){

                                            echo '<div>
                                              <label style="color: #323a45;">NÚMERO DE OFICIO MEDIANTE EL CUAL SE TURNA: </label>
                                              <label>'; echo $respuesta3['oficio']; echo '</label>
                                            </div>';

                                            echo '<div>
                                              <label style="color: #323a45;">FECHA DE RECEPCIÓN DEL OFICIO: </label>
                                              <label>'; echo $respuesta3['fecha_oficio']; echo '</label>
                                            </div>';

                                            } 
                                        ?>

                                        <div id="cabecera">
                                          <div style="background: #5F6D6B repeat-x fixed; color: #000; font-weight: 900;">
                                            <h4 style="text-align:center; color: #ddd;">ASISTENCIA MÉDICA NOTIFICADA</h4>
                                          </div>
                                        </div>

                                        <div>
                                          <label style="color: #323a45;">NOTIFICADA A LA SUBDIRECCIÓN DE ANÁLISIS DE RIESGO: </label>
                                          <label><?php echo $respuesta4['notificar_subdireccion']; ?></label>
                                        </div>

                                        <?php
                                            $notificada = $respuesta4['notificar_subdireccion'];

                                            if ($notificada == "SI"){

                                            echo '<div>
                                              <label style="color: #323a45;">NÚMERO DE OFICIO MEDIANTE EL CUAL SE NOTIFICA: </label>
                                              <label>'; echo $respuesta4['numero_oficio_notificacion']; echo '</label>
                                            </div>';

                                            echo '<div>
                                              <label style="color: #323a45;">FECHA DE RECEPCIÓN DEL OFICIO: </label>
                                              <label>'; echo $respuesta4['fecha_oficio_notificacion']; echo '</label>
                                            </div>';

                                            } 
                                        ?>

                                        <br><br><br><br><br><br>
                                          <div class="modal-header">
                                            <img style="float: left;" src="../image/FGJEM.png" width="50" height="50">
                                            <img style="float: right;" src="../image/ESCUDO.png" width="60" height="50">
                                            <h4 style="text-align:center">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
                                          </div>


                                          <div id="cabecera">
                                            <br>
                                            <h4 style="text-align:center">Datos de la Asistencia Médica: <?php echo $id_asistencia; ?></h4>
                                            <div style="background: #5F6D6B repeat-x fixed; color: #000; font-weight: 900;">
                                            <h4 style="text-align:center; color: #ddd;">INFORMACIÓN DEL SEGUIMIENTO DE LA ASISTENCIA MÉDICA</h4>
                                            </div>
                                          </div>



                                        <div>
                                          <label style="color: #323a45;">TRASLADO REALIZADO: </label>
                                          <label><?php echo $respuesta7['traslado_realizado']; ?></label>
                                        </div>

                                      <?php
                                            $traslado = $respuesta7['traslado_realizado'];
                                            // echo $traslado;
                                            $se_presento = $respuesta7['se_presento'];
                                            // echo $traslado;
                                            $reprogramar = $respuesta7['reprogramar'];
                                            // echo $reprogramar;

                                            if ($traslado == "SI" && $se_presento == "SI"){

                                            echo '<div>
                                            <label style="color: #323a45;">SE PRESENTÓ A LA ASISTENCIA MÉDICA: </label>
                                            <label>'; echo $respuesta7['se_presento']; echo '</label>
                                            </div>';

                                            echo '<div>
                                            <label style="color: #323a45;">HOSPITALIZACIÓN: </label>
                                            <label>'; echo $respuesta7['hospitalizacion']; echo '</label>
                                            </div>';

                                            echo '<div>
                                            <label style="color: #323a45;" >DIAGNÓSTICO: </label>
                                            <label>'; echo $respuesta7['diagnostico']; echo '</label>
                                            </div>';

                                            echo '<div>
                                            <label style="color: #323a45;">REQUIERE CITA DE SEGUIMIENTO: </label>
                                            <label>'; echo $respuesta7['cita_seguimiento']; echo '</label>
                                            </div>';

                                            echo '<div>
                                            <label style="color: #323a45;">INFORME MÉDICO: </label>
                                            <label>'; echo $respuesta7['informe_medico']; echo '</label>
                                            </div>';

                                            echo '<div>
                                            <label style="color: #323a45;">COMENTARIOS: </label>
                                            <label>'; echo $respuesta7['observaciones_seguimiento']; echo '</label>
                                            </div>';




                                            } else if ($traslado == "NO"){

                                              echo '<div>
                                              <label style="color: #323a45;">ASISTENCIA MÉDICA REPROGRAMADA: </label>
                                              <label>'; echo $respuesta7['reprogramar']; echo '</label>
                                              </div>';
                        
                                              echo '<div>
                                              <label style="color: #323a45;">MOTIVO: </label>
                                              <label>'; echo $respuesta7['motivo']; echo '</label>
                                              </div>';
                        
                                              echo '<div >
                                              <label style="color: #323a45;">COMENTARIOS: </label>
                                              <label>'; echo $respuesta7['observaciones_seguimiento']; echo '</label>
                                              </div>';


                                              
                        
                                            } else if ($traslado == "SI" && $se_presento == "NO"){

                                              echo '<div>
                                              <label style="color: #323a45;">SE PRESENTÓ A LA ASISTENCIA MÉDICA: </label>
                                              <label>'; echo $respuesta7['se_presento']; echo '</label>
                                              </div>';

                                              echo '<div>
                                              <label style="color: #323a45;">ASISTENCIA MÉDICA REPROGRAMADA: </label>
                                              <label>'; echo $respuesta7['reprogramar']; echo '</label>
                                              </div>';
                          
                                              echo '<div>
                                              <label style="color: #323a45;">MOTIVO: </label>
                                              <label>'; echo $respuesta7['motivo']; echo '</label>
                                              </div>';
                          
                                              echo '<div>
                                              <label style="color: #323a45;">COMENTARIOS: </label>
                                              <label>'; echo $respuesta7['observaciones_seguimiento']; echo '</label>
                                              </div>';
                          
                                                
                                            }

                                            $cl = "SELECT COUNT(*) as t FROM tratamiento_medico WHERE id_asistencia = '$id_asistencia'";
                                            $rcl = $mysqli->query($cl);
                                            $fcl = $rcl->fetch_assoc();
                                            // echo $fcl['t'];
                                            if ($fcl['t'] == 0){

                                                  echo "
                                                        <div id='cabecera'>
                                                          <div style='background: #5F6D6B repeat-x fixed; color: #000; font-weight: 900;'>
                                                            <h4 style='text-align:center; color: #ddd;'>TRATAMIENTO MÉDICO</h4>
                                                          </div>
                                                        </div>

                                                        <div id='cabecera'>
                                                          <div style='background: #29B6F6 repeat-x fixed; color: #000; font-weight: 900;'>
                                                            <h4>NO SE REGISTRARÓN MEDICAMENTOS, ASISTENCIA MÉDICA: $id_asistencia</h4>
                                                          </div>
                                                        </div>
                                                        ";
                                            }else{
                                                  echo "
                                                      <div id='cabecera'>
                                                        <div style='background: #5F6D6B repeat-x fixed; color: #000; font-weight: 900;'>
                                                          <h4 style='text-align:center; color: #ddd;'>TRATAMIENTO MÉDICO</h4>
                                                        </div>
                                                    </div>
                              
                                                    <br>";
                                            }

                                      ?>













                                          </div>
                                          
                                          <!-- Modal footer -->
                                        </div>

                                        <div class="modal-header">
                                            <a class="btn btn-warning btn-lg" href="javascript:imprimirSeleccion('body<?php echo $contador;?>')">
                                              Imprimir
                                            </a>

                                            <a class="btn btn-danger btn-lg" data-dismiss="modal">
                                              Cerrar
                                            </a>
                                        </div>
                                          
                                      </div>
                                    </div>
                                    
                                </div>

                              </div>



                            <?php
                                }
                            ?>
                            </tbody>
                           </table>
                        </div>
                    </div>
            </div>
        </div>
      </div>
    </div>
  </div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
        <div class="contenedor">
			<!-- <a href="menu.php" class="btn-flotante">REGRESAR</a> -->
      <a href="./menu_asistencias_medicas.php" class="btn-flotante-regresar color-btn-success-gray">REGRESAR</a>
		</div>

        <div class="contenedor">
            <!-- <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a> -->
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





