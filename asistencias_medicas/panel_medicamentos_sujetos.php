<?php
/*require 'conexion.php';*/
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

// echo "Agendar Asistencia Médica";



// $id_asistencia_medica = 'YHA-001-2026-AM033';


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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MEDICAMENTO DE LOS SUJETOS PROTEGIDOS</title>

  <link rel="stylesheet" href="../css/instrumento_adaptabilidad.css">
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href='css/bootstrap.min.css' rel='stylesheet'>
  <link href='css/fullcalendar.min.css' rel='stylesheet' />
  <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
  <link href='css/personalizado.css' rel='stylesheet' />

  <!-- <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/expediente.css">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/expediente.js"></script>
  <script src="../js/solicitud.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="../css/registrosolicitud1.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>-->
  <link rel="stylesheet" href="../css/main2.css">
  <link rel="stylesheet" href="../css/tarjeta_medicamento.css"> 
  







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
            <a href="../consultores/admin.php">INICIO</a>
            <a href="../asistencias_medicas/admin.php">MENÚ ASISTENCIAS MÉDICAS</a>
            <a class="actived" href="./panel_medicamentos_sujetos.php">MEDICAMENTOS DE LOS SUJETOS PROTEGIDOS</a>
          </div>
          

            <div class=" well form-horizontal">
              <div class="row">

              <ul class="tabs">
                <li><a href="./panel_medicamentos_sujetos.php" class="active"><span class="far fa-solid fa-tablets"></span><span class="tab-text">MEDICAMENTOS</span></a></li>
              </ul>

              <?php
              $consulta_am = "SELECT COUNT(*) as total

                  FROM medidas


                  JOIN datospersonales
                  ON medidas.id_persona = datospersonales.id

                  JOIN autoridad
                  ON  medidas.id_persona = autoridad.id_persona


                  AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' 
                  AND medidas.estatus = 'EN EJECUCIÒN';
              ";
              $consulta_count = $mysqli->query($consulta_am);
              $row_count=$consulta_count->fetch_assoc();
              $resultado_count = $row_count['total'];
              // echo $resultado_count;
              if ($resultado_count <= 0){
              ?>
           

                      <div class="row">
                        <div id="cabecera">
                          <div class="row alert div-title">
                            <h3 style='text-align:center'>NO SE ENCONTRARÓN SUJETOS PROTEGIDOS CON MEDIDA DE ASISTENCIA MÉDICA</h3>
                            <h3 style='text-align:center'>EN EL INTERIOR DEL CENTRO DE PROTECCIÓN </h3>
                          </div>
                        </div>
                      </div>



              <?php
              }
              ?>
              <?php
              if ($resultado_count > 0){
              ?>
              



              
                      <div class="row">
                        <div id="cabecera">
                          <div class="row alert div-title">
                            <h3 style='text-align:center'>SUJETOS PROTEGIDOS CON TRATAMIENTO MÉDICO </h3>
                            <h3 style='text-align:center'>EN EL INTERIOR DEL CENTRO DE PROTECCIÓN</h3>
                          </div>
                        </div>
                      <div>

                      <table class="table table-bordered" id="table-instrumento">
                        <thead>
                            <tr>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">NO.</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">ID SUJETO</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">SEXO</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">EDAD</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">TIPO DE DOSIS</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">FECHA DE INGRESO</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">ESTATUS PROGRAMA</th>
                                <!-- <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">TOTAL DE MEDICAMENTOS</th>
                                <th style="text-align:center; font-size: 14px; border: 2px solid #97897D;">TRATAMIENTO MÉDICO</th> -->
                            </tr>
                        </thead>



              <?php
              }
              ?>






<div class="contenedor">
<a href="../asistencias_medicas/admin.php" class="btn-flotante">REGRESAR</a>
</div>



</body>
</html>
<script language="Javascript">

// js notas
const enlaces = document.querySelectorAll('.enlace-nota');
const tooltip = document.getElementById('tooltip-flotante');

