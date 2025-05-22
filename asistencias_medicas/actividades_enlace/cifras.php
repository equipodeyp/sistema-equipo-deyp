<?php

/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica = 1;
$_SESSION["verifica"] = $verifica;
$name = $_SESSION['usuario'];

$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$user = $row['usuario'];

$m_user = $user;
$m_user = strtoupper($m_user);

// echo $m_user; 
// echo $user;

$tipo_consulta = $_POST["tipo_consulta"];
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_fin = $_POST["fecha_fin"];


if ($tipo_consulta === 'GLOBAL'){
echo $tipo_consulta;
echo $fecha_inicio;
echo $fecha_fin;
} 
else{
    $usuario = $_POST["usuario"];
    $actividad = $_POST["nombre_actividad"];
echo $tipo_consulta;
echo $usuario;
echo $actividad;
echo $fecha_inicio;
echo $fecha_fin;
}




?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/instrumento_adaptabilidad.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <link href="../../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../../js/jquery.dataTables.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../css/breadcrumb.css">
  <link rel="stylesheet" href="../../css/expediente.css">
  <link rel="stylesheet" href="../../css/font-awesome.css">
  <link rel="stylesheet" href="../../css/cli.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../../js/expediente.js"></script>
  <script src="../../js/solicitud.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/cli.css">
  <link rel="stylesheet" href="../../css/registrosolicitud1.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="../../css/main2.css">
</head>
<body >

<div class="contenedor">
    <div class="sidebar ancho">
        <div class="logo text-warning">
        </div>
        <div class="user">
        <?php
                $sentencia_user=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
                $result_user = $mysqli->query($sentencia_user);
                $row_user=$result_user->fetch_assoc();
                $genero = $row_user['sexo'];
        $user = $row_user['usuario'];
        $nombre_ser = $row['nombre'];
        $apellido_p = $row['apellido_p'];
        $apellido_m = $row['apellido_m'];
        $name_user = $nombre_ser." " .$apellido_p." " .$apellido_m;
        $full_name = mb_strtoupper (html_entity_decode($name_user, ENT_QUOTES | ENT_HTML401, "UTF-8"));



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
        <!-- menu de navegacion de la parte de arriba -->

    <div class="wrap">
        <div class="secciones">
            <article id="tab2">


            
        <div class="container">
            <div class="well form-horizontal">
                <form id="form" class="container well form-horizontal" action="save_instrumento.php?folio=<?php echo $fol_exp; ?>" method="POST" enctype="multipart/form-data">

                <div class="">
                    <img style="float: left;" src="../../image/FGJEM.png" width="50" height="50">
                    <img style="float: right;" src="../../image/ESCUDO.png" width="60" height="50">
                    <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
                </div>



                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="contenedor">
                        <a href="./consultar_cifras_actividad.php" class="btn-flotante-regresar color-btn-success-gray">REGRESAR</a>
                        </div>

                        <div class="contenedor">
                        <a class="btn-flotante-imprimir-asistencia" style="text-align:center;" href="javascript:imprimirSeleccion('form')"><img src='../../image/asistencias_medicas/print.png' width='60' height='60'></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        </div>
    </div>

    </div>




</div>

<script language="Javascript">
function imprimirSeleccion(nombre) {
var ficha = document.getElementById(nombre);
var ventimp = window.open(' ', 'popimpr');
ventimp.document.write( ficha.innerHTML );
ventimp.document.close();
ventimp.print( );
ventimp.close();
}
</script>


</body>
</html>







