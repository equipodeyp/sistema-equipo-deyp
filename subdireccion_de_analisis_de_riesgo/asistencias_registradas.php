<?php
error_reporting(0);
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica = 1;
$_SESSION["verifica"] = $verifica;
$name = $_SESSION['usuario'];

$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$user = $row['usuario'];

$m_user = $user;
$m_user = strtoupper($m_user);

// echo $m_user; 
// echo $user;

$sentencia2=" SELECT nombre, amaterno, apaterno FROM usuarios_servidorespublicos WHERE usuario ='$user'";
$rnombre = $mysqli->query($sentencia2);
$fnombre=$rnombre->fetch_assoc();
$name_serv = $fnombre['nombre'];
$ap_serv = $fnombre['apaterno'];
$am_serv = $fnombre['amaterno'];



$name_user = $name_serv;
$name_user = strtoupper($name_user);
$names = $name_user;
$one_name = explode(" ", $names); 
$primer_nombre = $one_name[0];

// echo $primer_nombre;

$a_paterno = $ap_serv;
$a_paterno = strtoupper($a_paterno);
$ap_string = $a_paterno;
$inicial_ap = $ap_string[0];
// echo $inicial_ap;

$a_materno = $am_serv;
$a_materno = strtoupper($a_materno);
$am_string = $a_materno;
$inicial_am = $am_string[0];
// echo $inicial_am;



$id_servidor_ini = $primer_nombre.$inicial_ap.$inicial_am;
// echo $id_servidor_ini;



?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>REGISTRAR ASISTENCIA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/instrumento_adaptabilidad.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/expediente.css">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/expediente.js"></script>
  <script src="../js/solicitud.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="../css/registrosolicitud1.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="../css/main2.css">
</head>
<body >


<div class="contenedor">
    <div class="sidebar ancho">
      <div class="logo text-warning">
      </div>
      <div class="user">
        <?php
  			$sentencia_user=" SELECT usuario, nombre, area, apellido_p, apellido_m, sexo FROM usuarios WHERE usuario='$name'";
  			$result_user = $mysqli->query($sentencia_user);
  			$row_user=$result_user->fetch_assoc();
  			$genero = $row_user['sexo'];

  			if ($genero=='mujer') {
  				echo "<img src='../image/mujerup.png' width='100' height='100'>";
  			}

  			if ($genero=='hombre') {
  				// $foto = ../image/user.png;
  				echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
  			}
  			// echo $genero;
  			?>
        <h6 style="text-align:center" class='user-nombre' >  <?php echo "" . $_SESSION['usuario']; ?> </h6>
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


      <!-- menu del expediente -->
      <div class="wrap">



        <div class="secciones">
          <article id="tab1">

            <!-- menu de navegacion de la parte de arriba -->

            <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="./menu_asistencias_medicas.php">MENÚ ASISTENCIAS MÉDICAS</a>
              <a class="actived" href="./asistencias_registradas.php">ASISTENCIAS PSICOLÓGICAS REGISTRADAS</a>
            </div>
          

            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                    <li><a href="#" onclick="location.href='registrar_asistencia.php'"><span class="far fa-regular fa-bell"></span><span class="tab-text">REGISTRAR ASISTENCIA PSICOLÓGICAS</span></a></li>
                    <li><a href="#" class="active" onclick="location.href='./asistencias_registradas.php'"><span class="fas fa-regular fa-clipboard"></span><span class="tab-text">ASISTENCIAS PSICOLÓGICAS REGISTRADAS</span></a></li>
                    <!-- <li><a href="#" onclick="location.href='seguimiento_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">SEGUIMIENTO PERSONA</span></a></li> -->
              </ul>


              <form class="container well form-horizontal" enctype="multipart/form-data">
              <?php
              $cl = "SELECT COUNT(*) as t 
              FROM solicitud_asistencia 
              WHERE etapa = 'ASISTENCIA MÉDICA COMPLETADA' 
              AND servicio_medico = 'PSICOLÓGICO' 
              AND tipo_requerimiento = 'PERIÓDICA DE SEGUIMIENTO' OR tipo_requerimiento = 'PROVISIONAL DE SEGUIMIENTO'
              ";
              $rcl = $mysqli->query($cl);
              $fcl = $rcl->fetch_assoc();
              // echo $fcl['t'];
              if ($fcl['t'] == 0){
                    echo "<div id='cabecera'>
                      <div class='row alert div-title' role='alert'>
                        <h3 style='text-align:center'>¡ NO HAY ASISTENCIAS PSICOLÓGICAS REGISTRADAS !</h3>
                      </div>
                    </div>";
              } else{
                    echo "
                      <div class='row'>
                        <div id='cabecera'>
                          <div class='row alert div-title'>
                            <h3 style='text-align:center'>ASISTENCIAS PSICOLÓGICAS REGISTRADAS</h3>
                          </div>
                        </div>
                      <div>

                      <table class='table table-bordered' id='table-instrumento'>
                        <thead>
                            <tr>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>NO.</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>ID ASISTENCIA</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>FECHA REGISTRO</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>NÚMERO DE OFICIO</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>SERVICIO</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>TIPO DE REQUERIMIENTO</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>ETAPA</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>DETALLES</th>
                            </tr>
                        </thead>
                    
                    ";
                  }

            ?>


