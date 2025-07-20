<?php
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set("America/Mexico_City");
/*require 'conexion.php';*/
include("./conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$check_consultaactividad = 1;
$_SESSION["check_consultaactividad"] = $check_consultaactividad;


$nombre_usuario = $_SESSION['usuario'];
// echo $nombre_usuario;

?>
<!DOCTYPE html>
<html lang="es">
<head>
<script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>BUSCAR ACTIVIDAD</title>
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
   <script src="../js/funciones_react.js"></script>
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
          echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
        }
         ?>
        <h6 style="text-align:center" class='user-nombre'> <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>


      <nav class="menu-nav">
              <li>
                  <a href="#" onclick="toggleSubmenu(this)">
                      <i class="color-icon fa-solid fa-book-atlas menu-nav--icon"></i>
                      <span class="menu-items" style="color: white; font-weight:bold;">INCIDENCIAS</span>
                      <i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i>
                  </a>
                  <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                      <li>
                          <a href="#" style="color:white; text-decoration:none;" onclick="location.href='./registrar_incidencia.php'">
                              <i class="fas fa-file-medical"></i> REGISTRAR INCIDENCIA
                          </a>
                      </li>
                      <!-- <li>
                          <a href="#" style="color:white; text-decoration:none;" onclick="location.href='./incidencias_registradas.php'">
                              <i class="fas fa-laptop-file"></i> CONSULTAR INCIDENCIA
                      </li> -->

                  </ul>
              </li>

      </nav>



    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../image/ups2.png" alt="" width="1400" height="70">
          <img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
      </div>
      <div class="container">
        <div class="row">
          <h1 style="text-align:center">
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
          </h1>
          <h5 style="text-align:center">
            <?php echo utf8_decode(strtoupper($row['area'])); ?> </span>
          </h5>
        </div>
        <br>



        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                  <h3 style="text-align:center">INCIDENCIAS REGISTRADAS</h3>

                  <tr>
                    <th style="text-align:center">#</th>
                    <th style="text-align:center">FOLIO INCIDENCIA</th>
                    <th style="text-align:center">SOLICITA</th>
                    <th style="text-align:center">FECHA Y HORA SOLICITUD</th>
                    <th style="text-align:center">TIPO DE FALLA</th>
                    <th style="text-align:center">ESTATUS</th>
                    <th style="text-align:center">DETALLE</th>

                  </tr>

                  </thead>
                  <tbody>
                    <?php
                    $user_solicitud = $_SESSION['usuario'];
                    // echo $user_solicitud;
                    $contador = 0;
                          $query= "SELECT*
                                    FROM incidencias
                                    WHERE incidencias.usuario = '$user_solicitud'
                                    ORDER BY incidencias.fecha_solicitud DESC";

                          $rq = $mysqli->query($query);
                              while($row = $rq->fetch_assoc()){
                                $contador = $contador + 1;
                                $id_incidencia = $row['id'];
                                // echo $id_incidencia;
                                    ?>
                                    
                                    <?php
                                      echo "<tr>";
                                      echo "<td style='text-align:center'>"; echo $contador; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $row['folio_incidencia']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $row['servidor_registra']; echo "</td>";
                                                  
                                      $originalDate1 = $row['fecha_solicitud'];
                                      $date1 = date("d/m/Y", strtotime($originalDate1));
                                                  
                                      echo "<td style='text-align:center'>"; echo $date1.' '.$row['hora_solicitud']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $row['tipo_falla']; echo "</td>";
                                      echo "<td style='text-align:center'>"; 
                                      
                                      $res = $row['estatus'];
                                      if ($res == 'ATENDIDA'){
                                      echo "<button style='display: block; margin: 0 auto;' disabled class='btn btn-success'>$res</button>";
                                      } elseif ($res == 'CANCELADA'){
                                      echo "<button style='display: block; margin: 0 auto;' disabled class='btn btn-danger'>$res</button>";
                                      } elseif ($res == 'EN PROCESO'){
                                      echo "<button style='display: block; margin: 0 auto;' disabled class='btn btn-warning'>$res</button>";
                                      }
                                                            
                                      echo "<td style='text-align:center'>"; 
                                    ?>
                                      
                                      <a style="text-decoration: underline;" href="" data-toggle="modal" data-target="#myModal<?php echo $id_incidencia;?>" class="btn color-btn-success btn-sm">
                                        <i class="fa fas-regular fa-id-card"></i>
                                      </a>

                                    <?php
                                      echo "</td>";
                                      echo "</tr>";
                                    ?>



                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal<?php echo $id_incidencia;?>" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                              <div id="body">

                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <div class="">
                                                    <img style="float: left;" src="../image/FGJEM.png" width="50" height="50">
                                                    <img style="float: right;" src="../image/ESCUDO.png" width="60" height="50">
                                                    <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
                                                </div>

                                                </div>

                                                <div class="modal-body">
                                                    <h4 style="text-align:center" class="modal-title">DETALLE DE LA INCIDENCIA REGISTRADA</h4>
                                                    
                                                    <br>

                                                    <form>

                                                      <div class="form-group row">

                                                        <label style="text-align:right" class="col-sm-4 col-form-label">Folio Incidencia:</label>
                                                        <div class="col-sm-6">
                                                          <input type="text" class="form-control" readonly value="<?php echo $row['folio_incidencia'];?>">
                                                        </div>

                                                      </div>

                                                      <div class="form-group row">
                                                      <?php
                                                        $originalDate = $row['fecha_solicitud'];
                                                        $date = date("d/m/Y", strtotime($originalDate));
                                                      ?>
                                                        <label style="text-align:right" class="col-sm-4 col-form-label">Fecha de Solicitud:</label>
                                                        <div class="col-sm-6">
                                                          <input type="text" class="form-control" readonly value="<?php echo $date.' '.$row['hora_solicitud'] ;?>">
                                                        </div>
                                                        
                                                      </div>

                                                      <div class="form-group row">

                                                        <label style="text-align:right" class="col-sm-4 col-form-label">Servidor Público:</label>
                                                        <div class="col-sm-6">
                                                          <input type="text" class="form-control" readonly value="<?php echo $row['servidor_registra'];?>">
                                                        </div>
                                                        
                                                      </div>


                                                      <div class="form-group row">

                                                        <label style="text-align:right" class="col-sm-4 col-form-label">Apartado:</label>
                                                        <div class="col-sm-6">
                                                          <input type="text" class="form-control" readonly value="<?php echo $row['apartado_sippsipped'];?>">
                                                        </div>
                                                        
                                                      </div>

                                                      

                                                      <?php 
                                                      if ($row['folio_expediente'] != "NO APLICA"){
                                                      $fol = $row['folio_expediente'];
                                                      echo "
                                                      <div class='form-group row'>
                                                        <label style='text-align:right' class='col-sm-4 col-form-label'>Expediente de protección:</label>
                                                        <div class='col-sm-6'>
                                                          <input type='text' class='form-control' readonly value='$fol'>
                                                        </div>
                                                      </div>
                                                      ";
                                                      }
                                                      ?>

                                                      <?php 
                                                      if ($row['id_sujeto'] != "NO APLICA"){
                                                      $id_suj = $row['id_sujeto'];
                                                      echo "
                                                      <div class='form-group row'>
                                                        <label style='text-align:right' class='col-sm-4 col-form-label'>ID Sujeto:</label>
                                                        <div class='col-sm-6'>
                                                          <input type='text' class='form-control' readonly value='$id_suj'>
                                                        </div>
                                                      </div>
                                                      ";
                                                      }
                                                      ?>

                                                      <?php 
                                                      if ($row['id_asistencia_medica'] != "NO APLICA"){
                                                      $id_as = $row['id_asistencia_medica'];
                                                      echo "
                                                      <div class='form-group row'>
                                                        <label style='text-align:right' class='col-sm-4 col-form-label'>Id Asistencia Médica:</label>
                                                        <div class='col-sm-6'>
                                                          <input type='text' class='form-control' readonly value='$id_as'>
                                                        </div>
                                                      </div>
                                                      ";
                                                      }
                                                      ?>




                                                      <div class="form-group row">

                                                        <label style="text-align:right" class="col-sm-4 col-form-label">Tipo de falla:</label>
                                                        <div class="col-sm-6">
                                                          <input type="text" class="form-control" readonly value="<?php echo $row['tipo_falla'];?>">
                                                        </div>
                                                        
                                                      </div>

                                                      <div class="form-group row">

                                                        <label style="text-align:right" class="col-sm-4 col-form-label">Descripción de la Falla:</label>
                                                        <div class="col-sm-6">
                                                          <textarea rows="5" cols="33" type="text" class="form-control" readonly placeholder="<?php echo $row['descripcion_falla'];?>"></textarea>
                                                        </div>
                                                        
                                                      </div>



                                                      <div class="form-group row">

                                                        <label style="text-align:right" class="col-sm-4 col-form-label">Usuario en Atención:</label>
                                                        <div class="col-sm-6">
                                                          <input type="text" class="form-control" readonly value="<?php echo $row['usuario_atencion'];?>">
                                                        </div>
                                                        
                                                      </div>

                                                      <?php 
                                                      if ($row['respuesta'] != ""){
                                                      $resp = $row['respuesta'];
                                                      echo "
                                                      <div class='form-group row'>
                                                        <label style='text-align:right' class='col-sm-4 col-form-label'>Respuesta:</label>
                                                        <div class='col-sm-6'>
                                                          <input type='text' class='form-control' readonly value='$resp'>
                                                        </div>
                                                      </div>
                                                      ";
                                                      }
                                                      ?>

                                                      <?php 
                                                      if ($row['fecha_hora_atencion'] != ""){
                                                      $fyh = $row['fecha_hora_atencion'];
                                                      $originalDate2 = $row['fecha_hora_solicitud'];
                                                      $date2 = date("d/m/Y", strtotime($originalDate2));
                                                      echo "
                                                      <div class='form-group row'>
                                                        <label style='text-align:right' class='col-sm-4 col-form-label'>Fecha y hora atención:</label>
                                                        <div class='col-sm-6'>
                                                          <input type='text' class='form-control' readonly value='$date2'>
                                                        </div>
                                                      </div>
                                                      ";
                                                      }
                                                      ?>



                                                      <div class="form-group row">

                                                        <label style="text-align:right" class="col-sm-4 col-form-label">Estatus Incidencia:</label>
                                                        <div class="col-sm-6">
                                                          <input type="text" class="form-control" readonly value="<?php echo $row['estatus'];?>">
                                                        </div>
                                                        
                                                      </div>
                                                    
                                                      <br>



                                                </form>                                         
                                              </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <!-- <a class="btn btn-primary btn-lg" href="javascript:imprimirSeleccion('body')">
                                                      Imprimir
                                                    </a> -->

                                                    <a class="btn btn-danger btn-lg" data-dismiss="modal">
                                                      Cerrar
                                                    </a>
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

  <a href="./menu.php" class="btn-flotante">INICIO</a>




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

