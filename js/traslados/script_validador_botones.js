document.addEventListener('DOMContentLoaded', function() {
    var btnPreFinalizar = document.getElementById('btn-pre-finalizar') || document.getElementById('btn-finalizar');

    function procesarActivacionFinal() {
        var pasoDosCompletado = !!window.pasoUnoFormularioCompletado;

        var selectInstancia = document.getElementById('select_instancia');
        var chkAdminMarcados = document.querySelectorAll('.chk-tipo-admin:checked');
        var contenedorSelectTags = document.getElementById('contenedor-select-tags');
        var contenedorPdiFinal = document.getElementById('contenedor-pdi-final');

        var bloqueIzquierdoActivo = selectInstancia && selectInstancia.value !== '';
        var bloqueDerechoActivo = chkAdminMarcados.length > 0;

        if (!bloqueIzquierdoActivo && !bloqueDerechoActivo) {
            if (contenedorPdiFinal) { contenedorPdiFinal.innerHTML = ''; }
            window.pdiCargadoCorrectamente = false;
            if (btnPreFinalizar) btnPreFinalizar.disabled = true;
            return;
        }

        var totalMarcadosGlobal = window.totalSujetosMarcadosGlobal || 0;
        var marcadosFolios = window.marcadosFoliosGlobal || 0;
        var marcadosAdmin = window.marcadosAdminGlobal || 0;

        var validacionSelectIzquierdoOK = false;
        var validacionCheckboxesDerechoOK = false;
        var esAsistenciaMedica = selectInstancia && selectInstancia.value === 'ASISTENCIA MEDICA';

        // EVALUACIÓN A: VALIDEZ DEL BLOQUE IZQUIERDO
        if (bloqueIzquierdoActivo) {
            var instanciaValor = selectInstancia.value;
            var selectDetalle = document.getElementById('select_dependiente_detalle');

            if (instanciaValor === 'ASISTENCIA MEDICA') {
                var checkboxesMedicos = document.querySelectorAll('.chk-asistencia, .chk-asistencia-unico');
                if (Array.from(checkboxesMedicos).some(function(chk) { return chk.checked; })) {
                    validacionSelectIzquierdoOK = true;
                }
            } else {
                if (selectDetalle && selectDetalle.value !== '') {
                    if (selectDetalle.value === 'OTRO') {
                        var lugarDestino = document.getElementById('lugar_destino');
                        var domicilioDestino = document.getElementById('domicilio_destino');
                        var municipioDestino = document.getElementById('municipio_destino');

                        if (lugarDestino && lugarDestino.value.trim() !== '' &&
                            domicilioDestino && domicilioDestino.value.trim() !== '' &&
                            municipioDestino && municipioDestino.value !== '') {
                            validacionSelectIzquierdoOK = true;
                        }
                    } else {
                        validacionSelectIzquierdoOK = true;
                    }
                }
            }
        }

        // EVALUACIÓN B: VALIDEZ DEL BLOQUE DERECHO
        if (bloqueDerechoActivo) {
            var lugarAdmin = document.getElementById('lugar_destino_admin');
            var domAdmin = document.getElementById('domicilio_destino_admin');
            var munAdmin = document.getElementById('municipio_destino_admin');

            var camposTextoAdminLlenos = true;
            if (lugarAdmin || domAdmin || munAdmin) {
                camposTextoAdminLlenos = lugarAdmin && lugarAdmin.value.trim() !== '' &&
                                         domAdmin && domAdmin.value.trim() !== '' &&
                                         munAdmin && munAdmin.value !== '';
            }

            if (camposTextoAdminLlenos && marcadosAdmin >= 1) {
                validacionCheckboxesDerechoOK = true;
            }
        }

        // CONDICIÓN LÓGICA DE ACTIVACIÓN UNIFICADA
        var listoParaEnviar = false;

        if (esAsistenciaMedica && bloqueDerechoActivo) {
            listoParaEnviar = validacionSelectIzquierdoOK && validacionCheckboxesDerechoOK;
        } else if (esAsistenciaMedica) {
            listoParaEnviar = validacionSelectIzquierdoOK;
        } else if (bloqueIzquierdoActivo && bloqueDerechoActivo) {
            listoParaEnviar = (validacionSelectIzquierdoOK && marcadosFolios >= 1) && validacionCheckboxesDerechoOK;
        } else if (bloqueIzquierdoActivo) {
            listoParaEnviar = validacionSelectIzquierdoOK && (marcadosFolios >= 1);
        } else if (bloqueDerechoActivo) {
            listoParaEnviar = validacionCheckboxesDerechoOK;
        }

        if (!listoParaEnviar) {
            window.pdiCargadoCorrectamente = false;
        }

        var pdiListo = false;
        if (contenedorPdiFinal && contenedorPdiFinal.innerHTML !== "") {
            var marcadosPDI = document.querySelectorAll('.chk-pdi-elemento:checked').length;
            if (marcadosPDI >= 1) { pdiListo = true; }
        }

        // CONDICIÓN GENERAL DE ENCENDIDO DEL BOTÓN FINAL (RANGO DE TOPE A MÁXIMO 4 MARCAS)
        var habilitarBotonFinal = false;
        if (esAsistenciaMedica && !bloqueDerechoActivo) {
            habilitarBotonFinal = pasoDosCompletado && listoParaEnviar && pdiListo && (totalMarcadosGlobal >= 1 && totalMarcadosGlobal <= 4);
        } else {
            habilitarBotonFinal = pasoDosCompletado && listoParaEnviar && pdiListo && (totalMarcadosGlobal >= 1 && totalMarcadosGlobal <= 4);
        }

        if (btnPreFinalizar) { btnPreFinalizar.disabled = !habilitarBotonFinal; }

        // --- CONTROL DE APARICIÓN DE SUJETOS SEPARADO DE LOS INPUTS DE TEXTO ---
        if (contenedorSelectTags) {
            var selectDetalleVal = document.getElementById('select_dependiente_detalle');
            var tieneMotivoElegido = selectDetalleVal && selectDetalleVal.value !== '';
            var sActivo = (selectInstancia && selectInstancia.value !== '' && selectInstancia.value !== 'ASISTENCIA MEDICA');

            if (pasoDosCompletado && sActivo && tieneMotivoElegido) {
                if (typeof window.cargarSelectTecnologias === 'function') {
                    window.cargarSelectTecnologias();
                }
            }
        }
    }

    window.fuerzaValidacionBotonesFinales = procesarActivacionFinal;
    window.addEventListener('formularioCambio', procesarActivacionFinal);
});
