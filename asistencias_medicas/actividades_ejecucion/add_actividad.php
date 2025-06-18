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
  <style media="screen">
  body {
font-family: sans-serif;
background-color: #eeeeee;
}

.file-upload {
background-color: #ffffff;
width: 636px;
margin: 0 auto;
padding: 25px;
}

.file-upload-btn {
width: 100%;
margin: 0;
color: #fff;
background: #1FB264;
border: none;
padding: 10px;
border-radius: 4px;
border-bottom: 4px solid #15824B;
transition: all .2s ease;
outline: none;
text-transform: uppercase;
font-weight: 700;
}

.file-upload-btn:hover {
background: #1AA059;
color: #ffffff;
transition: all .2s ease;
cursor: pointer;
}

.file-upload-btn:active {
border: 0;
transition: all .2s ease;
}

.file-upload-content {
display: none;
text-align: center;
}

.file-upload-input {
position: absolute;
margin: 0;
padding: 0;
width: 100%;
height: 100%;
outline: none;
opacity: 0;
cursor: pointer;
}

.image-upload-wrap {
margin-top: 20px;
border: 4px dashed #1FB264;
position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
background-color: #1FB264;
border: 4px dashed #ffffff;
}

.image-title-wrap {
padding: 0 15px 15px 15px;
color: #222;
}

.drag-text {
text-align: center;
}

.drag-text h3 {
font-weight: 100;
text-transform: uppercase;
color: #15824B;
padding: 90px 0;
}

.file-upload-image {
max-height: 200px;
max-width: 200px;
margin: auto;
padding: 20px;
}

.remove-image {
width: 200px;
margin: 0;
color: #fff;
background: #cd4535;
border: none;
padding: 10px;
border-radius: 4px;
border-bottom: 4px solid #b02818;
transition: all .2s ease;
outline: none;
text-transform: uppercase;
font-weight: 700;
}

.remove-image:hover {
background: #c13b2a;
color: #ffffff;
transition: all .2s ease;
cursor: pointer;
}

