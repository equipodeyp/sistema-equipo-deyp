<?php
require_once '../conexion.php'; 
$answermun = $mysqli->query("SELECT * FROM municipios");
?>
<div class="fila-destino-otro seccion-entrada-suave" style="width: 100%; margin-top: 12px;">
    <div class="form-row">
        <div class="form-group" style="flex: 1;"><label>Lugar</label><input type="text" id="lugar_destino" name="lugar_destino" class="form-control" placeholder="LUGAR" required></div>
        <div class="form-group" style="flex: 1.2;"><label>Domicilio</label><input type="text" id="domicilio_destino" name="domicilio_destino" class="form-control" placeholder="DOMICILIO" required></div>
        <div class="form-group" style="flex: 1;"><label>Municipio</label>
            <select id="municipio_destino" name="municipio_destino" class="form-control" required>
                <option value="">SELECCIONE</option>
                <?php while($m = $answermun->fetch_assoc()) { echo "<option value='".htmlspecialchars($m['nombre'])."'>".htmlspecialchars($m['nombre'])."</option>"; } ?>
            </select>
        </div>
    </div>
</div>
