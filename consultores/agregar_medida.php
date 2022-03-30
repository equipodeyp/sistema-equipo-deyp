<?php
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$verifica_medida = 1;
$_SESSION["verifica_medida"] = $verifica_medida;
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$id_persona_med = $_GET['folio'];
echo $id_persona_med;
$fol=" SELECT * FROM datospersonales WHERE id='$id_persona_med'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();
$fol_expediente=$rowfol['folioexpediente'];
$id_persona_exp=$rowfol['id'];
$idunico= $rowfol['identificador'];
$valid = "SELECT * FROM validar_persona WHERE id_persona = '$id_persona_med'";
$res_val=$mysqli->query($valid);
$fil_val = $res_val->fetch_assoc();
$validacion = $fil_val['validacion'];
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/expediente.css">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/expediente.js"></script>
  <script src="../js/solicitud.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="../css/registrosolicitud1.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- <script src="JQuery.js"></script> -->
  <script src="../js/Javascript.js"></script>
  <script src="../js/validar_campos.js"></script>
  <script src="../js/verificar_camposm1.js"></script>
  <script src="../js/mascara2campos.js"></script>
  <!-- <link rel="stylesheet" href="../css/estilos.css">
  <script src="../js/main.js"></script> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
</head>
<body >
<div class="contenedor">
  <div class="sidebar ancho">
    <div class="logo text-warning">
    </div>
    <div class="user">
      <?php
			$sentencia_user=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
			$result_user = $mysqli->query($sentencia_user);
			$row_user=$result_user->fetch_assoc();
			$genero = $row_user['sexo'];

			if ($genero=='mujer') {
				echo "<img src='../image/mujerup.png' width='100' height='100'>";
			}

			if ($genero=='hombre') {
				// $foto = ../image/user.png;
				echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
			}
			// echo $genero;
			?>
      <span class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </span>
    </div>
    <nav class="menu-nav">
    </nav>
  </div>
  <div class="main bg-light">
    <div class="barra">
      <img src="../image/fiscalia.png" alt="" width="150" height="150">
      <img src="../image/ups2.png" alt="" width="1400" height="70">
      <img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
    </div>

    <div class="wrap">
    <div class="secciones">
    <article id="tab1">
    <div class="container">
      <form class="container well form-horizontal" method="POST" action="guardar_medida.php?folio=<?php echo $id_persona_med; ?>" enctype= "multipart/form-data">

        <div class="secciones form-horizontal sticky breadcrumb flat">
          <a href="../administrador/admin.php">REGISTROS</a>
          <a href="../administrador/detalles_expediente.php?folio=<?=$fol_expediente?>">EXPEDIENTE</a>
          <a href="../administrador/detalles_persona.php?folio=<?=$id_persona_exp?>">PERSONA</a>
          <a href="../administrador/detalles_medidas.php?folio=<?=$id_persona_med?>">MEDIDAS</a>
          <a class="actived">AGREGAR</a>
        </div>
        <div class="row">
          <div class="alert alert-info">
            <h3 style="text-align:center">DATOS LA PERSONA INCORPORADA</h3>
          </div>

          <div class="col-md-6 mb-3 validar">
                <label for="SIGLAS DE LA UNIDAD">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
                <input class="form-control" id="NUM_EXPEDIENTE" name="NUM_EXPEDIENTE" placeholder="" type="text" value="<?php echo $rowfol['folioexpediente'];?>" maxlength="50" readonly>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="SIGLAS DE LA UNIDAD">ID PERSONA PROPUESTA<span ></span></label>
            <input class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" value="<?php echo $rowfol['identificador']; ?>" maxlength="50" readonly>
          </div>

          <div class="alert alert-info">
            <h3 style="text-align:center">MEDIDA OTORGADA</h3>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CATEAGORIA_MEDIDA">CATEGORÍA DE LA MEDIDA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="CATEAGORIA_MEDIDA" name="CATEAGORIA_MEDIDA" required>
              <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
              <option value="INICIAL">INICIAL</option>
              <option value="AMPLIACION">AMPLIACIÓN</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CATEAGORIA_MEDIDA">FOLIO MEDIDA<span class="required"></span></label>
            <input class="form-control" id="FOLIO_MEDIDA" name="FOLIO_MEDIDA" placeholder="" type="text" readonly>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="TIPO_DE_MEDIDA">TIPO DE MEDIDA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="TIPO_DE_MEDIDA" name="TIPO_DE_MEDIDA" onChange="datesmedidas(this)" required>
              <option disabled selected value>SELECCIONE EL TIPO DE MEDIDA</option>
              <option value="PROVISIONAL">PROVISIONAL</option>
              <option value="DEFINITIVA">DEFINITIVA</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CLASIFICACION_MEDIDA">CLASIFICACIÓN DE LA MEDIDA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="CLASIFICACION_MEDIDA" name="CLASIFICACION_MEDIDA" onChange="selectmedida(this)" required="">
              <option disabled selected value>SELECCIONE LA CLASIFICACIÓN DE LA MEDIDA</option>
              <option value="ASISTENCIA">ASISTENCIA</option>
              <option value="RESGUARDO">RESGUARDO</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="asistencia" style="display:none;">
            <label for="MEDIDAS_ASISTENCIA">INCISO DE LA MEDIDA DE ASISTENCIA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="MEDIDAS_ASISTENCIA" name="MEDIDAS_ASISTENCIA" onChange="selectother(this)">
              <option disabled selected value>SELECCIONE LA MEDIDA</option>
              <?php
              $asistencia = "SELECT * FROM medidaasistencia";
              $answerasis = $mysqli->query($asistencia);
              while($asistencias = $answerasis->fetch_assoc()){
               echo "<option value='".$asistencias['nombre']."'>".$asistencias['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="otherasistencia" style="display:none;">
            <label for="OTRA_MEDIDA_ASISTENCIA">OTRA MEDIDA ASISTENCIA<span class="required"></span></label>
            <input class="form-control" id="OTRA_MEDIDA_ASISTENCIA" name="OTRA_MEDIDA_ASISTENCIA" placeholder="" type="text">
          </div>

          <div class="col-md-6 mb-3 validar" id="resguardo" style="display:none;">
            <label for="MEDIDAS_RESGUARDO">INCISO DE LA MEDIDA DE RESGUARDO<span class="required"></span></label>
            <select class="form-select form-select-lg" id="MEDIDAS_RESGUARDO" name="MEDIDAS_RESGUARDO" onChange="selectmedidares(this)" >
              <option disabled selected value>SELECCIONE LA MEDIDA</option>
              <?php
              $resguardo = "SELECT * FROM medidaresguardo";
              $answerres = $mysqli->query($resguardo);
              while($resguardos = $answerres->fetch_assoc()){
               echo "<option value='".$resguardos['nombre']."'>".$resguardos['nombre']."</option>";
              }
              ?>
              </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="otherresguardo" style="display:none;">
            <label for="OTRA_MEDIDA_RESGUARDO">OTRA MEDIDA RESGUARDO<span class="required"></span></label>
            <input class="form-control" id="OTRA_MEDIDA_RESGUARDO" name="OTRA_MEDIDA_RESGUARDO" placeholder="" type="text">
          </div>

          <div class="col-md-6 mb-3 validar" id="resguardoxi" style="display:none;">
            <label for="RESGUARDO_XI">EJECUCIÓN DE LA MEDIDA PROCESAL<span class="required"></span></label>
            <select class="form-select form-select-lg" id="RESGUARDO_XI" name="RESGUARDO_XI" >
              <option disabled selected value>SELECCIONE LA MEDIDA</option>
              <?php
              $resguardoxi = "SELECT * FROM medidaresguardoxi";
              $answerresxi = $mysqli->query($resguardoxi);
              while($resguardosxi = $answerresxi->fetch_assoc()){
               echo "<option value='".$resguardosxi['nombre']."'>".$resguardosxi['nombre']."</option>";
              }
              ?>
              </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="resguardoxii" style="display:none;">
            <label for="RESGUARDO_XII">MEDIDA OTORGADA A SUJETOS RECLUIDOS<span class="required"></span></label>
            <select class="form-select form-select-lg" id="RESGUARDO_XII" name="RESGUARDO_XII" >
              <option disabled selected value>SELECCIONE LA MEDIDA</option>
              <?php
              $resguardoxii = "SELECT * FROM medidaresguardoxii";
              $answerresxii = $mysqli->query($resguardoxii);
              while($resguardosxii = $answerresxii->fetch_assoc()){
               echo "<option value='".$resguardosxii['nombre']."'>".$resguardosxii['nombre']."</option>";
              }
              ?>
              </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="date_provisional" style="display:none;">
            <label for="INICIO_EJECUCION_MEDIDA">FECHA DE INICIO DE LA MEDIDA PROVISIONAL<span class="required"></span></label>
            <input class="form-control" id="INICIO_EJECUCION_MEDIDA" name="INICIO_EJECUCION_MEDIDA" placeholder="" type="date">
          </div>

          <div class="col-md-6 mb-3 validar" id="date_definitva" style="display:none;">
            <label for="FECHA_ACTUALIZACION_MEDIDA">FECHA DE INICIO DE LA MEDIDA DEFINITIVA<span class="required"></span></label>
            <input class="form-control" id="FECHA_ACTUALIZACION_MEDIDA" name="FECHA_ACTUALIZACION_MEDIDA" placeholder=""  type="date">
          </div>
        </div>

        <div class="row">
          <div class="row">
            <hr class="mb-4">
          </div>
          <div class="alert alert-info">
            <h3 style="text-align:center">ESTATUS DE LA MEDIDA</h3>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="ESTATUS_MEDIDA">ESTATUS DE LA MEDIDA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="ESTATUS_MEDIDA" required="" name="ESTATUS_MEDIDA" onchange="fecha_ejecutada(this)">
              <option disabled selected value>SELECCIONE UN ESTATUS</option>
              <option value="EN EJECUCION">EN EJECUCIÓN</option>
              <option value="EJECUTADA">EJECUTADA</option>
              <option value="CANCELADA">CANCELADA</option>
              </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="MUNICIPIO_EJECUCION" style="display:none;">
            <label for="MUNIPIO_EJECUCION_MEDIDA">MUNICIPIO DE EJECUCIÓN DE LA MEDIDA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="MUNIPIO_EJECUCION_MEDIDA" name="MUNIPIO_EJECUCION_MEDIDA">
              <option disabled selected value>SELECCIONE EL MUNICIPIO</option>
              <?php
              $municipio = "SELECT * FROM municipios";
              $answermun = $mysqli->query($municipio);
              while($municipios = $answermun->fetch_assoc()){
               echo "<option value='".$municipios['nombre']."'>".$municipios['nombre']."</option>";
              }
              ?>
            </select>
          </div>

              <div class="col-md-6 mb-3 validar" id="fech_inicio" style="display:none;">
                <label for="FECH_INICIO">FECHA DE INICIO<span class="required"></span></label>
                <input class="form-control" id="FECH_INICIO" name="FECH_INICIO" placeholder="" readonly type="date">
              </div>

              <div class="col-md-6 mb-3 validar" id="ejecucion_cancelacion" style="display:none;">
                <label for="FECHA_TERMINO" id="FECHA_TERMINO" style="display:none;">FECHA DE EJECUCIÓN<span class="required"></span></label>
                <label for="FECHA_CANCEL" id="FECHA_CANCEL" style="display:none;">FECHA DE CANCELACIÓN<span class="required"></span></label>
                <input class="form-control" id="FECHA_DE_EJECUCION" name="FECHA_DE_EJECUCION" placeholder="" type="date">
              </div>


              <div class="col-md-6 mb-3 validar" id="MOTIVO" style="display:none;">
                <label for="MOTIVO_CANCEL">MOTIVO DE CANCELACIÓN<span class="required"></span></label>
                <input class="form-control" id="MOTIVO_CANCEL" name="MOTIVO_CANCEL" placeholder="" type="text">
              </div>
        </div>
              <div class="row" id="DIV_CONCLUSION_CANCELACION" style="display:none;">
                <div class="row">
                  <hr class="mb-4">
                </div>
                <div class="alert alert-info">
                  <h3 style="text-align:center">CONCLUSIÓN / CANCELACIÓN DE LA MEDIDA</h3>
                </div>

                <div class="col-md-6 mb-3 validar">
                  <label for="CONCLUSION_CANCELACION">CONCLUSIÓN</label>
                  <select class="form-select form-select-lg" name="CONCLUSION_CANCELACION" onChange="open2art35(this)">
                    <option disabled selected value="">SELECCIONE UNA OPCIÓN</option>
                    <option value="CONCLUSION">CONCLUSIÓN</option>
                    <option value="NO APLICA">NO APLICA</option>
                  </select>
                </div>

                <div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35" style="display:none;">
                  <label for="CONCLUSION_ART35">CONCLUSIÓN DEL ARTICULO 35</label>
                  <select class="form-select form-select-lg" name="CONCLUSION_ART35" onChange="otherart35(this)">
                    <option disabled selected value="">SELECCIONE UNA OPCIÓN</option>
                    <?php
                    $art35 = "SELECT * FROM conclusionart35";
                    $answerart35 = $mysqli->query($art35);
                    while($art35s = $answerart35->fetch_assoc()){
                      echo "<option value='".$art35s['nombre']."'>".$art35s['nombre']."</option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="col-md-6 mb-3 validar" id="OTHERART35" style="display:none;">
                  <label for="OTHER_ART35">ESPECIFIQUE</label>
                  <input class="form-control" id="OTHER_ART35" name="OTHER_ART35" placeholder="" value="" type="text">
                </div>



              </div>




              <div class="row">
                <div class="row">
                </div>
                <div class="col-md-6 mb-3 validar">
                </div>
              </div>

              <div class="row">
                <div class="row">

                  <hr class="mb-4">
                </div>
                <div class="alert alert-info">
                  <h3 style="text-align:center">COMENTARIOS</h3>
                </div>

                <textarea name="COMENTARIO" id="COMENTARIO" rows="8" cols="80" placeholder="Escribe tus comentarios" maxlength="300"></textarea>

              </div>

              <div class="row">
                <div>
                    <br>
                    <br>
                		<button style="display: block; margin: 0 auto;" class="btn btn-success" id="enter" type="submit">GUARDAR</button>
                </div>

              </div>
        </div>
      </form>
    </div>
    </article>
  </div>
</div>
  </div>
</div>
<div class="contenedor">
<a href="../administrador/detalles_medidas.php?folio=<?=$id_persona_med?>" class="btn-flotante">CANCELAR</a>
</div>
<script type="text/javascript">
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
if(dd<10){
      dd='0'+dd
  }
  if(mm<10){
      mm='0'+mm
  }
today = yyyy+'-'+mm+'-'+dd;

document.getElementById("FECHA_ACTUALIZACION_MEDIDA").setAttribute("max", today);
document.getElementById("INICIO_EJECUCION_MEDIDA").setAttribute("max", today);
document.getElementById("FECHA_DE_EJECUCION").setAttribute("max", today);

</script>
<script type="text/javascript">
window.onload = function(){
  var fecha = new Date();
  var mes = fecha.getMonth()+1;
  var dia = fecha.getDate();
  var ano = fecha.getFullYear();
  if(dia<10)
    dia='0'+dia;
  if(mes<10)
    mes='0'+mes
  document.getElementById('FECHA_CAPTURA').value=dia+"-"+mes+"-"+ano;
}
</script>

<script type="text/javascript">

    var fechaInicio = document.getElementById('INICIO_EJECUCION_MEDIDA');
    var fechaInicioIngresada;

    var fechaDefinitiva = document.getElementById('FECHA_ACTUALIZACION_MEDIDA');
    var fechaDefinitivaIngresada;

    fechaInicio.addEventListener('change', obtenerFechaInicio);
    fechaDefinitiva.addEventListener('change', obtenerFechaDefinitiva);

    function obtenerFechaInicio(e) {
      fechaInicioIngresada = e.target.value;
      if (fechaInicioIngresada < fechaDefinitivaIngresada ||  fechaDefinitivaIngresada == null || fechaDefinitivaIngresada == ""){
      document.getElementById("FECH_INICIO").value = fechaInicioIngresada;
      }
      else {
      document.getElementById("FECH_INICIO").value = fechaDefinitivaIngresada;
      }
    }

    function obtenerFechaDefinitiva(e) {
      fechaDefinitivaIngresada = e.target.value;
      if (fechaInicioIngresada < fechaDefinitivaIngresada || fechaDefinitivaIngresada == null || fechaDefinitivaIngresada == ""){
      document.getElementById("FECH_INICIO").value = fechaInicioIngresada;
      }
      else {
      document.getElementById("FECH_INICIO").value = fechaDefinitivaIngresada;
      }
    }
</script>
</body>
</html>
