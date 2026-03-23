<?php
// error_reporting(0);
include("../conexion.php");
// variables de fechas
$fechaInicio = $_POST['fecha_inicio'];
$fechaFin = $_POST['fecha_fin'];
// funcion para contar letras de una palabra
function contarLetrasPorPalabraasis($texto) {
  $palabras = str_word_count($texto, 1); // Obtiene un array de palabras
  $resultados = [];
  foreach ($palabras as $palabra) {
    $resultados[$palabra] = strlen($palabra);
  }
  return $resultados;
}
// Consulta SQL con el rango de fechas
$sql = "SELECT * FROM medidas
WHERE date_ejecucion BETWEEN '$fechaInicio' AND '$fechaFin' AND clasificacion = 'ASISTENCIA'
ORDER BY date_ejecucion ASC";
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
        <table id="bd_planeacion_informe_asistencias" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
            $auxsum++;
            $folioexpediente = $row['folioexpediente'];
            $idsujeto = $row['id_persona'];
            $cadena = $row['medida'];
            $resultado = strrchr($cadena, ".");
            if ($resultado !== false) {
              $resultado = substr($resultado, 1); // Eliminar el punto inicial
            }else {
            $resultado = $row['medida'];
            }
            $cadena = $resultado;
            $str = mb_strtolower($cadena);
            $cadena_mayuscula2 = ucwords($str);

            $getexpinfo = "SELECT * FROM expediente WHERE fol_exp = '$folioexpediente'";
            $rgetexpinfo = $mysqli->query($getexpinfo);
            $fgetexpinfo = $rgetexpinfo->fetch_assoc();
            $numexpediente = $fgetexpinfo['num_consecutivo'];
            $añoexpediente = $fgetexpinfo['año'];
             // $numero_de_tres_digitos = "123";
            $dos_primeros_digitos = substr($numexpediente, 1, 2);
            // echo $dos_primeros_digitos; // Output: 12
            $fgetexpinfo['año'];

            $getsujinfo = "SELECT * FROM datospersonales WHERE id = '$idsujeto'";
            $rgetsujinfo = $mysqli->query($getsujinfo);
            $fgetsujinfo = $rgetsujinfo->fetch_assoc();
            $fgetsujinfo['identificador'];

            $cadena = $fgetsujinfo['identificador'];
            //
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
            $miTexto = $str;
            $resultados = contarLetrasPorPalabraasis($miTexto);
            $arraytextmedida =array();
            foreach ($resultados as $palabra => $cantidadLetras) {
              // echo "La palabra '$palabra' tiene $cantidadLetras letras.\n";
              if ($cantidadLetras > 3) {
                // echo "------>hay que convertir a mayuscula la primera letra=======>";
                 $getpalabramayuscula = ucwords($palabra);
                array_push($arraytextmedida, $getpalabramayuscula);
              }else {
                //  "------>se deja en minuscula=======>";
                 $getpalabramayuscula = $palabra;
                array_push($arraytextmedida, $getpalabramayuscula);
              }
            }            
          ?>
            <tr>
              <td style="text-align:center; border: 1px solid black;"><?php echo $auxsum; ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php   echo 'Informe_Exp_'.$dos_primeros_digitos.'/'.$añoexpediente.'-'.$texto.'-';
                foreach($arraytextmedida as $numero) {
                  echo $numero.' ';
               } ?></td>
              <td style="text-align:center; border: 1px solid black;"><?php echo date("d/m/Y", strtotime($row['date_ejecucion'])); ?></td>
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
