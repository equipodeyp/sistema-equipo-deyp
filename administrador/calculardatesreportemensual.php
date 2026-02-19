<?php
// calculo de fechas automaticas
$anioActual = date("Y");
$mesActual = date("n");
if ($mesActual < 10) {
  $mesActual = '0'.$mesActual;
}
$cantidadDias = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
$mesesminusculas = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
// echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
$mesant = $meses[date('n')-1];
$mesanterior = date('n')-1;
if ($mesanterior < 10) {
  $mesanterior = '0'.$mesanterior;
}
$cantidaddiasanterior = cal_days_in_month(CAL_GREGORIAN, $mesanterior, $anioActual);
$diasDelMes = date('t');
$dateinicio = $anioActual."-01-01";
$datetermino = $anioActual."-12-31";
$dateinicio_col1 = $anioActual."-01-01";
// echo "<br>";
$datefin_col1 = $anioActual."-".$mesanterior."-".$cantidaddiasanterior;
// echo "<br>";
$dateinicio_col2 = $anioActual."-".$mesActual."-01";
// echo "<br>";
$datefin_col2 = $anioActual."-".$mesActual."-".$diasDelMes;
// echo "<br>";
?>
