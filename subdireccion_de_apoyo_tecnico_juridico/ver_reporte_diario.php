<?php
/*require 'conexion.php';*/
date_default_timezone_set("America/Mexico_City");
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
// echo"$name";
?>
<!DOCTYPE html>
<html lang="es">
<head>
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
  <link rel="stylesheet" type="text/css" href="../css/toast.css"/>
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <style media="screen">
  /*  */
  .submenu3 {
    display: none;
  }
  .opacity3 {
    /* opacity: 100%; */
  }
  /*  */
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
        <h6 style="text-align:center" class='user-nombre'> <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">
        <ul>
          <li id="liestadistica3" class="subtitle3">
            <a href="#" class="action3"><i class='color-icon fa-sharp fa-solid fa-file-invoice menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white; font-weight:bold;"> REPORTES</span></a>
            <ul class="submenu3">
              <!-- <li id="liexpediente" class="menu-items"><a href="">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-calendar-day  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> DIARIO</span></a></li> -->
              <li id="limedidas" class="menu-items"><a href="../subdireccion_de_apoyo_tecnico_juridico/ver_reporte_semanal.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-sharp fa-solid fa-calendar-week menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> SEMANAL <br />   </span></a></li>
              <li id="lipersonas" class="menu-items"><a href="../subdireccion_de_apoyo_tecnico_juridico/ver_reporte_mensual.php">&nbsp;&nbsp;&nbsp;<i class="color-icon fa-solid fa-calendar-days menu-nav--icon fa-fw"></i><span class="menu-items" style="color: white;"> MENSUAL</span></a></li>
              <li id="limedidas" class="menu-items"><a href="../subdireccion_de_apoyo_tecnico_juridico/ver_reporte_anual.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-calendar menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> ANUAL <br /> </span></a></li>
              <li id="limedidas" class="menu-items"><a href="../subdireccion_de_apoyo_tecnico_juridico/ver_reporte_semestral.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-person-circle-plus  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> SEMESTRAL</span></a></li>
            </ul>
          </li>
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
        <!-- <h1 style="text-align:center">REPORTE POR DIA</h1> -->
        <!--Ejemplo tabla con DataTables-->
        <div class="secciones form-horizontal sticky breadcrumb flat">
          <a href="../subdireccion_de_apoyo_tecnico_juridico/menu.php">REGISTROS</a>
          <a class="actived">REPORTE DIARIO</a>
        </div>
