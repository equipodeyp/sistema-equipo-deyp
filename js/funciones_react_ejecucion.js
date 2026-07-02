function selectNit(e) {
  var idactividad = document.getElementById("actividadejecucion").value;
    if (idactividad === '2') {
    document.getElementById("unidadmedida").value = "DOCUMENTO";
    document.getElementById("trasladoclasificacion").style.display = "none";
    document.getElementById("clasificacioncontactofamiliar").style.display = "none";
    document.getElementById("clasificacionaccionseguridad").style.display = "none";
    document.getElementById("clasificacion_salvaguardarintegridad").style.display = "none";
    document.getElementById("entidadmunicipio_1_2").style.display = "none";
    document.getElementById("actividad_folioexpediente").style.display = "";
    document.getElementById("actividad_idsujeto").style.display = "";
    document.getElementById("actividad_idevidencia").style.display = "none";
    document.getElementById("actividad_kilometros").style.display = "none";
    document.getElementById("medionotificejecmed").style.display = "";

    document.getElementById("evidenciaejecmed").style.display = "none";
    document.getElementById("evidejemed").style.display = "";
    document.getElementById("reportemetas").value = "SI";
    document.getElementById("evidencias_actividadessujeto").style.display = "none";
    // HACER CAMPOS OBLIGATORIOS
    document.getElementById("requiredfolioexpediente").required = true;
    document.getElementById("requiredidsujeto").required = true;
    document.getElementById("evidencia").required = true;
    document.getElementById("notific_atnpet").required = true;
    //
    document.getElementById("clasificacionejecucion_contactofam").required = false;
    document.getElementById("requiredentidadmunicipio").required = false;
    document.getElementById("requiredimageactividad6").required = false;
    document.getElementById("requiredkilometros").required = false;
    document.getElementById("requiredidevidencia").required = false;
    document.getElementById("observacionesact").required = false;

  }else if (idactividad === '3') {
    document.getElementById("unidadmedida").value = "ACCIÓN";
    document.getElementById("trasladoclasificacion").style.display = "none";
    document.getElementById("clasificacioncontactofamiliar").style.display = "";
    document.getElementById("clasificacionaccionseguridad").style.display = "none";
    document.getElementById("clasificacion_salvaguardarintegridad").style.display = "none";
    document.getElementById("entidadmunicipio_1_2").style.display = "none";
    document.getElementById("actividad_folioexpediente").style.display = "";
    document.getElementById("actividad_idsujeto").style.display = "";
    document.getElementById("actividad_idevidencia").style.display = "none";
    document.getElementById("actividad_kilometros").style.display = "none";
    document.getElementById("medionotificejecmed").style.display = "none";
    document.getElementById("evidenciaejecmed").style.display = "none";
    document.getElementById("evidejemed").style.display = "";
    document.getElementById("reportemetas").value = "SI";
    // document.getElementById("clasificacionejecucion_contactofamiliar").style.display = "none";
    // HACER CAMPOS OBLIGATORIOS
    document.getElementById("clasificacionejecucion_contactofam").required = true;
    document.getElementById("requiredfolioexpediente").required = true;
    document.getElementById("requiredidsujeto").required = true;
    document.getElementById("evidencia").required = true;
    //
    document.getElementById("notific_atnpet").required = false;
    document.getElementById("requiredentidadmunicipio").required = false;
    document.getElementById("requiredimageactividad6").required = false;
    document.getElementById("requiredkilometros").required = false;
    document.getElementById("requiredidevidencia").required = false;
    document.getElementById("observacionesact").required = false;

  }else if (idactividad === '6') {
    document.getElementById("unidadmedida").value = "RONDÍN POLICIAL";
    document.getElementById("trasladoclasificacion").style.display = "none";
    document.getElementById("clasificacioncontactofamiliar").style.display = "none";
    document.getElementById("clasificacionaccionseguridad").style.display = "none";
    document.getElementById("clasificacion_salvaguardarintegridad").style.display = "none";
    document.getElementById("entidadmunicipio_1_2").style.display = "";
    document.getElementById("actividad_folioexpediente").style.display = "";
    document.getElementById("actividad_idsujeto").style.display = "";
    document.getElementById("actividad_idevidencia").style.display = "none";
    document.getElementById("actividad_kilometros").style.display = "";
    document.getElementById("medionotificejecmed").style.display = "none";
    document.getElementById("evidenciaejecmed").style.display = "";
    document.getElementById("evidejemed").style.display = "none";
    document.getElementById("reportemetas").value = "SI";
    document.getElementById("evidencias_actividadessujeto").style.display = "none";
    // HACER CAMPOS OBLIGATORIOS
    document.getElementById("requiredentidadmunicipio").required = true;
    document.getElementById("requiredfolioexpediente").required = true;
    document.getElementById("requiredidsujeto").required = true;
    document.getElementById("requiredimageactividad6").required = true;
    document.getElementById("requiredkilometros").required = true;
    //
    document.getElementById("evidencia").required = false;
    document.getElementById("notific_atnpet").required = false;
    document.getElementById("clasificacionejecucion_contactofam").required = false;
    document.getElementById("requiredidevidencia").required = false;
    document.getElementById("observacionesact").required = false;

  }else if (idactividad === '8') {
    document.getElementById("unidadmedida").value = "ACCION";
    document.getElementById("trasladoclasificacion").style.display = "none";
    document.getElementById("clasificacioncontactofamiliar").style.display = "none";
    document.getElementById("clasificacionaccionseguridad").style.display = "none";
    document.getElementById("clasificacion_salvaguardarintegridad").style.display = "none";
    document.getElementById("entidadmunicipio_1_2").style.display = "none";
    document.getElementById("actividad_folioexpediente").style.display = "";
    document.getElementById("actividad_idsujeto").style.display = "";
    document.getElementById("actividad_idevidencia").style.display = "";
    document.getElementById("actividad_kilometros").style.display = "none";
    document.getElementById("medionotificejecmed").style.display = "none";
    document.getElementById("evidenciaejecmed").style.display = "none";
    document.getElementById("evidejemed").style.display = "none";
    document.getElementById("reportemetas").value = "NO";
    document.getElementById("evidencias_actividadessujeto").style.display = "none";
    // HACER CAMPOS OBLIGATORIOS
    document.getElementById("requiredfolioexpediente").required = true;
    document.getElementById("requiredidsujeto").required = true;
    document.getElementById("requiredidevidencia").required = true;
    document.getElementById("observacionesact").required = true;
    //
    document.getElementById("evidencia").required = false;
    document.getElementById("notific_atnpet").required = false;
    document.getElementById("clasificacionejecucion_contactofam").required = false;
    document.getElementById("requiredentidadmunicipio").required = false;
    document.getElementById("requiredimageactividad6").required = false;
    document.getElementById("requiredkilometros").required = false;
    document.getElementById("observacionesact").required = false;

  }else if (idactividad === '7') {
    document.getElementById("unidadmedida").value = "ACTIVIDAD";
    document.getElementById("trasladoclasificacion").style.display = "none";
    document.getElementById("clasificacioncontactofamiliar").style.display = "none";
    document.getElementById("clasificacionaccionseguridad").style.display = "none";
    document.getElementById("clasificacion_salvaguardarintegridad").style.display = "none";
    document.getElementById("entidadmunicipio_1_2").style.display = "none";
    document.getElementById("actividad_folioexpediente").style.display = "";
    document.getElementById("actividad_idsujeto").style.display = "";
    document.getElementById("actividad_idevidencia").style.display = "";
    document.getElementById("requiredidevidencia").setAttribute("placeholder", "NUMERO DE LA TARJETA INFORMATIVA");
    document.getElementById("actividad_kilometros").style.display = "none";
    document.getElementById("medionotificejecmed").style.display = "none";
    document.getElementById("evidenciaejecmed").style.display = "none";
    document.getElementById("evidejemed").style.display = "none";
    document.getElementById("reportemetas").value = "NO";
    document.getElementById("evidencias_actividadessujeto").style.display = "";
    // HACER CAMPOS OBLIGATORIOS
    document.getElementById("requiredfolioexpediente").required = true;
    document.getElementById("requiredidsujeto").required = true;
    document.getElementById("requiredidevidencia").required = true;
    // document.getElementById("requiredkilometros").required = true;
    document.getElementById("evidencia").required = false;
    document.getElementById("notific_atnpet").required = false;
    document.getElementById("clasificacionejecucion_contactofam").required = false;
    document.getElementById("requiredentidadmunicipio").required = false;
    document.getElementById("requiredimageactividad6").required = false;
    document.getElementById("requiredkilometros").required = false;

  }


  // Obtiene el valor de la opción seleccionada
  var actividadSeleccionada = e.target.value;

  if (actividadSeleccionada !== "") {
      $.ajax({
          url: 'buscar_expedientes.php', // Archivo PHP que procesará las consultas
          type: 'POST',
          data: { actividad: actividadSeleccionada },
          success: function(respuesta) {
              // Limpia el select de expedientes y añade la opción por defecto
              $('#requiredfolioexpediente').html('<option disabled selected value="">SELECCIONE EL EXPEDIENTE</option>');
              // Inserta las opciones dinámicas devueltas por PHP
              $('#requiredfolioexpediente').append(respuesta);

              // Si usas bootstrap-select (selectpicker), descomenta la siguiente línea para refrescar el diseño:
              // $('#requiredfolioexpediente').selectpicker('refresh');
          }
      });
  }
}
//////////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
  // Manejar cambio en select de expediente
  $(document).on('change', '.expediente', function(){
    var $this = $(this);
    var expediente = $this.val();
    var $idSujetoSelect = $this.closest('.persona-form').find('.id-sujeto');

    $.ajax({
      url: 'get_id_sujeto.php',
      type: 'POST',
      data: {expediente: expediente},
      success: function(response){
        $idSujetoSelect.html(response);
      }
    });
  });
});
//////////////////////////////////////////////////////////////////////////////////////////////////
function readURL(input) {
if (input.files && input.files[0]) {

var reader = new FileReader();

reader.onload = function(e) {
  $('.image-upload-wrap').hide();

  $('.file-upload-image').attr('src', e.target.result);
  $('.file-upload-content').show();

  $('.image-title').html(input.files[0].name);
};

reader.readAsDataURL(input.files[0]);

} else {
removeUpload();
}
}

