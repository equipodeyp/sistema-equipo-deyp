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
$tipo_status=$rowfol['estatus'];
// echo $name_folio;
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
  <link rel="stylesheet" href="../css/exp2024.css">
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/fontawesome.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"/>
</head>
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
				echo "<img src='../image/hombreup.jpg' width='100' height='100'>";
			}
			?>
    <h6 style="text-align:center" class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </h6>
    </div>
    <nav class="menu-nav">
           <ul>
              <a style="text-align:center" class='user-nombre' href='create_ticket.php?folio=<?php echo $rowfol['folioexpediente']; ?>'> <button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
              <!-- <a  href='create_ticket.php?folio=<?php echo $rowfol['folioexpediente']; ?>'><i class="fa-solid fa-comment-dots menu-nav--icon fa-fw"></i><span>Incidencia</span></a> -->
              <!-- <li class="menu-items"><a href="#" data-toggle="modal" data-target="#add_data_Modal_convenio"><i class='fas fa-file-pdf  menu-nav--icon fa-fw'></i><span class="menu-items">Glosario</span></a></li> -->
              <!-- <li class="menu-items"><a href="#"><i class='fa-solid fa-magnifying-glass  menu-nav--icon fa-fw'></i><span class="menu-items">Busqueda</span></a></li> -->
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
    			<li><a href="#" onclick="location.href='detalles_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="far fa-address-card"></span><span class="tab-text">DATOS PERSONALES</span></a></li>
    			<li><a href="#" class="active" onclick="location.href='detalles_medidas.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">MEDIDAS</span></a></li>
          <li><a href="#" onclick="location.href='seguimiento_persona.php?folio=<?php echo $fol_exp; ?>'"><span class="fas fa-book-open"></span><span class="tab-text">SEGUIMIENTO PERSONA</span></a></li>
    	</ul>

    		<div class="secciones">
    			<article id="tab2">
            <div class="secciones form-horizontal sticky breadcrumb flat">
              <a href="../administrador/admin.php">REGISTROS</a>
              <a href="../administrador/detalles_expediente.php?folio=<?=$name_folio?>">EXPEDIENTE</a>
              <a href="../administrador/detalles_persona.php?folio=<?=$fol_exp?>">PERSONA</a>
              <a class="actived">MEDIDAS</a>
            </div>
            <div class="container">
        			<div class="well form-horizontal" >
        				<div class="row">
                  <div class="row alert div-title">
                    <h3 style="text-align:center">INFORMACIÓN GENERAL DEL EXPEDIENTE DE PROTECCIÓN</h3>
          				</div>

                  <div class="col-md-6 mb-3 validar">
                    <label for="ID_EXPEDIENTE">ID EXPEDIENTE<span class="required"></span></label>
                    <input class="form-control" id="ID_EXPEDIENTE" name="ID_EXPEDIENTE" placeholder="" required="" type="text" value="<?php echo $rowfol['folioexpediente']; ?>" disabled>
                  </div>

                <div class="col-md-6 mb-3 validar">
                  <label for="NOMRE_SUJETO">ID PERSONA<span class="required"></span></label>
                  <input class="form-control" id="NOMRE_SUJETO" name="NOMRE_SUJETO" placeholder="" required="" type="text" value="<?php echo $rowfol['identificador']; ?>" disabled>
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
            <div class="container">
        			<div class="well form-horizontal">
                  <div id="cabecera">
                    <div class="row alert div-title">
                      <h3 style="text-align:center">MEDIDAS</h3>
                    </div>
                    <a href="../administrador/historialmedidas.php?id=<?=$rowfol['id']?>" class="btn color-btn-export-xls">HISTORIAL DE MEDIDAS</a>
                  </div>
                  <?php
                  $existvalidar = "SELECT COUNT(*) AS total FROM validar_medida
                                    WHERE id_persona = '$id_person' AND validar_datos = 'false'";
                  $rexistvalidar = $mysqli->query($existvalidar);
                  $fexistvalidar = $rexistvalidar->fetch_assoc();
                  ?>
                  <div id="contenido">

                    <?php
                    $existvalidar = "SELECT COUNT(*) AS total FROM validar_medida
                                      WHERE id_persona = '$id_person' AND validar_datos = 'false'";
                    $rexistvalidar = $mysqli->query($existvalidar);
                    $fexistvalidar = $rexistvalidar->fetch_assoc();
                    $fexistvalidar['total'];
                    echo "<br>";
                    $existvalidar2 = "SELECT COUNT(*) AS total FROM medidas
                                      WHERE id_persona = '$id_person' AND estatus = 'EN EJECUCION'";
                    $rexistvalidar2 = $mysqli->query($existvalidar2);
                    $fexistvalidar2 = $rexistvalidar2->fetch_assoc();
                    $fexistvalidar2['total'];
                    // "<br>";
                    $progress = 100 / $fexistvalidar2['total'];
                    // "<br>";
                    $progresstotal = $progress * ($fexistvalidar2['total'] - $fexistvalidar['total']);
                    // echo "<br>";
                    $total = (float)$fexistvalidar2['total']; // Obtener total de la base de datos
                    $porcentaje = ((float)($fexistvalidar2['total'] - $fexistvalidar['total']) * 100) / $total; // Regla de tres
                    $porcentaje = round($porcentaje, 0);  // Quitar los decimales
                    // echo $porcentaje;
                    ?>
                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: <?php echo $porcentaje.'%'; ?>"><?php echo $porcentaje.'%'; ?> de medidas validadas</div>
                    </div>
                    <table class="table table-striped table-bordered ">
                      <thead >
                        <th style="text-align:center">NO.</th>
                        <!-- <th style="text-align:center">FOLIO DE LA PERSONA</th> -->
                        <th style="text-align:center">CATEGORIA DE LA MEDIDA</th>
                        <th style="text-align:center">TIPO DE MEDIDA</th>
                        <th style="text-align:center">CLASIFICACIÓN DE MEDIDA</th>
                        <th style="text-align:center">INCISO DE MEDIDA</th>
                        <th style="text-align:center">FECHA DE MEDIDA PROVISIONAL</th>
                        <th style="text-align:center">FECHA DE MEDIDA DEFINITIVA</th>
                        <th style="text-align:center">FECHA DE EJECUCIÓN</th>
                        <th style="text-align:center">ESTATUS</th>
                        <th style="text-align:center">MUNICIPIO DE EJECUCIÓN</th>
                        <th style="text-align:center">MOTIVO DE CONCLUSIÓN</th>
                        <?php
                        if ($name === 'a-adriana'  || $name === 'e-adriana' && $fexistvalidar['total'] > 0) {
                        ?>
                        <th style="text-align:center">VALIDACIÓN</th>
                        <?php
                        }
                        ?>
                        <!-- <th style="text-align:center">VALIDACIÓN</th> -->
                        <th style="text-align:center">
                        <?php
                        if ($tipo_status === 'SUJETO PROTEGIDO' || $tipo_status === 'PERSONA PROPUESTA'){
                          echo '<a href="agregar_medida.php?folio='.$fol_exp.'"> <button type="button" id="NUEVA_MEDIDA" class="btn color-btn-success-white">NUEVA MEDIDA</button> </a> ';
                        }
                        ?>
                        </th>
                      </thead>
                      <?php
                      $cont_med = 0;
                      $tabla="SELECT * FROM medidas
                      INNER JOIN validar_medida ON medidas.id = validar_medida.id_medida
                      WHERE medidas.id_persona = '$fol_exp' AND medidas.estatus = 'EN EJECUCION' OR validar_medida.validar_datos = 'false'";
                      $var_resultado = $mysqli->query($tabla);

                      $folioExp=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
                      $resultfol = $mysqli->query($fol);
                      $rowfol=$resultfol->fetch_assoc();
                      $idUnicoPersona = $rowfol['identificador'];

                      while ($var_fila=$var_resultado->fetch_array())
                      {

                        $id_medida = $var_fila['id'];
                        $val_meds = "SELECT * FROM validar_medida WHERE folioexpediente = '$name_folio' AND id_persona = '$id_person' AND id_medida = '$id_medida'";
                        $res_valmeds = $mysqli->query($val_meds);
                        while ($fila_valmeds = $res_valmeds->fetch_array()){
                          $cont_med = $cont_med + 1;

                          $idmedida=" SELECT * FROM multidisciplinario_medidas WHERE id_medida='$id_medida'";
                          $ridmedida = $mysqli->query($idmedida);
                          $fidmedida=$ridmedida->fetch_assoc();


                          echo "<tr>";
                            echo "<td style='text-align:center'>"; echo $cont_med; echo "</td>";

                            echo "<td style='text-align:center'>"; echo $var_fila['categoria']; echo "</td>";
                            echo "<td style='text-align:center'>"; echo $var_fila['tipo']; echo "</td>";
                            echo "<td style='text-align:center'>"; echo $var_fila['clasificacion']; echo "</td>";
                            echo "<td style='text-align:center'>"; if ($var_fila['medida'] === 'VI. OTRAS' || $var_fila['medida'] === 'XIII. OTRAS MEDIDAS') {
                              echo $var_fila['descripcion'];
                            }else {
                              echo $var_fila['medida'];
                            } echo "</td>";
                            echo "<td style='text-align:center'>"; if ($var_fila['date_provisional'] != '0000-00-00') {
                              echo date("d/m/Y", strtotime($var_fila['date_provisional']));
                            } echo "</td>";
                            echo "<td style='text-align:center'>";
                            if ($var_fila['date_definitva'] === '') {
                              echo "";
                            }else {
                              echo date("d/m/Y", strtotime($var_fila['date_definitva']));
                            } echo "</td>";
                            echo "<td style='text-align:center'>"; if ($var_fila['date_ejecucion'] != '0000-00-00') {
                              echo date("d/m/Y", strtotime($var_fila['date_ejecucion']));
                            } echo "</td>";
                            echo "<td style='text-align:center'>"; echo $var_fila['estatus']; echo "</td>";
                            echo "<td style='text-align:center'>"; echo $var_fila['ejecucion']; echo "</td>";
                            echo "<td style='text-align:center'>"; if ($fidmedida['acuerdo'] === 'OTRO' || $fidmedida['acuerdo'] === 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO') {
                              echo $fidmedida['conclusionart35'];
                            }else {
                              echo $fidmedida['acuerdo'];
                            }


                            echo "</td>";
                            // echo "<td <a href='detalles_medida.php?id=".$var_fila['id']."'> <button type='button' class='btn color-btn-success'>Detalle</button> </a> </td>";
                            // echo "<td <a href='validar_medida.php?folio=".$var_fila['id']."'> <button type='button' class='glyphicon glyphicon-check'>VALIDAR</button> </a> </td>";
                            if ($name === 'a-adriana' || $name === 'e-adriana' && $fexistvalidar['total'] > 0) {
                              if ($fila_valmeds['validar_datos'] === 'true') {
                                echo "<td> <span class='label label-success' style='font-size: 10px;'><i class='fas fa-check'></i> MEDIDA VALIDADA</span>
                                 </td>";
                              }elseif ($fila_valmeds['validar_datos'] === 'false') {
                                echo "<td> <a href='validar_medida.php?folio=".$var_fila['id']."'><button type='button' class='glyphicon glyphicon-check'>VALIDAR</button> </a>  </td>";
                              }
                            }

                            echo "<td>  <a href='detalle_medida.php?id=".$var_fila['id']."'> <button type='button' class='btn color-btn-success btn-sm btn-block'>DETALLE</button> </a>";
                            // if ($fila_valmeds['validar_datos'] === 'true') {
                            //   echo "<i class='fas fa-check'></i>";
                            // }elseif ($fila_valmeds['validar_datos'] === 'false') {
                            //   echo "<i class='fas fa-times'></i>";
                            // }
                              echo "</td>";

                              }
                              echo "</tr>";
                            }


                          // <td style="text-align:center">
                          //   <form method="POST" action="validar_medida_pendiente.php?folio=<?php echo $row['id_medida']; ?>
                          <!-- //     <button type="submit" name="editar" class="btn color-btn-success"><span class="glyphicon glyphicon-check"></span>  VALIDAR</a> -->
                            </form>

                        <!-- }

                      }
                      ?> -->
                    </table>
                  </div>


        		    </div>
        		</div>
    			</article>
    		</div>
    	</div>
  </div>
