<?php
error_reporting(0);
date_default_timezone_set("America/Mexico_City");
session_start ();
require '../conexion.php';
$check_actividad = $_SESSION["check_actividad"];
if ($check_actividad == 1) {
  unset($_SESSION['check_actividad']);
  echo $name = $_SESSION['usuario'];
  echo "<br>";
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datsos
  $a = date("Y");
  $sql="select * from react_actividad where id in (select MAX(id) from react_actividad)";
  $result = $mysqli->query($sql);
  $mostrar=$result->fetch_assoc();
   $yearactual = $mostrar['year'];
   $id_traslado =$mostrar["id"];
   if ($a === $yearactual){
     $n=$id_traslado;
     $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
     $n_con;
   } else {
     $num_consecutivo = 0;
     $n=$num_consecutivo;
     $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
   }

   // Cómo subir el archivo
  if ($_FILES['archivo']['error'] === 0) {
  echo $archivo = $_FILES['archivo'];
  echo "<br>";
  echo $nombre_temporal = $archivo['tmp_name'];
  echo "<br>";
  echo $nombre_original = $archivo['name'];
  echo "<br>";
  echo $tipo_archivo = $archivo['type'];
  echo "<br>";
  echo $tamano_archivo = $archivo['size'];
  echo "<br>";

  // Verificar el tipo de archivo
  if ($tipo_archivo === 'image/jpeg' || $tipo_archivo === 'image/png' || $tipo_archivo === 'video/mp4' || $tipo_archivo === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      || $tipo_archivo === 'application/vnd.ms-excel' || $tipo_archivo === 'application/pdf' || $tipo_archivo === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
      || $tipo_archivo === 'application/msword') {
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
echo $ruta_destino;

echo "<br>";
   echo "consecutivosubdireccion:".$consecutivosub = $n_con;
   echo "<br>";
   echo "imagen:  ".$image = $_POST['imageevidencia2'];
  echo "<br>";
  echo 'SUBDIRECCIÓN:  '.$id_subdireccion = '4';
  echo "<br>";
  echo "FUNCIÓN:  ".$funcion = $_POST['funcion'];
  echo "<br>";
  echo "ACTIVIDAD:  ".$actividad = $_POST['actividad'];
  echo "<br>";
  echo "UNIDAD DE MEDIDA:  ".$unidadmedida = $_POST['unidadmedida'] ;
  echo "<br>";
  echo "REPORTE EN METAS:  ".$reportemetas = $_POST['reportemetas'];
  echo "<br>";
  if ($actividad === '1') {
    $idactividad ='SUBEM-01';
    $clasificacion = 'TRASLADO-'.$_POST['clasificaciontraslado'];
    $id_evidencia = 'NA';
    $entidadmunicipio = $_POST['entidadmunicipio'];
    $folioexpediente = $_POST['folioexpediente'];
    $id_sujeto = $_POST['id_sujeto'];
    $kilometros = $_POST['kilometros'];
    $informe_anual = 'REPORTADO';
  }elseif ($actividad === '2') {
    $idactividad ='SUBEM-02';
    $clasificacion = 'NA';
    $id_evidencia = $_POST['notific_atn'];
    $entidadmunicipio = 'NA';
    $folioexpediente = $_POST['folioexpediente'];
    $id_sujeto = $_POST['id_sujeto'];
    $kilometros = 'NA';
    $informe_anual = 'NA';
  }elseif ($actividad === '3') {
    $idactividad ='SUBEM-03';
    $clasificacion = 'CONTACTO-'.$_POST['clasificacioncontacto'];
    $id_evidencia = 'NA';
    $entidadmunicipio = 'NA';
    $folioexpediente = $_POST['folioexpediente'];
    $id_sujeto = $_POST['id_sujeto'];
    $kilometros = 'NA';
    $informe_anual = 'REPORTADO';
  }elseif ($actividad === '4') {
    $idactividad ='SUBEM-04';
    $clasificacion = 'ACCION-'.$_POST['clasificacionseguridad'];
    $id_evidencia = $_POST['idevidencia'];
    $entidadmunicipio = 'NA';
    $folioexpediente = 'NA';
    $id_sujeto = 'NA';
    $kilometros = 'NA';
    $informe_anual = 'NA';
    // datos de iamge
    // $trasladoact = $_POST["trasladorel"];
    // $idtrasladoact =  $_POST["trasladorelid"];
    $ruta_destino = "../../imagenesbdd/ejecucion_medidas/". $nombre_original;  //  reemplazar con la ruta deseada
    $horaact = $_POST["horaactividad"];
  }elseif ($actividad === '5') {
    $idactividad ='SUBEM-05';
    $clasificacion = 'SALVAGUARDAR-'.$_POST['clasificacionsalvarintegridad'];
    $id_evidencia = 'NA';
    $entidadmunicipio = 'NA';
    $folioexpediente = $_POST['folioexpediente'];
    $id_sujeto = $_POST['id_sujeto'];
    $kilometros = 'NA';
    $informe_anual = 'NA';
    // datos de iamge
    $trasladoact = $_POST["trasladorel"];
    $idtrasladoact =  $_POST["trasladorelid"];
  }elseif ($actividad === '6') {
    $idactividad ='SUBEM-06';
    $clasificacion = 'NA';
    $id_evidencia = 'NA';
    $entidadmunicipio = $_POST['entidadmunicipio'];
    $folioexpediente = $_POST['folioexpediente'];
    $id_sujeto = $_POST['id_sujeto'];
    $kilometros = $_POST['kilometros'];
    $informe_anual = 'REPORTADO';
  }
  echo "CLASIFICACION:  ".$clasificacion;
  echo "<br>";
  echo "FECHA:  ".$fechaactividad = $_POST['fechaactividad'];
  echo "<br>";
  echo "CANTIDAD:  ".$cantidad = $_POST['cantidad'];
  echo "<br>";
  echo "ENTIDAD/MUNICIPIO:  ".$entidadmunicipio;
  echo "<br>";
  echo "FOLIOEXPEDIENTE:  ".$folioexpediente;
  echo "<br>";
  echo "ID SUJETO:  ".$id_sujeto;
  echo "<br>";
  echo "EVIDENCIA:  ".$evidencia = $_POST['evidencia'];
  echo "<br>";
  echo "ID EVIDENCIA:  ".$id_evidencia;
  echo "<br>";
  echo "KILOMETROS:  ".$kilometros;
  echo "<br>";
  echo "OBSERVACIONES:  ".$observaciones = $_POST['observaciones'];
  echo "<br>";
  echo "fecha alta:  ".$fecha_alta = date('y/m/d');
  echo "<br>";
  echo 'año:  '.$year_alta = date('Y');
  echo "<br>";
  echo 'id_actividad:  '.$idactividad;
  echo "<br>";
  echo "horaact: ",$horaact;
  echo "<br>";
  echo "rutaimage: ".$ruta_destino;
  //sql para insertar registro
  $addactividad = "INSERT INTO react_actividad(consecutivosub, idactividad, id_subdireccion, funcion, id_actividad, unidad_medida, reporte_metas, clasificacion, fecha, cantidad, entidad_municipio,
                                              folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, observaciones, informe_anual, fecha_alta, usuario, year)
          VALUES ('$consecutivosub', '$idactividad', '$id_subdireccion', '$funcion', '$actividad', '$unidadmedida', '$reportemetas', '$clasificacion', '$fechaactividad', '$cantidad', '$entidadmunicipio',
                  '$folioexpediente', '$id_sujeto', '$evidencia', '$id_evidencia', '$kilometros', '$observaciones', '$informe_anual', '$fecha_alta', '$name', '$year_alta')";
  $raddactividad = $mysqli->query($addactividad);

  // traer el id del traslado capturado
  echo "<br>";
  $qry = "select max(ID) As id from react_actividad";
  $result = $mysqli->query($qry);
  $row = $result->fetch_assoc();
  echo 'id_actividad:  '.$id_activity =$row["id"];
  // registrar iamge en la BD
    $addimageruta = "INSERT INTO react_image_actividad(id_actividad, ruta, usuario, fecha, traslado, id_traslado, hora, image, tipo)
                     VALUES('$id_activity', '$ruta_destino', '$name', '$fecha_alta', '$trasladoact', '$idtrasladoact', '$horaact', '$nombre_original', '$tipo_archivo')";
    $raddimageruta = $mysqli->query($addimageruta);

  // validacion de update correcto
  if($raddactividad){
    echo ("<script type='text/javaScript'>
     window.location.href='../actividades_ejecucion/add_actividad.php';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../../consultores/admin.php'>";
}

?>
