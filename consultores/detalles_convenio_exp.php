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

$id_analisis = $_GET['id'];
// echo $folioexpediente;
$consulta = "SELECT * FROM evaluacion_expediente WHERE id_analisis = '$id_analisis'";
$res_consulta = $mysqli->query($consulta);
$fila_consulta = $res_consulta->fetch_assoc();
// echo $fila_consulta['id'];

$fol_exp = $_GET['id'];
$sql = "SELECT * FROM expediente WHERE fol_exp = '$fol_exp'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);


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
  <link rel="stylesheet" href="../css/main2.css">
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
            <form class="container well form-horizontal" enctype= "multipart/form-data">
              <div class="row">
                <div class="secciones form-horizontal sticky breadcrumb flat">
                  <a href="../consultores/admin.php">REGISTROS</a>
                  <a href="../consultores/detalles_expediente.php?folio=<?=$fila_consulta['folioexpediente']?>">EXPEDIENTE</a>
                  <a href="../consultores/detalles_seguimiento.php?folio=<?=$fila_consulta['folioexpediente']?>">SEGUIMIENTO</a>
                  <a class="actived">DETALLE DE LA EVALUACIÓN</a>
                </div>
                <div class="row">
                  <hr class="mb-4">
                </div>
                <div class="alert div-title">
                  <h3 style="text-align:center">EVALUACIÓN DEL SEGUIMIENTO</h3>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label>FOLIO DEL EXPEDIENTE</label>
                  <input type="text" name="nombres" id="name" class="form-control" value="<?php echo $fila_consulta['folioexpediente']; ?>" readonly>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3 validar ">
                    <label for="analisis_m">ANÁLISIS MULTIDISCIPLINARIO</label>
                    <select disabled class="form-select form-select-lg" name="analisis_m">
                      <option style="visibility: hidden" value="<?php echo $fila_consulta['analisis']; ?>"><?php echo $fila_consulta['analisis']; ?></option>
                      <option value="ESTUDIO TECNICO">1.- ESTUDIO TECNICO</option>
                      <option value="ACUERDO DE CANCELACION">2.- ACUERDO DE CANCELACION</option>
                      <option value="ACUERDO DE CONCLUSION">3.- ACUERDO DE CONCLUSION</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3 validar ">
                    <label for="fecha_autorizacion">FECHA DE AUTORIZACIÓN DEL ANÁLISIS MULTIDISCIPLINARIO</label>
                    <input disabled class="form-control" type="date" name="fecha_auto" value="<?php echo $fila_consulta['fecha_aut']; ?>" required>
                  </div>
                  <div class="col-md-6 mb-3 validar ">
                    <label for="id_analisis">ID DEL ANÁLSIS MULTIDISCIPLINARIO</label>
                    <input disabled class="form-control" type="text" name="id_analisis" value="<?php echo $fila_consulta['id_analisis']; ?>" required>
                  </div>
                  <div class="col-md-6 mb-3 validar ">
                    <label for="tipo_convenio">TIPO DE CONVENIO</label>
                    <select disabled class="form-select form-select-lg" name="tipo_convenio">
                      <option style="visibility: hidden" value="<?php echo $fila_consulta['tipo_convenio']; ?>"><?php echo $fila_consulta['tipo_convenio']; ?></option>
                      <option value="CONVENIO DE ADHESIÓN">1.- CONVENIO DE ADHESIÓN</option>
                      <option value="CONVENIO MODIFICATORIO">2.- CONVENIO MODIFICATORIO</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3 validar ">
                    <label for="fecha_firma">FECHA DE LA FIRMA DEL CONVENIO</label>
                    <input disabled class="form-control" type="date" name="fecha_firma" id="fecha_firma" value="<?php echo $fila_consulta['fecha_firma']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label>FECHA DE INICIO DEL CONVENIO</label>
                    <input disabled class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" value="<?php echo $fila_consulta['fecha_inicio']; ?>">
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="fecha_termino">FECHA DE TÉRMINO DEL CONVENIO</label>
                    <input class="form-control" type="date" name="fecha_termino" value="<?php echo $fila_consulta['fecha_vigencia']; ?>" disabled>
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label>VIGENCIA DEL CONVENIO</label>
                    <input disabled class="form-control" type="text" name="vigencia" id="vigencia" value="<?php echo $fila_consulta['vigencia']; ?>" placeholder="dias" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label for="id_convenio">TOTAL DE CONVENIOS FIRMADOS</label>
                    <input disabled class="form-control" type="text" name="id_convenio" value="<?php echo $fila_consulta['total_convenios']; ?>" maxlength="2" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="row">
                  <hr class="mb-4">
                </div>
                <div class="alert div-title">
                  <h3 style="text-align:center">OBSERVACIONES</h3>
                </div>
                  <label for="observaciones">OBSERVACIONES</label>
                  <textarea disabled name="observaciones" rows="8" cols="238" placeholder="OBSERVACIONES"><?php echo $fila_consulta['obseervaciones']; ?></textarea>
              </div>
              <div class="row">
                <div>
                    <br>
                    <br>

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
<a href="../consultores/detalles_seguimiento.php?folio=<?=$fila_consulta['folioexpediente']?>" class="btn-flotante">REGRESAR</a>
</div>
</body>
</html>

<script type="text/javascript">

</script>
