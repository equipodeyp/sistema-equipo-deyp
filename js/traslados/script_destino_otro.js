/**
 * Lógica independiente encargada de controlar el despliegue de los
 * 3 inputs de destino (Lugar, Domicilio, Municipio) cuando se selecciona "OTRO".
 */
function activarManejoDestinoOtro() {
    const selectDependiente = document.getElementById('select_dependiente_detalle');
    const contenedorDestinoOtro = document.getElementById('contenedor-destino-otro-ajax');

    if (!selectDependiente || !contenedorDestinoOtro) return;

    selectDependiente.addEventListener('change', function() {
        if (this.value === 'OTRO') {
            fetch('detalles_destino_otro.php')
            .then(function(response) {
                return response.text();
            })
            .then(function(htmlCamposOtro) {
                contenedorDestinoOtro.innerHTML = htmlCamposOtro;

                // Enlazar los inputs dinámicos recién creados con el motor de validación central
                contenedorDestinoOtro.querySelectorAll('input, select').forEach(function(input) {
                    // Escuchar la escritura manual y el cambio de opción
                    input.addEventListener('input', function() {
                        // 1. Notificar al validador maestro de botones
                        window.dispatchEvent(new Event('formularioCambio'));
                        // 2. 🚀 ORDEN CRUCIAL: Forzar de forma directa la aparición de la lista de sujetos
                        if (typeof window.cargarSelectTecnologias === 'function') {
                            window.cargarSelectTecnologias();
                        }
                    });

                    input.addEventListener('change', function() {
                        window.dispatchEvent(new Event('formularioCambio'));
                        if (typeof window.cargarSelectTecnologias === 'function') {
                            window.cargarSelectTecnologias();
                        }
                    });
                });

                window.dispatchEvent(new Event('formularioCambio'));
            })
            .catch(function(error) {
                console.error('Error al cargar destino alterno:', error);
            });
        } else {
            contenedorDestinoOtro.innerHTML = '';
            window.dispatchEvent(new Event('formularioCambio'));
            // Si cambian a otra opción diferente de OTRO, re-evaluar folios directamente
            if (typeof window.cargarSelectTecnologias === 'function') {
                window.cargarSelectTecnologias();
            }
        }
    });
}
