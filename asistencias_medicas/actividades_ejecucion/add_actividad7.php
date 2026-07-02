<?php
$consecutivosub = $n_con;
$idactividad ='SUBEM-07';
$id_subdireccion = '4';
$funcion = $_POST['funcion'];
$actividad = $_POST['actividad'];
$unidadmedida = $_POST['unidadmedida'] ;
$reportemetas = 'NO';
$clasificacion = 'NA';
$fechaactividad = $_POST['fechaactividad'];
$cantidad = 'NA';
$entidadmunicipio = 'NA';
$folioexpediente = $_POST['folioexpediente'];
$id_sujeto = $_POST['id_sujeto'];
$evidencia = 'IMAGEN';
$id_evidencia = strtoupper($_POST['idevidencia']);
$kilometros = 'NA';
$observaciones = strtoupper($_POST['observaciones']);
$informe_anual = 'REPORTADO';
$fecha_alta = date('Y-m-d H:i:s');
$name = $_SESSION['usuario'];
$year_alta = date('Y');
//
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
// Reemplaza las diagonales de "UPSIPPED/TOL/053/001/2026" por guiones medios
$folioLimpio = str_replace('/', '-', $folioexpediente);
$getidebntificadorsuj = "SELECT identificador FROM datospersonales WHERE id = '$id_sujeto'";
$rgetidebntificadorsuj = $mysqli->query($getidebntificadorsuj);
$fgetidebntificadorsuj = $rgetidebntificadorsuj->fetch_assoc();
$identificador = $fgetidebntificadorsuj['identificador'];
$fechaactividad2 = date("d-m-Y", strtotime($fechaactividad));
$directorioDestino = "../../fotos/actividades_ejecucion/" . $folioLimpio . "/" . $identificador . "/". $fechaactividad2 . "/";

if (!file_exists($directorioDestino)) {
    mkdir($directorioDestino, 0777, true);
}

// VALIDACIÓN BACKEND: Validar si el arreglo existe y tiene al menos un archivo válido cargado
$tieneArchivos = false;
if (isset($_FILES['imagenes_slider'])) {
    foreach ($_FILES['imagenes_slider']['tmp_name'] as $indice => $temporalPath) {
        if ($_FILES['imagenes_slider']['error'][$indice] === UPLOAD_ERR_OK && !empty($temporalPath)) {
            $tieneArchivos = true;
            break;
        }
    }
}

// Si no se detectó ningún archivo en el envío HTTP se frena el flujo
if (!$tieneArchivos) {
    die("Error: El servidor requiere que cargues al menos una imagen.");
}

// Si pasa la validación, procesa de forma normal
$archivos = $_FILES['imagenes_slider'];
foreach ($archivos['tmp_name'] as $indice => $temporalPath) {
    if ($archivos['error'][$indice] === UPLOAD_ERR_OK) {
        $nombreOriginal = basename($archivos['name'][$indice]);
        $nombreLimpio = time() . "_" . preg_replace("/[^a-zA-Z0-9.]/", "_", $nombreOriginal);
        $rutaFinal = $directorioDestino . $nombreLimpio;

        if (move_uploaded_file($temporalPath, $rutaFinal)) {
            echo "Imagen guardada con éxito en el servidor: " . $nombreLimpio . "<br>";
        }
        // Obtener el tipo de archivo (MIME type) usando el índice correcto
        $tipo_archivo = $archivos['type'][$indice];
        // Imprimir el tipo de archivo solicitado
        $tipo_archivo . '<br>';
        $addimageruta = "INSERT INTO react_image_actividad(id_Actividad, ruta, usuario, fecha,  hora, image, tipo)
                         VALUES('$id_activity', '$rutaFinal', '$name', '$fecha_alta', '$horaact', '$nombreLimpio', '$tipo_archivo')";
        $raddimageruta = $mysqli->query($addimageruta);
    }
}
?>
