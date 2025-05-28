<?php
/*require 'conexion.php';*/
// prueba commit
date_default_timezone_set("America/Mexico_City");
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
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
// echo"$name";
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
  <!-- <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet"> -->
  <!--  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <!--  -->
  <!-- <script src="../js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="../css/exp2024.css">
  <link rel="stylesheet" href="../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/main2.css">
  <!--datables CSS básico-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/af-2.7.0/b-3.1.2/b-colvis-3.1.2/b-html5-3.1.2/b-print-3.1.2/datatables.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/af-2.7.0/b-3.1.2/b-colvis-3.1.2/b-html5-3.1.2/b-print-3.1.2/datatables.min.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/af-2.7.0/b-3.1.2/b-colvis-3.1.2/b-html5-3.1.2/b-print-3.1.2/datatables.min.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js  "></script> -->

  <!-- datatables JS -->
  <!-- <script type="text/javascript" src="../datatables/datatables.min.js"></script> -->
  <!-- para usar botones en datatables JS -->
  <!-- <script src="../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>
  <!-- estilo y js del mensaje de notificacion de que faltan medidas por validar -->
  <link rel="stylesheet" type="text/css" href="../css/toast.css"/>
  <!-- <script type="text/javascript" src="../js/toast.js"></script> -->
<!-- SCRIPT PARA EL MANEJO DE LA TABLA -->
<script type="text/javascript">
$(document).ready(function() {
  $('#example').DataTable({
    // dom: 'Bftip',
    // buttons: [
    //     'copy', 'excel', 'pdf'
    // ],
    // "language": {
    // "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    // }

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


});
//
$('#dentroresguardo').DataTable({
  // dom: 'Bftip',
  // buttons: [
  //     'copy', 'excel', 'pdf'
  // ],
  // "language": {
  // "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
  // }

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


});
//
$('#fueraresguardo').DataTable({
  // dom: 'Bftip',
  // buttons: [
  //     'copy', 'excel', 'pdf'
  // ],
  // "language": {
  // "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
  // }

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


});
//
} );
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
        <h6 style="text-align:center" class='user-nombre'> <?php echo "" . $_SESSION['usuario']; ?> </h6>
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

        <!--  -->
        <div class="">
          <div class="row">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <table id="dentroresguardo" class="display" style="width:100%; border-collapse: separate; border: #63696D 5px solid;">
                    <thead>
                      <h3 style="text-align:center">SUJETOS DENTRO DEL CENTRO DE RESGUARDO</h3>
                      <tr>
                        <th style="text-align:center; font-size: 12px;" rowspan="2">NO</th>
                        <th style="text-align:center; font-size: 12px;" rowspan="2">INICIALES</th>
                        <th style="text-align:center; font-size: 12px;" colspan="2">CONVENIO DE ENTENDIMIENTO</th>
                        <th style="text-align:center; font-size: 12px;" rowspan="2">AUTORIDAD SOLICITANTE</th>
                        <th style="text-align:center; font-size: 12px;" rowspan="2">DELITO</th>
                      </tr>
                      <tr>
                        <th style="text-align:center; font-size: 12px;">FECHA DE FIRMA</th>
                        <th style="text-align:center; font-size: 12px;">FECHA DE VIGENCIA</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $contador = 0;
                      $sql = "SELECT * FROM datospersonales WHERE (estatus = 'SUJETO PROTEGIDO' || estatus = 'PERSONA PROPUESTA') AND relacional = 'NO'";
                      $resultado = $mysqli->query($sql);
                      while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {

                        $id_sujeto = $row['id'];
                        $identificador_sujeto = $row['identificador'];
                        // echo 'id sujuto->'.$id_sujeto.'*****';

                        $checkdentro = "SELECT DISTINCT id_persona FROM medidas
                        WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$id_sujeto' AND estatus = 'EN EJECUCION'";
                        $rcheckdentro = $mysqli->query($checkdentro);
                        $fcheckdentro = $rcheckdentro->fetch_assoc();
                        if(isset($fcheckdentro['id_persona'])){
                          // echo $contador.".-esta en reguardo *****";
                          $sujetodentrodelresguardo = $fcheckdentro['id_persona'];
                          if ($row['estatus'] === 'SUJETO PROTEGIDO') {
                            $convenioent = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$sujetodentrodelresguardo'";
                            $fconvenioent = $mysqli->query($convenioent);
                            $rconvenioent = $fconvenioent->fetch_assoc();

                            $fechafirma = date("d-m-Y", strtotime($rconvenioent['date_convenio']));

                            $contadorevaluacion = "SELECT COUNT(*) AS total FROM evaluacion_persona WHERE id_unico = '$identificador_sujeto'";
                            $rcontadorevaluacion = $mysqli->query($contadorevaluacion);
                            $fcontadorevaluacion = $rcontadorevaluacion->fetch_assoc();
                            if ($fcontadorevaluacion['total'] > 0) {
                              // echo $contador.".-si tiene";
                              // echo "<br>";
                              $evalsujultimo = "SELECT * FROM evaluacion_persona WHERE id_unico = '$identificador_sujeto' ORDER BY id DESC LIMIT 1";
                              $revalsujultimo = $mysqli->query($evalsujultimo);
                              $fevalsujultimo = $revalsujultimo->fetch_assoc();
                              // if(isset($fevalsujultimo['fecha_vigencia'])){
                                $fechavigencia = date("d-m-Y", strtotime($fevalsujultimo['fecha_vigencia']));
                              // }else {
                                // $fechavigencia = 'n/a';
                              // }
                            }else {
                              // echo $contador.".-n/a";
                              // echo "<br>";
                              $fechavigencia = date("d-m-Y", strtotime($rconvenioent['fecha_vigencia']));
                            }
                          }elseif ($row['estatus'] === 'PERSONA PROPUESTA') {
                            $fechafirma = "EN ANALISIS";
                            $fechavigencia = "EN ANALISIS";
                          }

                          $autoridadsujeto = "SELECT * FROM autoridad WHERE id_persona = '$id_sujeto'";
                          $rautoridadsujeto = $mysqli->query($autoridadsujeto);
                          $fautoridadsujeto = $rautoridadsujeto->fetch_assoc();

                          $delitosujeto = "SELECT * FROM procesopenal WHERE id_persona = '$id_sujeto'";
                          $rdelitosujeto = $mysqli->query($delitosujeto);
                          $fdelitosujeto = $rdelitosujeto->fetch_assoc();
                          if ($fdelitosujeto['delitoprincipal'] === 'OTRO') {
                            $delitoperson = $fdelitosujeto['otrodelitoprincipal'];
                          }else {
                            $delitoperson = $fdelitosujeto['delitoprincipal'];
                          }
                          $contador = $contador + 1;
                              echo "<tr style='border-color: blue;'>";
                              echo "<td style='text-align:center; border: #63696D 1px solid;  font-size: 14px;'>"; echo $contador; echo "</td>";
                              echo "<td style='text-align:center; border: #63696D 1px solid; font-size: 14px;'>"; echo $row['identificador']; echo "</td>";
                              echo "<td style='text-align:center; border: #63696D 1px solid; font-size: 14px;'>"; echo $fechafirma; echo "</td>";
                              echo "<td style='text-align:center; border: #63696D 1px solid; font-size: 14px;'>"; echo $fechavigencia; echo "</td>";
                              echo "<td style='text-align:center; border: #63696D 1px solid; font-size: 12px;'>"; echo $fautoridadsujeto['nombreautoridad']; echo "</td>";
                              echo "<td style='text-align:center; border: #63696D 1px solid; font-size: 14px;'>"; echo $delitoperson; echo "</td>";
                              echo "</tr>";
                          //
                        }else {
                          // echo $contador.".-no tiene alojamiento *****";
                          // echo $sujetofueradelresguardo = $id_sujeto;
                        }
                        // echo "<br>";
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="table-responsive">
                  <table id="fueraresguardo" class="display" style="width:100%; border-collapse: separate; border: #63696D 5px solid;">
                    <thead>
                      <h3 style="text-align:center">SUJETOS FUERA DEL CENTRO DE RESGUARDO</h3>
                      <tr>
                        <th style="text-align:center; font-size: 12px;" rowspan="2">NO</th>
                        <th style="text-align:center; font-size: 12px;" rowspan="2">INICIALES</th>
                        <th style="text-align:center; font-size: 12px;" colspan="2">CONVENIO DE ENTENDIMIENTO</th>
                        <th style="text-align:center; font-size: 12px;" rowspan="2">AUTORIDAD SOLICITANTE</th>
                        <th style="text-align:center; font-size: 12px;" rowspan="2">DELITO</th>
                      </tr>
                      <tr>
                        <th style="text-align:center; font-size: 12px;">FECHA DE FIRMA</th>
                        <th style="text-align:center; font-size: 12px;">FECHA DE VIGENCIA</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $contador = 0;
                      $sql = "SELECT * FROM datospersonales WHERE estatus = 'SUJETO PROTEGIDO' || estatus = 'PERSONA PROPUESTA' AND relacional = 'NO'";
                      $resultado = $mysqli->query($sql);
                      while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {

                        $id_sujeto = $row['id'];
                        $identificador_sujeto = $row['identificador'];
                        // echo 'id sujuto->'.$id_sujeto.'*****';

                        $checkdentro = "SELECT DISTINCT id_persona FROM medidas
                        WHERE medida = 'VIII. ALOJAMIENTO TEMPORAL' AND id_persona = '$id_sujeto' AND estatus = 'EN EJECUCION'";
                        $rcheckdentro = $mysqli->query($checkdentro);
                        $fcheckdentro = $rcheckdentro->fetch_assoc();
                        if(isset($fcheckdentro['id_persona'])){
                          // echo $contador.".-esta en reguardo *****";
                          // echo $sujetodentrodelresguardo = $fcheckdentro['id_persona'];
                        }else {
                          // echo $contador.".-no tiene alojamiento *****";
                          $sujetofueradelresguardo = $id_sujeto;
                          if ($row['estatus'] === 'SUJETO PROTEGIDO') {
                            $convenioent = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$sujetofueradelresguardo'";
                            $fconvenioent = $mysqli->query($convenioent);
                            $rconvenioent = $fconvenioent->fetch_assoc();
                            $fechafirma = date("d-m-Y", strtotime($rconvenioent['date_convenio']));
                            $contadorevaluacion = "SELECT COUNT(*) AS total FROM evaluacion_persona WHERE id_unico = '$identificador_sujeto'";
                            $rcontadorevaluacion = $mysqli->query($contadorevaluacion);
                            $fcontadorevaluacion = $rcontadorevaluacion->fetch_assoc();
                            if ($fcontadorevaluacion['total'] > 0) {
                              // echo $contador.".-si tiene";
                              // echo "<br>";
                              $evalsujultimo = "SELECT * FROM evaluacion_persona WHERE id_unico = '$identificador_sujeto' ORDER BY id DESC LIMIT 1";
                              $revalsujultimo = $mysqli->query($evalsujultimo);
                              $fevalsujultimo = $revalsujultimo->fetch_assoc();
                              // if(isset($fevalsujultimo['fecha_vigencia'])){
                                $fechavigencia = date("d-m-Y", strtotime($fevalsujultimo['fecha_vigencia']));
                              // }else {
                                // $fechavigencia = 'n/a';
                              // }
                            }else {
                              // echo $contador.".-n/a";
                              // echo "<br>";
                              $fechavigencia = date("d-m-Y", strtotime($rconvenioent['fecha_vigencia']));
                            }
                          }elseif ($row['estatus'] === 'PERSONA PROPUESTA') {
                            $fechafirma = "EN ANALISIS";
                            $fechavigencia = "EN ANALISIS";
                          }

                          $autoridadsujeto = "SELECT * FROM autoridad WHERE id_persona = '$id_sujeto'";
                          $rautoridadsujeto = $mysqli->query($autoridadsujeto);
                          $fautoridadsujeto = $rautoridadsujeto->fetch_assoc();

                          $delitosujeto = "SELECT * FROM procesopenal WHERE id_persona = '$id_sujeto'";
                          $rdelitosujeto = $mysqli->query($delitosujeto);
                          $fdelitosujeto = $rdelitosujeto->fetch_assoc();
                          if ($fdelitosujeto['delitoprincipal'] === 'OTRO') {
                            $delitoperson = $fdelitosujeto['otrodelitoprincipal'];
                          }else {
                            $delitoperson = $fdelitosujeto['delitoprincipal'];
                          }
                          $contador = $contador + 1;
                              echo "<tr style='border-color: blue;'>";
                              echo "<td style='text-align:center; border: #63696D 1px solid; font-size: 14px;'>"; echo $contador; echo "</td>";
                              echo "<td style='text-align:center; border: #63696D 1px solid; font-size: 14px;'>"; echo $row['identificador']; echo "</td>";
                              echo "<td style='text-align:center; border: #63696D 1px solid; font-size: 14px;'>"; echo $fechafirma; echo "</td>";
                              echo "<td style='text-align:center; border: #63696D 1px solid; font-size: 14px;'>"; echo $fechavigencia; echo "</td>";
                              echo "<td style='text-align:center; border: #63696D 1px solid; font-size: 14px;'>"; echo $fautoridadsujeto['nombreautoridad']; echo "</td>";
                              echo "<td style='text-align:center; border: #63696D 1px solid; font-size: 14px;'>"; echo $delitoperson; echo "</td>";
                              echo "</tr>";
                        }
                        // echo "<br>";
                          }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
        <!--  -->



      </div>
    </div>
  </div>
  <div class="contenedor">
    <a href="../administrador/admin.php" class="btn-flotante">REGRESAR</a>
  </div>
</body>
</html>
