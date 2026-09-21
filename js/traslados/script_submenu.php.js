document.addEventListener('DOMContentLoaded', function() {
    const fechaTrasladoInput = document.getElementById('fecha_traslado');
    const btnSiguiente = document.getElementById('btn-siguiente');
    const btnPreFinalizar = document.getElementById('btn-pre-finalizar');
    const contenedorSubmenu = document.getElementById('contenedor-submenu');
    const contenedorSelectTags = document.getElementById('contenedor-select-tags');
    const contenedorSujetosAdminFinal = document.getElementById('contenedor-sujetos-admin-final');

    if (btnSiguiente) {
        btnSiguiente.addEventListener('click', function() {
            fetch('submenu.php')
            .then(function(res) { return res.text(); })
            .then(function(htmlRecibido) {
                if (contenedorSubmenu) contenedorSubmenu.innerHTML = htmlRecibido;
                btnSiguiente.style.display = "none";
                if (btnPreFinalizar) btnPreFinalizar.style.display = "inline-block";

                inicializarEscuchaCondicional();
                window.dispatchEvent(new Event('formularioCambio'));
            })
            .catch(function(err) { console.error('Error al avanzar de paso:', err); });
        });
    }

    window.inicializarEscuchaCondicional = function() {
        const selectInstancia = document.getElementById('select_instancia');
        const contenedorCondicional = document.getElementById('contenedor-condicional-interno');

        if (!selectInstancia) return;

        selectInstancia.addEventListener('change', function() {
            const instanciaValor = this.value;
            const fechaValor = fechaTrasladoInput ? fechaTrasladoInput.value : '';

            // =========================================================================
            // 🚨 LIMPIEZA MAESTRA UNIFICADA (BORRADO FÍSICO Y APAGADO DE EVENTOS)
            // =========================================================================
            window.ultimaInstanciaCargada = "";
            window.isFetchingTecnologias = false;
            window.pdiCargadoCorrectamente = false;

            // Bajar contadores globales a cero inmediatamente
            window.totalSujetosMarcadosGlobal = 0;
            window.marcadosFoliosGlobal = 0;
            window.marcadosAdminGlobal = 0;

            // 1. Limpiar subbloques del lado izquierdo
            if (contenedorSelectTags) {
                contenedorSelectTags.innerHTML = "";
                contenedorSelectTags.classList.remove('visible');
            }
            if (contenedorCondicional) {
                contenedorCondicional.innerHTML = '';
            }

            // 2. VACIADO Y OCULTACIÓN ABSOLUTA DEL LADO DERECHO VIA DISPARADOR NATIVO
            const checkboxesAdmin = document.querySelectorAll('.chk-tipo-admin');
            checkboxesAdmin.forEach(function(c) {
                if (c.checked) {
                    c.checked = false;
                    // --- CORRECCIÓN CRUCIAL: Forzamos el evento change para activar el candado del otro script ---
                    c.dispatchEvent(new Event('change'));
                } else {
                    c.checked = false;
                }
                c.disabled = false;
                c.parentElement.style.opacity = "1";
                c.parentElement.style.cursor = "pointer";
            });

            const contenedorCheckboxesAdmin = document.getElementById('contenedor-checkboxes-administrativos');
            if (contenedorCheckboxesAdmin) {
                contenedorCheckboxesAdmin.style.opacity = "1";
                contenedorCheckboxesAdmin.style.pointerEvents = "auto";
            }

            // Destrucción total del nodo inferior derecho
            if (contenedorSujetosAdminFinal) {
                contenedorSujetosAdminFinal.innerHTML = "";
            }

            // 3. Limpiar el bloque final de los PDIS y mensajes de error
            const contenedorPdiFinal = document.getElementById('contenedor-pdi-final');
            if (contenedorPdiFinal) {
                contenedorPdiFinal.innerHTML = "";
            }

            const divMensajeOld = document.getElementById('mensaje-limite-folios');
            if (divMensajeOld) {
                divMensajeOld.textContent = "";
            }

            // Si cambian a la opción vacía, notificar el reinicio y salir
            if (instanciaValor === '') {
                window.dispatchEvent(new Event('formularioCambio'));
                return;
            }

            // 4. Cargar el nuevo flujo correspondiente al lado izquierdo
            const datosFormulario = new FormData();
            datosFormulario.append('evaluar_instancia', '1');
            datosFormulario.append('instancia_seleccionada', instanciaValor);
            datosFormulario.append('fecha_traslado', fechaValor);

            fetch('detalles_asistencia_a.php', { method: 'POST', body: datosFormulario })
            .then(function(res) { return res.text(); })
            .then(function(htmlResultado) {
                if (contenedorCondicional) {
                    contenedorCondicional.innerHTML = htmlResultado;
                    contenedorCondicional.className = "seccion-entrada-suave";
                }

                if (typeof activarManejoDestinoOtro === 'function') { activarManejoDestinoOtro(); }
                if (typeof activarManejoCheckboxesMultiples === 'function') { activarManejoCheckboxesMultiples(); }

                if (contenedorCondicional) {
                    contenedorCondicional.querySelectorAll('input, select').forEach(function(elem) {
                        elem.addEventListener('input', function() { window.dispatchEvent(new Event('formularioCambio')); });
                        elem.addEventListener('change', function() { window.dispatchEvent(new Event('formularioCambio')); });
                    });
                }

                window.dispatchEvent(new Event('formularioCambio'));
            })
            .catch(function(error) { console.error('Error al cargar condicional:', error); });
        });

        if (typeof activarManejoDiligenciasAdministrativas === 'function') {
            activarManejoDiligenciasAdministrativas();
        }
    };
});
