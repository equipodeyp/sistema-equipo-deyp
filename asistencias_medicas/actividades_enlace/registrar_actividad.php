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
// echo $name;
//Si la variable de sesión no existe,
//Se presume que la página aún no se ha actualizado.
// if(!isset($_SESSION['already_refreshed'])){
//   ////////////////////////////////////////////////////////////////////////////////

//   $fecha = date('y/m/d H:i:sa');
//   ////////////////////////////////////////////////////////////////////////////////
//   $saveiniciosession = "INSERT INTO inicios_sesion(usuario, area, fecha_entrada)
//                 VALUES ('$name', '$areauser', '$fecha')";
//   $res_saveiniciosession = $mysqli->query($saveiniciosession);
//   ////////////////////////////////////////////////////////////////////////////////
// //Establezca la variable de sesión para que no
// //actualice de nuevo.
//   $_SESSION['already_refreshed'] = true;
// }

  $sentenciar=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
  $resultr = $mysqli->query($sentenciar);
  $rowr=$resultr->fetch_assoc();
  $areauser = $rowr['area'];
  // echo $areauser;

  $subuser = "SELECT * FROM usuarios_servidorespublicos WHERE usuario= '$name'";
  $rsubuser = $mysqli->query($subuser);
  $fsubuser = $rsubuser -> fetch_assoc();
  $subdirecfcion_user = $fsubuser['subdireccion'];
  // echo $subdirecfcion_user;

if ($subdirecfcion_user === 'Subdirección de enlace interinstitucional'){
  $id_sub = "SEI-0";
  $c = 0;

  $consulta = "SELECT COUNT(*) as t FROM react_actividad WHERE id_subdireccion = '3'";

  $respuesta_consulta = $mysqli->query($consulta);
  $resultado_consulta = $respuesta_consulta->fetch_assoc();
  // echo $resultado_consulta['t'];

  $c = $c + 1;

  $id_actividad = $id_sub.$c;
  // echo $id_actividad;
}


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
        <h1 style="text-align:center">REGISTRAR ACTIVIDAD</h1>
        <center>
  <div style="text-align:center;padding:15px;border:solid 5px; width:70%;border-radius:35px;shadow" class="well form-horizontal">

    <form method="POST" action="./guardar_actividad.php" enctype= "multipart/form-data">


      <div class="form-group">
        <label class="col-md-3 control-label">ACTIVIDAD</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-list-check"></i></span>
            <!-- <input name="actividad" id="actividad" class="form-control" type="text" required> -->
            <select class="form-control" name="actividad" id="actividad" required>
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
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
        <label class="col-md-3 control-label">CANTIDAD</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-list-ol"></i></span>
            <input name="cantidad" id="cantidad" class="form-control" type="number" required>
          </div>
          <h6 style="text-align:justify; font-size: x-small;">
            * Es posible capturar más de dos actividades cuando estas comparten todos sus atributos; 
            en caso contrario, se debrá reportar actividad por actividad.
          </h6>
        </div>
      </div>
      


      <div class="form-group">
        <label class="col-md-3 control-label">FECHA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar"></i></span>
            <input name="fecha_actividad" id="fecha_actividad" class="form-control" type="date" required>
          </div>
        </div>
      </div>



      <div class="ocultar_div">
        <div class="form-group">
          <label class="col-md-3 control-label">ID CONSECUTIVO SUBDIRECCIÓN</label>
          <div class="col-md-7 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa-solid fa-list-check"></i></span>
              <input name="consecutivo_subdireccion" id="consecutivo_subdireccion" class="form-control" type="text" readonly>
            </div>
          </div>
        </div>
      </div>


      <div class="ocultar_div">
        <div class="form-group">
          <label class="col-md-3 control-label">ID ACTIVIDAD ASIGNADO</label>
          <div class="col-md-7 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa-solid fa-list-check"></i></span>
              <input name="id_actividad" id="id_actividad" class="form-control" type="text" value="" readonly>
            </div>
          </div>
        </div>
      </div>


      <div class="ocultar_div">
        <div class="form-group">
          <label class="col-md-3 control-label">ID SUBDIRECCIÓN</label>
          <div class="col-md-7 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa-solid fa-list-check"></i></span>
              <input name="subdireccion" id="subdireccion" class="form-control" type="text" readonly value="3">
            </div>
          </div>
        </div>
      </div>



      <div class="ocultar_div">
        <div class="form-group">
          <label class="col-md-3 control-label">FUNCIÓN</label>
          <div class="col-md-7 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa-solid fa-list-check"></i></span>
              <input name="funcion" id="funcion" class="form-control" type="text" readonly>
            </div>
          </div>
        </div>
      </div>



      <div class="form-group">
        <label class="col-md-3 control-label">OBSERVACIONES</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-comments"></i></span>
            <textarea class="form-control" type="text" required name="observaciones" id="observaciones" rows="5" cols="33" maxlength="1000" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
          </div>
        </div>
      </div>



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
