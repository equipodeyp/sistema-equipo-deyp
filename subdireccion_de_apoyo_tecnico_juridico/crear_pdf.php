<?php
$nombre_servidor =$_POST['oficiosolicitud'];
echo $nombre_servidor.'<br />';
$delitos =$_POST['delito'];
echo $delitos.'<br />';
$inicialespersona =$_POST['inicialessuj'];
// echo $inicialespersona;
$tipintervencion =$_POST['tipointervencion'];
$privadoliber =$_POST['privadolibertad'];
$personasist = $_POST['personaasiste'];
// $personasist = array($_POST['personaasiste']);
// $inlineRadioOptions =$_POST['inlineRadioOptions_'];
// echo $arrayName = array($inlineRadioOptions);
for ($i=0;$i<count($inicialespersona);$i++){
  $frel = $inicialespersona[$i].'<br />';
  echo $frel;
  echo $frel = $tipintervencion[$i].'<br />';
  echo $frel = $privadoliber[$i].'<br />';
  // echo $frel = $inlineRadioOptions[$i].'<br />';
  echo $personasist[$i].'<br />';

}
// if ($_request['inlineRadioOptions_'] < 4) {
//   echo "si";
// }else {
//   echo 'no';
// }
?>
