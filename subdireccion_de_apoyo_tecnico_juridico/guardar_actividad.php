<?php
//  error_reporting(0);
 date_default_timezone_set("America/Mexico_City");
 session_start ();
 require './conexion.php';
 $check_actividad = $_SESSION["check_actividad"];
 if ($check_actividad == 1) {
     unset($_SESSION['check_actividad']);
     $name = $_SESSION['usuario'];
     // echo $name = $_SESSION['usuario'];
     echo "<br>";
     $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
     $result = $mysqli->query($sentencia);
     $row=$result->fetch_assoc();

//$subdireccion = $_POST['subdireccion'];
//$idactividad = $_POST['idactividad'];
//$funcion_apoyo= $_POST['funcion_apoyo'];
//$unidad_medida = $_POST['unidad_medida'];
//$reporte_metas = $_POST['reporte_metas'];
$fecha_actividad = $_POST['fecha_actividad'];
$cantidad_actividad = $_POST['cantidad_actividad'];
//$clasificacion = $_POST['clasificacion'];
$folio_expediente = $_POST['folio_expediente'];
$id_sujeto_actividad = $_POST['id_sujeto'];
//$idevidencia_actividad = $_POST['idevidencia_actividad'];
$observaciones_actividad = $_POST['observaciones_actividad'];
//$consecutivo = $_POST['consecutivosub'];
//$kilometraje = $_POST['kilometraje'];
//$evidencia = $_POST['evidencia'];
//$entidadmunicipio = $_POST['entidadmunicipio'];
//$informe_anual = $_POST['informe_anual'];
//$year = date('Y');
//$fecha_alta = date("Y-m-d");

echo $subdireccion;
echo "<br>";
echo $idactividad;
echo "<br>";
echo $funcion_apoyo;
echo "<br>";
echo $unidad_medida;
echo "<br>";
echo $reporte_metas;
echo "<br>";
echo $fecha_actividad;
echo "<br>";
echo $cantidad_actividad;
echo "<br>";
echo $clasificacion;
echo "<br>";
echo $folio_expediente;
echo "<br>";
echo $id_sujeto_actividad;
echo "<br>";
echo $idevidencia_actividad;  
echo "<br>";
echo $observaciones_actividad;
echo "<br>";
echo "<br>";
echo $consecutivo;
echo "<br>";
echo $kilometraje;
echo "<br>";
echo $evidencia;
echo "<br>";
echo $entidadmunicipio;
echo "<br>";
echo $informe_anual;
echo "<br>";

$sentencia1=" SELECT* FROM react_actividad_apoyo WHERE id = '$idactividad'";
$result1 = $mysqli->query($sentencia1);
$row1=$result1->fetch_assoc();

$consecutivo_actividad = $row1['id'];
$nombre_actividad = $row1['nombre'];
$id_actividad = $row1['id_actividad'];
$subdireccion_actividad = $row1['subdireccion'];
$funcion_actividad = $row1['funcion'];
$unidad_medida_actividad = $row1['unidad_medida'];
$informe_anual_actividad = $row1['informe_anual'];
$evidencia_interna_actividad = $row1['evidencia_interna'];
///////
//$folio_expediente_actividad = $row1['folio_expediente'];
//$id_sujeto_actividad = $row1['id_sujeto'];
$clasificacion_actividad = $row1['clasificacion'];
$evidencia_actividad = $row1['evidencia'];
/////////////
$reporte_metas_actividad = $row1['reporte_metas'];
$municipio_actividad = $row1['municipio'];
$kilometraje_actividad = $row1['kilometraje'];
$year = date('Y');

echo $year;
echo "<br>";
echo $nombre_actividad;
echo "<br>";
echo $id_actividad;
echo "<br>";
echo $subdireccion_actividad;
echo "<br>";
echo $funcion_actividad;
echo "<br>";
echo $unidad_medida_actividad;
echo "<br>";
echo $informe_anual_actividad;
echo "<br>";
echo $evidencia_interna_actividad;
echo "<br>";
echo $folio_expediente_actividad;
echo "<br>";
echo $id_sujeto_actividad;
echo "<br>";
echo $evidencia_actividad;
echo "<br>";
echo $clasificacion_actividad;
echo "<br>";
echo $reporte_metas_actividad;
echo "<br>";
echo $municipio_actividad;
echo "<br>";
echo $kilometraje_actividad;
echo "<br>";


    $addactividad = "INSERT INTO react_actividad (consecutivosub, id_subdireccion, funcion, id_actividad, unidad_medida, reporte_metas, 
                                                clasificacion, fecha, cantidad, entidad_municipio, folio_expediente, id_sujeto, 
                                                evidencia_interna, id_evidencia, kilometraje, observaciones, informe_anual, fecha_alta, 
                                                usuario, year) 

    VALUES ('$consecutivo', '$subdireccion', '$funcion_apoyo', '$idactividad', '$unidad_medida', '$reporte_metas', 
    '$clasificacion', '$fecha_actividad', '$cantidad_actividad',  '$entidadmunicipio', '$folio_expediente', '$id_sujeto_actividad', 
    '$evidencia', '$idevidencia_actividad', '$kilometraje', '$observaciones_actividad', '$informe_anual', '$fecha_alta', '$name', '$year')";

    $raddactividad = $mysqli->query($addactividad);


    if($raddactividad){
    echo ("<script type='text/javaScript'>
    window.location.href='../subdireccion_de_apoyo_tecnico_juridico/add_actividad.php';
    window.alert('!!!!!Registro exitoso¡¡¡¡¡')
    </script>");


    }

}


// else {
//     echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../../subdireccion_de_apoyo_tecnico_juridico/add_actividad.php'>";
// }
////////////////////////////////////////
?> 
