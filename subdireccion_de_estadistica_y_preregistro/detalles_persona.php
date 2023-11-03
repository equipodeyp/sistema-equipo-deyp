<?php
// error_reporting(0);
include("conexion.php");
session_start ();
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();

$query = "SELECT id_estado, estado FROM t_estado ORDER BY id_estado";
$resultado23=$mysqli->query($query);

$query1 = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
$resultado1=$mysqli->query($query1);

$fol_exp = $_GET['folio'];
// echo $fol_exp;
$_SESSION['idfolioexp'] = $fol_exp;
$fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();
$name_folio=$rowfol['folioexpediente'];
// echo $name_folio;
$identificador = $rowfol['identificador'];
$_SESSION['idpersona'] = $identificador;
// echo $identificador;
$id_person=$rowfol['id'];
$foto=$rowfol['foto'];
$valid1 = "SELECT * FROM validar_persona WHERE folioexpediente = '$name_folio'";
$res_val1=$mysqli->query($valid1);
$fil_val1 = $res_val1->fetch_assoc();
$validacion1 = $fil_val1['id_persona'];
// consulta de los datos de la autoridad
$aut = "SELECT * FROM autoridad WHERE id_persona = '$id_person'";
$resultadoaut = $mysqli->query($aut);
$rowaut = $resultadoaut->fetch_array(MYSQLI_ASSOC);
// consulta de los datos de origen del SUJETO
$origen = "SELECT * FROM datosorigen WHERE id = '$id_person'";
$resultadoorigen = $mysqli->query($origen);
$roworigen = $resultadoorigen->fetch_array(MYSQLI_ASSOC);
$nameestadonac=$roworigen['lugardenacimiento'];
// datos del TUTOR
$tutor = "SELECT * FROM tutor WHERE id_persona = '$id_person'";
$resultadotutor = $mysqli->query($tutor);
$rowtutor = $resultadotutor->fetch_array(MYSQLI_ASSOC);
// datos del proceso penal
$process = "SELECT * FROM procesopenal WHERE id_persona = '$id_person'";
$resultadoprocess = $mysqli->query($process);
$rowprocess = $resultadoprocess->fetch_array(MYSQLI_ASSOC);
// datos de la valoracion juridica
$valjur = "SELECT * FROM valoracionjuridica WHERE id_persona = '$id_person'";
$resultadovaljur = $mysqli->query($valjur);
$rowvaljur = $resultadovaljur->fetch_array(MYSQLI_ASSOC);
// datos de la determinacion de la incorporacion
$detinc = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_person'";
$resultadodetinc = $mysqli->query($detinc);
$rowdetinc = $resultadodetinc->fetch_array(MYSQLI_ASSOC);
//consulta de los datos de origen de la persona
$domicilio = "SELECT * FROM domiciliopersona WHERE id_persona = '$id_person'";
$resultadodomicilio = $mysqli->query($domicilio);
$rowdomicilio = $resultadodomicilio->fetch_array(MYSQLI_ASSOC);
// consulta del estatus del expediente
$statusexp = "SELECT * FROM statusseguimiento WHERE id_persona = '$id_person'";
$resultadostatusexp = $mysqli->query($statusexp);
$rowstatusexp = $resultadostatusexp->fetch_array(MYSQLI_ASSOC);

