<?php
error_reporting(0);
require 'conexion.php';
session_start ();
$verifica = $_SESSION["verifica"];
if ($verifica == 1) {
  unset($_SESSION['verifica']);
  $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datos
  // cambio de zona horaria
  // nuevo comentario
  date_default_timezone_set('UTC');
  date_default_timezone_set("America/Mexico_City");
  $unidad =$_POST['unidad'];
  $sede=$_POST['sede'];
  $r_sede= substr("$sede", 0,3);//obteniendo las tres primeras letras
  $municipio=$_POST['municipio'];
  $qry = "select max(ID) As id from expediente";
  $result = $mysqli->query($qry);
  $row = $result->fetch_assoc();
  $num_consecutivo =$row["id"];

  $n=$num_consecutivo;
  $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
  $año = date("Y");
  $fechaActual = date('Y-m-d');
  // consulta del municipio
  $sentencia=" SELECT nombre, clave FROM municipios WHERE clave='$municipio'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  $name_mun=$row['nombre'];
  //
  $folio_expediente = $unidad.'/'.$r_sede.'/'.$municipio.'/'.$n_con.'/'.$año;
  $sql = "INSERT INTO expediente (unidad, sede, municipio, num_consecutivo, año, fol_exp, fecha)
          VALUES ('$unidad', '$sede', '$name_mun', '$n_con', '$año', '$folio_expediente', '$fechaActual')";
  $resultado = $mysqli->query($sql);
  $sent=" SELECT id, fol_exp FROM expediente WHERE fol_exp='$folio_expediente'";
  $resu = $mysqli->query($sent);
  $ro=$resu->fetch_assoc();
  $folio=$ro["fol_exp"];
  if($resultado) {
        echo $verifica;
        echo ("<script type='text/javaScript'>
         window.location.href='../administrador/exp_detalle.php?folio=$folio';
         window.alert('!!!!!Registro exitoso¡¡¡¡¡')
       </script>");
        } else {  }
} else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}
// echo $folio;
?>
