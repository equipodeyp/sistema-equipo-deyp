document.addEventListener('DOMContentLoaded', function() {
    const btnPreFinalizar = document.getElementById('btn-pre-finalizar');
    const modalConfirmacion = document.getElementById('modal-confirmacion-traslado');
    const btnModalCancelar = document.getElementById('btn-modal-cancelar');
    const btnModalCloseX = document.getElementById('btn-modal-close-x');
    const modalResumenDatos = document.getElementById('modal-resumen-datos');

    if (btnPreFinalizar) {
        btnPreFinalizar.addEventListener('click', function() {
            if (!modalConfirmacion || !modalResumenDatos) return;

            let htmlResumen = '';

            // ==========================================
            // SECCIÓN 1: DATOS GENERALES DEL TRASLADO
            // ==========================================
            htmlResumen += '<div class="modal-table-section-title">Datos Iniciales del Traslado</div>';
            htmlResumen += '<div class="modal-table-container">';

            // --- CONVERSIÓN DE FORMATO DE FECHA (YYYY-mm-dd a dd-mm-YYYY) ---
            const inputFecha = document.getElementById('fecha_traslado').value;
            let fechaFormateada = inputFecha;

            if (inputFecha && inputFecha.includes('-')) {
                const partes = inputFecha.split('-');
                if (partes.length === 3) {
                    // Reordenar las partes: partes[2] = día, partes[1] = mes, partes[0] = año
                    fechaFormateada = partes[2] + '-' + partes[1] + '-' + partes[0];
                }
            }

            htmlResumen += crearFilaTabla("Fecha Traslado", fechaFormateada);
            htmlResumen += crearFilaTabla("Lugar de Salida", document.getElementById('lugar_salida').value);
            htmlResumen += crearFilaTabla("Horario Registro", document.getElementById('ini_hh').value + ":" + document.getElementById('ini_mm').value + " hrs a " + document.getElementById('fin_hh').value + ":" + document.getElementById('fin_mm').value + " hrs");
            htmlResumen += crearFilaTabla("Kilómetros", document.getElementById('kilometros').value + " km");

            if (document.getElementById('lugar_salida').value === 'OTRO') {
                const extras = document.getElementById('dato_extra_1').value + " ( " + document.getElementById('dato_extra_2').value + " , " + document.getElementById('dato_extra_3').value + " ) ";
                htmlResumen += crearFilaTabla("Detalles lugar de salida", extras);
            }
            htmlResumen += '</div>';

            // SECCIÓN 2 Y 3: LÓGICA DE SUJETOS (Procesada por el script secundario)
            if (typeof window.procesarSujetosYMotivosModal === 'function') {
                htmlResumen += window.procesarSujetosYMotivosModal();
            }

            // SECCIÓN 4: ASIGNACIÓN DE DPIS (PERSONAL)
            const checkboxesPDI = document.querySelectorAll('.chk-pdi-elemento:checked');
            if (checkboxesPDI.length > 0) {
                htmlResumen += '<div class="modal-table-section-title">Asignación de Personal (PDIS)</div>';
                htmlResumen += '<div class="modal-table-container">';
                let contadorPdi = 1;
                checkboxesPDI.forEach(function(cb) {
                    htmlResumen += crearFilaTabla("PDI #" + contadorPdi, cb.parentElement.querySelector('span').textContent);
                    contadorPdi++;
                });
                htmlResumen += '</div>';
            }

            // SECCIÓN 5: OBSERVACIONES ADICIONALES
            const inputObservaciones = document.getElementById('observaciones_traslado');
            if (inputObservaciones && inputObservaciones.value.trim() !== "") {
                htmlResumen += '<div class="modal-table-section-title">Observaciones Registradas</div>';
                htmlResumen += '<div class="modal-table-container">';
                htmlResumen += crearFilaTabla("Notas de Bitácora", inputObservaciones.value);
                htmlResumen += '</div>';
            }

            modalResumenDatos.innerHTML = htmlResumen;
            modalConfirmacion.classList.add('modal-visible');
        });
    }

    window.crearFilaTabla = function(label, valor) {
        const valLimpio = valor ? String(valor).trim() : "";
        return '<div class="modal-table-row">' +
                    '<div class="modal-table-label">' + label + '</div>' +
                    '<div class="modal-table-val">' + (valLimpio !== "" ? valLimpio : '<span style="color:#aaa; font-style:italic;">No especificado</span>') + '</div>' +
                '</div>';
    }

    function cerrarModal() { if (modalConfirmacion) modalConfirmacion.classList.remove('modal-visible'); }
    if (btnModalCancelar) btnModalCancelar.addEventListener('click', cerrarModal);
    if (btnModalCloseX) btnModalCloseX.addEventListener('click', cerrarModal);
});
