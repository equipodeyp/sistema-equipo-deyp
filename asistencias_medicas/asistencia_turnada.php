<?php
error_reporting(0);
include("conexion.php");
session_start ();
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();



?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
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
                <a href="./admin.php">MENÚ ASISTENCIAS MÉDICAS</a>
                <a class="actived" href="./asistencia_turnada.php">ASISTENCIAS MÉDICAS TURNADAS</a>
            </div>
          

            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a href="#" class="active" onclick="location.href='./asistencia_turnada.php'"><span class="fas fa-solid fa-stethoscope"></span><span class="tab-text">ASISTENCIAS MÉDICAS TURNADAS</span></a></li>
                <!-- <li><a href="#" onclick="location.href='seguimiento_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">SEGUIMIENTO PERSONA</span></a></li> -->
              </ul>


              <form class="container well form-horizontal" enctype="multipart/form-data">

              <?php
              $cl = "SELECT COUNT(*) as t FROM solicitud_asistencia 
              WHERE etapa = 'NOTIFICADA' OR etapa = 'REPROGRAMADA NOTIFICADA'";
              $rcl = $mysqli->query($cl);
              $fcl = $rcl->fetch_assoc();
              // echo $fcl['t'];
              if ($fcl['t'] == 0){
                    echo "<div id='cabecera'>
                      <div class='row alert div-title' role='alert'>
                        <h3 style='text-align:center'>¡ NO HAY ASISTENCIAS MÉDICAS REGISTRADAS !</h3>
                      </div>
                    </div>";
              } else{
                    echo "
                      <div class='row'>
                        <div id='cabecera'>
                          <div class='row alert div-title'>
                            <h3 style='text-align:center'>ASISTENCIAS MÉDICAS TURNADAS A LA SUBDIRECCIÓN DE EJECUCIÓN DE MEDIDAS</h3>
                          </div>
                        </div>
                      <div>

                      <table class='table table-bordered' id='table-instrumento'>
                        <thead>
                            <tr>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>NO.</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>ID ASISTENCIA</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>SERVICIO MÉDICO</th>


                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>FECHA AGENDADA</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>HORA AGENDADA</th>
                         

                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>DIAS RESTANTES</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>REGISTRAR SEGUIMIENTO</th>

                            </tr>
                        </thead>
                    
                    ";
                  }

            ?>


