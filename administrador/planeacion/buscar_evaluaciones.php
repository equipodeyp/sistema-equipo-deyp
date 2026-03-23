<?php
// error_reporting(0);
include("../conexion.php");
// variables de fechas
$fechaInicio = $_POST['fecha_inicio'];
$fechaFin = $_POST['fecha_fin'];
// Consulta SQL con el rango de fechas
$sql = "SELECT DISTINCT react_actividad.id_sujeto,
              react_actividad.folio_expediente, react_actividad.idactividad,
              react_actividad_analisis.nombre
              FROM react_actividad
              INNER JOIN react_actividad_analisis
              ON react_actividad.idactividad = react_actividad_analisis.id_actividad
              WHERE react_actividad.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
              AND react_actividad.idactividad = 'SAR-01'
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
        <table id="bd_planeacion_evaluaciones" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            </h3>
              <tr>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">NO.</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FOLIO EXPEDIENTE</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">ID SUJETO</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">NOMBRE ACTIVIDAD</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">FECHA</th>
                <th style="text-align:center; color: white; border: 1px solid black; vertical-align: middle;">NOMENCLATURA</th>
              </tr>
          </thead>
          <tbody>
          <?php
          while($row = $result->fetch_assoc()) {
            $auxsum = $auxsum +1;
            $id_sujeto = $row['id_sujeto'];
            // echo $id_sujeto;
            // echo $fechainicial;
            $getactividad = "SELECT DISTINCT react_actividad.id_sujeto,
            react_actividad.folio_expediente, react_actividad.idactividad,
            react_actividad_analisis.nombre, react_actividad.fecha
            FROM react_actividad
            INNER JOIN react_actividad_analisis
            ON react_actividad.idactividad = react_actividad_analisis.id_actividad
            WHERE react_actividad.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
            AND react_actividad.idactividad = 'SAR-01' AND react_actividad.id_sujeto = '$id_sujeto'
            ORDER BY react_actividad.fecha ASC
            LIMIT 1";

            $resultado_act = $mysqli->query($getactividad);
            $row_resu = $resultado_act->fetch_assoc();
            // echo $r_acti = $row_resu['fecha'];

            $texto = $row['folio_expediente'];
            // Imprimir "Extraer caracteres"
            $fol_ex = substr($texto, 17);
            // echo $fol_exp;

            // IMPRIMIR SOLO LETRAS
            $texto_idsujeto = $row['id_sujeto'];

            $resultado = "";
            for ($i = 0; $i < strlen($texto_idsujeto); $i++) {
                if (ctype_alpha($texto_idsujeto[$i])) {
                    $resultado .= $texto_idsujeto[$i];
                }
            }
            // echo $resultado;
            // Evaluación_EXP_006/2022-JVT
            $concatenacion = 'Evaluación_EXP_'.$fol_ex.'-'.$resultado;
          ?>
          <tr>
            <td><?php echo $auxsum; ?></td>
            <td><?php echo $row['folio_expediente']; ?></td>
            <td><?php echo $row['id_sujeto']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo date("d/m/Y", strtotime($row_resu['fecha'])); ?></td>
            <td><?php echo $concatenacion; ?></td>
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
