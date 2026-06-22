<!-- Tabla 1 -->
<h3 style="text-align:center"><b>ASISTENCIAS MEDICAS</b></h3>
<table class="tabla-ajustada" id="tabla1">
  <thead>
    <tr>
      <!-- Redistribución de porcentajes óptimos para pantallas anchas -->
      <th style="width: 2.5%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">NO</th>
      <th style="width: 6%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">EXPEDIENTE</th>
      <th style="width: 4%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">ID SUJETO</th>
      <th style="width: 5%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">ID ASISTENCIA MÉDICA</th>
      <th style="width: 5%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">FECHA SOLICITUD</th>
      <th style="width: 6%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">SERVICIO MÉDICO</th>
      <th style="width: 4%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">ETAPA</th>
      <th style="width: 4%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">ID SERVIDOR</th>
      <th style="width: 7%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">NOMBRE INSTITUCIÓN</th>
      <th style="width: 5%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">MUNICIPIO</th>
      <th style="width: 5%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">FECHA ASISTENCIA</th>
      <th style="width: 4%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">HORA ASISTENCIA</th>
      <th style="width: 5%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">TRASLADO REALIZADO</th>
      <th style="width: 4%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">SE OTORGO</th>
      <th style="width: 5%; text-align:center; color: white; border: 1px solid black; background-color: #333; vertical-align: middle;">HOSPITALIZACIÓN</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include('../planeacion/asistencias_medicas.php');
    ?>
  </tbody>
</table>
<!-- Barra de paginación completa -->
<div class="barra-paginacion">
<!-- Texto informativo (Izquierda) -->
<div id="paginacion-info" class="info-texto">Mostrando 0 a 0 de 0 registros</div>
<!-- Botones de navegación (Derecha) -->
<div id="paginacion-botones" class="botones-contenedor"></div>
</div>
