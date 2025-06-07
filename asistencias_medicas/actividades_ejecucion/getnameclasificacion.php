<?php
if ($idactivity === '3') {
  $nameclasfac = $ftraeractividad['clasificacion'];
  $restfac = substr($nameclasfac, -1);
  $facilitarname = "SELECT nombre FROM react_contacto_familiar WHERE id = '$restfac'";
  $rfacilitarname = $mysqli ->query($facilitarname);
  $ffacilitarname = $rfacilitarname ->fetch_assoc();
  $nombre_clasificacion = $ffacilitarname['nombre'];
}elseif ($idactivity === '4') {
  $nameclasimplem = $ftraeractividad['clasificacion'];
  $restimplem = substr($nameclasimplem, -1);
  $implementarname = "SELECT nombre FROM react_acciones_seguridad_cp WHERE id = '$restimplem'";
  $rimplementarname = $mysqli ->query($implementarname);
  $fimplementarname = $rimplementarname ->fetch_assoc();
  $nombre_clasificacion = $fimplementarname['nombre'];
}elseif ($idactivity === '5') {
  $nameclassalv = $ftraeractividad['clasificacion'];
  $restsalv = substr($nameclassalv, -1);
  $salvaguardarname = "SELECT nombre FROM react_salvaguradar_integridad WHERE id = '$restsalv'";
  $rsalvaguardarname = $mysqli ->query($salvaguardarname);
  $fsalvaguardarname = $rsalvaguardarname ->fetch_assoc();
  $nombre_clasificacion = $fsalvaguardarname['nombre'];
}
?>
