<?php
// error_reporting(0);
date_default_timezone_set("America/Mexico_City");
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
include("../conexion.php");
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
  <script src="../../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="../../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../../css/main2.css">
  <!--font awesome local-->
  <link rel="stylesheet" href="../../css/fontawesome/css/all.css">
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../../css/breadcrumb.css">
  <link rel="stylesheet" href="../../css/bootstrap5-3-8.min.css">
  <script src="../../js/bootstrap5-3-8.bundle.min.js"></script>
  <script src="../../js/popper5-3-8.min.js"></script>
  <script src="../../js/bootstrap5-3-8.min.js"></script>
  <!--  -->
  <link rel="stylesheet" type="text/css" href="../../css/toast.css"/>
  <link rel="stylesheet" href="../../css/button_notification.css" type="text/css">
  <link href="../../datatables/datatablesv2026.min.css" rel="stylesheet">
  <script src="../../datatables/datatablesv2026.min.js"></script>
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
          echo "<img src='../../image/mujerup.png' width='100' height='100'>";
        }
        if ($genero=='hombre') {
          echo "<img src='../../image/hombreup.jpg' width='100' height='100'>";
        }
         ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
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
      <div class="container"><br>
        <div class="row">
          <h1 style="text-align:center"><b>
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
          </b></h1>
          <h4 style="text-align:center">
            <b><?php echo utf8_decode(strtoupper($row['area'])); ?></b>
          </h4>
        </div>
        <!--Ejemplo tabla con DataTables-->
        <b>
          <br><br>
          <div class="">
            <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <table id="bd_react" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <!-- <h3 style="text-align:center">Registros</h3> -->
                        <tr>
                            <th style="text-align:center">No.</th>
                            <th style="text-align:center">SUBDIRECCION</th>
                            <!-- <th style="text-align:center">ID ACTIVIDAD</th> -->
                            <!-- <th style="text-align:center">FUNCION</th> -->
                            <!-- <th style="text-align:center">UNIDAD DE MEDIDA</th> -->
                            <th style="text-align:center">ACTIVIDAD</th>
                            <th style="text-align:center">CLASIFICACION</th>
                            <th style="text-align:center">FECHA</th>
                            <!-- <th style="text-align:center">CANTIDAD</th> -->
                            <!-- <th style="text-align:center">ENTIDAD MUNICIPIO</th> -->
                            <th style="text-align:center">FOLIO EXPEDIENTE</th>
                            <th style="text-align:center">ID SUJETO</th>
                            <!-- <th style="text-align:center">KILOMETRAJE</th> -->
                            <!-- <th style="text-align:center">OBSERVACIONES</th> -->
                            <!-- <th style="text-align:center">EN CENTRO DE RESGUARDO</th> -->
                        </tr>
                    </thead>
                  <tbody>
                    <?php
