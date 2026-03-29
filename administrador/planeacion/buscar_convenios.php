<?php
// error_reporting(0);
include("../conexion.php");
// variables de fechas
$fechaInicio = $_POST['fecha_inicio'];
$fechaFin = $_POST['fecha_fin'];
// Consulta SQL con el rango de fechas
$sql = "SELECT * FROM evaluacion_persona
WHERE tipo_convenio != ' '
AND fecha_firma BETWEEN '$fechaInicio' AND '$fechaFin'";
$result = $mysqli->query($sql);

$sql2 = "SELECT * FROM determinacionincorporacion
WHERE convenio = 'FORMALIZADO' AND date_convenio BETWEEN '$fechaInicio' AND '$fechaFin'";
$result2 = $mysqli->query($sql2);

if ($result->num_rows > 0) {
  function transformarmesaletra($pasardia, $pasarmes, $pasaranio){
    switch ($pasarmes) {
      case 1:
      echo $fecha_formateada = $pasardia." DE ENERO DE ".$pasaranio;
      break;
      case 2:
      echo $fecha_formateada = $pasardia." DE FEBRERO DE ".$pasaranio;
      break;
      case 3:
      echo $fecha_formateada = $pasardia." DE MARZO DE ".$pasaranio;
      break;
      case 4:
      echo $fecha_formateada = $pasardia." DE ABRIL DE ".$pasaranio;
      break;
      case 5:
      echo $fecha_formateada = $pasardia." DE MAYO DE ".$pasaranio;
      break;
      case 6:
      echo $fecha_formateada = $pasardia." DE JUNIO DE ".$pasaranio;
      break;
      case 7:
      echo $fecha_formateada = $pasardia." DE JULIO DE ".$pasaranio;
      break;
      case 8:
      echo $fecha_formateada = $pasardia." DE AGOSTO DE ".$pasaranio;
      break;
      case 9:
      echo $fecha_formateada = $pasardia." DE SEPTIEMBRE DE ".$pasaranio;
      break;
      case 10:
      echo $fecha_formateada = $pasardia." DE OCTUBRE DE ".$pasaranio;
      break;
      case 11:
      echo $fecha_formateada = $pasardia." DE NOVIEMBRE DE ".$pasaranio;
      break;
      case 12:
      echo $fecha_formateada = $pasardia." DE DICIEMBRE DE ".$pasaranio;
      break;
    }
  }
  // $fechainicial;
  $diainicial = date('d', strtotime($fechaInicio));
  $mesnumeroinicial = date('m', strtotime($fechaInicio));
  $anioinicial = date('Y', strtotime($fechaInicio));
  // transformarmesaletra($diainicial, $mesnumeroinicial, $anioinicial);
  // $fechafin;
  $diafinal = date('d', strtotime($fechaFin));
  $mesnumerofinal = date('m', strtotime($fechaFin));
  $aniofinal = date('Y', strtotime($fechaFin));
  $auxsum = 0;
  ?>
  <br><br>
  <div class="" id="showafterconsul">
    <div class="container well form-horizontal" style="text-align:center;padding:10px;border:solid 3px; width:98%;border-radius:20px;shadow; float:left;width: 100%;outline: white solid thin">
      <h1> <b>PERIODO DE CONSULTA DE LA INFORMACIÓN</b> </h1><br>
      <h3> <b>DEL <?php transformarmesaletra($diainicial, $mesnumeroinicial, $anioinicial); ?> AL <?php transformarmesaletra($diafinal, $mesnumerofinal, $aniofinal); ?></b> </h3>
      <div class="table-responsive">
        <table id="bd_planeacion_convenios" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            </h3>
              <tr>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">NO.</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">ID TRASLADO</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA</th>
              </tr>
          </thead>
          <tbody>
          <?php
          while($row = $result->fetch_assoc()) {
            $auxsum = $auxsum +1;
            $idunico = $row['id_unico'];
            $ultimosCinco = substr($row['folioexpediente'], -8);
            $concatenar_rondin ='Convenio_Exp_'.$ultimosCinco.'_'.$idunico.'.';
          ?>
            <tr>
              <td style="text-align:center; border: 1px solid black;"><?php echo $auxsum; ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo $concatenar_rondin; ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo date("d/m/Y", strtotime($row['fecha_firma'])); ?></td>
            </tr>
          <?php
          }
          while($row2 = $result2->fetch_assoc()) {
            $auxsum = $auxsum +1;
            $idsujeto = $row2['id_persona'];
            $getinfosujeto = "SELECT * FROM datospersonales WHERE id = '$idsujeto'";
            $rgetinfosujeto = $mysqli->query($getinfosujeto);
            $fgetinfosujeto = $rgetinfosujeto->fetch_assoc();
            $idunico = $fgetinfosujeto['identificador'];
            $ultimosCinco = substr($row2['folioexpediente'], -8);
            $concatenar_rondin ='Convenio_Exp_'.$ultimosCinco.'_'.$idunico.'.';
          ?>
            <tr>
              <td style="text-align:center; border: 1px solid black;"><?php echo $auxsum; ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo $concatenar_rondin; ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo date("d/m/Y", strtotime($row2['date_convenio'])); ?></td>
            </tr>
          <?php
          }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php
  } else {
  ?>
  <div style='padding: 20px; background-color: #fff3cd; color: black; border: 3px solid black; border-radius: 15px; text-align: center; margin-top: 20px;'>
    <h2>
      <strong>¡Atención!</strong> No se encontraron resultados para el rango de fechas seleccionado
    </h2>
  </div>
  <?php
  }
  $mysqli->close();
?>
