<?php
// MEDIDAS de ASISTENCIA
// ENERO
$eneroasis = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-01-01' AND '2026-01-31' AND clasificacion = 'ASISTENCIA'";
$reneroasis = $mysqli->query($eneroasis);
$feneroasis = $reneroasis->fetch_assoc();
// FEBRERO
$febreroasis = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-02-01' AND '2026-02-28' AND clasificacion = 'ASISTENCIA'";
$rfebreroasis = $mysqli->query($febreroasis);
$ffebreroasis = $rfebreroasis->fetch_assoc();
// MARZO
$marzoasis = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-03-01' AND '2026-03-31' AND clasificacion = 'ASISTENCIA'";
$rmarzoasis = $mysqli->query($marzoasis);
$fmarzoasis = $rmarzoasis->fetch_assoc();
// ABRIL
$abrilasis = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-04-01' AND '2026-04-30' AND clasificacion = 'ASISTENCIA'";
$rabrilasis = $mysqli->query($abrilasis);
$fabrilasis = $rabrilasis->fetch_assoc();
// MAYO
$mayoasis = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-05-01' AND '2026-05-31' AND clasificacion = 'ASISTENCIA'";
$rmayoasis = $mysqli->query($mayoasis);
$fmayoasis = $rmayoasis->fetch_assoc();
// JUNIO
$junioasis = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-06-01' AND '2026-06-30' AND clasificacion = 'ASISTENCIA'";
$rjunioasis = $mysqli->query($junioasis);
$fjunioasis = $rjunioasis->fetch_assoc();
// JULIO
$julioasis = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-07-01' AND '2026-07-31' AND clasificacion = 'ASISTENCIA'";
$rjulioasis = $mysqli->query($julioasis);
$fjulioasis = $rjulioasis->fetch_assoc();
// AGOSTO
$agostoasis = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-08-01' AND '2026-08-31' AND clasificacion = 'ASISTENCIA'";
$ragostoasis = $mysqli->query($agostoasis);
$fagostoasis = $ragostoasis->fetch_assoc();
// SEPTIEMBRE
$septiembreasis = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-09-01' AND '2026-09-30' AND clasificacion = 'ASISTENCIA'";
$rseptiembreasis = $mysqli->query($septiembreasis);
$fseptiembreasis = $rseptiembreasis->fetch_assoc();
// OCTUBRE
$octubreasis = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-10-01' AND '2026-10-31' AND clasificacion = 'ASISTENCIA'";
$roctubreasis = $mysqli->query($octubreasis);
$foctubreasis = $roctubreasis->fetch_assoc();
// NOVIEMBRE
$noviembreasis = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-11-01' AND '2026-11-30' AND clasificacion = 'ASISTENCIA'";
$rnoviembreasis = $mysqli->query($noviembreasis);
$fnoviembreasis = $rnoviembreasis->fetch_assoc();
// DICIEMBRE
$diciembreasis = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-12-01' AND '2026-12-31' AND clasificacion = 'ASISTENCIA'";
$rdiciembreasis = $mysqli->query($diciembreasis);
$fdiciembreasis = $rdiciembreasis->fetch_assoc();

// MEDIDAS de RESGUARDO
// ENERO
$eneroresg = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-01-01' AND '2026-01-31' AND clasificacion = 'RESGUARDO'";
$reneroresg = $mysqli->query($eneroresg);
$feneroresg = $reneroresg->fetch_assoc();
// FEBRERO
$febreroresg = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-02-01' AND '2026-02-28' AND clasificacion = 'RESGUARDO'";
$rfebreroresg = $mysqli->query($febreroresg);
$ffebreroresg = $rfebreroresg->fetch_assoc();
// MARZO
$marzoresg = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-03-01' AND '2026-03-31' AND clasificacion = 'RESGUARDO'";
$rmarzoresg = $mysqli->query($marzoresg);
$fmarzoresg = $rmarzoresg->fetch_assoc();
// ABRIL
$abrilresg = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-04-01' AND '2026-04-30' AND clasificacion = 'RESGUARDO'";
$rabrilresg = $mysqli->query($abrilresg);
$fabrilresg = $rabrilresg->fetch_assoc();
// MAYO
$mayoresg = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-05-01' AND '2026-05-31' AND clasificacion = 'RESGUARDO'";
$rmayoresg = $mysqli->query($mayoresg);
$fmayoresg = $rmayoresg->fetch_assoc();
// JUNIO
$junioresg = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-06-01' AND '2026-06-30' AND clasificacion = 'RESGUARDO'";
$rjunioresg = $mysqli->query($junioresg);
$fjunioresg = $rjunioresg->fetch_assoc();
// JULIO
$julioresg = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-07-01' AND '2026-07-31' AND clasificacion = 'RESGUARDO'";
$rjulioresg = $mysqli->query($julioresg);
$fjulioresg = $rjulioresg->fetch_assoc();
// AGOSTO
$agostoresg = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-08-01' AND '2026-08-31' AND clasificacion = 'RESGUARDO'";
$ragostoresg = $mysqli->query($agostoresg);
$fagostoresg = $ragostoresg->fetch_assoc();
// SEPTIEMBRE
$septiembreresg = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-09-01' AND '2026-09-30' AND clasificacion = 'RESGUARDO'";
$rseptiembreresg = $mysqli->query($septiembreresg);
$fseptiembreresg = $rseptiembreresg->fetch_assoc();
// OCTUBRE
$octubreresg = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-10-01' AND '2026-10-31' AND clasificacion = 'RESGUARDO'";
$roctubreresg = $mysqli->query($octubreresg);
$foctubreresg = $roctubreresg->fetch_assoc();
// NOVIEMBRE
$noviembreresg = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-11-01' AND '2026-11-30' AND clasificacion = 'RESGUARDO'";
$rnoviembreresg = $mysqli->query($noviembreresg);
$fnoviembreresg = $rnoviembreresg->fetch_assoc();
// DICIEMBRE
$diciembreresg = "SELECT COUNT(*) AS total FROM medidas
WHERE date_ejecucion BETWEEN '2026-12-01' AND '2026-12-31' AND clasificacion = 'RESGUARDO'";
$rdiciembreresg = $mysqli->query($diciembreresg);
$fdiciembreresg = $rdiciembreresg->fetch_assoc();
?>
