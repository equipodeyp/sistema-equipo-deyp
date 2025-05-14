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
  <!-- <script src="../../js/funciones_react_actividad.js"></script> -->
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
  <div style="text-align:center;padding:25px;border:solid 5px; width:70%;border-radius:35px;shadow" class="well form-horizontal">

    <form method="POST" action="save_actividad.php" enctype= "multipart/form-data">
      <!-- SUBDIRECCIÓN-->
      <div class="persona-form">
      <div class="form-group" style="display:none;">
        <label class="col-md-3 control-label">SUBDIRECCIÓN</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="subdireccion" value="SUBDIRECCIÓN DE EJECUCIÓN DE MEDIDAS" class="form-control" type="text" readonly>
          </div>
        </div>
      </div>
      <!-- FUNCIÓN -->
      <div class="form-group" style="display:none;">
        <label class="col-md-3 control-label">FUNCIÓN</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="funcion" value="MEDIDAS DE RESGUARDO" class="form-control" type="text" readonly>
          </div>
        </div>
      </div>
      <!-- SELECT DE ACTIVIDAD -->
      <div class="form-group">
        <label class="col-md-3 control-label">ACTIVIDAD</label>
        <div class="col-md-7 selectContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
            <select name="actividad" class="form-control selectpicker" required onchange="selectNit(event)" id="actividadejecucion">
              <option disabled selected value>SELECCIONE UNA ACTIVIDAD</option>
              <?php
              $municipio = "SELECT * FROM react_actividad_ejecucion";
              $answermun = $mysqli->query($municipio);
              while($municipios = $answermun->fetch_assoc()){
               echo "<option value='".$municipios['id']."'>".$municipios['nombre']."</option>";
              }
              ?>
            </select>
          </div>
        </div>
      </div>
      <!-- UNIDAD DE MEDIDA -->
      <div class="form-group" style="display:none;">
        <label class="col-md-3 control-label">UNIDAD DE MEDIDA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="unidadmedida" value="" class="form-control" type="text" readonly id="unidadmedida">
          </div>
        </div>
      </div>
      <!-- REPORTE DE METAS -->
      <div class="form-group" style="display:none;">
        <label class="col-md-3 control-label">REPORTE DE METAS</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="reportemetas" value="" class="form-control" type="text" readonly id="reportemetas">
          </div>
        </div>
      </div>
      <!-- <span>______________________________________________________________________________________________</span> -->

      <!-- inputs de clasificacion segun el tipo de actividad seleccionada -->
      <?php
      include("selectclasificacion.php");
      ?>
      <!-- FECHA -->
      <div class="form-group">
        <label class="col-md-3 control-label">FECHA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-clock"></i></span>
            <input name="fechaactividad" class="form-control" type="date" required>
          </div>
        </div>
      </div>
      <!-- CANTIDAD -->
      <div class="form-group">
        <label class="col-md-3 control-label">CANTIDAD</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="cantidad" value="" class="form-control" type="text" id="cantidad">
          </div>
        </div>
      </div>

      <!-- ENTIDAD/MUNICIPIO -->
      <div class="form-group" id="entidadmunicipio_1_2" style="display: none;">
        <label class="col-md-3 control-label">ENTIDAD/MUNICIPIO</label>
        <div class="col-md-7 selectContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
            <select name="entidadmunicipio" class="form-control selectpicker">
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
      <!-- id del expediente -->
      <div class="form-group" id="actividad_folioexpediente" style="display: none;">
        <label class="col-md-3 control-label">ID DEL EXPEDIENTE DE PROTECCIÓN</label>
        <div class="col-md-7 selectContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
            <select class="form-control expediente" name="folioexpediente">
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
      </div>
      <!-- id del SUJETO -->
      <div class="form-group" id="actividad_idsujeto" style="display: none;">
        <label class="col-md-3 control-label">ID DE PP O SP</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <select class="form-control id-sujeto" name="id_sujeto">
              <option disabled selected value="">SELECCIONE EL ID DEL SUJETO</option>
            </select>
          </div>
        </div>
      </div>
      <!-- EVIDENCIA -->
      <div class="form-group">
        <label class="col-md-3 control-label">EVIDENCIA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="evidencia" value="" class="form-control" type="text" id="evidencia">
          </div>
        </div>
      </div>
      <!-- ID DE EVIDENCIA -->
      <div class="form-group" id="actividad_idevidencia" style="display: none;">
        <label class="col-md-3 control-label">ID DE EVIDENCIA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="idevidencia" value="" class="form-control" type="text" id="idevidencia">
          </div>
        </div>
      </div>
      <!-- KILOMETROS -->
      <div class="form-group" id="actividad_kilometros" style="display: none;">
        <label class="col-md-3 control-label">KILOMETROS</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="kilometros" value="" class="form-control" type="text" id="kilometros">
          </div>
        </div>
      </div>
      <!-- OBSERVACIONES -->
      <div class="form-group">
        <label class="col-md-3 control-label">OBSERVACIONES</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <!-- <input name="observaciones" value="" class="form-control" type="text" id="observaciones"> -->
            <textarea name="observaciones" class="form-control" id="observacionesact" rows="3" cols="80"></textarea>
          </div>
        </div>
      </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-5">
          <button type="submit" class="btn btn-success">REGISTRAR <span class="glyphicon glyphicon-ok"></span></button>
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
  <script type="text/javascript">
  function selectNit(e) {
    var idactividad = document.getElementById("actividadejecucion").value;
      if (idactividad === '2') {
      document.getElementById("unidadmedida").value = "DOCUMENTO";
      document.getElementById("trasladoclasificacion").style.display = "none";
      document.getElementById("clasificacioncontactofamiliar").style.display = "none";
      document.getElementById("clasificacionaccionseguridad").style.display = "none";
      document.getElementById("clasificacion_salvaguardarintegridad").style.display = "none";
      document.getElementById("entidadmunicipio_1_2").style.display = "none";
      document.getElementById("actividad_folioexpediente").style.display = "";
      document.getElementById("actividad_idsujeto").style.display = "";
      document.getElementById("actividad_idevidencia").style.display = "";
      document.getElementById("actividad_kilometros").style.display = "none";
    }else if (idactividad === '3') {
      document.getElementById("unidadmedida").value = "ACCIÓN";
      document.getElementById("trasladoclasificacion").style.display = "none";
      document.getElementById("clasificacioncontactofamiliar").style.display = "";
      document.getElementById("clasificacionaccionseguridad").style.display = "none";
      document.getElementById("clasificacion_salvaguardarintegridad").style.display = "none";
      document.getElementById("entidadmunicipio_1_2").style.display = "none";
      document.getElementById("actividad_folioexpediente").style.display = "";
      document.getElementById("actividad_idsujeto").style.display = "";
      document.getElementById("actividad_idevidencia").style.display = "none";
      document.getElementById("actividad_kilometros").style.display = "none";
    }else if (idactividad === '4') {
      document.getElementById("unidadmedida").value = "ACCIÓN";
      document.getElementById("trasladoclasificacion").style.display = "none";
      document.getElementById("clasificacioncontactofamiliar").style.display = "none";
      document.getElementById("clasificacionaccionseguridad").style.display = "";
      document.getElementById("clasificacion_salvaguardarintegridad").style.display = "none";
      document.getElementById("entidadmunicipio_1_2").style.display = "none";
      document.getElementById("actividad_folioexpediente").style.display = "none";
      document.getElementById("actividad_idsujeto").style.display = "none";
      document.getElementById("actividad_idevidencia").style.display = "";
      document.getElementById("actividad_kilometros").style.display = "none";
    }else if (idactividad === '5') {
      document.getElementById("unidadmedida").value = "ACCIÓN";
      document.getElementById("trasladoclasificacion").style.display = "none";
      document.getElementById("clasificacioncontactofamiliar").style.display = "none";
      document.getElementById("clasificacionaccionseguridad").style.display = "none";
      document.getElementById("clasificacion_salvaguardarintegridad").style.display = "";
      document.getElementById("entidadmunicipio_1_2").style.display = "none";
      document.getElementById("actividad_folioexpediente").style.display = "";
      document.getElementById("actividad_idsujeto").style.display = "";
      document.getElementById("actividad_idevidencia").style.display = "none";
      document.getElementById("actividad_kilometros").style.display = "none";
    }else if (idactividad === '6') {
      document.getElementById("unidadmedida").value = "RONDÍN POLICIAL";
      document.getElementById("trasladoclasificacion").style.display = "none";
      document.getElementById("clasificacioncontactofamiliar").style.display = "none";
      document.getElementById("clasificacionaccionseguridad").style.display = "none";
      document.getElementById("clasificacion_salvaguardarintegridad").style.display = "none";
      document.getElementById("entidadmunicipio_1_2").style.display = "";
      document.getElementById("actividad_folioexpediente").style.display = "";
      document.getElementById("actividad_idsujeto").style.display = "";
      document.getElementById("actividad_idevidencia").style.display = "none";
      document.getElementById("actividad_kilometros").style.display = "";
    }
    document.getElementById("reportemetas").value = "SI";
}
  </script>
  <script>
    $(document).ready(function(){
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
    });
  </script>
</body>
</html>
