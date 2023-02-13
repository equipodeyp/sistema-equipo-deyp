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

$query = "SELECT id_estado, estado FROM t_estado ORDER BY id_estado";
$resultado23=$mysqli->query($query);

$query1 = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
$resultado1=$mysqli->query($query1);

$fol_exp = $_GET['folio'];
// echo $fol_exp;
$fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();
$name_folio=$rowfol['folioexpediente'];
// echo $name_folio;
$tipo_status=$rowfol['estatus'];
// echo $tipo_status;

$identificador = $rowfol['identificador'];
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

  <!-- modal confirmacion -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

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
				// $foto = ../image/user.png;
				echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
			}
			// echo $genero;
			?>
       <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
    </div>
    <nav class="menu-nav">
          <ul>
				   	<a style="text-align:center" class='user-nombre' href='create_ticket.php?folio=<?php echo $rowfol['folioexpediente']; ?>'><button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
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
    			<!-- <li><a href="#tab1"><span class="far fa-address-card"></span><span class="tab-text">DATOS PERSONALES</span></a></li> -->
    			<!-- <li><a href="#tab2"><span class="fas fa-book-open"></span><span class="tab-text">MEDIDAS</span></a></li> -->
    			<!-- <li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO</span></a></li> -->
          <!-- <li onclick="location.href='detalles_medidas.php';" class="fas fa-book-open tab-text"><span class="fas fa-book-open"></span><span class="tab-text">MEDIDAS</span></a></li> -->
    		</ul>

        <ul class="tabs">
    			<li><a href="#" onclick="location.href='detalles_persona.php?folio=<?php echo $fol_exp;?>';"><span class="far fa-address-card"></span><span class="tab-text">DATOS PERSONALES</span></a></li>
    			<li><a href="#" class="active" onclick="location.href='detalles_medidas.php?folio=<?php echo $fol_exp;?>';"><span class="fas fa-book-open"></span><span class="tab-text">MEDIDAS</span></a></li>
    			<!-- <li><a href="#tab3"><span class="fas fa-envelope-open-text"></span><span class="tab-text">SEGUIMIENTO</span></a></li> -->
          <!-- <li onclick="location.href='detalles_medidas.php';" class="fas fa-book-open tab-text"><span class="fas fa-book-open"></span><span class="tab-text">MEDIDAS</span></a></li> -->
    		</ul>

    		<div class="secciones">

    			<article id="tab2">

            <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="../subdireccion_de_apoyo_tecnico_juridico/menu.php">REGISTROS</a>
              <a href="../subdireccion_de_apoyo_tecnico_juridico/modificar.php?id=<?=$name_folio?>">EXPEDIENTE</a>
              <a href="../subdireccion_de_apoyo_tecnico_juridico/detalles_persona.php?folio=<?=$fol_exp?>">PERSONA</a>
              <a class="actived">MEDIDAS</a>
            </div>

            <div class="container">
        			<div class="well form-horizontal" >
        				<div class="row">
                  <div class="row alert div-title">
                    <h3 style="text-align:center">INFORMACION GENERAL DEL EXPEDIENTE DE PROTECCIÓN</h3>
          				</div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="ID_EXPEDIENTE">FOLIO DEL EXPEDIENTE DE PROTECCIÓN <span class="required"></span></label>
                    <input class="form-control" id="ID_EXPEDIENTE" name="ID_EXPEDIENTE" placeholder="" required="" type="text" value="<?php echo $rowfol['folioexpediente']; ?>" disabled>
                  </div>

                <div class="col-md-6 mb-3 validar">
                  <label for="NOMRE_SUJETO">ID PERSONA<span class="required"></span></label>
                  <input class="form-control" id="NOMRE_SUJETO" name="NOMRE_SUJETO" placeholder="" required="" type="text" value="<?php echo $rowfol['identificador']; ?>" disabled>
                </div>

                <!-- <div class="col-md-6 mb-3 validar">
                  <label for="APELLIDO_PATERNO">APELLIDO PATERNO<span class="required"></span></label>
                  <input class="form-control" id="APELLIDO_PATERNO" name="APELLIDO_PATERNO" placeholder="" required="" type="text" value="<?php echo $rowfol['paternopersona']; ?>" disabled>
                </div>

                <div class="col-md-6 mb-3 validar">
                  <label for="APELLIDO_MATERNO">APELLIDO MATERNO<span class="required"></span></label>
                  <input class="form-control" id="APELLIDO_MATERNO" name="APELLIDO_MATERNO" placeholder="" required="" type="text" value="<?php echo $rowfol['maternopersona']; ?>" disabled>
                </div> -->

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
                    <th style="text-align:center">INCISO DE LA MEDIDA</th>
                    <th style="text-align:center">ESTATUS</th>
                    <!-- <th style="text-align:center">FECHA DE EJECUCIÓN</th> -->
                    <!-- <th style="text-align:center">VALIDACIÓN</th> -->
                    <th style="text-align:center">


                      </div>
                    <?php
                    $contarmedidas = "SELECT COUNT(*) AS t FROM medidas WHERE id_persona = '$fol_exp'";
                    $rcontarmedidas = $mysqli->query($contarmedidas);
                    $fcontarmedidas = $rcontarmedidas->fetch_assoc();
                    $nummedidas = $fcontarmedidas['t'];
                    // echo $nummedidas;
                    if ($tipo_status === 'PERSONA PROPUESTA' && $nummedidas === '0'){
                      // echo '<a href="registrar_medida.php?folio='.$fol_exp.'"> <button type="button" id="NUEVA_MEDIDA" class="btn color-btn-success-white">NUEVA MEDIDA</button> </a> ';
                      // echo '<a href="#basicModal" class="btn btn-lg btn-success" data-toggle="modal">Click to open Modal</a>';
                      echo "<a href='#basicModal".$fol_exp."' class='btn color-btn-success-white' data-toggle='modal'>AGREGAR MEDIDAS</a>";
                      // echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      // Launch demo modal
                      // </button>';
                    }
                    ?>
                    </th>
        		  		</thead>
        		  		<?php
                  $checarstatus = "SELECT * FROM statusseguimiento WHERE folioexpediente = '$name_folio'";
                  $rchecarstatus = $mysqli->query($checarstatus);
                  $fchecarstatus = $rchecarstatus->fetch_assoc();
                  $ifestatus = $fchecarstatus['status'];
                  if ($tipo_status === 'PERSONA PROPUESTA') {
                    $cont_med = '0';
          		      $tabla="SELECT * FROM medidas
                    INNER JOIN validar_medida ON validar_medida.id_medida = medidas.id
                    WHERE medidas.id_persona ='$fol_exp' AND medidas.tipo ='PROVISIONAL'";
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
                          echo "<td style='text-align:center'>"; if ($var_fila['medida'] === 'VI. OTRAS' || $var_fila['medida'] === 'XIII. OTRAS MEDIDAS') {
                            echo $var_fila['descripcion'];
                          }else {
                            echo $var_fila['medida'];
                          } echo "</td>";
            		          echo "<td style='text-align:center'>"; echo $var_fila['estatus']; echo "</td>";
                          if ($var_fila['clasificacion'] === '') {
                            echo "<td>  <a href='detalles_medida.php?id=".$var_fila['id']."'> <button type='button' class='btn color-btn-success'>Detalle</button> </a> </td>";
                          }else {
                            echo "<td>  <a href='detalles_medidavistacondatos.php?id=".$var_fila['id']."'> <button type='button' class='btn color-btn-success'>Detalle</button> </a> </td>";                            
                          }


            		        echo "</tr>";
                      }

          		      }
                  }else {
                    echo "<div class='columns download'>
                            <p>

                            <h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>EL SUJETO YA NO CUENTA CON MEDIDAS PROVISIONALES</FONT></h3>

                            </p>
                    </div>";
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
<a href="../subdireccion_de_apoyo_tecnico_juridico/detalles_persona.php?folio=<?=$id_person?>" class="btn-flotante">REGRESAR</a>
</div>
<div class="modal fade" id="basicModal<?php echo $fol_exp?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
        <h4 class="modal-title" id="myModalLabel">AGREGAR MEDIDA</h4>
      </div>
      <div class="form-container" style="text-align: center">

        <form class="container well form-horizontal" method="POST" action="for_guardar_medida.php?folio=<?php echo $fol_exp; ?>">
          <div class="modal-body">
            <h3 align="center">¿CUANTAS MEDIDAS DESEA AGREGAR?</h3>
            <input  class="" style="text-align:center" type="text" name="num_medidas" autocomplete="off" required>
          </div>
          <div class="form-container" >
            <!-- <button align="center" type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button> -->
            <!-- <button type="button" class="btn btn-success" data-dismiss="modal">NO</button> -->
            <!-- <a align="center" href="registrar_medida.php?folio=<?php echo $fol_exp?>"> <button type="button" id="NUEVA_MEDIDA" class="btn color-btn-success">AGREGAR MEDIDAS</button> </a> -->
            <!-- <button align="center" type="submit" class="btn color-btn-success" data-dismiss="modal" name="savemeds" >AGREGAR MEDIDAS</button> -->
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>&nbsp&nbsp&nbsp&nbsp
            <button style="width:140px; height:25px" type="submit" name="editar" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  AGREGAR MEDIDAS</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- <div class="modal fade" id="basicModal" tabindex="-1" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

<script type="text/javascript">
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1;
var yyyy = today.getFullYear();
if(dd<10){
      dd='0'+dd
  }
  if(mm<10){
      mm='0'+mm
  }
today = yyyy+'-'+mm+'-'+dd;

</script>
<script type="text/javascript">
function action1() {
    var result = "Action 1 has been clicked";
    var action_display = $('#action_display')
    action_display.find('.modal-body').html(result)
    action_display.modal('show')
}

function action2() {
    var result = "Action 2 has been clicked";
    var action_display = $('#action_display')
    action_display.find('.modal-body').html(result)
    action_display.modal('show')
}

function action3($param1 = '') {
    var result = "Action 3 has been clicked. Parameter = " + $param1;
    var action_display = $('#action_display')
    action_display.find('.modal-body').html(result)
    action_display.modal('show')

}

function action4($param1 = '', $param2 = '') {
    var result = "Action 1 has been clicked. parameter 1 = \'" + $param1 + "\', parameter 2 = \'" + $param2 + "\'";
    var action_display = $('#action_display')
    action_display.find('.modal-body').html(result)
    action_display.modal('show')

}
window._confirm = function($message = '', $func = '', $param = []) {
    if ($func != '' && typeof window[$func] == 'function') {

        var modal_el = $('#confirm_modal')
        modal_el.find('.modal-body').html($message)
        modal_el.modal('show')
        modal_el.find('#confirm-btn').click(function(e) {
            e.preventDefault()
            if ($param.length > 0 && !!$.isArray($param))
                window[$func].apply(this, $param)
            else
                window[$func]($param)
            modal_el.modal('hide')
        })
    } else {
        alert("Function does not exists.")
    }
}
$(function() {
    $("#action1").click(function() {
        _confirm("Desea Seguir?", 'action1')
    })
    $("#action2").click(function() {
        _confirm("Are you sure to continue to execute action 2?", 'Modal 2')
    })
    $("#action3").click(function() {
        _confirm("Are you sure to continue to execute action 3?", 'action3', 'Single Parameter')
    })
    $("#action4").click(function() {
        _confirm("Are you sure to continue to execute action 4?", 'action4', ['Hello World!', "SourceCodester"])
    })
})
</script>
</body>
</html>
