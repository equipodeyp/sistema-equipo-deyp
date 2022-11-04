<?php
// $nombre_servidor =$_POST['oficiosolicitud'];
// // echo $nombre_servidor.'<br />';
// $delitos =$_POST['delito'];
// // echo $delitos.'<br />';
$inicialespersona =$_POST['inicialessuj'];
echo $vv =count($inicialespersona);

// $tipintervencion =$_POST['tipointervencion'];
// $privadoliber =$_POST['privadolibertad'];
// $personasist = $_POST['personaasiste'];
$groups = "";

for ($i=1;$i<=count($inicialespersona);$i++){
  echo $groups .= $_POST['inlineRadioOptions'.$i.''];


}
echo $groups;
for ($i=0;$i<count($inicialespersona);$i++){
  $frel = $inicialespersona[$i].'<br />';
  // echo $frel;
  // echo $frel = $tipintervencion[$i].'<br />';
  // echo $frel = $privadoliber[$i].'<br />';
  // echo $frel = $inlineRadioOptions[$i].'<br />';
  // echo $personasist[$i].'<br />';
}

?>
