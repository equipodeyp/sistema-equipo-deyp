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
// TRAER EL UMTIMO REGISTRO DE UN TRASLADO
date_default_timezone_set('America/Mexico_City');
$a = date("Y");
$sql="select * from react_traslados where id in (select MAX(id) from react_traslados)";
$result = $mysqli->query($sql);
$mostrar=$result->fetch_assoc();
 $yearactual = $mostrar['year'];
 $id_traslado =$mostrar["id"];
 if ($a === $yearactual){
   $n=$id_traslado;
   $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
   $n_con;
 } else {
   $num_consecutivo = 0;
   $n=$num_consecutivo;
   $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
 }
 $idtrasladounico = $n_con.'-'.$a;
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
      <div class="">
        <h1 style="text-align:center">REGISTRAR TRASLADO</h1>
        <center>
  <div style="text-align:center;padding:15px;border:solid 5px; width:70%;border-radius:35px;shadow" class="well form-horizontal">
    <form method="POST" action="save_trasalado.php" enctype= "multipart/form-data">
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-3 control-label">ID TRASLADO</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="idtraslado" class="form-control" type="text" value="<?php echo $idtrasladounico; ?>" readonly>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">FECHA TRASLADO</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="fechatraslado" class="form-control" type="date" required>
          </div>
        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-3 control-label">LUGAR DE SALIDA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-earth-americas"></i></span>
            <input name="lugarsalida" placeholder="INGRESE LUGAR DE SALIDA" class="form-control" type="text" required>
          </div>
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-3 control-label">DOMICILIO SALIDA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-map-location-dot"></i></span>
            <input name="domiciliosalida" placeholder="INGRESE DOMICILIO DE SALIDA" class="form-control" type="text" required>
          </div>
        </div>
      </div>

      <!-- Text input-->

      <div class="form-group">
        <label class="col-md-3 control-label">MUNICIPIO SALIDA</label>
        <div class="col-md-7 selectContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
            <select name="municipiosalida" class="form-control selectpicker" required>
              <option disabled selected value>SELECCIONE UN MUNICIPIO</option>
              <option value="CIUDAD DE MEXICO">CIUDAD DE MEXICO</option>
              <?php
              $municipio = "SELECT * FROM municipios";
              $answermun = $mysqli->query($municipio);
              while($municipios = $answermun->fetch_assoc()){
               echo "<option value='".$municipios['nombre']."'>".$municipios['nombre']."</option>";
              }
              ?>
            </select>
          </div>
        </div>
      </div>

      <!-- Text input-->

      <div class="form-group">
        <label class="col-md-3 control-label">HORA DE SALIDA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-clock"></i></span>
            <input name="horasalida" class="form-control" type="time" required>
            <!-- <span class="clock-img"><i class="fa-regular fa-clock"></i></span> -->
          </div>
        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-3 control-label">HORA DE LLEGADA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-clock"></i></span>
            <input name="horallegada" class="form-control" type="time" required>
          </div>
        </div>
      </div>
      <!-- radio checks -->
      <div class="form-group">
        <label class="col-md-3 control-label">KILOMETROS RECORRIDOS</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-road"></i></span>
            <input id="kilometrosrecorridos" name="kilometrosrecorridos" placeholder="INGRESE KILOMETROS RECORRIDOS" class="form-control" type="text" required>
          </div>
        </div>
      </div>
      <!--  -->
      <div class="form-group">
        <label class="col-md-3 control-label" style="line-height: 110px;">OBSERVACIONES</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-road"></i></span>
            <textarea name="observaciones" rows="5" cols="65" required></textarea>
          </div>
        </div>
      </div>

      <h1>DESTINOS</h1>
      <!-- <span>______________________________________________________________________________________________</span> -->
      <div id="contenedor-personas">
        <div class="persona-form">
          <div class="row">
          <!-- <span>____________________________________________________________________________________________________________________________</span> -->
            <div class="col-md-3">
              <label class="col-md-3 control-label">LUGAR</label>
                <input name="lugardestino[]" placeholder="INGRESE LUGAR DE DESTINO" class="form-control" type="text" required>
            </div>

            <div class="col-md-3 mb-3">
              <label class="text-center col-md-3 control-label">DOMICILIO</label>
              <input name="domiciliodestino[]" placeholder="INGRESE DOMICILIO DE DE DESTINO" class="form-control" type="text" required>
            </div>

            <div class="col-md-3 mb-3">
              <label class="col-md-3 control-label">MUNICIPIO</label>
                <select name="municipiodestino[]" class="form-control selectpicker" required>
                  <option disabled selected value>SELECCIONE UN MUNICIPIO</option>
                  <option value="CIUDAD DE MEXICO">CIUDAD DE MEXICO</option>
                  <?php
                  $municipio = "SELECT * FROM municipios";
                  $answermun = $mysqli->query($municipio);
                  while($municipios = $answermun->fetch_assoc()){
                   echo "<option value='".$municipios['nombre']."'>".$municipios['nombre']."</option>";
                  }
                  ?>
                </select>
            </div>

            <div class="col-md-3 mb-3">
              <label class="col-md-3 control-label">MOTIVO</label>
                <select name="motivotraslado[]" class="form-control selectpicker" required>
                  <option disabled selected value>SELECCIONE UN MOTIVO</option>
                  <?php
                  $trasladomotivo = "SELECT * FROM react_traslados_instancias";
                  $rtrasladomotivo = $mysqli->query($trasladomotivo);
                  while($ftrasladomotivo = $rtrasladomotivo->fetch_assoc()){
                   echo "<option value='".$ftrasladomotivo['nombre']."'>".$ftrasladomotivo['nombre']."</option>";
                  }
                  ?>
                </select>
            </div>
            <!--  -->
          </div>
        </div>
      </div>
      <!-- <span>______________________________________________________________________________________________</span> -->
       <br>
      <div class="row">
        <div class="col-md-12 mb-3">
          <button type="button" id="agregar-persona" class="btn btn-primary">
            <i class="fa fa-plus"></i> AGREGAR DESTINO
          </button>
        </div>
      </div>
      <br>
      <script>
        $(document).ready(function(){
          var maxPersonas = 3;
          var contadorPersonas = 1;
          //Manejar cambio en select de expediente
          // Agregar nueva persona
          $('#agregar-persona').click(function(){
            if(contadorPersonas < maxPersonas){
              var clone = $('.persona-form').first().clone();
              clone.find('select').val('');
              clone.find('input').val('');
              // clone.find('select').val('');
              // Agregar botón eliminar al clon
              // clone.append('<span>______________________________________________________________________________________________</span>');
              clone.append('<br><div class="col-md-12 mb-3"><button type="button" class="btn btn-danger btn-eliminar"><i class="fa fa-trash"></i> Eliminar</button></div>');
              clone.append('<br>');
              $('#contenedor-personas').append(clone);
              contadorPersonas++;
              if(contadorPersonas >= maxPersonas){
                $('#agregar-persona').hide();
              }
            }
          });
          // Eliminar persona
          $(document).on('click', '.btn-eliminar', function(){
            $(this).closest('.persona-form').remove();
            contadorPersonas--;
            $('#agregar-persona').show();
          });
        });
      </script>

      <!-- Text area -->
      <br><br>
      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-5">
          <button type="submit" class="btn btn-success">SIGUIENTE <span class="glyphicon glyphicon-ok"></span></button>
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
</body>
</html>
