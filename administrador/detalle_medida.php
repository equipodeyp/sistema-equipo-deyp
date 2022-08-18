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
  <script src="../js/validar_campos.js"></script>
  <script src="../js/verificar_camposm1.js"></script>
  <script src="../js/mascara2campos.js"></script>
  <script src="../js/mod_medida.js"></script>
  <!-- <link rel="stylesheet" href="../css/estilos.css">
  <script src="../js/main.js"></script> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>

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
           <ul>
              <a style="text-align:center" class='user-nombre' href='create_ticket.php?folio=<?php echo $rowfol['folioexpediente'];?>'> <button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
              <!-- <a  href='create_ticket.php?folio=<?php echo $rowfol['folioexpediente'];?>'><i class="fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span>Incidencia</span></a> -->
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
    <div class="container">
      <form class="container well form-horizontal" method="POST" action="actualizar_medida.php?folio=<?php echo $id_medida; ?>" enctype= "multipart/form-data">
        <div class="secciones form-horizontal sticky breadcrumb flat">
          <a href="../administrador/admin.php">REGISTROS</a>
          <a href="../administrador/detalles_expediente.php?folio=<?=$rowfol['folioexpediente']?>">EXPEDIENTE</a>
          <a href="../administrador/detalles_persona.php?folio=<?=$id_p?>">PERSONA</a>
          <a href="../administrador/detalles_medidas.php?folio=<?=$id_p?>">MEDIDAS</a>
          <a class="actived">DETALLE DE LA MEDIDA</a>
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
                <input class="form-control" id="NUM_EXPEDIENTE" name="NUM_EXPEDIENTE" placeholder="" type="text" readonly value="<?php echo $rowfol['folioexpediente'];?>" maxlength="50">
          </div>
          <div class="col-md-6 mb-3 validar">
            <label for="SIGLAS DE LA UNIDAD">ID PERSONA<span ></span></label>
            <input class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" readonly value="<?php echo $rowfol['identificador']; ?>" maxlength="50">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_CAPTURA">FECHA DE CAPTURA DE LA MEDIDA<span class="required"></span></label>
            <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" readonly value="<?php echo date("d/m/Y h:i:sa", strtotime($rowmedida['fecha_captura'])); ?>" type="text">
            </select>
          </div>

          <div class="alert div-title">
            <h3 style="text-align:center">MEDIDA OTORGADA</h3>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CATEAGORIA_MEDIDA">CATEGORÍA DE LA MEDIDA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="CATEAGORIA_MEDIDA" name="CATEAGORIA_MEDIDA">
              <option style="visibility: hidden" value="<?php echo $rowmedida['categoria']; ?>"><?php echo $rowmedida['categoria']; ?></option>
              <option value="INICIAL">INICIAL</option>
              <option value="AMPLIACION">AMPLIACIÓN</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="TIPO_DE_MEDIDA">TIPO DE MEDIDA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="TIPO_DE_MEDIDA" name="TIPO_DE_MEDIDA" required>
              <option style="visibility: hidden" value="<?php echo $rowmedida['tipo']; ?>"><?php echo $rowmedida['tipo']; ?></option>
              <option value="PROVISIONAL">PROVISIONAL</option>
              <option value="DEFINITIVA">DEFINITIVA</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CLASIFICACION_MEDIDA">CLASIFICACIÓN DE LA MEDIDA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="CLASIFICACION_MEDIDA" name="CLASIFICACION_MEDIDA" onChange="modselectmedida(this)">
              <option style="visibility: hidden" id="opt-clasificacion-medida" value="<?php echo $rowmedida['clasificacion']; ?>"><?php echo $rowmedida['clasificacion']; ?></option>
              <option value="ASISTENCIA">ASISTENCIA</option>
              <option value="RESGUARDO">RESGUARDO</option>
            </select>
          </div>
          <!-- medida de asistencia -->
          <div class="col-md-6 mb-3 validar" id="asistencia">
            <label for="MEDIDAS_ASISTENCIA">INCISO DE LA MEDIDA DE ASISTENCIA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="MEDIDAS_ASISTENCIA" name="MEDIDAS_ASISTENCIA" onChange="selectother(this)">
              <option style="visibility: hidden" value="<?php echo $rowmedida['medida']; ?>"><?php echo $rowmedida['medida']; ?></option>
              <?php
              $asistencia = "SELECT * FROM medidaasistencia";
              $answerasis = $mysqli->query($asistencia);
              while($asistencias = $answerasis->fetch_assoc()){
               echo "<option value='".$asistencias['nombre']."'>".$asistencias['nombre']."</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="otherasistencia">
            <label for="OTRA_MEDIDA_ASISTENCIA">OTRA MEDIDA ASISTENCIA<span class="required"></span></label>
            <input class="form-control" id="OTRA_MEDIDA_ASISTENCIA" name="OTRA_MEDIDA_ASISTENCIA" value="<?php echo $rowmedida['descripcion']; ?>" type="text">
          </div>

          <!-- medidas de resguardo -->
          <div class="col-md-6 mb-3 validar" id="resguardo">
            <label for="MEDIDAS_RESGUARDO">INCISO DE LA MEDIDA DE RESGUARDO<span class="required"></span></label>
            <select class="form-select form-select-lg" id="MEDIDAS_RESGUARDO" name="MEDIDAS_RESGUARDO" onChange="selectmedidares(this)" >
              <option style="visibility: hidden" value="<?php echo $rowmedida['medida']; ?>"><?php echo $rowmedida['medida']; ?></option>
              <?php
              $resguardo = "SELECT * FROM medidaresguardo";
              $answerres = $mysqli->query($resguardo);
              while($resguardos = $answerres->fetch_assoc()){
               echo "<option value='".$resguardos['nombre']."'>".$resguardos['nombre']."</option>";
              }
              ?>
              </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="otherresguardo" style="display:none;">
            <label for="OTRA_MEDIDA_RESGUARDO">OTRA MEDIDA RESGUARDO<span class="required"></span></label>
            <input autocomplete="off" class="form-control" id="OTRA_MEDIDA_RESGUARDO" name="OTRA_MEDIDA_RESGUARDO" value="<?php echo $rowmedida['descripcion']; ?>" type="text">
          </div>

          <div class="col-md-6 mb-3 validar" id="resguardoxi" style="display:none;">
            <label for="RESGUARDO_XI">EJECUCIÓN DE LA MEDIDA PROCESAL<span class="required"></span></label>
            <select class="form-select form-select-lg" id="RESGUARDO_XI" name="RESGUARDO_XI" >
              <option style="visibility: hidden" value="<?php echo $rowmedida['descripcion']; ?>"><?php echo $rowmedida['descripcion']; ?></option>
              <?php
              $resguardoxi = "SELECT * FROM medidaresguardoxi";
              $answerresxi = $mysqli->query($resguardoxi);
              while($resguardosxi = $answerresxi->fetch_assoc()){
               echo "<option value='".$resguardosxi['nombre']."'>".$resguardosxi['nombre']."</option>";
              }
              ?>
              </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="resguardoxii" style="display:none;">
            <label for="RESGUARDO_XII">MEDIDA OTORGADA A SUJETOS RECLUIDOS<span class="required"></span></label>
            <select class="form-select form-select-lg" id="RESGUARDO_XII" name="RESGUARDO_XII" >
              <option style="visibility: hidden" value="<?php echo $rowmedida['descripcion']; ?>"><?php echo $rowmedida['descripcion']; ?></option>
              <?php
              $resguardoxii = "SELECT * FROM medidaresguardoxii";
              $answerresxii = $mysqli->query($resguardoxii);
              while($resguardosxii = $answerresxii->fetch_assoc()){
               echo "<option value='".$resguardosxii['nombre']."'>".$resguardosxii['nombre']."</option>";
              }
              ?>
              </select>
          </div>

           <div class="col-md-6 mb-3 validar" id="act_date_definitiva">
              <label for="FECHA_ACTUALIZACION_MEDIDA">FECHA DE LA MEDIDA PROVISIONAL<span class="required"></span></label>
              <input class="form-control" id="FECHA_ACTUALIZACION_MEDIDA" name="FECHA_ACTUALIZACION_MEDIDA" placeholder="" value="<?php if ($rowmedida['date_provisional'] === '0000-00-00') {
                echo $rowmedida['date_definitva'];
              }else {
                echo $rowmedida['date_provisional'];
              }?>" type="date">
           </div>

           <div class="col-md-6 mb-3 validar" id="act_date_definitiva_def" style="display:none;">
              <label for="FECHA_ACTUALIZACION_MEDIDA_DEF">FECHA DE LA MEDIDA DEFINITIVA<span class="required"></span></label>
              <input class="form-control" id="FECHA_ACTUALIZACION_MEDIDA_DEF" name="FECHA_ACTUALIZACION_MEDIDA_DEF" placeholder="" value="<?php echo $rowmedida['date_definitva']; ?>" type="date">
           </div>

          <div class="row">
            <div class="row">
              <hr class="mb-4">
            </div>
            <div class="alert div-title">
              <h3 style="text-align:center">ESTATUS DE LA MEDIDA</h3>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="ESTATUS_MEDIDA">ESTATUS DE LA MEDIDA<span class="required"></span></label>
              <select class="form-select form-select-lg" id="ESTATUS_MEDIDA"  name="ESTATUS_MEDIDA" onchange="actualizar_estatus_medida(this)">
                <option style="visibility: hidden" id="opt-estatus-medida" value="<?php echo $rowmedida['estatus']; ?>"><?php echo $rowmedida['estatus']; ?></option>
                <option value="EN EJECUCION" >EN EJECUCION</option>
                <option value="EJECUTADA">EJECUTADA</option>
                <option value="CANCELADA">CANCELADA</option>
                </select>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="MUNIPIO_EJECUCION_MEDIDA">MUNICIPIO DE EJECUCIÓN DE LA MEDIDA<span class="required"></span></label>
              <select class="form-select form-select-lg" id="MUNIPIO_EJECUCION_MEDIDA" name="MUNIPIO_EJECUCION_MEDIDA">
                <option style="visibility: hidden" id="opt-municipio-ejecucion-medida" value="<?php echo $rowmedida['ejecucion']; ?>"><?php echo $rowmedida['ejecucion']; ?></option>
                <?php
                $municipio = "SELECT * FROM municipios";
                $answermun = $mysqli->query($municipio);
                while($municipios = $answermun->fetch_assoc()){
                 echo "<option value='".$municipios['nombre']."'>".$municipios['nombre']."</option>";
                }
                ?>
              </select>
            </div>

             <div class="col-md-6 mb-3 validar">
               <label for="FECHA_INICIO">FECHA DE INICIO DE LA MEDIDA<span class="required"></span></label>
               <input class="form-control" id="FECHA_INICIO" name="FECHA_INICIO" placeholder=""  type="date" value="<?php if ($rowmedida['date_provisional'] === '0000-00-00') {
                 echo $rowmedida['date_definitva'];
               }else {
                 echo $rowmedida['date_provisional'];
               } ?>" readonly>
             </div>

             <div class="col-md-6 mb-3 validar" id="fecha_conclusion" style="display:none;">
               <label for="FECHA_DE_EJECUCION" id="dat_ejec" style="display:none;">FECHA DE EJECUCIÓN<span class="required"></span></label>
               <label for="FECHA_DE_CANCELACION" id="dat_cancel" style="display:none;">FECHA DE CANCELACIÓN<span class="required"></span></label>
               <input class="form-control" id="FECHA_DESINCORPORACION" name="FECHA_DESINCORPORACION" placeholder=""  type="date" value="<?php echo $rowmedida['date_ejecucion']; ?>">
             </div>

             <div class="col-md-6 mb-3 validar" id="MOTIVO" style="display:none;">
               <label for="MOTIVO_CANCEL">MOTIVO DE CANCELACIÓN<span class="required"></span></label>
               <input autocomplete="off" class="form-control" id="MOTIVO_CANCEL" name="MOTIVO_CANCEL" value="<?php echo $rowmedida['tipo_modificacion']; ?>" type="text">
             </div>

          </div>


          <div class="row" id="conclu_cancel" style="display:none;">
            <div class="row">
              <hr class="mb-4">
            </div>
            <div class="alert div-title">
              <h3 style="text-align:center">MOTIVO DE CONCLUSIÓN DE LA MEDIDA</h3>
            </div>

            <div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35">
              <label for="CONCLUSION_ART35">CONCLUSIÓN ARTICULO 35</label>
              <select class="form-select form-select-lg" id="CONCLUSION_ART35select" name="CONCLUSION_ART35" onChange="modotherart35(this)">
                <option style="visibility: hidden" value="<?php echo $rowmultidisciplinario['acuerdo']; ?>"><?php echo $rowmultidisciplinario['acuerdo']; ?></option>
                <?php
                $art35 = "SELECT * FROM conclusionart35";
                $answerart35 = $mysqli->query($art35);
                while($art35s = $answerart35->fetch_assoc()){
                  echo "<option value='".$art35s['nombre']."'>".$art35s['nombre']."</option>";
                }
                ?>
              </select>
            </div>

             <div class="col-md-6 mb-3 validar" id="OTHERART35">
               <label for="OTHER_ART351">ESPECIFIQUE</label>
               <input autocomplete="off" class="form-control" id="OTHER_ART351" name="OTHER_ART351" value="<?php echo $rowmultidisciplinario['conclusionart35']; ?>" type="text">
             </div>

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
                if ($validacion13 != 'true') {
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
                }
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
    if ($fil_val['validar_datos'] === 'false' && $name === 'adrianahe') {
      echo "<div>
              <p>
                <a href='validar_medida.php?folio= $id_medida' class='btn-flotante-glosario' ><i class=''></i>VALIDAR</a>
              </p>
      </div>";
    }
   ?>
