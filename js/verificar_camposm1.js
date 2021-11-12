function pagoOnChangemod(sel) {
      if (sel.value=="NO"){
           divC = document.getElementById("tutor");
           divC.style.display = "none";

      }else{

           divC = document.getElementById("tutor");
           divC.style.display="";
           document.getElementById("TUTOR_NOMBRE1").value = '';
           document.getElementById("TUTOR_PATERNO1").value = '';
           document.getElementById("TUTOR_MATERNO1").value = '';
      }
}


function updatenac(sel) {

}

function updatedom(sel) {

}
