<?php
// calculo de fechas automaticas
$anioActual = date("Y");
$mesActual = date("n");
$cantidadDias = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
// echo " ".date('d')." DE ".$meses[date('n')-1]. " DEL ".date('Y') ;
$mesant = $meses[date('n')-2];
$mesanterior = date('n')-1;
$cantidaddiasanterior = cal_days_in_month(CAL_GREGORIAN, $mesanterior, $anioActual);
$fecha_inicio = $anioActual."-01-01";
$fecha_anterior = $anioActual."-".$mesanterior."-".$cantidaddiasanterior;
$diamesinicio = $anioActual."-".$mesActual."-01";
$diamesfin = $anioActual."-".$mesActual."-".$cantidadDias;
$date_principio = $anioActual."-01-01";
$date_termino = $anioActual."-12-31";
////////////////////////conteo  de datos  de la semana anterior//////////////////////////////////////
$noprocede = "SELECT COUNT(DISTINCT expediente.fol_exp) as t  FROM expediente
INNER JOIN valoracionjuridica on expediente.fol_exp = valoracionjuridica.folioexpediente
WHERE valoracionjuridica.resultadovaloracion = 'NO PROCEDE' and expediente.fecha_nueva BETWEEN '2021-01-01' and '$diamesfin'";
$rnoprocede = $mysqli->query($noprocede);
$fnoprocede = $rnoprocede->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$enelaboracionreporte = "SELECT COUNT(*) as t FROM analisis_expediente
INNER JOIN expediente on analisis_expediente.folioexpediente = expediente.fol_exp
WHERE analisis_expediente.analisis = 'EN ELABORACION' and expediente.fecha_nueva BETWEEN '2021-01-01' and '$diamesfin'";
$renelaboracionreporte = $mysqli->query($enelaboracionreporte);
$fenelaboracionreporte = $renelaboracionreporte->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$byejecucion = "SELECT COUNT(*) as t  FROM statusseguimiento WHERE status = 'EN EJECUCION'";
$rbyejecucion = $mysqli->query($byejecucion);
$fbyejecucion = $rbyejecucion ->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$concluido = "SELECT COUNT(*) as t  FROM statusseguimiento WHERE status = 'CONCLUIDO'";
$rconcluido = $mysqli->query($concluido);
$fconcluido = $rconcluido ->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$cancelado = "SELECT COUNT(*) as t  FROM statusseguimiento WHERE status = 'CANCELADO'";
$rcancelado = $mysqli->query($cancelado);
$fcancelado = $rcancelado ->fetch_assoc();
////////////////////////////////////////////////////////////////////////////////
$totalexpedientes = $fnoprocede['t'] + $fenelaboracionreporte['t'] + $fbyejecucion['t'] + $fconcluido['t'] + $fcancelado['t'];
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "NO PROCEDE JURIDICAMENTE"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fnoprocede['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "EN ANÁLISIS PARA DETERMINAR SU INCORPORACIÓN"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fenelaboracionreporte['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "EN EJECUCIÓN"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fbyejecucion['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "CONCLUIDO"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fconcluido['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:left'>"; echo "CANCELADO"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo $fcancelado['t']; "</td>";
echo "</tr>";
////////////////////////////////////////////////////////////////////////////////
echo "<tr>";
echo "<td style='border: 5px solid #97897D; text-align:right'>"; echo "<b>"; echo "TOTAL DE EXPEDIENTES"; echo "</b>"; "</td>";
echo "<td style='border: 5px solid #97897D; text-align:center'>"; echo "<b>"; echo $totalexpedientes; echo "</b>"; "</td>";
echo "</tr>";

?>
