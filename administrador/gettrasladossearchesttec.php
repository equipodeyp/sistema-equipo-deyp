<?php
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set("America/Mexico_City");
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
//Si la variable de sesión no existe,
//Se presume que la página aún no se ha actualizado.
if(!isset($_SESSION['already_refreshed'])){
  ////////////////////////////////////////////////////////////////////////////////
  $sentenciar=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
  $resultr = $mysqli->query($sentenciar);
  $rowr=$resultr->fetch_assoc();
  $areauser = $rowr['area'];
  $fecha = date('y/m/d H:i:sa');
  ////////////////////////////////////////////////////////////////////////////////
  $saveiniciosession = "INSERT INTO inicios_sesion(usuario, area, fecha_entrada)
                VALUES ('$name', '$areauser', '$fecha')";
  $res_saveiniciosession = $mysqli->query($saveiniciosession);
  ////////////////////////////////////////////////////////////////////////////////
//Establezca la variable de sesión para que no
//actualice de nuevo.
  $_SESSION['already_refreshed'] = true;
}
$check_traslado = 1;
$_SESSION["check_traslado"] = $check_traslado;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>METAS CONVENIOS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/funciones_react.js"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/main2.css">
  <link rel="stylesheet" href="../css/expediente.css">
  <!-- font-awesome -->
  <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css" rel="stylesheet">
  <!-- estilos de diseño add traslados -->
  <link rel="stylesheet" href="../css/react_add_traslados.css">
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
      <div class="user">
        <?php
        $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
        $result = $mysqli->query($sentencia);
        $row=$result->fetch_assoc();
        $genero = $row['sexo'];

        if ($genero=='mujer') {
          echo "<img style='text-align:center;' src='../image/mujerup.png' width='100' height='100'>";
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
      <div class="container">
        <div class="row">
          <h1 style="text-align:center">
            <?php echo mb_strtoupper (html_entity_decode($row['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_p'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
            <?php echo mb_strtoupper (html_entity_decode($row['apellido_m'], ENT_QUOTES | ENT_HTML401, "UTF-8")); ?> </span>
          </h1>
          <h4 style="text-align:center">
            <?php echo utf8_decode(strtoupper($row['area'])); ?> </span>
          </h4>
        </div>
      </div>
      <div class="">
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


        ?>
                   <br>


              </form>
            </div>

            <?php
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
              ?>
              <!-- html -->
              <?php
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
              <div class="" id="showafterconsul">
                <div class="container well form-horizontal" style="text-align:center;padding:10px;border:solid 3px; width:98%;border-radius:20px;shadow">
                  <div style="display: flex; justify-content: center;">

                  </div>
                  <div style="float:left;width: 100%;outline: white solid thin">
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <h1>PERIODO DE CONSULTA DE LA INFORMACIÓN</h1>
                          <h3>DEL <?php transformarmesaletra($diainicial, $mesnumeroinicial, $anioinicial); ?> AL <?php transformarmesaletra($diafinal, $mesnumerofinal, $aniofinal); ?>
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
                          AND fecha_aut <= '2025-12-31'
                          AND fecha_aut >= '2025-12-01';";
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
                  </div>
                </div>
              </div>
              <br><br>
              <?php
            }else {
              ?>
              <div class="alert alert-warning" role="alert">
                <h1 style="text-align:center">no existen registros</h1>
              </div>
              <?php
              $mostrar =0;
            }
            }
            ?>
      </div>
      <?php
      if ($mostrar === 1) {
      ?>
      <?php
      }
      ?>
    </div>
  </div>
  <div class="contenedor">
      <a href="bd_metas.php" class="btn-flotante">REGRESAR</a>
  </div>
  <script type="text/javascript">
    function verdato(){
      // console.log('prueba dato');
      document.getElementById("showafterconsul").style.display = "none";
      document.getElementById("showbotonpdf").style.display = "none";
    }
  </script>
</body>
</html>
