document.addEventListener('DOMContentLoaded', function() {
    var ultimaAlertaDisparadaTime = 0;

    function procesarCandadosYLimites() {
        var contenedorCheckboxesAdmin = document.getElementById('contenedor-checkboxes-administrativos');
        var contenedorSujetosAdminFinal = document.getElementById('contenedor-sujetos-admin-final');
        var checkboxesAdminMain = document.querySelectorAll('.chk-tipo-admin');

        var checkboxesFolios = document.querySelectorAll('.chk-folio-vinculado');
        var checkboxesSujetosAdmin = document.querySelectorAll('.chk-sujeto-admin');
        var checkboxesMedicos = document.querySelectorAll('.chk-asistencia');
        var divMensaje = document.getElementById('mensaje-limite-folios');

        // 1. CONTEO EN TIEMPO REAL REAL DE ELEMENTOS MARCADOS EN EL DOM
        var marcadosFolios = document.querySelectorAll('.chk-folio-vinculado:checked').length;
        var marcadosAdmin = document.querySelectorAll('.chk-sujeto-admin:checked').length;
        var marcadosMedicos = document.querySelectorAll('.chk-asistencia:checked').length;

        var totalMarcadosGlobal = marcadosFolios + marcadosAdmin + marcadosMedicos;

        // Compartir contadores globales limpios hacia el validador de botones
        window.totalSujetosMarcadosGlobal = totalMarcadosGlobal;
        window.marcadosFoliosGlobal = marcadosFolios;
        window.marcadosAdminGlobal = marcadosAdmin;
        window.marcadosMedicosGlobal = marcadosMedicos;

        var algunaCasillaAdminPrendida = Array.from(checkboxesAdminMain).some(function(c) { return c.checked; });

        // Cortacorrientes analítico de seguridad para la columna derecha
        if (!algunaCasillaAdminPrendida) {
            marcadosAdmin = 0;
            totalMarcadosGlobal = marcadosFolios + marcadosMedicos;
            if (contenedorSujetosAdminFinal && contenedorSujetosAdminFinal.innerHTML !== "") {
                contenedorSujetosAdminFinal.innerHTML = "";
            }
        }

        // REGLA DE BLOQUEO INTER-MÓDULO: Bloquear bloque administrativo si a la izquierda ya hay 4 elegidos
        if (checkboxesAdminMain.length > 0 && marcadosAdmin === 0) {
            if (marcadosFolios + marcadosMedicos >= 4) {
                checkboxesAdminMain.forEach(function(cb) { cb.disabled = true; cb.checked = false; });
                if (contenedorCheckboxesAdmin) {
                    contenedorCheckboxesAdmin.style.opacity = "0.4";
                    contenedorCheckboxesAdmin.style.pointerEvents = "none";
                }
                if (contenedorSujetosAdminFinal) contenedorSujetosAdminFinal.innerHTML = "";
            } else {
                checkboxesAdminMain.forEach(function(cb) { cb.disabled = false; });
                if (contenedorCheckboxesAdmin) {
                    contenedorCheckboxesAdmin.style.opacity = "1";
                    contenedorCheckboxesAdmin.style.pointerEvents = "auto";
                }
            }
        }

        // CONTROL DINÁMICO DEL HABILITADOR INTERMEDIO "FUERA DEL CENTRO"
        var chkHabilitarFuera = document.getElementById('chk-habilitar-fuera');
        var wrapperChkFuera = document.getElementById('wrapper-chk-fuera');

        if (chkHabilitarFuera && wrapperChkFuera) {
            if (totalMarcadosGlobal >= 4) {
                chkHabilitarFuera.disabled = true;
                wrapperChkFuera.style.opacity = "0.5";
                wrapperChkFuera.style.pointerEvents = "none";

                var bloqueSujetosFuera = document.getElementById('bloque-sujetos-fuera');
                if (bloqueSujetosFuera && !chkHabilitarFuera.checked) {
                    bloqueSujetosFuera.classList.remove('visible');
                    document.querySelectorAll('.chk-fuera').forEach(function(cb) { cb.checked = false; });
                }
            } else {
                chkHabilitarFuera.disabled = false;
                wrapperChkFuera.style.opacity = "1";
                wrapperChkFuera.style.pointerEvents = "auto";
            }
        }

        // Bloqueo estético de opacidad en casillas vacías al alcanzar el tope exacto de 4
        var todasLasCasillasSujetos = [...checkboxesFolios, ...checkboxesSujetosAdmin, ...checkboxesMedicos];
        if (totalMarcadosGlobal >= 4) {
            todasLasCasillasSujetos.forEach(function(cb) {
                if (!cb.checked) {
                    cb.parentElement.style.opacity = "0.4";
                    cb.parentElement.style.cursor = "not-allowed";
                }
            });
            if (divMensaje) { divMensaje.textContent = "Has seleccionado las 4 opciones disponibles"; divMensaje.style.color = "#cc0000"; }
        } else {
            todasLasCasillasSujetos.forEach(function(cb) {
                if (cb.classList.contains('chk-fuera') && chkHabilitarFuera && !chkHabilitarFuera.checked) {
                    cb.disabled = true;
                } else {
                    cb.disabled = false;
                    cb.parentElement.style.opacity = "1";
                    cb.parentElement.style.cursor = "pointer";
                }
            });
            if (divMensaje) divMensaje.textContent = "";
        }

        // ORDEN DE APARICIÓN DE PDI
        var selectInstancia = document.getElementById('select_instancia');
        var esAsistenciaMedica = selectInstancia && selectInstancia.value === 'ASISTENCIA MEDICA';

        if (!esAsistenciaMedica && typeof evaluarYMostrarModuloPDI === 'function') {
            var selectDetalle = document.getElementById('select_dependiente_detalle');
            var validacionSelectIzquierdoOK = false;
            var validacionCheckboxesDerechoOK = false;

            var bloqueIzquierdoActivo = selectInstancia && selectInstancia.value !== '';
            var bloqueDerechoActivo = algunaCasillaAdminPrendida;

            if (bloqueIzquierdoActivo && selectDetalle && selectDetalle.value !== '') {
                if (selectDetalle.value === 'OTRO') {
                    var l = document.getElementById('lugar_destino'); var d = document.getElementById('domicilio_destino'); var m = document.getElementById('municipio_destino');
                    if (l && l.value.trim() !== '' && d && d.value.trim() !== '' && m && m.value !== '') { validacionSelectIzquierdoOK = true; }
                } else { validacionSelectIzquierdoOK = true; }
            }

            if (bloqueDerechoActivo) {
                var la = document.getElementById('lugar_destino_admin'); var da = document.getElementById('domicilio_destino_admin'); var ma = document.getElementById('municipio_destino_admin');
                var txtLlenos = true; if (la || da || ma) { txtLlenos = la && la.value.trim() !== '' && da && da.value.trim() !== '' && ma && ma.value !== ''; }
                if (txtLlenos && marcadosAdmin >= 1) validacionCheckboxesDerechoOK = true;
            }

            var permisoPdiEnCaliente = false;
            if (bloqueIzquierdoActivo && bloqueDerechoActivo) {
                permisoPdiEnCaliente = (validacionSelectIzquierdoOK && marcadosFolios >= 1) && validacionCheckboxesDerechoOK;
            } else if (bloqueIzquierdoActivo) {
                permisoPdiEnCaliente = validacionSelectIzquierdoOK && (marcadosFolios >= 1);
            } else if (bloqueDerechoActivo) {
                permisoPdiEnCaliente = validacionCheckboxesDerechoOK;
            }

            evaluarYMostrarModuloPDI(permisoPdiEnCaliente, false);
        }
    }

    // =========================================================================
    // 🚀 DELEGACIÓN DE EVENTOS GLOBAL: CAPTURA EN CALIENTE DE CLICS EN EL DOM
    // =========================================================================
    document.addEventListener('click', function(e) {
        // Verificar si lo que clickeó el usuario es alguna de nuestras casillas analíticas
        if (e.target && (
            e.target.classList.contains('chk-folio-vinculado') ||
            e.target.classList.contains('chk-sujeto-admin') ||
            e.target.classList.contains('chk-asistencia')
        )) {
            // Solo evaluar si el usuario está intentando MARCAR la casilla
            if (e.target.checked) {
                var marcadosFolios = document.querySelectorAll('.chk-folio-vinculado:checked').length;
                var marcadosAdmin = document.querySelectorAll('.chk-sujeto-admin:checked').length;
                var marcadosMedicos = document.querySelectorAll('.chk-asistencia:checked').length;
                var totalMarcadosGlobal = marcadosFolios + marcadosAdmin + marcadosMedicos;

                // Si con este clic se superan las 4 marcas permitidas
                if (totalMarcadosGlobal > 4) {
                    e.preventDefault(); // Detener físicamente la acción del navegador
                    e.target.checked = false; // Forzar desmarcado seguro

                    // Disparar la alerta nativa controlando el tiempo para evitar alertas repetidas
                    var ahora = Date.now();
                    if (ahora - ultimaAlertaDisparadaTime > 500) {
                        ultimaAlertaDisparadaTime = ahora;
                        alert("Ya se seleccionaron el máximo de sujetos (4 sujetos permitidos en total).");
                    }
                    return;
                }
            }
            // Si la regla no se rompe, notificar el cambio común a todos los scripts
            window.dispatchEvent(new Event('formularioCambio'));
        }
    });

    window.totalSujetosMarcadosGlobal = 0;
    window.marcadosFoliosGlobal = 0;
    window.marcadosAdminGlobal = 0;
    window.marcadosMedicosGlobal = 0;

    procesarCandadosYLimites();
    window.addEventListener('formularioChangeForzado', procesarCandadosYLimites);
    window.addEventListener('formularioCambio', procesarCandadosYLimites);
});
