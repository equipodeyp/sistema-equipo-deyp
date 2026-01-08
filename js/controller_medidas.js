////////////////////////////////////////////////////////////////////////////////
// validar modal input text solo acepte numeros para registrar total de medidas otorgadas PROVISIONALLES
$(document).ready(function() {
    $('#NUM_MEDIDAS_PROVISIONALES').on('input', function() {
        // Reemplaza cualquier caracter que NO sea un dígito (0-9) por una cadena vacía
        $(this).val($(this).val().replace(/[^0-9]/g, ''));

        // Limita a un máximo de 2 caracteres, aunque ya se gestiona con el atributo maxlength,
        // esto añade una capa extra de seguridad si el usuario intenta superarlo
        if ($(this).val().length > 2) {
            $(this).val($(this).val().slice(0, 2));
        }
    });

    // También puedes añadir esto para prevenir la pulsación de teclas no numéricas desde el principio
    $('#NUM_MEDIDAS_PROVISIONALES').on('keypress', function(event) {
        // Permite teclas de control (retroceso, tab, etc.)
        if (event.ctrlKey || event.altKey || event.metaKey || event.keyCode < 48 || event.keyCode > 57) {
            // Si no es un dígito, impide la acción por defecto
            if (event.keyCode < 48 || event.keyCode > 57) {
                 event.preventDefault();
            }
        }
    });
});
////////////////////////////////////////////////////////////////////////////////
// inicio de controller de selects cuando cambian de opcion para medidas provisionales y definitivas sin clasificacion
// select de clasificacion de la medida
// Función para mostrar/ocultar los divs basada en la selección
function manejarCambioSelectclasificacion(event) {
  // Verificamos si el elemento que disparó el evento es uno de nuestros selects
  if (event.target.classList.contains('select-clasificacion')) {
    const selectElement = event.target;
    const selectedValue = selectElement.value; // Valor seleccionado (ej: 'opcion1')
    // console.log(selectElement);
    // console.log(selectedValue);
    // Obtenemos el ID del modal padre usando un atributo data-*
    const modalId = selectElement.getAttribute('data-target-modal');
    const modal = document.getElementById(modalId);
    // console.log(modal);
    if (modal) {
      // Ocultamos todos los divs dinámicos dentro de ESE modal específico
      const divsOcultar = modal.querySelectorAll('.div-clasificacion');
      divsOcultar.forEach(div => {
        div.style.display = 'none';
        const selectSecundario = div.querySelector('.select-asistencia');
        if (selectSecundario) {
          selectSecundario.value = ''; // Esto selecciona la opción con value=""
        }
        const selectSecundario2 = div.querySelector('.select-resguardo');
        if (selectSecundario2) {
          selectSecundario2.value = ''; // Esto selecciona la opción con value=""
        }
      });

      const divsOcultarasistencia = modal.querySelectorAll('.div-asistencia');
      divsOcultarasistencia.forEach(div => {
        div.style.display = 'none';
      });

      const divsOcultarresguardo = modal.querySelectorAll('.div-resguardo');
      divsOcultarresguardo.forEach(div => {
        div.style.display = 'none';
      });
      // Mostramos solo el div correspondiente a la opción seleccionada
      // El nombre de la clase del div debe coincidir con el valor de la opción
      const divMostrar = modal.querySelector(`.${selectedValue}-div`);
      if (divMostrar) {
        divMostrar.style.display = ''; // O 'flex', 'grid', etc.
      }
    }
  }
}
// Delegación de eventos: añadimos un listener al documento (u otro contenedor estático)
// y dejamos que la función maneje el evento 'change' en los elementos con la clase 'select-opcion'
document.addEventListener('change', manejarCambioSelectclasificacion);
// select de medida de asistencia cuando sea otra
// Función para mostrar/ocultar los divs basada en la selección
function manejarCambioSelectasistencia(event) {
  // Verificamos si el elemento que disparó el evento es uno de nuestros selects
  if (event.target.classList.contains('select-asistencia')) {
    const selectElement = event.target;
    const selectedValue = selectElement.value; // Valor seleccionado (ej: 'opcion1')
    // console.log(selectElement);
    console.log(selectedValue);

    // Obtenemos el ID del modal padre usando un atributo data-*
    const modalId = selectElement.getAttribute('data-target-modal');
    const modal = document.getElementById(modalId);
    // console.log(modal);
    if (modal) {
      // Ocultamos todos los divs dinámicos dentro de ESE modal específico
      const divsOcultar = modal.querySelectorAll('.div-asistencia');
      divsOcultar.forEach(div => {
        div.style.display = 'none';
        const inputasistencia = div.querySelector('.ipt-asistencia');
        if (inputasistencia) {
          inputasistencia.value = ''; // Esto selecciona la opción con value=""
          // IMPORTANTE: Removemos el atributo 'required' de todos los selects ocultos
          inputasistencia.removeAttribute('required');
        }
      });
      // Mostramos solo el div correspondiente a la opción seleccionada
      // El nombre de la clase del div debe coincidir con el valor de la opción
      const divMostrar = modal.querySelector(`.${selectedValue}-div`);
      if (divMostrar) {
        divMostrar.style.display = ''; // O 'flex', 'grid', etc.
        // 3. Buscamos el select secundario DENTRO del div que acabamos de mostrar
        const selectSecundarioVisible = divMostrar.querySelector('.ipt-asistencia');
        if (selectSecundarioVisible) {
          // Y le añadimos el atributo 'required' solo a este select visible
          selectSecundarioVisible.setAttribute('required', 'true');
        }
      }
    }
  }
}
// Delegación de eventos: añadimos un listener al documento (u otro contenedor estático)
// y dejamos que la función maneje el evento 'change' en los elementos con la clase 'select-opcion'
document.addEventListener('change', manejarCambioSelectasistencia);
// select de medida de resguardo cuando sea otra, xxi y xxii
// Función para mostrar/ocultar los divs basada en la selección
function sltresguardo(event) {
  // Verificamos si el elemento que disparó el evento es uno de nuestros selects
  if (event.target.classList.contains('select-resguardo')) {
    const selectElement = event.target;
    const selectedValue = selectElement.value; // Valor seleccionado (ej: 'opcion1')
    // console.log(selectElement);
    // console.log(selectedValue);
    // Obtenemos el ID del modal padre usando un atributo data-*
    const modalId = selectElement.getAttribute('data-target-modal');
    const modal = document.getElementById(modalId);
    // console.log(modal);
    if (modal) {
      // Ocultamos todos los divs dinámicos dentro de ESE modal específico
      const divsOcultar = modal.querySelectorAll('.div-resguardo');
      divsOcultar.forEach(div => {
        div.style.display = 'none';
        //
        const sltprocesal = div.querySelector('.select-procesal');
        if (sltprocesal) {
          sltprocesal.value = ''; // Esto selecciona la opción con value=""
          // IMPORTANTE: Removemos el atributo 'required' de todos los selects ocultos
          sltprocesal.removeAttribute('required');
        }
        //
        const sltrecluir = div.querySelector('.select-recluido');
        if (sltrecluir) {
          sltrecluir.value = ''; // Esto selecciona la opción con value=""
          // IMPORTANTE: Removemos el atributo 'required' de todos los selects ocultos
          sltrecluir.removeAttribute('required');
        }
        //
        const inputresguardo = div.querySelector('.ipt-resguardo');
        if (inputresguardo) {
          inputresguardo.value = ''; // Esto selecciona la opción con value=""
          // IMPORTANTE: Removemos el atributo 'required' de todos los selects ocultos
          inputresguardo.removeAttribute('required');
        }
      });
      // Mostramos solo el div correspondiente a la opción seleccionada
      // El nombre de la clase del div debe coincidir con el valor de la opción
      const divMostrar = modal.querySelector(`.${selectedValue}-div`);
      if (divMostrar) {
        divMostrar.style.display = ''; // O 'flex', 'grid', etc.
        // 3. Buscamos el select secundario DENTRO del div que acabamos de mostrar
        const selectreqprocesal = divMostrar.querySelector('.select-procesal');
        if (selectreqprocesal) {
          // Y le añadimos el atributo 'required' solo a este select visible
          selectreqprocesal.setAttribute('required', 'true');
        }
        // 3. Buscamos el select secundario DENTRO del div que acabamos de mostrar
        const selectreqrecluido = divMostrar.querySelector('.select-recluido');
        if (selectreqrecluido) {
          // Y le añadimos el atributo 'required' solo a este select visible
          selectreqrecluido.setAttribute('required', 'true');
        }
        // 3. Buscamos el select secundario DENTRO del div que acabamos de mostrar
        const iptreqresguardo = divMostrar.querySelector('.ipt-resguardo');
        if (iptreqresguardo) {
          // Y le añadimos el atributo 'required' solo a este select visible
          iptreqresguardo.setAttribute('required', 'true');
        }
      }
    }
  }
}
// Delegación de eventos: añadimos un listener al documento (u otro contenedor estático)
// y dejamos que la función maneje el evento 'change' en los elementos con la clase 'select-opcion'
document.addEventListener('change', sltresguardo);
// fin de controller de selects cuando cambian de opcion para medidas provisionales y definitivas sin clasificacion
////////////////////////////////////////////////////////////////////////////////
// validar modal input text solo acepte numeros para registrar total de medidas otorgadas DEFINITIVAS
$(document).ready(function() {
    $('#NUM_MEDIDAS_definitivas').on('input', function() {
        // Reemplaza cualquier caracter que NO sea un dígito (0-9) por una cadena vacía
        $(this).val($(this).val().replace(/[^0-9]/g, ''));

        // Limita a un máximo de 2 caracteres, aunque ya se gestiona con el atributo maxlength,
        // esto añade una capa extra de seguridad si el usuario intenta superarlo
        if ($(this).val().length > 2) {
            $(this).val($(this).val().slice(0, 2));
        }
    });

    // También puedes añadir esto para prevenir la pulsación de teclas no numéricas desde el principio
    $('#NUM_MEDIDAS_definitivas').on('keypress', function(event) {
        // Permite teclas de control (retroceso, tab, etc.)
        if (event.ctrlKey || event.altKey || event.metaKey || event.keyCode < 48 || event.keyCode > 57) {
            // Si no es un dígito, impide la acción por defecto
            if (event.keyCode < 48 || event.keyCode > 57) {
                 event.preventDefault();
            }
        }
    });
});
////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////
//  inicio de controller para agregar otras medidas fuera de convenios
// select tipo de la medida
function addothermedtipo(sel){
  if (sel.value == 'PROVISIONAL') {
    document.getElementById('date_of_medida_provisional').style.display='';
    document.getElementById('date_of_medida_definitiva').style.display='none';
    // limpiar inputs
    document.getElementById('date_extent_of_definitiva').value = '';
    // hacer required inputs
    document.getElementById('date_extent_of_provisional').required = true;
    document.getElementById('date_extent_of_definitiva').required = false;
  }else if (sel.value == 'DEFINITIVA') {
    document.getElementById('date_of_medida_provisional').style.display='none';
    document.getElementById('date_of_medida_definitiva').style.display='';
    // limpiar inputs
    document.getElementById('date_extent_of_provisional').value = '';
    // hacer required inputs
    document.getElementById('date_extent_of_provisional').required = false;
    document.getElementById('date_extent_of_definitiva').required = true;
  }
}
////////////////////////////////////////////////////////////////////////////////
// const iptdateprovisional = document.getElementById('date_extent_of_provisional');
// iptdateprovisional.addEventListener('click', () => {
//     iptdateprovisional.showPicker(); // Método de la API para mostrar el selector de fecha
// });
// const iptdatedefinitiva = document.getElementById('date_extent_of_definitiva');
// iptdatedefinitiva.addEventListener('click', () => {
//     iptdatedefinitiva.showPicker(); // Método de la API para mostrar el selector de fecha
// });
// document.getElementById('upt_datedefinitiva').addEventListener('click', function() {
//   this.showPicker(); // Muestra el calendario nativo
// });
// select clasificacion de la medida
function addothermedclasificacion(sel){
  if (sel.value == 'ASISTENCIA') {
    document.getElementById('medida_of_asistencia').style.display = '';
    document.getElementById('othermedida_asistencia').style.display = 'none';
    document.getElementById('medida_of_resguardo').style.display = 'none';
    document.getElementById('medidaxi_of_resguardo').style.display = 'none';
    document.getElementById('medidaxii_of_resguardo').style.display = 'none';
    document.getElementById('other_of_resguardo').style.display = 'none';
    // limpiar inputs
    document.getElementById('guard_of_attendance').value = '';
    // hacer required inputs
    document.getElementById('extent_of_attendance').required = true;
    document.getElementById('guard_of_attendance').required = false;
  }else {
    document.getElementById('medida_of_asistencia').style.display = 'none';
    document.getElementById('othermedida_asistencia').style.display = 'none';
    document.getElementById('medida_of_resguardo').style.display = '';
    document.getElementById('medidaxi_of_resguardo').style.display = 'none';
    document.getElementById('medidaxii_of_resguardo').style.display = 'none';
    document.getElementById('other_of_resguardo').style.display = 'none';
    // limpiar inputs
    document.getElementById('extent_of_attendance').value = '';
    document.getElementById('otherextent_of_attendance').value = '';
    // hacer required inputs
    document.getElementById('extent_of_attendance').required = false;
    document.getElementById('guard_of_attendance').required = true;
  }
}
// select de medidas de asistencia
function addmedasistencia(sel){
  if (sel.value == 'VI. OTRAS') {
    document.getElementById('othermedida_asistencia').style.display = '';
    // hace required inputs
    document.getElementById('otherextent_of_attendance').required = true;
  }else {
    document.getElementById('othermedida_asistencia').style.display = 'none';
    // limpiar inputs
    document.getElementById('otherextent_of_attendance').value = '';
    // hace required inputs
    document.getElementById('otherextent_of_attendance').required = false;
  }
}
// select de medidas de resguardo
function addmedresguardo(sel){
  if (sel.value == 'XI. EJECUCION DE MEDIDAS PROCESALES') {
    document.getElementById('medidaxi_of_resguardo').style.display = '';
    document.getElementById('medidaxii_of_resguardo').style.display = 'none';
    document.getElementById('other_of_resguardo').style.display = 'none';
    // limpiar inputs
    document.getElementById('medida_sujetosrecluidos').value = '';
    document.getElementById('other_medida_guard').value = '';
    // hacer required inputs
    document.getElementById('medida_procesal').required = true;
    document.getElementById('medida_sujetosrecluidos').required = false;
    document.getElementById('other_medida_guard').required = false;
  }else if (sel.value == 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
    document.getElementById('medidaxi_of_resguardo').style.display = 'none';
    document.getElementById('medidaxii_of_resguardo').style.display = '';
    document.getElementById('other_of_resguardo').style.display = 'none';
    // limpiar inputs
    document.getElementById('medida_procesal').value = '';
    document.getElementById('other_medida_guard').value = '';
    // hacer required inputs
    document.getElementById('medida_procesal').required = false;
    document.getElementById('medida_sujetosrecluidos').required = true;
    document.getElementById('other_medida_guard').required = false;
  }else if (sel.value == 'XIII. OTRAS MEDIDAS') {
    document.getElementById('medidaxi_of_resguardo').style.display = 'none';
    document.getElementById('medidaxii_of_resguardo').style.display = 'none';
    document.getElementById('other_of_resguardo').style.display = '';
    // limpiar inputs
    document.getElementById('medida_procesal').value = '';
    document.getElementById('medida_sujetosrecluidos').value = '';
    // hacer required inputs
    document.getElementById('medida_procesal').required = false;
    document.getElementById('medida_sujetosrecluidos').required = false;
    document.getElementById('other_medida_guard').required = true;
  }else {
    document.getElementById('medidaxi_of_resguardo').style.display = 'none';
    document.getElementById('medidaxii_of_resguardo').style.display = 'none';
    document.getElementById('other_of_resguardo').style.display = 'none';
    // limpiar inputs
    document.getElementById('medida_procesal').value = '';
    document.getElementById('medida_sujetosrecluidos').value = '';
    document.getElementById('other_medida_guard').value = '';
    // hacer required inputs
    document.getElementById('medida_procesal').required = false;
    document.getElementById('medida_sujetosrecluidos').required = false;
    document.getElementById('other_medida_guard').required = false;
  }
}
// fin de controller para agregar otras medidas fuera de convenios
////////////////////////////////////////////////////////////////////////////////
//  inicio de controller para actualizar estatus de la medida ya sea PROVISIONAL o DEFINITIVA
// select de tipo de medida mostrar y ocultar
function manejarresguardo(selectElement) {
    const modalPadre = selectElement.closest('.modal');
    const valor = selectElement.value; // tarjeta, efectivo, transferencia, credito
    // console.log(valor);
    // Ocultar todos los divs de pago DENTRO del modal
    // Nota: Es crucial usar querySelectorAll('.div-pago') si todos los divs de pago están en el mismo nivel,
    // pero si están anidados, usamos selectElement.closest('.modal').querySelectorAll('.div-pago')
    modalPadre.querySelectorAll('.div-resguardoupt').forEach(div => div.style.display = 'none');

    // Mostrar el div específico (ej: .pago-tarjeta)
    // Usamos modalPadre.querySelector para buscar en todo el modal
    const divMostrar = modalPadre.querySelector(`.resguardo-${valor}`);
    if (divMostrar) {
        divMostrar.style.display = 'block';
    }
}

