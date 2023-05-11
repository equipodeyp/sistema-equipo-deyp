<?php
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");

echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;

$fecha_actual = date("Y-m-d");
//sumo 1 mes


$day = date("l");
switch ($day) {
    case "Sunday":
           echo "Hoy es domingo";
           echo "<br>";
           echo 'fecha de inicio de reporte semanal  '.$fecha_actual;
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 6 day"));
           echo "<br>";
           echo 'fecha final de reporte semanal  '.$fecha_fin;
           ////////////////////fechas de reporte semanal
           $diainicio = strtotime($fecha_actual);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           if ($diaini > $diafin) {
             // echo "mes siguiente";
             $mesreal = $meses[date('n')];
           }else {
             $mesreal = $meses[date('n')-1];
           }
           echo "<br>";
           echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$mesreal. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Monday":
           echo "Hoy es lunes";
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
           echo "<br>";
           echo 'fecha de inicio de reporte semanal  '.$fecha_inicio;
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 5 day"));
           echo "<br>";
           echo 'fecha final de reporte semanal  '.$fecha_fin;
           ////////////////////fechas de reporte semanal
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           if ($diaini > $diafin) {
             // echo "mes siguiente";
             $mesreal = $meses[date('n')];
           }else {
             $mesreal = $meses[date('n')-1];
           }
           echo "<br>";
           echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$mesreal. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Tuesday":
           echo "Hoy es martes";
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
           echo "<br>";
           echo 'fecha de inicio de reporte semanal  '.$fecha_inicio;
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 4 day"));
           echo "<br>";
           echo 'fecha final de reporte semanal  '.$fecha_fin;
           ////////////////////fechas de reporte semanal
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           if ($diaini > $diafin) {
             // echo "mes siguiente";
             $mesreal = $meses[date('n')-1];
           }else {
             $mesreal = $meses[date('n')-1];
           }
           echo "<br>";
           echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$mesreal. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Wednesday":
           echo "Hoy es miércoles";
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
           echo "<br>";
           echo 'fecha de inicio de reporte semanal  '.$fecha_inicio;
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 3 day"));
           echo "<br>";
           echo 'fecha final de reporte semanal  '.$fecha_fin;
           ////////////////////fechas de reporte semanal
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           if ($diaini > $diafin) {
             // echo "mes siguiente";
             $mesreal = $meses[date('n')];
           }else {
             $mesreal = $meses[date('n')-1];
           }
           echo "<br>";
           echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$mesreal. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Thursday":
           echo "Hoy es jueves";
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
           echo "<br>";
           echo 'fecha de inicio de reporte semanal  '.$fecha_inicio;
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 2 day"));
           echo "<br>";
           echo 'fecha final de reporte semanal  '.$fecha_fin;
           ////////////////////fechas de reporte semanal
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           if ($diaini > $diafin) {
             // echo "mes siguiente";
             $mesreal = $meses[date('n')];
           }else {
             $mesreal = $meses[date('n')-1];
           }
           echo "<br>";
           echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$mesreal. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Friday":
    echo "<br>";
           echo "Hoy es viernes";
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
           echo "<br>";
           echo 'fecha de inicio de reporte semanal  '.$fecha_inicio;
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 1 day"));
           echo "<br>";
           echo 'fecha final de reporte semanal  '.$fecha_fin;
           ////////////////////fechas de reporte semanal
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           if ($diaini > $diafin) {
             // echo "mes siguiente";
             $mesreal = $meses[date('n')];
           }else {
             $mesreal = $meses[date('n')-1];
           }
           echo "<br>";
           echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$mesreal. " DEL ".date('Y'); echo '</h1>';
    break;
    case "Saturday":
           echo "Hoy es sábado";
           $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 6 day"));
           echo "<br>";
           echo 'fecha de inicio de reporte semanal  '.$fecha_inicio;
           $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 0 day"));
           echo "<br>";
           echo 'fecha final de reporte semanal  '.$fecha_fin;
           ////////////////////fechas de reporte semanal
           $diainicio = strtotime($fecha_inicio);
           $diaini = date( "j", $diainicio);
           $diafinal = strtotime($fecha_fin);
           $diafin = date( "j", $diafinal);
           if ($diaini > $diafin) {
             // echo "mes siguiente";
             $mesreal = $meses[date('n')];
           }else {
             $mesreal = $meses[date('n')-1];
           }
           echo "<br>";
           echo '<h1 style="text-align:center">' ; echo "REPORTE SEMANAL DEL ".$diaini." AL ".$diafin. " DE ".$mesreal. " DEL ".date('Y'); echo '</h1>';
    break;
}
?>
