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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>
  <link rel="stylesheet" type="text/css" href="../css/toast.css"/>
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
<style>
  .pagination {
display: inline-block;
padding-left: 0;
margin: 20px 0;
border-radius: 4px;
}
.pagination > li {
display: inline;
}
.pagination > li > a,
.pagination > li > span {
position: relative;
float: left;
padding: 6px 12px;
margin-left: -1px;
line-height: 1.42857143;
color: #63696D;
text-decoration: none;
background-color: #fff;
border: 1px solid #ddd;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
margin-left: 0;
border-top-left-radius: 4px;
border-bottom-left-radius: 4px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
border-top-right-radius: 4px;
border-bottom-right-radius: 4px;
}
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
z-index: 2;
color: #63696D;
background-color: #eee;
border-color: #ddd;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
z-index: 3;
color: #fff;
cursor: default;
background-color: #63696D;
border-color: #5F6D6B;
}
.pagination > .disabled > span,
.pagination > .disabled > span:hover,
.pagination > .disabled > span:focus,
.pagination > .disabled > a,
.pagination > .disabled > a:hover,
.pagination > .disabled > a:focus {
color: #777;
cursor: not-allowed;
background-color: #fff;
border-color: #ddd;
}
.pagination-lg > li > a,
.pagination-lg > li > span {
padding: 10px 16px;
font-size: 18px;
line-height: 1.3333333;
}
.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
border-top-left-radius: 6px;
border-bottom-left-radius: 6px;
}
.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
border-top-right-radius: 6px;
border-bottom-right-radius: 6px;
}
.pagination-sm > li > a,
.pagination-sm > li > span {
padding: 5px 10px;
font-size: 12px;
line-height: 1.5;
}
.pagination-sm > li:first-child > a,
.pagination-sm > li:first-child > span {
border-top-left-radius: 3px;
border-bottom-left-radius: 3px;
}
.pagination-sm > li:last-child > a,
.pagination-sm > li:last-child > span {
border-top-right-radius: 3px;
border-bottom-right-radius: 3px;
}

