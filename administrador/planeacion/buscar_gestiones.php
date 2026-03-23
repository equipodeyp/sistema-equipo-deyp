<?php
// error_reporting(0);
include("../conexion.php");
// variables de fechas
$fechaInicio = $_POST['fecha_inicio'];
$fechaFin = $_POST['fecha_fin'];
// Consulta SQL con el rango de fechas
$sql = "SELECT * FROM solicitud_asistencia
              INNER JOIN cita_asistencia
              ON solicitud_asistencia.id_asistencia = cita_asistencia.id_asistencia
              WHERE cita_asistencia.fecha_asistencia BETWEEN '$fechaInicio' AND '$fechaFin'
              AND solicitud_asistencia.etapa = 'ASISTENCIA MÉDICA COMPLETADA'
              ORDER BY cita_asistencia.fecha_asistencia ASC";
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
        <table id="bd_planeacion_gestiones" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            </h3>
              <tr>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">NO.</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">ID ASISTENCIA MEDICA</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA CITA</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">NOMENCLATURA</th>
              </tr>
          </thead>
          <tbody>
          <?php

          while($row = $result->fetch_assoc()) {
            $auxsum = $auxsum +1;
            $txt_sin_acentos = $row['servicio_medico'];
            $original = array('á','é','í','ó','ú','ñ','Á','É','Í','Ó','Ú','Ñ');
            $reemplazo = array('a','e','i','o','u','n','A','E','I','O','U','N');
            $limpio = str_replace($original, $reemplazo, $txt_sin_acentos);

            $txt_minusculas = strtolower($limpio);
            $txt_altas = ucwords($txt_minusculas);

            $concatenacion = 'Gestión_'.$row['id_asistencia'].'_'.$txt_altas;
          ?>

            <tr>
              <td style="text-align:center; border: 1px solid black;"><?php echo $auxsum; ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo $row['id_asistencia']; ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo date("d/m/Y", strtotime($row['fecha_asistencia'])); ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo $concatenacion; ?></td>
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
