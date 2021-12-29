<?php
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
//Comprobamos si esta definida la sesión 'tiempo'.
// if(isset($_SESSION['tiempo']) ) {
//
//     //Tiempo en segundos para dar vida a la sesión.
//     $inactivo = 100;//20min en este caso.
//
//     //Calculamos tiempo de vida inactivo.
//     $vida_session = time() - $_SESSION['tiempo'];
//
//         //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
//         if($vida_session > $inactivo)
//         {
//             //Removemos sesión.
//             session_unset();
//             //Destruimos sesión.
//             session_destroy();
//             //Redirigimos pagina.
//             header("Location: ../logout.php");
//
//             exit();
//         }
//
// }
// $_SESSION['tiempo'] = time();
//     // El siguiente key se crea cuando se inicia sesión

$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="../css/cli.css">
<script>
  $(document).ready(function(){
    $('#mitabla').DataTable({
      "order": [[1, "asc"]],
      "language":{
      "lengthMenu": "Mostrar _MENU_ registros por pagina",
      "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      },
      "bProcessing": true,
      "bServerSide": true,
      "sAjaxSource": "server_process.php"
    });
  });
</script>
</head>
<body onload="nobackbutton();">
  <div class="contenedor">
    <div class="sidebar ancho">
      <div class="logo text-warning">
      </div>
      <div class="user">
        <img src="../image/mujer.png" alt="" width="100" height="100">
        <span class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </span>
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
            <?php   echo utf8_decode(strtoupper($row['nombre'])); ?> </span>
            <?php echo utf8_decode(strtoupper($row['apellido_p'])); ?> </span>
            <?php echo utf8_decode(strtoupper($row['apellido_m'])); ?> </span>
          </h1>
          <h2 style="text-align:center">
            <?php echo utf8_decode(strtoupper($row['area'])); ?> </span>
          </h2>
        </div>
        <div class="row">
          <a href="crear_expediente.php" class="btn btn-primary">Nuevo Expediente</a>
        </div>
        <br>
        <div class="row table-responsive">
          <table class="display" id="mitabla">
            <thead>
              <tr>
                <th>ID</th>
                <th>UNIDAD</th>
                <th>SEDE</th>
                <th>MUNICIPIO</th>
                <th>FECHA</th>
                <th>FOLIO EXPEDIENTE</th>
                <th>DETALLES</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="contenedor">
    <a href="../logout.php" class="btn-flotante">Cerrar Sesión</a>
  </div>
</body>
</html>
