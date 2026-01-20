<?php
date_default_timezone_set("America/Mexico_City");
// error_reporting(0);
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$sentencia=" SELECT * FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$user = $row['usuario'];
$m_user = $user;
$m_user = strtoupper($m_user);
// obtener subdireccion del perfil
$iduser = $row['id'];
$subuser = "SELECT * FROM usuarios_servidorespublicos WHERE id_usuarioprincipal = '$iduser'";
$rsubuser = $mysqli->query($subuser);
while ($fsubuser = $rsubuser -> fetch_assoc()) {
  $subdirecfcion_user = $fsubuser['subdireccion'];
  $permiso1 = $fsubuser['permiso1'];
  $subdireccion = $fsubuser['subdireccion'];
}
$genero = $row['sexo'];
$area = $row['area'];
$id_user = $row['id'];
$cargouser = $row['cargo'];;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
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
          if ($cargouser == 'titular' || $cargouser == 'subdirector') {
            ?>
            <li class="menu-items"><a href="#" onclick="menureportes(this)"><i style="color: #FFFFFF;" class="fa-solid fa-chart-column menu-nav--icon"></i><strong style="color: white;">REPORTES</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
              <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                <li class="menu-items"><a href='../consultores/ver_reporte_diario.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-day menu-nav--icon"></i><strong style="color: white;">DIARIO</strong></a></li>
                <li class="menu-items"><a href='../consultores/ver_reporte_semanal.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-week menu-nav--icon"></i><strong style="color: white;">SEMANAL</strong></a></li>
                <li class="menu-items"><a href='../consultores/ver_reporte_mensual.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar menu-nav--icon"></i><strong style="color: white;">MENSUAL</strong></a></li>
                <li class="menu-items"><a href='../consultores/ver_reporte_anual.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-check menu-nav--icon"></i><strong style="color: white;">ANUAL</strong></a></li>
                <li class="menu-items"><a href='../consultores/ver_reporte_semestral.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-days menu-nav--icon"></i><strong style="color: white;">SEMESTRAL</strong></a></li>
              </ul>
            </li>
            <?php
          }
          if ($row['area'] == 'titular de la unidad de proteccion de sujetos que intervienen en el procedimiento penal o extincion de dominio') {
            ?>
            <li class="menu-items"><a href='dentro_y_fuera_del_cr.php'><i style="color: #FFFFFF;" class="fa-solid fa-people-group menu-nav--icon"></i><i style="color: #FFFFFF;" class="fa-solid fa-people-roof menu-nav--icon"></i><strong style="color: white;">SUJETOS DENTRO Y <br>FUERA DEL CENTRO DE RESGUARDO</strong></a></li>
            <?php
          }
          if ($row['area'] === 'subdireccion de enlace interinstitucional' || $row['area'] === 'subdireccion de ejecucion de medidas' || $row['area'] === 'encargado de la subdireccion de ejecucion de medidas') {
            ?>
            <li class="menu-items"><a href='../asistencias_medicas/admin.php'><i style="color: #FFFFFF;" class="fa-solid fa-hospital-user menu-nav--icon"></i><strong style="color: white;">ASISTENCIAS MÉDICAS</strong></a></li>
            <?php
          }
          ?>
        </ul>
        <?php
        if ($subdirecfcion_user === 'Subdirección de ejecucion de medidas') {
          ?>
          <ul>
            <li class="menu-items"><a href="#" onclick="menureact(this)"><i style="color: #FFFFFF;" class="fa-solid fa-laptop-file menu-nav--icon"></i><strong style="color: white;">REACT</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
              <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                <li class="menu-items"><a href='../asistencias_medicas/actividades_ejecucion/add_actividad.php'><i style="color: #FFFFFF;" class="fa-solid fa-file-medical menu-nav--icon"></i><strong style="color: white;">REGISTRAR</strong></a></li>
                <li class="menu-items"><a href='../asistencias_medicas/actividades_ejecucion/consulta_actividad.php'><i style="color: #FFFFFF;" class="fa-solid fa-laptop menu-nav--icon"></i><strong style="color: white;">CONSULTAR</strong></a></li>
                <li class="menu-items"><a href='../asistencias_medicas/actividades_ejecucion/search_actividad.php'><i style="color: #FFFFFF;" class="fa-solid fa-search menu-nav--icon"></i><strong style="color: white;">BUSCAR</strong></a></li>
              </ul>
            </li>
          </ul>
          <ul>
            <li class="menu-items"><a href="#" onclick="menureact(this)"><i style="color: #FFFFFF;" class="fa-solid fa-car-rear menu-nav--icon"></i><strong style="color: white;">TRASLADOS</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
              <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                <li class="menu-items"><a href='./traslados_ejecucion/add_traslado.php'><i style="color: #FFFFFF;" class="fa-solid fa-car-side menu-nav--icon"></i><strong style="color: white;">REGISTRAR</strong></a></li>
                <li class="menu-items"><a href='./traslados_ejecucion/consulta_traslados.php'><i style="color: #FFFFFF;" class="fa-solid fa-laptop menu-nav--icon"></i><strong style="color: white;">CONSULTAR</strong></a></li>
                <li class="menu-items"><a href='./traslados_ejecucion/search_traslado.php'><i style="color: #FFFFFF;" class="fa-solid fa-search menu-nav--icon"></i><strong style="color: white;">BUSCAR</strong></a></li>
              </ul>
            </li>
          </ul>
          <?php
        }
        if ($subdirecfcion_user === 'Subdirección de enlace interinstitucional') {
          ?>
          <ul>
            <li class="menu-items"><a href="#" onclick="menureact(this)"><i style="color: #FFFFFF;" class="fa-solid fa-laptop-file menu-nav--icon"></i><strong style="color: white;">REACT</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
              <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                <li class="menu-items"><a href='../asistencias_medicas/actividades_enlace/registrar_actividad.php'><i style="color: #FFFFFF;" class="fa-solid fa-file-medical menu-nav--icon"></i><strong style="color: white;">REGISTRAR</strong></a></li>
                <li class="menu-items"><a href='../asistencias_medicas/actividades_enlace/buscar_actividad.php'><i style="color: #FFFFFF;" class="fa-solid fa-laptop menu-nav--icon"></i><strong style="color: white;">CONSULTAR</strong></a></li>
                <li class="menu-items"><a href='../asistencias_medicas/actividades_enlace/consultar_cifras_actividad.php'><i style="color: #FFFFFF;" class="fa-solid fa-search menu-nav--icon"></i><strong style="color: white;">BUSCAR</strong></a></li>
              </ul>
            </li>
          </ul>          
          <?php
        }
        ?>
        <ul>
          <li class="menu-items"><a href="#" onclick="toggleSubmenu(this)"><i style="color: #FFFFFF;" class="fa-solid fa-headset menu-nav--icon"></i><strong style="color: white;">INCIDENCIAS</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
            <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
              <li class="menu-items"><a href='../asistencias_medicas/registrar_incidencia.php'><i style="color: #FFFFFF;" class="fa-solid fa-desktop menu-nav--icon"></i><strong style="color: white;">REGISTRAR</strong></a></li>
              <li class="menu-items"><a href='../asistencias_medicas/incidencias_registradas.php'><i style="color: #FFFFFF;" class="fa-solid fa-computer menu-nav--icon"></i><strong style="color: white;">CONSULTAR</strong></a></li>
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
      <div class="container">
        <div class="row">
          <h1 style="text-align:center">
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
          </b></h1>
          <h5 style="text-align:center">
            <b><?php echo utf8_decode(strtoupper($row['area'])); ?>
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
                      <th style="text-align:center; color: white; border: 1px solid black;">NO</th>
                      <th style="text-align:center; color: white; border: 1px solid black;">FECHA DE RECEPCION DE LA SOLICITUD DE INCORPORACION AL PROGRAMA</th>
                      <th style="text-align:center; color: white; border: 1px solid black;">FOLIO DEL EXPEDIENTE DE PROTECCION</th>
                      <th style="text-align:center; color: white; border: 1px solid black;">PERSONAS PROPUESTAS</th>
                      <th style="text-align:center; color: white; border: 1px solid black;">MEDIDAS DE APOYO OTORGADAS</th>
                      <th style="text-align:center; color: white; border: 1px solid black;">VALIDACION DEL EXPEDIENTE DE PROTECCION</th>
                      <th style="text-align:center; color: white; border: 1px solid black;">DETALLES</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
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
                          echo "<tr>";
                            echo "<td style='text-align:center'>"; echo $var_fila['id']; echo "</td>";
                            echo "<td style='text-align:center'>"; echo $var_fila['fecharecep']; echo "</td>";
                            echo "<td style='text-align:center'>"; echo $var_fila['fol_exp']; echo "</td>";
                            echo "<td style='text-align:center'>"; echo $row['c']; echo "</td>";
                            echo "<td style='text-align:center'>"; echo $row2['cant']; echo "</td>";
                            echo "<td style='text-align:center'>";
                              if ($var_fila['validacion'] == 'true') {
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
  <div class="contenedor">
    <?php
    include('../documentacion/glosario.php');
    include('../documentacion/manual_tecnico.php');
    include('../documentacion/manual_usuario.php');
    if ($permiso1 === 'consulta') {
      if ($subdireccion === 'subdireccion de enlace interinstitucional') {
        echo '<a href="../asistencias_medicas/admin.php" class="btn-flotante">INICIO</a>';
      }elseif ($subdireccion === 'Subdirección de Análisis de Riesgo') {
        echo '<a href="../subdireccion_de_analisis_de_riesgo/menu.php" class="btn-flotante">INICIO</a>';
      }elseif ($subdireccion === 'Subdirección de Apoyo Técnico y Jurídico') {
        echo '<a href="../subdireccion_de_apoyo_tecnico_juridico/menu.php" class="btn-flotante">INICIO</a>';
      }
    }
    ?>
  </div>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  var fecha_inicio = new Date().toLocaleDateString();
  var fecha_fin = "31/8/2025";
  // console.log(fecha_inicio);
  if (fecha_inicio <= fecha_fin){
  Swal.fire({
  title:"APLICATIVO INCIDENCIAS 2.0",
  html: '<h3 style="text-align: justify;"> Como parte del mantenimiento y actualización del Sistema Informático del Programa de Protección de Sujetos que Intervienen en el Procedimiento Penal o Extinción de Dominio, se llevó a cabo la actualización del apartado de incidencias con la finalidad de mejorar los procesos y experiencia de los usuarios en el uso del sistema.</h3><h3 style="text-align: justify;">Si deseas conocer más sobre la actualización da clic <a href="../docs/incidencias2.0.pdf">aquí.</a></h3>',
  width: 1000,
  imageUrl: "../image/incidenciasvers2.0.png",
  imageWidth: 400,
  imageHeight: 300,
  padding: "3em",
  color: "#242425ff",
  background: "#fff url(/images/trees.png)",
  backdrop: `
    rgba(79, 87, 82, 0.4)
  `,
  confirmButtonText: 'Cerrar',
  confirmButtonColor: '#5F6D6B',
});
  }
</script> -->
</body>
<link rel="stylesheet" href="../css/menuactualizado.css">
<script src="../js/menu.js"></script>
</html>