<tbody>
                                                <?php
                                                
                                                    $query = "SELECT solicitud_asistencia.id_asistencia, solicitud_asistencia.servicio_medico

                                                    FROM solicitud_asistencia
                                                    WHERE solicitud_asistencia.etapa = 'NOTIFICADA' 
                                                    OR solicitud_asistencia.etapa ='REPROGRAMADA NOTIFICADA'";

                                                    $result_solicitud = mysqli_query($mysqli, $query);
                                                    $c=0;

                                                    while($row = mysqli_fetch_array($result_solicitud)) {
                                                    $c=$c+1;

                                                      $id_asistencia = $row['id_asistencia'];

                                                    //   echo $id_asistencia;

                                                ?>

                                                        <tr>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $c;?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">

                                                                <a style="text-align:center; text-decoration: none; color: #000000; text-decoration: underline;" href="./detalle_asistencia_medica_turnadas.php?id_asistencia=<?php echo $row['id_asistencia']; ?>"><span style="text-align:center;"><?php echo $row['id_asistencia']; ?></span></a>
                                                                
                                                            </td>

                                                            

                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['servicio_medico']?></td>
                                                            <!-- <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['nombre_institucion']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['domicilio_institucion']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['municipio_institucion']?></td> -->


                                                              <?php 

                                                              $query_cita = "SELECT solicitud_asistencia.id_asistencia, solicitud_asistencia.servicio_medico, solicitud_asistencia.etapa, DATEDIFF (cita_asistencia.fecha_asistencia, NOW()) AS dias_restantes, cita_asistencia.id_asistencia, cita_asistencia.fecha_asistencia, cita_asistencia.hora_asistencia

                                                                FROM solicitud_asistencia

                                                                JOIN cita_asistencia 
                                                                ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia
                                                                AND solicitud_asistencia.id_asistencia = '$id_asistencia'
                                                                WHERE solicitud_asistencia.etapa = 'NOTIFICADA' 
                                                                OR solicitud_asistencia.etapa ='REPROGRAMADA NOTIFICADA'

                                                                ORDER BY cita_asistencia.id DESC
                                                                LIMIT 1";


                                                              $result_cita = mysqli_query($mysqli, $query_cita);

                                                              while($row2 = mysqli_fetch_array($result_cita)) {
                                                                
                                                                
                                                                if ($id_asistencia == $row2['id_asistencia']){

                                                              ?>
                                                                    
                                                                        <?php
                                                                        $originalDate = $row2['fecha_asistencia'];
                                                                        $date = date("d/m/Y", strtotime($originalDate));
                                                                        ?>

                                                                        <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $date;?></td>
                                                                        <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row2['hora_asistencia']?></td>


                                                                        <?php
                                                                          if ($row['servicio_medico'] === 'PSICOLÓGICO' && $row2['dias_restantes'] >= 0) { ?>
                                                                        <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row2['dias_restantes'];?></td>
                                                                        <?php } ?>

                                                                        <?php 
                                                                          if ($row['servicio_medico'] === 'PSICOLÓGICO' && $row2['dias_restantes'] < 0) { ?>
                                                                        <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo '0';?></td>
                                                                        <?php } ?>

                                                                        <?php 
                                                                          if ($row['servicio_medico'] != 'PSICOLÓGICO' && $row2['dias_restantes'] >= 0) { ?>
                                                                        <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row2['dias_restantes'];?></td>
                                                                        <?php } ?>

                                                                        <?php 
                                                                          if ($row['servicio_medico'] != 'PSICOLÓGICO' && $row2['dias_restantes'] <-4) { ?>
                                                                        <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo "SIN REGISTRO"?></td>
                                                                        <?php } ?>
                                                                        <?php 
                                                                          if ($row['servicio_medico'] != 'PSICOLÓGICO' && $row2['dias_restantes'] < 0 && $row2['dias_restantes'] >=-4) { ?>
                                                                        <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo "0"?></td>
                                                                        <?php } ?>



                                                                        <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">

                                                                        <a style="text-decoration: underline;" href="./registrar_seguimiento.php?id_asistencia_medica=<?php echo $row2['id_asistencia']?>" class="btn btn-outline-success">
                                                                                  REGISTRAR <br> SEGUIMIENTO
                                                                        </a>

                                                                        <!-- <?php 
                                                                          if ($row2['dias_restantes'] >= -4 && $row2['dias_restantes'] <= 0 && $row['nombre_institucion'] != 'UPSIPED') { ?>

                                                                            <a style="text-decoration: underline;" href="./registrar_seguimiento.php?id_asistencia_medica=<?php echo $row2['id_asistencia']?>" class="btn btn-outline-success">
                                                                                  REGISTRAR <br> SEGUIMIENTO
                                                                            </a>

                                                                        <?php }?>

                                                                         <?php 
                                                                          if ($row2['dias_restantes'] >= 1 && $row['nombre_institucion'] != 'UPSIPED') {
                                                                            echo "
                                                                              <a style='color: black; cursor: not-allowed;' class='btn btn-outline-warning'>
                                                                                EN ESPERA <br> DEL REGISTRO
                                                                              </a> 
                                                                            ";
                                                                          }
                                                                        ?> 

                                                                        <?php 
                                                                          if ($row2['dias_restantes'] < -4 && $row['nombre_institucion'] != 'UPSIPED') {
                                                                            echo "
                                                                              <a style='color: black; cursor: not-allowed;' class='btn btn-outline-danger'>
                                                                                SEGUIMIENTO <br> NO REGISTRADO
                                                                              </a> 
                                                                            ";
                                                                          }
                                                                        ?>

                                                                        <?php
                                                                          if ($row['nombre_institucion'] === 'UPSIPED'){
                                                                            echo "
                                                                            <a style='color: black; cursor: not-allowed;' class='btn btn-outline-info'>
                                                                                AISTENCIA <br> NOTIFICADA
                                                                            </a> 
                                                                          ";
                                                                          }
                                                                        ?>  -->




                                                                        </td>


                                                        </tr>



                                                                <?php } ?>


                                                              <?php } ?>
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
<a href="./admin.php" class="btn-flotante">REGRESAR</a>
</div>













</body>
</html>