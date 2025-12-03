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
  <title>BD ASISTENCIAS MEDICAS</title>
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
  <!-- <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script> -->
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
          className: 'btn color-btn-export-xls'
        },
      ]
      });
  });
  </script>
  
  <style media="screen">
  .submenu {
    display: none;
  }
  .opacity {
    /* opacity: 100%; */
  }


  /*  */
  .submenu2 {
    display: none;
  }
  .opacity2 {
    /* opacity: 100%; */
  }
  /*  */

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
          <article>
            <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="./menu_asistencias_medicas.php">MENÚ ASISTENCIAS MÉDICAS</a>
              <a href="./estadistica_asistencias_medicas.php" class="actived">ESTADISTICA</a>
            </div>
            <div class="container">
              <h2 style="text-align:center">BASE DE DATOS ASISTENCIAS MÉDICAS</h2>
              <div class="col-lg-12">
                  <div class="table-responsive">
                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <!-- <h3 style="text-align:center">Registros</h3> -->
                          <tr>
                              <th style="text-align:center">No.</th>
                              <th style="text-align:center">FOLIO EXPEDIENTE</th>
                              <th style="text-align:center">ID SUJETO</th>
                              <th style="text-align:center">ID ASISTENCIA MÉDICA</th>
                              <th style="text-align:center">FECHA SOLICITUD</th>
                              <th style="text-align:center">REQUERIMIENTO</th>
                              <th style="text-align:center">SERVICIO MÉDICO</th>
                              <th style="text-align:center">ETAPA</th>
                              <th style="text-align:center">ID SERVIDOR</th>

                              <th style="text-align:center" >TIPO DE INSTITUCIÓN</th>
                              <th style="text-align:center">NOMBRE INSTITUCIÓN</th>
                              <th style="text-align:center">MUNICIPIO</th>

                              
                              <th style="text-align:center">FECHA ASISTENCIA</th>
                              <th style="text-align:center">HORA ASISTENCIA</th>

                              <th style="text-align:center">TRASLADO REALIZADO</th>
                              <th style="text-align:center">SE PRESENTÓ</th>
                              <th style="text-align:center">HOSPITALIZACIÓN</th>
                              <th style="text-align:center">CITA DE SEGUIMIENTO</th>
                              <th style="text-align:center">DIAGNÓSTICO</th>

                              <th style="text-align:center">TOTAL DE MEDICAMENTOS REGISTRADOS</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                                        $contador = 0;


                                        $consulta1 = "SELECT *
                                        FROM solicitud_asistencia
                                        ORDER BY solicitud_asistencia.id ASC";

                                        $var_resultado1 = $mysqli->query($consulta1);

                                        while ($var_fila1=$var_resultado1->fetch_array())
                                        {
                                          $contador = $contador + 1;
                                          $id_asistencia_m = $var_fila1['id_asistencia'];

                                          $consulta2 = "SELECT agendar_asistencia.tipo_institucion, agendar_asistencia.nombre_institucion, 
                                          agendar_asistencia.municipio_institucion
                                          FROM agendar_asistencia
                                          WHERE agendar_asistencia.id_asistencia = '$id_asistencia_m'
                                          ORDER BY agendar_asistencia.id ASC";

                                          $var_resultado2 = $mysqli->query($consulta2);
                                          $var_fila2=$var_resultado2->fetch_array();


                                          $consulta3 = "SELECT cita_asistencia.fecha_asistencia, cita_asistencia.hora_asistencia
                                          FROM cita_asistencia
                                          WHERE cita_asistencia.id_asistencia = '$id_asistencia_m'
                                          ORDER BY cita_asistencia.id DESC
                                          LIMIT 1";
      
                                          $var_resultado3 = $mysqli->query($consulta3);
                                          $var_fila3=$var_resultado3->fetch_array();


                                          $consulta4 = "SELECT seguimiento_asistencia.traslado_realizado, seguimiento_asistencia.se_presento, 
                                          seguimiento_asistencia.hospitalizacion, seguimiento_asistencia.cita_seguimiento, 
                                          seguimiento_asistencia.diagnostico 
                                          FROM seguimiento_asistencia
                                          WHERE seguimiento_asistencia.id_asistencia = '$id_asistencia_m'
                                          ORDER BY seguimiento_asistencia.id DESC
                                          LIMIT 1";

                                          $var_resultado4 = $mysqli->query($consulta4);
                                          $var_fila4=$var_resultado4->fetch_array();

                                          $consulta5 = "SELECT COUNT(*) as total
                                          FROM tratamiento_medico
                                          WHERE tratamiento_medico.id_asistencia = '$id_asistencia_m'";

                                          $var_resultado5 = $mysqli->query($consulta5);
                                          $var_fila5=$var_resultado5->fetch_array();

                                            echo "<tr>";
                                            echo "<td style='text-align:center'>"; echo $contador; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila1['folio_expediente']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila1['id_sujeto']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila1['id_asistencia']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila1['fecha_solicitud']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila1['tipo_requerimiento']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila1['servicio_medico']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila1['etapa']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila1['id_servidor']; echo "</td>";

                                            echo "<td style='text-align:center'>"; echo $var_fila2['tipo_institucion']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila2['nombre_institucion']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila2['municipio_institucion']; echo "</td>";

                                            echo "<td style='text-align:center'>"; echo $var_fila3['fecha_asistencia']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila3['hora_asistencia']; echo "</td>";

                                            echo "<td style='text-align:center'>"; echo $var_fila4['traslado_realizado']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila4['se_presento']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila4['hospitalizacion']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila4['cita_seguimiento']; echo "</td>";
                                            echo "<td style='text-align:center'>"; echo $var_fila4['diagnostico']; echo "</td>";

                                            echo "<td style='text-align:center'>"; echo $var_fila5['total']; echo "</td>";

                                            echo "</tr>";

                                          }
                        ?>
                      </tbody>
                     </table>
                  </div>
              </div>
            </div>
          </article>
      </div>
    </div>
  </div>


  <div class="contenedor">
    <a href="./menu_asistencias_medicas.php" class="btn-flotante-regresar color-btn-success-gray">INICIO</a>
  </div>

