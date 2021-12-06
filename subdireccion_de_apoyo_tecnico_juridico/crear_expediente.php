<?php
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
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

  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UPSIPPED</title>
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="../css/expediente.css">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/expediente.js"></script>
  <script src="../js/solicitud.js"></script>
  <script src="../js/Javascript.js"></script>
  <script src="../js/validar_campos.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/cli.css">
</head>
<body >
  <div class="contenedor">
    <div class="sidebar ancho">
      <div class="logo text-warning">
      </div>
      <div class="user">
        <img src="../image/mujer.png" alt="" width="100" height="100">
        <span class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </span>
      </div>
      <nav class="menu-nav">
      </nav>
    </div>
    <div class="main bg-light">
      <div class="barra">
        <img src="../image/ups.png" alt="" width="1400" height="150">
      </div>
      <!-- menu del expediente -->
      <div class="wrap">
        <div class="secciones">
          <article id="tab1">
            <div class=" well form-horizontal">
              <div class="row">
                <form class="" method="POST" action="guardar_expediente.php">
                  <div class="alert alert-info">
                    <h3 style="text-align:center">NUEVO EXPEDIENTE</h3>
                  </div>
                  <div class="form-group">
                    <label for="unidad" class="col-md-4 control-label">SIGLAS DE LA UNIDAD</label>
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
                    <label for="municipio" class="col-md-4 control-label">MUNICIPIO DE RADICACION DE LA CI</label>
                    <div class="col-md-4 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-map-marked-alt"></i></span>
                        <select class="form-control" id="municipio" name="municipio" placeholder="SELECCIONE EL MUNICIPIO" required>
                          <option disabled selected value>SELECCIONE EL MUNICIPIO</option>
                          <?php
                          $select = "SELECT * FROM municipios";
                          $answer = $mysqli->query($select);
                          while($valores = $answer->fetch_assoc()){
                            echo "<option value='".$valores['clave']."'>".$valores['nombre']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                      <button style="display: block; margin: 0 auto;" type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div><!-- /.container -->
          </article>
        </div>
      </div>
    </div>
  </div>
  <div class="contenedor">
    <a href="menu.php" class="btn-flotante">CANCELAR</a>
  </div>
</body>
</html>
