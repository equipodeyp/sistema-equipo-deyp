var tipo = document.getElementById('SELECT_TIPO_CONVENIO').value;
function disabledcampos() {
  // console.log(tipo);
  if (tipo !== '') {
    document.getElementById('SELECT_TIPO_CONVENIO').disabled= true;
    document.getElementById('INPUT_FECHA_FIRMA').disabled= true;
    document.getElementById('INPUT_FECHA_INICIO').disabled= true;
    document.getElementById('INPUT_VIGENCIA').disabled= true;
    document.getElementById('INPUT_ID_CONVENIO').disabled= true;
    document.getElementById('input_observaciones').disabled= true;
    document.getElementById('enter').style.visibility = "hidden";
  }
}
disabledcampos();
// desactivar todo cuando sea ACUERDO de CONCLUSION
var analisis = document.getElementById('ANALISIS_MULT').value;
function activaracuerdo() {
  // console.log(analisis);
  if (analisis === 'ACUERDO DE CONCLUSION' || analisis === 'ACUERDO DE CANCELACION') {
    document.getElementById('row_observ').style.display = "none";
    document.getElementById('enter').style.visibility = "hidden";
  }
}
activaracuerdo();
