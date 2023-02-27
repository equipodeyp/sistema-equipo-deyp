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
  $fecharecepcion = date("d/m/Y", strtotime($_POST['FECHA_RECEPCION']));
  $sede=$_POST['sede'];
  $r_sede= substr("$sede", 0,3);//obteniendo las tres primeras letras
  $municipio=$_POST['municipio'];
  $relacion=$_POST['sltrelacion'];
  $qry = "select max(ID) As id from expediente";
  $result = $mysqli->query($qry);
  $row_exp = $result->fetch_assoc();
  $var = $row_exp['id'];

  $qry22 = "SELECT * FROM expediente WHERE id= '$var'";
  $result22 = $mysqli->query($qry22);
  $row_exp22 = $result22->fetch_assoc();

  $fechaActual = date('d/m/Y');
  date_default_timezone_set('America/Mexico_City');
  $año = date("Y");
  $month = date("m");
  $day = date("d");

  $f = $row['fecha'];
  date_default_timezone_set('America/Mexico_City');
  $a = date("Y");
  $m = date("m");
  $d = date("d");


  if ($a == $row_exp22['año']){
    $num_consecutivo =$row_exp22['num_consecutivo'];
    $n=$num_consecutivo;
    $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
    echo $n_con;
  } else {
    $num_consecutivo = 0;
    $n=$num_consecutivo;
    $n_con = str_pad($n + 1, 3, 0, STR_PAD_LEFT);
  }

  // consulta del municipio
  $sentencia=" SELECT nombre, clave FROM municipios WHERE nombre='$municipio'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  $name_mun=$row['nombre'];
  $claveMunicipio=$row['clave'];

  // estado inicial de validacion
  $validacion = 'false';
  $folio_expediente = $unidad.'/'.$r_sede.'/'.$claveMunicipio.'/'.$n_con.'/'.$año;

  $name_carpeta = $folio_expediente;
  $resultado = str_replace("/", "-", $name_carpeta);


  // $estructura = "./$resultado";
  $estructura_uno = "../subdireccion_de_analisis_de_riesgo/repo/$resultado";

  if (!file_exists($estructura_uno)) {
      mkdir($estructura_uno, 0777, true);
  }

  $estructura_dos = "../subdireccion_de_apoyo_tecnico_juridico/repo/$resultado";

  if (!file_exists($estructura_dos)) {
      mkdir($estructura_dos, 0777, true);
  }

  $estructura_tres = "../subdireccion_de_estadistica_y_preregistro/repo/$resultado";

  if (!file_exists($estructura_tres)) {
      mkdir($estructura_tres, 0777, true);
  }




    // $estructura = "./$resultado";
    $estructura_cuatro = "../subdireccion_de_analisis_de_riesgo/repo/$resultado/$resultado";

    if (!file_exists($estructura_cuatro)) {
        mkdir($estructura_cuatro, 0777, true);
    }

    $estructura_cinco = "../subdireccion_de_apoyo_tecnico_juridico/repo/$resultado/$resultado";

    if (!file_exists($estructura_cinco)) {
        mkdir($estructura_cinco, 0777, true);
    }

    $estructura_seis = "../subdireccion_de_estadistica_y_preregistro/repo/$resultado/$resultado";

    if (!file_exists($estructura_seis)) {
        mkdir($estructura_seis, 0777, true);
    }




  $sql = "INSERT INTO expediente (unidad, sede, municipio, num_consecutivo, año, fol_exp, fecha, fecharecep, validacion, relacion)
          VALUES ('$unidad', '$sede', '$name_mun', '$n_con', '$año', '$folio_expediente', '$fechaActual', '$fecharecepcion','$validacion', '$relacion')";
  $resultado = $mysqli->query($sql);
  $convertirfecha = "UPDATE expediente SET fecha_nueva  = STR_TO_DATE(fecharecep, '%d/%m/%Y')";
  $res_convertir = $mysqli->query($convertirfecha);
  $estatus_expediente = "INSERT INTO statusseguimiento(status, folioexpediente)
          VALUES ('ANALISIS', '$folio_expediente')";
  $res_esattus_exp = $mysqli->query($estatus_expediente);
  $analisis_expediente = "INSERT INTO analisis_expediente (folioexpediente, analisis)
          VALUES ('$folio_expediente', 'EN ELABORACION')";
  $res_analisis_exp = $mysqli->query($analisis_expediente);
  $sent=" SELECT id, fol_exp FROM expediente WHERE fol_exp='$folio_expediente'";
  $resu = $mysqli->query($sent);
  $ro=$resu->fetch_assoc();
  $folio=$ro["fol_exp"];
  if($resultado) {
        echo $verifica;
        echo ("<script type='text/javaScript'>
         window.location.href='../subdireccion_de_apoyo_tecnico_juridico/modificar.php?id=$folio';
         window.alert('!!!!!Registro exitoso¡¡¡¡¡')
       </script>");
        } else {  }
} else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}
// echo $folio;
?>
