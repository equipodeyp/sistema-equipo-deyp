<?php
/*require 'conexion.php';*/
error_reporting(0);
include("conexion.php");
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
  <script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>INFORME SUJETOS</title>
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
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/expediente.css">
<!-- SCRIPT PARA EL MANEJO DE LA TABLA -->
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
          className: 'btn btn-success',
          title:     'INFORME SUJETOS'
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
        <!--Ejemplo tabla con DataTables-->
      </div>
      <div class="container">
        <article class="">
          <div class="secciones form-horizontal sticky breadcrumb flat">
            <a href="../administrador/admin.php">REGISTROS</a>
            <a href="../administrador/estadistica.php">ESTADISTICA</a>
            <a class="actived">TRASLADOS</a>
          </div>
          <div class="container">
            <h2 style="text-align:center">TRASLADOS</h2>
            <div class="">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                    <th style="text-align:center">NO.</th>
                                    <th style="text-align:center">ID TRASLADO</th>
                                    <th style="text-align:center">FECHA TRASLADO</th>
                                    <th style="text-align:center">ID TRASLADO META</th>
                                    <th style="text-align:center">MUNICIPIO DESTINO</th>
                                    <th style="text-align:center">MOTIVO</th>
                                    <th style="text-align:center">EXPEDIENTE</th>
                                    <th style="text-align:center">ID DE LA PP O SP</th>
                                    <th style="text-align:center">EN RESGUARDO</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $auxsum = 0;
                                $auxsum2 = 0;
                                $sujetosidrecor = array();
                                $sujetosidrecor2 = array();
                                $conteotrasdestino001 = "SELECT * FROM react_sujetos_traslado
                                INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                                INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                                INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                                ORDER BY react_traslados.fecha ASC";
                                $rconteotrasdestino001 = $mysqli->query($conteotrasdestino001);
                                while ($fconteotrasdestino001 = $rconteotrasdestino001->fetch_assoc()){
                                  $iddd = intVal($fconteotrasdestino001['id_sujeto']);
                                  array_push($sujetosidrecor, $iddd);
                                }
                                // Verificar si el array tiene al menos dos elementos
                                if (count($sujetosidrecor) >= 3) {
                                    // Iterar sobre el array
                                    for ($i = 0; $i < count($sujetosidrecor); $i++) {
                                        // Obtener el valor anterior
                                        $anterior = ($i > 0) ? $sujetosidrecor[$i - 1] : null;
                                        $anterior2 = ($i > 0) ? $sujetosidrecor[$i - 2] : null;
                                        // Obtener el valor actual
                                        $actual = $sujetosidrecor[$i];
                                        $actual2 = $sujetosidrecor[$i+1];
                                        // Comparar si el valor anterior es igual al valor actual
                                        if ($i > 0 && $anterior2 == $actual) {
                                             // echo "Valor igual: 3" . PHP_EOL;
                                             array_push($sujetosidrecor2, 3);
                                        }elseif ($i > 0 && $anterior == $actual) {
                                           // "Valecho or igual: 2" . PHP_EOL;
                                           array_push($sujetosidrecor2, 2);
                                        } else {
                                            //Si es diferente, imprimimos el valor actual.
                                             // echo "Valor desigual: 1" . PHP_EOL;
                                             array_push($sujetosidrecor2, 1);
                                        }
                                    }
                                }
                                $conteotrasdestino = "SELECT * FROM react_sujetos_traslado
                                INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
                                INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                                INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
                                ORDER BY react_traslados.fecha ASC";
                                $rconteotrasdestino = $mysqli->query($conteotrasdestino);
                                while ($fconteotrasdestino = $rconteotrasdestino->fetch_assoc()) {
                                  $auxsum = $auxsum +1;
                                  $valdestino = $fconteotrasdestino['id_destino'];

                                  //
                                  $idsujet = $fconteotrasdestino['id_sujeto'];
                                  $checkdentro = "SELECT COUNT(*) AS resguardo FROM medidas
                                  WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$idsujet'";
                                  $rcheckdentro = $mysqli->query($checkdentro);
                                  $fcheckdentro = $rcheckdentro->fetch_assoc();
                                  // echo $fcheckdentro['resguardo'];
                                  if ($fcheckdentro['resguardo'] > 0) {
                                    $resguardado = 'SI';
                                  }else {
                                    $resguardado = 'NO';
                                  }
                                  //
                                  $conteotrasdestino2 = "SELECT COUNT(*) AS pt FROM react_sujetos_traslado
                                   INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
                                   WHERE react_sujetos_traslado.id_sujeto = '$idsujetorecor' AND react_sujetos_traslado.id_traslado ='$numtrasladorecor'";
                                  $rconteotrasdestino2 = $mysqli->query($conteotrasdestino2);
                                  $fconteotrasdestino2 = $rconteotrasdestino2->fetch_assoc();

                                  $resmotivodes = $fconteotrasdestino['motivo'];

                                  $restrasladounico = $fconteotrasdestino['idtrasladounico'];
                                  $resmunicipiodes = $fconteotrasdestino['municipio'];
                                  $cadena = $resmotivodes;
                                  $texto_minusculas = mb_strtolower($cadena, 'UTF-8');
                                  $texto_minusculas2 = mb_strtolower($resmunicipiodes, 'UTF-8');
                                  // $texto_minusculas; // Imprime "hola mundo, éste es un ejemplo."
                                  // echo "<br>";
                                  $foo = ucfirst($texto_minusculas);
                                  $foo2= ucfirst($texto_minusculas2);
                                  // echo "<br>";
                                   $ultimosCinco = substr($fconteotrasdestino['folio_expediente'], -7);
                                   $idtrascont = substr($fconteotrasdestino['idtrasladounico'], 0, 3);
                                   // $fconteotrasdestino['identificador'];
                                  $cadena = $fconteotrasdestino['identificador'];
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
                                  $concatenacion = 'Traslado_Exp_'.$ultimosCinco.'-'.$textoConPuntos.'.-'.$foo.'-'.$idtrascont;
                                ?>
                                <tr>
                                  <td><?php  echo $auxsum; ?></td>
                                  <td><?php echo $fconteotrasdestino['idtrasladounico']; ?></td>
                                  <td><?php echo date("d/m/Y", strtotime($fconteotrasdestino['fecha'])); ?></td>
                                  <td><?php echo $concatenacion; ?></td>
                                  <td><?php echo $fconteotrasdestino['municipio']; ?></td>
                                  <td><?php echo $fconteotrasdestino['motivo']; ?></td>
                                  <td><?php echo $fconteotrasdestino['folio_expediente']; ?></td>
                                  <td><?php echo $fconteotrasdestino['identificador']; ?></td>
                                  <td><?php echo $resguardado; ?></td>
                                </tr>
                              <?php
                              $auxsum2 = $auxsum2 +1;
                              }
                              ?>
                              </tbody>
                             </table>
                            </div>
                        </div>
                </div>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
  <div class="contenedor">
  </div>
</body>
</html>
