<?php
/*require 'conexion.php';*/
// SELECT COUNT(*) FROM datospersonales WHERE folioexpediente = 'UPSIPPED/TOL/012/002/2021'
error_reporting(0);
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica = 1;
$_SESSION["verifica"] = $verifica;
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();

$query = "SELECT id_estado, estado FROM t_estado ORDER BY id_estado";
$resultado=$mysqli->query($query);

$query1 = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
$resultado1=$mysqli->query($query1);

$fol_exp = $_GET['folio'];
// echo $fol_exp;
$exp=" SELECT *FROM expediente WHERE fol_exp = '$fol_exp'";
$result_exp = $mysqli->query($exp);
$row_exp=$result_exp->fetch_assoc();
// echo ($fol_exp);

$qry = "select max(ID) As id from datospersonales";
$result = $mysqli->query($qry);
$row = $result->fetch_assoc();
$num_consecutivo =$row["id"];
// date_default_timezone_set("America/Mexico_City");
// $fecha = date('y/m/d H:i:sa');
$checkautoridad = "SELECT * FROM autoridad WHERE folioexpediente = '$fol_exp'";
$rescheckautoridad = $mysqli->query($checkautoridad);
$filacheckautoridad = $rescheckautoridad->fetch_assoc();
// if ($filacheckautoridad > 0) {
//   echo "existe un registro de autoridad";
// }else {
//   echo "no existe registro aun";
// }
// <!-- proceso penal -->
$checkproceso = "SELECT * FROM procesopenal WHERE folioexpediente = '$fol_exp'";
$rescheckproceso = $mysqli->query($checkproceso);
$filacheckproceso = $rescheckproceso->fetch_assoc();
// if ($filacheckproceso > 0) {
//   echo "existe registro previo en el proceso penal";
// }else {
//   echo "no existe ningun dato";
// }
// <!-- valoracion juridica -->
$checkvalorjuridica = "SELECT * FROM valoracionjuridica WHERE folioexpediente = '$fol_exp'";
$rescheckvalorjuridica = $mysqli->query($checkvalorjuridica);
$filavalorjuridica = $rescheckvalorjuridica->fetch_assoc();
// if ($filavalorjuridica > 0) {
//   echo "existe registro previo de valoracion juridica";
// }else {
//   echo "no existe ningun dato";
// }

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link href="../css/bootstrap.min.css" rel="stylesheet">
  		<link href="../css/bootstrap-theme.css" rel="stylesheet">
		  <script src="../js/bootstrap.min.js"></script>
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
      <script src="../js/jquery-3.1.1.min.js"></script>
  		<script src="../js/jquery.dataTables.min.js"></script>
  		<script src="../js/bootstrap.min.js"></script>
  		<script src="../js/jquery.dataTables.min.js"></script>
       <!-- barra de navegacion -->
      <link rel="stylesheet" href="../css/breadcrumb.css">
      <link rel="stylesheet" href="../css/expediente.css">
    	<link rel="stylesheet" href="../css/font-awesome.css">
    	<link rel="stylesheet" href="../css/cli.css">
      <link rel="stylesheet" href="../css/main2.css">
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script src="../js/expediente.js"></script>
      <script src="../js/solicitud.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="../css/cli.css">
<link rel="stylesheet" href="../css/main2.css">

