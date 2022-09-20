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
echo $fol_exp.'<br />';
$sql = "SELECT * FROM expediente WHERE fol_exp = '$fol_exp'";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);
setlocale(LC_TIME, "spanish");
$fecharep = $row['fecha'];
$fechares = str_replace("/", "-", $fecharep);
$newDate = date("d-m-Y", strtotime($fechares));
$mesDesc = strftime("%d de %B de %Y", strtotime($newDate));

$fecharep1 = $row['fecharecep'];
$fechares1 = str_replace("/", "-", $fecharep1);
$newDate1 = date("d-m-Y", strtotime($fechares1));
$mesDesc1 = strftime("%B de %Y", strtotime($newDate1));
//
// $sql = "SELECT * FROM tickets WHERE usuario = '$full_name'";
// $result = mysqli_query($mysqli, $sql);
// $rowcount = mysqli_num_rows( $result );
// $suma = $rowcount + 1;
// $num_incidencia = 0 . $suma;
// // echo $num_incidencia;
$miFecha = $newDate;
$miFecha2 = $newDate1;
function fechaEs($fecha) {
$fecha = substr($fecha, 0, 10);
$numeroDia = date('d', strtotime($fecha));
$dia = date('l', strtotime($fecha));
$mes = date('F', strtotime($fecha));
$anio = date('Y', strtotime($fecha));
$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
$nombredia = str_replace($dias_EN, $dias_ES, $dia);
$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
return $numeroDia." de ".$nombreMes." de ".$anio;
}
// proceso penal
$penal = "SELECT * FROM procesopenal WHERE folioexpediente = '$fol_exp'";
$rpenal = $mysqli->query($penal);
$fpenal = $rpenal->fetch_assoc();
// domicio actual
$dom = "SELECT * FROM domiciliopersona WHERE folioexpediente = '$fol_exp'";
$rdom = $mysqli->query($dom);
$fdom = $rdom->fetch_assoc();
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
  <style media="screen">
  #container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  border:1px solid;
  background-color: #e4e3e4;
}

#resultado1,#resultado2,#resultado3,#resultado4 {
  background-color: red;
  width: 100px;
  height: 100px;
  margin: 10px;
margin-left:auto; margin-right:0;

}


