<?php
error_reporting(0);
// header("Content-Type: text/html;charset=utf-8");
// date_default_timezone_set("America/Mexico_City");
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
// TRAER EL UMTIMO REGISTRO DE UN TRASLADO
date_default_timezone_set('America/Mexico_City');
$a = date("Y");
$sql="select * from react_traslados where id in (select MAX(id) from react_traslados)";
$result = $mysqli->query($sql);
$mostrar=$result->fetch_assoc();
// echo $mostrar['num_consecutivo'];;
 $yearactual = $mostrar['year'];
 $id_traslado =$mostrar["id"];
 if ($a == $yearactual){
   $n=$mostrar['num_consecutivo'];
   $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
   $n_con;
 } else {
   $num_consecutivo = 0;
   $n=$num_consecutivo;
   $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
 }
 $idtrasladounico = $n_con.'-'.$a;
 ///////////////////////////////////////////////////////////////////////////////
 include("../../calculodefechas/calculardiasminimospararegistro.php");
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
                  <!-- <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='./add_traslado.php'">
                    <i class="fas fa-file-medical"></i> REGISTRAR</a>
                  </li> -->
                  <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='./consulta_traslados.php'">
                    <i class="fas fa-laptop-file"></i> BUSCAR</a>
                  </li>
                  <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='./search_traslado.php'">
                    <i class="fas fa-search"></i> CONSULTAR CIFRAS</a>
                  </li>
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
      <b>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php
include("formulario.php");
?>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      </b>
    </div>
  </div>
  <div class="contenedor">
      <a href="../../consultores/admin.php" class="btn-flotante">REGRESAR</a>
  </div>
</body>
<link rel="stylesheet" href="../../css/traslados/estilos.css">
<script src="../../js/traslados/script.js"></script>
<script src="../../js/traslados/script_submenu.php.js"></script>
<script src="../../js/traslados/script_pdi.js"></script>
<script src="../../js/traslados/script_asistencia_medica.js"></script>
<script src="../../js/traslados/script_validador_botones.js"></script>
<script src="../../js/traslados/script_modal_resumen.js"></script>
<script src="../../js/traslados/script_modal_sujetos.js"></script>
<script src="../../js/traslados/script_loader_guardar.js"></script>
<script src="../../js/traslados/script_validador_base.js"></script>
<script src="../../js/traslados/script_validador_limites.js"></script>
<script src="../../js/traslados/script_destino_otro.js"></script>
<script src="../../js/traslados/script_tecnologias.js"></script>
<script src="../../js/traslados/script_administrativas.js"></script>
</html>
