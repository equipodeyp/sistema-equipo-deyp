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
  return $nombreMes."  ".$numeroDia." del ".$anio;
}
// proceso penal
$penal = "SELECT * FROM procesopenal WHERE folioexpediente = '$fol_exp'";
$rpenal = $mysqli->query($penal);
$fpenal = $rpenal->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <!-- <script src="../js/jquery-3.1.1.min.js"></script> -->
  <!-- <link href="../css/jquery.dataTables.min.css" rel="stylesheet"> -->
  <!-- <script src="../js/jquery.dataTables.min.js"></script> -->
  <!-- <script src="../js/bootstrap.min.js"></script> -->
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/expediente.css">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/cli.css">
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
  <!-- <script src="../js/expediente.js"></script> -->
  <!-- <script src="../js/solicitud.js"></script> -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="../css/cli.css"> -->
  <!-- <link rel="stylesheet" href="../css/registrosolicitud1.css"> -->
  <!-- CSS only -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> -->
  <!-- <script src="JQuery.js"></script> -->
  <!-- <script src="../js/Javascript.js"></script> -->
  <!-- <script src="../js/validar_campos.js"></script> -->
  <!-- <script src="../js/verificar_camposm1.js"></script> -->
  <!-- <script src="../js/mascara2campos.js"></script> -->
  <!-- <script src="../js/mod_medida.js"></script> -->
  <!-- <link rel="stylesheet" href="../css/estilos.css">
  <script src="../js/main.js"></script> -->
  <!-- <script src="../js/Javascript.js"></script> -->
  <!-- <script src="../js/validar_campos.js"></script> -->
  <!-- <script src="../js/validarmascara3.js"></script> -->

  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"> -->
  <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
  <!-- <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script> -->
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
  <!-- <link rel="stylesheet" href="../css/main2.css"> -->
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.12.0/semantic.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

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

    table {
      width: 100%;
    }

    td {
      padding: 0;

      /* Por ejemplo, agregar una altura
         en la celda */
      height: 30px;
    }

    input {
      width: 100%;
      height: 100%;
      position: relative;
      padding: 0 10px;

      /* El detalle que faltaba que funcione */
      box-sizing: border-box;
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
       <form action="crear_pdf.php" method="POST">
       <?php
       // CONTAR CUANTAS PERSONAS HAY EN EL EXPEDIENTE
       $contarper = "SELECT COUNT(*) as t from datospersonales WHERE folioexpediente = '$fol_exp'";
       $rcontarper = $mysqli->query($contarper);
       $fcontarper = $rcontarper->fetch_assoc();
       echo $fcontarper['t'];
       // valoracion juridica
       $valjuridica = "SELECT * FROM valoracionjuridica WHERE folioexpediente = '$fol_exp' limit 1";
       $rvaljuridica = $mysqli->query($valjuridica);
       $fvaljuridica = $rvaljuridica->fetch_assoc();
       // autoridad competente
       $autoridad = "SELECT * FROM autoridad WHERE folioexpediente = '$fol_exp' limit 1";
       $rautoridad = $mysqli->query($autoridad);
       while ($fautoridad = $rautoridad->fetch_assoc()) {
       ?>
         <div class="ui page grid">
             <div class="wide column" >
                 <div class="ui segment" style="text-align: center;">
                   <table width="100%">
                     <tr>
                       <td width="10%"><img  src="../image/ESCUDO.png" width="70" height="70"></td>
                       <td width="80%" style="font-family: gothambook" align="center"><br /><br /><br /><BR /><h5 align="center">“2022. AÑO DEL QUINCENTENARIO DE TOLUCA, CAPITAL DEL ESTADO DE MÉXICO” </h5></td>
                       <td width="10%" style="text-align: right;"><img  src="../image/FGJEM.png" width="70" height="70"></td>
                     </tr>
                   </table>
                   <table width="100%">
                     <tr>
                       <td width="33%" align="center" bgcolor="#A19E9F" style="height:3vh;"><h3 class=""><font color ="#FFFFFF" style="font-family: gothambook">VALORACIÓN JURÍDICA DE LA SOLICITUD DE INGRESO AL PROGRAMA</font></h3></td>
                     </tr>
                   </table>
                   <br />
                   <table width="100%" >
                     <tr >
                       <td width="25%"></td>
                       <td width="25%" align="center" ></td>
                       <td width="50%" style="text-align: center; height:3vh;" bgcolor="#A19E9F"><font color ="#FFFFFF" style="font-family: gothambook"><h4><?php echo $fol_exp; ?></h4></font></td>
                     </tr>
                   </table>
                   <br />
                   <p align="right">
                   <span style="align:right;width:200px"><font style="font-family: gothambook">
                   Toluca de Lerdo, Estado de México,
                   </font></span><br />
                   <span style="align:right;width:200px"><font style="font-family: gothambook">
                   <?php echo fechaEs($miFecha); ?>.</font></span>
                   </p>
                   <h3 style="font-family: gothambook" align="center">DATOS GENERALES DEL EXPEDIENTE</h3>
                   <table id="estatusexpediente" border="1px" cellspacing="0" width="100%" bordered>
                     <thead>
                       <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">OFICIO DE SOLICITUD</font></th>
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">FECHA DE SOLICITUD</font></th>
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">ZONA GEOGRÁFICA</font></th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr >
                         <td style="height:5vh; border: 0px solid black; text-align:center">
                         <font style="font-family: gothambook">
                         <!-- <input type="text" name="fname" class="form-control" placeholder="First Name"> -->
                         <input style="text-align:center; width: 100%" type="text" name="oficiosolicitud" autocomplete="off" value="<?php echo $fautoridad['idsolicitud']; ?>" readonly>
                         </font>
                         </td>
                         <td style="height:5vh; border: 0px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="fechasolicitud" autocomplete="off" value="<?php echo date("d/m/Y", strtotime($fautoridad['fechasolicitud'])); ?>" readonly>
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                         <td style="height:5vh; border: 0px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="zonageografica" autocomplete="off" value="<?php echo $fpenal['numeroradicacion']; ?>" readonly>
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                       </tr>
                     </tbody>
                   </table><BR />
                   <table width="100%">
                     <thead>
                       <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
                         <th width="33%" style="border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">DELITO</font></th>
                         <th width="33%" style="border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">CARPETA DE INVESTIGACION Y/O CAUSA PENAL</font></th>
                         <th width="33%" style="border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">ETAPA DE PROCEDMIENTO PENAL</font></th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr >
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <!-- <input style="text-align:center; width: 100%" type="text" name="delito" autocomplete="off" value="<?php if ($fpenal['delitoprincipal'] === 'OTRO') {
                           //   echo $fpenal['otrodelitoprincipal'];
                           // }else {
                           //  echo $fpenal['delitoprincipal'];
                           }?>" readonly> -->
                           <textarea style="text-align:center; width: 100%" name="delito" autocomplete="off" rows="4" cols="80" readonly>&#13;&#10;<?php if ($fpenal['delitoprincipal'] === 'OTRO') {
                             echo $fpenal['otrodelitoprincipal']."\n";
                           }else {
                            echo $fpenal['delitoprincipal']."\n";
                           }
                           if ($fpenal['delitosecundario'] === 'OTRO') {
                             echo $fpenal['otrodelitosecundario']."\n";
                           }else {
                             echo $fpenal['delitosecundario']."\n";
                           }?></textarea>
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="carpetainv" autocomplete="off" value="<?php echo $fpenal['nuc']; ?>" readonly>
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="procpenal" autocomplete="off" value="<?php echo $fpenal['etapaprocedimiento']; ?>" readonly>
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                       </tr>
                     </tbody>
                   </table><br><br />
                   <?php
                   $consecutivo = 0;
                   // datos personales de cada sujeto
                   $datepersona = "SELECT * FROM datospersonales WHERE folioexpediente = '$fol_exp'";
                   $rdatepersona = $mysqli->query($datepersona);
                   while ($fdatepersona = $rdatepersona->fetch_assoc()) {
                     // echo $fdatepersona['identificador'].'<br />';
                     $consecutivo = $consecutivo + 1;
                     $inicialessuj = $fdatepersona['id'];
                     // domicio actual
                     $dom = "SELECT * FROM domiciliopersona WHERE id_persona = '$inicialessuj'";
                     $rdom = $mysqli->query($dom);
                     $fdom = $rdom->fetch_assoc();
                   ?>
                   <h3 style="font-family: gothambook" align="center">DATOS DE LA PERSONA PROPUESTA <?php echo $consecutivo; ?></h3>
                   <table width="100%">
                     <thead>
                       <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">INICIALES</font></th>
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">TIPO DE INTERVENCION</font></th>
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">¿PRIVADO DE LA LIBERTAD?</font></th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr >
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="inicialessuj[]" autocomplete="off" value="<?php echo $fdatepersona['identificador']; ?>">
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="tipointervencion[]" autocomplete="off" value="<?php if ($fdatepersona['calidadprocedimiento'] === 'OTROS') {
                             echo $fdatepersona['especifique'];
                           }else {
                            echo $fdatepersona['calidadprocedimiento'];
                           }?>">
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="privadolibertad[]" autocomplete="off" value="<?php echo $fdom['lugar'];?>">
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                       </tr>
                     </tbody>
                   </table>
                   <table width="100%">
                     <thead>
                       <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">UBICACION DE LA PERSONA</font></th>
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">¿ASISTENCIA LEGAL?</font></th>
                         <th id="div1" width="33%" style="display:none; height:4vh; border: 1px solid black; text-align:center;"><font color ="#FFFFFF" style="font-family: gothambook">NOMBRE DE LA PERSONA QUE LO ASISTE</font></th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr >
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <!-- <input style="text-align:center; width: 100%" type="text" name="ubicacion[]" autocomplete="off"> -->
                           <textarea style="text-align:center; width: 100%" name="ubicacion[]" autocomplete="off" rows="4" cols="80">&#13;&#10;</textarea>
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <!-- <input style="text-align:center; width: 100%" type="text" name="asistencialegal" autocomplete="off"> -->
                           <div class="form-check form-check-inline">
                             <label class="form-check-label" for="inlineRadio1">SI</label>
                             <input class="pago form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="ASISTENCIA_SI">
                           </div>
                           <div class="form-check form-check-inline">
                             <label class="form-check-label" for="inlineRadio2">NO</label>
                             <input class="pago form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="ASISTENCIA_NO">
                           </div>
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                         <td id="div2" style="display:none; height:5vh; border: 1px solid black; text-align:center;">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="personaasiste" autocomplete="off">
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                       </tr>
                     </tbody>
                   </table><br />
                   <table width="100%">
                     <thead>
                       <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
                         <th width="50%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">SITUACION DE RIESGO</font></th>
                         <th width="50%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">CAUSA DE VULNERABILIDAD</font></th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr >
                         <td width="50%" style="word-break: break-all; height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <!-- <input style="text-align:center; width: 100%" type="text" name="situacionriesgo" autocomplete="off"> -->
                           <textarea style="text-align:center; width: 100%" name="situacionriesgo" autocomplete="off" rows="4" cols="80">&#13;&#10;</textarea>
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                         <td width="50%" style="word-break: break-all; height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <!-- <input style="text-align:center; width: 100%" type="text" name="causavulnerabilidad" autocomplete="off"> -->
                           <textarea style="text-align:center; width: 100%" name="causavulnerabilidad" autocomplete="off" rows="4" cols="80">&#13;&#10;</textarea>
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                       </tr>
                     </tbody>
                   </table><br />


                       <table >
                         <thead>
                           <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
                             <th  style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">¿PRESENTA ALGUNA ENFERMEDAD?</font></th>
                             <!-- <th width="50%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">¿PRESENTA ALGUNA DISCAPACIDAD?</font></th> -->
                           </tr>
                         </thead>
                         <tbody>
                           <tr >
                             <td style="height:5vh; border: 1px solid black; text-align:center">
                             <font style="font-family: gothambook">
                               <!-- <input style="text-align:center; width: 100%" type="text" name="enfermedad" autocomplete="off"> -->
                               <div class="form-check form-check-inline">
                                 <label class="form-check-label" for="inlineRadio1">SI</label>
                                 <input class="enfermo form-check-input" type="radio" name="enfermedad" id="inlineRadio1" value="ENFERMEDAD_SI">
                               </div>
                               <div class="form-check form-check-inline">
                                 <label class="form-check-label" for="inlineRadio2">NO</label>
                                 <input class="enfermo form-check-input" type="radio" name="enfermedad" id="inlineRadio2" value="ENFERMEDAD_NO">
                               </div>
                             <!-- // aqui va la variable que se trae desde el front-end -->
                             </font>
                             </td>
                           </tr>
                         </tbody>
                       </table>
                       <div class="input-group" >
                         <div class="" style="width: 100%; display:none;" id="tipoenfermedad">
                           <span class="input-group-text" style="background: #A19E9F; color:#FFFFFF;"><b>TIPO</b></span>
                           <textarea class="form-control " aria-label="With textarea" rows="3"></textarea>
                         </div>
                         <!-- <div class="" style="width: 50%; display:none;" id="tipodiscapacidad">
                           <span class="input-group-text" style="background: #A19E9F; color:#FFFFFF;"><b>TIPO</b></span>
                           <textarea class="form-control " aria-label="With textarea" rows="3"></textarea>
                         </div> -->
                       </div><br />


                       <table >
                         <thead>
                           <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
                             <!-- <th width="50%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">¿PRESENTA ALGUNA ENFERMEDAD?</font></th> -->
                             <th width="50%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">¿PRESENTA ALGUNA DISCAPACIDAD?</font></th>
                           </tr>
                         </thead>
                         <tbody>
                           <tr >
                             <td style="height:5vh; border: 1px solid black; text-align:center">
                             <font style="font-family: gothambook">
                               <!-- <input style="text-align:center; width: 100%" type="text" name="discapacidad" autocomplete="off"> -->
                               <div class="form-check form-check-inline">
                                 <label class="form-check-label" for="inlineRadio1">SI</label>
                                 <input class="discapacitado form-check-input" type="radio" name="discapacidad" id="inlineRadio1" value="DISCAPACIDAD_SI">
                               </div>
                               <div class="form-check form-check-inline">
                                 <label class="form-check-label" for="inlineRadio2">NO</label>
                                 <input class="discapacitado form-check-input" type="radio" name="discapacidad" id="inlineRadio2" value="DISCAPACIDAD_NO">
                               </div>
                             <!-- // aqui va la variable que se trae desde el front-end -->
                             </font>
                             </td>
                           </tr>
                         </tbody>
                       </table>
                       <div class="input-group" >
                         <!-- <div class="" style="width: 50%; display:none;" id="tipoenfermedad">
                           <span class="input-group-text" style="background: #A19E9F; color:#FFFFFF;"><b>TIPO</b></span>
                           <textarea class="form-control " aria-label="With textarea" rows="3"></textarea>
                         </div> -->
                         <div class="" style="width: 100%; display:none;" id="tipodiscapacidad">
                           <span class="input-group-text" style="background: #A19E9F; color:#FFFFFF;"><b>TIPO</b></span>
                           <textarea class="form-control " aria-label="With textarea" rows="3"></textarea>
                         </div>
                       </div>



                   <br>
                   <table width="100%">
                     <thead>
                       <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
                         <th style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">NECESIDAD DEL PORQUE LLEVAR SU TESTIMONIO A JUICIO</font></th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr >
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <!-- <input style="text-align:center; width: 100%" type="text" name="testimonio" autocomplete="off"> -->
                           <textarea style="text-align:center; width: 100%" name="testimonio" autocomplete="off" rows="4" cols="80">&#13;&#10;</textarea>
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                       </tr>
                     </tbody>
                   </table>
                   <table width="105%">
                     <thead>
                       <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
                         <th style="height:4vh; border: 1px solid black;"><font color ="#FFFFFF" style="font-family: gothambook">MEDIDAS SOLICITADAS POR EL AGENTE DEL MINISTERIO PUBLICO DE LA INVESTIGACION</font></th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr >
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <!-- <input style="text-align:center; width: 100%" type="text" name="medidas" autocomplete="off"> -->
                           <textarea style="text-align:center; width: 100%" name="medidas" autocomplete="off" rows="4" cols="80">&#13;&#10;</textarea>
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                       </tr>
                     </tbody>
                   </table>
                   <br><br>
                   <?php
                   }
                   ?>
                   <h3 style="font-family: gothambook" align="center">DATOS DEL SOLICITANTE</h3>
                   <table width="100%">
                     <thead>
                       <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
                         <th width="50%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">AGENTE DEL MINISTERIO PUBLICO</font></th>
                         <th width="50%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">ORGANO JURISDICCIONAL</font></th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr >
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <!-- <input style="text-align:center; width: 100%" type="text" name="agenteministerio" autocomplete="off"> -->
                           <div class="form-check form-check-inline">
                             <input style="width: 30px; height: 30px" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" onchange="javascript:showContent()">
                             <label class="form-check-label" for="inlineCheckbox1"></label>
                           </div>
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <!-- <input style="text-align:center; width: 100%" type="text" name="organojurisdiccional" autocomplete="off"> -->
                           <div class="form-check form-check-inline">
                             <input style="width: 30px; height: 30px" class="form-check-input" type="checkbox" id="inlineCheckbox12" value="option1" onchange="javascript:showContent2()">
                             <label class="form-check-label" for="inlineCheckbox1"></label>
                           </div>
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                       </tr>
                     </tbody>
                   </table><br>
                   <table width="100%">
                     <thead>
                       <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">NOMBRE</font></th>
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">CARGO</font></th>
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">ADSCRIPCION</font></th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr >
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="nombreagente" autocomplete="off">
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="cargoagente" autocomplete="off">
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="adscripcionagente" autocomplete="off">
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                       </tr>
                     </tbody>
                   </table>
                   <table width="100%">
                     <thead>
                       <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">TEL. OFICINA</font></th>
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">CELULAR</font></th>
                         <th width="33%" style="height:4vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">CORREO ELECTRONICO</font></th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr >
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="teloficina" autocomplete="off">
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="celular" autocomplete="off">
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                         <td style="height:5vh; border: 1px solid black; text-align:center">
                         <font style="font-family: gothambook">
                           <input style="text-align:center; width: 100%" type="text" name="correoelectronico" autocomplete="off">
                         <!-- // aqui va la variable que se trae desde el front-end -->
                         </font>
                         </td>
                       </tr>
                     </tbody>
                   </table>
                   <br><br><br>
                   <h3 style="font-family: gothambook" align="center">VALORACION JURIDICA</h3>
                   <?php
                   if ($fvaljuridica['resultadovaloracion'] === 'SI PROCEDE') {
                     ?>
                     <table width="100%">
                       <thead>
                         <tr style="border: 1px solid black;" >
                           <th width="20%" style="height:4vh; border: 1px solid black; text-align:center" bgcolor = "#A19E9F"><font color ="#FFFFFF" style="font-family: gothambook">PROCEDENTE</font></th>
                           <th width="80%" style="height:4vh; border: 1px solid black; text-align:center">
                           <font style="font-family: gothambook">
                             <!-- <input style="text-align:center; width: 100%" type="text" name="procedente" autocomplete="off"> -->
                             <i class="fa fa-check" aria-hidden="true" style="font-size:30px;color:green;"></i>
                           <!-- // aqui va la variable que se trae desde el front-end -->
                           </font>
                           </th>
                         </tr>
                       </thead>
                     </table><br>
                     <?php
                   }else {
                     ?>

                     <table width="50%" class="col-lg-12">
                       <thead>
                         <tr style="border: 1px solid black;" >
                           <th width="20%" style="height:4vh; border: 1px solid black; text-align:center" bgcolor = "#A19E9F"><font color ="#FFFFFF" style="font-family: gothambook">NO PROCEDENTE</font></th>
                           <th width="80%" style="height:4vh; border: 1px solid black; text-align:center">
                           <font style="font-family: gothambook">
                             <!-- <input style="text-align:center; width: 100%" type="text" name="noprocedente" autocomplete="off"> -->
                             <i class="fa fa-check" aria-hidden="true" style="font-size:30px;color:green;"></i>
                           <!-- // aqui va la variable que se trae desde el front-end -->
                           </font>
                           </th>
                         </tr>
                       </thead>
                     </table><br>
                     <?php
                   }
                   ?>

                   <br>
                   <h3 style="font-family: gothambook" align="center">ACUERDO</h3>
                   <div class="form-group">
                     <textarea style="text-align:justify;" class="form-control" id="exampleFormControlTextarea1" rows="10">Una vez que se realizó el análisis de la solicitud de incorporación al Programa de Protección a Sujetos que Intervienen en el Procedimiento Penal o de Extinción de Dominio, <?php
                     $contarper = "SELECT COUNT(*) as t from datospersonales WHERE folioexpediente = '$fol_exp'";
                     $rcontarper = $mysqli->query($contarper);
                     $fcontarper = $rcontarper->fetch_assoc();
                     $tper = $fcontarper['t'];
                     if ($tper === '1') {
                       echo 'la Persona Propuesta';
                     }else {
                       echo ' las Personas Propuestas';
                     }
                     ?> de identidad reservada de iniciales <?php
                     $mostrarcont = 0;
                     $datepersona2 = "SELECT identificador FROM datospersonales WHERE folioexpediente = '$fol_exp'";
                     $rdatepersona2 = $mysqli->query($datepersona2);
                     while ($fdatepersona2 = $rdatepersona2->fetch_assoc()) {
                       $mostrarcont = $mostrarcont + 1;
                       echo $fdatepersona2['identificador'].', ';
                       if ($mostrarcont === $tper - 1) {
                         echo " y ";
                       }
                     }
                     ?> se determinó que cumple con los requisitos de ley, por lo que se dio inicio al Expediente de Protección registrado bajo el número <?php
                     echo $fol_exp.';';
                     ?> y al no existir impedimento legal alguno, se remite solicitud de la incorporación y el inicio del expediente de protección correspondiente, así como, la valoración jurídica a la Subdirección de Análisis de Riesgo, para que gire las instrucciones respectivas, a efecto, de que se realicen los Estudios multidisciplinarios correspondientes;
                   </textarea>
                   </div>
                   <br /><br />
                   <div>

                       <div style="float: left; width: 60%;">
                       <p align="center">
                       <span style="align:center;width:200px">____________________________________________________</span><br /><br />
                       <span style="align:center;width:200px"><font style="font-family: gothambook">
                       <input style="text-align:center; width: 70%" class="form-control" type="text" name="" placeholder="LIC." value="">
                       </font></span><br />
                       <span style="align:center;width:200px"><font style="font-family: gothambook">
                       AGENTE DEL MINISTERIO PUBLICO
                       </font></span><br />
                       </p>
                       <br /><br /><br />
                       <p align="center">
                       <span style="align:center;width:200px">____________________________________________________</span><br />
                       <span style="align:center;width:200px"><font style="font-family: gothambook">
                       V.°B.°
                       </font></span><br />
                       <span style="align:center;width:200px"><font style="font-family: gothambook">
                       <input style="text-align:center; width: 70%" class="form-control" type="text" name="" placeholder="LIC." autocomplete="off" value="">
                       </font></span><br />
                       <span style="align:center;width:200px"><font style="font-family: gothambook">
                       ADSCRITO A LA SUBDIRECCION DE APOYO TECNICO Y JURIDICO
                       </font></span><br />
                       </p>
                       </div>

                       <div style="float: right; width: 40%;"><BR /><BR /><BR />

                       <table align="right" width="70%">
                         <thead>
                           <tr style="border: 1px solid black;" bgcolor = "#A19E9F">
                             <th style="height:3vh; border: 1px solid black; text-align:center"><font color ="#FFFFFF" style="font-family: gothambook">SEDE</font></th>
                           </tr>
                         </thead>
                         <tbody>
                           <tr >
                             <td style="height:3vh; border: 1px solid black; text-align:center">
                             <font style="font-family: gothambook">
                             <input style="text-align:center; width: 100%" type="text" name="lname" value="TOLUCA" autocomplete="off" readonly>
                             </font>
                             </td>
                           </tr>
                         </tbody>
                       </table>

                       </div>
                   </div>
                   <div>
                     <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                   <p align="right">
                   <span style="font-size: .55em; align:center;width:10px"><font style="font-family: gothambook">
                   FISCALÍA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO
                   </font></span><br />
                   <span style="font-size: .55em; align:center;width:10px"><font style="font-family: gothambook">
                   UNIDAD DE PROTECCIÓN DE SUJETOS QUE INTERVIENEN EN UN PROCEDMIENTO PENAL O DE EXTINCIÓN DE DOMINIO
                   </font></span><br />
                   <span style="font-size: .55em; align:center;width:10px"><font style="font-family: gothambook">
                   SUBDIRECCIÓN DE APOYO TÉCNICO Y JURÍDICO
                   </font></span>
                   <table width="100%">
                   <tr>
                   <td width="33%" align="center" bgcolor="#A19E9F" style="height: .5vh;"><h3 class=""></h3></td>
                   </tr>
                   </table>
                   <p align="center">
                   <span style="font-size: .55em; align:center;width:10px">MANUEL MA. CONTRERAS N° 201 COL. VÉRTICE, TOLUCA, ESTADO DE MÉXICO, C.P. 50090,
                   TELS. 722 226 16 00, EXT. 3215
                   </span>
                   </p>
                   <p align="center">
                   <span style="font-size: .55em;">Pagina 1 de n</span>
                   </p>
                   </p>
                   </div>
                 <button class="btn btn-success" type="submit">Create PDF</button>
                 </div>
             </div>
         </div>
         <?php
          }
         ?>
         </form>
  </div>
