var folioExpediente4 = document.getElementById('id_asistencia_psico');

var respuestaSeleccionada4;
var respuestaObtenida4;




folioExpediente4.addEventListener('change', obtenerRespuesta3);

function obtenerRespuesta3(e){

  respuestaSeleccionada4 = e.target.value;
  respuestaObtenida4 = respuestaSeleccionada4;


  // console.log(respuestaObtenida4);

  if (respuestaObtenida4 != ""){
    Swal.fire({
      title: "¿ El id de la asistencia psicológica es correcto ?",
      text: respuestaObtenida4,
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