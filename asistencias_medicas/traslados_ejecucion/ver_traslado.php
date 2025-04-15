<?php
// header("Content-Type: text/html;charset=utf-8");
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
// obtener id del traslado almacenado
$id_traslado = $_GET["id_traslado"];
// traer los datos del traslado guardado anteriormente
$traertraslado = "SELECT * FROM react_traslados WHERE id = '$id_traslado'";
$rtraertraslado = $mysqli ->query ($traertraslado);
$ftraertraslado = $rtraertraslado -> fetch_assoc();

$traerobservacion = "SELECT * FROM react_observaciones_traslado WHERE id_traslado = '$id_traslado'";
$rtraerobservacion = $mysqli ->query ($traerobservacion);
$ftraerobservacion = $rtraerobservacion -> fetch_assoc();

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
        <h1 style="text-align:center">REGISTRAR TRASLADO</h1>
        <center>
  <div style="text-align:center;padding:90px;border:solid 5px; width:70%;border-radius:35px;shadow" class="well form-horizontal">
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-3 control-label">ID TRASLADO</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="idtraslado" class="form-control" type="text" value="<?php echo $ftraertraslado['idtrasladounico']; ?>" readonly>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">FECHA TRASLADO</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="fechatraslado" class="form-control" type="date" value="<?php echo $ftraertraslado['fecha']; ?>" disabled>
          </div>
        </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-3 control-label">LUGAR DE SALIDA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-earth-americas"></i></span>
            <input name="lugarsalida" placeholder="INGRESE LUGAR DE SALIDA" class="form-control" type="text" value="<?php echo $ftraertraslado['lugar_salida']; ?>" disabled>
          </div>
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-3 control-label">DOMICILIO SALIDA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-map-location-dot"></i></span>
            <input name="domiciliosalida" placeholder="INGRESE DOMICILIO DE SALIDA" class="form-control" type="text" value="<?php echo $ftraertraslado['domicilio_salida']; ?>" disabled>
          </div>
        </div>
      </div>

      <!-- Text input-->

      <div class="form-group">
        <label class="col-md-3 control-label">MUNICIPIO SALIDA</label>
        <div class="col-md-7 selectContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
            <select name="municipiosalida" class="form-control selectpicker" disabled>
              <option disabled selected value="<?php echo $ftraertraslado['municipio_salida']; ?>"><?php echo $ftraertraslado['municipio_salida']; ?></option>
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
            <input name="horasalida" class="form-control" type="time" value="<?php echo $ftraertraslado['hora_salida']; ?>" disabled>
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
            <input name="horallegada" class="form-control" type="time" value="<?php echo $ftraertraslado['hora_llegada']; ?>" disabled>
          </div>
        </div>
      </div>
      <!-- Text area -->
      <div class="form-group">
        <label class="col-md-3 control-label">KILOMETROS RECORRIDOS</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-road"></i></span>
            <input id="kilometrosrecorridos" name="kilometrosrecorridos" placeholder="INGRESE KILOMETROS RECORRIDOS" class="form-control" type="text" value="<?php echo $ftraertraslado['kilometros']; ?>" disabled>
          </div>
        </div>
      </div>
      <!-- Text area -->
      <div class="form-group">
        <label class="col-md-3 control-label" style="line-height: 110px;">OBSERVACIONES</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-road"></i></span>
            <textarea name="observaciones" rows="5" cols="55" disabled><?php echo $ftraerobservacion['observacion']; ?></textarea>
          </div>
        </div>
      </div>
      <!-- tabla de destinos -->
      <div class="form-group">
        <h1>DESTINOS</h1>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>NO.</th>
                <th>LUGAR</th>
                <th>DOMICILIO</th>
                <th>MUNICIPIO</th>
                <th>MOTIVO</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 0;
              $traerdestinos = "SELECT * FROM react_destinos_traslados WHERE id_traslado = '$id_traslado'";
              $rtraerdestinos = $mysqli->query($traerdestinos);
              while ($ftraerdestinos = $rtraerdestinos->fetch_assoc()) {
                $count = $count +1;
                ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $ftraerdestinos['lugar']; ?></td>
                  <td><?php echo $ftraerdestinos['domicilio']; ?></td>
                  <td><?php echo $ftraerdestinos['municipio']; ?></td>
                  <td><?php echo $ftraerdestinos['motivo']; ?></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
        </table>
      </div>
      <!-- tabla para agregar personas del traslado -->
      <form method="POST" action="save_personas_traslado.php?id_traslado=<?php echo $id_traslado; ?>" enctype= "multipart/form-data">


      <h1>SUJETOS QUE SE TRASLADARON</h1>
      <!-- <span>______________________________________________________________________________________________</span> -->
      <div id="contenedor-personas">
        <div class="persona-form">
          <div class="row">
          <span>______________________________________________________________________________________________</span>
            <div class="col-md-4 mb-3">
              <label>EXPEDIENTE</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-folder"></i></span>
                <select class="form-control expediente" name="nombre[]" required>
                  <option disabled selected value="">SELECCIONE EL EXPEDIENTE</option>
                  <?php
                    $select1 = "SELECT DISTINCT datospersonales.folioexpediente
                    FROM datospersonales
                    WHERE datospersonales.estatus = 'SUJETO PROTEGIDO' OR datospersonales.estatus = 'PERSONA PROPUESTA'
                    ORDER BY datospersonales.id ASC";
                    $answer1 = $mysqli->query($select1);
                    while($valores1 = $answer1->fetch_assoc()){
                      $result_folio = $valores1['folioexpediente'];
                      echo "<option value='$result_folio'>$result_folio</option>";
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-md-4 mb-3">
              <label>ID DE LA PP O SP</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <select class="form-control id-sujeto" name="id_sujeto[]" required>
                  <option disabled selected value="">SELECCIONE EL ID DEL SUJETO</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 mb-3">
              <label>EN RESGUARDO</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                <select class="form-control en-resguardo" name="resguardo[]">
                </select>
              </div>
            </div>

          </div>
        </div>
      </div>
      <span>______________________________________________________________________________________________</span>
       <br><br>
      <div class="row">
        <div class="col-md-12 mb-3">
          <button type="button" id="agregar-persona" class="btn btn-primary">
            <i class="fa fa-plus"></i> AGREGAR PERSONA
          </button>
        </div>
      </div>

      <script>
        $(document).ready(function(){
          var maxPersonas = 3;
          var contadorPersonas = 1;

          // Manejar cambio en select de expediente
          $(document).on('change', '.expediente', function(){
            var $this = $(this);
            var expediente = $this.val();
            var $idSujetoSelect = $this.closest('.persona-form').find('.id-sujeto');

            $.ajax({
              url: 'get_id_sujeto.php',
              type: 'POST',
              data: {expediente: expediente},
              success: function(response){
                $idSujetoSelect.html(response);
              }
            });
          });

          //Manejar cambio en select de expediente
          $(document).on('change', '.id-sujeto', function(){
            var $this = $(this);
            var idsujeto = $this.val();
            var $idSujetoSelect = $this.closest('.persona-form').find('.en-resguardo');

            $.ajax({
              url: 'get_if_en_resguardo.php',
              type: 'POST',
              data: {idsujeto: idsujeto},
              success: function(response){
                $idSujetoSelect.html(response);
              }
            });
          });

          // Agregar nueva persona
          $('#agregar-persona').click(function(){
            if(contadorPersonas < maxPersonas){
              var clone = $('.persona-form').first().clone();
              clone.find('select').val('');

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

      <h1>PDI</h1>
      <div id="contenedor-pdis">
        <div class="pdi-form">
          <div class="row">
            <span>______________________________________________________________________________________________</span>
            <div class="col-md-12 mb-3">
              <label>NOMBRE DEL PDI</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-folder"></i></span>
                <select class="form-control pdi" name="pdis[]" id="namepdi" required>
                  <option value="" disabled selected>SELECCIONE EL PDI</option>
                  <?php
                    $pdistrasaladaron = "SELECT * FROM react_grupo_translados
                    WHERE estatus = 'activo'";
                    $rpdistrasaladaron = $mysqli->query($pdistrasaladaron);
                    while($fpdistrasaladaron = $rpdistrasaladaron->fetch_assoc()){
                      $nombrepdi = $fpdistrasaladaron['nombre'];
                      echo "<option value='$nombrepdi'>$nombrepdi</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <span>______________________________________________________________________________________________</span>
      <br><br>
      <div class="row">
        <div class="col-md-12 mb-3">
          <button type="button" id="agregar-pdi" class="btn btn-primary">
            <i class="fa fa-plus"></i> AGREGAR PDI
          </button>
        </div>
      </div>
      <br>
      <script type="text/javascript">
        $(document).ready(function(){
          var maxpdis = 7;
          var contadorpdis = 1;
          // agregar nuevo pdi
          $('#agregar-pdi').click(function(){

            if (contadorpdis < maxpdis) {
              var clonepdi = $('.pdi-form').first().clone();
              clonepdi.find('select').val('');
              // Agregar botón eliminar al clon
              // clone.append('<span>______________________________________________________________________________________________</span>');
              clonepdi.append('<br><div class="col-md-12 mb-3"><button type="button" class="btn btn-danger btn-eliminar"><i class="fa fa-trash"></i> Eliminar</button></div>');
              clonepdi.append('<br>');
              $('#contenedor-pdis').append(clonepdi);

              contadorpdis++;
              // $('#namepdi option:selected').disabled();

              if(contadorpdis >= maxpdis){
                $('#agregar-pdi').hide();

              }
            }

          });
          // Eliminar pdi
          $(document).on('click', '.btn-eliminar', function(){
            $(this).closest('.pdi-form').remove();
            contadorpdis--;
            $('#agregar-pdi').show();
          });
        });
      </script>
      <br>
      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-5">
          <button type="submit" class="btn btn-success">FINALIZAR <span class="glyphicon glyphicon-ok"></span></button>
        </div>
      </div>
      </form>

  </div>
</center>


      </div>
    </div>
  </div>
</body>
</html>
