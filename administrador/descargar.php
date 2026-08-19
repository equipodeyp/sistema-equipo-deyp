<?php
date_default_timezone_set("America/Mexico_City");
include("conexion.php");
session_start();

if (!isset($_SESSION['usuario'])) {
    exit("No autorizado");
}

// $ruta_fisica_base = $_SERVER['DOCUMENT_ROOT'] . '/pruebas/sistema-equipo-deypv1.2/';
$ruta_fisica_base = $_SERVER['DOCUMENT_ROOT'] . '/sistema-equipo-deyp/';

// 1. Descargar todo en ZIP
if (isset($_GET['accion']) && $_GET['accion'] === 'descargar_zip') {
    $fecha_inicio = $_GET['fecha_inicio'] ?? '';
    $fecha_fin = $_GET['fecha_fin'] ?? '';

    if (!empty($fecha_inicio) && !empty($fecha_fin)) {
        $sql = "SELECT react_image_actividad.ruta, react_image_actividad.image
                FROM `react_actividad`
                INNER JOIN react_image_actividad ON react_actividad.id = react_image_actividad.id_Actividad
                WHERE react_actividad.fecha BETWEEN ? AND ?
                  AND react_actividad.id_subdireccion = 4
                  AND react_actividad.id_actividad = 7";

        if ($stmt = $mysqli->prepare($sql)) {
            $ini_full = $fecha_inicio . ' 00:00:00';
            $fin_full = $fecha_fin . ' 23:59:59';
            $stmt->bind_param("ss", $ini_full, $fin_full);
            $stmt->execute();
            $res_query = $stmt->get_result();

            $zip = new ZipArchive();
            $nombreZip = 'actividades_' . $fecha_inicio . '_al_' . $fecha_fin . '.zip';
            $rutaTemporal = sys_get_temp_dir() . '/' . $nombreZip;

            if ($zip->open($rutaTemporal, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                while ($img = $res_query->fetch_assoc()) {
                    $subRutaLimpia = str_replace(['../../', './'], '', $img['ruta']);
                    $archivoFisico = $ruta_fisica_base . $subRutaLimpia;
                    if (file_exists($archivoFisico)) {
                        $zip->addFile($archivoFisico, $img['image']);
                    }
                }
                $zip->close();
                $stmt->close();

                header('Content-Description: File Transfer');
                header('Content-Type: application/zip');
                header('Content-Disposition: attachment; filename="' . basename($nombreZip) . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($rutaTemporal));
                readfile($rutaTemporal);
                unlink($rutaTemporal);
                exit;
            }
        }
    }
    exit("No hay archivos para comprimir.");
}

// 2. Descargar archivo individual
if (isset($_GET['descargar']) && !empty($_GET['descargar'])) {
    $subRutaLimpia = str_replace(['../../', './'], '', $_GET['descargar']);
    $archivoFisico = $ruta_fisica_base . $subRutaLimpia;

    if (file_exists($archivoFisico)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($archivoFisico) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($archivoFisico));
        readfile($archivoFisico);
        exit;
    } else {
        exit("El archivo no existe físicamente en el servidor.");
    }
}
?>
