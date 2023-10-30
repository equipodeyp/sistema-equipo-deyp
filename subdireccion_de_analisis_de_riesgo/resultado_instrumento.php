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

date_default_timezone_set('America/Mexico_City');
$myDate = date("d-m-y h:i:s a");

$query = "SELECT id_estado, estado FROM t_estado ORDER BY id_estado";
$resultado23=$mysqli->query($query);

$query1 = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
$resultado1=$mysqli->query($query1);

$id_instrumento = $_GET['folio'];
// echo $id_instrumento;


// $name_folio=$rowfol['folioexpediente'];
// echo $name_folio;


$fol_exp = $_GET['folio'];
echo $fol_exp;
echo "<br>";

$fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();
$name_folio=$rowfol['folioexpediente'];
echo $name_folio;
echo "<br>";

// $datos_instrumento=" SELECT * FROM instrumento WHERE id_instrumento='$fol_exp'";
// $result_datos = $mysqli->query($datos_instrumento);
// $rowinstrumento=$result_datos->fetch_assoc();
// $folio=$rowinstrumento['folio_expediente'];
// echo $folio;
// echo "<br>";

$query = "SELECT * FROM instrumento WHERE folio_expediente = '$name_folio'";
$result_instrumento = $mysqli->query($query);
$row = $result_instrumento->fetch_assoc();
// echo "<br>";
$idins=$row['id_instrumento'];
// echo $idins;
// echo "<br>";
$folio_expediente=$row['folio_expediente'];
// echo $folio_expediente;
// echo "<br>";
$id_persona=$row['id_persona'];
// echo $id_persona;
// echo "<br>";
$fecha_instrumento=$row['fecha_registro'];
// echo $fecha_instrumento;
// echo "<br>";
$nombre_servidor=$row['nombre_servidor'];
// echo $nombre_servidor;
// echo "<br>";

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
            $user = $row_user['usuario'];
            $nombre_ser = $row['nombre'];
            $apellido_p = $row['apellido_p'];
            $apellido_m = $row['apellido_m'];
            $name_user = $nombre_ser." " .$apellido_p." " .$apellido_m;
            $full_name = mb_strtoupper (html_entity_decode($name_user, ENT_QUOTES | ENT_HTML401, "UTF-8"));



			if ($genero=='mujer') {
				echo "<img src='../image/mujerup.png' width='100' height='100'>";
			}
			if ($genero=='hombre') {
				echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
			}
			?>

    <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
    </div>
    <nav class="menu-nav">
           		<ul>
                <?php
                    if ($user=='guillermogv') {
                    echo "<a style='text-align:center' class='user-nombre' href='create_ticket.php?folio=$name_folio'><button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
                  ";}
                ?>
            	</ul>
    </nav>
  </div>
  <div class="main bg-light">
    <div class="barra">
      <img src="../image/fiscalia.png" alt="" width="150" height="150">
      <img src="../image/ups2.png" alt="" width="1400" height="70">
      <img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
    </div>
      <!-- menu de navegacion de la parte de arriba -->
      <div class="wrap">
      <ul class="tabs">
    			<li><a href="#" class="active" onclick="location.href='resultado_instrumento.php?folio=<?php echo $fol_exp; ?>'"><span class="far fa-address-card"></span><span class="tab-text">DETALLE DEL INSTRUMENTO</span></a></li>
    			<!-- <li><a href="#" onclick="location.href='grafico_instrumento.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-chart-line"></span><span class="tab-text">GRÁFICO</span></a></li> -->
          <!-- <li><a href="#" onclick="location.href='seguimiento_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">SEGUIMIENTO PERSONA</span></a></li> -->
    	</ul>

    		<div class="secciones">
    			<article id="tab2">
            <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="../subdireccion_de_analisis_de_riesgo/menu.php">REGISTROS</a>
              <a href="../subdireccion_de_analisis_de_riesgo/detalles_expediente.php?folio=<?php echo $name_folio;?>">EXPEDIENTE</a>
              <a href="../subdireccion_de_analisis_de_riesgo/detalles_persona.php?folio=<?php echo $fol_exp;?>">PERSONA</a>
              <a href="../subdireccion_de_analisis_de_riesgo/instrumento_adaptabilidad.php?folio=<?php echo $fol_exp;?>">REGISTRAR INSTRUMENTO</a>
              <a href="../subdireccion_de_analisis_de_riesgo/detalle_instrumento.php?folio=">INSTRUMENTOS REGISTRADOS</a>
              <a href="../subdireccion_de_analisis_de_riesgo/resultado_instrumento.php?folio="class="actived">DETALLE DEL INSTRUMENTO</a>
            </div>


            <div class="container">
        	<div class="well form-horizontal">
              <form class="container well form-horizontal" enctype="multipart/form-data">

        				<div class="row">

                <div id="cabecera">
                    <div class="row alert div-title">
                      <h3 style="text-align:center">INFORMACIÓN GENERAL DEL INSTRUMENTO DE ADAPTABILIDAD</h3>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3 ">
                    <label for="">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span></span></label>
                    <input class="form-control" id="fol_exp" name="folio" placeholder="" type="text" value="<?php echo $folio_expediente; ?>" readonly>
                  </div>

                <div class="col-md-6 mb-3">
                  <label for="">ID PERSONA<span></span></label>
                  <input class="form-control" id="id_persona" name="id_persona" placeholder="" type="text" value="<?php echo $id_persona; ?>" readonly>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="" class="">FECHA Y HORA REGISTRO</label>
                  <input readonly class="form-control" id="fecha_hora" name="fecha_hora_instrumento" placeholder="" type="text" value="<?php echo $fecha_instrumento; ?>">
                </div>

                <div class="col-md-6 mb-3">
                  <label for="" class="">NOMBRE DEL SERVIDOR PÚBLICO QUE REALIZA EL LLENADO DEL INSTRUMENTO</label>
                  <input readonly class="form-control" id="nombre_servidor" name="nombre_servidor" placeholder="" type="text" value="<?php echo $nombre_servidor; ?>">
                </div>

                  <div id="cabecera">
                    <div class="row alert div-title">
                      <h3 style="text-align:center">DATOS REGISTRADOS EN EL INSTRUMENTO DE ADAPTABILIDAD</h3>
                    </div>
                  </div>




              <table class="table table-bordered" id="table-instrumento">
                <thead>
                    <tr>
                        <th style="text-align:center; font-size: 18px; border: 3px solid #97897D;">Categoria</th>
                        <th style="text-align:center; font-size: 18px; border: 3px solid #97897D;">No.</th>
                        <th style="text-align:center; font-size: 18px; border: 3px solid #97897D;">Pregunta</th>
                        <th style="text-align:center; font-size: 18px; border: 3px solid #97897D;">Respuesta</th>
                        <th style="text-align:center; font-size: 18px; border: 3px solid #97897D;">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $aux = 1;
                    $aux2 = 5;
                    $question='p';
                    $count = 0;
                        $aa = 1;
                        $a = 1;
                        $bb = 4;
                        $b = 2;
                        $bbb = 5;
                        $c = 3;
                        $cc = 6;
                        $d = 4;
                        $dd = 7; 

                        $array = array();

                        while ($aa <= 13) {

                            $sentenciar5=" SELECT * FROM categoria_instrumento WHERE id='$aa'";
                            $resultr5 = $mysqli->query($sentenciar5);
                            $rowr5=$resultr5->fetch_assoc();
                            // echo $aa;

                            $sentenciar=" SELECT * FROM preguntas_instrumento WHERE id='$a'";
                            $resultr = $mysqli->query($sentenciar);
                            $rowr=$resultr->fetch_assoc();
                            
                            $sentenciar1=" SELECT * FROM preguntas_instrumento WHERE id='$b'";
                            $resultr1 = $mysqli->query($sentenciar1);
                            $rowr1=$resultr1->fetch_assoc();
                            //
                            $sentenciar2=" SELECT * FROM preguntas_instrumento WHERE id='$c'";
                            $resultr2 = $mysqli->query($sentenciar2);
                            $rowr2=$resultr2->fetch_assoc();
                            //
                            $sentenciar3=" SELECT * FROM preguntas_instrumento WHERE id='$d'";
                            $resultr3 = $mysqli->query($sentenciar3);
                            $rowr3=$resultr3->fetch_assoc();
                            //
                            $sentenciar4=" SELECT * FROM instrumento WHERE id_instrumento = '$id_instrumento'";
                            $resultr4 = $mysqli->query($sentenciar4);
                            $rowr4=$resultr4->fetch_assoc();
                            //
                              $arp=$question.$a;
                              $arp1=$question.$b;
                              $arp2=$question.$c;
                              $arp3=$question.$d;
                              $resp1 = '1'.$rowr4[$arp];
                              // echo $resp1;
                              $resp2 = '2'.$rowr4[$arp1];
                              $resp3 = '3'.$rowr4[$arp2];
                              $resp4 = '4'.$rowr4[$arp3];


                              if ($resp1 === '1No') {
                                $valresp = 3;
                                array_push($array, "$valresp");

                              }
                              elseif ($resp2 === '2Si') {
                                $valresp = 2;
                                array_push($array, "$valresp");

                              }
                              elseif ($resp3 === '3Si') {
                                $valresp = 1;
                                array_push($array, "$valresp");

                              }
                              elseif ($resp4 === '4Si') {
                                $valresp = 0;
                                array_push($array, "$valresp");

                              }

                            

                         
                         
                          
                          echo "<tr >";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' rowspan='4'>"; echo $rowr5['nombre_categoria']; echo "</td>";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' colspan=''>";  echo $a;  echo "</td>";
                          echo "<td style='border: 3px solid #97897D; font-size: 10px;' colspan='' >"; echo $rowr['pregunta']; echo "</td>";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' colspan=''>"; echo $rowr4[$arp];  echo "</td>";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' rowspan='4'>"; echo "<h1>$valresp</h1>"; echo "</td>";
                          echo "</tr>";
                          echo "<tr >";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' colspan=''>"; echo $b; echo "</td>";
                          echo "<td style='border: 3px solid #97897D; font-size: 10px;' colspan='' >"; echo $rowr1['pregunta']; echo "</td>";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' colspan=''>"; echo $rowr4[$arp1]; echo "</td>";
                          echo "</tr>";
                          echo "<tr >";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' colspan=''>"; echo $c;  echo "</td>";
                          echo "<td style='border: 3px solid #97897D; font-size: 10px;' colspan='' >"; echo $rowr2['pregunta']; echo "</td>";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' colspan=''>"; echo $rowr4[$arp2]; echo "</td>";
                          echo "</tr>";
                          echo "<tr >";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' colspan=''>";  echo $d; echo "</td>";
                          echo "<td style='border: 3px solid #97897D; font-size: 10px;' colspan='' >"; echo $rowr3['pregunta']; echo "</td>";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' colspan=''>"; echo $rowr4[$arp3]; echo "</td>";
                          echo "</tr>";
                          $aa = $aa +1;

                          if ($a < 4) {
                            $bb = $bb+1;
                          }
                          if ($a < 8) {
                            $bb = $bb+1;
                          }
                          if ($a < 12) {
                            $bb = $bb+1;
                          }
                          if ($a < 16) {
                            $bb = $bb+1;
                          }
                          if ($a < 20) {
                            $bb = $bb+1;
                          }
                          if ($a < 24) {
                            $bb = $bb+1;
                          }
                          if ($b < 5) {
                            $bbb = $bbb + 1;
                          }
                          if ($b < 9) {
                            $bbb = $bbb + 1;
                          }
                          if ($b < 13) {
                            $bbb = $bbb + 1;
                          }
                          if ($b < 17) {
                            $bbb = $bbb + 1;
                          }
                          if ($b < 21) {
                            $bbb = $bbb + 1;
                          }
                          if ($b < 25) {
                            $bbb = $bbb + 1;
                          }
                          if ($b < 29) {
                            $bbb = $bbb + 1;
                          }
                          if ($b < 33) {
                            $bbb = $bbb + 1;
                          }
                          if ($b < 37) {
                            $bbb = $bbb + 1;
                          }
                          if ($b < 41) {
                            $bbb = $bbb + 1;
                          }
                          if ($c < 14) {
                            $cc = $cc + 1;
                          }
                          if ($d < 19) {
                            $dd = $dd + 1;
                          }
                          $a = $a + 4;
                          $b = $b + 4;
                          $c = $c + 4;
                          $d = $d + 4;
                          $bb = $bb +3;
                        }


                        $total_valor = array_sum($array);
                        // echo $total_valor;


                        ?>
                </tbody>
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

                        <div>
                          <table>
                            <thead>
                                <tr>
                                  <th class="resultado-instrumento-uno">RESULTADO DEL INSTRUMENTO<br>DE ADAPTABILIDAD: <br> </th>
                                </tr>

                                <tr>

                                    <?php 

                                      if ($total_valor <= 9) { 
                                          
                                          echo "<th class='resultado-instrumento-dos'>INADAPTABLE</th>";
                                        }
                                      
                                      else if ($total_valor >= 10 && $total_valor <= 19) {
                                          
                                          echo "<th class='resultado-instrumento-dos'>BAJA</th>";
                                        }

                                      else if ($total_valor >= 20 && $total_valor <= 29) {
                                          
                                          echo "<th class='resultado-instrumento-dos'>MEDIA</th>";
                                        }

                                      else if ($total_valor >= 30 && $total_valor <= 39) {
                                          
                                          echo "<th class='resultado-instrumento-dos'>ALTA</th>";
                                        }

                                      ?>
                                    
                                </tr>
                            </thead>
                          </table>
                      </div> 
<div class="contenedor">
<a href="../subdireccion_de_analisis_de_riesgo/detalle_instrumento.php?folio=<?=$fol_exp?>" class="btn-flotante">REGRESAR</a>
</div>



</body>
</html>
