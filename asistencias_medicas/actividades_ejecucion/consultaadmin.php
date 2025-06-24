<?php
$conexion=mysqli_connect("localhost","root","","sistemafgjem");
$where="";
if(isset($_GET['enviar'])){
$tipoconsulta = $_GET['tipo_consulta'];
$usuario = $_GET['usuario'];
$nombreactividad = $_GET['nombre_actividad'];
$fechainicial = date("Y-m-d", strtotime($_GET['fecha_inicio']));
$fechafinal = date("Y-m-d", strtotime($_GET['fecha_fin']));

if (isset($_GET['tipo_consulta'])){
  if ($tipoconsulta === 'GLOBAL' && $nombreactividad === 'TODAS') {
    $where="WHERE react_actividad.id_subdireccion = 4 AND (react_actividad.fecha BETWEEN '$fechainicial' AND '$fechafinal')";
  }elseif ($tipoconsulta === 'GLOBAL' && $nombreactividad !== 'TODAS') {
    $where="WHERE react_actividad.id_subdireccion = 4 AND react_actividad.id_actividad = '$nombreactividad'
            AND (react_actividad.fecha BETWEEN '$fechainicial' AND '$fechafinal')";
  }elseif ($tipoconsulta === 'POR USUARIO' && $nombreactividad === 'TODAS') {
    $where="WHERE react_actividad.id_subdireccion = 4 AND react_actividad.usuario = '$usuario'
            AND (react_actividad.fecha BETWEEN '$fechainicial' AND '$fechafinal')";
  }elseif ($tipoconsulta === 'POR USUARIO' && $nombreactividad !== 'TODAS') {
    $where="WHERE react_actividad.id_subdireccion = 4 AND react_actividad.usuario = '$usuario' AND react_actividad.id_actividad = '$nombreactividad'
            AND (react_actividad.fecha BETWEEN '$fechainicial' AND '$fechafinal')";
  }
  $mostrar = 1;
}else {
  $mostrar = 0;
}
}
?>
</form>
<?php
if ($mostrar === 1) {
// echo "consultar";
$conexion=mysqli_connect("localhost","root","","sistemafgjem");
$SQL="SELECT * FROM react_actividad $where";
$dato = mysqli_query($conexion, $SQL);
$row_cnt = $dato->num_rows;
if($dato -> num_rows >0){
  ?>
  <div class="table-responsive resultadoFiltro">
          <table class="table table-hover" id="tablaReact">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">ACTIVIDAD</th>
                <th scope="col">CLASIFICACIÓN</th>
                <th scope="col">UNIDAD DE MEDIDA</th>
                <th scope="col">CANTIDAD</th>
                <th scope="col">FECHA</th>
              </tr>
            </thead>
  <?php
  $i =1;
  while($fila=mysqli_fetch_array($dato)){
    // variables de consulta
    $idactivity = $fila['id_actividad'];
    if ($idactivity === '3') {
      $nameclasfac = $fila['clasificacion'];
      $restfac = substr($nameclasfac, -1);
      $facilitarname = "SELECT nombre FROM react_contacto_familiar WHERE id = '$restfac'";
      $rfacilitarname = $mysqli ->query($facilitarname);
      $ffacilitarname = $rfacilitarname ->fetch_assoc();
      $nombre_clasificacion = $ffacilitarname['nombre'];
    }elseif ($idactivity === '4') {
      $nameclasimplem = $fila['clasificacion'];
      $restimplem = substr($nameclasimplem, -1);
      $implementarname = "SELECT nombre FROM react_acciones_seguridad_cp WHERE id = '$restimplem'";
      $rimplementarname = $mysqli ->query($implementarname);
      $fimplementarname = $rimplementarname ->fetch_assoc();
      $nombre_clasificacion = $fimplementarname['nombre'];
    }elseif ($idactivity === '5') {
      $nameclassalv = $fila['clasificacion'];
      $restsalv = substr($nameclassalv, -1);
      $salvaguardarname = "SELECT nombre FROM react_salvaguradar_integridad WHERE id = '$restsalv'";
      $rsalvaguardarname = $mysqli ->query($salvaguardarname);
      $fsalvaguardarname = $rsalvaguardarname ->fetch_assoc();
      $nombre_clasificacion = $fsalvaguardarname['nombre'];
    }else {
      $nombre_clasificacion = "N/A";
    }
    // consultas sql
    // traer nombre de la actividad
    $acttraer = "SELECT * FROM react_actividad_ejecucion WHERE id = '$idactivity'";
    $racttraer = $mysqli->query($acttraer);
    $facttraer = $racttraer->fetch_assoc();
    ?>
    <tbody>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $facttraer['nombre']; ?></td>
        <td><?php echo $nombre_clasificacion; ?></td>
        <td><?php echo $fila['unidad_medida']; ?></td>
        <td><?php echo $fila['cantidad']; ?></td>
        <td><?php echo date("d-m-Y", strtotime($fila['fecha'])); ?></td>
    </tr>
    </tbody>
    <?php
  }
  ?>
    </table>
  </div>
  <div id="showbotonpdf">
    <form class="" action="generar_pdf.php" method="POST">
      <input type="text" name="tipo_consultapdf" value="<?php echo $tipoconsulta; ?>" style="display:none;">
      <input type="text" name="usuariopdf" value="<?php echo $usuario; ?>" style="display:none;">
      <input type="text" name="actividadpdf" value="<?php echo $nombreactividad; ?>" style="display:none;">
      <input type="text" name="fechainicialpdf" value="<?php echo $fechainicial; ?>" style="display:none;">
      <input type="text" name="fechafinalpdf" value="<?php echo $fechafinal; ?>" style="display:none;">
      <button class="btn-flotante-imprimir-asistencia" type="submit"><img src='../../image/pdf.png' width='60' height='60'></button>
    </form>
  </div>
  <?php
}else {
  // echo "no existen datos de consulta";
  ?>
  <div class="alert alert-dark" role="alert">
    <h1>NO SE ENCONTRARON REGISTROS</h1>
  </div>
  <?php
}
}else {
?>
<div class="alert alert-dark" role="alert">
  <h1>NO SE ENCONTRARON REGISTROS</h1>
</div>
<?php
?>
<div class="alert alert-dark" role="alert">
  <img src="../../image/alert.png" alt="" width="50" height="50">
  <span><b>PARA REALIZAR LA BUSQUEDA DEBE ELEGIR LAS OPCIONES DE CONSULTA</b></span>
</div>
<?php
}
?>
