<?php
// error_reporting(0);
include("../conexion.php");
// variables de fechas
$fechaInicio = $_POST['fecha_inicio'];
$fechaFin = $_POST['fecha_fin'];

// Consulta SQL con el rango de fechas
$sql = "SELECT react_actividad.id_subdireccion, react_actividad.fecha, react_actividad.id_evidencia, react_actividad.folio_expediente, react_actividad.id_sujeto

        FROM react_actividad

        INNER JOIN react_actividad_apoyo
        ON react_actividad.id_actividad = react_actividad_apoyo.id 
        WHERE react_actividad.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
        AND react_actividad_apoyo.id = '9'
        AND react_actividad.id_subdireccion = '2'

        ORDER BY react_actividad.fecha ASC";

$result = $mysqli->query($sql);




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
        <table id="bd_planeacion_expedientes" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            </h3>
              <tr>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">NO.</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;" class="table-header" style="text-align:center">ACTIVIDAD</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;" class="table-header" style="text-align:center">FECHA</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;" class="table-header" style="text-align:center">FOLIO EXPEDIENTE</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;" class="table-header" style="text-align:center">ID SUJETO</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;" class="table-header" style="text-align:center">NOMENCLATURA</th>

              </tr>
          </thead>
          <tbody>
          <?php
          while($row = $result->fetch_assoc()) {
            $auxsum = $auxsum +1;
            $n_actividad = 'Llevar a cabo la revisión jurídica de los Estudios Técnicos elaborados por el Grupo Multidisciplinario';
            $texto_idsujeto = $row['id_sujeto'];

            $soloLetras_idsujeto = preg_replace('/[^a-zA-ZáéíóúüÁÉÍÓÚÜñÑ]+/', '', $texto_idsujeto);

            $texto_expediente = substr($row['folio_expediente'], -8);

            $concatenacion = 'Expediente_Exp_'.$texto_expediente.'_EstudioTécnico Evaluación de Riesgo'; 

          ?>
            <tr>
              <td style="text-align:center; border: 1px solid black;"><?php echo $auxsum; ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo $n_actividad; ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo date("d/m/Y", strtotime($row['fecha'])); ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo $row['folio_expediente']; ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo $row['id_sujeto']; ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo "$concatenacion"; ?></td>
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
