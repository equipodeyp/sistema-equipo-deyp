document.addEventListener('DOMContentLoaded', function() {
    const fechaTrasladoInput = document.getElementById('fecha_traslado');
    const lugarSalidaSelect = document.getElementById('lugar_salida');
    const seccionExtra = document.getElementById('seccion_extra');
    const camposBase = document.querySelectorAll('.campo-validar');
    const camposExtras = document.querySelectorAll('.campo-extra');
    const camposTiempos = document.querySelectorAll('.campo-validar-final');

    const btnSiguiente = document.getElementById('btn-siguiente');
    const btnFinalizar = document.getElementById('btn-pre-finalizar') || document.getElementById('btn-finalizar');
    const contenedorSubmenu = document.getElementById('contenedor-submenu');
    const contenedorSelectTags = document.getElementById('contenedor-select-tags');

    if (fechaTrasladoInput) {
        fechaTrasladoInput.addEventListener('focus', function() { this.type = 'date'; });
        fechaTrasladoInput.addEventListener('blur', function() { if (this.value === '') this.type = 'text'; });
    }

    if (lugarSalidaSelect) {
        lugarSalidaSelect.addEventListener('change', function() {
            if (this.value === 'OTRO') { seccionExtra.classList.add('visible'); }
            else { seccionExtra.classList.remove('visible'); camposExtras.forEach(campo => campo.value = ''); }

            if (contenedorSubmenu) contenedorSubmenu.innerHTML = "";
            if (contenedorSelectTags) { contenedorSelectTags.innerHTML = ""; contenedorSelectTags.classList.remove('visible'); }

            document.querySelectorAll('.chk-tipo-admin').forEach(c => c.checked = false);
            const selInst = document.getElementById('select_instancia'); if (selInst) selInst.value = "";
            const condInt = document.getElementById('contenedor-condicional-interno'); if (condInt) condInt.innerHTML = "";
            const admFin = document.getElementById('contenedor-sujetos-admin-final'); if (admFin) admFin.innerHTML = "";
            const pdiFin = document.getElementById('contenedor-pdi-final'); if (pdiFin) pdiFin.innerHTML = "";

            if (btnFinalizar) btnFinalizar.style.display = "none";
            if (btnSiguiente) btnSiguiente.style.display = "inline-block";
            window.dispatchEvent(new Event('formularioCambio'));
        });
    }

    function validarFormularioCompleto() {
        let todosLlenos = true;
        camposBase.forEach(campo => { if (campo.value.trim() === '') todosLlenos = false; });
        if (lugarSalidaSelect && lugarSalidaSelect.value === 'OTRO') {
            camposExtras.forEach(campo => { if (campo.value.trim() === '') todosLlenos = false; });
        }
        if (contenedorSubmenu && contenedorSubmenu.innerHTML === "") {
            btnSiguiente.disabled = !todosLlenos;
        }
        window.dispatchEvent(new Event('formularioCambio'));
    }

    [...camposBase, ...camposExtras, ...camposTiempos].forEach(campo => {
        campo.addEventListener('input', validarFormularioCompleto);
        campo.addEventListener('change', validarFormularioCompleto);
    });
});
