/**
 * Lógica independiente encargada de controlar la carga dinámica
 * y el renderizado adaptativo de los folios según la Instancia.
 */
window.ultimaInstanciaCargada = "";
window.isFetchingTecnologias = false;

window.cargarSelectTecnologias = function() {
    var selectInstancia = document.getElementById('select_instancia');
    const contenedorSelectTags = document.getElementById('contenedor-select-tags');
    const selectDetalle = document.getElementById('select_dependiente_detalle');

    if (!selectInstancia || !contenedorSelectTags) return;
    const valorInstancia = selectInstancia.value;

    // --- REGLA DE RETARDO VISUAL UNIFICADA CORREGIDA ---
    // Obligamos a que las instancias tengan un detalle elegido, pero permitimos libremente el valor "OTRO"
    const instanciasConDetalleObligatorio = ["VISITA FAMILIAR", "CUSTODIA POLICIAL", "DILIGENCIA MINISTERIAL", "DILIGENCIA JUDICIAL"];

    if (instanciasConDetalleObligatorio.includes(valorInstancia)) {
        // CORRECCIÓN: Se quitó la exclusión de "OTRO", permitiendo que avance de forma directa
        if (!selectDetalle || selectDetalle.value === "") {
            contenedorSelectTags.innerHTML = "";
            contenedorSelectTags.classList.remove('visible');
            window.ultimaInstanciaCargada = "";
            window.isFetchingTecnologias = false;
            return;
        }
    }

    // Candado asíncrono para evitar bucles infinitos por peticiones concurrentes
    if (window.isFetchingTecnologias || valorInstancia === window.ultimaInstanciaCargada) return;

    window.isFetchingTecnologias = true;
    window.ultimaInstanciaCargada = valorInstancia;

    const datosPeticion = new FormData();
    datosPeticion.append('instancia_seleccionada', valorInstancia);

    fetch('detalles_tecnologias.php', { method: 'POST', body: datosPeticion })
    .then(function(res) { return res.text(); })
    .then(function(htmlCheckboxes) {
        contenedorSelectTags.innerHTML = htmlCheckboxes;
        contenedorSelectTags.classList.add('visible'); // Revelar la caja perimetral

        const chkHabilitarFuera = document.getElementById('chk-habilitar-fuera');
        const wrapperChkFuera = document.getElementById('wrapper-chk-fuera');
        const bloqueSujetosFuera = document.getElementById('bloque-sujetos-fuera');
        const checkboxesFuera = document.querySelectorAll('.chk-fuera');
        const todosCheckboxesFolios = document.querySelectorAll('.chk-folio-vinculado');

        // Configuración especial para Visita Familiar
        if (valorInstancia === 'VISITA FAMILIAR') {
            if (wrapperChkFuera) wrapperChkFuera.style.display = "none";
            if (bloqueSujetosFuera) { bloqueSujetosFuera.innerHTML = ""; bloqueSujetosFuera.style.display = "none"; }
        } else {
            // El casillero para sujetos externos inicia totalmente habilitado y disponible
            if (chkHabilitarFuera && wrapperChkFuera) {
                chkHabilitarFuera.disabled = false;
                wrapperChkFuera.style.opacity = "1";
                wrapperChkFuera.style.pointerEvents = "auto";
                chkHabilitarFuera.parentElement.style.cursor = "pointer";
            }
        }

        // Oyentes de cambio sobre cada casilla inyectada
        todosCheckboxesFolios.forEach(function(chk) {
            chk.addEventListener('change', function() {
                window.dispatchEvent(new Event('formularioCambio'));
            });
        });

        // Configuración intermedia del bloque "fuera del centro de resguardo"
        if (valorInstancia !== 'VISITA FAMILIAR' && chkHabilitarFuera && bloqueSujetosFuera) {
            chkHabilitarFuera.addEventListener('change', function() {
                if (this.checked) {
                    bloqueSujetosFuera.classList.add('visible');
                    checkboxesFuera.forEach(function(cb) {
                        const totalMarcadosGlobal = document.querySelectorAll('.chk-folio-vinculado:checked, .chk-sujeto-admin:checked').length;
                        if (totalMarcadosGlobal < 4) cb.disabled = false; // Ajustado a tu tope actual de 4 marcas
                    });
                } else {
                    bloqueSujetosFuera.classList.remove('visible');
                    checkboxesFuera.forEach(function(cb) { cb.checked = false; cb.disabled = true; });
                }
                window.dispatchEvent(new Event('formularioCambio'));
            });
        }

        if (valorInstancia !== 'VISITA FAMILIAR' && chkHabilitarFuera && !chkHabilitarFuera.checked) {
            checkboxesFuera.forEach(function(cb) { cb.disabled = true; });
        }

        window.isFetchingTecnologias = false;
        window.dispatchEvent(new Event('formularioCambio'));
    })
    .catch(function(error) {
        console.error('Error al inyectar folios controlados:', error);
        window.isFetchingTecnologias = false;
    });
};