#sidebar{
        width: 25%;
        margin-bottom: 30px;
        background: orange;
        padding: 30px;
        border: orange;
    }
  </style>
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

          <!-- menu de navegacion de la parte de arriba -->
          <div class="secciones form-horizontal sticky breadcrumb flat">
                <a href="../subdireccion_de_apoyo_tecnico_juridico/menu.php">REGISTROS</a>
                <a href="../subdireccion_de_apoyo_tecnico_juridico/modificar.php?id=<?php echo $fol_exp; ?>">EXPEDIENTE</a>
                <a class="actived">LISTA DE FORMATOS</a>
          </div>
        </div>
      </div>

       <!--  -->



       <div class="ui page grid col-lg-12">
           <div class="wide column"><br>
               <!-- <h3 class="ui header aligned center">“2022. AÑO DEL QUINCENTENARIO DE TOLUCA, CAPITAL DEL ESTADO DE MÉXICO”</h3> -->
               <div class="ui divider hidden">
               </div>
                   <form class="ui form">
                     <div class="ui segment">
                          <div class="main ">
                            <img src="../image/ESCUDO.png" alt="" width="100" height="50">
                            <img src="../image/FGJEM.png" alt="" width="100" height="50" align = "right">
                          </div>

                       <h4 class="align:center">“2022. AÑO DEL QUINCENTENARIO DE TOLUCA, CAPITAL DEL ESTADO DE MÉXICO” </h4>
                       <ul class="list-group col-lg-12" >
                         <li id="container" class="list-group-item col-lg-12">
                           <center>
                             <h3 class="">VALORACIÓN JURÍDICA DE LA SOLICITUD DE INGRESO AL PROGRAMA </h3>
                           </center>
                         </li>
                       </ul>
                       <br><br><br><br>
                       <div class="container">
                         <div class="row">
                           <div class="col-md-6"></div><div class="col-md-6">
                             <span class="pull-right">
                               <ul class="list-group " >
                                 <li id="" class="list-group-item col-lg-12">
                                   <center>
                                     <h3 class=""><?php echo $fol_exp; ?></h3>
                                   </center>
                                 </li>
                               </ul>
                             </span>
                           </div>
                         </div>
                       </div>
                       <br>
                       <div class="container">
                         <div class="row">
                           <div class=""></div><div class="">
                             <span class="pull-right">
                               Toluca de Lerdo, Estado de México, a <?php echo fechaEs($miFecha); ?>
                             </span>
                           </div>
                         </div>
                       </div>
                       <br>
                       <div class="container">
                         <div class="row">
                           <div class=""></div><div class="">
                             <span class="pull-right">
                               Fecha de solicitud: <?php echo fechaEs($miFecha2); ?>
                             </span>
                           </div>
                         </div>
                       </div>
                       <br><br>
                       <center>
                         <h3 class="ui ">DATOS DE LA PERSONA PROPUESTA</h3>
                       </center>
                       <br>

                       <ul class="list-group col-lg-12" >
                         <li id="" class="list-group-item col-lg-12">
                           <label for="">Iniciales:
                             <?php
                             $inicialescont = "SELECT count(*) as t FROM datospersonales WHERE folioexpediente = '$fol_exp'";
                             $rinicialescont = $mysqli->query($inicialescont);
                             $finicialescont = $rinicialescont->fetch_assoc();
                             // echo $finicialescont['t'];
                             $contar = 0;
                             $iniciales = "SELECT * FROM datospersonales WHERE folioexpediente = '$fol_exp'";
                             $riniciales = $mysqli->query($iniciales);
                             while ($finiciales = $riniciales->fetch_assoc()) {
                               echo $finiciales['identificador'];
                               $contar = $contar + 1;
                               if ($contar < $finicialescont['t']) {
                                 echo ',    ';
                               }
                             }
                             ?>
                           </label>
                         </li>
                       </ul>
                       <br><br><br>
                       <form class="ui form">
                         <div class="row">
                           <div class="col-lg-12">
                             <div class="table-responsive">
                              <table id="tabla1" border="2px" cellspacing="0" width="100%">
                                 <thead class="">
                                 </thead>
                                 <tbody>
                                   <tr>
                                     <td style="background-color:#A19E9F; border: 1px solid black; border-collapse: collapse;  width: 20px; text-align:center" rowspan="3">TIPO <br> DE <br> INTERVENCIÓN</td>
                                   </tr>
                                   <tr>
                                     <td style="border: 1px solid black; border-collapse: collapse;  width: 110px; text-align:center" >
                                       <label for="vic-si" class="form-check-label">Victima</label><br>
                                       <input type="checkbox" name="vic" class="form-check-input" id="vic-si" value="1"><br>
                                     </td>
                                     <td style="border: 1px solid black; border-collapse: collapse;  width: 110px; text-align:center" >
                                       <label for="vic-no" class="form-check-label">Ofendido</label><br>
                                       <input type="checkbox" name="vic" class="form-check-input" id="vic-no" value="0">
                                     </td>
                                     <td style="border: 1px solid black; border-collapse: collapse;  text-align:center" >
                                       <label for="vic-no" class="form-check-label">Testigo/<br>Colaborador</label><br>
                                       <input type="checkbox" name="vic" class="form-check-input" id="vic-no" value="0">
                                       <br><br>
                                     </td>
                                     <td style="border: 1px solid black; border-collapse: collapse;  text-align:center" >
                                       <label for="vic-no" class="form-check-label">Perito</label><br> &nbsp
                                       <input type="checkbox" name="vic" class="form-check-input" id="vic-no" value="0">
                                     </td>
                                     <td style="border: 1px solid black; border-collapse: collapse;  text-align:center" >
                                       <label for="vic-no" class="form-check-label">Ministerio Público </label> <br>
                                       <input type="checkbox" name="vic" class="form-check-input" id="vic-no" value="0">
                                     </td>
                                   </tr>
                                   <tr>
                                     <td style="border: 1px solid black; border-collapse: collapse;  width: 110px; text-align:center" >
                                       <label for="vic-no" class="form-check-label">Defensor</label><br>
                                       <input type="checkbox" name="vic" class="form-check-input" id="vic-no" value="0">
                                     </td>
                                     <td style="border: 1px solid black; border-collapse: collapse;  width: 110px; text-align:center" >
                                       <label for="vic-no" class="form-check-label">Policía</label><br>
                                       <input type="checkbox" name="vic" class="form-check-input" id="vic-no" value="0">
                                     </td>
                                     <td style="border: 1px solid black; border-collapse: collapse;  text-align:center" >
                                       <label for="vic-no" class="form-check-label">Juez</label><br>
                                       <input type="checkbox" name="vic" class="form-check-input" id="vic-no" value="0">
                                     </td>
                                     <td style="border: 1px solid black; border-collapse: collapse;  text-align:center" >
                                       <label for="vic-no" class="form-check-label">Magistrado</label><br>
                                       <input type="checkbox" name="vic" class="form-check-input" id="vic-no" value="0">
                                     </td>
                                     <td style="border: 1px solid black; border-collapse: collapse;  text-align:center" >
                                       <label for="otr" class="form-label">Otro</label><br>
                                       <input type="text" class="form-control" id="anex">
                                       <br>
                                     </td>
                                   </tr>
                                 </tbody>
                               </table>
                             </div>
                           </div>
                         </div>
                         <br><br><br>
                                   <div class="two fields">
                                     <div class="row">
                                       <div class="col-lg-12">
                                         <div class="table-responsive">
                                          <table id="tabla1" border="2px" cellspacing="0" >
                                             <thead class="">
                                               <tr>
                                                 <!-- <th style="width: 30%; text-align:center"></th>
                                                 <th style="width: 70%; text-align:center"></th> -->
                                               </tr>
                                             </thead>
                                             <tbody>
                                               <tr>
                                                 <td style="width: 35%; background-color:#A19E9F; border: 1px solid black; border-collapse: collapse;   text-align:center">DELITO<br><br></td>
                                                 <td style="width: 65%; border: 1px solid black; border-collapse: collapse; text-align:center"><?php echo $fpenal['delitoprincipal']; ?></td>
                                               </tr>
                                               <tr>
                                                 <td style="width: 35%; background-color:#A19E9F; border: 1px solid black; border-collapse: collapse;   text-align:center">CARPETA DE INVESTIGACIÓN Y/O CAUSA PENAL<br><br></td>
                                                 <td style="width: 65%; border: 1px solid black; border-collapse: collapse; text-align:center"></td>
                                               </tr>
                                                 <td style="width: 35%; background-color:#A19E9F; border: 1px solid black; border-collapse: collapse;   text-align:center">¿PRIVADO DELA LIBERTAD?<br><br></td>
                                                 <td style="width: 65%; border: 1px solid black; border-collapse: collapse; text-align:center"><?php echo $fdom['lugar']; ?></td>
                                               <tr>
                                                 <td style="width: 35%; background-color:#A19E9F; border: 1px solid black; border-collapse: collapse;   text-align:center">UBICACIÓN DE LA PERSONA<br><br></td>
                                                 <td style="width: 65%; border: 1px solid black; border-collapse: collapse; text-align:center"></td>
                                               </tr>
                                               <tr>
                                                 <td style="width: 35%; background-color:#A19E9F; border: 1px solid black; border-collapse: collapse;   text-align:center">¿ASISTENCIA LEGAL? NOMBRE DE LA PERSONA QUE LO ASISTE<br><br></td>
                                                 <td style="width: 65%; border: 1px solid black; border-collapse: collapse; text-align:center"></td>
                                               </tr>
                                               <tr>
                                                 <td style="width: 35%; background-color:#A19E9F; border: 1px solid black; border-collapse: collapse;   text-align:center">SITUACIÓN DEL RIESGO<br><br></td>
                                                 <td style="width: 65%; border: 1px solid black; border-collapse: collapse; text-align:center"></td>
                                               </tr>
                                             </tbody>
                                           </table>
                                         </div>
                                       </div>
                                     </div>
                                     <br><br>
                                 <!-- <div class="col-lg-12  validar"><br>
                                 <label for="zon" class="form-label">Zona Geografica</label><br>
                                 <input type="text" class="form-control" id="zon">
                                 </div> -->

                                 <div class="ui labeled input">
                                   <div class="ui label">
                                     Zona Geografica
                                   </div>
                                   <input type="text" placeholder="">
                                   <div class="ui label">
                                     Estado de México
                                   </div>
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
