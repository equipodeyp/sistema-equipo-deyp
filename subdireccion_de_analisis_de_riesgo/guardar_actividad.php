<?php
error_reporting(0);
date_default_timezone_set("America/Mexico_City");
session_start ();
require './conexion.php';
$check_actividad = $_SESSION["check_actividad"];
if ($check_actividad == 1) {
    unset($_SESSION['check_actividad']);
    $name = $_SESSION['usuario'];
    // echo $name = $_SESSION['usuario'];
    // echo "<br>";
    $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
    $result = $mysqli->query($sentencia);
    $row=$result->fetch_assoc();

$numero_actividad = $_POST['numero_actividad'];
$clasificacion_uno = $_POST['clasificacion_actividad_uno'];
$clasificacion_dos = $_POST['clasificacion_actividad_dos'];
$clasificacion_tres = $_POST['clasificacion_actividad_tres'];
$clasificacion_cuatro = $_POST['clasificacion_actividad_cuatro'];
$clasificacion_cinco = $_POST['clasificacion_actividad_cinco'];
$clasificacion_seis = $_POST['clasificacion_actividad_seis'];
$clasificacion_siete = $_POST['clasificacion_actividad_siete'];
$cantidad_actividad = 1;
$fecha_actividad = $_POST['fecha_actividad'];
$observaciones_actividad = $_POST['observaciones_actividad'];

$folio_expediente = $_POST['folio_expediente'];
$id_sujeto = $_POST['id_sujeto'];
$numero_oficio_solicitud = $_POST['numero_oficio_actividad'];

// echo $numero_actividad;
// echo "<br>";
// echo $clasificacion_uno;
// echo "<br>";
// echo $clasificacion_dos;
// echo "<br>";
// echo $clasificacion_tres;
// echo "<br>";
// echo $clasificacion_cuatro;
// echo "<br>";
// echo $clasificacion_cinco;
// echo "<br>";
// echo $cantidad_actividad;
// echo "<br>";
// echo $fecha_actividad;
// echo "<br>";
// echo $observaciones_actividad;
// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo $folio_expediente;
// echo "<br>";
// echo $id_sujeto;
// echo "<br>";
// echo $numero_oficio_solicitud;
// echo "<br>";
// echo "<br>";
// echo "<br>";

$sentencia1=" SELECT* FROM react_actividad_analisis WHERE id = '$numero_actividad'";
$result1 = $mysqli->query($sentencia1);
$row1=$result1->fetch_assoc();

$nombre_actividad = $row1['nombre'];
$consecutivo_actividad = $row1['id'];
$id_actividad = $row1['id_actividad'];
$subdireccion_actividad = $row1['subdireccion'];
$funcion_actividad = $row1['funcion'];
$unidad_medida_actividad = $row1['unidad_medida'];
$informe_anual_actividad = $row1['informe_anual'];
$evidencia_interna_actividad = $row1['evidencia_interna'];
$folio_expediente_actividad = $row1['folio_expediente'];
$id_sujeto_actividad = $row1['id_sujeto'];
$clasificacion_actividad = $row1['clasificacion'];
$evidencia_actividad = $row1['evidencia'];
$reporte_metas_actividad = $row1['reporte_metas'];
$municipio_actividad = $row1['municipio'];
$kilometraje_actividad = $row1['kilometraje'];
$year = date('Y');


// echo $nombre_actividad;
// echo "<br>";
// echo $consecutivo_actividad;
// echo "<br>";
// echo $id_actividad;
// echo "<br>";
// echo $subdireccion_actividad;
// echo "<br>";
// echo $funcion_actividad;
// echo "<br>";
// echo $unidad_medida_actividad;
// echo "<br>";
// echo $informe_anual_actividad;
// echo "<br>";
// echo $evidencia_interna_actividad;
// echo "<br>";
// echo $folio_expediente_actividad;
// echo "<br>";
// echo $id_sujeto_actividad;
// echo "<br>";
// echo $clasificacion_actividad;
// echo "<br>";
// echo $evidencia_actividad;
// echo "<br>";
// echo $reporte_metas_actividad;
// echo "<br>";
// echo $municipio_actividad;
// echo "<br>";
// echo $kilometraje_actividad;
// echo "<br>";
// echo $year;
// echo "<br>";

if ($numero_actividad === '1'){
    
    $query = "INSERT INTO react_actividad (consecutivosub, idactividad, 
    id_subdireccion, funcion, id_actividad, unidad_medida, 
    reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, 
    folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, 
    observaciones, informe_anual, usuario, year) 
    VALUES ('$consecutivo_actividad', '$id_actividad', 
    '$subdireccion_actividad', '$funcion_actividad', '$numero_actividad', '$unidad_medida_actividad', 
    '$reporte_metas_actividad', '$clasificacion_uno', '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad', 
    '$folio_expediente', '$id_sujeto', '$evidencia_interna_actividad', '$numero_oficio_solicitud', '$kilometraje_actividad', 
    '$observaciones_actividad', '$informe_anual_actividad', '$name', '$year')";
    $resultado = $mysqli->query($query);
}

