<?php
/*require 'conexion.php';*/
// error_reporting(0);
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$id_medida = $_GET['id'];
$medida = "SELECT * FROM medidas WHERE id = '$id_medida'";
$resultadomedida = $mysqli->query($medida);
$rowmedida = $resultadomedida->fetch_array(MYSQLI_ASSOC);
$id_p = $rowmedida['id_persona'];
$fol_exp =$rowmedida['folioexpediente'];

$multidisciplinario = "SELECT * FROM multidisciplinario_medidas WHERE id_medida = '$id_medida'";
$resultadomultidisciplinario = $mysqli->query($multidisciplinario);
$rowmultidisciplinario = $resultadomultidisciplinario->fetch_array(MYSQLI_ASSOC);
//
$fol=" SELECT * FROM datospersonales WHERE id='$id_p'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();
$name_folio=$rowfol['folioexpediente'];
$id_person=$rowfol['id'];
$idunico= $rowfol['identificador'];
$valid = "SELECT * FROM validar_persona WHERE id_persona = '$id_person'";
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
  <link rel="stylesheet" href="../css/main2.css">
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <style media="screen">
  h1 {
          color: yellow;
      }

      /* toggle in label designing */
      .toggle {
          position : relative ;
          display : inline-block;
          width : 70px;
          height : 25px;
          background-color: red;
          border-radius: 30px;
          border: 1px solid #FFFFFF;
      }

      /* After slide changes */
      .toggle:after {
          content: '';
          position: absolute;
          width: 31px;
          height: 25px;
          border-radius: 50%;
          background-color: #999999;
          top: -1px;
          left: 0px;
          transition:  all 0.5s;
      }

      /* Toggle text */
      /* p {
          font-family: Arial, Helvetica, sans-serif;
          font-weight: bold;
      } */

      /* Checkbox checked effect */
      .checkbox:checked + .toggle::after {
          left : 43px;
      }

      /* Checkbox checked toggle label bg color */
      .checkbox:checked + .toggle {
          background-color: #229954;
      }

      /* Checkbox vanished */
      .checkbox {
          display : none;
      }

      /*  */


          /* toggle in label designing */
          .toggle2 {
              position : relative ;
              display : inline-block;
              width : 70px;
              height : 25px;
              background-color: red;
              border-radius: 30px;
              border: 1px solid #FFFFFF;
          }

          /* After slide changes */
          .toggle2:after {
              content: '';
              position: absolute;
              width: 31px;
              height: 25px;
              border-radius: 50%;
              background-color: #999999;
              top: -1px;
              left: 0px;
              transition:  all 0.5s;
          }

          /* Toggle text */
          /* p {
              font-family: Arial, Helvetica, sans-serif;
              font-weight: bold;
          } */

          /* Checkbox checked effect */
          .checkbox2:checked + .toggle2::after {
              left : 43px;
          }

          /* Checkbox checked toggle label bg color */
          .checkbox2:checked + .toggle2 {
              background-color: #229954;
          }

          /* Checkbox vanished */
          .checkbox2 {
              display : none;
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
				   	<a style="text-align:center" class='user-nombre' href='create_ticket.php?folio=<?php echo $rowfol['folioexpediente'];?>'><button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
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
      <form class="container well form-horizontal" method="POST" action="actualizar_medida.php?folio=<?php echo $id_medida; ?>" enctype= "multipart/form-data">
        <div class="secciones form-horizontal sticky breadcrumb flat">
          <a href="../subdireccion_de_estadistica_y_preregistro/menu.php">REGISTROS</a>
          <a href="../subdireccion_de_estadistica_y_preregistro/detalles_expediente.php?id=<?=$rowfol['folioexpediente']?>">EXPEDIENTE</a>
          <a href="../subdireccion_de_estadistica_y_preregistro/detalles_persona.php?folio=<?=$id_p?>">PERSONA</a>
          <a href="../subdireccion_de_estadistica_y_preregistro/detalles_medidas.php?folio=<?=$id_p?>">MEDIDAS</a>
          <a class="actived">DETALLES</a>
        </div>
        <div class="row">
          <div class="alert div-title">
            <h3 style="text-align:center">FOLIO DEL EXPEDIENTE</h3>
          </div>
          <?php
          $fol=" SELECT * FROM validar_medida WHERE id_medida='$id_medida'";
          $resultfol = $mysqli->query($fol);
          $rowfol1=$resultfol->fetch_assoc();
          $name_folio=$rowfol1['folioexpediente'];
          // $id_person=$rowfol['id'];
          // $idunico= $rowfol['identificador'];
          // $valid = "SELECT * FROM validar_persona WHERE id_persona = '$id_person'";
          // $res_val=$mysqli->query($valid);
          // $fil_val = $res_val->fetch_assoc();
          $validacion = $rowfol1['validar_datos'];
            if ($validacion == 'true') {
              echo "<div class='columns download'>
                      <p>
                      <img src='../image/true4.jpg' width='50' height='50' class='center'>
                      <h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>MEDIDA VALIDADA</FONT></h3>

                      </p>
              </div>";
            }elseif ($validacion == 'false') {
              echo "<div class='columns download'>
                      <p>

                      <h3 style='text-align:center'><FONT COLOR='red' size=6 align='center'>PENDIENTE POR VALIDAR</FONT></h3>

                      </p>
              </div>";
            }
            ?>
          <div class="col-md-6 mb-3 validar">
                <label for="SIGLAS DE LA UNIDAD">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
                <input class="form-control" id="NUM_EXPEDIENTE" name="NUM_EXPEDIENTE" placeholder="" type="text" value="<?php echo $rowfol['folioexpediente'];?>" maxlength="50" disabled>
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="SIGLAS DE LA UNIDAD">ID PERSONA<span ></span></label>
            <input class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" value="<?php echo $rowfol['identificador']; ?>" maxlength="50" disabled>
          </div>
          <!-- <div class="col-md-6 mb-3 validar">
            <label for="FECHA_CAPTURA" >FECHA DE CAPTURA DE LA PERSONA PROPUESTA<span class="required"></span></label>
            <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" type="text" value="<?php echo $rowfol['fecha_captura'];?>" disabled>
          </div> -->
          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_CAPTURA">FECHA DE CAPTURA DE LA MEDIDA<span class="required"></span></label>
            <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" value="<?php echo date("d/m/Y h:i:sa", strtotime($rowmedida['fecha_captura'])); ?>" disabled type="text">
            </select>
          </div>

          <div class="alert div-title">
            <h3 style="text-align:center">MEDIDA OTORGADA</h3>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CATEAGORIA_MEDIDA">CATEGORÍA DE LA MEDIDA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="CATEAGORIA_MEDIDA" name="CATEAGORIA_MEDIDA" onChange="selectmedida(this)" disabled>
              <option style="visibility: hidden" value="<?php echo $rowmedida['categoria']; ?>"><?php echo $rowmedida['categoria']; ?></option>
              <option value="INICIAL">INICIAL</option>
              <option value="AMPLIACION">AMPLIACIÓN</option>
              <option value="MODIFICATORIA">MODIFICATORIA</option>
            </select>
          </div>

          <?php
            if ($rowmedida['estatus'] == 'EN EJECUCION') {
              echo '<div class="col-md-6 mb-3 validar">
                <label for="TIPO_DE_MEDIDA">TIPO DE MEDIDA<span class="required"></span></label>
                <select class="form-select form-select-lg" id="TIPO_DE_MEDIDA" name="TIPO_DE_MEDIDA" required="" onChange="act_datedef(this)">
                  <option style="visibility: hidden" id="opt-tipo-medida" value="'.$rowmedida['tipo'].'">'.$rowmedida['tipo'].'</option>
                  <option value="DEFINITIVA">DEFINITIVA</option>
                </select>
              </div>';
            }else if ($rowmedida['estatus'] != 'EN EJECUCION') {
              echo '<div class="col-md-6 mb-3 validar">
                <label for="TIPO_DE_MEDIDA">TIPO DE MEDIDA<span class="required"></span></label>
                <input class="form-control" id="TIPO_DE_MEDIDA" name="TIPO_DE_MEDIDA" value="'.$rowmedida['tipo'].'" type="text" disabled>
              </div>';
            }
           ?>

          <div class="col-md-6 mb-3 validar">
            <label for="CLASIFICACION_MEDIDA">CLASIFICACIÓN DE LA MEDIDA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="CLASIFICACION_MEDIDA" name="CLASIFICACION_MEDIDA" onChange="modselectmedida(this)" disabled>
              <option style="visibility: hidden" id="opt-clasificacion-medida" value="<?php echo $rowmedida['clasificacion']; ?>"><?php echo $rowmedida['clasificacion']; ?></option>
              <option value="ASISTENCIA">ASISTENCIA</option>
              <option value="RESGUARDO">RESGUARDO</option>
            </select>
          </div>
          <?php
          $medida = "SELECT * FROM medidas WHERE id = '$id_medida'";
          $resultadomedida = $mysqli->query($medida);
          $rowmedida = $resultadomedida->fetch_array(MYSQLI_ASSOC);
          if ($rowmedida['clasificacion']=='ASISTENCIA') {
            echo '<div class="col-md-6 mb-3 validar" id="asistencia" >';
              echo '<label for="MEDIDAS_ASISTENCIA">INCISO DE LA MEDIDA DE ASISTENCIA<span class="required"></span></label>';
              echo '<select class="form-select form-select-lg" id="MEDIDAS_ASISTENCIA" name="MEDIDAS_ASISTENCIA" onChange="modselectother(this)" disabled>';
              echo '<option style="visibility: hidden" id="opt-medida" value="'.$rowmedida['medida'].'">'.$rowmedida['medida'].'</option>';
                $asistencia = "SELECT * FROM medidaasistencia";
                $answerasis = $mysqli->query($asistencia);
                while($asistencias = $answerasis->fetch_assoc()){
                 echo "<option value='".$asistencias['nombre']."'>".$asistencias['nombre']."</option>";
                }
              echo '</select>';
            echo '</div>';
            if ($rowmedida['medida']=='VI. OTRAS') {
              echo '<div class="col-md-6 mb-3 validar" id="otherasistencia" >
                <label for="OTRA_MEDIDA_ASISTENCIA">OTRA MEDIDA ASISTENCIA<span class="required"></span></label>
                <input class="form-control" id="OTRA_MEDIDA_ASISTENCIA" name="OTRA_MEDIDA_ASISTENCIA" value="'.$rowmedida['descripcion'].'" placeholder="" type="text" readonly>
              </div>';
            }
          }  else if($rowmedida['clasificacion']=='RESGUARDO') {
            echo '<div class="col-md-6 mb-3 validar" id="resguardo" >';
              echo '<label for="MEDIDAS_RESGUARDO">INCISO DE LA MEDIDA DE RESGUARDO<span class="required"></span></label>';
              echo '<select class="form-select form-select-lg" id="MEDIDAS_RESGUARDO" name="MEDIDAS_RESGUARDO" onChange="modselectmedidares(this)" disabled>';
              echo '<option style="visibility: hidden" id="opt-medida" value="'.$rowmedida['medida'].'">'.$rowmedida['medida'].'</option>';
                $resguardo = "SELECT * FROM medidaresguardo";
                $answerres = $mysqli->query($resguardo);
                while($resguardos = $answerres->fetch_assoc()){
                 echo "<option value='".$resguardos['nombre']."'>".$resguardos['nombre']."</option>";
                }
                echo '</select>';
            echo '</div>';
            if ($rowmedida['medida']=='XI. EJECUCION DE MEDIDAS PROCESALES') {
             echo '<div class="col-md-6 mb-3 validar" id="resguardoxi">
               <label for="RESGUARDO_XI">EJECUCION DE MEDIDAS PROCESALES<span class="required"></span></label>
               <select class="form-select form-select-lg" id="RESGUARDO_XI" name="RESGUARDO_XI" disabled>
                 <option style="visibility: hidden" id="opt-medida-resguardo" value="'.$rowmedida['descripcion'].'">'.$rowmedida['descripcion'].'</option>';
                 $resguardoxi = "SELECT * FROM medidaresguardoxi";
                 $answerresxi = $mysqli->query($resguardoxi);
                 while($resguardosxi = $answerresxi->fetch_assoc()){
                  echo "<option value='".$resguardosxi['nombre']."'>".$resguardosxi['nombre']."</option>";
                 }
               echo  '</select>
             </div>';
           } else if ($rowmedida['medida']=='XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
             echo '<div class="col-md-6 mb-3 validar" id="resguardoxii">
               <label for="RESGUARDO_XII">MEDIDAS OTORGADAS A SUJETOS RECLUIDOS<span class="required"></span></label>
               <select class="form-select form-select-lg" id="RESGUARDO_XII" name="RESGUARDO_XII" disabled>
                 <option style="visibility: hidden" id="opt-medida-resguardo" value="'.$rowmedida['descripcion'].'">'.$rowmedida['descripcion'].'</option>';
                 $resguardoxii = "SELECT * FROM medidaresguardoxii";
                 $answerresxii = $mysqli->query($resguardoxii);
                 while($resguardosxii = $answerresxii->fetch_assoc()){
                  echo "<option value='".$resguardosxii['nombre']."'>".$resguardosxii['nombre']."</option>";
                 }
                 echo '</select>
             </div>';
           }elseif ($rowmedida['medida']=='XIII. OTRAS MEDIDAS') {
             echo '<div class="col-md-6 mb-3 validar" id="otherresguardo">
               <label for="OTRA_MEDIDA_RESGUARDO">OTRA MEDIDA RESGUARDO<span class="required"></span></label>
               <input class="form-control" id="OTRA_MEDIDA_RESGUARDO" name="OTRA_MEDIDA_RESGUARDO" value="'.$rowmedida['descripcion'].'" placeholder="" type="text" readonly>
             </div>';
           }
          }
          ?>
          <?php
            if ($rowmedida['date_provisional'] != '0000-00-00') {
              echo '<div class="col-md-6 mb-3 validar">
                <label for="INICIO_EJECUCION_MEDIDA">FECHA DE INICIO DE LA MEDIDA<span class="required"></span></label>
                <input class="form-control" id="INICIO_EJECUCION_MEDIDA" name="INICIO_EJECUCION_MEDIDA" value="'.$rowmedida['date_provisional'].'" placeholder="" type="date" disabled>
              </div>';
            }
            if ($rowmedida['tipo'] != 'DEFINITIVA' && $rowmedida['date_definitva'] == '') {
              // echo '<div class="col-md-6 mb-3 validar">
              //   <label for="FECHA_ACTUALIZACION_MEDIDA">FECHA DEFINITIVA DE LA MEDIDA<span class="required"></span></label>
              //   <input class="form-control" id="FECHA_ACTUALIZACION_MEDIDA" name="FECHA_ACTUALIZACION_MEDIDA" placeholder="" value="'.$rowmedida['date_definitva'].'" type="date">
              // </div>';
            }elseif ($rowmedida['tipo'] == 'DEFINITIVA' && $rowmedida['date_definitva'] != '') {
              echo '<div class="col-md-6 mb-3 validar">
                <label for="FECHA_ACTUALIZACION_MEDIDA1">FECHA DE LA MEDIDA DEFINITIVA<span class="required"></span></label>
                <input class="form-control" id="FECHA_ACTUALIZACION_MEDIDA1" name="FECHA_ACTUALIZACION_MEDIDA1" placeholder="" value="'.$rowmedida['date_definitva'].'" type="date" disabled>
              </div>';
            }
           ?>
           <div class="col-md-6 mb-3 validar" id="act_date_definitiva" style="display:none;">
              <label for="FECHA_ACTUALIZACION_MEDIDA">FECHA DEFINITIVA DE LA MEDIDA<span class="required"></span></label>
              <input class="form-control" id="FECHA_ACTUALIZACION_MEDIDA" name="FECHA_ACTUALIZACION_MEDIDA" placeholder="" value="'.$rowmedida['date_definitva'].'" type="date">
           </div>

           <input class="form-control" id="relacionalmedida" name="" placeholder="" value="<?php echo $rowmedida['relacion']; ?>" type="text" style="display:none;">
           <input class="form-control" id="estatusmedprog" name="" placeholder="" value="<?php echo $rowmedida['estatusprograma']; ?>" type="text" style="display:none;">
           <!--  -->
           <div class="col-md-3 mb-3 validar" id="statusmedrel" style="display:none;">
             <center>
               <label for="">MEDIDA RELACIONADA</label><br>
               <input type="checkbox" class="checkbox" name="statusprogrampersonarelacional" id="switch" value="1">
               <label for="switch" class="toggle">
                 <p>&nbspSI &nbsp&nbsp&nbsp&nbsp NO</p>
               </label>
             </center>
           </div>

           <div class="col-md-3 mb-3 validar" id="activarmedaloj" style="display:none;">
             <center>
               <label for="">ACTIVO</label><br>
               <input type="checkbox" class="checkbox2" name="statusprogrampersona" id="switch2" value="1">
               <label for="switch2" class="toggle2">
                 <p>&nbspSI &nbsp&nbsp&nbsp&nbsp NO</p>
               </label>
             </center>
           </div>
         </div>

          <div class="row" id="ampliacion_medida" style="display:none">
            <div class="row">
              <hr class="mb-4">
            </div>
            <div class="alert div-title">
              <h3 style="text-align:center">AMPLIACIÓN DE LA MEDIDA</h3>
            </div>
            <div id="contenido">
              <!-- <a href="registrar_ampliacion.php?id_medida_aloj=<?php echo $id_medida;?>"><button style="display: block; margin: 0 auto;" type="button" id="AGREGAR_CONVENIO" class="btn color-btn-success">AGREGAR</button></a> -->
              <?php
              echo "<a href='#add_ampliacion_medida_".$rowmedida['id']."' data-toggle='modal'><button style='display: block; margin: 0 auto;' type='button' id='AGREGAR_CONVENIO' class='btn color-btn-success'>AGREGAR</button></a>";
               ?>
              <table class="table table-striped table-dark table-bordered">
                <thead class="table-success">
                  <th style="text-align:center">No.</th>
                  <th style="text-align:center">ID CONVENIO ADHESIÓN</th>
                  <th style="text-align:center">FECHA INICIO AMPLIACIÓN</th>
                  <th style="text-align:center">DÍAS DE VIGENCIA</th>
                  <th style="text-align:center">FECHA DE TÉRMINO DE AMPLIACIÓN</th>
                </thead>
                <?php
                $cont_med = '0';
                $tabla="SELECT * FROM ampliacion_alojamiento_temporal WHERE id_medida_alojamiento ='$id_medida'";
                 $var_resultado = $mysqli->query($tabla);
                while ($var_fila=$var_resultado->fetch_array())
                {
                  $cont_med = $cont_med + 1;
                  echo "<tr>";
                    echo "<td style='text-align:center'>"; echo $cont_med; echo "</td>";
                    echo "<td style='text-align:center'>"; echo $var_fila['id_convenio']; echo "</td>";
                    echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($var_fila['fecha_inicio'])); echo "</td>";
                    echo "<td style='text-align:center'>"; echo $var_fila['dias_vigencia']; echo "</td>";
                    echo "<td style='text-align:center'>"; echo date("d/m/Y", strtotime($var_fila['fecha_termino_ampliacion'])); echo "</td>";
                  echo "</tr>";
                }
                ?>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="row">
              <hr class="mb-4">
            </div>
            <div class="alert div-title">
              <h3 style="text-align:center">ESTATUS DE LA MEDIDA</h3>
            </div>
            <?php
              if ($rowmedida['estatus'] == 'EN EJECUCION') {
                echo '<div class="col-md-6 mb-3 validar">
                  <label for="ESTATUS_MEDIDA">ESTATUS DE LA MEDIDA<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="ESTATUS_MEDIDA"  name="ESTATUS_MEDIDA" onchange="actualizar_estatus_medida(this)">
                    <option style="visibility: hidden" id="opt-estatus-medida" value="'.$rowmedida['estatus'].'">'.$rowmedida['estatus'].'</option>
                    <!-- <option value="EN EJECUCION" >EN EJECUCION</option> -->
                    <option value="EJECUTADA">EJECUTADA</option>
                    <option value="CANCELADA">CANCELADA</option>
                    </select>
                </div>';
              }elseif ($rowmedida['estatus'] != 'EN EJECUCION') {
                echo '<div class="col-md-6 mb-3 validar">
                  <label for="ESTATUS_MEDIDA">ESTATUS DE LA MEDIDA<span class="required"></span></label>
                  <input class="form-control" id="ESTATUS_MEDIDA" name="ESTATUS_MEDIDA" placeholder="" value="'.$rowmedida['estatus'].'" type="text" disabled>
                </div>';
              }
             ?>
            <div class="col-md-6 mb-3 validar" id="municipio_of_execute">
              <label for="MUNIPIO_EJECUCION_MEDIDA">MUNICIPIO DE EJECUCIÓN DE LA MEDIDA<span class="required"></span></label>
              <select class="form-select form-select-lg" id="MUNIPIO_EJECUCION_MEDIDA" name="MUNIPIO_EJECUCION_MEDIDA" disabled>
                <option style="visibility: hidden" id="opt-municipio-ejecucion-medida" value="<?php echo $rowmedida['ejecucion']; ?>"><?php echo $rowmedida['ejecucion']; ?></option>
                <option value="CIUDAD DE MEXICO">CIUDAD DE MEXICO</option>
                <?php
                $municipio = "SELECT * FROM municipios";
                $answermun = $mysqli->query($municipio);
                while($municipios = $answermun->fetch_assoc()){
                 echo "<option value='".$municipios['nombre']."'>".$municipios['nombre']."</option>";
                }
                ?>
              </select>
            </div>
            <?php
            if ($rowmedida['date_provisional'] == '0000-00-00') {
              echo '';
            }
             ?>
             <div class="col-md-6 mb-3 validar">
               <label for="FECHA_INICIO">FECHA DE INICIO DE LA MEDIDA<span class="required"></span></label>
               <input class="form-control" id="FECHA_INICIO" name="FECHA_INICIO" placeholder=""  type="date" value="<?php if ($rowmedida['date_provisional'] == '0000-00-00') {
                 echo $rowmedida['date_definitva'];
               }else {
                 echo $rowmedida['date_provisional'];
               } ?>" disabled>
             </div>
            <?php
              if ($rowmedida['estatus'] == 'EJECUTADA') {
                echo '<div class="col-md-6 mb-3 validar">
                  <label for="FECHA_DE_EJECUCION">FECHA DE EJECUCIÓN<span class="required"></span></label>
                  <input class="form-control" id="FECHA_DESINCORPORACION1" name="FECHA_DESINCORPORACION1" placeholder=""  type="date" value="'.$rowmultidisciplinario['date_close'].'" readonly>
                </div>
                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert div-title">
                    <h3 style="text-align:center">MOTIVO DE CONCLUSIÓN DE LA MEDIDA</h3>
                  </div>
                </div>
                <div class="col-md-6 mb-3 validar">
                    <label for="CONCLUSION_ART35">CONCLUSION ARTICULO 35</label>
                    <input class="form-control" id="CONCLUSION_ART35" name="CONCLUSION_ART35" placeholder="" value="'.$rowmultidisciplinario['acuerdo'].'" type="text" disabled>
                  </div>';
                  if ($rowmultidisciplinario['acuerdo'] == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO' || $rowmultidisciplinario['acuerdo'] == 'OTRO') {
                    echo '<div class="col-md-6 mb-3 validar" id="OTHERART35">
                      <label for="OTHER_ART35">ESPECIFIQUE</label>
                      <input class="form-control" id="OTHER_ART35" name="OTHER_ART35" placeholder="" value="'.$rowmultidisciplinario['conclusionart35'].'" type="text" disabled>
                    </div>';
                  }
                }
              if ($rowmedida['estatus'] == 'CANCELADA') {
                echo '<div class="col-md-6 mb-3 validar">
                  <label for="FECHA_DE_EJECUCION">FECHA DE CANCELACIÓN<span class="required"></span></label>
                  <input class="form-control" id="FECHA_DESINCORPORACION1" name="FECHA_DESINCORPORACION1" placeholder=""  type="date" value="'.$rowmultidisciplinario['date_close'].'" readonly>
                </div>
                <div class="col-md-6 mb-3 validar" id="MOTIVO">
                  <label for="MOTIVO_CANCEL">MOTIVO DE CANCELACIÓN<span class="required"></span></label>
                  <input class="form-control" id="MOTIVO_CANCEL" name="MOTIVO_CANCEL" value="'.$rowmedida['modificacion'].'" placeholder="" type="text" readonly>
                </div>';
              }
             ?>
             <div class="col-md-6 mb-3 validar" id="fecha_conclusion" style="display:none;">
               <label for="FECHA_DE_EJECUCION" id="dat_ejec" style="display:none;">FECHA DE EJECUCIÓN<span class="required"></span></label>
               <label for="FECHA_DE_CANCELACION" id="dat_cancel" style="display:none;">FECHA DE CANCELACIÓN<span class="required"></span></label>
               <input class="form-control" id="FECHA_DESINCORPORACION" name="FECHA_DESINCORPORACION" placeholder=""  type="date" value="">
             </div>

             <div class="col-md-6 mb-3 validar" id="MOTIVO" style="display:none;">
               <label for="MOTIVO_CANCEL">MOTIVO DE CANCELACIÓN<span class="required"></span></label>
               <input class="form-control" id="canceladamedida" name="canceladamedida" placeholder="" type="text">
             </div>

          </div>

          <div class="row" id="conclu_cancel" style="display:none;">
            <div class="row">
              <hr class="mb-4">
            </div>
            <div class="alert div-title">
              <h3 style="text-align:center">MOTIVO DE CONCLUSIÓN DE LA MEDIDA</h3>
            </div>

             <div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35" >
               <label for="CONCLUSION_ART35">CONCLUSION ARTICULO 35</label>
               <select class="form-select form-select-lg" id="selectconclusionart35" name="CONCLUSION_ART35" onChange="modotherart35(this)">
                 <option disabled selected value="">SELECCIONE UNA OPCION</option>
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
               <label for="OTHER_ART351">ESPECIFIQUE</label>
               <input autocomplete="off" class="form-control" id="OTHER_ART351" name="OTHER_ART351" placeholder="" value="" type="text">
             </div>

          </div>

              <div class="row">
                <div class="row">
                  <hr class="mb-4">
                </div>

                <div class="alert div-title">
                  <h3 style="text-align:center">COMENTARIOS</h3>
                </div>

              <div id="contenido" class="">
                <div class="">
                  <table class="table table-striped table-bordered " >
                    <thead >
                    </thead>
                    <?php
                    $tabla="SELECT * FROM comentario WHERE folioexpediente ='$fol_exp' AND id_persona = '$id_p' AND id_medida = '$id_medida' AND comentario_mascara = '2'";
                    $var_resultado = $mysqli->query($tabla);
                    while ($var_fila=$var_resultado->fetch_array())
                    {
                    echo "<tr>";
                    echo "<td>";
                    echo "<ul>
                          <li>
                          <div>
                          <span>
                          usuario:".$var_fila['usuario']."
                          </span>
                          </div>
                          <div>
                          <span>
                            ".$var_fila['comentario']."
                          </span>
                          </div>
                          <div>
                          <span>
                          ".date("d/m/Y", strtotime($var_fila['fecha']))."
                          </span>
                          </div>
                          </li>
                    </ul>";echo "</td>";
                    echo "</tr>";
                    }
                  ?>
                  </table>
                </div>
              </div>
              <?php
              $medida = "SELECT * FROM medidas WHERE id = '$id_medida'";
              $resultadomedida = $mysqli->query($medida);
              $rowmedida1 = $resultadomedida->fetch_array(MYSQLI_ASSOC);
              $id_p = $rowmedida1['id_persona'];
              $fol_exp =$rowmedida1['folioexpediente'];
              $id_m = $rowmedida1['id'];
              $estatus_medida = $rowmedida1['estatus'];
              $medida = "SELECT * FROM medidas WHERE id = '$id_medida'";
              $resultadomedida = $mysqli->query($medida);
              $rowmedida12 = $resultadomedida->fetch_array();
              $valid13 = "SELECT * FROM validar_medida WHERE id_persona = '$id_p' && id_medida = '$id_m'";
              $res_val13=$mysqli->query($valid13);
              $fil_val13 = $res_val13->fetch_assoc();
              $validacion13 = $fil_val13['validacion'];
                  echo '
                    <textarea name="COMENTARIO" id="COMENTARIO" rows="8" cols="80" placeholder="Escribe tus comentarios" maxlength="100"></textarea>
                    </div>
                    <div class="row">
                      <div>
                          <br>
                          <br>
                    		    <button style="display: block; margin: 0 auto;" class="btn btn-success" id="enter" type="submit">ACTUALIZAR</button>
                      </div>
                    </div>';
               ?>
        </div>
      </form>
    </div>
    </article>
  </div>
