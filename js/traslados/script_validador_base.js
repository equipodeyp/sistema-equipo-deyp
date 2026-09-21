document.addEventListener('DOMContentLoaded', function() {
    const lugarSalidaSelect = document.getElementById('lugar_salida');
    const camposBase = document.querySelectorAll('.campo-validar');
    const camposExtras = document.querySelectorAll('.campo-extra');
    const btnSiguiente = document.getElementById('btn-siguiente');
    const contenedorSubmenu = document.getElementById('contenedor-submenu');

    function validarPasoUno() {
        let ok = true;
        camposBase.forEach(c => { if (c.value.trim() === '') ok = false; });
        document.querySelectorAll('.campo-validar-final').forEach(t => { if (t.value === '') ok = false; });
        if (lugarSalidaSelect && lugarSalidaSelect.value === 'OTRO') {
            camposExtras.forEach(c => { if (c.value.trim() === '') ok = false; });
        }
        if (btnSiguiente && (!contenedorSubmenu || contenedorSubmenu.innerHTML === "")) btnSiguiente.disabled = !ok;
        window.pasoUnoFormularioCompletado = ok;
    }
    window.pasoUnoFormularioCompletado = false; validarPasoUno();
    window.addEventListener('formularioCambio', validarPasoUno);
});
