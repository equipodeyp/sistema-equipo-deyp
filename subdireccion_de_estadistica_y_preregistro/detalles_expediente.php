<?php
error_reporting(0);
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$name = $_SESSION['usuario'];
	$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
	$result = $mysqli->query($sentencia);
	$row=$result->fetch_assoc();
	require 'conexion.php';

	$fol_exp = $_GET['id'];
	// echo $fol_exp;

	$sql = "SELECT * FROM expediente WHERE fol_exp = '$fol_exp'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);  //echo $row["fol_exp"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>UPSIPPED</title>
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
		  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
		<script src="../js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<script src="../js/bootstrap.min.js"></script>
  		<link href="../css/bootstrap.min.css" rel="stylesheet">
  		<link href="../css/bootstrap-theme.css" rel="stylesheet">
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  		<script src="../js/jquery.dataTables.min.js"></script>
  		<script src="../js/jquery.dataTables.min.js"></script>
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
    <h6 style="text-align:center" class='user-nombre'> <?php echo "" . $_SESSION['usuario']; ?> </h6>
    </div>
    <nav class="menu-nav">
           		<ul>
				   	<a style="text-align:center" class='user-nombre' href='create_ticket.php?folio=<?php echo $fol_exp; ?>'><button type='button' class='btn btn-light'>INCIDENCIA</button> </a>
					   <a style="text-align:center" class='user-nombre' href='repo_exp.php?folio=<?php echo $fol_exp; ?>'><button type='button' class='btn btn-light'>REPOSITORIO <BR> EXPEDIENTE</button> </a>
            	</ul>
    </nav>
  </div>
  <div class="main bg-light">
		<div class="barra">
				<img src="../image/fiscalia.png" alt="" width="150" height="150">
				<img src="../image/ups2.png" alt="" width="1400" height="70">
				<img style="display: block; margin: 0 auto;" src="../image/ups3.png" alt="" width="1400" height="70">
		</div>

		<!-- folio del expediente -->
		<div class="sticky container">

		</div>
			<div class="wrap">

	    <div class="secciones">

	  <article id="tab1">
			<div class="well form-horizontal" >
				<div class="secciones sticky breadcrumb flat">
					<a href="../subdireccion_de_estadistica_y_preregistro/menu.php">REGISTROS</a>
					<a class="actived">EXPEDIENTE</a>
					<!-- <a class="actived">DATOS DE PERSONAS PROPUESTAS</a> -->
				</div>
				<div class="row">
				<div class="alert div-title">
					<h3 style="text-align:center">DETALLES DEL EXPEDIENTE</h3>
				</div>
				<!-- folio del expediente -->
				<div class="form-group">
					<label for="fol_exp" class="col-md-4 control-label">FOLIO DEL EXPEDIENTE DE PROTECCIÓN</label>
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
					<label for="sede" style="font-size: 12px" class="col-md-4 control-label">MUNICIPIO DE RADICACIÓN <br>DE LA CARPETA DE INVESTIGACIÓN</label>
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
			      			<input name="FECHA_RECEPCION" type="text" class="form-control"  id="FECHA_RECEPCION"  placeholder="fecha" value="<?php echo $row['fecha']; ?>" disabled>
			    		</div>
					</div>
				</div>

				<div class="form-group">
					<label for="fecha" class="col-md-4 control-label" style="font-size: 14px" >FECHA DE RECEPCIÓN DE LA SOLICITUD</label>
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
			      		<span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
				  		<input name="fecha" type="text" class="form-control"  id="fecha"  placeholder="fecha" value="<?php echo $row['fecharecep']; ?>" disabled>
			    		</div>
					</div>
				</div>

				<div class="form-group" id="ver_fecha_inicio">
					<label for="fecha" class="col-md-4 control-label" style="font-size: 14px" >FECHA DE ACUERDO DE INICIO DEL EXPEDIENTE</label>
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
			      		<span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
						  <input name="fecha_acuerdo" type="date" class="form-control"  id="fecha_acuerdo"  placeholder="" value="<?php echo $row['fechaacuerdo']; ?>" disabled>
			    		</div>
					</div>
				</div>

				</div>
			</div>

		<!-- fin del folio del expediente  e inicio para agrewgar persona-->
      <div class="well form-horizontal">
        <div id="cabecera">
  				<div class="row">
  				<div class="alert div-title">
  					<h3 style="text-align:center">EXPEDIENTE RELACIONADO</h3>
  				</div>
          <?php
          // echo $fol_exp;
          $checkrel = "SELECT folioexpediente FROM relacion_suj_exp WHERE folioexpediente = '$fol_exp' or espedienterelacional = '$fol_exp' LIMIT 1";
          $rcheckrel = $mysqli->query($checkrel);
          $fcheckrel = $rcheckrel->fetch_assoc();
          if ($fcheckrel) {
            echo "<h3 style='text-align:center'><FONT COLOR='black' size=6 align='center'>EXPEDIENTE RELACIONADO CON OTRO(S) EXPEDIENTE(S)</FONT></h3>";
          }else {
            echo "<h3 style='text-align:center'><FONT COLOR='black' size=6 align='center'>EXPEDIENTE NO RELACIONADO CON OTRO(S) EXPEDIENTE(S)</FONT></h3>";
          }
           $fol_exprel = $fcheckrel['folioexpediente'];
          // echo '<br>';
          $checkrel2 = "SELECT nombrepersona, paternopersona, maternopersona FROM datospersonales WHERE folioexpediente = '$fol_exprel' AND relacional = 'SI' LIMIT 1;";
          $rcheckrel2 = $mysqli->query($checkrel2);
          while ($fcheckrel2 = $rcheckrel2->fetch_assoc()) {
             $nombreper = $fcheckrel2['nombrepersona'];
            // echo '<br>';
             $apellido_per = $fcheckrel2['paternopersona'];
            // echo '<br>';
             $aplellido_mat = $fcheckrel2['maternopersona'];
            // echo '<br>';
          }
            $ifrelacion = "SELECT folioexpediente FROM datospersonales WHERE nombrepersona = '$nombreper' AND paternopersona = '$apellido_per' AND maternopersona = '$aplellido_mat';";
            $rifrelacion = $mysqli->query($ifrelacion);
              while($fifrelacion = $rifrelacion->fetch_assoc()){
                echo '<button style="width:250px" class="btn btn-danger" style="" disabled><b>'.$fifrelacion['folioexpediente'].'</b></button> &nbsp &nbsp';
              }
          ?>
  				</div>
  		  </div>
      </div>
			<div class="well form-horizontal">
		  <div id="cabecera">
				<div class="row">
				<div class="alert div-title">
					<h3 style="text-align:center">PERSONAS PROPUESTAS</h3>
				</div>
				</div>
		  </div>
		  <div id="contenido">
				<div class="row">
		  	<table class="table table-striped table-bordered ">
		  		<thead >
				  	<th style="text-align:center">No.</th>
		  			<th style="text-align:center">ID PERSONA</th>
						<th style="text-align:center">SEXO</th>
		  			<th style="text-align:center">ESTATUS DE LA PERSONA PROPUESTA EN EL PROGRAMA</th>
		  			<th style="text-align:center">CALIDAD EN EL PROGRAMA DE LA PERSONA PROPUESTA</th>
						<th style="text-align:center">MEDIDAS DE APOYO OTORGADAS</th>
						<th style="text-align:center">VALIDACIÓN DE LA PERSONA PROPUESTA</th>
						<th style="text-align:center">DETALLES PERSONA</th>
		  		</thead>
			<?php
			$cuenta = 0;

		    $tabla="SELECT * FROM datospersonales WHERE folioexpediente ='$fol_exp'";
		    $var_resultado = $mysqli->query($tabla);
		      while ($var_fila=$var_resultado->fetch_array())
		      {
            $id_persona = $var_fila['id'];

			$cant_med="SELECT COUNT(*) AS cant FROM medidas WHERE id_persona = '$id_persona'";
            $res_cant_med=$mysqli->query($cant_med);
            $row_med = $res_cant_med->fetch_array(MYSQLI_ASSOC);

            $datevalidar = "SELECT * FROM validar_persona WHERE id_persona = '$id_persona'";
            $res_val = $mysqli->query($datevalidar);
            while ($fila_val=$res_val->fetch_array()) {
              $cuenta = $cuenta + 1;

        		        echo "<tr>";
        		        echo "<td style='text-align:center'>"; echo $cuenta; echo "</td>";
        		        echo "<td style='text-align:center'>"; echo $var_fila['identificador']; echo "</td>";
        				echo "<td style='text-align:center'>"; echo $var_fila['sexopersona']; echo "</td>";
        		        echo "<td style='text-align:center'>"; echo $var_fila['estatus']; echo "</td>";
        		        echo "<td style='text-align:center'>"; echo $var_fila['calidadpersona']; echo "</td>";
						echo "<td style='text-align:center'>"; echo $row_med['cant']; echo "</td>";
                      	echo "<td style='text-align:center'>"; if ($fila_val['validacion'] == 'true') {
                        echo "<i class='fas fa-check'></i>";
                      } elseif ($fila_val['validacion'] == 'false') {
                        echo "<i class='fas fa-times'></i>";
                      } echo "</td>";
        		          echo "<td style='text-align:center'>  <a href='detalles_persona.php?folio=".$var_fila['id']."'> <button type='button' class='btn color-btn-success'>Detalle</button> </a> </td>";
        		        echo "</tr>";
            }

		      }
		      ?>
		  	</table>
				</div>
		  </div>
			<div id="footer">
		  	</div>
		</div>

		<div class="well form-horizontal">
			<div class="row">
				<div class="alert div-title">
					<h3 style="text-align:center">SEGUIMIENTO DEL EXPEDIENTE</h3>
				</div>
				<a  href="../subdireccion_de_estadistica_y_preregistro/seguimiento_expediente.php?folio=<?php echo $fol_exp; ?>"> <button style="display: block; margin: 0 auto;" type="button" class="btn color-btn-success">SEGUIMIENTO</button> </a>
			</div>
		</div>


		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="contenedor">
				<p>
				<!-- <a href="#" onclick="location.href='create_ticket.php?folio=<?php echo $fol_exp; ?>'" target="_blank" class="btn-flotante-notificacion"><i class="fas fa-file-signature"></i></a> -->
				</p>
				<a href="menu.php" class="btn-flotante">REGRESAR</a>
				</div>
			</div>
		</div>
	</article>
	</div>
	</div>
	</div>
	</div>
  <script type="text/javascript">
    var fec = document.getElementById("fecha_acuerdo").value;
    if (fec === null || fec === '') {
      document.getElementById("ver_fecha_inicio").style.display = "none";
    }
  </script>