function manejarasistencia(selectElement) {
    const modalPadre = selectElement.closest('.modal');
    const valor = selectElement.value; // tarjeta, efectivo, transferencia, credito
    // console.log(valor);
    // Ocultar todos los divs de pago DENTRO del modal
    // Nota: Es crucial usar querySelectorAll('.div-pago') si todos los divs de pago están en el mismo nivel,
    // pero si están anidados, usamos selectElement.closest('.modal').querySelectorAll('.div-pago')
    modalPadre.querySelectorAll('.div-asistenciaupt').forEach(div => div.style.display = 'none');

    // Mostrar el div específico (ej: .pago-tarjeta)
    // Usamos modalPadre.querySelector para buscar en todo el modal
    const divMostrar = modalPadre.querySelector(`.asistencia-${valor}`);
    if (divMostrar) {
        divMostrar.style.display = 'block';
    }
}


function manejarclasificacion(selectElement) {
    const modalPadre = selectElement.closest('.modal');
    const valor = selectElement.value; // paqueteria, propio
    // console.log(valor);
    // Ocultar todos los divs de envío
    modalPadre.querySelectorAll('.div-clasificacionupt').forEach(div => div.style.display = 'none');

    // Mostrar el div específico (ej: .envio-paq)
    const divAMostrar = modalPadre.querySelector(`.clasificacion-${valor}`);
    if (divAMostrar) {
        divAMostrar.style.display = 'block';

        // *** LA CLAVE: LLAMAR A LA SIGUIENTE FUNCIÓN ***
        // Buscar el select de pago que acaba de aparecer dentro de este div
        const selectPagoAnidado = divAMostrar.querySelector('.slt-asistencia');
        const selectPagoAnidado2 = divAMostrar.querySelector('.slt-resguardo');
        if (selectPagoAnidado) {
            // Llamar a la función del select secundario para que configure sus propios divs
            manejarasistencia(selectPagoAnidado);
        }else {
          manejarresguardo(selectPagoAnidado2);
        }
    }
}
// --- Evento Centralizado (Maneja Carga Inicial y Cambios) ---
function manejarControlDinamico(eventTarget) {
    if (eventTarget.classList.contains('slt-clasificacion')) {
        // La primera función de la cascada
        manejarclasificacion(eventTarget);
    }
    // Las funciones secundarias (manejarPago, manejarHorario) NO necesitan estar aquí,
    // ya que son llamadas desde manejarEnvio() o por el event listener de abajo.

    // Si el usuario cambia el select de pago directamente (interacción manual),
    // también queremos que se ejecute su lógica:
    else if (eventTarget.classList.contains('slt-asistencia')) {
        manejarasistencia(eventTarget);
    }
}