</div>
<div class="contenedor">
<a href="../administrador/detalles_persona.php?folio=<?=$fol_exp?>" class="btn-flotante">REGRESAR</a>
</div>


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
document.getElementById("FECHA_SOLICITUD").setAttribute("max", today);
document.getElementById("FECHA_NACIMIENTO_PERSONA").setAttribute("max", today);
document.getElementById("FECHA_AUTORIZACION").setAttribute("max", today);
document.getElementById("FECHA_CONVENIO_ENTENDIMIENTO_UNO").setAttribute("max", today);
document.getElementById("FECHA_DESINCORPORACION_UNO").setAttribute("max", today);

document.getElementById("FECHA_AUTORIZACION_ANALISIS").setAttribute("max", today);
document.getElementById("FECHA_CONVENIO_ENTENDIMIENTO_DOS").setAttribute("max", today);
document.getElementById("FECHA_DESINCORPORACION_DOS").setAttribute("max", today);
document.getElementById("FECHA_DESINCORPORACION_UNO").setAttribute("max", today);

</script>


<script type="text/javascript">
var fechaConvenio = document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS');
var vigencia = document.getElementById('VIGENCIA_CONVENIO');
var fechaTermino = document.getElementById('FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO');
var fechaInicio;
var diasVigencia;



    fechaConvenio.addEventListener('change', obtenerFecha);
    vigencia.addEventListener('change',obtenerVigencia);

    function obtenerFecha(e) {
      fechaInicio = e.target.value;
    }

    function obtenerVigencia(e) {
      diasVigencia = e.target.value;

      var fecha = new Date(fechaInicio);
      var dias = parseInt(diasVigencia);

      fecha.setDate(fecha.getDate() + dias);
      const anio = parseInt(fecha.getFullYear());
      const mes = parseInt(fecha.getMonth());
      const dia = parseInt(fecha.getDate());


      var nuevaFecha = dia + '/' + (mes + 1) + '/' + anio;

      document.getElementById("FECHA_DE_TERMINO_DEL_CONVENIO_ENTENDIMIENTO").value = nuevaFecha;

    }

