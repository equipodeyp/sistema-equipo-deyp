<?php
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set("America/Mexico_City");
/*require 'conexion.php';*/
include("../conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../../logout.php");
}
$check_consultaactividad = 1;
$_SESSION["check_consultaactividad"] = $check_consultaactividad;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>CONSULTA DE ACTIVIDAD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <script src="../../js/funciones_react.js"></script>
  <!-- <script src="../../js/funciones_react_actividad.js"></script> -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../../css/main2.css">
  <link rel="stylesheet" href="../../css/expediente.css">
  <!-- font-awesome -->
  <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css" rel="stylesheet">
  <!-- estilos de diseño add traslados -->
  <link rel="stylesheet" href="../../css/react_add_traslados.css">
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
          echo "<img src='../../image/mujerup.png' width='100' height='100'>";
        }

        if ($genero=='hombre') {
          echo "<img src='../../image/hombreup.jpg' width='100' height='100'>";
        }
         ?>
        <h6 style="text-align:center" class='user-nombre'> <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">
      </nav>
    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../../image/ups2.png" alt="" width="1400" height="70">
          <img style="display: block; margin: 0 auto;" src="../../image/ups3.png" alt="" width="1400" height="70">
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
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                  <h3 style="text-align:center">ACTIVIDADES</h3>
                  <tr>
                      <th style="text-align:center">NO.</th>
                      <th style="text-align:center">FECHA</th>
                      <th style="text-align:center">FUNCION</th>
                      <th style="text-align:center">ACTIVIDAD</th>
                      <th style="text-align:center">UNIDAD DE MEDIDA</th>
                      <th style="text-align:center">DETALLES</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $contador = 0;
                          $query= "SELECT * FROM react_actividad WHERE id_subdireccion = 3 ORDER BY fecha DESC";
                          $rq = $mysqli->query($query);
                             while($row = $rq->fetch_assoc()){
                               $contador = $contador + 1;
                               $id_per = $row['id_persona'];
                               $idact = $row['id_actividad'];
                               $dper = "SELECT * FROM datospersonales WHERE id = '$id_per'";
                               $rdper = $mysqli->query($dper);
                               $fdper = $rdper->fetch_assoc();
                                   ?>
                                       <tr>
                                          <td style="text-align:center"><?php echo $contador ?></span></td>
                                          <?php
                                              $originalDate = $row['fecha'];
                                              $date = date("d/m/Y", strtotime($originalDate));
                                          ?>
                                          <td style="text-align:center"><?php echo $date; ?></span></td>
                                          <td style="text-align:center"><?php echo $row['funcion']; ?></span></td>
                                          <td style="text-align:center"><?php echo $row['id_actividad']; ?></span></td>
                                          <td style="text-align:center"><?php echo $row['unidad_medida']; ?></span></td>
                                          <td style="text-align:center">
                              							<!-- <a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a> -->
                              							<?php
                              							echo "<a href='#edit_".$row['id']."' class='btn color-btn-success btn-sm' data-toggle='modal' onclick='sub($idact)'><i class='fa-solid fa-file-pen'></i> Detalle</a>";
                              							 ?>
                              							<!-- <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a> -->
                              						</td>
                                          <?php include('veractividad.php'); ?>
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
  <a href="../admin.php" class="btn-flotante">REGRESAR</a>
  <script src="../../js/funciones_react_actividad_consulta.js"></script>
</body>
</html>