// Escuchar el evento 'shown.bs.modal' para la configuración inicial
document.addEventListener('shown.bs.modal', function (event) {
    const modalAbierto = event.target;

    // Solo necesitamos llamar a la función de nivel superior (manejarEnvio)
    // ya que ella se encarga de llamar a las siguientes en cascada.
    const selectPrincipal = modalAbierto.querySelector('.slt-clasificacion');
    if (selectPrincipal) {
        manejarclasificacion(selectPrincipal);
    }
});
//
// Función para mostrar/ocultar los divs basada en la selección
function manejarCambiodefinitiva(event) {
  // Verificamos si el elemento que disparó el evento es uno de nuestros selects
  if (event.target.classList.contains('select-controldate')) {
    const selectElement = event.target;
    const selectedValue = selectElement.value; // Valor seleccionado (ej: 'opcion1')
    // console.log(selectElement);
    // console.log(selectedValue);

    // Obtenemos el ID del modal padre usando un atributo data-*
    const modalId = selectElement.getAttribute('data-target-modal');
    const modal = document.getElementById(modalId);
    // console.log(modal);
    if (modal) {
      // Ocultamos todos los divs dinámicos dentro de ESE modal específico
      const divsOcultar = modal.querySelectorAll('.div-datedefinitiva');
      divsOcultar.forEach(div => {
        div.style.display = 'none';
        const inputasistencia = div.querySelector('.ipt-datedefinitiva');
        if (inputasistencia) {
          inputasistencia.value = ''; // Esto selecciona la opción con value=""
          // IMPORTANTE: Removemos el atributo 'required' de todos los selects ocultos
          inputasistencia.removeAttribute('required');
        }
      });
      // Mostramos solo el div correspondiente a la opción seleccionada
      // El nombre de la clase del div debe coincidir con el valor de la opción
      const divMostrar = modal.querySelector(`.${selectedValue}`);
      if (divMostrar) {
        divMostrar.style.display = ''; // O 'flex', 'grid', etc.
        const iptdatedefinitiva = divMostrar.querySelector('.ipt-datedefinitiva');
        if (iptdatedefinitiva) {
          // Y le añadimos el atributo 'required' solo a este select visible
          iptdatedefinitiva.setAttribute('required', 'true');
        }
      }
    }
  }
}
// Delegación de eventos: añadimos un listener al documento (u otro contenedor estático)
// y dejamos que la función maneje el evento 'change' en los elementos con la clase 'select-opcion'
document.addEventListener('change', manejarCambiodefinitiva);
// Función para mostrar/ocultar los divs basada en la selección
// Función para mostrar/ocultar los divs basada en la selección
/**
 * Función que muestra los divs correspondientes a la opción seleccionada.
 * @param {HTMLElement} selectElement El elemento <select> que disparó el evento.
 */
