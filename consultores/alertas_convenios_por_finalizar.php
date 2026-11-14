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

$cl = "SELECT COUNT(*) as t FROM solicitud_asistencia WHERE id_servidor = '$m_user'";
$rcl = $mysqli->query($cl);
$fcl = $rcl->fetch_assoc();

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
          <div class="row" id="show_alert" style="display:;">
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
                </tr>
              </thead>
              <tbody>
                <?php
                $contador = 0;
                date_default_timezone_set('America/Mexico_City');

// 1. Límite inferior: Hace 4 días (4 días antes de hoy)
$fecha_vencidos = date('Y-m-d', strtotime('-4 days')); // Daría '2026-10-26'

// 2. Límite superior: Dentro de 16 días
$fecha_por_vencer = date('Y-m-d', strtotime('+16 days')); // Daría '2026-11-15'
                $get3dyas= "SELECT * FROM datospersonales
          INNER JOIN alerta_convenios ON alerta_convenios.id_persona = datospersonales.id
          WHERE datospersonales.estatus = 'SUJETO PROTEGIDO'
            AND alerta_convenios.fecha_termino BETWEEN '$fecha_vencidos' AND '$fecha_por_vencer' AND alerta_convenios.estatus !='HECHO'
          ORDER BY fecha_termino ASC";
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
                        <div class="alert alert-dark d-flex align-items-center justify-content-center m-0 w-100" role="alert">
                          <i style="color:red; font-size: 12px;" class="fas fa-exclamation-triangle me-2"></i>
                          <div>
                            <strong style="color:#000000; font-size: 12px;">¡REZAGADO!</strong>
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
                      }else {
                        ?>
                        <div class="alert alert-info d-flex align-items-center justify-content-center m-0 w-100" role="alert">
                          <i style="color:red; font-size: 12px;" class="fas fa-exclamation-triangle me-2"></i>
                          <div>
                            <strong style="color:#000000; font-size: 12px;">¡CONCLUIDO!</strong>
                          </div>
                        </div>
                        <?php
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
    <div class="contenedor">
    <a href="./admin.php" class="btn-flotante">REGRESAR</a>
    </div>
  <?php
  include('../documentacion/glosario.php');
  include('../documentacion/manual_tecnico.php');
  include('../documentacion/manual_usuario.php');
  ?>
</body>
<link rel="stylesheet" href="../css/menuactualizado.css">
<script src="../js/menu.js"></script>
</html>
