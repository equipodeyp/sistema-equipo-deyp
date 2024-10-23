<?php
/////////////////////////////////SUJETOS EN CENTROS DE RESGUARDO DEL AÑO 2021
  // TOTAL DE PERSONAS MENORES DE EDAD EN CENTROS DE RESGUARDO
  $menoredad = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.grupoedad = 'MENOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (medidas.date_provisional BETWEEN '2021-06-01' AND '2021-12-31' OR medidas.date_definitva BETWEEN '2021-01-01' AND '2021-12-31')";
  $rmenoredad = $mysqli->query($menoredad);
  $fmenoredad = $rmenoredad->fetch_assoc();
  // TOTAL DE MUJERES MENORES DE EDAD EN CENTROS DE RESGUARDO
  $menoredadmujer = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE  datospersonales.sexopersona = 'MUJER' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (medidas.date_provisional BETWEEN '2021-06-01' AND '2021-12-31' OR medidas.date_definitva BETWEEN '2021-01-01' AND '2021-12-31')";
  $rmenoredadmujer = $mysqli->query($menoredadmujer);
  $fmenoredadmujer = $rmenoredadmujer->fetch_assoc();
  // TOTAL DE HOMBRES MENORES DE EDAD EN CENTROS DE RESGUARDO
  $menoredadhombre = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE  datospersonales.sexopersona = 'HOMBRE' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (medidas.date_provisional BETWEEN '2021-06-01' AND '2021-12-31' OR medidas.date_definitva BETWEEN '2021-01-01' AND '2021-12-31')";
  $rmenoredadhombre = $mysqli->query($menoredadhombre);
  $fmenoredadhombre = $rmenoredadhombre->fetch_assoc();
  // TOTAL DE PERSONAS MAYORES DE EDAD EN CENTROS DE RESGUARDO
  $mayoredad = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.grupoedad = 'MAYOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (medidas.date_provisional BETWEEN '2021-06-01' AND '2021-12-31' OR medidas.date_definitva BETWEEN '2021-01-01' AND '2021-12-31')";
  $rmayoredad = $mysqli->query($mayoredad);
  $fmayoredad = $rmayoredad->fetch_assoc();
  // TOTAL DE MUJERES MAYORES DE EDAD EN CENTROS DE RESGUARDO
  $mayoredadmujer = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE  datospersonales.sexopersona = 'MUJER' AND datospersonales.grupoedad = 'MAYOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (medidas.date_provisional BETWEEN '2021-06-01' AND '2021-12-31' OR medidas.date_definitva BETWEEN '2021-01-01' AND '2021-12-31')";
  $rmayoredadmujer = $mysqli->query($mayoredadmujer);
  $fmayoredadmujer = $rmayoredadmujer->fetch_assoc();
  // TOTAL DE HOMBRES MAYORES DE EDAD EN CENTROS DE RESGUARDO
  $mayoredadhombre = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE  datospersonales.sexopersona = 'HOMBRE' AND datospersonales.grupoedad = 'MAYOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (medidas.date_provisional BETWEEN '2021-06-01' AND '2021-12-31' OR medidas.date_definitva BETWEEN '2021-01-01' AND '2021-12-31')";
  $rmayoredadhombre = $mysqli->query($mayoredadhombre);
  $fmayoredadhombre = $rmayoredadhombre->fetch_assoc();
  // TOTAL DE MUJERES EN CENTROS DE RESGUARDO
  $totalmujer = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE  datospersonales.sexopersona = 'MUJER' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (medidas.date_provisional BETWEEN '2021-06-01' AND '2021-12-31' OR medidas.date_definitva BETWEEN '2021-01-01' AND '2021-12-31')";
  $rtotalmujer = $mysqli->query($totalmujer);
  $ftotalmujer = $rtotalmujer->fetch_assoc();
  // TOTAL DE HOMBRE EN CENTROS DE RESGUARDO
  $totalhombre = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE  datospersonales.sexopersona = 'HOMBRE' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (medidas.date_provisional BETWEEN '2021-06-01' AND '2021-12-31' OR medidas.date_definitva BETWEEN '2021-01-01' AND '2021-12-31')";
  $rtotalhombre = $mysqli->query($totalhombre);
  $ftotalhombre = $rtotalhombre->fetch_assoc();