function mostrarVariosDivs(selectElement) {

    const valorSeleccionado = selectElement.value; // ej: 'opcion-multiple'

    const contenedor = selectElement.closest('.contenedor-principal');

    if (!contenedor) return;

    // 1. Ocultar TODOS los divs que pertenecen a este grupo
    const todosLosDivs = contenedor.querySelectorAll('.div-controlado');
    todosLosDivs.forEach(div => {
        div.style.display = 'none';
        const sltmuninicipio = div.querySelector('.slt-municipio');
        if (sltmuninicipio) {
          sltmuninicipio.value = ''; // Esto selecciona la opción con value=""
          // IMPORTANTE: Removemos el atributo 'required' de todos los selects ocultos
          sltmuninicipio.removeAttribute('required');
        }
        const iptdateejecucion = div.querySelector('.ipt-dateejecutada');
        if (iptdateejecucion) {
          iptdateejecucion.value = ''; // Esto selecciona la opción con value=""
          // IMPORTANTE: Removemos el atributo 'required' de todos los selects ocultos
          iptdateejecucion.removeAttribute('required');
        }
        const sltconclusion = div.querySelector('.select-conclusion');
        if (sltconclusion) {
          sltconclusion.value = ''; // Esto selecciona la opción con value=""
          // IMPORTANTE: Removemos el atributo 'required' de todos los selects ocultos
          sltconclusion.removeAttribute('required');
        }
        const iptotherart = div.querySelector('.ipt-otherart35');
        if (iptotherart) {
          iptotherart.value = ''; // Esto selecciona la opción con value=""
          // IMPORTANTE: Removemos el atributo 'required' de todos los selects ocultos
          // iptotherart.removeAttribute('required');
        }
        const iptotherconclusion = div.querySelector('.ipt-otherconclusion');
        if (iptotherconclusion) {
          iptotherconclusion.value = ''; // Esto selecciona la opción con value=""
        }
        const iptdatecancelada = div.querySelector('.ipt-datecancelada');
        if (iptdatecancelada) {
          iptdatecancelada.value = ''; // Esto selecciona la opción con value=""
          // IMPORTANTE: Removemos el atributo 'required' de todos los selects ocultos
          iptdatecancelada.removeAttribute('required');
        }
        const iptmotivocancelacion = div.querySelector('.ipt-motivocancelacion');
        if (iptmotivocancelacion) {
          iptmotivocancelacion.value = ''; // Esto selecciona la opción con value=""
          // IMPORTANTE: Removemos el atributo 'required' de todos los selects ocultos
          iptmotivocancelacion.removeAttribute('required');
        }
    });

    const divsOcultarotherconclusion = contenedor.querySelectorAll('.div-conclusion');
    divsOcultarotherconclusion.forEach(div => {
      div.style.display = 'none';
    });
    // 2. Mostrar TODOS los divs que coinciden con el valor seleccionado
    // El selector será, por ejemplo, '.opcion-multiple'
    if (valorSeleccionado !== 'default') {
        const divsAMostrar = contenedor.querySelectorAll(`.${valorSeleccionado}`);
        // console.log(valorSeleccionado);
        // Iteramos sobre la lista de nodos (puede ser 1 o N elementos) y los mostramos
        divsAMostrar.forEach(div => {
            div.style.display = '';
            if (valorSeleccionado == 'EJECUTADA') {
              // console.log("REQUIRED");
              // 3. Buscamos el select secundario DENTRO del div que acabamos de mostrar
              const selectmuncipioejec = contenedor.querySelector('.slt-municipio');
              if (selectmuncipioejec) {
                // Y le añadimos el atributo 'required' solo a este select visible
                selectmuncipioejec.setAttribute('required', 'true');
              }
              // 3. Buscamos el select secundario DENTRO del div que acabamos de mostrar
              const inputdateejecutada = contenedor.querySelector('.ipt-dateejecutada');
              if (inputdateejecutada) {
                // Y le añadimos el atributo 'required' solo a este select visible
                inputdateejecutada.setAttribute('required', 'true');
              }
              // 3. Buscamos el select secundario DENTRO del div que acabamos de mostrar
              const selectconclusion = contenedor.querySelector('.select-conclusion');
              if (selectconclusion) {
                // Y le añadimos el atributo 'required' solo a este select visible
                selectconclusion.setAttribute('required', 'true');
              }
            }else if (valorSeleccionado == 'CANCELADA') {
              // 3. Buscamos el select secundario DENTRO del div que acabamos de mostrar
              const inputcancelar = contenedor.querySelector('.ipt-datecancelada');
              if (inputcancelar) {
                // Y le añadimos el atributo 'required' solo a este select visible
                inputcancelar.setAttribute('required', 'true');
              }
              // 3. Buscamos el select secundario DENTRO del div que acabamos de mostrar
              const inputcancelarmotivo = contenedor.querySelector('.ipt-motivocancelacion');
              if (inputcancelarmotivo) {
                // Y le añadimos el atributo 'required' solo a este select visible
                inputcancelarmotivo.setAttribute('required', 'true');
              }
            }

        });
    }
}