</script>

<script type="text/javascript">
var selectAnalisisMulti = document.getElementById('ANALISIS_MULTIDISCIPLINARIO').value;
function ocultarCampos() {
  if (selectAnalisisMulti === "" || selectAnalisisMulti === null ){

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
</script>
<script type="text/javascript">
var analisisMultidisiplinario = document.getElementById('ANALISIS_MULTIDISCIPLINARIO');
var respuestaAlalisisMultidisiplinario = '';

analisisMultidisiplinario.addEventListener('change', obtenerInfo);


    function obtenerInfo(e) {
      respuestaAlalisisMultidisiplinario = e.target.value;
      if (respuestaAlalisisMultidisiplinario === "ESTUDIO TECNICO") {

        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INPUT_INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "";
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
      else if (respuestaAlalisisMultidisiplinario === "ACUERDO DE CONCLUSION" || respuestaAlalisisMultidisiplinario === "ACUERDO DE CANCELACION" ){

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

      else if ( respuestaAlalisisMultidisiplinario === "EN ELABORACION"){
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
</script>
<script type="text/javascript">
var analisisM = document.getElementById('ANALISIS_MULTIDISCIPLINARIO').value;

function ocultarAnalisisM() {

      if (analisisM === "ESTUDIO TECNICO") {

        document.getElementById('LABEL_INCORPORACION').style.display = "";
        document.getElementById('INPUT_INCORPORACION').style.display = "";
        document.getElementById('LABEL_FECHA_AUTORIZACION').style.display = "";
        document.getElementById('FECHA_AUTORIZACION').style.display = "";
        document.getElementById('LABEL_ID_ANALISIS').style.display = "";
        document.getElementById('id_analisis').style.display = "";
        document.getElementById('LABEL_CONVENIO_ENTENDIMIENTO').style.display = "";
        document.getElementById('CONVENIO_ENTENDIMIENTO').style.display = "";
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
      else if (analisisM === "ACUERDO DE CONCLUSION" || analisisM === "ACUERDO DE CANCELACION" ){

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

      else if ( analisisM === "EN ELABORACION" ) {
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
ocultarAnalisisM();
</script>
<script type="text/javascript">

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
      }
  }
</script>
<script type="text/javascript">
var noFormalizadoInput = document.getElementById('CONVENIO_ENTENDIMIENTO').value;
function ocultarCamposNoFormalizado() {
  if (noFormalizadoInput === "NO FORMALIZADO" || noFormalizadoInput === "PENDIENTE DE EJECUCION"){

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

      }

}
ocultarCamposNoFormalizado();
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
      document.getElementById('FECHA_DESINCORPORACION_UNO').style.display = "none";
      }
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
    document.getElementById('id_analisis').readOnly = true;
  }
}
ReadOnlyIdAnalisis();

</script>

<script type="text/javascript">

var fechaVigenciaConvenio = document.getElementById('VIGENCIA_CONVENIO').value;

function ReadOnlyVigenciaconvenio() {
  if( !fechaVigenciaConvenio == null || !fechaVigenciaConvenio == "" ){
    document.getElementById('VIGENCIA_CONVENIO').readOnly = true;
  }
}
ReadOnlyVigenciaconvenio();

</script>

<script type="text/javascript">

var numDeConvenios = document.getElementById('id_convenio').value;

function ReadOnlyNumConvenios() {
  if( !numDeConvenios == null || !numDeConvenios == "" ){
    document.getElementById('id_convenio').readOnly = true;
    document.getElementById('ANALISIS_MULTIDISCIPLINARIO').disabled = true;
    document.getElementById('INPUT_INCORPORACION').disabled = true;
    document.getElementById('FECHA_AUTORIZACION').readOnly = true;
    document.getElementById('CONVENIO_ENTENDIMIENTO').disabled = true;
    document.getElementById('FECHA_CONVENIO_ENTENDIMIENTO_DOS').readOnly = true;
    document.getElementById('fecha_inicio').readOnly = true;
  }
}
ReadOnlyNumConvenios();

</script>

<script type="text/javascript">

var readOnlyEstatus = document.getElementById('ESTATUS_PERSONA').value;

function ReadOnlyConClu() {
  if( readOnlyEstatus == "DESINCORPORADO" || readOnlyEstatus == "NO INCORPORADO" ){

    document.getElementById('FECHA_DESINCORPORACION_UNO').readOnly = true;
    document.getElementById('CONCLUSION_ART351').disabled = true;
    document.getElementById('OTHER_ART351').readOnly = true;
    document.getElementById('ESTATUS_PERSONA').disabled = true;
    document.getElementById('CONCLUSION_CANCELACION_EXP').disabled = true;
    document.getElementById('FUENTE').disabled = true;
    document.getElementById('ESPECIFIQUE_FUENTE').readOnly = true;
    document.getElementById('COMENTARIO').disabled = true;
    document.getElementById('UPDATE_FILE').style.display = "none";
    document.getElementById('enter').style.display = "none";
    document.getElementById('AGREGAR_CONVENIO').style.display = "none";
  }
}
ReadOnlyConClu();

</script>

<script type="text/javascript">

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

</script>

<script type="text/javascript">

var analisisM = document.getElementById('ANALISIS_MULTIDISCIPLINARIO').value;

function ReadOnlyEstudio(){
  if (analisisM == "ESTUDIO TECNICO"){
    if (convenioDeEntendimiento == "NO FORMALIZADO" ){
      document.getElementById('ANALISIS_MULTIDISCIPLINARIO').disabled = true;
      document.getElementById('INPUT_INCORPORACION').disabled = true;
      document.getElementById('FECHA_AUTORIZACION').readOnly = true;
      document.getElementById('CONVENIO_ENTENDIMIENTO').disabled = true;
    }
  }
}
ReadOnlyConClu();
</script>
</body>
</html>
