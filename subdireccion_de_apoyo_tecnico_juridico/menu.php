<?php
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
// echo $name;
if (!isset($name)) {
  header("location: ../logout.php");
}
// // Comprobamos si esta definida la sesión 'tiempo'.
// if(isset($_SESSION['tiempo']) ) {
//
//     //Tiempo en segundos para dar vida a la sesión.
//     $inactivo = 100;//20min en este caso.
//
//     //Calculamos tiempo de vida inactivo.
//     $vida_session = time() - $_SESSION['tiempo'];
//
//         //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
//         if($vida_session > $inactivo)
//         {
//             //Removemos sesión.
//             session_unset();
//             //Destruimos sesión.
//             session_destroy();
//             //Redirigimos pagina.
//             header("Location: ../logout.php");
//
//             exit();
//         }
//
// }
// $_SESSION['tiempo'] = time();
    // El siguiente key se crea cuando se inicia sesión

$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <script src="../js/botonatras.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
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
    //     responsive: "true",
    //     dom: 'Bfrtilp',
    //     buttons:[
    //   {
    //     extend:    'excelHtml5',
    //     text:      '<i class="fas fa-file-excel"></i> ',
    //     titleAttr: 'Exportar a Excel',
    //     className: 'btn btn-success'
    //   },
    //   {
    //     extend:    'pdfHtml5',
    //     text:      '<i class="fas fa-file-pdf"></i> ',
    //     titleAttr: 'Exportar a PDF',
    //     className: 'btn btn-danger'
    //   },
    //   {
    //     extend:    'print',
    //     text:      '<i class="fa fa-print"></i> ',
    //     titleAttr: 'Imprimir',
    //     className: 'btn btn-info'
    //   },
    // ]
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
          echo "<img src='../image/mujerup.png' width='100' height='100'>";
        }

        if ($genero=='hombre') {
          // $foto = ../image/user.png;
          echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
        }
        // echo $genero;
         ?>
        <!-- <img src="$genero" alt="" width="100" height="100"> -->
        <span class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </span>
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
            <?php   echo utf8_decode(strtoupper($row['nombre'])); ?> </span>
            <?php echo utf8_decode(strtoupper($row['apellido_p'])); ?> </span>
            <?php echo utf8_decode(strtoupper($row['apellido_m'])); ?> </span>
          </h1>
          <h2 style="text-align:center">
            <?php echo utf8_decode(strtoupper($row['area'])); ?> </span>
          </h2>
        </div>
        <div class="row">
          <a href="crear_expediente.php" class="btn btn-primary">Nuevo Expediente</a>
        </div>
        <br>
        <!--Ejemplo tabla con DataTables-->
        <div class="">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center">ID</th>
                                    <th style="text-align:center">SEDE</th>
                                    <th style="text-align:center">MUNICIPIO DE RADICACION</th>
                                    <th style="text-align:center">FECHA RECEPCION</th>
                                    <th style="text-align:center">FOLIO EXPEDIENTE</th>
                                    <th style="text-align:center">PERSONAS</th>
                                    <th style="text-align:center">MEDIDAS</th>
                                    <th style="text-align:center">VALIDACION</th>
                                    <th style="text-align:center">DETALLES</th>

                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $sql = "SELECT * FROM expediente";
                              $resultado = $mysqli->query($sql);
                              $row = $resultado->fetch_array(MYSQLI_ASSOC);
                              $fol_exp =$row['fol_exp'];
                              $tabla="SELECT * FROM expediente";
                              $var_resultado = $mysqli->query($tabla);
                              while ($var_fila=$var_resultado->fetch_array())
                              {
                                $fol_exp2=$var_fila['fol_exp'];

                                $cant="SELECT COUNT(*) AS cant FROM medidas WHERE folioexpediente = '$fol_exp2'";
                                $r=$mysqli->query($cant);
                                $row2 = $r->fetch_array(MYSQLI_ASSOC);

                                $abc="SELECT count(*) as c FROM datospersonales WHERE folioexpediente='$fol_exp2'";
                                $result=$mysqli->query($abc);
                                if($result)
                                {
                                  while($row=mysqli_fetch_assoc($result))
                                  {
                                    echo "<tr>";
                                    echo "<td style='text-align:center'>"; echo $var_fila['id']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $var_fila['sede']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $var_fila['municipio']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $var_fila['fecharecep']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $var_fila['fol_exp']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $row['c']; echo "</td>";
                                    echo "<td style='text-align:center'>"; echo $row2['cant']; echo "</td>";
                                    echo "<td style='text-align:center'>"; if ($var_fila['validacion'] == 'true') {
                                      echo "<i class='fas fa-check'></i>";
                                    }elseif ($var_fila['validacion'] == 'false') {
                                      echo "<i class='fas fa-times'></i>";
                                    } echo "</td>";
                                    echo "<td style='text-align:center'><a href='modificar.php?id=".$var_fila['fol_exp']."'><span class='glyphicon glyphicon-folder-open'></span></a></td>";

                                    echo "</tr>";

                                  }

                                }
                              }
                            ?>
                            </tbody>
                           </table>
                        </div>
                    </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="contenedor">
    <a href="../logout.php" class="btn-flotante">Cerrar Sesión</a>
  </div>
</body>
</html>
