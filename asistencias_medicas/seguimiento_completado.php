<?php
/*require 'conexion.php';*/
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

// echo "Agendar Asistencia Médica";



$id_asistencia_medica = $_GET["id_asistencia_medica"];


// echo $id_asistencia_medica;

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
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/instrumento_adaptabilidad.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
            <a href="./admin.php">INICIO</a>
            <a href="./asistencia_turnada.php">ASISTENCIAS MÉDICAS TURNADAS</a>
            <!-- <a href="./seguimiento_completado.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>">REGISTRAR SEGUIMIENTO</a> -->
            <a class="actived" href="./seguimiento_completado.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>">SEGUIMIENTO REGISTRADO CORRECTAMENTE</a>
          </div>
          

            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a class="active" href="#" onclick="location.href='./seguimiento_completado.php?id_asistencia_medica=<?php echo $id_asistencia_medica; ?>'"><span class="far fa-regular fa-address-card"></span><span class="tab-text">SEGUIMIENTO REGISTRADO CORRECTAMENTE</span></a></li>
              </ul>


              <form class="container well form-horizontal" enctype="multipart/form-data">
              
                      <div class="row">
                        <div id="cabecera">
                          <div class="row alert div-title">
                            <h3 style="text-align:center">REGISTRO COMPLETADO</h3>
                          </div>
                        </div>
                      <div>

                      <table class="table table-bordered" id="table-instrumento">
                        <thead>
                            <tr>

                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">ID ASISTENCIA MÉDICA</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">TRASLADO REALIZADO</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">SE PRESENTÓ A LA ASISTENCIA MÉDICA</th>
                                <!-- <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">POLICIA DE INVESTIGACIÓN A CARGO DEL TRASLADO</th> -->
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">DIAGNÓSTICO</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">CITA DE SEGUIMIENTO</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">ETAPA</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">TRATAMIENTO MEDICO</th>
                            </tr>
                        </thead>


<tbody>
                                                <?php

                                                    $count = 0;

                                                    $query = "SELECT solicitud_asistencia.id_asistencia, seguimiento_asistencia.traslado_realizado, seguimiento_asistencia.se_presento, 
                                                    seguimiento_asistencia.nombre_pdi, seguimiento_asistencia.diagnostico, seguimiento_asistencia.cita_seguimiento, 
                                                    seguimiento_asistencia.observaciones_seguimiento, solicitud_asistencia.etapa, seguimiento_asistencia.fecha_registro
                                                    FROM solicitud_asistencia
                                                    JOIN seguimiento_asistencia
                                                    ON solicitud_asistencia.id_asistencia = seguimiento_asistencia.id_asistencia 
                                                    
                                                    ORDER BY seguimiento_asistencia.id DESC
                                                    LIMIT 1";
                                                    
                                                    
                                                    $result_solicitud = mysqli_query($mysqli, $query);

                                                    while($row = mysqli_fetch_array($result_solicitud)) {
                                                    
                                                        
                                                ?>
                                                    <?php $count = $count + 1 ?>
                                                        <tr>

                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['id_asistencia']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['traslado_realizado']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['se_presento']?></td>
                                                            <!-- <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['nombre_pdi']?></td> -->
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['diagnostico']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['cita_seguimiento']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['etapa']?></td>
                                                            


                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">
                                                                <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
                                                                   REGISTRAR <br> MEDICAMENTO
                                                                </button>
                                                                <!-- <button style="display: block; margin: 0 auto;" disabled class="btn btn-primary"><?php echo $row['etapa']?></button>
                                                                <a href="grafico_instrumento.php?folio=<?php echo $fol_exp; ?>" class="btn btn-outline-secondary">
                                                                    <i class="fas fa-chart-line" ></i>
                                                                </a> -->
                                                            </td>
                                                            
                                                        </tr>

                                                    <?php } ?>
                                            </tbody>
                                        </table> 





                                      </table>
                    </div>
                                  
                                    
                  </div>
              </form>










              <form class="container well form-horizontal" enctype="multipart/form-data">
              <?php
              $cl = "SELECT COUNT(*) as t FROM tratamiento_medico WHERE id_asistencia = '$id_asistencia_medica'";
              $rcl = $mysqli->query($cl);
              $fcl = $rcl->fetch_assoc();
              // echo $fcl['t'];
              if ($fcl['t'] == 0){
                    echo "<div id='cabecera'>
                      <div class='row alert div-title' role='alert'>
                        <h3 style='text-align:center'>¡ NO HAY MEDICAMENTOS REGISTRADOS PARA LA ASISTENCIA MÉDICA: $id_asistencia_medica !</h3>
                      </div>
                    </div>";
              } else{
                    echo "
                      <div class='row'>
                        <div id='cabecera'>
                          <div class='row alert div-title'>
                            <h3 style='text-align:center'>MEDICAMENTOS REGISTRADOS PARA LA ASISTENCIA MÉDICA: $id_asistencia_medica</h3>
                          </div>
                        </div>
                      <div>

                      <table class='table table-bordered' id='table-instrumento'>
                        <thead>
                            <tr>

                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>NO.</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>NÚMERO DE OFICIO</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>SERVIDOR PÚBLICO</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>CANT.</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>PRESENTACIÓN</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>CONTENIDO</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>MEDICAMENTO</th>
                                <th style='text-align:center; font-size: 14px; border: 2px solid #97897D;'>INDICACIONES</th>

                            </tr>
                        </thead>
                    
                    ";
                  }

            ?>


