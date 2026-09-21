document.addEventListener('DOMContentLoaded', function() {
    const formTraslado = document.getElementById('form-traslado');
    const modalConfirmacionResumen = document.getElementById('modal-confirmacion-traslado');

    if (!formTraslado) return;

    formTraslado.addEventListener('submit', function(e) {
        // 1. Detener el envío nativo obligatorio
        e.preventDefault();

        // Si la modal de confirmación final ya está en pantalla, no duplicar
        if (document.getElementById('modal-alerta-seguridad-guardar')) return;

        // 2. Crear e Inyectar la Modal de Confirmación de Seguridad en el DOM
        const modalAlertaSeguridad = document.createElement('div');
        modalAlertaSeguridad.id = 'modal-alerta-seguridad-guardar';
        modalAlertaSeguridad.className = 'modal-overlay modal-visible';
        modalAlertaSeguridad.style.zIndex = '100001'; // Por encima del resumen
        modalAlertaSeguridad.innerHTML = `
            <div class="modal-content seccion-entrada-suave" style="max-width: 420px; padding: 25px; text-align: center;">
                <div class="modal-header" style="color: #dc3545; border-bottom: 2px solid #f8d7da; justify-content: center; padding-right: 0;">¡CONFIRMACIÓN DE SEGURIDAD!</div>
                <div class="modal-body" style="font-size: 13.5px; padding: 15px 0; color: #333; text-align: center;">
                    ¿Está seguro de que desea guardar el traslado? <br>
                    <small style="color: #666; display: block; margin-top: 5px;">Esta acción almacenará la información de forma permanente.</small>
                </div>
                <div class="modal-footer" style="justify-content: center; gap: 15px; border-top: 1px solid #eee; padding-top: 15px; margin-top: 10px;">
                    <button type="button" id="btn-seguridad-cancelar" class="btn-modal btn-cancelar" style="padding: 10px 24px;">No, Cancelar</button>
                    <button type="button" id="btn-seguridad-aceptar" class="btn-modal btn-registrar" style="background-color: #dc3545; padding: 10px 24px;">Sí, Guardar</button>
                </div>
            </div>
        `;
        document.body.appendChild(modalAlertaSeguridad);

        // 3. OYENTES DE ACCIÓN PARA LA SEGUNDA CONFIRMACIÓN
        const btnCancelarSeguridad = document.getElementById('btn-seguridad-cancelar');
        const btnAceptarSeguridad = document.getElementById('btn-seguridad-aceptar');

        // Acción: CANCELAR (Cierra la alerta y lo deja en el resumen intacto)
        btnCancelarSeguridad.addEventListener('click', function() {
            modalAlertaSeguridad.remove();
        });

        // Acción: ACEPTAR (Destruye ambas modales e inicia la barra de progreso a 1.5s)
        btnAceptarSeguridad.addEventListener('click', function() {
            // Eliminar la modal de alerta de seguridad
            modalAlertaSeguridad.remove();

            // Ocultar la ventana de resumen de forma física
            if (modalConfirmacionResumen) {
                modalConfirmacionResumen.classList.remove('modal-visible');
            }

            // Inyectar el Loader con barra de progreso y título superior
            const capaLoader = document.createElement('div');
            capaLoader.id = 'capa-loader-guardado';
            capaLoader.className = 'loader-overlay-premium';
            capaLoader.innerHTML = `
                <div class="loader-card-premium seccion-entrada-suave">
                    <div class="loader-header-title">REGISTRANDO TRASLADO</div>
                    <div class="loader-spinner-premium"></div>
                    <div id="loader-mensaje-estado" class="loader-text-premium">Iniciando procesamiento...</div>
                    <div class="loader-progress-wrapper">
                        <div id="loader-progress-bar" class="loader-progress-bar-fill"></div>
                    </div>
                    <div id="loader-porcentaje" class="loader-percentage-text">0%</div>
                </div>
            `;
            document.body.appendChild(capaLoader);

            const txtMensaje = document.getElementById('loader-mensaje-estado');
            const barraProgreso = document.getElementById('loader-progress-bar');
            const txtPorcentaje = document.getElementById('loader-porcentaje');

            const estadosFlujo = [
                { mensaje: "Registrando lugar de salida...", porcentaje: 20 },
                { mensaje: "Registrando destino...", porcentaje: 40 },
                { mensaje: "Registrando motivo...", porcentaje: 60 },
                { mensaje: "Registrando sujetos...", porcentaje: 80 },
                { mensaje: "Registrando PDIS...", porcentaje: 100 }
            ];

            let pasoActual = 0;

            const temporizadorSecuencial = setInterval(function() {
                if (pasoActual < estadosFlujo.length) {
                    const estado = estadosFlujo[pasoActual];
                    if (txtMensaje) txtMensaje.textContent = estado.mensaje;
                    if (barraProgreso) barraProgreso.style.width = estado.porcentaje + "%";
                    if (txtPorcentaje) txtPorcentaje.textContent = estado.porcentaje + "%";
                    pasoActual++;
                } else {
                    clearInterval(temporizadorSecuencial);
                    if (txtMensaje) txtMensaje.textContent = "¡Finalizado! Redireccionando...";
                    if (txtMensaje) txtMensaje.style.color = "#28a745";

                    setTimeout(function() {
                        formTraslado.submit(); // Envío definitivo real al PHP
                    }, 600);
                }
            }, 600); // Ritmo estricto de 1.5 segundos
        });
    });
});
