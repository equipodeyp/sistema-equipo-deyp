<?php
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set("America/Mexico_City");
/*require 'conexion.php';*/
include("../conexion.php");
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
$check_traslado = 1;
$_SESSION["check_traslado"] = $check_traslado;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>REGISTRO TRASLADO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <script src="../../js/funciones_react.js"></script>
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
          echo "<img style='text-align:center;' src='../../image/mujerup.png' width='100' height='100'>";
        }

        if ($genero=='hombre') {
          // $foto = ../image/user.png;
          echo "<img src='../../image/hombreup.jpg' width='100' height='100'>";
        }
        // echo $genero;
         ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>

      <nav class="menu-nav">
        <br><br>
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
          <h4 style="text-align:center">
            <?php echo utf8_decode(strtoupper($row['area'])); ?> </span>
          </h4>
        </div>
      </div>
      <div class="">
        <h1 style="text-align:center">CONSULTA DE TRASLADOS</h1>
        <!-- Search Forms -->
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

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="form-label"><b>Hasta el dia</b> </label>
                        <input type="date" name="fin" id="finfech" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label"><b>BUSCAR</b></label><br>
                        <button type="submit" id="ocultar-mostrar" class="btn btn-primary" name="enviar"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
                 <br>
              <!-- <button class="btn btn-primary control me-2 fw-bold" type="submit" name="enviar" id="ocultar-mostrar"> <b>Buscar </b> </button> -->
              </form>
          </div>
          <?php
        $conexion=mysqli_connect("localhost","root","","sistemafgjem");
        $where="";

        if(isset($_GET['enviar'])){
          $fechainicial = date("Y-m-d", strtotime($_GET['star']));
          $fechafin  = date("Y-m-d", strtotime($_GET['fin']));


          if (isset($_GET['star']))
          {
            $where="WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
            $mostrar = 1;
          }

        }


        ?>
                   <br>


              </form>
            </div>
            <?php
            $totalfin2 = 0;
            $totalfin = 0;
            $totaladmns = array();
            $servidoresid = array();

            if ($mostrar === 1) {
              $conexion=mysqli_connect("localhost","root","","sistemafgjem");
              $SQL="SELECT * FROM react_traslados $where";
              $dato = mysqli_query($conexion, $SQL);
              $row_cnt = $dato->num_rows;
              if($dato -> num_rows >0){
                while($fila=mysqli_fetch_array($dato)){
                $idunica_cap = $fila['id'];
              }
              ?>
              <!-- html -->
              <?php
              function transformarmesaletra($pasardia, $pasarmes, $pasaranio){
                switch ($pasarmes) {
                  case 1:
                  echo $fecha_formateada = $pasardia." DE ENERO DE ".$pasaranio;
                  break;
                  case 2:
                  echo $fecha_formateada = $pasardia." DE FEBRERO DE ".$pasaranio;
                  break;
                  case 3:
                  echo $fecha_formateada = $pasardia." DE MARZO DE ".$pasaranio;
                  break;
                  case 4:
                  echo $fecha_formateada = $pasardia." DE ABRIL DE ".$pasaranio;
                  break;
                  case 5:
                  echo $fecha_formateada = $pasardia." DE MAYO DE ".$pasaranio;
                  break;
                  case 6:
                  echo $fecha_formateada = $pasardia." DE JUNIO DE ".$pasaranio;
                  break;
                  case 7:
                  echo $fecha_formateada = $pasardia." DE JULIO DE ".$pasaranio;
                  break;
                  case 8:
                  echo $fecha_formateada = $pasardia." DE AGOSTO DE ".$pasaranio;
                  break;
                  case 9:
                  echo $fecha_formateada = $pasardia." DE SEPTIEMBRE DE ".$pasaranio;
                  break;
                  case 10:
                  echo $fecha_formateada = $pasardia." DE OCTUBRE DE ".$pasaranio;
                  break;
                  case 11:
                  echo $fecha_formateada = $pasardia." DE NOVIEMBRE DE ".$pasaranio;
                  break;
                  case 12:
                  echo $fecha_formateada = $pasardia." DE DICIEMBRE DE ".$pasaranio;
                  break;
                }
              }
// $fechainicial;
$diainicial = date('d', strtotime($fechainicial));
$mesnumeroinicial = date('m', strtotime($fechainicial));
$anioinicial = date('Y', strtotime($fechainicial));
// transformarmesaletra($diainicial, $mesnumeroinicial, $anioinicial);
// $fechafin;
$diafinal = date('d', strtotime($fechafin));
$mesnumerofinal = date('m', strtotime($fechafin));
$aniofinal = date('Y', strtotime($fechafin));


              ?>
              <div class="container">
                <div class="well form-horizontal">
                  <div style="display: flex; justify-content: center;">
                    <table style="width:50%" class="table table-striped table-bordered" cellspacing="0" >
                        <thead>
                            <tr>
                                <th colspan="4" class="table-header" style="text-align:center">PERIODO DE CONSULTA DE LA INFORMACIÓN</th>
                            </tr>
                            <tr>
                                <td style="text-align:left; background-color: #5F6D6B;"><p style="color:#FFFFFF;">DEL</p></td>
                                <td style="text-align:left; background-color: #fff;"><?php transformarmesaletra($diainicial, $mesnumeroinicial, $anioinicial); ?></td>
                                <td style="text-align:left; background-color: #5F6D6B;"><p style="color:#FFFFFF;">AL</p></td>
                                <td style="text-align:left; background-color: #fff;"><?php transformarmesaletra($diafinal, $mesnumerofinal, $aniofinal); ?></td>
                            </tr>
                        </thead>
                    </table>
                  </div>
                  <div class="contenedor">
                    <table class="table table-striped table-bordered" cellspacing="0" >
                        <thead>
                            <tr>
                                <th class="table-header" style="text-align:center">MOTIVO</th>
                                <th class="table-header" style="text-align:center">SIN ESTADÍA</th>
                                <th class="table-header" style="text-align:center">CON ESTADÍA</th>
                                <th class="table-header" style="text-align:center">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          // pruebas de conteo
                          // $concust = 0;
                          // $sincust = 0;
                          // $suj0  = "SELECT * FROM react_sujetos_traslado
                          // INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                          // WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                          // $rsuj0 = $mysqli->query($suj0);
                          // while ($fsuj0 = $rsuj0->fetch_assoc()) {
                          //   echo $fsuj0['resguardado'];
                          //   if ($fsuj0['resguardado'] === 'SI') {
                          //     $concust = $concust + 1;
                          //   }elseif ($fsuj0['resguardado'] === 'NO') {
                          //     $sincust = $sincust + 1;
                          //   }
                          // }
                          // echo $concust;
                          // echo "<br>";
                          // echo $sincust;
                          // echo "<br>";
                          // traer lista de motivos de traslados
                          $motivotras = "SELECT * FROM react_traslados_instancias";
                          $rmotivotras = $mysqli->query($motivotras);
                          while ($fmotivotras = $rmotivotras ->fetch_assoc()) {
                            $namemotivo = $fmotivotras['nombre'];

                            // contar total de motivo dada las fechas
                            // $motivoname = "SELECT COUNT(*) AS totalmotivo FROM react_destinos_traslados
                            // INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
                            // WHERE react_destinos_traslados.motivo = '$namemotivo' AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                            // con estadia
                            $conestadia = "SELECT COUNT(*) AS totalconestadia FROM react_sujetos_traslado
                            INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id = react_destinos_traslados.id_traslado
                            INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                            WHERE react_destinos_traslados.motivo = '$namemotivo' AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'
                            AND react_sujetos_traslado.resguardado = 'SI'";
                            $rconestadia = $mysqli->query($conestadia);
                            $fconestadia = $rconestadia->fetch_assoc();
                            // sin estadia
                            $sinestadia = "SELECT COUNT(*) AS totalsinestadia FROM react_sujetos_traslado
                            INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id = react_destinos_traslados.id_traslado
                            INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                            WHERE react_destinos_traslados.motivo = '$namemotivo' AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'
                            AND react_sujetos_traslado.resguardado = 'NO'";
                            $rsinestadia = $mysqli->query($sinestadia);
                            $fsinestadia = $rsinestadia->fetch_assoc();
                            ?>
                            <tr>
                              <td><?php echo $fmotivotras['nombre']; ?></td>
                              <td><?php echo $fsinestadia['totalsinestadia']; ?></td>
                              <td><?php echo $fconestadia['totalconestadia']; ?></td>
                              <td></td>
                            </tr>
                            <?php
                          }
                          ?>
                          <tr>
                            <td>TRASLADAR A LAS PP  Y SP <br> A DIFERENTES INSTACNIAS</td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="container">
                      <!-- CONSULTA PARA CONTAR A CUANTOS MUNICIPIOS SE HAN HECHO TRASLADOS -->
                      <?php
                      $summunictras = "SELECT COUNT(DISTINCT municipio) AS totalmunicipios FROM react_destinos_traslados";
                      $rsummunictras = $mysqli->query($summunictras);
                      $fsummunictras = $rsummunictras->fetch_assoc();
                      ?>
                      <!--  -->
                      <table class="table table-striped table-bordered" cellspacing="0" >
                          <thead>
                              <tr>
                                  <th class="table-header" style="text-align:center">MUNICIPIO</th>
                                  <th class="table-header" style="text-align:center"><?php echo $fsummunictras['totalmunicipios']; ?></th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            // traer lista de motivos de traslados
                            $municipiotras = "SELECT DISTINCT municipio FROM react_destinos_traslados";
                            $rmunicipiotras = $mysqli->query($municipiotras);
                            while ($fmunicipiotras = $rmunicipiotras ->fetch_assoc()) {
                              ?>
                              <tr>
                                <td><?php echo $fmunicipiotras['municipio']; ?></td>
                                <td></td>
                              </tr>
                              <?php
                            }
                            ?>
                          </tbody>
                      </table>

                      <table class="table table-striped table-bordered" cellspacing="0" >
                          <thead>
                              <tr>
                                  <th class="table-header" style="text-align:center">KILOMETROS RECORRIDOS</th>
                                  <th class="table-header" style="text-align:center"><?php echo $fsummunictras['totalmunicipios']; ?></th>
                              </tr>
                          </thead>
                      </table>

                      <table  class="table table-striped table-bordered" cellspacing="0" >
                          <thead>
                              <tr>
                                  <th class="table-header" style="text-align:center">TOTAL DE PP Y SP TRASLADADOS</th>
                                  <th class="table-header" style="text-align:center"><?php echo $fsummunictras['totalmunicipios']; ?></th>
                              </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>CON ESTADÍA</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>SIN ESTADÍA</td>
                              <td></td>
                            </tr>
                          </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- tablas -->
                </div>
              </div>
              <?php
            }else {
              ?>
              <h1>no existen registros</h1>
              <?php
            }
            }
            ?>
      </div>
    </div>
  </div>
  <div class="contenedor">
      <a href="../admin.php" class="btn-flotante">REGRESAR</a>
  </div>
</body>
</html>
