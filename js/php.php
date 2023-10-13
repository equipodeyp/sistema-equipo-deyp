

<script>

var question5 = document.getElementById('question_5'); // Obtener valor Pregunta 5
 var respuesta_q5 = '';
 
 question5.addEventListener('change', obtenerInfo5);
 
     function obtenerInfo5(e) {
     respuesta_q5 = e.target.value;
 
     if (respuesta_q5 === "Si") { // Si el valor de Pregunta 5 es igual Si
 
         document.getElementById('q6').style.display = ""; // Mostrar division Pregunta 6
         document.getElementById('q7').style.display = "none"; // Ocultar division Pregunta 7
         document.getElementById('q8').style.display = "none"; // Ocultar division Pregunta 8
 
         document.getElementById('question_6').value = ""; // Limpia select Pregunta 6
         document.getElementById('question_7').value = ""; // Limpia select Pregunta 7
         document.getElementById('question_8').value = ""; // Limpia select Pregunta 8
 
         document.getElementById("div-b&n2").style.display = ""; // Mostrar division boton Siguiente 2  
         document.getElementById("btn-back2").style.display = ""; // Mostrar boton Anterior 2 *********************
         document.getElementById("btn-next2").style.display = "none"; // Ocultar boton Siguiente 2
         
     }
 
     else if (respuesta_q5 === "No"){
 
         document.getElementById('q6').style.display = "none";  // Ocultar division Pregunta 6
         document.getElementById('q7').style.display = "none";  // Ocultar division Pregunta 7
         document.getElementById('q8').style.display = "none";  // Ocultar division Pregunta 8
 
         document.getElementById('question_6').value = ""; // Limpia select Pregunta 6
         document.getElementById('question_7').value = ""; // Limpia select Pregunta 7
         document.getElementById('question_8').value = ""; // Limpia select Pregunta 8
 
         document.getElementById("div-b&n2").style.display = ""; // Mostrar division boton Siguiente 2
         document.getElementById("btn-back2").style.display = ""; // Mostrar boton Anterior 2
         document.getElementById("btn-next2").style.display = ""; // Mostrar boton Siguiente 2
 
         }
     }
 
 
 
 var question6 = document.getElementById('question_6'); // Obtener valor Pregunta 6
 var respuesta_q6 = '';
 
 question6.addEventListener('change', obtenerInfo6);
 
     function obtenerInfo6(e) {
     respuesta_q6 = e.target.value;
 
     if (respuesta_q6 === "Si") { //Si el valor de Pregunta 6 es igual Si
 
         document.getElementById('q7').style.display = "none"; // Ocultar division Pregunta 7
         document.getElementById('q8').style.display = "none"; // Ocultar division Pregunta 8
 
         document.getElementById('question_7').value = ""; // Limpia select Pregunta 7
         document.getElementById('question_8').value = ""; // Limpia select Pregunta 8
 
         document.getElementById("div-b&n2").style.display = ""; // Mostrar division boton Siguiente 2
         document.getElementById("btn-back2").style.display = ""; // Mostrar boton Anterior 2
         document.getElementById("btn-next2").style.display = ""; // Mostrar boton Siguiente 2

 
     }
 
     else if (respuesta_q6 === "No"){
         
         document.getElementById('q7').style.display = "";  // Mostrar division Pregunta 7
         document.getElementById('q8').style.display = "none"; // Ocultar division Pregunta 8
 
         document.getElementById('question_8').value = ""; // Limpiar select Pregunta 8
         
         document.getElementById("div-b&n2").style.display = ""; // Mostrar division boton Siguiente 2  
         document.getElementById("btn-back2").style.display = ""; // Mostrar boton Anterior 2 *********************
         document.getElementById("btn-next2").style.display = "none"; // Ocultar boton Siguiente 2
 
         }
     }
 





</script>

<script>

    document.getElementById("q6").style.display = "none"; // Ocultar division q6  ***************
    document.getElementById("q7").style.display = "none"; // Ocultar division q7
    document.getElementById("q8").style.display = "none"; // Ocultar division q8

    if (q5 === "") {
      document.getElementById("div-b&n2").style.display = ""; // Mostrar boton Anterior / Siguiente 1 **********
      document.getElementById("btn-back2").style.display = ""; // Mostrar boton Anterior 2
      document.getElementById("btn-next2").style.display = "none"; // Ocultar boton Siguiente 2
    } else {
      
    }





</script>