function removeUpload() {
$('.file-upload-input').replaceWith($('.file-upload-input').clone());
$('.file-upload-content').hide();
$('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
$('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
$('.image-upload-wrap').removeClass('image-dropping');
});
/////////////////////////////////////////////////////////////////////////////////////////////////////
document.addEventListener('DOMContentLoaded', () => {
    const btnAnadirDisparador = document.getElementById('btn-anadir-disparador');
    const sliderFila = document.getElementById('slider-fila');
    const inputsContenedor = document.getElementById('inputs-ocultos-contenedor');
    const formularioSlider = document.getElementById('formulario-slider');

    // CAMBIO: Asegúrate de que tu elemento <select> en el HTML tenga el id="mi-selector"
    const selectorControl = document.getElementById('actividadejecucion');

    let listaImagenes = [];
    const LIMITE_MAXIMO = 3;
    let idContador = 0;

    // Monitorear el cambio del select para mostrar u ocultar la sección visualmente
    if (selectorControl) {
        selectorControl.addEventListener('change', (e) => {
            const contenedorSeccion = document.querySelector('.slider-seccion');

            // Si el valor es 7, mostramos la sección del slider, si no, la ocultamos
            if (e.target.value == "7") {
                contenedorSeccion.style.display = 'block';
            } else {
                contenedorSeccion.style.display = 'none';
                // Opcional: Limpiar las imágenes cargadas si el usuario cambia de opción
                // limpiarImagenes();
            }
        });

        // Ejecución inicial por si el select ya viene con el valor 7 por defecto al cargar la página
        if (selectorControl.value != "7") {
            document.querySelector('.slider-seccion').style.display = 'none';
        }
    }

    // Evento al hacer clic en el recuadro gris (+)
    btnAnadirDisparador.addEventListener('click', () => {
        if (listaImagenes.length >= LIMITE_MAXIMO) {
            alert('Has alcanzado el límite máximo de 3 imágenes.');
            return;
        }

        const inputTemporal = document.createElement('input');
        inputTemporal.type = 'file';
        inputTemporal.accept = 'image/*';
        inputTemporal.name = `imagenes_slider[]`;
        inputTemporal.id = `input-file-${idContador}`;

        inputTemporal.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                const archivo = e.target.files[0]; // Capturar el archivo individual de la lista

                if (!archivo.type.startsWith('image/')) {
                    alert('Por favor selecciona un archivo de imagen válido.');
                    return;
                }

                const urlImagen = URL.createObjectURL(archivo);
                const idActual = idContador;

                listaImagenes.push({
                    id: idActual,
                    url: urlImagen
                });

                inputsContenedor.appendChild(inputTemporal);
                idContador++;

                renderizarSlider();
            }
        });

        inputTemporal.click();
    });

    // Función global para eliminar una tarjeta
    window.eliminarTarjeta = function(id) {
        const index = listaImagenes.findIndex(item => item.id === id);
        if (index !== -1) {
            URL.revokeObjectURL(listaImagenes[index].url);
            listaImagenes.splice(index, 1);
        }

        const inputAsociado = document.getElementById(`input-file-${id}`);
        if (inputAsociado) inputAsociado.remove();

        renderizarSlider();
    };

    function renderizarSlider() {
        const tarjetasExistentes = sliderFila.querySelectorAll('.tarjeta-item');
        tarjetasExistentes.forEach(tarjeta => tarjeta.remove());

        listaImagenes.forEach((item) => {
            const tarjetaItem = document.createElement('div');
            tarjetaItem.className = 'tarjeta-item';

            tarjetaItem.innerHTML = `
                <div class="contenedor-imagen">
                    <img src="${item.url}" alt="Banner">
                    <button type="button" class="btn-eliminar" onclick="eliminarTarjeta(${item.id})">&times;</button>
                </div>
            `;

            sliderFila.insertBefore(tarjetaItem, btnAnadirDisparador);
        });

        if (listaImagenes.length >= LIMITE_MAXIMO) {
            btnAnadirDisparador.style.display = 'none';
        } else {
            btnAnadirDisparador.style.display = 'flex';
        }
    }

    // NUEVA VALIDACIÓN CONDICIONAL: REQUERIDO SÓLO SI EL SELECT ES IGUAL A 7
    formularioSlider.addEventListener('submit', (e) => {
        // Verificamos si el selector existe y su valor actual es "7"
        if (selectorControl && selectorControl.value == "7") {
            // Si el valor es 7 Y no hay imágenes añadidas, bloqueamos el envío
            if (listaImagenes.length === 0) {
                e.preventDefault(); // Detiene el envío hacia guardar_slider.php
                alert('Error: Debido a la opción seleccionada, debes agregar al menos una (1) imagen obligatoriamente.');
            }
        }
    });

    // Función opcional para limpiar el estado si se oculta la sección
    function limpiarImagenes() {
        listaImagenes.forEach(item => URL.revokeObjectURL(item.url));
        listaImagenes = [];
        inputsContenedor.innerHTML = '';
        renderizarSlider();
    }
});