<tbody>
                                                <?php

                                                    $count = 0;

                                                    $query = "SELECT*
                                                    FROM tratamiento_medico
                                                    WHERE tratamiento_medico.id_asistencia = '$id_asistencia_medica'
                                                    ORDER BY tratamiento_medico.nombre_medicamento ASC";

                                                    $result_solicitud = mysqli_query($mysqli, $query);

                                                    while($row = mysqli_fetch_array($result_solicitud)) {
                                                    
                                                        
                                                ?>
                                                    <?php $count = $count + 1 ?>
                                                        <tr>

                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $count; ?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['numero_oficio']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['nombre_recibe']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['cantidad']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['presentacion']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['contenido']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $row['nombre_medicamento']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['indicaciones']?></td>



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





<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

    
      <div class="modal-header">
        <h2 class="modal-title">REGISTRAR MEDICAMENTO</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      <div class="modal-body">
        <form method="POST" action="./guardar_medicamento.php">




                        <div style="display: none;">
                          <label class="control-label">ID SERVIDOR PÚBLICO</label>
                          <input type="text" class="form-control"  id="id_servidor" name="id_servidor" readonly value="<?php echo $id_servidor_ini;?>">
                        </div>

                        <br>

                        <div>
                          <label class="control-label">ID ASISTENCIA MÉDICA</label>
                          <input type="text" class="form-control"  id="id_asistencia" name="id_asistencia" readonly value="<?php echo $id_asistencia_medica;?>">
                        </div>
                        
                        <br>

                        <!-- <div>
                          <label class="control-label">MEDICAMENTO SURTIDO POR LA INSTITUCIÓN MÉDICA</label>
                          <select autocomplete="off" class="form-control" id="surtido" name="surtido" required>
                            <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                          </select>
                        </div> -->

                        <!-- <br> -->

                        <!-- <div>
                          <label class="control-label">MEDICAMENTO ENTREGADO</label>
                          <select autocomplete="off" class="form-control" id="entregado" name="entregado" required>
                            <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                            <option value="EN GESTÓN">EN GESTÓN</option>
                            <option value="PARCIALMENTE ENTREGADO">PARCIALMENTE ENTREGADO</option>
                            <option value="COMPLETO">COMPLETO</option>
                            <option value="NO APLICA">NO APLICA</option>
                          </select>
                        </div> -->

                        <!-- <br> -->

                        <div>
                          <label class="control-label">ADQUISICIÓN DEL MEDICAMENTO</label>
                          <select autocomplete="off" class="form-control" id="adquisicion" name="adquisicion" required>
                            <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                            <option value="COMPRADO">COMPRADO</option>
                            <option value="DONACIÓN">DONACIÓN</option>
                            <option value="OTORGADO POR LA INSTITUCIÓN">OTORGADO POR LA INSTITUCIÓN</option>
                          </select>
                        </div>

                        <br>

                        <div>
                          <label class="control-label">NOMBRE DEL MEDICAMENTO</label>
                          <input placeholder="NOMBRE DEL MEDICAMENTO" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="nombre" name="nombre" required value="">
                        </div>

                        <br>

                        <div>
                          <label class="control-label">CANTIDAD</label>
                          <select autocomplete="off" class="form-control" id="cantidad" name="cantidad" required>
                            <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select>
                        </div>

                        <br>

                          <div>
                            <label class="control-label">PRESENTACIÓN</label>
                            <select autocomplete="off" class="form-control" id="presentacion" name="presentacion" required>
                              <option disabled selected value="">SELECCIONA UNA OPCIÓN</option>
                              <option value="CAJA">CAJA</option>
                              <option value="BOTELLA">BOTELLA</option>
                              <option value="BOLSA">BOLSA</option>
                              <option value="FRASCO">FRASCO</option>
                              <option value="LATA">LATA</option>
                            </select>
                          </div>

                          <br>

                          <div>
                            <label class="control-label">CONTENIDO</label>
                            <input placeholder="EJEMPLO: 20 TABLETAS" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="contenido" name="contenido" required value="">
                          </div>

                          <br>
                          
                          <div>
                            <label class="control-label">INDICACIONES DEL TRATAMIENTO MÉDICO</label>
                            <input placeholder="EJEMPLO: TOMAR 1 TABLETA CADA 8 HRS DURANTE 5 DIAS" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="indicaciones" name="indicaciones" required value="">
                          </div>

                          <br>

                          <!-- <div>
                            <label class="control-label">NÚMERO DE OFICIO MEDIANTE EL CUAL SE RECIBE EL MEDICAMENTO</label>
                            <input placeholder="NÚMERO DE OFICIO" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="oficio" name="oficio" required value="">
                          </div>

                          <br>

                          <div>
                            <label class="control-label">NOMBRE DEL SERVIDOR PÚBLICO QUE RECIBE EL MEDICAMENTO</label>
                            <input placeholder="NOMBRE DEL SERVIDOR PÚBLICO" autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control"  id="nombre_recibe" name="nombre_recibe" required value="">
                          </div> -->





      </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
                <button type="submit" class="btn color-btn-success">GUARDAR</button>
              </div>
        </form>
    </div>
  </div>
</div>



<div class="contenedor">
<a href="./asistencia_turnada.php" class="btn-flotante">REGRESAR</a>
</div>


</body>
</html>