<a href="../administrador/detalles_medidas.php?folio=<?=$id_p?>" class="btn-flotante">REGRESAR</a>
</div>
<!-- SCRIPT DE FECHAS  -->

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
</script>
<script type="text/javascript">
  var clasificacionmedida = document.getElementById('CLASIFICACION_MEDIDA').value;
  function clasif_medida() {
    // console.log(clasificacionmedida);
    if (clasificacionmedida === 'ASISTENCIA') {
      document.getElementById('resguardo').style.display = "none";
      document.getElementById('otherresguardo').style.display = "none";
      document.getElementById('resguardoxi').style.display = "none";
      document.getElementById('resguardoxii').style.display = "none";
    }else if (clasificacionmedida === 'RESGUARDO') {
      document.getElementById('asistencia').style.display = "none";
      document.getElementById('otherasistencia').style.display = "none";
      // document.getElementById('resguardoxi').style.display = "none";
      // document.getElementById('resguardoxii').style.display = "none";
    }
  }
  clasif_medida();
  ////////////////////////////////////////////////////////////////////////
  var incisoasistencia = document.getElementById('MEDIDAS_ASISTENCIA').value;
  function inciso_asistencia(){
    // console.log(incisoasistencia);
    if (incisoasistencia !== 'VI. OTRAS') {
      document.getElementById('otherasistencia').style.display = "none";
    }
  }
  inciso_asistencia();
  ////////////////////////////////////////////////////////////////////////
  var incisoresguardo = document.getElementById('MEDIDAS_RESGUARDO').value;
  function inciso_resguardo() {
    // console.log(incisoresguardo);
    if (incisoresguardo === 'XI. EJECUCION DE MEDIDAS PROCESALES') {
      document.getElementById('resguardoxi').style.display = "";
    }else if (incisoresguardo === 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
      document.getElementById('resguardoxii').style.display = "";
    }else if (incisoresguardo === 'XIII. OTRAS MEDIDAS') {
      document.getElementById('otherresguardo').style.display = "";
    }
  }
  inciso_resguardo();
  /////////////////////////////////////////////////////////////////////////
  // estatus de la medida ///////////
  var estatus_medida = document.getElementById('ESTATUS_MEDIDA').value;
  function mostrar_estatus_medida() {
    // console.log(estatus_medida);
    if (estatus_medida === 'EJECUTADA') {
      document.getElementById('dat_ejec').style.display = "";
      document.getElementById('fecha_conclusion').style.display = "";
      document.getElementById('conclu_cancel').style.display = "";
      document.getElementById('CONCLUSION_ART35').style.display = "";
    }else if (estatus_medida === 'CANCELADA') {
      document.getElementById('dat_cancel').style.display = "";
      document.getElementById('fecha_conclusion').style.display = "";
      document.getElementById('MOTIVO').style.display = "";
    }
  }
  mostrar_estatus_medida();
