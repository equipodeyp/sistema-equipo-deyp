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
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.12.0/semantic.min.css" />
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

       <!--  -->
       <div class="secciones">


       <div class="ui page grid col-lg-12">
           <div class="wide column"><br><br><br><br>
               <!-- <h3 class="ui header aligned center">“2022. AÑO DEL QUINCENTENARIO DE TOLUCA, CAPITAL DEL ESTADO DE MÉXICO”</h3> -->
               <div class="ui divider hidden">
               </div>



                   <!-- <div class="ui divider">
                   </div> -->
                   <form class="ui form">


                     <div class="ui segment">
                          <div class="main bg-light">
                          <img src="../image/ESCUDO.png" alt="" width="150" height="100">
                          <img src="../image/FGJEM.png" alt="" width="150" height="100" align = "right">
                        </div>


                       <h4 class="ui dividing header aligned center">“2022. AÑO DEL QUINCENTENARIO DE TOLUCA, CAPITAL DEL ESTADO DE MÉXICO” </h4>
                       <div class="two fields">


                         <h2 class="ui dividing header aligned center">VALORACIÓN JURÍDICA DE LA SOLICITUD DE INGRESO AL PROGRAMA </h2>
                         <div class="two fields">


                         <div class="col-lg-12">
                             <label for="">Expediente</label>
                             <input type="text" name="first-name">
                         </div>



                           <div class="col-lg-12">
                               <label for="">Fecha de captura de datos</label>
                               <input type="text" name="first-name">
                           </div>


                           <div class="col-lg-12">
                               <label for="">Fecha de solicitud</label>
                               <input type="text" name="last-name">
                           </div>

                       </div>
                     </div>


                       <form class="ui form">
                           <h4 class="ui dividing header">Datos de la persona propuesta
                           </h4>
                           <div class="two fields">
                               <div class="field">
                                   <label for="">Nombre(Iniciales)</label>
                                   <input type="text" name="first-name">
                               </div>
                               </div>


                                   <h4 class="ui dividing header">Intervencion
                                   </h4>
                                   <div class="two fields">

                                     <div class="col-sm-5  validar">
                                    <label for="">Tipo de Intervencion</label><br><br>
                                    <input type="radio" name="vic" class="form-check-input" id="vic-si" value="1">
                                    <label for="vic-si" class="form-check-label">Victima</label>&nbsp &nbsp
                                    <input type="radio" name="vic" class="form-check-input" id="vic-no" value="0">
                                    <label for="vic-no" class="form-check-label">Ofendido</label>&nbsp &nbsp
                                    <input type="radio" name="vic" class="form-check-input" id="vic-no" value="0">
                                    <label for="vic-no" class="form-check-label">Testigo/Colaborador</label>&nbsp &nbsp
                                    <input type="radio" name="vic" class="form-check-input" id="vic-no" value="0">
                                    <label for="vic-no" class="form-check-label">Perito</label>&nbsp &nbsp &nbsp
                                    <input type="radio" name="vic" class="form-check-input" id="vic-no" value="0">
                                    <label for="vic-no" class="form-check-label">Ministerio Público </label> &nbsp &nbsp
                                    <input type="radio" name="vic" class="form-check-input" id="vic-no" value="0">
                                    <label for="vic-no" class="form-check-label">Defensor</label>&nbsp &nbsp
                                    <input type="radio" name="vic" class="form-check-input" id="vic-no" value="0">
                                    <label for="vic-no" class="form-check-label">Policía</label>&nbsp &nbsp &nbsp
                                    <input type="radio" name="vic" class="form-check-input" id="vic-no" value="0">
                                    <label for="vic-no" class="form-check-label">Juez</label>&nbsp &nbsp
                                    <input type="radio" name="vic" class="form-check-input" id="vic-no" value="0">
                                    <label for="vic-no" class="form-check-label">Magistrado</label>
                                  </div>



                            <div class="col-lg-5  validar"><br>
                                        <label for="otr" class="form-label">Otro</label><br>
                                        <input type="text" class="form-control" id="anex">
                                    </div>



                                    <div class="col-lg-12  validar"><br>
                                    <label for="del" class="form-label">Delito</label><br>
                                    <textarea></textarea>
                                    </div>

                                    <div class="col-lg-12  validar"><br><br>
                                    <label for="car" class="form-label">Carpeta de Investigación y/o Causa penal</label><br>
                                    <input type="text" class="form-control" id="car">
                                    </div>


                                   <div class="col-lg-3  validar"><br>
                                   <label for="">Privado de la Libertad</label><br>
                                   <input type="radio" name="priv" class="form-check-input" id="priv-si" value="1">
                                  <label for="priv-si" class="form-check-label">Si</label>
                                   <input type="radio" name="priv" class="form-check-input"  id="priv-no" value="0" checked>
                                   <label for="priv-no" class="form-check-label">No</label>
                                   </div>


                                  <div class="col-lg-12  validar"><br>
                                  <label for="ubi" class="form-label">Ubicación de la Persona</label><br>
                                  <textarea></textarea>
                                 </div>

                                   <div class="col-lg-12  validar"><br>
                                   <label for="">Asistencia Legal</label><br>
                                  <input type="radio" name="asis" class="form-check-input" id="asis-si" value="1">
                                  <label for="asis-si" class="form-check-label">Si</label>
                                  <input type="radio" name="asis" class="form-check-input"  id="asis-no" value="0" checked>
                                  <label for="asis-no" class="form-check-label">No</label>
                                   </div>

                                 <div class="col-lg-12  validar"><br>
                                 <label for="nope" class="form-label">Nombre de la Persona que lo asiste</label><br>
                                 <input type="text" class="form-control" id="nope">
                                 </div>


                                 <div class="col-lg-3  validar"><br>
                                 <label>Situación de Riesgo</label>
                                 <textarea></textarea>
                                 </div>

                                 <div class="col-lg-12  validar"><br>
                                 <label for="zon" class="form-label">Zona Geografica</label><br>
                                 <input type="text" class="form-control" id="zon">
                                 </div>

                                 <div class="col-lg-12  validar"><br>
                                 <label for="cau" class="form-label">Causa de Vulnerabilidad</label><br>
                                 <textarea></textarea>
                                 </div>


                                 <div class="col-lg-12  validar"><br><br><br>
                                 <label for="pree" class="form-label">Presenta alguna enfermedad</label><br>
                                 <input type="text" class="form-control" id="pree">
                                 </div>

                                 <div class="col-lg-12  validar"><br>
                                 <label for="pred" class="form-label">Presenta alguna discapacidad</label><br>
                                 <input type="text" class="form-control" id="pred">
                                 </div>

                                 <div class="col-lg-12  validar"><br>
                                 <label for="nec" class="form-label">Necesidad del porque llevar su testimonio a juicio</label><br>
                                 <textarea></textarea>
                                 </div>


                                 <div class="col-lg-12  validar"><br>
                                 <label for="med" class="form-label">Medidas de apoyo solicitadas</label><br>
                                 <textarea></textarea>
                                 </div>

                     </div>

                     <form class="ui form">
                         <h4 class="ui dividing header">Datos del solicitante
                         </h4>
                                                                   <div class="col-sm-3  validar"><br>
                                                                    <label for="">Agenten del Ministerio Publico</label><br>
                                                                    <input type="radio" name="age" class="form-check-input" id="age-si" value="1">
                                                                    <label for="age-si" class="form-check-label">Si</label>
                                                                    <input type="radio" name="age" class="form-check-input" id="age-no" value="0"
                                                                        checked>
                                                                    <label for="age-no" class="form-check-label">No</label>
                                                                  </div>

                                                                   <div class="col-sm-3  validar"><br>
                                                                    <label for="">Órgano Jurisdiccional</label><br>
                                                                    <input type="radio" name="org" class="form-check-input" id="org-si" value="1">
                                                                    <label for="org-si" class="form-check-label">Si</label>
                                                                    <input type="radio" name="org" class="form-check-input"  id="org-no" value="0" checked>
                                                                    <label for="org-no" class="form-check-label">No</label>
                                                                  </div>


                                                                  <div class="col-lg-12  validar"><br>
                                                                  <label for="pred" class="form-label">Nombre</label><br>
                                                                  <input type="text" class="form-control" id="pred">
                                                                  </div>

                                                                  <div class="col-lg-12  validar"><br>
                                                                  <label for="pred" class="form-label">Cargo</label><br>
                                                                  <input type="text" class="form-control" id="pred">
                                                                  </div>

                                                                  <div class="col-lg-12  validar"><br>
                                                                  <label for="pred" class="form-label">Adscripcion</label><br>
                                                                  <input type="text" class="form-control" id="pred">
                                                                  </div>

                                                                  <div class="col-lg-12  validar"><br><br><br>
                                                                  <label for="pred" class="form-label">Tel. Oficina</label><br>
                                                                  <input type="text" class="form-control" id="pred">
                                                                  </div>


                                                                  <div class="col-lg-12  validar"><br>
                                                                  <label for="pred" class="form-label">Celular</label><br>
                                                                  <input type="text" class="form-control" id="pred">
                                                                  </div>


                                                                  <div class="col-lg-12  validar"><br>
                                                                  <label for="pred" class="form-label">Correo Electronico</label><br>
                                                                  <input type="text" class="form-control" id="pred">
                                                                  </div>






                      <form class="ui form">
                      <h4 class="ui dividing header">Dictamen
                      </h4>
                      <div class="col-sm-3  validar">


                                <div class="main bg-light">
                                <img src="../image/dictamen.png" alt="" width="700" height="250">
                                 </div>


                                       <div class="field">
                                      <label for="">Nombre(Iniciales)</label>
                                       <input type="text" name="first-name" >
                                        </div>


                                        <div class="col-sm-3  validar">
                                         <label for="">Procedente</label><br>
                                         <input type="radio" name="org" class="form-check-input" id="org-si" value="1">
                                         <label for="org-si" class="form-check-label">Si</label>
                                         <input type="radio" name="org" class="form-check-input"  id="org-no" value="0" checked>
                                         <label for="org-no" class="form-check-label">No</label>
                                       </div>




                                       <div class="col-sm-3  validar"><br>
                                            <label for="">Municipio</label><br>
                                            <input type="radio" name="org" class="form-check-input" id="org-si" value="1">
                                            <label for="org-si" class="form-check-label">TOLUCA</label>&nbsp &nbsp
                                            <input type="radio" name="org" class="form-check-input"  id="org-no" value="0" checked>
                                            <label for="org-no" class="form-check-label">ECATEPEC</label>&nbsp &nbsp
                                            <input type="radio" name="org" class="form-check-input"  id="org-no" value="0" checked>
                                            <label for="org-no" class="form-check-label">NEZAHUALCOYÓTL</label>&nbsp &nbsp
                                          </div>



                                          <div class="ui segment"><br>
                                               <img src="../image/firma.png" alt="" width="300" height="100">
                                             </div>


                                          <div class="field"><br>
                                         <label for="">LIC.ADSCRITO A LA SUBDIRECCIÓN DE APOYO TÉCNICO Y JURÍDICO</label>
                                          <input type="text" name="first-name" >
                                           </div>


                                           <div class="ui segment"><br>
                                                <div class="main bg-light">
                                                <img src="../image/pie.png" alt="" width="700" height="100">
                                              </div>


                       </div>

                       <br><br>


       </div>




                   </form>
               </div><br><br>
               <div class="ui button aligned center teal" id="create_pdf">Generar PDF
               </div>

           </div>
       </div>
       </div>

       <!-- <script src="./lib/jquery.min.js"></script> -->
       <script type="text/javascript" src="../js/jspdf.min.js"></script>
       <script type="text/javascript" src="../js/html2canvas.min.js"></script>
       <script type="text/javascript" src="../js/appval.js"></script>

       <!--  -->

<a href="../subdireccion_de_apoyo_tecnico_juridico/modificar.php?id=<?php echo $fol_exp; ?>" class="btn-flotante">REGRESAR</a>
<script src="../js/jspdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script src="../js/app.js"></script>
</body>
</html>
