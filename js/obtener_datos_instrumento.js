
var question1 = document.getElementById('question_1'); // Obtener valor Pregunta 1
var respuesta_q1 = '';

question1.addEventListener('change', obtenerInfo1);

    function obtenerInfo1(e) {
    respuesta_q1 = e.target.value;

    if (respuesta_q1 === "Si") { // Si el valor de Pregunta 1 es igual Si

        document.getElementById('q2').style.display = ""; // Mostrar division Pregunta 2
        document.getElementById('q3').style.display = "none"; // Ocultar division Pregunta 3
        document.getElementById('q4').style.display = "none"; // Ocultar division Pregunta 4

        document.getElementById('question_2').value = ""; // Limpia select Pregunta 2
        document.getElementById('question_3').value = ""; // Limpia select Pregunta 3
        document.getElementById('question_4').value = ""; // Limpia select Pregunta 4

        document.getElementById("div-b&n1").style.display = "none"; // Ocultar division boton Siguiente 1
        
    }

    else if (respuesta_q1 === "No"){

        document.getElementById('q2').style.display = "none";  // Ocultar division Pregunta 2
        document.getElementById('q3').style.display = "none";  // Ocultar division Pregunta 3
        document.getElementById('q4').style.display = "none";  // Ocultar division Pregunta 4

        document.getElementById('question_2').value = ""; // Limpia select Pregunta 2
        document.getElementById('question_3').value = ""; // Limpia select Pregunta 3
        document.getElementById('question_4').value = ""; // Limpia select Pregunta 4

        document.getElementById("div-b&n1").style.display = ""; // Mostrar division boton Siguiente 1

        document.getElementById("btn-next1").style.display = ""; // Mostrar boton Siguiente 1

        }
    }







var question2 = document.getElementById('question_2'); // Obtener valor Pregunta 2
var respuesta_q2 = '';

question2.addEventListener('change', obtenerInfo2);

    function obtenerInfo2(e) {
    respuesta_q2 = e.target.value;

    if (respuesta_q2 === "Si") { //Si el valor de Pregunta 2 es igual Si

        document.getElementById('q3').style.display = "none"; // Ocultar division Pregunta 3
        document.getElementById('q4').style.display = "none"; // Ocultar division Pregunta 4

        document.getElementById('question_3').value = ""; // Limpia select Pregunta 3
        document.getElementById('question_4').value = ""; // Limpia select Pregunta 4

        document.getElementById("div-b&n1").style.display = ""; // Mostrar division boton Siguiente 1

        document.getElementById("btn-next1").style.display = ""; // Mostrar boton Siguiente 1

    }

    else if (respuesta_q2 === "No"){
        
        document.getElementById('q3').style.display = "";  // Mostrar division Pregunta 3
        document.getElementById('q4').style.display = "none"; // Ocultar division Pregunta 4

        document.getElementById('question_4').value = ""; // Limpia select Pregunta 4
        
        document.getElementById("div-b&n1").style.display = "none"; // botones anterior y siguiente 1

        }
    }







var question3 = document.getElementById('question_3'); // Obtener valor Pregunta 3
var respuesta_q3 = '';

question3.addEventListener('change', obtenerInfo3);

    function obtenerInfo3(e) {
    respuesta_q3 = e.target.value;

    if (respuesta_q3 === "Si") {

        document.getElementById("div-b&n1").style.display = ""; // botones anterior y siguiente 1
        document.getElementById('q4').style.display = "none"; // pregunta 3
        document.getElementById('question_4').value = ""; //limpia select pregunta 3
        console.log(document.getElementById('question_4').value);

        }
    else if (respuesta_q3 === "No"){

        document.getElementById("div-b&n1").style.display = ""; // botones anterior y siguiente 1
        document.getElementById("btn-next1").style.display = ""; // botones anterior y siguiente 1
        document.getElementById('q4').style.display = ""; // pregunta 3
        document.getElementById('question_4').disabled = true; // deshabilitar select pregunta 
        document.getElementById('question_4').value = "Si"; //limpia select pregunta 3

        }
    }






