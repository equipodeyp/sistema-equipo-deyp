<?php
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
//
$tmf = "SELECT COUNT(*) as t from validar_medida WHERE validar_datos = 'false'";
$rtmf = $mysqli->query($tmf);
$ftmf = $rtmf->fetch_assoc();
$mmed =  $ftmf['t'];
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
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">
        <ul>
          <?php
          if ($mmed > 0 AND $name == 'estadistica_sub') {
            ?>
            <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/medidas_por_validar.php'><i style="color: orange;" class="fa-solid fa-triangle-exclamation menu-nav--icon"></i><strong style="color: orange;">MEDIDAS POR VALIDAR</strong></a></li>
            <?php
            }
          if ($name=='estadistica1' || $name=='estadistica2' || $name=='estadistica3' || $name=='estadistica4') {
            ?>
            <li class="menu-items"><a href='../administrador/admin.php'><i style="color: #FFFFFF;" class="fa-solid fa-user-tie menu-nav--icon"></i><strong style="color: white;">ADMINISTRADOR</strong></a></li>
            <?php
          }
          ?>
          <ul>
            <li class="menu-items"><a href="#" onclick="menuestadisticabd(this)"><i style="color: #FFFFFF;" class="fa-solid fa-database menu-nav--icon"></i><strong style="color: white;">BASES DE DATOS</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
              <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                <li>
                  <a href="#" onclick="menuestadisticaseguimiento(this)"><i style="color: #FFFFFF;" class="fa-solid fa-address-book menu-nav--icon"></i><strong style="color: white;">SOLICITUDES</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
                  <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                    <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/total_expedientes.php'><i style="color: #FFFFFF;" class="fa-solid fa-folder menu-nav--icon"></i><strong style="color: white;">EXPEDIENTES</strong></a></li>
                    <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/total_personas.php'><i style="color: #FFFFFF;" class="fa-solid fa-users menu-nav--icon"></i><strong style="color: white;">PERSONAS GENERAL</strong></a></li>
                    <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/total_personas_estadistica.php'><i style="color: #FFFFFF;" class="fa-solid fa-user-group menu-nav--icon"></i><strong style="color: white;">PERSONAS ESTADISTICA</strong></a></li>
                    <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/total_medidas.php'><i style="color: #FFFFFF;" class="fa-solid fa-notes-medical menu-nav--icon"></i><strong style="color: white;">MEDIDAS</strong></a></li>
                    <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/alojamiento_temporal.php'><i style="color: #FFFFFF;" class="fa-solid fa-person-shelter menu-nav--icon"></i><strong style="color: white;">ALOJAMIENTO TEMPORAL</strong></a></li>
                    <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/informe_sujetos.php'><i style="color: #FFFFFF;" class="fa-solid fa-clipboard-user menu-nav--icon"></i><strong style="color: white;">INFORME SUJETOS</strong></a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" onclick="menuestadisticaseguimiento(this)"><i style="color: #FFFFFF;" class="fa-solid fa-file-pen menu-nav--icon"></i><strong style="color: white;">ESTUDIOS</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
                  <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                    <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/evaluacion_expediente.php'><i style="color: #FFFFFF;" class="fa-solid fa-folder-open menu-nav--icon"></i><strong style="color: white;">EXPEDIENTES</strong></a></li>
                    <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/evaluacion_personas.php'><i style="color: #FFFFFF;" class="fa-solid fa-people-roof menu-nav--icon"></i><strong style="color: white;">SUJETOS</strong></a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" onclick="menumetas(this)"><i style="color: #FFFFFF;" class="fa-solid fa-clipboard-check menu-nav--icon"></i><strong style="color: white;">METAS</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
                  <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                    <!-- <li class="menu-items"><a href='../administrador/bd_metas.php'><i style="color: #FFFFFF;" class="fa-solid fa-clipboard-check menu-nav--icon"></i><strong style="color: white;">METAS</strong></a></li> -->
                    <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/bd_metas_a_r.php'><i style="color: #FFFFFF;" class="fa-solid fa-folder-open menu-nav--icon"></i><strong style="color: white;">MEDIDAS A/R</strong></a></li>
                    <!-- <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/evaluacion_personas.php'><i style="color: #FFFFFF;" class="fa-solid fa-people-roof menu-nav--icon"></i><strong style="color: white;">SUJETOS</strong></a></li> -->
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          <ul>
            <li class="menu-items"><a href="#" onclick="menureportes(this)"><i style="color: #FFFFFF;" class="fa-solid fa-chart-column menu-nav--icon"></i><strong style="color: white;">REPORTES</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
              <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/ver_reporte_diario.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-day menu-nav--icon"></i><strong style="color: white;">DIARIO</strong></a></li>
                <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/ver_reporte_semanal.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-week menu-nav--icon"></i><strong style="color: white;">SEMANAL</strong></a></li>
                <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/ver_reporte_mensual.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar menu-nav--icon"></i><strong style="color: white;">MENSUAL</strong></a></li>
                <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/ver_reporte_anual.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-check menu-nav--icon"></i><strong style="color: white;">ANUAL</strong></a></li>
                <li class="menu-items"><a href='../subdireccion_de_estadistica_y_preregistro/ver_reporte_semestral.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-days menu-nav--icon"></i><strong style="color: white;">SEMESTRAL</strong></a></li>
              </ul>
            </li>
          </ul>
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
                <?php if ($name=='estadistica_sub') { ?>
                <li class="menu-items"><a href='./registrar_incidencia.php'><i style="color: #FFFFFF;" class="fa-solid fa-desktop menu-nav--icon"></i><strong style="color: white;">REGISTRAR</strong></a></li>
                <li class="menu-items"><a href='./incidencias_registradas.php'><i style="color: #FFFFFF;" class="fa-solid fa-computer menu-nav--icon"></i><strong style="color: white;">CONSULTAR</strong></a></li>
                <?php
                }
                if ($name=='estadistica1' || $name=='estadistica2' || $name=='estadistica3') {
                ?>
                <li class="menu-items"><a href='./atender_incidencia.php'><i style="color: #FFFFFF;" class="fa-solid fa-computer menu-nav--icon"></i><strong style="color: white;">ATENDER INCIDENCIA</strong></a></li>
                <?php }?>
              </ul>
            </li>
          </ul>
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
      <div class="container">
        <div class="row">
          <h1 style="text-align:center">
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
          </b></h1>
          <h5 style="text-align:center">
            <b><?php echo utf8_decode(strtoupper($row['area'])); ?></b>
          </h5>
        </div>
        <!--Ejemplo tabla con DataTables-->
        <b>
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
                        $fol_exp2=$var_fila['fol_exp'];
                        $cant="SELECT COUNT(*) AS cant FROM medidas WHERE folioexpediente = '$fol_exp2'";
                        $r=$mysqli->query($cant);
                        $row2 = $r->fetch_array(MYSQLI_ASSOC);
                        $abc="SELECT count(*) as c FROM datospersonales WHERE folioexpediente='$fol_exp2'";
                        $result=$mysqli->query($abc);
                        if($result) {
                          while($row=mysqli_fetch_assoc($result)) {
                            $contador = $contador + 1;
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
                              echo "<td style='text-align:center'><a href='detalles_expediente.php?id=".$var_fila['fol_exp']."'><i style='color: black;' class='fa-solid fa-folder-open menu-nav--icon'></i></a></td>";
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
        </b>
      </div>
    </div>
  </div>
  <!-- Contenedor posicionado abajo a la izquierda -->
  <!-- Contenedor del Toast (Fijado abajo a la derecha) -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <!-- Toast con borde de color (clase border-primary) y delay de 7000ms -->
    <div id="autoToast" class="toast border border-secondary border-5" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="7000">
      <div class="toast-header">
        <span class="p-2 bg-secondary rounded me-2"></span>
        <strong class="me-auto text-secondary">SIPPSIPPED</strong>
        <small>AHORA MISMO</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
      </div>
      <div class="toast-body">
        <div style="text-align:center">
          <i style="color:blue; font-size: 25px;" class="fas fa-exclamation-triangle me-2"></i>
          <b style="color:#000000; font-size: 15px;">¡ATENCIÓN! <br> FALTAN MEDIDAS POR VALIDAR</b>
        </div>
      </div>
      <div class="progress" style="height: 5px; border-radius: 0;">
        <div id="bar" class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;">
          <span id="timerText">7s</span>
        </div>
      </div>
    </div>
  </div>
  <?php
  include('../documentacion/glosario.php');
  include('../documentacion/manual_tecnico.php');
  include('../documentacion/manual_usuario.php');
  $var = $name;
  ?>
  <script type="text/javascript">
  <?php
  echo "var jsvar ='$var';";
  echo "var jsvmedidasfalse ='$mmed';";
  ?>
  console.log(jsvar);
  console.log(jsvmedidasfalse);
  if (jsvar === 'estadistica_sub') {
    if (jsvmedidasfalse > 0) {
// Ejecutar cuando el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', () => {
  const toastElement = document.getElementById('autoToast');
  const toastInstance = bootstrap.Toast.getOrCreateInstance(toastElement);

  toastInstance.show();
});

    }
  }
  </script>
</body>
<link rel="stylesheet" href="../css/menuactualizado.css">
<script src="../js/menu.js"></script>
</html>
