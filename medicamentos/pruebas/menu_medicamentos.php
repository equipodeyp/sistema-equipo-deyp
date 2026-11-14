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
// $f_exped = 'UPSIPPED/TOL/113/015/2022';
// echo $f_exped;


$sentencia2=" SELECT nombre, amaterno, apaterno FROM usuarios_servidorespublicos WHERE usuario ='$user'";
$rnombre = $mysqli->query($sentencia2);
$fnombre=$rnombre->fetch_assoc();
$name_serv = $fnombre['nombre'];
$ap_serv = $fnombre['apaterno'];
$am_serv = $fnombre['amaterno'];



$name_user = $name_serv;
$name_user = strtoupper($name_user);
$names = $name_user;
$one_name = explode(" ", $names); 
$primer_nombre = $one_name[0];

// echo $primer_nombre;

$a_paterno = $ap_serv;
$a_paterno = strtoupper($a_paterno);
$ap_string = $a_paterno;
$inicial_ap = $ap_string[0];
// echo $inicial_ap;

$a_materno = $am_serv;
$a_materno = strtoupper($a_materno);
$am_string = $a_materno;
$inicial_am = $am_string[0];
// echo $inicial_am;



$id_servidor_ini = $primer_nombre.$inicial_ap.$inicial_am;
// echo $id_servidor_ini;


?>

<!DOCTYPE html>
<html lang="es">
<head>

  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UPSIPPED</title>
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../css/breadcrumb.css">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/expediente.css">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/expediente.js"></script>
  <script src="../js/solicitud.js"></script>
  <script src="../js/Javascript.js"></script>
  <!-- <script src="../js/validar_campos.js"></script> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/cli.css">



<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="../css/main2.css">


<link rel="stylesheet" href="style_med.css">


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

  			if ($genero=='mujer') {
  				echo "<img src='../image/mujerup.png' width='100' height='100'>";
  			}

  			if ($genero=='hombre') {
  				// $foto = ../image/user.png;
  				echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
  			}
  			// echo $genero;
  			?>
        <h6 style="text-align:center" class='user-nombre' >  <?php echo "" . $_SESSION['usuario']; ?> </h6>
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


      <!-- menu del expediente -->
      <div class="wrap">



        <div class="secciones">
          <!-- <article id="tab1"> -->

            <!-- menu de navegacion de la parte de arriba -->
          <!-- <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="./menu_asistencias_medicas.php">MENÚ ASISTENCIAS MÉDICAS</a>
            <a class="actived" href="./solicitar_asistencia.php">SOLICITAR ASISTENCIA MÉDICA</a>
          </div>
           -->


          
          <!-- </article> -->






              <div class="menu-grid">

              
                  <?php

                  $botones = [
                      ['texto' => 'Solicitar', 'imagen' => '../image/gestion_medicamentos/solicitar.png', 'accion' => 'solicitar.php'],
                      ['texto' => 'Registrar', 'imagen' => '../image/gestion_medicamentos/alta.png', 'accion' => 'alta.php'],
                      ['texto' => 'Entrada', 'imagen' => '../image/gestion_medicamentos/entrada.png', 'accion' => 'entrada.php'],
                      ['texto' => 'Salida', 'imagen' => '../image/gestion_medicamentos/salida.jpg', 'accion' => 'salida.php'],
                      ['texto' => 'Consultar', 'imagen' => '../image/gestion_medicamentos/consultar.png', 'accion' => 'consultar.php'],
                      ['texto' => 'Inventario', 'imagen' => '../image/gestion_medicamentos/inventario.png', 'accion' => 'inventario.php'],
                      ['texto' => 'Baja de inventario', 'imagen' => '../image/gestion_medicamentos/baja.jpg', 'accion' => 'baja.php']
                  ];

                  foreach ($botones as $boton) {
                      echo '<button class="menu-item" data-url="' . $boton['accion'] . '">';
                      echo '    <img src="' . $boton['imagen'] . '" alt="' . $boton['texto'] . '">';
                      echo '    <span>' . $boton['texto'] . '</span>';
                      echo '</button>';
                  }
                  ?>


              </div>






        </div>
      </div>
    </div>
  </div>

  <div class="contenedor">
    <a href="menu_asistencias_medicas.php" class="btn-flotante color-btn-success-gray">REGRESAR</a>
  </div>
  <div class="contenedor">
    <!-- <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a> -->
  </div>




<script type="text/javascript">

document.addEventListener('DOMContentLoaded', () => {
    const botones = document.querySelectorAll('.menu-item');

    botones.forEach(boton => {
        boton.addEventListener('click', () => {
            const urlDestino = boton.getAttribute('data-url');
            
            if (urlDestino) {
                // Redirige a la página correspondiente
                window.location.href = urlDestino;
            } else {
                console.error('No se definió una ruta para este botón.');
            }
        });
    });
});

</script>



  
</body>
</html>
