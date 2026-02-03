function toggleSubmenu(element) {
    var submenu = element.nextElementSibling;
    var icon = element.querySelector('.fa-chevron-down');

    if(submenu.style.display === "none") {
        submenu.style.display = "block";
        icon.style.transform = "rotate(180deg)";
    } else {
        submenu.style.display = "none";
        icon.style.transform = "rotate(0deg)";
    }
}
//////////////////////////////////////////////////////////////////////////////
function menudocumentacion(element) {
    var submenu = element.nextElementSibling;
    var icon = element.querySelector('.fa-chevron-down');

    if(submenu.style.display === "none") {
        submenu.style.display = "block";
        icon.style.transform = "rotate(180deg)";
    } else {
        submenu.style.display = "none";
        icon.style.transform = "rotate(0deg)";
    }
}
//////////////////////////////////////////////////////////////////////////////
function menuestadisticabd(element) {
    var submenu = element.nextElementSibling;
    var icon = element.querySelector('.fa-chevron-down');

    if(submenu.style.display === "none") {
        submenu.style.display = "block";
        icon.style.transform = "rotate(180deg)";
    } else {
        submenu.style.display = "none";
        icon.style.transform = "rotate(0deg)";
    }
}
//////////////////////////////////////////////////////////////////////////////
function menuestadisticaseguimiento(element) {
    var submenu = element.nextElementSibling;
    var icon = element.querySelector('.fa-chevron-down');

    if(submenu.style.display === "none") {
        submenu.style.display = "block";
        icon.style.transform = "rotate(180deg)";
    } else {
        submenu.style.display = "none";
        icon.style.transform = "rotate(0deg)";
    }
}
//////////////////////////////////////////////////////////////////////////////
function menureportes(element) {
    var submenu = element.nextElementSibling;
    var icon = element.querySelector('.fa-chevron-down');

    if(submenu.style.display === "none") {
        submenu.style.display = "block";
        icon.style.transform = "rotate(180deg)";
    } else {
        submenu.style.display = "none";
        icon.style.transform = "rotate(0deg)";
    }
}
//////////////////////////////////////////////////////////////////////////////
function menureact(element) {
    var submenu = element.nextElementSibling;
    var icon = element.querySelector('.fa-chevron-down');

    if(submenu.style.display === "none") {
        submenu.style.display = "block";
        icon.style.transform = "rotate(180deg)";
    } else {
        submenu.style.display = "none";
        icon.style.transform = "rotate(0deg)";
    }
}
//////////////////////////////////////////////////////////////////////////////
function menumetas(element) {
    var submenu = element.nextElementSibling;
    var icon = element.querySelector('.fa-chevron-down');

    if(submenu.style.display === "none") {
        submenu.style.display = "block";
        icon.style.transform = "rotate(180deg)";
    } else {
        submenu.style.display = "none";
        icon.style.transform = "rotate(0deg)";
    }
}
////////////////////////////////////////////////////////////////////////////////
new DataTable('#registros_expedientes', {
  layout: {
      bottomEnd: {
          paging: {
              firstLast: false
          }
      }
  },
  language: {
          "lengthMenu": "Mostrar _MENU_ registros",
          "zeroRecords": "No se encontraron resultados",
          "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sSearch": "Buscar:",
          "oPaginate": {
              "sFirst": "Primero",
              "sLast":"Último",
              "sNext":"Siguiente",
              "sPrevious": "Anterior"
     },
     "sProcessing":"Procesando...",
      },
});
////////////////////////////////////////////////////////////////////////////////
// control de input date al hacer clic en cualquier lado del input
// Selecciona todos los inputs date dentro de formularios
const dateInputs = document.querySelectorAll('form input[type="date"]');

dateInputs.forEach(input => {
  input.addEventListener('click', function() {
    try {
      // El método nativo para desplegar el calendario
      this.showPicker();
    } catch (err) {
      console.warn('showPicker() no disponible en este navegador');
    }
  });
});
