<?php
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set("America/Mexico_City");
require './conexion.php';
// include("../subdireccion_de_analisis_de_riesgo/conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$check_actividad = 1;
$_SESSION["check_actividad"] = $check_actividad;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>REGISTRAR ACTIVIDAD</title>
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
  <link rel="stylesheet" href="../css/react_add_traslados.css">
   <script src="../js/funciones_react.js"></script>
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
                      <span class="menu-items" style="color: white; font-weight:bold;">REACT</span>
                      <i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i>
                  </a>
                  <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                      <!-- <li>
                          <a href="#" style="color:white; text-decoration:none;" onclick="location.href='./registrar_actividad.php'">
                              <i class="fas fa-file-medical"></i> REGISTRAR ACTIVIDAD
                          </a>
                      </li> -->
                      <li>
                          <a href="#" style="color:white; text-decoration:none;" onclick="location.href='./buscar_actividad.php'">
                              <i class="fas fa-laptop-file"></i> BUSCAR ACTIVIDAD
                          </a>
                      </li>
                      <li>
                          <a href="#" style="color:white; text-decoration:none;" onclick="location.href='./consultar_cifras_actividad.php'">
                              <i class="fas fa-search"></i> CONSULTAR CIFRAS
                          </a>
                      </li>
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

      <!-- <input  id="act" > -->
          
      <div class="form-group">
        <label class="col-md-3 control-label">ACTIVIDAD</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-list-check"></i></span>
            <!-- <input name="actividad" id="actividad" class="form-control" type="text" required> -->
            <select class="form-control" name="numero_actividad" id="numero_actividad" required>
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <?php
                    $select = "SELECT * FROM react_actividad_analisis ORDER BY nombre ASC"; 
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


<!-- style="display:none;" -->

      <div class="form-group" id="clasificacion_uno" style="display:none;">
        <label class="col-md-3 control-label">CLASIFICACIÓN</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-table-list"></i></span>
            <select class="form-control" name="clasificacion_actividad_uno" id="clasificacion_actividad_uno">
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <?php
                    $select = "SELECT * FROM react_evaluaciones_periodicas ORDER BY nombre ASC";
                    $answer = $mysqli->query($select);
                    while($valores = $answer->fetch_assoc()){
                    // $id_actividad = $valores['idactividad'];
                    // echo $id_actividad;
                    echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
                    }
                ?>
            </select>
          </div>
        </div>
      </div>


      <div class="form-group" id="clasificacion_dos" style="display:none;">
        <label class="col-md-3 control-label">CLASIFICACIÓN</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-table-list"></i></span>
            <select class="form-control" name="clasificacion_actividad_dos" id="clasificacion_actividad_dos">
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <?php
                    $select = "SELECT * FROM react_diligencias_administrativas ORDER BY nombre ASC";
                    $answer = $mysqli->query($select);
                    while($valores = $answer->fetch_assoc()){
                    // $id_actividad = $valores['idactividad'];
                    // echo $id_actividad;
                    echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
                    }
                ?>
            </select>
          </div>
        </div>
      </div>


      <div class="form-group" id="clasificacion_tres" style="display:none;">
        <label class="col-md-3 control-label">CLASIFICACIÓN</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-table-list"></i></span>
            <select class="form-control" name="clasificacion_actividad_tres" id="clasificacion_actividad_tres">
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <?php
                    $select = "SELECT * FROM react_asesoria_juridica ORDER BY nombre ASC";
                    $answer = $mysqli->query($select);
                    while($valores = $answer->fetch_assoc()){
                    // $id_actividad = $valores['idactividad'];
                    // echo $id_actividad;
                    echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
                    }
                ?>
            </select>
          </div>
        </div>
      </div>


      <div class="form-group" id="clasificacion_cuatro" style="display:none;">
        <label class="col-md-3 control-label">CLASIFICACIÓN</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-table-list"></i></span>
            <select class="form-control" name="clasificacion_actividad_cuatro" id="clasificacion_actividad_cuatro">
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <?php
                    $select = "SELECT * FROM react_ayuda_servicios ORDER BY nombre ASC";
                    $answer = $mysqli->query($select);
                    while($valores = $answer->fetch_assoc()){
                    // $id_actividad = $valores['idactividad'];
                    // echo $id_actividad;
                    echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
                    }
                ?>
            </select>
          </div>
        </div>
      </div>



      <div class="form-group" id="clasificacion_cinco" style="display:none;">
        <label class="col-md-3 control-label">CLASIFICACIÓN</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-table-list"></i></span>
            <select class="form-control" name="clasificacion_actividad_cinco" id="clasificacion_actividad_cinco">
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <?php
                    $select = "SELECT * FROM react_otras_medidas ORDER BY nombre ASC";
                    $answer = $mysqli->query($select);
                    while($valores = $answer->fetch_assoc()){
                    // $id_actividad = $valores['idactividad'];
                    // echo $id_actividad;
                    echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
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
            <input autocomplete="off" name="cantidad_actividad" id="cantidad_actividad" class="form-control" type="number" required>
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



      <div class="form-group" id="folio_expediente_actividad" style="display:none;">
        <label class="col-md-3 control-label">FOLIO DEL EXPEDIENTE</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-folder"></i></span>
            <select class="form-control" name="folio_expediente" id="folio_expediente">
              <option disabled selected value>SELECCIONE EL EXPEDIENTE</option>
                <?php
                    $select1 = "SELECT DISTINCT datospersonales.folioexpediente
                    FROM datospersonales
                    -- WHERE datospersonales.estatus = 'SUJETO PROTEGIDO'
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

      
      <div class="form-group" id="id_sujeto_actividad" style="display:none;">
        <label class="col-md-3 control-label">ID SUJETO</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-id-card"></i></span>
            <select class="form-control" name="id_sujeto" id="id_sujeto">


            </select>
          </div>
        </div>
      </div>



      <div class="form-group" id="div_numero_oficio_actividad" style="display:none;">
          <label class="col-md-3 control-label">NÚMERO DE OFICIO O SOLICITUD</label>
          <div class="col-md-7 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa-solid fa-file"></i></span>
              <input autocomplete="off" name="numero_oficio_actividad" id="numero_oficio_actividad" class="form-control" value class="form-control" type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
          </div>
      </div>


      <div class="form-group">
        <label class="col-md-3 control-label">OBSERVACIONES</label>
        <div class="col-md-7 inputGroupContainer">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa-solid fa-comments"></i></span>
            <textarea class="form-control" type="text" name="observaciones_actividad" id="observaciones_actividad" rows="5" cols="33" maxlength="1000" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
          </div>
        </div>
      </div>


      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-5">
          <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> GUARDAR </button>
        </div>
      </div>

      
    </form>
  </div>
</center>


      </div>
    </div>
  </div>
  <div class="contenedor">
      <a href="./menu.php" class="btn-flotante">REGRESAR</a>
      <!-- <a href="../admin.php" class="btn-flotante">REGRESAR</a> -->

  </div>


  <script type="text/javascript">
	$(document).ready(function(){
		$('#folio_expediente').val(1);
		recargarLista();

		$('#folio_expediente').change(function(){
			recargarLista();
		});


	})
</script>


<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"./get_id_sujeto.php",
			data:"folio=" + $('#folio_expediente').val(),
			success:function(r){
				$('#id_sujeto').html(r);
			}
		});
	}
