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
$check_actividad = 1;
$_SESSION["check_actividad"] = $check_actividad;
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
        <h3 style="text-align:center">CONSULTAR CIFRAS</h3>
        <center>
  <div style="text-align:center;padding:15px;border:solid 5px; width:70%;border-radius:35px;shadow" class="well form-horizontal">

    <form  id="form_consultar" method="POST" action="./cifras.php" enctype= "multipart/form-data">


    <div class="form-group">
        <label class="col-md-3 control-label">TIPO DE CONSULTA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-table-list"></i></span>
            <select class="form-control" name="tipo_consulta" id="tipo_consulta" required>
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
              <option value="GLOBAL">GLOBAL</option>
              <option value="POR USUARIO">POR USUARIO</option>
            </select>
          </div>
        </div>
      </div>


      <div class="form-group" id="div_usuario" style="display:none;">
        <label class="col-md-3 control-label">USUARIO</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-user"></i></span>
            <select class="form-control" name="usuario" id="usuario">
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <?php
                    $select = "SELECT * 
                    FROM usuarios_servidorespublicos 
                    WHERE subdireccion = 'Subdirección de enlace interinstitucional'";
                    $answer = $mysqli->query($select);
                    while($valores = $answer->fetch_assoc()){
                    // $id_actividad = $valores['idactividad'];
                    // echo $id_actividad;
                    echo "<option value='".$valores['usuario']."'>".$valores['usuario']."</option>";
                    }


                ?>
            </select>
          </div>
        </div>
      </div>


      <div class="form-group" id="div_actividad" style="display:none;">
        <label class="col-md-3 control-label">ACTIVIDAD</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-list-check"></i></span>
            <select class="form-control" name="nombre_actividad" id="nombre_actividad">
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
              <option value="Todas">Todas</option>
                <?php
                    $select = "SELECT * FROM react_actividad_enlace";
                    $answer = $mysqli->query($select);
                    while($valores = $answer->fetch_assoc()){
                    // $id_actividad = $valores['idactividad'];
                    // echo $id_actividad;
                    echo "<option value='".$valores['id']."'>".$valores['nombre']."</option>";
                    }


                ?>
            </select>
          </div>
        </div>
      </div>


      <div class="form-group">
        <label class="col-md-3 control-label">FECHA INICIO</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar"></i></span>
            <input name="fecha_inicio" id="fecha_inicio" class="form-control" type="date" required>
          </div>
        </div>
      </div>


      <div class="form-group">
        <label class="col-md-3 control-label">FECHA TERMINO</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar"></i></span>
            <input name="fecha_fin" id="fecha_fin" class="form-control" type="date" required>
          </div>
        </div>
      </div>




      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-5">
          <button type="submit" name="submit" value="search" id="btn_search" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> CONSULTAR </button>
          <!-- <button id="btn_Limpiar" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span> LIMPIAR </button> -->
        </div>
      </div>








  
    </form>
  </div>
</center>



      </div>
    </div>
  </div>
  <div class="contenedor">
      <a href="../admin.php" class="btn-flotante">REGRESAR</a>
  </div>


<!-- <script>
    $("#btn_Limpiar").click(function(event) {
      $("#tipo_consulta")[0].reset();
      $("#usuario")[0].reset();
      $("#nombre_actividad")[0].reset();
      $("#fecha_inicio")[0].reset();
      $("#fecha_fin")[0].reset();
    });
</script> -->


<script type="text/javascript">

  var tipo_actividad = document.getElementById('tipo_consulta');
  var numero_tipo_act;
  var tipo_actividad_obtenido;

  tipo_actividad.addEventListener('change', obtenerActividad);

  function obtenerActividad(e){

    numero_tipo_act = e.target.value;
    tipo_actividad_obtenido = numero_tipo_act;


  
    
    if (tipo_actividad_obtenido === 'POR USUARIO'){
      document.getElementById("div_usuario").style.display = ""; // MOSTRAR
      document.getElementById("div_actividad").style.display = ""; // MOSTRAR

      document.getElementById('usuario').value = ""; // LIMPIAR
      document.getElementById('nombre_actividad').value = ""; // LIMPIAR
      document.getElementById('fecha_inicio').value = ""; // LIMPIAR
      document.getElementById('fecha_fin').value = ""; // LIMPIAR

      document.getElementById("usuario").required = true;
      document.getElementById("nombre_actividad").required = true;
      
    } else{
      document.getElementById("div_usuario").style.display = "none"; // MOSTRAR
      document.getElementById("div_actividad").style.display = "none"; // MOSTRAR

      document.getElementById('usuario').value = ""; // LIMPIAR
      document.getElementById('nombre_actividad').value = ""; // LIMPIAR
      document.getElementById('fecha_inicio').value = ""; // LIMPIAR
      document.getElementById('fecha_fin').value = ""; // LIMPIAR

    }

  
  }
</script>

<!-- <script type="text/javascript">

  var fecha_inicio = document.getElementById('tipo_consulta');
  var fecha_ini;
  var fecha_inicio_obtenida;

  fecha_inicio.addEventListener('change', obtenerFecha);

  function obtenerFecha(e){

    fecha_ini = e.target.value;
    fecha_inicio_obtenida = fecha_ini;


    console.log(fecha_inicio_obtenida);
  

  
  }
</script> -->
</body>
</html>
