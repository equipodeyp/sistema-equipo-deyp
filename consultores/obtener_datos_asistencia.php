<?php 
$conexion=mysqli_connect('localhost','root','','sistemafgjem');
$tipo=$_POST['tipo'];

	$sql="SELECT id,
			 id_tipo,
			 tipo, 
             nombre,
             municipio,
             domicilio
		from instituciones_medicas
		where id_tipo='$tipo'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<span class='input-group-addon'><i class='fas fa-solid fa-building'></i></span>
            <select class='form-control' id='nombre_institucion' name='nombre_institucion' required>
            <option disabled selected>SELECCIONE UNA INSTITUCIÓN</option>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option maxlength="250" value='.$ver[0].'>'.utf8_encode($ver[3]).'</option>';
	}

	echo  $cadena."
    </select>
    ";

    // $sql="SELECT id,
    // id_tipo,
    // tipo, 
    // nombre,
    // municipio,
    // domicilio
    // from instituciones_medicas
    // where nombre='$ver[3]'";

?>

                    <!-- <div class="form-group">
                        <label for="municipio_institucion" class="col-md-4 control-label" style="font-size: 16px">MUNICIPIO  DE LA INSTITUCIÓN</label>
                        <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-solid fa-flag"></i></span>
                            <input type="text" class="form-control"  id="municipio_institucion" name="municipio_institucion" readonly value="">
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="domicilio_institucion" class="col-md-4 control-label" style="font-size: 16px">DOMICILIO  DE LA INSTITUCIÓN</label>
                        <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-solid fa-globe"></i></span> 
                            <input maxlength="250" type="text" class="form-control"  id="domicilio_institucion" name="domicilio_institucion" readonly value="">
                        </div>
                        </div>
                    </div> -->