////////////////////////////////////////////////////////////////////////////////////////////////////////////descomentar una vez que se haiga actualizado todo
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
   if (tipo === 'NO APLICA') {
    console.log('error');
    document.getElementById('LABEL_FECHA_FIRMA').style.display = "none";
    // document.getElementById('INPUT_FECHA_FIRMA').style.display = "none";
    document.getElementById('LABEL_FECHA_INICIO').style.display = "none";
    // document.getElementById('INPUT_FECHA_INICIO').style.display = "none";
    document.getElementById('LABEL_VIGENCIA').style.display = "none";
    // document.getElementById('INPUT_VIGENCIA').style.display = "none";
    document.getElementById('LABEL_FECHA_TERMINO').style.display = "none";
    // document.getElementById('INPUT_FECHA_TERMINO').style.display = "none";
    document.getElementById('LABEL_ID_CONVENIO').style.display = "none";
    // document.getElementById('INPUT_ID_CONVENIO').style.display = "none";
  }else if (tipo === 'CONVENIO MODIFICATORIO') {
    console.log('rr');
      document.getElementById('convmodific').style.display = "none";
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
  }else if (analisis !== '') {
    document.getElementById('ANALISIS_MULT').disabled = true;
    document.getElementById('INPUT_FECHA_AUTORIZACION').disabled = true;
    document.getElementById('INPUT_ID_ANALISIS').disabled = true;
  }
}
activaracuerdo();
