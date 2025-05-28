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
     echo "<br>";
     $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
     $result = $mysqli->query($sentencia);
     $row=$result->fetch_assoc();


$subdireccion = $_POST['subdireccion'];
$idactividad = $_POST['idactividad'];
$funcion_apoyo= $_POST['funcion_apoyo'];
$unidad_medida = $_POST['unidad_medida'];
$reporte_metas = $_POST['reporte_metas'];
$fecha_actividad = $_POST['fecha_actividad'];
$cantidad_actividad = $_POST['cantidad_actividad'];
$clasificacion = $_POST['clasificacion'];
$folio_expediente = $_POST['folio_expediente'];
$id_sujeto_actividad = $row1['id_sujeto_actividad'];
$idevidencia_actividad = $row1['idevidencia_actividad'];
$observaciones_actividad = $_POST['observaciones_actividad'];
// $idevidencia_actividad = $row1['id_evidencia_act'];

// $id_sujeto = $_POST['id_sujeto'];
// $consecutivo_actividad = $row1['id'];
// // $nombre_actividad = $row1['nombre'];
// $informe_anual_actividad = $row1['informe_anual'];
// // $evidencia_interna_actividad = $row1['evidencia_interna'];
// // $folio_expediente_actividad = $row1['folio_expediente'];
// $municipio_actividad = $row1['municipio'];
// $kilometraje_actividad = $row1['kilometraje'];
// $year = date('Y');


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
// echo "observaciones_actividad:  ".$observaciones_actividad;
// echo "id_sujeto:  ".$id_sujeto;
// echo "consecutivo_actividad:  ".$id;
// echo "nombre_actividad:  ".$nombre;
// echo "id_actividad:  ".$id_actividad;
// echo "subdireccion_actividad:  ".$subdireccion;
// echo "funcion_actividad:  ".$funcion;
// echo "unidad_medida_actividad:  ".$unidad_medida;
// echo "informe_anual_actividad:  ".$informe_anual;
// echo "evidencia_interna_actividad:  ".$evidencia_interna;
// echo "folio_expediente_actividad:  ".$folio_expediente;
// echo "id_sujeto_actividad:  ".$id_sujeto;
// echo "clasificacion_actividad:  ".$clasificacion;
// echo "evidencia_actividadd:  ".$evidencia;
// echo "reporte_metas_actividad:  ".$reporte_metas;
// echo "municipio_actividad:  ".$municipio;
// echo "kilometraje_actividad:  ".$kilometraje;
// echo "year:  ".$date;




 



//     $addactividad = "INSERT INTO react_actividad (consecutivosub, idactividad, id_subdireccion, funcion, id_actividad, unidad_medida, 
//     reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, 
//     folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, 
//     observaciones, informe_anual, usuario, year) 
//     VALUES ('$consecutivo_actividad', '$id_actividad', '$subdireccion_actividad', '$funcion_actividad', '$numero_actividad', '$unidad_medida_actividad', 
//     '$reporte_metas_actividad', '$clasificacion_actividad', '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad', 
//     '$folio_expediente_actividad', '$id_sujeto_actividad', '$evidencia_interna_actividad', '$evidencia_actividad', '$kilometraje_actividad', 
//     '$observaciones_actividad', '$informe_anual_actividad', '$name', '$year')";
//     $raddactividad = $mysqli->query($addactividad);


//    if($raddactividad){
//     echo ("<script type='text/javaScript'>
//      window.location.href='../subdireccion_de_apoyo_tecnico_juridico/add_actividad.php';
//      window.alert('!!!!!Registro exitoso¡¡¡¡¡')
//    </script>");


// }

   }

  
// else {
//   echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../../subdireccion_de_apoyo_tecnico_juridico/add_actividad.php'>";
// }

?>   
