// funcion para mostrar y ocultar div de usuario
function ckecktipoconsulta(sel) {
  if (sel.value == "GLOBAL") {
    document.getElementById("div_usuario").style.display = "none";
    // document.getElementById("div_actividad").style.display = "none";
    document.getElementById("usuario").selectedIndex = 0;
    document.getElementById("nombre_actividad").selectedIndex = 0;
    // document.getElementById("nombre_actividad").selectedIndex = 0;
  }else if (sel.value == "POR USUARIO") {
    document.getElementById("div_usuario").style.display = "";
    document.getElementById("nombre_actividad").selectedIndex = 0;
    // document.getElementById("div_actividad").style.display = "";
  }
}
//
// fecha_inicio.max = new Date().toISOString().split("T")[0];

// IMEVIS-V-2025-0049131