</script>


<script type="text/javascript">

  var n_actividad = document.getElementById('numero_actividad');
  var numero_act;
  var num_actividad_obtenido;
  
  n_actividad.addEventListener('change', obtenerNumero);

  function obtenerNumero(e){

    numero_act = e.target.value;
    num_actividad_obtenido = numero_act;
    act = num_actividad_obtenido
    // document.getElementById('act').value = num_actividad_obtenido;
    // console.log(num_actividad_obtenido);

    if (num_actividad_obtenido === '1'){
      
      document.getElementById("clasificacion_uno").style.display = ""; // MOSTRAR
      document.getElementById('folio_expediente_actividad').style.display = ""; // MOSTRAR
      document.getElementById('id_sujeto_actividad').style.display = ""; // MOSTRAR
      document.getElementById("div_numero_oficio_actividad").style.display = ""; // MOSTRAR

      document.getElementById("clasificacion_dos").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_tres").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_cuatro").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_cinco").style.display = "none"; // OCULTAR

      document.getElementById("clasificacion_actividad_uno").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_dos").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_tres").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cuatro").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cinco").value = ""; // LIMPIAR

      document.getElementById("cantidad_actividad").value = ""; // LIMPIAR
      document.getElementById("fecha_actividad").value = ""; // LIMPIAR 
      document.getElementById("folio_expediente").value = ""; // LIMPIAR
      document.getElementById('id_sujeto').value = ""; // LIMPIAR
      document.getElementById('numero_oficio_actividad').value = ""; // LIMPIAR
      document.getElementById("observaciones_actividad").value = ""; // LIMPIAR
      
      document.getElementById("clasificacion_actividad_uno").required = true; // CAMPO OBLIGATORIO
      document.getElementById("folio_expediente").required = true; // CAMPO OBLIGATORIO
      document.getElementById("id_sujeto").required = true; // CAMPO OBLIGATORIO
      document.getElementById("numero_oficio_actividad").required = true; // CAMPO OBLIGATORIO
      
    }

    else if (num_actividad_obtenido === '2' || num_actividad_obtenido === '4' || num_actividad_obtenido === '5' || num_actividad_obtenido === '6' || num_actividad_obtenido === '9' || num_actividad_obtenido === '12'){

      document.getElementById("clasificacion_uno").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_dos").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_tres").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_cuatro").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_cinco").style.display = "none"; // OCULTAR

      document.getElementById('folio_expediente_actividad').style.display = ""; // MOSTRAR
      document.getElementById('id_sujeto_actividad').style.display = ""; // MOSTRAR
      document.getElementById("div_numero_oficio_actividad").style.display = ""; // MOSTRAR

      document.getElementById("clasificacion_actividad_uno").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_dos").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_tres").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cuatro").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cinco").value = ""; // LIMPIAR

      document.getElementById("cantidad_actividad").value = ""; // LIMPIAR
      document.getElementById("fecha_actividad").value = ""; // LIMPIAR 
      document.getElementById("folio_expediente").value = ""; // LIMPIAR
      document.getElementById('id_sujeto').value = ""; // LIMPIAR
      document.getElementById('numero_oficio_actividad').value = ""; // LIMPIAR
      document.getElementById("observaciones_actividad").value = ""; // LIMPIAR
      
      document.getElementById("folio_expediente").required = true; // CAMPO OBLIGATORIO
      document.getElementById("id_sujeto").required = true; // CAMPO OBLIGATORIO
      document.getElementById("numero_oficio_actividad").required = true; // CAMPO OBLIGATORIO


    }

    else if (num_actividad_obtenido === '3'){

      document.getElementById("clasificacion_uno").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_dos").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_tres").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_cuatro").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_cinco").style.display = "none"; // OCULTAR
      
      document.getElementById('folio_expediente_actividad').style.display = ""; // MOSTRAR
      document.getElementById('id_sujeto_actividad').style.display = ""; // MOSTRAR

      document.getElementById("clasificacion_actividad_uno").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_dos").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_tres").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cuatro").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cinco").value = ""; // LIMPIAR
      document.getElementById("cantidad_actividad").value = ""; // LIMPIAR
      document.getElementById("fecha_actividad").value = ""; // LIMPIAR 
      document.getElementById("folio_expediente").value = ""; // LIMPIAR
      document.getElementById('id_sujeto').value = ""; // LIMPIAR
      document.getElementById('numero_oficio_actividad').value = ""; // LIMPIAR
      document.getElementById("observaciones_actividad").value = ""; // LIMPIAR
      
      document.getElementById("folio_expediente").required = true; // CAMPO OBLIGATORIO
      document.getElementById("id_sujeto").required = true; // CAMPO OBLIGATORIO

    } 

    else if (num_actividad_obtenido === '7'){

      document.getElementById("clasificacion_dos").style.display = ""; // MOSTRAR
      document.getElementById('folio_expediente_actividad').style.display = ""; // MOSTRAR
      document.getElementById('id_sujeto_actividad').style.display = ""; // MOSTRAR

      document.getElementById("clasificacion_uno").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_tres").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_cuatro").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_cinco").style.display = "none"; // OCULTAR

      document.getElementById("clasificacion_actividad_uno").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_dos").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_tres").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cuatro").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cinco").value = ""; // LIMPIAR
      document.getElementById("cantidad_actividad").value = ""; // LIMPIAR
      document.getElementById("fecha_actividad").value = ""; // LIMPIAR 
      document.getElementById("folio_expediente").value = ""; // LIMPIAR
      document.getElementById('id_sujeto').value = ""; // LIMPIAR
      document.getElementById('numero_oficio_actividad').value = ""; // LIMPIAR
      document.getElementById("observaciones_actividad").value = ""; // LIMPIAR
      
      document.getElementById("clasificacion_actividad_dos").required = true; // CAMPO OBLIGATORIO
      document.getElementById("folio_expediente").required = true; // CAMPO OBLIGATORIO
      document.getElementById("id_sujeto").required = true; // CAMPO OBLIGATORIO
    }


    else if (num_actividad_obtenido === '8'){
      document.getElementById("clasificacion_tres").style.display = ""; // MOSTRAR
      document.getElementById('folio_expediente_actividad').style.display = ""; // MOSTRAR
      document.getElementById('id_sujeto_actividad').style.display = ""; // MOSTRAR
      document.getElementById("div_numero_oficio_actividad").style.display = ""; // MOSTRAR

      document.getElementById("clasificacion_uno").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_dos").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_cuatro").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_cinco").style.display = "none"; // OCULTAR

      document.getElementById("clasificacion_actividad_uno").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_dos").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_tres").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cuatro").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cinco").value = ""; // LIMPIAR
      document.getElementById("cantidad_actividad").value = ""; // LIMPIAR
      document.getElementById("fecha_actividad").value = ""; // LIMPIAR 
      document.getElementById("folio_expediente").value = ""; // LIMPIAR
      document.getElementById('id_sujeto').value = ""; // LIMPIAR
      document.getElementById('numero_oficio_actividad').value = ""; // LIMPIAR
      document.getElementById("observaciones_actividad").value = ""; // LIMPIAR

      document.getElementById("clasificacion_actividad_tres").required = true; // CAMPO OBLIGATORIO
      document.getElementById("folio_expediente").required = true; // CAMPO OBLIGATORIO
      document.getElementById("id_sujeto").required = true; // CAMPO OBLIGATORIO
      document.getElementById("numero_oficio_actividad").required = true; // CAMPO OBLIGATORIO


    }

    else if (num_actividad_obtenido === '10'){

      document.getElementById("clasificacion_cuatro").style.display = ""; // MOSTRAR
      document.getElementById('folio_expediente_actividad').style.display = ""; // MOSTRAR
      document.getElementById('id_sujeto_actividad').style.display = ""; // MOSTRAR
      document.getElementById("div_numero_oficio_actividad").style.display = ""; // MOSTRAR

      document.getElementById("clasificacion_uno").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_dos").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_tres").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_cinco").style.display = "none"; // OCULTAR

      document.getElementById("clasificacion_actividad_uno").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_dos").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_tres").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cuatro").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cinco").value = ""; // LIMPIAR
      document.getElementById("cantidad_actividad").value = ""; // LIMPIAR
      document.getElementById("fecha_actividad").value = ""; // LIMPIAR 
      document.getElementById("folio_expediente").value = ""; // LIMPIAR
      document.getElementById('id_sujeto').value = ""; // LIMPIAR
      document.getElementById('numero_oficio_actividad').value = ""; // LIMPIAR
      document.getElementById("observaciones_actividad").value = ""; // LIMPIAR

      document.getElementById("clasificacion_actividad_cuatro").required = true; // CAMPO OBLIGATORIO
      document.getElementById("folio_expediente").required = true; // CAMPO OBLIGATORIO
      document.getElementById("id_sujeto").required = true; // CAMPO OBLIGATORIO
      document.getElementById("numero_oficio_actividad").required = true; // CAMPO OBLIGATORIO


    }

    else if (num_actividad_obtenido === '11'){
      document.getElementById("clasificacion_cinco").style.display = ""; // MOSTRAR
      document.getElementById('folio_expediente_actividad').style.display = ""; // MOSTRAR
      document.getElementById('id_sujeto_actividad').style.display = ""; // MOSTRAR
      document.getElementById("div_numero_oficio_actividad").style.display = ""; // MOSTRAR

      document.getElementById("clasificacion_uno").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_dos").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_tres").style.display = "none"; // OCULTAR
      document.getElementById("clasificacion_cuatro").style.display = "none"; // OCULTAR

      document.getElementById("clasificacion_actividad_uno").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_dos").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_tres").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cuatro").value = ""; // LIMPIAR
      document.getElementById("clasificacion_actividad_cinco").value = ""; // LIMPIAR
      document.getElementById("cantidad_actividad").value = ""; // LIMPIAR
      document.getElementById("fecha_actividad").value = ""; // LIMPIAR 
      document.getElementById("folio_expediente").value = ""; // LIMPIAR
      document.getElementById('id_sujeto').value = ""; // LIMPIAR
      document.getElementById('numero_oficio_actividad').value = ""; // LIMPIAR
      document.getElementById("observaciones_actividad").value = ""; // LIMPIAR

      document.getElementById("clasificacion_actividad_cinco").required = true; // CAMPO OBLIGATORIO
      document.getElementById("folio_expediente").required = true; // CAMPO OBLIGATORIO
      document.getElementById("id_sujeto").required = true; // CAMPO OBLIGATORIO
      document.getElementById("numero_oficio_actividad").required = true; // CAMPO OBLIGATORIO


    }
    
  }

</script>



<!-- <script>
var variablejs = "contenido de la variable javascript" ;
</script>
<?php
$variablephp = "<script> document.write(variablejs) </script>";
echo "variablephp = $variablephp";
?> -->

</body>
</html>
