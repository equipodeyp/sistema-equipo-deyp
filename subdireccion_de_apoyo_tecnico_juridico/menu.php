<?php
date_default_timezone_set("America/Mexico_City");
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
// echo $name;
if (!isset($name)) {
  header("location: ../logout.php");
}
$sentencia=" SELECT * FROM usuarios WHERE usuario='$name'";
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
  <div class="contenedor">
    <div class="sidebar ancho">
      <div class="logo text-warning">
      </div>
      <div style="text-align:center" class="user">
        <?php
        $genero = $row['sexo'];
        if ($genero=='mujer') {
          echo "<img style'text-align:center' src='../image/mujerup.png' width='100' height='100'>";
        }
        if ($genero=='hombre') {
          echo "<img style'text-align:center' src='../image/hombreup.jpg' width='100' height='100'>";
        }
        ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">
        <ul>
          <li class="menu-items"><a href='../consultores/admin.php'><i style="color: #FFFFFF;" class="fa-solid fa-folder-open menu-nav--icon"></i><strong style="color: white;">CONSULTAR EXPEDIENTES</strong></a></li>
          <?php
          if ($row['cargo'] == 'subdirector') {
            ?>
            <ul>
              <li class="menu-items"><a href="#" onclick="menureportes(this)"><i style="color: #FFFFFF;" class="fa-solid fa-chart-column menu-nav--icon"></i><strong style="color: white;">REPORTES</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
                <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                  <li class="menu-items"><a href='../subdireccion_de_apoyo_tecnico_juridico/ver_reporte_diario.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-day menu-nav--icon"></i><strong style="color: white;">DIARIO</strong></a></li>
                  <li class="menu-items"><a href='../subdireccion_de_apoyo_tecnico_juridico/ver_reporte_semanal.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-week menu-nav--icon"></i><strong style="color: white;">SEMANAL</strong></a></li>
                  <li class="menu-items"><a href='../subdireccion_de_apoyo_tecnico_juridico/ver_reporte_mensual.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar menu-nav--icon"></i><strong style="color: white;">MENSUAL</strong></a></li>
                  <li class="menu-items"><a href='../subdireccion_de_apoyo_tecnico_juridico/ver_reporte_anual.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-check menu-nav--icon"></i><strong style="color: white;">ANUAL</strong></a></li>
                  <li class="menu-items"><a href='../subdireccion_de_apoyo_tecnico_juridico/ver_reporte_semestral.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-days menu-nav--icon"></i><strong style="color: white;">SEMESTRAL</strong></a></li>
                </ul>
              </li>
            </ul>
            <?php
          }
          ?>
          <li class="menu-items"><a href='./menu_asistencias_medicas.php'><i style="color: #FFFFFF;" class="fa-solid fa-hospital-user menu-nav--icon"></i><strong style="color: white;">ASISTENCIAS MÉDICAS</strong></a></li>
          <li class="menu-items"><a href='./alertas_convenios_por_finalizar.php'><i style="color: #FFFFFF;" class="fa-solid fa-triangle-exclamation menu-nav--icon"></i><strong style="color: white;">ALERTA DE CONVENIOS</strong></a></li>
          <ul>
            <li class="menu-items"><a href="#" onclick="menureact(this)"><i style="color: #FFFFFF;" class="fa-solid fa-laptop-file menu-nav--icon"></i><strong style="color: white;">REACT</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
              <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                <li class="menu-items"><a href='./add_actividad.php'><i style="color: #FFFFFF;" class="fa-solid fa-file-medical menu-nav--icon"></i><strong style="color: white;">REGISTRAR</strong></a></li>
                <li class="menu-items"><a href='./buscar_actividad.php'><i style="color: #FFFFFF;" class="fa-solid fa-laptop menu-nav--icon"></i><strong style="color: white;">CONSULTAR</strong></a></li>
                <li class="menu-items"><a href='./consultar_cifras_actividad.php'><i style="color: #FFFFFF;" class="fa-solid fa-search menu-nav--icon"></i><strong style="color: white;">BUSCAR</strong></a></li>
              </ul>
            </li>
          </ul>
          <ul>
            <li class="menu-items"><a href="#" onclick="toggleSubmenu(this)"><i style="color: #FFFFFF;" class="fa-solid fa-headset menu-nav--icon"></i><strong style="color: white;">INCIDENCIAS</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
              <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                <li class="menu-items"><a href='./registrar_incidencia.php'><i style="color: #FFFFFF;" class="fa-solid fa-desktop menu-nav--icon"></i><strong style="color: white;">REGISTRAR</strong></a></li>
                <li class="menu-items"><a href='./incidencias_registradas.php'><i style="color: #FFFFFF;" class="fa-solid fa-computer menu-nav--icon"></i><strong style="color: white;">CONSULTAR</strong></a></li>
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
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
          </h1>
          <h5 style="text-align:center">
            <b><?php echo utf8_decode(strtoupper($row['area'])); ?></b>
          </h5>
        </div>
        <!--Ejemplo tabla con DataTables-->
        <div class="">
          <div class="row">
            <div class="col-lg-12">
              <div class="table-responsive">
                <table id="registros_expedientes" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th style="text-align:center; color: white; border: 1px solid black;">#</th>
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
                    $contador = 0;
                    $sql = "SELECT * FROM expediente";
                    $resultado = $mysqli->query($sql);
                    $row = $resultado->fetch_array(MYSQLI_ASSOC);
                    $fol_exp =$row['fol_exp'];
                    $tabla="SELECT * FROM expediente";
                    $var_resultado = $mysqli->query($tabla);
                    while ($var_fila=$var_resultado->fetch_array()) {
                      $contador = $contador + 1;
                      $fol_exp2=$var_fila['fol_exp'];
                      $cant="SELECT COUNT(*) AS cant FROM medidas WHERE folioexpediente = '$fol_exp2'";
                      $r=$mysqli->query($cant);
                      $row2 = $r->fetch_array(MYSQLI_ASSOC);
                      $abc="SELECT count(*) as c FROM datospersonales WHERE folioexpediente='$fol_exp2'";
                      $result=$mysqli->query($abc);
                      if($result) {
                        while($row=mysqli_fetch_assoc($result)) {
                          echo "<tr>";
                            echo "<td style='text-align:center'>"; echo $contador; echo "</td>";
                            echo "<td style='text-align:center'>"; echo $var_fila['fecharecep']; echo "</td>";
                            echo "<td style='text-align:center'>"; echo $var_fila['fol_exp']; echo "</td>";
                            echo "<td style='text-align:center'>"; echo $row['c']; echo "</td>";
                            echo "<td style='text-align:center'>"; echo $row2['cant']; echo "</td>";
                            echo "<td style='text-align:center'>";
                              if ($var_fila['validacion'] == 'true') {
                                echo "<i class='fas fa-check'></i>";
                              }elseif ($var_fila['validacion'] == 'false') {
                                echo "<i class='fas fa-times'></i>";
                              }
                            echo "</td>";
                            echo "<td style='text-align:center'><a href='modificar.php?id=".$var_fila['fol_exp']."'><i style='color: black;' class='fa-solid fa-folder-open menu-nav--icon'></i></a></td>";
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
  $sqltic = "SELECT COUNT(*) as ti FROM tickets WHERE estatus='ATENDIDA' AND usuario='DIANA GONZÁLEZ VALLEJO'";
  $rt = $mysqli->query($sqltic);
  $num_ti = $rt->fetch_assoc();
  $counti = $num_ti['ti'];
  // echo 'tickets en proceso: ' . $counti;
  ?>
</body>
<link rel="stylesheet" href="../css/menuactualizado.css">
<script src="../js/menu.js"></script>
</html>
