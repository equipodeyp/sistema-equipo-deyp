<?php
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}

$id = $_GET['id'];
// echo $id;
// echo $folioexpediente;
$consulta = "SELECT * FROM evaluacion_persona WHERE id = '$id'";
$res_consulta = $mysqli->query($consulta);
$fila_consulta = $res_consulta->fetch_assoc();

$id_unico = $fila_consulta['id_unico'];

$consul = "SELECT * FROM datospersonales WHERE identificador = '$id_unico'";
$res_consulta_uno = $mysqli->query($consul);
$fila_consulta_uno = $res_consulta_uno->fetch_assoc();
$id_persona = $fila_consulta_uno ['id'];
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
  <link rel="stylesheet" href="../css/main2.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- <script src="../js/expediente.js"></script> -->
  <!-- <script src="../js/solicitud.js"></script> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="../css/cli.css"> -->
  <!-- <link rel="stylesheet" href="../css/registrosolicitud1.css"> -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- <script src="JQuery.js"></script> -->
  <!-- <script src="../js/Javascript.js"></script> -->
  <!-- <script src="../js/validar_campos.js"></script> -->
  <!-- <script src="../js/verificar_camposm1.js"></script> -->
  <!-- <script src="../js/mascara2campos.js"></script> -->
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
      $user = $row_user['usuario'];

			if ($genero=='mujer') {
				echo "<img src='../image/mujerup.png' width='100' height='100'>";
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
				   	<a style="text-align:center" class='user-nombre' href='create_ticket.php?folio=<?php echo $fila_consulta['folioexpediente']; ?>'><button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
          </ul>
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
            <form class="container well form-horizontal" method="POST" action="actualizar_convenio_persona.php?id=<?php echo $id; ?>" enctype= "multipart/form-data">
              <div class="row">
                <div class="secciones form-horizontal sticky breadcrumb flat">
                  <a href="../subdireccion_de_estadistica_y_preregistro/menu.php">REGISTROS</a>
                  <a href="../subdireccion_de_estadistica_y_preregistro/detalles_expediente.php?id=<?=$fila_consulta['folioexpediente']?>">EXPEDIENTE</a>
                  <a href="../subdireccion_de_estadistica_y_preregistro/detalles_persona.php?folio=<?=$fila_consulta_uno['id']?>">PERSONA</a>
                  <a class="actived">DETALLES DE EVALUACION</a>
                </div>
                <div class="row">
                  <hr class="mb-4">
                </div>
                <div class="alert div-title">
                  <h3 style="text-align:center">EVALUACION DEL SEGUIMIENTO</h3>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label>FOLIO DEL EXPEDIENTE DE PROTECCIÓN</label>
                  <input type="text" name="nombres" id="name" class="form-control" value="<?php echo $fila_consulta['folioexpediente']; ?>" readonly>
                </div>
                <div class="col-md-6 mb-3 validar ">
                  <label>ID PERSONA </label>
                  <input type="text" name="nombre" id="name" class="form-control" value="<?php echo $fila_consulta['id_unico']; ?>" readonly>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3 validar ">
                    <label for="analisis_m">ANALISIS MULTIDISCIPLINARIO</label>
                    <select id="ANALISIS_MULT" class="form-select form-select-lg" name="analisis_m">
                      <option style="visibility: hidden" value="<?php echo $fila_consulta['analisis']; ?>"><?php echo $fila_consulta['analisis']; ?></option>
                      <option value="ESTUDIO TECNICO DE EVALUACION DE RIESGO">1.- ESTUDIO TECNICO DE EVALUACION DE RIESGO</option>
                      <option value="ESTUDIO TECNICO DE CANCELACION">2.- ESTUDIO TECNICO DE CANCELACION</option>
                      <option value="ESTUDIO TECNICO DE CONCLUSION">3.- ESTUDIO TECNICO DE CONCLUSION</option>
                      <option value="ESTUDIO TECNICO DE MODIFICACION">4.- ESTUDIO TECNICO DE MODIFICACION</option>
                      <option value="AUTORIZACION DEL TITULAR">5.- AUTORIZACION DEL TITULAR</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3 validar ">
                    <label id="LABEL_FECHA_AUTORIZACION" for="fecha_autorizacion">FECHA DE AUTORIZACIÓN ANÁLISIS MULTIDISCIPLINARIO</label>
                    <input id="INPUT_FECHA_AUTORIZACION" class="form-control" type="date" name="fecha_auto" value="<?php echo $fila_consulta['fecha_aut']; ?>" required>
                  </div>
                  <div class="col-md-6 mb-3 validar ">
                    <label id="LABEL_ID_ANALISIS" for="id_analisis">ID DEL ANÁLISIS MULTIDISCIPLINARIO</label>
                    <input id="INPUT_ID_ANALISIS" class="form-control" type="text" name="id_analisis" value="<?php echo $fila_consulta['id_analisis']; ?>" required>
                  </div>
                  <div class="col-md-6 mb-3 validar ">
                    <label id="LABEL_TIPO_CONVENIO" for="tipo_convenio">TIPO DE CONVENIO</label>
                    <select id="SELECT_TIPO_CONVENIO"  class="form-select form-select-lg" name="tipo_convenio">
                      <option style="visibility: hidden" value="<?php echo $fila_consulta['tipo_convenio']; ?>"><?php echo $fila_consulta['tipo_convenio']; ?></option>
                      <option value="CONVENIO DE ADHESIÓN">1.- CONVENIO DE ADHESIÓN</option>
                      <option value="CONVENIO MODIFICATORIO">2.- CONVENIO MODIFICATORIO</option>
                      <option value="NO APLICA">3.- NO APLICA</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3 validar ">
                    <label id="LABEL_FECHA_FIRMA" for="fecha_firma">FECHA DE LA FIRMA DEL CONVENIO</label>
                    <input id="INPUT_FECHA_FIRMA"  class="form-control" type="date" name="fecha_firma" value="<?php echo $fila_consulta['fecha_firma']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_FECHA_INICIO">FECHA DE INICIO DEL CONVENIO</label>
                    <input id="INPUT_FECHA_INICIO"  class="form-control" type="date" name="fecha_inicio" value="<?php echo $fila_consulta['fecha_inicio']; ?>">
                  </div>
                  <div class="col-md-6 mb-3 validar" id="convmodific">
                    <label id="LABEL_VIGENCIA">VIGENCIA DEL CONVENIO</label>
                    <input id="INPUT_VIGENCIA"  class="form-control" type="text" name="vigencia" value="<?php echo $fila_consulta['vigencia']; ?>" placeholder="dias" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_FECHA_TERMINO" for="fecha_termino">FECHA DE TÉRMINO DEL CONVENIO</label>
                    <input id="INPUT_FECHA_TERMINO"  readonly class="form-control" type="date" name="" value="<?php echo $fila_consulta['fecha_vigencia']; ?>" >
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_ID_CONVENIO" for="id_convenio">ID DEL CONVENIO</label>
                    <input id="INPUT_ID_CONVENIO"  class="form-control" type="text" name="id_convenio" value="<?php echo $fila_consulta['id_convenio']; ?>">
                  </div>
                </div>

              </div>

              <div id="row_observ" class="row">
                <div class="row">
                  <hr class="mb-4">
                </div>
                <div class="alert div-title">
                  <h3 style="text-align:center">OBSERVACIONES</h3>
                </div>
                  <label for="observaciones">OBSERVACIONES</label>
                  <textarea id="input_observaciones" name="observaciones" rows="8" cols="238" placeholder="OBSERVACIONES"><?php echo $fila_consulta['observaciones']; ?></textarea>
              </div>

              <div class="row">
                <div>
                  <br>
                    <button style="display: block; margin: 0 auto;" class="btn btn-success" id="enter" type="submit">ACTUALIZAR</button>
                </div>
            </form>
          </div>
        </article>
      </div>
    </div>
  </div>
</div>
<div class="contenedor">
<a href="../subdireccion_de_estadistica_y_preregistro/detalles_persona.php?folio=<?=$fila_consulta_uno['id']?>" class="btn-flotante">REGRESAR</a>
</div>
<script src="../js/evaluacion_individual.js" charset="utf-8"></script>
</body>
</html>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////descomentar una vez que se haiga actualizado todo -->
<!-- <script type="text/javascript">
  var vertipconv = document.getElementById('SELECT_TIPO_CONVENIO').value;
  function ocultipconv(){
    // console.log(vertipconv);
    if (vertipconv === "NO APLICA") {
      // console.log('error');
      document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
      document.getElementById('INPUT_FECHA_FIRMA').style.display = "none";
      document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
      document.getElementById('INPUT_FECHA_INICIO').style.display = "none";
      document.getElementById('LABEL_VIGENCIA').style.display = "none";
      document.getElementById('INPUT_VIGENCIA').style.display = "none";
      document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
      document.getElementById('INPUT_FECHA_TERMINO').style.display = "none";
      document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
      document.getElementById('INPUT_ID_CONVENIO').style.display = "none";
    }
  }
  ocultipconv();
</script>
<script type="text/javascript">
  var tipconv = document.getElementById('SELECT_TIPO_CONVENIO');
  var camtipconv = '';
  tipconv.addEventListener('change', obtcamtipconv);
    function obtcamtipconv(e){
      camtipconv = e.target.value;
      console.log(camtipconv);
      if (camtipconv === 'NO APLICA') {
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('INPUT_FECHA_FIRMA').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('INPUT_FECHA_INICIO').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('INPUT_VIGENCIA').style.display = "none";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
        document.getElementById('INPUT_ID_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('INPUT_FECHA_TERMINO').style.display = "none";
        document.getElementById('INPUT_FECHA_FIRMA').required = false;
        document.getElementById('INPUT_FECHA_INICIO').required = false;
        document.getElementById("INPUT_VIGENCIA").required = false;
        document.getElementById('INPUT_ID_CONVENIO').required = false;
        document.getElementById('INPUT_FECHA_FIRMA').value = "";
        document.getElementById('INPUT_FECHA_INICIO').value = "";
        document.getElementById("INPUT_VIGENCIA").value = "";
        document.getElementById('INPUT_ID_CONVENIO').value = "";
      }else if (camtipconv === 'CONVENIO DE ADHESIÓN') {
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "";
        document.getElementById('INPUT_FECHA_FIRMA').style.display = "";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "";
        document.getElementById('INPUT_FECHA_INICIO').style.display = "";
        document.getElementById('LABEL_VIGENCIA').style.display = "";
        document.getElementById('INPUT_VIGENCIA').style.display = "";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "";
        document.getElementById('INPUT_ID_CONVENIO').style.display = "";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "";
        document.getElementById('INPUT_FECHA_TERMINO').style.display = "";
        document.getElementById('INPUT_FECHA_FIRMA').required = true;
        document.getElementById('INPUT_FECHA_INICIO').required = true;
        document.getElementById("INPUT_VIGENCIA").required = true;
        document.getElementById('INPUT_ID_CONVENIO').required = true;
        document.getElementById('convmodific').style.display = "";
      }else if (camtipconv === 'CONVENIO MODIFICATORIO') {
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "";
        document.getElementById('INPUT_FECHA_FIRMA').style.display = "";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "";
        document.getElementById('INPUT_FECHA_INICIO').style.display = "";
        document.getElementById('LABEL_VIGENCIA').style.display = "";
        document.getElementById('INPUT_VIGENCIA').style.display = "";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "";
        document.getElementById('INPUT_ID_CONVENIO').style.display = "";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "";
        document.getElementById('INPUT_FECHA_TERMINO').style.display = "";
        document.getElementById('INPUT_FECHA_FIRMA').required = true;
        document.getElementById('INPUT_FECHA_INICIO').required = true;
        document.getElementById("INPUT_VIGENCIA").required = false;
        document.getElementById('INPUT_ID_CONVENIO').required = true;
        document.getElementById('convmodific').style.display = "none";
      }
    }
</script> -->
