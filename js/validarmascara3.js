function radicacionfuenteS(sel) {
      if (sel.value=="OFICIO"){
           divC = document.getElementById("OFICIO_S");
           divC.style.display = "";
           divC = document.getElementById("CORREO_S");
           divC.style.display = "none";
           divC = document.getElementById("EXPEDIENTE_S");
           divC.style.display = "none";
           divC = document.getElementById("OTRO_S");
           divC.style.display = "none";

      }else if (sel.value=="CORREO") {
        divC = document.getElementById("CORREO_S");
        divC.style.display = "";
        divC = document.getElementById("OFICIO_S");
        divC.style.display = "none";
        divC = document.getElementById("EXPEDIENTE_S");
        divC.style.display = "none";
        divC = document.getElementById("OTRO_S");
        divC.style.display = "none";

      }else if (sel.value=="EXPEDIENTE") {
        divC = document.getElementById("EXPEDIENTE_S");
        divC.style.display = "";
        divC = document.getElementById("CORREO_S");
        divC.style.display = "none";
        divC = document.getElementById("OFICIO_S");
        divC.style.display = "none";
        divC = document.getElementById("OTRO_S");
        divC.style.display = "none";

      }else if (sel.value=="OTRO") {
        divC = document.getElementById("OTRO_S");
        divC.style.display = "";
        divC = document.getElementById("CORREO_S");
        divC.style.display = "none";
        divC = document.getElementById("EXPEDIENTE_S");
        divC.style.display = "none";
        divC = document.getElementById("OFICIO_S");
        divC.style.display = "none";

      }

}

function open3art35(sel) {
      if (sel.value=="CONCLUSION"){
           divC = document.getElementById("CONCLUSION_ART35s");
           divC.style.display = "";

      }else{

           divC = document.getElementById("CONCLUSION_ART35s");
           divC.style.display="none";
           document.getElementById("CONCLUSION_ART35").value = '';
           divC = document.getElementById("OTHER3ART35");
           divC.style.display="none";
           document.getElementById("OTHER_ART35").value = '';
      }
}

function other3art35(sel) {
      if (sel.value=="IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO"){
           divC = document.getElementById("OTHER3ART35");
           divC.style.display = "";

      }else{

           divC = document.getElementById("OTHER3ART35");
           divC.style.display="none";
      }
}

function open3art35zz(sel) {
      if (sel.value=="CONCLUSION"){
           divC = document.getElementById("CONCLUSION_ART35m");
           divC.style.display = "";
           

      }else{

           divC = document.getElementById("CONCLUSION_ART35m");
           divC.style.display="none";

           divC = document.getElementById("OTHER3ART35");
           divC.style.display="none";

      }
}
