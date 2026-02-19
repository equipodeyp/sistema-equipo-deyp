<?php
if (isset($_POST['imagen'])) {
    $img = $_POST['imagen'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);

    // RUTA CORREGIDA: Agregamos la barra tras C: y el nombre del archivo al final
    // Es vital que termine en .png para que no se considere una carpeta
    $file = 'C:/Users/FGJJE/Downloads/grafica_expedientes.png';
    $file = 'C:/Users/FGJEM/Downloads/grafica_expedientes.png';

    // Intentar guardar
    if (file_put_contents($file, $data)) {
        echo "Éxito: Imagen guardada en " . $file;
    } else {
        echo "Error: Permiso denegado. Sigue los pasos de abajo.";
    }
}
?>
