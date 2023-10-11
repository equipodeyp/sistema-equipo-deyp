 /////////// PREGUNTA 1 2 3 4   

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

        document.getElementById('question_4').value = ""; // Limpiar select Pregunta 4
        
        document.getElementById("div-b&n1").style.display = "none"; // Ocultar  division boton anterior y siguiente 1

        }
    }







var question3 = document.getElementById('question_3'); // Obtener valor Pregunta 3
var respuesta_q3 = '';

question3.addEventListener('change', obtenerInfo3);

    function obtenerInfo3(e) {
    respuesta_q3 = e.target.value;

    if (respuesta_q3 === "Si") {

        document.getElementById('q4').style.display = "none"; // Ocultar division Pregunta 4
        document.getElementById('question_4').value = ""; // Limpiar select pregunta 4

        document.getElementById("div-b&n1").style.display = ""; // Mostrar division anterior y siguiente 1

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    else if (respuesta_q3 === "No"){

        document.getElementById('q4').style.display = ""; // Mostrar division Pregunta 4
        document.getElementById('question_4').disabled = true; // Deshabilitar select pregunta 4
        document.getElementById('question_4').value = "Si"; // Asignar valor al select de la pregunta 4

        document.getElementById("div-b&n1").style.display = ""; // Mostrar division anterior y siguiente 1
        document.getElementById("btn-next1").style.display = ""; // Mostrar boton siguiente 1

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    }


 /////////// PREGUNTA 5 6 7 8   


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
 
         document.getElementById("div-b&n2").style.display = "none"; // Ocultar division boton Siguiente 2
         
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
         
         document.getElementById("div-b&n2").style.display = "none"; // Ocultar  division boton anterior y siguiente 2
         document.getElementById("btn-back2").style.display = "none"; // Ocultar boton Anterior 2
         document.getElementById("btn-next2").style.display = "none"; // Ocultar boton Siguiente 2
 
         }
     }
 
 
 
 var question7 = document.getElementById('question_7'); // Obtener valor Pregunta 7
 var respuesta_q7 = '';
 
 question7.addEventListener('change', obtenerInfo7);
 
     function obtenerInfo7(e) {
     respuesta_q7 = e.target.value;
 
     if (respuesta_q7 === "Si") {
 
         document.getElementById('q8').style.display = "none"; // Ocultar division Pregunta 8
         document.getElementById('question_8').value = ""; // Limpiar select pregunta 8
 
         document.getElementById("div-b&n2").style.display = ""; // Mostrar division anterior y siguiente 2
         document.getElementById("btn-back2").style.display = ""; // Mostrar boton Anterior 2
         document.getElementById("btn-next2").style.display = ""; // Mostrar boton Siguiente 2
 
         // console.log(document.getElementById('question_3').value);
         // console.log(document.getElementById('question_4').value);
 
         }
     else if (respuesta_q7 === "No"){
 
         document.getElementById('q8').style.display = ""; // Mostrar division Pregunta 8
         document.getElementById('question_8').disabled = true; // Deshabilitar select pregunta 8
         document.getElementById('question_8').value = "Si"; // Asignar valor al select de la pregunta 8
 
         document.getElementById("div-b&n2").style.display = ""; // Mostrar division anterior y siguiente 2
         document.getElementById("btn-back2").style.display = ""; // Mostrar boton Anterior 2
         document.getElementById("btn-next2").style.display = ""; // Mostrar boton Siguiente 2
   
 
         // console.log(document.getElementById('question_3').value);
         // console.log(document.getElementById('question_4').value);
 
         }
     }


 /////////// PREGUNTA 9 10 11 12


 var question9 = document.getElementById('question_9'); // Obtener valor Pregunta 9
 var respuesta_q9 = '';
 
 question9.addEventListener('change', obtenerInfo9);
 
     function obtenerInfo9(e) {
     respuesta_q9 = e.target.value;
 
     if (respuesta_q9 === "Si") { // Si el valor de Pregunta 9 es igual Si
 
         document.getElementById('q10').style.display = ""; // Mostrar division Pregunta 10
         document.getElementById('q11').style.display = "none"; // Ocultar division Pregunta 11
         document.getElementById('q12').style.display = "none"; // Ocultar division Pregunta 12
 
         document.getElementById('question_10').value = ""; // Limpia select Pregunta 10
         document.getElementById('question_11').value = ""; // Limpia select Pregunta 11
         document.getElementById('question_12').value = ""; // Limpia select Pregunta 12
 
         document.getElementById("div-b&n3").style.display = "none"; // Ocultar division boton Siguiente 3
         
     }
 
     else if (respuesta_q9 === "No"){
 
         document.getElementById('q10').style.display = "none";  // Ocultar division Pregunta 10
         document.getElementById('q11').style.display = "none";  // Ocultar division Pregunta 11
         document.getElementById('q12').style.display = "none";  // Ocultar division Pregunta 12
 
         document.getElementById('question_10').value = ""; // Limpia select Pregunta 10
         document.getElementById('question_11').value = ""; // Limpia select Pregunta 11
         document.getElementById('question_12').value = ""; // Limpia select Pregunta 12
 
         document.getElementById("div-b&n3").style.display = ""; // Mostrar division boton Siguiente 3
         document.getElementById("btn-back3").style.display = ""; // Mostrar boton Anterior 3
         document.getElementById("btn-next3").style.display = ""; // Mostrar boton Siguiente 3
 
         }
     }
 


 
 
 var question10 = document.getElementById('question_10'); // Obtener valor Pregunta 10
 var respuesta_q10 = '';
 
 question10.addEventListener('change', obtenerInfo10);
 
     function obtenerInfo10(e) {
     respuesta_q10 = e.target.value;
 
     if (respuesta_q10 === "Si") { //Si el valor de Pregunta 10 es igual Si
 
         document.getElementById('q11').style.display = "none"; // Ocultar division Pregunta 11
         document.getElementById('q12').style.display = "none"; // Ocultar division Pregunta 12
 
         document.getElementById('question_11').value = ""; // Limpia select Pregunta 11
         document.getElementById('question_12').value = ""; // Limpia select Pregunta 12
 
         document.getElementById("div-b&n3").style.display = ""; // Mostrar division boton Siguiente 3
         document.getElementById("btn-back3").style.display = ""; // Mostrar boton Anterior 3
         document.getElementById("btn-next3").style.display = ""; // Mostrar boton Siguiente 3

 
     }
 
     else if (respuesta_q10 === "No"){
         
         document.getElementById('q11').style.display = "";  // Mostrar division Pregunta 11
         document.getElementById('q12').style.display = "none"; // Ocultar division Pregunta 12
 
         document.getElementById('question_12').value = ""; // Limpiar select Pregunta 12
         
         document.getElementById("div-b&n3").style.display = "none"; // Ocultar  division boton anterior y siguiente 3
         document.getElementById("btn-back3").style.display = "none"; // Ocultar boton Anterior 3
         document.getElementById("btn-next3").style.display = "none"; // Ocultar boton Siguiente 3
 
         }
     }
 
 


 
 var question11 = document.getElementById('question_11'); // Obtener valor Pregunta 11
 var respuesta_q11 = '';
 
 question11.addEventListener('change', obtenerInfo11);
 
     function obtenerInfo11(e) {
     respuesta_q11 = e.target.value;
 
     if (respuesta_q11 === "Si") {
 
         document.getElementById('q12').style.display = "none"; // Ocultar division Pregunta 12
         document.getElementById('question_12').value = ""; // Limpiar select pregunta 12
 
         document.getElementById("div-b&n3").style.display = ""; // Mostrar division anterior y siguiente 3
         document.getElementById("btn-back3").style.display = ""; // Mostrar boton Anterior 3
         document.getElementById("btn-next3").style.display = ""; // Mostrar boton Siguiente 3
 
         // console.log(document.getElementById('question_3').value);
         // console.log(document.getElementById('question_4').value);
 
         }
     else if (respuesta_q11 === "No"){
 
         document.getElementById('q12').style.display = ""; // Mostrar division Pregunta 12
         document.getElementById('question_12').disabled = true; // Deshabilitar select pregunta 12
         document.getElementById('question_12').value = "Si"; // Asignar valor al select de la pregunta 12
 
         document.getElementById("div-b&n3").style.display = ""; // Mostrar division anterior y siguiente 3
         document.getElementById("btn-back3").style.display = ""; // Mostrar boton Anterior 3
         document.getElementById("btn-next3").style.display = ""; // Mostrar boton Siguiente 3
   
 
         // console.log(document.getElementById('question_3').value);
         // console.log(document.getElementById('question_4').value);
 
         }
     }


 /////////// PREGUNTA 13 14 15 16

 var question13 = document.getElementById('question_13'); // Obtener valor Pregunta 13
 var respuesta_q13 = '';
 
 question13.addEventListener('change', obtenerInfo13);
 
     function obtenerInfo13(e) {
     respuesta_q13 = e.target.value;
 
     if (respuesta_q13 === "Si") { // Si el valor de Pregunta 13 es igual Si
 
         document.getElementById('q14').style.display = ""; // Mostrar division Pregunta 14
         document.getElementById('q15').style.display = "none"; // Ocultar division Pregunta 15
         document.getElementById('q16').style.display = "none"; // Ocultar division Pregunta 16
 
         document.getElementById('question_14').value = ""; // Limpia select Pregunta 14
         document.getElementById('question_15').value = ""; // Limpia select Pregunta 15
         document.getElementById('question_16').value = ""; // Limpia select Pregunta 16
 
         document.getElementById("div-b&n4").style.display = "none"; // Ocultar division boton Siguiente 4
         
     }
 
     else if (respuesta_q13 === "No"){
 
         document.getElementById('q14').style.display = "none";  // Ocultar division Pregunta 14
         document.getElementById('q15').style.display = "none";  // Ocultar division Pregunta 15
         document.getElementById('q16').style.display = "none";  // Ocultar division Pregunta 16
 
         document.getElementById('question_14').value = ""; // Limpia select Pregunta 14
         document.getElementById('question_15').value = ""; // Limpia select Pregunta 15
         document.getElementById('question_16').value = ""; // Limpia select Pregunta 16
 
         document.getElementById("div-b&n4").style.display = ""; // Mostrar division boton Siguiente 4
         document.getElementById("btn-back4").style.display = ""; // Mostrar boton Anterior 4
         document.getElementById("btn-next4").style.display = ""; // Mostrar boton Siguiente 4
 
         }
     }
 


 
 
 var question14 = document.getElementById('question_14'); // Obtener valor Pregunta 14
 var respuesta_q14 = '';
 
 question14.addEventListener('change', obtenerInfo14);
 
     function obtenerInfo14(e) {
     respuesta_q14 = e.target.value;
 
     if (respuesta_q14 === "Si") { //Si el valor de Pregunta 14 es igual Si
 
         document.getElementById('q15').style.display = "none"; // Ocultar division Pregunta 15
         document.getElementById('q16').style.display = "none"; // Ocultar division Pregunta 16
 
         document.getElementById('question_15').value = ""; // Limpia select Pregunta 15
         document.getElementById('question_16').value = ""; // Limpia select Pregunta 16
 
         document.getElementById("div-b&n4").style.display = ""; // Mostrar division boton Siguiente 4
         document.getElementById("btn-back4").style.display = ""; // Mostrar boton Anterior 4
         document.getElementById("btn-next4").style.display = ""; // Mostrar boton Siguiente 4

 
     }
 
     else if (respuesta_q14 === "No"){
         
         document.getElementById('q15').style.display = "";  // Mostrar division Pregunta 15
         document.getElementById('q16').style.display = "none"; // Ocultar division Pregunta 16
 
         document.getElementById('question_16').value = ""; // Limpiar select Pregunta 16
         
         document.getElementById("div-b&n4").style.display = "none"; // Ocultar  division boton anterior y siguiente 4
         document.getElementById("btn-back4").style.display = "none"; // Ocultar boton Anterior 4
         document.getElementById("btn-next4").style.display = "none"; // Ocultar boton Siguiente 4
 
         }
     }
 
 


 
 var question15 = document.getElementById('question_15'); // Obtener valor Pregunta 15
 var respuesta_q15 = '';
 
 question15.addEventListener('change', obtenerInfo15);
 
     function obtenerInfo15(e) {
     respuesta_q15 = e.target.value;
 
     if (respuesta_q15 === "Si") {
 
         document.getElementById('q16').style.display = "none"; // Ocultar division Pregunta 16
         document.getElementById('question_16').value = ""; // Limpiar select pregunta 16
 
         document.getElementById("div-b&n4").style.display = ""; // Mostrar division anterior y siguiente 4
         document.getElementById("btn-back4").style.display = ""; // Mostrar boton Anterior 4
         document.getElementById("btn-next4").style.display = ""; // Mostrar boton Siguiente 4
 
         // console.log(document.getElementById('question_3').value);
         // console.log(document.getElementById('question_4').value);
 
         }
     else if (respuesta_q15 === "No"){
 
         document.getElementById('q16').style.display = ""; // Mostrar division Pregunta 16
         document.getElementById('question_16').disabled = true; // Deshabilitar select pregunta 16
         document.getElementById('question_16').value = "Si"; // Asignar valor al select de la pregunta 16
 
         document.getElementById("div-b&n4").style.display = ""; // Mostrar division anterior y siguiente 4
         document.getElementById("btn-back4").style.display = ""; // Mostrar boton Anterior 4
         document.getElementById("btn-next4").style.display = ""; // Mostrar boton Siguiente 4
   
 
         // console.log(document.getElementById('question_3').value);
         // console.log(document.getElementById('question_4').value);
 
         }
     }




