<?php
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
	require 'conexion.php';
	$fol_exp = $_GET['folio'];

	$sql = "SELECT * FROM expediente WHERE fol_exp = '$fol_exp'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);  //echo $row["fol_exp"];
// echo $fol_exp;
	?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link href="../css/bootstrap.min.css" rel="stylesheet">
  		<link href="../css/bootstrap-theme.css" rel="stylesheet">
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
			<script src="../js/jquery-3.1.1.min.js"></script>
  		<script src="../js/jquery.dataTables.min.js"></script>
  		<script src="../js/bootstrap.min.js"></script>
  		<script src="../js/jquery.dataTables.min.js"></script>
      <link rel="stylesheet" href="../css/expediente.css">
    	<link rel="stylesheet" href="../css/font-awesome.css">
    	<link rel="stylesheet" href="../css/cli.css">
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script src="../js/expediente.js"></script>
      <script src="../js/solicitud.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="../css/cli.css">

</head>
<body >
<div class="contenedor">
  <div class="sidebar ancho">
    <div class="logo text-warning">
    </div>
    <div class="user">
      <img src="../image/user.png" alt="" width="100" height="100">
    	<span class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </span>
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
			<div class="wrap">

	    <div class="secciones">

	  <article id="tab1">
		<!-- folio del expediente -->


							<div class="well form-horizontal" >
								<div class="row">
									<div class="alert alert-info">
										<h3 style="text-align:center">DETALLES DEL EXPEDIENTE</h3>
									</div>
									<!-- folio del expediente -->
									<div class="form-group">
										<label for="fol_exp" class="col-md-4 control-label">FOLIO DEL EXPEDIENTE</label>
										<div class="col-md-4 inputGroupContainer">
											<div class="input-group">
			      						<span class="input-group-addon"><i class="fas fa-folder"></i></span>
			      						<input name="fol_exp" type="text" class="form-control"  id="fol_exp"  placeholder="fol_exp" value="<?php echo $row['fol_exp']; ?>" disabled>
			    						</div>
										</div>
									</div>
									<!-- nombre de la unidad -->
									<div class="form-group">
										<label for="unidad" class="col-md-4 control-label">UNIDAD</label>
										<div class="col-md-4 inputGroupContainer">
											<div class="input-group">
			      						<span class="input-group-addon"><i class="fas fa-hotel"></i></span>
			      						<input name="unidad" type="text" class="form-control"  id="unidad"  placeholder="unidad" value="<?php echo $row['unidad']; ?>" disabled>
			    						</div>
										</div>
									</div>
									<!-- nombre de la sede -->
									<div class="form-group">
										<label for="sede" class="col-md-4 control-label">SEDE</label>
										<div class="col-md-4 inputGroupContainer">
											<div class="input-group">
			      						<span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
			      						<input name="sede" type="text" class="form-control"  id="sede"  placeholder="sede" value="<?php
												if ($row['sede']=='TOLUCA') {
													echo "VALLE DE ".$row['sede'];
												} else
												echo "ZONA  ". $row['sede']; ?>" disabled>
			    						</div>
										</div>
									</div>
									<!-- nombre del municipio -->
									<div class="form-group">
										<label for="sede" class="col-md-4 control-label">MUNICIPIO</label>
										<div class="col-md-4 inputGroupContainer">
											<div class="input-group">
			      						<span class="input-group-addon"><i class="fas fa-map-marked-alt"></i></span>
												<select class="form-control" id="estado_civil" name="estado_civil" disabled>
													<option value=""><?php echo $row['municipio']; ?></option>
													<?php
													$select = "SELECT * FROM municipios";
													$answer = $mysqli->query($select);
													while($valores = $answer->fetch_assoc()){
							 						echo "<option value='".$valores['clave']."'>".$valores['nombre']."</option>";
						 							}
						 							?>
												</select>
			    						</div>
										</div>
									</div>
									<div class="form-group">
										<label for="fecha" class="col-md-4 control-label">FECHA DE CAPTURA</label>
										<div class="col-md-4 inputGroupContainer">
											<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
									<input name="fecha" type="text" class="form-control"  id="fecha"  placeholder="fecha" value="<?php echo $row['fecha']; ?>" disabled>
									</div>
										</div>
									</div>

									<div class="form-group">
										<label for="fecha" class="col-md-4 control-label" style="font-size: 14px" >FECHA DE RECEPCIÓN DEL LA SOLICITUD</label>
										<div class="col-md-4 inputGroupContainer">
											<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
									<input class="form-control" id="FECHA_RECEPCION" name="FECHA_RECEPCION" disabled placeholder="" type="date" value="<?php echo $row['fecharecep']; ?>">
									</div>
										</div>
									</div>
								</div>
							</div>

						<!-- fin del folio del expediente  e inicio para agrewgar persona-->

							<div class="well form-horizontal">
		  					<div id="cabecera">
									<div class="row alert alert-info">
										<div class="alert alert-info">
											<h3 style="text-align:center">PERSONAS PROPUESTAS</h3>
										</div>
									</div>
		  					</div>

		  					<div id="contenido">
									<div class="row">
		  							<table class="table table-striped table-bordered ">
		  								<thead >
		  									<th>ID</th>
		  									<th>nombre</th>
		  									<th>apellido paterno</th>
		        						<th>apellido materno</th>
		  									<th>usuario</th>
		  									<th>cargo</th>
		  									<th> <a href="registro_persona.php?folio=<?php echo $fol_exp; ?>"> <button type="button" class="btn btn-info">Nuevo</button> </a> </th>
		  								</thead>
		  								<?php
		      						$tabla="SELECT * FROM datospersonales WHERE folioexpediente ='$fol_exp'";
		       						$var_resultado = $mysqli->query($tabla);
		      						while ($var_fila=$var_resultado->fetch_array())
		      						{
		        					echo "<tr>";
		          				echo "<td>"; echo $var_fila['id']; echo "</td>";
		          				echo "<td>"; echo $var_fila['nombrepersona']; echo "</td>";
		          				echo "<td>"; echo $var_fila['paternopersona']; echo "</td>";
		          				echo "<td>"; echo $var_fila['maternopersona']; echo "</td>";
		          				echo "<td>"; echo $var_fila['edadpersona']; echo "</td>";
		          				echo "<td>"; echo $var_fila['telefonocelular']; echo "</td>";
		          				echo "<td>  <a href='modif_prod1.php?no=".$var_fila['id']."'> <button type='button' class='btn btn-success'>Modificar</button> </a> </td>";
		        					echo "</tr>";
		      						}
		      					?>
		  							</table>
									</div>
		  					</div>
								<div id="footer">
		  					</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="contenedor">
									<a href="menu.php" class="btn-flotante">REGRESAR</a>
								</div>
							</div>
						</div>
					</article>
					</div>
					</div>
		</div>
	</div>