.remove-image:active {
border: 0;
transition: all .2s ease;
}
  </style>
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
                    <span class="menu-items" style="color: white; font-weight:bold;">REACT</span>
                    <i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i>
                </a>
                <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                  <!-- <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='./actividades_ejecucion/add_actividad.php'">
                      <i class="fas fa-file-medical"></i> REGISTRAR ACTIVIDAD</a>
                  </li> -->
                  <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='consulta_actividad.php'">
                      <i class="fas fa-laptop-file"></i> BUSCAR ACTIVIDAD</a>
                  </li>
                  <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='search_actividad.php'">
                    <i class="fas fa-search"></i> CONSULTAR CIFRAS</a>
                  </li>
                </ul>
            </li>
        </ul>
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
        <h1 style="text-align:center">REGISTRAR ACTIVIDAD</h1>
        <center>
  <div style="text-align:center;padding:25px;border:solid 5px; width:70%;border-radius:35px;shadow" class="well form-horizontal">

    <form method="POST" action="save_actividad.php" enctype="multipart/form-data">
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
      <!-- hora -->
      <div class="form-group" id="horaejecmed" style="display:none">
        <label class="col-md-3 control-label">HORA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-clock"></i></span>
            <input name="horaactividad" class="form-control" type="time">
          </div>
        </div>
      </div>
      <!-- CANTIDAD -->
      <div class="form-group" id="cantidadejecmed" style="display:none">
        <label class="col-md-3 control-label">CANTIDAD</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <input name="cantidad" value="1" class="form-control" type="text" id="cantidad">
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
      <!-- sujeto traslado relacionar -->
      <div class="form-group" id="traslado_ejecutado" style="display: none;">
        <label class="col-md-3 control-label">TRASLADO</label>
        <div class="col-md-7 selectContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
            <select class="form-control" name="trasladorel" id="trasladorelact" onchange="checktraslado(event)">
              <option disabled selected value="">SELECCIONE EL EXPEDIENTE</option>
              <option value="SI">SI</option>
              <option value="NO">NO</option>
            </select>
          </div>
        </div>
      </div>
      <!-- traslado ejecutado -->
      <div class="form-group" id="traslado_ejecutadoinfo" style="display: none;">
        <label class="col-md-3 control-label">ID TRASLADO</label>
        <div class="col-md-7 selectContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
            <select class="form-control" name="trasladorelid" id="trasladorelact">
              <option disabled selected value="">SELECCIONE TRASLADO</option>
              <?php
                $trasejecinf = "SELECT * FROM react_traslados";
                $rtrasejecinf = $mysqli->query($trasejecinf);
                while($ftrasejecinf = $rtrasejecinf->fetch_assoc()){
                  $idtrasladoun = $ftrasejecinf['idtrasladounico'];
                  echo "<option value='$idtrasladoun'>$idtrasladoun</option>";
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
      <div class="form-group" id="evidejemed" style="display: none;">
        <label class="col-md-3 control-label">EVIDENCIA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <!-- <input name="evidencia" value="" class="form-control" type="text" id="evidencia"> -->
            <select class="form-control" name="evidencia" id="evidencia">
              <option disabled selected value="">SELECCIONE UNA OPCION</option>
              <option value="ACUERDO">ACUERDO</option>
              <option value="CONSTANCIA">CONSTANCIA</option>
            </select>
          </div>
        </div>
      </div>
      <!-- medio de notificacion -->
      <div class="form-group" id="medionotificejecmed" style="display:none">
        <label class="col-md-3 control-label">MEDIO DE NOTIFICACION A LA PP O SP</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-regular fa-calendar-check"></i></span>
            <!-- <input name="evidencia" value="" class="form-control" type="text" id="evidencia"> -->
            <select class="form-control" name="notific_atn" id="notific_atnpet">
              <option disabled selected value="">SELECCIONE UNA OPCION</option>
              <option value="ACTA CIRCUNSTANCIADA">ACTA CIRCUNSTANCIADA</option>
              <option value="CEDULA DE NOTIFICACION">CEDULA DE NOTIFICACION</option>
            </select>
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

      <!-- ID DE EVIDENCIA -->
      <div class="form-group" id="evidenciaejecmed" style="display: none;">
        <label class="col-md-3 control-label" style="line-height: 310px;">EVIDENCIA</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <div class="file-upload">
              <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">SELECCIONAR ARCHIVO</button>
              <div class="image-upload-wrap">
                <input class="file-upload-input" type="file" onchange="readURL(this);"  name="archivo" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,video/*">
                <!-- <input required="" type="file" name="file" id="exampleInputFile"> -->
                <div class="drag-text">
                  <h3>SELECCIONA UN ARCHIVO</h3>
                </div>
              </div>
              <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" name="imageevidencia2" id="imageevid2">
              </div>
            </div>
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
        <label class="col-md-3 control-label" style="line-height: 60px;">OBSERVACIONES</label>
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
      <a href="../../consultores/admin.php" class="btn-flotante">REGRESAR</a>
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
      document.getElementById("actividad_idevidencia").style.display = "none";
      document.getElementById("actividad_kilometros").style.display = "none";
      document.getElementById("medionotificejecmed").style.display = "";
      document.getElementById("horaejecmed").style.display = "none";
      document.getElementById("evidenciaejecmed").style.display = "none";
      document.getElementById("evidejemed").style.display = "";
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
      document.getElementById("medionotificejecmed").style.display = "none";
      document.getElementById("horaejecmed").style.display = "none";
      document.getElementById("evidenciaejecmed").style.display = "none";
      document.getElementById("evidejemed").style.display = "";
    }else if (idactividad === '4') {
      document.getElementById("unidadmedida").value = "ACCIÓN";
      document.getElementById("trasladoclasificacion").style.display = "none";
      document.getElementById("clasificacioncontactofamiliar").style.display = "none";
      document.getElementById("clasificacionaccionseguridad").style.display = "";
      document.getElementById("clasificacion_salvaguardarintegridad").style.display = "none";
      document.getElementById("entidadmunicipio_1_2").style.display = "none";
      document.getElementById("actividad_folioexpediente").style.display = "";
      document.getElementById("actividad_idsujeto").style.display = "";
      document.getElementById("actividad_idevidencia").style.display = "";
      document.getElementById("actividad_kilometros").style.display = "none";
      document.getElementById("medionotificejecmed").style.display = "none";
      document.getElementById("horaejecmed").style.display = "";
      document.getElementById("evidenciaejecmed").style.display = "";
      document.getElementById("evidejemed").style.display = "none";
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
      document.getElementById("medionotificejecmed").style.display = "none";
      document.getElementById("horaejecmed").style.display = "none";
      document.getElementById("evidenciaejecmed").style.display = "";
      document.getElementById("evidejemed").style.display = "none";
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
      document.getElementById("medionotificejecmed").style.display = "none";
      document.getElementById("horaejecmed").style.display = "none";
      document.getElementById("evidenciaejecmed").style.display = "";
      document.getElementById("evidejemed").style.display = "none";
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
  <script type="text/javascript">
  function readURL(input) {
if (input.files && input.files[0]) {

  var reader = new FileReader();

  reader.onload = function(e) {
    $('.image-upload-wrap').hide();

    $('.file-upload-image').attr('src', e.target.result);
    $('.file-upload-content').show();

    $('.image-title').html(input.files[0].name);
  };

  reader.readAsDataURL(input.files[0]);

} else {
  removeUpload();
}
}

function removeUpload() {
$('.file-upload-input').replaceWith($('.file-upload-input').clone());
$('.file-upload-content').hide();
$('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
  $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
  $('.image-upload-wrap').removeClass('image-dropping');
});

  </script>
  <script type="text/javascript">
  function selecttasl(e) {
    var idtrasladorel = document.getElementById("clasificacionsalvaguardarintegridad").value;
    if (idtrasladorel === '1') {
      document.getElementById("traslado_ejecutado").style.display = "none";
      document.getElementById("traslado_ejecutadoinfo").style.display = "none";
    }else if (idtrasladorel === '2') {
      document.getElementById("traslado_ejecutado").style.display = "";
    }else if (idtrasladorel === '3') {
      document.getElementById("traslado_ejecutado").style.display = "none";
      document.getElementById("traslado_ejecutadoinfo").style.display = "none";
    }
  }

  //checar si es traslado
  function checktraslado(e){
    var checktrasladoejec = document.getElementById("trasladorelact").value;
    if (checktrasladoejec === 'SI') {
      document.getElementById("traslado_ejecutadoinfo").style.display = "";
    }else {
      document.getElementById("traslado_ejecutadoinfo").style.display = "none";
    }
  }

  </script>
</body>
</html>
<!-- nuevos campos de hora y fotografia -->