$exprel1 = "SELECT * FROM relacion_suj_exp WHERE id_usuario = '$id_person'";
$rexprel1 = $mysqli->query($exprel1);
$fexprel1 = $rexprel1->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- barra de navegacion -->
  <link rel="stylesheet" href="../css/breadcrumb.css">
  <link rel="stylesheet" href="../css/expediente.css">
  <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../css/cli.css">
  <link rel="stylesheet" href="../css/main2.css">
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
  <style media="screen">
  h1 {
          color: yellow;
      }

      /* toggle in label designing */
      .toggle {
          position : relative ;
          display : inline-block;
          width : 70px;
          height : 25px;
          background-color: red;
          border-radius: 30px;
          border: 1px solid #FFFFFF;
      }

      /* After slide changes */
      .toggle:after {
          content: '';
          position: absolute;
          width: 31px;
          height: 25px;
          border-radius: 50%;
          background-color: #999999;
          top: -1px;
          left: 0px;
          transition:  all 0.5s;
      }

      /* Toggle text */
      /* p {
          font-family: Arial, Helvetica, sans-serif;
          font-weight: bold;
      } */

      /* Checkbox checked effect */
      .checkbox:checked + .toggle::after {
          left : 43px;
      }

      /* Checkbox checked toggle label bg color */
      .checkbox:checked + .toggle {
          background-color: #229954;
      }

      /* Checkbox vanished */
      .checkbox {
          display : none;
      }

      /*  */


          /* toggle in label designing */
          .toggle2 {
              position : relative ;
              display : inline-block;
              width : 70px;
              height : 25px;
              background-color: red;
              border-radius: 30px;
              border: 1px solid #FFFFFF;
          }

          /* After slide changes */
          .toggle2:after {
              content: '';
              position: absolute;
              width: 31px;
              height: 25px;
              border-radius: 50%;
              background-color: #999999;
              top: -1px;
              left: 0px;
              transition:  all 0.5s;
          }

          /* Toggle text */
          /* p {
              font-family: Arial, Helvetica, sans-serif;
              font-weight: bold;
          } */

          /* Checkbox checked effect */
          .checkbox2:checked + .toggle2::after {
              left : 43px;
          }

          /* Checkbox checked toggle label bg color */
          .checkbox2:checked + .toggle2 {
              background-color: #229954;
          }

          /* Checkbox vanished */
          .checkbox2 {
              display : none;
          }
  </style>
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
				   	<a style="text-align:center" class='user-nombre' href='create_ticket.php?folio=<?php echo $rowfol['folioexpediente']; ?>'><button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
            <a style="text-align:center" class='user-nombre' href='repo.php?folio=<?php echo $rowfol['folioexpediente']; ?>'><button type='button' class='btn btn-light'>REPOSITORIO <br> PERSONA</button> </a>
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
    			<li><a href="#" class="active" onclick="location.href='detalles_persona.php?folio=<?php echo $fol_exp;?>';"><span class="far fa-address-card"></span><span class="tab-text">DATOS PERSONALES</span></a></li>
    			<li><a href="#" onclick="location.href='detalles_medidas.php?folio=<?php echo $fol_exp;?>';"><span class="fas fa-book-open"></span><span class="tab-text">MEDIDAS</span></a></li>
    			<!-- <li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO</span></a></li> -->
          <!-- <li onclick="location.href='detalles_medidas.php';" class="fas fa-book-open tab-text"><span class="fas fa-book-open"></span><span class="tab-text">MEDIDAS</span></a></li> -->
    		</ul>

    		<div class="secciones">
    			<article id="tab1">
          <div class="secciones form-horizontal sticky breadcrumb flat">
          <a href="../subdireccion_de_estadistica_y_preregistro/menu.php">REGISTROS</a>
          <a href="../subdireccion_de_estadistica_y_preregistro/detalles_expediente.php?id=<?=$name_folio?>">EXPEDIENTE</a>
          <a class="actived">PERSONA</a>
        </div>
    				<div class="container">
              <form class="container well form-horizontal" action="actualizar_persona.php?folio=<?php echo $id_person; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                      <?php
                      $fol2=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
                      $resultfol2 = $mysqli->query($fol2);
                      $rowfol2=$resultfol2->fetch_assoc();
                      $name_folio=$rowfol2['folioexpediente'];
                      $id_person=$rowfol2['id'];
                      $idunico= $rowfol2['identificador'];
                      $valid = "SELECT * FROM validar_persona WHERE id_persona = '$id_person'";
                      $res_val=$mysqli->query($valid);
                      $fil_val = $res_val->fetch_assoc();
                      $validacion = $fil_val['validacion'];

                        if ($validacion == 'true') {
                          echo "<div class='columns download'>
                                  <p>
                                  <img src='../image/true4.jpg' width='50' height='50' class='center'>
                                  <h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>PERSONA VALIDADA</FONT></h3>

                                  </p>
                          </div>";
                        }
                //         ?>
                <div class="row" id="expedientes_relacionales">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert div-title">
                    <h3 style="text-align:center">RELACION CON OTRO(S) EXPEDIENTE(S) DE LA PERSONA PROPUESTA</h3>
                  </div>
                  <div class="col-md-12 mb-3 validar">

                    <!-- <label for="">RELACION CON OTRO(S) EXPEDIENTE(S)</label> -->

                        <?php
                        $rowfol2['relacional'];
                        $nombrep = $rowfol2['nombrepersona'];
                        $apaterno = $rowfol2['paternopersona'];
                        $amaterno =  $rowfol2['maternopersona'];
                        $nombrecompleto = $nombrep .' '. $apaterno .' '. $amaterno;
                        $cl = "SELECT COUNT(*) as t FROM datospersonales WHERE nombrepersona = '$nombrep' AND paternopersona = '$apaterno'
                                                                   AND maternopersona = '$amaterno' AND relacional = 'SI'";
                        $rcl = $mysqli->query($cl);
                        $fcl = $rcl->fetch_assoc();
                        echo '  <div class="col-md-6 mb-3 validar" style="display:none">
                                <label for="SIGLAS DE LA UNIDAD">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
                                <input class="form-control" id="ifrelacionalsuj" name="NUM_EXPEDIENTE" placeholder="" type="text" value="'.$fcl['t'].'" maxlength="50" readonly>
                          </div>';
                        if ($fcl['t'] > 0) {
                          // echo "si";
                          echo "<h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>PERSONA RELACIONADA CON OTRO(S) EXPEDIENTE(S)</FONT></h3>";
                          $ifrelacion1 = "SELECT * FROM relacion_suj_exp WHERE folioexpediente = '$name_folio' OR espedienterelacional = '$name_folio'";
                          $rifrelacion1 = $mysqli->query($ifrelacion1);
                          while ($fifrelacion1 = $rifrelacion1->fetch_assoc()) {
                            // code...
                            if ($fifrelacion1['espedienterelacional'] === $name_folio) {
                              // echo $fifrelacion1['folioexpediente'].'++++';
                              echo '<button style="width:250px" class="btn btn-danger" style="" disabled><b>'.$fifrelacion1['folioexpediente'].'</b></button> &nbsp &nbsp';
                            }else {
                              // echo $fifrelacion1['espedienterelacional'].'++++';
                              echo '<button style="width:250px" class="btn btn-danger" style="" disabled><b>'.$fifrelacion1['espedienterelacional'].'</b></button> &nbsp &nbsp';
                            }
                          }
                        }else {
                          echo "<h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>PERSONA NO RELACIONADA CON OTRO(S) EXPEDIENTE(S)</FONT></h3>";
                        }
                        ?>
                  </div>
                </div>
                <div class="alert div-title">
                  <h3 style="text-align:center">INFORMACIÓN GENERAL DEL EXPEDIENTE DE PROTECCIÓN</h3>
                </div>
                <div class="col-md-6 mb-3 validar">
                      <label for="SIGLAS DE LA UNIDAD">FOLIO DEL EXPEDIENTE DE PROTECCIÓN<span ></span></label>
                      <input class="form-control" id="NUM_EXPEDIENTE" name="NUM_EXPEDIENTE" placeholder="" type="text" value="<?php echo $rowfol['folioexpediente'];?>" maxlength="50" disabled>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="SIGLAS DE LA UNIDAD">ID PERSONA<span ></span></label>
                  <input class="form-control" id="ID_UNICO" name="ID_UNICO" placeholder="" type="text" value="<?php echo $rowfol['identificador']; ?>" maxlength="50" disabled>
                </div>
                <div class="col-md-6 mb-3 validar">
                  <label for="FECHA_CAPTURA" >FECHA DE REGISTRO DE LA PERSONA PROPUESTA<span class="required"></span></label>
                  <input class="form-control" id="FECHA_CAPTURA" name="FECHA_CAPTURA" placeholder="" type="text" value="<?php echo $rowfol['fecha_captura'];?>" disabled>
                </div>

                </div>
                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert div-title">
                    <h3 style="text-align:center">DETERMINACIÓN DE LA INCORPORACIÓN</h3>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="ANALISIS_MULTIDISCIPLINARIO">ANÁLISIS MULTIDISCIPLINARIO</label>
                    <select id="ANALISIS_MULTIDISCIPLINARIO" class="form-select form-select-lg" name="ANALISIS_MULTIDISCIPLINARIO">
                      <option style="visibility: hidden" id="opt-analisis-multidisiplinario" value="<?php echo $rowdetinc['multidisciplinario']; ?>"><?php echo $rowdetinc['multidisciplinario']; ?></option>
                      <?php
                      $multidisciplinario = "SELECT * FROM multidisciplinario";
                      $answermultidisciplinario = $mysqli->query($multidisciplinario);
                      while($multidisciplinarios = $answermultidisciplinario->fetch_assoc()){
                        echo "<option value='".$multidisciplinarios['nombre']."'>".$multidisciplinarios['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_INCORPORACION" for="INCORPORACION">PROCEDENCIA DE LA INCORPORACIÓN<span class="required"></span></label>
                    <select id="INPUT_INCORPORACION" class="form-select form-select-lg"  name="INCORPORACION" >
                      <option style="visibility: hidden" value="<?php echo $rowdetinc['incorporacion']; ?>"><?php echo $rowdetinc['incorporacion']; ?></option>
                      <option value="INCORPORACION PROCEDENTE">INCORPORACION PROCEDENTE</option>
                      <option value="INCORPORACION NO PROCEDENTE">INCORPORACION NO PROCEDENTE</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_FECHA_AUTORIZACION" for="FECHA_AUTORIZACION">FECHA DE AUTORIZACIÓN DEL ANÁLISIS MULTIDISCIPLINARIO<span class="required"></span></label>
                    <input id="FECHA_AUTORIZACION" class="form-control" name="FECHA_AUTORIZACION" placeholder=""  type="date" value="<?php echo $rowdetinc['date_autorizacion']; ?>">
                  </div>
                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_ID_ANALISIS" for="id_analisis">ID DE AUTORIZACION DEL ANALISIS MULTIDISCIPLINARIO</label>
                    <input autocomplete="off" id="id_analisis" class="form-control" type="text" name="id_analisis" value="<?php echo $rowdetinc['id_analisis']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_CONVENIO_ENTENDIMIENTO" for="CONVENIO_ENTENDIMIENTO">CONVENIO DE ENTENDIMIENTO<span class="required"></span></label>
                    <select id="CONVENIO_ENTENDIMIENTO" class="form-select form-select-lg" name="CONVENIO_ENTENDIMIENTO" >
                      <option style="visibility: hidden" id="opt-convenio-de-entendimiento" value="<?php echo $rowdetinc['convenio']; ?>"><?php echo $rowdetinc['convenio']; ?></option>
                      <?php
                      $convenioo = "SELECT * FROM convenio";
                      $answerconvenioo = $mysqli->query($convenioo);
                      while($convenioos = $answerconvenioo->fetch_assoc()){
                        echo "<option value='".$convenioos['nombre']."'>".$convenioos['nombre']."</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_FECHA_FIRMA" for="FECHA_CONVENIO_ENTENDIMIENTO">FECHA DE LA FIRMA DEL CONVENIO DE ENTENDIMIENTO<span class="required"></span></label>
                    <input id="FECHA_CONVENIO_ENTENDIMIENTO_DOS" class="form-control" name="FECHA_CONVENIO_ENTENDIMIENTO" placeholder="" value="<?php echo $rowdetinc['date_convenio']; ?>" type="date" value="" >
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_FECHA_INICIO" for="fecha_inicio">FECHA DE INICIO DEL CONVENIO DE ENTENDIMIENTO</label>
                    <input id="fecha_inicio" class="form-control" type="date" name="fecha_inicio" value="<?php echo $rowdetinc['fecha_inicio']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_VIGENCIA" for="VIGENCIA_CONVENIO">VIGENCIA DEL CONVENIO<span class="required"></span></label>
                    <input autocomplete="off" id="VIGENCIA_CONVENIO" placeholder="Cantidad en días" class="form-control" type="text" name="VIGENCIA_CONVENIO" value="<?php echo $rowdetinc['vigencia']; ?>" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_FECHA_TERMINO" for="FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO">FECHA TÉRMINO DEL CONVENIO DE ENTENDIMIENTO<span class="required"></span></label>
                    <input disabled id="FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO" placeholder="" class="form-control" type="text" name="FECHA_DE _TERMINO_DEL_CONVENIO ENTENDIMIENTO" value="<?php echo $rowdetinc['fecha_termino']; ?>">
                  </div>

                  <div class="col-md-6 mb-3 validar">
                    <label id="LABEL_ID_CONVENIO" for="id_convenio">ID DEL CONVENIO DE ENTENDIMIENTO</label>
                    <input autocomplete="off" id="id_convenio" class="form-control" type="text"  name="id_convenio" value="<?php echo $rowdetinc['id_convenio']; ?>">
                  </div>



                </div>

                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert div-title">
                    <h3 style="text-align:center">EVALUACIONES DE SEGUIMIENTO</h3>
                  </div>
                  <div id="contenido">
                    <a href="registrar_evaluacion.php?folio=<?php echo $identificador; ?>"><button style="display: block; margin: 0 auto;" type="button" id="AGREGAR_CONVENIO" class="btn color-btn-success">AGREGAR</button></a>
            		  	<table class="table table-striped table-dark table-bordered">
            		  		<thead class="table-success">
            		  			<th style="text-align:center">No.</th>
                        <th style="text-align:center">ID</th>
                        <th style="text-align:center">ANALISIS MULTIDISCIPLINARIO</th>
                        <th style="text-align:center">DETALLES DEL CONVENIO</th>

            		  		</thead>
                      <?php
                      $cont_med = 0;
            		      $tabla="SELECT * FROM evaluacion_persona WHERE id_unico ='$identificador'";
            		       $var_resultado = $mysqli->query($tabla);
            		      while ($var_fila=$var_resultado->fetch_array())
            		      {
                        $cont_med = $cont_med + 1;
            		        echo "<tr>";
            		          echo "<td style='text-align:center'>"; echo $cont_med; echo "</td>";
                          echo "<td style='text-align:center'>"; echo $var_fila['id_analisis']; echo "</td>";
                          echo "<td style='text-align:center'>"; echo $var_fila['analisis']; echo "</td>";
                          echo "<td style='text-align:center'>  <a href='detalles_convenio_pers.php?id=".$var_fila['id']."'> <button type='button' class='btn color-btn-success-white'>Detalles</button> </a> </td>";

            		      }
            		      ?>
            		  	</table>
            		  </div>
            			<div id="footer">
            		  </div>
                </div>

                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert div-title">
                    <h3 style="text-align:center">ESTATUS DE LA PERSONA DENTRO DEL PROGRAMA</h3>
                  </div>

                  <div class="col-md-4 mb-3 validar">
                    <label for="ESTATUS_PERSONA">ESTATUS DE LA PERSONA<span class="required"></span></label>
                    <select class="form-select form-select-lg" id="ESTATUS_PERSONA" name="ESTATUS_PERSONA" >
                      <option style="visibility: hidden" id="opt-estatus-persona" value="<?php echo $rowfol['estatus']; ?>"><?php echo $rowfol['estatus']; ?></option>
                      <?php
                      $estatus = "SELECT * FROM estatuspersona";
                      $answerestatus = $mysqli->query($estatus);
                      while($estatusperson = $answerestatus->fetch_assoc()){
                        echo "<option value='".$estatusperson['nombre']."'>".$estatusperson['nombre']."</option>";
                      }
                      ?>
                    </select>

                    <input type="text" name="" value="<?php echo $rowfol['relacional']; ?>" style="display:none;" id="statusprogramrelacional">
                    <input type="text" name="" value="<?php echo $rowfol['estatusprograma']; ?>" style="display:none;" id="statusprogram">
                  </div>
                  <div class="col-md-4 mb-3 validar" >
                    <center>
                      <label for="">SUJETO RELACIONADO</label><br>
                      <input type="checkbox" class="checkbox" name="statusprogrampersonarelacional" id="switch" value="1" disabled>
                      <label for="switch" class="toggle">
                        <p>&nbspSI &nbsp&nbsp&nbsp&nbsp NO</p>
                      </label>
                    </center>
                  </div>
                  <div class="col-md-4 mb-3 validar" >
                    <center>
                      <label for="">ACTIVO</label><br>
                      <input type="checkbox" class="checkbox2" name="statusprogrampersona" id="switch2" value="1">
                      <label for="switch2" class="toggle2">
                        <p>&nbspSI &nbsp&nbsp&nbsp&nbsp NO</p>
                      </label>
                    </center>
                  </div>

                  <div class="col-md-6 mb-3 validar" div="DIV_CONCLUSION">
                    <label id="LABEL_CONCLUSION_CANCELACION_EXP" for="CONCLUSION_CANCELACION">CONCLUSIÓN / CANCELACIÓN</label>
                    <select id="CONCLUSION_CANCELACION_EXP" class="form-select form-select-lg" name="CONCLUSION_CANCELACION_EXP" >
                      <option style="visibility: hidden" id="opt-conclusion-cancelacion" value="<?php echo $rowdetinc['conclu_cancel']; ?>"><?php echo $rowdetinc['conclu_cancel']; ?></option>
                      <option value="CANCELACION">CANCELACION</option>
                      <option value="CONCLUSION">CONCLUSION</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3 validar" id="DIV_FECHA_CONCLUSION">
                    <label id="LABEL_FECHA_CONCLUSION" for="FECHA_DESINCORPORACION" >FECHA DE CONCLUSIÓN<span class="required"></span></label>
                    <label id="LABEL_FECHA_CANCELACION" for="FECHA_DESINCORPORACION">FECHA DE CANCELACIÓN<span class="required"></span></label>
                    <input id="FECHA_DESINCORPORACION_UNO" class="form-control"  name="FECHA_DESINCORPORACION" placeholder=""  type="date" value="<?php echo $rowdetinc['date_desincorporacion']; ?>">
                  </div>

                  <!-- <?php
                  $detinc = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_person'";
                  $resultadodetinc = $mysqli->query($detinc);
                  $rowdetinc = $resultadodetinc->fetch_array(MYSQLI_ASSOC);
                  if ($rowdetinc['conclu_cancel'] == 'CONCLUSION') {
                    echo '<div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35">
                      <label for="CONCLUSION">CONCLUSION ARTICULO 35</label>
                      <select class="form-select form-select-lg" id="CONCLUSION_ART35z" name="CONCLUSION_ART35z">
                        <option style="visibility: hidden" id="opt-conclusion-art35" value="'.$rowdetinc['conclusionart35'].'">'.$rowdetinc['conclusionart35'].'</option>';
                        $art35 = "SELECT * FROM conclusionart35";
                        $answerart35 = $mysqli->query($art35);
                        while($art35s = $answerart35->fetch_assoc()){
                          echo "<option value='".$art35s['nombre']."'>".$art35s['nombre']."</option>";
                        }
                        echo '</select>
                      </div>';

                  }
                  ?> -->

                   <div class="col-md-6 mb-3 validar" id="CONCLUSION_ART35" >
                     <label id="LABEL_CONCLUSION_ART351" for="CONCLUSION">CONCLUSIÓN ARTÍCULO 35</label>
                     <select class="form-select form-select-lg" id="CONCLUSION_ART351" name="CONCLUSION_ART351">
                       <option  value="<?php echo $rowdetinc['conclusionart35']; ?>"><?php echo $rowdetinc['conclusionart35']; ?></option>
                       <?php
                       $art35 = "SELECT * FROM conclusionart35";
                       $answerart35 = $mysqli->query($art35);
                       while($art35s = $answerart35->fetch_assoc()){
                         echo "<option value='".$art35s['nombre']."'>".$art35s['nombre']."</option>";
                       }
                       ?>
                     </select>
                   </div>

                   <?php
                   // $detinc = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_person'";
                   // $resultadodetinc = $mysqli->query($detinc);
                   // $rowdetinc = $resultadodetinc->fetch_array(MYSQLI_ASSOC);
                   // if ($rowdetinc['conclusionart35'] == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
                   //   echo '<div class="col-md-6 mb-3 validar" id="OTHERART35">
                   //     <label for="OTHER_ART35">ESPECIFIQUE</label>
                   //     <input class="form-control" id="OTHER_ART35" name="OTHER_ART35" placeholder="" value="'.$rowdetinc['otroart35'].'" type="text">
                   //   </div>';
                   // }
                    ?>

                    <div class="col-md-6 mb-3 validar" >
                      <label id="LABEL_OTHER_ART351" for="OTHER_ART35">ESPECIFIQUE</label>
                      <input id="OTHER_ART351" class="form-control" name="OTHER_ART351" placeholder="" value="<?php echo $rowdetinc['otroart35']; ?>" type="text">
                    </div>

                </div>

                <div class="row">
                  <div class="row">
                    <hr class="mb-4">
                  </div>
                  <div class="alert div-title">
                    <h3 style="text-align:center">FOTOGRAFÍA DEL SUJETO</h3>
                  </div>
                  <section class="text-center" >

                    <div id="visorArchivo">
                  <!--Aqui se desplegará el fichero-->
                    </div>
                    <?php
                    if ($rowfol['foto']=='') {

                    }else {

                      // echo '<img src ="../imagenesbdd/'.$rowfol['foto'].'" style="width:400px">';
                    }
                    ?>
                    <input id="UPDATE_FILE" class="col-md-offset-3 col-md-7" type="file" name="user_image" accept="image/*" />
                  </section>
                </div>

                <div class="row">
                  <div class="row">

                    <hr class="mb-4">
                  </div>
                  <div class="alert div-title">
                    <h3 style="text-align:center">COMENTARIOS</h3>
                  </div>
                  <div id="contenido" class="">
  									<div class="">
  		  							<table class="table table-striped table-bordered " >
  		  								<thead >

  		  								</thead>
  		  								<?php
  		      						$tabla="SELECT * FROM comentario WHERE folioexpediente ='$name_folio'  AND comentario_mascara = '3' && id_persona = '$id_person'";
  		       						$var_resultado = $mysqli->query($tabla);
  		      						while ($var_fila=$var_resultado->fetch_array())
  		      						{
  		        					echo "<tr>";
  		          				echo "<td>";
                        echo "<ul>
                              <li>

                              <div>
                              <span>
                              usuario:".$var_fila['usuario']."
                              </span>
                              </div>
                              <div>
                              <span>
                                ".$var_fila['comentario']."
                              </span>
                              </div>
                              <div>
                              <span>
                              ".date("d/m/Y", strtotime($var_fila['fecha']))."
                              </span>
                              </div>
                              </li>
                        </ul>";echo "</td>";
  		          				echo "</tr>";

  		      						}
  		      					?>
  		  							</table>
  									</div>
  		  					</div>

                  <textarea name="COMENTARIO" id="COMENTARIO" rows="8" cols="80" placeholder="Escribe tus comentarios" maxlength="10000"></textarea>

                </div>
                <div class="row">
                  <div>
                      <br>
                      <br>
                  		<button style="display: block; margin: 0 auto;" class="btn color-btn-success" id="enter" type="submit">ACTUALIZAR</button>
                  </div>
                </div>
              </form>
            </div>
    			</article>
    			<article id="tab2">
            <div class="container">

        			<div class="well form-horizontal" >
        				<div class="row">
                  <div class="row alert div-title">
                    <h3 style="text-align:center">INFORMACION GENERAL DEL EXPEDIENTE DE PROTECCIÓN</h3>
          				</div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="ID_EXPEDIENTE">ID EXPEDIENTE<span class="required"></span></label>
                    <input class="form-control" id="ID_EXPEDIENTE" name="ID_EXPEDIENTE" placeholder="" required="" type="text" value="<?php echo $rowaut['folioexpediente']; ?>" disabled>
                  </div>

                <div class="col-md-6 mb-3 validar">
                  <label for="NOMRE_SUJETO">NOMBRE DE LA PERSONA<span class="required"></span></label>
                  <input class="form-control" id="NOMRE_SUJETO" name="NOMRE_SUJETO" placeholder="" required="" type="text" value="<?php echo $rowfol['nombrepersona']; ?>" disabled>
                </div>

                <div class="col-md-6 mb-3 validar">
                  <label for="APELLIDO_PATERNO">APELLIDO PATERNO<span class="required"></span></label>
                  <input class="form-control" id="APELLIDO_PATERNO" name="APELLIDO_PATERNO" placeholder="" required="" type="text" value="<?php echo $rowfol['paternopersona']; ?>" disabled>
                </div>

                <div class="col-md-6 mb-3 validar">
                  <label for="APELLIDO_MATERNO">APELLIDO MATERNO<span class="required"></span></label>
                  <input class="form-control" id="APELLIDO_MATERNO" name="APELLIDO_MATERNO" placeholder="" required="" type="text" value="<?php echo $rowfol['maternopersona']; ?>" disabled>
                </div>

                <div class="col-md-6 mb-3 validar">
                  <label for="CALIDAD_DEL_SUJETO">CALIDAD PERSONA DENTRO DEL PROGRAMA<span class="required"></span></label>
                  <select class="form-control" id="CALIDAD_DEL_SUJETO" name="CALIDAD_DEL_SUJETO" disabled>
                    <option value=""><?php echo $rowfol['calidadpersona']; ?></option>
                    <?php
                    $select = "SELECT * FROM calidadpersona";
                    $answer = $mysqli->query($select);
                    while($valores = $answer->fetch_assoc()){
                     echo "<option value='".$valores['id']."'>".$valores['nombre']."</option>";
                   }
                   ?>
                  </select>
                </div>
        			</div>
              </div>
        		</div>
            <div class="container ">
        			<div class="well form-horizontal">
        		  <div id="cabecera">
        				<div class="row alert div-title">
        					<h3 style="text-align:center">MEDIDAS</h3>
        				</div>
        		  </div>

        		  <div id="contenido">
        		  	<table class="table table-striped table-bordered ">
        		  		<thead >
        		  			<th style="text-align:center">No.</th>
                    <th style="text-align:center">FOLIO</th>
                    <th style="text-align:center">TIPO DE MEDIDA</th>
                    <th style="text-align:center">CLASIFICACIÓN DE LA MEDIDA</th>
                    <th style="text-align:center">ESTATUS</th>
                    <th style="text-align:center">MUNICIPIO</th>
                    <th style="text-align:center">FECHA DE EJECUCIÓN</th>
                    <th style="text-align:center">VALIDACIÓN</th>
        		  			<th style="text-align:center"><a href="registrar_medida.php?folio=<?php echo $fol_exp; ?>"> <button type="button" id="NUEVA_MEDIDA" class="btn btn-info">NUEVA MEDIDA</button> </a> </th>
        		  		</thead>
        		  		<?php
                  $cont_med = 0;
        		      $tabla="SELECT * FROM medidas WHERE id_persona ='$fol_exp'";
                  $var_resultado = $mysqli->query($tabla);

                  $folioExp=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
                  $resultfol = $mysqli->query($fol);
                  $rowfol=$resultfol->fetch_assoc();
                  $idUnicoPersona = $rowfol['identificador'];

        		      while ($var_fila=$var_resultado->fetch_array())
        		      {

                    $id_medida = $var_fila['id'];
                    $cont_med = $cont_med + 1;
                    $val_meds = "SELECT * FROM validar_medida WHERE folioexpediente = '$name_folio' AND id_persona = '$id_person' AND id_medida = '$id_medida'";
                    $res_valmeds = $mysqli->query($val_meds);
                    while ($fila_valmeds = $res_valmeds->fetch_array()){
                      echo "<tr>";
          		          echo "<td style='text-align:center'>"; echo $cont_med; echo "</td>";
                        echo "<td style='text-align:center'>"; echo $idUnicoPersona.'-M0'.$cont_med; echo "</td>";
          		          echo "<td style='text-align:center'>"; echo $var_fila['tipo']; echo "</td>";
          		          echo "<td style='text-align:center'>"; echo $var_fila['clasificacion']; echo "</td>";
          		          echo "<td style='text-align:center'>"; echo $var_fila['estatus']; echo "</td>";
          		          echo "<td style='text-align:center'>"; echo $var_fila['ejecucion']; echo "</td>";
          		          echo "<td style='text-align:center'>"; if ($var_fila['date_ejecucion'] != '0000-00-00') {
                          echo date("d/m/Y", strtotime($var_fila['date_ejecucion']));
                        } echo "</td>";
                        echo "<td style='text-align:center'>"; if ($fila_valmeds['validacion'] === 'true') {
                          echo "<i class='fas fa-check'></i>";
                        }elseif ($fila_valmeds['validacion'] === 'false') {
                          echo "<i class='fas fa-times'></i>";
                        } echo "</td>";
          		          echo "<td>  <a href='detalles_medida.php?id=".$var_fila['id']."'> <button type='button' class='btn btn-success'>Detalle</button> </a> </td>";
          		        echo "</tr>";
                    }

        		      }
        		      ?>
        		  	</table>
        		  </div>
        			<div id="footer">
        		  </div>

        		</div>
        		</div>
    			</article>



    		</div>
    	</div>

  </div>
</div>
<div class="contenedor">
<a href="../subdireccion_de_estadistica_y_preregistro/detalles_expediente.php?id=<?=$name_folio?>" class="btn-flotante">REGRESAR</a>
</div>
<!-- <script type="text/javascript">
var selectAnalisisMulti = document.getElementById('ANALISIS_MULTIDISCIPLINARIO').value;
function ocultarCampos() {
  console.log(selectAnalisisMulti);
  if (selectAnalisisMulti === "" || selectAnalisisMulti === null || selectAnalisisMulti === "EN ELABORACION"){
        document.getElementById('LABEL_INCORPORACION').style.display = "none";
        document.getElementById('INPUT_INCORPORACION').style.display = "none";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "none";
        document.getElementById('FECHA_AUTORIZACION').style.display = "none";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "none";
        document.getElementById('id_analisis').style.display = "none";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
        document.getElementById('id_convenio').style.display = "none";
      }
}
ocultarCampos();
</script> -->
<script type="text/javascript">
var analisisMultidisiplinario = document.getElementById('ANALISIS_MULTIDISCIPLINARIO');
var respuestaAlalisisMultidisiplinario = '';
analisisMultidisiplinario.addEventListener('change', obtenerInfo);
    function obtenerInfo(e) {
      respuestaAlalisisMultidisiplinario = e.target.value;
      console.log(respuestaAlalisisMultidisiplinario);
      if (respuestaAlalisisMultidisiplinario === "ESTUDIO TECNICO DE ANALISIS DE RIESGO") {
        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INPUT_INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('INPUT_INCORPORACION').value = "";
        document.getElementById('FECHA_AUTORIZACION').value = "";
        document.getElementById('id_analisis').value = "";
        document.getElementById('CONVENIO_ENTENDIMIENTO').value = "";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').value = "";
        document.getElementById('fecha_inicio').value = "";
        document.getElementById('VIGENCIA_CONVENIO').value = "";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').value = "";
        document.getElementById('id_convenio').value = "";
      }else if (respuestaAlalisisMultidisiplinario === "ESTUDIO TECNICO DE CONCLUSION" || respuestaAlalisisMultidisiplinario === "ESTUDIO TECNICO DE CANCELACION" || respuestaAlalisisMultidisiplinario === "ACUERDO DE ACUMULACION"){
        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INPUT_INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
        document.getElementById('id_convenio').style.display = "none";
        document.getElementById('INPUT_INCORPORACION').value = "";
        document.getElementById('FECHA_AUTORIZACION').value = "";
        document.getElementById('id_analisis').value = "";
        document.getElementById('CONVENIO_ENTENDIMIENTO').value = "";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').value = "";
        document.getElementById('fecha_inicio').value = "";
        document.getElementById('VIGENCIA_CONVENIO').value = "";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').value = "";
        document.getElementById('id_convenio').value = "";
      }else if (respuestaAlalisisMultidisiplinario === "EN ELABORACION"){
        document.getElementById('LABEL_INCORPORACION').style.display = "none";
        document.getElementById('INPUT_INCORPORACION').style.display = "none";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "none";
        document.getElementById('FECHA_AUTORIZACION').style.display = "none";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "none";
        document.getElementById('id_analisis').style.display = "none";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
        document.getElementById('id_convenio').style.display = "none";
        document.getElementById('INPUT_INCORPORACION').value = "";
        document.getElementById('FECHA_AUTORIZACION').value = "";
        document.getElementById('id_analisis').value = "";
        document.getElementById('CONVENIO_ENTENDIMIENTO').value = "";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').value = "";
        document.getElementById('fecha_inicio').value = "";
        document.getElementById('VIGENCIA_CONVENIO').value = "";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').value = "";
        document.getElementById('id_convenio').value = "";
      }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    var procedenciaincorporacion = document.getElementById('INPUT_INCORPORACION');
    var respuestaprocedenciaincorporacion = '';
    procedenciaincorporacion.addEventListener('change', obtenerIncorporacion);
        function obtenerIncorporacion(e) {
          respuestaprocedenciaincorporacion = e.target.value;
          console.log(respuestaprocedenciaincorporacion);
          if (respuestaprocedenciaincorporacion === "INCORPORACION PROCEDENTE") {
              document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "";
              document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "";
          }else{
              document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
              document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "none";
          }
        }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
var noFormalizado = document.getElementById('CONVENIO_ENTENDIMIENTO');
var respuestaInputNoFormalizado = '';
noFormalizado.addEventListener('change', obtenerInfoNoFormalizado);
    function obtenerInfoNoFormalizado(e) {
      respuestaInputNoFormalizado = e.target.value;
      if (respuestaInputNoFormalizado === "NO FORMALIZADO" || respuestaInputNoFormalizado === "PENDIENTE DE EJECUCION") {
        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INPUT_INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
        document.getElementById('id_convenio').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').value = "";
        document.getElementById('fecha_inicio').value = "";
        document.getElementById('VIGENCIA_CONVENIO').value = "";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').value = ""
        document.getElementById('id_convenio').value = "";
      }
      else {
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "";
        document.getElementById('fecha_inicio').style.display = "";
        document.getElementById('LABEL_VIGENCIA').style.display = "";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "";
        document.getElementById('id_convenio').style.display = "";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').value = "";
        document.getElementById('fecha_inicio').value = "";
        document.getElementById('VIGENCIA_CONVENIO').value = "";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').value = ""
        document.getElementById('id_convenio').value = "";
      }
  }
////////////////////////////////////////////////////////////////////////////////////////////
var analisisM = document.getElementById('ANALISIS_MULTIDISCIPLINARIO').value;
function ocultarAnalisisM() {
  console.log(analisisM);
  if ( analisisM === "EN ELABORACION" ) {
    document.getElementById('LABEL_INCORPORACION').style.display = "none";
    document.getElementById('INPUT_INCORPORACION').style.display = "none";
    document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "none";
    document.getElementById('FECHA_AUTORIZACION').style.display = "none";
    document.getElementById('LABEL_ID_ANALISIS').style.display = "none";
    document.getElementById('id_analisis').style.display = "none";
    document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
    document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "none";
    document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
    document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "none";
    document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
    document.getElementById('fecha_inicio').style.display = "none";
    document.getElementById('LABEL_VIGENCIA').style.display = "none";
    document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
    document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
    document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
    document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
    document.getElementById('id_convenio').style.display = "none";
  }else if (analisisM === "ESTUDIO TECNICO DE ANALISIS DE RIESGO") {
        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INPUT_INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
        document.getElementById('id_convenio').style.display = "none";
      }
      else if (analisisM === "ACUERDO DE CONCLUSION" || analisisM === "ACUERDO DE CANCELACION" || analisisM === "ACUERDO DE ACUMULACIÓN" || analisisM === "ESTUDIO TECNICO DE CONCLUSION" || analisisM === "ESTUDIO TECNICO DE CANCELACION"){

        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INPUT_INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
        document.getElementById('id_convenio').style.display = "none";
      }

    }
ocultarAnalisisM();
/////////////////////////////////////////////////////////////////////////////
var incorporacionproc = document.getElementById('INPUT_INCORPORACION').value;
function ocultarCamposincorporacion() {
  if (incorporacionproc === "INCORPORACION PROCEDENTE"){
    document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "";
    document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "";
  }else {
    document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
    document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "none";
  }
}
ocultarCamposincorporacion();
/////////////////////////////////////////////////////////////////////////////
var noFormalizadoInput = document.getElementById('CONVENIO_ENTENDIMIENTO').value;
function ocultarCamposNoFormalizado() {
  if (noFormalizadoInput === "NO FORMALIZADO" || noFormalizadoInput === "PENDIENTE DE EJECUCION" || noFormalizadoInput === ""){
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "none";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
        document.getElementById('fecha_inicio').style.display = "none";
        document.getElementById('LABEL_VIGENCIA').style.display = "none";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "none";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "none";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
        document.getElementById('id_convenio').style.display = "none";
      }else {
        document.getElementById('LABEL_FECHA_FIRMA').style.display = "";
        document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').style.display = "";
        document.getElementById('LABEL_FECHA_INICIO').style.display = "";
        document.getElementById('fecha_inicio').style.display = "";
        document.getElementById('LABEL_VIGENCIA').style.display = "";
        document.getElementById('VIGENCIA_CONVENIO').style.display = "";
        document.getElementById('LABEL_FECHA_TERMINO').style.display = "";
        document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('LABEL_ID_CONVENIO').style.display = "";
        document.getElementById('id_convenio').style.display = "";
      }
}
ocultarCamposNoFormalizado();
///////////////////////////////////////////////////////////////////////////////////////////////
var analisisMdisabled = document.getElementById('ANALISIS_MULTIDISCIPLINARIO').value;
function ocultarAnalisisMdisabled() {
  // console.log(analisisMdisabled);
  if (analisisMdisabled !== "EN ELABORACION" ) {
      document.getElementById('ANALISIS_MULTIDISCIPLINARIO').disabled = true;
      document.getElementById('INPUT_INCORPORACION').disabled = true;
      document.getElementById('FECHA_AUTORIZACION').disabled = true;
      document.getElementById('id_analisis').disabled = true;
    }
  }
ocultarAnalisisMdisabled();
///////////////////////////////////////////////////////////////////////////////////////////////
var noFormalizadoInputdisabled = document.getElementById('CONVENIO_ENTENDIMIENTO').value;
console.log(noFormalizadoInputdisabled);
function ocultarCamposNoFormalizadodisabled() {
  if (noFormalizadoInputdisabled !== ''){
          document.getElementById('CONVENIO_ENTENDIMIENTO').disabled = true;
          document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').disabled = true;
          document.getElementById('fecha_inicio').disabled = true;
          document.getElementById('VIGENCIA_CONVENIO').disabled = true;
          document.getElementById('id_convenio').disabled = true;
      }
    }
ocultarCamposNoFormalizadodisabled();
</script>
<script type="text/javascript">
var concluNone = document.getElementById('ESTATUS_PERSONA').value;
function ConclusionCancelacion(){
if(concluNone === "" || concluNone === null || concluNone === "PERSONA PROPUESTA" || concluNone === "SUJETO PROTEGIDO"){
      document.getElementById('LABEL_CONCLUSION_CANCELACION_EXP').style.display = "none";
      document.getElementById('CONCLUSION_CANCELACION_EXP').style.display = "none";
      document.getElementById('LABEL_CONCLUSION_ART351').style.display = "none";
      document.getElementById('CONCLUSION_ART351').style.display = "none";
      document.getElementById('LABEL_OTHER_ART351').style.display = "none";
      document.getElementById('OTHER_ART351').style.display = "none";
      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
      document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "none";      }
else if (concluNone === "DESINCORPORADO" || concluNone === "NO INCORPORADO"){
      document.getElementById('LABEL_CONCLUSION_CANCELACION_EXP').style.display = "";
      document.getElementById('CONCLUSION_CANCELACION_EXP').style.display = "";
}
}
ConclusionCancelacion();
</script>

<script type="text/javascript">
var conCa = document.getElementById('ESTATUS_PERSONA');
var estatusPersona = '';
conCa.addEventListener('change', obtenerEstatus);
    function obtenerEstatus(e) {
      estatusPersona = e.target.value;
      if ( estatusPersona === "DESINCORPORADO" || estatusPersona === "NO INCORPORADO" ) {
        document.getElementById('LABEL_CONCLUSION_CANCELACION_EXP').style.display = "";
        document.getElementById('CONCLUSION_CANCELACION_EXP').style.display = "";
      }
      else if ( estatusPersona === "PERSONA PROPUESTA" || estatusPersona === "SUJETO PROTEGIDO" ){
        document.getElementById('LABEL_CONCLUSION_CANCELACION_EXP').style.display = "none";
        document.getElementById('CONCLUSION_CANCELACION_EXP').style.display = "none";
        document.getElementById('LABEL_CONCLUSION_ART351').style.display = "none";
        document.getElementById('CONCLUSION_ART351').style.display = "none";
        document.getElementById('LABEL_OTHER_ART351').style.display = "none";
        document.getElementById('OTHER_ART351').style.display = "none";
        document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
        document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
        document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "none";
        document.getElementById('CONCLUSION_CANCELACION_EXP').value='';
        document.getElementById('CONCLUSION_ART351').value='';
        document.getElementById('OTHER_ART351').value='';
        document.getElementById('FECHA_DESINCORPORACION_UNO').value='';
      }
}
</script>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<script type="text/javascript">
var concluCanceExp = document.getElementById('CONCLUSION_CANCELACION_EXP').value;
function ConclusionCancelacionExp(){
  if (concluCanceExp === "" || concluCanceExp === null){
        document.getElementById('LABEL_CONCLUSION_ART351').style.display = "none";
        document.getElementById('CONCLUSION_ART351').style.display = "none";
        document.getElementById('LABEL_OTHER_ART351').style.display = "none";
        document.getElementById('OTHER_ART351').style.display = "none";
        document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
        document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
        document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "none";
      }
else if (concluCanceExp === "CONCLUSION"){
      document.getElementById('LABEL_CONCLUSION_ART351').style.display = "";
      document.getElementById('CONCLUSION_ART351').style.display = "";
      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
      document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "";
}
else if (concluCanceExp === "CANCELACION"){
      document.getElementById('LABEL_CONCLUSION_ART351').style.display = "none";
      document.getElementById('CONCLUSION_ART351').style.display = "none";
      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "";
      document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "";
}
}
ConclusionCancelacionExp();
</script>

<script type="text/javascript">
var estatusPer = document.getElementById('CONCLUSION_CANCELACION_EXP');
var estatusPersonaSeg;
estatusPer.addEventListener('change', obtenerEstatusSeg);
    function obtenerEstatusSeg(e) {
      estatusPersonaSeg = e.target.value;
      if (estatusPersonaSeg === "CONCLUSION"){
      document.getElementById('LABEL_CONCLUSION_ART351').style.display = "";
      document.getElementById('CONCLUSION_ART351').style.display = "";
      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "none";
      document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "";
      }
      else if (estatusPersonaSeg === "CANCELACION"){
      document.getElementById('LABEL_CONCLUSION_ART351').style.display = "none";
      document.getElementById('CONCLUSION_ART351').style.display = "none";
      document.getElementById('LABEL_FECHA_CONCLUSION').style.display = "none";
      document.getElementById('LABEL_FECHA_CANCELACION').style.display = "";
      document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "";
      document.getElementById('LABEL_OTHER_ART351').style.display = "none";
      document.getElementById('OTHER_ART351').style.display = "none";
      }
}
</script>

<script type="text/javascript">
var concluCanceArt = document.getElementById('CONCLUSION_ART351').value;
function ConclusionCancelacionArt(){
if (concluCanceArt === "" || concluCanceArt === null){
      document.getElementById('LABEL_OTHER_ART351').style.display = "none";
      document.getElementById('OTHER_ART351').style.display = "none";
}
else if (concluCanceArt === "IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO" || concluCanceArt === "OTRO" || concluCanceArt === "VIII. INCUMPLIMIENTO DE LAS OBLIGACIONES"){
      document.getElementById('LABEL_OTHER_ART351').style.display = "";
      document.getElementById('OTHER_ART351').style.display = "";
}
else {
      document.getElementById('LABEL_OTHER_ART351').style.display = "none";
      document.getElementById('OTHER_ART351').style.display = "none";
}
}
ConclusionCancelacionArt();
</script>

<script type="text/javascript">
var conCaArt = document.getElementById('CONCLUSION_ART351');
var conCaArt35 = '';
conCaArt.addEventListener('change', obtenerConCaArt35);
    function obtenerConCaArt35(e) {
      conCaArt35 = e.target.value;
      if (conCaArt35 === "IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO" || conCaArt35 === "OTRO" || conCaArt35 === "VIII. INCUMPLIMIENTO DE LAS OBLIGACIONES"){
        document.getElementById('LABEL_OTHER_ART351').style.display = "";
        document.getElementById('OTHER_ART351').style.display = "";
      }
      else {
        document.getElementById('LABEL_OTHER_ART351').style.display = "none";
        document.getElementById('OTHER_ART351').style.display = "none";
      }
}
</script>

<script type="text/javascript">
var idAnalisis = document.getElementById('id_analisis').value;
function ReadOnlyIdAnalisis() {
  if( !idAnalisis == null || !idAnalisis == "" ){
    document.getElementById('id_analisis').disabled = true;
  }
}
ReadOnlyIdAnalisis();
</script>

<script type="text/javascript">
var fechaVigenciaConvenio = document.getElementById('VIGENCIA_CONVENIO').value;
function ReadOnlyVigenciaconvenio() {
  if( !fechaVigenciaConvenio == null || !fechaVigenciaConvenio == "" ){
    document.getElementById('VIGENCIA_CONVENIO').disabled = true;
  }
}
ReadOnlyVigenciaconvenio();
</script>

<script type="text/javascript">
var numDeConvenios = document.getElementById('id_convenio').value;
function ReadOnlyNumConvenios() {
  if( !numDeConvenios == null || !numDeConvenios == "" ){
    document.getElementById('id_convenio').disabled = true;
    document.getElementById('ANALISIS_MULTIDISCIPLINARIO').disabled = true;
    document.getElementById('INPUT_INCORPORACION').disabled = true;
    document.getElementById('FECHA_AUTORIZACION').disabled = true;
    document.getElementById('CONVENIO_ENTENDIMIENTO').disabled = true;
    document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').disabled = true;
    document.getElementById('fecha_inicio').disabled = true;
  }
}
ReadOnlyNumConvenios();
</script>

<script type="text/javascript">
var readOnlyEstatus = document.getElementById('ESTATUS_PERSONA').value;
function ReadOnlyConClu() {
  if ( readOnlyEstatus == "DESINCORPORADO" || readOnlyEstatus == "NO INCORPORADO" ){
    document.getElementById('FECHA_DESINCORPORACION_UNO').disabled = true;
    document.getElementById('CONCLUSION_ART351').disabled = true;
    // document.getElementById('CONCLUSION_ART35z').disabled = true;
    document.getElementById('OTHER_ART351').disabled = true;
    document.getElementById('ESTATUS_PERSONA').disabled = true;
    // document.getElementById('relpersuj').disabled = true;
    document.getElementById('CONCLUSION_CANCELACION_EXP').disabled = true;
    document.getElementById('COMENTARIO').disabled = true;
    document.getElementById('UPDATE_FILE').style.display = "none";
    document.getElementById('enter').style.display = "none";
    document.getElementById('AGREGAR_CONVENIO').style.display = "none";
    document.getElementById('ANALISIS_MULTIDISCIPLINARIO').disabled = true;
    document.getElementById('INPUT_INCORPORACION').disabled = true;
    document.getElementById('FECHA_AUTORIZACION').disabled = true;
    document.getElementById('CONVENIO_ENTENDIMIENTO').disabled = true;
    document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').disabled = true;
    document.getElementById('fecha_inicio').disabled = true;
    document.getElementById('VIGENCIA_CONVENIO').disabled = true;
    document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO').disabled = true;
    document.getElementById('id_convenio').disabled = true;
  }
}
ReadOnlyConClu();
</script>

<!-- <script type="module">
function Acuerdo(){
  var AcuerdoAnalisis = document.getElementById('ANALISIS_MULTIDISCIPLINARIO').value;
  var AcuerdoEstatus = document.getElementById('ESTATUS_PERSONA').value;
  if (AcuerdoAnalisis == 'ACUERDO DE CONCLUSION' || AcuerdoAnalisis == 'ACUERDO DE CANCELACION'){
    if (AcuerdoEstatus == "DESINCORPORADO" || AcuerdoEstatus == "NO INCORPORADO" ){
    document.getElementById('ANALISIS_MULTIDISCIPLINARIO').disabled = true;
    document.getElementById('INPUT_INCORPORACION').disabled = true;
    document.getElementById('FECHA_AUTORIZACION').readOnly = true;
    document.getElementById('id_analisis').readOnly = true;
    }
  }
}
Acuerdo();
export {AcuerdoEstatus};
</script> -->

<script type="text/javascript">
var analisisM = document.getElementById('ANALISIS_MULTIDISCIPLINARIO').value;
function ReadOnlyEstudio(){
  if (analisisM == "ESTUDIO TECNICO"){
    if (convenioDeEntendimiento == "NO FORMALIZADO" ){
      document.getElementById('ANALISIS_MULTIDISCIPLINARIO').disabled = true;
      document.getElementById('INPUT_INCORPORACION').disabled = true;
      document.getElementById('FECHA_AUTORIZACION').disabled = true;
      document.getElementById('CONVENIO_ENTENDIMIENTO').disabled = true;
    }
  }
}
ReadOnlyConClu();
</script>
<script type="text/javascript">
var checkrelacional = document.getElementById('statusprogramrelacional').value;
function activarcheckrelacional() {
  console.log(checkrelacional);
  if (checkrelacional === 'SI') {
    document.getElementById('switch').checked = true;
  }
}
activarcheckrelacional();
////////////////////////////////////////////////////////////////////////////////
var checkincorp = document.getElementById('statusprogram').value;
function activarcheck() {
  console.log(checkincorp);
  if (checkincorp === 'ACTIVO') {
    document.getElementById('switch2').checked = true;
  }
}
activarcheck();
///////////////////////////////////////////////////////////////////////////////
// var checkincorp = document.getElementById('ESTATUS_PERSONA').value;
// function desactivarcheck() {
//   console.log(checkincorp);
//   if (checkincorp !== 'SUJETO PROTEGIDO') {
//     document.getElementById('switch').disabled = true;
//   }
// }
// desactivarcheck();
</script>
</body>
</html>
