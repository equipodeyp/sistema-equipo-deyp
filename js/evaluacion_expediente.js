var tipo_convenio = document.getElementById('select_tipo_convenio').value;
function disabledcamposevaexp() {
  console.log(tipo_convenio);
  if (tipo_convenio !== '') {
    document.getElementById('select_tipo_convenio').disabled = true;
    document.getElementById('fecha_firma').disabled = true;
    document.getElementById('fecha_inicio').disabled = true;
    document.getElementById('vigencia').disabled = true;
    document.getElementById('input_id_convenio').disabled = true;
    document.getElementById('textarea_observaciones').disabled = true;
    document.getElementById('enter').style.visibility = "hidden";
  }
}
disabledcamposevaexp();
