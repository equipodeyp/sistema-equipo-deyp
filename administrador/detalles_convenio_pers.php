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

$id_unico = $_GET['id'];
// echo $id_unico;
$consulta = "SELECT * FROM evaluacion_persona WHERE id = '$id_unico'";
$res_consulta = $mysqli->query($consulta);
$fila_consulta = $res_consulta->fetch_assoc();
$id_pe = $fila_consulta['id_unico'];
// echo $id_pe;

$consul = "SELECT * FROM datospersonales WHERE identificador = '$id_pe'";
$res_consulta_uno = $mysqli->query($consul);
$fila_consulta_uno = $res_consulta_uno->fetch_assoc();
$id_persona = $fila_consulta_uno ['id'];
// echo $id_persona; //1
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
      <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
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
            <form class="container well form-horizontal" action="../administrador/actualizar_detalles_persona.php?id=<?php echo $id_unico; ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <!-- menu de navegacion de la parte de arriba -->
              <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="../administrador/admin.php">REGISTROS</a>
              <a href="../administrador/detalles_expediente.php?id=<?=$fila_consulta_uno['folioexpediente']?>">EXPEDIENTE</a>
              <a href="../administrador/detalles_persona.php?folio=<?=$fila_consulta_uno['id']?>">PERSONA</a>
              <a href="../administrador/seguimiento_persona.php?folio=<?=$fila_consulta_uno['id']?>">SEGUIMIENTO</a>
              <a class="actived">EVALUACIÓN</a>
            </div>
                <div class="row">
                  <hr class="mb-4">
                </div>
                <div class="alert alert-info">
                  <h3 style="text-align:center">EVALUACIÓN DEL SEGUIMIENTO</h3>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label>FOLIO DEL EXPEDIENTE</label>
                  <input readonly type="text" name="nombres" id="name" class="form-control" value="<?php echo $fila_consulta['folioexpediente']; ?>">
                </div>
                <div class="col-md-6 mb-3 validar ">
                  <label>ID ÚNICO DE LA PERSONA </label>
                  <input readonly type="text" name="nombre" id="name" class="form-control" value="<?php echo $fila_consulta['id_unico']; ?>">
                </div>

                  <div class="col-md-6 mb-3 validar ">
                    <label for="analisis_m">ANÁLISIS MULTIDISCIPLINARIO</label>
                    <select autocomplete="off" required id="ANALISIS_MULT" class="form-select form-select-lg" name="analisis_m">
                      <option style="visibility: hidden" value="<?php echo $fila_consulta['analisis']; ?>"><?php echo $fila_consulta['analisis']; ?></option>
                      <option value="ESTUDIO TECNICO">1.- ESTUDIO TECNICO</option>
                      <option value="ACUERDO DE CANCELACION">2.- ACUERDO DE CANCELACION</option>
                      <option value="ACUERDO DE CONCLUSION">3.- ACUERDO DE CONCLUSION</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3 validar ">
                    <label id="LABEL_FECHA_AUTORIZACION" for="fecha_autorizacion">FECHA DE AUTORIZACIÓN ANÁLSIIS MULTIDISCIPLINARIO</label>
                    <input autocomplete="off" id="INPUT_FECHA_AUTORIZACION" class="form-control" type="date" name="fecha_auto" value="<?php echo $fila_consulta['fecha_aut']; ?>" required>
                  </div>
                  <div class="col-md-6 mb-3 validar ">
                    <label id="LABEL_ID_ANALISIS" for="id_analisis">ID DEL ANÁLSIIS MULTIDISCIPLINARIO</label>
                    <input autocomplete="off" id="INPUT_ID_ANALISIS" class="form-control" type="text" name="id_analisis" value="<?php echo $fila_consulta['id_analisis']; ?>" required>
                  </div>
                  <div class="col-md-6 mb-3 validar ">
                    <label id="LABEL_TIPO_CONVENIO" for="tipo_convenio">TIPO DE CONVENIO</label>
                    <select autocomplete="off" id="SELECT_TIPO_CONVENIO" class="form-select form-select-lg" name="tipo_convenio">
                      <option style="visibility: hidden" value="<?php echo $fila_consulta['tipo_convenio']; ?>"><?php echo $fila_consulta['tipo_convenio']; ?></option>
                      <option value="CONVENIO DE ADHESIÓN">1.- CONVENIO DE ADHESIÓN</option>
                      <option value="CONVENIO MODIFICATORIO">2.- CONVENIO MODIFICATORIO</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3 validar ">
                    <label id="LABEL_FECHA_FIRMA" for="fecha_firma">FECHA DE LA FIRMA DEL CONVENIO</label>
                    <input autocomplete="off" id="INPUT_FECHA_FIRMA" class="form-control" type="date" name="fecha_firma" value="<?php echo $fila_consulta['fecha_firma']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_FECHA_INICIO">FECHA DE INICIO DEL CONVENIO</label>
                    <input autocomplete="off" id="INPUT_FECHA_INICIO" class="form-control" type="date" name="fecha_inicio" value="<?php echo $fila_consulta['fecha_inicio']; ?>">
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_VIGENCIA">VIGENCIA DEL CONVENIO</label>
                    <input autocomplete="off" id="INPUT_VIGENCIA" class="form-control" type="text" name="vigencia" value="<?php echo $fila_consulta['vigencia']; ?>" placeholder="dias" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_FECHA_TERMINO" for="fecha_termino">FECHA DE TÉRMINO DEL CONVENIO</label>
                    <input autocomplete="off" id="INPUT_FECHA_TERMINO" class="form-control" type="date" name="fecha_termino" value="<?php echo $fila_consulta['fecha_vigencia']; ?>">
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_ID_CONVENIO" for="id_convenio">ID DEL CONVENIO</label>
                    <input autocomplete="off" id="INPUT_ID_CONVENIO" class="form-control" type="text" name="id_convenio" value="<?php echo $fila_consulta['id_convenio']; ?>">
                  </div>


              </div>

              <div id="ROW_OBSERVACIONES" class="row">
                <div class="row">
                  <hr class="mb-4">
                </div>
                <div class="alert alert-info">
                  <h3 style="text-align:center">OBSERVACIONES</h3>
                </div>
                  <label id="LABEL_OBSERVACIONES" for="observaciones">OBSERVACIONES</label>
                  <textarea id="TEXTAREA_OBSERVACIONES" name="observaciones" rows="8" cols="238" placeholder="OBSERVACIONES"><?php echo $fila_consulta['observaciones']; ?></textarea>
              </div>

              <div id="BOTON_ACTUALIZAR" class="row">
                  <div>
                      <br>
                      <br>
                  		<button style="display: block; margin: 0 auto;" class="btn btn-success" id="enter" type="submit">ACTUALIZAR</button>
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
<a href="../administrador/seguimiento_persona.php?folio=<?=$fila_consulta_uno['id']?>" class="btn-flotante">REGRESAR</a>
</div>


