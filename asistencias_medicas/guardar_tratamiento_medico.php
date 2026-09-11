<?php
error_reporting(0);
require 'conexion.php';
session_start ();
$verifica = $_SESSION["verifica"];
if ($verifica == 1) {
    unset($_SESSION['verifica']);
    $name = $_SESSION['usuario'];

    $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
    $resultado = $mysqli->query($sentencia);
    $row=$resultado->fetch_assoc();

$id_asistencia=$_POST['id_asistencia'];
$id_sujeto=$_POST['id_sujeto'];
$id_servidor=$_POST['id_servidor'];
$nombre_medicamento=$_POST['nombre_medicamento'];
$gramaje=$_POST['gramaje'];
$cantidad_dosis=$_POST['cantidad_dosis'];
$descripcion_dosis=$_POST['descripcion_dosis'];
$periodo_dosis=$_POST['periodo_dosis'];
$tiempo_periodo=$_POST['tiempo_periodo'];
$duracion_dosis=$_POST['duracion_dosis'];
$tiempo_duracion=$_POST['tiempo_duracion'];
$via_administracion=$_POST['via_administracion'];
$hora_inicio=$_POST['hora_inicio'];
$fecha_inicio_tratamiento=$_POST['fecha_inicio_tratamiento'];
$recomendaciones=$_POST['recomendaciones'];
$estatus_medicamento=$_POST['estatus_medicamento'];
// echo $id_asistencia;
// echo "<br>";
// echo $id_sujeto;
// echo "<br>";
// echo $id_servidor;
// echo "<br>";
// echo $nombre_medicamento;
// echo "<br>";
// echo $gramaje;
// echo "<br>";
// echo $cantidad_dosis;
// echo "<br>";
// echo $descripcion_dosis;
// echo "<br>";
// echo $periodo_dosis;
// echo "<br>";
// echo $tiempo_periodo;
// echo "<br>";
// echo $duracion_dosis;
// echo "<br>";
// echo $tiempo_duracion;
// echo "<br>";
// echo $via_administracion;
// echo "<br>";
// echo $hora_inicio_tratamiento;
// echo "<br>";
// echo $fecha_inicio_tratamiento;
// echo "<br>";
// echo $recomendaciones;
// echo "<br>";
// echo $estatus_medicamento;
// echo "<br>";


$indicaciones = $cantidad_dosis . " " . $descripcion_dosis .  " CADA " . $periodo_dosis . " " . $tiempo_periodo . " POR " .  $duracion_dosis . " " . $tiempo_duracion;
$temporalidad_concat = $duracion_dosis . " " . $tiempo_duracion;
$temporalidad = $temporalidad_concat;
// echo $indicaciones;
// echo "<br>";


function calcularFechaFinTratamiento($fechaInicio, $indicacion) {
    
    $indicacion = mb_strtolower($indicacion, 'UTF-8');
    
    $patron = '/(\d+)\s*(dia|día|semana|mes|año|año|ano|ano|hora)/u';
    
    if (preg_match($patron, $indicacion, $coincidencias)) {
        $cantidad = intval($coincidencias[1]); // El número detectado
        $unidad = $coincidencias[2];           // La palabra detectada
        
        $unidadIngles = 'days';
        
        // 3. Evaluar la unidad de tiempo
        switch ($unidad) {
            case 'dia':
            case 'día':
                $unidadIngles = 'days';
                break;
            case 'semana':
                $unidadIngles = 'weeks';
                break;
            case 'mes':
                $unidadIngles = 'months';
                break;
            case 'año':
            case 'años':
            case 'ano':
            case 'anos':
                // OPCIÓN DIRECTA (Recomendada por precisión de bisiestos):
                $unidadIngles = 'years';
                
                // OPCIÓN ALTERNATIVA (Por si requieres estrictamente transformarlo a meses):
                // $cantidad = $cantidad * 12;
                // $unidadIngles = 'months';
                break;
            case 'hora':
                // Convertir horas a días (redondeando hacia arriba)
                $diasPorHoras = ceil($cantidad / 24);
                $cantidad = $diasPorHoras;
                $unidadIngles = 'days';
                break;
            default:
                return "Unidad de tiempo no reconocida.";
        }
        
        // 4. Calcular la fecha utilizando el objeto DateTime de PHP
        $fecha = new DateTime($fechaInicio);
        $fecha->modify("+$cantidad $unidadIngles");
        
        return $fecha->format('Y-m-d');
    }
    
    return "No se pudo determinar la duración del tratamiento en las indicaciones.";
}

// $fecha_inicio_tratamiento = "2026-09-04"; // Fecha actual 

$temporalidad_array = [];

array_push($temporalidad_array, $temporalidad); 


// echo "<h3>Resultados del Cálculo Actualizado (Años Soportados)</h3>";
// echo "Fecha de inicio base: <b>$fecha_inicio_tratamiento</b><br><br>";

foreach ($temporalidad_array as $instruccion) {
    $fecha_fin_tratamiento = calcularFechaFinTratamiento($fecha_inicio_tratamiento, $instruccion);
    // echo "• <b>Indicación:</b> \"$instruccion\" <br>";
    // echo "  <b>Fecha Fin:</b> $fecha_fin_tratamiento <br><br>";
    
    $fechaOriginaldef = $fecha_fin_tratamiento;


    $fecha = new DateTime($fechaOriginaldef);


    $fecha->modify('-1 day');


    $fechaRestada = $fecha->format('d-m-Y');
    $fechaRestada2 = $fecha->format('Y-m-d');

    // echo $fechaRestada; 
    // echo $fechaRestada2; 



}







$query = "INSERT INTO tratamiento_medico (id_asistencia, id_sujeto, servidor_registra, nombre_medicamento, gramaje, indicaciones, 
via_administracion, hora_inicio, inicio_tratamiento, fin_tratamiento, recomendaciones, estatus_medicamento) 
VALUES ('$id_asistencia', '$id_sujeto', '$id_servidor', '$nombre_medicamento', '$gramaje', '$indicaciones', 
'$via_administracion', '$hora_inicio', '$fecha_inicio_tratamiento', '$fechaRestada2', '$recomendaciones', '$estatus_medicamento')";
$result = $mysqli->query($query);


if($result) {
    echo $verifica;
    echo ("<script type='text/javaScript'>
    window.location.href='./tratamiento_medico.php';
    window.alert('!!!!!Registro exitoso¡¡¡¡¡')
</script>");
    } else {  }
} else {
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";


}
























?>