<link rel="stylesheet" href="../css/registrosolicitud1.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <!-- <script src="JQuery.js"></script> -->
<script src="../js/validar_campos.js"></script>
<script src="../js/Javascript.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="../subdireccion_de_apoyo_tecnico_juridico/style/modal.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>

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
           <ul>
              <a style="text-align:center" class='user-nombre' href='create_ticket.php?folio=<?php echo $fol_exp; ?>'> <button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
              <!-- <a  href='create_ticket.php?folio=<?php echo $row_exp['fol_exp'];?>'><i class="fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span>Incidencia</span></a> -->
              <!-- <li class="menu-items"><a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio"><i class='fas fa-file-pdf  menu-nav--icon fa-fw'></i><span class="menu-items">Glosario</span></a></li> -->
              <!-- <li class="menu-items"><a href="#"><i class='fa-solid fa-magnifying-glass  menu-nav--icon fa-fw'></i><span class="menu-items">Busqueda</span></a></li> -->
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
  <!-- menu de navegacion de la parte de arriba -->
  <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="../administrador/admin.php">REGISTROS</a>
            <a href="../administrador/detalles_expediente.php?folio=<?php echo $fol_exp; ?>">EXPEDIENTE</a>
            <a class="actived">REGISTRO PERSONA</a>
  </div>

  <p><span><label ></label> * CAMPOS OBLIGATORIOS</span></p>
    <div class="container">
      <form class="container well form-horizontal" id="myform" method="POST" action="../administrador/guardar_persona.php?folio=<?php echo $fol_exp; ?>" enctype= "multipart/form-data">
        <div class="row">
          <div class="alert div-title">
            <h3 style="text-align:center">INFORMACIÓN GENERAL DEL EXPEDIENTE DE PROTECCIÓN</h3>
          </div>
          <div class="col-md-6 mb-3 validar">
                <label for="SIGLAS DE LA UNIDAD">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
                <input class="form-control" id="NUM_EXPEDIENTE" name="NUM_EXPEDIENTE" placeholder="" type="text" value="<?php echo $row_exp['fol_exp'];?>" maxlength="50" readonly>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="SIGLAS DE LA UNIDAD">ID PERSONA<span ></span></label>
            <input class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" value="" maxlength="50" readonly>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_CAPTURA" >FECHA DE REGISTRO DE LA PERSONA PROPUESTA <span class="required"></span></label>
            <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" type="text" value="" readonly>
          </div>
          <div class="alert div-title">
            <h3 style="text-align:center">AUTORIDAD QUE INGRESA LA SOLICITUD DE INCORPORACIÓN AL PROGRAMA</h3>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="ID_SOLICITUD" class="is-required">ID SOLICITUD<span ></span></label>
            <input autocomplete="off" onkeyup="validarfrm()" class="verific form-control" id="ID_SOLICITUD" name="ID_SOLICITUD" placeholder="" required type="text" value="<?php echo $filacheckautoridad['idsolicitud']; ?>">
          </div>

            <div class="col-md-6 mb-3 validar">
              <label for="FECHA_SOLICITUD" class="is-required">FECHA DE SOLICITUD<span class="required"></span></label>
              <input onkeyup="validarfrm()" class="verific form-control" id="FECHA_SOLICITUD" name="FECHA_SOLICITUD" value="<?php echo $filacheckautoridad['fechasolicitud']; ?>" type="date" value="" required>
            </div>

          <div class="col-md-6 mb-3 validar">
            <label for="NOMBRE_AUTORIDAD" class="is-required">NOMBRE DE LA AUTORIDAD<span class="required"></span></label>
            <input list="datalistOptions" onkeyup="validarfrm()" class="verific form-control" id="NOMBRE_AUTORIDAD" name="NOMBRE_AUTORIDAD" onChange="openOther(this)" placeholder="SELECCIONE UNA OPCION" value="<?php echo $filacheckautoridad['nombreautoridad']; ?>" required>
            <datalist id="datalistOptions">
            <?php
            $autoridad = "SELECT * FROM nombreautoridad";
            $answer = $mysqli->query($autoridad);
            while($autoridades = $answer->fetch_assoc()){
            echo "<option value='".$autoridades['nombre']."'>".$autoridades['nombre']."</option>";
            }
            ?>
            </datalist>
          </div>

          <div class="col-md-6 mb-3 validar" id="other" style="display:none;">
            <label for="OTHER_AUTORIDAD" class="is-required">ESPECIFIQUE</label>
            <input autocomplete="off" class="form-control" id="OTHER_AUTORIDAD" name="OTHER_AUTORIDAD" placeholder="" value="<?php echo $filacheckautoridad['otraautoridad']; ?>" type="text">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="NOMBRE_SERVIDOR" class="is-required">NOMBRE DEL SERVIDOR PÚBLICO<span class="required"></span></label>
            <input autocomplete="off" onkeyup="validarfrm()" class="verific form-control" id="NOMBRE_SERVIDOR" name="NOMBRE_SERVIDOR" value="<?php echo $filacheckautoridad['nombreservidor']; ?>" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="PATERNO_SERVIDOR" class="is-required">APELLIDO PATERNO DEL SERVIDOR PÚBLICO<span class="required"></span></label>
            <input autocomplete="off" onkeyup="validarfrm()" class="verific form-control" id="PATERNO_SERVIDOR" name="PATERNO_SERVIDOR" value="<?php echo $filacheckautoridad['apellidopaterno']; ?>" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="MATERNO_SERVIDOR" class="is-required">APELLIDO MATERNO DEL SERVIDOR PÚBLICO<span class="required"></span></label>
            <input autocomplete="off" onkeyup="validarfrm()" class="verific form-control" id="MATERNO_SERVIDOR" name="MATERNO_SERVIDOR" value="<?php echo $filacheckautoridad['apellidomaterno']; ?>" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CARGO_SERVIDOR" class="is-required">CARGO DEL SERVIDOR PÚBLICO<span class="required"></span></label>
            <input autocomplete="off" onkeyup="validarfrm()" class="verific form-control" id="CARGO_SERVIDOR" name="CARGO_SERVIDOR" value="<?php echo $filacheckautoridad['cargoservidor']; ?>" type="text" required>
          </div>

        </div>
        <div class="row" style="display:none;" id="persona_p">
          <div class="row">
            <hr class="mb-4">
          </div>

            <div class="alert div-title">
              <h3 style="text-align:center">DATOS DE LA PERSONA PROPUESTA</h3>
            </div>

            <div>
            <h6 for="GENERAR_ID">En este apartado deberás generar un identificador clave, este será asignado a la persona propuesta. Pulsa en el botón "GENERAR ID" para crear el identificador clave automáticamente. Es importante que antes de generar el identificador clave te cersiores de que la información se encuentre introducida correctamente. Una vez generado el identificador clave no podrás modificar los campos de Nombre y Apellidos de la persona propuesta.<br><br> <span class="required"></span></h6>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="NOMBRE_PERSONA" class="is-required">NOMBRE (S) <span class="required"></span></label>
              <input autocomplete="off"  onkeydown="validardiv2()" onkeyup="validarNombrePersona(this.form)" class="verificdiv2 form-control" id="NOMBRE_PERSONA" name="NOMBRE_PERSONA" placeholder=""  type="text" value="" required>
              <!-- <input autocomplete="off" class="form-control" id="NOMBRE_PERSONA" name="NOMBRE_PERSONA" placeholder=""  type="text" value="" required> -->
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="PATERNO_PERSONA" class="is-required">APELLIDO PATERNO <span class="required"></span></label>
              <input autocomplete="off"  onkeydown="validardiv2()"  onkeyup="validarApellidoPersona(this.form)" disabled="disabled" class="verificdiv2 form-control" id="PATERNO_PERSONA" name="PATERNO_PERSONA" placeholder=""  type="text" value="" required>
              <!-- <input autocomplete="off" class="form-control" id="PATERNO_PERSONA" name="PATERNO_PERSONA" placeholder=""  type="text" value="" required> -->
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="MATERNO_PERSONA" class="is-required"> APELLIDO MATERNO <span class="required"></span></label>
              <input autocomplete="off" onkeydown="validardiv2()" disabled="disabled" class="verificdiv2 form-control" id="MATERNO_PERSONA" name="MATERNO_PERSONA" placeholder=""  type="text" value="" required>
              <!-- <input autocomplete="off" class="form-control" id="MATERNO_PERSONA" name="MATERNO_PERSONA" placeholder=""  type="text" value="" required> -->
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="FECHA_NACIMIENTO_PERSONA">FECHA DE NACIMIENTO <span class="required"></span></label>
              <input onkeyup="validardiv2()" class="verificdiv2 form-control" id="FECHA_NACIMIENTO_PERSONA" name="FECHA_NACIMIENTO_PERSONA" placeholder=""  type="date" value="">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="EDAD_PERSONA">EDAD <span class="required"></span></label>
              <input readonly autocomplete="off" class="form-control" id="EDAD_PERSONA" name="EDAD_PERSONA" placeholder=""  type="text" value="" maxlength="2" required>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="GRUPO_EDAD">GRUPO DE EDAD<span class="required"></span></label>
              <input readonly class="form-control" id="GRUPO_EDAD" name="GRUPO_EDAD" placeholder=""  type="text" required>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="GRUPO_EDAD" class="is-required">SEXO<span class="required"></span></label>
              <select onkeydown="validardiv2()" class="verificdiv2 form-select form-select-lg" id="SEXO_PERSONA" name="SEXO_PERSONA" required>
                <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <option value="MUJER">MUJER</option>
                <option value="HOMBRE">HOMBRE</option>
              </select>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="NACIONALIDAD_PERSONA">NACIONALIDAD<span class="required"></span></label>
              <input autocomplete="off" class="form-control" id="NACIONALIDAD_PERSONA" name="NACIONALIDAD_PERSONA" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="CURP_PERSONA" class="is-required">CURP <span class="required"></span></label>
              <input autocomplete="off" onkeydown="validardiv2()" class="verificdiv2 form-control" id="CURP_PERSONA" name="CURP_PERSONA" placeholder="" required type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="RFC_PERSONA" class="is-required">R.F.C.<span class="required"></span></label>
              <input autocomplete="off" onkeydown="validardiv2()" class="verificdiv2 form-control" id="RFC_PERSONA" name="RFC_PERSONA" placeholder="" required type="text" maxlength="13">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="ALIAS_PERSONA">ALIAS <span class="required"></span></label>
              <input autocomplete="off" class="form-control" id="ALIAS_PERSONA" name="ALIAS_PERSONA" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="OCUPACION_PERSONA">OCUPACIÓN<span class="required"></span></label>
              <input autocomplete="off" class="form-control" id="OCUPACION_PERSONA" name="OCUPACION_PERSONA" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="TELEFONO_FIJO">TELÉFONO FIJO <span class="required"></span></label>
              <input autocomplete="off" class="form-control" id="TELEFONO_FIJO" name="TELEFONO_FIJO" placeholder=""  type="text" maxlength="10">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="TELEFONO_CELULAR">TELÉFONO CELULAR<span class="required"></span></label>
              <input autocomplete="off" class="form-control" id="TELEFONO_CELULAR" name="TELEFONO_CELULAR" placeholder=""  type="text" maxlength="10">
            </div>

            <!-- calidad persona en el procedimiento -->
            <div class="col-md-6 mb-3 validar"><label for="CALIDAD_PERSONA_PROCEDIMIENTO">CALIDAD DE LA PERSONA PROPUESTA DENTRO DEL PROCESO PENAL<span class="required"></span></label>
              <select class="form-select form-select-lg" id="CALIDAD_PERSONA_PROCEDIMIENTO" name="CALIDAD_PERSONA_PROCEDIMIENTO">
                <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <?php
                $calidad = "SELECT * FROM calidadpersonaprocesopenal";
                $answer = $mysqli->query($calidad);
                while($calidades = $answer->fetch_assoc()){
                  echo "<option value='".$calidades['nombre']."'>".$calidades['nombre']."</option>";
                }
                ?>
              </select>
            </div>

            <div class="col-md-6 mb-3 validar" id="otracalidadproceso" style="display: none;">
                <label for="otracalp">ESPECIFIQUE</label>
                <input class="form-control" type="text" id="OTRACALIDADPROCESO" name="calprocesoother" value="<?php echo $rowfol['especifique']; ?>">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="CALIDAD_PERSONA" class="is-required">CALIDAD EN EL PROGRAMA DE LA PERSONA PROPUESTA<span class="required"></span></label>
              <select onkeydown="validardiv2()" class="verificdiv2 form-select form-select-lg" id="CALIDAD_PERSONA" name="CALIDAD_PERSONA" required>
                <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <?php
                $calidad = "SELECT * FROM calidadpersona";
                $answer = $mysqli->query($calidad);
                while($calidades = $answer->fetch_assoc()){
                  echo "<option value='".$calidades['nombre']."'>".$calidades['nombre']."</option>";
                }
                ?>
              </select>
            </div>


            <div class="col-md-6 mb-3 validar">
                <label for="INCAPAZ" class="is-required">MENOR DE EDAD O PERSONA EN SITUACION DE DISCAPACIDAD<span class="required"></span></label>
                <select onclick="validardiv2()" class="verificdiv2 form-select form-select-lg" id="INCAPAZ" name="INCAPAZ"  onChange="pagoOnChange(this)" required>
                  <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </select>
              </div>


            <div class="col-md-6 mb-3 validar">
              <!-- <br> -->
              <br>
              <button onclick="enviarId()" disabled="true" style="display: block; margin: 0 auto; justify-content: center;" id="GENERAR_ID" type="button"> GENERAR ID </button>
            </div>

            <div class="alert div-title">
              <h3 style="text-align:center">LUGAR DE NACIMIENTO DE LA PERSONA</h3>
            </div>
            <div class="col-md-6 mb-3 validar">
              <label for="NOMBRE_ESTADO">ESTADO<span class="required"></span></label>
              <select class="form-select form-select-lg" name="cbx_estado" id="cbx_estado" onChange="OTHERPAIS(this)">
                <option value="0">Seleccionar Estado</option>
                <?php while($row = $resultado->fetch_assoc()) { ?>
                  <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-6 mb-3 validar" id="other_pais" style="display:none;">
              <label for="OTHER_PAIS">ESPECIFIQUE</label>
              <input class="form-control" id="OTHER_PAIS" name="OTHER_PAIS" placeholder="" value="" type="text">
            </div>

            <div class="col-md-6 mb-3 validar" id="municipio">
              <label for="NOMBRE_MUNICIPIO">MUNICIPIO<span class="required"></span></label>
              <select class="form-select form-select-lg" name="cbx_municipio" id="cbx_municipio"></select>
            </div>

            <!-- <div class="col-md-6 mb-3 validar">
              <label for="NACIONALIDAD_PERSONA">NACIONALIDAD<span class="required"></span></label>
              <input autocomplete="off" class="form-control" id="NACIONALIDAD_PERSONA" name="NACIONALIDAD_PERSONA" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="CURP_PERSONA" class="is-required">CURP <span class="required"></span></label>
              <input autocomplete="off" onkeydown="validardiv2()" class="verificdiv2 form-control" id="CURP_PERSONA" name="CURP_PERSONA" placeholder="" required type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="RFC_PERSONA" class="is-required">R.F.C.<span class="required"></span></label>
              <input autocomplete="off" onkeydown="validardiv2()" class="verificdiv2 form-control" id="RFC_PERSONA" name="RFC_PERSONA" placeholder="" required type="text" maxlength="13">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="ALIAS_PERSONA">ALIAS <span class="required"></span></label>
              <input autocomplete="off" class="form-control" id="ALIAS_PERSONA" name="ALIAS_PERSONA" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="OCUPACION_PERSONA">OCUPACIÓN<span class="required"></span></label>
              <input autocomplete="off" class="form-control" id="OCUPACION_PERSONA" name="OCUPACION_PERSONA" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="TELEFONO_FIJO">TELÉFONO FIJO <span class="required"></span></label>
              <input autocomplete="off" class="form-control" id="TELEFONO_FIJO" name="TELEFONO_FIJO" placeholder=""  type="text" maxlength="10">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="TELEFONO_CELULAR">TELÉFONO CELULAR<span class="required"></span></label>
              <input autocomplete="off" class="form-control" id="TELEFONO_CELULAR" name="TELEFONO_CELULAR" placeholder=""  type="text" maxlength="10">
            </div> -->
            <!-- XFBXFDVNBXFCNBXCVNCVB -->
            <div class="alert div-title">
              <h3 style="text-align:center">DOMICILIO ACTUAL DE LA PERSONA</h3>
            </div>
            <div class="col-md-6 mb-3 validar">
              <label for="DOMICILIO" >P.P.L.<span class="required"></span></label>
              <select  class="form-select form-select-lg" id="DOMICILIO" name="DOMICILIO"  onChange="domicilioactual(this)">
                <option disabled selected value="">SELECCIONE UNA OPCIÓN</option>
                <option value="SI">SI</option>
                <option value="NO">NO</option>
              </select>
            </div>
            <!-- centros de reclusorios -->
            <div class="col-md-6 mb-3 validar" id="reclusorio" style="display:none;">
              <label for="RECLUSORIO"  >CENTROS PENITENCIARIOS<span class="required"></span></label>
              <select  class="form-select form-select-lg" id="RECLUSORIO" name="RECLUSORIO">
                <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <?php
                $reclusorio = "SELECT * FROM reclusorios";
                $answer_reclusorio = $mysqli->query($reclusorio);
                while($reclusorios = $answer_reclusorio->fetch_assoc()){
                  echo "<option value='".$reclusorios['denominacion']."'>".$reclusorios['denominacion']."</option>";
                }
                ?>
              </select>
            </div>

            <div class="col-md-6 mb-3 validar" id="criterio_oport" style="display:none;">
              <label for="criterio_oportunidad">CRITERIO DE OPORTUNIDAD</label>
              <select class="form-select form-select-lg" name="criterio_oportunidad" onclick="fecha_criterio(this)">
                <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                <option value="NO APLICA">NO APLICA</option>
                <option value="EN ESPERA">EN ESPERA</option>
                <option value="OTORGADO">OTORGADO</option>
              </select>
            </div>
            <div class="col-md-6 mb-3 validar" id="fecha_crit" style="display:none;">
              <label for="fecha_c">FECHA DEL CRITERIO DE OPORTUNIDAD</label>
              <input class="form-control" type="date" name="fecha_cr_opor" id="fecha_cr_opor" value="">
            </div>
            <!--  -->
            <div class="col-md-6 mb-3 validar" id="domestado" style="display:none;">
              <label for="NOMBRE_ESTADO">ESTADO<span class="required"></span></label>
              <select class="form-select form-select-lg" name="cbx_estado1" id="cbx_estado1">
                <option value="">Seleccionar Estado</option>
                <?php while($row = $resultado1->fetch_assoc()) { ?>
                  <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-6 mb-3 validar" id="dommunicipio" style="display:none;">
              <label for="NOMBRE_MUNICIPIO">MUNICIPIO<span class="required"></span></label>
              <select class="form-select form-select-lg" name="cbx_municipio11" id="cbx_municipio11"></select>
              </div>

              <div class="col-md-6 mb-3 validar" id="domlocalidad" style="display:none;">
                <label for="NOMBRE_LOCALIDAD">LOCALIDAD<span class="required"></span></label>
                <input autocomplete="off" class="form-control" name="localidadrad" id="localidadrad" placeholder="" value="" type="text">
              </div>
              <!-- XDFHSDFGHDFGHDFGHDFGHDFGH -->
              <div class="col-md-6 mb-3 validar" id="domcalle" style="display:none;">
                <label for="CALLE">CALLE Y NÚMERO<span class="required"></span></label>
                <input autocomplete="off" class="form-control" id="CALLE" name="CALLE" placeholder="" value="" type="text">
              </div>

              <div class="col-md-6 mb-3 validar" id="domcp" style="display:none;">
                <label for="CP">C.P.<span class="required"></span></label>
                <input autocomplete="off" class="form-control" id="CP" name="CP" placeholder="" value="" type="text" maxlength="5">
              </div>

              <!-- <div class="col-md-6 mb-3 validar">
                <label for="INCAPAZ" class="is-required">INCAPAZ<span class="required"></span></label>
                <select onclick="validardiv2()" class="verificdiv2 form-select form-select-lg" id="INCAPAZ" name="INCAPAZ"  onChange="pagoOnChange(this)" required>
                  <option disabled selected value>SELECCIONE UNA OPCIÓN</option>
                  <option value="SI">SI</option>
                  <option value="NO">NO</option>
                </select>
              </div> -->
        </div>

        <div id="tutor" class="row" style="display:none;">
            <div class="row">
              <hr class="mb-4">
            </div>
            <div class="alert div-title">
              <h3 style="text-align:center">DATOS DEL PADRE/MADRE Y/O TUTOR</h3>
            </div>
            <div class="col-md-6 mb-3 validar">
              <label for="TUTOR_NOMBRE" class="is-required">NOMBRE TUTOR(A)<span class="required"></span></label>
              <input autocomplete="off" class="form-control" id="TUTOR_NOMBRE" name="TUTOR_NOMBRE" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="COLONIA" class="is-required">APELLIDO PATERNO TUTOR(A)<span class="required"></span></label>
              <input autocomplete="off" class="form-control" id="TUTOR_PATERNO" name="TUTOR_PATERNO" placeholder=""  type="text">
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="COLONIA" class="is-required">APELLIDO MATERNO TUTOR(A)<span class="required"></span></label>
              <input autocomplete="off" class="form-control" id="TUTOR_MATERNO" name="TUTOR_MATERNO" placeholder=""  type="text">
            </div>

        </div>

        <div class="row" style="display:none;" id="procesopenal">
          <div class="row">
            <hr class="mb-4">
          </div>
          <div class="alert div-title">
            <h3 style="text-align:center">DATOS DE LA INVESTIGACIÓN O PROCESO PENAL</h3>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="DELITO_PRINCIPAL"  class="is-required">DELITO PRINCIPAL<span class="required"></span></label>
            <select class="form-select form-select-lg" id="DELITO_PRINCIPAL" name="DELITO_PRINCIPAL" onChange="otherdelito(this)" required>
              <option style="visibility: hidden" selected id="opt-delito-principal" value="<?php echo $filacheckproceso['delitoprincipal']; ?>"><?php echo $filacheckproceso['delitoprincipal']; ?></option>
              <!-- <option disabled selected value>SELECCIONE UNA OPCIÓN</option> -->
              <?php
              $delito = "SELECT * FROM delito";
              $answer = $mysqli->query($delito);
              while($delitos = $answer->fetch_assoc()){
                echo "<option value='".$delitos['nombre']."'>".$delitos['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div id="otherdel" class="col-md-6 mb-3 validar"  style="display:none;">
            <label for="OTRO_DELITO_PRINCIPAL">OTRO DELITO PRINCIPAL <span class="required"></span></label>
            <input class="form-control" id="OTRO_DELITO_PRINCIPAL" name="OTRO_DELITO_PRINCIPAL" placeholder="" type="text" value="<?php echo $filacheckproceso['otrodelitoprincipal']; ?>">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="DELITO_SECUNDARIO">DELITO SECUNDARIO<span class="required"></span></label>
            <select class="form-select form-select-lg" id="DELITO_SECUNDARIO" name="DELITO_SECUNDARIO" onChange="delito_secundario(this)">
              <option style="visibility: hidden" selected id="opt-delito-secundario" value="<?php echo $filacheckproceso['delitosecundario']; ?>"><?php echo $filacheckproceso['delitosecundario']; ?></option>
              <!-- <option disabled selected value>SELECCIONE UNA OPCIÓN</option> -->
              <?php
              $delito = "SELECT * FROM delito";
              $answer = $mysqli->query($delito);
              while($delitos = $answer->fetch_assoc()){
                echo "<option value='".$delitos['nombre']."'>".$delitos['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div id="delitosec" class="col-md-6 mb-3 validar" style="display:none;">
            <label for="OTRO_DELITO_SECUNDARIO">OTRO DELITO SECUNDARIO <span class="required"></span></label>
            <input class="form-control" id="OTRO_DELITO_SECUNDARIO" name="OTRO_DELITO_SECUNDARIO" placeholder=""  type="text" value="<?php echo $filacheckproceso['otrodelitosecundario']; ?>">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="ETAPA_PROCEDIMIENTO" class="is-required">ETAPA DEL PROCEDIMIENTO O RECURSO<span class="required"></span></label>
            <select class="form-select form-select-lg" id="ETAPA_PROCEDIMIENTO" name="ETAPA_PROCEDIMIENTO" required>
              <option style="visibility: hidden" selected id="opt-etapa-proc" value="<?php echo $filacheckproceso['etapaprocedimiento']; ?>"><?php echo $filacheckproceso['etapaprocedimiento']; ?></option>
              <!-- <option disabled selected value>SELECCIONE UNA ETAPA</option> -->
              <?php
              $etapaproc = "SELECT * FROM etapa_proc";
              $answeretapa = $mysqli->query($etapaproc);
              while($etapas = $answeretapa->fetch_assoc()){
                echo "<option value='".$etapas['nombre']."'>".$etapas['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="NUC" class="is-required">N.U.C. <span class="required"></span></label>
            <input autocomplete="off" class="form-control" id="NUC" name="NUC" value="<?php echo $filacheckproceso['nuc']; ?>" type="text" required>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="MUNICIPIO_RADICACION" class="is-required">MUNICIPIO DE RADICACIÓN DE LA CARPETA DE INVESTIGACIÓN <span class="required"></span></label>
            <select class="form-select form-select-lg" id="MUNICIPIO_RADICACION" name="MUNICIPIO_RADICACION" required>
              <option style="visibility: hidden" selected id="opt-mun-rad" value="<?php echo $filacheckproceso['numeroradicacion']; ?>"><?php echo $filacheckproceso['numeroradicacion']; ?></option>
              <!-- <option disabled selected value>SELECCIONE EL MUNICIPIO</option> -->
              <?php
              $select = "SELECT * FROM municipios";
              $answer = $mysqli->query($select);
              while($valores = $answer->fetch_assoc()){
                echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
              }
              ?>
            </select>
          </div>
        </div>

        <div class="row" style="display:none;" id="valoracionjuridica">
          <div class="row">
            <hr class="mb-4">
          </div>
          <div class="alert div-title">
            <h3 style="text-align:center">VALORACIÓN JURÍDICA</h3>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="RESULTADO_VALORACION_JURIDICA" class="is-required">RESULTADO DE LA VALORACIÓN JURÍDICA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="RESULTADO_VALORACION_JURIDICA" name="RESULTADO_VALORACION_JURIDICA" required>
              <option style="visibility: hidden" selected id="opt-val-jurid" value="<?php echo $filavalorjuridica['resultadovaloracion']; ?>"><?php echo $filavalorjuridica['resultadovaloracion']; ?></option>
              <!-- <option disabled selected value>SELECCIONE UNA OPCIÓN</option> -->
              <option value="SI PROCEDE">SI PROCEDE</option>
              <option value="NO PROCEDE">NO PROCEDE</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="MOTIVO_NO_PROCEDENCIA" class="is-required">MOTIVO NO PROCEDENCIA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="MOTIVO_NO_PROCEDENCIA" name="MOTIVO_NO_PROCEDENCIA" required>
              <option style="visibility: hidden" selected id="opt-no-proc" value="<?php echo $filavalorjuridica['motivoprocedencia']; ?>"><?php echo $filavalorjuridica['motivoprocedencia']; ?></option>
              <!-- <option disabled selected value>SELECCIONE UNA OPCIÓN</option> -->
              <option value="NO CORRESPONDE EL TIPO PENAL">NO CORRESPONDE EL TIPO PENAL</option>
              <option value="NO CUMPLE CON LOS REQUISITOS">NO CUMPLE CON LOS REQUISITOS</option>
              <option value="AMBAS">AMBAS</option>
              <option value="NO APLICA">NO APLICA</option>
            </select>
          </div>
        </div>

        <div class="row" style="display:none;" id="expedientes_relacionales">
          <div class="row">
            <hr class="mb-4">
          </div>
          <div class="alert div-title">
            <h3 style="text-align:center">RELACION CON OTRO(S) EXPEDIENTE(S) DE LA PERSONA PROPUESTA</h3>
          </div>
          <div class="col-md-12 mb-3 validar">
            <label for="">SELECCIONA EXPEDIENTE(S) QUE SE RELACIONAN</label>
            <br>
            <br>
            <select class="mul-select form-select form-select-lg mb-3" multiple="true" name="sel_relacional[]" style="width:950px">
              <?php
              $ex = "SELECT * FROM expediente
              INNER JOIN statusseguimiento ON expediente.fol_exp = statusseguimiento.folioexpediente
              WHERE statusseguimiento.status = 'EN EJECUCION'";
              $rex =$mysqli->query($ex);
              while ($fex = $rex->fetch_assoc()) {
                echo $fex['fol_exp'];
                echo '<option value='.$fex['fol_exp'].'>"'.$fex['fol_exp'].'"</option>';
              }
              ?>
            </select>
          </div>
        </div>

        <div class="row" style="display:none;" id="fotografia">
          <div class="row">
            <hr class="mb-4">
          </div>
          <div class="alert div-title">
            <h3 style="text-align:center">FOTOGRAFÍA DEL SUJETO</h3>
          </div>
          <section class="text-center" >
            <input class="input-group" type="file" name="user_image" accept="image/*" />
            <br><br>
            <div id="visorArchivo">
          <!--Aqui se desplegará el fichero-->
            </div>
          </section>
        </div>

        <div class="row" style="display:none;" id="comentarios">
          <div class="row">

            <hr class="mb-4">
          </div>
          <div class="alert div-title">
            <h3 style="text-align:center">COMENTARIOS</h3>
          </div>

            <textarea name="COMENTARIO" id="COMENTARIO" rows="8" cols="80" placeholder="Escribe tu comentario" maxlength="200"></textarea>

        </div>

        <div class="row" style="display:none;" id="guardarfrm">
          <div>
              <br>
              <br>
          		<button style="display: block; margin: 0 auto;"  class="btn color-btn-success" id="enter" type="submit">GUARDAR</button>
          </div>
        </div>
      </form>
      <div class="row" id="btnnext1">
        <div>
          <br>
          <br>
          <button style="display: block ; margin: 0 auto;" class="btn color-btn-success" id="next" disabled>SIGUIENTE</button>
        </div>
      </div>
      <div class="row" style="display:none;" id="btnnext2">
        <div>
          <br>
          <br>
          <button style="display: block ; margin: 0 auto;" class="btn color-btn-success" id="next2" disabled>SIGUIENTE</button>
        </div>
      </div>
      <div class="row" style="display:none;" id="btnnext3">
        <div>
          <br>
          <br>
          <button style="display: block ; margin: 0 auto;" class="btn color-btn-success" id="next3" disabled>SIGUIENTE</button>
        </div>
      </div>
    </div>
  </article>
  </div>
  </div>
</div>
</div>
<div class="contenedor">
  <div class="columns download">

            <!-- <a href="../docs/GLOSARIO-SIPPSIPPED.pdf" class="btn-flotante-glosario" download="GLOSARIO-SIPPSIPPED.pdf"><i class="fa fa-download"></i>GLOSARIO</a> -->

  </div>
<a href="../administrador/detalles_expediente.php?folio=<?php echo $fol_exp; ?>" class="btn-flotante">CANCELAR</a>
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
document.getElementById("FECHA_SOLICITUD").setAttribute("max", today);
document.getElementById("FECHA_NACIMIENTO_PERSONA").setAttribute("max", today);
document.getElementById("FECHA_AUTORIZACION").setAttribute("max", today);
document.getElementById("FECHA_CONVENIO_ENTENDIMIENTO").setAttribute("max", today);
document.getElementById("FECHA_DESINCORPORACION").setAttribute("max", today);
</script>


<script>
const fechaNacimiento = document.getElementById("FECHA_NACIMIENTO_PERSONA");
const edad = document.getElementById("EDAD_PERSONA");

const calcularEdad = (fechaNacimiento) => {
    const fechaActual = new Date();
    const anoActual = parseInt(fechaActual.getFullYear());
    const mesActual = parseInt(fechaActual.getMonth()) + 1;
    const diaActual = parseInt(fechaActual.getDate());

    // 2016-07-11
    const anoNacimiento = parseInt(String(fechaNacimiento).substring(0, 4));
    const mesNacimiento = parseInt(String(fechaNacimiento).substring(5, 7));
    const diaNacimiento = parseInt(String(fechaNacimiento).substring(8, 10));

    let edad = anoActual - anoNacimiento;
    if (mesActual < mesNacimiento) {
        edad--;
    } else if (mesActual === mesNacimiento) {
        if (diaActual < diaNacimiento) {
            edad--;
        }
    }
    return edad;
};

window.addEventListener('load', function () {

    fechaNacimiento.addEventListener('change', function () {
        if (this.value) {
            function enviarEdad() {
              calcularEdad = document.getElementById("EDAD_PERSONA").value;
            }
            // console.log(`La edad es: ${calcularEdad(this.value)} años`);

            document.getElementById("EDAD_PERSONA").value = `${calcularEdad(this.value)} años`;
            var mayor = "MAYOR DE EDAD";
            var menor = "MENOR DE EDAD";
            if (calcularEdad(this.value) >= 18) {

              //console.log("MAYOR DE EDAD");
              document.getElementById("GRUPO_EDAD").value = mayor;

            } else if (calcularEdad(this.value) <= 18){

              //console.log("MENOR DE EDAD");
              document.getElementById("GRUPO_EDAD").value = menor;

            }
        }
    });

});
</script>



<script type="text/javascript">
    // obtener folio
    var separarFolio = [];
    var folio = document.getElementById('NUM_EXPEDIENTE').value;
    separarFolio = folio.split("/");
    var idFolio = separarFolio[3];

    // asignar id unico persona
    var nombrePersona = document.getElementById('NOMBRE_PERSONA');
    var paternoPersona = document.getElementById('PATERNO_PERSONA');
    var maternoPersona = document.getElementById('MATERNO_PERSONA');
    var nombreIngresado;
    var paternoIngresado;
    var maternoIngresado;
    var nombreCompleto;
    var arregloNombreCompleto;
    var inicialesNombreCompleto;
    var fullNombreCompleto;
    var arrayNombreCompleto = [];
    var text1 = "";

    nombrePersona.addEventListener('change', obtenerNombre);
    paternoPersona.addEventListener('change', obtenerPaterno);
    maternoPersona.addEventListener('change', obtenerMaterno);

    function obtenerNombre(e) {
      nombreIngresado = e.target.value;
      // console.log(nombreIngresado);
      document.getElementById("GENERAR_ID").disabled = true;
    }

    function obtenerPaterno(e) {
      paternoIngresado = e.target.value;
      // console.log(paternoIngresado);
      document.getElementById("GENERAR_ID").disabled = true;
    }

    function obtenerMaterno(e) {
      maternoIngresado = e.target.value;
      // console.log(maternoIngresado);
      document.getElementById("GENERAR_ID").disabled = false;
    }

    function obtenerIniciales() {
      nombreCompleto = " " + nombreIngresado + " " + paternoIngresado + " " + maternoIngresado + " ";

      arregloNombreCompleto = nombreCompleto.split(' ');
      for (var i = 0; i < arregloNombreCompleto.length; i++){
        inicialesNombreCompleto = arregloNombreCompleto[i].substring(0, 1).toUpperCase(0, 1);
        arrayNombreCompleto.push(inicialesNombreCompleto);
      }

      fullNombreCompleto = arrayNombreCompleto.filter(v => v);
      // console.log(fullNombreCompleto);
      document.getElementById("ID_UNICO").value = "";

      fullNombreCompleto.forEach(nombrePersona);

      function nombrePersona(item1) {
      text1 += item1;
      }
    }

    function enviarId() {
        obtenerIniciales();
        document.getElementById("ID_UNICO").value = text1 + "-" + idFolio;
        // readOnlyNombreCompleto();
        document.getElementById("GENERAR_ID").disabled = true;
    }

    // function readOnlyNombreCompleto() {
    //   document.getElementById("NOMBRE_PERSONA").readOnly = true;
    //   document.getElementById("PATERNO_PERSONA").readOnly = true;
    //   document.getElementById("MATERNO_PERSONA").readOnly = true;
    // }

    function validarNombrePersona(form) {
        form.PATERNO_PERSONA.disabled=(form.NOMBRE_PERSONA.value=="");
    }

    function validarApellidoPersona(form) {
        form.MATERNO_PERSONA.disabled=(form.PATERNO_PERSONA.value=="");
    }


</script>


<script type="text/javascript">
function validarfrm(){
  var validado = true;
  elementos = document.getElementsByClassName("verific");
  for(i=0;i<elementos.length;i++){
    if(elementos[i].value == "" || elementos[i].value == null){
    validado = false
    }
  }
  if(validado){
  document.getElementById("next").disabled = false;

  }else{
     document.getElementById("next").disabled = true;
  //Salta un alert cada vez que escribes y hay un campo vacio
  //alert("Hay campos vacios")
  }
  }
</script>
<script>
document.getElementById("next").addEventListener("click", function() {
    document.getElementById("persona_p").style.display="";
    document.getElementById("btnnext1").style.display="none";
    document.getElementById("btnnext2").style.display="";

});
</script>
<script type="text/javascript">
function validardiv2(){
  var validado = true;
  elementos = document.getElementsByClassName("verificdiv2");
  for(i=0;i<elementos.length;i++){
    if(elementos[i].value == "" || elementos[i].value == null){
    validado = false
    }
  }
  if(validado){
  document.getElementById("next2").disabled = false;

  }else{
     document.getElementById("next2").disabled = true;
  //Salta un alert cada vez que escribes y hay un campo vacio
  //alert("Hay campos vacios")
  }
  // NOMBRE_PERSONA = document.getElementById("NOMBRE_PERSONA").value;
  // varnext2=0;
  // if (NOMBRE_PERSONA=="") {
  //   varnext2++;
  // }
  // if (varnext2==0) {
  //   document.getElementById("next2").disabled="false";
  // }else {
  //   document.getElementById("next2").disabled="true";
  // }
  //
  // document.getElementById("NOMBRE_PERSONA").addEventListener("keyup", validardiv2);
}
</script>

<script>
document.getElementById("next2").addEventListener("click", function() {
    document.getElementById("procesopenal").style.display="";
    document.getElementById("btnnext2").style.display="none";
    document.getElementById("btnnext3").style.display="";

});
</script>
<script type="text/javascript">
function validardiv3(){
  // var validado = true;
  // elementos = document.getElementsByClassName("verificdiv2");
  // for(i=0;i<elementos.length;i++){
  //   if(elementos[i].value == "" || elementos[i].value == null){
  //   validado = false
  //   }
  // }
  // if(validado){
  // document.getElementById("next2").disabled = false;
  //
  // }else{
  //    document.getElementById("next2").disabled = true;
  // //Salta un alert cada vez que escribes y hay un campo vacio
  // //alert("Hay campos vacios")
  // }
  DELITO_PRINCIPAL = document.getElementById("DELITO_PRINCIPAL").value;
  ETAPA_PROCEDIMIENTO = document.getElementById("ETAPA_PROCEDIMIENTO").value;
  NUC = document.getElementById("NUC").value;
  MUNICIPIO_RADICACION = document.getElementById("MUNICIPIO_RADICACION").value;
  varnext2 = 0;
  if (DELITO_PRINCIPAL=="") {
    varnext2++;
  }
  if (ETAPA_PROCEDIMIENTO == "") {
    varnext2++;
  }
  if (NUC == "") {
    varnext2++;
  }
  if (MUNICIPIO_RADICACION == "") {
    varnext2++;
  }
  if (varnext2 == 0) {
    document.getElementById("next3").disabled= false;
  }else {
    document.getElementById("next3").disabled= true;
  }

}
document.getElementById("DELITO_PRINCIPAL").addEventListener("change", validardiv3);
document.getElementById("ETAPA_PROCEDIMIENTO").addEventListener("change", validardiv3);
document.getElementById("NUC").addEventListener("keyup", validardiv3);
document.getElementById("MUNICIPIO_RADICACION").addEventListener("change", validardiv3);
</script>

<script>
document.getElementById("next3").addEventListener("click", function() {
    document.getElementById("valoracionjuridica").style.display="";
    document.getElementById("fotografia").style.display="";
    document.getElementById("comentarios").style.display="";
    document.getElementById("guardarfrm").style.display="";
    document.getElementById("expedientes_relacionales").style.display="";
    document.getElementById("btnnext3").style.display="none";

});
</script>

<script type="text/javascript">
window.onload = function(){
var fecha = new Date(); //Fecha actual
var mes = fecha.getMonth()+1; //obteniendo mes
var dia = fecha.getDate(); //obteniendo dia
var ano = fecha.getFullYear(); //obteniendo año
if(dia<10)
  dia='0'+dia; //agrega cero si el menor de 10
if(mes<10)
  mes='0'+mes //agrega cero si el menor de 10
document.getElementById('FECHA_CAPTURA').value=dia+"/"+mes+"/"+ano;
}
</script>

<!-- <script type="text/javascript">
var idUnico = document.getElementById('ID_UNICO').value;
function Guardar() {
if (idUnico == null || idUnico == ""){
  obtenerIniciales();
  document.getElementById("ID_UNICO").value = text1 + "-" + idFolio;
  // alert("No se ha generado el id unico de la persona, presiona el botón GENERAR ID.")
} else {
  obtenerIniciales();
  document.getElementById("ID_UNICO").value = text1 + "-" + idFolio;
}
}
  </script> -->


</script>
<script src="../js/habiltar_botones.js" charset="utf-8"></script>

<script type="text/javascript">

var calidadProcesoPenal = document.getElementById('CALIDAD_PERSONA_PROCEDIMIENTO');
var calidadProceso = '';

calidadProcesoPenal.addEventListener('change', obtenerCalidadProcesoPenal);

    function obtenerCalidadProcesoPenal(e) {
      calidadProceso = e.target.value;

      if (calidadProceso === "OTROS" ){

        document.getElementById('otracalidadproceso').style.display = "";

      }

      else {

        document.getElementById('otracalidadproceso').style.display = "none";
        document.getElementById('OTRACALIDADPROCESO').value = "";

      }
}
</script>
<script type="text/javascript">
$(document).ready(function(){
          $(".mul-select").select2({
                  placeholder: "SELECCIONA", //placeholder
                  tags: true,
                  tokenSeparators: ['/',',',';'," "]
              });
          })
</script>
<script src="../js/pruebadisabled.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
