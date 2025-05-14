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
        <ul>
            <li>
                <a href="#" onclick="toggleSubmenu(this)">
                    <i class="color-icon fa-solid fa-book menu-nav--icon"></i>
                    <span class="menu-items" style="color: white; font-weight:bold;">TRASLADOS</span>
                    <i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i>
                </a>
                <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                  <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='./add_traslado.php'">
                    <i class="fas fa-file-medical"></i> REGISTRAR</a>
                  </li>
                  <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='./consulta_traslados.php'">
                    <i class="fas fa-laptop-file"></i> BUSCAR</a>
                  </li>
                  <!-- <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='./search_traslado.php'">
                    <i class="fas fa-search"></i> CONSULTAR CIFRAS</a>
                  </li> -->
                </ul>
            </li>
        </ul>
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
        <!-- <h1 style="text-align:center">CONSULTA DE TRASLADOS</h1> -->
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
              <div class="" id="showafterconsul">
                <div class="container well form-horizontal" style="text-align:center;padding:10px;border:solid 3px; width:98%;border-radius:20px;shadow">
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
                  <div style="float:left;width: 60%;outline: white solid thin">
                    <table  style="width:100%" class="table table-striped table-bordered" cellspacing="0" >
                      <!-- <h1>TRASLADOS</h1> -->
                      <thead>
                        <tr>
                          <th class="table-header" style="text-align:center" colspan="6">TRASLADOS</th>
                        </tr>
                        <tr>
                          <th class="table-header" style="text-align:center" rowspan="2">CONCEPTO</th>
                          <th class="table-header" style="text-align:center" colspan="2">SUJETOS PROTEGIDOS</th>
                          <th class="table-header" style="text-align:center" colspan="2">PERSONAS PROPUESTAS</th>
                          <th class="table-header" style="text-align:center" rowspan="2">TOTAL</th>
                        </tr>
                        <tr>
                          <th class="table-header" style="text-align:center">SIN ESTADÍA</th>
                          <th class="table-header" style="text-align:center">CON ESTADÍA</th>
                          <th class="table-header" style="text-align:center">SIN ESTADÍA</th>
                          <th class="table-header" style="text-align:center">CON ESTADÍA</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>TRASLADAR A LAS PP  Y SP <br> A DIFERENTES INSTANCIAS</td>
                          <?php
                          $totalcol1 = "SELECT COUNT(*) AS tcol1sin FROM react_sujetos_traslado
                          INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                          INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                          INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                          WHERE react_sujetos_traslado.resguardado = 'NO'
                          AND datospersonales.estatus = 'SUJETO PROTEGIDO'
                          AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                          $rtotalcol1 = $mysqli->query($totalcol1);
                          $ftotalcol1 = $rtotalcol1->fetch_assoc();
                          //
                          $totalcol2 = "SELECT COUNT(*) AS tcol1con FROM react_sujetos_traslado
                          INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                          INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                          INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                          WHERE react_sujetos_traslado.resguardado = 'SI'
                          AND datospersonales.estatus = 'SUJETO PROTEGIDO'
                          AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                          $rtotalcol2 = $mysqli->query($totalcol2);
                          $ftotalcol2 = $rtotalcol2->fetch_assoc();
                          //
                          $totalcol3 = "SELECT COUNT(*) AS tcol1sinpp FROM react_sujetos_traslado
                          INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                          INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                          INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                          WHERE react_sujetos_traslado.resguardado = 'NO'
                          AND datospersonales.estatus = 'PERSONA PROPUESTA'
                          AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                          $rtotalcol3 = $mysqli->query($totalcol3);
                          $ftotalcol3 = $rtotalcol3->fetch_assoc();
                          //
                          $totalcol4 = "SELECT COUNT(*) AS tcol1conpp FROM react_sujetos_traslado
                          INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                          INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                          INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                          WHERE react_sujetos_traslado.resguardado = 'SI'
                          AND datospersonales.estatus = 'PERSONA PROPUESTA'
                          AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                          $rtotalcol4 = $mysqli->query($totalcol4);
                          $ftotalcol4 = $rtotalcol4->fetch_assoc();
                          //
                          $totalcol5 = "SELECT COUNT(*) AS totalfinal FROM react_sujetos_traslado
                          INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                          INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                          INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                          WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                          $rtotalcol5 = $mysqli->query($totalcol5);
                          $ftotalcol5 = $rtotalcol5->fetch_assoc();
                          //
                          ?>
                          <td><?php echo $ftotalcol1['tcol1sin'] ?></td>
                          <td><?php echo $ftotalcol2['tcol1con'] ?></td>
                          <td><?php echo $ftotalcol3['tcol1sinpp']; ?></td>
                          <td><?php echo $ftotalcol4['tcol1conpp']; ?></td>
                          <td><?php echo $ftotalcol5['totalfinal']; ?></td>
                        </tr>
                        <?php
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
                          INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                          INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                          INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                          WHERE react_destinos_traslados.motivo = '$namemotivo' AND react_sujetos_traslado.resguardado = 'SI'
                          AND datospersonales.estatus = 'SUJETO PROTEGIDO'
                          AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                          $rconestadia = $mysqli->query($conestadia);
                          $fconestadia = $rconestadia->fetch_assoc();
                          // sin estadia
                          $sinestadia = "SELECT COUNT(*) AS totalsinestadia FROM react_sujetos_traslado
                          INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                          INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                          INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                          WHERE react_destinos_traslados.motivo = '$namemotivo' AND react_sujetos_traslado.resguardado = 'NO'
                          AND datospersonales.estatus = 'SUJETO PROTEGIDO'
                          AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                          $rsinestadia = $mysqli->query($sinestadia);
                          $fsinestadia = $rsinestadia->fetch_assoc();
                          // PERSONAS PROPUESTAS
                          $conestadiaprop = "SELECT COUNT(*) AS totalconestadiaprop FROM react_sujetos_traslado
                          INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                          INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                          INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                          WHERE react_destinos_traslados.motivo = '$namemotivo' AND react_sujetos_traslado.resguardado = 'SI'
                          AND datospersonales.estatus = 'PERSONA PROPUESTA'
                          AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                          $rconestadiaprop = $mysqli->query($conestadiaprop);
                          $fconestadiaprop = $rconestadiaprop->fetch_assoc();
                          //
                          $sinestadiaprop = "SELECT COUNT(*) AS totalsinestadiaprop FROM react_sujetos_traslado
                          INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                          INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                          INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                          WHERE react_destinos_traslados.motivo = '$namemotivo' AND react_sujetos_traslado.resguardado = 'NO'
                          AND datospersonales.estatus = 'PERSONA PROPUESTA'
                          AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                          $rsinestadiaprop = $mysqli->query($sinestadiaprop);
                          $fsinestadiaprop = $rsinestadiaprop->fetch_assoc();
                          // TOTALES POR MOTIVO
                          $totalmotivo_des = "SELECT COUNT(*) AS totalmotivo_des FROM react_sujetos_traslado
                          INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                          INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                          WHERE react_destinos_traslados.motivo = '$namemotivo'
                          AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                          $rtotalmotivo_des = $mysqli->query($totalmotivo_des);
                          $ftotalmotivo_des = $rtotalmotivo_des->fetch_assoc();
                          ?>
                          <tr>
                            <td><?php echo $fmotivotras['nombre']; ?></td>
                            <td><?php echo $fsinestadia['totalsinestadia']; ?></td>
                            <td><?php echo $fconestadia['totalconestadia']; ?></td>
                            <td><?php echo $fsinestadiaprop['totalsinestadiaprop']; ?></td>
                            <td><?php echo $fconestadiaprop['totalconestadiaprop']; ?></td>
                            <td><?php echo $ftotalmotivo_des['totalmotivo_des']; ?></td>
                          </tr>
                          <?php
                        }
                        ?>

                      </tbody>
                    </table>
                    <br><br>
                    <!-- CONTAR TOTAL DE TRASLADOS -->
                    <?php
                    $tottras = "SELECT COUNT(*) AS totaltraslados  FROM react_traslados
                                WHERE fecha BETWEEN '$fechainicial' AND '$fechafin'";
                    $rtottras = $mysqli -> query ($tottras);
                    $ftottras = $rtottras -> fetch_assoc();
                    ?>
                    <table style="width:100%" class="table table-striped table-bordered" cellspacing="0" >
                        <thead>
                            <tr>
                                <th class="table-header" style="text-align:center">CONCEPTO</th>
                                <th class="table-header" style="text-align:center">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>TOTAL DE REGISTROS</td>
                            <td><?php echo $ftottras['totaltraslados']; ?></td>
                          </tr>
                        </tbody>
                    </table>

                    <table style="width:100%" class="table table-striped table-bordered" cellspacing="0" >
                        <thead>
                            <tr>
                                <th class="table-header" style="text-align:center">NO.</th>
                                <th class="table-header" style="text-align:center">TRASLADO</th>
                                <th class="table-header" style="text-align:center">FECHA</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $auxsum = 0;
                          $auxsum2 = 0;
                          $sujetosidrecor = array();
                          $sujetosidrecor2 = array();
                          $conteotrasdestino001 = "SELECT * FROM react_sujetos_traslado
                          INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                          INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                          INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                          WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'
                          ORDER BY react_traslados.fecha ASC";
                          $rconteotrasdestino001 = $mysqli->query($conteotrasdestino001);
                          while ($fconteotrasdestino001 = $rconteotrasdestino001->fetch_assoc()){
                            $iddd = intVal($fconteotrasdestino001['id_sujeto']);
                            array_push($sujetosidrecor, $iddd);
                          }
                          $miArray = array(1, 2, 2, 2, 3, 3, 4, 4, 5);
                          // Verificar si el array tiene al menos dos elementos
                          if (count($sujetosidrecor) >= 3) {
                              // Iterar sobre el array
                              for ($i = 0; $i < count($sujetosidrecor); $i++) {
                                  // Obtener el valor anterior
                                  $anterior = ($i > 0) ? $sujetosidrecor[$i - 1] : null;
                                  $anterior2 = ($i > 0) ? $sujetosidrecor[$i - 2] : null;
                                  // Obtener el valor actual
                                  $actual = $sujetosidrecor[$i];
                                  $actual2 = $sujetosidrecor[$i+1];
                                  // Comparar si el valor anterior es igual al valor actual
                                  if ($i > 0 && $anterior2 == $actual) {
                                       // echo "Valor igual: 3" . PHP_EOL;
                                       array_push($sujetosidrecor2, 3);
                                  }elseif ($i > 0 && $anterior == $actual) {
                                     // "Valecho or igual: 2" . PHP_EOL;
                                     array_push($sujetosidrecor2, 2);
                                  } else {
                                      //Si es diferente, imprimimos el valor actual.
                                       // echo "Valor desigual: 1" . PHP_EOL;
                                       array_push($sujetosidrecor2, 1);
                                  }
                              }
                          }
                          $conteotrasdestino = "SELECT * FROM react_sujetos_traslado
                          INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                          INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                          INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                          WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'
                          ORDER BY react_traslados.fecha ASC";
                          $rconteotrasdestino = $mysqli->query($conteotrasdestino);
                          while ($fconteotrasdestino = $rconteotrasdestino->fetch_assoc()) {
                            $auxsum = $auxsum +1;
                            $valdestino = $fconteotrasdestino['id_destino'];

                            $conteotrasdestino2 = "SELECT COUNT(*) AS pt FROM react_sujetos_traslado
                             INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                             WHERE react_sujetos_traslado.id_sujeto = '$idsujetorecor' AND react_sujetos_traslado.id_traslado ='$numtrasladorecor'";
                            $rconteotrasdestino2 = $mysqli->query($conteotrasdestino2);
                            $fconteotrasdestino2 = $rconteotrasdestino2->fetch_assoc();

                            $resmotivodes = $fconteotrasdestino['motivo'];

                            $restrasladounico = $fconteotrasdestino['idtrasladounico'];
                            $resmunicipiodes = $fconteotrasdestino['municipio'];
                            $cadena = $resmotivodes;
                            $texto_minusculas = mb_strtolower($cadena, 'UTF-8');
                            $texto_minusculas2 = mb_strtolower($resmunicipiodes, 'UTF-8');
                            // $texto_minusculas; // Imprime "hola mundo, éste es un ejemplo."
                            // echo "<br>";
                            $foo = ucfirst($texto_minusculas);
                            $foo2= ucfirst($texto_minusculas2);
                            // echo "<br>";
                             $ultimosCinco = substr($fconteotrasdestino['folio_expediente'], -7);
                             // $fconteotrasdestino['identificador'];
                            $cadena = $fconteotrasdestino['identificador'];
                            // echo "<br>";
                            $caracter = "-";
                            // Encuentra la posición del carácter
                            $posicion = strpos($cadena, $caracter);
                            // Si el carácter existe en la cadena
                            if ($posicion !== false) {
                              // Extrae la parte de la cadena hasta el carácter
                              $parte = substr($cadena, 0, $posicion);
                              // Imprime la parte de la cadena
                              $parte; // Imprimirá "Hola"
                            }
                            $texto = $parte;
                            // Convertir el texto en un array de caracteres
                            $arrayCaracteres = str_split($texto);
                            // Unir los caracteres con un punto
                            $textoConPuntos = implode(".", $arrayCaracteres);
                            $concatenacion = 'Traslado_Exp_'.$ultimosCinco.'-'.$textoConPuntos.'.-'.$foo.'-'.$restrasladounico.'-'.$foo2;
                          ?>
                          <tr>
                            <td><?php echo $auxsum; ?></td>
                            <td><?php echo $concatenacion; ?></td>
                            <td><?php echo date("d/m/Y", strtotime($fconteotrasdestino['fecha'])); ?></td>
                          </tr>
                        <?php
                        $auxsum2 = $auxsum2 +1;
                        }
                        ?>
                        </tbody>
                    </table>

                  </div>
                  <div style="float:left;width: 2%;outline: white solid thin">
                    <h6 style="display:none;">hola</h6>&nbsp;
                  </div>
                  <!-- conteo de total de municipios de destinos de traslados -->
                  <?php
                  $summunictras = "SELECT COUNT(*) AS totalmunicipios FROM react_destinos_traslados
                  INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
                  INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
                  WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                  $rsummunictras = $mysqli ->query ($summunictras);
                  $fsummunictras = $rsummunictras ->fetch_assoc();
                  ?>
                  <div style="float:left;width: 38%;outline: white solid thin">
                    <table style="width:100%" class="table table-striped table-bordered" cellspacing="0" >
                      <thead>
                        <tr>
                          <th class="table-header" style="text-align:center" colspan="2">TRASLADOS</th>
                        </tr>
                        <tr>
                          <th class="table-header" style="text-align:center">MUNICIPIO</th>
                          <th class="table-header" style="text-align:center"><?php echo $fsummunictras['totalmunicipios']; ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // traer lista de motivos de traslados
                        $municipiotras = "SELECT DISTINCT react_destinos_traslados.municipio FROM react_destinos_traslados
                        INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
                        INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
                        WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                        $rmunicipiotras = $mysqli->query($municipiotras);
                        while ($fmunicipiotras = $rmunicipiotras ->fetch_assoc()) {
                          $namemunicipio = $fmunicipiotras['municipio'];
                          // contar cuantos traslados hay por municipio
                          $trasmunicipio = "SELECT COUNT(*) AS tmun FROM react_destinos_traslados
                          INNER JOIN react_traslados ON react_destinos_traslados.id_traslado = react_traslados.id
                          INNER JOIN react_sujetos_traslado ON react_destinos_traslados.id = react_sujetos_traslado.id_destino
                          WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin' AND municipio = '$namemunicipio'";
                          $rtrasmunicipio = $mysqli ->query($trasmunicipio);
                          $ftrasmunicipio = $rtrasmunicipio ->fetch_assoc();
                          ?>
                          <tr>
                            <td><?php echo $fmunicipiotras['municipio']; ?></td>
                            <td><?php echo $ftrasmunicipio['tmun']; ?></td>
                          </tr>
                          <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <?php
                    // suma de KILOMETROS RECORRIDOS en un lapdo de tiempo de busqueda
                    $totalkil = "SELECT SUM(kilometros) AS total_kil FROM react_traslados
                                 WHERE fecha BETWEEN '$fechainicial' AND '$fechafin'";
                    $rtotalkil = $mysqli -> query ($totalkil);
                    $ftotalkil = $rtotalkil ->fetch_assoc();
                    ?>
                    <table class="table table-striped table-bordered" cellspacing="0" >
                        <thead>
                            <tr>
                                <th class="table-header" style="text-align:center">KILOMETROS RECORRIDOS</th>
                                <th class="table-header" style="text-align:center"><?php echo $ftotalkil['total_kil']; ?></th>
                            </tr>
                        </thead>
                    </table>
                    <?php
                    // contabilizar solo sujetos del traslado
                    $totalcol1vsuj = "SELECT COUNT(DISTINCT react_sujetos_traslado.id_sujeto) AS tcol1sin FROM react_sujetos_traslado
                    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                    WHERE react_sujetos_traslado.resguardado = 'NO'
                    AND datospersonales.estatus = 'SUJETO PROTEGIDO'
                    AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                    $rtotalcol1vsuj = $mysqli->query($totalcol1vsuj);
                    $ftotalcol1vsuj = $rtotalcol1vsuj->fetch_assoc();
                    //
                    $totalcol2vsuj = "SELECT COUNT(DISTINCT react_sujetos_traslado.id_sujeto) AS tcol1con FROM react_sujetos_traslado
                    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                    WHERE react_sujetos_traslado.resguardado = 'SI'
                    AND datospersonales.estatus = 'SUJETO PROTEGIDO'
                    AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                    $rtotalcol2vsuj = $mysqli->query($totalcol2vsuj);
                    $ftotalcol2vsuj = $rtotalcol2vsuj->fetch_assoc();
                    //
                    $totalcol3vsuj = "SELECT COUNT(DISTINCT react_sujetos_traslado.id_sujeto) AS tcol1sinpp FROM react_sujetos_traslado
                    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                    WHERE react_sujetos_traslado.resguardado = 'NO'
                    AND datospersonales.estatus = 'PERSONA PROPUESTA'
                    AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                    $rtotalcol3vsuj = $mysqli->query($totalcol3vsuj);
                    $ftotalcol3vsuj = $rtotalcol3vsuj->fetch_assoc();
                    //
                    $totalcol4vsuj = "SELECT COUNT(DISTINCT react_sujetos_traslado.id_sujeto) AS tcol1conpp FROM react_sujetos_traslado
                    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                    WHERE react_sujetos_traslado.resguardado = 'SI'
                    AND datospersonales.estatus = 'PERSONA PROPUESTA'
                    AND react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                    $rtotalcol4vsuj = $mysqli->query($totalcol4vsuj);
                    $ftotalcol4vsuj = $rtotalcol4vsuj->fetch_assoc();
                    //
                    $totalcol5vsuj = "SELECT COUNT(DISTINCT react_sujetos_traslado.id_sujeto) AS totalfinal FROM react_sujetos_traslado
                    INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                    INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                    INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                    WHERE react_traslados.fecha BETWEEN '$fechainicial' AND '$fechafin'";
                    $rtotalcol5vsuj = $mysqli->query($totalcol5vsuj);
                    $ftotalcol5vsuj = $rtotalcol5vsuj->fetch_assoc();
                    //
                    ?>
                    <table style="width:60%" class="table table-striped table-bordered" cellspacing="0" >
                        <thead>
                          <tr>
                            <th class="table-header" style="text-align:center" colspan="6">PERSONAS</th>
                          </tr>
                          <tr>
                              <th class="table-header" style="text-align:center" rowspan="2">TOTAL DE PP Y SP QUE FUERON TRASLADADOS</th>
                              <th class="table-header" style="text-align:center" colspan="2">SUJETOS PROTEGIDOS</th>
                              <th class="table-header" style="text-align:center" colspan="2">PERSONAS PROPUESTAS</th>
                              <th class="table-header" style="text-align:center" rowspan="2">TOTAL</th>
                          </tr>
                          <tr>
                              <th class="table-header" style="text-align:center">SIN ESTADÍA</th>
                              <th class="table-header" style="text-align:center">CON ESTADÍA</th>
                              <th class="table-header" style="text-align:center">SIN ESTADÍA</th>
                              <th class="table-header" style="text-align:center">CON ESTADÍA</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tbody>
                            <tr>
                              <td>TOTAL DE PERSONAS</td>
                              <td><?php echo $ftotalcol1vsuj['tcol1sin']; ?></td>
                              <td><?php echo $ftotalcol2vsuj['tcol1con']; ?></td>
                              <td><?php echo $ftotalcol3vsuj['tcol1sinpp']; ?></td>
                              <td><?php echo $ftotalcol4vsuj['tcol1conpp']; ?></td>
                              <td><?php echo $ftotalcol5vsuj['totalfinal']; ?></td>
                            </tr>
                          </tbody>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <br><br>
              <?php
            }else {
              ?>

              <div class="alert alert-warning" role="alert">
                <h1 style="text-align:center">no existen registros</h1>
              </div>
              <?php
              $mostrar =0;
            }
            }
            ?>
      </div>
      <?php
      if ($mostrar === 1) {
      ?>
      <div id="showbotonpdf">
        <form class="" action="generar_pdf.php" method="POST">
          <input type="text" name="diainicio" value="<?php echo $fechainicial; ?>" style="display:none;">
          <input type="text" name="diafin" value="<?php echo $fechafin; ?>" style="display:none;">
          <button class="btn-flotante-imprimir-asistencia" type="submit" onclick="verdato()"><img src='../../image/pdf.png' width='60' height='60'></button>
          <!-- <a class="btn-flotante-imprimir-asistencia" style="text-align:center;"><img src='../../image/asistencias_medicas/print.png' width='60' height='60'></a> -->
        </form>
      </div>
      <?php
      }
      ?>
    </div>
  </div>
  <div class="contenedor">
      <a href="../admin.php" class="btn-flotante">REGRESAR</a>
  </div>
  <script type="text/javascript">
    function verdato(){
      // console.log('prueba dato');
      document.getElementById("showafterconsul").style.display = "none";
      document.getElementById("showbotonpdf").style.display = "none";
    }
  </script>
</body>
</html>
