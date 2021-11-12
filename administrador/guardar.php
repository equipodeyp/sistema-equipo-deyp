<?php

	require 'conexion.php';

	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$res = substr("$email", 0,3);
	$telefono = $_POST['telefono'];
	$estado_civil = $_POST['estado_civil'];
	$hijos = isset($_POST['hijo']) ? $_POST['hijos'] : 0;
	$intereses = isset($_POST['intereses']) ? $_POST['intereses'] : null;
	$res1 = $res.$estado_civil;
	$numero = "001";
  $largo = strlen($numero);
  $numero_nuevo = sprintf("%'0.0{$largo}d\n", intval($numero) + 1);

// dfhgfdghdf
// $des=mysql_query("SELECT MAX(id_tabla) AS id FROM personas");
// $resultas = mysql_query("SELECT MAX(id) FROM personas");
    // $rowq = mysql_fetch_row($resultas);
    // $highest_id = $rowq[0];

	$qry = "select max(ID)+1 As id from personas";
		$result = $mysqli->query($qry);
		$row = $result->fetch_assoc(); echo "New ID To Enter = ".$row["id"];

$p =$row["id"];
$Year = date("Y");
echo " $Year.";
echo "\n";
$n=$p;
 $n2 = str_pad($n + 1, 3, 0, STR_PAD_LEFT);echo $n2."\n";

	$arrayIntereses = null;

	$num_array = count($intereses);
	$contador = 0;

	if($num_array>0){
		foreach ($intereses as $key => $value) {
			if ($contador != $num_array-1)
			$arrayIntereses .= $value.' ';
			else
			$arrayIntereses .= $value;
			$contador++;
		}
	}

	$folio_expediente = $nombre.$res.$estado_civil.$n2.$Year;

	$sql = "INSERT INTO personas (nombre, correo, telefono, estado_civil, hijos, intereses) VALUES ('$folio_expediente', '$email', '$n2', '$estado_civil', '$hijos', '$arrayIntereses')";
	$resultado = $mysqli->query($sql);

?>

<html lang="es">
	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>

					<a href="../administrador/exp_detalle.php" class="btn btn-primary">CONTINUAR</a>

				</div>
			</div>
		</div>
	</body>
</html>