</div>
<a href="../subdireccion_de_apoyo_tecnico_juridico/modificar.php?id=<?php echo $fol_exp; ?>" class="btn-flotante">REGRESAR</a>
<script type="text/javascript">
$(document).ready(function(){
        $(".pago").click(function(evento){
            var valor = $(this).val();
            if(valor == 'ASISTENCIA_SI'){
              $("#div1").show();
              $("#div2").show();
                console.log('si hay asistencialegal');
            }else{
              $("#div1").hide();
              $("#div2").hide();
                console.log('no hay asistencialegal');
            }
    });
});
//
$(document).ready(function(){
        $(".enfermo").click(function(evento){
            var valor = $(this).val();
            if(valor == 'ENFERMEDAD_SI'){
              $("#tipoenfermedad").show();
                console.log('si hay enfermedad');
            }else{
              $("#tipoenfermedad").hide();
                console.log('no hay enfermedad');
            }
    });
});
//
$(document).ready(function(){
        $(".discapacitado").click(function(evento){
            var valor = $(this).val();
            if(valor == 'DISCAPACIDAD_SI'){
              $("#tipodiscapacidad").show();
                console.log('si hay discapacidad');
            }else{
              $("#tipodiscapacidad").hide();
                console.log('no hay discapacidad');
            }
    });
});
//
function showContent() {
       check = document.getElementById("inlineCheckbox1");
       if (check.checked) {
           console.log('seleccionado');
           document.getElementById("inlineCheckbox12").disabled = true;
       }
       else {
         console.log('no seleccionado');
           document.getElementById("inlineCheckbox12").disabled = false;
       }
   }
//
function showContent2() {
       check2 = document.getElementById("inlineCheckbox12");
       if (check2.checked) {
           console.log('seleccionado');
           document.getElementById("inlineCheckbox1").disabled = true;
       }
       else {
         console.log('no seleccionado');
           document.getElementById("inlineCheckbox1").disabled = false;
       }
   }
</script>
</body>
</html>