else if ($numero_actividad === '2' || $numero_actividad === '4' || $numero_actividad === '5' || $numero_actividad === '6' || $numero_actividad === '9' || $numero_actividad === '12' || $numero_actividad === '16'){
    
    $clasificacion = 'NA';

    $query = "INSERT INTO react_actividad (consecutivosub, idactividad, 
    id_subdireccion, funcion, id_actividad, unidad_medida, 
    reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, 
    folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, 
    observaciones, informe_anual, usuario, year) 
    VALUES ('$consecutivo_actividad', '$id_actividad', 
    '$subdireccion_actividad', '$funcion_actividad', '$numero_actividad', '$unidad_medida_actividad', 
    '$reporte_metas_actividad', '$clasificacion', '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad', 
    '$folio_expediente', '$id_sujeto', '$evidencia_interna_actividad', '$numero_oficio_solicitud', '$kilometraje_actividad', 
    '$observaciones_actividad', '$informe_anual_actividad', '$name', '$year')";
    $resultado = $mysqli->query($query);
}

else if ($numero_actividad === '3'){

    $clasificacion = 'NA';
    $num_oficio = 'NA';

    $query = "INSERT INTO react_actividad (consecutivosub, idactividad, 
    id_subdireccion, funcion, id_actividad, unidad_medida, 
    reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, 
    folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, 
    observaciones, informe_anual, usuario, year) 
    VALUES ('$consecutivo_actividad', '$id_actividad', 
    '$subdireccion_actividad', '$funcion_actividad', '$numero_actividad', '$unidad_medida_actividad', 
    '$reporte_metas_actividad', '$clasificacion', '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad', 
    '$folio_expediente', '$id_sujeto', '$evidencia_interna_actividad', '$num_oficio', '$kilometraje_actividad', 
    '$observaciones_actividad', '$informe_anual_actividad', '$name', '$year')";
    $resultado = $mysqli->query($query);
}

else if ($numero_actividad === '7'){

    $num_oficio = 'NA';

    $query = "INSERT INTO react_actividad (consecutivosub, idactividad, 
    id_subdireccion, funcion, id_actividad, unidad_medida, 
    reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, 
    folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, 
    observaciones, informe_anual, usuario, year) 
    VALUES ('$consecutivo_actividad', '$id_actividad', 
    '$subdireccion_actividad', '$funcion_actividad', '$numero_actividad', '$unidad_medida_actividad', 
    '$reporte_metas_actividad', '$clasificacion_dos', '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad', 
    '$folio_expediente', '$id_sujeto', '$evidencia_interna_actividad', '$num_oficio', '$kilometraje_actividad', 
    '$observaciones_actividad', '$informe_anual_actividad', '$name', '$year')";
    $resultado = $mysqli->query($query);
}

else if ($numero_actividad === '8'){

    $query = "INSERT INTO react_actividad (consecutivosub, idactividad, 
    id_subdireccion, funcion, id_actividad, unidad_medida, 
    reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, 
    folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, 
    observaciones, informe_anual, usuario, year) 
    VALUES ('$consecutivo_actividad', '$id_actividad', 
    '$subdireccion_actividad', '$funcion_actividad', '$numero_actividad', '$unidad_medida_actividad', 
    '$reporte_metas_actividad', '$clasificacion_tres', '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad', 
    '$folio_expediente', '$id_sujeto', '$evidencia_interna_actividad', '$numero_oficio_solicitud', '$kilometraje_actividad', 
    '$observaciones_actividad', '$informe_anual_actividad', '$name', '$year')";
    $resultado = $mysqli->query($query);
}

else if ($numero_actividad === '10'){

    $query = "INSERT INTO react_actividad (consecutivosub, idactividad, 
    id_subdireccion, funcion, id_actividad, unidad_medida, 
    reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, 
    folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, 
    observaciones, informe_anual, usuario, year) 
    VALUES ('$consecutivo_actividad', '$id_actividad', 
    '$subdireccion_actividad', '$funcion_actividad', '$numero_actividad', '$unidad_medida_actividad', 
    '$reporte_metas_actividad', '$clasificacion_cuatro', '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad', 
    '$folio_expediente', '$id_sujeto', '$evidencia_interna_actividad', '$numero_oficio_solicitud', '$kilometraje_actividad', 
    '$observaciones_actividad', '$informe_anual_actividad', '$name', '$year')";
    $resultado = $mysqli->query($query);
}

