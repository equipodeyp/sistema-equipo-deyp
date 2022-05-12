var tipo = document.getElementById('SELECT_TIPO_CONVENIO').value;
function disabledcampos() {
  console.log(tipo);
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
