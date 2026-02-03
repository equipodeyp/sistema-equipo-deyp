<?php
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
            <b><?php echo utf8_decode(strtoupper($row['area'])); ?></b>
          </h5>
        </div>
        <!--Ejemplo tabla con DataTables-->
        <br><br>
        <div class="container" style="display: flex; justify-content: center;">
          <div class="row mt-8">
            <form class="d-flex" style="width: 800px;">
              <form action="" method="GET">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="" class="form-label"><b> Del dia</b></label>
                    <input type="date" name="star" id="starfech" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-1">
                  <!-- div para dejar espacio entre inputs -->
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="" class="form-label"><b>Hasta el dia</b> </label>
                    <input type="date" name="fin" id="finfech" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-1">
                  <!-- div para dejar espacio entre inputs -->
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="" class="form-label"><b>BUSCAR</b></label><br>
                    <button type="submit" id="ocultar-mostrar" class="btn btn-primary" name="enviar"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </div>
                </div>
                <br>
              </form>
            </form>
          </div>
        </div>
        <?php
        $conexion=mysqli_connect("localhost","root","","sistemafgjem");
        $where="";
        if(isset($_GET['enviar'])){
          $fechainicial = date("Y-m-d", strtotime($_GET['star']));
          $fechafin  = date("Y-m-d", strtotime($_GET['fin']));
          if (isset($_GET['star'])) {
            $where="WHERE medidas.date_ejecucion BETWEEN '$fechainicial' AND '$fechafin' AND react_actividad.id_subdireccion = 4 AND react_actividad.id_actividad = 6";
            $mostrar = 1;
          }
        }
        if ($mostrar == 1) {
          $auxsum = 0;
          $getrondin = "SELECT COUNT(*) AS total FROM medidas
          WHERE medidas.date_ejecucion BETWEEN '$fechainicial' AND '$fechafin'
          ORDER BY medidas.date_ejecucion ASC";
          $rgetrondin = $mysqli->query($getrondin);
          while ($fgetrondin = $rgetrondin->fetch_assoc()) {
            $auxsum = $auxsum +1;
            echo $totalres = $fgetrondin['total'];
            if ($totalres > 0) {
              echo "con datos";
              echo "<br>";
              ?>
              <div class="" id="showafterconsul">
                <div class="container well form-horizontal" style="text-align:center;padding:10px;border:solid 3px; width:98%;border-radius:20px;shadow">
                  <div style="display: flex; justify-content: center;">

                  </div>
                  <div style="float:left;width: 100%;outline: white solid thin">
                    <div class="table-responsive">
                      <table>
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                              <h1>PERIODO DE CONSULTA DE LA INFORMACIÓN</h1>
                              <!-- <h3>DEL <?php transformarmesaletra($diainicial, $mesnumeroinicial, $anioinicial); ?> AL <?php transformarmesaletra($diafinal, $mesnumerofinal, $aniofinal); ?> -->
                              </h3>
                                <tr>
                                  <th class="table-header" style="text-align:center">NO.</th>
                                  <th class="table-header" style="text-align:center">FECHA</th>
                                  <th class="table-header" style="text-align:center">MUNICIPIO</th>
                                  <th class="table-header" style="text-align:center">EXPEDIENTE</th>
                                  <th class="table-header" style="text-align:center">ID DE LA PP O SP</th>
                                  <th class="table-header" style="text-align:center">KILOMETROS</th>
                                  <th class="table-header" style="text-align:center">ID RONDIN META</th>
                                </tr>
                            </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }else {
              echo "sin datos";
              ?>
              <div class="alert alert-success d-flex align-items-center justify-content-center m-0 w-100" role="alert">
                <i style="color:red; font-size: 24px;" class="fas fa-exclamation-triangle me-2"></i>
                <div>
                  <strong style="color:#000000; font-size: 24px;">¡NO SE ENCOTRARON REGISTROS CON LAS FECHAS MENCIONADAS!</strong>
                </div>
              </div>
              <?php
            }
          }
        }
        ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="contenedor">
          <a href="menu.php" class="btn-flotante">INICIO</a>
        </div>
      </div>
    </div>
  </div>
</body>
<link rel="stylesheet" href="../css/menuactualizado.css">
<script src="../js/menu.js"></script>
</html>
