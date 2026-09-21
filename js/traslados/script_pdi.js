/**
 * Lógica independiente encargada de controlar la carga dinámica
 * del catálogo de DPIS en el paso final del formulario.
 */
window.pdiCargadoCorrectamente = false;

function evaluarYMostrarModuloPDI(formularioListoPasoDos, esAsistenciaMedica) {
    const contenedorPdiFinal = document.getElementById('contenedor-pdi-final');
    const contenedorObsFinal = document.getElementById('contenedor-observaciones-final');

    if (!contenedorPdiFinal) return;

    let otorgarPermisoCarga = formularioListoPasoDos || esAsistenciaMedica;

    if (otorgarPermisoCarga) {
        if (window.pdiCargadoCorrectamente) return;

        window.pdiCargadoCorrectamente = true;
        contenedorPdiFinal.innerHTML = "";

        fetch('pdi.php')
        .then(function(response) {
            return response.text();
        })
        .then(function(htmlPdi) {
            contenedorPdiFinal.innerHTML = htmlPdi;

            // Función interna encargada de vigilar la revelación del campo de texto de observaciones
            function evaluarAparicionObservaciones() {
                if (!contenedorObsFinal) return;
                const pdisMarcados = document.querySelectorAll('.chk-pdi-elemento:checked').length;

                if (pdisMarcados >= 1) {
                    // Si ya hay al menos un PDI seleccionado, inyectar el bloque de observaciones (100% width)
                    if (contenedorObsFinal.innerHTML === "") {
                        contenedorObsFinal.innerHTML = `
                            <div class="seccion-entrada-suave" style="width: 100%; margin-top: 25px; margin-bottom: 20px; box-sizing: border-box;">
                                <div style="width: 100%; max-width: 1120px; margin: 0 auto; text-align: left;">
                                    <label for="observaciones_traslado" style="font-size: 12px; font-weight: bold; color: #111; margin-bottom: 8px; display: block; text-transform: uppercase; letter-spacing: 0.3px;">Observaciones (Opcional)</label>
                                    <textarea id="observaciones_traslado" name="observaciones_traslado" class="form-control" rows="5" cols="500" style="width: 100%; height: auto; min-height: 80px; resize: none; padding: 10px; font-size: 13px; border: 10px solid #cccccc; border-radius: 6px; box-sizing: border-box;" placeholder="Escriba aquí alguna anotación o detalle relevante del traslado..."></textarea>
                                </div>
                            </div>
                        `;
                    }
                } else {
                    // Si remueven las marcas, limpiar el contenedor de inmediato
                    contenedorObsFinal.innerHTML = "";
                }
            }

            // Adjuntar oyentes analíticos sobre los checkboxes de PDI
            contenedorPdiFinal.querySelectorAll('.chk-pdi-elemento').forEach(function(chk) {
                chk.addEventListener('change', function() {
                    evaluarAparicionObservaciones();
                    window.dispatchEvent(new Event('formularioCambio'));
                });
            });

            // Ejecutar una evaluación por defecto
            evaluarAparicionObservaciones();
            window.dispatchEvent(new Event('formularioCambio'));
        })
        .catch(function(error) {
            console.error('Error al cargar catálogo de DPIS:', error);
            window.pdiCargadoCorrectamente = false;
        });
    } else {
        contenedorPdiFinal.innerHTML = '';
        if (contenedorObsFinal) contenedorObsFinal.innerHTML = '';
        window.pdiCargadoCorrectamente = false;
    }
}
