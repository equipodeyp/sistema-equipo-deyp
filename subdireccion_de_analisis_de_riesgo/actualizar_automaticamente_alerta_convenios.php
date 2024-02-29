<?php
// echo "id_persona----id_unico----fecha_inicio----fecha_termino----dias_restantes----observaciones----semaforo----estatus";
// echo "<br>";
// CONSULTA DE LA TABLA DE ALERTAS DE CONVENIOS
date_default_timezone_set("America/Mexico_City");
$semaforo = '';
$alert_convs = "SELECT * FROM alerta_convenios WHERE estatus = 'PENDIENTE'";
$ralert_convs = $mysqli -> query($alert_convs);
while ($falert_convs = $ralert_convs -> fetch_assoc()) {
  $id_persona_alert = $falert_convs['id_persona'];
  $obtenfechaactual = date('Y-m-d');
  $fechaactualhoy= new DateTime($obtenfechaactual);
  $convertirfechatermino = $falert_convs['fecha_termino'];
  $fechaterminodate= new DateTime($convertirfechatermino);
  $diasrestantesconvenioporterminar = $fechaactualhoy->diff($fechaterminodate);
  $diasfaltantes = $diasrestantesconvenioporterminar->days;
  // echo $diasfaltantes;
  // echo $falert_convs['id_persona'].'----'.$falert_convs['id_unico'].'----'.$falert_convs['fecha_inicio'].'----'.$falert_convs['fecha_termino'].'----'.$falert_convs['dias_restantes'].'----'.$falert_convs['observaciones'].'----'.$falert_convs['semaforo'].'----'.$falert_convs['estatus'];
  // echo "<br>";
  if ($diasfaltantes > 0 && $diasfaltantes < 6) {
    $semaforo = 'ROJO';
  }elseif ($diasfaltantes > 5 && $diasfaltantes < 11) {
    $semaforo = 'AMARILLO';
  }elseif ($diasfaltantes > 10 && $diasfaltantes < 16) {
    $semaforo = 'VERDE';
  }elseif ($diasfaltantes === 0) {
    $semaforo = 'CRITICO';
  }else {
    $semaforo = 'PENDIENTE';
  }
  // echo $falert_convs['id'].'----'.$semaforo;
  // echo "<br>";
  // sql para actualizar autopmaticamente la tabla de alerta de convenios
  $updalertconv = "UPDATE alerta_convenios SET dias_restantes ='$diasfaltantes', semaforo = '$semaforo' WHERE id_persona = '$id_persona_alert'";
  $rupdalertconv = $mysqli -> query($updalertconv);
}
?>
