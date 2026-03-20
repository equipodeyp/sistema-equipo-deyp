<?php
// error_reporting(0);
include("../conexion.php");
// variables de fechas
$fechaInicio = $_POST['fecha_inicio'];
$fechaFin = $_POST['fecha_fin'];
// Consulta SQL con el rango de fechas
$sql = "SELECT * FROM react_sujetos_traslado
INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
WHERE react_traslados.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
ORDER BY react_traslados.fecha ASC";
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
        <table id="bd_planeacion_traslados" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
          $auxsum = 0;
          $auxsum2 = 0;
          $sujetosidrecor = array();
          $sujetosidrecor2 = array();
          $totalfin2 = 0;
          $totalfin = 0;
          $totaladmns = array();
          $servidoresid = array();
          while($row = $result->fetch_assoc()) {
            $iddd = intVal($row['id_sujeto']);
            array_push($sujetosidrecor, $iddd);
          }
          $miArray = array(1, 2, 2, 2, 3, 3, 4, 4, 5);
          // Verificar si el array tiene al menos dos elementos
          if (count($sujetosidrecor) >= 3) {
              // Iterar sobre el array
              for ($i = 0; $i < count($sujetosidrecor); $i++) {
                  // Obtener el valor anterior
                  $anterior = ($i > 0) ? $sujetosidrecor[$i - 1] : null;
                  // $anterior2 = ($i > 0) ? $sujetosidrecor[$i - 2] : null;
                  // Obtener el valor actual
                  $actual = $sujetosidrecor[$i];
                  // $actual2 = $sujetosidrecor[$i+1];
                  // Comparar si el valor anterior es igual al valor actual
                  if ($i > 0 && $anterior == $actual) {
                       // echo "Valor igual: 3" . PHP_EOL;
                       array_push($sujetosidrecor2, 3);
                  }elseif ($i > 0 && $anterior == $actual) {
                     // "Valecho or igual: 2" . PHP_EOL;
                     array_push($sujetosidrecor2, 2);
                  } else {
                      //Si es diferente, imprimimos el valor actual.
                       // echo "Valor desigual: 1" . PHP_EOL;
                       array_push($sujetosidrecor2, 1);
                  }
              }
          }
          $conteotrasdestino = "SELECT * FROM react_sujetos_traslado
          INNER JOIN react_destinos_traslados ON react_sujetos_traslado.id_destino = react_destinos_traslados.id
          INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
          INNER JOIN datospersonales ON react_sujetos_traslado.id_sujeto = datospersonales.id
          WHERE react_traslados.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
          ORDER BY react_traslados.fecha ASC";
          $rconteotrasdestino = $mysqli->query($conteotrasdestino);
          while ($fconteotrasdestino = $rconteotrasdestino->fetch_assoc()) {
            $auxsum = $auxsum +1;
            $valdestino = $fconteotrasdestino['id_destino'];

            // $conteotrasdestino2 = "SELECT COUNT(*) AS pt FROM react_sujetos_traslado
            //  INNER JOIN react_traslados ON react_sujetos_traslado.id_traslado = react_traslados.id
            //  WHERE react_sujetos_traslado.id_sujeto = '$idsujetorecor' AND react_sujetos_traslado.id_traslado ='$numtrasladorecor'";
            // $rconteotrasdestino2 = $mysqli->query($conteotrasdestino2);
            // $fconteotrasdestino2 = $rconteotrasdestino2->fetch_assoc();

            $resmotivodes = $fconteotrasdestino['motivo'];

            $restrasladounico = $fconteotrasdestino['idtrasladounico'];
            $resmunicipiodes = $fconteotrasdestino['municipio'];
            $cadena = $resmotivodes;
            $texto_minusculas = mb_strtolower($cadena, 'UTF-8');
            $texto_minusculas2 = mb_strtolower($resmunicipiodes, 'UTF-8');
            // $texto_minusculas; // Imprime "hola mundo, éste es un ejemplo."
            // echo "<br>";
            $foo = ucfirst($texto_minusculas);
            $foo2= ucfirst($texto_minusculas2);
            // echo "<br>";
             $ultimosCinco = substr($fconteotrasdestino['folio_expediente'], -7);
             // $fconteotrasdestino['identificador'];
            $cadena = $fconteotrasdestino['identificador'];
            // echo "<br>";
            $caracter = "-";
            // Encuentra la posición del carácter
            $posicion = strpos($cadena, $caracter);
            // Si el carácter existe en la cadena
            if ($posicion !== false) {
              // Extrae la parte de la cadena hasta el carácter
              $parte = substr($cadena, 0, $posicion);
              // Imprime la parte de la cadena
              $parte; // Imprimirá "Hola"
            }
            $texto = $parte;
            // Convertir el texto en un array de caracteres
            $arrayCaracteres = str_split($texto);
            // Unir los caracteres con un punto
            $textoConPuntos = implode(".", $arrayCaracteres);
            $concatenacion = 'Traslado_Exp_'.$ultimosCinco.'-'.$textoConPuntos.'.-'.$foo.'-'.$restrasladounico.'-'.$foo2;
          ?>

            <tr>
              <td style="text-align:center; border: 1px solid black;"><?php echo $auxsum; ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo $concatenacion; ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo date("d/m/Y", strtotime($fconteotrasdestino['fecha'])); ?></td>
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
