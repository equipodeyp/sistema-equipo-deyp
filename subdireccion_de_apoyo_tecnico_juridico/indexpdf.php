<?php
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
$row_nombre = $row['nombre'];
$apellido_p = $row['apellido_p'];
$apellido_m = $row['apellido_m'];
$name_user = $row_nombre." ".$apellido_p." " .$apellido_m;
$full_name = mb_strtoupper (html_entity_decode($name_user, ENT_QUOTES | ENT_HTML401, "UTF-8"));


$fol_exp = $_GET['folio'];
// echo $fol_exp;
$sql = "SELECT * FROM expediente WHERE fol_exp = '$fol_exp'";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);
$anio = $row['año'];

//
// $sql = "SELECT * FROM tickets WHERE usuario = '$full_name'";
// $result = mysqli_query($mysqli, $sql);
// $rowcount = mysqli_num_rows( $result );
// $suma = $rowcount + 1;
// $num_incidencia = 0 . $suma;
// // echo $num_incidencia;



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
  <!-- barra de navegacion -->
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
  <!-- <script src="../js/validar_campos.js"></script> -->
  <script src="../js/verificar_camposm1.js"></script>
  <script src="../js/mascara2campos.js"></script>
  <script src="../js/mod_medida.js"></script>
  <!-- <link rel="stylesheet" href="../css/estilos.css">
  <script src="../js/main.js"></script> -->
  <script src="../js/Javascript.js"></script>
  <!-- <script src="../js/validar_campos.js"></script> -->
  <script src="../js/validarmascara3.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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

      $result_area = $mysqli->query($sentencia_user);
      $row_area=$result_area->fetch_assoc();
			$area = $row_area['area'];

      $result_nombre = $mysqli->query($sentencia_user);
      $row_nombre=$result_nombre->fetch_assoc();
			$nombre = $row_nombre['nombre'];

      $result_apellido_p = $mysqli->query($sentencia_user);
      $row_apellido_p=$result_apellido_p->fetch_assoc();
			$apellido_p = $row_apellido_p['apellido_p'];

      $result_apellido_m = $mysqli->query($sentencia_user);
      $row_apellido_m=$result_apellido_m->fetch_assoc();
			$apellido_m = $row_apellido_m['apellido_m'];

			if ($genero=='mujer') {
				echo "<img src='../image/mujerup.png' width='100' height='100'>";
			}

			if ($genero=='hombre') {
				// $foto = ../image/user.png;
				echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
			}
			// echo $genero;
			?>
    <h6 style="text-align:center" class='user-nombre'> <?php echo "" . $_SESSION['usuario']; ?> </h6>
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

    		<ul class="tabs">
          <li><a href="#" class="active" onclick="location.href='crear_formato.php?folio=<?php echo $fol_exp; ?>'"><span class="far fa-address-card"></span><span class="tab-text">FORMATOS</span></a></li>
        <!-- <li><a href="#" onclick="location.href='tickets.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">INCIDENCIAS GENERADAS</span></a></li> -->
    			<!--<li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO</span></a></li> -->
    		</ul>

    		<div class="secciones">
    			<article id="tab1">

          <!-- menu de navegacion de la parte de arriba -->
          <div class="secciones form-horizontal sticky breadcrumb flat">
                <a href="../subdireccion_de_apoyo_tecnico_juridico/menu.php">REGISTROS</a>
                <a href="../subdireccion_de_apoyo_tecnico_juridico/modificar.php?id=<?php echo $fol_exp; ?>">EXPEDIENTE</a>
                <a class="actived">LISTA DE FORMATOS</a>
          </div>
       </div>
       <div class="container">


       <div class="row">
           <div class="col-md-8 offset-md-2">
               <h3>Solicitud de Expediente</h3>
               <hr>
               <form id="form">
                   <div class="mb-3">
                       <label for="exp" class="form-label">Expediente</label>
                         <input type="text" class="form-control" id="exp" value="<?php echo $fol_exp; ?>" readonly>
                   </div>


                   <div class="mb-3">
                       <label for="tomo" class="form-label">Tomo</label>
                         <input type="text" class="form-control" id="tomo" >
                   </div>


                   <div class="row mb-3">
                       <div class="col-md-6">
                           <label for="anioa" class="form-label">Año de Apertura</label>
                           <input type="text" class="form-control" id="anioa" value="<?php echo $anio; ?>" readonly>
                       </div>
                       <div class="col-md-6">
                           <label for="anioc" class="form-label">Año de Cierre</label>
                           <input type="text" class="form-control" id="anioc">
                       </div>
                   </div>



                   <div class="row mb-12">
                       <div class="row">
                           <h3>Descripción del Contenido</h3>
                           <p>
                             <div class="row">
                               <div class="col-sm-3  validar">
                                 <label for="">Solicitud de Incorporación</label><br><br>
                                 <input type="radio" name="inc" class="form-check-input" id="inc-si" value="1">
                                 <label for="inc-si" class="form-check-label">Si</label>
                                 <input type="radio" name="inc" class="form-check-input" id="inc-no" value="0"
                                     checked>
                                 <label for="inc-no" class="form-check-label">No</label>
                               </div>
                               <div class="col-sm-3  validar">
                                 <label for="">Valoración Jurídica</label><br><br>
                                 <input type="radio" name="val" class="form-check-input" id="val-si" value="1">
                                 <label for="val-si" class="form-check-label">Si</label>
                                 <input type="radio" name="val" class="form-check-input"  id="val-no" value="0" checked>
                                 <label for="val-no" class="form-check-label">No</label>
                               </div>
                               <div class="col-lg-3  validar">
                                 <label for="">Oficio Análisis de Riesgo</label><br><br>
                                 <input type="radio" name="ofi" class="form-check-input" id="ofi-si" value="1">
                                 <label for="ofi-si" class="form-check-label">Si</label>
                                 <input type="radio" name="ofi" class="form-check-input"  id="ofi-no" value="0" checked>
                                 <label for="ofi-no" class="form-check-label">No</label>
                               </div>
                               <div class="col-lg-3  validar">
                                   <label for="anex" class="form-label">ANEXOS/OTROS (DESCRIBIR)</label><br>
                                   <input type="text" class="form-control" id="anex">,
                               </div>
                             </div>
                             <p>

                             </p><br />






                             <div class="row mb-12">
                                 <div class="row">
                                     <h3>Clasificación de la información</h3>
                                     <p>
                                       <div class="row">
                                         <div class="col-sm-3  validar">
                                           <label for="">Pública</label><br><br>
                                           <input type="radio" name="publica" class="form-check-input" id="publica-si" value="1">
                                           <label for="publica-si" class="form-check-label">Si</label>
                                           <input type="radio" name="publica" class="form-check-input" id="publica-no" value="0"
                                               checked>
                                           <label for="publica-no" class="form-check-label">No</label>
                                         </div>
                                         <div class="col-sm-3  validar">
                                           <label for="">Reservada</label><br><br>
                                           <input type="radio" name="reservada" class="form-check-input" id="reservada-si" value="1">
                                           <label for="reservada-si" class="form-check-label">Si</label>
                                           <input type="radio" name="reservada" class="form-check-input"  id="reservada-no" value="0" checked>
                                           <label for="reservada-no" class="form-check-label">No</label>
                                         </div>
                                         <div class="col-lg-3  validar">
                                           <label for="">Confidencial</label><br><br>
                                           <input type="radio" name="confi" class="form-check-input" id="confi-si" value="1">
                                           <label for="confi-si" class="form-check-label">Si</label>
                                           <input type="radio" name="confi" class="form-check-input"  id="confi-no" value="0" checked>
                                           <label for="confi-no" class="form-check-label">No</label>
                                         </div>
                                         <div class="col-lg-6  validar"><br>
                                             <label for="clasi" class="form-label">Fecha de Clasificación</label><br>
                                             <input type="text" class="form-control" id="clasi">
                                         </div>
                                         <div class="col-lg-6  validar"><br>
                                             <label for="periodo" class="form-label">Periodo de Reserva</label><br>
                                             <input type="text" class="form-control" id="periodo">
                                         </div>

                                       </div>

<p>
  <br />
</p>

                   <button type="submit" class="btn btn-primary mb-4">Generar PDF</button><br><br><br>
                   <span class="d-block pb-2" style="visibility:hidden">Firma digital aqui</span>
                   <div class="signature mb-2" style="visibility:hidden width: 100%; height: 200px;">
                       <canvas id="signature-canvas"
                           style="visibility:hidden border: 1px dashed red; width: 100%; height: 200px;"></canvas>
                   </div>

               </form>
           </div>
       </div>
    </div>
    </div>
  </div>

<div class="contenedor">




<a href="../subdireccion_de_apoyo_tecnico_juridico/modificar.php?id=<?php echo $fol_exp; ?>" class="btn-flotante">REGRESAR</a>
<script src="../js/jspdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script src="../js/app.js"></script>
</div>

</body>
</html>
