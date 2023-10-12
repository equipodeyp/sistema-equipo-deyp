

<script>




function nextApartado13() { // Siguiente 13
  document.getElementById("div_12").style.display = "none"; // Ocultar apartado 12
  document.getElementById("div_13").style.display = ""; // Mostrar apartado 13


  document.getElementById("div-b&n12").style.display = "none"; // Ocultar division boton Anterior / Siguiente 12
  document.getElementById("div-b&n13").style.display = ""; // Mostrar division boton Anterior / Siguiente 13


   // var q49 = document.getElementById('question_49').value; // Obtener valor Pregunta 49
   var q50 = document.getElementById('question_50').value; // Obtener valor Pregunta 50
   var q51 = document.getElementById('question_51').value; // Obtener valor Pregunta 51
   var q52 = document.getElementById('question_52').value; // Obtener valor Pregunta 52


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



</script>