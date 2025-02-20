?php
error_reporting(0);
include("conexion.php");
session_start ();
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();

$id_persona = $_GET['id_persona'];
// echo $id_persona;

$query_instru = "SELECT * FROM instrumento WHERE id_persona = '$id_persona'";
$id_instru = $mysqli ->query( $query_instru);
$row_instru = $id_instru->fetch_assoc();
$instrumento_id=$row_instru['id_instrumento'];
$query_instru2 = "SELECT * FROM instrumento_valores WHERE id_persona = '$id_persona'";
$id_instru2 = $mysqli ->query( $query_instru2);
$row_instru2 = $id_instru2->fetch_assoc();
$idinstrumento = $row_instru2['id'];

$query = "SELECT * FROM instrumento WHERE id_persona = '$id_persona'";
$result_instrumento = $mysqli->query($query);
$row = $result_instrumento->fetch_assoc();
//
$folio_expediente=$row['folio_expediente'];
$id_persona=$row['id_persona'];
$fecha_instrumento=$row['fecha_registro'];
$nombre_servidor=$row['nombre_servidor'];
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
                    if ($user=='subdirector') {
                    echo "<a style='text-align:center' class='user-nombre' href='create_ticket.php?folio=$folio_expediente'><button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
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
    			<li><a href="#" class="active" onclick="location.href='resultado_instrumento.php?id_persona=<?php echo $id_persona; ?>'"><span class="far fa-address-card"></span><span class="tab-text">DETALLE DEL INSTRUMENTO</span></a></li>
    			<!-- <li><a href="#" onclick="location.href='grafico_instrumento.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-chart-line"></span><span class="tab-text">GRÁFICO</span></a></li> -->
          <!-- <li><a href="#" onclick="location.href='seguimiento_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">SEGUIMIENTO PERSONA</span></a></li> -->
    	</ul>

    		<div class="secciones">
    			<article id="tab2">
            <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="../subdireccion_de_analisis_de_riesgo/menu.php">INICIO</a>
              <a href="../subdireccion_de_analisis_de_riesgo/menu_instrumento.php">MENÚ INSTRUMENTO DE ADAPTABILIDAD</a>
              <a href="../subdireccion_de_analisis_de_riesgo/instrumentos_registrados.php">INSTRUMENTOS REGISTRADOS</a>
              <a href="../subdireccion_de_analisis_de_riesgo/resultado_instrumento.php?id_persona=<?php echo $id_persona; ?>">RESULTADO INTRUMENTO </a>
            </div>


            <div class="container">
        	<div class="well form-horizontal">
              <form id="form" class="container well form-horizontal" enctype="multipart/form-data">

                <div class="">
                  <img style="float: left;" src="../image/FGJEM.png" width="50" height="50">
                  <img style="float: right;" src="../image/ESCUDO.png" width="60" height="50">
                  <h4 style="text-align:center; color: #030303;">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
                </div>

                <br>

        				<div class="row">


              <div id="">

                  <div id="cabecera">
                      <div class="row alert div-title">
                        <h3 style="text-align:center">INFORMACIÓN GENERAL DEL INSTRUMENTO DE ADAPTABILIDAD</h3>
                      </div>
                  </div>

                  <div>
                    <table class="table table-bordered" width="100%" border="1" cellpadding="0" cellspacing="0" >

                      <tbody>
                        <tr>
                          <th style="text-align:left;">ID INSTRUMENTO DE ADAPTABILIDAD:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $instrumento_id; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">FOLIO DEL EXPEDIENTE DE PROTECCIÓN:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $folio_expediente; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">ID SUJETO:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $id_persona; ?></td>
                        </tr>

                        <tr>
                          <th style="text-align:left;">FECHA Y HORA REGISTRO</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $fecha_instrumento; ?></td>
                        </tr>


                        <tr>
                          <th style="text-align:left;">NOMBRE DEL SERVIDOR PÚBLICO QUE REALIZA EL REGISTRO DEL INSTRUMENTO:</th>
                          <td style="text-align:left; background-color: #fff;"><?php echo $nombre_servidor; ?></td>
                        </tr>


                      </tbody>
                    </table>
                  </div>

              </div>



                  <div id="cabecera">
                    <div class="row alert div-title">
                      <h3 style="text-align:center">DATOS REGISTRADOS EN EL INSTRUMENTO DE ADAPTABILIDAD</h3>
                    </div>
                  </div>




              <table class="table table-bordered" id="table-instrumento" style="table.print-friendly tr td, table.print-friendly tr th { page-break-inside: avoid;}">
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
                    $arraytotalxcategoria = array();
                    $verval = "SELECT * FROM instrumento_valores WHERE id= '$idinstrumento'";
                    $rverval = $mysqli->query($verval);
                    $fverval = $rverval->fetch_assoc();
                    $preg1 = $fverval['p1'];
                    $preg2 = $fverval['p2'];
                    $preg3 = $fverval['p3'];
                    $preg4 = $fverval['p4'];

                    $preg5 = $fverval['p5'];
                    $preg6 = $fverval['p6'];
                    $preg7 = $fverval['p7'];
                    $preg8 = $fverval['p8'];

                    $preg9 = $fverval['p9'];
                    $preg10 = $fverval['p10'];
                    $preg11 = $fverval['p11'];
                    $preg12 = $fverval['p12'];

                    $preg13 = $fverval['p13'];
                    $preg14 = $fverval['p14'];
                    $preg15 = $fverval['p15'];
                    $preg16 = $fverval['p16'];

                    $preg17 = $fverval['p17'];
                    $preg18 = $fverval['p18'];
                    $preg19 = $fverval['p19'];
                    $preg20 = $fverval['p20'];

                    $preg21 = $fverval['p21'];
                    $preg22 = $fverval['p22'];
                    $preg23 = $fverval['p23'];
                    $preg24 = $fverval['p24'];

                    $preg25 = $fverval['p25'];
                    $preg26 = $fverval['p26'];
                    $preg27 = $fverval['p27'];
                    $preg28 = $fverval['p28'];

                    $preg29 = $fverval['p29'];
                    $preg30 = $fverval['p30'];
                    $preg31 = $fverval['p31'];
                    $preg32 = $fverval['p32'];

                    $preg33 = $fverval['p33'];
                    $preg34 = $fverval['p34'];
                    $preg35 = $fverval['p35'];
                    $preg36 = $fverval['p36'];

                    $preg37 = $fverval['p37'];
                    $preg38 = $fverval['p38'];
                    $preg39 = $fverval['p39'];
                    $preg40 = $fverval['p40'];

                    $preg41 = $fverval['p41'];
                    $preg42 = $fverval['p42'];
                    $preg43 = $fverval['p43'];
                    $preg44 = $fverval['p44'];

                    $preg45 = $fverval['p45'];
                    $preg46 = $fverval['p46'];
                    $preg47 = $fverval['p47'];
                    $preg48 = $fverval['p48'];

                    $preg49 = $fverval['p49'];
                    $preg50 = $fverval['p50'];
                    $preg51 = $fverval['p51'];
                    $preg52 = $fverval['p52'];

                    $sumvalres1 = $preg1 + $preg2 + $preg3 + $preg4;
                    array_push($arraytotalxcategoria, $sumvalres1);

                    $sumvalres2 = $preg5 + $preg6 + $preg7 + $preg8;
                    array_push($arraytotalxcategoria, $sumvalres2);

                    $sumvalres3 = $preg9 + $preg10 + $preg11 + $preg12;
                    array_push($arraytotalxcategoria, $sumvalres3);

                    $sumvalres4 = $preg13 + $preg14 + $preg15 + $preg16;
                    array_push($arraytotalxcategoria, $sumvalres4);

                    $sumvalres5 = $preg17 + $preg18 + $preg19 + $preg20;
                    array_push($arraytotalxcategoria, $sumvalres5);

                    $sumvalres6 = $preg21 + $preg22 + $preg23 + $preg24;
                    array_push($arraytotalxcategoria, $sumvalres6);

                    $sumvalres7 = $preg25 + $preg26 + $preg27 + $preg28;
                    array_push($arraytotalxcategoria, $sumvalres7);

                    $sumvalres8 = $preg29 + $preg30 + $preg31 + $preg32;
                    array_push($arraytotalxcategoria, $sumvalres8);

                    $sumvalres9 = $preg33 + $preg34 + $preg35 + $preg36;
                    array_push($arraytotalxcategoria, $sumvalres9);

                    $sumvalres10 = $preg37 + $preg38 + $preg39 + $preg40;
                    array_push($arraytotalxcategoria, $sumvalres10);

                    $sumvalres11 = $preg41 + $preg42 + $preg43 + $preg44;
                    array_push($arraytotalxcategoria, $sumvalres11);

                    $sumvalres12 = $preg45 + $preg46 + $preg47 + $preg48;
                    array_push($arraytotalxcategoria, $sumvalres12);

                    $sumvalres13 = $preg49 + $preg50 + $preg51 + $preg52;
                    array_push($arraytotalxcategoria, $sumvalres13);

                    $aux = 1;
                    $aux2 = 5;
                    $question='p';
                    $count = 0;
                    $auxsump = 0;
                    $sumprgs = 0;
                        $aa = 1;
                        $a = 1;
                        $bb = 4;
                        $b = 2;
                        $bbb = 5;
                        $c = 3;
                        $cc = 6;
                        $d = 4;
                        $dd = 7;
                        $auxarray = -1;
                        $array = array();

                        while ($aa <= 13) {
                          $auxarray = $auxarray + 1;
                            $auxsump =   $auxsump + 1;
                            $sentenciar5=" SELECT * FROM categoria_instrumento WHERE id='$aa'";
                            $resultr5 = $mysqli->query($sentenciar5);
                            $rowr5=$resultr5->fetch_assoc();
                            // echo $aa;

                            $sentenciar=" SELECT * FROM preguntas_instrumento WHERE id='$a'";
                            $resultr = $mysqli->query($sentenciar);
                            $rowr=$resultr->fetch_assoc();
                            // echo $a;
                            $sentenciar1=" SELECT * FROM preguntas_instrumento WHERE id='$b'";
                            $resultr1 = $mysqli->query($sentenciar1);
                            $rowr1=$resultr1->fetch_assoc();
                            // echo $b;
                            $sentenciar2=" SELECT * FROM preguntas_instrumento WHERE id='$c'";
                            $resultr2 = $mysqli->query($sentenciar2);
                            $rowr2=$resultr2->fetch_assoc();
                            //
                            $sentenciar3=" SELECT * FROM preguntas_instrumento WHERE id='$d'";
                            $resultr3 = $mysqli->query($sentenciar3);
                            $rowr3=$resultr3->fetch_assoc();
                            // echo $d;

                            $sentenciar4=" SELECT * FROM instrumento WHERE id = '$idinstrumento'"; //cambiar a tabla d einstrumento_valores para obtener valor correcto
                            $resultr4 = $mysqli->query($sentenciar4);
                            $rowr4=$resultr4->fetch_assoc();

                               $arp=$question.$a;
                               $arp1=$question.$b;
                               $arp2=$question.$c;
                               $arp3=$question.$d;

                              $resp1 = '1'.$rowr4[$arp];
                              // echo $resp1;
                              $resp2 = '2'.$rowr4[$arp1];
                              // echo $resp2;
                              $resp3 = '3'.$rowr4[$arp2];
                              // echo $resp3;
                              $resp4 = '4'.$rowr4[$arp3];
                              // echo $resp4;
                              $sentenciar4a=" SELECT * FROM instrumento_valores WHERE id_instrumento = '$arp'";
                              $resultr4a = $mysqli->query($sentenciar4a);
                              $rowr4a=$resultr4a->fetch_assoc();
                              echo $rowr4a;

                              $sentenciar4b=" SELECT * FROM instrumento_valores WHERE id_instrumento = '$arp1'";
                              $resultr4b = $mysqli->query($sentenciar4b);
                              $rowr4b=$resultr4b->fetch_assoc();
                              echo $rowr4b;

                              $sentenciar4c=" SELECT * FROM instrumento_valores WHERE id_instrumento = '$arp2'";
                              $resultr4c = $mysqli->query($sentenciar4c);
                              $rowr4c=$resultr4c->fetch_assoc();
                              echo $rowr4c;

                              $sentenciar4d=" SELECT * FROM instrumento_valores WHERE id_instrumento = '$arp3'";
                              $resultr4d = $mysqli->query($sentenciar4d);
                              $rowr4d=$resultr4d->fetch_assoc();
                              $rowr4d;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


                          echo "<tr >";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' rowspan='4'>"; echo $rowr5['nombre_categoria']; echo "</td>";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' colspan=''>";  echo $a;  echo "</td>";
                          echo "<td style='border: 3px solid #97897D; font-size: 10px;' colspan='' >"; echo $rowr['pregunta']; echo "</td>";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' colspan=''>"; echo $rowr4[$arp];  echo "</td>";
                          echo "<td style='border: 3px solid #97897D; text-align:center; font-size: 10px;' rowspan='4'>"; echo "<h1>  $arraytotalxcategoria[$auxarray]</h1>"; echo "</td>";
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
                        // echo $array;
                        // print_r($array);


                        ?>
                </tbody>
            </table>
            </div>





                      <!-- <div >
                          <table>
                            <thead>
                                <tr>
                                  <th class="resultado-instrumento-uno"><br>RESUILTADO DE LA EVALUACIÓN <br></th>
                                </tr>

                                <tr>

                                <?php
                                        echo "<th class='resultado-instrumento-dos'>"; echo "ADAPTABILIDAD: ".$adaptabilidad=$row['adaptabilidad']; echo "</th>";

                                        echo "<th class='resultado-instrumento-tres'>"; echo "TOTAL DE PUNTOS: ";echo $resultado_instrumento=$row['total_instrumento']; echo "</th>";




                                      ?>

                                </tr>
                            </thead>
                          </table>
                      </div> -->




                      <div id="solicitud">

<div id="cabecera">
    <div class="row alert div-title">
      <h3 style="text-align:center">RESUILTADO DE LA EVALUACIÓN</h3>
    </div>
</div>

<div>
  <table class="table table-bordered" width="100%" border="1" cellpadding="0" cellspacing="0" >

    <tbody>
      <tr>
        <th style="text-align:left;">ADAPTABILIDAD:</th>
        <td style="text-align:left; background-color: #fff;"><?php echo $adaptabilidad=$row['adaptabilidad']; ?></td>
      </tr>

      <tr>
        <th style="text-align:left;">TOTAL DE PUNTOS:</th>
        <td style="text-align:left; background-color: #fff;"><?php echo $resultado_instrumento=$row['total_instrumento']; ?></td>
      </tr>

      <tr>
        <th style="text-align:left;">DESCRIPCIÓN DEL RESULTADO:</th>
        <?php

        if ($adaptabilidad === 'ALTA'){
          echo '<td style="text-align:left; background-color: #fff;">
          La P.P. o S.P. cuenta con destrezas sociales, habilidades de autonomía, conductas y un estado emocional que propician responder adecuadamente a las demandas y necesidades propias y del medio por lo que su acoplamiento a los lineamientos y/o beneficios del Programa resulta propicia.
          </td>';
        } else if ($adaptabilidad === 'MEDIA'){
          echo '<td style="text-align:left; background-color: #fff;">
          La P.P. o S.P. cuenta con rasgos o circunstancias favorables para su acoplamiento a los lineamientos y/o beneficios del Programa, sin embargo, presenta alteraciones en cuanto a su estado anímico, social, laboral o familiar y/o es sujeto primo delincuente u ocasional considerado como víctima voluntaria por lo que requiere acciones de atención de carácter primario.
          </td>';
        } else if ($adaptabilidad === 'BAJA'){
          echo '<td style="text-align:left; background-color: #fff;">
          La P.P. o S.P. presenta deterioro en su salud física y/o mental, rasgos inestables de su personalidad, factores sociales, familiares o laborales y /o es considerado como reincidente habitual o potencial; circunstancias que le dificultan adecuarse a la a los lineamientos y/o beneficios del Programa, por lo que requiere acciones de atención de carácter secundario en cuanto a su estado anímico.
          </td>';
        }else {
          echo '<td style="text-align:left; background-color: #fff;">
          Debido al estado de salud y/o emocional y/o trastornos y/o rasgos de personalidad de la S.P. o P.P. causa discrepancia en las pautas comportamentales consideradas normales, máxime que posee factores familiares, sociales o laborales que promueven la trasgresión o desafío de la normatividad; por lo que tiende a adoptar posiciones que podrían perjudicar su salud, la convivencia con otros individuos así como el cumplimiento de los lineamientos y/o beneficios del Programa.
          </td>';
        }

        ?>

      </tr>

    </tbody>
  </table>
</div>

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

                        <!-- <div>
                          <table>
                            <thead>
                                <tr>
                                  <th class="resultado-instrumento-uno"><br>RESUILTADO DE LA EVALUACIÓN <br></th>
                                </tr>

                                <tr>

                                    <?php
                                        echo "<th class='resultado-instrumento-dos'>"; echo "ADAPTABILIDAD: ".$adaptabilidad=$row['adaptabilidad']; echo "</th>";

                                        echo "<th class='resultado-instrumento-tres'>"; echo "TOTAL DE PUNTOS: ";echo $resultado_instrumento=$row['total_instrumento']; echo "</th>";

                                      if ($resultado_instrumento <= 9) {
                                        echo "<th class='resultado-instrumento-dos'>"; echo $adaptabilidad=$row['adaptabilidad']; echo "</th>";
                                        echo "<th class='resultado-instrumento-dos'>"; echo $resultado_instrumento=$row['total_instrumento']; echo "</th>";
                                        }

                                      else if ($resultado_instrumento >= 10 && $resultado_instrumento <= 19) {
                                        echo "<th class='resultado-instrumento-dos'>"; echo $adaptabilidad=$row['adaptabilidad']; echo "</th>";
                                        echo "<th class='resultado-instrumento-dos'>"; echo $resultado_instrumento=$row['total_instrumento']; echo "</th>";
                                        }

                                      else if ($resultado_instrumento >= 20 && $resultado_instrumento <= 29) {
                                        echo "<th class='resultado-instrumento-dos'>"; echo $adaptabilidad=$row['adaptabilidad']; echo "</th>";
                                        echo "<th class='resultado-instrumento-dos'>"; echo $resultado_instrumento=$row['total_instrumento']; echo "</th>";
                                        }

                                      else if ($resultado_instrumento >= 30 && $resultado_instrumento <= 39) {
                                        echo "<th class='resultado-instrumento-dos'>"; echo $adaptabilidad=$row['adaptabilidad']; echo "</th>";
                                        echo "<th class='resultado-instrumento-dos'>"; echo $resultado_instrumento=$row['total_instrumento']; echo "</th>";
                                        }


                                      ?>

                                </tr>
                            </thead>
                          </table>
                      </div> -->


<div class="contenedor">
<a href="../subdireccion_de_analisis_de_riesgo/instrumentos_registrados.php" class="btn-flotante">REGRESAR</a>
</div>

<div class="contenedor">
  <a class="btn-flotante-imprimir-asistencia" style="text-align:center;" href="javascript:imprimirSeleccion('form')"><img src='../image/asistencias_medicas/print.png' width='60' height='60'></a>
</div>



</body>
</html>

<script language="Javascript">
function imprimirSeleccion(nombre) {
var ficha = document.getElementById(nombre);
var ventimp = window.open(' ', 'popimpr');
ventimp.document.write( ficha.innerHTML );
ventimp.document.close();
ventimp.print( );
ventimp.close();
}
</script>