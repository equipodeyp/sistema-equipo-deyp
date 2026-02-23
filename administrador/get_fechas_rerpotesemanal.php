<?php
echo "archivo para obtener fechas de reporte semanal<br>";
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
echo $fecha_actual = date("Y-m-d");
echo "<br>";
echo $year = date("Y");
echo "<br>";
echo $day = date("l");
echo "<br>";
switch ($day) {
  case 'Monday':
    // code...
    break;

  default:
    // code...
    break;
}
?>