/////////// PREGUNTA 17 18 19 20

var question17 = document.getElementById('question_17'); // Obtener valor Pregunta 17
var respuesta_q17 = '';

question17.addEventListener('change', obtenerInfo17);

    function obtenerInfo17(e) {
    respuesta_q17 = e.target.value;

    if (respuesta_q17 === "Si") { // Si el valor de Pregunta 17 es igual Si

        document.getElementById('q18').style.display = ""; // Mostrar division Pregunta 18
        document.getElementById('q19').style.display = "none"; // Ocultar division Pregunta 19
        document.getElementById('q20').style.display = "none"; // Ocultar division Pregunta 20

        document.getElementById('question_18').value = ""; // Limpia select Pregunta 18
        document.getElementById('question_19').value = ""; // Limpia select Pregunta 19
        document.getElementById('question_20').value = ""; // Limpia select Pregunta 20

        document.getElementById("div-b&n5").style.display = "none"; // Ocultar division boton Siguiente 5
        
    }

    else if (respuesta_q17 === "No"){

        document.getElementById('q18').style.display = "none";  // Ocultar division Pregunta 18
        document.getElementById('q19').style.display = "none";  // Ocultar division Pregunta 19
        document.getElementById('q20').style.display = "none";  // Ocultar division Pregunta 20

        document.getElementById('question_18').value = ""; // Limpia select Pregunta 18
        document.getElementById('question_19').value = ""; // Limpia select Pregunta 19
        document.getElementById('question_20').value = ""; // Limpia select Pregunta 20

        document.getElementById("div-b&n5").style.display = ""; // Mostrar division boton Siguiente 5
        document.getElementById("btn-back5").style.display = ""; // Mostrar boton Anterior 5
        document.getElementById("btn-next5").style.display = ""; // Mostrar boton Siguiente 5

        }
    }