// --- Manejo de Eventos (Delegación) ---

// Escuchamos el evento 'change' en todo el documento.
document.addEventListener('change', (event) => {
    // Verificamos si el elemento que cambió es nuestro select de control
    if (event.target.classList.contains('select-controlestatus')) {
        // Llamamos a la función con el select que generó el evento
        mostrarVariosDivs(event.target);
    }
});

// Si esto se usa en modales de Bootstrap con valores predefinidos:
document.addEventListener('shown.bs.modal', function (event) {
    const select = event.target.querySelector('.select-controlestatus');
    if (select) {
        mostrarVariosDivs(select);
    }
});
// select de clasificacion de la medida
// Función para mostrar/ocultar los divs basada en la selección
function manejarCambioSelectconclusion(event) {
  // Verificamos si el elemento que disparó el evento es uno de nuestros selects
  if (event.target.classList.contains('select-conclusion')) {
    const selectElement = event.target;
    const selectedValue = selectElement.value; // Valor seleccionado (ej: 'opcion1')
    // console.log(selectElement);
    // console.log(selectedValue);
    // Obtenemos el ID del modal padre usando un atributo data-*
    const modalId = selectElement.getAttribute('data-target-modal');
    const modal = document.getElementById(modalId);
    // console.log(modal);
    if (modal) {
      // Ocultamos todos los divs dinámicos dentro de ESE modal específico
      const divsOcultar = modal.querySelectorAll('.div-conclusion');
      divsOcultar.forEach(div => {
        div.style.display = 'none';
        // console.log(selectedValue);
        const iptotherarttwo = div.querySelector('.ipt-otherart35');
        if (iptotherarttwo) {
          iptotherarttwo.value = ''; // Esto selecciona la opción con value=""
          // IMPORTANTE: Removemos el atributo 'required' de todos los selects ocultos
          iptotherarttwo.removeAttribute('required');
        }
        const iptotheconclusion = div.querySelector('.ipt-otherconclusion');
        if (iptotheconclusion) {
          iptotheconclusion.value = ''; // Esto selecciona la opción con value=""
          // IMPORTANTE: Removemos el atributo 'required' de todos los selects ocultos
          iptotheconclusion.removeAttribute('required');
        }
      });
      // Mostramos solo el div correspondiente a la opción seleccionada
      // El nombre de la clase del div debe coincidir con el valor de la opción
      const divMostrar = modal.querySelector(`.${selectedValue}`);
      if (divMostrar) {
        divMostrar.style.display = ''; // O 'flex', 'grid', etc.
        // console.log(selectedValue);
        if (selectedValue == 'CONVENIO') {
          // 3. Buscamos el select secundario DENTRO del div que acabamos de mostrar
          const inputconclusionart = modal.querySelector('.ipt-otherart35');
          if (inputconclusionart) {
            // Y le añadimos el atributo 'required' solo a este select visible
            inputconclusionart.setAttribute('required', 'true');
          }
        }else if (selectedValue == 'OTRO') {
          // 3. Buscamos el select secundario DENTRO del div que acabamos de mostrar
          const inputotherconclusion = modal.querySelector('.ipt-otherconclusion');
          if (inputotherconclusion) {
            // Y le añadimos el atributo 'required' solo a este select visible
            inputotherconclusion.setAttribute('required', 'true');
          }
        }
      }
    }
  }
}
// Delegación de eventos: añadimos un listener al documento (u otro contenedor estático)
// y dejamos que la función maneje el evento 'change' en los elementos con la clase 'select-opcion'
document.addEventListener('change', manejarCambioSelectconclusion);


