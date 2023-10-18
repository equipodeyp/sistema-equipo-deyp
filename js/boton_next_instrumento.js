

 function nextApartado2() { // Siguiente 2. DISCAPACIDAD
    document.getElementById("div_1").style.display = "none"; // Ocultar apartado 1. ADICCIONES
    document.getElementById("div_2").style.display = ""; // Mostrar apartado 2. DISCAPACIDAD

    document.getElementById("div-b&n1").style.display = "none"; // Ocultar boton Siguiente 1
    document.getElementById("div-b&n2").style.display = ""; // Mostrar boton Anterior / Siguiente 1

    var q5 = document.getElementById('question_5').value; // Obtener valor Pregunta 5 
    var q6 = document.getElementById('question_6').value; // Obtener valor Pregunta 6
    var q7 = document.getElementById('question_7').value; // Obtener valor Pregunta 7
    var q8 = document.getElementById('question_8').value; // Obtener valor Pregunta 8

    document.getElementById("q6").style.display = "none"; // Ocultar division q6  ***************
    document.getElementById("q7").style.display = "none"; // Ocultar division q7
    document.getElementById("q8").style.display = "none"; // Ocultar division q8

    if (q5 === "") {
      document.getElementById("div-b&n2").style.display = ""; // Mostrar boton Anterior / Siguiente 2 **********
      document.getElementById("btn-back2").style.display = ""; // Mostrar boton Anterior 2
      document.getElementById("btn-next2").style.display = "none"; // Ocultar boton Siguiente 2
    } else {
      
    }

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





function nextApartado3() { // Siguiente 3. ENFERMEDAD
  document.getElementById("div_2").style.display = "none"; // Ocultar apartado 2. DISCAPACIDAD
  document.getElementById("div_3").style.display = ""; // Mostrar apartado 3. ENFERMEDAD

  document.getElementById("div-b&n2").style.display = "none"; // Ocultar division boton Anterior / Siguiente 2 
  document.getElementById("div-b&n3").style.display = ""; // Mostrar division boton Anterior / Siguiente 3 

  document.getElementById("btn-back3").style.display = ""; // Mostrar boton Anterior 3 ***********
  document.getElementById("btn-next3").style.display = "none"; // Ocultar boton Siguiente 3


   var q9 = document.getElementById('question_9').value; // Obtener valor Pregunta 9
   var q10 = document.getElementById('question_10').value; // Obtener valor Pregunta 10
   var q11 = document.getElementById('question_11').value; // Obtener valor Pregunta 11
   var q12 = document.getElementById('question_12').value; // Obtener valor Pregunta 12

   document.getElementById("q10").style.display = "none"; // Ocultar division q10  ***************
   document.getElementById("q11").style.display = "none"; // Ocultar division q11
   document.getElementById("q12").style.display = "none"; // Ocultar division q12

   if (q9 === "") {
     document.getElementById("div-b&n3").style.display = ""; // Mostrar boton Anterior / Siguiente 3 **********
     document.getElementById("btn-back3").style.display = ""; // Mostrar boton Anterior 3
     document.getElementById("btn-next3").style.display = "none"; // Ocultar boton Siguiente 3
   } else {
     
   }


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




function nextApartado4() { // Siguiente 4. EDAD 
  document.getElementById("div_3").style.display = "none"; // Ocultar apartado 3. ENFERMEDAD
  document.getElementById("div_4").style.display = ""; // Mostrar apartado 4. EDAD

  document.getElementById("div-b&n3").style.display = "none"; // Ocultar division boton Anterior / Siguiente 3
  document.getElementById("div-b&n4").style.display = ""; // Mostrar division boton Anterior / Siguiente 4

  document.getElementById("btn-back4").style.display = ""; // Mostrar boton Anterior 4 ***********
  document.getElementById("btn-next4").style.display = "none"; // Ocultar boton Siguiente 4


   var q13 = document.getElementById('question_13').value; // Obtener valor Pregunta 13
   var q14 = document.getElementById('question_14').value; // Obtener valor Pregunta 14
   var q15 = document.getElementById('question_15').value; // Obtener valor Pregunta 15
   var q16 = document.getElementById('question_16').value; // Obtener valor Pregunta 16

   document.getElementById("q14").style.display = "none"; // Ocultar division q14  ***************
   document.getElementById("q15").style.display = "none"; // Ocultar division q15
   document.getElementById("q16").style.display = "none"; // Ocultar division q16

   if (q13 === "") {
     document.getElementById("div-b&n4").style.display = ""; // Mostrar boton Anterior / Siguiente 4 **********
     document.getElementById("btn-back4").style.display = ""; // Mostrar boton Anterior 4
     document.getElementById("btn-next4").style.display = "none"; // Ocultar boton Siguiente 4
   } else {
     
   }



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


function nextApartado5() { // Siguiente 5. PSICOPATOLOGIA
  document.getElementById("div_4").style.display = "none"; // Ocultar apartado 4. EDAD
  document.getElementById("div_5").style.display = ""; // Mostrar apartado 5. PSICOPATOLOGIA

  document.getElementById("div-b&n4").style.display = "none"; // Ocultar division boton Anterior / Siguiente 4
  document.getElementById("div-b&n5").style.display = ""; // Mostrar division boton Anterior / Siguiente 5

  document.getElementById("btn-back5").style.display = ""; // Mostrar boton Anterior 5 ***********
  document.getElementById("btn-next5").style.display = "none"; // Ocultar boton Siguiente 5


   var q17 = document.getElementById('question_17').value; // Obtener valor Pregunta 17
   var q18 = document.getElementById('question_18').value; // Obtener valor Pregunta 18
   var q19 = document.getElementById('question_19').value; // Obtener valor Pregunta 19
   var q20 = document.getElementById('question_20').value; // Obtener valor Pregunta 20

   document.getElementById("q18").style.display = "none"; // Ocultar division q18  ***************
   document.getElementById("q19").style.display = "none"; // Ocultar division q19
   document.getElementById("q20").style.display = "none"; // Ocultar division q20

   if (q17 === "") {
     document.getElementById("div-b&n5").style.display = ""; // Mostrar boton Anterior / Siguiente 5 **********
     document.getElementById("btn-back5").style.display = ""; // Mostrar boton Anterior 5
     document.getElementById("btn-next5").style.display = "none"; // Ocultar boton Siguiente 5
   } else {
     
   }



   if (q18 === "") {
    q18.style.display = "none"; // Ocultar q18 si es igual a vacio 
  } else {
    q18.style.display = ""; // Mostrar q18 si es diferente de vacio
  }

  if (q19 === "") {
    q19.style.display = "none"; // Ocultar q19 si es igual a vacio 
  } else {
    q19.style.display = ""; // Mostrar q19 si es diferente de vacio
  }

  if (q20 === "") {
    q20.style.display = "none"; // Ocultar q20 si es igual a vacio 
  } else {
    q20.style.display = ""; // Mostrar q20 si es diferente de vacio
  }


}





function nextApartado6() { // Siguiente 6. PERSONALIDAD
  document.getElementById("div_5").style.display = "none"; // Ocultar apartado 5. PSICOPATOLOGIA
  document.getElementById("div_6").style.display = ""; // Mostrar apartado 6. PERSONALIDAD


  document.getElementById("div-b&n5").style.display = "none"; // Ocultar division boton Anterior / Siguiente 5
  document.getElementById("div-b&n6").style.display = ""; // Mostrar division boton Anterior / Siguiente 6


  document.getElementById("btn-back6").style.display = ""; // Mostrar boton Anterior 6 ***********
  document.getElementById("btn-next6").style.display = "none"; // Ocultar boton Siguiente 6


   var q21 = document.getElementById('question_21').value; // Obtener valor Pregunta 21
   var q22 = document.getElementById('question_22').value; // Obtener valor Pregunta 22
   var q23 = document.getElementById('question_23').value; // Obtener valor Pregunta 23
   var q24 = document.getElementById('question_24').value; // Obtener valor Pregunta 24

   document.getElementById("q22").style.display = "none"; // Ocultar division q22  ***************
   document.getElementById("q23").style.display = "none"; // Ocultar division q23
   document.getElementById("q24").style.display = "none"; // Ocultar division q24

   if (q21 === "") {
     document.getElementById("div-b&n6").style.display = ""; // Mostrar boton Anterior / Siguiente 6 **********
     document.getElementById("btn-back6").style.display = ""; // Mostrar boton Anterior 6
     document.getElementById("btn-next6").style.display = "none"; // Ocultar boton Siguiente 6
   } else {
     
   }



   if (q22 === "") {
    q22.style.display = "none"; // Ocultar q22 si es igual a vacio 
  } else {
    q22.style.display = ""; // Mostrar q22 si es diferente de vacio
  }

  if (q23 === "") {
    q23.style.display = "none"; // Ocultar q23 si es igual a vacio 
  } else {
    q23.style.display = ""; // Mostrar q23 si es diferente de vacio
  }

  if (q24 === "") {
    q24.style.display = "none"; // Ocultar q24 si es igual a vacio 
  } else {
    q24.style.display = ""; // Mostrar q24 si es diferente de vacio
  }


}


  /////////// APARTADO 7
//////////// 7. SALUD MENTAL

function nextApartado7() { // Siguiente 7
  document.getElementById("div_6").style.display = "none"; // Ocultar apartado 6
  document.getElementById("div_7").style.display = ""; // Mostrar apartado 7


  document.getElementById("div-b&n6").style.display = "none"; // Ocultar division boton Anterior / Siguiente 6
  document.getElementById("div-b&n7").style.display = ""; // Mostrar division boton Anterior / Siguiente 7


  document.getElementById("btn-back7").style.display = ""; // Mostrar boton Anterior 7 ***********
  document.getElementById("btn-next7").style.display = "none"; // Ocultar boton Siguiente 7


   var q25 = document.getElementById('question_25').value; // Obtener valor Pregunta 25
   var q26 = document.getElementById('question_26').value; // Obtener valor Pregunta 26
   var q27 = document.getElementById('question_27').value; // Obtener valor Pregunta 27
   var q28 = document.getElementById('question_28').value; // Obtener valor Pregunta 28

   document.getElementById("q26").style.display = "none"; // Ocultar division q26  ***************
   document.getElementById("q27").style.display = "none"; // Ocultar division q27
   document.getElementById("q28").style.display = "none"; // Ocultar division q28

   if (q25 === "") {
     document.getElementById("div-b&n7").style.display = ""; // Mostrar boton Anterior / Siguiente 7 **********
     document.getElementById("btn-back7").style.display = ""; // Mostrar boton Anterior 7
     document.getElementById("btn-next7").style.display = "none"; // Ocultar boton Siguiente 7
   } else {
     
   }



   if (q26 === "") {
    q26.style.display = "none"; // Ocultar q26 si es igual a vacio 
  } else {
    q26.style.display = ""; // Mostrar q26 si es diferente de vacio
  }

  if (q27 === "") {
    q27.style.display = "none"; // Ocultar q27 si es igual a vacio 
  } else {
    q27.style.display = ""; // Mostrar q27 si es diferente de vacio
  }

  if (q28 === "") {
    q28.style.display = "none"; // Ocultar q28 si es igual a vacio 
  } else {
    q28.style.display = ""; // Mostrar q28 si es diferente de vacio
  }


}

  /////////// APARTADO 8
////////////  8. EDUCATIVO Y LABORAL

function nextApartado8() { // Siguiente 8
  document.getElementById("div_7").style.display = "none"; // Ocultar apartado 7
  document.getElementById("div_8").style.display = ""; // Mostrar apartado 8


  document.getElementById("div-b&n7").style.display = "none"; // Ocultar division boton Anterior / Siguiente 7
  document.getElementById("div-b&n8").style.display = ""; // Mostrar division boton Anterior / Siguiente 8


  document.getElementById("btn-back8").style.display = ""; // Mostrar boton Anterior 8 ***********
  document.getElementById("btn-next8").style.display = "none"; // Ocultar boton Siguiente 8


   var q29 = document.getElementById('question_29').value; // Obtener valor Pregunta 29
   var q30 = document.getElementById('question_30').value; // Obtener valor Pregunta 30
   var q31 = document.getElementById('question_31').value; // Obtener valor Pregunta 31
   var q32 = document.getElementById('question_32').value; // Obtener valor Pregunta 32

   document.getElementById("q30").style.display = "none"; // Ocultar division q30  ***************
   document.getElementById("q31").style.display = "none"; // Ocultar division q31
   document.getElementById("q32").style.display = "none"; // Ocultar division q32

   if (q29 === "") {
     document.getElementById("div-b&n8").style.display = ""; // Mostrar boton Anterior / Siguiente 8 **********
     document.getElementById("btn-back8").style.display = ""; // Mostrar boton Anterior 8
     document.getElementById("btn-next8").style.display = "none"; // Ocultar boton Siguiente 8
   } else {
     
   }



   if (q30 === "") {
    q30.style.display = "none"; // Ocultar q30 si es igual a vacio 
  } else {
    q30.style.display = ""; // Mostrar q30 si es diferente de vacio
  }

  if (q31 === "") {
    q31.style.display = "none"; // Ocultar q31 si es igual a vacio 
  } else {
    q31.style.display = ""; // Mostrar q31 si es diferente de vacio
  }

  if (q32 === "") {
    q32.style.display = "none"; // Ocultar q32 si es igual a vacio 
  } else {
    q32.style.display = ""; // Mostrar q32 si es diferente de vacio
  }


}

  /////////// APARTADO 9 
//////////// 9. FAMILIA

function nextApartado9() { // Siguiente 9
  document.getElementById("div_8").style.display = "none"; // Ocultar apartado 8
  document.getElementById("div_9").style.display = ""; // Mostrar apartado 9


  document.getElementById("div-b&n8").style.display = "none"; // Ocultar division boton Anterior / Siguiente 8
  document.getElementById("div-b&n9").style.display = ""; // Mostrar division boton Anterior / Siguiente 9


  document.getElementById("btn-back9").style.display = ""; // Mostrar boton Anterior 9 ***********
  document.getElementById("btn-next9").style.display = "none"; // Ocultar boton Siguiente 9


   var q33 = document.getElementById('question_33').value; // Obtener valor Pregunta 33
   var q34 = document.getElementById('question_34').value; // Obtener valor Pregunta 34
   var q35 = document.getElementById('question_35').value; // Obtener valor Pregunta 35
   var q36 = document.getElementById('question_36').value; // Obtener valor Pregunta 36

   document.getElementById("q34").style.display = "none"; // Ocultar division q34  ***************
   document.getElementById("q35").style.display = "none"; // Ocultar division q35
   document.getElementById("q36").style.display = "none"; // Ocultar division q36

   if (q33 === "") {
     document.getElementById("div-b&n9").style.display = ""; // Mostrar boton Anterior / Siguiente 9 **********
     document.getElementById("btn-back9").style.display = ""; // Mostrar boton Anterior 9
     document.getElementById("btn-next9").style.display = "none"; // Ocultar boton Siguiente 9
   } else {
     
   }



   if (q34 === "") {
    q34.style.display = "none"; // Ocultar q34 si es igual a vacio 
  } else {
    q34.style.display = ""; // Mostrar q34 si es diferente de vacio
  }

  if (q35 === "") {
    q35.style.display = "none"; // Ocultar q35 si es igual a vacio 
  } else {
    q35.style.display = ""; // Mostrar q35 si es diferente de vacio
  }

  if (q36 === "") {
    q36.style.display = "none"; // Ocultar q36 si es igual a vacio 
  } else {
    q36.style.display = ""; // Mostrar q36 si es diferente de vacio
  }


}

  /////////// APARTADO 10
//////////// 10. ECONÓMICO


function nextApartado10() { // Siguiente 10
  document.getElementById("div_9").style.display = "none"; // Ocultar apartado 9
  document.getElementById("div_10").style.display = ""; // Mostrar apartado 10


  document.getElementById("div-b&n9").style.display = "none"; // Ocultar division boton Anterior / Siguiente 9
  document.getElementById("div-b&n10").style.display = ""; // Mostrar division boton Anterior / Siguiente 10


  document.getElementById("btn-back10").style.display = ""; // Mostrar boton Anterior 10 ***********
  document.getElementById("btn-next10").style.display = "none"; // Ocultar boton Siguiente 10


   var q37 = document.getElementById('question_37').value; // Obtener valor Pregunta 37
   var q38 = document.getElementById('question_38').value; // Obtener valor Pregunta 38
   var q39 = document.getElementById('question_39').value; // Obtener valor Pregunta 39
   var q40 = document.getElementById('question_40').value; // Obtener valor Pregunta 40

   document.getElementById("q38").style.display = "none"; // Ocultar division q38  ***************
   document.getElementById("q39").style.display = "none"; // Ocultar division q39
   document.getElementById("q40").style.display = "none"; // Ocultar division q40

   if (q37 === "") {
     document.getElementById("div-b&n10").style.display = ""; // Mostrar boton Anterior / Siguiente 10 **********
     document.getElementById("btn-back10").style.display = ""; // Mostrar boton Anterior 10
     document.getElementById("btn-next10").style.display = "none"; // Ocultar boton Siguiente 10
   } else {
     
   }



   if (q38 === "") {
    q38.style.display = "none"; // Ocultar q38 si es igual a vacio 
  } else {
    q38.style.display = ""; // Mostrar q38 si es diferente de vacio
  }

  if (q39 === "") {
    q39.style.display = "none"; // Ocultar q39 si es igual a vacio 
  } else {
    q39.style.display = ""; // Mostrar q39 si es diferente de vacio
  }

  if (q40 === "") {
    q40.style.display = "none"; // Ocultar q40 si es igual a vacio 
  } else {
    q40.style.display = ""; // Mostrar q40 si es diferente de vacio
  }


}

  /////////// APARTADO 11
////////////  11. JICIO SOCIAL

function nextApartado11() { // Siguiente 11
  document.getElementById("div_10").style.display = "none"; // Ocultar apartado 10
  document.getElementById("div_11").style.display = ""; // Mostrar apartado 11


  document.getElementById("div-b&n10").style.display = "none"; // Ocultar division boton Anterior / Siguiente 10
  document.getElementById("div-b&n11").style.display = ""; // Mostrar division boton Anterior / Siguiente 11


  document.getElementById("btn-back11").style.display = ""; // Mostrar boton Anterior 11 ***********
  document.getElementById("btn-next11").style.display = "none"; // Ocultar boton Siguiente 11


   var q41 = document.getElementById('question_41').value; // Obtener valor Pregunta 41
   var q42 = document.getElementById('question_42').value; // Obtener valor Pregunta 42
   var q43 = document.getElementById('question_43').value; // Obtener valor Pregunta 43
   var q44 = document.getElementById('question_44').value; // Obtener valor Pregunta 44

   document.getElementById("q42").style.display = "none"; // Ocultar division q42  ***************
   document.getElementById("q43").style.display = "none"; // Ocultar division q43
   document.getElementById("q44").style.display = "none"; // Ocultar division q44

   if (q41 === "") {
     document.getElementById("div-b&n11").style.display = ""; // Mostrar boton Anterior / Siguiente 11 **********
     document.getElementById("btn-back11").style.display = ""; // Mostrar boton Anterior 11
     document.getElementById("btn-next11").style.display = "none"; // Ocultar boton Siguiente 11
   } else {
     
   }



   if (q42 === "") {
    q42.style.display = "none"; // Ocultar q42 si es igual a vacio 
  } else {
    q42.style.display = ""; // Mostrar q42 si es diferente de vacio
  }

  if (q43 === "") {
    q43.style.display = "none"; // Ocultar q43 si es igual a vacio 
  } else {
    q43.style.display = ""; // Mostrar q43 si es diferente de vacio
  }

  if (q44 === "") {
    q44.style.display = "none"; // Ocultar q44 si es igual a vacio 
  } else {
    q44.style.display = ""; // Mostrar q44 si es diferente de vacio
  }


}

  /////////// APARTADO 12
//////////// 12. FACTORES CRIMINOLÓGICOS

function nextApartado12() { // Siguiente 12
  document.getElementById("div_11").style.display = "none"; // Ocultar apartado 11
  document.getElementById("div_12").style.display = ""; // Mostrar apartado 12


  document.getElementById("div-b&n11").style.display = "none"; // Ocultar division boton Anterior / Siguiente 11
  document.getElementById("div-b&n12").style.display = ""; // Mostrar division boton Anterior / Siguiente 12

  document.getElementById("btn-back12").style.display = ""; // Mostrar boton Anterior 12 ***********
  document.getElementById("btn-next12").style.display = "none"; // Ocultar boton Siguiente 12


   var q45 = document.getElementById('question_45').value; // Obtener valor Pregunta 45
   var q46 = document.getElementById('question_46').value; // Obtener valor Pregunta 46
   var q47 = document.getElementById('question_47').value; // Obtener valor Pregunta 47
   var q48 = document.getElementById('question_48').value; // Obtener valor Pregunta 48

   document.getElementById("q46").style.display = "none"; // Ocultar division q46  ***************
   document.getElementById("q47").style.display = "none"; // Ocultar division q47
   document.getElementById("q48").style.display = "none"; // Ocultar division q48

   if (q45 === "") {
     document.getElementById("div-b&n12").style.display = ""; // Mostrar boton Anterior / Siguiente 12 **********
     document.getElementById("btn-back12").style.display = ""; // Mostrar boton Anterior 12
     document.getElementById("btn-next612").style.display = "none"; // Ocultar boton Siguiente 12
   } else {
     
   }



   if (q46 === "") {
    q46.style.display = "none"; // Ocultar q46 si es igual a vacio 
  } else {
    q46.style.display = ""; // Mostrar q46 si es diferente de vacio
  }

  if (q47 === "") {
    q47.style.display = "none"; // Ocultar q47 si es igual a vacio 
  } else {
    q47.style.display = ""; // Mostrar q47 si es diferente de vacio
  }

  if (q48 === "") {
    q48.style.display = "none"; // Ocultar q48 si es igual a vacio 
  } else {
    q48.style.display = ""; // Mostrar q48 si es diferente de vacio
  }


}

  /////////// APARTADO 13
//////////// 13. CLASIFICACIÓN VICTIMOLÓGICA


function nextApartado13() { // Siguiente 13
  document.getElementById("div_12").style.display = "none"; // Ocultar apartado 12
  document.getElementById("div_13").style.display = ""; // Mostrar apartado 13


  document.getElementById("div-b&n12").style.display = "none"; // Ocultar division boton Anterior / Siguiente 12
  document.getElementById("div-b&n13").style.display = ""; // Mostrar division boton Anterior / Siguiente 13

  document.getElementById("btn-back13").style.display = ""; // Mostrar boton Anterior 13 ***********
  document.getElementById("btn-next13").style.display = "none"; // Ocultar boton Siguiente 13


   var q49 = document.getElementById('question_49').value; // Obtener valor Pregunta 49
   var q50 = document.getElementById('question_50').value; // Obtener valor Pregunta 50
   var q51 = document.getElementById('question_51').value; // Obtener valor Pregunta 51
   var q52 = document.getElementById('question_52').value; // Obtener valor Pregunta 52

   document.getElementById("q50").style.display = "none"; // Ocultar division q50  ***************
   document.getElementById("q51").style.display = "none"; // Ocultar division q51
   document.getElementById("q52").style.display = "none"; // Ocultar division q52

   if (q49 === "") {
     document.getElementById("div-b&n13").style.display = ""; // Mostrar boton Anterior / Siguiente 13 **********
     document.getElementById("btn-back13").style.display = ""; // Mostrar boton Anterior 13
     document.getElementById("btn-next13").style.display = "none"; // Ocultar boton Siguiente 13
   } else {
     
   }



   if (q50 === "") {
    q50.style.display = "none"; // Ocultar q50 si es igual a vacio 
  } else {
    q50.style.display = ""; // Mostrar q50 si es diferente de vacio
  }

  if (q51 === "") {
    q51.style.display = "none"; // Ocultar q51 si es igual a vacio 
  } else {
    q51.style.display = ""; // Mostrar q51 si es diferente de vacio
  }

  if (q52 === "") {
    q52.style.display = "none"; // Ocultar q52 si es igual a vacio 
  } else {
    q52.style.display = ""; // Mostrar q52 si es diferente de vacio
  }


}