enlaces.forEach(enlace => {
    enlace.addEventListener('mouseenter', (e) => {
        // Obtenemos el texto guardado en el atributo data-nota
        tooltip.textContent = e.currentTarget.getAttribute('data-nota');
        tooltip.style.display = 'block';
    });

    enlace.addEventListener('mousemove', (e) => {
        // Posiciona la nota 12 píxeles abajo y a la derecha del cursor
        tooltip.style.top = (e.pageY + 12) + 'px';
        tooltip.style.left = (e.pageX + 12) + 'px';
    });

    enlace.addEventListener('mouseleave', () => {
        tooltip.style.display = 'none';
    });
});

</script>













<!-- 



                                            <tbody>
                                                <?php

                                                    $count = 0;

                                                    $query = "SELECT datospersonales.identificador, datospersonales.sexopersona, datospersonales.edadpersona,
                                                              IF(datospersonales.edadpersona < 12, 'INFANTIL', 'ADULTO') AS dosis,
                                                              autoridad.fechasolicitud_persona, datospersonales.estatusprograma
                                                              FROM medidas


                                                              JOIN datospersonales
                                                              ON medidas.id_persona = datospersonales.id

                                                              JOIN autoridad
                                                              ON  medidas.id_persona = autoridad.id_persona


                                                              AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' 
                                                              AND medidas.estatus = 'EN EJECUCIÒN'

                                                              ORDER BY autoridad.fechasolicitud_persona AS
                                                    ";
                                                    
                                                    
                                                    $result_sujetos = mysqli_query($mysqli, $query);


                                                    while($row = mysqli_fetch_array($result_sujetos)) {

                                                    $originalDate = $row['fechasolicitud_persona'];
                                                    $date_format = date("d/m/Y", strtotime($originalDate));
                                                    $id_sujeto = $row['id_sujeto'];

                                                    $consulta4 = "SELECT COUNT(*) as total
                                                                FROM tratamiento_medico
                                                                WHERE tratamiento_medico.id_asistencia = '$id_sujeto'
                                                                ORDER BY tratamiento_medico.id ASC";

                                                    $var_resultado4 = $mysqli->query($consulta4);
                                                        
                                                ?>
                                                    <?php $count = $count + 1 ?>
                                                        <tr>

                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"><?php echo $count;?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['id_sujeto']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['sexopersona']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['edadpersona']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['dosis']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['fechasolicitud_persona']?></td>
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;"> <?php echo $row['estatusprograma']?></td>

                                                            <!-- 
                                                            <?php 
                                                            
                                                            while ($var_fila4=$var_resultado4->fetch_array())

                                                                {
                                                                  
                                                                echo "<td style='text-align:center; font-size: 15px; font-weight: bold; border: 2px solid #97897D;'>"; echo $var_fila4['total']; echo "</td>";
                                                                

                                                                }

                                                            ?> -->

                                                            <!-- 
                                                            <td style="text-align:center; font-size: 10px; border: 2px solid #97897D;">

                                                                <?php
                                                              
                                                                $nota_agregar = "Agregar medicamento";
                                                                $nota_archivo = "Medicamentos registrados";
                                                                ?>

                                                                <?php
                                                                $consulta_total_m = "SELECT COUNT(*) as total
                                                                FROM tratamiento_medico
                                                                WHERE tratamiento_medico.id_asistencia = '$id_sujeto";

                                                                $r_consulta_total_m = $mysqli->query($consulta_total_m);
                                                                $row_consulta_total_m=$r_consulta_total_m->fetch_assoc();
                                                                $total_m = $row_consulta_total_m['total'];
                                                                ?>

                                                                <?php 
                                                                if ($total_m > 0){
                                                                ?>                    
                                                               
                                                                <a type="button" data-toggle="modal" data-target="#medicamentoModal<?php echo $id_asistencia_m;?>" class="btn btn-outline-secondary enlace-nota btn-historial" data-nota="<?php echo $nota_archivo; ?>">
                                                                    <i class="fas fa-file-medical"></i>
                                                                </a>
                                                                <?php 
                                                                }
                                                                ?> 
                                                              
                                                                <div id="tooltip-flotante" style="display:none; position:absolute; background:#222; color:#fff; padding:6px 12px; border-radius:4px; pointer-events:none; font-family:sans-serif; font-size:13px; z-index:9999;"></div>

                                                            </td> -->



                                                        </tr>








                                                    <?php } ?>
                                            </tbody>
                                        <!-- </table>  -->





                                      </table>
                    </div>
                                  
                                    
                  </div>
              </form> -->
