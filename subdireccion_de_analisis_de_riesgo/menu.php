<?php
/*require 'conexion.php';*/
// error_reporting(0);
date_default_timezone_set("America/Mexico_City");
include("conexion.php");
include("actualizar_automaticamente_alerta_convenios.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
//Si la variable de sesión no existe,
//Se presume que la página aún no se ha actualizado.
// if(!isset($_SESSION['already_refreshed'])){
//   ////////////////////////////////////////////////////////////////////////////////
//   $sentenciar=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
//   $resultr = $mysqli->query($sentenciar);
//   $rowr=$resultr->fetch_assoc();
//   $areauser = $rowr['area'];
//   $fecha = date('y/m/d H:i:sa');
//   ////////////////////////////////////////////////////////////////////////////////
//   $saveiniciosession = "INSERT INTO inicios_sesion(usuario, area, fecha_entrada)
//                 VALUES ('$name', '$areauser', '$fecha')";
//   $res_saveiniciosession = $mysqli->query($saveiniciosession);
//   ////////////////////////////////////////////////////////////////////////////////
// //Establezca la variable de sesión para que no
// //actualice de nuevo.
//   $_SESSION['already_refreshed'] = true;
// }
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$user = $row['usuario'];
// echo $user;


$m_user = $user;
$m_user = strtoupper($m_user);
// echo $user;

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
<!-- funciones de react  -->
 <script src="../js/funciones_react.js"></script>
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
  <!-- SCRIPT PARA REFRESCAR MENU.PHP Y MOSTRAR ALERTAS DE TERMINOS DE CONVENIOS -->
<!-- <script>
  let segundos_recarga = 9;
  let miFecha = new Date();
  let dato_url = miFecha.getYear().toString() + miFecha.getMonth().toString() + miFecha.getDate().toString() + miFecha.getHours().toString() + miFecha.getMinutes().toString() + miFecha.getSeconds().toString();
  setTimeout( function() {
    window.location = `menu.php`;
  }, segundos_recarga * 1000);
</script> -->
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
  /*  */
  .submenu3 {
    display: none;
  }
  .opacity3 {
    /* opacity: 100%; */
  }
  /*  */
  </style>

<link rel="stylesheet" href="../css/button_notification.css" type="text/css">


</head>
<body>



<?php
// echo 'hola';
$sentencia=" SELECT * FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$genero = $row['sexo'];
$id_user = $row['id'];

$userfijo=" SELECT * FROM usuarios_servidorespublicos WHERE id_usuarioprincipal='$id_user'";
$ruserfijo = $mysqli->query($userfijo);
$fuserfijo=$ruserfijo->fetch_assoc();
$permiso1 = $fuserfijo['permiso1'];
$permiso2 = $fuserfijo['permiso2'];
$permiso3 = $fuserfijo['permiso3'];
$permiso4 = $fuserfijo['permiso4'];
$permiso5 = $fuserfijo['permiso5'];
$permiso6 = $fuserfijo['permiso6'];
$permiso7 = $fuserfijo['permiso7'];
$permiso8 = $fuserfijo['permiso8'];

// echo $permiso1;
// echo $permiso2;
// echo $permiso3;
// echo $permiso4;
// echo $permiso5;
// echo $permiso6;
// echo $permiso7;
// echo $permiso8;



$cl = "SELECT COUNT(*) as t FROM solicitud_asistencia WHERE id_servidor = '$m_user'";
$rcl = $mysqli->query($cl);
$fcl = $rcl->fetch_assoc();
// echo $fcl['t'];

if ($permiso3=='solicitar') {
  echo "

<div class='notify-analisis'>


  <div class='notify-btn-analisis' id='notify-btn-analisis'>
    <button type='button' class='icon-button-analisis'>
    <span><img src='../image/asistencias_medicas/bell.png' width='60' height='60'></span>
    <span class='icon-button__badge-analisis' id='show_notif_analisis'>0</span>
    </button>
  </div>

  <div class='notify-menu-analisis' id='notify-menu-analisis'>
  </div>

</div>

";
}
?>

  <div class="contenedor">
    <div class="sidebar ancho">
      <div class="logo text-warning">
      </div>
      <div class="user">
        <?php
        $sentencia=" SELECT * FROM usuarios WHERE usuario='$name'";
        $result = $mysqli->query($sentencia);
        $row=$result->fetch_assoc();
        $genero = $row['sexo'];
        $id_user = $row['id'];

        $userfijo=" SELECT * FROM usuarios_servidorespublicos WHERE id_usuarioprincipal='$id_user'";
        $ruserfijo = $mysqli->query($userfijo);
        $fuserfijo=$ruserfijo->fetch_assoc();
        $permiso1 = $fuserfijo['permiso1'];
        $permiso2 = $fuserfijo['permiso2'];
        $permiso3 = $fuserfijo['permiso3'];
        $permiso4 = $fuserfijo['permiso4'];
        $permiso5 = $fuserfijo['permiso5'];
        $permiso6 = $fuserfijo['permiso6'];
        $permiso7 = $fuserfijo['permiso7'];
        $permiso8 = $fuserfijo['permiso8'];
        // echo $permiso1;

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
              <li><a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio"><i class='color-icon fas fa-file-pdf menu-nav--icon'></i><span class="menu-items" style="color: white; font-weight:bold;" > GLOSARIO</span></a></li>
              <li><a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio2"><i class='color-icon fas fa-file-pdf menu-nav--icon'></i><span class="menu-items" style="color: white; font-weight:bold;" > MANUAL DE USUARIO</span></a></li>
              <li><a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio1"><i class='color-icon fas fa-file-pdf menu-nav--icon'></i><span class="menu-items" style="color: white; font-weight:bold;" > MANUAL TECNICO</span></a></li>
              <?php
              if ($row['cargo'] === 'subdirector') {
              ?>
              <li id="liestadistica3" class="subtitle3">
                  <a href="#" class="action3"><i class='color-icon fa-sharp fa-solid fa-file-invoice menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white; font-weight:bold;"> REPORTES</span></a>
                  <ul class="submenu3">
                    <li id="liexpediente" class="menu-items"><a href="../subdireccion_de_analisis_de_riesgo/ver_reporte_diario.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-calendar-day  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> DIARIO</span></a></li>
                    <li id="limedidas" class="menu-items"><a href="../subdireccion_de_analisis_de_riesgo/ver_reporte_semanal.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-sharp fa-solid fa-calendar-week menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> SEMANAL <br />   </span></a></li>
                    <li id="lipersonas" class="menu-items"><a href="../subdireccion_de_analisis_de_riesgo/ver_reporte_mensual.php">&nbsp;&nbsp;&nbsp;<i class="color-icon fa-solid fa-calendar-days menu-nav--icon fa-fw"></i><span class="menu-items" style="color: white;"> MENSUAL</span></a></li>
                    <li id="limedidas" class="menu-items"><a href="../subdireccion_de_analisis_de_riesgo/ver_reporte_anual.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-calendar menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> ANUAL <br /> </span></a></li>
                    <li id="limedidas" class="menu-items"><a href="../subdireccion_de_analisis_de_riesgo/ver_reporte_semestral.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-person-circle-plus  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> SEMESTRAL</span></a></li>
                  </ul>
              </li>
              <?php
              }
              ?>

              <li>
                  <a href="#" onclick="toggleSubmenu(this)">
                      <i class="color-icon fa-solid fa-book-atlas menu-nav--icon"></i>
                      <span class="menu-items" style="color: white; font-weight:bold;">REACT</span>
                      <i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i>
                  </a>
                  <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                      <li>
                          <a href="#" style="color:white; text-decoration:none;" onclick="location.href='./registrar_actividad.php'">
                              <i class="fas fa-file-medical"></i> REGISTRAR ACTIVIDAD
                          </a>
                      </li>
                      <li>
                          <a href="#" style="color:white; text-decoration:none;" onclick="location.href='./buscar_actividad.php'">
                              <i class="fas fa-laptop-file"></i> BUSCAR ACTIVIDAD
                          </a>
                      </li>
                      <li>
                          <a href="#" style="color:white; text-decoration:none;" onclick="location.href='./consultar_cifras_actividad.php'">
                              <i class="fas fa-search"></i> CONSULTAR CIFRAS
                          </a>
                      </li>
                  </ul>
              </li>
          </ul>



            <ul>
                <li>
                  <a href="#" onclick="toggleSubmenu(this)">
                      <i class="color-icon fa-solid fa-headset menu-nav--icon"></i>
                      <span class="menu-items" style="font-size: 15px; color: white; font-weight:bold;">INCIDENCIAS</span>
                      <i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i>
                  </a>
                  <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                      <li>
                          <a href="#" style="font-size: 15px; color:white; text-decoration:none;" onclick="location.href='./registrar_incidencia.php'">
                              <i class="fas fa-file-medical"></i> REGISTRAR INCIDENCIA
                          </a>
                      </li>
                      <li>
                          <a href="#" style="font-size: 15px; color:white; text-decoration:none;" onclick="location.href='./incidencias_registradas.php'">
                              <i class="fas fa-laptop-file"></i> CONSULTAR INCIDENCIA
                          </a>
                      </li>
                  </ul>
              </li>
            </ul>



          <br><br>
          <ul>
				    <?php

              if ($permiso1 === 'consulta') {
              echo "
              <a style='text-align:center' class='user-nombre' href='../consultores/admin.php'><button type='button' class='btn btn-light'> C O N S U L T A R <br> E X P E D I E N T E S</button> </a>
              ";
              }


              if ($permiso2 === 'validar') {
                echo "
                <a style='text-align:center' class='user-nombre' href='./medidasavalidar.php'><button type='button' class='btn btn-light'>VALIDAR MEDIDAS </button> </a>
							";

              }

		   				if ($permiso3 ==='solicitar' || $permiso4 ==='calendario') {
							echo "
                <a style='text-align:center' class='user-nombre' href='./menu_asistencias_medicas.php'><button type='button' class='btn btn-light'>MENÚ ASISTENCIAS <br> MÉDICAS</button> </a>
							";
						  }

              if ($permiso5 ==='instrumento') {
                echo "
                  <a style='text-align:center' class='user-nombre' href='./menu_instrumento.php'><button type='button' class='btn btn-light'>I N S T R U M E N T O <br> DE ADAPTABILIDAD</button> </a>
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
        <!--Ejemplo tabla con DataTables-->
        <div class="row" id="show_alert" style="display:none;">
          <table id="example22" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <h3 style="text-align:center">¡ALERTA HAY CONVENIOS POR FINALIZAR!</h3>
                <tr>
                    <th style="text-align:center">NO.</th>
                    <th style="text-align:center">EXPEDIENTE</th>
                    <th style="text-align:center">ID PERSONA</th>
                    <th style="text-align:center">FECHA DE INICIO DEL CONVENIO</th>
                    <th style="text-align:center">FECHA DE TERMINO DEL CONVENIO</th>
                    <th style="text-align:center">DIAS RESTANTES</th>
                    <th style="text-align:center">OBSERVACIONES</th>
                    <th style="text-align:center">SEMAFORO</th>
                    <th style="text-align:center">SEGUIMIENTO</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $contador = 0;
              $obtenfechaactualprincipal1 = date('Y-m-d'); echo "<br>";
              $obtenfechaactualprincipal2 = date('Y-m-d');
              $obtenfechaactualprincipal3 = date("Y-m-d",strtotime($obtenfechaactualprincipal2."- 4 days"));
              $get3dyas= "SELECT * FROM alerta_convenios WHERE estatus != 'HECHO' AND fecha_termino BETWEEN '$obtenfechaactualprincipal3' AND '$obtenfechaactualprincipal1' ORDER BY fecha_termino ASC";
              $rget3dyas = $mysqli->query($get3dyas);
              while ($fget3dyas = $rget3dyas->fetch_assoc()) {
                $contador = $contador + 1;
                ?>
                <tr>
                  <td style="text-align:center"><?php echo $contador ?></span></td>
                  <td style="text-align:center"><?php echo $fget3dyas['expediente']; ?></span></td>
                  <td style="text-align:center"><?php echo $fget3dyas['id_unico']; ?></span></td>
                  <td style="text-align:center"><?php echo $fget3dyas['fecha_inicio']; ?></span></td>
                  <td style="text-align:center"><?php echo $fget3dyas['fecha_termino']; ?></span></td>
                  <td style="text-align:center"><?php echo '0'; ?></span></td>
                  <td style="text-align:center">
                    <?php
                    echo "<a href='#edit_".$fget3dyas['id']."' class='btn color-btn-success btn-sm' data-toggle='modal'><i class='fa-solid fa-file-pen'></i>VER</a>";
                     ?>
                  </td>
                  <td style="text-align:center"><?php
                  echo '	  <div class="alert alert-info alert-dismissable fade in">
                              <strong style="color:#000000">¡FINALIZADO!</strong>
                            </div> ';
                  ?></span></td>
                  <td style="text-align:center"><?php echo 'TERMINADO'; ?></span></td>
                  <?php include('add_observacion_alerta1.php'); ?>
                </tr>
                <?php

              }
                    $query= "SELECT * FROM alerta_convenios WHERE estatus = 'PENDIENTE' AND dias_restantes BETWEEN 1 AND 15 ORDER BY dias_restantes ASC";
                    $rq = $mysqli->query($query);
                       while($row = $rq->fetch_assoc()){
                         $contador = $contador + 1;
                         $id_per = $row['id_persona'];
                         $dper = "SELECT * FROM alerta_convenios WHERE id = '$id_per'";
                         $rdper = $mysqli->query($dper);
                         $fdper = $rdper->fetch_assoc();
                         ///////////////////////////////////////////////////////
                         $diasfaltantesent = $row['dias_restantes'];
                         $idpersonal_ent = $row['id_unico'];
                         $foliopersonaexpediente_ent = $row['expediente'];
                         $diasfaltantesent = $row['dias_restantes'];
                         if ($diasfaltantesent === 1) {
                           $qued_ent = 'QUEDA';
                         }else {
                           $qued_ent = 'QUEDAN';
                         }
                         if ($diasfaltantesent === 1) {
                           $dia_ent = 'DÍA';
                         }else {
                           $dia_ent = 'DÍAS';
                         }
              ?>

              <tr>
                 <td style="text-align:center"><?php echo $contador ?></span></td>
                 <td style="text-align:center"><?php echo $row['expediente']; ?></span></td>
                 <td style="text-align:center"><?php echo $row['id_unico']; ?></span></td>
                 <td style="text-align:center"><?php echo $row['fecha_inicio']; ?></span></td>
                 <td style="text-align:center"><?php echo $row['fecha_termino']; ?></span></td>
                 <td style="text-align:center"><?php echo $row['dias_restantes']; ?></span></td>
                 <td style="text-align:center">
                   <?php
                   echo "<a href='#edit_".$row['id']."' class='btn color-btn-success btn-sm' data-toggle='modal'><i class='fa-solid fa-file-pen'></i>VER</a>";
                    ?>
                 </td>
                 <td style="text-align:center">
                   <?php
                   if ($row['semaforo'] === 'ROJO') {
                     // echo '<script type="text/javascript">toastr.error("'.$qued_ent.' '.$diasfaltantesent.' '.$dia_ent.' PARA QUE SE TERMINE EL CONVENIO DE ENTENDIMIENTO DEL SUJETO '.$idpersonal_ent.' DEL EXPEDIENTE '.$foliopersonaexpediente_ent.' ")</script>';
                     echo '	  <div class="alert alert-danger alert-dismissable fade in">
                                 <strong style="color:#000000">¡ATENCIÓN!</strong>
                               </div> ';
                   }elseif ($row['semaforo'] === 'AMARILLO') {
                     // echo '<script type="text/javascript">toastr.warning("'.$qued_ent.' '.$diasfaltantesent.' '.$dia_ent.' PARA QUE SE TERMINE EL CONVENIO DE ENTENDIMIENTO DEL SUJETO '.$idpersonal_ent.' DEL EXPEDIENTE '.$foliopersonaexpediente_ent.' ")</script>';
                     echo '	  <div class="alert alert-warning alert-dismissable fade in">
                                 <strong style="color:#000000">¡ALERTA!</strong>
                               </div> ';
                   }elseif ($row['semaforo'] === 'VERDE') {
                     // echo '<script type="text/javascript">toastr.success("'.$qued_ent.' '.$diasfaltantesent.' '.$dia_ent.' PARA QUE SE TERMINE EL CONVENIO DE ENTENDIMIENTO DEL SUJETO '.$idpersonal_ent.' DEL EXPEDIENTE '.$foliopersonaexpediente_ent.' ")</script>';
                     echo '	  <div class="alert alert-success alert-dismissable fade in">
                                 <strong style="color:#000000; text-align:center">PRECAUCIÓN!</strong>
                               </div> ';
                   }
                    ?>
                 </td>
                 <td style="text-align:center"><?php echo $row['estatus']; ?></span></td>
                 <?php include('add_observacion_alerta.php'); ?>
               </tr>
              <?php
               }
              ?>
            </tbody>
           </table>
        </div>
        <!-- <?php
        echo $_SESSION['usuario'];
        if ($_SESSION['usuario'] === 'analisis2') {
        ?>
        <div class="">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                              <h3 style="text-align:center">Registros para instrumento de adaptabilidad</h3>
                                <tr>
                                    <th style="text-align:center">NO</th>
                                    <th style="text-align:center">FECHA DE RECEPCION DE LA SOLICITUD DE INCORPORACION AL PROGRAMA</th>
                                    <th style="text-align:center">FOLIO DEL EXPEDIENTE DE PROTECCION</th>
                                    <th style="text-align:center">PERSONAS PROPUESTAS</th>
                                    <th style="text-align:center">MEDIDAS DE APOYO OTORGADAS</th>
                                    <th style="text-align:center">VALIDACION DEL EXPEDIENTE DE PROTECCION</th>
                                    <th style="text-align:center">DETALLES</th>

                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $contador = 0;
                              $sql = "SELECT * FROM expediente";
                              $resultado = $mysqli->query($sql);
                              $row = $resultado->fetch_array(MYSQLI_ASSOC);
                              $fol_exp =$row['fol_exp'];

                              $tabla="SELECT * FROM expediente";
                              $var_resultado = $mysqli->query($tabla);

                              while ($var_fila=$var_resultado->fetch_array())
                              {
                                $contador = $contador + 1;
                                $fol_exp2=$var_fila['fol_exp'];

                                $cant="SELECT COUNT(*) AS cant FROM medidas WHERE folioexpediente = '$fol_exp2'";
                                $r=$mysqli->query($cant);
                                $row2 = $r->fetch_array(MYSQLI_ASSOC);

                                $abc="SELECT count(*) as c FROM datospersonales WHERE folioexpediente='$fol_exp2'";
                                $result=$mysqli->query($abc);
                                if($result)
                                {
                                  while($row=mysqli_fetch_assoc($result))
                                  {
                                    echo "<tr>";
                                    echo "<td style='text-align:center'>"; echo $contador; echo "</td>";
                                    // echo "<td style='text-align:center'>"; echo $var_fila['num_consecutivo'].'/'. $var_fila['año']; echo "</td>";
                                    // echo "<td style='text-align:center'>"; echo $var_fila['sede']; echo "</td>";
                                    // echo "<td style='text-align:center'>"; echo $var_fila['municipio']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $var_fila['fecharecep']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $var_fila['fol_exp']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $row['c']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $row2['cant']; echo "</td>";
                                    echo "<td style='text-align:center'>"; if ($var_fila['validacion'] == 'true') {
                                      echo "<i class='fas fa-check'></i>";
                                    }elseif ($var_fila['validacion'] == 'false') {
                                      echo "<i class='fas fa-times'></i>";
                                    } echo "</td>";
                                    echo "<td style='text-align:center'><a href='detalles_expediente.php?folio=".$var_fila['fol_exp']."'><span class='glyphicon glyphicon-folder-open color-icon'></span></a></td>";

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
        <?php
        }
        ?> -->
      </div>
    </div>

  <div class="contenedor">
    <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a>
  </div>

  <!-- modal del glosario -->
  <div class="modal fade" id="add_data_Modal_convenio" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center" class="modal-title" id="myModalLabel">GLOSARIO SIPPSIPPED</h4>
        </div>
        <div class="modal-body">
          <div className="modal">
            <div className="modalContent">
              <iframe src="../docs/GLOSARIO-SIPPSIPPED.pdf" style="width:870px; height:600px;" ></iframe>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button style="display: block; margin: 0 auto;" type="button" class="btn color-btn-success" data-dismiss="modal">CERRAR</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="add_data_Modal_convenio2" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center" class="modal-title" id="myModalLabel">MANUAL DE USUARIO</h4>
        </div>
        <div class="modal-body">
          <div className="modal">
            <div className="modalContent">
              <iframe src="../docs/MANUALDEUSUARIO.pdf" style="width:870px; height:600px;" ></iframe>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button style="display: block; margin: 0 auto;" type="button" class="btn color-btn-success" data-dismiss="modal">CERRAR</button>
        </div>
      </div>
    </div>
  </div>



  <div class="modal fade" id="add_data_Modal_convenio1" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center" class="modal-title" id="myModalLabel">MANUAL TECNICO SIPPSIPPED</h4>
        </div>
        <div class="modal-body">
          <div className="modal">
            <div className="modalContent">
              <iframe src="../docs/MANUALTECNICO-SIPPSIPPED.pdf" style="width:870px; height:600px;" ></iframe>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button style="display: block; margin: 0 auto;" type="button" class="btn color-btn-success" data-dismiss="modal">CERRAR</button>
        </div>
      </div>
    </div>
  </div>
  <!-- fin modal  -->
  <?php
  $mostraralert = "SELECT COUNT(*) AS total FROM alerta_convenios WHERE estatus = 'PENDIENTE' AND dias_restantes BETWEEN 1 AND 15";
  $rmostraralert = $mysqli -> query($mostraralert);
  $fmostraralert = $rmostraralert -> fetch_assoc();
  $restotal = $fmostraralert['total'];
  ?>
<script type="text/javascript">
<?php
echo "var totalconvenios = '$restotal';";
?>
if (totalconvenios > 0) {
document.getElementById('show_alert').style.display = "";
}else {
  document.getElementById('show_alert').style.display = "none";
}
</script>


<script src='../js/notification_analisis.js'></script>

<script>
  // CODIGO DE MENU CON submenu3
  $(".subtitle3 .action3").click(function(event){
   var subtitle3 = $(this).parents(".subtitle3");
   var submenu3 = $(subtitle3).find(".submenu3");

   $(".submenu3").not($(submenu3)).slideUp("slow").removeClass("opacity");
   $(".open").not($(subtitle3)).removeClass("open");

   $(subtitle3).toggleClass("open");
   $(submenu3).slideToggle("slow").toggleClass("opacity");

   return false;
  });
</script>
</body>
</html>
