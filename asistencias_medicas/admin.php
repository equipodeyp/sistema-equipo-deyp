<?php
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set("America/Mexico_City");
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
//Si la variable de sesión no existe,
//Se presume que la página aún no se ha actualizado.
if(!isset($_SESSION['already_refreshed'])){
  ////////////////////////////////////////////////////////////////////////////////
  $sentenciar=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
  $resultr = $mysqli->query($sentenciar);
  $rowr=$resultr->fetch_assoc();
  $areauser = $rowr['area'];
  $fecha = date('y/m/d H:i:sa');
  ////////////////////////////////////////////////////////////////////////////////
  $saveiniciosession = "INSERT INTO inicios_sesion(usuario, area, fecha_entrada)
                VALUES ('$name', '$areauser', '$fecha')";
  $res_saveiniciosession = $mysqli->query($saveiniciosession);
  ////////////////////////////////////////////////////////////////////////////////
//Establezca la variable de sesión para que no
//actualice de nuevo.
  $_SESSION['already_refreshed'] = true;
}

$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$user = $row['usuario'];
$m_user = $user;
$m_user = strtoupper($m_user);

// echo $m_user;



 ?>
<!DOCTYPE html>
<html lang="es">
<head>
<script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
  <!-- datatables JS -->
  <script type="text/javascript" src="../datatables/datatables.min.js"></script>
  <!-- para usar botones en datatables JS -->
  <script src="../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="../css/botones_estadistica.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/main2.css">
  <!--font awesome con CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>
<script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.8/shim.min.js" integrity="sha512-nPnkC29R0sikt0ieZaAkk28Ib7Y1Dz7IqePgELH30NnSi1DzG4x+envJAOHz8ZSAveLXAHTR3ai2E9DZUsT8pQ==" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.8/xlsx.full.min.js" integrity="sha512-NerWxp37F9TtBS1k1cr2TjyC9c8Qh6ghgqVBOYXaahgnBkVT6a8KVbO05Z8+LnIIom4CJSSQTZ3VbL396scK5w==" crossorigin="anonymous"></script>
<!-- barra de navegacion -->
<link rel="stylesheet" href="../css/breadcrumb.css">
<link rel="stylesheet" href="../css/expediente.css">
<!-- SCRIPT PARA EL MANEJO DE LA TABLA -->
  <script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
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
  <!-- estilo y js del mensaje de notificacion de que faltan medidas por validar -->
  <link rel="stylesheet" type="text/css" href="../css/toast.css"/>
  <!-- <script type="text/javascript" src="../js/toast.js"></script> -->
<!-- SCRIPT PARA EL MANEJO DE LA TABLA -->
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
// echo $permiso1;
// echo $permiso2;
// echo $permiso3;


if ($_SESSION['usuario'] == 'enlace_sub' || $permiso3 == 'agendar'){
  echo "
      <div class='notify-enlace'>

        <div class='notify-btn-enlace' id='notify-btn-enlace'>
          <button type='button' class='icon-button-enlace'>
          <span><img src='../image/asistencias_medicas/bell.png' width='60' height='60'></span>
          <span class='icon-button__badge-enlace' id='show_notif_enlace'>0</span>
          </button>
        </div>

        <div class='notify-menu-enlace' id='notify-menu-enlace'>
        </div>

      </div>
  ";

}