///////////////////////////////////////////////////////////////////
// motivo de cancelacion y/o conclusion
  // var ejecutamed = document.getElementById('CONCLUSION_CANCELACION').value;
  // function conclu_cancel_med() {
  //   // console.log(ejecutamed);
  //   if (ejecutamed === 'CONCLUSION') {
  //     document.getElementById('CONCLUSION_ART35').style.display = "";
  //   }
  // }
  // conclu_cancel_med();
  ///////////////////////////////////////////////////////////////////
  // conclusion por articulo 35


  var concluart = document.getElementById('CONCLUSION_ART35select').value;
  function conclu_cancel_art35() {
    console.log(concluart);
    if (concluart === 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO' || concluart === 'OTRO') {
      document.getElementById('OTHERART35').style.display = "";
    }else {
      document.getElementById('OTHERART35').style.display = "none";
    }
  }
  conclu_cancel_art35();
</script>

<script type="text/javascript">

var medidasResguardo = document.getElementById("MEDIDAS_RESGUARDO");
var medDeResguardo;

medidasResguardo.addEventListener('change', obtenerMedDeResguardo);
    function obtenerMedDeResguardo(e) {
      medDeResguardo = e.target.value;
      console.log(medDeResguardo);
      if (medDeResguardo == "XI. EJECUCION DE MEDIDAS PROCESALES" || medDeResguardo == "XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS" || medDeResguardo =="XIII. OTRAS MEDIDAS"){
      document.getElementById("RESGUARDO_XI").value = "";
      document.getElementById("FECHA_ACTUALIZACION_MEDIDA").value = "";
      document.getElementById("OTRA_MEDIDA_RESGUARDO").value = "";
      }

}