<?php
date_default_timezone_set("America/Mexico_City");
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
// echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
$fecha_actual = date("Y-m-d");
$day = date("l");
switch ($day) {
    case "Sunday"://DOMINGO
           $fecha_domingo =  date("Y-m-d",strtotime($fecha_actual));
           $fecha_lunes =  date("Y-m-d",strtotime($fecha_actual." + 1 day"));
           $fecha_martes =  date("Y-m-d",strtotime($fecha_actual." + 2 day"));
           $fecha_miercoles =  date("Y-m-d",strtotime($fecha_actual." + 3 day"));
           $fecha_jueves =  date("Y-m-d",strtotime($fecha_actual." + 4 day"));
           $fecha_viernes =  date("Y-m-d",strtotime($fecha_actual." + 5 day"));
           $fecha_sabado =  date("Y-m-d",strtotime($fecha_actual." + 6 day"));
           $fech = date("dmY");
           $fechdomingo =  date("dmY",strtotime($fecha_actual." - 4 day"));
           $day = date("z");
           $ddomingo = $day ;
           $dddomingo = '('.$ddomingo.') RD_'.$fechdomingo;
    break;
    case "Monday"://LUNES
           $fecha_domingo =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           $fecha_lunes =  date("Y-m-d",strtotime($fecha_actual));
           $fecha_martes =  date("Y-m-d",strtotime($fecha_actual." + 1 day"));
           $fecha_miercoles =  date("Y-m-d",strtotime($fecha_actual." + 2 day"));
           $fecha_jueves =  date("Y-m-d",strtotime($fecha_actual." + 3 day"));
           $fecha_viernes =  date("Y-m-d",strtotime($fecha_actual." + 4 day"));
           $fecha_sabado =  date("Y-m-d",strtotime($fecha_actual." + 5 day"));
           $fech = date("dmY");
           $fechdomingo =  date("dmY",strtotime($fecha_actual." - 1 day"));
           $day = date("z");
           $ddomingo = $day;
           $dddomingo = '('.$ddomingo.') RD_'.$fechdomingo;
    break;
    case "Tuesday"://MARTES
           $fecha_domingo =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
           $fecha_lunes =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           $fecha_martes =  date("Y-m-d",strtotime($fecha_actual));
           $fecha_miercoles =  date("Y-m-d",strtotime($fecha_actual." + 1 day"));
           $fecha_jueves =  date("Y-m-d",strtotime($fecha_actual." + 2 day"));
           $fecha_viernes =  date("Y-m-d",strtotime($fecha_actual." + 3 day"));
           $fecha_sabado =  date("Y-m-d",strtotime($fecha_actual." + 4 day"));
           $fech = date("dmY");
           $fechdomingo =  date("dmY",strtotime($fecha_actual." - 2 day"));
           $fechlunes =  date("dmY",strtotime($fecha_actual." - 1 day"));
           $day = date("z");
           $ddomingo = $day - 1;
           $dlunes = $day;
           $dddomingo = '('.$ddomingo.') RD_'.$fechdomingo;
           $ddlunes = '('.$dlunes.') RD_'.$fechlunes;
    break;
    case "Wednesday"://MIERCOLES
           $fecha_domingo =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
           $fecha_lunes =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
           $fecha_martes =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           $fecha_miercoles =  date("Y-m-d",strtotime($fecha_actual));
           $fecha_jueves =  date("Y-m-d",strtotime($fecha_actual." + 1 day"));
           $fecha_viernes =  date("Y-m-d",strtotime($fecha_actual." + 2 day"));
           $fecha_sabado =  date("Y-m-d",strtotime($fecha_actual." + 3 day"));
           $fech = date("dmY");
           $fechdomingo =  date("dmY",strtotime($fecha_actual." - 3 day"));
           $fechlunes =  date("dmY",strtotime($fecha_actual." - 2 day"));
           $fechmartes =  date("dmY",strtotime($fecha_actual." - 1 day"));
           $day = date("z");
           $ddomingo = $day - 2;
           $dlunes = $day - 1;
           $dmartes = $day;
           $dddomingo = '('.$ddomingo.') RD_'.$fechdomingo;
           $ddlunes = '('.$dlunes.') RD_'.$fechlunes;
           $ddmartes = '('.$dmartes.') RD_'.$fechmartes;
    break;
    case "Thursday":  //Jueves
           $fecha_domingo =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
           $fecha_lunes =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
           $fecha_martes =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
           $fecha_miercoles =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           $fecha_jueves =  date("Y-m-d",strtotime($fecha_actual));
           $fecha_viernes =  date("Y-m-d",strtotime($fecha_actual." + 1 day"));
           $fecha_sabado =  date("Y-m-d",strtotime($fecha_actual." + 2 day"));
           $fech = date("dmY");
           $fechdomingo =  date("dmY",strtotime($fecha_actual." - 4 day"));
           $fechlunes =  date("dmY",strtotime($fecha_actual." - 3 day"));
           $fechmartes =  date("dmY",strtotime($fecha_actual." - 2 day"));
           $fechmiercoles =  date("dmY",strtotime($fecha_actual." - 1 day"));
           $day = date("z");
           $ddomingo = $day - 3;
           $dlunes = $day - 2;
           $dmartes = $day - 1;
           $dmiercoles = $day;
           $dddomingo = '('.$ddomingo.') RD_'.$fechdomingo;
           $ddlunes = '('.$dlunes.') RD_'.$fechlunes;
           $ddmartes = '('.$dmartes.') RD_'.$fechmartes;
           $ddmiercoles = '('.$day.') RD_'.$fechmiercoles;
    break;
    case "Friday": //Viernes
           $fecha_domingo =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
           $fecha_lunes =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
           $fecha_martes =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
           $fecha_miercoles =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
           $fecha_jueves =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           $fecha_viernes =  date("Y-m-d",strtotime($fecha_actual));
           $fecha_sabado =  date("Y-m-d",strtotime($fecha_actual." + 1 day"));
           $fech = date("dmY");
           $fechdomingo =  date("dmY",strtotime($fecha_actual." - 5 day"));
           $fechlunes =  date("dmY",strtotime($fecha_actual." - 4 day"));
           $fechmartes =  date("dmY",strtotime($fecha_actual." - 3 day"));
           $fechmiercoles =  date("dmY",strtotime($fecha_actual." - 2 day"));
           $fechjueves =  date("dmY",strtotime($fecha_actual." - 1 day"));
           $day = date("z");
           $ddomingo = $day - 4;
           $dlunes = $day - 3;
           $dmartes = $day - 2;
           $dmiercoles = $day - 1;
           $djueves = $day;
           $dddomingo = '('.$ddomingo.') RD_'.$fechdomingo;
           $ddlunes = '('.$dlunes.') RD_'.$fechlunes;
           $ddmartes = '('.$dmartes.') RD_'.$fechmartes;
           $ddmiercoles = '('.$dmiercoles.') RD_'.$fechmiercoles;
           $ddjueves = '('.$djueves.') RD_'.$fechjueves;
    break;
    case "Saturday": //sabado
           $fecha_domingo =  date("Y-m-d",strtotime($fecha_actual." - 6 day"));
           $fecha_lunes =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
           $fecha_martes =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
           $fecha_miercoles =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
           $fecha_jueves =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
           $fecha_viernes =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           $fecha_sabado =  date("Y-m-d",strtotime($fecha_actual));
           $fech = date("dmY");
           $fechdomingo =  date("dmY",strtotime($fecha_actual." - 6 day"));
           $fechlunes =  date("dmY",strtotime($fecha_actual." - 5 day"));
           $fechmartes =  date("dmY",strtotime($fecha_actual." - 4 day"));
           $fechmiercoles =  date("dmY",strtotime($fecha_actual." - 3 day"));
           $fechjueves =  date("dmY",strtotime($fecha_actual." - 2 day"));
           $fechviernes =  date("dmY",strtotime($fecha_actual." - 1 day"));
           $fechsabado =  date("dmY",strtotime($fecha_actual));
           $day = date("z");
           $ddomingo = $day - 5;
           $dlunes = $day - 4;
           $dmartes = $day - 3;
           $dmiercoles = $day - 2;
           $djueves = $day - 1;
           $dviernes = $day;
           $dsabado = $day+1;
           $dddomingo = '('.$ddomingo.') RD_'.$fechdomingo;
           $ddlunes = '('.$dlunes.') RD_'.$fechlunes;
           $ddmartes = '('.$dmartes.') RD_'.$fechmartes;
           $ddmiercoles = '('.$dmiercoles.') RD_'.$fechmiercoles;
           $ddjueves = '('.$djueves.') RD_'.$fechjueves;
           $ddviernes = '('.$dviernes.') RD_'.$fechviernes;
           $ddsabado = '('.$dsabado.') RD_'.$fechsabado;
    break;
}
////////////////////////////////////////////////////////////////////////////////
?>
<div class="col-lg-12">
  <div class="table-responsive">
    <!-- <img src="../image/CALENDARIO/10 MENSUAL.png" alt="" width="280px" height="70"> -->
    <img src="../image/CALENDARIO/3.png" alt="" width="1110px" height="120">
    <table id="tabla1" border="3px" cellspacing="0" width="100%" style="border: 5px solid #97897D;">
      <thead class="thead-dark">
        <tr>
          <th style="border: 5px solid #97897D; text-align:center" colspan="7"  width="100px" height="120">
            <b><p><font size="10px"><?php $year = date("Y"); echo $year; ?></font></p></b>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="border: 5px solid #97897D; text-align:center" width="10px" height="80"> <button type="button" <a href="#" data-toggle="modal" data-target="#add_data_Modal_reporte_dia_domingo" name="button" class="btn btn-secondary" style="width:150px;">
            <img src="../image/CALENDARIO/7 DOMINGO.png" alt="" width="120px" height="50"> </button>
            <h4><b><p><?php echo $newDate = date("d/m/Y", strtotime($fecha_domingo)); ?></p></b></h4>
          </td>
          <td style="border: 5px solid #97897D; text-align:center" width="10px" height="80"> <button type="button" <a href="#" data-toggle="modal" data-target="#add_data_Modal_reporte_dia_lunes" name="button" class="btn btn-secondary" style="width:150px;">
            <img src="../image/CALENDARIO/1 LUNES.png" alt="" width="120px" height="50"> </button>
            <h4><b><p><?php echo $newDate = date("d/m/Y", strtotime($fecha_lunes)); ?></p></b></h4>
          </td>
          <td style="border: 5px solid #97897D; text-align:center" width="10px" height="80"> <button type="button" <a href="#" data-toggle="modal" data-target="#add_data_Modal_reporte_dia_martes" name="button" class="btn btn-secondary" style="width:150px;">
            <img src="../image/CALENDARIO/2 MARTES.png" alt="" width="120px" height="50"> </button>
            <h4><b><p><?php echo $newDate = date("d/m/Y", strtotime($fecha_martes)); ?></p></b></h4>
          </td>
          <td style="border: 5px solid #97897D; text-align:center" width="10px" height="80"> <button type="button" <a href="#" data-toggle="modal" data-target="#add_data_Modal_reporte_dia_miercoles" name="button" class="btn btn-secondary" style="width:150px;">
            <img src="../image/CALENDARIO/3 MIERCOLES.png" alt="" width="120px" height="50"> </button>
            <h4><b><p><?php echo $newDate = date("d/m/Y", strtotime($fecha_miercoles)); ?></p></b></h4>
          </td>
          <td style="border: 5px solid #97897D; text-align:center" width="10px" height="80"> <button type="button" <a href="#" data-toggle="modal" data-target="#add_data_Modal_reporte_dia_jueves" name="button" class="btn btn-secondary" style="width:150px;">
            <img src="../image/CALENDARIO/4 JUEVES.png" alt="" width="120px" height="50"> </button>
            <h4><b><p><?php echo $newDate = date("d/m/Y", strtotime($fecha_jueves)); ?></p></b></h4>
          </td>
          <td style="border: 5px solid #97897D; text-align:center" width="10px" height="80"> <button type="button" <a href="#" data-toggle="modal" data-target="#add_data_Modal_reporte_dia_viernes" name="button" class="btn btn-secondary" style="width:150px;">
            <img src="../image/CALENDARIO/5 VIERNES.png" alt="" width="120px" height="50"> </button>
            <h4><b><p><?php echo $newDate = date("d/m/Y", strtotime($fecha_viernes)); ?></p></b></h4>
          </td>
          <td style="border: 5px solid #97897D; text-align:center" width="10px" height="80"> <button type="button" <a href="#" data-toggle="modal" data-target="#add_data_Modal_reporte_dia_sabado" name="button" class="btn btn-secondary" style="width:150px;">
            <img src="../image/CALENDARIO/6 SABADO.png" alt="" width="120px" height="50"> </button>
            <h4><b><p><?php echo $newDate = date("d/m/Y", strtotime($fecha_sabado)); ?></p></b></h4>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
      </div>
    </div>
  </div>
  <div class="contenedor">
      <a href="menu.php" class="btn-flotante">INICIO</a>
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
  <!-- fin modal  -->
  <!-- modal del reporte del dia DOMINGO -->
  <div class="modal fade" id="add_data_Modal_reporte_dia_domingo" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center" class="modal-title" id="myModalLabel">GLOSARIO SIPPSIPPED</h4>
        </div>
        <div class="modal-body">
          <div className="modal">
            <div className="modalContent">
              <?php
              if ($fecha_domingo >= $fecha_actual) {
                ?>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100% Complete</span>
                  </div>
                </div>
                <div class="d-flex justify-content-center" style="text-align:center">
                  <span class="visually-hidden"> <b> <p> EN PROCESO... </p> </b> </span>
                </div>
                <?php
              }else {
                echo '<iframe src="../docs/REPORTES/'.$dddomingo.'.pdf" style="width:870px; height:600px;" ></iframe>';
              }
              ?>
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
  <!-- modal del reporte del dia LUNES -->
  <div class="modal fade" id="add_data_Modal_reporte_dia_lunes" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center" class="modal-title" id="myModalLabel">GLOSARIO SIPPSIPPED</h4>
        </div>
        <div class="modal-body">
          <div className="modal">
            <div className="modalContent">
              <?php
              if ($fecha_lunes >= $fecha_actual) {
                ?>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100% Complete</span>
                  </div>
                </div>
                <div class="d-flex justify-content-center" style="text-align:center">
                  <span class="visually-hidden"> <b> <p> EN PROCESO... </p> </b> </span>
                </div>
                <?php
              }else {
                echo '<iframe src="../docs/REPORTES/'.$ddlunes.'.pdf" style="width:870px; height:600px;" ></iframe>';
              }
              ?>
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
  <!-- modal del reporte del dia MARTES -->
  <div class="modal fade" id="add_data_Modal_reporte_dia_martes" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center" class="modal-title" id="myModalLabel">GLOSARIO SIPPSIPPED</h4>
        </div>
        <div class="modal-body">
          <div className="modal">
            <div className="modalContent">
              <?php
              if ($fecha_martes >= $fecha_actual) {
                ?>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100% Complete</span>
                  </div>
                </div>
                <div class="d-flex justify-content-center" style="text-align:center">
                  <span class="visually-hidden"> <b> <p> EN PROCESO... </p> </b> </span>
                </div>
                <?php
              }else {
                echo '<iframe src="../docs/REPORTES/'.$ddmartes.'.pdf" style="width:870px; height:600px;" ></iframe>';
              }
              ?>
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
  <!-- modal del reporte del dia MIERCOLES -->
  <div class="modal fade" id="add_data_Modal_reporte_dia_miercoles" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center" class="modal-title" id="myModalLabel">GLOSARIO SIPPSIPPED</h4>
        </div>
        <div class="modal-body">
          <div className="modal">
            <div className="modalContent">
              <?php
              if ($fecha_miercoles >= $fecha_actual) {
                ?>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100% Complete</span>
                  </div>
                </div>
                <div class="d-flex justify-content-center" style="text-align:center">
                  <span class="visually-hidden"> <b> <p> EN PROCESO... </p> </b> </span>
                </div>
                <?php
              }else {
                echo '<iframe src="../docs/REPORTES/'.$ddmiercoles.'.pdf" style="width:870px; height:600px;" ></iframe>';
              }
              ?>
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
  <!-- modal del reporte del dia JUEVES -->
  <div class="modal fade" id="add_data_Modal_reporte_dia_jueves" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center" class="modal-title" id="myModalLabel">GLOSARIO SIPPSIPPED</h4>
        </div>
        <div class="modal-body">
          <div className="modal">
            <div className="modalContent">
              <?php
              if ($fecha_jueves >= $fecha_actual) {
                ?>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100% Complete</span>
                  </div>
                </div>
                <div class="d-flex justify-content-center" style="text-align:center">
                  <span class="visually-hidden"> <b> <p> EN PROCESO... </p> </b> </span>
                </div>
                <?php
              }else {
                  echo '<iframe src="../docs/REPORTES/'.$ddjueves.'.pdf" style="width:870px; height:600px;" ></iframe>';
              }
              ?>
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
  <!-- modal del reporte del dia VIERNES -->
  <div class="modal fade" id="add_data_Modal_reporte_dia_viernes" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center" class="modal-title" id="myModalLabel">GLOSARIO SIPPSIPPED</h4>
        </div>
        <div class="modal-body">
          <div className="modal">
            <div className="modalContent">
              <?php
              if ($fecha_viernes >= $fecha_actual) {
                ?>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100% Complete</span>
                  </div>
                </div>
                <div class="d-flex justify-content-center" style="text-align:center">
                  <span class="visually-hidden"> <b> <p> EN PROCESO... </p> </b> </span>
                </div>
                <?php
              }else {
                echo '<iframe src="../docs/REPORTES/'.$ddviernes.'.pdf" style="width:870px; height:600px;" ></iframe>';
              }
              ?>
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
  <!-- modal del reporte del dia VIERNES -->
  <div class="modal fade" id="add_data_Modal_reporte_dia_sabado" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center" class="modal-title" id="myModalLabel">GLOSARIO SIPPSIPPED</h4>
        </div>
        <div class="modal-body">
          <div className="modal">
            <div className="modalContent">
              <?php
              if ($fecha_sabado >= $fecha_actual) {
                ?>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100% Complete</span>
                  </div>
                </div>
                <div class="d-flex justify-content-center" style="text-align:center">
                  <span class="visually-hidden"> <b> <p> EN PROCESO... </p> </b> </span>
                </div>
                <?php
              }else {
                echo '<iframe src="../docs/REPORTES/'.$ddsabado.'.pdf" style="width:870px; height:600px;" ></iframe>';
              }
              ?>
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
  <script type="text/javascript">
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