<tbody>
                                                <?php

                                                    $count = 0;

                                                    $query = "SELECT *
                                                    
                                                    FROM solicitud_asistencia

                                                    JOIN agendar_asistencia
                                                    ON solicitud_asistencia.id_asistencia = agendar_asistencia.id_asistencia
                                                    AND (solicitud_asistencia.tipo_requerimiento = 'PERIÓDICA DE SEGUIMIENTO'
                                                    OR solicitud_asistencia.tipo_requerimiento = 'PROVISIONAL DE SEGUIMIENTO')

                                                    JOIN cita_asistencia 
                                                    ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia

                                                    JOIN seguimiento_asistencia
                                                    ON solicitud_asistencia.id_asistencia = seguimiento_asistencia.id_asistencia

                                                    ORDER BY solicitud_asistencia.fecha_solicitud DESC
                                                    LIMIT 10";
                                                    $result_solicitud = mysqli_query($mysqli, $query);

                                                    while($row = mysqli_fetch_array($result_solicitud)) {
                                                    
                                                        
                                                ?>
                                                    <?php 
                                                    $count = $count + 1;
                                                    $fecha_registro = $row['fecha_solicitud'];
                                                    $fecha_r = date("d/m/Y", strtotime($fecha_registro ));
                                                    ?>
                                                        <tr>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $count?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['id_asistencia']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $fecha_r?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['num_oficio']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['servicio_medico']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['tipo_requerimiento']?></td>
                                                            


                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">
                                                                <button style="display: block; margin: 0 auto;" disabled class="btn btn-primary">COMPLETADA</button>
                                                            </td>
                                                            
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">
                                                              <a style="text-align:center; text-decoration: underline; color: #4aa451ff; text-decoration: underline;" href="" data-toggle="modal" data-target="#myModal<?php echo $row['id_asistencia'];?>"><span class="fas fa-regular fa-id-card"></a>
                                                            </td>





                                                        <!-- INICIO Modal -->
                                                        <div class="modal" id="myModal<?php echo $row['id_asistencia'];?>" role="dialog">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                  
                                                                  <div id="body">

                                                                    <div class="modal-header">
                                                                      <div class="">
                                                                          <img style="float: left;" src="../image/FGJEM.png" width="50" height="50">
                                                                          <img style="float: right;" src="../image/ESCUDO.png" width="60" height="50">
                                                                          <h4 style="text-align:center; color: #030303;"><br>Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento Penal o de Extinción de Dominio</h4>
                                                                      </div>
                                                                      
                                                                    </div>
                                                                    <!-- INICIO MODAL BODY -->
                                                                    <div class="modal-body">
                                                                      <!-- <p style="text-align:center; font-size: 18px; color:#5F6D6B;">DETALLE DE LA ASISTECIA PSICOLÓGICA: <?php echo $row['id_asistencia'];?></p> -->
                                                    
                                                                      <br>

                                                                      <form>
                                                                        <div style="display: flex; justify-content: center; align-items: center; border-radius: 10px; background: #5F6D6B; height: 40px; width: 100%; box-shadow: 5px 5px 10px 2px rgba(0, 0, 0, 0.3);">
                                                                            <h3 style="text-align:center; color: #ede7e7ff; font-size: 18px;">DETALLE DE LA ASISTECIA PSICOLÓGICA</h3>
                                                                        </div>
                                                                        <br>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>ID ASISTENCIA PSICOLÓGICA:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['id_asistencia'];?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>FOLIO DEL EXPEDIENTE DE PROTECCIÓN:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['folio_expediente'];?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>ID SUJETO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['id_sujeto'];?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>FECHA Y HORA REGISTRO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $fecha_r." ".$row['hora_solicitud']?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>TIPO DE SERVICIO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['servicio_medico'];?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>TIPO DE REQUERIMIENTO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['tipo_requerimiento'];?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>NÚMERO DE OFICIO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['num_oficio'];?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>SERVIDOR PÚBLICO:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['servidor_asistencia'];?>">
                                                                        </div>
                                                                        <?php
                                                                        $fecha_asist = $row['fecha_asistencia'];
                                                                        $fecha_a = date("d/m/Y", strtotime($fecha_asist));
                                                                        ?>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>FECHA Y HORA ASISTENCIA:</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $fecha_a." ".$row['hora_asistencia']?>">
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>ETAPA ASISTENCIA MÉDICA</label>
                                                                          <input style="font-size: 14px;" readonly class="form-control" type="text" value="<?php echo $row['etapa'];?>">
                                                                        </div>

                                                                        <?php if ($row['observaciones_seguimiento'] != "") { ?>
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>OBSERVACIONES:</label>
                                                                          <textarea style="font-size: 14px;" rows="5" cols="33" type="text" class="form-control" readonly placeholder="<?php echo $row['observaciones_seguimiento'];?>"></textarea>
                                                                        </div>
                                                                        <?php } ?>
                                                                        
                                                                        <div class="col-md-6 mb-3">
                                                                          <label>INFORME:</label>
                                                                          <textarea style="font-size: 14px;" rows="5" cols="33" type="text" class="form-control" readonly placeholder="<?php echo $row['informe_medico'];?>"></textarea>
                                                                        </div>

                                                                      </form>

                                                                    </div>
                                                                    <!-- FIN MODAL BODY -->


                                                                  </div>

                                                                  <div class="modal-footer">
                                                                        <a class="btn btn-danger btn-lg" data-dismiss="modal">
                                                                          Cerrar
                                                                        </a>
                                                                  </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- FIN Modal -->






                                                            
                                                        </tr>

                                                    <?php } ?>
                                            </tbody>
                                        </table> 





                                      </table>
                    </div>
                                  
                                    
                  </div>
              </form>
              </div>
        		</div>
    			</article>
    		</div>
    	</div>
  </div>
</div>


  <div class="contenedor">
    <a href="./menu_asistencias_medicas.php" class="btn-flotante color-btn-success-gray">REGRESAR</a>
  </div>
  <div class="contenedor">
    <!-- <a href="../logout.php" class="btn-flotante-dos">Cerrar Sesión</a> -->
  </div>




</body>
</html>


<!-- SELECT *
FROM solicitud_asistencia

JOIN agendar_asistencia
ON solicitud_asistencia.id_asistencia = agendar_asistencia.id_asistencia
AND (solicitud_asistencia.tipo_requerimiento = 'PERIÓDICA DE SEGUIMIENTO'
OR solicitud_asistencia.tipo_requerimiento = 'PROVISIONAL DE SEGUIMIENTO')

JOIN cita_asistencia 
ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia

JOIN seguimiento_asistencia
ON solicitud_asistencia.id_asistencia = seguimiento_asistencia.id_asistencia

ORDER BY solicitud_asistencia.fecha_solicitud DESC
LIMIT 10; -->