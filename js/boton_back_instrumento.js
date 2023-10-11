  /////////// APARTADO 1
  
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


  /////////// APARTADO 2

  
  function backApartado2() { // Anterior 2. DISCAPACIDAD
    document.getElementById("div_2").style.display = ""; // Mostrar apartado 2. DISCAPACIDAD
    document.getElementById("div_3").style.display = "none"; // Ocultar apartado 3. ENFERMEDAD

    document.getElementById('question_9').value = ""; // Limpiar select pregunta 9
    document.getElementById('question_10').value = ""; // Limpiar select pregunta 10
    document.getElementById('question_11').value = ""; // Limpiar select pregunta 11
    document.getElementById('question_12').value = ""; // Limpiar select pregunta 12

    document.getElementById("div-b&n2").style.display = ""; // Mostrar division boton Siguiente 2
    document.getElementById("btn-back2").style.display = ""; // Mostrar boton Anterior 2
    document.getElementById("btn-next2").style.display = ""; // Mostrar boton Siguiente 2

    document.getElementById("div-b&n3").style.display = "none"; // Ocultar division boton Anterior / Siguiente 3

    // console.log(document.getElementById('question_5').value);
    // console.log(document.getElementById('question_6').value);
    // console.log(document.getElementById('question_7').value);
    // console.log(document.getElementById('question_8').value);
    
    // var q5 = document.getElementById('question_5').value; // Obtener valor Pregunta 5
    var q6 = document.getElementById('question_6').value; // Obtener valor Pregunta 6
    var q7 = document.getElementById('question_7').value; // Obtener valor Pregunta 7
    var q8 = document.getElementById('question_8').value; // Obtener valor Pregunta 8

    // if (q5 === "") {
    //   q5.style.display = ""; // Mostrar q5 si es igual a vacio 
    // } else {
    //   q5.style.display = ""; // Mostrar q5 si es diferente de vacio
    // }

    if (q6 === "") {
      q6.style.display = "none"; // Ocultar q6 si es igual a vacio 
    } else {
      q6.style.display = ""; // Mostrar q6 si es diferente de vacio
    }

    if (q7 === "") {
      q7.style.display = "none"; // Ocultar q7 si es igual a vacio 
    } else {
      q7.style.display = ""; // Mostrar q7 si es diferente de vacio
    }
  
    if (q8 === "") {
      q8.style.display = "none"; // Ocultar q8 si es igual a vacio 
    } else {
      q8.style.display = ""; // Mostrar q8 si es diferente de vacio
    }
}

  
  /////////// APARTADO 3

  
  function backApartado3() { // Anterior 3. ENFERMEDAD
    document.getElementById("div_3").style.display = ""; // Mostrar apartado 3. ENFERMEDAD
    document.getElementById("div_4").style.display = "none"; // Ocultar apartado 4. EDAD

    document.getElementById('question_13').value = ""; // Limpiar select pregunta 13
    document.getElementById('question_14').value = ""; // Limpiar select pregunta 14
    document.getElementById('question_15').value = ""; // Limpiar select pregunta 15
    document.getElementById('question_16').value = ""; // Limpiar select pregunta 16

    document.getElementById("div-b&n3").style.display = ""; // Mostrar division boton Siguiente 3
    document.getElementById("btn-back3").style.display = ""; // Mostrar boton Anterior 3
    document.getElementById("btn-next3").style.display = ""; // Mostrar boton Siguiente 3

    document.getElementById("div-b&n4").style.display = "none"; // Ocultar division boton Anterior / Siguiente 4

    // console.log(document.getElementById('question_9').value);
    // console.log(document.getElementById('question_10').value);
    // console.log(document.getElementById('question_11').value);
    // console.log(document.getElementById('question_12').value);
    
    // var q9 = document.getElementById('question_9').value; // Obtener valor Pregunta 9
    var q10 = document.getElementById('question_10').value; // Obtener valor Pregunta 10
    var q11 = document.getElementById('question_11').value; // Obtener valor Pregunta 11
    var q12 = document.getElementById('question_12').value; // Obtener valor Pregunta 12

    // if (q9 === "") {
    //   q9.style.display = ""; // Mostrar q9 si es igual a vacio 
    // } else {
    //   q9.style.display = ""; // Mostrar q9 si es diferente de vacio
    // }

    if (q10 === "") {
      q10.style.display = "none"; // Ocultar q10 si es igual a vacio 
    } else {
      q10.style.display = ""; // Mostrar q10 si es diferente de vacio
    }

    if (q11 === "") {
      q11.style.display = "none"; // Ocultar q11 si es igual a vacio 
    } else {
      q11.style.display = ""; // Mostrar q11 si es diferente de vacio
    }
  
    if (q12 === "") {
      q12.style.display = "none"; // Ocultar q12 si es igual a vacio 
    } else {
      q12.style.display = ""; // Mostrar q12 si es diferente de vacio
    }
}


 /////////// APARTADO 4

  
 function backApartado4() { // Anterior 4. EDAD
  document.getElementById("div_4").style.display = ""; // Mostrar apartado 4. EDAD
  document.getElementById("div_5").style.display = "none"; // Ocultar apartado 5. PSICOPATOLOGIA

  document.getElementById('question_17').value = ""; // Limpiar select pregunta 17
  document.getElementById('question_18').value = ""; // Limpiar select pregunta 18
  document.getElementById('question_19').value = ""; // Limpiar select pregunta 19
  document.getElementById('question_20').value = ""; // Limpiar select pregunta 20

  document.getElementById("div-b&n4").style.display = ""; // Mostrar division boton Siguiente 4
  document.getElementById("btn-back4").style.display = ""; // Mostrar boton Anterior 4
  document.getElementById("btn-next4").style.display = ""; // Mostrar boton Siguiente 4

  document.getElementById("div-b&n5").style.display = "none"; // Ocultar division boton Anterior / Siguiente 5

  // console.log(document.getElementById('question_13').value);
  // console.log(document.getElementById('question_14').value);
  // console.log(document.getElementById('question_15').value);
  // console.log(document.getElementById('question_16').value);
  
  // var q13 = document.getElementById('question_13').value; // Obtener valor Pregunta 13
  var q14 = document.getElementById('question_14').value; // Obtener valor Pregunta 14
  var q15 = document.getElementById('question_15').value; // Obtener valor Pregunta 15
  var q16 = document.getElementById('question_16').value; // Obtener valor Pregunta 16

  // if (q13 === "") {
  //   q13.style.display = ""; // Mostrar q13 si es igual a vacio 
  // } else {
  //   q13.style.display = ""; // Mostrar q13 si es diferente de vacio
  // }

  if (q14 === "") {
    q14.style.display = "none"; // Ocultar q14 si es igual a vacio 
  } else {
    q14.style.display = ""; // Mostrar q14 si es diferente de vacio
  }

  if (q15 === "") {
    q15.style.display = "none"; // Ocultar q15 si es igual a vacio 
  } else {
    q15.style.display = ""; // Mostrar q15 si es diferente de vacio
  }

  if (q16 === "") {
    q16.style.display = "none"; // Ocultar q16 si es igual a vacio 
  } else {
    q16.style.display = ""; // Mostrar q16 si es diferente de vacio
  }
}

  