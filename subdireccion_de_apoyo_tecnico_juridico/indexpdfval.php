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
               <h3>VALORACIÓN JURÍDICA DE LA SOLICITUD DE INGRESO AL PROGRAMA</h3>
               <hr>
               <form id="form">
                   <div class="mb-3">
                       <label for="exp" class="form-label">Expediente</label>
                         <input type="text" class="form-control" id="exp" value="<?php echo $fol_exp; ?>" readonly>
                   </div>


                   <!-- <div class="mb-3">
                       <label for="tomo" class="form-label">Tomo</label>
                         <input type="text" class="form-control" id="tomo" >
                   </div> -->
                   <!-- <div class="row mb-3">
                       <div class="col-md-6">
                           <label for="anioa" class="form-label">Fecha de captura de datos</label>
                           <input type="text" class="form-control" id="anioa" value="<?php echo $anio; ?>" readonly>
                       </div> -->


                       <div class="row mb-3">
                           <div class="col-md-6">
                               <label for="anioa" class="form-label">Fecha de captura de datos</label>
                               <input type="text" class="form-control" id="anioa" >
                           </div>

                       <div class="col-md-6">
                           <label for="anioc" class="form-label">Fecha de solicitud</label>
                           <input type="text" class="form-control" id="anioc">
                       </div>
                   </div>



                   <div class="row mb-12">
                       <div class="row">
                           <h3>Datos de la Persona Propuesta</h3>
                           <p>
                             <div class="row">

                               <div class="col-lg-3  validar">
                                   <label for="nom" class="form-label">Nombre</label><br>
                                   <input type="text" class="form-control" id="nom">
                                   </div>

                                    <h5>Tipo de Intervención</h5><br><br>

                                <div class="col-sm-3  validar">
                                 <label for="">Victima</label><br>
                                 <input type="radio" name="vic" class="form-check-input" id="vic-si" value="1">
                                 <label for="vic-si" class="form-check-label">Si</label>
                                 <input type="radio" name="vic" class="form-check-input" id="vic-no" value="0"
                                     checked>
                                 <label for="vic-no" class="form-check-label">No</label>
                               </div>

                                <div class="col-sm-3  validar">
                                 <label for="">Defensor</label><br>
                                 <input type="radio" name="def" class="form-check-input" id="def-si" value="1">
                                 <label for="def-si" class="form-check-label">Si</label>
                                 <input type="radio" name="def" class="form-check-input"  id="def-no" value="0" checked>
                                 <label for="def-no" class="form-check-label">No</label>
                               </div>

                                <div class="col-lg-3  validar">
                                 <label for="">Ofendido</label><br>
                                 <input type="radio" name="ofe" class="form-check-input" id="ofe-si" value="1">
                                 <label for="ofe-si" class="form-check-label">Si</label>
                                 <input type="radio" name="ofe" class="form-check-input"  id="ofe-no" value="0" checked>
                                 <label for="ofe-no" class="form-check-label">No</label>
                               </div>

                               <div class="col-lg-3  validar">
                                <label for="">Policia</label><br>
                                <input type="radio" name="pol" class="form-check-input" id="pol-si" value="1">
                                <label for="pol-si" class="form-check-label">Si</label>
                                <input type="radio" name="pol" class="form-check-input"  id="pol-no" value="0" checked>
                                <label for="pol-no" class="form-check-label">No</label>
                              </div>

                              <div class="col-lg-3  validar">
                               <label for="">Testigo/Colaborador</label><br>
                               <input type="radio" name="tes" class="form-check-input" id="tes-si" value="1">
                               <label for="tes-si" class="form-check-label">Si</label>
                               <input type="radio" name="tes" class="form-check-input"  id="tes-no" value="0" checked>
                               <label for="tes-no" class="form-check-label">No</label>
                             </div>

                             <div class="col-lg-3  validar">
                              <label for="">Juez</label><br>
                              <input type="radio" name="jue" class="form-check-input" id="jue-si" value="1">
                              <label for="jue-si" class="form-check-label">Si</label>
                              <input type="radio" name="jue" class="form-check-input"  id="jue-no" value="0" checked>
                              <label for="jue-no" class="form-check-label">No</label>
                            </div>


                            <div class="col-lg-3  validar">
                             <label for="">Perito</label><br>
                             <input type="radio" name="per" class="form-check-input" id="per-si" value="1">
                             <label for="per-si" class="form-check-label">Si</label>
                             <input type="radio" name="per" class="form-check-input"  id="per-no" value="0" checked>
                             <label for="per-no" class="form-check-label">No</label>
                           </div>


                           <div class="col-lg-3  validar">
                            <label for="">Magistrado</label><br>
                            <input type="radio" name="mag" class="form-check-input" id="mag-si" value="1">
                            <label for="mag-si" class="form-check-label">Si</label>
                            <input type="radio" name="mag" class="form-check-input"  id="mag-no" value="0" checked>
                            <label for="mag-no" class="form-check-label">No</label>
                          </div>


                          <div class="col-lg-3  validar">
                           <label for="">Ministerio Publico</label><br>
                           <input type="radio" name="min" class="form-check-input" id="min-si" value="1">
                           <label for="min-si" class="form-check-label">Si</label>
                           <input type="radio" name="min" class="form-check-input"  id="min-no" value="0" checked>
                           <label for="min-no" class="form-check-label">No</label>
                         </div>

                                <div class="col-lg-5  validar">
                                   <label for="otr" class="form-label">Otro</label><br>
                                   <input type="text" class="form-control" id="anex">,
                               </div>

                               <div class="col-lg-12  validar">
                                   <label for="del" class="form-label">Delito</label><br>
                                   <input type="text" class="form-control" id="del">
                                   </div>

                                   <div class="col-lg-12  validar">
                                       <label for="car" class="form-label">Carpeta de Investigación y/o Causa penal</label><br>
                                       <input type="text" class="form-control" id="car">
                                       </div>


                                       <div class="col-lg-3  validar">
                                        <label for="">Privado de la Libertad</label><br>
                                        <input type="radio" name="priv" class="form-check-input" id="priv-si" value="1">
                                        <label for="priv-si" class="form-check-label">Si</label>
                                        <input type="radio" name="priv" class="form-check-input"  id="priv-no" value="0" checked>
                                        <label for="priv-no" class="form-check-label">No</label>
                                      </div>


                                     <div class="col-lg-12  validar">
                                     <label for="ubi" class="form-label">Ubicación de la Persona</label><br>
                                      <input type="text" class="form-control" id="ubi">
                                      </div>


                                      <div class="col-lg-3  validar">
                                       <label for="">Asistencia Legal</label><br>
                                       <input type="radio" name="asis" class="form-check-input" id="asis-si" value="1">
                                       <label for="asis-si" class="form-check-label">Si</label>
                                       <input type="radio" name="asis" class="form-check-input"  id="asis-no" value="0" checked>
                                       <label for="asis-no" class="form-check-label">No</label>
                                     </div>

                                     <div class="col-lg-12  validar">
                                     <label for="nope" class="form-label">Nombre de la Persona que lo asiste</label><br>
                                      <input type="text" class="form-control" id="nope">
                                      </div>


                                      <div class="col-lg-12  validar">
                                      <label for="sit" class="form-label">Situación de Riesgo</label><br>
                                       <input type="text" class="form-control" id="sit">
                                       </div>


                                       <div class="col-lg-12  validar">
                                       <label for="zon" class="form-label">Zona Geografica</label><br>
                                       <input type="text" class="form-control" id="zon">
                                        </div>

                                        <div class="col-lg-12  validar">
                                        <label for="cau" class="form-label">Causa de Vulnerabilidad</label><br>
                                        <input type="text" class="form-control" id="cua">
                                         </div>


                                         <div class="col-lg-12  validar">
                                         <label for="pree" class="form-label">Presenta alguna enfermedad</label><br>
                                         <input type="text" class="form-control" id="pree">
                                          </div>

                                          <div class="col-lg-12  validar">
                                          <label for="pred" class="form-label">Presenta alguna discapacidad</label><br>
                                          <input type="text" class="form-control" id="pred">
                                           </div>

                                           <div class="col-lg-12  validar">
                                           <label for="nec" class="form-label">Necesidad del porque llevar su testimonio a juicio</label><br>
                                           <input type="text" class="form-control" id="nec">
                                            </div>


                                            <div class="col-lg-12  validar">
                                            <label for="med" class="form-label">Medidas de apoyo solicitadas</label><br>
                                            <input type="text" class="form-control" id="med">
                                             </div>
                             </div>
                             <p>

                             </p><br />


                             <div class="row mb-12">
                                 <div class="row">
                                     <h3>Datos del Solicitante</h3>
                                     <p>
                                       <div class="row">
                                          <div class="col-sm-3  validar">
                                           <label for="">Agenten del Ministerio Publico</label><br><br>
                                           <input type="radio" name="age" class="form-check-input" id="age-si" value="1">
                                           <label for="age-si" class="form-check-label">Si</label>
                                           <input type="radio" name="age" class="form-check-input" id="age-no" value="0"
                                               checked>
                                           <label for="age-no" class="form-check-label">No</label>
                                         </div>

                                          <div class="col-sm-3  validar">
                                           <label for="">Órgano Jurisdiccional</label><br><br><br>
                                           <input type="radio" name="org" class="form-check-input" id="org-si" value="1">
                                           <label for="org-si" class="form-check-label">Si</label>
                                           <input type="radio" name="org" class="form-check-input"  id="org-no" value="0" checked>
                                           <label for="org-no" class="form-check-label">No</label>
                                         </div>

                                         <div class="col-lg-12  validar">
                                         <label for="nom" class="form-label">Nombre</label><br>
                                         <input type="text" class="form-control" id="nom">
                                          </div>

                                          <div class="col-lg-12  validar">
                                          <label for="car" class="form-label">Cargo</label><br>
                                          <input type="text" class="form-control" id="car">
                                           </div>

                                           <div class="col-lg-12  validar">
                                           <label for="ads" class="form-label">Adscripción</label><br>
                                           <input type="text" class="form-control" id="ads">
                                            </div>

                                            <div class="col-lg-12  validar">
                                            <label for="tel" class="form-label">Tel. Oficina</label><br>
                                            <input type="text" class="form-control" id="tel">
                                             </div>

                                             <div class="col-lg-12  validar">
                                             <label for="cel" class="form-label">Celular</label><br>
                                             <input type="text" class="form-control" id="cel">
                                              </div>


                                              <div class="col-lg-12  validar">
                                              <label for="cor" class="form-label">Correo Electronico</label><br>
                                              <input type="text" class="form-control" id="cor">
                                               </div>
                                       </div>



                                          <div class="row mb-12">
                                          <div class="row">
                                          <h3>Dictamen</h3>
                                          <p>

                                          <div class="row">
                                          <div class="col-lg-12  validar">
                                          <label for="ini" class="form-label">Iniciales</label><br>
                                          <input type="text" class="form-control" id="ini">
                                           </div>


                                           <div class="col-sm-3  validar">
                                            <label for="">Procedente</label><br>
                                            <input type="radio" name="pro" class="form-check-input" id="pro-si" value="1">
                                            <label for="pro-si" class="form-check-label">Si</label>
                                            <input type="radio" name="pro" class="form-check-input"  id="pro-no" value="0" checked>
                                            <label for="pro-no" class="form-check-label">No</label>
                                          </div>


                                          <div class="col-sm-3  validar">
                                           <label for="">Toluca</label><br>
                                           <input type="radio" name="tol" class="form-check-input" id="tol-si" value="1">
                                           <label for="tol-si" class="form-check-label">Si</label>
                                           <input type="radio" name="tol" class="form-check-input"  id="tol-no" value="0" checked>
                                           <label for="tol-no" class="form-check-label">No</label>
                                         </div>


                                         <div class="col-sm-3  validar">
                                          <label for="">Ecatepec</label><br>
                                          <input type="radio" name="eca" class="form-check-input" id="eca-si" value="1">
                                          <label for="eca-si" class="form-check-label">Si</label>
                                          <input type="radio" name="eca" class="form-check-input"  id="eca-no" value="0" checked>
                                          <label for="eca-no" class="form-check-label">No</label>
                                        </div>


                                        <div class="col-sm-3  validar">
                                         <label for="">Nezahualcoyotol</label><br>
                                         <input type="radio" name="nez" class="form-check-input" id="nez-si" value="1">
                                         <label for="nez-si" class="form-check-label">Si</label>
                                         <input type="radio" name="nez" class="form-check-input"  id="nez-no" value="0" checked>
                                         <label for="nez-no" class="form-check-label">No</label>
                                       </div>

                                                                                <div class="col-lg-12  validar">
                                                                                 <label for="nic" class="form-label">Nombre Lic</label><br>
                                                                                 <input type="text" class="form-control" id="nic">
                                                                                  </div>

                                        </div>


<p>
  <br />
</p>

                   <button type="submit" class="btn color-btn-success mb-4">Generar PDF</button><br><br><br>
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
