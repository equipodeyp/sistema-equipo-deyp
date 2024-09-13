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
                                  $cl = "SELECT COUNT(*) as t FROM solicitud_asistencia WHERE etapa = 'AGENDADA, TURNADA Y NOTIFICADA' OR etapa = 'REPROGRAMADA AGENDADA, TURNADA Y NOTIFICADA'";
                                  $rcl = $mysqli->query($cl);
                                  $fcl = $rcl->fetch_assoc();
                                  // echo $fcl['t'];
                                  if ($fcl['t'] == 0){
                                        echo "<h3 style='text-align:center'>NO HAY ASISTENCIAS MÉDICAS REGISTRADAS</h3>";
                                  } else{
                                        echo "<h3 style='text-align:center'>SEGUIMIENTO DE ASISTENCIAS MÉDICAS</h3>";
                                      }
                                ?>
                                <tr>
                                    <th style="text-align:center">ID ASISTENCIA MÉDICA</th>
                                    <th style="text-align:center">FECHA SOLICITUD</th>
                                    <th style="text-align:center">ID SERVIDOR PÚBLICO</th>
                                    <th style="text-align:center">SERVICIO MÉDICO</th>
                                    <th style="text-align:center">INSTITUCIÓN</th>
                                    <th style="text-align:center">FECHA DE ASISTENCIA</th>
                                    <th style="text-align:center">DIAS RESTANTES</th>
                                    <th style="text-align:center">ETAPA</th>
                                    <th style="text-align:center">DETALLE ASISTENCIA MÉDICA</th>
                                </tr>
                            </thead>


                            <tbody>
                              <?php
                              $contador = 0;
                              $sentencia1 = "SELECT solicitud_asistencia.id_asistencia, solicitud_asistencia.fecha_solicitud, solicitud_asistencia.id_servidor, 
                              solicitud_asistencia.servicio_medico, agendar_asistencia.nombre_institucion, solicitud_asistencia.etapa
                              
                              FROM solicitud_asistencia
                                                            
                              JOIN agendar_asistencia 
                              ON solicitud_asistencia.id_asistencia = agendar_asistencia.id_asistencia 
                              WHERE solicitud_asistencia.etapa = 'AGENDADA, TURNADA Y NOTIFICADA' OR solicitud_asistencia.etapa = 'REPROGRAMADA AGENDADA, TURNADA Y NOTIFICADA'";


                              $var_resultado = $mysqli->query($sentencia1);

                              while ($var_fila=$var_resultado->fetch_array())
                              {
                                $contador = $contador + 1;
                                $id_asistencia = $var_fila['id_asistencia'];

                                    echo "<tr>";
                                    echo "<td style='text-align:center'>"; echo $var_fila['id_asistencia']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $var_fila['fecha_solicitud']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $var_fila['id_servidor']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $var_fila['servicio_medico']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $var_fila['nombre_institucion']; echo "</td>";

                                    $query_cita = "SELECT DATEDIFF (cita_asistencia.fecha_asistencia, NOW()) AS dias_restantes, solicitud_asistencia.id_asistencia, cita_asistencia.fecha_asistencia

                                    FROM solicitud_asistencia
                                                                  
                                    INNER JOIN cita_asistencia 
                                    ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia 
                                    AND solicitud_asistencia.id_asistencia = '$id_asistencia'
                                    AND solicitud_asistencia.etapa = 'AGENDADA, TURNADA Y NOTIFICADA'
                                    OR solicitud_asistencia.etapa = 'REPROGRAMADA AGENDADA, TURNADA Y NOTIFICADA'
                                    ORDER BY cita_asistencia.fecha_asistencia DESC LIMIT 1";
                                    
                                    $result_cita = mysqli_query($mysqli, $query_cita);

                                    while($row2 = mysqli_fetch_array($result_cita)) {
                                                                
                                                                
                                          if ($id_asistencia == $row2['id_asistencia']){

                                            echo "<td style='text-align:center'>"; echo $row2['fecha_asistencia']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $row2['dias_restantes']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila['etapa']; echo "</td>";
                                            echo "<td style='text-align:center'>
                                                    <a style='text-align:center; text-decoration: none; color: #000000; text-decoration: underline;' href='./detalle_asistencia.php?id_asistencia=".$var_fila['id_asistencia']."'><span style='text-align:center;'></span>Ver detalle</a>
                                                  </td>";
                                    echo "</tr>";

                                          }
                                    }
                                    
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
