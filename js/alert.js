

var folioExpediente = document.getElementById('id_asistencia');

var respuestaSeleccionada3;
var respuestaObtenida3;




folioExpediente.addEventListener('change', obtenerRespuesta3);

function obtenerRespuesta3(e){

  respuestaSeleccionada3 = e.target.value;
  respuestaObtenida3 = respuestaSeleccionada3;


  // console.log(respuestaObtenida3);

  if (respuestaObtenida3 != ""){
    Swal.fire({
      title: "¿ El id de la asistencia médica es correcto ?",
      text: respuestaObtenida3,
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



