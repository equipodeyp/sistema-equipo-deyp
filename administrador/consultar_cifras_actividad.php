<?php
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set("America/Mexico_City");
/*require 'conexion.php';*/
include("./conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$check_actividad = 1;
$_SESSION["check_actividad"] = $check_actividad;

// echo $name;

$sentencia="SELECT usuarios.cargo, usuarios.usuario, usuarios_servidorespublicos.estatus, usuarios.nombre

FROM usuarios

JOIN usuarios_servidorespublicos
ON usuarios.id = usuarios_servidorespublicos.id_usuarioprincipal
AND usuarios_servidorespublicos.estatus = 'activo'
AND usuarios.usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$cargo = $row['cargo'];
$estatus=$row['estatus'];
$id_usuario=$row['usuario'];
// echo $id_usuario;
// echo $cargo;
// echo $estatus;
// $today = date("Y-m-d H:i:s"); 
// echo $today;



?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>CONSULTAR CIFRAS CONVENIO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/funciones_react.js"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/main2.css">
  <link rel="stylesheet" href="../css/expediente.css">
  <!-- font-awesome -->
  <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css" rel="stylesheet">
  <!-- estilos de diseño add traslados -->
  <link rel="stylesheet" href="./css/react_add_traslados.css">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link href="assets/css/material.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/home.css">
  <link rel="stylesheet" href="./assets/css/loader.css">
  <script src="./js/funciones_react.js"></script>


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
          echo "<img style='text-align:center;' src='../image/mujerup.png' width='100' height='100'>";
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
              <li>
                  <a href="#" onclick="toggleSubmenu(this)">
                      <i class="color-icon fa-solid fa-book-atlas menu-nav--icon"></i>
                      <span class="menu-items" style="color: white; font-size: 15px; font-weight:bold;">REACT</span>
                      <i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i>
                  </a>
                  <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                      <li>
                          <a href="#" style="font-size: 15px; color:white; text-decoration:none;" onclick="location.href='./registrar_actividad.php'">
                              <i class="fas fa-file-medical"></i> REGISTRAR ACTIVIDAD
                          </a>
                      </li>
                      <li>
                          <a href="#" style="font-size: 15px; color:white; text-decoration:none;" onclick="location.href='./buscar_actividad.php'">
                              <i class="fas fa-laptop-file"></i> BUSCAR ACTIVIDAD
                          </a>
                      </li>
                      <!-- <li>
                          <a href="#" style="font-size: 15px; color:white; text-decoration:none;" onclick="location.href='./consultar_cifras_actividad.php'">
                              <i class="fas fa-search"></i> CONSULTAR CIFRAS
                          </a>
                      </li> -->
                  </ul>
              </li>
          </ul>
        
        <br><br>
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
          <!-- <h1 style="text-align:center">
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
          </h1> -->
          <!-- <h4 style="text-align:center">
            <?php echo utf8_decode(strtoupper($row['area'])); ?> </span>
          </h4> -->
        </div>
      </div>
      <div class="">
        <br>
        <br>
        <br>
        <h1 style="text-align:center">CONSULTAR CIFRAS</h1>
<center>
  <div style="text-align:center;padding:15px;border:solid 5px; width:80%;border-radius:35px;shadow" class="well form-horizontal">

    <form action="generar_reporte_pdf.php" method="post" accept-charset="utf-8" id="form_consultar_cifras" autocomplete="off">


    <div class="form-group">
        <h4 class="col-md-3 control-label">TIPO DE CONSULTA:</h4>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <select class="form-control" name="tipo_consulta" id="tipo_consulta" required>

              <?php 
              if ($cargo != '' || $id_usuario === 'analisis7'){
              // echo 'subdirector';
              echo '<option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="GLOBAL">GLOBAL</option>
                    <option value="POR USUARIO">POR USUARIO</option>';
              }else{
              // echo 'adminidtrativo';
              echo '<option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                    <option value="POR USUARIO">POR USUARIO</option>';
              }
              ?>

            </select>

          </div>
        </div>
      </div>

      

      <div class="form-group" id="div_usuario" style="display:none;">
        <h4 class="col-md-3 control-label">USUARIO:</h4>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <!-- <span class="input-group-addon"><i class="fa-solid fa-user"></i></span> -->
            <select class="form-control" name="usuario" id="usuario">
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>

                <?php
                if ($cargo != '' && $estatus === 'activo' || $id_usuario === 'analisis7' && $estatus === 'activo'){
                    $select = "SELECT DISTINCT usuarios_servidorespublicos.nombre, 
                    usuarios_servidorespublicos.apaterno, usuarios_servidorespublicos.amaterno, 
                    react_actividad.usuario
                    FROM react_actividad

                    JOIN usuarios_servidorespublicos
                    ON react_actividad.usuario = usuarios_servidorespublicos.usuario
                    AND react_actividad.id_subdireccion = '1'
                    ORDER BY usuarios_servidorespublicos.nombre ASC";
                    $answer = $mysqli->query($select);
                    while($valores = $answer->fetch_assoc()){
                    // $id_actividad = $valores['idactividad'];
                    // echo $id_actividad;
                    echo "<option value='".$valores['usuario']."'>".strtoupper($valores['nombre'].' '.$valores['amaterno'].' '.$valores['apaterno'])."</option>";
                    }
                }else
                {
                    $select = "SELECT DISTINCT usuarios_servidorespublicos.nombre, 
                    usuarios_servidorespublicos.apaterno, 
                    usuarios_servidorespublicos.amaterno, react_actividad.usuario
                    FROM react_actividad

                    JOIN usuarios_servidorespublicos
                    ON react_actividad.usuario = usuarios_servidorespublicos.usuario
                    AND react_actividad.id_subdireccion = '1'
                    AND react_actividad.usuario = '$name'
                    ORDER BY usuarios_servidorespublicos.nombre ASC";
                    $answer = $mysqli->query($select);
                    while($valores = $answer->fetch_assoc()){
                    // $id_actividad = $valores['idactividad'];
                    // echo $id_actividad;
                    echo "<option value='".$valores['usuario']."'>".strtoupper($valores['nombre'].' '.$valores['amaterno'].' '.$valores['apaterno'])."</option>";
                    }
                }
                ?>

            </select>
          </div>
        </div>
      </div>


      <div class="form-group" id="div_actividad" style="display:none;">
        <h4 class="col-md-3 control-label">ACTIVIDAD:</h4>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <!-- <span class="input-group-addon"><i class="fa-solid fa-list-check"></i></span> -->
            <select class="form-control" name="nombre_actividad" id="nombre_actividad">
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
              <option value="Todas">Todas</option>
                <?php
                    $select = "SELECT * FROM react_actividad_analisis ORDER BY react_actividad_analisis.nombre ASC";
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
        <h4 class="col-md-3 control-label">FECHA INICIO:</h4>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <!-- <span class="input-group-addon"><i class="fa-regular fa-calendar"></i></span> -->
            <input name="fecha_inicio" id="fecha_inicio" class="form-control" type="date" required>
          </div>
        </div>
      </div>


      <div class="form-group">
        <h4 class="col-md-3 control-label">FECHA TERMINO:</h4>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <!-- <span class="input-group-addon"><i class="fa-regular fa-calendar"></i></span> -->
            <input name="fecha_fin" id="fecha_fin" class="form-control" type="date" required>
          </div>
        </div>
      </div>

      <input name="input_tipo_consulta" id="input_tipo_consulta" class="form-control" type="text" value style="display:none;">
      <input name="input_usuario" id="input_usuario" class="form-control" type="text" value style="display:none;">
      <input name="input_nombre_actividad" id="input_nombre_actividad" class="form-control" type="text" value style="display:none;">


      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-5">
          <!-- <button type="submit" name="submit" value="search" id="btn_search" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> CONSULTAR </button> -->
          <!-- <button id="btn_Limpiar" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span> LIMPIAR </button> -->
          <br>
          <br>
          <span class="btn btn-info" id="btn_search">Consultar</span>
          <button id= "descargar" style="display:none;" type="submit" class="btn btn-success">Generar Reporte</button>

        </div>
      </div>

    </form>

      <div class="col-md-12 text-center mt-5">     
        <span id="loaderFiltro">  </span>
      </div>


      <div class="table-responsive resultadoFiltro">
              <table class="table table-hover" id="tablaReact">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ACTIVIDAD</th>
                    <th scope="col">CLASIFICACIÓN</th>
                    <th scope="col">UNIDAD DE MEDIDA</th>
                    <th scope="col">CANTIDAD</th>
                    <th scope="col">FECHA</th>
                  </tr>
                </thead>
              <?php
              include('./config.php');
              $sqlReact = ("SELECT react_actividad_analisis.nombre, react_actividad.clasificacion, react_actividad.unidad_medida, 
                                  react_actividad.cantidad, react_actividad.fecha, react_subdireccion.subdireccion, react_actividad.usuario 
                                  FROM react_actividad 
                                  JOIN react_actividad_analisis 
                                  ON react_actividad.id_actividad = react_actividad_analisis.id
                                  AND react_actividad.usuario = '$name' 
                                  JOIN react_subdireccion 
                                  ON react_actividad.id_subdireccion = react_subdireccion.id
                                  AND react_subdireccion.subdireccion = 'SUBDIRECCIÓN DE ANÁLISIS DE RIESGO' 
                                  ORDER BY react_actividad_analisis.nombre ASC");
              $query = mysqli_query($con, $sqlReact);
              $i =1;
                while ($dataRow = mysqli_fetch_array($query)) { ?>
                <tbody>
                  <tr>
                    <td ><?php echo $i++; ?></td>
                    <td style="text-align: left;"><?php echo $dataRow['nombre'] ; ?></td>
                    <td><?php echo $dataRow['clasificacion'] ; ?></td>
                    <td><?php echo $dataRow['unidad_medida'] ; ?></td>
                    <td><?php echo $dataRow['cantidad'] ; ?></td>
                    <td><?php echo $dataRow['fecha'] ; ?></td>
                </tr>
                </tbody>
              <?php } ?>
              </table>
            </div>


  

  </div>
</center>



      </div>
    </div>
  </div>
  <div class="contenedor">
      <a href="./menu.php" class="btn-flotante">INICIO</a>
  </div>


<script>

// Obtén el formulario por su ID
var miFormulario = document.getElementById("form_consultar_cifras");

// Añade un listener para el evento 'popstate'
window.addEventListener('popstate', () => {
  // Limpia el formulario
  miFormulario.reset();
});

// También puedes limpiar el formulario cuando se carga la página por primera vez
window.addEventListener('load', () => {
  miFormulario.reset();
});
</script>


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

<script type="text/javascript">

  var fecha_inicio = document.getElementById('tipo_consulta');
  var fecha_ini;
  var fecha_inicio_obtenida;

  fecha_inicio.addEventListener('change', obtenerFecha);

  function obtenerFecha(e){

    fecha_ini = e.target.value;
    fecha_inicio_obtenida = fecha_ini;


    // console.log(fecha_inicio_obtenida);
  
    document.getElementById('input_tipo_consulta').value = fecha_inicio_obtenida;
  
  }
</script>


<script type="text/javascript">

  var usuario = document.getElementById('usuario');
  var user;
  var usuario_obtenido;

  usuario.addEventListener('change', obtenerFecha);

  function obtenerFecha(e){

    user = e.target.value;
    usuario_obtenido = user;


    // console.log(usuario_obtenido);
    document.getElementById('input_usuario').value = usuario_obtenido;
  

  
  }
</script>


<script type="text/javascript">

  var actividad = document.getElementById('nombre_actividad');
  var act;
  var actividad_obtenida;

  actividad.addEventListener('change', obtenerFecha);

  function obtenerFecha(e){

    act = e.target.value;
    actividad_obtenida = act;


    // console.log(actividad_obtenida);
    document.getElementById('input_nombre_actividad').value = actividad_obtenida;
    
  

  
  }
</script>



<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="assets/js/material.min.js"></script>
  <script>
  $(function() {
      setTimeout(function(){
        $('body').addClass('loaded');
      }, 1000);


//FILTRANDO REGISTROS
$("#btn_search").on("click", function(e){ 
  e.preventDefault();
  
  loaderF(true);

  var f_inicio = $('input[name=fecha_inicio]').val();
  var f_fin = $('input[name=fecha_fin]').val();

  var tipo_consulta = $('input[name=input_tipo_consulta]').val();
  var usuario = $('input[name=input_usuario]').val();
  var actividad = $('input[name=input_nombre_actividad]').val();

  // console.log(f_inicio + '' + f_fin);

  if(tipo_consulta !="" && f_inicio !="" && f_fin !="" || tipo_consulta !="" && usuario !="" && actividad !="" && f_inicio !="" && f_fin !=""){
    $.post("filtro.php", {f_inicio, f_fin, tipo_consulta, usuario, actividad}, function (data) {
      $("#tablaReact").hide();
      $(".resultadoFiltro").html(data);
      document.getElementById("descargar").style.display = ""; // MOSTRAR
      loaderF(false);
    });  
  }else{
    $("#loaderFiltro").html('<p style="color:red; font-weight:bold;"> Debe llenar todos los campos</p>');
  }
} );


function loaderF(statusLoader){
    // console.log(statusLoader);
    if(statusLoader){
      $("#loaderFiltro").show();
      $("#loaderFiltro").html('<img class="img-fluid" src="assets/img/cargando.svg" style="left:50%; right: 50%; width:50px;">');
    }else{
      $("#loaderFiltro").hide();
    }
  }
});
</script>

</body>
</html>
</body>
</html>
