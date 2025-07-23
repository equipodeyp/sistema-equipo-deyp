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
  <!-- estilo y js del mensaje de notificacion de que faltan medidas por validar -->
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
          echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
        }
        ?>
        <h6 style="text-align:center" class='user-nombre'> <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">
        <ul>
          <li id="liestadistica3" class="subtitle3">
            <a href="#" class="action3"><i class='color-icon fa-sharp fa-solid fa-file-invoice menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white; font-weight:bold;"> REPORTES</span></a>
            <ul class="submenu3">
              <li id="liexpediente" class="menu-items"><a href="../subdireccion_de_analisis_de_riesgo/ver_reporte_diario.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-calendar-day  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> DIARIO</span></a></li>
              <!-- <li id="limedidas" class="menu-items"><a href="../subdireccion_de_analisis_de_riesgo/ver_reporte_semanal.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-sharp fa-solid fa-calendar-week menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> SEMANAL <br />   </span></a></li> -->
              <li id="lipersonas" class="menu-items"><a href="../subdireccion_de_analisis_de_riesgo/ver_reporte_mensual.php">&nbsp;&nbsp;&nbsp;<i class="color-icon fa-solid fa-calendar-days menu-nav--icon fa-fw"></i><span class="menu-items" style="color: white;"> MENSUAL</span></a></li>
              <li id="limedidas" class="menu-items"><a href="../subdireccion_de_analisis_de_riesgo/ver_reporte_anual.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-calendar menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> ANUAL <br /> </span></a></li>
              <li id="limedidas" class="menu-items"><a href="../subdireccion_de_analisis_de_riesgo/ver_reporte_semestral.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-person-circle-plus  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> SEMESTRAL</span></a></li>
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
        <br>
        <!--Ejemplo tabla con DataTables-->
        <div class="secciones form-horizontal sticky breadcrumb flat">
          <a href="../subdireccion_de_analisis_de_riesgo/menu.php">REGISTROS</a>
          <a class="actived">REPORTE SEMANAL</a>
        </div>
        <div class="col-lg-12">
          <div class="table-responsive">
            <!-- <img src="../image/CALENDARIO/10 MENSUAL.png" alt="" width="280px" height="70"> -->
            <img src="../image/CALENDARIO/3.png" alt="" width="1110px" height="120">
            <table id="tabla1" border="3px" cellspacing="0" width="100%" style="border: 5px solid #97897D;">
              <thead class="thead-dark">
                <tr>
                  <th style="border: 5px solid #97897D; text-align:center" colspan="1"  width="100px" height="120">
                    <b><p><font size="10px"><?php echo $year = date("Y"); ?></font></p></b>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td  width="1000px" height="80"> <button type="button" <a name="button" class="btn btn-secondary" style="width:1100px;">
                    <img src="../image/CALENDARIO/9 SEMANAL.png" alt="" width="520px" height="90"> </button><br>
                    <iframe src="../docs/REPORTES/SEMANAL.pdf" width="1100" height="900"></iframe>
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
