<?php
// $nombre_servidor =$_POST['oficiosolicitud'];
// // echo $nombre_servidor.'<br />';
// $delitos =$_POST['delito'];
// // echo $delitos.'<br />';
$inicialespersona =$_POST['inicialessuj'];
 $vv =count($inicialespersona);
$tipintervencion =$_POST['tipointervencion'];
$privadoliber =$_POST['privadolibertad'];
$ubicacion =$_POST['ubicacion'];
$perasis = $_POST['personaasiste'];
$sitriesgo = $_POST['situacionriesgo'];
$j=1;
for ($i=0;$i<count($inicialespersona);$i++){
  $frel = $inicialespersona[$i];
  $frel1 = $tipintervencion[$i];
  $frel2 = $privadoliber[$i];
  $frel3 = $ubicacion[$i];
  $frel5 = $perasis[$i];
  $frel6 = $sitriesgo[$i];
  if ($frel5 === '') {
    $frel5 = 'no aplica';
  }
  $stuff = $_POST['ASISTENCIA_LEGAL'.$j.''];
  foreach ($stuff as $value) {
    if ($value <= count($inicialespersona)) {
      echo $frel.'--->'.$frel1.'--->'.$frel2.'--->'.$frel3.'--->'.'si'.'--->'.$frel5.'--->'.$frel6.'<br />';
    }else {
      echo $frel.'--->'.$frel1.'--->'.$frel2.'--->'.$frel3.'--->'.'no'.'--->'.$frel5.'--->'.$frel6.'<br />';
    }
    }
$j = $j+1;
}
?>
