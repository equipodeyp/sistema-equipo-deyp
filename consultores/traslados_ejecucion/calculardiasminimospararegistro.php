<?php
$año_actual = date('Y');
$mes_actual = date('m');
$dia_actual = date('d');
$dias_mes_actual = date('t');
$datemin = $año_actual.'-'.$mes_actual.'-01';
// echo date('l');
date_default_timezone_set("America/Mexico_City");
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
// echo '<h4 align="right">'; echo $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ; echo '</h4>';
// echo $diassemana[date('w')];
// echo "<br>";
// echo $meses[date('n')-1];
// echo "<br>";
if ($diassemana[date('w')] == 'Sábado' AND $dia_actual == "1") {
  // echo "entra primera condicion";
  // echo "<br>";
}elseif ($diassemana[date('w')] == 'Domingo' AND $dia_actual == "1") {
  // echo "entra segunda condicion";
  // echo "<br>";
}else {
  // echo "sin condicion por el momento";
  // echo "<br>";
}

?>
