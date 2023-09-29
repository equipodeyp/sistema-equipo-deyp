  function backApartado1() { // Anterior 1. ADICCIONES
    document.getElementById("div_1").style.display = ""; // Mostrar apartado 1. ADICCIONES
    document.getElementById("div_2").style.display = "none"; // Ocultar apartado 2. DISCAPACIDAD

    document.getElementById('question_5').value = ""; // Limpiar select pregunta 5
    document.getElementById('question_6').value = ""; // Limpiar select pregunta 6
    document.getElementById('question_7').value = ""; // Limpiar select pregunta 7
    document.getElementById('question_8').value = ""; // Limpiar select pregunta 8

    document.getElementById("div-b&n1").style.display = ""; // Mostrar division boton Siguiente 1
    document.getElementById("btn-next1").style.display = ""; // Mostrar boton Siguiente 1

    document.getElementById("div-b&n2").style.display = "none"; // Ocultar division boton Anterior / Siguiente 2

    // console.log(document.getElementById('question_1').value);
    // console.log(document.getElementById('question_2').value);
    // console.log(document.getElementById('question_3').value);
    // console.log(document.getElementById('question_4').value);
    
    // var q1 = document.getElementById('question_1').value; // Obtener valor Pregunta 1
    var q2 = document.getElementById('question_2').value; // Obtener valor Pregunta 2 
    var q3 = document.getElementById('question_3').value; // Obtener valor Pregunta 3
    var q4 = document.getElementById('question_4').value; // Obtener valor Pregunta 4

    // if (q1 === "") {
    //   q1.style.display = ""; // Mostrar q1 si es igual a vacio 
    // } else {
    //   q1.style.display = ""; // Mostrar q1 si es diferente de vacio
    // }

    if (q2 === "") {
      q2.style.display = "none"; // Ocultar q2 si es igual a vacio 
    } else {
      q2.style.display = ""; // Mostrar q2 si es diferente de vacio
    }

    if (q3 === "") {
      q3.style.display = "none"; // Ocultar q3 si es igual a vacio 
    } else {
      q3.style.display = ""; // Mostrar q3 si es diferente de vacio
    }
  
    if (q4 === "") {
      q4.style.display = "none"; // Ocultar q4 si es igual a vacio 
    } else {
      q4.style.display = ""; // Mostrar q3 si es diferente de vacio
    }
}


