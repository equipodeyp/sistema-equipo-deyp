<?php
error_reporting(0);
include("conexion.php");
include("modelos/getinfomedidas.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="../js/jquery-3.1.1.min.js"></script>

  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
  <!-- <link href="../css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <link href="../css/bootstrap-theme.css" rel="stylesheet"> -->
  <!-- <script src="../js/bootstrap.min.js"></script> -->
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
  <!-- <link rel="stylesheet" href="../css/bootstrap538.css"> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script> -->
<!-- scripts para sujeto -->
<!-- <script src="../js/persona.js"></script> -->
<!-- <style media="screen">

</style> -->
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
          // $foto = ../image/user.png;
          echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
        }
        // echo $genero;
         ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">
        <ul>
          <li class="menu-items"><a  href='create_ticket.php?folio=<?php echo $rowfol['folioexpediente'];?>'><i style="color: #FFFFFF;" class="fa-solid fa-circle-exclamation menu-nav--icon"></i><strong style="color: white;">INCIDENCIA</strong></a></li>
          <li class='menu-items'><a href='sub_persona.php?folio=<?php echo $rowfol['folioexpediente'];?>'><i style="color: #FFFFFF;" class='fa-solid fa-folder-tree menu-nav--icon'></i><strong style='color: white;'>REPOSITORIO PERSONA</strong></a></li>
        </ul>
      </nav>
    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../image/ups2.png" alt="" width="1400" height="70">
          <img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
      </div>
      <br><br>
      <div class="container">
        <ul class="tabs">
          <li><a href="#" onclick="location.href='detalles_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="far fa-address-card"></span><span class="tab-text">DATOS PERSONALES</span></a></li>
          <li><a class="active"><span class="fas fa-book-open"></span><span class="tab-text">MEDIDAS</span></a></li>
          <li><a href="#" onclick="location.href='seguimiento_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-list"></span><span class="tab-text">SEGUIMIENTO PERSONA</span></a></li>
        </ul>
        <?php
        include('vista/detalle_exp_suj.php');
        include('vista/medidas.php')
        ?>
      </div>
    </div>
  </div>
  <div class="contenedor">
    <a href="detalles_expediente.php?folio=<?=$name_folio?>" class="btn-flotante">REGRESAR</a>
  </div>
</body>
<link rel="stylesheet" href="../css/menuactualizado.css">
<script src="../js/controller_medidas.js"></script>
<!-- <script src="../js/controller_pormedida.js" charset="utf-8"></script> -->
<!-- <script src="../js/addevaluacion_sujeto.js"></script> -->
</html>
