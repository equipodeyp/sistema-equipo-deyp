<?php
if (!isset($imagenes)) {
    return;
}
?>

<div class="container text-center">
  <?php if (!empty($imagenes)): ?>
    <a href="descargar.php?fecha_inicio=<?php echo urlencode($fecha_inicio ?? ''); ?>&fecha_fin=<?php echo urlencode($fecha_fin ?? ''); ?>&accion=descargar_zip" class="btn-zip-all">
      <i class="fa fa-file-archive" aria-hidden="true"></i> Descargar Todo en ZIP (<?php echo count($imagenes); ?> archivos)
    </a>

    <div class="galeria">
      <?php foreach ($imagenes as $img): ?>
        <div class="tarjeta-imagen">
          <?php
            $subRutaLimpia = str_replace(['../../', './'], '', $img['ruta']);
            $urlImagenCompleta = ($url_base_web ?? 'http://localhost/pruebas/sistema-equipo-deypv1.2/') . $subRutaLimpia;
          ?>
          <img src="<?php echo htmlspecialchars($urlImagenCompleta); ?>" alt="<?php echo htmlspecialchars($img['image']); ?>">
          <p><b><?php echo htmlspecialchars($img['image']); ?></b><br>Fecha: <?php echo date('d-m-Y', strtotime($img['fecha'])); ?></p>
          <!-- <a href="descargar.php?descargar=<?php echo urlencode($img['ruta']); ?>" class="btn-descargar"><i class="fa fa-download"></i> Descargar</a> -->
        </div>
      <?php endforeach; ?>
    </div>
  <?php elseif (!empty($fecha_inicio)): ?>
    <p class="text-muted">No se encontraron imágenes para el rango de fechas seleccionado con los filtros asignados.</p>
  <?php endif; ?>
</div>
