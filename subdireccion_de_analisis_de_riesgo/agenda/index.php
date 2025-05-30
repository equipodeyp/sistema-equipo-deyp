<?php
error_reporting(0);
session_start();
include_once("conexion.php");
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();


// $consulta_agenda = "SELECT DISTINCT(solicitud_asistencia.id_asistencia), solicitud_asistencia.servicio_medico, solicitud_asistencia.etapa FROM solicitud_asistencia WHERE agendar = 'SI'";

$consulta_agenda = "SELECT solicitud_asistencia.id_asistencia, solicitud_asistencia.servicio_medico, solicitud_asistencia.id_sujeto, solicitud_asistencia.folio_expediente, 
solicitud_asistencia.etapa, cita_asistencia.fecha_asistencia, cita_asistencia.hora_asistencia, agendar_asistencia.nombre_institucion, agendar_asistencia.nombre_institucion, 
agendar_asistencia.municipio_institucion, agendar_asistencia.domicilio_institucion, agendar_asistencia.observaciones

FROM solicitud_asistencia

JOIN cita_asistencia
ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia AND solicitud_asistencia.etapa != 'CANCELADA'

JOIN agendar_asistencia
ON cita_asistencia.id_asistencia = agendar_asistencia.id_asistencia

ORDER BY cita_asistencia.fecha_asistencia ASC";

$resultado_agenda = mysqli_query($mysqli, $consulta_agenda);



?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href='css/bootstrap.min.css' rel='stylesheet'>
  <link href='css/fullcalendar.min.css' rel='stylesheet' />
  <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
  <link href='css/personalizado.css' rel='stylesheet' />


  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  <!-- <link href="../../css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <link href="../../css/bootstrap-theme.css" rel="stylesheet"> -->
  <!-- <script src="../../js/jquery-3.1.1.min.js"></script>
  <link href="../../css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="../../js/jquery.dataTables.min.js"></script> -->
  <!-- <script src="../../js/bootstrap.min.js"></script> -->
  <!-- <link rel="stylesheet" href="../../css/breadcrumb.css">
  <link rel="stylesheet" href="../../css/expediente.css">
  <link rel="stylesheet" href="../../css/font-awesome.css"> -->
  <link rel="stylesheet" href="../../css/cli.css">
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
  <!-- <script src="../../js/expediente.js"></script>
  <script src="../../js/solicitud.js"></script> -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../../css/cli.css">
  <!-- <link rel="stylesheet" href="../../css/registrosolicitud1.css"> -->
  <!-- CSS only -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> -->
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"> -->
  <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
  <!-- <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script> -->
  <link rel="stylesheet" href="../../css/main2.css">


  <style type="text/css">
		body {
			margin: 0px 0px;
			padding: 0;
			font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
			font-size: 12px;
		}
  </style>

  <script src='js/jquery.min.js'></script>
  <script src='js/bootstrap.min.js'></script>
  <script src='js/moment.min.js'></script>
  <script src='js/fullcalendar.min.js'></script>
  <script src='locale/es-es.js'></script>

  <script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					columnFormat: 'dddd',
					eventColor: '#375030',
					lang: 'es',
					header: {
						left: 'prev, next',
						center: 'title',
						right: ''
					},
					defaultDate: Date().toUTCString,
					navLinks: false,
					editable: false,
					eventLimit: true,
					showNonCurrentDates: false,
					eventClick: function Data(event) {
						$('#visualizar #id').text(event.id);
						$('#visualizar #idsujeto').text(event.idsujeto);
						$('#visualizar #folio').text(event.folio);
						$('#visualizar #start').text(event.start.format('DD/MM/YYYY'));
						$('#visualizar #hora').text(event.hora);
						$('#visualizar #servicio').text(event.servicio);
						$('#visualizar #unidad').text(event.unidad);
						$('#visualizar #municipio').text(event.municipio);
						$('#visualizar #domicilio').text(event.domicilio);
						$('#visualizar #observaciones').text(event.observaciones);
						$('#visualizar #etapa').text(event.etapa);
						$('#visualizar').modal('show');
						return false;

					},

					events: [
						<?php
							while($registros_eventos = mysqli_fetch_array($resultado_agenda)){

								?>
								{

								id: '<?php echo $registros_eventos['id_asistencia']; ?>',
								title: '<?php echo $registros_eventos['id_sujeto']." - ".$registros_eventos['hora_asistencia'] ; ?>',
								idsujeto: '<?php echo $registros_eventos['id_sujeto']?>',
								folio: '<?php echo $registros_eventos['folio_expediente']; ?>',
								start: '<?php echo $registros_eventos['fecha_asistencia']; ?>',
								hora: '<?php echo $registros_eventos['hora_asistencia']; ?>',
								servicio: '<?php echo $registros_eventos['servicio_medico']; ?>',
								unidad: '<?php echo $registros_eventos['nombre_institucion']; ?>',
								municipio: '<?php echo $registros_eventos['municipio_institucion']; ?>',
								domicilio: '<?php echo $registros_eventos['domicilio_institucion']; ?>',
								observaciones: '<?php echo $registros_eventos['observaciones']; ?>',
								etapa: '<?php echo $registros_eventos['etapa']; ?>',

								},<?php
							}
						?>
					]
				});
			});


