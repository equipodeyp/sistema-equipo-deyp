<?php
error_reporting(0);
date_default_timezone_set("America/Mexico_City");
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
include("../conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <script src="../../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="../../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../../css/main2.css">
  <!--font awesome local-->
  <link rel="stylesheet" href="../../css/fontawesome/css/all.css">
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../../css/breadcrumb.css">
  <link rel="stylesheet" href="../../css/bootstrap5-3-8.min.css">
  <script src="../../js/bootstrap5-3-8.bundle.min.js"></script>
  <script src="../../js/popper5-3-8.min.js"></script>
  <script src="../../js/bootstrap5-3-8.min.js"></script>
  <!--  -->
  <link rel="stylesheet" type="text/css" href="../../css/toast.css"/>
  <link rel="stylesheet" href="../../css/button_notification.css" type="text/css">
  <link href="../../datatables/datatablesv2026.min.css" rel="stylesheet">
  <script src="../../datatables/datatablesv2026.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
      $('#example').DataTable({
          language: {
                  "lengthMenu": "Mostrar _MENU_ registros",
                  "zeroRecords": "No se encontraron resultados",
                  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sSearch": "Buscar:",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast":"Último",
                      "sNext":"Siguiente",
                      "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
              },
          // para usar los botones
          responsive: "true",
          dom: 'Bfrtilp',
          buttons:[
        {
          extend:    'excelHtml5',
          text:      '<i class="fas fa-file-excel"></i> ',
          titleAttr: 'Exportar a Excel',
          className: 'btn color-btn-export-xls',
          title:      'METAS ESTUDIOS'
        },
      ]
      });
  });
  </script>
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
          echo "<img src='../../image/mujerup.png' width='100' height='100'>";
        }
        if ($genero=='hombre') {
          echo "<img src='../../image/hombreup.jpg' width='100' height='100'>";
        }
         ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">

      </nav>
    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../../image/ups2.png" alt="" width="1400" height="70">
          <img style="display: block; margin: 0 auto;" src="../../image/ups3.png" alt="" width="1400" height="70">
      </div>
      <div class="container"><br>
        <div class="row">
          <h1 style="text-align:center"><b>
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?>
          </b></h1>
          <h4 style="text-align:center">
            <b><?php echo utf8_decode(strtoupper($row['area'])); ?></b>
          </h4>
        </div>
        <!--Ejemplo tabla con DataTables-->
        <b>
          <br><br>
          <div class="container" style="display: flex; justify-content: center;">
            <div class="row mt-8">
                <form class="d-flex" style="width: 800px;">
                <form action="" method="GET">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="" class="form-label"><b> Del dia</b></label>
                          <input type="date" name="star" id="starfech" class="form-control" required>
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="" class="form-label"><b>Hasta el dia</b> </label>
                          <input type="date" name="fin" id="finfech" class="form-control" required>
                      </div>
                  </div>
                  <div class="col-md-2">
                      <div class="form-group">
                          <label for="" class="form-label"><b>BUSCAR</b></label><br>
                          <button type="submit" id="ocultar-mostrar" class="btn btn-primary" name="enviar"><i class="fa fa-search" aria-hidden="true"></i></button>
                      </div>
                  </div>
                   <br>
                <!-- <button class="btn btn-primary control me-2 fw-bold" type="submit" name="enviar" id="ocultar-mostrar"> <b>Buscar </b> </button> -->
                </form>
              </form>
            </div>
            </div>
            <?php
          $conexion=mysqli_connect("localhost","root","","sistemafgjem");
          $where="";

          if(isset($_GET['enviar'])){
            $fechainicial = date("Y-m-d", strtotime($_GET['star']));
            $fechafin  = date("Y-m-d", strtotime($_GET['fin']));


            if (isset($_GET['star']))
            {
              $where="WHERE evaluacion_persona.fecha_aut BETWEEN '$fechainicial' AND '$fechafin'";
              $mostrar = 1;
            }

          }

          $totalfin2 = 0;
          $totalfin = 0;
          $totaladmns = array();
          $servidoresid = array();

          if ($mostrar === 1) {
            $conexion=mysqli_connect("localhost","root","","sistemafgjem");
            $SQL="SELECT * FROM evaluacion_persona $where";
            $dato = mysqli_query($conexion, $SQL);
            $row_cnt = $dato->num_rows;
            if($dato -> num_rows >0){
              while($fila=mysqli_fetch_array($dato)){
              $idunica_cap = $fila['id'];
            }
            function transformarmesaletra($pasardia, $pasarmes, $pasaranio){
              switch ($pasarmes) {
                case 1:
                echo $fecha_formateada = $pasardia." DE ENERO DE ".$pasaranio;
                break;
                case 2:
                echo $fecha_formateada = $pasardia." DE FEBRERO DE ".$pasaranio;
                break;
                case 3:
                echo $fecha_formateada = $pasardia." DE MARZO DE ".$pasaranio;
                break;
                case 4:
                echo $fecha_formateada = $pasardia." DE ABRIL DE ".$pasaranio;
                break;
                case 5:
                echo $fecha_formateada = $pasardia." DE MAYO DE ".$pasaranio;
                break;
                case 6:
                echo $fecha_formateada = $pasardia." DE JUNIO DE ".$pasaranio;
                break;
                case 7:
                echo $fecha_formateada = $pasardia." DE JULIO DE ".$pasaranio;
                break;
                case 8:
                echo $fecha_formateada = $pasardia." DE AGOSTO DE ".$pasaranio;
                break;
                case 9:
                echo $fecha_formateada = $pasardia." DE SEPTIEMBRE DE ".$pasaranio;
                break;
                case 10:
                echo $fecha_formateada = $pasardia." DE OCTUBRE DE ".$pasaranio;
                break;
                case 11:
                echo $fecha_formateada = $pasardia." DE NOVIEMBRE DE ".$pasaranio;
                break;
                case 12:
                echo $fecha_formateada = $pasardia." DE DICIEMBRE DE ".$pasaranio;
                break;
              }
            }
            // $fechainicial;
            $diainicial = date('d', strtotime($fechainicial));
            $mesnumeroinicial = date('m', strtotime($fechainicial));
            $anioinicial = date('Y', strtotime($fechainicial));
            // transformarmesaletra($diainicial, $mesnumeroinicial, $anioinicial);
            // $fechafin;
            $diafinal = date('d', strtotime($fechafin));
            $mesnumerofinal = date('m', strtotime($fechafin));
            $aniofinal = date('Y', strtotime($fechafin));
          ?>
          <br><br>
          <div class="" id="showafterconsul">
            <div class="container well form-horizontal" style="text-align:center;padding:10px;border:solid 3px; width:98%;border-radius:20px;shadow">
              <div style="display: flex; justify-content: center;">
              </div>
              <h1>PERIODO DE CONSULTA DE LA INFORMACIÓN</h1>
              <h3>DEL <?php transformarmesaletra($diainicial, $mesnumeroinicial, $anioinicial); ?> AL <?php transformarmesaletra($diafinal, $mesnumerofinal, $aniofinal); ?>

              <!-- <div style="float:left;width: 100%;outline: white solid thin"> -->
                <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        </h3>
                          <tr>
                            <th class="table-header" style="text-align:center">NO.</th>
                           <th class="table-header" style="text-align:center">ID</th>
                            <!-- <th class="table-header" style="text-align:center">MUNICIPIO</th>
                            <th class="table-header" style="text-align:center">EXPEDIENTE</th>
                            <th class="table-header" style="text-align:center">ID DE LA PP O SP</th>
                            <th class="table-header" style="text-align:center">KILOMETROS</th> -->
                             <th class="table-header" style="text-align:center">FECHA</th>

                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        $auxsum = 0;
                        $getrondin = "SELECT * FROM evaluacion_persona
                        WHERE analisis != ' '
                        AND fecha_aut <= '2026-02-28'
                        AND fecha_aut >= '2026-02-01';";
                        $rgetrondin = $mysqli->query($getrondin);
                        while ($fgetrondin = $rgetrondin->fetch_assoc()) {
                          $auxsum = $auxsum +1;
                          $idunico = $fgetrondin['id_unico'];
                          $analisis = $fgetrondn['analisis'];
                          $ultimosCinco = substr($fgetrondin['folioexpediente'], -8);
                         // $ultimoexp = "SELECT * FROM evaluacion_persona WHERE analisis = ' ' ";
                          $getinfosujeto = "SELECT * FROM evaluacion_persona WHERE id = '$idunico'";
                          $rgetinfosujeto = $mysqli->query($getinfosujeto);
                          $fgetinfosujeto  = $rgetinfosujeto ->fetch_assoc();
                          $cadena = $fgetinfosujeto['identificador'];
                          // echo "<br>";
                          $caracter = "-";
                          // Encuentra la posición del carácter
                          $posicion = strpos($cadena, $caracter);
                          // Si el carácter existe en la cadena
                          if ($posicion !== false) {
                            // Extrae la parte de la cadena hasta el carácter
                            $parte = substr($cadena, 0, $posicion);
                            // Imprime la parte de la cadena
                            $parte; // Imprimirá "Hola"
                          }
                          $texto = $parte;
                          // Convertir el texto en un array de caracteres
                          $arrayCaracteres = str_split($texto);
                          // Unir los caracteres con un punto
                          $textoConPuntos = implode(".", $arrayCaracteres);
                          $concatenar_rondin ='Expediente_Exp_'.$ultimosCinco.'_'.$textoConPuntos.'_'.$analisis.'.';
                        ?>
                          <tr>
                            <td><?php echo $auxsum; ?></td>
                             <td><?php echo $concatenar_rondin; ?></td>
                           <!--  <td><?php echo $fgetrondin['entidad_municipio']; ?></td>
                            <td><?php echo $fgetrondin['folio_expediente']; ?></td>
                            <td><?php echo $fgetinfosujeto['identificador']; ?></td>
                            <td><?php echo $fgetrondin['kilometraje']; ?></td> -->
                            <td><?php echo date("d/m/Y", strtotime($fgetrondin['fecha_firma'])); ?></td>

                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                  </table>
                </div>
              <!-- </div> -->
            </div>
          </div>


          <?php
          }
        }
          ?>


        </b>

        <div class="contenedor">
          <a href="../admin.php" class="btn-flotante">REGRESAR</a>
        </div>
      </div>
    </div>
  </div>
</body>
<link rel="stylesheet" href="../../css/menuactualizado.css">
<script src="../../js/menu.js"></script>
<script src="../../js/bd_planeacion.js" charset="utf-8"></script>
</html>
