<?php
// error_reporting(0);
date_default_timezone_set("America/Mexico_City");
include("conexion.php");
include("actualizar_automaticamente_alerta_convenios.php");
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
$m_user = $user;
$m_user = strtoupper($m_user);
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
      <div style="text-align:center" class="user">
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
          echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
        }
         ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">
        <?php
        if ($row['cargo'] === 'subdirector') {
          ?>
          <ul>
            <li class="menu-items"><a href="#" onclick="menureportes(this)"><i style="color: #FFFFFF;" class="fa-solid fa-chart-column menu-nav--icon"></i><strong style="color: white;">REPORTES</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
              <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                <li class="menu-items"><a href='../subdireccion_de_analisis_de_riesgo/ver_reporte_diario.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-day menu-nav--icon"></i><strong style="color: white;">DIARIO</strong></a></li>
                <li class="menu-items"><a href='../subdireccion_de_analisis_de_riesgo/ver_reporte_semanal.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-week menu-nav--icon"></i><strong style="color: white;">SEMANAL</strong></a></li>
                <li class="menu-items"><a href='../subdireccion_de_analisis_de_riesgo/ver_reporte_mensual.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar menu-nav--icon"></i><strong style="color: white;">MENSUAL</strong></a></li>
                <li class="menu-items"><a href='../subdireccion_de_analisis_de_riesgo/ver_reporte_anual.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-check menu-nav--icon"></i><strong style="color: white;">ANUAL</strong></a></li>
                <li class="menu-items"><a href='../subdireccion_de_analisis_de_riesgo/ver_reporte_semestral.php'><i style="color: #FFFFFF;" class="fa-solid fa-calendar-days menu-nav--icon"></i><strong style="color: white;">SEMESTRAL</strong></a></li>
              </ul>
            </li>
          </ul>
          <?php
        }
        ?>
        <ul>
          <?php
          if ($permiso1 === 'consulta') {
            ?>
            <li class="menu-items"><a href='../consultores/admin.php'><i style="color: #FFFFFF;" class="fa-solid fa-folder-open menu-nav--icon"></i><strong style="color: white;">CONSULTAR EXPEDIENTES</strong></a></li>
            <?php
          }
          if ($permiso2 === 'validar') {
            ?>
            <li class="menu-items"><a href='./medidasavalidar.php'><i style="color: #FFFFFF;" class="fa-solid fa-circle-check menu-nav--icon"></i><strong style="color: white;">VALIDAR MEDIDAS</strong></a></li>
            <?php
          }
          if ($permiso3 ==='solicitar' || $permiso4 ==='calendario') {
            ?>
            <li class="menu-items"><a href='./menu_asistencias_medicas.php'><i style="color: #FFFFFF;" class="fa-solid fa-hospital-user menu-nav--icon"></i><strong style="color: white;">ASISTENCIAS MÉDICAS</strong></a></li>
            <?php
          }
          if ($permiso5 ==='instrumento') {
            ?>
            <li class="menu-items"><a href='./menu_instrumento.php'><i style="color: #FFFFFF;" class="fa-solid fa-file-lines menu-nav--icon"></i><strong style="color: white;">INSTRUMENTO DE ADAPTABILIDAD</strong></a></li>
            <?php
          }
					?>
        </ul>
        <ul>
          <li class="menu-items"><a href="#" onclick="menureact(this)"><i style="color: #FFFFFF;" class="fa-solid fa-laptop-file menu-nav--icon"></i><strong style="color: white;">REACT</strong><i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i></a>
            <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
              <li class="menu-items"><a href='./registrar_actividad.php'><i style="color: #FFFFFF;" class="fa-solid fa-file-medical menu-nav--icon"></i><strong style="color: white;">REGISTRAR</strong></a></li>
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
        <br>
        <!--Ejemplo tabla con DataTables-->
        <b>
          <div class="row" id="show_alert" style="display:none;">
            <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <h3 style="text-align:center">¡ALERTA HAY CONVENIOS POR FINALIZAR!</h3>
                <tr>
                  <th style="text-align:center; color: white; border: 1px solid black;">#</th>
                  <th style="text-align:center; color: white; border: 1px solid black;">EXPEDIENTE</th>
                  <th style="text-align:center; color: white; border: 1px solid black;">ID PERSONA</th>
                  <th style="text-align:center; color: white; border: 1px solid black;">FECHA INICIO</th>
                  <th style="text-align:center; color: white; border: 1px solid black;">FECHA TERMINO</th>
                  <th style="text-align:center; color: white; border: 1px solid black;">DIAS RESTANTES</th>
                  <th style="text-align:center; color: white; border: 1px solid black;">OBSERVACIONES</th>
                  <th style="text-align:center; color: white; border: 1px solid black;">SEMAFORO</th>
                  <th style="text-align:center; color: white; border: 1px solid black;">SEGUIMIENTO</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $contador = 0;
                $obtenfechaactualprincipal1 = date('Y-m-d'); echo "<br>";
                $obtenfechaactualprincipal2 = date('Y-m-d');
                $obtenfechaactualprincipal3 = date("Y-m-d",strtotime($obtenfechaactualprincipal2."- 4 days"));
                $get3dyas= "SELECT * FROM datospersonales
                INNER JOIN alerta_convenios ON alerta_convenios.id_persona = datospersonales.id
                WHERE (alerta_convenios.estatus = 'PENDIENTE' AND alerta_convenios.dias_restantes BETWEEN 1 AND 15 AND datospersonales.estatus = 'SUJETO PROTEGIDO') OR (alerta_convenios.estatus != 'HECHO' AND alerta_convenios.fecha_termino BETWEEN '$obtenfechaactualprincipal3' AND '$obtenfechaactualprincipal1'
                AND datospersonales.estatus = 'SUJETO PROTEGIDO') ORDER BY fecha_termino ASC";
                $rget3dyas = $mysqli->query($get3dyas);
                while ($fget3dyas = $rget3dyas->fetch_assoc()) {
                  $idalertconv = $fget3dyas['id'];
                  $contador = $contador + 1;
                  ?>
                  <tr>
                    <td style="text-align:center"><?php echo $contador ?></span></td>
                    <td style="text-align:center"><?php echo $fget3dyas['expediente']; ?></span></td>
                    <td style="text-align:center"><?php echo $fget3dyas['id_unico']; ?></span></td>
                    <td style="text-align:center"><?php echo date("d/m/Y", strtotime($fget3dyas['fecha_inicio'])); ?></span></td>
                    <td style="text-align:center"><?php echo date("d/m/Y", strtotime($fget3dyas['fecha_termino'])); ?></span></td>
                    <td style="text-align:center"><?php echo $fget3dyas['dias_restantes']; ?></span></td>
                    <td style="text-align:center">
                      <button type="button" class="btn color-btn-success btn-sm" data-bs-toggle="modal"
                        data-bs-target="#update_alerta_<?php echo $fget3dyas['id'];?>">
                        <i class="fa-solid fa-eye"></i>VER
                      </button>
                      <?php
                      include('update_alertaconvenio.php');
                      // echo "<a href='#edit_".$fget3dyas['id']."' class='btn color-btn-success btn-sm' data-toggle='modal'><i class='fa-solid fa-file-pen'></i>VER</a>";
                      ?>
                    </td>
                    <td style="text-align:center">
                      <?php
                      if ($fget3dyas['semaforo'] == 'MORADO') {
                        ?>
                        <div class="alert alert-info d-flex align-items-center justify-content-center m-0 w-100" role="alert">
                          <i style="color:red; font-size: 12px;" class="fas fa-exclamation-triangle me-2"></i>
                          <div>
                            <strong style="color:#000000; font-size: 12px;">¡CONCLUIDO!</strong>
                          </div>
                        </div>
                        <?php
                      }elseif ($fget3dyas['semaforo'] == 'ROJO') {
                        ?>
                        <div class="alert alert-danger d-flex align-items-center justify-content-center m-0 w-100" role="alert">
                          <i style="color:red; font-size: 12px;" class="fas fa-exclamation-triangle me-2"></i>
                          <div>
                            <strong style="color:#000000; font-size: 12px;">¡ALERTA!</strong>
                          </div>
                        </div>
                        <?php
                      }elseif ($fget3dyas['semaforo'] == 'AMARILLO') {
                        ?>
                        <div class="alert alert-warning d-flex align-items-center justify-content-center m-0 w-100" role="alert">
                          <i style="color:red; font-size: 12px;" class="fas fa-exclamation-triangle me-2"></i>
                          <div>
                            <strong style="color:#000000; font-size: 12px;">¡ATENCIÓN!</strong>
                          </div>
                        </div>
                        <?php
                      }elseif ($fget3dyas['semaforo'] == 'VERDE') {
                        ?>
                        <div class="alert alert-success d-flex align-items-center justify-content-center m-0 w-100" role="alert">
                          <i style="color:red; font-size: 12px;" class="fas fa-exclamation-triangle me-2"></i>
                          <div>
                            <strong style="color:#000000; font-size: 12px;">PRECAUCIÓN!</strong>
                          </div>
                        </div>
                        <?php
                      }
                      ?>
                    </td>
                    <td style="text-align:center">
                      <?php
                      if ($fget3dyas['estatus'] != 'PENDIENTE') {
                        echo "FINALIZADO";
                      }else {
                        echo $fget3dyas['estatus'];
                      }
                      ?>
                    </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
             </table>
          </div>
        </b>
      </div>
    </div>
  <?php
  include('../documentacion/glosario.php');
  include('../documentacion/manual_tecnico.php');
  include('../documentacion/manual_usuario.php');
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
