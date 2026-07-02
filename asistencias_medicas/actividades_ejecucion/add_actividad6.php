<?php
$consecutivosub = $n_con;
$idactividad ='SUBEM-06';
$id_subdireccion = '4';
$funcion = $_POST['funcion'];
$actividad = $_POST['actividad'];
$unidadmedida = $_POST['unidadmedida'] ;
$reportemetas = 'SI';
$clasificacion = 'NA';
$fechaactividad = $_POST['fechaactividad'];
$cantidad = $_POST['cantidad'];
$entidadmunicipio = $_POST['entidadmunicipio'];
$folioexpediente = $_POST['folioexpediente'];
$id_sujeto = $_POST['id_sujeto'];
$evidencia = 'IMAGEN';
$id_evidencia = 'NA';
$kilometros = $_POST['kilometros'];
$observaciones = strtoupper($_POST['observaciones']);
$informe_anual = 'REPORTADO';
$fecha_alta = date('Y-m-d H:i:s');
$name = $_SESSION['usuario'];
$year_alta = date('Y');
// // Cómo subir el archivo
if ($_FILES['archivo']['error'] === 0) {
  $archivo = $_FILES['archivo'];
  $nombre_temporal = $archivo['tmp_name'];
  $nombre_original = $archivo['name'];
  $tipo_archivo = $archivo['type'];
  $tamano_archivo = $archivo['size'];
  // Verificar el tipo de archivo
  if ($tipo_archivo === 'image/jpeg' || $tipo_archivo === 'image/png') {
      // Mover el archivo a una carpeta de destino
      $ruta_destino = "../../imagenesbdd/ejecucion_medidas/". $nombre_original;  //  reemplazar con la ruta deseada
      if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
        echo "<h1>";
        echo "Archivo subido correctamente.";
        echo "</h1>";
      } else {
        echo "<h1>";
        echo "Error al subir el archivo.";
        echo "</h1>";
      }
    } else {
      echo "<h1>";
      echo "Tipo de archivo no permitido.";
      echo "</h1>";
    }
  } else {
    echo "<h1>";
    echo "Error al subir el archivo. Código de error: " . $_FILES['archivo']['error'];
    echo "</h1>";
  }
  $addactividad = "INSERT INTO react_actividad(consecutivosub, idactividad, id_subdireccion, funcion, id_actividad, unidad_medida, reporte_metas, clasificacion, fecha, cantidad, entidad_municipio,
                                            folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, observaciones, informe_anual, fecha_alta, usuario, year)
        VALUES ('$consecutivosub', '$idactividad', '$id_subdireccion', '$funcion', '$actividad', '$unidadmedida', '$reportemetas', '$clasificacion', '$fechaactividad', '$cantidad', '$entidadmunicipio',
                '$folioexpediente', '$id_sujeto', '$evidencia', '$id_evidencia', '$kilometros', '$observaciones', '$informe_anual', '$fecha_alta', '$name', '$year_alta')";
  $raddactividad = $mysqli->query($addactividad);

  $horaact = date("H:i:s");
  $qry = "select max(ID) As id from react_actividad";
  $result = $mysqli->query($qry);
  $row = $result->fetch_assoc();
  $id_activity =$row["id"];
  // registrar iamge en la BD
  $addimageruta = "INSERT INTO react_image_actividad(id_actividad, ruta, usuario, fecha,  hora, image, tipo)
                   VALUES('$id_activity', '$ruta_destino', '$name', '$fecha_alta', '$horaact', '$nombre_original', '$tipo_archivo')";
  $raddimageruta = $mysqli->query($addimageruta);
?>
