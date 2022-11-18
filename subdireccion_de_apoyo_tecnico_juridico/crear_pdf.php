<?php
$nombre_servidor =$_POST['oficiosolicitud'];
echo 'servidor--->'.$nombre_servidor.'<br />';
$fecha =$_POST['fechasolicitud'];
echo 'fecha solicitud--->'.$fecha.'<br />';
$zona =$_POST['zonageografica'];
echo 'zona--->'.$zona.'<br />';
$delitos =$_POST['delito'];
echo 'delito--->'.$delitos.'<br />';
$carpetainv =$_POST['carpetainv'];
echo 'carpetainv--->'.$carpetainv.'<br />';
$procpenal =$_POST['procpenal'];
echo 'procpenal--->'.$procpenal.'<br />';
$solicitante =$_POST['solicitante'];
echo 'solicitante--->'.$solicitante.'<br />';
$nombreagente =$_POST['nombreagente'];
echo 'nombreagente--->'.$nombreagente.'<br />';
$cargoagente =$_POST['cargoagente'];
echo 'cargoagente--->'.$cargoagente.'<br />';
$adscripcionagente =$_POST['adscripcionagente'];
echo 'adscripcionagente--->'.$adscripcionagente.'<br />';
$teloficina =$_POST['teloficina'];
echo 'teloficina--->'.$teloficina.'<br />';
$celular =$_POST['celular'];
echo 'celular--->'.$celular.'<br />';
$correoelectronico =$_POST['correoelectronico'];
echo 'correoelectronico--->'.$correoelectronico.'<br />';
$procedente =$_POST['procedente'];
echo 'procedente--->'.$procedente.'<br />';
$acuerdopersona =$_POST['acuerdopersona'];
echo 'acuerdopersona--->'.$acuerdopersona.'<br />';
$nombreministerio =$_POST['nombreministerio'];
echo 'nombreministerio--->'.$nombreministerio.'<br />';
$nombresubdireccion =$_POST['nombresubdireccion'];
echo 'nombresubdireccion--->'.$nombresubdireccion.'<br />';
$sede =$_POST['sede'];
echo 'sede--->'.$sede.'<br />';







// $inicialespersona =$_POST['inicialessuj'];
//  $vv =count($inicialespersona);
// $tipintervencion =$_POST['tipointervencion'];
// $privadoliber =$_POST['privadolibertad'];
// $ubicacion =$_POST['ubicacion'];
// $perasis = $_POST['personaasiste'];
// $sitriesgo = $_POST['situacionriesgo'];
// $vulnerabilidad = $_POST['causavulnerabilidad'];
// $tenfermedad = $_POST['tipoenfermedad'];
// $tdiscapacidad = $_POST['nombrediscapacidad'];
// $testimonio = $_POST['testimonio'];
// $medidas = $_POST['medidas'];
// $j=1;
// $h=1;
// $hh=1;
// for ($i=0;$i<count($inicialespersona);$i++){
//   $frel = $inicialespersona[$i];
//   $frel1 = $tipintervencion[$i];
//   $frel2 = $privadoliber[$i];
//   $frel3 = $ubicacion[$i];
//   $frel5 = $perasis[$i];
//   $frel6 = $sitriesgo[$i];
//   $frel7 = $vulnerabilidad[$i];
//   $frel9 = $tenfermedad[$i];
//   $frel11 = $tdiscapacidad[$i];
//   $frel12 = $testimonio[$i];
//   $frel13 = $medidas[$i];
//   if ($frel5 === '') {
//     $frel5 = 'no aplica';
//   }
//   if ($frel9 === '') {
//     $frel9 = 'no aplica';
//   }
//   if ($frel11 === '') {
//     $frel11 = 'no aplica';
//   }
//   $stuff = $_POST['ASISTENCIA_LEGAL'.$j.''];
//   foreach ($stuff as $value) {
//     $stuff2 = $_POST['enfermedad'.$h.''];
//     foreach ($stuff2 as $value2){
//       $stuff3 = $_POST['discapacidad'.$hh.''];
//       foreach ($stuff3 as $value3){
//         // echo $value3;
//         if ($value3 <= count($inicialespersona)) {
//           $vv ='si tiene discapacidad';
//         }else {
//           $vv = 'no tiene discapacidad';
//         }
//       }
//       if ($value2 <= count($inicialespersona)) {
//         $v ='si';
//       }else {
//         $v = 'no';
//       }
//     }
//     if ($value <= count($inicialespersona)) {
//       echo $frel.'--->'.$frel1.'--->'.$frel2.'--->'.$frel3.'--->'.'si'.'--->'.$frel5.'--->'.$frel6.'--->'.$frel7.'--->'.$v.'--->'.$frel9.'--->'.$vv.'--->'.$frel11.'--->'.$frel12.'--->'.$frel13.'<br />';
//     }else {
//       echo $frel.'--->'.$frel1.'--->'.$frel2.'--->'.$frel3.'--->'.'no'.'--->'.$frel5.'--->'.$frel6.'--->'.$frel7.'--->'.$v.'--->'.$frel9.'--->'.$vv.'--->'.$frel11.'--->'.$frel12.'--->'.$frel13.'<br />';
//     }
//     }
// $j = $j+1;
// $h = $h+1;
// $hh = $hh+1;
// }



?>