<script type="text/javascript">


var respuestaAlalisisMultidisiplinario = document.getElementById('ANALISIS_MULT').value;

    function ocultarInfo() {
      if(respuestaAlalisisMultidisiplinario == "" || respuestaAlalisisMultidisiplinario == null){
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "none";
        document.getElementById('INPUT_FECHA_AUTORIZACION').style.display = "none";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "none";
        document.getElementById('INPUT_ID_ANALISIS').style.display = "none";
        document.getElementById('LABEL_TIPO_CONVENIO').style.display = "none";
        document.getElementById('SELECT_TIPO_CONVENIO').style.display = "none";
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


        document.getElementById('LABEL_OBSERVACIONES').style.display = "none";
        document.getElementById('TEXTAREA_OBSERVACIONES').style.display = "none";
        document.getElementById('ROW_OBSERVACIONES').style.display = "none";
        document.getElementById('BOTON_ACTUALIZAR').style.display = "none";


      }

      if (respuestaAlalisisMultidisiplinario == "ESTUDIO TECNICO") {

        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('INPUT_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('INPUT_ID_ANALISIS').style.display = "";
        document.getElementById('LABEL_TIPO_CONVENIO').style.display = "";
        document.getElementById('SELECT_TIPO_CONVENIO').style.display = "";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "";
        document.getElementById('INPUT_FECHA_FIRMA').style.display = "";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "";
        document.getElementById('INPUT_FECHA_INICIO').style.display = "";
        document.getElementById('LABEL_VIGENCIA').style.display = "";
        document.getElementById('INPUT_VIGENCIA').style.display = "";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "";
        document.getElementById('INPUT_FECHA_TERMINO').style.display = "";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "";
        document.getElementById('INPUT_ID_CONVENIO').style.display = "";


        document.getElementById('LABEL_OBSERVACIONES').style.display = "";
        document.getElementById('TEXTAREA_OBSERVACIONES').style.display = "";
        document.getElementById('ROW_OBSERVACIONES').style.display = "";
        document.getElementById('BOTON_ACTUALIZAR').style.display = "";



      }
      else if (respuestaAlalisisMultidisiplinario == "ACUERDO DE CONCLUSION" || respuestaAlalisisMultidisiplinario == "ACUERDO DE CANCELACION") {
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('INPUT_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('INPUT_ID_ANALISIS').style.display = "";
        document.getElementById('LABEL_TIPO_CONVENIO').style.display = "none";
        document.getElementById('SELECT_TIPO_CONVENIO').style.display = "none";
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


        document.getElementById('LABEL_OBSERVACIONES').style.display = "";
        document.getElementById('TEXTAREA_OBSERVACIONES').style.display = "";
        document.getElementById('ROW_OBSERVACIONES').style.display = "";
        document.getElementById('BOTON_ACTUALIZAR').style.display = "";

      }

    }
ocultarInfo();


var analisisMultidisiplinario = document.getElementById('ANALISIS_MULT');
var respuestaAlalisisMultidisiplinario = '';


analisisMultidisiplinario.addEventListener('change', obtenerInfo);


    function obtenerInfo(e) {
      respuestaAlalisisMultidisiplinario = e.target.value;


      if (respuestaAlalisisMultidisiplinario == "ACUERDO DE CONCLUSION" || respuestaAlalisisMultidisiplinario == "ACUERDO DE CANCELACION") {

        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('INPUT_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('INPUT_ID_ANALISIS').style.display = "";
        document.getElementById('LABEL_TIPO_CONVENIO').style.display = "none";
        document.getElementById('SELECT_TIPO_CONVENIO').style.display = "none";
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


        document.getElementById('LABEL_OBSERVACIONES').style.display = "";
        document.getElementById('TEXTAREA_OBSERVACIONES').style.display = "";
        document.getElementById('ROW_OBSERVACIONES').style.display = "";
        document.getElementById('BOTON_ACTUALIZAR').style.display = "";

        document.getElementById('LABEL_FECHA_AUTORIZACION').value = "";
        document.getElementById('INPUT_FECHA_AUTORIZACION').value = "";
        document.getElementById('LABEL_ID_ANALISIS').value = "";
        document.getElementById('INPUT_ID_ANALISIS').value = "";
        document.getElementById('LABEL_TIPO_CONVENIO').value = "";
        document.getElementById('SELECT_TIPO_CONVENIO').value = "";
        document.getElementById('LABEL_FECHA_FIRMA').value = "";
        document.getElementById('INPUT_FECHA_FIRMA').value = "";
        document.getElementById('LABEL_FECHA_INICIO').value = "";
        document.getElementById('INPUT_FECHA_INICIO').value = "";
        document.getElementById('LABEL_VIGENCIA').value = "";
        document.getElementById('INPUT_VIGENCIA').value = "";
        document.getElementById('LABEL_FECHA_TERMINO').value = "";
        document.getElementById('INPUT_FECHA_TERMINO').value = "";
        document.getElementById('LABEL_ID_CONVENIO').value = "";
        document.getElementById('INPUT_ID_CONVENIO').value = "";
        document.getElementById('TEXTAREA_OBSERVACIONES').value = "";


      }
      else if (respuestaAlalisisMultidisiplinario == "ESTUDIO TECNICO"){

        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('INPUT_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('INPUT_ID_ANALISIS').style.display = "";
        document.getElementById('LABEL_TIPO_CONVENIO').style.display = "";
        document.getElementById('SELECT_TIPO_CONVENIO').style.display = "";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "";
        document.getElementById('INPUT_FECHA_FIRMA').style.display = "";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "";
        document.getElementById('INPUT_FECHA_INICIO').style.display = "";
        document.getElementById('LABEL_VIGENCIA').style.display = "";
        document.getElementById('INPUT_VIGENCIA').style.display = "";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "";
        document.getElementById('INPUT_FECHA_TERMINO').style.display = "";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "";
        document.getElementById('INPUT_ID_CONVENIO').style.display = "";


        document.getElementById('LABEL_OBSERVACIONES').style.display = "";
        document.getElementById('TEXTAREA_OBSERVACIONES').style.display = "";
        document.getElementById('ROW_OBSERVACIONES').style.display = "";
        document.getElementById('BOTON_ACTUALIZAR').style.display = "";

        document.getElementById('LABEL_FECHA_AUTORIZACION').value = "";
        document.getElementById('INPUT_FECHA_AUTORIZACION').value = "";
        document.getElementById('LABEL_ID_ANALISIS').value = "";
        document.getElementById('INPUT_ID_ANALISIS').value = "";
        document.getElementById('LABEL_TIPO_CONVENIO').value = "";
        document.getElementById('SELECT_TIPO_CONVENIO').value = "";
        document.getElementById('LABEL_FECHA_FIRMA').value = "";
        document.getElementById('INPUT_FECHA_FIRMA').value = "";
        document.getElementById('LABEL_FECHA_INICIO').value = "";
        document.getElementById('INPUT_FECHA_INICIO').value = "";
        document.getElementById('LABEL_VIGENCIA').value = "";
        document.getElementById('INPUT_VIGENCIA').value = "";
        document.getElementById('LABEL_FECHA_TERMINO').value = "";
        document.getElementById('INPUT_FECHA_TERMINO').value = "";
        document.getElementById('LABEL_ID_CONVENIO').value = "";
        document.getElementById('INPUT_ID_CONVENIO').value = "";
        document.getElementById('TEXTAREA_OBSERVACIONES').value = "";

      }

    }

</script>
</body>
</html>
