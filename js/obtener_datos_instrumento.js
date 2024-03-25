 /////////// PREGUNTA 1 2 3 4
const na = "N/A";
const r_input = "Si";
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

        document.getElementById('question_2').value = na; // Limpia select Pregunta 2  ********
        document.getElementById('question_3').value = na; // Limpia select Pregunta 3  ********
        document.getElementById('question_4').value = na; // Limpia select Pregunta 4  ********

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

        document.getElementById('question_3').value = na; // Limpia select Pregunta 3    *******
        document.getElementById('question_4').value = na; // Limpia select Pregunta 4    *******

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
        document.getElementById('question_4').value = na; // Limpiar select pregunta 4       *********

        document.getElementById("div-b&n1").style.display = ""; // Mostrar division anterior y siguiente 1
        document.getElementById("btn-next1").style.display = ""; // Mostrar boton Siguiente 2

        }
    else if (respuesta_q3 === "No"){

        document.getElementById('q4').style.display = ""; // Mostrar division Pregunta 4
        // document.getElementById('question_4').disabled = true; // Deshabilitar select pregunta 4
        document.getElementById('question_4').value = r_input; // Asignar valor al select de la pregunta 4

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
 
         document.getElementById("div-b&n2").style.display = ""; // Mostrar division boton Siguiente 2  
         document.getElementById("btn-back2").style.display = ""; // Mostrar boton Anterior 2 *********************
         document.getElementById("btn-next2").style.display = "none"; // Ocultar boton Siguiente 2
         
     }
 
     else if (respuesta_q5 === "No"){
 
         document.getElementById('q6').style.display = "none";  // Ocultar division Pregunta 6
         document.getElementById('q7').style.display = "none";  // Ocultar division Pregunta 7
         document.getElementById('q8').style.display = "none";  // Ocultar division Pregunta 8
 
         document.getElementById('question_6').value = na; // Limpia select Pregunta 6
         document.getElementById('question_7').value = na; // Limpia select Pregunta 7
         document.getElementById('question_8').value = na; // Limpia select Pregunta 8
 
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
 
         document.getElementById('question_7').value = na; // Limpia select Pregunta 7
         document.getElementById('question_8').value = na; // Limpia select Pregunta 8
 
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
 
 
 
 var question7 = document.getElementById('question_7'); // Obtener valor Pregunta 7
 var respuesta_q7 = '';
 
 question7.addEventListener('change', obtenerInfo7);
 
     function obtenerInfo7(e) {
     respuesta_q7 = e.target.value;
 
     if (respuesta_q7 === "Si") {
 
         document.getElementById('q8').style.display = "none"; // Ocultar division Pregunta 8
         document.getElementById('question_8').value = na; // Limpiar select pregunta 8
 
         document.getElementById("div-b&n2").style.display = ""; // Mostrar division anterior y siguiente 2
         document.getElementById("btn-back2").style.display = ""; // Mostrar boton Anterior 2
         document.getElementById("btn-next2").style.display = ""; // Mostrar boton Siguiente 2
 
         // console.log(document.getElementById('question_3').value);
         // console.log(document.getElementById('question_4').value);
 
         }
     else if (respuesta_q7 === "No"){
 
         document.getElementById('q8').style.display = ""; // Mostrar division Pregunta 8
        //  document.getElementById('question_8').disabled = true; // Deshabilitar select pregunta 8
         document.getElementById('question_8').value = r_input; // Asignar valor al select de la pregunta 8
 
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

         document.getElementById("div-b&n3").style.display = ""; // Mostrar division boton Siguiente 3  
         document.getElementById("btn-back3").style.display = ""; // Mostrar boton Anterior 3 *********************
         document.getElementById("btn-next3").style.display = "none"; // Ocultar boton Siguiente 3
         
     }
 
     else if (respuesta_q9 === "No"){
 
         document.getElementById('q10').style.display = "none";  // Ocultar division Pregunta 10
         document.getElementById('q11').style.display = "none";  // Ocultar division Pregunta 11
         document.getElementById('q12').style.display = "none";  // Ocultar division Pregunta 12
 
         document.getElementById('question_10').value = na; // Limpia select Pregunta 10
         document.getElementById('question_11').value = na; // Limpia select Pregunta 11
         document.getElementById('question_12').value = na; // Limpia select Pregunta 12
 
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
 
         document.getElementById('question_11').value = na; // Limpia select Pregunta 11
         document.getElementById('question_12').value = na; // Limpia select Pregunta 12
 
         document.getElementById("div-b&n3").style.display = ""; // Mostrar division boton Siguiente 3
         document.getElementById("btn-back3").style.display = ""; // Mostrar boton Anterior 3
         document.getElementById("btn-next3").style.display = ""; // Mostrar boton Siguiente 3

 
     }
 
     else if (respuesta_q10 === "No"){
         
         document.getElementById('q11').style.display = "";  // Mostrar division Pregunta 11
         document.getElementById('q12').style.display = "none"; // Ocultar division Pregunta 12
 
         document.getElementById('question_12').value = ""; // Limpiar select Pregunta 12
         
         document.getElementById("div-b&n3").style.display = ""; // Mostrar  division boton anterior y siguiente 3 ************
         document.getElementById("btn-back3").style.display = ""; // Mostrar boton Anterior 3
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
         document.getElementById('question_12').value = na; // Limpiar select pregunta 12
 
         document.getElementById("div-b&n3").style.display = ""; // Mostrar division anterior y siguiente 3
         document.getElementById("btn-back3").style.display = ""; // Mostrar boton Anterior 3
         document.getElementById("btn-next3").style.display = ""; // Mostrar boton Siguiente 3
 
         // console.log(document.getElementById('question_3').value);
         // console.log(document.getElementById('question_4').value);
 
         }
     else if (respuesta_q11 === "No"){
 
         document.getElementById('q12').style.display = ""; // Mostrar division Pregunta 12
        //  document.getElementById('question_12').disabled = true; // Deshabilitar select pregunta 12
         document.getElementById('question_12').value = r_input; // Asignar valor al select de la pregunta 12
 
         document.getElementById("div-b&n3").style.display = ""; // Mostrar division anterior y siguiente 3
         document.getElementById("btn-back3").style.display = ""; // Mostrar boton Anterior 3
         document.getElementById("btn-next3").style.display = ""; // Mostrar boton Siguiente 3
   
 
         // console.log(document.getElementById('question_3').value);
         // console.log(document.getElementById('question_4').value);
 
         }
     }


 /////////// PREGUNTA 13 14 15 16
 /////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////
 var question13 = document.getElementById('question_13'); // Obtener valor Pregunta 13
 var respuesta_q13 = '';
 
 question13.addEventListener('change', obtenerInfo13);
 
     function obtenerInfo13(e) {
     respuesta_q13 = e.target.value;
 
     if (respuesta_q13 === "No") { // Si el valor de Pregunta 13 es igual Si
 
         document.getElementById('q14').style.display = ""; // Mostrar division Pregunta 14
         document.getElementById('q15').style.display = "none"; // Ocultar division Pregunta 15
         document.getElementById('q16').style.display = "none"; // Ocultar division Pregunta 16
 
         document.getElementById('question_14').value = ""; // Limpia select Pregunta 14
         document.getElementById('question_15').value = ""; // Limpia select Pregunta 15
         document.getElementById('question_16').value = ""; // Limpia select Pregunta 16
 

         document.getElementById("div-b&n4").style.display = ""; // Mostrar division boton Siguiente 4  
         document.getElementById("btn-back4").style.display = ""; // Mostrar boton Anterior 4 *********************
         document.getElementById("btn-next4").style.display = "none"; // Ocultar boton Siguiente 4
         
     }
 
     else if (respuesta_q13 === "Si"){
 
         document.getElementById('q14').style.display = "none";  // Ocultar division Pregunta 14
         document.getElementById('q15').style.display = "none";  // Ocultar division Pregunta 15
         document.getElementById('q16').style.display = "none";  // Ocultar division Pregunta 16
 
         document.getElementById('question_14').value = na; // Limpia select Pregunta 14
         document.getElementById('question_15').value = na; // Limpia select Pregunta 15
         document.getElementById('question_16').value = na; // Limpia select Pregunta 16
 
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
 
         document.getElementById('question_15').value = na; // Limpia select Pregunta 15
         document.getElementById('question_16').value = na; // Limpia select Pregunta 16
 
         document.getElementById("div-b&n4").style.display = ""; // Mostrar division boton Siguiente 4
         document.getElementById("btn-back4").style.display = ""; // Mostrar boton Anterior 4
         document.getElementById("btn-next4").style.display = ""; // Mostrar boton Siguiente 4

 
     }
 
     else if (respuesta_q14 === "No"){
         
         document.getElementById('q15').style.display = "";  // Mostrar division Pregunta 15
         document.getElementById('q16').style.display = "none"; // Ocultar division Pregunta 16
 
         document.getElementById('question_16').value = ""; // Limpiar select Pregunta 16

         document.getElementById("div-b&n4").style.display = ""; // Mostrar division boton Siguiente 4  
         document.getElementById("btn-back4").style.display = ""; // Mostrar boton Anterior 4 *********************
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
         document.getElementById('question_16').value = na; // Limpiar select pregunta 16
 
         document.getElementById("div-b&n4").style.display = ""; // Mostrar division anterior y siguiente 4
         document.getElementById("btn-back4").style.display = ""; // Mostrar boton Anterior 4
         document.getElementById("btn-next4").style.display = ""; // Mostrar boton Siguiente 4
 
         // console.log(document.getElementById('question_3').value);
         // console.log(document.getElementById('question_4').value);
 
         }
     else if (respuesta_q15 === "No"){
 
         document.getElementById('q16').style.display = ""; // Mostrar division Pregunta 16
        //  document.getElementById('question_16').disabled = true; // Deshabilitar select pregunta 16
         document.getElementById('question_16').value = r_input; // Asignar valor al select de la pregunta 16
 
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

        document.getElementById("div-b&n5").style.display = ""; // Mostrar division boton Siguiente 5  
        document.getElementById("btn-back5").style.display = ""; // Mostrar boton Anterior 5 *********************
        document.getElementById("btn-next5").style.display = "none"; // Ocultar boton Siguiente 5
        
    }

    else if (respuesta_q17 === "No"){

        document.getElementById('q18').style.display = "none";  // Ocultar division Pregunta 18
        document.getElementById('q19').style.display = "none";  // Ocultar division Pregunta 19
        document.getElementById('q20').style.display = "none";  // Ocultar division Pregunta 20

        document.getElementById('question_18').value = na; // Limpia select Pregunta 18
        document.getElementById('question_19').value = na; // Limpia select Pregunta 19
        document.getElementById('question_20').value = na; // Limpia select Pregunta 20

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

        document.getElementById('question_19').value = na; // Limpia select Pregunta 19
        document.getElementById('question_20').value = na; // Limpia select Pregunta 20

        document.getElementById("div-b&n5").style.display = ""; // Mostrar division boton Siguiente 5
        document.getElementById("btn-back5").style.display = ""; // Mostrar boton Anterior 5
        document.getElementById("btn-next5").style.display = ""; // Mostrar boton Siguiente 5


    }

    else if (respuesta_q18 === "No"){
        
        document.getElementById('q19').style.display = "";  // Mostrar division Pregunta 19
        document.getElementById('q20').style.display = "none"; // Ocultar division Pregunta 20

        document.getElementById('question_20').value = ""; // Limpiar select Pregunta 20
        
        document.getElementById("div-b&n5").style.display = ""; // Mostrar division boton Siguiente 5  
        document.getElementById("btn-back5").style.display = ""; // Mostrar boton Anterior 5 *********************
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
        document.getElementById('question_20').value = na; // Limpiar select pregunta 20

        document.getElementById("div-b&n5").style.display = ""; // Mostrar division anterior y siguiente 5
        document.getElementById("btn-back5").style.display = ""; // Mostrar boton Anterior 5
        document.getElementById("btn-next5").style.display = ""; // Mostrar boton Siguiente 5

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    else if (respuesta_q19 === "No"){

        document.getElementById('q20').style.display = ""; // Mostrar division Pregunta 20
        // document.getElementById('question_20').disabled = true; // Deshabilitar select pregunta 20
        document.getElementById('question_20').value = r_input; // Asignar valor al select de la pregunta 20

        document.getElementById("div-b&n5").style.display = ""; // Mostrar division anterior y siguiente 5
        document.getElementById("btn-back5").style.display = ""; // Mostrar boton Anterior 5
        document.getElementById("btn-next5").style.display = ""; // Mostrar boton Siguiente 5
  

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    }




    /////////// PREGUNTA 21 22 23 24



    var question21 = document.getElementById('question_21'); // Obtener valor Pregunta 21
var respuesta_q21 = '';

question21.addEventListener('change', obtenerInfo21);

    function obtenerInfo21(e) {
    respuesta_q21 = e.target.value;

    if (respuesta_q21 === "Si") { // Si el valor de Pregunta 21 es igual Si

        document.getElementById('q22').style.display = ""; // Mostrar division Pregunta 22
        document.getElementById('q23').style.display = "none"; // Ocultar division Pregunta 23
        document.getElementById('q24').style.display = "none"; // Ocultar division Pregunta 24

        document.getElementById('question_22').value = ""; // Limpia select Pregunta 22
        document.getElementById('question_23').value = ""; // Limpia select Pregunta 23
        document.getElementById('question_24').value = ""; // Limpia select Pregunta 24

        document.getElementById("div-b&n6").style.display = ""; // Mostrar division boton Siguiente 6  
        document.getElementById("btn-back6").style.display = ""; // Mostrar boton Anterior 6 *********************
        document.getElementById("btn-next6").style.display = "none"; // Ocultar boton Siguiente 6

    }

    else if (respuesta_q21 === "No"){

        document.getElementById('q22').style.display = "none";  // Ocultar division Pregunta 22
        document.getElementById('q23').style.display = "none";  // Ocultar division Pregunta 23
        document.getElementById('q24').style.display = "none";  // Ocultar division Pregunta 24

        document.getElementById('question_22').value = na; // Limpia select Pregunta 22
        document.getElementById('question_23').value = na; // Limpia select Pregunta 23
        document.getElementById('question_24').value = na; // Limpia select Pregunta 24

        document.getElementById("div-b&n6").style.display = ""; // Mostrar division boton Siguiente 6
        document.getElementById("btn-back6").style.display = ""; // Mostrar boton Anterior 6
        document.getElementById("btn-next6").style.display = ""; // Mostrar boton Siguiente 6

        }
    }





var question22 = document.getElementById('question_22'); // Obtener valor Pregunta 22
var respuesta_q22 = '';

question22.addEventListener('change', obtenerInfo22);

    function obtenerInfo22(e) {
    respuesta_q22 = e.target.value;

    if (respuesta_q22 === "Si") { //Si el valor de Pregunta 22 es igual Si

        document.getElementById('q23').style.display = "none"; // Ocultar division Pregunta 23
        document.getElementById('q24').style.display = "none"; // Ocultar division Pregunta 24

        document.getElementById('question_23').value = na; // Limpia select Pregunta 23
        document.getElementById('question_24').value = na; // Limpia select Pregunta 24

        document.getElementById("div-b&n6").style.display = ""; // Mostrar division boton Siguiente 6
        document.getElementById("btn-back6").style.display = ""; // Mostrar boton Anterior 6
        document.getElementById("btn-next6").style.display = ""; // Mostrar boton Siguiente 6


    }

    else if (respuesta_q22 === "No"){
        
        document.getElementById('q23').style.display = "";  // Mostrar division Pregunta 23
        document.getElementById('q24').style.display = "none"; // Ocultar division Pregunta 24

        document.getElementById('question_24').value = ""; // Limpiar select Pregunta 24

        document.getElementById("div-b&n6").style.display = ""; // Mostrar division boton Siguiente 6  
        document.getElementById("btn-back6").style.display = ""; // Mostrar boton Anterior 6 *********************
        document.getElementById("btn-next6").style.display = "none"; // Ocultar boton Siguiente 6

        }
    }





var question23 = document.getElementById('question_23'); // Obtener valor Pregunta 23
var respuesta_q23 = '';

question23.addEventListener('change', obtenerInfo23);

    function obtenerInfo23(e) {
    respuesta_q23 = e.target.value;

    if (respuesta_q23 === "Si") {

        document.getElementById('q24').style.display = "none"; // Ocultar division Pregunta 24
        document.getElementById('question_24').value = na; // Limpiar select pregunta 24

        document.getElementById("div-b&n6").style.display = ""; // Mostrar division anterior y siguiente 6
        document.getElementById("btn-back6").style.display = ""; // Mostrar boton Anterior 6
        document.getElementById("btn-next6").style.display = ""; // Mostrar boton Siguiente 6

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    else if (respuesta_q23 === "No"){

        document.getElementById('q24').style.display = ""; // Mostrar division Pregunta 24
        // document.getElementById('question_24').disabled = true; // Deshabilitar select pregunta 24
        document.getElementById('question_24').value = r_input; // Asignar valor al select de la pregunta 24

        document.getElementById("div-b&n6").style.display = ""; // Mostrar division anterior y siguiente 6
        document.getElementById("btn-back6").style.display = ""; // Mostrar boton Anterior 6
        document.getElementById("btn-next6").style.display = ""; // Mostrar boton Siguiente 6
  

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    }


    /////////// PREGUNTA 25 26 27 28

    var question25 = document.getElementById('question_25'); // Obtener valor Pregunta 25
var respuesta_q25 = '';

question25.addEventListener('change', obtenerInfo25);

    function obtenerInfo25(e) {
    respuesta_q25 = e.target.value;

    if (respuesta_q25 === "No") { // Si el valor de Pregunta 25 es igual Si

        document.getElementById('q26').style.display = ""; // Mostrar division Pregunta 26
        document.getElementById('q27').style.display = "none"; // Ocultar division Pregunta 27
        document.getElementById('q28').style.display = "none"; // Ocultar division Pregunta 28

        document.getElementById('question_26').value = ""; // Limpia select Pregunta 26
        document.getElementById('question_27').value = ""; // Limpia select Pregunta 27
        document.getElementById('question_28').value = ""; // Limpia select Pregunta 28

        document.getElementById("div-b&n7").style.display = ""; // Mostrar division boton Siguiente 7 
        document.getElementById("btn-back7").style.display = ""; // Mostrar boton Anterior 7 *********************
        document.getElementById("btn-next7").style.display = "none"; // Ocultar boton Siguiente 7

    }

    else if (respuesta_q25 === "Si"){

        document.getElementById('q26').style.display = "none";  // Ocultar division Pregunta 26
        document.getElementById('q27').style.display = "none";  // Ocultar division Pregunta 27
        document.getElementById('q28').style.display = "none";  // Ocultar division Pregunta 28

        document.getElementById('question_26').value = na; // Limpia select Pregunta 26
        document.getElementById('question_27').value = na; // Limpia select Pregunta 27
        document.getElementById('question_28').value = na; // Limpia select Pregunta 28

        document.getElementById("div-b&n7").style.display = ""; // Mostrar division boton Siguiente 7
        document.getElementById("btn-back7").style.display = ""; // Mostrar boton Anterior 7
        document.getElementById("btn-next7").style.display = ""; // Mostrar boton Siguiente 7

        }
    }





var question26 = document.getElementById('question_26'); // Obtener valor Pregunta 26
var respuesta_q26 = '';

question26.addEventListener('change', obtenerInfo26);

    function obtenerInfo26(e) {
    respuesta_q26 = e.target.value;

    if (respuesta_q26 === "Si") { //Si el valor de Pregunta 26 es igual Si

        document.getElementById('q27').style.display = "none"; // Ocultar division Pregunta 27
        document.getElementById('q28').style.display = "none"; // Ocultar division Pregunta 28

        document.getElementById('question_27').value = na; // Limpia select Pregunta 27
        document.getElementById('question_28').value = na; // Limpia select Pregunta 28

        document.getElementById("div-b&n7").style.display = ""; // Mostrar division boton Siguiente 7
        document.getElementById("btn-back7").style.display = ""; // Mostrar boton Anterior 7
        document.getElementById("btn-next7").style.display = ""; // Mostrar boton Siguiente 7


    }

    else if (respuesta_q26 === "No"){
        
        document.getElementById('q27').style.display = "";  // Mostrar division Pregunta 27
        document.getElementById('q28').style.display = "none"; // Ocultar division Pregunta 28

        document.getElementById('question_28').value = ""; // Limpiar select Pregunta 28

        document.getElementById("div-b&n7").style.display = ""; // Mostrar division boton Siguiente 7 
        document.getElementById("btn-back7").style.display = ""; // Mostrar boton Anterior 7 *********************
        document.getElementById("btn-next7").style.display = "none"; // Ocultar boton Siguiente 7

        }
    }





var question27 = document.getElementById('question_27'); // Obtener valor Pregunta 27
var respuesta_q27 = '';

question27.addEventListener('change', obtenerInfo27);

    function obtenerInfo27(e) {
    respuesta_q27 = e.target.value;

    if (respuesta_q27 === "Si") {

        document.getElementById('q28').style.display = "none"; // Ocultar division Pregunta 28
        document.getElementById('question_28').value = na; // Limpiar select pregunta 28

        document.getElementById("div-b&n7").style.display = ""; // Mostrar division anterior y siguiente 7
        document.getElementById("btn-back7").style.display = ""; // Mostrar boton Anterior 7
        document.getElementById("btn-next7").style.display = ""; // Mostrar boton Siguiente 7

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    else if (respuesta_q27 === "No"){

        document.getElementById('q28').style.display = ""; // Mostrar division Pregunta 28
        // document.getElementById('question_28').disabled = true; // Deshabilitar select pregunta 28
        document.getElementById('question_28').value = r_input; // Asignar valor al select de la pregunta 28

        document.getElementById("div-b&n7").style.display = ""; // Mostrar division anterior y siguiente 7
        document.getElementById("btn-back7").style.display = ""; // Mostrar boton Anterior 7
        document.getElementById("btn-next7").style.display = ""; // Mostrar boton Siguiente 7
  

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    }


    /////////// PREGUNTA 29 30 31 32

    var question29 = document.getElementById('question_29'); // Obtener valor Pregunta 29
    var respuesta_q29 = '';
    
    question29.addEventListener('change', obtenerInfo29);
    
        function obtenerInfo29(e) {
        respuesta_q29 = e.target.value;
    
        if (respuesta_q29 === "Si") { // Si el valor de Pregunta 29 es igual Si
    
            document.getElementById('q30').style.display = ""; // Mostrar division Pregunta 30
            document.getElementById('q31').style.display = "none"; // Ocultar division Pregunta 31
            document.getElementById('q32').style.display = "none"; // Ocultar division Pregunta 32
    
            document.getElementById('question_30').value = ""; // Limpia select Pregunta 30
            document.getElementById('question_31').value = ""; // Limpia select Pregunta 31
            document.getElementById('question_32').value = ""; // Limpia select Pregunta 32

            document.getElementById("div-b&n8").style.display = ""; // Mostrar division boton Siguiente 8
            document.getElementById("btn-back8").style.display = ""; // Mostrar boton Anterior 8 *********************
            document.getElementById("btn-next8").style.display = "none"; // Ocultar boton Siguiente 8
    
        }
    
        else if (respuesta_q29 === "No"){
    
            document.getElementById('q30').style.display = "none";  // Ocultar division Pregunta 30
            document.getElementById('q31').style.display = "none";  // Ocultar division Pregunta 31
            document.getElementById('q32').style.display = "none";  // Ocultar division Pregunta 32
    
            document.getElementById('question_30').value = na; // Limpia select Pregunta 30
            document.getElementById('question_31').value = na; // Limpia select Pregunta 31
            document.getElementById('question_32').value = na; // Limpia select Pregunta 32
    
            document.getElementById("div-b&n8").style.display = ""; // Mostrar division boton Siguiente 8
            document.getElementById("btn-back8").style.display = ""; // Mostrar boton Anterior 8
            document.getElementById("btn-next8").style.display = ""; // Mostrar boton Siguiente 8
    
            }
        }
    
    
    
    
    
    var question30 = document.getElementById('question_30'); // Obtener valor Pregunta 30
    var respuesta_q30 = '';
    
    question30.addEventListener('change', obtenerInfo30);
    
        function obtenerInfo30(e) {
        respuesta_q30 = e.target.value;
    
        if (respuesta_q30 === "Si") { //Si el valor de Pregunta 30 es igual Si
    
            document.getElementById('q31').style.display = "none"; // Ocultar division Pregunta 31
            document.getElementById('q32').style.display = "none"; // Ocultar division Pregunta 32
    
            document.getElementById('question_31').value = na; // Limpia select Pregunta 31
            document.getElementById('question_32').value = na; // Limpia select Pregunta 32
    
            document.getElementById("div-b&n8").style.display = ""; // Mostrar division boton Siguiente 8
            document.getElementById("btn-back8").style.display = ""; // Mostrar boton Anterior 8
            document.getElementById("btn-next8").style.display = ""; // Mostrar boton Siguiente 8
    
    
        }
    
        else if (respuesta_q30 === "No"){
            
            document.getElementById('q31').style.display = "";  // Mostrar division Pregunta 31
            document.getElementById('q32').style.display = "none"; // Ocultar division Pregunta 32
    
            document.getElementById('question_32').value = ""; // Limpiar select Pregunta 32

            document.getElementById("div-b&n8").style.display = ""; // Mostrar division boton Siguiente 8
            document.getElementById("btn-back8").style.display = ""; // Mostrar boton Anterior 8 *********************
            document.getElementById("btn-next8").style.display = "none"; // Ocultar boton Siguiente 8
    
            }
        }
    
    
    
    
    
    var question31 = document.getElementById('question_31'); // Obtener valor Pregunta 31
    var respuesta_q31 = '';
    
    question31.addEventListener('change', obtenerInfo31);
    
        function obtenerInfo31(e) {
        respuesta_q31 = e.target.value;
    
        if (respuesta_q31 === "Si") {
    
            document.getElementById('q32').style.display = "none"; // Ocultar division Pregunta 32
            document.getElementById('question_32').value = na; // Limpiar select pregunta 32
    
            document.getElementById("div-b&n8").style.display = ""; // Mostrar division anterior y siguiente 8
            document.getElementById("btn-back8").style.display = ""; // Mostrar boton Anterior 8
            document.getElementById("btn-next8").style.display = ""; // Mostrar boton Siguiente 8
    
            // console.log(document.getElementById('question_3').value);
            // console.log(document.getElementById('question_4').value);
    
            }
        else if (respuesta_q31 === "No"){
    
            document.getElementById('q32').style.display = ""; // Mostrar division Pregunta 32
            // document.getElementById('question_32').disabled = true; // Deshabilitar select pregunta 32
            document.getElementById('question_32').value = r_input; // Asignar valor al select de la pregunta 32
    
            document.getElementById("div-b&n8").style.display = ""; // Mostrar division anterior y siguiente 8
            document.getElementById("btn-back8").style.display = ""; // Mostrar boton Anterior 8
            document.getElementById("btn-next8").style.display = ""; // Mostrar boton Siguiente 8
      
    
            // console.log(document.getElementById('question_3').value);
            // console.log(document.getElementById('question_4').value);
    
            }
        }
    

    /////////// PREGUNTA 33 34 35 36 

    var question33 = document.getElementById('question_33'); // Obtener valor Pregunta 33
    var respuesta_q33 = '';
    
    question33.addEventListener('change', obtenerInfo33);
    
        function obtenerInfo33(e) {
        respuesta_q33 = e.target.value;
    
        if (respuesta_q33 === "No") { // Si el valor de Pregunta 33 es igual Si
    
            document.getElementById('q34').style.display = ""; // Mostrar division Pregunta 34
            document.getElementById('q35').style.display = "none"; // Ocultar division Pregunta 35
            document.getElementById('q36').style.display = "none"; // Ocultar division Pregunta 36
    
            document.getElementById('question_34').value = ""; // Limpia select Pregunta 34
            document.getElementById('question_35').value = ""; // Limpia select Pregunta 35
            document.getElementById('question_36').value = ""; // Limpia select Pregunta 36

            document.getElementById("div-b&n9").style.display = ""; // Mostrar division boton Siguiente 9
            document.getElementById("btn-back9").style.display = ""; // Mostrar boton Anterior 9 *********************
            document.getElementById("btn-next9").style.display = "none"; // Ocultar boton Siguiente 9
    
        }
    
        else if (respuesta_q33 === "Si"){
    
            document.getElementById('q34').style.display = "none";  // Ocultar division Pregunta 34
            document.getElementById('q35').style.display = "none";  // Ocultar division Pregunta 35
            document.getElementById('q36').style.display = "none";  // Ocultar division Pregunta 36
    
            document.getElementById('question_34').value = na; // Limpia select Pregunta 34
            document.getElementById('question_35').value = na; // Limpia select Pregunta 35
            document.getElementById('question_36').value = na; // Limpia select Pregunta 36
    
            document.getElementById("div-b&n9").style.display = ""; // Mostrar division boton Siguiente 9
            document.getElementById("btn-back9").style.display = ""; // Mostrar boton Anterior 9
            document.getElementById("btn-next9").style.display = ""; // Mostrar boton Siguiente 9
    
            }
        }
    
    
    
    
    
    var question34 = document.getElementById('question_34'); // Obtener valor Pregunta 34
    var respuesta_q34 = '';
    
    question34.addEventListener('change', obtenerInfo34);
    
        function obtenerInfo34(e) {
        respuesta_q34 = e.target.value;
    
        if (respuesta_q34 === "Si") { //Si el valor de Pregunta 34 es igual Si
    
            document.getElementById('q35').style.display = "none"; // Ocultar division Pregunta 35
            document.getElementById('q36').style.display = "none"; // Ocultar division Pregunta 36
    
            document.getElementById('question_35').value = na; // Limpia select Pregunta 35
            document.getElementById('question_36').value = na; // Limpia select Pregunta 36
    
            document.getElementById("div-b&n9").style.display = ""; // Mostrar division boton Siguiente 9
            document.getElementById("btn-back9").style.display = ""; // Mostrar boton Anterior 9
            document.getElementById("btn-next9").style.display = ""; // Mostrar boton Siguiente 9
    
    
        }
    
        else if (respuesta_q34 === "No"){
            
            document.getElementById('q35').style.display = "";  // Mostrar division Pregunta 35
            document.getElementById('q36').style.display = "none"; // Ocultar division Pregunta 36
    
            document.getElementById('question_36').value = ""; // Limpiar select Pregunta 36

            document.getElementById("div-b&n9").style.display = ""; // Mostrar division boton Siguiente 9
            document.getElementById("btn-back9").style.display = ""; // Mostrar boton Anterior 9 *********************
            document.getElementById("btn-next9").style.display = "none"; // Ocultar boton Siguiente 9
    
            }
        }
    
    
    
    
    
    var question35 = document.getElementById('question_35'); // Obtener valor Pregunta 35
    var respuesta_q35 = '';
    
    question35.addEventListener('change', obtenerInfo35);
    
        function obtenerInfo35(e) {
        respuesta_q35 = e.target.value;
    
        if (respuesta_q35 === "Si") {
    
            document.getElementById('q36').style.display = "none"; // Ocultar division Pregunta 36
            document.getElementById('question_36').value = na; // Limpiar select pregunta 36
    
            document.getElementById("div-b&n9").style.display = ""; // Mostrar division anterior y siguiente 9
            document.getElementById("btn-back9").style.display = ""; // Mostrar boton Anterior 9
            document.getElementById("btn-next9").style.display = ""; // Mostrar boton Siguiente 9
    
            // console.log(document.getElementById('question_3').value);
            // console.log(document.getElementById('question_4').value);
    
            }
        else if (respuesta_q35 === "No"){
    
            document.getElementById('q36').style.display = ""; // Mostrar division Pregunta 36
            // document.getElementById('question_36').disabled = true; // Deshabilitar select pregunta 36
            document.getElementById('question_36').value = r_input; // Asignar valor al select de la pregunta 36
    
            document.getElementById("div-b&n9").style.display = ""; // Mostrar division anterior y siguiente 9
            document.getElementById("btn-back9").style.display = ""; // Mostrar boton Anterior 9
            document.getElementById("btn-next9").style.display = ""; // Mostrar boton Siguiente 9
      
    
            // console.log(document.getElementById('question_3').value);
            // console.log(document.getElementById('question_4').value);
    
            }
        }
    

    /////////// PREGUNTA 37 38 39 40

    var question37 = document.getElementById('question_37'); // Obtener valor Pregunta 37
    var respuesta_q37 = '';
    
    question37.addEventListener('change', obtenerInfo37);
    
        function obtenerInfo37(e) {
        respuesta_q37 = e.target.value;
    
        if (respuesta_q37 === "No") { // Si el valor de Pregunta 37 es igual Si
    
            document.getElementById('q38').style.display = ""; // Mostrar division Pregunta 38
            document.getElementById('q39').style.display = "none"; // Ocultar division Pregunta 39
            document.getElementById('q40').style.display = "none"; // Ocultar division Pregunta 40
    
            document.getElementById('question_38').value = ""; // Limpia select Pregunta 38
            document.getElementById('question_39').value = ""; // Limpia select Pregunta 39
            document.getElementById('question_40').value = ""; // Limpia select Pregunta 40

            document.getElementById("div-b&n10").style.display = ""; // Mostrar division boton Siguiente 10
            document.getElementById("btn-back10").style.display = ""; // Mostrar boton Anterior 10 *********************
            document.getElementById("btn-next10").style.display = "none"; // Ocultar boton Siguiente 10
    
        }
    
        else if (respuesta_q37 === "Si"){
    
            document.getElementById('q38').style.display = "none";  // Ocultar division Pregunta 38
            document.getElementById('q39').style.display = "none";  // Ocultar division Pregunta 39
            document.getElementById('q40').style.display = "none";  // Ocultar division Pregunta 40
    
            document.getElementById('question_38').value = na; // Limpia select Pregunta 38
            document.getElementById('question_39').value = na; // Limpia select Pregunta 39
            document.getElementById('question_40').value = na; // Limpia select Pregunta 40
    
            document.getElementById("div-b&n10").style.display = ""; // Mostrar division boton Siguiente 10
            document.getElementById("btn-back10").style.display = ""; // Mostrar boton Anterior 10
            document.getElementById("btn-next10").style.display = ""; // Mostrar boton Siguiente 10
    
            }
        }
    
    
    
    
    
    var question38 = document.getElementById('question_38'); // Obtener valor Pregunta 38
    var respuesta_q38 = '';
    
    question38.addEventListener('change', obtenerInfo38);
    
        function obtenerInfo38(e) {
        respuesta_q38 = e.target.value;
    
        if (respuesta_q38 === "Si") { //Si el valor de Pregunta 38 es igual Si
    
            document.getElementById('q39').style.display = "none"; // Ocultar division Pregunta 39
            document.getElementById('q40').style.display = "none"; // Ocultar division Pregunta 40
    
            document.getElementById('question_39').value = na; // Limpia select Pregunta 39
            document.getElementById('question_40').value = na; // Limpia select Pregunta 40
    
            document.getElementById("div-b&n10").style.display = ""; // Mostrar division boton Siguiente 10
            document.getElementById("btn-back10").style.display = ""; // Mostrar boton Anterior 10
            document.getElementById("btn-next10").style.display = ""; // Mostrar boton Siguiente 10
    
    
        }
    
        else if (respuesta_q38 === "No"){
            
            document.getElementById('q39').style.display = "";  // Mostrar division Pregunta 39
            document.getElementById('q40').style.display = "none"; // Ocultar division Pregunta 40
    
            document.getElementById('question_40').value = ""; // Limpiar select Pregunta 40

            document.getElementById("div-b&n10").style.display = ""; // Mostrar division boton Siguiente 10
            document.getElementById("btn-back10").style.display = ""; // Mostrar boton Anterior 10 *********************
            document.getElementById("btn-next10").style.display = "none"; // Ocultar boton Siguiente 10
    
            }
        }
    
    
    
    
    
    var question39 = document.getElementById('question_39'); // Obtener valor Pregunta 39
    var respuesta_q39 = '';
    
    question39.addEventListener('change', obtenerInfo39);
    
        function obtenerInfo39(e) {
        respuesta_q39 = e.target.value;
    
        if (respuesta_q39 === "Si") {
    
            document.getElementById('q40').style.display = "none"; // Ocultar division Pregunta 40
            document.getElementById('question_40').value = na; // Limpiar select pregunta 40
    
            document.getElementById("div-b&n10").style.display = ""; // Mostrar division anterior y siguiente 10
            document.getElementById("btn-back10").style.display = ""; // Mostrar boton Anterior 10
            document.getElementById("btn-next10").style.display = ""; // Mostrar boton Siguiente 10
    
            // console.log(document.getElementById('question_3').value);
            // console.log(document.getElementById('question_4').value);
    
            }
        else if (respuesta_q39 === "No"){
    
            document.getElementById('q40').style.display = ""; // Mostrar division Pregunta 40
            // document.getElementById('question_40').disabled = true; // Deshabilitar select pregunta 40
            document.getElementById('question_40').value = r_input; // Asignar valor al select de la pregunta 40
    
            document.getElementById("div-b&n10").style.display = ""; // Mostrar division anterior y siguiente 10
            document.getElementById("btn-back10").style.display = ""; // Mostrar boton Anterior 10
            document.getElementById("btn-next10").style.display = ""; // Mostrar boton Siguiente 10
      
    
            // console.log(document.getElementById('question_3').value);
            // console.log(document.getElementById('question_4').value);
    
            }
        }
    
    
    

    /////////// PREGUNTA 41 42 43 44

    var question41 = document.getElementById('question_41'); // Obtener valor Pregunta 41
    var respuesta_q41 = '';
    
    question41.addEventListener('change', obtenerInfo41);
    
        function obtenerInfo41(e) {
        respuesta_q41 = e.target.value;
    
        if (respuesta_q41 === "No") { // Si el valor de Pregunta 41 es igual Si
    
            document.getElementById('q42').style.display = ""; // Mostrar division Pregunta 42
            document.getElementById('q43').style.display = "none"; // Ocultar division Pregunta 43
            document.getElementById('q44').style.display = "none"; // Ocultar division Pregunta 44
    
            document.getElementById('question_42').value = ""; // Limpia select Pregunta 42
            document.getElementById('question_43').value = ""; // Limpia select Pregunta 43
            document.getElementById('question_44').value = ""; // Limpia select Pregunta 44

            document.getElementById("div-b&n11").style.display = ""; // Mostrar division boton Siguiente 11
            document.getElementById("btn-back11").style.display = ""; // Mostrar boton Anterior 11 *********************
            document.getElementById("btn-next11").style.display = "none"; // Ocultar boton Siguiente 11
    
        }
    
        else if (respuesta_q41 === "Si"){
    
            document.getElementById('q42').style.display = "none";  // Ocultar division Pregunta 42
            document.getElementById('q43').style.display = "none";  // Ocultar division Pregunta 43
            document.getElementById('q44').style.display = "none";  // Ocultar division Pregunta 44
    
            document.getElementById('question_42').value = na; // Limpia select Pregunta 42
            document.getElementById('question_43').value = na; // Limpia select Pregunta 43
            document.getElementById('question_44').value = na; // Limpia select Pregunta 44
    
            document.getElementById("div-b&n11").style.display = ""; // Mostrar division boton Siguiente 11
            document.getElementById("btn-back11").style.display = ""; // Mostrar boton Anterior 11
            document.getElementById("btn-next11").style.display = ""; // Mostrar boton Siguiente 11
    
            }
        }
    
    
    
    
    
    var question42 = document.getElementById('question_42'); // Obtener valor Pregunta 42
    var respuesta_q42 = '';
    
    question42.addEventListener('change', obtenerInfo42);
    
        function obtenerInfo42(e) {
        respuesta_q42 = e.target.value;
    
        if (respuesta_q42 === "Si") { //Si el valor de Pregunta 42 es igual Si
    
            document.getElementById('q43').style.display = "none"; // Ocultar division Pregunta 43
            document.getElementById('q44').style.display = "none"; // Ocultar division Pregunta 44
    
            document.getElementById('question_43').value = na; // Limpia select Pregunta 43
            document.getElementById('question_44').value = na; // Limpia select Pregunta 44
    
            document.getElementById("div-b&n11").style.display = ""; // Mostrar division boton Siguiente 11
            document.getElementById("btn-back11").style.display = ""; // Mostrar boton Anterior 11
            document.getElementById("btn-next11").style.display = ""; // Mostrar boton Siguiente 11
    
    
        }
    
        else if (respuesta_q42 === "No"){
            
            document.getElementById('q43').style.display = "";  // Mostrar division Pregunta 43
            document.getElementById('q44').style.display = "none"; // Ocultar division Pregunta 44
    
            document.getElementById('question_44').value = ""; // Limpiar select Pregunta 44

            document.getElementById("div-b&n11").style.display = ""; // Mostrar division boton Siguiente 11
            document.getElementById("btn-back11").style.display = ""; // Mostrar boton Anterior 11 *********************
            document.getElementById("btn-next11").style.display = "none"; // Ocultar boton Siguiente 11
    
            }
        }
    
    
    
    
    
    var question43 = document.getElementById('question_43'); // Obtener valor Pregunta 43
    var respuesta_q43 = '';
    
    question43.addEventListener('change', obtenerInfo43);
    
        function obtenerInfo43(e) {
        respuesta_q43 = e.target.value;
    
        if (respuesta_q43 === "Si") {
    
            document.getElementById('q44').style.display = "none"; // Ocultar division Pregunta 44
            document.getElementById('question_44').value = na; // Limpiar select pregunta 44
    
            document.getElementById("div-b&n11").style.display = ""; // Mostrar division anterior y siguiente 11
            document.getElementById("btn-back11").style.display = ""; // Mostrar boton Anterior 11
            document.getElementById("btn-next11").style.display = ""; // Mostrar boton Siguiente 11
    
            // console.log(document.getElementById('question_3').value);
            // console.log(document.getElementById('question_4').value);
    
            }
        else if (respuesta_q43 === "No"){
    
            document.getElementById('q44').style.display = ""; // Mostrar division Pregunta 44
            // document.getElementById('question_44').disabled = true; // Deshabilitar select pregunta 44
            document.getElementById('question_44').value = r_input; // Asignar valor al select de la pregunta 44
    
            document.getElementById("div-b&n11").style.display = ""; // Mostrar division anterior y siguiente 11
            document.getElementById("btn-back11").style.display = ""; // Mostrar boton Anterior 11
            document.getElementById("btn-next11").style.display = ""; // Mostrar boton Siguiente 11
      
    
            // console.log(document.getElementById('question_3').value);
            // console.log(document.getElementById('question_4').value);
    
            }
        }

    /////////// PREGUNTA 45 46 47 48

var question45 = document.getElementById('question_45'); // Obtener valor Pregunta 45
var respuesta_q45 = '';

question45.addEventListener('change', obtenerInfo45);

    function obtenerInfo45(e) {
    respuesta_q45 = e.target.value;

    if (respuesta_q45 === "Si") { // Si el valor de Pregunta 45 es igual Si

        document.getElementById('q46').style.display = ""; // Mostrar division Pregunta 46
        document.getElementById('q47').style.display = "none"; // Ocultar division Pregunta 47
        document.getElementById('q48').style.display = "none"; // Ocultar division Pregunta 48

        document.getElementById('question_46').value = ""; // Limpia select Pregunta 46
        document.getElementById('question_47').value = ""; // Limpia select Pregunta 47
        document.getElementById('question_48').value = ""; // Limpia select Pregunta 48

        
        document.getElementById("div-b&n12").style.display = ""; // Mostrar division boton Siguiente 12
        document.getElementById("btn-back12").style.display = ""; // Mostrar boton Anterior 12 *********************
        document.getElementById("btn-next12").style.display = "none"; // Ocultar boton Siguiente 12

    }

    else if (respuesta_q45 === "No"){

        document.getElementById('q46').style.display = "none";  // Ocultar division Pregunta 46
        document.getElementById('q47').style.display = "none";  // Ocultar division Pregunta 47
        document.getElementById('q48').style.display = "none";  // Ocultar division Pregunta 48

        document.getElementById('question_46').value = na; // Limpia select Pregunta 46
        document.getElementById('question_47').value = na; // Limpia select Pregunta 47
        document.getElementById('question_48').value = na; // Limpia select Pregunta 48

        document.getElementById("div-b&n12").style.display = ""; // Mostrar division boton Siguiente 12
        document.getElementById("btn-back12").style.display = ""; // Mostrar boton Anterior 12
        document.getElementById("btn-next12").style.display = ""; // Mostrar boton Siguiente 12

        }
    }





var question46 = document.getElementById('question_46'); // Obtener valor Pregunta 46
var respuesta_q46 = '';

question46.addEventListener('change', obtenerInfo46);

    function obtenerInfo46(e) {
    respuesta_q46 = e.target.value;

    if (respuesta_q46 === "Si") { //Si el valor de Pregunta 46 es igual Si

        document.getElementById('q47').style.display = "none"; // Ocultar division Pregunta 47
        document.getElementById('q48').style.display = "none"; // Ocultar division Pregunta 48

        document.getElementById('question_47').value = na; // Limpia select Pregunta 47
        document.getElementById('question_48').value = na; // Limpia select Pregunta 48

        document.getElementById("div-b&n12").style.display = ""; // Mostrar division boton Siguiente 12
        document.getElementById("btn-back12").style.display = ""; // Mostrar boton Anterior 12
        document.getElementById("btn-next12").style.display = ""; // Mostrar boton Siguiente 12


    }

    else if (respuesta_q46 === "No"){
        
        document.getElementById('q47').style.display = "";  // Mostrar division Pregunta 47
        document.getElementById('q48').style.display = "none"; // Ocultar division Pregunta 48

        document.getElementById('question_48').value = ""; // Limpiar select Pregunta 48

        document.getElementById("div-b&n12").style.display = ""; // Mostrar division boton Siguiente 12
        document.getElementById("btn-back12").style.display = ""; // Mostrar boton Anterior 12 *********************
        document.getElementById("btn-next12").style.display = "none"; // Ocultar boton Siguiente 12

        }
    }





var question47 = document.getElementById('question_47'); // Obtener valor Pregunta 47
var respuesta_q47 = '';

question47.addEventListener('change', obtenerInfo47);

    function obtenerInfo47(e) {
    respuesta_q47 = e.target.value;

    if (respuesta_q47 === "Si") {

        document.getElementById('q48').style.display = "none"; // Ocultar division Pregunta 48
        document.getElementById('question_48').value = na; // Limpiar select pregunta 48

        document.getElementById("div-b&n12").style.display = ""; // Mostrar division anterior y siguiente 12
        document.getElementById("btn-back12").style.display = ""; // Mostrar boton Anterior 12
        document.getElementById("btn-next12").style.display = ""; // Mostrar boton Siguiente 12

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    else if (respuesta_q47 === "No"){

        document.getElementById('q48').style.display = ""; // Mostrar division Pregunta 48
        // document.getElementById('question_48').disabled = true; // Deshabilitar select pregunta 48
        document.getElementById('question_48').value = r_input; // Asignar valor al select de la pregunta 48

        document.getElementById("div-b&n12").style.display = ""; // Mostrar division anterior y siguiente 12
        document.getElementById("btn-back12").style.display = ""; // Mostrar boton Anterior 12
        document.getElementById("btn-next12").style.display = ""; // Mostrar boton Siguiente 12
  

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    }



    /////////// PREGUNTA 49 50 51 52

    var question49 = document.getElementById('question_49'); // Obtener valor Pregunta 49
var respuesta_q49 = '';

question49.addEventListener('change', obtenerInfo49);

    function obtenerInfo49(e) {
    respuesta_q49 = e.target.value;

    if (respuesta_q49 === "No") { // Si el valor de Pregunta 49 es igual Si

        document.getElementById('q50').style.display = ""; // Mostrar division Pregunta 50
        document.getElementById('q51').style.display = "none"; // Ocultar division Pregunta 51
        document.getElementById('q52').style.display = "none"; // Ocultar division Pregunta 52

        document.getElementById('question_50').value = ""; // Limpia select Pregunta 50
        document.getElementById('question_51').value = ""; // Limpia select Pregunta 51
        document.getElementById('question_52').value = ""; // Limpia select Pregunta 52

        document.getElementById("div-b&n13").style.display = ""; // Mostrar division boton Siguiente 13
        document.getElementById("btn-back13").style.display = ""; // Mostrar boton Anterior 13 *********************
        document.getElementById("btn-next13").style.display = "none"; // Ocultar boton Siguiente 13

    }

    else if (respuesta_q49 === "Si"){

        document.getElementById('q50').style.display = "none";  // Ocultar division Pregunta 50
        document.getElementById('q51').style.display = "none";  // Ocultar division Pregunta 51
        document.getElementById('q52').style.display = "none";  // Ocultar division Pregunta 52

        document.getElementById('question_50').value = na; // Limpia select Pregunta 50
        document.getElementById('question_51').value = na; // Limpia select Pregunta 51
        document.getElementById('question_52').value = na; // Limpia select Pregunta 52

        document.getElementById("div-b&n13").style.display = ""; // Mostrar division boton Siguiente 13
        document.getElementById("btn-back13").style.display = ""; // Mostrar boton Anterior 13
        document.getElementById("btn-next13").style.display = ""; // Mostrar boton Siguiente 13

        }
    }





var question50 = document.getElementById('question_50'); // Obtener valor Pregunta 50
var respuesta_q50 = '';

question50.addEventListener('change', obtenerInfo50);

    function obtenerInfo50(e) {
    respuesta_q50 = e.target.value;

    if (respuesta_q50 === "Si") { //Si el valor de Pregunta 50 es igual Si

        document.getElementById('q51').style.display = "none"; // Ocultar division Pregunta 51
        document.getElementById('q52').style.display = "none"; // Ocultar division Pregunta 52

        document.getElementById('question_51').value = na; // Limpia select Pregunta 51
        document.getElementById('question_52').value = na; // Limpia select Pregunta 52

        document.getElementById("div-b&n13").style.display = ""; // Mostrar division boton Siguiente 13
        document.getElementById("btn-back13").style.display = ""; // Mostrar boton Anterior 13
        document.getElementById("btn-next13").style.display = ""; // Mostrar boton Siguiente 13


    }

    else if (respuesta_q50 === "No"){
        
        document.getElementById('q51').style.display = "";  // Mostrar division Pregunta 51
        document.getElementById('q52').style.display = "none"; // Ocultar division Pregunta 52

        document.getElementById('question_52').value = ""; // Limpiar select Pregunta 52
        
        document.getElementById("div-b&n13").style.display = ""; // Mostrar division boton Siguiente 13
        document.getElementById("btn-back13").style.display = ""; // Mostrar boton Anterior 13 *********************
        document.getElementById("btn-next13").style.display = "none"; // Ocultar boton Siguiente 13

        }
    }





var question51 = document.getElementById('question_51'); // Obtener valor Pregunta 51
var respuesta_q51 = '';

question51.addEventListener('change', obtenerInfo51);

    function obtenerInfo51(e) {
    respuesta_q51 = e.target.value;

    if (respuesta_q51 === "Si") {

        document.getElementById('q52').style.display = "none"; // Ocultar division Pregunta 52
        document.getElementById('question_52').value = na; // Limpiar select pregunta 52

        document.getElementById("div-b&n13").style.display = ""; // Mostrar division anterior y siguiente 13
        document.getElementById("btn-back13").style.display = ""; // Mostrar boton Anterior 13
        document.getElementById("btn-next13").style.display = ""; // Mostrar boton Siguiente 13

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    else if (respuesta_q51 === "No"){

        document.getElementById('q52').style.display = ""; // Mostrar division Pregunta 52
        // document.getElementById('question_52').disabled = true; // Deshabilitar select pregunta 52
        document.getElementById('question_52').value = r_input; // Asignar valor al select de la pregunta 52

        document.getElementById("div-b&n13").style.display = ""; // Mostrar division anterior y siguiente 13
        document.getElementById("btn-back13").style.display = ""; // Mostrar boton Anterior 13
        document.getElementById("btn-next13").style.display = ""; // Mostrar boton Siguiente 13
  

        // console.log(document.getElementById('question_3').value);
        // console.log(document.getElementById('question_4').value);

        }
    }