//////////////////////////////////////////////////FIN DE SUJETOS EN CENTROS DE RESGUARDO DEL AÑO 2021
/////////////////////////////////SUJETOS EN CENTROS DE RESGUARDO DEL AÑO 2022
  // TOTAL DE PERSONAS MENORES DE EDAD EN CENTROS DE RESGUARDO
  $menoredad2022 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.grupoedad = 'MENOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31')";
  $rmenoredad2022 = $mysqli->query($menoredad2022);
  $fmenoredad2022 = $rmenoredad2022->fetch_assoc();
  // TOTAL DE MUJERES MENORES DE EDAD EN CENTROS DE RESGUARDO
  $menoredadmujer2022 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.sexopersona = 'MUJER' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31')";
  $rmenoredadmujer2022 = $mysqli->query($menoredadmujer2022);
  $fmenoredadmujer2022 = $rmenoredadmujer2022->fetch_assoc();
  // TOTAL DE HOMBRES MENORES DE EDAD EN CENTROS DE RESGUARDO
  $menoredadhombre2022 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.sexopersona = 'HOMBRE' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31')";
  $rmenoredadhombre2022 = $mysqli->query($menoredadhombre2022);
  $fmenoredadhombre2022 = $rmenoredadhombre2022->fetch_assoc();
  // TOTAL DE PERSONAS MAYORES DE EDAD EN CENTROS DE RESGUARDO
  $mayoredad2022 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.grupoedad = 'MAYOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31')";
  $rmayoredad2022 = $mysqli->query($mayoredad2022);
  $fmayoredad2022 = $rmayoredad2022->fetch_assoc();
  // TOTAL DE MUJERES MAYORES DE EDAD EN CENTROS DE RESGUARDO
  $mayoredadmujer2022 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.sexopersona = 'MUJER' AND datospersonales.grupoedad = 'MAYOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31')";
  $rmayoredadmujer2022 = $mysqli->query($mayoredadmujer2022);
  $fmayoredadmujer2022 = $rmayoredadmujer2022->fetch_assoc();
  // TOTAL DE HOMBRES MAYORES DE EDAD EN CENTROS DE RESGUARDO
  $mayoredadhombre2022 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.sexopersona = 'HOMBRE' AND datospersonales.grupoedad = 'MAYOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31')";
  $rmayoredadhombre2022 = $mysqli->query($mayoredadhombre2022);
  $fmayoredadhombre2022 = $rmayoredadhombre2022->fetch_assoc();
  // TOTAL DE MUJERES EN CENTROS DE RESGUARDO
  $totalmujer2022 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.sexopersona = 'MUJER' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31')";
  $rtotalmujer2022 = $mysqli->query($totalmujer2022);
  $ftotalmujer2022 = $rtotalmujer2022->fetch_assoc();
  // TOTAL DE HOMBRES EN CENTROS DE RESGUARDO
  $totalhombre2022 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales ON datospersonales.id = medidas.id_persona
  WHERE datospersonales.sexopersona = 'HOMBRE' AND medidas.estatus != 'CANCELADA' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2022-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31')";
  $rtotalhombre2022 = $mysqli->query($totalhombre2022);
  $ftotalhombre2022 = $rtotalhombre2022->fetch_assoc();

//////////////////////////////////////////////////FIN DE SUJETOS EN CENTROS DE RESGUARDO DEL AÑO 2022

