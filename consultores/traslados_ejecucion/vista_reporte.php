<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Exitoso</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f6f9; padding: 30px; margin: 0; }
        .success-card { background: #fff; border: 1px solid #ccc; border-radius: 8px; max-width: 740px; margin: 0 auto; padding: 25px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .success-title { text-align: center; color: #28a745; font-size: 20px; font-weight: bold; margin-bottom: 20px; text-transform: uppercase; }
        .section-title { font-size: 11px; font-weight: bold; color: #007bff; text-transform: uppercase; margin: 20px 0 8px 0; letter-spacing: 0.5px; }
        .report-table { width: 100%; border-collapse: collapse; border: 1px solid #dddddd; border-radius: 4px; overflow: hidden; margin-bottom: 20px; }
        .report-row { border-bottom: 1px solid #eeeeee; }
        .report-row:last-child { border-bottom: none; }
        .report-row:nth-child(even) { background-color: #fafafa; }
        .report-label { width: 240px; background-color: #f5f5f5; color: #333333; font-weight: bold; font-size: 11px; text-transform: uppercase; padding: 10px 14px; border-right: 1px solid #dddddd; }
        .report-val { color: #444444; font-size: 13px; padding: 10px 14px; text-align: left; }
        .btn-regresar { display: block; width: fit-content; margin: 25px auto 0 auto; padding: 10px 30px; background-color: #007bff; color: #fff; text-decoration: none; font-weight: bold; font-size: 13px; border-radius: 4px; transition: background 0.2s; }
        .btn-regresar:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<div class="success-card">
    <div class="success-title">✓ Registro Almacenado Correctamente</div>

    <!-- TABLA 1: DATOS INICIALES BASE -->
    <div class="section-title">Datos Iniciales del Traslado</div>
    <table class="report-table">
        <tr class="report-row"><td class="report-label">Fecha Traslado</td><td class="report-val"><?php echo $fecha_traslado; ?></td></tr>
        <tr class="report-row"><td class="report-label">Lugar de Salida</td><td class="report-val"><?php echo $lugar_salida; ?></td></tr>
        <tr class="report-row"><td class="report-label">Horario Registro</td><td class="report-val"><?php echo $hora_inicio . ' hrs a ' . $hora_fin . ' hrs'; ?></td></tr>
        <tr class="report-row"><td class="report-label">Kilómetros</td><td class="report-val"><?php echo $kilometros; ?> km</td></tr>

        <?php if ($lugar_salida === 'OTRO'): ?>
            <tr class="report-row"><td class="report-label">Datos Origen Extra</td><td class="report-val"><?php echo $dato_extra_1 . ' / ' . $dato_extra_2 . ' / ' . $dato_extra_3; ?></td></tr>
        <?php endif; ?>
    </table>

    <!-- TABLA 2: MOTIVOS / SELECT IZQUIERDO -->
    <?php if (!empty($instancia_traslado) || !empty($tipo_admin_texto)): ?>
        <div class="section-title">Instancia y Motivos Asociados</div>
        <table class="report-table">
            <?php if (!empty($instancia_traslado)): ?>
                <tr class="report-row"><td class="report-label">Instancia Elegida</td><td class="report-val"><?php echo $instancia_traslado; ?></td></tr>
                <?php if (!empty($detalle_instancia)): ?>
                    <tr class="report-row"><td class="report-label">Detalle Motivo</td><td class="report-val"><?php echo $detalle_instancia; ?></td></tr>
                <?php endif; ?>
                <?php if (!empty($lugar_destino)): ?>
                    <tr class="report-row"><td class="report-label">Destino Específico</td><td class="report-val"><?php echo $lugar_destino . ' (' . $domicilio_destino . ', ' . $municipio_destino . ')'; ?></td></tr>
                <?php endif; ?>
            <?php endif; ?>

            <!-- RENDERIZADO DINÁMICO DE FILAS INDEPENDIENTES PARA VARIABLES COMPARTIDAS -->
            <?php if (!empty($asistencias_vinc)): ?>
                <tr class="report-row">
                    <td class="report-label">Tipo de Traslado</td>
                    <td class="report-val" style="font-weight: bold; color: <?php echo ($es_compartido === 'COMPARTIDO') ? '#28a745' : '#444'; ?>;">
                        <?php echo $es_compartido; ?>
                    </td>
                </tr>

                <?php
                for ($i = 0; $i < count($asistencias_vinc); $i++) {
                    $numero = $i + 1;
                    $nombre_variable = "compartido" . $numero;

                    if (isset(${$nombre_variable})) {
                        $datos_cita = ${$nombre_variable};
                        $es_medico = ($instancia_traslado === 'ASISTENCIA MEDICA');

                        echo '<tr class="report-row"><td class="report-label" style="color: #666; font-style: italic;">Variable Dinámica #' . $numero . '</td><td class="report-val" style="font-weight: bold; font-family: monospace;">$' . $nombre_variable . '</td></tr>';

                        if ($es_medico) {
                            echo '<tr class="report-row"><td class="report-label">ID Asistencia #' . $numero . '</td><td class="report-val">' . $datos_cita['id_asistencia'] . '</td></tr>';
                            echo '<tr class="report-row"><td class="report-label">Folio Expediente #' . $numero . '</td><td class="report-val">' . $datos_cita['folio_expediente'] . '</td></tr>';
                            echo '<tr class="report-row"><td class="report-label">ID Sujeto #' . $numero . '</td><td class="report-val">' . $datos_cita['id_sujeto'] . '</td></tr>';
                        } else {
                            echo '<tr class="report-row"><td class="report-label">Procedencia #' . $numero . '</td><td class="report-val">' . $datos_cita['folio_expediente'] . '</td></tr>';
                            echo '<tr class="report-row"><td class="report-label">Sujeto Vinculado #' . $numero . '</td><td class="report-val" style="font-weight:bold;">' . $datos_cita['id_sujeto'] . '</td></tr>';
                        }

                        echo '<tr class="report-row"><td class="report-label">Indicador de Bloque #' . $numero . '</td><td class="report-val" style="color:#007bff; font-weight:bold;">' . $datos_cita['tipo'] . '</td></tr>';
                    }
                }
                ?>
            <?php endif; ?>
        </table>
    <?php endif; ?>

    <!-- TABLA 3: FLUJO DILIGENCIAS ADMINISTRATIVAS -->
    <?php if (!empty($tipo_admin_texto)): ?>
        <div class="section-title">Diligencias Administrativas</div>
        <table class="report-table">
            <tr class="report-row"><td class="report-label">Tipo Diligencia</td><td class="report-val"><?php echo $tipo_admin_texto; ?></td></tr>
            <?php if (!empty($lugar_dest_admin)): ?>
                <tr class="report-row"><td class="report-label">Destino Administrativo</td><td class="report-val"><?php echo $lugar_dest_admin . ' (' . $dom_dest_admin . ', ' . $mun_dest_admin . ')'; ?></td></tr>
            <?php endif; ?>
        </table>
    <?php endif; ?>

    <!-- TABLA 4: PASO FINAL (DPIS ASIGNADOS EN FILAS INDEPENDIENTES) -->
    <?php if (!empty($nombres_pdis)): ?>
        <div class="section-title">Asignación de Personal (DPIS)</div>
        <table class="report-table">
            <?php
            $numPdi = 1;
            foreach ($nombres_pdis as $nombre_agente) {
                echo '<tr class="report-row">';
                echo '  <td class="report-label">Agente PDI #' . $numPdi . '</td>';
                echo '  <td class="report-val">' . htmlspecialchars($nombre_agente) . '</td>';
                echo '</tr>';
                $numPdi++;
            }
            ?>
        </table>
    <?php endif; ?>

    <!-- TABLA 5: OBSERVACIONES ADICIONALES REGISTRADAS -->
    <?php if (!empty($_POST['observaciones_traslado'])): ?>
        <div class="section-title">Observaciones del Traslado</div>
        <table class="report-table">
            <tr class="report-row">
                <td class="report-label">Notas Adicionales</td>
                <td class="report-val"><?php echo nl2br(htmlspecialchars($_POST['observaciones_traslado'])); ?></td>
            </tr>
        </table>
    <?php endif; ?>

    <a href="add_traslado.php" class="btn-regresar">Volver al Formulario</a>
</div>

</body>
</html>
