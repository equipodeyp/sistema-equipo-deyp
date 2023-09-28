

  function iniciarInstrumento() { // Iniciar instrumento
  document.getElementById("div_1").style.display = ""; // Apartado 1. ADICCIONES
  document.getElementById("iniciar_instrumento").style.display = "none"; // Boton iniciar 
}



  function nextApartadoDos() { // Siguiente 2. DISCAPACIDAD
    document.getElementById("div_1").style.display = "none"; // Ocultar apartado 1. ADICCIONES
    document.getElementById("div_2").style.display = ""; // Mostrar apartado 2. DISCAPACIDAD
    document.getElementById("div-b&n1").style.display = "none"; // Ocultar boton Siguiente 1
    document.getElementById("div-b&n2").style.display = ""; // Mostrar boton Anterior / Siguiente 1
  
}