</script>

<script type="text/javascript">

var estatusMedida = document.getElementById("ESTATUS_MEDIDA");
var estatusMed;

estatusMedida.addEventListener('change', obtenerEstatusMed);
    function obtenerEstatusMed(e) {
      estatusMed = e.target.value;
      // console.log(estatusMed);
      if (estatusMed == "EN EJECICION" ){
        document.getElementById("FECHA_DESINCORPORACION").value = "";
        document.getElementById("MOTIVO_CANCEL").value = "";
        document.getElementById("CONCLUSION_CANCELACION").value = "";
        document.getElementById("CONCLUSION_ART35select").value = "";
        document.getElementById("OTHER_ART351").value = "";
      }

      else{
        document.getElementById("MOTIVO_CANCEL").value = "";
        document.getElementById("FECHA_DESINCORPORACION").value = "";
        document.getElementById("CONCLUSION_CANCELACION").value = "";
        document.getElementById("CONCLUSION_ART35select").value = "";
        document.getElementById("OTHER_ART351").value = "";
      }

}

</script>


<script type="text/javascript">

var conclusionArt35 = document.getElementById("CONCLUSION_ART35select");
var concluArt35;

conclusionArt35.addEventListener('change', obtenerConclusionArt35);
    function obtenerConclusionArt35(e) {
      concluArt35 = e.target.value;
      if (concluArt35 === "IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO" || concluArt35 === "OTRO" ){
        document.getElementById('OTHERART35').style.display = "";
      }

}

</script>
<script type="text/javascript">
  var fech_p = document.getElementById('TIPO_DE_MEDIDA');
  var fecha_p= '';
  fech_p.addEventListener('change', gettipomedida);
  function gettipomedida (e) {
    fecha_p = e.target.value;
    console.log(fecha_p);
    if (fecha_p === 'DEFINITIVA') {
      document.getElementById('act_date_definitiva_def').style.display="";
    }else {
      document.getElementById('act_date_definitiva_def').style.display="none";
    }
  }
  var checkfech = document.getElementById('TIPO_DE_MEDIDA').value;
  function disfech () {
    console.log(checkfech);
    if (checkfech === 'DEFINITIVA') {
      document.getElementById('act_date_definitiva_def').style.display="";
    }else {
      document.getElementById('act_date_definitiva_def').style.display="none";
    }
  }
  disfech();
</script>

</body>
</html>
