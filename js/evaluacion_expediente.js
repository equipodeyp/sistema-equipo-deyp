////////////////////////////////////////////////////////////////////////////////////////////////////////////descomentar una vez que se haiga actualizado todo
var tipo_convenio = document.getElementById('select_tipo_convenio').value;
function disabledcamposevaexp() {
  if (tipo_convenio !== '') {
    document.getElementById('select_tipo_convenio').disabled = true;
    document.getElementById('fecha_firma').disabled = true;
    document.getElementById('fecha_inicio').disabled = true;
    document.getElementById('vigencia').disabled = true;
    document.getElementById('input_id_convenio').disabled = true;
    document.getElementById('textarea_observaciones').disabled = true;
    document.getElementById('textobserv').style.display = "none";
    document.getElementById('enter').style.visibility = "hidden";
  }
}
disabledcamposevaexp();
// desactivar todo cuando sea ACUERDO de CONCLUSION
var analisis = document.getElementById('analisis_m').value;
function activaracuerdo() {
  console.log(analisis);
  if (analisis === 'ACUERDO DE CONCLUSION' || analisis === 'ACUERDO DE CANCELACION') {
    document.getElementById('tconve').style.display = "none";
    document.getElementById('ffirma').style.display = "none";
    document.getElementById('finicio').style.display = "none";
    document.getElementById('vigen').style.display = "none";
    document.getElementById('fterm').style.display = "none";
    document.getElementById('tconvenios').style.display = "none";
    document.getElementById('textobserv').style.display = "none";
    document.getElementById('enter').style.visibility = "hidden";
  }else if (analisis !== '') {
    document.getElementById('analisis_m').disabled = true;
    document.getElementById('fecha_autoe').disabled = true;
    document.getElementById('id_analisiss').disabled = true;
  }
}
activaracuerdo();
