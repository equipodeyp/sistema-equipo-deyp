<?php
/*require 'conexion.php';*/
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
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/main2.css">
  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
  <!--font awesome con CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- datatables JS -->
  <script type="text/javascript" src="../datatables/datatables.min.js"></script>
  <!-- para usar botones en datatables JS -->
  <script src="../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>
  <!-- estilo y js del mensaje de notificacion de que faltan medidas por validar -->
  <link rel="stylesheet" type="text/css" href="../css/toast.css"/>
   <script src="../js/funciones_react.js"></script>
   <!-- barra de navegacion -->
   <link rel="stylesheet" href="../css/breadcrumb.css">
<!-- SCRIPT PARA EL MANEJO DE LA TABLA -->
</head>
<body>
  <div class="contenedor">
    <div class="sidebar ancho">
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
        <!-- menu de lado izquierdo -->
      </nav>
    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../image/ups2.png" alt="" width="1400" height="70">
          <img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
      </div>
      <div class="container">
        <div class="row">
          <h1 style="text-align:center">
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
          </h1>
          <h5 style="text-align:center">
            <?php echo utf8_decode(strtoupper($row['area'])); ?> </span>
          </h5>
        </div>
        <br>
        <div class="wrap">
          <div class="secciones">
            <article class="tab1">
              <div class=" well form-horizontal">
                <div class="secciones form-horizontal sticky breadcrumb flat">
                  <a href="admin.php">REGISTROS</a>
                  <a class="actived">NUEVO EXPEDIENTE</a>
                </div>
                <!-- <div class="row"> -->
                  <form class="" method="POST" action="guardar_expediente.php">
                    <div class="alert div-title">
                      <h3 style="text-align:center">NUEVO EXPEDIENTE</h3>
                    </div>
                    <div class="form-group">
                      <label for="unidad" class="col-md-4 control-label">UNIDAD</label>
                      <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fas fa-hotel"></i></span>
                          <input name="unidad" type="text" class="form-control"  id="unidad" name="unidad" placeholder="" value="UPSIPPED" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">SEDE</label>
                      <div class="col-md-4 selectContainer">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                          <select name="sede" class="form-control selectpicker" id="sede" required>
                            <option disabled selected value>SELECCIONE LA SEDE</option>
                            <option value="TOLUCA">VALLE DE TOLUCA</option>
                            <option value="ORIENTE">ZONA ORIENTE </option>
                            <option value="NORORIENTE" >ZONA NORORIENTE</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="municipio" class="col-md-4 control-label" style="font-size: 12px">MUNICIPIO DE RADICACIÓN <br>DE LA CARPETA DE INVESTIGACIÓN</label>
                      <div class="col-md-4 selectContainer">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fas fa-map-marked-alt"></i></span>
                          <input list="datalistOptions" class="form-control" id="municipio" name="municipio" placeholder="SELECCIONE EL MUNICIPIO" required>
                          <datalist id="datalistOptions">
                              <?php
                              $select = "SELECT * FROM municipios";
                              $answer = $mysqli->query($select);
                              while($valores = $answer->fetch_assoc()){
                                echo "<option value='".$valores['nombre']."'>".$valores['nombre']."</option>";
                              }
                            ?>
                          </datalist>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
            					<label for="fecha" class="col-md-4 control-label">FECHA DE CAPTURA</label>
            					<div class="col-md-4 inputGroupContainer">
            						<div class="input-group">
                          <span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
            			        <input name="fecha" type="text" class="form-control"  id="fecha"  placeholder="fecha" value="" disabled>
            			      </div>
            					</div>
            				</div>
                    <div class="form-group">
            					<label for="fecha" class="col-md-4 control-label" style="font-size: 14px" >FECHA DE RECEPCIÓN DE LA SOLICITUD</label>
            					<div class="col-md-4 inputGroupContainer">
            						<div class="input-group">
                          <span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
                          <input class="form-control" id="FECHA_RECEPCION" name="FECHA_RECEPCION" required placeholder=""  type="date" value="">
                        </div>
            					</div>
            				</div>
                    <div class="form-group">
                      <label for="fecha" class="col-md-4 control-label" style="font-size: 14px" >FECHA DE ACUERDO DE INICIO DEL EXPEDIENTE</label>
                      <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
                            <input name="FECHA_ACUERDO" type="date" class="form-control"  id="FECHA_ACUERDO"  placeholder="" value="" required>
                        </div>
                      </div>
            			  </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">EXPEDIENTE RELACIONADO</label>
                      <div class="col-md-4 selectContainer">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fas fa-project-diagram"></i></span>
                          <select name="sltrelacion" class="form-control selectpicker" id="sltrelacion" required>
                            <option disabled selected value>SELECCIONE UNA OPCION</option>
                            <option value="INICIAL">INICIAL</option>
                            <option value="RELACIONADO">RELACIONADO</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label"></label>
                      <div class="col-md-4">
                        <button style="display: block; margin: 0 auto;" type="submit" class="btn color-btn-success">Guardar</button>
                      </div>
                    </div>
                  </form>
                <!-- </div> -->
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="contenedor">
    <a href="admin.php" class="btn-flotante">CANCELAR</a>
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
  // document.getElementById("FECHA_RECEPCION").max = new Date().toISOString().split("T")[0];
  document.getElementById("FECHA_RECEPCION").setAttribute("max", today);
  // document.getElementById("FECHA_ACUERDO").max = new Date().toISOString().split("T")[0];
  document.getElementById("FECHA_ACUERDO").setAttribute("max", today);

  window.onload = function(){
    var fecha = new Date();
    var mes = fecha.getMonth()+1;
    var dia = fecha.getDate();
    var ano = fecha.getFullYear();
    if(dia<10)
      dia='0'+dia;
    if(mes<10)
      mes='0'+mes
    document.getElementById('fecha').value=dia+"/"+mes+"/"+ano;
  }

  </script>
</body>
</html>