var question18 = document.getElementById('question_18'); // Obtener valor Pregunta 18
var respuesta_q18 = '';

question18.addEventListener('change', obtenerInfo18);

    function obtenerInfo18(e) {
    respuesta_q18 = e.target.value;

    if (respuesta_q18 === "Si") { //Si el valor de Pregunta 18 es igual Si

        document.getElementById('q19').style.display = "none"; // Ocultar division Pregunta 19
        document.getElementById('q20').style.display = "none"; // Ocultar division Pregunta 20

        document.getElementById('question_19').value = ""; // Limpia select Pregunta 19
        document.getElementById('question_20').value = ""; // Limpia select Pregunta 20

        document.getElementById("div-b&n5").style.display = ""; // Mostrar division boton Siguiente 5
        document.getElementById("btn-back5").style.display = ""; // Mostrar boton Anterior 5
        document.getElementById("btn-next5").style.display = ""; // Mostrar boton Siguiente 5


    }

    else if (respuesta_q18 === "No"){
        
        document.getElementById('q19').style.display = "";  // Mostrar division Pregunta 19
        document.getElementById('q20').style.display = "none"; // Ocultar division Pregunta 20

        document.getElementById('question_20').value = ""; // Limpiar select Pregunta 20
        
        document.getElementById("div-b&n5").style.display = "none"; // Ocultar  division boton anterior y siguiente 5
        document.getElementById("btn-back5").style.display = "none"; // Ocultar boton Anterior 5
        document.getElementById("btn-next5").style.display = "none"; // Ocultar boton Siguiente 5

        }
    }