////////////////////////////////////////////////////////////////////////////////


/**
 * Maneja la lógica combinada: deshabilitar select, mostrar/ocultar divs y deshabilitar inputs internos.
 * @param {HTMLElement} selectElement El select que disparó el evento o se está configurando.
 */
function manejarEstadoCompleto(selectElement) {

    const valorSeleccionado = selectElement.value; // ej: 'definitiva'
    const valorDefinitivo = 'DEFINITIVA'; // El valor específico que bloquea todo

    // Encontrar el contenedor padre (usamos .closest() para mayor flexibilidad)
    const contenedor = selectElement.closest('.modal-body');
    if (!contenedor) return;

    // --- Lógica 1: Deshabilitar/Habilitar el Select PRINCIPAL ---
    if (valorSeleccionado === valorDefinitivo) {
        // Si es el valor definitivo, deshabilitamos el MISMO select
        selectElement.disabled = true;
    } else {
        // Si no es definitivo, nos aseguramos de que esté habilitado
        selectElement.disabled = false;
    }

    // --- Lógica 2: Mostrar/Ocultar Divs ---

    // Ocultar todos los divs de contenido dentro del contenedor
    const todosLosDivs = contenedor.querySelectorAll('.div-datedefinitiva');
    todosLosDivs.forEach(div => {
        div.style.display = 'none';
    });

    // Mostrar solo el div que coincide con el valor seleccionado
    const divAMostrar = contenedor.querySelector(`.${valorSeleccionado}`);
    if (divAMostrar) {
        divAMostrar.style.display = 'block';

        // --- Lógica 3: Deshabilitar Inputs SI el valor es 'definitiva' ---
        const inputsVisibles = divAMostrar.querySelectorAll('.input-controlado');

        inputsVisibles.forEach(input => {
            if (valorSeleccionado === valorDefinitivo) {
                // Si la opción elegida es "definitiva", deshabilitamos los inputs del div visible
                input.disabled = true;
            } else {
                // Si la opción NO es definitiva (borrador/revision), los dejamos habilitados
                input.disabled = false;
            }
        });
    }
}


