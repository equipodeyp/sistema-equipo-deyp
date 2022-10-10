<?php
$nombre_servidor =$_POST['oficiosolicitud'];
echo $nombre_servidor.'<br />';
$delitos =$_POST['delito'];
echo $delitos.'<br />';
$inicialespersona =$_POST['inicialessuj'];
$tipintervencion =$_POST['tipointervencion'];
$privadoliber =$_POST['privadolibertad'];
for ($i=0;$i<count($inicialespersona);$i++){
  $frel = $inicialespersona[$i].'<br />';
  echo $frel;
  echo $frel = $tipintervencion[$i].'<br />';
  echo $frel = $privadoliber[$i].'<br />';

}
?>
