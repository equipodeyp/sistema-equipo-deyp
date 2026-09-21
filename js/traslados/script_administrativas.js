/**
 * Lógica independiente encargada de controlar la interactividad exclusiva
 * de los checkboxes administrativos horizontales de la derecha.
 */
function activarManejoDiligenciasAdministrativas() {
    const selectInstancia = document.getElementById('select_instancia');
    const checkboxesAdmin = document.querySelectorAll('.chk-tipo-admin');
    const contenedorSujetosAdminFinal = document.getElementById('contenedor-sujetos-admin-final');

    if (checkboxesAdmin.length === 0 || !contenedorSujetosAdminFinal) return;

    checkboxesAdmin.forEach(function(chk) {
        chk.addEventListener('change', function() {
            // Si el usuario desmarca manualmente la casilla, limpiar únicamente su propia subsección
            if (!this.checked) {
                if (contenedorSujetosAdminFinal) {
                    contenedorSujetosAdminFinal.innerHTML = '';
                }
                window.dispatchEvent(new Event('formularioCambio'));
                return;
            }

            // Aplicar exclusión tipo radio únicamente en la columna de la derecha
            checkboxesAdmin.forEach(function(outro) {
                if (outro !== chk) outro.checked = false;
            });

            // Detectar de forma estricta si el lado izquierdo está activo con cualquier selección
            const tieneSelectIzquierdo = selectInstancia && selectInstancia.value !== "";

            const datosEnvio = new FormData();
            datosEnvio.append('ocultar_inputs_destino', tieneSelectIzquierdo ? '1' : '0');

            // AJAX: Invocar el pintado correspondiente en la columna derecha
            fetch('detalles_administrativas.php', {
                method: 'POST',
                body: datosEnvio
            })
            .then(function(res) {
                return res.text();
            })
            .then(function(htmlEstructuraAdmin) {
                // Si en el tiempo de respuesta el usuario ya desmarcó, abortar
                if (!chk.checked) {
                    contenedorSujetosAdminFinal.innerHTML = '';
                    return;
                }

                contenedorSujetosAdminFinal.innerHTML = htmlEstructuraAdmin;

                // Asociar escuchadores en tiempo real sobre los elementos inyectados de la derecha
                contenedorSujetosAdminFinal.querySelectorAll('input, select').forEach(function(elem) {
                    elem.addEventListener('input', function() { window.dispatchEvent(new Event('formularioCambio')); });
                    elem.addEventListener('change', function() { window.dispatchEvent(new Event('formularioCambio')); });
                });

                window.dispatchEvent(new Event('formularioCambio'));
            })
            .catch(function(error) {
                console.error('Error al cargar flujo administrativo mixto:', error);
            });
        });
    });
}