//                     UPDATE `react_actividad` 
// SET id_actividad = 8
// WHERE id_subdireccion = 4 AND unidad_medida = 'OTRAS ACTIVIDADES';
                    $año = date("Y");
                    // echo "<br>";
                    $fechaprincipio = $año.'-01-01';
                    // echo "<br>";
                    $fechatermino = $año.'-12-31';
                    $id = 0;
                    $reactbd = "SELECT * FROM react_actividad WHERE fecha BETWEEN '$fechaprincipio' AND '$fechatermino' ORDER BY fecha ASC";
                    $rreactbd = $mysqli ->query ($reactbd);
                    while ($freactbd = $rreactbd->fetch_assoc()) {
                      $id = $id +1;
                      $idsub = $freactbd['id_subdireccion'];
                      // get name Subdirección
                      $getsub  ="SELECT * FROM react_subdireccion WHERE id = '$idsub'";
                      $rgetsub = $mysqli->query($getsub);
                      $fgetsub = $rgetsub ->fetch_assoc();
                      // get name actividad por subdireccion
                      ?>
                      <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $fgetsub['subdireccion']; ?></td>
                        <!-- <td><?php echo $freactbd['idactividad']; ?></td> -->
                        <!-- <td><?php echo mb_strtoupper (html_entity_decode($freactbd['funcion'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?></td> -->
                        <!-- <td><?php echo mb_strtoupper (html_entity_decode($freactbd['unidad_medida'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?></td> -->
                        <td>
                        <?php if ($idsub == 1) {
                          $idact_analisis = $freactbd['id_actividad'];
                          $actanalisis = "SELECT * FROM react_actividad_analisis WHERE id = '$idact_analisis'";
                          $ractanalisis = $mysqli ->query($actanalisis);
                          $factanalisis = $ractanalisis ->fetch_assoc();
                          echo mb_strtoupper (html_entity_decode($factanalisis['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8"));

                        }elseif ($idsub == 2) {
                          $idact_apoyo = $freactbd['id_actividad'];
                          $actapoyo = "SELECT * FROM react_actividad_apoyo WHERE id = '$idact_apoyo'";
                          $ractapoyo = $mysqli ->query($actapoyo);
                          $factapoyo = $ractapoyo ->fetch_assoc();
                          echo mb_strtoupper (html_entity_decode($factapoyo['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8"));
                        }
                        elseif ($idsub == 3) {
                          $idact_enlace = $freactbd['id_actividad'];
                          $actenlace = "SELECT * FROM react_actividad_enlace WHERE id = '$idact_enlace'";
                          $ractenlace = $mysqli ->query($actenlace);
                          $factenlace = $ractenlace ->fetch_assoc();
                          echo mb_strtoupper (html_entity_decode($factenlace['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8"));
                        }
                        elseif ($idsub == 4) {
                          $idact_ejecucion = $freactbd['id_actividad'];
                          $actejecucion = "SELECT * FROM react_actividad_ejecucion WHERE id = '$idact_ejecucion'";
                          $ractejecucion = $mysqli ->query($actejecucion);
                          $factejecucion = $ractejecucion ->fetch_assoc();
                          echo mb_strtoupper (html_entity_decode($factejecucion['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8"));
                        }
                        ?></td>
                        <td><?php
                        if ($idsub == 4) {
                          // echo "ejecucion de medidas";
                          // echo "<br>";
                          $idactsub = $freactbd['id_actividad'];
                          // echo "<br>";
                          if ($idactsub == 3) {
                            // echo "facilitar el contacto";
                            // echo "<br>";
                            $clasificacioncontfam = $freactbd['clasificacion'];
                            $getfac_contacto = "SELECT nombre FROM react_contacto_familiar WHERE contactoid = '$clasificacioncontfam'";
                            $rgetfac_contacto = $mysqli->query($getfac_contacto);
                            $fgetfac_contacto = $rgetfac_contacto->fetch_assoc();
                            echo $fgetfac_contacto['nombre'];
                          }else {
                            echo mb_strtoupper (html_entity_decode($freactbd['clasificacion'], ENT_QUOTES | ENT_HTML401, "UTF-8"));
                          }
                        }else {
                          echo mb_strtoupper (html_entity_decode($freactbd['clasificacion'], ENT_QUOTES | ENT_HTML401, "UTF-8"));
                        }
                        ?></td>
                        <td><?php echo date("d/m/Y", strtotime($freactbd['fecha'])); ?></td>
                        <!-- <td><?php echo $freactbd['cantidad']; ?></td> -->
                        <!-- <td><?php echo $freactbd['entidad_municipio']; ?></td> -->
                        <td><?php
                          $fol_exp_suj = $freactbd['folio_expediente'];
                          if ($fol_exp_suj === 'SI') {
                            echo "NO SE GUARDO CORRECTAMENTE";
                          }else {
                            echo $freactbd['folio_expediente'];
                          }
                        ?></td>
                        <td><?php
                        $idsujetonum= $freactbd['id_sujeto'];
                        if (is_numeric($idsujetonum)) {
                          // echo "El valor es un número válido. Puedes hacer operaciones matemáticas.";
                          $getidentificador = "SELECT identificador FROM datospersonales
                                                WHERE id = '$idsujetonum'";
                          $rgetidentificador = $mysqli->query($getidentificador);
                          $fgetidentificador = $rgetidentificador->fetch_assoc();
                          echo $fgetidentificador['identificador'];
                        } else {
                          // echo "El valor es un texto o código alfanumérico (contiene letras o símbolos).";
                          if ($idsujetonum === 'Lista Acumulada' || $idsujetonum === '') {
                            echo "NO SE GUARDO CORRECTAMENTE";
                          }else {
                            echo $freactbd['id_sujeto'];
                          }
                        }
                        ?>
                        </td>
                        <!-- <td></td> -->
                        <!-- <td></td> -->
                        <!-- <td></td> -->
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
        </b>
        <div class="contenedor">
          <a href="../admin.php" class="btn-flotante">REGRESAR</a>
        </div>
      </div>
    </div>
  </div>
</body>
<link rel="stylesheet" href="../../css/menuactualizado.css">
<script src="../../js/menu.js"></script>
</html>