// --- Manejo de Eventos (Delegación y Carga Inicial) ---

// // Escuchar la interacción del usuario (evento 'change')
// document.addEventListener('change', (event) => {
//     if (event.target.classList.contains('select-controldate')) {
//         manejarEstadoCompleto(event.target);
//     }
// });

// Manejar la carga inicial (si se usa Bootstrap modal)
document.addEventListener('shown.bs.modal', (event) => {
    const modal = event.target;
    const selectPrincipal = modal.querySelector('.select-controldate');
    if (selectPrincipal) {
        manejarEstadoCompleto(selectPrincipal);
    }
});


////////////////////////////////////////////////////////////////////////////////
// // Variable global para rastrear si ha habido cambios en el formulario
// let cambiosRealizados = false;
//
// /**
//  * Habilita el botón de guardar si se detecta alguna interacción.
//  */
// function habilitarBotonGuardar() {
//     const botonGuardar = document.getElementById('btnGuardar');
//
//     // Si aún no hemos registrado cambios, actualizamos el indicador y habilitamos el botón.
//     if (!cambiosRealizados) {
//         cambiosRealizados = true;
//         if (botonGuardar) {
//             botonGuardar.disabled = false;
//         }
//     }
// }
//
// // 1. Escuchar eventos de cambio de input/select/textarea
// // Usamos 'input' para inputs de texto (incluye tecleo) y 'change' para selects/checkboxes/radios.
// document.querySelector('.mi-formulario').addEventListener('input', habilitarBotonGuardar);
// document.querySelector('.mi-formulario').addEventListener('change', habilitarBotonGuardar);
//
//
// // 2. (Opcional) Resetear el estado cuando el formulario se envía con éxito
// document.querySelector('.mi-formulario').addEventListener('submit', () => {
//     cambiosRealizados = false;
//     document.getElementById('btnGuardar').disabled = true;
//     // Aquí iría tu lógica AJAX para enviar el formulario
// });


// ////////////////////////////////////////////////////////////////////////////////
// // / Selecciona el elemento textarea
// const textarea = document.getElementById('texarearesize');
//
// // Función que ajusta la altura del textarea
// function autoResize() {
//   // Reinicia la altura a 'auto' para que recalcule la altura natural del contenido
//   this.style.height = 'auto';
//   // Establece la altura al scrollHeight (altura total del contenido)
//   this.style.height = this.scrollHeight + 'px';
// }
//
// // Añade un "event listener" para escuchar cuando el usuario escribe (evento input)
// textarea.addEventListener('input', autoResize, false);
//
// // Llama a la función una vez al cargar la página si ya hay contenido
// autoResize.call(textarea);
/**
 * ACTIVAR CALENDARIO AL CLIC EN CUALQUIER PARTE DEL INPUT DATE
 */
document.addEventListener('click', function (event) {
    if (event.target.classList.contains('input-fechamediact')) {
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
