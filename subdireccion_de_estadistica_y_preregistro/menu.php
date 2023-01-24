<?php
/*require 'conexion.php';*/
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
  <title>SIPPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
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
  <!-- <script type="text/javascript" src="../js/toast.js"></script> -->
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
        <h6 style="text-align:center" class='user-nombre'> <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>
      <nav class="menu-nav">
        <ul>
          <li><a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio"><i class='color-icon fas fa-file-pdf menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white; font-weight:bold;" >GLOSARIO</span></a></li>
          <li id="liestadistica" class="subtitle">
      			<a href="#" class="action"><i class='color-icon fa-solid fa-chart-line menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white; font-weight:bold;"> ESTADISTICA</span></a>
      			<ul class="submenu">
              <li id="liexpediente" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/total_expedientes.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-folder-open  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> EXPEDIENTES</span></a></li>
              <!-- <li id="limedidas" class="menu-items"><a href="">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-person-circle-plus  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> EVALUACIÓN <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEGUIMIENTO <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; EXPEDIENTES</span></a></li> -->
              <li id="lipersonas" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/total_personas.php">&nbsp;&nbsp;&nbsp;<i class="color-icon fa-solid fa-users menu-nav--icon fa-fw"></i><span class="menu-items" style="color: white;"> SUJETOS</span></a></li>
              <!-- <li id="limedidas" class="menu-items"><a href="">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-person-circle-plus  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> EVALUACIÓN <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEGUIMIENTO <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SUJETOS</span></a></li> -->
              <li id="limedidas" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/total_medidas.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-briefcase-medical menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> MEDIDAS</span></a></li>

              <li id="liestadistica2" class="subtitle2">
                <a href="#" class="action2">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-sharp fa-solid fa-circle-right menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white; font-weight:bold;"> SEGUIMIENTO</span></a>
                <ul class="submenu2">
                  <!-- <li id="liexpediente" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/total_expedientes.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-folder-open  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> EXPEDIENTES</span></a></li> -->
                  <li id="limedidas" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/evaluacion_expediente.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='color-icon fa-sharp fa-solid fa-file-export menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> EVALUACIÓN <br />  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; EXPEDIENTES</span></a></li>
                  <!-- <li id="lipersonas" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/total_personas.php">&nbsp;&nbsp;&nbsp;<i class="color-icon fa-solid fa-users menu-nav--icon fa-fw"></i><span class="menu-items" style="color: white;"> SUJETOS</span></a></li> -->
                  <li id="limedidas" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/evaluacion_personas.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-person-walking-dashed-line-arrow-right menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> EVALUACIÓN <br />  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SUJETOS</span></a></li>
                  <!-- <li id="limedidas" class="menu-items"><a href="../subdireccion_de_estadistica_y_preregistro/total_medidas.php">&nbsp;&nbsp;&nbsp;<i class='color-icon fa-solid fa-person-circle-plus  menu-nav--icon fa-fw'></i><span class="menu-items" style="color: white;"> MEDIDAS</span></a></li> -->
                </ul>
              </li>
      			</ul>
      		</li>
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
        <div class="dropdown">
          <a id="btnmedidaspendientes" href="../subdireccion_de_estadistica_y_preregistro/medidas_por_validar.php"> <button id="" type="button" class="btn color-btn-success">pendientes por validar</button> </a>                
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
                                    <th style="text-align:center">NO.</th>
                                    <!-- <th style="text-align:center">ID PERSONA</th>
                                    <th style="text-align:center">SEDE</th>
                                    <th style="text-align:center">MUNICIPIO DE RADICACIÓN DE LA CARPETA DE INVESTIGACIÓN</th> -->
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
                                    // echo "<td style='text-align:center'>"; echo $var_fila['num_consecutivo'].'/'. $var_fila['año']; echo "</td>";
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
                                    echo "<td style='text-align:center'><a href='detalles_expediente.php?id=".$var_fila['fol_exp']."'><span class='color-icon glyphicon glyphicon-folder-open'></span></a></td>";

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
    <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a>
  </div>
  <!-- modal del glosario -->
  <div class="modal fade" id="add_data_Modal_convenio" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center" class="modal-title" id="myModalLabel">GLOSARIO SIPPSIPPED</h4>
        </div>
        <div class="modal-body">
          <div className="modal">
            <div className="modalContent">
              <iframe src="../docs/GLOSARIO-SIPPSIPPED.pdf" style="width:870px; height:600px;" ></iframe>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button style="display: block; margin: 0 auto;" type="button" class="btn color-btn-success" data-dismiss="modal">CERRAR</button>
        </div>
      </div>
    </div>
  </div>
  <!-- fin modal  -->
  <?php
  $var = $name;
  $tmf = "SELECT COUNT(*) as t from validar_medida WHERE validar_datos = 'false'";
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
  if (jsvar === 'e-adriana') {
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
       doToast("FALTAN MEDIDAS POR VALIDAR");
      }, 1200);
      // fin de mostrar alerta
    }else {
      document.getElementById('btnmedidaspendientes').style.visibility = "hidden"; // hide
    }
  }else {
    document.getElementById('btnmedidaspendientes').style.visibility = "hidden"; // hide
  }
  if (jsvar === 'jesusaz' || jsvar === 'dircece') {
    document.getElementById('liexpediente').style.visibility = "visible"; // visible
    document.getElementById('lipersonas').style.visibility = "visible"; // visible
    document.getElementById('limedidas').style.visibility = "visible"; // visible
    document.getElementById('liestadistica').style.visibility = "visible"; // visible
  }else {
    document.getElementById('liexpediente').style.visibility = "hidden"; // hide
    document.getElementById('lipersonas').style.visibility = "hidden"; // hide
    document.getElementById('limedidas').style.visibility = "hidden"; // hide
    document.getElementById('liestadistica').style.visibility = "hidden"; // hide
  }
  // CODIGO DE MENU CON submenu
  $(".subtitle .action").click(function(event){
   var subtitle = $(this).parents(".subtitle");
   var submenu = $(subtitle).find(".submenu");

   $(".submenu").not($(submenu)).slideUp("slow").removeClass("opacity");
   $(".open").not($(subtitle)).removeClass("open");

   $(subtitle).toggleClass("open");
   $(submenu).slideToggle("slow").toggleClass("opacity");

   return false;
  });
  //

  // CODIGO DE MENU CON submenu2
  $(".subtitle2 .action2").click(function(event){
   var subtitle2 = $(this).parents(".subtitle2");
   var submenu2 = $(subtitle2).find(".submenu2");

   $(".submenu2").not($(submenu2)).slideUp("slow").removeClass("opacity");
   $(".open").not($(subtitle2)).removeClass("open");

   $(subtitle2).toggleClass("open");
   $(submenu2).slideToggle("slow").toggleClass("opacity");

   return false;
  });
  //
  </script>
</body>
</html>
