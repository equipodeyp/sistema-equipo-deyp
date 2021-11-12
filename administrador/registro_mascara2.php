<?php
/*require 'conexion.php';*/
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);
$row=$result->fetch_assoc();
$fol_exp = $_GET['folio'];
$dato_persona = "SELECT id, nombrepersona, paternopersona, maternopersona, calidadpersona, folioexpediente FROM datospersonales WHERE id = '$fol_exp'";
$r_d_persona = $mysqli->query($dato_persona);
$ro_persona=$r_d_persona->fetch_assoc();

// echo $fol_exp ;

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
      <img src="../image/USER.jpg" alt="" width="100" height="100">
    <span class='user-nombre'>  <?php echo "" . $_SESSION['usuario']; ?> </span>
    </div>
    <nav class="menu-nav">
    </nav>
  </div>
  <div class="main bg-light">
    <div class="barra">
        <img src="../image/ups.png" alt="" width="1400" height="150">
    </div>

		<!-- folio del expediente -->
    <div class="wrap">
      <div class="secciones">
        <article id="tab1">
			<div class="well form-horizontal" >
				<div class="row">
          <div class="alert alert-info">
            <h3 style="text-align:center">DETALLES DEL EXPEDIENTE</h3>
  				</div>

          <div class="col-md-6 mb-3 validar">
            <label for="ID_EXPEDIENTE">ID EXPEDIENTE<span class="required"></span></label>
            <input class="form-control" id="ID_EXPEDIENTE" name="ID_EXPEDIENTE" placeholder="" required="" type="text" value="<?php echo $ro_persona['folioexpediente']; ?>" disabled>
          </div>

        <div class="col-md-6 mb-3 validar">
          <label for="NOMRE_SUJETO">NOMBRE SUJETO PROTEGIDO<span class="required"></span></label>
          <input class="form-control" id="NOMRE_SUJETO" name="NOMRE_SUJETO" placeholder="" required="" type="text" value="<?php echo $ro_persona['nombrepersona']; ?>" disabled>
        </div>

        <div class="col-md-6 mb-3 validar">
          <label for="APELLIDO_PATERNO">APELLIDO PATERNO<span class="required"></span></label>
          <input class="form-control" id="APELLIDO_PATERNO" name="APELLIDO_PATERNO" placeholder="" required="" type="text" value="<?php echo $ro_persona['paternopersona']; ?>" disabled>
        </div>

        <div class="col-md-6 mb-3 validar">
          <label for="APELLIDO_MATERNO">APELLIDO MATERNO<span class="required"></span></label>
          <input class="form-control" id="APELLIDO_MATERNO" name="APELLIDO_MATERNO" placeholder="" required="" type="text" value="<?php echo $ro_persona['maternopersona']; ?>" disabled>
        </div>

        <div class="col-md-6 mb-3 validar">
          <label for="CALIDAD_DEL_SUJETO">CALIDAD DEL SUJETO<span class="required"></span></label>
          <select class="form-control" id="CALIDAD_DEL_SUJETO" name="CALIDAD_DEL_SUJETO" disabled>
            <option value=""><?php echo $ro_persona['calidadpersona']; ?></option>
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

		<!-- fin del folio del expediente  e inicio para agrewgar persona-->

			<div class="well form-horizontal">
		  <div id="cabecera">
				<div class="row alert alert-info">
					<h3 style="text-align:center">MEDIDAS</h3>
				</div>
		  </div>

		  <div id="contenido">
		  	<table class="table table-striped table-bordered ">
		  		<thead >
		  			<th>ID</th>
            <th>Tipo de medida</th>
            <th>Clasificacion medida</th>
            <th>Estatus</th>
            <th>Municipio</th>
            <th>Fecha inicio</th>
		  			<th> <a href="registro_medida.php?folio=<?php echo $fol_exp; ?>"> <button type="button" class="btn btn-info">Nueva Medida</button> </a> </th>
		  		</thead>
		  		<?php

		      $tabla="SELECT * FROM medidas WHERE id_persona ='$fol_exp'";

		       $var_resultado = $mysqli->query($tabla);

		      while ($var_fila=$var_resultado->fetch_array())
		      {
		        echo "<tr>";
		          echo "<td>"; echo $var_fila['id']; echo "</td>";
		          echo "<td>"; echo $var_fila['tipomedida']; echo "</td>";
		          echo "<td>"; echo $var_fila['clasificacion']; echo "</td>";
		          echo "<td>"; echo $var_fila['estatus']; echo "</td>";
		          echo "<td>"; echo $var_fila['municipioejecucion']; echo "</td>";
		          echo "<td>"; echo $var_fila['fechainicio']; echo "</td>";
		          echo "<td>  <a href='registro_medida.php?no=".$var_fila['id']."'> <button type='button' class='btn btn-success'>Modificar</button> </a> </td>";

		        echo "</tr>";
		      }

		      ?>
		  	</table>
		  </div>

			<div id="footer">

		  	</div>

		</div>



  </article>
</div>
</div>
</div>
</div>
<div class="form-group">
  <div class="contenedor">
  <a href="admin.php" class="btn-flotante">CANCELAR</a>
  </div>
</div>
