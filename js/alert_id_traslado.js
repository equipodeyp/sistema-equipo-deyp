var folioExpediente5 = document.getElementById('id_asistencia_tras');

var respuestaSeleccionada5;
var respuestaObtenida5;




folioExpediente5.addEventListener('change', obtenerRespuesta3);

function obtenerRespuesta3(e){

  respuestaSeleccionada5 = e.target.value;
  respuestaObtenida5 = respuestaSeleccionada5;


  // console.log(respuestaObtenida4);

  if (respuestaObtenida5 != ""){
    Swal.fire({
      title: "¿ El id del traslado es correcto ?",
      text: respuestaObtenida5,
      icon: "question",
      confirmButtonText: "ACEPTAR",
      width: '30%',
      allowOutsideClick: false,
      backdrop: `
          rgba(90,120,120,0.4)
          
          left top
          repeat
        `
    });
  }

}