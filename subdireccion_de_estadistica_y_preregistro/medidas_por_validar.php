<?php
error_reporting(0);
date_default_timezone_set("America/Mexico_City");
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$query= "SELECT * FROM MEDIDAS
inner join validar_medida on medidas.id = validar_medida.id_medida
WHERE validar_medida.validar_datos = 'false'";
$rq = $mysqli->query($query);
while($row = $rq->fetch_assoc()){
  if ($row['tipo'] == 'PROVISIONAL') {
    $existe_fechaprovisional = 'SI';
    break;
  }else {
    $existe_fechaprovisional = 'NO';
  }
  // echo $row['tipo'];
}
// echo $existe_fechaprovisional;
?>
<!DOCTYPE html>
<html lang="es">
<head>
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
        <div class="container well form-horizontal">
          <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="../subdireccion_de_estadistica_y_preregistro/menu.php">REGISTROS</a>
            <a class="actived">MEDIDAS POR VALIDAR</a>
          </div>
          <h3 style="text-align:center">MEDIDAS RESTANTES POR VALIDAR</h3>
          <div class="row">
            <div class="col-lg-12">
              <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                  <thead class="thead-light">
                    <tr>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">#</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FOLIO EXPEDIENTE</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">CATEGORIA</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">TIPO</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">CLASIFICACIÓN</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">INCISO</th>
                      <?php if ($existe_fechaprovisional == 'SI') {
                        ?>
                        <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA PROVISIONAL</th>
                        <?php
                      }
                      ?>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA DEFINITIVA</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">ESTATUS</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA EJECUCIÓN</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">MUNICIPIO EJECUCIÓN</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">VER</th>
                      <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">VALIDAR</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $contador = 0;
                    $query= "SELECT * FROM MEDIDAS
                    inner join validar_medida on medidas.id = validar_medida.id_medida
                    WHERE validar_medida.validar_datos = 'false'";
                    $rq = $mysqli->query($query);
                    while($row = $rq->fetch_assoc()){
                      $contador = $contador + 1;
                      $id_per = $row['id_persona'];
                      $dper = "SELECT * FROM datospersonales WHERE id = '$id_per'";
                      $rdper = $mysqli->query($dper);
                      $fdper = $rdper->fetch_assoc();
                    ?>
                    <tr>
                      <td style="text-align:center; border: 1px solid black;"><?php echo $contador ?></td>
                      <td style="text-align:center; border: 1px solid black;"><?php echo $row['folioexpediente']; ?></td>
                      <td style="text-align:center; border: 1px solid black;"><?php echo $row['categoria']; ?></td>
                      <td style="text-align:center; border: 1px solid black;"><?php echo $row['tipo']; ?></td>
                      <td style="text-align:center; border: 1px solid black;"><?php echo $row['clasificacion']; ?></td>
                      <td style="text-align:center; border: 1px solid black;">
                        <?php echo $row['medida'];
                        if ($row['medida'] == 'XIII. OTRAS MEDIDAS' || $row['medida'] == 'VI. OTRAS' ||
                            $row['medida'] == 'XI. EJECUCION DE MEDIDAS PROCESALES' || $row['medida'] == 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
                          ?>
                          <br><mark><small>
                          <?php
                          echo $row['descripcion'];
                        }
                        ?>
                      </small></mark></td>
                      <?php
                      if ($existe_fechaprovisional == 'SI') {
                        ?>
                        <td style="text-align:center; border: 1px solid black;">
                          <?php
                          if ($row['date_provisional'] !== '0000-00-00') {
                            echo date("d/m/Y", strtotime($row['date_provisional']));
                          }
                          ?>
                        </td>
                        <?php
                      }
                      ?>
                      <td style="text-align:center; border: 1px solid black;">
                        <?php
                        if ($row['date_definitva'] !== '0000-00-00') {
                          echo date("d/m/Y", strtotime($row['date_definitva']));
                        }
                        ?>
                      </td>
                      <td style="text-align:center; border: 1px solid black;"><?php echo $row['estatus']; ?></td>
                      <td style="text-align:center; border: 1px solid black;">
                        <?php
                        if ($row['date_ejecucion'] !== '0000-00-00') {
                          echo date("d/m/Y", strtotime($row['date_ejecucion']));
                        }
                        ?>
                      </td>
                      <td style="text-align:center; border: 1px solid black;"><?php echo $row['ejecucion']; ?></td>
                      <td style="text-align:center; border: 1px solid black;">
                        <?php
                        // echo "<a href='#edit_".$row['id']."' class='btn color-btn-success btn-sm' data-toggle='modal'><i class='fa-solid fa-file-pen'></i> Detalle</a>";
                        ?>
                        <button type="button" class="btn color-btn-success btn-sm" aria-label="Eliminar" data-bs-toggle="modal"
                          data-bs-target="#detalle_medida_<?php echo $row['id'];?>" style="white-space: nowrap;">
                          <strong style="color: white;"><i class="fa-solid fa-eye"></i></strong>
                        </button>
                        <?php
                        include('verdetalles_medida.php');
                        ?>
                      </td>
                      <td style="text-align:center; border: 1px solid black;">
                        <form method="POST" action="validar_medida_pendiente.php?folio=<?php echo $row['id_medida']; ?>">
                          <button type="submit" name="editar" class="btn color-btn-success btn-sm" style="white-space: nowrap;"><strong style="color: white;"><i class="fa-solid fa-check"></i></strong> </button>
                        </form>
                      </td>
                    </tr>
                    <?php
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
  <a href="menu.php" class="btn-flotante">INICIO</a>
</body>
<link rel="stylesheet" href="../css/menuactualizado.css">
<script src="../js/menu.js"></script>
</html>
