<?php
// error_reporting(0);
include("conexion.php");
include("modelos/getinfodetalemedida.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="../js/jquery-3.1.1.min.js"></script>

  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
  <!-- <link href="../css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <link href="../css/bootstrap-theme.css" rel="stylesheet"> -->
  <!-- <script src="../js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/main2.css">
  <!--font awesome local-->
  <link rel="stylesheet" href="../css/fontawesome/css/all.css">
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <!-- <link rel="stylesheet" href="../css/bootstrap538.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
<!-- scripts para sujeto -->
<!-- <script src="../js/persona.js"></script> -->
<!-- <style media="screen">

</style> -->
</head>
<body>
  <div class="contenedor">
    <div class="sidebar ancho">
      <div class="logo text-warning">
      </div>
      <div style="text-align:center" class="user">
        <?php
        $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
        $result = $mysqli->query($sentencia);
        $row=$result->fetch_assoc();
        $genero = $row['sexo'];

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
      <br><br>
      <div class="container">
        <ul class="tabs">
          <li><a href="#" onclick="location.href='detalles_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="far fa-address-card"></span><span class="tab-text">DATOS PERSONALES</span></a></li>
          <li><a class="active"><span class="fas fa-book-open"></span><span class="tab-text">MEDIDAS</span></a></li>
          <li><a href="#" onclick="location.href='seguimiento_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-list"></span><span class="tab-text">SEGUIMIENTO PERSONA</span></a></li>
        </ul>        
        <br>
        <form class="" action="index.html" method="post">
          <div style="padding:0px; border:solid 4px;">
            <section class="container well form-horizontal secciones"><br>
              <?php
                if ($validacion == 'true') {
                  echo "<div class='columns download' style='text-align:center;'>
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
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">MEDIDA OTORGADA</strong>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3 validar">
                  <label for="categoriamedsujprov">CATEGORÍA DE LA MEDIDA<span class="required"></span></label>
                  <select class="form-select" id="categoriamedsujprov" name="CATEAGORIA_MEDIDA" disabled>
                    <option disabled selected><?php echo $fgetinfomedida['categoria']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="upt_tipo">TIPO DE MEDIDA<span class="required"></span></label>
                  <select class="form-select" id="upt_tipo" name="act_tipo" onchange="tipoofmedida(this)">
                    <option disabled selected><?php echo $fgetinfomedida['tipo']; ?></option>
                    <option value="DEFINITIVA">DEFINITIVA</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="upt_clasificacion">CLASIFICACIÓN DE LA MEDIDA</label>
                  <select class="form-select" name="" id="upt_clasificacion" disabled>
                    <option disabled selected><?php echo $fgetinfomedida['clasificacion']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar" id="div_asistencia" style="display:none;">
                  <label for="upt_medinciso_asistencia">INCISO DE LA MEDIDA DE ASISTENCIA</label>
                  <select class="form-select" name="" id="upt_medinciso_asistencia" disabled>
                    <option disabled selected><?php echo $fgetinfomedida['medida']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar" id="div_othermedextent" style="display:none;">
                  <label for="upt_otherasistencia">OTRA MEDIDA DE ASISTENCIA</label>
                  <input class="form-control" type="text" name="" value="<?php echo $fgetinfomedida['descripcion']; ?>" id="upt_otherasistencia" disabled>
                </div>
                <div class="col-md-6 mb-3 validar" id="div_resguardo" style="display:none;">
                  <label for="upt_medinciso_resguardo">INCISO DE LA MEDIDA DE RESGUARDO</label>
                  <select class="form-select" name="" id="upt_medinciso_resguardo" disabled>
                    <option disabled selected><?php echo $fgetinfomedida['medida']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar" id="div_ejecucionmedprocesal" style="display:none;">
                  <label for="upt_ximedresguardo">EJECUCIÓN DE LA MEDIDA PROCESAL</label>
                  <select class="form-select" name="" id="upt_ximedresguardo" disabled>
                    <option disabled selected><?php echo $fgetinfomedida['descripcion']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar" id="div_medotorgadasujrecluidos" style="display:none;">
                  <label for="upt_xiimedresguardo">MEDIDA OTORGADA A SUJETOS RECLUIDOS</label>
                  <select class="form-select" name="" id="upt_xiimedresguardo" disabled>
                    <option disabled selected><?php echo $fgetinfomedida['descripcion']; ?></option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar" id="div_othermedguard" style="display:none;">
                  <label for="upt_otherresguardo">OTRA MEDIDA DE RESGUARDO</label>
                  <input class="form-control" type="text" name="" value="<?php echo $fgetinfomedida['descripcion']; ?>" id="upt_otherresguardo" disabled>
                </div>
                <div class="col-md-6 mb-3 validar" id="div_dateprovisional" style="display:none;">
                  <label for="upt_dateprovisional">FECHA DE INICIO DE LA MEDIDA PROVISIONAL</label>
                  <input class="form-control" type="date" name="" value="<?php echo $fgetinfomedida['date_provisional']; ?>" id="upt_dateprovisional" disabled>
                </div>
                <div class="col-md-6 mb-3 validar" id="div_datedefinitiva" style="display:none;">
                  <label for="upt_datedefinitiva">FECHA DE INICIO DE LA MEDIDA DEFINITIVA</label>
                  <input class="form-control" type="date" name="" value="<?php echo $fgetinfomedida['date_definitva']; ?>" id="upt_datedefinitiva">
                </div>
              </div>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">ESTATUS DE LA MEDIDA</strong>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3 validar">
                  <label for="upt_estatus">ESTATUS DE LA MEDIDA</label>
                  <select class="form-select" name="act_estatus" id="upt_estatus" onchange="estatusmedida(this)">
                    <option disabled selected><?php echo $fgetinfomedida['estatus']; ?></option>
                    <option value="EJECUTADA">EJECUTADA</option>
                    <option value="CANCELADA">CANCELADA</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3 validar" id="div_municioejecucion" style="display:none;">
                  <label for="upt_municipioejecucion">MUNICIPIO DE EJECUCIÓN DE LA MEDIDA</label>
                  <select class="form-select" name="act_municipio" id="upt_municipioejecucion">
                    <option disabled selected value>SELECCIONA UNA OPCIÓN</option>
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
                <div class="col-md-6 mb-3 validar">
                  <label for="upt_dateiniciomed">FECHA DE INICIO DE LA MEDIDA</label>
                  <input class="form-control" type="date" name="" value="<?php if ($fgetinfomedida['date_provisional'] == '0000-00-00') {
                    echo $fgetinfomedida['date_definitva'];
                  }else {
                    echo $fgetinfomedida['date_provisional'];
                  } ?>" id="upt_dateiniciomed" disabled>
                </div>
                <div class="col-md-6 mb-3 validar" id="div_dateejecucion" style="display:none;">
                  <label for="upt_datetermino">FECHA DE EJECUCIÓN</label>
                  <input class="form-control" type="date" name="act_datetermino" id="upt_datetermino">
                </div>
                <div class="col-md-6 mb-3 validar" id="div_datecancelacion" style="display:none;">
                  <label for="upt_datecancelacion">FECHA DE CANCELACIÓN</label>
                  <input class="form-control" type="date" name="act_datecancelacion" id="upt_datecancelacion">
                </div>
                <div class="col-md-6 mb-3 validar" id="div_motivocancelacion" style="display:none;">
                  <label for="upt_motivocancel">MOTIVO DE CANCELACIÓN</label>
                  <input class="form-control" type="text" name="act_motivocancel" id="upt_motivocancel">
                </div>
              </div>
              <div id="div_nextejecuatda" style="display:none;">
                <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                  <strong style="color: #f8fdfc;">MOTIVO DE CONCLUSIÓN DE LA MEDIDA</strong>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3 validar">
                    <label for="upt_conart35">CONCLUSIÓN DEL ARTICULO NO. 35</label>
                    <select class="form-select" name="act_conart35" id="upt_conart35" onchange="motivoconclusion(this)">
                      <option disabled selected value="">SELECCIONE UNA OPCIÓN</option>
                      <?php
                      $art35 = "SELECT * FROM conclusionart35";
                      $answerart35 = $mysqli->query($art35);
                      while($art35s = $answerart35->fetch_assoc()){
                        echo "<option value='".$art35s['nombre']."'>".$art35s['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3 validar" id="div_especifiqueconclusion" style="display:none;">
                    <label for="upt_otherart35">ESPECIFIQUE</label>
                    <input class="form-control" type="text" name="act_otherart35" id="upt_otherart35">
                  </div>
                </div>
              </div>
              <div class="alert alert-dark" role="alert" style="text-align:center; background-color: #5F6D6B; height: 50px;">
                <strong style="color: #f8fdfc;">COMENTARIOS</strong>
              </div>
              <textarea name="commentmediprovsuj" id="commentmediprovsuj" rows="5" cols="194" placeholder="Escribe tus comentarios" maxlength="2000" style="resize: none;"></textarea>
              <br><br>
            </section>
            <div class="modal-footer d-flex justify-content-center">
              <div class="row">
                <div>
                  <button style="display: block; margin: 0 auto;" class="btn color-btn-success btn-sm" id="enter" type="submit">REGISTRAR</button>
                </div>
              </div>
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">CANCELAR</button>
            </div>
            <br>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="contenedor">
    <a href="detalles_medidas.php?folio=<?=$idpersona?>" class="btn-flotante">REGRESAR</a>
  </div>
</body>
<link rel="stylesheet" href="../css/menuactualizado.css">
<!-- <script src="../js/controller_medidas.js"></script> -->
<script src="../js/controller_pormedida.js" charset="utf-8"></script>
<!-- <script src="../js/addevaluacion_sujeto.js"></script> -->
</html>