var question19 = document.getElementById('question_19'); // Obtener valor Pregunta 19
var respuesta_q19 = '';

question19.addEventListener('change', obtenerInfo19);

    function obtenerInfo19(e) {
    respuesta_q19 = e.target.value;

    if (respuesta_q19 === "Si") {

        document.getElementById('q20').style.display = "none"; // Ocultar division Pregunta 20
        document.getElementById('question_20').value = ""; // Limpiar select pregunta 20

        document.getElementById("div-b&n5").style.display = ""; // Mostrar division anterior y siguiente 5
        document.getElementById("btn-back5").style.display = ""; // Mostrar boton Anterior 5
        document.getElementById("btn-next5").style.display = ""; // Mostrar boton Siguiente 5

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    else if (respuesta_q19 === "No"){

        document.getElementById('q20').style.display = ""; // Mostrar division Pregunta 20
        document.getElementById('question_20').disabled = true; // Deshabilitar select pregunta 20
        document.getElementById('question_20').value = "Si"; // Asignar valor al select de la pregunta 20

        document.getElementById("div-b&n5").style.display = ""; // Mostrar division anterior y siguiente 5
        document.getElementById("btn-back5").style.display = ""; // Mostrar boton Anterior 5
        document.getElementById("btn-next5").style.display = ""; // Mostrar boton Siguiente 5
  

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    }

    /////////// PREGUNTA 21 22 23 24