</div>
  </div>
</div>
<div class="contenedor">
  <?php
  $medida = "SELECT * FROM medidas WHERE id = '$id_medida'";
  $resultadomedida = $mysqli->query($medida);
  $rowmedida1 = $resultadomedida->fetch_array(MYSQLI_ASSOC);
  $id_p = $rowmedida1['id_persona'];
  $fol_exp =$rowmedida1['folioexpediente'];
  $id_m = $rowmedida1['id'];
  $estatus_medida = $rowmedida1['estatus'];
  $valid = "SELECT * FROM validar_medida WHERE id_persona = '$id_p' && id_medida = '$id_m'";
  $res_val=$mysqli->query($valid);
  $fil_val = $res_val->fetch_assoc();
    if ($fil_val['validar_datos'] === 'false' && $name === 'estadistica_sub') {
      echo "<div>
                <a href='validar_medida.php?folio= $id_medida' class='btn-flotante-validar' ><i class=''></i>VALIDAR</a>
      </div>";
    }
   ?>
<a href="../subdireccion_de_estadistica_y_preregistro/detalles_medidas.php?folio=<?=$id_p?>" class="btn-flotante">REGRESAR</a>
</div>
<?php
include('agregar_ampliacion_medida.php');
?>
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
document.getElementById("FECHA_DESINCORPORACION").setAttribute("max", today);
</script>

