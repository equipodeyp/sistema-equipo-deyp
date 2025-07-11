<?php
 //error_reporting(0);
 date_default_timezone_set("America/Mexico_City");
 session_start ();
 require './conexion.php';
 $check_actividad = $_SESSION["check_actividad"];
 if ($check_actividad == 1) {
     unset($_SESSION['check_actividad']);
     $name = $_SESSION['usuario'];
    //  echo $name = $_SESSION['usuario'];
    //  echo "<br>";
     $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
     $result = $mysqli->query($sentencia);
     $row=$result->fetch_assoc();

$idactividad = $_POST['idactividad'];
$cantidad_actividad = $_POST['cantidad_actividad'];
$fecha_actividad = $_POST['fecha_actividad'];
$folio_expediente = $_POST['folio_expediente'];
$id_sujeto_actividad = $_POST['id_sujeto'];
$numero_oficio_solicitud = $_POST['numero_oficio_actividad'];
$clasificacion = $_POST['clasificacion'];
$clasificacion0 = $_POST['clasificacion'];
$clasificacion1 = $_POST['clasificacion1'];
$clasificacion2 = $_POST['clasificacion2'];
$clasificacion3 = $_POST['clasificacion3'];
$observaciones_actividad = $_POST['observaciones_actividad'];

/* echo $idactividad;
echo "<br>";
echo $cantidad_actividad;
echo "<br>";
echo $fecha_actividad;
echo "<br>";
echo $folio_expediente;
echo "<br>";
echo $id_sujeto_actividad;
echo "<br>";
echo $clasificacion;
echo "<br>";
echo $observaciones_actividad;
echo "<br>";
echo $numero_oficio_solicitud;
echo "<br>";
 */

$sentencia1=" SELECT* FROM react_actividad_apoyo WHERE id = '$idactividad'";
$result1 = $mysqli->query($sentencia1);
$row1=$result1->fetch_assoc();

$consecutivo_actividad = $row1['id'];
$id_actividad = $row1['id_actividad'];
$subdireccion_actividad = $row1['subdireccion'];
$funcion_actividad = $row1['funcion'];
$unidad_medida_actividad = $row1['unidad_medida'];
$reporte_metas_actividad = $row1['reporte_metas'];
$clasificacion_actividad = $row1['clasificacion'];
$municipio_actividad = $row1['municipio'];
$evidencia_interna_actividad = $row1['evidencia_interna'];
$kilometraje_actividad = $row1['kilometraje'];
$informe_anual_actividad = $row1['informe_anual'];
$usuario = $name;
$year = date('Y');

/* echo $consecutivo_actividad;
echo "<br>";
echo $id_actividad;
echo "<br>";
echo $subdireccion_actividad;
echo "<br>";
echo $funcion_actividad;
echo "<br>";
echo $unidad_medida_actividad;
echo "<br>";
echo $reporte_metas_actividad;
echo "<br>";
echo $clasificacion_actividad;
echo "<br>";
echo $municipio_actividad;
echo "<br>";
echo $evidencia_interna_actividad;
echo "<br>";
echo $kilometraje_actividad;
echo "<br>";
echo $municipio_actividad;
echo "<br>";
echo $informe_anual_actividad;
echo "<br>";
echo $usuario;
echo "<br>";
echo $year;
echo "<br>";
 */



if ( $idactividad === '1'|| idactividad === '2'|| idactividad === '3'|| idactividad === '5'|| idactividad === '7'|| idactividad === '10'){
    $clasificacion = 'NA';
 $addactividad = "INSERT INTO react_actividad (consecutivosub, idactividad, id_subdireccion, funcion, id_actividad, unidad_medida, reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, folio_expediente, 
                                               id_sujeto, id_evidencia, observaciones, informe_anual, usuario, year) 


VALUES ('$consecutivo_actividad','$id_actividad', '$subdireccion_actividad ', '$funcion_actividad', '$idactividad', '$unidad_medida_actividad', '$reporte_metas_actividad', '$clasificacion', 
                            '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad','$folio_expediente', '$id_sujeto_actividad', '$numero_oficio_solicitud', '$observaciones_actividad', '$informe_anual_actividad' 
                            , '$usuario', '$year')";
 

}