</script>


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
  				echo "<img src='../../image/mujerup.png' width='100' height='100'>";
  			}

  			if ($genero=='hombre') {
  				// $foto = ../image/user.png;
  				echo "<img src='../../image/hombreup.jpg' width='100' height='100'>";
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
        <img src="../../image/fiscalia.png" alt="" width="150" height="150">
        <img src="../../image/ups2.png" alt="" width="1400" height="70">
        <img style="display: block; margin: 0 auto;" src="../../image/ups3.png" alt="" width="1400" height="70">
    </div>







	<div class="container">
	<div class="row">
		<div class="col-md-12">
		<h4></h4>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
	<div class="panel-body">

	<div class="page-header" style="text-align: center;">
		<h2>AGENDA DE ASISTENCIAS MÉDICAS</h2>
	</div>

	<div id='calendar'></div>
		</div>



<!--Inicio elementos contenedor-->
		<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div id="" class="modal-dialog" role="document">
				<div class="modal-content" id="visualizar">

				<div id="body">

					<div class="modal-header">
						<img style="float: left;" src="../../image/FGJEM.png" width="50" height="50">
						<img style="float: right;" src="../../image/ESCUDO.png" width="60" height="50">
						<h4 style="text-align:center">Unidad de Proteccón de Sujetos que Intervienen en el Procedimiento <br> Penal o de Extinción de Dominio</h4>
					</div>

					<br>

					<div>
						<h6 style="text-align:center" class="modal-title text-center">Sistema Informático del Programa de Protección a Sujetos que Intervienen en el Procedimiento Penal o de Extinción de Dominio (SIPPSIPPED)</h6>
					</div>



					<div class="modal-body">

						<h3 style="text-align:center" class="modal-title text-center">Datos de la Asistencia Médica</h3>

						<!-- <dl class="dl-horizontal">
							<dt>Id Asistencia:</dt>
							<dd id="id"></dd>
							<dt>Id Sujeto:</dt>
							<dd id="idsujeto"></dd>
							<dt>Folio Expediente:</dt>
							<dd id="folio"></dd>
							<dt>Fecha Asistencia:</dt>
							<dd id="start"></dd>
							<dt>Hora Asistencia:</dt>
							<dd id="hora"></dd>
							<dt>Servicio Médico:</dt>
							<dd id="servicio"></dd>
							<dt>Unidad Médica:</dt>
							<dd id="unidad"></dd>
							<dt>Municipio:</dt>
							<dd id="municipio"></dd>
							<dt>Dirección:</dt>
							<dd id="domicilio"></dd>
							<dt>Observaciones Cita:</dt>
							<dd id="observaciones"></dd>
							<dt>Etapa:</dt>
							<dd id="etapa">
						</dl> -->



						<table width="100%" border="1" cellpadding="0" cellspacing="0" >


							<!-- <thead>
								<tr>
									<th>Encabezado</th>
									<td>Respuesta</td>
								</tr>
							</thead> -->

							<tbody>
								<tr>
									<th>Id Asistencia:</th>
									<td id="id"></td>
								</tr>
								<tr>
									<th >Id Sujeto:</th>
									<td id="idsujeto"></td>
								</tr>
								<tr>
									<th>Folio Expediente:</th>
									<td id="folio"></td>
								</tr>
								<tr>
									<th>Fecha Asistencia:</th>
									<td id="start"></td>
								</tr>
								<tr>
									<th>Hora Asistencia:</th>
									<td id="hora"></td>
								</tr>
								<tr>
									<th>Servicio Médico:</th>
									<td id="servicio"></td>
								</tr>
								<tr>
									<th>Unidad Médica:</th>
									<td id="unidad"></td>
								</tr>
								<tr>
									<th>Municipio:</th>
									<td id="municipio"></td>
								</tr>
								<tr>
									<th>Dirección:</th>
									<td id="domicilio"></td>
								</tr>
								<tr>
									<th>Observaciones Cita:</th>


									<td id="observaciones"></td>
								</tr>
								<tr>
									<th>Etapa:</th>
									<td id="etapa"></td>
								</tr>

							</tbody>

						</table>



		
					</div>
				</div>

				<br>

				<div class="modal-header">
						<a class="btn btn-primary btn-lg" href="javascript:imprimirSeleccion('body')">
							Imprimir
						</a>

						<a class="btn btn-danger btn-lg" data-dismiss="modal">
							Cerrar
						</a>
				</div>


					

				</div>
			</div>
		</div>

		







<!--Fin elementos contenedor-->
</div>
</div>
  </div>
</div>









<div class="contenedor">
<a href="../menu_asistencias_medicas.php" class="btn-flotante-regresar color-btn-success-gray"> REGRESAR</a>
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




















































