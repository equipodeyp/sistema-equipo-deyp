// $(document).ready(function(){
//
//    $("#CLASIFICACION_MEDIDA").change(function(){//obtener valor del select en el evento on change
//
//       alert($(this).val())//mostrar el valor en un alert de el select
//
//    })
//
// })

function modselectmedida(sel) {
      if (sel.value=="ASISTENCIA"){
           divC = document.getElementById("asistencia");
           divC.style.display = "";
           divC = document.getElementById("resguardo");
           divC.style.display="none";
           document.getElementById("MEDIDAS_RESGUARDO").value = '';
           divC = document.getElementById("resguardoxi");
           divC.style.display="none";
           divC = document.getElementById("resguardoxii");
           divC.style.display = "none";
           divC = document.getElementById("otherresguardo");
           divC.style.display = "none";
           document.getElementById("RESGUARDO_XI").value = '';



      }else{
           divC = document.getElementById("resguardo");
           divC.style.display="";
           divC = document.getElementById("asistencia");
           divC.style.display = "none";
           document.getElementById("MEDIDAS_ASISTENCIA").value = '';
           divC = document.getElementById("otherasistencia");
           divC.style.display = "none";

           // document.getElementById("RESGUARDO_XI").value = '';
           // document.getElementById("RESGUARDO_XII").value = '';
      }
}


function modselectmedidares(sel) {
      if (sel.value=="XI. EJECUCION DE MEDIDAS PROCESALES"){
        divC = document.getElementById("otherresguardo");
        divC.style.display="none";

           divC = document.getElementById("resguardoxi");
           divC.style.display = "";
           divC = document.getElementById("resguardoxii");
           divC.style.display="none";

           divC = document.getElementById("otherresguardo");
           divC.style.display = "none";

      }else if (sel.value=="XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS") {
        divC = document.getElementById("otherresguardo");
        divC.style.display="none";
        divC = document.getElementById("resguardoxi");
        divC.style.display="none";
        divC = document.getElementById("resguardoxii");
        divC.style.display = "";

      } else if (sel.value=="XIII. OTRAS MEDIDAS") {
        divC = document.getElementById("otherresguardo");
        divC.style.display = "";
        divC = document.getElementById("resguardoxi");
        divC.style.display="none";
        divC = document.getElementById("resguardoxii");
        divC.style.display="none";
      } else {
        divC = document.getElementById("resguardoxi");
        divC.style.display="none";
        //document.getElementById("RESGUARDO_XI").value = '';
        divC = document.getElementById("resguardoxii");
        divC.style.display = "none";
        //document.getElementById("RESGUARDO_XII").value = '';
        //
        divC = document.getElementById("otherresguardo");
        divC.style.display="none";

      }

}



function modselectother(sel) {
      if (sel.value=="VIII. OTRAS"){
           divC = document.getElementById("otherasistencia");
           divC.style.display = "";

      }else{
           divC = document.getElementById("otherasistencia");
           divC.style.display="none";


      }
}

function radicacionfuenteM(sel) {
      if (sel.value=="1"){
           divC = document.getElementById("OFICIO_M");
           divC.style.display = "";
           divC = document.getElementById("CORREO_M");
           divC.style.display = "none";
           divC = document.getElementById("EXPEDIENTE_M");
           divC.style.display = "none";
           divC = document.getElementById("OTRO_M");
           divC.style.display = "none";

      }else if (sel.value=="2") {
        divC = document.getElementById("CORREO_M");
        divC.style.display = "";
        divC = document.getElementById("OFICIO_M");
        divC.style.display = "none";
        divC = document.getElementById("EXPEDIENTE_M");
        divC.style.display = "none";
        divC = document.getElementById("OTRO_M");
        divC.style.display = "none";

      }else if (sel.value=="3") {
        divC = document.getElementById("EXPEDIENTE_M");
        divC.style.display = "";
        divC = document.getElementById("CORREO_M");
        divC.style.display = "none";
        divC = document.getElementById("OFICIO_M");
        divC.style.display = "none";
        divC = document.getElementById("OTRO_M");
        divC.style.display = "none";

      }else if (sel.value=="4") {
        divC = document.getElementById("OTRO_M");
        divC.style.display = "";
        divC = document.getElementById("CORREO_M");
        divC.style.display = "none";
        divC = document.getElementById("EXPEDIENTE_M");
        divC.style.display = "none";
        divC = document.getElementById("OFICIO_M");
        divC.style.display = "none";

      }

}

function modopen2art35(sel) {
      if (sel.value=="CONCLUSION"){
           divC = document.getElementById("CONCLUSION_ART35");
           divC.style.display = "";

      }else{

           divC = document.getElementById("CONCLUSION_ART35");
           divC.style.display="none";
      }
}

function modotherart35(sel) {
      if (sel.value=="IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO" || sel.value=="OTRO"){
           divC = document.getElementById("OTHERART35");
           divC.style.display = "";
           // document.getElementById("OTHER_ART35").value = '';
           document.getElementById("OTHER_ART351").value = '';

      }else{

           divC = document.getElementById("OTHERART35");
           divC.style.display="none";
      }
}

function modotherart35s(sel) {
      if (sel.value=="IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO"){
           divC = document.getElementById("OTHER3ART35");
           divC.style.display = "";
           // document.getElementById("OTHER_ART35").value = '';
           document.getElementById("OTHER_ART351").value = '';

      }else{

           divC = document.getElementById("OTHER3ART35");
           divC.style.display="none";
      }
}