else if ( $idactividad === '4'){
        $addactividad = "INSERT INTO react_actividad (consecutivosub, idactividad, id_subdireccion, funcion, id_actividad, unidad_medida, reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, folio_expediente, 
                                               id_sujeto, id_evidencia, observaciones, informe_anual, usuario, year) 


VALUES ('$consecutivo_actividad','$id_actividad', '$subdireccion_actividad ', '$funcion_actividad', '$idactividad', '$unidad_medida_actividad', '$reporte_metas_actividad', '$clasificacion2', 
                            '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad','$folio_expediente', '$id_sujeto_actividad', '$numero_oficio_solicitud', '$observaciones_actividad', '$informe_anual_actividad' 
                            , '$usuario', '$year')";
 
}



else if ( $idactividad === '6'){
        $addactividad = "INSERT INTO react_actividad (consecutivosub, idactividad, id_subdireccion, funcion, id_actividad, unidad_medida, reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, folio_expediente, 
                                               id_sujeto, id_evidencia, observaciones, informe_anual, usuario, year) 
VALUES ('$consecutivo_actividad','$id_actividad', '$subdireccion_actividad ', '$funcion_actividad', '$idactividad', '$unidad_medida_actividad', '$reporte_metas_actividad', '$clasificacion3', 
                            '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad','$folio_expediente', '$id_sujeto_actividad', '$numero_oficio_solicitud', '$observaciones_actividad', '$informe_anual_actividad' 
                            , '$usuario', '$year')";
 
}



else if ( $idactividad === '8'){
       $addactividad = "INSERT INTO react_actividad (consecutivosub, idactividad, id_subdireccion, funcion, id_actividad, unidad_medida, reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, folio_expediente, 
                                               id_sujeto, id_evidencia, observaciones, informe_anual, usuario, year) 
VALUES ('$consecutivo_actividad','$id_actividad', '$subdireccion_actividad ', '$funcion_actividad', '$idactividad', '$unidad_medida_actividad', '$reporte_metas_actividad', '$clasificacion0', 
                            '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad','$folio_expediente', '$id_sujeto_actividad', '$numero_oficio_solicitud', '$observaciones_actividad', '$informe_anual_actividad' 
                            , '$usuario', '$year')";
 
}


else if ( $idactividad === '9'){
       $addactividad = "INSERT INTO react_actividad (consecutivosub, idactividad, id_subdireccion, funcion, id_actividad, unidad_medida, reporte_metas, clasificacion, fecha, cantidad, entidad_municipio, folio_expediente, 
                                               id_sujeto, id_evidencia, observaciones, informe_anual, usuario, year) 
VALUES ('$consecutivo_actividad','$id_actividad', '$subdireccion_actividad ', '$funcion_actividad', '$idactividad', '$unidad_medida_actividad', '$reporte_metas_actividad', '$clasificacion1', 
                            '$fecha_actividad', '$cantidad_actividad', '$municipio_actividad','$folio_expediente', '$id_sujeto_actividad', '$numero_oficio_solicitud', '$observaciones_actividad', '$informe_anual_actividad' 
                            , '$usuario', '$year')";
 
}





  $raddactividad = $mysqli->query($addactividad);




     if($raddactividad){
      echo ("<script type='text/javaScript'>
      window.location.href='../subdireccion_de_apoyo_tecnico_juridico/add_actividad.php';
      window.alert('!!!!!Registro exitoso¡¡¡¡¡')
      </script>");


      }

 }


  else {
      echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../../subdireccion_de_apoyo_tecnico_juridico/add_actividad.php'>";
  }

?> 
