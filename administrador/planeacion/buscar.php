<?php
// Configuración de conexión (ajusta tus credenciales)
$conexion = new mysqli("localhost", "root", "", "sistemafgjem");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$fechaInicio = $_POST['fecha_inicio'];
$fechaFin = $_POST['fecha_fin'];

// Consulta SQL con el rango de fechas
$sql = "SELECT * FROM react_actividad
WHERE react_actividad.fecha BETWEEN '$fechaInicio' AND '$fechaFin'
AND react_actividad.id_subdireccion = 4 AND react_actividad.id_actividad = 6
ORDER BY react_actividad.fecha ASC";
$result = $conexion->query($sql);

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
      <div class="table-responsive">
        <h1> <b>PERIODO DE CONSULTA DE LA INFORMACIÓN</b> </h1><br>
        <h3> <b>DEL <?php transformarmesaletra($diainicial, $mesnumeroinicial, $anioinicial); ?> AL <?php transformarmesaletra($diafinal, $mesnumerofinal, $aniofinal); ?></b> </h3>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              </h3>
                <tr>
                  <th class="table-header" style="text-align:center">NO.</th>
                  <th class="table-header" style="text-align:center">FECHA</th>
                  <th class="table-header" style="text-align:center">MUNICIPIO</th>
                  <th class="table-header" style="text-align:center">EXPEDIENTE</th>
                  <th class="table-header" style="text-align:center">ID DE LA PP O SP</th>
                  <th class="table-header" style="text-align:center">KILOMETROS</th>
                  <th class="table-header" style="text-align:center">ID RONDIN META</th>
                </tr>
            </thead>




  <?php

    while($row = $result->fetch_assoc()) {
      include("../conexion.php");
      $auxsum = $auxsum +1;
      $idunico = $row['id_sujeto'];
      $ultimosCinco = substr($row['folio_expediente'], -8);
      $getinfosujeto = "SELECT * FROM datospersonales WHERE id = '$idunico'";
      $rgetinfosujeto = $mysqli->query($getinfosujeto);
      $fgetinfosujeto  = $rgetinfosujeto ->fetch_assoc();
      $cadena = $fgetinfosujeto['identificador'];
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
      $concatenar_rondin ='Ruta_Exp_'.$ultimosCinco.'_'.$textoConPuntos.'.';
        ?>


        <tr>
          <td><?php echo $auxsum; ?></td>
          <td><?php echo date("d/m/Y", strtotime($row['fecha'])); ?></td>
          <td><?php echo $row['entidad_municipio']; ?></td>
          <td><?php echo $row['folio_expediente']; ?></td>
          <td><?php echo $fgetinfosujeto['identificador']; ?></td>
          <td><?php echo $row['kilometraje']; ?></td>
          <td><?php echo $concatenar_rondin; ?></td>
        </tr>
        <?php
    }
    echo "</table>";
    ?>
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
    echo "0 resultados en este rango.";
}
$conexion->close();
?>
