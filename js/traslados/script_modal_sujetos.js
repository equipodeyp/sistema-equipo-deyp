/**
 * Extensión modular encargada exclusivamente de construir las filas de la tabla
 * para los motivos, citas médicas, sujetos tradicionales y administrativos en la modal.
 */
window.procesarSujetosYMotivosModal = function() {
    let htmlBloque = '';
    const selectInstancia = document.getElementById('select_instancia');

    // MÓDULO IZQUIERDO: INSTANCIAS
    if (selectInstancia && selectInstancia.value !== "") {
        htmlBloque += '<div class="modal-table-section-title">Motivo, Destino y Sujetos Protegidos</div>';
        htmlBloque += '<div class="modal-table-container">';
        htmlBloque += crearFilaTabla("Motivo", selectInstancia.value);

        if (selectInstancia.value === 'ASISTENCIA MEDICA') {
            let contadorFila = 1;
            document.querySelectorAll('.chk-asistencia:checked, .chk-asistencia-unico:checked').forEach(function(cb) {
                const idAsistencia = cb.value;
                const contenedorRegistro = cb.closest('.contenedor-registro-asistencia') || (cb.closest('.form-group') ? cb.closest('.form-group').nextElementSibling : null);
                let folioTexto = 'No disponible', sujetoTexto = 'No disponible';

                if (contenedorRegistro) {
                    const inputFolio = contenedorRegistro.querySelector('input[name="folio_expediente[' + idAsistencia + ']"]');
                    const inputSujeto = contenedorRegistro.querySelector('input[name="id_sujeto[' + idAsistencia + ']"]');
                    if (inputFolio) folioTexto = inputFolio.value;
                    if (inputSujeto) sujetoTexto = inputSujeto.value;
                }

                htmlBloque += crearFilaTabla("ID Asistencia Médica #" + contadorFila, " " + idAsistencia);
                htmlBloque += crearFilaTabla("Expediente #" + contadorFila, folioTexto);
                htmlBloque += crearFilaTabla("ID Sujeto #" + contadorFila, sujetoTexto);
                contadorFila++;
            });
        } else {
            const selectDetalle = document.getElementById('select_dependiente_detalle');
            if (selectDetalle && selectDetalle.value !== "") {
                htmlBloque += crearFilaTabla("Destino", selectDetalle.value);
            }
            const lugDest = document.getElementById('lugar_destino');
            if (lugDest && lugDest.value !== "") {
                const destinoTexto = lugDest.value + " (" + document.getElementById('domicilio_destino').value + ", " + document.getElementById('municipio_destino').value + ")";
                htmlBloque += crearFilaTabla("Destino Específico", destinoTexto);
            }
            const checkboxesFolio = document.querySelectorAll('.chk-folio-vinculado:checked');
            if (checkboxesFolio.length > 0) {
                let contadorSujetoIzq = 1;
                checkboxesFolio.forEach(function(cb) {
                    htmlBloque += crearFilaTabla("Sujeto Vinculado #" + contadorSujetoIzq, cb.parentElement.querySelector('span').textContent);
                    contadorSujetoIzq++;
                });
            }
        }
        htmlBloque += '</div>';
    }

    // MÓDULO DERECHO: ADMINISTRATIVOS
    const marcadosAdminMain = [];
    document.querySelectorAll('.chk-tipo-admin:checked').forEach(function(cb) { marcadosAdminMain.push(cb.parentElement.querySelector('span').textContent); });

    if (marcadosAdminMain.length > 0) {
        htmlBloque += '<div class="modal-table-section-title">Diligencias Administrativas</div>';
        htmlBloque += '<div class="modal-table-container">';
        htmlBloque += crearFilaTabla("Tipo Diligencia", marcadosAdminMain.join(', '));

        const lugAdmin = document.getElementById('lugar_destino_admin');
        if (lugAdmin && lugAdmin.value !== "") {
            const destinoAdminTexto = lugAdmin.value + " (" + document.getElementById('domicilio_destino_admin').value + ", " + document.getElementById('municipio_destino_admin').value + ")";
            htmlBloque += crearFilaTabla("Destino", destinoAdminTexto);
        }
        const checkboxesSujetosAdmin = document.querySelectorAll('.chk-sujeto-admin:checked');
        if (checkboxesSujetosAdmin.length > 0) {
            let contadorSujetoDer = 1;
            checkboxesSujetosAdmin.forEach(function(cb) {
                htmlBloque += crearFilaTabla("Sujeto #" + contadorSujetoDer, cb.parentElement.querySelector('span').textContent);
                contadorSujetoDer++;
            });
        }
        htmlBloque += '</div>';
    }

    return htmlBloque;
};
