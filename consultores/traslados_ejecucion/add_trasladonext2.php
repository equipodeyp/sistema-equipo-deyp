<?php
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set("America/Mexico_City");
/*require 'conexion.php';*/
include("../conexion.php");
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
$check_traslado2 = 1;
$_SESSION["check_traslado2"] = $check_traslado2;
$id_traslado = $_GET["id_traslado"];
// traer los datos del traslado guardado anteriormente
$traertraslado = "SELECT * FROM react_traslados WHERE id = '$id_traslado'";
$rtraertraslado = $mysqli ->query ($traertraslado);
$ftraertraslado = $rtraertraslado -> fetch_assoc();

$traerobservacion = "SELECT * FROM react_observaciones_traslado WHERE id_traslado = '$id_traslado'";
$rtraerobservacion = $mysqli ->query ($traerobservacion);
$ftraerobservacion = $rtraerobservacion -> fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>REGISTRO TRASLADO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <script src="../../js/funciones_react.js"></script>
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../css/cli.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../../css/main2.css">
  <link rel="stylesheet" href="../../css/expediente.css">
  <!-- font-awesome -->
  <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css" rel="stylesheet">
  <!-- estilos de diseño add traslados -->
  <link rel="stylesheet" href="../../css/react_add_traslados.css">
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
          echo "<img style='text-align:center;' src='../../image/mujerup.png' width='100' height='100'>";
        }

        if ($genero=='hombre') {
          // $foto = ../image/user.png;
          echo "<img src='../../image/hombreup.jpg' width='100' height='100'>";
        }
        // echo $genero;
         ?>
        <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
      </div>

      <nav class="menu-nav">
        <ul>
            <li>
                <a href="#" onclick="toggleSubmenu(this)">
                    <i class="color-icon fa-solid fa-book menu-nav--icon"></i>
                    <span class="menu-items" style="color: white; font-weight:bold;">TRASLADOS</span>
                    <i class="fas fa-chevron-down" style="color: white; float:center; margin-top:1px;"></i>
                </a>
                <ul class="submenu" style="display:none; list-style:none; padding-left:15px;">
                  <!-- <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='./add_traslado.php'">
                    <i class="fas fa-file-medical"></i> REGISTRAR</a>
                  </li> -->
                  <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='./consulta_traslados.php'">
                    <i class="fas fa-laptop-file"></i> BUSCAR</a>
                  </li>
                  <li><a href="#" style="color:white; text-decoration:none;" onclick="location.href='./search_traslado.php'">
                    <i class="fas fa-search"></i> CONSULTAR CIFRAS</a>
                  </li>
                </ul>
            </li>
        </ul>
      </nav>
    </div>
    <div class="main bg-light">
      <div class="barra">
          <img src="../../image/fiscalia.png" alt="" width="150" height="150">
          <img src="../../image/ups2.png" alt="" width="1400" height="70">
          <img style="display: block; margin: 0 auto;" src="../../image/ups3.png" alt="" width="1400" height="70">
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
        <h1 style="text-align:center">REGISTRAR TRASLADO</h1>
        <center>
          <div style="text-align:center;padding:15px;border:solid 5px; width:70%;border-radius:35px;shadow" class="well form-horizontal">
            <h1>DESTINOS</h1>
            <!-- <span>______________________________________________________________________________________________</span> -->
            <div class="row">
              <div class="col-md-12 mb-3">
                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <?php
                  $seltrfin2 = "SELECT COUNT(*) AS total FROM react_destinos_traslados WHERE id_traslado = '$id_traslado' ORDER BY id DESC limit 1";
                  $rseltrfin2 = $mysqli->query($seltrfin2);
                  $fseltrfin2 = $rseltrfin2 ->fetch_assoc();
                  $iddestinoobtenido2 = $fseltrfin2['total'];


                  $seltrfin = "SELECT * FROM react_destinos_traslados WHERE id_traslado = '$id_traslado' ORDER BY id DESC limit 1";
                  $rseltrfin = $mysqli->query($seltrfin);
                  $fseltrfin = $rseltrfin ->fetch_assoc();
                  $iddestinoobtenido = $fseltrfin['id'];
                  // echo "<br>";
                  $contarsujdestinoobt = "SELECT COUNT(*) AS total FROM react_sujetos_traslado WHERE id_traslado = '$id_traslado' AND id_destino = '$iddestinoobtenido'";
                  $rcontarsujdestinoobt = $mysqli->query($contarsujdestinoobt);
                  $fcontarsujdestinoobt = $rcontarsujdestinoobt ->fetch_assoc();
                  $conteosujdestino = $fcontarsujdestinoobt['total'];
                  //contador destinos
                  $countdestinostraslado = "SELECT COUNT(*) AS total FROM react_destinos_traslados WHERE id_traslado = '$id_traslado'";
                  $rcountdestinostraslado = $mysqli ->query ($countdestinostraslado);
                  $fcountdestinostraslado = $rcountdestinostraslado -> fetch_assoc();
                  $contadordest = $fcountdestinostraslado['total'];
                  // contador sujetos
                  $contarsujtrsinc = "SELECT COUNT(*) AS total FROM react_sujetos_traslado WHERE id_traslado = '$id_traslado'";
                  $rcontarsujtrsinc = $mysqli->query($contarsujtrsinc);
                  $fcontarsujtrsinc = $rcontarsujtrsinc ->fetch_assoc();
                  $conteosujtrsinc = $fcontarsujtrsinc['total'];

                  ?>
                  <input type="text" name="" id="totalsujtultdest" value="<?php echo $iddestinoobtenido2 ?>" style="display:none;">
                  <input type="text" name="" id="totalsujdests" value="<?php echo $conteosujdestino ?>" style="display:none;">
                  <input type="text" name="" id="totaldesttrs" value="<?php echo $contadordest ?>" style="display:none;">
                  <input type="text" name="" id="totalsujtrsinc" value="<?php echo $conteosujtrsinc ?>" style="display:none;">
                  <h3 style="text-align:center">
                    <div class="" id="btnadddes">
                    <?php
                    if ($contadordest < 3) {
                      // echo "aun puedes registrar destinos";
                      echo "<a href='#add_sujetotraslado".$id_traslado."' data-toggle='modal' class='float-right'><button style='' type='button' id='AGREGAR_CONVENIO' class='btn color-btn-success text-right'>AGREGAR</button></a>";
                    }
                    ?></h3>
                  </div>
                  <thead>
                    <tr>
                      <th style="text-align:center">NO.</th>
                      <th style="text-align:center">MOTIVO</th>
                      <th style="text-align:center">LUGAR</th>
                      <th style="text-align:center">DOMICILIO</th>
                      <th style="text-align:center">MUNICIPIO</th>
                      <th style="text-align:center" id="col_delete_persone">ELIMINAR DESTINO</th>
                      <th style="text-align:center" id="col_add_persone">AGREGAR SP O PP</th>
                      <th style="text-align:center">PP O SP</th>
                      <th style="text-align:center" >ASISTENCIA MEDICA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $cont = 0;
                    $ifrow = true;
                    // echo $contadordest;
                    if ($contadordest === '0' ) {
                      // echo "aun no hay destinos";
                    }else {
                      $getdesoftras = "SELECT * FROM react_destinos_traslados WHERE id_traslado = $id_traslado";
                      $rgetdesoftras = $mysqli -> query ($getdesoftras);
                      while ($fgetdesoftras = $rgetdesoftras -> fetch_assoc()) {
                        $cont = $cont + 1;
                        $iddestrs = $fgetdesoftras['id'];
                        $getsujtrasdestinocont = "SELECT COUNT(*) AS total FROM react_sujetos_traslado WHERE id_traslado = '$id_traslado' AND id_destino = '$iddestrs'";
                        $rgetsujtrasdestinocont = $mysqli->query($getsujtrasdestinocont);
                        $fgetsujtrasdestinocont = $rgetsujtrasdestinocont ->fetch_assoc();
                        $numrows = $fgetsujtrasdestinocont['total'];
                        if ($ifrow) {
                          echo "<tr>";
                          echo "<td style='text-align:center' rowspan='$numrows'>"; echo $cont; echo "</td>";
                          echo "<td style='text-align:center' rowspan='$numrows'>"; echo $fgetdesoftras['motivo']; echo "</td>";
                          echo "<td style='text-align:center' rowspan='$numrows'>"; echo $fgetdesoftras['lugar']; echo "</td>";
                          echo "<td style='text-align:center' rowspan='$numrows'>"; echo $fgetdesoftras['domicilio']; echo "</td>";
                          echo "<td style='text-align:center' rowspan='$numrows'>"; echo $fgetdesoftras['municipio']; echo "</td>";
                          echo "<td style='text-align:center' rowspan='$numrows' id='col_delete_perstwo'>";
                          // echo $numrows;
                          if ($numrows === '0') {
                            echo "<a href='#eliminar_".$fgetdesoftras['id']."'  data-toggle='modal'><i class='fa-solid fa-trash-can color-icon'></i></a>";
                            // code...
                          }
                          echo "</td>";
                          echo "<td style='text-align:center' rowspan='$numrows' id='col_add_perstwo'>";
                          $contarsujetos = "SELECT COUNT(*) AS t FROM react_sujetos_traslado WHERE id_traslado = '$id_traslado'";
                          $rcontarsujetos = $mysqli->query($contarsujetos);
                          $fcontarsujetos = $rcontarsujetos ->fetch_assoc();
                          // echo $fcontarsujetos['t'];
                          if ($fcontarsujetos['t'] < 3) {
                            echo "<a href='#addsujtraslado_".$fgetdesoftras['id']."'  data-toggle='modal'><i class='fa-solid fa-user-plus color-icon'></i></a>";
                            // code...
                          }
                          echo "</td>";
                          // break;

                          // $ifrow = false;
                        }else {
                          // echo "</tr>";
                          echo "<tr>";
                        }

                        $getsujtrasdestino = "SELECT * FROM react_sujetos_traslado WHERE id_traslado = '$id_traslado' AND id_destino = '$iddestrs'";
                        $rgetsujtrasdestino = $mysqli->query($getsujtrasdestino);
                        while ($fgetsujtrasdestino = $rgetsujtrasdestino ->fetch_assoc()) {
                           $idsujtrsinfo = $fgetsujtrasdestino['id_sujeto'];
                           $idsujforasismed = $fgetsujtrasdestino['id'];
                          $getinfosuj ="SELECT * FROM datospersonales WHERE id = '$idsujtrsinfo'";
                          $rgetinfosuj = $mysqli->query($getinfosuj);
                          while ($fgetinfosuj = $rgetinfosuj->fetch_assoc()) {
                            // echo $fgetinfosuj['identificador'];
                             $id_traslado;
                            // echo "<br>";
                             $folexpsujunico = $fgetinfosuj['folioexpediente'];
                            // echo "<br>";
                             $identificadorsujunico = $fgetinfosuj['identificador'];
                            // echo "<br>";
                            echo "<td style='text-align:center' rowspan=''>"; echo $fgetinfosuj['identificador']; echo "</td>";
                            echo "<td style='text-align:center' rowspan=''>"; if ($fgetdesoftras['motivo'] !== 'ASISTENCIA MEDICA') {
                              echo "N/A";
                            }else {
                              $getinfotrs = "SELECT * FROM react_traslados WHERE id = '$id_traslado'";
                              $rgetinfotrs = $mysqli ->query($getinfotrs);
                              $fgetinfotrs = $rgetinfotrs ->fetch_assoc();
                               $idtrsunico =$fgetinfotrs['id'];
                              // echo "<br>";
                               $fechatrsunico =$fgetinfotrs['fecha'];
                              // echo "<br>";
                              $getinfoasimed = "SELECT * FROM cita_asistencia
                                                         INNER JOIN solicitud_asistencia ON cita_asistencia.id_asistencia = solicitud_asistencia.id_asistencia
                                                         WHERE cita_asistencia.fecha_asistencia = '$fechatrsunico' AND solicitud_asistencia.folio_expediente='$folexpsujunico'
                                                         AND solicitud_asistencia.id_sujeto = '$identificadorsujunico' AND solicitud_asistencia.etapa != 'CANCELADA'
                                                         AND (solicitud_asistencia.tipo_requerimiento = 'SEGUIMIENTO' OR solicitud_asistencia.tipo_requerimiento = 'POR INGRESO' OR solicitud_asistencia.tipo_requerimiento = 'PRIMERA VEZ')";
                              $rgetinfoasimed = $mysqli->query($getinfoasimed);
                              while ($fgetinfoasimed = $rgetinfoasimed ->fetch_assoc()) {
                                // echo "prueba asistenciamedica";
                                $idasismedunic = $fgetinfoasimed['id_asistencia'];

                                $getinfoasismed = "SELECT * FROM solicitud_asistencia WHERE id_asistencia = '$idasismedunic'";
                                $rgetinfoasismed = $mysqli ->query ($getinfoasismed);
                                $fgetinfoasismed = $rgetinfoasismed ->fetch_assoc();


                                // code...
                              }
                              // contar si existe info de la asistencia medica info react sujetos traslado
                              $contisasis = "SELECT * FROM react_sujetos_traslado WHERE id = '$idsujforasismed'";
                              $rcontisasis = $mysqli ->query($contisasis);
                              $fcontisasis = $rcontisasis->fetch_assoc();
                              // echo "total de asistencia medica---";
                              if ($fcontisasis['id_asistenciamedica'] === '') {
                                // echo "aun no se registra la asistencia medica";
                                echo "<a href='#addasistenciamedsuj_".$idsujforasismed."'  data-toggle='modal'><i class='fa-solid fa-notes-medical color-icon'></i></a>";
                                // echo "<br>";
                              }else {
                                echo $fcontisasis['id_asistenciamedica'].'/<br>'.$fgetinfoasismed['servicio_medico'];
                                // echo "<br>";
                                // code...
                              }


                            } echo "</td>";
                            echo "</tr>";
                            include('eliminar_destino.php');
                            include('add_sujoftr.php');
                            include('add_asismedsuj.php');
                          }
                        }
                        include('eliminar_destino.php');
                        include('add_sujoftr.php');
                        include('add_asismedsuj.php');
                      }
                    }



                    //   $cont = $cont + 1;

                    // }
                    // ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Text area -->
            <div class="" id="registerpdis" style="display:none;">
              <div class="row">
                <!-- <h1>registro de pdis</h1> -->
              </div>
              <div class="row">
                <div class="col-md-12 mb-3">
                  <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <h3 style="text-align:center">
                      PDIS DEL TRASLADO
                    </h3>
                    <?php
                    // echo $id_traslado;
                    echo "<a href='#add_pditrs_".$id_traslado."' data-toggle='modal' class='float-right'><button style='' type='button' id='registerpdinew' class='btn color-btn-success text-right'>AGREGAR PDI</button></a>";
                    include('add_pditrsfin.php');
                    ?>
                    </div>
                    <thead>
                      <tr>
                        <th style="text-align:center">NO.</th>
                        <th style="text-align:center">NOMBRE PDI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $contpdittrsdssuj = 0;
                      $getpdis = "SELECT * FROM react_pdi_traslado WHERE id_traslado = '$id_traslado'";
                      $rgetpdis = $mysqli ->query($getpdis);
                      while ($fgetpdis = $rgetpdis->fetch_assoc()) {
                        $contpdittrsdssuj = $contpdittrsdssuj + 1;
                        echo "<tr>";
                        echo "<td style='text-align:center'>"; echo $contpdittrsdssuj; echo "</td>";
                        echo "<td style='text-align:center'>"; echo $fgetpdis['nombrepdi']; echo "</td>";
                        echo "</tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <br><br>
              <?php
              $sumagetpdis = "SELECT COUNT(*) AS suma FROM react_pdi_traslado WHERE id_traslado = '$id_traslado'";
              $rsumagetpdis = $mysqli ->query($sumagetpdis);
              $fsumagetpdis = $rsumagetpdis->fetch_assoc();
              // echo "total de pdis---";
              // echo $fsumagetpdis['suma'];
              // echo "<br>";
              ?>
              <input type="text" id="totalsumapdistrs" name="contsumpdis" value="<?php echo $fsumagetpdis['suma']; ?>" style="display:none;">
              <div class="form-group" id="fintrsdessuj" style="display:none;">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-6">
                  <?php
                  echo "<a href='#edit_".$id_traslado."' class='btn btn-success' data-toggle='modal'><i class='fa-solid fa-file-export'></i>FINALIZAR</a>";
                  include('finalizar_tr_ds_suj_pdi.php');
                  ?>
                </div>
              </div>
            </div>
          </div>
        </center>
      </div>
    </div>
  </div>
  <div class="contenedor">
      <a href="../../consultores/admin.php" class="btn-flotante">REGRESAR</a>
  </div>
<?php
include('add_trasladodestino.php');
?>
<script type="text/javascript">
  function obtenerdestinput() {
    console.log('prueba');
    valorpri = document.getElementById("totalsujdests").value;
    valor = document.getElementById("totalsujtultdest").value;
    // if (valorpri === '0' && valor === '0') {
    //   document.getElementById("AGREGAR_CONVENIO").disabled = false;
    // }else if (valorpri === '0' && valor > '0') {
    //   document.getElementById("AGREGAR_CONVENIO").disabled = true;
    // }else {
    //   document.getElementById("AGREGAR_CONVENIO").disabled = false;
    // }
  }
  obtenerdestinput();
  function inhabilitarbtnadddes (){
    valorsujtrsinc = document.getElementById("totalsujtrsinc").value;
    console.log(valorsujtrsinc);
    if (valorsujtrsinc === '3') {
      document.getElementById("btnadddes").style.display = "none";
    }
  }
  inhabilitarbtnadddes();
  function habilitarbtnnext (){
    totaldes = document.getElementById("totaldesttrs").value;
    totalsuj = document.getElementById("totalsujtrsinc").value;
    console.log("DESTINOS");
    console.log(totaldes);
    console.log("sujetos");
    console.log(totalsuj);
    if (totaldes > 0 && totalsuj > 0) {
      console.log("puede registrar pdis");
      document.getElementById("registerpdis").style.display = "";
    }
  }
  habilitarbtnnext();
  //
  function habilitarfinalizartrs (){
    sumatotaltrspdissuj = document.getElementById("totalsumapdistrs").value;
    // totalsuj = document.getElementById("totalsujtrsinc").value;
    console.log("total de pdis");
    console.log(sumatotaltrspdissuj);
    if (sumatotaltrspdissuj > 0) {
      console.log("habilitar boton finalizar");
      document.getElementById("fintrsdessuj").style.display = "";
    }
  }
  habilitarfinalizartrs();
</script>
</body>
</html>