/////////////////////////////////SUJETOS EN CENTROS DE RESGUARDO DEL AÑO 2023
  // TOTAL DE PERSONAS MENORES DE EDAD EN CENTROS DE RESGUARDO
  $menoredad2023 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
  WHERE datospersonales.grupoedad = 'MENOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2023-12-31');";
  $rmenoredad2023 = $mysqli->query($menoredad2023);
  $fmenoredad2023 = $rmenoredad2023->fetch_assoc();
  // TOTAL DE MUJERES MENORES DE EDAD EN CENTROS DE RESGUARDO
  $menoredadmujer2023 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
  WHERE datospersonales.sexopersona = 'MUJER' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2023-12-31');";
  $rmenoredadmujer2023 = $mysqli->query($menoredadmujer2023);
  $fmenoredadmujer2023 = $rmenoredadmujer2023->fetch_assoc();
  // TOTAL DE HOMBRES MENORES DE EDAD EN CENTROS DE RESGUARDO
  $menoredadhombre2023 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
  WHERE datospersonales.sexopersona = 'HOMBRE' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2023-12-31');";
  $rmenoredadhombre2023 = $mysqli->query($menoredadhombre2023);
  $fmenoredadhombre2023 = $rmenoredadhombre2023->fetch_assoc();
  // TOTAL DE PERSONAS MAYORES DE EDAD EN CENTROS DE RESGUARDO
  $mayoredad2023 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
  WHERE datospersonales.grupoedad = 'MAYOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2023-12-31');";
  $rmayoredad2023 = $mysqli->query($mayoredad2023);
  $fmayoredad2023 = $rmayoredad2023->fetch_assoc();
  // TOTAL DE MUJERES MAYORES DE EDAD EN CENTROS DE RESGUARDO
  $mayoredadmujer2023 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
  WHERE datospersonales.sexopersona = 'MUJER' AND datospersonales.grupoedad = 'MAYOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2023-12-31');";
  $rmayoredadmujer2023 = $mysqli->query($mayoredadmujer2023);
  $fmayoredadmujer2023 = $rmayoredadmujer2023->fetch_assoc();
  // TOTAL DE HOMBRES MAYORES DE EDAD EN CENTROS DE RESGUARDO
  $mayoredadhombre2023 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
  WHERE datospersonales.sexopersona = 'HOMBRE' AND datospersonales.grupoedad = 'MAYOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2023-12-31');";
  $rmayoredadhombre2023 = $mysqli->query($mayoredadhombre2023);
  $fmayoredadhombre2023 = $rmayoredadhombre2023->fetch_assoc();
  // TOTAL DE MUJERES EN CENTROS DE RESGUARDO
  $totalmujer2023 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
  WHERE datospersonales.sexopersona = 'MUJER' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2023-12-31');";
  $rtotalmujer2023 = $mysqli->query($totalmujer2023);
  $ftotalmujer2023 = $rtotalmujer2023->fetch_assoc();
  // TOTAL DE HOMBRES EN CENTROS DE RESGUARDO
  $totalhombre2023 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
  WHERE datospersonales.sexopersona = 'HOMBRE' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
  AND (medidas.date_provisional BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_definitva BETWEEN '2022-01-01' AND '2023-12-31' OR medidas.date_ejecucion BETWEEN '2022-01-01' AND '2023-12-31');";
  $rtotalhombre2023 = $mysqli->query($totalhombre2023);
  $ftotalhombre2023 = $rtotalhombre2023->fetch_assoc();

  /////////////////////////////////SUJETOS EN CENTROS DE RESGUARDO DEL AÑO 2023
    // TOTAL DE PERSONAS MENORES DE EDAD EN CENTROS DE RESGUARDO
    $menoredad2024 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
    INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
    WHERE datospersonales.grupoedad = 'MENOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
    AND (medidas.date_provisional BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_definitva BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_ejecucion BETWEEN '2023-01-01' AND '2024-12-31');";
    $rmenoredad2024 = $mysqli->query($menoredad2024);
    $fmenoredad2024 = $rmenoredad2024->fetch_assoc();
    // TOTAL DE MUJERES MENORES DE EDAD EN CENTROS DE RESGUARDO
    $menoredadmujer2024 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
    INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
    WHERE datospersonales.sexopersona = 'MUJER' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
    AND (medidas.date_provisional BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_definitva BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_ejecucion BETWEEN '2023-01-01' AND '2024-12-31');";
    $rmenoredadmujer2024 = $mysqli->query($menoredadmujer2024);
    $fmenoredadmujer2024 = $rmenoredadmujer2024->fetch_assoc();
    // TOTAL DE HOMBRES MENORES DE EDAD EN CENTROS DE RESGUARDO
    $menoredadhombre2024 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
    INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
    WHERE datospersonales.sexopersona = 'HOMBRE' AND datospersonales.grupoedad = 'MENOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
    AND (medidas.date_provisional BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_definitva BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_ejecucion BETWEEN '2023-01-01' AND '2024-12-31');";
    $rmenoredadhombre2024 = $mysqli->query($menoredadhombre2024);
    $fmenoredadhombre2024 = $rmenoredadhombre2024->fetch_assoc();
    // TOTAL DE PERSONAS MAYORES DE EDAD EN CENTROS DE RESGUARDO
    $mayoredad2024 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
    INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
    WHERE datospersonales.grupoedad = 'MAYOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
    AND (medidas.date_provisional BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_definitva BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_ejecucion BETWEEN '2023-01-01' AND '2024-12-31');";
    $rmayoredad2024 = $mysqli->query($mayoredad2024);
    $fmayoredad2024 = $rmayoredad2024->fetch_assoc();
    // TOTAL DE MUJERES MAYORES DE EDAD EN CENTROS DE RESGUARDO
    $mayoredadmujer2024 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
    INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
    WHERE datospersonales.sexopersona = 'MUJER' AND datospersonales.grupoedad = 'MAYOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
    AND (medidas.date_provisional BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_definitva BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_ejecucion BETWEEN '2023-01-01' AND '2024-12-31');";
    $rmayoredadmujer2024 = $mysqli->query($mayoredadmujer2024);
    $fmayoredadmujer2024 = $rmayoredadmujer2024->fetch_assoc();
    // TOTAL DE HOMBRES MAYORES DE EDAD EN CENTROS DE RESGUARDO
    $mayoredadhombre2024 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
    INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
    WHERE datospersonales.sexopersona = 'HOMBRE' AND datospersonales.grupoedad = 'MAYOR DE EDAD' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
    AND (medidas.date_provisional BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_definitva BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_ejecucion BETWEEN '2023-01-01' AND '2024-12-31');";
    $rmayoredadhombre2024 = $mysqli->query($mayoredadhombre2024);
    $fmayoredadhombre2024 = $rmayoredadhombre2024->fetch_assoc();
    // TOTAL DE MUJERES EN CENTROS DE RESGUARDO
    $totalmujer2024 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
    INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
    WHERE datospersonales.sexopersona = 'MUJER' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
    AND (medidas.date_provisional BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_definitva BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_ejecucion BETWEEN '2023-01-01' AND '2024-12-31');";
    $rtotalmujer2024 = $mysqli->query($totalmujer2024);
    $ftotalmujer2024 = $rtotalmujer2024->fetch_assoc();
    // TOTAL DE HOMBRES EN CENTROS DE RESGUARDO
    $totalhombre2024 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
    INNER JOIN datospersonales On datospersonales.id = medidas.id_persona
    WHERE datospersonales.sexopersona = 'HOMBRE' AND medidas.estatus != 'CANCELADA' AND medidas.estatus = 'EN EJECUCION' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL'
    AND (medidas.date_provisional BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_definitva BETWEEN '2023-01-01' AND '2024-12-31' OR medidas.date_ejecucion BETWEEN '2023-01-01' AND '2024-12-31');";
    $rtotalhombre2024 = $mysqli->query($totalhombre2024);
    $ftotalhombre2024 = $rtotalhombre2024->fetch_assoc();

