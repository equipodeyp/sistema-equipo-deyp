<?php
// error_reporting(0);
require 'conexion.php';
session_start ();
$verifica = $_SESSION["verifica"];
if ($verifica == 1) {
    unset($_SESSION['verifica']);
    $name = $_SESSION['usuario'];

$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$resultado = $mysqli->query($sentencia);
$row=$resultado->fetch_assoc();


  $apartado = $_POST['apartado'];
  $usuario = $_POST['usuario'];
  $nombre_servidor = $_POST['nombre_servidor'];
  $subdireccion = $_POST['subdireccion'];
  $folio_expediente = $_POST['folio_expediente'];
  $id_sujeto = $_POST['id_sujeto'];
  $id_asistencia = $_POST['id_asistencia'];
  $tipo_falla = $_POST['tipo_falla'];
  $status = $_POST['estatus'];  
  $atencion_usuario = $_POST['atencion'];
  $descripcion = $_POST['descripcion'];
  $id_atencion = $_POST['id_atencion'];
  // echo $apartado;
  // echo '<br>';
  // echo $usuario;
  // echo '<br>';
  // echo $nombre_servidor;
  // echo '<br>';
  // echo $subdireccion;
  // echo '<br>';
  // echo $folio_expediente;
  // echo '<br>';
  // echo $id_sujeto;
  // echo '<br>';
  // echo $id_asistencia;
  // echo '<br>';
  // echo $tipo_falla;
  // echo '<br>';
  // echo $status;
  // echo '<br>';
  // echo $atencion_usuario;
  // echo '<br>';
  // echo $descripcion;
  // echo '<br>';

  $sentencia3=" SELECT COUNT(*) AS total FROM incidencias";
  $result3 = $mysqli->query($sentencia3);
  $row3=$result3->fetch_assoc();
  $total_1 = $row3['total'];
  $total = $total_1 + 1;
  // echo '<br>';
  // echo $total;
  // echo '<br>';

  $ini_apartado=" SELECT clave FROM apartado_sippsipped WHERE nombre='$apartado'";
  $ini_resultado = $mysqli->query($ini_apartado);
  $row_ini=$ini_resultado->fetch_assoc();
  $clave_apartado = $row_ini['clave'];
  // echo $clave_apartado;
  // echo '<br>';

  $sub="SELECT usuarios.nombre, usuarios.usuario, usuarios_servidorespublicos.subdireccion
            FROM usuarios                                                              
            JOIN usuarios_servidorespublicos
            ON usuarios.id = usuarios_servidorespublicos.id_usuarioprincipal
            AND usuarios.usuario = '$usuario'";
  $sub_resultado = $mysqli->query($sub);
  $row_sub=$sub_resultado->fetch_assoc();
  $subdireccion = strtoupper($row_sub['subdireccion']);
  // echo $subdireccion;
  // echo '<br>';

  $ini_sub="SELECT subdireccion, clave FROM react_subdireccion WHERE subdireccion='$subdireccion'";
  $ini_sub_resultado = $mysqli->query($ini_sub);
  $row_ini_sub=$ini_sub_resultado->fetch_assoc();
  $sub = strtoupper($row_ini_sub['clave']);
  // echo $sub;
  // echo '<br>';

  $folio_incidencia = 'INC0'.$total.'-'.$sub.'-'.$clave_apartado;
  // echo '<br>';
  // echo $folio_incidencia;
  // echo '<br>';
        

if ($apartado === "REPORTES DEL PROGRAMA"){
  $folio_expediente1 = "NO APLICA";
  $id_sujeto1 = "NO APLICA";
  $id_asistencia1 = "NO APLICA";

  // echo $folio_expediente1;
  // echo $id_sujeto1;
  // echo $id_asistencia1;

  $query = "INSERT INTO incidencias (folio_incidencia, usuario, subdireccion, folio_expediente, id_sujeto, id_asistencia_medica, apartado_sippsipped, tipo_falla, descripcion_falla, estatus, servidor_registra, id_usuario, usuario_atencion) 
  VALUES ('$folio_incidencia', '$usuario', '$subdireccion', '$folio_expediente1', '$id_sujeto1', '$id_asistencia1', '$apartado', '$tipo_falla', '$descripcion', '$status', '$nombre_servidor', '$id_atencion', '$atencion_usuario')";
  $result = $mysqli->query($query);
  
} else if ($apartado === "ASISTENCIAS MÉDICAS"){

  $query = "INSERT INTO incidencias (folio_incidencia, usuario, subdireccion, folio_expediente, id_sujeto, id_asistencia_medica, apartado_sippsipped, tipo_falla, descripcion_falla, estatus, servidor_registra, id_usuario, usuario_atencion) 
  VALUES ('$folio_incidencia', '$usuario', '$subdireccion', '$folio_expediente', '$id_sujeto', '$id_asistencia', '$apartado', '$tipo_falla', '$descripcion', '$status', '$nombre_servidor', '$id_atencion', '$atencion_usuario')";
  $result = $mysqli->query($query);

} else {

  $id_asistencia2 = "NO APLICA";

  $query = "INSERT INTO incidencias (folio_incidencia, usuario, subdireccion, folio_expediente, id_sujeto, id_asistencia_medica, apartado_sippsipped, tipo_falla, descripcion_falla, estatus, servidor_registra, id_usuario, usuario_atencion) 
  VALUES ('$folio_incidencia', '$usuario', '$subdireccion', '$folio_expediente', '$id_sujeto', '$id_asistencia2', '$apartado', '$tipo_falla', '$descripcion', '$status', '$nombre_servidor', '$id_atencion', '$atencion_usuario')";
  $result = $mysqli->query($query);

}




      if($result){
        echo ("<script type='text/javaScript'>
        window.location.href='./registrar_incidencia.php';
        window.alert('!!!!!Registro exitoso¡¡¡¡¡')
        </script>");


        }

}


  else {
      echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=./menu.php'>";
  }

?> 