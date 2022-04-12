var idsl = document.getElementById('ID_SOLICITUD').value;
function disbotton () {
  console.log(idsl);
  if (idsl !== '') {
    document.getElementById("next").disabled = false;
    // document.getElementById("next2").disabled = false;
  }
}
disbotton();

var delp = document.getElementById('DELITO_PRINCIPAL').value;
function delpry() {
  console.log(delp);
  if (delp !== '') {
    document.getElementById("next3").disabled = false;
  }
  if (delp === '') {
    document.getElementById('opt-delito-principal').text = "SELECCIONE UNA OPCIÓN"
    document.getElementById('opt-delito-secundario').text = "SELECCIONE UNA OPCIÓN";
    document.getElementById('opt-etapa-proc').text = "SELECCIONE UNA OPCIÓN";
    document.getElementById('opt-mun-rad').text = "SELECCIONE UNA OPCIÓN";
    document.getElementById('opt-val-jurid').text = "SELECCIONE UNA OPCIÓN";
    document.getElementById('opt-no-proc').text = "SELECCIONE UNA OPCIÓN";
  }
}
delpry();
