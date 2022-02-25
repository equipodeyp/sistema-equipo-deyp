<?php
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
			<script src="../js/jquery-3.1.1.min.js"></script>
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
			<script src="../js/bootstrap.min.js"></script>
  		<link href="../css/bootstrap.min.css" rel="stylesheet">
  		<link href="../css/bootstrap-theme.css" rel="stylesheet">
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">
  		<script src="../js/jquery.dataTables.min.js"></script>
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
    <h6 style="text-align:center" class='user-nombre'> <?php echo "" . $_SESSION['usuario']; ?> </h6>
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

		<!-- folio del expediente -->

			<div class="wrap">

	    <div class="secciones">

	  <article id="tab1">
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
					<label for="sede" class="col-md-4 control-label" style="font-size: 12px">MUNICIPIO DE RADICACIÓN <br>DE LA CARPETA DE INVESTIGACIÓN</label>
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
				  <input name="fecha" type="text" class="form-control"  id="fecha"  placeholder="" value="<?php echo $row['fecharecep']; ?>" disabled>
			    </div>
				</div>
				</div>

				</div>
			</div>

		<!-- fin del folio del expediente  e inicio para agrewgar persona-->

			<div class="well form-horizontal">
		  <div id="cabecera">
				<div class="row">
          <?php
          $cuenta = 0;
            $ver_exp ="SELECT * FROM expediente WHERE fol_exp ='$fol_exp'";
    		    $var_exp = $mysqli->query($ver_exp);
            $row_exp = $var_exp->fetch_assoc();
            $exp_validado = $row_exp['validacion'];
            // echo $exp_validado;
    		    $tabla="SELECT * FROM datospersonales WHERE folioexpediente ='$fol_exp'";
    		    $var_resultado = $mysqli->query($tabla);
            while ($var_fila=$var_resultado->fetch_array())
  		      {
              $id_persona = $var_fila['id'];
              $datevalidar = "SELECT * FROM validar_persona WHERE id_persona = '$id_persona'";
              $res_val = $mysqli->query($datevalidar);
              while ($fila_val=$res_val->fetch_array()) {
                $cuenta = $cuenta + 1;
                // echo $fila_val['validacion'];
                for ($i=0; $i < $cuenta ; $i++) {
                  if ($fila_val['validacion'] != 'true') {
                    $valexp = 'NO';
                    $validarexpe = '';
                  }else {
                    $valexp = 'SI';
                    $validarexpe = '';
                  }
                }
              }
            }
            if ($name == 'diana' && $exp_validado == 'false') {
              echo "<h3 style='text-align:center'>";if ($valexp == 'SI') {
              echo "<h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>¡ YA PUEDE VALIDAR EL EXPEDIENTE !</FONT></h3>";
            }elseif ($valexp == 'NO') {
              echo "<h3 style='text-align:center'><FONT COLOR='red' size=6 align='center'>¡ EXISTE INFORMACIÓN POR VALIDAR ! </FONT></h3><br><h3 style='text-align:left'><FONT COLOR='red' size=6 align='center'>Para validar el expediente, es necesario validar la información de las personas incorporadas al programa.</FONT></h3>";
            }   ;echo "</h3>";
            }
            if ($exp_validado == 'true') {
              echo "<div class='columns download'>
                      <p>
                      <img src='../image/true4.jpg' width='50' height='50' class='center'>
                      <h3 style='text-align:center'><FONT COLOR='green' size=6 align='center'>EXPEDIENTE VALIDADO</FONT></h3>

                      </p>
              </div>";
            }

           ?>
				<div class="alert alert-info">
					<h3 style="text-align:center">PERSONAS PROPUESTAS</h3>
				</div>
				</div>
		  </div>
		  <div id="contenido">
				<div class="row">
		  	<table class="table table-striped table-bordered" id="tabla_personas">
		  		<thead >
		  			<th style="text-align:center">No.</th>
		  			<th style="text-align:center">ID PERSONA</th>
					<th style="text-align:center">SEXO</th>
		  			<th style="text-align:center">ESTATUS</th>
		  			<th style="text-align:center">CALIDAD</th>
					<th style="text-align:center">MEDIDAS</th>
            		<th style="text-align:center">VALIDACIÓN</th>
		  			<th style="text-align:center"> <a href="registro_persona.php?folio=<?php echo $fol_exp; ?>"> <button type="button" class="btn btn-info">Nuevo</button> </a> </th>
		  		</thead>
		  		<?php
			$cuenta = 0;

		    $tabla="SELECT * FROM datospersonales WHERE folioexpediente ='$fol_exp'";
		    $var_resultado = $mysqli->query($tabla);
		      while ($var_fila=$var_resultado->fetch_array())
		      {
            $id_persona = $var_fila['id'];
            $datevalidar = "SELECT * FROM validar_persona WHERE id_persona = '$id_persona'";
            $res_val = $mysqli->query($datevalidar);

			$cant_med="SELECT COUNT(*) AS cant FROM medidas WHERE id_persona = '$id_persona'";
            $res_cant_med=$mysqli->query($cant_med);
            $row_med = $res_cant_med->fetch_array(MYSQLI_ASSOC);

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
        		          echo "<td style='text-align:center'>  <a href='detalles_persona.php?folio=".$var_fila['id']."'> <button type='button' class='btn btn-success'>Modificar</button> </a> </td>";
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

		<!-- <input type="submit" value="Enviar" onclick="contarFilas()"/> -->
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="contenedor">
          <?php
          $cuenta = 0;
          $ver_exp ="SELECT * FROM expediente WHERE fol_exp ='$fol_exp'";
          $var_exp = $mysqli->query($ver_exp);
          $row_exp = $var_exp->fetch_assoc();
          $exp_validado = $row_exp['validacion'];
    		    $tabla="SELECT * FROM datospersonales WHERE folioexpediente ='$fol_exp'";
    		    $var_resultado = $mysqli->query($tabla);
            while ($var_fila=$var_resultado->fetch_array())
  		      {
              $id_persona = $var_fila['id'];
              $folio_expediente = $var_fila['folioexpediente'];
              $datevalidar = "SELECT * FROM validar_persona WHERE id_persona = '$id_persona'";
              $res_val = $mysqli->query($datevalidar);
              while ($fila_val=$res_val->fetch_array()) {
                $cuenta = $cuenta + 1;
                // echo $fila_val['validacion'];
                $fol_exp2 = $fila_val['folioexpediente'];
                for ($i=0; $i < $cuenta ; $i++) {
                  if ($fila_val['validacion'] != 'true') {
                    $valexp = 'NO';
                    $validarexpe = '';
                  }else {
                    $valexp = 'SI';
                    $validarexpe = '';
                  }
                }
              }
            }
            if ($name == 'diana' && $valexp == 'SI' && $exp_validado == 'false') {
              echo "<div class='columns download'>
                      <p>
                        <a href='validar_expediente.php?folio=$fol_exp2' class='btn-flotante-glosario' ><i class=''></i>VALIDAR</a>
                      </p>
              </div>";
            }

           ?>
				   <a href="menu.php" class="btn-flotante">REGRESAR</a>
           <div class="columns download">
                   <p>
                     <a href="https://10.51.0.215/?loginOp=logout" target="_blank" class="btn-flotante-notificacion" download="GLOSARIO-SIPPSIPPED.pdf"><i class="fas fa-file-signature"></i></a>
                   </p>
           </div>
				</div>
			</div>
		</div>
	</article>
	</div>
	</div>
	</div>
	</div>
<script type="text/javascript">
	function contarFilas() {
    			var $num = document.getElementById('tabla_personas').getElementsByTagName('tr').length - 1;
    			//alert($num);
    		}
</script>


</script>
<script type="text/javascript">

</script>
</body>
</html>
