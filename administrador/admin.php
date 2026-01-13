<?php
/*require 'conexion.php';*/
error_reporting(0);
date_default_timezone_set("America/Mexico_City");
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/main2.css">
  <!--font awesome local-->
  <link rel="stylesheet" href="../css/fontawesome/css/all.css">
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/bootstrap5-3-8.min.css">
  <script src="../js/bootstrap5-3-8.bundle.min.js"></script>
  <script src="../js/popper5-3-8.min.js"></script>
  <script src="../js/bootstrap5-3-8.min.js"></script>
  <!--  -->
  <link rel="stylesheet" type="text/css" href="../css/toast.css"/>
  <link rel="stylesheet" href="../css/button_notification.css" type="text/css">
  <link href="../datatables/datatables.min.css" rel="stylesheet">
  <script src="../datatables/datatables.min.js"></script>
</head>
<body>
  <div class="notify">
    <div class="notify-btn" id="notify-btn">
      <button type="button" class="icon-button">
        <span><img src="../image/asistencias_medicas/bell.png" width="60" height="60"></span>
        <span class="icon-button__badge" id="show_notif">0</span>
      </button>
    </div>
    <div class="notify-menu" id="notify-menu">  </div>
  </div>
  <div class="contenedor">
    <div class="sidebar ancho">
      <div class="logo text-warning">
      </div>
      <div style="text-align:center" class="user">
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
          <li class="menu-items"><a href='new_exp.php'><i style="color: #FFFFFF;" class="fa-solid fa-folder-plus menu-nav--icon"></i><strong style="color: white;">REGISTRAR EXPEDIENTE</strong></a></li>
          <li class="menu-items"><a href='./menu_asistencias_medicas.php'><i style="color: #FFFFFF;" class="fa-solid fa-book-medical menu-nav--icon"></i><strong style="color: white;">ASISTENCIAS MÉDICAS</strong></a></li>
          <li class="menu-items"><a href='#'><i style="color: #FFFFFF;" class="fa-solid fa-magnifying-glass menu-nav--icon"></i><strong style="color: white;">BUSQUEDA</strong></a></li>
          <li class="menu-items"><a href='../administrador/estadistica.php'><i style="color: #FFFFFF;" class="fa-solid fa-chart-bar menu-nav--icon"></i><strong style="color: white;">ESTADISTICA</strong></a></li>
        </ul>
        <ul>
          <li class="menu-items"><a href="#" onclick="toggleSubmenu(this)"><i style="color: #FFFFFF;" class="fa-solid fa-headset menu-nav--icon"></i><strong style="color: white;">INCIDENCIAS</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
            <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
              <li><a href="#" style="font-size: 15px; color:white; text-decoration:none;" onclick="location.href='./incidencias_registradas.php'"><i class="fas fa-laptop-file"></i> CONSULTAR</a></li>
            </ul>
          </li>
        </ul>
        <div class="cerrar-sesion-menu">
          <ul>
            <li class="menu-items"><a href="#" onclick="menudocumentacion(this)"><i style="color: #FFFFFF;" class="fa-solid fa-user-gear menu-nav--icon"></i><strong style="color: white;">AYUDA</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
              <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                <li class="menu-items"><a href="" data-bs-toggle="modal" data-bs-target="#glosario"><i style="color: #FFFFFF;" class="fa-solid fa-book menu-nav--icon"></i><strong style="color: white;">GLOSARIO</strong></a></li>
                <li class="menu-items"><a href="" data-bs-toggle="modal" data-bs-target="#manual_tecnico"><i style="color: #FFFFFF;" class="fa-solid fa-book-open menu-nav--icon"></i><strong style="color: white;">MANUAL TECNICO</strong></a></li>
                <li class="menu-items"><a href="" data-bs-toggle="modal" data-bs-target="#manual_usuario"><i style="color: #FFFFFF;" class="fa-solid fa-book-open-reader menu-nav--icon"></i><strong style="color: white;">MANUAL DE USUARIO</strong></a></li>
              </ul>
            </li>
          </ul>
          <ul >
            <li class="menu-items"><a href='../logout.php'><i style="color: #FFFFFF;" class="fa-solid fa-lock menu-nav--icon"></i><strong style="color: white;">CERRAR SESION</strong></a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../image/ups2.png" alt="" width="1400" height="70">
          <img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
      </div>
      <!-- <br><br> -->
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
        <div class="">
          <a id="btnmedidaspendientes" href="../administrador/medidas_por_validar.php"> <button id="" type="button" class="btn color-btn-success">pendientes por validar</button> </a>
        </div>
        <div class="">
          <div class="row">
            <div class="col-lg-12">
              <div class="table-responsive">
                <table id="registros_expedientes" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <h3 style="text-align:center">Registros</h3>
                      <tr>
                          <th style="text-align:center; color: white; border: 1px solid black;">No.</th>
                          <th style="text-align:center; color: white; border: 1px solid black;">FECHA DE RECEPCIÓN DE LA SOLICITUD DE INCORPORACIÓN AL PROGRAMA</th>
                          <th style="text-align:center; color: white; border: 1px solid black;">FOLIO DEL EXPEDIENTE DE PROTECCIÓN</th>
                          <th style="text-align:center; color: white; border: 1px solid black;">PERSONAS PROPUESTAS</th>
                          <th style="text-align:center; color: white; border: 1px solid black;">MEDIDAS DE APOYO OTORGADAS</th>
                          <th style="text-align:center; color: white; border: 1px solid black;">VALIDACIÓN DEL EXPEDIENTE DE PROTECCIÓN</th>
                          <th style="text-align:center; color: white; border: 1px solid black;">DETALLES</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $contador= 0;
                    $sql = "SELECT * FROM expediente";
                    $resultado = $mysqli->query($sql);
                    $row = $resultado->fetch_array(MYSQLI_ASSOC);
                    $fol_exp =$row['fol_exp'];

                    $tabla="SELECT * FROM expediente";
                    $var_resultado = $mysqli->query($tabla);

                    while ($var_fila=$var_resultado->fetch_array())
                    {
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
                          $contador = $contador + 1;
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
                          echo "<td style='text-align:center'><a href='detalles_expediente.php?folio=".$var_fila['fol_exp']."'><i style='color: black;' class='fa-solid fa-folder-open menu-nav--icon'></i></a></td>";

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
  <?php
  include('../documentacion/glosario.php');
  include('../documentacion/manual_tecnico.php');
  include('../documentacion/manual_usuario.php');

  if ($_SESSION['usuario'] == 'estadistica_sub'){
    echo "<script src='../js/notification1.js'></script>";
    // echo $_SESSION['usuario'];
  }
  if ($_SESSION['usuario'] == 'estadistica_sub'){
    echo '<div class="contenedor">
    <a href="../subdireccion_de_estadistica_y_preregistro/menu.php" class="btn-flotante">REGRESAR A ESTADISTICA</a>
    </div>';
  }

  if($_SESSION['usuario'] == 'a-jonathan'){
    echo "<script src='../js/notification2.js'></script>";
    // echo $_SESSION['usuario'];
  }

  if($_SESSION['usuario'] == 'a-gabriela'){
    echo "<script src='../js/notification3.js'></script>";
    // echo $_SESSION['usuario'];
  }
  $var = $name;
  $tmf = "SELECT COUNT(*) as t from validar_medida WHERE validar_datos = 'false'";
  $rtmf = $mysqli->query($tmf);
  $ftmf = $rtmf->fetch_assoc();
  $mmed =  $ftmf['t'];
  ?>
  <script type="text/javascript">
  <?php
  echo "var jsvar ='$var';";
  echo "var jsvmedidasfalse ='$mmed';";
  ?>
  if (jsvar === 'estadistica_admin') {
    if (jsvmedidasfalse > 0) {
      document.getElementById('btnmedidaspendientes').style.visibility = "visible"; // visible
      console.log(jsvar);
      console.log(jsvmedidasfalse);
      (function(window, document) { // asilamos el componente
      // creamos el contedor de las tostadas o la tostadora
      var container = document.createElement('div');
      container.className = 'toast-container';
      document.body.appendChild(container);
      // esta es la funcion que hace la tostada
      window.doToast = function(message) {
        // creamos tostada
        var toast = document.createElement('div');
        toast.className = 'toast-toast';
        toast.innerHTML = message;
        // agregamos a la tostadora
        container.appendChild(toast);
        // programamos su eliminación
        setTimeout(function() {
          // cuando acabe de desaparecer, lo eliminamos del dom.
          toast.addEventListener("transitionend", function() {
             container.removeChild(toast);
          }, false);
          // agregamos un estilo que inicie la "transition".
          toast.classList.add("fadeout");
        }, 10000); // OP dijo, "solo dos segundos"
      }
      })(window, document);
      // ejempo de uso
      doToast("¡ATENCIÓN!");
      // ejemplo retardado de uso
      setTimeout(function() {
       doToast("FALTAN MEDIDAS POR VALIDAR");
      }, 1200);
      // fin de mostrar alerta
    }else {
      document.getElementById('btnmedidaspendientes').style.visibility = "hidden"; // hide
    }
  }else {
    document.getElementById('btnmedidaspendientes').style.visibility = "hidden"; // hide
  }
  </script>
</body>
<link rel="stylesheet" href="../css/menuactualizado.css">
<script src="../js/menu.js"></script>
</html>