else if ($numero_actividad === '11'){

    $query = "INSERT INTO react_actividad (consecutivosub, idactividad, 
    id_subdireccion, funcion, id_actividad, unidad_medida, 
    reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, 
    folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, 
    observaciones, informe_anual, usuario, year) 
    VALUES ('$consecutivo_actividad', '$id_actividad', 
    '$subdireccion_actividad', '$funcion_actividad', '$numero_actividad', '$unidad_medida_actividad', 
    '$reporte_metas_actividad', '$clasificacion_cinco', '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad', 
    '$folio_expediente', '$id_sujeto', '$evidencia_interna_actividad', '$numero_oficio_solicitud', '$kilometraje_actividad', 
    '$observaciones_actividad', '$informe_anual_actividad', '$name', '$year')";
    $resultado = $mysqli->query($query);
}

// else if ($numero_actividad === '13'){

//     $query = "INSERT INTO react_actividad (consecutivosub, idactividad, 
//     id_subdireccion, funcion, id_actividad, unidad_medida, 
//     reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, 
//     folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, 
//     observaciones, informe_anual, usuario, year) 
//     VALUES ('$consecutivo_actividad', '$id_actividad', 
//     '$subdireccion_actividad', '$funcion_actividad', '$numero_actividad', '$unidad_medida_actividad', 
//     '$reporte_metas_actividad', '$clasificacion_seis', '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad', 
//     '$folio_expediente', '$id_sujeto', '$evidencia_interna_actividad', '$numero_oficio_solicitud', '$kilometraje_actividad', 
//     '$observaciones_actividad', '$informe_anual_actividad', '$name', '$year')";
//     $resultado = $mysqli->query($query);
// }

else if ($numero_actividad === '14'){

    $query = "INSERT INTO react_actividad (consecutivosub, idactividad, 
    id_subdireccion, funcion, id_actividad, unidad_medida, 
    reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, 
    folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, 
    observaciones, informe_anual, usuario, year) 
    VALUES ('$consecutivo_actividad', '$id_actividad', 
    '$subdireccion_actividad', '$funcion_actividad', '$numero_actividad', '$unidad_medida_actividad', 
    '$reporte_metas_actividad', '$clasificacion_seis', '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad', 
    '$folio_expediente', '$id_sujeto', '$evidencia_interna_actividad', '$numero_oficio_solicitud', '$kilometraje_actividad', 
    '$observaciones_actividad', '$informe_anual_actividad', '$name', '$year')";
    $resultado = $mysqli->query($query);
}

else if ($numero_actividad === '15'){

    $query = "INSERT INTO react_actividad (consecutivosub, idactividad, 
    id_subdireccion, funcion, id_actividad, unidad_medida, 
    reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, 
    folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, 
    observaciones, informe_anual, usuario, year) 
    VALUES ('$consecutivo_actividad', '$id_actividad', 
    '$subdireccion_actividad', '$funcion_actividad', '$numero_actividad', '$unidad_medida_actividad', 
    '$reporte_metas_actividad', '$clasificacion_siete', '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad', 
    '$folio_expediente', '$id_sujeto', '$evidencia_interna_actividad', '$numero_oficio_solicitud', '$kilometraje_actividad', 
    '$observaciones_actividad', '$informe_anual_actividad', '$name', '$year')";
    $resultado = $mysqli->query($query);
}

else if ($numero_actividad === '17'){

    $query = "INSERT INTO react_actividad (consecutivosub, idactividad, 
    id_subdireccion, funcion, id_actividad, unidad_medida, 
    reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, 
    folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, 
    observaciones, informe_anual, usuario, year) 
    VALUES ('$consecutivo_actividad', '$id_actividad', 
    '$subdireccion_actividad', '$funcion_actividad', '$numero_actividad', '$unidad_medida_actividad', 
    '$reporte_metas_actividad', '$clasificacion_uno', '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad', 
    '$folio_expediente', '$id_sujeto', '$evidencia_interna_actividad', '$numero_oficio_solicitud', '$kilometraje_actividad', 
    '$observaciones_actividad', '$informe_anual_actividad', '$name', '$year')";
    $resultado = $mysqli->query($query);
}


// validacion de update correcto

    if($resultado){
        echo ("<script type='text/javaScript'>
        window.location.href='./registrar_actividad.php';
        window.alert('!!!!!Registro exitoso¡¡¡¡¡')
    </script>");
    }


}

else {
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=./menu.php'>";
}

?>