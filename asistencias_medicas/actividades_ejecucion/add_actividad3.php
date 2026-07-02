<?php
$consecutivosub = $n_con;
$idactividad ='SUBEM-03';
$id_subdireccion = '4';
$funcion = $_POST['funcion'];
$actividad = $_POST['actividad'];
$unidadmedida = $_POST['unidadmedida'] ;
$reportemetas = 'NO';
$clasificacion = 'CONTACTO-'.$_POST['clasificacioncontacto'];
$fechaactividad = $_POST['fechaactividad'];
$cantidad = $_POST['cantidad'];
$entidadmunicipio = 'NA';
$folioexpediente = $_POST['folioexpediente'];
$id_sujeto = $_POST['id_sujeto'];
$evidencia = $_POST['evidencia'];
$id_evidencia = 'NA';
$kilometros = 'NA';
$observaciones = strtoupper($_POST['observaciones']);
$informe_anual = 'REPORTADO';
$fecha_alta = date('Y-m-d H:i:s');
$name = $_SESSION['usuario'];
$year_alta = date('Y');

$addactividad = "INSERT INTO react_actividad(consecutivosub, idactividad, id_subdireccion, funcion, id_actividad, unidad_medida, reporte_metas, clasificacion, fecha, cantidad, entidad_municipio,
                                            folio_expediente, id_sujeto, evidencia_interna, id_evidencia, kilometraje, observaciones, informe_anual, fecha_alta, usuario, year)
        VALUES ('$consecutivosub', '$idactividad', '$id_subdireccion', '$funcion', '$actividad', '$unidadmedida', '$reportemetas', '$clasificacion', '$fechaactividad', '$cantidad', '$entidadmunicipio',
                '$folioexpediente', '$id_sujeto', '$evidencia', '$id_evidencia', '$kilometros', '$observaciones', '$informe_anual', '$fecha_alta', '$name', '$year_alta')";
$raddactividad = $mysqli->query($addactividad);
?>
