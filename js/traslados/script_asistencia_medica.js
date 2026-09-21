/**
 * Lógica independiente encargada exclusivamente de controlar el comportamiento
 * asíncrono y condicional de la sección de Asistencia Médica.
 */
window.activarManejoCheckboxesMultiples = function() {
    var checkboxes = document.querySelectorAll('.chk-asistencia');
    var chkUnicoMarcado = document.querySelector('.chk-asistencia-unico');

    // Función interna para evaluar la cita y forzar la aparición inmediata de los PDI
    function evaluarPdisAsistenciaMedica() {
        var checkboxesMedicos = document.querySelectorAll('.chk-asistencia, .chk-asistencia-unico');
        var algunaCitaMarcada = Array.from(checkboxesMedicos).some(function(c) { return c.checked; });

        // Determinar si hay alguna casilla de la derecha prendida
        var chkAdminMarcados = document.querySelectorAll('.chk-tipo-admin:checked');
        var bloqueDerechoActivo = chkAdminMarcados.length > 0;

        // Mandar orden al cargador de PDI respetando si hay un caso clínico unificado
        if (typeof evaluarYMostrarModuloPDI === 'function') {
            evaluarYMostrarModuloPDI(algunaCitaMarcada, algunaCitaMarcada && !bloqueDerechoActivo);
        }

        // Propagar el evento hacia el validador final para actualizar contadores a 4 y activar botón
        window.dispatchEvent(new Event('formularioCambio'));
    }

    if (checkboxes.length > 0 && !chkUnicoMarcado) {
        checkboxes.forEach(function(chk) {
            chk.addEventListener('change', function() {
                // Al interactuar con los checks clínicos, el limitador de 4 se recalcula de inmediato
                evaluarPdisAsistenciaMedica();
            });
        });
    }

    // Si hay una única cita médica pre-marcada nacida por defecto, gatillar el evento de forma segura
    if (chkUnicoMarcado) {
        window.dispatchEvent(new Event('formularioCambio'));
    }
};
