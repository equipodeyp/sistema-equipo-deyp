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
 $año_actual = date('Y');
 $mes_actual = date('m');
 $dias_mes_actual = date('t');
 // echo "<br>";
 $datemin = '2025-11-01';
 // echo "<br>";
 $datemax = $año_actual.'-'.$mes_actual.'-'.$dias_mes_actual;
 // echo "<br>";
 include("calculardiasminimospararegistro.php")
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
      <!-- Modal HTML -->
        <div id="myModal" class="modal fade" data-keyboard="false" data-backdrop="static" oncontextmenu="return false;">
            <div class="modal-dialog modal-lg" style="max-height:90%;  margin-top: 100px; margin-bottom:100px; width:60%">
              <!-- <div class="mi-div-color" style="background-color: blue; color: white; padding: 10px;">Este div tiene un color de fondo. -->
                <div class="modal-content" style="background-color: #63696D; color: white; padding: 10px;">
                    <div class="modal-header">
                        <h1 class="modal-title" style="text-align:center"><strong>Aviso:</strong></h1>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    </div>
                    <div class="modal-body">
                      <h3>A partir de esta fecha el Motivo de traslado denominado “Otro” se elimina de la lista,
                        por lo que los registros que se contemplan dentro de esa categoría se deberán ubicar dentro de una de las siguientes opciones:</h3>
                        <h3><strong>1. Diligencia Administrativa sin sujeto:</strong>
                          Son todas aquellas salidas que la PDI realiza para llevar a cabo diligencias relacionadas con los sujetos protegidos
                          pero que no involucra el traslado físico del sujeto protegido (recabar firma, entregar oficios, entre otros).</h3>
                      <h3><strong>2. Diligencia Administrativa con sujeto:</strong>
                        Son todas aquellas salidas en donde la PDI trasporta al sujeto protegido para que realice
                        actividades específicas (corte de cabello, trámites personales, entre otros).</h3>
                    </div>
                    <!-- <div class="modal-footer">Don't have an account? <a href="#">Create one</a></div> -->
                </div>
                <!-- </div> -->
            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
    // Muestra el modal al cargar la página
    $('#myModal').modal('show');

    // Cierra el modal después de 10 segundos
    setTimeout(function(){
      $('#myModal').modal('hide');
    }, 3000);
  });
        </script>
      <div class="">
        <h1 style="text-align:center">REGISTRAR TRASLADO</h1>
        <center>
          <div style="text-align:center;padding:15px;border:solid 5px; width:70%;border-radius:35px;shadow" class="well form-horizontal">
            <form class="" action="save_part1_traslado.php" method="post">
              <div class="form-group" style="display:none;">
                <label class="col-md-3 control-label">ID TRASLADO</label>
                <div class="col-md-7 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
                    <input name="idtraslado" class="form-control" type="text" value="<?php echo $idtrasladounico; ?>" readonly>
                  </div>
                </div>
              </div>
              <div id="contenedor-traslado">
                <div class="traslado-form">
                  <div class="row">

                    <div class="col-md-2" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">
                      <label class="col-md-2 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">FECHA DE TRASLADO</label>
                      <input name="fechatraslado" class="form-control" type="date" required min="<?php echo $datemin; ?>">
                    </div>

                    <div class="col-md-2" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">
                      <label class="col-md-2 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">LUGAR DE SALIDA</label>
                      <!-- <input name="lugarsalida" placeholder="INGRESE LUGAR" class="form-control" type="text" required> -->
                      <select name="lugarsalida" class="form-control selectpicker" required onchange="addlugar(this)">
                        <option disabled selected value>SELECCIONE LUGAR</option>
                        <?php
                        $trasladomotivo = "SELECT * FROM react_traslados_lugar";
                        $rtrasladomotivo = $mysqli->query($trasladomotivo);
                        while($ftrasladomotivo = $rtrasladomotivo->fetch_assoc()){
                          echo "<option value='".$ftrasladomotivo['lugar']."'>".$ftrasladomotivo['lugar']."</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-2" style="display:none; text-align: center; width: 228px; border: 1px solid #ECECEC;" id="esplugsal">
                      <label class="col-md-2 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">ESPECIFIQUE LUGAR</label>
                      <input id="inplugsalesp" name="especifiquelugarsalida" placeholder="INGRESE LUGAR" class="form-control" type="text">
                    </div>
                    <div class="col-md-2" style="display:none; text-align: center; width: 228px; border: 1px solid #ECECEC;" id="espdomsal">
                      <label class="col-md-2 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">DOMICILIO SALIDA</label>
                      <input id="inpdomsalesp" name="especifiquedomiciliosalida" placeholder="INGRESE DOMICILIO" class="form-control" type="text">
                    </div>
                    <div class="col-md-2" style="display:none; text-align: center; width: 228px; border: 1px solid #ECECEC;" id="espmunsal">
                      <label class="col-md-2 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">MUNICIPIO SALIDA</label>
                      <select id="inpmunsalesp" name="especifiquemunicipiosalida" placeholder="INGRESE MUNICIPIO" class="form-control selectpicker">
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

                    <div class="col-md-2" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">
                      <label class="col-md-2 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">INICIO DEL TRASLADO</label>
                      <input name="horasalida" class="form-control" type="time" required>
                    </div>
                    <div class="col-md-2" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">
                      <label class="col-md-2 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">FIN DEL TRASLADO</label>
                      <input name="horallegada" class="form-control" type="time" required>
                    </div>
                    <div class="col-md-3" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">
                      <label class="col-md-3 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">KILOMETROS RECORRIDOS</label>
                      <input id="kilometrosrecorridos" name="kilometrosrecorridos" placeholder="INGRESE KILOMETROS RECORRIDOS" class="form-control" type="text" required>
                    </div>
                    <!--  -->
                    <div class="col-md-12" style="text-align: center; width: 988px; border: 1px solid #ECECEC;">
                      <label class="col-md-3 control-label" style="text-align: center; width: 228px; border: 1px solid #ECECEC;">OBSERVACIONES</label>
                      <textarea name="observaciones" rows="5" cols="119" required style="resize: none;"></textarea>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success">SIGUIENTE <span class="glyphicon glyphicon-ok"></span></button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </center>
      </div>
    </div>
  </div>
  <div class="contenedor">
      <a href="../../consultores/admin.php" class="btn-flotante">REGRESAR</a>
  </div>
<script type="text/javascript">
function addlugar(sel) {
      if (sel.value==="OTRO"){
        document.getElementById("esplugsal").style.display = "";
        document.getElementById("espdomsal").style.display = "";
        document.getElementById("espmunsal").style.display = "";
        document.getElementById("inplugsalesp").required = true;
        document.getElementById("inpdomsalesp").required = true;
        document.getElementById("inpmunsalesp").required = true;

        console.log('add lugar');
      }else {
        console.log('next registrer');
        document.getElementById("esplugsal").style.display = "none";
        document.getElementById("espdomsal").style.display = "none";
        document.getElementById("espmunsal").style.display = "none";
        document.getElementById("inplugsalesp").value = "";
        document.getElementById("inpdomsalesp").value = "";
        document.getElementById("inpmunsalesp").value = "";
        document.getElementById("inplugsalesp").required = false;
        document.getElementById("inpdomsalesp").required = false;
        document.getElementById("inpmunsalesp").required = false;
      }
}
</script>
</body>
</html>
