<?php
error_reporting(0);
date_default_timezone_set("America/Mexico_City");
session_start ();
require '../conexion.php';
$check_traslado2 = $_SESSION["check_traslado2"];
if ($check_traslado2 == 1) {
  unset($_SESSION['check_traslado2']);
  $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datsos
  $id_traslado = $_GET['id_traslado'];
  $motivotr = $_POST['motivotraslado'];
  // obteniendo el lugar dependiendo del motivo
  if ($motivotr === 'POR INCORPORACION') {
    $lugardes = $_POST['lugardestino1'];
  }elseif ($motivotr === 'POR DESINCORPORACION') {
    $lugardes = $_POST['lugardestino2'];
  }elseif ($motivotr === 'VISITA FAMILIAR') {
    $lugardes = $_POST['lugardestino3'];
  }elseif ($motivotr === 'DILIGENCIA MINISTERIAL') {
    $lugardes = $_POST['lugardestino4'];
  }elseif ($motivotr === 'DILIGENCIA JUDICIAL') {
    $lugardes = $_POST['lugardestino5'];
  }elseif ($motivotr === 'ASISTENCIA MEDICA') {
    $lugardes = $_POST['lugardestino6'];
  }elseif ($motivotr === 'CUSTODIA POLICIAL') {
    $lugardes = $_POST['lugardestino7'];
  }
  // obteniendo datos de lugar domicilio y municio cuando sea otro
  $espmotivotrsds = strtoupper($_POST['esp_lugar_motivosave']);
  $esplugdes = strtoupper($_POST['esp_lugar_motivosave']);
  $espdomdes = strtoupper($_POST['esp_domicilio_motivosave']);
  $espmundes = $_POST['esp_municipio_motivosave'];
  $fecha_alta = date('y/m/d');
  // carga de datos para actualizar tablas y realizar registro de destinos
  if ($motivotr === 'POR INCORPORACION') {
    $getincmot = "SELECT * FROM react_traslados_mot_inc WHERE lugar = '$lugardes'";
    $rgetincmot = $mysqli ->query($getincmot);
    $fgetincmot = $rgetincmot->fetch_assoc();
    $idanteiorinc = $fgetincmot['id'];
    $idnext = $idanteiorinc + 1;
    if ($lugardes === 'OTRO') {
      // UPDATE DE OPCION OTRO SE ACTULIZA ID
      $updidinc = "UPDATE react_traslados_mot_inc SET id = '$idnext' WHERE lugar = 'OTRO'";
      $rupdidinc = $mysqli ->query($updidinc);
      // ADD LUGAR, DOMICILIO Y MUNICIPIO CUANDO SEA OTRO
      $addidinc = "INSERT INTO react_traslados_mot_inc(id, lugar, domicilio, municipio)
              VALUES ('$idanteiorinc', '$esplugdes', '$espdomdes', '$espmundes')";
      $raddidinc = $mysqli ->query($addidinc);
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$esplugdes', '$espdomdes', '$espmundes', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }else {
      // obteniendo datos cuando ya existe el lugar
      $getdatosinc = "SELECT * FROM react_traslados_mot_inc  WHERE lugar = '$lugardes'";
      $rgetdatosinc = $mysqli ->query($getdatosinc);
      $fgetdatosinc = $rgetdatosinc -> fetch_assoc();
      $lugardes;
      $domicilioget = $fgetdatosinc['domicilio'];
      $municipioget = $fgetdatosinc['municipio'];
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO CONSULTANDO LOS DATOS FALTANTES DE LA TABLA react_traslados_mot_inc
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$lugardes', '$domicilioget', '$municipioget', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }
  }elseif ($motivotr === 'POR DESINCORPORACION') {
    $getdesincmot = "SELECT * FROM react_traslados_mot_desinc WHERE lugar = '$lugardes'";
    $rgetdesincmot = $mysqli ->query($getdesincmot);
    $fgetdesincmot = $rgetdesincmot->fetch_assoc();
    $idanteiorinc = $fgetdesincmot['id'];
    $idnext = $idanteiorinc + 1;
    if ($lugardes === 'OTRO') {
      // UPDATE DE OPCION OTRO SE ACTULIZA ID
      $updiddesinc = "UPDATE react_traslados_mot_desinc SET id = '$idnext' WHERE lugar = 'OTRO'";
      $rupdiddesinc = $mysqli ->query($updiddesinc);
      // ADD LUGAR, DOMICILIO Y MUNICIPIO CUANDO SEA OTRO
      $addiddesinc = "INSERT INTO react_traslados_mot_desinc(id, lugar, domicilio, municipio)
              VALUES ('$idanteiorinc', '$esplugdes', '$espdomdes', '$espmundes')";
      $raddiddesinc = $mysqli ->query($addiddesinc);
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$esplugdes', '$espdomdes', '$espmundes', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }else {
      // obteniendo datos cuando ya existe el lugar
      $getdatosdesinc = "SELECT * FROM react_traslados_mot_desinc WHERE lugar = '$lugardes'";
      $rgetdatosdesinc = $mysqli ->query($getdatosdesinc);
      $fgetdatosdesinc = $rgetdatosdesinc -> fetch_assoc();
      $lugardes;
      $domicilioget = $fgetdatosdesinc['domicilio'];
      $municipioget = $fgetdatosdesinc['municipio'];
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO CONSULTANDO LOS DATOS FALTANTES DE LA TABLA react_traslados_mot_inc
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$lugardes', '$domicilioget', '$municipioget', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }
  }elseif ($motivotr === 'VISITA FAMILIAR') {
    $getvisfammot = "SELECT * FROM react_traslados_mot_visfam WHERE lugar = '$lugardes'";
    $rgetvisfammot = $mysqli ->query($getvisfammot);
    $fgetvisfammot = $rgetvisfammot->fetch_assoc();
    $idanteiorinc = $fgetvisfammot['id'];
    $idnext = $idanteiorinc + 1;
    if ($lugardes === 'OTRO') {
      // UPDATE DE OPCION OTRO SE ACTULIZA ID
      $updidvisfam = "UPDATE react_traslados_mot_visfam SET id = '$idnext' WHERE lugar = 'OTRO'";
      $rupdidvisfam = $mysqli ->query($updidvisfam);
      // ADD LUGAR, DOMICILIO Y MUNICIPIO CUANDO SEA OTRO
      $addidvisfam = "INSERT INTO react_traslados_mot_visfam(id, lugar, domicilio, municipio)
              VALUES ('$idanteiorinc', '$esplugdes', '$espdomdes', '$espmundes')";
      $raddidvisfam = $mysqli ->query($addidvisfam);
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$esplugdes', '$espdomdes', '$espmundes', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }else {
      // obteniendo datos cuando ya existe el lugar
      $getdatosvisfam = "SELECT * FROM react_traslados_mot_visfam WHERE lugar = '$lugardes'";
      $rgetdatosvisfam = $mysqli ->query($getdatosvisfam);
      $fgetdatosvisfam = $rgetdatosvisfam -> fetch_assoc();
      $lugardes;
      $domicilioget = $fgetdatosvisfam['domicilio'];
      $municipioget = $fgetdatosvisfam['municipio'];
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO CONSULTANDO LOS DATOS FALTANTES DE LA TABLA react_traslados_mot_inc
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$lugardes', '$domicilioget', '$municipioget', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }
  }elseif ($motivotr === 'DILIGENCIA MINISTERIAL') {
    $getdilminmot = "SELECT * FROM react_traslados_mot_dilmin WHERE lugar = '$lugardes'";
    $rgetdilminmot = $mysqli ->query($getdilminmot);
    $fgetdilminmot = $rgetdilminmot->fetch_assoc();
    $idanteiorinc = $fgetdilminmot['id'];
    $idnext = $idanteiorinc + 1;
    if ($lugardes === 'OTRO') {
      // UPDATE DE OPCION OTRO SE ACTULIZA ID
      $updiddilmin = "UPDATE react_traslados_mot_dilmin SET id = '$idnext' WHERE lugar = 'OTRO'";
      $rupdiddilmin = $mysqli ->query($updiddilmin);
      // ADD LUGAR, DOMICILIO Y MUNICIPIO CUANDO SEA OTRO
      $addiddilmin = "INSERT INTO react_traslados_mot_dilmin(id, lugar, domicilio, municipio)
              VALUES ('$idanteiorinc', '$esplugdes', '$espdomdes', '$espmundes')";
      $raddiddilmin = $mysqli ->query($addiddilmin);
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$esplugdes', '$espdomdes', '$espmundes', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }else {
      // obteniendo datos cuando ya existe el lugar
      $getdatosdilmin = "SELECT * FROM react_traslados_mot_dilmin WHERE lugar = '$lugardes'";
      $rgetdatosdilmin = $mysqli ->query($getdatosdilmin);
      $fgetdatosdilmin = $rgetdatosdilmin -> fetch_assoc();
      $lugardes;
      $domicilioget = $fgetdatosdilmin['domicilio'];
      $municipioget = $fgetdatosdilmin['municipio'];
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO CONSULTANDO LOS DATOS FALTANTES DE LA TABLA react_traslados_mot_inc
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$lugardes', '$domicilioget', '$municipioget', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }
  }elseif ($motivotr === 'DILIGENCIA JUDICIAL') {
    $getdiljudmot = "SELECT * FROM react_traslados_mot_diljud WHERE lugar = '$lugardes'";
    $rgetdiljudmot = $mysqli ->query($getdiljudmot);
    $fgetdiljudmot = $rgetdiljudmot->fetch_assoc();
    $idanteiorinc = $fgetdiljudmot['id'];
    $idnext = $idanteiorinc + 1;
    if ($lugardes === 'OTRO') {
      // UPDATE DE OPCION OTRO SE ACTULIZA ID
      $updiddiljud = "UPDATE react_traslados_mot_diljud SET id = '$idnext' WHERE lugar = 'OTRO'";
      $rupdiddiljud = $mysqli ->query($updiddiljud);
      // ADD LUGAR, DOMICILIO Y MUNICIPIO CUANDO SEA OTRO
      $addiddiljud = "INSERT INTO react_traslados_mot_diljud(id, lugar, domicilio, municipio)
              VALUES ('$idanteiorinc', '$esplugdes', '$espdomdes', '$espmundes')";
      $raddiddiljud = $mysqli ->query($addiddiljud);
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$esplugdes', '$espdomdes', '$espmundes', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }else {
      // obteniendo datos cuando ya existe el lugar
      $getdatosdiljud = "SELECT * FROM react_traslados_mot_diljud WHERE lugar = '$lugardes'";
      $rgetdatosdiljud = $mysqli ->query($getdatosdiljud);
      $fgetdatosdiljud = $rgetdatosdiljud -> fetch_assoc();
      $lugardes;
      $domicilioget = $fgetdatosdiljud['domicilio'];
      $municipioget = $fgetdatosdiljud['municipio'];
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO CONSULTANDO LOS DATOS FALTANTES DE LA TABLA react_traslados_mot_inc
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$lugardes', '$domicilioget', '$municipioget', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }
  }elseif ($motivotr === 'ASISTENCIA MEDICA') {
    $getasimeddmot = "SELECT * FROM react_traslados_mot_asimed WHERE lugar = '$lugardes'";
    $rgetasimeddmot = $mysqli ->query($getasimeddmot);
    $fgetasimeddmot = $rgetasimeddmot->fetch_assoc();
    $idanteiorinc = $fgetasimeddmot['id'];
    $idnext = $idanteiorinc + 1;
    if ($lugardes === 'OTRO') {
      // UPDATE DE OPCION OTRO SE ACTULIZA ID
      $updidasimed = "UPDATE react_traslados_mot_asimed SET id = '$idnext' WHERE lugar = 'OTRO'";
      $rupdidasimed = $mysqli ->query($updidasimed);
      // ADD LUGAR, DOMICILIO Y MUNICIPIO CUANDO SEA OTRO
      $addidasimed = "INSERT INTO react_traslados_mot_asimed(id, lugar, domicilio, municipio)
              VALUES ('$idanteiorinc', '$esplugdes', '$espdomdes', '$espmundes')";
      $raddidasimed = $mysqli ->query($addidasimed);
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$esplugdes', '$espdomdes', '$espmundes', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }else {
      // obteniendo datos cuando ya existe el lugar
      $getdatosasimed = "SELECT * FROM react_traslados_mot_asimed WHERE lugar = '$lugardes'";
      $rgetdatosasimed = $mysqli ->query($getdatosasimed);
      $fgetdatosasimed = $rgetdatosasimed -> fetch_assoc();
      $lugardes;
      $domicilioget = $fgetdatosasimed['domicilio'];
      $municipioget = $fgetdatosasimed['municipio'];
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO CONSULTANDO LOS DATOS FALTANTES DE LA TABLA react_traslados_mot_inc
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$lugardes', '$domicilioget', '$municipioget', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }
  }elseif ($motivotr === 'CUSTODIA POLICIAL') {
    $getcuspoldmot = "SELECT * FROM react_traslados_mot_cuspol WHERE lugar = '$lugardes'";
    $rgetcuspoldmot = $mysqli ->query($getcuspoldmot);
    $fgetcuspoldmot = $rgetcuspoldmot->fetch_assoc();
    $idanteiorinc = $fgetcuspoldmot['id'];
    $idnext = $idanteiorinc + 1;
    if ($lugardes === 'OTRO') {
      // UPDATE DE OPCION OTRO SE ACTULIZA ID
      $updidcuspol = "UPDATE react_traslados_mot_cuspol SET id = '$idnext' WHERE lugar = 'OTRO'";
      $rupdidcuspol = $mysqli ->query($updidcuspol);
      // ADD LUGAR, DOMICILIO Y MUNICIPIO CUANDO SEA OTRO
      $addidcuspol = "INSERT INTO react_traslados_mot_cuspol(id, lugar, domicilio, municipio)
              VALUES ('$idanteiorinc', '$esplugdes', '$espdomdes', '$espmundes')";
      $raddidcuspol = $mysqli ->query($addidcuspol);
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$esplugdes', '$espdomdes', '$espmundes', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }else {
      // obteniendo datos cuando ya existe el lugar
      $getdatoscuspol = "SELECT * FROM react_traslados_mot_cuspol WHERE lugar = '$lugardes'";
      $rgetdatoscuspol = $mysqli ->query($getdatoscuspol);
      $fgetdatoscuspol = $rgetdatoscuspol -> fetch_assoc();
      $lugardes;
      $domicilioget = $fgetdatoscuspol['domicilio'];
      $municipioget = $fgetdatoscuspol['municipio'];
      // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO CONSULTANDO LOS DATOS FALTANTES DE LA TABLA react_traslados_mot_inc
      $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                                 VALUES ('$id_traslado', '$lugardes', '$domicilioget', '$municipioget', '$motivotr', '$fecha_alta', '$name')";
      $radddestinotraslado = $mysqli->query($adddestinotraslado);
    }
  }elseif ($motivotr === 'OTRO') {
    // ADD DESTINO A LA TABLA DE REACT DESTINOS CON LOS DATOS DE OTRO
    $adddestinotraslado = "INSERT INTO react_destinos_traslados(id_traslado, lugar, domicilio, municipio, motivo, fecha_alta, usuario)
                               VALUES ('$id_traslado', '$esplugdes', '$espdomdes', '$espmundes', '$espmotivotrsds', '$fecha_alta', '$name')";
    $radddestinotraslado = $mysqli->query($adddestinotraslado);
  }
  // validacion de update correcto
  if($radddestinotraslado){
    echo ("<script type='text/javaScript'>
     window.location.href='../traslados_ejecucion/add_trasladonext2.php?id_traslado=$id_traslado';
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../../consultores/admin.php'>";
}
?>
