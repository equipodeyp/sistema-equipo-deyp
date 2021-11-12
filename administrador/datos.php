<?php
$conexion=mysqli_connect('localhost','root','','sistemafgjem');
$continente=$_POST['continente'];

	$sql="SELECT id,
			 id_estado,
			 id_municipio,
			 municipio
		from estadomunicipio
		where id_estado='$continente'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label>MUNICIPIO_PERSONA</label>
					<div>

					</div>

			<select  id='lista2' name='lista2'>";


	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.$ver[3].'</option>';
	}


	echo  $cadena."</select>";


?>