a:hover,
a:focus {
color: #FFFFFF;
text-decoration: underline;
}
</style>
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
          echo "<img style'text-align:center' src='../image/mujerup.png' width='100' height='100'>";
        }

        if ($genero=='hombre') {
          // $foto = ../image/user.png;
          echo "<img style'text-align:center' src='../image/hombreup.jpg' width='100' height='100'>";
        }
        // echo $genero;
         ?>
        <!-- <img src="$genero" alt="" width="100" height="100"> -->
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">
          <ul>
              <!-- <li class="menu-items"><a  href="#" onclick="location.href='resumen_tickets_enproceso.php'"><i class="fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span> Incidencia</span></a></li> -->
              <!-- <li class="menu-items"><a  href="#" onclick="location.href='repo.php'"><i class="fa-solid fa-folder-plus menu-nav--icon fa-fw  "></i><span> Repositorio </span></a></li> -->
              <!-- <a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio"><i class='fas fa-file-pdf  menu-nav--icon fa-fw'></i><span class="menu-items"> Glosario</span></a> -->
              <!-- <a href="#"><i class='fa-solid fa-magnifying-glass  menu-nav--icon fa-fw'></i><span class="menu-items"> Busqueda</span></a> -->
              <!-- <li class="menu-items"><a href="../administrador/estadistica.php"><i class="fa-solid fa-chart-line menu-nav--icon fa-fw"></i><span class="menu-items"> ESTADISTICA</span></a></li> -->
          </ul>
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
        <div class="row">
          <a href="crear_expediente.php" class="btn-flotante-nuevo-exp">Nuevo Expediente</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a style="visibility:hidden;" id="btnmedidaspendientes" class="btn-flotante-nuevo-exp" href="../subdireccion_de_apoyo_tecnico_juridico/medidas_por_validar.php">pendientes por validar</a>
        </div>
        <br>
        <!--Ejemplo tabla con DataTables-->
        <div class="">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                <h3 style="text-align:center">Registros</h3>
                                  <tr>
                                      <th style="text-align:center">No.</th>
                                      <!-- <th style="text-align:center">ID PERSONA</th>
                                      <th style="text-align:center">SEDE</th>
                                      <th style="text-align:center">MUNICIPIO DE RADICACIÓN DE LA CARPETA DE INVESTICACIÓN</th> -->
                                      <th style="text-align:center">FECHA DE RECEPCIÓN DE LA SOLICITUD DE INCORPORACIÓN AL PROGRAMA</th>
                                      <th style="text-align:center">FOLIO DEL EXPEDIENTE DE PROTECCIÓN</th>
                                      <th style="text-align:center">PERSONAS PROPUESTAS</th>
                                      <th style="text-align:center">MEDIDAS DE APOYO OTORGADAS</th>
                                      <th style="text-align:center">VALIDACIÓN DEL EXPEDIENTE DE PROTECCIÓN</th>
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
                                      // echo "<td style='text-align:center'>"; echo $var_fila['num_consecutivo'].'/'.$var_fila['año']; echo "</td>";
                                      // echo "<td style='text-align:center'>"; echo $var_fila['sede']; echo "</td>";
                                      // echo "<td style='text-align:center'>"; echo $var_fila['municipio']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $var_fila['fecharecep']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $var_fila['fol_exp']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $row['c']; echo "</td>";
                                      echo "<td style='text-align:center'>"; echo $row2['cant']; echo "</td>";
                                      echo "<td style='text-align:center'>"; if ($var_fila['validacion'] == 'true') {
                                        echo "<i class='fas fa-check'></i>";
                                      }elseif ($var_fila['validacion'] == 'false') {
                                        echo "<i class='fas fa-times'></i>";
                                      } echo "</td>";
                                      echo "<td style='text-align:center'><a href='modificar.php?id=".$var_fila['fol_exp']."'><span class='glyphicon glyphicon-folder-open color-icon'></span></a></td>";

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
    <div class="columns download">

              <a href="../docs/GLOSARIO-SIPPSIPPED.pdf" class="btn-flotante-glosario" download="GLOSARIO-SIPPSIPPED.pdf"><i class="fa fa-download"></i>GLOSARIO</a>

    </div>
    <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a>
  </div>
  <?php
  $var = $name;
  $tmf = "SELECT COUNT(*) as t from validar_medida
  INNER JOIN medidas ON medidas.id = validar_medida.id_medida
  WHERE validar_medida.validar_datos = 'true' AND validar_medida.1ervalidacion = 'false' AND medidas.tipo = 'PROVISIONAL'";
  $rtmf = $mysqli->query($tmf);
  $ftmf = $rtmf->fetch_assoc();
  $mmed =  $ftmf['t'];
  ?>
  <script type="text/javascript">
  <?php
  echo "var jsvar ='$var';";
  echo "var jsvmedidasfalse ='$mmed';";
  ?>
  console.log(jsvar);
  console.log(jsvmedidasfalse);

    if (jsvmedidasfalse > 0) {
      document.getElementById('btnmedidaspendientes').style.visibility = "visible"; // visible
      console.log(jsvar);
      console.log(jsvmedidasfalse);
      (function(window, document) { // asilamos el componente
      // creamos el contedor de las tostadas o la tostadora
      var container = document.createElement('div');
      container.className = 'toast-container';
      document.body.appendChild(container);

      // esta es la funcion que hace la tostada
      window.doToast = function(message) {
        // creamos tostada
        var toast = document.createElement('div');
        toast.className = 'toast-toast';
        toast.innerHTML = message;

        // agregamos a la tostadora
        container.appendChild(toast);

        // programamos su eliminación
        setTimeout(function() {
          // cuando acabe de desaparecer, lo eliminamos del dom.
          toast.addEventListener("transitionend", function() {
             container.removeChild(toast);
          }, false);

          // agregamos un estilo que inicie la "transition".
          toast.classList.add("fadeout");
        }, 10000); // OP dijo, "solo dos segundos"
      }
      })(window, document);

      // ejempo de uso
      doToast("¡ATENCIÓN!");

      // ejemplo retardado de uso
      setTimeout(function() {
       doToast("FALTAN MEDIDAS");
       doToast("PROVISIONALES POR VALIDAR");
      }, 1200);
      // fin de mostrar alerta
    }
  </script>
</body>
</html>
