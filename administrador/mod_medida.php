<?php
/*require 'conexion.php';*/
// error_reporting(0);
include("conexion.php");
session_start ();
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

$fuentemedida = "SELECT * FROM radicacion_mascara2 WHERE id_medida = '$id_medida'";
$resultadofuentemedida = $mysqli->query($fuentemedida);
$rowfuentemedida = $resultadofuentemedida->fetch_array(MYSQLI_ASSOC);

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
  <script src="../js/mod_medida.js"></script>
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
      <img src="../image/USER.jpg" alt="" width="100" height="100">
    <span class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </span>
    </div>
    <nav class="menu-nav">
    </nav>
  </div>
  <div class="main bg-light">
    <div class="barra">
        <img src="../image/ups.png" alt="" width="1400" height="150">
    </div>
    <div class="wrap">
    <div class="secciones">
    <article id="tab1">
    <div class="container">
      <form class="container well form-horizontal" method="POST" action="update_medida.php?folio=<?php echo $id_medida; ?>" enctype= "multipart/form-data">
        <div class="row">
          <div class="alert alert-info">
            <h3 style="text-align:center">MEDIDAS</h3>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="TIPO_DE_MEDIDA">TIPO DE MEDIDA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="TIPO_DE_MEDIDA" name="TIPO_DE_MEDIDA" required="">
              <option style="visibility: hidden" id="opt-tipo-medida" value="<?php echo $rowmedida['tipo']; ?>"><?php echo $rowmedida['tipo']; ?></option>
              <option value="PROVISIONAL">PROVISIONAL</option>
              <option value="DEFINITIVA">DEFINITIVA</option>
            </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="CLASIFICACION_MEDIDA">CLASIFICACION_MEDIDA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="CLASIFICACION_MEDIDA" name="CLASIFICACION_MEDIDA" onChange="modselectmedida(this)" required="">
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
              echo '<label for="MEDIDAS_ASISTENCIA">MEDIDAS_ASISTENCIA<span class="required"></span></label>';
              echo '<select class="form-select form-select-lg" id="MEDIDAS_ASISTENCIA" name="MEDIDAS_ASISTENCIA" onChange="modselectother(this)">';
              echo '<option style="visibility: hidden" id="opt-medida" value="'.$rowmedida['medida'].'">'.$rowmedida['medida'].'</option>';
                $asistencia = "SELECT * FROM medidaasistencia";
                $answerasis = $mysqli->query($asistencia);
                while($asistencias = $answerasis->fetch_assoc()){
                 echo "<option value='".$asistencias['nombre']."'>".$asistencias['nombre']."</option>";
                }
              echo '</select>';
            echo '</div>';
            if ($rowmedida['medida']=='VIII. OTRAS') {
              echo '<div class="col-md-6 mb-3 validar" id="otherasistencia" >
                <label for="OTRA_MEDIDA_ASISTENCIA">OTRA MEDIDA ASISTENCIA<span class="required"></span></label>
                <input class="form-control" id="OTRA_MEDIDA_ASISTENCIA" name="OTRA_MEDIDA_ASISTENCIA" value="'.$rowmedida['descripcion'].'" placeholder="" type="text">
              </div>';
            }
          }  else if($rowmedida['clasificacion']=='RESGUARDO') {
            echo '<div class="col-md-6 mb-3 validar" id="resguardo" >';
              echo '<label for="MEDIDAS_RESGUARDO">MEDIDAS_RESGUARDO<span class="required"></span></label>';
              echo '<select class="form-select form-select-lg" id="MEDIDAS_RESGUARDO" name="MEDIDAS_RESGUARDO" onChange="modselectmedidares(this)" >';
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
               <select class="form-select form-select-lg" id="RESGUARDO_XI" name="RESGUARDO_XI" >
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
               <select style="visibility: hidden" class="form-select form-select-lg" id="RESGUARDO_XII" name="RESGUARDO_XII" >
                 <option id="opt-medida-resguardo"value="'.$rowmedida['descripcion'].'">'.$rowmedida['descripcion'].'</option>';
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
               <input class="form-control" id="OTRA_MEDIDA_RESGUARDO" name="OTRA_MEDIDA_RESGUARDO" value="'.$rowmedida['descripcion'].'" placeholder="" type="text">
             </div>';
           }
          }

          ?>

          <div class="col-md-6 mb-3 validar" id="asistencia" style="display:none;">
            <label for="MEDIDAS_ASISTENCIA">MEDIDAS_ASISTENCIA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="MEDIDAS_ASISTENCIA" name="MEDIDAS_ASISTENCIA" onChange="modselectother(this)">
              <option disabled selected value>SELECCIONE LA MEDIDA</option>
              <?php
              $asistencia = "SELECT * FROM medidaasistencia";
              $answerasis = $mysqli->query($asistencia);
              while($asistencias = $answerasis->fetch_assoc()){
               echo "<option value='".$asistencias['nombre']."'>".$asistencias['nombre']."</option>";
              }
              ?>
            </select>
          </div>


          <div class="col-md-6 mb-3 validar" id="otherasistencia" style="display:none;">
            <label for="OTRA_MEDIDA_ASISTENCIA1">OTRA MEDIDA ASISTENCIA<span class="required"></span></label>
            <input class="form-control" id="OTRA_MEDIDA_ASISTENCIA1" name="OTRA_MEDIDA_ASISTENCIA1" placeholder="" value="<?php echo $rowmedida['descripcion']; ?>" type="text">
          </div>

          <div class="col-md-6 mb-3 validar" id="resguardo" style="display:none;">
            <label for="MEDIDAS_RESGUARDO1">MEDIDAS_RESGUARDO1<span class="required"></span></label>
            <select class="form-select form-select-lg" id="MEDIDAS_RESGUARDO1" name="MEDIDAS_RESGUARDO1" onChange="modselectmedidares(this)" >
              <option disabled selected value>SELECCIONE LA MEDIDA</option>
              <?php
              $resguardo = "SELECT * FROM medidaresguardo";
              $answerres = $mysqli->query($resguardo);
              while($resguardos = $answerres->fetch_assoc()){
               echo "<option value='".$resguardos['nombre']."'>".$resguardos['nombre']."</option>";
              }
              ?>
              </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="resguardoxi" style="display:none;">
            <label for="RESGUARDO_XI1">EJECUCION DE MEDIDAS PROCESALES<span class="required"></span></label>
            <select class="form-select form-select-lg" id="RESGUARDO_XI1" name="RESGUARDO_XI1" >
              <option disabled selected value>SELECCIONE LA MEDIDA</option>
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
            <label for="RESGUARDO_XII1">MEDIDAS OTORGADAS A SUJETOS RECLUIDOS<span class="required"></span></label>
            <select class="form-select form-select-lg" id="RESGUARDO_XII1" name="RESGUARDO_XII1" >
              <option disabled selected value>SELECCIONE LA MEDIDA</option>
              <?php
              $resguardoxii = "SELECT * FROM medidaresguardoxii";
              $answerresxii = $mysqli->query($resguardoxii);
              while($resguardosxii = $answerresxii->fetch_assoc()){
               echo "<option value='".$resguardosxii['nombre']."'>".$resguardosxii['nombre']."</option>";
              }
              ?>
              </select>
          </div>

          <div class="col-md-6 mb-3 validar" id="otherresguardo" style="display:none;">
            <label for="OTRA_MEDIDA_RESGUARDO1">OTRA MEDIDA RESGUARDO<span class="required"></span></label>
            <input class="form-control" id="OTRA_MEDIDA_RESGUARDO1" name="OTRA_MEDIDA_RESGUARDO1" placeholder="" type="text">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="INICIO_EJECUCION_MEDIDA">FECHA MEDIDA PROVISIONAL<span class="required"></span></label>
            <input class="form-control" id="INICIO_EJECUCION_MEDIDA" name="INICIO_EJECUCION_MEDIDA" value="<?php echo $rowmedida['date_provisional']; ?>" placeholder="" type="date">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_ACTUALIZACION_MEDIDA">FECHA MEDIDA DEFINITIVA<span class="required"></span></label>
            <input class="form-control" id="FECHA_ACTUALIZACION_MEDIDA" name="FECHA_ACTUALIZACION_MEDIDA" placeholder="" value="<?php echo $rowmedida['date_definitva']; ?>" type="date">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="MEDIDA_MODOIFICADA">MEDIDA_MODIFICADA<span class="required"></span></label>
            <select class="form-select form-select-lg" id="MEDIDA_MODOIFICADA" name="MEDIDA_MODOIFICADA" required="">
              <option style="visibility: hidden" id="opt-medida-modificada" desibled selected><?php echo $rowmedida['modificacion']; ?></option>
              <option value="EJECUCION">EJECUCION</option>
              <option value="TERMINADA">TERMINADA</option>
              </select>
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="FECHA_MODIFICACION">FECHA_MODIFICACION<span class="required"></span></label>
            <input class="form-control" id="FECHA_MODIFICACION" name="FECHA_MODIFICACION" placeholder="" value="<?php echo $rowmedida['date_modificada']; ?>" type="date">
          </div>

          <div class="col-md-6 mb-3 validar">
            <label for="TIPO_MODIFICACION">TIPO_MODIFICACION<span class="required"></span></label>
            <input class="form-control" id="TIPO_MODIFICACION" name="TIPO_MODIFICACION" placeholder="" value="<?php echo $rowmedida['tipo_modificacion']; ?>" type="text">
          </div>

          <div class="row">
            <div class="row">
              <hr class="mb-4">
            </div>
            <div class="alert alert-info">
              <h3 style="text-align:center">CONCLUSION / CANCELACIÓN</h3>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="CONCLUSION_CANCELACION">CONCLUSION_CANCELACION</label>
              <select class="form-select form-select-lg" name="CONCLUSION_CANCELACION" onChange="open2art35(this)">
                <option style="visibility: hidden" id="opt-conclusion-cancelacion" value="<?php echo $rowmultidisciplinario['acuerdo'] ?>"><?php echo $rowmultidisciplinario['acuerdo'] ?></option>
                <option value="CANCELACION">CANCELACION</option>
                <option value="CONCLUSION">CONCLUSION</option>
              </select>
            </div>

            <?php
            $multidisciplinario = "SELECT * FROM multidisciplinario_medidas WHERE id_medida = '$id_medida'";
            $resultadomultidisciplinario = $mysqli->query($multidisciplinario);
            $rowmultidisciplinario = $resultadomultidisciplinario->fetch_array(MYSQLI_ASSOC);
            if ($rowmultidisciplinario['acuerdo'] == 'CONCLUSION') {
              echo '<div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35">
                <label for="CONCLUSION_ART35">CONCLUSION ARTICULO 35</label>
                <select class="form-select form-select-lg" name="CONCLUSION_ART35" onChange="modotherart35(this)">
                  <option style="visibility: hidden" id="opt-conclusion-art35" value="'.$rowmultidisciplinario['conclusionart35'].'">'.$rowmultidisciplinario['conclusionart35'].'</option>';
                  $art35 = "SELECT * FROM conclusionart35";
                  $answerart35 = $mysqli->query($art35);
                  while($art35s = $answerart35->fetch_assoc()){
                    echo "<option value='".$art35s['nombre']."'>".$art35s['nombre']."</option>";
                  }
                  echo '
                </select>
              </div>';
              if ($rowmultidisciplinario['conclusionart35'] == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
                echo '<div class="col-md-6 mb-3 validar" id="OTHERART35">
                  <label for="OTHER_ART35">ESPECIFIQUE</label>
                  <input class="form-control" id="OTHER_ART35" name="OTHER_ART35" placeholder="" value="'.$rowmultidisciplinario['otherart35'].'" type="text">
                </div>';
              }
            }
             ?>

             <div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35" style="display:none;">
               <label for="CONCLUSION_ART35">CONCLUSION ARTICULO 35</label>
               <select class="form-select form-select-lg" name="CONCLUSION_ART35" onChange="modotherart35(this)">
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
               <input class="form-control" id="OTHER_ART351" name="OTHER_ART351" placeholder="" value="" type="text">
             </div>

             <div class="col-md-6 mb-3 validar">
               <label for="FECHA_DESINCORPORACION">FECHA DE CONCLUSIÓN O CANCELACIÓN<span class="required"></span></label>
               <input class="form-control" id="FECHA_DESINCORPORACION" name="FECHA_DESINCORPORACION" placeholder=""  type="date" value="<?php echo $rowmultidisciplinario['date_close']; ?>">
             </div>
          </div>

          <div class="row">
            <div class="row">
              <hr class="mb-4">
            </div>
            <div class="alert alert-info">
              <h3 style="text-align:center">ESTATUS</h3>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="ESTATUS_MEDIDA">ESTATUS_MEDIDA<span class="required"></span></label>
              <select class="form-select form-select-lg" id="ESTATUS_MEDIDA" required="" name="ESTATUS_MEDIDA">
                <option style="visibility: hidden" id="opt-estatus-medida" value="<?php echo $rowmedida['estatus']; ?>"><?php echo $rowmedida['estatus']; ?></option>
                <option value="EJECUTADA">EJECUTADA</option>
                <option value="EN EJECUCION">EN EJECUCION</option>
                </select>
            </div>

            <div class="col-md-6 mb-3 validar">
              <label for="MUNIPIO_EJECUCION_MEDIDA">MUNICIPIO_EJECUCION_MEDIDA<span class="required"></span></label>
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
                  <label for="FECHA_DE_EJECUCION">FECHA_DE_EJECUCION<span class="required"></span></label>
                  <input class="form-control" id="FECHA_DE_EJECUCION" name="FECHA_DE_EJECUCION" placeholder=""  type="date" value="<?php echo $rowmedida['date_ejecucion']; ?>">
                </div>
          </div>

              </div>
              <div class="row">
                <div class="row">
                  <hr class="mb-4">
                </div>
                <div class="alert alert-info">
                  <h3 style="text-align:center">FUENTE</h3>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="FUENTE_M">FUENTE<span class="required"></span></label>
                  <select class="form-select form-select-lg" id="FUENTE_M" name="FUENTE_M" onChange="radicacionfuenteM1(this)">
                    <option style="visibility: hidden" id="opt-fuente" value="<?php echo $rowfuentemedida['fuente']; ?>"><?php echo $rowfuentemedida['fuente']; ?></option>
                    <?php
                    $rad = "SELECT * FROM radicacion";
                    $answerrad = $mysqli->query($rad);
                    while($rads = $answerrad->fetch_assoc()){
                      echo "<option value='".$rads['nombre']."'>".$rads['nombre']."</option>";
                    }
                    ?>
                  </select>
                </div>

                <?php
                $fuentemedida = "SELECT * FROM radicacion_mascara2 WHERE id_medida = '$id_medida'";
                $resultadofuentemedida = $mysqli->query($fuentemedida);
                $rowfuentemedida = $resultadofuentemedida->fetch_array(MYSQLI_ASSOC);
                if ($rowfuentemedida['fuente']=='OFICIO') {
                  echo '<div class="col-md-6 mb-3 validar" id="OFICIO_M">
                    <label for="OFICIO_M">OFICIO<span class="required"></span></label>
                    <input class="form-control" id="OFICIO_M" name="OFICIO_M" placeholder="" value="'.$rowfuentemedida['descripcion'].'"  type="text" >
                  </div>';
                }elseif ($rowfuentemedida['fuente']=='CORREO') {
                  echo '<div class="col-md-6 mb-3 validar" id="CORREO_M">
                    <label for="CORREO_M">CORREO<span class="required"></span></label>
                    <input class="form-control" id="CORREO_M" name="CORREO_M" placeholder=""  value="'.$rowfuentemedida['descripcion'].'" type="text" >
                  </div>';
                }elseif ($rowfuentemedida['fuente']=='EXPEDIENTE') {
                  echo '<div class="col-md-6 mb-3 validar"  id="EXPEDIENTE_M">
                    <label for="EXPEDIENTE_M">EXPEDIENTE<span class="required"></span></label>
                    <input class="form-control" id="EXPEDIENTE_M" name="EXPEDIENTE_M" placeholder=""  value="'.$rowfuentemedida['descripcion'].'" type="text" >
                  </div>';
                }elseif ($rowfuentemedida['fuente']=='OTRO') {
                  echo '<div class="col-md-6 mb-3 validar" id="OTRO_M">
                    <label for="OTRO_M">OTRO<span class="required"></span></label>
                    <input class="form-control" id="OTRO_M" name="OTRO_M" placeholder=""  value="'.$rowfuentemedida['descripcion'].'" type="text" >
                  </div>';
                }
                 ?>

                 <div class="col-md-6 mb-3 validar" id="OFICIO_M" style="display:none;">
                   <label for="OFICIO_M1">OFICIO<span class="required"></span></label>
                   <input class="form-control" id="OFICIO_M1" name="OFICIO_M1" placeholder="" value=""  type="text" >
                 </div>

                 <div class="col-md-6 mb-3 validar" id="CORREO_M" style="display:none;">
                   <label for="CORREO_M1">CORREO<span class="required"></span></label>
                   <input class="form-control" id="CORREO_M1" name="CORREO_M1" placeholder=""  value="" type="text" >
                 </div>

                 <div class="col-md-6 mb-3 validar"  id="EXPEDIENTE_M" style="display:none;">
                   <label for="EXPEDIENTE_M1">EXPEDIENTE<span class="required"></span></label>
                   <input class="form-control" id="EXPEDIENTE_M1" name="EXPEDIENTE_M1" placeholder=""  value="" type="text" >
                 </div>

                 <div class="col-md-6 mb-3 validar" id="OTRO_M" style="display:none;">
                   <label for="OTRO_M1">OTRO<span class="required"></span></label>
                   <input class="form-control" id="OTRO_M1" name="OTRO_M1" placeholder=""  value="" type="text" >
                 </div>



              </div>
              <div class="row">
                <div class="row">

                  <hr class="mb-4">
                </div>
                <div class="alert alert-info">
                  <h3 style="text-align:center">ESPECIFICAR CAMBIOS</h3>
                </div>
                <section class="text-center" >
                <textarea name="COMENTARIO" id="COMENTARIO" rows="8" cols="80" placeholder="describe cual fue la modificacion" maxlength="100"></textarea>
              </section>
              </div>

              <div class="row">
                <div>
                    <br>
                    <br>
                		<button style="display: block; margin: 0 auto;" class="btn btn-success" id="enter" type="submit">ACTUALIZAR</button>
                </div>

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
<a href="mod_persona.php?folio=<?=$id_p?>" class="btn-flotante">REGRESAR</a>
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
document.getElementById("INICIO_EJECUCION_MEDIDA").setAttribute("max", today);
document.getElementById("FECHA_ACTUALIZACION_MEDIDA").setAttribute("max", today);
document.getElementById("FECHA_MODIFICACION").setAttribute("max", today);
document.getElementById("FECHA_DESINCORPORACION").setAttribute("max", today);
document.getElementById("FECHA_DE_EJECUCION").setAttribute("max", today);
</script>

</body>
</html>