if($_SESSION['usuario'] == 'ejecucion_sub' || $permiso3 == 'solicitar'){
  echo "
      <div class='notify-ejecucion'>

        <div class='notify-btn-ejecucion' id='notify-btn-ejecucion'>
          <button type='button' class='icon-button-ejecucion'>
          <span><img src='../image/asistencias_medicas/bell.png' width='60' height='60'></span>
          <span class='icon-button__badge-ejecucion' id='show_notif_ejecucion'>0</span>
          </button>
        </div>

        <div class='notify-menu-ejecucion' id='notify-menu-ejecucion'>
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
        $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
        $result = $mysqli->query($sentencia);
        $row=$result->fetch_assoc();
        $genero = $row['sexo'];

        if ($genero=='mujer') {
          echo "<img style='text-align:center;' src='../image/mujerup.png' width='100' height='100'>";
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
            <?php
            if ($permiso1 === 'consulta') {
            ?>
            <li><a href="#" onclick="location.href='../consultores/admin.php'"><i class="color-icon fas fa-folder-open menu-nav--icon"></i><span class="menu-items" style="color: white; font-weight:bold;"> CONSULTAR EXPEDIENTES</span></a></li>
            <?php
            }
            ?>
        </ul>
        <br><br>
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


          <h4 style="text-align:center">
            <?php echo utf8_decode(strtoupper($row['area'])); ?> </span>
          </h4>

          <br>
          <br>

          <h2 style="text-align:center">MENÚ ASISTENCIAS MÉDICAS
          </h2>

        </div>
        <div class="row">
          <!-- <a href="new_exp.php" class="btn btn-primary">Nuevo Expediente</a> -->
        </div>
        <br>

<div>





<?php

$cl = "SELECT COUNT(*) as t FROM solicitud_asistencia WHERE id_servidor = '$m_user'";
$rcl = $mysqli->query($cl);
$fcl = $rcl->fetch_assoc();
// echo $fcl['t'];

$cl2 = "SELECT COUNT(*) as r FROM solicitud_asistencia";
$rcl2 = $mysqli->query($cl2);
$fcl2 = $rcl2->fetch_assoc();
// echo $fcl['t2'];


if ($user=='enlace_sub' || $permiso3 == 'agendar') {
  echo "
<ul class='ca-menu'>

<li style='text-align:center'>
  <a href='./solicitudes_registradas.php'>
    <span class='ca-icon'><img alt='' src='../image/asistencias_medicas/solicitar.png' style='width:55px;height:55px;'></span>
    <div class='ca-content'>
      <h2 class='ca-main'>AGENDAR</h2>
      <h3 class='ca-sub'>SOLICITUDES REGISTRADAS</h3></div>
  </a>
</li>

<li style='text-align:center'>
  <a href='./agenda/index.php'>
    <span class='ca-icon'><img alt='' src='../image/asistencias_medicas/agenda.png' style='width:55px;height:55px;'></span>
    <div class='ca-content'>
      <h2 class='ca-main'>CALENDARIO</h2>
      <h3 class='ca-sub'>ASISTENCIAS MÉDICAS PROGRAMADAS</h3></div>
  </a>
</li>

<li style='text-align:center'>
  <a href='./panel_asistencias_completadas.php'>
    <span class='ca-icon'><img alt='' src='../image/asistencias_medicas/detalle.png' style='width:55px;height:55px;'></span>
    <div class='ca-content'>
      <h2 class='ca-main'>DETALLE</h2>
      <h3 class='ca-sub'>ASISTENCIAS MÉDICAS COMPLETADAS</h3></div>
  </a>
</li>

";





      if ($fcl2['r'] > 0){

        echo "<li style='text-align:center'>
                <a href='./registrar_incidencia_asistencia.php'>
                  <span class='ca-icon'><img alt='' src='../image/asistencias_medicas/HELP-DESK.png' style='width:55px;height:55px;'></span>
                  <div class='ca-content'>
                    <h2 class='ca-main'>INCIDENCIA</h2>
                    <h3 class='ca-sub'>REGISTRAR UNA INCIDENCIA</h3></div>
                </a>
              </li>

              </ul>
            ";

      }

echo " </ul>
";

}

if ($user=='ejecucion_sub' || $permiso3 == 'solicitar') {
  echo "

<ul class='ca-menu' style='text-align:right'>

<li style='text-align:center'>
  <a href='./solicitar_asistencia.php'>
    <span class='ca-icon'><img alt='' src='../image/asistencias_medicas/registrar.png' style='width:60px;height:60px;'></span>
    <div class='ca-content'>
      <h2 class='ca-main'>SOLICITAR</h2>
      <h3 class='ca-sub'>NUEVA ASISTENCIA MÉDICA</h3></div>
  </a>
</li>


<li style='text-align:center'>
  <a href='./asistencia_turnada.php'>
    <span class='ca-icon'><img alt='' src='../image/asistencias_medicas/turnadas_asignadas.png' style='width:55px;height:55px;'></span>
    <div class='ca-content'>
      <h2 class='ca-main'>ASISTENCIAS MÉDICAS</h2>
      <h3 class='ca-sub'>TURNADAS Y/O ASIGNADAS</h3></div>
  </a>
</li>


<li style='text-align:center'>
  <a href='./agenda/index.php'>
    <span class='ca-icon'><img alt='' src='../image/asistencias_medicas/agenda.png' style='width:55px;height:55px;'></span>
    <div class='ca-content'>
      <h2 class='ca-main'>CALENDARIO</h2>
      <h3 class='ca-sub'>ASISTENCIAS MÉDICAS PROGRAMADAS</h3></div>
  </a>
</li>


<li style='text-align:center'>
  <a href='./panel_asistencias_completadas.php'>
    <span class='ca-icon'><img alt='' src='../image/asistencias_medicas/detalle.png' style='width:55px;height:55px;'></span>
    <div class='ca-content'>
      <h2 class='ca-main'>DETALLE</h2>
      <h3 class='ca-sub'>ASISTENCIAS MÉDICAS COMPLETADAS</h3></div>
  </a>
</li>


";


        if ($fcl['t'] >= 0){
                  echo "<li style='text-align:center'>
                    <a href='./registrar_incidencia_asistencia.php'>
                      <span class='ca-icon'><img alt='' src='../image/asistencias_medicas/HELP-DESK.png' style='width:55px;height:55px;'></span>
                      <div class='ca-content'>
                        <h2 class='ca-main'>INCIDENCIA</h2>
                        <h3 class='ca-sub'>REGISTRAR UNA INCIDENCIA</h3></div>
                    </a>
                  </li>
                  ";
        }


echo " </ul>
";
}
?>



    <a style='color:#fff;' href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a>


<?php
if ($_SESSION['usuario'] == 'enlace_sub' || $permiso3 == 'agendar'){
  echo "<script src='../js/notification_enlace.js'></script>";
  // echo $_SESSION['usuario'];
}

if($_SESSION['usuario'] == 'ejecucion_sub' || $permiso3 == 'solicitar'){
  echo "<script src='../js/notification_ejecucion.js'></script>";
  // echo $_SESSION['usuario'];
}


?>


</body>
</html>
