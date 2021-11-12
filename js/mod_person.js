
function openmunicipio(sel) {
    if (sel.value!="0") {
      divC = document.getElementById("inputnac");
      divC.style.display = "none";
      divC = document.getElementById("selecmunicipio_nac");
      divC.style.display = "";
    }else if(sel.value=="0"){
      divC = document.getElementById("inputnac");
      divC.style.display = "";
      divC = document.getElementById("selecmunicipio_nac");
      divC.style.display = "none";
    }

}