//////////////////////////////////////////////////FIN DE SUJETOS EN CENTROS DE RESGUARDO DEL AÑO 2023
  //TOTAL DE SUJETOS POR AÑO
  $suj2021 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  WHERE estatus != 'CANCELADA' AND medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (date_provisional BETWEEN '2021-06-01' AND '2021-12-31' OR date_definitva BETWEEN '2021-01-01' AND '2021-12-31')";
  $rsuj2021 = $mysqli->query($suj2021);
  $fsuj2021 = $rsuj2021->fetch_assoc();

  $suj2022 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  WHERE estatus != 'CANCELADA' AND medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (date_provisional BETWEEN '2022-01-01' AND '2022-12-31' OR date_definitva BETWEEN '2022-01-01' AND '2022-12-31' OR date_ejecucion BETWEEN '2022-01-01' AND '2022-12-31')";
  $rsuj2022 = $mysqli->query($suj2022);
  $fsuj2022 = $rsuj2022->fetch_assoc();

  $suj2023 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  WHERE estatus != 'CANCELADA' AND estatus = 'EN EJECUCION' AND medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (date_provisional BETWEEN '2022-01-01' AND '2023-12-31' OR date_definitva BETWEEN '2022-01-01' AND '2023-12-31' OR date_ejecucion BETWEEN '2022-01-01' AND '2023-12-31');";
  $rsuj2023 = $mysqli->query($suj2023);
  $fsuj2023 = $rsuj2023->fetch_assoc();

  $suj2024 = "SELECT COUNT(DISTINCT id_persona) as t FROM `medidas`
  WHERE estatus != 'CANCELADA' AND estatus = 'EN EJECUCION' AND medida = 'VIII. ALOJAMIENTO TEMPORAL' AND (date_provisional BETWEEN '2023-01-01' AND '2024-12-31' OR date_definitva BETWEEN '2023-01-01' AND '2024-12-31' OR date_ejecucion BETWEEN '2022-01-01' AND '2023-12-31');";
  $rsuj2024 = $mysqli->query($suj2024);
  $fsuj2024 = $rsuj2024->fetch_assoc();

      echo "<tr bgcolor = 'Pink'>";
        echo "<td style='text-align:center'>"; echo "MUJER"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredadmujer['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredadmujer2022['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredadmujer2023['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredadmujer2024['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = 'Aqua'>";
        echo "<td style='text-align:center'>"; echo "HOMBRE"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredadhombre['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredadhombre2022['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredadhombre2023['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredadhombre2024['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = 'yellow'>";
        echo "<td style='text-align:right'>"; echo "TOTAL DE MENORES DE EDAD"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredad['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredad2022['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredad2023['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmenoredad2024['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = 'Pink'>";
        echo "<td style='text-align:center'>"; echo "MUJER"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredadmujer['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredadmujer2022['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredadmujer2023['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredadmujer2024['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = 'Aqua'>";
        echo "<td style='text-align:center'>"; echo "HOMBRE"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredadhombre['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredadhombre2022['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredadhombre2023['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredadhombre2024['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = 'yellow'>";
        echo "<td style='text-align:right'>"; echo "TOTAL DE MAYORES DE EDAD"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredad['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredad2022['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredad2023['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fmayoredad2024['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = 'Lime'>";
        echo "<td style='text-align:center'>"; echo "TOTAL MUJERES"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalmujer['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalmujer2022['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalmujer2023['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalmujer2024['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = 'Lime'>";
        echo "<td style='text-align:center'>"; echo "TOTAL HOMBRES"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalhombre['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalhombre2022['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalhombre2023['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $ftotalhombre2024['t']; echo "</td>";
      echo "</tr>";

      echo "<tr bgcolor = 'yellow'>";
        echo "<td style='text-align:right'>"; echo "TOTAL DE SUJETOS"; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fsuj2021['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fsuj2022['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fsuj2023['t']; echo "</td>";
        echo "<td style='text-align:center'>"; echo $fsuj2024['t']; echo "</td>";
      echo "</tr>";

?>