<script type="text/javascript">
var estatusMedidas = document.getElementById("ESTATUS_MEDIDA").value;
if(estatusMedidas === "EN EJECUCION"){
  document.getElementById("MUNIPIO_EJECUCION_MEDIDA").disabled = false;
}
if(estatusMedidas === "EJECUTADA" || estatusMedidas === "CANCELADA"){
  document.getElementById("COMENTARIO").disabled = true;
  document.getElementById("enter").style.display = "none";
  document.getElementById("FECHA_ACTUALIZACION_MEDIDA1").disabled = true;
  document.getElementById("ESTATUS_MEDIDA").disabled = true;
  document.getElementById("FECHA_INICIO").disabled = true;
  document.getElementById("FECHA_DESINCORPORACION1").disabled = true;
  document.getElementById("MOTIVO_CANCEL").disabled = true;
  document.getElementById("CONCLUSION_ART35").disabled = true;
  document.getElementById("municipio_of_execute").style.display = 'none';
}
</script>
<script type="text/javascript">
  var tipomedida = document.getElementById("TIPO_DE_MEDIDA").value;
  if (tipomedida === 'DEFINITIVA') {
    document.getElementById("TIPO_DE_MEDIDA").disabled = true;
  }
</script>
<script type="text/javascript">
///////////////////////////////////////////////////hacer required inputs al cambiar el estatus de la medida
var stmedida = document.getElementById("ESTATUS_MEDIDA");
var stmed = '';
stmedida.addEventListener('change', obtenerstmedida);
function obtenerstmedida(e) {
  stmed = e.target.value;
  if (stmed === 'EJECUTADA') {
    document.getElementById("FECHA_DESINCORPORACION").required = true;
    document.getElementById("selectconclusionart35").required = true;
  }else if (stmed === 'CANCELADA') {
    document.getElementById("FECHA_DESINCORPORACION").required = true;
    document.getElementById("MOTIVO_CANCEL").required = true;
  }
}
//////////////////////////////////select de conclusion
var conc35 = document.getElementById("selectconclusionart35");
var slconc35 = '';
conc35.addEventListener('change', selectconclu);
function selectconclu(e){
  slconc35 = e.target.value;
  console.log(slconc35);
  if (slconc35 === 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO' || slconc35 === 'OTRO') {
    document.getElementById("OTHER_ART351").required = true;
  }
}
</script>
<script type="text/javascript">
  var clasificacion = document.getElementById('CLASIFICACION_MEDIDA').value;
  var incisoclasificacion = document.getElementById('MEDIDAS_RESGUARDO').value;
  var relmedaloj = document.getElementById('relacionalmedida').value;
  var estatusmedprogram = document.getElementById('estatusmedprog').value;
  var disabledrelacion = document.getElementById('switch').value;
  var tipomedida = document.getElementById('TIPO_DE_MEDIDA').value;
  //////////////////////////////////////////////////////////////////////////////
  if (relmedaloj !== '') {
    // document.getElementById('switch').disabled = true;///////////descomentar una vez que se actualizo todas las medidas de alojamiento
  }
  //////////////////////////////////////////////////////////////////////////////
  if (incisoclasificacion === 'VIII. ALOJAMIENTO TEMPORAL') {
    document.getElementById("statusmedrel").style.display = "";
    document.getElementById("activarmedaloj").style.display = "";
  }else {
    document.getElementById("statusmedrel").style.display = "none";
    document.getElementById("activarmedaloj").style.display = "none";
  }
  if (incisoclasificacion === 'VIII. ALOJAMIENTO TEMPORAL') {
    if (tipomedida !== 'PROVISIONAL') {
      document.getElementById("ampliacion_medida").style.display = "";
    }else {
        document.getElementById("ampliacion_medida").style.display = "none";
    }
  }else {
    document.getElementById("ampliacion_medida").style.display = "none";
  }
  //////////////////////////////////////////////////////////////////////////////
  if (relmedaloj === 'SI') {
    document.getElementById('switch').checked = true;
  }
  if (estatusmedprogram === 'ACTIVO') {
    document.getElementById('switch2').checked = true;
  }
////////////////////////////////////////////////////////////////////////////////
</script>
</body>
</html>