</body>
</html>



<!-- echo "<td style='text-align:center'>"; echo $var_fila['']; echo "</td>";
echo "<td style='text-align:center'>"; echo $var_fila['']; echo "</td>";
echo "<td style='text-align:center'>"; echo $var_fila['']; echo "</td>"; -->



<!-- 
<?php



$consulta1 = "SELECT solicitud_asistencia.folio_expediente, solicitud_asistencia.id_sujeto, 
solicitud_asistencia.id_asistencia, solicitud_asistencia.fecha_solicitud, 
solicitud_asistencia.tipo_requerimiento, solicitud_asistencia.servicio_medico, 
solicitud_asistencia.etapa, solicitud_asistencia.id_servidor
FROM solicitud_asistencia
ORDER BY solicitud_asistencia.id ASC";

$var_resultado1 = $mysqli->query($consulta1);

            while ($var_fila1=$var_resultado1->fetch_array())
            {
              $contador = $contador + 1;
              $id_asistencia_m = $var_fila1['id_asistencia'];
              // echo $id_asistencia_m;
                echo "<tr>";
                echo "<td style='text-align:center'>"; echo $contador; echo "</td>";
                echo "<td style='text-align:center'>"; echo $var_fila1['folio_expediente']; echo "</td>";
                echo "<td style='text-align:center'>"; echo $var_fila1['id_sujeto']; echo "</td>";
                echo "<td style='text-align:center'>"; echo $var_fila1['id_asistencia']; echo "</td>";
                echo "<td style='text-align:center'>"; echo $var_fila1['fecha_solicitud']; echo "</td>";
                echo "<td style='text-align:center'>"; echo $var_fila1['tipo_requerimiento']; echo "</td>";
                echo "<td style='text-align:center'>"; echo $var_fila1['servicio_medico']; echo "</td>";
                echo "<td style='text-align:center'>"; echo $var_fila1['etapa']; echo "</td>";
                echo "<td style='text-align:center'>"; echo $var_fila1['id_servidor']; echo "</td>";



                $consulta5 = "SELECT agendar_asistencia.tipo_institucion, agendar_asistencia.nombre_institucion, 
                agendar_asistencia.municipio_institucion
                FROM agendar_asistencia
                WHERE agendar_asistencia.id_asistencia = '$id_asistencia_m'
                ORDER BY agendar_asistencia.id ASC";

                $var_resultado5 = $mysqli->query($consulta5);
                // if (!$var_resultado5) {

                

                  while ($var_fila5=$var_resultado5->fetch_array())
                    {
                      echo "<td style='text-align:center'>"; echo $var_fila5['tipo_institucion']; echo "</td>";
                      echo "<td style='text-align:center'>"; echo $var_fila5['nombre_institucion']; echo "</td>";
                      echo "<td style='text-align:center'>"; echo $var_fila5['municipio_institucion']; echo "</td>";


                          
                
                      $consulta2 = "SELECT cita_asistencia.fecha_asistencia, cita_asistencia.hora_asistencia
                                    FROM cita_asistencia
                                    WHERE cita_asistencia.id_asistencia = '$id_asistencia_m'
                                    ORDER BY cita_asistencia.id DESC
                                    LIMIT 1";

                                    $var_resultado2 = $mysqli->query($consulta2);


                                      while ($var_fila2=$var_resultado2->fetch_array())
                                        {
                                          echo "<td style='text-align:center'>"; echo $var_fila2['fecha_asistencia']; echo "</td>";
                                          echo "<td style='text-align:center'>"; echo $var_fila2['hora_asistencia']; echo "</td>"; 



                                              $consulta3 = "SELECT seguimiento_asistencia.traslado_realizado, seguimiento_asistencia.se_presento, 
                                                            seguimiento_asistencia.hospitalizacion, seguimiento_asistencia.cita_seguimiento, 
                                                            seguimiento_asistencia.diagnostico 
                                                            FROM seguimiento_asistencia
                                                            WHERE seguimiento_asistencia.id_asistencia = '$id_asistencia_m'
                                                            ORDER BY seguimiento_asistencia.id DESC
                                                            LIMIT 1";

                                                            $var_resultado3 = $mysqli->query($consulta3);

                                                              while ($var_fila3=$var_resultado3->fetch_array())
                                                                {
                                                                  echo "<td style='text-align:center'"; echo $var_fila3['traslado_realizado']; echo "</td>";
                                                                  echo "<td style='text-align:center'"; echo $var_fila3['se_presento']; echo "</td>";
                                                                  echo "<td style='text-align:center'"; echo $var_fila3['hospitalizacion']; echo "</td>";
                                                                  echo "<td style='text-align:center'"; echo $var_fila3['cita_seguimiento']; echo "</td>";
                                                                  echo "<td style='text-align:center'"; echo $var_fila3['diagnostico']; echo "</td>";



                                                                          $consulta4 = "SELECT COUNT(*) as total
                                                                          FROM tratamiento_medico
                                                                          WHERE tratamiento_medico.id_asistencia = '$id_asistencia_m'
                                                                          ORDER BY tratamiento_medico.id ASC";

                                                                          $var_resultado4 = $mysqli->query($consulta4);
                
                                                                              while ($var_fila4=$var_resultado4->fetch_array())
                                                                                {
                                                                                  echo "<td style='text-align:center'>"; echo $var_fila4['total']; echo "</td>";

                                                                                  // if ($var_fila5['tipo_institucion'] == "") {
                                                                                  //   echo "<td style='text-align:center'>"; echo "---"; echo "</td>";
                                                                                  // }
                                                                                }
                                                                
                                                                }
                                                                
                                        }



                                  }
                    // } else{
                    //   echo "<td style='text-align:center'>"; echo "</td>";
                    //   echo "<td style='text-align:center'>"; echo "</td>";
                    //   echo "<td style='text-align:center' >"; echo "</td>";

                    // }

                echo "</tr>";

            }



?> 
-->
