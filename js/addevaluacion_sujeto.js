const evaluacionestudio = document.getElementById('ANALISIS_MULT');
evaluacionestudio.addEventListener('change', function() {
  // 'this' se refiere al elemento select
  const valorevaluacionestudio = this.value;
  // console.log(valorevaluacionestudio);
  if (valorevaluacionestudio == 'ESTUDIO TECNICO DE ANALISIS DE RIESGO') {
    document.getElementById('div_dateautorizacioneval').style.display = '';
    document.getElementById('div_idanalisiseval').style.display = '';
    document.getElementById('div_tipoconvenioeval').style.display = '';
    document.getElementById('div_commentevel').style.display = '';
    // limpiar selects e inputs
    document.getElementById('dateautorizada').value = '';
    document.getElementById('idanalsisestudio').value = '';
    document.getElementById('slt_tipoconvenio').value = '';
    // hacer required selects/ inputs
    document.getElementById('dateautorizada').required = true;
    document.getElementById('idanalsisestudio').required = true;
  }else if (valorevaluacionestudio == 'ESTUDIO TECNICO DE CONCLUSION' || valorevaluacionestudio == 'ESTUDIO TECNICO DE CANCELACION') {
    document.getElementById('div_dateautorizacioneval').style.display = '';
    document.getElementById('div_idanalisiseval').style.display = '';
    document.getElementById('div_tipoconvenioeval').style.display = '';
    document.getElementById('div_commentevel').style.display = '';
    document.getElementById('div_tipoconvenioeval').style.display = 'none';
    document.getElementById('slt_tipoconvenio').value = '';
    document.getElementById('div_datefirmaeval').style.display = 'none';
    document.getElementById('div_dateinicioeval').style.display = 'none';
    document.getElementById('div_vigenciaconveval').style.display = 'none';
    document.getElementById('div_idconveneval').style.display = 'none';
    // limpiar selects e inputs
    document.getElementById('dateautorizada').value = '';
    document.getElementById('idanalsisestudio').value = '';
    document.getElementById('slt_tipoconvenio').value = '';
    // hacer required selects/ inputs
    document.getElementById('dateautorizada').required = true;
    document.getElementById('idanalsisestudio').required = true;
  }else if (valorevaluacionestudio == 'ESTUDIO TECNICO DE MODIFICACION' || valorevaluacionestudio == 'AUTORIZACION DEL TITULAR') {
    document.getElementById('div_dateautorizacioneval').style.display = '';
    document.getElementById('div_idanalisiseval').style.display = '';
    document.getElementById('div_tipoconvenioeval').style.display = '';
    document.getElementById('div_commentevel').style.display = '';
    // limpiar selects e inputs
    document.getElementById('dateautorizada').value = '';
    document.getElementById('idanalsisestudio').value = '';
    document.getElementById('slt_tipoconvenio').value = '';
    // hacer required selects/ inputs
    document.getElementById('dateautorizada').required = true;
    document.getElementById('idanalsisestudio').required = true;
    // document.getElementById('slt_tipoconvenio').required = true;
  }
});
////////////////////////////////////////////////////////////////////////////////
const evaluacionconvenioeval = document.getElementById('slt_tipoconvenio');
evaluacionconvenioeval.addEventListener('change', function() {
  // 'this' se refiere al elemento select
  const valorevaluacionconvenioeval = this.value;
  if (valorevaluacionconvenioeval == 'CONVENIO DE ENTENDIMIENTO PARA CONTINUAR INCORPORADO AL PROGRAMA') {
    document.getElementById('div_datefirmaeval').style.display = '';
    document.getElementById('div_dateinicioeval').style.display = '';
    document.getElementById('div_vigenciaconveval').style.display = '';
    document.getElementById('div_idconveneval').style.display = '';
  }else if (valorevaluacionconvenioeval == 'CONVENIO MODIFICATORIO') {
    document.getElementById('div_datefirmaeval').style.display = '';
    document.getElementById('div_dateinicioeval').style.display = '';
    document.getElementById('div_vigenciaconveval').style.display = 'none';
    document.getElementById('div_idconveneval').style.display = '';
  }else if (valorevaluacionconvenioeval == 'NO APLICA') {
    document.getElementById('div_datefirmaeval').style.display = 'none';
    document.getElementById('div_dateinicioeval').style.display = 'none';
    document.getElementById('div_vigenciaconveval').style.display = 'none';
    document.getElementById('div_idconveneval').style.display = 'none';
  }

});
////////////////////////////////////////////////////////////////////////////////
const iptdateautorizacioneval = document.getElementById('dateautorizada');
iptdateautorizacioneval.addEventListener('click', () => {
    iptdateautorizacioneval.showPicker(); // Método de la API para mostrar el selector de fecha
});
const iptdatefirmaeval = document.getElementById('ipt_datefirmaconvenio');
iptdatefirmaeval.addEventListener('click', () => {
    iptdatefirmaeval.showPicker(); // Método de la API para mostrar el selector de fecha
});
const iptdateinicioeval = document.getElementById('ipt_dateinicioconvenio');
iptdateinicioeval.addEventListener('click', () => {
    iptdateinicioeval.showPicker(); // Método de la API para mostrar el selector de fecha
});
////////////////////////////////////////////////////////////////////////////////
/**
 * GESTIÓN DE VISIBILIDAD, VALIDACIÓN Y ESTADO DEL BOTÓN
 */
document.addEventListener('change', function (event) {
    // 1. Validar si el cambio fue en nuestro select principal
    if (event.target.classList.contains('slt-tipoconvenio')) {
        const select = event.target;
        const valor = select.value; // Valor seleccionado
        const modal = select.closest('.modal');
        const boton = modal.querySelector('.btn-enviar');

        // A. Ocultar todos los grupos y resetear validaciones
        const todosLosDivs = modal.querySelectorAll('.div-controlado');
        todosLosDivs.forEach(div => {
            div.style.display = 'none';
            // Quitar 'required' de inputs internos para evitar bloqueos invisibles
            div.querySelectorAll('.input-validar').forEach(input => {
                input.required = false;
            });
        });

        // B. Lógica cuando se elige una opción válida (distinta de vacía)
        if (valor !== "") {
            // Mostrar todos los divs vinculados a esa opción
            const divsAMostrar = modal.querySelectorAll(`.${valor}`);
            divsAMostrar.forEach(div => {
                div.style.display = 'block';
                // Activar 'required' solo en los inputs visibles
                div.querySelectorAll('.input-validar').forEach(input => {
                    input.required = true;
                });
            });

            // Habilitar el botón de envío
            boton.disabled = false;
        } else {
            // Si regresa a la opción vacía, deshabilitar botón
            boton.disabled = true;
        }
    }
});

/**
 * ACTIVAR CALENDARIO AL CLIC EN CUALQUIER PARTE DEL INPUT DATE
 */
document.addEventListener('click', function (event) {
    if (event.target.classList.contains('input-fecha')) {
        const inputDate = event.target;

        // showPicker() es la API estándar de 2025 para desplegar el calendario
        if (typeof inputDate.showPicker === 'function') {
            try {
                inputDate.showPicker();
            } catch (error) {
                inputDate.focus();
            }
        }
    }
});
////////////////////////////////////////////////////////////////////////////////
